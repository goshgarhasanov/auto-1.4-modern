<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if(isset($_POST['info']))
{
include("./file/require/inside");
exit;
}

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";


$select = @mysql_query ("Select * from users where id='".$nk."' and banned != '2'");

if (mysql_affected_rows() == 0){
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\" ontimer=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\"><timer value=\"15\"/>";
echo "<p align=\"center\">";
echo $fsize1;
echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>";
echo "*****<br/>";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
exit;
}

$inf = mysql_fetch_array ($select);
$usid=$inf["id"];
$nick = $inf["user"];
$name = $inf["name"];
$sex = $inf["sex"];
$time = $inf["time"];
$nastroi = $inf["nastroi"];
$para = $inf["para"];
$tox=$inf["tox"];
$mexvi=$inf["mexvi"];
$level=$inf["level"];
$img=$inf["img"];
$zn=$inf["zn"];
$qefes=$inf["qefes"];
$xstatus=$inf["xstatus"];

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


$levelselect = @mysql_query ("Select name from levels where level='".$level."'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];


ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"info\" title=\"$nick haqq&#305;nda\">\n";

if ($nk==2){
echo "<p align=\"center\" mode=\"wrap\">\n";
echo $fsize1;
echo "Siz suallara cavab vermekle--&#350;agird 0-100 cavab, Telebe 100-500 cavab, Bakalavr 500-1000 cavab,Magistr 1000-2000 cavab, Doktora Namized 2000-5000 cavab, Elmler Doktoru 5000-7000 cavab, Kelle Bala 7000 cavabdan &#231;ox toplad&#305;qda bu statuslara sahib ola bilersiniz.<br/> <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=10&amp;ref=$ref\">Elave Melumat</a><br/>\n";
}else if ($nk==3){
echo "<p align=\"center\" mode=\"wrap\">\n";
echo $fsize1;
echo "Men Otaqlara maraql&#305; melumatlar verirem...<br/>\n";
}else if ($nk==4){
echo "<p align=\"center\" mode=\"wrap\">\n";
echo $fsize1;
echo "Men Botam otaqda verilen suallara cavab sat&#305;ram.<br/>\n";
}else if ($nk==6){
echo "<p align=\"center\" mode=\"wrap\">\n";
echo $fsize1;
echo "Men botam. Vezifem &#304;stifade&#231;iler terefinden elave edilmi&#351; anekdotlar&#305;, otaqdaa yazmaqd&#305;r.<br/> Menimde i&#351;im g&#252;c&#252;m budu :))<br/>\n";
}else if ($nk==7){
echo "<p align=\"center\" mode=\"wrap\">\n";
echo $fsize1;
echo "Men chatda tehl&#252;kesizliye bax&#305;ram. B&#252;t&#252;n istifade&#252;ilerin tehl&#252;kesizliyi menden as&#305;l&#305;d&#305;r. Eger kiminse nikinden istifade olunsa men o deq xeber verirem...<br/> Menim xidmetimden yararlanmaq istemirsizse dehlizde olan &#351;exsi kabnetde yerle&#351;en qur&#287;ular b&#246;lmesindan tehl&#252;kesizliyi deaktiv edin...<br/>\n";
} else {
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
echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm$takep\">Geri qay&#305;t</a><br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"0\">Chata qayit</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
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
echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm$takep\">Geri qay&#305;t</a><br/>\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"0\">Chata qayit</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
exit;
}


@mysql_query ("Select * from ignor where usid=".$id." and id='".$nk."'");
if (mysql_affected_rows()!=0){
echo $fsize1;
echo "<b>".$nick."</b> sizi iqnor edib...<br/>Bu o demekdir kim <u>".$nick."</u> Sizinle dan&#305;&#351;maq istemir!<br/>*****<br/>\n";
}
else
{
echo $fsize1;
if((isset($rm))&&($rm!="")){
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

echo "$zn<b>".$nick."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"msg$ref\" maxlength=\"300\" title=\"Text\"/><br/>\n";

if(($row["say"]==1)||($mod=="privat")){
echo "<select name=\"prvt\">\n";
if ($nk!==$id)echo "<option value=\"1\">&#350;exsi</option>\n";
echo "<option value=\"0\">&#220;mumi </option>\n";
echo "</select><br/>\n";
} else {
echo "<select name=\"prvt\">\n";
if ($nk!=5)echo "<option value=\"0\">&#220;mumi </option>\n";
if ($nk!==$id)echo "<option value=\"1\">&#350;exsi</option>\n";
echo "</select><br/>\n";
}


if($row["level"] > 4)
{
echo "<select name=\"shr$ref\" multiple=\"true\">\n";
if ($row["level"]!=6)echo "<option value=\"2\">Alt&#305; Xetli</option>\n";
if ($row["level"]>5)echo "<option value=\"1\">Kursiv</option>\n";
if ($row["level"]>6)echo "<option value=\"3\">Qal&#305;n</option>\n";
if ($row["level"]>8)echo "<option value=\"4\">B&#246;y&#252;k</option>\n";
echo "</select><br/>\n";

}
echo $fsize1;
echo "<anchor title=\"send\">G&#246;nder<go href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" method=\"post\">\n";
echo "<postfield name=\"msg\" value=\"$nick, $(msg$ref)\"/>";
if ($row["level"]>=4)echo "<postfield name=\"shr\" value=\"$(shr$ref)\"/>\n";
echo "<postfield name=\"towhom\" value=\"$usid\"/>\n";
echo "<postfield name=\"prvt\" value=\"$(prvt)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>\n";
echo "<a href=\"mektub.php?bol=yaz&amp;id=$id&amp;ps=$ps&amp;to=$nick&amp;rm=$rm$takep\">Mektub Yaz</a><br/>\n";

}
else
{
echo "<a href=\"mektub.php?bol=yaz&amp;id=$id&amp;ps=$ps&amp;to=$nick$takep\">Mektub Yaz</a><br/>\n";
}

echo $divide;
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kimi` = '".$nk."';");
$who = mysql_result($q, 0);
echo "<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">Beyenenler</a>($who)<br/>";
echo "<anchor title=\"go\">Beyenirem<go href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=add&amp;rm=$rm&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$nick\"/>";
echo "</go></anchor>(<b>5</b> bal)<br/>";
echo $divide;
echo "<a href=\"mirt.php?go=gozvur&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;ref=$ref\">G&#246;z Vur</a>(<b>5</b> bal)<br/>";
echo "<a href=\"mirt.php?go=opus&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;ref=$ref\">&#214;p&#252;&#351; G&#246;nder</a>(<b>10</b> bal)<br/>";
echo "<a href=\"mirt.php?go=durt&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;ref=$ref\">D&#252;rtmele</a>(<b>15</b> bal)<br/>";
echo $divide;
if ($qefes!="0"){
echo "<u>Virtual Qefes</u>, i&#351;tirak&#231;&#305;s&#305;...<br/>\n";
if($qefes==3)echo "Me&#287;lub olub<br/>\n";
else
echo "[<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;login=$nick&amp;$ref\">Ses ver</a>]<br/>\n";
echo $divide;
}
if (eregi("nak", $inf["zn"]))
echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";
else
echo "<b>-Nick:</b> $nick<br/>\n";
echo "-Nike <a href=\"ses.php?mod=votes1&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">1</a>-";
echo "<a href=\"ses.php?mod=votes5&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">5</a>-";
echo "<a href=\"ses.php?mod=votes10&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">10</a> Ses Ver!<br/>";
echo "-<a href=\"plaint.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">&#350;ikayet Et!</a><br/>";
echo "<b>-ID:</b> $nk<br/>\n";

echo "<b>-Ad&#305;:</b> $name<br/>\n";

if($img!="0"){
echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Foto Albom</a> ($img)<br/>\n";
}
else
{
echo "<u>&#350;ekili Yoxdur</u><br/>\n";
}
if($nastroi!="") echo "<b>-Ehval&#305;:</b> $nastroi<br/>\n";
if ($sex=="0")echo "<b>-Cinsi:</b> Ki&#351;i<br/>\n";
else if ($sex=="1")echo "<b>-Cinsi:</b> Qad&#305;n<br/>\n";
if(($level>3)&&($mexvi=="0"))echo "<b>-R&#252;tbe: <u>$levname</u></b><br/>\n";
if ($xstatus!=0)echo "<b>-X-Status:</b> <img src=\"img/x-status/".$xstatus.".gif\"/> <u>".$xmesaj."</u><br/>\n";


if($para!="")echo "<u>-Heyat yolda&#351;&#305;:</u> <b>$para</b> <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$para&amp;rm=$rm&amp;$ref\"><img src=\"img/uzuk.gif\"/></a><br/>\n";

echo $divide;
if(($mexvi!=1)or($row["level"]==9)){
if($time>=time()){
echo "<b>Online</b>: <u>Hal-haz&#305;rda Saytdad&#305;r...</u><br/>\n";

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

echo "<b>Offline</b>: <i>($tkick $vaxt evvel &#199;atdan &#231;&#305;x&#305;b.)</i><br/>\n";

}
echo $divide;

}


$qed = mysql_query("SELECT COUNT(*)  FROM `hediyye_box` WHERE `uid` = '".$nk."';");
$hedi = mysql_result($qed, 0);


echo "[<a href=\"hediyye_user.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;r=$ref\">Hediyyeleri</a>($hedi)]<br/>\n";


$qes = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);
echo "[<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Xatire Defteri</a>($su)]<br/>\n";
if(($mexvi!=1)or($row["level"]>7)){

echo "<b>[<a href=\"tel.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;r=$ref\">Tel Modeline bax</a>]</b><br/>\n";
echo "[<b><anchor>Tam Melumat<go href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;re=$ref\" method=\"post\">";
echo "<postfield name=\"info\" value=\"open\"/>";
echo "</go></anchor></b>]<br/>\n";
}
if($mexvi==1)echo "<b>Bu &#304;stifade&#231;i Mexvidir</b><br/>\n";

echo "----<br/>\n";
if(($rm!=9)&&$row["level"]>3){
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">Cezaland&#305;r</a></b><br/>\n";
}
echo "<a href=\"ignor.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">&#304;gnor et(he&#231;ne yazmas&#305;n)</a><br/>\n";
echo "<a href=\"friends.php?mod=add&amp;id=$id&amp;ps=$ps&amp;nick=$usid&amp;rm=$rm&amp;ref=$ref\">Dostlara elave et</a><br/>\n";



if(($row["level"] < 4)and($level < 4)){
echo $divide;
if($inf["tox"] != 1)echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$usid&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";
}
if($inf["tox"] == 1)echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
}
echo $divide;

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"0\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
?>
