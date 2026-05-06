<?PHP //Muellif: Nihad_Niko


/////pass////
$yeni_niko = mysql_query("SELECT * FROM nihad_panel WHERE usid='".$row["id"]."'");

if(mysql_affected_rows()!=0){
$yeninihad = mysql_fetch_object($yeni_niko);
$okniko = $yeninihad->login;
$yeni_niko = $yeninihad->pass;

$login = "$okniko";
$password = "$yeni_niko";
if(empty($_SERVER['PHP_AUTH_USER']) ||	($_SERVER['PHP_AUTH_USER'] != $login || $_SERVER['PHP_AUTH_PW'] != $password)) {
header('WWW-Authenticate: Basic realm="Guvenlik Parolu"');
header('HTTP/1.0 401 Unauthorized');
exit();
}}
////son..///





///znak
$adm = @mysql_query ("Select user from users where id='7' LIMIT 1;"); 
$c = @mysql_fetch_array ($adm); 
$administration = $c["user"]; 
$zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `zn_time`!= '0' and `zn_time` < ".time().";"); 
while($zn_users = mysql_fetch_array($zn_sql)){ 
mysql_query("UPDATE `users` SET `zn` = '', zn_time = '0' WHERE `id` = '".$zn_users["id"]."';"); 
$rnd = rand(0,99999999); 
$metn = "Hormetli <b>".$zn_users["user"]."</b> Aldiginiz Znakin Muddeti Bitdi..."; 
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$zn_users["id"]."',`towhom` = '".$zn_users["user"]."',`idwho` = '7',`time` = '".time()."',`who` = '".$administration."',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Znak Muddet',`message` = '".$metn."';");  
}
///rengli nik
  $adm = @mysql_query ("Select user from users where id='1' LIMIT 1;"); 
  $c = @mysql_fetch_array ($adm); 
  $administration = $c["user"]; 
 $rn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `rn_time`!= '0' and `rn_nik`!= '0'  and `rn_time` < ".time().";"); 
  while($rn_users = mysql_fetch_array($rn_sql)){ 
 mysql_query("UPDATE `users` SET `rn_time` = '0', rn_nik = '0' WHERE `id` = '".$rn_users["id"]."';"); 
unlink('i/'.$rn_users['id'].'.gif');
 $rnd = rand(0,99999999); 
  $metn = "Hormetli <b>".$rn_users["user"]."</b>. Aldiginiz Rengli Nikin muddeti bitdi..!"; 
 mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$rn_users["id"]."',`towhom` = '".$rn_users["user"]."',`idwho` = '1',`time` = '".time()."',`who` = '".$administration."',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Rengli Nik',`message` = '".$metn."';"); 
  }




