<?php
class version
{

    public $ref = NULL;
    public $ver = NULL;
    public $fsize1 = NULL;
    public $fsize2 = NULL;
public function mypage($mytitle, $mytext_page, $geri=false, $movqe='left'){
global $ref, $id, $ps, $fsize1, $fsize2, $link;

$this->title($mytitle, $movqe);
$this->fsize1($fsize1);
echo $mytext_page."<br/>\n";
if($geri != false)
{
$this->divide();
echo $geri."\n";
}
$this->fsize2($fsize2);
$this->end('1',$link);
exit();
}
function user_version($us_ver = false){
// Single style — always modern HTML, no switcher
$this->ver = 'modern';
$this->bver = 'modern';
$_SESSION['vers'] = 'modern';
return 'modern';
}


    public function __construct( )
    {
		global $msg;
		if ($_POST['edit:msg']) {
			$exp = explode(',', $_POST['edit:msg']);
			$msg = $_POST['msg'] = $exp['0'] . ', ' . $_POST['msg'];
		}
		$this->stylefile = @file("file/dat_folder/n_n/style.dat");
        return $this->user_version( );
    }
	

    public function version_name( $v_name )
    {
		$name = array( 'modern' => "Modern", 'wml' => "WML", 'win' => "Windows", 'vista1' => "Vista", 'vista2' => "Vista", 'vista3' => "Milli Bayraq" );
        return $name[$v_name];
    }

    public function key( $str )
    {
        $str = preg_replace( "/[^0-9]+/", "", $str );
        return $str;
    }

    public function html( $html )
    {
        $this->html = $this->ver != wml ? $html : null;
        print $this->html;
    }

    public function wml( $wml )
    {
        $this->wml = $this->ver == wml ? $wml : null;
        print $this->wml;
    }

    public function fsize1( )
    {
        global $fsize1;
        if ( isset( $fsize1 ) )
        {
            echo $this->wml( $fsize1 );
        }
        else
        {
            echo $this->wml( "<small>" );
        }
    }

    public function fsize2( )
    {
        global $fsize2;
        if ( isset( $fsize2 ) )
        {
            echo $this->wml( $fsize2 );
        }
        else
        {
            echo $this->wml( "</small>" );
        }
    }

    public function align( $align, $v = "" )
    {
        print $this->fsize2( );
        if ( $v == "html" )
        {
            print $this->html( "</div><div id=i".$align.">" );
        }
        else if ( $v == "wml" )
        {
            print $this->wml( "</p><p align=\"".$align."\">" );
        }
        else
        {
            print $this->wml( "</p><p align=\"".$align."\">" );
            print $this->html( "</div><div id=i".$align.">" );
        }
        print $this->fsize1( );
    }

    public function divide( $divide = "" )
    {
        if ( $divide == "html" )
        {
            print $this->html( "<hr>" );
            print $this->wml( "<br/>" );
        }
        else if ( $divide == "wml" )
        {
            print $this->wml( "----<br/>" );
            print $this->html( "<br/>" );
        }
        else
        {
            print $this->wml( "----<br/>" );
            print $this->html( "<hr>" );
        }
    }




    public function java_action( $url_action, $forum_id = "" )
    {
        global $ref;
        $this->pos_ref = $ref;
        if ( $this->ver == "wml" )
        {
            $this->java_action = "{$url_action}";
        }
        else
        {
            echo $this->java_action = "<form ".( isset( $forum_id ) ? "id=\"{$forum_id}\"" : "" )." action=\"".$url_action."\" method=\"POST\"/>\n";
        }
    }

	function action($url, $m=""){
		global $ref;

		unset($this->input);
		unset($this->select);
		unset($this->submit);

		$this->pos_ref = $ref;

		if($this->ver == "wml"){
			$this->action = "{$url}";
		}else{
			echo $this->action = "<form action=\"".$url."\" method=\"POST\"/>\n";
		}

	}

