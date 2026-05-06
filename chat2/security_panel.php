<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
connect_db();
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);



echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Security Panel\">";
echo "<p align=\"left\">";
echo $fsize1;
if($p_arr[35]==0){
echo "Bax bu uje olmaz";
echo $fsize2;
echo "</p></card></wml>";
exit();
}echo "<u>Admin</u> / <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Security Panel</a><br/>****<br/>";

switch($act){
default:
if($p_arr[35]==1){
echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=axtar\">Sifre Sistemi Qurulum</a><br/>";
}
if($p_arr[35]==1){
echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=movcud\">Sifresi Olanlar</a>";
}
break;

case 'axtar':

if($p_arr[35]==0){
echo "Bax bu uje olmaz";
echo $fsize2;
echo "</p></card></wml>";
exit();
}

$security = mysql_query("SELECT * FROM security_panel");
$panel = mysql_fetch_object($security);

if(!isset($ax)){

echo "Daxili Seurity Password Panel<br/>****<br/>";
echo "Leqeb ve ya ID:<br/> <input type=\"text\"  name=\"login\"/>";
echo "<br/>[<anchor title=\"go\">Select<go href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=axtar&amp;ax=go\" method=\"post\">]\n";
echo "<postfield name=\"login\" value=\"$(login)\"/>\n";
echo "</go></anchor><br/>\n";
echo $divide;

echo "<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=movcud\">Sifresi Olanlar</a>";

}else{

if(is_numeric($login)){
$axtar = mysql_query("SELECT * FROM users WHERE id='".$login."'");
}else{
$axtar = mysql_query("SELECT * FROM users WHERE user='".$login."'");
}

if(mysql_num_rows($axtar)==0){echo "Bele Bir istifadeci Movcud deyil";}else{
$abi = mysql_fetch_object($axtar);
echo "User: <b>".$abi->user."</b> <br/>****<br/>";

$sec = mysql_query("SELECT * FROM security_panel WHERE usid='".$login."'");
if(mysql_affected_rows()==0){
echo "Security Panel M&#246;vcud Deyil <br/>****<br/>";
echo "Bu &#304;stifadeci &#252;&#231;&#252;n Ikinci Parol Yaradilsin ?<br/>";

echo "
<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rid=".$abi->id."&amp;act=maker\">Beli</a>
/ <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a>";

}else{
echo "Security Panel M&#246;vcuddur";
}
}

}


break;

case 'maker':
$ra = mysql_query("SELECT * FROM security_panel WHERE usid='".$rid."'");
if(mysql_affected_rows()==0){

if(!isset($add)){
$sel = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
if(mysql_affected_rows()==0){echo "Bele bir istifadei movcud deyil";}else{
$us = mysql_fetch_object($sel);
echo "User: <b>".$us->user."</b><br/>****<br/>";

echo "Login: <input type=\"text\" name=\"login\"/><br/>";
echo "Parol: <input type=\"text\" name=\"pass\"/><br/>";

echo "<anchor title=\"go\">Yarat<go href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=maker&amp;add=go&amp;rid=$rid\" method=\"post\">\n";
echo "<postfield name=\"login\" value=\"$(login)\"/>\n";
echo "<postfield name=\"pass\" value=\"$(pass)\"/>\n";
echo "</go></anchor>\n";
}}else{
if(empty($rid)){echo "Istifadeci Secilmeyib";}else{
if(empty($login) || empty($pass)){echo "Butun Xanalari DOldurun";}else{

if(mysql_query("INSERT into security_panel SET usid='".$rid."',login='".$login."',pass='".$pass."'")){

$ol = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
$a = mysql_fetch_object($ol);
echo "Ikinci Login ve Parol Ugurla Yaradildi.<br/>---<br/>Melumat:<br/>----<br/>User: <b>".$a->user."</b><br/>
Ikinci Login: <b>".$login."</b><br/>
Ikinci Parol: <b>".$pass."</b><br/>


";}else{echo "Xeta ba&#351; verdi";}


}
}
}
}else{
echo "Artiq ikinci Parol M&#246;vcuddur";
}
break;

case 'movcud':
if($p_arr[35]==0){
echo "Bax bu uje olmaz";
echo $fsize2;
echo "</p></card></wml>";
exit();
}
$sqlks = mysql_query("select id from security_panel");
$total = mysql_num_rows($sqlks);
if ((strpos ($HTTP_USER_AGENT,"Windows") !== false)||(strpos ($HTTP_USER_AGENT,"Opera") !== false))
{$r_k="ok";$max_page = 10;}else{$r_k="";$max_page = 10;}$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($total/$max_page) < $page){$start = 0;$end = $max_page;}
$sql = mysql_query("SELECT * FROM `security_panel` ORDER BY `id` desc limit $start,$max_page;");
if(mysql_affected_rows()==false){
echo "Security Panel Movcud Olan istifadeci Yoxdur";
}else{$m = 1;
while ($sm = mysql_fetch_array($sql)){

$mn = mysql_query("SELECT * FROM users WHERE id='".$sm["usid"]."'");
$l = mysql_fetch_object($mn);
echo "[<a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=sil&amp;g=".$sm["usid"]."\">x</a>] ".($m++).") <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=edit&amp;g=".$sm["usid"]."\">".$l->user."</a><br/>";
}if ($total > $max_page) {
echo navigation('security_panel.php?id='.$id.'&amp;ps='.$ps.'&amp;act=movcud&amp;ref='.$ref.'', $total, $max_page, $page) ;
echo $divide;
}
}
break;


case 'edit':
$r = mysql_query("SELECT * FROM security_panel WHERE usid='".$g."'");
if(mysql_affected_rows()==false){echo "Bu istifadeci &#252;&#231;&#252;n ikinci Parol Secilmeyib";}else{
$y = mysql_fetch_array($r);

$p = mysql_query("SELECT * FROM users WHERE id='".$g."'");
$o = mysql_fetch_object($p);

if(!isset($abi)){
echo "User: <b>".$o->user."</b><br/>";
echo "Login: ".$y["login"]."<br/>";
echo "Parol: <small>".$y["pass"]."</small><br/>";
echo "<anchor title=\"go\">Yenile<go href=\"security_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=edit&amp;royal=go&amp;g=$g\" method=\"post\">\n";
echo "<postfield name=\"login\" value=\"$(login)\"/>\n";
echo "<postfield name=\"pass\" value=\"$(pass)\"/>\n";
echo "</go></anchor>\n";
}else{
if(empty($login) || empty($pass)){echo "Butun Xanalari DOldurun";}else{

if(mysql_query("UPDATE security_panel SET login='".$login."',pass='".$pass."' WHERE usid='".$g."'")){echo "Melumat Yenilendi";}else{
echo "Xeta Bas Verdi !";



}}}}
break;

case 'sil':
$ri = mysql_query("SELECT * FROM security_panel WHERE usid='".$g."'");
if(mysql_affected_rows()==false){echo "Bu istifadeci Ucun Ikinci Parol Secilmeyib";}else{

if(mysql_query("DELETE FROM security_panel WHERE usid='".$g."'")){echo "Melumat Ugurla Silindi. Te&#351;ekkurler";}else{

echo "Xeta Bas Verdi !";

}

}



break;
}
echo "<br/>****<br/>
<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>
<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";echo $fsize2;
echo "</p></card></wml>";

?>