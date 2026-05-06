<?
require("inc.php");
require("file/dat_folder/show_foto.inc");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($_v->ver=="wml")$_v->ver="vista1";



if($footo[aktiv] != 1){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Bu funksiya Admin terefinden deaktiv edilib !<br/>";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$ref=rand(10000,1000000);


$user=$row["user"];

$count_img = @mysql_query("select count(id) from albom where idfoto='".$id."'");
$myfoto = @mysql_result($count_img, 0);

if(isset($go)){
if(!isset($file)){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sekil Secmemisiz..!";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
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
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($size>11111111){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Sekilin Hecmi 5 MG-dan Cox olmamalidir..!<br/>";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$curdate=date("d-m-Y");
$mysql_user_test = mysql_num_rows(mysql_query("SELECT * FROM show_foto WHERE date='".$curdate."' and idfoto='".$id."'"));

if($mysql_user_test!=0){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Siz Oyuna Sekil Elave Etmisiz!";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($row["bal"]<$footo[bal]){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Balansinizda Kifeyet qeder bal yoxdur! Size <b>$footo[bal]</b> bal lazimdir";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$cudate=date("d-m-Y");
$galery = mysql_query ("select count(id) as num from show_foto where date ='".$cudate."';");
$foto = mysql_fetch_array($galery);
$num = $foto["num"];
if ($num>=$footo[max]){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "Se&#231;im turu sona &#231;atdi Gun erzinde $footo[max] Namized Oyuna qo&#351;;ula biler..<br/>";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);;
exit;
}
if ($message == ""){
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet:</b> <u>Siz Mesaj Yazmad&#305;n&#305;z.</u>\n";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);;
exit;
}
#===============================================================================
if (strlen($message) > 200) {
$_v->title('Stop','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet:</b> <u>Mesaj <b>200</b> Simvoldan &#231;ox ola bilmez!</u>\n";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);;
exit;
}
if (strlen($message) < 5) {
$_v->title('Stop','center');
$_v->fsize1($fsize1);

echo "<b>Diqqet:</b> <u>Mesaj <b>5</b> Simvoldan Az Olmamal&#305;d&#305;r!</u>\n";
$_v->divide();
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
$_v->fsize2($fsize2);
$_v->end('1',$link);;
exit;
}

$message = narmobil($message);


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
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</center></div>"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}
//////////
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




$rn = rand(100, 99999);
$curdate=date("d-m-Y");
$newfoto = $id.-rand(10000, 9999999).'.'.strtolower($pathinfo['extension']);
mysql_query("INSERT INTO `show_foto` VALUES(0, '".$id."', '".$newfoto."', 0, '".$message."', '".$curdate."');");
if (file_exists("show_foto/".$newfoto.""))
{
unlink ("show_foto/".$newfoto."");
}
COPY($_FILES['file']['tmp_name'], "show_foto/".$newfoto."");
}

$_v->title('&#350;ekil &#350;ou','left');
$_v->fsize1($fsize1);

if($newfoto!="")
{

mysql_query( "update users set `bal`=`bal`-'".$footo["bal"]."' where id = '".$id."';" );
echo "Bu &#350;ekil Elave Edildi.Hesabinizdan <b>$footo[bal]</b> bal silindi!<br/>\n";
echo "Tebrikler...<br/>\n";

echo "<a href=\"show_foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ekil &#350;ou</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}else{
echo "Oyuna qatilmaq <b>$footo[bal]</b> bal deyerindedir.<br/>";
echo "<b>Qeyd:</b> Sekilin uste ba&#351;qa sayt adi gorulse silinecek..!<br/>";
$_v->divide();



echo "<form ENCTYPE=\"multipart/form-data\" action=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<b>&#350;ekil Daxil Edin</b><br/>\n";
echo "<INPUT NAME=\"file\" TYPE=\"file\"><br/>\n";
echo "Mesaj:<br/>\n";
echo "<input type=\"message\" name=\"message\" /><br />\n";
echo "<input type=\"submit\" name=\"go\" value=\"Y&#252;kle\">\n";
echo "</form>\n";
$_v->divide();

echo "<a href=\"show_foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;eki Yari&#351;masi</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}
if(!is_dir(show_foto ))
{
@chmod("show_foto", 0777);
}

?>