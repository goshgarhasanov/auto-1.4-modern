<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__));
$bal = $row["bal"];

$sil_b = 5;
$beyen_b = 5;

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"error\" title=\"Beyendiklerim\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
switch ($bol)
{
default:
echo "Leqeb / &#304;D:<br/>";
echo $fsize2;
echo "<input name=\"nick$ref\" title=\"nick\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Bu istifade&#231;ini beyenirem<go href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=add&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>";
echo "</go></anchor>($beyen_b bal)<br/>";
echo "<br/>";
echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=top&amp;ref=$ref\">TOP 10 Beyenilen</a><br/>";
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kim` = '".$id."';");
$my = mysql_result($q, 0);
echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=my_likes&amp;ref=$ref\">Beyendiklerim ($my)</a><br/>";
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kimi` = '".$id."';");
$who = mysql_result($q, 0);
echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$id&amp;ref=$ref\">Beyenenler ($who)</a><br/>";
break;
// Beyen
case 'add':
if ($bal >= $beyen_b) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
if (!ctype_digit($nick)) {
$result = mysql_query ("Select id,user from users where latuser = '".$latuser."'");
} else {
$result = mysql_query ("Select id,user from users where id = '".$latuser."'");
}
if (mysql_affected_rows() == 0) {
echo "<b>&#304;stifade&#231;i Tap&#305;lmad&#305;.</b><br/>\n";
break;
} else {
$oxu = mysql_fetch_array ($result);
if ($oxu["id"] == $id) {
echo "&#214;z-&#246;z&#252;n&#252;z&#252; beyene bilmersiniz.<br/>";
} else {
mysql_query ("Select * from beyen where kim = '".$id."' and kimi = '".$oxu["id"]."'");
if (mysql_affected_rows()==0){
$rnd = rand(0,99999999);
$metn = "Hormetli <b>".$oxu["user"]."</b>. <u>".$row["user"]."</u> nikli istifade&#231;i sizi beyendi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$oxu["id"]."',`towhom` = '".$oxu["user"]."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Beyendiklerim',`message` = '".$metn."';");
mysql_query ("INSERT INTO beyen SET kim = '".$id."', kimi = '".$oxu["id"]."', vaxt = '".time()."'");
mysql_query("UPDATE `users` SET `beyen` = `beyen` + 1 WHERE `id` = '".$oxu["id"]."';");
mysql_query("UPDATE `users` SET `bal` = `bal` - $beyen_b WHERE `id` = '".$id."';");
echo "<b>".$oxu["user"]."</b> nikli istifade&#231;i m&#252;veffeqiyyetle beyenildi.<br/>";
echo "Hesab&#305;n&#305;zdan <b>$beyen_b</b> bal silindi.<br/>";
} else {
echo "Siz yoxsada bu istifade&#231;ini beyenmisiniz.<br/>";
}}}} else {
echo "Hesab&#305;n&#305;zda minimum <b>$beyen_b</b> bal olmalidir.<br/>";
}
break;

