<?php 
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8"); 

require("ay.php");
$link = connect_db(); 
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$takep="&amp;ref=$ref";

$r_nick = "Admin";
$friends_add_limit = 10;
$us = $row["us"];
$limit = $row["fr_limit"];

ob_start(); 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n"; 
echo "<card id=\"info\" title=\"Dostlar\">\n"; 
echo "<p align=\"left\">\n"; 
echo $fsize1; 

switch ($mod) { 

default: 
echo "<b>Dostlar&#305;n&#305;z</b><br/>";
echo "*****<br/>"; 
$eh = mysql_query("SELECT COUNT(*) FROM `d_teklif` WHERE usid = '".$id."';"); 
$teklif = mysql_result($eh, 0); 
if ($teklif!=0) echo "&#187; (<b>".$teklif."</b>) Yeni <a href=\"friends.php?id=$id&amp;ps=$ps&amp;mod=offer$takep\">Dostluq Teklifi</a> var!<br/>".$divide;

$f_db = mysql_query("SELECT COUNT(*) FROM `friends` WHERE id = '".$id."';"); 
$f_count = mysql_result($f_db, 0); 

if ($f_count == 0) { 
echo "Sizin he&#231; dostunuz yoxdur :(<br/>";
} else { 
$sql = mysql_query("SELECT * FROM `friends` WHERE `id` = '".$id."';"); 
echo "Online:<br/>";
while($on_l = mysql_fetch_array($sql)) { 
$nk = $on_l['usid']; 

$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$onuser = mysql_fetch_array($qb); 
$nickname = $onuser['user']; 
$time = $onuser['time']; 
$sex = $onuser['sex']; 

if($sex=="0")$sex="K";else$sex="Q"; 

if($time > time()){ 
echo "<img src=\"img/online.gif\"/> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nk."$takep\">$nickname (".$sex.")</a> [<a href=\"friends.php?id=$id&amp;ps=$ps&amp;mod=delete&amp;nk=".$nk."$takep\">Sil</a>]<br/>";
} 
} 
echo "<br/>"; 
$sql = mysql_query("SELECT * FROM `friends` WHERE `id` = '".$id."';"); 
echo "Offline:<br/>";
while($off_l = mysql_fetch_array($sql)) { 
$nk = $off_l['usid']; 

$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$offuser = mysql_fetch_array($qb); 
$nickname = $offuser['user']; 
$time = $offuser['time']; 
$sex = $offuser['sex']; 

if($sex=="0")$sex="K";else$sex="Q"; 

if($time < time()){ 
echo "<img src=\"img/offline.gif\"/> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nk."$takep\">$nickname (".$sex.")</a> [<a href=\"friends.php?id=$id&amp;ps=$ps&amp;mod=delete&amp;nk=".$nk."$takep\">Sil</a>]<br/>";
} 
} 
} 
break; 

case 'delete': 
$select = mysql_query ("Select * from friends where usid = '".$nk."' and id = '".$id."'"); 
if (mysql_affected_rows() == 0) { 
echo "Sizin bele dostunuz yoxdur.<br/>"; 
} else { 
if ($nk == 1) {
echo "H&#246;rmetli: <u>".$us."</u>: <b>$site Rehberi $admin Meslehet bilende Sizi &#246;z&#252; Dostlar&#305;ndan Silecek!!!</b><br/>";
} else {
$melumat = mysql_query ("Delete from friends where usid = '".$nk."' and id = '".$id."'")&&mysql_query ("Delete from friends where id = '".$nk."' and usid = '".$id."'"); 
if ($melumat) { 
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$onuser = mysql_fetch_array($qb); 
$nickname = $onuser['user']; 
echo "<b>".$nickname."</b> niki sizin dostluqunuzdan silindi.<br/>"; 
$rnd = rand(0,99999999); 
$metn = "Hormetli <b>$nickname</b>. <u>".$row["user"]."</u>, Sizi &#246;z dostlar siyah&#305;s&#305;ndan sildi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$nk."',`towhom` = '".$nickname."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Dostluq',`message` = '".$metn."';");

} else { 
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
}}}
break; 

case 'add': 
if ($nick == 1) {
echo "H&#246;rmetli: <u>".$us."</u>: <b>$site Rehberi $admin Meslehet bilende Size &#246;z&#252; Teklif G&#246;nderecek!!!</b><br/>";
} else {
if ($id == $nick) {
echo "&#214;z-&#246;z&#252;n&#252;ze dostluq teklifi g&#246;ndere bilmersiniz.<br/>";
} else {
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nick."';"); 
$onuser = mysql_fetch_array($qb); 
$nickname = $onuser['user'];
if ($nk != $id) {
if ($limit >= $friends_add_limit) {
echo "G&#252;ndelik maksimum <b>$limit</b> defe dostluq teklifi g&#246;ndere bilersiniz.<br/>";
} else {
$select = mysql_query ("Select * from friends where id = '".$id."' and usid = '".$nick."'"); 
if (mysql_affected_rows() == 0) { 
$select = mysql_query ("Select * from d_teklif where usid = '".$nick."' and id = '".$id."'"); 
if (mysql_affected_rows() == 0) { 
$melumat = mysql_query ("insert into d_teklif set usid = '".$nick."', id = '".$id."'");
if ($melumat) {
mysql_query("UPDATE `users` SET `fr_limit` = `fr_limit` + 1 WHERE `id` = '".$id."';"); 
echo "<b>".$nickname."</b> nikine dostluq teklifi g&#246;nderildi.<br/>";
echo "<b>Qeyd!</b>: <u>Dostlu&#287;un qebul olunmas&#305; &#252;&#231;&#252;n qar&#351;&#305; terefin dostlu&#287;u qebul etmesini g&#246;zleyin.</u><br/>";
} else { 
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
} 
} else { 
echo "<b>".$nickname."</b> nikine daha &#246;nce dostluq teklifi g&#246;ndermisiniz.<br/>";
} 
} else { 
echo "<b>".$nickname."</b> nikli istifade&#231;i yoxsada sizin dostunuzdur.<br/>";
}}} else {
echo "&#214;z-&#246;z&#252;n&#252;ze dostluq teklifi g&#246;ndere bilmersiniz.<br/>";
}}}
break; 

