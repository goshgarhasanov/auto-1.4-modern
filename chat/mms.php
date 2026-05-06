<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


if($row['room']!='29'){
mysql_query("UPDATE `users` SET `room` = '29' WHERE `id` = '".$id."' LIMIT 1;");
};



$_v->title('MMS Mektub Qutusu','center');

$_v->fsize1($fsize1);
echo "Multimediya mektublar (MMS-ler) Qutusu.<br/>MMS Mektub ile istediyiniz istifade&#231;iye &#246;z &#351;ekilinizi g&#246;ndere bilersiz.<br/>*****\n";
$_v->align('left');
$_v->fsize2($fsize2);

switch($mod)
{
case 'gelenler':
$_v->fsize1($fsize1);
echo "<b>Gelenler</b>:<br/>----<br/>\n";

$sms_count = mysql_query ("select count(lid) as num from mms where `to` = '".$id."' and `d2` = '0';");
$count = mysql_fetch_array($sms_count);
$sms_say = $count["num"];

if(!isset($s))$s=0;
$mx=round(($sms_say/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$sms_say)$do=$sms_say;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;



$r = mysql_query ("SELECT `lid`, `kod`, `read`, `id`, `date` FROM `mms` WHERE `to` = '".$id."' and `d2` = '0' order by lid desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Teess&#252;f ki, size MMS g&#246;nderen olmay&#305;b.<br/>----<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$lid=$arr['lid'];
$read=$arr['read'];
$from=$arr['id'];
$date = $arr['date'];
$qus = mysql_query ("Select user from users where id = '".$from."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$nick = $ind["user"];
}else{
mysql_query ("DELETE from mms where to = '".$from."'");
}

if($read == 0)
{
echo "<b>Yeni</b>-<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=gelen&amp;lid=$lid&amp;ref=$ref\">$nick</a> [$date]<br/>\n";
}
else
{
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=gelen&amp;lid=$lid&amp;ref=$ref\">$nick</a> [$date]<br/>\n";
}
}

echo "----<br/>";

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"mms.php?mod=gelenler&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;$ref\">&lt;&lt;$ot</a>.\n";
}}

$test = round($sms_say, 1)/10;

if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$sms_say)$do=$sms_say;
echo " |  <a href=\"mms.php?mod=gelenler&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($s>1)echo "<br/>";
$_v->fsize2($fsize2);

break;

case 'gedenler':
$_v->fsize1($fsize1);
echo "<b>G&#246;nderilenler</b>:<br/>----<br/>\n";


$sms_count = mysql_query ("select count(lid) as num from mms where `id` = '".$id."' and `d1` = '0';");
$count = mysql_fetch_array($sms_count);
$sms_say = $count["num"];

if(!isset($s))$s=0;
$mx=round(($sms_say/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$sms_say)$do=$sms_say;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;



$r = mysql_query("SELECT `lid`, `read`, `kod`, `to`, `date` FROM `mms` WHERE `id` = '".$id."' and `d1` = '0' order by lid desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "G&#246;nderilenler qutusunda MMS yoxdur.<br/>----<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$lid=$arr['lid'];
$read=$arr['read'];
$to=$arr['to'];
$date = $arr['date'];



$qus = mysql_query ("Select user from users where id = '".$to."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$nick = $ind["user"];
}else{
mysql_query ("DELETE from mms where to = '".$to."'");
}

if($read == 0)
{
echo "(Oxunmay&#305;b)-<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=geden&amp;lid=$lid&amp;ref=$ref\">$nick</a> [$date]<br/>\n";
}
else
{
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=geden&amp;lid=$lid&amp;ref=$ref\">$nick</a> [$date]<br/>\n";
}
}

echo "----<br/>";

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"mms.php?mod=gedenler&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;$ref\">&lt;&lt;$ot</a>.\n";
}}


$test = round($sms_say, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$sms_say)$do=$sms_say;
echo " |  <a href=\"mms.php?mod=gedenler&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($s>1)echo "<br/>";
$_v->fsize2($fsize2);
break;

case 'gelen':


$lid = intval($_GET['lid']);
$q = mysql_query("SELECT * FROM `mms` WHERE `lid` = '".$lid."' AND `to` = '".$id."'  AND `d2` = '0';");

if(mysql_num_rows($q) == 0)
{
$_v->fsize1($fsize1);
echo "<b>Fayl yoxdur.</b><br/><i>MMS Fayl tap&#305;lmad&#305;, yaqin silinib.</i><br/>----<br/>\n";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MMS qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);

exit;
}
mysql_query("UPDATE `mms` SET `read` = 1 WHERE `lid` = '".$lid."';");

$letter = mysql_fetch_array($q);
$to = $letter['to'];
$from = $letter['id'];
$text = $letter['body'];
$date = $letter['date'];
$mms = $letter['photo'];


$qus = mysql_query ("Select user from users where id = '".$from."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$nick = $ind["user"];
}else{
$nick = "user_not";
}


