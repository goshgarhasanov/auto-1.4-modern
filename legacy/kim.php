<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$rm = mysql_escape_string($rm);
if($row['room']!=$rm){
mysql_query ("Update `users` set `room`='".$rm."' where `id` ='".$id."';");
}

$_v->title('Sizin otaqda','left');

$_v->fsize1($fsize1);

$res = @mysql_query ("Select `id`,`user`,`inv`,`sex`,`level`,`zn` from `users` WHERE `time` > '".$_AUTO['chat']."' and `room` = '".$rm."' and `inv` != '3' and `kik`<'".time()."' and banned = '0' order by `ontime` desc;");
$kol = mysql_affected_rows();

$roomselect = @mysql_query ("Select `name` from `rooms` where `rm`='".$rm."' and `activ` = '1';");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];

echo "<b>$roomname (".($kol).")</b><br/>---<br/>";

for ($k = 0; $k < $kol; $k++)
{
$lines = mysql_fetch_array ($res);
$user = $lines["user"];
$hd = $lines["inv"];
$sex = $lines["sex"];
$seviy = $lines["level"];
$nk = $lines["id"];
$zn = $lines["zn"];

if($sex=="0") {$se="K";}else {$se="Q";};
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($hd != 1) 
if ($lines["level"] == 9)echo "<b><u>[$zn<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>]</u></b> ";
elseif ($lines["level"] > 7)echo "$zn<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)</b>";
elseif ($lines["level"] > 6)echo "$zn<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)</b>";
elseif ($lines["level"] > 5)echo "$zn<u><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)</u>";
elseif ($lines["level"] > 4)echo "$zn<i><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)</i>";
else echo "$zn<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)";
elseif ($row["level"] > 7) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">$user</a>($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>";
if (($k+1) != $kol) print ', ';
}
if($kol>0)
echo "<br/>";
unset($lines);
unset($lines1);
echo "---<br/>";
if (isset($rm)) echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Dehliz</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>