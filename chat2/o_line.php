<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

$ref=rand(10000,1000000);
require("ay.php");
$link = connect_db();
$tm = time();
$fsize1 = "<small>";
$fsize2 = "</small>";

$q = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `inv` != '3';");
$cemi = mysql_result($q, 0);
$m = mysql_query("select id,user,sex,inv,level,zn from users where `time` > '".$tm."' and `inv` != '3' order by rand() desc limit 0,$cemi");

echo $xml;
echo $dtd;
echo "<wml>";
$file = @file("file/dat_folder/tech.dat");
$addburaon = trim($file[0]);
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"who\" title=\"".$site." -de ($addburaon".$cemi.") nefer\">";
echo "<p align=\"center\">";
echo "<small>";

echo "<b>".$site." -de $addburaon".$cemi." nefer</b>.";
echo "</small>";
echo "</p>";
echo "<p align=\"left\">";
echo "<small>";
if ($cemi == 0) {
} else {
$c = 0;
while($nick = mysql_fetch_array($m))
{
$usid=$nick['id'];

$user=$nick['user'];
$sex=$nick['sex'];
$hd=$nick['inv'];
$zn=$nick['zn'];
if($sex=="0") {$se="K";}
else {$se="Q";};
if($zn!="")$zn ="<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$user = "<img src=\"i/".$usid.".gif\" alt=\"$user\"/>";
}
if ($hd != 1)
if ($nick["level"] == 9)echo "<b><u>[$zn$user]($se)</u></b> ";
elseif ($nick["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($nick["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/gor.gif\" alt=\".\"/>$user($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/gor.gif\" alt=\".\"/>G&#246;r&#252;nmez</u></i>";


$c++;
if($c != $cemi) echo ", ";
}
echo "<br/>";
}
echo "</small>";
echo "</p>";
echo "<p align=\"center\">";
echo "<small>";
print "<a href=\"reghelp.php?$ref\">Qeydiyyat</a> | ";
print "<a href=\"index.php?$ref\">Geri Qay&#305;t</a><br/>";
print "<a href=\"http://$site/?$ref\">$site</a>";

echo "</small>";
echo "</p></card></wml>";
mysql_close ($link);
?>