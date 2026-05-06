<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."' WHERE `id` = '".$id."' LIMIT 1;");

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"buotaq\" title=\"Sizin otaqda\">";
echo "<p align=\"left\">";
echo $fsize1;

$tm = time();
$res = @mysql_query ("Select id,user,inv,sex,level,zn from users WHERE `time` > '".$tm."' and `room` = '".$rm."' and `inv` != '3'");
echo " ".mysql_error()."";
$kol = mysql_affected_rows();
$kol_all += ($kol);

$roomselect = @mysql_query ("Select `name` from `rooms` where `rm`='".$rm."';");
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

if($sex=="0") {$se="K";}
else {$se="Q";};
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
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>
