<?

header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$mid = intval($mid);
$us = $row["user"];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"toy\" title=\"Yeni Evlenenler\">\n";
echo "<p align=\"center\">\n";

switch($go) {
default:
echo "<img src=\"smilean/love10.gif\" alt=\"Love\"/><br/>";

$print = mysql_query("select * from `svadbi` order by id desc;");
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Evlenen yoxdur<br/>";
echo $fsize2;
break;}
print $fsize1;
echo "&#199;atda Yeni  Toy Edenler...<br/>*****<br/>\n";

while($arr = @mysql_fetch_array($print)) {
print "<b><a href=\"toy.php?id=$id&amp;ps=$ps&amp;go=view&amp;mid=".$arr['id']."&amp;ref=$ref\">".$arr['zhenih']." ve ".$arr['nevesta']."</a></b><br/>";
if($arr["id"]<time()){
mysql_query("delete from `svadbi` where saat<'".time()."' limit 1;");
}
}
print $fsize2;
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
echo "<img src=\"smilean/love10.gif\" alt=\"Love\"/><br/>";
echo "</p><p align=\"left\">";
echo $fsize1;
echo "&#199;at sakinlerini bizim sevimli Cutluyumuz olan <b>".$zhenih."</b>, Bey ile <b>".$nevesta."</b>, Xan&#305;m&#305;n  toyuna devet edirik! <br/>----<br/>\n";
echo "<u>&#220;nvan</u>: <b>Sevgi otagi.</b><br/>";
echo "Saat <b>".$times."</b>-da<br/>";
echo $divide;
echo "<u>Gelinin &#350;ahidi</u>: <b>".$frzhenih."</b><br/>";
echo "<u>Beyin &#350;ahidi</u>: <b>".$frnevesta."</b><br/>";
echo $divide;
echo "Teshkilatchi: ".$organizatory."<br/>";
echo $divide;
echo $fsize2;
echo $fsize1;
echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;mid=$mid&amp;ref=$ref&amp;go=send&amp;mod=ok&amp;ref=$ref\">Tebrik g&#246;nder</a>\n";
echo $fsize2;
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
print $fsize1;
print "<b>".$zhenih."</b><u> Bele o–îülan leqebi yoxdur.</u><br/>";
print $fsize2;
break;
}
$row1 = mysql_fetch_array ($result1);
$nkm = $row1["id"];
$loginm  = $row1["user"];

$latuser=strtolower($nevesta);
$result2 = mysql_query ("Select id,user from users where latuser = '".$latuser."'");
if (mysql_affected_rows() == 0) {
print $fsize1;
print "<u><b>".$nevesta."</b> Bele q–î±z leqebi yoxdur.</u><br/>";
print $fsize2;
break;
}
$row2 = mysql_fetch_array ($result2);
$nkz = $row2["id"];
$loginz = $row2["user"];

echo $fsize1;
echo "<img src=\"smilean/love10.gif\" alt=\"Love\"/><br/>";
echo "Yeni Aile Qurmu&#351; <b>".$loginm."</b> ve <b>".$loginz."</b> C&#252;tl&#252;y&#252;ne<br/>Tebrik Mesaj&#305;n&#305;z<br/>\n";
$loginm = UrlEncode($loginm);
$loginz = UrlEncode($loginz);
echo $divide;
echo $fsize2;
echo "<input name=\"message$ref\" maxlength=\"600\" value=\"$message\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"toy.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;go=send\" method=\"post\">\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "<postfield name=\"loginm\" value=\"$loginm\"/>\n";
echo "<postfield name=\"loginz\" value=\"$loginz\"/>\n";
echo "<postfield name=\"nkm\" value=\"$nkm\"/>\n";
echo "<postfield name=\"nkz\" value=\"$nkz\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>\n";
break;
}
if(empty($message)){
echo $fsize1;
echo "<u>B&#246;lmeler bo&#351;dur.</u><br/>";
echo $fsize2;
break;
}

$msg = $message;
require("smile.php");
$minpos = 1200; $nm = 1200;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($msg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;
};
};
if ($minpos !=1200){
$st1 = substr($msg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msg,$minpos+strlen($smiles[$nm]),strlen($msg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$msg = $st1.$st2;
}
Unset($smiles);
unset($replaces);

$message = $msg;

$nkm = trim(" $nkm ");
$loginm = trim(" $loginm ");
$nkz = trim(" $nkz ");
$loginz = trim(" $loginz ");
$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$kol2 = rand(0,99999999);
$time = time()+$vaxt;
$topic = "Toyunuz M&#252;barek!";
@mysql_query("insert into zapiski values(0,'".$us."','".$id."','".$message."','".$loginm."','".$nkm."','".$time."','0','".$topic."','".$data."','1','1');");
echo "<img src=\"smilean/love10.gif\" alt=\"Love\"/><br/>";
$loginm = UrlDecode($loginm);
$loginz = UrlDecode($loginz);
echo $fsize1;
echo "<b>".$loginm."</b> Tebrikinizi qebul etdi.<br/>";
echo $fsize2;

@mysql_query("insert into zapiski values(0,'".$us."','".$id."','".$message."','".$loginz."','".$nkz."','".$time."','0','".$topic."','".$data."','1','1');");
echo "<img src=\"smilean/love10.gif\" alt=\"Love\"/><br/>";
echo $fsize1;
echo "<b>".$loginz."</b> Tebrikinizi qebul etdi.<br/>";
echo $fsize2;


break;
}
echo $fsize1;
echo "*****<br/>";
echo $fsize2;
if($go) {
echo $fsize1;
echo "<a href=\"toy.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;atda Toy Edenler</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo $fsize2;

echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>
