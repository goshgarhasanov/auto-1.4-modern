<?php

$a = $maa['a'];
$b = $maa['b'];
$c = $maa['c'];
$d = $maa['d'];
$point = $maa['point'];

$hesabimd = $SERVER_TIME+120;
if($gedis ==1 and $qat ==1){
echo " <img src=\"duzler/".$degerde[$menimde].".jpg\" alt=\".\"/> ";
}else

if($gedis == 1 and $round == 0){
if(@strstr($degerde[$menimde], "1.1")){
$tapildi = 1;
echo  " <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=1.1&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";
if($goturdu == 0){

if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}

if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}

mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '1.1',`goturdu` = '1' WHERE `id` = '$oyid';" );

if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
}elseif(@strstr($degerde[$menimde], "2.2") == true and $bazarda1 == 1 and $tapildi != 1){
$tapildi = 1;
if($goturdu == 0){
if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}
if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}

if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}
mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '2.2',`goturdu` = '1' WHERE `id` = '$oyid';" );
if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}

if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
echo  " <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=2.2&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";

}elseif(@strstr($degerde[$menimde], "3.3") == true and $bazarda2 == 1 and $bazarda1 == 1 and $tapildi != 1){
$tapildi = 1;
if($goturdu == 0){
if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}
if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}
mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '3.3',`goturdu` = '1' WHERE `id` = '$oyid';" );
if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
echo  "  <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=3.3&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";

}elseif(@strstr($degerde[$menimde], "4.4") == true and $bazarda3 == 1 and $bazarda2 == 1 and $bazarda1 == 1 and $tapildi != 1){
$tapildi = 1;
if($goturdu == 0){
if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}
if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}
mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '4.4',`goturdu` = '1' WHERE `id` = '$oyid';" );
if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
echo  " <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=4.4&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";

}elseif(@strstr($degerde[$menimde], "5.5") == true and $bazarda4 == 1 and $bazarda3 == 1 and $bazarda2 == 1 and $bazarda1 == 1 and $tapildi != 1){
$tapildi = 1;
if($goturdu == 0){
if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}
if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}
mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '5.5',`goturdu` = '1' WHERE `id` = '$oyid';" );
if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
echo  "  <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=5.5&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";

}elseif(@strstr($degerde[$menimde], "6.6") == true and $bazarda5 == 1 and $bazarda4 == 1 and $bazarda3 == 1 and $bazarda2 == 1 and $bazarda1 == 1 and $tapildi != 1){
$tapildi = 1;
if($goturdu == 0){
if($oyuncu == 4){
if($id == $a){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$b';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}
if($id == $b){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$d';" );
}

if($id == $c){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$d';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
if($id == $d){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '2' WHERE `id` = '$c';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '1' WHERE `id` = '$a';" );
mysql_query( "UPDATE `users_dom` SET `dgedistarix` = '3' WHERE `id` = '$b';" );
}
}

if($oyuncu == 2 or $oyuncu == 3){
mysql_query( "UPDATE `users_dom` SET `dgedis` = '1',`dgedistarix` = '$hesabimd' WHERE `id` = '$id';" );
}
mysql_query( "UPDATE `domino_bazari` SET `ilkdas` = '6.6',`goturdu` = '1' WHERE `id` = '$oyid';" );
if($oyuncu == 2){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
}
if($oyuncu == 3){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
}

if($oyuncu == 4){
$balimda = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$a';");
$balimdaa = @mysql_result($balimda, 0);
$balimdb = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$b';");
$balimdbb = @mysql_result($balimdb, 0);
$balimdc = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$c';");
$balimdcc = @mysql_result($balimdc, 0);
$balimdd = @mysql_query("SELECT `dominoreytinq` FROM `users` WHERE `id` = '$d';");
$balimddd = @mysql_result($balimdd, 0);

$ballera = $balimdaa-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballera' WHERE `id` = '$a';" );
$ballerb = $balimdbb-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerb' WHERE `id` = '$b';" );
$ballerc = $balimdcc-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerc' WHERE `id` = '$c';" );
$ballerd = $balimddd-$point;
mysql_query( "UPDATE `users` SET `dominoreytinq` = '$ballerd' WHERE `id` = '$d';" );
}
}
echo  "  <a class=\"menu4\" href=\"domino.php?id=$id&amp;ps=$ps&amp;go=oyunum&amp;oyun=$oyid&amp;oyun1=6.6&amp;ref=$ref\"> <img style=\"border:2px double green;\" src=\"duzler/".$degerde[$menimde].".jpg\" width=\"23\" height=\"48\" alt=\"Domino\"> </a>";

}else{
echo " <img src=\"duzler/".$degerde[$menimde].".jpg\" alt=\".\"/> ";
}}
?>