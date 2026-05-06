<?

header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($id !="1"){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Bura Girmeye icazeniz yoxdur.<br/>";
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"exchange\" title=\"Anti Reklam\">";
echo "<p align=\"left\">";


echo $fsize1;
echo "Qadaqan edilmi&#351; s&#246;zlerin elave edilmesi.<br/>\n";
echo $divide;

switch($y){
case 'add':

if(!isset($_POST['action']))
{
echo "N&#246;v: \n";
echo "<select name=\"nov\">\n";
echo "<option value=\"0\">Reklam</option>\n";
echo "<option value=\"1\">S&#246;y&#252;&#351;</option>\n";
echo "</select><br/>\n";

echo "S&#246;z:<br/>\n";
echo "<input name=\"message\" value=\"$message\" title=\"S&#246;z\"/><br/>\n";
echo "<anchor title=\"go\">Elave et<go href=\"arek.php?y=add&amp;bol=soyus&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"message\" value=\"$(message)\"/>\n";
echo "<postfield name=\"nov\" value=\"$(nov)\"/>\n";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor><br/>\n";
}else{
$message = str_replace("|", "", $message);
$sebeb = str_replace("|", "", $sebeb);
if(empty($message)){
$error='Xana bo&#351; qaldi.<br/>';
}
if($error){
echo $error;
}else{
echo "<a href=\"arek.php?y=add&amp;id=$id&amp;ps=$ps&amp;amp;$ref\">Elave et</a><br/><br/>";
echo "Elave olundu<br/>\n";
if($nov==1){
$query = mysql_query("INSERT INTO `a_reklam` SET `message` = '".$message."', `type` = '0';");
}else{
$query = mysql_query("INSERT INTO `a_reklam` SET `message` = '".$message."', `type` = '1';");
}
}
}
break;
default:
if($act==del){
mysql_query("DELETE FROM `a_reklam` WHERE `id` = '".$sid."' LIMIT 1;");
}
$yusif=mysql_query("select * from `a_reklam`");
$all = @mysql_result($yusif, 0);
if($all<1){
echo "<u>Siz hecbir s&#246;z&#252; qada&#287;an etmemisiz.</u><br/>----<br/>";
echo "<a href=\"arek.php?y=add&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Elave et</a><br/>";
}else{
echo "<a href=\"arek.php?y=add&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Elave et</a><br/><br/>";
$num = 5;
@$page = (integer)$_GET['page'];
$result00 = mysql_query( "SELECT COUNT(*) FROM `a_reklam`;");
$temp = mysql_fetch_array( $result00 );
$posts = $temp[0];
$total = ( $posts - 1 ) / $num + 1;
$total = intval( $total );
$page = intval( $page );
if ( empty( $page ) || $page < 0 )
{
$page = 1;
}
if ( $total < $page )
{
$page = $total;
}
$start = $page * $num - $num;
$q = mysql_query("SELECT * FROM `a_reklam` ORDER BY `id` DESC LIMIT $start, $num;");
while ($arr = mysql_fetch_array($q)) {
$sid = $arr["id"];
$soz = $arr["message"];
$why = $arr["sebeb"];
$select = mysql_query ("Select * from `a_reklam` where `message` = '".$soz."'");
$inf = mysql_fetch_array ($select);
$tip = $inf["type"];
if($tip==0){$kk="S&#246;y&#252;&#351;";}else{$kk="Reklam";}
echo "[$kk] - $soz - ";
echo "[<a href=\"arek.php?act=del&amp;id=$id&amp;ps=$ps&amp;sid=$sid&amp;ref=$ref\">x</a>] ";
echo "<br/>";
}
$url_for_pstr = "arek.php?id=$id&amp;ps=$ps&amp;page=";
if ( 0 < $page - 1 )
{
$nazad = ( "<a href=\"".$url_for_pstr.( $page - 1 ) )."&amp;ref={$ref}\">&#171;&#171;--</a> l ";
echo "$nazad";
}
if ( $page + 1 <= $total )
{
$vpered = ( "<a href=\"".$url_for_pstr.( $page + 1 ) )."&amp;ref={$ref}\">--&#187;&#187;</a><br/>";
echo "$vpered";
}else{ echo "<br/>";}
}
break;
case 'change':
if (!isset($_POST['action']))
{
echo "Ceza n&#246;v&#252;<br/><br/>";
echo "Reklam Edenler &#252;&#231;&#252;n<br/>";
echo "<select name=\"reklam\">\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "</select><br/>\n";
echo "Sebeb:<br/>\n";
echo "<input name=\"sebeb\" value=\"$sebeb\" title=\"Sebeb\"/><br/>\n";
echo $divide;
echo "S&#246;y&#252;&#351; s&#246;yenler &#252;&#231;&#252;n<br/>";
echo "<select name=\"soyus\">\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "</select><br/>\n";
echo "Sebeb:<br/>\n";
echo "<input name=\"sebebb\" value=\"$sebebb\" title=\"Sebeb\"/><br/>\n";
echo "<anchor title=\"go\">Qeyd et<go href=\"arek.php?y=change&amp;id=$id&amp;ps=$ps$takep\" method=\"post\">";
echo "<postfield name=\"reklam\" value=\"$(reklam)\"/>";
echo "<postfield name=\"sebeb\" value=\"$(sebeb)\"/>";
echo "<postfield name=\"soyus\" value=\"$(soyus)\"/>";
echo "<postfield name=\"sebebb\" value=\"$(sebebb)\"/>";
echo "<postfield name=\"action\" value=\"add\"/>\n";
echo "</go></anchor><br/>";
}else{
$reklam = HtmlSpecialChars($reklam);
$sebeb = HtmlSpecialChars($sebeb);
$soyus = HtmlSpecialChars($soyus);
$sebebb = HtmlSpecialChars($sebebb);
echo "Qur&#287;ulara d&#252;zeli&#351; edildi<br/>\n";
@$saxla = @fopen( "file/dat_folder/arek.dat", "w" );
$yusif .= "$reklam\n";
$yusif .= "$sebeb\n";
$yusif .= "$soyus\n";
$yusif .= "$sebebb\n";
@fwrite($saxla,"{$yusif}");
@fflush($saxla);
@fclose($saxla);
}
break;
}
echo $divide;
echo "<a href=\"arek.php?y=change&amp;id=$id&amp;ps=$ps&amp;amp;$ref\">Qur&#287;ular</a><br/>";
echo "<a href=\"arek.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Anti Reklam</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Dehliz</a>";
echo $fsize2;

echo "</p></card></wml>";
mysql_close ($link);

?>