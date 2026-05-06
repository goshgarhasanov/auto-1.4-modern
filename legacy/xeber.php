<?php
switch ($xeberci) {
default:
$cemi_xeber = @mysql_query("SELECT COUNT(*) FROM `xeberler` WHERE tesdiq = '1' order by id;");
$all = @mysql_result($cemi_xeber, 0);

$query = @mysql_query("SELECT * FROM `xeberler` WHERE tesdiq = '1' ORDER BY `id` DESC LIMIT 1;");
if(mysql_num_rows($query) == 0)
{
echo "<a href=\"xeber.php?xeberci=xeber&amp;ref=$ref\">Xeberler</a>: He&#231; bir xeber elave edilmeyib.<br/>";
}

while($user = mysql_fetch_array($query))
{
$xid = $user['id'];
$photo_type = $user['photo'];
$muelliff = $user['yazan'];
$movzu = $user['basliq'];
$xeber = $user['xeber'];
$baxilib = $user['baxilib'];
$qeyd_tarix = $user['qeyd_tarix'];
$bolme_id = $user['bolme_id'];

$m = @mysql_query("SELECT * FROM `users` WHERE id = ".$muelliff.";");
$mue = mysql_fetch_array($m);
$muellif = $mue['user'];
$nk = $mue['id'];

$bolme = @mysql_query("SELECT * FROM `xeber_bolmeler` WHERE id = ".$bolme_id.";");
$bol = mysql_fetch_array($bolme);
$bolme = $bol['bolme'];
$bolme_id = $bol['id'];
     if(empty($photo_type)) 
{
$sekil =  "<img style=\"border-radius: 10px;\" src=\"xeber/xeber_photo/yoxdur.gif\" width=\"60\" height=\"50\" alt=\"image\"/>";
}
else 
{
$sekil =  "<img style=\"border-radius: 10px;\" src=\"image.php?img=xeber/xeber_photo/".$photo_type."\" width=\"60\" height=\"50\" alt=\"image\"/>";
}


echo "<b>Son Xeberler:</b> $sekil <a href=\"xeber.php?xeberci=xeber&amp;ref=$ref\">$movzu</a><br/>\n";
$xeberler = mysql_query("SELECT COUNT(*)  FROM `xeberler_serh` where id_xeber = '".$xid."'");
$cemi_serh = mysql_result($xeberler, 0);

echo "&#350;erh say&#305;:<a href=\"xeber.php?xeberci=xeber&amp;ref=$ref\"> ($cemi_serh)</a><br/>\n";

}
echo "----<br/>";
break;
#---------------------------------------------------------------------------
case 'xeber':
require("inc.php");
$_v->title('Xeberler','center');
$_v->fsize1($fsize1);
echo "<b>Xeberler</b><br/>";
$_v->divide();
$_v->align('left');
echo "<b>Diqqet: En Son Isti-Isti Butun Xeberleri Oxumaq Ucun Saytimizdan Qeydiyyat Kecin ve Dehlizde Xeberler Bolmesine Daxil Olun!</b><br/><b><a href=\"reg.php?ref=$ref\">Qeydiyyat</a></b> Olmaniz Lazimdir!<br/>";

$_v->divide();
echo "<a href=\"index.php?ref=$ref\">Ana Sehife</a> | <a href=\"reghelp.php?ref=$ref\">Qeydiyyat</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
}
?>