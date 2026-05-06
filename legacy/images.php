<?php
require("inc.php");

if(!file_exists("$img")){
$img = ImageCreateFromjpeg("http://$site_url_2/img/no_img.jpeg");
if($img) {
header("Content-Type: image/jpeg");
Imagejpeg($img);
ImageDestroy($img);
}
exit;
}

$httphost=explode('.',$img);
$img_type =trim($httphost[1]);

if($img_type!="jpeg" and $img_type!="jpg" and $img_type!="gif" and $img_type!="png")
exit;



$size_x_y=GetImageSize("".$img."");
$x = "$size_x_y[0]"; $y = "$size_x_y[1]";


$filename = "".$img."";
// Set a maximum height and width
$width = 300;
$height = 300;

// Content type
if($size_x_y[2]=="1"){header('Content-type: image/gif');}
elseif($size_x_y[2]=="2"){header('Content-type: image/jpeg');}
elseif($size_x_y[2]=="3"){header('Content-type: image/png');}
else exit;
// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

// Resample

$fon = imagecreatetruecolor($x, $y);

if($size_x_y[2]=="1"){header('Content-type: image/gif');}
elseif($size_x_y[2]=="2"){header('Content-type: image/jpeg');}
elseif($size_x_y[2]=="3"){header('Content-type: image/png');}
else exit;

if($size_x_y[2]=="1"){$image = imagecreatefromgif($filename);}
if($size_x_y[2]=="2"){$image = imagecreatefromjpeg($filename);}
if($size_x_y[2]=="3"){$image = imagecreatefrompng($filename);}


$fon_x = $width_orig;
$fon_y = $height_orig;

$soldan_saga = $width_orig;
$yuxaridan_asagi = $height_orig;

$sekil_x = $width_orig;
$sekil_y = $height_orig;

$seklin_x_olcusu = $x;
$seklin_y_olcusu = $y;


imagecopyresampled($fon, $image, $fon_x*0, $fon_y*0, $sekil_x*0, $sekil_y*0, $seklin_x_olcusu, $seklin_y_olcusu, $soldan_saga, $yuxaridan_asagi);

		$soz = $site; 
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
if($size_x_y[2]=="1"){
imagegif($fon, null, 80);
}
if($size_x_y[2]=="2"){
imagejpeg($fon, null, 80);
}
if($size_x_y[2]=="3"){
imagegif($fon, null, 80);
}
?>