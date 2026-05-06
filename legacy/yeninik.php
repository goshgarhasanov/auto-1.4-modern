<?php
error_reporting(0);
header ("Content-type: text/html; charset=utf-8");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-relative");
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

$ref=rand(0,1000000);


if($p_arr['78']!=1){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>Rengli Nik</title>\n";
echo "<style type=\"text/css\">
body { font-weight: normal; font-size: normal; font-family: #445544; color: #ffffff; background-color: #AA0044 }
a:link,a:active,a:visited { text-decoration: underline; color : red }
div { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }
div.form { background-color: red }
</style></head><body>";
echo "<p align=\"center\">\n";
echo "<b>Sizin <u>Rengli Nik Paneli</u>-ne giri&#351; icazeniz yoxdur!</b><br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</center></body></html>";
mysql_close ($link);
exit;
}


if($p_arr['3']!=1){
header ("Location: enter.php?id=$id&ps=$ps&ref=$ref");
exit;
}
if(!file_exists("file/select/".$id.".reg")){
$newtm = $SERVER_TIME+300;
$save_new=fopen("file/select/".$id.".reg","w");
$qeyd_new = $newtm."\n";
$qeyd_new .= "0\n";
fputs($save_new,$qeyd_new);
fclose($save_new);
$keygens = '0';
}else{
$keys = file("file/select/".$id.".reg");
$srok = trim($keys[0]);
$keygens = trim($keys[1]);
}


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>Rengli Nik</title>\n";
echo "<style type=\"text/css\">
body { font-weight: normal; font-size: normal; font-family: red; color: #000000; background-color: #779977 }
a:link,a:active,a:visited { text-decoration: underline; color : red }
div { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }
div.form { background-color: #AACCAA }
</style></head><body>";


if(!isset($_POST['action']))
{

echo "<div class=\"form\">\n";
echo "<form action=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Kime</b> (Leqebi)<br/>\n";
echo "<input type=\"nick$ref\" name=\"nick\" /><br/>\n";
echo "<b>Rengli niki</b><br/>\n";
echo "<input type=\"file\" name=\"nik\" /><br/>\n";


echo "<u>Qeyd:</u> <br/>\n";
echo "<input type=\"text\" name=\"text\" /><br/>\n";
echo "<u>Ne&#231;e G&#252;nl&#252;k?</u> <br/>\n";
echo "<input type=\"text\" name=\"gun\"/><br/>\n";
echo "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n";
echo "<input type=\"submit\" value=\"G&#246;nder\" /><br/></form></div>\n";
}
else
{

    if(!is_uploaded_file($_FILES['nik']['tmp_name']))
	{
echo "<b>Rengli niki se&#231;memisiniz.</b><br/>---<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit();
	}

	if(filesize($_FILES['nik']['tmp_name']) > 200000)
	{
	echo "&#350;eklin hecmi 20 kb-den &#231;ox olmas&#305;na icaze verilmir.<br/>Eger &#351;ekilin &#246;l&#231;&#252;s&#252; &#231;ox olsa chata telefonla girenlerin vay hal&#305;na;)))<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit();
	}

	$propr = getimagesize($_FILES['nik']['tmp_name']);
	if($propr[0] > 500 || $propr[1] > 250)
	{
echo "500x250 ol&#231;&#252;den &#231;ox olan &#351;ekillere icaze verilmir. (Chatda Anormal g&#246;rsenir) Standart olcu eslinde 190x85-dir<br/><i>Y&#252;klediyiniz Nikin &#246;l&#231;&#252;s&#252;: ".$propr[0]."x".$propr[1]."<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit();
	}

$nk =$nick;
if (!ctype_digit($nk)) {
$nk=trim($nk);
if($nk=="")$nk=999999999999;
$nk=strtolower($nk);

$q = mysql_query("SELECT * FROM `users` WHERE `latuser` = '".$nk."';");
}
else
{
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
}

if(mysql_affected_rows() == 0)
{
echo "<b>$nk</b>. leqebli istifade&#231;i bazada yoxdur.
<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit();
}
else
{
$users = mysql_fetch_array($q);
$usser = $users['user'];
$toid = $users['id'];
$vaxts = $gun * 86400 + $SERVER_TIME;

}


$bal_i = mysql_query("SELECT `saat` FROM `hesab` WHERE `usid` = '".$toid."' and `x`='9';");
if(mysql_affected_rows() != 0)
{

$bi = mysql_fetch_array($bal_i);
$saatbal = $bi['saat'];

$tkick = $saatbal - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

echo "<b>$usser</b>. leqebli istifade&#231;inin Rengli nik d&#252;zeltmek sistemi var.<br/>Rengli nik d&#252;zeltme vaxt&#305; qurtard&#305;qdan sonra ona rengli niki panelden vermek olar.<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit();

}










$date = date("d-m-Y H:i:s",$SERVER_TIME);

$q = mysql_query("SELECT * FROM `c_nick` WHERE `to` = '".$toid."';");
if(mysql_num_rows($q) != 0)
{

$axtar = mysql_fetch_array($q);
$sonvaxt = $axtar['time'];

$tkick = $sonvaxt - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

echo "<b>$usser</b>,  leqebli &#350;exsin <u>Rengli Niki</u> Var...<br/>\n";
echo "<b>Nikin vaxt&#305;na $tkick $vaxt qal&#305;b</b>\n";
echo "<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo "</div></body></html>";
exit();
}


function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|http|post|else|basename|hr+c)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
if(is_image($_FILES['nik']['tmp_name']) == "shell")
{
print '<b>Diqqet Xeta: </b>  Anti shell..<br/>';
echo '----</div>';	
echo "<br/><a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</div></body></html>";
exit();
}

/////////////////////////


$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['nik']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['nik']['name']);

			if($FileSize > 20 * 1024) { // 20 kb
				$albom->error = '&#350;ekil 20 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}

if($albom->error) {
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '----</div>';	
echo "<a href=\"yeninik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</div></body></html>";
exit();
}




$adi = $toid.".gif";
	
if(copy($_FILES['nik']['tmp_name'], "i/".$adi.""))
	{
	echo "Nikin G&#246;r&#252;nt&#252;s&#252;: <img src='i/".$adi."'/><br/>M&#252;ddeti: $gun g&#252;nl&#252;k<br/>----<br/>\n";
    }
$query = mysql_query("INSERT INTO `c_nick` VALUES(0, '".$id."', '".$toid."', '".$adi."', '".$date."', '".$vaxts."', '".$gun."', '".$text."');");

if($query)
{
$olchu=round(filesize("i/".$adi."")/1024,1);
echo "<b>".$olchu." Kb Rengli nik <u>$usser</u> leqebli istifade&#231;iye  verildi.</b><br/>\n";
}
else
{
echo "<b>Sehv Var.</b><br/>\n";
echo "<u>".mysql_error()."</u><br/>\n";
}
}
echo "<a href=\"renglinik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Nik Paneli</a><br/>\n";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</body></html>";
?>