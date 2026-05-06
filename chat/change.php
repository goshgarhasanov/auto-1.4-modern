<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$us=$row["user"];  
if($row["changephp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Qur&#287;ular Bolmasine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayna</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if(!isset($go))
{

	$_v->title('Qur&#287;ular');
	$_v->fsize1($fsize1);
	$_v->action("change.php?id=$id&amp;ps=$ps&amp;go=rew&amp;ref=$ref");

	echo "<b>&#199;at Qur&#287;ular&#305;</b><br/>\n";

	$_v->divide();

////
echo "Sesli SmS:<br/>\n";
$option = "<select name=\"ssms\">|";
if ($row["ssms"]==1){
	    $option .= "<option value=\"1\">A&#231;&#305;q</option>|";
		$option .= "<option value=\"0\">Bagl&#305; </option>|";
}else if ($row["ssms"]==0){
        $option .= "<option value=\"0\">Bagl&#305; </option>|";
	    $option .= "<option value=\"1\">A&#231;&#305;q</option>|";
}
	$option .= "</select>";
print $_v->select($option,$row['ssms']).'<br/>';

echo "Dostluq Qebulu:<br/>\n";
$option = "<select name=\"dost\">|";
if ($row["dost"]==0){
	    $option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
		$option .= "<option value=\"1\">Dostluq Qebulu Bagl&#305;</option>|";
}else if ($row["dost"]==1){
        $option .= "<option value=\"1\">Dostluq Qebulu Bagl&#305;</option>|";
	    $option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
}
	$option .= "</select>";
print $_v->select($option,$row['dost']).'<br/>';
////	
		
	echo "Yenilenme vaxt&#305;(san):<br/>\n";

	$option = "<select name=\"avr\">|";
 if ($row["avr"]==100){
	$option .= "<option value=\"100\">10</option>|";
	}else if ($row["avr"]==150){
	$option .= "<option value=\"150\">15</option>|";
	}else if ($row["avr"]==200){
	$option .= "<option value=\"200\">20</option>|";
	}else if ($row["avr"]==250){
	$option .= "<option value=\"250\">25</option>|";
	}else if ($row["avr"]==300){
	$option .= "<option value=\"300\">30</option>|";
	}
elseif($row["avr"] === 0) $option .= "<option value=\"0\">Off</option>|";
	$option .= "<option value=\"0\">Off</option>|";
   if($row["avr"] != 100) $option .= "<option value=\"100\">10</option>|";
    if($row["avr"] != 150)$option .= "<option value=\"150\">15</option>|";
	if($row["avr"] != 200)$option .= "<option value=\"200\">20</option>|";
	if($row["avr"] != 250)$option .= "<option value=\"250\">25</option>|";
	if($row["avr"] != 300)$option .= "<option value=\"300\">30</option>|";
	
	$option .= "</select>";

	print $_v->select($option,$row['avr']).'<br/>';

	echo "Mesajlar&#305;n say&#305;:<br/>\n";
$max=$row["max"]; 
	$option = "<select name=\"max\">|";
	if($row["max"] ==$max){
	$option .= "<option value=\"$max\">$max</option>|";
	}
	if($row["max"] != 5)$option .= "<option value=\"5\">5</option>|";
	if($row["max"] != 8)$option .= "<option value=\"8\">8</option>|";
	if($row["max"] != 10)$option .= "<option value=\"10\">10</option>|";
	if($row["max"] != 12)$option .= "<option value=\"12\">12</option>|";
	if($row["max"] != 15)$option .= "<option value=\"15\">15</option>|";
	if($row["max"] != 20)$option .= "<option value=\"20\">20</option>|";
	if($row["max"] != 25)$option .= "<option value=\"25\">25</option>|";
	if($row["max"] != 30)$option .= "<option value=\"30\">30</option>|";
	if($row["max"] != 50)$option .= "<option value=\"50\">50</option>|";
	$option .= "</select>";
	print $_v->select($option,$row['max']).'<br/>';


	echo "Mektub qebulu:<br/>\n";

	$option = "<select name=\"mektub_qebulu\">|";
	if($row["mektub_qebulu"] ==0){
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	$option .= "<option value=\"1\">Dostlar</option>|";
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	}
	else if($row["mektub_qebulu"] ==1){
	$option .= "<option value=\"1\">Dostlar</option>|";
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	}
	else if($row["mektub_qebulu"] ==2){
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	$option .= "<option value=\"1\">Dostlar</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$row['mektub_qebulu']).'<br/>';


	echo "Mesaj qebulu (Tan&#305;&#351;l&#305;q):<br/>\n";

	$option = "<select name=\"mesaj\">|";
	if($row["mesaj"] ==0){
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	}
	else if($row["mesaj"] ==1){
	$option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
	}
	else if($row["mesaj"] ==2){
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
    $option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$row['mesaj']).'<br/>';


	echo "Yazanda:<br/>\n";

	$option = "<select name=\"say\">|";
		if($row["say"] ==1){
	$option .= "<option value=\"1\">&#350;exsi</option>|";
	$option .= "<option value=\"0\">&#220;mumi</option>|";
	}else{	
$option .= "<option value=\"0\">&#220;mumi</option>|";
$option .= "<option value=\"1\">&#350;exsi</option>|";	
		}
	$option .= "</select>";
	print $_v->select($option,$row['say']).'<br/>';

	echo "Rengli Nikler:<br/>\n";
	$option = "<select name=\"rnikler\">|";
	if($row["rnikler"] ==0){
	$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
	$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
	}else{
$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
}
	$option .= "</select>"; 
	print $_v->select($option,$row['rnikler']).'<br/>';

	echo "Smayllar:<br/>\n";
	$option = "<select name=\"smls\">|";
	if($row["smiles"] ==2){
	$option .= "<option value=\"2\">A&#231;&#305;q</option>|";
	$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";
	}else{
	$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
	$option .= "<option value=\"2\">A&#231;&#305;q</option>|";
	}
	$option .= "</select>"; 
	print $_v->select($option,$row['smiles']).'<br/>';

	echo "Tehl&#252;kesizlik:<br/>\n";
	$option = "<select name=\"safe\">|"; 
if($row["safe"] ==1){
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
	}else{
$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
}
	$option .= "</select>";
	print $_v->select($option,$row['safe']).'<br/>';



	echo "Herflerin &#246;l&#231;&#252;s&#252;:<br/>\n";
	$option = "<select name=\"fsize\">|";
	if($row["fsize"] ==0){
	$option .= "<option value=\"0\">Normal</option>|";
	$option .= "<option value=\"1\">B&#246;y&#252;k</option>|";
	}else{
	$option .= "<option value=\"1\">B&#246;y&#252;k</option>|";
	$option .= "<option value=\"0\">Normal</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$row['fsize']).'<br/>';

	$_v->divide();
	print $_v->submit('Yenile');
	$_v->divide('wml');

	echo "<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi kabinet</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$emp="Duzgun format deyil!";
if(!preg_match("!^[0-9]+$!i",$avr)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$max)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$mektub_qebulu)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$say)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$smls)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$safe)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$mesaj)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$ssms)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$dost)){$error = $emp;}
$status = check($status);
$fsize = check($fsize);

if (!isset($error))
{
	if(mysql_query ("Update users set avr='".$avr."', mesaj='".$mesaj."', rnikler='".$rnikler."', ssms='".$ssms."', dost='".$dost."', max='".$max."',mektub_qebulu='".$mektub_qebulu."', say='".$say."',  smiles='".$smls."', safe='".$safe."', fsize='".$fsize."' where id ='".$id."'"))
	{
		if($mesaj!=$row['mesaj'])
		{
			mysql_query("UPDATE `mesaj` SET `icaze`='$mesaj' WHERE `idwho` = '".$id."';");
		}
	}
	else
	{
		$error = mysql_error();
	}
}

if (isset($error))
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "$error<br/>\n";
	echo "----<br/><a href=\"change.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{
	$_v->title('Done','center');
	$_v->fsize1($fsize1);
	echo "Sizin qur&#287;ular deyi&#351;dirildi<br/>\n";
	echo "----<br/><a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi Kabinet</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
}
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>