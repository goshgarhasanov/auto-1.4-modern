<?php
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


$colseds=file("file/qefes/qefes.dat");
$close = trim($colseds[0]);//0 open colsed
$dat_config_limit = trim($colseds[1]);//1 qefesi terk edenlerin sayi
$dat_user_cont = trim($colseds[2]);//2 user sayi
//$hediyye = trim($colseds[3]);//3 hediyye



//$_v->header('Virtual Qefes');

if (($cid!="0")&&($close=="2"))//////////////QEFESIN BAGHLANMASI ADMIN PANELE AID DEYIL.
{
	$_v->title('Virtual Qefes','center');
	$_v->fsize1($fsize1);

	echo "<b>Virtual Qefes</b><br/>\n"; 
	$_v->divide();
	echo "Qefes Oyunu m&#252;veqqeti dayand&#305;r&#305;l&#305;b!<br/>";
	$_v->divide();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

if (($cid!="0")&&($close=="x"))////////////// QEFESIN BITMESI ADMIN PANELE AID DEYIL.
{
	$_v->title('Virtual Qefes','center');
	$_v->fsize1($fsize1);
	$mesaj=file("file/qefes/1.dat");
	$mesaj3 = trim($mesaj[1]);
	echo "<b>Virtual Qefes</b><br/>";
	$_v->divide();
	echo "$mesaj3---<br/>\n";
	echo "Virtual Qefes sona &#231;atd&#305;.<br/>\n";
	echo "Qefes Oyununun n&#246;vbeti turu tezlikle ba&#351;layacaq.<br/>";
	$_v->divide();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$_v->title('Virtual Qefes','center');
$_v->fsize1($fsize1);

switch($cid) {

case '0':////////////// ADMIN PANEL

if($p_arr['37']==1)
{
	$adminpanel=1;

	switch($jo)
	{
		default:
		echo "<b>Qefes Panel</b><br/>\n";
		$_v->divide();
		$_v->align('left');
		echo "<a href=\"qefes.php?cid=0&amp;jo=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefes Qur&#287;ular&#305;</a><br/>\n";
		echo "<a href=\"qefes.php?cid=0&amp;jo=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#220;mumi Mesaj</a><br/>\n";
		echo "<a href=\"qefes.php?cid=0&amp;jo=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz Mesaj</a><br/>\n";
		echo "<a href=\"qefes.php?cid=0&amp;jo=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefesi Temizle</a><br/>\n";
		break;

		case '3':
		
			$gun=date("w",$SERVER_TIME);
			if(!file_exists("file/qefes/0_aktiv.dat")){
			@rename('file/qefes/0_deaktiv.dat','file/qefes/0_aktiv.dat');
			}

			$file = file("file/qefes/0_aktiv.dat");
			if(!isset($_POST['sra1']))
			{
				$sra0 = trim($file[0]);
				$sra1 = trim($file[1]);
				$sra1 = str_replace('<br/>', '', $sra1);

				$sra1 = str_replace('<b>', '[b]', $sra1);
				$sra1 = str_replace('</b>', '[/b]', $sra1);
				echo "<b>Qefes Panel</b><br/>";
				$_v->divide();
				$_v->align('left');

				echo "Dehlize mesaj<br/>";

				$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=0&amp;jo=3&amp;ref=$ref");
				print $_v->input("<input type=\"text\" name=\"sra1$ref\" maxlength=\"500\" value=\"$sra1\"/>").'<br/>';
				print $_v->select("<select name=\"sra0$ref\">|<option value=\"$gun\">Aktiv</option>|<option value=\"x\">Deaktiv</option>|</select>",$sra0).'<br/>';
				print $_v->submit('Yenile');
			}
			else
			{
				$sra1 = narmobil($sra1);
				$file = fopen("file/qefes/0_aktiv.dat", "w");
				$data .= htmlentities($sra0)."\n";
				$data .= "$sra1<br/>";
				fwrite($file, $data);
				fclose($file);
				echo "Melumat Yenilendi!<br/>";
			}
		break;

		case '4':
		if($x==1){
		mysql_query("UPDATE `users` SET `qefes` = '0' WHERE `qefes` != '0';");
		mysql_query ("TRUNCATE `qefes`;");
		mysql_query ("TRUNCATE `qefess`;");
		echo "<b>Qefes Temizlendi!</b><br/>----<br/>\n";
		echo "<a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual Qefes</a>\n";
		}else{
		echo "<b>Qefesi temizlemeye eminsiniz?</b><br/>----<br/>\n";
		echo "<a href=\"qefes.php?cid=0&amp;jo=4&amp;x=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">He</a> |\n";
		echo "<a href=\"qefes.php?cid=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">yox</a>\n";
		}
		break;


		case '1':
		if(!isset($_POST['action']))
		{
			$hediyye = trim($colseds[3]);//3 hediyye

			echo "<b>Qefes Panel</b><br/>";
			$_v->divide();
			$_v->align('left');
			$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=0&amp;jo=1&amp;ref=$ref");

			echo "Qefes Qur&#287;ular&#305;<br/>\n";
			print $_v->select("<select name=\"colsed_up$ref\">|<option value=\"0\">Oyun ba&#351;las&#305;n</option>|<option value=\"1\">Bilet sat&#305;ls&#305;n</option>|<option value=\"2\">Oyun ba&#287;lans&#305;n</option>|</select>",$close).'<br/>';

			echo "Qefesde i&#351;tirakcilar&#305;n say&#305;<br/>\n";
			print $_v->select("<select name=\"dat_user_cont_up$ref\">|<option value=\"9\">9 nefer</option>|<option value=\"15\">15 nefer</option>|<option value=\"21\">21 nefer</option>|<option value=\"33\">33 nefer</option>|</select>",$dat_user_cont).'<br/>';

			echo "Her g&#252;n oyunu terk etsin (en az sesi olan).<br/>\n";
			print $_v->select("<select name=\"dat_config_limit_up$ref\">|<option value=\"1\">1 nefer</option>|<option value=\"2\">2 nefer</option>|<option value=\"3\">3 nefer</option>|</select>",$dat_config_limit).'<br/>';

			echo "Udu&#351; hediyyesi. [u]<u>test</u>[/u], [i]<i>test</i>[/i], [b]<b>test</b>[/b]  - [br]<br/>\n";
			$hediyye = str_replace('</i>', '[/i]', $hediyye);
			$hediyye = str_replace('<i>', '[i]', $hediyye);
			$hediyye = str_replace('</u>', '[/u]', $hediyye);
			$hediyye = str_replace('<u>', '[u]', $hediyye);
			$hediyye = str_replace('</b>', '[/b]', $hediyye);
			$hediyye = str_replace('<b>', '[b]', $hediyye);
			$hediyye = str_replace('<br/>', '[br]', $hediyye);

			print $_v->input("<input type=\"text\" name=\"hediyye_up$ref\" maxlength=\"500\" value=\"$hediyye\"/>").'<br/>';
			print $_v->submit('Yenile','action=save');
		}
		else
		{

			$hediyye_up = narmobil($hediyye_up);

			$hediyye_up = str_replace('[/i]', '</i>', $hediyye_up);
			$hediyye_up = str_replace('[i]', '<i>', $hediyye_up);
			$hediyye_up = str_replace('[/u]', '</u>', $hediyye_up);
			$hediyye_up = str_replace('[u]', '<u>', $hediyye_up);
			$hediyye_up = str_replace('[/b]', '</b>', $hediyye_up);
			$hediyye_up = str_replace('[b]', '<b>', $hediyye_up);
			$hediyye_up = str_replace('[br]', '<br/>', $hediyye_up);


			$file = fopen("file/qefes/qefes.dat", "w");
			$datadata .= "$colsed_up\n";
			$datadata .= "$dat_config_limit_up\n";
			$datadata .= "$dat_user_cont_up\n";
			$datadata .= "$hediyye_up";
			fwrite($file, $datadata);
			fclose($file);

			if($colsed_up=="0")
			{
				$dat_qefes = file("file/qefes/1.dat");
				$gun=date("w",$SERVER_TIME);
				$test2 = trim($dat_qefes[1]);
				$test3 = trim($dat_qefes[2]);
				$test4 = trim($dat_qefes[3]);

				$birdate = fopen("file/qefes/1.dat", "w");
				$data .= "$gun\n";
				$data .= "$test2\n";
				$data .= "$test3\n";
				$data .= "$test4";
				fwrite($birdate, $data);
				fclose($birdate);
			}
			echo "Melumat Yenilendi!<br/>";
		}
		break;


		case '2':
		$dat_qefes = file("file/qefes/1.dat");
		$dat_gun = trim($dat_qefes[0]);
		$dat_elan_time = trim($dat_qefes[2]);
		$dat_extra_duel = trim($dat_qefes[3]);

		if(!isset($_POST['action']))
		{
			$dat_mesaj = trim($dat_qefes[1]);

			$dat_mesaj = str_replace('</i>', '[/i]', $dat_mesaj);
			$dat_mesaj = str_replace('<i>', '[i]', $dat_mesaj);
			$dat_mesaj = str_replace('</u>', '[/u]', $dat_mesaj);
			$dat_mesaj = str_replace('<u>', '[u]', $dat_mesaj);
			$dat_mesaj = str_replace('</b>', '[/b]', $dat_mesaj);
			$dat_mesaj = str_replace('<b>', '[b]', $dat_mesaj);
			$dat_mesaj = str_replace('<br/>', '[br]', $dat_mesaj);

			echo "<b>Qefes Panel</b><br/>";
			$_v->divide();
			$_v->align('left');

			$gun=date("w",$SERVER_TIME);
			echo "&#220;mumi mesaj. (<small>[u]<u>test</u>[/u], [i]<i>test</i>[/i], [b]<b>test</b>[/b]  - [br]</small>)<br/>";
			$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=0&amp;jo=2&amp;ref=$ref");

			print $_v->input("<input type=\"text\" name=\"dat_mesaj$ref\" maxlength=\"500\" value=\"$dat_mesaj\"/>").'<br/>';
			print $_v->submit('Yenile','action=save');
		}
		else
		{
			$dat_mesaj = narmobil($dat_mesaj);
			$dat_mesaj = str_replace('[/i]', '</i>', $dat_mesaj);
			$dat_mesaj = str_replace('[i]', '<i>', $dat_mesaj);
			$dat_mesaj = str_replace('[/u]', '</u>', $dat_mesaj);
			$dat_mesaj = str_replace('[u]', '<u>', $dat_mesaj);
			$dat_mesaj = str_replace('[/b]', '</b>', $dat_mesaj);
			$dat_mesaj = str_replace('[b]', '<b>', $dat_mesaj);
			$dat_mesaj = str_replace('[br]', '<br/>', $dat_mesaj);

			$sra2=$sra2*3600+$SERVER_TIME;
			$file = fopen("file/qefes/1.dat", "w");
			$data .= "$dat_gun\n";
			$data .= "$dat_mesaj\n";
			$data .= "$dat_elan_time\n";
			$data .= "$dat_extra_duel";
			fwrite($file, $data);
			fclose($file);
			echo "Melumat Yenilendi!<br/>";
		}
		break;
	}
}
break;



case 'news':
$hediyye = trim($colseds[3]);
echo "<b>Show haqq&#305;nda</b><br/>";
$_v->divide();
echo "Qaydalar &#231;ox sadedir, $dat_user_cont istifade&#231;i bilet ald&#305;qdan sonra, her g&#252;n&#252;n sonunda en az sesi olan $dat_config_limit istifade&#231;i qefesi terk edecek...<br/>\n";
echo "Sona qeder m&#252;barize apar&#305;b qefesde qalan 1 istifade&#231;i, qalib olacaq.<br/>--<br/>\n";
echo "Virtual Qefesin qalibi \"$hediyye\" qazanacaq!.<br/>--<br/>\n";
echo "<b>QEYD</b>: <u>Virtual Qefes oyunu he&#231;bir adminin m&#252;daxilesi olmadan, yani avtomatik rejimde i&#351;leyir.</u><br/>\n";
break;

case '1':
$hediyye = trim($colseds[3]);
$bals=file("file/bal_bot/0.dat");
$qefes_b = trim($bals[20]);


if ($close!=1)
{
echo "<b>Xeta</b><br/>";
$_v->divide();
echo "<i>Virtual Qefes Showsuna Start verilib</i>. <br/>
&#304;&#351;tirak&#231;&#305; se&#231;imi dayand&#305;r&#305;l&#305;b!<br/>";
break;
}

if(!isset($_POST['action']))
{
$userall = mysql_query ("select count(`id`) as `num` from `qefes`");
$usm = mysql_fetch_array($userall);
$nam = $usm["num"];
$bosh = $dat_user_cont-$nam;

echo "<b>&#304;&#351;tirak&#231;&#305; Qebulu</b><br/>";
$_v->divide();
echo "\"<u>Virtual Qefes</u>\"-in n&#246;vbeti se&#231;im turu ba&#351;lad&#305;.<br/>\n";
echo "Qefese $dat_user_cont i&#351;tirakc&#305; &#220;zv olduqdan sonra, Show START g&#246;t&#252;recek.<br/>-----<br/>\n";
echo "Virtual Qefesin qalibi <b>$hediyye</b> qazanacaq.<br/>\n";

$_v->align('left');

echo "<a href=\"qefes.php?cid=news&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Show haqq&#305;nda</a><br/>-----<br/>\n";
if($nam!=$dat_user_cont){
echo "Hal-haz&#305;rda qefesde $bosh bo&#351; yer var.<br/>\n";
echo "A&#351;a&#287;&#305;dak&#305; $nam nefer ise namizetdir.<br/>\n";
}
else
{
echo "Virtual Qefes-in $dat_user_cont i&#351;tirak&#231;&#305;s&#305; se&#231;ilib...<br/>\n";
echo "Oyuna 24 Saat Erzinde Start verilecek!<br/>----<br/>\n";
echo "Qefes oyununda i&#351;tirak edecek $nam i&#351;tirak&#231;&#305; a&#351;a&#287;dak&#305;lard&#305;r.<br/>\n";
}
if($nam!=0){
echo "-----<br/>\n";

$r = @mysql_query ("SELECT `user`,`uid`,`ses` FROM `qefes` ORDER BY `id` ASC LIMIT 0,$dat_user_cont;");
$i = 1;
while ($a = mysql_fetch_array($r))
{
if($id==$a[uid])echo ($i++).") <b><a href=\"qefes.php?cid=info&amp;info=".$a["uid"]."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$a["user"]."</a></b><br/>\n";
else echo ($i++).") <a href=\"qefes.php?cid=info&amp;info=".$a["uid"]."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$a["user"]."</a><br/>\n";
}
}
$qefes=$row["qefes"];


if($qefes==0)
{
	if($nam<$dat_user_cont)
	{
		echo "-----<br/>\n";
		echo "<b>Biletin</b>, qiymeti $qefes_b bald&#305;r.<br/>\n";
		print $_v->submit('Qefes &#252;&#231;&#252;n bilet al','action=save',"qefes.php?cid=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	}
}
else
{
	$user=$row["user"];
	echo "-----<br/>\n";
	echo "H&#246;rmetli <b>$user</b><br/>Siz Virtual Qefes-in &#220;zv&#252;s&#252;n&#252;z...<br/>\n";
}
break;
}
else
{
	$qefes=$row["qefes"];
	if ($qefes==1) {
	echo "<b>Tebrikler</b>!<br/>----<br/> Siz Virtual-Qefes Oyununa bilet ald&#305;n&#305;z.<br/>----<br/>\n";
	echo "&#214;z Platforman&#305;z&#305; qeyd etmeyi unutmayin!<br/>";
	echo "<a href=\"qefes.php?cid=plat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Platforman&#305;z</a><br/>\n";
	break;
	}
	$bal=$row["bal"];
	if ($bal>=$qefes_b)
	{
		$q = mysql_query ("Select * from `qefes` where `uid` = '".$id."' limit 1");
		if(mysql_num_rows($q) == 0)
		{
			$newbal=$bal-$qefes_b;
			$user=$row["user"];

			mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `qefes` = '1' WHERE `id` = '".$id."';");
			$sql = mysql_query("INSERT INTO `qefes` SET `uid` = '".$id."', `user`='".$user."'");

			echo "<b>Tebrikler</b>!<br/>----<br/> Siz Virtual-Qefes Oyununa bilet ald&#305;n&#305;z.<br/>----<br/>\n";
			echo "&#214;z Platforman&#305;z&#305; qeyd etmeyi unutmayin!<br/>";

			echo "<a href=\"qefes.php?cid=plat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Platforman&#305;z</a><br/>\n";
			$mes = "<b>$user - Virtual Qefes</b>, oyununa bilet ald&#305;. Tebrikler u&#287;urlu olsun!";
			for ($i=0; $i<=9; $i++)
			{
				$today=date ("H:i",$SERVER_TIME);
				$rnd = rand(0,99999999);
				mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='11'");
			}
			$rnd = rand(0,9);
			mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '11';");
			break;
		}
	}
	else
	{
		echo "<b>Hesab&#305;n&#305;zda bal yetersizdir.</b><br/>-----<br/>\n";
		echo "Virtual Qefes Show-ya bilet elde etmek &#252;&#231;&#252;n $qefes_b bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>\n";
		echo "Sizin Hesab&#305;n&#305;zda ise <b>$bal</b>. bal var.<br/>-----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		break;
	}
}
break;





case '3':
if ($close!=0)
{
echo "<b>Virtual Qefes</b><br/>----<br/><u>Virtual Qefes Show-suna  Start Verilmeyib</u>. <br/>
$dat_user_cont &#304;&#351;tirak&#231;&#305; se&#231;ildikden sonra START verilecek!<br/>";
break;
}
if($uid!=""){
$qefes1 = mysql_query ("Select * from `qefes` where `id` = '".$uid."' LIMIT 1;");
if (mysql_affected_rows() == 0) {
echo "<b>Virtual Qefes Showsunda Axtard&#305;&#287;&#305;n&#305;z i&#351;tirak&#231;&#305; tap&#305;lmad&#305;...</b><br/>-----<br/>";
echo "<a href=\"qefes.php?cid=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
break;
}
$mm = mysql_fetch_array ($qefes1);
$sid=$mm["id"];
$cuid=$mm["uid"];  
$login=$mm["user"];  
$qeyd=$mm["qeyd"];  
$usid=$mm["usid"];  
$off=$mm["off"];  
$ses=$mm["ses"];  
$ruser=$mm["ruser"];  
$date=$mm["date"];  

echo "<b>&#304;&#351;tirak&#231;&#305; Platformas&#305;</b><br/>----<br/>\n";
echo "Leqebi: <u>$login</u><br/>\n";
if($qeyd){echo "----<br/>\n";
echo "<i>$qeyd</i><br/>-----<br/>\n";}
$_v->align('left');
echo "<b>Statistikas&#305;</b>:<br/>\n";
echo "----<br/>";
$vses = mysql_query ("select count(`klu4`) as `num` from `qefess` where `kime` = '$cuid';");
$vs = mysql_fetch_array($vses);
$verilen = $vs["num"];
echo "<u>Ses verenler</u>: <b><a href=\"qefes.php?cid=ses_veren&amp;id=$id&amp;ps=$ps&amp;uid=$cuid&amp;ref=$ref\">".$verilen." nefer</a></b><br/>\n";
echo "<u>Ses say&#305;</u>: <b>".$ses."</b><br/>\n";
if($ses!=0){




function cuci($cuci)
{
$ccicix = strlen($cuci)-1;
$cuc = substr($cuci,$ccicix,strlen($cuci));
$cicu=array('1'=>''.$cuci.'-ci','2'=>''.$cuci.'-ci','3'=>''.$cuci.'-c&#252;','4'=>''.$cuci.'-c&#252;','5'=>''.$cuci.'-ci','6'=>''.$cuci.'-c&#305;','7'=>''.$cuci.'-ci','8'=>''.$cuci.'-ci','9'=>''.$cuci.'-cu','0'=>''.$cuci.'-cu','11'=>'Noyabr','12'=>'Dekabr');
$cuc = $cicu[$cuc];
return $cuc;
}

$r = @mysql_query ("SELECT `uid` FROM `qefes` where `off` ='0' ORDER BY `ses` desc LIMIT 0,$dat_user_cont;");
$i = 1;
while ($a = mysql_fetch_array($r))
{
if($cuid==$a["uid"]){
echo "Reytinqde <b>".cuci($i)."</b>, yerdedir.\n"; 
if($i<=3)echo "<img src=\"file/qefes/img/$i.gif\" alt=\"$i-$qa\"/>";
echo "<br/>";
}
else {$i++;}
}
}else{echo "<i>Heleki ses verilmeyib</i><br/>";}
if($off==0)
{
	$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=ses&amp;ref=$ref");
	print $_v->select("<select name=\"send$ref\">|<option value=\"1\">1</option>|<option value=\"2\">5</option>|<option value=\"3\">10</option>|<option value=\"4\">30</option>|<option value=\"5\">50</option>|<option value=\"6\">100 </option>|<option value=\"7\">500 </option>|<option value=\"8\">1000 </option>|</select>",'null').'<br/>';
	print $_v->submit('ses ver','kime='.$login.',action=save');
}
elseif($off==1)echo "<br/><b>Diqqet</b>: <u>Bu &#304;&#351;tirak&#231;&#305; <b>$date</b>, tarixinde  me&#287;lub oldu...</u><br/>";
else echo "<br/><b>Istifadeci melumatlarinda sehvlik var</b><br/>";

break;
}
echo "<b>&#304;&#351;tirak&#231;&#305;lar</b><br/>";
$_v->divide();
$r = @mysql_query ("SELECT `user`,`off`,`id`,`ses`,`usid`,`uid` FROM `qefes` where `off`='0' ORDER BY `ses` DESC LIMIT 0,$dat_user_cont;");
$i = 1;

if (mysql_affected_rows() == 0) {
echo "Virtual Qefes oyununa <b>Start</b>, verilmeyib...<br/>\n";
}
elseif (mysql_affected_rows() == 2) {
$hediyye = trim($colseds[3]);
echo "<b>Extra Duel</b> ba&#351;lad&#305;...<br/>";
echo "Bu istifade&#231;ilerden 1-i \"<b>$hediyye</b>\" qazanacaq.<br/>\n";
echo "Ses verin qalibi se&#231;in.<br/>";

$_v->align('left');

while ($a = mysql_fetch_array($r))
{
echo "$i)<a href=\"qefes.php?cid=3&amp;uid=".$a["id"]."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$a["user"]."</a> (<b><a href=\"qefes.php?cid=ses_veren&amp;id=$id&amp;ps=$ps&amp;uid=".$a["uid"]."&amp;ref=$ref\">".$a["ses"]."</a></b>-ses)\n";
if($i<=3)echo "<img src=\"file/qefes/img/$i.gif\" alt=\"$i-$qa\"/>";
echo "<br/>";
$i++;
}
} else {
echo "<i>&#304;&#351;tirak&#231;&#305;lara destek olun onlari 1-ci edin</i><br/>\n";

$_v->align('left');

while ($a = mysql_fetch_array($r))
{
	echo "$i)<a href=\"qefes.php?cid=3&amp;uid=".$a["id"]."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$a["user"]."</a> (<b><a href=\"qefes.php?cid=ses_veren&amp;id=$id&amp;ps=$ps&amp;uid=".$a["uid"]."&amp;ref=$ref\">".$a["ses"]."</a></b>-ses)\n";
	if($i<=3)echo "<img src=\"file/qefes/img/$i.gif\" alt=\"$i-$qa\"/>";
	echo "<br/>";
	$i++;
}
}
break;


case 'ses':
if ($close!=0)
{
echo "<b>Virtual Qefes</b><br/>----<br/><u>Virtual Qefes Show-suna  Start Verilmeyib</u>. <br/>
$dat_user_cont &#304;&#351;tirak&#231;&#305; se&#231;ildikden sonra START verilecek!<br/>";
break;
}
if(!isset($_POST['kime']))
{
echo "<b>Sesverme</b><br/>";
$_v->divide();
$_v->align('left');

$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=ses&amp;ref=$ref");

echo "<b>Kime: ?</b><br/>\n";

$option = "<select name=\"kime$ref\">|";

$r = @mysql_query ("SELECT `user`,`uid` FROM `qefes` where `off`='0' ORDER BY `ses` DESC;");
while ($a = mysql_fetch_array($r))
{
	$option .= "<option value=\"".$a['uid']."\">".$a['user']."</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';


echo "<u>Ne&#231;e ses</u>?<br/>";
print $_v->select("<select name=\"send$ref\">|<option value=\"1\">1</option>|<option value=\"2\">5</option>|<option value=\"3\">10</option>|<option value=\"4\">30</option>|<option value=\"5\">50</option>|<option value=\"6\">100 </option>|<option value=\"7\">500 </option>|<option value=\"8\">1000 </option>|</select>");
echo "ses<br/>";
print $_v->submit('Ses ver');
break;
}
else
{

if($send==8){
$send = 1000;
}elseif($send==7){
$send = 500;
}elseif($send==6){
$send = 100;
}elseif($send==5){
$send = 50;
}elseif($send==4){
$send = 30;
}elseif($send==3){
$send = 10;
}elseif($send==2){
$send = 5;
}elseif($send==1){
$send = 1;
}
else
{
$send = 1;
}
if ($send<=0){
echo "<b>Xeta</b><br/>-----<br/>0 ses vermek olmur :=)<br/>-----<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
print '<a href="javascript:history.back(1);">Geri Qay&#305;t</a><br/>';
break;
}
$bal=$row["bal"];
if ($bal<$send){
echo "<b>Xeta</b><br/>-----<br/>G&#246;ndermek istediyiniz meble&#287; hesab&#305;n&#305;zda yoxdur!<br/>-----<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
print '<a href="javascript:history.back(1);">Geri Qay&#305;t</a><br/>';
break;
}

if (!ctype_digit($kime)) {
$kime=trim($kime);
if($kime=="")$kime=0;
$latuser=strtolower($kime);
$uusers = mysql_query ("select `id` from `users` where `latuser` = '".$latuser."'");
}
else
{
$uusers = mysql_query ("select `id` from `users` where `id` = '".$kime."'");
}

if (mysql_affected_rows() == 0) {
echo "<b>Xeta</b><br/>-----<br/>Ses vermek istediyiniz istifade&#231;i Bazada tap&#305;lmad&#305;<br/>-----<br/>\n";
echo "<a href=\"qefes.php?id=$id&amp;ps=$ps&amp;cid=ses&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
break;
}
$row1 = mysql_fetch_array ($uusers);
$uuid=$row1["id"];

$ishtirak = mysql_query ("select `uid`,`user`,`off`,`ses`,`ruser`,`date` from `qefes` where `uid` = '".$uuid."'");
if (mysql_affected_rows() == 0) {
echo "<b>Xeta</b><br/>-----<br/>Ses vermek istediyiniz istifade&#231;i Qefes oyununda i&#351;tirak etmir!<br/>\n";
echo "Siz yalniz <u>Virtual Qefes</u>-de i&#351;tirak eden istifade&#231;ilere ses vere bilersiz.<br/>-----<br/>\n";
print '<a href="javascript:history.back(1);">Geri Qay&#305;t</a><br/>';
break;
}
$row2 = mysql_fetch_array ($ishtirak);
$suid=$row2["uid"];
$suser=$row2["user"];
$soff=$row2["off"];
$sses=$row2["ses"];
$sruser=$row2["ruser"];
$sdate=$row2["date"];

if($soff!="0"){
if($soff=="1"){
echo "Bu istifade&#231;i me&#287;lub olub.<br/>";
}elseif($soff=="2"){
echo "<b>Xeta</b><br/>-----<br/>Bu istifade&#231;i <u>$sdate</u>. tarixinde  me&#287;lub olub.<br/>";
}
echo "<u>Siz yaln&#305;z Virtual Qefes-de i&#351;tirak eden istifade&#231;ilere ses vere bilersiz</u>!<br/>-----<br/>";
print '<a href="javascript:history.back(1);">Geri Qay&#305;t</a><br/>';
break;
}

$menim=$bal-$send;
mysql_query ("Update `users` set `bal` = '".$menim."' where `id` ='".$id."';");
$sens = $send+$sses;
mysql_query ("Update `qefes` set `ses` = '".$sens."' where `uid` = '".$suid."';");

$ishtirak = mysql_query ("select `ses` from `qefess` where `kim` = '".$id."' and `kime` = '".$suid."';");
if (mysql_affected_rows() == 0) {
mysql_query ("Insert into `qefess` set `kim`='".$id."', `kime`='".$suid."', `ses`='".$send."';");
}else{
$cc = mysql_fetch_array ($ishtirak);
$myses = $cc["ses"];
$sens = $myses+$send;
mysql_query ("Update `qefess` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$suid."' where `kim` = '".$id."' and `kime` = '".$suid."'");
}


if($send>=10){
if($id==$suid){
$mes = "\"<b>".$row['user']."</b>\" - Qefes Oyununda &#246;z&#252;ne <b>".$send."</b>, ses verdi! <img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/>";
}
else
{
$mes = "\"<b>".$row['user']."</b>\" - Qefes Oyununda \"<b>".$suser."</b>\" leqebli istifade&#231;iye <b>".$send."</b>, ses verdi! <img src=\"file/qefes/img/ura.gif\" alt=\".ura.\"/>";
}

for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$rnd = rand(0,99999999);
mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='11'");
}
$rnd = rand(0,9);
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '11';");

}
echo "<b>$suser</b>, &#252;&#231;&#252;n verdiyiniz <b>$send</b> qebul olundu!<br/>";
echo "<i>Te&#351;ekk&#252;rler</i><br/>";
echo "<a href=\"qefes.php?cid=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
break;



case '5':
if ($close!=0)
{
echo "<b>Virtual Qefes</b><br/>----<br/><u>Virtual Qefes Show-suna  Start Verilmeyib</u>. <br/>
$dat_user_cont &#304;&#351;tirak&#231;&#305; se&#231;ildikden sonra START verilecek!<br/>";
break;
}

$r = @mysql_query ("SELECT `user`,`id`,`ses`,`nses` FROM `qefes` where `off`!='0' ORDER BY `nses` DESC LIMIT 0,$dat_user_cont;");
$i = 1;
if (mysql_affected_rows() == 0) {
echo "Virtual Qefes oyunu yeni ba&#351;lay&#305;b me&#287;lub olan istifade&#231;i yoxdur...<br/>\n";
break;
}

if($uid!=""){
$qefes1 = mysql_query ("Select * from `qefes` where `id` = '".$uid."' LIMIT 1;");
if (mysql_affected_rows() == 0) {
echo "<b>Virtual Qefes Showsunda Axtard&#305;&#287;&#305;n&#305;z i&#351;tirak&#231;&#305; tap&#305;lmad&#305;...</b><br/>-----<br/>";
echo "<a href=\"qefes.php?cid=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
break;
}
$_v->align('left');
$mm = mysql_fetch_array ($qefes1);
$cuid=$mm["uid"];  
$login=$mm["user"];  
$qeyd=$mm["qeyd"];  
$off=$mm["off"];  
$date=$mm["date"];  

echo "Leqebi: \n";
echo "<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$cuid&amp;ref=$ref\">$login</a></b><br/>";

echo "----<br/>\n";
echo "<i>$qeyd</i><br/>\n";
echo "----<br/>\n";


if($off==0)echo "<b>[<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;login=$login\">ses ver</a>]</b><br/>";
elseif($off==1)echo "<b>Diqqet</b>: <u>Bu &#304;&#351;tirak&#231;&#305; $date, tarixinde  me&#287;lub oldu...</u><br/>";
else echo "<i>Adminstrator terefinden Qefesden qovulub...</i><br/>";
break;
}
echo "<b>Me&#287;lub olanlar</b><br/>";
$_v->divide();
echo "<i>Bu &#304;&#351;tirak&#231;&#305;lar zeyif olduqlar&#305; &#252;&#231;&#252;n me&#287;lub olublar.</i><br/>\n";
$_v->align('left');
while ($a = mysql_fetch_array($r))
{
echo "$i)<a href=\"qefes.php?cid=5&amp;uid=".$a["id"]."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$a["user"]."</a> (".$a["ses"]."-ses)\n";
if($row['seviy']==9)echo "[".$a["nses"]."]\n";
echo "<br/>";
$i++;
}

break;


case 'plat':
$q = mysql_query ("Select `id`,`qeyd` from `qefes` where `uid` = '".$id."'");
if(mysql_num_rows($q) == 0)
{
	if ($close!=1)
	{
		echo "Bilet satilmir qefes START g&#246;t&#252;r&#252;b!<br/>";
		break;
	}
	$bals=file("file/bal_bot/0.dat");
	$qefes_b = trim($bals[20]);
	echo "Siz Virtual Qefes-in &#252;zv&#252; deyilsiz.<br/>-----<br/>";
	echo "<b>Biletin</b>, qiymeti $qefes_b bald&#305;r.<br/>\n";
	print $_v->submit('<b>Qefes &#252;&#231;&#252;n bilet al</b>','action=save',"qefes.php?cid=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	break;
}
if(!isset($_POST['action']))
{
	$arr = mysql_fetch_array($q);
	$qeyd=$arr['qeyd'];
	echo "<b>Platforman&#305;z</b><br/>";
	$_v->divide();
	echo "Platforma yani ki, &#246;z&#252;n&#252;z haqq&#305;nda ele s&#246;zler yazmal&#305;s&#305;z ki, ba&#351;qa istifade&#231;ilerin re&#287;betini<br/> qazanas&#305;z ve onlar Size daha &#231;ox ses versinler.<br/>-----<br/>";
	$_v->align('left');
	echo "<i>Platforman&#305;za yazaca&#287;&#305;n&#305;z s&#246;zler infonuzda g&#246;r&#252;necek</i>.<br/>----<br/>\n";

	$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=plat&amp;ref=$ref");
	echo "<b>Platforman&#305;z:</b><br/>\n";
	print $_v->input("<input name=\"qeyd$ref\" maxlength=\"100\" value=\"$qeyd\" title=\"text\"/>").'<br/>';
	print $_v->submit('Elave et','action=save');

break;
}
else
{
	if (strlen($qeyd)<1){
	echo "<i>Platforma b&#246;lmesini bo&#351; saxlamaq olmaz.</i><br/>-----<br/>\n";
	echo "<u>Platforma b&#246;lmesine ele sozler yaz&#305;n ki dost tan&#305;&#351;lar&#305;n&#305;z Size ses versin</u><br/>-----<br/>\n";
	echo "<a href=\"qefes.php?cid=plat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
	break;
	}
	
	if (strlen($qeyd)>100)
	{
		echo "<b>Diqqet</b><br/>----<br/>\n";
		$_v->align('left');
		echo "<i>Platforman&#305;za 100 simvoldan art&#305;q s&#246;z yazmaq olmaz</i>.<br/>----<br/>\n";
		echo "<b>Platforman&#305;z:</b><br/>\n";
		$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=plat&amp;ref=$ref");
		print $_v->input("<input name=\"qeyd$ref\" maxlength=\"100\" value=\"".$_POST["qeyd"]."\" title=\"text\"/>").'<br/>';
		print $_v->submit('Elave et','action=save');
		break;
	}


	$qeyd = narmobil($qeyd);
	echo "<b>Elave Edildi!</b><br/>\n";
	mysql_query("UPDATE `qefes` SET `qeyd` = '".$qeyd."' WHERE `uid` = '".$id."';");
}
break;


/////////////////////////////// info hazirdi
case 'info':
if ($close==0)
{
	echo "<u>Virtual Qefes Oyununa Start verilib</u>!<br/>";
	break;
}

if($info!="")
{
	$qefes1 = mysql_query ("Select * from `qefes` where `uid` = '".$info."' LIMIT 1;");
	if (mysql_affected_rows() == 0) {
		echo "<b>Xeta</b><br/>-----<br/>Virtual Qefes Showsunda Axtard&#305;&#287;&#305;n&#305;z i&#351;tirak&#231;&#305; tap&#305;lmad&#305;...<br/>\n";
		break;
	}
	$_v->align('left');
	$mm = mysql_fetch_array ($qefes1);
	$login=$mm["user"];  
	$qeyd=$mm["qeyd"];  
	$cuid=$mm["uid"];  
	echo "&#304;&#351;tirak&#231;&#305;:\n";
	echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$cuid&amp;ref=$ref\">$login</a><br/>\n";
	if($qeyd)
	{
		echo "----<br/>\n";
		echo "<i>$qeyd</i><br/>\n";
	}
}
else
{
	echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;<br/>\n";
}
echo "----<br/>\n";
echo "<a href=\"qefes.php?cid=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
/////////////////////////////// yuxardaki hazirdi

case 'ses_veren':
$user = @mysql_fetch_object(@mysql_query ("Select `user` from `qefes` where `uid` = '".$uid."' LIMIT 1;"));
$userm = mysql_query ("select count(`klu4`) as `num` from `qefess` where `kime` = '".$uid."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"]; 

if ($user->user == "")
{
	echo "<b>Xeta</b><br/>-----<br/>Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i Virtual Qefes-de i&#351;tirak etmir!<br/>-----<br/>";
	echo "<a href=\"qefes.php?cid=3&amp;uid=$cuid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
	break;
}

if ($num == 0)
{
	echo "<b>$user->user</b> leqebli i&#351;tirak&#231;&#305;ya ses veren olmay&#305;b...<br/>-----<br/>";
	echo "<a href=\"qefes.php?cid=3&amp;uid=$cuid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{
	echo "<b>$user->user</b> - <i>leqebli &#304;&#351;tirak&#231;&#305;n&#305; destekleyenlerin siyah&#305;s&#305;.</i><br/>---<br/>";
	$_v->align('left');
	$_v->action("qefes.php?id=$id&amp;ps=$ps&amp;cid=ses&amp;ref=$ref");
	echo "Ses verenler: <u>$num</u><br/>";
	print $_v->select("<select name=\"send$ref\">|<option value=\"1\">1</option>|<option value=\"2\">5</option>|<option value=\"3\">10</option>|<option value=\"4\">30</option>|<option value=\"5\">50</option>|<option value=\"6\">100 </option>|<option value=\"7\">500 </option>|<option value=\"8\">1000 </option>|</select>",'null').'<br/>';
	print $_v->submit('ses ver','action=save,kime='.$user->user);

	if(!isset($s))$s=0;
	$mx=round(($num/10)+0.45);
	if($s>$mx)$s=$mx;
	if($s==0)$s=1;
	$ot=(($s-1)*10)+1;
	$do=$s*10;
	if($do>$num)$do=$num;
	$o=$ot-1;
	$n=$ot;
	if($do==0)$n=$o;
	echo $divide;
	$r = mysql_query ("select `kim`,`ses` from `qefess` where `kime` ='".$uid."' order by `ses` desc limit $o,$do;");
	for ($i=$ot;$i<=$do;$i++){
	$arr = mysql_fetch_array($r);
	$usid=$arr['kim'];
	$ses=$arr['ses'];
	$sesveren = @mysql_fetch_array(@mysql_query ("Select `user` from `users` where `id`='".$usid."' LIMIT 1;"));
	echo ($i).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$sesveren[0]."</a> ($ses-ses)<br/>"; 
	}
	$next=$s+1;
	$prev=$s-1;
	if ($num>$do) {
	$ot=(($next-1)*10)+1;
	$do=$next*10;
	if($do>$num)$do=$num;
	echo $divide;
	echo "<a href=\"qefes.php?cid=ses_veren&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a>\n";
	}
	if($s>1) {
	echo $divide;

	$ot=(($prev-1)*10)+1;
	$do=$prev*10;
	echo "<a href=\"qefes.php?cid=ses_veren&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a>\n";
	}
	if ($num>$do and $s>1)
	echo "<br/>";
}
break;

//////////////////////////////////////////////////////////////DEFAULT DEFAULT /////////////////////////////////////////////////////////////////
default:
$gun=date("w",$SERVER_TIME);
if ($close=="0")
{
$dat_qefes = file("file/qefes/1.dat");
$dat_gun = trim($dat_qefes[0]);
if ($dat_gun!=$gun){
$userall = mysql_query ("select count(`id`) as `num` from `qefes` where `off` = '0';");
$usm = mysql_fetch_array($userall);
$nam = $usm["num"];

if($nam>=3){
if($nam == 3 and $dat_config_limit == 2)
$limit = 1;
elseif($nam == 3 and $dat_config_limit == 3)
$limit = 1;
elseif($nam == 4 and $dat_config_limit == 3)
$limit = 2;
else
$limit = $dat_config_limit;
}
else
{
$limit=1;
$extra=1;
}



if($nam==1){ // 1 nefer qalibsa avtomatik qefes sona chatsin.
$dat_mesaj = trim($dat_qefes[1]);
echo "<b>Tebrikler</b><br/>----<br/>Virtual Qefes-in  bu turu sona chatd&#305;.<br/>";
echo "$dat_mesaj";
echo "---<br/>Qefes Oyununun n&#246;vbeti turu 24 saat erzinde ba&#351;layacaq.<br/>";
echo "Haz&#305;r olun:)<br/>";
break;
}
if($nam==2){

$qalib = mysql_query ("select `user`,`uid` from `qefes` where `off` ='0' order by `ses` asc limit 1");
$qali = mysql_fetch_array($qalib);
$u_user=$qali['user'];
$u_id=$qali['uid'];
$dats = date("d.m.y",$SERVER_TIME); 
mysql_query("UPDATE `users` SET `con` = '5' WHERE `id` = '".$u_id."';");
mysql_query("UPDATE `qefes` SET `off` = '1', `date` = '".$dats."' WHERE `uid` = '".$u_id."';");

$qalib = mysql_query ("select `user`,`uid` from `qefes` where `off` ='0' order by `ses` desc limit 1");
$qali = mysql_fetch_array($qalib);
$u1_user=$qali['user'];
$u1_id=$qali['uid'];
$hediyye = trim($colseds[3]);
$mesaj = "Virtual Qefesin Qalibi <b>$u1_user</b> oldu ve <b>$hediyye</b> qazand&#305;!<br/>";
$msgtime = $SERVER_TIME+86400;

$mes = "Virtual Qefesin Qalibi <b>$u1_user</b> oldu ve <b>$hediyye</b> qazand&#305;! <img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/><img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/><img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/>";
for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$rnd = rand(0,99999999);

mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='11'");
}

$rnd = rand(0,9);
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '11';");

$fpa=fopen('file/qefes/1.dat','w'); // 1.dat index ve qefese melumatin qeyd olunmasi
$xeber .= "$gun\n";
$xeber .= "$mesaj\n";
$xeber .= "$msgtime";
fputs($fpa,$xeber);
fclose($fpa);

if(!file_exists("file/qefes/0_aktiv.dat")){
@rename('file/qefes/0_deaktiv.dat','file/qefes/0_aktiv.dat');
}

$newdat=fopen('file/qefes/0_aktiv.dat','w');// dehlize melumatin qeyd olunmasi
$news .= "$gun\n";
$news .= "$mesaj";
fputs($newdat,$news);
fclose($newdat);


$file = "x\n".$colseds[1]."".$colseds[2]."".$colseds[3]."".$colseds[4]."".$colseds[3]."";//qefesin baghlanmasi X qefes.dat fayli.
$fp=fopen('file/qefes/qefes.dat','w');
fputs($fp,$file);
fclose($fp);


$r = @mysql_query ("SELECT `uid`,`ses` FROM `qefes` WHERE `ses` != '0';");
while ($a = mysql_fetch_array($r))
{
$u_id=$a['uid'];
$u_ses=$a['ses'];
mysql_query("UPDATE `qefes` SET `nses` = `nses`+'".$u_ses."' WHERE `uid` = '".$u_id."';");
}

mysql_query("UPDATE `qefes` SET `ses` = '0';");
break;
}


///////////////////////// 	EGER QEFESDE 2 DEN ARTIQ ISTIFADECI VARSA... YOXDURSA YUXARDAKI EMIR ISHLEYIR.
$mesaj = "En az sesi olan  $limit i&#351;tirak&#231;&#305; (";//mesaj
$dats = date("d.m.y",$SERVER_TIME); //tarix
$query=mysql_query("select `user`,`uid` from `qefes` where `off` = '0' ORDER BY `ses` ASC LIMIT $limit");
$i=0;
while($info=mysql_fetch_array($query))//  QEFESDE OLAN $limit ISTIFADECININ UDUZMASI.
{
$mesaj .= "<u>".$info['user']."</u>, ";
$nmesaj .= "<u>".$info['user']."</u>, ";
$i++;
mysql_query("UPDATE `users` SET `qefes` = '5' WHERE `id` = '".$info['uid']."';"); /// istifadeciye melumat mesaji
mysql_query("UPDATE `qefes` SET `off` = '1', `date` = '".$dats."' WHERE `uid` = '".$info['uid']."';");// qefesden qovulmasi
}
$nmesaj = substr($nmesaj,0,strlen($nmesaj)-2);
$mesaj = substr($mesaj,0,strlen($mesaj)-2);

$mesaj .= "), qefesi terk etdi...<br/>";
echo "<b>Diqqet</b><br/>----<br/>$mesaj";
mysql_query("TRUNCATE TABLE `qefess`");// qefess tablicasini temizleyirik.



///////////////////////
$r = @mysql_query ("SELECT `uid`,`ses` FROM `qefes` WHERE `ses` != '0';"); // qefesden cixanlarin seslerini nsesin ustune yighiriq. + UPDATE ses 0
while ($a = mysql_fetch_array($r))
{
$u_id=$a['uid'];
$u_ses=$a['ses'];
mysql_query("UPDATE `qefes` SET `nses` = '".$u_ses."'+`nses` WHERE `uid` = '".$u_id."';");
}
mysql_query("UPDATE `qefes` SET `ses` = '0';");
///////////////////////


if($extra==1){// EXTRA DUELIN BASHLANMASI
$us1 = mysql_query ("select `user`,`uid` from `qefes` where `off` ='0' order by `ses` desc limit 0,1");
$u_s1 = mysql_fetch_array($us1);
$u_user1=$u_s1['user'];

$us2 = mysql_query ("select `user`,`uid` from `qefes` where `off` ='0' order by `ses` desc limit 1,2");
$u_s2 = mysql_fetch_array($us2);
$u_user2=$u_s2['user'];

$hediyye = trim($colseds[3]);
$mesaj2 = "<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Qefesde \"<u>$u_user1</u>\" ve \"<u>$u_user2</u>\" qald&#305;.<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>$hediyye</b>\" qazanacaq!<br/>";

$mes = "<br/>Qefesde \"<u>$u_user1</u>\" ve \"<u>$u_user2</u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>$hediyye</b>\" qazanacaq! <img src=\"file/qefes/img/ura.gif\" alt=\".ura.\"/><img src=\"file/qefes/img/ura.gif\" alt=\".ura.\"/><img src=\"file/qefes/img/ura.gif\" alt=\".ura.\"/>";
for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$rnd = rand(0,99999999);
mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='11'");
}
$rnd = rand(0,9);
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '11';");
}
else
{
$mes = "En az sesi olan  $limit i&#351;tirak&#231;&#305; ($nmesaj), qefesi terk etdi...<img src=\"file/qefes/img/qemli.gif\" alt=\".qemli.\"/>";
for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$rnd = rand(0,99999999);
mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='11'");
}
$rnd = rand(0,9);
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '11';");

}
$msgtime = $SERVER_TIME+54000;
$fpa=fopen('file/qefes/1.dat','w');
$xeber .= "$gun\n";// qeyd olunan gun  0 filed
$xeber .= "$mesaj\n";// dehlize ve qefese mesaj 1 filed
$xeber .= "$msgtime\n";// elanin muddeti 2 filed
$xeber .= "$mesaj2";//extra duel 3 filed
fputs($fpa,$xeber);
fclose($fpa);
$hediyye = trim($colseds[3]);


if($extra==1){
if(!file_exists("file/qefes/0_aktiv.dat")){
@rename('file/qefes/0_deaktiv.dat','file/qefes/0_aktiv.dat');
}

$newmesaj = "Sabah Virtual Qefes-de 1 nefer $hediyye qazanacaq.<br/>";
$newdat=fopen('file/qefes/0_aktiv.dat','w');
$news .= "$gun\n";
$news .= "$newmesaj";
fputs($newdat,$news);
fclose($newdat);
}

$cid=1;
break;
}
}

if(file_exists("file/qefes/img/qefes.gif"))
echo "<img src=\"file/qefes/img/qefes.gif\" alt=\"Virtual Qefes\"/><br/>\n";
else
echo "<b>Virtual Qefes</b><br/>\n"; 
$_v->divide();
if($row['level']==9)echo "<a href=\"qefes.php?cid=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefes Panel</a><br/>\n";

echo "<a href=\"qefes.php?cid=news&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Show haqq&#305;nda</a><br/>\n";
echo "-----<br/>\n"; 
$mesaj=file("file/qefes/1.dat");
$mesajes = trim($mesaj[1]);
echo "$mesajes\n"; 

$_v->align('left');
$qefes=$row["qefes"];

if ($close=="1")
{
echo "<b><a href=\"qefes.php?cid=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;&#351;tirak&#231;&#305; Qebulu</a></b><br/>-----<br/>\n";
}

if($qefes==1)echo "<a href=\"qefes.php?cid=plat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Platforman&#305;z</a><br/>-----<br/>\n";
echo "<img src=\"file/qefes/img/p.gif\" alt=\"1\"/>-<a href=\"qefes.php?cid=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;&#351;tirak&#231;&#305;lar</a><br/>\n";
echo "<img src=\"file/qefes/img/s.gif\" alt=\"2\"/>-<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;&#351;tirak&#231;&#305;lara ses ver</a><br/><br/>\n";
echo "<img src=\"file/qefes/img/son.gif\" alt=\"4\"/>-<a href=\"qefes.php?cid=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Me&#287;lub olanlar</a><br/>\n";
break;
/////////////////////////////////////////////////////// SON DEFAULT ////////////////////////////////////////////////////////////////////////////// 
}
$_v->divide();

if($jo!="") 
{
	echo "<a href=\"qefes.php?cid=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefes Panel</a><br/>\n";
	echo "<a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual Qefes</a><br/>";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
}
else if(isset($cid))
{
	echo "<a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual Qefes</a><br/>";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
}
else
{
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
}

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>