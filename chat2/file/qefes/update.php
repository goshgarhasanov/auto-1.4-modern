<?php
$menim = $bal - $send;
$gobal = "Update `users` set `bal` = '".$menim."' where `id` ='".$id."';";
mysql_query( $gobal );
$sens = $send + $sses;
$qebul = "Update `qefes` set `ses` = '".$sens."' where `uid` = '".$suid."'";
mysql_query( $qebul );
$ishtirak = mysql_query( "select `ses` from `qefess` where `kim` = '".$id."' and `kime` = '".$suid."';" );
if ( mysql_affected_rows( ) == 0 )
{
    mysql_query( "Insert into `qefess` set `kim`='".$id."', `kime`='".$suid."', `ses`='".$send."';" );
}
else
{
    $cc = mysql_fetch_array( $ishtirak );
    $myses = $cc['ses'];
    $sens = $myses + $send;
    $qebul1 = "Update `qefess` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$suid."' where `kim` = '".$id."' and `kime` = '".$suid."'";
    mysql_query( $qebul1 );
}
?>
