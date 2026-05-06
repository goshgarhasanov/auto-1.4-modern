<?php

error_reporting(0);
header("Cache-control: no-cache");
header("Content-type: text/vnd.wap.wml");
include("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$nocache = rand(10000, 99999);


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"Magaza\">


<p align=\"left\">\n";

echo "&#187;<a href=\"siqaretterg.php?id=$id&amp;ps=$ps\">Siqareti tergit</a><br/>- - -<br/>\n";
echo"<small>Siqaretler</small><br/>";

echo "<img src=\"kent.jpg\" alt=\"kent\"/>";
echo"<small>|<a href=\"kent.php?id=$id&amp;ps=$ps&amp;ver=wml\">Kent</a> - 150 bal</small><br/>\n";


echo "<img src=\"west.jpg\" alt=\"west\"/>";
echo"<small>|<a href=\"west.php?id=$id&amp;ps=$ps&amp;ver=wml\">West</a> - 160 bal</small><br/>\n";


echo "<img src=\"winston.jpg\" alt=\"winston\"/>";
echo"<small>|<a href=\"winston.php?id=$id&amp;ps=$ps&amp;ver=wml\">Winston</a> - 170 bal</small><br/>\n";


echo "<img src=\"kentqara.jpg\" alt=\"kentqara\"/>";
echo"<small>|<a href=\"kentqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Kent Qara</a> - 180 bal</small><br/>\n";


echo "<img src=\"davidoffqara.jpg\" alt=\"davidoffqara\"/>";
echo"<small>|<a href=\"davidoffqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Davidoff Qara</a> - 190 bal</small><br/>\n";

echo "<img src=\"davidoffqirmizi.jpg\" alt=\"davidoffqirmizi\"/>";
echo"<small>|<a href=\"davidoffqirmizi.php?id=$id&amp;ps=$ps&amp;ver=wml\">Davidoff Qirmizi</a> - 200 bal</small><br/>\n";


echo "<img src=\"marlboro.jpg\" alt=\"marlboro\"/>";
echo"<small>|<a href=\"marlboro.php?id=$id&amp;ps=$ps&amp;ver=wml\">Marlboro</a> - 210 bal</small><br/>\n";


echo "<img src=\"marlboroqara.jpg\" alt=\"marlboroqara\"/>";
echo"<small>|<a href=\"marlboroqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Marlboro Qara</a> - 220 bal</small><br/>\n";
echo"<br/>";



echo"&#187;<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ver=wml\">Dehliz</a><br/>\n";
echo "<br/>\n";

echo "</p></card></wml>";



?>
