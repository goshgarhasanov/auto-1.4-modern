<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);



$ttime = time()+$vaxt;
$bal = $row["bal"];

$my_group = $row["group"];
$my_act = $row["group_act"];
$my_cp = $row["group_cp"];
$my_look = $row["group_look"];

$create_b = 300;
$beyen_bal = 5;

$q_bal = 5;
$xt_bal = 3;
$e_bal = 1;
if($my_cp==1){
$q_bal = 0;
$xt_bal = 0;
$e_bal = 0;
}

if ($row["sex"] == 0) {
$cinsi = " Bey";
} else {
$cinsi = " Xan&#305;m";
}


$avr = $row["avr"];
$rm_max = $row["max"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";

if (($bol == "chat")&&(empty($_GET["action"]))) {
echo "<card id=\"error\" title=\"Sosial Qrupla&#351;ma\" ontimer=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\"><timer value=\"$avr\"/>\n";
} else {
echo "<card id=\"error\" title=\"Sosial Qrupla&#351;ma\">\n";
}

switch ($bol){

default:
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Sosial Qrupla&#351;ma...!!!</b><br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;
echo "Salam <b>".$row["user"]."</b>".$cinsi."...!!!<br/>----<br/>";
if ($my = mysql_fetch_array(mysql_query("SELECT * FROM `group` where `admin` = '".$id."'"))){
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=".$my['id']."&amp;ref=$ref\">Sizin Qrup</a> | ";
} else if($my_group!="0"){
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$my_group&amp;ref=$ref\">Sizin Qrup</a> | ";
}else {
echo "<br/>";
}
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=create&amp;ref=$ref\">Qrup Yarat</a><br/>";
echo "----<br/>";

if(($id==1)&&($act=="del")){
mysql_query("delete FROM `group` where `id` = '".$number."';");
mysql_query("delete FROM `group_room` where `group_id` = '".$number."';");
mysql_query("delete FROM `group_ban` where `group_id` = '".$number."';");
mysql_query("delete FROM `group_like` where `key` = '".$number."';");
$select = @mysql_query ("Select `admin` from `group` where `id`='".$number."';");
$inf = mysql_fetch_array ($select);
$nk=$inf["admin"];

$selectt = @mysql_query ("Select `id` from `users` where `id`='".$nk."';");
$inff = mysql_fetch_array ($selectt);
$likes=$inff["id"];
mysql_query ("UPDATE `users` SET `group` = '0', `group_cp` = '0', `group_act` = '0' WHERE `id` = '".$likes."';");
}

$query = @mysql_query("SELECT COUNT(*) FROM `group`;");
$total = @mysql_result($query, 0);

if($id==1){
if($act=="aktiv"){
mysql_query("UPDATE `group` set `act` = '0' where `id` = '".$number."';");
}else if($act=="deaktiv"){
mysql_query("UPDATE `group` set `act` = '1' where `id` = '".$number."';");
}
}

if($start=='')$start = 0;
$i = $start + 1;
$kmess = 10;

$q = mysql_query("SELECT * FROM `group` ORDER BY `host` DESC, `hit` DESC LIMIT $start, $kmess;");
if(mysql_num_rows($q)==0)echo "Qrup Yarad&#305;lmay&#305;b...!!!<br/>";
while($view = mysql_fetch_array($q))
{

if($i==1){$yer = "<img src=\"group/img/".$i.".gif\"/>";
}elseif($i==2){
$yer = "<img src=\"group/img/".$i.".gif\"/>";
}elseif($i==3){
$yer = "<img src=\"group/img/".$i.".gif\"/>";
}else{
$yer = $i.". ";
}

$host = $view["host"];
$hit = $view["hit"];
$number = $view["id"];
$group_act = $view["act"];
$znak = $view["znak_date"];
$img = explode('.', $znak);
$file = $img[0];
$vaxt = $img[1];
$znaks = $view["znak"];
$name = $view["name"];
$name = mb_substr($name, 0, 40);
if (mb_strlen($name) > 40){
$noqteler = ' ...';
}

$d = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '1';");
$inmenu = mysql_result($d, 0);

if($group_act==1.){
$aktiv = " (<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=aktiv&amp;start=$start&amp;ref=$ref\">On</a>) ";
}else{
$aktiv = " (<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=deaktiv&amp;start=$start&amp;ref=$ref\">Off</a>) ";
}

if($id==1.)echo $aktiv." (<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=del&amp;start=$start&amp;ref=$ref\">Sil</a>) ";
if($group_act==1){
echo " <b>(Ba&#287;l&#305;)</b> ".$name." ".$noqteler." (".$host."/".$hit.")<br/>";
}else{
echo "$i.) ";
if($znak > time())echo "<img src=\"group/icons/".$znaks.".gif\" alt=\"*\"/> ";
echo " <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">".$name."".$noqteler."</a> (".$host."/".$hit.")<br/>";
}

$no = 1;
$h = mysql_query("SELECT DISTINCT `usid`,`name` FROM `group_room` WHERE `group_id` = '".$number."' and `time` > '".$ttime."' ORDER BY `time` DESC limit 5;");
if($u = mysql_num_rows($h)!=0){
while($u = mysql_fetch_array($h))
{
if($no==1){
echo $u['name'];
}else{
echo ", ".$u['name'];
}
$no++;
}
echo "...<br/>";
}

$i++;
}

if ($total > $kmess) {
echo $divide;
echo navigation('sosial.php?id='.$id.'&amp;ps='.$ps.'&amp;bol='.$bol.'&amp;ref='.$ref.'&amp;', $start, $total, $kmess);
echo "<br/>";
}

echo "----<br/>";
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=rules&amp;ref=$ref\">Qaydalari Oxu</a><br/>";
break;

case 'xaric':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<u>Xaric Olunan Istifade&#231;iler...!!!</u><br/>";
echo $divide;
$i = 1;
$q = mysql_query("SELECT * FROM `group_ban` where `group_id` = '".$number."' ORDER BY `time` DESC;");
if(mysql_num_rows($q)==0){
echo "He&#231; Kes Xaric Olunmay&#305;b...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
while($view = mysql_fetch_array($q))
{
$nk = $view["usid"];
$name = $view["name"];
$sebeb = $view["sebeb"];
$group_id = $view["group_id"];
$group_name = mysql_fetch_array(mysql_query("SELECT `name` FROM `group` where `id` = '".$group_id."';"));

echo $i.".) <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$name</a><br/>";
if($sebeb!='')echo "<u>Sebeb:</u> ($sebeb)<br/>";
$i++;
}
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;

case 'create':
echo "<p align=\"left\">\n";
echo $fsize1;
if (empty($action)) {
echo "<b>Melumati Oxu...!!!</b><br/>";
echo "----<br/>";
echo "1.) Qrup Yaratmaq ($create_b Bal) Deyerindedir...!!!<br/>";
echo "2.) Qrupun Rehberi Chatdak&#305; Infosunda Hans&#305; Qrupun Rehberi Oldu&#287;u Qeyd Olunur...!!!<br/>";
echo "3.) Qrup Uzvunun Infosunda Hans&#305; Qrupun Uzvu Oldu&#287;u G&#246;r&#252;n&#252;r...!!!<br/>";
echo "4.) Qrupa Ucun Shexsi S&#246;hbet Ota&#287;&#305; Var Ve Orda Qrup Uzvleri Ve Rehber Yaz&#305;&#351;a Biler...!!!<br/>";
echo "5.) Qrupun Rehberi Kimi Istese Qrupdan Xaric Ede Bilir Ve Tebii Ki, Bir Daha Qay&#305;tmamaq Sherti ile...!!!<br/>";
echo "----<br/>";
if($my_group = mysql_num_rows(mysql_query("SELECT * FROM `group` where `admin` = '".$id."';"))!=0){
echo "Sizin Art&#305;q 1 Qrupunuz Var Yeniden Qrup Acma&#287;&#305;n&#305;z M&#252;mk&#252;n Deyil...!!!<br/>";
}else{
if ($bal >= $create_b) {
echo "Qrupun Ad&#305;<br/>";
echo $fsize2;
echo "<input name=\"name$ref\" title=\"name\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Qrup Haqq&#305;nda<br/>";
echo $fsize2;
echo "<input name=\"info$ref\" title=\"info\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Yarat<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=create&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"name\" value=\"$(name$ref)\"/>";
echo "<postfield name=\"info\" value=\"$(info$ref)\"/>";
echo "<postfield name=\"action\" value=\"create\"/>";
echo "</go></anchor><br/>";
} else {
echo "Hesab&#305;n&#305;zda Minimum <b>($create_b Bal)</b> Olmal&#305;d&#305;r...!!!<br/>";
}
}
} else
if(empty($_POST["name"])or empty($_POST["info"]))
{
echo "<b>Xeta...!!!</b> He&#231;ne Yazmad&#305;z...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";

break;
}else
if(mysql_num_rows(mysql_query("SELECT * FROM `group` where `name` = '".$_POST["name"]."' and `admin` = '".$id."';"))!=0){
echo "<b>Xeta...!!!</b> Bele Bir Qrup Art&#305;q M&#246;vcuddur. Zehmet Olmasa Ba&#351;qa Ad Se&#231;in...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}else{
$name = $_POST["name"];
$info = $_POST["info"];
$info = smile(narmobil($info));
mysql_query ("INSERT INTO `group` SET `name` = '".$name."', `info` = '".$info."', `admin` = '".$id."', `time` = '".time()."'");
mysql_query ("UPDATE `users` SET `group` = '".mysql_insert_id()."', `group_cp` = '1', `group_act` = '1' WHERE `id` = '".$id."';");
echo "Qeyd Etdiyiniz Qrup M&#252;veffeqiyyetle Yarad&#305;ld&#305;...!!!<br/>";
}
break;

case 'rules':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Qaydalari Oxu...!!!</b><br/>";
echo "----<br/>";
echo "1.) Istifade&#231;i Yaln&#305;n Bir Qrupa Uzv Ola Biler...!!!<br/>";
echo "2.) Qrupda Sohbet Ota&#287;&#305;nda Nalayiq S&#246;zler Ve Diger Sayitlar&#305; Reklam Etmek Olmaz...!!!<br/>";
echo "3.) Istifade&#231;i Istediyin Vaxt Qrupdan Cixib Ba&#351;qa Bir Qrupa Uzv Ola Biler...!!!<br/>";
echo "----<br/>";
echo "<b>Diqqet:</b> <u>Qrup Rehberinin S&#246;zleri Ve Ya Hereketleri Qrup Uzvleri Aras&#305;nda M&#252;zakire Oluna Bilmez...!!!</u><br/>";
break;

case 'group':
if($id==1){
if($eytu=="ok"){
mysql_query ("update `users` set `group_act` = '1' WHERE `id` = '".$id."'");
}}

$q = mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';");
if (mysql_affected_rows()==0){
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Qrup Tap&#305;lmad&#305;...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
if(mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `act` = '1';"))!=0){
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Qrup M&#252;veqqeti Olaraq Ba&#287;l&#305;d&#305;r...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}

echo "<p align=\"center\">\n";
echo $fsize1;
if(($number==$my_group)&&($my_cp==1)or($id==1))echo " <a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;bol=admin&amp;number=$number&amp;ref=$ref\">Sosial Panel</a><br/>".$divide;
if(($number==$my_group)&&($my_cp==2))echo " <a href=\"s-admin.php?id=$id&amp;ps=$ps&amp;bol=admin&amp;number=$number&amp;ref=$ref\">Sosial VIP Panel</a><br/>".$divide;

$view = mysql_fetch_array($q);
$name = strtr($view["name"], array ('>' => '&gt;', '<' => '&lt;', '&' => ' '));
$info = strtr($view["info"], array ('>' => '&gt;', '<' => '&lt;', '&' => ' '));
$admin = $view["admin"];
$qq = mysql_query("SELECT * FROM `group_like` WHERE `key` = '".$number."';");
$like = mysql_num_rows($qq);

$us_q = mysql_query("SELECT user FROM `users` WHERE `id` = '".$admin."';");
$us_view = mysql_fetch_array($us_q);
$admin_us = $us_view["user"];

echo "<b>".$name."</b><br/>";
echo "<br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;
echo "<b>Qrup Haqq&#305;nda</b><br/>";
echo $info."<br/>----<br/>";
echo "<u>Rehber</u> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$admin&amp;ref=$ref\">".$admin_us."</a><br/>";
echo "----<br/>";

$znak = $view["znak"];
$znak_tm = $view["znak_date"];

$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '1';");
$inmenu = mysql_result($q, 0);
if($znak_tm > time())echo "<u>Znak</u> <img src=\"group/icons/".$znak.".gif\" alt=\"*\"/><br/>----<br/>";
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))==0){
echo " <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=users&amp;number=$number&amp;ref=$ref\">Uzvler</a> ($inmenu)<br/>";
if ($number!=$my_group)echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=connect&amp;number=$number&amp;ref=$ref\">Qrupa Uzv Ol</a><br/>";
if (($number==$my_group)or($id==1))echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=chat&amp;number=$number&amp;ref=$ref\">S&#246;hbet Otagi</a><br/>";
}else{
echo "Siz Bu Qrupdan Xaric Edilmisiz...!!!<br/>";
$sebeb = mysql_fetch_array(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"));
echo "<u>Sebeb:</u> (".$sebeb['sebeb'].")<br/>";
}

$num = mysql_result(mysql_query("SELECT count(*) FROM `users` WHERE `group` = '".$number."' and `group_cp` != '0';"), 0);
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=moders&amp;number=$number&amp;ref=$ref\">Qrupun ADMIN-leri</a> ($num)<br/>";
echo "----<br/>";
echo " <anchor title=\"go\">Beyendim<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=like&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"like\" value=\"yes\"/>";
echo "</go></anchor>";
if($like!="0")echo " | <img src=\"group/img/b.PNG\"/> <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=showlike&amp;number=$number&amp;ref=$ref\">+ $like</a><br/>";
if($like==0)echo "<br/>";

$gr_ban = mysql_result(mysql_query("SELECT COUNT(*) FROM `group_ban` WHERE `group_id` = '".$number."';"), 0);
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=xaric&amp;number=$number&amp;ref=$ref\">Xaric Olunanlar</a> (".$gr_ban.")<br/>";

break;

case 'moders':
echo "<p align=\"left\">\n";
echo $fsize1;
$group_name = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$name = strtr($group_name['name'], array ('>' => '&gt;','<' => '&lt;','&' => ' '));

echo "<b>".$name."</b> Qrupunun Vezifelileri...!!!<br/>";
echo "----<br/>";

$moder = mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `group_cp` != '0' order by group_cp asc;");
while($v = mysql_fetch_array($moder))
{
$cp = $v['group_cp'];
$soft = strtok($v['user_soft'],'/');

if($v['time'] > time()){
if($soft =="Opera"){
$img = "<img src=\"group/img/komp.gif\"/>";
}else{
$img = "<img src=\"group/img/tel.gif\"/>";
}
}else{
$img = "<img src=\"group/img/ofl.gif\"/>";
}
if($cp==1){
$status = "Rehber";
}else
if($cp==3){
$status = "VIP";
}else
if($cp==2){
$status = "Moder";
}
echo "$img <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$v['id']."&amp;ref=$ref\">".$v['user']."</a> ($status)<br/>";
}
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";

break;

case 'showlike':
echo "<p align=\"left\">\n";
echo $fsize1;

$q = mysql_query("SELECT * FROM `group_like` WHERE `key` = '".$number."';");
$onu = mysql_num_rows($q);

if($onu==0) {
echo "Bu Qrupu Beyenen Olmayib...!!!<br/>\n";
}else{
$group_name = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$name = strtr($group_name['name'], array ('>' => '&gt;','<' => '&lt;','&' => ' '));

echo "<b>".$name."</b> Qrupunu Beyenenler ($onu)<br/>";
echo "----<br/>";

$num = 5;
@$page = ( integer)$_GET['page'];
$result00 = mysql_query( "SELECT COUNT(*) FROM `group_like` WHERE `key` = '".$number."';" );
$temp = mysql_fetch_array( $result00 );
$posts = $temp[0];
$total = ( $posts - 1 ) / $num + 1;
$total = intval( $total );
$page = intval( $page );
if ( empty( $page ) || $page < 0 )
{
$page = 1;
}
if ( $total < $page )
{
$page = $total;
}
$start = $page * $num - $num;
$iz = $page * $num - $num + 1;


$q = mysql_query("SELECT * FROM `group_like` WHERE `key` = '".$number."' ORDER BY `id` DESC LIMIT $start, $num;");
while ($inf = mysql_fetch_array($q)) {
$eid = $inf['id'];
$usid = $inf['usid'];

$qq = mysql_query("SELECT * FROM `users` WHERE `id` = '".$usid."';");
$inff = mysql_fetch_array($qq);
$nick = $inf['user'];
echo "$iz.)  <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid$takep\">$nick</a><br/>";
++$iz;
}

$url_for_pstr = "sosial.php?id=$id&amp;ps=$ps&amp;bol=showlike&amp;number=$number&amp;page=";
if ( 0 < $page - 5 )
{
$page5left = ( ( " <a href=\"".$url_for_pstr.( $page - 5 ) )."&amp;ref={$ref}\">".( $page - 5 ) )."</a> | ";
}
if ( 0 < $page - 4 )
{
$page4left = ( ( " <a href=\"".$url_for_pstr.( $page - 4 ) )."&amp;ref={$ref}\">".( $page - 4 ) )."</a> | ";
}
if ( 0 < $page - 3 )
{
$page3left = ( ( " <a href=\"".$url_for_pstr.( $page - 3 ) )."&amp;ref={$ref}\">".( $page - 3 ) )."</a> | ";
}
if ( 0 < $page - 2 )
{
$page2left = ( ( " <a href=\"".$url_for_pstr.( $page - 2 ) )."&amp;ref={$ref}\">".( $page - 2 ) )."</a> | ";
}
if ( 0 < $page - 1 )
{
$page1left = ( ( " <a href=\"".$url_for_pstr.( $page - 1 ) )."&amp;ref={$ref}\">".( $page - 1 ) )."</a> | ";
}
if ( $page + 5 <= $total )
{
$page5right = ( ( " | <a href=\"".$url_for_pstr.( $page + 5 ) )."&amp;ref={$ref}\">".( $page + 5 ) )."</a>";
}
if ( $page + 4 <= $total )
{
$page4right = ( ( " | <a href=\"".$url_for_pstr.( $page + 4 ) )."&amp;ref={$ref}\">".( $page + 4 ) )."</a>";
}
if ( $page + 3 <= $total )
{
$page3right = ( ( " | <a href=\"".$url_for_pstr.( $page + 3 ) )."&amp;ref={$ref}\">".( $page + 3 ) )."</a>";
}
if ( $page + 2 <= $total )
{
$page2right = ( ( " | <a href=\"".$url_for_pstr.( $page + 2 ) )."&amp;ref={$ref}\">".( $page + 2 ) )."</a>";
}
if ( $page + 1 <= $total )
{
$page1right = ( ( " | <a href=\"".$url_for_pstr.( $page + 1 ) )."&amp;ref={$ref}\">".( $page + 1 ) )."</a>";
}
if ( 0 < $page - 1 )
{
$nazad = ( "<a href=\"".$url_for_pstr.( $page - 1 ) )."&amp;ref={$ref}\">Evvelki</a>";
}
if ( $page + 1 <= $total )
{
$vpered = ( "<a href=\"".$url_for_pstr.( $page + 1 ) )."&amp;ref={$ref}\">Novbeti</a>";
}
if ( 1 < $total )
{
echo "----<br/>\n";
Error_Reporting( E_ALL & ~E_NOTICE );
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<b>".$page."</b>".$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage."<br/> ".$nazad." ".$vpered;
echo "<br/>";
}

}
break;


case 'like':
echo "<p align=\"left\">\n";
echo $fsize1;
$bal=$row["bal"];
if($bal<$beyen_bal){
echo "Bu Qrupu Beyenmek Ucun Hesab&#305;n&#305;zda En Az&#305; (".$beyen_bal.") Olmal&#305;d&#305;r...!!!<br/>";
}else{
mysql_query ("SELECT * FROM `group_like` WHERE `usid`='".$id."' and `key`='".$number."'");
if (mysql_affected_rows()!=0){
echo "Bu Qrupu Beyenmisiniz...!!!<br/>\n";
}else{
mysql_query("INSERT INTO `group_like` SET `usid` = '".$id."',`user` = '".$row['user']."',`key` = '".$number."';");
mysql_query ("update group set beyen = beyen+1 where id = '".$number."';");
mysql_query ("update users set bal = bal-5 where id = '".$id."';");
echo "Qrupumuzu Beyendiyiniz Ucun Te&#351;ekk&#252;rler...!!!<br/>";
echo "Hesab&#305;n&#305;zdan (".$beyen_bal.") Cixildi...!!!<br/>";
}
}


break;

case 'connect':
echo "<p align=\"left\">\n";
echo $fsize1;

if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))!=0){
echo "<b>Xeta...!!!</b> Siz Daha Once Bu Qrupdan Xaric Edilibsiz. Yeniden Uzv Olma&#287;&#305;n&#305;z M&#252;mk&#252;n Deyil...!!!<br/>";
break;
}
mysql_query ("Select * from `group` where `admin` = '".$id."'");
if(mysql_affected_rows()==0){
if(empty($action)) {
echo "<b>Qrupa Uzv Ol...!!!</b><br/>";
echo "----<br/>";
echo "Bu Qrupa Uzv Olmaq Isteyirsiniz???<br/>----<br/>";
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yox</a> / <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=connect&amp;number=$number&amp;action=ok&amp;ref=$ref\">He</a><br/>";
echo "----<br/>";
echo "<b>Diqqet:</b> <u>Eyer Bu Qrupa Uzv Olsan&#305;z Diger Qrupdan Cixmali Olacaqs&#305;n&#305;z...!!!</u><br/>";
} else if($action=="ok") {
echo "<u>Ugurlar...!!!</u><br/>";
echo $divide;
echo "Siz Art&#305;q Qeyd Olunan Qrupun Uzvu Oldunuz...!!!<br/>";
echo "Qrup ADMIN-i Sizi Tesdiqledikden Sonra Sizde Qrup Uzvu Olacaqs&#305;n&#305;z...!!!<br/>";

if($row['group']!=0){
$group_ad = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$row['group']."';"));
$nk = $group_ad['admin'];

$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
$onuser = mysql_fetch_array($qb);
$nickname = $onuser['user'];

$rnd = rand(0,99999999);
$metn = "Hormetli <b>$nickname</b> <u>".$row["user"]."</u> Sizin Qrupdan Cixdi...!!!";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rnd."',`idtowhom` = '".$nk."',`towhom` = '".$nickname."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$metn."';");
}

