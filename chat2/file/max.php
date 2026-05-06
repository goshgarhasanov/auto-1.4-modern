<?

$contsay = count(explode('/',$_SERVER['REQUEST_URI']))-2;
$httphost=explode('/',$_SERVER['REQUEST_URI']);
$ffoto = base64_decode(trim($httphost[$contsay]));
$img = "../".$ffoto."";

if(!file_exists("$img")){
$img = ImageCreateFromjpeg( "http://berdemiz.com/chat/img/no_img.jpeg" );
if($img) {
header("Content-Type: image/jpeg");
Imagejpeg($img);
ImageDestroy($img);
}
exit;
}
$daroq = getimagesize("$img");

$n_nam=trim($daroq[2]);
if($n_nam=="1"){$mms_type="gif";}
elseif($n_nam=="2"){$mms_type="jpeg";}
elseif($n_nam=="3"){$mms_type="png";}
else {
$img = ImageCreateFromjpeg( "http://berdemiz.com/chat/img/no_img.jpeg" ); 
if($img) {
header("Content-Type: image/jpeg");
Imagejpeg($img);
ImageDestroy($img);
}
exit;
}


$size_x_y=GetImageSize("".$img."");
$x = "$size_x_y[0]"; $y = "$size_x_y[1]";


$filename = "".$img."";
// Set a maximum height and width
$width = 300;
$height = 300;

// Content type
if($mms_type=="jpeg"){header('Content-type: image/jpeg');}
if($mms_type=="jpg"){header('Content-type: image/jpeg');}
if($mms_type=="gif"){header('Content-type: image/gif');}
if($mms_type=="png"){header('Content-type: image/png');}

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

// Resample

$fon = imagecreatetruecolor($x, $y);
if($mms_type=="jpeg"){$image = imagecreatefromjpeg($filename);}
if($mms_type=="jpg"){$image = imagecreatefromjpeg($filename);}
if($mms_type=="gif"){$image = imagecreatefromgif($filename);}
if($mms_type=="png"){$image = imagecreatefrompng($filename);}


$fon_x = $width_orig;
$fon_y = $height_orig;

$soldan_saga = $width_orig;
$yuxaridan_asagi = $height_orig;

$sekil_x = $width_orig;
$sekil_y = $height_orig;

$seklin_x_olcusu = $x;
$seklin_y_olcusu = $y;

imagecopyresampled($fon, $image, $fon_x*0, $fon_y*0, $sekil_x*0, $sekil_y*0, $seklin_x_olcusu, $seklin_y_olcusu, $soldan_saga, $yuxaridan_asagi);

$soz = "WaP.Berdemiz.NeT";
$size = 5; //sozun olchusu
$x_text = $x-imagefontwidth($size)*strlen($soz)-3;
$y_text = $y-imagefontheight($size)-3;

$white = imagecolorallocate($fon, 255, 014, 00);
$black = imagecolorallocate($fon, 210, 210, 210);
$gray = imagecolorallocate($fon, 127, 127, 127);
if (imagecolorat($fon,$x_text,$y_text)>$gray) $color = $black;
if (imagecolorat($fon,$x_text,$y_text)<$gray) $color = $white;

imagestring($fon, $size, $x_text-1, $y_text-1, $soz,$white-$color);
imagestring($fon, $size, $x_text+1, $y_text+1, $soz,$white-$color);
imagestring($fon, $size, $x_text+1, $y_text-1, $soz,$white-$color);
imagestring($fon, $size, $x_text-1, $y_text+1, $soz,$white-$color);

imagestring($fon, $size, $x_text-1, $y_text,   $soz,$white-$color);
imagestring($fon, $size, $x_text+1, $y_text,   $soz,$white-$color);
imagestring($fon, $size, $x_text,   $y_text-1, $soz,$white-$color);
imagestring($fon, $size, $x_text,   $y_text+1, $soz,$white-$color);

imagestring($fon, $size, $x_text,   $y_text,   $soz,$color);

// Output
if($mms_type=="jpeg"){
imagejpeg($fon, null, 80);
}
if($mms_type=="jpg"){
imagejpeg($fon, null, 80);
}
if($mms_type=="gif"){
imagegif($fon, null, 80);
}
if($mms_type=="png"){
imagegif($fon, null, 80);
}

?>