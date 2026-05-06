<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if( isset( $HTTP_GET_VARS['rm'] ) );
$rm = $HTTP_GET_VARS['rm'];
if ( !ctype_digit( $rm ) )
{
header( "Location: index.php" );
exit( );
}
$rm = mysql_escape_string( $rm );
mysql_query( "Select rm from rooms where rm='".$rm."';" );
if ( mysql_affected_rows( ) == 0 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Daxil olmaq istediyiniz otaq m&#246;vcud deyil!<br/>";
echo "Zehmet olmasa S&#246;bete qo&#351;ulmaq &#252;&#231;&#252;n bir otaq se&#231;in...<br/>****<br/>";
echo "<a href=\"onlayn.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#199;at Otaqlar&#305; </a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
$smset = $row['smiles'];
$us = $row['user'];
$room = "room".$rm;
if ( $rm == 10 )
{
$takep = "&amp;pwd={$pwd}&amp;ref={$ref}";
}
else if ( $mod == "privat" )
{
$takep = "&amp;mod={$mod}&amp;ref={$ref}";
}
else
{
$takep = "&amp;ref={$ref}";
}
$max = $row['max'];
$denyIP = array( " 213.155.29.80", "77.244.112.177", "77.244.112.211", "109.235.193.199", "109.235.193.196", "109.235.193.197", "109.235.193.193", "217.168.176.3", "217.168.176.4", "217.168.176.38", "85.132.57.3" );
if ( !in_array( $REMOTE_ADDR, $denyIP ) )
{
$r_k = "ok";
}
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"tarix\" title=\"Tarix\">\n";
echo "<do type=\"options\" name=\"refresh\" label=\"Yenile\"><go href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep}\"/></do>\n";
echo "<p mode=\"wrap\">\n";
echo $fsize1;
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep}#add\">Yaz</a> |\n";
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep}\">Yenile</a><br/>---\n";
if ( !isset( $num ) )
{
$num = 0;
}
$max = $max + 3;
$bmax = $max * 2;
$bnum = $num + 1;
if ( empty( $pwd ) )
{
$pwd = pub;
}
$pwd = htmlspecialchars( stripslashes( trim( $pwd ) ) );
if ( $row['umnik'] == 0 )
{
$umn = "and usid!=2";
$aumn = "where usid!=2";
}
if ( $rm == 10 )
{
$res = mysql_query( "Select klu4,time,zn,who,message,id,towhom,hid,usid,pwd,reng from room10 WHERE ((pwd = '".$pwd."')OR(pwd = '')) and ((usid = '".$id."')OR(towhom = '".$id."')OR(towhom = '')) order by id desc LIMIT {$bnum},{$bmax}" );
}
else if ( $row['gizlilik'] != 2 )
{
if ( $mod == "privat" )
{
$res = mysql_query( "Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from {$room} WHERE (usid = '".$id."')OR(towhom = '".$id."') {$umn} order by id desc LIMIT {$bnum},{$bmax}" );
}
else
{
$res = mysql_query( "Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from {$room} WHERE (usid = '".$id."')OR(towhom = '".$id."')OR(towhom = '') {$umn} order by id desc LIMIT {$bnum},{$bmax}" );
}
}
else if ( $mod == "privat" )
{
$res = mysql_query( "Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from {$room} WHERE (usid = '".$id."')OR(towhom = '".$id."') {$umn} order by id desc LIMIT {$bnum},{$bmax}" );
}
else
{
$res = mysql_query( "Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from {$room} {$aumn} order by id desc LIMIT {$bnum},{$bmax}" );
}
$kol = mysql_affected_rows( );
@$total = @$kol;
$mread = 0;
while ( $mread < $max )
{
$data = mysql_fetch_array( $res );
if ( $data === FALSE )
{
break;
}
$date = $data['time'];
$klu4 = $data['klu4'];
$name = $data['who'];
$usid = $data['usid'];
$msg = $data['message'];
$zvv = $data['zn'];
$reng = $data['reng'];
$time = $data['id'];
$th = $data['towhom'];
$hid = $data['hid'];
if ( $zvv != "" )
{
$zvv = "<img src=\"img/z".$zvv.".gif\" alt=\".\"/>";
}
if ( $smset == 0 )
{
$msg = preg_replace( "|<img[^>]+>|isU", "|smaylik|", $msg );
}
@mysql_query( @"Select * from ignor where usid='".$usid."' and id='".$id."'" );
if ( mysql_affected_rows( ) == FALSE && ( $hid != 2 || $id == $usid ) )
{
if ( $r_k == "ok" )
{
$msg = "<span style=\"color: {$reng}\">{$msg}</span>";
}
if ( $th == "" )
{
echo "<br/>";
if ( $row['delmsg'] == 1 )
{
echo "[<a href=\"del.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;klu4={$klu4}{$takep}\">x</a>]\n";
}
if ( file_exists( "i/".$usid.".gif" ) )
{
echo "{$zvv}<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$usid}{$takep}\"><img src=\"i/".$usid.".gif\" alt=\"{$name}\"/></a>".$komu."(".$date.")\n".$msg."";
++$mread;
}
else
{
echo "{$zvv}<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;rm={$rm}&amp;nk={$usid}{$takep}\">".$name."</a>".$komu."(".$date.")\n".$msg."";
++$mread;
}
}
else if ( $th == $id || $id == $usid || $row['gizlilik'] == 2 )
{
echo "<br/>";
if ( $row['delmsg'] == 1 )
{
echo "[<a href=\"del.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;klu4={$klu4}{$takep}\">x</a>]\n";
}
if ( file_exists( "i/".$usid.".gif" ) )
{
echo "{$zvv}<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$usid}{$takep}\"><img src=\"i/".$usid.".gif\" alt=\"{$name}\"/></a><b>".$komu."[&#350;exsi]</b>\n".$msg."";
++$mread;
}
else
{
echo "{$zvv}<b><a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$usid}{$takep}\">".$name."</a>".$komu."[&#350;exsi]</b>\n".$msg."";
++$mread;
}
}
}
}
mysql_close( $link );
echo "<br/>---";
$page_next = $num + $max;
$page_prev = $num - $max;
if ( $num == 0 )
{
$total + 1;
}
if ( $max < $total )
{
echo "<br/><a href=\"tarix.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;num={$page_next}{$takep}\">&gt;&gt;{$ot}-{$do}&gt;&gt;</a>";
}
if ( $max <= $num )
{
echo "<br/><a href=\"tarix.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;num={$page_prev}{$takep}\">&lt;&lt;{$ot}-{$do}&lt;&lt;</a>\n";
}
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>";
?>
