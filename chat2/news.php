<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


function bricode($text){$text = str_replace("[/b]", "</b>", $text);$text = str_replace("[b]", "<b>", $text);$text = str_replace("[/u]", "</u>", $text);$text = str_replace("[u]", "<u>", $text);$text = str_replace("[/i]", "</i>", $text);$text = str_replace("[i]", "<i>", $text);$text = str_replace("[br]", "<br/>", $text);return $text;}

echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card title=\"Xeberler\">\n";
echo "<p align=\"left\">\n";

$new = mysql_query ("select count(`id`) as `num` from `news`;");
$news = mysql_fetch_array($new);
$num = $news["num"];
if(!isset($s))$s=0;
$mx=round(($num/5)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*5)+1;
$do=$s*5;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo $fsize1;
echo "Cemi: $num<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query ("select * from `news` order by `id` desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
echo $fsize1;
echo "<b>".$arr['date']."</b><br/> ".bricode($arr['content'])."<br/>";
echo "<u>Muellif:</u><b> ".$arr['login']."</b><br/>";
echo $fsize2;
}
mysql_close($link);
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*5)+1;
$do=$next*5;
if($do>$num)$do=$num;
echo $fsize1;
echo "<a href=\"news.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
echo $fsize2;
}
if($s>1) {
$ot=(($prev-1)*5)+1;
$do=$prev*5;
echo $fsize1;
echo "<a href=\"news.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";
echo $fsize2;
echo "</p></card></wml>";
?>
