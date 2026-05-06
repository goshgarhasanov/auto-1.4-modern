<?php
require "file/dat_folder/n_n/rnick.inc";
@DEFINE('LINK_PATH','');
@DEFINE('RN_DIRECTORY', 'img/rn');
@DEFINE('PAGE_LIMIT',   10);
@DEFINE('PHP_SELF', basename($_SERVER['SCRIPT_NAME']));
@DEFINE('CASE_MOD', INTVAL($HTTP_GET_VARS['mod']));


CLASS FUNCTIONS{
FUNCTION DTIME($NEW){
$DAY= @FLOOR($NEW / 86400);
$HOUR   = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
$MINUT  = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
$SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
$DAY= ($DAY!=0) ? $DAY." g&#252;n " : FALSE;
$HOUR   = ($HOUR!=0) ? $HOUR." saat " : FALSE;
$MINUT  = ($MINUT!=0) ? $MINUT." deq " : FALSE;
$SECOND = ($SECOND!=0) ? $SECOND." san" : FALSE;
RETURN $DAY.$HOUR.$MINUT.$SECOND;
}
FUNCTION PAGESTART($TOTAL,$MAX){
GLOBAL $HTTP_GET_VARS;
$VARS = $HTTP_GET_VARS['page'];
$PAGE = (!ISSET($VARS)) ? 0 : INTVAL($VARS);
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}
RETURN ARRAY($PAGE,$START,$MAX);
}
FUNCTION PAGENAV($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
$_NEXTPAGE = "N&#246;vbeti";
$_PREVPAGE = "Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
$STRING_P = FALSE;
IF($ON_P==1){
$STRING_P = '<a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($TOTAL_P>10){
$MAX_P = ($TOTAL_P>3) ? 3 : $TOTAL_P;
FOR($START=1; $START<$MAX_P + 1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$MAX_P){
$STRING_P .= " ";
}
}
IF($TOTAL_P>3){
IF($ON_P>1 && $ON_P<$TOTAL_P){
$STRING_P .= ($ON_P>5) ? ' ... ' : ' ';
$MIN_P = ($ON_P>4) ? $ON_P : 5;
$MAX_P = ($ON_P<$TOTAL_P-4) ? $ON_P : ($TOTAL_P-4);
FOR($START=$MIN_P-1; $START<$MAX_P+2; $START++){
$STRING_P .= ($START == $ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$MAX_P+1){
$STRING_P .= ' ';
}
}
$STRING_P .= ($ON_P<$TOTAL_P-4) ? ' ... ' : ' ';
} else {
$STRING_P .= ' ... ';
}
FOR($START=$TOTAL_P-2; $START<$TOTAL_P+1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]'  : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$TOTAL_P){
$STRING_P .= " ";
}
}
}
} else {
FOR($START=1; $START<$TOTAL_P+1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$TOTAL_P){
$STRING_P .= ' ';
}
}
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P."<br/>";
}
FUNCTION COUNT_IMG_FILES($DIRECTORY){
IF(@IS_DIR($DIRECTORY)){
 $DIR_HANDLE = @OPENDIR($DIRECTORY);
}
IF(!$DIR_HANDLE){
 RETURN FALSE;
}
$COUNT = 0;
WHILE($IMG = @READDIR($DIR_HANDLE)){
IF($IMG!="." AND $IMG!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($IMG))){
IF(!IS_DIR($DIRECTORY."/".$IMG)){
 $COUNT++;
} else {
 $COUNT += FUNCTIONS::COUNT_IMG_FILES($DIRECTORY."/".$IMG);
}
}
}
@CLOSEDIR($DIR_HANDLE);
RETURN $COUNT;
}
FUNCTION GENERATOR_IMG($VALUE){
IF(!FILE_EXISTS(RN_DIRECTORY.'/'.$VALUE.'.gif')){
RETURN $VALUE;
} else {
RETURN FUNCTIONS::GENERATOR_IMG($VALUE+1);
}
}
}

