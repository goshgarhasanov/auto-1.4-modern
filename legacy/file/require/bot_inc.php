<?php


//////////////////////////////



$total_pen = mysql_fetch_array(mysql_query("SELECT COUNT(klu4) FROM mesaj1 where idtowhom = $id;"));
$total = trim($total_pen["0"]);

$next_id = next_id($total,"1");
$i = $next_id[start];






$r = MYSQL_QUERY("SELECT * FROM mesaj1 WHERE `idtowhom` = '$id' ORDER BY klu4 DESC LIMIT $next_id[start],$next_id[max_page];");

while($ma=mysql_fetch_assoc($r)){
$_user = $ma['who'];
$_id = $ma['idwho'];
$_error = $ma['message'];
$id = $ma['idtowhom'];
$spam_isi_time = $ma['time'];
$date = $ma['date'];
$spam_time = $ma['reng'];

$oxtime = $ma['time'];
$SERVER_TIME = TIME();

if($oxtime<$SERVER_TIME)
{
mysql_query ("Update `mesaj` set `readd` = '1', `insend` = '0' WHERE (`idtowhom` = '".$_id."' and `idwho` ='".$id."');");
}





if($spam_time<$SERVER_TIME)
{
mysql_query("insert into `mesaj` set  `who`='$_user', `idwho`='$_id', `message`='$_error', `towhom`='$row[user]', `idtowhom`='$id', `time`='".$spam_isi_time."+6', `date` = '".$saat."';");



mysql_query("DELETE FROM mesaj1 WHERE idtowhom=' ".$id."'");



mysql_query ("Update `mesaj` set `readd` = '1', `insend` = '0' WHERE (`idtowhom` = '".$_id."' and `idwho` ='".$id."');");
mysql_query("UPDATE `users` SET `time` = '".$SERVER_TIME."', `time_active`=`time_active`+'".($SERVER_TIME-$row['ontime'])."' WHERE `id` = '".$_id."';");
$row['action'] = action_up($row['action'] + '0.02');
mysql_query ("Update `users` set `posts`='1'+`posts`, `nnposts`='1'+`nnposts`, `action`='".$row['action']."' where `id` ='".$_id."'");
mysql_query ("Update `users` set `msn`='1'+`msn` where `id` ='".$id."';");


}
}
?>