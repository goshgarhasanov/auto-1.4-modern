<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
$ref=rand(10000,1000000);
require("ay.php");
$link = connect_db();
$filesh = file( "file/dat_folder/qeyqay.dat" );
$yonelt = trim( $filesh[0] );
$sm=file("file/dat_folder/yonelt.dat");
if(trim($sm[0])>time()){
$yonelt=trim($sm[1]);}elseif(($sm=="")||(trim($sm[0])<time())){ $yonelt="$yonelt.php?".$ref; }
$adamlar = @mysql_query ("SELECT * FROM conf where acar ='1';");
$mp = mysql_fetch_array ($adamlar);
$son=$mp["son"];
$qiz=$mp["qadin"];
$kisi=$mp["kisi"];
$max=$mp["max"];
$tarix=$mp["tarix"];
if($time!=""){
$tm = time()-(60*$time)+$vaxt;
$max = 9999999999;
}
else
$tm = time();
$q = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."';");
$onlayn = mysql_result($q, 0);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"index\" title=\"Chat $site\">\n";
echo "<p align=\"center\" mode=\"wrap\">\n";
switch($mod) {

default:
print '<small>';

$qey = file("file/logo/3.dat");
$asef = trim($qey[0]);
if($asef)echo "<img src=\"http://$asef\" alt=\"&#350;ekil\"/><br/>";


$qey = file("file/log/1.dat");
$img = trim($qey[0]);
$metn = trim($qey[1]);


if($img)echo "<img src=\"http://$img\" alt=\"&#350;ekil\"/><br/>";
if($metn)echo "<small>$metn<br/></small>";

echo " $site <br/>****<br/>\n";

$print = mysql_query("select * from `online_sms` order by id desc LIMIT 1" );
if (mysql_affected_rows() == 0) {

echo "Online sms yazan yoxdur...<br/>\n";


}
while($arr = @mysql_fetch_array($print)) {
$msgg=$arr['content'];
$uid=$arr['usid'];
$yazan=$arr['login'];
require("smile.php");
$minpos = 500; $nm = 500;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($msgg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=500){
$st1 = substr($msgg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msgg,$minpos+strlen($smiles[$nm]),strlen($msgg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$msgg = $st1.$st2;
}
unset($smiles);
unset($replaces);
echo "<a href=\"online_sms.php?ref=$ref\">Online SMS</a>: ".$msgg." <br/>\n";
echo $divide;
} 

$qey1 = file("file/log/2.dat");
$link1 = trim($qey1[0]);
$link2 = trim($qey1[1]);
$link3 = trim($qey1[2]);
$link4 = trim($qey1[3]);
$link5 = trim($qey1[4]);
$link6 = trim($qey1[5]);
$link7 = trim($qey1[6]);
$link8 = trim($qey1[7]);

if($link1)echo "<a href=\"http://$link1\">$link2</a><br/>";
if($link3)echo "<a href=\"http://$link3\">$link4</a><br/>";
if($link5)echo "<a href=\"http://$link5\">$link6</a><br/>";
if($link7)echo "<a href=\"http://$link7\">$link8</a><br/>";
if($link1)echo "*-=-*<br/>";


$img = trim($qey[2]);
$metn = trim($qey[3]);
if($img)echo "<img src=\"http://$img\" alt=\"&#350;ekil\"/><br/>\n";
if($metn)echo "$metn<br/>*****<br/>\n";


$q = mysql_query("select id,title,saat,content from elan order by id desc;");
while($arr=@mysql_fetch_array($q)) {
if($arr['saat'] > time()){
echo "<i>".$arr['title']."</i>... <br/><b>&#304;mza</b>: <u>".$arr['content']."</u><br/>";
$mxs="1";
}
}
if($mxs=="1")echo "<br/>";
if($all_room=="0"){echo "&#199;atda ve Mesajda he&#231;kes yoxdur :=(<br/>\n";
}
else
{
$donamor = file("file/dater/1.dat");
$a = trim($donamor[0]);

echo "$a: <a href=\"o_line.php\">".$onlayn."</a>, nefer<br/>\n";
}
echo $divide;
$donamor = file("file/dater/1.dat");
$b = trim($donamor[1]);

echo "$b:<br/>\n";
print '</small>';
echo "<input name=\"us\" maxlength=\"30\" title=\"nick\"/><br/>\n";
print '<small>';
$donamor = file("file/dater/1.dat");
$c = trim($donamor[2]);
echo "$c:<br/>\n";
print '</small>';
if (strpos ($HTTP_USER_AGENT,"Windows") !== false){
echo "<input type=\"password\" name=\"ps\" maxlength=\"20\" title=\"Parol\"/><br/>\n";
}else{
echo "<input name=\"ps\" maxlength=\"20\" title=\"Parol\"/><br/>\n";
}
print '<small>';
$donamor = file("file/dater/1.dat");
$d = trim($donamor[3]);
echo "[<anchor title=\"go\">$d<go href=\"enter.php?ref=$ref\" method=\"post\">";
echo "<postfield name=\"us\" value=\"$(us)\"/>";
echo "<postfield name=\"npass\" value=\"$(ps)\"/>";
echo "</go></anchor>]<br/>";

echo $divide;
$donamor = file("file/dater/1.dat");
$e = trim($donamor[4]);
echo "<a href=\"$yonelt\">$e</a><br/>----<br/>";


$umumi = $kisi+$qiz;
$donamor = file("file/dater/1.dat");
$e = trim($donamor[5]);

echo "$e: <b>".$son."</b><br/>\n";
$curdate=date("d-m-Y");
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(id) from users WHERE date = '".$curdate."'"));
//if (".$newtoday[0]." > 0){
$umumi = $kisi+$qiz;
$donamor = file("file/dater/1.dat");
$ll = trim($donamor[6]);

echo "$ll:<a href=\"users.php?b=4&amp;$ref\">(<b>".$newtoday[0]."</b>)</a>nefer!<br/>\n";
$donamor = file("file/dater/1.dat");
$x = trim($donamor[7]);
echo "$x: <a href=\"users.php?b=1&amp;$ref\"><b>".$umumi."</b></a><br/>\n";
echo "<small>O&#287;lanlar: <a href=\"users.php?b=2&amp;$ref\"><b>".$kisi."</b></a></small> | \n";
echo "<small>Q&#305;zlar: <a href=\"users.php?b=3&amp;$ref\"><b>".$qiz."</b></a></small><br/>\n";
echo "Adminle:<u><a href=\"index.php?mod=asef\">Elaqe</a></u><br/>\n";

if($max<$onlayn){
$date = date("d-m-y | H:i");
mysql_query("UPDATE `conf` SET `max` = '".$onlayn."', `tarix` = '".$date."' where `acar` ='1';");
}

echo "*****<br/>\n";
$asef = file("file/dat_folder/skript_panel.dat");
$a = trim($asef[0]);
$b = trim($asef[1]);
$c = trim($asef[2]);
$d = trim($asef[3]);
echo "$b : <u><a href=\"license.php?$ref\">$a</a></u><br/>\n";
echo $divide;


$z_h=file("file/dat_folder/hediyye_i.dat");
$z_veren = trim($z_h[0]);
$z_alan = trim($z_h[1]);
$z_hediyye = trim($z_h[2]);
$z_vaxt = trim($z_h[3]);

$text = $he["text"]; 


if($z_vaxt>$SERVER_TIME){
echo "Son Hediyye:<br/>\n";
echo "<img src=\"hediyye/$z_hediyye\" alt=\"hediyye\"/><br/>\n";
echo " $z_veren - $z_alan $text<br/>\n";
echo $divide;
}
echo"<b>$c</b> :<u>$d</u><br/>";

echo $divide;

echo "<a href=\"http://$site\">$site</a><br/>\n";

$img1 = trim($qey[4]);
$img2 = trim($qey[5]);
if($img1)echo "$img1";
if($img2)echo "$img2";

print '</small>';

break;

case 'asef' :

$asef = file( "file/dat_folder/elaqe.dat" );
$adsoyad = trim( $asef[0] );
$nomrem = trim( $asef[1] );
$nomrem1 = trim( $asef[2] );
$mailim = trim( $asef[3] );
echo "<small><b>Ad,Soyad : $adsoyad </b></small><br/>\n";
echo "<small><b>Nomre : $nomrem $nomrem1 </b></small><br/>\n";
echo "<small><b>Mail : $mailim  </b></small><br/>\n";
echo $divide;
echo "<a href=\"http://$site_url_2/?$ref\">$site</a><br/>\n";
break;




}

echo "</p></card></wml>";
mysql_close ($link);
?>