<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );


list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if ( $row['level'] < 8 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"xeta\" title=\"Xeta\" ontimer=\"index.php?{$ref}\"><timer value=\"15\"/>\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sizin <u>Rengli Nik Paneli</u>-ne giri&#351; icazeniz yoxdur!\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
include( "./file/fun/7" );
echo $fsize1;




if ( isset( $_GET['mod'] ) )
{
$mod = $_GET['mod'];
}
else
{
$mod = "";
}
switch ( $mod )
{


case "outbox" :
echo "<b>Aktiv Rengli nikler</b><br/>----<br/>\n";
$nick_count = mysql_query( "select count(*) as num from `c_nick`;" );
$count = mysql_fetch_array( $nick_count );
$sms_say = $count['num'];
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $sms_say / 15 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 15 + 1;
$do = $s * 15;
if ( $sms_say < $do )
{
$do = $sms_say;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
$r = mysql_query( "SELECT `lid`,`to`,`time`,`gun` FROM `c_nick` ORDER BY `lid` DESC limit {$o},{$do};" );
if ( mysql_affected_rows( ) == 0 )
{
echo "G&#246;nderilenler qutusunda MMS yoxdur.<br/>----<br/>\n";
}
else
{
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $r );
$lid = $arr['lid'];
$gun = $arr['gun'];
$to = $arr['to'];
$time = $arr['time'];
$tkick = $time - time( );
if ( $tkick < 60 && 0 < $tkick )
{
$vaxt = "saniye\n";
}
else if ( $tkick < 3600 && 60 < $tkick )
{
$new = $tkick;
$tkick = $new / 60;
$vaxt = "deqiqe\n";
}
else if ( $tkick < 86400 && 3600 < $tkick )
{
$new = $tkick;
$tkick = $new / 3600;
$vaxt = "saat\n";
}
else if ( 86400 < $tkick )
{
$new = $tkick;
$tkick = $new / 86400;
$vaxt = "g&#252;n\n";
}
$tkick = round( $tkick );
$qus = mysql_query( "Select user from users where id = '".$to."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
mysql_query( "DELETE from c_nick where lid = '".$lid."'" );
}
if ( $time <= time( ) )
{
echo "(<b>Vaxt&#305; Qurtar&#305;b</b>) - <a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=show&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a> [{$date}]<br/>\n";
}
else
{
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=show&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a>. {$gun} g&#252;nl&#252;k - {$tkick} {$vaxt} qal&#305;b<br/>\n";
}
++$i;
}
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 15 + 1;
$do = $prev * 15;
echo "<a href=\"renglinik.php?mod=outbox&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;{$ref}\">&lt;&lt;{$ot}</a>.\n";
}
}
$test = round( $sms_say, 1 ) / 15;
if ( $s < $test )
{
$ot = ( $next - 1 ) * 15 + 1;
$do = $next * 15;
if ( $sms_say < $do )
{
$do = $sms_say;
}
echo " |  <a href=\"renglinik.php?mod=outbox&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;{$ref}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
if ( 1 < $s )
{
echo "<br/>";
}
break;
case "sifaris" :
echo "<b>Yeni Sifari&#351;ler</b><br/>----<br/>\n";
$userm = mysql_query( "select count(lid) as num from sifarish;" );
$usm = mysql_fetch_array( $userm );
$sms_say = $usm['num'];
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $sms_say / 10 + 0.45 );
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
if ( $sms_say < $do )
{
$do = $sms_say;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
$r = mysql_query( "SELECT `lid`,`to`,`time` FROM `sifarish` ORDER BY `lid` DESC limit {$o},{$do};" );
if ( mysql_affected_rows( ) == 0 )
{
echo "Menim Sahibim<br/>&#199;atda hecbir sifari&#351; olunmay&#305;b :(=<br/>----<br/>\n";
}
else
{
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $r );
$lid = $arr['lid'];
$to = $arr['to'];
$time = $arr['time'];
$tkick = time( ) - $time;
if ( $tkick < 60 && 0 < $tkick )
{
$vaxt = "saniye\n";
}
else if ( $tkick < 3600 && 60 < $tkick )
{
$new = $tkick;
$tkick = $new / 60;
$vaxt = "deqiqe\n";
}
else if ( $tkick < 86400 && 3600 < $tkick )
{
$new = $tkick;
$tkick = $new / 3600;
$vaxt = "saat\n";
}
else if ( 86400 < $tkick )
{
$new = $tkick;
$tkick = $new / 86400;
$vaxt = "g&#252;n\n";
}
$tkick = round( $tkick );
$qus = mysql_query( "Select user from users where id = '".$to."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
$message1del = "ID nomresi:\n";
$nick = "{$to}";
$message2del = "Bu nik bazadan silinib...\n";
mysql_query( "DELETE from sifarish where lid = '".$lid."'" );
}
echo "{$i}) {$message1del}<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=sifarish&amp;lid={$lid}&amp;{$ref}\"> {$nick}</a>.  * {$tkick} {$vaxt} evvel sifari&#351; edib. {$message2del}\n";
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=sifdel&amp;lid={$lid}&amp;to={$to}&amp;{$ref}\">[x]</a><br/>\n";
++$i;
++$i;
}
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 15 + 1;
$do = $prev * 15;
echo "<a href=\"renglinik.php?mod=sifaris&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;{$ref}\">&lt;&lt;{$ot}</a>.\n";
}
}
$test = round( $sms_say, 1 ) / 15;
if ( $s < $test )
{
$ot = ( $next - 1 ) * 15 + 1;
$do = $next * 15;
if ( $sms_say < $do )
{
$do = $sms_say;
}
echo " |  <a href=\"renglinik.php?mod=sifaris&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;{$ref}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
if ( 1 < $s )
{
echo "<br/>";
}
break;
case "sifarish" :
$lid = intval( $_GET['lid'] );
$q = mysql_query( "SELECT * FROM `sifarish` WHERE `lid` = '".$lid."';" );
if ( mysql_num_rows( $q ) == 0 )
{
echo "<u>Rengli Nick yoxdur.</u><br/>----<br/>\n";
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;{$ref}\">Rengli Nik Paneli</a><br/>\n";
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;{$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
exit( );
}
$sifa = mysql_fetch_array( $q );
$lid = $sifa['lid'];
$usid = $sifa['to'];
$nov = $sifa['nov'];
$qeyd = $sifa['qeyd'];
$date = $sifa['date'];
if ( $nov == "1" )
{
$sifarish = "1 ayl&#305;q hereketsiz (sade) nik sifari&#351; etdi";
}
else if ( $nov == "2" )
{
$sifarish = "1 ayl&#305;q hereketli nik sifari&#351; etdi";
}
$qus = mysql_query( "Select user from users where id = '".$usid."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$sifarishci = $ind['user'];
}
else
{
mysql_query( "DELETE from c_nick where lid = '".$lid."'" );
}
echo "Leqebi: <b>{$sifarishci}</b><br/>\n";
echo "S&#305;ra n&#246;mresi: <b>{$usid}</b> <br/>\n";
echo "<u>{$sifarish}</u> <br/>\n";
echo "<b>Qeyd</b>: <i>{$qeyd}</i><br/>\n";
echo "<b>Tarix: {$date}</b><br/>\n";
$bal_i = mysql_query( "SELECT `saat` FROM `hesab` WHERE `usid` = '".$usid."' and `x`='9';" );
if ( mysql_affected_rows( ) != 0 )
{
$bi = mysql_fetch_array( $bal_i );
$saatbal = $bi['saat'];
$tkick = $saatbal - time( );
if ( $tkick < 60 && 0 < $tkick )
{
$vaxt = "saniye\n";
}
else if ( $tkick < 3600 && 60 < $tkick )
{
$new = $tkick;
$tkick = $new / 60;
$vaxt = "deqiqe\n";
}
else if ( $tkick < 86400 && 3600 < $tkick )
{
$new = $tkick;
$tkick = $new / 3600;
$vaxt = "saat\n";
}
else if ( 86400 < $tkick )
{
$new = $tkick;
$tkick = $new / 86400;
$vaxt = "g&#252;n\n";
}
$tkick = round( $tkick );
echo $divide;
echo "<u>Diqqet</u>: <b>{$sifarishci}</b>. leqebli istifade&#231;inin Rengli nik d&#252;zeltmek sistemi var.<br/>Rengli nik d&#252;zeltme vaxt&#305; qurtard&#305;qdan sonra ona rengli niki panelden vermek olar.<br/>----<br/>\n";
}
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=sifdel&amp;lid={$lid}&amp;to={$usid}&amp;{$ref}\">Sifari&#351;i sil</a><br/>\n";
break;
case "sifdel" :
$sql = mysql_query( "SELECT `to` FROM `sifarish` WHERE `lid` = '".$lid."';" );
$lid = intval( $_GET['lid'] );
$q = mysql_query( "DELETE FROM `sifarish` WHERE `lid` = '".$lid."';" );
if ( mysql_affected_rows( ) != 0 )
{
$qus = mysql_query( "Select user from users where id = '".$to."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$ifff = $ind['user'];
}
else
{
$ifff = "Namelum";
}
echo "<u>{$ifff} Leqeb &#350;exsin Sifari&#351;i silindi.</u><br/>\n";
}
else
{
echo "<u>Bu istifade&#231;nin Sifari&#351; etmeyib =:)</u><br/>\n";
}
break;
case "show" :
$lid = intval( $_GET['lid'] );
$q = mysql_query( "SELECT * FROM `c_nick` WHERE `lid` = '".$lid."' AND `id` = '".$id."';" );
if ( mysql_num_rows( $q ) == 0 )
{
echo "<u>Rengli Nick yoxdur.</u><br/>----<br/>\n";
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nik Paneli</a><br/>\n";
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
exit( );
}
$qizlar = mysql_fetch_array( $q );
$lid = $qizlar['lid'];
$to = $qizlar['to'];
$vid = $qizlar['id'];
$gun = $qizlar['gun'];
$text = $qizlar['qeyd'];
$date = $qizlar['date'];
$sonvaxt = $qizlar['time'];
if ( $sonvaxt <= time( ) )
{
$sonvaxt = 0;
}
else
{
$tkick = $sonvaxt - time( );
if ( $tkick < 60 && 0 < $tkick )
{
$vaxt = "saniye\n";
}
else if ( $tkick < 3600 && 60 < $tkick )
{
$new = $tkick;
$tkick = $new / 60;
$vaxt = "deqiqe\n";
}
else if ( $tkick < 86400 && 3600 < $tkick )
{
$new = $tkick;
$tkick = $new / 3600;
$vaxt = "saat\n";
}
else if ( 86400 < $tkick )
{
$new = $tkick;
$tkick = $new / 86400;
$vaxt = "g&#252;n\n";
}
$tkick = round( $tkick );
}
$qus = mysql_query( "Select user from users where id = '".$vid."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$icraci = $ind['user'];
}
$qus = mysql_query( "Select user from users where id = '".$to."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
mysql_query( "DELETE from c_nick where lid = '".$lid."'" );
}
echo "<u>Leqebi</u>: {$nick} <br/><u>S&#305;ra n&#246;mresi</u>: {$to} <br/>\n";
echo "<u>Tarixi</u>: {$date}<br/>\n";
echo "<u>Sifari&#351; m&#252;ddeti</u>: {$gun} g&#252;nl&#252;k<br/>\n";
if ( file_exists( "i/".$to.".gif" ) )
{
echo "Leqebin &#246;l&#231;&#252;s&#252;: \n";
$olchu = round( filesize( "i/".$to.".gif" ) / 1024, 2 );
echo "<u><b>".$olchu."</b></u> kb <br/>\n";
echo "Leqebin g&#246;r&#252;nt&#252;s&#252;: <img src='i/".$to.".gif' alt='photo' />\n";
echo "<a href=\"i/".$to.".gif\">y&#252;kle</a><br/>\n";
}
else
{
echo "<b>Bu istifade&#231;inin rengli niki FTP-den silinib...</b><br/>";
}
if ( $text != "" )
{
echo "<u>&#304;cra&#231;&#305;n&#305;n Qeydi</u>: <i>{$text}</i><br/>\n";
}
echo "<u>&#304;cra&#231;&#305;</u>: <b>{$icraci}</b><br/>\n";
if ( $sonvaxt == 0 )
{
echo "----<br/><b><i>Bu Leqebin Vaxt&#305; Qurtar&#305;b!!!</i></b><br/>\n";
}
else
{
echo "----<br/><i>Bu leqebin S&#246;nmesine {$tkick} {$vaxt} qal&#305;b :)</i><br/>\n";
}
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=delete&amp;lid={$lid}&amp;to={$to}&amp;ref={$ref}\">Rengli Leqebi le&#287;v et</a><br/>\n";
break;
case "delete" :
$lid = intval( $_GET['lid'] );
$q = mysql_query( "DELETE FROM `c_nick` WHERE `lid` = '".$lid."';" );
if ( mysql_affected_rows( ) != 0 )
{
$f = mysql_query( "SELECT `user` FROM `users` WHERE `id` = '".$to."';" );
$ifff = mysql_result( $f, 0 );
echo "<u>{$ifff} Leqeb &#350;exsin Rengli niki silindi.</u><br/>\n";
if ( file_exists( "i/".$to.".gif" ) && unlink( "i/".$to.".gif" ) )
{
echo "".$to.".gif silindi<br/>\n";
}
}
else
{
echo "<u>Bu istifade&#231;nin Rengli niki yoxdur ve ya silinib.</u><br/>\n";
}
break;
//}

default:


$q = mysql_query( "SELECT COUNT(*) FROM `c_nick`;" );
$from = mysql_result( $q, 0 );
$e = mysql_query( "SELECT COUNT(*) FROM `sifarish`;" );
$yeni = mysql_result( $e, 0 );
if ( $yeni != "" )
{
echo "<b><a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=sifaris&amp;ref={$ref}\">Yeni Sifari&#351; ({$yeni})</a></b><br/>****<br/>";
}
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;mod=outbox&amp;ref={$ref}\">Aktiv Rengli Nikler ({$from})</a><br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nick Yarat</a><br/>----\n";
break;

}



if ( !empty( $mod ) )
{
echo "****<br/><a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nik Paneli</a>\n";
}
echo "<br/><a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a>\n";
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo "</small></p></card></wml>";
mysql_close( $link );
?>
