<?php
require("inc.php");

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
  
$xal=$row['xal'];
$bal=$row['bal'];

if(!isset($_POST['action']))
{
	$max =mysql_fetch_object(mysql_query ("select count(`id`) as num from `users` where `xal`>'".$xal."';"));
	$_v->title('Xal art&#305;r');
	$_v->fsize1($fsize1);

	echo "<b>Xal&#305;n Art&#305;r&#305;lmas&#305;</b><br/>*****<br/>\n";
	echo "Hesab&#305;n&#305;zda \"<b>$bal</b>\" bal ve \"<b>$xal</b>\" xal var.<br/>";
	if($bal<=0) {
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
	}
	echo "----<br/>";
	echo "Xallar&#305;z&#305;n say&#305; ne qeder &#231;ox olarsa bir o qeder Onlaynda irelide g&#246;r&#252;neceksiniz.<br/>Hal-haz&#305;rda Sizin <b>$xal</b> xal&#305;n&#305;z var ve nickinizin online olanlar aras&#305;nda yeri: <b>".($max->num+1)."</b><br/>Siz xallar&#305;n&#305;z&#305;n say&#305;n&#305; art&#305;rmaqla daha da ireli s&#305;rada g&#246;r&#252;ne bilersiniz. Bu da sizin nickin daha &#231;ox g&#246;r&#252;nmesine ve size gelen mesajlar&#305;n artmas&#305;na sebeb olacaq, yeni dostlar qazanacaqs&#305;n&#305;z...<br/>\n";
	echo "----<br/>\n";

	$_v->action("xal.php?id=$id&amp;ps=$ps&amp;ref=$ref");

	$option = "<select name=\"yxal$ref\">|";
	$option .= "<option value=\"00200\">200 xal (200 Bal)</option>|";
	$option .= "<option value=\"00300\">300 xal (300 Bal)</option>|";
	$option .= "<option value=\"00400\">400 xal (400 Bal)</option>|";
	$option .= "<option value=\"00500\">500 xal (500 Bal)</option>|";
	$option .= "<option value=\"01000\">1000 xal (1000 Bal)</option>|";
	$option .= "</select>";
	print $_v->select($option).'<br/>';
	print $_v->submit('Elave Et','action=ok');
	echo "----<br/>\n"; 
	echo "<b>Qeyd</b>: Xallar gece 12 tamamda s&#305;f&#305;rlan&#305;r.<br/>";

	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
else
{
	$yxal = $yxal-0;
	if($yxal <=0){mysql_close ($link);exit;}
	if($bal<$yxal)
	{
		$_v->title('Hesab&#305;n&#305;zda Bal Azd&#305;r');
		$_v->fsize1($fsize1);
		echo "Hesab&#305;n&#305;zda \"<b>$yxal</b>\" bal yoxdur.<br/>----<br/>";
		echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
		$_v->divide();
		echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaja Qay&#305;t</a><br/>\n";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		die;
	}

	$_v->title('Tebrikler');
	$_v->fsize1($fsize1);


	echo "Tebrikler Siz \"<b>$yxal</b>\" xal ald&#305;n&#305;z...<br/>";
	$newbal = $bal-intval($yxal);
	$yxal = $yxal+$xal;
	echo "Cemi Xallar&#305;n&#305;z \"<b>$yxal</b>\" oldu!<br/>*****<br/>";
	mysql_query("Update users set  xal='$yxal', bal='$newbal'  where id ='".$id."'");

	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

?>