$group_add = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$user = $group_add['admin'];

$qrup = mysql_query("SELECT * FROM `users` WHERE `id` = '".$user."';");
$us = mysql_fetch_array($qrup);
$nick = $us['user'];

$rn = rand(0,99999999);
$sms = "Hormetli <b>$nick</b> <u>".$row["user"]."</u> Sizin Qrupa Uzv Olmaq Isteyir Zehmet Olmasa <b>Sosial Panele</b> Daxil Olub Bu Istifade&#231;ini Tesdiq Ederdiz...!!!";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."',`idtowhom` = '".$user."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");

mysql_query ("Update `users` set `group` = '".$number."', `group_act` = '0', `group_cp` = '0' where `id` = '".$id."'");
}
} else {
echo "Sizin Shexsi Qrupunuz Var Ona G&#246;re He&#231; Bir Qrupa Uzv Ola Bilmezsiniz...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
}
break;

case 'users':
echo "<p align=\"left\">\n";
echo $fsize1;
$q = mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';");
$view = mysql_fetch_array($q);
$name = $view["name"];
$admin = $view["admin"];
echo "<b>".$name."</b> Qrupunun Uzvleri...!!!<br/>";
echo "----<br/>";

if((mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `admin` = '".$id."';"))!=0)&&($xaric!=0))
{
mysql_query("update `users` set `group` = '0', `group_act` = '0', `group_cp` = '0' WHERE `id` = '".$xaric."';");
mysql_query("delete FROM `group_room` where `usid` = '".$xaric."';");
}

$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '1';");
$inmenu = mysql_result($q, 0);

if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;

$q = mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `group_act` = '1' ORDER BY `id` DESC LIMIT $s,10;");
while($view = mysql_fetch_array($q))
{
$nk = $view["id"];
$us = $view["user"];
$cp = $view["group_cp"];

if(mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `admin` = '".$id."';"))!=0)
{
echo "(<a href=\"sosial.php?id=$id&amp;bol=$bol&amp;number=$number&amp;ps=$ps&amp;xaric=$nk&amp;ref=$ref\">Sil</a>) ";
}
echo " <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$us</a><br/>";
}

if ($inmenu > 10) echo "----<br/>";
if ($inmenu > $s + 10)  print "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;s=".($s + 10)."&amp;bol=users&amp;number=$number&amp;ref=$ref\">Novbeti</a><br/>\n";
if ($s > 0)  print "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;s=".($s - 10)."&amp;bol=users&amp;number=$number&amp;ref=$ref\">Evvelki</a><br/>\n";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;

case 'chat':
echo "<p align=\"left\">\n";
echo $fsize1;
if(mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `act` = '1';"))!=0){
echo "Qrup M&#252;veqqeti Olaraq Ba&#287;l&#305;d&#305;r...!!!<br/>";
break;
}

if($id!='1'){
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))!=0){
echo "<b>Xeta...!!!</b> Siz Daha Once Bu Qrupdan Xaric Edilibsiz. Yeniden Uzv Olma&#287;&#305;n&#305;z M&#252;mk&#252;n Deyil...!!!<br/>";
break;
}

$test = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$id."';"));
if($test['group_act']==0){
echo "Yaln&#305;z Qrup Rehberi Sizi Tesdiq Eledikden Sonra Otaga Daxil Ola Bilersiz...!!!<br/>";
break;
}
}

