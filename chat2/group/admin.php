<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("../ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row["bal"];

$this_g = mysql_query ("Select * from `group` where `id` = '".$number."'");
$gr = mysql_fetch_array($this_g);
$my_group = $row["group"];
$my_act = $row["group_act"];
$my_cp = $row["group_cp"];

// Qrup achmaqin deyeri.
$create_b = 1000;

if ($row["sex"] == 0) {
$cinsi = " bey";
} else {
$cinsi = " xan&#305;m";
}

$my_g = mysql_query ("Select * from `group` where `id` = '".$number."' and `admin` = '".$id."'");
$g_row = mysql_fetch_array($my_g);

if($id!=1){
if(($my_cp!=1)&&($my_cp!=2)){
header("Location: index.php?id=$id&ps=$ps&r=$ref");
}
}
$avr = $row["avr"];
$rm_max = $row["max"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"error\" title=\"Qrupla&#351;ma\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

switch($act)
{

default:
if(($my_cp==1)or($id==21)){
echo "&#304;stifade&#231;i ad&#305; ve ya &#304;D:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"ad$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "[<anchor title=\"go\">Redakte et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=edit&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"ad\" value=\"$(ad$ref)\"/>";
echo "</go></anchor>]<br/><br/>";

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=znak&amp;r=$ref\">Znak al</a><br/>";
echo $divide;
}
if(($my_cp==1)or($id==21)or($my_cp==2)){
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '0';");
$inmenu = mysql_result($q, 0);
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=tesdiq&amp;r=$ref\">Tesdiq g&#246;zleyenler-$inmenu</a><br/>";
$p = mysql_query("SELECT COUNT(*) FROM `group_sikayet` WHERE `group_id` = '".$number."' and `act` = '1';");
$plain = mysql_result($p, 0);
if($plain!=0)$sikayet = "-".$plain;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=plaint&amp;ref=$ref\">&#350;ikayetler$sikayet</a><br/>";
}

$x = mysql_query("SELECT COUNT(*) FROM `group_ban` WHERE `group_id` = '".$number."';");
$xx = mysql_result($x, 0);
if(($id==21)){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=mesaj&amp;ref=$ref\">&#220;mumi mesaj</a><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=delet_all&amp;ref=$ref\">B&#252;t&#252;n ota&#287;lar&#305; sil</a><br/>";
}
echo $divide;
if(($my_cp==1)or($id==21))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=delet_room&amp;ref=$ref\">S&#246;hbet ota&#287;&#305;n temizle</a><br/>";
if(($my_cp==1)or($id==21))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=call&amp;ref=$ref\">&#220;zvleri ota&#287;a &#231;a&#287;&#305;r</a><br/>";
if(($my_cp==1)or($id==21)or($my_cp==2))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=xaric&amp;ref=$ref\">Xaric Olunanlar-$xx</a><br/>";
if(($my_cp==1)or($id==21))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=duzelis&amp;ref=$ref\">D&#252;zeli&#351;ler</a><br/>";
break;

case "delet_room":
$s = mysql_query("delete FROM `group_room` where `group_id` = '".$number."'");
if($s){
echo "S&#246;hbet ota&#287;&#305; temizlendi.<br/>";
}else{
echo "Xeta var..<br/>";
}
break;

case "znak":
if ($handle = opendir('icons')) {
echo "Tarif:<br/>";
echo $fsize2;
echo "<select name=\"tarif$ref\">";
echo "<option value=\"15\">15 g&#252;n 100 bal</option>";
echo "<option value=\"30\">1 ay 180 bal</option>";
echo "<option value=\"60\">2 ay 300 bal</option>";
echo "<option value=\"90\">3 ay 500 bal</option>";
echo "</select><br/><br/>";
echo $fsize1;
echo "<b>Qeyd:</b> Znak&#305;n m&#252;ddeti se&#231;diyiniz tarife g&#246;re qrupunuzun qar&#351;&#305;s&#305;nda g&#246;r&#252;necek<br/>";
echo "*****<br/>";
$num = 0;
while ($i >= $num && false!== ($file = readdir($handle)))
{
if($file == '.' || $file == '..'){
}else{
$f = explode('.', $file);
echo "<img src=\"icons/$file\" alt=\"".$file."\"/> <anchor title=\"go\">se&#231;<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=goznak&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"tarif\" value=\"$(tarif$ref)\"/>";
echo "<postfield name=\"zn\" value=\"".$f[0]."\"/>";
echo "<postfield name=\"icon\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}
$i++;
}
closedir($handle);
}
break;

case "goznak":
if($_POST['tarif']==15){
$err = 15 * 86400;
$zn_bal = 100;
}else
if($_POST['tarif']==30){
$err = 30 * 86400;
$zn_bal = 180;
}else
if($_POST['tarif']==60){
$err = 60 * 86400;
$zn_bal = 300;
}else
if($_POST['tarif']==90){
$err = 90 * 86400;
$zn_bal = 500;
}
else
{
echo "Tebrikler iz bu ilin Hackeri se&#231;ildiniz.<br/>";
break;
}
if(($_POST['zn'] < 1)or($_POST['zn'] > 10)){
echo "Tebrikler iz bu ilin Hackeri se&#231;ildiniz.<br/>";
break;
}
else if($row['bal'] <= $zn_bal){
echo "Znak almaq &#252;&#231;&#252;n bal&#305;n&#305;z kifayet qeder deyil<br/>";
break;
}
else
{
$file = $_POST['zn'];
$dat = time() + $err;
mysql_query("Update `users` set `bal` = bal - $zn_bal WHERE `id` = '".$id."';");
mysql_query("Update `group` set `znak_date` = '".$dat."' WHERE `id` = '".$number."' and `admin` = '".$id."';");
mysql_query("Update `group` set `znak` = '".$file."' WHERE `id` = '".$number."' and `admin` = '".$id."';");
echo "Emeliyat u&#287;urla ba&#351;a &#231;atd&#305;.<br/>";
}

break;

case "plaint":
$all = mysql_query("SELECT * FROM `group_sikayet` WHERE `group_id` = '".$number."' and `act` = '1';");
if(mysql_num_rows($all)==0)echo "&#350;ikayet eden yoxdur.<br/>";
while($pl = mysql_fetch_array($all))
{
$pid =$pl['id'];
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;pid=$pid&amp;act=pl_bax&amp;ref=$ref\">".$pl['aid_name']."</a> &#187; <b>".$pl['usid_name']."</b><br/>";
}
break;

case "pl_bax":
if(!isset($_POST['ceza'])){
$b = mysql_query("SELECT * FROM `group_sikayet` WHERE `group_id` = '".$number."' and `id` = '".$pid."' and `act` = '1';");
$p_bax = mysql_fetch_array($b);

echo "<u>".$p_bax['aid_name']."</u> - <u>".$p_bax['usid_name']."</u> den &#351;ikayet edir.<br/>";
echo "<b>Sebeb:</b> ".$p_bax['text']."<br/>";
echo "<br/>";

echo "Kimi cezaland&#305;raq?<br/>";
echo $fsize2;
echo "<select name=\"ad$ref\">";
echo "<option value=\"".$p_bax['aid']."\">".$p_bax['aid_name']."</option>";
echo "<option value=\"".$p_bax['usid']."\">".$p_bax['usid_name']."</option>";
echo "</select><br/>";
echo $fsize1;
echo "Cezalanma sebebi:<br/>";
echo $fsize2;
echo "<input type=\"sebeb\" name=\"sebeb$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Xaric et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=$act&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"ad\" value=\"$(ad$ref)\"/>";
echo "<postfield name=\"ceza\" value=\"ok\"/>";
echo "</go></anchor><br/>";
echo "<br/>";
echo "<b>Qeyd:</b> Eger <b>".$p_bax['aid_name']."</b> sebebsiz yere &#351;ikyet edirse &#246;zu cezalanmal&#305;d&#305;.<br/>";
mysql_query("Update `group_sikayet` set `act` = '0' and `id` = '".$pid."';");
} else {
$ad = $_POST['ad'];
$sebeb = $_POST['sebeb'];
if($ad==1){
echo "Sen deyesen Unutmusan ki, Buran&#305;n Sahibi Tural4ik Dir! &#304;ndi Tural4ik sene ba&#351;a salar!!<br/>";
}else{

if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$ad."' and `group_id` = '".$number."';"))!=0){
echo "Siz bu &#351;exsi daha &#246;nce xaric etmisiz.<br/>";
}else{
$us_name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ad."' and `group` = '".$number."';"));
mysql_query("insert into `group_ban` set `usid` = '".$ad."', `name` = '".$us_name['user']."', `group_id` = '".$number."', `sebeb` = '".$sebeb."', `time` = '".time()."';");
//mysql_query ("Update `users` set `group_cp` = '0' where `id` = '".$ad."' and `group` = '".$number."'");
mysql_query ("INSERT INTO `group_room` SET `usid` = '".$id."', `name` = 'Rehberlik', `group_id` = '".$number."', `text` = 'nikini qrupdan xaric etdi!..', `kime_nik` = '".$us_name['user']."', `nov` = '0', `time` = '".time()."'");
echo "<b>".$us_name['user']."</b> xaric edildi.<br/>";
}}

}
break;

