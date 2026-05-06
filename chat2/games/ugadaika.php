<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "../ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$posts = $row['posts'];
$gposts = $row['gposts'];
$my = $stavka;
$master = mt_rand( 1, 9 );
$myvalent = $stavka + $stavka;
$myzhopa = $posts - $stavka;
$mywin = $posts + $myvalent;
$gmyzhopa = $gposts - $stavka;
$gmywin = $gposts + $myvalent;
ob_start( );
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
print "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
print "<wml>";
print "<card id=\"index\" title=\"Reqemi Tap\">";
print "<p align=\"center\">";
switch ( $mod )
{
case "itog" :
if ( 9 < $stavka || $stavka < 0 )
{
print $fsize1;
print "1-den  9-a kimi her hans&#305;sa bir reqemi yazmal&#305;s&#305;n&#305;z!<br/>";
print $fsize2;
}
else
{
if ( $my < "{$master}" )
{
@mysql_query( @"update users set posts='".@$myzhopa."', gposts='".@$gmyzhopa."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $my == "{$master}" )
{
@mysql_query( @"update users set posts='".@$mywin."', gposts='".@$gmywin."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Qalib Geldiniz!<br/>";
print "Sizin Uddugunuz: ".$myvalent." Post!<br/>";
print $fsize2;
}
if ( "{$master}" < $my )
{
@mysql_query( @"update users set posts='".@$myzhopa."' , gposts='".@$gmyzhopa."' where id='".@$id."'; " );
print $fsize1;
print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
}
break;
default :
if ( $posts < "9" )
{
print $fsize1;
print "Siz Bu Oyuna Daxil Ola Bilmezsiniz!<br/>";
print "Bu oyuna Daxil ola bilmeniz ucun en azi 9 posta ehtiyaciniz var!<br/>";
print $fsize2;
}
else
{
print $fsize1;
print "<b>Reqemi Tap</b><br/>";
print $divide;
print "Sizin Cemi Postunuz: <b>".$posts."</b><br/>";
print "Oyun Balansi: <b>".$gposts."</b><br/>";
print $divide;
print "Secmek Istediyiniz Reqem:<br/>";
print "1-den  9-a kimi her hansisa bir reqemi yazmalisiniz!<br/>";
print $fsize2;
print "<input name=\"stavka\" title=\"stavka\" maxlength=\"1\" format=\"*N\"/><br/>";
print $fsize1;
print "<anchor title=\"go\">Oyna<go href=\"ugadaika.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;mod=itog\" method=\"post\">";
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
print "<a href=\"ugadaika.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Reqemi Tap</a><br/>";
}
print "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Kazino Oyunlari</a><br/>";
print "<a href=\"../enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
print $fsize2;
print "</p></card></wml>";
mysql_close( $link );
ob_end_flush( );
exit( );
?>