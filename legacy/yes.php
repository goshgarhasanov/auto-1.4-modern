<?php
$W = intval($_GET['W']);
$H = intval($_GET['H']);
$file = $_GET['pic'];
$frame = 3;
//dl("ffmpeg.so");

$mov = new ffmpeg_movie($file);
$w = $mov->GetFrameWidth();
$h = $mov->GetFrameHeight();
$ff_frame = $mov->getFrame($frame);
if ($ff_frame) {
    $gd_image = $ff_frame->toGDImage();
    if ($gd_image) {
$des_img = imagecreatetruecolor(65, 55);
$s_img = $gd_image;
imagecopyresampled($des_img, $s_img, 0, 0, 0, 0, 65, 55, $w, $h);
imagegif($des_img);
imagedestroy($des_img);
imagedestroy($s_img);

    }
}
?>
