<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row["bal"];

$this_g = mysql_query ("Select * from `group` where `id` = '".$number."'");
$gr = mysql_fetch_array($this_g);
$my_group = $row["group"];
$my_act = $row["group_act"];
$my_cp = $row["group_cp"];


$create_b = 1000;

if ($row["sex"] == 0) {
$cinsi = " Bey";
} else {
$cinsi = " Xan&#305;m";
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
echo "<card id=\"error\" title=\"Sosial Qrupla&#351;ma\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

switch($act)
{

default:
if(($my_cp==1)or($id==1)){
echo "<b>Nik / ID</b><br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"ad$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Yenile<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=edit&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"ad\" value=\"$(ad$ref)\"/>";
echo "</go></anchor><br/>----<br/>";

echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=znak&amp;r=$ref\">Znak Al</a><br/>";
echo $divide;
}
if(($my_cp==1)or($id==1)or($my_cp==2)){
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '0';");
$inmenu = mysql_result($q, 0);
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=tesdiq&amp;r=$ref\">Tesdiq G&#246;zleyenler</a> ($inmenu)<br/>";
$p = mysql_query("SELECT COUNT(*) FROM `group_sikayet` WHERE `group_id` = '".$number."' and `act` = '1';");
$plain = mysql_result($p, 0);
if($plain!=0)$sikayet = "-".$plain;
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=plaint&amp;ref=$ref\">Shikayetler</a>$sikayet<br/>";
}

$x = mysql_query("SELECT COUNT(*) FROM `group_ban` WHERE `group_id` = '".$number."';");
$xx = mysql_result($x, 0);
if(($id==1)){
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=mesaj&amp;ref=$ref\">Umumi Mesaj</a><br/>";
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=delet_all&amp;ref=$ref\">B&#252;t&#252;n Ota&#287;lar&#305; Sil</a><br/>";
}
echo $divide;
if(($my_cp==1)or($id==1))echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=delet_room&amp;ref=$ref\">S&#246;hbet Ota&#287;&#305;n Temizle</a><br/>";
if(($my_cp==1)or($id==1))echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=call&amp;ref=$ref\">Uzvleri Ota&#287;a Chagir</a><br/>";
if(($my_cp==1)or($id==1)or($my_cp==2))echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=xaric&amp;ref=$ref\">Xaric Olunanlar</a> ($xx)<br/>";
if(($my_cp==1)or($id==1))echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=duzelis&amp;ref=$ref\">D&#252;zeli&#351;ler</a><br/>";
break;

case "delet_room":
$s = mysql_query("delete FROM `group_room` where `group_id` = '".$number."'");
if($s){
echo "<u>S&#246;hbet Ota&#287;&#305; Temizlendi...!!!</u><br/>";
}else{
echo "<b>Xeta Var...!!!</b><br/>";
}
break;

case "znak":
if ($handle = opendir('group/icons')) {
echo "Tarif<br/>";
echo $fsize2;
echo "<select name=\"tarif$ref\">";
echo "<option value=\"15\">15 G&#252;n 100 Bal</option>";
echo "<option value=\"30\">1 Ay 300 Bal</option>";
echo "<option value=\"60\">2 Ay 500 Bal</option>";
echo "<option value=\"90\">3 Ay 700 Bal</option>";
echo "</select><br/>----<br/>";
echo $fsize1;
echo "<b>Qeyd:</b> Znak&#305;n M&#252;ddeti Se&#231;diyiniz Tarife G&#246;re Qrupunuzun Qar&#351;&#305;s&#305;nda G&#246;r&#252;necek...!!!<br/>";
echo "----<br/>";
$num = 0;
while ($i >= $num && false!== ($file = readdir($handle)))
{
if($file == '.' || $file == '..'){
}else{
$f = explode('.', $file);
echo "<img src=\"group/icons/$file\" alt=\"".$file."\"/> <anchor title=\"go\">se&#231;<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=goznak&amp;ref=$ref\" method=\"post\">";
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
$zn_bal = 300;
}else
if($_POST['tarif']==60){
$err = 60 * 86400;
$zn_bal = 500;
}else
if($_POST['tarif']==90){
$err = 90 * 86400;
$zn_bal = 700;
}
else
{
echo "<u>Tebrikler Siz Bu ilin Hackeri Se&#231;ildiniz...!!!</u><br/>";
break;
}
if(($_POST['zn'] < 1)or($_POST['zn'] > 10)){
echo "<u>Tebrikler Siz Bu ilin Hackeri Se&#231;ildiniz...!!!</u><br/>";
break;
}
else if($row['bal'] <= $zn_bal){
echo "<b>Znak Almaq Ucun Bal&#305;n&#305;z Kifayet Qeder Bal Yoxdur...!!!</b><br/>";
break;
}
else
{
$file = $_POST['zn'];
$dat = time() + $err;
mysql_query("Update `users` set `bal` = bal - $zn_bal WHERE `id` = '".$id."';");
mysql_query("Update `group` set `znak_date` = '".$dat."' WHERE `id` = '".$number."' and `admin` = '".$id."';");
mysql_query("Update `group` set `znak` = '".$file."' WHERE `id` = '".$number."' and `admin` = '".$id."';");
echo "Emeliyat G&#287;urla Ba&#351;a Chatdi...!!!<br/>";
}

break;

case "plaint":
$all = mysql_query("SELECT * FROM `group_sikayet` WHERE `group_id` = '".$number."' and `act` = '1';");
if(mysql_num_rows($all)==0)echo "Shikayet Eden Yoxdur...!!!<br/>";
while($pl = mysql_fetch_array($all))
{
$pid =$pl['id'];
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;pid=$pid&amp;act=pl_bax&amp;ref=$ref\">".$pl['aid_name']."</a> <b>".$pl['usid_name']."</b><br/>";
}
break;

case "pl_bax":
if(!isset($_POST['ceza'])){
$b = mysql_query("SELECT * FROM `group_sikayet` WHERE `group_id` = '".$number."' and `id` = '".$pid."' and `act` = '1';");
$p_bax = mysql_fetch_array($b);

echo "<u>".$p_bax['aid_name']."</u> --&#xbb;&#xbb; <u>".$p_bax['usid_name']."</u> - den Shikayet Edir...!!!<br/>";
echo "<b>Sebeb</b> --&#xbb;&#xbb; (".$p_bax['text'].")<br/>";
echo "<br/>";

echo "Kimi Cezaland&#305;raq???<br/>";
echo $fsize2;
echo "<select name=\"ad$ref\">";
echo "<option value=\"".$p_bax['aid']."\">".$p_bax['aid_name']."</option>";
echo "<option value=\"".$p_bax['usid']."\">".$p_bax['usid_name']."</option>";
echo "</select><br/>";
echo $fsize1;
echo "Cezalanma Sebebi<br/>";
echo $fsize2;
echo "<input type=\"sebeb\" name=\"sebeb$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Xaric Ele<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=$act&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"ad\" value=\"$(ad$ref)\"/>";
echo "<postfield name=\"ceza\" value=\"ok\"/>";
echo "</go></anchor><br/>";
echo "<br/>";
echo "<b>Qeyd:</b> Eger <b>".$p_bax['aid_name']."</b> Sebebsiz Yere Shikyet Edirse Ozu Cezalanmal&#305;d&#305;...!!!<br/>";
mysql_query("Update `group_sikayet` set `act` = '0' and `id` = '".$pid."';");
} else {
$ad = $_POST['ad'];
$sebeb = $_POST['sebeb'];
if($ad==1){
echo "Sen Deyesen Unutmusan Ki, Buran&#305;n Sahibi ADMIN -dir...!!! Indi ADMIN Sene Ba&#351;a Salar Her Seyi...!!!<br/>";
}else{

if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$ad."' and `group_id` = '".$number."';"))!=0){
echo "Siz Bu Shexsi Daha Once Xaric Etmisiz...!!!<br/>";
}else{
$us_name = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ad."' and `group` = '".$number."';"));
mysql_query("insert into `group_ban` set `usid` = '".$ad."', `name` = '".$us_name['user']."', `group_id` = '".$number."', `sebeb` = '".$sebeb."', `time` = '".time()."';");
mysql_query ("INSERT INTO `group_room` SET `usid` = '".$id."', `name` = 'Rehberlik', `group_id` = '".$number."', `text` = 'nikini qrupdan xaric etdi!..', `kime_nik` = '".$us_name['user']."', `nov` = '0', `time` = '".time()."'");
echo "<b>".$us_name['user']."</b> Xaric Edildi...!!!<br/>";
}}

}
break;

