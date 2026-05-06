<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("../ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$ttime = time()+$vaxt;
$bal = $row["bal"];

$my_group = $row["group"];
$my_act = $row["group_act"];
$my_cp = $row["group_cp"];
$my_look = $row["group_look"];

$create_b = 50;
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
$cinsi = " bey";
} else {
$cinsi = " xan&#305;m";
}


$avr = $row["avr"];
$rm_max = $row["max"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";

if (($bol == "chat")&&(empty($_GET["action"]))) {
echo "<card id=\"error\" title=\"Qrupla&#351;ma\" ontimer=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\"><timer value=\"$avr\"/>\n";
} else {
echo "<card id=\"error\" title=\"Qrupla&#351;ma\">\n";
}

switch ($bol){

default:
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b><u>Sosial Qrupla&#351;ma</u></b><br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;
echo "Salam <b>".$row["user"]."</b>".$cinsi."!<br/>";
if ($my = mysql_fetch_array(mysql_query("SELECT * FROM `group` where `admin` = '".$id."'"))){
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=".$my['id']."&amp;ref=$ref\">Sizin Qrup</a> | ";
} else if($my_group!="0"){
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$my_group&amp;ref=$ref\">Sizin Qrup</a> | ";
}else {
echo "<br/>";
}
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=create&amp;ref=$ref\">Qrup yarat</a><br/>";
echo "*****<br/>";

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
if(mysql_num_rows($q)==0)echo "Qrup yarad&#305;lmay&#305;b..<br/>";
while($view = mysql_fetch_array($q))
{

if($i==1){$yer = "<img src=\"img/".$i.".gif\"/>";
}elseif($i==2){
$yer = "<img src=\"img/".$i.".gif\"/>";
}elseif($i==3){
$yer = "<img src=\"img/".$i.".gif\"/>";
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

if($group_act==1){
$aktiv = "[<a href=\"index.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=aktiv&amp;start=$start&amp;ref=$ref\">on</a>]";
}else{
$aktiv = "[<a href=\"index.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=deaktiv&amp;start=$start&amp;ref=$ref\">off</a>]";
}

if($id==1)echo $aktiv."[<a href=\"index.php?id=$id&amp;ps=$ps&amp;number=$number&amp;act=del&amp;start=$start&amp;ref=$ref\">x</a>] ";
if($group_act==1){
echo "<b>(Ba&#287;l&#305;)</b>".$name."".$noqteler." (".$host."/".$hit.")<br/>";
}else{
echo "$i)";
if($znak > time())echo "<img src=\"icons/".$znaks.".gif\" alt=\"*\"/> ";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">".$name."".$noqteler."</a> (".$host."/".$hit.")<br/>";
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
echo navigation('index.php?id='.$id.'&amp;ps='.$ps.'&amp;bol='.$bol.'&amp;ref='.$ref.'&amp;', $start, $total, $kmess);
echo "<br/>";
}

echo "*****<br/>";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=rules&amp;ref=$ref\">Qaydalar</a><br/>";
break;

case 'xaric':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<u>Xaric olunan istifade&#231;iler.</u><br/>";
echo $divide;
$i = 1;
$q = mysql_query("SELECT * FROM `group_ban` where `group_id` = '".$number."' ORDER BY `time` DESC;");
if(mysql_num_rows($q)==0){
echo "He&#231;kes xaric olunmay&#305;b..<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
while($view = mysql_fetch_array($q))
{
$nk = $view["usid"];
$name = $view["name"];
$sebeb = $view["sebeb"];
$group_id = $view["group_id"];
$group_name = mysql_fetch_array(mysql_query("SELECT `name` FROM `group` where `id` = '".$group_id."';"));

echo $i.") <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$name</a><br/>";
if($sebeb!='')echo "<u>Sebeb</u>: $sebeb<br/>";
$i++;
}
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;

case 'create':
echo "<p align=\"left\">\n";
echo $fsize1;
if (empty($action)) {
echo "<b>Melumat</b><br/>";
echo "*****<br/>";
echo "1. Qrup Yaratmaq $create_b bal deyerindedir.<br/>";
echo "2. Qrupun rehberi &#231;atdak&#305; infosunda hans&#305; qrupun rehberi oldu&#287;u qeyd olunur.<br/>";
echo "3. Qrup &#252;zv&#252;n&#252;n infosunda hans&#305; qrupun &#252;zv&#252; oldu&#287;u g&#246;r&#252;n&#252;r.<br/>";
echo "4. Qrupa &#252;&#231;h&#252;n &#351;exsi s&#246;hbet ota&#287;&#305; var ve orda qrup &#252;zvleri ve rehber yaz&#305;&#351;a biler.<br/>";
echo "5. Qrupun rehberi kimi istese qrupdan xaric ede bilir ve tebiiki bir daha qay&#305;tmamaq &#351;erti ile.<br/>";
echo "*****<br/>";
if($my_group = mysql_num_rows(mysql_query("SELECT * FROM `group` where `admin` = '".$id."';"))!=0){
echo "Sizin art&#305;q 1 qrupunuz var Yeniden qrup acma&#287;&#305;n&#305;z m&#252;mk&#252;n deyil.<br/>";
}else{
if ($bal >= $create_b) {
echo "Qrupun ad&#305;:<br/>";
echo $fsize2;
echo "<input name=\"name$ref\" title=\"name\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Qrup haqq&#305;nda:<br/>";
echo $fsize2;
echo "<input name=\"info$ref\" title=\"info\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "[<anchor title=\"go\">Yarat<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=create&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"name\" value=\"$(name$ref)\"/>";
echo "<postfield name=\"info\" value=\"$(info$ref)\"/>";
echo "<postfield name=\"action\" value=\"create\"/>";
echo "</go></anchor>]<br/>";
} else {
echo "Hesab&#305;n&#305;zda minimum <b>$create_b</b> bal olmal&#305;d&#305;r.<br/>";
}
}
} else
if(empty($_POST["name"])or empty($_POST["info"]))
{
echo "<b>Xeta:</b> He&#231;ne Yazmad&#305;z.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";

break;
}else
if(mysql_num_rows(mysql_query("SELECT * FROM `group` where `name` = '".$_POST["name"]."' and `admin` = '".$id."';"))!=0){
echo "<b>Xeta:</b> Bele bir qrup art&#305;q m&#246;vcuddur. Zehmet olmasa ba&#351;qa ad se&#231;in.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}else{
$name = $_POST["name"];
$info = $_POST["info"];
$info = smile(narmobil($info));
mysql_query ("INSERT INTO `group` SET `name` = '".$name."', `info` = '".$info."', `admin` = '".$id."', `time` = '".time()."'");
mysql_query ("UPDATE `users` SET `group` = '".mysql_insert_id()."', `group_cp` = '1', `group_act` = '1' WHERE `id` = '".$id."';");
echo "Qeyd etdiyiniz qrup m&#252;veffeqiyyetle yarad&#305;ld&#305;.<br/>";
}
break;

case 'rules':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Qaydalar</b><br/>";
echo "*****<br/>";
echo "1. &#304;stifade&#231;i yaln&#305;n bir qrupa &#252;zv ola biler.<br/>";
echo "2. Qrupda s&#246;hbet ota&#287;&#305;nda nalayiq s&#246;zler ve diger saytar&#305; reklam etmek olmaz.<br/>";
echo "3. &#304;stifade&#231;i istediyin vaxt qrupdan &#231;&#305;x&#305;b ba&#351;qa bir qrupa &#252;zv ola biler.<br/>";
echo "*****<br/>";
echo "<b>Diqqet!</b>: <i>Qrup rehberinin s&#246;zleri ve ya hereketleri qrup &#252;zvleri aras&#305;nda m&#252;zakire oluna bilmez!</i><br/>";
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
echo "Qrup tap&#305;lmad&#305;.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
if(mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `act` = '1';"))!=0){
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Qrup m&#252;veqqeti olaraq ba&#287;l&#305;d&#305;r<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}

echo "<p align=\"center\">\n";
echo $fsize1;
if(($number==$my_group)&&($my_cp==1)or($id==1))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;bol=admin&amp;number=$number&amp;ref=$ref\">Sosial Admin Panel</a><br/>".$divide;
if(($number==$my_group)&&($my_cp==2))echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;bol=admin&amp;number=$number&amp;ref=$ref\">Sosial Vip Panel</a><br/>".$divide;

$view = mysql_fetch_array($q);
$name = strtr($view["name"], array ('>' => '&gt;', '<' => '&lt;', '&' => ' '));
$info = strtr($view["info"], array ('>' => '&gt;', '<' => '&lt;', '&' => ' '));
$admin = $view["admin"];
$qq = mysql_query("SELECT * FROM `group_like` WHERE `key` = '".$number."';");
$like = mysql_num_rows($qq);

$us_q = mysql_query("SELECT user FROM `users` WHERE `id` = '".$admin."';");
$us_view = mysql_fetch_array($us_q);
$admin_us = $us_view["user"];

echo "<b><u>".$name."</u></b><br/>";
echo "*****<br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;
echo "<i>Qrup Haqq&#305;nda:</i><br/>";
echo $info."<br/>";
echo "<u>Rehber</u>: <b><a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$admin&amp;ref=$ref\">".$admin_us."</a></b><br/>";
echo "*****<br/>";

$znak = $view["znak"];
$znak_tm = $view["znak_date"];

$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$number."' and `group_act` = '1';");
$inmenu = mysql_result($q, 0);
if($znak_tm > time())echo "&#8226; <u>Znak</u>: <img src=\"icons/".$znak.".gif\" alt=\"*\"/><br/>";
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))==0){
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=users&amp;number=$number&amp;ref=$ref\">&#220;zvler-$inmenu</a><br/>";
if ($number!=$my_group)echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=connect&amp;number=$number&amp;ref=$ref\">Qrupa &#252;zv ol</a><br/>";
if (($number==$my_group)or($id==1))echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=chat&amp;number=$number&amp;ref=$ref\">S&#246;hbet ota&#287;&#305;</a><br/>";
}else{
echo "Siz bu qrupdan xaric edilmisiz<br/>";
$sebeb = mysql_fetch_array(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"));
echo "Sebeb: <i>".$sebeb['sebeb']."</i><br/>";
}

$num = mysql_result(mysql_query("SELECT count(*) FROM `users` WHERE `group` = '".$number."' and `group_cp` != '0';"), 0);
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=moders&amp;number=$number&amp;ref=$ref\">Adminler-$num</a><br/>";
echo "*****<br/>";
echo "<img src=\"img/b.PNG\"/> <anchor title=\"go\">Beyendim<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=like&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"like\" value=\"yes\"/>";
echo "</go></anchor>";
if($like!="0")echo " - <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=showlike&amp;number=$number&amp;ref=$ref\">+$like</a><br/>";
if($like==0)echo "<br/>";

$gr_ban = mysql_result(mysql_query("SELECT COUNT(*) FROM `group_ban` WHERE `group_id` = '".$number."';"), 0);
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=xaric&amp;number=$number&amp;ref=$ref\">Xaric Olunanlar-".$gr_ban."</a><br/>";

break;

case 'moders':
echo "<p align=\"left\">\n";
echo $fsize1;
$group_name = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$name = strtr($group_name['name'], array ('>' => '&gt;','<' => '&lt;','&' => ' '));

echo "<b>".$name." qrupunun vezifelileri</b>.<br/>";
echo "*****<br/>";

$moder = mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `group_cp` != '0' order by group_cp asc;");
while($v = mysql_fetch_array($moder))
{
$cp = $v['group_cp'];
$soft = strtok($v['user_soft'],'/');

if($v['time'] > time()){
if($soft =="Opera"){
$img = "<img src=\"img/komp.gif\"/>";
}else{
$img = "<img src=\"img/tel.gif\"/>";
}
}else{
$img = "<img src=\"img/ofl.gif\"/>";
}
if($cp==1){
$status = "Rehber";
}else
if($cp==3){
$status = "Vip";
}else
if($cp==2){
$status = "Moder";
}
echo "$img <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=".$v['id']."&amp;ref=$ref\">".$v['user']."</a> ($status)<br/>";
}
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";

break;

case 'showlike':
echo "<p align=\"left\">\n";
echo $fsize1;

$q = mysql_query("SELECT * FROM `group_like` WHERE `key` = '".$number."';");
$onu = mysql_num_rows($q);

if($onu==0) {
echo "Bu qrupu beyenen olmayib..<br/>\n";
}else{
$group_name = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$name = strtr($group_name['name'], array ('>' => '&gt;','<' => '&lt;','&' => ' '));

echo "<b>".$name."</b>-qrupunu beyenenler- <b>$onu</b><br/>";
echo "*****<br/>";

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
echo "$iz) <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$usid$takep\">$nick</a><br/>";
++$iz;
}

$url_for_pstr = "index.php?id=$id&amp;ps=$ps&amp;bol=showlike&amp;number=$number&amp;page=";
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
$vpered = ( "<a href=\"".$url_for_pstr.( $page + 1 ) )."&amp;ref={$ref}\">Sonrak&#305;</a>";
}
if ( 1 < $total )
{
echo "----<br/>\n";
Error_Reporting( E_ALL & ~E_NOTICE );
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<b>".$page."</b>".$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage."<br/>".$nazad." ".$vpered;
echo "<br/>";
}

}
break;


case 'like':
echo "<p align=\"left\">\n";
echo $fsize1;
$bal=$row["bal"];
if($bal<0){
echo "Bu qrupu beyenmek &#252;&#231;&#252;n hesab&#305;n&#305;zda en az&#305; ".$beyen_bal." olmal&#305;d&#305;r.<br/>";
}else{
mysql_query ("SELECT * FROM `group_like` WHERE `usid`='".$id."' and `key`='".$number."'");
if (mysql_affected_rows()!=0){
echo "Bu qrupu beyenmisiniz<br/>\n";
}else{
mysql_query("INSERT INTO `group_like` SET `usid` = '".$id."',`user` = '".$row['user']."',`key` = '".$number."';");
mysql_query ("update group set beyen = beyen+1 where id = '".$number."';");
echo "Qrupumuzu beyendiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler..<br/>";
echo "Hesab&#305;n&#305;zdan ".$beyen_bal." &#231;&#305;x&#305;ld&#305;.<br/>";
}
}


break;

case 'connect':
echo "<p align=\"left\">\n";
echo $fsize1;

if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))!=0){
echo "<b>Xeta:</b> Siz daha &#246;nce bu qrupdan xaric edilibsiz. Yeniden &#252;zv olma&#287;&#305;n&#305;z m&#252;mk&#252;n deyil.<br/>";
break;
}
mysql_query ("Select * from `group` where `admin` = '".$id."'");
if(mysql_affected_rows()==0){
if(empty($action)) {
echo "<b>Qrupa &#252;zv ol</b><br/>";
echo "*****<br/>";
echo "Bu qrupa &#252;zv olmaq isteyirsiniz?<br/>";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yox</a> / <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=connect&amp;number=$number&amp;action=ok&amp;ref=$ref\">He</a><br/>";
echo "*****<br/>";
echo "<b>Diqqet!</b>: <i>eyer bu qrupa &#252;zv olsan&#305;z diyer qrupdan &#231;&#305;xm&#305;&#351; olacaqs&#305;n&#305;z</i>.<br/>";
} else if($action=="ok") {
echo "<u>U&#287;urlar!.</u><br/>";
echo $divide;
echo "Siz art&#305;q qeyd olunan qrupun &#252;zv&#252; oldunuz.<br/>";
echo "Qrup admini sizi tesdiqledikden sora sizde qrup &#252;zv&#252; olacaqs&#305;n&#305;z.<br/>";

if($row['group']!=0){
$group_ad = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$row['group']."';"));
$nk = $group_ad['admin'];

$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
$onuser = mysql_fetch_array($qb);
$nickname = $onuser['user'];

$rnd = rand(0,99999999);
$metn = "Hormetli <b>$nickname</b>. <u>".$row["user"]."</u>, Sizin qrupdan &#231;&#305;xd&#305;.";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rnd."',`idtowhom` = '".$nk."',`towhom` = '".$nickname."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$metn."';");
}

