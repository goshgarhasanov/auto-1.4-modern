<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "../ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$posts = $row['posts'];
$gposts = $row['gposts'];
$my = $n;
$master = mt_rand( 1, 3 );
$myvalent = $s + $s;
$myzhopa = $posts - $s;
$mywin = $posts + $s;
$gmyzhopa = $gposts - $s;
$gmywin = $gposts + $s;
ob_start( );
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
print "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
print "<wml>";
print "<card id=\"index\" title=\"Oymagi Tap\">";
print "<p align=\"center\">";
switch ( $mod )
{
case "select" :
if ( 10 < $stavka || $stavka < 0 )
{
print $fsize1;
print "Maksimum 10 post qoya bilersiniz!<br/>";
print $fsize2;
}
else
{
print $fsize1;
print "<a href=\"naperstki.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;n=1&amp;s={$stavka}&amp;mod=itog\">";
print "<img src=\"naperstki/1.gif\" alt=\"1\"/></a><br/>";
print "<a href=\"naperstki.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;n=2&amp;s={$stavka}&amp;mod=itog\">";
print "<img src=\"naperstki/2.gif\" alt=\"2\"/></a><br/>";
print "<a href=\"naperstki.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;n=3&amp;s={$stavka}&amp;mod=itog\">";
print "<img src=\"naperstki/3.gif\" alt=\"3\"/></a><br/>";
print $fsize2;
}
break;
case "itog" :
if ( $posts < $s || $s < 0 )
{
print $fsize1;
print "olmaz:)<br/>";
print $fsize2;
print "</p></card></wml>";
mysql_close( $link );
ob_end_flush( );
exit( );
}
if ( $my < "{$master}" )
{
@mysql_query( @"update users set posts='".@$myzhopa."', gposts='".@$gmyzhopa."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Acdiginiz: ".$my."<br/>";
print "Masterin Gizletdiyi: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$s." Post!<br/>";
print $fsize2;
}
if ( $my == "{$master}" )
{
@mysql_query( @"update users set posts='".@$mywin."', gposts='".@$gmywin."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Acdiginiz: ".$my."<br/>";
print "Masterin Gizletdiyi: ".$master."<br/>";
print $divide;
print "Siz Qalib Geldiniz!<br/>";
print "Sizin Uddugunuz: ".$myvalent." Post!<br/>";
print $fsize2;
}
if ( "{$master}" < $my )
{
@mysql_query( @"update users set posts='".@$myzhopa."' , gposts='".@$gmyzhopa."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Acdiginiz: ".$my."<br/>";
print "Masterin Gizletdiyi: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$s." Post!<br/>";
print $fsize2;
}
break;
default :
if ( $posts < "10" )
{
print $fsize1;
print "Siz Bu oyuna Daxil Ola Bilmersiniz!!<br/>";
print "Bu oyunu oynamaq &#252;&#231;&#252;n Sizin 10 postunuz olmal&#305;d&#305;r!<br/>";
print $fsize2;
}
else
{
print $fsize1;
print "<b>Oymag&#305; Tap</b><br/>";
print $divide;
print "Sizin Cemi Postunuz: <b>".$posts."</b><br/>";
print "Oyun Balans&#305;: <b>".$gposts."</b><br/>";
print $divide;
print "<i>Ne&#231;e Post?</i><br/>";
print "1 den ".$posts." kimi<br/>";
print $fsize2;
print "<input name=\"stavka\" title=\"stavka\" maxlength=\"2\" format=\"*N\"/><br/>";
print $fsize1;
print "<anchor title=\"go\">Oyna<go href=\"naperstki.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;mod=select\" method=\"post\">";
print "<postfield name=\"stavka\" value=\"$(stavka)\"/>";
print "</go></anchor>";
print $fsize2;
print "<br/>";
}
break;
}
print $fsize1;
print $divide;
if ( $mod )
{
print "<a href=\"naperstki.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Oymagi Tap</a><br/>";
}
print "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Kazino Oyunlari</a><br/>";
print "<a href=\"../enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
print $fsize2;
print "</p></card></wml>";
mysql_close( $link );
ob_end_flush( );
?>