<?php

$engDay = date("l"); 
$indikivaxt = date("Hi"); 
$bu_ay_nece_gundu = date("t"); 
$bu_ay_aaa = date("m"); 

//BUGUN POSTU SIFIRLA 
if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT * FROM `users`;"); 
while($savalan = mysql_fetch_array($maximum)) 
{ 
$kime = $savalan['id']; 
mysql_query("UPDATE `users` SET `bugunpost` = '0' WHERE `id` = '".$kime."';"); 
} 
} 
//BUGUN POSTU SIFIRLA SON 

//NE DUSUNURSEN
if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT * FROM `users`;"); 
while($savalan = mysql_fetch_array($maximum)) 
{ 
$kime = $savalan['id']; 
mysql_query("UPDATE `users` SET `stsonline` = '' WHERE `id` = '".$kime."';"); 
} 
} 
//NE DUSUNURSEN SIFIRLA SON 


//BUGUN SIFIRLA 
if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT * FROM `users`;"); 
while($savalan = mysql_fetch_array($maximum)) 
{ 
$kime = $savalan['id']; 
mysql_query("UPDATE `users` SET `time_active` = '0' WHERE `id` = '".$kime."';"); 
} 
} 
//BUGUN SIFIRLA SON 

if ($engDay == "Sunday") { 

if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT * FROM `users`;"); 
while($savalan = mysql_fetch_array($maximum)) 
{ 
$kime = $savalan['id']; 
mysql_query("UPDATE `users` SET `time_active1` = '0' WHERE `id` = '".$kime."';"); 
} 
} 
} 

if ($bu_ay_nece_gundu == $bu_ay_aaa) { 

// Odul 
if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT `id`,`bal` FROM `users` WHERE `time_active2` > '0' ORDER BY `time_active2` DESC;"); 

$n_yer = 0; 

while($savalan = mysql_fetch_array($maximum)) 
{ 
$n_yer++; 
$kime = $savalan['id']; 
$bal_balansi = $savalan['id']; 

if ($n_yer == 1) { 
$odul = $bal_balansi + 150; 
mysql_query("UPDATE `users` SET `bal` = '".$odul."' WHERE `id` = '".$kime."';"); 
} else if ($n_yer == 2) { 
$odul = $bal_balansi + 100; 
mysql_query("UPDATE `users` SET `bal` = '".$odul."' WHERE `id` = '".$kime."';"); 
} else if ($n_yer == 3) { 
$odul = $bal_balansi + 50; 
mysql_query("UPDATE `users` SET `bal` = '".$odul."' WHERE `id` = '".$kime."';"); 
} 

} 
} 
// Odul Son 

// Ayliq yenileme 

if($indikivaxt>=2358 && $indikivaxt<=2359) 
{ 
$maximum = mysql_query("SELECT * FROM `chat_users`;"); 
while($savalan = mysql_fetch_array($maximum)) 
{ 
$kime = $savalan['id']; 
mysql_query("UPDATE `users` SET `time_active2` = '0' WHERE `id` = '".$kime."';"); 
} 
} 
// Ayliq yenileme Son 

} 

$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."' AND `pass` = '".$ps."';"); 
$user = mysql_fetch_array($q); 
$time_active2 = $user['time_active2']; 
$time_active = $user['time_active']; 
$time_active1 = $user['time_active1']; 
$maximumstime = $user['aktivtime']; 

$qaliq = time() - $maximumstime; 
$dq = '300'; 
if ($qaliq >= $dq) { 
$update = mysql_query("UPDATE `users` SET `aktivtime` = '".time()."' WHERE `id` = '".$id."';"); 
} else { 
$vaxt = time() - $maximumstime; 
$time_active2 = $time_active2 + $vaxt; 
$time_active = $time_active + $vaxt; 
$time_active1 = $time_active1 + $vaxt; 
$update = mysql_query("UPDATE `users` SET `aktivtime` = '".time()."', `time_active2` = '".$time_active2."', `time_active` = '".$time_active."', `time_active1` = '".$time_active1."' WHERE `id` = '".$id."';"); 
} $usr = $row["user"];
$bal_id ="19";
//////////////////////////////////// Avtomatik Bal verilmesi.
if($row["bugunpost"]==100){
$balsyst = @mysql_query ("Select user from users where id='".$bal_id."' LIMIT 1;");
$rrr = @mysql_fetch_array ($balsyst);
$adm = $rrr["user"];
$balselect = @mysql_query ("Select user from users where bal=2");
$bals = @mysql_fetch_array($balselect);
$usname = $bals["user"];
$balo ="2";
$bu = $row["bugunpost"];
$bal = $row["bal"];
$bup ="1";

$ypost = $bu+$bup;
$newbal = $bal+$balo;
mysql_query ("UPDATE users SET bal = '".$newbal."', bugunpost = '".$ypost."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Tebrik edirik!<b>".$usr."</b>!!! Siz &#231;atda g&#252;n erzinde toplad&#305;&#287;&#305;n&#305;z <b>100 posta</b> g&#246;re  <b>".$adm."</b> terefinden size <b>".$balo."</b> bal hediyye edildi.Sizin hesab&#305;n&#305;z <b>".$newbal."</b> bal te&#351;kil edir.";
mysql_query("insert into zapiski values(0,'".$adm."','".$bal_id."','".$message."','".$usr."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}
if($row["bugunpost"]==200){
$balsyst = @mysql_query ("Select user from users where id='".$bal_id."' LIMIT 1;");
$rrr = @mysql_fetch_array ($balsyst);
$adm = $rrr["user"];
$balselect = @mysql_query ("Select user from users where bal=5");
$bals = @mysql_fetch_array($balselect);
$usname = $bals["user"];
$balo ="5";
$bu = $row["bugunpost"];
$bal = $row["bal"];
$bup ="1";
$ypost = $bu+$bup;
$newbal = $bal+$balo;

mysql_query ("UPDATE users SET bal = '".$newbal."', bugunpost = '".$ypost."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Tebrik edirik!<b>".$usr."</b>!!! Siz &#231;atda g&#252;n erzinde toplad&#305;&#287;&#305;n&#305;z <b>200 posta</b> g&#246;re  <b>".$adm."</b> terefinden size <b>".$balo."</b> bal hediyye edildi.Sizin hesab&#305;n&#305;z <b>".$newbal."</b> bal te&#351;kil edir.";
mysql_query("insert into zapiski values(0,'".$adm."','".$bal_id."','".$message."','".$usr."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}
if($row["bugunpost"]==300){
$balsyst = @mysql_query ("Select user from users where id='".$bal_id."' LIMIT 1;");
$rrr = @mysql_fetch_array ($balsyst);
$adm = $rrr["user"];
$balselect = @mysql_query ("Select user from users where bal=10");
$bals = @mysql_fetch_array($balselect);
$usname = $bals["user"];
$bu = $row["bugunpost"];
$bal = $row["bal"];
$balo ="10";
$bup ="1";
$ypost = $bu+$bup;
$newbal = $bal+$balo;

mysql_query ("UPDATE users SET bal = '".$newbal."', bugunpost = '".$ypost."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Tebrik edirik!<b>".$usr."</b>!!! Siz &#231;atda g&#252;n erzinde toplad&#305;&#287;&#305;n&#305;z <b>300 posta</b> g&#246;re  <b>".$adm."</b> terefinden size <b>".$balo."</b> bal hediyye edildi.Sizin hesab&#305;n&#305;z <b>".$newbal."</b> bal te&#351;kil edir.";
mysql_query("insert into zapiski values(0,'".$adm."','".$bal_id."','".$message."','".$usr."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}
////////////////////////////////////
?>
