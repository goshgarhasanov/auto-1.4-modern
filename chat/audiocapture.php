<?php
/*
Php`ni yigdi => GangstaR_Rio , Elaqe => Sonic.Dash@List.ru
Muellif huquqlarini pozana haqqimi halal etmirem!...
*/
ob_start();
require("inc.php");
require_once('file/require/Mobile_Detect.php');
$link = connect_db();
$detect = new Mobile_Detect;
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
function full_del_dir($directory)
{
$dir = opendir($directory);
while ($file = readdir($dir))
{
if (is_file($directory."/".$file))
{
@unlink($directory."/".$file);
}
else if (is_dir($directory."/".$file) && $file != "." && $file != "..")
{
full_del_dir($directory."/".$file);
}

}
@closedir($dir);
@rmdir($directory);
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

function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", strtolower($array[$c]));
}
++$c;
}
if(preg_match("/(hr+cp|echo|print|href)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}

function gen($size = 5){
return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ0123456789'), 0, mt_rand($size, $size));
}

function users($values='', $user) {if($values!=''){$vars = $values;
}else{$vars = '*';
}
$user = mysql_escape_string($user);
if(is_numeric($user)) {
$Sql = "SELECT $vars FROM `users` WHERE `id`='".$user."'";
$Query = @Mysql_Query($Sql);
} else {
$Sql = "SELECT $vars FROM `users` WHERE LOWER(`user`)='". strtolower($user) ."'";
$Query = @Mysql_Query($Sql);
}
$Result = @MySql_Fetch_Array($Query);
mysql_free_result($Query);
return $Result;
}


function filesize_formatted($size,$type=false){
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
	
	if($type){
	 $type = ' '.$units[$power];
	}
	
    return number_format($size / pow(1024, $power), 2, '.', ',').$type;
}

if($_v->ver=='wml'){
$_v->ver="vista1";
}

$_v->key($nk);
settype($nk,'integer');

$audio = file("file/dat_folder/audio.dat");
$a_limit = trim($audio[0]);
$a_size = trim($audio[1]);
$a_post = trim($audio[2]);

$inf = users('*',$nk);
$mesaj_qeb = $inf["mesaj"];
$nk_user = $inf["user"];
$user = $row['user'];

if ($rm != "") $lin = "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
else $lin = "<a href=\"javascript:history.back(1)\">Geri Qay&#305;t</a><br/>\n";

$mesaj = "<hr style='border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'/><i>G&#252;n &#601;rzind&#601; {$a_limit} s&#601;s fayl g&#246;nd&#601;r&#601; bil&#601;rsiniz.</i>";

$act = strip_tags($_GET['act']);
	
switch($act){
	case 'panel':
	$_v->title('Fayl s&#601;s panel');
	$_v->fsize1($fsize1);
	
	if($row['level']!=9){
	echo "Bu b&#246;lm&#601;y&#601; girm&#601;y&#601; icaz&#601;niz yoxdur!.<br/>\n";
	echo $divide;
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	break;
	}

	if($_POST['action']){
	$limit = intval($_POST['limit']);
	$size = intval($_POST['size']);
	$post = intval($_POST['post']);

	file_put_contents('file/dat_folder/audio.dat',$limit."\n".$size."\n".$post);
	echo "<b style='color: green;'>H&#246;rmetli <u>".$row['user']."</u> melumat&#305; yenilendi!</b><br/>\n";
	echo $divide;
	}
	
	echo "<b>Fayl s&#601;s paneli</b><br/>\n";
	echo $divide;

	$_v->action("audiocapture.php?act=$act&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

	echo "Fayl Limit:<br/>\n";
	print $_v->input("<input name=\"limit\" maxlength=\"3\" size=\"3\" format=\"*N\" value=\"{$a_limit}\" emptyok=\"false\"/>")." - d&#601;f&#601;<br/>\n";

	echo "Fayl &#214;l&#231;&#252;:<br/>\n";
	print $_v->input("<input name=\"size\" maxlength=\"3\" size=\"3\" format=\"*N\" value=\"{$a_size}\" emptyok=\"false\"/>")." - MB<br/>\n";

	echo "Fayl Post:<br/>\n";
	print $_v->input("<input name=\"post\" maxlength=\"3\" size=\"3\" format=\"*N\" value=\"{$a_post}\" emptyok=\"false\"/>")." - post<br/>\n";
	
	$_v->divide();
	print $_v->submit("Yenile","action=send");
	echo $divide;
	
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	break;
	
	default:

if(!is_dir('audio/'.$id)){
@mkdir(addslashes('audio').'/'.$id);
@chmod(addslashes('audio').'/'.$id, 0777);
}

if($handle = opendir('audio/'.$id)){
$c = 0;
while(false !== ($files = readdir($handle))){
if ($files != "." && $files != ".." && $files != "Thumbs.db"){
$a[]=$files;
$c++;
}
}
closedir($handle);  
}
$myfoto=count($a);
#--------------------------------------------------------------------
//->Destkop detection...
#--------------------------------------------------------------------
if(!$detect->isMobile()){
$_v->mypage('Xeta!',"S&#601;s fayl&#305; payla&#351;maq &#252;&#231;&#252;n z&#601;hm&#601;t olmasa mobil browserd&#601;n daxil olun!.".$mesaj, $lin);
}

#--------------------------------------------------------------------
//->Ozu-Ozunue...
#--------------------------------------------------------------------
if($id==$nk){
$_v->mypage('Xeta!',"&#214;z&#252;n&#252;z&#601; s&#601;s fayl&#305; g&#246;nd&#601;r&#601; bilm&#601;zsiniz!".$mesaj, $lin);
}
#--------------------------------------------------------------------
//->Iqnor check...
#--------------------------------------------------------------------
@mysql_query ("Select * from `ignor` where `usid`='$id' and `id`='$nk';");
if(mysql_affected_rows() == true){
$_v->mypage('Xeta!',"<b>".$nk_user."</b> <i>Sizi ignor edib!..Bu o dem&#601;kdir ki, o sizinl&#601; dan&#305;&#351;maq ist&#601;mir!..</i>".$mesaj, $lin);
}
#--------------------------------------------------------------------
//->Iqnor_info check...
#--------------------------------------------------------------------
#--------------------------------------------------------------------
//->Dost check...
#--------------------------------------------------------------------
if($mesaj_qeb != 0){
if($mesaj_qeb == 1){
@mysql_query ("Select * from `friends` where `usid`='$id' and `id`='$nk';");
if(mysql_affected_rows() == false){
$_v->mypage('Xeta!',"<b>Bu istifad&#601;&#231;i yaln&#305;z <u>Dostlar&#305;ndan</u> mesaj q&#601;bul edir!</b>".$mesaj, $lin);
}
}else{
$_v->mypage('Xeta!',"<u><b>Bu istifad&#601;&#231;i mesaj q&#601;bul etmir!</b></u>".$mesaj, $lin);
}
}
#------------------------------------------------------------------
//->No user
#------------------------------------------------------------------
$u_s = mysql_query ("Select `user`,`id`,`time`,`zn` from `users` WHERE `id` = '$nk';");
if(mysql_affected_rows() == 0){
$_v->mypage('Xeta!',"Axtard&#305;q&#305;n&#305;z &#304;stifad&#601;&#231;i Tap&#305;lmad&#305;.<br/>\n".$mesaj, $lin);
}
#------------------------------------------------------------------
//->200 Post
#------------------------------------------------------------------
if($row['posts'] < $a_post){
$_v->mypage('Xeta!',"S&#601;s fayl&#305; payla&#351; xidm&#601;tind&#601;n istifad&#601; etm&#601;k &#252;&#231;&#252;n<br/>Sizin minumum <b>{$a_post}</b> postunuz olmal&#305;d&#305;r!<br/>\n".$mesaj, $lin);
}
#------------------------------------------------------------------
if(isset($go)){
$file = $_FILES['file'];
$size = $file['size'];
if($file['tmp_name']){
$size_format = filesize_formatted($size);
}
$audio_up = $file['type'];
$audio_up_type = explode("/", $audio_up);
$audio_up_type_firstpart = $audio_up_type[0];
$photo_type = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
$rn = rand(100, 99999);
$copyfoto = basename($id.'_'.$rn.'.'.$photo_type);
$newfoto = false;
	
if($file['name'] == ''){
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "<b>Siz fayl&#305; se&#231;m&#601;diniz.</b>".$mesaj, $lin);
}

$today = strtotime(date("d.m.Y"));
$count = mysql_query("SELECT * FROM `mesaj` WHERE `idwho` = '$id' AND `photo` != 'NULL' AND `type` = '1' AND `time` >= '$today';");
if(mysql_num_rows($count) == $a_limit){
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "G&#252;n &#601;rzind&#601; {$a_limit} d&#601;f&#601; S&#601;s Fayl&#305; Payla&#351;a bil&#601;rsiniz!".$mesaj, $lin);
}

$total_mms = mysql_query("SELECT * FROM `mesaj` WHERE `olcu` = '$size_format' AND `type` = '1' AND `idwho` = '$id' AND `idtowhom` = '$nk';");
if (mysql_num_rows($total_mms) != 0){
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "<b>Bu s&#601;s fayl&#305; siz daha &#246;nc&#601; <u>{$nk_user}</u>, l&#601;q&#601;bli istifad&#601;&#231;iy&#601;  g&#246;nd&#601;ribsiniz!</b>".$mesaj, $lin);
}
 
if($audio_up_type_firstpart != "audio"){
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "<b>Yaln&#305;z s&#601;s fayllar&#305; payla&#351;maq olar.</b>".$mesaj, $lin);
}

if($size > (1024*1024*$a_size)){
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "<b>S&#601;s fayl&#305;n h&#601;cmi {$a_size} Mb-dan &#231;ox ola bilm&#601;z.</b>".$mesaj, $lin);
}

