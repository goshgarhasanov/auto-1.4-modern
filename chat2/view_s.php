<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$virtuallevel9 = array( "", "", "" );
if ( in_array( $id, $virtuallevel9 ) )
{
$row['level'] = 9;
}
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
echo "<a href=\"view_s.php?go=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS Mektublar</a><br/>\n";
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
echo $i.") <a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;nk={$u_id}&amp;ref={$ref}\">{$u_user}</a>-{$cins}<br/>";
++$i;
}
echo "****<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"view_s.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;nick={$nick}&amp;ref={$ref}\">&lt;&lt;{$ot}</a>.\n";
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
echo " | <a href=\"view_s.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;nick={$nick}&amp;ref={$ref}\">{$do}&gt;&gt;</a>\n";
}
if ( 1 <= $s && 10 < $all )
{
echo "<br/>";
}
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
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
echo "<anchor>Axtar<go href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"bol\" value=\"1\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>----<br/><a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">-Admin Panel-</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
echo "<card title=\"MMS Mektublar...\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
if ( empty( $act ) )
{
if ( $nk != "" )
{
$query = mysql_query( "select COUNT(lid) from `mms` where `to` = '".$nk."' or `id` = '".$nk."';" );
}
else
{
$query = mysql_query( "select COUNT(lid) from `mms` ;" );
}
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
if ( $nk != "" )
{
$q = mysql_query( "select * from `mms` where id = '".$nk."' or id = '".$nk."' order by time desc limit {$o},{$do};" );
}
else
{
$q = mysql_query( "select * from `mms` order by time desc limit {$o},{$do};" );
}
if ( $nk != "" )
{
$us = mysql_query( "select * from users where id = '".$nk."';" );
if ( mysql_affected_rows( ) == 0 )
{
echo "<b>Not_User</b>: leqebine aid MMS Mektublar (<b>{$all}</b>)<br/>*****<br/>";
}
else
{
$a = mysql_fetch_array( $us );
echo "<b>".$a['user']."</b> - leqebine aid MMS Mektublar: (<b>{$all}</b>)<br/>*****<br/>";
}
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#220;mumi MMS Mektublar</a><br/>----<br/>\n";
}
else
{
echo "<b>MMS Mektublar</b>: (<b>{$all}</b>)<br/>*****<br/>";
echo "<a href=\"view_s.php?go=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Axtar</a> |\n";
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Yenile</a><br/>----<br/>\n";
}
if ( $do == 0 )
{
echo "<i>Bu istifade&#231;iye aid MMS Mektub yoxdur.</i><br/>\n";
}
else
{
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $q );
$kim = $arr['id'];
$kime = $arr['to'];
$us1 = mysql_query( "select * from users where id = '".$kim."';" );
if ( mysql_affected_rows( ) == 0 )
{
$user1 = "Not_User";
}
else
{
$a = mysql_fetch_array( $us1 );
$user1 = $a['user'];
}
$us2 = mysql_query( "select * from users where id = '".$kime."';" );
if ( mysql_affected_rows( ) == 0 )
{
$user2 = "Not_User";
}
else
{
$a = mysql_fetch_array( $us2 );
$user2 = $a['user'];
}
$klu4 = $arr['lid'];
$photo = $arr['photo'];
$mesag = $arr['body'];
print " <b>{$i})</b>-<i><a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;nk={$kim}&amp;ref={$ref}\">".$user1."</a></i> &#187; <a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;nk={$kime}&amp;ref={$ref}\">".$user2."</a>";
print "<b>|&gt;</b>".$mesag."";
if ( file_exists( "mms/".$photo."" ) )
{
$daroq = getimagesize( "mms/".$photo."" );
$i_nam = trim( $daroq[2] );
if ( $i_nam == "1" || $i_nam == "2" || $i_nam == "3" )
{
$fayladi = "&#350;ekili";
if ( $i_nam == "1" )
{
$img_type = "gif";
}
if ( $i_nam == "2" )
{
$img_type = "jpeg";
}
if ( $i_nam == "3" )
{
$img_type = "png";
}
if ( 60 < $daroq[0] || 60 < $daroq[1] )
{
echo " - <img src=\"image.php?img=mms/{$photo}&amp;size=50\" alt=\"foto\"/> - [<a href=\"view_s.php?act=".$klu4."&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}\">bax</a>]<br/>\n";
}
else
{
echo "<img src=\"mms/{$photo}\" alt=\"&#350;ekil\"/> - [<a href=\"view_s.php?act=".$klu4."&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}&amp;nk={$nk}\">bax</a>]<br/>\n";
}
}
else
{
echo "<b>Fayl</b>\n";
echo "- [<a href=\"view_s.php?act=".$klu4."&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}&amp;nk={$nk}\">bax</a>]<br/>\n";
}
}
else
{
echo "<br/>";
}
++$i;
}
}
echo "----<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;ref={$ref}&amp;nk={$nk}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $all / 10;
$test = round( $tes );
if ( $do < $all && $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $all < $do )
{
$do = $all;
}
echo " |  <a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;s={$next}&amp;ref={$ref}&amp;nk={$nk}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
else if ( 1 < $s )
{
echo "<br/>";
}
if ( 10 < $all )
{
echo "<br/>";
}
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Panel</a> |\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
}
else if ( $act == "del" )
{
$q = mysql_query( "select `photo` from `mms` where lid = '".$del."';" );
$arr = mysql_fetch_array( $q );
$photo = $arr['photo'];
mysql_query( "DELETE FROM `mms` WHERE `lid` = '".$del."';" );
if ( file_exists( "mms/".$photo."" ) )
{
@unlink( @"mms/".@$photo."" );
}
echo "<u>Silindi</u>...<br/>";
echo $divide;
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}&amp;nk={$nk}\">Geri Qay&#305;t</a><br/>";
}
else
{
$q = mysql_query( "select * from `mms` where lid = '".$act."' order by time desc;" );
if ( mysql_affected_rows( ) == 0 )
{
echo "error";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
$arr = mysql_fetch_array( $q );
$kim = $arr['id'];
$kime = $arr['to'];
$us1 = mysql_query( "select * from users where id = '".$kim."';" );
if ( mysql_affected_rows( ) == 0 )
{
$user1 = "Not_User";
}
else
{
$a = mysql_fetch_array( $us1 );
$user1 = $a['user'];
}
$us2 = mysql_query( "select * from users where id = '".$kime."';" );
if ( mysql_affected_rows( ) == 0 )
{
$user2 = "Not_User";
}
else
{
$a = mysql_fetch_array( $us2 );
$user2 = $a['user'];
}
$klu4 = $arr['lid'];
$photo = $arr['photo'];
$mesag = $arr['body'];
$date = $arr['date'];
if ( file_exists( "mms/".$photo."" ) )
{
$daroq = getimagesize( "mms/".$photo."" );
$i_nam = trim( $daroq[2] );
if ( $i_nam == "1" || $i_nam == "2" || $i_nam == "3" )
{
$fayladi = "&#350;ekili";
print "MMS &#350;ekil:<br/>\n";
if ( 220 < $daroq[0] || 220 < $daroq[1] )
{
if ( $i_nam == "1" )
{
$img_type = "gif";
}
if ( $i_nam == "2" )
{
$img_type = "jpeg";
}
if ( $i_nam == "3" )
{
$img_type = "png";
}
echo "<img src=\"images.php?img=mms/{$photo}&amp;size=150\" alt=\"foto\"/><br/>\n";
}
else
{
echo "<img src=\"mms/{$photo}\" alt=\"&#350;ekil\"/><br/>\n";
}
}
else
{
$fl = explode( ".", $photo );
$file = trim( $fl[1] );
if ( $file == "3gp" )
{
echo "<u>.3gp</u>, (Video - canl&#305; g&#246;r&#252;nt&#252;) formatl&#305; fayl.<br/>----<br/>";
$fayladi = "3gp fayl&#305;n&#305;";
}
else
{
if ( $file == "doc" )
{
echo "<u>.doc</u>, (metn-yaz&#305;, Microsoft Word) formatl&#305; fayl.<br/>----<br/>";
$fayladi = "fayl&#305;";
}
else
{
if ( $file == "mp3" )
{
print "MMS Musiqi:<br/>\n";
echo "<u>.mp3</u>, (Musiqi - ses) formatl&#305; fayl.<br/>----<br/>";
$fayladi = "mp3 fayl&#305;n&#305;";
}
else
{
print "Xeta:<br/>\n";
echo "<i>Fayl&#305;n tipi melum deyil. Olabilsin ki, fayl tam y&#252;klenmeyib.</i><br/>----<br/>";
}
}
}
}
}
else
{
echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
$error = "error";
}
if ( empty( $error ) )
{
if ( !empty( $mesag ) )
{
print "Mesaj<b>:&gt;</b>".$mesag."<br/>";
}
echo "<a href=\"mms/".$photo."\">{$fayladi} y&#252;kle</a><br/>\n";
echo "-<br/>";
echo "Bu MMS-i {$date} tarixinde,<br/><b>{$user1}</b> - <u>{$user2}</u> &#252;&#231;&#252;n g&#246;nderib.<br/>";
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;s={$s}&amp;act=del&amp;del={$klu4}&amp;ref={$ref}\">{$fayladi} sil</a><br/>";
echo "----<br/>";
}
echo "<a href=\"view_s.php?id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}&amp;nk={$nk}\">Geri Qay&#305;t</a><br/>";
}
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
?>
