<?php
error_reporting(0);
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row['bal'];
$stsonline = $row["stsonline"];

function pagenav($base_url, $start, $max_value, $num_per_page) {
        $pgcont = 9;
        $pgcont = (int)($pgcont - ($pgcont % 2)) / 2;
    if ($start >= $max_value)
        $start = max(0, (int)$max_value - (((int)$max_value % (int)$num_per_page) == 0 ? $num_per_page : ((int)$max_value % (int)$num_per_page)));
    else
        $start = max(0, (int)$start - ((int)$start % (int)$num_per_page));
    $base_link = '<a href="' . strtr($base_url, array ('%' => '%%')) . 'start=%d' . ''.$kod.''.$cat.''.$akt.''.$cid.''.$p.''.$nm.'">%s</a> ';
    if ($start > $num_per_page * $pgcont)
        $pageindex .= sprintf($base_link, 0, '1');
    if ($start > $num_per_page * ($pgcont + 1))
        $pageindex .= '... ';
    for ($nCont = $pgcont; $nCont >= 1; $nCont--)
        if ($start >= $num_per_page * $nCont) {
            $tmpStart = $start - $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    $pageindex .= '[<b>'.($start / $num_per_page + 1).'</b>] ';
    $tmpMaxPages = (int)(($max_value - 1) / $num_per_page) * $num_per_page;
    for ($nCont = 1; $nCont <= $pgcont; $nCont++)
        if ($start + $num_per_page * $nCont <= $tmpMaxPages) {
            $tmpStart = $start + $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    if ($start + $num_per_page * ($pgcont + 1) < $tmpMaxPages)
        $pageindex .= '... ';
    if ($start + $num_per_page * $pgcont < $tmpMaxPages)
        $pageindex .= sprintf($base_link, $tmpMaxPages, $tmpMaxPages / $num_per_page + 1);
    if ($start + $num_per_page < $max_value) {
        $display_page = ($start + $num_per_page) > $max_value ? $max_value : ($start + $num_per_page);
    }
    return $pageindex;
}

function cc_tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 Saat: <u>$cc_time2</u>";
$time_p[0]=date("j n Y", $time);
$time_p[1]=date("H:i", $time);
$ccvaxt=(time()-$time);
$cc_s = $ccvaxt/ 3600;
$cc_saat_tam = strtok($cc_s,'.');
$cc_saat_san = $cc_saat_tam * 3600;
$cc_d = $ccvaxt / 60;
$cc_dq_tam =strtok($cc_d,'.');
$cc_deqiqe_san = $cc_dq_tam * 60;
$cc_deqiqe_hesab = ($ccvaxt - $cc_saat_san) / 60;
$cc_deqiqe = strtok($cc_deqiqe_hesab,'.');
$cc_saniye = $ccvaxt - $cc_deqiqe_san;
if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye==0))$cc_muddet = "<u>hal hazirda</u>";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<60))$cc_muddet = "<u>$cc_saniye saniye</u> evvel";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "<u>$cc_deqiqe deqiqe</u> evvel";
else $cc_muddet = "<u>$cc_saat_tam saat</u> evvel";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;nen Saat: <u>$time_p[1]</u>";}else{
$w[1]="Bazar ertesi";
$w[2]="&#199;er&#351;enme Ax&#351;am&#305;";
$w[3]="&#199;er&#351;enbe";
$w[4]="C&#252;me Ax&#351;am&#305;";
$w[5]="C&#252;me";
$w[6]="&#350;enbe";
$w[7]="Bazar";
$hefte=date("w",$time);
if($w[$hefte]!=""){
$cc_time2="".date("H:i", $time)."";
$cc_time="".$w[$hefte]." Saat: <u>$cc_time2</u>";
}else{
$cc_time=str_replace("Jan","Yanvar",$cc_time);
$cc_time=str_replace("Feb","Fevral",$cc_time);
$cc_time=str_replace("Mar","Mart",$cc_time);
$cc_time=str_replace("May","May",$cc_time);
$cc_time=str_replace("Apr","Aprel",$cc_time);
$cc_time=str_replace("Jun","Iyun",$cc_time);
$cc_time=str_replace("Jul","Iyul",$cc_time);
$cc_time=str_replace("Aug","Avqust",$cc_time);
$cc_time=str_replace("Sep","Sentyabr",$cc_time);
$cc_time=str_replace("Oct","Oktyabr",$cc_time);
$cc_time=str_replace("Nov","Noyabr",$cc_time);
$cc_time=str_replace("Dec","Dekabr",$cc_time);
}}}
return $cc_time;
}