mysql_query ("Select * from `group_count` where `group_id` = '".$number."' and `ip` = '".$REMOTE_ADDR."' and `brow` = '".$HTTP_USER_AGENT."'");
if (mysql_affected_rows()==0){
mysql_query ("INSERT INTO `group_count` SET `group_id` = '".$number."', `ip` = '".$REMOTE_ADDR."', `brow` = '".$HTTP_USER_AGENT."'");
mysql_query ("update `group` set `hit` = hit + 1, `host` = host + 1 WHERE `id` = '".$number."'");
} else {
mysql_query ("update `group` set `hit` = hit + 1 WHERE `id` = '".$number."'");
}

if(isset($_POST['get'])=="yaz"){
if(empty($_POST['message'])){
echo "<b>Xeta...!!!</b> Mesaj Yaz&#305;lmay&#305;b...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}

if($_POST['yazi']==1){
if($row['bal'] < $q_bal){
echo "Qal&#305;n Yazmaq Ucun Hesab&#305;n&#305;zda ($q_bal) Olmal&#305;d&#305;r...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $q_bal WHERE `id` = '".$id."';");
}
}else
if($_POST['yazi']==2){
if($row['bal'] < $xt_bal){
echo "Xettli Yazmaq Ucun Hesab&#305;n&#305;zda ($xt_bal) Olmal&#305;d&#305;r...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $xt_bal WHERE `id` = '".$id."';");
}
}else
if($_POST['yazi']==3){
if($row['bal'] < $e_bal){
echo "Eyri Yazmaq Ucun Hesab&#305;n&#305;zda ($e_bal) Olmal&#305;d&#305;r...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $e_bal WHERE `id` = '".$id."';");
}
}
else
if(($_POST['yazi'] > 3)or($_POST['yazi'] < 0)){
echo "Tebrikler Siz Bu ilin Hackeri Se&#231;ildiniz...!!!<br/>";
break;
}

