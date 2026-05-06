<?php
require("inc.php");
$ref = rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $p_arr) = check_login($link);

if($row['level']!='9'){
$_v->title('Olmaz','center');
$_v->fsize1($fsize1);
echo "Daxil Olma Icazeniz Yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}
$_v->title("Filtr Panel", "left");
$_v->fsize1($fsize1);
switch($go){
default:
echo "<b>Filtr Panel</b><br/>$divide\n";

if($_v->ver == "wml"){
echo "<b>Filtr Panel</b><br/>";
echo "<b>Soz:</b><br/>";
echo "<input name=\"filtr\" maxlength=\"15\" value=\"\" title=\"Soz\" emptyok=\"false\"/><br/>\n";
echo "<b>Evezleyici Soz:</b><br/>";
echo "<input name=\"filtre\" maxlength=\"15\" value=\"\" title=\"Evezleyici Soz\" emptyok=\"false\"/><br/>\n";
echo "(<anchor>Elave Et<go href=\"filtr_panel.php?go=add&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"filtr\" value=\"$(filtr)\"/>";
echo "<postfield name=\"filtre\" value=\"$(filtre)\"/>";
echo "</go></anchor>)<br/>";
$a = mysql_query("select count(id) from filtr");
$b = mysql_result($a,0);

}else{

$_v->action("filtr_panel.php?go=add&amp;id=$id&amp;ps=$ps&amp;ref=".$ref);
echo "S&#246;z:<br/>\n";
print $_v->input( "<input type=\"text\" name=\"filtr$ref\"/>",$ref)."<br/>\n";
echo "Evezleyici:<br/>\n";
print $_v->input( "<input type=\"text\" name=\"filtre$ref\"/>",$ref)."<br/>\n";
print $_v->submit("Elave Et");
echo $divide;
$a = mysql_query("select count(id) from filtr");
$b = mysql_result($a,0);

}
echo "<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all\">Filtirlenmi&#351; S&#246;zler</a> - ($b)<br/>"; 
break;



case "edit";
$select = @mysql_query ("Select `id`,`soz`,`evez` from `filtr` where `id`='".$filtr_id."';");
$inf = mysql_fetch_array ($select);
mysql_free_result($select);
$evez=$inf["evez"];
$soz=$inf["soz"];


if(!isset($_POST['action'])){
echo "<b>Filtr Edit Panel</b><br/>$divide\n";
$_v->action("filtr_panel.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;filtr_id=".$filtr_id);
echo "S&#246;z:<br/>\n";
print $_v->input("<input type=\"text\" value=\"".$inf['soz']."\" name=\"filtr$ref\"/>",$ref)."<br/>\n";
echo "Evezleyici:<br/>\n";
print $_v->input("<input type=\"text\" value=\"".$inf['evez']."\" name=\"filtre$ref\"/>",$ref)."<br/>\n";
print $_v->submit("Deyi&#351;dir","action=ok");
}else{
if($_POST['filtr'] == ""){
echo "Qada&#287;an Olunmu&#351; S&#246;z Yaz&#305;lmay&#305;b!<br/>";
}elseif($_POST['filtre'] == ""){
echo "Evezleyici S&#246;z Daxil Edilmeyib!<br/>";
}else{
mysql_query("UPDATE `filtr` SET `soz` = '".$_POST['filtr']."' , `evez` = '".$_POST['filtre']."' where `id`='".$inf["id"]."';");
echo "Tebrikler S&#246;z U&#287;urla Deyi&#351;dirildi!<br/>";
}
echo "<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all\">Geri D&#246;n</a><br/>"; 
}
break;

case "add";

$a = mysql_query("select * from `filtr` where `soz` = '".$_POST['filtr']."';");
$b = mysql_num_rows($a);
if($_POST['filtr'] == ""){
echo "Qada&#287;an Olunmu&#351; S&#246;z Yaz&#305;lmay&#305;b!<br/>";
}elseif($_POST['filtre'] == ""){
echo "Evezleyici S&#246;z Daxil Edilmeyib!<br/>";
}else{
mysql_query("insert into `filtr` set `soz` = '".$_POST['filtr']."' , `evez` = '".$_POST['filtre']."';");
echo "Tebrikler S&#246;z U&#287;urla Elave Edildi!<br/>";
}
break;

case "all";
$FILTR = mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM filtr"));
$total = trim($FILTR[0]);

echo "<b>Filtirlenmi&#351; S&#246;zler</b> -(<b>".$total."</b>)<br/>"; 
echo $divide;
if ($_GET['kill'] != ""){
$a = mysql_query("select * from `filtr` where `id` = '".$_GET['kill']."'");
$b = mysql_num_rows($a);
if ($b > 0){
echo "S&#246;z U&#287;urla Filtrden Silindi.<br/>";
mysql_query("delete from `filtr` where `id` = '".$_GET['kill']."'");
echo "<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all\">Geri D&#246;n</a><br/>";
break;
}else{
echo "Bele Bir S&#246;z A&#351;kar Edilmedi!<br/>";
echo "<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all\">Geri D&#246;n</a><br/>";
break;
}
}else{
$next_id = next_id($total,"15");
$i = $next_id[start];
$SQL = @MYSQL_QUERY("SELECT id,soz,evez FROM filtr WHERE `id` != '0' ORDER BY id DESC LIMIT $next_id[start],$next_id[max_page];");
IF(@MYSQL_AFFECTED_ROWS() == FALSE){
echo "Filtirlenmi&#351; S&#246;zler qeyde al&#305;nmay&#305;b...<br/>\n";
}
WHILE($OBJ = @MYSQL_FETCH_OBJECT($SQL)){
echo ($i+1).") <a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=edit&amp;filtr_id=".$OBJ->id."\">".$OBJ->soz." = > ".$OBJ->evez."</a> -[<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all&amp;kill=".$OBJ->id."\">x</a>]<br/>";
++$i;
}
if($next_id['a'] > $next_id['max_page']){
echo $divide;
echo page_next("filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=all", $next_id['a'], $next_id['max_page'], $next_id['page']);
}
break;
}
}

echo $divide;
if($go)echo "<a href=\"filtr_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Filtr Panel</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
?> 