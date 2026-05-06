<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if ($row['level'] < 8) {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"xeta\" title=\"Teess&#252;f\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "&#220;zr isteyirik Sizin Bu panele giri&#351; icazeniz yoxdur!<br/>*****<br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);
exit();
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"control\" title=\"Control Panel\">\n";
echo "<p align=\"left\">\n";

switch ($action) {

default:
if (!isset($n)) {
echo $fsize1;
echo "<b>Control Panel:</b><br/>****<br/>\n";
if (8 < $row['level'])echo "&#xbb;<a href=\"control.php?n=1&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Silinen Mesajlar</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=2&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeberdarl&#305;q</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=3&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xaric Edenler</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=4&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Qaytar&#305;lanlar</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=5&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">IP Ban Edenler</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=6&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Browser Ban Edenler</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=7&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Leqeb Ban Edenler</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=8&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bazadan Silenler</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=9&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Tam &#304;qnor Edenler</a><br/>\n";
if (8 < $row['level'])echo "&#xbb;<a href=\"control.php?n=10&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Gizli otaq</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=11&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">M&#252;veqqeti r&#252;tbe</a><br/>\n";
echo "&#xbb;<a href=\"control.php?n=12&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">U&#287;ursuz Qeydiyyat</a><br/>\n";
echo $fsize2;
} else {

if ($row['level'] < 7 && $n == "10") {
echo $fsize1;
echo "Olmaz...<br/>*****<br/>";
echo "<a href=\"control.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Control Panel</a><br/>\n";
echo $fsize2;
break;
}

if ($row['level'] < 8 && $n == "1") {
echo $fsize1;
echo "Olmaz...<br/>*****<br/>";
echo "<a href=\"control.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Control Panel</a><br/>\n";
echo $fsize2;
break;
}

include("./file/fun/0");
if (preg_match( "/[^0-9]+/", $n)) {
echo $fsize1;
echo "Guya indi sen a&#287;&#305;ll&#305;sanda he?:)<br/>";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
exit();
} else {
if ( $l != "" ) {
$control = "control/".$l."";
include( "./file/fun/6" );
$takep = "&amp;l={$l}&amp;ref={$ref}";
} else {
$control = "control";
$takep = "&amp;ref={$ref}";
}

if (!file_exists( "file/{$control}/{$n}.dat" ) || $n == "0") {
echo $fsize1;
echo "Fayl tap&#305;lmad&#305;...<br/>****<br/>\n";
echo "<a href=\"control.php?n={$l}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;
}
if ($fl == "x") {
if ($row['level'] != 9) {
echo $fsize1;
echo "Olmaz...<br/>*****<br/>";
echo "<a href=\"control.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Control Panel</a><br/>\n";
echo $fsize2;
break;
}

if ($l != "") {
if (unlink( "file/{$control}/{$n}.dat")) {
echo $fsize1;
echo "".d_msg."<br/>****<br/>\n";
} else {
echo $fsize1;
echo "Melumatlar silinmir...<br/>****<br/>\n";
}
echo "<a href=\"control.php?n={$l}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;
}

$fp = fopen("file/{$control}/{$n}.dat", "w");
fclose( $fp );
if ( $n == "3" || $n == "4" || $n == "5" || $n == "6" || $n == "7" ) {
function full_del_diri($directory) {
$dir = opendir( $directory );
while ( $file = readdir( $dir ) ) {
if ( is_file( $directory."/".$file ) ) {
unlink( $directory."/".$file );
} else if ( is_dir( $directory."/".$file ) && $file != "." && $file != ".." ) {
full_del_dir( $directory."/".$file );
}}
closedir( $dir );
rmdir( $directory );
}
if (is_dir( "file/{$control}/{$n}")) {
full_del_diri( "file/control/{$n}" );
}
if ( !is_dir( "file/{$control}/{$n}" ) ) {
@mkdir( "file/{$control}/{$n}" );
}}
echo $fsize1;
echo "".d_msg."<br/>****<br/>\n";
echo "<a href=\"control.php?n={$n}&amp;m={$m}&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;
}

if ( isset( $fl ) ) {
if ( $row['level'] != 9 ) {
echo $fsize1;
echo "Olmaz...<br/>*****<br/>";
echo "<a href=\"control.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Control Panel</a><br/>\n";
echo $fsize2;
break;
}

$file = file( "file/{$control}/{$n}.dat" );
$fp = fopen( "file/{$control}/{$n}.dat", "w" );
flock( $fp, LOCK_EX );
$i = 0;
while ($i < sizeof($file)) {
if ($i == $fl) {
$silinen = "{$file[$i]}";
unset($file[$i]);
}
++$i;
}

fputs( $fp, implode( "", $file ) );
flock( $fp, LOCK_UN );
fclose( $fp );
if ( file_exists( "file/{$control}/{$n}/{$z}.dat" ) ) {
unlink( "file/{$control}/{$n}/{$z}.dat" );
}

echo $fsize1;
echo "<b>Silindi</b>!<br/>****<br/>";
echo "<a href=\"control.php?n={$n}&amp;m={$m}&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;
}

echo $fsize1;
echo "<b>".s_msg.":</b>\n";
if ($row['level'] == 9) {
echo "<a href=\"control.php?n={$n}&amp;fl=x&amp;id={$id}&amp;ps={$ps}{$takep}\">xXx</a><br/>****<br/>\n";
} else {
echo "<br/>****<br/>";
}

$file = file("file/{$control}/{$n}.dat");
$total = count($file);
$m = (integer)$_GET['m'];
if ($m < 0 || $total < $m )$m = 0;
if ($total < $m + 10) {
$end = $total;
} else {
$end = $m + 10;
}
$i = $m;
while ($i < $end) {
$file = file( "file/{$control}/{$n}.dat" );
$file = array_reverse( $file );
if ($l == "") {
$i2 = round( $i + 1 );
}
$num = $total - $i - 1;
$ras = explode("ID=<u>", base64_decode($file[$i]));
$exscent = $ras[1];
$ras = explode("</u>", $exscent);
$exscent = $ras[0];
echo $i2." ".base64_decode($file[$i])."";
if ($l == "" && $row['level'] == 9) {
echo "[<a href=\"control.php?n={$n}&amp;m={$m}&amp;id={$id}&amp;ps={$ps}&amp;z=9{$exscent}&amp;fl={$num}{$takep}\">x</a>]";
}
if ( file_exists( "file/{$control}/".$n."/9".$exscent.".dat" ) ) {
echo " -<b><a href=\"control.php?n=9".$exscent."&amp;m=0&amp;id={$id}&amp;ps={$ps}&amp;l={$n}{$takep}\">&#xbb;&#xbb;</a></b>";
}
echo "<br/>";
++$i;
}
if ( $total < 1 ) {
echo "<u>".n_msg.".</u><br/>";
}
if ( $m != 0 ) {
echo ( "<a href=\"control.php?m=".($m - 10))."&amp;n={$n}&amp;id={$id}&amp;ps={$ps}{$takep}\">&lt;&lt;&lt;- </a> ";
}
if ( $m + 10 < $total && $m != 0 )
{
echo "|";
}
if ( $m + 10 < $total ) {
echo ( " <a href=\"control.php?m=".($m + 10))."&amp;n={$n}&amp;id={$id}&amp;ps={$ps}{$takep}\"> -&gt;&gt;&gt;</a>";
}
if ( $m + 10 < $total || $m != 0 ) {
echo "<br/>\n";
}
if ( $l != "" ) {
echo "<a href=\"control.php?n={$l}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
echo $fsize2;
}}

}

echo $fsize1;
echo "****<br/>\n";
if (isset($n))echo "<a href=\"control.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Control Panel</a><br/>\n";
if ( 6 < $row['level'] ) {
$pnam = "Admin";
} else if ( 5 < $row['level'] ) {
$pnam = "Moder";
} else {
$pnam = "VIP";
}
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">{$pnam} Panel</a>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close( $link );
?>
