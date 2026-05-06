<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";

if($rm!="")$takep="&amp;rm=$rm&amp;ref=$ref";
elseif($x!="") $takep="&amp;x=$x&amp;&amp;ref=$ref";
else $takep="&amp;ref=$ref";
switch ($bol){

default:
if($mov<=0)$mov=1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}

echo "<card title=\"Foto-Albom / $u_user\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$query = mysql_query("select COUNT(id) from albom where idfoto = '".$img."';");
$all = @mysql_result($query, 0);


if($mov=="")$mov=1;
$mos = $mov-1;
$q = mysql_query("select * from albom where idfoto = '".$img."' order by id desc limit $mos,$mov;");
if (mysql_affected_rows() == 0) {
echo "<i>Bu &#304;stifade&#231;inin Foto-Albomunda &#350;ekili yoxdur</i><br/>----<br/>\n";
} else {



echo "\"<b>$u_user</b>\" / <u>&#350;ekiller</u> - (<b>$all</b>)<br/>----<br/>";

$arr = mysql_fetch_array($q);
$photo=$arr['photo'];
$info=$arr['info'];
$fid = $arr["id"];
$idfoto=$arr['idfoto'];

if (file_exists("photos/".$img."/".$photo.""))
{
$olcu = GetImageSize("photos/$img/$photo");


if(($olcu[0]>100)||($olcu[1]>100)){
echo "<a href=\"img_a.php?bol=1&amp;id=$id&amp;ps=$ps&amp;img=$mov&amp;fid=$fid$takep\"><img src=\"image.php?img=photos/$img/$photo&amp;size=100\" alt=\"$u_user\"/></a>\n";
}else{
echo "<a href=\"img_a.php?bol=1&amp;id=$id&amp;ps=$ps&amp;img=$mov&amp;fid=$fid$takep\"><img src=\"photos/$img/$photo\" alt=\"&#350;ekil\"/></a>\n";
}
}else{
echo "<i>&#350;ekil y&#252;klenmir (<b>Ftp</b>-den silinib)...</i>\n";
mysql_query ("DELETE from albom where id = '".$fid."'");
mysql_query ("update users set img = img-1 where id = '".$idfoto."';");

}
echo "<br/>-<br/>\n";
if($info)echo "<u>Qeyd</u>: $info<br/>----<br/>";
$next=$mov+1;
$prev=$mov-1;
if($mov>1) {
$ot=(($prev-1)*1)+1;
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$prev$takep\">&lt;&lt;$ot</a>.\n";
}

if ($all>$mov) {
$do=$next;
if($do>$all)$do=$all;
echo " |  <a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$next$takep\">$do&gt;&gt;</a>\n";
}
echo "<br/>";
if($all>1)echo "<br/>";
}
break;



case '1':
$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$fid."';");
if (mysql_affected_rows() == 0){
echo "<card title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>";
break;
}

echo "<card title=\"*FOTO*\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
$arr = mysql_fetch_array($q);
$vote=$arr['vote'];
$photo=$arr['photo'];
$info=$arr['info'];
$idfoto=$arr['idfoto'];
$del=$arr['id'];
$golds = $arr['golds'];
$likes = $arr['like'];

$qus = mysql_query ("Select user from users where id = '".$idfoto."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$del."';");
}


echo "\"<b>$u_user</b>\" leqebli &#350;exsin &#351;ekili<br/>*****<br/>\n";

if (file_exists("photos/".$idfoto."/".$photo.""))
{
$olcu = GetImageSize("photos/$idfoto/$photo");
$deyishensize = strlen($olcu[0])+strlen($olcu[1]);
if($deyishensize>300){
echo "<img src=\"images.php?img=photos/$idfoto/$photo\" alt=\"$u_user\"/><br/>\n";
}else{
echo "<img src=\"image.php?img=photos/$idfoto/$photo&amp;size=150\" alt=\"&#350;ekil\"/><br/>\n";
}

echo "<a href=\"images.php?img=photos/$idfoto/$photo\">Y&#252;kle</a>\n";

}else{
echo "<i>&#350;ekil y&#252;klenmir (<b>Ftp</b>-den silinib)...</i>\n";
}

