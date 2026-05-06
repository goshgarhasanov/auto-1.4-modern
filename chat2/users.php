<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
$ref=rand(10000,1000000);
require("ay.php");
$link = connect_db();

echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"index\" title=\"Users\">\n";
echo "<p align=\"left\" mode=\"wrap\">\n";
echo "<small>\n";

switch($b){
case '1':
$USERS = @MYSQL_QUERY("SELECT * FROM `users` WHERE `block`='0'");
$TOTAL = @MYSQL_NUM_ROWS($USERS);
ECHO "<b><u>Cemi Userler</u> ($TOTAL)</b><br/>";
ECHO $divide;
$MAX = 10;
$PAGE = (!ISSET($_GET['page'])) ? 0 : $_GET['page'];
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}
$SELECT = @MYSQL_QUERY( "SELECT * FROM `users` WHERE `block`='0' ORDER BY `id` DESC LIMIT $START,$MAX;" );
WHILE( $INF = MYSQL_FETCH_OBJECT($SELECT) ){
IF($INF->level > 3){
$EXP = @MYSQL_QUERY("SELECT * FROM `levels` WHERE `level` = '".$INF->level."'");
$L_ARR = @MYSQL_FETCH_OBJECT($EXP);
$L_NAME = "(<b>".$L_ARR->name."</b>)";
}ELSE{
$L_NAME = "";
}
IF($INF->time > TIME()){
$U_TIME = "<img src=\"group/img/komp.gif\"/>";
}ELSE{
$U_TIME =         "&#8226;";
}
ECHO "".($START+1).") $U_TIME ".$INF->user."  $L_NAME<br/>";
++$START;
}
IF($TOTAL > $MAX){
echo navigation("users.ys?b=$b&amp;ref=$ref", $TOTAL, $MAX, $PAGE);
}
break;


case '2':
$USERS = @MYSQL_QUERY("SELECT * FROM `users` WHERE `sex` = '0' and `block` = '0'");
$TOTAL = @MYSQL_NUM_ROWS($USERS);
ECHO "<b><u>Cemi O&#287;lanlar</u> ($TOTAL)</b><br/>";
ECHO $divide;
$MAX = 10;
$PAGE = (!ISSET($_GET['page'])) ? 0 : $_GET['page'];
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}

$SELECT = @MYSQL_QUERY( "SELECT * FROM `users` WHERE `sex` = '0'  and `block` = '0' ORDER BY `id` DESC LIMIT $START,$MAX;" );
WHILE( $INF = MYSQL_FETCH_OBJECT($SELECT) ){
IF($INF->level > 3){
$EXP = @MYSQL_QUERY("SELECT * FROM `levels` WHERE `level` = '".$INF->level."'");
$L_ARR = @MYSQL_FETCH_OBJECT($EXP);
$L_NAME = "(<b>".$L_ARR->name."</b>)";
}ELSE{
$L_NAME = "";
}
IF($INF->time > TIME()){
$U_TIME = "<img src=\"group/img/komp.gif\"/>";
}ELSE{
$U_TIME =         "&#8226;";
}
ECHO "".($START+1).") $U_TIME ".$INF->user."  $L_NAME<br/>";
++$START;
}
IF($TOTAL > $MAX){
echo navigation("users.ys?b=$b&amp;ref=$ref", $TOTAL, $MAX, $PAGE);
}
break;

case '3':
$USERS = @MYSQL_QUERY("SELECT * FROM `users` WHERE `sex` = '1' and `block` = '0'");
$TOTAL = @MYSQL_NUM_ROWS($USERS);
ECHO "<b><u>Cemi Q&#305;zlar</u> ($TOTAL)</b><br/>";
ECHO $divide;
$MAX = 10;
$PAGE = (!ISSET($_GET['page'])) ? 0 : $_GET['page'];
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}

$SELECT = @MYSQL_QUERY( "SELECT * FROM `users` WHERE `sex` = '1' and `block` = '0' ORDER BY `id` DESC LIMIT $START,$MAX;" );
WHILE( $INF = MYSQL_FETCH_OBJECT($SELECT) ){
IF($INF->level > 3){
$EXP = @MYSQL_QUERY("SELECT * FROM `levels` WHERE `level` = '".$INF->level."'");
$L_ARR = @MYSQL_FETCH_OBJECT($EXP);
$L_NAME = "(<b>".$L_ARR->name."</b>)";
}ELSE{
$L_NAME = "";
}
IF($INF->time > TIME()){
$U_TIME = "<img src=\"img/komp.gif\"/>";
}ELSE{
$U_TIME =         "&#8226;";
}
ECHO "".($START+1).") $U_TIME ".$INF->user."  $L_NAME<br/>";
++$START;
}
IF($TOTAL > $MAX){
echo navigation("users.php?b=$b&amp;ref=$ref", $TOTAL, $MAX, $PAGE);
}
break;

case '4':
$DATE=DATE("d-m-Y");
$USERS = @MYSQL_QUERY("SELECT * FROM `users` WHERE `date` = '".$DATE."' and `block` = '0'");
$TOTAL = @MYSQL_NUM_ROWS($USERS);
ECHO "<b><u>Bu g&#252;n qeyd olanlar</u> ($TOTAL)</b><br/>";
ECHO $divide;
$MAX = 10;
$PAGE = (!ISSET($_GET['page'])) ? 0 : $_GET['page'];
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}

$SELECT = @MYSQL_QUERY( "SELECT * FROM `users` WHERE `date` = '".$DATE."' and `block` = '0' ORDER BY `id` DESC LIMIT $START,$MAX;" );
WHILE( $INF = MYSQL_FETCH_OBJECT($SELECT) ){
IF($INF->level > 3){
$EXP = @MYSQL_QUERY("SELECT * FROM `levels` WHERE `level` = '".$INF->level."'");
$L_ARR = @MYSQL_FETCH_OBJECT($EXP);
$L_NAME = "(<b>".$L_ARR->name."</b>)";
}ELSE{
$L_NAME = "";
}
IF($INF->time > TIME()){
$U_TIME = "<img src=\"img/komp.gif\"/>";
}ELSE{
$U_TIME =         "&#8226;";
}
ECHO "".($START+1).") $U_TIME ".$INF->user."  $L_NAME<br/>";
++$START;
}
IF($TOTAL > $MAX){
echo navigation("users.php?b=$b&amp;ref=$ref", $TOTAL, $MAX, $PAGE);
}
break;


}
ECHO $divide;
ECHO "<a href=\"index.ys?$ref\">Ana Sehife</a><br/>";
echo "</small>\n";
echo "</p></card></wml>";
mysql_close ($link);

?>