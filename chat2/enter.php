<?php


header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $P_ARR) = check_login($link);
WHO("-","-",BASENAME(__FILE__));
$us=$row["user"];
$sex=$row["sex"];
$level=$row["level"];


//////////////////////////////////// Avtomatik Status verilmesi.
if (($row["posts"]>=1000)&&($row["level"]<1)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=1");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 1; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Xosh Gelmisiniz <b>".$user."</b>!!! Siz chata daxil oldugunuz zaman <b>".$adm."</b> ADMIN size <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','Tebrikler!!!','".$data."','1','1');");
}
if (($row["posts"]>=3000)&&($row["level"]<2)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=2");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 2; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> ADMIN sizi <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','Tebrikler!!!','".$data."','1','1');");
}

if (($row["posts"]>=7000)&&($row["level"]<3)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=3");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 3; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> ADMIN size <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','Tebrikler!!!','".$data."','1','1');");
}
////////////////////////////////////




$time = time()+$vaxt;
mysql_query ("Update users set  time='".$time."', room='30' where id ='".$id."'");
$tm = time();
$de = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."' and `room` = 30;");
$dehl = mysql_result($de, 0);


$engDay = date("l");

switch($engDay){
case "Monday": $rusDay = "Bazar ertesi"; break;
case "Tuesday": $rusDay = "&#199;er&#351;enbe Ax&#351;ami"; break;
case "Wednesday": $rusDay = "&#199;er&#351;enbe"; break;
case "Thursday": $rusDay = "C&#252;me Ax&#351;ami"; break;
case "Friday": $rusDay = "C&#252;me"; break;
case "Saturday": $rusDay = "&#350;enbe"; break;
default: $rusDay = "Bazar"; break;
}

$t=date("H:i:s", mktime(date ("H")+$xsat));
$v=date("d F Y", time());
$v = str_replace("January","Yanvar",$v);
$v = str_replace("February","Fevral",$v);
$v = str_replace("March","Mart",$v);
$v = str_replace("April","Aprel",$v);
$v = str_replace("May","May",$v);
$v = str_replace("June","Iyun",$v);
$v = str_replace("July","Iyul" ,$v);
$v = str_replace("August","Avqust",$v);
$v = str_replace("September","Senytabr",$v);
$v = str_replace("October","Oktyabr",$v);
$v = str_replace("November","Noyabr",$v);
$v = str_replace("December","Dekabr",$v);




ob_start();
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"dehliz\" title=\"Nik: $us / $id\">";
echo "<p align=\"center\">";

$qey = file("file/dat_folder/enter.dat");
$mgs1 = trim($qey[0]);
$mgs2 = trim($qey[1]);
$mgs3 = trim($qey[2]);
$luser = trim($qey[3]);
$lid = trim($qey[4]);
$lses = trim($qey[5]);
$ffoto = trim($qey[7]);
$fusid = trim($qey[8]);
$fuser = trim($qey[9]);
$qeyd = trim( $qey[10] );
$regtime = trim($qey[11]);



$deh=$row['deh_foto'];
$bal=$row['bal'];
$zn=$row['zn'];
$qepiy=$row['qepiy'];
$posts=$row['posts'];
if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";
echo $fsize1;

$qey = file("file/logo/1.dat");
$asef = trim($qey[0]);
if($asef)echo "<img src=\"http://$asef\" alt=\"&#350;ekil\"/><br/>";






echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS</a>: ";
$print = mysql_query("select * from `online_sms` order by id desc LIMIT 1" );
if (mysql_affected_rows() == 0) {
echo "Sevgiyle yasayin...))))<br/>";
//echo  "******<br/> \n";

}
while($arr = @mysql_fetch_array($print)) {
$msgg=$arr['content'];
$uid=$arr['usid'];
$yazan=$arr['login'];
require("smile.php");
$minpos = 500; $nm = 500;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($msgg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=500){
$st1 = substr($msgg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msgg,$minpos+strlen($smiles[$nm]),strlen($msgg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$msgg = $st1.$st2;
}
unset($smiles);
unset($replaces);
echo "".$msgg." (<u>&#304;mza:</u><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$uid."&amp;ref=$ref\">".$yazan."</a>)";
if($id==1)echo " -[<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;go=sil&amp;content=".$arr['id']."&amp;nk=".$uid."&amp;ref=$ref\">Sil</a>]\n";
echo  "<a>   </a><br/> \n";
	} 
echo  "******<br/> \n";


if ($row["sex"] == 0) {
$cinsi = " Bey!";
} else {
$cinsi = " Xan&#305;m!";
}


$Chas=date("H",time());   
$noch="Geceniz Xeyir";
$utro="Sabah&#305;n&#305;z Xeyir";
$den="G&#252;nortan&#305;z Xeyir";
$vecher="Ax&#351;am&#305;n&#305;z Xeyir";
if($Chas==0){echo "$noch";}
if($Chas==1){echo "$noch";}
if($Chas==2){echo "$noch";}
if($Chas==3){echo "$noch";}
if($Chas==4){echo "$noch";}
if($Chas==5){echo "$noch";}
if($Chas==6){echo "$noch";}
if($Chas==7){echo "$utro";}
if($Chas==8){echo "$utro";}
if($Chas==9){echo "$utro";}
if($Chas==10){echo "$utro";}
if($Chas==11){echo "$den";}
if($Chas==12){echo "$den";}
if($Chas==13){echo "$den";}
if($Chas==14){echo "$den";}
if($Chas==15){echo "$den";}
if($Chas==16){echo "$den";}
if($Chas==17){echo "$den";}
if($Chas==18){echo "$vecher";}
if($Chas==19){echo "$vecher";}
if($Chas==20){echo "$vecher";}
if($Chas==21){echo "$vecher";}
if($Chas==22){echo "$vecher";}
if($Chas==23){echo "$noch";}
if($Chas==24){echo "$noch";}
echo " $zn<b><u>$us</u></b> $cinsi<br/>\n";

$bugunpost = $row["bugunpost"];
if ( $bugunpost<100 ){
$rx= "100";

$rp= $rx-$bugunpost;

echo "<u>$bugunpost post</u>+<u>$rp post</u>= <b>2</b>Bal)<br/>\n"; 
}elseif ( $bugunpost<200 ){

$rx= "200";

$rp= $rx-$bugunpost;

echo "<u>$bugunpost post</u> + <u>$rp post</u> = 5 Bal<br/>\n"; 
}elseif ( $bugunpost<300 ){

$rx= "300";

$rp= $rx-$bugunpost;

echo "Bu g&#252;n <u>$bugunpost post</u>-toplam&#305;san.<b>10 bal</b> elde etmek &#252;&#231;&#252;n <u>$rp post</u>-toplamal&#305;san.<br/>\n"; 
}else{
echo "Bu g&#252;n <b>$bugunpost</b>-post toplam&#305;san.Gece 24:00-da Otaqdak&#305; postlar s&#305;f&#305;rlanacaq.<br/>\n"; 
}
$yeni = $row["time_active"];

echo  "---<br/> \n";

$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 

echo "Aktivliyiniz:(<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=akt_us&amp;nk=$id&amp;ref=$ref\">".$saat_tam.":".$deqiqe."</a>) deqiqe!<br/>"; 


echo "<a href=\"hesab.php?bolme=img_view&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sende &#246;z&#252;n&#252; G&#246;ster</a><br/>\n";

$dir_photos=opendir("photos/".$fusid."/");
$photo_rand=false;
while($ac_r=readdir($dir_photos)){
if($ac_r!="." && $ac_r!="..") $photo_rand.=$ac_r."```";
}
$arr_p=explode("```",$photo_rand);$mx_s=count($arr_p);$rand_photo=rand(0,$mx_s);if($arr_p[$rand_photo]=="") $arr_p[$rand_photo]=$arr_p[0];

if(($deh!="0")&&($ffoto!="")&&($regtime>time()))echo "Foto Deaktivdir [<a href=\"cabinet.php?go=img_ca&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">+</a>]<br/>";
if(($ffoto!="")&&($deh!="1")&&($regtime>time())){
echo "<img src=\"image.php?img=photos/$fusid/$arr_p[$rand_photo]&amp;size=90\" alt=\"$fuser\"/><br/>\n";
echo "<a href=\"hesab.php?bolme=img_view&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$fuser</a>\n";
if($row["level"]==9)echo "[<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;del=ok&amp;ref=$ref\">Sil</a>]\n";
$qeyd = trim($qey[10]);
if($qeyd){
echo " <br/><b>Metn</b>: <u>$qeyd</u> [<a href=\"cabinet.php?go=img_c&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bagla</a>]<br/>";
}else{
echo "[<a href=\"cabinet.php?go=img_c&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bagla</a>]<br/>";
}
}


echo  "---<br/> \n";
if($mgs1)echo "<img src=\"http://$mgs1\" alt=\"&#350;ekil\"/><br/>";
if($mgs2)echo "$mgs2<br/>";
if($mgs3)echo "$mgs3<br/>";

$qey = file("file/logo/1.dat");
$asef = trim($qey[0]);
if($asef)echo "<img src=\"http://$asef\" alt=\"&#350;ekil\"/><br/>";


$svadbi=mysql_fetch_array(mysql_query ("select count(id) as num from svadbi"));
if (".$svadbi[0].">0)echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;$ref\">&#199;atda Toy OlacaQ</a><br/>\n";


echo "".$v."";
echo "-".$rusDay."<br/>";
echo "Saat: ".$t."";
echo "<br/>";
print "-=^-^=-<br/>";

if($lid=="colse"){}
elseif($lid!=""){echo "<b>LiDeR</b>: <a href=\"beyenilen.php?id=$id&amp;ps=$ps&amp;nk=$lid&amp;ref=$ref\">".$luser."</a>";
echo " (<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$lses."</a>-ses)<br/>";
}
else
{
echo "Sevimli: <a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfo Ol</a><br/>";
}
$yeni = $row["bal_time1"];
$deqiqe_hesab = $yeni  / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
$ba="60";
$bal_time1= $deqiqe - $ba;
echo "<u>10 $ne_qeder Bal &#252;&#231;&#252;n  $bal_time1 deqiqe qal&#305;b!</u><br/>\n";