case "delet_all":
if($id!=21){
echo "Bura giri&#351; size qada&#287;and&#305;r.<br/>";
break;
}
$s = mysql_query("delete FROM `group_room`");
if($s){
echo "B&#252;t&#252;n otaqlar temizlendi.<br/>";
}else{
echo "Xeta var..<br/>";
}
break;

case "mesaj":
if($id!=21){
echo "Bura giri&#351; size qada&#287;and&#305;r.<br/>";
break;
}
if(!isset($_POST['send'])){
echo "&#220;mumi Mesaj:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"mesaj$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Yalniz: ";
echo $fsize2;
echo "<select name=\"kime$ref\">";
echo "<option value=\"1\">&#220;zvlere</option>";
echo "<option value=\"2\">Rehberlere</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=mesaj&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"mesaj\" value=\"$(mesaj$ref)\"/>";
echo "<postfield name=\"kime\" value=\"$(kime$ref)\"/>";
echo "<postfield name=\"send\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
if($_POST["kime"]==1){
$s = mysql_query("SELECT * FROM `users` WHERE `group` != '0' and `group_act` = '1'");
while($all_us = mysql_fetch_array($s))
{
$usid = $all_us['id'];
$nick = $all_us['user'];
$sms = $_POST['mesaj'];
$rn = rand(0,99999999);
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."',`idtowhom` = '".$usid."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");
}
echo "Yazd&#305;g&#305;n&#305;z mesaj b&#252;t&#252;n qrup &#252;zvlerine g&#246;nderildi<br/>";

}else if($_POST["kime"]==2){
$qrup = mysql_query("SELECT * FROM `users` WHERE `group_cp` = '1';");
while($all_re = mysql_fetch_array($qrup))
{
$nick = $all_re['user'];
$usid = $all_re['id'];
$sms = $_POST['mesaj'];

$rn = rand(0,99999999);
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."', `idtowhom` = '".$usid."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");
}
echo "Yazd&#305;g&#305;n&#305;z mesaj b&#252;t&#252;n qrup rehberlerine g&#246;nderildi<br/>";
}
}
break;

