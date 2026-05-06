<?php
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($nk!=""){
$select = @mysql_query ("Select `id`,`user` from `users` where `id`='".$nk."' and `banned`!='2';");
if (mysql_affected_rows() == 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Nick Tap&#305;lmad&#305;. Yeqin Silinib.<br/>";
	echo $divide;
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$inf = mysql_fetch_array ($select);
$nk=$inf["id"];
$username=$inf["user"];

$_v->title('Anketime baxanlar');
$_v->fsize1($fsize1);

echo "<u>24 Saat erzinde anketine baxanlar...</u><br/>\n";
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
echo "Cemi: $num nefer bax&#305;b<br/>\n";
$_v->divide();

$r = mysql_query ("select user,usid from viewanket where myid = '$nk' order by user desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Bu g&#252;n <b>$username</b>, leqebli istifade&#231;inin anketine baxan olmay&#305;b.<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['usid'];
echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a><br/>";
}

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}

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


$_v->divide();
if($rm!="")
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
else
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>";

}else{

$_v->title('Anketime baxanlar');
$_v->fsize1($fsize1);


echo "<u>24 Saat erzinde anketinize baxanlar...</u><br/>\n";
$userm = mysql_query ("select count(id) as num from viewanket where `myid`='".$id."';");
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
echo "Cemi: $num nefer bax&#305;b<br/>---<br/>\n";
mysql_query("UPDATE `users` SET `vanket`='0' WHERE `id` = '".$id."';");
$r = mysql_query ("select user,usid,vanket from viewanket where myid = '$id' order by user desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Bu g&#252;n anketinize baxan olmay&#305;b.<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['usid'];
$vanket=$arr['vanket'];
echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> ( Baxib <b>".$vanket."</b> defe)<br/>";
}

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}

$tes = $num/10;
$test = round($tes);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($s>1)echo "<br/>";

$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
}

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>