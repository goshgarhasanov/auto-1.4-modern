<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
$user = $row['user'];
WHO("-","-",BASENAME(__FILE__));
FUNCTION DHMS_TIME($NEW)
{
    $NEW    = $NEW - TIME();
    $DAY    = @FLOOR($NEW / 86400);
    $HOUR   = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
    $MINUT  = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
    $SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
    $DAY    = ($DAY!=0) ? $DAY." g&#252;n " : FALSE;
    $HOUR   = ($HOUR!=0) ? $HOUR." saat " : FALSE;
    $MINUT  = ($MINUT!=0) ? $MINUT." deq " : FALSE;
    $SECOND = ($SECOND!=0) ? $SECOND." san" : FALSE;
    RETURN $DAY.$HOUR.$MINUT.$SECOND;
}

if($p_arr['0'] != 1) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"access\" title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!<br/>\n";
print $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"adminka\" title=\"Admin Panel\">\n";
echo "<p mode=\"wrap\">\n";
switch($go) {
default:


echo $fsize1;
echo "<b><u>Admin Paneli</u></b><br/>----<br/>\n";
echo $fsize2;

if($p_arr['2']==1 or $p_arr['6']==1 or $p_arr['1']==1){

if($p_arr['2']==1 or $p_arr['6']==1 or $p_arr['81']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1){
echo $fsize1;
echo "Nick ve ya ID:<br/>\n";
echo $fsize2;
echo "<input name=\"nick$ref\" title=\"nick\" emptyok=\"true\"/><br/>\n";
}
if($p_arr['2']==1){
echo $fsize1;
echo "[<anchor title=\"go\">Redakte<go href=\"admin.php?go=view&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>";
echo "</go></anchor>\n";
echo $fsize2;
echo "\n/\n";
}
if($p_arr['6']==1){
echo $fsize1;
echo "<anchor>Anketi<go href=\"admin.php?go=infous&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>";
echo "</go></anchor>]\n";
echo "<br/>\n";
echo $fsize2;
}
if($p_arr['2']==1 or $p_arr['6']==1){
echo $fsize1;
echo $divide;
echo $fsize2;
}
if($p_arr['81']==1){
echo $fsize1;

if($p_arr['171']==1 or $p_arr['172']==1 or $p_arr['173']==1 or $p_arr['174']==1 or $p_arr['175']==1 or $p_arr['176']==1 or $p_arr['177']==1 or $p_arr['178']==1 or $p_arr['179']==1 or $p_arr['180']==1 or $p_arr['181']==1 or $p_arr['182']==1 or $p_arr['183']==1 or $p_arr['184']==1 or $p_arr['185']==1 or $p_arr['186']==1 or $p_arr['187']==1 or $p_arr['188']==1)
{
echo "Vaxt Se&#231;in<br/>\n";
echo $fsize2;
echo "<select name=\"wtime$ref\">\n";
if($p_arr['171']==1)
echo "<option value=\"5\">5 deqiqe </option>\n";
if($p_arr['172']==1)
echo "<option value=\"15\">15 deqiqe </option>\n";
if($p_arr['173']==1)
echo "<option value=\"30\">30 deqiqe </option>\n";
if($p_arr['174']==1)
echo "<option value=\"45\">45 deqiqe </option>\n";
if($p_arr['175']==1)
echo "<option value=\"60\">1 Saat </option>\n";
if($p_arr['176']==1)
echo "<option value=\"120\">2 Saat </option>\n";
if($p_arr['177']==1)
echo "<option value=\"180\">3 Saat </option>\n";
if($p_arr['178']==1)
echo "<option value=\"300\">5 Saat </option>\n";
if($p_arr['179']==1)
echo "<option value=\"1440\">1 Gun </option>\n";
if($p_arr['180']==1)
echo "<option value=\"2880\">2 Gun </option>\n";
if($p_arr['181']==1)
echo "<option value=\"4320\">3 Gun </option>\n";
if($p_arr['182']==1)
echo "<option value=\"7200\">5 Gun </option>\n";
if($p_arr['183']==1)
echo "<option value=\"21600\">15 Gun </option>\n";
if($p_arr['184']==1)
echo "<option value=\"28800\">20 Gun </option>\n";
if($p_arr['185']==1)
echo "<option value=\"43200\">30 Gun </option>\n";
if($p_arr['186']==1)
echo "<option value=\"64800\">45 Gun </option>\n";
if($p_arr['187']==1)
echo "<option value=\"86400\">60 Gun </option>\n";
if($p_arr['188']==1)
echo "<option value=\"129600\">90 Gun </option>\n";
echo "</select>\n";
echo $fsize1;
}
echo "Sebeb:<br/>\n";
echo $fsize2;
echo "<input name=\"whykik$ref\" maxlength=\"200\" title=\"whykik\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Xaric Et!<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"$(wtime$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor>]\n";
echo $fsize2;
echo "<br/>\n";
}

if($p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1){
echo $fsize1;
echo $divide;
echo $fsize2;
}


if($p_arr['84']==1){
echo $fsize1;
echo "[<anchor>Ban &#304;stifade&#231;i ad&#305;<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"leqeb\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor>]\n";
echo $fsize2;
echo "<br/>\n";
}
if($p_arr['85']==1){
echo $fsize1;
echo "[<anchor>Ban Telefon+IP<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"browser\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor>]\n";
echo $fsize2;
echo "<br/>\n";
}
if($p_arr['86']==1){
echo $fsize1;
echo "[<anchor>IP-Soft+Del Hidden<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"sil_hidden\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "</go></anchor>]\n";
echo $fsize2;
echo "<br/>\n";
}
if($p_arr['87']==1){
echo $fsize1;
echo "[<anchor>&#304;stifade&#231;i ad&#305;n&#305; sil<go href=\"ban.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>\n";
echo "<postfield name=\"whykik\" value=\"$(whykik$ref)\"/>\n";
echo "<postfield name=\"wtime\" value=\"sil\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}


}
echo $fsize1;


if($p_arr['8']==1 or $p_arr['9']==1){
echo $ay;
}
if($p_arr['8']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bots&amp;ref=$ref\">&#220;mumi Qur&#287;ular</a><br/>\n";
}
if($p_arr['9']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=qeydiyyat&amp;ref=$ref\">Qeydiyyat Say&#305;</a><br/>\n";
}


if($p_arr['7']==1){
echo "<a href=\"a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Gizli Axtar&#305;&#351;</a><br/>\n";
}








print $ay;

if($id=='1'){
echo "<b><a href=\"auto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Auto Panel</a></b><br/>\n";
echo "[<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=on_time&amp;x=5&amp;ref=$ref\">Online Vaxt</a><br/>";
//echo "[<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=on_bot&amp;x=5&amp;ref=$ref\">Online</a> | ";
//echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=off_bot&amp;x=5&amp;ref=$ref\">Offline</a> Bot]<br/>";
//echo "[<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=vez_panel&amp;x=5&amp;ref=$ref\">Vezife Panel</a>]<br/>";
echo "<a href=\"votes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Sesverme Paneli</a><br/>\n";
//echo "[<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=func&amp;x=5&amp;ref=$ref\">Function Panel</a>]<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=msvadbi&amp;x=5&amp;ref=$ref\">Restoran(Toy)</a><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=razvod&amp;x=5&amp;ref=$ref\">Ayriliq Meqami </a><br/>";
}

if($p_arr['10']==1 or $p_arr['11']==1 or $p_arr['12']==1 or $p_arr['13']==1 or $p_arr['14']==1 or $p_arr['15']==1){
echo $ay;
}
if($p_arr['10']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=addvopr&amp;ref=$ref\">Sual elave et</a><br/>\n";
}
if($id==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=block&amp;ref=$ref\">Nikini Block edib</a><br/>\n";
}
if($p_arr['11']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;ref=$ref\">Leqebi Ban Edilib</a><br/>\n";
}
if($p_arr['12']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;ref=$ref\">Leqebi Bazadan Silinib</a><br/>\n";
}
if($p_arr['13']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Edilib</a><br/>\n";
}
if($p_arr['14']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;ref=$ref\">IP-den ban Edilib</a><br/>\n";

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;ref=$ref\">Telefonu ban Edilib</a><br/>\n";
}
if($p_arr['16']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;ref=$ref\">Tam Iqnor Edilib</a><br/>\n";
}

if($p_arr['17']==1 or $p_arr['18']==1 or $p_arr['19']==1 or $p_arr['20']==1 or $p_arr['21']==1 or $p_arr['22']==1 or $p_arr['23']==1){
echo $divide;
}

if($p_arr['103']==1){
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;ref=$ref\">Delete panel</a></b><br/>\n";
}

if($p_arr['24']==1 or $p_arr['25']==1 or $p_arr['26']==1 or $p_arr['27']==1 or $p_arr['28']==1 or $p_arr['29']==1 or $p_arr['30']==1){
echo $divide;
}
if($p_arr['24']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=gorush&amp;ref=$ref\">G&#246;r&#252;&#351; Teyin Et</a><br/>\n";
}
if($p_arr['25']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xgorush&amp;ref=$ref\">G&#246;r&#252;&#351;&#252; sil</a><br/>\n";
}
if($p_arr['26']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=tell&amp;ref=$ref\">Ota&#287;lara Elan</a><br/>\n";
}
if($p_arr['27']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=mobi&amp;ref=$ref\">Elan elave et</a><br/>";
}
if($p_arr['28']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dobi&amp;ref=$ref\">Elani Sil</a><br/>";
}
if($p_arr['29']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Ball&#305; Elani Sil</a><br/>";
}
if($p_arr['30']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=delvoprose&amp;ref=$ref\">Suallar&#305; tek-tek Sil</a><br/>";
}

if($p_arr['31']==1){
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dsvadbi&amp;ref=$ref\">Evlilik Elan&#305;n&#305; Sil</a><br/>";
}
if($p_arr['32']==1 or $p_arr['33']==1){
echo $divide;
}
if($p_arr['32']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Ota&#287;&#305;n Ad&#305;n Deyi&#351;dir</a><br/>\n";
}
if($p_arr['33']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels&amp;ref=$ref\">R&#252;tbenin Adlar&#305;</a><br/>\n";
}

if($p_arr['36']==1 or ($p_arr['35']==1 and ($p_arr['105']!=0 or $p_arr['106']!=0 or $p_arr['107']!=0)) or ($p_arr['34']==1 and ($p_arr['100']!=0 or $p_arr['101']!=0 or $p_arr['102']!=0))){
echo $divide;
}
//if($p_arr[46]==1)echo "<a href=\"adminka.php?go=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Smayl Panel</a><br/>";
if($p_arr[34]==1)echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=extra&amp;ref=$ref\">Extra Panel</a><br/>\n";
if($p_arr[35]==1)echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-Reklam Panel</a><br/>\n";
if($p_arr[36]==1)echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=online&amp;x=5&amp;ref=$ref\">Online G&#246;sterici</a><br/>";

if($p_arr['37']==1 or $p_arr['38']==1 or $p_arr['204']==1 or $p_arr['39']==1 or $p_arr['40']==1 or $p_arr['41']==1 or $p_arr['42']==1 or $p_arr['43']==1){
echo $divide;
}

if($p_arr['37']==1){
echo "<a href=\"qefes.php?cid=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefes Panel</a><br/>\n";
}
if($p_arr['38']==1){
echo "<a href=\"admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq Paneli</a><br/>\n";
}
if($p_arr['39']==1 and ($p_arr['120']!=0 or $p_arr['121']!=0 or $p_arr['122']!=0 or $p_arr['123']!=0 or $p_arr['124']!=0 or $p_arr['125']!=0 or $p_arr['126']!=0 or $p_arr['127']!=0 or $p_arr['128']!=0 or $p_arr['129']!=0 or $p_arr['130']!=0 or $p_arr['132']!=0 or $p_arr['133']!=0)){
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";
}
if($p_arr['40']==1){
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaj Paneli</a><br/>\n";
}

if($p_arr['41']==1 and ($p_arr['150']!=0 or $p_arr['151']!=0))
{
if($p_arr['150']==1)
echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;rm=0&amp;ref=$ref\">Mektublar&#305; Oxu</a><br/>\n";
if($p_arr['151']==1)
echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesajlari Oxu</a><br/>\n";
}
if($p_arr['42']==1){
echo "<a href=\"view_s.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MMS Mektublar&#305; Oxu</a><br/>\n";
}
if($p_arr['43']==1){
echo "<a href=\"admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Otaqlar&#305; Oxu</a><br/>\n";
}
echo $fsize2;
break;


case 'off_bot':
echo $fsize1;
echo "<b>Offline Bot Paneli</b><br/>";
echo $divide;
echo "Offline Et: <u>Ancaq</u><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=of1&amp;r=$ref\">Ham&#305;n&#305;</a><br/>";
echo $fsize2;
break;

case 'on_bot':
echo $fsize1;
echo "<b>Online Bot Paneli</b><br/>";
echo $divide;
echo "Onlineye Burax: <u>Ancaq</u><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=o1&amp;r=$ref\">Ham&#305;n&#305;</a><br/>";
echo $fsize2;
break;

