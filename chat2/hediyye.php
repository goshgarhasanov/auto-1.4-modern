<?php
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8"); 
require("ay.php");
$link = connect_db(); 
list($row, $id, $ps) = check_login($link); 

$ref=rand(10000,1000000); 

$bol = $_GET["bol"]; 
$c = $_GET["c"]; 

if (empty($nk)) { 
$unvan = ""; 
} else { 
$unvan = "nk=$nk&amp;"; 
$select = @mysql_query ("Select * from `users` where `id`='".$nk."' and `banned`!='2';");
$inf = mysql_fetch_array ($select); 
$nick = $inf["user"]; 
} 

mysql_query("DELETE FROM `hediyye_box` WHERE vaxt < '".time()."';"); 

switch($bol){ 
default: 

echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Hediyye G&#246;nder\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small\n>"; 
echo "<b>Hediyye G&#246;nder</b><br/>*****<br/>\n"; 
echo "Siz istediyiniz istifade&#231;iye a&#351;a&#287;&#305;da olan hediyyeleri g&#246;ndere bilersiniz<br/>\n"; 
echo $divide;

echo "</small></p><p align=\"left\"><small>\n"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=2&amp;x=sade&amp;$unvan$ref\">Sade hediyyeler</a><br/>\n"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=2&amp;x=maraqli&amp;$unvan$ref\">Maraql&#305; hediyyeler</a><br/>\n"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=2&amp;x=xususi&amp;$unvan$ref\">X&#252;susi hediyyeler</a><br/>\n"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=2&amp;x=bahali&amp;$unvan$ref\">Bahal&#305; hediyyeler</a><br/>*****<br/>\n"; 
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;$ref\">Bal Xidmetleri</a><br/>\n"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n"; 
echo "</small>"; 
echo "</p></card></wml>\n"; 
break; 

case "send": 
$action = $_GET["action"]; 
$h = $_POST["h"]; 
$nick = mysql_escape_string(HtmlSpecialChars($_POST["nick"])); 
$latuser = strtolower($nick); 
$ts = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE latuser='".$latuser."';")); 

if(mysql_affected_rows() == 0){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Hediyye | Xeyta..\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>&#304;stifade&#231;i tap&#305;lmad&#305; $nick</small>\n"; 
echo "</p></card></wml>\n"; 
exit(); 
} 
$hediyye = mysql_escape_string(HtmlSpecialChars($_POST["h"])); 
$text = mysql_escape_string(HtmlSpecialChars($_POST["soz"])); 
$vaxt = mysql_escape_string(HtmlSpecialChars($_POST["vaxt"])); 
if(($vaxt!=1)&&($vaxt!=3)&&($vaxt!=7)&&($vaxt!=15)&&($vaxt!=30)){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"error\" title=\"Xeta..\" ontimer=\"hediyye.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"15\"/>\n"; 
echo "<p align=\"center\">\n"; 
echo "<small><u>Saat sehv se&#231;ilib</u></small><br/>"; 
echo "</p></card></wml>\n"; 
exit(); 
} 

if ($vaxt == 1) { 
$m = 86400; 
} else if ($vaxt == 3) { 
$m = 86400*3; 
} else if ($vaxt == 7) { 
$m = 7*86400; 
} else if ($vaxt == 15){ 
$m = 15*86400; 
}else if ($vaxt == "30"){ 
$m = 30*86400; 
} 

$tm = $m; 
$tmm = $tm + time(); 

 ////Sade Hediyyeler 

 if($x == "sade"){ 
 if($vaxt==1){ 
 $cix = 7; 
 $zaman = $tm + time(); 
 }elseif($vaxt==3) 
 { 
 $cix = 13; 
 $zaman = time()+$m; 
 }elseif($vaxt==7) 
 { 
 $cix = 20; 
 $zaman = time()+$m; 
 }elseif($vaxt==15) 
 { 
 $cix = 30; 
 $zaman = time()+$m; 
 }elseif($vaxt=="30") 
 { 
 $cix = 50; 
 $zaman = time()+$m; 
 } 
 } 
 //// Maraqli Hediyyeler 

if($x == "maraqli"){ 
 if($vaxt==1){ 
 $cix = 10; 
 $xt = 86400; 
 $zaman = time()+86400; 
 }elseif($vaxt==3) 
 { 
 $cix = 17; 
 $zaman = time()+86400*3; 
 }elseif($vaxt==7) 
 { 
 $cix =25; 
 $zaman = time()+86400*7; 
 }elseif($vaxt==15) 
 { 
 $cix = 40; 
 $zaman = time()+86400*15; 
 }elseif($vaxt=="30") 
 { 
 $cix = 70; 
 $zaman = time()+86400*30; 
 } 
 } 
 // Xususi Hediyyeler 
if($x == "xususi"){ 
 if($vaxt==1){ 
 $cix = 15; 
 $zaman = time()+86400; 
 }elseif($vaxt==3) 
 { 
 $cix = 25; 
 $zaman = time()+86400*3; 
 }elseif($vaxt==7) 
 { 
 $cix =40; 
 $zaman = time()+86400*7; 
 }elseif($vaxt==15) 
 { 
 $cix = 70; 
 $zaman = time()+86400*15; 
 }elseif($vaxt=="30") 
 { 
 $cix = 100; 
 $zaman = time()+86400*30; 
 } 
 } 
 /// Bahali Hediyyeler 
if($x == "bahali"){ 
 if($vaxt==1) 
 { 
 $cix = 40; 
 $zaman = time()+86400; 
 }else if($vaxt==7) 
 { 
 $cix =100; 
 $zaman = time()+86400*7; 
 }else if($vaxt=="30") 
 { 
 $cix = 300; 
 $zaman = time()+86400*30; 
 } 
 } 

$bal = $row["bal"]; 
$cixilan = $bal-$cix; 
if(intval($row['bal'])<$cix){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Bal&#305;n&#305;z Azd&#305;r..\">\n"; 
echo "<p align=\"left\">\n"; 
echo "<small>Hesab&#305;n&#305;zda kifayet qeder bal yoxdur<br/>Sizin <b>$bal.</b> bal&#305;n&#305;z var<br/>****<br/>\n"; 
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>"; 
echo "</small></p></card></wml>\n"; 
exit(); 
} 

$nk = $ts["id"]; 
$sql = mysql_query("SELECT `id` FROM `hediyye` WHERE `body` = '".$text."';"); 
$text = str_replace("W","&#350;",$text); 
$text = str_replace("w","&#351;",$text); 
$text = str_replace("Sh","&#350;",$text); 
$text = str_replace("sh","&#351;",$text); 
$text = str_replace("Ch","&#199;",$text); 
$text = str_replace("ch","&#231;",$text); 
$text = str_replace("gh","&#287;",$text); 

$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$id."';"); 
$nickname = mysql_result($q, 0); 
//if ($id!=$id1) 
$contur=$bal-$cix; 
//else $contur=$bal; 
$nk = $ts["id"]; 
$tarix = date("d-m-Y"); 
$sql = mysql_query("INSERT INTO `hediyye_box` SET `kim` = '".$nickname."', tarix='".$tarix."', `hediyye`='".$hediyye."', `vaxt` = '".$tmm."', `text` = '".$text."', time='".time()."', `uid` = '".$nk."', `mid` = ".$id.";")&&mysql_query ("Update users set bal='".$contur."' where id ='".$id."'");

