<?php

$select = @mysql_query ("Select `id`,`user`,`name`,`sex`,`img`,`bal`,`status`,`time`,".$order_level."`para`,`tox`,`mexvi`,`birth`,`meqsed`,`city`,`infa`,`posts`,`credits`,`gposts`,`date`,`room`,`forum`,`fpost`,`roompost`,`level`,`zn`,`qefes`,`xstatus`,`time_active`,`image_fon`,`infostat`,`nnposts`,`anket`,`ankets` from `users` where `id`='".$nk."' ".$table_banned.";");
if (mysql_affected_rows() == 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Nick Tap&#305;lmad&#305;. Yeqin Silinib.<br/>";
	echo $divide;
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
exit;
}

$inf = mysql_fetch_array ($select);
$nk=$inf["id"];
$nick = $inf["user"];
$name = $inf["name"];
$bal = $inf["bal"];
$sex = $inf["sex"];
$time = $inf["time"];
$nastroi = $inf["nastroi"];
$status = $inf["status"];
$para = $inf["para"];
$tox=$inf["tox"];
$mexvi=$inf["mexvi"];
$level=$inf["level"];
$img=$inf["img"];
$zn=$inf["zn"];
$qefes=$inf["qefes"];
$xstatus=$inf["xstatus"];

$birth = $inf["birth"];
$meqsed = $inf["meqsed"];
$city = $inf["city"];
$infa = $inf["infa"];
$posts = $inf["posts"];
$credits = $inf["credits"];
$gposts = $inf["gposts"];
$date = $inf["date"];
$room = $inf["room"];
$forum=$inf["forum"];
$fpost=$inf["fpost"];
$roompost=$inf["roompost"];
$Post = $inf["posts"];
$infostat = $inf["infostat"];
$nnposts = $inf["nnposts"];
$anket = $inf["anket"];
$ankets = $inf["ankets"];
if ($xstatus == 1) {
$xmesaj = "Online";
} else if ($xstatus == 2) {
$xmesaj = "Offline";
} else if ($xstatus == 3) {
$xmesaj = "Me&#351;gulam";
} else if ($xstatus == 4) {
$xmesaj = "Sevgi axtar&#305;ram";
} else if ($xstatus == 5) {
$xmesaj = "Tan&#305;&#351; olmuram";
} else if ($xstatus == 6) {
$xmesaj = "Dar&#305;x&#305;ram";
} else if ($xstatus == 7) {
$xmesaj = "&#199;ekirem";
}

if ($credits>=0 && $credits<100) $victstatus="Xam";
if ($credits>=100 && $credits<500) $victstatus="Telebe";
if ($credits>=500 && $credits<1000) $victstatus="Bakalavr";
if ($credits>=1000 && $credits<2000) $victstatus="Magistr";
if ($credits>=2000 && $credits<5000) $victstatus="Doktora Namized";
if ($credits>=5000 && $credits<7000) $victstatus="Elmler Doktoru";
if ($credits>=7000) $victstatus="Dahi insan";
if($zn!='')$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";


