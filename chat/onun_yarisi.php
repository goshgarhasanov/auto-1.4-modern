<?
header("Content-type:text/vnd.wap.wml");
header("Cache-Control: no-store, no-cache, must-revalidate");

require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
if(isset($us)){
$us=trim($us);
if($us=="") require("function/not_found.php");
}
if(isset($id)){
if (!ctype_digit($id)) { header("Location: index.php"); die; }
$result = @mysql_query ("Select pass,user,level,safe,user_ip,user_soft,posts,fsize,banned,bal from users where id='".$id."' LIMIT 1;");
} else {
if (!ctype_digit($us)) {
if($trun==1) {$us=trun_to_rus($us);}
$latuser=strtolower($us);
$ruser = rus_to_k($us);
if($ruser==$us){
$result = mysql_query ("Select id,pass,user,level,safe,user_ip,user_soft,posts,fsize,banned,bal from users where latuser = '".$latuser."' or user = '".$us."' LIMIT 1;");
} else {
$result = mysql_query ("Select id,pass,user,level,safe,user_ip,user_soft,posts,fsize,banned,bal from users where ruser = '".$ruser."' or user = '".$us."' LIMIT 1;");
}
} else {
$result = mysql_query ("Select id,pass,user,level,safe,user_ip,user_soft,posts,fsize,banned,bal from users where id = '".$us."' LIMIT 1;");
}
if (mysql_affected_rows() == 0) require("function/not_found.php");
}
$row = mysql_fetch_array ($result);
if(!isset($id)) $id=$row["id"];

if ($ps !== $row["pass"]) require("function/bad_pass.php");

if (($row["banned"]==1)&&($row["level"]<7)) require("function/banned.php");

## ?&#376;ieN&#402;N&#8225;eN&#8218;N&#338; iacaaiea aiN&#65533; iaaaee ##
$engDay = date("l");
## ?&#382;iN&#8364;aaaeeN&#8218;N&#338; iacaaiea aiN&#65533; iaaaee ii-N&#8364;N&#402;N&#65533;N&#65533;ee ##
switch($engDay){
case "Monday": $rusDay = "Bazar ertesi"; break;
case "Tuesday": $rusDay = "&#199;er&#351;enbe Ax&#351;ami"; break;
case "Wednesday": $rusDay = "&#199;er&#351;enbe"; break;
case "Thursday": $rusDay = "C&#252;me Ax&#351;ami"; break;
case "Friday": $rusDay = "C&#252;me"; break;
case "Saturday": $rusDay = "&#350;enbe"; break;
default: $rusDay = "Bazar"; break;
}

$t=date("H:i:s", mktime(date ("H")+0)); ## aN&#8364;aiN&#65533;, +0 - iN&#8218;eeN&#8225;ea iN&#8218; aN&#8364;aiaie N&#65533;aN&#8364;aaN&#8364;a ##
$d=date("d F Y", time()); ## aaN&#8218;a
$d = str_replace("January","Yanvar",$d);
$d = str_replace("February","Fevral",$d);
$d = str_replace("March","Mart",$d);
$d = str_replace("April","Aprel",$d);
$d = str_replace("May","May",$d);
$d = str_replace("June","Iyun",$d);
$d = str_replace("July","Iyul" ,$d);
$d = str_replace("August","Avqust",$d);
$d = str_replace("September","Senytabr",$d);
$d = str_replace("October","Oktyabr",$d);
$d = str_replace("November","Noyabr",$d);
$d = str_replace("December","Dekabr",$d);

//?&#376;N&#8364;aaN&#402;iN&#8364;a?aaiea i aaciiaN&#65533;iiN&#65533;N&#8218;e a caieN&#65533;ee
$us_ip = $row["user_ip"];
$us_soft = $row["user_soft"];
if(($row["user_soft"]!==$HTTP_USER_AGENT||$row["user_ip"]!==$REMOTE_ADDR)){
mysql_query ("Update users set user_soft='".$HTTP_USER_AGENT."', user_ip = '".$REMOTE_ADDR."' WHERE id = '".$id."';");
if ($row["safe"]==1){
$data = date("d-M-Y [H:i]");
$kolf = rand(0,99999999);
$time = time();
$message = "Diqqet! Sizin evvelki ip: $us_ip ve ya Telefon: $us_soft, Eger ip+tel bele deyilse nikinizden istifade olunub.Parolunuzu deyishmek meslehet gorulur.";
$robokop = @mysql_fetch_array(@mysql_query ("Select user from users where id='7' LIMIT 1;"));
@mysql_query("Insert into zapiski set klu4='".$kolf."', who ='".$robokop[0]."', idwho ='7', message = '".$message."', towhom = '".$user."', idtowhom = '".$id."', time = '".$time."', readd = '0', topic = 'Diqqet!!!', date='".$data."'");
}
}




