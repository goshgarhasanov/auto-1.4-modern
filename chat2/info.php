<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $P_ARR) = check_login($link);
WHO("$nk","-",BASENAME(__FILE__));

//else $takep="&amp;ref=$ref";
if(isset($_POST['info']))
{
include("./file/require/info");
exit;
}
$select = @mysql_query ("Select * from users where id='".$nk."' and banned != '2'");

if (mysql_affected_rows() == 0){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "Nick Tap&#305;lmad&#305;. Yeqin Silinib.<br/>";
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}

$inf = mysql_fetch_array ($select);

$usid=$inf["id"];
$nick = $inf["user"];
$name = $inf["name"];
$birth = $inf["birth"];
$meqsed = $inf["meqsed"];
$sex = $inf["sex"];
$city = $inf["city"];
$infa = $inf["infa"];
$posts = $inf["posts"];
$credits = $inf["credits"];
$gposts = $inf["gposts"];
$status = $inf["status"];
$date = $inf["date"];
$time = $inf["time"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$img = $inf["img"];
$nastroi = $inf["nastroi"];
$room = $inf["room"];
$bal = $inf["bal"];
$level=$inf["level"];
$para=$inf["para"];
$zn=$inf["zn"];
$mesaj_qebulu=$inf["mesaj"];
$qefes=$inf["qefes"];
$xstatus=$inf["xstatus"];
$forum=$inf["forum"];
$fpost=$inf["fpost"];
$yeni=$inf["time_active"];
$bugunpost=$inf["bugunpost"];
$para = $inf["para"];
$mesaj=$inf["mesaj"];
$tox=$inf["tox"];
$mexvi=$inf["mexvi"];
$who=$inf["who"];
$whotime=$inf["whotime"];
$stat=$inf["stat"];

if ($credits>=0 && $credits<100) $victstatus="Xam";
if ($credits>=100 && $credits<500) $victstatus="Telebe";
if ($credits>=500 && $credits<1000) $victstatus="Bakalavr";
if ($credits>=1000 && $credits<2000) $victstatus="Magistr";
if ($credits>=2000 && $credits<5000) $victstatus="Doktora Namized";
if ($credits>=5000 && $credits<7000) $victstatus="Elmler Doktoru";
if ($credits>=7000) $victstatus="Dahi insan";


if ($xstatus == 1) {
$xmesaj = "Online";
} else if ($xstatus == 2) {
$xmesaj = "Offline";
} else if ($xstatus == 3) {
$xmesaj = "Me&#351;gulam";
} else if ($xstatus == 4) {
$xmesaj = "Sevgi axtar&#305;ram";
} else if ($xstatus == 5) {
$xmesaj = "Tan&#305;&#351; olmuram";
} else if ($xstatus == 6) {
$xmesaj = "Dar&#305;x&#305;ram";
} else if ($xstatus == 7) {
$xmesaj = "&#199;ekirem";
}


mysql_query ("Select * from viewanket where user='".$row['user']."' and myid='".$nk."'");
if (mysql_affected_rows()==0){
mysql_query ("INSERT INTO viewanket SET user = '".$row['user']."', usid = '".$id."', tarix = '".time()."', myid = '".$nk."'");
}

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
else $inf["zn"]="x";

$levelselect = @mysql_query ("Select name from levels where level='".$level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];

$d=date("d-m-");
$y=date("Y");
$d1=substr($birth,0,2);
$m1=substr($birth,4,2);
$y1=substr($birth,6,4);
if ($y>$y1) $age=$y-$y1; else $age="(bilinmir)";
if ((!$age)||($age==0)||($age=="")||($age>$y)) $age="(K)"; else $age="".$age."\n";

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"info\" title=\"$nick\">\n";
echo "<p align=\"left\" mode=\"wrap\">\n";
if($b=="2"){
echo $fsize1;
$sql = mysql_query("SELECT `usid` FROM `ignor` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) != 0){
echo "<b>Iqnor List</b>: ";
$i=0;
while($ignores = mysql_fetch_array($sql))
{
$i++;
$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$ignores['usid']."';");
$dost = mysql_fetch_array($q);
$ignores = $dost['user'];
echo "<u>".$ignores."</u>";
if(mysql_num_rows($sql)!=$i){echo ", ";}
}
echo "<br/>\n";
}
else
echo "Bu istifade&#231;inin iqnor siyahsinda he&#231;kes yoxdur...<br/>\n";
echo $divide;
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
exit;
}elseif($b=="1"){
echo $fsize1;


$sql = mysql_query("SELECT `usid` FROM `friends` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) != 0){
echo "<b>Dostlar&#305;</b>: ";
$i=0;
while($friends = mysql_fetch_array($sql))
{
$i++;
$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$friends['usid']."';");
$dost = mysql_fetch_array($q);
$friends = $dost['user'];
echo "<u>".$friends."</u>";
if(mysql_num_rows($sql)!=$i){echo ", ";}
}
echo "<br/>\n";
}
else
echo "Bu istifade&#231;inin Dostlar&#305; yoxdur...<br/>\n";
echo $divide;
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Geri qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
exit;
}
echo $fsize1;


