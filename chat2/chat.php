<?php

header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if(isset($HTTP_GET_VARS['rm'])) {$rm = $HTTP_GET_VARS['rm'];}
if (!ctype_digit($rm)) { header("Location: index.php"); die; }
$rm = mysql_escape_string($rm);

$rem = mysql_query("SELECT `topic`,`rm` FROM `rooms` where `rm` = '".$rm."';");
$iname = mysql_fetch_array ($rem);
$topic = $iname["topic"];
$rm = $iname["rm"];

if(!isset($rm)){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Daxil olmaq istediyiniz otaq m&#246;vcud deyil!<br/>";
echo "Zehmet olmasa S&#246;bete qo&#351;ulmaq &#252;&#231;&#252;n bir otaq se&#231;in...<br/>****<br/>";
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
exit;
}


if (($row["level"]<4)&&($rm==8)){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Diqqet!!!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Bu otaqa yaln&#305;z R&#252;tbeli &#351;exslerin giri&#351; h&#252;ququ var.<br/>";
echo "Zehmet olmasa S&#246;bete qo&#351;ulmaq &#252;&#231;&#252;n ba&#351;qa bir otaq se&#231;in...<br/>****<br/>";
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at Otaqlar&#305; </a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
exit;
}



$room="room".$rm;
$us=$row["user"];
$max = $row["max"];
$level = $row["level"];
$smset = $row["smiles"];
$us_ip = $row["user_ip"];
$us_soft = $row["user_soft"];
$umni = $row["umnik"];
$rnikler = $row["rnikler"];


$smthwr = 0;
$bmax = $max*2;
if ($rm=="10" and $pwd==""){
header ("Location: otaq.php?id=$id&ps=$ps&rm=10&ref=$ref");
exit;}

if (isset($vct)){$vct=intval($vct); mysql_query("update users set umnik='$vct' where id='$id';");
$umni = $vct;
};

if ($umni==0){
$umn="and usid!=2";
$aumn="where usid!=2";
};

$pwd=htmlspecialchars(stripslashes(trim($pwd)));
if ($rm == 10) {
$res = mysql_query ("Select klu4,time,zn,who,message,id,towhom,hid,usid,pwd,reng from room10 WHERE ((pwd = '".$pwd."')OR(pwd = '')) and ((usid = '".$id."')OR(towhom = '".$id."')OR(towhom = '')) order by id desc LIMIT $bmax");
}elseif($row['gizlilik']!=2){
if($mod=="privat") $res = mysql_query ("Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from $room WHERE (usid = '".$id."')OR(towhom = '".$id."')OR(uid = '".$id."') $umn order by id desc LIMIT $bmax");
else $res = mysql_query ("Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from $room WHERE (usid = '".$id."')OR(towhom = '".$id."')OR(towhom = '') $umn order by id desc LIMIT $bmax");
}
else
{
if($mod=="privat")$res = mysql_query ("Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from $room WHERE (usid = '".$id."')OR(towhom = '".$id."')OR(uid = '".$id."') $umn order by id desc LIMIT $bmax");
else $res = mysql_query ("Select klu4,time,zn,who,message,id,towhom,hid,usid,reng from $room $aumn order by id desc LIMIT $bmax");
}

$kol = mysql_affected_rows();
$setting = @mysql_query ("Select * from setting where klu4=1");
$set = mysql_fetch_array ($setting);
$posts =  $row["posts"];
$bugunpost =  $row["bugunpost"];

$komputer= $set["komputer"];

$r_k="";
if ((strpos ($HTTP_USER_AGENT,"Windows") !== false)||(strpos ($HTTP_USER_AGENT,"Opera") !== false))
{
$r_k="ok";
}

if ($rm == 0) require("umnik1.php");

if(@$msg){
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,400);
$msg = str_replace("", " ", $msg);
$msg = str_replace("$", "$$", $msg);
$msg = strtr($msg,array(chr("0")=>"",chr("1")=>"",chr("2")=>"",chr("3")=>"",chr("4")=>"",chr("5")=>"",chr("6")=>"",chr("7")=>"",chr("8")=>"",chr("9")=>"",chr("10")=>"",chr("11")=>"",chr("12")=>"",chr("13")=>"",chr("14")=>"",chr("15")=>"",chr("16")=>"",chr("17")=>"",chr("18")=>"",chr("19")=>"",chr("20")=>"",chr("21")=>"",chr("22")=>"",chr("23")=>"",chr("24")=>"",chr("25")=>"",chr("26")=>"",chr("27")=>"",chr("28")=>"",chr("29")=>"",chr("30")=>"",chr("31")=>""));
$msg = htmlspecialchars($msg);
$msg = str_replace("\"", "&quot;", $msg);
$msg = str_replace("|", "&#0166;", $msg);
$msg = str_replace("'", "&#8216;", $msg);

