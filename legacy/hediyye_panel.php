<?php
error_reporting(0);
header("Cache-Control: no-cache");
if (isset ($ver)) header("Content-Type:text/html; charset=UTF-8");
else header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($row["level"]<=8) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"error\" title=\"Xeta\" ontimer=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"15\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin <b>Admin Panele</b> giri&#351; icazeniz yoxdur.\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit();
}

if (isset ($ver)) {
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
echo "<head><link rel=\"stylesheet\" type=\"text/css\" href=\"css/css.css\"/>";
echo "<title>Hediyye Paneli</title>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/></head>";
echo "<body bgcolor=\"#F7EDCE\" link=\"blue\" vlink=\"blue\" text=\"black\">";
echo "<div align=\"left\">";
}else{ 
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"apanel\" title=\"Hediyye Paneli\">\n";
echo "<p mode=\"wrap\">\n";
}


switch($go) {

default:
echo $fsize1;
if(isset($HTTP_GET_VARS['nov'])) {$nov = $HTTP_GET_VARS['nov'];}
if($nov=="") {
echo "<b>Hediyyeler</b><br/>";
echo $divide;
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;nov=sade\">Sade hediyyeler</a><br/>\n";
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;nov=maraqli\">Maraql&#305; hediyyeler</a><br/>\n";
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;nov=xususi\">X&#252;susi hediyyeler</a><br/>\n";
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;nov=bahali\">Bahal&#305; hediyyeler</a><br/>\n";
}else{

$small = mysql_query("SELECT COUNT(*)  FROM `st_hediyye` WHERE `nov` = '".$nov."';");
$num = mysql_result($small, 0);

if(empty($page)) $page=0;
$max=5;
$total_pages=ceil($num/$max);
$max_pages=($total_pages-1)*5;
$printm=mysql_query("select * from `st_hediyye` WHERE `nov` = '".$nov."' order by sira asc limit ".$page.",".($max)."");

$yazi = $nov." hediyyeler";
echo "<b>".ucfirst($yazi)."</b><br/>";

if($num=="0") {
echo "Smayl m&#246;vcud deyil.<br/>\n";
}else{
while($arr = @mysql_fetch_array($printm)) {
$sira = $arr["sira"];
$klu4 = $arr["klu4"];
$adi = $arr["adi"];
$nov = $arr["nov"];

echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;go=sil_hediyye&amp;klu4=$klu4&amp;ref=$ref\">[X]</a> <img src=\"hediyye/".$sira.".gif\" alt=\".$adi.\"/> <b>".$adi."</b><br/>";
}

$page_number=$num*$max;
$next_page=$page+5;
$last_page=$page-5;
$go_page=$p*5;
$page_number=$num*$max;
if($next_page>5) {
print "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;page=$last_page&amp;nov=$nov\">&lt;&lt;&lt;</a><br/>";
}
if($num>$next_page) {
print "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;page=$next_page&amp;nov=$nov\">&gt;&gt;&gt;</a><br/>";
}
}
}
echo $fsize2;
break;

case 'sil_hediyye':
echo $fsize1;

$small = mysql_query ("select count(klu4) as num from st_hediyye");
$sm = mysql_fetch_array($small);
$num = $sm["num"];

$select = @mysql_query ("Select * from st_hediyye where klu4='".$klu4."'");
$inf = mysql_fetch_array ($select);
$sira = $inf["sira"];

unlink ("hediyyeler/".$sira.".gif");

if(isset($HTTP_GET_VARS['klu4'])) {$klu4 = $HTTP_GET_VARS['klu4'];}
if($num=="1") {
echo "Bazada en az&#305; 1 smayl qalmal&#305;d&#305;r!<br/>\n";
}else{
$q = mysql_query("DELETE FROM `st_hediyye` WHERE `klu4` = '".$klu4."';");
echo "Smayl silindi...<br/>\n";
}
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;go=smiles&amp;ref=$ref\">Bazadak&#305; smayllar</a><br/>\n";

echo $fsize2;
break;

case 'add':
echo $fsize1;

if(empty($action)) {
echo "<form ENCTYPE=\"multipart/form-data\" action=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;go=add&amp;ver=html\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>\n";
echo "<b>Hediyyenin ad&#305;:</b><br/>\n";
echo "<input type=\"text\" name=\"text\" /><br/>\n";
echo "<b>Hediyye (.gif):</b><br/>\n";
echo "<INPUT NAME=\"file\" TYPE=\"file\" SIZE=\"23\"><br/>\n";
echo "<b>N&#246;v:</b> \n";
echo "<select name=\"nov\">";
echo "<option value=\"sade\">Sade</option>\n";
echo "<option value=\"maraqli\">Maraqli</option>\n";
echo "<option value=\"xususi\">Mususi</option>\n";
echo "<option value=\"bahali\">Bahali</option>\n";
echo "</select><br/>\n";

echo "<input type=\"submit\" name=\"action\" value=\"Yukle\">\n";
echo "</form>\n";

}else{

if(empty($text)) {
echo "<b>Hediyyenin ad&#305;n&#305; yazmad&#305;n&#305;z.</b><br/>";
break;
}

if(empty($file)) {
echo "<b>Hediyyenin y&#252;klemediniz.</b><br/>";
break;
}


$size = filesize($file);
$par = GetImageSize($file); 

$h_baza = mysql_query("SELECT * FROM `st_hediyye` order by klu4 desc limit 1;");
$h_oxu = mysql_fetch_array($h_baza);
$axrinci = $h_oxu['klu4'];
$next_id = $axrinci + 1;

if($par[2]==1)$foto = $next_id.".gif"; //gif

if($par[2]!=1){
echo "<b>Hediyye GIF format&#305;nda olmal&#305;d&#305;r.</b><br/>";
break;
}

if($size>100240){
echo "<b>Hediyyenin hecmi 100 KB-den &#231;ox olmamal&#305;d&#305;r.</b><br/>";
break;
}

mysql_query("Insert into st_hediyye set sira = '".$next_id."', adi = '".$text."', nov = '".$nov."'");

Copy($file, "hediyye/".basename($foto));
echo "<b>Hediyye elave olundu.</b><br/>\n";
}
echo $fsize2;
break;

}

echo $fsize1;
echo $divide;
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;go=add&amp;ver=html&amp;r=$ref\">Elave et</a><br/>\n";
echo $divide;
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyyeler</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
if (isset ($ver)) {
echo "</div></body></html>";
}else{ 
echo "</p></card></wml>";
}
?>
