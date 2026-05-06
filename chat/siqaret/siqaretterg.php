<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$siqaret=$row['siqaret'];
$user=$row['user'];


$us=$row["user"];
$login=$row["user"];
$level=$row["level"];
$alltraf=$row["alltraf"];

$adm = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$administration = $z["user"];


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"\n'>http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"byq\" title=\"Siqareti tergit\">\n";
echo "<p align =\"center\">\n";
echo $fsize1;
if($siqaret == 0) {echo"Siz siqaret cekmirsiniz!\n"; }
else
{
mysql_query("UPDATE `users` SET `siqaret` ='0' WHERE `id` ='".$id."';");
echo"SIQARETDEN EL CEKDINIZ! TEBRIKLER!<br/>\n";
}
echo"<a href=\"siqaret.php?id=$id&amp;ps=$ps&amp;$ref\">Siqaretler</a><br/>\n";
echo"-<br/>\n";
echo"<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";

$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$time = time();
$topic = "Siqaret";

$post = abs(intval($post));
$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$time = time();
$topicad = "Siqaret sat&#305;&#351;&#305;";
$messagead = "H&#246;rmetli Admin! <b>$us</b> leqebli istifade&#231;i siqareti tergitdi.";
mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$administration."', idwho ='8', message = '".$messagead."', towhom = 'Mr_iLQaR', idtowhom = '1', time = '".$time."', readd = '0', topic = '".$topicad."', date='".$data."'");

echo $fsize2;
echo"</p>\n";
echo"</card>\n";
echo"</wml>\n";
mysql_close($link);
?>
