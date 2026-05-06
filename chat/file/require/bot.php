<?php


$us = $row[user];



function bot_error($message){
$resu = @mysql_query ("Select * from bot_message_error order by rand() desc limit 500;");
if (mysql_affected_rows() != 0) {
while ($raa = mysql_fetch_array($resu))
{
if(ereg(''.$raa[soz].'',strtolower($message)))
	{
          $bot_text = $raa['mesaj'];
          }
          }
return $bot_text;
}
}
$sql_error = @mysql_query ("Select `id`,`userid`,`user` from `bot_user_error` where `userid`='".$usid."';");
if (mysql_affected_rows() != 0){
$my_error = mysql_fetch_array ($sql_error);
$_id = $my_error['userid'];
$_user = $my_error['user'];
if($_id == $usid){
if(!empty($message)){
$_error = "".bot_error($message)."";
$saat = date("H:i",mktime(date ("H")+$xsat));
$spam_isi_time = 2+$SERVER_TIME;
$spam_isi_timex = 6+$SERVER_TIME;

if($_error){
mysql_query("insert into `mesaj1` set  `who`='$_user', `idwho`='$_id', `message`='$_error', `towhom`='$row[user]', `idtowhom`='$id', `time`='".$spam_isi_time."', `date` = '".$saat."', `reng` = '".$spam_isi_timex."';");
}else{
mysql_query("insert into `mesaj1` set  `who`='$_user', `idwho`='$_id', `message`='(((((((', `towhom`='$row[user]', `idtowhom`='$id', `time`='".$spam_isi_time."', `date` = '".$saat."', `reng` = '".$spam_isi_timex."';");
}

}
}
}

?>