	function input($inpu=false){

	$inpu = str_replace( "\\", "", $inpu );

	if($this->ver!="wml")$inpu = str_replace($this->pos_ref, "", $inpu);

	preg_match('#name="(.+?)" #', $inpu, $m);
	$this->postfile_input .= "<postfield name=\"".str_replace($this->pos_ref, "", $m[1])."\" value=\"$({$m['1']})\"/>\n";

	echo $this->fsize2('small');
	if(strpos(strtolower($inpu),"type")== false){
	echo str_replace( '<input ', '<input type="text" ', $inpu);
	}else{
	echo $inpu;
	}

	echo $this->fsize1('small');


	}

public function select($options, $def="null") {

	$options = str_replace( "\\", "", $options );

	if($this->ver!="wml"){
		$options = str_replace($this->pos_ref, "", $options);
	}
	preg_match('#name="(.+?)"#', $options, $mac);
	$this->postfile_select .= "<postfield name=\"".str_replace($this->pos_ref, "", $mac[1])."\" value=\"$({$mac['1']})\"/>\n";
	preg_match('#multiple="(.+?)"#', $options,$macc);

	if(($macc['1'] == "true") || ($def=="null") || ($def=="") || ($def=="false")){
		echo "\r\n".str_replace("|", "", $options);
	}
	else{

		$options = str_replace("|", "\n", $options);
		$opt_select = "<select name=\"".$mac['1']."\">\n";

		$select[] = array();
		foreach (explode("\n", $options) as $_key => $_vall){
			preg_match('#<option value="(.+?)">(.+?)</option>#', $_vall,$value);
			$selecti[$value[1]] = "{$value['2']}";
			$opt_s .= "{$value['0']}";
		}

		$del_select = "<option value=\"".$def."\">".$selecti[$def]."</option>";
		$opt_s = str_replace($del_select, '', $opt_s);
		$select_val = "<option ".(($this->ver == "wml") ? "" : "selected ")."value=\"{$def}\">{$selecti[$def]}</option>\n";
		$this->select = $opt_select.$select_val.$opt_s."</select>\n";
		echo $this->select;

	}

}


    public function sub_val( $mes, $msg )
    {
		$nick = explode(",", $msg);
        $this->postfile_sub .= "<postfield name=\"{$mes}\" value=\"{$nick['0']}, \$({$mes}{$this->pos_ref})\"/>\n";
        return $this->sub_val = $this->html( "<input type=\"hidden\" name=\"edit:{$mes}\" value=\"{$msg}\"/>\n" );
    }

    public function java_hidden( $hid_name = "false", $hid_val = "false", $hid_mod = "false" )
    {
        $this->hidden_wml .= "<postfield name=\"".str_replace( $this->pos_ref, "", $hid_name )."\" value=\"{$hid_val}\"/>\n";
        $this->html( "<input type=\"hidden\" name=\"".str_replace( $this->pos_ref, "", $hid_name )."\" value=\"{$hid_val}\"/>\n" );
    }

	public function input_sub($inp_sub, $inp_name=false, $inp_val="true"){
		if ($this->ver != 'wml') {
			$inp_sub = strip_tags($inp_sub, '<br><br/>');
		}
	
		if($inp_sub == "end"){
			unset($this->post);
			unset($this->postfile_select);
			unset($this->postfile_input);
			unset($this->hidden_wml);
			return $this->html("</form>")."\n";
		}

		$this->post .= $this->hidden_wml;
		$this->post .= $this->postfile_select;
		$this->post .= $this->postfile_input;
		$this->post .= "<postfield name=\"{$inp_name}\" value=\"{$inp_val}\"/>\n";

		$this->input_sub = false;
		$this->input_sub = $this->wml("<anchor>".$inp_sub."<go href=\"".$this->java_action."\" method=\"post\">".$this->post."</go></anchor>\n");

		$this->input_sub = $this->html("<a href=\"javascript: javaclick('$inp_name')\">$inp_sub</a>\n");
		unset($this->post);
		unset($this->postfile_select);
		return $this->input_sub."\r\n";
    }

