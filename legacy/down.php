<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$func = file("file/dat_folder/function.dat");
$down = trim($func[6]);
if($down==1){
wmlpage("Xeta", "Xeta: Xidmet Admin terefinden deaktiv olunub.<br/>");
}
WHO("-","-",BASENAME(__FILE__));

if($ver){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" \"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"ru\"><head>";
echo "<title>Fayl elave Et</title>";
echo "<link rel=\"stylesheet\" href=\"http://bye.az/chat/css.css\" type=\"text/css\"/>";
echo "</head><body><div class=\"head\"><b>Fayl elave Et</b></div>";
echo "<div class=\"menu\">";
}else{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card title=\"Down\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
}

if($id==1)echo "<a href=\"down.php?bol=panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>";
echo "<a href=\"down.php?id=$id&amp;ps=$ps&amp;bol=top&amp;ref=$ref\">Top 10 Y&#252;kleme</a><br/>\n";
echo "<a href=\"down.php?id=$id&amp;ps=$ps&amp;bol=search&amp;ref=$ref\">Fayl axtar</a><br/>****<br/>\n";

$saat = $row['d_time'];
if($saat > time()){
echo "Xidmet Status: <u>Aktiv</u><br/>";
echo "Qalan vaxt: ";
$yeni = $saat - time();
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
if ($gun_tam != 0)echo "".$gun_tam." g&#252;n ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "<br/>$divide";
}else{
echo "Xidmet Status: <u>Deaktiv</u><br/>";
echo "Y&#252;klemelerden balsiz istifade etmek xidmetini";
echo " <a href=\"down.php?bol=update&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Aktiv et</a>(500 bal)<br/>\n";
echo $divide;
}

switch ($bol) {
default:
$connect = mysql_query("SELECT * FROM `down`;");
$all = mysql_num_rows($connect);
if ( $all == 0 ){
echo "B&#246;lme yaradilmayib<br/>";
} else {
echo "<b>B&#246;lmeler</b><br/><br/>";
$s=0;
$ys=$s+1;
$q = mysql_query("SELECT * FROM `down` ORDER BY `id` ASC LIMIT 3;");
while ($inf = mysql_fetch_object($q)) {
$connectw = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$inf->id."';");
$cem = mysql_num_rows($connectw);
$connectq = mysql_query("SELECT * FROM `down_files` WHERE `type` = '".$inf->id."';");
$say = mysql_num_rows($connectq);
echo "$ys) <img src=\"img/dir.gif\"/><a href=\"down.php?bol=view&amp;sid=".$inf->id."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$inf->name."</a>($cem/$say)<br/>";
$ys++;
}
}
break;
case 'view':

$sid = intval($_GET['sid']);
$q = mysql_query("SELECT * FROM `down` WHERE `id` = '".$sid."' LIMIT 1;");
if (mysql_affected_rows() == 0) {
echo "Bele b&#246;lme yoxdur.<br/>";
break;
}
// lets go :)
$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$sid."';");
$cemi = mysql_num_rows($q);
if($cemi==0){
echo "Kataloq yaradilmayib<br/>";
break;
}

if(isset($HTTP_GET_VARS['del']) and $id== 1){
mysql_query("DELETE FROM k_down WHERE id='".$HTTP_GET_VARS['del']."'");
mysql_query("DELETE FROM down_files WHERE bolme='".$HTTP_GET_VARS['del']."'");
}

$q = mysql_query("SELECT COUNT(*) FROM `k_down` WHERE `kataloq` = '".$sid."';");
$cemi = mysql_num_rows($q);
$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($cemi/$max_page) < $page){
$start = 0;
$end = $max_page;
}
$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$sid."' ORDER BY `id` DESC LIMIT $start, $max_page;");
while ($inf = mysql_fetch_object($q)) {
$qs = mysql_query("SELECT * FROM `down_files` WHERE `bolme` = '".$inf->id."';");
$all = mysql_num_rows($qs);
$reqem = $start +1;
echo "$reqem)";
if($id==1)echo " [<a href=\"down.php?bol=view&amp;del=".$inf->id."&amp;sid=$sid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
echo "<img src=\"img/dir.gif\"/><a href=\"down.php?bol=show&amp;sid=$sid&amp;fid=".$inf->id."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$inf->name."</a>($all)<br/>";
++$start;
}
break;

