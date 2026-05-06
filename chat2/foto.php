<?php

Error_Reporting( E_ALL & ~E_NOTICE );
header( "Cache-Control: no-cache" );
header( "Content-Type:text/html; charset=UTF-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$ref = rand( 10000, 1000000 );
$user = $row['user'];
$myfoto = $row['img'];
$online = time( ) + $vaxt;
mysql_query( "UPDATE `users` SET `time` = '".$online."' WHERE `id` = '".$id."';" );
if ( isset( $go ) )
{
if ( !isset( $file ) )
{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>Xeta!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"red\">";
echo "<div align=\"center\">";
echo "<font color=\"red\" size=\"3\"><b>&#350;ekil se&#231;memisiz!</b></font>";
echo "<br/>---<br/>";
echo "<a href=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>";
echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
exit( );
}


$size = filesize( $file );
$par = GetImageSize( $file );
if ( $par[2] !== 2 && $par[2] !== 1 && $par[2] !== 3 )
{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>Xeta var!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"red\">";
echo "<div align=\"center\">";
echo "<b><font color=\"ff00cc\" size=\"3\">Yaln&#305;z GIF, PNG, JPG ve JPEG format&#305;nda &#350;ekil y&#252;kleye bilersiz...</font></b>";
echo "<br/>---<br/>";
echo "<a href=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\"> Geri Qay&#305;t</a>";
echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
exit( );
}
if ( 502400 < $size )
{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>Xeta!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"red\">";
echo "<div align=\"center\">";
echo "<font color=\"red\" size=\"3\"><b>Se&#231;diyiniz &#351;ekil 500 kb-dan &#231;oxdur!</b></font>";
echo "<br/>---<br/>";
echo "<a href=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\"> Geri Qay&#305;t</a>";
echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
exit( );
}
if ( $handle = opendir( "photos/".$id."" ) )
{
$c = 0;
while ( false !== ( $files = readdir( $handle ) ) )
{
if ( $files != "." && $files != ".." && $files != "Thumbs.db" )
{
$a[] = $files;
++$c;
}
}
closedir( $handle );
}
$allkol = count( $a ) + 1;
if ( $allkol == 1 )
{
$lpost = 0;
}
else if ( $allkol == 2 )
{
$lpost = 500;
}
else if ( $allkol == 3 )
{
$lpost = 1000;
}
else
{
$lpost = 1000;
if ( $allkol == 4 )
{
$lpost = 2000;
}
else if ( $allkol == 5 )
{
$lpost = 4000;
}
else if ( $allkol == 6 )
{
$lpost = 7000;
}
else if ( $allkol == 7 )
{
$lpost = 12000;
}
else if ( $allkol == 8 )
{
$lpost = 17000;
}
else if ( $allkol == 9 )
{
$lpost = 25000;
}
else if ( $allkol == 10 )
{
$lpost = 30000;
}
else
{
$lpost = 1e+022;
}
}
if ( $row['posts'] < $lpost )
{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"red\">";
echo "<div align=\"center\">";
echo "<b>-STOP-</b><br/>*****<br/>\n";
echo "<font color=\"#99f088\">\n";
if ( $allkol < "10" )
{
echo "Foto Albom-a <b>{$allkol}</b> &#350;ekil Y&#252;klemek &#252;&#231;&#252;n <b>{$lpost}</b> postunuz olmal&#305;d&#305;r!<br/>\n";
}
else
{
echo "<b>Foto Albom-a maxsimum <b>10</b> &#350;ekil Y&#252;klemek olar...</b><br/>Sizin Foto-Albomunuzda 10 &#350;ekil var!<br/>\n";
}
echo "</font>----<br/>";
echo "<a href=\"cabinet.php?go=foto&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;ekillerim Foto-Albom</a><br/>";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
exit( );
}
require( "file/require/sh_files" );
$qeyd = narmobil( $qeyd );
$photo_type = substr( $_FILES['file']['type'], 6 );
$photo_type = strtolower( $photo_type );
$aktiv = array( "gif", "jpeg", "jpg", "png" );
$pathinfo = pathinfo( $_FILES['file']['name'] );
if ( !in_array( strtolower( $pathinfo['extension'] ), $aktiv ) )
{
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"#cc00ff\">";
echo "<div align=\"center\">";
echo "<b>-ANTI-HACK-</b><br/>*****<br/>\n";
echo "<font color=\"#99f088\">\n";
echo "<b><font color=\"ff00cc\" size=\"3\">Yaln&#305;z GIF, PNG, JPG ve JPEG format&#305;nda &#350;ekil y&#252;kleye bilersiz...</font></b><br/>\n";
echo "</font>----<br/>";
echo "<a href=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>";
echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
exit( );
}
$rn = rand( 100, 99999 );
$newfoto = $id.( 0 - $rn ).".{$photo_type}";
$query = mysql_query( "INSERT INTO `albom` VALUES(0, '".$id."', '".$newfoto."', 0, {$row['sex']}, '".$qeyd."');" );
if ( file_exists( "photos/".$id."/".$newfoto."" ) )
{
unlink( "photos/".$id."/".$newfoto."" );
}
Copy( $file, "photos/".$id."/".$newfoto."" );
@mysql_query( @"Update users set img='".@$allkol."' where id ='".@$id."'" );
}
$result = mysql_query( "select * from users where id = '".$id."'" );
if ( isset( $foto ) )
{
$myfoto = $foto;
}
$row = mysql_fetch_array( $result );
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
echo "<html>";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<title>Foto Albom!</title>";
echo "</head>";
echo "<body bgcolor=\"#000000\" link=\"#00ff00\" vlink=\"blue\" text=\"red\">";
echo "<div align=\"center\">";
if ( $newfoto != "" )
{
echo "<b>FOTO-ALBOM</b><br/>*****<br/>\n";
echo "<img src=\"photos/{$id}/{$newfoto}\">\n";
echo "<br/>*****<br/>\n";
echo "Bu &#350;ekil Foto Alboma Elave Edildi.<br/>\n";
mysql_query ("Update `users` set `stat`='0.04'+`stat` where `id` ='".$id."';");

echo "Tebrikler...\n";
echo "</div>";
echo "<div align=\"left\">";
echo "<br/>----<br/>\n";
echo "<a href=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Yeni &#350;ekil Y&#252;kle</a><br/>";
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;img={$id}&amp;ref={$ref}\">Foto Albom</a><br/>----<br/>";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
}
else
{
echo "<b>FOTO-ALBOM</b><br/>*****<br/><br/>\n";
echo "</div>";
echo "<div align=\"left\">";
echo "1) <font color=\"#f1f088\">&#350;ekil 500 kb-dan &#231;ox olmamal&#305;d&#305;r<br/></font>\n";
echo "2) <i><font color=\"#f1f088\">\"<u>Foto-Albom</u>\"a &#350;ekil Y&#252;klemek &#252;&#231;&#252;n m&#252;eyyen edilmi&#351; postunuz olmal&#305;d&#305;r. (postunuz azalm&#305;r)</font></i><br/>----<br/>\n";
echo "<font color=\"#99f088\">\n";
echo "1 &#350;ekil - 0 post<br/>\n";
echo "2 &#350;ekil - 500 post<br/>\n";
echo "3 &#350;ekil - 1000 post<br/>\n";
echo "4 &#350;ekil - 2000 post<br/>\n";
echo "5 &#350;ekil - 4000 post<br/>\n";
echo "6 &#350;ekil - 10.000 post<br/>\n";
echo "7 &#350;ekil - 15.000 post<br/>\n";
echo "10 &#350;ekil - 25.000 post<br/>\n";
echo "</font>----<br/>";
echo "<form ENCTYPE=\"multipart/form-data\" action=\"foto.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<b>&#350;ekilinizi se&#231;in:</b><br/>\n";
echo "<INPUT NAME=\"file\" TYPE=\"file\"><br/>\n";
echo "&#350;ekil haqq&#305;nda:<br/>\n";
echo "<input type=\"qeyd\" name=\"qeyd\" /><br />\n";
echo "<input type=\"submit\" name=\"go\" value=\"Y&#252;kle\">\n";
echo "</form>\n";
echo "<a href=\"cabinet.php?go=foto&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;ekillerim Foto-Albom</a><br/>";
echo "<a href=\"cabinet.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;exsi Kabinet</a><br/>";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
}
if ( !is_dir( photos."/".$id ) )
{
@mkdir( @addslashes( @photos )."/".@$id."" );
@chmod( @addslashes( @photos )."/".@$id."", 511 );
}

echo "</div>";
echo "</BODY>\n";
echo "</HTML>\n";
mysql_close( $link );
?>