$se= mysql_fetch_array(mysql_query("Select count(id) as num from qefes"));
$sn = $se["num"];

if(file_exists("file/qefes/0_aktiv.dat")){
$qefes=file("file/qefes/0_aktiv.dat");
$gun=date("w");
$datgun = trim($qefes[0]);
$datmesaj = trim($qefes[1]);
echo "$datmesaj\n";
if ($datgun!=$gun){
@rename('file/qefes/0_aktiv.dat','file/qefes/0_deaktiv.dat');
}
}
echo "<b><a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual-QefeS-Oyunu</a></b><br/>\n";
if(file_exists("file/qefes/qefes.dat")){
$colseds=file("file/qefes/qefes.dat");
$close = trim($colseds[0]);//0 startet
if($close==0){
$us1 = mysql_query ("select `user`,`uid`,`ses` from `qefes` where `off` ='0' order by `ses` DESC limit 0,1");
if (mysql_affected_rows() != 0) {
$u_s1 = mysql_fetch_array($us1);
echo "Hal hazirda Qefes oyununda lider: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$u_s1['uid']."&amp;ref=$ref\">".$u_s1['user']."</a> (<b>".$u_s1['ses']."</b> ses)<br/>\n";
$us1 = mysql_query ("select `user`,`uid`,`ses` from `qefes` where `off` ='0' order by `ses` ASC limit 0,1");
$u_s1 = mysql_fetch_array($us1);
echo("<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$u_s1['uid']."&amp;ref=$ref\">".$u_s1['user']."</a> ise  (<b>".$u_s1['ses']."</b> ses) ile oyunu terk edecek.<br/>\n");
//echo"---<br/>";
}
}
}