case 'show':
$fid = intval($_GET['fid']);
$sid = intval($_GET['sid']);
$q = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$fid."' LIMIT 1;");
if (mysql_affected_rows() == 0){
echo "Bele b&#246;lme yoxdur.<br/>";
break;
}
$q = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$fid."';");
$infe = mysql_fetch_array($q);
$ee = $infe['id'];
$q = mysql_query("SELECT * FROM `down_files` WHERE `bolme` = '".$ee."';");
$cemi = mysql_num_rows($q);
if($cemi==0){
echo "Fayl elave edilmeyib<br/>";
break;
}
$q = mysql_query("SELECT * FROM `down_files` WHERE `bolme` = '".$ee."';");
$cemi = mysql_num_rows($q);
$q = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$fid."';");
$inf = mysql_fetch_array($q);
$k_name = $inf['name'];
$qa = mysql_query("SELECT * FROM `down` WHERE `id` = '".$sid."';");
$info = mysql_fetch_array($qa);
$b_name = $info['name'];
echo "Qovluq: <a href=\"down.php?bol=view&amp;sid=$sid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">$b_name</a> / $k_name<br/>$divide";
$max_page = 5;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($cemi/$max_page) < $page){
$start = 0;
$end = $max_page;
}
$q = mysql_query("SELECT * FROM `down_files` WHERE `bolme` = '".$ee."' ORDER BY `id` DESC LIMIT $start, $max_page;");
while ($inf = mysql_fetch_object($q)) {
$kid = $inf->id;
$name = $inf->name;
$type = $inf->type;
$count = $inf->count_download;
$file1 = $inf->file;
$file= "down/$b_name/$k_name/$file1";

if(!file_exists("down/$b_name/$k_name/$file1")){
echo ($start+1).") Fayl zedelenib<br/><br/>";
mysql_query ("DELETE from down_files where id = '".$kid."'");
}else{
$size = round( filesize( "".$file."" ) / 1024, 1 );
if(isset($HTTP_GET_VARS['del']) and $id == 1){
mysql_query("DELETE FROM down_files WHERE id='".$HTTP_GET_VARS['del']."'");
}
$reqem = $start +1;
$saat = $row['d_time'];
echo "$reqem) ";
if($id==1)echo "[<a href=\"down.php?bol=show&amp;del=".$inf->id."&amp;sid=$sid&amp;fid=$fid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
if($type==1){
echo "<img style=\"border: 1px solid #424503;\" src=\"down/$b_name/$k_name/$file1\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else if($type==2){
echo "<img style=\"border: 1px solid #424503;\" src=\"img/mp3.jpg\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else{
echo "<img style=\"border: 1px solid #424503;\" src=\"img/video.jpg\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}
echo "<br/>";
}
++$start;
}
if($cemi > $max_page){
echo navigation("down.php?bol=show&amp;sid=$sid&amp;fid=".$fid."&amp;id=$id&amp;ps=$ps&amp;ref=$ref", $cemi, $max_page, $page);
}
break;
case 'online':
$timer = ($vaxt - 120) + time();
$kkk = mysql_query("SELECT `id`, `user` FROM `users` WHERE `room` = '884' AND `time` > '".$timer."';");
$on = mysql_num_rows($kkk);
if($on!="0"){
echo "Online: ";
while($onl = mysql_fetch_array($kkk)){
$user = $onl['user'];
$c++;
echo "$user ,";
}
}
echo "<br/>";
break;

case 'search':
if(!isset($_POST['axtar'])){
echo "Fayl axtar:<br/>";
echo "<input name=\"text\" title=\"comment\" type=\"text\"/><br/>\n";
echo "B&#246;lme:<br/>";
echo "<select name=\"bolme\">\n";
$q = mysql_query("SELECT * FROM `down` ORDER BY `id` ASC LIMIT 3;");
while ($inf = mysql_fetch_object($q)) {
echo "<option value=\"".$inf->id."\">".$inf->name."</option>";
}
echo "</select> / ";
echo "[<anchor title=\"search\">Axtar<go href=\"down.php?bol=search&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"text\" value=\"$(text)\"/>";
echo "<postfield name=\"bolme\" value=\"$(bolme)\"/>";
echo "<postfield name=\"axtar\" value=\"ok\"/>";
echo "</go></anchor>]<br/>";
}else{
if($bolme > 3 or $bolme < 1){
echo "D&#252;zg&#252;n b&#246;lme se&#231;ilmedi<br/>";
break;
}
if(empty($text)){
echo "Axtari&#351; metnini yazmadiniz<br/>";
break;
}

$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$bolme."';");
while ($inf = mysql_fetch_object($q)) {
$gid = $inf->kataloq;
$query = mysql_query( "SELECT COUNT(*) FROM down_files WHERE (`name` LIKE \"%".$text."%\") or (`bolme`= \"".$gid."\");" );
}
$cemi = @mysql_result( @$query, 0 );
if($cemi==0){
echo "<u>$text</u> s&#246;z&#252;ne uy&#287;un he&#231; bir netice tapilmadi<br/>$divide";
echo "<a href=\"down.php?bol=search&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" accesskey=\"0\">&#171; Yene axtar</a><br/>\n";
break;
}
$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($cemi/$max_page) < $page){
$start = 0;
$end = $max_page;
}
echo "Tapildi <b>$cemi</b> fayl<br/>****<br/>";
$qr = mysql_query("SELECT * FROM `down` WHERE `id` = '".$bolme."';");
$t = mysql_fetch_object($qr);
$sid = $t->id;
$b_name = $t->name;

