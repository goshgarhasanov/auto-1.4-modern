<?php
header("cache-control: no-cache");
header("content-type: text/vnd.wap.wml");
include("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$us=$row["user"];
$login=$row["user"];
$level=$row["level"];
$alltraf=$row["alltraf"];

$adm = @mysql_query ("Select user from users where id='1';");
$z = @mysql_fetch_array ($adm);
$administration = $z["user"];

$ref = rand(1000, 9999);


$yu = mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."';");




//USER DATA
$user = mysql_fetch_array($yu);

$qepik = $user['bal'];



if($qepik < 190)
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"ERROR\" ontimer=\"../enter.php?id=$id&amp;ps=$ps&amp;ver=wml\"><timer value=\"15\"/><p align=\"left\">\n";
echo "<small>Sizin hesabinizda kifayet qeder bal yoxdur! Admine muraciet ederek bal ala bilersiniz!
Ugurlar...!<br/>\n";
list($msec, $sec) = explode(chr(32), microtime());
echo "<br/>[".round(($sec+$msec)-$headtime,5)."] sec<br/>\n";
echo "</small></p></card></wml>";
exit();
}

$online = time() + 60;
$update = mysql_query("UPDATE `chat_users` SET `time` = '".$online."', `place` = 0, `ip` = '".getenv('REMOTE_ADDR')."', `ua` = '".htmlspecialchars(getenv('HTTP_USER_AGENT'))."' WHERE `id` = '".$id."';");





echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<card title=\"Siqaret Al!\">


<p align=\"center\">\n";




echo "<img src=\"davidoffqara.jpg\" alt=\"davidoffqara\"/>";

echo "-<br/>\n";


echo "<small>Siqaret</small><br/>\n";





echo "<small><b>Bu Siqaretin Deyeri 190 bal</b></small><br/>\n";



echo "-<br/>\n";




if(!isset($_POST['action']))
{



echo "<small><anchor>[Bu Siqareti Al]<go href=\"davidoffqara.php?id=$id&amp;ps=$ps&amp;ver=wml\" method=\"post\">\n";
echo "<postfield name=\"nip\" value=\"$(nip$nocache)\"/>\n";

echo "<postfield name=\"ni\" value=\"$(ni$nocache)\"/>\n";
echo "<postfield name=\"nich\" value=\"$(nich$nocache)\"/>\n";


echo "<postfield name=\"post\" value=\"$(post$nocache)\"/>\n";
echo "<postfield name=\"action\" value=\"send\"/>\n";
echo "</go></anchor></small><br/>\n";
echo "-<br/>\n";
}
else
{


mysql_query("Update `users` set `bal`=bal-'190' where id ='".$id."';");

mysql_query("Update `users` set `siqaret`='5' where id ='".$id."';");

$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$ide."' ;");



$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';");
$nick = mysql_result($sql, 0);
$message = " <u>".$nick."</u> 90 <u> Qepik xercleyerek Qara Davidoff Siqaretini Aldi </u> ";



echo "Secdiyiniz Siqareti aldiniz!<br/>\n";



}


echo "-<br/>\n";


$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$time = time();
$topic = "Siqaret";

$post = abs(intval($post));
$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$time = time();
$topicad = "Siqaret sat&#305;&#351;&#305;";
$messagead = "H&#246;rmetli Admin! <b>$us</b> leqebli istifade&#231;i <u>Qara Davidoff</u> siqareti ald&#305;.";
mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$administration."', idwho ='8', message = '".$messagead."', towhom = 'Mr_iLQaR', idtowhom = '1', time = '".$time."', readd = '0', topic = '".$topicad."', date='".$data."'");






echo "<small><a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ver=wml\">Dehliz</a><br/></small><br/>\n";


echo "</p></card></wml>";

?>
