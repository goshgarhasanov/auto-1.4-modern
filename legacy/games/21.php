<?php
function cards_score( $str )
{
if ( $str == 1 || $str == 2 || $str == 3 || $str == 4 )
{
$num = 6;
}
if ( $str == 5 || $str == 6 || $str == 7 || $str == 8 )
{
$num = 7;
}
if ( $str == 9 || $str == 10 || $str == 11 || $str == 12 )
{
$num = 8;
}
if ( $str == 13 || $str == 14 || $str == 15 || $str == 16 )
{
$num = 9;
}
if ( $str == 17 || $str == 18 || $str == 19 || $str == 20 )
{
$num = 10;
}
if ( $str == 21 || $str == 22 || $str == 23 || $str == 24 )
{
$num = 2;
}
if ( $str == 25 || $str == 26 || $str == 27 || $str == 28 )
{
$num = 3;
}
if ( $str == 29 || $str == 30 || $str == 31 || $str == 32 )
{
$num = 4;
}
if ( $str == 33 || $str == 34 || $str == 35 || $str == 36 )
{
$num = 11;
}
return $num;
}
require( "../inc.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$session_id = session_id();
$posts = $row['posts'];
$guposts = $row['gposts'];
if ( !session_is_registered( "session" ) )
{
$session['round'] = 0;
$session['money'] = $posts;
$session['con'] = 0;
$session['histuser'] = "";
session_register( "session" );
}
$ref = rand( 100, 99999 );
$ses = "stw=".$session_id;
$ses = "{$ses}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}";
$addr = $REMOTE_ADDR;
if ( $posts < "100" )
{
$_v->title('Kart 21','center');
$_v->fsize1($fsize1);
print "Sizin bu oyunu oynamaq &#252;&#231;&#252;n laz&#305;m&#305; qeder postunuz yoxdur!<br/>";
print "Bu oyunu oynamaq &#252;&#231;&#252;n hesab&#305;n&#305;zda minumum 100 post olmal&#305;d&#305;r<br/>";
$_v->divide();
echo "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Oyunlar</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
exit;
}
else
{
if ( $session['round'] == 0 )
{
$max = $session['money'];
if ( $max == 0 )
{
session_unregister( "session" );
$_v->title('Kart 21','center');
$_v->fsize1($fsize1);
echo "Ouna davam etmek ucun hesabinizda post yetersizdi !!!<br/>\n";
echo "<a href=\"out.php?{$ses}\">&#199;&#305;x&#305;&#351;</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
exit;
}
$_v->title('Kart 21','center');
$_v->fsize1($fsize1);
echo "Sizin Cemi <u>{$max}</u> Postunuz var!<br/>\n";
$ru = rand( 1, 36 );
if ( $session['histuser'] !== "" )
{
$ru = trim( str_replace( "|", "", $session['histuser'] ) );
}
echo "<b>Sizin kart:</b><br/><img src=\"cards/{$ru}.gif\" alt=\"cards\"/><br/>\n";
$uscore = cards_score( $ru );
$pstr = "xal";
if ( $uscore == 2 || $uscore == 3 || $uscore == 4 )
{
$pstr = "xal";
}
echo "{$uscore} {$pstr}<br/>\n";
$maxlen = strlen( $max );
echo "Sizin oyuna atd&#305;&#287;&#305;n&#305;z post(1-10):<br/>\n";
$_v->action("21.php?".$ses);
print $_v->input("<input name=\"mn{$ref}\" maxlength=\"{$maxlen}\" title=\"pass\" format=\"*N\"/>")."<br/>\n";
print $_v->submit("Oyna");
$_v->divide();
echo "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Oyunlar</a><br/>";
echo "<a href=\"out.php?{$ses}\">Oyundan C&#305;x</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
$session['histuser'] = "|{$ru}";
$session['round'] = 1;
}
else
{
if ( $session['con'] == 0 )
{
if ( $session['money'] < $mn || $mn === "" || !isset( $mn ) || $mn < 1 || 10 < $mn )
{
$_v->Redirect("21.php?{$ses}","15");
$_v->title('Kart 21','center');
$_v->fsize1($fsize1);
if ( $mn === "" || $mn < 1 )
{
echo "Ortaya qoydugunuz Post gosterilmeyib!\n";
}
else if ( "10" <= $mn )
{
echo "Maxsumum 10 Post qoya bilersiz.\n";
}
else
{
echo "Sizin o qeder postunuz yoxdur.\n";
}
$_v->fsize2($fsize2);
$_v->end('0',$link);
$session['round'] = 0;
exit();
}
$session['con'] = round( $mn );
$session['money'] = $session['money'] - $session['con'];
}
$rate = $session['con'] * 2;
$stavka = $session['con'];
$histuser = split( "\\|", $session['histuser'] );
if ( !isset( $end ) )
{
do
{
$randgen = 1;
$ru = rand( 1, 36 );
$i = 1;
while ( $i < count( $histuser ) )
{
if ( $ru == $histuser[$i] )
{
$randgen = 0;
break;
}
++$i;
}
} while ( $randgen == 0 );
$session['histuser'] = $session['histuser']."|{$ru}";
$countus = count( $histuser );
$histuser[$countus] = $ru;
}
$i = 1;
while ( $i < count( $histuser ) )
{
$ustemp = cards_score( $histuser[$i] );
@$uscore = @$uscore + @$ustemp;
++$i;
}
$udoublet = 0;
if ( count( $histuser ) == 3 && $uscore == 22 )
{
$tone = 0;
$ttwo = 0;
if ( $histuser[1] == 33 || $histuser[1] == 34 || $histuser[1] == 35 || $histuser[1] == 36 )
{
$tone = 1;
}
if ( $histuser[2] == 33 || $histuser[2] == 34 || $histuser[2] == 35 || $histuser[2] == 36 )
{
$ttwo = 1;
}
if ( $tone == 1 && $ttwo == 1 )
{
$udoublet = 1;
}
}
if ( 21 < $uscore && $udoublet == 0 )
{
$close = 1;
}
if ( $udoublet == 1 || $uscore == 21 || $uscore == 20 )
{
$end = 1;
}
$_v->title('Kart 21','center');
$_v->fsize1($fsize1);
$max = $session['money'];
echo "Sizin Cemi: {$max} Postunuz var!<br/>\n";
if ( isset( $close ) )
{
echo "<b>Art&#305;q!</b><br/>\n";
}
$win = 0;
if ( isset( $end ) )
{
$histbot[0] = "";
$hist = $histuser;
$i = 1;
while ( $i < 10 )
{
do
{
$randgen = 1;
$rb = rand( 1, 36 );
$i = 1;
while ( $i < count( $hist ) )
{
if ( $rb == $hist[$i] )
{
$randgen = 0;
break;
}
++$i;
}
} while ( $randgen == 0 );
$histbot[] = $rb;
$hist[] = $rb;
$btemp = cards_score( $rb );
@$bcore = @$bcore + @$btemp;
if ( $bcore == 20 )
{
break;
}
if ( $bcore == 21 )
{
break;
}
if ( $bcore == $uscore )
{
break;
}
if ( $uscore < $bcore )
{
break;
}
if ( 21 < $bcore )
{
break;
}
++$i;
}
echo "<b>Sizin Kartiniz:</b><br/>\n";
$i = 1;
while ( $i < count( $histbot ) )
{
echo "<img src=\"cards/{$histbot[$i]}.gif\" alt=\"cards\"/>";
++$i;
}
$pstr = "xal";
if ( $bcore == 2 || $uscore == 3 || $bcore == 4 || $bcore == 22 || $bcore == 23 || $bcore == 24 )
{
$pstr = "xal";
}
if ( $bcore == 21 )
{
$pstr = "<b>xal!!!</b>";
}
echo "<br/>{$bcore} {$pstr}<br/>\n";
$bdoublet = 0;
if ( count( $histbot ) == 3 && $bcore == 22 )
{
$tone = 0;
$ttwo = 0;
if ( $histbot[1] == 33 || $histbot[1] == 34 || $histbot[1] == 35 || $histbot[1] == 36 )
{
$tone = 1;
}
if ( $histbot[2] == 33 || $histbot[2] == 34 || $histbot[2] == 35 || $histbot[2] == 36 )
{
$ttwo = 1;
}
if ( $tone == 1 && $ttwo == 1 )
{
$bdoublet = 1;
}
}
if ( 21 < $bcore && $bdoublet == 0 )
{
$win = 1;
}
if ( $bcore < $uscore )
{
$win = 1;
}
if ( $udoublet == 1 )
{
$win = 1;
}
if ( $bdoublet == 1 )
{
$win = 0;
}
if ( $uscore == 21 )
{
$win = 1;
}
if ( $bcore == 21 )
{
$win = 0;
}
$close = 1;
}
echo "<b>Sizin Kart:</b><br/>\n";
$i = 1;
while ( $i < count( $histuser ) )
{
echo "<img src=\"cards/{$histuser[$i]}.gif\" alt=\"cards\"/>";
++$i;
}
$pstr = "xal";
if ( $uscore == 2 || $uscore == 3 || $uscore == 4 || $uscore == 22 || $uscore == 23 || $uscore == 24 )
{
$pstr = "xal";
}
if ( $uscore == 21 )
{
$pstr = "<b>xal!!!</b>";
}
echo "<br/>{$uscore} {$pstr}<br/>\n";
if ( isset( $close ) )
{
$session['round'] = 0;
$session['histuser'] = "";
if ( $win == 0 )
{
echo "<b>Siz Meglub Oldunuz!</b><br/>\n";
$f = fopen( "lost.dat", "a+" );
flock( $f, LOCK_EX );
$data = file( "lost.dat" );
@$data[0] = trim( @$data[0] ) + 1;
$stavka = $session['con'];
@$data[1] = trim( @$data[1] ) + @$session['con'];
ftruncate( $f, 0 );
fwrite( $f, "{$data['0']}\n" );
fwrite( $f, "{$data['1']}\n" );
flock( $f, LOCK_UN );
fclose( $f );
$stavka = intval( $stavka );
mysql_query( "Update users set posts=posts-'".$stavka."', gposts=gposts-'".$stavka."' where id ='".$id."';" );
$guposts = $row['gposts'];
$session['con'] = 0;
echo "Sizin Uduzdugunuz <b>".$stavka."</b> Post.<br/>\n";
echo "Cemi: <b>".$guposts."</b> Postunuz var!<br/>\n";
}
else
{
echo "<b>Siz Qalib geldiniz!!</b><br/>\n";
$session['money'] = $session['money'] + $rate;
$f = fopen( "win.dat", "a+" );
flock( $f, LOCK_EX );
$data = file( "win.dat" );
@$data[0] = trim( @$data[0] ) + 1;
@$data[1] = trim( @$data[1] ) + @$session['con'];
ftruncate( $f, 0 );
fwrite( $f, "{$data['0']}\n" );
fwrite( $f, "{$data['1']}\n" );
flock( $f, LOCK_UN );
fclose( $f );
$rate = intval( $rate );
mysql_query( "Update users set posts=posts+'".$rate."', gposts=gposts+'".$rate."' where id ='".$id."';" );
$guposts = $row['gposts'];
$session['con'] = 0;
echo "Sizin Uddugunuz <b>".$rate."</b> Post.<br/>\n";
echo "Oyun Balansiniz: <b>".$guposts."</b> Postunuz var!<br/>\n";
}
echo "<a href=\"21.php?{$ses}\">Yene Oyna</a><br/>\n";
}
else
{
echo "Birinci El ".$rate." Post!<br/>\n";
echo "<a href=\"21.php?{$ses}\">Payla</a>\n";
echo "&lt;ve ya&gt;\n";
echo "<a href=\"21.php?{$ses}&amp;end\">Karti Ac</a><br/>\n";
}
$_v->divide();
echo "<a href=\"out.php?{$ses}\">&#199;&#305;x&#305;&#351;</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
}
}
?>