// Top10
case 'top':
echo "<b>TOP 10 Beyenilen</b><br/>";
echo $divide;
$sira = 1;
$q = mysql_query("SELECT * FROM `users` WHERE `beyen` > '0' ORDER BY `beyen` DESC LIMIT 10;");
while($view = mysql_fetch_array($q))
{
$nk = $view["id"];
$us = $view["user"];
$beyen = $view["beyen"];

echo "<b>".$sira.".</b> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nk."&amp;ref=$ref\">".$us."</a> [<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=".$nk."&amp;ref=$ref\">".$beyen."</a>]<br/>";
$sira++;
}
break;
// Beyendiklerim
case 'my_likes':
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kim` = '".$id."';");
$inmenu = mysql_result($q, 0);

if ($inmenu!=0){
echo "Siz $inmenu istifade&#231;ini beyenmisiniz.<br/><br/>";
}

if ($inmenu==0)echo "He&#231; kimi beyenmemisiniz.<br/>";

if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;

$q = mysql_query("SELECT * FROM `beyen` WHERE `kim` = '".$id."' ORDER BY `vaxt` DESC LIMIT $s,10;");
while($view = mysql_fetch_array($q))
{
$number = $view["id"];
$kimi = $view["kimi"];

$select = mysql_query ("Select `user` from `users` where `id` = '".$kimi."' and `banned`!= '2';");
if (mysql_affected_rows() == 0){
$us = "not user";
} else {
$inf = mysql_fetch_array ($select);
$us = $inf["user"];
}

echo "[<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=del&amp;number=$number&amp;ref=$ref\">x</a>]";
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$kimi&amp;ref=$ref\">$us</a><br/>";
}
if ($inmenu > 5) echo "<br/>";
if ($inmenu > $s + 5)  print "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=my_likes&amp;s=".($s + 5)."&amp;ref=$ref\">N&#246;vbeti &#187;</a><br/>\n";
if ($s > 0)  print "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=my_likes&amp;s=".($s - 5)."&amp;ref=$ref\">&#171; Geri</a><br/>\n";
break;
// Beyenenler
case 'wholike':
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kimi` = '".$nk."';");
$inmenu = mysql_result($q, 0);

$select = mysql_query ("Select `user` from `users` where `id` = '".$nk."' and `banned`!= '2';");
$inf = mysql_fetch_array ($select);
$us = $inf["user"];

if ($inmenu!=0){
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$us</a> nickli istifade&#231;ini $inmenu nefer beyenib.<br/>";
echo "Beyenenler:<br/><br/>";
}

if ($inmenu==0)echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$us</a> nickli istifade&#231;ini he&#231; kim beyenmemeyib.<br/>";

if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;

$q = mysql_query("SELECT * FROM `beyen` WHERE `kimi` = '".$nk."' ORDER BY `vaxt` DESC LIMIT $s,10;");
while($view = mysql_fetch_array($q))
{
$number = $view["id"];
$kim = $view["kim"];

$select = mysql_query ("Select `user` from `users` where `id` = '".$kim."' and `banned`!= '2';");
if (mysql_affected_rows() == 0){
$us = "not user";
} else {
$inf = mysql_fetch_array ($select);
$us = $inf["user"];
}

if ($nk==$id)echo "[<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=del&amp;number=$number&amp;ref=$ref\">x</a>]";

echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$kim&amp;ref=$ref\">$us</a><br/>";
}
if ($inmenu > 5) echo "<br/>";
if ($inmenu > $s + 5)  print "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$nk&amp;s=".($s + 5)."&amp;ref=$ref\">N&#246;vbeti &#187;</a><br/>\n";
if ($s > 0)  print "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$nk&amp;s=".($s - 5)."&amp;ref=$ref\">&#171; Geri</a><br/>\n";
break;
// sil
case 'del';
if ($bal >= $sil_b) {
$q = mysql_query("SELECT * FROM `beyen` WHERE `id` = '".$number."';");
$view = mysql_fetch_array($q);
$kimi = $view["kimi"];

if ($kimi == $id) {
mysql_query("DELETE FROM beyen WHERE id = '".$number."'");
mysql_query("UPDATE `users` SET `beyen` = `beyen` - 1 WHERE `id` = '".$id."';");
} else {
mysql_query("DELETE FROM beyen WHERE id = '".$number."'");
mysql_query("UPDATE `users` SET `beyen` = `beyen` - 1 WHERE `id` = '".$kimi."';");
}

mysql_query("UPDATE `users` SET `bal` = `bal` - $sil_b WHERE `id` = '".$id."';");

echo "Silindi.<br/>Hesab&#305;n&#305;zdan <b>$sil_b</b> bal silindi.<br/>";

} else {
echo "Hesab&#305;n&#305;zda minimum <b>$sil_b</b> bal olmalidir.<br/>";
}
break;
}
echo $divide;
if($bol)echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Beyendiklerim</a><br/>\n";
if($rm!="")
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>
