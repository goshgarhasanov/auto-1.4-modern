<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "../ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$posts = $row['posts'];
$gposts = $row['gposts'];
$krutim = mt_rand( 1, 58 );
$bar1 = mt_rand( 0, 3 );
$bar2 = mt_rand( 2, 4 );
$bar3 = mt_rand( 5, 6 );
$myzhopa1 = $posts1 - $stavka;
$mybigwin1 = $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka;
$mywin1 = $stavka + $stavka + $stavka + $stavka + $stavka;
$sw1 = $stavka + $stavka + $stavka;
$myexwin1 = $posts1 + $mywin1;
$sm1 = $posts1 + $sw1;
$myexbigwin1 = $posts1 + $mybigwin1;
$myzhopa = $posts - $stavka;
$mybigwin = $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka + $stavka;
$mywin = $stavka + $stavka + $stavka + $stavka + $stavka;
$sw = $stavka + $stavka + $stavka;
$myexwin = $posts + $mywin;
$sm = $posts + $sw;
$myexbigwin = $posts + $mybigwin;
ob_start( );
print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
print "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
print "<wml>";
print "<card id=\"index\" title=\"Birqollu Bandit\">";
print "<p align=\"center\">";
switch ( $mod )
{
case "itog" :
if ( 10 < $stavka || $stavka < 0 )
{
print $fsize1;
if ( 10 < $stavka )
{
echo "Maxsumum 10 Post qoya bilersiz.<br/>\n";
}
else
{
print "Sizin qoymaq istediyiniz qeder postunuz yoxdur!<br/>Sizin Cemi: ".$posts." Postunuz var!<br/>";
}
print $fsize2;
}
else
{
if ( $krutim == "1" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "2" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "3" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "4" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "5" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "6" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "7" )
{
@mysql_query( @"update users set posts='".@$myexbigwin."' , gposts='".@$myexbigwin1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/7.gif\" alt=\"7\"/>";
print "<img src=\"bandit/7.gif\" alt=\"7\"/>";
print "<img src=\"bandit/7.gif\" alt=\"7\"/><br/>";
print $fsize1;
print $divide;
print "Siz JACKPOT qazandiniz!!!!<br/>";
print "Sizin Uddugunuz: ".$mybigwin." Post!<br/>";
print $fsize2;
}
if ( $krutim == "8" )
{
@mysql_query( @"update `users` set posts='".@$myexwin."' , gposts='".@$myexwin1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/7.gif\" alt=\"7\"/>";
print "<img src=\"bandit/s0.gif\" alt=\"0\"/>";
print "<img src=\"bandit/7.gif\" alt=\"7\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$mywin." Post!<br/>";
print $fsize2;
}
if ( $krutim == "9" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "10" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "11" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "12" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "13" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "14" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "15" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "16" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "17" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "18" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "19" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "20" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "21" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "22" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "23" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "24" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "25" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "26" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "27" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "28" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "29" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "30" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "31" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "32" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "33" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "34" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "35" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "36" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "37" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "38" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "39" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "40" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "41" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "42" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "43" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "44" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "45" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "46" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "47" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "48" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "49" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "50" )
{
@mysql_query( @"update `users` set posts='".@$myzhopa."' , gposts='".@$myzhopa1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s{$bar1}.gif\" alt=\"{$bar1}\"/>";
print "<img src=\"bandit/s{$bar2}.gif\" alt=\"{$bar2}\"/>";
print "<img src=\"bandit/s{$bar3}.gif\" alt=\"{$bar3}\"/><br/>";
print $fsize1;
print $divide;
print "Siz Meglub oldunuz!<br/>";
print "Sizin Uduzdugunuz: ".$stavka." Post!<br/>";
print $fsize2;
}
if ( $krutim == "51" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "52" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "53" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "54" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "55" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "56" )
{
@mysql_query( @"update users set posts='".@$sm."' , gposts='".@$sm1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$sw." Post!<br/>";
print $fsize2;
}
if ( $krutim == "57" )
{
@mysql_query( @"update users set posts='".@$myexwin."' , gposts='".@$myexwin1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$mywin." Post!<br/>";
print $fsize2;
}
if ( $krutim == "58" )
{
@mysql_query( @"update users set posts='".@$myexwin."' , gposts='".@$myexwin1."' where id='".@$id."'; " );
print $fsize1;
print "Birqollu Bandit<br/>";
print $divide;
print $fsize2;
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/>";
print "<img src=\"bandit/s1.gif\" alt=\"1\"/><br/>";
print $fsize1;
print $divide;
print "Siz Qalib geldiniz!<br/>";
print "Sizin Uddugunuz: ".$mywin." Post!<br/>";
print $fsize2;
}
}
break;
default :
if ( $posts < "10" )
{
print $fsize1;
print "Siz bu oyunu oynaya bilmersiniz!<br/>";
print "Sizin gerek azi 10 postunuz olmal&#305;d&#305;r!<br/>";
print $fsize2;
}
else
{
print $fsize1;
print "<b>Birqollu Bandit</b><br/>";
print $divide;
print "Sizin Postunuz: <b>".$posts."</b><br/>";
print "Oyun Balans&#305;: <b>".$gposts."</b><br/>";
print $divide;
print "Sizin qoyaca&#287;&#305;n&#305;z Post:<br/>";
print "1 den 10-a kimi<br/>";
print $fsize2;
print "<input name=\"stavka\" maxlength=\"2\" title=\"stavka\" format=\"*N\"/><br/>";
print $fsize1;
print "<anchor title=\"go\">Baraban&#305; F&#305;rla<go href=\"777.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;n=3&amp;s={$stavka}&amp;mod=itog\" method=\"post\">";
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
print "<a href=\"777.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Birqollu Bandit</a><br/>";
}
print "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Kazino Oyunlari</a><br/>";
print "<a href=\"../enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
print $fsize2;
print "</p></card></wml>";
mysql_close( $link );
ob_end_flush( );
exit( );
?>