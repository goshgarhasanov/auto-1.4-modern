<?php

require( "inc.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$_error_buga=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error"));



$_error_44=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_user_error"));
$_error_44 = $_error_44[0];
$_error_0=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '0'"));
$_error_0 = $_error_0[0];
$_error_1=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '1'"));
$_error_1 = $_error_1[0];
$_error_2=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '2'"));
$_error_2 = $_error_2[0];
$_error_3=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '3'"));
$_error_3 = $_error_3[0];
$_error_4=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '4'"));
$_error_4 = $_error_4[0];
$_error_5=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '5'"));
$_error_5 = $_error_5[0];
$_error_6=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '6'"));
$_error_6 = $_error_6[0];
$_error_7=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '7'"));
$_error_7 = $_error_7[0];
$_error_8=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '8'"));
$_error_8 = $_error_8[0];
$_error_9=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '9'"));
$_error_9 = $_error_9[0];
$_error_10=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '10'"));
$_error_10 = $_error_10[0];
$_error_11=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '11'"));
$_error_11 = $_error_11[0];
$_error_12=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM bot_message_error WHERE nov = '12'"));
$_error_12 = $_error_12[0];
/* **************************** */
$_v->title('Canl&#305; Bot Paneli','left');
		$_v->fsize1($fsize1);
if($row['level']!='9'){
                    echo 'Sizin buna huququnuz yoxdur.<br/>';
                    break;
                }
switch ($go) {
default:
echo "<u>Bot Sistemi</u><br/>";
echo $divide;
echo "- <a href=\"boot.php?go=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Online Userlerden Bot Yarat</a><br/>";
echo "- <a href=\"boot.php?go=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Botlar&#305;n Say&#305;</a>($_error_44)<br/>";
echo $divide;
echo "- <a href=\"boot.php?go=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaj Elave Et</a><br/>";
echo $divide;
echo "<u>Mesaj Bot Sistemi</u><br/>";
echo $divide;
echo "- <a href=\"boot.php?nov=1&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Salamlama</a>($_error_1)<br/>";
echo "- <a href=\"boot.php?nov=2&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sual Cavab</a>($_error_2)<br/>";
echo "- <a href=\"boot.php?nov=3&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tan&#305;&#351;liq</a>($_error_3)<br/>";
echo "- <a href=\"boot.php?nov=4&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bot dedikde</a>($_error_4)<br/>";
echo "- <a href=\"boot.php?nov=5&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sevgi</a>($_error_5)<br/>";
echo "- <a href=\"boot.php?nov=6&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sohbet</a>($_error_6)<br/>";
echo "- <a href=\"boot.php?nov=7&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Birteher</a>($_error_7)<br/>";
echo "- <a href=\"boot.php?nov=8&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">A&#287;lamaq</a>($_error_8)<br/>";
echo "- <a href=\"boot.php?nov=9&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ehtiras</a>($_error_9)<br/>";
echo "- <a href=\"boot.php?nov=10&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nomre</a>($_error_10)<br/>";
echo "- <a href=\"boot.php?nov=11&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Reklam</a>($_error_11)<br/>";
echo "- <a href=\"boot.php?nov=12&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dini</a>($_error_12)<br/>";
echo "- <a href=\"boot.php?nov=0&amp;go=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Diger</a>($_error_0)<br/>";
echo $divide; 
echo "Statistika:<br/>\n";
echo "Cemi Botlar: <b>".trim($_error_44[0])."</b><br/>\n";
echo "Cemi Mesajlar: <b>".trim($_error_buga[0])."</b><br/>\n";




break;

case "rules";
echo "<a href=\"boot.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bot Panel</a> /  <u>Qaydalar</u><br/>";
echo $divide;
echo "<b>\"Canl&#305; Bot\"</b> AZNETD&#399; ilk d&#601;f&#601; olaraq <u>Buga</u> t&#601;r&#601;find&#601;n ekskluziv olaraq <b>".$site."</b> sayt&#305; &#252;&#231;&#252;n yaz&#305;lm&#305;&#351;d&#305;r.<br/>\n";
echo $divide;
echo "1) &#304;&#351;l&#601;m&#601; qaydas&#305; &#231;ox sad&#601;dir.&#199;atda m&#246;vcut olan Nik v&#601; ya &#304;D n&#246;mr&#601;sini &#601;lav&#601; edirsiniz.<br/>\n";


echo "2) Botlar &#252;&#231;&#252;n mesaj &#601;lav&#601; ed&#601;rk&#601;n S&#246;z&#252; ki&#231;ik h&#601;rifl&#601; yaz&#305;n. Botun cavab&#305;n&#305; is&#601; &#252;r&#601;yiniz ist&#601;y&#601;n kimi yaza bil&#601;rsiniz.<br/>\n";
echo "3) Bot &#601;lav&#601; edildikd&#601;n sonra Online v&#601;ziyy&#601;tind&#601; olur.<br/>\n";
echo "4) Botlar&#305;n <u>&#220;mumi Postu, G&#252;nd&#601;lik Postu, Aktivliyi v&#601; Missiasi art&#305;r</u>. Bu o dem&#601;kdirki, Ona yazan istifad&#601;&#231;ini &#351;&#252;p&#601;l&#601;ndirmir.<br/>\n";
echo "5) Bot h&#601;r yaz&#305;lan mesaj&#305; oxuyur v&#601; ona yaz&#305;lan s&#246;zl&#601;r Bot Paneld&#601; varsa h&#601;min istifad&#601;&#231;iy&#601; cavab yazacaq.<br/>\n";

break;
case 2:
if(!$_POST['end']){


        if($_v->ver != "wml"){
$_v->action("boot.php?go=2&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref");
echo "<b>Bot Nick Add</b><br/>";
echo $divide;
echo "Nik ve ya Id:<br/>";
echo "<input name=\"nick\" title=\"nk\" emptyok=\"true\"/><br/>\n";
echo $divide;
print $_v->submit( "Yenile", "end=byerror" );
}else{
echo "<b>Bot Nick Add</b><br/>";
echo $divide;
echo "Nik ve ya Id:<br/>";
echo "<input name=\"nick$ref\" title=\"nk\" emptyok=\"true\"/><br/>\n";
echo $divide;
echo "[<anchor title=\"go\">Elave Et<go href=\"boot.php?go=2&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(nick$ref)\"/>";
echo "<postfield name=\"end\" value=\"byerror\"/>";
echo "</go></anchor>]<br/>";
}
}else{
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user from users where id = '".$nick."'");
}
if (mysql_affected_rows() == 0) {
echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";
break;
}
$bot = mysql_fetch_array ($select);
$sql_error = mysql_query ("Select id from bot_user_error where userid = '".$bot['id']."'");
if (mysql_affected_rows() != 0) {
echo "Bele Bot m&#246;vcutdur!<br/>";
break;
}
if(mysql_query("insert into `bot_user_error` set  `userid`='".$bot['id']."', `user`='".$bot['user']."';")) {
mysql_query("Update `users` set `ontime` = '".($SERVER_TIME+10)."', `bot` = '1' where `id` ='".$bot['id']."';");


echo "<b>$bot[user]</b> Boot Elave Edildi!<br/>";
}else{
echo "".mysql_error()."";
}
}

