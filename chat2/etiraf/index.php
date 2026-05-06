<?php
error_reporting(0);
header("Content-type:text/vnd.wap.wml");
header("Cache-Control: no-store, no-cache, must-revalidate");

include("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$mytime=$row["time"];
$myvaxt=$row["vaxt"];

if($row["con"]!="0"){
header ("Location: ../session.php?id=$id&ps=$ps&rm=$rm&$ref");
exit;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\">\n<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"index\" title=\"Hekayeler\">";
echo "<p align=\"left\"><small>\n";

$level = $row['level'];

echo "<u>&#220;mumi Hekayeler</u><br/>----<br/>";
if ($level > 7) {
$q1 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_text` WHERE `icaze` = '1';");
$new_eti = mysql_result($q1, 0);

$q2 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_text` WHERE `icaze` = '0';");
$all_eti = mysql_result($q2, 0);

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;mod=new_eti&amp;$ref\">Yeni Hekayeler ($new_eti)</a><br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;mod=all_eti&amp;$ref\">B&#252;t&#252;n Hekayeler ($all_eti)</a><br/>----<br/>\n";
}

switch ($go) {
default:

$q = mysql_query("SELECT * FROM `etiraf_text` WHERE `icaze` = '0';");
$all = mysql_num_rows($q);

if(isset($_GET['p'])) $p = intval($_GET['p']);
else $p = 0;
if($p < 1) $p = 0;
if($p > $all) $p = 0;

$limit = 10;
$ilk = ($p * $limit);
$c = $ilk + 1;


$q = mysql_query("SELECT * FROM `etiraf_text` WHERE `icaze` = '0' ORDER BY `id` DESC LIMIT $ilk, $limit;");

if($all == 0) {
echo "<b>Hekaye yazan olmay&#305;b</b>.<br/>";
} else {
while ($inf = mysql_fetch_array($q)) {

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

$q1 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_sherh` WHERE `ideti` = '".$eid."';");
$cemi_sherh = mysql_result($q1, 0);

echo "<b>M&#252;ellif </b>: \"<u>$nick</u>\" | Oxunub: ".$count_read."<br/>";
echo "<a href=\"oxu.php?go=goster&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">$topic ($cemi_sherh)</a><br/>";
}
}

echo "----<br/>\n";
if ($p > 0)  {
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;$ref&amp;p=".($p - 1)."\">&#171;&#171;&#171; Evvelki</a>";
}

$mx = round(($all/$limit)+0.45);
echo "(".($p+1)."/$mx)";

if ($mx > $p + 1) {
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;$ref&amp;p=".($p + 1)."\">N&#246;vbeti &#187;&#187;&#187;</a>\n";
}


echo "<br/>----<br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add_edit&amp;id=$id&amp;ps=$ps&amp;$ref\">Hekayeni yaz</a>\n";

break;


case 'goster':
$eid = intval($_GET['eid']);

$q = mysql_query("SELECT * FROM `etiraf_text` WHERE `id` = '".$eid."' LIMIT 1;");
$cemi = mysql_num_rows($q);

if($cemi == 0) {
echo "<b>Hekaye m&#246;vcud deyil.</b><br/>";
} else {
$inf = mysql_fetch_array($q);
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

echo "<u>Ba&#351;l&#305;q</u>: <b>$topic</b>:<br/>";
echo "<u>M&#252;ellif</u>: <b>$nick</b> - ($date)<br/>*****<br/>";
echo "<b>Hekaye</b>:<i>$message</i><br/>*****<br/>";

$sql = mysql_query("SELECT * FROM `etiraf_sherh` WHERE `ideti` = '".$eid."';");
$all = mysql_num_rows($sql);

if(isset($_GET['p'])) $p = intval($_GET['p']);
else $p = 0;
if($p < 1) $p = 0;
if($p > $all) $p = 0;

$limit = 10;
$ilk = ($p * $limit);
$c = $ilk + 1;

$sql = mysql_query("SELECT * FROM `etiraf_sherh` WHERE `ideti` = '".$eid."' ORDER BY `id` DESC LIMIT $ilk, $limit;");


while ($shinf = mysql_fetch_array($sql)) {

$shid = $shinf['id'];
$shidwho = $shinf['idwho'];
$shmessage = $shinf['message'];
$shdate = $shinf['date'];
$shicaze = $shinf['icaze'];

$qus = mysql_query ("Select user from users where id = '".$shidwho."'");
if (mysql_affected_rows() == 0) {
$nick = "Anonim";
}else{
$ind = mysql_fetch_array ($qus);
$nick = $ind["user"];
}

if($level > 8) {
echo "<anchor>[x]<go href=\"del_msg.php?id=$id&amp;ps=$ps&amp;eid=".$eid."&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"action\" value=\"del\"/>\n";
echo "<postfield name=\"msg_id\" value=\"".$shid."\"/>\n";
echo "</go></anchor> \n";


}
echo "<u>$nick</u> ($shdate): <br/>".$shmessage."<br/>----<br/>";

}
}

//echo "----<br/>\n";
if ($p > 0)  {
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;eid=".$eid."&amp;$ref&amp;go=".$_GET['go']."&amp;p=".($p - 1)."\">&#171;&#171;&#171; Evvelki</a>";
}

$mx = round(($all/$limit)+0.45);
echo "(".($p+1)."/$mx)";

if ($mx > $p + 1) {
echo "<a href=\"index.php?id=$id&amp;ps=$ps&amp;eid=".$eid."&amp;$ref&amp;go=".$_GET['go']."&amp;p=".($p + 1)."\">N&#246;vbeti &#187;&#187;&#187;</a>\n";
}


echo "<br/>----<br/><a href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Fikrini yaz</a>\n";

break;



case 'add_edit':
$eid = intval($_GET['eid']);

if (!isset($_POST['action']))
{
echo "<b>Diqqet</b>: <i>Menas&#305;z Hekayeler Qeyd Etmeyin. Ekis halda aktiv edilmeyecek.</i><br/>----<br/>\n";

echo "<b>Ba&#351;l&#305;q</b>:</small><br/>\n";
echo "<input type=\"text\" name=\"bashliq$ref\" title=\"Ba&#351;l&#305;q:\" maxlength=\"30\"/><br/>\n";
echo "<small><b>Hekayeniz</b>:</small><br/>\n";
echo "<input type=\"text\" name=\"etiraf$ref\" title=\"Hekayeniz:\" maxlength=\"5000\"/><br/>\n";
echo "<small><anchor>[Elave et]<go href=\"".$_SERVER['PHP_SELF']."?go=add_edit&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"bashliq\" value=\"$(bashliq$ref)\"/>\n";
echo "<postfield name=\"etiraf\" value=\"$(etiraf$ref)\"/>\n";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
}
else
{
$bashliq = trim(htmlspecialchars(mysql_escape_string($_POST['bashliq'])));
$etiraf = trim(htmlspecialchars(mysql_escape_string($_POST['etiraf'])));
//$fikir = strtolower($fikir);
$bashliq = substr($bashliq, 0, 30);

require("../file/require/sh_files");
$bashliq = narmobil($bashliq);
$etiraf = narmobil($etiraf);


require("../smile.php");
$minpos = 355; $nm = 355;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($etiraf,$smiles[$j]);
$zzzd = $smiles[$nm];
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=355){
$st1 = substr($etiraf,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($etiraf,$minpos+strlen($smiles[$nm]),strlen($etiraf)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$etiraf = $st1.$st2;
}
unset($smiles);
unset($replaces);



if(empty($bashliq))
{
echo "<b>Ba&#351;l&#305;q</b>, yazmam&#305;s&#305;n&#305;z...<br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add_eti&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
break;
}

if(empty($etiraf))
{
echo "<b>Hekayenizi</b>, yazmam&#305;s&#305;n&#305;z...<br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add_eti&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
break;
}

if(strlen($etiraf) <= 50) {
echo "<u>Hekayeniz &#231;ox q&#305;sa olmamal&#305;d&#305;r.</u><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add_eti&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
break;
}


$id = intval($_GET['id']);
$sql2 = mysql_query("SELECT * FROM `etiraf_text` WHERE `topic` = '".$bashliq."' AND `message` = '".$etiraf."' AND `idwho` = '".$id."';");
if(mysql_affected_rows() != 0)
{
echo "<b>Eyni terkibde olan Hekaye yazmaq qada&#287;and&#305;r</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add_eti&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
break;
}

$id = intval($_GET['id']);
$date = date('d-m-y H:i', mktime((date("H") + $xsat)));
$query = mysql_query("INSERT INTO `etiraf_text` SET `idwho` = '".$id."', `message` = '".$etiraf."', `topic` = '".$bashliq."', `time` = '".time()."', `date` = '".$date."', `icaze` = '1';");

if ($query) {
echo "Hekayeniz qeyd edildi. Yoxland&#305;qdan sonra aktiv olacaq.\n";
} else {
echo "Sehv! Et&#305;raf&#305;n&#305;z elave edilmedi!\n";
}

}

break;




case 'add':
$eid = intval($_GET['eid']);

if (!isset($_POST['action']))
{
if ($row['posts'] < 100) {
echo "Hekayelere &#350;erh yaza bilmek &#252;&#231;&#252;n postlar&#305;n&#305;z&#305;n say&#305; 100-den &#231;ox olmal&#305;d&#305;r<br/><i>Bu Reklam Edenlere engel olmaq &#252;&#231;&#252;nd&#252;r...</i>";
break;
}
echo "<b>Fikriniz</b>:</small><br/>\n";
echo "<input type=\"text\" name=\"fikir$ref\" title=\"Fikriniz:\" maxlength=\"10000\"/><br/>\n";
echo "<small><anchor>[Elave et]<go href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"fikir\" value=\"$(fikir$ref)\"/>\n";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=goster&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
}
else
{
$fikir = trim(htmlspecialchars(mysql_escape_string($_POST['fikir'])));
//$fikir = strtolower($fikir);
require("../file/require/sh_files");
$fikir = narmobil($fikir);


require("../smile.php");
$minpos = 355; $nm = 355;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($fikir,$smiles[$j]);
$zzzd = $smiles[$nm];
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=355){
$st1 = substr($fikir,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($fikir,$minpos+strlen($smiles[$nm]),strlen($fikir)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$fikir = $st1.$st2;
}
unset($smiles);
unset($replaces);


$eid = intval($_GET['eid']);

$sql1 = mysql_query("SELECT `id` FROM `etiraf_text` WHERE `id` = '".$eid."';");
if(mysql_num_rows($sql1) == 0)
{
echo "<b>Hekaye m&#246;vcud deyil.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=goster&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
break;
}

if(empty($fikir))
{
echo "<b>&#304;lk цnce fikrinizi qeyd edin.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."\"&amp;id=$id&amp;ps=$ps&amp;$ref>Geri Qay&#305;t</a>\n";
break;
}

if(strlen($fikir) <= 5) {
echo "<b>Fikriniz &#231;ox q&#305;sa olmamal&#305;d&#305;r</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."\"&amp;id=$id&amp;ps=$ps&amp;$ref>Geri Qay&#305;t</a>\n";
break;
}

$sql2 = mysql_query("SELECT * FROM `etiraf_sherh` WHERE `message` = '".$fikir."' AND `ideti` = '".$eid."' AND `idwho` = '".$id."';");
if(mysql_affected_rows() != 0)
{
echo "<b>Eyni fikiri yazmaq qada&#287;and&#305;r.</b><br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qayit</a>\n";
break;
}

$date = date('d-m-y H:i', mktime((date("H") + $xsat)));
$query = mysql_query("INSERT INTO `etiraf_sherh` SET `ideti` = '".$eid."', `idwho` = '".$id."', `message` = '".$fikir."', `time` = '".time()."', `date` = '".$date."';");

//mysql_query("UPDATE `users` SET `etiraf` = `etiraf` + 1 WHERE `id` = '".$id."';");

if ($query) {
echo "Fikriniz elave edildi!<br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=goster&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri Qay&#305;t</a>\n";
} else {
echo "Sehv! Fikriniz elave edilmedi!<br/>\n";
echo "<a href=\"".$_SERVER['PHP_SELF']."?go=add&amp;eid=".$eid."&amp;id=$id&amp;ps=$ps&amp;$ref\">Geri qay&#305;t</a>\n";
}

}

break;
}


if (!empty($go)) {
echo "<br/>----<br/>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?ref=$ref&amp;id=$id&amp;ps=$ps&amp;$ref\">Hekayeler Qay&#305;t</a>\n";
}
echo "<br/>----<br/>";
echo "<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
echo "</small></p></card></wml>";
?>
