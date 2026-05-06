<?

header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


if($row["level"] < 7) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"olmaz\" title=\"Olmaz\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin buna h&#252;ququnuz yoxdur!\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}

if($rm==10) $takep="&amp;rm=$rm&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;rm=$rm&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;rm=$rm&amp;ref=$ref";

if(!isset($go)){

$tp = @mysql_query ("Select topic from rooms where rm = '".$rm."'");
$fm = @mysql_fetch_array($tp);
$topick = $fm["topic"];
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"topic\" title=\"Topiki Deyi&#351;\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Yeni Topik:<br/>\n";
echo $fsize2;
echo "<input name=\"newtop$ref\" maxlength=\"150\" value=\"$topick\" title=\"Yeni Topik\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Deyish!<go href=\"topic.php?go=nt&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\" method=\"post\">\n";
echo "<postfield name=\"newtop\" value=\"$(newtop$ref)\"/>\n";

echo "</go></anchor>";
echo $fsize2;

echo "</p></card></wml>";
mysql_close ($link);
exit;
}

echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"changed\" title=\"Topik Yenilendi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Topik Deyi&#351;dirildi!<br/>----<br/>\n";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";

echo $fsize2;
@$newtop = str_replace(chr("13"), " ", $newtop);
@$newtop = str_replace(chr("10"), " ", $newtop);
@$newtop = str_replace("\\n", " ", $newtop);
@$newtop = trim(" $newtop ");
@$newtop = ereg_replace(" +"," ",$newtop);
@$newtop=substr($newtop,0,150);
@$newtop = str_replace("$", "$$", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = str_replace("", "", $newtop);
@$newtop = HtmlSpecialChars($newtop);
@$newtop = str_replace("\"", "&quot;", $newtop);
@$newtop = str_replace("|", "&#0166;", $newtop);
@$newtop = str_replace("'", "&#8216;", $newtop);
@$newtop = str_replace("\\", "", $newtop);
@$newtop = addslashes($newtop);
mysql_query ("UPDATE rooms SET topic = '".$newtop."' WHERE rm = '".$rm."'");
echo "</p></card></wml>";
mysql_close ($link);
exit;
?>
