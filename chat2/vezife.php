<?php
header("Cache-Control: no-cache"); 
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"results\" title=\"&#304;dare Heyyeti\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "&#350;ikayet ve suallar&#305;n&#305;z&#305; a&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z idare heyyetine bildire bilersiniz. &#350;ikayetiniz anonim olaraq saxlan&#305;lacaq.<br/>-----<br/>\n";

$lev = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($lev);

$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>1</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '9'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
/////////////////////////S. Admin/////////
$lev = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '8'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";


$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
//////////////////////////Admin//////////

$lev = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '7'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
////////////////S.Moder//////////
$lev = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '6'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";

/////////////////////Moder///////////////
$lev = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '5'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";

///////////////////ViP////////////////

$lev = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='".$arr['level']."' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,reh,inv,nomre FROM users WHERE level = '4'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$reh = $a["reh"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >time()){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($reh!='0' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <b>Gizli</b><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $reh=='0')
echo "$online<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";


echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n"; 
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
?>