    public function submit( $sub, $emr = false, $url = false )
    {
        if ( $this->ver != "wml" )
        {
			$sub = strip_tags($sub, '<br><br/>');
        }
        $this->submit = false;
        $this->postfile .= isset( $this->postfile_sub ) ? $this->postfile_sub : $this->postfile_input;
        $this->postfile .= $this->postfile_select;
        if ( $url )
        {
            $this->action( $url );
        }
        if ( $emr )
        {
			foreach (explode(',', $emr) as $vl){
				list($name,$value) = explode("=", $vl);
				$this->postfile .= "<postfield name=\"{$name}\" value=\"{$value}\"/>\n";
				$this->submit .= $this->html("<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n");
			}
        }
        $this->submit .= $this->wml( "<anchor>".$sub."<go href=\"".$this->action."\" method=\"post\">".$this->postfile."".$code."</go></anchor><br/>" );
        $this->submit .= $this->html( "\n".$code."<input type=\"submit\" value=\"".$sub."\"/></form>" );
		unset($this->postfile);
		unset($this->postfile_input);
		unset($this->postfile_select);
		unset($this->postfile_sub);
        return $this->submit."\n";
    }

    public function submit1( $sub, $emr = false, $url = false )
    {
        if ( $this->ver != "wml" )
        {
			$sub = strip_tags($sub, '<br><br/>');
        }
        $this->submit = false;
        $this->postfile .= isset( $this->postfile_sub ) ? $this->postfile_sub : $this->postfile_input;
        $this->postfile .= $this->postfile_select;
        if ( $url )
        {
            $this->action( $url );
        }
        if ( $emr )
        {
            foreach ( explode( ",", $emr ) as $vl )
            {
                list($name, $value ) = split('=', $vl);	
				$this->postfile .= "<postfield name=\"{$name}\" value=\"{$value}\"/>\n";
                $this->submit .= $this->html( "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\"/>\n" );
            }
        }
        $this->submit .= $this->wml( "<anchor>".$sub."<go href=\"".$this->action."\" method=\"post\">".$this->postfile."".$code."</go></anchor><br/>" );
        $this->submit .= $this->html( "\n".$code."<input type=\"submit\" value=\"".$sub."\"/></form>" );
		unset($this->postfile);
		unset($this->postfile_input);
		unset($this->postfile_select);
		unset($this->postfile_sub);
        return $this->submit."\n";
    }

    public function submit2( $sub, $emr = false, $url = false )
    {
        global $SCRIPT_NAME;
        global $REG_KEY;
        if ( $this->ver != "wml" )
        {
			$sub = strip_tags($sub, '<br><br/>');
        }
        $this->submit = false;
        $this->postfile .= isset( $this->postfile_sub ) ? $this->postfile_sub : $this->postfile_input;
        $this->postfile .= $this->postfile_select;
        if ( $url )
        {
            $this->action( $url );
        }
        if ( $emr )
        {
            foreach ( explode( ",", $emr ) as $vl )
            {
                list($name, $value ) = split('=', $vl);	
				$this->postfile .= "<postfield name=\"{$name}\" value=\"{$value}\"/>\n";
                $this->submit .= $this->html( "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\"/>\n" );
            }
        }
        $this->submit .= $this->wml( "<anchor>".$sub."<go href=\"".$this->action."\" method=\"post\">".$this->postfile."".$code."</go></anchor><br/>" );
        $this->submit .= $this->html( "\n".$code."<input type=\"submit\" value=\"".$sub."\"/></form>" );
		unset($this->postfile);
		unset($this->postfile_input);
		unset($this->postfile_select);
		unset($this->postfile_sub);
        return $this->submit."\n";
    }