function cpon(){

global $row;
global $id;
global $ps;
global $rm;
global $ref;
global $SERVER_TIME;
global $_v;

$rpos = file("file/dat_folder/n_n/onlineniko.dat");
$bonusn = trim($rpos[0]);
$cpon = trim($rpos[1]);
if ($bonusn == 1) {

$bals=file("file/bal_bot/0.dat");
$send_bal = trim($bals[4]);
$b_user = trim($bals[0]);
$user_bot = trim($bals[1]);
$login = base64_encode("$id,$ps,$ref");

$select = mysql_query("Select * from `onlines` where `key`='1'");
$obj = mysql_fetch_array($select);
$tim = $obj['time'];
$n = $obj['name'];
$m = $obj['mebleg'];
$text = $obj['text'];
$hed_t = $obj['hed_t'];
$k_d = $obj['kod'];
if($tim > time()){
echo "$text";
$yeni = $tim - time();
$g_san = $yeni / 86400;
$gun_tam = strtok($g_san,'.');
$gun_san = $gun_tam * 86400;
$s_san = ($yeni - $gun_san) / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
$saat_san = $gun_san + $saat_san;
$d = $yeni / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($yeni - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
$saniye = $yeni - $deqiqe_san;
echo "<br/>";
echo "H&#601;diyy&#601; <u>";
if($deqiqe<0)$deqiqe="";
if ($deqiqe != 0)echo "<b>".$deqiqe."</b> d&#601;q.";
if ($saniye != 0)echo " <b>".$saniye."</b> san.";
echo "</u> sonra";
}else{
if($hed_t < time()){
$select = mysql_query("Select * from online order by rand() desc limit 1");
$obj = mysql_fetch_object($select);
$mebleg = $obj->mebleg;
$hed = $obj->name;
$tekst = "";
$t = time() + $cpon;
$tt = time() + $cpon + 20;
mysql_query("DELETE FROM `onlines`");
$kode = rand(1111,9999);
$yus=1;
echo "<br/>";
echo "H&#601;diyy&#601; Qazan&#305;lmad&#305;..<br/>";
mysql_query ("INSERT INTO onlines SET mebleg = '".$mebleg."', kod = '".$kode."', text = '".$tekst."', name = '".$hed."', hed_t = '".$tt."', time = '".$t."'");
}
if(isset($_POST['kod'])){
if($_POST['kod']!="$k_d"){
echo "<br/>Kod d&#252;zg&#252;n daxil edilm&#601;di..<br/>".$divide;
}else{
$select = mysql_query("Select * from `onlines` where `key`='1'");
$obj = mysql_fetch_object($select);
$tim = $obj->time;
$n = $obj->name;
$m = $obj->mebleg;
$text = $obj->text;
$hed_t = $obj->hed_t;
$na = $obj->name;
if($n=="bal"){
$n="Bal";
}else if($n=="posts"){
$n="Post";
}else if($n=="credits"){
$n="Cavab";
}
if($tim < time()){
$yus=1;
echo "<br/><b>$m</b> $n qazand&#305;n&#305;z.<br/>Tebrik Edirik.<br/>";
for ($i=0; $i<=9; $i++){
$today=date ("H:i",$SERVER_TIME);
$mes = "Tebrikler <b>".$row['user']."</b> <b>$m</b> $n kupon hediyyesi qazandi..!";
$rnd = rand(0,99999999);
mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='$user_bot', message='".$mes."', id='".$SERVER_TIME."', towhom='', hid='0', usid='10'");
}
$select = mysql_query("Select * from online order by rand() desc limit 1");
$obj = mysql_fetch_object($select);
$mebleg = $obj->mebleg;
$hed = $obj->name;
//$tekst = "<b>".$row['user']."</b> + $m $n ..<br/>";
if($na=="bal"){
@mysql_query ("Update users set bal = bal+$m where id ='".$id."'");
}else if($na=="posts"){
@mysql_query ("Update users set posts = posts+$m where id ='".$id."'");
}else if($na=="credits"){
@mysql_query ("Update users set credits = credits+$m where id ='".$id."'");
}
if(file_exists("file/dat_folder/n_n/chat.dat")){
$date = date("d.m.y [H:i]",mktime(date ("H")+$xsat)); 
@$save= fopen("file/dat_folder/n_n/chat.dat", "a+");
$qeyd = "Nick: <b>".$row['user']."</b>: Hediyye: <u>$m $n</u> Tarix-".$date."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
}
$t = time() + $cpon;
$tt = time() + $cpon + $cpon;
mysql_query("DELETE FROM onlines");
$kode = rand(1111,9999);
mysql_query ("INSERT INTO onlines SET mebleg = '".$mebleg."', text = '".$tekst."', name = '".$hed."', kod = '".$kode."', hed_t = '".$tt."', time = '".$t."'");
}else{
$select = mysql_query("Select * from `onlines` where `key`='1'");
$obj = mysql_fetch_object($select);
$tim = $obj->time;
$n = $obj->name;
$m = $obj->mebleg;
$text = $obj->text;
$hed_t = $obj->hed_t;
$yeni = $tim - time();
$g_san = $yeni / 86400;
$gun_tam = strtok($g_san,'.');
$gun_san = $gun_tam * 86400;
$s_san = ($yeni - $gun_san) / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
$saat_san = $gun_san + $saat_san;
$d = $yeni / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($yeni - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
$saniye = $yeni - $deqiqe_san;
echo "N&#246;vbeti hediyye<u> ";
if ($deqiqe != 0)echo "".$deqiqe." deq";
if ($saniye != 0)echo " ".$saniye." san";
echo "</u> sonra<br/>";
}
}
}
$_v->action("".$_SERVER['PHP_SELF']."?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref");




if($yus!='1'){
echo "<br/>";
echo "Kupon Kod: <b>$k_d</b><br/>";

print $_v->input("<input name=\"kod$ref\" maxlength=\"10\" size=\"8\"/>").'<br/>';
print $_v->submit('Daxil et','action=save');

}
}
}


}

?>