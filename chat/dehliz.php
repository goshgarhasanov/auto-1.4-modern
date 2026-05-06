<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

ob_start();
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"dehliz\" title=\"Dehlizde\">";
echo "<p align=\"left\">";
echo $fsize1;


$tm=time();

echo "<b>Dehlizde olanlar: </b>\n";
$userm = mysql_query ("select count(id) as num from users where `room`='30' and time > '".$tm."' and inv !='3';");
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
echo "<b>($num)</b><br/>----<br/>";
$r = mysql_query ("select id,user,sex from users where `room` = '30' and time > '".$tm."' and inv !='3' order by time desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "heckim yoxdur.<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$sex=$arr['sex'];
if ($sex==0) $sex=K; else $sex="Q";

echo ($i).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> (<b>$sex</b>)<br/>";
}

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"dehliz.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}

$tes = $num/10;
$test = round($tes);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"dehliz.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($num>10)echo "<br/>";




echo "---<br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Dehliz</a>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>
