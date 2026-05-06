<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$us=$row["user"];
$posts=$row["posts"];

$takep="&amp;rm=$rm&amp;ref=$ref";

$adm = @mysql_query ("Select user,id from users where id='".$nk."' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$sebebkar = $z["user"];

if ($row["posts"]<50) {
$_v->title('STOP','center');
$_v->fsize1($fsize1);

echo "<b>$sebebkar</b>, &#350;ikayet etmek &#252;&#231;&#252;n sizin 50 Postunuz olmal&#305;d&#305;r.<br/>Adminleri bo&#351; yere narahat etmek olmaz eks halda siz &#246;z&#252;n&#252;z cezalanars&#305;z\n";
echo "<br/>****<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Mesaja Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if ($id==$nk) {
$_v->title('STOP','center');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z haqq&#305;nda &#351;ikayet etmek isteyirsiz?))\n";
echo "<br/>****<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Mesaja Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


$_v->title('&#350;ikayet','center');
$_v->fsize1($fsize1);
switch($go)
{
	default:
	echo "<u>$sebebkar</u>, haqq&#305;nda &#350;ikayet.<br/><u>Qeyd</u>: <i>Sebebsiz &#351;ikayet edenlerin &#246;zleri cezaland&#305;r&#305;l&#305;r!</i>\n";
	echo "<br/>****<br/>\n";
	$_v->action("plaint.php?go=sikay&amp;id=$id&amp;ps=$ps&amp;uid=$nk$takep");
	print $_v->input("<input name=\"sikayet$ref\" maxlength=\"250\" title=\"text\"/>").'<br/>';
	echo "<b>&#350;ikayet n&#246;v&#252;</b>:<br/>\n";

	print $_v->select("<select name=\"nov$ref\">|<option value=\"Reklam Edir\">Reklam Edir</option>|<option value=\"Terbiyesiz Nik\">Terbiyesiz Nik</option>|<option value=\"Tehqir,Soyus\">Tehqir,Soyus</option>|<option value=\"Digeri\">Digeri</option>|</select>",'null').'<br/>';
	print $_v->submit('Done');
	break;


	case 'sikay':
	$adm = @mysql_query ("Select user,id from users where id='".$uid."' LIMIT 1;");
	$z = @mysql_fetch_array ($adm);
	$sebebkar = $z["user"];
	$uid = $z["id"];

	$date = date("d.m.Y [H:i]",$SERVER_TIME); 
	if(empty($sikayet)) $error=$error."<u>Shikayetin neden olduqunu yazmadiniz ))) bele olsa oz nikiviz ban olunar zehmet olmaza neye gore shikayyet etdiyiniz baresinde etrafli qeyd edesiz.</u>\n";
	$sikayet = narmobil($sikayet);
	$q = mysql_query("SELECT * FROM `sikayet` WHERE `uid` = '".$uid."';");
	if(mysql_num_rows($q) != 0)
	{
		echo "<b>$sebebkar</b>, <u>haqq&#305;nda &#350;ikayet edilib.</u> <br/>&#350;ikayetci tezlikle Admin terefinden yoxlan&#305;lacaq.\n";
		break;
	}

	@mysql_query("insert into sikayet values(0,'$id','$us','$uid','$sebebkar','$sikayet','$nov','$date');");

	echo "Sizin <b>".$sebebkar."</b>, haqq&#305;nda &#351;ikayetiniz qeyd edildi!<br/>\n";
	echo "<i>Tezlikle Adminstrator</i> <b>".$sebebkar."</b>, <i>haqq&#305;nda tedbir g&#246;recek...</i>\n";
	break;
}


echo "<br/>---<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;$ref\">Mesaja Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>