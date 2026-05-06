<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$user=$row["user"];
$level=$row["level"];
$bal=$row['bal'];


switch($mod) {
default:

	$fp=file("file/dat_folder/reytinq.dat");
	$reytinq = trim($fp[0]);
	$reytime = trim($fp[1]);
	$datgun = trim($fp[2]);

	// 2 ses vermeni dayandirir
	if($reytinq==2){
	$_v->title('Reytinq','center');
	$_v->fsize1($fsize1);
	print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
	break;
	}

	$_v->title('Reytinq');
	$_v->fsize1($fsize1);

	print "<b>&#304;stifade&#231;i reytinqi:</b><br/>";
	print "****<br/>";
	print "En &#231;ox ses say&#305; olan istifade&#231;inin leqebi dehlizde <b>Lider</b> olaraq g&#246;r&#252;necek!<br/>";
	print "<i>Sesverme Reytinqi her g&#252;n sonra 0-dan ba&#351;lay&#305;r</i><br/>";
	echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ses Ver!</a><br/>";
	$_v->divide();


	$userall = mysql_query ("select count(id) as num from users where `ses` > 0;");
	$usm = mysql_fetch_array($userall);
	$num = $usm["num"];

	if($num==0)
	{
		echo "Reytinqde he&#231;kes yoxdur...<br/>\n";
		break;
	}

	echo "M&#252;barize aparanlar: $num nefer<br/>\n";
	echo $divide;

	$i=0;
	$next_id = next_id($num);
	$r = mysql_query ("select `user`,`ses`,`id` from `users` where `ses` > 0 order by `ses` desc LIMIT $next_id[start],$next_id[max_page];");
	while($inz = mysql_fetch_object($r)) 
	{
		$i++;
		echo "$i) <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$inz->id&amp;ref=$ref\">".$inz->user."</a>-(<a href=\"reytinq.php?mod=kimler&amp;id=$id&amp;ps=$ps&amp;uid=$inz->id&amp;ref=$ref\">".$inz->ses."</a> - ses)<br/>";
	}

	if($next_id['a'] > $next_id['max_page'])
	{
		echo $divide;
		echo page_next("reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
	}
break;

case 'ses':
$bals=file("file/bal_bot/0.dat");
$r_bal = trim($bals[18]);
$fp=file("file/dat_folder/reytinq.dat");

if($fp[0]==2)
{
	$_v->title('Reytinq','center');
	$_v->fsize1($fsize1);
	print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
	break;
}

if ($fp[0]==1)
{
	$_v->title('Reytinq','center');
	$_v->fsize1($fsize1);
	echo "Sesverme dayand&#305;r&#305;l&#305;b...<br/>";
	break;
}

if(!isset($_POST['action']) or !$_POST['usid'] or !$_POST['send'])
{
	if(isset($usid))
	{
		$user = @mysql_fetch_array(@mysql_query ("Select user from users where id = '".$usid."' LIMIT 1;"));
		$rowuser = trim($user['0']);
	}
	$_v->title('Reytinq','center');
	$_v->fsize1($fsize1);
	
	echo "Beyendiyin istifade&#231;iye ses ver onu reytinqde 1-ci et:<br/>(1-ses, $r_bal-bal deyerindedir).<br/>";
	$_v->divide();

	
	echo "<b>Leqeb / ID</b><br/>\n";
	$_v->action("reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	print $_v->input("<input name=\"usid$ref\" maxlength=\"20\" value=\"$rowuser\"/>").'<br/>';

	echo "<b>Ses:</b> \n";
	print $_v->input("<input size=\"6\" name=\"send$ref\" maxlength=\"6\" format=\"*N\"/>").'<br/>';
	print $_v->submit('Ses ver','action=qeyd');
}
else
{
	$send = intval($send);
	$sends = $send * $r_bal;
	if (($bal<$sends)or($sends<=0))
	{
		$_v->title('Reytinq','center');
		$_v->fsize1($fsize1);
		echo "H&#246;rmetli <u>$user</u>, 1 ses - $r_bal bal deyerindedir.<br/><b>$send</b>-ses &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$sends</b>-bal olmal&#305;d&#305;r!<br/>";
		echo "-=-<br/>"; 
		echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
		echo "-=-<br/>"; 
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
		break;
	}
	
	$nick=trim($_POST['usid']);
	if (!ctype_digit($nick))
	{
		if($nick=="")$nick=0;
		$latuser=strtolower($nick);
		$q = mysql_query("select `id`,`user`,`sex`,`ses` from `users` where `latuser`='".$latuser."';");
	}
	else
	{
		$q = mysql_query("select `id`,`user`,`sex`,`ses`  from `users` where `id`='".$nick."';");
	}
	if (mysql_affected_rows() == 0)
	{
		$_v->title('Reytinq','center');
		$_v->fsize1($fsize1);
		echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>";
		echo "-=-<br/>"; 
		echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
		break;
	}

	$data = mysql_fetch_array($q);
	$usid = $data['id'];
	$myses = $data['ses'];
	$login = $data['user'];
	$cins = $data['sex'];

	$ishtirak = mysql_query ("select `ses` from `reytinq` where `kim` = '".$id."' and `kime` = '".$usid."';");
	if (mysql_affected_rows() == 0)
	{
		mysql_query ("Insert into `reytinq` set `kim`='".$id."', `kime`='".$usid."', `ses`='".$send."', `user`='".$row['user']."', `sex`='".$cins."';");
	}
	else
	{
		$cc = mysql_fetch_object($ishtirak);
		mysql_query ("Update `reytinq` set `ses` = '".($cc->ses+$send)."', `kim` = '".$id."', `kime` = '".$usid."' where `kim` = '".$id."' and `kime` = '".$usid."';")or die(mysql_Error());
	}

	mysql_query ("Update `users` set `ses`='".($myses+$send)."' where `id`='".$usid."';");

	$newbal=$bal-$sends;
	mysql_query ("Update `users` set `bal`='".$newbal."' where `id`='".$id."';");
	top_all_reytinq();
	

	$_v->title('Reytinq','center');
	$_v->fsize1($fsize1);
	
	echo "H&#246;rmetli <u>$user</u>, siz &#246;z hesab&#305;n&#305;zdan <b>$sends</b>, bal xercleyerek.<br/>";
	if($id!=$usid)echo "<b>$login</b>, leqebli istifade&#231;iye <b>$send</b>-ses  verdiniz...<br/>";
	else echo "<b>&#214;z&#252;n&#252;ze  $send</b>-ses  verdiniz...<br/>";
	echo "Sizin verdiyiniz <b>$send</b>-ses \n";
	if($id!=$usid)echo "<b>$login</b>, &#252;&#231;&#252;n qebul olundu!<br/>-=-<br/>";
	else echo "qebul olundu!<br/>-=-<br/>";
	echo "<i>Te&#351;ekk&#252;rler...</i><br/>";
	echo "-=-<br/>";
	echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq</a><br/>\n";

	$date = date("d.m.y |H:i",$SERVER_TIME); 
	@$save= fopen("file/bal_bot/15.dat", "a+"); 
	$qeyd = base64_encode("<b>$user</b> - <u>$login</u> reytinqde <b>$send</b>, ses verdi: (<u>$bal - $sends=<b>$newbal</b></u>)-($date)")."\n";
	@fwrite($save, $qeyd);
	@fflush($save);
	@fclose($save);

	$u_ses = mysql_query ("select `ses`,`id`,`user` from `users` order by `ses` DESC limit 1");
	$bs = mysql_fetch_array ($u_ses);
	$bses = $bs["ses"];
	$busid = $bs["id"];
	$blogin = $bs["user"];


	$dat = file("file/dat_folder/enter.dat");
	$dses = trim($dat[5]);
	if($dses=="")$dses=0;
	if($dses<$bses)
	{
		$test1= trim($dat[0]);
		$test2= trim($dat[1]);
		$test3= trim($dat[2]);
		$test7= trim($dat[6]);
		$test8= trim($dat[7]);
		$test9= trim($dat[8]);
		$test10= trim($dat[9]);
		$test11= trim($dat[10]);
		$test12= trim($dat[11]);

		$file = fopen("file/dat_folder/enter.dat", "w");
		$data = "$test1\n";
		$data .= "$test2\n";
		$data .= "$test3\n";
		$data .= "$blogin\n";
		$data .= "$busid\n";
		$data .= "$bses\n";
		$data .= "$test7\n";
		$data .= "$test8\n";
		$data .= "$test9\n";
		$data .= "$test10\n";
		$data .= "$test11\n";
		$data .= "$test12";
		fwrite($file, $data);
		fclose($file);
	}
}
break;


case 'kimler':
$_v->title('Reytinq');
$_v->fsize1($fsize1);

$user = @mysql_fetch_object(@mysql_query ("Select `user` from `users` where `id` = '".$uid."' LIMIT 1;"));

if ($user->user == "")
{
	echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;!<br/>";
	echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>\n";
	break;
}
$userm = mysql_query ("select count(`id`) as `num` from `reytinq` where `kime` = '".$uid."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];

if ($num == 0)
{
	echo "<b>$user->user</b> ses veren olmay&#305;b...<br/>";
	echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>\n";
}
else
{
	echo "<b>$user->user</b> nickli istifade&#231;ini destekleyenler.<br/>";
	echo "Cemi <b>$num</b> nefer:<br/>";

	echo $divide;
	
	$next_id = next_id($num);
	$r = mysql_query ("select `kim`,`ses`,`user` from `reytinq` where `kime` ='".$uid."' order by `ses` desc LIMIT $next_id[start],$next_id[max_page];");
	$i=0;
	while($arr = mysql_fetch_object($r)) 
	{
		$i++;
		echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$arr->kim."&amp;ref=$ref\">".$arr->user."</a> (<b>".$arr->ses."</b> ses)<br/>";
	}

	if($next_id['a'] > $next_id['max_page'])
	{
		echo $divide;
		echo page_next("reytinq.php?mod=kimler&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
	}
}
echo "----<br/><b><a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref]\">Reytinq</a></b><br/>";
break;
}

$_v->divide();

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>