$rt = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$sid."';");
$yu = mysql_fetch_object($rt);
$k_name = $yu->name;
$fid = $yu->id;



$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$sid."';");
while ($inf = mysql_fetch_object($q)) {
$google = mysql_query( "SELECT * FROM `down_files` WHERE (`name` LIKE '%".$text."%') or (`bolme`= '".$inf->id."') order by id DESC limit {$start},{$max_page};" );
}
while( $inf = mysql_fetch_object( $google )){

$qr = mysql_query("SELECT * FROM `down` WHERE `id` = '".$bolme."';");
$t = mysql_fetch_object($qr);
$sid = $t->id;
$b_name = $t->name;

$rt = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$sid."';");
$yu = mysql_fetch_object($rt);
$k_name = $yu->name;
$fid = $yu->id;


$kid = $inf->id;
$name = $inf->name;
$type = $inf->type;
$count = $inf->count_download;
$file1 = $inf->file;
$file= "down/$b_name/$k_name/$file1";

$size = round( filesize( "".$file."" ) / 1024, 1 );
$saat = $row['d_time'];

if($type==1){
echo ($start+1).") <img style=\"border: 1px solid #424503;\" src=\"down/$b_name/$k_name/$file1\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else if($type==2){
echo ($start+1).") <img style=\"border: 1px solid #424503;\" src=\"img/mp3.jpg\" width=\"30\" height=\"30\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else{
echo ($start+1).") <img style=\"border: 1px solid #424503;\" src=\"img/video.jpg\" width=\"30\" height=\"30\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){
echo " <a href=\"download.php?id=$id&amp;lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>";
}else{
echo " Y&#252;kle<br/>";
}
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}
echo "<br/>";

++$start;
}
if($cemi > $max_page){
echo navigation("down.php?bol=show&amp;sid=$sid&amp;fid=".$sid."&amp;id=$id&amp;ps=$ps&amp;ref=$ref", $cemi, $max_page, $page);
}
}
break;

