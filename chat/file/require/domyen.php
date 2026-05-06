<?php
if($oyuncu == 2 and $SERVER_TIME > $vaxt and $gedis == 0 and $round == 0 and $sonbagli == 0){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}if($oyuncu == 3 and $SERVER_TIME > $vaxt and $gedis == 0 and $round == 0 and $sonbagli == 0){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}if($oyuncu == 4 and $SERVER_TIME > $vaxt and $gedis == 0 and $round == 0 and $sonbagli == 0){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun&#231;ular tamamlanmad&#305;&#287;&#305; &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}


if($kimcixdi != ""){
if($oyuncu == 2 and $sonbagli == 0){
$xal = $pointuddu;
if($kimcixdi == "a"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == "b"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}


if($oyuncu == 3 and $sonbagli == 0){
$xal = $pointuddu / 2;
if($kimcixdi == "a"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == "b"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == "c"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$cnik Oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}


if($oyuncu == 4 and $sonbagli == 0){
$xal = $pointuddu / 2;
if($kimcixdi == "c" or $kimcixdi == "d"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'C Qrupu oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == "a" or $kimcixdi == "b"){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$d';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'A Qrupu oyunu terk etdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}
}

$rxyy = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' and `dgedis` = '1' ORDER BY gedistarix ASC;");
$maaded=mysql_fetch_assoc($rxyy);
$dominod = $maaded['id'];
$dgedistarixim = $maaded['dgedistarix'];
$dgedistariximen = $maaded['id'];

if($oyuncu == 2 and $SERVER_TIME > $dgedistarixim and $gedis > 0){
$qatmira = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$a';");
$qatmiraa = @mysql_result($qatmira, 0);
$qatmirb = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$b';");
$qatmirbb = @mysql_result($qatmirb, 0);


if($round == 0 and $gedis > 0 ){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}
}


if($round == 1){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}
}
}


if($oyuncu == 3 and $SERVER_TIME > $dgedistarixim and $gedis > 0){
$qatmira = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$a';");
$qatmiraa = @mysql_result($qatmira, 0);
$qatmirb = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$b';");
$qatmirbb = @mysql_result($qatmirb, 0);
$qatmirc = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$c';");
$qatmircc = @mysql_result($qatmirc, 0);

if($round == 0 and $gedis > 0 ){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmircc == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'c',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}
}

if($round == 1){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($qatmircc == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'c',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}
}
}

if($oyuncu == 4 and $SERVER_TIME > $dgedistarixim and $gedis > 0){
$qatmira = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$a';");
$qatmiraa = @mysql_result($qatmira, 0);
$qatmirb = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$b';");
$qatmirbb = @mysql_result($qatmirb, 0);
$qatmirc = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$c';");
$qatmircc = @mysql_result($qatmirc, 0);
$qatmird = @mysql_query("SELECT `id` FROM `users_dom` WHERE `dominoqat` = '1' and `id` = '$d';");
$qatmirdd = @mysql_result($qatmird, 0);

if($round == 0 and $gedis > 0 ){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmircc == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmirdd == $d){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'c',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $d){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'd',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}}

if($round == 1){
if($qatmiraa == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmirbb == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmircc == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}else
if($qatmirdd == $d){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $a){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'a',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $b){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'b',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $c){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'c',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}elseif($dgedistariximen == $d){
mysql_query( "UPDATE `domino_bazari` SET `kimcixdi` = 'd',`taymbagla` = '0'  WHERE `id` = '$oyun';" );
}}
}


if($dgedistarixim != 0){
if($oyuncu == 2 and $SERVER_TIME > $dgedistarixim and $gedis > 0 and $sonbagli == 0 and $kimcixdi != ""){

$xal = $pointuddu;
if($kimcixdi == $a){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == $b){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}

if($oyuncu == 3 and $SERVER_TIME > $dgedistarixim and $gedis > 0 and $sonbagli == 0 and $kimcixdi != ""){
$xal = $pointuddu / 2;
if($kimcixdi == $a){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == $b){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == $c){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$cnik gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}


if($oyuncu == 4 and $SERVER_TIME > $dgedistarixim and $gedis > 0 and $sonbagli == 0 and $kimcixdi != ""){
$xal = $pointuddu / 2;
if($kimcixdi == $c or $kimcixdi == $d){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'C Qrupu gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
if($kimcixdi == $a or $kimcixdi == $b){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$d';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'A Qrupu gedi&#351; etmediyi &#252;&#231;&#252;n oyun bitdi. Oyunu terk edin...', `usid` = '0' ;" );
}
}
}


if($oyuncu == 2 and $sonbagli == 0){
$xallarima = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$a';");
$xallarimaa = @mysql_result($xallarima, 0);
$xallarimb = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$b';");
$xallarimbb = @mysql_result($xallarimb, 0);

$xal = $pointuddu;

if($xallarimaa > 100){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Qalib geldi. Tebrikler...', `usid` = '0' ;" );

}elseif($xallarimbb > 100){
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Qalib geldi. Tebrikler...', `usid` = '0' ;" );

mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
}
}
////////////////end 2 oyuncu



//////////////////start 3 oyuncu
if($oyuncu == 3 and $sonbagli == 0){
$xallarima = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$a';");
$xallarimaa = @mysql_result($xallarima, 0);
$xallarimb = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$b';");
$xallarimbb = @mysql_result($xallarimb, 0);
$xallarimc = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$c';");
$xallarimcc = @mysql_result($xallarimc, 0);

$xal = $pointuddu;

if($xallarimaa > 100){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Qalib geldi. Tebrikler...', `usid` = '0' ;" );

}elseif($xallarimbb > 100){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET`dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Qalib geldi. Tebrikler...', `usid` = '0' ;" );

}elseif($xallarimcc > 100){
mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$cnik Qalib geldi. Tebrikler...', `usid` = '0' ;" );
}
}
////////////////end 3 oyuncu



//////////////////start 4 oyuncu
if($oyuncu == 4 and $sonbagli == 0){
$xallarima = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$a';");
$xallarimaa = @mysql_result($xallarima, 0);
$xallarimb = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$b';");
$xallarimbb = @mysql_result($xallarimb, 0);
$xallarimc = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$c';");
$xallarimcc = @mysql_result($xallarimc, 0);
$xallarimd = @mysql_query("SELECT `dominoxal` FROM `users_dom` WHERE `id` = '$d';");
$xallarimdd = @mysql_result($xallarimd, 0);
$xal = $pointuddu/2;

if($xallarimaa > 100 or $xallarimbb > 100){
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'A Qrupu qalib geldi. Tebrikler...', `usid` = '0' ;" );

mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$b';" );
}elseif($xallarimcc > 100 or $xallarimdd > 100){
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'C Qrupu qalib geldi. Tebrikler...', `usid` = '0' ;" );

mysql_query( "UPDATE `domino_bazari` SET `sonbagli` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$c';" );
mysql_query( "UPDATE `users` SET `dominoreytinq`='$xal'+`dominoreytinq` WHERE `id` = '$d';" );
}
}


$varidi = 0;
$yoxudu = 0;
if($qalan < 3){
$degerimaxd = explode(",",$dadad);
$mended = 0;
while($mended < $dadadd){
$beraber = $yerde-1;
$degerimaxxx = explode(".",$oyna);
$degerimaxxxe = explode(",",$oyna);
if($degerimaxd[$mended][0] == $degerimaxxx[0] or $degerimaxd[$mended][2] == $degerimaxxx[0] or $degerimaxd[$mended][0] == $degerimaxxxe[$beraber][2] or $degerimaxd[$mended][2] == $degerimaxxxe[$beraber][2]){
$varidi = 1;
}else{
$yoxudu = 1;
}
$mended++;
}

$rxdey = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' ORDER BY gedistarix ASC;");
$maadey=mysql_fetch_assoc($rxdey);
$dominoet = $maadey['id'];



if($oyuncu == 2){
$kohnepasa = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$a';");
$kohnepasaa = @mysql_result($kohnepasa, 0);
$kohnepasb = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$b';");
$kohnepasbb = @mysql_result($kohnepasb, 0);
//// kohne paslar



//////////////start
if($kohnepasaa != 0 and $kohnepasbb != 0 and $yenilendi == 0 and $sonbagli == 0){
mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
$rxdem = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' ORDER BY gedistarix ASC;");
$maaden=mysql_fetch_assoc($rxdem);
$dominom = $maaden['id'];
$gedistarix = $maaden['gedistarix'];

$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);

mysql_query( "UPDATE `domino_bazari` SET `taym` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );

$sayilar=array("$akoma","$bkomb");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);

if($bkomb == $enbuyuk and $akoma == $enkucuk and $baglidi == 0){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; $anik nickinde idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
}elseif($akoma == $enbuyuk and $bkomb == $enkucuk and $baglidi == 0){

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; $bnik nickinde idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );

mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
}
///// mesaj yerine burdan yazirdiki $domino id nomresi oyunu bagladi..
}
}
/////////// end 2 oyuncu baglanir oyun


if($oyuncu == 3){
$kohnepasa = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$a';");
$kohnepasaa = @mysql_result($kohnepasa, 0);
$kohnepasb = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$b';");
$kohnepasbb = @mysql_result($kohnepasb, 0);
$kohnepasc = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$c';");
$kohnepascc = @mysql_result($kohnepasc, 0);

if($kohnepasaa != 0 and $kohnepasbb != 0 and $kohnepascc != 0 and $yenilendi == 0 and $sonbagli == 0){
mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
$rxdem = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' ORDER BY gedistarix ASC;");
$maaden=mysql_fetch_assoc($rxdem);
$dominom = $maaden['id'];
$gedistarix = $maaden['gedistarix'];

$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);
$ckom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$ckomc = @mysql_result($ckom, 0);

mysql_query( "UPDATE `domino_bazari` SET `taym` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );

$sayilar=array("$akoma","$bkomb","$ckomc");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);

if($akoma == $enkucuk and $baglidi == 0){

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; $anik nickinde idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );

if($bkomb == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$c';" );
}
if($ckomc == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
}
}elseif($bkomb == $enkucuk and $baglidi == 0){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);


$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; $bnik nickinde idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );

if($akoma == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$c';" );
}
if($ckomc == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
}
}elseif($ckomc == $enkucuk and $baglidi == 0){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);


$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; $cnik nickinde idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$c';" );

if($akoma == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
}
if($bkomb == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '3',`dgedis` = '0' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
}
}
}}
/////////////end 3



/////////start 4
if($oyuncu == 4){
$kohnepasa = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$a';");
$kohnepasaa = @mysql_result($kohnepasa, 0);
$kohnepasb = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$b';");
$kohnepasbb = @mysql_result($kohnepasb, 0);
$kohnepasc = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$c';");
$kohnepascc = @mysql_result($kohnepasc, 0);
$kohnepasd = @mysql_query("SELECT `kohnepas` FROM `users_dom` WHERE `id` = '$d';");
$kohnepasdd = @mysql_result($kohnepasd, 0);

if($kohnepasaa != 0 and $kohnepasbb != 0 and $kohnepascc != 0 and $kohnepasdd != 0 and $yenilendi == 0 and $sonbagli == 0){

mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
$rxdem = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' ORDER BY gedistarix ASC;");
$maaden=mysql_fetch_assoc($rxdem);
$dominom = $maaden['id'];
$gedistarix = $maaden['gedistarix'];

$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);
$ckom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$ckomc = @mysql_result($ckom, 0);
$dkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$d';");
$dkomd = @mysql_result($dkom, 0);

mysql_query( "UPDATE `domino_bazari` SET `taym` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1',`baglidi` = '1' WHERE `id` = '$oyun';" );

$cema = $akoma + $bkomb;
$cemc = $ckomc + $dkomd;

$sayilar=array("$cema","$cemc");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);


if($baglidi == 0){
if($cema == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);


$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$d';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$d';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; A Qrupunda idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );
if($akoma == $enkucuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3' WHERE `id` = '$b';" );
}
if($bkomb == $enkucuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3' WHERE `id` = '$a';" );
}

if($ckomc == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$d';" );
}
if($dkomd == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
}
}elseif($cemc == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);


$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'Oyun ba&#287;l&#305;d&#305;. En az da&#351; C Qrupunda idi ve Qalib geldi $cemi Xal qazand&#305;... ', `usid` = '0' ;" );

if($ckomc == $enkucuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3' WHERE `id` = '$d';" );
}
if($dkomd == $enkucuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3' WHERE `id` = '$c';" );
}

if($bkomb == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
}
if($akoma == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
}
}
}
}
}
////end 4



if($varidi != 1 and $yoxudu = 1 and $dominoet == $id and $gedis != 1 and $baglidi == 0 and $dgedisda == 1 and $sonbagli == 0 and $yenilendi == 0 and $qalan < 3){

mysql_query( "UPDATE `users_dom` SET `kohnepas` = '1',`gedistarix` = '".$SERVER_TIME."' WHERE `id` = '$id';" );

$rxdem = @MYSQL_QUERY("SELECT * FROM users_dom WHERE  `domino` = '$oyun' ORDER BY gedistarix ASC;");
$maaden=mysql_fetch_assoc($rxdem);
$dominom = $maaden['id'];
$gedistarix = $maaden['gedistarix'];
$gedistarixq = $row1['gedistarix'];

$hamd = $SERVER_TIME + 120;

mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '".$hamd."' WHERE `id` = '$dominom';" );
mysql_query( "UPDATE `users_dom` SET `dgedis` = '0',`pas` = '0' WHERE `id` = '$id';" );



$kimdia = @mysql_query("SELECT `user` FROM `users_dom` WHERE `id` = '$id';");
$kimdi = @mysql_result($kimdia, 0);
if($oyuncu == 2){
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$c';" );
}
if($oyuncu == 4){
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `oyunmesaji` = '<b>$kimdi</b> Pas Kecdi - ' WHERE `id` = '$d';" );
}
}
}


if($_GET["mod"]!="qatisdir")
{

}
$_v->divide();
$a = $maa['a'];
$b = $maa['b'];
$c = $maa['c'];
$d = $maa['d'];
$taymbagla = $maa['taymbagla'];


$dasbitdia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dasbitdiaa = @mysql_result($dasbitdia, 0);
$dasbitdib = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dasbitdibb = @mysql_result($dasbitdib, 0);
$dasbitdic = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dasbitdicc = @mysql_result($dasbitdic, 0);
$dasbitdid = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$d';");
$dasbitdidd = @mysql_result($dasbitdid, 0);



if($oyuncu == 2 and $yerde != 0 and $taymbagla == 0 and $kimcixdi == ""){
if($dasbitdiaa < 1 or $dasbitdibb < 1){
mysql_query( "UPDATE `domino_bazari` SET `taymbagla` = '1' WHERE `id` = '$oyid';" );
$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);
if($akoma < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($bkomb < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}

$sayilar=array("$akoma","$bkomb");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);


if($akoma == $enbuyuk and $bkomb == $enkucuk and $yenilendi == 0){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}
mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );

mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Qalib geldi. $cemi Xal elave olundu...', `usid` = '0' ;" );

}

if($bkomb == $enbuyuk and $akoma == $enkucuk and $yenilendi == 0){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );

mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );

mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Qalib geldi. $cemi Xal elave olundu..', `usid` = '0' ;" );
}
}
}



if($oyuncu == 3 and $yerde != 0 and $taymbagla == 0 and $kimcixdi == ""){
if($dasbitdiaa < 1 or $dasbitdibb < 1 or $dasbitdicc < 1){
if($yenilendi == 0){
mysql_query( "UPDATE `domino_bazari` SET `taymbagla` = '1' WHERE `id` = '$oyid';" );
$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);
$ckom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$ckomc = @mysql_result($ckom, 0);

if($akoma < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($bkomb < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($ckomc < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}

$sayilar=array("$akoma","$bkomb","$ckomc");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);


if($akoma == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}



mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$anik Qalib geldi. $cemi Xal elave olundu...', `usid` = '0' ;" );
}elseif($bkomb == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}



mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$bnik Qalib geldi. $cemi Xal elave Olundu...', `usid` = '0' ;" );
}elseif($ckomc == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}

$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);

$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}



mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$c';" );
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = '$cnik Qalib geldi. $cemi Xal elave olundu...', `usid` = '0' ;" );
}
}
}
}


if($oyuncu == 4 and $yerde != 0 and $taymbagla == 0 and $kimcixdi == ""){
if($dasbitdiaa < 1 or $dasbitdibb < 1 or $dasbitdicc < 1 or $dasbitdidd < 1){
mysql_query( "UPDATE `domino_bazari` SET `taymbagla` = '1' WHERE `id` = '$oyid';" );
$akom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$akoma = @mysql_result($akom, 0);
$bkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$bkomb = @mysql_result($bkom, 0);
$ckom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$ckomc = @mysql_result($ckom, 0);
$dkom = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$d';");
$dkomd = @mysql_result($dkom, 0);

if($akoma < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($bkomb < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($ckomc < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}if($dkomd < 1){
mysql_query( "UPDATE `domino_bazari` SET `qat` = '1' WHERE `id` = '$oyid';" );
}

$sayilar=array("$akoma","$bkomb","$ckomc","$dkomd");
$enbuyuk=max($sayilar);
$enkucuk=min($sayilar);
if($yenilendi == 0){



////////////////////////
if($akoma == $enkucuk or $bkomb == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$c';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$c';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$d';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$d';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}



mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$d';" );

$sayilar=array("$akoma","$bkomb");
$enbuyuk=max($sayilar);


if($akoma == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );
}elseif($bkomb == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$a';" );
}
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'A Qrupu Qalib geldi. $cemi Xal elave olundu...', `usid` = '0' ;" );
}
///////////////////////////////


if($ckomc == $enkucuk or $dkomd == $enkucuk){
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$a';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$a';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
$cemi = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}
$dassayia = @mysql_query("SELECT `das` FROM `users_dom` WHERE `id` = '$b';");
$dassayiaa = @mysql_result($dassayia, 0);
$olanlara = @mysql_query("SELECT `daslarim` FROM `users_dom` WHERE `id` = '$b';");
$olanlaraa = @mysql_result($olanlara, 0);
$mensiz = 0;
while($mensiz <= $dassayiaa){
$degerden = explode(",",$olanlaraa);
$cemi = $degerden[$mensiz][0]+$degerden[$mensiz][2] + $cemi;
$mensiz++;
}


$sayilar=array("$akoma","$bkomb");
$enbuyuk=max($sayilar);

mysql_query( "UPDATE `domino_bazari` SET `yenilendi` = '1' WHERE `id` = '$oyid';" );
mysql_query( "UPDATE `users_dom` SET `dominoqat` = '1',`gedistarix` = '2',`dgedis` = '0' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '4',`dgedis` = '0' WHERE `id` = '$b';" );


if($ckomc == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$d';" );
}elseif($ckomc == $enbuyuk){
mysql_query( "UPDATE `users_dom` SET `dominouddu` = '1',`gedistarix` = '1',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `gedistarix` = '3',`dgedis` = '1',`dominoxal`='$cemi'+`dominoxal` WHERE `id` = '$c';" );
}
mysql_query( "INSERT INTO `domino_message` SET `domid` = '$oyun', `text` = 'C Qrupu Qalib geldi. $cemi Xal elave olundu...', `usid` = '0' ;" );
}
}
}
}

?>