<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"enter\" title=\"Kazino Oyunu\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<small>Sevdiyiniz Oyuna daxil olub,postlarinizi artira bilersiniz!!!<br/>---<br/><a href=\"./games/21.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Kart 21</a><br/>";
echo "<a href=\"./games/kosti.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Zer at</a><br/>";
echo "<a href=\"./games/777.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Barabani Firla</a><br/>";
print "<a href=\"./games/naperstki.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Oymaqi Tap</a><br/>";
print "<a href=\"./games/ugadaika.php?id=$id&amp;ps=$ps&amp;ref=$ref\">1-den 9-a</a><br/>";
echo "---<br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a></small>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>