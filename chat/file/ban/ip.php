<?
if($p_arr['85']!=1){
$_v->title('STOP','center');
$_v->fsize1($fsize1);
echo "Sizin <b>IP-Soft</b> Ban Etmek h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$soft = $inf["user_soft"];
$pid = $inf["id"];


$banned = mysql_query ("Select * from `bannlist` WHERE (`ip` = '".$ip."')and(`soft` = 'IP-BAN');");
if(mysql_affected_rows()!=0) {
$iban = @mysql_fetch_array($banned);
$sebebkar = $iban['user'];
$muellif = $iban['moder'];

$_v->title('Stop','left');
$_v->fsize1($fsize1);
if($sebebkar!=$pnik){
echo "<b>$pnik</b>, leqebli istifade&#231;inin &#199;ata daxil ola bilmez...<br/>****<br/>\n";
echo "<b>Sebeb</b>: <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$pid&amp;ref=$ref\">$sebebkar</a> leqebli istifadecinin <u>IP-Adresi Ban edilib</u>.<br/>";
echo "<u>$pnik</u>, ile <u>$sebebkar</u>, IP-Adresleri &#252;st-&#252;ste d&#252;&#351;&#252;r...<br/>----<br/>\n";
}else{
echo "<b>$pnik</b>, leqebli istifade&#231;inin <u>IP-Adresi Ban Edilib</u>...<br/>----<br/>\n";
echo "<b>Sebeb</b>: <i>$sebeb</i><br/>----<br/>\n";}
echo "<b>M&#252;ellif</b>: <u>$muellif</u><br/>*****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
} 
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$pname</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($u_level<$row["level"]){
$_v->title('IP-Browser','center');
$_v->fsize1($fsize1);
echo "\"<b>$pnik</b>\" leqebli istifade&#231;inin <b>Komp&#252;ter</b>-i BAN Edildi!<br/>\n";


mysql_query("UPDATE `conf` SET ipp = '".$ip."', soft = '".$soft."';");
mysql_query ("INSERT INTO `bannlist` SET `ip` = '".$ip."', `soft` = 'IP-BAN', `user` = '".$pnik."', `moder` = '".$user."', `sebeb` = '".$whykik."';");
mysql_query("UPDATE `users` SET `time` = '".($SERVER_TIME-$_AUTO['ofline'])."', `banned` = '3' WHERE `user_ip` = '".$ip."' and `banned` = '0';");


if($OPERATOR_USER!='NULL')
{
$bipinfo = "<u>Operator</u>: ".ucfirst($OPERATOR_USER)."";
}
else
{
$bipinfo = "<u>IP-Adress</u>: <b>$ip</b>";
}

if($OPERATOR!='NULL')
{
$myipinfo = "<u>Operator</u>: ".ucfirst($OPERATOR)."";
}
else
{
$myipinfo = "<u>IP-Adress</u>: <b>$REMOTE_ADDR</b>";
}

if($p_arr['229']==1)
{
$access_elan = '1';
}
elseif($p_arr['230']==1 and $rm!='')
{
$access_elan = '1';
}


if($rm<=10 and $rm!=''){

if($access_elan=='1'){
$rnd = rand(0,99999999);
$today = date("H:i",$SERVER_TIME); 
if($whykik!="")$whykikk = ", (Sebeb: <u>$whykik</u>.)";

$txt = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;inin <b><u>Komp&#252;terini</u> - BAN Etdi</b>$whykikk\n";
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$xeberci."', message='".$txt."', id='".$SERVER_TIME."', towhom='', hid='0', usid='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}
$room="room".$rm;
mysql_query ("Select * from `$room` WHERE `usid`='".$pid."' LIMIT 1;");
if(mysql_affected_rows()!=0) {

$silinen = @mysql_query ("Select `time`,`who`,`message` from `$room`  WHERE `usid`='".$pid."' ORDER BY `id` DESC LIMIT 0 , 30;");
@$save= fopen("file/control/5/9".$pid.".dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
while ($dum = mysql_fetch_array($silinen))
{
$vax=$dum["time"];
$kim=$dum["who"];
$messages=$dum["message"];
$qeyd .= "".base64_encode("$kim $vax $messages ")."\n";
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>$bipinfo<br/><u>Browser</u>: <i>$soft</i><br/>-------<br/><u>Ban Eden</u>: <b>$user</b><br/>$myipinfo<b/><br/><u>Browser</u>: <i>$HTTP_USER_AGENT</i><br/>******<br/> <b>Otaqda yazd&#305;&#287;&#305; son mesajlar</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
//-------------SON
}
mysql_query("delete from `$room` WHERE `usid` = '".$pid."';");
}
else
{
$silinen = @mysql_query ("Select * from `mesaj` WHERE `idwho` = '".$pid."' or `idtowhom` = '".$pid."' order by `time` DESC limit 0,30;");
if(mysql_affected_rows()!=0) {

@$save= fopen("file/control/5/9".$pid.".dat", "a+"); 
while ($dum = mysql_fetch_array($silinen))
{
$klu4=$dum['klu4'];
$kim=$dum['who'];
$kime=$dum['towhom'];
$messages=$dum['message'];
$qeyd .= "".base64_encode("$kim&#187;$kime: $messages")."\n";
mysql_query("delete from mesaj WHERE klu4 = '".$klu4."';");
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>$bipinfo<br/><u>Browser</u>: <i>$soft</i><br/>-------<br/><u>Ban Eden</u>: <b>$user</b><br/>$myipinfo<b/><br/><u>Browser</u>: <i>$HTTP_USER_AGENT</i><br/>******<br/> <b>Mesajda yazd&#305;&#287;&#305; son s&#246;zler</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
}
if($access_elan=='1'){
$rnd = rand(0,99999999);
$today = date("H:i",$SERVER_TIME); 
if($whykik!="")$whykikk = ", (Sebeb: <u>$whykik</u>.)";

$txt = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;inin <b><u>Komp&#252;terini</u> - BAN Etdi</b>$whykikk\n";
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$xeberci."', message='".$txt."', id='".$SERVER_TIME."', towhom='', hid='0', usid='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}
}
@$save= fopen("file/control/5.dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
$qeyd = "".base64_encode("<u>$user</u> - \"<b>$pnik</b>\" (ID=<u>$pid</u>): [<u>$otaqadi</u>] $date")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
} else {
$_v->title('Bu Olmaz','center');
$_v->fsize1($fsize1);
$levelselect = @mysql_query ("Select name from levels where level='".$u_level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];
echo "Sizin  \"<b>".$levname."</b>\" r&#252;tbesinde olan &#350;exslerin,<br/> <u>Komp&#252;ter</u>-ini Ban etmek h&#252;ququnuz yoxdur!<br/>\n";
}
echo "----<br/>";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$pname</a></b><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>