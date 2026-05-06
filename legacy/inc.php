<?php


error_reporting(0);
@ini_set('display_errors', 0);

if (session_status() === PHP_SESSION_NONE) { @session_start(); }

$HTTP_USER_AGENT = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
$REMOTE_ADDR     = isset($_SERVER['REMOTE_ADDR'])     ? $_SERVER['REMOTE_ADDR']     : '';
$REMOTE_MAX      = $REMOTE_ADDR;
$SERVER_TIME     = time();
$GLOBALS['HTTP_USER_AGENT'] = $HTTP_USER_AGENT;
$GLOBALS['REMOTE_ADDR']     = $REMOTE_ADDR;
$GLOBALS['SERVER_TIME']     = $SERVER_TIME;

require("BAZA.php");
define('DOCUMENT_ROOT', dirname(__FILE__).'/');
define('DIRECTORY', str_replace(array('\\', '//'), '/', dirname($_SERVER['PHP_SELF']) . '/'));
$smsbal_1 = '5-9';
$divide = "----<br/>";
if($_POST['npass']!='')$ps = base64_encode($_POST['npass']);
$SQLlink = '';


if($_POST['npass']!='')$ps = base64_encode($_POST['npass']);
$SQLlink = '';
require('anti_sql_injection.php');
if(isset($_GET['id'])) {
if (!is_numeric($_GET['id'])) { header("Location: index.php"); die; }
}if(isset($_GET['pack_id'])) {
if (!is_numeric($_GET['pack_id'])) { header("Location: index.php"); die; }
}


function connect_db() {
$SQLlink = @mysql_connect (hostname, username, password);
if($SQLlink) {
if(@mysql_select_db(dbname)){
return $SQLlink;
} else {
$yenile = basename($_SERVER['PHP_SELF']).'?'.$_SERVER['QUERY_STRING'];
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
echo "<a href=\"".$yenile."\">Yenile</a><br/>\n";

echo "<a href=\"license.php\">Script License</a><br/>\n";
echo "</body></center></html>";
}
} else {
$yenile = basename($_SERVER['PHP_SELF']).'?'.$_SERVER['QUERY_STRING'];
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
echo "<a href=\"".$yenile."\">Yenile</a><br/>\n";
echo "<a href=\"license.php\">Script License</a><br/>\n";
echo "</body></html>";
}
exit;
}

require("file/require/connect.php");
anti_injection_savik();

xss_filter($val);
sql_filter($cek);


session();

include(DOCUMENT_ROOT.'file/require/sh_files.php');
include(DOCUMENT_ROOT.'file/require/spam.php');
include(DOCUMENT_ROOT.'version.php');

include(DOCUMENT_ROOT.'file/dat_folder/security.php');



function reklam ($yeri) {
$allow = null;
$sql = mysql_query("SELECT `id`,`name`,`url` From `data_reklam` Where `yeri` ='{$yeri}' AND `action` = '1'  AND `time`>'".time()."' order by rand() DESC;");
while( $object = mysql_fetch_object($sql) ) {
echo "Reklam: <a href=\"gouid.php?id={$object->id}\">{$object->name}</a><br/>";
$allow = true;
}
return $allow;
echo "---<br/>";
}