case "delet_all":
if($id!=1){
echo "<b>Bura Giri&#351; Size Qada&#287;and&#305;r...!!!</b><br/>";
break;
}
$s = mysql_query("delete FROM `group_room`");
if($s){
echo "B&#252;t&#252;n Otaqlar Temizlendi...!!!<br/>";
}else{
echo "Xeta Var...!!!<br/>";
}
break;

case "mesaj":
if($id!=1){
echo "<b>Bura Giri&#351; Size Qada&#287;and&#305;r...!!!</b><br/>";
break;
}
if(!isset($_POST['send'])){
echo "Umumi Mesaj<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"mesaj$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Yalniz ";
echo $fsize2;
echo "<select name=\"kime$ref\">";
echo "<option value=\"1\">Uzvlere</option>";
echo "<option value=\"2\">Rehberlere</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=mesaj&amp;ref=$ref\" method=\"post\">";
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
echo "Yazd&#305;g&#305;n&#305;z Mesaj B&#252;t&#252;n Qrup Uzvlerine G&#246;nderildi...!!!<br/>";

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
echo "Yazd&#305;g&#305;n&#305;z Mesaj B&#252;t&#252;n Qrup Rehberlerine G&#246;nderildi...!!!<br/>";
}
}
break;

case "call":
if(!isset($_POST['cal'])){
echo "Uzvler<br/>";
echo $fsize2;
echo "<select name=\"who$ref\">";
echo "<option value=\"1\">Hamini</option>";
echo "<option value=\"2\">Onlinede Olanlar</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor title=\"call\">G&#246;nder<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=call&amp;r=$ref\" method=\"post\">";
echo "<postfield name=\"who\" value=\"$(who$ref)\"/>";
echo "<postfield name=\"cal\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
$who = $_POST['who'];
if($who==2){
$sql = mysql_query("UPDATE `users` SET `group_call` = '1' where `onl` > '".time()."' and `group` = '".$number."' and `group_act` = '1'");
if($sql){echo "Sizin Qrupun Yaln&#305;z Onlinede Olan Istifade&#231;ilerine Devet G&#246;nderildi...!!!<br/>";
}else{
echo "<b>Xeta Var...!!!</b><br/>";
}
}else
if($who==1){
$sql = mysql_query("UPDATE `users` SET `group_call` = '1' where `group` = '".$number."' and `group_act` = '1'");
if($sql){echo "Sizin Qrupun B&#252;t&#252;n Istifade&#231;ilerine Devet G&#246;nderildi...!!!<br/>";
}else{
echo "<b>Xeta Var...!!!</b><br/>";
}
}else{
echo "<b>Xeta Var...!!!</b><br/>";
}
}
break;

