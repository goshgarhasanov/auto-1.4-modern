<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
if ( $row['level'] != 9 )
{
echo "<card id=\"xeta\" title=\"STOP...\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!<br/>****<br/>\n";
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">-Admin Panel-</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $bol == "1" )
{
if ( isset( $_POST['nick'] ) )
{
$nick = $_POST['nick'];
}
else
{
$nick = $_GET['nick'];
}
$latuser = strtolower( $nick );
$query = mysql_query( "select COUNT(id) FROM users WHERE (`latuser` LIKE \"%".$latuser."%\") or (`id`= \"".$nick."\");" );
$all = @mysql_result( @$query, 0 );
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $all / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $all < $do )
{
$do = $all;
}
$o = $ot - 1;
$ff = $ot;
if ( $do == 0 )
{
$ff = $o;
}
$sorgu = mysql_query( "SELECT * FROM `users` WHERE (`latuser` LIKE '%".$latuser."%') or (`id`= '".$nick."') order by time ASC limit {$o},{$do};" );
if ( $all == "0" )
{
echo "<card id=\"a_not\" title=\"Tap&#305;lmad&#305;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"view_m.php?go=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Mektublar</a><br/>\n";
}
else
{
echo "<card id=\"a_ok\" title=\"Tap&#305;lanlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "\"<b>{$nick}</b>\" <u>S&#246;z&#252;ne ox&#351;ar leqebler</u>:<br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>{$all}</b>\" nefer:<br/>****<br/>\n";
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $sorgu );
$u_user = $a['user'];
$sex = $a['sex'];
$u_id = $a['id'];
if ( $sex == 0 )
{
$cins = "Ki&#351;i";
}
else
{
$cins = "Qad&#305;n";
}
echo $i.") <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$u_id}&amp;ref={$ref}\">{$u_user}</a>-{$cins}<br/>";
++$i;
}
echo "****<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"view_m.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;nick={$nick}&amp;ref={$ref}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $all / 10;
$test = round( $tes );
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $all < $do )
{
$do = $all;
}
echo " | <a href=\"view_m.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;nick={$nick}&amp;ref={$ref}\">{$do}&gt;&gt;</a>\n";
}
if ( 1 <= $s && 10 < $all )
{
echo "<br/>";
}
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $go == "tap" )
{
echo "<card id=\"axtar\" title=\"Axtar&#305;&#351;.\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Leqeb / ID:</b><br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"Axtar&#305;&#351;\"/><br/>\n";
echo $fsize1;
echo "<anchor>Axtar<go href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"bol\" value=\"1\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>----<br/><a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">-Admin Panel-</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $rm != "" )
{
$takep2 = "&amp;rm={$rm}&amp;ref={$ref}";
$baza = "zapiski";
$tname = "Mektublar";
$cname = "&#199;ata Qay&#305;t";
$fname = "chat";
$zname = "Mesajlar";
$takep3 = "&amp;ref={$ref}";
}
else
{
$takep2 = "&amp;ref={$ref}";
$baza = "mesaj";
$tname = "Mesajlar";
$cname = "Mesaja Qay&#305;t";
$fname = "on";
$zname = "Mektublar";
$takep3 = "&amp;rm=0&amp;ref={$ref}";
}
echo "<card title=\"{$tname}...\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
if ( empty( $act ) )
{
if ( $nk != "" )
{
$query = mysql_query( "select COUNT(klu4) from `".$baza."` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7';" );
}
else
{
$query = mysql_query( "select COUNT(klu4) from `".$baza."` where idwho != '0' and idwho != '7';" );
}
$all = @mysql_result( @$query, 0 );
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $all / 20 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 20 + 1;
$do = $s * 20;
if ( $all < $do )
{
$do = $all;
}
$o = $ot - 1;
$ff = $ot;
if ( $do == 0 )
{
$ff = $o;
}
if ( $nk != "" )
{
$q = mysql_query( "select * from `".$baza."` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7' order by time desc limit {$o},{$do};" );
}
else
{
$q = mysql_query( "select * from `".$baza."` where idwho != '0' and idwho != '7' order by time desc limit {$o},{$do};" );
}
if ( $nk != "" )
{
$us = mysql_query( "select * from users where id = '".$nk."';" );
if ( mysql_affected_rows( ) == 0 )
{
echo "<b>Niki Bazadan Silinib</b>: leqebine aid ".$tname." (<b>{$all}</b>)<br/>*****<br/>";
}
else
{
$a = mysql_fetch_array( $us );
echo "<b>".$a['user']."</b> - leqebine aid ".$tname.": (<b>{$all}</b>)<br/>*****<br/>";
}
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}\">&#220;mumi ".$tname."</a> |\n";
}
else
{
echo "<b>{$tname}</b>: (<b>{$all}</b>)<br/>*****<br/>";
echo "<a href=\"view_m.php?go=tap&amp;id={$id}&amp;ps={$ps}{$takep2}\">Axtar</a> |\n";
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}\">Yenile</a> |\n";
}
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep3}&amp;nk={$nk}\">".$zname."</a><br/>----<br/>\n";
if ( $do == 0 )
{
echo "<i>Bu istifade&#231;iye aid {$tname} yoxdur.</i><br/>\n";
}
else
{
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $q );
$kim = $arr['who'];
$kime = $arr['towhom'];
$mesag = $arr['message'];
$read = $arr['readd'];
$klu4 = $arr['klu4'];
$idtowhom = $arr['idtowhom'];
$idwho = $arr['idwho'];
print " <b>{$i})</b>-<i><a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}{$takep2}\">".$kim."</a></i> &#187; <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idtowhom}{$takep2}\">".$kime."</a>";
print "<b>|&gt;</b>".$mesag."";
echo "[<a href=\"view_m.php?act=".$klu4."&amp;id={$id}&amp;ps={$ps}&amp;s={$s}{$takep2}&amp;nk={$nk}\">x</a>]<br/>\n";
++$i;
}
}
echo "----<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 20 + 1;
$do = $prev * 20;
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep2}&amp;nk={$nk}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $all / 20;
$test = round( $tes );
if ( $do < $all && $s < $test )
{
$ot = ( $next - 1 ) * 20 + 1;
$do = $next * 20;
if ( $all < $do )
{
$do = $all;
}
echo " |  <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$next}{$takep2}&amp;nk={$nk}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
else if ( 1 < $s )
{
echo "<br/>";
}
if ( 20 < $all )
{
echo "<br/>";
}
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}{$takep2}\">Panel</a><br/>*****<br/>\n";
echo "<a href=\"{$fname}.php?id={$id}&amp;ps={$ps}{$takep2}\">{$cname}</a><br/>\n";
}
else
{
mysql_query( "delete from `".$baza."` where klu4 = '".$act."'" );
echo "<u>Silindi</u>...<br/>";
echo $divide;
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$s}{$takep2}&amp;nk={$nk}\">Geri Qay&#305;t</a><br/>";
}
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
?>