$msg = str_replace("&#1046;&#1039;", "E", $msg);
$msg = str_replace("&#1094;", "x", $msg);
$msg = str_replace("С&#710;", "С&#710;", $msg);
$msg = str_replace("&#1043;&#1112;", "&#252;", $msg);
$msg = str_replace("&#1043;�", "&#246;", $msg);
$msg = str_replace("&#1044;&#1119;", "&#287;", $msg);
$msg = str_replace("&#1044;�", "&#305;", $msg);
$msg = str_replace("&#1043;�", "&#231;", $msg);
$msg = str_replace("&#1045;&#1119;", "&#351;", $msg);
$msg = str_replace("Г�", "&#220;", $msg);//UH
$msg = str_replace("Г�", "&#252;", $msg);//uh
$msg = str_replace("Г�", "&#214;", $msg);//OH
$msg = str_replace("Г�", "&#246;", $msg);//oh
$msg = str_replace("Г�", "&#231;", $msg);//CH
$msg = str_replace("Г�", "&#199;", $msg);//ch
$msg = str_replace("Е�", "&#350;", $msg);//SH
$msg = str_replace("Е�", "&#351;", $msg);//sh
$msg = str_replace("Д�", "&#304;", $msg);//IH
$msg = str_replace("Д�", "&#305;", $msg);//i
$msg = str_replace("Д�", "&#286;", $msg);//GH
$msg = str_replace("Д�", "&#287;", $msg);//gh
$msg = str_replace("З", "&#199;", $msg);
$msg = str_replace("з", "&#231;", $msg);
$msg = str_replace("Ц", "&#214;", $msg);//Oh
$msg = str_replace("ц", "&#246;", $msg);
$msg = str_replace("Ь", "&#220;", $msg);
$msg = str_replace("ь", "&#252;", $msg);
$msg = str_replace("д", "e", $msg);
$msg = str_replace("Д", "e", $msg);
$msg = str_replace("х", "&#246;", $msg);
$msg = str_replace("Х", "&#214;", $msg);
$msg = str_replace("м", "&#305;", $msg);
$msg = str_replace("М", "I", $msg);
$msg = str_replace("Й�", "e", $msg);
$msg = str_replace("Ж�", "E", $msg);
$msg = str_replace("У�", "e", $msg);
$msg = str_replace("У?", "E", $msg);
$msg = str_replace("Я", "&#351;", $msg);
$msg = str_replace("$$", "&#351;", $msg);
$msg = str_replace("н", "&#305;", $msg);
$msg = str_replace("Н", "I", $msg);
$msg = str_replace("ъ", "&#252;", $msg);
$msg = str_replace("Ъ", "&#220;", $msg);
$msg = str_replace("ы", "&#246;", $msg);
$msg = str_replace("Ы", "&#214;", $msg);
$msg = str_replace("ф", "&#214;", $msg);
$msg = str_replace("Ф", "&#246;", $msg);
$msg = str_replace("Ш", "&#350;", $msg);
$msg = str_replace("ш", "&#351;", $msg);
$msg = str_replace("щ", "&#252;", $msg);
$msg = str_replace("Щ", "&#220;", $msg);
$msg = str_replace("м", "&#305;", $msg);
$msg = str_replace("М", "I", $msg);
$msg = str_replace("e�", "e", $msg);
$msg = str_replace("о", "i", $msg);
$msg = str_replace("О", "I", $msg);
//$msg = str_replace("М", "I", $msg);
$msg = str_replace("\\", "", $msg);
$msg = addslashes($msg);