echo"*****<br/>";
$q = mysql_query("SELECT * FROM `down_files`;");
$files = mysql_num_rows($q);
if($down!='1')echo " <a href=\"down.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Pulsuz -Y&#252;klemeler</b></a> (".$files.")<br/>\n";
echo  "<a href=\"hekaye.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Hekayeler</a>(18+) I \n";
echo  "<a href=\"sosial.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qruplasma</a><br/>\n";
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal\">Bal hesabivi artir</a><br/>\n";
echo  "<a href=\"funklar.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Funksiyalar>></b></a><br/>\n";


echo $fsize2;
echo "</p>";
echo "<p align=\"left\">";
echo $fsize1;

$level=$row["level"];
$levelselect = @mysql_query ("Select name from levels where level='".$level."'");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];


if($id==1)echo " <a href=\"auto.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>AuTo Panel</b></a> / ";
if($id==1)echo " <a href=\"datpan.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>DaTer Panel</b></a><br/>";
if($id!==1)echo "<a href=\"error.php?go=error&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>ERROR_Panel</b></a><br/>";
if($P_ARR[35]==1)echo "<a href=\"arek.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti Reklam</a>I\n";
if(file_exists("file/select/".$id.".reg") AND $P_ARR[3]==1){
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a><br/>\n";
echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Security Panel</a> <br/> \n";

}
if(file_exists("file/select/".$id.".reg") AND $P_ARR[3]==1 AND $P_ARR[0]==1) {
    echo "";
}
if($P_ARR[0]==1){
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$levelname Panel</a></b><br/>\n";
}
else if($P_ARR[3]==1){
echo "<br/>";
}
if ($P_ARR[0]==1 and $P_ARR[5]==1){
$seb = @mysql_query ("Select count(id) from sikayet;");
$red = mysql_result($seb, 0);
echo "<a href=\"s_c.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ikayeT</a>-<b>(</b>".$red."<b>)</b>I\n";
}
if ($P_ARR[4]==1 and $P_ARR[203]==1){
$msb = @mysql_query ("Select count(*) from reklam;");
$mred = mysql_result($msb, 0);
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reklam</a>-<b>(</b>".$mred."<b>)</b><br/>\n";
}
if($P_ARR[0]==1 OR $P_ARR[44]==1 OR $P_ARR[35]==1 OR $P_ARR[3]==1 OR $P_ARR[5]==1 OR $P_ARR[203]==1 OR $id==1)echo "---<br/>";

















