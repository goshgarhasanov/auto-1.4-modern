<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$user=$row["user"];
include("./file/fun/5");

$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."', `user_ip` = '".$REMOTE_ADDR."', `user_soft` = '".$HTTP_USER_AGENT."' WHERE `id` = '".$id."' LIMIT 1;");


if(isset($_POST['gizli']))
{

if((preg_match("/[^0-9a-z]+/",$pwd))or($pwd=="")){
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"gotaq\" title=\"Gizli Otaqa giri&#351;\">\n";
echo "<p align =\"center\">\n";
echo $fsize1;
echo "&#350;ifreniz herif ve ya reqemlerden ibaret olmalidir.<br/>*****<br/>";
echo "<a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=10&amp;ref=$ref\">Geri Qay&#351;t</a><br/>\n";
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
mysql_close($link);
exit;
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"gotaq\" title=\"Gizli Otaqa giri&#351;\">\n";
echo "<p align =\"center\">\n";
echo $fsize1;
echo "Siz Gizli ota&#287;a daxil olursunuz... <br/>Ota&#287;&#305;n &#351;ifresi: <b>$pwd</b><br/>----<br/>";
echo "<b><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;pwd=$pwd&amp;ref=$ref\">Daxil ol</a></b><br/>\n";
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
@$save= fopen("file/control/10.dat", "a+");
$date = date("d.m.y [H:i]",mktime(date ("H")+$xsat));
$qeyd = "".base64_encode("Leqeb <u>$user</u>: - Kod <b>$pwd</b>: <u>$date</u> ")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
mysql_close($link);
exit;
}


$level=$row["level"];


$bal=$row['bal'];
$posts=$row['posts'];
$status=$row['status'];
$ip=$row['user_ip'];
$room=$row['room'];

$levelselect = @mysql_query ("Select name from levels where level='".$level."'");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"otaq\" title=\"Otaqa giri&#351;\">\n";
echo "<p align =\"left\">\n";

echo $fsize1;
echo "Leqeb: <b>$user</b><br/>\n";
echo "Status: <b>$status</b><br/>\n";
if  ($level>3)echo "<u>R&#252;tbeniz</u>: <b>$levelname</b><br/>\n";
if(file_exists("i/".$id.".gif"))echo "<u>Rengli nikiniz var</u>: <img src=\"i/$id.gif\"/><br/>";
else echo "Rengli nikiniz yoxdur <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=nik&amp;ref=$ref\">Sifari&#351; et</a><br/>\n";
echo "Sizin <b>$bal</b>. bal&#305;n&#305;z var <br/>\n";
echo "Hesab&#305;n&#305;zda <b>$posts</b>, post var<br/>\n";

echo "----<br/>\n";
if($rm!="10"){

$rm = trim($rm);

$tm = time();
$res = mysql_query ("Select `user`,`inv`,`sex`,`level`,`room`,`zn` from users WHERE `time` > '".$tm."' and room = '".$rm."' and inv != '3' group by user order by time desc");
if(mysql_num_rows($res) == 0)
{
echo "<i>Otaqda he&#231;kim yoxdur...</i><br/>\n";
}else{

$kol = mysql_affected_rows();
$kol = $kol+1;


for ($k = 1; $k < $kol; $k++)
{
$lines = mysql_fetch_array ($res);
$users = $lines["user"];
$hd = $lines["inv"];
$sex = $lines["sex"];
$rom = $lines["room"];
$zn=$lines['zn'];
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($sex == "1"){$se = "Q";}else{$se = "K";}



if ($hd != 1)
if ($lines["level"] == 9)echo "<b><u>[$zn$users]</u></b>";
elseif ($lines["level"] > 7)echo "$zn<b>$users($se)</b>";
elseif ($lines["level"] > 6)echo "$zn<b>$users($se)</b>";
elseif ($lines["level"] > 5)echo "$zn<u>$users($se)</u>";
elseif ($lines["level"] > 4)echo "$zn<i>$users($se)</i>";
else echo "$zn$users($se)";
elseif ($row["level"] > 6) echo "$zn<img src=\"img/z10.gif\" alt=\".\"/>$users($se)(<b>!</b>)";
else echo "<i><u><img src=\"img/z10.gif\" alt=\".\"/>*****</u></i>";


if (($k+1) != $kol) print ', ';
}
echo "<br/>";
if($kol>1)
unset($lines);




}
echo "----<br/>\n";

}

if ($rm=="10"){
echo "<b>Qeyd</b>: Daxil olduqunuz otaq gizli otaqd&#305;r. Siz bu otaqa daxil olarken bir kod yazmal&#305;s&#305;z ve hemin kodu istediyiniz adama verin o da otaqa girende sizin yazd&#305;&#287;&#305;n&#305;z kodu yazs&#305;n.  Siz eyni otaqa d&#252;&#351;eceksiz. Sizin otaqa ba&#351;qa adamlar gire bilmeyecek (yazd&#305;&#287;&#305;n&#305;z kodu bilmeseler)<br/>****<br/>\n";
echo "<b>Gizli kod</b><br/>\n";
echo $fsize2;
echo "<input name=\"pwd$ref\" value=\"\" title=\"pwd\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Daxil Ol<go href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"pwd\" value=\"$(pwd$ref)\"/>\n";
echo "<postfield name=\"gizli\" value=\"save\"/>\n";
echo "</go></anchor><br/>\n";
}else{
echo "<b><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Daxil ol</a></b><br/>\n";}
echo "****<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize qay&#305;t</a><br/>\n";
echo $fsize2;
echo"</p>";
echo"</card>";
echo"</wml>";
mysql_close($link);
?>
