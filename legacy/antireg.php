<?php


session_start();
mysql_query("DELETE FROM capchat WHERE time<'".(time()-8640)."';");
function antiatackreg(){
global $_v;
global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $site;
global $site_url;

if (bbses($_COOKIE['nnregyv'])>$SERVER_TIME){
$tkick = bbses($_COOKIE['nnregyv']) - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

$_v->title('IP BAN!','center');
$_v->fsize1('small');
$_v->html('<div class="inputRed"><b>You IP Banned</b></div><br/>');
echo "Sizin Browser-den daha once qeydiyyatdan kecilib.<br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz.<br/>\n";
echo "----<br/><a href=\"license.php\">License</a><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}


function antiadeshtt(){
global $_v;
global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $REMOTE_MAX;
global $site;
global $site_url;
global $OPERATOR;
global $HTTP_USER_AGENT;
global $SESSION_BROWSER;
global $_SESSION;
global $REMOTE_ADDR;
global $_SERVER;
if ($_SERVER[HTTP_COOKIE]!=TRUE) {
if($OPERATOR='NULL'){
$SESSION_BROWSER = $REMOTE_MAX;
}else{
$SESSION_BROWSER = $HTTP_USER_AGENT.$REMOTE_ADDR;
}
$setting = @mysql_query ("Select * from `capchat` WHERE (`soft` = '".md5($SESSION_BROWSER)."');");
$set = mysql_fetch_array ($setting);
$setting = (object) $set;


if ($setting->time >$SERVER_TIME)
{
	$tkick = $setting->time-$SERVER_TIME;
	if($tkick < 60 && $tkick > 0)
	{
		$vaxt = "saniyye\n";
	}
	elseif($tkick < 3600 && $tkick > 60)
	{
		$new = $tkick;
		$tkick = floor($new/60)+1;
		$vaxt = "deqiqe\n";
	}
	elseif($tkick < 86400 && $tkick > 3600)
	{
		$new = $tkick;
		$tkick = floor($new/3600)+1;
		$vaxt = "saat\n";
	}
	elseif($tkick > 86400)
	{
		$new = $tkick;
		$tkick = floor($new/86400)+1;
		$vaxt = "g&#252;n\n";
	}
	$tkick = round($tkick);


if (mysql_affected_rows()!=0) {
$_v->title('IP Adress BAN!','center');
$_v->fsize1('small');
//echo "<b>Sizin ip-den daha once qeydiyyatdan kecilib.</b><br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz. Yadaki bawqa operatorla ve ya telefonla qeydiyyat kecin!<br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}
}
}
function antiades(){
global $_v;
global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $REMOTE_MAX;
global $site;
global $site_url;
$setting = @mysql_query ("Select * from `capchat` WHERE (`ip` = '".$REMOTE_MAX."') and(`operator` = 'NULL');");

$set = mysql_fetch_array ($setting);
$setting = (object) $set;


if ($setting->time >$SERVER_TIME)
{
	$tkick = $setting->time-$SERVER_TIME;
	if($tkick < 60 && $tkick > 0)
	{
		$vaxt = "saniyye\n";
	}
	elseif($tkick < 3600 && $tkick > 60)
	{
		$new = $tkick;
		$tkick = floor($new/60)+1;
		$vaxt = "deqiqe\n";
	}
	elseif($tkick < 86400 && $tkick > 3600)
	{
		$new = $tkick;
		$tkick = floor($new/3600)+1;
		$vaxt = "saat\n";
	}
	elseif($tkick > 86400)
	{
		$new = $tkick;
		$tkick = floor($new/86400)+1;
		$vaxt = "g&#252;n\n";
	}
	$tkick = round($tkick);



//if (mysql_affected_rows()!=0) {
$_v->title('IP Adress BAN!','center');
$_v->fsize1('small');
echo "<b>Sizin ip-den daha once qeydiyyatdan kecilib.</b><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
//}
}
}
function antises(){
global $_v;
global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $_SESSION;
global $site;
global $site_url;

session_start();
if($_SESSION['enter']==1){
$_v->title('Qeydiyyat Stop','center');
$_v->fsize1('small');
echo "<b>Tez Tez Nick Acmaq Olmaz</b><br/><br/>";
echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}


///// reg emiri
function antireg(){
//global $_v;
//global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $_SESSION;
global $_AUTO;
global $OPERATOR;
global $HTTP_USER_AGENT;
global $SESSION_BROWSER;
global $REMOTE_ADDR;
global $REMOTE_MAX;
if($OPERATOR=='NULL')
{
$SESSION_BROWSER = $REMOTE_MAX;
}
else
{
//$SESSION_BROWSER = $HTTP_USER_AGENT.$REMOTE_MAX;
$SESSION_BROWSER = $HTTP_USER_AGENT.$REMOTE_ADDR;
}
$vaxt = $_AUTO['regtime'] + $SERVER_TIME;
mysql_query ("INSERT INTO `capchat` SET `ip`='".$REMOTE_MAX."', `soft`='".md5($SESSION_BROWSER)."', `operator`='".$OPERATOR."', `time`='".$vaxt."';");


//setcookie ("nnreg", $SERVER_TIME+21600, $SERVER_TIME+21600);  //6 saat block
setcookie ("nnregyv", $SERVER_TIME+$_AUTO['regtime'], $SERVER_TIME+$_AUTO['regtime']);  //cookie  block auto+time
if ($_AUTO['regtime'] >900)$_SESSION["enter"] ="1"; 
}
?>