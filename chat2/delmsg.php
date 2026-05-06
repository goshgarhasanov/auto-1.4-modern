<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

switch($mod) {
case 'delall':
if (isset($go)){
mysql_query ("update zapiski set insend = '0' WHERE idwho = '".$id."'");
mysql_query ("update zapiski set ininc = '0' WHERE idtowhom = '".$id."'");
mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0')");
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"deleted\" title=\"Silindi!\" ontimer=\"chatmail.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "B&#252;t&#252;n mesajlar silindi!\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
exit;
}
if (!ctype_digit($im)) { header("Location: index.php"); die; }
$r = mysql_query ("Select idtowhom,idwho from zapiski WHERE klu4 = '".$im."' ");
$a = mysql_fetch_array($r);
if ((mysql_affected_rows() != 0)&&(($a["idtowhom"]==$id)||($a["idwho"]==$id))){
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
if (isset($ininc)) echo "<card id=\"deleted\" title=\"Silindi\" ontimer=\"inbox.php?s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
else echo "<card id=\"deleted\" title=\"Silindi\" ontimer=\"outbox.php?s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Mesaj silindi!\n";
echo $fsize2;
if (isset($insend)) mysql_query ("update zapiski set insend = '0' WHERE klu4 = '".$im."' ");
if (isset($ininc)) mysql_query ("update zapiski set ininc = '0' WHERE klu4 = '".$im."' ");
mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0')");
echo "</p></card></wml>\n";
mysql_close ($link);
} else {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"error\" title=\"Sehv\" ontimer=\"chatmail.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Bu mesaj ya sizin deyil, ya da mevcud deyil.\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
}
break;

case 'delusermsg':
settype($usid, 'integer');
$select = mysql_query ("select id,user from users where id = '".$usid."'");
$rows = mysql_fetch_array ($select);
$user = $rows["user"];
if (isset($insend)) mysql_query ("update zapiski set insend = '0' WHERE idwho = '".$id."' and idtowhom = '".$usid."'");
if (isset($ininc)) mysql_query ("update zapiski set ininc = '0' WHERE idtowhom = '".$id."' and idwho = '".$usid."'");
mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0') and idtowhom = '".$id."'");
echo $xml;
echo $dtd;
echo "<wml>\n";
if (isset($ininc)) echo "<card id=\"deleted\" title=\"Silindi\" ontimer=\"inbox.php?s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
else echo "<card id=\"deleted\" title=\"Silindi\" ontimer=\"outbox.php?s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"10\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>".$user."</b>-den gelen b&#252;t&#252;n mesajlar silindi!\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
break;
}
?>
