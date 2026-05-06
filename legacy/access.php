<?
require("inc.php");

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if($p_arr['92']!=1 and $p_arr['170']!=1 and $p_arr['228']!=1 and $p_arr['231']!=1 and $p_arr['235']!=1){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Sizin heçkesi qaytarmaq hüququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($rm!=''){
$room = "&amp;rm=$rm";
}
$user_admin=$row["user"];
$select = @mysql_query ("Select * from `users` where `id`='".$nk."';");
if (mysql_affected_rows() == 0) {
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>\n";
echo "<a href=\"ceza.php?id=$id&amp;ps=$ps$room&amp;$ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$inf = mysql_fetch_array ($select); 
$usid = $inf["id"];
$pnik = $inf["user"];
$xare = $inf["whokik"];
$sebeb = $inf["whykik"];
$banned= $inf["banned"];
$invs = $inf["inv"];
$otaq = $inf["room"];
$tox = $inf["tox"];
$ip = $inf["user_ip"];
$u_level = $inf["level"];

$access_elan = false;

$A_OPERA_USER = OPERATOR($ip);
$OPERATOR_USER = trim($A_OPERA_USER['0']);
$REMOTE_MAX_USER = trim($A_OPERA_USER['1']);
$xeberci = "Xeber&#231;i";

if($rm<=10 and $rm!=''){
$selotaq = @mysql_query ("Select `name` from `rooms` where `rm`='".$rm."';");
$onam = @mysql_fetch_array($selotaq);
$otaqadi = $onam["name"];
}
else
$otaqadi = "Mesajda";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$today=date ("H:i",$SERVER_TIME);
$rnd = rand(999999,99999999);

$_v->title('Access','center');
$_v->fsize1($fsize1);

if($inf['kik']>$SERVER_TIME and $p_arr['170']=='1' and $b=='1'){
if($p_arr['237']==1){
$access_elan = '1';
}
elseif($p_arr['238']==1 and $rm!='')
{
$access_elan = '1';
}
if($access_elan=='1'){
$mes = "<b>$user_admin</b>,  \"<u>$pnik</u>\" leqebli istifade&#231;ini ceza vaxtından evvel <b>Çata qaytardı</b>";
for ($i=0; $i<=9; $i++){
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}

echo "\"<b>$pnik</b>\" Çata Qaytarıldı!\n";
mysql_query ("UPDATE `users` SET `kik` = '10' WHERE `id` = '".$usid."';");
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = base64_encode("$user_admin - \"<b>$pnik</b>\" leqebli istifadeçini vaxtından evvel çata qaytardı [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
}
elseif($p_arr['170']=='1' and $b=='1')
{
echo "\"<b>$pnik</b>\" Çata Qaytarıldı!\n";
}




if($inf['banned']=='1' and $p_arr['228']=='1' and $b=='2')
{
if($p_arr['226']==1){
$access_elan = '1';
}
elseif($p_arr['227']==1 and $rm!='')
{
$access_elan = '1';
}
if($access_elan=='1'){
$mes = "<b>$user_admin</b>,  Ban edilmiş \"<u>$pnik</u>\" leqebli istifade&#231;i <b>Çata qaytardı</b>";
for ($i=0; $i<=9; $i++){
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}

echo "\"<b>$pnik</b>\" BAN-dan azad edildi!\n";
mysql_query ("UPDATE `users` SET `banned` = '0' WHERE `id` = '".$usid."';");
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = "".base64_encode("$user_admin - \"<b>$pnik</b>\" [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
}
elseif($p_arr['228']=='1' and $b=='2')
{
echo "\"<b>$pnik</b>\" BAN-dan azad edildi!\n";
}


if($inf['banned']=='2' and $p_arr['235']=='1' and $b=='3')
{
if($p_arr['233']==1){
$access_elan = '1';
}
elseif($p_arr['234']==1 and $rm!='')
{
$access_elan = '1';
}

if($access_elan=='1'){
$mes = "<b>$user_admin</b>,  Bazadan silinmiş \"<u>$pnik</u>\" leqebli istifade&#231;i <b>Çata qaytardı</b>";
for ($i=0; $i<=9; $i++){
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}

echo "\"<b>$pnik</b>\" leqebli istifadeçi çata qaytarıldı!\n";
mysql_query ("UPDATE `users` SET `banned` = '0' WHERE `id` = '".$usid."';");
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = "".base64_encode("$user_admin - \"<b>$pnik</b>\" [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
}
elseif($p_arr['235']=='1' and $b=='3')
{
echo "\"<b>$pnik</b>\" leqebli istifadeçi çata qaytarıldı!\n";
}



if($inf['inv']=='2' and $p_arr['92']=='1' and $b=='4')
{
echo "\"<b>$pnik</b>\" Tam iqnordan azad edildi\n";
mysql_query ("UPDATE `users` SET `inv` = '0' WHERE `id` = '".$usid."';");
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = base64_encode("$user_admin - \"<b>$pnik</b>\" leqebini Tam &#304;qnordan Azad Etdi. [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
}
elseif($p_arr['92']=='1' and $b=='4')
{
echo "\"<b>$pnik</b>\" Tam iqnordan azad edildi\n";
}



if($p_arr['231']=='1' and $b=='5'){
if($p_arr['229']==1){
$access_elan = '1';
}
elseif($p_arr['230']==1 and $rm!='')
{
$access_elan = '1';
}
if($OPERATOR_USER=='NULL'){
$banned = mysql_query ("Select `klu4` from `bannlist` WHERE (`ip` = '".$ip."')and(`soft` = 'IP-BAN');");
if(mysql_affected_rows()!=0) {
mysql_query ("DELETE FROM `bannlist` WHERE (`ip` = '".$ip."')and(`soft` = 'IP-BAN');");
if($access_elan=='1'){
$mes = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;inin \"<b>$ip</b>\" IP Adressini  <b>BAN-dan çıxartdı</b>";
for ($i=0; $i<=9; $i++){
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}
echo "\"<b>$pnik</b>\" leqebli istifadeçinin İP adresi BAN-dan çıxardıldı!\n";
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = base64_encode("$user_admin - \"<b>$pnik</b>\" leqebinin IP-Adress Edilmi&#351; Ban&#305; <b>le&#287;v etdi</b>. [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
}
else
{
echo "\"<b>$pnik</b>\" leqebli istifadeçinin İP adresi BAN-dan çıxardıldı!\n";
}
}
else
{
$banned = mysql_query ("Select `klu4` from `bannlist` WHERE (`ip` = '".$REMOTE_MAX_USER."')and(`soft` = '".$inf["user_soft"]."');");
if(mysql_affected_rows()!=0) {
mysql_query ("DELETE FROM `bannlist` WHERE (`ip` = '".$REMOTE_MAX_USER."')and(`soft` = '".$inf["user_soft"]."');");
if($access_elan=='1'){
$mes = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;inin \"<b>Telefon modelini</b>\" <b>BAN-dan çıxartdı</b>";
for ($i=0; $i<=9; $i++){
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}
echo "\"<b>$pnik</b>\" leqebli istifadeçinin Telefon modeli BAN-dan çıxardıldı!\n";

@$fi = fopen("file/control/4.dat", "a+"); 
$lst = base64_encode("$user_admin - \"<b>$pnik</b>\" leqebinin Telefonuna Edilmi&#351; Ban&#305; <b>le&#287;v etdi</b>.  [<u>$otaqadi</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
}
else
{
echo "\"<b>$pnik</b>\" leqebli istifadeçinin Telefon modeli BAN-dan çıxardıldı!\n";
}
}
}

echo '<br/>----<br/>';
echo "<a href=\"ceza.php?id=$id&amp;ps=$ps$room&amp;nk=$usid&amp;ref=$ref\">Geri Qayıt</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>