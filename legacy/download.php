<?php
require("ay.php");
$link = connect_db();

$id = $_GET['id'];
$select = mysql_query("select * from users where id = '".$id."'");
$s = mysql_fetch_array($select);

$saat = $s['d_time'];

if($saat < time()){
echo "Xidmet sizin &#252;&#231;&#252;n aktiv deyil<br/>";
mysql_close($link);
exit;
}


$lid = intval($_GET['lid']);
$fid = intval($_GET['fid']);
$sid = intval($_GET['sid']);
$qovluq = "down";



$q = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$fid."';");
$inf = mysql_fetch_array($q);
$kataloq = $inf['name'];

$qa = mysql_query("SELECT * FROM `down` WHERE `id` = '".$sid."';");
$info = mysql_fetch_array($qa);
$bolme = $info['name'];


$qe = mysql_query("SELECT * FROM `down_files` WHERE `id` = '".$lid."';");
$array = mysql_fetch_object($qe);
$file = $array->file;
$type = $array->type;

$go ="$qovluq/$bolme/$kataloq/$file";

if(!file_exists($go)){
header("location: down.php?id=$id&amp;ps=$ps&amp;bol=show&amp;sid=$sid&amp;fid=$fid&amp;ref=$ref");
}else{

if($type==1){
$lik=explode('.',$file);
$typ =trim($lik[1]);
if($typ!="jpeg" and $typ!="jpg" and $typ!="gif" and $typ!="png")
exit;

$foto ="$qovluq/$bolme/$kataloq/$file";

$size_x_y=GetImageSize("".$foto."");
$x = "$size_x_y[0]";
 $y = "$size_x_y[1]";
$img_type=$typ;
$filename = "".$foto."";
$width = 300;
$height = 300;
if($img_type=="jpeg"){header('Content-type: image/jpeg');}
if($img_type=="jpg"){header('Content-type: image/jpeg');}
if($img_type=="gif"){header('Content-type: image/gif');}
if($img_type=="png"){header('Content-type: image/png');}
list($width_orig, $height_orig) = getimagesize($filename);
$ratio_orig = $width_orig/$height_orig;
$fon = imagecreatetruecolor($x, $y);
if($img_type=="jpeg"){$image = imagecreatefromjpeg($filename);}
if($img_type=="jpg"){$image = imagecreatefromjpeg($filename);}
if($img_type=="gif"){$image = imagecreatefromgif($filename);}
if($img_type=="png"){$image = imagecreatefrompng($filename);}
$fon_x = $width_orig;
$fon_y = $height_orig;
$soldan_saga = $width_orig;
$yuxaridan_asagi = $height_orig;
$sekil_x = $width_orig;
$sekil_y = $height_orig;
$seklin_x_olcusu = $x;
$seklin_y_olcusu = $y;
imagecopyresampled($fon, $image, $fon_x*0, $fon_y*0, $sekil_x*0, $sekil_y*0, $seklin_x_olcusu, $seklin_y_olcusu, $soldan_saga, $yuxaridan_asagi);
$soz = "$site";
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
if($img_type=="jpeg"){
imagejpeg($fon, null, 80);
}
if($img_type=="jpg"){
imagejpeg($fon, null, 80);
}
if($img_type=="gif"){
imagegif($fon, null, 80);
}
if($img_type=="png"){
imagegif($fon, null, 80);
}


}else{
header("location: $go");
}
mysql_query("UPDATE `down_files` SET `count_download` = count_download +1 WHERE `id` = '".$lid."';");
}

?>