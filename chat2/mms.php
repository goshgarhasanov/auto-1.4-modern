<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$online = time() + $onvaxt;
mysql_query( "UPDATE `users` SET `onl` = '".$online."' WHERE `id` = '".$id."' LIMIT 1;" );

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"MMS Mektub Qutusu\"><p align=\"center\">\n";
echo $fsize1;
echo "Multimediya mektublar (MMS-ler) Qutusu.<br/>MMS Mektub ile istediyiniz istifade&#231;iye &#246;z &#351;ekilinizi g&#246;ndere bilersiz.<br/>*****\n";
echo $fsize2;
echo "</p>";
echo "<p align=\"left\">\n";
switch ($mod)
{
case "gelenler" :
echo $fsize1;
echo "<b>Gelenler</b>:<br/>----<br/>\n";
$sms_count = mysql_query( "select count(lid) as num from mms where `to` = '".$id."' and `d2` = '0';" );
$count = mysql_fetch_array( $sms_count );
$sms_say = $count['num'];
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
$r = mysql_query( "SELECT `lid`, `kod`, `read`, `id`, `date` FROM `mms` WHERE `to` = '".$id."' and `d2` = '0' order by lid desc limit {$o},{$do}" );
if ( mysql_affected_rows( ) == 0 )
{
echo "Teess&#252;f ki, size MMS g&#246;nderen olmay&#305;b.<br/>----<br/>\n";
}
else
{
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $r );
$lid = $arr['lid'];
$read = $arr['read'];
$from = $arr['id'];
$date = $arr['date'];
$qus = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$from."';");
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
mysql_query( "DELETE from mms where to = '".$from."'" );
}
if ( $read == 0 )
{
echo "<b>Yeni</b>-<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=gelen&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a> [{$date}]<br/>\n";
}
else
{
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=gelen&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a> [{$date}]<br/>\n";
}
++$i;
}
echo "----<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"mms.php?mod=gelenler&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;{$ref}\">&lt;&lt;{$ot}</a>.\n";
}
}
$test = round( $sms_say, 1 ) / 10;
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $sms_say < $do )
{
$do = $sms_say;
}
echo " |  <a href=\"mms.php?mod=gelenler&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;{$ref}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
if ( 1 < $s )
{
echo "<br/>";
}
echo $fsize2;
break;
case "gedenler" :
echo $fsize1;
echo "<b>G&#246;nderilenler</b>:<br/>----<br/>\n";
$sms_count = mysql_query( "select count(lid) as num from mms where `id` = '".$id."' and `d1` = '0';" );
$count = mysql_fetch_array( $sms_count );
$sms_say = $count['num'];
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
$r = mysql_query( "SELECT `lid`, `read`, `kod`, `to`, `date` FROM `mms` WHERE `id` = '".$id."' and `d1` = '0' order by lid desc limit {$o},{$do}" );
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
$read = $arr['read'];
$to = $arr['to'];
$date = $arr['date'];
$qus = mysql_query( "Select user from users where id = '".$to."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
mysql_query( "DELETE from mms where to = '".$to."'" );
}
if ( $read == 0 )
{
echo "(Oxunmay&#305;b)-<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=geden&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a> [{$date}]<br/>\n";
}
else
{
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=geden&amp;lid={$lid}&amp;ref={$ref}\">{$nick}</a> [{$date}]<br/>\n";
}
++$i;
}
echo "----<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"mms.php?mod=gedenler&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;{$ref}\">&lt;&lt;{$ot}</a>.\n";
}
}
$test = round( $sms_say, 1 ) / 10;
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $sms_say < $do )
{
$do = $sms_say;
}
echo " |  <a href=\"mms.php?mod=gedenler&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;{$ref}\">{$do}&gt;&gt;</a>\n";
echo "<br/>";
}
if ( 1 < $s )
{
echo "<br/>";
}
echo $fsize2;
break;
case "gelen" :
$lid = intval( $_GET['lid'] );
$q = mysql_query( "SELECT * FROM `mms` WHERE `lid` = '".$lid."' AND `to` = '".$id."'  AND `d2` = '0';" );
if ( mysql_num_rows( $q ) == 0 )
{
echo $fsize1;
echo "<b>Fayl yoxdur.</b><br/><i>MMS Fayl tap&#305;lmad&#305;, yaqin silinib.</i><br/>----<br/>\n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS qutusu</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
exit( );
}
mysql_query( "UPDATE `mms` SET `read` = 1 WHERE `lid` = '".$lid."';" );
$letter = mysql_fetch_array( $q );
$to = $letter['to'];
$from = $letter['id'];
$text = $letter['body'];
$date = $letter['date'];
$mms = $letter['photo'];
$qus = mysql_query( "Select user from users where id = '".$from."'" );
if ( mysql_affected_rows( ) != 0 )
{
$ind = mysql_fetch_array( $qus );
$nick = $ind['user'];
}
else
{
$nick = "user not fond";
}
echo $fsize1;
echo "<u>G&#246;nderdi:</u> <b>{$nick}</b>, leqebli istifade&#231;i <br/>\n";
echo "<u>Vaxt:</u> {$date}<br/>*****<br/>\n";
$sql = mysql_query( "SELECT `photo` FROM `mms` WHERE `lid` = '".$lid."';" );
$adi = mysql_result( $sql, 0 );
echo $fsize2;
if ( file_exists( "mms/".$adi."" ) )
{
$daroq = getimagesize( "mms/".$adi."" );
$n_nam = trim( $daroq[2] );
if ( $n_nam == "1" || $n_nam == "2" || $n_nam == "3" )
{
$fayladi = "&#350;ekili";
if ( $n_nam == "1" )
{
$img_type = "gif";
}
if ( $n_nam == "2" )
{
$img_type = "jpg";
}
if ( $n_nam == "3" )
{
$img_type = "png";
}
echo "<img src=\"normal/".base64_encode( "mms/".$adi."" )."/100/{$site}-{$nick}.{$img_type}\" alt=\"foto\"/><br/>\n";
}
else
{
$fl = explode( ".", $adi );
$file = trim( $fl[1] );
if ( $file == "3gp" )
{
echo $fsize1;
echo "<b>{$nick}</b>,  Size <u>.3gp</u>, (Video - canl&#305; g&#246;r&#252;nt&#252;) format&#305;nda fayl g&#246;nderib.<br/>";
echo $fsize2;
$fayladi = "3gp fayl&#305;n&#305;";
}
else if ( $file == "doc" )
{
echo $fsize1;
echo "<b>{$nick}</b>,  Size <u>.doc</u>, (metn-yaz&#305;, Microsoft Word) format&#305;nda fayl g&#246;nderib.<br/>";
echo $fsize2;
$fayladi = "fayl&#305;";
}
else if ( $file == "mp3" )
{
echo $fsize1;
echo "<b>{$nick}</b>,  Size <u>.mp3</u>, (Musiqi - ses) format&#305;nda fayl g&#246;nderib.<br/>";
echo $fsize2;
$fayladi = "mp3 fayl&#305;n&#305;";
}
else
{
echo $fsize1;
echo "<b>Fayl&#305;n tipi melum deyil ADMIN-e bu haqqda melumat verin.</b><br/>----<br/>";
echo $fsize2;
}
}
$olchu = round(filesize("mms/".$adi) / 1024, 1 );
}
else
{
echo $fsize1;
echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
echo $fsize2;
}
echo $fsize1;
if ( isset( $fayladi ) )
{
echo "<b><u>".$olchu."</u> kb </b>-l&#305;q\n";
$x_size = trim( $daroq[0] );
$y_size = trim( $daroq[1] );
$n_nam = trim( $daroq[2] );
if ( ( 220 < $x_size || 220 < $y_size ) && ( $n_nam == "1" || $n_nam == "2" || $n_nam == "3" ) )
{
if ( $n_nam == "1" )
{
$img_type = "gif";
}
if ( $n_nam == "2" )
{
$img_type = "jpg";
}
if ( $n_nam == "3" )
{
$img_type = "png";
}
echo "<a href=\"max/".base64_encode("mms/".$adi."")."/$site-$nick.$img_type\">{$fayladi} Y&#252;kle</a><br/><br/>\n";
}
else
{
echo "<a href=\"mms/".$adi."\">{$fayladi} y&#252;kle</a><br />----<br />\n";
}
}
if ( $text )
{
echo "<b>Qeyd</b>: <i>{$text}</i><br/>----<br/>\n";
}
echo "<a href=\"upload.php?id={$id}&amp;ps={$ps}&amp;toid={$from}&amp;n={$ref}\">Cavab yaz</a> | \n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=sil&amp;lid={$lid}&amp;n={$ref}\">MMS-i Poz</a><br/>\n";
echo $fsize2;
break;