if(($row["level"]>7)or($id==$idfoto))echo "/ <a href=\"img_a.php?bol=3&amp;del=$del&amp;id=$id&amp;ps=$ps$takep\">Sil</a>\n";
echo "<br/>\n";
echo "<a href=\"img_a.php?bol=4&amp;id=$id&amp;ps=$ps&amp;key=$del&amp;mov=$img$takep\">&#350;ekile ReY Bildir!</a>\n";
echo "<br/>-<br/>\n";
if($info)echo "<u>Qeyd</u>: $info<br/>-<br/>";

echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$idfoto&amp;mov=$img$takep\">Diger>> &#350;ekilleri</a><br/>\n";
break;

case '4':
require("file/fun/25");
break;

case 'like':
$key = $_GET['uid'];
$q = mysql_query( "SELECT * FROM `albom` WHERE `id` = '".$key."';" );
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

mysql_query( "Update `albom` set `like`='1'+`like` where `id` ='".$key."';" );
echo "<img src=\"default.jpeg\"/><br/><i>Beyendiniz</i><br/>----<br/>\n";



break;

// 1 ses verme
case '1ses':
if($row["bal"]<=0){
echo "<card title=\"Bal azd&#305;r\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>1 ses 1 bal deyerindedir sizin hesab&#305;n&#305;zda bal yoxdur...</i><br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;
}
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$uid."';");
}


echo "<u>Tebrikler</u><br/>----<br/>\"<b>$u_user</b>\" &#252;&#231;&#252;n verdiyiniz ses qebul edildi...\n";
mysql_query ("update users set bal = bal-1 where id = '".$id."';");
mysql_query ("update albom set vote = vote+1 where id = '".$uid."';");

$data=date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
$kol = rand(0,99999999);
$time = time();
$topic = "&#350;eklinize Ses verildi";
$menverdim = $row["user"];
$message = "Tebrikler <b>$u_user</b>. <u>$menverdim</u> sizin &#350;eklinize <img src=\"img/fotoses/1.png\"/> ses verdi. ";
mysql_query("insert into zapiski values(0,'Foto Qalareya','0','".$message."','".$user."','".$img."','".$time."','0','".$topic."','".$data."','1','1');");


echo "<br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

//2ses son


// 2 ses verme
case '2ses':
if($row["bal"]<=0){
echo "<card title=\"Bal azd&#305;r\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>1 ses 1 bal deyerindedir sizin hesab&#305;n&#305;zda bal yoxdur...</i><br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;
}
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$uid."';");
}


echo "<u>Tebrikler</u><br/>----<br/>\"<b>$u_user</b>\" &#252;&#231;&#252;n verdiyiniz ses qebul edildi...\n";
mysql_query ("update users set bal = bal-2 where id = '".$id."';");
mysql_query ("update albom set vote = vote+2 where id = '".$uid."';");
$data=date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
$kol = rand(0,99999999);
$time = time();
$topic = "&#350;eklinize Ses verildi";
$menverdim = $row["user"];
$message = "Tebrikler <b>$u_user</b>. <u>$menverdim</u> sizin &#350;eklinize <img src=\"img/fotoses/2.png\"/> ses verdi. ";
mysql_query("insert into zapiski values(0,'Foto Qalareya','0','".$message."','".$user."','".$img."','".$time."','0','".$topic."','".$data."','1','1');");

echo "<br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

//2ses son

// 3 SeS
case '3ses':
if($row["bal"]<=10){
echo "<card title=\"Bal azd&#305;r\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>10 ses 10 bal deyerindedir sizin hesab&#305;n&#305;zda bal yoxdur...</i><br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;
}
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$uid."';");
}


echo "<u>Tebrikler</u><br/>----<br/>\"<b>$u_user</b>\" &#252;&#231;&#252;n verdiyiniz ses qebul edildi...\n";
mysql_query ("update users set bal = bal-3 where id = '".$id."';");
mysql_query ("update albom set vote = vote+3 where id = '".$uid."';");
$data=date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
$kol = rand(0,99999999);
$time = time();
$topic = "&#350;eklinize Ses verildi";
$menverdim = $row["user"];
$message = "Tebrikler <b>$u_user</b>. <u>$menverdim</u> sizin &#350;eklinize <img src=\"img/fotoses/3.png\"/> ses verdi. ";
mysql_query("insert into zapiski values(0,'Foto Qalareya','0','".$message."','".$user."','".$img."','".$time."','0','".$topic."','".$data."','1','1');");

