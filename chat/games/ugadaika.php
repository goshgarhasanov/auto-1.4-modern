<?php

require( "../inc.php" );
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
$_v->title( "Reqemi Tap", "center" );
$_v->fsize1( $fsize1 );
switch ( $mod )
{
case "itog" :
if ( 9 < $stavka || $stavka < 0 )
{

print "1-den  9-a kimi her hans&#305;sa bir reqemi yazmal&#305;s&#305;n&#305;z!<br/>";

}
else
{
if ( $my < "{$master}" )
{
@mysql_query( @"update users set posts='".@$myzhopa."', gposts='".@$gmyzhopa."' where id='".@$id."'; " );

print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";

}
if ( $my == "{$master}" )
{
@mysql_query( @"update users set posts='".@$mywin."', gposts='".@$gmywin."' where id='".@$id."'; " );

print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Qalib Geldiniz!<br/>";
print "Sizin Uddugunuz: ".$myvalent." Post!<br/>";

}
if ( "{$master}" < $my )
{
@mysql_query( @"update users set posts='".@$myzhopa."' , gposts='".@$gmyzhopa."' where id='".@$id."'; " );

print "Sizin Dediyiniz Reqem: ".$my."<br/>";
print "Masterin Fikrindeki ise: ".$master."<br/>";
print $divide;
print "Siz Meglub Oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";

}
}
break;
default :
if ( $posts < "9" )
{

print "Siz Bu Oyuna Daxil Ola Bilmezsiniz!<br/>";
print "Bu oyuna Daxil ola bilmeniz ucun en azi 9 posta ehtiyaciniz var!<br/>";

}
else
{

    print "<b>Reqemi Tap</b><br/>";
    print $divide;
    print "Sizin Cemi Postunuz: <b>".$posts."</b><br/>";
    print "Oyun Balansi: <b>".$gposts."</b><br/>";
    print $divide;
    print "Secmek Istediyiniz Reqem:<br/>";
    print "1-den  9-a kimi her hansisa bir reqemi yazmalisiniz!<br/>";
    $_v->action( "ugadaika.php?id={$id}&amp;ps={$ps}&amp;mod=itog&amp;ref={$ref}" );
    print $_v->input( "<input name=\"stavka\" maxlength=\"2\" title=\"stavka\" format=\"*N\"/>" )."<br/>";
    print $_v->submit( "Oyna" );
    $_v->wml( "" );
}
break;
}

$_v->divide( );
if ( $mod )
{
print "<a href=\"ugadaika.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Reqemi Tap</a><br/>";
}
print "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Kazino Oyunlari</a><br/>";
print "<a href=\"../enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
$_v->fsize2( $fsize2 );
$_v->end( "1", $link );
ob_end_flush( );
exit( );
?>