$_v->fsize1($fsize1);
echo "<u>G&#246;nderdi:</u> <b>$nick</b>, leqebli istifade&#231;i <br/>\n";
echo "<u>Vaxt:</u> $date<br/>*****<br/>\n";
$sql = mysql_query("SELECT `photo` FROM `mms` WHERE `lid` = '".$lid."';");
$adi = mysql_result($sql, 0);
$_v->fsize2($fsize2);

if(file_exists("mms/".$adi)){
$fl=explode(".", $adi);
$file=trim($fl[1]);

if(($file=="gif")or($file=="jpg")or($file=="jepg")or($file=="png")){
echo "<img src=\"yes1.php?file=mms/".$adi." \" alt=\"foto\"/><br/>";
$fayladi ="&#350;ekili";
}elseif($file=="3gp"){
$_v->fsize1($fsize1);
echo "<b>$nick</b>,  Size <u>.3gp</u>, (Video - canl&#305; g&#246;r&#252;nt&#252;) format&#305;nda fayl g&#246;nderib.<br/>";
$_v->fsize2($fsize2);
$fayladi ="3gp fayl&#305;n&#305;";
}elseif($file=="doc"){
$_v->fsize1($fsize1);
echo "<b>$nick</b>,  Size <u>.doc</u>, (metn-yaz&#305;, Microsoft Word) format&#305;nda fayl g&#246;nderib.<br/>";
$_v->fsize2($fsize2);
$fayladi ="fayl&#305;";

}elseif($file=="mp3"){
$_v->fsize1($fsize1);
echo "<b>$nick</b>,  Size <u>.mp3</u>, (Musiqi - ses) format&#305;nda fayl g&#246;nderib.<br/>";
$_v->fsize2($fsize2);
$fayladi ="mp3 fayl&#305;n&#305;";
}else{
$_v->fsize1($fsize1);
echo "<b>Fayl&#305;n tipi melum deyil.</b><br/>----<br/>";
$_v->fsize2($fsize2);
}

$olchu=round(filesize("mms/".$adi."")/1024,1);
echo "<b><u>".$olchu."</u> kb </b>-l&#305;q\n";
$daroq = getimagesize("mms/".$adi."");
$x_size=trim($daroq[0]);
$y_size=trim($daroq[1]);
$n_nam=trim($daroq[2]);

if((($x_size>220)||($y_size>220))and(($n_nam=="1")||($n_nam=="2")||($n_nam=="3"))){
if($n_nam=="1"){$img_type="gif";}
if($n_nam=="2"){$img_type="jpg";}
if($n_nam=="3"){$img_type="png";} 
echo "<a href=\"mms/".$adi."\">$fayladi y&#252;kle</a><br />----<br />\n";
}else{
echo "<a href=\"mms/".$adi."\">$fayladi y&#252;kle</a><br />----<br />\n";
}

}else{
$_v->fsize1($fsize1);
echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
$_v->fsize2($fsize2);
}
$_v->fsize1($fsize1);






if($text)echo "<b>Qeyd:</b>: <i>$text</i><br/>----<br/>\n";

echo "<a href=\"upload.php?id=$id&amp;ps=$ps&amp;toid=$from&amp;n=$ref\">Cavab yaz</a> | \n";

echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=sil&amp;lid=$lid&amp;n=$ref\">MMS-i Poz</a><br/>\n";
$_v->fsize2($fsize2);
break;


case 'geden':
$q = mysql_query("SELECT * FROM `mms` WHERE `lid` = '".$lid."' AND `id` = '".$id."' AND `d1` = '0';");

if(mysql_num_rows($q) == 0)
{
$_v->fsize1($fsize1);
echo "<b>Fayl yoxdur.</b><br/><i>MMS Fayl tap&#305;lmad&#305;, yaqin silinib.</i><br/>----<br/>\n";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MMS qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);

exit;
}

$letter = mysql_fetch_array($q);
$lid = $letter['lid'];
$to = $letter['to'];
$from = $letter['id'];
$text = $letter['body'];
$date = $letter['date'];
$mms = $letter['photo'];



$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$to."';");
$nick = mysql_result($q, 0);
$_v->fsize1($fsize1);

echo "<u>Tarix</u>: $date<br/>*****<br/>\n";
$_v->fsize2($fsize2);
$sql = mysql_query("SELECT `photo` FROM `mms` WHERE `lid` = '".$lid."';");
$adi = mysql_result($sql, 0);


