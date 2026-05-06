<?php
require("inc.php");
$link = connect_db();
anti_ddos();
$tm = $SERVER_TIME;


$q = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['online']."' AND `room` = '30' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$inmenu = mysql_result($q, 0);
$q = mysql_query("SELECT `user`,`sex`,`level`,`inv`,`zn` FROM `users` WHERE `time` > '".$_AUTO['online']."' AND `room` = '30' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");

$m = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['online']."' AND `room` = '29' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$mektub = mysql_result($m, 0);
$m = mysql_query("SELECT `user`,`sex`,`inv`,`level`,`zn` FROM `users` WHERE `time` > '".$_AUTO['online']."' AND `room` = '29' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");

$select_online = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['chat']."' AND `room` <= '10' AND `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$select_online = mysql_result($select_online, 0);

$room_other = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['online']."' AND `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$room_other = mysql_result($room_other, 0);

$_v->title('Online ('.$room_other.')');
$_v->fsize1('small');
echo "Cemi Online: <b>".($room_other)."</b><br/>\n";
$_v->divide();
echo "Otaqlarda <b>$select_online</b> nefer<br/>\n";
echo $divide;



$roomselect = @mysql_query ("Select `name`,`rm` from `rooms` WHERE `activ`='1' order by `pos` limit 0,11;");
while($rooms = @mysql_fetch_array($roomselect)) {
$roomname=$rooms["name"];
$rsm=$rooms["rm"];

$otaqda = @mysql_query ("Select `user`,`inv`,`level`,`room`,`zn`,`sex` from `users` WHERE `time`> '".$_AUTO['chat']."' and `room` = '".$rsm."' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$kol = mysql_affected_rows();

if ($rsm==10) {
echo "----<br/><b>$roomname ($kol)</b><br/>";
} else {
echo "$roomname ($kol)<br/>";
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
if ($lines["level"] >= 9)echo "<b><u>[$zn$user]</u></b> ";
elseif ($lines["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($lines["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($lines["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($lines["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)\n";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>\n";
if (($k+1) != $kol) print ', ';
}
if($kol>0)
echo "<br/>";
unset($lines);
}


if ($mektub != 0) {
echo $divide;
echo "<u>Mesajlarda</u>: ".$mektub."<br/>\n";
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
if ($nick["level"] >= 9)echo "<b><u>[$zn$user]</u></b> ";
elseif ($nick["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($nick["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$user($se)(<b>!</b>)\n";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>\n";
$c++;
if($c != $mektub) echo ", ";
}
echo"<br/>";
}


if ($inmenu!= 0){
echo $divide;
echo "<u>Dehlizde</u>: ".$inmenu."<br/>\n";
$c = 0;
while($nick = mysql_fetch_array($q))
{
$user=$nick['user'];
$sex=$nick['sex'];
$hd=$nick['inv'];
$zn=$nick['zn'];
if($sex=="0") {$se="K";}
else {$se="Q";};
if($zn!="")$zn ="<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($hd != 1)
if ($nick["level"] >= 9)echo "<b><u>[$zn$user]</u></b> ";
elseif ($nick["level"] > 7)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 6)echo "$zn<b>$user($se)</b>";
elseif ($nick["level"] > 5)echo "$zn<u>$user($se)</u>";
elseif ($nick["level"] > 4)echo "$zn<i>$user($se)</i>";
else echo "$zn$user($se)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$user($se)(<b>!</b>)\n";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>\n";
$c++;
if($c != $inmenu) echo ", ";
}
echo"<br/>";
}

$_v->divide();
echo "<a href=\"reghelp.php\">Qeydiyyat</a><br/>\n";
echo "<a href=\"index.php\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2('small');
$_v->end('1',$link);
?>