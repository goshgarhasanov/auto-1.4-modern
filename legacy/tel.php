<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$select = @mysql_query ("Select `user`,`user_ip`,`user_soft`,`level` from `users` where `id`='".$nk."';");

if (mysql_affected_rows() == 0) {
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "user tap&#305;lmad&#305;!<br/>\n";
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}



$inf = mysql_fetch_array ($select);
$nick = $inf["user"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$u_level = $inf["level"];

if($u_level>=4){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "R&#252;tbeli &#351;exslerin telefon modeline baxmaq m&#252;mk&#252;n deyil!\n";
$_v->divide();
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n"; 
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n"; 
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




$bals=file("file/bal_bot/0.dat");
$t_bax = trim($bals[19]);


if($row["bal"]<$t_bax){
$_v->title('Hesab&#305;n&#305;zda bal azd&#305;r','center');
$_v->fsize1($fsize1);
echo "<b>$nick</b>, Nikli istifade&#231;inin <br/> Telefon modeline baxmaq &#252;&#231;&#252;n,
<br/>Size $t_bax bal laz&#305;md&#305;r.<br/>*****<br/>\n";
echo "Hesab&#305;n&#305;zda <b>$row[bal]</b>, bal var...<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
$_v->divide();
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n"; 
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n"; 
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n"; 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$newbal=$row[bal]-$t_bax;
$tubal  = "Update `users` set `bal` = '".$newbal."' where `id` ='".$id."'";
mysql_query ($tubal);
ob_start();

$_v->title("$nick Tel Modeli");
$_v->fsize1($fsize1);
echo "-<b>ID:</b> $nk<br/>\n";
echo "-<b>Nick:</b> $nick<br/>****\n";

$OPERATOR_USER = OPERATOR($us_ip);
$OPERATOR_USER = trim($OPERATOR_USER['0']);

if($OPERATOR_USER!='NULL'){
echo "<br/><b>&#199;ata telefonla daxil olur.</b>\n";
echo "<br/>Daxil olduqu operator\n";
echo "<u><b>".ucfirst($OPERATOR_USER)."</b></u><br/>\n";
echo "<u>IP Adresi</u>: <b>$us_ip</b><br/>\n";
$marka=strtok($us_soft,'/');
echo "<u>Telefon Markas&#305;: <b>$marka</b></u>\n";
}else{
echo "<br/><b>&#199;ata komp&#252;terle daxil olur.</b>\n";
echo "<br/><u>IP Adresi:</u> $us_ip\n";
echo "<br/><u>Browser:</u> $us_soft\n";
}
echo "<br/>";
$_v->divide();
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n"; 
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>