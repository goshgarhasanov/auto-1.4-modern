<?php
require("inc.php"); 
$link = connect_db(); 
list($row, $id, $ps, $fsize1, $fsize2, $p_arr) = check_login($link); 
$ses = "id=$id&amp;ps=$ps"; 


$_v->title($site,'center');
$_v->fsize1($fsize1);

$avtor=$row["user"]; 
$usid=$row["id"];   
$date=date("j.m.Y", $SERVER_TIME); 

echo '<b>Sor&#287;u</b><br/><br/>';

$_v->align('left');

switch($mode) { 

default: 

$a = @mysql_query("select `id`,`name`,`date` from `votes`;");
if (mysql_affected_rows() == 0){
echo 'Ses verme yazilmayib :)<br/>';
}else{
while($arr=mysql_fetch_array($a)){
$name=$arr['name']; 
$date=$arr['date']; 
$bid=$arr['id'];
$votes = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$bid."';")); 
echo "<a href=\"votes.php?mode=view&amp;$ses&amp;mid=$bid&amp;ref=$ref\">$name</a> (Cavablar: <b>$votes[0]</b>)"; 
if ($p_arr['25']=='1') echo " [<a href=\"votes.php?mode=del&amp;$ses&amp;mid=$bid&amp;ref=$ref\">Sil</a>]";
if ($p_arr['24']=='1' and $p_arr['25']=='1') echo ' -';
if ($p_arr['24']=='1') echo " [<a href=\"votes.php?mode=edit&amp;$ses&amp;mid=$bid&amp;ref=$ref\">Deyiş</a>]"; 
echo '<br/>'; 
}
}





if ($p_arr['24']=='1') {
echo "----<br/><a href=\"votes.php?mode=add&amp;$ses&amp;ref=$ref\">Elave et</a><br/>\n"; 

echo "----<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a>\n"; 
}

break;

case 'view': 

$bid=intval($bid); 
$q = mysql_query("SELECT * FROM `votes` WHERE `id`='".(int)$mid."';"); 
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
echo '<i>'; 
echo "<b>Sor&#287;u:</b> $vopros"; 
echo '</i>'; 
  
echo '<br/><u>Ses Ver</u><br/>';  
  
$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='1';")); 
echo "<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=1\">$v1</a><br/>"; 
$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='2';")); 
echo "<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=2\">$v2</a><br/>"; 
if ($v3) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='3';")); 
echo "<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=3\">$v3</a><br/>";} 
if ($v4) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='4';")); 
echo "<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=4\">$v4</a><br/>";} 
if ($v5) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='5';")); 
echo "<a href=\"votes.php?mode=vote&amp;$ses&amp;mid=$mid&amp;v=5\">$v5</a><br/>";} 
  
 echo '<br/><u>Neticeler</u><br/>'; 
$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='1';")); 
echo "$v1 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=1\">$a[0]</a><br/>"; 
$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='2';")); 
echo "$v2 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=2\">$a[0]</a><br/>"; 
if ($v3) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='3';")); 
echo "$v3 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=3\">$a[0]</a><br/>";} 
if ($v4) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='4';")); 
echo "$v4 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=4\">$a[0]</a><br/>";} 
if ($v5) {$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."' AND var='5';")); 
echo "$v5 - <a href=\"votes.php?mode=who&amp;$ses&amp;mid=$mid&amp;v=5\">$a[0]</a><br/>";}  
  
$a = mysql_fetch_array(@mysql_query("SELECT COUNT(`klu4`) AS `num` FROM `voting` WHERE `vote`='".$mid."'")); 
echo "<br/>H&#246;rmetle: <b>$avtor</b><br/>"; 
echo 'Cemi sesler: <b>'.$a[0].'</b><br/>'; 
}

break; 

