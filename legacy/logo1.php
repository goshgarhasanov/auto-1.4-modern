<?php
$file = @file("file/dat_folder/n_n/logo.dat");
$number_1 = trim($file[0]);
if ($number_1 ==1 or  $number_1 ==2 or $number_1 ==3) {

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
$SCRIPT_NAME = basename($_SERVER['SCRIPT_NAME']);

}
/////index.php
if(trim($SCRIPT_NAME) =="index.php"){
if($number_1=="1" or $number_1=="3"){
$count = count_files("logo");
$rand = rand(1,$count);
if (file_exists("logo/$count.png"))
{
echo "<img src=\"logo/".$rand.".png\" alt=\"logo\"/><br/>\n";
}
}
}
/////enter.php
if(trim($SCRIPT_NAME) =="enter.php"){
if($number_1=="2" or $number_1=="3"){
$count = count_files("logo");
$rand = rand(1,$count);
if (file_exists("logo/$count.png"))
{
echo "<img src=\"logo/".$rand.".png\" alt=\"logo\"/><br/>\n";
}
}
}

?>