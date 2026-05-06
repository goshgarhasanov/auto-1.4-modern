<?php

include("inc.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);




if($row["mduelphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Duel Oynuna Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$mlink = "<a href=\"mduel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Duel Oyunu</a><br/>\n
<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n
<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";




switch($moko)
{
default:
$_v->title('Duel Oyunu','left');
$_v->fsize1($fsize1);
include ("mduel/bildiris");

$userall = mysql_query ("select count(did) as num from mduel where `devet` = '2';");
$usm = mysql_fetch_array($userall);
$num = $usm["num"];
$time = $ums["dtime"];
if(!isset($s))$s=0;
$mx=round(($num/5)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*5)+1;
$do=$s*5;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
if($num ==0){
echo "Hal-Haz&#305;rda duel oynan&#305;lm&#305;r..<br/>";
echo $divide;
} else {

$r = mysql_query ("select * from mduel where `devet` = '2' order by `did` desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arre = mysql_fetch_array($r);
$dkim = $arre['dkim'];
$dkimle = $arre['dkimle'];
$dk_bal = $arre['dk_bal'];
$dkl_bal = $arre['dkl_bal'];
$dtime = $arre['dtime'];
$gpass = $arre['gpass'];
$dk_ses = $arre['dk_ses'];
$dkl_ses = $arre['dkl_ses'];

$qus = mysql_query("SELECT `user` FROM `users` WHERE `id` = ".$dkim.";");
$user_name = mysql_result($qus, 0);
$qus3 = mysql_query("SELECT `user` FROM `users` WHERE `id` = ".$dkimle.";");
$user_name2 = mysql_result($qus3, 0);

$vaxt_gun = $dtime - time();

// Saat
$s_san = $vaxt_gun / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
// Deqiqe
$d = $vaxt_gun / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($vaxt_gun - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $vaxt_gun - $deqiqe_san;

$umbal1 = $dk_ses + $dkl_ses;
$umbal = $umbal1 * 10;

echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$dkim&amp;r=$ref\">$user_name</a>+
<a href=\"mduel.php?moko=like&amp;id=$id&amp;ps=$ps&amp;gpass=$gpass&amp;gid=$dkim&amp;r=$ref\"><img src=\"img/like.gif\" alt=\"Beyen\"/>($dk_ses)</a> &#8226;
<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$dkimle&amp;r=$ref\">$user_name2</a>+
<a href=\"mduel.php?moko=like&amp;id=$id&amp;ps=$ps&amp;gpass=$gpass&amp;gid=$dkimle&amp;r=$ref\"><img src=\"img/like.gif\" alt=\"Beyen\"/>($dkl_ses)</a><br/>";
echo "Udu&#351; fondu <b>$umbal</b> bal te&#351;kil edir<br/>";
echo "<u>Qalan vaxt:</u> $saat_tam saat $deqiqe deq. $saniye san.<br/>";
if ( $dkim == $id )
{
echo "<a href=\"mduel.php?moko=seelike&amp;id=$id&amp;ps=$ps&amp;gpass=$gpass&amp;km=$dkim&amp;r=$ref\">Size verilen sesler</a><br/>";
}
if ($dkimle == $id )
{
echo "<a href=\"mduel.php?moko=seelike&amp;id=$id&amp;ps=$ps&amp;gpass=$gpass&amp;km=$dkimle&amp;r=$ref\">Size verilen sesler</a><br/>";
}
echo "----<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*5)+1;
$do=$next*5;
if($do>$num)$do=$num;
echo "<a href=\"mduel.php?id=$id&amp;ps=$ps&amp;s=$next&amp;r=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
if($s==1) {
echo $divide; }
}
if($s>1) {
$ot=(($prev-1)*5)+1;
$do=$prev*5;
echo "<a href=\"mduel.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;r=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
echo $divide;
}
}
echo "<a href=\"mduel.php?moko=rules&amp;id=$id&amp;ps=$ps&amp;r=$ref\">Qaydalar</a><br/>";
echo $divide;
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;

break;

case 'devet':
$_v->Redirect("mduel.php?id=$id&amp;ps=$ps&amp;r=$ref",20);
$_v->title('Dulel evet','left');
$_v->fsize1($fsize1);
if ( $id == $nk ) {
$_v->align('center');
echo "Siz &#246;z&#252;n&#252;zle Duel oynamaq isteyirsiz..??<br/><b>Bax buna icaze yoxdur..!</b>";
echo "</p>";
} else {
mysql_query ("Select * from mduel where dkim='".$id."' and dkimle='".$nk."'");
if (mysql_affected_rows()!=0){
$_v->align('center');
echo "Siz art&#305;q devet g&#246;ndermisiniz... Sebirli olun ve reqibin cavab&#305;n&#305; g&#246;zeyin...";
echo "</p>";
} else {
mysql_query ("Select * from mduel where ((dkim='".$id."') or (dkimle ='".$id."')) and (dtime > '".time()."')");
if (mysql_affected_rows()!=0) {
$_v->align('center');
echo "Siz art&#305;q dueldesiniz... Iki ve daha &#231;ox istifade&#231;i ile duel oynamaq olmaz..!";
echo "</p>";
} else {
mysql_query ("Select * from mduel where ((dkim='".$nk."') or (dkimle ='".$nk."')) and (dtime > '".time()."')");
if (mysql_affected_rows()!=0) {
$_v->align('center');
echo "Teklif g&#246;nderdiyiniz istifade&#231;i art&#305;q dueldedir.. Iki ve daha &#231;ox istifade&#231;i ile duel oynamaq olmaz..!";
echo "</p>";
} else {
$bal1 = mysql_query ("Select bal from users where id='".$id."'");
$idbal = mysql_result ($bal1,0);
$bal2 = mysql_query ("Select bal from users where id='".$nk."'");
$nkbal = mysql_result ($bal2,0);
if (($idbal < 50 ) or ($nkbal < 50 )) {
echo "<b>Devet g&#246;nderilmedi</b>..<br/>";
if (($idbal < 50 ) and ($nkbal < 50 )) {
echo "Duel Duel oynamaq &#252;&#231;&#252;n her ikinizin balans&#305;nda 50 bal olmal&#305;d&#305;r.";
} else {
if($idbal < 50 ) {
echo "Duel oynamaq &#252;&#231;&#252;n 50 bal laz&#305;md&#305;r. Sizin <b>$idbal</b> bal&#305;n&#305;z var.<br/>";}
if($nkbal < 50 ) {
echo "Duel oynamaq &#252;&#231;&#252;n reqibin balans&#305;nda 50 bal olmal&#305;d&#305;r. Reqibin balans&#305;nda <b>$nkbal</b> bal var.";}
}
} else {
include ("mduel/nn");
$mdate = date("d.m.Y [H:i]");
$dvt = mysql_query ("Insert into mduel set dkim = '".$id."', dkimle = '".$nk."', dtime = '0', ddate = '".$mdate."', devet = '1', gpass = '".$gamepass."' ");
if ($dvt) {
echo "Devet g&#246;nderildi. Xahi&#351; olunur reqibin cavab&#305;n&#305; g&#246;zeyin";
} else {
echo "Devet g&#246;nderilmedi";

} } } } } }
echo "<br/><a href=\"mduel.php?id=$id&amp;ps=$ps&amp;r=$ref\">Dueller</a><br/>";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;r=$ref\">Online Mesaj</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case 'dvlr':
$_v->title('Size gelen Duel Devetleri','left');
$_v->fsize1($fsize1);

$userall = mysql_query ("select count(did) as num from mduel where `dkimle` = '".$id."' and `devet` = '1';");
$usm = mysql_fetch_array($userall);
$num = $usm["num"];
if(!isset($s))$s=0;
$ob = '5';
$mx=round(($num/$ob)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*$ob)+1;
$do=$s*$ob;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
if($num ==0){
echo "Size Duel oynamaq &#252;&#231;&#252;n devet gelmeyib...<br/>";
} else {

echo "Cemi: $num devetiniz var.<br/>\n";
echo $divide;
$r = mysql_query ("select * from mduel where `dkimle` = '".$id."' and `devet` = '1' order by `did` desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arre = mysql_fetch_array($r);
$did = $arre['did'];
$kim = $arre['dkim'];
$kimle = $arre['dkimle'];
$date = $arre['ddate'];
$pass = $arre['gpass'];
$qus = mysql_query("SELECT `user` FROM `users` WHERE `id` = ".$kim.";");
$user_kim = mysql_result($qus, 0);
$qus2 = mysql_query("SELECT `user` FROM `users` WHERE `id` = ".$kimle.";");
$user_kimle = mysql_result($qus2, 0);

echo ($i).").<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$kim&amp;r=$ref\">$user_kim</a> niki sizinle duelde oynamaq isteyir.<br/>\n";
echo "<a href=\"mduel.php?moko=tesdiq&amp;id=$id&amp;ps=$ps&amp;nk=$kim&amp;gpass=$pass&amp;act=yes&amp;r=$ref\">Qebul edirem</a> &#8226;\n";
echo " <a href=\"mduel.php?moko=tesdiq&amp;id=$id&amp;ps=$ps&amp;nk=$kim&amp;gpass=$pass&amp;act=no&amp;r=$ref\">Qebul etmirem</a> &#8226;\n";
echo " $date<br/>";
echo "&#8226; &#8226; &#8226; <br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*$ob)+1;
$do=$next*$ob;
if($do>$num)$do=$num;
echo "<a href=\"mduel.php?moko=dvlr&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;r=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
if($s==1) {
echo $divide; }
}
if($s>1) {
$ot=(($prev-1)*$ob)+1;
$do=$prev*$ob;
echo "<a href=\"mduel.php?moko=dvlr&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;r=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
echo $divide;
}
}

echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case 'tesdiq':
$_v->Redirect("mduel.php?id=$id&amp;ps=$ps&amp;r=$ref",20);
$_v->title('Duel Tesdiq','left');
$_v->fsize1($fsize1);
mysql_query ("Select * from mduel where (dkimle='".$id."') and (devet = '2') and (dtime > '".time()."')");
if (mysql_affected_rows()!=0) {
echo "Siz art&#305;q ba&#351;qa istifade&#231;i ile dueldesiniz...<br/>";
} else {
mysql_query ("Select * from mduel where (dkim='".$nk."') and (devet = '2') and (dtime > '".time()."')");
if (mysql_affected_rows()!=0) {
echo "Reqib art&#305;q ba&#351;qa istifade&#231;i ile dueldedir...<br/>";
} else {
$a1 = mysql_query ("SELECT * FROM mduel WHERE dkim = '".$nk."' AND dkimle = '".$id."' ");
$up = mysql_fetch_array ($a1);
$yoxp = $up['gpass'];
$otime = $up['dtime'];
$odevet = $up['devet'];
if ($yoxp != $gpass) {
echo "Bele bir Duel yoxdur..<br/>";
} else {
if (($otime > time()) and ($odevet == '2')) {
echo "Siz artiq Duele START vermisiniz<br/>";
} else {
if ( ( $act == 'no' ) and ( $act != '') ) {
$delduel = mysql_query ("DELETE FROM mduel WHERE (dkim = '".$nk."') AND (dkimle = '".$id."') AND (gpass = '".$gpass."')");
if ($delduel) {
echo "Siz Dueli qebul etmediniz...<br/>";

$data = date("d.m.Y |H:i", mktime(date ("H")+1));


$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';");
$nickname = mysql_result($q, 0);
$pus = mysql_query ("SELECT `user` FROM `users` WHERE `id` = '".$nk."'");
$npus = mysql_result ($pus, 0);
                $kol = rand(0,99999999);
                $time = time();
$message = "<b>$nickname</b> sizin Duel isteyinizi qebul etmedi...";
mysql_query("Insert into zapiski set klu4='".$kol."', who ='Sistem', idwho ='0', message = '".$message."', towhom = '".$npus."', idtowhom = '".$nk."', time = '".$time."', readd = '0', topic = 'Sistem', date='".$data."', insend='1', ininc='1'");

} else { echo "Duel redd olunmadi...<br/>"; }

} elseif ( ( $act == 'yes' ) and ( $act != '') ) {

$ytime = 12 * 3600 + time();
$mdate = date("d.m.Y [H:i]");
$update = mysql_query ("UPDATE mduel SET dtime = '".$ytime."', devet = '2', ddate = '".$mdate."' WHERE (dkim = '".$nk."') AND (dkimle = '".$id."') AND (gpass = '".$gpass."')");
if($update) {
echo "Siz Dueli qebul etdiniz...<br/>";

$data = date("d.m.Y |H:i", mktime(date ("H")+1));


$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';");
$nickname = mysql_result($q, 0);
$pas = mysql_query ("SELECT `pass` FROM `users` WHERE `id` = '".$nk."'");
$npas = mysql_result ($pas, 0);
$pus = mysql_query ("SELECT `user` FROM `users` WHERE `id` = '".$nk."'");
$npus = mysql_result ($pus, 0);
                $kol = rand(0,99999999);
                $time = time();
$message = "<b>$nickname</b> sizin Duel isteyinizi qebul etdi...<br/><br/><a href=\"mduel.php?moko=oyun&amp;id=$nk&amp;ps=$npas&amp;gpass=$gpass&amp;r=$ref\">Oyuna ba&#351;la</a><br/>";
mysql_query("Insert into zapiski set klu4='".$kol."', who ='Sistem', idwho ='0', message = '".$message."', towhom = '".$npus."', idtowhom = '".$nk."', time = '".$time."', readd = '0', topic = 'Sistem', date='".$data."', insend='1', ininc='1'");

} else { echo "Duel qebul olunmadi...<br/>"; }
}
elseif ( !isset($act) ) {  echo "Xahi&#351; olunur &#231;ox bilmi&#351;lik edib linkde \"<b>act</b>\" s&#246;z&#252;nde silmeyesiniz...!<br/>"; }
else { echo "Xahi&#351; olunur &#231;ox bilmi&#351;lik edib linkde \"<b>act</b>\" s&#246;z&#252;nde d&#252;zeli&#351; etmeyesiniz...!<br/>"; }
}
} } }
echo $divide;
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case 'like':
$_v->Redirect("mduel.php?id=$id&amp;ps=$ps&amp;r=$ref",20);
$_v->title('Ses verdiniz','left');
$_v->fsize1($fsize1);
$sql = mysql_query("SELECT * FROM `mduel` WHERE `gpass` = '".$gpass."';");
if(mysql_affected_rows() == 0)
{
echo "Bele bir Duel yoxdur..<br/>";
} else {
$sql2 = mysql_query("SELECT * FROM `mduel` WHERE `gpass` = '".$gpass."';");
$ss = mysql_fetch_array ($sql2);
$erdkim = $ss['dkim'];
$erdkimle = $ss['dkimle'];
$erdk_ses = $ss['dk_ses'];
$erdkl_ses = $ss['dkl_ses'];

if (($erdkim != $gid) && ($erdkimle != $gid))
{
echo "Bu istifade&#231;i duelde i&#351;tirak etmir..<br/>";
} else {
if (!isset($gid)) {
echo "Yuxar&#305;dak&#305; linki qurtdalamay&#305;n..<br/>";
} else {
if ($gid == $id) {
echo "Siz duelde &#246;z&#252;n&#252;ze ses vere bilmersiz..!<br/>";
} else {

$uu = mysql_query ("SELECT user FROM users WHERE id = '".$gid."' ");
$us = mysql_result ($uu, 0);
mysql_query ("SELECT * FROM md_ses WHERE `gpass` = '".$gpass."' and `kim` = '".$id."';");
if(mysql_affected_rows()!=0)
{
$ses = mysql_query ("SELECT kime FROM md_ses WHERE gpass = '".$gpass."' ");
$sesid = mysql_result ($ses, 0);
$uu2 = mysql_query ("SELECT user FROM users WHERE id = '".$sesid."' ");
$us2 = mysql_result ($uu2, 0);
echo "Siz art&#305;q <b>$us2</b> nikine ses vermisiniz birdaha olmaz....!<br/>";
} else {
if ($row['bal'] < '10')
{
echo "Duele ses vermek &#252;&#231;&#252;n <b>10</b> bal&#305;n&#305;z olmal&#305;d&#305;r..<br/>";
}
else
{
$odate = date("d.m.Y [H:i]");
$insetr = mysql_query ("INSERT INTO md_ses SET gpass = '".$gpass."' , kim = '".$id."' , kime = '".$gid."' , time = '".time()."' , date = '".$odate."'");
$endbal = $row['bal'] - 10;
mysql_query ("UPDATE users SET bal = '".$endbal."' WHERE id = '".$id."'");

if ($insetr) {
echo "Siz <b>$us</b> nikine ses verdiniz. Te&#351;ekk&#252;rler..<br/>";
if ($erdkim == $gid) {
$sonsen = $erdk_ses + 1;
mysql_query ("UPDATE mduel SET dk_ses = '".$sonsen."' WHERE gpass = '".$gpass."' and dkim = '".$gid."'");
}
if ($erdkimle == $gid) {
$sonsen = $erdkl_ses + 1;
mysql_query ("UPDATE mduel SET dkl_ses = '".$sonsen."' WHERE gpass = '".$gpass."' and dkimle = '".$gid."'");
}
} else { echo "Sesiniz qebul olunmad&#305;. ADMINe m&#252;raciyyet edin..!<br/>"; }

}
}
}

}
}
}
echo $divide;
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case 'seelike':
$_v->title('Ses verenler','left');
$_v->fsize1($fsize1);
$sql2 = mysql_query("SELECT * FROM `mduel` WHERE `gpass` = '".$gpass."';");
$ss = mysql_fetch_array ($sql2);
$erdkim = $ss['dkim'];
$erdkimle = $ss['dkimle'];

if (($erdkim != $km) && ($erdkimle != $km))
{
echo "Bu istifade&#231;i duelde i&#351;tirak etmir..<br/>";
} else {
if($id != $km )
{
echo "Siz ba&#351;qas&#305;na verilen seslere baxa bilmersiz.<br/>";
}
else
{
$sec = mysql_query("SELECT * FROM `md_ses` WHERE `gpass` = '".$gpass."' AND `kime` = '".$km."' ORDER BY `time` DESC");
$nm = mysql_num_rows($sec);
if ($nm == 0){
if ( $id == $km ) $soz = 'Size';
if ( $id != $km ) $soz = 'Bu nike';
echo "$soz he&#231; kim ses vermeyib.! :(<br/>";
}else{
$qus2 = mysql_query("SELECT `user` FROM `users` WHERE `id` = ".$km.";");
$ad = mysql_result($qus2, 0);
if ( $id == $km ) { echo "Size duelde ses verenler:<br/>"; }
if ( $id != $km ) {echo "<b>$ad</b> nikine duelde ses verenler:<br/>";}
echo "Cemi <b>$nm </b> nefer<br/>";
echo "-----<br/>";
for ($i=1;$i<=$nm;$i++){
$arr = mysql_fetch_array($sec);
$kim = $arr["kim"];
$kime = $arr["kime"];
$time = $arr["time"];
$date = $arr["date"];

$tkick = time() - $time;
if($tkick < 60 && $tkick > 0)
{
$vaxtt = "saniye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxtt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxtt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxtt = "g&#252;n\n";
}
$tkick = round($tkick);

$re = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$kim."';");
$rr = mysql_fetch_array($re);
$login = $rr['user'];

echo ($i).". <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$kim&amp;r=$ref\">".$login."</a>";
if ($tkick < 2*86400) {
echo " $tkick  $vaxtt evvel<br/>";
} else {
echo " $date<br/>";
}

}
}
}
}

echo $divide;
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case "dueller":
$_v->title('Dueller','left');
$_v->fsize1($fsize1);
$dir = opendir("mduel/arxiv/".$nk);
$array = array();
while ($file = readdir($dir))
{
	if($file != "." and $file != ".." and $file != "Thumbs.db" and $file!=".htaccess")
	{
		$array[] = $file;
	}
}
if(count($array)==0)
{
	echo "Qovlu&#287; bo&#351;dur...<br/>";
}
else
{
	echo "Cemi <b>".count($array)."</b> duelde i&#351;tirak edib<br/>";
	echo $divide;
}
$max = 5;
$total = count($array);
$start = (!isset($page)) ? 0 : ($page * $max);
$end = (!isset($page)) ? $max : ($start + $max);
if(ceil($total/$max) < $page)
{
	$start=0;
	$end=$max;
}
while ($start <= $end - 1)
{
	if(!empty($array[$start]))
	{
		//echo $array[$start]."<br/>";
		$d_file=file("mduel/arxiv/".$nk."/".$array[$start]);
		$oyddate = trim($d_file[0]);
		$oykim = trim($d_file[1]);
		$oydk_ses = trim($d_file[2]);
		$oydkl_ses = trim($d_file[3]);
		$oykimle = trim($d_file[4]);
		$qbal = trim($d_file[5]);
		$kim = mysql_query("SELECT * FROM users WHERE id = '".$oykim."'");
		if (mysql_affected_rows() == FALSE )
		{
			$user = "Nik Silinib";
		}
		else
		{
			$km = mysql_fetch_object($kim);
			$user = $km->user;
		}
		$kimle = mysql_query("SELECT * FROM users WHERE id = '".$oykimle."'");
		if (mysql_affected_rows() == FALSE )
		{
			$user_l = "Nik Silinib";
		}
		else
		{
			$kml = mysql_fetch_object($kimle);
			$user_l = $kml->user;
		}
		if ( $oydk_ses > $oydkl_ses )
		{
			$qalib = "Qazan&#305;b: <b>".$user."</b>";
		}
		elseif ( $oydk_ses < $oydkl_ses )
		{
			$qalib = "Qazan&#305;b: <b>".$user_l."</b>";
		}
		else
		{
			$qalib = 'Oyun He&#231;-He&#231;e olub';
		}

		echo "(".$oyddate.") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$oykim&amp;ref=$ref\">".$user."</a> (".$oydk_ses.") - (".$oydkl_ses.") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$oykimle&amp;ref=$ref\">".$user_l."</a><br/>";
		echo "Qazan&#305;lan bal: <b>".$qbal."</b> &#8226; ".$qalib."<br/>";
		echo $divide;

	}
	++$start;
}
closedir($dir);
if($total > $max)
{
	echo navigation("mduel.php?moko=$moko&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref",$total,$max,$page);
	echo $divide;
}
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case "rules":

$_v->title('Qaydalar','left');
$_v->fsize1($fsize1);
echo "1. Siz istediyiniz istifade&#231;iye Duelde oynamaq &#252;&#231;&#252;n teklif g&#246;ndere bilersiz. Bunun &#252;&#231;&#252;n sizin balans&#305;n&#305;zda en az&#305; <b>50 bal</b> olmal&#305;d&#305;r..<br/>";
echo "2. Eger reqib bunu qebul elese siz oyuna ba&#351;lamaq haqq&#305;nda melumat al&#305;rs&#305;z. Qebul elemese sizin istek le&#287;v olunur..<br/>";
echo "3. Oyunda qalibi m&#252;eyyenle&#351;dirmek &#252;&#231;&#252;n istifade&#231;iler oyun&#231;ulara ses vermelidirler..<br/>";
echo "4. Ses vermek isteyen istifade&#231;iler duelde olan iki oyun&#231;udan yaln&#305;z birine ses vere biler..<br/>";
echo "5. Ses vermek isteyen istifade&#231;inin balans&#305;ndan <b>10</b> bal &#231;&#305;x&#305;l&#305;r..<br/>";
echo "6. Duelin m&#252;ddeti <b>12 saat</b> olur. Bu m&#252;ddet erzinde kim &#231;ox ses toplasa qalib olur..<br/>";
echo "7. Udu&#351; fondunun teyin olunmas&#305;: <u>(size verilen ses + reqibe verilen ses)*10</u>..<br/>";
echo "8. Qalib olan oyun&#231;u &#252;mumi udu&#351; fonduna sahib olur..<br/>";

echo $divide;
echo $mlink;

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;

case "your";
$_v->title('G&#246;nderilen dueller'.'left');

$_v->fsize1($fsize1);

echo $divide;
echo $mlink;
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
break;
}
$_v->end('1',$link);
?>