case 'addto': 
if ($nk == 1) {
echo "H&#246;rmetli \"<u>".$row['user']."</u>\" <b>$site</b> - Rehberi Meslehet bilende Size &#246;z&#252; Teklif G&#246;nderecek! <br/>Siz ona dostluq teklifi göndere bilmezsiniz<br/>";
} else {
if ($id == $nk) {
echo "&#214;z-&#246;z&#252;n&#252;ze dostluq teklifi g&#246;ndere bilmersiniz.<br/>";
} else {
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$onuser = mysql_fetch_array($qb); 
$nickname = $onuser['user']; 
if ($nk != $id) {
if ($limit >= $friends_add_limit) {
echo "G&#252;ndelik maksimum <b>5</b> defe dostluq teklifi g&#246;ndere bilersiniz.<br/>";
} else {
$select = mysql_query ("Select * from `friends` where `id` = '".$id."' and `usid` = '".$nk."';"); 
if (mysql_affected_rows() == 0) { 
$select = mysql_query ("Select * from `d_teklif` where `usid` = '".$nk."' and `id` = '".$id."';"); 
if (mysql_affected_rows() == 0) { 
$melumat = mysql_query ("insert into `d_teklif` set `usid` = '".$nk."', `id` = '".$id."';");
if ($melumat) {
mysql_query("UPDATE `users` SET `fr_limit` = `fr_limit` + 1 WHERE `id` = '".$id."';"); 
echo "<b>".$nickname."</b> nikine dostluq teklifi g&#246;nderildi.<br/>";
echo "<b>Qeyd!</b>: <u>Dostlu&#287;un qebul olunmas&#305; &#252;&#231;&#252;n qar&#351;&#305; terefin dostlu&#287;u qebul etmesini g&#246;zleyin.</u><br/>";
} else { 
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
} 
} else { 
echo "<b>".$nickname."</b> nikine daha &#246;nce dostluq teklifi g&#246;ndermisiniz.<br/>";
} 
} else { 
echo "<b>".$nickname."</b> nikli istifade&#231;i yoxsada sizin dostunuzdur.<br/>";
}}} else {
echo "&#214;z-&#246;z&#252;n&#252;ze dostluq teklifi g&#246;ndere bilmersiniz.<br/>";
}}}
break; 

