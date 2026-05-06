<?php
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$q=@mysql_query("select content,title,login from obiav where id='".$mid."' order by id desc;");
$arr=@mysql_fetch_array($q);
$title=$arr['title'];

function bricode($text){
$text = str_replace("[/b]", "</b>", $text);
$text = str_replace("[b]", "<b>", $text);
$text = str_replace("[/u]", "</u>", $text);
$text = str_replace("[u]", "<u>", $text);
$text = str_replace("[/i]", "</i>", $text);
$text = str_replace("[i]", "<i>", $text);
$text = str_replace("[br]", "<br/>", $text);
return $text;
}



$_v->title($title,'center');
$_v->fsize1($fsize1);
echo "<b>$title</b>\n";
$_v->align('left');

echo bricode($arr['content']);
echo "<br/>----<br/><u>M&#252;ellif:</u> <b>".$arr['login']."</b><br/>";
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>