$group_add = mysql_fetch_array(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';"));
$user = $group_add['admin'];

$qrup = mysql_query("SELECT * FROM `users` WHERE `id` = '".$user."';");
$us = mysql_fetch_array($qrup);
$nick = $us['user'];

$rn = rand(0,99999999);
$sms = "Hormetli <b>$nick</b>. <u>".$row["user"]."</u>, Sizin qrupa &#252;zv olmaq isteyir zehmet olmasa Sosial <b>Admin Panele</b> daxil olub bu istifade&#231;ini tesdiq ederdiz.";
mysql_query("INSERT INTO `zapiski` SET `klu4` = '".$rn."',`idtowhom` = '".$user."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Sosial Qruplasma',`message` = '".$sms."';");

mysql_query ("Update `users` set `group` = '".$number."', `group_act` = '0', `group_cp` = '0' where `id` = '".$id."'");
}
} else {
echo "Sizin &#351;exsi qrupunuz var ona g&#246;re he&#231; bir qrupa &#252;zv ola bilmezsiniz.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
}
break;

case 'users':
echo "<p align=\"left\">\n";
echo $fsize1;
$q = mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."';");
$view = mysql_fetch_array($q);
$name = $view["name"];
$admin = $view["admin"];
echo "<b><u>".$name."</u> qrupunun &#252;zvleri:</b><br/>";
echo "*****<br/>";

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
echo "[<a href=\"index.php?id=$id&amp;bol=$bol&amp;number=$number&amp;ps=$ps&amp;xaric=$nk&amp;ref=$ref\">x</a>] ";
}
echo "<a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$us</a><br/>";
}