if(file_exists('audio/'.$id.'/'.$copyfoto)){
unlink('audio/'.$id.'/'.$copyfoto);
}

if(copy($file['tmp_name'], 'audio/'.$id.'/'.$copyfoto)){
$query = mysql_query("insert into `mesaj` set  `who`='$user', `idwho`='$id', `towhom`='$nk_user', `idtowhom`='$nk', `time`='$SERVER_TIME', `olcu` = '$size_format', `photo` = '$copyfoto', `type` = '1';");
if($query){
$newfoto = true;
}else{
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "Mysql s&#601;hvlik kodu: ".mysql_error().$mesaj, $lin);	
}
}else{
$_v->mypage("S&#601;s Fayl&#305; Payla&#351;", "<b>S&#601;s fayl y&#252;kl&#601;nm&#601;di!.</b>".$mesaj, $lin);		
}
}

if($newfoto){
	header("Location: arxiv.php?id=$id&ps=$ps&nk=$nk");
	die();
}else{
    $_v->title('S&#601;s Fayl&#305; Payla&#351;','center');
    $_v->fsize1($fsize1);
	$_v->html("<p id='media' style='display:none'></p>");
	$_v->html("<div id='media'>");
	$today = strtotime(date("d.m.Y"));
    $total = mysql_query("SELECT * FROM `mesaj` WHERE `idwho` = '$id' AND `photo` != 'NULL' AND `type` = '1' AND `time` >= '$today';");
	if($myfoto!=0){echo "Cemi <b>".$myfoto."</b> S&#601;s Fayl&#305; Payla&#351;m&#305;san.<br/>\n";}
	echo "Bu g&#252;nl&#252;k <b>".($a_limit - mysql_num_rows($total))."</b> S&#601;s Fayl Daha Payla&#351;a bil&#601;rs&#601;n!.";
	$_v->html("<div id='ileft'>");
	$_v->html('<div class="sms">');
	echo "Loqin: $nk_user<hr style='border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));'/>";
    echo "<form action=\"audiocapture.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\" method=\"post\" enctype=\"multipart/form-data\">\n";
	echo "S&#601;s fayl&#305; se&#231;:<br/>\n";
	print $_v->input("<input type=\"file\" name=\"file\" accept=\"audio/*\" capture=\"microphone\"/>");
	if($row['level']==9) echo " <a href=\"audiocapture.php?act=panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#xbb;&#xbb;</a>";
	echo "<br/>";
	print $_v->submit( "G&#246;nd&#601;r", "nick=".$nk_user.",go=send" )."</div>";
	$_v->divide('html');
    echo "* G&#246;nd&#601;ril&#601;c&#601;k fayl {$a_size} mb -dan b&#246;y&#252;k olmamal&#305;d&#305;r.<br/>";	
	$_v->html("</div></div>");
	$_v->divide('html');
	echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Arxiv s&#246;hb&#601;t</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
}
}

$_v->fsize2($fsize2);
$_v->end('0',$link);
ob_end_flush();
?>