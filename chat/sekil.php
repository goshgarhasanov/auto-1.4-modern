<?php
$PHP_SELF = basename( $_SERVER['PHP_SELF'] );
$idpass2 = "ref=".$ref;
$idpass = "ref=".$ref;

$style_cerceve = "style=\"width: 90px; height: 90px; position: relative; z-index: 2;\"";
$style_albom = "style=\"width: 60px; height: 60px; position: relative; right:83px; z-index: 1; ".($_v->ver == "wml" ? "bottom: 16px;" : null)."\"";
$style_text = "style=\"right:65px; position: relative; ".($_v->ver == "wml" ? "bottom: 40px;" : null)."\"";


if( $PHP_SELF == 'sekil.php' ) {
   require("inc.php");
   $link = connect_db();
   $vd = mysql_fetch_array( mysql_query( "SELECT COUNT(id) FROM sekiller" ) );
   $sekil = trim( $vd[0] );
   $v_max = 10;
   $bol = trim( $_GET['bol'] );
   
function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "N&#246;vbeti &#187;";
$_PREVPAGE = "&#171; Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}




function int( $str ) {
      return strtolower( preg_replace( array( '/[^0-9]/' ), '', $str ) );
   }
   function pagestart( $total, $max ) {
      global $_GET;
      $page = (!isset( $_GET['page'] )) ? 0 : intval( $_GET['page'] );
      $page = preg_replace( '/[^0-9]/', '', $page );
      $start = (!isset( $_GET['page'] )) ? 0 : ($page * $max);
      if( ceil( $total / $max ) < $page ) {
         $start = 0;
      } return array( $page, $start, $max );
   }
   if( $id != '' ) {
      list($row, $id, $ps, $fsize1, $fsize2, $p_arr) = check_login( $link );
      $user = $row['user'];
      $re = $ref;
      if( $page != "" ) {
         $refresh = "&amp;page=".$page;
      }
      else {
         $refresh = "";
      } $idpass2 = "id=$id&ps=$ps&ref=".$ref;
      $idpass = "id=$id&amp;ps=$ps&amp;ref=".$ref;
   }
}

if($_GET['oxu']!=false){
$sid = int($_GET['oxu']);
$q = mysql_query("SELECT `id` FROM `sekiller` WHERE `id` = '".$sid."' LIMIT 1;");
if(mysql_num_rows($q) != 0)
{
@mysql_query("UPDATE `sekiller` SET `bax`=`bax`+'1' WHERE `id` = '".$sid."'");
header ("location: sekil.php?".$idpass2."&bol=track&sid=".$sid);
} else {
header ("location: sekil.php?".$idpass2);
}
}
if(isset($row["id"])){
if($_GET['down']!=false){
$sid = int($_GET['down']);
$dwn = mysql_query("SELECT `id`,`img` FROM `sekiller` WHERE `id` = '".$sid."' LIMIT 1;");
$yukle = mysql_fetch_array ($dwn);
if($dwn != false){
@mysql_query("UPDATE `sekiller` SET `kim`='".date("d-m-y | H:i")."',`down`=`down`+'1' WHERE id='".$sid."'");
header ("location: images.php?img=sekil/".$yukle["img"]);
} else {
header ("location: sekil.php?".$idpass2);
}
}
}
if($PHP_SELF=='sekil.php'){
$_v->title( $site."::&#350;ekiller(".$sekil.")", "center" );
$_v->fsize1( $fsize1 );
echo "<u>Pulsuz &#350;ekiller</u><br/>\n";
$_v->divide();
$_v->align( "left" );




} switch ( $bol ) {
   default: 

if($PHP_SELF!='sekil.php'){
if($row['id']!=''){
$idpass = "id=$id&amp;ps=$ps&amp;ref=".$ref;
}
if(!isset($row["id"])){
$vd=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller"));
$sekil = trim($vd[0]);
echo "<a href=\"sekil.php?".$idpass."\">Pulsuz Sekil Baza</a> -(<b>".$sekil."</b>)<br/>\n";
}
$sql = mysql_query("SELECT * FROM `sekiller` order by rand() limit 1" );
while($savi = mysql_fetch_array($sql))
{
$olchu=@filesize("sekil/".$savi["img"]);
$olchu_ed=$olchu.' b';
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Kb';
}
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Mb';
}
echo $divide;
echo "<img {$style_cerceve} src=\"css/img/folder.png\" alt=\"cerceve\"/>  <img {$style_albom} src=\"sekil_screen.php?img=sekil/".$savi["img"]."&amp;w=140&amp;h=140\" alt=\"".$savi["pos"]."\"/>";
echo "<span {$style_text}><a href=\"sekil.php?".$idpass."&amp;oxu=".$savi["id"]."\">".$savi["pos"]."</a>(<b>".$olchu_ed."</b>)</span><br/>\n";
}
}else{
$top=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller where down > '0'"));
echo "&#xbb;\n";
if($id=='1'){
echo "<a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Sekil Panel</a> /\n";
}
echo "<a href=\"sekil.php?".$idpass."&amp;bol=top10\">Top 10 sekiller</a> -(".trim($top[0]).")<br/>\n";
$_v->divide();

$bolu = mysql_query( "select bolme,name from sekil_bolme" );
while ( $arr = mysql_fetch_array( $bolu ) )
{
$vid=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller where bolme = '".$arr['bolme']."'"));
echo "&#xbb; <a href=\"sekil.php?".$idpass."&amp;order=".$arr['bolme']."&amp;bol=sira\">".$arr['name']."</a> -(".trim($vid[0]).")<br/>\n";
}
}