case "duzelis":
if(!isset($_POST['add'])){
echo "Qrup<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"my_grup$ref\" value=\"".$g_row['name']."\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Qrup Haqq&#305;nda<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"about$ref\" value=\"".$g_row['info']."\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Deyis<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=duzelis&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"my_grup\" value=\"$(my_grup$ref)\"/>";
echo "<postfield name=\"about\" value=\"$(about$ref)\"/>";
echo "<postfield name=\"add\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
mysql_query("update `group` set `name` = '".$my_grup."', `info` = '".$about."' where `admin` = '".$id."';");
echo "<u>Duzeli&#351;ler Qeyde Alindi...!!!</u><br/>";
}
break;

case "xaric":
if($cod=="qaytar"){
if(mysql_query("delete from `group_ban` where `id` = '".$gid."' and `group_id` = '".$number."'")){
echo "Qeyd Etdiyiniz Istifade&#231;i Qrupa Qaytar&#305;ld&#305;...!!!<br/>";
}else{
echo "<b>Xeta:</b> Emeliyyat Bas Tutmad&#305;...!!!<br/>";
}
break;
}

$i = 1;
$q = mysql_query("SELECT * FROM `group_ban` where `group_id` = '".$number."' ORDER BY `time` DESC;");
if(mysql_num_rows($q)==0)echo "He&#231; Kes Xaric Olunmay&#305;b...!!!<br/>";
while($view = mysql_fetch_array($q))
{
$gid = $view["id"];
$nk = $view["usid"];
$name = $view["name"];
$sebeb = $view["sebeb"];

echo $i.".) (<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=$act&amp;cod=qaytar&amp;gid=$gid&amp;ref=$ref\">Sil</a>)  <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$name</a><br/>";
echo "<u>Sebeb:</u>  ($sebeb)<br/>";
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
echo "Istifade&#231;i Tap&#305;lmad&#305;...!!!<br/>\n";
break;
}

$ro = mysql_fetch_array ($result);
$usid = $ro["id"];
$us_name = $ro["user"];

mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$usid."';");
if (mysql_affected_rows() == 0)
{
echo "<b>$us_name</b> Sizin Qrupun Uzv&#252; Deyil...!!!<br/>\n";
break;
}

if($gr['admin']==$usid){
echo "<b>Agillisan???</b><br/>\n";
break;
}

