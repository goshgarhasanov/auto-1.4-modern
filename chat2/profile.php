<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if(!isset($err)) $err="";

if(!isset($go)){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"profile\" title=\"Anketin\">\n";
echo "<p align=\"left\">";
echo $fsize1;
echo "<b>$row[user]</b>, Sizin Melumatlar.<br/>\n";
echo $divide;
echo "Parol:<br/>\n";
echo $fsize2;
echo "<input type=\"password\" name=\"pass\" maxlength=\"20\" value=\"".base64_decode($row[pass])."\" title=\"&#350;ifreniz\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "Real Ad&#305;n&#305;z:<br/>\n";
echo $fsize2;
echo "<input name=\"name\" maxlength=\"15\" value=\"$row[name]\" title=\"Real Ad&#305;n&#305;z\" emptyok=\"false\"/><br/>\n";
if($row["sex"] === "0"){
echo $fsize1;
echo "<b>Cinsiniz</b>:<br/>\n";
echo $fsize2;
echo "<select name=\"sex\">\n";
echo "<option value=\"0\">Ki&#351;i</option>\n";
echo "<option value=\"1\">Xan&#305;m</option>\n";
echo "</select><br/>\n";
} else {
echo $fsize1;
echo "<b>Cinsiniz</b>:<br/>\n";
echo $fsize2;
echo "<select name=\"sex\">\n";
echo "<option value=\"1\">Xan&#305;m</option>\n";
echo "<option value=\"0\">Ki&#351;i</option>\n";
echo "</select><br/>\n";
}
@list( $day, $month, $year ) = split( '-', $row["birth"] );
echo $fsize1;
echo "Do&#287;um Tarixi:<br/>\n";
echo $fsize2;

echo "<input size=\"2\" name=\"day\" value=\"$day\" maxlength=\"2\" format=\"*N\"/><small>-</small><input size=\"2\" name=\"month\" value=\"$month\" maxlength=\"2\" format=\"*N\"/><small>-</small><input size=\"4\" name=\"year\" value=\"$year\"  maxlength=\"4\" format=\"*N\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "&#350;eher:<br/>\n";
echo $fsize2;
echo "<input name=\"city\" maxlength=\"100\" value=\"$row[city]\" title=\"Ya&#351;ad&#305;&#287;&#305;n&#305;z yer\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "N&#246;mre:<br/>\n";
echo $fsize2;
echo "<input name=\"nom\" maxlength=\"15\" value=\"$row[nomre]\" title=\"N&#246;mre\" format=\"*N\"/><br/>\n";

echo $fsize1;
echo "&#214;z&#252;n&#252;z haqq&#305;nda:<br/>\n";
echo $fsize2;
echo "<input name=\"infa\" maxlength=\"220\" value=\"$row[infa]\" title=\"&#214;z&#252;n&#252;z haqq&#305;nda\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "Mektublara cavab:<br/>\n";
echo $fsize2;
echo "<input name=\"avtootvet\" maxlength=\"250\" value=\"$row[avtootvet]\" title=\"Mektublara cavab\" emptyok=\"true\"/><br/>\n";
echo $fsize1;
echo "&#199;atda Meqsed:<br/>\n";
echo $fsize2;



if($row["meqsed"] === "0"){
echo "<select name=\"meqsed\">\n";
echo "<option value=\"0\">Dost Tapmaq</option>\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"3\">Hems&#246;hbet olmaq</option>\n";
echo "</select><br/>\n";
}elseif($row["meqsed"] === "1"){
echo "<select name=\"meqsed\">\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"0\">Dost Tapmaq</option>\n";
echo "<option value=\"3\">Hems&#246;hbet olmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "</select><br/>\n";
}elseif($row["meqsed"] === "2"){
echo "<select name=\"meqsed\">\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"3\">Hems&#246;hbet olmaq</option>\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"0\">Dost Tapmaq</option>\n";
echo "</select><br/>\n";
}else{
echo "<select name=\"meqsed\">\n";
echo "<option value=\"3\">Hems&#246;hbet olmaq</option>\n";
echo "<option value=\"2\">Virtual Dostluq</option>\n";
echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
echo "<option value=\"0\">Dost Tapmaq</option>\n";
echo "</select><br/>\n";
}
echo $fsize1;
echo $divide;
echo $fsize2;
echo $fsize1;
echo "<anchor title=\"go\">Melumat&#305; yenile<go href=\"profile.php?id=$id&amp;ps=$ps&amp;go=rew&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"pass\" value=\"$(pass)\"/>\n";
echo "<postfield name=\"name\" value=\"$(name)\"/>\n";
echo "<postfield name=\"sex\" value=\"$(sex)\"/>\n";
echo "<postfield name=\"day\" value=\"$(day)\"/>\n";
echo "<postfield name=\"month\" value=\"$(month)\"/>\n";
echo "<postfield name=\"year\" value=\"$(year)\"/>\n";
echo "<postfield name=\"city\" value=\"$(city)\"/>\n";
echo "<postfield name=\"nomr\" value=\"$(nom)\"/>\n";
echo "<postfield name=\"infa\" value=\"$(infa)\"/>\n";
echo "<postfield name=\"avtootvet\" value=\"$(avtootvet)\"/>\n";
echo "<postfield name=\"meqsed\" value=\"$(meqsed)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
echo $fsize1;
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
exit;
}

