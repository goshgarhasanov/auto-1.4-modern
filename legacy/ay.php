<?php
Error_Reporting(E_ALL & ~E_NOTICE);
define('yccost','localhost');
define('yccser','doydum_chat');
define('yccass','doysanimsan');
define('yccame','doydum_chat');
$site = "wap.DoYSaN.NeT";
$sitem = "wap.DoYSaN.NeT";
$site_url_2 = "doysan.net/chat";
$vaxt = "9999999"; // online vaxt
$xsat = "0"; //saat
$admin = "ADMIN"; // adminin niki
$nomre = "(055) 0000000"; // adminin nomresi//
$HTTP_USER_AGENT = htmlentities(addslashes($_SERVER["HTTP_USER_AGENT"]));
$REMOTE_ADDR = htmlentities(addslashes($_SERVER["REMOTE_ADDR"]));
$divide = "----<br/>";
$ay = "*****<br/>";
if($_POST['npass']!="")$ps = base64_encode("$_POST[npass]");
$SQLlink = "";

$dtd = '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.2//EN" "http://www.wapforum.org/DTD/wml12.dtd">';
$xml = '<?xml version="1.0" encoding="UTF-8"?>';

function connect_db() {
$SQLlink = @mysql_connect (yccost, yccser, yccass);
if($SQLlink) {
if(@mysql_select_db(yccame)){
return $SQLlink;
} else {
$yenile = $_SERVER['HTTP_HOST'];
$yenile .= $_SERVER['REQUEST_URI'];
$yenile = str_replace("&", "&amp;", $yenile);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><center><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>MySql DataBase</title>\n";
echo "<style type=\"text/css\">
body { font-weight: normal; font-size: normal; font-family: white; color: #ff6699; background-color: #000000 }
a:link,a:active,a:visited { text-decoration: underline; color : #ffff00 }
div { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }
div.form { background-color: #00ff00 }
</style></head><body>";
echo "*****<br/>\n";
echo "<b>MySql</b> Baza ile Elaqe Yaranm&#305;r. Sayt Heddinden &#199;ox Y&#252;klenib...<br/>----<br/>";
echo "<i>Zehmet olmasa biraz g&#246;zleyin...</i> <br/>*****<br/>";
echo "<a href=\"http://$yenile\">Yenile</a><br/>\n";

echo "<a href=\"license.php\">Script License</a><br/>\n";
echo "</body></center></html>";
}
} else {
$yenile = $_SERVER['HTTP_HOST'];
$yenile .= $_SERVER['REQUEST_URI'];
$yenile = str_replace("&", "&amp;", $yenile);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>MySql Not</title>\n";
echo "<style type=\"text/css\">
body { font-weight: normal; font-size: normal; font-family: white; color: #ff6699; background-color: #000000 }
a:link,a:active,a:visited { text-decoration: underline; color : #ffff00 }
div { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }
div.form { background-color: #00ff00 }
</style></head><body>";
echo "<center>*****<br/>\n";
echo "<b>MySql</b> Baza Yarad&#305;lmay&#305;b...";
echo "<br/>*****<br/></center>";
echo "<a href=\"http://$yenile\">Yenile</a><br/>\n";
echo "<a href=\"license.php\">Script License</a><br/>\n";
echo "</body></html>";
}
exit;
}

require("file/require/connect.php");
FUNCTION WHO($NK,$RM,$YER){
GLOBAL $id;
IF($RM!="-"){
$ROOM = @MYSQL_QUERY("SELECT `name` FROM `rooms` WHERE `rm`='".$RM."';");
$SELECT = @MYSQL_FETCH_OBJECT($ROOM);
$NAME = $SELECT->name;
}
IF($NK!="-"){
$USER = select_nk($NK);
$USERNAME = $USER->user;
}
IF($YER=="enter.php"){
$OBJECT = "Dehlizdedir.";
}ELSE IF($YER=="on.php"){
$OBJECT = "Onlayndadir.";
}ELSE IF($YER=="chat.php"){
$OBJECT = "".$NAME." ota&#287;&#305;ndad&#305;r";
}ELSE IF($YER=="info.php"){
$OBJECT = "".$USERNAME." nikinin infosuna bax&#305;r.";
}ELSE IF($YER=="smaylikler.php"){
$OBJECT = "Smayliklere bax&#305;r.";
}ELSE IF($YER=="hediyye.php"){
$OBJECT = "".$USERNAME." nikine hediyye g&#246;nderir.";
}ELSE IF($YER=="friends.php"){
$OBJECT = "Dostlar&#305;na Bax&#305;r.";
}ELSE IF($YER=="down.php"){
$OBJECT = "Y&#252;klemelerdedir.";
}ELSE IF($YER=="qepiy.php"){
$OBJECT = "Qepiy iwleriyle mewguldu.";
}ELSE IF($YER=="forum.php"){
$OBJECT = "Forumda nese axtarir :)";
}ELSE IF($YER=="etiraf.php"){
$OBJECT = "Etiraflardadir.";
}ELSE IF($YER=="bilik.php"){
$OBJECT = "Bilik Yar&#305;&#351;&#305;ndad&#305;r.";
}ELSE IF($YER=="img_a.php"){
$OBJECT = "".$USERNAME." nikinin albomuna bax&#305;r.";
}ELSE IF($YER=="foto.php"){
$OBJECT = "Anketine Foto elave edir.";
}ELSE IF($YER=="arxiv.php"){
$OBJECT = "".$USERNAME." niki ile S&#246;hbet arxivinde yazi&#351;&#305;r.";
}ELSE IF($YER=="online_sms.php"){
$OBJECT = "Online Smslere bax&#305;r.";
}ELSE IF($YER=="admin.php"){
$OBJECT = "Admin Paneldedir";
}ELSE IF($YER=="bal_add.php"){
$OBJECT = "Bal Paneldedir";
}ELSE IF($YER=="reytinq.php"){
$OBJECT = "Sesverme Reytinqindedir.(Yeqin kimese ses verecek=))";
}ELSE IF($YER=="qefes.php"){
$OBJECT = "Qefesdedir.(Yeqin kimese ses verecek=))";
}ELSE IF($YER=="sosial.php"){
$OBJECT = "Sosial qrupla&#351;madad&#305;r.";
}ELSE IF($YER=="aktivlik.php"){
$OBJECT = "Aktivlik reytinqindedir.";
}ELSE IF($YER=="hesab.php"){
$OBJECT = "Bal Xidmetlerindedir.";
}ELSE IF($YER=="znak_al.php"){
$OBJECT = "Znak alma&#287;a hazirla&#351;&#305;r.";
}ELSE IF($YER=="mektub.php"){
$OBJECT = "Mektub Qutusuna Bax&#305;r.";
}ELSE IF($YER=="mms.php"){
$OBJECT = "MMS Qutusuna Bax&#305;r.";
}ELSE IF($YER=="axtar.php"){
$OBJECT = "Nick Axtar-da kimise axtar&#305;r";
}ELSE IF($YER=="cabinet.php"){
$OBJECT = "&#350;exsi kabinetindedir.";
}ELSE IF($YER=="stat.php"){
$OBJECT = "statistikadad&#305;r.";
}
@MYSQL_QUERY("UPDATE `users` SET `who`='".$OBJECT."',`whotime`='".TIME()."' WHERE `id`='".$id."';");
}

$CONNECT = @MYSQL_QUERY("SELECT * FROM `users` WHERE `whotime` >= '0';");
WHILE($ARRAY = @MYSQL_FETCH_OBJECT($CONNECT)){
$WHOTIME = $ARRAY->whotime;
$TIM = TIME();
$TOTALTIME = $WHOTIME + 60;
IF($TIM > $TOTALTIME){
@MYSQL_QUERY("UPDATE `users` SET `who`='Bilinmir',`whotime`='0' WHERE `id`='".$ARRAY->id."';");
}
}

function check_login($link) {
global $REMOTE_ADDR, $HTTP_USER_AGENT, $HTTP_GET_VARS, $us, $id, $ps, $ref;
$ref = rand(10000, 1000000);
if(isset($HTTP_GET_VARS['us'])) {$us = mysql_escape_string($HTTP_GET_VARS['us']);}
if(isset($HTTP_GET_VARS['id'])) {$id = mysql_escape_string($HTTP_GET_VARS['id']);}
if(isset($HTTP_GET_VARS['ps'])) {$ps = mysql_escape_string($HTTP_GET_VARS['ps']);}
if(isset($us)){ $us=trim($us);
if($us=="") {$bad_login = 1;}}
if(isset($id)){
if (!ctype_digit($id)) { header("Location: index.php"); die; }
$result = @mysql_query ("Select * from users where id='".$id."' LIMIT 1;");
} else {
if (!ctype_digit($us)) {
$latuser=strtolower($us);
$ruser = rus_to_k($us);
if($ruser==$us){
$result = mysql_query ("Select * from users where latuser = '".$latuser."' LIMIT 1;");
} else {
$result = mysql_query ("Select * from users where ruser = '".$ruser."' LIMIT 1;");
}
} else {
$result = mysql_query ("Select * from users where id = '".$us."' LIMIT 1;");
}
if (mysql_affected_rows() == 0) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"xeta\" title=\"xeta...\" ontimer=\"index.php?ref=$ref\"><timer value=\"15\"/>";
echo "<p align=\"center\"><small>";
echo "<b>Bele bir Istifade&#231;i m&#246;vcut deyil...</b><br/>****<br/>";
echo "<a href=\"index.php?&amp;$ref\">Ana Sehife</a><br/>\n";
echo "</small></p></card></wml>";
mysql_close ($link);
exit;
}

}
$row = mysql_fetch_array ($result);
if(!isset($id)){$id=$row["id"];}
if(!isset($ps)){$ps=0;}
if ($ps !== $row["pass"]){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"xeta\" title=\"xeta...\" ontimer=\"index.php?ref=$ref\"><timer value=\"15\"/>";
echo "<p align=\"center\"><small>";
echo "<b>&#350;ifre d&#252;z deyil!</b><br/>****<br/>";
echo "<a href=\"index.php?&amp;$ref\">Ana Sehife</a><br/>\n";
echo "</small></p></card></wml>";
mysql_close ($link);
exit;
}

if($row['fsize'] == "0") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
else { $fsize1 = "<medium>"; $fsize2 = "</medium>"; }

$zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `mega_time`!= '0' and `mega_time` < ".time().";");
while($zn_users = mysql_fetch_array($zn_sql)){
mysql_query("UPDATE `users` SET `mega_nik` = '', mega_time = '0' WHERE `id` = '".$zn_users["id"]."';");
$rnd = rand(0,99999999);
$metn = "H&#246;rmetli <b>".$zn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z MeQa nikin m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$metn."','".$zn_users["user"]."','".$zn_users["id"]."','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");

$sel = @mysql_query ("Select`user` from `users` where `id`='1' ;");
$ini = mysql_fetch_array ($sel);
$savo=$ini["user"];

$rnd = rand(0,99999999);
$met = "<b>".$zn_users["user"]."</b> nikinin ald&#305;&#287;&#305; MeQa nikin m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$met."','".$savo."','1','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");
}

$zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `zn_time`!= '0' and `zn_time` < ".time().";");
while($zn_users = mysql_fetch_array($zn_sql)){
mysql_query("UPDATE `users` SET `zn` = '', zn_time = '0' WHERE `id` = '".$zn_users["id"]."';");
$rnd = rand(0,99999999);
$metn = "H&#246;rmetli <b>".$zn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z znak&#305;n m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$metn."','".$zn_users["user"]."','".$zn_users["id"]."','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");

$sel = @mysql_query ("Select`user` from `users` where `id`='1' ;");
$ini = mysql_fetch_array ($sel);
$savo=$ini["user"];

$rnd = rand(0,99999999);
$met = "<b>".$zn_users["user"]."</b> nikinin ald&#305;&#287;&#305; znak&#305;n m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$met."','".$savo."','1','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");
}





$zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `rnick_time`!= '0' and `rnick_time` < ".time().";");
while($zn_users = mysql_fetch_array($zn_sql)){
mysql_query("UPDATE `users` SET `rusl` = '', rnick_time = '0' WHERE `id` = '".$zn_users["id"]."';");
$rnd = rand(0,99999999);
$metn = "H&#246;rmetli <b>".$zn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z Super nikin m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$metn."','".$zn_users["user"]."','".$zn_users["id"]."','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");

$sel = @mysql_query ("Select`user` from `users` where `id`='1' ;");
$ini = mysql_fetch_array ($sel);
$savo=$ini["user"];

$rnd = rand(0,99999999);
$met = "<b>".$zn_users["user"]."</b> nikinin ald&#305;&#287;&#305; super nikin m&#252;ddeti bitdi.";
mysql_query("insert into zapiski values(0,'Xeberci','0','".$met."','".$savo."','1','".time()."','0','Znak','".date("d-M-Y [H:i]",mktime(date ("H")+$xsat))."','1','1');");
}

if(@file_exists("file/select/".$id.".php")) {
    @require("file/select/".$id.".php");
    if($P_ARR[0]==0 AND $P_ARR[1]==0 AND $P_ARR[2]==0 AND $P_ARR[3]==0 AND $P_ARR[4]==0 AND $P_ARR[44]==0 AND $id!=1) {
        @unlink("file/select/".$id.".php");
    }
} else if ($row["level"] >= 4){
    @require("file/level/".$row["level"].".php");
}


$us_ip = $row["user_ip"];
$us_soft = $row["user_soft"];
if($row["user_soft"]!==$HTTP_USER_AGENT){
mysql_query ("Update users set user_soft='". $HTTP_USER_AGENT."', user_ip = '".$REMOTE_ADDR."' WHERE id = '".$id."';");
if ($row["safe"]==1){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Stop!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>Tehl&#252;kesizlik haqq&#305;nda melumat!</b><br/>$divide Sizin evvelki ip <u>$us_ip</u> ve ya browser <u>$us_soft</u>, Eger ip+soft bele deyilse nikinizden istifade olunub.&#350;ifrenizi deyi?meyi unutmay&#305;n!\n";
echo "<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Davam Et</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
exit;
}
}
require("file/require/optimize.php");
if($row['level']>=4){
 $daxili_parol = mysql_query("SELECT * FROM security_panel WHERE usid='".$row["id"]."'");
 if(mysql_affected_rows()!=0){
 $daxiligiris = mysql_fetch_object($daxili_parol);
 $daxili_login = $daxiligiris->login;
 $daxili_parol = $daxiligiris->pass;


 $login = "$daxili_login";
 $password = "$daxili_parol";
 if(empty($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password)) {
 header('WWW-Authenticate: Basic realm="Security Panel ErroR Chat"');
 header('HTTP/1.0 401 Unauthorized');
 exit();
 }}
}
if($row["level"]<5){
$brawserban = mysql_query ("Select `soft` from `bannlist` WHERE `ip` = '".$REMOTE_ADDR."'");
if (mysql_affected_rows()!=0) {
$iban = mysql_fetch_array ($brawserban);
$iban = $iban['soft'];
if($iban=="IP-BAN" or $iban==$HTTP_USER_AGENT){
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"ban\" title=\"IP Browser\">";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin IP Browserden &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/>----<br/>\n";
echo "<a href=\"http://$site\">Ana Sehife</a><br/>";
echo $fsize2;
echo "</p>\n";
echo "</ ard>\n";
echo "</wml>\n";
mysql_close($link);
exit;
}
}
}

if (($row["banned"]!=0)or($row["con"]!=0)or(time()<$row["kik"])) {
header ("Location: session.php?id=$id&ps=$ps&ref=$ref");
exit;
}


$aciqlar=array('<','>','c99','shell','%27',"'",'union','limit','hack','hacked','"','%22');
foreacH($aciqlar as $m=>$c){
if(eregi($c,$_SERVER['REQUEST_URI']) || eregi(urlencode($c),$_SERVER['REQUEST_URI']) || eregi($c,urldecode($_SERVER['REQUEST_URI']))){
ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"connect\" title=\"ERRoR_Team (Anti Hack!!!!)\">\n";
echo "<p mode=\"wrap\">\n";
echo '<center>kimliyinden asli olmayaraq sikim varyoxuvu!!</center>';
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();
exit;
}
}


$agent = $HTTP_USER_AGENT;
$addr = $REMOTE_ADDR;
$axt = 'anony';
$konum = strpos($agent, $axt);
if($agent == "http://Anonymouse.org/ (Unix)"){
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"Secry\" title=\"Ip Browser\">\n";
echo "<p align=\"center\">";
echo "<small>";
echo "Sizin Girdiyiniz Ip Adresde Problem Var Sizin Adres <br/><b>$agent</b><br/>Meslehet Goruruk Dogru Adresle Daxil Olasiniz<br/>----<br/>";
echo "<u>By : ErroR!ink</u><br/>----<br/>\n";
echo "<a href=\"/index.php\">Geri Don &#xbb;&#xbb;&#xbb;</a><br/>";
echo "</small>";
echo "</p></card></wml>";
mysql_close($link);
exit();
}
require("file/fun/ab");
return array($row, $id, $ps, $fsize1, $fsize2, $P_ARR);
}
?>