<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$takep = "&amp;ref=$ref";

switch($mod)
{
case 'delall':
if (isset($go))
{
	mysql_query ("update zapiski set insend = '0' WHERE idwho = '".$id."';");
	mysql_query ("update zapiski set ininc = '0' WHERE idtowhom = '".$id."';");
	mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0');");
	$_v->title('B&#252;t&#252;n Mektublar silindi','center');
	$_v->Redirect("mektub.php?id=$id&amp;ps=$ps&amp;ref=$ref",'5');
	$_v->fsize1($fsize1);
	echo "B&#252;t&#252;n Mektublar silindi.<br/>----<br/>";
	print '5 Saniyyeden sonra Mekublara-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektublar</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
if (!ctype_digit($im)) { header("Location: index.php"); die; }

$ob = mysql_fetch_object(mysql_query("Select idtowhom,idwho from zapiski WHERE klu4 = '".$im."' LIMIT 1;"));
if ((mysql_affected_rows() != 0)&&(($ob->idtowhom==$id)||($ob->idwho==$id)))
{
	if (isset($insend)) mysql_query ("update zapiski set insend = '0' WHERE klu4 = '".$im."' ");
	if (isset($ininc)) mysql_query ("update zapiski set ininc = '0' WHERE klu4 = '".$im."' ");
	mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0')");
	
	$_v->title('Mektub silindi','center');
	$_v->Redirect("mektub.php?id=$id&amp;ps=$ps&amp;ref=$ref",'5');
	$_v->fsize1($fsize1);
	echo "Mektub silindi!<br/>----<br/>";
	print '5 Saniyyeden sonra Mekublara-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektublar</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
else
{
	$_v->title('Xeta','center');
	$_v->Redirect("mektub.php?id=$id&amp;ps=$ps&amp;ref=$ref",'5');
	$_v->fsize1($fsize1);
	echo "Mektub movcut deyil!<br/>----<br/>";
	print '5 Saniyyeden sonra Mekublara-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektublar</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
break;

case 'delusermsg':
	settype($usid, 'integer');
	$select = mysql_query ("select id,user from users where id = '".$usid."'");
	$rows = mysql_fetch_array ($select);
	$user = $rows["user"];
	if (isset($insend)) mysql_query ("update zapiski set insend = '0' WHERE idwho = '".$id."' and idtowhom = '".$usid."'");
	if (isset($ininc)) mysql_query ("update zapiski set ininc = '0' WHERE idtowhom = '".$id."' and idwho = '".$usid."'");
	mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0') and idtowhom = '".$id."'");
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "<b>".$user."</b>-den gelen b&#252;t&#252;n mesajlar silindi!<br/>";
	$_v->divide();
	echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektublar</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
break;
}
?>