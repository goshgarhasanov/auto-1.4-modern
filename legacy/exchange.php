<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
require("file/dat_folder/exchange.inc");
$go = isset($_GET['go']) ? trim($_GET['go']) : '';

$_v->title("Exchange", "left");
$_v->fsize1($fsize1);
$_v->wml("<b>Exchange</b><br/>");
$_v->wml($divide);
switch($go){
default:
if(!isset($_POST['first'])){
$_v->action("exchange.php?id=$id&amp;ps=$ps&amp;ref=$ref");

$option = "<select name=\"first$ref\">|";
$option .= "<option value=\"1\">Postu-Bala deyi&#351;</option>|";
$option .= "<option value=\"2\">Cavab&#305;-Bala deyi&#351;</option>|";
$option .= "</select>";
echo $_v->select($option)."<br/>\n";
echo $_v->submit("Deyi&#351;");
} else {
$first = intval($_POST['first']);
switch($first){case 1:
echo "500 postu {$exc_arr['post-500']} bala <a href=\"exchange.php?go=post&amp;ck=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "1000 postu {$exc_arr['post-1000']} bala <a href=\"exchange.php?go=post&amp;ck=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "5000 postu {$exc_arr['post-5000']} bala <a href=\"exchange.php?go=post&amp;ck=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
break;

case 2:
echo "50 cavab&#305; {$exc_arr['credit-50']} bala <a href=\"exchange.php?go=credit&amp;ck=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "150 cavab&#305; {$exc_arr['credit-150']} bala <a href=\"exchange.php?go=credit&amp;ck=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "300 cavab&#305; {$exc_arr['credit-300']} bala <a href=\"exchange.php?go=credit&amp;ck=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
break;

default:
echo "Stop!...<br/>";
break;}if($first)echo $divide."<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
break;

case 'post':
$ck = intval($_GET['ck']);
if($ck == 1){
if($row['posts']<500){
echo "500 postu {$exc_arr['post-500']} bala deyi&#351;mek &#252;&#231;&#252;n hesab&#305;n&#305;zda 500 post olmal&#305;d&#305;r..<br/>";}else{mysql_query("update `users` set `posts`=`posts`-'500', `bal`=`bal`+'".$exc_arr['post-500']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}}elseif($ck == 2){if($row['posts']<1000){
echo "1000 postu {$exc_arr['post-1000']} bala deyi&#351;mek &#252;&#231;&#252;n hesab&#305;n&#305;zda 1000 post olmal&#305;d&#305;r..<br/>";
}else{
mysql_query("update `users` set `posts`=`posts`-'1000', `bal`=`bal`+'".$exc_arr['post-1000']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}
}elseif($ck == 3){if($row['posts']<5000){
echo "5000 postu {$exc_arr['post-5000']} bala deyi&#351;mek &#252;&#231;&#252;n hesab&#305;n&#305;zda 5000 post olmal&#305;d&#305;r..<br/>";
}else{
mysql_query("update `users` set `posts`=`posts`-'5000', `bal`=`bal`+'".$exc_arr['post-5000']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}
}else{echo "Xeta var..<br/>";}
break;

case 'credit':
$ck = intval($_GET['ck']);
if($ck == 1){
if($row['credits']<50){
echo "D&#252;zg&#305;na cavablar&#305;n&#305;z&#305;n say&#305; kifayet qeder deyil..<br/>";
}else{
mysql_query("update `users` set `credits`=`credits`-'50', `bal`=`bal`+'".$exc_arr['credit-50']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}
}elseif($ck == 2){
if($row['credits']<150){
echo "D&#252;zg&#305;na cavablar&#305;n&#305;z&#305;n say&#305; kifayet qeder deyil..<br/>";
}else{
mysql_query("update `users` set `credits`=`credits`-'150', `bal`=`bal`+'".$exc_arr['credit-150']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}
}elseif($ck == 3){
if($row['credits']<300){
echo "D&#252;zg&#305;na cavablar&#305;n&#305;z&#305;n say&#305; kifayet qeder deyil..<br/>";
}else{
mysql_query("update `users` set `credits`=`credits`-'300', `bal`=`bal`+'".$exc_arr['credit-300']."' where `id`='".$id."'");
echo "&#304;steyiniz u&#287;urla yerine yetirildi..<br/>";
}
}else{echo "Xeta var..<br/>";}
break;
}

if($go)echo $divide."<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
echo $divide."<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>