$rnd = rand(0,99999999); 
$today=date ("H:i"); 
$time = time(); 

$inf = mysql_fetch_array(mysql_query("SELECT `user` FROM users WHERE `id`='".$nk."';")); 
$usnick = $inf["user"]; 

$hediyye = mysql_fetch_array(mysql_query("SELECT adi FROM st_hediyye WHERE sira='".intval($h)."';")); 
$name_hediyye = $hediyye["adi"]; 

for ($num = 0; $num <= 10; $num++){ 
$room = "room".$num; 
$txt = "<u>$nickname</u> - <b>$usnick</b>, &#252;&#231;&#252;n <img src=\"hediyye/".$h.".gif\" alt=\"$name_hediyye\"/> <b>\"$name_hediyye\"</b> hediyyesini ba&#287;&#305;&#351;lad&#305;"; 
$metn = "H&#246;rmetli <b>$usnick</b>. <u>$nickname</u>, Sizin &#252;&#231;&#252;n <img src=\"hediyye/".$h.".gif\" alt=\"$name_hediyye\"/> <b>\"$name_hediyye\"</b> hediyyesini ba&#287;&#305;&#351;lad&#305;"; 

mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='Xeberci', message='".$txt."', id='".$time."', towhom='', hid='0', usid='7'"); 
@mysql_query("INSERT INTO `zapiski` SET `klu4`='".$rnd."',`idtowhom`='".$nk."',`towhom`='".$usnick."',`idwho`='7',`time` = '".$time."',`who`='Xeberci',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Yeni Hediyye',`message` = '$metn';"); 
} 