case "call":
if(!isset($_POST['cal'])){
echo "&#220;zvler.<br/>";
echo $fsize2;
echo "<select name=\"who$ref\">";
echo "<option value=\"1\">Ham&#305;</option>";
echo "<option value=\"2\">Onlaynda olanlar</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor title=\"call\">G&#246;nder<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=call&amp;r=$ref\" method=\"post\">";
echo "<postfield name=\"who\" value=\"$(who$ref)\"/>";
echo "<postfield name=\"cal\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
$who = $_POST['who'];
if($who==2){
$sql = mysql_query("UPDATE `users` SET `group_call` = '1' where `onl` > '".time()."' and `group` = '".$number."' and `group_act` = '1'");
if($sql){echo "Sizin qrupun yaln&#305;z onlaynda olan istifade&#231;ilerine devet g&#246;nderildi.<br/>";
}else{
echo "Xeta var.<br/>";
}
}else
if($who==1){
$sql = mysql_query("UPDATE `users` SET `group_call` = '1' where `group` = '".$number."' and `group_act` = '1'");
if($sql){echo "Sizin qrupun b&#252;t&#252;n istifade&#231;ilerine devet g&#246;nderildi.<br/>";
}else{
echo "Xeta var.<br/>";
}
}else{
echo "Xeta var.<br/>";
}
}
break;

