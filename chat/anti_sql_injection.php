<?
function anti_injection($sql){
$sql = trim($sql);
$sql = strip_tags($sql);
$sql = (get_magic_quotes_gpc()) ? $sql : stripslashes($sql);
return mysql_escape_string($sql);
}
function anti_sql_injection(){
global $_GET, $_POST, $_COOKIE, $_SESSION, $_REQUEST, $_SERVER;

$IS_ATTACK = ARRAY("./","../",".../","/.","/..","\'","\"","*","load_file","union","schemata","md5","dat","inc","x:","x:\#","///","from","xp_","execute","exec","mysql","sp_executesql","sp_","select","insert","where","drop table","users","anonymouse.org","kproxy.com","hide.me","hideme.be","zend2.com","webproxy.to","show tables","insert",","|"x'; u\pdate character s\et level=99;-\-","x';u\pdate account s\er ugradeid=255;-\-","x';u\pdate account d\rop ugradeid=255;-\-","x';u\pdate account d\rop ",",w\\here 1=1;-\\-","z'; u\pdate account s\et ugradeid=char","update","drop","sele","memb","char","version","set" ,"$","res3t","wareh","%","--","shutdown","from","select","update","character","clan","set","or","and","insert","where","drop table","show tables","#","\*","--");
IF(ISSET($_GET)){
FOREACH($_GET AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$PATHINFO = PATHINFO($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION);
$REQUEST_INFO = STRTOLOWER($PATHINFO);
$BS = base64_decode($_GET[$H]);
IF(IN_ARRAY(STRTOLOWER($_GET[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($REQUEST_INFO), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str($_GET[$H]);
}
}
}
IF(ISSET($_POST)){
FOREACH($_POST AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$PATHINFO = PATHINFO($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION);
$REQUEST_INFO = STRTOLOWER($PATHINFO);
$BS = base64_decode($_POST[$H]);
IF(IN_ARRAY(STRTOLOWER($_POST[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($REQUEST_INFO), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str($_POST[$H]);
}
}
}
IF(ISSET($_COOKIE)){
FOREACH($_COOKIE AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_COOKIE[$H]);
IF(IN_ARRAY(STRTOLOWER($_COOKIE[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str($_COOKIE[$H]);
}
}
}
IF(ISSET($_SESSION)){
FOREACH($_SESSION AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_SESSION[$H]);
IF(IN_ARRAY(STRTOLOWER($_SESSION[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str($_SESSION[$H]);
}
}
}
IF(ISSET($_REQUEST)){
FOREACH($_REQUEST AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_REQUEST[$H]);
IF(IN_ARRAY(STRTOLOWER($_REQUEST[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str($_REQUEST[$H]);
}
}
}
IF(ISSET($_SERVER['REMOTE_ADDR'])){
$BS = base64_decode($_SERVERR['REMOTE_ADDR']);
IF(IN_ARRAY(STRTOLOWER($_SERVERR['REMOTE_ADDR']), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str(STRTOLOWER($_SERVERR['HTTP_USER_AGENT']));
}
IF(ISSET($_SERVER['HTTP_USER_AGENT'])){
$BS = base64_decode($_SERVERR['HTTP_USER_AGENT']);
IF(IN_ARRAY(STRTOLOWER($_SERVERR['HTTP_USER_AGENT']), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Location: index.php"); die;
}
anti_inj_str(STRTOLOWER($_SERVERR['REMOTE_ADDR']));
}
}
function anti_inj_str($txt) {
$inj = array("txt" => "outfile|injection|union|from|select|insert|update|where|drop|table|tables");
$text = explode("|", $inj["txt"]);
foreach($text as $txt_2){
if(ereg($txt_2,strtolower($txt))){
header("Location: index.php"); die;
}
}
}
anti_sql_injection();
?>