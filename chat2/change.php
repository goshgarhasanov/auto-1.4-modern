<?

header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$us=$row["user"];

if(!isset($go)){
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"qurgular\" title=\"Qur&#287;ular\">\n";
echo "<p>\n";

echo $fsize1;
echo "<b>&#199;at Qur&#287;ular&#305;</b><br/>\n";
echo $fsize2;

echo $divide;

echo $fsize1;
echo "Yenilenme vaxt&#305;(san):<br/>\n";
echo $fsize2;
echo "<select name=\"avr\">\n";
if($row["avr"] === "100")
{
echo "<option value=\"100\">10</option>\n";
}
elseif($row["avr"] === "150")
{
echo "<option value=\"150\">15</option>\n";
}
elseif($row["avr"] === "200")
{
echo "<option value=\"200\">20</option>\n";
}
elseif($row["avr"] === "250")
{
echo "<option value=\"250\">25</option>\n";
}
elseif($row["avr"] === "300")
{
echo "<option value=\"300\">30</option>\n";
}
elseif($row["avr"] === 0) echo "<option value=\"0\">Off</option>\n";
echo "<option value=\"0\">Off</option>\n";
echo "<option value=\"100\">10</option>\n";
echo "<option value=\"150\">15</option>\n";
echo "<option value=\"200\">20</option>\n";
echo "<option value=\"250\">25</option>\n";
echo "<option value=\"300\">30</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Mesajlar&#305;n say&#305;:<br/>\n";
echo $fsize2;
echo "<select name=\"max\">\n";
if($row["max"] === "5")
{
echo "<option value=\"5\">5</option>\n";
}
elseif($row["max"] === "8")
{
echo "<option value=\"8\">8</option>\n";
}
elseif($row["max"] === "10")
{
echo "<option value=\"10\">10</option>\n";
}
elseif($row["max"] === "12")
{
echo "<option value=\"12\">12</option>\n";
}
elseif($row["max"] === "15")
{
echo "<option value=\"15\">15</option>\n";
}
elseif($row["max"] === "20")
{
echo "<option value=\"20\">20</option>\n";
}
elseif($row["max"] === "25")
{
echo "<option value=\"25\">25</option>\n";
}
elseif($row["max"] === "30")
{
echo "<option value=\"30\">30</option>\n";
}
elseif($row["max"] === "49")
{
echo "<option value=\"49\">50</option>\n";
}
echo "<option value=\"5\">5</option>\n";
echo "<option value=\"8\">8</option>\n";
echo "<option value=\"10\">10</option>\n";
echo "<option value=\"12\">12</option>\n";
echo "<option value=\"15\">15</option>\n";
echo "<option value=\"20\">20</option>\n";
echo "<option value=\"25\">25</option>\n";
echo "<option value=\"30\">30</option>\n";
echo "<option value=\"49\">50</option>\n";
echo "</select><br/>\n";

echo $fsize1;
echo "Mektub qebulu:<br/>\n";
echo $fsize2;
echo "<select name=\"mektub_qebulu\">\n";
if ($row["mektub_qebulu"]==0){
echo "<option value=\"0\">Ham&#305;</option>\n";
echo "<option value=\"1\">Dostlar</option>\n";
echo "<option value=\"2\">He&#231;kim</option>\n";
}else if ($row["mektub_qebulu"]==1){
echo "<option value=\"1\">Dostlar</option>\n";
echo "<option value=\"0\">Ham&#305;</option>\n";
echo "<option value=\"2\">He&#231;kim</option>\n";
}else{
echo "<option value=\"2\">He&#231;kim</option>\n";
echo "<option value=\"0\">Ham&#305;dan</option>\n";
echo "<option value=\"1\">Dostlar</option>\n";
}
echo "</select><br/>\n";



echo $fsize1;
echo "Mesaj qebulu (Tan&#305;&#351;l&#305;q):<br/>\n";
echo $fsize2;
echo "<select name=\"mesaj\">\n";
if ($row["mesaj"]==0){
echo "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>\n";
echo "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>\n";
echo "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>\n";
}else if ($row["mesaj"]==1){
echo "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>\n";
echo "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>\n";
echo "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>\n";
}else{
echo "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>\n";
echo "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>\n";
echo "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>\n";
}
echo "</select><br/>\n";







echo $fsize1;
echo "Yazanda:<br/>\n";
echo $fsize2;
echo "<select name=\"say\">\n";
if ($row["say"]==1){
echo "<option value=\"1\">&#350;exsi</option>\n";
echo "<option value=\"0\">&#220;mumi</option>\n";
} else {
echo "<option value=\"0\">&#220;mumi</option>\n";
echo "<option value=\"1\">&#350;exsi</option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo "Rengli Nikler:<br/>\n";
echo $fsize2;
echo "<select name=\"rnikler\">\n";
if ($row["rnikler"]==0){
echo "<option value=\"0\">A&#231;&#305;q</option>\n";
echo "<option value=\"1\">Ba&#287;l&#305;</option>\n";
}else{
echo "<option value=\"1\">Ba&#287;l&#305;</option>\n";
echo "<option value=\"0\">A&#231;&#305;q</option>\n";
}
echo "</select><br/>\n";



echo $fsize1;
echo "Smayllar:<br/>\n";
echo $fsize2;
echo "<select name=\"smls\">\n";
if ($row["smiles"]==0){
echo "<option value=\"0\">Ba&#287;l&#305;</option>\n";
echo "<option value=\"2\">A&#231;&#305;q</option>\n";
}else{
echo "<option value=\"2\">A&#231;&#305;q</option>\n";
echo "<option value=\"0\">Ba&#287;l&#305;</option>\n";
}
echo "</select><br/>\n";





echo $fsize1;
echo "Tehl&#252;kesizlik:<br/>\n";
echo $fsize2;
echo "<select name=\"safe\">\n";
if ($row["safe"]==1){
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
echo "<option value=\"0\">Ba&#287;l&#305;</option>\n";
}else{
echo "<option value=\"0\">Ba&#287;l&#305;</option>\n";
echo "<option value=\"1\">A&#231;&#305;q</option>\n";
}
echo "</select><br/>\n";
echo $fsize1;
echo "Herflerin &#246;l&#231;&#252;s&#252;:<br/>\n";
echo $fsize2;
echo "<select name=\"fsize\">\n";
if ($row["fsize"]=="0"){
echo "<option value=\"0\">Normal</option>\n";
echo "<option value=\"1\">B&#246;y&#252;k</option>\n";
}else{
echo "<option value=\"1\">B&#246;y&#252;k</option>\n";
echo "<option value=\"0\">Normal</option>\n";
}
echo "</select><br/>\n";

echo $fsize1;
echo $divide;

if($rm!="")echo "[<anchor title=\"go\">Melumat&#305; Yenile<go href=\"change.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;go=rew&amp;ref=$ref\" method=\"post\">";
else echo "[<anchor title=\"go\">Melumat&#305; Yenile<go href=\"change.php?id=$id&amp;ps=$ps&amp;go=rew&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"avr\" value=\"$(avr)\"/>";
echo "<postfield name=\"max\" value=\"$(max)\"/>";
echo "<postfield name=\"mesaj\" value=\"$(mesaj)\"/>";
echo "<postfield name=\"mektub_qebulu\" value=\"$(mektub_qebulu)\"/>";
echo "<postfield name=\"say\" value=\"$(say)\"/>";
echo "<postfield name=\"smls\" value=\"$(smls)\"/>";
echo "<postfield name=\"safe\" value=\"$(safe)\"/>";
echo "<postfield name=\"fsize\" value=\"$(fsize)\"/>";
echo "<postfield name=\"rnikler\" value=\"$(rnikler)\"/>";
echo "</go></anchor>]\n";
echo $fsize2;

echo $fsize1;
echo "<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
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
$status = check($status);
$fsize = check($fsize);

if (!isset($error)) {
$result = mysql_query ("Select * users where id = '".$id."'");
if (mysql_affected_rows() == 0){
$error = "database error...";
}else{
$ins_str = "Update users set avr='".$avr."', mesaj='".$mesaj."', rnikler='".$rnikler."', max='".$max."',mektub_qebulu='".$mektub_qebulu."', say='".$say."',  smiles='".$smls."', safe='".$safe."', fsize='".$fsize."' where id ='".$id."'";
if($mesaj!=$row['mesaj']){
mysql_query("UPDATE `mesaj` SET `icaze`='$mesaj' WHERE `idwho` = '".$id."';");

}
}
if (mysql_query ($ins_str)) {
$msg = "Sizin qur&#287;ular deyi&#351;dirildi";
}else{
$error = " ".mysql_error()." ";
}
}
mysql_close($link);

if (isset($error)) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"okis\" title=\"Tamam\">\n";
echo "<p align=\"center\">";
echo $fsize1;
echo "$error<br/>\n";
echo "----<br/><a href=\"change.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
exit;
}
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"okis\" title=\"Tamam\">\n";
echo "<p align=\"center\">";
echo $fsize1;
echo "$msg<br/>\n";
echo "----<br/><a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi Kabinet</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
?>