$hed_time = time()+43200; 

$files = fopen("file/dat_folder/hediyye_i.dat", "w"); 
$xfil .= "$nickname\n"; 
$xfil .= "$usnick\n"; 
$xfil .= "$h.gif\n"; 
$xfil .= "$hed_time"; 
fwrite($files, $xfil); 
fclose($files); 

if($sql) 
{ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Hediyye G&#246;nder\">\n"; 
echo "<p align=\"left\"><small>\n"; 
echo "Hediyyeniz g&#246;nderildi!, Te&#351;ekk&#252;r edirik!<br/>\n";
echo "Hesab&#305;n&#305;zdan <u>".$cix."</u>, bal &#231;&#305;x&#305;laraq <b>".$contur."</b>, qald&#305;\n";
echo "<br/>\n";
echo $divide;

echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
echo $divide;
 
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;$ref\">Bal Xidmetleri</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>"; 
echo "</small>"; 
echo "</p></card></wml>"; 
mysql_close ($link); 
exit;} 
else 
{ 
echo $fsize1; 
echo "Bazada Problem var 30 saniyyeden sonra tekrar yoxlay&#305;n!<br/>\n"; 
echo mysql_error()."<br/>\n"; 
echo $fsize2; 
} 

exit(); 


break; 

case "who": 
$cid = intval($_GET["cid"]); 
$q = mysql_query("SELECT * FROM `hediyye_box` WHERE `acar`='".intval($_GET[cid])."';"); 
if(mysql_affected_rows()==0){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"xeta\" title=\"Xeta\">\n"; 
echo "<p align=\"left\"><small>\n"; 
echo "Hediyye tapilmadi. Teqin vaxti bitib<br/>\n"; 
echo "<anchor><prev/>Geri Qay&#305;t</anchor><br/>\n"; 
echo "</small></p></card></wml>"; 
exit(); 
} 

$qq = mysql_fetch_array($q); 
$who = $qq["kim"]; 
$whoid = $qq["mid"]; 
$text = $qq["text"]; 
$usid = $qq["uid"]; 
$tarix = $qq["tarix"]; 
$hediyye = $qq["hediyye"]; 
$hediyye = $qq["hediyye"]; 
$nkk = $qq["mid"]; 
$kime = mysql_fetch_array(mysql_query("SELECT * FROM users where id='".$qq[uid]."';")); 
$ad = mysql_fetch_array(mysql_query("SELECT * FROM st_hediyye WHERE sira='".$hediyye."';")); 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"hediyye\" title=\"$kime[user]-Hediyye Qutusu\">\n"; 
echo "<p align=\"center\"><small>\n"; 
echo "<b>$kime[user],</b> &#252;&#231;&#252;n hediyye<br/>*****<br/>\n"; 
echo "<img src=\"hediyye/$hediyye.gif\" alt=\"$hediyye\"/><br/>*****<br/>\n"; 
echo "<b>\"$ad[adi]\"</b><br/>$divide</small></p>\n"; 
echo "<p align=\"left\"><small>\n"; 
echo "<b>&#220;rek s&#246;z&#252;:</b> <i>$text</i><br/>\n"; 
echo $divide;

echo "<u>Tarix: $tarix</u><br/>"; 
echo "Hediyyeni g&#246;nderen: <a href=\"info.php?id=$id&amp;nk=$nkk&amp;ps=$ps&amp;$ref\">$who</a><br/>\n";
echo $divide;
 
if($id==$usid)echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=del&amp;cid=$cid&amp;$ref\">[x]</a><br/>"; 
echo $divide;


echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;$ref\">Geri Qay&#305;t</a><br/>\n"; 
echo $divide;

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a>\n"; 
echo "</small></p></card></wml>"; 
break; 

case "del": 
$del = mysql_fetch_array(mysql_query("SELECT * FROM `hediyye_box` WHERE `acar`='".intval($_GET['cid'])."';")); 
$uid = $del["uid"]; 
if($row['id']!=$uid){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"xeta\" title=\"Xeta\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>"; 
echo "Size bele Hediyye G&#246;nderilmiyib<br/>*****<br/>"; 
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>"; 
echo "</small>"; 
echo "</p></card></wml>"; 
exit(); 
} 
if(mysql_affected_rows()==0){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"xeta\" title=\"Xeta\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>"; 
echo "Hediyye Tap&#305;lmad&#305;<br/>*****<br/>"; 
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>"; 
echo "</small>"; 
echo "</p></card></wml>"; 
exit(); 
} 

