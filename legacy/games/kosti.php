<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "../ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$uposts = $row['posts'];
$ugposts = $row['gposts'];
$posts = $row['posts'];
$time = date( "H:i" );
$addr = $REMOTE_ADDR;
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n";
echo "<wml>\n";
echo "<card id=\"room\" title=\"Zer At\" >\n";
echo "<p mode=\"wrap\">\n";

switch ( $mod )
{

default :
echo $fsize1;
echo "<b>Oynamaq Isteyirsen?</b><br/>\n";
echo "O halda oyna amma unutmaki sizin atdiginiz zerlerin cemi Masterin atdigindan yuksek olmalidir!-Zer Tutma Ha!<br/>\n";
echo "Sizi Cemi Postunuz: <b>".$uposts."</b><br/>";
echo "Oyun Balansiniz: <b>".$ugposts."</b><br/>";
echo $divide;
echo "Ne qeder qoyursan?:<br/>\n";
echo $fsize2;
echo "<select name=\"stav\" title=\"Stavka\" value=\"5\">\n";
echo "<option value=\"5\">5</option>\n";
echo "<option value=\"10\">10</option>\n";
echo "<option value=\"20\">20</option>\n";
echo "<option value=\"30\">30</option>\n";
echo "<option value=\"40\">40</option>\n";
echo "<option value=\"50\">50</option>\n";
echo "<option value=\"60\">60</option>\n";
echo "<option value=\"100\">100</option>\n";
echo "</select>\n";
echo $fsize1;
echo "<br/><a href=\"kosti.php?id={$id}&amp;ps={$ps}&amp;mod=start&amp;stavka=$(stav)&amp;ref={$ref}\">Zer At</a><br/>\n";
echo $fsize2;
break;

case "start" :
if ( $stavka != 5 && $stavka != 10 && $stavka != 20 && $stavka != 30 && $stavka != 40 && $stavka != 50 && $stavka != 60 && $stavka != 100 && $stavka != 200 && $stavka != 500 && $stavka != 1000 && $stavka != 2500 && $stavka != 5000 && $stavka != 10000 )
{
echo $fsize1;
echo $divide;
echo "Elin ile zeri ele atki qalib gel! Amma Zer Tutma!).Postlarini ehtiyatla istifade etki postun qurtarmasin!<br/>";
echo $fsize2;
}
else if ( $posts < $stavka )
{
echo $fsize1;
echo "Sizin Qoymaq istediyiniz qeder hesabinizda post yoxdur!<br/>";
echo $fsize2;
}
else
{
$pl1 = rand( 1, 6 );
$pl2 = rand( 1, 6 );
$m1 = rand( 1, 6 );
$m2 = rand( 1, 6 );
$spl = $pl1 + $pl2;
$sm = $m1 + $m2;
echo $fsize1;
echo "Cemi Postunuz: <b>".$uposts."</b><br/>";
echo "Oyun Balansi: <b>".$ugposts."</b><br/>";
echo $divide;
echo "Senin Zerlerin: ".$pl1." ve ".$pl2." <br/>";
echo "Masterin Zerleri: ".$m1." ve ".$m2." <br/>";
echo $fsize2;
if ( $sm < $spl )
{
echo $fsize1;
echo $divide;
echo "Siz Qalib Geldiniz!<br/>";
mysql_query( "Update users set posts=posts+'".$stavka."', gposts=gposts+'".$stavka."' where id ='".$id."';" );
$nuposts = $uposts + $stavka;
echo "Hazirki Postun: ".$nuposts." <br/>";
echo $fsize2;
}
if ( $spl < $sm )
{
echo $fsize1;
echo $divide;
echo "Siz Meglub Oldunuz!<br/>";
mysql_query( "Update users set posts=posts-'".$stavka."', gposts=gposts-'".$stavka."' where id ='".$id."'" );
$nuposts = $uposts - $stavka;
echo "Hazirki Postunuz: ".$nuposts." <br/>";
echo $fsize2;
}
if ( $spl == $sm )
{
echo $fsize1;
echo $divide;
echo "Zerler Beraber Oldu!<br/>";
echo $fsize2;
}
echo $fsize1;
echo $divide;
echo "<a href=\"kosti.php?id={$id}&amp;ps={$ps}&amp;mod=start&amp;stavka=$(stav)&amp;ref={$ref}\">Bir Daha Zer At!</a><br/>\n";
echo "<a href=\"kosti.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Postu Deyis</a><br/>\n";
echo $fsize2;
}
break;

}

echo $fsize1;
echo $divide;
if ( $mod )
{
print "<a href=\"kosti.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Zer At</a><br/>";
}
echo "<a href=\"../oyunlar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Kazino Oyunlari</a><br/>";
echo "<a href=\"../enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
?>