ob_start();
$_v->title('Info: '.$nick);
$_v->fsize1($fsize1);
$rpos = file("file/dat_folder/n_n/nikobal.dat");
$nikobal = trim($rpos[0]);
$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaricc = trim($xx1[4]);
$rpos = file("file/dat_folder/n_n/post.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);
if($bonus=="0" or $$nihadbal>$nikovaxt or $row['level']>7){

if($infostat!=""){
echo " <b>&#304;nfo Status: </b> <u>$infostat</u><br/><br/>";
}
if ($room=="29"){
 echo " Bu istifade&#231;i Hal-Haz&#305;rda <a href=\"mesaj.php?id=$id&amp;ps=$ps$takep\">Mesajlardad&#305;r</a><br/>\n";
} else if ($room=="30"){
 echo " Bu istifade&#231;i Hal-Haz&#305;rda <a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehlizdedir</a><br/>\n";
} else if ($room=="28"){
 echo "Bu istifade&#231;i Hal-Haz&#305;rda <a href=\"on.php?id=$id&amp;ps=$ps$takep\">Tan&#305;&#351;l&#305;qdad&#305;r</a><br/>\n";
}else{
$roomselect = @mysql_query ("Select name from rooms where rm='$room';");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];

 echo "Bu istifade&#231;i hal-haz&#305;rda <a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$room$takep\">$roomname</a> ota&#287;&#305;ndad&#305;r<br/>\n";
}
	echo $divide;

if($rm!='')
{
	@mysql_query ("Select `id` from `ignor` where `usid`=".$id." and `id`='".$nk."';");
	if (mysql_affected_rows()!=0){
		echo "<b>".$nick."</b> sizi iqnor edib...<br/>Bu o demekdir kim <u>".$nick."</u> Sizinle dan&#305;&#351;maq istemir!<br/>\n";
	}
	else
	{
		$_v->action("chat.php?id=$id&amp;ps=$ps$takep");

		echo "$zn<b>".$nick."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
		print $_v->input("<input name=\"msg$ref\" maxlength=\"300\" title=\"Text\"/>").'<br/>';
		
		$val = ($row['say']==1 || $mod=='privat') ? '1' : '0';
		$option = '<select name="prvt">';
		$option .= '<option value="0">&#220;mumi </option>|';
		if ($nk!=$id)
		$option .= '<option value="1">&#350;exsi</option>|';
		$option .= '</select>';
		
		print $_v->select($option,$val).'<br/>';

		if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
		{
			$option = "<select name=\"shr$ref\" multiple=\"true\">|";
			if($p_arr['210']==1)$option .= "<option value=\"1\">Kursiv</option>|";
			if($p_arr['211']==1)$option .= "<option value=\"2\">Alt&#305; Xetli</option>|";
			if($p_arr['212']==1)$option .= "<option value=\"3\">Qal&#305;n</option>|";
			if($p_arr['213']==1)$option .= "<option value=\"4\">B&#246;y&#252;k</option>|";
			$option .= "</select>";
			print $_v->select($option).'<br/>';
		}
		$_v->sub_val('msg', $nick.', {msg}');

		print $_v->submit('G&#246;nder','towhom='.$nk);
		echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Mesaj Yaz</a><br/>\n";



}
}
else
{
	if($red!='')echo "<b><a href=\"reytinq.php?id=$id&amp;ps=$ps$takep\">Lider Ol</a></b><br/>----<br/>\n";
	echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Mesaj Yaz</a><br/>\n";



}
if ($anket=="1"){echo "<br/><b>Bu istifade&#231;inin infosu ba&#287;lidir.</b><br/>\n";}
if ($anket=="1" and $id !=1){
    $_v->divide();
    echo "Haqq&#305;nda-<b> $ankets</b><br/>\n";
    $_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	ob_end_flush();
	exit;
}

$_v->divide();

if($mexvi!='0' and $row['level']<8){
if (eregi("nak", $inf["zn"]))
echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";
else
echo "<b>Nick:</b> $nick<br/>\n";
if ($sex=="0")echo "<b>Cinsi:</b> Ki&#351;i<br/>\n";
else if ($sex=="1")echo "<b>Cinsi:</b> Qad&#305;n<br/>\n";
echo $divide;
echo '<b>Tam Mexvi istifade&#231;i</b><br/>';

if($inf["tox"] == '1')
{
echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
elseif($inf["tox"] == '2')
{
echo "<u>TAM Toxunulmaz</u> - <img src=\"img/toxu_2.gif\"/><br/>\n";
}
if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1)){
echo $divide;
user_ban_list();
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps$takep\">Cezaland&#305;r</a></b><br/>\n";
}
elseif($inf["tox"]== '0')
{
if($xaricc!="0"){echo $divide;
echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";}
}
echo $divide;
}else{
if($row["anketb"]==0){	
mysql_query ("Select * from `viewanket` where `usid`='".$id."' and `myid`='".$nk."';");
mysql_query ("Update `viewanket` set `vanket`='1'+`vanket` where `usid` ='".$id."' and `myid`='".$nk."';");
if (mysql_affected_rows()==0){
mysql_query ("INSERT INTO viewanket SET user = '".$row['user']."', usid = '".$id."', myid = '".$nk."', `vanket`='1'+`vanket`;");
mysql_query ("Update `users` set `vanket`='1'+`vanket` where `id` ='".$nk."';");
}
}
$q = mysql_query("SELECT COUNT(`id`) FROM `beyen` WHERE `kimi` = '".$nk."';");
$who = mysql_result($q, 0);
echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$nk&amp;ref=$ref\">Beyenenler-$who</a><br/>";

print $_v->submit2('Beyenirem (5 bal)','nick='.$nick,"beyen.php?id=$id&amp;ps=$ps&amp;bol=add&amp;ref=$ref");

echo "<a href=\"blat.php?b=1&amp;id=$id&amp;ps=$ps&amp;nk=$nk$takep\">G&#246;z Vur</a> (2 bal)<br/>\n";
echo "<a href=\"blat.php?b=2&amp;id=$id&amp;ps=$ps&amp;nk=$nk$takep\">&#214;p&#252;&#351; g&#246;nder</a> (10 bal)<br/> \n";
echo "<a href=\"blat.php?b=3&amp;id=$id&amp;ps=$ps&amp;nk=$nk$takep\">D&#252;rtmele</a> (5 bal)<br/>\n";

echo $divide;

if ($qefes!="0"){
echo "<u>Virtual Qefes</u>, i&#351;tirak&#231;&#305;s&#305;...<br/>\n";
if($qefes==3)echo "Me&#287;lub olub<br/>\n";
else
echo "[<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;login=$nick&amp;$ref\">Ses ver</a>]<br/>\n";
echo $divide;
}


if($inf['image_fon']!=''){
echo "<img src=\"photos/src/".$inf['image_fon']."\" alt=\"Foto\"/><br/>\n";
echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
echo $divide;
}

echo "ID n&#246;mresi: <b>$nk</b><br/>\n";
if (eregi("nak", $inf["zn"]))
echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";



if($id!='1'){
echo "Nike <a href=\"ses.php?mod=votes1&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">1</a>-";
echo "<a href=\"ses.php?mod=votes5&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">5</a>-";
echo "<a href=\"ses.php?mod=votes10&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">10</a> Ses Ver!<br/>";
echo "<a href=\"plaint.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">&#350;ikayet Et!</a><br/>";
}
echo "Ad&#305;: $name<br/>\n";
if($inf['image_fon']=='' and $img!='0'){
echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
}

if($nastroi!="") echo "Ehval&#305;: $nastroi<br/>\n";
echo "Do&#287;um Tarixi: $birth<br/>\n";
if ($sex=="0")echo "Cinsi: Ki&#351;i<br/>\n";
else if ($sex=="1")echo "Cinsi: Qad&#305;n<br/>\n";
if($city!="")echo "Ya&#351;ad&#305;&#287;&#305; yer: $city<br/>\n";


echo "Postlar&#305;: $posts | Bu Gun ($nnposts)<br/>\n";
echo "Otaq Post: $roompost<br/>\n";

echo "Ballar&#305;: <u><b>$bal</b></u><br/>";

echo "Cavablar&#305;: $credits<br/>\n";
echo "Bilik R&#252;tbesi: $victstatus<br/>";

$sql = mysql_query("SELECT `usid` FROM `friends` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) != 0){
echo "Dostlar&#305;: ";
if(mysql_num_rows($sql) > 10)
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;b=1$takep\">".mysql_num_rows($sql)."</a>";
else{
$i=0;
while($friend = mysql_fetch_array($sql))
{
$i++;
$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$friend['usid']."';");
$dost = mysql_fetch_array($q);
$frend = $dost['user'];
echo "<u>".$frend."</u>";
if(mysql_num_rows($sql)!=$i){echo ", ";}
}}
echo "<br/>\n";
}

$sql = mysql_query("SELECT `usid` FROM `ignor` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) != 0){
echo "Iqnor List: ";
if(mysql_num_rows($sql) > 10)
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;b=2$takep\">".mysql_num_rows($sql)."</a>";
else{
$i=0;
while($friend = mysql_fetch_array($sql))
{
$i++;
$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$friend['usid']."';");
$dost = mysql_fetch_array($q);
$frend = $dost['user'];
echo "<u>".$frend."</u>";
if(mysql_num_rows($sql)!=$i){echo ", ";}
}}
echo "<br/>\n";
}

