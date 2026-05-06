<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

$_v->title('Smaylikler');
$_v->fsize1($fsize1);
echo '<b>Smaylikler</b><br/>';
$_v->divide();
if($b=='') {
$smiles_cat = @mysql_query ("Select `id`,`name`,`count` from `smiles_cat` WHERE `line` = '1' order by `order` desc;");
if (mysql_affected_rows() == 0){
print '<i>Admin Smaylikler ucun hecbir bolme yaratmay?b.</i><br/>';
}else{
while ($sm = mysql_fetch_array($smiles_cat))
{
print "<a href=\"smile.php?id=$id&amp;ps=$ps&amp;b=".$sm['id']."&amp;ref=$ref\">".$sm['name']."</a> -(".$sm['count'].")<br/>";
}
}
}
else
{
$smiles_cat = @mysql_query ("Select `id`,`name`,`posts`,`count` from `smiles_cat` WHERE `id` = '".$b."' LIMIT 1;");
if (mysql_affected_rows() == 0){
echo '<i>Daxil olmaq istediyiniz bolme tap?lmad?.</i><br/>';
}else{
$sm = mysql_fetch_array($smiles_cat);
$all_sm = $sm['count'];
if ($all_sm == 0){
echo "Bu bolmede hecbir smaylik yoxdur...<br/>\n";   
}else{
echo '<u>'.$sm['name'].'</u> smaylikler, '.$sm['posts'].' postdan yuxar&#305;lar &#252;&#231;&#252;n.<br/>';
$_v->divide();
@$p = (int)$_GET['p'];
$total = (($all_sm - 1) / 10) + 1;
$total =  intval($total);
$p = intval($p);
if(empty($p) or $p < 0) $p = 1;
if($p > $total) $p = $total;
$start = $p * 10 - 10;

$r = mysql_query ("Select `name`,`smile` from `smiles` WHERE `b` = '".$sm['id']."' order by `time` desc LIMIT $start,10;");
while($a=mysql_fetch_array($r)){
$sm_name = $a['name'];
$sm_url = $a['smile'];              
print '<img src="'.$sm_url.'" alt="'.$sm_name.'"/> - '.$sm_name.'<br/>';
}
$url_for_pstr="smile.php?id=$id&amp;ps=$ps&amp;b=$b&amp;p=";
if($p - 3 > 0) $p3left = " <a href=\"".$url_for_pstr.($p-3)."&amp;ref=$ref\">".($p-3)."</a> | ";
if($p - 2 > 0) $p2left = " <a href=\"".$url_for_pstr.($p-2)."&amp;ref=$ref\">".($p-2)."</a> | ";
if($p - 1 > 0) $p1left = " <a href=\"".$url_for_pstr.($p-1)."&amp;ref=$ref\">".($p-1)."</a> | ";

if($p + 3 <= $total) $p3right = " | <a href=\"".$url_for_pstr.($p+3)."&amp;ref=$ref\">".($p+3)."</a>";
if($p + 2 <= $total) $p2right = " | <a href=\"".$url_for_pstr.($p+2)."&amp;ref=$ref\">".($p+2)."</a>";
if($p + 1 <= $total) $p1right = " | <a href=\"".$url_for_pstr.($p+1)."&amp;ref=$ref\">".($p+1)."</a>";
if ($total > 1)
{
$_v->divide();
echo $p3left.$p2left.$p1left.'<b>'.$p.'</b>'.$p1right.$p2right.$p3right.'<br/>';
}
}
}
}
$_v->divide();
if($b!='')
print "<a href=\"smile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#220;mumi Smaylikler</a><br/>";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>