if(file_exists("mms/".$adi)){
$fl=explode(".", $adi);
$file=trim($fl[1]);

if(($file=="gif")or($file=="jpg")or($file=="jepg")or($file=="png")){
echo "<img src=\"yes1.php?file=mms/".$adi." \" alt=\"foto\"/><br/>";
$fayladi ="&#350;ekili";
}elseif($file=="3gp"){
$_v->fsize1($fsize1);
echo "Siz <u>.3gp</u>, (Video - canl&#305; g&#246;r&#252;nt&#252;) format&#305;nda olan bu fayl&#305; <b>$nick</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
$_v->fsize2($fsize2);
$fayladi ="3gp fayl&#305;n&#305;";
}elseif($file=="doc"){
$_v->fsize1($fsize1);
echo "Siz <u>.doc</u>, (metn-yaz&#305;, Microsoft Word) format&#305;nda olan bu fayl&#305; <b>$nick</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
$_v->fsize2($fsize2);
$fayladi ="fayl&#305;";

}elseif($file=="mp3"){
$_v->fsize1($fsize1);
echo "Siz <u>.mp3</u>, (Musiqi - ses) format&#305;nda olan bu fayl&#305; <b>$nick</b>, leqebli istifade&#231;iye g&#246;nderibsiz.<br/>";
$_v->fsize2($fsize2);
$fayladi ="mp3 fayl&#305;n&#305;";
}else{
$_v->fsize1($fsize1);
echo "<b>Fayl&#305;n tipi melum deyil.</b><br/>----<br/>";
$_v->fsize2($fsize2);
}

$olchu=round(filesize("mms/".$adi."")/1024,1);
echo "<b><u>".$olchu."</u> kb </b>-l&#305;q\n";
$daroq = getimagesize("mms/".$adi."");
$x_size=trim($daroq[0]);
$y_size=trim($daroq[1]);
$n_nam=trim($daroq[2]);

if((($x_size>220)||($y_size>220))and(($n_nam=="1")||($n_nam=="2")||($n_nam=="3"))){
if($n_nam=="1"){$img_type="gif";}
if($n_nam=="2"){$img_type="jpg";}
if($n_nam=="3"){$img_type="png";} 
echo "<a href=\"mms/".$adi."\">$fayladi y&#252;kle</a><br />----<br />\n";
}else{
echo "<a href=\"mms/".$adi."\">$fayladi y&#252;kle</a><br />----<br />\n";
}

}else{
$_v->fsize1($fsize1);
echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
$_v->fsize2($fsize2);
}

$_v->fsize1($fsize1);

if($text)
echo "<b>Qeyd:</b>: <i>$text</i><br/>----<br/>\n";

echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=gedenler&amp;n=$ref\">Geri qay&#305;t</a> |\n";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=sil&amp;lid=$lid&amp;n=$ref\">MMS-i Poz</a><br/>\n";

$_v->fsize2($fsize2);
break;


case 'temizlik':
mysql_query("UPDATE `mms` SET `d1` = 1 WHERE `id` = '".$id."';");//gonderdiklerim
mysql_query("UPDATE `mms` SET `d2` = 1 WHERE `to` = '".$id."';");//gelenler
$_v->fsize1($fsize1);
echo "<u>Size aid olan MMS fayllar silindi.</u><br/>----<br/>\n";
$_v->fsize2($fsize2);

break;

case 'sil':
$sql = mysql_query("SELECT `photo`,`to`,`id` FROM `mms` WHERE `lid` = '".$lid."' and (`d2` = '0' or `d1` = '0');");
if(mysql_num_rows($sql) == 0)
{
$_v->fsize1($fsize1);
	echo "<b>MMS Tap&#305;lmad&#305;...</b><br/>----<br/>\n";
$_v->fsize2($fsize2);
}
else 
{
$ff = @mysql_fetch_array($sql);
$photo = $ff['photo'];
$usid = $ff['to'];
$from = $ff['id'];
if($usid==$id){

	$_v->fsize1($fsize1);
	echo "<u>MMS Fayl&#305; silindi...</u><br/>----<br/>\n";
	$_v->fsize2($fsize2);
mysql_query("UPDATE `mms` SET `d2` = 1 WHERE `to` = '".$id."' and `lid` = '".$lid."';");//gelenler
}
elseif($from==$id){
	$_v->fsize1($fsize1);
	echo "<u>MMS Fayl&#305; silindi...</u><br/>----<br/>\n";
	$_v->fsize2($fsize2);
mysql_query("UPDATE `mms` SET `d1` = 1 WHERE `id` = '".$id."' and `lid` = '".$lid."';");//gelenler
}
else
{
$_v->fsize1($fsize1);
echo "Sizin Bu MMS-i  Silmek h&#252;ququnuz yoxdur.<br/>\n";
echo "----<br/>\n";
$_v->fsize2($fsize2);
}
}
break;

default:
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' AND `read` = 0 and `d2` = '0';");
$newto = mysql_result($q, 0);
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' and `d2` = '0';");
$to = mysql_result($q, 0);
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE `id` = '".$id."' and `d1` = '0';");
$from = mysql_result($q, 0);
$_v->fsize1($fsize1);
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=gelenler&amp;ref=$ref\">Gelenler ($newto/$to)</a><br/>\n";

echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=gedenler&amp;ref=$ref\">Gedenler ($from)</a><br/>\n";


echo "<a href=\"upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ekil(mms) G&#246;nder</a><br/>\n";

echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=temizlik&amp;ref=$ref\">B&#252;t&#252;n MMS &#350;ekilleri Sil</a><br/>\n";
$_v->fsize2($fsize2);
break;
}
$_v->fsize1($fsize1);
if(!empty($mod)) echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MMS qutusu</a><br/>\n";
echo "*****<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>