$x = mysql_query("DELETE FROM `hediyye_box` WHERE acar='".intval($_GET['cid'])."';"); 
if($x){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"ok\" title=\"Hediyye Silindi\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>"; 
echo "Hediyye silindi<br/>*****<br/>"; 
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>"; 
echo "</small>"; 
echo "</p></card></wml>"; 
} else { 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"xeta\" title=\"Xeta\">\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>"; 
echo "Baza ile elaqe kesildi<br/>*****<br/>"; 
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>"; 
echo "</small>"; 
echo "</p></card></wml>"; 
exit(); 
} 

break; 

case "2": 
$h = intval($_GET["h"]); 
$bol = $_GET["bol"]; 

if($h!=0){ 
$h = mysql_query("SELECT * FROM `st_hediyye` WHERE nov='".$x."' AND sira='".intval($h)."';;"); 
if(mysql_affected_rows() == 0){ 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Xeta..\" ontimer=\"hediyye.php?id=$id&amp;ps=$ps&amp;$unvanref=$ref\"><timer value=\"15\"/>\n"; 
echo "<p align=\"center\">\n"; 
echo "<small>Hediyye tap&#305;lmad&#305;</small>\n"; 
echo "</p></card></wml>\n"; 
exit(); 
} 
$inf = mysql_fetch_array($h); 
$ad = $inf["adi"]; 
$nomre = $inf["sira"]; 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Hediyye\">\n"; 
echo "<p align=\"left\">\n"; 
$h = intval($_GET["h"]); 
echo "<small><u>Se&#231;diyiniz hediyye</u><br/>\n"; 
echo "<img src=\"hediyye/$nomre.gif\" alt=\"$ad\"/><br/>\n"; 
echo "<b>$ad</b><br/>*****<br/>\n"; 
echo "M&#252;ddet: "; 
echo "<select name=\"vaxt\">\n"; 

if($x == "sade"){ 
echo "<option value=\"1\">1 g&#252;n - 7 bal</option>\n"; 
echo "<option value=\"3\">3 g&#252;n - 13 bal</option>\n"; 
echo "<option value=\"7\">7 g&#252;n - 20 bal</option>\n"; 
echo "<option value=\"15\">15 g&#252;n - 30 bal</option>\n"; 
echo "<option value=\"30\">30 g&#252;n - 50 bal</option>\n"; 
} 

if($x == "maraqli"){ 
echo "<option value=\"1\">1 g&#252;n - 10 bal</option>\n"; 
echo "<option value=\"3\">3 g&#252;n - 17 bal</option>\n"; 
echo "<option value=\"7\">7 g&#252;n - 25 bal</option>\n"; 
echo "<option value=\"15\">15 g&#252;n - 40 bal</option>\n"; 
echo "<option value=\"30\">30 g&#252;n - 70 bal</option>\n"; 
} 

if($x == "xususi"){ 
echo "<option value=\"1\">1 g&#252;n - 15 bal</option>\n"; 
echo "<option value=\"3\">3 g&#252;n - 25 bal</option>\n"; 
echo "<option value=\"7\">7 g&#252;n - 45 bal</option>\n"; 
echo "<option value=\"15\">15 g&#252;n - 70 bal</option>\n"; 
echo "<option value=\"30\">30 g&#252;n - 100 bal</option>\n"; 
} 

if($x == "bahali"){ 
echo "<option value=\"1\">1 g&#252;n - 40 bal</option>\n"; 
echo "<option value=\"7\">7 g&#252;n - 100 bal</option>\n"; 
echo "<option value=\"30\">30 g&#252;n - 300 bal</option>\n"; 
} 

$select = @mysql_query ("Select * from users where id='".$nk."' and banned != '2'");
$inf = mysql_fetch_array ($select);

$nick = $inf["user"];

echo "</select><br/>\n"; 
echo $divide;
echo "Leqeb:<br/>"; 
echo "</small>\n"; 
echo "<input name=\"nick\" value=\"$nick\" maxlength=\"25\" type=\"text\"/><br/>\n"; 
echo "<small>&#220;rek s&#246;z&#252;n&#252;z:</small><br/>\n"; 
echo "<input name=\"soz\" maxlength=\"300\" type=\"text\"/><br/>\n"; 
echo "<small><anchor>[G&#246;nder]<go href=\"hediyye.php?id=$id&amp;ps=$ps&amp;c=$nomre&amp;bol=send&amp;x=$x&amp;$ref\" method=\"post\">\n"; 
echo "<postfield name=\"nick\" value=\"$(nick)\"/>"; 
echo "<postfield name=\"vaxt\" value=\"$(vaxt)\"/>"; 
echo "<postfield name=\"soz\" value=\"$(soz)\"/>"; 
echo "<postfield name=\"h\" value=\"$nomre\"/>"; 
echo "<postfield name=\"action\" value=\"gonder\"/>"; 
echo "</go></anchor><br/>\n"; 
echo "*****<br/>"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;x=$x&amp;$unvan$ref\">Geri Qay&#305;t</a><br/>"; 
echo $divide;
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;$ref\">Bal Xidmetleri</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a></small><br/>"; 
echo "</p></card></wml>\n"; 
exit(); 
} 
$bol = mysql_escape_string(HtmlSpecialChars($_GET["bol"])); 
$x = mysql_escape_string(HtmlSpecialChars($_GET["x"])); 

