<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$ref = rand(1111,9999);

if ($id != 1) {
$tabled = "AND inv = '0'";
} else {
$tabled = "";
}

$_v->title('Aktivlik reytinqi');
$_v->fsize1($fsize1);

$t= mysql_escape_string($_GET['t']);
switch ($t) {

default:
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active` > '0' ".$tabled.";");
$inmenu = mysql_result($q, 0);
if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;
echo "Bu günün aktiv istifadeçileri:<br/>\n";
echo "<br/>\n";
echo "<b>Aktivlik reytinqi</b><br/>\n";
echo "<u>Günlük</u> | <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;t=2&amp;ref=$ref\">Heftelik</a> | <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;t=3&amp;ref=$ref\">Aylıq</a><br/>\n";
echo "<br/>\n";
if($inmenu==0){
echo "Gün erzinde aktiv istifadeçi qeyde alınmayıb...<br/>\n";
}else{

$q = mysql_query("SELECT `id`,`user`,`time_active`,`zn` FROM `users` WHERE `time_active` > '0' ".$tabled." ORDER BY `time_active` DESC LIMIT $s,20;");
$c = $s;
while($nick = mysql_fetch_array($q))
{
$c++;
$yeni = $nick['time_active'];
if($nick['zn']!="") $znaki=" <img src=\"img/z".$nick['zn'].".gif\" alt=\".\"/>";
else $znaki = false;

$s_san = $yeni / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;

$d = $yeni / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($yeni - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');

$saniye = $yeni - $deqiqe_san;
echo "$c) $znaki<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nick['id']."&amp;ref=$ref\">".$nick['user']."</a> - ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "<br/>";
}
if ($inmenu > $s + 20)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."\">Növbeti &gt;&gt;&gt;</a><br/>\n";
if ($s > 0)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."\">&lt;&lt;&lt; Evvelki</a><br/>\n";
echo "<br/><i><b>Qeyd</b>: Nikler gün erzinde aktiv olduğu vaxta göre sıralanmışdır.</i><br/>\n";
}
break;



case '2':
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active1` > '0' ".$tabled.";");
$inmenu = mysql_result($q, 0);
if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;
echo "Bu hefte üzre Aktiv istifadeçiler:<br/>\n";

echo "<br/>\n";
echo "<b>Aktivlik reytinqi</b><br/>\n";
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Günlük</a> | <u>Heftelik</u> | <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;t=3&amp;ref=$ref\">Aylıq</a><br/>\n";
echo "<br/>\n";
if($inmenu==0){
echo "Bu hefte aktiv istifadeçi qeyde alınmayıb...<br/>\n";
}else{

$q = mysql_query("SELECT `id`,`user`,`time_active1`,`zn` FROM `users` WHERE `time_active1` > '0' ".$tabled." ORDER BY `time_active1` DESC LIMIT $s,20;");
$c = $s;
while($nick = mysql_fetch_array($q))
{
$c++;
$yeni = $nick['time_active1'];

if($nick['zn']!="") $znaki=" <img src=\"img/z".$nick['zn'].".gif\" alt=\".\"/>";
else $znaki = false;



// Gun
$g_san = $yeni / 86400;
$gun_tam = strtok($g_san,'.');
$gun_san = $gun_tam * 86400;
// Saat
$s_san = ($yeni - $gun_san) / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
$saat_san = $gun_san + $saat_san;
// Deqiqe
$d = $yeni / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($yeni - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $yeni - $deqiqe_san;
echo "$c) $znaki<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nick['id']."&amp;ref=$ref\">".$nick['user']."</a> - ";
if ($gun_tam != 0)echo "".$gun_tam." gün ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "<br/>\n";
}
if ($inmenu > $s + 20)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."&amp;t=2&amp;ref=$ref\">Növbeti &gt;&gt;&gt;</a><br/>\n";
if ($s > 0)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."&amp;t=2&amp;ref=$ref\">&lt;&lt;&lt; Evvelki</a><br/>\n";
echo "<br/><i><b>Qeyd</b>: Nikler hefte erzinde aktiv olduğu vaxta göre sıralanmışdır.</i><br/>\n";
}
break;

case '3':


$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active2` > '0' ".$tabled.";");
$inmenu = mysql_result($q, 0);
if(isset($_GET['s'])) $s = $_GET['s'];
else $s = 0;
if($s < 0) $s = 0;
if($s > $inmenu) $s = 0;
echo "Bu ay üzre Aktiv istifadeçiler:<br/>\n";

echo "<br/>\n";
echo "<b>Aktivlik reytinqi</b><br/>\n";
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Günlük</a> | <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;t=2&amp;ref=$ref\">Heftelik</a> | <u>Aylıq</u><br/>\n";
echo "<br/>";
if($inmenu==0){
echo "Bu ay aktiv istifadeçi qeyde alınmayıb...<br/>\n";
}else{
$q = mysql_query("SELECT `id`,`user`,`time_active2`,`zn` FROM `users` WHERE `time_active2` > '0' ".$tabled." ORDER BY `time_active2` DESC LIMIT $s,20;");
$c = $s;
while($nick = mysql_fetch_array($q))
{
$c++;
$active_time = $nick['time_active2'];
if($nick['zn']!="") $znaki=" <img src=\"img/z".$nick['zn'].".gif\" alt=\".\"/>";
else $znaki = false;

// Gun
$g_san = $active_time / 86400;
$gun_tam = strtok($g_san,'.');
$gun_san = $gun_tam * 86400;
// Saat
$s_san = ($active_time - $gun_san) / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
$saat_san = $gun_san + $saat_san;
// Deqiqe
$d = $active_time / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($active_time - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $active_time - $deqiqe_san;
echo "$c) $znaki<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nick['id']."&amp;ref=$ref\">".$nick['user']."</a> - ";
if ($gun_tam != 0)echo "".$gun_tam." gün ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "<br/>";
}
if ($inmenu > $s + 20)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."&amp;t=3&amp;ref=$ref\">Növbeti &gt;&gt;&gt;</a><br/>\n";
if ($s > 0)  print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."&amp;t=3&amp;ref=$ref\">&lt;&lt;&lt; Evvelki</a><br/>\n";
echo "<br/><i><b>Qeyd</b>: Nikler ay erzinde aktiv olduğu vaxta göre sıralanmışdır.</i><br/>";
}
break;

}
echo "<br/>";
if ($t!="") echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Aktivlik reytinqi</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>