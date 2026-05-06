<?php
/*
CREATE TABLE IF NOT EXISTS `xo_game` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL default '0',
  `to` int(11) NOT NULL default '0',
  `tip` tinyint(1) NOT NULL default '0',
  `time` varchar(15) NOT NULL default '0',
  `de` tinyint(1) NOT NULL default '0',
  `ge` varchar(20) NOT NULL,
  `win` int(11) NOT NULL default '0',
  `no` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=0 ;
*/
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$ref=rand(1111,9999);
$c=0;

$user = $row["user"];

$time = time() + $onvaxt;
$update = mysql_query("UPDATE `users` SET `time` = '".$time."', `room` = 101 WHERE `id` = '".$id."';");

$timer = ($onvaxt - 300) + time();

$xo = mysql_query("SELECT `id`, `user` FROM `users` WHERE `room` = '101' AND `time` > '".$timer."';");
$on = mysql_num_rows($xo);

$m = mysql_query("SELECT * FROM `xo_game` WHERE `to` = '".$id."' AND `time` > '".$timer."' AND `de` = '0';");
$devet = mysql_num_rows($m);

$a = mysql_query("SELECT `id`, `uid`, `to` FROM `xo_game` WHERE (`to` = '".$id."' OR `uid` = '".$id."') AND `time` > '".$timer."' AND `de` = '1';");
$aktiv = mysql_num_rows($a);
ob_start();
$_v->title('X-O '.Oyunu,'left');
$_v->fsize1($fsize1);

switch($mod)
{

default:
if($aktiv > 0){
echo "<b>Aktiv oyun:</b><br/>";
$ma = mysql_fetch_array($a);
$gid = $ma['id'];
$auid = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".intval($ma['uid'])."';");
$toa = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".intval($ma['to'])."';");
echo "<u>".mysql_result($auid, 0)."</u> <b>-&gt;</b> <u>".mysql_result($toa, 0)."</u><br/>";
echo "<a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=oyun&amp;gid=$gid\">Daxil ol</a><br/>";
echo $divide;
}
echo "<a href=\"xo.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a> | <a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=qayda\">Qaydalar</a><br/>";
echo "*****<br/>";
if($devet == 0){
echo "Size devet gelmeyib.<br/>";
}else{
echo "Devetler:<br/>";
while($dev = mysql_fetch_array($m)){
$gid = $dev['id'];
$uid = $dev['uid'];
$u = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$uid."';");
$user = mysql_result($u, o);
$c++;
echo $c.") <a href=\"info.php?id=$id?id=$id&amp;ps=$ps&amp;nk=$uid\">$user</a> qebul <a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=qebul&amp;gid=$gid\">et</a><br/>";
}
}
echo $divide;
echo "Onlaynda olanlar:<br/>";
$xo = mysql_query("SELECT `id`, `user` FROM `users` WHERE `room` = '101' AND `time` > '".$timer."';");
$on = mysql_num_rows($xo);
$m = mysql_query("SELECT * FROM `xo_game` WHERE `to` = '".$id."' AND `time` > '".$timer."' AND `de` = '0';");
$devet = mysql_num_rows($m);
$q = mysql_query("SELECT `id`, `uid`, `to` FROM `xo_game` WHERE (`to` = '".$id."' OR `uid` = '".$id."') AND `time` > '".$timer."' AND `de` = '1';");
$aktiv = mysql_num_rows($q);

if($on == 0){
echo "X-O oyununda heç kim yoxdu.<br/>";
}else{
while($onl = mysql_fetch_array($xo)){
$uid = $onl['id'];
$user = $onl['user'];
$c++;
echo $c.") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid\">$user</a> devet <a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=cag&amp;uid=$uid\">et</a><br/>";
}
}
break;

