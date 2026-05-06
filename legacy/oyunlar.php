<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$_v->title('Kazino Oyunu','center');
$_v->fsize1($fsize1);
echo "Sevdiyiniz Oyuna daxil olub,postlarinizi artira bilersiniz!!!<br/>";
$_v->divide();



function online_duraki(){
   $users = mysql_query("select count(1) from `card_users` where `time`>'".(time()-300)."';");
    return mysql_result($users,0);
};

echo "<a href=\"cards.php?id=$id&amp;ps=$ps&amp;r=$ref\">Online Duraka (Kart)</a> (".online_duraki().") <br/>\n";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
$xetanick_sql = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".time()."' and `inv` != '3' AND `room` = 82;");
$lotereya_cemi = mysql_result($xetanick_sql, 0);
echo "<a href=\"lotereya.php?id=$id&amp;ps=$ps&amp;r=$ref\">Lotereya Oyunu</a> ($lotereya_cemi)<br/>\n";
$timer = ($vaxt - 300) + time();
$xo = mysql_query("SELECT `id`, `user` FROM `users` WHERE `room` = '101' AND `time` > '".$timer."';");
echo "$priwik <a href=\"xo.php?id=$id&amp;ps=$ps&amp;r=$ref\">X-O Oyunu</a> (".mysql_num_rows($xo).")<br/>\n";
echo $divide;
print "<a href=\"./games/21.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Kart 21</a><br/>";
echo "<a href=\"./games/777.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Barabani Firla</a><br/>";
print "<a href=\"./games/ugadaika.php?id=$id&amp;ps=$ps&amp;ref=$ref\">1-den 9-a</a><br/>";
$_v->divide();


echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>