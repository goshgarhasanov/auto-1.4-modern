<?


header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
$home = $_SERVER["HTTP_HOST"];
echo "<card id=\"help\" title=\"$home Chat+Tanisliq\">\n";
echo "<p align=\"center\">";
echo"<small>Burda Basqa chati reklam eliyen insan ! Anavi soymurem Ana muqeddesdi ! bacivi soymurem cunki oda geleceyin bir anasidi! 1 sayta gore soydurmeye deymez ...</small><br/>";
echo"<img src=\"img/18x.gif\" alt=\"urek\" /><br/>";
echo "<small><b>DiQQeT</b></small><br/>";
echo "<small>Bu sayta yalnız 18 yaşdan yuxarı şexsler daxil ola biler</small><br/>";
echo "<small>ya&#351;&#305;n&#305;z 18 den yuxar&#305;d&#305;r?</small><br/>";
echo $divide;
echo "<small><a href=\"reg.php?$ref\">Beli</a> / <a href=\"index.php?$ref\">Xeyr</a></small><br/>\n";

echo "*****<br/>";

echo "<a href=\"index.php?$ref\">$site</a><br/>\n";

echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
?>