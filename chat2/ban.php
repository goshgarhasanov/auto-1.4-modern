<?php
session_start( );
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if ( $row[con] != "0" )
{
header( "Location: session.php?id={$id}&ps={$ps}&ref={$ref}" );
exit( );
}
if ( time( ) < $row['kik'] )
{
header( "Location: session.php?id={$id}&ps={$ps}&ref={$ref}" );
exit( );
}
if ( $row['level'] < 4 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"olmaz\" title=\"&#304;cazeniz yoxdur!\">\n";
echo "<p align=\"center\">\n";
echo "Sizin bura daxil olmaq h&#252;ququnuz yoxdur!\n";
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
$user = $row['user'];
if ( isset( $nk ) )
{
$select = @mysql_query( @"Select * from users where id='".@$nk."'" );
}
else
{
$nick = trim( $nick );
if ( $nick == "" )
{
$nick = 0;
}
if ( !ctype_digit( $nick ) )
{
$latuser = strtolower( $nick );
$select = mysql_query( "Select * from users where latuser = '".$latuser."'" );
}
else
{
$select = mysql_query( "Select * from users where id = '".$nick."'" );
}
}
if ( mysql_affected_rows( ) == 0 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
$inf = mysql_fetch_array( $select );
$pnik = $inf['user'];
$xare = $inf['whokik'];
$sebeb = $inf['whykik'];
$banned = $inf['banned'];
$invs = $inf['inv'];
$otaq = $inf['room'];
$tox = $inf['tox'];
$ip = $inf['user_ip'];
require( "fun.php" );
$u_level = $inf['level'];
if ( $tox == 2 && $row['level'] != 9 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"olmaz\" title=\"Olmaz\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Bu &#350;exsin Rehberlik terefinden toxunulmazl&#305;&#287;&#305; var...<br/>****<br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;{$ref}\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;{$ref}\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;{$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
$room = "room".$rm."";
$st = time( );
$today = date( "H:i", mktime( date( "H" ) + $xsat ) );
if ( $_POST['wtime'] == "browser" )
{
if ( OPERATOR( $ip ) != "NULL" )
{
$xolmadi = "telefon modelini ban etmek\n";
}
else
{
$xolmadi = "komp&#252;terini ban etmek\n";
}
}
else if ( $_POST['wtime'] == "leqeb" )
{
$xolmadi = "nikini silib ip soft\n";
}
else if ( $_POST['wtime'] == "sil" )
{
$xolmadi = "nikini silmek\n";
}
else if ( $_POST['wtime'] == "msg" )
{
$xolmadi = "mesajlar&#305;n&#305; silmek\n";
}
else if ( $_POST['wtime'] == "iqnor" )
{
$xolmadi = "tam iqnor\n";
}
else if ( $_POST['wtime'] == "xeber" )
{
$xolmadi = "xeberdarl&#305;q\n";
}
else if ( "0" <= $_POST['wtime'] )
{
$xolmadi = "&#199;atdan xaric\n";
}
if ( $_SESSION['count'] != 1 )
{
$_SESSION['count'] = 1;
$whykik = "<b>{$user}</b>,  <b>{$pnik}</b> - <i>leqeb istifade&#231;ini {$xolmadi} etmek istedi ama al&#305;nmad&#305;:)</i>";
$rnd = rand( 0, 99999999 );
mysql_query( "Insert into {$room} set klu4= '".$rnd."', time='".$today."', who='Sistem', message='".$whykik."', id='".$st."', towhom='', hid='0', usid='7'" );
$online = time( ) + $vaxt;
mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$otaq."' WHERE `id` = '7';" );
}
mysql_close( $link );
exit( );
}
if ( $row['level'] != 9 )
{
if ( $invs == 2 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"stop\" title=\"Stop\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>{$pnik}</b>, leqebli istifade&#231;i <u>Tam &#304;qnor Edilib</u>!<br/>\n";
if ( $sebeb != "" )
{
echo "<u>Sebeb</u>: <i>{$sebeb}</i>.<br/>----<br/>\n";
}
else
{
echo "----<br/>\n";
}
echo "<i>Bu istifade&#231;inin yazd&#305;qlar &#231;atda  g&#246;r&#252;nm&#252;r ve mektub yaza bilmir</i>.<br/>\n";
echo "<b>M&#252;ellif</b>: <u>{$xare}</u><br/>*****<br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $banned == 1 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"stop\" title=\"Stop\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>{$pnik}</b>, leqebli istifade&#231;i <u>Ban Edilib</u>!<br/>\n";
if ( $sebeb != "" )
{
echo "<u>Sebeb</u>: <i>{$sebeb}</i>.<br/>----<br/>\n";
}
else
{
echo "----<br/>\n";
}
echo "<b>M&#252;ellif</b>: <u>{$xare}</u><br/>*****<br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $banned == 2 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"stop\" title=\"Stop\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>{$pnik}</b>, leqebli istifade&#231;i <u>Bazadan Silinib</u>!<br/>\n";
if ( $sebeb != "" )
{
echo "<u>Sebeb</u>: <i>{$sebeb}</i>.<br/>----<br/>\n";
}
else
{
echo "----<br/>\n";
}
echo "<b>M&#252;ellif</b>: <u>{$xare}</u><br/>*****<br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a>\n";
}
else
{
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
}
if ( $row['mexvi'] != 0 )
{
$user_admin = "Sistem";
}
else
{
$user_admin = $user;
}
$xeberci = "Xeber&#231;i";
if ( $rm <= 10 && $rm != "" )
{
$selotaq = @mysql_query( @"Select name from rooms where rm='".@$rm."'" );
$onam = @mysql_fetch_array( @$selotaq );
$otaqadi = $onam['name'];
}
else
{
$otaqadi = "Mesajda";
}
if ( 7 < $row['level'] )
{
$pname = "Admin Panel";
}
else
{
$pname = "Moder Panel";
}
include( "./file/require/shrift" );
if ( $_POST['wtime'] == "browser" )
{
if ( OPERATOR( $ip ) != "NULL" )
{
include( "./file/ban/browser" );
}
else
{
include( "./file/ban/ip" );
}
}
else if ( $_POST['wtime'] == "leqeb" )
{
include( "./file/ban/leqeb" );
}
else if ( $_POST['wtime'] == "sil_hidden" )
{
include( "./file/ban/sil_hidden" );
}
else if ( $_POST['wtime'] == "sil" )
{
include( "./file/ban/del" );
}
else if ( $_POST['wtime'] == "msg" )
{
include( "./file/ban/msg_del" );
}
else if ( $_POST['wtime'] == "iqnor" )
{
include( "./file/ban/iqnor" );
}
else if ( $_POST['wtime'] == "xeber" )
{
include( "./file/ban/xeber" );
}
else if ( "0" <= $_POST['wtime'] )
{
include( "./file/ban/xaric" );
}
else
{
header( "Location: enter.php?id={$id}&ps={$ps}&ref={$ref}" );
}
mysql_close( $link );
?>
