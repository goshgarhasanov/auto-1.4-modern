<?

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


$select = @mysql_query ("Select id,user,name,sex,time,para,tox,mexvi,level,img from users where id='".$nk."' and banned!='2'");

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



$levelselect = @mysql_query ("Select name from levels where level='".$level."'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];


ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"info\" title=\"$nick haqq&#305;nda\">\n";

echo "<p align=\"left\" mode=\"wrap\">\n";
echo $fsize1;
echo "<b><a href=\"reytinq.php?id=$id&amp;ps=$ps$takep\">Lider Ol</a></b><br/>*****<br/>\n";
echo "<a href=\"mektub.php?bol=yaz&amp;id=$id&amp;ps=$ps&amp;to=$nick$takep\">Mektub Yaz</a><br/>\n";

echo $divide;


echo "<b>-Nick:</b> $nick<br/>\n";
echo "-Nike <a href=\"ses.php?mod=votes1&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">1</a>-";
echo "<a href=\"ses.php?mod=votes5&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">5</a>-";
echo "<a href=\"ses.php?mod=votes10&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;rm=$rm&amp;ref=$ref\">10</a> Ses Ver!<br/>";
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
if($level>3)echo "<b>-R&#252;tbe: <u>$levname</u></b><br/>\n";


if($para!="")echo "<u>-Heyat yolda&#351;&#305;:</u> <b>$para</b> <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$para&amp;rm=$rm&amp;$ref\"><img src=\"img/uzuk.gif\"/></a><br/>\n";

echo $divide;
if(($mexvi!=1)or($row["level"]==9)){
if($time>=time()){
echo "<b>Online</b>: <img src=\"img/online.gif\"/><br/>\n";

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

echo "<b>Offline</b>: <img src=\"img/offline.gif\"/>\n";
echo "<i>($tkick $vaxt evvel &#199;atdan &#231;&#305;x&#305;b.)</i><br/>\n";
}
echo $divide;

}


$qed = mysql_query("SELECT COUNT(*)  FROM `hediyye_box` WHERE `uid` = '".$nk."';");
$hedi = mysql_result($qed, 0);

$qes = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';");
$su = mysql_result($qes, 0);
echo "[<a href=\"padarka.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">Hediyyeleri</a>($hedi)]<br/>\n";
echo "[<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;$ref\">Xatire Defteri</a>($su)]<br/>\n";
if(($mexvi!=1)or($row["level"]>7)){

echo "<b>[<a href=\"tel.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;rm=$rm&amp;ref=$ref\">Tel Modeline bax</a>]</b><br/>\n";
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


echo $divide;

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\" accesskey=\"0\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close ($link);
ob_end_flush();
?>
