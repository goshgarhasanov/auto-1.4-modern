<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$us=$row['user'];
$posts=$row['posts'];


$sm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM smiles "));


echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"faq\" title=\"Smaylikler(".$sm[0].")\">";
echo "<p align=\"left\">";

if(isset($HTTP_GET_VARS['bol'])) {$bol = $HTTP_GET_VARS['bol'];}
if($bol=="") {
echo $fsize1;
echo "<b>Smaylikler</b>(".$sm[0].")<br/>---<br/>\n";
$bol = mysql_query( "select bolme,name from bolmes" );
while ( $arr = mysql_fetch_array( $bol ) )
{
$small = mysql_query ("select count(id) as num from smiles where bolme = ".$arr['bolme']."");
$sm = mysql_fetch_array($small);
$num = $sm["num"];
echo "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;bol=".$arr['bolme']."\">".$arr['name']."</a>($num)<br/>\n";
}
echo $fsize2;
}else{

$small = mysql_query ("select count(id) as num from smiles where bolme = $bol");
$sm = mysql_fetch_array($small);
$num = $sm["num"];
if(empty($page)) $page=0;
$max=5;
$total_pages=ceil($num/$max);
$max_pages=($total_pages-1)*5;
$printm=mysql_query("select id,pos,img,who from `smiles` where bolme = $bol order by id asc limit ".$page.",".($max)."");

echo $fsize1;

$bolmeselect0 = @mysql_query ("Select name from bolmes where bolme=$bol");
$bolmes0 = @mysql_fetch_array($bolmeselect0);
$boladi = $bolmes0["name"];

echo "<b>Smayllar:</b> ".$boladi."<br/><br/>\n";
if($num=="0") {
echo "Smayl m&#246;vcud deyil.<br/>\n";
}else{
while($arr = @mysql_fetch_array($printm)) {
$sid = $arr["id"];
$who = $arr["who"];
$pos = $arr["pos"];
$img = $arr["img"];
echo "<img src=\"smiles/$img\" alt=\".$pos.\"/><br/>".$pos."<br/><br/>";
}

$page_number=$num*$max;
$next_page=$page+5;
$last_page=$page-5;
$go_page=$p*5;
$page_number=$num*$max;
if($next_page>5) {
print "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;page=$last_page&amp;bol=$bol\">&lt;&lt;&lt;</a><br/>";
}
if($num>$next_page) {
print "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;page=$next_page&amp;bol=$bol\">&gt;&gt;&gt;</a><br/>";
}
}
echo $fsize2;
}

echo $fsize1;
echo $divide;
$sm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM smiles "));

if(isset ($bol))echo "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smaylikler</a>(<b>".$sm[0]."</b>)<br/>";

if(isset ($rm))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>