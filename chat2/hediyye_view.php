<?php
extract($HTTP_GET_VARS);
extract($HTTP_POST_VARS);
extract($HTTP_SERVER_VARS);

header("Content-type: image/jpeg");
$W = intval(@$_GET['W']);
$H = intval(@$_GET['H']);

$pic = urldecode(htmlspecialchars($_GET['pic']));
if(substr($pic,0,1)!=".")
{
if(preg_match("/\.gif$/i", $pic)) $old = imageCreateFromGif("$pic");
if(preg_match("/\.jpg$|\.jpeg$|\.jpe$/i", $pic)) $old = imageCreateFromJpeg("$pic");
{
$w = imageSX($old);
$h = imageSY($old);
if($W=="" and $H=="")
{
$W=round(80); // ширина картинки
$H=round(80); // высота картинки
}

$new = imageCreateTrueColor($W, $H);
imageCopyResized($new, $old, 0, 0, 0, 0, $W, $H, $w, $h);
imageJpeg($new,"","100");
}
}
?>