<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

$tm = time()+300;
mysql_query ("Update users set  time='".$tm."', room='82' where id ='".$id."'");

$xetanick_sql = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".time()."' and `inv` != '3' AND `room` = 82;");
$lotereya_cemi = mysql_result($xetanick_sql, 0);

$us = $row['user'];
$ubablo = $row['bal'];
$sex=$row["sex"];
$time = date ("H:i");

if($row["sex"] == 0){
$cins = " bey !";
}else{
$cins = " xan&#305;m !";
}

ob_start();
$_v->title('Lotoreya '.Oyunu,'left');
$_v->fsize1($fsize1);

switch($xetanick){
default:
$time = date("H:i");
echo "<b>Lotereya !</b><br/>----<br/>";
echo "Xo&#351; gelmisiniz, <b>".$us."</b>, $cins<br/>\n";
echo $divide;
echo "Hesab&#305;n&#305;zdak&#305; Bal: <b>".$ubablo."</b> !<br/>\n";
echo $divide;
echo "Qaydalar beledir siz 10 reqem yaz&#305;rs&#305;n&#305;z yazd&#305;&#287;&#305;n&#305;z reqemler lotereyan&#305;n nomreleri ile uy&#287;un gelerse hediyye qazanacaqs&#305;n&#305;z ! Reqemler ne qeder &#231;ox uy&#287;un gelerse bir o qeder hediyye say&#305; art&#305;r !<br/>\n";
echo $divide;
echo "Meble&#287;: En Azi 5 Bal Olmalidir ! Siz Buradan Uygun Reqemleri Taparaq Mes: 7 Uygun Reqem 5*7=35 Bal Qazanacaqsiniz<br/>\n";
echo $divide;

echo "<a href=\"lotereya.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;xetanick=start&amp;stavka=5\">Oyna</a><br/>\n";

echo $divide;
echo "Online: <b>$lotereya_cemi</b> nefer<br/>\n";
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
break;

case "start":
$_v->action( "lotereya.php?go=itog&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;xetanick=itog&amp;stavka=".$stavka."" );

if(!is_numeric($stavka)) echo 'Meble&#287; yaln&#305;z reqemle olmal&#305;d&#305;r !<br/>----<br/>';
if($stavka != 1 and $stavka != 5 and $stavka != 10 and $stavka != 25 and $stavka != 50 and $stavka != 100){
echo "<b>Xeta:</b> Sen indi <b>".$yeraz."</b> - dan ag&#305;ll&#305;san ?<br/>----<br/>";
}else{
if($ubablo < $stavka){
echo "Senin laz&#305;ml&#305; meble&#287;in yoxdur !<br/>----<br/>";
}else{
echo "<b>Lotereya !</b><br/>----<br/>";
echo "<b>$us</b>, $cins 10 reqem yaz 0 - dan 9 qeder reqemler !<br/><br/>";

print $_v->input( "<input type=\"text\" name=\"c1\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c2\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c3\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c4\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c5\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c6\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c7\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c8\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c9\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."";
print $_v->input( "<input type=\"text\" name=\"c10\" title=\"...\" size=\"1\" maxlength=\"1\"/>" )."<br/>";

print $_v->submit("Yerle&#351;dir");

$_v->divide();

}
}
echo "Online: <b>$lotereya_cemi</b> nefer<br/>\n";
echo $divide;
print "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
break;

case "itog":
if(!is_numeric($c1)or
!is_numeric($c2)or
!is_numeric($c3)or
!is_numeric($c4)or
!is_numeric($c5)or
!is_numeric($c6)or
!is_numeric($c7)or
!is_numeric($c8)or
!is_numeric($c9)or
!is_numeric($c10)){
echo "Zehmet olmasa b&#252;t&#252;n b&#246;lmeleri doldurun !<br/>";
echo $divide;
echo "<a href=\"lotereya.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;xetanick=start&amp;stavka=$stavka\">Geri Qayit</a><br/>\n";
echo $divide;
echo "Online: <b>$lotereya_cemi</b> nefer<br/>\n";
echo $divide;
print "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
break;
}
if(!is_numeric($stavka)) echo "Sehv !<br/>----<br/>";
if($stavka != 1 and $stavka != 5 and $stavka != 10 and $stavka != 25 and $stavka != 50 and $stavka != 100)
{
echo "<b>Xeta:</b> Sen indi <b>".$yeraz."</b> - dan ag&#305;ll&#305;san ?<br/>----<br/>";
}else{
if($stavka > $ubablo){
echo "&#199;ox b&#246;y&#252;k meble&#287; bu qeder bal&#305;n&#305;z yoxdur !<br/>";
}else{
$m = rand(1,10);
echo "<b>Lotereya !</b><br/>----<br/>";
echo "Yerle&#351;dirmi&#351;diniz:<br/>";
$r1 = rand(0,9);
$r2 = rand(0,9);
$r3 = rand(0,9);
$r4 = rand(0,9);
$r5 = rand(0,9);
$r6 = rand(0,9);
$r7 = rand(0,9);
$r8 = rand(0,9);
$r9 = rand(0,9);
$r10 = rand(0,9);
$plus = 0;
if($c1 == $r1){$c1 = $r1 = "<b><span style=\"color:red\">".$c1."</span></b>";
$plus++;
}
if($c2 == $r2){$c2 = $r2 = "<b><span style=\"color:red\">".$c2."</span></b>";
$plus++;
}
if($c3 == $r3){$c3 = $r3 = "<b><span style=\"color:red\">".$c3."</span></b>";
$plus++;
}
if($c1 == $r1){$c1 = $r1 = "<b><span style=\"color:red\">".$c4."</span></b>";
$plus++;
}
if($c5 == $r5){$c5 = $r5 = "<b><span style=\"color:red\">".$c5."</span></b>";
$plus++;
}
if($c6 == $r6){$c6 = $r6 = "<b><span style=\"color:red\">".$c6."</span></b>";
$plus++;
}
if($c7 == $r7){$c7 = $r7 = "<b><span style=\"color:red\">".$c7."</span></b>";
$plus++;
}
if($c8 == $r8){$c8 = $r8 = "<b><span style=\"color:red\">".$c8."</span></b>";
$plus++;
}
if($c9 == $r9){$c9 = $r9 = "<b><span style=\"color:red\">".$c9."</span></b>";
$plus++;
}
if($c10 == $r10){$c10 = $r10 = "<b><span style=\"color:red\">".$c10."</span></b>";
$plus++;
}
echo $c1." ".$c2." ".$c3." ".$c4." ".$c5." ".$c6." ".$c7." ".$c8." ".$c9." ".$c10."<br/>";
echo "Lotereya reqemleri:<br/>";
echo $r1." ".$r2." ".$r3." ".$r4." ".$r5." ".$r6." ".$r7." ".$r8." ".$r9." ".$r10."<br/>";
echo $divide;
echo "Uy&#287;unluq: <b><span style=\"color:red\">".$plus."</span></b> !<br/>";
echo $divide;
if ($plus > 0) {
echo "Siz qalib geldiniz !<br/>";
$stavka = (intval($stavka)*$plus);
mysql_query("Update users set bal=bal+'".$stavka."' where id ='".$id."'");
$nubablo = $ubablo + $stavka;
echo $divide;
echo "Baliniz: <b>".$nubablo."</b> !<br/>";
}else{
echo "Siz me&#287;lub oldunuz !<br/>";
echo $divide;
$stavka = (intval($stavka)*2);
mysql_query("Update users set bal=bal-'".$stavka."' where id ='".$id."'");
$nubablo = $ubablo - $stavka;
echo "Baliniz: <b>".$nubablo."</b> !<br/>";
}
echo $divide;
echo "<a href=\"lotereya.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;xetanick=start&amp;stavka=5\">Yeniden Oyna</a><br/>";
echo $divide;
}
}
echo "Online: <b>$lotereya_cemi</b> nefer<br/>\n";
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
break;
}
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>