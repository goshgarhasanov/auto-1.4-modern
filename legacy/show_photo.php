<?php
header ("Content-type: image/jpeg");
require("inc.php");
connect_db();

if(isset($_GET["id"]))
{
    if(@mysql_num_rows(@mysql_query("select * from albom where id='".$_GET["id"]."'"))!=0)
    {
    $q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$_GET["id"]."';");
    $arr = mysql_fetch_array($q);
    $photo=$arr['photo'];
    $idfoto=$arr['idfoto'];
    $img = "photos/$idfoto/$photo";
    }
    else
    {
        $img = "img/no_img.jpeg";
    }
}
$w = $_GET['w'];
$h = $_GET['h'];

$x = @getimagesize($img);
$sw = $x[0];
$sh = $x[1];

if (isset($w) AND !isset($h))
{
    $h = (100 / ($sw / $w)) * .01;
    $h = @round ($sh * $h);
}
else if (isset($h) AND !isset($w))
{
    $w = (100 / ($sh / $h)) * .01;
    $w = @round ($sw * $w);
}

$im = @ImageCreateFromJPEG ($img) or
$im = @ImageCreateFromPNG ($img) or
$im = @ImageCreateFromGIF ($img) or
$im = false;

if (!$im) {
    exit ('Sen Guya Agillisan? Imza: Tuti');
} else {
    $thumb = @ImageCreateTrueColor ($w, $h);
    @ImageCopyResampled ($thumb, $im, 0, 0, 0, 0, $w, $h, $sw, $sh);
    @ImageJPEG ($thumb);
}
?>