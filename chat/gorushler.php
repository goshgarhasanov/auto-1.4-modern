<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


function bricode($text){$text = str_replace("[/b]", "</b>", $text);$text = str_replace("[b]", "<b>", $text);$text = str_replace("[/u]", "</u>", $text);$text = str_replace("[u]", "<u>", $text);$text = str_replace("[/i]", "</i>", $text);$text = str_replace("[i]", "<i>", $text);$text = str_replace("[br]", "<br/>", $text);return $text;}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card title=\"G&#246;r&#252;&#351;ler\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$q = mysql_query("select * from vstrechi order by id desc limit 1;");
$arr = mysql_fetch_array($q);
$muellif = $arr['login'];
$movzu = $arr['title'];
$xeber = $arr['content'];
$teshkilat = $arr['organizatory'];
$tarix = $arr['tarix'];
echo "<b>$movzu</b><br/>-^=^-";
echo $fsize2;
echo "</p>";
echo "<p>\n";
echo $fsize1;

echo bricode($xeber);
echo "<br/>----<br/>";
if($teshkilat!="")echo "Te&#351;kilat&#231;&#305;lar: <u>$teshkilat</u>\n";
echo "<br/>Muellif: <b>$muellif</b>\n";
echo "<br/><b>----</b><br/>";

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>