$yoxla = mysql_fetch_array(mysql_query("SELECT * FROM `group_room` WHERE `group_id` = '".$number."' and `usid` = '".$id."' and `text` = '".$_POST['message']."';"));
if($yoxla!=""){
echo "<b>Xeta...!!!</b> Flood Olmaz...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
if($_POST['kime_n']!=""){
$kim = $_POST['kime_n'];
}else{
$kim = "";
}

$fikir = smile($_POST['message']);

mysql_query ("UPDATE `users` SET `posts` = posts + 1 where `id` = '".$id."';");
if($_POST['yazi']==1)$mesaj = '<b>'.$fikir.'</b>';
else if($_POST['yazi']==2)$mesaj = '<u>'.$fikir.'</u>';
else if($_POST['yazi']==3)$mesaj = '<i>'.$fikir.'</i>';
else $mesaj = $fikir;
mysql_query ("INSERT INTO `group_room` SET `usid` = '".$id."', `name` = '".$row['user']."', `group_id` = '".$number."', `text` = '".$mesaj."', `kime_nik` = '".$kim."', `nov` = '".$_POST['nov']."', `time` = '".time()."'");
}
}
if(isset($_POST['del'])){
mysql_query ("delete from `group_room` where `id` = '".$del."';");
}

if($act=="sexsi"){
mysql_query("UPDATE `users` SET `group_write` = '1' where `id` = '".$id."';");
}else
if($act=="umumi"){
mysql_query("UPDATE `users` SET `group_write` = '0' where `id` = '".$id."';");
}