case 'o1':
echo $fsize1;
$sql = mysql_query("Select * from `users`;");
while($obj = mysql_fetch_array($sql)) {
$sime = $obj['time'];
$upload = $sime + 86400;
$uid = $obj['id'];
mysql_query("UPDATE `users` SET `time` = '".$upload."', `room` = '28' WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan b&#252;t&#252;n istifade&#231;iler &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
break;

case 'of1':
echo $fsize1;
$a = mysql_query("SELECT * FROM `users`;");
while($e = mysql_fetch_array($a)){
$uid = $e['id'];
$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".time()."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan b&#252;t&#252;n istifade&#231;iler &#231;atda <u>offline</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
break;

case 'msvadbi':
echo $fsize1;
echo "Beyin ad&#305;:<br/>";
echo "<input name=\"bey$ref\" maxlength=\"50\"/><br/>";
echo "Gelinin ad&#305;:<br/>";
echo "<input name=\"gelin$ref\" maxlength=\"50\"/><br/>";
echo "Gelinin &#350;ahidi:<br/>";
echo "<input name=\"gsah$ref\"/><br/>";
echo "Beyin &#350;ahidi:<br/>";
echo "<input name=\"beysah$ref\"/><br/>";
echo "Toyun Tarixi:<br/>";
echo "<input size=\"2\" name=\"day$ref\" maxlength=\"2\" format=\"*N\"/>.<input size=\"2\" name=\"month$ref\" maxlength=\"2\" format=\"*N\"/>.<input size=\"4\" name=\"year$ref\" maxlength=\"4\" format=\"*N\"/><br/>";
echo "Saat:<br/>";
echo "<input size=\"2\" name=\"chs$ref\" maxlength=\"2\" format=\"*N\"/>:<input size=\"2\" name=\"min$ref\" maxlength=\"2\" format=\"*N\"/><br/>";
echo "<anchor>Elave Et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=updsvadbi&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"bey\" value=\"$(bey$ref)\"/>";
echo "<postfield name=\"gelin\" value=\"$(gelin$ref)\"/>";
echo "<postfield name=\"gsah\" value=\"$(gsah$ref)\"/>";
echo "<postfield name=\"beysah\" value=\"$(beysah$ref)\"/>";
echo "<postfield name=\"day\" value=\"$(day$ref)\"/>";
echo "<postfield name=\"month\" value=\"$(month$ref)\"/>";
echo "<postfield name=\"year\" value=\"$(year$ref)\"/>";
echo "<postfield name=\"chs\" value=\"$(chs$ref)\"/>";
echo "<postfield name=\"min\" value=\"$(min$ref)\"/>";
echo "<postfield name=\"teshkilatci\" value=\"".$row['user']."\"/>";
echo "</go></anchor><br/>";
echo $fsize2;
break;

case 'updsvadbi':
echo $fsize1;
$bey=trim(htmlspecialchars(stripslashes($bey)));
$gelin=trim(htmlspecialchars(stripslashes($gelin)));
$gsah=trim(htmlspecialchars(stripslashes($gsah)));
$beysah=trim(htmlspecialchars(stripslashes($beysah)));
$day=trim(htmlspecialchars(stripslashes($day)));
$month=trim(htmlspecialchars(stripslashes($month)));
$year=trim(htmlspecialchars(stripslashes($year)));
$chs=trim(htmlspecialchars(stripslashes($chs)));
$min=trim(htmlspecialchars(stripslashes($min)));
if(empty($bey)) $error=$error."Bey'in ad&#305; yaz&#305;lmad&#305;<br/>";
if(empty($gelin)) $error=$error."Gelinin ad&#305; yaz&#305;lmad&#305;<br/>";
if(empty($gsah)) $error=$error."Gelinin &#350;ahidi yaz&#305;lmad&#305;<br/>";
if(empty($beysah)) $error=$error."Beyin &#350;ahidi yaz&#305;lmad&#305;<br/>";
if(empty($day)) $error=$error."Toyun Tarixi Qeyd Edilmeyib<br/>";
if(empty($month)) $error=$error."Toyun Tarixi Qeyd Edilmeyib<br/>";
if(empty($year)) $error=$error."Toyun Tarixi Qeyd Edilmeyib<br/>";
if(empty($chs)) $error=$error."Toyun Tarixi Qeyd Edilmeyib<br/>";
if(empty($min)) $error=$error."Toyun Tarixi Qeyd Edilmeyib<br/>";
$latuser=strtolower($bey);
$ruser = $bey;
if($ruser==$bey){
$latuser = mysql_escape_string($latuser);
$result = mysql_query ("Select id,user,para from users where latuser = '".$latuser."' and sex='0'");
} else {
$ruser = mysql_escape_string($ruser);
$result = mysql_query ("select id,user,para from users where ruser = '".$ruser."'  and sex='0'");
}
$ki = @mysql_fetch_array ($result);
$beyy=$ki["user"];
$arvadi=$ki["para"];
if($arvadi!="") {
echo  "<b>$beyy</b> art&#305;q <b>$arvadi</b> niki ile evlidir.<br/>";
echo "<br/>----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=msvadbi&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
echo $fsize2;
break;
}
if (mysql_affected_rows() == 0) {
echo "<b>".$beyy."</b> niki tap&#305;lmad&#305;<br/>";
echo $fsize2;
break;
}

$latuser2=strtolower($gelin);
$ruser = $gelin;
if($ruser==$gelin){
$latuser = mysql_escape_string($latuser);
$result = mysql_query ("Select id,user,para from users where latuser = '".$latuser2."' and sex='1'");
} else {
$ruser = mysql_escape_string($ruser);
$result = mysql_query ("select id,user,para from users where ruser = '".$ruser."'  and sex='1'");
}

$qi = mysql_fetch_array ($result);
$qadin=$qi["user"];
$eri=$qi["para"];
if($eri!="") {
echo  "<b>$qadin</b> niki art&#305;q <b>$eri</b> niki ile evlidir.<br/>";
echo "<br/>----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=msvadbi&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
echo $fsize2;
break;
}

if (mysql_affected_rows() == 0) {
echo  "<b>".$gelin."</b> niki tap&#305;lmad&#305;<br/>";
echo $fsize2;
break;
}

if(empty($error)) {
$date="$day.$month.$year | $chs:$min";
$gelin=strtolower($gelin);
$bey=strtolower($bey);
$time = time() + 86400;
if(mysql_query("insert into `toy` set `bey` = '".$bey."', `gelin` ='".$gelin."', `time` = '".$time."', `oglan_teref` = '".$beysah."', `qiz_teref` = '".$gsah."', `saat` = '".$date."';")&&mysql_query("Update users set para='".$qadin."' where latuser ='".$bey."'")&&mysql_query("Update users set para='".$beyy."' where latuser ='".$gelin."'")) {
echo  "Toy Quruldu..))<br/>";
} else {
echo $error;
}
} else {
echo $error;
}
echo $fsize2;
break;


case 'razvodw':
echo $fsize1;
echo "Ki&#351;inin Niki:<br/>";
echo "<input name=\"bey$ref\" maxlength=\"50\"/><br/>";
echo "Qadinin Niki:<br/>";
echo "<input name=\"gelin$ref\" maxlength=\"50\"/><br/>";
echo "<anchor>Ayir<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=updrazvod$takep\" method=\"post\">";
echo "<postfield name=\"bey\" value=\"$(bey$ref)\"/>";
echo "<postfield name=\"gelin\" value=\"$(gelin$ref)\"/>";
echo "</go></anchor>";
echo "<br/>";
echo $fsize2;
break;


case 'updrazvoda':
echo $fsize1;
$bey=trim(htmlspecialchars(stripslashes($bey)));
$gelin=trim(htmlspecialchars(stripslashes($gelin)));
if(empty($bey)) $error=$error."<u>Beyin bolmesi tamamlanmayib!</u><br/>";
if(empty($gelin)) $error=$error."<u>Qizin bolmesi tamamlanmayib!</u><br/>";

if(!is_numeric($bey)){
$bey = strtolower($bey);
}
if(!is_numeric($bey)){
$results = mysql_query ("Select * from users where latuser = '".$bey."'");
}else{
$results = mysql_query ("Select * from users where id = '".$bey."'");
}
if (mysql_affected_rows() == 0) {
echo "<b>".$bey."</b> niki m&#246;vcud deyil<br/>";
echo $fsize2;
break;
}
$k=mysql_fetch_array($results);
$arvadi=$k['para'];

$s = mysql_query ("Select * from users where latuser = '".$arvadi."'");
$e = mysql_fetch_array ($s);
$fid = $e['id'];
$bbey = $e['user'];


if(!is_numeric($gelin)){
$gelin = strtolower($gelin);
}
if(!is_numeric($gelin)){
$results = mysql_query ("Select * from users where latuser = '".$gelin."'");
}else{
$results = mysql_query ("Select * from users where id = '".$gelin."'");
}
if (mysql_affected_rows() == 0) {
echo "<b>".$gelin."</b> niki m&#246;vcud deyil.<br/>";
echo $fsize2;
break;
}
$g = mysql_fetch_array ($results);
$eri = $g['para'];
$ggelin = $g['user'];
$sid = $g['id'];


if ($fid!="$sid"){
echo "<b>".$bbey."</b> <u>".$ggelin."</u> nikinin eri deyil.<br/>";
echo $fsize2;
break;
}

if(empty($error)) {
$bey = strtolower($bey);
$gelin = strtolower($gelin);
if(mysql_query("Update users set para='' where latuser ='".$bey."'")&&mysql_query("Update users set para='' where latuser ='".$gelin."'")) {
echo "<u>$bbey</u> ve <u>$ggelin</u> nikini ay&#305;rd&#305;n&#305;z. Sevine Bilersen :)<br/>";
}else{
echo "<b>Xeta</b>: Emeliyyat Ugursuzdur.<br/>";
}
}else{
echo $error;
}
echo $fsize2;
break;


case 'dm':
echo $fsize1;
if($p_arr['103']!=1){
    echo 'Sizin buna hГјququnuz yoxdur.<br/>';
    break;
}
$act = $_GET["act"];
switch($act)
{
    default:
    if($p_arr['17']==1)echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=adel&amp;ref=$ref\">Auto Delete</a><br/>\n".$divide;
    if($p_arr['105']==1)echo "Oxunmu&#351; mesajlar -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=1&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['106']==1)echo "Oxunmu&#351; mektublar -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=2&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['107']==1)echo "Oxunmu&#351; mms-ler -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=3&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['108']==1)echo "MMS Mektublar -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=4&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['18']==1)echo "MMS-ler 1 ay -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=5&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['19']==1)echo "Mektublar -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=6&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['20']==1)echo "Mesajlar -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=7&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['105']==1 or $p_arr['106']==1 or $p_arr['107']==1 or $p_arr['108']==1 or $p_arr['18']==1 or $p_arr['19']==1 or $p_arr['20']==1)echo $divide;
    if($p_arr['109']==1)echo "&#220;mumi Balllar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=8&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['110']==1)echo "Mesaj Postlar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=9&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['111']==1)echo "Oyun Postlar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=10&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['112']==1)echo "Otaq Postlar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=11&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['113']==1)echo "Forum Postlar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=12&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['109']==1 or $p_arr['110']==1 or $p_arr['111']==1 or $p_arr['112']==1 or $p_arr['113']==1 or $p_arr['114']==1)echo $divide;
    if($p_arr['116']==1)echo "&#350;ekiller -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=15&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['118']==1)echo "Foto sesler -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=17&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['119']==1)echo "Reytinq sesler -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=18&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['115']==1 or $p_arr['116']==1 or $p_arr['117']==1 or $p_arr['118']==1 or $p_arr['119']==1)echo $divide;
    if($p_arr['21']==1)echo "Ota&#287;lar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=19&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['22']==1)echo "Postu 0 olanlar&#305; -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=20&amp;ref=$ref\">x</a>)<br/>\n";
    if($p_arr['23']==1)echo "30 g&#252;n gelmeyenleri -(<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;act=21&amp;ref=$ref\">x</a>)<br/>\n";
    break;
    case 1:
    if($p_arr['105']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    mysql_query("delete from `mesaj` where `readd` ='1'");
    echo "B&#252;t&#252;n Oxunmu&#351; mesajlar silindi.<br/>\n";
    break;
    case 2:
    if($p_arr['106']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    mysql_query("delete from `zapiski` where `readd` ='1'");
    echo "B&#252;t&#252;n Oxunmu&#351; mektublar silindi.<br/>\n";
    break;
    case 3:
    if($p_arr['107']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    $query = mysql_query("select COUNT(`lid`) from `mms` where `readd` ='1';");
    $all = @mysql_result($query, 0);
    $query = @mysql_query("SELECT `lid`,`photo` FROM `mms` where `readd` ='1';");
    for ($i=0;$i<=$all;$i++){
    $arr = mysql_fetch_array($query);
    $lid = $arr['lid'];
    $photo = $arr['photo'];
    if((file_exists("mms/$photo")&&($photo!=""))){
    unlink("mms/$photo");
    }
    mysql_query ("DELETE from `mms` WHERE `lid`='".$lid."';");
    }
    echo "B&#252;t&#252;n Oxunmu&#351; MMS-ler silindi.<br/>\n";
    break;
    case 4:
    if($p_arr['108']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    $query = mysql_query("select COUNT(`lid`) from `mms`;");
    $all = @mysql_result($query, 0);
    $query = @mysql_query("SELECT `lid`,`photo` FROM `mms`;");
    for ($i=0;$i<=$all;$i++){
    $arr = mysql_fetch_array($query);
    $lid = $arr['lid'];
    $photo = $arr['photo'];
    if((file_exists("mms/$photo")&&($photo!=""))){
    unlink("mms/$photo");
    }
    mysql_query ("DELETE from `mms` WHERE `lid`='".$lid."';");
    }
    echo "B&#252;t&#252;n MMS mektublar silindi.<br/>\n";
    break;
    case 5:
    if($p_arr['18']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    $time = time() - (86400 * 30);
    $query = mysql_query("select COUNT(`lid`) from `mms` where `time`<'".$time."';");
    $all = @mysql_result($query, 0);
    $query = @mysql_query("SELECT `lid`,`photo` FROM `mms` WHERE `time`<'".$time."';");
    for ($i=0;$i<=$all;$i++){
    $arr = mysql_fetch_array($query);
    $lid = $arr['lid'];
    $photo = $arr['photo'];
    if((file_exists("mms/$photo")&&($photo!=""))){
    unlink("mms/$photo");
    }
    mysql_query ("DELETE from `mms` WHERE `lid`='".$lid."';");
    }
    echo "1 Aydan &#231;ox qalan (<b>$all</b>) MMS Mektub Silindi!<br/>\n";
    break;
    case 6:
    if($p_arr['19']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    mysql_query ("TRUNCATE `zapiski`;");
    echo "Mektub Bazas&#305; Tam Silindi.<br/>\n";
    break;
    case 7:
    if($p_arr['20']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    mysql_query ("TRUNCATE `mesaj`");
    echo "Mesajlar Bazas&#305; Tam Silindi.<br/>\n";
    break;
    case 8:
    if($p_arr['109']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `bal`='0';");
    echo "B&#252;t&#252;n ballar sifirlandi.<br/>\n";
    break;
    case 9:
    if($p_arr['110']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `posts`='0';");
    echo "B&#252;t&#252;n postlar sifirlandi.<br/>\n";
    break;
    case 10:
    if($p_arr['111']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `gposts`='0';");
    echo "B&#252;t&#252;n oyun postlari sifirlandi.<br/>\n";
    break;
    case 11:
    if($p_arr['112']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `roompost`='0';");
    echo "B&#252;t&#252;n otaq postlari sifirlandi.<br/>\n";
    break;
    case 12:
    if($p_arr['113']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `fpost`='0';");
    echo "B&#252;t&#252;n forum postlari sifirlandi.<br/>\n";
    break;
    case 15:
    if($p_arr['116']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    $SQL = @MYSQL_QUERY("SELECT * FROM albom");
    WHILE(@MYSQL_FETCH_OBJECT($SQL))
    {
     @UNLINK("photos/".$ARR->idfoto."/".$ARR->photo."");
    }

    $SQL = @MYSQL_QUERY("SELECT * FROM `users` where `img` > '0'");
    WHILE($US = @MYSQL_FETCH_OBJECT($SQL)){
   @mysql_query ("update `users` set `img`='0' where `id` = '".$US->id."';");
    }

    @MYSQL_QUERY("TRUNCATE TABLE albom_fikir");
    @MYSQL_QUERY("TRUNCATE TABLE albom");
    echo "B&#252;t&#252;n &#350;ekiller silindi.<br/>\n";
    break;

    case 17:
    if($p_arr['118']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `albom` set `vote`='0';");
    echo "B&#252;t&#252;n foto sesler sifirlandi.<br/>\n";
    break;
    case 18:
    if($p_arr['119']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    @mysql_query ("update `users` set `ses`='0';");
    echo "B&#252;t&#252;n reytinq sesler sifirlandi.<br/>\n";
    break;
    case 19:
    if($p_arr['23']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    for ($num = 0; $num <= 10; $num++){
    $room = "room".$num;
    mysql_query("TRUNCATE TABLE `".$room."`;");
    }
    echo "B&#252;t&#252;n Otaqlar Temizlendi!<br/>\n";
    break;
    case 20:
    if($p_arr['22']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    mysql_query ("delete from `users` where `posts`<='5' and `id`>12;");
    echo '0 postu olan user-ler silindi!<br/>';
    break;
    case 21:
    if($p_arr['23']!=1){echo 'Sizin buna hГјququnuz yoxdur.<br/>';break;}
    $del_time = $SERVER_TIME-2592000;
    $query=mysql_query("select `id`,`time` from `users` where `id`>'12' and `time` <".$del_time.";");
    $i=0;
    while($info=mysql_fetch_array($query))
    {
                mysql_query ("delete from `users` where `id`='".$info['id']."'");
                mysql_query ("delete from `friends` where `id`='".$info['id']."' or `usid`='".$info['id']."'");
                mysql_query ("delete from `ignor` where `id`='".$info['id']."' or `usid`='".$info['id']."'");
                mysql_query ("delete from `hesab` where `usid`='".$info['id']."'");
                mysql_query ("delete from `albom` where `idfoto`='".$info['id']."'");
                mysql_query ("delete from `mesaj` where `idtowhom`='".$info['id']."' or `idwho`='".$info['id']."'");
                mysql_query ("delete from `zapiski` where `idtowhom`='".$info['id']."' or `idwho`='".$info['id']."'");
                mysql_query ("delete from `c_nick` where `to`='".$info['id']."'");
                mysql_query ("delete from `mms` where `to`='".$info['id']."' or `from`='".$info['id']."'");
                $i++;
    }
    echo "<b>30</b> G&#252;n erzinde aktiv olmayan <b>".$i."</b> istifade&#231;i Bazadan silindi!<br/>";
    break;
}
if($act)echo $divide."<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dm&amp;ref=$ref\">&#171; Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;

case 'vez_panel':
require("file/require/vezife");
break;

case 'online':
if($p_arr['36']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;
$time = ($vaxt - 300) + time();
$sql = mysql_query("SELECT * FROM `users` WHERE `time` > '".$time."' order by time desc;");
echo "<b>5 deqiqe erzinde &#231;atda olanlar:(".mysql_num_rows($sql).")</b><br/>";
echo $divide;
while ($sql_view = mysql_fetch_array($sql)) {
if($sql_view["sex"]=="0")$sex="K";else$sex="Q";
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$sql_view["id"]."&amp;ref=$ref\">".$sql_view["user"]."</a>(".$sex."), ";
}
echo "<br/>";
//echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;



case 'arek':
echo $fsize1;
if($p_arr['105']!=1)
{
echo "GiriЕџ icazeniz yoxdur.<br/>\n";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();
exit;
}
$v2 = mysql_escape_string($_GET['v2']);
switch ($v2) {

case 'add':
if($_POST['up_0']=="" or $_POST['up_1']=="" or $_POST['up_2']=="" or $_POST['up_3']=="" or $_POST['up_4']==""){
$filed0=$filed1=$filed2=$filed3=$filed4=false;
if($edit!=""){
$file_db=file("file/dat_folder/black.dat");
for ($i=0;$i< sizeof($file_db);$i++) { if ($i==$edit) {$edition = $file_db[$i];} }
if(strlen($edition)>=11){

$exp_db=explode("|", $edition);
$filed0 = trim($exp_db[0]);
$filed1 = trim($exp_db[1]);
$filed2 = trim($exp_db[2]);
$filed3 = trim($exp_db[3]);
$filed4 = trim($exp_db[4]);
$reflesh = "&amp;edit=$edit";
}
}

echo "Qadaqan edilmi&#351; s&#246;zlerin elave edilmesi.<br/>\n";
echo $divide;

echo "S&#246;z:<br/>\n";
echo $fsize2;
echo "<input name=\"up_0$ref\" value=\"$filed0\" title=\"S&#246;z\"/><br/>\n";//min 3 simvol
echo $fsize1;
echo "Simvol:<br/>\n";
echo $fsize2;
echo "<select name=\"up_1$ref\">\n";
if($filed1 == '0'){
echo "<option value=\"0\">Standart</option>\n";
echo "<option value=\"1\">Herfler</option>\n";
}else{
echo "<option value=\"1\">Herfler</option>\n";
echo "<option value=\"0\">Standart</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
echo "Ceza n&#246;v&#252;:<br/>\n";
echo $fsize2;
echo "<select name=\"up_2$ref\">\n";
if($filed2 == '0'){
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
} elseif($filed2 == '1'){
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
} elseif($filed2 == '2'){
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
} elseif($filed2 == '3'){
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
} elseif($filed2 == '4'){
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
} elseif($filed2 == '5'){
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
} elseif($filed2 == '6'){
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
} elseif($filed2 == '7'){
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
} elseif($filed2 == '8'){
echo "<option value=\"8\">1 Ay xaric</option>\n";
echo "<option value=\"4\">15 deq xaric</option>\n";
echo "<option value=\"5\">1 Saat xaric</option>\n";
echo "<option value=\"6\">6 Saat xaric</option>\n";
echo "<option value=\"7\">2 G&#252;n xaric</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
} else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Ban olsun</option>\n";
echo "<option value=\"2\">Silinsin</option>\n";
echo "<option value=\"3\">Tam iqnor</option>\n";
echo "<option value=\"900\">15 deq xaric</option>\n";
echo "<option value=\"3600\">1 Saat xaric</option>\n";
echo "<option value=\"21600\">6 Saat xaric</option>\n";
echo "<option value=\"172800\">2 G&#252;n xaric</option>\n";
echo "<option value=\"2592000\">1 Ay xaric</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
echo "Sebeb:<br/>\n";
echo $fsize2;
echo "<input name=\"up_3$ref\" value=\"$filed3\" title=\"S&#246;z\"/><br/>\n";//min 3 simvol
echo $fsize1;
echo "Panele d&#252;&#351;s&#252;n?:<br/>\n";
echo $fsize2;
echo "<select name=\"up_4$ref\">\n";
if($filed4 == 1){
echo "<option value=\"1\">Beli</option>\n";
echo "<option value=\"0\">Xeyir</option>\n";
}else{
echo "<option value=\"0\">Xeyir</option>\n";
echo "<option value=\"1\">Beli</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;

echo "<anchor title=\"go\">Elave et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add".$reflesh."&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"up_0\" value=\"$(up_0$ref)\"/>\n";
echo "<postfield name=\"up_1\" value=\"$(up_1$ref)\"/>\n";
echo "<postfield name=\"up_2\" value=\"$(up_2$ref)\"/>\n";
echo "<postfield name=\"up_3\" value=\"$(up_3$ref)\"/>\n";
echo "<postfield name=\"up_4\" value=\"$(up_4$ref)\"/>\n";
echo "</go></anchor><br/>\n";
}else{
$up_1 = (int)$up_1;
$up_2 = (int)$up_2;
$up_4 = (int)$up_4;
$error_up=false;

if($up_1!='0' and $up_1!='1'){
$error_up='Melumat d&#252;zg&#252;n deyil<br/>';
}elseif($up_4!='0' and $up_4!='1'){
$error_up='Melumat d&#252;zg&#252;n deyil<br/>';
}elseif(strlen($up_0)<=3){
$error_up='Minumum 3 simvoldan ibaret s&#246;zu qada&#287;an etmek olar.<br/>';
}
$up_0 = str_replace("|", "", $up_0);
$up_3 = str_replace("|", "", $up_3);

if($error_up){
echo $error_up;
break;
}
if($edit!=""){
$file_db=file("file/dat_folder/black.dat");
for ($i=0;$i< sizeof($file_db);$i++) { if ($i==$edit) {$edition = $file_db[$i];} }

if(strlen($edition)>=11){
$nn1 = $nn2 = $save_filed ="";
for ($i=0;$i< sizeof($file_db);$i++) {
if ($i==$edit) {
if(strlen($file_db[($i+1)])>=6)
$nn2 = "\n";
elseif(strlen($file_db[($i-1)])>=6)
$nn1 = "";
$save_filed .= $nn1.$up_0."|".$up_1."|".$up_2."|".$up_3."|".$up_4.$nn2;
}else{
$save_filed .= "".$file_db[$i];
}
}
echo "Redakta olundu<br/>\n";
$saved= @fopen("file/dat_folder/black.dat", "w");
@fwrite($saved, $save_filed);
@fflush($saved);
@fclose($saved);
}
}
else
{
echo "Elave olundu<br/>\n";
$file_db=file("file/dat_folder/black.dat");
if(strlen($file_db[0].$file_db[1].$file_db[2])>=8)
$nn1 = "\n";

$save_filed = $nn1.$up_0."|".$up_1."|".$up_2."|".$up_3."|".$up_4;
$saved= @fopen("file/dat_folder/black.dat", "a");
@fwrite($saved, $save_filed);
@fflush($saved);
@fclose($saved);
}
}
break;

default:
if($del!=""){
if($p_arr['106']==1){
$file=file("file/dat_folder/black.dat");
$fp=fopen("file/dat_folder/black.dat","w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$del) { unset($file[$i]);}}
if($i==(sizeof($file)+1))
$file[(sizeof($file)-1)] = str_replace("\n", "", $file[(sizeof($file)-1)]);
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);
}
}

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add&amp;ref=$ref\">Elave et</a><br/>\n";
echo $divide;

$file = file("file/dat_folder/black.dat");
$total = count($file);

$m = (int)$_GET['m'];
if($m < 0 || $m > $total){$m = 0;}
if ($total < $m + 20){ $end = $total; }
else {$end = $m + 20; }
for ($i = $m; $i < $end; $i++){
$file = file("file/dat_folder/black.dat");
$file = array_reverse($file);
$i2=round($i+1);
$num=$total-$i-1;

$exp=explode("|", $file[$i]);

echo $i2.") <a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add&amp;edit=$num&amp;ref=$ref\">".$exp[0]."</a>";
if($p_arr['106']==1)
echo " - [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;del=$num&amp;ref=$ref\">x</a>]";

echo "<br/>";
}
if($total<1){echo "<u>Siz hecbir s&#246;z&#252; qada&#287;an etmemisiz.</u><br/>";}
if ($m != 0) {echo "<a href=\"admin.php?m=".($m - 20)."&amp;go=arek&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&lt;&lt;&lt;- </a> ";}
if (($total > $m + 20)&&($m != 0))echo'|';
if ($total > $m + 20) {echo " <a href=\"admin.php?m=".($m + 20)."&amp;go=arek&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"> -&gt;&gt;&gt;</a>";}
if (($total > $m + 20)or($m != 0))echo "<br/>\n";
break;

}
echo $divide;
if($v2)
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
else
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-Reklam</a><br/>\n";

echo $fsize2;


break;



case 'adel':
if($p_arr['17']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
if(!isset($_POST['action']))
{
echo $fsize1;
echo "Avtomatik temizleme rejimi.<br/>";
echo $divide;

echo $fsize2;
$file = file("file/dat_folder/delete.dat");
$del_1 = trim($file[1]);
$del_2 = trim($file[2]);
$del_3 = trim($file[3]);
$del_4 = trim($file[4]);
$del_5 = trim($file[5]);
$del_6 = trim($file[6]);

echo $fsize1;
echo "Oxunmu&#351; mesajlar:<br/>\n";
echo $fsize2;

echo "<select name=\"del_1_up$ref\">\n";
if($del_1 == 1){
echo "<option value=\"1\">1 g&#252;n </option>\n";
echo "<option value=\"2\">2 g&#252;n </option>\n";
echo "<option value=\"4\">4 g&#252;n </option>\n";
echo "<option value=\"6\">6 g&#252;n </option>\n";
echo "<option value=\"8\">8 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
} elseif($del_1 == 2){
echo "<option value=\"2\">2 g&#252;n </option>\n";
echo "<option value=\"4\">4 g&#252;n </option>\n";
echo "<option value=\"6\">6 g&#252;n </option>\n";
echo "<option value=\"8\">8 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">1 g&#252;n </option>\n";
} elseif($del_1 == 4){
echo "<option value=\"4\">4 g&#252;n </option>\n";
echo "<option value=\"6\">6 g&#252;n </option>\n";
echo "<option value=\"8\">8 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">1 g&#252;n </option>\n";
echo "<option value=\"2\">2 g&#252;n </option>\n";
} elseif($del_1 == 6){
echo "<option value=\"6\">6 g&#252;n </option>\n";
echo "<option value=\"8\">8 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">1 g&#252;n </option>\n";
echo "<option value=\"2\">2 g&#252;n </option>\n";
echo "<option value=\"4\">4 g&#252;n </option>\n";
} elseif($del_1 == 8){
echo "<option value=\"8\">8 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">1 g&#252;n </option>\n";
echo "<option value=\"2\">2 g&#252;n </option>\n";
echo "<option value=\"4\">4 g&#252;n </option>\n";
echo "<option value=\"6\">6 g&#252;n </option>\n";
} else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">1 g&#252;n </option>\n";
echo "<option value=\"2\">2 g&#252;n </option>\n";
echo "<option value=\"4\">4 g&#252;n </option>\n";
echo "<option value=\"6\">6 g&#252;n </option>\n";
echo "<option value=\"8\">8 g&#252;n </option>\n";
}
echo "</select><br/>\n";




echo $fsize1;
echo "&#220;mumi mesajlar:<br/>\n";
echo $fsize2;

echo "<select name=\"del_2_up$ref\">\n";
if($del_2 == 01){
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
} elseif($del_2 == 02){
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
} elseif($del_2 == 04){
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
} elseif($del_2 == 06){
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
} elseif($del_2 == 08){
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
} elseif($del_2 == 10){
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
} elseif($del_2 == 12){
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
} elseif($del_2 == 15){
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
}else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
}
echo "</select><br/>\n";





echo $fsize1;
echo "Oxunmu&#351; Mektublar:<br/>\n";
echo $fsize2;

echo "<select name=\"del_3_up$ref\">\n";
if($del_3 == 01){
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
} elseif($del_3 == 02){
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
} elseif($del_3 == 04){
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
} elseif($del_3 == 06){
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
} elseif($del_3 == 08){
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
} elseif($del_3 == 10){
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
} elseif($del_3 == 12){
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
} elseif($del_3 == 15){
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
}else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"01\">1 g&#252;n </option>\n";
echo "<option value=\"02\">2 g&#252;n </option>\n";
echo "<option value=\"04\">4 g&#252;n </option>\n";
echo "<option value=\"06\">6 g&#252;n </option>\n";
echo "<option value=\"08\">8 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"12\">12 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
}
echo "</select><br/>\n";





echo $fsize1;
echo "&#220;mumi Mektublar:<br/>\n";
echo $fsize2;

echo "<select name=\"del_4_up$ref\">\n";
if($del_4 == 5){
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
}elseif($del_4 == 10){
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
}elseif($del_4 == 15){
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
}elseif($del_4 == 20){
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
}elseif($del_4 == 30){
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
}elseif($del_4 == 45){
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
}elseif($del_4 == 60){
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
}elseif($del_4 == 90){
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
}else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"5\">5 g&#252;n </option>\n";
echo "<option value=\"10\">10 g&#252;n </option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"20\">20 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
}
echo "</select><br/>\n";





echo $fsize1;
echo "Passiv istifade&#231;ilerin silinmesi:<br/>\n";
echo $fsize2;

echo "<select name=\"del_5_up$ref\">\n";
if($del_5 == 15){
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
}elseif($del_5 == 30){
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
}elseif($del_5 == 45){
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";

}elseif($del_5 == 60){
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";

}elseif($del_5 == 90){
echo "<option value=\"90\">90 g&#252;n </option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
}else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"15\">15 g&#252;n </option>\n";
echo "<option value=\"30\">30 g&#252;n </option>\n";
echo "<option value=\"45\">45 g&#252;n </option>\n";
echo "<option value=\"60\">60 g&#252;n </option>\n";
echo "<option value=\"90\">90 g&#252;n </option>\n";
}
echo "</select><br/>\n";




echo $fsize1;
echo "MySql bazanin temiri:<br/>\n";
echo $fsize2;

echo "<select name=\"del_6_up$ref\">\n";
if($del_6 == 1){
echo "<option value=\"1\">Aktiv</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
}else{
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Aktiv</option>\n";
}
echo "</select><br/>\n";



echo $fsize1;
echo $divide;

echo "[<anchor>Elave Et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=adel&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"del_1_up\" value=\"$(del_1_up$ref)\"/>\n";
echo "<postfield name=\"del_2_up\" value=\"$(del_2_up$ref)\"/>\n";
echo "<postfield name=\"del_3_up\" value=\"$(del_3_up$ref)\"/>\n";
echo "<postfield name=\"del_4_up\" value=\"$(del_4_up$ref)\"/>\n";
echo "<postfield name=\"del_5_up\" value=\"$(del_5_up$ref)\"/>\n";
echo "<postfield name=\"del_6_up\" value=\"$(del_6_up$ref)\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$error = 0;

if(!preg_match("!^[0-9]+$!i",$del_1_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_2_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_3_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_4_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_5_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_6_up)){$error = 1;}


if($error==0){
$file = fopen("file/dat_folder/delete.dat", "w");
$data .= "0\n";
$data .= "$del_1_up\n";
$data .= "$del_2_up\n";
$data .= "$del_3_up\n";
$data .= "$del_4_up\n";
$data .= "$del_5_up\n";
$data .= "$del_6_up";
fwrite($file, $data);
fclose($file);
$msg = "Melumatlar yenilendi!<br/>Te&#351;ekk&#252;rler...<br/>";
}
else
$msg = "Xeta ba&#351; verdi yeniden yoxlay&#305;n<br/>";

echo $fsize1;
echo $msg;
echo $fsize2;
}
break;


case 'r_p':
if($p_arr['38']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$fp = file( "file/dat_folder/reytinq.dat" );
$reytinq = trim( $fp[0] );
$test1 = trim( $fp[1] );
$datgun = trim( $fp[2] );
echo $fsize1;
echo "<b>Reytinq Panel</b><br/>\n";
echo $divide;
if ( !isset( $_POST['r_p'] ) )
{
    echo "Avtomatik Yenilensin (G&#252;n):<br/>\n";
    echo $fsize2;
    echo "<input size=\"2\" name=\"gun{$ref}\" value=\"{$datgun}\" title=\"Yenilenme m&#252;ddeti\"/><br/>\n";
    echo $fsize1;
    echo "Reytinqin Veziyyeti:<br/>\n";
    echo $fsize2;
    echo "<select name=\"r_p{$ref}\">\n";
    if ( $reytinq == 0 )
    {
        echo "<option value=\"0\">Aktiv A&#231;q </option>\n";
        echo "<option value=\"1\">Sesverme STOP</option>\n";
        echo "<option value=\"2\">Reytinq STOP</option>\n";
    }
    else if ( $reytinq == 1 )
    {
        echo "<option value=\"1\">Sesverme STOP </option>\n";
        echo "<option value=\"0\">Aktiv A&#231;q </option>\n";
        echo "<option value=\"2\">Reytinq STOP </option>\n";
    }
    else
    {
        echo "<option value=\"2\">Reytinq STOP </option>\n";
        echo "<option value=\"1\">Sesverme STOP </option>\n";
        echo "<option value=\"0\">Aktiv A&#231;q </option>\n";
    }
    echo "</select><br/>\n";
    echo $fsize1;
    echo "<anchor>Deyi&#351;dir<go href=\"admin.php?go=r_p&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
    echo "<postfield name=\"gun\" value=\"\$(gun{$ref})\"/>\n";
    echo "<postfield name=\"r_p\" value=\"\$(r_p{$ref})\"/>\n";
    echo "</go></anchor><br/>\n";
    echo $divide;
    echo "<anchor>Reytinqi Temizle<go href=\"admin.php?go=r_p&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
    echo "<postfield name=\"r_p\" value=\"del\"/>\n";
    echo "</go></anchor><br/>\n";
    echo $fsize2;
}
else if ( $_POST['r_p'] == "del" )
{
    $dat = file( "file/dat_folder/enter.dat" );
    $test1 = trim( $dat[0] );
    $test2 = trim( $dat[1] );
    $test3 = trim( $dat[2] );
    $test7 = trim( $dat[6] );
    $test8 = trim( $dat[7] );
    $test9 = trim( $dat[8] );
    $test10 = trim( $dat[9] );
    $test11 = trim( $dat[10] );
    $test12 = trim( $dat[11] );
    $file = fopen( "file/dat_folder/enter.dat", "w" );
    $data = "{$test1}\n";
    $data .= "{$test2}\n";
    $data .= "{$test3}\n";
    $data .= "\n";
    $data .= "\n";
    $data .= "\n";
    $data .= "{$test7}\n";
    $data .= "{$test8}\n";
    $data .= "{$test9}\n";
    $data .= "{$test10}\n";
    $data .= "{$test11}\n";
    $data .= "{$test12}";
    fwrite( $file, $data );
    fclose( $file );
    $reytime = 86400 * $datgun + time( );
    $file = fopen( "file/dat_folder/reytinq.dat", "w" );
    $data = "{$reytinq}\n";
    $data .= "{$reytime}\n";
    $data .= "{$datgun}";
    fwrite( $file, $data );
    fclose( $file );
    mysql_query( "delete from reytinq" );
    mysql_query( "Update users set ses='0' where ses!='0'" );
    echo "<u>Reytinq Temizlendi</u><br/>\n";
    echo $divide;
    echo "<a href=\"admin.php?go=r_p&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    echo $fsize2;
}
else
{
    $newregtime = 86400 * $gun + time( );
    if ( $newregtime < $test1 )
    {
        $test1 = $newregtime;
    }
    $file = fopen( "file/dat_folder/reytinq.dat", "w" );
    $data = "{$r_p}\n";
    $data .= "{$test1}\n";
    $data .= "{$gun}";
    fwrite( $file, $data );
    fclose( $file );
    echo "<u>Reytinq Yenilendi</u><br/>\n";
    echo $divide;
    echo "<a href=\"admin.php?go=r_p&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    echo $fsize2;
}
break;

case 'o':
if($p_arr['43']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$max = $row['max'];
$rm = htmlspecialchars( $rm );
if ( $rm < 0 || 10 < $rm || !isset( $rm ) )
{
    exit( );
}
$room = "room".$rm;
if ( !isset( $leqeb ) && !isset( $nk ) )
{
    echo $fsize1;
    echo "Leqeb<br/>\n";
    echo $fsize2;
    echo "<input name=\"leqeb{$ref}\" title=\"Leqeb\" emptyok=\"true\"/><br/>\n";
    echo $fsize1;
    echo "Otaq:\n";
    echo $fsize2;
    echo "<select name=\"rm{$ref}\">\n";
    $i = 0;
    while ( $i <= 10 )
    {
        $levelselect = @mysql_query( "Select name from rooms where rm='".$i."'" );
        $levels = @mysql_fetch_array( $levelselect );
        $levelname = $levels['name'];
        echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
        ++$i;
    }
    echo "</select><br/>\n";
    echo $fsize1;
    echo "Rejim:\n";
    echo $fsize2;
    echo "<select name=\"p{$ref}\">\n";
    echo "<option value=\"0\">Ham&#305;s&#305; </option>\n";
    echo "<option value=\"1\">&#220;mumi </option>\n";
    echo "<option value=\"2\">&#350;exsi </option>\n";
    echo "</select><br/>\n";
    echo $fsize1;
    echo "<anchor title=\"go\">Yoxla<go href=\"admin.php?go=o&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
    echo "<postfield name=\"rm\" value=\"\$(rm{$ref})\"/>\n";
    echo "<postfield name=\"leqeb\" value=\"\$(leqeb{$ref})\"/>\n";
    echo "<postfield name=\"p\" value=\"\$(p{$ref})\"/>\n";
    echo "<postfield name=\"action\" value=\"go\"/>\n";
    echo "</go></anchor><br/>\n";
    echo $fsize2;
    break;
}
if ( !isset( $n ) || $n < 0 )
{
    $n = 0;
}
$seh = $n / 10;
if ( $leqeb != "" )
{
    if ( !ctype_digit( $leqeb ) )
    {
        $latuser = strtolower( $leqeb );
        $r = mysql_query( "select id,user from users where latuser = '".$latuser."'" );
    }
    else
    {
        $r = mysql_query( "select id,user from users where id = '".$leqeb."'" );
    }
}
else
{
    $r = mysql_query( "select id,user from users where id = '".$nk."'" );
}
$arr = mysql_fetch_array( $r );
$leqeb = $arr['user'];
$nk = $arr['id'];
$roomselect = @mysql_query( "Select name from rooms where rm='".$rm."' ;" );
$rooms = @mysql_fetch_array( $roomselect );
$roomname = $rooms['name'];
$bmax = $max * 2;
if ( $p == "0" )
{
    $res = mysql_query( "Select klu4,time,who,message,id,towhom,usid from {$room} where usid='".$nk."' or towhom='".$nk."' order by id desc LIMIT {$n},{$bmax}" );
    $mss = "***";
}
else if ( $p == "1" )
{
    $res = mysql_query( "Select klu4,time,who,message,id,towhom,usid from {$room} where usid='".$nk."' and (towhom='') order by id desc LIMIT {$n},{$bmax}" );
    $mss = "&#220;mumi";
}
else if ( $p == "2" )
{
    $res = mysql_query( "Select klu4,time,who,message,id,towhom,usid from {$room} where usid='".$nk."' and (towhom!='') order by id desc LIMIT {$n},{$bmax}" );
    $mss = "&#350;exsi";
}
$kol = mysql_affected_rows( );
@$total = $kol - 1;
echo $fsize1;
echo "<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;ref={$ref}\">{$leqeb}</a> - [{$roomname}] - {$mss}\n";
echo "<br/>---";
$mread = 0;
while ( $mread < $max )
{
    $data = mysql_fetch_array( $res );
    if ( $data === false )
    {
        break;
    }
    $klu4 = $data['klu4'];
    $date = $data['time'];
    $msg = $data['message'];
    $time = $data['id'];
    $th = $data['towhom'];
    if ( $th == "" )
    {
        echo "<br/><a href=\"del.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;rm={$rm}&amp;time={$date}&amp;klu4={$klu4}\">x</a>";
        echo "{$date}&gt;{$msg}";
        ++$mread;
    }
    else if ( $th != "" )
    {
        echo "<br/><a href=\"del.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;rm={$rm}&amp;time={$date}&amp;klu4={$klu4}\">x</a>";
        echo "<b>{$date}&gt;</b>{$msg}";
        ++$mread;
    }
}
mysql_close( $link );
$page_next = $n + $max;
$page_prev = $n - $max;
if ( $n == 0 )
{
    $total + 1;
}
if ( $max <= $n )
{
    echo "<br/><a href=\"admin.php?go=o&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;n={$page_prev}&amp;nk={$nk}&amp;ref={$ref}&amp;p={$p}\">&lt;&lt;&lt;</a>. -- \n";
}
else
{
    echo "<br/>\n";
}
if ( $n < $total )
{
    echo "<a href=\"admin.php?go=o&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;n={$page_next}&amp;nk={$nk}&amp;ref={$ref}&amp;p={$p}\">&gt;&gt;&gt;</a>. ";
}
echo "<br/>---<br/><a href=\"admin.php?go=o&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qayit</a>\n";
echo "<br/>\n";
echo $fsize2;
break;


case 'block':
if($id!='1'){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
if(empty($act)) {
$query = mysql_query("select COUNT(`id`) from `users` where `block`='1';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `id`,`user`,`why_block` from `users` where `block`='1' order by `ontime` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>Nikini block</b>,  eden istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Nikini block edenler</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$act = $arr['id'];
$sebeb = $arr['why_block'];
if($sebeb!="")$sebeb = "Sebeb: (<i>$sebeb</i>)";
echo "<b>$i</b>. <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$act&amp;ref=$ref\">$buser</a> - $sebeb [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=block&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=block&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=block&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=block&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Azad Et</a><br/>";
}
}
echo $fsize2;
} elseif($act=="del"){
echo $fsize1;
echo "<b>Nikini block</b> - <u>Edenler Azad Edildi!</u><br/>\n";
echo $fsize2;
mysql_query("UPDATE `users` SET `block` = '0' where `block` = '1';");
} else {
mysql_query("UPDATE `users` SET `block` = '0' where `id`='".$act."';");
print $fsize1;
echo "<u>$xuser</u>, Blockdan Azad Edildi...<br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=block&amp;ref=$ref\">Block Edenler</a><br/>";
echo $fsize2;
}
break;




case 'iqnore':
if($p_arr['92']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
if(empty($act)) {
$query = mysql_query("select COUNT(`id`) from `users` where `inv`='2';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `id`,`user`,`whokik`,`whykik` from `users` where `inv`='2' order by `ontime` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>Tam &#304;qnor</b>,  edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Tam Iqnor Edilib</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$sebeb = $arr['whykik'];
$moder = $arr['whokik'];
$act = $arr['id'];
if($sebeb!="")$sebeb = "Sebeb: (<i>$sebeb</i>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$act&amp;ref=$ref\">$buser</a> - $sebeb <b>$moder</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=iqnore&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=iqnore&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Azad Et</a><br/>";
}
}
echo $fsize2;
} elseif($act=="del"){
echo $fsize1;
echo "<b>Tam &#304;qnor</b> - <u>Edilenler Azad Edildi!</u><br/>\n";
echo $fsize2;
@$fi = fopen("file/control/4.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = base64_encode("<b>$user - \"Tam &#304;qnor\" Edilenleri Azad Etdi</b>. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query("UPDATE `users` SET `inv` = '0' where `inv` = '2';");
} else {
mysql_query("UPDATE `users` SET `inv` = '0' where `id`='".$act."';");
print $fsize1;
echo "<u>$xuser</u>, Tam &#304;qnordan Azad Edildi...<br/>";
@$fi = fopen("file/control/4.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebini Tam &#304;qnordan Azad Etdi. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=iqnore&amp;ref=$ref\">Iqnor Edilenler</a><br/>";
echo $fsize2;
}
break;


case 'banip':
if($p_arr['231']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}

if(empty($act)) {
$query = mysql_query("select COUNT(`klu4`) from `bannlist` where `soft`='IP-BAN';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `klu4`,`ip`,`soft`,`user`,`moder` from `bannlist` where `soft`='IP-BAN' order by `klu4` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>IP-Adress</b>-i  ban edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<b>IP-den ban Edilib</b>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$usip = $arr['ip'];
$browser = $arr['soft'];
$moder = $arr['moder'];
$act = $arr['klu4'];

echo "<b>$i</b>. <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$buser&amp;ref=$ref\">$buser</a> - <b>$usip</b>... Ban Eden: <u>$moder</u> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=banip&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=banip&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Deaktivle&#351;dir</a><br/>";
}
}
echo $fsize2;
} elseif($act=="del"){
mysql_query ("delete from `bannlist` where `soft`='IP-BAN';");
echo $fsize1;
echo "<b>IP-Adressi</b> - <u>BAN Edilenler Deaktivle&#351;dirildi!</u><br/>\n";
echo $fsize2;
@$fi = fopen("file/control/5.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = "".base64_encode("<b>$user B&#252;t&#252;n IP-Adreslere Edilen Banlar&#305; Deaktivle&#351;dirdi</b>! <u>$data</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
} else {
mysql_query ("delete from `bannlist` where `klu4` = '".$act."';");
print $fsize1;
echo "<u>$xuser</u>, IP-Adressindeki Ban Deaktivle&#351;dirildi...<br/>";
@$fi = fopen("file/control/5.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebinin IP-Adress Edilmi&#351; Ban&#305; Deaktivle&#351;dirdi. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=banip&amp;ref=$ref\">IP Ban Edilenler</a><br/>";
echo $fsize2;
}
break;


case 'bantel':
if($p_arr['231']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}

if(empty($act)) {
$query = mysql_query("select COUNT(`klu4`) from `bannlist` where `soft`!='IP-BAN';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `klu4`,`ip`,`soft`,`user`,`moder` from `bannlist` where `soft`!='IP-BAN' order by `klu4` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>Telefon Model</b>-i  ban edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<b>BAN Telefon</b>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$usip = $arr['ip'];
$browser = $arr['soft'];
$moder = $arr['moder'];
$act = $arr['klu4'];

echo "<b>$i</b>. <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$buser&amp;ref=$ref\">$buser</a> - $browser. <b>$moder</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=bantel&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=bantel&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Deaktivle&#351;dir</a><br/>";
}
}
echo $fsize2;
} elseif($act=="del"){
mysql_query ("delete from `bannlist` where `soft`!='IP-BAN';");
echo $fsize1;
echo "<b>Telefon Modeli</b> - <u>BAN Edilenler Deaktivle&#351;dirildi!</u><br/>\n";
echo $fsize2;
@$fi = fopen("file/control/4.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = base64_encode("<b>$user B&#252;t&#252;n Telefonlara Edilen Banlar&#305; Deaktivle&#351;dirdi</b>! <u>$data</u>")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
} else {
mysql_query ("delete from `bannlist` where `klu4` = '".$act."';");
print $fsize1;
echo "<u>$xuser</u>, Telefonundak&#305; Ban Deaktivle&#351;dirildi...<br/>";
@$fi = fopen("file/control/4.dat", "a+");
$data = date("d.m.y [H:i]",$SERVER_TIME);
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebinin Telefonuna Edilmi&#351; Ban&#305; Deaktivle&#351;dirdi.  [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=bantel&amp;ref=$ref\">IP Ban Edilenler</a><br/>";
echo $fsize2;
}
break;


case 'deluser':
if($p_arr['12']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$query = mysql_query("select COUNT(`id`) from `users` where `banned`='2';");
$all = @mysql_result($query, 0);
if(empty($act)) {
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$query = @mysql_query("SELECT `id`,`user`,`whokik`,`whykik` FROM `users` WHERE `banned`='2' order by `ontime` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>Leqebi</b>, Bazadan Silinen olmay&#305;b...</i><br/>\n";
echo $fsize2;
break;
} else {
echo "<b>Leqebi Bazadan Silinib</b> ($all)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($query);
$ban_id = $arr['id'];
$buser = $arr['user'];
$muellif = $arr['whokik'];
$sebeb = $arr['whykik'];
if($sebeb!="")$sebeb = "Sebeb: (<u>".$sebeb."</u>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$ban_id&amp;ref=$ref\">$buser</a> - $sebeb <b>$muellif</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;s=$s&amp;act=$ban_id\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$tes = $all/10;
$test = round($tes);

if (($all>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($all>10))echo "<br/>";
if($s==1){
echo "----<br/><a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=dall&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Sil</a><br/>\n";
echo "<a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=unpid&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Aktiv Et</a><br/>\n";
}
echo $fsize2;
}elseif($act=="dall"){
echo $fsize1;
echo "<b>Ban Edilmi&#351; &#304;stifade&#231;iler</b> - <u>Bazadan Silindi!</u><br/>\n";
echo $fsize2;
@$fi = fopen("file/control/8/9".$ref.".dat", "a+");
$data = date("d.m.Y [H:i]",$SERVER_TIME);
$qeyd .= "".base64_encode("<b>================</b>.")."\n";
$query = @mysql_query("SELECT `user`,`id` FROM `users` WHERE `banned`='2';");
for ($i=1;$i<=$all;$i++){
$arr = mysql_fetch_array($query);
$buser = $arr['user'];
$u_id = $arr['id'];
$qeyd .= "".base64_encode(":".$buser.":")."\n";
mysql_query ("delete from `albums` where `usid`='".$u_id."'");
mysql_query ("delete from `ignor` where `id`='".$u_id."' or `usid`='".$u_id."'");
mysql_query ("delete from `friends` where `id`='".$u_id."' or `usid`='".$u_id."'");
mysql_query ("delete from `zapiski` where `idtowhom`='".$u_id."' or `idwho`='".$u_id."'");
mysql_query ("delete from `c_nick` where `to`='".$u_id."'");
mysql_query ("delete from `mms` where `to`='".$u_id."' or `from`='".$u_id."'");
}
$qeyd .= base64_encode("<b>Bazadan Tam Silinenlerin siyah&#305;s&#305;</b>: <br/><u>Tarix</u>: $data")."\n";
@fwrite($fi, "$qeyd");
@fflush($fi);
@fclose($fi);
@$fi = fopen("file/control/8.dat", "a+");
$lst .= base64_encode("<b>Bazadan Silindiler Tesdiqlendi!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query ("delete from `users` where `banned`='2' and `id`>'11'");
}elseif($act=="unpid"){
print $fsize1;
echo "Bazadan Silinen B&#252;t&#252;n istifade&#231;iler Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print $fsize2;
$data = date("d.m.Y [H:i]",$vaxt);
@$fi = fopen("file/control/7.dat", "a+");
$lst .= base64_encode("<b>$user - Ban Edilenleri Qaytard&#305;!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
mysql_query("update `users` set `banned` = 0 where `banned`='2'");
}else{
settype($act, 'integer');
mysql_query("update `users` set `banned` = 0 where `id`='".$act."'");
print $fsize1;
echo "&#304;stifade&#231;i &#199;ata Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
print $fsize2;
}
break;


case 'leqebban':
if($p_arr['11']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$query = mysql_query("select COUNT(id) from users where `banned`='1';");
$all = @mysql_result($query, 0);
if(empty($act)) {
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$query = @mysql_query("SELECT `id`,`user`,`whokik`,`whykik` FROM `users` WHERE `banned`='1' order by `ontime` desc limit $o,$do;");
echo $fsize1;
if (mysql_affected_rows() == 0) {
echo "<i><b>Leqebi</b>, Ban Edilen istifade&#231;i olmay&#305;b...</i><br/>\n";
echo $fsize2;
break;
} else {
echo "<b>Leqebi Ban Edilib</b> ($all)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($query);
$ban_id = $arr['id'];
$buser = $arr['user'];
$muellif = $arr['whokik'];
$sebeb = $arr['whykik'];
if($sebeb!="")$sebeb = "Sebeb: (<u>".$sebeb."</u>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$ban_id&amp;ref=$ref\">$buser</a> - $sebeb <b>$muellif</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;s=$s&amp;act=$ban_id\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$tes = $all/10;
$test = round($tes);

if (($all>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($all>10))echo "<br/>";
if($s==1){
echo "----<br/><a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=dall&amp;ref=$ref\">Ban Edilenleri Sil</a><br/>\n";
echo "<a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=unpid&amp;ref=$ref\">Ban Edilenleri Aktiv Et</a><br/>\n";
}
echo $fsize2;
}elseif($act=="dall"){

echo $fsize1;
echo "<b>Ban Edilmi&#351; &#304;stifade&#231;iler</b> - <u>Bazadan Silindi!</u><br/>\n";
echo $fsize2;
@$fi = fopen("file/control/7/9".$ref.".dat", "a+");
$data = date("d.m.Y [H:i]",$vaxt);
$qeyd .= "".base64_encode("<b>================</b>.")."\n";
$query = @mysql_query("SELECT `user`,`id` FROM `users` WHERE `banned`='1';");
for ($i=1;$i<=$all;$i++){
$arr = mysql_fetch_array($query);
$buser = $arr['user'];
$u_id = $arr['id'];
$qeyd .= "".base64_encode(":".$buser.":")."\n";
mysql_query ("delete from `albom` where `idfoto`='".$u_id."';");
mysql_query ("delete from `ignor` where `id`='".$u_id."' or `usid`='".$u_id."';");
mysql_query ("delete from `friends` where `id`='".$u_id."' or `usid`='".$u_id."';");
mysql_query ("delete from `zapiski` where `idtowhom`='".$u_id."' or `idwho`='".$u_id."';");
mysql_query ("delete from `c_nick` where `to`='".$u_id."';");
mysql_query ("delete from `mms` where `to`='".$u_id."' or `from`='".$u_id."';");
}
$qeyd .= base64_encode("<b>Bazadan Tam Silinenlerin siyah&#305;s&#305;</b>: <br/><u>Tarix</u>: $data")."\n";
@fwrite($fi, "$qeyd");
@fflush($fi);
@fclose($fi);
@$fi = fopen("file/control/7.dat", "a+");
$lst .= base64_encode("<b>Ban Edilenler Bazadan Silindi!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

mysql_query ("delete from `users` where `banned`='1' and `id`>'11';");

}elseif($act=="unpid"){
print $fsize1;
echo "Ban Edilen B&#252;t&#252;n istifade&#231;iler Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print $fsize2;
$data = date("d.m.Y [H:i]",$vaxt);
@$fi = fopen("file/control/7.dat", "a+");
$lst .= base64_encode("<b>$user - Ban Edilenleri Qaytard&#305;!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query("update `users` set `banned` = 0 where `banned`='1';");

}else{
settype($act, 'integer');
mysql_query("update `users` set `banned` = 0 where `id`='".$act."';");
print $fsize1;
echo "Leqeb bandan azad edildi...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
print $fsize2;
}
break;


case 'mobi':
if($p_arr['27']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
if(empty($title)) $error=$error."<u>Ad yazilmayib!</u><br/>";
if(empty($content)) $error=$error."<u>Elan yazilmayib!</u><br/>";
if(empty($action)) {
print $fsize1;
echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";

print $divide;

echo "Adi:<br/>";
echo $fsize2;
echo "<input name=\"title\"/><br/>";
echo $fsize1;
echo "Metn:<br/>";
print $fsize2;
print "<input name=\"content\"/><br/>";
print $fsize1;
print "<anchor>Elave et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=mobi\" method=\"post\">";
print "<postfield name=\"action\" value=\"add\"/>";
print "<postfield name=\"title\" value=\"$(title)\"/>";
print "<postfield name=\"content\" value=\"$(content)\"/>";
print "</go></anchor>";
print $fsize2;
print "<br/>";
} else { if(empty($error)) {
if($title!=$last_obiav['title']) {
$title = narmobilfut($title);
$content = narmobilfut($content);
if(mysql_query("insert into `obiav` values(0,'$user','$title','$content');")) {
print $fsize1;
echo "<b>Elan elave edildi!</b><br/>";
echo $fsize2;
} else {
echo $fsize1;
echo "<b>Sehv var!</b><br/>";
echo $fsize2;
}
} else {
echo $fsize1;
echo "<b>Bele elan m&#246;vcuddur!</b><br/>";
print $fsize2;
}
} else {
print $fsize1;
print $error;
print $fsize2;
}
}
break;

case 'dobi':
if($p_arr['28']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$q = mysql_query("select * from `obiav` order by `id` desc;");
if (mysql_affected_rows() == 0) {
print $fsize1;
echo "Elan yoxdur!!!<br/>\n";
print $fsize2;
} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {
print $fsize1;
print "<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=dobi&amp;mid=".$arr['id']."\">".$arr['title']."</a><br/>";
print $fsize2;
}
} else {
if(mysql_query("delete from `obiav` where `id`='$mid' limit 1;")){
print $fsize1;
echo "<b>Elan silindi!</b><br/>";print $fsize2;
}
}
}
break;


case 'xelan_i':
if($p_arr['29']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
print $fsize1;
$q = mysql_query("select * from `elan` order by `saat` desc;");
if (mysql_affected_rows() == 0) {
print "Tebrik Mesaj&#305; Yoxdur...<br/>\n";
} else {
if(empty($action)) {
print "<b>Tebrik Mesajlar&#305;</b><br/>*****<br/>\n";

while($arr=mysql_fetch_array($q)) {
$saat = $arr['saat'];

$saat = $saat - time();
if($saat > 0){

if($saat < 60 && $saat > 0)
{
$vaxt = "saniyye\n";
}
elseif($saat < 3600 && $saat > 60)
{
$new = $saat;
$saat = $new/60;
$vaxt = "deqiqe\n";
}
elseif($saat < 86400 && $saat > 3600)
{
$new = $saat;
$saat = $new/3600;
$vaxt = "saat\n";
}
elseif($saat > 86400)
{
$new = $saat;
$saat = $new/86400;
$vaxt = "g&#252;n\n";
}
$saat = round($saat);
}
else
{
$saat ="Vaxt&#305; Bitib";
$vaxt = false;
}

print "".$arr['title']." - \"<b>".$arr['content']." ($saat $vaxt)</b>\" [<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>";
}
$action = $_GET['action'];
echo "----<br/><a href=\"admin.php?action=all&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Sil</a><br/>";
} elseif($action=="all") {
if(mysql_query("delete from `elan` where `saat` < '".time()."';")){
print "<u>Vaxt&#305; Bitmi&#351; B&#252;t&#252;n Tebrik Mesajlar&#305; Silindi!</u><br/>";
}
}else{
if(mysql_query("delete from `elan` where `id`='$mid' limit 1;")){
print "<b>Tebrik mesaj&#305; silindi!</b><br/>";
echo "----<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
}
}
print $fsize2;
break;

case 'extra':
if($p_arr['34']!=1 or ($p_arr['100']==0 and $p_arr['101']==0 and $p_arr['102']==0)){
echo $fsize1;
echo "Burda hecne yoxdur.<br/>\n";
echo $fsize2;
break;
}

switch ($fun){
default:
echo $fsize1;
echo "<b>Funksiyalar Paneli</b><br/>\n";
echo $divide;
echo "Leqeb / ID:<br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"nick\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
if($p_arr['100']==1){
echo "[<anchor title=\"go\">Znak ver<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">"; // 1
echo "<postfield name=\"nick\" value=\"$(nick)\"/>";
echo "<postfield name=\"fun\" value=\"1\"/>";
echo "</go></anchor>]<br/>\n";
}
if($p_arr['101']==1){
echo "[<anchor title=\"go\">ID d&#252;zelt<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>";
echo "<postfield name=\"fun\" value=\"2\"/>";
echo "</go></anchor>]<br/>\n";
}
if($p_arr['102']==1){
echo "[<anchor title=\"go\">R&#252;tbe ver<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>";
echo "<postfield name=\"fun\" value=\"3\"/>";
echo "</go></anchor>]<br/>\n";
}

echo $fsize2;
break;

case '1':
if($p_arr['100']!=1){
echo $fsize1;
echo "icazeniz yoxdur!<br/>\n";
echo $fsize2;
break;
}

echo $fsize1;
if ( !ctype_digit( $nick ) )
{
$nick = trim( $nick );
if ( $nick == "" )
{
$nick = 0;
}
$latuser = strtolower( $nick );
$ruser = rus_to_k( $nick );
if ( $ruser == $nick )
{
$select = mysql_query( "Select id,user,level,inv,zn from users where latuser = '".$latuser."'" );
}
else
{
$select = mysql_query( "select id,user,level,inv,zn from users where ruser = '".$ruser."'" );
}
}
else
{
$select = mysql_query( "Select id,user,level,inv,zn from users where id = '".$nick."'" );
}
if ( mysql_affected_rows( ) == 0 )
{
echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array( $select );
$usid = $inf['id'];
$nick = $inf['user'];
$level2 = $inf['level'];
$zn = $inf['zn'];
            if ( $usid == 1 && $id != 1 )
            {
                echo $fsize1;
                echo "Bax bu ujey olmaz:)<br/>\n";
                echo $fsize2;
                break;
            }

            if ( $usid == 19 && $id != 19 )
            {
                echo $fsize1;
                echo "Bax bu ujey olmaz:)<br/>\n";
                echo $fsize2;
                break;
            }
if ($_POST['znak'])
{
if ($_POST['znak'] == "x")
{
echo "\"<b>{$nick}</b>\" leqebli istifade&#231;iden znak le&#287;v edildi!<br/>";
mysql_query( "UPDATE users SET zn = '' where id='".$usid."'" );
}
else
{
echo "\"<b>{$nick}</b>\" leqebli istifade&#231;iye <img src=\"img/z".$znak.".gif\" alt=\".\"/> znak verildi.<br/>";
mysql_query( "UPDATE users SET zn = '".$_POST['znak']."' where id='".$usid."'" );
echo $fsize2;
break;
}
echo $fsize2;
break;
}
if ($zn != "")
{
$old_zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
}
if ($zn != "")
{
echo "<i>Znak&#305; le&#287;v etmek &#252;&#231;&#252;n  leqebe t&#305;klay&#305;</i>.<br/>\n";
}
if ($old_zn != "")
{
echo "\"<anchor>$old_zn <b>$nick</b> <go href=\"admin.php?go=extra&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
echo "<postfield name=\"fun\" value=\"1\"/>";
echo "<postfield name=\"znak\" value=\"x\"/>";
echo "<postfield name=\"nick\" value=\"{$nick}\"/>";
echo "</go></anchor>\" ";
}
else
{
echo "\"<b>{$nick}</b>\"\n";
}
echo "leqebli istifade&#231;i &#252;&#231;&#252;n znak se&#231;irsiz.<br/>\n";
echo $divide;
$num = 0;
while ( $num <= 300 )
{
if (file_exists("img/z".$num.".gif"))
{
echo "<anchor><img src=\"img/z".$num.".gif\" alt=\".\"/><go href=\"admin.php?id={$id}&amp;ps={$ps}&amp;go=extra&amp;ref={$ref}\" method=\"post\"><postfield name=\"fun\" value=\"1\"/><postfield name=\"znak\" value=\"{$num}\"/><postfield name=\"nick\" value=\"{$nick}\"/></go></anchor> ";
if ($num == 12)
{
echo "<br/>";
}
if ($num == 24)
{
echo "<br/>";
}
if ( $num == 36 )
{
echo "<br/>";
}
if ( $num == 48 )
{
echo "<br/>";
}
if ( $num == 60 )
{
echo "<br/>";
}
if ( $num == 72 )
{
echo "<br/>";
}
if ( $num == 84 )
{
echo "<br/>";
}
if ( $num == 96 )
{
echo "<br/>";
}
if ( $num == 108 )
{
echo "<br/>";
}
if ( $num == 120 )
{
echo "<br/>";
}
if ( $num == 132 )
{
echo "<br/>";
}
if ( $num == 144 )
{
echo "<br/>";
}
if ( $num == 156 )
{
echo "<br/>";
}
if ( $num == 168 )
{
echo "<br/>";
}
if ( $num == 180 )
{
echo "<br/>";
}
if ( $num == 192 )
{
echo "<br/>";
}
if ( $num == 204 )
{
echo "<br/>";
}
if ( $num == 216 )
{
echo "<br/>";
}
if ( $num == 228 )
{
echo "<br/>";
}
if ( $num == 240 )
{
echo "<br/>";
}
if ( $num == 252 )
{
echo "<br/>";
}
++$i;
}
++$num;
}
echo "<br/>\n";


echo $divide;
if ( 300 <= $i + 1 )
{
echo "<b>Maxsimum 300 znak elave etmek olar:(</b><br/>\n";
}
else
{
echo "<u>Znak elave etmek &#252;&#231;&#252;n</u>:<br/> \"<b>img</b>\" papkas&#305;na (z".( $i + 1 ).".gif), (z".( $i + 2 ).".gif), (z".( $i + 3 ).".gif) ve s adlar&#305; ile elave ede bilersiz. (maxsimum 300 znak)<br/>\n";
}
echo $fsize2;
break;



case '2':
if($p_arr['101']!=1){
echo $fsize1;
echo "Д°cazeniz yoxdur!<br/>\n";
echo $fsize2;
break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,level,inv,zn from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,level,inv,zn from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,level,inv,zn from users where id = '".$nick."'");
}

if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$nick = $inf["user"];
$level2=$inf["level"];
$zn=$inf["zn"];
if($level2 >= $row["level"]&&$id!=1){
echo $fsize1;
echo "Bax bu ujey olmaz:)<br/>\n";
echo $fsize2;
break;
}
$qus = mysql_query ("Select id from users order by id desc");
$ind = mysql_fetch_array ($qus);
$max_id = $ind["id"];


if($_POST["u_id"]!=""){
mysql_query ("select id from users where id='".$u_id."'");
if ((mysql_affected_rows() != 0)or($max_id<=$u_id) or preg_match("/[^0-9]+/",$u_id)) {
echo $fsize1;
if(preg_match("/[^0-9]+/",$u_id))
echo "ID n&#246;mresi yaln&#305;z reqemlerden ibaret olmal&#305;d&#305;r!<br/>\n";
else
if($max_id<=$u_id)echo "\"<b>$max_id</b>\"-den b&#246;y&#252;k  ID n&#246;mresi vermek olmaz!<br/>\n";
else
echo "Bu ID n&#246;mresi m&#246;vcuddur. Ba&#351;qa ID se&#231;in.<br/>\n";
echo $divide;
echo "<u>ID N&#246;mresi</u>:\n";
echo $fsize2;
echo "<input name=\"u_id$ref\" size=\"8\" value=\"$usid\" title=\"ID N&#246;mresi\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Deyi&#351;dir<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"fun\" value=\"2\"/>";
echo "<postfield name=\"u_id\" value=\"$(u_id$ref)\"/>";
echo "<postfield name=\"nick\" value=\"$usid\"/>";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
break;
}


echo $fsize1."\"<b>$nick</b>\" leqebli istifade&#231;iden ID n&#246;mresi deyi&#351;dirildi \"<b>$u_id</b>\" edildi!<br/>".$fsize2;

$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
mysql_query ("Update users set id='".$u_id."' where latuser ='".$latuser."'");
} else {
mysql_query ("Update users set id='".$u_id."' where ruser ='".$ruser."'");
}

mysql_query("UPDATE `friends` SET `usid` = '".$u_id."' where `usid`='".$usid."'");
mysql_query("UPDATE `friends` SET `id` = '".$u_id."' where `id`='".$usid."'");
mysql_query("UPDATE `ignor` SET `usid` = '".$u_id."' where `usid`='".$usid."'");
mysql_query("UPDATE `ignor` SET `id` = '".$u_id."' where `id`='".$usid."'");
mysql_query("UPDATE `hesab` SET `usid` = '".$u_id."' where `usid` = '".$usid."'");
mysql_query("UPDATE `albom` SET `idfoto` = '".$u_id."' where `idfoto` = '".$usid."'");
mysql_query("UPDATE `mms` SET `d1` = '1', `d2` = '1'  where `to`='".$usid."' or `from`='".$usid."'");
mysql_query("UPDATE `c_nick` SET `to` = '".$u_id."' where `to` = '".$usid."'");

if(file_exists("i/".$usid.".gif")){
if(file_exists("i/".$u_id.".gif"))
@unlink("i/".$u_id.".gif");
@rename("i/".$usid.".gif", "i/".$u_id.".gif");
}
if(file_exists("file/select/".$usid.".reg")){
@rename("file/select/".$usid.".reg", "file/select/".$u_id.".reg");
}
if(file_exists("file/select/".$usid.".php")){
@rename("file/select/".$usid.".php", "file/select/".$u_id.".php");
}
break;
}

echo $fsize1;
echo "<b>Qeyd: $max_id</b>-dan a&#351;aq&#305; id reqemi vere bilersiz.<br/>\n";
echo $divide;

echo "Leqeb: <b>$nick</b><br/>\n";
echo "<u>ID N&#246;mresi</u>:\n";
echo $fsize2;
echo "<input name=\"u_id$ref\" size=\"8\" value=\"$usid\" title=\"ID N&#246;mresi\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Deyi&#351;dir<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"fun\" value=\"2\"/>";
echo "<postfield name=\"u_id\" value=\"$(u_id$ref)\"/>";
echo "<postfield name=\"nick\" value=\"$usid\"/>";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
break;





case '3':
if($p_arr['102']!=1){
echo $fsize1;
echo "Д°cazeniz yoxdur!<br/>\n";
echo $fsize2;
break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,level,inv,zn from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,level,inv,zn from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,level,inv,zn from users where id = '".$nick."'");
}

if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$nick = $inf["user"];
$level2=$inf["level"];
$room=$inf["room"];
$zn=$inf["zn"];
if($level2 >= $row["level"]&&$id!=1){
echo $fsize1;
echo "Bax bu ujey olmaz:)<br/>\n";
echo $fsize2;
break;
}


if($_POST["mud"]!="" and $_POST["secund"]!=""){
if ($inf["level"]>$row["level"]){
$levelselect = @mysql_query ("Select name from levels where level='".$level2."'");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];
echo $fsize1;
echo "Bu &#350;exsin <b>".$levelname."</b> r&#252;tbesi var. Vaxt ile r&#252;tbe vermek olmaz...<br/>";
echo $fsize2;
break;
}
settype($rutbe, 'integer');
settype($mud, 'integer');
if($secund==0)$mud=3;
if($mud==0){
$rutbevaxt = $secund*86400+$vaxt;
}elseif($mud==1){
$rutbevaxt = $secund*2592000+$vaxt;
}else{
$rutbevaxt = 0;
$rutbe = 0;
}
$ins_str = "Update users set  level='".$rutbe."', rutbe = '".$rutbevaxt."' where id ='".$usid."'";
if (mysql_query ($ins_str)) {
if (($level2 != $rutbe)&&($elan!="0")){
$levelselect = @mysql_query ("Select name from levels where level='".$rutbe."'");
$levels = @mysql_fetch_array($levelselect);
$ur=$levels["name"];
if($elan==2){
$rutbevaxt = $rutbevaxt - $vaxt;
if($rutbevaxt < 3600 && $rutbevaxt > 59)
{
$new = $rutbevaxt;
$rutbevaxt = $new/60;
$secund = "deqiqelik\n";
}
elseif($rutbevaxt < 86400 && $rutbevaxt >=3599)
{
$new = $rutbevaxt;
$rutbevaxt = $new/3600;
$secund = "saatl&#305;q\n";
}
elseif($rutbevaxt > 86399)
{
$new = $rutbevaxt;
$rutbevaxt = $new/86400;
$secund = "g&#252;nl&#252;k\n";
}
$rutbevaxt = round($rutbevaxt);
}
for ($i=0; $i<=10; $i++){
$st = $vaxt;
$today=date ("H:i");
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
if($elan==1){$mes = "<b>DiQQET! $user <u>".$nick."</u>  Leqebli  istifade&#231;ini ".$ur." vezifesine teyin etdi!</b>";}
else
{
$mes = "<b>DiQQET! $user <u>".$nick."</u> Leqebli  istifade&#231;iye <u>".$rutbevaxt." ".$secund."</u>, ".$ur." vezifesi teyin etdi</b>!";
}
$rnd = rand(0,99999999);
@mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Status', message='".$mes."', id='".$st."', towhom='', hid='0', usid='9'");
}
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
$data = date("d.m.Y [H:i]",$vaxt);
$kol = rand(0,99999999);
$topic = "Tebrikler!";
$message = "<b>".$nick."</b>!Tebrik edirem. Siz Bu vezifeye layiq goruldunuz. ".$lev." <b>".$user."</b> qerara aldiki size <b>".$ur."</b> vezifesini teyin etsin.Edaletli olun.Eger sizden 1 shikayet gelse ve bu dogru olsa Vezife geri qaytarilmamaq shertile alinacaq.Sui istifade olunsa Vezife yene geri alinacaq.Hech bir user Haqqinda Heckime Melumat verile bilmez,eks teqdirde Vezife alinacaq!";
@mysql_query("insert into zapiski values(0,'Status','0','".$message."','".$nick."','".$upid."','".$vaxt."','0','".$topic."','".$data."','1','1');");
}
mysql_query ("Update users set time='".$vaxt."', room='".$room."' where id ='9'");

echo $fsize1;
echo "<b><b>Melumat yenilendi.</b></b><br/>\n";
echo $fsize2;
} else {
echo $fsize1;
echo "Database error:<br/>\n";
echo $fsize2;
echo " ".mysql_error()." ";
}
break;
}

echo $fsize1;
echo "Leqeb: <b>$nick</b><br/>\n";
echo $divide;

echo "R&#252;tbe:<br/>\n";
echo $fsize2;
echo "<select name=\"level$ref\">\n";
if($inf["level"] != 0) {
$i = $inf["level"];
$levelselect = @mysql_query ("Select name from levels where level='".$i."'");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];;
echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
}
if ($row["level"]==9){
for($i = 4; $i <= 8; $i++) {
$levelselect = @mysql_query ("Select name from levels where level='".$i."' order by level desc;");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];;
echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
}
}
echo "</select><br/>\n";

echo $fsize1;
echo "M&#252;ddet:<br/>\n";
echo $fsize2;

echo "<input name=\"secund$ref\" title=\"Vaxt\" maxlength=\"2\" format=\"*N\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "N&#246;v: - :\n";
echo $fsize2;
echo "<select name=\"mud$ref\">\n";
echo "<option value=\"0\">G&#252;nl&#252;k </option>\n";
echo "<option value=\"1\">Ayl&#305;q </option>\n";
echo "</select><br/>\n";

echo $fsize1;
echo "Otaqlara Elan:<br/>\n";
echo $fsize2;
echo "<select name=\"elan$ref\">\n";
echo "<option value=\"0\">Elans&#305;z</option>\n";
echo "<option value=\"1\">Vaxt bilinmesin</option>\n";
echo "<option value=\"2\">Oldu&#287;u kimi d&#252;&#351;s&#252;n</option>\n";
echo "</select><br/>\n";

echo $fsize1;
echo $divide;
echo "[<anchor title=\"go\">R&#252;tbe ver<go href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$usid\"/>";
echo "<postfield name=\"rutbe\" value=\"$(level$ref)\"/>";
echo "<postfield name=\"secund\" value=\"$(secund$ref)\"/>";
echo "<postfield name=\"mud\" value=\"$(mud$ref)\"/>";
echo "<postfield name=\"elan\" value=\"$(elan$ref)\"/>";
echo "<postfield name=\"fun\" value=\"3\"/>";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
break;
}
break;


case 'infous':
if($p_arr['6']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}

if(!isset($_POST['upid']))
{
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select * from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select * from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select * from users where id = '".$nick."'");
}
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$u_user = $inf["user"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$level2=$inf["level"];
if($level2 >= $row["level"]&&$id!=1){
echo $fsize1;
echo "Bax bu ujey olmaz:)<br/>\n";
echo $fsize2;
break;
}
echo $fsize1;
echo "Leqebi:\n";
echo "<b>$u_user</b><br/>-----<br/>\n";
$name = $inf['name'];
echo "Ad&#305;:<br/>\n";
echo $fsize2;
echo "<input name=\"name$ref\" value=\"$name\" title=\"Ad&#305;\"/><br/>\n";
echo $fsize1;
echo "Cinsi:<br/>\n";
echo $fsize2;
echo "<select name=\"sex$ref\">\n";
if($inf["sex"] == 0){
echo "<option value=\"0\">Ki&#351;i </option>\n";
echo "<option value=\"1\">Qad&#305;n </option>\n";
} else {
echo "<option value=\"1\">Qad&#305;n </option>\n";
echo "<option value=\"0\">Ki&#351;i </option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
@list( $day, $month, $year ) = split( '-', $inf["birth"] );
echo "Do&#287;um Tarixi:<br/>\n";
echo $fsize2;
echo "<input size=\"2\" name=\"day$ref\" value=\"$day\" maxlength=\"2\" format=\"*N\"/><small>-</small><input size=\"2\" name=\"month$ref\" value=\"$month\" maxlength=\"2\" format=\"*N\"/><small>-</small><input size=\"4\" name=\"year$ref\" value=\"$year\"  maxlength=\"4\" format=\"*N\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "Ya&#351;ad&#305;&#287;&#305; yer:<br/>\n";
echo $fsize2;
$city = $inf['city'];
echo "<input name=\"city$ref\" value=\"$city\" title=\"&#350;eher\"/><br/>\n";
echo $fsize1;
echo "N&#246;mresi:<br/>\n";
echo $fsize2;
echo "<input name=\"nom$ref\" value=\"$inf[nomre]\" title=\"N&#246;mresi\"/><br/>\n";
echo $fsize1;
echo "Haqq&#305;nda:<br/>\n";
echo $fsize2;
$infa = $inf['infa'];
echo "<input name=\"infa$ref\" value=\"$infa\" title=\"Haqq&#305;nda\"/><br/>\n";
echo $fsize1;
echo "Mektublara cavab:<br/>\n";
echo $fsize2;
$avtootvet = $inf['avtootvet'];
echo "<input name=\"avtootvet$ref\" maxlength=\"250\" value=\"$avtootvet\" title=\"Mektublara cavab\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "&#199;atda Meqsed:<br/>\n";
echo $fsize2;
if($inf["meqsed"] === "0"){
echo "<select name=\"meqsed$ref\">\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"3\">Dost Tapmaq</option>\n";
echo "</select><br/>\n";
}elseif($inf["meqsed"] === "1"){
echo "<select name=\"meqsed$ref\">\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"3\">Dost Tapmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "</select><br/>\n";
}elseif($inf["meqsed"] === "2"){
echo "<select name=\"meqsed$ref\">\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"3\">Dost Tapmaq</option>\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "</select><br/>\n";
}else{
echo "<select name=\"meqsed$ref\">\n";
echo "<option value=\"3\">Dost Tapmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "</select><br/>\n";
}


echo $fsize1;
echo "<anchor title=\"go\">Deyi&#351;dir<go href=\"admin.php?go=infous&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"upid\" value=\"$usid\"/>\n";
echo "<postfield name=\"name\" value=\"$(name$ref)\"/>\n";
echo "<postfield name=\"sex\" value=\"$(sex$ref)\"/>\n";
echo "<postfield name=\"city\" value=\"$(city$ref)\"/>\n";
echo "<postfield name=\"infa\" value=\"$(infa$ref)\"/>\n";
echo "<postfield name=\"day\" value=\"$(day$ref)\"/>\n";
echo "<postfield name=\"month\" value=\"$(month$ref)\"/>\n";
echo "<postfield name=\"year\" value=\"$(year$ref)\"/>\n";
echo "<postfield name=\"nom\" value=\"$(nom$ref)\"/>\n";
echo "<postfield name=\"avtootvet\" value=\"$(avtootvet$ref)\"/>\n";
echo "<postfield name=\"meqsed\" value=\"$(meqsed$ref)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
}
else
{
$error = false;
$emp2 = "Melumat Formati Duzgun Deyil.!";
$emp = "Butun Bolmeler(esasen *(ulduz olan bolmeler) tamamlanmayib!";
$wrongdate = "Dogum Tarixi Duzgun Yazilmayib.Bu Reala Uygun Olmalidir =)";
$god=date("Y")-10;

if ($name == "") {echo "&#304;stifade&#231;inin ad&#305;n&#305; yazmad&#305;z.<br/>";}
elseif ((strlen($day) !== 2)||($day>31)){echo "Anadan oldu&#287;u g&#252;n&#252; d&#252;zg&#252;n deyil.<br/>";}
elseif ((strlen($month) !== 2)||($month>12)){echo "Anadan oldu&#287;u ay d&#252;zg&#252;n deyil.<br/>";}
elseif ((strlen($year) !== 4)||($year>=$god)||($year<1970)){echo "Anadan oldu&#287;u &#304;l d&#252;zg&#252;n deyil.<br/>";}
else {
$day = check($day);
$month = check($month);
$year = check($year);
$city = check($city);
$nom = check($nom);
$infa = check($infa);
$avtootvet = check($avtootvet);
$infa=substr($infa,0,400);
$avtootvet=substr($avtootvet,0,1000);

if(!preg_match("!^[0-9]+$!i",$day)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}
elseif(!preg_match("!^[0-9]+$!i",$month)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}
elseif(!preg_match("!^[0-9]+$!i",$year)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}

if($error){
echo $fsize1;
echo $error."<br/>";
echo $fsize2;
break;
}
        $name = HtmlSpecialChars($name);
        $day = HtmlSpecialChars($day);
        $month = HtmlSpecialChars($month);
        $year = HtmlSpecialChars($year);
        $infa = HtmlSpecialChars($infa);
        $nom = HtmlSpecialChars($nom);
        $avtootvet = HtmlSpecialChars($avtootvet);

$name = narmobilfut($name);
$infa = narmobilfut($infa);
$city = narmobilfut($city);

settype($meqsed, 'integer');
settype($upid, 'integer');
settype($sex, 'integer');
$birth = "$day-$month-$year";
$ins_str = "Update users set name='".$name."', birth='".$birth."', meqsed='".$meqsed."', avtootvet='".$avtootvet."', nomre='".$nom."', sex='".$sex."', city='".$city."', infa='".$infa."' where id = '".$upid."'";
if (mysql_query ($ins_str)) {
echo $fsize1;
echo "<b>Melumat Yenilendi</b><br/>";
echo $fsize2;
}
else
{
echo $fsize1;
echo "Xeta:".mysql_error()."<br/>";
echo $fsize2;
}
}
}
break;


case 'view':
if($p_arr['2']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
            if ( !ctype_digit( $nick ) )
            {
                $nick = trim( $nick );
                if ( $nick == "" )
                {
                    $nick = 0;
                }
                $latuser = strtolower( $nick );
                $ruser = rus_to_k( $nick );
                if ( $ruser == $nick )
                {
                    $select = mysql_query( "Select id,user,date,pass,posts,delmsg,status,level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,forum,reh from users where latuser = '".$latuser."'" );
                }
                else
                {
                    $select = mysql_query( "select id,user,date,pass,posts,delmsg,status,level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,forum from,reh users where ruser = '".$ruser."'" );
                }
            }
            else
            {
                $select = mysql_query( "Select id,user,date,pass,posts,delmsg,status,level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,forum,reh from users where id = '".$nick."'" );
            }
            if ( mysql_affected_rows( ) == 0 )
            {
                echo $fsize1;
                echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
                echo $fsize2;
                break;
            }
            $inf = mysql_fetch_array( $select );
            $usid = $inf['id'];
            $us_ip = $inf['user_ip'];
            $us_soft = $inf['user_soft'];
            $level2 = $inf['level'];
            if ( $usid == 1 && $id != 1 )
            {
                echo $fsize1;
                echo "Bax bu ujey olmaz:)<br/>\n";
                echo $fsize2;
                break;
            }

            if ( $usid == 19 && $id != 19 )
            {
                echo $fsize1;
                echo "Bax bu ujey olmaz:)<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $usid == 0 && $id != 0 )
            {
                echo $fsize1;
                echo "Bax bu ujey olmaz:)<br/>\n";
                echo $fsize2;
                break;
            }
            echo $fsize1;
            echo "ID-N&#246;mre:\n";
            echo "{$usid}<br/>\n";
            echo "Leqebi:<br/>\n";
            echo $fsize2;
            echo "<input name=\"upnick{$ref}\" value=\"{$inf['user']}\" title=\"nick\"/><br/>\n";
            echo $fsize1;
            echo "Parol:<br/>\n";
            echo $fsize2;
            echo "<input name=\"upass{$ref}\" value=\"".base64_decode( $inf[pass] )."\" title=\"upass\"/><br/>\n";
            echo $fsize1;
            echo "Postlar&#305;:<br/>\n";
            echo $fsize2;
            echo "<input name=\"posts{$ref}\" value=\"".$inf['posts']."\" format=\"*N\" title=\"posts\"/><br/>\n";
            echo $fsize1;
            echo "Oyun postlar&#305;:<br/>\n";
            echo $fsize2;
            echo "<input name=\"gposts{$ref}\" value=\"{$inf['gposts']}\" format=\"*N\" title=\"gposts\"/><br/>\n";
            echo $fsize1;
            echo "Suala Cavablar&#305;:<br/>\n";
            echo $fsize2;
            echo "<input name=\"credits{$ref}\" value=\"{$inf['credits']}\" format=\"*N\" title=\"posts\"/><br/>\n";
            echo $fsize1;
            echo "Status:<br/>\n";
            echo $fsize2;
            echo "<input name=\"status{$ref}\" value=\"{$inf['status']}\" title=\"status\"/><br/>\n";
            echo $fsize1;
            echo "S&#246;zleri silmek:<br/>\n";
            echo $fsize2;
            echo "<select name=\"delmsg{$ref}\">\n";
            if ( $inf['delmsg'] == 0 )
            {
                echo "<option value=\"0\">Deaktiv </option>\n";
                echo "<option value=\"1\">Aktiv </option>\n";
            }
            else
            {
                echo "<option value=\"1\">Aktiv </option>\n";
                echo "<option value=\"0\">Deaktiv </option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "Toxunulmazl&#305;q:<br/>\n";
            echo $fsize2;
            echo "<select name=\"tox{$ref}\">\n";
            if ( $inf['tox'] == 0 )
            {
                echo "<option value=\"0\">Deaktiv </option>\n";
                echo "<option value=\"1\">Toxunulmaz </option>\n";
                echo "<option value=\"2\">Tam Toxunulmaz </option>\n";
            }
            else if ( $inf['tox'] == 1 )
            {
                echo "<option value=\"1\">Toxunulmaz </option>\n";
                echo "<option value=\"2\">Tam Toxunulmaz </option>\n";
                echo "<option value=\"0\">Deaktiv </option>\n";
            }
            else
            {
                echo "<option value=\"2\">Tam Toxunulmaz </option>\n";
                echo "<option value=\"1\">Toxunulmaz </option>\n";
                echo "<option value=\"0\">Deaktiv </option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "Tam Mexvilik:<br/>\n";
            echo $fsize2;
            echo "<select name=\"mexvi{$ref}\">\n";
            if ( $inf['mexvi'] == 0 )
            {
                echo "<option value=\"0\">Deaktiv </option>\n";
                echo "<option value=\"1\">Aktiv </option>\n";
            }
            else
            {
                echo "<option value=\"1\">Aktiv </option>\n";
                echo "<option value=\"0\">Deaktiv </option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "Rehberlikde Gorunsun?:<br/>\n";
            echo $fsize2;
            echo "<select name=\"reh{$ref}\">\n";
            if ( $inf['reh'] == 0 )
            {
                echo "<option value=\"0\">He</option>\n";
                echo "<option value=\"1\">Yox</option>\n";
            }
            else
            {
                echo "<option value=\"1\">Yox</option>\n";
                echo "<option value=\"0\">He</option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "&#350;exsini g&#246;rs&#252;n?:<br/>\n";
            echo $fsize2;
            echo "<select name=\"gizlilik{$ref}\">\n";
            if ( $inf['gizlilik'] == 0 )
            {
                echo "<option value=\"0\">Yox </option>\n";
                echo "<option value=\"2\">He </option>\n";
            }
            else
            {
                echo "<option value=\"2\">He </option>\n";
                echo "<option value=\"0\">Yox </option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "G&#246;r&#252;nmezlik:<br/>\n";
            echo $fsize2;
            echo "<select name=\"inv{$ref}\">\n";
            if ( $inf['inv'] == 0 )
            {
                echo "<option value=\"0\">Normal</option>\n";
            }
            else if ( $inf['inv'] == 1 )
            {
                echo "<option value=\"1\">G&#246;r&#252;nmez</option>\n";
            }
            else if ( $inf['inv'] == 3 )
            {
                echo "<option value=\"3\">Tam G&#246;r&#252;nmez</option>\n";
            }
            if ( $inf['inv'] != 0 )
            {
                echo "<option value=\"0\">Normal</option>\n";
            }
            if ( $inf['inv'] != 1 )
            {
                echo "<option value=\"1\">G&#246;r&#252;nmez</option>\n";
            }
            if ( $inf['inv'] != 3 )
            {
                echo "<option value=\"3\">Tam G&#246;r&#252;nmez</option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "&#350;riftin rengi:<br/>\n";
            echo $fsize2;
            echo "<select name=\"shrift{$ref}\">\n";
            if ( $inf['shrift'] == "" )
            {
                echo "<option value=\"\">Qara</option>\n";
            }
            else if ( $inf['shrift'] == "blue" )
            {
                echo "<option value=\"blue\">G&#246;y</option>\n";
            }
            else if ( $inf['shrift'] == "green" )
            {
                echo "<option value=\"green\">Ya&#351;l</option>\n";
            }
            else if ( $inf['shrift'] == "Magenta" )
            {
                echo "<option value=\"Magenta\">Nar&#305;nc&#305;</option>\n";
            }
            else if ( $inf['shrift'] == "Indigo" )
            {
                echo "<option value=\"Indigo\">Cehray&#305;</option>\n";
            }
            else if ( $inf['shrift'] == "red" )
            {
                echo "<option value=\"red\">Q&#305;rm&#305;z&#305;</option>\n";
            }
            else if ( $inf['shrift'] == "#990000" )
            {
                echo "<option value=\"#990000\">T&#252;nd Q&#305;rm&#305;z&#305;</option>\n";
            }
            else if ( $inf['shrift'] == "#990000" )
            {
                echo "<option value=\"#fda805\">Q&#305;z&#305;l</option>\n";
            }
            else if ( $inf['shrift'] == "" )
            {
                echo "<option value=\"\">Qara </option>\n";
            }
            echo "<option value=\"\">Qara </option>\n";
            echo "<option value=\"blue\">G&#246;y</option>\n";
            echo "<option value=\"green\">Ya&#351;&#305;l</option>\n";
            echo "<option value=\"Magenta\">Nar&#305;nc&#305;</option>\n";
            echo "<option value=\"Indigo\">Cehray&#305;</option>\n";
            echo "<option value=\"red\">Q&#305;rm&#305;z&#305;</option>\n";
            echo "<option value=\"#990000\">T&#252;nd Q&#305;rm&#305;z&#305;</option>\n";
            echo "<option value=\"#fda805\">Q&#305;z&#305;l</option>\n";
            echo "</select><br/>\n";
            echo $fsize1;
            echo "Qeydiyyat Tarixi:<br/>\n";
            echo $fsize2;
            list( $day, $month, $year ) = @split("-", @$inf['date']);
            echo "<input size=\"2\" name=\"days{$ref}\" value=\"{$day}\" maxlength=\"2\" format=\"*N\" emptyok=\"false\"/>-<input size=\"2\" name=\"months{$ref}\" value=\"{$month}\" maxlength=\"2\" format=\"*N\" emptyok=\"false\"/>-<input size=\"4\" name=\"years{$ref}\" value=\"{$year}\" maxlength=\"4\" format=\"*N\" emptyok=\"false\"/><br/>\n";
            echo $fsize1;
            echo "R&#252;tbe:<br/>\n";
            echo $fsize2;
            echo "<select name=\"level{$ref}\">\n";
            if ( $inf['level'] != 0 )
            {
                $i = $inf['level'];
                $levelselect = @mysql_query( @"Select name from levels where level='".@$i."'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $levelname = $levels['name'];
                echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
            }
            if ( $inf['level'] != 9 && $row['level'] == 9 )
            {
                $i = 0;
                while ( $i <= 9 )
                {
                    $levelselect = @mysql_query( @"Select name from levels where level='".@$i."'" );
                    $levels = @mysql_fetch_array( @$levelselect );
                    $levelname = $levels['name'];
                    echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
                    ++$i;
                }
            }
            else
            {
                $i = 0;
                while ( $i <= 8 )
                {
                    $levelselect = @mysql_query( @"Select name from levels where level='".@$i."'" );
                    $levels = @mysql_fetch_array( @$levelselect );
                    $levelname = $levels['name'];
                    echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
                    ++$i;
                }
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "Forumda R&#252;tbesi:<br/>\n";
            echo $fsize2;
            echo "<select name=\"forum{$ref}\">\n";
            if ( $inf['forum'] == 0 )
            {
                echo "<option value=\"0\">User</option>\n";
                echo "<option value=\"1\">Heveskar</option>\n";
                echo "<option value=\"2\">Moderator</option>\n";
                echo "<option value=\"3\">Admin</option>\n";
            }
            else if ( $inf['forum'] == 1 )
            {
                echo "<option value=\"1\">Heveskar</option>\n";
                echo "<option value=\"2\">Moderator</option>\n";
                echo "<option value=\"3\">Admin</option>\n";
                echo "<option value=\"0\">User</option>\n";
            }
            else if ( $inf['forum'] == 2 )
            {
                echo "<option value=\"2\">Moderator</option>\n";
                echo "<option value=\"3\">Admin</option>\n";
                echo "<option value=\"0\">User</option>\n";
                echo "<option value=\"1\">Heveskar</option>\n";
            }
            else
            {
                echo "<option value=\"3\">Admin</option>\n";
                echo "<option value=\"0\">User</option>\n";
                echo "<option value=\"1\">Heveskar</option>\n";
                echo "<option value=\"2\">Moderator</option>\n";
            }
            echo "</select><br/>\n";
            echo $fsize1;
            echo "-&gt;&gt; :\n";
            echo $fsize2;
            echo "<select name=\"elan{$ref}\">\n";
            echo "<option value=\"0\">Elans&#305;z gizli</option>\n";
            echo "<option value=\"1\">Elan ile </option>\n";
            echo "</select><br/>\n";
            echo "----<br/>";
            echo $fsize1;
            echo "IP-User:\n";
            echo "{$us_ip}<br/>\n";
            echo "Soft-User:\n";
            echo "{$us_soft}<br/>\n";
            echo $fsize2;
            echo "*****<br/>";
            echo $fsize1;
            echo "<anchor title=\"go\">Deyi&#351;dir<go href=\"admin.php?go=upd&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
            echo "<postfield name=\"upid\" value=\"{$usid}\"/>\n";
            echo "<postfield name=\"upnick\" value=\"$(upnick{$ref})\"/>\n";
            echo "<postfield name=\"day\" value=\"$(days{$ref})\"/>\n";
            echo "<postfield name=\"month\" value=\"$(months{$ref})\"/>\n";
            echo "<postfield name=\"year\" value=\"$(years{$ref})\"/>\n";
            echo "<postfield name=\"upass\" value=\"$(upass{$ref})\"/>\n";
            echo "<postfield name=\"posts\" value=\"$(posts{$ref})\"/>\n";
            echo "<postfield name=\"gposts\" value=\"$(gposts{$ref})\"/>\n";
            echo "<postfield name=\"credits\" value=\"$(credits{$ref})\"/>\n";
            echo "<postfield name=\"forum\" value=\"$(forum{$ref})\"/>\n";
            echo "<postfield name=\"status\" value=\"$(status{$ref})\"/>\n";
            echo "<postfield name=\"inv\" value=\"$(inv{$ref})\"/>\n";
            echo "<postfield name=\"level\" value=\"$(level{$ref})\"/>\n";
            echo "<postfield name=\"gizlilik\" value=\"$(gizlilik{$ref})\"/>\n";
            echo "<postfield name=\"delmsg\" value=\"$(delmsg{$ref})\"/>\n";
            echo "<postfield name=\"elan\" value=\"$(elan{$ref})\"/>\n";
            echo "<postfield name=\"mexvi\" value=\"$(mexvi{$ref})\"/>\n";
            echo "<postfield name=\"reh\" value=\"$(reh{$ref})\"/>\n";
            echo "<postfield name=\"tox\" value=\"$(tox{$ref})\"/>\n";
            echo "</go></anchor>\n";
            echo $fsize2;
            echo "<br/>\n";
            echo $fsize1;
            echo $divide;
            echo "<a href=\"enter.php?id={$usid}&amp;ps={$inf['pass']}&amp;ref={$ref}\">Bu Nikle Chata Gir</a><br/>";
            echo $fsize2;
break;

case 'upd':
if($p_arr['2']!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
            $upnick = trim( $upnick );
            if ( $upnick == "" )
            {
                echo $fsize1;
                echo "error<br/>\n";
                echo $fsize2;
                break;
            }
            settype( $upid, "integer" );
            $a = mysql_query( "SELECT user,level FROM users WHERE id ='".$upid."'" );
            $b = mysql_fetch_array( $a );
            $prl = $b['level'];
            $nick = $b['user'];
            $latuser = strtolower( $upnick );
            $ruser = rus_to_k( $upnick );
            if ( $ruser == $upnick )
            {
                mysql_query( "Select id from users where (latuser = '".$latuser."')and(user != '".$nick."')" );
            }
            else
            {
                mysql_query( "select id from users where (ruser = '".$ruser."')and(user != '".$nick."')" );
            }
            if ( mysql_affected_rows( ) != 0 )
            {
                echo $fsize1;
                echo "Bele istifade&#231;i artiq m&#246;vcuddur.<br/>\n";
                echo $fsize2;
                break;
            }
            $upnick = mysql_escape_string( $upnick );
            $upass = mysql_escape_string( $upass );
            $ruser = mysql_escape_string( $ruser );
            $latuser = mysql_escape_string( $latuser );
            $status = mysql_escape_string( $status );
            settype($posts, "integer");
            settype($gposts, "integer");
            settype($credits, "integer" );
            settype($inv, "integer");
            settype($level, "integer");
            settype($mexvi, "integer");
            settype($reh, "integer");
            settype($tox, "integer");
            $birth = "$day-$month-$year";
            if ($ruser == $upnick)
            {
                $ins_str = "Update users set user='".$upnick."', pass='".base64_encode( $upass )."', delmsg='".$delmsg."', gizlilik='".$gizlilik."', date='".$birth."', posts='".$posts."', gposts='".$gposts."', credits='".$credits."', status='".$status."', inv='".$inv."', level='".$level."', ruser = '', latuser = '".$latuser."', shrift = '".$shrift."', mexvi = '".$mexvi."', reh = '".$reh."', tox = '".$tox."', forum = '".$forum."' where id ='".$upid."'";
            }
            else
            {
                $ins_str = "Update users set user='".$upnick."', pass='".( $upass )."', delmsg='".$delmsg."', gizlilik='".$gizlilik."', date='".$birth."', posts='".$posts."',gposts='".$gposts."',credits='".$credits."', status='".$status."', inv='".$inv."', level='".$level."', ruser = '".$ruser."', latuser = '', shrift = '".$shrift."', mexvi = '".$mexvi."', reh = '".$reh."', tox = '".$tox."', forum = '".$forum."' where id ='".$upid."'";
            }
            if ( mysql_query( $ins_str ) )
            {
                if ( $prl != $level && $elan == "1" )
                {
                    $levelselect = @mysql_query( @"Select name from levels where level='".@$level."'" );
                    $levels = @mysql_fetch_array( @$levelselect );
                    $ur = $levels['name'];
                    $i = 0;
                    while ( $i <= 22 )
                    {
                        $st = time( );
                        $today = date( "H:i" );
                        $levelselect = @mysql_query( @"Select name from levels where level='".@$row['level']."'" );
                        $levels = @mysql_fetch_array( @$levelselect );
                        $lev = $levels['name'];
                        $mes = "<b>DiQQET! {$user} <u>".$nick."</u>  Leqebli  istifade&#231;ini ".$ur." vezifesine teyin etdi!</b>";
                        $rnd = rand( 0, 99999999 );
                        @mysql_query( @"Insert into room{$i} set klu4= '".@$rnd."', time='".@$today."', who='Status', message='".@$mes."', id='".@$st."', towhom='', hid='0', usid='1'" );
                        ++$i;
                    }
                    $levelselect = @mysql_query( @"Select name from levels where level='".@$row['level']."'" );
                    $levels = @mysql_fetch_array( @$levelselect );
                    $lev = $levels['name'];
                    $data = date( "d-M-Y [H:i]" );
                    $kol = rand( 0, 99999999 );
                    $time = time( );
                    $topic = "Tebrikler!";
                    $message = "<b>".$nick."</b>!Tebrik edirem. Siz Bu vezifeye layiq goruldunuz. ".$lev." <b>".$user."</b> qerara aldiki size <b>".$ur."</b> vezifesini teyin etsin.Edaletli olun.Eger sizden 1 shikayet gelse ve bu dogru olsa Vezife geri qaytarilmamaq shertile alinacaq.Sui istifade olunsa Vezife yene geri alinacaq.Hech bir user Haqqinda Heckime Melumat verile bilmez,eks teqdirde Vezife alinacaq!";
                    @mysql_query( @"insert into zapiski values(0,'Status','1','".@$message."','".@$nick."','".@$upid."','".@$time."','0','".@$topic."','".@$data."','1','1');" );
                }
                echo $fsize1;
                echo "<b>Melumat yenilendi.</b><br/>\n";
                echo $fsize2;
            }
            else
            {
                echo $fsize1;
                echo "Database error:<br/>\n";
                echo $fsize2;
                echo " ".mysql_error( )." ";
            }
break;
			
			
case 'anekdot':
echo $fsize1;
echo "Prikol:<br/>\n";
echo $fsize2;
echo "<input name=\"anek\" maxlength=\"255\" title=\"quest\"/><br/>\n";
echo $fsize1;
echo $divide;
echo $fsize2;
echo $fsize1;
echo "<anchor title=\"go\">Elave et<go href=\"admin.php?go=goanekdot&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"anek\" value=\"$(anek)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;

case 'goanekdot':
if ($row["translit"]==1)$anek = trun_to_rus($anek);
$anek = str_replace(chr("13"), " ", $anek);
$anek = str_replace(chr("10"), " ", $anek);
$anek = trim(" $anek ");
$anek = ereg_replace(" +"," ",$anek);
$anek=substr($anek,0,400);
$anek = str_replace("\n", " ", $anek);
$anek = str_replace("$", "$$", $anek);
$anek = HtmlSpecialChars($anek);
$anek=addslashes($anek);
$r = mysql_query("select * from anekdot");
$k = mysql_affected_rows()+1;
mysql_query ("Insert into anekdot set klu4= '".$k."', message='".$anek."'");
if (mysql_error() == false){
echo $fsize1;
echo "Anekdot Edildi.<br/>Te&#351;ekk&#252;rler<br/>*****<br/>\n";
echo "Bazada Cemi (<b>$k</b>) Anekdot var...<br/>\n";
echo $fsize2;
} else {
echo $fsize1;
echo "Sehv var!<br/>\n";
echo $fsize2;
echo "ERROR ".mysql_error()." ";
}
break;


case 'addvopr':
if($p_arr['10']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;
echo "Sual:<br/>\n";
echo $fsize2;
echo "<input name=\"vopros\" maxlength=\"255\" title=\"quest\"/><br/>\n";
echo $fsize1;
echo "Cavab:<br/>\n";
echo $fsize2;
echo "<input name=\"answ\" maxlength=\"60\" title=\"answ\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Elave et<go href=\"admin.php?go=goaddvopr&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"vopros\" value=\"$(vopros)\"/>\n";
echo "<postfield name=\"answ\" value=\"$(answ)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;


case 'goaddvopr':
if($p_arr['10']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$tran=strtr($answ,array("&#1056;°"=>"a","&#1056;±"=>"b","&#1056;&#1030;"=>"v","&#1056;&#1110;"=>"g","&#1056;&#1169;"=>"d","&#1056;µ"=>"e","&#1057;&#8216;"=>"e","&#1056;¶"=>"j","&#1056;·"=>"z","&#1056;&#1105;"=>"i","&#1056;&#8470;"=>"i","&#1056;&#1108;"=>"k","&#1056;»"=>"l","&#1056;&#1112;"=>"m","&#1056;&#1029;"=>"n","&#1056;&#1109;"=>"o","&#1056;&#1111;"=>"p","&#1057;&#1026;"=>"r","&#1057;&#1027;"=>"s","&#1057;&#8218;"=>"t","&#1057;&#1107;"=>"u","&#1057;&#8222;"=>"f","&#1057;&#8230;"=>"h","&#1057;&#8364;"=>"w","&#1057;&#8240;"=>"w","&#1057;&#8224;"=>"c","&#1057;&#8225;"=>"4","&#1057;&#1034;"=>".","&#1057;&#1033;"=>".","&#1057;&#8249;"=>"y","&#1057;&#1036;"=>"e","&#1057;&#1035;"=>"yu","&#1057;&#1039;"=>"ya","&#1056;&#1106;"=>"A","&#1056;&#8216;"=>"B","&#1056;&#8217;"=>"V","&#1056;&#8220;"=>"G","&#1056;&#8221;"=>"D","&#1056;&#8226;"=>"E","&#1056;&#1027;"=>"E","&#1056;&#8211;"=>"J","&#1056;&#8212;"=>"Z","&#1056;&#65533;"=>"I","&#1056;&#8482;"=>"I","&#1056;&#1113;"=>"K","&#1056;&#8250;"=>"L","&#1056;&#1114;"=>"M","&#1056;&#1116;"=>"N","&#1056;&#1115;"=>"O","&#1056;&#1119;"=>"P","&#1056; "=>"R","&#1056;&#1038;"=>"S","&#1056;&#1118;"=>"T","&#1056;&#1032;"=>"U","&#1056;¤"=>"F","&#1056;&#1168;"=>"H","&#1056;&#1025;"=>"W","&#1056;©"=>"W","&#1056;¦"=>"C","&#1056;§"=>"4","&#1056;¬"=>".","&#1056;&#1028;"=>".","&#1056;«"=>"Y","&#1056;­"=>"E","&#1056;®"=>"Yu","&#1056;&#1031;"=>"Ya"));
$vbaza = mysql_query ("Select * from `bots` order by `number` DESC");
$k = mysql_affected_rows()+1;
$vop = @mysql_fetch_array($vbaza);
$sonsual = $vop["vopros"];
if($sonsual!=$vopros)
mysql_query("insert into bots values(0,'$vopros','$answ','$tran');");
if (mysql_error() == false){
echo $fsize1;
echo "Sual elave edilib.<br/>\n";
echo "Cemi sual: $k <br/>\n";
echo $fsize2;
} else {
echo $fsize1;
echo "Sehv var!<br/>\n";
echo "".$k." ".$vopros." ".$answ." ".$tran." ";
echo $fsize2;
echo "ERROR ".mysql_error()." ";
}
break;

case 'tell':
if($p_arr['26']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;
echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";
print $divide;
echo "Metn:<br/>\n";
echo $fsize2;
echo "<input name=\"txt\" maxlength=\"1255\" title=\"text\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Gonder<go href=\"admin.php?go=gotell&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"txt\" value=\"$(txt)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;


case 'gotell':
if($p_arr['26']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$rnd = rand(0,99999999);
$today=date ("H:i");
function bricode($text){$text = str_replace("[/b]", "</b>", $text);$text = str_replace("[b]", "<b>", $text);$text = str_replace("[/u]", "</u>", $text);$text = str_replace("[u]", "<u>", $text);$text = str_replace("[/i]", "</i>", $text);$text = str_replace("[i]", "<i>", $text);$text = str_replace("[br]", "<br/>", $text);return $text;}
$txt = bricode($txt);
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$user."', message='".$txt."', id='".$vaxt."', towhom='', hid='0', usid='".$id."'");
}
if (mysql_error() == false){
echo $fsize1;
echo "Elan edildi.<br/>\n";
echo $fsize2;
} else {
echo $fsize1;
echo "Sehv var!<br/>\n";
echo $fsize2;
echo "ERROR ".mysql_error()." ";
}
break;

case 'delvopros':
if($p_arr['30']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
mysql_query ("DELETE from bots");
echo $fsize1;
echo "Bazada olan B&#252;t&#252;n suallar silindi!<br/>\n";
echo $fsize2;
break;

case 'delvoprose':
if($p_arr['30']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}

echo $fsize1;
if($act) {
settype($nom, 'integer');
if(mysql_query("delete from `bots` where `number` = '".$nom."';")){
print "".$nom." n&#246;mreli sual silindi...<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=delvoprose&amp;s=$s&amp;ref=$ref\">Bazadak&#305; Suallar</a><br/>";
$nom = $nom-1;
$select=mysql_query ("SELECT * FROM `bots` where `number` > '".$nom."';");
while ( $allu = mysql_fetch_array ($select) )
{
$nom = $allu["number"]-1;
$noms = $allu["number"];
@mysql_query ("update `bots` set `number` = '".$nom."' where `number` = '".$noms."';");
}
}
print $fsize2;
break;
}

echo "<b>Bazadak&#305; Suallar</b>-(Alim &#252;&#231;&#252;n)<br/>\n";
$vope = mysql_query ("select count(number) as num from bots;");
$usm = mysql_fetch_array($vope);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo "Cemi: $num | $n/$do<br/>---<br/>\n";

$r = mysql_query ("select number,vopros,answer from bots order by number ASC limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Bazada he&#231;bir sual yoxdur...<br/>\n";
} else{

for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
print "".$arr['number'].") ".$arr['vopros']." - (<b>".$arr['answer']."</b>) [<a href=\"admin.php?act=bots&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;go=delvoprose&amp;nom=".$arr['number']."&amp;ref=$ref\">x</a>]<br/>";
}



$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=delvoprose&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}


$tes = $num/10;
$test = round($tes);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"admin.php?go=delvoprose&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
echo $fsize2;

break;



case 'clroom':
if($p_arr['21']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>----<br/>';
if($rm!='') echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>\n";
else echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
break;
}
echo $fsize1;
echo "Sizin oldu&#287;unuz otaq silindi!<br/>\n";
echo $fsize2;
if(isset($rm)){
echo $fsize1;
echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>";
echo $fsize2;
}
$room = "room".$rm;
mysql_query("TRUNCATE TABLE `$room`;");

break;


case 'unpin':
if($p_arr['170']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$q = mysql_query("select `id`,`user`,`kik`,`whokik`,`whykik`,`time` from `users` where `kik` > '".time()."' order by `id` desc;");

echo $fsize1;
echo "<b>Xaric Edilibler</b>";
echo $fsize2;
echo "<br/>";
echo $divide;

if(empty($act)) {
while($arr=mysql_fetch_array($q)) {
$tkick = $arr['kik'] - time();
                if($tkick < 60 && $tkick > 0)
                {
                $vaxt = "san";
                }
                elseif($tkick < 3600 && $tkick > 60)
                {
                $new = $tkick;
                $tkick = $new/60;
                $vaxt = "deq";
                }
                elseif($tkick < 86400 && $tkick > 3600)
                {
                $new = $tkick;
                $tkick = $new/3600;
                $vaxt = "saat";
                }
                elseif($tkick > 86400)
                {
                $new = $tkick;
                $tkick = $new/86400;
                $vaxt = "g&#252;n";
                }
                $tkick = round($tkick);
echo $fsize1;

echo "<b>".$arr['user']."</b> - Xaric etdi: <u>".$arr['whokik']."</u> Sebeb: (".$arr['whykik'].") $tkick $vaxt [<a href=\"admin.php?act=".$arr['id']."&amp;id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">x</a>]<br/>";
echo $fsize2;
}
if (mysql_affected_rows() == 0){
echo $fsize1;
echo "Hal-haz&#305;rda Xaric edilen yoxdur.<br/>";
echo $fsize2;
}else{

echo $fsize1;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;act=all&amp;ref=$ref\">B&#252;t&#252;n xaric edilenleri qaytar</a><br/>";
echo $fsize2;
}
}elseif($act=="all") {
mysql_query("UPDATE `users` SET `kik` = '0' where `kik` != '0';");
print $fsize1;
echo "<u>B&#252;t&#252;n xaric edilenler</u>, Chata Qaydar&#305;ld&#305;!<br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Olunanlar</a><br/>";
echo $fsize2;
@$fi = fopen("file/control/5.dat", "a+");
$data = date("d.m.y [H:i]",$vaxt);
$lst = base64_encode("<b>$user vaxt ile qovulan bГјtГјn istifadeГ§ileri Г§ata qaytardД±</b>. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
} else {
if(mysql_query("UPDATE `users` SET `kik` = '0', `whokik` = '' where `id`='".$act."';")){
$usres = mysql_query("select `user` from `users` where `id`='".$act."';");
$ca=mysql_fetch_array($usres);
$xilas=$ca['user'];
print $fsize1;
echo "<u>$xilas</u>, Chata Qaydar&#305;ld&#305;!<br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Olunanlar</a><br/>";
echo $fsize2;
$data = date("d.m.y [H:i]",$vaxt);
@$fi = fopen("file/control/4.dat", "a+");
$lst = base64_encode("$user - \"<b>$xilas</b>\" leqebli istifadeГ§ini vaxtД±ndan evvel Г§ata qaytardД± [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
}
}
break;


case 'editrooms':
if($p_arr['32']!=1 or ($p_arr['97']!=1 and$p_arr['98']!=1 and $p_arr['99']!=1)){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;
echo "<b>Room Panel</b><br/>----<br/>\n";
echo $fsize2;

$act = $_GET["act"];
if(empty($act)) {
$q = mysql_query("select * from `rooms`;");
while($arr=mysql_fetch_array($q)) {
echo $fsize1;
if($arr['activ']!=1) {$activ_rm = '-Deaktiv';} else {$activ_rm = '';}
echo "<a href=\"admin.php?act=rnm&amp;id=$id&amp;ps=$ps&amp;go=editrooms&amp;rm=".$arr['rm']."&amp;ref=$ref\">".$arr['rm'].". ".$arr['name']."</a>".$activ_rm."<br/>";
echo $fsize2;
}
}elseif ($act=="dornm" and ($p_arr['97']==1 or $p_arr['98']==1 or $p_arr['99']==1)){
settype($rm, 'integer');

$savetable = $vergul ='';
if($p_arr['97']==1){
if($rmid<=9 and $rm!=10){
settype($rmid, 'integer');
$savetable .= "`pos`='".$rmid."'";
}
}
if($p_arr['98']==1){
if($savetable!='')$vergul = ','; else $vergul = '';
$roomname = mysql_escape_string($roomname);
$savetable .= $vergul."`name`='".$roomname."'";
}
if($p_arr['99']==1){
settype($nov, 'integer');
settype($point, 'integer');
if($savetable!='')$vergul = ','; else $vergul = '';
$savetable .= $vergul."`nov`='".$nov."', `point`='".$point."'";
}
if($p_arr['97']==1 and $p_arr['98']==1 and $p_arr['99']==1){
settype($activ, 'integer');
if($savetable!='')$vergul = ','; else $vergul = '';
$savetable .= $vergul."`activ`='".$activ."'";
}
mysql_query ("update `rooms` set ".$savetable." where `rm`='".$rm."'");
echo $fsize1;
echo "OtaqД±n adД± Deyi&#351;dirdi!<br/>----<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Geri qayД±t</a><br/>";
echo $fsize2;
} else {
settype($rm, 'integer');
$q = mysql_query("select `name`,`nov`,`point`,`pos`,`activ` from `rooms` where `rm`='".$rm."';");
$arr=mysql_fetch_array($q);
$name=$arr["name"];
$rmid=$arr["pos"];

if($p_arr['97']==1){
echo $fsize1;
echo "SД±ra nГ¶mresi:<br/>\n";
echo $fsize2;
echo "<input name=\"rmid$ref\" maxlength=\"2\" value=\"$rmid\"  format=\"*N\" title=\"sД±ra nГ¶mresi\"/><br/>\n";
}
if($p_arr['98']==1){
echo $fsize1;
echo "OtaДџД±n adД±:<br/>\n";
echo $fsize2;
echo "<input name=\"roomname$ref\" maxlength=\"200\" value=\"$name\" title=\"adД±\"/><br/>\n";
}
if($p_arr['99']==1){
echo $fsize1;
echo "Otaqa giri&#351; &#252;&#231;&#252;n:<br/>\n";
echo $fsize2;
echo "<input size =\"11\" name=\"point$ref\" maxlength=\"9\" value=\"$arr[point]\"/>";

echo "<select name=\"nov$ref\">\n";
if($arr["nov"] == 1){
echo "<option value=\"1\">Bal</option>\n";
echo "<option value=\"0\">Post</option>\n";
}else{
echo "<option value=\"0\">Post</option>\n";
echo "<option value=\"1\">Bal</option>\n";
}
echo "</select><br/>\n";
}
if($p_arr['97']==1 and $p_arr['98']==1 and $p_arr['99']==1){
echo $fsize1;
echo "OtaДџД±n veziyyeti:<br/>\n";
echo $fsize2;
echo "<select name=\"activ$ref\">\n";
if($arr["activ"] != '1'){
echo "<option value=\"0\">Deaktiv</option>\n";
echo "<option value=\"1\">Aktiv</option>\n";
}else{
echo "<option value=\"1\">Aktiv</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
}
echo "</select><br/>\n";
}

echo $fsize1;
echo "<anchor>DeyiЕџdir<go href=\"admin.php?act=dornm&amp;id=$id&amp;ps=$ps&amp;go=editrooms&amp;rm=$rm\" method=\"post\">\n";
if($p_arr['97']==1)
echo "<postfield name=\"rmid\" value=\"$(rmid$ref)\"/>\n";
if($p_arr['98']==1)
echo "<postfield name=\"roomname\" value=\"$(roomname$ref)\"/>\n";
if($p_arr['99']==1){
echo "<postfield name=\"nov\" value=\"$(nov$ref)\"/>\n";
echo "<postfield name=\"point\" value=\"$(point$ref)\"/>\n";
}
if($p_arr['97']==1 and $p_arr['98']==1 and $p_arr['99']==1)
echo "<postfield name=\"activ\" value=\"$(activ$ref)\"/>\n";

echo "</go></anchor>\n";
echo $fsize2;

echo "<br/>\n";
echo $fsize1;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Geri qayД±t</a><br/>";
echo $fsize2;
}
break;


case 'dsvadbi':
if($p_arr['31']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$q = mysql_query("select `id`,`bey`,`gelin`,`saat` from `toy` order by `id` desc;");
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Toy teyin edilmeyib!!!<br/>\n";
echo $fsize2;
} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {
echo $fsize1;
$saat = ($arr['saat']-$vaxt)/3600;
$saat = round($saat);
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;action=del&amp;go=dsvadbi&amp;mid=".$arr['id']."&amp;ref=$ref\"><b>".$arr['bey']." </b>ile <b>".$arr['gein']."</b>.</a> Elan (".$saat.") saatdan sonra silinecek<br/>";
echo $fsize2;
}
} else {
settype($mid, 'integer');
if(mysql_query("delete from `toy` where `id`='".$mid."' limit 1;")){
echo $fsize1;
echo "<b>Toy silindi!</b><br/>";
echo $fsize2;
}
}
}
break;

case 'on_time':
IF($id!=1){
    ECHO "Bura Olmaz!..<br/>";
}ELSE{
$file = file("file/dat_folder/time_online.dat");
$time = trim($file[0]);
$ras = trim($file[1]);
$admin = trim($file[2]);
$nomre = trim($file[3]);
echo $fsize1;

$fun = online_time();
$ontime = $fun[1];

if(!$action)
{
    $ras_name = strtr($ras, array("day"=>"G&#252;n", "hour"=>"Saat", "second"=>"Deqiqe"));
    echo "Onlayn vaxt&#305;: (<b>".$ontime."</b>)<br/>";
    echo $divide;
    echo $fsize2;
    echo "<input format=\"*N\" size=\"4\" value=\"".$time."\" name=\"time$ref\" emptyok=\"false\"/>";
    echo $fsize1." - ".$fsize2;
    echo "<select name=\"ras$ref\" value=\"".$ras."\">";
    echo "<option value=\"day\">G&#252;n</option>";
    echo "<option value=\"hour\">Saat</option>";
    echo "<option value=\"second\">Deqiqe</option>";
    echo "</select><br/>";
    echo $fsize1;
    echo "Admin niki:<br/>";
    echo "<input  value=\"".$admin."\" name=\"adm$ref\" emptyok=\"false\"/><br/>";
    echo "Admin n&#246;mre:<br/>";
    echo "<input  value=\"".$nomre."\" name=\"num$ref\" emptyok=\"false\"/><br/>";
    echo $fsize2;
    echo $fsize1;
    echo "[<anchor>Yenile<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=$go&amp;ref=$ref\" method=\"post\">\n";
    echo "<postfield name=\"time\" value=\"$(time$ref)\"/>\n";
    echo "<postfield name=\"ras\" value=\"$(ras$ref)\"/>\n";
    echo "<postfield name=\"adm\" value=\"$(adm$ref)\"/>\n";
    echo "<postfield name=\"num\" value=\"$(num$ref)\"/>\n";
    echo "<postfield name=\"action\" value=\"save\"/>\n";
    echo "</go></anchor>]<br/>\n";
}else{

    $error = false;
    $time_new = intval($_POST['time']);
    $ras_new = strtolower($_POST['ras']);
    $array = array("day","hour","second");
    $adm = $_POST['adm'];
    $num = $_POST['num'];

    if(!preg_match("!^[0-9]+$!i",$time_new))
    {
        $error = true;
    }
    else if(!in_array($ras_new,$array))
    {
        $error = true;
    }
    else if(empty($num))
    {
        $error = true;
    }
    if(!preg_match("!^[0-9]+$!i",$num))
    {
        $error = true;
    }

    if($error==false)
    {
        $file = fopen("file/dat_folder/time_online.dat", "w");
        $data .= "$time_new\n";
        $data .= "$ras_new\n";
        $data .= "$adm\n";
        $data .= "$num\n";
        fwrite($file, $data);
        fclose($file);
        echo "Onlayn vaxt&#305; yenilendi!..<br/>";
    }
    else
    {
        echo "Format d&#252;zg&#252;n deyil!..<br/>";
    }
    echo $divide;
    echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=$go&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
echo $fsize2;
}
break;


case 'gorush':
if($p_arr['24']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
if(empty($title)) $error=$error."<u>Ba&#351;l&#305;q yazmam&#305;s&#305;z!</u><br/>";
if(empty($content)) $error=$error."<u>Melumat tam ya&#305;lmay&#305;b!</u><br/>";
if(empty($organizatory)) $error=$error."<u>Melumat&#305; yerle&#351;diren yaz&#305;lmay&#305;b!</u><br/>";
if(empty($action)) {
print $fsize1;
print "Xeberin ba&#351;l&#305;&#287;&#305;:<br/>";
print $fsize2;
print "<input name=\"title\" maxlength=\"40\"/><br/>";
print $fsize1;
print "Metn:<br/>";
echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";
print $fsize2;
print "<input name=\"content\" maxlength=\"200\"/><br/>";
print $fsize1;
print "Te&#351;kilat&#231;&#305;lar:<br/>";
print $fsize2;
print "<input name=\"organizatory\" maxlength=\"200\"/><br/>";
print $fsize1;
print "<anchor>Elave et<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=gorush\" method=\"post\">";
print "<postfield name=\"action\" value=\"add\"/>";
print "<postfield name=\"title\" value=\"$(title)\"/>";
print "<postfield name=\"content\" value=\"$(content)\"/>";
print "<postfield name=\"organizatory\" value=\"$(organizatory)\"/>";
print "</go></anchor>";
print $fsize2;
print "<br/>";
} else {
if(empty($error)) {

$title = narmobil($title);
$content = narmobil($content);
$organizatory = narmobil($organizatory);

$xe = mysql_query ("Select * from `vstrechi` where `content` = '".$content."';");
if (mysql_affected_rows() == 0) {
if(mysql_query("insert into `vstrechi` values(0,'$user','$title','$content','$organizatory');")) {
print $fsize1;
print "<b>G&#246;r&#252;&#351; Teyin edildi.</b><br/>";
print $fsize2;
} else {
print $fsize1;
print "<i>Bazada problem var!</i><br/>";
print $fsize2;
}
} else {
print $fsize1;
print "<i>Eyni ile bu formada g&#246;r&#252;&#351; var!</i><br/>";
echo "*****<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=gorush&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
print $fsize2;
}
} else {
print $fsize1;
print $error;
print $fsize2;
}
}
break;

case 'xgorush':
if($p_arr['25']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$q = mysql_query("select `id`,`title`,`content` from `vstrechi` order by `id` desc;");
if (mysql_affected_rows() == 0) {
print $fsize1;
print "<i>G&#246;r&#252;&#351; Teyin Edilmeyib!</i><br/>\n";
print $fsize2;
} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {
print $fsize1;
print "<b>".$arr['title']."</b><br/>".$arr['content']." [<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=xgorush&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>";

print $fsize2;
}
} else {
if(mysql_query("delete from `vstrechi` where `id`='$mid' limit 1;")){
print $fsize1;
print "<b>G&#246;r&#252;&#351; le&#287;v edildi!</b><br/>";
echo "*****<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xgorush&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
print $fsize2;
}
}
}
break;

case 'dsvadbi':
$q = mysql_query("select id,bey,gelin,saat from toy order by id desc;");
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Toy teyin edilmeyib!!!<br/>\n";
echo $fsize2;
} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {
echo $fsize1;
$saat = ($arr['saat']-$vaxt)/3600;
$saat = round($saat);
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;action=del&amp;go=dsvadbi&amp;mid=".$arr['id']."&amp;ref=$ref\"><b>".$arr['bey']." </b>ile <b>".$arr['gelin']."</b>.</a> Elan (".$saat.") saatdan sonra silinecek<br/>";
echo $fsize2;
}
} else {
settype($mid, 'integer');
if(mysql_query("delete from toy where id='".$mid."' limit 1;")){
echo $fsize1;
echo "<b>Toy silindi!</b><br/>";
echo $fsize2;
}
}
}
break;


case 'razvod':
echo $fsize1;
echo "Kishinin Nicki:<br/>";
echo $fsize2;
echo "<input name=\"zhenih\" maxlength=\"12\"/><br/>";
echo $fsize1;
echo "Qadinin Nicki:<br/>";
echo $fsize2;
echo "<input name=\"nevesta\" maxlength=\"12\"/><br/>";

echo $fsize1;
echo "<anchor>Ayir<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=updrazvod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"zhenih\" value=\"$(zhenih)\"/>";
echo "<postfield name=\"nevesta\" value=\"$(nevesta)\"/>";
echo "</go></anchor>";
echo $fsize2;
echo "<br/>";
break;

case 'updrazvod':
if(empty($zhenih)) $error=$error."<u>Beyin bolmesi tamamlanmayib!</u><br/>";
if(empty($nevesta)) $error=$error."<u>Qizin bolmesi tamamlanmayib!</u><br/>";
$latuser=strtolower($zhenih);

$result = mysql_query ("Select * from users where latuser = '".$latuser."' and sex='0'");

if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "<u>Bele nickli  <b>".$zhenih."</b> oglan yoxdur.</u><br/>";
echo $fsize2;
break;
}
$raz=mysql_fetch_array($result);
$zhena=$raz['para'];
if ($zhena!=$nevesta){
echo $fsize1;
echo "<b>".$nevesta."</b> bu qiz nishanli deyil bu nicke <b>".$zhenih."</b>.<br/>";
echo $fsize2;
break;
}

$latuser2=strtolower($nevesta);
$result = mysql_query ("Select * from users where latuser = '".$latuser2."' and sex='1'");

$qiz = mysql_fetch_array ($result);
$qadin=$qiz["user"];
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "<u>Bele adli <b>".$nevesta."</b>  qiz yoxdur</u><br/>";
echo $fsize2;
break;
}
$raz=mysql_fetch_array($result);
$muj=$raz['para'];
if ($muj==$zhenih){
echo $fsize1;
echo "<b>".$zhenih." </b> eri deyil bu qizin: <b>".$nevesta."</b>.<br/>";
echo $fsize2;
break;
}
if(empty($error)) {
if($zhenih!=$last_svadbi['zhenih']) {
$zhenih=strtolower($zhenih);
$nevesta=strtolower($nevesta);
if(mysql_query("Update `users` set `para`='' where `latuser` ='".$zhenih."'")&&mysql_query("Update `users` set `para`='' where `latuser` ='".$nevesta."'")) {
echo $fsize1;
echo "<b>Ayr&#305;ld&#305;lar!</b><br/>";
echo $fsize2;
} else {
echo $fsize1;
echo "<b>Ayrilmaq mumkun deyil.Problem var!</b><br/>";
echo $fsize2;
}
} else {
echo $fsize1;
echo "<b>Bu insanlar choxdan ayrilib!</b><br/>";
echo $fsize2;
}
} else {
echo $fsize1;
echo $error;
echo $fsize2;
}
break;

case 'bots':
IF($p_arr[8]==0)
{
    ECHO "Bura Olmaz!..<br/>";
}
ELSE
{
if(!$_POST["action"]){
$setting = @mysql_query ("Select * from setting where klu4=1");
$set = mysql_fetch_array ($setting);
echo $fsize1;
echo "<b>Bot d&#252;zeli&#351;i:</b><br/>\n";
echo $divide;

echo "Chata qeydiyyat:<br/>\n";
echo $fsize2;
echo "<select name=\"reg$ref\">\n";
if($set["reg"] == 0){
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
} else {
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo $divide;
echo "Komp&#252;terden Qeydiyyat:<br/>\n";
echo $fsize2;
echo "<select name=\"computer$ref\">\n";
if($set["computer"] == 0){
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
} else {
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo $divide;
echo "Komp&#252;terden &#199;ata giri&#351;:<br/>\n";
echo $fsize2;
echo "<select name=\"komputer$ref\">\n";
if($set["komputer"] == 0){
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
} else {
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
echo "<option value=\"0\">Ba&#287;l&#305; </option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo "Sual-Cavaba Komp-dan cavab g&#246;t&#252;rmek:<br/>\n";
echo $fsize2;
echo "<select name=\"vict$ref\">\n";
if($set["vict"] == 0){
echo "<option value=\"0\">Yox</option>\n";
echo "<option value=\"1\">Beli</option>\n";
} else {
echo "<option value=\"1\">Beli</option>\n";
echo "<option value=\"0\">Yox</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
echo "A&#287;&#305;ll&#305;n&#305;n interval&#305;:<br/>\n";
echo $fsize2;
echo "<select name=\"victint$ref\">\n";
if($set["victint"] === "10"){
echo "<option value=\"10\">10</option>\n";
}
elseif($set["victint"] === "30"){
echo "<option value=\"30\">30</option>\n";
}
elseif($set["victint"] === "60"){
echo "<option value=\"60\">60</option>\n";
}
elseif($set["victint"] === "120"){
echo "<option value=\"120\">120</option>\n";
}
elseif($set["victint"] === "300"){
echo "<option value=\"300\">300</option>\n";
}
elseif($set["victint"] === "600"){
echo "<option value=\"600\">600</option>\n";
}
echo "<option value=\"10\">10</option>\n";
echo "<option value=\"30\">30</option>\n";
echo "<option value=\"60\">60</option>\n";
echo "<option value=\"120\">120</option>\n";
echo "<option value=\"300\">300</option>\n";
echo "<option value=\"600\">600</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Prikol:<br/>\n";
echo $fsize2;
echo "<select name=\"shut$ref\">\n";
if($set["shut"] == 0){
echo "<option value=\"0\">Yandir</option>\n";
echo "<option value=\"1\">Sondur</option>\n";
} else {
echo "<option value=\"1\">Sondur</option>\n";
echo "<option value=\"0\">Yandir</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
echo "Prikolun interval&#305;:<br/>\n";
echo $fsize2;
echo "<select name=\"shutint$ref\">\n";
if($set["shutint"] === "600"){
echo "<option value=\"600\">10</option>\n";
}
elseif($set["shutint"] === "1800"){
echo "<option value=\"1800\">30</option>\n";
}
elseif($set["shutint"] === "3600"){
echo "<option value=\"3600\">60</option>\n";
}
elseif($set["shutint"] === "7200"){
echo "<option value=\"7200\">120</option>\n";
}
echo "<option value=\"600\">10</option>\n";
echo "<option value=\"1800\">30</option>\n";
echo "<option value=\"3600\">60</option>\n";
echo "<option value=\"7200\">120</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Prikol &#252;&#231;&#252;n otaqlar:<br/>\n";
echo $fsize2;
echo "<input size=\"2\" name=\"roomon$ref\" maxlength=\"2\" value=\"$set[roomon]\" title=\"rmstart\"/>\n";
echo $fsize1;
echo "dan\n";
echo $fsize2;

echo "<input size=\"2\" name=\"roomoff$ref\" maxlength=\"2\" value=\"$set[roomoff]\" title=\"rmfinish\"/>\n";
echo $fsize1;
echo "qeder<br/>\n";
echo $fsize2;
echo $fsize1;
echo "Satici:<br/>\n";
echo $fsize2;
echo "<select name=\"prod$ref\">\n";
if($set["prod"] == 0){
echo "<option value=\"0\">Yandir</option>\n";
echo "<option value=\"1\">Sondur</option>\n";
} else {
echo "<option value=\"1\">Sondur</option>\n";
echo "<option value=\"0\">Yandir</option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo "Qeydiyyat Limit:<br/>\n";
echo $fsize2;
echo "<input size=\"2\" name=\"reglimit$ref\" maxlength=\"2\" value=\"$set[reglimit]\"/><br/>\n";
echo $fsize1;
echo $divide;
echo "<anchor>Yenile<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bots&amp;ref=$ref\" method=\"post\">\n";

echo "<postfield name=\"reg\" value=\"$(reg$ref)\"/>\n";
echo "<postfield name=\"reglimit\" value=\"$(reglimit$ref)\"/>\n";
echo "<postfield name=\"computer\" value=\"$(computer$ref)\"/>\n";
echo "<postfield name=\"komputer\" value=\"$(komputer$ref)\"/>\n";
echo "<postfield name=\"vict\" value=\"$(vict$ref)\"/>\n";
echo "<postfield name=\"shut\" value=\"$(shut$ref)\"/>\n";
echo "<postfield name=\"prod\" value=\"$(prod$ref)\"/>\n";
echo "<postfield name=\"victint\" value=\"$(victint$ref)\"/>\n";
echo "<postfield name=\"shutint\" value=\"$(shutint$ref)\"/>\n";
echo "<postfield name=\"roomon\" value=\"$(roomon$ref)\"/>\n";
echo "<postfield name=\"roomoff\" value=\"$(roomoff$ref)\"/>\n";
echo "<postfield name=\"trahtenberg\" value=\"$(trahtenberg$ref)\"/>\n";
echo "<postfield name=\"robokop\" value=\"$(robokop$ref)\"/>\n";
echo "<postfield name=\"mat\" value=\"$(mat$ref)\"/>\n";
echo "<postfield name=\"action\" value=\"updbots\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
}else{
settype($reg, 'integer');
settype($reglimit, 'integer');
settype($computer, 'integer');
settype($komputer, 'integer');
settype($vict, 'integer');
settype($shut, 'integer');
settype($prod, 'integer');
settype($victint, 'integer');
settype($shutint, 'integer');
settype($roomon, 'integer');
settype($roomoff, 'integer');


if (!isset($error))
{
$result = mysql_query ("Select * setting where klu4 = 1");
if (mysql_affected_rows() == 0)
{
$error = "database error...";
}
else
{

mysql_query ("Update setting set reglimit='".$reglimit."',reg='".$reg."', computer='".$computer."', komputer='".$komputer."', vict='".$vict."', shut='".$shut."', prod='".$prod."', victint='".$victint."', shutint='".$shutint."', roomon='".$roomon."', roomoff='".$roomoff."' where klu4 =1");
echo $fsize1;
$msg = "Botlara d&#252;zeli&#351; edildi.";
echo $fsize2;
}
}
else
{
$error = " ".mysql_error()." ";
}
if (isset($error))
{
echo $fsize1;
echo "$error\n";
echo $fsize2;
}
echo $fsize1;
echo "<b>$msg</b><br/>\n";
echo $fsize2;
}
}
break;



case 'qeydiyyat':
if($p_arr['8']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$adamlar = @mysql_query ("SELECT * FROM `conf` where `acar` = '1';");
$set = mysql_fetch_array ($adamlar);
echo $fsize1;
echo "<b>&#199;at&#305;n Qur&#287;ular&#305;</b><br/>\n";
echo $divide;
echo "Q&#305;z:<br/>\n";
echo $fsize2;

echo "<input size=\"9\" name=\"qadin$ref\" maxlength=\"9\" value=\"$set[qadin]\"/><br/>\n";
echo $fsize1;
echo "Ki&#351;i:<br/>\n";
echo $fsize2;
echo "<input size=\"9\" name=\"kisi$ref\" maxlength=\"9\" value=\"$set[kisi]\"/><br/>\n";
echo $fsize1;
echo "Yeni User:<br/>\n";
echo $fsize2;
echo "<input name=\"son$ref\" maxlength=\"9\" value=\"$set[son]\"/><br/>\n";

echo $fsize1;
echo "<anchor title=\"go\">[Yadda Saxla]<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=upqeyd&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"qadin\" value=\"$(qadin$ref)\"/>\n";
echo "<postfield name=\"kisi\" value=\"$(kisi$ref)\"/>\n";
echo "<postfield name=\"son\" value=\"$(son$ref)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;


case 'func':
if($id!='1'){
echo $fsize1;
echo "icazeniz yoxdur<br/>";
echo $fsize2;
break;
}
echo $fsize1;
if(!file_exists("file/dat_folder/function.dat")){
$file = fopen("file/dat_folder/function.dat", "w+");
$yusif .= "0\n";
$yusif .= "0\n";
$yusif .= "0\n";
$yusif .= "0\n";
$yusif .= "0\n";
$yusif .= "0\n";
$yusif .= "0\n";
fwrite($file,"{$yusif}");
fclose($file);
@chmod(addslashes("file/dat_folder/function.dat"), 0666);
}
$file = file("file/dat_folder/function.dat");
$func = trim($file[0]);
$func1 = trim($file[1]);
$func2 = trim($file[3]);
$func3 = trim($file[3]);
$func4 = trim($file[4]);
$func5= trim($file[5]);
$func6= trim($file[6]);


if(isset($action)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "1\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action1)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "0\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action2)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action3)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "0\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action4)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "1\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action5)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "0\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action6)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "1\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action7)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "0\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action8)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "1\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action9)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "0\n";
$yuska .= "$func5\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action10)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "1\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action11)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "0\n";
$yuska .= "$func6\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action12)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "1\n";
fwrite($open,"{$yuska}");
fclose($open);
}

if(isset($action13)){
@$open = @fopen( "file/dat_folder/function.dat", "w" );
$yuska .= "$func\n";
$yuska .= "$func1\n";
$yuska .= "$func2\n";
$yuska .= "$func3\n";
$yuska .= "$func4\n";
$yuska .= "$func5\n";
$yuska .= "0\n";
fwrite($open,"{$yuska}");
fclose($open);
}


if(!isset($etiraf)){
$etiraf = $func;
}
if(!isset($forum)){
$forum = $func1;
}
if(!isset($bilik)){
$bilik = $func2;
}
if(!isset($onlsms)){
$onlsms = $func3;
}
if(!isset($psms)){
$psms = $func4;
}
if(!isset($mega)){
$mega = $func5;
}
if(!isset($down)){
$down = $func6;
}

echo "Funksiya Paneli (<u>aktiv / deaktiv</u>)<br/>$divide";
echo "Etiraflar: ";

if($etiraf==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"etiraf\" value=\"1\"/>";
echo "<postfield name=\"action\" value=\"1\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"etiraf\" value=\"0\"/>";
echo "<postfield name=\"action1\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Forum: ";
if($forum==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"forum\" value=\"1\"/>";
echo "<postfield name=\"action2\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"forum\" value=\"0\"/>";
echo "<postfield name=\"action3\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Bilik Yar&#305;&#351;&#305;: ";
if($bilik==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"bilik\" value=\"1\"/>";
echo "<postfield name=\"action4\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"bilik\" value=\"0\"/>";
echo "<postfield name=\"action5\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Online Sms: ";
if($onlsms==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"onlsms\" value=\"1\"/>";
echo "<postfield name=\"action6\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"onlsms\" value=\"0\"/>";
echo "<postfield name=\"action7\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Pulsuz Sms: ";
if($psms==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"psms\" value=\"1\"/>";
echo "<postfield name=\"action8\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"psms\" value=\"0\"/>";
echo "<postfield name=\"action9\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Mega Nick: ";
if($mega==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"mega\" value=\"1\"/>";
echo "<postfield name=\"action10\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"mega\" value=\"0\"/>";
echo "<postfield name=\"action11\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>$divide";

echo "Y&#252;klemeler: ";
if($down==0){
echo "<anchor title=\"go\">Deaktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"down\" value=\"1\"/>";
echo "<postfield name=\"action12\" value=\"add\"/>\n";
echo "</go></anchor>";
}else{
echo "<anchor title=\"go\">Aktiv et<go href=\"admin.php?go=func&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"down\" value=\"0\"/>";
echo "<postfield name=\"action13\" value=\"add\"/>\n";
echo "</go></anchor>";
}
echo "<br/>";



echo $fsize2;

break;





case 'upqeyd':
if($p_arr['8']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$qadin = trim(" $qadin ");
$kisi = trim(" $kisi ");
if (!isset($error)) {
$result = mysql_query ("Select * `conf` where `acar` = 1");
if (mysql_affected_rows() == 0) {
$error = "Baza ile elaqe kesildi...";
} else {
mysql_query ("Update `conf` set `qadin`='".$qadin."', `kisi`='".$kisi."', `son`='".$son."' where `acar`='1';");
echo $fsize1;
$msg = "Qeydiyyat say&#305; deyi&#351;dirildi!";
echo $fsize2;
}
} else {
$error = " ".mysql_error()." ";
}
if (isset($error)) {
echo $fsize1;
echo $error."\n";
echo $fsize2;
}
echo $fsize1;
echo "<b>$msg</b><br/>\n";
echo $fsize2;
break;

case 'header':
if($id!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;
if(!file_exists("file/dat_folder/header.dat")){
$file = fopen("file/dat_folder/header.dat", "w+");
$yusif .= "\n";
$yusif .= "\n";
fwrite($file,"{$yusif}");
fclose($file);
@chmod(addslashes("file/dat_folder/header.dat"), 0666);
}

if($act==del){
@$open = @fopen( "file/dat_folder/header.dat", "w" );
$yuska .= "0\n";
$yuska .= "-\n";
fwrite($open,"{$yuska}");
fclose($open);
echo "Dayand&#305;r&#305;ld&#305;<br/>";
echo $divide;
}


$file = file("file/dat_folder/header.dat");
$url = trim($file[1]);
$tm = trim($file[0]);

$site = explode("//" , $url);
$urel = $site['1'];
if(!isset($_POST['type'])){

if($tm > time()){
echo "Qeydiyyat Hal_hazirda: <b>".$urel."</b> sayt&#305;na y&#246;nelib.<br/>";
echo "Qalan vaxt: ";
$tkick = $tm - time();
if($tkick < 60 && $tkick > 0){ $vaxt = "san"; }
elseif($tkick < 3600 && $tkick > 60){ $new = $tkick; $tkick = $new/60; $vaxt = "deq"; }
elseif($tkick < 86400 && $tkick > 3600){ $new = $tkick; $tkick = $new/3600; $vaxt = "saat"; }
elseif($tkick > 86400){ $new = $tkick; $tkick = $new/86400; $vaxt = "g&#252;n"; }
$tkick = round($tkick);
echo "<b>$tkick $vaxt</b> - <a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=$go&amp;act=del&amp;ref=$ref\">Stop</a><br/>";

}else{
echo "Qeydiyyat&#305;n y&#246;nlendirilmesi<br/>";
}
   echo $divide;
   echo "<input format=\"*N\" size=\"4\" name=\"time$ref\" emptyok=\"false\"/>";
   echo " - <select name=\"type$ref\">";
   echo "<option value=\"86400\">G&#252;n</option>";
   echo "<option value=\"3600\">Saat</option>";
   echo "<option value=\"60\">Deqiqe</option>";
   echo "</select><br/>";
   if($tm < time()){
   echo "&#220;nvan:<br/>";
   echo "<input size=\"20\" value=\"http://\" name=\"url$ref\" emptyok=\"false\"/><br/><br/>";
   }else{
   echo "&#220;nvan:<br/>";
   echo "<input size=\"20\" value=\"".$url."\" name=\"url$ref\" emptyok=\"false\"/><br/><br/>";
   }

   echo "[<anchor>Y&#246;nelt<go href=\"admin.php?id=$id&amp;ps=$ps&amp;go=$go&amp;ref=$ref\" method=\"post\">\n";
   echo "<postfield name=\"time\" value=\"$(time$ref)\"/>\n";
   echo "<postfield name=\"type\" value=\"$(type$ref)\"/>\n";
   echo "<postfield name=\"url\" value=\"$(url$ref)\"/>\n";
   echo "</go></anchor>]<br/>\n";
}
else
{
    $error = false;
    $time = intval($_POST['time']);
    $type = intval($_POST['type']);
    $url = $_POST['url'];

    if(!is_numeric($time))
    {
        $error = true;
    }
    else if(!is_numeric($type))
    {
        $error = true;
    }
    else if(empty($url))
   {
       $error = true;
    }
    /*else if($url > 20)
   {
       $error = true;
    }
    else if($type!='60' || $type!='3600' || $type!='86400')
   {
       $error = true;
    }*/

   $total_date = $time * $type + time();

    if($error==false)
    {
        $file = fopen("file/dat_folder/header.dat", "w");
        $data .= "$total_date\n";
        $data .= "$url\n";
        fwrite($file, $data);
        fclose($file);
        echo "Qeydiyyat Y&#246;nlendirildi.<br/>";
    }else{
    echo "Format d&#252;zg&#252;n deyil!..<br/>";
    }
    echo $divide;
    echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=$go&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
echo $fsize2;

break;



case 'editlevels':
if($p_arr['33']!=1){
echo $fsize1;
echo 'Sizin buna hГјququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
$lev = mysql_query("select `level`,`name` from `levels`;");
if(empty($act)) {
while($arr=mysql_fetch_array($lev)) {
echo $fsize1;
echo "<a href=\"admin.php?act=rnm&amp;id=$id&amp;ps=$ps&amp;go=editlevels&amp;level=".$arr['level']."\">".$arr['level'].". ".$arr['name']."</a><br/>";
echo $fsize2;
}
} elseif ($act=="dornm") {
$levelname = mysql_escape_string($levelname);
settype($level, 'integer');
mysql_query ("update `levels` set `name`='".$levelname."' where `level`='".$level."';");
echo $fsize1;
echo "R&#252;tbenin Ad&#305; deyi&#351;dirildi!<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels\">R&#252;tbenin Adlar&#305;</a><br/>";
echo $fsize2;
} else {
$lev = mysql_query("select `name` from `levels` where `level`='$level';");
$arr=mysql_fetch_array($lev);
$name=$arr["name"];
echo $fsize1;
echo "R&#252;tbenin Ad&#305;:<br/>\n";
echo $fsize2;
echo "<input name=\"levelname\" maxlength=\"200\" value=\"$name\" title=\"levelname\"/><br/>\n";
echo $fsize1;
echo "[<anchor title=\"go\">Yenile<go href=\"admin.php?act=dornm&amp;id=$id&amp;ps=$ps&amp;go=editlevels&amp;level=$level\" method=\"post\">\n";
echo "<postfield name=\"levelname\" value=\"$(levelname)\"/>\n";
echo "</go></anchor>]\n";
echo $fsize2;
echo "<br/>\n";
echo $fsize1;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels\">R&#252;tbenin Adlar&#305;</a><br/>";
echo $fsize2;
}
break;
}


echo $fsize1;
echo $divide;
echo $fsize2;
if($n) {
echo $fsize1;
echo "<a href=\"admin.php?go=nezaret&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nezaret Paneli</a><br/>****<br/>\n";
echo $fsize2;
}
if($go) {
echo $fsize1;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();
?>