if ($inmenu > 10) echo "*****<br/>";
if ($inmenu > $s + 10)  print "<a href=\"index.php?id=$id&amp;ps=$ps&amp;s=".($s + 10)."&amp;bol=users&amp;number=$number&amp;ref=$ref\">N&#246;vbeti &#187;</a><br/>\n";
if ($s > 0)  print "<a href=\"index.php?id=$id&amp;ps=$ps&amp;s=".($s - 10)."&amp;bol=users&amp;number=$number&amp;ref=$ref\">&#171; Evvelki</a><br/>\n";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;

case 'chat':
echo "<p align=\"left\">\n";
echo $fsize1;
if(mysql_num_rows(mysql_query("SELECT * FROM `group` WHERE `id` = '".$number."' and `act` = '1';"))!=0){
echo "Qrup m&#252;veqqeti olaraq ba&#287;l&#305;d&#305;r<br/>";
break;
}

if($id!=1){
if(mysql_num_rows(mysql_query("SELECT * FROM `group_ban` WHERE `usid` = '".$id."' and `group_id` = '".$number."';"))!=0){
echo "<b>Xeta:</b> Siz daha &#246;nce bu qrupdan xaric edilibsiz. Yeniden &#252;zv olma&#287;&#305;n&#305;z m&#252;mk&#252;n deyil.<br/>";
break;
}
$test = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `group` = '".$number."' and `id` = '".$id."';"));
if($test['group_act']==0){
echo "Yaln&#305;z qrup rehberi sizi tesdiqledikden sonra ota&#287;a daxil ola bilersiz..<br/>";
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
echo "Xeta: Mesaj yaz&#305;lmay&#305;b..<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}

if($_POST['yazi']==1){
if($row['bal'] < $q_bal){
echo "Qal&#305;n yazmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda $q_bal olmal&#305;d&#305;r.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $q_bal WHERE `id` = '".$id."';");
}
}else
if($_POST['yazi']==2){
if($row['bal'] < $xt_bal){
echo "Xettli yazmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda $xt_bal olmal&#305;d&#305;r.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $xt_bal WHERE `id` = '".$id."';");
}
}else
if($_POST['yazi']==3){
if($row['bal'] < $e_bal){
echo "Eyri yazmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda $e_bal olmal&#305;d&#305;r.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
else
{
mysql_query ("update `users` set `bal` = bal - $e_bal WHERE `id` = '".$id."';");
}
}
else
if(($_POST['yazi'] > 3)or($_POST['yazi'] < 0)){
echo "Tebrikler iz bu ilin Hackeri se&#231;ildiniz.<br/>";
break;
}

$yoxla = mysql_fetch_array(mysql_query("SELECT * FROM `group_room` WHERE `group_id` = '".$number."' and `usid` = '".$id."' and `text` = '".$_POST['message']."';"));
if($yoxla!=""){
echo "Xeta: Flood olmaz..<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
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
echo "Ota&#287;da (<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=room_who&amp;number=$number&amp;ref=$ref\">".$c0d_cemi."</a>)<br/>";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\">Yaz</a> | <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;ref=$ref\">Yenile</a>";

$write = mysql_query("SELECT `group_write` FROM `users` WHERE `id` = '".$id."';");
$r = mysql_fetch_array($write);
$my_write = $r["group_write"];
if($my_write==0){
echo " | <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;act=sexsi&amp;ref=$ref\">&#350;exsi</a>";

}else{
echo " | <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number$seh&amp;act=umumi&amp;ref=$ref\">&#220;mumi</a>";
}
echo "<br/>";
}
if(($my_cp == 1)or($id==1)){
if($delet=="all"){
$oid = mysql_fetch_array(mysql_query("SELECT * FROM `group` where `admin` = '".$id."'"));
echo $divide;

if(($oid['id']!=$number)&&($id!=21)){
echo "<b>Xeta:</b> Siz yaln&#305;z &#246;z qrupunuzda olan otaqlar&#305; sile bilersiz.<br/>";
}else{
mysql_query("delete from `group_room` WHERE `group_id` = '".$number."'");
echo "U&#287;urla Temizlendi.<br/>";
}

break;
}
}
if(empty($action)){
echo "*****<br/>";
}
if($action=="yaz"){

echo "Mesaj:<br/>";
echo $fsize2;
echo "<input name=\"message$ref\" title=\"message\" emptyok=\"true\"/><br/>\n";

if (isset($_POST["kime_nik"])){
$kime_n = $_POST["kime_nik"];
echo "<select name=\"nov$ref\">
<option value=\"0\">&#220;mumi</option>
<option value=\"1\">&#350;exsi</option>
</select><br/>";
}


if($my_cp!=1){
$qbal = '('.$q_bal.' bal)';
$xtbal = '('.$xt_bal.' bal)';
$ebal = '('.$e_bal.' bal)';
}
echo $fsize1;
echo "Yaz&#305; tipi:<br/>";
echo "<select name=\"yazi$ref\">";
echo "<option value=\"0\">----</option>";
echo "<option value=\"1\">Qal&#305;n $qbal</option>";
echo "<option value=\"2\">Xettli $xtbal</option>";
echo "<option value=\"3\">Eyri $ebal</option>";
echo "</select><br/>";


echo "<anchor title=\"go\">G&#246;nder<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;act=yaz&amp;number=$number&amp;ref=$ref\" method=\"post\">";
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
echo "&#187; <a href=\"../info.php?id=$id&amp;ps=$ps&amp;nk=".$_POST["nk"]."&amp;ref=$ref\">".$_POST["kime_nik"]."</a><br/>";
echo "&#187; <a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=plaint&amp;number=$number&amp;nk=".$_POST["nk"]."&amp;ref=$ref\">&#350;ikayet et</a><br/>";
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
echo "Mesaj yoxdur.<br/>";
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
echo "<b>[G!]</b><anchor title=\"go\">".$name."<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix]&gt; <b>$user</b>, $message<br/>";
}
}else
if(($user!='')&&($nov==0)){
if(($my_cp!=0)or($id==1)){
echo "[<anchor title=\"go\">x<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>] ";
}
echo "<anchor title=\"go\">".$name."<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix]&gt; <b>$user</b>, $message<br/>";
}else{
if(($my_cp!=0)or($id==1)){
echo "[<anchor title=\"go\">x<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>] ";
}
echo "<anchor title=\"go\">".$name."<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor> [$tarix]&gt; $message<br/>";
}
}

