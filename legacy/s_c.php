<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


if($p_arr['5']!=1){
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Sizin <u>&#350;ikayet</u>-leri yoxlamaqa icazeniz yoxdur:)<br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$_v->title('&#350;ikayetler');
$_v->fsize1($fsize1);

$q = mysql_query("select * from `sikayet` order by `id` desc;");
if (mysql_affected_rows() == 0) {
	print "Yeni &#350;ikayyet yoxdur halald&#305; vezifelilere:)<br/>----<br/>\n";
}
else
{
	if(empty($d))
	{
		echo "<b>Şikayyetler</b>, (<a href=\"s_c.php?id=$id&amp;ps=$ps&amp;d=all&amp;ref=$ref\">xXx</a>)<br/>----<br/>\n";
		while($arr=mysql_fetch_array($q)) {
		$sikayyetci = $arr["sikayyetci"];
		$cinayetkar = $arr["cinayetkar"];
		print "".$arr["id"].") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$arr['us']."\">$sikayyetci</a> - &#350;ikayet edir: (<b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$arr['uid']."\">$cinayetkar</a></b>) nikinden: <u>Sebeb</u> - <b>".$arr["nov"]."</b>, <br/><b>Qeyd</b>: <i>".$arr['sikayet']."</i> [<a href=\"s_c.php?d=del&amp;id=$id&amp;ps=$ps&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>----<br/>\n";
		}
	}
	elseif($d=='all') 
	{
		mysql_query("TRUNCATE TABLE `sikayet`;");
		print "<b>&#350;ikayetler silindi!</b><br/>\n";
		echo "----<br/>\n";
	}
	else
	{
		if(mysql_query("delete from sikayet where id='$mid' limit 1;"))
		{
			print "<b>&#350;ikayet silindi!</b><br/>\n";
			echo "----<br/><a href=\"s_c.php?id=$id&amp;ps=$ps&amp;r=$ref\">&#350;ikayetler</a><br/>\n";
		}
	}
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>