$error = true;

$emp2 = "Melumat Formati Duzgun Deyil.!";
$emp = "Butun Bolmeler(esasen *(ulduz olan bolmeler) tamamlanmayib!";
$wrongdate = "Dogum Tarixi Duzgun Yazilmayib.Bu Reala Uygun Olmalidir =)";
$god=date("Y")-10;

if ($pass == "") {$msg = "Siz Parol yazmamisiniz";}
elseif(!preg_match("!^[a-z0-9]+$!i",$pass)) {$msg = "Parolda Icaze Verilmeyen Simvollar Var!";}
elseif ($name == "") {$msg = "Adiniz yazilmayib";}
elseif ($day == "") {$msg = "".$emp."";}
elseif ($month == "") {$msg = "".$emp."";}
elseif ((strlen($day) !== 2)||($day>31)){$msg = "Siz anadan oldugunuz gunu(day) yazmamisiniz!!!";}
elseif ((strlen($month) !== 2)||($month>12)){$msg = "Siz anadan oldugunuz ayi(month) yazmamisiniz!!!";}
elseif ((strlen($year) !== 4)||($year>=$god)||($year<1970)){$msg = "Siz anadan oldugunuz ili(year) yazmamisiniz!!!";}
elseif ($year == "") {$msg = "".$emp."";}
elseif ($city == "") {$msg = "".$emp."";}
elseif ($infa == "") {$msg = "Ozunuz Haqda Qisa Melumat yazin!!!";}
else {
$pass = check($pass);
$day = check($day);
$month = check($month);
$year = check($year);
$city = check($city);

$nomr = check($nomr);

$infa = check($infa);
$avtootvet = check($avtootvet);
$infa=substr($infa,0,400);
$avtootvet=substr($avtootvet,0,1000);
if(!preg_match("!^[0-9]+$!i",$day)){$error = $emp2;}
elseif(!preg_match("!^[0-9]+$!i",$month)){$error = $emp2;}
elseif(!preg_match("!^[0-9]+$!i",$year)){$error = $emp2;}
if (mysql_query ("Update users set pass='".base64_encode($pass)."', name='".$name."', nomre='".$nomr."', sex='".$sex."', birth='".$day."-".$month."-".$year."', city='".$city."', infa='".$infa."', avtootvet='".$avtootvet."', meqsed='".$meqsed."' where id ='".$id."'")) {
$msg = "&#350;exsi Anketin yenilendi.";
$error = False;
} else {
$msg = "database error...";
}
mysql_close($link);
}
if ($error) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"error\" title=\"Sehv\">\n";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>$msg</b><br/>----<br/>\n";
echo "<a href=\"profile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

echo $fsize2;
echo "</p></card></wml>\n";
} else {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"ok\" title=\"OK\">\n";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>$msg</b><br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize</a><br/>\n";

echo $fsize2;
echo "</p></card></wml>\n";
}
?>
