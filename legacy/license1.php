<?php
header( "Cache-Control: no-cache" );
header( "Content-Type:text/html; charset=UTF-8" );
require("ay.php");
error_reporting(0); 
if(!trim($_POST['mes']))
{
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" \"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"ru\">\n";
echo "<head>\n";
echo "<style type=\"text/css\">\n";
echo "body {\n";
echo "color : #74d632;\n";
echo "font-size : 13px;\n";
echo "font-family : arial;\n";
echo "background-color : #000;\n";
echo "margin : auto;\n";
echo "}\n";
echo "a:link, a:visited {\n";
echo "color : #11DDEC;\n";
echo "text-decoration : none;\n";
echo "}\n";
echo "div.menu_2 {  background: #000008 url(img/bg.gif); color : #5dd089;}\n";
echo "div.menu_2 a:hover {\n";
echo "color : red;\n";
echo "}.count{background-color:#ff0000;border-radius: 3px;padding: 0px 2px;color: #000000;font-size: 13px;font-weight: bold;}\n";
echo "div.menu {\n";
echo "text-align : center;\n";
echo "}\n";
echo "div.menu {\n";
echo "text-align : center;\n";
echo "background-image : url(img/title.gif);\n";
echo "}\n";
echo "</style>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"application/vnd.wap.xhtml+xml; charset=UTF-8\"/><title>License {$site} - NePRoSToY v1.3 (_K4YF4_B3Z_L!M!T_)</title></head><body><div class=\"menu\"><b> <font color=\"#ff0000\">License</font></b></div><div class=\"menu_2\"><center><b>NePRoSToY v1.3</b><br/>";
$engDay = date("l");

switch($engDay){
case "Monday": $rusDay = "Bazar ertesi"; break;
case "Tuesday": $rusDay = "&#199;er&#351;enbe Ax&#351;ami"; break;
case "Wednesday": $rusDay = "&#199;er&#351;enbe"; break;
case "Thursday": $rusDay = "C&#252;me Ax&#351;ami"; break;
case "Friday": $rusDay = "C&#252;me"; break;
case "Saturday": $rusDay = "&#350;enbe"; break;
default: $rusDay = "Bazar"; break;
}

$t=date("H:i:s", mktime(date ("H")+$xsat));
$d=date("d F Y", time());
$d = str_replace("January","Yanvar",$d);
$d = str_replace("February","Fevral",$d);
$d = str_replace("March","Mart",$d);
$d = str_replace("April","Aprel",$d);
$d = str_replace("May","May",$d);
$d = str_replace("June","Iyun",$d);
$d = str_replace("July","Iyul" ,$d);
$d = str_replace("August","Avqust",$d);
$d = str_replace("September","Senytabr",$d);
$d = str_replace("October","Oktyabr",$d);
$d = str_replace("November","Noyabr",$d);
$d = str_replace("December","Dekabr",$d);
echo "<font color=\"#CD853F\"><br/>\n";
echo "".$d.""; 
echo "/".$rusDay."<br/>";
echo "<u>Saat: ".$t."</u><br/>";
echo "</font>\n";
$sayt=$_SERVER[ 'HTTP_HOST'];
echo "----<br/></center>\n";
echo "Bu <b>SKRIPT</b> <a href=\"http://$sayt\">{$sayt}</a> sayt&#305;na mexsusdur.<br/><br/>
<b>&#8226; <span class=\"count\">&#304;mkanlar ve xasseleri:</span></b><br/>
<font color=\"#9999ff\"><i><b>&#8226; v1.2 versiyas&#305; v1.1 versiyas&#305;ndan daha &#231;ox funksiyalara malikdir, X&#305;rda sehvlikler aradan qald&#305;r&#305;l&#305;b.</b></i></font><br/><b>----<br/>
<font color=\"#CD853F\">1)</font> Admin paneller ftpden yox scriptin i&#231;ersinden d&#252;zeli&#351; etmek olur.<br/>
<font color=\"#CD853F\">2)</font> &#304;stenilen istifade&#231;iye istenilen funksiyan&#305; AUTO Panel-den vermek m&#252;mk&#252;nd&#252;r.<br/>
<font color=\"#CD853F\">3)</font> R&#305;tbelilere r&#252;tbe verdikde standart ne olacaq&#305; AUTO Panel-den teyin olunur.<br/>
<font color=\"#CD853F\">4)</font> Auto Panel Mysql ile elaqesi yoxdur. PHP k&#246;mekliyi ile qura&#351;d&#305;r&#305;l&#305;b.<br/>
<font color=\"#CD853F\">5)</font> Mobil Operator IP-leri ile yaranan problemler m&#246;vcut deyil eger Operatorlardan her hans&#305; biri IP deyi&#351;erse Script avtomatik olaraq Auto Chat-&#305;n Serverinden Yeni IP-leri y&#252;kleyir.<br/>
<font color=\"#CD853F\">6)</font> <b>SPAM</b>-lara qar&#351;&#305; \"Anti-Spam\" funksiyas&#305; aktivdir. Eger yeni SPAM n&#246;vleri c&#305;xarsa Script Auto Chat-&#305;n Serverinden Yeni \"Anti-Spam\" funksiyalar&#305;n&#305; y&#252;kleyir.<br/>
<font color=\"#CD853F\">7)</font> <b>Anti-Reklam</b> Sistemi m&#246;vcutdur.<br/>
<font color=\"#CD853F\">8)</font> <b>Anti-DDOS Attack.</b> (Yeni)<br/>
<font color=\"#CD853F\">9)</font> Aktivliye bal verilmesi:(Bal ADMIN PANELden teyin olunur)<br/>
<font color=\"#CD853F\">10)</font> Posta bal verilmesi:(Bal ve Post ADMIN PANELden teyin olunur)<br/>
<font color=\"#CD853F\">11)</font> Otaq postlarina bal verilmesi:(Bal ve Post ADMIN PANELden teyin olunur)<br/>
<font color=\"#CD853F\">12)</font> Qeydiyyat olanlara bonus verilmesi:(Bal ve Post ADMIN PANELden teyin olunur)<br/>
<font color=\"#CD853F\">13)</font> Pulsuz YUKLEMELER Baza:(ADMIN PANELden elave olunur)<br/>
<font color=\"#CD853F\">14)</font> Pulsuz MP3 Baza:(ADMIN PANELden elave olunur)<br/>
<font color=\"#CD853F\">15)</font> Smaylikler (ADMIN PANELden elave olunur)<br/>
<font color=\"#CD853F\">16)</font> Hediyyeler (ADMIN PANELden elave olunur)<br/>
<font color=\"#CD853F\">17)</font> Znak AL (ADMIN PANELden elave olunur)<br/>
<font color=\"#CD853F\">18)</font> Meqa Nick AL (ADMIN PANELden idare olunur)<br/>
<font color=\"#CD853F\">19)</font> Hekayeler:(Fikir bildirmek ve beyenmek olur)<br/>
<font color=\"#CD853F\">20)</font> Letifeler:(Fikir bildirmek ve beyenmek olur)<br/>
<font color=\"#CD853F\">21)</font> &#350;e`r defteri:(Fikir bildirmek ve beyenmek olur)<br/>
<font color=\"#CD853F\">22)</font> Online status:(Fikir bildirmek ve beyenmek olur)<br/>
<font color=\"#CD853F\">23)</font> Online sms:(Fikir bildirmek ve beyenmek olur)<br/>
<font color=\"#CD853F\">24)</font> Face CHAT:(Anti Reklam ve Anti Hack(tam tehlukesiz))<br/>
<font color=\"#CD853F\">25)</font> Qeydiyyat&#305;n da&#287;&#305;d&#305;lmamas&#305; &#252;&#231;&#252;n \"Anti Spam\"<br/>
<font color=\"#CD853F\">26)</font> Qeydiyyatin yollendirilmesi:(ADMIN PANELden idare olunur)<br/>
<font color=\"#CD853F\">27)</font> Sor&#287;u funksiyas&#305;:(Istifadeciler ucun (Bal xidmeti))<br/>
<font color=\"#CD853F\">32)</font> Bank sistemi<br/>
<font color=\"#CD853F\">33)</font> Onun yar&#305;s&#305;<br/>
<font color=\"#CD853F\">34)</font> Futbol Proqnoz<br/>
<font color=\"#CD853F\">35)</font> Bilik oyunu<br/>
<font color=\"#CD853F\">36)</font> X-O oyunu<br/>
<font color=\"#CD853F\">38)</font> Exchange<br/></b>
----<br/><b>Z&#246;vq&#252;n&#252;ze Uy&#287;un Funksiyalarin Y&#305;g&#305;lmas&#305; &#252;ch&#252;n Ve Bashqa Funksiyalar &#252;ch&#252;n Bizimle Elaqe Saxlay&#305;n</b><br/>----<br/>License: <b><font color=\"red\">{$site}</font></b> sayt&#305;na 04.03.2013 tarixinde al&#305;n&#305;b.<br/>Sifari&#351;&#231;i: <b>$sifariw_eden</b>.<br/>Qiymeti:<b> 30 AZN</b>.<br/>NePRoSToY Reytinqinde: <b><font color=\"red\">4-cu</font></b> yerdedir.<br/>----<br/>\n";

echo "<b>&#8226; <span class=\"count\">Sati&#351; Merkezi:</span><br/>\n";
echo "<br/>M&#252;ellif: <font color=\"#ffff00\">BY_ErroR!ink</font><br/>
<font color=\"#ffff00\">xak_ker_999@mail.ru</font></b><br/><br/>&#8226; <span class=\"count\">Muellife E-maili: xak_ker_999@mail.ru</span>\n";
}
echo "<a href=\"http://$site\">{$site}</a><br/>\n";
echo "</div>\n";
echo "<div class=\"menu\">NePRoSToY v1.3</div>\n";
echo "</body>\n";
echo "</html>\n";
?> 