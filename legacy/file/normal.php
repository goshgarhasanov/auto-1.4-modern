<?php


$contsay = count( explode( "/", $_SERVER['REQUEST_URI'] ) ) - 2;
$httphost = explode( "/", $_SERVER['REQUEST_URI'] );
$ffoto = base64_decode( trim( $httphost[$contsay - 1] ) );
$fsiz = trim( $httphost[$contsay] );
$filetest = "../{$ffoto}";
$img = "http://".$_SERVER['HTTP_HOST']."/{$ffoto}";
if ( !file_exists( "{$filetest}" ) )
{
$img = ImageCreateFromjpeg( "http://berdemiz.com/chat/img/no_img.jpeg" );
if ( $img )
{
header( "Content-Type: image/jpeg" );
Imagejpeg( $img );
ImageDestroy( $img );
}
exit( );
}
header( "Content-type: image/jpeg" );
$par = getimagesize( "".$img."" );
if ( $fsiz <= 5 )
{
$fsiz = 50;
}
if ( 250 <= $fsiz )
{
$fsiz = 250;
}
$par0 = trim( $par[0] );
$par1 = trim( $par[1] );
$artiq = $par0 - $par1;
$artiq = $artiq / $par1;
$artiq = $artiq * $fsiz;
$x1 = $par0 * $fsiz;
$boy = $x1 / $par0;
$x2 = $par1 * $fsiz;
$uzun = $x2 / $par1;
$uzun = $uzun + $artiq;
$boy = $boy;
$test2 = $uzun + $boy;
$test1 = $fsiz + $fsiz;
if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
else if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
else if ( $test1 < $test2 )
{
$uzun = $uzun / 1.1;
$boy = $boy / 1.1;
$test2 = $uzun + $boy;
}
$boy = $boy;
$uzun = $uzun;
if ( $par[2] == "1" )
{
if ( substr( $img, 0, 1 ) != "." )
{
$old = imageCreateFromGif( "{$img}" );
$w = imageSX( $old );
$h = imageSY( $old );
$new = imageCreateTrueColor( $uzun, $boy );
imageCopyResized( $new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h );
imageJpeg( $new, "", "70" );
}
}
else if ( $par[2] == "2" )
{
if ( substr( $img, 0, 1 ) != "." )
{
$old = imageCreateFromjpeg( "{$img}" );
$w = imageSX( $old );
$h = imageSY( $old );
$new = imageCreateTrueColor( $uzun, $boy );
imageCopyResized( $new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h );
imageJpeg( $new, "", "70" );
}
}
else if ( $par[2] == "3" )
{
if ( substr( $img, 0, 1 ) != "." )
{
$old = imagecreatefrompng( "{$img}" );
$w = imageSX( $old );
$h = imageSY( $old );
$new = imageCreateTrueColor( $uzun, $boy );
imageCopyResized( $new, $old, 0, 0, 0, 0, $uzun, $boy, $w, $h );
imageJpeg( $new, "", "70" );
}
}
else
{
$img = ImageCreateFromjpeg( "http://berdemiz.com/chat/img/no_img.jpeg" );
if ( $img )
{
header( "Content-Type: image/jpeg" );
Imagejpeg( $img );
ImageDestroy( $img );
}
}
?>