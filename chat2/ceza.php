<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$P_ARR) = check_login($link);


if($P_ARR[1]!=1 or ($P_ARR[81]!=1 and $P_ARR[82]!=1 and $P_ARR[83]!=1 and $P_ARR[84]!=1 and $P_ARR[85]!=1 and $P_ARR[86]!=1 and $P_ARR[87]!=1 and $P_ARR[88]!=1)){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"xeta\" title=\"Olmaz\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin bu b&#246;lmeye icazeniz yoxdur!\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

$us=$row["user"];

if(isset($nk)){
$select = @mysql_query ("Select * from users where id='".$nk."'");
} else {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = mysql_query ("Select * from users where latuser = '".$latuser."'");
}
if (mysql_affected_rows() == 0) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>\n";
if(isset($rm)){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
}else{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

$inf = mysql_fetch_array ($select);
$pid = $inf["id"];
$level = $inf["level"];
$password = $inf["pass"];
$nick = $inf["user"];
$us_soft = $inf["user_soft"];
$us_ip = $inf["user_ip"];
$reg_status = $inf['reg_status'];

if(isset($_GET["mkdel"]) and $level<$row["level"] and $P_ARR[19]==1){
@mysql_query("delete from zapiski WHERE idwho = '".$nk."' or idtowhom = '".$nk."'");
wmlpage("OK!..","Qeyd etdiyiniz nikin butun mektublari silindi..<br/>----<br/><anchor>&#171; Geri Qay&#305;t<prev/></anchor>");
}
if(isset($_GET["msdel"]) and $level<$row["level"] and $P_ARR[20]==1){
@mysql_query("delete from mesaj WHERE idwho = '".$nk."' or idtowhom = '".$nk."'");
wmlpage("OK!..","Qeyd etdiyiniz nikin butun mesajlari silindi..<br/>----<br/><anchor>&#171; Geri Qay&#305;t<prev/></anchor>");
}
if(isset($_GET["rmdel"]) and $level<$row["level"] and $row['delmsg']==1){
$i=0;
while($i <= 10){
@mysql_query("delete from room{$i} WHERE usid = '".$nk."'");
$i++;
}
wmlpage("OK!..","Qeyd etdiyiniz nikin butun otaq mesajlari silindi..<br/>----<br/><anchor>&#171; Geri Qay&#305;t<prev/></anchor>");
}


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"minip\" title=\"Mini Panel\" >\n";
echo "<p align =\"left\">\n";
echo $fsize1;

echo "Leqeb: <u>$nick</u><br/>\n";

echo $divide;
if(($row["level"]>=$level) or ($row["level"]==9)){
echo "<b>Diqqet</b>: Sebebsiz yere xaric etmeyin.<br/>----<br/>";
echo $fsize2;

if($P_ARR[81]==1 and ($P_ARR[170]==1 or $P_ARR[171]==1 or $P_ARR[172]==1 or $P_ARR[173]==1 or $P_ARR[174]==1 or $P_ARR[175]==1 or $P_ARR[176]==1 or $P_ARR[177]==1 or $P_ARR[178]==1 or $P_ARR[179]==1 or $P_ARR[180]==1 or $P_ARR[181]==1 or $P_ARR[182]==1 or $P_ARR[183]==1 or $P_ARR[184]==1 or $P_ARR[185]==1 or $P_ARR[186]==1 or $P_ARR[187]==1 or $P_ARR[188]==1)){
echo $fsize1;
echo "Vaxt Se&#231;in<br/>\n";
echo $fsize2;
echo "<select name=\"wtime$ref\">\n";
if($P_ARR[170]==1)
echo "<option value=\"0\">Qaytar</option>\n";
if($P_ARR[171]==1)
echo "<option value=\"5\">5 deqiqe </option>\n";
if($P_ARR[172]==1)
echo "<option value=\"15\">15 deqiqe </option>\n";
if($P_ARR[173]==1)
echo "<option value=\"30\">30 deqiqe </option>\n";
if($P_ARR[174]==1)
echo "<option value=\"45\">45 deqiqe </option>\n";
if($P_ARR[175]==1)
echo "<option value=\"60\">1 Saat </option>\n";
if($P_ARR[176]==1)
echo "<option value=\"120\">2 Saat </option>\n";
if($P_ARR[177]==1)
echo "<option value=\"180\">3 Saat </option>\n";
if($P_ARR[178]==1)
echo "<option value=\"300\">5 Saat </option>\n";
if($P_ARR[179]==1)
echo "<option value=\"1440\">1 Gun </option>\n";
if($P_ARR[180]==1)
echo "<option value=\"2880\">2 Gun </option>\n";
if($P_ARR[181]==1)
echo "<option value=\"4320\">3 Gun </option>\n";
if($P_ARR[182]==1)
echo "<option value=\"7200\">5 Gun </option>\n";
if($P_ARR[183]==1)
echo "<option value=\"21600\">15 Gun </option>\n";
if($P_ARR[184]==1)
echo "<option value=\"28800\">20 GГјn </option>\n";
if($P_ARR[185]==1)
echo "<option value=\"43200\">30 Gun </option>\n";
if($P_ARR[186]==1)
echo "<option value=\"64800\">45 Gun </option>\n";
if($P_ARR[187]==1)
echo "<option value=\"86400\">60 Gun </option>\n";
if($P_ARR[188]==1)
echo "<option value=\"129600\">90 Gun </option>\n";
echo "</select><br/>\n";
}
echo $fsize1;
echo "<b>Sebeb:</b><br/>\n";
echo $fsize2;
echo "<input name=\"whykik$ref\" maxlength=\"100\" title=\"Sebeb yaz&#305;n\"/><br/>\n";

if($P_ARR[81]==1 and ($P_ARR[171]==1 or $P_ARR[172]==1 or $P_ARR[173]==1 or $P_ARR[174]==1 or $P_ARR[175]==1 or $P_ARR[176]==1 or $P_ARR[177]==1 or $P_ARR[178]==1 or $P_ARR[179]==1 or $P_ARR[180]==1 or $P_ARR[181]==1 or $P_ARR[182]==1 or $P_ARR[183]==1 or $P_ARR[184]==1 or $P_ARR[185]==1 or $P_ARR[186]==1 or $P_ARR[187]==1 or $P_ARR[188]==1))
{
echo $fsize1;
echo "<anchor>Xaric et!<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"$(wtime$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "<postfield name=\"rm\" value=\"$rm\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

if($P_ARR[82]==1){
echo $fsize1;
echo "<anchor>Xeberdarl&#305;q Et!<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"xeber\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "<postfield name=\"rm\" value=\"$rm\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}


if($P_ARR[81]==1 or $P_ARR[82]==1){
echo $fsize1;
echo "----<br/>";
echo $fsize2;
}

if($P_ARR[2]==1){
echo $fsize1;
echo "<anchor>Redakte et<go href=\"admin.php?go=view&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$nk\"/>";
echo "</go></anchor><br/>\n";
echo $fsize2;
echo $fsize1;
echo "----<br/>";
echo $fsize2;
}


if($P_ARR[83]==1){
echo $fsize1;
echo "<anchor>TAM &#304;qnor!<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"iqnor\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

if($P_ARR[84]==1){
echo $fsize1;
echo "<anchor>Ban &#304;stifade&#231;i ad&#305;<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"leqeb\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

if($P_ARR[87]==1){
echo $fsize1;
echo "<anchor>&#304;stifade&#231;i ad&#305;n&#305; sil<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"sil\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

if($P_ARR[85]==1){
echo $fsize1;
echo "<anchor>Ban Telefon+IP<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"browser\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

if($P_ARR[86]==1){
echo $fsize1;
echo "<anchor>IP-Soft+Del Hidden<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"wtime\" value=\"sil_hidden\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}

echo $fsize1;
if($P_ARR[19]==1 or $P_ARR[20]==1 or $row['delmsg']==1)echo $divide;

if($P_ARR[19]==1)echo "Mektublar&#305;n&#305; - [<a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;mkdel&amp;ref=$ref\">x</a>]<br/>\n";
if($P_ARR[20]==1)echo "Mesajlar&#305;n&#305; - [<a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;msdel&amp;ref=$ref\">x</a>]<br/>\n";
if($row['delmsg']==1)echo "Otaq mesajlar&#305;n&#305; - [<a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rmdel&amp;ref=$ref\">x</a>]<br/>\n";

echo $fsize2;

if($P_ARR[88]==1){
echo $fsize1;
echo "B&#252;t&#252;n yaz&#305;lar&#305;n&#305; sil - [<anchor>x<go href=\"ban.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"wtime\" value=\"msg\"/>";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}

echo $fsize1;
if($P_ARR[85]==1 or $P_ARR[86]==1 or $P_ARR[87]==1 or $P_ARR[88]==1 or $P_ARR[84]==1 or $P_ARR[83]==1)
echo $divide;

if($P_ARR[150]==1){
if($rm!='')echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">Mektublar&#305;n&#305; oxu</a><br/>\n";
else echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=0&amp;ref=$ref\">Mektublar&#305;n&#305; oxu</a><br/>\n";
}

if($P_ARR[151]==1){
echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Mesajlar&#305; oxu</a><br/>\n";
}
if($P_ARR[150]==1 or $P_ARR[151]==1)
echo $divide;

if($id==1 and $inf["g_nom"]!="")echo "<u><b>N&#246;mresi:</b> ".$inf["g_nom"]."</u><br/>\n";
if($P_ARR[51]==1){
if ($nk!=1)echo "<u><b>&#350;ifresi:</b> ".$inf['pass']."</u><br/>\n";
}

if($P_ARR[201]==1){
echo "<b>IP: $inf[user_ip]</b><br/>\n";
echo "<u><b>Soft:</b> $inf[user_soft]</u><br/>\n";
}

if($row['level']>7){
echo "<b>Ox&#351;ar nikleri:</b>\n";
$q = mysql_query("SELECT * FROM `users` WHERE `user_ip` = '".$us_ip."' AND `user_soft` = '".$us_soft."' ORDER BY `id` DESC;");
while($usera = mysql_fetch_array($q))
{
$uida = $usera['id'];
$nicka = $usera['user'];
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uida\">$nicka</a>, ";
}
echo "<br/>\n";
}

if($P_ARR[51]==1 or $P_ARR[201]==1 or ($id==1 and $inf["g_nom"]!='')){
echo "----<br/>\n";
}

//user_ban_list();

}elseif($level==9){
echo '<i><b>Rehberlik haqq&#305;nda Melumat Verilmir</b></i><br/>----<br/>';
}else{
echo '<i>Bu &#350;exs R&#252;tbede Sizden b&#246;y&#252;kd&#252;r!</i><br/>----<br/>';
}

if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}else{
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>