case 'add': 
if ($p_arr['24']!='1') die('Icazeniz yoxdur =)</p></card></wml>'); 
if (!$name)
{
	$_v->action("votes.php?mode=add&amp;$ses&amp;ref=$ref");

	echo 'Mövzu:<br/>'; 
	print $_v->input("<input name=\"name$ref\" maxlength=\"100\"/>").'<br/>';

	echo 'Sual:<br/>'; 
	print $_v->input("<input name=\"vopros$ref\" maxlength=\"8000\"/>").'<br/>';

	echo 'Cavab-1:<br/>'; 
	print $_v->input("<input name=\"v1$ref\" maxlength=\"50\"/>").'<br/>';

	echo 'Cavab-2:<br/>'; 
	print $_v->input("<input name=\"v2$ref\" maxlength=\"50\"/>").'<br/>';

	echo 'Cavab-3:<br/>'; 
	print $_v->input("<input name=\"v3$ref\" maxlength=\"50\"/>").'<br/>';

	echo 'Cavab-4:<br/>'; 
	print $_v->input("<input name=\"v4$ref\" maxlength=\"50\"/>").'<br/>';

	echo 'Cavab-5:<br/>'; 
	print $_v->input("<input name=\"v5$ref\" maxlength=\"50\"/>").'<br/>';

	print $_v->submit2('Elave et');
}
else
{
	$name = narmobil(substr($name,0,200)); 
	$vopros = narmobil(substr($vopros,0,10000)); 
	$v1 = narmobil(substr($v1,0,100)); 
	$v2 = narmobil(substr($v2,0,100)); 
	$v3 = narmobil(substr($v3,0,100)); 
	$v4 = narmobil(substr($v4,0,100)); 
	$v5 = narmobil(substr($v5,0,100)); 

	if (!$vopros or !$v1 or !$v2) {
		echo 'Mövzu mövcud deyil.<br/>'; 
	}
	else
	{ 
		mysql_query("INSERT INTO `votes` SET `name` ='".$name."', `avtor` ='".$avtor."', `date` ='".$date."', `vopros` = '".$vopros."', `v1` = '".$v1."', `v2` = '".$v2."', `v3` = '".$v3."', `v4` = '".$v4."', `v5` = '".$v5."';"); 
		  
		echo 'Sual elave edildi.<br/>'; 
		  
		$rnd = rand(0,99999999); 
		$today=date ("H:i",$SERVER_TIME); 
		$txt = "Diqqet: <u>Yeni sual elave edildi ses vermeye</u> Menyuda ses vermeye daxil olub seçiminizi edin. ;)"; 
		for ($num = 0; $num <= 9; $num++) {   
			$room = "room".$num; 
			mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$_AUTO['admin']."', message='".$txt."', id='".$SERVER_TIME."', towhom='', hid='0', usid='1'"); 
		}
	}
}
break; 

case 'edit':
if ($p_arr['24']!='1') {
	print 'olmaz'; $_v->fsize2($fsize2); die;
}

if (!$name){ 
$q = mysql_query("select * from votes where id='".intval($mid)."'"); 
if (mysql_affected_rows() == 0) die('Kateqoriya yoxdur :(</p></card></wml>'); 
$arr=mysql_fetch_array($q); 
$vopros=$arr['vopros']; 
$name=$arr['name']; 
$v1=$arr['v1']; 
$v2=$arr['v2']; 
$v3=$arr['v3']; 
$v4=$arr['v4']; 
$v5=$arr['v5']; 

  
echo 'Deyiş<br/>'; 
echo $divide;   
echo 'Mövzu:<br/>'; 

$_v->action("votes.php?mode=edit&amp;$ses&amp;mid=$mid&amp;ref=$ref");
print $_v->input("<input name=\"name\" maxlength=\"100\" value=\"$name\"/>").'<br/>';

echo 'Metn:<br/>';
print $_v->input("<input name=\"vopros\" maxlength=\"8000\" value=\"$vopros\"/>").'<br/>';

echo 'Cavab-1:<br/>';
print $_v->input("<input name=\"v1\" maxlength=\"50\" value=\"$v1\"/>").'<br/>';

echo 'Cavab-2:<br/>';
print $_v->input("<input name=\"v2\" maxlength=\"50\" value=\"$v2\"/>").'<br/>';

echo 'Cavab-3:<br/>';
print $_v->input("<input name=\"v3\" maxlength=\"50\" value=\"$v3\"/>").'<br/>';

echo 'Cavab-4:<br/>';
print $_v->input("<input name=\"v4\" maxlength=\"50\" value=\"$v4\"/>").'<br/>';

echo 'Cavab-5:<br/>';
print $_v->input("<input name=\"v5\" maxlength=\"50\" value=\"$v5\"/>").'<br/>';

print $_v->submit2('Deyiş','action=save');

} else {
$name = narmobil(substr($name,0,200)); 
$vopros = narmobil(substr($vopros,0,10000)); 
$v1 = narmobil(substr($v1,0,100)); 
$v2 = narmobil(substr($v2,0,100)); 
$v3 = narmobil(substr($v3,0,100)); 
$v4 = narmobil(substr($v4,0,100)); 
$v5 = narmobil(substr($v5,0,100)); 



if (!$vopros or !$v1 or !$v2) { 
echo 'Sual mövcud deyil.<br/>'; 
} else { 
mysql_query("UPDATE votes SET `name` ='".$name."', `avtor` ='".$avtor."', `vopros` = '".$vopros."', `v1` = '".$v1."', `v2` = '".$v2."', `v3` = '".$v3."', `v4` = '".$v4."', `v5` = '".$v5."' WHERE `id` = '".(int)$mid."';"); 
  
echo 'Mövzu deyişdirildi.<br/>'; 
  
} 
} 