if(empty($cod)){
echo "ID: <u>$usid</u><br/>";
echo "Nik: <b>$us_name</b><br/>";
echo $divide;
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;ad=$usid&amp;number=$number&amp;act=edit&amp;cod=ceza&amp;ref=$ref\">Cezalandir</a><br/>";
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;ad=$usid&amp;number=$number&amp;act=edit&amp;cod=edit&amp;ref=$ref\">R&#252;tbe Ver</a><br/>";
} else if($cod=="ceza") {
if(!isset($_POST['ceza'])){
echo "$us_name -in cezalanma sebebi:<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"sebeb$ref\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Xaric Ele<go href=\"s-admin.php?id=$id&amp;ad=$usid&amp;ps=$ps&amp;number=$number&amp;act=edit&amp;cod=$cod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"ceza\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
if($_POST['ad']!='')$ad = $_POST['ad'];
$sebeb = trim($_POST['sebeb']);
if($ad==1){
echo "Sen Deyesen Unutmusan Ki, Buran&#305;n Sahibi ADMIN -dir...!!! Indi ADMIN Sene Ba&#351;a Salar Her Seyi...!!!<br/>";
}else{
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$ad."' and `group_id` = '".$number."';"))!=0){
echo "Siz Bu Shexsi Daha Once Xaric Etmisiz...!!!<br/>";
}else{
mysql_query("insert into `group_ban` set `usid` = '".$ad."', `name` = '".$us_name."', `group_id` = '".$number."', `sebeb` = '".$sebeb."', `time` = '".time()."';");
mysql_query ("Update `users` set `group_cp` = '0', `group_act` = '0' where `id` = '".$ad."' and `group` = '".$number."'");
mysql_query ("INSERT INTO `group_room` SET `usid` = '".$id."', `name` = 'Rehberlik', `group_id` = '".$number."', `text` = 'nikini qrupdan xaric etdi!..', `kime_nik` = '".$us_name."', `nov` = '0', `time` = '".time()."'");
echo "<b>$us_name</b> Xaric Edildi...!!!<br/>";
}}}
} else if($cod=="edit") {
echo "ID: <u>$usid</u><br/>";
echo "Nik: <b>$us_name</b><br/>";
echo $divide;
echo "R&#252;tbesi<br/>";
echo $fsize2;
echo "<select name=\"rutbe$ref\">";
echo "<option value=\"0\">User</option>";
echo "<option value=\"2\">VIP</option>";
echo "<option value=\"3\">Moder</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor title=\"redakte\">Deyi&#351;<go href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=redakte&amp;r=$ref\" method=\"post\">";
echo "<postfield name=\"usid\" value=\"$usid\"/>";
echo "<postfield name=\"rutbe\" value=\"$(rutbe$ref)\"/>";
echo "</go></anchor><br/>";
}
break;

case "tesdiq":
$tesd = mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `group_act` = '0';");
if($us = mysql_num_rows($tesd)==0)echo "Tesdiq G&#246;zleyen Yoxdur...!!!<br/>";
while($us = mysql_fetch_array($tesd))
{
$usid = $us['id'];
echo "".$us['user']." --&#xbb;&#xbb; <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">Info</a><br/>";
echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;us=$usid&amp;number=$number&amp;act=tes&amp;ref=$ref\">Tesdiq Ele</a> | <a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;us=$usid&amp;number=$number&amp;act=redd&amp;ref=$ref\">Redd Ele</a><br/>";
}
break;

case "tes":
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$us."';"));
echo "<b>".$user['user']."</b> Nikli Istifade&#231;i Art&#305;q Sizin Qrupun Uzv&#252; Oldu...!!!<br/>";
mysql_query ("Update `users` set `group` = '".$number."', `group_act` = '1' where `id` = '".$us."'");
break;

case "redd":
$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$us."';"));
echo "<b>".$user['user']."</b> Nikli Istifade&#231;inin Isteyi Redd Edildi...!!!<br/>";
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
$level = "Adi Istifade&#231;i";
}

$sms = "Hormetli <b>$nick</b>. <u>".$row["user"]."</u> Size Oz Shexsi Qrupunda <b>$level</b> Vezifesi Teyin Etdi...!!!";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."',`idtowhom` = '".$usid."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");
mysql_query ("Update `users` set `group_cp` = '".$rutbe."' where `id` = '".$usid."' and `group` = '".$number."'");
echo "Melumat Deyi&#351;dirildi...!!!<br/>";
break;
}

echo $divide;
if($act)echo "<a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;number=$number&amp;ref=$ref\">Sosial Panel</a><br/>";
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Umumi Qrupla&#351;ma</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize Qayit</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>