break;
case 3:
echo "<b>Bot Nikler</b><br/>";
echo $divide;
$userm = mysql_query ("select count(id) as num from bot_user_error $table_banned;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

echo "G&#246;sterir: $n-$do /Cemi: $num<br/>\n";
echo $divide;
$r = mysql_query ("select * from bot_user_error order by id desc limit $o,$do");
if(mysql_affected_rows() == false)
{
echo "Bot Elave Edilmeyib.<br/>\n";
}
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);

echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$arr[userid]&amp;ref=$ref\">$arr[user]</a> - ";
echo "[<a href=\"boot.php?act=1&amp;nk=$arr[id]&amp;go=8&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>]<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide;
echo "<a href=\"boot.php?go=3&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"boot.php?go=3&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}
break;
case 7:
echo "<b>Bot Mesajlar</b><br/>";
echo $divide;
if($nov != 0 && $nov>12){
echo "Bele B&#246;lme m&#246;vcut deyil!<br/>";
break;
}
$nov = $_GET['nov'];
$table_error = "where nov = '".$nov."'";
$userm = mysql_query ("select count(id) as num from bot_message_error $table_error;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

echo "G&#246;sterir: $n-$do /Cemi: $num<br/>\n";
echo $divide;
$r = mysql_query ("select * from bot_message_error $table_error order by id desc limit $o,$do");
if(mysql_affected_rows() == false)
{
echo "Mesaj Elave Edilmeyib.<br/>\n";
}
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);

echo ($i).") S&#246;z: $arr[soz] &#xbb; Mesaj: $arr[mesaj] ";
echo "[<a href=\"boot.php?act=3&amp;nk=$arr[id]&amp;go=8&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>]<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide;
echo "<a href=\"boot.php?go=7&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;nov=$nov&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"boot.php?go=7&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;nov=$nov&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}

break;

