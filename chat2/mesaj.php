<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$tm = time( );

$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = '28' WHERE `id` = '".$id."';");

$msn = $row['msn'];

if ($rm != "") {
$takep = "&amp;rm={$rm}&amp;ref={$ref}";
} else {
$takep = "&amp;ref={$ref}";
}

ob_start( );
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
switch ( $m )
{
default :
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
if ( $num != $msn )
{
mysql_query( "UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';" );
}
if ( $num == 0 )
{
echo "<card id=\"nomesaj\" title=\"Yeni Mesaj Yoxdur\">\n";
echo "<p>\n";
echo $fsize1;
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Arxiv</a><br/>\n";
echo "----<br/>\n";
echo "Yeni mesaj&#305;n&#305;z Yoxdur<br/>\n";
echo "----<br/>\n";
break;
}
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $num / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
echo "<card id=\"gelenler\" title=\"Mektublar/Gelenler\">\n";
echo "<p>\n";
echo $fsize1;
echo "<b>{$num}</b> Yeni mesaj&#305;n&#305;z var<br/>\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Arxiv</a><br/>\n";
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $num < $do )
{
$do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo "----<br/>\n";
$rr = mysql_query( "SELECT  DISTINCT `idwho` FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1' order by `time` desc LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$qc = mysql_fetch_array( $rr );
$dis_idwho = $qc['idwho'];
$q_2 = mysql_query( "SELECT `who`,`idwho`,`date` FROM `mesaj` where `idwho` = '".$dis_idwho."' order by time desc" );
$a = mysql_fetch_array( $q_2 );
$user_name = $a['who'];
$user_id = $a['idwho'];
$mesaj_date = $a['date'];
$query = mysql_query( "select COUNT(readd) from mesaj where idwho = '".$dis_idwho."' and idtowhom = '".$id."' and readd ='0' and `ininc`='1' ;" );
$all = @mysql_result( $query, 0 );
echo "<b>{$user_name} <a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$user_id}{$takep}\">oxu ({$all})</a></b> [{$mesaj_date}] - \n";
echo "[<a href=\"m_1.php?m=del&amp;id={$id}&amp;ps={$ps}&amp;uid={$user_id}{$takep}\">x</a>]<br/>\n";
++$i;
}
mysql_close( $link );
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $num < $do )
{
$do = $num;
}
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
}
echo "----<br/>\n";
break;
case "arxiv" :
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='1' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
if ( $num == 0 )
{
echo "<card id=\"arxiv\" title=\"Arxiv (Oxunmu&#351;lar)\">\n";
echo "<p>\n";
echo $fsize1;
echo "Arxiv (Oxunmu&#351;lar) (<b>{$num}</b>)<br/>\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yeni Mesajlar</a><br/>\n";
echo "----<br/>\n";
echo "Yeni mesaj&#305;n&#305;z Yoxdur<br/>\n";
echo "----<br/>\n";
break;
}
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $num / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
echo "<card id=\"arxiv\" title=\"Arxiv (Oxunmu&#351;lar)\">\n";
echo "<p>\n";
echo $fsize1;
echo "Arxiv (Oxunmu&#351;lar) (<b>{$num}</b>)<br/>\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yeni Mesajlar</a><br/>\n";
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $num < $do )
{
$do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo "----<br/>\n";
$rr = mysql_query( "SELECT  DISTINCT `idwho` FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='1' and `ininc`='1' order by `time` desc LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$qc = mysql_fetch_array( $rr );
$dis_idwho = $qc['idwho'];
$q_2 = mysql_query( "SELECT `who`,`idwho`,`date` FROM `mesaj` where `idwho` = '".$dis_idwho."' order by time desc" );
$a = mysql_fetch_array( $q_2 );
$user_name = $a['who'];
$user_id = $a['idwho'];
$mesaj_date = $a['date'];
$query = mysql_query( "select COUNT(readd) from mesaj where idwho = '".$dis_idwho."' and idtowhom = '".$id."' and readd ='1' and `ininc`='1' ;" );
$all = @mysql_result( $query, 0 );
echo "<b>{$user_name} <a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$user_id}{$takep}\">oxu ({$all})</a></b> [{$mesaj_date}] - \n";
echo "[<a href=\"m_1.php?xiv=1&amp;m=del&amp;id={$id}&amp;ps={$ps}&amp;uid={$user_id}{$takep}\">x</a>]<br/>\n";
++$i;
}
mysql_close( $link );
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $num < $do )
{
$do = $num;
}
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
}
echo "----<br/>\n";
break;

case "del" :
echo "<card id=\"sil\" title=\"Silindi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Mesaj Silindi...<br/>*****<br/>\n";
if ( $xiv != "" )
{
mysql_query( "update mesaj set ininc = '0' WHERE (idwho = '".$uid."' and idtowhom = '".$id."') or (idwho = '".$id."' and idtowhom = '".$uid."')" );
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
mysql_query( "update mesaj set ininc = '0' WHERE (idwho = '".$uid."' and idtowhom = '".$id."') or (idwho = '".$id."' and idtowhom = '".$uid."') and (readd = '0')" );
}
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
mysql_query( "UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';" );
mysql_close( $link );
echo "----<br/>\n";
break;
}
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">Chata qay&#305;t</a><br/>\n";
}
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush( );
?>
