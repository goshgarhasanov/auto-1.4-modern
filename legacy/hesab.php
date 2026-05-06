<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$bal = $row['bal'];
$user = $row['user'];
if($row["hesabphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Bal Xidmetlerine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
ob_start();
if(!file_exists("file/bal_bot/0.dat")){
$_v->title('Temir');
$_v->fsize1($fsize1);

echo "<b>Bal xidmetleri</b>, 2-3 saatliq temir ile elaqedar fasile edir.<br/>";
echo $divide;
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
//printe($_POST);

global $bolme;
switch ($bolme)
{

case 'nik':
$bals=file("file/bal_bot/0.dat");
$r_nik_1 = trim($bals[2]);
$r_nik_2 = trim($bals[3]);

$c_nick = mysql_query ("select time from `c_nick` where `to` = '".$id."'");
$nikc = mysql_fetch_array ($c_nick);
$niktime=$nikc["time"];

$_v->title('Rengli nik Sifrari&#351;');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	echo "<b>Rengli nik Sifrari&#351;</b><br/>";
	$_v->divide();
	print "Rengli nick 2 formadad&#305;r (<i>Hereketli ve hereketsiz</i>).<br/>Hereketsiz nick 1 ayl&#305;&#287;&#305; <b>".$r_nik_1."</b>. bal,<br/>Hereketli nickin, ise 1 ayl&#305;q  <b>".$r_nik_2."</b>, bal deyerindedir.<br/>";
	print "----<br/><i>Nickler Sizin istediyiniz qrafikada haz&#305;rlan&#305;r.</i><br/><i>Sifari&#351; edildikden 24 saat erzinde haz&#305;r olur.</i><br/>----<br/>\n";
	print "Sizin balans&#305;n&#305;zda <b>$bal</b>, bal var<br/>\n";
	print "----<br/>\n";

	$q = mysql_query("SELECT * FROM `c_nick` WHERE `to` = '".$id."';");
	if(mysql_num_rows($q) != 0)
	{

		if(file_exists("i/".$id.".gif"))
		{
			$tkick = $niktime - $SERVER_TIME;

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

			echo "<u>Rengli nickiniz var ve aktivdir</u>:<br/><b>Nickin g&#246;r&#252;nt&#252;s&#252;</b>: <img src=\"i/$id.gif\" alt=\"$user\" /><br/>";
			echo "<i>Nickin vaxt&#305;n&#305;n tamam olmas&#305;na <b>$tkick $vaxt</b> qal&#305;b</i>...<br/>";
			break;
		}
		else
		{
			echo "<i>Rengli Nikiniz FTP-den silinib</i>... <b>Admine M&#252;raciet edin!</b><br/>";
			break;
		}
	}
	if($bal > $r_nik_1)
	{
		echo "<i>Rengli  Nick sifari&#351; etmek &#252;&#231;&#252;n hesab&#305;n&#305;zda en az&#305; <b>$r_nik_1</b> bal olmal&#305;d&#305;r...</i><br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
	else
	{
		$_v->action("hesab.php?id=$id&amp;ps=$ps&amp;bolme=nik&amp;ref=$ref");
		echo "<b>Nickin N&#246;v&#252;</b>:<br/>";
		print $_v->select("<select name=\"niks\">|<option value=\"1\">Hereketsiz - $r_nik_1 bal</option>|<option value=\"2\">Hereketli - $r_nik_2 bal</option>|</select>").'<br/>';
		
		echo "<b>Qeydiniz</b>:<br/>\n";
		print $_v->input("<input name=\"qeyd\" maxlength=\"9000\" title=\"Rengli nikin g&#246;r&#252;n&#252;&#351;&#252; barede yaz&#305;n\" emptyok=\"true\"/>").'<br/>';
		print $_v->submit('Sifari&#351; et','action=save');

		
	}
	break;
}
else
{

	$qeyd= chkdsk($qeyd,basename(__FILE__),"Dehlize &#351;ekil");
	$q = mysql_query("SELECT * FROM `sifarish` WHERE `to` = '".$id."';");
	if(mysql_num_rows($q) != 0)
	{
		if(!file_exists("i/".$id.".gif"))echo "H&#246;rmetli <b>$user</b>.<br/> Siz <u>Rengli Nik</u>, Sifari&#351; edibsiz...<br/>Zehmet olmasa Sifrai&#351;in yoxlan&#305;lmas&#305;n&#305; g&#246;zleyin.<br/>\n";
		else echo "<u>Rengli nikiniz var ve aktivdir</u>: <img src=\"i/".$id.".gif?".rand(100, 999)."\" alt=\"$user\" /><br/>";
		break;
	}
	
	if (($niks=="1")&&($bal<"$r_nik_1"))
	{
		echo "<b>1 ayl&#305;q hereketsiz nik almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$r_nik_1</b>, bal olmal&#305;d&#305;r!</b><br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		echo "<a href=\"hesab.php?bolme=nik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

	if (($niks=="2")&&($bal<"$r_nik_2"))
	{
		echo "<b>1 ayl&#305;q hereketli nik almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$r_nik_2</b>, bal olmal&#305;d&#305;r!</b><br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		echo "<a href=\"hesab.php?bolme=nik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

	$qeyd = narmobil($qeyd);

	if(empty($niks))
	{
		echo "<b>Hereketli ve ya hereketsiz bir nik se&#231;in!</b><br/>\n";
		break;
	}

	if(empty($qeyd))
	{
		echo "Rengli nikiniz g&#246;r&#252;n&#252;&#351;&#252; haqq&#305;nda qeyd yazmal&#305;s&#305;z. <br/>Rengli nikin g&#246;r&#252;n&#252;&#351;&#252; barede etrafl&#305; qeyd yaz&#305;n ki, rengli nikiviz &#252;reyinizce olsun!<br/>\n";
		break;
	}

	$date = date("d.m.y [H:i]",$SERVER_TIME); 
	if ($niks==1)
	{
		$newbal = $bal - $r_nik_1;
		$qr_nik = $r_nik_1;
		$nikss = "1 Ayl&#305;q Hereketsiz (sade) Nik Sifari&#351; etdi";
	}
	else
	{
		$newbal = $bal - $r_nik_2;
		$qr_nik = $r_nik_2;
		$nikss = "1 Ayl&#305;q Hereketli Nik Sifari&#351; etdi";
	}
	$time = $SERVER_TIME;
	$sql = mysql_query("insert into `sifarish` values(0,'1','$id','$date','$time','".$niks."','$qeyd');");
	if($sql)
	{
		echo "<b>Sifari&#351;iniz Qeyd edildi.</b><br/>*****<br/>";
		echo "Tezlikle Sizin Rengli nikiniz Aktiv edilecek<br/>----<br/><i>Bal Xidmetinden istifade etdiyiniz &#252;&#231;&#252;n,</i><br/><b>Te&#351;ekk&#252;rler</b>\n";
		echo "<br/>----<br/>\n";

		echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;\n"; 

		echo "<br/>*****<br/>\n";
		$update = mysql_query("UPDATE `users` SET `bal` = '".$newbal."' WHERE `id` = '".$id."';");

		$date = date("d.m.y [H:i]",$SERVER_TIME); 
		$user = $row['user'];

		@$save= fopen("file/bal_bot/4.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b>: - $nikss (<u>$bal-$qr_nik=<b>$newbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);


		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$qr_nik;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where klu4='1' limit 1;");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 
		$b_user = trim($bals[0]);
		$user_bot = trim($bals[1]);


		$message = "<b>$user</b> - $nikss.<br/> $bal - $qr_nik = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Rengli nik ".$qr_nik."','".$data."','1','1');");

		$message = "H&#246;rmetli <b>$user</b>. Siz Bal Sisteminden &#304;stifade ederek <b>".$nikss."niz</b>:<br/>Hesab&#305;n&#305;zda $bal - $qr_nik = $newbal bal qald&#305;.<br/>Tezlikle Rengli nikiniz haz&#305;rlanacaq<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
	}
}
$_v->fsize2($fsize2);
break;


case 'sendbal':

$bals=file("file/bal_bot/0.dat");
$send_bal = trim($bals[4]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($send_bal=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$_v->title('Bal g&#246;nder');
$_v->fsize1($fsize1);

	
if(!isset($_POST['action']))
{
	$file = fopen("file/bal_bot/ref.dat", "w");
	fwrite($file, $ref);
	fclose($file);

	echo "<b>Bal g&#246;nder</b><br/>\n";
	echo "----<br/>\n";
	echo "<b>Qeyd</b>: Bal ko&#231;&#252;rmelerinde -$send_bal% komissiya haqq&#305; tutulur.<br/>----<br/>\n";	
	echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
	
	$_v->action("hesab.php?id=$id&amp;ps=$ps&amp;bolme=sendbal&amp;ref=$ref");
	echo "<b>Kime ?</b> (Leqeb / &#304;D)<br/>";
	print $_v->input("<input type=\"text\" name=\"kime\" maxlength=\"300\"/>").'<br/>';
	
	echo "<b>Ne Qeder ?</b><br/>";
	print $_v->input("<input size=\"6\" name=\"send\" maxlength=\"6\" format=\"*N\"/>").' Bal<br/>';
	print $_v->submit('K&#246;&#231;&#252;r','action=save');
}
else
{
	$send = intval($send);
	if ($send<10)
	{
		echo "<i>10-dan az bal g&#246;ndermek olmur!</i><br/>";
		echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=sendbal&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
		break;
	}
	$kode = file("file/bal_bot/ref.dat");
	$kode = trim($kode[0]);


	$cixilan=$send*$send_bal/100;
	$setbal=$bal-$send-$cixilan;
	$cixilan= round($cixilan,2);

	if ($setbal<=0)
	{
		echo "<i>G&#246;ndermek istediyiniz meble&#287; hesab&#305;n&#305;zda yoxdur!</i><br/>";
		echo "----<br/>";
		echo "<b>Qeyd</b>: Kimese g&#246;ndermek istediyinizse evvala &#246;z hesab&#305;n&#305;za bal y&#252;kleyin!<br/>----<br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
		break;
	}


	if (!ctype_digit($kime))
	{
		$kime=trim($kime);
		if($kime=="")$kime=0;
		$latuser=strtolower($kime);
		$sel = mysql_query ("select id,user,bal from users where latuser = '".$latuser."'");
	}
	else
	{
		$sel = mysql_query ("select id,user,bal from users where id = '".$kime."'");
	}
	$row2 = mysql_fetch_array ($sel);
	$uuser=$row2["user"];
	$kbal=$row2["bal"];
	$uuid=$row2["id"];
	
	if($uuser=='')
	{
		echo "<i>Axdard&#305;q&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305; yeniden ceht edin.</i><br/>----<br/>";
		echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=sendbal&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
		break;
	}
	
	if($uuid=="$id")
	{
		echo "<i>&#214;z-&#246;z&#252;n&#252;ze bal g&#246;ndere bilmersiz...</i><br/>----<br/>";
		echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=sendbal&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
		break;
	}
	
	if ($kode!=0)
	{
		$setbal= round($setbal,2);
		$uubal= round($uubal,2);

		$gobal = "Update `users` set `bal` = '".$setbal."' where `id` ='".$id."'";
		mysql_query ($gobal);
		$uubal=$kbal+$send;
		$colse = "Update `users` set `bal` = '".$uubal."' where `id` = '".$uuid."'";
		mysql_query ($colse);
		echo "<b>Bal G&#246;nderildi!</b><br/>----<br/>";
		echo "Siz &#246;z hesab&#305;n&#305;zdan <b>$uuser</b>, leqebli istifade&#231;iye $send bal g&#246;nderdiz.<br/> Elave olaraq sizin hesab&#305;n&#305;zdan $send_bal% ($cixilan bal) Komisiyya haqq&#305; c&#305;x&#305;ld&#305;.<br/>----<br/>";
		echo "Hesab&#305;n&#305;zda <b>$setbal</b>, bal qald&#305;...<br/>\n";

		$date = date("d.m.y [H:i]",$SERVER_TIME);  
		$user = $row['user'];

		$miqdar=$send+$cixilan;


		@$save= fopen("file/bal_bot/5.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b> - <u>$uuser</u> <b>$send</b> bal. Komissiya ".$send_bal."%ile-(<b>$cixilan</b>) (<u>$bal - $miqdar=<b>$setbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$cixilan;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 


		$message = "$user - $uuser leqebine $send bal g&#246;nderdi: komissiya haqq&#305;-(<b>$cixilan</b>) $bal - $send = $setbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var =:)";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','send bal $acixilan','".$data."','1','1');");

		$message = "<b>Diqqet</b>!!! <u>$user</u>, leqebli &#351;exs sizin hesab&#305;n&#305;za $send bal g&#246;nderdi.";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$uuser."','".$uuid."','".$SERVER_TIME."','0','Size $send bal g&#246;nderdiler','".$data."','1','1');");

		$message = "H&#246;rmetli <u>$user</u>, Siz &#214;z Hesab&#305;n&#305;zdan $send bal <u>$uuser</u>. leqebli &#350;exse  g&#246;nderdiz. Komissiya haqq&#305; <b>$cixilan</b> bal:<br/> Hesab&#305;n&#305;zda $bal - $miqdar = $setbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		for ($i=0; $i<=9; $i++){
		$today=date ("H:i",$SERVER_TIME);
		$mes = "<b>".$user."</b>, - <b>".$uuser."</b>. leqebli istifade&#231;iye <b>".$send."</b>, bal g&#246;nderdi...";
		$rnd = rand(0,99999999);
		mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
		}
		$rnd = rand(0,9);
		mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
	}
	else
	{
		echo "Siz &#246;z hesab&#305;n&#305;zdan <b>$uuser</b>, nikli istifade&#231;iye $send bal g&#246;nderdiz....<br/>\n";
		break;
	}
	$file = fopen("file/bal_bot/ref.dat", "w");
	fwrite($file, 0);
	fclose($file);
}
break;


case 'infostat':
$nn = file("file/dat_folder/n_n/infostat.dat");
$nikobal = trim($nn[0]);
$simvol = trim($nn[1]);
$bals=file("file/bal_bot/0.dat");
$infostat_d = $nikobal;
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


$_v->title('Ne Axtariram?');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	$stat = $row['infostat'];
	echo "<b>Bu gun ne axtarirsan?</b><br/>\n";
	$_v->divide();
	echo "Xidmet deyi&#351;mek <b>$infostat_d</b>, bal deyerindedir.<br/>\n";
	if($bal>=$infostat_d)
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
		echo "----<br/>";
		echo "<b>info status:</b><br/>\n";
		$_v->action("hesab.php?id=$id&amp;bolme=infostat&amp;ps=$ps&amp;ref=$ref");
		print $_v->input("<input name=\"infostat\" maxlength=\"$simvol\" value=\"$stat\" title=\"infostat\" emptyok=\"true\"/>").'<br/>';
		print $_v->submit('Deyi&#351;dir','action=save');

echo "<b>Qeyd:</b> Yazdiginiz Status Anketinizin Ust Bolmesinde Daimi Gorsenecek.<br/>\n";
echo "<b>Qeyd:</b> Eger Yenileseniz Deyisilecek. Eger Bos Saxlamaq isteseniz Xanani Bos Buraxaraq Metini Deyisin.<br/>\n";
echo "<b>Qeyd</b>: <u>Her g&#252;n 24:00 dan sonra melumat bazas&#305; yenilenir.</u><br/>\n";

	}
	else
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
		echo "<b>Qeyd</b>: info status yaz&#305;s&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
	}
}
else
{
	$stat = $row['infostat'];
	if ($stat==$infostat)
	{
		echo "<b>Tebrikler.</b><br/>*****<br/> Siz u&#287;urla &#246;z info statusunuzu deyi&#351;dirdiniz<br/>----<br/>";
		echo "Yeni Status:<br/><b>$infostat</b><br/>\n";
		break;
	}
/*
        if(preg_match("/[^A-Za-z\@\*\(\)\!\-\~\_\[\]\=]+/",$infostat))

	{
		echo "<i>Yazd&#305;&#287;&#305;n&#305;z infostatda qada&#287;an olunmu&#351; simvol var.</i><br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=infostat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

*/

	
if ($infostat<$simvol)
	{
echo "<i>Yazd&#305;&#287;&#305;n&#305;z infostatda qada&#287;an olunmu&#351; simvol var.</i><br/>----<br/>\n";
echo "<a href=\"hesab.php?bolme=infostat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;

}



	if ($bal<$infostat_d)
	{
		echo "<i>info status deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$infostat_d</b>, bal olmal&#305;d&#305;r!<br/>Sizin hesab&#305;n&#305;zda ise <b>$bal</b>, bal var.</i><br/>";
		echo "----<br/>";
		echo "<a href=\"hesab.php?bolme=infostat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}
	else
	{
		$newbal = $bal - $infostat_d;
		$infostat = trim($infostat);
		$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `infostat` = '".$infostat."' WHERE `id` = '".$id."';");
		$date = date("d.m.y [H:i]",$SERVER_TIME);  
		$user = $row['user'];

		@$save= fopen("file/bal_bot/2.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b>: - <u>$stat</u> info statusu pozdu <b>$infostat</b> yazd&#305;. (<u>$bal-$infostat_d=<b>$newbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$infostat_d;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 

		$message = "<u>$user</u> - info statusu deyi&#351;ib <b>$infostat</b>, yazd&#305;: <br/>Hesab&#305;nda $bal - $infostat_d = $newbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var =:)";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','infostat ".$infostat_d." bal','".$data."','1','1');");

		$message = "H&#246;rmetli <u>$user</u>, Siz Bal Xidmetinden istifade ederek, &#246;z info statusunu deyi&#351;ib <b>$infostat</b> yazd&#305;n&#305;z! <br/> Hesab&#305;n&#305;zda $bal - $infostat_d = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		if($sql)
		{
			echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z info statusu deyi&#351;dirdiniz<br/>----<br/>Yeni infostatunuz:<br/><b>$infostat</b>\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;<br/>\n"; 
		}
	}
}
break;

////son


///////

case 'nihadnik':

$bals=file("file/bal_bot/0.dat");
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);

$rpos = file("file/dat_folder/n_n/uzunnick.dat");
$nihadbal = trim($rpos[0]);
$niko_d = trim($rpos[1]);
$bonus = trim($rpos[2]);

unset($bals);

if($bonus=="0"){
$_v->title('Xeta');

$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$_v->title('Uzun Nick');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{

echo "<b>Yeni Uzun Nick Secin</b><br/>*****<br/>\n";
echo "Nikinizi maksimum <b>$nihadbal</b> simvola qeder uzunlasdira bilersiz<br/>\n";		
echo "&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;mek, <b>$niko_d</b>, bal deyerindedir.<br/>\n";	
if($bal>=$niko_d){
echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
echo "----<br/>";
echo "<b>Yeni Leqebiniz</b><br/>\n";


$_v->action("hesab.php?id=$id&amp;ps=$ps&amp;bolme=nihadnik&amp;ref=$ref");	
print $_v->input("<input name=\"nihadnik\" maxlength=\"$nihadbal\" value=\"$user\" title=\"nihadnik\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','action=save');
}
else{

echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
echo "<b>Qeyd</b>: Leqebinizi deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
echo "----<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";


}
echo "*****<br/>";
}
else
{
if ((strlen($nihadnik)>$nihadbal)or(strlen($nihadnik)<3)){
echo "<i>Se&#231;mek istediyiniz leqebin simvolu 3-den $nihadbal-e qeder ola biler.</i><br/>----<br/>\n";
echo "<a href=\"hesab.php?bolme=nihadnik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>*****<br/>\n";

break;
}


if(preg_match("/[^A-Za-z\@\*\(\)\!\-\~\_\[\]\=]+/",$nihadnik)){
echo "Se&#231;mek istediyiniz leqebde qada&#287;an olunmu&#351; simvol var.<br/>----<br/>\n";
echo "<a href=\"hesab.php?bolme=nihadnik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>*****<br/>\n";

break;
}

if ($bal<$niko_d){
echo "<i>&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$niko_d</b>, bal olmal&#305;d&#305;r!</i><br/>";
echo $divide;
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
echo "*****<br/>";
}
else
{
$newbal = $bal - $niko_d;

$nihadnik = trim($nihadnik);
$lowernick=strtolower($nihadnik);
$q = mysql_query("SELECT * FROM `users` WHERE `latuser` = '".$lowernick."';");

if(mysql_affected_rows() != 0)
{
echo "<i>Se&#231;mek istediyiniz &#304;stifade&#231;i ad&#305; m&#246;vcutdur!</i>\n"; 
echo "<br/>*****<br/>\n";

break;
}

$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `latuser` = '".$lowernick."', `user` = '".$nihadnik."' WHERE `id` = '".$id."';");

$date = date("d.m.y [H:i]",$SERVER_TIME);  

@$save= fopen("file/bal_bot/3.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user</b>: - <u>$nihadnik</u> (<u>$bal-$niko_d=<b>$newbal</b></u>)-($date)")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);

$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
$mp = mysql_fetch_array ($xerc);
$satish=$mp["xerc"];
$satish=$satish+$niko_d;
mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
$data = date("d.m.y [H:i]",$SERVER_TIME); 


$message = "<u>$user</u> - Leqebini deyi&#351;ib <b>$nihadnik</b>, etdi: <br/>Hesab&#305;nda $bal - $niko_d = $newbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var =:)";
mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Leqeb ".$niko_d." bal','".$data."','1','1');");

$message = "H&#246;rmetli <u>$user</u>, Siz Bal Xidmetinden istifade ederek, &#246;z leqebinizi deyi&#351;ib <b>$nihadnik</b> etdiniz! <br/> Hesab&#305;n&#305;zda $bal - $niko_d = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$nihadnik."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

if($sql)
{
echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z &#304;stifade&#231;i ad&#305;n&#305;z&#305; (Leqebinizi), deyi&#351;dirdiniz!<br/>----<br/>Yeni &#304;stifade&#231;i Ad&#305;n&#305;z:<br/><b>$nihadnik</b>\n";
echo "<br/>----<br/>\n";

echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;\n"; 
echo "<br/>*****<br/>\n";

}
}
}
//$_v->fsize2($fsize2);
break;

/////
	
	
case 'yeninik':
$bals=file("file/bal_bot/0.dat");
$leqeb_d = trim($bals[5]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


if($leqeb_d=="x")
{
	$_v->title('Xeta');
	$_v->fsize1($fsize1);
	echo "Bele xidmet yoxdur<br/>\n";
	$_v->divide();
	if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
	print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	ob_end_flush();
	exit;
}


$_v->title('Yeni &#304;stifade&#231;i ad&#305;');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	echo "<b>Yeni &#304;stifade&#231;i ad&#305;</b><br/>";
	$_v->divide();
	echo "&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;mek, <b>$leqeb_d</b>, bal deyerindedir.<br/>\n";
	
	if($bal>=$leqeb_d)
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
		echo "----<br/>";
		echo "<b>Yeni &#304;stifade&#231;i ad&#305;n&#305;z:</b><br/>\n";
		
		$_v->action("hesab.php?id=$id&amp;ps=$ps&amp;bolme=yeninik&amp;ref=$ref");	
		print $_v->input("<input name=\"yeninik\" maxlength=\"20\" value=\"$user\" title=\"yeninik\" emptyok=\"true\"/>").'<br/>';
		print $_v->submit('Deyi&#351;dir','action=save');
	}
	else
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
		echo "<b>Qeyd</b>: Leqebinizi deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
		echo "----<br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
	}
}
else
{
	if ((strlen($yeninik)>20)or(strlen($yeninik)<3))
	{
		echo "<i>Se&#231;mek istediyiniz leqebin simvolu 3-den 20-e qeder ola biler.</i><br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=yeninik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

	if(preg_match("/[^A-Za-z\@\*\(\)\!\-\~\_\[\]\=]+/",$yeninik))
	{
		echo "Se&#231;mek istediyiniz leqebde qada&#287;an olunmu&#351; simvol var.<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=yeninik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

	if ($bal<$leqeb_d)
	{
		echo "<i>&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$leqeb_d</b>, bal olmal&#305;d&#305;r!</i><br/>";
		echo $divide;
		echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
	}
	else
	{
		$newbal = $bal - $leqeb_d;

		$yeninik = trim($yeninik);
		$lowernick=strtolower($yeninik);
		$q = mysql_query("SELECT * FROM `users` WHERE `latuser` = '".$lowernick."';");

		if(mysql_affected_rows() != 0)
		{
			echo "<i>Se&#231;mek istediyiniz &#304;stifade&#231;i ad&#305; m&#246;vcutdur!</i><br/>\n"; 
			break;
		}

		$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `latuser` = '".$lowernick."', `user` = '".$yeninik."' WHERE `id` = '".$id."';");
		$date = date("d.m.y [H:i]",$SERVER_TIME);  
		@$save= fopen("file/bal_bot/3.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b>: - <u>$yeninik</u> (<u>$bal-$leqeb_d=<b>$newbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$leqeb_d;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 


		$message = "<u>$user</u> - Leqebini deyi&#351;ib <b>$yeninik</b>, etdi: <br/>Hesab&#305;nda $bal - $leqeb_d = $newbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var =:)";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Leqeb ".$leqeb_d." bal','".$data."','1','1');");

		$message = "H&#246;rmetli <u>$user</u>, Siz Bal Xidmetinden istifade ederek, &#246;z leqebinizi deyi&#351;ib <b>$yeninik</b> etdiniz! <br/> Hesab&#305;n&#305;zda $bal - $leqeb_d = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$yeninik."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		if($sql)
		{
			echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z &#304;stifade&#231;i ad&#305;n&#305;z&#305; (Leqebinizi), deyi&#351;dirdiniz!<br/>----<br/>Yeni &#304;stifade&#231;i Ad&#305;n&#305;z:<br/><b>$yeninik</b>\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;<br/>\n"; 
		}
	}
}
break;



case 'status':
$bals=file("file/bal_bot/0.dat");
$status_d = trim($bals[6]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($status_d=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
$_v->title('Status');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	$stat = $row['status'];
	echo "<b>Statusu deyi&#351;mek</b><br/>\n";
	$_v->divide();
	echo "Statusu deyi&#351;mek <b>$status_d</b>, bal deyerindedir.<br/>\n";
	if($bal>=$status_d)
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
		echo "----<br/>";
		echo "<b>Yeni statusunuz:</b><br/>\n";
		$_v->action("hesab.php?id=$id&amp;bolme=status&amp;ps=$ps&amp;ref=$ref");
		print $_v->input("<input name=\"status\" maxlength=\"22\" value=\"$stat\" title=\"status\" emptyok=\"true\"/>").'<br/>';
		print $_v->submit('Deyi&#351;dir','action=save');
	}
	else
	{
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
		echo "<b>Qeyd</b>: Statusun yaz&#305;s&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
	}
}
else
{
	$stat = $row['status'];
	if ($stat==$status)
	{
		echo "<b>Tebrikler.</b><br/>*****<br/> Siz u&#287;urla &#246;z statusunuzu deyi&#351;dirdiniz<br/>----<br/>";
		echo "Yeni Statusunuz:<br/><b>$status</b><br/>\n";
		break;
	}

	if(!preg_match("!^[A-z1-9@\\*\\)\\(\\?\\!\\-_\\]\\[=~]+$!i",$status))
	{
		echo "<i>Yazd&#305;&#287;&#305;n&#305;z statusda qada&#287;an olunmu&#351; simvol var.</i><br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=status&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}
	if ($bal<$status_d)
	{
		echo "<i>Statusunuzu deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$status_d</b>, bal olmal&#305;d&#305;r!<br/>Sizin hesab&#305;n&#305;zda ise <b>$bal</b>, bal var.</i><br/>";
		echo "----<br/>";
		echo "<a href=\"hesab.php?bolme=status&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}
	else
	{
		$newbal = $bal - $status_d;
		$status = trim($status);
		$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `status` = '".$status."' WHERE `id` = '".$id."';");
		$date = date("d.m.y [H:i]",$SERVER_TIME);  
		$user = $row['user'];

		@$save= fopen("file/bal_bot/2.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b>: - <u>$stat</u> statusu pozdu <b>$status</b> yazd&#305;. (<u>$bal-$status_d=<b>$newbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$status_d;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 

		$message = "<u>$user</u> - Statusunu deyi&#351;ib <b>$status</b>, yazd&#305;: <br/>Hesab&#305;nda $bal - $status_d = $newbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var =:)";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Status ".$status_d." bal','".$data."','1','1');");

		$message = "H&#246;rmetli <u>$user</u>, Siz Bal Xidmetinden istifade ederek, &#246;z Statusunuzu deyi&#351;ib <b>$status</b> yazd&#305;n&#305;z! <br/> Hesab&#305;n&#305;zda $bal - $status_d = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		if($sql)
		{
			echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z statusunuzu deyi&#351;dirdiniz<br/>----<br/>Yeni Statusunuz:<br/><b>$status</b>\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;<br/>\n"; 
		}
	}
}
break;

case 'vip':

$bals=file("file/bal_bot/0.dat");
$vip_al = trim($bals[7]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


if($vip_al=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$lev = $row['level'];
$levelselect = @mysql_query ("Select name from levels where level='4'");
$levels = @mysql_fetch_array($levelselect);
$lvname = $levels["name"];

if(!isset($_POST['action']))
{
	$_v->title($lvname.' R&#252;tbe','center');
	$_v->fsize1($fsize1);

	echo "Siz Bal xidmetinden istifade ederek &#246;z&#252;n&#252;ze 1 ayl&#305;q <u>$lvname</u>, r&#252;tbesi ala bilersiniz!<br/>1 ayl&#305;q <u>$lvname</u>, r&#252;tbesinin qiymeti <b>$vip_al</b>, bal deyerindedir.<br/>\n";	
	echo "Hal-haz&#305;rda sizin r&#252;tbeniz: ";

	if ($lev >= 4)
	{
		$levelselect = @mysql_query ("Select name from levels where level='".$lev."'");
		$levels = @mysql_fetch_array($levelselect);
		$levname = $levels["name"];
		echo " <b>$levname</b><br/>";
	}
	else
	{
		echo " <u>Yoxdur</u><br/>"; 
	}
	$_v->divide();
	$_v->align('left');
	echo "1) Siz <b>$lvname</b>. r&#252;tbesi ald&#305;qda &#199;at&#305;n hem sakini, hem de  m&#252;hafize&#231;isi olacaqs&#305;z. &#199;atda qaydalar&#305; pozanlar&#305;, Xeberdarl&#305;q ede bilersiz. Sizin Xeberdarl&#305;q&#305;n&#305;z&#305; he&#231;e sayanlar&#305; ise &#199;atdan Xarc ede bilersiz.<br/>\n";
	echo "2) Siz bu r&#252;tbeni bal Sisteminden ald&#305;&#287;&#305;n&#305;z &#252;&#231;&#252;n qaydalar&#305; pozanlar&#305; xaric etmeye mecbur deyilsiz.<br/>\n";
	echo "3) R&#252;tbenizden sui istifade etsez (<i>&#214;z menafeyine g&#246;re ve ya Sebebsiz xaric etmek</i>),  <b>BAN</b>, edile bilersiz.<br/>\n";
	echo "4) Reklam edenleri, Kiminse Valideyinini ve kimese &#351;iddetli s&#246;y&#252;&#351; s&#246;yenleri Xeberdarl&#305;qs&#305;z Xarc ede bilersiz.<br/>----<br/>\n";

	echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
	echo $divide;

	if ($lev < 4) 
	{
		if ($bal >= $vip_al) 
		{
			print $_v->submit('Bu Rutbeni al','action=save',"hesab.php?id=$id&amp;ps=$ps&amp;bolme=vip&amp;ref=$ref");
		}
		else
		{
			echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>$vip_al</b>, bal olmal&#305;d&#305;r.<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
		}
	}
	else
	{
		if ($lev == 9)
		{
			echo "<b>Salam &#350;ef siz hara bura hara?:)</b><br/>\n";
		}
		else
		{
			$ru = @mysql_query("select saat,tarix from `hesab` where usid = '".$id."' and x = '3' limit 1;");
			if (mysql_affected_rows() == 0)
			{
				echo "<i>Size Rehberlik terefinden r&#252;tbe verildiyi &#252;&#231;&#252;n bal xidmetinden r&#252;tbe ala bilmersiz.</i><br/>\n";
			}
			else
			{
				$tru = @mysql_fetch_array($ru);
				$saat = $tru['saat'];
				if($saat > $SERVER_TIME)
				{
					echo "Siz <u>Bal Xidmet</u>-lerinden <u>".$tru['tarix']."</u>, tarixinde r&#252;tbe alm&#305;s&#305;n&#305;z.<br/>\n";

					$tkick = $saat - $SERVER_TIME;
					if($tkick < 60 && $tkick > 0)
					{
					$var = "saniye";
					}
					elseif($tkick < 3600 && $tkick > 60)
					{
					$new = $tkick;
					$tkick = $new/60;
					$var = "deqiqe";
					}
					elseif($tkick < 86400 && $tkick > 3600)
					{
					$new = $tkick;
					$tkick = $new/3600;
					$var = "saat";
					}
					elseif($tkick > 86400)
					{
					$new = $tkick;
					$tkick = $new/86400;
					$var = "g&#252;n";
					}
					$tkick = round($tkick, 0);
					echo "R&#252;tbenizin vaxt&#305;na $tkick $var qal&#305;b.<br/>\n";
				}
				else
				{
					$user = $row['user'];
					echo "H&#246;rmetli <b>$user</b>, Sizin r&#252;tbenizin vaxt&#305; tamam olub.<br/>\n";
				}
			}
		}
	}
}
else
{
	$_v->title($lvname.' R&#252;tbe');
	$_v->fsize1($fsize1);
	if($lev>="4")
	{
		echo "Sizin";
		$levelselect = @mysql_query ("Select name from levels where level='".$lev."'");
		$levels = @mysql_fetch_array($levelselect);
		$levname = $levels["name"];
		echo " <b>$levname</b>"; 
		echo " R&#252;tbeniz var!<br/>";
		break;
	}

	if ($bal<$vip_al)
	{
		echo "1 ayl&#305;q VIP R&#252;tbesi almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$vip_al</b>, bal olmal&#305;d&#305;r!<br/>";
		echo "----<br/>\n";
		echo "<a href=\"hesab.php?bolme=status&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>*****<br/>\n";
	}
	else
	{
		$newbal = $bal - $vip_al;
		$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `level` = '4', `panel` = '2' WHERE `id` = '".$id."';");
		if($sql)
		{
			echo "<b>Tebrikler.</b><br/> Siz u&#287;urla <u>$lvname</u>, R&#252;tbesi ald&#305;n&#305;z!<br/>Qaydalar&#305; unutmay&#305;n...\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;\n"; 
		}
		
		$date = date("d.m.y [H:i]",$SERVER_TIME); 
		$user = $row['user'];
		$saat = 2592000 + $SERVER_TIME;
		mysql_query("insert into `hesab` values(0,'$user','$id','$date','$saat','3');");
		@$save= fopen("file/bal_bot/6.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b>: - 1 ayl&#305;q <b>$lvname</b>, r&#252;tbesi ald&#305;: (<u>$bal-$vip_al=<b>$newbal</b></u>)-($date)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$vip_al;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 

		$message = "<b>$user</b> - <b>$lvname</b> R&#252;tbesi ald&#305;! $bal - $vip_al = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...\n";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','$vip_al bal - R&#252;tbe sat&#305;l&#305;b','".$data."','1','1');");
		$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek <b>$lvname</b> R&#252;tbesi Sahib olduz!<br/> Hesab&#305;n&#305;zda $bal - $vip_al = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n size Te&#351;ekk&#252;rler!</i><br/><br/><b>Qeyd</b>: Eger hans&#305;sa bir internet kafede oturursuzsa &#199;atdan &#231;&#305;xd&#305;q&#305;n&#305;z zaman opera program&#305;ndan zaklatkalar&#305; silmeyi unutmay&#305;n. &#350;ifrenize telefon n&#246;mrenizi ve ya sade simvol yazmay&#305;n. Ununtmay&#305;n Sizin leqebinizle kimse &#199;ata girib qaydalar&#305; pozarsa bunun mesuliyyeti size aiddir\n";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','".$lvname." R&#252;tbesi','".$data."','1','1');");

		for ($i=0; $i<=9; $i++)
		{
			$today=date ("H:i",$SERVER_TIME);
			$mes = "<b>$user</b>, <u>Bal Sisteminden istifade ederek</u>, <b>$lvname</b>. R&#252;tbesi ald&#305;! <u>Tebrikler!!!</u>";
			$rnd = rand(0,99999999);
			mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
		}
		$rnd = rand(0,9);
		mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
	}
}
break;

case 'killer':
$bals=file("file/bal_bot/0.dat");
$kill_al = trim($bals[8]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


if($kill_al=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$levelselect = @mysql_query ("Select name from levels where level='5'");
$levels = @mysql_fetch_array($levelselect);
$lvname = $levels["name"];

if(!isset($_POST['action']))
{
	$_v->title($lvname.' R&#252;tbe','center');
	$_v->fsize1($fsize1);
	echo "Siz Bal xidmetinden istifade ederek &#246;z&#252;n&#252;ze 1 ayl&#305;q <u>$lvname</u>, r&#252;tbesi ala bilersiniz!<br/>1 ayl&#305;q <u>$lvname</u>, r&#252;tbesinin qiymeti <b>$kill_al</b>, bal deyerindedir.<br/>\n";	
	echo "Hal-haz&#305;rda sizin r&#252;tbeniz: ";

	if ($lev >= 4)
	{
		$levelselect = @mysql_query ("Select name from levels where level='".$lev."'");
		$levels = @mysql_fetch_array($levelselect);
		$levname = $levels["name"];
		echo " <b>$levname</b><br/>";
	}
	else
	{
		echo " <u>Yoxdur</u><br/>"; 
	}

	$_v->align('left');
	$_v->divide();
	echo "1) Siz <b>$lvname</b>. r&#252;tbesi ald&#305;qda &#199;at&#305;n hem sakini, hem de  m&#252;hafize&#231;isi olacaqs&#305;z. &#199;atda qaydalar&#305; pozanlar&#305;, Xeberdarl&#305;q ede bilersiz. Sizin Xeberdarl&#305;q&#305;n&#305;z&#305; he&#231;e sayanlar&#305; ise &#199;atdan Xarc ede bilersiz.<br/>\n";
	echo "2) Siz bu r&#252;tbeni bal Sisteminden ald&#305;&#287;&#305;n&#305;z &#252;&#231;&#252;n qaydalar&#305; pozanlar&#305; xaric etmeye mecbur deyilsiz.<br/>\n";
	echo "3) R&#252;tbenizden sui istifade etsez (<i>&#214;z menafeyine g&#246;re ve ya Sebebsiz xaric etmek</i>),  <b>BAN</b>, edile bilersiz.<br/>\n";
	echo "4) Reklam edenleri, Kiminse Valideyinini ve kimese &#351;iddetli s&#246;y&#252;&#351; s&#246;yenleri Xeberdarl&#305;qs&#305;z Xarc ede bilersiz.<br/>----<br/>\n";
	echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n";
	echo $divide;

	if ($lev < 4) 
	{
		if ($bal >= $kill_al) 
		{
			print $_v->submit('Bu Rutbeni al','action=save',"hesab.php?id=$id&amp;ps=$ps&amp;bolme=killer&amp;ref=$ref");
		}
		else
		{
			echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>$kill_al</b>, bal olmal&#305;d&#305;r.<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
		}
	}
	else
	{
		if ($lev == 9)
		{
			echo "<b>Salam &#350;ef siz hara bura hara?:)</b><br/>\n";
		}
		else
		{
			$ru = @mysql_query("select saat,tarix from `hesab` where usid = '".$id."' and x = '3' limit 1;");
			if (mysql_affected_rows() == 0) {
			echo "<i>Size Rehberlik terefinden r&#252;tbe verildiyi &#252;&#231;&#252;n bal xidmetinden r&#252;tbe ala bilmersiz.</i><br/>\n";
			}
			else
			{
				$tru = @mysql_fetch_array($ru);
				$saat = $tru['saat'];
				if($saat > $SERVER_TIME){
				echo "Siz <u>Bal Xidmet</u>-lerinden <u>".$tru['tarix']."</u>, tarixinde r&#252;tbe alm&#305;s&#305;n&#305;z.<br/>\n";

						$tkick = $saat - $SERVER_TIME;
						if($tkick < 60 && $tkick > 0)
						{
						$var = "saniye";
						}
						elseif($tkick < 3600 && $tkick > 60)
						{
						$new = $tkick;
						$tkick = $new/60;
						$var = "deqiqe";
						}
						elseif($tkick < 86400 && $tkick > 3600)
						{
						$new = $tkick;
						$tkick = $new/3600;
						$var = "saat";
						}
						elseif($tkick > 86400)
						{
						$new = $tkick;
						$tkick = $new/86400;
						$var = "g&#252;n";
						}
						$tkick = round($tkick, 0);
						
				echo "R&#252;tbenizin vaxt&#305;na $tkick $var qal&#305;b.<br/>\n";

				}
				else
				{
					$user = $row['user'];
					echo "H&#246;rmetli <b>$user</b>, Sizin r&#252;tbenizin vaxt&#305; tamam olub.<br/>\n";
				}
			}
		}
	}
}
else
{
	$_v->title($lvname.' R&#252;tbe');
	$_v->fsize1($fsize1);
		
	if($lev>="4")
	{
		echo "Sizin";
		$levelselect = @mysql_query ("Select name from levels where level='".$lev."'");
		$levels = @mysql_fetch_array($levelselect);
		$levname = $levels["name"];
		echo " <b>$levname</b>"; 
		echo " R&#252;tbeniz var!<br/>";
		break;
	}

	if ($bal<$kill_al)
	{
		echo "<i>1 ayl&#305;q <b>$levname</b>, R&#252;tbesi almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$kill_al</b>, bal olmal&#305;d&#305;r!</i><br/>";
		echo "----<br/>\n";
		echo "<a href=\"hesab.php?bolme=status&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

	$newbal = $bal - $kill_al;
	$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `level` = '5', `panel` = '2' WHERE `id` = '".$id."';");
	if($sql)
	{
		$levelselect = @mysql_query ("Select name from levels where level='5'");
		$levels = @mysql_fetch_array($levelselect);
		$lvname = $levels["name"];
		echo "<b>Tebrikler.</b><br/> Siz u&#287;urla <u>$lvname</u>, R&#252;tbesi ald&#305;n&#305;z!<br/>Qaydalar&#305; unutmay&#305;n...\n";
		echo "<br/>----<br/>\n";
		echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;\n"; 
	}
	
	$date = date("d.m.y [H:i]",$SERVER_TIME); 
	$user = $row['user'];
	$saat = 2592000 + $SERVER_TIME;
	mysql_query("insert into `hesab` values(0,'$user','$id','$date','$saat','3');");
	@$save= fopen("file/bal_bot/6.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: - 1 ayl&#305;q <b>$lvname</b>, r&#252;tbesi ald&#305;: (<u>$bal-$kill_al=<b>$newbal</b></u>)-($date)")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);

	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$kill_al;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';");
	$data = date("d.m.y [H:i]",$SERVER_TIME); 

	$message = "<b>$user</b> - <b>$lvname</b> R&#252;tbesi ald&#305;! $bal - $kill_al = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...\n";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','$kill_al bal - Rutbe sat&#305;l&#305;b','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek <b>$lvname</b> R&#252;tbesi Sahib olduz!<br/> Hesab&#305;n&#305;zda $bal - $kill_al = $newbal bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n size Te&#351;ekk&#252;rler!</i><br/><br/><b>Qeyd</b>: Eger hans&#305;sa bir internet kafede oturursuzsa &#199;atdan &#231;&#305;xd&#305;q&#305;n&#305;z zaman opera program&#305;ndan zaklatkalar&#305; silmeyi unutmay&#305;n. &#350;ifrenize telefon n&#246;mrenizi ve ya sade simvol yazmay&#305;n. Ununtmay&#305;n Sizin leqebinizle kimse &#199;ata girib qaydalar&#305; pozarsa bunun mesuliyyeti size aiddir\n";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','".$lvname." R&#252;tbesi','".$data."','1','1');");

	for ($i=0; $i<=9; $i++)
	{
		$today=date ("H:i",$SERVER_TIME);
		$mes = "<b>$user</b>, <u>Bal Sisteminden istifade ederek</u>, <b>$lvname</b>. R&#252;tbesi ald&#305;! <u>Tebrikler!!!</u>";
		$rnd = rand(0,99999999);
		mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
	}
	$rnd = rand(0,9);
	mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
}
break;
	
	
case 'gorunmez':
$bals=file("file/bal_bot/0.dat");
$gorunmez_al = trim($bals[9]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($gorunmez_al=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
$_v->title('G&#246;r&#252;nmez','center');
		$_v->fsize1($fsize1);
		
$inv = $row['inv'];
if(!isset($_POST['action']))
{
	if ($inv=="0")
	{
		echo "<b>G&#246;r&#252;nmez</b>-lik<br/>";
		$_v->divide();
		$_v->align('left');
		echo "Eger siz leqebinizi g&#246;r&#252;nmez etseniz nikiniz hec yerde gorunmeyecek dehlizde otaqlarda ve.s <img src=\"img/z9.gif\" alt=\".\"/><u>G&#246;r&#252;nmez</u>, kimi yaz&#305;lacaq...<br/> Sizin Leqebiniz yaln&#305;z otaqda nese yazsaz otaqdak&#305; adamlar g&#246;re biler.<br/>----<br/>\n";
		echo "Bu xidmetden 1 ayl&#305;q istifade haqq&#305; <b>$gorunmez_al</b> bal deyerindedir.<br/>\n";
	}
	echo "Sizin Leqebiniz:\n";

	if($inv==0)
	{
		echo "<u>G&#246;r&#252;nmez deyil.</u><br/>";
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>\n"; 
		echo $divide;

		if ($bal>=$gorunmez_al)
		{
			print $_v->submit('G&#246;r&#252;nmez et','action=save,gorunmez=1',"hesab.php?id=$id&amp;ps=$ps&amp;bolme=gorunmez&amp;ref=$ref");
		}
		else
		{
			echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>$gorunmez_al</b>, bal olmal&#305;d&#305;r.<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
		}
	}
	else
	{
		echo "<u>G&#246;r&#252;nmezdir.</u><br/>----<br/>";
		print $_v->submit('G&#246;r&#252;nmezliyi le&#287;v et','action=save,gorunmez=0',"hesab.php?id=$id&amp;ps=$ps&amp;bolme=gorunmez&amp;ref=$ref");
	}
}
else
{
	if($gorunmez=="$inv")
	{
		echo "Stop Telesme Emeliyyat u&#287;urla sona cat&#305;b!<br/>";
		break;
	}

	if (($bal<$gorunmez_al)&&($gorunmez==1))
	{
		echo "&#304;stifade&#231;i ad&#305;n&#305; <u>G&#246;r&#252;nmez</u>, etmek  &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$gorunmez_al</b>, bal olmal&#305;d&#305;r!<br/>----<br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>*****<br/>\n";
	}
	else
	{
		if($gorunmez!=0){$newbal = $bal - $gorunmez_al;}
		else {$newbal = $bal;}
		settype($gorunmez, 'integer');
		$sql = mysql_query("UPDATE `users` SET `bal` = '".$newbal."', `inv` = '".$gorunmez."' WHERE `id` = '".$id."';");
		$user = $row['user'];

		if($sql)
		{
			if($inv=="0"){echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#304;stifade&#231;i ad&#305;n&#305;z&#305; <b>G&#246;r&#252;nmez</b>,  etdiniz!<br/>----<br/>\n";}
			else {  echo "<u>Siz &#246;z G&#246;r&#252;nmezliyinizi le&#287;v etdiz</u><br/>*****<br/>";}

			$date = date("d.m.y [H:i]",$SERVER_TIME); 

			if($gorunmez!=0)
			{
				$msg = "(<u>$bal-$gorunmez_al=<b>$newbal</b></u>)";
				echo "Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;\n"; 
				echo "<br/>*****<br/>\n";
				$saat = 2592000 + $SERVER_TIME;
				mysql_query("insert into `hesab` values(0,'$user','$id','$date','$saat','2');");

				$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
				$mp = mysql_fetch_array ($xerc);
				$satish=$mp["xerc"];
				$satish=$satish+$gorunmez_al;
				mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");
				$adminm = "<b>$user</b> - g&#246;r&#252;nmez oldu:<br/> $bal - $gorunmez_al = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
				$userm = "H&#246;rmetli <b>$user</b>. Siz Bal Sisteminden &#304;stifade ederek 1 ayl&#305;q <b>G&#246;r&#252;nmez</b>, oldunuz:<br/>Hesab&#305;n&#305;zda $bal - $gorunmez_al = $newbal bal qald&#305;.<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
			}
			else
			{
				$msg = "(<b>G&#246;r&#252;nmezliyini Le&#287;v Etdi</b>)";
				mysql_query("delete from `hesab` where usid='".$id."' and x = '2' limit 1;");
				$adminm = "<b>$user</b> - g&#246;r&#252;nliyini le&#287;v etdi:<br/> Hesab&#305;nda <b>$newbal</b>, bal var.";
				$userm = "H&#246;rmetli <b>$user</b>. Siz Bal Sisteminden ald&#305;&#287;&#305;n&#305;z <b>G&#246;r&#252;nmez</b>-liyinizi vaxt&#305;ndan evvel le&#287;v etdiniz...<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
			}
			@$save= fopen("file/bal_bot/7.dat", "a+"); 
			$qeyd = "".base64_encode("<b>$user</b>: - $msg Tarix: $date")."\n";
			@fwrite($save, "$qeyd");
			@fflush($save);
			@fclose($save);

			$data = date("d.m.y [H:i]",$SERVER_TIME); 
			$ferq = $bal - $newbal;
			mysql_query("insert into zapiski values(0,'".$b_user."','0','".$adminm."','','1','".$SERVER_TIME."','0','G&#246;r&#252;nmezlik ".$ferq." bal','".$data."','1','1');");
			mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$userm."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
		}
	}
}
break;





//////////////





case 'elan':
$bals=file("file/bal_bot/0.dat");
$t_elan = trim($bals[10]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


if($t_elan=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$_v->title('Tebrik Elanlar');
$_v->fsize1($fsize1);
if(!isset($_POST['action']))
{
	if ($bal < $t_elan)
	{
		echo "Tebrik Elan&#305; Yerle&#351;dirmek &#252;&#231;&#252;n Hesab&#305;n&#305;zda en az&#305; <b>$t_elan</b>, bal olmal&#305;d&#305;r.<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>";
	}
	else
	{
		echo "<u>Diqqet</u>: Burda Ba&#351;qa saytlar&#305; reklam etmek, Siyasi elan, Tehqir ve.s. yazmaq olmaz!<br/>\n";
		echo "Balans&#305;n&#305;zda <b>$bal</b>. bal var<br/>";
	}
	$_v->divide();
	$_v->action("hesab.php?bolme=elan&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	echo "Tebrik ve ya Elan:<br/>\n";
	print $_v->input("<input maxlength=\"150\"  name=\"tebrik\" title=\"Tebrik ve ya Elan\"/>").'<br/>';

	echo "M&#252;ddet (vaxt):<br/>\n";
	$t_elan1 = $t_elan*5;
	$t_elan2 = $t_elan*10;
	$t_elan3 = $t_elan*15;
	print $_v->select("<select name=\"saat\">|<option value=\"1\">1 saatl&#305;q ($t_elan bal)</option>|<option value=\"5\">5 saatl&#305;q ($t_elan1 bal)</option>|<option value=\"12\">12 saatl&#305;q ($t_elan2 bal)</option>|<option value=\"24\">1 g&#252;nl&#252;k ($t_elan3 bal)</option>|</select>",'null').'<br/>';
	print $_v->submit('Elave et','action=save');
}
else
{
	if($saat==24)
	{
		$t_elan = $t_elan*15;
	}
	elseif($saat==12)
	{
		$t_elan = $t_elan*10;
	}
	elseif($saat==5)
	{
		$t_elan = $t_elan*5;
	}
	elseif($saat==1)
	{
		$t_elan = $t_elan;
	}
	else
	{
		exit;
	}
	
	if ($bal<$t_elan)
	{
		echo "Sayt&#305;n gireceyine $saat saatl&#305;q tebrik ve ya elan yerle&#351;dirmek &#252;&#231;&#252;n $t_elan bal laz&#305;md&#305;r.<br/>\n";
		echo "Sizin balans&#305;n&#305;zda <b>$bal</b>. bal var.<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
		echo "<a href=\"hesab.php?bolme=elan&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
		break;
	}

	$q = mysql_query("SELECT * FROM `elan` WHERE `title` = '".$tebrik."' and `saat` > '".$SERVER_TIME."';");
	if((mysql_num_rows($q) != 0)or($tebrik==""))
	{
		echo "<b>Sizin Tebrikiniz Qeyd Edilib!</b><br/><i>Eyni elan&#305; 2 defe yazmaq olmaz...</i><br/>\n";
		echo "*****<br/><a href=\"hesab.php?bolme=elan&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
		break;
	}

	if(strlen($tebrik)>="200")
	{
		echo "Tebrik elaninizi 150 simvoldan artiq yazmaq ixtiyariniz yoxdur<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=elan&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}


	$tebrik= narmobil(chkdsk($tebrik,basename(__FILE__),"Bal Xidmeti - Tebrik Elan"));
	$data = date("d.m.y [H:i]",$SERVER_TIME); 

	$qsaat = $saat * 3600 + $SERVER_TIME;
	mysql_query("insert into elan values(0,'$tebrik','$user','$data','$qsaat');");
	$newbal=$bal-$t_elan;
	mysql_query ("Update `users` set `bal`='".$newbal."' where `id`='".$id."';");

	echo "<b>Sizin Tebrik mesaj&#305;n&#305;z elave edildi!</b><br/>*****<br/>\n";
	echo "<i>Elana Baxmaq &#252;&#231;&#252;n <a href=\"index.php?ref=$ref\">Daxil Ol</a></i><br/>----<br/>\n";
	echo "Hesab&#305;n&#305;zdan $t_elan bal &#231;&#305;x&#305;ld&#305;. <br/>Elan $saat saatdan sonra avtomatik silinecek.<br/>\n";
	echo "Hesab&#305;n&#305;zda <b>$newbal</b>. qald&#305;!<br/>\n";


	$save= fopen("file/bal_bot/1.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: - $tebrik.<br/><b>&#xbb;&#xbb;</b>- ($saat saatl&#305;q) - (<u>$bal-$t_elan=<b>$newbal</b></u>) -(<i>$data</i>)")."\n";
	fwrite($save, "$qeyd");
	fflush($save);
	fclose($save);


	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$t_elan;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");

	$adminm = "<b>$user</b> - $saat saatliq Tebrik-Elan yerle&#351;dirdi. <br/>Mesaj: <i>$tebrik</i>. <br/>$bal - $t_elan = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var.";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$adminm."','','1','".$SERVER_TIME."','0','Tebrik: $t_elan bal','".$data."','1','1');");

	$userm = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade edib &#199;at&#305;n ilk sehifesine $saat saatl&#305;q Tebrik Mesaj&#305; yerle&#351;dirdiniz. <br/>Mesaj beledir: <i>$tebrik</i><br/> Hesab&#305;n&#305;zda $bal-$t_elan=$newbal bal qald&#305;.<br/> <u>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</u>";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$userm."','".$user."','".$id."','".$SERVER_TIME."','0','Tebrik mesaj&#305;','".$data."','1','1');");
}
break;


case 'x':

$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaric1 = trim($xx1[0]);
$xaric2 = trim($xx1[1]);
$xaric3 = trim($xx1[2]);
$xaric4 = trim($xx1[3]);
$xaricc = trim($xx1[4]);

if($xaricc!="1"){
$_v->title('Xeta');
$_v->fsize1($fsize1);

echo "Xidemet Deaktiv Edilib!!!<br/>\n";
echo $divide;
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$_v->title('Xaric Etmek');
$_v->fsize1($fsize1);

if(!isset($_POST['nick']))
{
	if($nk) $pnik = @mysql_fetch_object(@mysql_query ("Select user from users where id = '".$nk."' LIMIT 1;"));

	echo" Balans&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>";
	$_v->action("hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref");

	echo "Leqebi<br/>\n";
	print $_v->input("<input name=\"nick$ref\" maxlength=\"20\" value=\"$pnik->user\" title=\"Leqebi\"/>").'<br/>';

	echo "Vaxt:<br/>\n";
	print $_v->select("<select name=\"wtime$ref\">|<option value=\"30\">30 Deqiqe ($xaric1 bal)</option>|<option value=\"60\">1 Saat ($xaric2 bal)</option>|<option value=\"120\">2 Saat ($xaric3 bal)</option>|<option value=\"180\">3 Saat ($xaric4 bal)</option>|</select>",'null').'<br/>';

	echo "<b>Sebeb:</b> (Tehqir olmaz)<br/>\n";
	print $_v->input("<input name=\"whykik$ref\" maxlength=\"50\" title=\"whykik\"/>").'<br/>';

	print $_v->submit('Xaric et');
	if ($pnik->user)
	{
		$_v->divide('wml');
		echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
	}
	break;
}
else
{
	$whykik= chkdsk($whykik,basename(__FILE__),"Xaric ederken");


	if(isset($nk))
	{ 
		$select = @mysql_query ("Select * from users where id='".$nk."'");
	}
	else
	{
		$nick=trim($nick);       
		if($nick=="")$nick=0;          
		if (!ctype_digit($nick)) {         
			$latuser=strtolower($nick);
		   $select = mysql_query ("Select * from users where latuser = '".$latuser."'"); 
		}
		else 
		{
		   $select = mysql_query ("Select * from users where id = '".$nick."'"); 
		}
	}
	if (mysql_affected_rows() == 0)
	{
		echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>\n";
		if ($rm!="")echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>";
		break;
	}

	$inf = mysql_fetch_array ($select); 
	$pid = $inf["id"];
	$level = $inf["level"];
	$pnik = $inf["user"];
	$otaq = $inf["room"];
	$vtme = $inf["kik"];
	$xare = $inf["whokik"];
	$ipp = $inf["user_ip"];
	$soft = $inf["user_soft"];
	$otime = $SERVER_TIME;


	if($vtme>$otime)
	{
		$tkick = $vtme - $SERVER_TIME;
			if($tkick < 60 && $tkick > 0)
			{
			$var = "saniyyelik";
			}
			elseif($tkick < 3600 && $tkick >= 60)
			{
			$new = $tkick;
			$tkick = $new/60;
			$var = "deqiqelik";
			}
			elseif($tkick < 86400 && $tkick >= 3600)
			{
			$new = $tkick;
			$tkick = $new/3600;
			$var = "saatl&#305;q";
			}
			elseif($tkick >= 86400)
			{
			$new = $tkick;
			$tkick = $new/86400;
			$var = "g&#252;nl&#252;k";
			}
			$tkick = round($tkick, 0);

		if($xare==$user)echo "<b>$pnik</b> leqebli istifadecini siz ujey $tkick $var  xaric edibsiz...<br/>\n";
		else echo "<b>$pnik</b> leqebli istifadecini sizden evvel <u>$xare</u>, $tkick $var  xaric edib...<br/>\n";

		if ($rm!="")
		{
			echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>";
		}

		break;
	}

	if  ($wtime=="30"){
	$vaxtc = "".$xaric1."";}     
	if  ($wtime=="60"){
	$vaxtc = "".$xaric2."";}   
	if  ($wtime=="120"){
	$vaxtc = "".$xaric3."";}   
	if  ($wtime=="180"){
	$vaxtc = "".$xaric4."";}

	if(($vaxtc!=$xaric1)&&($vaxtc!=$xaric2)&&($vaxtc!=$xaric3)&&($vaxtc!=$xaric4)) exit;
	if($bal<$vaxtc)
	{
		echo "Tess&#252;f ki, hesab&#305;n&#305;zda bal yeterli deyil.<br/>----<br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>----<br/>\n";

		if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>";
		else echo "<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
		break;
	}

	if($inf["tox"]!=0)
	{
		echo "<b>$pnik</b> Leqebli &#350;exsin Toxunulmazl&#305;q&#305; Var... <br/><i>Onu Melekler Qoruyur!</i><br/>\n";
		if ($rm!="")
		{
			echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>";
		}
		break;
	}

	if($level>=4)
	{
		echo "<i>R&#252;tbeli &#350;exsleri Bal ile &#231;atdan Xaric Etmek Olmaz!!!</i><br/>\n";
		if ($rm!="")echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>";
		break;
	}

	echo "<b>$pnik</b> - Chatdan Xaric Edildi!<br/>\n";

	$newbal=$bal-$vaxtc;
	mysql_query ("Update users set bal='".$newbal."' where id='".$id."'");
	$totime = $wtime;
	$wtime = $wtime * 60 + $SERVER_TIME;

	$whykik = narmobil($whykik);
	mysql_query ("UPDATE users SET kik = '".$wtime."', whokik = '".$user."', con = '4', whykik = '".$whykik."' WHERE id = '".$pid."'");


	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$vaxtc;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");
	$data = date("d.m.y [H:i]",$SERVER_TIME); 
	$bals=file("file/bal_bot/0.dat");
	$b_user = trim($bals[0]);
	$user_bot = trim($bals[1]);
	unset($bals);


	$message = "<b>$user</b> - <b>$pnik</b> ($totime deq.) &#199;atdan xaric etdi. Sebeb: <u>($whykik)</u>. <br/>$bal - $vaxtc = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Xaric: $vaxtc bal','".$data."','1','1');");

	$message = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade edib, $pnik leqebli istifade&#231;ni $totime deqiqelik &#199;atdan Xaric etdiz! <br/>Hesab&#305;n&#305;zda $bal-$vaxtc=$newbal bal qald&#305;.";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");


	for ($i=0; $i<=9; $i++)
	{
		$today=date ("H:i",$SERVER_TIME);
		$tleft = $row["whykik"] - $SERVER_TIME;
		$mes = "<b>$user</b>, <u>Bal Sisteminden istifade ederek</u>, <b>$pnik</b>. leqebli istifade&#231;ini $totime deqiqelik &#199;atdan xaric etdi. (Sebeb: $whykik.)";
		$rnd = rand(0,99999999);
		mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='".$user_bot."', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
	}
	
	if($rm!='')mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rm."' WHERE `id` = '10';");

	if($rm!='') $otaq = $rm; 
	$selotaq = @mysql_query ("Select name from rooms where rm='".$otaq."';");
	$onam = @mysql_fetch_array($selotaq);
	$otaqadi = $onam["name"];

	$save= fopen("file/bal_bot/8.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: - $pnik. - $totime deq. sebeb: (<u>$whykik</u>) (<u>$bal-$vaxtc=<b>$newbal</b></u>) [$otaqadi] (<i>$data</i>)")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);
}
break;

/////////////////////
case 'tox':
$bals=file("file/bal_bot/0.dat");
$tox_b = trim($bals[11]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($tox_b=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$_v->title('Toxunulmazl&#305;q');
$_v->fsize1($fsize1);

if(!isset($_POST['tox']))
{
	if($row["tox"]=='0')
	{
		if ($bal<$tox_b)
		{
			echo "<b>Toxunulmazl&#305;q</b><br/>*****<br/>\n";
			echo "Toxunulmazl&#305;q o demekdir ki, sizi &#231;atda adi istifade&#231;iler xaric ede bilmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>$tox_b</b>, bald&#305;r.<br/>Sizin hesab&#305;n&#305;zda bal yeterli deyil...\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var\n"; 
			echo "<br/>----<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
			break;
		}
		else
		{
			echo "<b>Toxunulmazl&#305;q</b><br/>*****<br/>\n";
			echo "Toxunulmazl&#305;q  Sizi &#231;atda ad&#305; istifade&#231;ilerin xaric etmesine qada&#287;a qoyur.<br/>\n";
			echo "ve Sizi xaric etmek olmur (R&#252;tbeli &#350;exslerden ba&#351;qa).<br/>\n";
			echo "----<br/>Bu xidmetden 1 ayl&#305;q istifade haqq&#305; <b>$tox_b</b> bald&#305;r...\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>"; 
			echo "----<br/>\n";
			print $_v->submit('Toxunulmaz ol','tox=save',"hesab.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
			break;
		}
	}
	else
	{
		echo "H&#246;rmetli <b>$user</b>.<br/><br/>\n";
		echo "Siz toxunulmazl&#305;&#287;&#305;n&#305;z var.<br/>\n";
		$_v->divide();
		print $_v->submit('Le&#287;v e','tox=delete',"hesab.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	}
}
elseif($_POST['tox']=="save")
{
	if ($bal<$tox_b)
	{
		echo "<i>\"<b>Toxunulmaz</b>\" olmaq &#252;&#231;&#252;n <b>$tox_b</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
		echo "<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		break;
	}

	if($row["tox"]!="0")
	{
		$_v->align('center');
		echo "<i>H&#246;rmetli <b>$user</b><br/> Sizin Toxunulmazl&#305;&#287;&#305;n&#305;z var!</i><br/>";
		break;
	}

	$newbal=$bal-$tox_b;
	$son  = "Update users set bal = '".$newbal."', tox = '1' where id ='".$id."'";
	mysql_query ($son);
	$data = date("d.m.y [H:i]",$SERVER_TIME); 
	$saat = 2592000 + $SERVER_TIME;
	mysql_query("insert into `hesab` values(0,'$user','$id','$data','$saat','4');");

	$save = @fopen("file/bal_bot/9.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: (<u>$bal-$tox_b=<b>$newbal</b></u>) Tarix: $data")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);
	
	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$tox_b;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");

	$message = "<b>$user</b> - Toxunulmaz oldu... $bal - $tox_b = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Toxunulmaz $tox_b bal','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek <u>Toxunulmaz &#350;exs</u>. oldunuz!<br/> Hesab&#305;n&#305;zda $bal - $tox_b = $newbal bal qald&#305;.<br/>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Toxunulmazl&#305;q','".$data."','1','1');");

	echo "<b>Tebrikler!!!</b><br/>*****<br/>";
	echo "Siz \"<u>Toxunulmaz</u>\" &#350;exs olduz!<br/>";
	echo "&#304;ndi Sizi adi istifade&#231;iler &#231;atdan xaric edebilmez.<br/>----<br/>";
	echo "Hesab&#305;n&#305;zda <b>$newbal</b>. qald&#305;<br/>";
	break;
}
elseif($_POST['tox']=="delete")
{
	if($row["tox"]=="0")
	{
		echo "H&#246;rmetli <b>$user</b><br/> Sizin Toxunulmazl&#305;&#287;&#305;n&#305;z Yoxdur))<br/>";
		break;
	}
	else
	{
		mysql_query ("Update users set tox = '0' where id ='".$id."'");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 
		mysql_query("delete from `hesab` where usid='".$id."' and x = '4' limit 1;");

		@$save= fopen("file/bal_bot/9.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user: - Toxunulmazl&#305;&#287;&#305;n&#305; Le&#287;v Etdi</b> -  Tarix: $data")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$message = "<b>$user</b> - Toxunulmazl&#305;&#287;&#305;n&#305; le&#287;v etdi...";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Toxunulmazl&#305;q&#305;n le&#287;vi','".$data."','1','1');");

		$istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>$user</b>. Siz <u>Toxunulmazl&#305;&#287;&#305;n&#305;z&#305;</u>, le&#287;v etdiniz!";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		echo "<u>Siz &#246;z Toxunulmazl&#305;&#287;&#305;n&#305; le&#287;v etdiz</u><br/>";
	}
}
break;
/////////////////////





case 'color':
$bals=file("file/bal_bot/0.dat");
$r_yazi = trim($bals[12]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);


if($r_yazi=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}




$shrift = $row['shrift'];

$_v->title('Rengli Yaz&#305;');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	if($shrift!='')
	{
		echo "H&#246;rmetli <b>$user</b>.<br/><br/>\n";
		echo "Siz rengli yaz&#305;n&#305;z var<br/>";
		print $_v->submit('Le&#287;v et','action=delete',"hesab.php?bolme=color&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	}
	else
	{
		echo "<b>Rengli yaz&#305;lar</b><br/>*****<br/>\n";
		echo "Rengli yaz&#305;lar 5 rengden ibaretdir:<br/>\n";
		echo "Siz <u>rengli yaz&#305;</u>, ald&#305;qda chatda yazd&#305;q&#305;n&#305;z yaz&#305;lar qara reng yox, se&#231;diyiniz<br/>\n";
		echo "rengde g&#246;rsenecek  ve Siz diger istifade&#231;ilerden daha &#231;ox se&#231;ileceksiz,<br/>\n";
		echo "----<br/>\n";
		echo "<u>1 ayl&#305;q</u> rengli yaz&#305;n&#305;n qiymeti <b>$r_yazi</b>, bald&#305;r.<br/>\n";
		echo "----<br/>\n";
		echo "<b>Qeyd:</b> - <i>Rengler yaln&#305;z komp&#252;terle giren istifade&#231;ilerde g&#246;rsenir</i>.\n";

		echo "<br/>----<br/>\n";
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var\n"; 
		echo "<br/>----<br/>\n";
		echo "<b>Rengler:</b>\n";

		echo "<span style=\"color: #990000\">Q&#305;rm&#305;z&#305;</span>\n";
		echo "<span style=\"color: blue\">G&#246;y,</span>\n";
		echo "<span style=\"color: green\">Ya&#351;&#305;l,</span>\n";
		echo "<span style=\"color: Indigo\">&#199;ehray&#305;</span> ve \n";
		echo "<span style=\"color: Magenta\">Nar&#305;nc&#305;.</span>\n";

		echo "<br/>\n";
		$_v->action("hesab.php?bolme=color&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
		print $_v->select("<select name=\"rengs$ref\">|<option value=\"".base64_encode('#990000')."\">Q&#305;rm&#305;z&#305; ($r_yazi bal)</option>|<option value=\"".base64_encode('blue')."\">G&#246;y ($r_yazi bal)</option>|<option value=\"".base64_encode('green')."\">Ya&#351;&#305;l ($r_yazi bal)</option>|<option value=\"".base64_encode('Indigo')."\">&#199;ehray&#305; ($r_yazi bal)</option>|<option value=\"".base64_encode('Magenta')."\">Nar&#305;nc&#305; ($r_yazi bal)</option>|</select>",'null').'<br/>';
		print $_v->submit('Rengi Al','action=save');
	}
}
elseif($_POST['action']=="save")
{

	if($row["shrift"]!='')
	{
		echo "H&#246;rmetli <b>$user</b><br/> Sizin Rengli &#351;iriftiniz (yaz&#305;n&#305;z) var!<br/>";
		break;
	}


	if ($bal<$r_yazi)
	{
		echo "<i>Rengli yaz&#305; almaq &#252;&#231;&#252;n  <b>$r_yazi</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
		echo "<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		break;
	}
	$rengs = base64_decode($rengs);
	$newbal=$bal-$r_yazi;
	mysql_query ("Update users set bal = '".$newbal."', shrift = '".$rengs."' where id ='".$id."'");
	$data = date("d.m.y [H:i]",$SERVER_TIME); 
	$saat = 2592000 + $SERVER_TIME;
	mysql_query("insert into `hesab` values(0,'$user','$id','$data','$saat','5');");

	@$save= fopen("file/bal_bot/10.dat", "a+"); 
	$qeyd = "".base64_encode("<b><span style=\"color: $rengs\">$user</span></b>: - (<u>$bal-$r_yazi=<b>$newbal</b></u>)-($data)")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);

	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$r_yazi;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");

	$message = "<b>$user</b> - Rengli &#350;rift ald&#305;... $bal - $r_yazi = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Rengli Yaz&#305; $r_yazi bal','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek <u>Rengli Yaz&#305;</u>. ald&#305;n&#305;z!<br/> Hesab&#305;n&#305;zda $bal - $r_yazi = $newbal bal qald&#305;.";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Rengli Yaz&#305;','".$data."','1','1');");

	echo "<b>Tebrikler!!!</b><br/>*****<br/>";
	echo "Siz \"<u>Rengli Yaz&#305;</u>\" ald&#305;n&#305;z!<br/>";
	echo "&#304;ndi Sizi adi istifade&#231;ilerden ferqli olaraq &#199;atda yaz&#305;lar&#305;n&#305;z Rengli olacaq.<br/>----<br/>";
	echo "Hesab&#305;n&#305;zda <b>$newbal</b>. qald&#305;<br/>";
	break;

}
elseif($_POST['action']=="delete")
{
	if($row["shrift"]=='')
	{
		echo "H&#246;rmetli <b>$user</b><br/> Sizin Rengli &#351;iriftiniz (yaz&#305;n&#305;z) Yoxdur))<br/>";
	}
	else
	{
		mysql_query ("Update users set shrift = '' where id ='".$id."'");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 

		mysql_query("delete from `hesab` where usid='".$id."' and x = '5' limit 1;");

		@$save= fopen("file/bal_bot/10.dat", "a+"); 
		$qeyd = "".base64_encode("<b><span style=\"color: $rengs\">$user Rengli yaz&#305;s&#305;n&#305; le&#287;v etdi</span></b>: -($data)")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$message = "<b>$user</b> - Rengli Yaz&#305;s&#305;n&#305; le&#287;v etdi...";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Rengli Yaz&#305;n&#305;n le&#287;vi','".$data."','1','1');");

		$istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>$user</b>. Siz <u>Rengli Yaz&#305;</u>-n&#305;z&#305; le&#287;v etdiniz!";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		echo "<u>Siz &#246;z Rengli &#351;iriftinizi le&#287;v etdiz</u><br/>*****<br/>";
		echo "Art&#305;q sizin yaz&#305;lar&#305;n&#305;z Qara (Sade) rengde olacaq...<br/>";
	}
}
break;
/////////////////////





case 'kebin':
$bals=file("file/bal_bot/0.dat");
$aile_b = trim($bals[13]);
$bb_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($aile_b=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$para = $row['para'];
$sex = $row['sex'];

if($sex==0){$cins = "Ki&#351;i";} else {$cins = "Qad&#305;n";}

if($para=='')
{
	$_v->title('&#199;atda Evlenmek');
	$_v->fsize1($fsize1);
	if(!$data = mysql_fetch_object(mysql_query("SELECT `usid`,`user2` FROM `add_toy` WHERE `id` = '".$id."' LIMIT 1;")) and $_POST['action']=='send')
	{
		if ($bal < $aile_b)
		{
			echo "&#199;atda \"<b>Evlenmek</b>\"  &#252;&#231;&#252;n <b>$aile_b</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!\n";
			echo "<br/>----<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
			break;
		}
		
		if($para!='')
		{
			echo "Siz <b>$para</b> ile evlisiniz!<br/>";
			break;
		}
		
		$latuser=strtolower($s_user);
		$q = mysql_query("SELECT `id`,`user`,`para`,`sex` FROM `users` WHERE `latuser` = '".$latuser."' LIMIT 1;");
		$inf = mysql_fetch_object($q);
		if($inf->id == 0)
		{
			$_v->align('center');
			echo "<b>$s_user</b>, leqebli istifade&#231;i tap&#305;lmadi...<br/>";
			echo "----<br/>\n";
			echo "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
			break;
		}
		
		if($inf->para!='')
		{
			echo "<b>$inf->user</b>, leqebli istifade&#231;i &#231;atda <b>$inf->para</b>, leqebli istifade&#231;i ile evlidir!<br/>";
			echo "----<br/>\n";
			echo "<i>Heyatda 1 neferin 2 ve daha &#231;ox arvad&#305; ola biler ama bizim &#231;atda bu yolverilmezdir. :=)</i><br/>";
			echo "----<br/>\n";
			echo "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
			break;
		}
		
		if($inf->sex==$sex)
		{
			echo "<b>$cins-$cins</b>, ile evlene bilmez!<br/>";
			echo "----<br/>\n";
			echo "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
			break;
		}
		$date_error = true;
		if(preg_match("/^[0-9]{2}+\:[0-9]{2}+$/is", $_POST['toy_date']))
		{
			$exp = explode(':',$_POST['toy_date']);
			if($exp['0'] >= 0 or $exp['0'] < 24)
			{
				if($exp['1'] >= 0 or $exp['1'] < 60)
				{
					$date_error = null;
				}
			}
		}
		$toy_date = $_POST['toy_date'];
		
		if($date_error)
		{
			echo "Toyunuzun saati duzgun qeyd olunmayib<br/>";
			echo "----<br/>\n";
			echo "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
			break;
		}

		
		$newbal=$bal-$aile_b;
		mysql_query("Update `users` set `bal` = '".$newbal."' where `id` ='".$id."'");
		
			$save= fopen("file/bal_bot/11.dat", "a+"); 
			$qeyd = "".base64_encode("<b>$user</b> - <i>$inf->user Teklif Etdi</i>... (<u>$bal-$aile_b=<b>$newbal</b></u>) Tarix: ".date("d.m.y [H:i]",$SERVER_TIME))."\n";
			@fwrite($save, "$qeyd");
			@fflush($save);
			@fclose($save);
		
		$mp = @mysql_fetch_object(mysql_query ("Select `xerc` from `setting` where `klu4` = '1' LIMIT 1;"));
		$satish=intval($mp->xerc)+$aile_b;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");


		if($inf->sex==1){$cinsi = "Ki&#351;iye";} else {$cinsi = "Xan&#305;ma";}

		$message = "<b>$user</b> - $inf->user leqebine evlilik teklif etdi: $bal - $aile_b = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
		mysql_query("insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".$SERVER_TIME."','0','Evlenmek $aile_b bal','','1','1');");
		$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek <u>$inf->user</u>, leqebli  $cinsi evlilik teklif etdiniz.<br/> Hesab&#305;n&#305;zda $bal - $aile_b = $newbal bal qald&#305;.";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Evlenmek','','1','1');");
		$u_istifadeci = "H&#246;rmetli <b>$inf->user</b>.  <u>$user</u>, leqebli  &#350;exs sizinle evlenmek isteyir.<br/><u>$user</u>-in Teklifini deyerlendirmek &#252;&#231;&#252;n Bal xidmetleri menyusunda Evlenmek b&#246;lmesine daxil olun";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$u_istifadeci."','".$inf->user."','".$inf->id."','".$SERVER_TIME."','0','Evlenmek','','1','1');");

		if($inf->sex==0){ $deyishencins = "Cenablar&#305;na"; } else { $deyishencins = "leqebli Xan&#305;ma"; }
		
		$today=date ("H:i",$SERVER_TIME);
		$mes = "<b>".$user."</b>, leqebli &#350;exs <b>".$inf->user."</b>, $deyishencins evlilik teklif etdi!";
		for ($i=0; $i<=9; $i++)
		{
			$rnd = rand(0,99999999);
			mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
		}
		$rnd = rand(0,9);
		mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");

		if($inf->sex==0){$ecins = "Ki&#351;iye";} else {$ecins = "Xan&#305;ma";}

		echo "<b>Tebrikler</b><br/>*****<br/>";
		echo "Siz $inf->user leqebli $ecins evlenmek Teklif etdiniz!<br/>\n";
		echo "$inf->user &#304;ndi  Sizin Teklifinizi Qebul etmelidir...<br/>\n";
		echo "----<br/>\n";
		echo "<b>Qeyd</b>: Eger qebul etmese bu evlilik ba&#351; tutmayacaq.<br/>\n";
		mysql_query("insert into `add_toy` SET `id`='".$id."', `user1`='".$row['user']."', `usid`='".$inf->id."', `user2`='".$inf->user."', `date`='".$toy_date."', `time`='".time()."';");
		break;
	}

	if($_GET['unset']=='my')
	{
		@mysql_query("DELETE FROM `add_toy` WHERE `id` = '".$id."';");
		$data = null;
	}
	else if(is_numeric($_GET['unset']) and $ob = mysql_fetch_object(@mysql_query("SELECT `key` FROM `add_toy` WHERE `key` = '".$_GET['unset']."' and `usid`='".$id."';")))
	{
		@mysql_query("DELETE FROM `add_toy` WHERE `key` = '".$ob->key."' limit 1;");
	}
	else if(is_numeric($_GET['isset']) and $ob = mysql_fetch_object(@mysql_query("SELECT * FROM `add_toy` WHERE `key` = '".$_GET['isset']."' and `usid`='".$id."';")))
	{
		$istifadeci = "H&#246;rmetli <b>$user</b>. Siz <u>$ob->user1</u>, leqebli  &#350;exsin teklifini qebul ederek onunla evlendiniz.<br/><b>Tebrik edirik.</b>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Evlenmek','','1','1');");

		$u_istifadeci = "H&#246;rmetli <b>$ob->user1</b>.  <u>$user</u>, leqebli  &#350;exs Sizin teklifinizi qebul etdi ve sizinle evlendi<br/><b>Tebrik edirik.</b>";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$u_istifadeci."','".$ob->user1."','".$ob->id."','".$SERVER_TIME."','0','Evlenmek','','1','1');");

		$saat="$saat:$deqiqe";
		$stime = 86400 + time();

		if($sex!=0)
		{
			mysql_query("insert into svadbi values(0,'".$ob->user1."','".$user."','','','".$stime."','".$ob->date."','".$site."');");
			mysql_query("Update users set para='".$ob->user1."' where id ='".$id."'");
			mysql_query("Update users set para='".$user."' where id ='".$ob->id."'");
		}
		else
		{
			mysql_query("insert into svadbi values(0,'".$user."','".$ob->user1."','','','".$stime."','".$ob->date."','".$site."');");
			mysql_query("Update users set para='".$ob->user1."' where id ='".$id."'");
			mysql_query("Update users set para='".$user."' where id ='".$ob->id."'");
		}

		$mes = "<b>".$user."</b>, leqebli &#350;exs <b>".$ob->user1."</b>, ona etdiyi evlilik teklifini qebul etdi. Tebrikler!!!";
		$today=date ("H:i",$SERVER_TIME);
		for ($i=0; $i<=9; $i++)
		{
			$rnd = rand(0,99999999);
			mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
		}
		$rnd = rand(0,9);
		mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
		@mysql_query("DELETE FROM `add_toy` WHERE `key` = '".$ob->key."';");

		echo "<b>Tebrikler</b><br/>*****<br/>";
		echo "Siz $ob->user1 leqebli istifade&#231;inin size etdiyi  evlenmek Teklifine he cavab&#305; verdiniz ve siz onunla evlendiniz!  <br/>\n";
		echo "----<br/>\n";
		echo "<b>Admin</b>: <u>Sizi Tebrik edirik...</u><br/>\n";
		break;
	}
	
	
	echo "<b>&#199;atda Evlenmek</b><br/>\n";
	$_v->divide();
	echo "&#199;atda evlenmek $aile_b bal deyerindedir.<br/><br/>
	<b>1</b>. Siz evlendikde 24 saatl&#305;q &#231;atda dehlizde sizin evliliyiniz baresinde elan verilecek.<br/>
	<b>2</b>. Dehlizde olan elanda sizin ve sizin &#351;ahidinizin (sa&#287;di&#351;) (hem&#231;inin eks terefin) adlar&#305; qeyd olacaq size tebrikler yazmaq &#252;&#231;&#252;n imkanlar olacaq.<br/>
	<b>3</b>. Hem&#231;inin balay&#305; &#252;&#231;&#252;n 1 g&#252;nl&#252;k x&#252;susi otaqda ala bilersiz.<br/>
	<b>4</b>. En esas&#305; hemi&#351;elik ve ya ayr&#305;lanadek her ikinizin anketinde heyat yolda&#351;&#305;n&#305;z&#305;n ad&#305; qeyd olacaq.\n";
	echo "<br/>----<br/>\n";
	echo "Sizin hesab&#305;n&#305;zda <b>$bal</b>. bal var.<br/>\n";

	
	$query = @mysql_query("SELECT * FROM `add_toy` WHERE `usid` = '".$id."';");
	$num = mysql_num_rows($query);
	if($num!=0)
	{
		$_v->divide();
		print 'H&#246;rmetli '.$user.' Size ('.$num.') evlilik teklifi var.<br/>----<br/>';
		while($ob = mysql_fetch_object($query))
		{
			print 'Teklif eden: <b>'.$ob->user1.'</b> - <a href="hesab.php?bolme=kebin&amp;id='.$id.'&amp;ps='.$ps.'&amp;isset='.$ob->key.'&amp;ref='.$ref.'">Qebul et</a> / <a href="hesab.php?bolme=kebin&amp;id='.$id.'&amp;ps='.$ps.'&amp;unset='.$ob->key.'&amp;ref='.$ref.'">Redd et</a><br/>';
		}
	}
	
	if($data->usid)
	{
		$_v->divide();
		print 'Siz: <b>'.$data->user2.'</b> adli istifadeciye evlilik teklifi edibsiz. - <a href="hesab.php?bolme=kebin&amp;id='.$id.'&amp;ps='.$ps.'&amp;unset=my&amp;ref='.$ref.'">Imtina et</a><br/>';
	}
	
	if($num==0 and !$data->usid)
	{
		if ($bal < $aile_b)
		{
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		}
		else
		{
			$_v->divide();
			$_v->action("hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
			echo "Sevgiliniz:<br/>\n";
			print $_v->input("<input name=\"s_user\" maxlength=\"12\" title=\"Sevgiliniz\" emptyok=\"true\"/>").'<br/>';

			echo "Saat necede? (Meselen: 22:00):<br/>\n";
			print $_v->input("<input name=\"toy_date\" maxlength=\"5\" title=\"Saat\" emptyok=\"true\"/>").'<br/>';
			
			print $_v->submit('Teklif g&#246;nder','action=send');
		}
	}
}
else
{
	$_v->title('Ayr&#305;lmaq');
	$_v->fsize1($fsize1);
	
	
	if($_GET['unset']=='my')
	{
		$data = date("d.m.y [H:i]",$SERVER_TIME); 
		@$save= fopen("file/bal_bot/11.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user: - $para</b> leqebli istifade&#231;iden Ayr&#305;ld&#305; -  Tarix: $data")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$message = "<b>$user</b> - <b>$para</b>, leqebli istifade&#231;iden ayr&#305;ld&#305;...";
		mysql_query("insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".$SERVER_TIME."','0','Melumat-Bal','".$data."','1','1');");


		if($users = mysql_fetch_object(mysql_query("SELECT `id`,`user` FROM `users` WHERE `latuser` = '".strtolower($para)."' LIMIT 1;")))
		{
			$istifadeci = "<b>Diqqet</b>! Sizin &#199;atdak&#305; heyat yolda&#351;&#305;n&#305;z (<u>$user</u>) Sizden ayr&#305;ld&#305; (bo&#351;and&#305;)";
			mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$users->user."','".$users->id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
			mysql_query("Update users set para = '' where id ='".$users->id."' LIMIT 1;");
		}
		mysql_query("Update users set para = '' where id ='".$id."' LIMIT 1;");

		echo "<u>Siz <b>$para</b>, leqebli istifade&#231;iden Ayr&#305;ld&#305;n&#305;z</u><br/>";
		for ($i=0; $i<=9; $i++)
		{
			$today=date ("H:i",$SERVER_TIME);
			$mes = "<b>".$user."</b>, - <b>$para</b> leqebli istifade&#231;iden ayr&#305;ld&#305;!!!";
			$rnd = rand(0,99999999);
			mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
		}
		$rnd = rand(0,9);
		mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
		break;
	}

	echo "<b>Ayr&#305;lmaq</b>.<br/><br/>\n";
	echo "Siz $para leqebli &#351;exs &#199;atda heyat yolda&#351;&#305;n&#305;z.\n";
	echo "<br/>----<br/>";
	echo "<i>Ayr&#305;lmaqa eminsiniz?</i><br/>----<br/>";
	print "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;unset=my&amp;ref=$ref\">Beli</a> / <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyir</a><br/>";
}
break;
/////////////////////




case 'ban':
$bals=file("file/bal_bot/0.dat");
$b_ban = trim($bals[14]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($b_ban=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$_v->title('Ban A&#231;maq');
$_v->fsize1($fsize1);

if($_GET['user_id'])
{
	$_GET['cat'] = 'tap';
}



if($_GET['cat']=='tap')
{
	if($_GET['user_id']) $nick = $_GET['user_id'];
	
	$nick=trim($nick);
	if($nick=='')$nick=0;
	$latuser=strtolower($nick);
	if(is_numeric($latuser))
	{
		$select = mysql_query ("Select id,user,banned,time,visit from users where id = '".$latuser."' LIMIT 1;");
	}
	else
	{
		$select = mysql_query ("Select id,user,banned,time,visit from users where latuser = '".$latuser."' LIMIT 1;");
	}
	
	if (mysql_affected_rows() == 0)
	{
		echo "Bele bir istifade&#231;i m&#246;vcut deyil\n";
		echo "<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}
	
	$inf = mysql_fetch_array ($select);
	$usid=$inf["id"];
	$bannick = $inf["user"];
	$bantime = $inf["time"];
	$visit = $inf["visit"];
	$banaktiv = $inf["banned"];

	if($banaktiv!=1)
	{
		echo "<u>$bannick</u>, Ban Edilmeyib...\n";
		echo "<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;cat=search&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
		break;
	}

		
	if($_GET['user_id'])
	{
		if ($bal < $b_ban)
		{
			echo "Ban Edilmi&#351; Leqebi Bandan &#231;&#305;xartmaq &#252;&#231;&#252;n,<br/>Hesab&#305;n&#305;zdan <b>$b_ban</b>, bal olmal&#305;d&#305;r\n";
			echo "<br/>----<br/>\n";
			echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var\n";
			echo "<br/>----<br/>\n";
			echo "<a href=\"hesab.php?bolme=$id&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
			break;
		}

		$newbal=$bal-$b_ban;
		mysql_query("UPDATE `users` SET `banned` = '0'  WHERE `id` = '".$usid."';");
		mysql_query("UPDATE `users` SET `bal` = '".$newbal."'  WHERE `id` = '".$id."';");
		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$b_ban;

		$data = date("d.m.y [H:i]",$SERVER_TIME); 
		$save= fopen("file/bal_bot/12.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user</b> - <b>$bannick</b> Ban&#305;n&#305; yox etdi (<u>$bal-$b_ban=<b>$newbal</b></u>) Tarix: $data")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);


		$message = "$user - $bannick BAN-&#305;n&#305; yox etdi hesab&#305;ndan $bal - $b_ban = $newbal bal qald&#305;<br/> Bankda <b>$satish</b> bal var...";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','$b_ban bal Melumat','".$data."','1','1');");


		$message = "<b>Diqqet</b>!!! <u>$user</u>, leqebli &#351;exs sizin leqebinizde olan ban&#305; &#231;&#305;xartd&#305;. O bunun &#252;&#231;&#252;n $b_ban bal xercledi &#231;al&#305;&#351;&#305;n qaydalar&#305; pozmayas&#305;z.";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$bannick."','".$usid."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");


		$message = "H&#246;rmetli <u>$user</u>, Siz  Hesab&#305;n&#305;zdan $b_ban bal xercleyerek <u>$bannick</u>. leqebli &#351;exs  ban&#305;n&#305; &#231;&#305;xartd&#305;n&#305;z.<br/> Hesab&#305;n&#305;zda $bal - $b_ban = $newbal bal qald&#305;.";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

		echo "<b>Te&#351;ekk&#252;rler</b><br/>*****<br/>\n";
		echo "Siz <u>$bannick</u>, leqebli &#350;exsin BAN-&#305;n&#305; yox etdiniz !<br/>----<br/>\n";

		echo "Sizin Hesab&#305;n&#305;zda <b>$newbal</b>. bal qald&#305;<br/>\n"; 
		break;
	}
	

	$tkick = $SERVER_TIME - $bantime;
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


	echo "ID n&#246;mresi: <b>$usid</b>\n";
	echo "<br/>Leqeb: <b>$bannick</b> \n";


	$d=substr($visit,8,2);
	if(substr($d,0,1)==0)$d=substr($d,1,2);
	$m=substr($visit,5,2);
	if(substr($m,0,1)==0)$m=substr($m,1,2);
	$y=substr($visit,0,4);
	$cp=substr($visit,11,2);
	if(substr($cp,0,1)==0)$cp=substr($cp,1,2);
	$mn=substr($visit,14,2);

	$month = array("","Yanvar","Fevral","Mart","Aprel","May","Iyun","Iyul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr");

	echo "<br/><b>Ban Edilib</b>: $d $month[$m] $y  Saat: $cp:$mn  ($tkick $vaxt evvel)<br/>\n";
	$_v->divide();

	echo "Bu leqeb bandan Azad ede bilersiz! <br/>Bunun &#252;&#231;&#252;n hesab&#305;n&#305;zdan $b_ban bal &#231;&#305;x&#305;lacaq.<br/>\n";
	echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----\n"; 

	echo "<br/>Raz&#305;s&#305;z? \n";

	echo "<a href=\"hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;user_id=$usid&amp;ref=$ref\">Beli</a>. /\n";
	echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyir</a>\n";

	echo "<br/>----<br/>\n";

	print "<a href=\"hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;cat=search&amp;ref=$ref\">Ba&#351;qa nik axtar</a><br/>";

	break;
}
else
{
	echo "Siz Ban edilmi&#351; leqeb bandan azad ede bilersiz.<br/>\n";
	echo "Bu xidmetden istifade etsez $b_ban bal hesab&#305;n&#305;zdan &#231;&#305;x&#305;lacaq!<br/>\n"; 
	echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var<br/>----<br/>\n";
	
	echo "Ban Edilmi&#351; Niki Yaz&#305;n:<br/>\n";
	$_v->action("hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;cat=tap&amp;ref=$ref");
	print $_v->input("<input name=\"nick$ref\" title=\"nick\"/>").'<br/>';
	print $_v->submit('Axtar','action=send');
}
break;

/////////////////////
case 'mexvi':
$bals=file("file/bal_bot/0.dat");
$b_mex = trim($bals[15]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($b_mex=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$_v->title('Tam Mexvilik');
$_v->fsize1($fsize1);



if($row["mexvi"]=='0')
{
	if ($bal < $b_mex)
	{
		echo "<b>Tam Mexvilik</b><br/>\n";
		$_v->divide();
		echo "\"Tam Mexvilik\" o demekdir ki, &#199;atda Sizin anketiniz (melumatlar&#305;n&#305;z) g&#246;rsenmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>$b_mex</b>, bald&#305;r.<br/>Sizin hesab&#305;n&#305;zda bal yeterli deyil...\n";
		echo "<br/>----<br/>\n";
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var\n"; 
		echo "<br/>----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		break;
	}
	else
	{
	
		if($_GET['cat']=="isset")
		{
			if ($bal<$b_mex)
			{
				echo "<i>\"<b>Tam Mexvi</b>\" olmaq &#252;&#231;&#252;n <b>$b_mex</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
				echo "<br/>----<br/>\n";
				echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
				break;
			}

			if($row["mexvi"]!="0")
			{
				$_v->align('center');
				echo "H&#246;rmetli <b>$user</b><br/> Siz \"Tam Mexvi\" istifade&#231;isiniz!<br/>";
				break;
			}

			$newbal=$bal-$b_mex;
			mysql_query ("Update users set bal = '".$newbal."', mexvi = '1' where id ='".$id."'");
			$data = date("d.m.y [H:i]",$SERVER_TIME); 
			$saat = 2592000 + $SERVER_TIME;
			mysql_query("insert into `hesab` values(0,'$user','$id','$data','$saat','6');");

			$save= fopen("file/bal_bot/13.dat", "a+"); 
			$qeyd = "".base64_encode("<b>$user</b>: (<u>$bal-$b_mex=<b>$newbal</b></u>) Tarix: $data")."\n";
			@fwrite($save, "$qeyd");
			@fflush($save);
			@fclose($save);
			
			$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
			$mp = mysql_fetch_array ($xerc);
			$satish=$mp["xerc"];
			$satish=$satish+$b_mex;
			mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");


			$message = "<b>$user</b> - Tam Mexvi oldu... $bal - $b_mex = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
			mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Tam mexvi $b_mex bal','".$data."','1','1');");

			$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek \"<u>Tam Mexvi</u>\" istifade&#231;i oldunuz!<br/> Hesab&#305;n&#305;zda $bal - $b_mex = $newbal bal qald&#305;.";
			mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Tam mexvilik','".$data."','1','1');");

			echo "<b>Tebrikler!!!</b><br/>----<br/>";
			echo "Siz \"<u>Tam Mexvi</u>\"  istifade&#231;i olduz!<br/>";
			echo "Sizin Melumatlar&#305;n&#305;z Tam Mexvile&#351;dirildi.<br/>----<br/>";
			echo "Hesab&#305;n&#305;zda <b>$newbal</b>. qald&#305;<br/>";
			break;
		}
	
		echo "<b>Tam Mexvilik</b><br/>\n";
		$_v->divide();
		echo "\"Tam Mexvilik\" o demekdir ki, &#199;atda Sizin anketiniz (melumatlar&#305;n&#305;z) g&#246;rsenmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>$b_mex</b>, bald&#305;r.<br/>\n";
		echo "----<br/>\n";
		echo "Hesab&#305;n&#305;zda <b>$bal</b>. bal var\n"; 
		echo "<br/>----<br/>\n";
		echo "Tam Mexvi olmaq isteyirsiz?<br/>\n";

		echo "<a href=\"hesab.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;cat=isset&amp;ref=$ref\">Beli</a>.\n";
		echo " / <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyir</a><br/>\n";
		break;
	}
}
else
{
	if($_GET['cat']=='delete')
	{
		mysql_query ("Update users set mexvi = '0' where id ='".$id."'");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 
		mysql_query("delete from `hesab` where usid='".$id."' and x = '6' limit 1;");

		@$save= fopen("file/bal_bot/13.dat", "a+"); 
		$qeyd = "".base64_encode("<b>$user: - Tam Mexviliyini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
		@fwrite($save, "$qeyd");
		@fflush($save);
		@fclose($save);

		$message = "<b>$user</b> - Tam Mexviliyini le&#287;v etdi...";
		mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Melumat-Bal','".$data."','1','1');");

		$istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>$user</b>. Siz <u>Tam Mexviliyinizi</u>, le&#287;v etdiniz!";
		mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
		echo "<u>Siz Tam Mexviliyini le&#287;v etdiz</u><br/>";
		break;
	}

	echo "H&#246;rmetli <b>$user</b>.<br/><br/>\n";
	echo "Siz Tam Mexviliyinizi  le&#287;v etmeye eminsiz?\n";
	echo "<br/>----<br/>";

	echo "<a href=\"hesab.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;cat=delete&amp;ref=$ref\">Beli</a>.\n";
	echo " / <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyir</a><br/>\n";
}
break;




/////////////////////


case 'img_view':
$qey = file("file/dat_folder/enter.dat");
//$ffoto = trim($qey[7]);
$fusid = trim($qey[8]);
$fuser = trim($qey[9]);
$qeyd = trim($qey[10]);
$regtime = trim($qey[11]);

if($fuser!="")
{

	$_v->title('Sekil: '.$fuser,'center');
	$_v->fsize1($fsize1);

	echo "Leqebi:\n"; 
	echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$fusid&amp;ref=$ref\">".$fuser."</a><br/><br/>\n";


	$ffoto = false;
	$q = mysql_query("SELECT * FROM `albom` WHERE `photo` = '".$photo."';");
	if (mysql_affected_rows() == 0)
	{
		if($photo)echo 'Foto tapilmadi<br/>';
	}
	else
	{
		$arr = mysql_fetch_array($q);
		$ffoto=$arr['idfoto'].'/'.$arr['photo'];

		if (file_exists("photos/".$ffoto.""))
		{
			echo "<img src=\"image.php?img=photos/$ffoto&amp;size=150\" alt=\"foto\"/><br/>\n";
			$a_down = mysql_fetch_object(mysql_query ("SELECT COUNT(`id`) as `num` FROM `albom_down` WHERE `id_albom` ='{$arr['id']}';"));
			echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;down={$arr['id']}&amp;ref=$ref\">Y&#252;kle</a>-<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=down&amp;key={$arr['id']}&amp;ref=$ref\">({$a_down->num})</a><br/><br/>\n";
		}

		if($qeyd!="")
		{
			echo $qeyd.'<br/>----<br/>';
		}
	}
	echo "<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sen de &#351;eklini yerle&#351;dir</a><br/>\n";
}
else
{
	$_v->title('&#214;z&#252;n&#252; g&#246;ster','center');
	$_v->fsize1($fsize1);
	echo "<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;eklini yerle&#351;dir</a><br/>\n";
}
break;




case 'imgview':
if($del=="1")
{
	if($row["level"]!=9)
	{
		exit;
	}
	
	$_v->title('&#350;ekil silindi','center');
	$_v->fsize1($fsize1);
	
	$file = file("file/dat_folder/enter.dat");
	$test= trim($file[0]);
	$test2= trim($file[1]);
	$test3= trim($file[2]);
	$test4= trim($file[3]);
	$test5= trim($file[4]);
	$test6= trim($file[5]);
	$test7= trim($file[6]);

	$files = fopen("file/dat_folder/enter.dat", "w");
	$xfil .= "$test\n";
	$xfil .= "$test2\n";
	$xfil .= "$test3\n";
	$xfil .= "$test4\n";
	$xfil .= "$test5\n";
	$xfil .= "$test6\n";
	$xfil .= "$test7";
	fwrite($files, $xfil);
	fclose($files);
	
	echo "Dehlizdeki &#351;ekil silindi...<br/>----<br/>";
	break;
}

$bals=file("file/bal_bot/0.dat");
$b_img = trim($bals[16]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);



if($b_img=="x")
{
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$dat = file("file/dat_folder/enter.dat");
$regtime = trim($dat[11]);

// if($regtime>$SERVER_TIME){
// $_v->title('G&#246;zleyin');
// $_v->fsize1($fsize1);
// $regtime = ($regtime-$SERVER_TIME)/60;
// $regtime = round($regtime);

// echo "Hal-haz&#305;rda dehlizde aktiv olan &#351;ekil var.<br/><br/>\n";
// echo "Yeni &#350;ekil elave etmek &#252;&#231;&#252;n $regtime deqiqe g&#246;zlemelisiz.<br/><br/>\n";
// break;
// }



$_v->title('&#214;z&#252;n&#252; g&#246;ster','center');
$_v->fsize1($fsize1);

if(!isset($_POST['action']))
{
	if($row['img']=="0")
	{
		echo "<br/>Anketinizde &#351;ekil yoxdur, &#246;nce Anketinize\n";
		echo "<a href=\"foto.php?mod=photo&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ekilinizi y&#252;kleyin</a>\n";
		break;
	}

	echo "<b>&#214;z&#252;n&#252; g&#246;ster</b><br/>----<br/>\n";

	if ($handle = opendir('photos/'.$id.''))
	{
		$c = 1;
		while (false !== ($file = readdir($handle)))
		{
			if ($file != "." && $file != ".." && $file != "Thumbs.db")
			{
				$a[]=$file;
			
				$daroq = getimagesize("photos/$id/$file");
				
				$n_nam = $daroq[2];
				if($n_nam=="1"){$img_type="gif";} else if($n_nam=="2"){$img_type="jpg";} else if($n_nam=="3"){$img_type="png";}

				if(($daroq[0] > 60) || ($daroq[1] > 60))
				{
					echo "<img src=\"image.php?img=photos/$id/$file&amp;size=60\" alt=\"$site-$user.$img_type\"/>\n";
				}
				else
				{
					echo "<img src=\"photos/$id/$file\" alt=\"foto $c\"/>\n";
				}
				$c++;
			}
		}
		closedir($handle);  
		echo '<br/>';	$_v->divide();
	}

	echo "Albomunuzdak&#305; &#351;ekiller ve  mesaj&#305;n&#305;z dehlizde g&#246;r&#252;necek.<br/>----<br/>";
	echo "Xidmet deyeri <b>$b_img</b>. bal.<br/>\n"; 
	echo "<br/>Mesaj&#305;n&#305;z:<br/>\n";

	$_v->action("hesab.php?id=$id&amp;ps=$ps&amp;bolme=imgview&amp;ref=$ref");
	print $_v->input("<input name=\"mesaj$ref\" maxlength=\"1000\" title=\"Mesaj&#305;n&#305;z\" emptyok=\"true\"/>").'<br/>';
	print $_v->submit('G&#246;nder','action=save,image='.$_POST['image']);
}
else
{
	$mesaj = chkdsk($mesaj,basename(__FILE__),"&#214;z&#252;n&#252; g&#246;ster");
	if ($bal<$b_img or $b_img<=0)
	{
		echo "Bu Xidmetden istifade etmek &#252;&#231;&#252;n hesab&#305;n&#305;zdaki bal yetersizdir.<br/>\n";
		echo "----<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		echo "<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
		break;
	}


	$newbal=$bal-$b_img;
	$row['action'] = action_up($row['action'] + '0.10');
	mysql_query ("Update users set bal = '".$newbal."', `action`='".$row['action']."' where id ='".$id."'");
	$data = date("d.m.y [H:i]",$SERVER_TIME); 

	$save= fopen("file/bal_bot/14.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: (<u>$bal-$b_img=<b>$newbal</b></u>) Tarix: $data")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);
	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$b_img;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");


	$message = "<b>$user</b> - Dehlize &#350;ekil yerle&#351;dirdi... $bal - $b_img = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Dehlize &#350;ekil','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek dehlize \"<u>&#350;ekilinizi yerle&#351;dirdiz</u>\".<br/> Hesab&#305;n&#305;zda $bal - $b_img = $newbal bal qald&#305;.";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");


	for ($i=0; $i<=9; $i++){
	$today=date ("H:i",$SERVER_TIME);
	$mes = "<b>".$user."</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>";
	$rnd = rand(0,99999999);
	mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");

	}
	$rnd = rand(0,9);
	mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");

	$mesaj = narmobil($mesaj);

	$file = file("file/dat_folder/enter.dat");
	$test1= trim($file[0]);
	$test2= trim($file[1]);
	$test3= trim($file[2]);
	$test4= trim($file[3]);
	$test5= trim($file[4]);
	$test6= trim($file[5]);
	$test7= trim($file[6]);
	$reqtime = $saat*3600+$SERVER_TIME;

	$files = fopen("file/dat_folder/enter.dat", "w");
	$xfil .= "$test1\n";
	$xfil .= "$test2\n";
	$xfil .= "$test3\n";
	$xfil .= "$test4\n";
	$xfil .= "$test5\n";
	$xfil .= "$test6\n";
	$xfil .= "$test7\n";
	$xfil .= "xxxxxxx\n";
	$xfil .= "$id\n";
	$xfil .= "$user\n";
	$xfil .= "$mesaj\n";
	$xfil .= "$reqtime";
	fwrite($files, $xfil);
	fclose($files);

	echo "<b>Tebrikler</b><br/>";
	$_v->divide();
	echo "Sizin &#350;ekiliniz dehlize yerle&#351;dirildi...<br/>";
}
break;


case 'bal':
require("qiymet.php");
break;

case '21':
$bals=file("file/bal_bot/0.dat");
$antiiqnor = trim($bals[21]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($antiiqnor=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$_v->title('Anti-Iqnor');
$_v->fsize1($fsize1);


if($bal < $antiiqnor) $com = "0";

$ru = @mysql_query("select `saat`,`tarix` from `hesab` where `usid` = '".$id."' and `x` = '7' limit 1;");
if (mysql_affected_rows() != 0)
{
	$tru = @mysql_fetch_array($ru);
	$saat = $tru['saat'];


	$tkick = $saat - $SERVER_TIME;

	if($tkick < 60 && $tkick > 0)
	{
	$vaxt = "saniyye";
	}
	elseif($tkick < 3600 && $tkick > 60)
	{
	$new = $tkick;
	$tkick = $new/60;
	$vaxt = "deqiqe";
	}
	elseif($tkick < 86400 && $tkick > 3600)
	{
	$new = $tkick;
	$tkick = $new/3600;
	$vaxt = "saat";
	}
	elseif($tkick > 86400)
	{
	$new = $tkick;
	$tkick = $new/86400;
	$vaxt = "g&#252;n";
	}
	$tkick = round($tkick);

	echo "<i>Siz Anti-&#304;qnor Sistemine qo&#351;ulubsunuz.</i><br/>----<br/>\n";
	echo "&#304;stifade vaxt&#305;n&#305;n bitmesine \"<b>$tkick $vaxt</b>\" qal&#305;b.<br/>\n";
}
elseif($com!="1")
{
	echo "<b>Anti-&#304;qnor</b> Sisteminden istifade etseniz, Sizi 1 ay boyunca he&#231;kes iqnor ede bilmeyecek.<br/>\n";
	echo "Anti-&#304;qnor Sisteminden 1 ayl&#305;q istifade haqq&#305; <b>$antiiqnor</b> bal deyerindedir.<br/><br/>\n";
	print "Hesab&#305;n&#305;zda (<b>$bal</b>) Bal var<br/>";

	if($antiiqnor <= $bal)
	print "<a href=\"hesab.php?bolme=21&amp;id=$id&amp;ps=$ps&amp;com=1&amp;ref=$ref\">Sisteme qo&#351;ul</a><br/>\n";
	else
	{
		print "Bu Sistemden istifade etmek &#252;&#231;&#252;n hesab&#305;n&#305;zda kifayyet qeder bal yoxdur.<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
}
else
{
	$newbal=$bal-$antiiqnor;
	mysql_query ("Update `users` set `bal` = '".$newbal."' where `id` ='".$id."';");
	$data = date("d.m.y [H:i]",$SERVER_TIME); 

	$save= fopen("file/bal_bot/16.dat", "a+"); 
	$qeyd = "".base64_encode("<b>$user</b>: (<u>$bal-$antiiqnor=<b>$newbal</b></u>) Tarix: $data")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);
	unset($save);

	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$antiiqnor;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `acar` = '1';");

	$saat = 2592000 + $SERVER_TIME;
	mysql_query("insert into `hesab` values(0,'$user','$id','$data','$saat','7');");// hesab7 antiiqnor
					
	$message = "<b>$user</b> - Anti-&#304;qnor Sisteminden istifade etdi. $bal - $antiiqnor = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into `zapiski` values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Anti-&#304;qnor Sistemi','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Anti-&#304;qnor Sisteminden istifade etdiniz. Sizi 1 ay m&#252;ddetinde he&#231;kes iqnor ede bilmez.<br/> Hesab&#305;n&#305;zda $bal - $antiiqnor = $newbal bal qald&#305;.";
	mysql_query("insert into `zapiski` values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
	echo "<i>Siz Anti-&#304;qnor Sistemine qo&#351;uldunuz.</i><br/>\n";
}
break;

case '22':


$bals=file("file/bal_bot/0.dat");
$deling = trim($bals[22]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($deling=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


$_v->title('Del ignor');
$_v->fsize1($fsize1);

if($bal<$deling) $com = "0";

$ignorlist = "";
$sql = mysql_query("SELECT `id` FROM `ignor` WHERE `usid` = '".$id."';");
if(mysql_num_rows($sql) != 0)
{
	while($iqnor = mysql_fetch_array($sql))
	{
		$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$iqnor['id']."';");
		$ig = mysql_fetch_array($q);
		$ignore = $ig['user'];
		if($ignore!="") $ignorlist .= "<u>".$ignore."</u>, ";
	}
	$ignorlist = substr($ignorlist,0,strlen($ignorlist)-2);
}


if($com!="1")
{
	echo "Bu xidmeti aktiv etseniz herkesin iqnorundan silineceksiz.<br/>\n";
	echo "Xidmet deyeri <b>$deling</b> bal.<br/>\n";
	echo $divide;

	if(strlen($ignorlist)>="2")
	{
		echo "Hal-hazirda Sizi &#304;qnor edenler a&#351;aqdak&#305;lard&#305;r.<br/>\n";
		echo "$ignorlist<br/>\n";
	}
	else
	echo "Sizi he&#231;kes iqnor etmeyib.<br/>\n";

	echo $divide;

	if($deling<=$bal)
	{
		print "Hesab&#305;n&#305;zda (<b>$bal</b>) Bal var<br/>";
		echo $divide;
		print "<a href=\"hesab.php?bolme=22&amp;id=$id&amp;ps=$ps&amp;com=1&amp;ref=$ref\">Herkesi iqnordan &#231;&#305;xart</a><br/>\n";
	}
	else
	{
		print "<i>Sizin hesab&#305;n&#305;zda (<b>$bal</b>) bal var ve bu xidmetden istifade etmek &#252;&#231;&#252;n yeterli deyil.</i><br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
}
else
{

	if(strlen($ignorlist)<="1")
	{
		echo "<u>Sizi he&#231;kes iqnor etmeyib.</u><br/>\n";
	}
	else
	{
		$newbal=$bal-$deling;
		mysql_query ("Update `users` set `bal` = '".$newbal."' where `id` ='".$id."';");
		$data = date("d.m.y [H:i]",$SERVER_TIME); 

		$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
		$mp = mysql_fetch_array ($xerc);
		$satish=$mp["xerc"];
		$satish=$satish+$deling;
		mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4` = '1';");

		$message = "<b>$user</b> - onu iqnor edenleri le&#287;v etdi. $bal - $deling = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
		mysql_query("insert into `zapiski` values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Iqnorun temizlenmesi','".$data."','1','1');");

		$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Bal xidmetlerinden istifade ederek Sizi iqnor edenleri le&#287;v etdiniz.<br/> Hesab&#305;n&#305;zda $bal - $deling = $newbal bal qald&#305;.";
		mysql_query("insert into `zapiski` values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
		mysql_query("delete FROM `ignor` WHERE `usid` = '".$id."';");

		echo "<i>Sizi iqnor edenleri le&#287;v etdiniz.</i><br/>\n";
	}
}
break;


case '23':

$bals=file("file/bal_bot/0.dat");
$gold_user = trim($bals[23]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($gold_user=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$_v->title('Gold User');
$_v->fsize1($fsize1);

$goldusers = mysql_query("select `saat` from `hesab` where `usid` = '".$id."' and `x` = '8';");
if (mysql_affected_rows() != 0)
{
	$tru = @mysql_fetch_array($goldusers);
	$saat = $tru['saat'];
	$tkick = $saat - $SERVER_TIME;

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

	echo "H&#246;rmetli $user Siz Gold User-siz bu b&#246;lmeye Gold User olmayan istifadeciler gire biler.<br/>\n";
	echo $divide;
	echo "&#304;stifade vaxt&#305;n&#305;n bitmesine \"<b>$tkick $vaxt</b>\" qal&#305;b.<br/>\n";
	break;
}

if($bal<$gold_user) $com = '0';


if($z=='')
{
	echo "\"<b>Gold User</b>\" Sizin herkesden ferqenmeniz &#252;&#231;&#252;nd&#252;r.<br/>\n";
	echo "Eger Sizde herkesden ferqlenmek isteyirsizse, a&#351;aqdak&#305; znaklardan birini al&#305;n ve <u>Gold User</u> olun!<br/>\n";
	echo "1 ayl&#305;q istifade haqq&#305; <b>$gold_user</b> bal deyerindedir.<br/>\n";
	echo $divide;

	if($gold_user<=$bal)
	{
		print "Hesab&#305;n&#305;zda (<b>$bal</b>) Bal var<br/>";
	}
	else
	{
		print "Sizin hesab&#305;n&#305;zda (<b>$bal</b>) bal var ve bu xidmetden istifade etmek &#252;&#231;&#252;n yeterli deyil.<br/>\n";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
	echo $divide;

	$smiles = array(
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=1&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=2&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=3&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=4&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=5&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=6&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=7&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=8&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=9&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=10&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=11&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=12&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=13&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=14&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=15&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=16&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=17&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=18&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=19&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=20&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=21&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=22&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=23&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=24&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=25&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=26&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=27&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=28&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=29&amp;ref=$ref\">se&#231;</a>",
	"<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;z=30&amp;ref=$ref\">se&#231;</a>");
	$replaces = array(
	"<img src=\"img/znak/1.gif\" alt=\"1\"/>",
	"<img src=\"img/znak/2.gif\" alt=\"2\"/>",
	"<img src=\"img/znak/3.gif\" alt=\"3\"/>",
	"<img src=\"img/znak/4.gif\" alt=\"4\"/>",
	"<img src=\"img/znak/5.gif\" alt=\"5\"/>",
	"<img src=\"img/znak/6.gif\" alt=\"6\"/>",
	"<img src=\"img/znak/7.gif\" alt=\"7\"/>",
	"<img src=\"img/znak/8.gif\" alt=\"8\"/>",
	"<img src=\"img/znak/9.gif\" alt=\"9\"/>",
	"<img src=\"img/znak/10.gif\" alt=\"10\"/>",
	"<img src=\"img/znak/11.gif\" alt=\"11\"/>",
	"<img src=\"img/znak/12.gif\" alt=\"12\"/>",
	"<img src=\"img/znak/13.gif\" alt=\"13\"/>",
	"<img src=\"img/znak/14.gif\" alt=\"14\"/>",
	"<img src=\"img/znak/15.gif\" alt=\"15\"/>",
	"<img src=\"img/znak/16.gif\" alt=\"16\"/>",
	"<img src=\"img/znak/17.gif\" alt=\"17\"/>",
	"<img src=\"img/znak/18.gif\" alt=\"18\"/>",
	"<img src=\"img/znak/19.gif\" alt=\"19\"/>",
	"<img src=\"img/znak/20.gif\" alt=\"20\"/>",
	"<img src=\"img/znak/21.gif\" alt=\"21\"/>",
	"<img src=\"img/znak/22.gif\" alt=\"22\"/>",
	"<img src=\"img/znak/23.gif\" alt=\"23\"/>",
	"<img src=\"img/znak/24.gif\" alt=\"24\"/>",
	"<img src=\"img/znak/25.gif\" alt=\"25\"/>",
	"<img src=\"img/znak/26.gif\" alt=\"26\"/>",
	"<img src=\"img/znak/27.gif\" alt=\"27\"/>",
	"<img src=\"img/znak/28.gif\" alt=\"28\"/>",
	"<img src=\"img/znak/29.gif\" alt=\"29\"/>",
	"<img src=\"img/znak/30.gif\" alt=\"30\"/>");

	if(!isset($s))$s=0;
	if($s>25)$s = 25;
	if($s<1)$s = 0;
	$max=count($smiles);
	$stmax=round(($max/5)+0.45);
	$stn=($s/5)+1;
	echo "Sehife. $stn  / $stmax<br/>\n";
	$do=$s+5;
	for($i=$s;$i<$do;$i++)
	{
		if($i==$max)break;
		echo "$replaces[$i] $smiles[$i]<br/>\n";
		echo "----<br/>\n";
	}
	$next=$i;
	$prev=$s-5;
	if($i>5)echo "<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;$ref\">&lt;&lt;&lt;</a> | \n";
	if($i<$max)echo "<a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;$ref\">&gt;&gt;&gt;</a>\n";
	
	
	echo "<br/>\n";
}
elseif($z>=1 and $z<=30 and $gold_user<=$bal)
{
	echo "<b>Tebrikler</b><br/>\n";
	echo $divide;
	echo "H&#246;rmetli \"<img src=\"img/znak/$z.gif\" alt=\"$z\"/><b>$user</b>\" Siz art&#305;q \"<b>Gold User</b>\" oldunuz!<br/>\n";

	$newbal=$bal-$gold_user;
	$son  = "Update `users` set `bal` = '".$newbal."', `zn` = 'nak/".$z."' where `id` ='".$id."';";
	mysql_query ($son);
	$data = date("d.m.y [H:i]",$SERVER_TIME); 

	$save= fopen("file/bal_bot/17.dat", "a+"); 
	$qeyd = "".base64_encode("<img src=\"img/znak/$z.gif\" alt=\"$z\"/><b>$user</b>: (<u>$bal-$gold_user=<b>$newbal</b></u>) Tarix: $data")."\n";
	@fwrite($save, "$qeyd");
	@fflush($save);
	@fclose($save);

	$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
	$mp = mysql_fetch_array ($xerc);
	$satish=$mp["xerc"];
	$satish=$satish+$gold_user;
	mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';");
	$saat = 2592000 + $SERVER_TIME;
	mysql_query("insert into `hesab` values(0,'$user','$id','$data','$saat','8');");//hesab8

	$message = "<img src=\"img/znak/$z.gif\" alt=\"$z\"/><b>$user</b> - <b>Gold User</b> oldu... $bal - $gold_user = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
	mysql_query("insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Gold User','".$data."','1','1');");

	$istifadeci = "H&#246;rmetli <img src=\"img/znak/$z.gif\" alt=\"$z\"/><b>$user</b>. Siz Bal Xidmetinden istifade ederek \"<b>Gold User</b>\" oldunuz.<br/> Hesab&#305;n&#305;zda $bal - $gold_user = $newbal bal qald&#305;.";
	mysql_query("insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");

	for ($i=0; $i<=9; $i++)
	{
		$rnd = rand(0,99999999);
		$today=date ("H:i",$SERVER_TIME);
		$mes = "<img src=\"img/znak/$z.gif\" alt=\"$z\"/><b>".$user."</b>, - <b>Gold User</b> oldu. Tebrikler!";
		mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
	}
	$rnd = rand(0,9);
	mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '".$rnd."' WHERE `id` = '10';");
}
else
{
	print "<i>Sizin hesab&#305;n&#305;zda (<b>$bal</b>) bal var ve bu xidmetden istifade etmek &#252;&#231;&#252;n yeterli deyil.</i><br/>\n";
	echo $divide;
	echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
}
break;




case '24':



$bals=file("file/bal_bot/0.dat");
$nikduzelt = trim($bals[24]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
unset($bals);

if($nikduzelt=="x"){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Bele xidmet yoxdur<br/>\n";
$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

if(file_exists("i/".$id.".gif"))
{
	$adminnick = mysql_query("SELECT * FROM `c_nick` WHERE `to` = '".$id."';");
	if (mysql_affected_rows() != 0)
	{
		$_v->title('Diqqet');
		$_v->fsize1($fsize1);

		echo $fsize1;
		$colornick = @mysql_fetch_array($adminnick);
		$time = $colornick['time'];

		$tkick = $time - $SERVER_TIME;

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

		echo "<u>Rengli nickiniz var ve aktivdir</u>:<br/>Nickin g&#246;r&#252;nt&#252;s&#252;: <img src=\"i/$id.gif\" alt=\"$user\" /><br/>";
		echo "<i>Nickin vaxt&#305;n&#305;n tamam olmas&#305;na <b>$tkick $vaxt</b> qal&#305;b</i>...<br/>\n";
		echo $divide;
		echo "Rengli nikinizin vaxti bitdikden sonra bu xidmetden istifade ede bilersiz.<br/>";
		break;
	}
}


$_v->title('Rengli Nik D&#252;zelt');
$_v->fsize1($fsize1);

if(!isset($_POST['rn_a']))
{
	$q = mysql_query("select `saat`,`tarix` from `hesab` where `usid` = '$id' and `x` = '9' ;");
	if (mysql_affected_rows() != 0)
	{
		$arr = mysql_fetch_array($q);
		$saat = $arr['saat'];
		$tarix = $arr['tarix'];


		$tkick = $saat - $SERVER_TIME;

		if($tkick < 60 && $tkick > 0)
		{
		$vaxt = "saniyye";
		}
		elseif($tkick < 3600 && $tkick > 60)
		{
		$new = $tkick;
		$tkick = $new/60;
		$vaxt = "deqiqe";
		}
		elseif($tkick < 86400 && $tkick > 3600)
		{
		$new = $tkick;
		$tkick = $new/3600;
		$vaxt = "saat";
		}
		elseif($tkick > 86400)
		{
		$new = $tkick;
		$tkick = $new/86400;
		$vaxt = "g&#252;n";
		}
		$tkick = round($tkick);

		if($tarix==1)
		{
			echo "Siz funksiyan&#305; aktiv etmisiniz ve \"<u>$tkick $vaxt erzinde</u>\" &#304;stediyiniz zaman &#246;z&#252;n&#252;ze rengli nik d&#252;zelde ve deaktiv ede bilersiz buna g&#246;re hesab&#305;n&#305;zdan bal &#231;&#305;x&#305;lmayacaq.<br/>\n";
			echo "Hal-haz&#305;rda Rengli nickiniz aktivdir.\n";
			echo "<img src=\"i/$id.gif?$ref\" alt=\"G&#246;r&#252;nt&#252;\"/><br/>\n";
		}
		else
		{
			echo "Rengli nik funksiyan&#305;z Deaktivdir aktivle&#351;dirmek &#252;&#231;&#252; balans&#305;n&#305;zdan bal c&#305;x&#305;lmayacaq.<br/>\n";
			echo "\"<u>$tkick $vaxt</u>\" erzinde bu xidmetden bals&#305;z istifade ede bilersiz.<br/>\n";
		}
	}
	else
	{
		echo "Rengli nik funksiyas&#305;n&#305; Aktiv etdikde \"<b>$nikduzelt bal</b>\" balans&#305;n&#305;zdan &#231;&#305;x&#305;l&#305;r.<br/>\n";
		echo "Daha sonra \"<b>30 g&#252;n</b>\" erzinde limitsiz olaraq rengli nik d&#252;zelde, rengini deyi&#351;e ve  Aktiv - Deaktiv ede bilirsiniz.<br/>\n";

		if($nikduzelt > $bal)
		{
			print "Sizin hesab&#305;n&#305;zda (<b>$bal</b>) bal var ve bu xidmetden istifade etmek &#252;&#231;&#252;n yeterli deyil.<br/>\n";
			echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		}
	}
	echo $divide;
	$_v->action("hesab.php?bolme=24&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

	echo "Fonun rengi: ";
	print $_v->select("<select name=\"font_color$ref\">|<option value=\"01\">A&#287;</option>|<option value=\"02\">Cehray&#305;</option>|<option value=\"03\">Q&#305;rm&#305;z&#305;</option>|<option value=\"04\">Sar&#305;</option>|<option value=\"05\">Nar&#305;nc&#305;</option>|<option value=\"06\">A&#231;&#305;q Mavi</option>|<option value=\"07\">T&#252;nd Mavi</option>|<option value=\"08\">Ben&#246;v&#351;eyi</option>|<option value=\"09\">Ac&#305;q g&#246;y</option>|<option value=\"10\">T&#252;nd g&#246;y</option>|<option value=\"11\">A&#231;&#305;q ya&#351;&#305;l</option>|<option value=\"12\">T&#252;nd ya&#351;&#305;l</option>|<option value=\"13\">Qehveyi</option>|<option value=\"14\">Boz (75%)</option>|<option value=\"15\">Boz (50%)</option>|<option value=\"16\">Boz (25%)</option>|<option value=\"17\">Qara</option>|</select>",'null').'<br/>';

	echo "Herflerin rengi: ";
	print $_v->select("<select name=\"text_color$ref\">|<option value=\"01\">A&#287;</option><option value=\"02\">Cehray&#305;</option>|<option value=\"03\">Q&#305;rm&#305;z&#305;</option>|<option value=\"04\">Sar&#305;</option>|<option value=\"05\">Nar&#305;nc&#305;</option>|<option value=\"06\">A&#231;&#305;q Mavi</option>|<option value=\"07\">T&#252;nd Mavi</option>|<option value=\"08\">Ben&#246;v&#351;eyi</option>|<option value=\"09\">A&#231;&#305;q g&#246;y</option>|<option value=\"10\">T&#252;nd g&#246;y</option>|<option value=\"11\">A&#231;&#305;q ya&#351;&#305;l</option>|<option value=\"12\">T&#252;nd ya&#351;&#305;l</option>|<option value=\"13\">Qehveyi</option>|<option value=\"14\">Boz (75%)</option>|<option value=\"15\">Boz (50%)</option>|<option value=\"16\">Boz (25%)</option>|<option value=\"17\">Qara</option>|</select>",'null').'<br/>';

	echo "Aktivlik:<br/>\n";
	print $_v->select("<select name=\"rn_a$ref\" value=\"1\">|<option value=\"0\">Deaktiv et</option>|<option value=\"1\">Aktiv et</option></select>",'null').'<br/>';
	print $_v->submit('Elave et');
}
else
{
	$q = mysql_query("select `tarix` from `hesab` where `usid` = '$id' and `x` = '9' ;");
	if (mysql_affected_rows() != 0)
	{
		$arr = mysql_fetch_array($q);
		$tarix = $arr['tarix'];
	}
	$font_color = $_POST['font_color'];
	$text_color = $_POST['text_color'];
	$rn_a = $_POST['rn_a'];
	$ccc_time_new=$SERVER_TIME+2592000;

	if($bal < $nikduzelt and $tarix=='')
	{
		echo "Rengli nik d&#252;zeltmek &#252;&#231;&#252;n Hesab&#305;n&#305;zda  \"<b>$nikduzelt</b>\" bal olmal&#305;d&#305;r.<br/>\n";
		echo "Sizin Hesab&#305;n&#305;zda \"<b>$bal</b>\" bal var<br/>\n";
		echo $divide;
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
	else
	{
		if($tarix=='')
		{
			$newbal=$bal-$nikduzelt;
			mysql_query("UPDATE `users` SET `bal` = '".$newbal."' WHERE `id` = '".$id."';");
			$saat = 2592000 + $SERVER_TIME;
			mysql_query("insert into `hesab` values(0,'$user','$id','$rn_a','$saat','9');");

			$data = date("d.m.y [H:i]",$SERVER_TIME); 

			$save= fopen("file/bal_bot/18.dat", "a+"); 
			$qeyd = "".base64_encode("<b>$user</b>: (<u>$bal-$nikduzelt=<b>$newbal</b></u>) Tarix: $data")."\n";
			@fwrite($save, "$qeyd");
			@fflush($save);
			@fclose($save);
			unset($save);

			$xerc = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
			$mp = mysql_fetch_array ($xerc);
			$satish=$mp["xerc"];
			$satish=$satish+$nikduzelt;
			mysql_query("UPDATE `setting` SET `xerc` = '".$satish."' where `acar` = '1';");
							
			$message = "<b>$user</b> - Rengli nik d&#252;zeltme Sisteminden istifade etdi. $bal - $nikduzelt = $newbal bal qald&#305;.<br/> Bankda <b>$satish</b> bal var...";
			mysql_query("insert into `zapiski` values(0,'".$b_user."','0','".$message."','','1','".$SERVER_TIME."','0','Rengli nik d&#252;zeltme','".$data."','1','1');");

			$istifadeci = "H&#246;rmetli <b>$user</b>. Siz Rengli nik d&#252;zeltme Sisteminden istifade etdiniz. Siz 1 ay m&#252;ddetinde istediyiniz qeder nikinizin rengini deyi&#351;e bilersiniz hem&#231;ini istediyiniz vaxt rengli nikinizi deaktiv ve ya aktiv ede bilersiz.<br/> Hesab&#305;n&#305;zda $bal - $nikduzelt = $newbal bal qald&#305;.";
			mysql_query("insert into `zapiski` values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".$SERVER_TIME."','0','Melumat','".$data."','1','1');");
			echo "<i>Tebrikler 1 ayl&#305;q sistemden istifade haqq&#305;n&#305;z var.</i><br/>\n";
		}
		else
		{
			mysql_query("UPDATE `hesab` SET `tarix` = '".$rn_a."' WHERE `usid` = '".$id."' and `x` = '9';");
		}

		if($rn_a==1)
		{
			$file = "http://$site_url_2/color.php?id=".$id."&font=$font_color&color=$text_color";
			$newfile = "i/".$id.".gif";
			@unlink ($newfile);

			if (copy($file , $newfile))
			{
				echo "<img src=\"color.php?id=".$id."&amp;font=$font_color&amp;color=$text_color\" alt=\"Rengli nick\"/><br/>\n";
				echo "Rengli nickiniz aktiv olundu.<br/>\n";
			}
			else
			echo "Xeta ba&#351; verdi tekrar yoxlay&#305;n yene xeta ba&#351; vererse Rehberliye m&#252;raciet edin.<br/>";
			
		}
		else
		{
			echo "Rengli nickiniz deaktiv olundu.<br/>\n";
			echo $divide;
			@unlink ("i/".$id.".gif");
		}
		print "<a href=\"hesab.php?bolme=24&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
	}
}
break;


default:
$_v->title('Bal Xidmetleri');
$_v->fsize1($fsize1);
$sto = file("file/dat_folder/n_n/znaknihad_niko.dat");
$znak1 = trim($sto[0]);
$znak6 = trim($sto[5]);
$rpos = file("file/dat_folder/n_n/uzunnick.dat");
$niko_d = trim($rpos[1]);
$bonus = trim($rpos[2]);
$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaric1 = trim($xx1[0]);
$xaric4 = trim($xx1[3]);
$xaricc = trim($xx1[4]);
$nn = file("file/dat_folder/n_n/infostat.dat");
$nikobal = trim($nn[0]);
$bals=file("file/bal_bot/0.dat");
$r_nik_1 = trim($bals[2]);
$r_nik_2 = trim($bals[3]);
$send_bal = trim($bals[4]);
$leqeb_d = trim($bals[5]);
$status_d = trim($bals[6]);
$vip_al = trim($bals[7]);
$killer_al = trim($bals[8]);
$gorunmez_al = trim($bals[9]);
$t_elan = trim($bals[10]);
$tox_b = trim($bals[11]);
$r_yazi = trim($bals[12]);
$aile_b = trim($bals[13]);
$b_ban = trim($bals[14]);
$b_mex = trim($bals[15]);
$b_img = trim($bals[16]);
//$qefes_ses = trim($bals[17]);
//$reytinq_ses = trim($bals[18]);
//$t_bax = trim($bals[19]);
//$qefes_blet = trim($bals[20]);
$antiiqnor = trim($bals[21]);
$deling = trim($bals[22]);
$znak = trim($bals[23]);
$nikduzelt = trim($bals[24]);
unset($bals);

$inv = $row['inv'];
$tox = $row['tox'];
$yazi = $row['shrift'];
$para = $row['para'];
$mexvi = $row['mexvi'];

print "<b><u>Bal xidmetleri</u></b><br/>----<br/>";


print "Hesab&#305;n&#305;zda (<b>$bal</b>) Bal var<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";


$_v->divide();
echo "<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Exchange</a> (Post,Cavab)<br/>\n";

$rpos = file("file/dat_folder/parol_buga.dat");
$bal1 = trim($rpos[0]);
$parol = trim($rpos[1]);
$cixilan = $bal1;
if ($parol == 1) {
print "<a href=\"security_bal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">2-ci Parol al</a> ($cixilan bal)<br/>";
}


print "<a href=\"hesab.php?bolme=infostat&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Anketine status yaz</b></a> ($nikobal bal)<br/>";
if($bonus!="0")print "<a href=\"hesab.php?bolme=nihadnik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Uzun Nick D&#252;zelt</b></a> ($niko_d bal)<br/>";
print "<a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>R&#252;tbelerin Sat&#305;&#351;&#305;</b></a><br/>";
echo  "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Rengli Nick AL</b></a><br/>\n";
$_v->divide();
if($t_elan!="x")print "<a href=\"hesab.php?bolme=elan&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tebrik Elan Yerle&#351;dir</a> ($t_elan bal)<br/>";
if($deling!="x")print "<a href=\"hesab.php?bolme=22&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Herkesi &#304;qnordan &#231;&#305;xartmaq</a> ($deling bal)<br/>";
if($antiiqnor!="x")print "<a href=\"hesab.php?bolme=21&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-&#304;qnor Sistemi</a> ($antiiqnor bal)<br/>";
print "<b><a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Znak Al</a></b> ($znak1 - $znak6 bal)<br/>\n";

if($znak!="x")print "<b><a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Gold User</a></b> ($znak bal)<br/>";
if($nikduzelt!="x")print "<a href=\"hesab.php?bolme=24&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Nik D&#252;zelt</a> ($nikduzelt bal)<br/>";
print "<a href=\"hesab.php?bolme=nik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Nik Sifari&#351; Et</a> ($r_nik_1-$r_nik_2 bal)<br/>";
if($send_bal!="x")print "<a href=\"hesab.php?bolme=sendbal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dostuna Bal G&#246;nder</a> ($send_bal%)<br/>";
if($leqeb_d!="x")print "<a href=\"hesab.php?bolme=yeninik&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;</a> ($leqeb_d bal)<br/>";
if($status_d!="x")print "<a href=\"hesab.php?bolme=status&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Statusu Deyi&#351;</a> ($status_d bal)<br/>";




if($vip_al!="x"){
$levelselect = @mysql_query ("Select name from levels where level='4'");
$levels = @mysql_fetch_array($levelselect);
$vips = $levels["name"];
print "<a href=\"hesab.php?bolme=vip&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$vips R&#252;tbe Al</a> ($vip_al bal)<br/>";
}
if($killer_al!="x"){
$levelselect = @mysql_query ("Select name from levels where level='5'");
$levels = @mysql_fetch_array($levelselect);
$killers = $levels["name"];
print "<a href=\"hesab.php?bolme=killer&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$killers R&#252;tbe Al</a> ($killer_al bal)<br/>";
}




if($xaricc!="0"){
print "<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;atdan Xaric et</a> ($xaric1-$xaric4 bal)<br/>";
}
if($gorunmez_al!="x"){
if ($inv==0) print "<a href=\"hesab.php?bolme=gorunmez&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Niki G&#246;r&#252;nmez et</a> ($gorunmez_al bal)<br/>";
else  print "<a href=\"hesab.php?bolme=gorunmez&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">G&#246;r&#252;nmezliyi le&#287;v et</a> (<b>0 bal</b>)<br/>";
}
if($tox_b!="x"){
if ($tox==0) print "<a href=\"hesab.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Toxunulmazl&#305;q </a> ($tox_b bal)<br/>";
else  print "<a href=\"hesab.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Toxunulmazl&#305;q&#305; le&#287;v et</a> (<b>0 bal</b>)<br/>";
}
if($r_yazi!="x"){
if ($yazi=="") print "<a href=\"hesab.php?bolme=color&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Yaz&#305;</a> ($r_yazi bal)<br/>";
else  print "<a href=\"hesab.php?bolme=color&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Yaz&#305;n&#305; le&#287;v et</a> (<b>0 bal</b>)<br/>";
}
if($aile_b!="x"){
if ($para=="") print "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;atdan Evlenmek</a> ($aile_b bal)<br/>";
else  print "<a href=\"hesab.php?bolme=kebin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ayr&#305;lmaq (Bo&#351;anmaq)</a> (<b>0 bal</b>)<br/>";
}
if($b_ban!="x")
print "<a href=\"hesab.php?bolme=ban&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ban Edilmi&#351; Leqebi a&#231;maq</a> ($b_ban bal)<br/>";

if($b_mex!="x"){
if ($mexvi=="0") print "<a href=\"hesab.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tam Mexvi &#304;stifade&#231;i</a> ($b_mex bal)<br/>";
else  print "<a href=\"hesab.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tam Mexviliyi le&#287;v et</a> (<b>0 bal</b>)<br/>";
}
if($b_img!="x")
print "<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#214;z&#252;n&#252; g&#246;ster (Dehlizde)</a> ($b_img bal)<br/>";
break;
}

$_v->divide();
if($bolme)print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>