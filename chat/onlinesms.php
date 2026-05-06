<?php
$SCRIPT_NAME = basename($_SERVER['SCRIPT_NAME']);
$r_k="";
if(preg_match("/windows|android|opera|iphone|ipad|ipod|safari|chrome|ucweb|ucbrowser/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
$r_k="ok";
}


if($SCRIPT_NAME!='onlinesms.php')
{
$ref=rand(10000,1000000);
$idpass = "ref=$ref";
$balsms = $levelsms = NULL;

	if($row['id']!='')
	{
		$idpass = "id=$id&amp;ps=$ps&amp;ref=$ref";
	}

	echo '<a href="onlinesms.php?'.$idpass.'">Online SMS</a>: ';
	$a = mysql_query("SELECT `id`,`usid`,`user`,`mesaj`,`reng`,`sms_foto` FROM `onlinesms` WHERE `key` = '0' order BY `id` DESC LIMIT 1;");
	if (mysql_affected_rows() == 0)
	{
		print 'En Xoş Arzularla.<br/>';
	}
	else
	{
		$sms = mysql_fetch_array($a);
		$reng = $sms['reng'];
		$mesaj= $sms['mesaj'];
		$sms_foto= $sms['sms_foto'];//sekil kodu
		if($row['id']!='')
		{
			if($r_k=="ok" and $reng){$mesaj = "<span style=\"color: $reng\">$mesaj</span>";}
			$usms = mysql_fetch_array(mysql_query ("select count(id) as num from online_sms_beyen where uid ='".$sms['id']."';"));
			$like = $usms["num"];
			$beyen = "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=6&amp;uid=".$sms['id']."&amp;ref=$ref\">Beyen</a> <img src=\"img/l.png\" alt=\".\"/> <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=".$sms['id']."&amp;ref=$ref\">".$like."</a>";
			$sqleh = mysql_fetch_array(mysql_query("select count(`id`) as `num` from `online_sms_fikir` where `uid` = '".$sms['id']."'"));
			$fik = "($beyen &#8226; <a href=\"onlinesms.php?b=5&amp;id=$id&amp;ps=$ps&amp;uid=".$sms['id']."&amp;ref=$ref\">Fikir-$sqleh[num]</a> <img src=\"img/comment.png\" alt=\".\"/>)";
			//echo "$mesaj ".$fik;
			//sekil kodu
if($sms_foto=="") {
echo "$mesaj ".$fik." $yazan";
} else{
$style = "style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\"";
$sms_v2 = "<img $style src=\"image.php?img=sms_foto/$sms[sms_foto]&amp;size=75\" alt=\"Foto\"/><a href=\"images.php?img=sms_foto/$sms_foto\">Y&#252;kle</a><br/>";
 echo "".$sms_v2."<br/>&#350;ekil Haqqinda: ".$mesaj."<br/>".$fik."";
}		
//son	
print ' <u>İmza</u>: <a href="info.php?'.$idpass.'&amp;nk='.$sms['usid'].'">'.$sms['user'].'</a>';
			if($row['level']>=8)echo " -<a href=\"onlinesms.php?b=4&amp;id=$id&amp;ps=$ps&amp;uid=".$sms['id']."&amp;ref=$ref\">[x]</a>";
		}
		else
		{
			print $sms["mesaj"];
		}
		print '<br/>';
	}
}
else if($id=='')
{
	include ('inc.php');
	$link = connect_db();
	$_v->title('Online SMS');
	
	$end_page = '0';
	if(!$smsbal_1)
	{
		print '$$smsbal_1 emri inc.php de yoxdur.<br/>';
		if($SCRIPT_NAME=='onlinesms.php')
		print '----<br/>';
		$end_page = '1';
	}

	if(empty($A_OPERA) and $end_page == '0')
	{
		print 'Script Yenilenmelidi ve ya orjinal Auto chat deyil.';
		$end_page = '1';
	}

	if($b=='1' and $end_page == '0')
	{
		$_v->fsize1('small');
		$_v->html('<center>');
		echo 'Online SMS yazmaq üçün qeydiyyatdan keçmek lazımdır.<br/>----<br/><a href="reghelp.php?ref='.$ref.'">Qeydiyyat</a><br/>';
		$_v->html('</center>');
		$_v->divide();
		$_v->fsize2('small');
		$end_page = '1';
	}
	else if($end_page == '0')
	{
		$idpass = "ref=".rand(99999,999999999);
		////////////////////////////////////////////////////////////////////////////////////////////////
		$_v->fsize1('small');
		echo "<img src=\"img/online_sms.gif\" alt=\"xett\"/><br/><br/>\n";
		echo "<a href=\"onlinesms.php?b=1&amp;$idpass\">Yaz</a> |\n";
		echo "<a href=\"onlinesms.php?$idpass\">Yenile</a><br/>\n";
		echo "<img src=\"img/line_o.gif\" alt=\".\"/><br/>\n";

		$row['level'] = $row['posts'] = '9999999999999999999';
		$a = mysql_query("select `id`,`user`,`mesaj`,`time`,`key` from `onlinesms` order by `id` desc limit 0,12;")or die (mysql_error());
		while($arr=mysql_fetch_array($a))
		{
			$msg=$arr["mesaj"];
			if($levelsms>=$slevel and $arr['key']!='0')
			{
				echo " <u>".$arr['user']."</u> ".date('H:i',$arr["time"])."&#187; ";   
				print $msg;
				echo "<br/>\n";
				echo "<img src=\"img/line_o.gif\" alt=\".\"/><br/>\n";
			}
			elseif($arr['key']=='0')
			{
				echo " <u>".$arr['user']."</u> ".date('H:i',$arr["time"])."&#187; ";   
				echo $msg;
				echo "<br/>\n";
				echo "<img src=\"img/line_o.gif\" alt=\".\"/><br/>\n";
			}
		}
		echo "<br/>\n";
		$_v->fsize2('small');
		////////////////////////////////////////////////////////////////////////////////////////////////
	}

$_v->fsize1('small');
if($b!='')echo "<a href=\"onlinesms.php?$idpass\">Geri Qayıt</a><br/>\n";
if(isset($id))
echo "<a href=\"enter.php?$idpass\">Dehliz</a><br/>\n";
else
echo "<a href=\"http://$site_url_2/?$ref\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
}
else
{
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

//printe($_POST);
function cc_tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 $cc_time2";
$time_p[0]=date("j n Y", $time);
$time_p[1]=date("H:i", $time);
$ccvaxt=(time()-$time);
$cc_s = $ccvaxt/ 3600;
$cc_saat_tam = strtok($cc_s,'.');
$cc_saat_san = $cc_saat_tam * 3600;
$cc_d = $ccvaxt / 60;
$cc_dq_tam =strtok($cc_d,'.');
$cc_deqiqe_san = $cc_dq_tam * 60;
$cc_deqiqe_hesab = ($ccvaxt - $cc_saat_san) / 60;
$cc_deqiqe = strtok($cc_deqiqe_hesab,'.');
$cc_saniye = $ccvaxt - $cc_deqiqe_san;
if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye==0))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<60))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "$cc_time2";
else $cc_muddet = "$cc_time2";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;nen $time_p[1]";}else{
$w[1]="Bazar ertesi";
$w[2]="&#199;er&#351;enme Ax&#351;am&#305;";
$w[3]="&#199;er&#351;enbe";
$w[4]="C&#252;me Ax&#351;am&#305;";
$w[5]="C&#252;me";
$w[6]="&#350;enbe";
$w[7]="Bazar";
$hefte=date("w",$time);
if($w[$hefte]!=""){
$cc_time2="".date("H:i", $time)."";
$cc_time="".$w[$hefte]." $cc_time2";
}else{
$cc_time=str_replace("Jan","Yanvar",$cc_time);
$cc_time=str_replace("Feb","Fevral",$cc_time);
$cc_time=str_replace("Mar","Mart",$cc_time);
$cc_time=str_replace("May","May",$cc_time);
$cc_time=str_replace("Apr","Aprel",$cc_time);
$cc_time=str_replace("Jun","Iyun",$cc_time);
$cc_time=str_replace("Jul","Iyul",$cc_time);
$cc_time=str_replace("Aug","Avqust",$cc_time);
$cc_time=str_replace("Sep","Sentyabr",$cc_time);
$cc_time=str_replace("Oct","Oktyabr",$cc_time);
$cc_time=str_replace("Nov","Noyabr",$cc_time);
$cc_time=str_replace("Dec","Dekabr",$cc_time);
}}}
return $cc_time;
}