$r_vaxt = time() - 900;
$eh = mysql_query("SELECT DISTINCT `usid`,`name` FROM `group_room` WHERE `group_id` = '".$number."' and `time` > '".$r_vaxt."' ORDER BY `time` DESC;");
$c0d_cemi = mysql_num_rows($eh);
if ($s!=0)$seh = "&amp;s=$s";
if(empty($action)){
echo "Otaqda (<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=room_who&amp;number=$number&amp;ref=$ref\">".$c0d_cemi."</a>)<br/>----<br/>";
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\">Yaz</a> | <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;ref=$ref\">Yenile</a>";

$write = mysql_query("SELECT `group_write` FROM `users` WHERE `id` = '".$id."';");
$r = mysql_fetch_array($write);
$my_write = $r["group_write"];
if($my_write==0){
echo " | <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;act=sexsi&amp;ref=$ref\">Shexsi</a>";

}else{
echo " | <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;act=umumi&amp;ref=$ref\">Umumi</a>";
}
echo "<br/>";
}
if(($my_cp == 1)or($id==1)){
if($delet=="all"){
$oid = mysql_fetch_array(mysql_query("SELECT * FROM `group` where `admin` = '".$id."'"));
echo $divide;

if(($oid['id']!=$number)&&($id!=21)){
echo "<b>Xeta...!!!</b> Siz Yaln&#305;z Oz Qrupunuzda Olan Otaqlar&#305; Sile Bilersiz...!!!<br/>";
}else{
mysql_query("delete from `group_room` WHERE `group_id` = '".$number."'");
echo "Ugurla Temizlendi...!!!<br/>";
}

break;
}
}
if(empty($action)){
echo "----<br/>";
}
if($action=="yaz"){

echo "Mesaj<br/>";
echo $fsize2;
echo "<input name=\"message$ref\" title=\"message\" emptyok=\"true\"/><br/>\n";

if (isset($_POST["kime_nik"])){
$kime_n = $_POST["kime_nik"];
echo "<select name=\"nov$ref\">
<option value=\"0\">Umumi</option>
<option value=\"1\">Shexsi</option>
</select><br/>";
}


if($my_cp!=1){
$qbal = '('.$q_bal.' Bal)';
$xtbal = '('.$xt_bal.' Bal)';
$ebal = '('.$e_bal.' Bal)';
}
echo $fsize1;
echo "Yaz&#305; Tipi<br/>";
echo "<select name=\"yazi$ref\">";
echo "<option value=\"0\">Bos</option>";
echo "<option value=\"1\">Qal&#305;n $qbal</option>";
echo "<option value=\"2\">Xettli $xtbal</option>";
echo "<option value=\"3\">Eyri $ebal</option>";
echo "</select><br/>";


echo "<anchor title=\"go\">G&#246;nder<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;act=yaz&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>";
echo "<postfield name=\"yazi\" value=\"$(yazi$ref)\"/>";

if (isset($kime_n)) {
echo "<postfield name=\"nov\" value=\"$(nov$ref)\"/>";
echo "<postfield name=\"kime_n\" value=\"$kime_n\"/>";
}
echo "<postfield name=\"get\" value=\"yaz\"/>";
echo "</go></anchor><br/>";
if($_POST["nk"]!=''){
echo $divide;
echo " <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$_POST["nk"]."&amp;ref=$ref\">".$_POST["kime_nik"]."</a><br/>";
echo " <a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=plaint&amp;number=$number&amp;nk=".$_POST["nk"]."&amp;ref=$ref\">Shikayet Ele</a><br/>";
}
break;
}
else
{
if($my_write==1){
$d = mysql_query("SELECT COUNT(*) FROM `group_room` WHERE `group_id` = '".$number."' and `name` = '".$row['user']."' or `kime_nik` = '".$row['user']."';");
}else{
$d = mysql_query("SELECT COUNT(*) FROM `group_room` WHERE `group_id` = '".$number."';");
}
$inmenu = mysql_result($d, 0);
if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;

if($my_write==1){
$q = mysql_query("SELECT * FROM `group_room` WHERE `group_id` = '".$number."' and `name` = '".$row['user']."' or `kime_nik` = '".$row['user']."' ORDER BY `time` DESC LIMIT $s,$rm_max;");
}else{
$q = mysql_query("SELECT * FROM `group_room` WHERE `group_id` = '".$number."' ORDER BY `time` DESC LIMIT $s,$rm_max;");
}
if($view = mysql_num_rows($q)==0){
echo "Mesaj Yoxdur...!!!<br/>";
}
while($view = mysql_fetch_array($q))
{
$sms_id = $view['id'];
$nk = $view['usid'];
$nov = $view['nov'];
$user = $view['kime_nik'];
$name = $view['name'];
$message = $view['text'];
$tarix=date("H:i",$view['time']);
$ad = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));