$FN = NEW FUNCTIONS;
@REQUIRE("inc.php");
$LINK = connect_db();
LIST($row, $id, $ps, $fsize1, $fsize2) = check_login($LINK);
$ref = RAND(1000,9999);


IF(CASE_MOD==4){
if($_v->ver=="wml")$_v->ver="vista1";
}

$_v->title('Super Nikler','left');


$_v->fsize1($fsize1);
SWITCH(CASE_MOD){
DEFAULT:
if($id=='1'){
echo "<a href=\"rnick.php?mod=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Super Nik Panel</b></a><br/>\n";
}
$DIRECTORY = @OPENDIR(RN_DIRECTORY);
IF(!$DIRECTORY){
echo $divide."\n";
echo "<u>Bazada super nik yoxdur.</u><br/>\n";
} else {
echo "Super nik funksiyas&#305; sizin diger istifade&#231;ilerden ferqlenmeniz &#252;&#231;&#252;nd&#252;r.<br/>\n";
echo "Xidmetden istifade m&#252;ddeti sizden asl&#305;d&#305;r.<br/>\n";
$_v->divide();
 if(file_exists('i/'.$id.'.gif') or $row['rn_time']>$SERVER_TIME){
echo "H&#246;rmetli <b>".$row['user']."</b> Sizin art&#305;q rengli nikiniz var.<br/>\n";
if($row['rn_time']>$SERVER_TIME){
echo "Vaxt&#305;n bitmesine <u>".$FN->DTIME($row['rn_time'] - $SERVER_TIME)."</u> qal&#305;b.<br/>\n";
}
echo "Yeni nik almaq &#252;&#231;&#252;n nikinizi le&#287;v etmelisiz..<br/>\n";
echo $divide."\n"; 
echo "<img src=\"i/".$id.".gif?$ref\" alt=\"Nik\"/> - [<a href=\"rnick.php?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]<br/>\n";
} else {
echo "Hesab&#305;n&#305;zda (<b>".$row['bal']."</b>) bal var.<br/>";
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;bolme=bal\">Bal y&#252;kleme qaydas&#305;</a><br/>";
}
//echo $divide."\n";
$rn_total_users = mysql_result(mysql_query("select count(1) from `users` where `rn_time`>'".$SERVER_TIME."'"),0);
if($rn_total_users!=0){
    echo $divide;
    echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;mod=7\">Rengli nikliler</a>(".$rn_total_users.")<br/>";
}
echo $divide."\n";
if($id=='1'){
IF(ISSET($_GET['cid'])){
$DEL = STR_REPLACE("../", "", $_GET['cid']);
$DEL = STR_REPLACE("./", "",  $DEL);
IF(!FILE_EXISTS(RN_DIRECTORY."/".$DEL)){
echo "Qeyd etdiyiniz nik bazada m&#246;vcut deyil!<br/>\n";
} else {
@UNLINK(RN_DIRECTORY."/".$DEL);
echo "Qeyd etdiyiniz nik bazadan silindi!<br/>\n";
}
echo $divide."\n";
}
}
$_ARR = @ARRAY();
WHILE($RN = @READDIR($DIRECTORY)){
IF($RN!="." AND $RN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($RN))){
$_ARR[] = $RN;
}
}
$TOTAL = COUNT($_ARR);
echo "Cemi: (<b>".$TOTAL."</b>) rengli nick var.<br/>\n";
echo $divide."\n";
LIST($PAGE,$START,$MAX) = $FN->PAGESTART($TOTAL,PAGE_LIMIT);
$END = !ISSET($PAGE) ? $MAX : ($START+$MAX);
WHILE($START<$END){
IF(!EMPTY($_ARR[$START])){
if($id=='1'){
echo "[<a href=\"rnick.php?cid=".$_ARR[$START]."&amp;id=$id&amp;ps=$ps&amp;page=".$PAGE."&amp;ref=$ref\">x</a>]\n";
}
echo "".($START+1).") <a href=\"rnick.php?mod=1&amp;rn=".($START+1)."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><img src=\"".LINK_PATH.RN_DIRECTORY."/".$_ARR[$START]."\" alt=\"Nik\"/></a>\n";
echo "<br/>\n";
}
$START++;
}
IF($TOTAL>$MAX){
echo $divide."\n";
echo $FN->PAGENAV(PHP_SELF."?&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $TOTAL, $MAX, $PAGE);
}
}
BREAK;

CASE(1):
$_v->action("rnick.php?mod=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

$DIRECTORY = @OPENDIR(RN_DIRECTORY);
$_ARR = @ARRAY();
WHILE($RN = @READDIR($DIRECTORY)){
IF($RN!="." AND $RN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($RN))){
$_ARR[] = $RN;
}
}
IF(ISSET($_GET['rn'])){
$NIK = INTVAL($_GET['rn']);
IF(!EMPTY($_ARR[$NIK-1])){
$ICON_RN = "<img src=\"".LINK_PATH.RN_DIRECTORY."/".$_ARR[$NIK-1]."\" alt=\"Nik\"/>\n";
} else {
$ICON_RN = FALSE;
}
}
IF(!$DIRECTORY){
echo "Bazada nik yoxdur<br/>\n";
} else {
IF(ISSET($NIK)){
IF(!$ICON_RN!=""){
echo "Se&#231;diyiniz nik bazada m&#246;vcut deyil!<br/>\n";
echo $divide."\n";
echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
BREAK;
} else {
echo $ICON_RN." - Se&#231;diyiniz nik!<br/>\n";
echo $divide."\n";
}
} else {
echo "Nik Se&#231;in:<br/>\n";

$option .="<select name=\"nik\">|";
$START = 0;
$TOTAL = COUNT($_ARR);
WHILE($START<$TOTAL){
IF(!EMPTY($_ARR[$START])){
$option .= "<option value=\"".($START+1)."\">Nik - ".($START+1)."</option>|";
}
$START++;
}
$option .="</select>";
print $_v->select($option)."<br/>\n";
}
}
echo "Vaxt Se&#231;in:<br/>\n";

$option .="<select name=\"time\">|";
FOREACH($RNICK AS $VALUE => $KEY){
$option .= "<option value=\"".$VALUE."\">".$FN->DTIME($VALUE)." - ".$RNICK[$VALUE]." Bal</option>|";
}
$option .="</select>";
print $_v->select($option)."<br/>\n";

print $_v->submit("Elave Et","nik=".$NIK);  
BREAK;

CASE(2):
$DIRECTORY = @OPENDIR(RN_DIRECTORY);
$_ARR = @ARRAY();
WHILE($RN = @READDIR($DIRECTORY)){
IF($RN!="." AND $RN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($RN))){
$_ARR[] = $RN;
}
}
$NIK = INTVAL($_POST['nik']);
$TIME = INTVAL($_POST['time']);
IF(!EMPTY($_ARR[$NIK-1])){
$RN_NAME = STRTOK($_ARR[$NIK-1], ".");
$ICON_RN = "<img src=\"".LINK_PATH.RN_DIRECTORY."/".$_ARR[$NIK-1]."\" alt=\"Nik\"/>\n";
} else {
$ICON_RN = FALSE;
}
IF(!$DIRECTORY){
echo "Bazada nik yoxdur<br/>\n";
} else {
$RN_REG = array(3600, 43200, 86400, 259200, 604800, 2592000);
$ERROR = FALSE;
IF($TIME=='3600'){
} elseIF($TIME=='43200'){
} elseIF($TIME=='86400'){
} elseIF($TIME=='259200'){
} elseIF($TIME=='604800'){
} elseIF($TIME=='2592000'){
} else {
$ERROR = "<b>Xeta:</b> Vaxt d&#252;zg&#252;n se&#231;ilmeyib..<br/>----<br/><a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
}
IF($row['bal']<$RNICK[$TIME]){
$ERROR = "<b>Xeta:</b> ".$FN->DTIME($TIME)." m&#252;ddetine nik almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda minimum <b>".$RNICK[$TIME]."</b> bal olmal&#305;d&#305;r..<br/> Hesab&#305;n&#305;zda (<b>".$row['bal']."</b>) bal var<br/>----<br/><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a>";
} elseif(file_exists('i/'.$id.'.gif') or $row['rn_time']>$SERVER_TIME){
if($row['rn_time']>$SERVER_TIME){
$nvaxt = "Vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($row['rn_time'] - $SERVER_TIME)."</u> qal&#305;b.<br/>\n";
}
$ERROR = "<b>Xeta:</b> Sizin hal-haz&#305;rda nikiniz var.<br/>".$nvaxt."Yeni nik almaq &#252;&#231;&#252;n nikinizi le&#287;v etmelisiz..<br/>----<br/> <img src=\"i/".$id.".gif\" alt=\"Nik\"/> - [<a href=\"rnick.php?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]";
}
IF($ERROR!=FALSE){
echo $ERROR."<br/>\n";
} else {
$RN_TIME = $SERVER_TIME + $TIME;
copy(''.LINK_PATH.RN_DIRECTORY.'/'.$_ARR[$NIK-1].'', 'i/'.$id.'.gif');
$UPDATE = MYSQL_QUERY("UPDATE `users` SET `rn_time`='".MYSQL_ESCAPE_STRING($RN_TIME)."', `rn_nik`='1', `bal` = `bal` - '".$RNICK[$TIME]."' WHERE `id`='".$id."'");
IF($UPDATE){
echo "<u><b>Tebrikler!..</b></u><br/>\n";
echo $divide."\n";
echo "H&#246;rmetli <u>".$row['user']."</u> siz <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine ".$ICON_RN." Super Nikini ald&#305;n&#305;z.<br/>";
echo "Hesab&#305;n&#305;zdan <b>".$RNICK[$TIME]."</b> bal &#231;&#305;x&#305;ld&#305;.<br/>";

$MSG = "<b>".$row['user']."</b> niki <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine Super nik ald&#305;.";
@MYSQL_QUERY("INSERT INTO `zapiski` SET `idtowhom` = '1',`towhom` = '".$bodr_rnick["user"]."',`idwho` = '7',`time` = '".$SERVER_TIME."',`who` = 'Sistem-Super Nik',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Super Nik',`message` = '".$MSG."';");
$rn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `rn_time`!= '0' and `rn_nik`!= '0' and `rn_time` < ".$SERVER_TIME.";");
while($rn_users = mysql_fetch_array($rn_sql)){
unlink('i/'.$rn_users['id'].'.gif');
mysql_query("UPDATE `users` SET rn_time = '0' ,rn_nik = '0' WHERE `id` = '".$rn_users["id"]."';");
$rnd = rand(0,99999999);
$metn = "H&#246;rmetli <b>".$rn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z Super nikin m&#252;ddeti bitdi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$rn_users["id"]."',`towhom` = '".$rn_users["user"]."',`idwho` = '7',`time` = '".$SERVER_TIME."',`who` = 'Sistem-Super Nik',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Super Nik',`message` = '".$metn."';");
}
} else {
echo "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
}
}
}
BREAK;