case 'cag':
$s = mysql_query("SELECT * FROM `xo_game` WHERE `uid` = '".$id."' AND `time` > '".$timer."' AND `de` = '0';");
if(mysql_num_rows($s) > 0){
echo "<b>SEHV:</b> Eyni anda 2 istifadeçiye teklif göndere bilmezsiniz. Diger teklif bitdikden sonra yeni istifadeçiye teklif göndere bilersiniz!<br/>";
}else{
if(isset($_GET['uid']))
{
$uid = $_GET['uid'];
}
else
{
$uid = "";
}
$e = mysql_query("SELECT `user` FROM `users` WHERE `room` = '101' AND `time` > '".$timer."' AND `id` = '".$uid."';");
if($uid == $id){
echo "<b>SEHV:</b> Özünüze devet göndere bilmezsiniz.<br/>";
}else{
if(mysql_num_rows($e) == 0){
echo "<b>Sehv!</b> Bu istifadeçi hal-hazırda X-O Oyununda deyil!<br/>";
}else{
$dnick = mysql_result($e, 0);
$sql = mysql_query("INSERT INTO `xo_game` SET `uid` = '".$id."', `to` = '".$uid."', `time` = '".$time."', `no` = '".$uid."';");
if($sql){
echo "<b>$dnick</b>, nickli istifadeçiye devetiniz gönderildi. Eger $dnick 1 deqiqe erzinde sizinle oyuna razılıq vererse oyuna başlayacaqsınız.<br/>";
}else{
echo "Sehv!<br/>";
echo mysql_error()."<br/>";
}
}
}
}
break;

case 'qayda':
echo '<b>Qaydalar</b>:<br/>
*****<br/>
- X-O oyunu oynamaq üçün Onlaynda olan 1 istifadeçiye devet gönderin.<br/>
- Eger o sizin devetinizi qebul etse o zaman oyun başlayacaq.<br/>
- Her devet 1 deqiqe erzinde qebul edilmezse deaktiv olur.<br/>
- 1 deqiqe erzinde yalnız 1 nefere devet göndere bilersiniz.<br/>
- Size de devetler gele biler.<br/>
- Devet tesdiqlendikden sonra oyun başlayır.<br/>
- Devet gönderen "o" , qebul eden ise "x" olur.<br/>
- Sizin herf ardıcıl olaraq 3defe yazılsa qalib olacaqsınız.<br/>
- 1 deqiqe erzinde gediş etmeseniz meğlub olacaqsınız.<br/>
- Şaquli, Üfuqi ve diaqonallar üzre ardıcıllıq qebul olunur.<br/>';
break;

case 'qebul':
if($aktiv > 0){
echo "<b>Sehv!</b> Sizin hal-hazırda aktiv oyununuz var! Oyunu bitirdikden sonra diger deveti qebul edib oyuna başlaya bilresiz!<br/>";
}else{
if(isset($_GET['gid']))
{
$gid = $_GET['gid'];
}
else
{
$gid = "";
}
$g = mysql_query("SELECT `uid` FROM `xo_game` WHERE `id` = '".$gid."' AND `to` = '".$id."' AND `time` > '".$timer."' AND `de` = '0';");
if(mysql_num_rows($g)==0){
echo "Sehv! Oyun Tapılmadı<br/>";
}else{
$sql = mysql_query("UPDATE `xo_game` SET `de` = '1', `time` = '".$time."' WHERE `id` = '".$gid."' AND `to` = '".$id."' AND `time` > '".$timer."';");
if($sql){
echo "Qebul olundu, oyuna başlaya bilersiniz.<br/>";
echo "<a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=oyun&amp;gid=$gid\">Oyuna başla</a><br/>";
}else{
echo "<b>Sehv!</b><br/>";
}
}
}
break;

case 'oyun':

if(isset($_GET['gid'])){
$gid = $_GET['gid'];
}else{
$gid = "";
}

