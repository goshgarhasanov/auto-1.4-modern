<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$select = @mysql_query ("Select id,pass,user from users where id='".$nk."'");


$inf = mysql_fetch_array ($select);

$usid=$inf["id"];
$nick = $inf["user"];

$bal = $row["bal"];
$user = $row["user"];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"nemo\" title=\"$site\">";
echo "<p>";
switch($go) {

default:
echo $fsize1;
echo "Salam <b>".$user."</b>!<br/>-=-<br/>";
echo "&#304;D n&#246;mreniz: <b>$id</b><br/>";
echo "Xahi&#351; edirik dehlize ve ya tan&#305;&#351;l&#305;qa ke&#231;esiniz!";
echo "<br/>-=-<br/>";
echo $fsize2;
break;

case 'gozvur':
if ($row["bal"]<5) {
echo $fsize1;
echo "Sizin 5 Bal&#305;n&#305;z olmasa g&#246;z vura bilmezsiniz...<br/>";
echo "----<br/><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal&amp;ver=wml\">Bal Y&#252;kleme Qaydas&#305;</a><br/>";
print $fsize2;
} else {

$q = mysql_query("select user,gozvur,sex from users where id='".$nk."';");
$data = mysql_fetch_array($q);
$counter = $data['gozvur'];
$login = $data['user'];
$sex = $data['sex'];
$counter2 = $counter+1;
if ($sex==0) $nemo="<img src=\"img/gozvur.gif\" alt=\".\"/>";
if ($sex==1) $nemo="<img src=\"img/gozvur.gif\" alt=\".\"/>";

mysql_query ("update users set gozvur='".$counter2."' where id='".$nk."';");

$bal=$row['bal'];
$bal=$bal-5;
mysql_query ("Update users set bal='".$bal."' where id='".$id."'");

$data = date("d.m.y |H:i", mktime(date ("H")+0)); 
$kol = rand(0,99999999);
$time = time();
$message = "$nemo <b>".$user."</b>, adl&#305; istifade&#231;i Size g&#246;z vurdu... Bununla o size olan simpatiyas&#305;n&#305; bildirmek isteyib :-)";
mysql_query( "insert into zapiski values(0,'".$user."','".$id."','".$message."','".$login."','".$nk."','".time( )."','0','Size G&#246;z Vuruldu','".$data."','1','1');" );

$nick = $inf["user"];


echo $fsize1;
echo "Siz <b>$nick</b> nikine g&#246;z vurdunuz.<br/>";

echo $fsize2;
}
break;

case 'opus':
if ($row["bal"]<10) {
echo $fsize1;
echo "Sizin 10 Bal&#305;n&#305;z olmasa &#246;p&#252;&#351; g&#246;ndere bilmezsiniz...<br/>";
echo "----<br/><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal\">Bal Y&#252;kleme Qaydas&#305;</a><br/>";
print $fsize2;
} else {
$q = mysql_query("select user,opus,sex from users where id='".$nk."';");
$data = mysql_fetch_array($q);
$counter = $data['opus'];
$login = $data['user'];
$sex = $data['sex'];
$counter2 = $counter+1;
if ($sex==0) $savik="<img src=\"img/opus.gif\" alt=\".\"/>";
if ($sex==1) $savik="<img src=\"img/opus.gif\" alt=\".\"/>";
mysql_query ("update users set opus='".$counter2."' where id='".$nk."';");

$bal=$row['bal'];
$bal=$bal-10;
mysql_query ("Update users set bal='".$bal."' where id='".$id."'");

$data = date("d.m.y |H:i", mktime(date ("H")+0)); 
$kol = rand(0,99999999);
$time = time();
$message = "$savik <b>$user</b>, adl&#305; istifade&#231;i size &#246;p&#252;&#351; g&#246;nderdi :-)";
mysql_query( "insert into zapiski values(0,'".$user."','".$id."','".$message."','".$login."','".$nk."','".time( )."','0','Siz &#214;p&#252;ld&#252;z','".$data."','1','1');" );
$nick = $inf["user"];

echo $fsize1;
echo "Siz <b>$nick</b> nikini &#246;pd&#252;z.<br/>";
echo $fsize2;
}
break;

case 'durt':
if ($row["bal"]<15) {
echo $fsize1;
echo "Sizin 15 Bal&#305;n&#305;z olmasa d&#252;rtmeliye bilmezsiniz...<br/>";
echo "----<br/><a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal\">Bal Y&#252;kleme Qaydas&#305;</a><br/>";
print $fsize2;
} else {
$q = mysql_query("select user,durt,sex from users where id='".$nk."';");
$data = mysql_fetch_array($q);
$counter = $data['durt'];
$login = $data['user'];
$sex = $data['sex'];
$counter2 = $counter+1;
if ($sex==0) $savik="<img src=\"img/durt.gif\" alt=\".\"/>";
if ($sex==1) $savik="<img src=\"img/durt.gif\" alt=\".\"/>";
mysql_query ("update users set opus='".$counter2."' where id='".$nk."';");

$bal=$row['bal'];
$bal=$bal-15;
mysql_query ("Update users set bal='".$bal."' where id='".$id."'");

$data = date("d.m.y |H:i", mktime(date ("H")+0)); 
$kol = rand(0,99999999);
$time = time();
$message = "$savik <b>$user</b>, adl&#305; istifade&#231;i sizi d&#252;rtmeledi :-)";
mysql_query( "insert into zapiski values(0,'".$user."','".$id."','".$message."','".$login."','".$nk."','".time( )."','0','Siz D&#252;rtmelendiniz','".$data."','1','1');" );
$nick = $inf["user"];

echo $fsize1;
echo "Siz <b>$nick</b> niki d&#252;rtmelediniz.<br/>";
echo $fsize2;
}
break;

}
echo $fsize1;
echo "----<br/>\n";

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"0\">Chata qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Online Mesaj</a><br/>\n";

echo "<a href=\"enter.php?id=$id&amp;ps=$ps\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>
