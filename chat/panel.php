<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


if($p_arr['35']!=1 or ($p_arr['105']!=1 and $p_arr['106']!=1 and $p_arr['107']!=1))
{
$_v->title('Olmaz','center');
$_v->fsize1($fsize1);
echo "Daxil Olma Icazeniz Yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$_v->title('Anti-Reklam','left');
$_v->fsize1($fsize1);


$t = mysql_escape_string($_GET['t']);
if(isset($key)){
$key = trim(mysql_escape_string($_GET['key']));
}
switch ($t) {

default:

if($_GET['b']!="")
$issetb = "&amp;b=$b";
else
$issetb=false;

if($_GET['key']!="")
$issetk = "&amp;key=$key";
else
$issetk=false;

if($issetk!=false and $p_arr['107']!=1){
echo "Reklamlar? oxumaq icazeni.<br/>----<br/>\n";
echo "<a href=\"panel.php?id=$id&amp;ps=".$ps.$issetb."&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}


if($b!=1){
if($key!=""){
$query = mysql_query("SELECT COUNT(`banmsg`) FROM `auto_ban_v2` WHERE `banmsg` = '".base64_decode($key)."';");
$all_reklam = @mysql_result($query, 0);
if($all_reklam==0){
echo "Melumat yoxdur.<br/>\n";
break;
}
echo "<i><u>".base64_decode($key)."</u> - qada&#287;an olunmu&#351; s&#246;ze g&#246;re cezalananlar.</i><br/>----<br/>\n";
$num = 12;
@$p = (int)$_GET['p'];
$total = (($all_reklam - 1) / $num) + 1;
$total =  intval($total);
$p = intval($p);
if(empty($p) or $p < 0) $p = 1;
if($p > $total) $p = $total;
$start = $p * $num - $num;

$r = mysql_query ("SELECT * FROM `auto_ban_v2` WHERE `banmsg` = '".base64_decode($key)."' order by `id` desc LIMIT $start,$num;");
while($inf=mysql_fetch_array($r)){
$usid = $inf ["usid"];
$user = $inf ["user"];
$message = $inf ["message"];
$sebeb = $inf ["sebeb"];
$banned = $inf ["banned"];
$banmsg = $inf ["banmsg"];
$time = $inf ["time"];
if($usid!=0)
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$user</a>\n";
echo "$message<br/>\n";
}
echo $divide;
echo "<a href=\"panel.php?id=$id&amp;ps=".$ps.$issetb."&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

}else{
if($b!=1)echo "Reklama g&#246;re |\n"; else echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reklama g&#246;re</a> |\n";
if($b==1)echo "Bana g&#246;re |\n"; else echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=1&amp;ref=$ref\">Bana g&#246;re</a> |\n";
if($row['id']==1){echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;t=2&amp;ref=$ref\">Temizle</a>\n";}
echo "<br/>";
echo $divide;
$query = mysql_query("SELECT COUNT(DISTINCT `banmsg`) FROM `auto_ban_v2`;");
$all_reklam = @mysql_result($query, 0);
if($all_reklam==0){
echo "Melumat yoxdur.<br/>\n";
break;
}


$rond_ref = rand(0,100);
if($rond_ref==1)
{
$query2 = mysql_query("SELECT count(`id`) FROM `auto_ban_v2`;");
$all_reklam2=mysql_fetch_array($query2);
$all_reklam2 = $all_reklam2['0']-2500;
if($all_reklam2>1){
mysql_query("delete from `auto_ban_v2` ORDER BY `id` ASC limit $all_reklam2;")or die(mysql_error());
}
}




$array=array();
$r = mysql_query ("SELECT `banmsg` FROM `auto_ban_v2` ORDER BY `id` DESC;");
while($inf=mysql_fetch_array($r)){
if(!in_array($inf['banmsg'],$array))
$array[] = $inf['banmsg'];
}
$countarray = count($array);
@$p = (int)$_GET['p'];
if($p==0)$pc = 0; else $pc = $p*12;
if($pc>$countarray)
{
$pc=$countarray;
}

$num = 12;
@$p = (int)$_GET['p'];
$total = (($countarray - 13) / $num) + 1;
$total =  intval($total);
$p = intval($p);
if(empty($p) or $p < 0) $p = 1;
if($p > $total) $p = $total;
$start = $p * $num - $num;


for ($i=($pc);$i<=($pc+12);$i++){
if($countarray>$i)
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=".base64_encode($array[$i])."&amp;ref=$ref\">$array[$i]</a><br/>\n";
}

// $r = mysql_query ("SELECT `banmsg` FROM `auto_ban_v2` ORDER BY `id` DESC LIMIT $start,$num;");
// while($inf=mysql_fetch_array($r)){
// $information = $inf['banmsg'];
// if(!in_array($information,$array))
// echo $inf ["id"]."<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=".base64_encode($information)."&amp;ref=$ref\">$information</a><br/>\n";
// $array[] = $information;
// }





}

}
else
{
if($key!=""){
$key = trim(mysql_escape_string($_GET['key']));
$query = mysql_query("SELECT COUNT(`banmsg`) FROM `auto_ban_v2` WHERE `banned` = '".$key."';");
$all_reklam = @mysql_result($query, 0);
if($all_reklam==0){
echo "Melumat yoxdur.<br/>\n";
echo $divide;
echo "<a href=\"panel.php?id=$id&amp;ps=".$ps.$issetb."&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

break;
}
if($key==0)
$bantitlename = "G&#246;ndere bilmeyenler";
elseif($key==1)
$bantitlename = "BAN Olanlar";
elseif($key==2)
$bantitlename = "Silinenler";
elseif($key==3)
$bantitlename = "Tam iqnor";
elseif($key==4)
$bantitlename = "Xaric edilenler";

echo "Qada&#287;an olunmu&#351; s&#246;zlerden <b>".$bantitlename."</b><br/>----<br/>\n";
$num = 12;
@$p = (int)$_GET['p'];
$total = (($all_reklam - 1) / $num) + 1;
$total =  intval($total);
$p = intval($p);
if(empty($p) or $p < 0) $p = 1;
if($p > $total) $p = $total;
$start = $p * $num - $num;

$r = mysql_query ("SELECT * FROM `auto_ban_v2` WHERE `banned` = '".$key."' order by `id` desc LIMIT $start,$num;");
while($inf=mysql_fetch_array($r)){
$usid = $inf ["usid"];
$user = $inf ["user"];
$message = $inf ["message"];
$sebeb = $inf ["sebeb"];
$banned = $inf ["banned"];
$banmsg = $inf ["banmsg"];
$time = $inf ["time"];
if($usid!=0)
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$user</a>\n";
echo "$message<br/>\n";
}
echo $divide;
echo "<a href=\"panel.php?id=$id&amp;ps=".$ps.$issetb."&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

}else{
if($b!=1)echo "Reklama g&#246;re |\n"; else echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reklama g&#246;re</a> |\n";
if($b==1)echo "Bana g&#246;re |\n"; else echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=1&amp;ref=$ref\">Bana g&#246;re</a> |\n";
if($row['id']==1){echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;t=2&amp;ref=$ref\">Temizle</a>\n";}
echo "<br/>";
echo $divide;
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=0&amp;ref=$ref\">Deaktiv</a><br/>\n";
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=1&amp;ref=$ref\">Ban olanlar</a><br/>\n";
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=2&amp;ref=$ref\">Silinenler</a><br/>\n";
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=3&amp;ref=$ref\">Tam iqnor</a><br/>\n";
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;b=$b&amp;key=4&amp;ref=$ref\">Vaxt ile qovulanlar</a><br/>\n";
}
}


$url_for_pstr="panel.php?id=$id&amp;ps=".$ps.$issetb.$issetk."&amp;p=";
if($p - 3 > 0) $p3left = " <a href=\"".$url_for_pstr.($p-3)."&amp;$ref\">".($p-3)."</a> | ";
if($p - 2 > 0) $p2left = " <a href=\"".$url_for_pstr.($p-2)."&amp;$ref\">".($p-2)."</a> | ";
if($p - 1 > 0) $p1left = " <a href=\"".$url_for_pstr.($p-1)."&amp;$ref\">".($p-1)."</a> | ";

if($p + 3 <= $total) $p3right = " | <a href=\"".$url_for_pstr.($p+3)."&amp;$ref\">".($p+3)."</a>";
if($p + 2 <= $total) $p2right = " | <a href=\"".$url_for_pstr.($p+2)."&amp;$ref\">".($p+2)."</a>";
if($p + 1 <= $total) $p1right = " | <a href=\"".$url_for_pstr.($p+1)."&amp;$ref\">".($p+1)."</a>";

if ($total > 1)
{
echo $divide;
echo $p3left.$p2left.$p1left.'<b>'.$p.'</b>'.$p1right.$p2right.$p3right.'<br/>';
}
break;

case '2';
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("DELETE FROM auto_ban_v2");
echo "Antireklam loglari silindi.<br/>";
break;
}
$_v->divide();
if(($issetk==false and $key=="") and $p_arr['105']==1){
echo "&#187;<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;ref=$ref\">Elave Et</a>";
echo "<br/>----<br/>\n";
}

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a> |\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);

?>