break; 

case 'del':
if ($p_arr['25']!='1') {
	print 'olmaz'; $_v->fsize2($fsize2); die;
}

if (!$act){
echo "Mövzu silinsin?<br/> 
<a href=\"votes.php?mode=del&amp;$ses&amp;act=go&amp;mid=$mid\">Beli</a> | <a href=\"votes.php?$ses&amp;ref=$ref\">Xeyr</a><br/>"; 
} else {
if (mysql_query("DELETE FROM `votes` WHERE `id`= '".(int)$mid."';") and mysql_query("DELETE FROM `voting` WHERE `vote`= '".(int)$mid."';")){ 
echo 'Mövzu silindi.<br/>'; 
} else {
echo 'Sehv var.<br/>'; 
}
}
break; 

case 'vote': 
$v=intval($v); 
$date=date("j.m.Y", $SERVER_TIME); 

if ($v<1 or $v>5) die(); 
mysql_query ("SELECT * FROM `voting` WHERE `vote`='".(int)$mid."' AND `who`='".$id."';"); 
if (mysql_affected_rows() == 0) {
mysql_query("INSERT INTO `voting` SET `vote` = '".(int)$mid."', `date` = '$date', `who` = '".$id."', `var` = '".$v."', `tarix` = '".$SERVER_TIME."';"); 
echo 'Ses Verdiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler...<br/>'; 
} else { 
echo 'Siz art&#305;q ses vermisiniz.<br/>'; 
}
break; 

case 'who': 
$select = @mysql_query ("SELECT * FROM `voting` WHERE `vote`='".(int)$mid."' AND `var` != '".$v."';"); 
$inf = mysql_fetch_array ($select); 
$tarix=$inf["tarix"]; 

$query = mysql_query("SELECT `who`,`date`,`tarix` FROM `voting` WHERE `vote` = '".(int)$mid."' AND `var` = '".$v."';"); 
if (mysql_affected_rows() == 0) {
echo 'Ses verilmeyib.<br/>'; 
echo '</p></card></wml>'; 
mysql_close ($link); 
exit; 
} else {
echo '<u>Ses Verdiler</u><br/>'; 
$i = 1; 

while($arr=mysql_fetch_array($query)){ 
$tarix=$arr["tarix"]; 
$baza = mysql_fetch_array(@mysql_query ("SELECT `id`,`user` from `users` where `id`='".$arr[0]."' LIMIT 1;")); 
$uid=$baza["id"]; 
$uuser=$baza["user"]; 
echo ($i++).". <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\"><b>".$uuser."</b></a>  (".m_tarix($tarix).") <br/>"; 
} 
}

break; 
} 
echo "<br/>\n"; 

if($mode) { 
echo "<a href=\"votes.php?$ses&amp;ref=$ref\">Ümumi Sorğular</a><br/>\n"; 
}

echo "<a href=\"enter.php?$ses&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>