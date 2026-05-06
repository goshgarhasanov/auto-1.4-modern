<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$us=$row["user"];
$posts=$row["posts"];

$takep="&amp;rm=$rm&amp;ref=$ref";

$adm = @mysql_query ("Select user,id from users where id='".$nk."' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$sebebkar = $z["user"];
if ($row["posts"]<50) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"STOP\" title=\"STOP\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>$sebebkar</b>, &#350;ikayet etmek &#252;&#231;&#252;n sizin 50 Postunuz olmal&#305;d&#305;r.<br/>Adminleri bo&#351; yere narahat etmek olmaz eks halda siz &#246;z&#252;n&#252;z cezalanars&#305;z\n";
echo "<br/>****<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close($link);
exit;
}

if ($id==$nk) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"STOP\" title=\"STOP\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "&#214;z&#252;n&#252;z haqq&#305;nda &#351;ikayet etmek isteyirsiz?))\n";
echo "<br/>****<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close($link);
exit;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"shikayet\" title=\"&#350;ikayet\">\n";
echo "<p align=\"center\">\n";

switch($go) {

default:


echo $fsize1;
echo "<u>$sebebkar</u>, haqq&#305;nda &#350;ikayet.<br/><u>Qeyd</u>: <i>Sebebsiz &#351;ikayet edenlerin &#246;zleri cezaland&#305;r&#305;l&#305;r!</i>\n";
echo "<br/>****<br/>\n";
echo $fsize2;
echo "<input name=\"sikayet$ref\" maxlength=\"250\" title=\"text\"/><br/>\n";
echo $fsize1;
echo "<b>&#350;ikayet n&#246;v&#252;</b>:<br/>\n";
echo $fsize2;

echo "<select name=\"nov$ref\">\n";
echo "<option value=\"Reklam Edir\">Reklam Edir</option>\n";
echo "<option value=\"Terbiyesiz Nik\">Terbiyesiz Nik</option>\n";
echo "<option value=\"Tehqir,Soyus\">Tehqir,Soyus</option>\n";
echo "<option value=\"Digeri\">Digeri</option>\n";
echo "</select><br/>\n";

echo $fsize1;
echo "<anchor title=\"go\">Ok<go href=\"plaint.php?go=sikay&amp;id=$id&amp;ps=$ps&amp;uid=$nk$takep\" method=\"post\">\n";
echo "<postfield name=\"sikayet\" value=\"$(sikayet$ref)\"/>\n";
echo "<postfield name=\"nov\" value=\"$(nov$ref)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;



case 'sikay':
$adm = @mysql_query ("Select user from users where id='".$uid."' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$sebebkar = $z["user"];

$date = date("d.m.Y [H:i]", mktime(date ("H")+1));
if(empty($sikayet)) $error=$error."<u>Shikayetin neden olduqunu yazmadiniz ))) bele olsa oz nikiviz ban olunar zehmet olmaza neye gore shikayyet etdiyiniz baresinde etrafli qeyd edesiz.</u>\n";

$q = mysql_query("SELECT * FROM `sikayet` WHERE `uid` = '".$uid."';");
if(mysql_num_rows($q) != 0)
{


echo $fsize1;
echo "<u><b>$sebebkar</b>, haqq&#305;nda &#350;ikayet edilib.</u> <br/>&#350;ikayetci tezlikle Admin terefinden yoxlan&#305;lacaq.\n";
echo $fsize2;

break;}

$adm = @mysql_query ("Select user,id from users where id='".$uid."' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$sebebkar = $z["user"];
$uid = $z["id"];

@mysql_query("insert into sikayet values(0,'$id','$uid','$sikayet','$nov','$date');");

echo $fsize1;
echo "<b>Sizin <b>".$sebebkar."</b>, haqq&#305;nda &#351;ikayetiniz qeyd edildi!</b><br/>\n";
echo "<i>Tezlikle Adminstrator <b>".$sebebkar."</b>, haqq&#305;nda tedbir g&#246;recek...</i>\n";
echo $fsize2;
break;
}

echo $fsize1;
echo "<br/>---<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
?>
