<?
require("inc.php");
$link = connect_db();

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

if($row['level']!='9'){
$_v->title('Xeta','left');
$_v->fsize1($fsize1);
echo "Basin Girmeyen Yere Bedenini Soxma Get Master Olanda Gelersen imza:<b>B3RD3N!CK</b><br/>****<br/>\n";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$_v->title('Xatire Defter Panel');
$_v->fsize1($fsize1);

require(DOCUMENT_ROOT."file/inc/settings.inc");

if(!isset($_POST['infocomment'])){
$_v->action("xatire_panel.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Terif s&#246;z yazmaq: <br/>\n";
print $_v->input("<input name=\"infocomment\" value=\"".$seg['infocomment']."\" size=\"7\"/>")."-Bal<br/>\n";

print $_v->submit('Yenile');

} else {
$fpp = fopen(DOCUMENT_ROOT."file/inc/settings.inc", 'w');
$data .= '<?php // CREATED BY: B3RD3N!CK'."\n";
$data .= '$seg = array('."\n";
$data .= '    "infocomment" => "'.intval($_POST['infocomment']).'",'."\n";
$data .= ');'."\n";
$data .= '?>';
fputs($fpp, $data);
fclose($fpp);
echo "Melumat deyi&#351;dirildi..<br/>";
echo "<a href=\"xatire_panel.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
} 
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>