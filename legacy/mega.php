<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"Mega Nick\" title=\"Mega Nick\">";
echo "<p align=\"left\">";
switch($go) {

default:
$donamor = file("file/dat_folder/mega_panel.dat");
$a = trim($donamor[0]);
$b = trim($donamor[1]);
$c = trim($donamor[2]);
$d = trim($donamor[3]);
echo $fsize1;
$user1=$row["user"];
$bal=$row["bal"];
$id = $row["id"];
$mega2_time = $row['mega_time'];
$d0nam0r = mysql_fetch_array(mysql_query("SELECT `mega_nik` FROM `users` WHERE id='$id' "));
$meganik = $d0nam0r["mega_nik"];

echo "<br/>Hesab&#305;n&#305;zda <b> ($bal) </b> bal var!<br/>";

if($meganik =="0"){ $login = "Meqa Nik Yoxdur";}
if($meganik =="1"){ $login = "<big><b>B&#246;y&#252;k Nik</b></big> / <a href=\"?go=meganik&amp;emr=sil&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>";}
if($meganik =="2"){ $login = "<b>Qal&#305;n</b> / <a href=\"?go=meganik&amp;emr=sil&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>";}
if($meganik =="3"){ $login = "<i>Eyri</i> / <a href=\"?go=meganik&amp;emr=sil&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>";}
if($meganik =="4"){ $login = "<b><i>Qal&#305;n-eyri</i></b> / <a href=\"?go=meganik&amp;emr=sil&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>";}
print $divide;
echo "Siz burdan <u>Online-Mesaj</u>-da nikivizin goruntusunu deyise bilersiz!<br/>";


if ($mega2_time>time()) {
if (empty($emr_mega)) {
$yeni = $mega2_time - time();
// Gun
$g_san = $yeni / 86400;
$gun_tam = strtok($g_san,'.');
$gun_san = $gun_tam * 86400;
// Saat
$s_san = ($yeni - $gun_san) / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;
$saat_san = $gun_san + $saat_san;
// Deqiqe
$da = $yeni / 60;
$dq_tam =strtok($da,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($yeni - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $yeni - $deqiqe_san;
echo "Mega nikinizin bitme m&#252;ddeti: ";
if ($gun_tam != 0)echo "".$gun_tam." g&#252;n ";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo "<br/>";
echo "---<br/>";
}
}




echo "Nikinizin Formas&#305; : $login<br/>---<br/>";
echo "B&#246;y&#252;k Nik -&#187; <a href=\"?go=meganik&amp;emr=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><big>".$user1."</big></a> <b>($a bal)</b><br/>";
echo "Qal&#305;n -&#187; <a href=\"?go=meganik&amp;emr=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>".$user1."</b></a> <b>($b bal)</b><br/>";
echo "Eyri -&#187; <a href=\"?go=meganik&amp;emr=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><i>".$user1."</i></a> <b>($c bal)</b><br/>";
echo "Qal&#305;n-eyri -&#187; <a href=\"?go=meganik&amp;emr=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b><i>".$user1."</i></b></a> <b>($d bal)</b><br/>";
echo "---<br/><i><b>Qeyd</b>: <u>N&#252;munelerin qabaqinda g&#246;sterilen bal qiymetleri xidmetin bir g&#252;nl&#252;k qiymetidir!.</u></i>\n";
echo "<br/>---<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";





echo $fsize2;

case "meganik":

$mega_sql_donamor = mysql_query("SELECT `id`,`user` FROM `users` WHERE `mega_time` != '0' and `mega_time` < ".time().";");
while($mega_users = mysql_fetch_array($mega_sql_donamor))
{
mysql_query("UPDATE `users` SET `mega_nik` = '', mega_time = '0' WHERE `id` = '".$mega_users["id"]."';");
$rnd = rand(0,99999999);
$metn = "H&#246;rmetli <b>".$mega_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z mega nikin m&#252;ddeti bitdi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$mega_users["id"]."',`towhom` = '".$mega_users["user"]."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Mega Nik',`message` = '".$metn."';");

$rnd = rand(0,99999999);
$metn = "<b>".$mega_users["user"]."</b> nikinin ald&#305;&#287;&#305; mega nikin m&#252;ddeti bitdi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '1',`towhom` = '".$admin."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Mega Nik',`message` = '".$metn."';");
}

$donamor = file("file/dat_folder/mega_panel.dat");
$a = trim($donamor[0]);
$b = trim($donamor[1]);
$c = trim($donamor[2]);
$d = trim($donamor[3]);
echo $fsize1;
$mid = $_GET["id"];
if($_GET["emr"] =="1") {if($row["bal"] < $a)
{echo "<u>Diqqet:</u> <b>B&#246;y&#252;k Nik</b> yazi formasini almaq ucun size $a bal lazimdir<br/>----<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
break;
}
$bal=$row["bal"];
$qiymetmega = "$a";
$donamor = $bal-$qiymetmega;
$tam_muddet = 86400 + time();
@mysql_query("UPDATE `users` SET `bal`='$donamor', mega_time = '".$tam_muddet."' WHERE id='$mid'");
echo "Meqa Nikiniz 1 g&#252;n Erzine Aktiv Olacaqd&#305;r<br/>Balans&#305;n&#305;zdan <b>$a</b> bal silindi<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
mysql_query ("Update `users` set `stat`='0.01'+`stat` where `id` ='".$id."';");

@mysql_query("UPDATE `users` SET `mega_nik`='1' WHERE id='$mid'"); }
if($_GET["emr"] =="2") {if($row["bal"] < $b)
{ echo "<u>Diqqet:</u> <b>Qal&#305;n</b> yazi formasini almaq ucun size $b bal lazimdir<br/>----<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
break;
}
$bal=$row["bal"];
$qiymetmega = "$b";
$donamor = $bal-$qiymetmega;
$tam_muddet = 86400 + time();
@mysql_query("UPDATE `users` SET `bal`='$donamor', mega_time = '".$tam_muddet."' WHERE id='$mid'");
echo "Meqa Nikiniz 1 g&#252;n Erzine Aktiv Olacaqd&#305;r<br/>Balans&#305;n&#305;zdan <b>$b</b> bal silindi<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
mysql_query ("Update `users` set `stat`='0.01'+`stat` where `id` ='".$id."';");

@mysql_query("UPDATE `users` SET `mega_nik`='2' WHERE id='$mid'"); }
if($_GET["emr"] =="3") {if($row["bal"] < $c)
{ echo "<u>Diqqet:</u> <b>Eyri</b> yazi formasini almaq ucun size $c bal lazimdir<br/>----<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
break;
}
$bal=$row["bal"];
$qiymetmega = "$c";
$donamor = $bal-$qiymetmega;
$tam_muddet = 86400 + time();
@mysql_query("UPDATE `users` SET `bal`='$donamor', mega_time = '".$tam_muddet."' WHERE id='$mid'");
echo "Meqa Nikiniz 1 g&#252;n Erzine Aktiv Olacaqd&#305;r<br/>Balans&#305;n&#305;zdan <b>$c</b> bal silindi<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
mysql_query ("Update `users` set `stat`='0.01'+`stat` where `id` ='".$id."';");

@mysql_query("UPDATE `users` SET `mega_nik`='3' WHERE id='$mid'"); }
if($_GET["emr"] =="4") {if($row["bal"] < $d)
{ echo "<u>Diqqet:</u> <b>Qal&#305;n-eyri</b> yazi formasini almaq ucun size $d bal lazimdir<br/>----<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;
break;
}
$bal=$row["bal"];
$qiymetmega = "$d";
$donamor = $bal-$qiymetmega;
$tam_muddet = 86400 + time();
@mysql_query("UPDATE `users` SET `bal`='$donamor', mega_time = '".$tam_muddet."' WHERE id='$mid'");
echo "Meqa Nikiniz 1 g&#252;n Erzine Aktiv Olacaqd&#305;r<br/>Balans&#305;n&#305;zdan <b>$d</b> bal silindi<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
mysql_query ("Update `users` set `stat`='0.01'+`stat` where `id` ='".$id."';");

@mysql_query("UPDATE `users` SET `mega_nik`='4' WHERE id='$mid'"); }
if($_GET["emr"] =="sil"){
@mysql_query("UPDATE `users` SET `mega_nik`='0',mega_time = '0'");
echo "Meqa Nikiniz silindi<br/><a href=\"?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>"; }
echo $fsize2;
break;
}
echo "</p></card></wml>";
mysql_close ($link);
?>