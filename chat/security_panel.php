<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,) = check_login($link);
ob_start();

if($id!='1'){
$_v->title('STOP!','center');
$_v->fsize1($fsize1);
echo "Sizin bu b&#246;lmeye icazeniz yoxdur!<br/>\n";
print $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




$_v->title('Security Panel ','left');
$_v->fsize1($fsize1);


echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=parol\">Security Paneli</a> / <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=axtar\">Yeni Parol Yarat</a><br/>----<br/>";

switch($act){
default:

$total = count($sc_pass);

if($total == 0){
echo "Security Paneli olan istifade&#231;i Yoxdur.<br/>";
}else{
echo "Security Paneli olanlar:<br/>----<br/>\n";

$number_of_chunks = 10;
$sc_pass = array_chunk($sc_pass, $number_of_chunks,true);
$pagecount = count($sc_pass);


if (isset($_GET['p']) && (is_numeric($_GET['p']))){
if ($_GET['p'] > $pagecount){
	echo "Sehife tapilmadi!<br/>\n";
	break;
}
$i = $_GET['p'] - 1;
}else{
$i = 0;
}

foreach($sc_pass[$i] as $key => $val){
	$us = select_id($key, "`id`,`user`,`sex`");
$sex = $us->sex == 0 ? "Kisi" : "Qadin";
echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=edit&amp;g=".$us->id."\">".$us->user."</a>- ".($sex)." [ <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=sil&amp;g=".$us->id."\">x</a> ]<br/>";
}
if($pagecount > 0) $_v->divide();

for($i = 1; $i <= $pagecount; $i++){
if($i != $_GET['p']){
	echo "<a href='{$_SERVER['SCRIPT_NAME']}?id=$id&amp;ps=$ps&amp;p=$i'>";
}else{
echo "<b>";
}
echo $i;
if($i != $_GET['p']){
echo "</a>";
}else{
	echo "</b>";
}
if($i != $pagecount) echo " , ";
}
echo "<br/>\n";


}

break;

case parol:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>Security Paneli</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$rpos = file("file/dat_folder/parol_buga.dat");
$bal = trim($rpos[0]);
$parol = trim($rpos[1]);

$_v->action("security_panel.php?id=$id&amp;ps=$ps&amp;act=parol&amp;ref=$ref");

echo "Rejim\n";
if ($parol == 1) {
print $_v->select("<select name=\"parol\" value=\"".$parol."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"parol\" value=\"".$parol."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Qiymeti: ";
print $_v->input("<input size=\"9\" name=\"bal\" maxlength=\"9\" format=\"*N\" value=\"".$bal."\" emptyok=\"false\"/>").'<br/>';


print $_v->submit('Deyi&#351;','deyish=ok');



} else {
$bal = trim($_POST["bal"]);
$fon = trim($_POST["parol"]);

$file = fopen("file/dat_folder/parol_buga.dat", "w");
$data .= "$bal\n";
$data .= "$parol\n";
fwrite($file, $data);
fclose($file);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}





break;

case 'axtar':

if(!isset($ax)){

echo "Yeni Parol Yarat<br/>----<br/>";
$_v->action("security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=axtar&amp;ax=go");
if($_v->ver != "wml"){
echo "Nick ve ya ID:<br/><input type=\"text\" name=\"login\"/>";
}else{
echo "Nick ve ya ID:<br/><input type=\"text\" name=\"login{$ref}\"/>";
}
if($_v->ver != "wml"){
echo "<br/>";
print $_v->submit('Axtari&#351;');
}else{
echo "<br/>[<anchor title=\"go\">Axtari&#351;<go href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=axtar&amp;ax=go\" method=\"post\">\n";
echo "<postfield name=\"login\" value=\"$(login{$ref})\"/>\n";
echo "</go></anchor>]<br/>\n";
}
}else{

if(is_numeric($login)){
$axtar = mysql_query("SELECT * FROM users WHERE id='".$login."'");
}else{
$axtar = mysql_query("SELECT * FROM users WHERE user='".$login."'");
}

if(mysql_num_rows($axtar)==0){
echo "Bele Bir istifadeci Movcud deyil.<br/>";
}else{
$assassin = mysql_fetch_object($axtar);
echo "Leqeb: <b>".$assassin->user."</b> <br/>----<br/>";


if(!isset($sc_pass[$assassin->id])){
echo "Security Paneli M&#246;vcud Deyil.<br/>----<br/>";
echo "Bu &#304;stifade&#231;i &#252;&#231;&#252;n &#304;kinci Parol Yarad&#305;ls&#305;n ?<br/>";
echo "
<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rid=".$assassin->id."&amp;act=mr_assassin\">Beli</a> 
/ <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a><br/>";

}else{
echo "Security Panel M&#246;vcuddur.<br/>";
}
}
}
break;


case 'mr_assassin':

if(!isset($add)){
$sel = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
if(mysql_affected_rows()==0){
echo "Bele bir istifadei movcud deyil<br/>";
}else{
$us = mysql_fetch_object($sel);

$_v->action("security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=mr_assassin&amp;add=go&amp;rid=".$us->id);
print $_v->input("Parol: <input type=\"text\" name=\"pass{$ref}\"/>")."<br/>";
print $_v->submit('Yarat');

}

}else{
    
if (empty($pass)){
echo "Parol yaz&#305lmayib;.<br/>";
}else{
    
    
$save = "<?PHP //user: secrety pass \r\n";
$save .= "\$sc_pass = array(\r\n";
foreach ($sc_pass as $id_key => $id_ps){

if($id_key!= $rid){
$save .= "'".$id_key."' => '".$id_ps."',\r\n";
}

}


$save .= "'".$rid."' => '".$pass."'\r\n";
$save .= " );\r\n";
$save .= "?>";

if(file_put_contents("file/dat_folder/security.php", $save)){

$ol = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
$a = mysql_fetch_object($ol);
echo "<b>Login ve Parol U&#287;urla Yarad&#305;ld&#305;.</b><br/>----<br/>Melumatlar:<br/>----<br/>Leqeb: <b>".$a->user."</b><br/>
Parol: <b>".$pass."</b><br/>";
}else{
echo "Xeta ba&#351; verdi<br/>";
}
}
}



break;


case 'edit':
if(!isset($sc_pass[$g])){
echo "Bu Leqeb &#220;&#231;&#252;n &#304;kinci Parol Se&#231;ilmeyib<br/>";
}else{
    
$p = mysql_query("SELECT * FROM users WHERE id='".$g."'");
$o = mysql_fetch_object($p);

if(!isset($assassin)){
echo "Leqeb: <b>".$o->user."</b><br/>----<br/>";
$_v->action("security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=edit&amp;assassin=go&amp;g=".$g);

echo $_v->input("<input type=\"text\" name=\"pass{$ref}\" value=\"".$sc_pass[$g]."\"/>")."<br/>";

print $_v->submit('Deyi&#351;');

}else{
    
if(empty($pass)){
echo "B&#252;t&#252;n Xanalar&#305; Doldurun.<br/>";
}else{


    
$save = "<?PHP //user: secrety pass \r\n";
$save .= "\$sc_pass = array(\r\n";
foreach ($sc_pass as $id_key => $id_ps){
if($id_key!= $g){
$save .= "'".$id_key."' => '".$id_ps."',\n";
}

}

$save .= "'".$g."' => '".$pass."'\r\n";
$save .= " );\r\n";
$save .= "?>";

if(file_put_contents("file/dat_folder/security.php", $save)){
echo "<b>Parol Yenilendi.</b><br/>";
}else{
echo "Xeta Bas Verdi !";
}

}
}
}
break;


case 'sil':



if(!isset($sc_pass[$g])){
echo "Bu Leqeb &#220;&#231;&#252;n &#304;kinci Parol Se&#231;ilmeyib<br/>";
}else{

    
$saves = "<?PHP //user: secrety pass \r\n";
$saves .= "\$sc_pass = array(\r\n";
foreach ($sc_pass as $id_key => $id_ps){

if($id_key!= $g){
$saves .= "'".$id_key."' => '".$id_ps."',\n";
}

}

$save .= substr($saves ,0,-2);
$save .= " );\r\n";
$save .= "?>";

if(file_put_contents("file/dat_folder/security.php", $save)){
    
echo "Melumat U&#287;urla Silindi.Te&#351;ekkurler.<br/>";
}else{
echo "Xeta Bas Verdi !";
}
}
break;
}



$_v->divide();
if($act){
echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qayit</a><br/>\n";

echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Rehberlik Paneli</a><br/>\n";

}else{
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Rehberlik Paneli</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>