if ($inmenu > $rm_max) echo "*****<br/>";
if ($inmenu > $s + $rm_max)  print "<a href=\"index.php?id=$id&amp;ps=$ps&amp;s=".($s + $rm_max)."&amp;bol=$bol&amp;number=$number&amp;ref=$ref\">N&#246;vbeti &#187;</a><br/>\n";
if ($s > 0)  print "<a href=\"index.php?id=$id&amp;ps=$ps&amp;s=".($s - $rm_max)."&amp;bol=$bol&amp;number=$number&amp;ref=$ref\">&#171; Evvelki</a><br/>\n";
}
break;


case 'plaint':
echo "<p align=\"left\">\n";
echo $fsize1;

if(!isset($_POST['plain'])){
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"));
echo "<u>".$us['user']."</u>, haqq&#305;nda &#350;ikayet.<br/>";
echo "<b>Qeyd</b>: Sebebsiz &#351;ikayet edenlerin &#246;zleri cezaland&#305;r&#305;l&#305;r!<br/>";
echo $fsize2;
echo "<input name=\"sebeb$ref\" title=\"sebeb\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;act=yaz&amp;number=$number&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"plain\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else

if($_POST['nk']==$id){
echo "&#214;z&#252;n&#252;z haqq&#305;nda &#351;ikayet etmek isteyirsiz?))<br/>";
echo "Siz &#246;z&#252;n&#252;z&#252; ele ala bilmirsiniz, biz ne ede bilerik size? M&#252;mk&#252;nse &#199;at&#305; yava&#351; yava&#351; terk edin :)<br/>";
break;
}
else
if(empty($_POST['sebeb'])){
echo "&#350;ikayet etmek &#252;&#231;&#252;n m&#252;tleq sebeb yazmal&#305;s&#305;z.<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}else{
$sebeb = $_POST['sebeb'];
$nk = $_POST['nk'];
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"));
$sql = mysql_query("insert into `group_sikayet` set `act` = '1', `aid` = '".$id."', `aid_name` = '".$row['user']."', `usid` = '".$nk."', `usid_name` = '".$us['user']."', `group_id` = '".$number."', `text` = '".$sebeb."';");

if($sql){
echo "Sizin <b>".$us['user']."</b> haqq&#305;nda &#351;ikayetiniz qeyde al&#305;nd&#305; ..<br/>";
echo "Tezlikle qrup rehberi <b>".$us['user']."</b> haqq&#305;nda tedbir g&#246;recek.<br/>";
}else{
echo "Xeta var!..<br/>";
}
}
break;

case 'room_who':
echo "<p align=\"left\">\n";
echo $fsize1;
$eh = mysql_query("SELECT DISTINCT `usid`,`name` FROM `group_room` WHERE `group_id` = '".$number."' and `time` > '".$time."' ORDER BY `time` DESC;");
$c0d_cemi = mysql_num_rows($eh);

if($c0d_cemi == 0) {
echo "Ota&#287;da he&#231; kim yoxdur<br/>\n";
} else {
echo "<b>Ota&#287;da (".$c0d_cemi.")</b><br/>".$divide;
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

echo "<anchor title=\"go\">".$us_n."<go href=\"index.php?id=$id&amp;ps=$ps&amp;bol=chat&amp;number=$number&amp;action=yaz&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$us_i\"/>";
echo "<postfield name=\"kime_nik\" value=\"$us_n\"/>";
echo "</go></anchor>($sex), ";

}
echo "<br/>";
}
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;

}
echo $divide;
if(($bol=="plaint")or($bol=="admin")or($bol=="like"))echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">Qrupa Qay&#305;t</a><br/>\n";
if($bol=="chat"){
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;bol=group&amp;number=$number&amp;ref=$ref\">Bizim Qrup</a><br/>\n";
echo "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;number=$number&amp;ref=$ref\">Smayla Bax Yaz!</a><br/>\n";
}
if($bol)echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#220;mumi Qrupla&#351;ma</a><br/>\n";
echo "<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>