if(($mesaj ==0)or($id ==1)or($id ==19)){
echo "<a href=\"plaint.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">&#350;ikayet et!</a><br/>";

echo "$zn<b>[".$nick."]</b>&#252;&#231;&#252;n mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"message$ref\" maxlength=\"600\" value=\"$message\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor>G&#246;nder<go href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>";
echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">".$nick." ile s&#246;hbetin arxivi</a><br/>\n";
}else{

if(($mesaj ==1)or($id ==1)or($id ==19)){
mysql_query ("Select * from friends where usid='".$id."' and id='".$nk."';");
if (mysql_affected_rows() == true){
echo "$zn<b>".$nick."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"message$ref\" maxlength=\"600\" value=\"$message\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor>G&#246;nder<go href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"$nk\"/>\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>";
echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">".$nick." ile s&#246;hbetin arxivi</a><br/>\n";
}
else
{
echo "<u>Bu istifade&#231;i yaln&#305;z <b>dostlar&#305;ndan</b> mesaj qebul edir.</u>";
echo "<br/>";
}
}
else{
echo "<b>Bu istifade&#231;i mesaj qebul etmir.</b><br/>";
}};
echo $divide;
if(($id ==1)or($id ==19)){
if($mesaj_qebulu==1){
echo "<u>Bu istifade&#231;i yaln&#305;z <b>dostlar&#305;ndan</b> mesaj qebul edir.</u><br/>";
echo $divide;
}
if($mesaj_qebulu==2){
echo "<b>Bu istifade&#231;i mesaj qebul etmir.</b><br/>";
echo $divide;
}
}

if ($qefes!="0"){
echo "<b>Virtual Qefes:</b> i&#351;tirak&#231;&#305;s&#305;d&#305;r \n";
if($qefes==3)echo "<u>Me&#287;lub olub</u><br/>\n";
else
echo "<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;login=$nick&amp;$ref\">ses ver!</a><br/>\n";
}
if (eregi("nak", $inf["zn"]))
echo "<b>Gold User:</b> <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";
//else
//echo " - <b>Nik:</b> $nick<br/>\n";


if(($mexvi==0)or($row["level"]==9))echo " - <b>&#304;D</b>: $nk<br/>\n";


