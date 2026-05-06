<?php


if(!defined('username')){
session_id($_GET['SID']);
session_start();
$code_capcha = null;

if(!$_SESSION['capcat']){
$code_capcha .= rand(0000, 9999);
$_SESSION['capcat']['code'] = substr(md5($code_capcha),0,4);
}



header('Content-Type: image/png');
$r=rand(0,255);
$g=rand(0,255);
$b=rand(0,255);

$im = imagecreatetruecolor(80, 20);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, $r, $g, $b);
$black = imagecolorallocate($im, $r, $g, $b);
imagefilledrectangle($im, 0, 0, 399, 29, $white);
$text = $_SESSION['capcat']['code'];
$font = 'captcha/segoepr.ttf';
imagettftext($im, 14, 0, 15, 15, $black, $font, $text);
ImagePNG($im);
ImageDestroy($im);	
}



function capchat($code,$stop){
global $HTTP_USER_AGENT, $REMOTE_MAX, $_AUTO, $OPERATOR, $_SESSION, $ip_name;

$null = 1;
$dbcapchat = mysql_query("SELECT * FROM `capchat` WHERE `operator`='".$OPERATOR."' AND `time`>'".(time()-$_AUTO['regtime'])."' ORDER BY `id` DESC limit 10;");
   

while($capchat = mysql_fetch_object($dbcapchat)){
      
if($OPERATOR=='NULL' && (!$ip_name)){

if($REMOTE_MAX==$capchat->ip){
$_this->time  = $capchat->time+$_AUTO['regtime'];
$_this->metod = '2';

return (object)$_this;
}
      
}else{

if(md5(preg_replace('/[^A-z0-9\\ ]+/', '', $HTTP_USER_AGENT))==$capchat->soft or $REMOTE_MAX==$capchat->ip){

$null++;
$time = $capchat->time;

}


}



}


if($OPERATOR=='NULL' && (!$ip_name)){
$_this->time  = $_AUTO['regtime'];
$_this->metod = '1';
$_this->code = $_SESSION['capcat']['code'];
return (object)$_this;
}




if($null == $stop){
$_this->metod = '1';
$_this->time = $_AUTO['regtime'];
$_this->code = $_SESSION['capcat']['code'];
return (object)$_this;
}else if($null >= $stop){
$_this->metod = '2';
$_this->time = $time+$_AUTO['regtime'];
return (object)$_this;
}

return true;

}





function reg_anti_spam($b){

deloldfile(DOCUMENT_ROOT."file/dat_folder/reg", "60");

$dir = DOCUMENT_ROOT."file/dat_folder/reg";
if(file_exists($dir."/reg_".$b)){
$file = file( $dir."/reg_".$b);
list($count,$time) = explode( "|", $file[0]);
$qaliq_time = time() - $time;

if($count >= '1' && $qaliq_time  < 3) {
header("Content-Type:text/html; charset=UTF-8");
header ("Location: index.php"); exit; 



return null;
}


$f = fopen( $dir."/reg_".$b, "w");
fputs( $f, ($count + 1)."|".time());
fclose($f );

}else{
$f = fopen($dir."/reg_".$b, "w" );
fputs($f, "1|".time());
fclose($f);
}

return true;
}

reg_anti_spam($REMOTE_ADDR);




?>