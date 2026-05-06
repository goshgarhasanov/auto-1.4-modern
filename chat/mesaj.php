<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($row["msgphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Mesajlar Bolmasine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayna</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if($rm!="")$takep = "&amp;rm=$rm&amp;ref=$ref";
else
$takep = "&amp;ref=$ref";

$msn = $row['msn'];
$r = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");
$a = mysql_fetch_array($r);
$num = $a["num"];
if($msn!=$num)
mysql_query("UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';");

if ($num == 0)
{
	$_v->Redirect("on.php?id=$id&amp;ps=$ps$takep",'15');
	$_v->title('Mesaj Yoxdur','center');
	$_v->fsize1($fsize1);
	echo "<b>Yeni Mesaj Yoxdur</b><br/>\n";
	print $divide;
	print '10 Saniyyeden sonra Online Mesaj-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}  

ob_start();
$_v->title('Mesaj');
$_v->fsize1($fsize1);
$_v->html('<div align="center">');
echo "<b>Gelen Mesajlar:</b>\n";
echo "(".$num.") <br/>\n";
$_v->html('</div>');
$_v->divide();


$next_id = next_id($num);
$i = 0;
$r = mysql_query ("Select who,idwho,time,klu4,readd from mesaj WHERE (idtowhom = '".$id."')and(ininc ='1')and(readd ='0') order by time desc limit $next_id[start],$next_id[max_page];");
while($object = mysql_fetch_object($r)) 
{
	$_v->html('<div class="links">');
	echo "<b><a href=\"msg.php?id=$id&amp;ps=$ps&amp;im=$object->klu4&amp;s=$s$takep\">".$object->who."".$topic."</a></b> [".time_date($object->time)."] <a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$object->idwho$takep\">Arxiv</a><br/>\n";
	$_v->html('</div>');
}

if($next_id['a'] > $next_id['max_page'])
{
	$_v->divide();
	echo page_next("mesaj.php?id=$id&amp;ps=$ps$takep", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

$_v->divide();
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">&#199;ata qay&#305;t</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>