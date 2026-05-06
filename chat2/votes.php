<?

header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$ses = "id=$id&amp;ps=$ps";
if ($ver=="") $ses = "id=$id&amp;ps=$ps";

//echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"cabinet\" title=\"$site\">";
echo "<p align=\"center\">";
 
$level=$row["level"];
$avtor=$row["user"];
$usid=$row["id"];  
$date=date("j.m.Y");
$tm = time();

echo '<small><b><u>Sor&#287;u</u></b></small><br/><br/>';
echo "</p><p align=\"left\">";
echo "<small>";

switch($mode) {

default:
$a = @mysql_query("select id,name,date from votes");

while($arr=mysql_fetch_array($a)){
$name=$arr['name'];
$date=$arr['date'];
$bid=$arr['id'];
$votes = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$bid."'"));
echo "<a href=\"votes.php?mode=view&amp;$ses&amp;mid=$bid&amp;$ref\">".$name."</a> (Cavablar: <b>".$votes[0]."</b>)";
if ($level>7) echo " [<a href=\"votes.php?mode=del&amp;$ses&amp;mid=$bid&amp;$ref\">Sil</a>] [<a href=\"votes.php?mode=edit&amp;$ses&amp;mid=$bid&amp;$ref\">Deyi&#351;</a>]";
echo '<br/>';
 }

if (mysql_affected_rows() == 0){
echo 'Ses verme yaz&#305;lmay&#305;b :)<br/>';
}
if ($level>8) {
echo $divide;
echo "<a href=\"votes.php?mode=add&amp;$ses&amp;ref=$ref\">Elave et</a><br/>\n";
}
break;

case 'view':
$bid=intval($bid);
$q = mysql_query("select * from votes where id='".$mid."'");
if (mysql_affected_rows() == 0){
echo 'Sual yoxdur :(<br/>';
} else {
$arr=mysql_fetch_array($q);
$mid=$arr['id'];
$name=$arr['name'];
$avtor=$arr['avtor'];
$vopros=$arr['vopros'];
$v1=$arr['v1'];
$v2=$arr['v2'];
$v3=$arr['v3'];
$v4=$arr['v4'];
$v5=$arr['v5'];

echo "<b>Sor&#287;u:</b> <u>$vopros</u><br/>";
echo $divide;


$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='1'"));
echo "1)<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=1&amp;$ref\">$v1</a><br/>";
$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='2'"));
echo "2)<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=2&amp;$ref\">$v2</a><br/>";
if ($v3) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='3'"));
echo "3)<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=3&amp;$ref\">$v3</a><br/>";}
if ($v4) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='4'"));
echo "4)<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=4&amp;$ref\">$v4</a><br/>";}
if ($v5) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='5'"));
echo "5)<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=5&amp;$ref\">$v5</a><br/>";}

echo $divide;

echo '<u>Neticeler:</u><br/>';
$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='1'"));
echo "$v1 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=1&amp;$ref\">".$a[0]."</a><br/>";
$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='2'"));
echo "$v2 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=2&amp;$ref\">".$a[0]."</a><br/>";
if ($v3) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='3'"));
echo "$v3 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=3&amp;$ref\">".$a[0]."</a><br/>";}
if ($v4) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='4'"));
echo "$v4 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=4&amp;$ref\">".$a[0]."</a><br/>";}
if ($v5) {$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."' and var='5'"));
echo "$v5 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=5&amp;$ref\">".$a[0]."</a><br/>";}
echo $divide;

$a = mysql_fetch_array(@mysql_query("select count(klu4) as num from voting where vote='".$mid."'"));
echo "H&#246;rmetle: <b>".$avtor."</b><br/>";
echo 'Cemi sesler: <b>'.$a[0].'</b><br/>';
}
break;

