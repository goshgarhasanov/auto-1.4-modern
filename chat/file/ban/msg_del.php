<?
if($p_arr['88']!=1){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sizin <b>B&#252;t&#252;n Mesajlar&#305;</b>, Silmek h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$pid = $inf["id"];
$soft = $inf["user_soft"];

if($rm<=10 and $rm!=""){
$_v->title('Silindi...','center');
$_v->fsize1($fsize1);
if($u_level<$row["level"]){

echo "\"<b>$pnik</b>\" leqebli istifade&#231;inin Yazd&#305;&#287;&#305; S&#246;zler<br/> Otaqdan Silindi...\n";
if($whykik!="")$whyki = ", (Sebeb: <u>$whykik</u>.)";

@$fi = fopen("file/control/1.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("$user - [<b>$pnik</b>] (ID=<u>$pid</u>): (<b>B&#252;t&#252;n Mesajlar&#305; Silinib...</b>) $whyki $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

if($rm<=10 and $rm!=""){
$room="room".$rm;
mysql_query ("Select * from `$room` WHERE `usid`='".$pid."' LIMIT 1;");
if(mysql_affected_rows()!=0) {

$silinen = @mysql_query ("Select `time`,`who`,`message` from `$room` WHERE `usid`='".$pid."';");
@$save= fopen("file/control/1/9".$pid.".dat", "a+"); 
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
mysql_query("delete from `$room` WHERE `usid` = '".$pid."';");
}
}
} else { 
echo " Sen indi guya a&#287;&#305;ll&#305;sanda he?)))\n";
}
}else{
///////////////////////////////////////////////////


$_v->title('Silindi...','center');
$_v->fsize1($fsize1);
if($u_level<$row["level"]){

echo "\"<b>$pnik</b>\" leqebli istifade&#231;inin Yazd&#305;&#287;&#305; S&#246;zler<br/> Tan&#305;&#351;l&#305;qdan Silindi...\n";
if($whykik!="")$whyki = ", (Sebeb: <u>$whykik</u>.)";

@$fi = fopen("file/control/1.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("$user - [<b>$pnik</b>] (ID=<u>$pid</u>): (<b>B&#252;t&#252;n Mesajlar&#305; Silinib...</b>) Tan&#305;&#351;l&#305;qdan $whyki $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

$room="room".$rm;
mysql_query ("Select * from `mesaj` WHERE `idwho`='".$pid."' LIMIT 1");
if(mysql_affected_rows()!=0) {
$silinen = @mysql_query ("Select `who`,`towhom`,`message` from `mesaj` WHERE `idwho`='".$pid."' ORDER BY `time` ASC");
@$save= fopen("file/control/1/9".$pid.".dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
while ($dum = mysql_fetch_array($silinen))
{
$vax=$dum["towhom"];
$kim=$dum["who"];
$messages=$dum["message"];
$qeyd .= "".base64_encode("$kim $vax $messages ")."\n";
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>$bipinfo<br/><u>Browser</u>: <i>$soft</i><br/>-------<br/><u>Ban Eden</u>: <b>$user</b><br/>$myipinfo<b/><br/><u>Browser</u>: <i>$HTTP_USER_AGENT</i><br/>******<br/> <b>Otaqda yazd&#305;&#287;&#305; son mesajlar</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
//-------------SON
mysql_query("delete from `mesaj` WHERE `idwho` = '".$pid."';");
mysql_query("delete from `zapiski` WHERE `idwho` = '".$pid."';");
}
} else { 
echo " Sen indi guya a&#287;&#305;ll&#305;sanda he?)))\n";
}
}
echo "<br/>****<br/>\n";

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