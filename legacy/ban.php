<?
session_start();
require("inc.php");

$list_keys = array('xeber','iqnor','leqeb','sil','browser','sil_hidden','msg');
foreach($_POST as $_key => $_val)
{
	if(in_array($_key,$list_keys))
	{
		$wtime = $_POST['wtime'] = $_key;
		unset($_POST[$_key]);
	}
}

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if($p_arr['1']!=1 or ($p_arr['81']!=1 and $p_arr['82']!=1 and $p_arr['83']!=1 and $p_arr['84']!=1 and $p_arr['85']!=1 and $p_arr['86']!=1 and $p_arr['87']!=1 and $p_arr['88']!=1)){
$_v->title('&#304;cazeniz yoxdur!','center');
$_v->fsize1($fsize1);
echo "Sizin heçkesi cezalandırmaq hüququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
} 

$user=$row["user"];  

if(isset($nk)){ 
$select = @mysql_query ("Select * from `users` where `id`='".$nk."';");
} else {
$nick=trim($nick);       
if($nick=="")$nick=0;          
if (!ctype_digit($nick)) {         
$latuser=strtolower($nick);
$select = mysql_query ("Select * from `users` where `latuser` = '".$latuser."';"); 
}
else 
{
$select = mysql_query ("Select * from `users` where `id` = '".$nick."';"); 
}
}
if (mysql_affected_rows() == 0) {
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$inf = mysql_fetch_array ($select); 
$pnik = $inf["user"];
$xare = $inf["whokik"];
$sebeb = $inf["whykik"];
$banned= $inf["banned"];
$invs = $inf["inv"];
$otaq = $inf["room"];
$tox = $inf["tox"];
$ip = $inf["user_ip"];
$access_elan = false;

$A_OPERA_USER = OPERATOR($ip);
$OPERATOR_USER = trim($A_OPERA_USER['0']);
$REMOTE_MAX_USER = trim($A_OPERA_USER['1']);
$u_level = $inf["level"];


if (($tox==2)&&($p_arr['202']!=1)) {
$_v->title('Olmaz','center');
$_v->fsize1($fsize1);
echo "Bu &#350;exsin Rehberlik terefinden toxunulmazl&#305;&#287;&#305; var...<br/>****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
$room = "room".$rm."";
$today=date ("H:i",$SERVER_TIME);

if($_POST['wtime']=="browser")
{
if($OPERATOR_USER!='NULL')
{
$xolmadi = "telefon modelini ban etmek\n";
}
else
{
$xolmadi = "komp&#252;terini ban etmek\n";
}
}elseif($_POST['wtime']=="leqeb"){
$xolmadi = "nikini silib ip soft\n";
}elseif($_POST['wtime']=="sil"){
$xolmadi = "nikini silmek\n";
}elseif($_POST['wtime']=="msg"){
$xolmadi = "mesajlar&#305;n&#305; silmek\n";
}elseif($_POST['wtime']=="iqnor"){
$xolmadi = "tam iqnor\n";
}elseif($_POST['wtime']=="xeber"){
$xolmadi = "xeberdarl&#305;q\n";
}elseif($_POST['wtime']>="0"){
$xolmadi = "&#199;atdan xaric\n";
}
if ($_SESSION['count']!=1)
{
$_SESSION['count'] = 1;
$whykik = "<b>$user</b>,  <b>$pnik</b> - <i>leqeb istifade&#231;ini $xolmadi etmek istedi ama al&#305;nmad&#305;:)</i>";
$rnd = rand(0,99999999);
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='Sistem', message='".$whykik."', id='".$SERVER_TIME."', towhom='', hid='0', usid='7'");
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$otaq."' WHERE `id` = '7';");
}
exit;
}

if($row['level']!=9){
if($invs==2) {
$_v->title('Stop','left');
$_v->fsize1($fsize1);
echo "<b>$pnik</b>, leqebli istifade&#231;i <u>Tam &#304;qnor Edilib</u>!<br/>\n";
if($sebeb!="")echo "<u>Sebeb</u>: <i>$sebeb</i>.<br/>----<br/>\n";
else echo "----<br/>\n";
echo "<i>Bu istifade&#231;inin yazd&#305;qlar &#231;atda  g&#246;r&#252;nm&#252;r ve mektub yaza bilmir</i>.<br/>\n";
echo "<b>M&#252;ellif</b>: <u>$xare</u><br/>*****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
} 
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($banned==1) {
$_v->title('Stop','left');
$_v->fsize1($fsize1);
echo "<b>$pnik</b>, leqebli istifade&#231;i <u>Ban Edilib</u>!<br/>\n";
if($sebeb!="")echo "<u>Sebeb</u>: <i>$sebeb</i>.<br/>----<br/>\n";
else echo "----<br/>\n";
echo "<b>M&#252;ellif</b>: <u>$xare</u><br/>*****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
} 
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($banned==2) {
$_v->title('Stop','left');
$_v->fsize1($fsize1);
echo "<b>$pnik</b>, leqebli istifade&#231;i <u>Bazadan Silinib</u>!<br/>\n";
if($sebeb!="")echo "<u>Sebeb</u>: <i>$sebeb</i>.<br/>----<br/>\n";
else echo "----<br/>\n";
echo "<b>M&#252;ellif</b>: <u>$xare</u><br/>*****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
} 
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
}

if($row['mexvi']!=0)$user_admin = "Sistem";
else $user_admin = $user;

$xeberci = "Xeber&#231;i";

if($rm<=10 and $rm!=""){
$selotaq = @mysql_query ("Select name from rooms where rm='".$rm."';");
$onam = @mysql_fetch_array($selotaq);
$otaqadi = $onam["name"];
}
else
$otaqadi = "Mesajda";

$pname = "Admin Panel";

$whykik = narmobil($whykik);
if($_POST['wtime']=="browser")
{
if($OPERATOR_USER!='NULL')
{
include("./file/ban/browser.php");
}
else
{
include("./file/ban/ip.php");
}

}elseif($_POST['wtime']=="leqeb"){
include("./file/ban/leqeb.php");
}elseif($_POST['wtime']=="sil_hidden"){
include("./file/ban/sil_hidden.php");
}elseif($_POST['wtime']=="sil"){
include("./file/ban/del.php");
}elseif($_POST['wtime']=="msg"){
include("./file/ban/msg_del.php");
}elseif($_POST['wtime']=="iqnor"){
include("./file/ban/iqnor.php");
}elseif($_POST['wtime']=="xeber"){
include("./file/ban/xeber.php");
}elseif($_POST['wtime']>="0"){
include("./file/ban/xaric.php");
}else{
header ("Location: enter.php?id=$id&ps=$ps&ref=$ref");
}
?>