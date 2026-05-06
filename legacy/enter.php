<?php
require("inc.php");
error_reporting('7');
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

$us=$row["user"];
$sex=$row["sex"];
$level=$row["level"];
$st_bal_count=$row["st_bal_count"];
$st_bal_count1=$row["st_bal_count1"];
function online_duraki(){
   $users = mysql_query("select count(1) from `card_users` where `time`>'".(time()-300)."';");
    return mysql_result($users,0);
}
if (($row["posts"]>=1000)&&($row["level"]<1)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=1");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 1; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]",$SERVER_TIME);
$message = "Xosh Gelmisiniz <b>".$user."</b>!!! Siz chata daxil oldugunuz zaman <b>".$adm."</b> Admin size <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Tebrikler!!!','".$data."','1','1');");
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
$data = date("d-M-Y [H:i]",$SERVER_TIME);
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> Admin sizi <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Tebrikler!!!','".$data."','1','1');");
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
$data = date("d-M-Y [H:i]",$SERVER_TIME);
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> Admin size <b>".$levelname."</b> statusunu teyin edir.";
mysql_query("insert into zapiski values(0,'".$adm."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','Tebrikler!!!','".$data."','1','1');");
}

if($row['room']!='30'){
mysql_query ("Update users set  room='30' where id ='".$id."';");
}



$engDay = date("l",$SERVER_TIME);