echo "Meqsedi:\n";
if($meqsed=="1"){
echo "Sevgi Tapmaq";
}elseif($meqsed=="2"){
echo "Virtual Dostluq";
}elseif($meqsed=="3"){
echo "Hems&#246;hbet olmaq";
}else{
echo "Dost Tapmaq";
}
echo "<br/>";

echo "Status: <u>$status</u><br/>\n";
if($level>3){
$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels['name'];
echo "<b>R&#252;tbe</b>: <u>$levname</u><br/>\n";
}
if($forum==1)echo "Forumda: <b>Heveskar</b><br/>\n";
elseif($forum==2)echo "Forum R&#252;tbe: <b>Moderator</b><br/>\n";
elseif($forum==3)echo "Forum R&#252;tbe: <b>Admin</b><br/>\n";
if($fpost>=1)
echo "Forumda m&#246;vzular&#305;: (<a href=\"forum.php?id=$id&amp;ps=$ps&amp;cmd=m&amp;nk=$nk&amp;ref=$ref\">$fpost</a>)<br/>\n";
echo "<u>&#214;z&#252; haqq&#305;nda</u>: <i>$infa</i><br/>\n";
if($para!="")echo "<u>Heyat yolda&#351;&#305;:</u> <b>$para</b> <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$para&amp;$ref\"><img src=\"img/uzuk.gif\"/></a><br/>\n";
echo "G&#252;nl&#252;k reytinq: (<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".ac_user_time($inf['time_active'])."</a>)<br/>\n";
$rd=explode('-',$date);
$t_reg=mktime(8,0,0,$rd[1],$rd[0],$rd[2]);
$days = explode('.',($SERVER_TIME-$t_reg)/86400);
echo "Qeydiyyat Tarixi: $date - (<b>$days[0] g&#252;n</b>)<br/>\n";
echo "<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Anketine Baxanlar</a><br/>\n";