case 'panel':
// olmazzzz :)
if($id!='1'){
echo "Bas bayra!<br/>";
break;
}
// olarrr :)
switch($get){
default:
echo "<a href=\"down.php?bol=panel&amp;get=kataloq&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Kataloq Yarat</a><br/>";
echo "<a href=\"down.php?bol=panel&amp;get=fayl&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Fayl elave et</a><br/>";
echo "<a href=\"down.php?bol=panel&amp;get=tenzimle&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Y&#252;kleme qiymetleri</a><br/>";
echo "<a href=\"down.php?bol=panel&amp;get=restart&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sistem Restart</a><br/>";
break;

case 'kataloq':

if(isset($HTTP_POST_VARS["name"])){
$name = $HTTP_POST_VARS["name"];
if(strlen($name)>=3){
$name = chkdsk($name,basename(__FILE__));
}
}
if(!isset($_POST['add'])){
echo "Kataloq adi:<br/>";
echo "<input name=\"name\" title=\"name\" type=\"text\"/><br/>\n";
echo "Hansi B&#246;lmede:<br/>";
echo "<select name=\"bolme\">\n";
$q = mysql_query("SELECT * FROM `down` ORDER BY `id` ASC LIMIT 3;");
while ($inf = mysql_fetch_object($q)) {
echo "<option value=\"".$inf->id."\">".$inf->name."</option>";
}
echo "</select> / ";
echo "[<anchor title=\"go\">Yarat<go href=\"down.php?bol=panel&amp;get=kataloq&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"name\" value=\"$(name)\"/>";
echo "<postfield name=\"bolme\" value=\"$(bolme)\"/>";
echo "<postfield name=\"add\" value=\"ok\"/>";
echo "</go></anchor>]<br/>";
}else{
if($bolme!="1" && $bolme!="2" && $bolme!="3"){
echo "D&#252;zg&#252;n b&#246;lme se&#231;ilmedi<br/>$divide";
echo "<anchor>&#171; Geri<prev/></anchor><br/>\n";
break;
}
if(empty($name)){
echo "Kataloq adini yazmadiniz<br/>$divide";
echo "<anchor>&#171; Geri<prev/></anchor><br/>\n";
break;
}
if(strlen($name)<3){
echo "Ad &#231;ox qisadir.<br/>$divide";
echo "<anchor>&#171; Geri<prev/></anchor><br/>\n";
break;
}
if(strlen($name)>=20){
echo "Ad &#231;ox uzundur.<br/>$divide";
echo "<anchor>&#171; Geri<prev/></anchor><br/>\n";
break;
}
$select = mysql_query("SELECT * FROM `down` WHERE `id` = '".$bolme."';");
$inf = mysql_fetch_array($select);
$bname = $inf['name'];
$from = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$bolme."' AND `name` = '".$name."';");
if (mysql_affected_rows() == 0){
$oki = mysql_query("INSERT INTO `k_down` SET `kataloq` = '".$bolme."', `name` = '".$name."';");
if($oki){
echo "<u>$name</u> - adli kataloq <b>$bname</b>, adli b&#246;lmede yaradildi<br/>";
if ( !is_dir("down/".$bname."/".$name."")){
@mkdir( addslashes("down/".$bname."/".$name.""));
@chmod( addslashes("down/".$bname."/".$name.""), 02777 );
}
}else{
echo "Sehf ba&#351; verdi<br/>";
}
}else{
echo "Bu adda kataloq artiq yaratmisiniz.<br/>";
}
}
break;
case 'fayl':
if(!isset($_POST['add'])){
echo "B&#246;lme se&#231;in<br/>";
echo "<select name=\"bolme\">\n";
$q = mysql_query("SELECT * FROM `down` ORDER BY `id` ASC LIMIT 3;");
while ($inf = mysql_fetch_object($q)) {
echo "<option value=\"".$inf->id."\">".$inf->name."</option>";
}
echo "</select> -&#187; ";
echo "<anchor title=\"go\">Davam<go href=\"down.php?bol=panel&amp;get=fayl&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"bolme\" value=\"$(bolme)\"/>";
echo "<postfield name=\"add\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$bolme."';");
$num = mysql_num_rows($q);
if($num==0){
echo "Kataloq yaradilmayib<br/>";
break;
}
echo "Kataloq se&#231;in<br/>";
$qs = mysql_query("SELECT * FROM `down` WHERE `id` = '".$bolme."';");
$inf = mysql_fetch_object($qs);
$type = $inf->id;
echo "<select name=\"kat\">\n";
$q = mysql_query("SELECT * FROM `k_down` WHERE `kataloq` = '".$bolme."';");
while ($inf = mysql_fetch_object($q)) {
echo "<option value=\"".$inf->id."\">".$inf->name."</option>";
}
echo "</select> -&#187; ";
echo "<anchor title=\"go\">Davam<go href=\"down.php?bol=panel&amp;get=file&amp;bolme=$bolme&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"kat\" value=\"$(kat)\"/>";
echo "<postfield name=\"ver\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}
break;
case 'file':
$bolme = $_GET['bolme'];
$qse = mysql_query("SELECT * FROM `down` WHERE `id` = '".$bolme."';");
$infe = mysql_fetch_object($qse);
$b_name = $infe->name;
$bolme = $infe->id;
$qsw = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$kat."';");
$infw = mysql_fetch_object($qsw);
$k_name = $infw->name;
echo "B&#246;lme: <u>$b_name</u> / ";
echo "Kataloq: <u>$k_name</u><br/>$divide";
if($bolme==1){
if(isset($_POST['act'])){
if(empty($info)){
echo "Faylin adini yazin<br/>$divide";
}else{
if(!isset($file)){
echo "Fayl se&#231;mediniz<br/>$divide";
break;
}else{
$size = @FILESIZE($file);
if ( 1024 * 5100 < $size){
echo "Faylin hecmi &#231;ox b&#246;y&#252;kd&#252;r<br/>$divide";
}else{
$PHOTOFILE = $_FILES["file"]["tmp_name"];
$PAR = @GETIMAGESIZE($PHOTOFILE);
$t = time();
if($PAR[2]==1)$foto="$t.gif";
if($PAR[2]==2)$foto="$t.jpg";
if($PAR[2]==3)$foto="$t.png";
if($PAR[2]==4)$foto="$t.jpeg";
IF(($PAR[2]!="2")&&($PAR[2]!="1")&&($PAR[2]!="3")){
echo "Y&#252;klediyiniz &#351;killer <u> GIF, JPG, PNG, JPEG</u> formatlarinda olmalidir<br/>$divide";
}else{
$fer = rand(1000,99999);
$foto = "$fer-$foto";
if(file_exists("$b_name/$k_name/$foto")){
echo "Bu fayli daha &#246;nce elave etmisiniz<br/>$divide";
}else{
@COPY($PHOTOFILE, "down/$b_name/$k_name/".$foto);
mysql_query("INSERT INTO `down_files` SET `bolme` = '".$kat."', `file` = '".$foto."', `name` = '".$info."', `type` = '".$bolme."';");
echo "Bu fayl Bazaya elave olundu<br/>$divide";
}
}
}
}
}
}
echo "<form action=\"down.php?bol=panel&amp;get=file&amp;kat=$kat&amp;bolme=$bolme&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Faylin Adi:</b><br/>\n";
echo "<input type=\"text\" name=\"info\"/><br />\n";
echo "<b>Fayl:</b><br/>\n";
echo "<input type=\"file\" name=\"file\"/><br />\n";
echo "<input type=\"hidden\" name=\"act\" value=\"upload\" />\n";
echo "<input type=\"hidden\" name=\"ver\" value=\"ok\" />\n";
echo "<input type=\"submit\" value=\"Y&#252;kle\"/><br /></form>\n";
}else if($bolme==2){
if(isset($_POST['act'])){
if(empty($info)){
echo "Faylin adini yazin<br/>$divide";
}else{
if(!isset($file)){
echo "Fayl se&#231;mediniz<br/>$divide";
break;
}else{
$size = @FILESIZE($file);
if ( 1024 * 10000 < $size){
echo "Faylin hecmi &#231;ox b&#246;y&#252;kd&#252;r<br/>$divide";
}else{
$i = 1;
while ( $i < strlen( $_FILES['file']['name'] ) ){
if ( 0 < strpos( $_FILES['file']['name'], ".", $offst ) ){
$bf = strpos( $_FILES['file']['name'], ".", $offst );
$offst = $bf + 1;
}
++$i;
}
$typ = substr( $_FILES['file']['name'], $bf, strlen( $_FILES['file']['name'] ) - $bf + 1 );
$typ = strtolower( $typ );
$bunlar_olar = array( "wav","mp3","mid");
$pathinfo = pathinfo( $_FILES['file']['name'] );
if ( !in_array( strtolower( $pathinfo['extension'] ), $bunlar_olar ) ){
echo "Y&#252;klediyiniz Musiqi <u>MP3 , WAV , MID</u> formatlarinda olmalidir<br/>$divide";
}else{
$fer = rand(1000,99999);
$t= time();
$d = "$t-$fer$typ";
if(file_exists("down/$b_name/$k_name/$d")){
echo "Bu fayli daha &#246;nce elave etmisiniz<br/>$divide";
}else{
$PHOTOFILE = $_FILES['file']['tmp_name'];
@COPY($PHOTOFILE, "down/$b_name/$k_name/".$d);
mysql_query("INSERT INTO `down_files` SET `bolme` = '".$kat."', `file` = '".$d."', `name` = '".$info."', `type` = '".$bolme."';");
echo "Bu fayl Bazaya elave olundu<br/>$divide";
}
}
}
}
}
}
echo "<form action=\"down.php?bol=panel&amp;get=file&amp;kat=$kat&amp;bolme=$bolme&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Faylin Adi:</b><br/>\n";
echo "<input type=\"text\" name=\"info\"/><br />\n";
echo "<b>Fayl:</b><br/>\n";
echo "<input type=\"file\" name=\"file\"/><br />\n";
echo "<input type=\"hidden\" name=\"act\" value=\"upload\" />\n";
echo "<input type=\"hidden\" name=\"ver\" value=\"ok\" />\n";
echo "<input type=\"submit\" value=\"Y&#252;kle\"/><br /></form>\n";

}elseif($bolme==3){
if(isset($_POST['act'])){
if(empty($info)){
echo "Faylin adini yazin<br/>$divide";
}else{
if(!isset($file)){
echo "Fayl se&#231;mediniz<br/>$divide";
break;
}else{
$size = @FILESIZE($file);
if ( 1024 * 5100 < $size){
echo "Faylin hecmi &#231;ox b&#246;y&#252;kd&#252;r<br/>$divide";
}else{
$i = 1;
while ( $i < strlen( $_FILES['file']['name'] ) ){
if ( 0 < strpos( $_FILES['file']['name'], ".", $offst ) ){
$bf = strpos( $_FILES['file']['name'], ".", $offst );
$offst = $bf + 1;
}
++$i;
}
$typ = substr( $_FILES['file']['name'], $bf, strlen( $_FILES['file']['name'] ) - $bf + 1 );
$typ = strtolower( $typ );
$bunlar_olar = array("mp4","3gp");
$pathinfo = pathinfo( $_FILES['file']['name'] );
if ( !in_array( strtolower( $pathinfo['extension'] ), $bunlar_olar ) ){
echo "Y&#252;klediyiniz Video <u>3GP , MP4</u> formatlarinda olmalidir<br/>$divide";
}else{
$PHOTOFILE = $_FILES['file']['tmp_name'];
$fer = rand(1000,99999);
$t = time();
$d = "$t-$fer$typ";
if(file_exists("down/$b_name/$k_name/$d")){
echo "Bu fayli daha &#246;nce elave etmisiniz<br/>$divide";
}else{
@COPY($PHOTOFILE, "down/$b_name/$k_name/".$d);
mysql_query("INSERT INTO `down_files` SET `bolme` = '".$kat."', `file` = '".$d."', `name` = '".$info."', `type` = '".$bolme."';");
echo "Bu fayl Bazaya elave olundu<br/>$divide";
}
}
}
}
}
}
echo "<form action=\"down.php?bol=panel&amp;get=file&amp;kat=$kat&amp;bolme=$bolme&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Faylin Adi:</b><br/>\n";
echo "<input type=\"text\" name=\"info\"/><br />\n";
echo "<b>Fayl:</b><br/>\n";
echo "<input type=\"file\" name=\"file\"/><br />\n";
echo "<input type=\"hidden\" name=\"act\" value=\"upload\" />\n";
echo "<input type=\"hidden\" name=\"ver\" value=\"ok\" />\n";
echo "<input type=\"submit\" value=\"Y&#252;kle\"/><br /></form>\n";
}
break;
case 'restart':
if($go==del){
@MYSQL_QUERY("TRUNCATE TABLE k_down;");
@MYSQL_QUERY("TRUNCATE TABLE down_files;");
echo "Emr icra edildi. Te&#351;ekk&#252;rler =)<br/>";
break;
}
echo "B&#252;t&#252;n kataloqlari ve hemin kataloqdaki fayllari silmeye eminsiniz?<br/><br/>";
echo "<a href=\"down.php?go=del&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">He</a> | <a href=\"down.php?bol=panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yox</a><br/>";
break;
}
break;


