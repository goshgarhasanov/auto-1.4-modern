<?
if($p_arr['82']!=1){
$_v->title('Olmaz','center');
$_v->fsize1($fsize1);
echo "Sizin Xeberdarlıq etmek hüququnuz yoxdur<br/>----<br/>\n";
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



$pid = $inf["id"];
$_v->title('Xeberdarl&#305;q','center');
$_v->fsize1($fsize1);
if($u_level<$row["level"]){

echo "\"<b>$pnik</b>\" Xeberdarl&#305;q Edildi!\n";
mysql_query ("UPDATE `users` SET `whykik` = '".$whykik."', `con` = '4' WHERE `id` = '".$pid."';");
if($whykik!="")$whyki = "Sebeb: (<u>$whykik</u>)";
@$fi = fopen("file/control/2.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("$user - \"<b>$pnik</b>\" $whyki [$otaqadi] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
  
if($p_arr['225']==1){
$rnd = rand(0,99999999);
$mes = "<b>$user</b>,  \"<u>$pnik</u>\" leqebli istifade&#231;ini <b>Xeberdarl&#305;q Etdi</b>!";
$today=date ("H:i",$SERVER_TIME);
mysql_query ("Insert into `room{$rm}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `towhom`='', `hid`='0', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");

} else { 
echo "A&#287;&#305;ll&#305; Ol!\n";
}
echo "<br/>****<br/>\n";
if($rm<=10 and $rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}
else
{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$pname</a></b><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>