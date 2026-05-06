<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
$_v->key($nk);

if($row['level']>=8)
{
	$table_banned = '';
}
else
{
	$table_banned = "and `banned`!='2'";
}

if($p_arr['201']==1)
{
	$order_level = "`user_soft`,`user_ip`,";
}
else
{
	$order_level = '';
}
if($row["infophp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz infoya Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
mysql_query ("Select * from info_qov where usid='".$id."' and id='".$nk."'");
if (mysql_affected_rows() == true){
$select = @mysql_query ("Select `id`,`user` from `users` where `id`='".$nk."';");
$inf = mysql_fetch_array ($select);
mysql_free_result($select);
$user=$inf["user"];
$_v->title('info iqnor','center');
$_v->fsize1($fsize1);
echo "<b>$user</b> Sizi Infodan Qovub :))<br/>";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($rm==10) $takep="&amp;pwd=$pwd&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref";
else if($rm!='') $takep="&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref";
else $takep="&amp;nk=$nk&amp;ref=$ref";


if(isset($_POST['info']))
{
	include("./file/require/inside.php"); die();
}

$select = @mysql_query ("Select `id`,`user`,`name`,`sex`,`img`,`bal`,`time`,`inv`,`banned`,`kik`,`whokik`,`whykik`,".$order_level."`mesaj`,`nastroi`,`para`,`tox`,`mexvi`,`level`,`zn`,`qefes`,`xstatus`,`time_active`,`image_fon`,`posts`,`infostat`,`anket`,`ankets` from `users` where `id`='".$nk."' ".$table_banned.";");
if (mysql_affected_rows() == 0){
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
$para = $inf["para"];
$mesaj=$inf["mesaj"];
$tox=$inf["tox"];
$mexvi=$inf["mexvi"];
$level=$inf["level"];
$img=$inf["img"];
$zn=$inf["zn"];
$qefes=$inf["qefes"];
$xstatus=$inf["xstatus"];
$Post=$inf["posts"];
$infostat = $inf["infostat"];
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


if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";


ob_start();
$rpos = file("file/dat_folder/n_n/post.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);
$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaricc = trim($xx1[4]);
$_v->title('Info: '.$nick);
$_v->fsize1($fsize1);

if($b=="2")
{
	$sql = mysql_query("SELECT `usid` FROM `ignor` WHERE `id` = '".$nk."';");
	if(mysql_num_rows($sql) != 0)
	{
		echo "<b>Iqnor List</b>: ";
		$i=0;
		while($ignores = mysql_fetch_array($sql))
		{
			$i++;
			$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$ignores['usid']."';");
			$dost = mysql_fetch_array($q);
			$ignores = $dost['user'];
			echo "<u>".$ignores."</u>";
			if(mysql_num_rows($sql)!=$i){echo ", ";}
		}
		echo "<br/>\n";
	}
	else
	echo "Bu istifade&#231;inin iqnor siyahsinda he&#231;kes yoxdur...<br/>\n";
	echo $divide;
	echo "<a href=\"inside.php?id=$id&amp;ps=$ps$takep\">Geri qay&#305;t</a><br/>\n";
	if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Chata qayit</a><br/>\n";
	else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	ob_end_flush();
	exit;
}
elseif($b=="1")
{
	$sql = mysql_query("SELECT `usid` FROM `friends` WHERE `id` = '".$nk."';");
	if(mysql_num_rows($sql) != 0)
	{
		echo "<b>Dostlar&#305;</b>: ";
		$i=0;
		while($friends = mysql_fetch_array($sql))
		{
			$i++;
			$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$friends['usid']."';");
			$dost = mysql_fetch_array($q);
			$friends = $dost['user'];
			echo "<u>".$friends."</u>";
			if(mysql_num_rows($sql)!=$i){echo ", ";}
		}
		echo "<br/>\n";
	}
	else
	echo "Bu istifade&#231;inin Dostlar&#305; yoxdur...<br/>\n";
	echo $divide;
	echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Geri qay&#305;t</a><br/>\n";
	if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Chata qayit</a><br/>\n";
	else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
	
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	ob_end_flush();
	exit;
}

if($infostat!=""){
echo " <b>&#304;nfo Status: </b> <u>$infostat</u><br/><br/>";
}

if($rm!='')
{
	@mysql_query ("Select `id` from `ignor` where `usid`=".$id." and `id`='".$nk."';");
	if (mysql_affected_rows()!=0)
	{
		echo "<b>".$nick."</b> sizi iqnor edib...<br/>Bu o demekdir kim <u>".$nick."</u> Sizinle dan&#305;&#351;maq istemir!<br/>\n";
	}
	else
	{
		echo "$zn<b>".$nick."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
		$_v->action("chat.php?id=$id&amp;ps=$ps$takep");
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

if($mexvi!='0' and $row['level']<8)
{
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
	if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1))
	{
		echo $divide;
		user_ban_list();
		echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps$takep\">Cezaland&#305;r</a></b><br/>\n";
	}
	elseif($inf["tox"]== '0')
	{
		if($xaricc!="0"){echo $divide;
		echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";}
	}
	$_v->divide();
}
else
{
	if ($qefes!='0')
	{
		echo "<u>Virtual Qefes</u>, i&#351;tirak&#231;&#305;s&#305;...<br/>\n";
		if($qefes==3)echo "Me&#287;lub olub<br/>\n";
		else
		echo "[<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;login=$nick&amp;$ref\">Ses ver</a>]<br/>\n";
		echo $divide;
	}

	if($inf['image_fon']!='')
	{
		echo "<img src=\"photos/src/".$inf['image_fon']."\" alt=\"Foto\"/><br/>\n";
		echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
		echo $divide;
	}

	echo "<b>-ID:</b> $nk<br/>\n";
	if (eregi("nak", $inf["zn"]))
	echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";
if($bonus=="0" or $$nihadbal>$nikovaxt or $row['level']>7){
	echo "<b>-Ad&#305;:</b> $name<br/>\n";
}
	if($inf['image_fon']=='' and $img!='0')
	{
		echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
	}
if($bonus=="0" or $$nihadbal>$nikovaxt or $row['level']>7){
	if($nastroi!="") echo "<b>-Ehval&#305;:</b> $nastroi<br/>\n";
	}
	if ($sex=="0")echo "<b>-Cinsi:</b> Ki&#351;i<br/>\n";
	else if ($sex=="1")echo "<b>-Cinsi:</b> Qad&#305;n<br/>\n";
	if($level>3)
	{
		$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$level."';");
		$levels = @mysql_fetch_array($levelselect);
		$levname = $levels['name'];
		echo "<b>-R&#252;tbe: <u>$levname</u></b><br/>\n";
	}

	if($para!='')echo "<u>-Heyat yolda&#351;&#305;:</u> <b>$para</b> <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$para&amp;$ref\"><img src=\"img/uzuk.gif\"/></a><br/>\n";
	if($bal>0) echo "<b>-Ballar&#305;:</b> ($bal)<br/>\n";


	echo "<b>-G&#252;nl&#252;k reytinq:</b> (<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".ac_user_time($inf['time_active'])."</a>)<br/>\n";
	echo $divide;

	if(exit_time($time)>=$SERVER_TIME)
	{
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
	if($mexvi!='0' or $inf["tox"]!='0') echo $divide;



if($bonus=="1"){
if($$nihadbal>"$nikovaxt")
{
}else{
echo "<b>$nick</b> $nikovaxt $nihadbal Yigdiqdan Sora <b><i>Tam Melumati</i></b> Aktiv Olacaq..!<br/>\n";
}
}
if($bonus=="0" or $$nihadbal>$nikovaxt or $row['level']>7){
print $_v->submit('<b>Tam Melumat</b>','info=open',"inside.php?id=$id&amp;ps=$ps$takep");
}



	$_v->divide('wml');


	if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1))
	{
		user_ban_list();
		echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps$takep\">Cezaland&#305;r</a></b><br/>\n";
		$_v->divide();
	}
	elseif($inf["tox"]== '0')
	{
		if($xaricc!="0"){echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";
		$_v->divide();}
	}
}


if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>