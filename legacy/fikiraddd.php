<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

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

$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$nk."';");
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) == 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Istifade&#231;i tap&#305;lmad&#305;!<br/>";
	$_v->divide();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;&amp;$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$nick = mysql_result($sql, 0);


$user = mysql_fetch_array($q);
$nk = $user['id'];
$nick = $user['user'];

$bal = $row['bal'];

if ($row['bal'] < 2)
{
	$_v->title('Bal yetersizdir');
	$_v->fsize1($fsize1);
	echo "$nick leqebli &#350;exsi tebrik ve ya terif etmek &#252;&#231;&#252;n,<br/> Size <b>2</b>, bal laz&#305;md&#305;r.<br/>\n";
	echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>\n";
	echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;leme Qaydas&#305;</a>\n";
	$_v->divide();
	echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$_v->title($nick.' &#252;&#231;&#252;n terifiniz');
$_v->fsize1($fsize1);


if(!isset($_POST['action']))
{
	echo "<b>$nick</b>, &#252;&#231;&#252;n &#252;rek s&#246;zleriniz<br/>\n";
	$_v->action("fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref");
	
	print $_v->input("<input type=\"text\" name=\"text\" maxlength=\"300\"/>").'<br/>';
	print $_v->submit('G&#246;nder','action=add');
	$_v->divide('wml');
	echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{


	
	$text = in_smile(narmobil($_POST['text']));
	if(empty($text))
	{
		echo 'Fikir yazmadiz.<br/>';

	$_v->divide('wml');
	echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
		exit;
	}	
	
	
	$sql = mysql_query("SELECT `id` FROM `fikirler` WHERE  `body` = '".$text."';");
	if(mysql_num_rows($sql) != 0)
	{
		echo "Fikriniz elave edildi, Te&#351;ekk&#252;r edirik...\n";
		echo "<br/>-----<br/>\n";
		echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";

		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		exit;
	}

	$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';");
	$nickname = mysql_result($q, 0);
	$contur=$bal-2;
	$sql = mysql_query("INSERT INTO `fikirler` SET `author` = '".$nickname."',  `body` = '".$text."', `uid` = '".$nk."', `mid` = ".$id.";")&&mysql_query ("Update users set bal='".$contur."' where id ='".$id."'");

	if($sql)
	{
		echo "Fikriniz elave edildi, Te&#351;ekk&#252;r edirik!\n";
		echo "<br/>-----<br/>\n";
		echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";

		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		exit;
	}
	else
	{
		echo "Bazada Problem var 30 saniyyeden sonra tekrar yoxlay&#305;n!<br/>\n";
		echo mysql_error()."<br/>\n";
	}
}
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>