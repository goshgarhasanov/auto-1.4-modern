<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$mid = intval($mid);
$us = $row["user"];

$_v->title('Yeni Evlenenler','center');
$_v->fsize1($fsize1);


switch($go) {
default:
echo "<img src=\"img/love10.gif\" alt=\"Love\"/><br/>";

$print = mysql_query("select * from `svadbi` order by id desc;");
if (mysql_affected_rows() == 0)
{
	echo "Evlenen yoxdur<br/>";
	break;
}
echo "&#199;atda Yeni  Toy Edenler...<br/>*****<br/>\n";

while($arr = @mysql_fetch_array($print))
{
	print "<b><a href=\"toy.php?id=$id&amp;ps=$ps&amp;go=view&amp;mid=".$arr['id']."&amp;ref=$ref\">".$arr['zhenih']." ve ".$arr['nevesta']."</a></b><br/>";

	if($arr["saat"] < $SERVER_TIME)
	{
		mysql_query("delete from `svadbi` where saat<'".time()."' limit 1;");
	}
}
break;




case 'view':
$select = @mysql_query ("Select * from `svadbi` where id='".$mid."';");
$inf = mysql_fetch_array ($select);
$zhenih = $inf["zhenih"];
$nevesta = $inf["nevesta"];
$frzhenih = $inf["frzhenih"];
$frnevesta = $inf["frnevesta"];
$times = $inf["vremya"];
$organizatory = $inf["organizatory"];
echo "<img src=\"img/love10.gif\" alt=\"Love\"/><br/>";
$_v->align('left');
echo "Çat sakinlerini bizim sevimli cütl&#252;yümüz olan <b>".$zhenih."</b>, Bey ile <b>".$nevesta."</b>, Xan&#305;m&#305;n  toyuna devet edirik! <br/>----<br/>\n";
echo "<u>&#220;nvan</u>: <b>Sevgi otağı.</b><br/>";
echo "Saat <b>".$times."</b>-da<br/>";
echo $divide;
echo "Te&#351;kilatçı: ".$organizatory."<br/>";
echo $divide;
echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;mid=$mid&amp;ref=$ref&amp;go=send&amp;mod=ok&amp;ref=$ref\">Tebrik g&#246;nder</a>\n";
echo "<br/>\n";
break;

case 'send':
if (isset($mod)){
$select = @mysql_query ("Select * from `svadbi` where id='".$mid."';");
$inf = mysql_fetch_array ($select);
$zhenih = $inf["zhenih"];
$nevesta = $inf["nevesta"];

$latuser=strtolower($zhenih);
$result1 = mysql_query ("Select id,user from users where latuser = '".$latuser."'"); 

if (mysql_affected_rows() == 0) {
print "<b>".$zhenih."</b><u> Bele oğlan leqebi yoxdur.</u><br/>";
break;
}
$row1 = mysql_fetch_array ($result1);
$nkm = $row1["id"];
$loginm  = $row1["user"];

$latuser=strtolower($nevesta);
$result2 = mysql_query ("Select id,user from users where latuser = '".$latuser."'"); 
if (mysql_affected_rows() == 0) {
print "<u><b>".$nevesta."</b> Bele qız leqebi yoxdur.</u><br/>";
break;
}
$row2 = mysql_fetch_array ($result2);
$nkz = $row2["id"]; 
$loginz = $row2["user"];

echo "<img src=\"img/love10.gif\" alt=\"Love\"/><br/>";
echo "Yeni Aile Qurmu&#351; <b>".$loginm."</b> ve <b>".$loginz."</b> C&#252;tl&#252;y&#252;ne<br/>Tebrik Mesaj&#305;n&#305;z<br/>\n";
$loginm = UrlEncode($loginm);
$loginz = UrlEncode($loginz);
echo $divide;

$_v->action("toy.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=send");

print $_v->input("<input name=\"message$ref\" maxlength=\"600\" value=\"$message\" title=\"message\"/>").'<br/>';
print $_v->submit('G&#246;nder','mid='.$mid);


break;
}
if(empty($message)){
echo "<u>B&#246;lmeler bo&#351;dur.</u><br/>";
break;
}

$select = @mysql_query ("Select * from `svadbi` where id='".$mid."';");
$inf = mysql_fetch_array ($select);
$zhenih = $inf["zhenih"];
$nevesta = $inf["nevesta"];

$latuser=strtolower($zhenih);
$result1 = mysql_query ("Select id,user from users where latuser = '".$latuser."';"); 

if (mysql_affected_rows() == 0) {
print "<b>".$zhenih."</b><u> Bele oğlan leqebi yoxdur.</u><br/>";
break;
}
$row1 = mysql_fetch_array ($result1);
$nkm = $row1["id"];
$loginm  = $row1["user"];

$latuser=strtolower($nevesta);
$result2 = mysql_query ("Select id,user from users where latuser = '".$latuser."'"); 
if (mysql_affected_rows() == 0) {
print "<u><b>".$nevesta."</b> Bele qız leqebi yoxdur.</u><br/>";
break;
}
$row2 = mysql_fetch_array ($result2);
$nkz = $row2["id"]; 
$loginz = $row2["user"];




$message = in_smile(narmobil($message));


$nkm = trim(" $nkm ");
$loginm = trim(" $loginm ");
$nkz = trim(" $nkz ");
$loginz = trim(" $loginz ");
$kol = rand(0,99999999);
$kol2 = rand(0,99999999);
$topic = "Toyunuz M&#252;barek!";
@mysql_query("insert into zapiski values(0,'".$us."','".$id."','".$message."','".$loginm."','".$nkm."','".$SERVER_TIME."','0','".$topic."','','1','1');");
echo "<img src=\"img/love10.gif\" alt=\"Love\"/><br/>";
$loginm = UrlDecode($loginm);
$loginz = UrlDecode($loginz);
echo "<b>".$loginm."</b> Tebrikinizi qebul etdi.<br/>";

@mysql_query("insert into zapiski values(0,'".$us."','".$id."','".$message."','".$loginz."','".$nkz."','".$SERVER_TIME."','0','".$topic."','','1','1');");
echo "<img src=\"img/love10.gif\" alt=\"Love\"/><br/>";
echo "<b>".$loginz."</b> Tebrikinizi qebul etdi.<br/>";


break;
}
$_v->divide();
if($go) {
echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;atda Toy Edenler</a><br/>\n"; 
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>