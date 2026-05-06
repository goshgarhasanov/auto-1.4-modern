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
echo "<card title=\"Gel Ay Musteri:)\">

<p align=\"center\">\n";
echo "<a href=\"siqaretterg.php?id=$id&amp;ps=$ps\">Siqareti Tergit</a> 0 Bal<br/>\n";
echo"<small><b>Siz Buradan Buccenize Uyqun Siqaret Alib Ceke Bilersiniz...En Azindan Realda Alib Ceke Bilmediyiniz Siqareti Burada Alib Rahat Cekin :)</b></small><br/>\n";

echo"<small>~~~~~~~~~~~~~~~~</small><br/>";
echo"<small>Gel Ay Musteri......:)</small><br/>";
echo"<small><a href=\"kent.php?id=$id&amp;ps=$ps&amp;ver=wml\">Kent</a>] - 150 bal</small><br/>\n";
echo"<small><a href=\"west.php?id=$id&amp;ps=$ps&amp;ver=wml\">West</a>] - 160 bal</small><br/>\n";
echo"<small><a href=\"winston.php?id=$id&amp;ps=$ps&amp;ver=wml\">Winston</a>] - 170 bal</small><br/>\n";
echo"<small><a href=\"kentqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Kent Qara</a>] - 180 bal</small><br/>\n";
echo"<small><a href=\"davidoffqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Davidoff Qara</a>] - 190 bal</small><br/>\n";
echo"<small><a href=\"davidoffqirmizi.php?id=$id&amp;ps=$ps&amp;ver=wml\">Davidoff Qirmizi</a>] - 200 bal</small><br/>\n";
echo"<small><a href=\"senator.php?id=$id&amp;ps=$ps&amp;ver=wml\">ffffffff</a>] - 210 bal</small><br/>\n";
echo"<small><a href=\"marlboroqara.php?id=$id&amp;ps=$ps&amp;ver=wml\">Marlboro Qara</a>] - 220 bal</small><br/>\n";
echo"<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ver=wml\">Dehliz</a><br/>\n";
echo "<a href=\"../on.php?id=$id&amp;ps=$ps&amp;ver=wml\">Tanisliq</a><br/>\n";
echo "</p></card></wml>";



?>