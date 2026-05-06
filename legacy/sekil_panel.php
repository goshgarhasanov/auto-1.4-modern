<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($id!=1){
$_v->title( "Xeta", "center" );
$_v->fsize1( $fsize1 );
echo "Sizin bu b&#246;lmeye icazeniz yoxdur!<br/>";
$_v->divide( );
print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
$_v->fsize2( $fsize2 );
$_v->end( "1", $link );
exit();
}
$user = $row['user'];
if($_GET['go']=='sekil_yukle'){
if($_v->ver=='wml'){
$_v->ver="vista1";
}
}
ob_start();
$_v->title( "Sekil Panel", "left" );
$_v->fsize1( $fsize1 );
$time = date("H:i");
switch ($go) {

default :
$vd=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller"));
$sekil = trim($vd[0]);
echo "<b>Sekil Panel</b><br/>\n";
$_v->divide( );

echo "<b>[<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekil_yukle&amp;ref=$ref\">Sekil elave et</a>]</b><br/>\n";
echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekiller&amp;ref=$ref\">Bazadak&#305; Sekiller</a>(<b>".$sekil."</b>)<br/>\n";
echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=edit_sekil&amp;ref=$ref\">Sekil B&#246;lme Adlar&#305;</a><br/>\n";
break;

case 'sekil_yukle':
echo "<b>Sekil Elave et</b><br/>\n";
$_v->divide( );
if(empty($action)) {
echo "<form ENCTYPE=\"multipart/form-data\" action=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;v=2&amp;go=sekil_yukle&amp;ref=$ref\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"action\" value=\"add\"/>\n";
echo "Sekil ad&#305;: (<u>Meselen</u>: <b>Atiye Deniz</b>)<br/>\n";
echo "<input type=\"text\" name=\"text\" /><br/>\n";
echo "Fayl:<br/>\n";
echo "<input type=\"file\" name=\"sekil\" /><br/>\n";

echo "B&#246;lme se&#231;:<br/>\n";
echo "<select name=\"bolme\">";
$bolw = mysql_query( "select bolme,name from sekil_bolme" );
while ( $arr = mysql_fetch_array( $bolw ) )
{
echo "<option value=\"".$arr['bolme']."\">".$arr['name']."</option>\n";
}
echo "</select><br/>\n";
echo "<input type=\"submit\" name=\"action\" value=\"Elave et\">\n";
echo "</form>\n";
}else{

if(empty($sekil)) {
echo "<b>Sekil Fayl&#305; Se&#231;memisiz.</b><br/>\n";
break;
}
mysql_query("Select id from sekiller WHERE pos='".$text."'");
if (mysql_affected_rows()!==0){ 
echo "<b>Art&#305;q bele Sekil Fayl&#305; m&#246;vcuddur!</b><br/>\n";
break;
}
$size = filesize($sekil);
if($size>10000240){
echo "<b>Sekil Fayl&#305;n hecmi 10 MB-dan &#231;ox olmamal&#305;d&#305;r!</b><br/>";
break;
}
$aktiv = array("gif", "png", "jpg", "jpeg");
$pathinfo = pathinfo($_FILES['sekil']['name']);
if (!in_array(strtolower($pathinfo['extension']), $aktiv))
{
echo "<b>Sekil GIF , PNG, JPG ve JPEG formatlar&#305;nda olmal&#305;d&#305;r!</b><br/>\n";
break;
}
$i = 1;
while ($i < strlen($_FILES['sekil']['name']))
{
if (0 < strpos($_FILES['sekil']['name'], ".", $offst))
{
$bf = strpos($_FILES['sekil']['name'], ".", $offst);
$offst = $bf + 1;
}
++$i;
}
$photo_type = substr($_FILES['sekil']['name'], $bf, strlen($_FILES['sekil']['name']) - $bf + 1);
$site_photo = str_replace('.', '_', $site);
$adi = "".$site_photo."_".rand(1000000, 9999999)."".$photo_type."";
mysql_query("Insert into sekiller set pos='".$text."', img='".$adi."', bolme ='".$bolme."', who ='".$row['user']."', vaxt ='".date("d-m-y | H:i")."'");
if (file_exists("sekil/$adi")){
unlink ("sekil/$adi");
}	
Copy($sekil, "sekil/".basename($adi));  
echo "<b>Sekil Fayl&#305; elave olundu...</b><br/>\n";
}
break;

case "edit_sekil":
echo "<b>Sekil B&#246;lme Adlar&#305;</b><br/>\n";
$_v->divide( );
$bolm = mysql_query( "select bolme,name from sekil_bolme" );
if ( empty( $act ) )
{
while ( $arr = mysql_fetch_array( $bolm ) )
{
echo "<a href=\"sekil_panel.php?act=rnm&amp;id={$id}&amp;ps={$ps}&amp;go=edit_sekil&amp;bolme=".$arr['bolme']."\">".$arr['bolme'].". ".$arr['name']."</a><br/>";
}
}
else if ( $act == "dornm" )
{
$bolmename = mysql_escape_string( $bolmename );
settype( $bolme, "integer" );
mysql_query( "update sekil_bolme set name='".$bolmename."' where bolme='".$bolme."'" );
echo "<a href=\"sekil_panel.php?id={$id}&amp;ps={$ps}&amp;go=edit_sekil\">Sekil Bolme Adlar&#305;</a> deyi&#351;dirildi!<br/>\n";
}
else
{

$roomselect = @mysql_query ("Select `name` from `sekil_bolme` where `bolme`='".$bolme."';");
$rooms = @mysql_fetch_array($roomselect);
$name=$rooms["name"];

$_v->action("sekil_panel.php?act=dornm&amp;id={$id}&amp;ps={$ps}&amp;go=edit_sekil&amp;bolme={$bolme}&amp;ref={$ref}");
echo "B&#246;lmenin Ad&#305;:<br/>\n";
echo $_v->input("<input name=\"bolmename\" maxlength=\"200\" value=\"$name\" title=\"bolmename\"/>")."<br/>\n";
echo $_v->submit("Yenile");
$_v->divide( );
echo "<a href=\"sekil_panel.php?id={$id}&amp;ps={$ps}&amp;go=edit_sekil&amp;ref={$ref}\">Sekil B&#246;lme Adlar&#305;</a><br/>";
}

break;

case 'sekiller':
if(isset($_GET['bol'])) {$bol = $_GET['bol'];}
if($bolw=="") {
echo "<b>Sekiller</b><br/>\n";
$_v->divide( );
$bolw = mysql_query( "select bolme,name from sekil_bolme" );
while ( $arr = mysql_fetch_array( $bolw ) )
{
$small = mysql_query ("select count(id) as num from sekiller where bolme = ".$arr['bolme']."");
$sm = mysql_fetch_array($small);
$num = $sm["num"];
echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekiller&amp;bolw=".$arr['bolme']."\">".$arr['name']."</a> -(".$num.")<br/>\n";
}
}else{

$small = mysql_query ("select count(id) as num from sekiller where bolme = ".$bolw."");
$sm = mysql_fetch_array($small);
$num = $sm["num"];
if(empty($page)) $page=0;
$max=15;
$total_pages=ceil($num/$max);
$max_pages=($total_pages-1)*5;
$printm=mysql_query("select id,pos,img,who from `sekiller` where bolme = ".$bolw." order by id asc limit ".$page.",".($max)."");

$sekil_bolmeelect0 = @mysql_query ("Select name from sekil_bolme where bolme=$bolw");
$sekil_bolme0 = @mysql_fetch_array($sekil_bolmeelect0);
$boladi = $sekil_bolme0["name"];

echo "<b>Sekiller:</b> ".$boladi."<br/>\n";
$_v->divide( );
if($num=="0") {
echo "Sekil m&#246;vcud deyil.<br/>\n";
}else{
while($arr = @mysql_fetch_array($printm)) {
$sid = $arr["id"];
$who = $arr["who"];
$pos = $arr["pos"];
$img = $arr["img"];
$olchu=@filesize("sekil/".$arr["img"]."");
$olchu_ed=$olchu.' b';
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Kb';
}
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Mb';
}

$style_cerceve = "style=\"width: 90px; height: 90px; position: relative; z-index: 2;\"";
$style_albom = "style=\"width: 60px; height: 60px; position: relative; right:83px; z-index: 1; ".($_v->ver == "wml" ? "bottom: 16px;" : null)."\"";
$style_text = "style=\"right:65px; position: relative; ".($_v->ver == "wml" ? "bottom: 40px;" : null)."\"";

if($_v->ver == "wml") echo "<span style=\"position: relative; bottom: 40px;\">";
echo "[<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=del_sekil&amp;sid=$sid&amp;ref=$ref\">Sil</a>]";
if($_v->ver == "wml") echo "</span>";
echo "<img {$style_cerceve} src=\"css/img/folder.png\" alt=\"cerceve\"/> <img {$style_albom} src=\"sekil_screen.php?img=sekil/".$arr["img"]."&amp;w=140&amp;h=140\" alt=\"".$arr["pos"]."\"/> <span {$style_text}><b>".$pos."</b> -(<b>".$olchu_ed."</b>)</span><br/>";
}

$page_number=$num*$max;
$next_page=$page+5;
$last_page=$page-5;
$go_page=$p*5;
$page_number=$num*$max;
if($next_page>5) {
print "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekiller&amp;page=$last_page&amp;bolw=$bolw\">&lt;&lt;&lt;</a><br/>";
}
if($num>$next_page) {
print "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekiller&amp;page=$next_page&amp;bolw=$bolw\">&gt;&gt;&gt;</a><br/>";
}
}
}

break;


case 'del_sekil':
if(isset($_GET['sid'])) {$sid = $_GET['sid'];}
$select = @mysql_query ("Select id,pos,img from sekiller where id='".$sid."'");
$inf = mysql_fetch_array ($select);

$update = mysql_query("DELETE FROM `sekiller` WHERE `id` = '".$sid."';");
if($update){
unlink ("sekil/".$inf["img"]);
echo "Sekil Fayl Silindi...<br/>\n";
}else{
echo "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
}

echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;go=sekiller&amp;ref=$ref\">Bazadak&#305; Sekiller</a><br/>\n";


break;

}
$_v->divide();
if($go){
echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Sekil Panel</a><br/>\n";
}else{
echo "<a href=\"sekil.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Sekil Baza</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;go=mp3ler&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2( $fsize2 );
$_v->end( "1", $link );
ob_end_flush();
?>