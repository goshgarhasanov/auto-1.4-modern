<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."' WHERE `id` = '".$id."' LIMIT 1;");

$tm = time();
if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";

$q = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `inv` != '3' AND `room` = 30;");
$inmenu = mysql_result($q, 0);
$m = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `inv` != '3' AND `room` = 29;");
$mektub = mysql_result($m, 0);
$m = mysql_query("SELECT user,sex,inv,level,zn FROM `users` WHERE `time` > '".$tm."' and `inv` != '3' AND `room` = 29;");

$ts = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `inv` != '3';");
$kimler = mysql_result($ts, 0);
//$ts = mysql_query("SELECT user,sex,inv,level,zn FROM `users` WHERE `time` > '".$tm."' and `inv` != '3' AND `room` = 28;");
//$om= mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `room` = '28' and `inv` != '3';");
//$online_mesaj = mysql_result($om, 0);

for ($n = 0; $n <= 7; $n++){
$room = "room".$n;
$r = @mysql_query ("Select user,inv from users WHERE `time` > '".$tm."' and `room` = '".$n."' and `inv` != '3'");
$asnum = mysql_affected_rows();
$siz[$n] = $asnum;
@$kol = $kol + $asnum;
}

echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"who\" title=\"Kim,harda?(".$kimler.")\">";
echo "<p align=\"left\">";

echo $fsize1;
echo "<b><a href=\"axtar.php?id=$id&amp;ps=$ps&amp;$ref\">Nik Axtar...</a></b><br/><br/>";
echo "Kim-Harda: (<b>$kimler</b>) nefer<br/>----<br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Online Mesaj</a><br/>\n";

echo "----<br/>";


$roomselect = @mysql_query ("Select name,rm from rooms order by pos limit 0,7;");
while($rooms = @mysql_fetch_array($roomselect)) {
$roomname=$rooms["name"];
$rsm=$rooms["rm"];
$room="room".$rsm;

$otaqda = @mysql_query ("Select user,inv,level,room,zn,sex from users WHERE `time`> '".$tm."' and `room` = '".$rsm."'  and `inv` != '3';");
echo " ".mysql_error()."\n";
$kol = mysql_affected_rows();
$kol_all += ($kol);

if ($rsm==10) {
echo "<b><a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=10$takep\">$roomname</a></b><br/>";
} else {
echo "<a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rsm$takep\">$roomname($siz[$rsm])</a><br/>";
}



for ($k = 0; $k < $kol; $k++)
{
$lines = mysql_fetch_array ($otaqda);
$user = $lines["user"];
$hd = $lines["inv"];
$sex=$lines['sex'];
$zn=$lines['zn'];
$yeri=$lines['room'];
if($sex=="0") {$se="K";}
else {$se="Q";};
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($yeri== 10)
echo "*x*X*x*";
else
if ($hd != 1)
if ($lines["level"] == 9)echo "<b><u>[$zn$user]</u></b> ";
elseif ($lines["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($lines["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($lines["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($lines["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)";
elseif ($row["level"] > 7) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$user($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>";
if (($k+1) != $kol) print ', ';
}
if($kol>0)
echo "<br/>";

unset($lines);
}


if ($row['level']=="9"){

$r = @mysql_query ("Select id from users WHERE `time` > '".$tm."' and `room` = '10' and `inv` != '3'");
$asnum = mysql_affected_rows();
$siz[$n] = $asnum;
@$kol = $asnum;

$roomselect = @mysql_query ("Select name from rooms where rm=10");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];
{

$gizlide = @mysql_query ("Select user,room,level,zn,sex from users WHERE `time` > '".$tm."' and `room` = '10' and `inv` != '3'");
echo " ".mysql_error()." ";
$kolin = mysql_affected_rows();
if($kolin!="0")echo "----<br/><b>Gizli Otaqda Olanlar:</b><br/>";
for ($k = 0; $k < $kol; $k++){
$lines = mysql_fetch_array ($gizlide);
$used = $lines["user"];
$yeri = $lines["room"];
$hd = $lines["inv"];
$sex=$lines['sex'];
$shre = mysql_query ("Select * from room10 where who = '".$used."' order by id desc LIMIT 1");
$ss = mysql_fetch_array ($shre);
$pwwd = $ss["pwd"];
$zn=$lines['zn'];
if($sex=="0") {$se="K";}
else {$se="Q";};
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($hd != 1)
if ($lines["level"] == 9)echo "<b><u>[$zn$used]</u></b> ";
elseif ($lines["level"] > 7)echo "$zn<b>$used($se)</b>";
elseif ($lines["level"] > 6)echo "$zn<b>$used($se)</b>";
elseif ($lines["level"] > 5)echo "$zn<u>$used($se)</u>";
elseif ($lines["level"] > 4)echo "$zn<i>$used($se)</i>";
else echo "$zn$used($pwwd)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$used($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>";
if (($k+1) != $kol) print ', ';

}
if ($used!="")echo "<br/>";
if($kol>1)
unset($lines);
}
}


if ($mektub != 0) {
echo $divide;
echo "<u>Mektublarda</u>: ".$mektub."<br/>\n";
$c = 0;
while($nick = mysql_fetch_array($m))
{
$user=$nick['user'];
$sex=$nick['sex'];
$hd=$nick['inv'];
$zn=$nick['zn'];
if($sex=="0") {$se="K";}
else {$se="Q";};
if($zn!="")$zn ="<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($hd != 1)
if ($nick["level"] == 9)echo "<b><u>[$zn$user]</u></b> ";
elseif ($nick["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($nick["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$user($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>";
$c++;
if($c != $mektub) echo ", ";
}
echo"<br/>";
}


if ($inmenu!= 0)
echo $divide."<u>Dehlizde</u>: (<b><a href=\"dehliz.php?id=$id&amp;ps=$ps$takep\">".$inmenu."</a></b>) nefer<br/>\n";

echo "<b>****</b><br/>";

echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>