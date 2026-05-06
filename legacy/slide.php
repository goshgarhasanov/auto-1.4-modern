<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("inc.php");
$link = connect_db();

$qey = file("file/dat_folder/enter.dat");
$fusid = trim($qey[8]);

class GifCreator
{

	/**
	 * Version
	 *
	 * @var string
	 */
	const VERSION     = 'GifCreator v0.3';

	/**
	 * Gif header
	 *
	 * @var string
	 */
	const GIF_HEADER  = 'GIF89a';

	/**
	 * Output image width
	 *
	 * @var int
	 */
	private $_width;

	/**
	 * Output image height
	 *
	 * @var int
	 */
	private $_height;

	/**
	 * Number of loops
	 *
	 * @var int
	 */
	private $_loops    = 0;

	/**
	 * Disposal method
	 *
	 * @var int
	 */
	private $_disposal = 2;
	private $_colour   = -1;

	
	private $_frames = array();

	private $_global = array();

	
	public function __construct($loops = 0, $disposal = 2, $transparency = array(-1, -1, -1), $width = null, $height = null)
	{
		$this->_loops     = $loops;
		$this->_disposal  = $disposal >= 0 && $disposal <= 3 ? $disposal : 2;
		$this->_colour    = $transparency[0] > -1 || $transparency[1] > -1 || $transparency[2] > -1 ?
							$transparency[0] | $transparency[1] << 8 | $transparency[2] << 16 : -1;
		$this->_width     = $width;
		$this->_height    = $height;
	}

	
	public function addFrame($data, $duration, $resize = false, $xpos = 0, $ypos = 0, $orDisposal = false, $orTransparency = false)
	{
		// Resize or convert the image if GD is enabled (also GD will notice any bad data)
		if (function_exists('gd_info')) {
			if ($resize) {
				$data = $this->_resizeImage($data);
			} else {
				$data = $this->_convertImage($data);
			}
		} else {
			// Verify the data looks like it is a gif image
			$header = substr($data, 0, 6);
			if ($header != 'GIF87a' && $header != 'GIF89a') {
				throw new Exception(self::VERSION . ' Error: Data does not appear to be a valid gif image.');
			}
			if (strstr($data, 'NETSCAPE') !== false) {
				throw new Exception(self::VERSION . ' Error: Animated gif frames are not currently supported.');
			}
		}
		// Populate global values form first frame
		if (!count($this->_global)) {
			$this->_defineGlobals($data);
		}
		// Define frame specific vars
		$locStr = 13 + 3 * (2 << ( ord($data{10}) & 0x07));
		$locEnd = strlen($data) - $locStr - 1;
		$locTmp = substr($data, $locStr, $locEnd);
		$locLen = 2 << (ord($data{10}) & 0x07);
		// Extract local colour pallet
		$locRGB = substr($data, 13, 3 * (2 << (ord($data{10}) & 0x07)));
		// Frame disposal override
		if ($orDisposal !== false) {
			$locDis = $orDisposal >= 0 && $orDisposal <= 3 ? $orDisposal : 2;
		} else {
			$locDis = $this->_disposal;
		}
		// Frame transparency override
		if ($orTransparency !== false) {
			$locCol = $orTransparency[0] > -1 || $orTransparency[1] > -1 || $orTransparency[2] > -1 ?
					  $orTransparency[0] | $orTransparency[1] << 8 | $orTransparency[2] << 16 : -1;
		} else {
			$locCol = $this->_colour;
		}
		// Look for transparent colour in the pallet
		if ($locCol > -1 && ord($data{10}) & 0x80) {
			for ($i = 0; $i < (2 << (ord($data{10}) & 0x07)); $i++) {
				if (ord($locRGB{3 * $i + 0}) == (($locCol >> 16) & 0xFF) &&
					ord($locRGB{3 * $i + 1}) == (($locCol >> 8)  & 0xFF) &&
					ord($locRGB{3 * $i + 2}) == (($locCol >> 0)  & 0xFF)) {
					$locExt = "!\xF9\x04" . chr (($locDis << 2) + 1) . chr(($duration >> 0) & 0xFF) .
							  chr(($duration >> 8) & 0xFF) . chr($i) . "\x0";
					break;
				}
			}
		}
		if (!isset($locExt)) {
			$locExt = "!\xF9\x04" . chr(($locDis << 2) + 0) . chr(($duration >> 0) & 0xFF) .
					  chr(($duration >> 8) & 0xFF) . "\x0\x0";
		}
		// Extract the image descriptor
		switch ($locTmp{0}) {
			case '!':
				$locImg = substr($locTmp, 8, 10);
				$locTmp = substr($locTmp, 18, strlen($locTmp) - 18);
				break;
			case ',':
				$locImg = substr($locTmp, 0, 10);
				$locTmp = substr($locTmp, 10, strlen($locTmp) - 10);
				break;
		}
		// Modify image position in image descriptor
		if ($xpos > 0) {
			$locImg{1} = chr($xpos & 0xff);
			$locImg{2} = chr(($xpos >> 8) & 0xFF);
		}
		if ($ypos > 0) {
			$locImg{3} = chr($ypos & 0xff);
			$locImg{4} = chr(($ypos >> 8) & 0xFF);
		}
		// Create frame
		$frame = '';
		if (ord($data{10}) & 0x80 && count($this->_frames)) {
			if ($this->_global['len'] == $locLen) {
				if ($this->_blockCompare($this->_global['rgb'], $locRGB, $locLen) ) {
					$frame .= $locExt . $locImg . $locTmp;
				} else {
					$byte  = ord($locImg{9});
					$byte |= 0x80;
					$byte &= 0xF8;
					$byte |= ord($this->_global['frame']{10}) & 0x07;
					$locImg{9} = chr($byte);
					$frame .= $locExt . $locImg . $locRGB . $locTmp;
				}
			} else {
				$byte  = ord($locImg{9});
				$byte |= 0x80;
				$byte &= 0xF8;
				$byte |= ord($data{10}) & 0x07;
				$locImg{9} = chr($byte);
				$frame .= $locExt . $locImg . $locRGB . $locTmp;
			}
		} else {
			$frame .= $locExt . $locImg . $locTmp;
		}
		$this->_frames[] = $frame;
	}

	
	public function getAnimation()
	{
		return $this->_getHeader() . implode($this->_frames) . $this->_getFooter();
	}

	
	private function _getHeader()
	{
		if (!isset($this->_global['frame'])) {
			throw new Exception(self::VERSION . ' Error: A frame must be added before header can be generated.');
		}
		$header = self::GIF_HEADER;
		$cmap = 0;
		if (ord($this->_global['frame']{10}) & 0x80) {
			$cmap = 3 * ( 2 << (ord($this->_global['frame']{10}) & 0x07));
			$header .= substr($this->_global['frame'], 6, 7);
			$header .= substr($this->_global['frame'], 13, $cmap);
			$header .= "!\377\13NETSCAPE2.0\3\1" . $this->_word($this->_loops) . "\0";
		}
		return $header;
	}

	
	private function _getFooter()
	{
		return ';';
	}

	
	private function _resizeImage($data)
	{
		// Create image from data
		$img = imagecreatefromstring($data);
		if (!$img) {
			throw new Exception(self::VERSION . ' Error: Image format is invalid or unsupported.');
		}
		if (imageistruecolor($img)) {
			$newImg = imagecreatetruecolor($this->_width, $this->_height);
		} else {
			$newImg = imagecreate($this->_width, $this->_height);
		}
		// Resample
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $this->_width, $this->_height, imagesx($img), imagesy($img));
		imagedestroy($img);
		// Get image as gif
		ob_start();
		imagegif($newImg);
		$resImg = ob_get_contents();
		imagedestroy($newImg);
		ob_end_clean();
		return $resImg;
	}


	private function _convertImage($data)
	{
		// Create image from data
		$img = imagecreatefromstring($data);
		if (!$img) {
			throw new Exception(self::VERSION . ' Error: Image format is invalid or unsupported.');
		}
		// Get image as gif
		ob_start();
		imagegif($img);
		$resImg = ob_get_contents();
		imagedestroy($img);
		ob_end_clean();
		return $resImg;
	}

	private function _defineGlobals($data)
	{
		$this->_global['frame'] = $data;
		$this->_global['len']   = 2 << (ord($data{10}) & 0x07);
		$this->_global['rgb']   = substr($data, 13, 3 * (2 << (ord($data{10}) & 0x07)));
	}

	private function _blockCompare($global, $local, $length)
	{
		for ($i = 0; $i < $length; $i++) {
			if ($global{3 * $i} != $local{3 * $i} ||
				$global{3 * $i + 1} != $local{3 * $i + 1} ||
				$global{3 * $i + 2} != $local{3 * $i + 2}) {
				return false;
			}
		}
		return true;
	}

	private function _word($int)
	{
		return chr($int & 0xFF) . chr(($int >> 8) & 0xFF);
	}

}

/////////buga son

$gif = new GifCreator(0, 2, array(-1, -1, -1), 120, 120);

$qa = mysql_query("select * from albom where idfoto = '".$fusid."' ");
while ($a2 = mysql_fetch_array($qa))
{
$photo=$a2['photo'];
$info=$a2['info'];
$fid = $a2["id"];
$idfoto=$a2['idfoto'];
$sekil="photos/".$idfoto."/".$photo;

$gif->addFrame(file_get_contents($sekil), 150, true);
}
header('Content-type: image/vnd.wap.wbmp');
echo $gif->getAnimation();


?>