case 'tenzimle':

print "salam<br/>";

break;







case 'top':
echo "<b>Top 10 y&#252;klenen fayllar</b><br/>$divide";
$q = mysql_query("SELECT * FROM `down_files` ORDER BY `count_download` DESC LIMIT 10;");
$sayi = mysql_num_rows($q);
if($sayi==0){
echo "Siyahi bo&#351;dur.<br/>";
}else{
$reqem = 0;
$plus = $reqem +1;
$r = mysql_query("SELECT * FROM `down_files` ORDER BY `count_download` DESC LIMIT 10;");
while ($sorgu = mysql_fetch_object($r)) {
$kid = $sorgu->id;
$type = $sorgu->type;
$name = $sorgu->name;
$file = $sorgu->file;
$bolme = $sorgu->bolme;
$count = $sorgu->count_download;
$q = mysql_query("SELECT * FROM `k_down` WHERE `id` = '".$bolme."';");
$inf = mysql_fetch_array($q);
$kat = $inf['kataloq'];
$k_name = $inf['name'];
$qa = mysql_query("SELECT * FROM `down` WHERE `id` = '".$kat."';");
$info = mysql_fetch_array($qa);
$b_name = $info['name'];
$file1= "down/$b_name/$k_name/$file";
$size = round( filesize( "".$file1."" ) / 1024, 1 );
$reqem = $start +1;
$saat = $row['d_time'];
$sid = $kat;
$fid = $bolme;
echo "$plus) ";
if($type==1){
echo "<img style=\"border: 1px solid #424503;\" src=\"down/$b_name/$k_name/$file\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){ echo " <a href=\"download.php?lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>"; }else{ echo " Y&#252;kle<br/>"; }
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else if($type==2){
echo "<img style=\"border: 1px solid #424503;\" src=\"img/mp3.jpg\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){ echo " <a href=\"download.php?lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>"; }else{ echo " Y&#252;kle<br/>"; }
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}else{
echo "<img style=\"border: 1px solid #424503;\" src=\"img/video.jpg\" width=\"60\" height=\"60\" alt=\"Photo\" /> <b>$name</b><br/>&#246;l&#231;&#252;: $size Kb |";
if($saat > time()){ echo " <a href=\"download.php?lid=$kid&amp;sid=$sid&amp;fid=$fid\">Y&#252;kle</a><br/>"; }else{ echo " Y&#252;kle<br/>"; }
echo "Y&#252;klenib: <u>$count</u> defe<br/>";
}
echo "<br/>";
++$plus;
}
}
break;
case 'update':
$w = 86400;
$s = $w * 30;
$d_time = $row['d_time'];
$total = $d_time + $s;
$w = 86400;
$s = $w * 30;
$saat = 2592000 + time();
$yeni = $d_time - time();
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
if($d_time > time()){
echo "Bu xidmet sizin &#252;&#231;&#252;n aktivdir. Xidmetin deaktiv olmasina <u>";
if ($gun_tam != 0)echo "".$gun_tam." g&#252;n ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "</u> qalib<br/>";
}else{
$deyer = 500;
$bal = $row['bal'];
if($bal < $deyer){
echo "Bu xidmetden <u>1</u> ay yararlanmaq &#252;&#231;&#252;n hesabinizda en azi <b>$deyer</b> bal olmalidir<br/>";
}else{
$timer = 2592000 + time();
mysql_query("UPDATE `users` SET `d_time` = '".$timer."' WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `bal` = bal - $deyer WHERE `id` = '".$id."';");
echo "Bu xidmet sizin &#252;&#231;&#252;n aktiv edildi. Hesabinizdan $deyer bal &#231;ixildi.<br/>";
}
}
break;
}
echo $divide;
$timers = ($vaxt - 120) + time();
$w = mysql_query("SELECT `id`, `user` FROM `users` WHERE `room` = '884' AND `time` > '".$timers."';");
$online = mysql_num_rows($w);
if($bol!="online"){
if($online==0){
echo "Onlinede he&#231; kim yoxdur<br/>$divide";
}else{
echo "Online: <a href=\"down.php?id=$id&amp;ps=$ps&amp;bol=online&amp;ref=$ref\"><u>$online</u></a>, nefer<br/>$divide";
}
}
if($ver){
echo "</div><div class=\"foot\">\n";
echo "<a href=\"down.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Ana Sehife</a> / ";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";
echo "</div></body></html>";
}else{
echo "<a href=\"down.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Ana Sehife</a> / ";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";
echo $fsize2;
echo "</p></card></wml>";
}
mysql_close ($link);
?>