case 6:
if(!$_POST['end']){


        if($_v->ver != "wml"){
$_v->action("boot.php?go=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
echo "S&#246;z:<br/>";
echo "<input type=\"text\" name=\"soz\"  title=\"Mesaj\"/><br/>\n";
echo "Mesaj:<br/>";
echo "<input type=\"text\" name=\"mesaj\"  title=\"Mesaj\"/><br/>\n";
echo "B&#246;lme:<br/>";
echo "<select name=\"nov\">\n";
echo "<option value=\"1\">Salamlama</option>\n";
echo "<option value=\"2\">Sual Cavab</option>\n";
echo "<option value=\"3\">Tan&#305;&#351;liq</option>\n";
echo "<option value=\"4\">Bot dedikde</option>\n";
echo "<option value=\"5\">Sevgi</option>\n";
echo "<option value=\"6\">Sohbet</option>\n";
echo "<option value=\"7\">Birteher</option>\n";
echo "<option value=\"8\">A&#287;lamaq</option>\n";
echo "<option value=\"9\">Ehtiras</option>\n";
echo "<option value=\"10\">Nomre</option>\n";
echo "<option value=\"11\">Reklam</option>\n";
echo "<option value=\"12\">Dini</option>\n";
echo "<option value=\"0\">Diger</option>\n";
echo "</select><br/>\n";
echo $divide;
print $_v->submit( "Yenile", "end=byerror" );
}else{

echo "S&#246;z:<br/>";
echo "<input type=\"text\" name=\"soz$ref\"  title=\"Mesaj\"/><br/>\n";
echo "Mesaj:<br/>";
echo "<input type=\"text\" name=\"mesaj$ref\"  title=\"Mesaj\"/><br/>\n";
echo "B&#246;lme:<br/>";
echo "<select name=\"nov$ref\">\n";
echo "<option value=\"1\">Salamlama</option>\n";
echo "<option value=\"2\">Sual Cavab</option>\n";
echo "<option value=\"3\">Tan&#305;&#351;liq</option>\n";
echo "<option value=\"4\">Bot dedikde</option>\n";
echo "<option value=\"5\">Sevgi</option>\n";
echo "<option value=\"6\">Sohbet</option>\n";
echo "<option value=\"7\">Birteher</option>\n";
echo "<option value=\"8\">A&#287;lamaq</option>\n";
echo "<option value=\"9\">Ehtiras</option>\n";
echo "<option value=\"10\">Nomre</option>\n";
echo "<option value=\"11\">Reklam</option>\n";
echo "<option value=\"12\">Dini</option>\n";
echo "<option value=\"0\">Diger</option>\n";
echo "</select><br/>\n";
echo $divide;
echo "<anchor>Elave Et<go href=\"boot.php?go=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nov\" value=\"$(nov$ref)\"/>\n";
echo "<postfield name=\"mesaj\" value=\"$(mesaj$ref)\"/>\n";
echo "<postfield name=\"soz\" value=\"$(soz$ref)\"/>\n";
echo "<postfield name=\"end\" value=\"byerror\"/>\n";
echo "</go></anchor><br/>\n";
}
}else{
if($mesaj == "" or !$mesaj){
echo "Mesaj Yazmadiniz!<br/>";
break;
}

if($soz == "" or !$soz){
echo "S&#246; Yazmadiniz!<br/>";
break;
}
if(strlen($soz)<3){
echo "S&#246;z 2 simvoldan cox olmalidir!<br/>";
break;
}


if(strlen($mesaj)<3){
echo "Mesaj 2 simvoldan cox olmalidir!<br/>";
break;
}
if(mysql_query("insert into `bot_message_error` set  `soz` = '".$soz."', `mesaj`='".$mesaj."', `nov`='".$nov."';")){
echo "Mesaj Elave Edildi!<br/>";
}else{
echo "".mysql_error()."";
}
}
break;
case 8:
$act = $_GET['act'];
$nk = $_GET['nk'];
if($act == 1){
if(mysql_query("DELETE FROM `bot_user_error` WHERE `id` = '".$nk."';")) {
echo "Bot Silindi<br/>";
}else{
echo "".mysql_error()."";
}
}elseif($act == 3){
if(mysql_query("DELETE FROM `bot_message_error` WHERE `id` = '".$nk."';")) {
echo "Mesaj Silindi<br/>";
}else{
echo "".mysql_error()."";
}
}else{
echo "Bele B&#246;lme m&#246;vcut deyil!<br/>";
}
break;
}
echo $divide;

if($go == ""){
echo "<a href=\"boot.php?go=rules&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>\n";
}

if($go)echo "<a href=\"boot.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
		$_v->end('1',$link);
?>