$user=$row["user"];
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];

if (($row["posts"]>=0)&&($row["level"]<1)){
$levelselect = @mysql_query ("Select name from levels where level=1");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 1; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$time = time();
$message = "Xosh Gelmisiniz <b>".$user."</b>!!! Siz chata daxil oldugunuz zaman <b>".$adm."</b> size <b>".$levelname."</b> statusunu teyin edir.";
@mysql_query("Insert into zapiski set klu4='".$kolw."', who ='".$adm."', idwho ='1', message = '".$message."', towhom = '".$user."', idtowhom = '".$id."', time = '".$time."', readd = '0', topic = 'Tebrikler!!!', date='".$data."'");
}

if (($row["posts"]>=3000)&&($row["level"]<2)){
$levelselect = @mysql_query ("Select name from levels where level=2");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 2; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$time = time();
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> size <b>".$levelname."</b> statusunu teyin edir.";
@mysql_query("Insert into zapiski set klu4='".$kolw."', who ='".$adm."', idwho ='1', message = '".$message."', towhom = '".$user."', idtowhom = '".$id."', time = '".$time."', readd = '0', topic = 'Tebrikler!!!', date='".$data."'");
}

if (($row["posts"]>=7000)&&($row["level"]<3)){
$levelselect = @mysql_query ("Select name from levels where level=3");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 3; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$time = time();
$message = "Tebrikler <b>".$user."</b>!!! Siz lazimi postu yigdiniz <b>".$adm."</b> size <b>".$levelname."</b> statusunu teyin edir.";
@mysql_query("Insert into zapiski set klu4='".$kolw."', who ='".$adm."', idwho ='1', message = '".$message."', towhom = '".$user."', idtowhom = '".$id."', time = '".$time."', readd = '0', topic = 'Tebrikler!!!', date='".$data."'");
}

for ($n = 0; $n <= 12; $n++){
$room = "room".$n;
$tm = time()-99999;
$r = @mysql_query ("Select who from $room WHERE id > '".$tm."' group by who order by id desc;");
$asnum = mysql_affected_rows();
$siz[$n] = $asnum;
@$kol = $kol + $asnum;
}


$pr_count = @mysql_query("SELECT id,user FROM users WHERE onl> '".$tm ."' AND room='holl' group by user order by onl desc;");
$asnumspr = mysql_affected_rows();
@$kolpr = $kolpr + $asnumspr;

$kols = $kol + $kolpr;

$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1');");
$a = mysql_fetch_array($r);
$inb = $a["num"];

$cmc = mysql_query ("select count(id) as num from vstrechi WHERE 1;");
$cmac = mysql_fetch_array($cmc);
$cmtot = $cmac["num"];

