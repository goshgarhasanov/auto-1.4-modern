<?php
class functions {
public function pagestart($total,$max){
global $_GET;
$page = (!isset($_GET['page'])) ? 0 : intval($_GET['page']);
$start = (!isset($_GET['page'])) ? 0 : ($page * $max);
if(ceil($total/$max) < $page){
$start = 0;
}
return array($page,$start,$max);
}
public function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "&gt;&gt;-&gt;&gt;";
$_PREVPAGE = "&lt;&lt;-&lt;&lt;";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
} ELSE {echo $divide;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}

public function xtime($new){
$day = floor($new / 86400);
$hour = floor(($new - ($day * 86400)) / 3600);
$minut = floor(($new - (($day * 86400) + ($hour * 3600))) / 60);
$second = floor($new - (($day * 86400) + ($hour * 3600) + ($minut * 60)));
$day = ($day!=0) ? $day." g&#252;n " : false;
$hour = ($hour!=0) ? $hour." saat " : false;
$minut = ($minut!=0) ? $minut." deq " : false;
$second = ($second!=0) ? $second." san" : false;
return $day.$hour.$minut.$second;
}

public function ipua(){
global $_SERVER;
if(preg_match("/Opera Mini/i", $_SERVER['HTTP_USER_AGENT'])){
$ip = strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
if(empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip = $_SERVER['REMOTE_ADDR'];
}
$ua = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
if(empty($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])){
$ua = $_SERVER['HTTP_USER_AGENT'];
}
} else {
$ua = htmlentities(addslashes($_SERVER["HTTP_USER_AGENT"]));
$ip = htmlentities(addslashes($_SERVER["REMOTE_ADDR"]));
}
return array($ip,$ua);
}
#===========================================================================
public function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|input|header|mysql|list|array|while|foreach|case|break|server|http|post|else|connect|basename|isset|intval|trim|exists)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
#===========================================================================
public function users($values='', $user) {
    if($values!=''){$vars = $values;
}else{$vars = '*';
}
$user = mysql_escape_string($user);
if(is_numeric($user)) {
$Sql = "SELECT $vars FROM `users` WHERE `id`='".$user."'";
$Query = @Mysql_Query( $Sql );
} else {
$Sql = "SELECT $vars FROM `users` WHERE LOWER(`user`)='". strtolower($user) ."'";
$Query = @Mysql_Query( $Sql );
}
$Result = @MySql_Fetch_Array( $Query );
return $Result;
}
public function is_wml_ua($browser){
$mobile_agents = array('w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
if((preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', $browser) || ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))|| (in_array(strtolower(substr($browser,0,4)),$mobile_agents))) && !(strpos(strtolower($browser),'windows')>0)){
return false;
} else {
return true;
}
}
#===========================================================================
public function int($str){
return strtolower(preg_replace(array('/[^0-9]/'), '', $str));
}
}
?>