$us=$row["user"];
$bal = $row['bal'];
$smset = $row["smiles"];
$posts = $row["posts"];
$level = $row["level"];

if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
$sts = file("file/dat_folder/online_sms.dat");
$mbal = str_replace("-", "", (int)trim($sts[0]));
$muellif = trim($sts[1]);
$beyen_b = trim($sts[2]);
$novu = trim($sts[3]);
$fikir_b = trim($sts[4]);
$fikirnovu = trim($sts[5]);
$metn = trim($sts[6]);
$qalin = trim($sts[7]);
$xetli = trim($sts[8]);
$kursiv = trim($sts[9]);
$sek_bal = trim($sts[10]);
$vaxtsms = trim($sts[11]);

$b = trim($_GET['b']);
if (!ctype_digit($mbal) or $mbal==0)
$mbal = 1;

switch ($b) {
default:
$_v->title('Online SMS','center');
$_v->fsize1($fsize1);
echo "<img src=\"img/online_sms.gif\" alt=\"Online SMS\"/>";
$_v->html('<br/><br/>');
$_v->align('left');

echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=1&amp;ref=$ref\">Yaz</a> |\n";
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a> |\n";
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ekil Payla&#351;</a>\n";
if($row['level']>=8)echo "| <a href=\"onlinesms.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">SMS Panel</a>";
echo "<br/>\n";

if(isset($_POST['msg'])){
$msg = $_POST['msg'];

$onlinesms = mysql_fetch_object(mysql_query("SELECT `time` FROM `onlinesms` ORDER BY `id` DESC LIMIT 1;"));

if($onlinesms->time > time()-$vaxtsms)
{
	echo $divide."Online sms yeni yazilib <u>".qaliq($onlinesms->time+$vaxtsms)."</u>, gozledikden sonra yeni onlinesms yazmaq olar.<br/>\n";

}
else if ($row["bal"] < $mbal)
{
	echo $divide."Sizin <b>".$row["bal"]."</b> bal&#305;n&#305;z var. Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$mbal."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
}
elseif($msg == "")
{
	echo $divide."<b>Diqqet:</b> <u>Siz Mesaj Yazmad&#305;n&#305;z.</u><br/>\n";
}
elseif (strlen($msg) > $metn)
{
	echo $divide."<b>Diqqet:</b> <u>Mesaj <b>$metn</b> Simvoldan &#231;ox ola bilmez!</u><br/>\n";
}
elseif (strlen($msg) < 5)
{
	echo $divide."<b>Diqqet:</b> <u>Mesaj <b>5</b> Simvoldan Az Olmamal&#305;d&#305;r!</u><br/>\n";
}else{

$msg = $_POST['msg'];
if($msg!='')
{
	$msg = narmobil(chkdsk($msg,basename(__FILE__),"Online SMS-de"));
}

if ($row["level"]<5) {require("filtr.php");}
if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);
if($smset!=0){$msg = in_smile($msg,$posts);}

$shr = $_POST['shr'];
$count_bal = ($mbal>0) ? intval($mbal) : '0';
if(substr_count($shr, "3") != 0){$count_bal+=$qalin; $msg = "<b>$msg</b>";}
if(substr_count($shr, "2") != 0){$count_bal+=$xetli; $msg = "<u>$msg</u>";}
if(substr_count($shr, "1") != 0){$count_bal+=$kursiv; $msg = "<i>$msg</i>";}

$count_bal=intval($count_bal);

if($row["bal"] < $count_bal or $count_bal < 0)
{
	echo $divide;
	echo "Bu emeliyyatdan istifade etmek üçün hesabınızda minimum <b>$count_bal</b> bal olmalıdır<br/>";
	echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
	echo $divide;
	echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS</a><br/>";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit();
}

	$reng = $row["shrift"];
	$x = mysql_query("SELECT * FROM `onlinesms` WHERE `usid` = '".$id."' and `mesaj` = '".$msg."' and `reng` = '".$reng."';");
	if(mysql_num_rows($x)==0)
	{
		$row['action'] = action_up($row['action'] + '0.10');
		if($count_bal!=0) mysql_query("UPDATE `users` SET `bal` = `bal`-'".$count_bal."', `action`='".$row['action']."' WHERE `id` = '".$id."';");
		mysql_query("INSERT INTO `onlinesms` SET usid = '".$id."', user = '".$row['user']."', time = '".time()."', mesaj = '".$msg."', reng = '".$reng."';");
	}
}
}
echo $divide;
$sql = mysql_query("select `id` from `onlinesms`");
$all = mysql_num_rows($sql);