break;

case "sira":
$order = (int) intval( trim($_GET['order']) );
$vid=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller where bolme = '".$order."'"));
$onu = trim($vid[0]);


$sekil_bolmeelect0 = @mysql_query ("Select name from sekil_bolme where bolme = '".$order."'");
$sekil_bolme0 = @mysql_fetch_array($sekil_bolmeelect0);
$boladi = $sekil_bolme0["name"];

echo "<a href=\"sekil.php?".$idpass."\">Sekil Baza</a> / <u>".$boladi."</u><br/>\n";
$_v->divide();

list($page,$start,$max) = pagestart($onu,10);
$printm=mysql_query("select id,pos,img,who from `sekiller` where bolme = '".$order."' order by id asc limit $start,$max");
if(mysql_affected_rows() == false){
echo "Sekil m&#246;vcud deyil.<br/>\n";
}
while($arr = mysql_fetch_array($printm)){
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

if($_v->ver == "wml") echo "<span style=\"position: relative; bottom: 40px;\">";
echo ($start+1).")";
if($_v->ver == "wml") echo "</span>";
echo " <img {$style_cerceve} src=\"css/img/folder.png\" alt=\"cerceve\"/> <img {$style_albom} src=\"sekil_screen.php?img=sekil/".$arr["img"]."&amp;w=140&amp;h=140\" alt=\"".$arr["pos"]."\"/> <span {$style_text}><a href=\"sekil.php?".$idpass."&amp;oxu=".$arr["id"]."\">".$arr["pos"]."</a> -(<b>".$olchu_ed."</b>)</span><br/>\n";
++$start;
}
if ($onu > $max) {
echo $divide;
echo navigation("sekil.php?".$idpass."&amp;order=".$order."&amp;bol=sira", $onu, $max, $page);
}




break;



case "track":
$sid = (int) intval( trim($_GET['sid']) );
$select = @mysql_query ("Select id,pos,img,bolme,who,vaxt,bax,kim,down from sekiller where id='".$sid."'");
if (mysql_affected_rows() == 0){
echo "<u>Sekil Tap&#305;lmad&#305;.</u><br/>";
break;
}
$inf = mysql_fetch_array ($select);

$sekil_bolmeelect0 = @mysql_query ("Select name from sekil_bolme where bolme = '".$inf["bolme"]."'");
$sekil_bolme0 = @mysql_fetch_array($sekil_bolmeelect0);
$boladi = $sekil_bolme0["name"];

