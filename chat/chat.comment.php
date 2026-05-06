<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";


$_v->title('Mesaj yaz');
$_v->fsize1($fsize1);

$_v->action("chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep");
echo "&#220;mumi Mesaj:<br/>\n";
print $_v->input("<input name=\"msg$ref\" maxlength=\"400\" title=\"Text\"/>").'<br/>';

	if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
	{
		$option = "<select name=\"shr$ref\" multiple=\"true\">|";
		if($p_arr['210']==1)$option .= "<option value=\"1\">Kursiv</option>|";
		if($p_arr['211']==1)$option .= "<option value=\"2\">Alt&#305; Xetli</option>|";
		if($p_arr['212']==1)$option .= "<option value=\"3\">Qal&#305;n</option>|";
		if($p_arr['213']==1)$option .= "<option value=\"4\">B&#246;y&#252;k</option>|";
		$option .= "</select>";
		print $_v->select($option).'<br/>';
	}
	
print $_v->submit('G&#246;nder','action=save');

$_v->divide();
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Otaqa qay&#305;t</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>