if($row["dehlizi"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
 echo "<b>Diqqet.! </b> Siz Cezalisiniz Dehlize Daxil Ola Bilmezsiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Otaqlar</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
ob_start();
$_v->title('Nik: '.$us.' / '.$id,'center');
require("file/dat_folder/n_n/nikod.php");


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
$regtime = trim($qey[11]);

$bal=$row['bal'];
$zn=$row['zn'];
$posts=$row['posts'];
if($zn!='')$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";
$_v->fsize1($fsize1);

if($p_arr['0']!=1){
if($id=='1' and $row['level']=='9')
echo "<a href=\"auto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Auto Panel</a><br/>----<br/>\n";
}



if($p_arr['35']==1 and ($p_arr['105']==1 or $p_arr['106']==1 or $p_arr['107']==1)){
$all_reklam = mysql_result(mysql_query("SELECT COUNT(`banmsg`) FROM `auto_ban_v2`;"),0);
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti Reklam</a>-($all_reklam)\n";
if($id ==1)echo " | <a href=\"a-search.php?id=$id&amp;ps=$ps&amp;ref=$ref\">R-Axtar</a>\n";
print '<br/>';
}


if($p_arr['3']==1){
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Paneli</a> |\n";
}
if($p_arr['0']==1)
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b><br/>\n";
if($p_arr['5']==1){
$seb = @mysql_query ("Select count(`id`) from `sikayet`;");
$red = mysql_result($seb, 0);
echo "<a href=\"s_c.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ikayetler</a>-<b>(</b>".$red."<b>)</b><br/>\n";
}
if($p_arr['203']==1){
$msb = @mysql_query ("Select count(*) from `reklam`;");
$mred = mysql_result($msb, 0);
echo "<a href=\"reklam.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mektub reklam</a>-<b>(</b>".$mred."<b>)</b><br/>\n";
}
$usersm=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where qeyd_micro='0';"));
$cemi=$usersm[0];
if($id=='1')echo " <a href=\"rehberlik.php?nn=669&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tesdiq Gozleyen</a>-(<b>".$cemi."</b>)<br/>\n";
if($id=='1')echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Rehberlik Paneli</b></a><br/>\n";

if($p_arr['0']==1 or ($p_arr['35']==1 and ($p_arr['105']==1 or $p_arr['106']==1 or $p_arr['107']==1)) or $p_arr['3']==1 or $p_arr['0']==1 or $p_arr['203']==1)
echo "---<br/>";
$sql = mysql_query("SELECT * FROM `AN_reklam` where harda = '2' and mud > '".time()."' ORDER BY `id` asc;");
if(mysql_num_rows($sql) != 0) {
while($EH_s = mysql_fetch_array($sql))
{
echo "Reklam: <a href=\"http://".$EH_s["urlu"]."\">".$EH_s["adi"]."</a> - ".$EH_s["shuar"]."<br/>";
}
echo $divide;
}

if ($number_47 != 'x')echo "<a href=\"elaqe.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_47."</a><br/>----<br/>\n";

if ($number_45 != 'x') {
echo "<b>".$number_45."</b><br/>\n";
$q = mysql_query("SELECT `id`,`user`,`time_active` FROM `users` WHERE `time_active` > '0' ORDER BY `time_active` DESC LIMIT 1;");
while($nick = mysql_fetch_array($q))
{ 
$yeni = $nick['time_active'];
// Saat 
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
echo "<img src=\"img/1.gif\" alt=\".\"/><a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=".$nick['id']."&amp;nocache=$nocache\">".$nick['user']."</a> (".$saat_tam.":".$deqiqe." deqiqe)<br/>----<br/>";
} 
}

echo "Xo&#351; G&#601;lmisiniz $zn<b>$us</b><br/>\n";
echo "---<br/>";
if ($number_29 != 'x')echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_29."</a> (".ac_user_time($row['time_active'])." deqiqe)<br/>\n";
/*
echo " ".$number_13.": <a href=\"id_al.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$id</a> | \n";
echo "".$number_14.": <a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$bal</a> | \n";
echo "".$number_15." : <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=10post&amp;ref=$ref\">$posts</a><br/>\n";
*/
if($row['st_bal_count']>0) {

	echo "<u>".$row['st_bal_count']." bal qazanmaq &#252;&#231;&#252;n <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".(60-$row['st_bal_time'])." deqiqe</a>   qal&#305;b.</u><br/>";
//echo "----<br/>";

}


#if($yer=='1' and $bonusm=='1'){echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=missia&amp;ref=$ref\">Missia Statistikam:</a>\n";
#mission($row['action']);}


#echo "----<br/>";

if ($number_1 == 1) {
	#require("onlinesms.php");
	#echo $divide;
}
/*
echo "Xo&#351; Gelmisiniz $zn<b>$us</b><br/>\n";
$nihad_niko= 60-$row[st_bal_time];
if($row['sex']==1){
if($st_bal_count1!="0")echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>$row[st_bal_count1] bal &#252;&#231;&#252;n</b>  $nihad_niko deqiqe qal&#305;b</a><br/>\n";
}
if($row['sex']==0){
if($st_bal_count!="0")echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>$row[st_bal_count] bal &#252;&#231;&#252;n</b>  $nihad_niko deqiqe qal&#305;b</a><br/>\n";
}
*/


if ($number_2 != 'x') {
echo "<a href=\"hesab.php?bolme=img_view&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_2."  (".bal_bot(16)." bal)</a><br/>\n";

if(is_numeric($fusid)) {
		$albom=false;
		$albom->dir=opendir("photos/".$fusid."/");
		while($albom->file=readdir($albom->dir)) {
			if($albom->file!='.' && $albom->file!='..') $albom->files[]=$albom->file;
		}
	if(is_array($albom->files)) {
		$albom->this = $albom->files[array_rand($albom->files)];


$qa = mysql_query("select * from albom where idfoto = '".$fusid."' order by rand() desc limit 0,1;");
while ($a2 = mysql_fetch_array($qa))
{
$photo=$a2['photo'];
$qeyd=$a2['info'];
$fid = $a2["id"];
$idfoto=$a2['idfoto'];

$userm = mysql_query ("select count(id) as num from albom_fikir where `key`='".$fid."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
$usermm = mysql_query ("select count(id) as numm from albom_down where `id_albom`='".$fid."';");
$usmm = mysql_fetch_array($usermm);
$numm = $usmm["numm"];
}

	$ffoto = false;
	$q = mysql_query("SELECT * FROM `albom` WHERE `photo` = '".$photo."';");
	if (mysql_affected_rows() == 0)
	{
	}
	else
	{
		$arr = mysql_fetch_array($q);
		$ffoto=$arr['idfoto'].'/'.$arr['photo'];

		if (file_exists("photos/".$ffoto.""))
		{

echo "<img style=\"border-radius: 50px;\" src=\"slide.php\" alt=\"$fuser\"/><br/>\n";
$a_down = mysql_fetch_object(mysql_query ("SELECT COUNT(`id`) as `num` FROM `albom_down` WHERE `id_albom` ='{$arr['id']}';"));
echo "<a href=\"hesab.php?bolme=img_view&amp;id=$id&amp;ps=$ps&amp;photo={$arr['photo']}&amp;ref=$ref\">$fuser</a> ";
if($row["level"]==9)echo " [<a href=\"hesab.php?bolme=imgview&amp;id=$id&amp;ps=$ps&amp;del=1&amp;ref=$ref\">x</a> ]";

$a_downn = mysql_fetch_object(mysql_query ("SELECT COUNT(`id`) as `numm` FROM `albom_fikir` WHERE `key` ='{$arr['id']}';"));

echo "<br/><a href=\"img_a.php?bol=4&amp;id=$id&amp;ps=$ps&amp;key={$arr['id']}&amp;ref=$ref\">&#350;erhler({$a_downn->numm})</a> - 
<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=down&amp;key={$arr['id']}&amp;ref=$ref\">Y&#252;klendi({$a_down->num})</a><br/>\n";
}
}
$usms = mysql_fetch_array(mysql_query ("select count(`id`) as `num` from `foto_beyen` where `uid` ='{$arr['idfoto']}';"));
$like = $usms["num"];
$beyen = "<a href=\"fotolike.php?id=$id&amp;ps=$ps&amp;bc=6&amp;uid={$arr['idfoto']}&amp;ref=$ref\">Beyen</a> <img src=\"img/l.png\" alt=\".\"/> <a href=\"fotolike.php?id=$id&amp;ps=$ps&amp;bc=7&amp;uid={$arr['idfoto']}&amp;ref=$ref\">$like</a>";

$sqleh = mysql_query("select id from foto_fikir where uid = '{$arr['idfoto']}'");
$fikir = mysql_num_rows($sqleh);
$fik = "($beyen &#8226; <a href=\"fotolike.php?bc=5&amp;id=$id&amp;ps=$ps&amp;uid={$arr['idfoto']}&amp;ref=$ref\">Fikir-$fikir</a> <img src=\"img/comment.png\" alt=\".\"/>)";
echo $fik;
//echo "<br/>";
//echo trim($qey[10]);
}
echo "<br/>";
}
}


////elave son



if ($number_44 != 'x')echo "".$number_44."<br/>\n";

switch($engDay){
case "Monday": $rusDay = "Bazar ertesi"; break;
case "Tuesday": $rusDay = "&#199;er&#351;enbe Ax&#351;ami"; break;
case "Wednesday": $rusDay = "&#199;er&#351;enbe"; break;
case "Thursday": $rusDay = "C&#252;me Ax&#351;ami"; break;
case "Friday": $rusDay = "C&#252;me"; break;
case "Saturday": $rusDay = "&#350;enbe"; break;
default: $rusDay = "Bazar"; break;
}

$t=date("H:i:s",$SERVER_TIME);
$d=date("d F Y", $SERVER_TIME); 
$d = str_replace("January","Yanvar",$d);
$d = str_replace("February","Fevral",$d);
$d = str_replace("March","Mart",$d);
$d = str_replace("April","Aprel",$d);
$d = str_replace("May","May",$d);
$d = str_replace("June","Iyun",$d);
$d = str_replace("July","Iyul" ,$d);
$d = str_replace("August","Avqust",$d);
$d = str_replace("September","Senytabr",$d);
$d = str_replace("October","Oktyabr",$d);
$d = str_replace("November","Noyabr",$d);
$d = str_replace("December","Dekabr",$d);
if ($number_51 == 1) {
echo $d."\n"; 
echo "-".$rusDay."<br/>\n";
echo "Saat: ".$t."\n";
echo "<br/>\n";
echo "-=^-^=-<br/>\n";
}
#require("logo1.php");
if($mgs1)echo "<img src=\"http://$mgs1\" alt=\"&#350;ekil\"/><br/>\n";
if($mgs2)echo "$mgs2<br/>\n";
if($mgs3)echo "$mgs3<br/>\n";

$svadbi=mysql_fetch_array(mysql_query ("select count(`id`) as `num` from svadbi;"));
if ($svadbi[0]>0)echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;$ref\">&#199;atda Toy Olacaq</a><br/>\n";
/*
if($lid=="colse"){}
elseif($lid!=""){echo "<b>Lider</b>: <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$lid&amp;red=$ref\">".$luser."</a>\n";
echo " (<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$lses."</a>-ses)<br/>\n";
}
else
{
echo "G&#252;n&#252;n <a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Lideri Ol</a><br/>\n";
}*/


#require("file/dat_folder/show_foto.inc");
if($footo[aktiv] == 1){


echo $divide;
echo "<a href=\"show_foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b>&#350;ekil Yari&#351;masi</b></a><br/>\n";
 $style = "style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\"";

$curdate=date("d-m-Y");
	$resu = @mysql_query ("Select id,idfoto,photo,vote from show_foto where `date` = '".$curdate."' order by vote desc limit 0,1;");
if (mysql_affected_rows() == 0) {

}
$i = 1;
while ($raa = mysql_fetch_array($resu))
{
	$idi=$raa["idfoto"];
$photo=$raa["photo"];
$idfoto=$raa["idfoto"];
$ses=$raa["vote"];
$key=$raa["id"];
	$qus = mysql_query ("Select user from users where id = '".$idi."'");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user=$ind["user"];

$ud = "<img src=\"img/1.gif\" alt=\"1\"/>";

echo "<img $style src=\"image.php?img=show_foto/$photo&amp;size=100\" alt=\"$u_user\"/><br/>".$u_user." <a href=\"show_foto.php?act=ses&amp;id=$id&amp;ps=$ps&amp;key=$key&amp;ref=$ref\">($ses ses)</a><br/>";
}
}

}



if ($number_4 != 'x') {
echo "---<br/>";
if(file_exists("file/qefes/0_aktiv.dat")){
$qefes=file("file/qefes/0_aktiv.dat");
$gun=date("w",$SERVER_TIME);
$datgun = trim($qefes[0]);
$datmesaj = trim($qefes[1]);
echo "$datmesaj\n";
if ($datgun!=$gun){
@rename('file/qefes/0_aktiv.dat','file/qefes/0_deaktiv.dat');
}
}
echo "<b><a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_4."</a></b><br/>---<br/>\n";
if(file_exists("file/qefes/qefes.dat")){
	$colseds=file("file/qefes/qefes.dat");
	$close = trim($colseds[0]);//0 startet
	if($close==0)
	{
		$us1 = mysql_query ("select `user`,`uid`,`ses` from `qefes` where `off` ='0' order by `ses` DESC limit 0,1");
		if (mysql_affected_rows() != 0) {
		 $_v->html('<div class="my sms">');
			$u_s1 = mysql_fetch_array($us1);
			echo "Hal hazirda Qefes oyununda lider: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$u_s1['uid']."&amp;ref=$ref\">".$u_s1['user']."</a> [".$u_s1['ses']." ses]<br/>\n";
			$us1 = mysql_query ("select `user`,`uid`,`ses` from `qefes` where `off` ='0' order by `ses` ASC limit 0,1");
			$u_s1 = mysql_fetch_array($us1);
			echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$u_s1['uid']."&amp;ref=$ref\">".$u_s1['user']."</a> ise  [".$u_s1['ses']." ses] ile oyunu terk edecek.<br/>";
		 $_v->html('</div>');
		}
	}
}
}



if ($number_39 != 'x'){
echo "---<br/>";
if ($number_3 != 'x')echo "<b><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal&amp;ref=$ref\">".$number_3."</b></a> | \n";
if ($number_8 != 'x')echo "<b><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_8."</a></b><br/>\n";

if($mafia != 'x'){
$a_id = mysql_query("SELECT * FROM `mafia` WHERE `id` = '1';");
$a_info = mysql_fetch_array($a_id);
if(!$a_info['act'] || $id == 1){
$aktiv_uzv = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '1' and `mafia_cp` = '0';");
$uzv = mysql_num_rows($aktiv_uzv);
echo "<a href=\"mafia.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mafia Clan</a> ($uzv) | ";
}}
echo "<a href=\"domino.php?id=$id&amp;ps=$ps&amp;r=$ref\">101 Domino</a> (Yeni) <br/>\n";


echo "<a href=\"cards.php?id=$id&amp;ps=$ps&amp;r=$ref\">".$number_39."</a> (".online_duraki().")  | \n";

$o = mysql_query("SELECT COUNT(*) FROM `mduel` WHERE `devet` = '2' and `dtime` > '".time()."';");
$obwi = mysql_result($o, 0);
if ($number_34 != 'x')echo "<a href=\"mduel.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">".$number_34."</a>-(<b>$obwi</b>)<br/>\n";
}

$_v->align('left');

$q = mysql_query("select `id`,`title` from `obiav` order by `id` desc;");
while($arr=mysql_fetch_array($q)) {
echo "<u><img src=\"img/oxu.gif\" alt=\"oxu\"/></u><b>Elan: </b><a href=\"view_obiav.php?id=$id&amp;ps=$ps&amp;mid=".$arr['id']."&amp;ref=$ref\">".$arr['title']."</a><br/>\n";
$br = "---<br/>";
//echo "<br/>";
}

$a = @mysql_query("select `id`,`name`,`date` from `votes`;");
if (mysql_affected_rows() != 0){
while($arr=mysql_fetch_array($a)){
$name=$arr['name'];
$date=$arr['date'];
$bid=$arr['id'];
$votes = mysql_fetch_array(@mysql_query("select count(`klu4`) as `num` from `voting` where `vote`='".$bid."';"));
echo "<u><img src=\"img/oxu.gif\" alt=\"oxu\"/></u> <a href=\"votes.php?id=$id&amp;ps=$ps&amp;mode=view&amp;mid=$bid&amp;ref=$ref\">$name($votes[0])</a>";
echo"<br/>";
}
}
$dd = mysql_query ("select count(did) as num from mduel WHERE `dkimle` = '".$id."' and `devet` = '1'");
$db = mysql_fetch_array($dd);
$dbil = $db["num"];
if ( $dbil != '0' ) echo "&#187; (<b>".$dbil."</b>) <a href=\"mduel.php?moko=dvlr&amp;id=$id&amp;ps=$ps&amp;r=$ref&amp;rm=10\">Yeni duel devetiniz var</a><br/>\n";
$sele = mysql_query("SELECT COUNT(*) FROM `d_teklif` WHERE `usid` = '".$id."';");
$teklif = mysql_result($sele, 0);
if ($teklif!=0) echo " <br/>&#xbb;(".$teklif.") <a href=\"friends.php?id=$id&amp;ps=$ps&amp;go=offer$takep\">Yeni Dostluq Teklifi</a> var!<br/>\n";

$r = mysql_query ("select count(`readd`) as `num` from `zapiski` WHERE (`idtowhom` = '".$id."')and(`readd` = '0')and(`ininc` = '1');");
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

if($msn != "0") echo "&#xbb;(<b>".$msn."</b>) <a href=\"mesaj.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yeni Mesaj&#305;n&#305;z</a> var!<br/>\n";
if($newto != "0") echo "&#xbb;(<b>".$newto."</b>) <a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=inbox&amp;ref=$ref\">Yeni MMS Mektubun</a> var!<br/>\n";
if(($msn!="0")or($inb!="0")or($newto!="0")or( $dbil != '0' ))echo "---<br/>\n";

if ($number_48 != 'x')echo  "&#xbb; <a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_48."</a><br/>\n";
if ($number_49 != 'x')echo  "&#xbb; <a href=\"meqa.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_49."</a><br/>\n";
if ($number_48 != 'x' or $number_49 != 'x'){
echo "---<br/>\n";
}
#$_v->html('<div class="mlink">');
if ($number_41 != 'x')echo "<b>&#xbb; <a href=\"hesab.php?bolme=23&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_41."</a></b><br/>\n";
if ($number_42 != 'x')echo "<b>&#xbb; <a href=\"hesab.php?bolme=21&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_42."</a></b><br/>\n";
if ($number_43 != 'x')echo "".$number_43."<br/>\n";



if ($number_5 != 'x')echo "&#xbb; <a href=\"top.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_5."</a><br/>\n";
if ($number_6 != 'x')echo "&#xbb; <a href=\"vezife.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_6."</a><br/>\n";
if ($number_7 != 'x')echo "&#xbb; <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=varli&amp;ref=$ref\">".$number_7."</a><br/>\n";
if ($number_50 != 'x'){print "<b>&#xbb; <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_50."</a></b><br/>";}
if ($number_9 != 'x')echo "&#xbb; <a href=\"forum.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_9."</a> |\n";
if ($number_10 != 'x')echo "<a href=\"etiraf/?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_10."</a><br/>\n";
if ($number_11 != 'x')echo  "&#xbb; <a href=\"hekaye.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_11."</a><br/>\n";
$mp=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `mp3ler`;"));
$mp = trim($mp[0]);
if ($number_12 != 'x')echo "&#xbb; <a href=\"mp3/index.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_12."</a>-($mp)<br/>\n";

$video = mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `videolar`;"));
if ($number_52 != 'x')echo "&#xbb; <a href=\"videos.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_52."</a>-(".trim($video[0]).")<br/>\n";

$sekil = mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `sekiller`;"));
if ($number_53 != 'x')echo "&#xbb; <a href=\"sekil.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_53."</a>-(".trim($sekil[0]).")<br/>\n";

#$_v->html('</div>');
$_v->divide();
echo "---<br/>\n";
/*
if ($number_13 != 'x')echo " ".$number_13." <b>$id</b><br/>\n";
if ($number_14 != 'x')echo " ".$number_14." <b>$bal</b><br/>\n";
if ($number_15 != 'x')echo " ".$number_15." <b>$posts</b><br/>\n";
echo "----<br/>\n";
*/
$usersm=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where `sex`='0' and `time`> '".$_AUTO['online']."' and `inv`!='3' and `kik`<'".time()."' and banned = '0';"));
$usersj=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where `sex`='1' and `time`> '".$_AUTO['online']."' and `inv`!='3' and `kik`<'".time()."' and banned = '0';"));
$cemi=$usersj[0]+$usersm[0];

if ($number_16 != 'x')echo  "&#xbb; <a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_16."</a><br/>\n";
if ($number_17 != 'x')echo  "&#xbb; <a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_17."</a>(<b>$cemi</b>)<br/>\n";
if ($number_18 != 'x')echo  "&#xbb; ".$number_18." <a href=\"on.php?c=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$usersm[0]."</a>\n";
if ($number_19 != 'x')echo  "&#xbb; ".$number_19." <a href=\"on.php?c=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$usersj[0]."</a><br/>\n";
if ($number_20 != 'x')echo  "&#xbb; <a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_20."</a><br/>\n";

if ($number_21 != 'x')echo  "&#xbb; <a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_21."</a><br/>\n";
if ($number_22 != 'x')echo  "&#xbb; <a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_22."</a><br/>\n";
if ($number_23 != 'x')echo  "&#xbb; <a href=\"beyen.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_23."</a><br/>\n";
if ($number_24 != 'x')echo  "&#xbb; <a href=\"friends.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_24."</a><br/>\n";
if ($number_25 != 'x')echo "".$number_25."<br/>";

$gallery = mysql_query ("select count(`id`) as `num` from `albom`;");
$foto = mysql_fetch_array($gallery);
$fotog = $foto["num"];

$r2 = mysql_query ("select count(`klu4`) as `num` from `zapiski` WHERE (`idtowhom` = '".$id."')and(`ininc` = '1');");
$a2 = mysql_fetch_array($r2);
$inball = $a2["num"];

$r3 = mysql_query ("select count(`klu4`) as `num` from `mesaj` WHERE (`idtowhom` = '".$id."')and(`ininc` = '1');");
$a3 = mysql_fetch_array($r3);
$mnball = $a3["num"];

if ($number_26 != 'x')echo  "&#xbb; <a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_26."</a>(<b>$msn/$mnball</b>)<br/>\n";
if ($number_28 != 'x')echo  "&#xbb; <a href=\"mms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_28."</a>(<b>$newto/$to</b>)<br/>\n";

if ($number_31 != 'x')echo "".$number_31."<br/>";

if ($number_30 != 'x')echo  "&#xbb; <a href=\"galery.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_30."</a>-(<b>".$fotog."</b>)<br/>\n";
if ($number_32 != 'x')echo  "&#xbb; <a href=\"oyunlar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_32."</a><br/>\n";
if ($number_40 != 'x')echo "&#xbb; <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_40."</a><br/>";

if ($number_33 != 'x')echo  "".$number_33."<br/>";

if ($number_35 != 'x')echo  "&#xbb; <a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_35."</a><br/>\n";
if ($number_36 != 'x')echo  "&#xbb; <a href=\"smile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_36."</a><br/>\n";
if ($number_37 != 'x')echo  "&#xbb; <a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_37."</a><br/>\n";
if ($number_38 != 'x')echo  "&#xbb; <a href=\"stat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_38."</a><br/>\n";


$curdate=date("d-m-Y");
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) from `users` WHERE `date` = '".$curdate."' $table_banned;"));
if ($number_46 != 'x')echo "&#xbb; <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=yeni&amp;ref=$ref\">".$number_46."</a>(".$newtoday[0].")<br/>\n";
$_v->divide();


echo "&#xbb; <a href=\"http://$site_url/?$ref\">$site</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>