$userm = mysql_query ("select count(id) as num from users where `bal` > '0' $table_banned;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];


$actual_q = mysql_query( "SELECT * FROM `sh_tem` WHERE `close`='0' and `tesdiq`='2' order by rand() limit 1" );
while ( $actual = mysql_fetch_array( $actual_q ) )
{
$posl_post = mysql_fetch_array( mysql_query( "SELECT * FROM `sh_post` WHERE `tema`='{$actual['id']}' order by rand() limit 1;" ) );
$postov = mysql_num_rows( mysql_query( "SELECT * FROM `sh_post` WHERE `tema`='{$actual['id']}' ORDER BY `date` DESC;" ) );
$us_av = mysql_query( "SELECT * FROM `users` WHERE `id`='{$posl_post['avtor']}'" );
$user_avtor = mysql_fetch_array( $us_av );

echo "&#xbb; <u>Fikir Bildir</u>: <a href=\"forum.php?id=$id&amp;ps=$ps{$mygetname}&amp;cmd=4&amp;uid=".$actual['id']."&amp;ref={$ref}\">{$actual['name']}({$postov})</a><br/>\n";
echo $divide;


}


$cmc = mysql_query ("select count(id) as num from vstrechi WHERE 1;");
$cmac = mysql_fetch_array($cmc);
$cmtot = $cmac["num"];

if ($cmtot[0]>0)echo  "<b><a href=\"gorushler.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;at&#305;n G&#246;r&#252;&#351;&#252; Olacaq</a></b><br/>\n";


$idnews=mysql_fetch_array(mysql_query("SELECT MAX(id) FROM news"));
if ($idnews[0]>0) $news=mysql_fetch_array(mysql_query("SELECT date FROM news where id=$idnews[0]"));
if (isset($news[0])) {
echo "&#xbb; <u>Yeni Xeber</u>: <b><a href=\"news.php?id=$id&amp;ps=$ps&amp;ref=$ref\">(".$news[0].")</a></b><br/>";

}

$q = mysql_query("select id,title from obiav order by id desc;");
while($arr=mysql_fetch_array($q)) {
echo "&#xbb; <u>Elan</u>: <a href=\"view_obiav.php?id=$id&amp;ps=$ps&amp;mid=".$arr['id']."&amp;ref=$ref\">".$arr['title']."</a><br/>";
}
$a = @mysql_query("select id,name,date from votes");
while($arr=mysql_fetch_array($a)){
$name=$arr['name'];
$date=$arr['date'];
$bid=$arr['id'];
$votes = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$bid."'"));
echo "&#xbb; Sor&#287;u:<u></u> <a href=\"votes.php?id=$id&amp;ps=$ps&amp;mode=view&amp;$ses&amp;mid=$bid&amp;$ref\">$name</a> -(".$votes[0].")";
if ($level>8) echo " [<a href=\"votes.php?id=$id&amp;ps=$ps&amp;mode=del&amp;mid=$bid&amp;$ref\">Sil</a>] [<a href=\"votes.php?mode=edit&amp;id=$id&amp;ps=$ps&amp;mid=$bid&amp;$ref\">Deyi&#351;</a>]";
echo"<br/>";
}
echo  "<br/>";




$sele = mysql_query("SELECT COUNT(*) FROM `d_teklif` WHERE usid = '".$id."';");
$teklif = mysql_result($sele, 0);


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

if ($teklif!=0) echo "<b>&#xbb; <a href=\"friends.php?id=$id&amp;ps=$ps&amp;go=offer&amp;ref=$ref\">Yeni ".$teklif." Dostluq Teklifi Gelib!</a></b><br/>\n";
if($inb != "0") echo "<b>&#xbb; <a href=\"mektub.php?bol=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yeni ".$inb." Mektub var!</a></b><br/>\n";
if($msn != "0") echo "<b>&#xbb; <a href=\"m_1.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yeni ".$msn." Mesaj&#305;n&#305;z var!</a></b><br/>\n";
if($newto != "0") echo "<b>&#xbb; <a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=inbox&amp;ref=$ref\">Yeni ".$newto." MMS Mektubun var!</a></b><br/>\n";
if(($msn!="0")or($inb!="0")or($newto!="0")or($teklif!="0"))echo $divide;

$r2 = mysql_query ("select count(klu4) as num from zapiski WHERE (idtowhom = '".$id."')and(ininc = '1')");
$a2 = mysql_fetch_array($r2);
$inball = $a2["num"];


$r3 = mysql_query ("select count(klu4) as num from mesaj WHERE (idtowhom = '".$id."')and(ininc = '1')");
$a3 = mysql_fetch_array($r3);
$mnball = $a3["num"];
echo "&#xbb; <a href=\"top.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Top-10</a><br/>\n";
echo "&#xbb; <a href=\"vezife.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Idare Heyyeti</a><br/>\n";
echo "&#xbb; <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=varli&amp;ref=$ref\">CHAT`in En Varlilari*</a><br/>\n";
$savik2 = mysql_query("SELECT COUNT(`id`) FROM `sh_tem` WHERE `tesdiq` = '2';");
$all_for = mysql_result($savik2, 0);
echo "&#xbb; <a href=\"forum.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Forum($all_for)</a> I\n";
$q3 = mysql_query("SELECT COUNT(`id`) FROM `etiraf_text` WHERE `icaze` = '0';");
$all_eti = mysql_result($q3, 0);
echo "<a href=\"etiraf/index.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Etiraflar</a><br/>\n";
$new_g = mysql_query("SELECT COUNT(id) FROM football WHERE foot_status='0';");
$new_games = mysql_result($new_g, 0);
echo "&#xbb; <a href=\"football.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Futbol proqnoz</a>($new_games)<br/>\n";

