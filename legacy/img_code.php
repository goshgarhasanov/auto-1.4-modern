<?php

$count=strlen($user);
$horizontal=9*$count+3;
$c1 = rand(50,255);
$c2 = rand(0,255);
$c3 = rand(50,255);

$im = imagecreate($horizontal, 15);

$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, $c1, $c2, $c3);

imagestring($im, 5, 1, 0, ''.$user.'', $textcolor);
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>