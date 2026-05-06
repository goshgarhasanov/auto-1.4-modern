<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


if ($row['level'] != 9) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"xeta\" title=\"xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}

$user = $row['user'];

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"adminka\" title=\"Admin Panel\">\n";
echo "<p mode=\"wrap\">\n";
$time = date("H:i");

switch ($go) {



////////////////ONLINE OFLINE BOT///////////////

case 'online_bot':
echo $fsize1;
echo "<b>Online Bot Paneli</b><br/>";
echo $divide;
echo "Onlineye burax: <u>Ancaq</u><br/><br/>";
echo $fsize2;
echo "<u><b>Istifadecileri</b></u>: ";
echo $fsize1;
echo "<select name=\"wtimed$ref\">
<option value=\"0\">Ham&#305;n&#305;</option>
<option value=\"1\">Q&#305;zlar&#305;</option>
<option value=\"2\">Oglanlar&#305;</option>
<option value=\"3\">0 postu olanlar&#305;</option>
<option value=\"4\">0 bali olanlar&#305;</option>
<option value=\"5\">Postu olanlar&#305;</option>
<option value=\"6\">Bali olanlar&#305;</option>
<option value=\"7\">Xali olanlar&#305;</option>
</select><br/>";
echo $fsize2;
echo "<u>M&#252;ddet</u>:<br/>\n";
echo $fsize1;
echo "<input name=\"upmuddet$ref\" value=\"\" title=\"muddet\"/><br/>\n";
echo $fsize2;
echo "<u>N&#246;v</u>: - : ";
echo $fsize1;
echo "<select name=\"wtime$ref\">\n";
echo "<option value=\"4\">Qaytar</option>\n";
echo "<option value=\"0\">Deqiqelik</option>\n";
echo "<option value=\"1\">Saatl&#305;q</option>\n";
echo "<option value=\"2\">G&#252;nl&#252;k</option>\n";
echo "<option value=\"3\">Ayl&#305;q</option>\n";
echo "</select><br/>\n";
echo $divide;
echo $fsize2;
echo "[<anchor title=\"go\">Yerine Yetir<go href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o1&amp;r=$ref\" method=\"post\">";
echo "<postfield name=\"upmuddet\" value=\"$(upmuddet$ref)\"/>";
echo "<postfield name=\"wtime\" value=\"$(wtime$ref)\"/>";
echo "<postfield name=\"wtimed\" value=\"$(wtimed$ref)\"/>";
echo "</go></anchor>]<br/>\n";
echo $divide;


echo $fsize1;

//echo "----<br/>";
echo "[ <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=online1_bot&amp;r=$ref\"><b>Offline Bot Paneli</b></a> ]<br/>";
echo $fsize2;
break;


case 'o1':


$upmuddet=trim($upmuddet);
$wtime=trim($wtime);


if ($wtime == 0) {
$m = 60;
} else if ($wtime == 1) {
$m = 3600;
} else if ($wtime == 2) {
$m = 86400;
} else  if ($wtime == 3) {
$m = 2592000;
}

if ($wtime == 0) $v = 'Deqiqelik';
if ($wtime == 1) $v = 'Saatl&#305;q';
if ($wtime == 2) $v = 'G&#252;nl&#252;k';
if ($wtime == 3) $v = 'Ayl&#305;q';

$time=$m*$upmuddet;




if ($wtimed == 0) {

echo $fsize1;
$EH = mysql_query("SELECT * FROM `users`;");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 'onlayn' WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun istifade&#231;iler  <b>$upmuddet $v</b> muddetine  &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o2':
if ($wtimed == 1) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `sex` = '1';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun q&#305;z istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o3':
if ($wtimed == 2) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `sex` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun oglan istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o4':
if ($wtimed == 3) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `posts` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun 0 postlu istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o5':
if ($wtimed == 4) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `bal` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun 0 ball&#305; istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o6':
if ($wtimed == 5) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `posts` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun postlu istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o7':
if ($wtimed == 6) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `bal` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun ball&#305; istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
//break;

//case 'o8':
if ($wtimed == 7) {
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `xal` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = time()+$time;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun xall&#305; istifade&#231;iler <b>$upmuddet $v</b> muddetine &#231;atda <u>online</u> veziyyetine sal&#305;nd&#305;<br/>";
echo $fsize2;
}
break;

case 'online1_bot':
echo $fsize1;
echo "<b>Offline Bot Paneli</b><br/>";
echo $divide;
echo "Onlayndan kimleri cixartmaq isteyirsiz<br/>";
echo "1) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o11&amp;r=$ref\">Ham&#305;n&#305;</a><br/>";
echo "2) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o22&amp;r=$ref\">Q&#305;zlar&#305;</a><br/>";
echo "3) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o33&amp;r=$ref\">Oglanlar&#305;</a><br/>";
echo "4) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o44&amp;r=$ref\">0 postu olanlar&#305;</a><br/>";
echo "5) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o55&amp;r=$ref\">0 bali olanlar&#305;</a><br/>";
echo "6) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o66&amp;r=$ref\">Postu olanlar&#305;</a><br/>";
echo "7) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o77&amp;r=$ref\">Bali olanlar&#305;</a><br/>";
echo "7) <a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=o88&amp;r=$ref\">Xali olanlar&#305;</a><br/>";
echo $fsize2;
break;

case 'o11':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users`;");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;


case 'o22':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `sex` = '1';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun q&#305;z istifade&#231;iler &#231;atda <u>onlayndan</u> cixarild<br/>";
echo $fsize2;
break;

case 'o33':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `sex` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun oglan istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;

case 'o44':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `posts` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun 0 postlu istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;

case 'o55':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `bal` = '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun 0 ball&#305; istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;

case 'o66':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `posts` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun postlu istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;

case 'o77':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `bal` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun ball&#305; istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;


case 'o88':
echo $fsize1;
$EH = mysql_query("SELECT * FROM `users` WHERE `xal` != '0';");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
$online = 0;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = 28 WHERE `id` = '".$uid."';");
}
echo "Qeydiyyatda olan butun xall&#305; istifade&#231;iler &#231;atda <u>onlayndan</u> cixarildi<br/>";
echo $fsize2;
break;


////////////SON////////////


}

if ($go) {
echo $fsize1;
echo "<a href=\"onoff.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();
?>