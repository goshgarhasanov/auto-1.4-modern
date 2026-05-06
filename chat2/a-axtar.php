<?php

header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if ( $row['level'] != 9 )
{
exit( );
}
if ( !isset( $nick ) && !isset( $nk ) )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"axtar\" title=\"Axtar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Leqeb / ID:</b><br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"Axtar&#305;&#351;\"/><br/>\n";
echo $fsize1;
echo $divide;
echo "IP-Adress:\n";
echo $fsize2;
echo "<select name=\"ip{$ref}\">\n";
echo "<option value=\"0\">Aktiv</option>\n";
echo "<option value=\"1\">Deaktiv</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "IP-Soft:\n";
echo $fsize2;
echo "<select name=\"soft{$ref}\">\n";
echo "<option value=\"0\">Aktiv</option>\n";
echo "<option value=\"1\">Deaktiv</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Parol:\n";
echo $fsize2;
echo "<select name=\"pw{$ref}\">\n";
echo "<option value=\"0\">Aktiv</option>\n";
echo "<option value=\"1\">Deaktiv</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Cinsi:\n";
echo $fsize2;
echo "<select name=\"sex{$ref}\">\n";
echo "<option value=\"0\">O&#287;lanlar</option>\n";
echo "<option value=\"1\">Q&#305;zlar</option>\n";
echo "<option value=\"2\">Ham&#305;s&#305;</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "<anchor>Axtar<go href=\"a-axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"ip\" value=\"$(ip{$ref})\"/>\n";
echo "<postfield name=\"soft\" value=\"$(soft{$ref})\"/>\n";
echo "<postfield name=\"pw\" value=\"$(pw{$ref})\"/>\n";
echo "<postfield name=\"sex\" value=\"$(sex{$ref})\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>";
echo $fsize1;
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( $nick != "" )
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
echo "<a href=\"a-a-axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
echo "<b><a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a></b>\n";
echo "<br/><a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
$inf = mysql_fetch_array( $select );
$user_ip = $inf['user_ip'];
$user_soft = $inf['user_soft'];
$user_sex = $inf['sex'];
$user_ps = $inf['pass'];
if ( $ip == 0 )
{
$l1 = "AND `user_ip` = '".$user_ip."'";
}
else
{
$l1 = "";
}
if ( $soft == 0 )
{
$l2 = "AND `user_soft` = '".$user_soft."'";
}
else
{
$l2 = "";
}
if ( $sex != 2 )
{
$l3 = "AND `sex` = '".$user_sex."'";
}
else
{
$l3 = "";
}
if ( $pw == 0 )
{
$l4 = "AND `pass` = '".$user_ps."'";
}
else
{
$l4 = "";
}
$sorgu = "SELECT * FROM `users` WHERE `id`!='0' {$l1} {$l2} {$l3} {$l4}";
$sorgu1 = mysql_query( $sorgu." ORDER BY `id` ASC" );
$alls = mysql_num_rows( $sorgu1 );
if ( isset( $_GET['s'] ) )
{
$s = intval( $_GET['s'] );
}
else
{
$s = 0;
}
if ( $s < 0 )
{
$s = 0;
}
if ( $alls < $s )
{
$s = 0;
}
$c = $s + 1;
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
if ( $alls == 0 )
{
echo "<card id=\"a_not\" title=\"Ox&#351;arlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"a-axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
else
{
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $alls / 10 + 0.45 );
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
if ( $alls < $do )
{
$do = $alls;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo "<card id=\"a_ok\" title=\"Ox&#351;arlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<u>Ox&#351;arlar</u><br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>{$alls}</b>\" nefer:<br/>****<br/>\n";
$r = mysql_query( $sorgu." ORDER BY `id` ASC  LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $r );
$u_user = $a['user'];
$images = $a['img'];
$u_id = $a['id'];
$year = $a['year'];
$sex_x = $a['sex'];
if ( $sex_x == 0 )
{
$cins = "Ki&#351;i";
}
else
{
$cins = "Qad&#305;n";
}
$year = date( "Y" ) - $year;
if ( $images != "0" )
{
$albom = @mysql_query( @"SELECT photo FROM `albom` WHERE `idfoto`='".@$u_id."' order by vote desc;" );
$img = mysql_fetch_array( $albom );
$photos = $img['photo'];
if ( file_exists( "photos/".$u_id."/".$photos."" ) )
{
$daroq = getimagesize( "photos/{$u_id}/{$photos}" );
}
$n_nam = $daroq[2];
if ( $n_nam == "1" )
{
$img_type = "gif";
}
else if ( $n_nam == "2" )
{
$img_type = "jpg";
}
else if ( $n_nam == "3" )
{
$img_type = "png";
}
else
{
$img_type = "error";
}
$photo = "<img src=\"normal/".base64_encode( "photos/{$u_id}/{$photos}" )."/40/{$site}-{$u_user}.{$img_type}\" alt=\"{$u_user}\"/>\n";
}
echo "".$i.")";
if ( $img_type != "error" )
{
echo $photo;
}
echo " <a href=\"axtar.php?bol=0&amp;id={$id}&amp;ps={$ps}&amp;nick={$u_user}&amp;ref={$ref}\">{$u_user}</a> ya&#351;&#305;: {$year}  {$cins}<br/>";
++$i;
}
echo "****<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"a-axtar.php?go=axtar&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;nick={$nick}&amp;ip={$ip}&amp;soft={$soft}&amp;sex={$sex}&amp;pw={$pw}&amp;ref={$ref}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $alls / 10;
$test = round( $tes );
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $alls < $do )
{
$do = $alls;
}
echo " | <a href=\"a-axtar.php?go=axtar&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;nick={$nick}&amp;ip={$ip}&amp;soft={$soft}&amp;sex={$sex}&amp;pw={$pw}&amp;ref={$ref}\">{$do}&gt;&gt;</a>\n";
}
if ( 1 <= $s && 10 < $alls )
{
echo "<br/>";
}
echo "<a href=\"a-axtar.php?go=axtar&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" accesskey=\"0\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close( $link );
ob_end_flush( );
exit( );
}
echo "<a href=\"a-axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Gizli Axtar&#305;&#351;</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" accesskey=\"0\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close( $link );
ob_end_flush( );
?>
