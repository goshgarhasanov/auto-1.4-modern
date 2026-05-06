<?php
$online = time( ) + $vaxt;
$rnd = rand( 0, 9 );
mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '11';" );
$fpa = fopen( "file/qefes/1.dat", "w" );
$xeber .= "{$gun}\n";
$xeber .= "{$mesaj}\n";
$xeber .= "{$msgtime}";
fputs( $fpa, $xeber );
fclose( $fpa );
if ( !file_exists( "file/qefes/0_aktiv.dat" ) )
{
    @rename( "file/qefes/0_deaktiv.dat", "file/qefes/0_aktiv.dat" );
}
$newdat = fopen( "file/qefes/0_aktiv.dat", "w" );
$news .= "{$gun}\n";
$news .= "{$mesaj}";
fputs( $newdat, $news );
fclose( $newdat );
$file = "x\n".$colseds[1]."".$colseds[2]."".$colseds[3]."".$colseds[4]."".$colseds[3]."";
$fp = fopen( "file/qefes/qefes.dat", "w" );
fputs( $fp, $file );
fclose( $fp );
$r = @mysql_query( "SELECT `uid`,`ses` FROM `qefes` WHERE `ses` != '0';" );
while ( $a = mysql_fetch_array( $r ) )
{
    $u_id = $a['uid'];
    $u_ses = $a['ses'];
    mysql_query( "UPDATE `qefes` SET `nses` = `nses`+'".$u_ses."' WHERE `uid` = '".$u_id."';" );
}
?>
