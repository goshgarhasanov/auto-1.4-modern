<?php
require("inc.php");
$link = connect_db();

header ('Content-type: image/gif');

$font = $_GET['font'];
$color = $_GET['color'];
$id = $_GET['id'];

$q = @mysql_query ("Select `user` from `users` where `id`='".$id."' LIMIT 1;");

if(mysql_affected_rows() == 0)
{
$text = "Error";
$count=strlen($text);
$horizontal=7*$count+8;
$vertical=14;
$olchu = 3;
$image = imagecreate($horizontal, $vertical);
$font_color_create = imagecolorallocate($image, 0, 0, 0);
$text_color_create = imagecolorallocate($image, 255, 255, 255);
imagestring($image, $olchu, 5, 0,  $text, $text_color_create);
imagegif($image);
imagedestroy($image);
exit();
}
$row = mysql_fetch_array($q);
$user = $row['user'];
$count=strlen($user);



// Fonun rengi evvel
if($font=="01"){$font_color_1=255;$font_color_2=255;$font_color_3=255;}//ag
if($font=="02"){$font_color_1=255;$font_color_2=0;$font_color_3=255;}//chehrayi
if($font=="03"){$font_color_1=255;$font_color_2=0;$font_color_3=0;}//qirmizi 
if($font=="04"){$font_color_1=255;$font_color_2=255;$font_color_3=0;}//sari
if($font=="05"){$font_color_1=255;$font_color_2=128;$font_color_3=0;}//narinci
if($font=="06"){$font_color_1=0;$font_color_2=255;$font_color_3=255;}//achiq mavi
if($font=="07"){$font_color_1=0;$font_color_2=173;$font_color_3=239;}//tund mavi
if($font=="08"){$font_color_1=128;$font_color_2=0;$font_color_3=255;}//benovsheyi
if($font=="09"){$font_color_1=0;$font_color_2=0;$font_color_3=255;}//achiq goy
if($font=="10"){$font_color_1=46;$font_color_2=48;$font_color_3=146;}//tund goy
if($font=="11"){$font_color_1=0;$font_color_2=255;$font_color_3=0;}//achiq yashil
if($font=="12"){$font_color_1=0;$font_color_2=166;$font_color_3=80;}//tund yashil
if($font=="13"){$font_color_1=128;$font_color_2=0;$font_color_3=0;}//qehveyi
if($font=="14"){$font_color_1=64;$font_color_2=64;$font_color_3=64;}//75 boz
if($font=="15"){$font_color_1=128;$font_color_2=128;$font_color_3=128;}//50 boz
if($font=="16"){$font_color_1=192;$font_color_2=192;$font_color_3=192;}//25 boz
if($font=="17"){$font_color_1=0;$font_color_2=0;$font_color_3=0;}//qara
// Fonun rengi son
				
// Metnin rengi evvel
if($color=="01"){$text_color_1=255;$text_color_2=255;$text_color_3=255;}//ag
if($color=="02"){$text_color_1=255;$text_color_2=0;$text_color_3=255;}//chehrayi
if($color=="03"){$text_color_1=255;$text_color_2=0;$text_color_3=0;}//qirmizi 
if($color=="04"){$text_color_1=255;$text_color_2=255;$text_color_3=0;}//sari
if($color=="05"){$text_color_1=255;$text_color_2=128;$text_color_3=0;}//narinci
if($color=="06"){$text_color_1=0;$text_color_2=255;$text_color_3=255;}//achiq mavi
if($color=="07"){$text_color_1=0;$text_color_2=173;$text_color_3=239;}//tund mavi
if($color=="08"){$text_color_1=128;$text_color_2=0;$text_color_3=255;}//benovsheyi
if($color=="09"){$text_color_1=0;$text_color_2=0;$text_color_3=255;}//achiq goy
if($color=="10"){$text_color_1=46;$text_color_2=48;$text_color_3=146;}//tund goy
if($color=="11"){$text_color_1=0;$text_color_2=255;$text_color_3=0;}//achiq yashil
if($color=="12"){$text_color_1=0;$text_color_2=166;$text_color_3=80;}//tund yashil
if($color=="13"){$text_color_1=128;$text_color_2=0;$text_color_3=0;}//qehveyi
if($color=="14"){$text_color_1=64;$text_color_2=64;$text_color_3=64;}//75 boz
if($color=="15"){$text_color_1=128;$text_color_2=128;$text_color_3=128;}//50 boz
if($color=="16"){$text_color_1=192;$text_color_2=192;$text_color_3=192;}//25 boz
if($color=="17"){$text_color_1=0;$text_color_2=0;$text_color_3=0;}//qara

// Metnin rengi son



$horizontal=7*$count+8;
$vertical=14;
$olchu = 3;


$image = imagecreate($horizontal, $vertical);

$font_color_create = imagecolorallocate($image, $font_color_1, $font_color_2, $font_color_3);
$text_color_create = imagecolorallocate($image, $text_color_1, $text_color_2, $text_color_3);

imagestring($image, $olchu, 5, 0,  $user, $text_color_create);

imagegif($image);
imagedestroy($image);
?>