<?
$umnik = 'Alim';
$uid = '2';

$a = mysql_query ("Select * from vopros");
$b = mysql_fetch_array ($a);
$nom = $b["number"];
$vr = $b["time"];
$answ = $b["answer"];

if ($SERVER_TIME>=$vr){
if ($nom == 5){
$st = $SERVER_TIME;

$st = $st + 240;
@mysql_query ("Update vopros set time = '".$st."' WHERE klu4 = '1'");

$qu = mysql_query ("Select * FROM bots ORDER BY rand() LIMIT 1;");
$re = mysql_fetch_array($qu);

$answ = $re["answer"];
$tran = $re["tran"];
$nom = 0;
$vr = $st;
$otv = utf_to_win($answ);
$i = strlen($otv);
$vp = $re["vopros"]." (<b>$i herf</b>)";
$rs = "<b>Sual: </b>";

mysql_query ("Update vopros set number = '".$nom."', question = '".$vp."', answer = '".$answ."', tran = '".$tran."' WHERE klu4 ='1'");

$times = $SERVER_TIME;
@mysql_query ("Update users set time='".$times."', room='0' where id ='".$uid."'");
$today=date ("H:i",$SERVER_TIME); 
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$umnik."', message='".$rs.$vp."', id='".$SERVER_TIME."', towhom='', hid='0', usid='".$uid."'");
} else { //Верного ответа не последовало
$victint = $set["victint"];

$st = $SERVER_TIME + $victint; //Время след. вопроса - через 1 минуту
if ($victint=="10") $interval="10 saniyeden";
else if ($victint=="30") $interval="30 saniyeden";
else if ($victint=="60") $interval="1 deqiqeden";
else $interval="2 deqiqeden";

$answ = " ";
$tran = " ";
$nom = 5;
$vr = $st;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."', time = '".$vr."', tran = '".$tran."' WHERE klu4 ='1'");

$p++;

@mysql_query ("Update users set time='".$SERVER_TIME."', room='0' where id ='".$uid."'");
$vp = "Vaxt bitdi. N&#246;vbeti sual ".$interval." sonra.";
$today=date ("H:i",$SERVER_TIME); 
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$umnik."', message='".$vp."', id='".$SERVER_TIME."', towhom='', hid='0', usid='".$uid."'");
}
}else //1-ая подсказка:
if ((($vr-$SERVER_TIME)<180)&&($nom == 0)){
$nom = 1;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."' WHERE klu4 ='1'");

@mysql_query ("Update users set time='".$SERVER_TIME."', room='0' where id ='".$uid."'");
$v = utf_to_win($answ);
$v = substr($v,0,1);
$vp = "<b>Komek1:</b> $v...";
$today=date ("H:i",$SERVER_TIME); 
$rnd = rand(0,99999999);
@mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$umnik."', message='".$vp."', id='".$SERVER_TIME."', towhom='', hid='0', usid='".$uid."'");
} else //Вторая подсказка:
if ((($vr-$SERVER_TIME)<90)&&($nom < 2)){
$nom = 2;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."' WHERE klu4 ='1'");

@mysql_query ("Update users set time='".$SERVER_TIME."', room='0' where id ='".$uid."'");

$v = utf_to_win($answ);
$i = strlen($v)/3;
if ($i<2) $i=2;
$v = substr($v,0,$i);
$vp = "<b>Komek2:</b> $v...";
$today=date ("H:i",$SERVER_TIME); 
$rnd = rand(0,99999999);
@mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$umnik."', message='".$vp."', id='".$SERVER_TIME."', towhom='', hid='0', usid='".$uid."'");
}
//Конец викторины
?>