echo "&#xbb; <b><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a></b><br/>\n";

$donamor = file("file/dater/4.dat");
$xxx = trim($donamor[0]);

echo "$xxx ID Nomrem : <b>$id</b><br/>\n";
echo "$xxx Hesab BaL : ";
if ($bal>5){
echo "<b>$bal</b><br/>";
}else{
echo "<b>$bal</b><br/>";

}
echo "$xxx Cemi Postum : <b>$posts</b><br/>\n";
echo "$xxx Cemi QePiY : <b><a href=\"qepiy.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$qepiy</a></b><br/>\n";

print $divide;


$tm = time();
$usersm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='0' and time> '".time()."'"));
$usersj=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='1' and time> '".time()."'"));
$cemi=$usersj[0]+$usersm[0];
$asef = file("file/dater/5.dat");
$al = trim($asef[0]);
$asef = file("file/dater/2.dat");
$a0 = trim($asef[0]);
$a1 = trim($asef[1]);
$a2 = trim($asef[2]);
$a3 = trim($asef[3]);
$a4 = trim($asef[4]);
$a5 = trim($asef[5]);
$a6 = trim($asef[6]);
$a7 = trim($asef[7]);
$a8 = trim($asef[8]);
$a9 = trim($asef[9]);
$a10 = trim($asef[10]);
$a11 = trim($asef[11]);
$a12 = trim($asef[12]);
$a13 = trim($asef[13]);
$a14 = trim($asef[14]);
$a15 = trim($asef[15]);
echo "$al <a href=\"enter.php?id=$id&amp;ps=$ps&amp;r=$ref\">$a0</a><br/>";
echo  "$al <a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a1</a>(<b>$cemi</b>)<br/>\n";
echo  "$al K: <a href=\"on.php?c=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$usersm[0]."</a>\n";
echo  "Q: <a href=\"on.php?c=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$usersj[0]."</a><br/>\n";

echo  "$al <a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a2</a><br/>\n";
echo  "$al <a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a3</a><br/>\n";
echo  "$al <a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a4</a><br/>\n";

$usms = mysql_fetch_array(mysql_query ("select count(klu4) as num from friends where id ='".$id."';"));
$dost = $usms["num"];
echo  "$al <a href=\"friends.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a5</a>(".$dost.")<br/>\n";


echo $divide;

echo  "$al <a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a6</a>(<b>$msn/$mnball</b>)<br/>\n";
echo  "$al <a href=\"mektub.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a7</a>(<b>$inb/$inball</b>)<br/>\n";
echo  "$al <a href=\"mms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a8</a>(<b>$newto/$to</b>)<br/>\n";
echo $divide;

$gallery = mysql_query ("select count(id) as num from albom");
$foto = mysql_fetch_array($gallery);
$fotog = $foto["num"];
echo  "$al <a href=\"galery.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a9</a>(<b>".$fotog."</b>)<br/>";
echo  "$al <a href=\"oyunlar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a10</a><br/>";
echo $divide;

echo  "$al <a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a11</a><br/>";
$gallery = mysql_query ("select count(id) as num from albom");
$foto = mysql_fetch_array($gallery);
$fotog = $foto["num"];

$sm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM smiles "));
$smile=$sm[0];
echo  "$al <a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a12</a><br/>";
echo  "$al <a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a13</a><br/>";


$sm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM smiles "));
echo  "$al <a href=\"stat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$a14</a><br/>";
$curdate=date("d-m-Y");
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(id) from users WHERE date = '".$curdate."' and banned!='2'"));
echo "$al <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=yeni&amp;ref=$ref\">$a15</a> ($newtoday[0]) <br/>\n";



echo $divide;


echo "$al <a href=\"http://$site/?$ref\">$site</a><br/>";

echo $fsize2;
echo "</p></card></wml>";
ob_end_flush();
mysql_close($link);
?>