case 'add':
if ($level<9) die('Icazeniz yoxdur =)'.$fsize2.'</p></card></wml>');
if (!$name){

echo 'Movzu:<br/>';
echo "<input name=\"name\" maxlength=\"50\" value=\"$row[name]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Sual:<br/>';
echo "<input name=\"vopros\" maxlength=\"100\" value=\"$row[vopros]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Cavab-1:<br/>';
echo "<input name=\"v1\" maxlength=\"50\" value=\"$row[v1]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Cavab-2:<br/>';
echo "<input name=\"v2\" maxlength=\"50\" value=\"$row[v2]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Cavab-3:<br/>';
echo "<input name=\"v3\" maxlength=\"50\" value=\"$row[v3]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Cavab-4:<br/>';
echo "<input name=\"v4\" maxlength=\"50\" value=\"$row[v4]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo 'Cavab-5:<br/>';
echo "<input name=\"v5\" maxlength=\"50\" value=\"$row[v5]\" title=\"infa\" emptyok=\"false\"/><br/>\n";

 
echo "<anchor title=\"go\">Elave et<go href=\"votes.php?mode=add&amp;$ses&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"name\" value=\"$(name)\"/>\n";
echo "<postfield name=\"vopros\" value=\"$(vopros)\"/>\n";
echo "<postfield name=\"v1\" value=\"$(v1)\"/>\n";
echo "<postfield name=\"v2\" value=\"$(v2)\"/>\n";
echo "<postfield name=\"v3\" value=\"$(v3)\"/>\n";
echo "<postfield name=\"v4\" value=\"$(v4)\"/>\n";
echo "<postfield name=\"v5\" value=\"$(v5)\"/>\n";
echo '</go></anchor><br/>';
 

} else {
$name = substr(check($name),0,100);
$vopros = substr(check($vopros),0,200);
$v1 = substr(check($v1),0,100);
$v2 = substr(check($v2),0,100);
$v3 = substr(check($v3),0,100);
$v4 = substr(check($v4),0,100);
$v5 = substr(check($v5),0,100);

if ($row["translit"]==1){
$name = trun_to_rus($name);
$vopros = trun_to_rus($vopros);
$v1 = trun_to_rus($v1);
$v2 = trun_to_rus($v2);
$v3 = trun_to_rus($v3);
$v4 = trun_to_rus($v4);
$v5 = trun_to_rus($v5);
}

if (!$vopros or !$v1 or !$v2) {
 
echo 'Movzu movcud deyil :)<br/>';
 
} else {
mysql_query("Insert into votes set name ='".$name."', avtor ='".$avtor."', date ='".$date."', vopros = '".$vopros."', v1 = '".$v1."', v2 = '".$v2."', v3 = '".$v3."', v4 = '".$v4."', v5 = '".$v5."'");
 
echo 'Sual elave edildi :)<br/>';
 

$adm = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$administration = $z["user"];		
$administration = check($administration);		
$time = time();

$rnd = rand(0,99999999);
$today=date ("H:i");
$time = time();
$txt = "Diqqet: <u>Yeni sual elave edildi ses vermeye</u> :) Menyuda ses vermeye daxil olub sechiminizi edin. ;)";
for ($num = 0; $num <= 22; $num++){  
$room = "room".$num;
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$administration."', message='".$txt."', id='".$time."', towhom='', hid='0', usid='1', komu=''");
}
//

}
}

break;

case 'edit':
if ($level<7) die('<b>*OLmaz*</b>'.$fsize2.'</p></card></wml>');
if (!$name){
$q = mysql_query("select * from votes where id='".$mid."'");
if (mysql_affected_rows() == 0) die('Kateqoriya yoxdur :('.$fsize2.'</p></card></wml>');
$arr=mysql_fetch_array($q);
$vopros=$arr['vopros'];
$name=$arr['name'];
$v1=$arr['v1'];
$v2=$arr['v2'];
$v3=$arr['v3'];
$v4=$arr['v4'];
$v5=$arr['v5'];

echo 'Deyish<br/>';
echo $divide;
echo 'Movzu:<br/>';
echo "</small>";
echo "<input name=\"name\" maxlength=\"50\" value=\"$name\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Metn:<br/>';
echo "</small>";
echo "<input name=\"vopros\" maxlength=\"100\" value=\"$vopros\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Cavab-1:<br/>';
echo "</small>";
echo "<input name=\"v1\" maxlength=\"50\" value=\"$v1\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Cavab-2:<br/>';
echo "</small>";
echo "<input name=\"v2\" maxlength=\"50\" value=\"$v2\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Cavab-3:<br/>';
echo "</small>";
echo "<input name=\"v3\" maxlength=\"50\" value=\"$v3\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Cavab-4:<br/>';
echo "</small>";
echo "<input name=\"v4\" maxlength=\"50\" value=\"$v4\" title=\"infa\" emptyok=\"false\"/><br/>\n";

echo "<small>";
echo 'Cavab-5:<br/>';
echo "</small>";
echo "<input name=\"v5\" maxlength=\"50\" value=\"$v5\" title=\"infa\" emptyok=\"false\"/><br/>\n";
echo "<small>";
echo "<anchor title=\"go\">Deyish<go href=\"votes.php?mode=edit&amp;$ses&amp;mid=$mid&amp;$ref\" method=\"post\">\n";
echo "<postfield name=\"name\" value=\"$(name)\"/>\n";
echo "<postfield name=\"vopros\" value=\"$(vopros)\"/>\n";
echo "<postfield name=\"v1\" value=\"$(v1)\"/>\n";
echo "<postfield name=\"v2\" value=\"$(v2)\"/>\n";
echo "<postfield name=\"v3\" value=\"$(v3)\"/>\n";
echo "<postfield name=\"v4\" value=\"$(v4)\"/>\n";
echo "<postfield name=\"v5\" value=\"$(v5)\"/>\n";
echo '</go></anchor><br/>';

} else {
$name = substr(check($name),0,100);
$vopros = substr(check($vopros),0,200);
$v1 = substr(check($v1),0,100);
$v2 = substr(check($v2),0,100);
$v3 = substr(check($v3),0,100);
$v4 = substr(check($v4),0,100);
$v5 = substr(check($v5),0,100);

if ($row["translit"]==1){
$name = trun_to_rus($name);
$vopros = trun_to_rus($vopros);
$v1 = trun_to_rus($v1);
$v2 = trun_to_rus($v2);
$v3 = trun_to_rus($v3);
$v4 = trun_to_rus($v4);
$v5 = trun_to_rus($v5);
}

if (!$vopros or !$v1 or !$v2) {
echo 'Sual m&#252;vcud deyil.<br/>';
} else {
mysql_query("update votes set name ='".$name."', avtor ='".$avtor."', vopros = '".$vopros."', v1 = '".$v1."', v2 = '".$v2."', v3 = '".$v3."', v4 = '".$v4."', v5 = '".$v5."' where id = '".$mid."'");
echo 'M&#252;vzu deyi&#351;dirildi :)<br/>';
}
}
break;