if($nov!=0){
if(($row["user"]==$user)or($id==$nk)or($id==1)or($ad["admin"]==$id)){
echo "<b>(Gizli)</b> <anchor title=\"go\">".$name."<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix] -&#xbb; <b>$user</b> &#xbb;&#xbb; [$message]<br/>";
}
}else
if(($user!='')&&($nov==0)){
if(($my_cp!=0)or($id==1)){
echo "(<anchor title=\"go\">Sil<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>) ";
}
echo "<anchor title=\"go\">".$name."<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix] &#xbb; <b>$user</b> &#xbb;&#xbb; [$message]<br/>";
}else{
if(($my_cp!=0)or($id==1)){
echo "(<anchor title=\"go\">Sil<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>) ";
}
echo "<anchor title=\"go\">".$name."<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix] &#xbb;&#xbb; [$message]<br/>";
}
}

if ($inmenu > $rm_max) echo "----<br/>";
if ($inmenu > $s + $rm_max)  print "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;s=".($s + $rm_max)."&amp;bol=$bol&amp;number=$number&amp;ref=$ref\">Novbeti</a><br/>\n";
if ($s > 0)  print "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;s=".($s - $rm_max)."&amp;bol=$bol&amp;number=$number&amp;ref=$ref\">Evvelki</a><br/>\n";
}
break;