$o = mysql_query("SELECT * FROM `xo_game` WHERE `id` = '".$gid."' AND (`to` = '".$id."' OR `uid` = '".$id."') AND `de` > '0';");
if(mysql_num_rows($o) == 0){
echo "<b>Sehv!</b> Oyun tapılmadı<br/>";
}else{
$ma = mysql_fetch_array($o);
$gid = $ma['id'];
$uid = $ma['uid'];
$to = $ma['to'];
$devet = $ma['de'];
$gime = $ma['time'];
$gedis = $ma['ge'];
$novbe = $ma['no'];
$vaxt = $gime - $timer;
$ged = $ma['ged'];
$tip = $ma['tip'];
$win = "";
$b = explode('-',$gedis);
$ous = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$uid."';");
$ouser = mysql_result($ous, 0);
$tus = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$to."';");
$tuser = mysql_result($tus, 0);
echo "</small></p><p align=\"center\"><small>";

if($devet ==1 && ($vaxt == 0 || $vaxt < 0)){

if($novbe == $uid) $win = $to;
elseif($novbe == $to) $win = $uid;
if($tip == 0){
//mysql_query("UPDATE `users` SET `posts` = `posts` + 50 WHERE `id` = '".$win."';");
//mysql_query("UPDATE `users` SET `posts` = `posts` - 50 WHERE `id` = '".$novbe."';");
mysql_query("UPDATE `xo_game` SET `tip` = '1' WHERE `id` = '".$gid."';");
}
if($win == $id) echo "$user, tebrikler siz qalib geldiniz. Reqib vaxtında gediş etmediyi üçün meğlub oldu.<br/>";
else echo "$user Siz vaxtında gediş etmediyiniz üçün meğlub oldunuz, Reqib qalib geldi.<br/>";

}else{

echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid\">$ouser</a>(o) - <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$to\">$tuser</a>(x)<br/>";
echo "</small></p><p align=\"left\"><small>";
echo "<a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=oyun&amp;gid=$gid&amp;r=$ref\">Yenile</a><br/><br/>";

if(isset($_GET['gn']) && $devet == 1){
$gn = $_GET['gn'];
if($novbe != $id){
echo "Reqibiniz hele oynamayıb. Gözleyin...<br/>";
}elseif($b[$gn] == 'x' || $b[$gn] == 'o'){
echo "Bu xana boş deyil, başqa xana seçin...<br/>";
}elseif($gn > 8 || $gn < 0 || !ctype_digit($gn)){
echo "Yalnış xana seçilib!<br/>";
}else{
$gime = $time;
if($uid == $id){
$novbe = $to;
$t = 'o';
}else{
$novbe = $uid;
$t = 'x';
}
$gime = $time;
if($gn==0) $gedis = $t."-".$b[1]."-".$b[2]."-".$b[3]."-".$b[4]."-".$b[5]."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==1) $gedis = $b[0]."-".$t."-".$b[2]."-".$b[3]."-".$b[4]."-".$b[5]."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==2) $gedis = $b[0]."-".$b[1]."-".$t."-".$b[3]."-".$b[4]."-".$b[5]."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==3) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$t."-".$b[4]."-".$b[5]."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==4) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$b[3]."-".$t."-".$b[5]."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==5) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$b[3]."-".$b[4]."-".$t."-".$b[6]."-".$b[7]."-".$b[8];
if($gn==6) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$b[3]."-".$b[4]."-".$b[5]."-".$t."-".$b[7]."-".$b[8];
if($gn==7) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$b[3]."-".$b[4]."-".$b[5]."-".$b[6]."-".$t."-".$b[8];
if($gn==8) $gedis = $b[0]."-".$b[1]."-".$b[2]."-".$b[3]."-".$b[4]."-".$b[5]."-".$b[6]."-".$b[7]."-".$t;

$b = explode('-',$gedis);
mysql_query("UPDATE `xo_game` SET `time` = '".$time."', `ge` = '".$gedis."', `no` = '".$novbe."' WHERE `id` = '".$gid."' AND `time` > '".$timer."' AND `de` = '1';");
}
}

$vaxt = $gime - $timer;

