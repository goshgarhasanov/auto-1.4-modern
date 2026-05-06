<?php
$qalib = mysql_query( "select `user`,`uid` from `qefes` where `off` ='0' order by `ses` asc limit 1" );
$qali = mysql_fetch_array( $qalib );
$u_user = $qali['user'];
$u_id = $qali['uid'];
$dats = date( "d.m.y" );
mysql_query( "UPDATE `users` SET `con` = '5' WHERE `id` = '".$u_id."';" );
mysql_query( "UPDATE `qefes` SET `off` = '1', `date` = '".$dats."' WHERE `uid` = '".$u_id."';" );
$qalib = mysql_query( "select `user`,`uid` from `qefes` where `off` ='0' order by `ses` desc limit 1" );
$qali = mysql_fetch_array( $qalib );
$u1_user = $qali['user'];
$u1_id = $qali['uid'];
$hediyye = trim( $colseds[3] );
$mesaj = "Virtual Qefesin Qalibi <b>{$u1_user}</b> oldu ve <b>{$hediyye}</b> qazand&#305;!<br/>";
$msgtime = time( ) + 86400;
$mes = "Virtual Qefesin Qalibi <b>{$u1_user}</b> oldu ve <b>{$hediyye}</b> qazand&#305;! <img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/><img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/><img src=\"file/qefes/img/uraa.gif\" alt=\".uraa.\"/>";
$i = 0;
while ( $i <= 9 )
{
    $st = time( );
    $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
    $rnd = rand( 0, 99999999 );
    mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Qefes', message='".$mes."', id='".$st."', towhom='', hid='0', usid='11'" );
    ++$i;
}
?>
