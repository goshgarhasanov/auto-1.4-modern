<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$P_ARR) = check_login($link);

if($P_ARR[5]!=1){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"error\" title=\"Xeta\" ontimer=\"index.php?ref=$ref\"><timer value=\"15\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin <u>Shikayet</u>-leri yoxlamaqa icazeniz yoxdur:)\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"sikayet\" title=\"&#350;ikayet\">\n";
echo "<p mode=\"wrap\">\n";
echo $fsize1;

$q = mysql_query("select * from `sikayet` order by `id` desc;");
if (mysql_affected_rows() == 0) {
print "Yeni &#350;ikayyet yoxdur halald&#305; vezifelilere:)<br/>----<br/>\n";
} else {
if(empty($d)) {
echo "<b>Ећikayyetler</b>, (<a href=\"s_c.php?id=$id&amp;ps=$ps&amp;d=all&amp;ref=$ref\">xXx</a>)<br/>----<br/>\n";

while($arr=mysql_fetch_array($q)) {


$s = mysql_query("select * from `users` where `id`='".$arr["us"]."';");
$a=mysql_fetch_array($s);
$sikayyetci = $a["user"];

$q = mysql_query("select * from `users` where `id`='".$arr["uid"]."';");
$b=mysql_fetch_array($q);
$cinayetkar = $b["user"];

print "".$arr["id"].") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$a['id']."\">$sikayyetci</a> - &#350;ikayet edir: (<b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$b['id']."\">$cinayetkar</a></b>) nikinden: <u>Sebeb</u> - <b>".$arr["nov"]."</b>, <br/><b>Qeyd</b>: <i>".$arr['sikayet']."</i> [<a href=\"s_c.php?d=del&amp;id=$id&amp;ps=$ps&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>----<br/>\n";
}
}elseif($d=='all') {
mysql_query("TRUNCATE TABLE `sikayet`;");
print "<b>&#350;ikayetler silindi!</b><br/>\n";
echo "----<br/>\n";
}else{
if(mysql_query("delete from sikayet where id='$mid' limit 1;")){
print "<b>&#350;ikayet silindi!</b><br/>\n";
echo "----<br/><a href=\"s_c.php?id=$id&amp;ps=$ps&amp;r=$ref\">&#350;ikayetler</a><br/>\n";
}
}
}

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
?>