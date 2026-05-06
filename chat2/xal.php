<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$xal=$row['xal'];
$bal=$row['bal'];

$hgun=date("w");
$gun = file("file/dat_folder/xal.dat");
$gun = trim($gun[0]);
if($gun!=$hgun){

mysql_query ("update users set xal = '0' where xal!= '0'");

@$save= fopen("file/dat_folder/xal.dat", "w+");
@fwrite($save, "$hgun");
@fflush($save);
@fclose($save);
}


echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"apanel\" title=\"Xal al: irelide g&#246;r&#252;n\">\n";
echo "<p align=\"left\" mode=\"wrap\">\n";



if(empty($action)) {
echo $fsize1;
echo "<b>Xal al: irelide g&#246;r&#252;n.</b><br/>";
echo "*****<br/>";
echo "<u>Hesab&#305;n&#305;zda \"<b>$bal</b>\" bal ve \"<b>$xal</b>\" xal var.</u><br/>";
echo "----<br/>";
echo "Xallar&#305;n&#305;z&#305;n say&#305; ne qeder &#231;ox olarsa bir o qeder onlaynda irelide g&#246;r&#252;neceksiniz.<br/>\n";

if($row["xal"]>0){

$userm = mysql_query ("select count(id) as num from users where xal>'0';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"]; 
if(!isset($s))$s=0;
$mx=round(($num/100000)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*100000)+1;
$do=$s*100000;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

$r = mysql_query ("select id from users where xal>'0' order by xal desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$usid=$arr['id'];
if($id==$usid){
echo "Hal-Haz&#305;rda Sizin <b>$xal</b> xal&#305;n&#305;z var ve nickinizin online olanlar aras&#305;nda yeri: <b>$i</b>.<br/>\n";


}}}else{



$userm = mysql_query ("select count(id) as num from users where time> '".time()."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"]; 
if(!isset($s))$s=0;
$mx=round(($num/100000)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*100000)+1;
$do=$s*100000;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

$r = mysql_query ("select id from users where time> '".time()."''".$tm ."' order by time desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$usid=$arr['id'];
if($id==$usid){
echo "Hal-Haz&#305;rda Sizin <b>$xal</b> xal&#305;n&#305;z var ve nickinizin online olanlar aras&#305;nda yeri: <b>$i</b>.<br/>\n";
}}}


echo "Siz xallar&#305;n&#305;z&#305;n say&#305;n&#305; art&#305;rmaqla daha da ireli s&#305;rada g&#246;r&#252;ne bilersiniz. Bu da sizin nickin daha &#231;ox g&#246;r&#252;nmesine ve size gelen mesajlar&#305;n artmas&#305;na sebeb olacaq, yeni dostlar qazanacaqs&#305;n&#305;z...<br/>\n";
echo "----<br/>";

echo $fsize2;
echo "<select name=\"x\">";
echo "<option value=\"1\">1 xal (1 Bal)</option>\n";
echo "<option value=\"10\">10 xal (10 Bal)</option>\n";
echo "<option value=\"100\">100 xal (100 Bal)</option>\n";
echo "<option value=\"500\">500 xal (500 Bal)</option>\n";
//echo "<option value=\"1000\">1000 xal (1000 Bal)</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">[Elave Et]<go href=\"xal.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"action\" value=\"yes\"/>\n";
echo "<postfield name=\"x\" value=\"$(x)\"/>\n";
echo "</go></anchor><br/>\n";
echo "----<br/>";
echo "<b>Qeyd</b>: Xallar gece 12 tamamda s&#305;f&#305;rlan&#305;r.<br/>";
echo "*****<br/>";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
}else{



	$x = abs(intval($x));

                              if ($x!=1 && $x!=10 && $x!=100 && $x!=500){
                              echo $fsize1;
                              echo "Xal yanl&#305;&#351;d&#305;r!<br/>\n";
                              echo "---<br/>";
                              echo "<a href=\"bal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
                              echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
                              echo $fsize2;
                              }else{

$hesab = $x;



if($bal<$hesab) {
echo $fsize1;
echo "Hesab&#305;n&#305;zda \"$hesab\" bal yoxdur.<br/>";
echo "----<br/>";
echo "<a href=\"bal.php?id=$id&amp;ps=$ps&amp;bolme=bal\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
echo "*****<br/>";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
}else{

$bal=$bal-$hesab;
$cem = "Update users set bal = '".$bal."', xal=xal+'$hesab' where id ='".$id."'";
mysql_query ($cem);

$m = mysql_query("SELECT bal FROM users WHERE id ='".$id."'");
$my = mysql_fetch_array ($m);
$newbal = $my["bal"];

echo $fsize1;
echo "Tebrikler Siz \"<b>$hesab</b>\" xal ald&#305;n&#305;z...<br/>";
$yxal = $hesab+$xal;
echo "Cemi Xallar&#305;n&#305;z \"<b>$yxal</b>\" oldu!<br/>*****<br/>";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;

}}}
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);

?>