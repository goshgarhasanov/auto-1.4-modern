<?
if ($msg=="!sual"||$msg=="!vopros"){
$r = mysql_query ("select * from vopros");
$a = mysql_fetch_array($r);
$vp = $a ["question"];
$i = $a ["number"];
if ($i!=5){
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");
$rnd = rand(0,99999999);
$rs = "<b>Sual: </b> ";
$st = getmicrotime();
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$rs."".$vp."', id='".$st."', towhom='', hid='0', usid='".$uid."'");
}
}

$s = substr ($msg,0,5);
if (($s == "stat")&&(strlen($msg) > 6)){
$stsus = substr ($msg,6,strlen($msg)-6);
$a = @mysql_query ("Select credits from users where user='".$stsus."'");
if (mysql_affected_rows() != 0){
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
$b = mysql_fetch_array($a);
$i = $b["credits"];
$a = @mysql_query ("Select user from users order by credits desc LIMIT 101");
$j = 1;
$b = mysql_fetch_array($a);

while (($b["user"] != $stsus)&&($j <= 100)) {$b = mysql_fetch_array($a); $j++;}
if ($j<=100) $s= ".. $j ..";
else $s = "...";
$mes = ". $stsus $i .. $s";
$rnd = rand(0,99999999);
if($towhom == $uid) $th = $id; else $th ="";
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$mes."', id='".$st."', towhom='".$th."', hid='0', usid='".$uid."'");
$st = getmicrotime();
@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");
} else {
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
$mes = "xx $stsus x!";
$rnd = rand(0,99999999);
if($towhom == $uid) $th = $id; else $th ="";
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$mes."', id='".$st."', towhom='".$th."', hid='0', usid='".$uid."'");
$st = getmicrotime();

@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");
}
}
//Не принимать ответы с компа
$agent = htmlentities(addslashes($HTTP_USER_AGENT));
if (((strpos ($agent,"M3Gate") !== false)||(strpos ($agent,"Opera") !== false)||(strpos ($agent,"emulator") !== false)||(strpos ($agent,"WinWAP") !== false)||(strpos ($agent,"Wapsilon") !== false)||(strpos ($agent,"Mozilla") !== false)||(strpos ($agent,"M3GATE") !== false))&&($rm==0)&&($set["vict"] == 0)){
if (($amsg == $kansw||$amsg == $tran||$amsg == "$latumnik, $kansw"||$amsg == "$latumnik, $tran")&&$nom!=5){
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
$mes = "".$us."! Siz d&#252;zg&#252;n cavab verdiz, lakin komp&#252;terden cavablar qeyde al&#305;nm&#305;r.";
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$mes."', id='".$st."', towhom='".$id."', hid='".$id."', usid='".$uid."'");
}
}else{//tel qebulu
if (($amsg == $kansw||$amsg == $tran||$amsg == "$latumnik, $kansw"||$amsg == "$latumnik, $tran")&&$nom!=5){{
$st = time();
$victint = $set["victint"];
$st = $st + $victint; //Время след. вопроса - через 1 минуту
if ($victint=="10") $interval="10 saniyeden";
else if ($victint=="30") $interval="30 saniyeden";
else if ($victint=="60") $interval="1 deqiqeden";
else $interval="2 deqiqeden";
mysql_query ("Update vopros set number = '5', time = '".$st."', answer = ' ', tran = ' ' WHERE klu4 ='1'");
$st = getmicrotime();
@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");

@mysql_query ("Update users set time='".$st."', room='0' where id ='".$uid."'");

$p = $row["credits"];
$p++;
mysql_query ("Update users set credits='".$p."' where id ='".$id."'");
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
$mes = "$us! Bu Duzgun Cavabdir!.Novbeti sual ".$interval." sonra.";
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$mes."', id='".$st."', towhom='".$towhom."', hid='0', usid='".$uid."'");
}
$st = getmicrotime();

$today=date ("H:i",mktime(date ("H")+$xsat));
$mes = "".$us.", Halaldi, Siz Dogru Cavab Yazdiniz!!!";
$rnd = rand(0,99999999);
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$uus."', message='".$mes."', id='".$st."', towhom='".$id."', hid='".$id."', usid='".$uid."'");
}
}
//Конец викторины
?>
