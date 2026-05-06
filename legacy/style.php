<?php
require("inc.php");
$link = connect_db();

if($id and $ps)
{
	list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
}

$file = @file("file/dat_folder/n_n/style.dat");
$number_4 = trim($file[3]);
$_v->title($site.' Style','center');
$_v->fsize1('small');

$_v->align('left');

$url_string = ($id and $ps) ? "?id=$id&amp;ps=$ps&amp;ref=$ref" : "?ref=$ref";
if($id and $ps)
{
if ( isset( $_GET['vers'] ) )
{
mysql_query( "Update `users` set `version`='".$_v->ver."' WHERE `id` = '".$id."';" );
}
}
$_v->html('<div class="links">');
print '<img src="css/img/wml.gif"/> - <a href="style.php'.$url_string.'&amp;vers=wml"><b>WML</b> (Rengsiz Sade) versiya.</a><br/>';
$_v->html('</div>');
if($_v->ver=="wml")$_v->divide('wml');
if ($number_4 =="1") {
$_v->html('<div class="links">');
print '<img src="css/img/vista3.gif"/> - <a href="style.php'.$url_string.'&amp;vers=vista3"><b>Vista</b> (Milli Bayraq) versiya.</a><br/>';
$_v->html('</div>');
if($_v->ver=="wml")$_v->divide('wml');
}
$_v->html('<div class="links">');
print '<img src="css/img/win.gif"/> - <a href="style.php'.$url_string.'&amp;vers=win"><b>Windows</b> (Rengli) versiya.</a><br/>';
$_v->html('</div>');
if($_v->ver=="wml")$_v->divide('wml');

$_v->html('<div class="links">');
print '<img src="css/img/vista1.gif"/> - <a href="style.php'.$url_string.'&amp;vers=vista1"><b>Vista</b> (Sar&#305; Rengli) versiya.</a><br/>';
$_v->html('</div>');
if($_v->ver=="wml")$_v->divide('wml');

$_v->html('<div class="links">');
print '<img src="css/img/vista2.gif"/> - <a href="style.php'.$url_string.'&amp;vers=vista2"><b>Vista</b> (Ya&#351;&#305;l Rengli) versiya.</a><br/>';
$_v->html('</div>');
$_v->divide();

if($row['id']) print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
else print "<a href=\"index.php?ref=$ref\">Ana Sehfe</a><br/>\n";




$_v->fsize2('small');
$_v->End('1',$link);
?>