CASE(3):
echo "<u><b>Le&#287;v et!..</b></u><br/>\n";
echo $divide."\n";
$UPDATE = MYSQL_QUERY("UPDATE `users` SET `rn_time`='0',`rn_nik`='0' WHERE `id`='".$id."'");
IF($UPDATE){
unlink('i/'.$id.'.gif');
echo "H&#246;rmetli <u>".$row['user']."</u> Super Nikiniz u&#287;urla le&#287;v edildi.<br/>";
} else {
echo "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
}
BREAK;

CASE(4):
if($id!='1'){
echo "Bura olmaz qadasi<br/>\n";
BREAK;
}

IF(!ISSET($HTTP_POST_VARS['action'])){
echo "<form ENCTYPE=\"multipart/form-data\" action=\"rnick.php?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";

echo "Komputerden y&#252;kle:<br/>\n";
$_v->fsize2($fsize2);
echo "<input name=\"img\" type=\"file\"/><br/>\n";
$_v->fsize1($fsize1);
echo "<input type=\"submit\" name=\"action\" value=\"Elave et\"/>\n";
echo "</form>";
} else {
$ERROR_URL = FALSE;
$ERROR_FILE = FALSE;
$URL = $_POST['url'];
$FILE = $_FILES['img']['tmp_name'];
$FILENAME = $_FILES['img']['name'];
$PAR = @GETIMAGESIZE($FILE);
$PAR_URL = @GETIMAGESIZE($URL);
IF($FILENAME==FALSE AND STRLEN($URL)<=7){
echo "<b>Xeta</b>: &#350;ekil se&#231;memisiz..<br/>";
BREAK;
}

function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|http|post|else|basename|hr+c)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
if(is_image($_FILES['img']['tmp_name']) == "shell")
{
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta: </b>  Anti shell..<br/>';
echo '----</div>';	
echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

/////////////////////////


$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['img']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['img']['name']);

			if($FileSize > 200 * 1024) { // 200 kb
				$albom->error = '&#350;ekil 200 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}

if($albom->error) {
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '---</div>';
echo "<a href=\"rnick.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

///////////////////


IF(STRLEN($URL)>7){
IF(($PAR_URL[2]!=2)&&($PAR_URL[2]!=1)&&($PAR_URL[2]!=3)){
$ERROR_URL = "<b>Xeta</b>: &#350;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r...";
}
IF($ERROR_URL!=FALSE){
echo $ERROR_URL."<br/>";
} else {
$IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(RN_DIRECTORY));
$COPY_NIK = @COPY($URL, RN_DIRECTORY."/".$IMG.".gif");
IF($COPY_NIK){
echo "Qeyd etdiyiniz &#252;nvandan Super nik u&#287;urla elave edildi..<br/>";
echo "<u>Nik</u> - <img src=\"".LINK_PATH.RN_DIRECTORY."/".$IMG.".gif\" alt=\"Nik\"/><br/>";
} else {
echo "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
}
}
}
IF($FILENAME!=FALSE){
IF(STRLEN($URL)>7)echo $divide."\n";
IF(($PAR[2]!=2)&&($PAR[2]!=1)&&($PAR[2]!=3)){
$ERROR_FILE = "<b>Xeta</b>: Y&#252;klediyiniz &#351;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r..";
}
IF($ERROR_FILE!=FALSE){
echo $ERROR_FILE."<br/>";
} else {
$IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(RN_DIRECTORY));
$COPY_NIK = @COPY($FILE, RN_DIRECTORY."/".$IMG.".gif");
IF($COPY_NIK){
echo "Qeyd etdiyiniz nik u&#287;urla y&#252;klendi..<br/>";
echo "<u>Nik</u> - <img src=\"".LINK_PATH.RN_DIRECTORY."/".$IMG.".gif\" alt=\"Nik\"/><br/>";
} else {
echo "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
}
}
}
echo $divide."\n";
echo "<a href=\"rnick.php?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
BREAK;

