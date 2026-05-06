<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

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
$rand = rand(0000,1111);
$today = date("Y-m-d");
if($_v->ver=='wml'){
$_v->ver="vista1";
}
$_v->title('Logo Panel','left');

if($row["id"] !=1)
{
echo "Bu b&#246;lmeye giri&#351; icazeniz yoxdur..!<br/>\n";
}
else
{
if(!isset($_POST['action']))
{
echo "<div class=\"sms\">\n";
echo "<form ENCTYPE=\"multipart/form-data\" action=\"logo.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
print 'Fayl Logo:<br/>';
print $_v->input("<input name=\"file\" type=\"file\"/>")."<br/>\n";
print $_v->submit("Y&#252;kle","action=send")."</div>\n";
}
else
{

$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['file']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['file']['name']);

			if($FileSize > 500 * 1024) { // 500 kb
				$albom->error = '&#350;ekil 500 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}

if($albom->error) {
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '---</div>';
echo "<a href=\"logo.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}


$dir = $_POST['dir'];
$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
if($file)
{
$par = GetImageSize($file);
}
$size = explode(".", ($_FILES['file']['size'] / 1024));
if(empty($file))
{
$error = 'Fayl se&#231;memisiz.<br/>';
}
elseif(is_image($_FILES['file']['tmp_name']) == "shell")
{
$error = "Anti shell..<br/>";
}
elseif ($par[2] != 2 && $par[2] != 1 && $par[2] != 3)
{
$error = 'Fayl yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r.<br/>';
}
elseif(500 <= $size[0])
{
$error = 'Fayl&#305;n &#231;ekisi 500-kb dan &#231;ox olmamal&#305;d&#305;r..!<br/>';
}
elseif($par[0] >= '500' or $par[1] >= '500')
{
$error = '&#350;eklin eni uzunu 500 x 500 den &#231;ox olmamal&#305;d&#305;r..!<br/>';
}
if($error!='')
{
print $error;
}
else
{
$count = count_files("logo");
$filen = ($count+1).".png";
if(copy($file, "logo/".$dir."/".$filen))
{
print 'Logo y&#252;klendi. &#304;D: '.($count+1).'<br/>';
print '<img src="logo/'.$dir.'/'.$filen.'" alt="logo"><br/>';
print '&#214;l&#231;&#252;s&#252;: '.$par[0].' x '.$par[1].'<br/>';
$form = sprintf("%01.0f", $_FILES["file"]["size"] / 1024);
print '&#199;ekisi: '.$form.' Kb<br/>';

}
else
{
print 'Xeta var!..<br/>';
}
}
echo "<a href=\"logo.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/>";
}
}
$_v->divide('html');
echo "<a href=\"nihad_niko.php?nn=88&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Panel</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";
$_v->end('0',$link);
?>