case "duzelis":
if(!isset($_POST['add'])){
echo "Qrup:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"my_grup$ref\" value=\"".$g_row['name']."\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Qrup haqq&#305;nda:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"about$ref\" value=\"".$g_row['info']."\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Deyi&#351;<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=duzelis&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"my_grup\" value=\"$(my_grup$ref)\"/>";
echo "<postfield name=\"about\" value=\"$(about$ref)\"/>";
echo "<postfield name=\"add\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
mysql_query("update `group` set `name` = '".$my_grup."', `info` = '".$about."' where `admin` = '".$id."';");
echo "Duzeli&#351;ler qeyde al&#305;nd&#305;.<br/>";
}
break;

case "xaric":
if($cod=="qaytar"){
if(mysql_query("delete from `group_ban` where `id` = '".$gid."' and `group_id` = '".$number."'")){
echo "Qeyd etdiyiniz istifade&#231;i qrupa qaytar&#305;ld&#305;.<br/>";
}else{
echo "<b>Xeta:</b> Emeliyyat ba&#351; tutmad&#305;<br/>";
}
break;
}

$i = 1;
$q = mysql_query("SELECT * FROM `group_ban` where `group_id` = '".$number."' ORDER BY `time` DESC;");
if(mysql_num_rows($q)==0)echo "He&#231;kes xaric olunmay&#305;b..<br/>";
while($view = mysql_fetch_array($q))
{
$gid = $view["id"];
$nk = $view["usid"];
$name = $view["name"];
$sebeb = $view["sebeb"];

echo $i.". [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=$act&amp;cod=qaytar&amp;gid=$gid&amp;ref=$ref\">x</a>] &#187; <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$name</a><br/>";
echo "<u>Sebeb</u>: $sebeb<br/>";
$i++;
}
break;

case "edit":
$nick = trim($ad);
if($nick=="")$nick=0;
$latuser=strtolower($nick);

if (!ctype_digit($nick)) {
$result = mysql_query ("Select * from users where latuser = '".$latuser."'");
} else {
$result = mysql_query ("Select * from users where id = '".$latuser."'");
}

if (mysql_affected_rows() == 0)
{
echo "&#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>\n";
break;
}

$ro = mysql_fetch_array ($result);
$usid = $ro["id"];
$us_name = $ro["user"];

mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$usid."';");
if (mysql_affected_rows() == 0)
{
echo "<u>$us_name</u> sizin qrupun &#252;zv&#252; deyil.<br/>\n";
break;
}

if($gr['admin']==$usid){
echo "Havalanibsan?<br/>\n";
break;
}