//basla
if (
# horizontal
($b[0] == 'x' && $b[1] == 'x' && $b[2] == 'x') || 
($b[3] == 'x' && $b[4] == 'x' && $b[5] == 'x') || 
($b[6] == 'x' && $b[7] == 'x' && $b[8] == 'x') || 
# vertical
($b[0] == 'x' && $b[3] == 'x' && $b[6] == 'x') || 
($b[1] == 'x' && $b[4] == 'x' && $b[7] == 'x') ||
($b[2] == 'x' && $b[5] == 'x' && $b[8] == 'x') ||
# diagonal
($b[0] == 'x' && $b[4] == 'x' && $b[8] == 'x') ||
($b[2] == 'x' && $b[4] == 'x' && $b[6] == 'x'))
{
$win = $to;
$lose = $uid;
}
//son

//basla
if (
# horizontal
($b[0] == 'o' && $b[1] == 'o' && $b[2] == 'o') || 
($b[3] == 'o' && $b[4] == 'o' && $b[5] == 'o') || 
($b[6] == 'o' && $b[7] == 'o' && $b[8] == 'o') || 
# vertical
($b[0] == 'o' && $b[3] == 'o' && $b[6] == 'o') || 
($b[1] == 'o' && $b[4] == 'o' && $b[7] == 'o') ||
($b[2] == 'o' && $b[5] == 'o' && $b[8] == 'o') ||
# diagonal
($b[0] == 'o' && $b[4] == 'o' && $b[8] == 'o') ||
($b[2] == 'o' && $b[4] == 'o' && $b[6] == 'o'))
{
$win = $uid;
$lose = $to;
}
//son

if($win != ""){
if($tip == 0){
//mysql_query("UPDATE `users` SET `posts` = `posts` + 50 WHERE `id` = '".$win."';");
//mysql_query("UPDATE `users` SET `posts` = `posts` - 50 WHERE `id` = '".$lose."';");
}
mysql_query("UPDATE `xo_game` SET `win` = '".$win."', `de` = '2', `tip` = '1' WHERE `id` = '".$gid."' AND (`to` = '".$id."' OR `uid` = '".$id."');");

if($win == $id){
echo "Tebrikler... Siz qalib geldiniz!<br/>";
//echo "Reqibin 50 postunu qazandınız!<br/>";
}else{
echo "Meğlub oldunuz!<br/>";
//echo "50 postunuz reqibe verildi!<br/>";
}
}elseif(strlen($gedis) > 16){
mysql_query("UPDATE `xo_game` SET `de` = '2', `tip` = '1' WHERE `id` = '".$gid."' AND (`to` = '".$id."' OR `uid` = '".$id."')");
echo "Heç - heçe<br/>";
}else{
if($novbe == $id) echo "Gediş sizindir. $vaxt san. erzinde seçim etmeseniz meğlub olacaqsınız. Reqib sizin gedişi gözleyir...";
else echo "Gediş reqibindir. $vaxt san. erzinde seçim etmese meğlub olacaq. Gözleyin...<br/>";
}
echo "<br/>";


for ($i = 0; $i <= 8; $i++){
$is = $i +1;

if ($b[$i] == 'x') print 'x ';
elseif ($b[$i] == 'o') print 'o ';
elseif ($win == '') print "<a href=\"xo.php?id=$id&amp;ps=$ps&amp;mod=oyun&amp;gid=$gid&amp;r=$ref&amp;gn=$i\" accesskey=\"$is\">$is</a> ";
else echo "- ";

if ($i == 2 || $i == 5 || $i == 8) print '<br/>';
}
}
}
break;

}
echo "*****<br/>";
if ($mod != "") {
echo "<a href=\"xo.php?id=$id&amp;ps=$ps\">X-O Oyunu</a><br/>\n";
} else {
echo "<a href=\"enter.php?id=$id&amp;ps=$ps\">Dehliz</a><br/>\n";
}

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();


?>
