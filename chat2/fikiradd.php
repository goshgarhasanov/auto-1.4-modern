<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$nk."';");
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) == 0){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xeta\" title=\"Xeta\" ontimer=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\"><timer value=\"15\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Istifade&#231;i tap&#305;lmad&#305;!\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
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

$bal = $row['bal'];
if ($id!=1){
if ($row["bal"]<=1){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"bal\" title=\"Bal yetersizdir\">\n";
echo "<p>";
echo $fsize1;
echo "$nick leqebli &#350;exsi tebrik ve ya terif etmek &#252;&#231;&#252;n,<br/> Size <b>2</b>, bal laz&#305;md&#305;r.<br/>\n";
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;leme Qaydas&#305;</a>\n";
echo "<br/>---<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}}

if($go==smile){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card id=\"add\" title=\"Mesaj &#252;&#231;&#252;n smayllar\"><p align=\"left\">";
$smiles = array(
"s0",
"s2",
"s3",
"s4",
"s5",
"s6",
"s7",
"s8",
"s9",
"s10",
"s11",
"s12",
"s13",
"s14",
"s15",
"s16",
"s17");
$replaces = array(
"<img src=\"smile/salam.gif\" alt=\"s0\"/>",
"<img src=\"smile/1.gif\" alt=\"s2\"/>",
"<img src=\"smile/2.gif\" alt=\"s3\"/>",
"<img src=\"smile/5.gif\" alt=\"s4\"/>",
"<img src=\"smile/bad3.gif\" alt=\"s5\"/>",
"<img src=\"smile/bad4.gif\" alt=\"s6\"/>",
"<img src=\"smile/bad2.gif\" alt=\"s7\"/>",
"<img src=\"smile/cool3.gif\" alt=\"s8\"/>",
"<img src=\"smile/cvetok.gif\" alt=\"s9\"/>",
"<img src=\"smilean/4mak.gif\" alt=\"s10\"/>",
"<img src=\"smile/zg.gif\" alt=\"s11\"/>",
"<img src=\"smilean/baby.gif\" alt=\"s12\"/>",
"<img src=\"smilean/dance.gif\" alt=\"s13\"/>",
"<img src=\"smilean/dance3.gif\" alt=\"s14\"/>",
"<img src=\"smilean/good.gif\" alt=\"s15\"/>",
"<img src=\"smilean/haha.gif\" alt=\"s16\"/>",
"<img src=\"smilean/hlop.gif\" alt=\"s17\"/>");
if(!isset($s))$s=0;
$max=count($smiles);
$stmax=round(($max/6)+0.45);
$stn=($s/6)+1;
echo "Sehife. $stn  / $stmax<br/>\n";
$do=$s+6;
for($i=$s;$i<$do;$i++){
if($i==$max)break;
echo "$smiles[$i]<br/>\n";
echo "$replaces[$i]<br/>\n";
echo "---<br/>\n";
}
$next=$i;
$prev=$s-6;
if($i>6)echo "<a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;s=$prev&amp;go=smile&amp;rm=$rm&amp;$ref\">&lt;&lt;&lt;</a> | \n";
if($i<$max)echo "<a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;s=$next&amp;go=smile&amp;rm=$rm&amp;$ref\">&gt;&gt;&gt;</a>\n";
echo "<br/><a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo "</p></card></wml>";
mysql_close ($link);
exit;}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card id=\"add\" title=\"$nick &#252;&#231;&#252;n terifiniz\"><p align=\"left\">";




if(!isset($_POST['action']))
{
echo $fsize1;
echo "<b>$nick</b>, &#252;&#231;&#252;n &#252;rek s&#246;zleriniz<br/>\n";
echo $fsize2;
echo "<input name=\"text$nocache\"  value=\"\"  maxlength=\"300\"  title=\"text\"/><br/>\n";
echo $fsize1;
echo "<u><anchor>[G&#246;nder]<go href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"text\" value=\"$(text$nocache)\"/>\n";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor></u>\n";
echo $fsize2;
echo $fsize1;
echo "<br/>---<br/>\n";
echo "<a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;go=smile&amp;$ref\">Smaylikler</a><br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
}
else
{


$text = htmlspecialchars(mysql_escape_string(trim($_POST['text'])));
$text = str_replace('$', '$$', $text);



if(empty($text))
{

break;
}


$sql = mysql_query("SELECT `id` FROM `fikirler` WHERE  `body` = '".$text."';");

if(mysql_num_rows($sql) != 0)
{
echo $fsize1;
echo "Fikriniz elave edildi, Te&#351;ekk&#252;r edirik...\n";
echo "<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;}

$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';");
$nickname = mysql_result($q, 0);
if ($id!=1)
$contur=$bal-2;
else $contur=$bal;
$sql = mysql_query("INSERT INTO `fikirler` SET `author` = '".$nickname."',  `body` = '".$text."', `uid` = '".$nk."', `mid` = ".$id.";")&&mysql_query ("Update users set bal='".$contur."' where id ='".$id."'");

if($sql)
{
echo $fsize1;
echo "Fikriniz elave edildi, Te&#351;ekk&#252;r edirik!\n";
echo "<br/>-----<br/>\n";
echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;}
else
{
echo $fsize1;
echo "Bazada Problem var 30 saniyyeden sonra tekrar yoxlay&#305;n!<br/>\n";
echo mysql_error()."<br/>\n";
echo $fsize2;
}
}
echo "</p></card></wml>";
mysql_close ($link);
?>
