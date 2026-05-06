<?php
error_reporting(0);
header("Content-type:text/vnd.wap.wml");
header("Cache-Control: no-store, no-cache, must-revalidate");

include("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$level = $row['level'];
$nickname = $row['user'];

if($level < 7)
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"Sehv\" ontimer=\"index.php?id=$id&amp;ps=$ps&amp;$ref\"><timer value=\"20\"/><p align=\"center\"><small>\n";
echo "<b>Sizin icazeniz yoxdur.</b><br/>\n";
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;$ref\">Geri qay&#305;t</a><br/>\n";
echo "</small></p></card></wml>";
exit();
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"Admin Panel\"><p align=\"left\"><small>\n";

switch($mod)
{
case 'edit':
echo $fsize1;
echo "<b>&#304;stifade&#231;i ad&#305;:</b><br/>\n";
echo $fsize2;
echo "<input name=\"nick$ref\" title=\"nick\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo " - - - ";
echo "<anchor title=\"go\">M<go href=\"panel.php?go=view&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "</go></anchor>\n";
echo " - ";
echo "<anchor title=\"go\">A<go href=\"panel.php?go=anketa&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "</go></anchor>\n";
echo " - ";
echo "<anchor title=\"go\">T<go href=\"panel.php?go=info&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "</go></anchor>\n";
echo " - - - ";

echo $fsize2;
echo "<br/>\n";
echo $fsize1;
echo $divide;
echo "<b>Xaric et</b><br/>\n";
echo "Vaxt: (deqiqe)<br/>\n";
echo $fsize2;
echo "<input name=\"wtime$ref\" maxlength=\"7\" title=\"vaxt\" format=\"*N\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "Sebeb:<br/>\n";
echo $fsize2;
echo "<input name=\"whykik$ref\" maxlength=\"200\" title=\"whykik\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor>Xaric Et!<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"$(wtime$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
echo $fsize1;
echo $divide;
echo $fsize2;
echo $fsize1;
echo "<anchor>Ban &#304;stifade&#231;i ad&#305;<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"leqeb\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
echo $fsize1;
echo "<anchor>Ban Telefon+IP<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"browser\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";

break;


case 'all_eti':

echo "Ishareler: <br/>";
echo "<b>X</b>: Sil, <b>D</b>: Deyish<br/>- - -<br/>";

if ($_GET['access'] == "del") {
$query = mysql_query("DELETE FROM `etiraf_text` WHERE `id` = '".intval($_GET['eid'])."' LIMIT 1;");
if($query)
{
echo "<b>Silindi</b>.<br/>- - -<br/>\n";
}
else
{
echo "Sehv ba&#351; verdi!!!<br/>\n";
echo mysql_error()."<br/>\n";
}
}


$query = @mysql_query("SELECT COUNT(*) FROM `etiraf_text` WHERE `icaze` = '0';");
$all = @mysql_result($query, 0);

if ($all == 0) {
echo "Heз bir etiraf yoxdur.<br/>";
}

if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $all) $s = 0;
$c = $s + 1;

$query = @mysql_query("SELECT * FROM `etiraf_text` WHERE `icaze` = '0' ORDER BY `id` DESC LIMIT $s, 5;");

while($inf = mysql_fetch_array($query))
{
$eid = $inf['id'];
$idwho = $inf['idwho'];
$topic = $inf['topic'];
$message = $inf['message'];
$count_read = $inf['count_read'];
$date = $inf['date'];
$icaze = $inf['icaze'];

$qus = mysql_query ("Select user from users where id = '".$idwho."'");
if (mysql_affected_rows() == 0) {
$nick = "Anonim";
}else{
$ind = mysql_fetch_array ($qus);
$nick = $ind["user"];
}
echo "$c. $nick ($date): [<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;mod=all_eti&amp;eid=$eid&amp;access=del&amp;$ref\">X</a>][<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;mod=edit_eti&amp;eid=$eid&amp;$ref\">D</a>]<br/>";
echo "Bashliq: <b>$topic</b><br/>\n";
echo "Etiraf: $message<br/>- - -<br/>\n";
$c++;
}


if ($s > 0) {
print "<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;$ref&amp;mod=all_eti&amp;s=".($s-5)."\">&lt;&lt;&lt;</a><br/>";
}
if ($all > $s + 5) {
print "<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;$ref&amp;mod=all_eti&amp;s=".($s+5)."\">&gt;&gt;&gt;</a><br/>";
}
echo "<br/>";
break;
case 'new_eti':
echo "Ishareler: <br/>";
echo "<b>X</b>: Sil, <b>D</b>: Deyish, <b>T</b>: Tesdiqle<br/>- - -<br/>";
if ($_GET['access'] == "del") {
$query = mysql_query("DELETE FROM `etiraf_text` WHERE `id` = '".intval($_GET['eid'])."' LIMIT 1;");
if($query)
{
echo "<b>Silindi</b>.<br/>- - -<br/>\n";
}
else
{
echo "Sehv ba&#351; verdi!!!<br/>\n";
echo mysql_error()."<br/>\n";
}
}

if ($_GET['access'] == "yes") {
$query = mysql_query("UPDATE `etiraf_text` SET `icaze` = '0' WHERE `id` = '".intval($_GET['eid'])."';");
if($query)
{
echo "<b>Tesdiqlendi</b>.<br/>- - -<br/>\n";
}
else
{
echo "Sehv ba&#351; verdi!!!<br/>\n";
echo mysql_error()."<br/>\n";
}
}


$query = @mysql_query("SELECT COUNT(*) FROM `etiraf_text` WHERE `icaze` = '1';");
$all = @mysql_result($query, 0);

if ($all == 0) {
echo "Hec bir yeni etiraf yoxdur.<br/>";
}

if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $all) $s = 0;
//$c = $s + 1;

$query = @mysql_query("SELECT * FROM `etiraf_text` WHERE `icaze` = '1' ORDER BY `id` DESC LIMIT $s, 5;");

while($inf = mysql_fetch_array($query))
{
$eid = $inf['id'];
$idwho = $inf['idwho'];
$topic = $inf['topic'];
$message = $inf['message'];
$count_read = $inf['count_read'];
$date = $inf['date'];
$icaze = $inf['icaze'];

$qus = mysql_query ("Select user from users where id = '".$idwho."'");
if (mysql_affected_rows() == 0) {
$nick = "Anonim";
}else{
$ind = mysql_fetch_array ($qus);
$nick = $ind["user"];
}
echo "<b>#$eid</b>. $nick ($date): [<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;mod=new_eti&amp;eid=$eid&amp;access=del&amp;$ref\">X</a>][<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;mod=edit_eti&amp;eid=$eid&amp;$ref\">D</a>][<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;mod=new_eti&amp;access=yes&amp;eid=$eid&amp;$ref\">T</a>]<br/>";
echo "Bashliq: <b>$topic</b><br/>\n";
echo "Etiraf: $message<br/>- - -<br/>\n";
//$c++;
}


if ($s > 0) {
print "<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;$ref&amp;mod=new_eti&amp;s=".($s-5)."\">&lt;&lt;&lt;</a><br/>";
}
if ($all > $s + 5) {
print "<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=".$ps."&amp;$ref&amp;mod=new_eti&amp;s=".($s+5)."\">&gt;&gt;&gt;</a><br/>";
}
echo "<br/>";
break;





case 'edit_eti':
if(!isset($_POST['action']))
{

$eid = intval($_GET['eid']);
$q = mysql_query("SELECT * FROM `etiraf_text` WHERE `id` = '".$eid."' LIMIT 1;");
$cemi = mysql_num_rows($q);

if($cemi == 0) {
echo "<b>Etiaf tapilmadi.</b><br/>";
} else {
$inf = mysql_fetch_array($q);
$eid = $inf['id'];
$idwho = $inf['idwho'];
$topic = $inf['topic'];
$message = $inf['message'];
$date = $inf['date'];
$icaze = $inf['icaze'];

echo "<b>Bashliq</b>:</small><br/>\n";
echo "<input type=\"text\" name=\"bashliq$ref\" title=\"Bashliq:\" value=\"$topic\" maxlength=\"30\"/><br/>\n";
echo "<small><b>Etiraf</b>:</small><br/>\n";
echo "<input type=\"text\" name=\"etiraf$ref\" title=\"Etiraf:\" value=\"$message\" maxlength=\"5000\"/><br/>\n";
echo "<small><anchor>[Deyish]<go href=\"".$_SERVER['PHP_SELF']."?mod=edit_eti&amp;eid=$eid&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"bashliq\" value=\"$(bashliq$ref)\"/>\n";
echo "<postfield name=\"etiraf\" value=\"$(etiraf$ref)\"/>\n";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor><br/>\n";
}
}
else
{
$eid = intval($_GET['eid']);

$bashliq = trim(htmlspecialchars(mysql_escape_string($_POST['bashliq'])));
$etiraf = trim(htmlspecialchars(mysql_escape_string($_POST['etiraf'])));
require("../file/require/sh_files");
$bashliq = narmobil($bashliq);
$etiraf = narmobil($etiraf);

if(empty($bashliq))
{
echo "<b>Ba&#351;l&#305;q hisseni qeyd edin.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?mod=edit_eti&amp;eid=$eid&amp;&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri qayit</a><br/>\n";
break;
}

if(empty($etiraf))
{
echo "<b>Etirafinizi qeyd edin.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?mod=edit_eti&amp;eid=$eid&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri qayit</a><br/>\n";
break;
}

/*
if(strlen($etiraf) <= 10) {
echo "<b>Etirafiniz cox qisa ola bilmez.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?mod=edit_eti&amp;eid=$eid&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri qayit</a><br/>\n";
break;
}
*/

$sql2 = mysql_query("SELECT * FROM `etiraf_text` WHERE `topic` = '".$bashliq."' AND `message` = '".$etiraf."';");
if(mysql_affected_rows() != 0)
{
echo "<b>Eyni terkibde olan etirafi yaza bilmezsiniz.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?mod=edit_eti&amp;eid=$eid&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri qayit</a><br/>\n";
break;
}

$query = mysql_query("UPDATE `etiraf_text` SET `message` = '".$etiraf."', `topic` = '".$bashliq."' WHERE `id` = '".$eid."';");

if ($query) {
echo "Etiraf ugurla deyishdirildi.<br/>\n";
} else {
echo "Sehv bash verdi!<br/>\n";
}
}
break;



default:
$q1 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_text` WHERE `icaze` = '1';");
$new_eti = mysql_result($q1, 0);

$q2 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_text` WHERE `icaze` = '0';");
$all_eti = mysql_result($q2, 0);

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;mod=new_eti&amp;$ref\">Yeni Etiraflar ($new_eti)</a><br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;mod=all_eti&amp;$ref\">Butun Etiraflar ($all_eti)</a><br/>\n";
break;
}

if(!empty($mod)) echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;$ref\">Admin Panel</a><br/>\n";
echo "---<br/><a href=\"index.php?id=$id&amp;ps=$ps&amp;$ref\">Etiraflara qayit</a><br/>\n";
echo "</small>";
echo "</p></card></wml>";
?>
