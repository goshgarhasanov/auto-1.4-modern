<?php

if(!file_exists("$img")){
$img = ImageCreateFromjpeg( "http://doysan.net/chat/img/no_img.jpeg" );
if($img) {
header("Content-Type: image/jpeg");
Imagejpeg($img);
ImageDestroy($img);
}
exit;
}

$httphost=explode('.',$img);
$type =trim($httphost[1]);
if($type!="jpeg" and $type!="jpg" and $type!="gif" and $type!="png")
exit;

header("Content-type: image/jpeg");
$par = getimagesize("".$img."");
if($size<=5)$size=50;
if($size>=250)$size=250;

$par0=trim($par[0]);
$par1=trim($par[1]);
$artiq=$par0-$par1;
$artiq = $artiq/$par1;
$artiq = $artiq*$size;

$x1 = $par0*$size;
$boy = $x1/$par0;

$x2 = $par1*$size;
$uzun = $x2/$par1;

$uzun = $uzun+$artiq;
$boy = $boy;

$test2=$uzun+$boy;
$test1 = $size+$size;
if($test2>$test1){
$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}if($test2>$test1){
$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}if($test2>$test1){
$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}if($test2>$test1){
$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}
elseif($test2>$test1){

$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}
elseif($test2>$test1){

$uzun = $uzun/1.1;
$boy = $boy/1.1;
$test2=$uzun+$boy;
}
$boy = $boy;
$uzun = $uzun;

if($par[2]=="1")
{

if(substr($img,0,1)!=".")
{
$old = imageCreateFromGif("$img");
{
$w = imageSX($old);
$h = imageSY($old);


$new = imageCreateTrueColor($uzun, $boy);
imageCopyResized($new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h);
imageJpeg($new,"","70");
}
}
}
elseif($par[2]=="2")
{
if(substr($img,0,1)!=".")
{
$old = imageCreateFromjpeg("$img");
{
$w = imageSX($old);
$h = imageSY($old);



$new = imageCreateTrueColor($uzun, $boy);
imageCopyResized($new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h);
imageJpeg($new,"","70");
}
}
}
elseif($par[2]=="3")
{
if(substr($img,0,1)!=".")
{
$old = imagecreatefrompng("$img");
{
$w = imageSX($old);
$h = imageSY($old);



$new = imageCreateTrueColor($uzun, $boy);
imageCopyResized($new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h);
imageJpeg($new,"","70");
}
}
}
else
{
$img = ImageCreateFromjpeg( "http://doysan.net/chat/img/no_img.jpeg" );
if($img) {
header("Content-Type: image/jpeg");
Imagejpeg($img);
ImageDestroy($img);
}
}
?>