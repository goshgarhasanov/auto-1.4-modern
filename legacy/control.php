<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
if($p_arr['39']!=1 or ($p_arr['120']!=1 and $p_arr['121']!=1 and $p_arr['121']==0 and $p_arr['122']==0 and $p_arr['123']==0 and $p_arr['124']==0 and $p_arr['125']==0 and $p_arr['126']==0 and $p_arr['127']==0 and $p_arr['128']==0 and $p_arr['129']==0 and $p_arr['130']==0 and $p_arr['131']!=1)){
$_v->title('Teess&#252;f','center');
$_v->fsize1($fsize1);
echo "Giriş icazeniz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


$_v->title('Control Panel','left');
$_v->fsize1($fsize1);
switch($not) {

default:
if(!isset($n)){


echo "<b>Control Panel:</b><br/>****<br/>\n";
if($p_arr['120']==1)
echo "&#xbb;<a href=\"control.php?n=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Silinen Mesajlar</a><br/>\n";
if($p_arr['121']==1)
echo "&#xbb;<a href=\"control.php?n=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xeberdarl&#305;q</a><br/>\n";
if($p_arr['122']==1)
echo "&#xbb;<a href=\"control.php?n=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xaric Edenler</a><br/>\n";
if($p_arr['123']==1)
echo "&#xbb;<a href=\"control.php?n=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qaytar&#305;lanlar</a><br/>\n";
if($p_arr['124']==1)
echo "&#xbb;<a href=\"control.php?n=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">IP Ban Edenler</a><br/>\n";
if($p_arr['125']==1)
echo "&#xbb;<a href=\"control.php?n=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Browser Ban Edenler</a><br/>\n";
if($p_arr['126']==1)
echo "&#xbb;<a href=\"control.php?n=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Leqeb Ban Edenler</a><br/>\n";
if($p_arr['127']==1)
echo "&#xbb;<a href=\"control.php?n=8&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bazadan Silenler</a><br/>\n";
if($p_arr['128']==1)
echo "&#xbb;<a href=\"control.php?n=9&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tam &#304;qnor Edenler</a><br/>\n";
if($p_arr['129']==1)
echo "&#xbb;<a href=\"control.php?n=10&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Gizli otaq</a><br/>\n";
if($p_arr['130']==1)
echo "&#xbb;<a href=\"control.php?n=11&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">M&#252;veqqeti r&#252;tbe</a><br/>\n";
if($p_arr['131']==1)
echo "&#xbb;<a href=\"control.php?n=12&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">U&#287;ursuz Qeydiyyat</a><br/>\n";

}
else
{

if(($p_arr['120']!=1 and $n == '1') or ($p_arr['121']!=1 and $n == '2') or ($p_arr['122']!=1 and $n == '3') or ($p_arr['123']!=1 and $n == '4') or ($p_arr['124']!=1 and $n == '5') or ($p_arr['125']!=1 and $n == '6') or ($p_arr['126']!=1 and $n == '7') or ($p_arr['127']!=1 and $n == '8') or ($p_arr['128']!=1 and $n == '9') or ($p_arr['129']!=1 and $n == '10') or ($p_arr['130']!=1 and $n == '11') or ($p_arr['131']!=1 and $n == '12')){

echo "Bu bölmeye giriş icazeniz yoxdur.<br/>----<br/>";
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";

break;
}


//include("./file/fun/0");
//
if($n=="1"){
define("s_msg", "Otaqda Silinmi&#351; Mesajlar");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Silinen mesajlar</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="2"){
define("s_msg", "Xeberdarl&#305;q edenler");
define("n_msg", "Xeberdarl&#305;q edenler haqq&#305;nda melumat yoxdur..");
define("d_msg", "<b>Xeberdarl&#305;q edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="3"){
define("s_msg", "Xaric edenler");
define("n_msg", "Xaric edenler haqq&#305;nda melumat yoxdur..");
define("d_msg", "<b>Xaric edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="4"){
define("s_msg", "&#199;ata Qaytar&#305;lanlar");
define("n_msg", "&#199;atdan xaric edilenleri qaytaran olmay&#305;b..");
define("d_msg", "<b>&#199;ata Qaytar&#305;lanlar</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="5"){
define("s_msg", "IP-Adress Ban Edenler");
define("n_msg", "IP-Adress Ban Edenler haqq&#305;nda melumat Yoxdur..");
define("d_msg", "<b>IP-Adress Ban Edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="6"){
define("s_msg", "Telefon Modeli Ban Edenler");
define("n_msg", "Telefon Modeli Ban Edenler haqq&#305;nda melumat Yoxdur..");
define("d_msg", "<b>Telefon Modeli Ban Edilenenlerr</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="7"){
define("s_msg", "Leqeb Ban Edenler");
define("n_msg", "Leqeb Ban Edenler haqq&#305;nda melumat Yoxdur..");
define("d_msg", "<b>Leqeb Ban Edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="8"){
define("s_msg", "Leqeb Silenler");
define("n_msg", "Leqeb Silenler haqq&#305;nda melumat Yoxdur..");
define("d_msg", "<b>Leqeb Silenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="9"){
define("s_msg", "Tam &#304;qnor");
define("n_msg", "He&#231;kes Tam &#304;qnor Edilmeyib..");
define("d_msg", "<b>Tam &#304;qnor</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="10"){
define("s_msg", "Gizli Otaq");
define("n_msg", "Gizli otaqda he&#231;kes olmay&#305;..");
define("d_msg", "<b>Gizli otaqda</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="11"){
define("s_msg", "M&#252;veqqeti r&#252;tbe");
define("n_msg", "M&#252;veqqeti r&#252;tbe he&#231;kese  verilmeyib..");
define("d_msg", "<b>M&#252;veqqeti r&#252;tbe</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="12"){
define("s_msg", "U&#287;ursuz Qeydiyyat");
define("n_msg", "U&#287;ursuz Qeydiyyat olmay&#305;..");
define("d_msg", "<b>U&#287;ursuz Qeydiyyat</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="20"){
define("s_msg", "Bal Paneline daxil olanlar");
define("n_msg", "Bal Paneline he&#231;kim daxil olmay&#305;b..");
define("d_msg", "<b>Bal Paneline daxil olanlar</b>. haqq&#305;nda melumatlar silindi!");
}
//
if(preg_match("/[^0-9]+/",$n)){

echo "Guya indi sen a&#287;&#305;ll&#305;sanda he?:)<br/>";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($l!='' and $p_arr['134']==1){
$control = "control/".$l."";
//include("./file/fun/6");
//
if($control=="control/1"){
define("s_msg", "Butun Mesajlar&#305; Silinib...");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}elseif($control=="control/5"){
define("s_msg", "IP-Adresin Ban Edilme Sebebi");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}elseif($control=="control/6"){
define("s_msg", "IP-Browserin Ban Edilme Sebebi");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}elseif($control=="control/7"){
define("s_msg", "Ban Edilme Sebebi");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}elseif($control=="control/8"){
define("s_msg", "Testiq ile Silinenler");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}elseif($control=="control/9"){
define("s_msg", "Tam &#304;qnor Edilme Sebebi");
define("n_msg", "Melumat yoxdur..");
define("d_msg", "<b>Melumatlar  Silindi!</b>");
}
//
$takep = "&amp;l=$l&amp;ref=$ref";
}
else
{
$control = "control";
$takep = "&amp;ref=$ref";
}
if((!file_exists("file/$control/$n.dat"))or($n=="0")){

echo "Fayl tap&#305;lmad&#305;...<br/>****<br/>\n";
echo "<a href=\"control.php?n=$l&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
}

 
if($fl=="x"){
if($p_arr['133']!=1){

echo "Buna Hüququnuz yoxdur.<br/>----<br/>";
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";

break;
}
if($l!=''){
if(unlink("file/$control/$n.dat"))
{

echo "".d_msg."<br/>****<br/>\n";
}
else
{

echo "Melumatlar silinmir...<br/>****<br/>\n";
}
echo "<a href=\"control.php?n=$l&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
} else {

$fp=fopen("file/$control/$n.dat", "w");
fclose($fp);

if($n=="3"||$n=="4"||$n=="5"||$n=="6"||$n=="7"){
function full_del_dir ($directory)
{
$dir = opendir($directory);
while(($file = readdir($dir)))
{
if ( is_file ($directory."/".$file))
{
unlink ($directory."/".$file);
}
else if ( is_dir ($directory."/".$file) &&
($file != ".") && ($file != ".."))
{
full_del_dir ($directory."/".$file); 
}
}
closedir ($dir);
rmdir ($directory);
}
if(is_dir("file/$control/$n")) full_del_dir ("file/control/$n");
if(!is_dir("file/$control/$n")) @mkdir("file/$control/$n");
}
///////////

echo "".d_msg."<br/>****<br/>\n";
echo "<a href=\"control.php?n=$n&amp;m=$m&amp;id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";

//////////////////////////////////////
}
break;
}
else
if($fl!=''){
if($p_arr['133']!=1){

echo "Buna Hüququnuz yoxdur.<br/>----<br/>";
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";

break;
}
$file=file("file/$control/$n.dat");	
$fp=fopen("file/$control/$n.dat","w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$fl) {$silinen = "$file[$i]"; unset($file[$i]);} }
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);
if(file_exists("file/$control/$n/$z.dat")) unlink("file/$control/$n/$z.dat");


echo "<b>Silindi</b>!<br/>****<br/>";
echo "<a href=\"control.php?n=$n&amp;m=$m&amp;id=$id&amp;ps=$ps$takep\">Geri Qay&#305;t</a><br/>\n";

break;
}


echo "<b>".s_msg.":</b>\n";
if($p_arr['133']==1)echo "<a href=\"control.php?n=$n&amp;fl=x&amp;id=$id&amp;ps=$ps$takep\">xXx</a><br/>****<br/>\n";
else echo "<br/>****<br/>";

$file = file("file/$control/$n.dat");
$total = count($file);    

$m = (int)$_GET['m'];
if($m < 0 || $m > $total){$m = 0;}
if ($total < $m + 10){ $end = $total; }
else {$end = $m + 10; }
for ($i = $m; $i < $end; $i++){

$file = file("file/$control/$n.dat");
$file = array_reverse($file);
if($l=="")$i2=round($i+1);
$num=$total-$i-1;

$ras=explode("ID=<u>", base64_decode($file[$i]));
$exscent=$ras[1];
$ras=explode("</u>", $exscent);
$exscent=$ras[0];

echo $i2." ".base64_decode($file[$i]).""; if($l=="" && $p_arr['133']==1){echo "[<a href=\"control.php?n=$n&amp;m=$m&amp;id=$id&amp;ps=$ps&amp;z=9$exscent&amp;fl=$num$takep\">x</a>]";}

if(file_exists("file/$control/".$n."/9".$exscent.".dat") and $p_arr['134']==1){
echo " -<b><a href=\"control.php?n=9".$exscent."&amp;m=0&amp;id=$id&amp;ps=$ps&amp;l=$n$takep\">&#xbb;&#xbb;</a></b>";
}
echo "<br/>";
}
if($total<1){echo "<u>".n_msg.".</u><br/>";}
if ($m != 0) {echo "<a href=\"control.php?m=".($m - 10)."&amp;n=$n&amp;id=$id&amp;ps=$ps$takep\">&lt;&lt;&lt;- </a> ";}
if (($total > $m + 10)&&($m != 0))echo'|'; 
if ($total > $m + 10) {echo " <a href=\"control.php?m=".($m + 10)."&amp;n=$n&amp;id=$id&amp;ps=$ps$takep\"> -&gt;&gt;&gt;</a>";}
if (($total > $m + 10)or($m != 0))echo "<br/>\n";
if ($l != "")echo "<a href=\"control.php?n=$l&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";





}





echo "****<br/>\n";
if(isset($n)){
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";
}
if($row["level"]>6){
$pnam = "Admin";
}elseif($row["level"]>5){
$pnam = "Moder";
}else{
$pnam = "VIP";
}
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">$pnam Panel</a>\n";

break;
}
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>