//////////panel
CASE(5):
if($id!='1'){
echo "Bura Olmaz Qadasi<br/>\n";
BREAK;
}


echo "<b>Rengli Nik Paneli</b><br/>\n";
$_v->divide();

echo "&#xbb; <a href=\"rnick.php?mod=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Super Nik Qiymet</a><br/>";
echo "&#xbb; <a href=\"rnick.php?mod=4&amp;id=$id&amp;ps=$ps&amp;go=bonus&amp;ref=$ref\">Nik Elave Et</a><br/>";
echo "&#xbb; <a href=\"rnick.php?mod=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Super Niki Olanlar</a><br/>";


break;
CASE(6):
if($id!='1'){
echo "Bura Olmaz Qadasi<br/>\n";
BREAK;
}
if(!isset($_POST['saat'])){
require "file/dat_folder/n_n/rnick.inc";
echo "<u>Super Nik Qiymetleri</u>:<br/>\n";
$_v->divide();
$_v->action("rnick.php?mod=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
echo "1 saat  -\n";
print $_v->input("<input size=\"4\" name=\"saat$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["3600"]."\" emptyok=\"false\"/>").' Bal<br/>';
echo "12 saat  \n";
print $_v->input("<input size=\"4\" name=\"saatim$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["43200"]."\" emptyok=\"false\"/>").' Bal<br/>';
echo "1 g&#252;n  - \n";
print $_v->input("<input size=\"4\" name=\"gun$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["86400"]."\" emptyok=\"false\"/>").' Bal<br/>';
echo "3 g&#252;n  - \n";
print $_v->input("<input size=\"4\" name=\"ucgun$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["259200"]."\" emptyok=\"false\"/>").' Bal<br/>';
echo "7 g&#252;n  -\n";
print $_v->input("<input size=\"4\" name=\"hefte$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["604800"]."\" emptyok=\"false\"/>").' Bal<br/>';
echo "30 g&#252;n  \n";
print $_v->input("<input size=\"4\" name=\"otuzgun$re\" maxlength=\"4\" format=\"*N\" value=\"".$RNICK["2592000"]."\" emptyok=\"false\"/>").' Bal<br/>';
$_v->divide();
print $_v->submit('Yenile');

}else{
$FP = @FOPEN('file/dat_folder/n_n/rnick.inc', 'w');
$DATA = '<?php //'."\n";
$DATA .= '$RNICK = ARRAY('."\n";
$DATA .= '    "3600" => "'.trim($_POST['saat']).'",'."\n";
$DATA .= '    "43200" => "'.trim($_POST['saatim']).'",'."\n";
$DATA .= '    "86400" => "'.trim($_POST['gun']).'",'."\n";
$DATA .= '    "259200" => "'.trim($_POST['ucgun']).'",'."\n";
$DATA .= '    "604800" => "'.trim($_POST['hefte']).'",'."\n";
$DATA .= '    "2592000" => "'.trim($_POST['otuzgun']).'"'."\n";
$DATA .= ');'."\n\n";
$DATA .= '?'.'>';
@UMASK(0111);
@FPUTS($FP, $DATA);
@FCLOSE($FP);
@CHMOD('file/dat_folder/n_n/rnick.inc', 0777);
echo "Melumat Yenilendi..!<br/><br/>";
echo "<a href=\"rnick.php?mod=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
break;
CASE(7):
//if($row['id']!=1){
//echo "Bura Olmaz Qadasi<br/>\n";
//break;
//}
echo "<b>Super Niki Olanlar</b><br/>\n";
$_v->divide();

$userm = mysql_query ("select count(id) as num from users where `rn_time` > '0';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

echo "G&#246;sterir: $n-$do /Cemi: $num<br/>\n";
$_v->divide();
$r = mysql_query ("select id,user,rn_time from users where `rn_time` > '0' order by rn_time desc limit $o,$do");
if(mysql_affected_rows() == false)
{
echo "He&#231;kesde Super Nik yoxdur.<br/>\n";
}
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$time=$arr['rn_time'];

$tkick = $time - time();
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);
if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif?$ref\" alt=\"$login\"/>";
}
if($id =='1'){echo "[<a href=\"rnick.php?mod=8&amp;cid=".$usid."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]\n";}
echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> ($tkick $vaxt qal&#305;b)<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide."\n";
echo "<a href=\"rnick.php?mod=7&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"rnick.php?mod=7&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}


echo $divide."\n";
echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
break;
CASE(8):
if($row['id']!=1){
echo "Bura Olmaz Qadasi<br/>\n";
break;
}
@unlink( "i/".$cid.".gif" );
mysql_query("UPDATE `users` SET rn_time = '0',`rn_nik`='0' WHERE `id` = '".$cid."';");
mysql_query("DELETE FROM `c_nick` WHERE `lid` = '".$cid."';");

echo "Qeyd Etdiyiniz Super Nik Silindi..!<br/>\n";
echo "<a href=\"rnick.php?mod=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
break;
}
///////panel son
$_v->divide();

IF(CASE_MOD){
echo "<a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Super Nikler</a><br/>\n";
}
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>
 
