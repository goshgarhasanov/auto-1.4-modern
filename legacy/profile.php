<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($row["profilephp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Anket Melumatlar Bolmasine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayn</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if(!isset($err)) $err = '';

if(!isset($go))
{
	$_v->title('Profil');
	$_v->fsize1($fsize1);

	$_v->action("profile.php?id=$id&amp;ps=$ps&amp;go=rew&amp;ref=$ref");
	echo "<b>$row[user]</b>, Sizin Melumatlar.<br/>\n";
	$_v->divide();
	echo "Parol:<br/>\n";
	print $_v->input("<input type=\"password\" name=\"pass\" maxlength=\"20\" value=\"".base64_decode($row['pass'])."\" emptyok=\"false\"/>").'<br/>';

	echo "Real Ad&#305;n&#305;z:<br/>\n";
	print $_v->input("<input name=\"name\" maxlength=\"15\" value=\"".$row['name']."\" emptyok=\"false\"/>").'<br/>';

	echo "<b>Cinsiniz</b>:<br/>\n";
	$option = "<select name=\"sex\">|";
if ($row["sex"]==1){
$option .= "<option value=\"1\">Xan&#305;m</option>|";
$option .= "<option value=\"0\">Ki&#351;i</option>|";
}else{
$option .= "<option value=\"0\">Ki&#351;i</option>|";
$option .= "<option value=\"1\">Xan&#305;m</option>|";
}
	$option .= "</select>";
	print $_v->select($option,$row['sex']).'<br/>';
	
	
	@list( $day, $month, $year ) = split( '-', $row['birth'] );
	
	echo "Do&#287;um Tarixi:<br/>\n";
	print $_v->input("<input size=\"2\" name=\"day\" value=\"$day\" maxlength=\"2\" format=\"*N\"/>").'-';
	print $_v->input("<input size=\"2\" name=\"month\" value=\"$month\" maxlength=\"2\" format=\"*N\"/>").'-';
	print $_v->input("<input size=\"4\" name=\"year\" value=\"$year\"  maxlength=\"4\" format=\"*N\" emptyok=\"false\"/>").'<br/>';
	
	echo "&#350;eher:<br/>\n";
	print $_v->input("<input name=\"city\" maxlength=\"100\" value=\"".$row['city']."\" emptyok=\"false\"/>").'<br/>';

	echo "N&#246;mre:<br/>\n";
	print $_v->input("<input name=\"nomr\" maxlength=\"15\" value=\"".$row['nomre']."\" format=\"*N\"/>").'<br/>';

	
	if(strstr($row['infa'],"<img src=\""))
	{
		$tend = strpos($row['infa'],"\"/>");
		$t=strlen($row['infa']);
		$msgend=substr($row['infa'],$tend+3,$t);
		$msgtemp=substr($row['infa'],0,$tend);
		$t1=strpos($msgtemp,"<img src=\"");
		$msgfirst=substr($msgtemp,0,$t1);
		$t2=strlen($msgtemp);
		$t3=strpos($msgtemp,"alt=\"");
		$msgaver=substr($msgtemp,$t3+5,$t2);
		$row['infa']=$msgfirst.$msgaver.$msgend;
	}
	echo "&#214;z&#252;n&#252;z haqq&#305;nda:<br/>\n";
	print $_v->input("<input name=\"infa\" maxlength=\"220\" value=\"".$row['infa']."\" emptyok=\"false\"/>").'<br/>';
$posts = $row["posts"];
if ($row["posts"]>150)
{
echo "Mesajlara auto cavab:<br/>\n";
print $_v->input("<input name=\"avtootvetm\" maxlength=\"250\" value=\"$row[avtootvetm]\" title=\"Mektublara cavab\" emptyok=\"true\"/>").'<br/>';

}
	echo "&#199;atda Meqsed:<br/>\n";
		$option =  "<select name=\"meqsed\">|";
		$option .= "<option value=\"0\">Dost Tapmaq</option>|";
		$option .= "<option value=\"1\">Sevgi Tapmaq</option>|";
		$option .= "<option value=\"2\">Virtual Dostluq</option>|";
		$option .= "<option value=\"3\">Hems&#246;hbet olmaq</option>|";
		$option .= "</select>";
	print $_v->select($option,$row["meqsed"]).'<br/>';
	
	$_v->divide();
	print $_v->submit('Melumat&#305; yenile');
	$_v->divide('wml');
	
	echo "<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi kabinet</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$error = null;

$emp2 = "Melumat Formati Duzgun Deyil.!";
$emp = "Butun Bolmeler(esasen *(ulduz olan bolmeler) tamamlanmayib!";
$wrongdate = "Dogum Tarixi Duzgun Yazilmayib.Bu Reala Uygun Olmalidir =)";
$god=date("Y",$SERVER_TIME)-10;

if ($pass == "") {$error = "Siz Parol yazmamisiniz";}
elseif(!preg_match("!^[a-z0-9]+$!i",$pass)) {$error = "Parolda Icaze Verilmeyen Simvollar Var!";}
elseif ($name == "") {$error = "Adiniz yazilmayib";}
elseif ($day == "") {$error = $emp;}
elseif ($month == "") {$error = $emp;}
elseif ((strlen($day) !== 2)||($day>31)){$error = "Siz anadan oldugunuz gunu(day) yazmamisiniz!!!";}
elseif ((strlen($month) !== 2)||($month>12)){$error = "Siz anadan oldugunuz ayi(month) yazmamisiniz!!!";}
elseif ((strlen($year) !== 4)||($year>=$god)||($year<1970)){$error = "Siz anadan oldugunuz ili(year) yazmamisiniz!!!";}
elseif ($year == "") {$error = $emp;}
elseif ($city == "") {$error = $emp;}
elseif ($infa == "") {$error = "Ozunuz Haqda Qisa Melumat yazin!!!";}
elseif(!preg_match("!^[0-9]+$!i",$day)){$error = $emp2;}
elseif(!preg_match("!^[0-9]+$!i",$month)){$error = $emp2;}
elseif(!preg_match("!^[0-9]+$!i",$year)){$error = $emp2;}
elseif(!preg_match("!^[0-1]+$!i",$sex)){$error = $emp2;}
elseif(!preg_match("!^[0-3]+$!i",$meqsed)){$error = $emp2;}
else
{
	$pass = check($pass);
	$day = check($day);
	$month = check($month);
	$year = check($year);

	$name = chkdsk($name,basename(__FILE__),"Ad");
	$infa = chkdsk($infa,basename(__FILE__),"Haqq&#305;nda");
	$city = chkdsk($city,basename(__FILE__),"&#350;eher");
	$nomr= chkdsk($nomr,basename(__FILE__),"N&#246;mre");
	if ($row["posts"]>150)
	{
	$avtootvet= chkdsk($avtootvet,basename(__FILE__),"Avto Cavab");
    $avtootvetm= chkdsk($avtootvetm,basename(__FILE__),"Avto Cavab");
	}
	$name = narmobil($name);
	$infa = narmobil($infa);
	$city = narmobil($city);
	$nomr = narmobil($nomr);
if ($row["posts"]>150)
	{
	$avtootvet = narmobil($avtootvet);
    $avtootvetm = narmobil($avtootvetm);
}
	$infa=substr($infa,0,500);
	$infa=in_smile($infa,$row['posts']);
if ($row["posts"]>150)
	{
	$avtootvet=substr($avtootvet,0,1100);
	$avtootvetm=substr($avtootvetm,0,1100);
	}
	mysql_query ("Update users set pass='".base64_encode($pass)."', name='".$name."', nomre='".$nomr."', sex='".$sex."', birth='".$day."-".$month."-".$year."', city='".$city."', infa='".$infa."', avtootvetm='".$avtootvetm."', avtootvet='".$avtootvet."', meqsed='".$meqsed."' where id ='".$id."'");
}

if ($error)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);

	echo "<b>$error</b><br/>----<br/>\n";
	echo "<a href=\"profile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
}
else
{
	$_v->title('Done','center');
	$_v->fsize1($fsize1);
if($row["id"]==$id){
$ps = base64_encode($pass);
}
	echo "<b>&#350;exsi Anketin yenilendi.</b><br/>----<br/>\n";
	echo "<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi kabinet</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=".$ps."&amp;ref=$ref\">Dehliz</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
}
?>