    public function Redirect( $refs, $avr )
    {
        $avr2 = $avr / 10;
        if ( $refs )
        {
            if ( $this->ver != wml )
            {
                $this->refres = "<META HTTP-EQUIV=\"Refresh\" Content=\"".$avr2."; URL=".$refs."\"/>";
            }
            else
            {
                $this->refres = " ontimer=\"{$refs}\"><timer value=\"{$avr}\"/";
            }
        }
        else
        {
            $this->refres = false;
        }
    }

	public function do_type($do_type){
		$this->do_type = false;
		$do_type_count = count($do_type);

		if($this->ver=='wml' and $do_type_count != "0"){
			while(list($num,$num1) = each($do_type)) {
			$this->do_type .= $num1;
			}
		}
		return $this->do_type;
	}



			function title($title, $align = false) {
				global $site;
				global $site_url_2;
				global $row;
				global $id;
				global $ps;
				global $ref;
				global $_v;
				global $_SERVER;
				
				$js_include = "";
				if(basename($_SERVER['PHP_SELF']) == "audiocapture.php"){
				$js_include .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>\n";
				$js_include .= "<script src='css/support.js'></script>\n";
				}

				if ($align == false) {
					if ($this->ver == wml) {
						$align = '<p>';
					}


					if ($this->ver != wml) {
						$align = '<div id=ileft>';
					}
				}
				else {
					if ($this->ver == wml) {
						$align = '<p align="' . $align . '">
';
					}


					if ($this->ver != wml) {
						$align = '<div id=i' . $align . '>';
					}
				}


				if ($this->ver == wml) {
					header( 'Content-type:text/vnd.wap.wml; charset=utf-8' );
					header( 'Cache-Control: no-cache' );
					echo '<?xml version="1.0" encoding="UTF-8"?>
';
				}
				else {
					header( 'Content-type: text/html; charset=utf-8' );
				}

				$this->wml( '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.2//EN" "http://www.wapforum.org/DTD/wml12.dtd">' );
				$this->wml( '<wml>' );
				$this->wml( '<head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>' );
				$this->wml( '<card title="' . $title . '"' . $this->refres . '>' );
				echo $this->do_type( $_v->do_type );
				$this->wml( $align );
				$file = @file( DOCUMENT_ROOT . 'file/dat_folder/n_n/style.dat' );
				$number_3 = trim( $file[2] );

				if ($this->ver != wml) {

				}


				if (( $this->ver != 'wml' && $number_3 != '1' )) {
					$this->html( '<!DOCTYPE html><html lang="az"><head><meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>' . $this->refres . ( '<link href="http://' . $site_url_2 . '/css/' ) . $this->ver . '.css" rel="stylesheet" type="text/css"/>'.$js_include.'<title>' . $title . ( '</title></head><body><div class="bar ust_line"><div id="bar_right"><img src="http://' . $site_url_2 . '/css/logo.gif" alt="logo"/></div>' ) . $title . '</div>' );
					ses_sms( );
				

}


				if (( $this->ver != 'wml' && $number_3 != '0' )) {
					$this->html( '<!DOCTYPE html><html lang="az"><head><meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>' . $this->refres . ( '<link href="http://' . $site_url_2 . '/css/' ) . $this->ver . '.css" rel="stylesheet" type="text/css"/>'.$js_include.'<title>' . $title . '</title></head><body><div class="bar ust_line"><div id="bar_right"></div></div>' );
					ses_sms( );

					if (( isset( $row['id'] ) && $ps )) {
						$vanket = $row['vanket'];
						$r = mysql_query( 'select count(`readd`) as `num` from `zapiski` WHERE (`idtowhom` = \'' . $id . '\')and(`readd` = \'0\')and(`ininc` = \'1\');' );
						$a = mysql_fetch_array( $r );
						$inb = $a['num'];
						$msn = $row['msn'];
ses_sms();
						if (999 <= $msn) {
							$rr = mysql_query( 'select count(`readd`) as `num` from `mesaj` where (`idtowhom` = \'' . $id . '\')and(`ininc` =\'1\')and(`readd` =\'0\')' );
							$aa = mysql_fetch_array( $rr );
							$msn = $aa['num'];
							mysql_query( 'UPDATE `users` SET `msn` = \'' . $msn . '\' WHERE `id` = \'' . $id . '\' LIMIT 1;' );
						}
					}


					if (( $ps !== $row['pass'] && base64_decode( $ps ) !== $row['pass'] )) {
					}
					else {
						if ($msn != '0') {
							$msn1 = '<span id="ts"><span class="num">' . $msn . '</span></span>';
						}


						if ($inb != '0') {
							$mektub1 = '<span id="ts"><span class="num">' . $inb . '</span></span>';
						}


						if ($vanket != '0') {
							$vanket1 = '<span id="ts"><span class="num">' . $vanket . '</span></span>';
						}
					}
echo "<div class=\"bar ust_line rsize\" style=\"padding:0px;\"><table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"cedvel\" style=\"width:100%; min-width:320px; max-width:600px;\">\n";
            echo "<table class=\"events\"><tr><td class=\"main f3\">\n";

					
$sehife_adi = basename($_SERVER["SCRIPT_NAME"], ".php");
					if (isset( $row['id'] )) {
						echo "$site\n";

					}
					else {
						echo "$site\n";

					}


if(isset($row['id'])){
echo "<td><a class=\"icon\" href=\"http://".$site_url_2."/enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" title=\"Dehliz\"><img src=\"http://".$site_url_2."/css/img/home.png\" title=\"Dehliz\"/></a></td>\n";

}else{

echo "<td><a class=\"icon\" href=\"http://".$site_url_2."/index.php?ref=$ref\" title=\"Ana Sehife\"><img src=\"http://".$site_url_2."/css/img/home.png\" title=\"Ana Sehife\"/></a></td>\n";
        }


					if (isset( $row['id'] )) {
						echo "<td><a ".($sehife_adi == 'mesaj' ? "class='active'" : null)." href=\"http://{$site_url_2}/mesaj.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" title=\"Mesajlar\"><img src=\"http://{$site_url_2}/css/ic_message.png\" title=\"Mesajlar\"/>".$msn1."</a></td>\n";

					}
					else {
						echo "<td><a title=\"Mesajlar\"><img src=\"http://{$site_url_2}/css/ic_message.png\" title=\"Mesajlar\"/></a></td>\n";

					}


					if ($row['id']) {
						echo '<td><a '.($sehife_adi == 'bildiris' ? "class='active'" : null).' class="icon" href="http://' . $site_url_2 . '/bildiris.php?id=' . $id . '&amp;ps=' . $ps . '&amp;ref=' . $ref . '" title="Mektublar"><img src="http://' . $site_url_2 . '/css/img/jurnal.png" title="Mektublar"/>' . $mektub1 . '</a></td>
';
					}
					else {
						echo '<td><a class="icon" title="Mektublar"><img src="http://' . $site_url_2 . '/css/img/jurnal.png" title="Mektublar"/></a></td>
';
					}


					if ($row['id']) {
						echo '<td><a '.($sehife_adi == 'viewanket' ? "class='active'" : null).'class="icon" href="http://' . $site_url_2 . '/viewanket.php?id=' . $id . '&amp;ps=' . $ps . '&amp;ref=' . $ref . '" title="Qonaqlar"><img src="http://' . $site_url_2 . '/css/img/guest.png" title="Qonaqlar"/>' . $vanket1 . '</a></td>
';
					}
					else {
						echo '<td><a class="icon" title="Qonaqlar"><img src="http://' . $site_url_2 . '/css/img/guest.png" title="Qonaqlar"/></a></td>
';
					}


					if ($row['id']) {
						echo '<td><a '.($sehife_adi == 'cabinet' ? "class='active'" : null).'class="icon" href="cabinet.php?id=' . $id . '&amp;ps=' . $ps . '&amp;ref=' . $ref . '" title="Qur&#287;ular"><img src="http://' . $site_url_2 . '/css/img/setting.png" title="Qur&#287;ular"/></a></td>
';
					}
					else {
						echo '<td><a class="icon" title="Qur&#287;ular"><img src="http://' . $site_url_2 . '/css/img/setting.png" title="Qur&#287;ular"/></a></td>
';

					}
$file = @file("file/dat_folder/vikon.dat");
$arxa_fon = trim($file[0]);
if($arxa_fon == 0)
{
$_v->html('<div class="menu">');
 $_v->html('<div class="menu">');
}else{
 $_v->html('<div class="menu">');
$_v->html('
<style type="text/css">
	div.menu{
	background-position: center;
	background:url(http://'.$site_url_2.'/fon/'.$arxa_fon.'.png);
        padding:5px;
	position: relative;
	}
	
	div.menu a{
        A:link {color: blue;}
	color:#484949
	}
</style>');
$_v->html('<div class="arxa">');

			}


echo "</td></tr></table></div>\n";
$this->html( '<center><div class="rsize">' );

$this->html("<div class=\"line-menu\">".$title."</div>");


				}


if($number_3==0){
 
$this->html( '<center><div class="rsize">' );


}



				$this->html( '<div class="menu">' );
				$this->html( $align );
			}

    public function last_page( )
    {
        print $this->html( "<a href=\"javascript:window.history.go(-1);\">Geri Qay&#305;t</a><br/>" );
        print $this->wml( "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n" );
    }

    public function end( $ax = false, $link = false )
    {
        global $id,$ps, $ref, $site_url_2, $fsize1, $fsize2, $_SERVER;
        
		
        $number_1 = trim( $this->stylefile[0]);
        $number_2 = trim( $this->stylefile[1]);

        $this->html( "</div></div></center><div class=\"bar alt_line\">" );
        $this->wml( "</p><p align=\"{$number_2}\">" );
        $this->html( "<p align=\"{$number_2}\">" );
        $this->fsize1( $fsize1 );

        $this->fsize2( $fsize2 );
        $this->wml( "</p></card></wml>" );
        $this->html( "</div></body></html>" );
        if ( $link )
        {
            mysql_close( $link );
        }
    }

}
function ses_sms( )
{
    global $site_url_2;
    global $row;
    global $id;
    global $ps;
    global $ref;
    global $rm;
    global $pwd;
    global $_SERVER;
    global $_GET;
    global $_POST;
    global $SERVER_TIME;
    if ( $row['ssms'] != 0 ){
        if ( $row['sms'] != "0" ){
            echo "<audio autoplay><source src=\"http://{$site_url_2}/css/img/message.wav\"><source src=\"http://{$site_url_2}/css/img/message.wav\"><bgsound src=\"http://{$site_url_2}/css/img/message.wav\" loop=\"-1\"></audio>";
        }
        mysql_query( "UPDATE `users` SET `sms` = '0' WHERE `id` = '".$id."' LIMIT 1;" );
    }
}

function anti_spam_mk( )
{
    if ( $_SERVER['HTTP_USER_AGENT'] == "" )
    {
        exit( "Stop Et" );
    }
}


$SCRIPT_NAME = $_SERVER['SERVER_ADDR'];
$agent = $_SERVER;
$axt = "anony";
$konum = $axt;
if ( $agent == "http://Anonymouse.org/ (Unix)" )
{
    echo $xml;
    echo $dtd;
    echo "<wml>\n";
    echo "<card id=\"stop\" title=\"stop\">\n";
    echo "<p align=\"center\">";
    echo "<small>";
    echo "Stop Et..!<br/>";
    echo "</small>";
    echo "</p></card></wml>";
    exit( );
}


?>