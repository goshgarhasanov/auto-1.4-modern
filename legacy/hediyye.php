<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

function int($str){
return strtolower(preg_replace(array('/[^0-9]/'), '', $str));
}
function pagestart($total,$max){
global $_GET;
$page = (!isset($_GET['page'])) ? 0 : intval($_GET['page']);
$page = preg_replace('/[^0-9]/', '', $page);
$start = (!isset($_GET['page'])) ? 0 : ($page * $max);
if(ceil($total/$max) < $page){
$start = 0;
}
return array($page,$start,$max);
}
function count_files($dirname){
if(is_dir($dirname)){
$dir_handle = opendir($dirname);
}
if(!$dir_handle){
return false;
}
$files = 0;
while($file = readdir($dir_handle)){
if($file != "." and $file != ".." and $file != ".htaccess" and $file != "Thumbs.db" and strrchr($file,'.')!=='.dat' and strrchr($file,'.')!=='.php' and strrchr($file,'.')!=='.wml' and strrchr($file,'.')!=='.inc'){
if(!is_dir($dirname."/".$file)){
$files++;
} else {
$files += count_files($dirname."/".$file);
}
}
}
closedir($dir_handle);
return $files;
}
function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "N&#246;vbeti &#187;";
$_PREVPAGE = "&#171; Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}
$base = "hediyye";
$style = "style=\"border-radius: 10px;\"";
$user = $row['user'];
$nk = int(intval($_GET["nk"]));
$re=$ref;



$bal = $row['bal'];
if ($id!=1){
if ($row["bal"]<=4){
$_v->title('Bal yetersizdir');
$_v->fsize1($fsize1);
echo "$user hediyye Bolmesine Daxil Olmaz ucun<br/> <b>5</b> bal olmaldir..!<br/>\n";
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;leme Qaydas&#305;</a>\n";
echo "<br/>---<br/>\n";
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}}



$p = str_replace('/','',base64_decode($_GET['p']));
$h = str_replace('/','',base64_decode($_GET['h']));

