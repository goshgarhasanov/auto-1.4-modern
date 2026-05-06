<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

function count_files($dirname){
if(is_dir($dirname)){
$dir_handle = opendir($dirname);
}
if(!$dir_handle){
return false;
}
$files = 0;
while($file = readdir($dir_handle)){
if($file != "." and $file != ".." and $file != ".htaccess" and $file != "Thumbs.db" and strrchr($file,'.')!=='.dat' and strrchr($file,'.')!=='.php' and strrchr($file,'.')!=='.wml' and strrchr($file,'.')!=='.inc'){
if(!is_dir($dirname."/".$file)){
$files++;
} else {
$files += count_files($dirname."/".$file);
}
}
}
closedir($dir_handle);
return $files;
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

function gen($size){
$letter = 'qwertyuipasdfghjklzxcvbnm';
$letter .= strtoupper($letter);
$letter .= '123456789';
mt_srand((double)microtime()*1000000);
$gen = "";
for ($i = 0; $i < $size; $i++){
$gen .= $letter[mt_rand(0, strlen($letter)-1)];
}
return $gen;
}


function imagecopyright($img, $copy){
$img_x = imagesx($img);
$img_y = imagesy($img);
$copy_x = imagesx($copy);
$copy_y = imagesy($copy);
$w = intval(min($img_x/1.5,$copy_x,228));
$h = intval(min($img_y/1.5,$copy_y,164));
$x_ratio = $w / $copy_x;
$y_ratio = $h / $copy_y;

if($copy_x <= $w and $img_y <= $h){
$dstW = $copy_x;
$dstH = $copy_y;
} elseif(($x_ratio * $copy_y) < $h) {
$dstH = ceil($x_ratio * $copy_y);
$dstW = $w;
} else {
$dstW = ceil($y_ratio * $copy_x);
$dstH = $h;
}
imagecopyresampled($img, $copy, $img_x-$dstW, $img_y-$dstH, 0, 0, $dstW, $dstH, $copy_x, $copy_y);
return $img;
}

if($row['room']!='27'){
mysql_query("UPDATE `users` SET `room` = '27' WHERE `id` = '".$id."' LIMIT 1;");
}
if($_v->ver=="wml")$_v->ver="win";


if ( $row['posts'] <= 199 ){

$_v->title('MMS G&#246;nder','center');
echo "<b><big>MMS Fayl g&#246;nder</big></b><br/>";
$_v->align('left');
echo "<div class=\"my sms\">\n";
echo "MMS Mektub (gif, jpeg, jpg, png, 3gp, mp3, doc) xidmetinden istifade etmek &#252;&#231;&#252;n<br/>";
echo "Sizin minumum <b>200</b> postunuz olmal&#305;d&#305;r!<br/>";
echo "</div>";
$_v->divide();
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
$_v->end('0',$link);
die();
}
$_v->title('MMS G&#246;nder','center');
echo "<b><big>MMS Fayl g&#246;nder</big></b><br/>";
$_v->align('left');
switch ($case) {
default: 
		

if ( !isset( $_POST['action'] ) ){

if ( isset( $toid ) ){
$sql = mysql_query( "SELECT `user` FROM `users` WHERE `id` = '".$toid."';" );
$name = mysql_result( $sql, 0 );
}

echo "<div class=\"my sms\">\n";
echo "<form action=\"upload.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Kime (Leqeb /ID):</b><br/>\n";
echo "<input type=\"text\" name=\"nick\" value=\"{$name}\" /><br />\n";
echo "<b>MMS fayl Daxil et:</b><br/>\n";
echo "<input type=\"file\" name=\"mms\" /><br />\n";
echo "<u>Qeyd:</u> <br/>\n";
echo "<input type=\"text\" name=\"text\" /><br />\n";
echo "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n";
echo "<input type=\"submit\" value=\"G&#246;nder\" /><br /></form></div>\n";
}else{
$nick = htmlspecialchars( mysql_escape_string( trim( $_POST['nick'] ) ) );
$text = chkdsk( $text, basename( __FILE__ ), "MMS qeyd");
$text = narmobil( $text );

if ( !is_uploaded_file( $_FILES['mms']['tmp_name'] ) ){
echo "<div class=\"my sms\">\n";
echo "<b><u>STOP!</b></u><br/>----<br/>";
echo "Fayl&#305; Se&#231;memisiz.<br/>\n";
echo "</div>";
$links = "x";
break;
}

if ( 1024 * 5100 < filesize( $_FILES['mms']['tmp_name'] ) ){
echo "<div class=\"my sms\">\n";
echo "<b><u>STOP!</u></b><br/>----<br/>";
echo "MMS Fayl&#305;n hecmi 5 MB-den &#231;ox olmamal&#305;d&#305;r!<br />\n";
echo "</div>";
$links = "x";
break;
}
$ilaygun = date("d.m.Y", $SERVER_TIME );
$bu_gunun_time = strtotime( $ilaygun );
$count = mysql_query( "SELECT COUNT(`id`) FROM `mms` WHERE `id` = '".$id."' and `time`>='{$bu_gunun_time}';" );
$all_mms = @mysql_result( @$count, 0 );

if ( 16 <= $all_mms ){
echo "<div class=\"my sms\">\n";
echo "<b><u>STOP!</u></b><br/>----<br/>";
echo "G&#252;n erzinde 15 defe mms g&#246;ndere bilersiz.<br />\n";
echo "</div>";
$links = "x";
break;
}

$nick = strtolower( $nick );
if ( !ctype_digit( $nick ) ){
$nick = trim( $nick );
if ( $nick == "" ){
$nick = 0;
}

$latuser = strtolower( $nick );
$latuser = mysql_escape_string( $latuser );
$q = mysql_query( "SELECT * FROM `users` WHERE `latuser` = '".$latuser."';" );
}else{
$nick = mysql_escape_string( $nick );
$q = mysql_query( "SELECT * FROM `users` WHERE `id` = '".$nick."';" );
}

if ( mysql_affected_rows( ) <= 0 ){
echo "<div class=\"my sms\">\n";
echo "<b><u>Tap&#305;lmad&#305;!</b></u><br/>----<br/>";
if ( $nick == "" ){
echo "<b>Siz he&#231; bir leqeb yazmad&#305;z MMS kime g&#246;nderim? )))</b><br/>";
}else{
if ( $latuser ){
echo "<b><u>{$nick}</u>, leqebli</b>";
}else{
echo "<b>ID n&#246;mresi <u>{$nick}</u>, olan</b>\n";
}

echo "<b>istifade&#231;i bazada tap&#305;lmad&#305;.</b><br/>\n";
}

echo "</div>";
$links = "x";
break;
}

$user_data = mysql_fetch_array( $q );
$toid = $user_data['id'];
$nick = $user_data['user'];
$mektub_q = $user_data['mektub_qebulu'];
if ( $row['level'] != 9 ){

if ( $mektub_q == 1 ){
mysql_query( "Select * from friends where usid='".$id."' and id='".$toid."'" );
if ( mysql_affected_rows( ) == false ){
echo "<div class=\"my sms\">\n";
echo "<u><b>STOP!</b></u><br/>----<br/>";
echo "<u>Bu istifade&#231;i yaln&#305;z dostlar&#305;ndan MMS qebul edir.</u>";
echo "</div>";
$links = "x";
break;
}
}

if ( $mektub_q == 2 ){
echo "<div class=\"my sms\">\n";
echo "<u><b>STOP!</b></u><br/>----<br/>";
echo "<u>Bu istifade&#231;i MMS qebul etmir.</u>";
echo "</div>";
$links = "x";
break;
}
}

@mysql_query( @"Select * from ignor where usid='".@$id."' and id='".@$toid."'" );
if ( mysql_affected_rows( ) == true ){
echo "<div class=\"my sms\">\n";
echo "<u><b>STOP!</b></u><br/>----<br/>";
echo "<b>".$nick."</b> <i>Sizi ignor edib</i>.<br/>Bu veziyyetde Siz ona mms g&#246;ndere bilmersiz!\n";
echo "</div>";
$links = "x";
break;
}

$propr = getimagesize( $mms );
$date = date("d-m-Y H:i", $SERVER_TIME );
$razmer = round( filesize( "".$mms."" ) / 1024, 1 );

if ( $toid == $id )
{
echo "<div class=\"my sms\">\n";
echo "<u><b>STOP!</b></u><br/>----<br/>";
echo "<b>Havalan&#305;bsan?</b><br/>\n";
echo "</div>";
$links = "x";
break;
}

$q = mysql_query( "SELECT * FROM `mms` WHERE `kod` = '".$razmer."' AND `to` = '".$toid."' AND `id` = '".$id."' order by `time` DESC limit 1" );
if ( mysql_num_rows( $q ) != 0 ){
echo "<div class=\"my sms\">\n";
echo "<u><b>STOP!</b></u><br/>----<br/>";
echo "<b>Bu &#351;ekili siz daha &#246;nce <u>{$nick}</u>, leqebli istifade&#231;iye  g&#246;nderibsiz!</b><br/>\n";
echo "</div>";
$links = "x";
break;
}

$rn = rand( 1000, 9999999 );
$pathinfo = pathinfo( $_FILES['mms']['name'] );
$photo_type = strtolower( $pathinfo['extension'] );
$adi = $id."-".$rn.".".$photo_type;
$aktiv = array( "gif", "jpeg", "jpg", "png", "3gp", "mp3", "doc" );

if (!in_array( $photo_type, $aktiv )) {
echo "<div class=\"my sms\">\n";
echo "<b><big>Diqqet!</b></big><br/>----<br/><i>Siz yaln&#305;z a&#351;a&#287;&#305;dak&#305; formatlarda olan fayllar g&#246;ndere bilersiz:</i><br/>";
echo "gif, jpeg, jpg, png, 3gp, mp3, doc ve.s<br/>\n";
echo "</div>";
$links = "x";
break;
}

if(!preg_match('/(jpg|png|gif|jpeg|3gp|mp3|doc)/i',strtolower($photo_type))){
echo "<div class=\"my sms\">\n";
echo "<b><big>Anti Shell!</b></big><br/>----<br/><i>Siz yaln&#305;z a&#351;a&#287;&#305;dak&#305; formatlarda olan fayllar g&#246;ndere bilersiz:</i><br/>";
echo "gif, jpeg, jpg, png, 3gp, mp3, doc ve.s<br/>\n";
echo "</div>";
$links = "x";
break;
}

if(is_image($_FILES['mms']['tmp_name']) == "shell"){
echo "<div class=\"my sms\">\n";
echo "<b><big>Anti Shell!</b></big><br/>----<br/><i>Siz yaln&#305;z a&#351;a&#287;&#305;dak&#305; formatlarda olan fayllar g&#246;ndere bilersiz:</i><br/>";
echo "gif, jpeg, jpg, png, 3gp, mp3, doc ve.s<br/>\n";
echo "</div>";
$links = "x";
break;
}
#===============================================================================
$REG = $_FILES['mms']['tmp_name'];
copy( $REG, "mms/".$adi."" );
$razmer = round( filesize( "".$mms."" ) / 1024, 1 );
$query = mysql_query( "INSERT INTO `mms` VALUES(0, '".$id."', '".$toid."', '".$id."', '".$adi."', '".$razmer."', '".$text."', '".$date."', '".$SERVER_TIME."', 0, '0', '0');" );
if ( $query ){
$olchu = round( filesize( "mms/".$adi."" ) / 1024, 1 );
echo "<div class=\"you sms\">\n";
echo "<b><u>TEBRIKLER!</u></b><br/>----<br/>";
echo "<b>".$olchu." Kb-l&#305;q MMS <u>{$nick}</u> leqebli istifade&#231;iye  g&#246;nderildi.</b><br/>\n";
echo "</div>";
}
}
break;
}
$_v->divide();
if ( $links )
{
echo "<a href=\"upload.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS Qutusu</a><br/>\n";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
$_v->end('0',$link);
die();
?>