$ref = rand(10000, 1000000);
$_v = new version($ref);
function check_login($link) {
  global $row, $site, $_COOKIE, $REMOTE_ADDR, $A_OPERA, $HTTP_USER_AGENT, $_GET, $_POST, $us, $id, $ps, $ref, $_AUTO, $_v;
        if(isset($_GET['us'])) {$us = mysql_escape_string($_GET['us']);}
        if(isset($_GET['id'])) {$id = mysql_escape_string($_GET['id']);}
        if(isset($_GET['ps'])) {$ps = mysql_escape_string($_GET['ps']);}
        if(isset($_POST['us'])) {$us = mysql_escape_string($_POST['us']);}
        if(isset($_POST['npass'])) {$ps = base64_encode(mysql_escape_string($_POST['npass']));}
        if(isset($us)) {$us=trim($us);}
		
        if(isset($id)){
        if (!is_numeric($id)) { header("Location: index.php"); die; }
        $result = @mysql_query ("Select * from `users` where `id`='".$id."' LIMIT 1;");
  } else {
        if (!is_numeric($us)) {
        $latuser=strtolower($us);
        $result = mysql_query ("Select * from `users` where `latuser` = '".$latuser."' LIMIT 1;");
        } else {
        $result = mysql_query ("Select * from `users` where `id` = '".$us."' LIMIT 1;");
  }
  
 if (mysql_affected_rows() <= 0){
  $_v->Redirect("index.php?ref=$ref","20");
  $_v->title('Xeta!','center');
  $_v->fsize1('<small>');
  echo "<b>Bele bir Istifade&#231;i m&#246;vcut deyil...</b><br/>\n";
  $_v->divide();
  echo "<a href=\"index.php?$ref\">Ana Sehife</a><br/>\n";   
  $_v->fsize2('</small>');
  $_v->end('1',$link);
  exit;
 }
}
        $row = mysql_fetch_array ($result);
        if(!isset($id)){$id=$row["id"];}
        if(!isset($ps)){$ps=0;}


if($row['fsize'] == '0') { $fsize1 = '<small>'; $fsize2 = '</small>'; } else { $fsize1 = '<small>'; $fsize2 = '</small>';}  
$_v->user_version($row['version']);


$us_ip = $row["user_ip"];
$us_soft = $row["user_soft"];


if(secryte_pass()=='block' AND $us_soft!=$HTTP_USER_AGENT)
{
        //$ps = 'd..2'.$ref;
	save_log('access.dat');
}

// bcrypt-aware password check — backwards compatible with legacy base64(plain)
$plain_pw = isset($_POST['npass']) && $_POST['npass'] !== '' ? $_POST['npass'] : base64_decode($ps);
$stored = $row["pass"];
$pw_ok = false;
if (function_exists('chat_verify_password') && $plain_pw !== false && $plain_pw !== '') {
    if (chat_verify_password($plain_pw, $stored)) {
        $pw_ok = true;
        // Migrate legacy plain-base64 password to bcrypt on successful login
        if (!preg_match('/^\$2[ayb]\$/', $stored)) {
            chat_upgrade_password($row['id'], $plain_pw);
        }
    }
}
if (!$pw_ok && ($ps === $row["pass"] || base64_decode($ps) === $row["pass"])) { $pw_ok = true; }
if (!$pw_ok){
 secryte_pass(1);
 $_v->title('Stop!','center');
 $_v->fsize1($fsize1);
 echo "<b>&#350;ifre d&#252;z deyil!</b><br/>----<br/>";
 $_v->divide();
 echo "<a href=\"index.php?$ref\">Ana Sehife</a><br/>\n";   
 $_v->fsize2($fsize2);
 $_v->end('1',$link);
 exit;
}

if(isset($_POST['npass']) and preg_match("/windows|android|iphone|ipad|ipod|safari|chrome|ucweb|ucbrowser|firefox/i", strtolower($HTTP_USER_AGENT))){
header ("Location: enter.php?id=$id&ps=$ps&ref=$ref"); die();
}

if($us_soft!=$HTTP_USER_AGENT)
{
 mysql_query ("Update `users` set `user_soft`='".$HTTP_USER_AGENT."', `user_ip` = '".$REMOTE_ADDR."' WHERE `id` = '".$id."';");
 if ($row["safe"]==1)
 {
  $_v->title('Stop!','center');
  $_v->fsize1($fsize1);
  echo "<b>Diqqet!</b><br/>----<br/>Sizin evvelki ip $us_ip ve ya browser $us_soft, Eger ip+soft bele deyilse nikinizden istifade olunub.&#350;ifrenizi deyishmeyi unutmayin!<br/>----<br/>";
  $_v->divide();
  echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Davam Et</a><br/>\n";    
  $_v->fsize2($fsize2);
  $_v->end('1',$link);
  exit;
 }
}


include(DOCUMENT_ROOT.'file/dat_folder/n_n/n_n.php');
require("file/require/optimize.php");

require("file/require/bot_inc.php");

if(substr($us_ip,0,strlen($REMOTE_MAX))!=$REMOTE_MAX) {
 mysql_query ("Update `users` set `user_ip` = '".$REMOTE_ADDR."' WHERE `id` = '".$id."';");
}

if($row["qeyd_micro"]==0){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
 echo "<b>Diqqet.! </b> Sizin Leqebiniz Tesdiqlenmeyib. Chata Daxil Ola Bilmezsiniz..! Zehmet olmasa leqebiniz tesdiqlenene kimi gozleyin...<br/>\n";
$_v->divide();
echo "<a href=\"index.php?ref=$ref\">Ana Sehife</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($row['st_bal_time']>=60)
{
if($row['sex']==1){$metn = "Salam <b>$row[user]</b> Siz bu g&#252;n &#231;atimizda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <u>$_AUTO[admin]</u> size $row[st_bal_count] bal hediyye etdi.<br/> ($site sayt&#305;nda kecireceyiniz her saat &#252;&#231;&#252;n $row[st_bal_count] bal qazanacaqs&#305;z! Bizimle qal&#305;n!)\n";}
if($row['sex']==0){$metn = "Salam <b>$row[user]</b> Siz bu g&#252;n &#231;atimizda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <u>$_AUTO[admin]</u> size $row[st_bal_count] bal hediyye etdi.<br/> ($site sayt&#305;nda kecireceyiniz her saat &#252;&#231;&#252;n $row[st_bal_count] bal qazanacaqs&#305;z! Bizimle qal&#305;n!)\n";}
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$id."', `towhom` = '".$row['user']."', `idwho` = '0', `time` = '".$SERVER_TIME."',`who` = 'BaL Hediyye', `readd` = '0', `topic`='Bal Hediyye', `message` = '".$metn."';");
if($row['sex']==1){mysql_query("UPDATE `users` SET `st_bal_time`='0', `bal`='".($row['bal']+$row['st_bal_count'])."' WHERE `id` = '".$id."';");}
if($row['sex']==0){mysql_query("UPDATE `users` SET `st_bal_time`='0', `bal`='".($row['bal']+$row['st_bal_count'])."' WHERE `id` = '".$id."';");}
}

include(DOCUMENT_ROOT.'file/dat_folder/security.php');
if(isset($sc_pass[$id]) && $_COOKIE['scr_ps'] != $sc_pass[$id]){    
if(isset($_POST['scr_ps']) && $sc_pass[$id] == $_POST['scr_ps']){
setcookie("scr_ps",$_POST['scr_ps'], $SERVER_TIME+259200);
}else{
$_v->title('Stop!','center');
$_v->fsize1($fsize1);  
$_v->action("enter.php?id=$id&amp;ps=$ps&amp;ref=$ref");
print 'Parol:<br/>';
print $_v->input('<input type="password" name="scr_ps" maxlength="20" title="Parol"/>').'<br/>';
print $_v->submit('<b>Daxil Ol</b>');
$_v->divide();
echo "<a href=\"index.php?$ref\">Ana Sehife</a><br/>\n";   
$_v->fsize2($fsize2);
$_v->end('1');
exit;      
}

}


//////guvenlik/////////

foreach($_GET as $m=>$c){
$_GET[$m]=str_replace(array('union','select','"','%22','order','hack','limit','script'),'',htmlspecialchars($_GET[$m]));
}
$aciqlar=array('<','>','ini_sector_my_connect','c99','shell','etce','font','http','%27',"'",'union','select','limit','hack','script','hacked','"','%22');
foreacH($aciqlar as $m=>$c){
if(eregi($c,$_SERVER['REQUEST_URI']) || eregi(urlencode($c),$_SERVER['REQUEST_URI']) || eregi($c,urldecode($_SERVER['REQUEST_URI']))){

if ($row['id'] != 1) {
$_v->title('Anti Hacking','center');
  $_v->fsize1($fsize1);
echo" Xahi&#351; edirik sayt&#305;m&#305;zdan normal qaydada istifade edin.<br/><br/>\n";
  
$_v->fsize2($fsize2);
  $_v->end('1',$link);

exit;
}
}}

//////guvenlik son/////////



return array($row, $id, $ps, $fsize1, $fsize2,$p_arr);
}

?>