if(strtolower($msg)=="exit")
{
$mytime=$row["time"];
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://qizlar.net\">\n";
echo "<wml>\n";
echo "<card id=\"cixish\" title=\"&#199;&#305;x&#305;&#351;\">\n";
echo "<p align=\"center\">\n";
echo "<small>";
echo "<b>Siz &#199;at&#305; Terk Etdiniz.</b><br/>****<br/>G&#252;le-g&#252;le :)<br/> <b>U&#287;urlar!</b><br/>****<br/>\n";
echo "<a href=\"index.php?$ref\">$site</a>\n";
echo "</small>";
echo "</p></card></wml>\n";
if($mytime>time()){
$st = getmicrotime();
$room = "room".$rm."";
$rnd = rand(0,99999999);
$today=date ("H:i",mktime(date ("H")+$xsat));
$times=time()-5;
mysql_query("UPDATE `users` SET `time` = '".$times."', `room` = '30', `user_ip` = '".$REMOTE_ADDR."', `user_soft` = '".$HTTP_USER_AGENT."' WHERE `id` = '".$id."' LIMIT 1;");
@mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='Sistem', message='<b>$us &#199;at&#305; Terk Etdi.</b>', id='".$st."', towhom='', hid='".$hid."', usid='4', reng='', zn='';");
}
mysql_close ($link);
exit;
}


if (!isset($prvt)) $prvt = 0;

$str1="";
$str2=$msg;


$u_uid = $towhom;

if ($prvt == 0) $towhom = "";
if (!isset($towhom)) $towhom = "";

if ($row["level"]<5) {require("filtr.php");}

if ($smset==2){
require("smile.php");

$minpos = 500; $nm = 500;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($msg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=500){
$st1 = substr($msg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msg,$minpos+strlen($smiles[$nm]),strlen($msg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$msg = $st1.$st2;
}

unset($smiles);
unset($replaces);
}
if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);


$msg = $str1.$msg;
if (@$msg_wosm!="") $msg_wosm = $str1.$msg_wosm;
if (@$msg_woasm!="") $msg_woasm = $str1.$msg_woasm;

if($level > 4)
{
$shr = $_POST['shr'];
if(substr_count($shr, "2") != 0) $msg = "<u>$msg</u>";
if($level > 5)
{
if(substr_count($shr, "1") != 0) $msg = "<i>$msg</i>";

}
if($level > 6)
{
if(substr_count($shr, "3") != 0) $msg = "<b>$msg</b>";
}
if($level > 8)
{
if(substr_count($shr, "4") != 0) $msg = "<big>$msg</big>";
}
}


$r = mysql_query("SELECT message FROM $room WHERE usid = '".$id."' order by id desc LIMIT 1");
$a = mysql_fetch_array($r);
if ($a["message"] !== $msg){
$time = getmicrotime();
$ftime = $time - 90;
$r = mysql_query("SELECT count(*) as sum from $room WHERE (usid = '".$id."')and(id > '".$ftime."')");
$a = mysql_fetch_array($r);
$sum = $a["sum"];
if ($sum>=6&&$row["level"]<4){
$ftime = $time + 240;
mysql_query("update users set kik = '".$ftime."', whykik = 'Tekrar(Flood)', whokik = 'SISTEM' WHERE id = '".$id."'");
}

$today=date ("H:i",mktime(date ("H")+$xsat));
$posts =  $row["posts"];
$posts++;
$bugunpost =  $row["bugunpost"];
$bugunpost++;

mysql_query ("Update users set posts='".$posts."',bugunpost='".$bugunpost."' where id ='".$id."'");
$hid = $row["inv"];
$kol++;
$rnd = rand(0,99999999);

if($rm==0) {
$a = mysql_query ("Select * from vopros where klu4 = '1'");
$b = mysql_fetch_array ($a);
$nom = $b["number"];
$vr = $b["time"];
$answ = $b["answer"];
$tran = $b["tran"];
$amsg = rus_to_k($msg);
$kansw = rus_to_k($answ);
}




$today=date ("H:i",mktime(date ("H")+$xsat));
$time = getmicrotime();

$zn = $row["zn"];
$reng = $row["shrift"];
if (($rm == 0)&&($amsg == $kansw||$amsg == $tran)&&$nom!=5){
@mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', zn='".$zn."', who='".$us."', message='".$msg."', uid='".$u_uid."',   id='".$time."', towhom='".$towhom."', hid='2', usid='".$id."', reng='".$reng."'");
} else if ($rm == 10){
@mysql_query ("Insert into room10 set klu4= '".$rnd."', time='".$today."', zn='".$zn."', who='".$us."', message='".$msg."', uid='".$u_uid."', id='".$time."', towhom='".$towhom."', hid='".$hid."', usid='".$id."', pwd='".$pwd."', reng='".$reng."'");
} else {
@mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', zn='".$zn."', who='".$us."', message='".$msg."', uid='".$u_uid."', id='".$time."', towhom='".$towhom."', hid='".$hid."', usid='".$id."', reng='".$reng."'");
}


$usmes["klu4"] = $rnd;
$usmes["time"] = $today;
$usmes["zn"] = $zn;
$usmes["who"] = $us;
$usmes["usid"] = $id;
$usmes["message"] = stripslashes($msg);
$usmes["id"] = $time;
$usmes["towhom"] = $towhom;
$usmes["reng"] = $reng;
$smthwr = 1;
if($rm==0) require("umnik3.php");
}
}