echo "<a href=\"sekil.php?".$idpass."\">Sekil Baza</a> / \n";
echo "<a href=\"sekil.php?".$idpass."&amp;order=".$inf["bolme"]."&amp;bol=sira\">".$boladi."</a> / <u>".$inf["pos"]."</u><br/>";
$_v->divide();
$olchu=@filesize("sekil/".$inf["img"]."");
$olchu_ed=$olchu.' b';
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Kb';
}
if ($olchu>=1024){
$olchu= round($olchu/1024 , 1);
$olchu_ed=$olchu.' Mb';
}

echo "<img {$style_cerceve} src=\"css/img/folder.png\" alt=\"cerceve\"/> <img {$style_albom} src=\"sekil_screen.php?img=sekil/".$inf["img"]."&amp;w=140&amp;h=140\" alt=\"".$inf["pos"]."\"/><br/>";
echo "Fayl&#305;n ad&#305;: <b><u>".$inf["pos"]."</u></b><br/>";
echo "Elave edilib: (".$inf["vaxt"].")<br/>";
echo "Bax&#305;b: <b>".$inf["bax"]."</b> nefer<br/>";
if($inf["down"]!=false){
echo "Y&#252;klenib: <b>".$inf["down"]."</b> defe<br/>";
}else{
echo "<b>He&#231; kim y&#252;klemeyib!</b><br/>";
}
if($inf["kim"]!=false){
echo "Ax&#305;r&#305;nc&#305; defe: (".$inf["kim"].")<br/>";
}
if($row['id']!=''){
echo "<a href=\"sekil.php?".$idpass."&amp;down=".$inf["id"]."\">Sekili Y&#252;kle</a> -(<b>{$olchu_ed}</b>)<br/>\n";
}else {
echo $divide;
echo "Bu fayl&#305; y&#252;klemek &#252;&#231;&#252;n m&#252;tleq <a href=\"reghelp.php?$idpass\"><b>Qeydiyyat</b></a> ke&#231;melisiz!<br/>\n";
}
echo $divide;
echo "<b><u>Qeyd:</u></b> <i>y&#252;klediyiniz sekile g&#246;re hesab&#305;n&#305;zdan EDV (Elave deyer vergisi) tutulmayacaq.</i><br/>\n";

break;

case "top10":
$vid=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM sekiller where down > '0'"));
$onu = trim($vid[0]);
echo "<a href=\"sekil.php?".$idpass."\">Sekil Baza</a> / <u>Top 10 sekiller</u><br/>\n";
$_v->divide();

list($page,$start,$max) = pagestart($onu,10);
$printm=mysql_query("select id,pos,img,who from `sekiller` where down > '0' order by id asc limit $start,$max");
if(mysql_affected_rows() == false){
echo "Sekil m&#246;vcud deyil.<br/>\n";
}
while($arr = mysql_fetch_array($printm)){
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
if($_v->ver == "wml") echo "<span style=\"position: relative; bottom: 40px;\">";
echo ($start+1).")";
if($_v->ver == "wml") echo "</span>";
echo " <img {$style_cerceve} src=\"css/img/folder.png\" alt=\"cerceve\"/>  <img {$style_albom} src=\"sekil_screen.php?img=sekil/".$arr["img"]."&amp;w=140&amp;h=140\" alt=\"".$arr["pos"]."\"/> <span {$style_text}><a href=\"sekil.php?".$idpass."&amp;oxu=".$arr["id"]."\">".$arr["pos"]."</a> -(<b>".$olchu_ed."</b>)</span><br/>\n";
++$start;
}
if ($onu > $max) {
echo $divide;
echo navigation("sekil.php?".$idpass."&amp;bol=top10", $onu, $max, $page);
}

break;
}
if($PHP_SELF=='sekil.php'){
$_v->divide();

if($bol=='license'){
echo "<a href=\"sekil.php?".$idpass."\">Sekil Baza</a> -(".$sekil.")<br/>\n";
}


if(isset($row["id"])){
echo "<a href=\"enter.php?$idpass\">Dehliz</a>";
}else{
echo "<a href=\"index.php?ref=$ref\">Ana Sehife</a>";
}

echo "<br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}
?>