if(($mexvi!=1)or($row["level"]==9)){


echo " - <b>Ad&#305;</b> $name<br/>\n";
if($img!="0"){
echo " - <a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Foto Albom:($img)</a><br/>\n";
}
else
{
echo "<u>&#350;ekili Yoxdur</u><br/>\n";
}

//echo " - <b>Ya&#351;</b>: $age<br/>\n";
if ($sex=="0")echo " - <b>Cinsi</b>: Ki&#351;i<br/>\n";
else if ($sex=="1")echo " - <b>Cinsi</b>: Qad&#305;n<br/>\n";

if($nastroi!="") echo " - <b>Ehval&#305;</b>: $nastroi<br/>\n";

echo " - <b>Ballar&#305;</b>: ($bal)<br/>";

if($level>3)echo " - <b>R&#252;tbe</b>: <u>$levname</u><br/>\n";

echo "<b>- Faizi:</b> <a href=\"melumat.php?mod=15&amp;id=$id&amp;ps=$ps$takep\"><img src=\"statistic.php?ses=$stat\"/></a><br/>";


$sql = mysql_query("SELECT `usid` FROM `ignor` WHERE `id` = '".$nk."';");
if(mysql_num_rows($sql) != 0){
echo "<b>&#304;qnor Listi:</b> ";
if(mysql_num_rows($sql) > 10)
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;b=2$takep\">".mysql_num_rows($sql)."</a>";
else{
$i=0;
while($friend = mysql_fetch_array($sql))
{
$i++;
$q = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$friend['usid']."';");
$dost = mysql_fetch_array($q);
$frend = $dost['user'];
echo "<u>".$frend."</u>";
if(mysql_num_rows($sql)!=$i){echo ", ";}
}}
echo "<br/>\n";
}


if ($xstatus!=0)echo " - <b>X-Status:</b> <img src=\"img/x-status/".$xstatus.".gif\"/> <u>".$xmesaj."</u><br/>\n";

$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 

echo " - <b>G&#252;nl&#252;k aktivliyi:</b> (<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=akt_us&amp;nk=$nk&amp;ref=$ref\">".$saat_tam.":".$deqiqe."</a>)<br/>"; 
echo $divide;


echo "[<b><anchor>Tam Melumat<go href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid".$takep."\" method=\"post\">";
echo "<postfield name=\"info\" value=\"open\"/>";
echo "</go></anchor></b>]<br/>\n";
print $divide;
$qed = mysql_query("SELECT COUNT(*)  FROM `hediyye_box` WHERE `uid` = '".$nk."';");
$hedi = mysql_result($qed, 0);


echo "<a href=\"hediyye_user.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">[Hediyyeleri]</a>($hedi)<br/>\n";


$qes = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);

echo "<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">[Xatire Defteri]</a>($su)<br/>\n";
echo "<a href=\"friends.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nick=$usid&amp;rm=$rm&amp;ref=$ref\">[Dostluq teklif et]</a><br/>\n";
echo "<a href=\"ignor.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">[&#304;gnor et yazmas&#305;n]</a><br/>\n";
echo "<a href=\"tel.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;r=$ref\">[Tel Modeline bax]</a><br/>\n";
echo "<a href=\"messaje.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">Mesajlarini oxu (500 Bal)</a><br/>";

}
if($mexvi==1){
echo "<b>Bu &#304;stifade&#231;i Mexvidir</b><br/>\n";
}
if(($row["level"] < 4)and($level < 4)){
if($inf["tox"] != 1)echo "<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;$ref\">[&#199;atdan Xaric et]</a><br/>\n";
}
if($inf["tox"] == 1)echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";


echo $divide;
if($time>=time()){
echo "<b>Online</b>: (Saytdad&#305;r.)<br/>\n";

}
else
{
$tkick = time() - $time;

if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

echo "<b>Offline</b>: ($tkick $vaxt evvel &#199;atdan &#231;&#305;x&#305;b.)<br/>\n";
}

if($P_ARR[1]==1 and ($P_ARR[81]==1 or $P_ARR[82]==1 or $P_ARR[83]==1 or $P_ARR[84]==1 or $P_ARR[85]==1 or $P_ARR[86]==1 or $P_ARR[87]==1 or $P_ARR[88]==1)){
echo $divide;
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">Cezaland&#305;r </a></b>I\n";
if($id==1){
echo "<a href=\"auto.php?c=add&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">Auto Panel</a><br/>\n";
echo "Hal Hazirda: ";
if($who=="Bilinmir"){
echo "Bilinmir Harda oldu&#287;u :)<br/>";
}else{
echo "<u>$who</u><br/>";
}
}
}
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
?>