unset($msg);

$avr = $row["avr"];
$avr2 = $avr/10;
$time=date ("H:i", mktime(date ("H")+$xsat));

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";



$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1')");
$a = mysql_fetch_array($r);
$inb = $a["num"];
$t=date("H:i:s", mktime(date ("H")+$xsat));


$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = '".$rm."' WHERE `id` = '".$id."';");

$delmsg = $row['delmsg'];
ob_start();
echo $xml;
echo $dtd;
echo "<wml>";
if ($avr!==0) echo "<card id=\"chat\" title=\"Saat (".$t." )\" ontimer=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"><timer value=\"".$avr."\"/>";
else echo "<card id=\"chat\" title=\"Saat (".$time.")\">";


if($r_k=="ok"){
echo "<do type=\"options\" name=\"add\" label=\"Yaz\"><go href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep#add\"/></do>";
echo "<do type=\"options\" name=\"yenile\" label=\"Yenile\"><go href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
echo "<do type=\"options\" name=\"kimharda\" label=\"Kim,Harda?\"><go href=\"onlayn.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
echo "<do type=\"options\" name=\"qurgular\" label=\"&#350;exsi Kabinet\"><go href=\"cabinet.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($row["level"]>7)echo "<do type=\"options\" name=\"delrm\" label=\"Otaq&#305; Sil\"><go href=\"admin.php?go=clroom&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($row["level"]>6)echo "<do type=\"options\" name=\"topic\" label=\"Topik\"><go href=\"topic.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($rm==10) echo "<do type=\"options\" name=\"achat\" label=\"A&#231;ar&#305; Deyi&#351;\"><go href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\"/></do>";
echo "<do type=\"options\" name=\"dehliz\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
}else{
echo "<do type=\"options\" name=\"kimharda\" label=\"Kim,Harda?\"><go href=\"onlayn.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
echo "<do type=\"options\" name=\"kabinet\" label=\"Qur&#287;ular\"><go href=\"change.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($row["level"]>7)echo "<do type=\"options\" name=\"delrm\" label=\"Otaq&#305; Sil\"><go href=\"admin.php?go=clroom&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($row["level"]>6)echo "<do type=\"options\" name=\"topic\" label=\"Topik\"><go href=\"topic.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\"/></do>";
if ($rm==10) echo "<do type=\"options\" name=\"achat\" label=\"A&#231;ar&#305; Deyi&#351;\"><go href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\"/></do>";

}
if ($rm==0) {
echo "<p align=\"center\">\n";
}else {
echo "<p>";
}



if ($rm==0) {
$ro = mysql_query ("select id,user,credits,sex from users where `credits` > '0' order by rand() limit 1" );
$arr = mysql_fetch_array($ro);
{
$login=$arr['user'];
$usid=$arr['id'];
$credits=$arr['credits'];
$se = $arr['sex'];
if ($se==0) $se="K"; else $se="Q";
print $fsize1;


echo "A&#287;&#305;ll&#305;: <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">".$login."</a>-$se<br/>";
}

print $fsize2;

echo "</p><p align=\"left\">\n";
}
$tm = time();
$y = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' AND `room` = '".$rm."' AND `inv` != '3';");
$otaqda = mysql_result($y, 0);


echo $fsize1;

$sele = mysql_query("SELECT COUNT(*) FROM `d_teklif` WHERE usid = '".$id."';");
$teklif = mysql_result($sele, 0);
if ($teklif!=0) echo "<a href=\"friends.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;go=offer$takep\">Yeni ".$teklif." Dostluq Teklifi var!</a><br/>\n";

