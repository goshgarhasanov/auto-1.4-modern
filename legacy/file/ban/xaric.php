<?
if($p_arr['170']!=1){
if($wtime==0) {
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Xaric Edilecek leqebin vaxtini se&#231;memisiz nece deqiqelik Xaric edim?<br/>****<br/>\n";
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
}
$array_hack_time = array();

if($p_arr['170']==1 and $p_arr['81']==1){
$array_hack_time[] = '0';
}
if($p_arr['171']==1 and $p_arr['81']==1){
$array_hack_time[] = '5';
}
if($p_arr['172']==1 and $p_arr['81']==1){
$array_hack_time[] = '15';
}
if($p_arr['173']==1 and $p_arr['81']==1){
$array_hack_time[] = '30';
}
if($p_arr['174']==1 and $p_arr['81']==1){
$array_hack_time[] = '45';
}
if($p_arr['175']==1 and $p_arr['81']==1){
$array_hack_time[] = '60';
}
if($p_arr['176']==1 and $p_arr['81']==1){
$array_hack_time[] = '120';
}
if($p_arr['177']==1 and $p_arr['81']==1){
$array_hack_time[] = '180';
}
if($p_arr['178']==1 and $p_arr['81']==1){
$array_hack_time[] = '300';
}
if($p_arr['179']==1 and $p_arr['81']==1){
$array_hack_time[] = '1440';
}
if($p_arr['180']==1 and $p_arr['81']==1){
$array_hack_time[] = '2880';
}
if($p_arr['181']==1 and $p_arr['81']==1){
$array_hack_time[] = '4320';
}
if($p_arr['182']==1 and $p_arr['81']==1){
$array_hack_time[] = '7200';
}
if($p_arr['183']==1 and $p_arr['81']==1){
$array_hack_time[] = '21600';
}
if($p_arr['184']==1 and $p_arr['81']==1){
$array_hack_time[] = '28800';
}
if($p_arr['185']==1 and $p_arr['81']==1){
$array_hack_time[] = '43200';
}
if($p_arr['186']==1 and $p_arr['81']==1){
$array_hack_time[] = '64800';
}
if($p_arr['187']==1 and $p_arr['81']==1){
$array_hack_time[] = '86400';
}
if($p_arr['188']==1 and $p_arr['81']==1){
$array_hack_time[] = '129600';
}
if (!in_array($wtime, $array_hack_time)) {
exit('Düzgün vaxt seçilmeyib ve ya sizin buna hüququnuz yoxdur.');
}


$vtme = $inf["kik"];

if($row["level"] <= 7){
if($vtme>$SERVER_TIME){

		$tkick = $vtme - $SERVER_TIME;
		if($tkick < 60 && $tkick > 0)
		{
		$var = "saniyyelik";
		}
		elseif($tkick < 3600 && $tkick > 60)
		{
		$new = $tkick;
		$tkick = $new/60;
		$var = "deqiqelik";
		}
		elseif($tkick < 86400 && $tkick > 3600)
		{
		$new = $tkick;
		$tkick = $new/3600;
		$var = "saatl&#305;q";
		}
		elseif($tkick > 86400)
		{
		$new = $tkick;
		$tkick = $new/86400;
		$var = "g&#252;nl&#252;k";
		}
		$tkick = round($tkick, 0);

$_v->title('Twk','center');
$_v->fsize1($fsize1);
if($xare==$user)echo "$pnik leqebli istifadecini siz ujey $tkick $var  xaric edibsiz...<br/>****<br/>\n";
else echo "$pnik leqebli istifadecini sizden evvel <u>$xare</u>, $tkick $var  xaric edib...<br/>****<br/>\n";
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";} 
else {
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$pname</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
}
$soft = $inf["user_soft"];
$pid = $inf["id"];
$_v->title('Okey','center');
$_v->fsize1($fsize1);                                               


$act_level = 0;

if($p_arr['223']==1){
$act_level = 9;
}elseif($p_arr['222']==1){
$act_level = 8;
}elseif($p_arr['221']==1){
$act_level = 7;
}elseif($p_arr['220']==1){
$act_level = 6;
}elseif($p_arr['219']==1){
$act_level = 5;
}elseif($p_arr['218']==1){
$act_level = 4;
}elseif($p_arr['217']==1){
$act_level = 3;
}elseif($p_arr['216']==1){
$act_level = 2;
}elseif($p_arr['215']==1){
$act_level = 1;
}elseif($p_arr['214']==1){
$act_level = 0;
}
if($u_level<$row["level"] or $u_level<$act_level){
$wtime = $wtime * 60 + $SERVER_TIME;

echo "\"<b>$pnik</b>\" Xaric edildi!!!\n";
mysql_query ("UPDATE `users` SET `kik` = '".$wtime."', `whokik` = '".$user."', `whykik` = '".$whykik."', `time` = '".($SERVER_TIME-$_AUTO['ofline'])."' WHERE `id` = '".$pid."';");
if($whykik!="")$whykik = " (Sebeb: <u>$whykik</u>.)";

		$tkick = $wtime - $SERVER_TIME;
		if($tkick < 3600 && $tkick > 59)
		{
		$new = $tkick;
		$tkick = $new/60;
		$var = "deqiqelik";
		}
		elseif($tkick < 86400 && $tkick > 3599)
		{
		$new = $tkick;
		$tkick = $new/3600;
		$var = "saatl&#305;q";
		}
		elseif($tkick > 86399)
		{
		$new = $tkick;
		$tkick = $new/86400;
		$var = "g&#252;nl&#252;k";
		}
		$tkick = round($tkick, 0);

@$fi = fopen("file/control/3.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("$user - [<b>$pnik</b>] $whykik ($tkick $var.) $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);


if($p_arr['189']==1){
$access_elan = '1';
}
elseif($p_arr['190']==1 and $rm!='')
{
$access_elan = '1';
}

if($access_elan=='1'){
for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$mes = "<b>$user_admin</b> - \"<u>$pnik</u>\" <b>leqebli istifade&#231;ini $tkick $var chatdan xaric etdi.</b>$whykik";
$rnd = rand(0,99999999);
mysql_query ("Insert into `room{$i}` set `klu4`= '".$rnd."', `time`='".$today."', `who`='".$xeberci."', `message`='".$mes."', `id`='".$SERVER_TIME."', `towhom`='', `hid`='0', `usid`='7';");
}
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '7';");
}


} else {
$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$u_level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];
echo " \"<b>".$levname."</b>\" Xaric etmeye ixtiyar&#305;n&#305;z yoxdu)))\n";
}
echo "<br/>****<br/>\n";
if($rm!=""){
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