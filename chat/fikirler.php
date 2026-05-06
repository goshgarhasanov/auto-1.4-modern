<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
require(DOCUMENT_ROOT."file/inc/settings.inc");

$nk = intval($_GET['nk']);
$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$nk."';");
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) == 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Istifade&#231;i tap&#305;lmad&#305;!<br/>";
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;&amp;$ref\">Online Mesaj</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;&amp;$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$nick = mysql_result($sql, 0);

$user = mysql_fetch_array($q);
$nk = $user['id'];
$nick = $user['user'];

$q = mysql_query("SELECT * FROM `fikirler` WHERE `uid` = '".$nk."';");

$_v->title($nick.' haqq&#305;nda terifler');
$_v->fsize1($fsize1);


if($go=='moder')
{
	if ($id==1)
	{
		$tid = intval($_GET['tid']);
		$sql = mysql_query("DELETE FROM `fikirler` WHERE `id` = '".$tid."';");
		if(mysql_affected_rows() == 0)
		{
			echo "Yaz&#305; tap&#305;lmad&#305;.<br/>";
		}
		else
		{
			echo "yaz&#305; silind&#305;.<br/>";
		}
	}
	else
	{
		echo "Sizin Buna H&#252;ququnuz &#231;atm&#305;r<br/>";
	}
	
	$_v->divide();
	echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

if($go=='user')
{
	$tid = intval($_GET['tid']);
	$sql = mysql_query("DELETE FROM `fikirler` WHERE `id` = '".$tid."';");
	if(mysql_affected_rows() == 0)
	{
		echo "Yaz&#305; tap&#305;lmad&#305;.<br/>";
	}
	else
	{
		echo "yaz&#305; silind&#305;.<br/>";
	}
	
	$_v->divide();
	echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$qes = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);

if($su=='0')
{
	echo "<b>$nick</b>, haqq&#305;nda terif qeyd edilmeyib...<br/>";
}
else
{
	echo "<b>$nick</b>, - Haqq&#305;nda yaz&#305;lm&#305;&#351; terifler.<br/>\n";
	echo "<u>Terif say&#305;: (<b>$su</b>)</u><br/>";
}
$_v->divide();
if(mysql_num_rows($q) == 0)
{
	echo "Terif ve ya q&#305;z&#305;l s&#246;z yazmaq,<br/><b>".$seg['infocomment']." bal</b> deyerindedir.<br/>";
}
$query = @mysql_query("SELECT COUNT(*) FROM `fikirler` WHERE `uid` = '".$nk."' ;");
$all = @mysql_result($query, 0);

if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $all) $s = 0;
$c = $s + 1;
$query = mysql_query("SELECT * FROM `fikirler` WHERE `uid` = '".$nk."' ORDER BY `id` ASC LIMIT $s, 10 ;");

while($meets = mysql_fetch_array($query))
{
	$tid = $meets['id'];
	$adam = $meets['author'];
	$metn = $meets['body'];
	$mid = $meets['mid'];

	if($id == $id && $nk == $id) echo "[<a href=\"fikirler.php?go=user&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;tid=$tid&amp;rm=$rm&amp;$ref\">sil </a>]";
	if ($id=="1")echo "[<a href=\"fikirler.php?go=moder&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;tid=$tid&amp;rm=$rm&amp;$ref\">x</a>]";
	echo "<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$mid&amp;rm=$rm&amp;$ref\">$adam </a></b><br/>";
	echo "*$metn<br/>";
}
echo "-----";
if ($s > 2) echo "<br/><a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;s=".($s-10)."&amp;$ref\">лл Geri</a> | ";
{
	if ($all > $s + 10)   print "<br/><a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;s=".($s+10)."&amp;$ref\">N&#246;vbeti &#xbb;&#xbb;</a>";
}

echo "<br/>[<a href=\"fikiradd.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Terif Yaz</a>]<br/>\n";
$_v->divide();
if ((isset($rm))&&($rm!=""))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">&#199;ata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;&amp;$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>