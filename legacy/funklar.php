<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
$ref=rand(10000,1000000);
require("ay.php");
$link = connect_db();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"index\" title=\"SuPeR FunksiyalaR\">\n";
echo "<p align=\"center\" mode=\"wrap\">\n";
echo "<small>";
print "<b>Xidmetlerimiz istifadenizde!!</b><br/>******<br/>";
echo "<a href=\"zng.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Zeng Xidmeti</b></a><br/>\n";

echo "<a href=\"bank.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><u>Bank SiSTemi</u></a><br/>\n";
echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>SuPeR Nik</b></a><br/>\n";
echo "<a href=\"siqaret/siqaret.php?ver=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>SiQaR Al</b></a><br/>";
echo "<a href=\"qepiy.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>QePiY AL</b></a><br/>\n";

echo "</small>";

echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

echo "</p></card></wml>";
mysql_close ($link);

?>