if ($teklif!=0)echo $divide;


$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1');");
$a = mysql_fetch_array($r);
$inb = $a["num"];

$msn = $row["msn"];
if($msn>=999){
$rr = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");
$aa = mysql_fetch_array($rr);
$msn = $aa["num"];
mysql_query("UPDATE `users` SET `msn` = '".$msn."' WHERE `id` = '".$id."' LIMIT 1;");
}

$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' AND `read` = 0 and `d2` = '0';");
$newto = mysql_result($q, 0);
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' and `d2` = '0';");
$to = mysql_result($q, 0);


if($inb != "0") echo "<a href=\"mektub.php?bol=1&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Yeni ".$inb." Mektub var!</a><br/>\n";
if($msn != "0") echo "<a href=\"m_1.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Yeni ".$msn." Mesaj&#305;n&#305;z var!</a><br/>\n";
if($newto != "0") echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=inbox&amp;rm=$rm&amp;ref=$ref\">Yeni ".$newto." MMS Mektubun var!</a><br/>\n";
if(($msn!="0")or($inb!="0")or($newto!="0"))echo $divide;


$roomselect = @mysql_query ("Select `name` from `rooms` where `rm`='".$rm."';");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];

if($rm!="10")echo "<b>_".$roomname."_</b> (<a href=\"kim.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">".$otaqda."</a>)<br/>";
else echo "<b>_".$topic."_</b><br/>";
if($r_k=="ok"){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep#add\" accesskey=\"1\">Yaz</a>|";
if($rm!="10"){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a>|";
if($mod!="privat")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;mod=privat&amp;ref=$ref\">&#350;exsi</a><br/>\n";
else echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#220;mumi</a><br/>\n";
}
else
{
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a><br/>";
}
}else{
echo "<a href=\"#add\" accesskey=\"1\">Yaz</a>|";

if($rm!="10"){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a>|";
if($mod!="privat")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;mod=privat&amp;ref=$ref\">&#350;exsi</a><br/>\n";
else echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#220;mumi</a><br/>\n";
}
else
{
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"2\">Yenile</a><br/>";
}
}

if ($rm==0){
if ($umni==1)
{
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;r=$ref&amp;vct=0\">Sual&#305; sond&#252;r</a><br/>";
}
else
{
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;r=$ref&amp;vct=1\">Sual&#305; yand&#305;r</a><br/>";
}
}
echo "---";

@$total=$kol-1;
$mread = 0;