if($row['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
elseif($row['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
else { $fsize1 = ""; $fsize2 = ""; }

ob_start();
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"dehliz\" title=\"Evlilik\">";

echo "<p align=\"left\">";



echo $fsize1;
if ($row["level"]>7){
//echo $divide;
//echo "<a href=\"znak.php?id=$id&amp;ps=$ps&amp;ref=$ref\">znake</a><br/>";
//echo "<a href=\"tural.php?id=$id&amp;ps=$ps&amp;ref=$ref\">BaSH Admin panel</a><br/>";

//echo "<b><a href=\"tural.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=tox\">Toxunulmazlar!</a></b><br/>";

//echo "<a href=\"apanel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin</a><br/>";
//echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal ver</a><br/>";
//echo "<a href=\"mpanel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Moder</a><br/>";
if ($row["level"]>6){
$zz = mysql_query ("select count(id) as num from sikayet WHERE id != '0';");
$a = mysql_fetch_array($zz);
$sika = $a["num"];
if($sika!=0)echo "<a href=\"sg.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ikayete BAX</a>($sika)<br/>"; }
echo $divide;
}
else if ($row["level"]>6){
echo "<a href=\"mpanel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin menyu</a>|";
echo "<a href=\"mpanel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Moder menyu</a><br/>";
echo $divide;
}
else if ($row["level"]>3){
echo "<a href=\"mpanel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Moder menyu</a><br/>";
echo $divide;
}
if ($row["level"]<4) ;
$idnews=mysql_fetch_array(mysql_query("SELECT MAX(id) FROM news"));
if ($idnews[0]>0) $news=mysql_fetch_array(mysql_query("SELECT date FROM news where id=$idnews[0]"));
if (isset($news[0]))
$t=date("H:i:s", mktime(date ("H")+0)); ## aN&#8364;aiN&#65533;, +0 - iN&#8218;eeN&#8225;ea iN&#8218; aN&#8364;aiaie N&#65533;aN&#8364;aaN&#8364;a ##
$d=date("d F Y", time()); ## aaN&#8218;a
$d = str_replace("January","Yanvar",$d);
$d = str_replace("February","Fevral",$d);
$d = str_replace("March","Mart",$d);
$d = str_replace("April","Aprel",$d);
$d = str_replace("May","May",$d);
$d = str_replace("June","Iyun",$d);
$d = str_replace("July","Iyul" ,$d);
$d = str_replace("August","Avqust",$d);
$d = str_replace("September","Senytabr",$d);
$d = str_replace("October","Oktyabr",$d);
$d = str_replace("November","Noyabr",$d);
$d = str_replace("December","Dekabr",$d);


$r = @mysql_query ("Select user,bal from users where id='$id';");
$rrr = @mysql_fetch_array ($r);
$nk = $rrr["user"];
$bal = $rrr["bal"];


switch($ceko)
{
case 'qebul':

if($bal < 20) {
echo "- Onun yarisina uzv olsaniz balansinizda 10 bal cixilacaq<br/> ";
echo "- Hormetli <u>$nk</u> Onun yarisina qatila bilmenizcun hesabinizda 20 bal olmalidir. !  sizin ise <b>$bal</b> baliniz var balansinizi artirin!!<br/>";
} else {


if(!isset($_POST['qq']))
{


echo "- Meni beyenib gelen:";
echo "<input type=\"text\" name=\"gelen$ref\" maxlength=\"120\" value=\"\"/><br/>\n";


echo "- Ayliq gelirim:";
echo "<input type=\"text\" name=\"gelir$ref\" maxlength=\"120\" value=\"\"/><br/>\n";

echo "- Yarim:";
echo "<input type=\"text\" name=\"yarim$ref\" maxlength=\"120\" value=\"\"/><br/>\n";


echo "- Xowuma gelse:";
echo "<input type=\"text\" name=\"xowum$ref\" maxlength=\"120\" value=\"\"/><br/>\n";

echo "&#187; <anchor>Istirakci ol<go href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;ceko=qebul\" method=\"post\">\n";
echo "<postfield name=\"gelen\" value=\"$(gelen$ref)\"/>\n";
echo "<postfield name=\"gelir\" value=\"$(gelir$ref)\"/>\n";
echo "<postfield name=\"yarim\" value=\"$(yarim$ref)\"/>\n";
echo "<postfield name=\"xowum\" value=\"$(xowum$ref)\"/>\n";
echo "<postfield name=\"qq\" value=\"qq\"/>\n";
echo "</go></anchor><br/><br/>\n";
}
else
{
$gelen = trim(htmlspecialchars(mysql_escape_string($_POST['gelen'])));
$gelir = trim(htmlspecialchars(mysql_escape_string($_POST['gelir'])));
$yarim = trim(htmlspecialchars(mysql_escape_string($_POST['yarim'])));
$xowum = trim(htmlspecialchars(mysql_escape_string($_POST['xowum'])));

$error = "";

if(empty($gelen)) $error .= "Meni beyenib gelen bolmesini Doldurun!<br/>\n";
if(empty($gelir)) $error .= " Ayliq gelirim  bolmesini Doldurun! <br/>\n";
if(empty($yarim)) $error .= " Yarim  bolmesini Doldurun! <br/>\n";
if(empty($xowum)) $error .= " Xowuma gelse  bolmesini Doldurun! <br/>\n";

if(!empty($error))
{

echo "Asaqidaki Sehvleri Duzeldin!";
echo $error;

echo "</p></card></wml>";
exit();
}




$q = mysql_query("SELECT `id` FROM `onun_yarisi` WHERE `kim` = '$id';");

if(mysql_num_rows($q) != 0)
{
echo "Siz Artiq Onun yarisinda istirakcisiziz! Flooda icaze yoxdur!";
echo "</p></card></wml>";
exit();
}


$qebul = mysql_query("INSERT INTO `onun_yarisi` SET `kim` = '".$id."', `info` = '".$gelen."', `pul` = '$gelir', `yarim` = '$yarim',`xowum` = '$xowum';");

if($qebul)
{
mysql_query("UPDATE `users` SET `bal`= ".$bal." - '20'  WHERE `id` = '".$id."';");


echo "Siz Onun Yarisinin Istirakcisi oldunuz balansinizdan 20 bal silindi!<br/>
---
<br/>
Qeyd etdiginiz Melumatlar:<br/>";
echo "<small>Meni beyenib gelen: <b>".$gelen."</b></small><br/>\n";
echo "<small>Ayliq Gelirim: <b>".$gelir."</b></small><br/>\n";
echo "<small>Yarim: <b>".$yarim."</b></small><br/>\n";
echo "<small>Xowuma gelse <b>".$xowum."</b></small><br/>\n";

echo "- <a href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;ceko=users\">Onun Yarisinin Istirakcilari</a><br/>";


}
else
{
echo "Sehv!<br/>\n";
echo mysql_error()."<br/>\n";
}
}
}
break;

case 'users':

echo "<small> <b>Onun Yarisin </b> Istirakcilari!</small><br/><br/>\n";

$q = mysql_query("SELECT `id`, `kim`, `nick` FROM `onun_yarisi` ORDER BY `kim` DESC LIMIT 100;");


$c = 1;

while($user = mysql_fetch_array($q))


{
$kimm = $user['kim'];

$idi = $user['id'];


$r = @mysql_query ("Select user,bal,name from users where id='$kimm';");
$rrr = @mysql_fetch_array ($r);
$nkk = $rrr["user"];
$name = $rrr["name"];





echo "- $c) <a href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;kid=$idi&amp;ceko=info\">$nkk</a> Adim: <u>$name</u><br/>\n";



$c++;
}

echo "---<br/>";
break;

case 'info':



$q = mysql_query("SELECT * FROM `onun_yarisi` WHERE `id` = '".intval($_GET['kid'])."' ;");

if(mysql_num_rows($q) == 0)
{

echo "Sehf Bash verdi! Bu Nick Onun yarisinda yoxdur!<br/>\n";
}
else
{
$user = mysql_fetch_array($q);
$kid = $user['kim'];
$gelir = $user['gelir'];
$pul = $user['pul'];
$yarim = $user['yarim'];
$xowum = $user['xowum'];
$info = $user['info'];



$r = @mysql_query ("Select user,bal,name from users where id='$kid';");
$rrr = @mysql_fetch_array ($r);
$nkk = $rrr["user"];
$name = $rrr["name"];
echo "<u>$name</u> haqqinda qisa melumat<br/>----<br/>";

echo "- <b>Adim:</b> $name<br/>";
echo "- <b>Meni beyenib gelen:</b> $info<br/>";
echo "- <b>Ayliq gelirim:</b> $pul manat<br/>";

echo "- <b>Yarim:</b> $yarim manat<br/>";
echo "- <b>Xowuma gelse:</b> $xowum<br/>";



echo "<a href=\"onun_yarisi.php?ceko=gonder&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;uid=$kid\">".$name." ile Aile heyati qur!</a><br/>---<br/>";


echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$kid&amp;ref=$ref\">".$name."ni Tanimaqcun sohbet et</a><br/>---<br/>";

}
break;

case 'gonder':

///////////////////////////////////////////////


$uid = intval($_GET['uid']);

mysql_query("INSERT INTO `letterss` SET `uid` = '".$uid."' ,`ide` = '".$id."' ;");

$sql = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$uid."'  ;");
$nick = mysql_result($sql, 0);


echo "<small><b>$nick</b>, nikine evlilik devetiniz qebul etse Anketinizde Aile Ailelidir yazacaq!</small><br/>\n";


//////////////////////////////////////////
break;

default:
echo "<img src=\"http://love.urekli.biz/img/toy.gif\" alt=\"\"/><br/>";

echo "<b>Onun Yarisina xo&#351; gelmisiniz</b><br/>";


echo "<a href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;ceko=users\">I&#351;tirakcilara bax</a><br/>";

echo "<a href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;ceko=qebul\">Sende oz yarini tap</a><br/>";
echo "---<br/>";

break;
}

echo $fsize2;


echo "<a href=\"onun_yarisi.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onun Yarisi</a><br/>";


echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";



echo "</p></card></wml>";

$alltraf=$row["alltraf"];
$pagesize=round((ob_get_length())/1024,1);
$alltraf=$alltraf+$pagesize;
mysql_query ("Update users set alltraf='".$alltraf."', lasttraf='".$pagesize."' where id='".$id."'");
mysql_close ($link);
ob_end_flush();

?>