echo "<br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

// 3 SeS Son

// 4 SeS
case '4ses':
if($row["bal"]<=10){
echo "<card title=\"Bal azd&#305;r\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>10 ses 10 bal deyerindedir sizin hesab&#305;n&#305;zda bal yoxdur...</i><br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;
}
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$uid."';");
}


echo "<u>Tebrikler</u><br/>----<br/>\"<b>$u_user</b>\" &#252;&#231;&#252;n verdiyiniz ses qebul edildi...\n";
mysql_query ("update users set bal = bal-4 where id = '".$id."';");
mysql_query ("update albom set vote = vote+4 where id = '".$uid."';");
$data=date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
$kol = rand(0,99999999);
$time = time();
$topic = "&#350;eklinize Ses verildi";
$menverdim = $row["user"];
$message = "Tebrikler <b>$u_user</b>. <u>$menverdim</u> sizin &#350;eklinize <img src=\"img/fotoses/4.png\"/> ses verdi. ";
mysql_query("insert into zapiski values(0,'Foto Qalareya','0','".$message."','".$user."','".$img."','".$time."','0','".$topic."','".$data."','1','1');");

echo "<br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

// 4 SeS SOn

// 5 + sesverme
case 'gold':
if($row["bal"]<=50){
echo "<card title=\"Bal azd&#305;r\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>5+ ses 50 bal deyerindedir sizin hesab&#305;n&#305;zda bal yoxdur...</i><br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;
}
echo "<card title=\"Ses verildi!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

$qus = mysql_query ("Select user from users where id = '".$img."';");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$uid."';");
}


echo "<u>Tebrikler</u><br/>----<br/>\"<b>$u_user</b>\" &#252;&#231;&#252;n verdiyiniz ses qebul edildi...\n";
mysql_query ("update users set bal = bal-50 where id = '".$id."';");
mysql_query ("update albom set golds = golds+1 where id = '".$uid."';");
$data=date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
$kol = rand(0,99999999);
$time = time();
$topic = "&#350;eklinize Ses verildi";
$menverdim = $row["user"];
$message = "Tebrikler <b>$u_user</b>. <u>$menverdim</u> sizin &#350;eklinize <img src=\"img/fotoses/5.png\"/> ses verdi. ";
mysql_query("insert into zapiski values(0,'Foto Qalareya','0','".$message."','".$user."','".$img."','".$time."','0','".$topic."','".$data."','1','1');");

echo "<br/>----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$img&amp;mov=$mov$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

// GOLD SES SON


case 'like':


break;


// 3 delete
case '3':
$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$del."';");
if (mysql_affected_rows() == 0){
echo "<card title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>";
break;}
$arr = mysql_fetch_array($q);
$photo=$arr['photo'];
$info=$arr['info'];
$u_id=$arr['idfoto'];
$del=$arr['id'];

echo "<card title=\"Silindi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;

if(($row["level"]>7)or($id==$u_id)){
mysql_query ("DELETE from albom where id = '".$del."';");
mysql_query ("update users set img = img-1 where id = '".$u_id."';");
if (file_exists("photos/".$u_id."/".$photo.""))
{
unlink ("photos/".$u_id."/".$photo."");
}
echo "<u>&#350;ekil Silindi...</u><br/>-<br/>";
}else{
echo "Sizin Bu &#350;ekili Silmeye &#304;xtiyar&#305;n&#305;z yoxdur...<br/>----<br/>\n";

}
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$u_id$takep\">Geri Qay&#305;t</a><br/>\n";

break;
}

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">&#199;ata Qay&#305;t</a><br/>\n";
elseif($x!="") echo "<a href=\"galery.php?id=$id&amp;ps=$ps&amp;mod=$x&amp;ref=$ref\">Foto Qalereya</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>