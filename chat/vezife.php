<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$_v->title('&#304;dare Heyyeti');
$_v->fsize1($fsize1);

echo "&#350;ikayet ve suallar&#305;n&#305;z&#305; a&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z idare heyyetine bildire bilersiniz. &#350;ikayetiniz anonim olaraq saxlan&#305;lacaq.<br/>\n";
$_v->divide();
$lev = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($lev);

echo "<b>".$arr['name']."</b>: <u>1</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '9'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
/////////////////////////S. Admin/////////
$lev = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='8'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '8'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";


$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
//////////////////////////Admin//////////

$lev = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='7' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '7'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";
////////////////S.Moder//////////
$lev = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='6' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '6'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";

/////////////////////Moder///////////////
$lev = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='5' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '5'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
echo "-----<br/>\n";

///////////////////ViP////////////////

$lev = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($lev);



$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where level='4' and banned!='2'"));
echo "<b>".$arr['name']."</b>: <u>".$sayi[0]."</u><br/>\n";

$r = mysql_query("SELECT id,user,time,posts,mexvi,inv,nomre FROM users WHERE level = '4'");
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
$noms= $a["nomre"];
$inv= $a["inv"];
$u_time = $a["time"];
if(strlen($noms)>=7)$noms = "<b>Tel</b>: <u>$noms</u>"; else $noms ="";

if($u_time >$SERVER_TIME-$_AUTO['ofline']){
$online = "<img src=\"img/online.gif\" alt=\"Online\"/>\n";
}
else
{
$online = "<img src=\"img/offline.gif\" alt=\"Ofline\"/>\n";
}
if($mexvi!='0' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Mexvi</u><br/>\n";
elseif($inv=='2' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>iqnor</u><br/>\n";
elseif($inv=='1' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Gorunmez</u><br/>\n";
elseif($inv=='3' and $row["level"]==9)
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> <u>Tam Gorunmez</u><br/>\n";
elseif($inv=='0' and $mexvi=='0')
echo "$online<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a>$noms<br/>\n";

$a = mysql_fetch_array($r);
}
$_v->divide();

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
?>