if(empty($cod)){
echo "&#304;D: <u>$usid</u><br/>";
echo "Nick: <b><u>$us_name</u></b><br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ad=$usid&amp;number=$number&amp;act=edit&amp;cod=ceza&amp;ref=$ref\">Cezalandir</a><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ad=$usid&amp;number=$number&amp;act=edit&amp;cod=edit&amp;ref=$ref\">R&#252;tbe ver</a><br/>";
} else if($cod=="ceza") {
if(!isset($_POST['ceza'])){
echo "$us_name -in cezalanma sebebi:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"sebeb$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "[<anchor title=\"go\">Xaric et<go href=\"admin.php?id=$id&amp;ad=$usid&amp;ps=$ps&amp;number=$number&amp;act=edit&amp;cod=$cod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"ceza\" value=\"ok\"/>";
echo "</go></anchor>]<br/>";
}else{
if($_POST['ad']!='')$ad = $_POST['ad'];
$sebeb = trim($_POST['sebeb']);
if($ad==21){
echo "Sen deyesen Unutmusan ki, Buran&#305;n Sahibi Tura4ik Dir! &#304;ndi Tura4ik sene ba&#351;a salar!!<br/>";
}else{
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$ad."' and `group_id` = '".$number."';"))!=0){
echo "Siz bu &#351;exsi daha &#246;nce xaric etmisiz.<br/>";
}else{
mysql_query("insert into `group_ban` set `usid` = '".$ad."', `name` = '".$us_name."', `group_id` = '".$number."', `sebeb` = '".$sebeb."', `time` = '".time()."';");
mysql_query ("Update `users` set `group_cp` = '0', `group_act` = '0' where `id` = '".$ad."' and `group` = '".$number."'");
mysql_query ("INSERT INTO `group_room` SET `usid` = '".$id."', `name` = 'Rehberlik', `group_id` = '".$number."', `text` = 'nikini qrupdan xaric etdi!..', `kime_nik` = '".$us_name."', `nov` = '0', `time` = '".time()."'");
echo "<b>$us_name</b> xaric edildi.<br/>";
}}}
} else if($cod=="edit") {
echo "&#304;D: <u>$usid</u><br/>";
echo "Nick: <b><u>$us_name</u></b><br/>";
echo $divide;
echo "R&#252;tbesi<br/>";
echo $fsize2;
echo "<select name=\"rutbe$ref\">";
echo "<option value=\"0\">User</option>";
echo "<option value=\"2\">VIP</option>";
echo "<option value=\"3\">Moder</option>";
echo "</select><br/>";
echo $fsize1;
echo "[<anchor title=\"redakte\">Deyi&#351;<go href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=redakte&amp;r=$ref\" method=\"post\">";
echo "<postfield name=\"usid\" value=\"$usid\"/>";
echo "<postfield name=\"rutbe\" value=\"$(rutbe$ref)\"/>";
echo "</go></anchor>]<br/>";
}
break;

case "tesdiq":
$tesd = mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `group_act` = '0';");
if($us = mysql_num_rows($tesd)==0)echo "Tesdiq g&#246;zleyen yoxdur.<br/>";
while($us = mysql_fetch_array($tesd))
{
$usid = $us['id'];
echo "".$us['user']." - [<a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">&#304;nfo</a>]<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;us=$usid&amp;number=$number&amp;act=tes&amp;ref=$ref\">Tesdiq et</a> | <a href=\"admin.php?id=$id&amp;ps=$ps&amp;us=$usid&amp;number=$number&amp;act=redd&amp;ref=$ref\">Redd et</a><br/>";
}
break;

case "tes":
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$us."';"));
echo "<b>".$user['user']."</b> nickli istifade&#231;i art&#305;q sizin qrupun &#252;zv&#252; oldu.<br/>";
mysql_query ("Update `users` set `group` = '".$number."', `group_act` = '1' where `id` = '".$us."'");
break;

case "redd":
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$us."';"));
echo "<b>".$user['user']."</b> nickli istifade&#231;inin isteyi redd edildi.<br/>";
mysql_query ("Update `users` set `group` = '0', `group_act` = '0' where `id` = '".$us."'");
break;

case "redakte":
$rutbe = $_POST['rutbe'];
$usid = $_POST['usid'];
$qrup = mysql_query("SELECT * FROM `users` WHERE `id` = '".$usid."';");
$us = mysql_fetch_array($qrup);
$nick = $us['user'];

$rn = rand(0,99999999);

if($rutbe==2){
$level = "Vip";
}else
if($rutbe==3){
$level = "Moder";
}else
if($rutbe==0){
$level = "Adi istifade&#231;i";
}

$sms = "Hormetli <b>$nick</b>. <u>".$row["user"]."</u>, size &#246;z &#351;exsi qrupunda <b>$level</b> vezifesi teyin etdi.";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."',`idtowhom` = '".$usid."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");
mysql_query ("Update `users` set `group_cp` = '".$rutbe."' where `id` = '".$usid."' and `group` = '".$number."'");
echo "Melumat deyi&#351;dirildi.<br/>";
break;
}

echo $divide;
if($act)echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;ref=$ref\">Sosial Panel</a><br/>";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#220;mumi Qrupla&#351;ma</a><br/>\n";
echo "<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>