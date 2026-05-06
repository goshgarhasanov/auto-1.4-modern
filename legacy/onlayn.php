<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

include("./file/fun/5");

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";

$ts = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['online']."' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$kimler = mysql_result($ts, 0);

$_v->title('Kim,harda?('.$kimler.')');
$_v->fsize1($fsize1);

echo "<b><a href=\"axtar.php?id=$id&amp;ps=$ps&amp;$ref\">Nik Axtar...</a></b><br/><br/>";
echo "Kim-Harda: (<b>$kimler</b>) nefer<br/>----<br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Online Mesaj</a><br/>\n";
$_v->divide();

$roomselect = @mysql_query ("Select `name`,`rm` from `rooms` WHERE `activ`='1' order by `pos` limit 0,11;");
while($rooms = @mysql_fetch_array($roomselect)) {
$roomname=$rooms["name"];
$rsm=$rooms["rm"];
$room="room".$rsm;

$otaqda = @mysql_query ("Select `user`,`inv`,`level`,`room`,`zn`,`sex` from `users` WHERE `time`> '".$_AUTO['chat']."' and `room` = '".$rsm."' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$kol = mysql_affected_rows();

if ($rsm==10) {
echo "----<br/><b><a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=10$takep\">$roomname</a></b><br/>";
} else {
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rsm$takep\">$roomname($kol)</a><br/>";
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

$r = @mysql_query ("Select `id` from `users` WHERE `time` > '".$_AUTO['chat']."' and `room` = '10' and `inv` != '3'and `kik`<'".time()."' and banned = '0';");
$asnum = mysql_affected_rows();
$siz[$n] = $asnum;
@$kol = $asnum;

$roomselect = @mysql_query ("Select `name` from `rooms` where `rm`='10';");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];
{

$gizlide = @mysql_query ("Select `user`,`room`,`level`,`zn`,`sex` from `users` WHERE `time` > '".$_AUTO['chat']."' and `room` = '10' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
echo " ".mysql_error()." ";
$kolin = mysql_affected_rows();
if($kolin!="0")echo "----<br/><b>Gizli Otaqda Olanlar:</b><br/>";
for ($k = 0; $k < $kol; $k++){
$lines = mysql_fetch_array ($gizlide);
$used = $lines["user"];
$yeri = $lines["room"];
$hd = $lines["inv"];
$sex=$lines['sex'];
$shre = mysql_query ("Select * from `room10` where `who` = '".$used."' order by `id` desc LIMIT 1;");
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


$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>