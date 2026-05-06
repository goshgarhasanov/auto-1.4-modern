<?
if($p_arr['86']!=1){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sizin <b>IP-Browser</b> Ban Etmek h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$soft = $inf["user_soft"];
$pid = $inf["id"];

if($OPERATOR_USER!='NULL')
{
$reqipcon = "and `user_soft` = '".$soft."'";
$reqip=$soft;
$reqmsg="Bazadan Sildi ve Telefon Modeli Ban Etdi!";
$bipinfo = "<u>Operator</u>: ".ucfirst($OPERATOR_USER)."";
}
else
{
$reqipcon = "";
$reqip="IP-BAN";
$reqmsg="Bazadan Sildi ve IP Adresi Ban Etdi!";
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

if($u_level<$row["level"]){
$_v->title('IP-Browser','center');
$_v->fsize1($fsize1);
echo "<b>$pnik</b>, $reqmsg<br/>\n";
$rnd = rand(0,99999999);
$today = date("H:i",$SERVER_TIME); 
if($whykik!="")$whykikk = ", (Sebeb: <u>$whykik</u>.)";

mysql_query("UPDATE `conf` SET ipp = '".$REMOTE_MAX_USER."', soft = '".$reqip."', son = '';");
mysql_query ("INSERT INTO `bannlist` SET `ip` = '".$REMOTE_MAX_USER."', `soft` = '".$reqip."', `user` = '".$pnik."', `moder` = '".$user."', `sebeb` = '".$whykik."';");

mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
mysql_query("UPDATE `users` SET `banned` = '2', `time` = '".($SERVER_TIME-$_AUTO['ofline'])."' WHERE `id` = '".$pid."';");
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `banned` = '3' WHERE  `user_ip` = '".$ip."' ".$reqipcon."  and  `banned` = '0';");

$rnd = rand(0,99999999);
$today = date("H:i",$SERVER_TIME); 
$txt = "<b>$user</b>, \"<u>$pnik</u>\" leqebli istifade&#231;ini <b><u>$reqmsg</u></b>$whykikk\n";
for ($num = 0; $num <= 9; $num++){
$rooms = "room".$num;
mysql_query ("Insert into $rooms set klu4= '".$rnd."', time='".$today."', who='".$xeberci."', message='".$txt."', id='".$SERVER_TIME."', towhom='1', hid='1', usid='7';");
}


//-------------Yazi qeydi:

if($rm<=10 and $rm!=""){
$room="room".$rm;
mysql_query ("Select * from $room WHERE usid='".$pid."' LIMIT 1;");

if(mysql_affected_rows()!=0) {
$silinen = @mysql_query ("Select `time`,`who`,`message` from `$room`  WHERE `usid`='".$pid."' ORDER BY `id` DESC LIMIT 0 , 30;");
@$save= fopen("file/control/6/9".$pid.".dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
while ($dum = mysql_fetch_array($silinen))
{
$vax=$dum["time"];
$kim=$dum["who"];
$messages=$dum["message"];
$qeyd .= "".base64_encode("$kim $vax $messages ")."\n";
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>$bipinfo<br/><u>Browser</u>: <i>$reqip</i><br/>-------<br/><u>Ban Eden</u>: <b>$user</b><br/>$myipinfo<b/><br/><u>Browser</u>: <i>$HTTP_USER_AGENT</i><br/>******<br/> <b>Otaqda yazd&#305;&#287;&#305; son mesajlar</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
//-------------SON
}
mysql_query("delete from `$room` WHERE `usid` = '".$pid."';");
}
else
{
$silinen = @mysql_query ("Select * from `mesaj` WHERE `idwho` = '".$pid."' or `idtowhom` = '".$pid."' order by `time` desc limit 0,30");
if(mysql_affected_rows()!=0) {

@$save= fopen("file/control/6/9".$pid.".dat", "a+"); 
while ($dum = mysql_fetch_array($silinen))
{
$klu4=$dum['klu4'];
$kim=$dum['who'];
$kime=$dum['towhom'];
$messages=$dum['message'];
$qeyd .= "".base64_encode("$kim&#187;$kime: $messages")."\n";
mysql_query("delete from `mesaj` WHERE `klu4` = '".$klu4."';");
}

$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>$bipinfo<br/><u>Browser</u>: <i>$reqip</i><br/>-------<br/><u>Ban Eden</u>: <b>$user</b><br/>$myipinfo<b/><br/><u>Browser</u>: <i>$HTTP_USER_AGENT</i><br/>******<br/> <b>Mesajda yazd&#305;&#287;&#305; son s&#246;zler</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
//-------------SON
}
}


//-------------IP Delete
@$save= fopen("file/control/6.dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
$qeyd = "".base64_encode("<u>$user</u> - \"<b>$pnik</b>\" (ID=<u>$pid</u>): <b>IP-Soft+Del</b> - [<u>$otaqadi</u>]$whykikk $date")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
//-------------SON
} else {
$_v->title('Bu Olmaz','center');
$_v->fsize1($fsize1);
$levelselect = @mysql_query ("Select name from levels where level='".$u_level."'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];
echo "Sizin  \"<b>".$levname."</b>\" r&#252;tbesinde olan &#350;exslerin,<br/> <u>Telefon Model</u>-ini Ban etmek h&#252;ququnuz yoxdur!<br/>\n";
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