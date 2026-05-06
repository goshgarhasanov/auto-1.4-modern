<?php
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($_v->ver=="wml")$_v->ver="vista1";

$_v->title('Mesaj','left');
$_v->fsize1($fsize1);

//////////mms


$posts = $user["posts"];
$uid = $_GET["nk"];
$nk = $_GET["nk"];
$mms = $_POST["mms"];
$text = $_POST["text"];

$posts = $row["posts"];



$q_u = mysql_query ("select `id`,`user`,`mesaj` from `users` where `id` = '".$nk."';");
if (mysql_affected_rows() == 0)
{
echo "Mesaj yazmaq istediyiniz istifade&#231;i m&#246;vcut deyil...<br/>";
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$dat = @mysql_fetch_array( @$q_u );
$towhom = $dat['user'];
$nk = $dat['user'];
$user_id = $dat['id'];
$mesaj = $dat['mesaj'];
//////////

if($row['posts'] < 200)
{
echo "200 post topladiqdan sonra fayl gondere bilersiz<br/>";

echo "<br/><a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$user_id$takep\">Arxive Qay&#305;t</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
	exit;
}










if(!isset($_POST['action']))
{
echo "<form action=\"addfayl.php?id=$id&amp;ps=$ps&amp;nk=".$user_id."\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "Fayl sec (Sekil, Musiqi, Video):<br/>\n";
echo "<input type=\"file\" name=\"mms\" /><br />\n";
echo "Mesaj:<br/>\n";
echo "<input type=\"text\" name=\"text\" /><br />\n";
echo "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n";
echo "<input type=\"submit\" value=\"G&#246;nder\" /><br/>\n";
}
else
{

if(!is_uploaded_file($_FILES['mms']['tmp_name']))
{
$error = "Fayl&#305; Se&#231;memisiz.<br/>";
}

if(filesize($_FILES['mms']['tmp_name']) > 1024 * 15100)
{
$error = "Fayl&#305;n hecmi 15 Mb-dan &#231;ox olmamal&#305;d&#305;r..!<br />";
}

$aktiv = array("gif", "jpeg", "jpg", "png", "3gp", "mp3", "mp4");
$pathinfo = pathinfo($_FILES['mms']['name']);
if (!in_array(strtolower($pathinfo['extension']), $aktiv))
{
$error = "<i>Siz yaln&#305;z a&#351;a&#287;&#305;dak&#305; formatlarda olan fayllar g&#246;ndere bilersiz:</i><br/>gif, jpeg, jpg, png, 3gp, mp3, mp4<br/>\n";
}


if (empty($nk))
{
$error = "<u>Siz he&#231; bir leqeb yazmad&#305;z MMS kime g&#246;nderim? )))</u>";
}

$nk = strtolower($nk);
if (!ctype_digit($nk))
{
$nk = trim($nk);
if ($nk == "")
{
$nk = 0;
}
$latuser = strtolower($nk);
$latuser = mysql_escape_string($latuser);
$q = mysql_query("SELECT * FROM `users` WHERE `latuser` = '".$latuser."';");
}
else
{
$nk = mysql_escape_string($nk);
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$user_id."';");
}

if(mysql_affected_rows() <= 0)
{
$error = "
<u>$nk</u>, leqebli istifade&#231;i bazada tap&#305;lmad&#305;.<br/>";
}
else
{
$user_data = mysql_fetch_array($q);
$toid = $user_data['id'];
$time = $user_data['time'];
$alici = $user_data['user'];
$mektub_q = $user_data['mektub_qebulu'];
}



if ($toid == $id)
{
$error = "Oz&#252;n&#252;ze multimesaj g&#246;ndere bilmersiz<br/>";
}

$date = date("d-m-Y H:i:s");

$q = mysql_query("SELECT * FROM `mms` WHERE `kod` = '".$olchu."' AND `to` = '".$toid."';");
if(mysql_num_rows($q) != 0)
{
$error = "<b>Bu &#351;ekili siz daha &#246;nce bu istifade&#231;iye g&#246;nderibsiz!</b>";
}

if (isset($error))
{
echo $error."<br/>";
echo '<a href="javascript:history.back(1)"> Geri</a><br/>';
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

if(strlen($_POST['text'])<='2'){
echo "Yazd&#305;&#287;&#305;n&#305;z mesaj 2 simvoldan &#231;ox olmal&#305;d&#305;r.<br/>\n";
$_v->divide();
		echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

if ($row['level']<9)
{
	if ($mesaj==1) {
		mysql_query ("Select * from `friends` where `usid`='".$id."' and `id`='".$toid."';");
		if (mysql_affected_rows() != true)
		{
			echo "<u>Bu istifade&#231;i Yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>----<br/>";
			echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
			$_v->fsize2($fsize2);
			$_v->end('1',$link);
		exit;
		}
	}
	elseif ($mesaj==2)
	{
		echo "<u>Bu istifade&#231;i mesaj qebul etmir.</u><br/>----<br/>";
		echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
	exit;
	}
}

@mysql_query ("Select * from `ignor` where `usid`='".$id."' and `id`='".$toid."';");
if (mysql_affected_rows() == true){
echo "<b>".$login."</b> <i>Sizi ignor edib</i>.<br/>Bu o demekdir ki, o sizinle dan&#305;&#351;maq istemir!<br/>\n";
$_v->divide();
		echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
	exit;
}else{

$message = narmobil($message);
if ($row["smiles"]==2)
$message = in_smile($message,$row['posts']);
$mssg=strtolower($message);
if ($row['level']<7)
require("file/require/reklam");
else {
$message = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $message); 
if ((eregi('&lt;a ', $message)) and (eregi('/&gt;', $message)) and (eregi('&lt;/a&gt;', $message))){ 
$message = str_replace("&lt;a ", "<a ", $message);
$message = str_replace("/&gt;", "/>", $message);
$message = str_replace("&lt;/a&gt;", "</a>", $message);
}
}
$cc = mysql_query("SELECT `message` FROM `mesaj` WHERE (`idwho` ='".$id."')and(`idtowhom` = '".$toid."') order by `time` desc LIMIT 1;");
$fx = mysql_fetch_array($cc);
if ($fx["message"]!== $message){
if ((strlen($mssg) != strlen($message))&&($row["level"]<7))
{
@mysql_query ("Select * from `reklam` where `idwho`='".$id."' and `message`='".$message."';");
if (mysql_affected_rows() == 0) {
mysql_query("Insert into `reklam` set `who` ='".$user."', `idwho` ='".$id."', `message` = '".$message."', `towhom` = '$login', `idtowhom` = '".$toid."', `time` = '".$SERVER_TIME."';");
}
}else{
if(rand(1,3)==1){
$posts = $row["posts"];
$ataka_time = $SERVER_TIME-40;
$ataka = mysql_query("select COUNT(`klu4`) from `mesaj` where `idwho` = '".$id."' and `time` >'".$ataka_time."';");
$ataka_sms = @mysql_result($ataka, 0);
if($ataka_sms>=6){
$ftime = $SERVER_TIME + 1200;
$cpost = $posts*10/100;
$cposts = $posts-$cpost;
settype($cpost, 'integer');
mysql_query("update `users` set `kik` = '".$ftime."', `time` = '".$SERVER_TIME."', `posts` = '".$cposts."', `whykik` = 'Online Mesaj-da flood  + $cpost post cerime', `whokik` = 'Sistem', `banned` = '5' WHERE `id` = '".$id."';");
}
}
}
}
}
for ($i=1; $i<strlen($_FILES['mms']['name']); $i++) {
 if (strpos($_FILES['mms']['name'], '.', $offst) > 0) {
 $bf=strpos($_FILES['mms']['name'], '.', $offst);
 $offst=$bf+1;
 }
};
$photo_type = substr($_FILES['mms']['name'], $bf, strlen($_FILES['mms']['name'])-$bf+1);

$rn = rand(1000000, 9999999);
$adi = $id.$rn.$photo_type;
	
if(copy($_FILES['mms']['tmp_name'], "arxiv/nn/".$adi.""))
{

}
$olchu=round(filesize("arxiv/nn/".$adi."")/1024,1);

////elave



if (ctype_digit($towhom)) {
$r = mysql_query ("Select user,id,avtootvet from users where id = '".$towhom."'"); 
}
if (ctype_digit($towhom)) {
$r = mysql_query ("Select user,id,avtootvet from users where id = '".$towhom."'"); 
}
else {
 $towhom=trim($towhom);
 if($towhom=="")$towhom=0;
 $latuser=strtolower($towhom);
 if($latuser=="robotnick")$latuser=admin;
$r = mysql_query ("Select user,id,avtootvet from users where latuser = '".$latuser."'"); 
}
if (mysql_affected_rows() == 0) {
if($towhom!="0") echo "<b>$towhom</b> nikli istifade&#231;i tap&#305;lmad&#305;...<br/>\n";
else echo "<b>SMS Mektub g&#246;ndermek istediyiniz istifade&#231;inin Nick-ini yazmad&#305;z...</b><br/>\n";
$_v->divide();
}





$r = mysql_query ("Select user,id,avtootvet from users where latuser = '".$latuser."'"); 
$csx = mysql_fetch_array($r);
$login=$csx["user"];
$us=$csx["user"];
$usid=$csx["id"];
 
 
 $message = $text; 
 $avtootvet=$csx["avtootvet"];
 $kol = rand(0,99999999);
 $time = time();
 $data = date("d.m.y [H:i]"); 
 $times = getmicrotime();
$query = mysql_query("insert into `mesaj` set  `who`='".$row["user"]."', `idwho`='".$id."', `message`='".$message."', `towhom`='".$towhom."', `idtowhom`='".$user_id."', `time`='".$SERVER_TIME."', photo='".$adi."', multimesaj='1', kod ='".$olchu."';");

$row['action'] = action_up($row['action'] + '0.02');
mysql_query ("Update `users` set `posts`='1'+`posts`, `nnposts`='1'+`nnposts`, `action`='".$row['action']."' where `id` ='".$id."'");
mysql_query ("Update `users` set `msn`='1'+`msn` where `id` ='".$user_id."';"); 
mysql_query ("Update `users` set `sms`= '1' where `id` ='".$user_id."';");
if($query)
{
$olchu=round(filesize("arxiv/nn/".$adi."")/1024,1);
echo "<b>".$olchu." Kb Fayl <u>$alici</u> leqebli istifade&#231;iye  g&#246;nderildi.</b><br/>\n";
}
else
{
echo "<b>Xeta ba&#351; verdi. ".$adi."</b><br/>\n";
}

}


echo "</div>";


///////mms 
echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$user_id$takep\">Arxive Qay&#305;t</a><br/>\n";



$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>