case 'offer': 
echo "<b>Teklifler</b><br/>"; 
echo "*****<br/>"; 
$sql = mysql_query("SELECT * FROM `d_teklif` WHERE `usid` = '".$id."';"); 
while($offer = mysql_fetch_array($sql)) { 
$nk = $offer['id']; 
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$offeruser = mysql_fetch_array($qb); 
$nickname = $offeruser['user']; 
$sex = $offeruser['sex']; 
if($sex=="0")$sex="K";else$sex="Q"; 
echo "Teklif eden: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nk."$takep\">$nickname (".$sex.")</a><br/>";
echo "<a href=\"friends.php?id=$id&amp;ps=$ps&amp;mod=offer_yes&amp;nk=".$nk."$takep\">Qebul et</a> ./ <a href=\"friends.php?id=$id&amp;ps=$ps&amp;mod=offer_no&amp;nk=".$nk."$takep\">Redd et</a><br/>";
} 
break; 

case 'offer_yes': 
$select = mysql_query ("Select * from d_teklif where usid = '".$id."' and id = '".$nk."'"); 
if (mysql_affected_rows() == 0) { 
echo "Size bele dostluq teklifi gelmeyib.<br/>"; 
} else { 
$melumat = mysql_query ("Delete from d_teklif where id = '".$nk."' and usid = '".$id."'")&&mysql_query ("insert into friends set usid = '".$nk."', id = '".$id."'")&&mysql_query ("insert into friends set usid = '".$id."', id = '".$nk."'"); 
if ($melumat) { 
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$offeruser = mysql_fetch_array($qb); 
$nickname = $offeruser['user']; 
echo "<b>".$nickname."</b> nik istifade&#231;inin dostluq teklifi qebul olundu.<br/>";
$rnd = rand(0,99999999); 
$metn = "Hormetli <b>$nickname</b>. <u>".$row["user"]."</u>, Sizin g&#246;nderdiyiniz dostluq teklifini qebul etdi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$nk."',`towhom` = '".$nickname."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Dostluq',`message` = '".$metn."';");

} else { 
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
} 
} 
break; 

case 'offer_no': 
$select = mysql_query ("Select * from d_teklif where usid = '".$id."' and id = '".$nk."'"); 
if (mysql_affected_rows() == 0) { 
echo "Size bele dostluq teklifi gelmeyib.<br/>"; 
} else { 
$melumat = mysql_query ("Delete from d_teklif where id = '".$nk."' and usid = '".$id."'"); 
if ($melumat) { 
$qb = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';"); 
$offeruser = mysql_fetch_array($qb); 
$nickname = $offeruser['user']; 
echo "<b>".$nickname."</b> nik istifade&#231;inin dostluq teklifi redd edildi.<br/>";
$rnd = rand(0,99999999); 
$metn = "Hormetli <b>$nickname</b>. <u>".$row["user"]."</u>, Sizin g&#246;nderdiyiniz dostluq teklifini redd etdi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$nk."',`towhom` = '".$nickname."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Dostluq',`message` = '".$metn."';");

} else { 
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
} 
} 
break; 

} 

echo "*****<br/>"; 
if (empty($mod)) { 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
} else { 
echo "<a href=\"friends.php?id=$id&amp;ps=$ps$takep\">Dostlar&#305;n&#305;z</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
} 
echo $fsize2; 
echo "</p></card></wml>\n"; 
mysql_close ($link); 
ob_end_flush(); 
?>