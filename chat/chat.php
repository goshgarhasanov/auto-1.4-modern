<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if(isset($_GET['rm'])) {$rm = $_GET['rm'];}
if ($rm==10) {
if((preg_match("/[^0-9a-z]+/",$pwd))or($pwd=="")){
header ("Location: otaq.php?id=$id&ps=$ps&rm=10&ref=$ref");
exit;
}
}


$pwd=intval($_GET['pwd']);
$rm = mysql_escape_string($rm);
$rem = mysql_query("SELECT `topic`,`rm`,`nov`,`point` FROM `rooms` where `rm` = '".$rm."' and `activ` = '1';"); 
$iname = mysql_fetch_array ($rem); 
$topic = $iname["topic"];
$rm = $iname["rm"];
$mov_rm = $iname["nov"];
$point_rm = $iname["point"];

if($row["chatphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
 echo "<b>Diqqet.! </b> Siz Cezalisiniz otaga Daxil Ola Bilmersiniz..!<br/>\n";
 $_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if(!isset($rm))
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Daxil olmaq istediyiniz otaq m&#246;vcud deyil!<br/>";
	echo "Zehmet olmasa S&#246;bete qo&#351;ulmaq &#252;&#231;&#252;n bir otaq se&#231;in...<br/>";
	$_v->divide();
	echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


if (($mov_rm=='1')&&($row['bal']<$point_rm))
{
	$_v->title('Diqqet','center');
	$_v->fsize1($fsize1);
	echo "Bu otaqa yaln&#305;z <b>$point_rm</b> &#231;ox bal&#305; olan istifade&#231;iler gire biler.<br/>\n";
	$_v->divide();
	echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

if (($mov_rm!='1')&&($row['posts']<$point_rm))
{
	$_v->title('Diqqet','center');
	$_v->fsize1($fsize1);
	echo "Bu otaqa yaln&#305;z <b>$point_rm</b> &#231;ox postu olan istifade&#231;iler gire biler.<br/>\n";
	$_v->divide();
	echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


if (($row["level"]<4)&&($rm==8))
{
	$_v->title('Diqqet','center');
	$_v->fsize1($fsize1);
	echo "Bu otaqa yaln&#305;z R&#252;tbeli &#351;exslerin giri&#351; h&#252;ququ var.<br/>";
	echo "Zehmet olmasa S&#246;bete qo&#351;ulmaq &#252;&#231;&#252;n ba&#351;qa bir otaq se&#231;in...<br/>\n";
	$_v->divide();
	echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

if($row['room']!=$rm) {
	mysql_query("UPDATE `users` SET `room` = '".$rm."' WHERE `id` = '".$id."';");
}

$room="room".$rm;
$us=$row["user"];
$max = $row["max"];
$level = $row["level"];
$smset = $row["smiles"];
$us_ip = $row["user_ip"];
$us_soft = $row["user_soft"];
$umni = $row["umnik"];
$rnikler = $row["rnikler"];


$smthwr = 0;
$bmax = $max*2;
if ($rm=="10" and $pwd=="") {
	header ("Location: otaq.php?id=$id&ps=$ps&rm=10&ref=$ref");
	exit;
}

if (isset($vct)) {
	$vct=intval($vct);
	mysql_query("update `users` set `umnik`='".$vct."' where `id`='$id';");
	$umni = $vct;
}

$umn = '';

if ($umni==0)
{
	$umn='and usid!=2';
}

$pwd=htmlspecialchars(stripslashes(trim($pwd)));

$WHERE = NULL;
 
if ($rm == '10')
{
	$WHERE = "where ((`pwd` = '".$pwd."')OR(`pwd` = '')) and ((`usid` = '".$id."')OR(`towhom` = '".$id."')OR(`towhom` = ''))";
}
elseif($row['gizlilik']!=2)
{
	if($mod=='privat')
	{
		$WHERE = "where (`usid` = '".$id."')OR(`towhom` = '".$id."')OR(`uid` = '".$id."') $umn";
	}
	else
	{
		$WHERE = "where (`usid` = '".$id."')OR(`towhom` = '".$id."')OR(`towhom` = '') $umn";
	}
}
else
{
	if($mod=='privat')
	{
		$WHERE = "where (`usid` = '".$id."')OR(`towhom` = '".$id."')OR(`uid` = '".$id."') $umn";
	}
	else if($umni==0)
	{
		$WHERE = "where `usid`!=2";
	}
}





$setting = @mysql_query ("Select * from setting where klu4='1'");
$set = mysql_fetch_array ($setting);
$posts =  $row["posts"];
$komputer= $set["komputer"];

$r_k = null;
if ((strpos ($HTTP_USER_AGENT,"Windows") !== false)||(strpos ($HTTP_USER_AGENT,"Opera") !== false))
{
	$r_k = 'ok';
}
if($_v->ver!='wml') {
	$r_k = 'ok';
}


if ($rm == 0) require("umnik1.php");
$msg = $_POST['msg'];
if(@$msg){
	$msg = trim(" $msg ");
	$msg = ereg_replace(" +"," ",$msg);
	$msg = substr($msg,0,400);
	$msg = narmobil($msg);
	if(strlen($msg)>='2'){

		if(strtolower($msg)=="exit")
		{
			$mytime=$row["time"];  
			if($mytime>$SERVER_TIME) {
				$room = "room".$rm."";
				$rnd = rand(0,99999999);
				$today=date ("H:i",$SERVER_TIME);
				mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `room` = '30', `user_ip` = '".$REMOTE_ADDR."', `user_soft` = '".$HTTP_USER_AGENT."' WHERE `id` = '".$id."' LIMIT 1;");
				@mysql_query ("Insert into `$room` set `klu4`= '".$rnd."', `time`='".$today."', `who`='Sistem', `message`='<b>$us &#199;at&#305; Terk Etdi.</b>', `id`='".$SERVER_TIME."', `towhom`='', `hid`='".$hid."', `usid`='4', `reng`='', `zn`='';");
			}

			$_v->title('&#199;&#305;x&#305;&#351;','center');
			$_v->fsize1($fsize1);
			echo "<b>Siz &#199;at&#305; Terk Etdiniz.</b><br/>";
			print $divide;
			print "G&#252;le-g&#252;le :)<br/> <b>U&#287;urlar!</b><br/>";
			$_v->divide();
			echo "<a href=\"index.php?$ref\">$site</a>\n";
			$_v->fsize2($fsize2);
			$_v->end('1',$link);
			exit;
		}

		$u_uid = $towhom;
		if (!isset($prvt)) $prvt = 0;
		if ($prvt == 0) $towhom = '';
		if (!isset($towhom)) $towhom = '';

		if ($row["level"]<5) {require("filtr.php");}

		if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);

		if($smset!=0){$msg = in_smile($msg,$posts);}

		if($p_arr['200']==1)
		{
			$shr = $_POST['shr'];
			if($p_arr['210']==1)
			{
				if(substr_count($shr, "1") != 0) $msg = "<i>$msg</i>";
			}
			if($p_arr['211']==1)
			{
				if(substr_count($shr, "2") != 0) $msg = "<u>$msg</u>";
			}
			if($p_arr['212']==1)
			{
				if(substr_count($shr, "3") != 0) $msg = "<b>$msg</b>";
			}
			if($p_arr['213']==1)
			{
				if(substr_count($shr, "4") != 0) $msg = "<big>$msg</big>";
			}
		}

		$r = mysql_query("SELECT `message` FROM $room WHERE `usid` = '".$id."' order by `id` desc LIMIT 1;");
		$a = mysql_fetch_array($r);
		if ($a["message"] !== $msg)
		{
			$ftime = $SERVER_TIME - 90;
			$r = mysql_query("SELECT count(*) as `sum` from `$room` WHERE (`usid` = '".$id."')and(`id` > '".$ftime."');");
			$a = mysql_fetch_array($r);
			$sum = $a["sum"];
			if ($sum>=6&&$row["level"]<4){
				$ftime = $SERVER_TIME + 240;
				mysql_query("update `users` set `kik` = '".$ftime."', `whykik` = 'Tekrar(Flood)', `whokik` = 'SISTEM' WHERE `id` = '".$id."';");
			}
$rpos=file("file/dat_folder/n_n/roompost.dat");
$rpb_rpost = trim($rpos[0]);
$rpb_bal = trim($rpos[1]);
$bonus = trim($rpos[2]);
			$today=date ("H:i",$SERVER_TIME); 
			$posts =  $row["posts"];
			$posts++;
			$nnposts = $row["nnposts"];
			$nnposts++;
			$hid = $row["inv"];
			$kol++;
			$rnd = rand(0,99999999);
			$row["roompost"]++;
if ($bonus == 1) {
if($row["roompost"]>= $rpb_rpost){
mysql_query ("Update users set bal='".$row["bal"]."'+$rpb_bal, `roompost`='0' where id ='".$id."'");
$metn = "Hormetli <b>$us</b>. Siz ota&#287;da y&#305;qd&#305;&#287;&#305;n&#305;z <b>$rpb_rpost posta</b> g&#246;re <b>$rpb_bal bal</b> hediyye qazand&#305;n&#305;z.<br/><i>Nezerinize &#231;atd&#305;raqki ota&#287;da y&#305;&#287;&#305;lan her <u>$rpb_rpost posta</u> g&#246;re <u><b>Sistem</b></u> terefinden <u>$rpb_bal bal</u> aftomatik hediyye verilir..!</i>";
mysql_query("INSERT INTO `zapiski` SET  `idtowhom` = '".$id."',`towhom` = '".$us."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = '$rpb_bal Bal Hediyye',`message` = '".$metn."';");

} else {
mysql_query ("Update `users` set `roompost`='".$row["roompost"]."' where `id` ='".$id."'");
}
}





		$row['action'] = action_up($row['action'] + '0.02');
mysql_query ("Update `users` set `posts`='".$posts."', `action`='".$row['action']."', `nnposts`='".$row["nnposts"]."' where `id` ='".$id."';");

			if($rm==0) {
				$a = mysql_query ("Select * from `vopros` where `klu4` = '1';"); 
				$b = mysql_fetch_array ($a);
				$nom = $b["number"];
				$vr = $b["time"];
				$answ = $b["answer"]; 
				$tran = $b["tran"];
				$amsg = rus_to_k($msg); 
				$kansw = rus_to_k($answ);
			}



			$today=date ("H:i",$SERVER_TIME);

			$zn = $row["zn"];
			$reng = $row["shrift"];
			if($rm==0) require("umnik3.php");
			if (($rm == 0)&&($amsg == $kansw||$amsg == $tran)&&$nom!=5){
				@mysql_query ("Insert into `room0` set `klu4`= '".$rnd."', `time`='".$today."', `zn`='".$zn."', `who`='".$us."', `message`='".$msg."', `uid`='".$u_uid."', `id`='".$SERVER_TIME."', `towhom`='".$towhom."', `hid`='2', `usid`='".$id."', `reng`='".$reng."';");
			} else if ($rm == 10){
				@mysql_query ("Insert into `room10` set `klu4`= '".$rnd."', `time`='".$today."', `zn`='".$zn."', `who`='".$us."', `message`='".$msg."', `uid`='".$u_uid."', `id`='".$SERVER_TIME."', `towhom`='".$towhom."', `hid`='".$hid."', `usid`='".$id."', `pwd`='".$pwd."', `reng`='".$reng."';");
			} else {
				@mysql_query ("Insert into `$room` set `klu4`= '".$rnd."', `time`='".$today."', `zn`='".$zn."', `who`='".$us."', `message`='".$msg."', `uid`='".$u_uid."', `id`='".$SERVER_TIME."', `towhom`='".$towhom."', `hid`='".$hid."', `usid`='".$id."', `reng`='".$reng."';");
			}

			$smthwr = 1;

		}
	}
}


unset($msg);

$avr = $row["avr"];
$avr2 = $avr/10;
$time=date ("H:i",$SERVER_TIME);

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";




$r = mysql_query ("select count(`readd`) as `num` from `zapiski` WHERE (`idtowhom` = '".$id."')and(`readd` = '0')and(`ininc` = '1');");
$a = mysql_fetch_array($r);
$inb = $a["num"]; 
$t=date("H:i:s",$SERVER_TIME);


$delmsg = $row['delmsg'];
ob_start();

$_v->do_type = array();
$_v->do_type[] = "<do type=\"options\" name=\"add\" label=\"Yaz\"><go href=\"chat.comment.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
$_v->do_type[] = "<do type=\"options\" name=\"yenile\" label=\"Yenile\"><go href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
$_v->do_type[] = "<do type=\"options\" name=\"kimharda\" label=\"Kim,Harda?\"><go href=\"onlayn.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
$_v->do_type[] = "<do type=\"options\" name=\"qurgular\" label=\"&#350;exsi Kabinet\"><go href=\"cabinet.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if($p_arr['21']==1) $_v->do_type[] = "<do type=\"options\" name=\"delrm\" label=\"Otaq&#305; Sil\"><go href=\"admin.php?go=clroom&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if($p_arr['45']==1) $_v->do_type[] = "<do type=\"options\" name=\"topic\" label=\"Topik\"><go href=\"topic.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($rm==10)		$_v->do_type[] = "<do type=\"options\" name=\"achat\" label=\"A&#231;ar&#305; Deyi&#351;\"><go href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\"/></do>";
$_v->do_type[] = "<do type=\"options\" name=\"dehliz\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";


if($_v->ver!='wml' and $_GET['menu']=='1')
{
	$_v->title('Chat Menu');
	print '<b>Chat Menu</b><br/>';
	$_v->divide();
	$_v->do_type[] = "<do type=\"options\" name=\"dehliz\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
	
	
	print "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/>Kim,Harda?</a><br/>";
	print "<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/>&#350;exsi Kabinet</a><br/>";
	if($p_arr['21']==1) print "<a href=\"admin.php?go=clroom&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/>Otaq&#305; Sil</a><br/>";
	if($p_arr['45']==1) print "<a href=\"topic.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/>Topiki deyi&#351;</a><br/>";
	if ($rm==10)		print "<a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\"/>A&#231;ar&#305; Deyi&#351;</a><br/>";
	print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/>Dehliz</a><br/>";

	
	$_v->divide();
	echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Geri qay&#305;t</a><br/>";
	$_v->end('1',$link);
	exit;
}


if ($avr!=0 and !isset($_GET['page'])) $_v->Redirect("chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep",$avr);
$_v->title('Saat ('.$t.' )');
$_v->fsize1($fsize1);

	$y = mysql_query("SELECT COUNT(`room`) FROM `users` WHERE `time` > '".$_AUTO['chat']."' AND `room` = '".$rm."' AND `inv` != '3' and `kik`<'".time()."' and banned = '0';");
	$otaqda = mysql_result($y, 0);
	$msn = $row["msn"];
	
	if($msn>=999)
	{
		$rr = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");
		$aa = mysql_fetch_array($rr);
		$msn = $aa["num"];
		mysql_query("UPDATE `users` SET `msn` = '".$msn."' WHERE `id` = '".$id."' LIMIT 1;");
	}
if($nn=="01"){
if(strlen($message)>=1) {
	require("file/fun/2");
}
}
if($inb != "0") echo "Yeni (<a href=\"mektub.php?bol=1&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">".$inb."</a>) Mektubun var<br/>\n";
if($msn != "0") echo "Yeni (<a href=\"mesaj.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">".$msn."</a>) Mesaj&#305;n var<br/>\n";

$_v->align('center','html');
$_v->html('<div class="p2">');
if($rm!="10")echo "<b>$topic</b> (<a href=\"kim.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">".$otaqda."</a>)<br/>";
else echo "<b>$topic</b><br/>";
$_v->html('</div>');
$_v->align('left','html');
	
	
	$_v->html('<span class="mlink">');
	echo "<a href=\"chat.comment.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"1\">Yaz</a> ";
	$_v->html('</span>');
	$_v->wml('| ');

	if($rm!="10")
	{
		$_v->html('<span class="mlink">');
		echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a> ";
		$_v->html('</span>');

		$_v->html('<span class="mlink">');
		$_v->wml('| ');
		if($mod!="privat")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;mod=privat&amp;ref=$ref\">&#350;exsi</a>\n";
		else echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#220;mumi</a>\n";
		
	}
	else
	{
		$_v->html('<span class="mlink">');
		echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a> ";
	}
	$_v->html('</span>');


if($rm==0)
{
 $_v->html('<span class="mlink">');
 $_v->wml('<br/>'); 
	if ($umni==1)
	{
		echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;r=$ref&amp;vct=0\"><b>?</b> <img src=\"img/sualy.gif\" alt=\".\" height=\"16\" width=\"16\"/></a>";
	} 
	else
	{
		echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;r=$ref&amp;vct=1\"><b>?</b> <img src=\"img/suals.gif\" alt=\".\" height=\"16\" width=\"16\"/></a>";
	}
 $_v->html('</span>');
}

	if($_v->ver!='wml')
	{
		$_v->html('<span class="mlink">');
		$_v->wml('| ');
    echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online <img src=\"img/online.gif\" alt=\".\" height=\"16\" width=\"16\"/></a>\n";

		$_v->html('</span>');
//$_v->divide();
}

	if($_v->ver!='wml')
	{
		$_v->html('<span id="bar_right"><span class="mlink">');
		echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;menu=1&amp;rm=$rm$takep\">Menu</a>";
		$_v->html('</span></span>');
    $_v->divide();
	}
	

cpon();
	print '<br/>';

$_v->divide();

$all = mysql_fetch_object(mysql_query("SELECT COUNT(`klu4`) As `count` FROM `$room` $WHERE LIMIT 1;"));
$next_id = next_id($all->count,$max);
$result = @mysql_query ("SELECT * FROM `$room` $WHERE ORDER BY `id` DESC LIMIT  ".$next_id['start'].",".$next_id['max_page'].";");
while($ob = mysql_fetch_object($result))
{
	if ($smset==0) $ob->message = preg_replace("|<img[^>]+>|isU", "|smaylik|", $ob->message);
	@mysql_query ("Select * from ignor where usid='".$ob->usid."' and id='".$id."'");
	if (mysql_affected_rows() == false)
	{
		if($ob->zn) $ob->zn = "<img src=\"img/z".$ob->zn.".gif\" alt=\".\"/>";
		
		if ($ob->towhom == '')
		{
			if(strstr($ob->message,$us))
			{
				$ob->message = str_replace($us."", "<b>".$us."</b>", $ob->message);
				$_v->html('<div class="mlink">');
			}
			else if($ob->who==$us)
			{
				$_v->html('<div class="mlink">');
			}
			else
			$_v->html('<div class="mlink">');
		
			if($r_k=="ok"){ $ob->message = '<span style="color: '.$ob->reng.'">'.$ob->message.'</span>'; }

			$ob->message = ($row['delmsg']=='1') ? $ob->message." [<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$ob->klu4$takep\">x</a>]" : $ob->message;
			
			if(file_exists("i/".$ob->usid.".gif") and $rnikler==0) {
				$ob->who = "<img src=\"i/".$ob->usid.".gif\" alt=\"$ob->who\"/>";
			}
			echo $ob->zn."<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$ob->usid$takep\">".$ob->who."</a>(".$ob->time.")\n".$ob->message."";
		}
		else if (($ob->towhom == $id)||($id == $ob->usid) || ($row['gizlilik'] == 2))
		{
			if ($ob->towhom == $id)
			{
				$ob->message = str_replace($us."", "<b>".$us."</b>", $ob->message);
				$_v->html('<div class="mlink">');
			}
			else if($id == $ob->usid)
			{
				$_v->html('<div class="mlink">');
			}
			else
			{
				$_v->html('<div class="mlink">');
			}
			
			if($r_k=="ok"){ $ob->message = '<span style="color: '.$ob->reng.'">'.$ob->message.'</span>'; }

			$ob->message = ($row['delmsg']=='1') ? $ob->message." [<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$ob->klu4$takep\">x</a>]" : $ob->message;
			if(file_exists("i/".$ob->usid.".gif") and $rnikler==0) {
				$ob->who = "<img src=\"i/".$ob->usid.".gif\" alt=\"$ob->who\"/>";
			}
			echo $ob->zn."<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$ob->usid$takep\">".$ob->who."</a>[&#350;exsi]</b>\n".$ob->message;
		}
		$_v->wml('<br/>');
		$_v->html('</div>');
	}
}

if($next_id['a'] > $next_id['max_page'])
{
	$_v->html('<div class="mlink">');
	echo 'Sehife: '.page_next("chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep", $next_id['a'], $next_id['max_page'], $next_id['page'],null);
	$_v->html('</div>');
}

$_v->divide();

echo "<a href=\"smile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smayllar</a><br/>\n";
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">S&#246;hbet Otaqlar&#305;</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>