if ($smthwr != 0){

$date = $usmes["time"];
$zvv = $usmes["zn"];
$klu4 = $usmes["klu4"];
$name = $usmes["who"];
$usid = $usmes["usid"];
$msg = $usmes["message"];
$time = $usmes["id"];
$th = $usmes["towhom"];
$reng = $usmes["reng"];
if ($smset==0)$msg = preg_replace("|<img[^>]+>|isU", "|smaylik|", $msg);

@mysql_query ("Select * from ignor where usid='".$usid."' and id='".$id."'");
if (mysql_affected_rows() == false){
if($zvv!="")$zvv = "<img src=\"img/z".$zvv.".gif\" alt=\".\"/>";
if ($th == ""){
$msg = str_replace($us."", "<b>".$us."</b>", $msg);
echo "<br/>";
if($r_k=="ok"){$msg = "<span style=\"color: $reng\">$msg</span>";}

if((file_exists("i/".$usid.".gif")&&($rnikler==0))){
if($delmsg==1)echo "[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a>(".$date."):\n".$msg.""; $mread++;
}else{
if($delmsg==1)echo "[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>(".$date."):\n".$msg.""; $mread++;

}
}
else if (($th == $id)||($id == $usid) || ($row['gizlilik'] == 2)){
if($r_k=="ok"){$msg = "<span style=\"color: $reng\">$msg</span>";}

echo "<br/>";
if((file_exists("i/".$usid.".gif")&&($rnikler==0))){
if($delmsg==1)echo "[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a><b>[&#350;exsi]</b>(".$date."):\n".$msg.""; $mread++;
}else{
if($delmsg==1)echo "[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>[&#350;exsi]</b>(".$date."):\n".$msg.""; $mread++;
}
}
}
}
while ($mread < $max){

$lines = mysql_fetch_array ($res);
if($lines===false)break;

$date = $lines["time"];
$zvv = $lines["zn"];
$klu4 = $lines["klu4"];
$name = $lines["who"];
$usid = $lines["usid"];
$msg = $lines["message"];
$time = $lines["id"];
$th = $lines["towhom"];
$hid = $lines["hid"];
$reng = $lines["reng"];
if ($smset==0)$msg = preg_replace("|<img[^>]+>|isU", "|smaylik|", $msg);

@mysql_query ("Select * from ignor where usid='".$usid."' and id='".$id."'");
if ((mysql_affected_rows() == false)&&(($hid != 2)||($id == $usid))){
if($zvv!="")$zvv = "<img src=\"img/z".$zvv.".gif\" alt=\".\"/>";
if ($th == ""){
$msg = str_replace($us."", "<b>".$us."</b>", $msg);
if($r_k=="ok"){$msg = "<span style=\"color: $reng\">$msg</span>";}

if((file_exists("i/".$usid.".gif")&&($rnikler==0))){
if($delmsg==0){
echo "<br/>$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a>(".$date."):\n".$msg."";$mread++;
}else{
echo "<br/>[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a>(".$date."):\n".$msg."";$mread++;
}
}else{
if($delmsg==0){
echo "<br/>$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>(".$date."):\n".$msg."";$mread++;
}else{
echo "<br/>[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>(".$date."):\n".$msg."";$mread++;
}
}
} else {
if (($th == $id)||($id == $usid) || ($row['gizlilik'] == 2) || ($name == $sevgi)){
$msg = str_replace($us."", "<b><i>".$us."</i></b>", $msg);
if($r_k=="ok"){$msg = "<span style=\"color: $reng\">$msg</span>";}

if((file_exists("i/".$usid.".gif")&&($rnikler==0))){
if($delmsg==0){
echo "<br/>$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a><b>[&#350;exsi]</b>(".$date."):\n"
.$msg."";$mread++;

}else{
echo "<br/>[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\"><img src=\"i/".$usid.".gif\" alt=\"$name\"/></a><b>[&#350;exsi]</b>(".$date."):\n"
.$msg."";$mread++;


}
}else{
if($delmsg==0){
echo "<br/>$zvv<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>[&#350;exsi]</b>(".$date."):\n"
.$msg."";$mread++;

}else{
echo "<br/>[<a href=\"del.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;klu4=$klu4$takep\">x</a>]";
echo "$zvv<b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid$takep\">".$name."</a>[&#350;exsi]</b>(".$date."):\n"
.$msg."";$mread++;


}
}
}
}
}
}
$page_next = $max;
echo "<br/>---<br/>";
echo "<a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smayllar</a><br/>\n";
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at otaqlar&#305;</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";
if ($max < $total){
echo "| <a href=\"tarix.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;num=$page_next$takep\" accesskey=\"8\">Tarix</a><br/>";
}else{
echo "<br/>";
}


echo $fsize2;
echo "</p></card>";
echo "<card id=\"add\" title=\"Mesaj yaz\">";
echo "<p>";
echo $fsize1;
echo "&#220;mumi Mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"msg$ref\" maxlength=\"400\" title=\"Text\"/><br/>";
if($row["level"] > 4)
{
echo "<select name=\"shr$ref\" multiple=\"true\">\n";
if ($row["level"]!=6)echo "<option value=\"2\">Alt&#305; Xetli</option>\n";
if ($row["level"]>5)echo "<option value=\"1\">Kursiv</option>\n";
if ($row["level"]>6)echo "<option value=\"3\">Qal&#305;n</option>\n";
if ($row["level"]>8)echo "<option value=\"4\">B&#246;y&#252;k</option>\n";
echo "</select><br/>\n";
}

echo $fsize1;
echo "<anchor title=\"send\">G&#246;nder<go href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" method=\"post\">";
echo "<postfield name=\"msg\" value=\"$(msg$ref)\"/>";
if($row["level"] > 3)echo "<postfield name=\"shr\" value=\"$(shr$ref)\"/>\n";
echo "</go></anchor>";
echo $fsize2;
echo "<br/>";
echo $fsize1;
echo "---<br/>";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Otaqa qay&#305;t</a><br/>";
echo $fsize2;
echo "</p></card>";
echo "</wml>";
ob_end_flush();
?>