case "geden" :
$q = mysql_query( "SELECT * FROM `mms` WHERE `lid` = '".$lid."' AND `id` = '".$id."' AND `d1` = '0';" );
if ( mysql_num_rows( $q ) == 0 )
{
echo $fsize1;
echo "<b>Fayl yoxdur.</b><br/><i>MMS Fayl tap&#305;lmad&#305;, yaqin silinib.</i><br/>----<br/>\n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS qutusu</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
exit( );
}
$letter = mysql_fetch_array( $q );
$lid = $letter['lid'];
$to = $letter['to'];
$from = $letter['id'];
$text = $letter['body'];
$date = $letter['date'];
$mms = $letter['photo'];
$q = mysql_query( "SELECT `user` FROM `users` WHERE `id` = '".$to."';" );
$nick = mysql_result( $q, 0 );
echo $fsize1;
echo "<u>Tarix</u>: {$date}<br/>*****<br/>\n";
echo $fsize2;
$sql = mysql_query( "SELECT `photo` FROM `mms` WHERE `lid` = '".$lid."';" );
$adi = mysql_result( $sql, 0 );
if ( file_exists( "mms/".$adi."" ) )
{
$daroq = getimagesize( "mms/".$adi."" );
$n_nam = trim( $daroq[2] );
if ( $n_nam == "1" || $n_nam == "2" || $n_nam == "3" )
{
if ( $n_nam == "1" )
{
$img_type = "gif";
}
if ( $n_nam == "2" )
{
$img_type = "jpg";
}
if ( $n_nam == "3" )
{
$img_type = "png";
}
$fayladi = "&#350;ekili";
echo "<img src=\"normal/".base64_encode( "mms/".$adi."" )."/100/{$site}-{$nick}.{$img_type}\" alt=\"foto\"/><br/>\n";
echo $fsize1;
echo "Siz  bu &#351;ekili <b>{$nick}</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>----<br/>";
echo $fsize2;
}
else
{
$fl = explode( ".", $adi );
$file = trim( $fl[1] );
if ( $file == "3gp" )
{
echo $fsize1;
echo "Siz <u>.3gp</u>, (Video - canl&#305; g&#246;r&#252;nt&#252;) format&#305;nda olan bu fayl&#305; <b>{$nick}</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
echo $fsize2;
$fayladi = "3gp fayl&#305;n&#305;";
}
else if ( $file == "doc" )
{
echo $fsize1;
echo "Siz <u>.doc</u>, (metn-yaz&#305;, Microsoft Word) format&#305;nda olan bu fayl&#305; <b>{$nick}</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
echo $fsize2;
$fayladi = "fayl&#305;";
}
else if ( $file == "mp3" )
{
echo $fsize1;
echo "Siz <u>.mp3</u>, (Musiqi - ses) format&#305;nda olan bu fayl&#305; <b>{$nick}</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
echo $fsize2;
$fayladi = "mp3 fayl&#305;n&#305;";
}
else
{
echo $fsize1;
echo "<b>Fayl&#305;n tipi melum deyil ADMIN-e bu haqqda melumat verin.</b><br/>----<br/>";
echo $fsize2;
}
}
$olchu = round(filesize("mms/".$adi."") / 1024, 1);
}
else
{
echo $fsize1;
echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
echo $fsize2;
}
echo $fsize1;
if ( isset( $fayladi ) )
{
echo "<b><u>".$olchu."</u> kb </b>-l&#305;q\n";
echo "<a href=\"mms/".$adi."\">{$fayladi} y&#252;kle</a><br />----<br /> \n";
}
if ( $text )
{
echo "<b>Qeyd:</b>: <i>{$text}</i><br/>----<br/>\n";
}
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=gedenler&amp;n={$ref}\">Geri qay&#305;t</a> |\n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=sil&amp;lid={$lid}&amp;n={$ref}\">MMS-i Poz</a><br/>\n";
echo $fsize2;
break;
case "temizlik" :
mysql_query( "UPDATE `mms` SET `d1` = 1 WHERE `id` = '".$id."';" );
mysql_query( "UPDATE `mms` SET `d2` = 1 WHERE `to` = '".$id."';" );
echo $fsize1;
echo "<u>Size aid olan MMS fayllar silindi.</u><br/>----<br/>\n";
echo $fsize2;
break;
case "sil" :
$sql = mysql_query( "SELECT `photo`,`to`,`id` FROM `mms` WHERE `lid` = '".$lid."' and (`d2` = '0' or `d1` = '0');" );
if ( mysql_num_rows( $sql ) == 0 )
{
echo $fsize1;
echo "<b>MMS Tap&#305;lmad&#305;...</b><br/>----<br/>\n";
echo $fsize2;
}
else
{
$ff = @mysql_fetch_array( @$sql );
$photo = $ff['photo'];
$usid = $ff['to'];
$from = $ff['id'];
if ( $usid == $id )
{
echo $fsize1;
echo "<u>MMS Fayl&#305; silindi...</u><br/>----<br/>\n";
echo $fsize2;
mysql_query( "UPDATE `mms` SET `d2` = 1 WHERE `to` = '".$id."' and `lid` = '".$lid."';" );
}
else if ( $from == $id )
{
echo $fsize1;
echo "<u>MMS Fayl&#305; silindi...</u><br/>----<br/>\n";
echo $fsize2;
mysql_query( "UPDATE `mms` SET `d1` = 1 WHERE `id` = '".$id."' and `lid` = '".$lid."';" );
}
else
{
echo $fsize1;
echo "Sizin Bu MMS-i  Silmek h&#252;ququnuz yoxdur.<br/>\n";
echo "----<br/>\n";
echo $fsize2;
}
}
break;

default:
$q = mysql_query( "SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' AND `read` = 0 and `d2` = '0';" );
$newto = mysql_result( $q, 0 );
$q = mysql_query( "SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' and `d2` = '0';" );
$to = mysql_result( $q, 0 );
$q = mysql_query( "SELECT COUNT(*) FROM `mms` WHERE `id` = '".$id."' and `d1` = '0';" );
$from = mysql_result( $q, 0 );
echo $fsize1;
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=gelenler&amp;ref={$ref}\">Gelenler ({$newto}/{$to})</a><br/>\n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=gedenler&amp;ref={$ref}\">Gedenler ({$from})</a><br/>\n";
echo "<a href=\"upload.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;ekil(mms) G&#246;nder</a><br/>\n";
echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;mod=temizlik&amp;ref={$ref}\">B&#252;t&#252;n MMS &#350;ekilleri Sil</a><br/>\n";
echo $fsize2;
break;

}
echo $fsize1;
if (!empty($mod))echo "<a href=\"mms.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">MMS qutusu</a><br/>\n";
echo "*****<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
?>
