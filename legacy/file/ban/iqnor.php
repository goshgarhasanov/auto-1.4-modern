<?
if($p_arr['83']!=1){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sizin <b>Tam &#305;qnor</b>, Etmek h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$pid = $inf["id"];
$_v->title('Silindi...','center');
$_v->fsize1($fsize1);
if($u_level<$row["level"]){
echo "\"<b>$pnik</b>\" leqebli istifade&#231;i <b>Tam &#304;qnor Edildi...</b>\n";
if($whykik!="")$whyki = ", (Sebeb: <u>$whykik</u>.)";
@$fi = fopen("file/control/9.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("$user - [<b>$pnik</b>] (ID=<u>$pid</u>): [<u>$otaqadi</u>] $whyki $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
if($rm<=10 and $rm!=""){
$room="room".$rm;
mysql_query ("Select * from $room WHERE usid='".$pid."' LIMIT 1;");
if(mysql_affected_rows()!=0) {
$silinen = @mysql_query ("Select `time`,`who`,`message` from `$room`  WHERE `usid`='".$pid."' ORDER BY `id` DESC LIMIT 0 , 30;");
@$save= fopen("file/control/9/9".$pid.".dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
while ($dum = mysql_fetch_array($silinen))
{
$vax=$dum["time"];
$kim=$dum["who"];
$messages=$dum["message"];
$qeyd .= "".base64_encode("$kim $vax $messages ")."\n";
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>******<br/> <b>Otaqda yazd&#305;&#287;&#305; mesajlar</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
}
}
else
{
$silinen = @mysql_query ("Select * from `mesaj` WHERE `idwho` = '".$pid."' or `idtowhom` = '".$pid."' order by `time` desc limit 0,30;");
if(mysql_affected_rows()!=0) {
@$save= fopen("file/control/9/9".$pid.".dat", "a+"); 
while ($dum = mysql_fetch_array($silinen))
{
$klu4=$dum['klu4'];
$kim=$dum['who'];
$kime=$dum['towhom'];
$messages=$dum['message'];
$qeyd .= "".base64_encode("$kim&#187;$kime: $messages")."\n";
mysql_query("delete from `mesaj` WHERE `klu4` = '".$klu4."';");
}
$qeyd .= "".base64_encode("Leqebi: <b>$pnik</b><br/>ID N&#246;mresi: <b>$pid</b><br/>******<br/> <b>Mesajda yazd&#305;&#287;&#305; son s&#246;zler</b><br/>****")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
}
}

for ($i=0; $i<=9; $i++){
$room = "room".$i;
mysql_query("UPDATE `$room` SET `hid` = '2' WHERE `usid` = '".$pid."';");
}
mysql_query ("UPDATE `users` SET `inv` = '2' WHERE `id` = '".$pid."';");
} else { 
echo " Sen indi guya a&#287;&#305;ll&#305;sanda he?)))\n";
}
echo "<br/>****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;$ref\">$pname</a></b><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>