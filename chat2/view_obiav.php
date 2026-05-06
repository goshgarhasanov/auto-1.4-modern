<?php
header('Cache-Control: no-store, no-cache, must-revalidate');	// HTTP/1.1
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$q=@mysql_query("select content,title,login from obiav where id='".$mid."' order by id desc;");
$arr=@mysql_fetch_array($q);
$title=$arr['title'];
function bricode($text){$text = str_replace("[/b]", "</b>", $text);$text = str_replace("[b]", "<b>", $text);$text = str_replace("[/u]", "</u>", $text);$text = str_replace("[u]", "<u>", $text);$text = str_replace("[/i]", "</i>", $text);$text = str_replace("[i]", "<i>", $text);$text = str_replace("[br]", "<br/>", $text);return $text;}


echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card title=\"".$title."\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>$title</b>\n";
echo $fsize2;
echo "</p>\n";
echo "<p>\n";

echo $fsize1;
echo bricode($arr['content']);
echo "<br/>----<br/><u>M&#252;ellif:</u> <b>".$arr['login']."</b><br/>";
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>