if (empty($nk))
{
if($rm!='') $url="&amp;rm=$rm&amp;ref=$ref";
else $url="&amp;ref=$ref";
}
else
{
if($bol!='2'){
$nik = "&amp;nk=$nk";
}

if($rm!='') $url="&amp;rm=$rm".$nik."&amp;ref=$ref";
else $url="".$nik."&amp;ref=$ref";

mysql_query ("Select * from info_qov where usid='".$id."' and id='".$nk."'");
if (mysql_affected_rows() == true){
$select = @mysql_query ("Select `id`,`user` from `users` where `id`='".$nk."';");
$inf = mysql_fetch_array ($select);
mysql_free_result($select);
$user=$inf["user"];
$_v->title('info iqnor','center');
$_v->fsize1($fsize1);
echo "<b>$user</b> Sizi Infodan Qovub :))<br/>";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($row['level']>=8){
$table_banned = "";
}else{
$table_banned = "and banned!='2'";
}
$select = @mysql_query("Select * from `users` where `id`='".$nk."' ".$table_banned.";");
if(mysql_affected_rows() == 0)
{
if ($rm != "") {
$lin = "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>\n";
} else {
$lin = "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Online Mesaj</a><br/>\n";
}
$_v->title('Xeta!','center');
$_v->fsize1($fsize1);
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>".$lin;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
exit;
}
$inf = mysql_fetch_array($select);
mysql_free_result($select);
$nick = $inf["user"];
}

if($_POST['action']=="gonder")
{
$text = trim($_POST["soz"]);
$text = narmobil(chkdsk($text,basename(__FILE__)));
}
$_v->title('Hediyye','left');
$_v->fsize1($fsize1);
switch($bol)
{
default:
echo "<b>Hediyye</b><br/>\n";
$_v->divide();

$i=1;
$dir = opendir($base);
$array = array();
while($file = readdir($dir))
{
if($file != "." and $file != ".." and is_dir($base."/".$file))
{
$array[] = $file;
echo "&#187; <a href=\"hediyye.php?bol=5&amp;p=".base64_encode($file)."&amp;id=$id&amp;ps=$ps$url\">".$file."</a> (".(count_files($base."/".$file)).")<br/>\n";
}
$i++;
}
if(count($array)==0)
{
echo "Qovluq yaradilmayib...<br/>";
}
closedir($dir);
break;

case "5":
if(!is_dir($base."/".$p))
{
echo "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.<br/>\n";
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a><br/>\n";
break;
}
else if($p=="" or $p=="\\'" or $p==".." or $p==".")
{
echo "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.<br/>\n";
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a><br/>\n";
break;
}
else if(!file_exists($base.'/'.$p.'/post.dat'))
{
echo "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.<br/>\n";
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a><br/>\n";
break;
}
else
{
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a> / <u>".$p."</u><br/>";
echo "*****<br/>\n";
$dir = opendir($base."/".$p);
$array = array();
while ($file = readdir($dir))
{
if($file != "." and $file != ".." and $file != "post.dat" and $file != "Thumbs.db" and $file!=".htaccess")
{
$array[] = $file;
}
}
if(count($array)==0)
{
echo "Qovlu&#287; bo&#351;dur...<br/>";
}
$max = 5;
$total = count_files($base."/".$p);
$start = (!isset($page)) ? 0 : ($page * $max);
$end = (!isset($page)) ? $max : ($start + $max);
if(ceil($total/$max) < $page)
{
$start=0;
$end=$max;
}
while ($start < $end)
{
if(!empty($array[$start]))
{
echo "<img $style src=\"".$base."/".$p."/".$array[$start]."\" width=\"75\" height=\"75\" alt=\"Hediyye\"/><br/>";
if($id==1)
{
print "[<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;p=".$_GET["p"]."&amp;h=".base64_encode($array[$start])."&amp;bol=del&amp;".$ref."\">x</a>]\n";
}
echo "<a href=\"hediyye.php?bol=1&amp;p=".$_GET['p']."&amp;h=".base64_encode($array[$start])."&amp;id=$id&amp;ps=$ps$url\">Hediyye-".($start+1)."</a><br/>";
}
++$start;
}
closedir($dir);
if($total > $max)
{
echo $divide;
echo navigation("hediyye.php?bol=5&amp;p=".$_GET['p']."&amp;id=$id&amp;ps=$ps$url",$total,$max,$page);
}
}
break;

case "del":
if($id !=1)
{
echo "Bu b&#246;lmeye giri&#351; icazeniz yoxdur!..<br/>\n";
break;
}
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a> / <u>".base64_decode($_GET['p'])."</u><br/>\n";
echo "*****<br/>\n";
if(!file_exists($base.'/'.$p.'/'.$h))
{
echo "<b>".$h."</b> bele bir hediyye m&#246;vcud deyil...<br/>";
}
else if(unlink($base.'/'.$p.'/'.$h))
{
echo "Hediyye silindi...<br/>";
}
else
{
echo "Xeta ba&#351; verdi yeniden yoxlay&#305;n...<br/>";
}
break;

case "1":
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps$url\">Hediyyeler</a> / <a href=\"hediyye.php?bol=5&amp;p=".base64_encode($p)."&amp;id=$id&amp;ps=$ps$url\">".$p."</a><br/>\n";
echo "*****<br/>\n";
if(!isset($_POST['action']))
{
if (!is_dir($base.'/'.$p))
{
echo "Bele bir kategoriya m&#246;vcud deyil.<br/>";
break;
}
else if (!file_exists($base.'/'.$p.'/'.$h))
{
echo "Hediyye tap&#305;lmad&#305;.<br/>";
break;
}
else if($h=="" or $p=="" or $h=="\\'" or $p=="\\'" or $p==".." or $p=="." or $h==".." or $h==".")
{
echo "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.<br/>";
break;
}
else if(!file_exists($base.'/'.$p.'/post.dat'))
{
echo "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.<br/>";
break;
}
else
{
if($nick!='')echo "<b>".$nick."</b> &#252;&#231;&#252;n se&#231;diyiniz hediyye.<br/>\n";
echo "<img $style src=\"".$base."/".$p."/".$h."\" width=\"75\" height=\"75\" alt=\"[hediyye]\"/><br/>";
}
list($qiymet) = file($base.'/'.$p.'/post.dat');

echo $divide;
$_v->action("hediyye.php?id=$id&amp;ps=$ps&amp;bol=1&amp;p=".$_GET['p']."&amp;h=".$h."".$url);

if($nick == ""){
echo "Leqeb:<br/>";
print $_v->input("<input name=\"nik$ref\" value=\"$nick\" maxlength=\"25\" type=\"text\"/>")."<br/>\n";
}
echo "&#220;rek s&#246;z&#252;n&#252;z:<br/>\n";
print $_v->input("<input name=\"soz$ref\" maxlength=\"300\" type=\"text\"/>")."<br/>\n";

$pf = "kat=".$_GET['p'].",";
$pf .= "no=".$_GET['h'].",";
if($nick!='')$pf .= "nik=".$nick.",";
$pf .= "action=gonder";
print $_v->submit("G&#246;nder",$pf);
if($qiymet!=''){
echo $divide;
echo "Xidmetin deyeri (<b>".$qiymet."</b>) Bald&#305;r.<br/>\n";
}
}
else
{
$no = trim($_POST["no"]);
$no = str_replace('/','',base64_decode($no));

$text = narmobil($_POST["soz"]);
$kat = trim($_POST["kat"]);
$kat = str_replace('/','',base64_decode($kat));
$nik = trim($_POST["nik"]);

if (!ctype_digit($nik)) {
$nik=trim($nik);    
if($nik=="")$nik=0;
$latuser=strtolower($nik);
$ts = @mysql_fetch_array(mysql_query("SELECT `id`,`user` FROM users WHERE `latuser`='".$latuser."';"));
} else {
$ts = @mysql_fetch_array(mysql_query("SELECT `id`,`user` FROM users WHERE `id`='".$nik."';"));
}
$nik = $ts["id"];
$usnick = $ts["user"];

$hed_bal = file($base.'/'.$kat.'/post.dat');

if($ts == false){
$error = "&#304;stifade&#231;i tap&#305;lmad&#305;.";
}else if(!is_dir($base."/".$kat)){
$error = "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.";
}else if(!file_exists($base.'/'.$kat.'/'.$no)){
$error = "Hediyye tap&#305;lmad&#305;.";
}else if(!file_exists($base.'/'.$kat.'/post.dat')){
$error = "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.";
}else if($no=="" or $kat=="" or $no=="\\'" or $kat=="\\'" or $no==".." or $kat==".." or $no=="." or $kat=="."){
$error = "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.";
}else if($row["bal"] < $hed_bal[0]){
$error = "Hediyye vermek &#252;&#231;&#252;n hesab&#305;n&#305;zda en az&#305; (<b>".$hed_bal[0]."</b>) Bal olmal&#305;d&#305;r.";
}else if($hed_bal[0]!=TRUE){
$error = "Qovlu&#287;u a&#231;maq m&#252;mk&#252;n deyil.";
}
if($error!=''){
echo $error."<br/>\n";
break;
}else{

$files = fopen("file/dat_folder/hediyye_i.dat", "w");
$xfil .= "$user\n";
$xfil .= "$usnick\n";
$xfil .= "".$base."/".$kat.'/'.$no."\n";
$xfil .= "$text\n";
$xfil .= "".($SERVER_TIME+43200)."";
fwrite($files, $xfil);
fclose($files);
if(@mysql_query("INSERT INTO `hediyye` SET `who` = '".$user."', `whoid` = '".$id."', `to` = '".$usnick."', `toid` = '".$nik."', `text` = '".$text."', time='".$SERVER_TIME."', `gif` = '".$kat.'/'.$no."';")){
@mysql_query ("Update users set bal='".($row["bal"]-$hed_bal[0])."' where id ='".$id."'");
$rnd = rand(0,99999999);
$today=date ("H:i");
for ($num = 0; $num <= 10; $num++){
$room = "room".$num;
$txt = "<u>$user</u> - <b>$usnick</b>, &#252;&#231;&#252;n <img $style src=\"".$base."/".$kat.'/'.$no."\" width=\"75\" height=\"75\" alt=\"[hediyye]\"/> hediyyesini ba&#287;&#305;&#351;lad&#305;";
$metn = "Hormetli <b>$usnick</b>. <u>$user</u>, Sizin &#252;&#231;&#252;n <img $style src=\"".$base."/".$kat.'/'.$no."\" width=\"75\" height=\"75\" alt=\"[hediyye]\"/> hediyyesini ba&#287;&#305;&#351;lad&#305;";
@mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='[Hediyye]', message='".$txt."', id='".$SERVER_TIME."', towhom='', hid='0', usid='7'");
}
@mysql_query("INSERT INTO `zapiski` SET `idtowhom`='".$nik."',`towhom`='".$usnick."',`idwho`='7',`time` = '".$SERVER_TIME."',`who`='[Hediyye]',`date` = '".date('H:i - d.m.y',$SERVER_TIME)."',`readd` = '0',`topic` = 'Yeni Hediyye',`message` = '".@$metn."';");
echo "Hediyyeniz <b>".$usnick."</b>, &#252;&#231;&#252;n g&#246;nderildi!, Te&#351;ekk&#252;r edirik!<br/>\n";
echo "Hesab&#305;n&#305;zdan (<b>".$hed_bal[0]."</b>) bal &#231;&#305;x&#305;laraq <b>".($row["bal"]-$hed_bal[0])."</b> bal, qald&#305;<br/>\n";
}else{
echo "Database Error<br/>\n";
}
}
}
break;

case "3":
$hid = int(intval($_GET['hid']));
$sql = mysql_query("select * FROM `hediyye` WHERE `id` = '".$hid."';");
if(mysql_affected_rows() == 0){
echo "Hediyye tap&#305;lmad&#305;.<br/>";
break;
}else if($nk==$id or $row['level'] >= 7){
@mysql_query("delete FROM `hediyye` WHERE `id` = '".$hid."';");
echo "Hediyye silind&#305;.<br/>";
break;
}else{
echo "Bura giri&#351; size qada&#287;and&#305;r.<br/>\n";
echo $divide;
}
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=2$url\">Geri Qay&#305;t</a><br/>\n";
break;

case "2":
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">".$nick."</a> - hediyyeleri.<br/>\n";
echo "*****<br/>\n";

$all = mysql_query("SELECT * FROM `hediyye` WHERE `toid` = '".$nk."';");
$total = mysql_num_rows($all);

list($page,$start,$max) = pagestart($total,5);
$query = mysql_query("SELECT id,who,whoid,text,time,gif FROM `hediyye` WHERE `toid` = '".$nk."' order by time desc limit $start,$max");
if(mysql_affected_rows()==false){
echo "<i>Hediyyesi yoxdur...</i><br/>";
}
while (list($hid,$who,$whoid,$text,$HEDIYYE_TIME,$gif) = mysql_fetch_array($query)){
if($start!=($page * $max)){
echo $divide;
}
if ($nk==$id or $row['level'] >= 7){
echo "[<a href=\"hediyye.php?bol=3&amp;id=$id&amp;ps=$ps&amp;hid=$hid&amp;nk=$nk$url\">sil</a>]";
}
echo "<img $style src=\"hediyye/".$gif."\" width=\"75\" height=\"75\" alt=\"Hediyye\"/><br/>";
if($text){
echo $text."<br/>";
}
echo "<b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$whoid$url\">$who </a></b> [".time_date($HEDIYYE_TIME)."]<br/>";
++$start;
}
if($total > $max){
echo $divide;
echo navigation("hediyye.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;nk=$nk$url",$total,$max,$page);
}
echo $divide;
echo "[<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;nk=".$nk."$url\">Hediyye ver</a>]<br/>\n";
break;
}

echo "*****<br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
?>