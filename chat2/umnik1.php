<?
$um = @mysql_query ("Select user from users where id='2' LIMIT 1;");
$y = @mysql_fetch_array ($um);
$umnik = $y["user"];
$uid = "2";
$uus = "".$umnik."";

$a = mysql_query ("Select * from vopros");
$b = mysql_fetch_array ($a);
$nom = $b["number"];
$vr = $b["time"];
$answ = $b["answer"];

if (time()>=$vr){
if ($nom == 5){
$st = time();

$st = $st + 240;
@mysql_query ("Update vopros set time = '".$st."' WHERE klu4 = '1'");
$r = mysql_query ("Select count(*) as num from bots");
$a = mysql_fetch_array($r);
$num = $a["num"]-1;
$rnd = rand(1,$num);

$qu = mysql_query ("Select * from bots where number>'".$rnd."'");
$re = mysql_fetch_array ($qu);
$answ = $re["answer"];
$tran = $re["tran"];
$nom = 0;
$vr = $st;
$otv = utf_to_win($answ);
$i = strlen($otv);
$vp = $re["vopros"]." (<b>$i herf</b>)";
$rs = "<b>Sual: </b>";

mysql_query ("Update vopros set number = '".$nom."', question = '".$vp."', answer = '".$answ."', tran = '".$tran."' WHERE klu4 ='1'");

$st = getmicrotime(); //Изменил
$times = time();
@mysql_query ("Update users set time='".$times."', room='0' where id ='".$uid."'");
$today=date ("H:i",mktime(date ("H")+$xsat));
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$rs."".$vp."', id='".$st."', towhom='', hid='0', usid='".$uid."'");
} else { //Верного ответа не последовало
$victint = $set["victint"];
$st = time();

$st = $st + $victint; //Время след. вопроса - через 1 минуту
if ($victint=="10") $interval="10 saniyeden";
else if ($victint=="30") $interval="30 saniyeden";
else if ($victint=="60") $interval="1 deqiqeden";
else $interval="2 deqiqeden";
mysql_query ("Update vopros set time = '".$st."' WHERE klu4 = '1'");
$r = mysql_query ("Select count(*) as num from bots");
$a = mysql_fetch_array($r);
$num = $a["num"];
$rnd = rand(1,$num);
$qu = mysql_query ("Select * from bots where number>'".$rnd."'");
$re = mysql_fetch_array ($qu);
$answ = " ";
$tran = " ";
$nom = 5;
$vr = $st;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."', tran = '".$tran."' WHERE klu4 ='1'");

$p++;
$st = getmicrotime();

@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");
$vp = "Vaxt bitdi. N&#246;vbeti sual ".$interval." sonra.";
$today=date ("H:i",mktime(date ("H")+$xsat));
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$vp."', id='".$st."', towhom='', hid='0', usid='".$uid."'");
}
}else //1-ая подсказка:
if ((($vr-time())<180)&&($nom == 0)){
$nom = 1;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."' WHERE klu4 ='1'");

$st = getmicrotime();
$times = time();
@mysql_query ("Update users set time='".$times."', room='0' where id ='".$uid."'");
$v = utf_to_win($answ);
$v = substr($v,0,1);
$vp = "<b>Komek1:</b> $v...";
$today=date ("H:i",mktime(date ("H")+$xsat));
$rnd = rand(0,99999999);
@mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$vp."', id='".$st."', towhom='', hid='0', usid='".$uid."'");
} else //Вторая подсказка:
if ((($vr-time())<90)&&($nom < 2)){
$nom = 2;
mysql_query ("Update vopros set number = '".$nom."', answer = '".$answ."' WHERE klu4 ='1'");

$times = time();
@mysql_query ("Update users set time='".$times."', room='0' where id ='".$uid."'");

$v = utf_to_win($answ);
$i = strlen($v)/3;
if ($i<2) $i=2;
$v = substr($v,0,$i);
$vp = "<b>Komek2:</b> $v...";
$today=date ("H:i",mktime(date ("H")+$xsat));
$rnd = rand(0,99999999);
$st = getmicrotime();
@mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$vp."', id='".$st."', towhom='', hid='0', usid='".$uid."'");
}

?>