echo $divide;


if(exit_time($time)>=$SERVER_TIME){
if ($xstatus!=0)echo "<b>Status:</b> <img src=\"img/x-status/".$xstatus.".gif\"/> <u>".$xmesaj."</u><br/>\n";
else
echo "<b>Online</b> - (Hal-haz&#305;rda saytdad&#305;r.)<br/>\n";
}
else 
{
$tkick = $SERVER_TIME - exit_time($time);

if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

if($level>8&&$row['level']<8) echo "<i>Melumat yoxdur(((</i><br/>\n";
else echo "<b>Offline</b>: - ($tkick $vaxt evvel &#199;atdan &#231;&#305;x&#305;b.)<br/>\n";
}
echo $divide;


if($mexvi!='0')
{
echo '<b>Tam Mexvi istifade&#231;i</b><br/>';
}
if($inf["tox"] == '1')
{
echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
elseif($inf["tox"] == '2')
{
echo "<u>TAM Toxunulmaz</u> - <img src=\"img/toxu_2.gif\"/><br/>\n";
}
if($mexvi!='0' or $inf["tox"]!='0')
echo $divide;
echo "<a href=\"ignor.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">&#304;gnor et</a> | ";
echo "<a href=\"friends.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nick=$nk&amp;ref=$ref\">Dost ol</a><br/>\n";
echo $divide;
echo "<a href=\"info_qov.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">&#304;nfondan Qov</a> ($nikobal Bal)<br/>";
echo $divide;
	$qed = mysql_query("SELECT COUNT(`id`)  FROM `hediyye` WHERE `toid` = '".$nk."';");
	$hedi = mysql_result($qed, 0);

$qes = mysql_query("SELECT COUNT(`id`)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);

echo "[<a href=\"hediyye.php?bol=2&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Hediyyeleri</a>]-($hedi)<br/>\n";
echo "[<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">Xatire Defteri</a>]-($su)<br/>\n";

if($p_arr['201']!=1)echo "<b>[<a href=\"tel.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Tel Modeline bax</a>]</b><br/>\n";

echo $divide;

if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1)){
user_ban_list();
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Cezaland&#305;r</a></b><br/>\n";
$_v->divide();
}
elseif($inf["tox"]== '0')
{
if($xaricc!="0"){echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";
$_v->divide();}
}

}
}
if($p_arr['201']==1 and ($level<$row['level'] or $id==1)){
echo "<b>IP: $inf[user_ip]</b><br/>\n";
echo "<u><b>Soft:</b> $inf[user_soft]</u><br/>\n";
$_v->divide();
}

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>