case 'del':
if ($level<7) die('<b>*Nemate prawo pristupa*</b>'.$fsize2.'</p></card></wml>');
if (!$act){
echo "M&#252;vzu silinsin?<br/>
<a href=\"votes.php?mode=del&amp;$ses&amp;act=go&amp;mid=$mid&amp;$ref\">Beli</a> | <a href=\"votes.php?$ses&amp;ref=$ref\">Xeyr</a><br/>";
} else {
$zapros="delete from votes where id= '".$mid."'";
$zapros2="delete from voting where vote= '".$mid."'";
if (mysql_query($zapros) and mysql_query($zapros2)){
 
echo 'M&#252;vzu silindi :)<br/>';
}else{
echo 'Sehv var<br/>';
}
}
break;

case 'vote':
$v=intval($v);
$date=date("j.m.Y");
if ($v<1 or $v>5) die();
mysql_query ("Select * from voting where vote='".$mid."' and who='".$id."'");
if (mysql_affected_rows() == 0) {
mysql_query("INSERT INTO voting SET vote = '".$mid."', date = '$date', who = '".$id."', var = '".$v."', tarix = '".$tm."'");
echo 'Ses Verdiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler...<br/>';
} else {
echo 'Siz art&#305;q ses vermisiniz<br/>';
}
break;


case 'who':
$select = @mysql_query ("Select * from voting where vote='".$mid."' and var != '".$v."'");

$inf = mysql_fetch_array ($select);
$tarix=$inf["tarix"];

$query = mysql_query("select who,date,tarix from voting where vote = '".$mid."' and var = '".$v."'");
if (mysql_affected_rows() == 0) {
 
echo 'Ses verilmeyib.<br/>';
 } else {

 
echo '<u>Ses Verdiler:</u><br/>';
echo "----<br/>\n";
$i = 1;
while($arr=mysql_fetch_array($query)){
$tarix=$arr["tarix"];
$baza = mysql_fetch_array(@mysql_query ("SELECT id,user from users where id='".$arr[0]."' LIMIT 1;"));
$uid=$baza["id"];
$r = mysql_fetch_array(@mysql_query ("SELECT user from users where id='".$arr[0]."' LIMIT 1;"));
echo ($i++).". <a href=\"info.php?nk=".$uid."&amp;ref=".$ref."&amp;id=".$id."&amp;ps=".$ps."&amp;$ref\"><b>".$r[0]."</b></a>  (".cc_tarix($tarix).") <br/>";
}
}
break;
 }
echo "----<br/>\n";

if($mode) {
echo "<a href=\"votes.php?$ses&amp;ref=$ref\">Ses verme</a><br/>\n";
}
echo "<a href=\"enter.php?$ses&amp;ref=$ref\">Dehliz</a><br/>\n";
echo "</small></p></card></wml>";
mysql_close($link);
?>