if($all == 0)
{
	echo "Online SMS yazan olmay&#305;b...<br/>";
	echo $divide;
}
else
{
	$next_id = next_id($all);
	$sql = mysql_query("SELECT * FROM `onlinesms` ORDER BY `id` DESC LIMIT $next_id[start],$next_id[max_page];");
	while($sms = mysql_fetch_array($sql))
	{
		$yoxlama = mysql_query ("SELECT `id`,`user`,`zn` FROM `users` where id = '".$sms['usid']."'");
		if (mysql_affected_rows() == 0)
		{
			$yazan = "[<u>nik silinib</u>]";
		}
		else
		{
			$inf = mysql_fetch_array ($yoxlama);
			$zn = $inf["zn"];
			$user = $inf["user"];

			if((file_exists("i/".$inf["id"].".gif")&&($row["rnikler"]==0)))
			{
				$user = "<img src=\"i/".$inf["id"].".gif\" alt=\"$user\"/>";
			}
			if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

			$yazan = $zn." <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=3&amp;nk=".$sms['usid']."&amp;ref=$ref".$refresh."\">".$user."</a>";
		}
		$reng = $sms["reng"];
		$mesaj = $sms["mesaj"];
		$sms_foto = $sms["sms_foto"];

		if($row['level']>=8)echo "<a href=\"onlinesms.php?b=4&amp;id=$id&amp;ps=$ps&amp;uid=".$sms['id']."&amp;ref=$ref\">[x]</a>-\n";
		if($r_k=="ok" and $reng){$mesaj = "<span style=\"color: $reng\">$mesaj</span>";}
		if ($smset==0)$mesaj = preg_replace("|<img[^>]+>|isU", "|smaylik|", $mesaj);
		$mesaj = str_replace($us."", "<b><u>".$us."</u></b>", $mesaj);


		$usms = mysql_fetch_array(mysql_query ("select count(id) as num from online_sms_beyen where uid ='".$sms['id']."';"));
		$like = $usms["num"];
		$beyen = "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=6&amp;uid=".$sms['id']."&amp;ref=$ref\">Beyen</a> <img src=\"img/l.png\" alt=\".\"/> <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=".$sms['id']."&amp;ref=$ref\">".$like."</a>";

		$sqleh = mysql_query("select id from online_sms_fikir where uid = '".$sms['id']."'");
		$fikir = mysql_num_rows($sqleh);
		$fik = "($beyen &#8226; <a href=\"onlinesms.php?b=5&amp;id=$id&amp;ps=$ps&amp;uid=".$sms['id']."&amp;ref=$ref\">Fikir-$fikir</a> <img src=\"img/comment.png\" alt=\".\"/>)";
if($sms_foto=="") {
echo $yazan." (".m_tarix($sms['time']).")&#xbb;\n";
}else{
echo $yazan.", &#350;ekil Payla&#351;di(".m_tarix($sms['time']).")&#xbb;<br/>\n";
$style = "style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\"";
echo "<img $style src=\"image.php?img=sms_foto/$sms_foto&amp;size=75\" alt=\"Foto\"/>";
echo " - <a href=\"images.php?img=sms_foto/$sms_foto\">Y&#252;kle</a><br/>";
}
		echo $mesaj." ".$fik."<br/>\n";
		echo $divide;
	}
	if($next_id['a'] > $next_id['max_page'])
	{
		echo page_next("onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
		echo $divide;
	}
}
break;

case '1':
$_v->title('Online SMS Yaz');
$_v->fsize1($fsize1);
$_v->action("onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref".$refresh);
echo "Mesaj: (max: $metn)<br/>\n";
print $_v->input('<input name="msg'.$ref.'" maxlength="'.$metn.'" title="Metn"/>').'<br/>';
print $_v->select('<select name="shr'.$ref.'" multiple="true"><option value="1">Kursiv(+'.$kursiv.' bal)</option><option value="2">Alt&#305; Xettli(+'.$xetli.' bal)</option><option value="3">Qalın(+'.$qalin.' bal)</option></select>','null').'<br/>';
print $_v->submit('Gönder');
if ($row['bal'] < $mbal){
$_v->wml('----<br/>');

echo "<b>Qeyd:</b> Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$mbal."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
}
$_v->wml('----<br/>');

break;



case '2':
$_v->title('Online SMS / Admin');
$_v->fsize1($fsize1);
if($row['level']<8){
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}

if(!$_POST['qiymetup']){
echo "<b>Online SMS Panel</b>:<br/>\n";
echo $divide;
echo "Online Sms yazmaq:<br/>\n";
$_v->action("onlinesms.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input size=\"2\" name=\"qiymetup$ref\" maxlength=\"2\" format=\"*N\" value=\"".$mbal."\" emptyok=\"false\"/>").'bal.<br/>';

echo "&#350;ekil Payla&#351;maq:<br/>\n";
print $_v->input("<input size=\"2\" name=\"sekil$ref\" maxlength=\"4\" format=\"*N\" value=\"".$sek_bal."\" emptyok=\"false\"/>").'bal.<br/>';

echo "Online Sms vaxt:<br/>\n";
print $_v->input("<input size=\"2\" name=\"vaxtsmsup$ref\" maxlength=\"9\" format=\"*N\" value=\"".$vaxtsms."\" emptyok=\"false\"/>").'Saniyye.<br/>';


echo "Metnin uzunl&#287;u:<br/>\n";
print $_v->input("<input size=\"3\" name=\"metnup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$metn."\" emptyok=\"false\"/>").'max.<br/>';
echo "Beyenmek:<br/>\n";
print $_v->input("<input size=\"3\" name=\"beyenup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$beyen_b."\" emptyok=\"false\"/>").' ';
print $_v->select('<select name="nov">|<option value="0">Post</option>|<option value="1">Bal</option>|</select>',$novu).'<br/>';

echo "Fikir Bildirmek:<br/>\n";

print $_v->input("<input size=\"3\" name=\"fikirup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$fikir_b."\" emptyok=\"false\"/>").' ';
print $_v->select('<select name="fikirnov">|<option value="0">Post</option>|<option value="1">Bal</option>|</select>',$fikirnovu).'<br/>';

echo "Yaz&#305; tipinin qiymeti:<br/>\n";
echo "<b>Qal&#305;n</b> ";
print $_v->input("<input size=\"3\" name=\"qalinup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$qalin."\" emptyok=\"false\"/>").'bal.<br/>';
echo "<u>Xettli</u> ";
print $_v->input("<input size=\"3\" name=\"xetliup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$xetli."\" emptyok=\"false\"/>").'bal.<br/>';
echo "<i>Kursiv</i> ";
print $_v->input("<input size=\"3\" name=\"kursivup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$kursiv."\" emptyok=\"false\"/>").'bal.<br/>';
print $_v->submit('Yenile');

echo "Sonuncu M&#252;ellif: <b>$muellif</b><br/>\n";
$_v->divide();
echo "<b>Online Delete Panel:</b><br/>\n";
$_v->html('<br/>');
echo "<a href=\"onlinesms.php?b=12&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">SMS-leri Temizle</a><br/>";
echo "<a href=\"onlinesms.php?b=13&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Fikirleri Temizle</a><br/>";
echo "<a href=\"onlinesms.php?b=14&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Beyenenleri Temizle</a><br/>";

}else{
echo "<u>Hörmetli <b>".$row['user']."</b> melumat yenilendi!</u><br/>\n";
file_put_contents('file/dat_folder/online_sms.dat',$qiymetup."\n".$row['user']."\n".$beyenup."\n".$nov."\n".$fikirup."\n".$fikirnov."\n".$metnup."\n".$qalinup."\n".$xetliup."\n".$kursivup."\n".$sekil."\n".$vaxtsmsup);
}
$_v->divide();
break;

case '3':
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
if ($nk==$id and 1!=1){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z - öz&#252;n&#252;ze yaza bilmersiniz.<br/>\n";
echo $divide;
break;
}
if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
$y0xlama = mysql_query ("SELECT id,user,stsonline,zn,mesaj,sex FROM `users` where id = '".$nk."' LIMIT 1;");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
$mesaj = $oxu["mesaj"];
$sex = $oxu["sex"];

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

$_v->title($logi.' &#252;&#231;&#252;n mesaj');
$_v->fsize1($fsize1);

mysql_query("Select * from friends where usid='".$id."' and id='".$nk."';");
$result = mysql_affected_rows();
if ($mesaj==0 or ($result == true and $mesaj==1) or $level>=8)
{
	print $_v->submit('Tam Melumat','info=open',"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;re=$ref");
	$_v->wml('----<br/>');
	echo "$zn<b>".$logi."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
	$_v->action("onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref".$refresh);
	print $_v->input("<input name=\"msg$ref\" maxlength=\"$metn\" title=\"Online SMS Fikir\"/>").'<br/>';
	print $_v->select('<select name=\"shr'.$ref.'\" multiple=\"true\">|<option value=\"1\">Kursiv(+'.$kursiv.' bal)</option>|<option value=\"2\">Alt&#305; Xettli(+'.$xetli.' bal)</option>|<option value=\"3\">Qalın(+'.$qalin.' bal)</option>|</select>','null').'<br/>';	
	//$_v->sub_val('msg'.$ref, $logi.', {msg'.$ref.'}');
$_v->sub_val('msg', $logi.', {msg}');

	print $_v->submit('Gönder');
}
$_v->wml('----<br/>');


if($row['level']>=8)
{
	if($mesaj==1)
	{
		echo "<u><b>$logi</b> yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>";
		echo $divide;
	}
	if($mesaj==2)
	{
		echo "<u><b>$logi</b> mesaj qebul etmir.</u><br/>";
		echo $divide;
	}
	break;
}
break;

case '4':
if($row['level']<=8){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}

$_v->title('Leğv oldu');
$_v->fsize1($fsize1);

mysql_query("DELETE FROM online_sms_fikir WHERE uid='".$uid."'");
mysql_query("DELETE FROM online_sms_beyen WHERE uid='".$uid."'");
mysql_query("DELETE FROM onlinesms WHERE id='".$uid."'");

echo "Online sms silindi.<br/>\n";
echo $divide;
break;
case '12':
if($row['level']<8){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
$_v->title('Temizlendi');
$_v->fsize1($fsize1);

$n = @MYSQL_QUERY("SELECT * FROM onlinesms");
WHILE($ALB = @MYSQL_FETCH_OBJECT($n))
  {

 unlink("sms_foto/".$ALB->sms_foto."");

 }
mysql_query("DELETE FROM onlinesms");
echo "Online SMS Temizlendi.<br/>\n";
echo $divide;
break;

case '13':
if($row['level']<8){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
$_v->title('Temizlendi');
$_v->fsize1($fsize1);
mysql_query("DELETE FROM online_sms_fikir");
echo "Online SMS Fikirler Temizlendi.<br/>\n";
echo $divide;
break;

case '14':
if($row['level']<8){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
$_v->title('Temizlendi');
$_v->fsize1($fsize1);
mysql_query("DELETE FROM online_sms_beyen");
echo "Online SMS Beyenenler Temizlendi.<br/>\n";
echo $divide;
break;

case '15':
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
if ($nk==$id){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z - öz&#252;n&#252;ze yaza bilmersiniz.<br/>\n";
echo $divide;
break;
}
if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
$y0xlama = mysql_query ("SELECT id,user,stsonline,zn,mesaj,sex FROM `users` where id = '".$nk."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
$mesaj = $oxu["mesaj"];
$sex = $oxu["sex"];

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

$_v->title($logi.' üçün mesaj');
$_v->fsize1($fsize1);
if(($mesaj ==0)or($level>=8))
{
	echo "Cinsi: <b>".($sex == 0 ? "Kisi" : "Qadin")."</b><br/>\n";
	print $_v->submit2('<b>Tam Melumat</b>','info=open',"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;re=$ref");

	echo $divide;
	echo "$zn<b>".$logi."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";

	$_v->action("onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;ref=$ref".$refresh);
	print $_v->input("<input name=\"msg$ref\" maxlength=\"$metn\" title=\"Online SMS Fikir\"/>").'<br/>';

	$option = "<select name=\"shr$ref\" multiple=\"true\">|";
	$option .= "<option value=\"1\">Kursiv(+$kursiv bal)</option>|";
	$option .= "<option value=\"2\">Alt&#305; Xettli(+$xetli bal)</option>|";
	$option .= "<option value=\"3\">Qalın(+$qalin bal)</option>|";
	$option .= "</select>";
	print $_v->select($option).'<br/>';
	//$_v->sub_val('msg'.$ref, $logi.', {msg'.$ref.'}');
$_v->sub_val('msg', $logi.', {msg}');
	print $_v->submit2('Gönder');

}
else
{
	if(($mesaj ==1)or($level>=8))
	{
		mysql_query ("Select * from friends where usid='".$id."' and id='".$nk."';");
		if(mysql_affected_rows() == true)
		{
			echo "$zn<b>".$logi."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
			$_v->action("onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;ref=$ref".$refresh);
			print $_v->input("<input name=\"msg$ref\" maxlength=\"$metn\" title=\"Online SMS Fikir\"/>").'<br/>';

			$option = "<select name=\"shr$ref\" multiple=\"true\">|";
			$option .= "<option value=\"1\">Kursiv(+$kursiv bal)</option>|";
			$option .= "<option value=\"2\">Alt&#305; Xettli(+$xetli bal)</option>|";
			$option .= "<option value=\"3\">Qalın(+$qalin bal)</option>|";
			$option .= "</select>";
			print $_v->select($option).'<br/>';
			//$_v->sub_val('msg'.$ref, $logi.', {msg'.$ref.'}');
$_v->sub_val('msg', $logi.', {msg}');
			print $_v->submit2('Gönder');
		}
		else
		{
			echo "<u><b>$logi</b> yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>";
		}
	}
	else
	{
		echo "<u><b>$logi</b> mesaj qebul etmir.</u><br/>";
	}
}

if($row['level']>=8){
if($mesaj==1){
echo $divide;
echo "<u><b>$logi</b> yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>";
}
if($mesaj==2){
echo $divide;
echo "<u><b>$logi</b> mesaj qebul etmir.</u><br/>";
}
}
echo $divide;

break;


case '8':
if($row['level']<8){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}

$y0xlama = mysql_query ("SELECT id,user,stsonline,zn FROM `users` where id = '".$nk."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];

$_v->title($logi.' Beynilenlerden silindi!');
$_v->fsize1($fsize1);


mysql_query("DELETE FROM online_sms_beyen WHERE id='".$del_b."'");
echo "<b>$logi</b> Beyenilenlerden silindi!<br/>";

echo $divide;

break;

case '7':
$usms = mysql_fetch_array(mysql_query ("select count(id) as num from online_sms_beyen where uid ='".$uid."';"));
$all = $usms["num"];

$iama = mysql_query ("SELECT usid FROM `onlinesms` where id = '".$uid."'");
$oix = mysql_fetch_array ($iama);
$usid = $oix["usid"];

$y0xlama = mysql_query ("SELECT id,user,stsonline,zn FROM `users` where id = '".$usid."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];

$_v->title('Beyenenler');
$_v->fsize1($fsize1);

if ($all!=0)
{
	if((file_exists("i/".$oxu["id"].".gif")&&($row["rnikler"]==0)))
	{
		$logi = "<img src=\"i/".$oxu["id"].".gif\" alt=\"$logi\"/>";
	}
	if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

	if($page!="")
	{
		$refresh = "&amp;page=$page";
	}else{
		$refresh = "";
	}
	echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;ref=$ref".$refresh."\">Yenile</a> - ";
	echo "".$zn." <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=15&amp;uid=$uid&amp;nk=".$oxu["id"]."&amp;ref=$ref".$refresh."\">".$logi."</a><br/>";
	$lama = mysql_query ("SELECT id,usid,mesaj,reng FROM `onlinesms` where usid = '".$usid."' and id = '".$uid."'");
	$ox = mysql_fetch_array ($lama);
	$mesaj = $ox["mesaj"];
	$color = $ox["reng"];

	if($r_k=="ok" and $color){$mesaj = "<span style=\"color: $color\">$mesaj</span>";}
	if ($smset==0)$mesaj = preg_replace("|<img[^>]+>|isU", "|smaylik|", $mesaj);
	$mesaj = str_replace($us."", "<b><u>".$us."</u></b>", $mesaj);
	echo "Online SMS-i: \"$mesaj\"<br/>";
	echo "Cemi <u>$all</u> nefer beyenib.<br/>";

	if ($novu=='1')
	{
		$kec = "(<b>$beyen_b</b> bal)";
	} else {
		$kec = "(<b>$beyen_b</b> post)";
	}
	echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=6&amp;uid=$uid&amp;ref=$ref".$refresh."\">Beyenirem</a><br/>";

	echo $divide;
}
if ($all==0) echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\">$logi</a> nikinin Online SMS-ni he&#231; kim beyenmemeyib.<br/>";


if($all == 0)
{
	echo "Online SMS yazan olmay&#305;b...<br/>";
}
else
{
	$next_id = next_id($all);
	$q = mysql_query("SELECT id,like_uid,like_us,tarix FROM `online_sms_beyen` WHERE `uid` = '".$uid."' ORDER BY `id` DESC LIMIT $next_id[start],$next_id[max_page];");
	while($view = mysql_fetch_array($q))
	{
		$del_b = $view["id"];
		$like_uid = $view["like_uid"];
		$like_us = $view["like_us"];
		$tarix = $view["tarix"];

		$yoxlama = mysql_query ("SELECT `zn` FROM `users` where `id` = '".$like_uid."'");
		if (mysql_affected_rows() == 0)
		{
			$like_us = "<b>Nik silinib</b>";
		}
		$ox = mysql_fetch_array ($yoxlama);
		$zn = $ox["zn"];

		if((file_exists("i/".$like_uid.".gif")&&($row["rnikler"]==0))){
		$like_us = "<img src=\"i/".$like_uid.".gif\" alt=\"$like_us\"/>";
		}
		if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

		if($row['level']>=8)echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=8&amp;del_b=".$del_b."&amp;nk=$like_uid&amp;uid=$uid&amp;ref=$ref".$refresh."\">[x]</a>-\n";
		echo "$zn<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$like_uid."&amp;ref=$ref".$refresh."\">$like_us</a>(".m_tarix($tarix).")<br/>";
	}


	if($next_id['a'] > $next_id['max_page'])
	{
		echo $divide;
		echo page_next("onlinesms.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
	}
	
}
echo $divide;
break;

case '6':
$iama = mysql_query ("SELECT usid FROM `onlinesms` where id = '".$uid."'");
$oix = mysql_fetch_array ($iama);
$usid = $oix["usid"];

if (($novu=='1')&&($row['bal']<$beyen_b)){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$beyen_b."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
echo $divide;
break;
}

if (($novu!='1')&&($row['posts']<$beyen_b)){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$beyen_b."</b> postunuz olmal&#305;d&#305;r.<br/>";
echo $divide;
break;
}

if ($usid==$id){
$_v->title('Olmaz');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z - öz&#252;n&#252;z&#252; beyene bilmersiniz.<br/>\n";
echo $divide;
break;
}

$_v->title('Beyendiniz');
$_v->fsize1($fsize1);

$y0xlama = mysql_query ("SELECT id,user,stsonline,zn FROM `users` where id = '".$usid."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];

$pos = mysql_query( "SELECT * FROM `online_sms_beyen` WHERE `uid` = '".$uid."' and `like_uid`='".$id."' order by `id` desc limit 1;" );
if (!mysql_affected_rows())
{
	$son = mysql_fetch_array( $pos );
	$like_uid = $son['like_uid'];
	if ($novu=='1'){
	$kec = "`bal` = `bal` - $beyen_b";
	}else{
	$kec = "`posts` = `posts` - $beyen_b";
	}
	mysql_query("update `users` set ".$kec." where `id` ='$id';");

	mysql_query("INSERT INTO `online_sms_beyen` SET `like_uid` = '".$id."', `like_us` = '".$row["user"]."', `like` = `like` + 1, tarix = '".time()."', `uid` = '".$uid."';");
	echo "Siz <b>$logi</b> nikinin Online SMS-ni beyendiniz!<br/>\n";
}
else
{
	echo "Siz <b>$logi</b> nickinin Online SMS-ni art&#305;q beyenmisiniz!<br/>\n";
}
echo $divide;

break;

case '5':
$iama = mysql_query ("SELECT id,usid,mesaj,reng FROM `onlinesms` where id = '".$uid."'");
$oix = mysql_fetch_array ($iama);
$usid = $oix["usid"];
$mesaj = $oix["mesaj"];
$color = $oix["reng"];

$lama = mysql_query ("SELECT id,usid,mesaj,reng FROM `onlinesms` where usid = '".$usid."'");
$ox = mysql_fetch_array ($lama);

$_v->title('Online SMS');
$_v->fsize1($fsize1);

$y0xlama = mysql_query ("SELECT id,user,zn FROM `users` where id = '".$usid."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
if((file_exists("i/".$oxu["id"].".gif")&&($row["rnikler"]==0))){
$logi = "<img src=\"i/".$oxu["id"].".gif\" alt=\"$logi\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;ref=$ref".$refresh."\">Yenile</a> - ";
echo "".$zn." <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=15&amp;uid=$uid&amp;nk=".$oxu["id"]."&amp;ref=$ref\">".$logi."</a><br/>";
if($r_k=="ok" and $color){$mesaj = "<span style=\"color: $color\">$mesaj</span>";}
if ($smset==0)$mesaj = preg_replace("|<img[^>]+>|isU", "|smaylik|", $mesaj);
$mesaj = str_replace($us."", "<b><u>".$us."</u></b>", $mesaj);
echo "Online SMS-i: \"$mesaj\"<br/>";
$usms = mysql_fetch_array(mysql_query ("select count(id) as num from online_sms_beyen where uid ='".$uid."';"));
$like = $usms["num"];
if ($like!=0) echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;ref=$ref".$refresh."\">Beyenenler</a>(<b>$like</b> nefer)<br/>";

if ($novu=='1'){
$kec = "(<b>$beyen_b</b> bal)";
}else{
$kec = "(<b>$beyen_b</b> post)";
}

echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=6&amp;uid=$uid&amp;ref=$ref".$refresh."\">Beyen</a><br/>";


if (($row['level']>=8)&&($_GET["del_c"]))
{
	mysql_query("DELETE FROM online_sms_fikir WHERE id='".$_GET["del_c"]."'");
	echo $divide;
	echo "Fikir silindi!.<br/>";
}
if(isset($_POST['msg']))
{
	$cvb = 0;
	if (($fikirnovu=='1')&&($row['bal']<$fikir_b))
	{
		echo $divide;
		echo "Online SMS-e &#351;erh vermek &#252;&#231;&#252;n <b>".$fikir_b."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
		$cvb = 1;
	}
	elseif (($fikirnovu!='1')&&($row['posts']<$fikir_b))
	{
		echo $divide;
		echo "Online SMS-e &#351;erh vermek &#252;&#231;&#252;n <b>$fikir_b</b> postunuz olmal&#305;d&#305;r.<br/>";
		echo "<b>Diqqet!</b>: <u>Postunuz hesab&#305;n&#305;zdan &#231;&#305;x&#305;lmayacaq. Bu sadece &#231;at&#305;m&#305;z&#305;n seviyyesini qoruyub saxlamaq&#231;&#252;n nezerde tutulub.</u><br/>";
		$cvb = 1;
	}
	elseif ($msg == "")
	{
		echo $divide."<b>Diqqet:</b> <u>Fikrinizi qeyd etmediniz.</u><br/>\n";
		$cvb = 1;
	}
	elseif (strlen($msg) > $metn)
	{
		echo $divide."<b>Diqqet:</b> <u>Fikriniz <b>$metn</b> Simvoldan &#231;ox ola bilmez!</u><br/>\n";
		$cvb = 1;
	}
	elseif (strlen($msg) < 5)
	{
		echo $divide."<b>Diqqet:</b> <u>Fikriniz <b>5</b> Simvoldan Az Olmamal&#305;d&#305;r!</u><br/>\n";
		$cvb = 1;
	}
	else
	{
		if($cvb==0)
		{
			$msg = $_POST['msg'];
			$msg = narmobil(chkdsk($msg,basename(__FILE__),"Online SMS Fikir"));

			if ($row["level"]<5) {require("filtr.php");}
			if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);
			if($smset!=0){$msg = in_smile($msg,$posts);}

			$shr = $_POST['shr'];

			$count_bal = ($fikirnovu != '0') ? intval($fikir_b) : '0';
			if(substr_count($shr, "3") != 0){$count_bal+=$qalin; $msg = "<b>$msg</b>";}
			if(substr_count($shr, "2") != 0){$count_bal+=$xetli; $msg = "<u>$msg</u>";}
			if(substr_count($shr, "1") != 0){$count_bal+=$kursiv; $msg = "<i>$msg</i>";}
			
			if($row["bal"] < $count_bal or $count_bal < 0)
			{
				echo $divide;
				echo "Bu emeliyyatdan istifade etmek üçün hesabınızda minimum <b>$count_bal</b> bal olmalıdır<br/>";
				echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
				echo $divide;
				echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS</a><br/>";
				echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";
				$_v->fsize2($fsize2);
				$_v->end('1',$link);
				exit();
			}

			$x = mysql_query("SELECT * FROM `online_sms_fikir` WHERE `uid` = '".$uid."' and `muellif` = '".$id."' and `fikir` = '".$msg."';");
			if(mysql_num_rows($x)==0)
			{
				$reng = $row["shrift"];
				if($count_bal!=0 and $fikirnovu=='1') mysql_query("UPDATE `users` SET `bal` = `bal`-'".intval($count_bal)."' WHERE `id` = '".$id."';");
				mysql_query("INSERT INTO `online_sms_fikir` SET uid = '".$uid."', muellif = '".$id."', time = '".time()."', fikir = '".$msg."', reng = '".$reng."';")or die (mysql_error());
			}
		}
	}
}
$_v->divide();
$sqlks = mysql_query("select id from online_sms_fikir where uid = '".$uid."'");
$total = mysql_num_rows($sqlks);

if($total == 0)
{
	echo "Online SMS yazan olmay&#305;b...<br/>";
}
else
{
	$next_id = next_id($total);
	$sql = mysql_query("SELECT * FROM `online_sms_fikir` where uid = '".$uid."' ORDER BY `id`  DESC LIMIT $next_id[start],$next_id[max_page];");
	while($rows = mysql_fetch_array($sql))
	{
		$yoxlama = mysql_query ("SELECT `id`,`user`,`zn` FROM `users` where id = '".$rows['muellif']."'");
		if (mysql_affected_rows() == 0) {
		$muellif = "[<u>nik silinib</u>]";
		}
		else
		{
			$inf = mysql_fetch_array ($yoxlama);
			$zn = $inf["zn"];
			$login = $inf["user"];
			if((file_exists("i/".$inf["id"].".gif")&&($row["rnikler"]==0)))
			{
				$login = "<img src=\"i/".$inf["id"].".gif\" alt=\"$login\"/>";
			}
			if($zn!="") $zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

			$oxu = mysql_fetch_array ($y0xlama);
			$muellif = "".$zn." <a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=15&amp;nk=".$inf["id"]."&amp;uid=$uid&amp;ref=$ref".$refresh."\">".$login."</a>";
		}
		$reng = $rows["reng"];
		$fikir = $rows["fikir"];
		if($row['level']>=8)echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;del_c=".$rows['id']."&amp;ref=$ref".$refresh."\">[x]</a> - ";
		if($r_k=="ok" and $reng){$fikir = "<span style=\"color: $reng\">$fikir</span>";}
		if ($smset==0)$fikir = preg_replace("|<img[^>]+>|isU", "|smaylik|", $fikir);
		$fikir = str_replace($us."", "<b><u>".$us."</u></b>", $fikir);
		echo $muellif." (".m_tarix($rows['time']).") ".$fikir."<br/>";
	}


	if($next_id['a'] > $next_id['max_page'])
	{
		echo $divide;
		echo page_next("onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
	}
}
$_v->divide();

echo "Mesaj: (max: $metn)<br/>\n";
$_v->action("onlinesms.php?id=$id&amp;ps=$ps&amp;b=5&amp;uid=$uid&amp;ref=$ref".$refresh);
print $_v->input('<input name="msg'.$ref.'" maxlength="'.$metn.'" title="Metn"/>').'<br/>';
print $_v->select('<select name="shr'.$ref.'" multiple="true"><option value="1">Kursiv(+'.$kursiv.' bal)</option><option value="2">Alt&#305; Xettli(+'.$xetli.' bal)</option><option value="3">Qalın(+'.$qalin.' bal)</option></select>','null').'<br/>';
print $_v->submit('Gönder');
$_v->divide('wml');
break;
}

if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}

if($b=='2' or $b=='1' or $b=='3' or $b=='4' or $b=='5'){
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS</a><br/>\n";
}elseif($b=='6' or $b=='7' or $b=='15'){
echo "<a href=\"onlinesms.php?b=5&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;ref=$ref".$refresh."\">Geri qay&#305;t</a><br/>\n";
}elseif($b=='8'){
echo "<a href=\"onlinesms.php?b=7&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;ref=$ref".$refresh."\">Geri qay&#305;t</a><br/>\n";
}elseif($b=='12' or $b=='13' or $b=='14'){
echo "<a href=\"onlinesms.php?b=2&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;ref=$ref".$refresh."\">Geri qay&#305;t</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}
?>