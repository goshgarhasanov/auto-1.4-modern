<?
header('Cache-Control: no-store, no-cache, must-revalidate');        // HTTP/1.1
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$nk = intval($_GET['nk']);
$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$nk."';");
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) == 0){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"error\" title=\"Xeta\" ontimer=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\"><timer value=\"15\"/>";
echo "<p align=\"center\">";
echo $fsize1;
echo "Istifade&#231;i tap&#305;lmad&#305;!";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}
else
{
$nick = mysql_result($sql, 0);
}
$user = mysql_fetch_array($q);
$nk = $user['id'];
$nick = $user['user'];
$q = mysql_query("SELECT * FROM `fikirler` WHERE `uid` = '".$nk."';");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
if($go==moder)echo "<card id=\"silindi\" title=\"$nick ait mesaj silindi\" ontimer=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\"><timer value=\"3\"/>\n";
else echo "<card id=\"fikir\" title=\"$nick haqq&#305;nda terifler\">\n";
echo "<p align =\"left\">\n";

echo $fsize1;

if($go==moder){
if ($id==1){
$tid = intval($_GET['tid']);
$sql = mysql_query("DELETE FROM `fikirler` WHERE `id` = '".$tid."';");
if(mysql_affected_rows() == 0)
{
echo "Yaz&#305; tap&#305;lmad&#305;.<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "yaz&#305; silind&#305;.<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}}
else {
echo "Sizin Buna H&#252;ququnuz &#231;atm&#305;r<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
mysql_close($link);
exit;
}
if($go==user){
$tid = intval($_GET['tid']);
$sql = mysql_query("DELETE FROM `fikirler` WHERE `id` = '".$tid."';");
if(mysql_affected_rows() == 0)
{
echo "Yaz&#305; tap&#305;lmad&#305;.<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "yaz&#305; silind&#305;.<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
mysql_close($link);
exit;
}
$qes = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);
if($su=="0") {echo "<b>$nick</b>, haqq&#305;nda terif qeyd edilmeyib...<br/>";}
else{
echo "<b>$nick</b>, - Haqq&#305;nda yaz&#305;lm&#305;&#351; terifler.<br/>\n";
echo "<u>Terif say&#305;: (<b>$su</b>)</u><br/>";}
echo "-----<br/>";
if(mysql_num_rows($q) == 0)
{
echo "Terif ve ya q&#305;z&#305;l s&#246;z yazmaq,<br/>
2 bal deyerindedir.<br/>";
}
$query = @mysql_query("SELECT COUNT(*) FROM `fikirler` WHERE `uid` = '".$nk."' ;");
$all = @mysql_result($query, 0);

if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $all) $s = 0;
$c = $s + 1;
$query = mysql_query("SELECT * FROM `fikirler` WHERE `uid` = '".$nk."' ORDER BY `id` ASC LIMIT $s, 10 ;");

while($meets = mysql_fetch_array($query))
{
$tid = $meets['id'];
$adam = $meets['author'];
$metn = $meets['body'];
$mid = $meets['mid'];
include "fikirsmile.php";
$metn = preg_replace($smiles_array,$smile,$metn,1);
unset($smiles_array);
unset($smile);

if($id == $id && $nk == $id) echo "[<a href=\"fikirler.php?go=user&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;tid=$tid&amp;rm=$rm&amp;$ref\">sil </a>]";
if ($id=="1")echo "[<a href=\"fikirler.php?go=moder&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;tid=$tid&amp;rm=$rm&amp;$ref\">x</a>]";
echo "<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$mid&amp;rm=$rm&amp;$ref\">$adam </a></b><br/>";
echo "*$metn<br/>";
}
echo "-----";
if ($s > 2) echo "<br/><a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;s=".($s-10)."&amp;$ref\">Ð’«Ð’« Geri</a> | ";
{
if ($all > $s + 10)   print "<br/><a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;s=".($s+10)."&amp;$ref\">N&#246;vbeti &#xbb;&#xbb;</a>";
}

echo "<br/>[<a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Terif Yaz</a>]<br/>\n";
if ((isset($rm))&&($rm!=""))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">&#199;ata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
mysql_close($link);
?>
