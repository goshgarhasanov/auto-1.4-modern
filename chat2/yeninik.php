<?php

error_reporting( 0 );
header( "Content-type: text/html; charset=utf-8" );
header( "Last-Modified: ".gmdate( "D, d M Y H:i:s" )." GMT" );
header( "Cache-Control: no-cache, must-relative" );
require( "ay.php" );
$link = connect_db( );

        if(!isset($_COOKIE['theme']))
        {
        $font = "sans-serif";
        $color = "black";
        $background = "white";
        $links = "blue";
        $form_color = "gray";
        }

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$ref = rand( 0, 1000000 );
//$sec = explode( chr( 32 ), microtime( ) )[1];
//$msec = explode( chr( 32 ), microtime( ) )[0];
$headtime = $sec + $msec;
if ( $row['level'] < 8 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>Rengli Nik</title>\n";
echo "<style type=\"text/css\">\r\nbody { font-weight: normal; font-size: normal; font-family: ".$font."; color: ".$color."; background-color: ".$background." }\r\na:link,a:active,a:visited { text-decoration: underline; color : ".$links." }\r\ndiv { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }\r\ndiv.form { background-color: ".$form_color." }\r\n</style></head><body>";
echo "<p align=\"center\">\n";
echo "<b>Sizin <u>Rengli Nik Paneli</u>-ne giri&#351; icazeniz yoxdur!</b><br/><br/>----<br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo "</center></body></html>";
mysql_close( $link );
exit( );
}
include( "./file/fun/7" );
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>Rengli Nik</title>\n";
echo "<style type=\"text/css\">\r\nbody { font-weight: normal; font-size: normal; font-family: ".$font."; color: ".$color."; background-color: ".$background." }\r\na:link,a:active,a:visited { text-decoration: underline; color : ".$links." }\r\ndiv { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }\r\ndiv.form { background-color: ".$form_color." }\r\n</style></head><body>";
if ( !isset( $_POST['action'] ) )
{
echo "<div class=\"form\">\n";
echo "<form action=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Kime</b> (Leqebi)<br/>\n";
echo "<input type=\"nick{$ref}\" name=\"nk\" /><br/>\n";
echo "<b>Rengli niki</b><br/>\n";
echo "<input type=\"file\" name=\"nik\" /><br/>\n";
echo "<u>Qeyd:</u> <br/>\n";
echo "<input type=\"text\" name=\"text\" /><br/>\n";
echo "<u>Ne&#231;e G&#252;nl&#252;k?</u> <br/>\n";
echo "<input type=\"text\" name=\"gun\"/><br/>\n";
echo "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n";
echo "<input type=\"submit\" value=\"G&#246;nder\" /><br/></form></div>\n";
}
else
{
if ( !is_uploaded_file( $_FILES['nik']['tmp_name'] ) )
{
echo "<b>Rengli niki se&#231;memisiniz.</b><br/>---<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit( );
}
if ( 200000 < filesize( $_FILES['nik']['tmp_name'] ) )
{
echo "&#350;eklin hecmi 20 kb-den &#231;ox olmas&#305;na icaze verilmir.<br/>Eger &#351;ekilin &#246;l&#231;&#252;s&#252; &#231;ox olsa chata telefonla girenlerin vay hal&#305;na;)))<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit( );
}
$propr = getimagesize( $_FILES['nik']['tmp_name'] );
if ( 500 < $propr[0] || 250 < $propr[1] )
{
echo "500x250 ol&#231;&#252;den &#231;ox olan &#351;ekillere icaze verilmir. (Chatda Anormal g&#246;rsenir) Standart olcu eslinde 190x85-dir<br/><i>Y&#252;klediyiniz Nikin &#246;l&#231;&#252;s&#252;: ".$propr[0]."x".$propr[1]."<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit( );
}
if ( !ctype_digit( $nk ) )
{
$nk = trim( $nk );
if ( $nk == "" )
{
$nk = 1e+011;
}
$nk = strtolower( $nk );
$q = mysql_query( "SELECT * FROM `users` WHERE `latuser` = '".$nk."';" );
}
else
{
$q = mysql_query( "SELECT * FROM `users` WHERE `id` = '".$nk."';" );
}
if ( mysql_affected_rows( ) == 0 )
{
echo "<b>{$nk}</b>. leqebli istifade&#231;i bazada yoxdur.\r\n<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit( );
}
else
{
$users = mysql_fetch_array( $q );
$usser = $users['user'];
$toid = $users['id'];
$vaxts = $gun * 86400 + time( );
}
$bal_i = mysql_query( "SELECT `saat` FROM `hesab` WHERE `usid` = '".$toid."' and `x`='9';" );
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
echo "<b>{$usser}</b>. leqebli istifade&#231;inin Rengli nik d&#252;zeltmek sistemi var.<br/>Rengli nik d&#252;zeltme vaxt&#305; qurtard&#305;qdan sonra ona rengli niki panelden vermek olar.<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "</div></body></html>";
exit( );
}
$date = date( "d-m-Y H:i:s" );
$q = mysql_query( "SELECT * FROM `c_nick` WHERE `to` = '".$toid."';" );
if ( mysql_num_rows( $q ) != 0 )
{
$axtar = mysql_fetch_array( $q );
$sonvaxt = $axtar['time'];
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
echo "<b>{$usser}</b>,  leqebli &#350;exsin <u>Rengli Niki</u> Var...<br/>\n";
echo "<b>Nikin vaxt&#305;na {$tkick} {$vaxt} qal&#305;b</b>\n";
echo "<br/>----<br/>\n";
echo "<a href=\"yeninik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
echo "</div></body></html>";
exit( );
}
$adi = $toid.".gif";
if ( copy( $_FILES['nik']['tmp_name'], "i/".$adi."" ) )
{
echo "Nikin G&#246;r&#252;nt&#252;s&#252;: <img src='i/".$adi."'/><br/>M&#252;ddeti: {$gun} g&#252;nl&#252;k<br/>----<br/>\n";
}
$query = mysql_query( "INSERT INTO `c_nick` VALUES(0, '".$id."', '".$toid."', '".$adi."', '".$date."', '".$vaxts."', '".$gun."', '".$text."');" );
if ( $query )
{
$olchu = round( filesize( "i/".$adi."" ) / 1024, 1 );
echo "<b>".$olchu." Kb Rengli nik <u>{$usser}</u> leqebli istifade&#231;iye  verildi.</b><br/>\n";
}
else
{
echo "<b>Sehv Var.</b><br/>\n";
echo "<u>".mysql_error( )."</u><br/>\n";
}
}
echo "<a href=\"renglinik.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nik Paneli</a><br/>\n";
echo "<a href=\"bal_add.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Paneli</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo "</body></html>";
?>