case 'plaint':
echo "<p align=\"left\">\n";
echo $fsize1;

if(!isset($_POST['plain'])){
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"));
echo "<b>".$us['user']."</b> Haqq&#305;nda Shikayet...!!!<br/>";
echo "<u>Qeyd:</u> Sebebsiz Shikayet Edenlerin Ozleri Cezaland&#305;r&#305;l&#305;r...!!!<br/>";
echo $fsize2;
echo "<input name=\"sebeb$ref\" title=\"sebeb\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;act=yaz&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"plain\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else

if($_POST['nk']==$id){
echo "Ozunuzu Shikayet Etmek Isteyirsiz???<br/>";
echo "Siz Ozunuzu Ele Ala Bilmirsiniz. Biz Ne Ede Bilerik Size? M&#252;mk&#252;nse Chat Yava&#351; - Yava&#351; Terk Edin...!!!<br/>";
break;
}
else
if(empty($_POST['sebeb'])){
echo "Shikayet Etmek Ucun M&#252;tleq Sebeb Yazmal&#305;s&#305;z...!!!<br/>";
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;
}else{
$sebeb = $_POST['sebeb'];
$nk = $_POST['nk'];
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"));
$sql = mysql_query("insert into `group_sikayet` set `act` = '1', `aid` = '".$id."', `aid_name` = '".$row['user']."', `usid` = '".$nk."', `usid_name` = '".$us['user']."', `group_id` = '".$number."', `text` = '".$sebeb."';");

if($sql){
echo "Sizin <b>".$us['user']."</b> Haqq&#305;nda Shikayetiniz Qeyde Al&#305;nd&#305;...!!!<br/>";
echo "Tezlikle Qrup Rehberi <b>".$us['user']."</b> Haqq&#305;nda Tedbir G&#246;recek...!!!<br/>";
}else{
echo "<b>Xeta Var...!!!</b><br/>";
}
}
break;

case 'room_who':
echo "<p align=\"left\">\n";
echo $fsize1;
$eh = mysql_query("SELECT DISTINCT `usid`,`name` FROM `group_room` WHERE `group_id` = '".$number."' and `time` > '".$time."' ORDER BY `time` DESC;");
$c0d_cemi = mysql_num_rows($eh);

if($c0d_cemi == 0) {
echo "Otaqda He&#231; Kim Yoxdur...!!!<br/>\n";
} else {
echo "Otaqda <b>(".$c0d_cemi.")</b><br/>".$divide;
while($EH = mysql_fetch_array($eh))
{
$us_n = $EH['name'];
$us_i = $EH['usid'];
$sex = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$us_i."';"));
$sex = $sex['sex'];
if($sex==0){
    $sex = "K";
}else
if($sex==1){
    $sex = "Q";
}

echo "<anchor title=\"go\">".$us_n."<go href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=chat&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$us_i\"/>";
echo "<postfield name=\"kime_nik\" value=\"$us_n\"/>";
echo "</go></anchor> ($sex)  ";

}
echo "<br/>";
}
echo $divide;
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
break;

}
echo $divide;
if(($bol=="plaint")or($bol=="admin")or($bol=="like"))echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">Qrupa Qay&#305;t</a><br/>\n";
if($bol=="chat"){
echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">Bizim Qrup</a><br/>\n";
echo "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;number=$number&amp;ref=$ref\">Smaylike Bax Yaz</a><br/>\n";
}
if($bol)echo "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Umumi Qruplasma</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize Qayit</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>