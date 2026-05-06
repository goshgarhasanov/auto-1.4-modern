<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if($rm==10) $takep="&amp;rm=$rm&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;rm=$rm&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;rm=$rm&amp;ref=$ref";

if($p_arr['45']!=1)
{
	$_v->title('Olmaz','center');
	$_v->fsize1($fsize1);
	echo "Sizin buna h&#252;ququnuz yoxdur!<br/>----<br/>\n";
	echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


if(!isset($go))
{
	$tp = @mysql_query ("Select topic from rooms where rm = '".$rm."'");
	$fm = @mysql_fetch_array($tp);
	$topick = $fm["topic"];

	$_v->title('Topiki Deyi&#351;','center');
	$_v->fsize1($fsize1);
	$_v->action("topic.php?go=nt&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep");
	echo "Yeni Topik:<br/>\n";
	print $_v->input("<input name=\"newtop$ref\" maxlength=\"150\" value=\"$topick\"/>").'<br/>';
	print $_v->submit1('Deyi&#351;dir');
	$_v->wml('<br/>');
	$_v->divide();
	echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$_v->title('Topik Yenilendi','center');
$_v->fsize1($fsize1);
echo "Topik Deyi&#351;dirildi!<br/>----<br/>\n";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);

$newtop = trim(" $newtop ");
$newtop = ereg_replace(" +"," ",$newtop);
$newtop=substr($newtop,0,150);
$newtop = narmobil($newtop); 
mysql_query ("UPDATE rooms SET topic = '".$newtop."' WHERE rm = '".$rm."'");
$_v->end('1',$link);
?>