if($start=='')$start = 0;
$i = $start + 1;
$kmess = 10;

$sts = file("file/dat_folder/stsonline.dat");
$qiymet = str_replace("-", "", (int)trim($sts[0]));
$muellif = trim($sts[1]);



if (!ctype_digit($qiymet) or $qiymet==0) 
$qiymet = 1;


echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
switch ($b) {

default:
echo "<card id=\"chat\" title=\"Online Status\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Online Status</b><br/>\n";
if($row['level']==9)echo "$divide<a href=\"stsonline.php?b=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Mini Panel</a>";
print $fsize2;
echo "</p><p align=\"left\">\n";
print $fsize1;
echo "<u>Online Status</u>unuz \n";
if($stsonline!="") echo "\"$stsonline\"<br/>\n";
else echo "\"Yoxdur\"<br/>\n";
echo $divide;
echo $fsize2;
echo "<input name=\"text$ref\" maxlength=\"50\" value=\"".$stsonline."\" title=\"Online Status\"/>";
print $fsize1;
echo "<br/>\n";

echo "<anchor>Deyi&#351;dir!<go href=\"stsonline.php?b=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"text\" value=\"$(text$ref)\"/>\n";
echo "</go></anchor>(<b>".$qiymet."</b> bal)<br/>\n";
if($stsonline!="") echo "<a href=\"stsonline.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a> (<b>0</b> bal)<br/>\n";
echo $divide;
echo "<b>Qeyd</b>: <u>Her g&#252;n 24:00 dan sonra melumat bazas&#305; yenilenir.</u><br/>\n";
break;

case 'like':

$sql = mysql_query("SELECT * FROM `users` where stsonline != '' AND `id` = '".$uid."';");

if (mysql_affected_rows() == 0) {
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo " Bele Online Status m&#246;vcud deyil.<br/>\n";
break;

}


$q=mysql_query("select * from `stsonline_like` where `cc_id`='".$uid."' and `who`='".$id."'");
if (mysql_affected_rows() != 0) {
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo"<i>Bu statusu daha &#246;nce beyenmisiniz.</i><br/>\n";
}else {
echo "<card id=\"ok\" title=\"Beyendiz\">\n";
echo "<p align=\"left\">\n";
mysql_query ("INSERT INTO stsonline_like SET cc_id='".$uid."', who = '".$id."'");


echo $fsize1;
echo "Bu statusu beyendiniz<br/>\n";

}

break;

case 'wholike':

echo "<card id=\"like\" title=\"Beyenenler\">\n";
echo "<p align=\"left\">\n";
print $fsize1;
//$sql = mysql_query("SELECT * FROM `users` where stsonline != '' AND `id` = '".$uid."';");
$sql = mysql_query("SELECT * FROM `users` where stsonline != '' AND `id` = '".$uid."';");
while($sts = mysql_fetch_array($sql))
echo "M&#252;ellif: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\">".$sts['user']."</a><br/>";
$sql = mysql_query("select id from stsonline_like where cc_id = '".$uid."'");
$like = mysql_num_rows($sql);
echo "Beyenenler: <b>".$like."</b><br/>";
if(isset($_GET['start'])) $start = $_GET['start'];
else $start = 0;
if($start < 0) $start = 0;
if($start > $like) $start = 0;
echo $divide;
if(empty($page)) $page=0;
$query = mysql_query("select * from stsonline_like where cc_id = '".$uid."';");
if (mysql_affected_rows() == 0){
echo '<i>Bu statusu beyenen yoxdur...</i><br/>';
}

$sql = mysql_query("SELECT * FROM `stsonline_like` where cc_id = '".$uid."' ORDER BY `id` asc limit $start, $kmess;");

while($exit = mysql_fetch_array($sql))
{
$test = mysql_query ("SELECT * FROM `users` where id = '".$exit['who']."'");
if (mysql_affected_rows() == 0) {
$muellif = "<u>Nik silinib</u>";
} else {
$oxu = mysql_fetch_array ($test);
$muellif = "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$oxu["id"]."&amp;ref=$ref\">".$oxu["user"]."</a>";
}
print ($i++).") $muellif<br/>";
}

if ($like > $kmess) {
echo $divide;
if ($start > 0)  print "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=wholike&amp;uid=$uid&amp;start=".($start - 10)."&amp;ref=$ref\">Evvelki</a> | \n";
if ($like > $start + 10)  print "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=wholike&amp;uid=$uid&amp;start=".($start + 10)."&amp;ref=$ref\">Sonrak&#305;</a>\n";
echo "<br/>";
echo pagenav('stsonline.php?id='.$id.'&amp;ps='.$ps.'&amp;b=wholike&amp;uid='.$uid.'&amp;ref='.$ref.'&amp;', $start, $like, $kmess) ;
echo "<br/>";
}

break;

case '7':
echo "<card id=\"fikir\" title=\"Fikirler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$sql = mysql_query("SELECT * FROM `users` where stsonline != '' AND `id` = '".$uid."';");
while($sts = mysql_fetch_array($sql))
{
echo "M&#252;ellif: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\">".$sts['user']."</a><br/>";
echo "Online Statusu: \"".$sts['stsonline']."\"<br/>";
}
if(($row['level']==9)&&($_GET["del_c"])){
mysql_query("DELETE FROM stsonline_fikir WHERE id='".$_GET["del_c"]."'");
echo $divide;
echo "Fikir silindi!.<br/>";
}
if(isset($_POST['fikiri'])){
if ($row["posts"]<50){
echo $divide;
echo "<b>Xeta</b> &#187; <i>Hesab&#305;n&#305;zda post azd&#305;r !</i><br/>";
echo "Statusa &#351;erh vermek &#252;&#231;&#252;n <u>50</u> postunuz olmal&#305;d&#305;r.<br/>";
}else{

if ($minpos !=355){
$st1 = substr($fikiri,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($fikiri,$minpos+strlen($smiles[$nm]),strlen($fikiri)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$fikiri = $st1.$st2;
}
unset($smiles);
unset($replaces);

if(empty($fikiri)){
$error = $divide."<b>Xeta</b>: Metn yeri bo&#351;dur.<br/>";
$cvb = 1;
}
$x = mysql_query("SELECT * FROM `stsonline_fikir` WHERE `uid` = '".$uid."' and muellif = '".$id."' and fikir = '".$fikiri."';");
if(mysql_num_rows($x)!=0){
$cvb = 1;
}

if ($error){
echo $error;
}

if ($cvb!=1){
mysql_query("INSERT INTO `stsonline_fikir` SET `uid` = '".$uid."', muellif = '".$id."', vaxt = '".time()."', fikir = '".$fikiri."';");
}}}
echo $divide;
$sqleh = mysql_query("select id from stsonline_fikir where uid = '".$uid."'");
$total = mysql_num_rows($sqleh);

if($total == 0)echo "<i>Bu statusa fikir bildiren olmay&#305;b.</i><br/>\n";
else echo "<b>&#304;stifade&#231;i Fikirleri...</b><br/>\n$divide";
$sql = mysql_query("SELECT * FROM `stsonline_fikir` where uid = '".$uid."' ORDER BY `vaxt` asc limit $start, $kmess;");

while($exit = mysql_fetch_array($sql))
{
$test = mysql_query ("SELECT * FROM `users` where id = '".$exit['muellif']."'");
if (mysql_affected_rows() == 0) {
$muellif = "[<u>Nik silinib</u>]";
} else {
$oxu = mysql_fetch_array ($test);
$muellif = "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$oxu["id"]."&amp;ref=$ref\">".$oxu["user"]."</a>";
}
if($row['level']==9)echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;del_c=".$exit['id']."&amp;ref=$ref\">x</a> - ";
echo "$muellif &#187;\n"; 
echo "".$exit['fikir']."<br/>";
echo "".cc_tarix($exit['vaxt'])."<br/>";

}
if ($total > $kmess) {
echo $divide;
if ($start > 0)  print "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;start=".($start - 10)."&amp;ref=$ref\">Evvelki</a> | \n";
if ($total > $start + 10)  print "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;start=".($start + 10)."&amp;ref=$ref\">Sonrak&#305;</a>\n";
echo "<br/>";
echo pagenav('stsonline.php?id='.$id.'&amp;ps='.$ps.'&amp;b=7&amp;uid='.$uid.'&amp;ref='.$ref.'&amp;', $start, $total, $kmess) ;
echo "<br/>";
}

echo "----<br/>";
echo $fsize2;
echo "<input type=\"text\" name=\"fikiri$ref\" maxlength=\"160\"/><br/>";
echo $fsize1."<anchor>Fikir Bildir<go href=\"stsonline.php?id=$id&amp;ps=$ps&amp;b=7&amp;uid=$uid&amp;ref=$ref\" method=\"post\">
<postfield name=\"fikiri\" value=\"$(fikiri$ref)\"/>
</go></anchor><br/>";
break;

case '6':
if($row['level']!=9){
echo "<card id=\"duhsunduyupanel\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
echo "<card id=\"panel\" title=\"Mini Panel\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<a href=\"stsonline.php?b=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qiymeti deyi&#351;</a><br/>\n";
echo "<a href=\"stsonline.php?b=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Niklerin d&#252;&#351;&#252;nd&#252;y&#252;</a><br/>\n";
break;

case '5':
if($row['level']!=9){
echo "<card id=\"stsonlinepanel\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
echo "<card id=\"stsonlineuser\" title=\"Niklerin d&#252;&#351;&#252;nd&#252;y&#252;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `stsonline` > '0' ".$tabled.";");
$inmenu = mysql_result($q, 0);
if(isset($_GET['start'])) $start = $_GET['start'];
else $start = 0;
if($start < 0) $start = 0;
if($start > $inmenu) $start = 0;
echo "<b>Niklerin d&#252;&#351;&#252;nd&#252;y&#252;</b><br/>\n";
echo $divide;
if($inmenu==0){
echo "<i>&#199;atda he&#231;kesin hesab&#305;nda bal yoxdur...</i><br/>\n";
}else{

$c = $start;
$q = mysql_query("SELECT `id`,`user`,`stsonline` FROM `users` WHERE `stsonline` > '0' ".$tabled." ORDER BY `stsonline` DESC LIMIT $start,$kmess;");
while($a2 = mysql_fetch_array($q))
{
$nk=$a2['id'];
$login=$a2['user'];
$stsonline=$a2['stsonline'];
$c++;
$sql = mysql_query("select id from stsonline_fikir where uid = '".$nk."'");
$total = mysql_num_rows($sql);
echo ($c).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$nk."&amp;ref=$ref\">".$login."</a> - 
<b>D&#252;&#351;&#252;nd&#252;y&#252;</b>: ".$stsonline."";
echo " + <a href=\"stsonline.php?b=7&amp;id=$id&amp;ps=$ps&amp;uid=$nk&amp;ref=$ref\">$total</a> /\n";
$sql = mysql_query("select id from stsonline_like where cc_id = '".$nk."'");
$like = mysql_num_rows($sql);
echo "<a href=\"stsonline.php?b=wholike&amp;id=$id&amp;ps=$ps&amp;uid=$nk&amp;ref=$ref\">$like</a><br/>\n";
}
if ($inmenu > $kmess) {
echo $divide;
if ($start > 0)  print "<a href=\"stsonline.php?b=$b&amp;id=$id&amp;ps=$ps&amp;start=".($start - 10)."&amp;ref=$ref\">Evvelki</a> | \n";
if ($inmenu > $start + 10)  print "<a href=\"stsonline.php?b=$b&amp;id=$id&amp;ps=$ps&amp;start=".($start + 10)."&amp;ref=$ref\">Sonrak&#305;</a>\n";
echo "<br/>";
echo pagenav('stsonline.php?b='.$b.'&amp;id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'&amp;', $start, $inmenu, $kmess) ;
echo "<br/>";
}
}
break;

case '4':
if($row['level']!=9 and $nk!=$id){
echo "<card id=\"stspanel\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
echo "<card id=\"legv\" title=\"Le&#287;v oldu\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
mysql_query("UPDATE `users` SET `stsonline` = '' WHERE `id` = '".$nk."';");
mysql_query("DELETE FROM stsonline_fikir WHERE uid='".$nk."'");
mysql_query("DELETE FROM stsonline_like WHERE cc_id='".$nk."'");
echo "Status yaz&#305;s&#305; le&#287;v olundu.<br/>\n";
break;


case '3':
if($row['level']!=9){
echo "<card id=\"stspanel\" title=\"Olmaz\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
echo "<card id=\"stspanel\" title=\"Mini Panel\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

if(!$_POST['qiymetup']){
echo "M&#252;ellif: <b>$muellif</b><br/>\n";
echo $divide;
echo "Qiymet:<br/>\n";
echo $fsize2;
echo "<input name=\"qiymetup$ref\" format=\"*N\" value=\"".$qiymet."\" title=\"Qiymet\"/><br/>\n";
print $fsize1;
echo "<anchor>Yenile<go href=\"stsonline.php?b=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"qiymetup\" value=\"$(qiymetup$ref)\"/>
</go></anchor><br/>\n";
}else{
echo "Qiymet Yenilendi<br/>\n";
file_put_contents('file/dat_folder/stsonline.dat',$qiymetup."\n".$row['user']);
}

break;


case '2':
echo "<card id=\"legv\" title=\"Le&#287;v oldu\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
mysql_query("UPDATE `users` SET `stsonline` = '' WHERE `id` = '".$id."';");
mysql_query("DELETE FROM stsonline_fikir WHERE uid='".$id."'");
mysql_query("DELETE FROM stsonline_like WHERE cc_id='".$id."'");
echo "Sizin status yaz&#305;n&#305;z le&#287;v olundu.<br/>\n";
break;

case '1':
if ($bal < $qiymet) {
echo "<card id=\"nookey\" title=\"Diqqet\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$qiymet."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
echo "Sizin <b>$bal</b> bal&#305;n&#305;z var.<br/>";
echo $divide;
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
} else {
echo "<card id=\"okey\" title=\"Elave oldu\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$qaliq = $bal - $qiymet;

if(strlen($text)>=51)
$text = substr($text, 0, 50);

if (mysql_query("UPDATE `users` SET `stsonline` = '".$text."', `bal` = '".$qaliq."' WHERE `id` = '".$id."';")) {
echo "Online Status qeyde al&#305;nd&#305;: <b>$text</b><br/>";
mysql_query ("Update `users` set `stat`='0.02'+`stat` where `id` ='".$id."';");
echo "Hesab&#305;n&#305;zdan <b>$qiymet</b> bal &#231;&#305;x&#305;ld&#305; ve hesab&#305;n&#305;zda <u>$bal</u> bal qald&#305;.<br/>";
} else {
echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
}
}
break;
 


}
echo $divide;
if($b)
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
?>