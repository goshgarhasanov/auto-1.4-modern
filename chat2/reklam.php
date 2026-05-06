<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $P_ARR) = check_login($link);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";




if($P_ARR[203]==0) {
echo "<card id=\"xeta\" title=\"STOP...\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!<br/>****<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

if($go == "del" and $P_ARR[236]==1) {
mysql_query ("TRUNCATE `reklam`");
echo "<card id=\"delete\" title=\"Silindi.\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "B&#252;t&#252;n Mesaj ve Mektub Reklamlar&#305; silindi.<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}



if($bol == "1"){
if(isset($_POST['nick']))$nick = $_POST['nick']; else $nick = $_GET['nick'];
$latuser=strtolower($nick);
$query = mysql_query('select COUNT(id) FROM users WHERE (`latuser` LIKE "%'.$latuser.'%") or (`id`= "'.$nick.'");');
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$sorgu = mysql_query("SELECT * FROM `users` WHERE (`latuser` LIKE '%".$latuser."%') or (`id`= '".$nick."') order by time ASC limit $o,$do;");


if($all=="0"){
echo "<card id=\"a_not\" title=\"Tap&#305;lmad&#305;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"reklam.php?go=tap&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reklamlar</a><br/>\n";
}
else
{

echo "<card id=\"a_ok\" title=\"Tap&#305;lanlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "\"<b>$nick</b>\" <u>S&#246;z&#252;ne ox&#351;ar leqebler</u>:<br/>----<br/>\n";

echo "Tap&#305;ld&#305; \"<b>$all</b>\" nefer:<br/>****<br/>\n";

for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($sorgu);
$u_user = $a ["user"];
$sex = $a ["sex"];
$u_id = $a ["id"];
if($sex==0){$cins = "Ki&#351;i";} else {$cins = "Qad&#305;n";}
echo $i.") <a href=\"reklam.php?id=$id&amp;ps=$ps&amp;nk=$u_id&amp;ref=$ref\">$u_user</a>-$cins<br/>";
}
echo "****<br/>";

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"reklam.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;nick=$nick&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $all/10;
$test = round($tes);

if ($test>$s) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " | <a href=\"reklam.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;nick=$nick&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($all>10))echo "<br/>";
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

}
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}



if($go == "tap") {
echo "<card id=\"axtar\" title=\"Axtar&#305;&#351;.\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Leqeb / ID:</b><br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"Axtar&#305;&#351;\"/><br/>\n";
echo $fsize1;
echo "<anchor>Axtar<go href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"bol\" value=\"1\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>----<br/><a href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">-Admin Panel-</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

if($rm!="")$takep2="&amp;rm=$rm&amp;ref=$ref";
else
$takep2="&amp;ref=$ref";



echo "<card title=\"Reklamlar...\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

if(empty($act)) {
if($nk!="")
$query = mysql_query("select COUNT(klu4) from `reklam` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7';");
else
$query = mysql_query("select COUNT(klu4) from `reklam` where idwho != '0' and idwho != '7';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/15)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*15)+1;
$do=$s*15;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
if($nk!="")
$q = mysql_query("select * from `reklam` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7' order by time desc limit $o,$do;");
else
$q = mysql_query("select * from `reklam` where idwho != '0' and idwho != '7' order by time desc limit $o,$do;");


if($nk!=""){
$us = mysql_query("select * from users where id = '".$nk."';");
if (mysql_affected_rows() == 0) {
echo "<b>Niki Bazadan Silinib</b>: leqebine aid Reklamlar (<b>$all</b>)<br/>*****<br/>";
}else{
$a = mysql_fetch_array($us);
echo "<b>".$a['user']."</b> - leqebine aid Reklamlar: (<b>$all</b>)<br/>*****<br/>";
}
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps$takep2\">&#220;mumi Reklamlar</a><br/>----<br/>\n";
}else{
echo "<b>Reklamlar</b>: (<b>$all</b>)<br/>*****<br/>";
echo "<a href=\"reklam.php?go=tap&amp;id=$id&amp;ps=$ps$takep2\">Axtar</a> |\n";
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps$takep2\">Yenile</a>";
if($P_ARR[236]==1){echo " | <a href=\"reklam.php?go=del&amp;id=$id&amp;ps=$ps$takep2\">Temizle</a><br/>";}else{echo "<br/>";}
echo "----<br/>\n";

}

if($do==0){
echo "<i>Reklamlar yoxdur.</i><br/>\n";
}else{
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$kim=$arr['who'];
$kime=$arr['towhom'];
$mesag=$arr['message'];
$read = $arr["readd"];
$klu4 = $arr["klu4"];
$idtowhom = $arr["idtowhom"];
$idwho = $arr["idwho"];

print " <b>$i)</b>-<i><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idwho$takep2\">".$kim."</a></i> &#187; <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idtowhom$takep2\">".$kime."</a>";
print "<b>|&gt;</b>".$mesag."";
if($P_ARR[236]==1)echo "[<a href=\"reklam.php?act=".$klu4."&amp;id=$id&amp;ps=$ps&amp;s=$s$takep2&amp;nk=$nk\">x</a>]";
echo "<br/>\n";

}
}
echo "----<br/>";

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*15)+1;
$do=$prev*15;
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;s=$prev$takep2&amp;nk=$nk\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/15;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*15)+1;
$do=$next*15;
if($do>$all)$do=$all;
echo " |  <a href=\"reklam.php?id=$id&amp;ps=$ps&amp;s=$next$takep2&amp;nk=$nk\">$do&gt;&gt;</a>\n";
echo "<br/>";
}elseif($s>1) {
echo "<br/>";
}
if($all>15)echo "<br/>";



echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep2\">Dehliz</a><br/>\n";

}

else {
mysql_query ("delete from `reklam` where klu4 = '".$act."'");
echo "<u>Silindi</u>...<br/>";
echo $divide;
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;s=$s$takep2&amp;nk=$nk\">Geri Qay&#305;t</a><br/>";
}



echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>