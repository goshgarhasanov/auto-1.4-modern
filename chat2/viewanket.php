<?php
header('Cache-Control: no-store, no-cache, must-revalidate');	// HTTP/1.1
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($nk==""){
$nk=$id;
}else{
$nk=$nk;
}

$select = @mysql_query ("Select * from users where id='".$nk."' and banned != '2'");
if (mysql_affected_rows() == 0){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Nick Tap&#305;lmad&#305;. Yeqin Silinib.<br/>";
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}
$inf = mysql_fetch_array ($select);
$nk=$inf["id"];
$username=$inf["user"];
$sex=$inf["sex"];
$ankete=$inf["ankete"];

echo $xml;
echo $dtd;
echo "<wml>\n";



$userm = mysql_query ("select count(id) as num from viewanket where `myid`='".$nk."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;


switch($mod) {
default:
if($id==$nk){
if ($sex == 0) {
$cinsi = " bey";
} else {
$cinsi = " xan&#305;m";
}
echo "<card title=\"$username $cinsi sizin anketiniz\">\n";
}
else {
if ($sex == 0) {
$cinsi = " beyin";
} else {
$cinsi = " xan&#305;m&#305;n";
}
echo "<card title=\"$username $cinsi anketi\">\n";
}
echo "<p align=\"left\">\n";
echo $fsize1;

if($id==$nk){
if ($sex == 0) {
$cinsi = " bey";
} else {
$cinsi = " xan&#305;m";
}
if ($num>0){
echo "<b>$username</b> $cinsi sizin anketinize $num nefer bax&#305;b!<br/>\n";
if($row['level']==9 or $id==$nk)echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;mod=del&amp;ref=$ref\">Listi temizle</a> -\n";
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Yenile</a><br/>\n";
}
}
else {
if ($sex == 0) {
$cinsi = " beyin";
} else {
$cinsi = " xan&#305;m&#305;n";
}
if ($num>0){
echo "<b>$username</b> $cinsi anketine $num nefer bax&#305;b!<br/>\n";
if($row['level']==9)echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;mod=del&amp;ref=$ref\">Listi temizle</a> -\n";
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Yenile</a><br/>\n";
}
}
if ($num>0)echo $divide;
if ($num==0){
if($id==$nk){
echo "Bu g&#252;n <b>$username</b>, $cinsi sizin anketinize baxan olmay&#305;b.<br/>";
}else {
echo "Bu g&#252;n <b>$username</b>, $cinsi anketine baxan olmay&#305;b.<br/>\n";
}
}
$r = @mysql_query ("Select * from viewanket where myid = '$nk' order by tarix desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['usid'];
$klik=$arr['klik'];

$selec = @mysql_query ("Select * from users where id='".$usid."'");
$ino = mysql_fetch_array ($selec);
$ankete=$ino["ankete"];
if($row['level']==9 or $id==$nk)echo "<a href=\"viewanket.php?mod=user_del&amp;id=$id&amp;ps=$ps&amp;usid=".$usid."&amp;nk=".$nk."&amp;ref=$ref\">[x]</a> - ";
   
if($ankete!='0' and $row["level"]<8)echo ($i).") <b>Gizli</b> (".cc_tarix($arr['tarix'])." - $klik defe)<br/>";
elseif($ankete=='0')echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a>(".cc_tarix($arr['tarix'])." - $klik defe)<br/>";
elseif($ankete!='0' and $row["level"]==9)echo ($i).") <b>Gizli</b> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a>(".cc_tarixay($arr['tarix'])." - $klik defe)<br/>";
}

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $num/10;
$test = round($tes);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($s>1)echo "<br/>";
break;


case 'del':
if($row['level']!=9 and $nk!=$id){
echo "<card id=\"olmaz\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
echo "<card title=\"List Temizlendi!\">\n";

echo "<p align=\"left\">\n";
echo $fsize1;

$query = mysql_query("DELETE FROM `viewanket` WHERE `myid` = '".$nk."';");
if($query)
{
echo "<b>List Temizlendi</b>.<br/>\n";
}
else
{
echo "Sehv ba&#351; verdi!!!<br/>\n";
echo mysql_error()."<br/>\n";
}
break;

case 'user_del':
if($row['level']!=9 and $nk!=$id){
echo "<card id=\"olmaz\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
$selec = @mysql_query ("Select * from users where id='".$usid."'");
$ino = mysql_fetch_array ($selec);
$nik=$ino["user"];
echo "<card title=\"$nik anketden silindi\">\n";

echo "<p align=\"left\">\n";
echo $fsize1;

$query = mysql_query("DELETE FROM `viewanket` WHERE `usid` = '".$usid."';");
if($query)
{
echo "<b>$nik</b> anketden silindi.<br/>\n";
}
else
{
echo "Sehv ba&#351; verdi!!!<br/>\n";
echo mysql_error()."<br/>\n";
}
break;
}
if($mod)echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

echo $divide;

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>";

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>