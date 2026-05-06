<?
require("inc.php");

#-----------------------------------
$sts = file("file/dat_folder/online_sms.dat");
$mbal = str_replace("-", "", (int)trim($sts[0]));
$muellif = trim($sts[1]);
$beyen_b = trim($sts[2]);
$novu = trim($sts[3]);
$fikir_b = trim($sts[4]);
$fikirnovu = trim($sts[5]);
$metn = trim($sts[6]);
$qalin = trim($sts[7]);
$xetli = trim($sts[8]);
$kursiv = trim($sts[9]);
$sek_bal = trim($sts[10]);
$vaxtsms = trim($sts[11]);

#-------------------------------------
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$ref=rand(10000,1000000);
$user=$row["user"];
if($_v->ver=="wml")$_v->ver="vista1";
if(isset($go)){
if(!isset($file)){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sekil Secmemisiz!";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$size = filesize($file);
if($file){
$par = GetImageSize($file);
}
if(($par[2]!==2)&&($par[2]!==1)&&($par[2]!==3)){


$_v->title('Stop','center');
$_v->fsize1($fsize1);


echo "Yaln&#305;z GIF, PNG, JPG ve JPEG format&#305;nda &#350;ekil y&#252;kleye bilersiz...<br/>";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);

exit;
}






if($size>10000000){

$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "Sekilin Hecmi 2Mg-dan Cox olmaz..!<br/>";
$_v->divide();
echo "<a href=\"sms_foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$message = narmobil($message);


//bal
if ($row["bal"] < $sek_bal){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sizin <b>".$row["bal"]."</b> bal&#305;n&#305;z var. Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$sek_bal."</b> bal&#305;n&#305;z olmal&#305;d&#305;r..!<br/>";
$_v->divide();
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
///Mesaj Yazmayandaa
if ($msg == ""){
$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "<b>Diqqet:</b> <u>Siz Mesaj Yazmad&#305;n&#305;z.</u><br/>\n";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
#------------------------- Simvol Cox meselesi-------------------------------
if (strlen($msg) > $metn) {

$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "<b>Diqqet:</b> <u>Mesaj <b>$metn</b> Simvoldan &#231;ox ola bilmez!</u><br/>\n";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
//Simvol az meselesi
if (strlen($msg) < 5) {
$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "<b>Diqqet:</b> <u>Mesaj <b>5</b> Simvoldan Az Olmamal&#305;d&#305;r!</u><br/>\n";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$onlinesms = mysql_fetch_object(mysql_query("SELECT `time` FROM `onlinesms` ORDER BY `id` DESC LIMIT 1;"));

if($onlinesms->time > time()-$vaxtsms)
{
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Online sms yeni yazilib <u>".qaliq($onlinesms->time+$vaxtsms)."</u>, gozledikden sonra yeni onlinesms yazmaq olar.<br/>\n";
$_v->divide();
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
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

if(is_image($_FILES['file']['tmp_name']) == "shell")
{
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta: </b>  Anti shell..<br/>';
echo '----</div>';	
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</center></div>"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}



$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['file']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['file']['name']);

			if($FileSize > 5000 * 1024) { // 5000 kb
				$albom->error = '&#350;ekil 5000 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}


if($albom->error) {
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '---</div>';
echo "<a href=\"sms_upload.php?id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}


#----------------------------------Conut----------------------------------------


if ($cvb!=1){
$msg = $_POST['msg'];

if($msg!=''){
$msg = narmobil(chkdsk($msg,basename(__FILE__),"Online SMS-de"));
}

if ($row["level"]<5) {require("filtr.php");}

if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);

if($smset!=0){$msg = smile($msg,$posts);}

$shr = $_POST['shr'];
if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
{
if($p_arr['210']==1)
{
	if(substr_count($shr, "1") != 0) $msg = "<i>$msg</i>";
}
if($p_arr['211']==1)
{
	if(substr_count($shr, "2") != 0) $msg = "<u>$msg</u>";
}
if($p_arr['212']==1)
{
	if(substr_count($shr, "3") != 0) $msg = "<b>$msg</b>";
}
if($p_arr['213']==1)
{
	if(substr_count($shr, "4") != 0) $msg = "<big>$msg</big>";
}
}else {
if(substr_count($shr, "3") != 0){$count_bal_bold=$qalin;}
if(substr_count($shr, "2") != 0){$count_bal_underline=$xetli;}
if(substr_count($shr, "1") != 0){$count_bal_italic=$kursiv;}
$count_bal=$count_bal_bold+$count_bal_underline+$count_bal_italic;
#-------------------------------------------------------------------------------
$bal=$row["bal"];
$count_bal_sp=$count_bal+$sek_bal;
 if($bal<$count_bal_sp)
{


$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "Bu emeliyyatdan istifade etmek &#252;&#231;&#252;n minimum <b>$count_bal_sp</b> bal olmalidir<br/>";
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
$_v->divide();
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;

}else {


if(substr_count($shr, "3") != 0){$msg = "<b>$msg</b>";}
if(substr_count($shr, "2") != 0){$msg = "<u>$msg</u>";}
if(substr_count($shr, "1") != 0){$msg = "<i>$msg</i>";}

mysql_query("UPDATE `users` SET `bal` = `bal`-".$count_bal." WHERE `id` = '".$id."';");
}
}

$reng = $row["shrift"];
$rn = rand(100, 99999);
$curdate=date("d-m-Y");

$newfoto = $id.-rand(10000, 9999999).'.'.strtolower($pathinfo['extension']);
if (file_exists("sms_foto/".$newfoto.""))
{
unlink ("sms_foto/".$newfoto."");
}
COPY($_FILES['file']['tmp_name'], "sms_foto/".$newfoto."");

}

mysql_query("UPDATE `users` SET `bal` = `bal`-'".$sek_bal."' WHERE `id` = '".$id."';");
mysql_query("INSERT INTO `onlinesms` SET usid = '".$id."', user = '".$row['user']."', time = '".time()."', mesaj = '".$msg."', reng = '".$reng."', sms_foto = '".$newfoto."';");
}



$_v->title('Online Sms+&#350;ekil Payla&#350;','left');
$_v->fsize1($fsize1);



if($newfoto!="")
{
echo "Bu &#350;ekil ve Mesaj Online SmS-E Elave Edildi.Hesabinizdan <b>$sek_bal</b> bal silindi!<br/>\n";
echo "Tebrikler...\n";

$_v->divide();
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Sms</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}else{
if($row[bal]<$sek_bal) {
echo "Bu xidmetden istifade etmek ucun <b>$sek_bal</b> baliniz olmalidir..!<br/>";
$_v->divide();



}else{

echo "<form ENCTYPE=\"multipart/form-data\" action=\"sms_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";

echo "Mesaj: (max: $metn)<br/>\n";
echo "<input name=\"msg\" maxlength=\"$metn\" value=\"\" title=\"Metn\"/><br/>";

if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
{
	echo "<select name=\"shr\" multiple=\"true\">\n";
	if($p_arr['210']==1)echo "<option value=\"1\">Kursiv</option>\n";
	if($p_arr['211']==1)echo "<option value=\"2\">Alt&#305; Xetli</option>\n";
	if($p_arr['212']==1)echo "<option value=\"3\">Qal&#305;n</option>\n";
	if($p_arr['213']==1)echo "<option value=\"4\">B&#246;y&#252;k</option>\n";
	echo "</select><br/>\n";
}else{
	  echo "<select name=\"shr\" multiple=\"true\">\n";
      echo "<option value=\"1\">Kursiv($kursiv bal)</option>\n";
      echo "<option value=\"2\">Alt&#305; Xettli($xetli bal)</option>\n";
      echo "<option value=\"3\">Qalin($qalin bal)</option>\n";
      echo "</select><br/>\n";
}
echo "<b>&#350;ekil Daxil Edin</b><br/>\n";
echo "<input type=\"file\" name=\"file\" title=\"file\"/><br/>\n";
echo "<input type=\"submit\" name=\"go\" value=\"Y&#252;kle\">\n";
echo "</form>\n";
$_v->divide();
echo "Qiymeti: <b>$sek_bal</b> bal<br/>";
}
echo "<a href=\"onlinesms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Sms</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}
if(!is_dir(sms_foto ))
{
@mkdir(addslashes(sms_foto) );
@chmod(addslashes(ssms_foto) , 0777);
}
?>