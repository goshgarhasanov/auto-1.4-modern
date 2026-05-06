<?
if($p_arr['87']!=1){
$_v->title('STOP','center');
$_v->fsize1($fsize1);
echo "Sizin Bazadan Silmek h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$soft = $inf["user_soft"];
$pid = $inf["id"];

$_v->title('STOP','Leqeb Silindi');
$_v->fsize1($fsize1);
if($u_level<$row["level"]){
echo "\"<b>$pnik</b>\"  <u>&#199;atdan Silindi</u>!<br/>\n";
if($whykik!="")$whyki = ", (Sebeb: <u>$whykik</u>.)";
else $whyki = "<b>!</b>";
mysql_query ("update `users` set `banned` = '2', `whokik` = '".$user."', `whykik` = '".$whykik."', `time` = '".($SERVER_TIME-$_AUTO['ofline'])."' where `id` ='".$pid."';");
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

if($p_arr['233']==1)
{
$access_elan = '1';
}
elseif($p_arr['234']==1 and $rm!='')
{
$access_elan = '1';
}


if($rm<=10 and $rm!=''){
if($access_elan=='1'){
$rnd = rand(0,99999999);
$today = date("H:i",$SERVER_TIME); 
$txt = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;ini <b>&#199;atdan Sildi</b>$whyki\n";
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into `$room` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$txt."', `id`='".$SERVER_TIME."', `towhom`='', `hid`='0', `usid`='7';");
}
}
$room="room".$rm;
mysql_query ("Select * from `$room` WHERE `usid`='".$pid."' LIMIT 1;");
if(mysql_affected_rows()!=0) {

$silinen = @mysql_query ("Select `time`,`who`,`message` from `$room`  WHERE `usid`='".$pid."' ORDER BY `id` DESC LIMIT 0 , 30;");
@$save= fopen("file/control/8/9".$pid.".dat", "a+"); 
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
}
mysql_query("delete from `$room` WHERE `usid` = '".$pid."';");
}
else
{
$silinen = @mysql_query ("Select * from `mesaj` WHERE `idwho` = '".$pid."' or `idtowhom` = '".$pid."' order by `time` desc limit 0,30;");
if(mysql_affected_rows()!=0) {

@$save= fopen("file/control/8/9".$pid.".dat", "a+"); 
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
$txt = "<b>$user_admin</b>, \"<u>$pnik</u>\" leqebli istifade&#231;ini <b>&#199;atdan Sildi</b>$whyki\n";
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into `$room` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$txt."', `id`='".$SERVER_TIME."', `towhom`='', `hid`='0', `usid`='7';");
}
}
}
@$save= fopen("file/control/8.dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
$qeyd = "".base64_encode("<u>$user</u> - \"<b>$pnik</b>\" (ID=<u>$pid</u>): [<b>$otaqadi</b>]$whyki <u>$date</u>")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
} else {
$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$u_level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];
echo "Sizin \"<b>".$levname."</b>\" r&#252;tbesinde olan &#350;exslerin,<br/> <u>Bazadan Silmek</u>. h&#252;ququnuz yoxdur!<br/>\n";
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