<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
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

if ($_GET["del"] == 1)
{
$_v->title('Bildiri&#351;leriniz','center');
$_v->fsize1($fsize1);
    mysql_query ("delete from zapiski where (idwho='1' OR idwho='0' OR idwho='2' OR idwho='3' OR idwho='4' OR idwho='5' OR idwho='6' OR idwho='7' OR idwho='8' OR idwho='9' OR idwho='10') and idtowhom='".$id."'");
    echo "Bildiri&#351;ler temizlendi.<br/>";
    echo $divide;
    echo "<a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
    echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
    exit;
}

if ($_GET["del"] == 2)
{
$_v->title('Bildiri&#351;leriniz','center');
$_v->fsize1($fsize1);
    if (mysql_query ("delete from zapiski where klu4 = '".$_GET["act"]."' and idtowhom = '".$id."'"))
    {
        echo "Qeyd olunan yaz&#305; silindi!.<br/>";
    }
    else
    {
        echo "Bele bir bildiri&#351; yoxdur.<br/>";
    }
    echo $divide;
    echo "<a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
    echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
    exit;
}

$_v->title('Bildiri&#351; -l&#601;r','center');
$_v->fsize1($fsize1);
echo "<b>Bildiri&#351;l&#601;r</b> - Tarix&#231;&#601;<br/>\n";
echo "---<br/>";
$_v->align('left');

echo "<a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a> | <a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;del=1&amp;ref=$ref\">Temizle</a><br/>";
$_v->divide();
$sql = mysql_query("SELECT * FROM zapiski WHERE (idwho='0' OR idwho='1' OR idwho='2' OR idwho='3' OR idwho='4' OR idwho='5' OR idwho='6' OR idwho='7' OR idwho='8' OR idwho='9' OR idwho='10') and idtowhom='".$id."'");
$onu = mysql_num_rows($sql);

$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($onu/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}


$sql = mysql_query("SELECT * FROM zapiski WHERE (idwho='0' OR idwho='1' OR idwho='2' OR idwho='3' OR idwho='4' OR idwho='5' OR idwho='6' OR idwho='7' OR idwho='8' OR idwho='9' OR idwho='10') and idtowhom='".$id."' ORDER BY time DESC LIMIT $start,$max_page");
if(mysql_affected_rows() == false)
{
    echo "<i>Hal-haz&#305;rda Siz&#601; bildiri&#351; g&#601;lm&#601;yib..</i><br/>";
}
$lastTime = '';

while($news = mysql_fetch_array($sql))

{
     
   if(buga_date($news['time']) != $lastTime)
  {
   $lastTime = buga_date($news['time'],'');
   $_v->html('<div class="dateBody"><span style="white-space:nowrap; padding:2px 10px;display: inline-table;">'.$lastTime.'</span></div>');
  }

 
$_v->html('<div class="bars my" style="border-bottom-style:double;border-left-style:none;background:#ebf3fe;padding:6px;">');
if ($news["readd"] == 0)echo "<b>(Yeni Bildiri&#351;)</b> ";
  
echo "<b>".$news["who"]."</b> ".$news["message"]."  (Saat: ".date("H:i", $news["time"]).")[<a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;del=2&amp;act=".$news["klu4"]."&amp;ref=$ref\">x</a>]<br/>";


$_v->html('</div>');
}


if($onu > $max_page)
{
echo $divide;
echo navigation("bildiris.php?id=$id&amp;ps=$ps&amp;ref=$ref", $onu, $max_page, $page);
}
if ($onu != 0)
{
    mysql_query ("update zapiski set readd='1' where (idwho='0' OR idwho='1' OR idwho='2' OR idwho='3' OR idwho='4' OR idwho='5' OR idwho='6' OR idwho='7' OR idwho='8' OR idwho='9' OR idwho='10') and idtowhom='".$id."'");
}
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);

?>