$nums = mysql_query("SELECT * FROM `st_hediyye` WHERE `nov`='".$x."';"); 
$num = mysql_num_rows($nums); 
if(!isset($s))$s=0; 
$mx=round(($num/4)+0.45); 
if($s>$mx)$s=$mx; 
if($s==0)$s=1; 
$ot=(($s-1)*4)+1; 
$do=$s*4; 
if($do>$num)$do=$num; 
$o=$ot-1; 
$n=$ot; 
if($do==0)$n=$o; 
$qeder = round($num/4); 

$r = mysql_query ("SELECT * FROM `st_hediyye` WHERE `nov`='".$x."' ORDER by `sira` limit $o,$do;"); 
$q = mysql_query("SELECT * FROM `st_hediyye` WHERE `nov`='".$x."';"); 

echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<card id=\"enter\" title=\"Hediyye G&#246;nder\">\n"; 
echo "<p align=\"left\">\n"; 
echo "<small>"; 
if($x=="sade")echo "<b>Sade Hediyyeler</b><br/>****<br/>"; 
if($x=="bahali")echo "<b>Bahal&#305; Hediyyeler</b><br/>****<br/>"; 
if($x=="xususi")echo "<b>X&#252;susi Hediyyeler</b><br/>****<br/>"; 
if($x=="maraqli")echo "<b>Maraql&#305; Hediyyeler</b><br/>****<br/>"; 
echo "Beyendiyiniz hediyyeni se&#231;mek &#252;&#231;&#252;n g&#246;y rengde olan hediyyenin ad&#305;n&#305;n&#305;n &#252;st&#252;nde t&#305;klay&#305;n<br/>\n"; 
echo $divide;
echo "Sehife: $s/$qeder<br/>\n"; 
echo $divide;

for ($i=$ot;$i<=$do;$i++){ 
$qb = mysql_fetch_array($r); 
$ad = $qb["adi"]; 
$sira = $qb["sira"]; 
echo "<img src=\"hediyye/$sira.gif\" alt=\"$ad\"/><br/>"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=$bol&amp;x=$x&amp;h=$sira&amp;$unvan$ref\">$ad</a><br/>"; 
} 


echo $divide;

$next=$s+1;
$prev=$s-1;



if ($num>$do) {
$ot=(($next-1)*4)+1;
$do=$next*4;
if($do>$num)$do=$num;
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;x=$x&amp;bol=$bol&amp;nk=$nk&amp;s=$next&amp;$unvanref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n"; 
}

if($s>1) {
$ot=(($prev-1)*4)+1;
$do=$prev*4;
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;x=$x&amp;bol=$bol&amp;nk=$nk&amp;s=$prev&amp;$unvanref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n"; 

}
echo $divide;
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;$unvan$ref\">&#220;mumi Hediyyeler</a><br/>"; 
echo $divide;
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;$ref\">Bal Xidmetleri</a><br/>"; 
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>"; 

echo "</small>"; 
echo "</p></card></wml>\n"; 
break; 

} 

mysql_close ($link); 
?>
