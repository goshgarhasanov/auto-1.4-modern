<?php // BY_ErroR!ink

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$user = $row['user'];

if($id!= 1) {
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"access\" title=\"No Access\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!<br/>\n";
print $divide;
mysql_query( "UPDATE users SET kik = '10', whokik = 'Sistem', whykik = 'Get BAsqa Yerde Oynada Nolar! : ErroRlink' WHERE id = '".$id."'" );
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}
ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"Root\" title=\"DaTer Panel\">\n";
echo "<p mode=\"wrap\">\n";
$time = date("H:i");

switch ($go) {
default:
//case 'dat':

echo $fsize1;
print "Dater PaNeL<br/>*****<br/>Bu Panel ile chatdaki linklerin adni deyiwmek mumkundur!!<br/>******<br/>";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=index&amp;ref=$ref\"><b>Giris DaTer</b></a><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=online&amp;ref=$ref\"><b>Online DaTer</b></a><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=dehliz&amp;ref=$ref\"><b>Dehliz DaTer</b></a><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=hesab&amp;ref=$ref\"><b>HeSaB DaTer</b></a><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=isarem&amp;ref=$ref\"><b>iSaRe DaTer</b></a><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=elaqesis&amp;ref=$ref\"><b>Elaqe DaTer</b></a><br/>\n";

echo $fsize2;
break;


case 'elaqesis':
if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/elaqe.dat");
        $number_1 = trim($file[0]);
        $number_2 = trim($file[1]);
        $number_3 = trim($file[2]);
        $number_4 = trim($file[3]);

        echo "<small>Ad,Soyad :  $number_1</small><br/>";
        echo "<small>Nomre,Nomre2 :  $number_2,$number_3</small><br/>";
      echo "<small>Mail :  $number_4</small><br/>";
        echo $divide;
        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"20\"/>  ";
        echo "<small>- Ad,Soyad</small><br/>";
        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"15\"/>";
        echo "<small> -  Nomre</small><br/>";
        echo "<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"15\"/>";
        echo "<small> -  Nomre2</small><br/>";
        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"20\"/>";
        echo "<small> -  Mail</small><br/>";
        echo $divide;


        echo "[<anchor title=\"go\"><small>Melumat&#305; Deyi&#351;</small><go href=\"datpan.php?go=elaqesis&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
        echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
        echo "<postfield name=\"number_3\" value=\"$(number_3$ref)\"/>";
        echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";
    }
    else
    {
        $save = @fopen("file/dat_folder/elaqe.dat", "w");
        $data .= $number_1."\n";
        $data .= $number_2."\n";
        $data .= $number_3."\n";
        $data .= $number_4."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..</small><br/>\n";
    }
break;











case 'hesab':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$donamor = file("file/dater/4.dat");
$a = trim($donamor[0]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>Hesab dater Panel</b>:<br/>\n";
echo $divide;
echo $fsize2;
echo $fsize1;
echo "Dater isare:<br/>\n";
echo $fsize2;
echo "<input size=\"3\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
print $fsize1;
echo " <anchor>Yenile<go href=\"datpan.php?go=hesab&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
</go></anchor><br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u><b>".$row['user']."</b>[ melumat yenilendi! ]</u><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=hesab&amp;ref=$ref\">Hasab dater</a><br/>\n";
echo $fsize2;
file_put_contents('file/dater/4.dat',$aa);
@CHMOD("file/dater/4.dat", 0666);

}
break;
case 'isarem':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$donamor = file("file/dater/5.dat");
$a = trim($donamor[0]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>iSaRe dater Panel</b>:<br/>\n";
echo $divide;
echo $fsize2;
echo $fsize1;
echo "Dater isare:<br/>\n";
echo $fsize2;
echo "<input size=\"3\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
print $fsize1;
echo " <anchor>Yenile<go href=\"datpan.php?go=isarem&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
</go></anchor><br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u><b>".$row['user']."</b>[ melumat yenilendi! ]</u><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=isarem&amp;ref=$ref\">Hasab dater</a><br/>\n";
echo $fsize2;
file_put_contents('file/dater/5.dat',$aa);
@CHMOD("file/dater/5.dat", 0666);

}
break;


case 'index':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$donamor = file("file/dater/1.dat");
$a = trim($donamor[0]);
$b = trim($donamor[1]);
$c = trim($donamor[2]);
$d = trim($donamor[3]);
$e = trim($donamor[4]);
$q = trim($donamor[5]);
$v = trim($donamor[6]);
$x = trim($donamor[7]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>Giris dater Panel</b>:<br/>\n";
echo $ay;
echo $fsize2;

echo $fsize1;
echo "Online:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Nik veya id:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"bb$ref\"  value=\"".$b."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>))))PaRoL:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"cc$ref\"  value=\"".$c."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Daxil OL:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"dd$ref\"  value=\"".$d."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>QeydiyyaT:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"ee$ref\"  value=\"".$e."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Yeni istifadeci:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"qq$ref\"  value=\"".$q."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Yeni gelenler:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"vv$ref\"  value=\"".$v."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Cemi Qeydiyyat:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"xx$ref\"  value=\"".$x."\" emptyok=\"false\"/><br/>\n";
print $ay;
print $fsize1;
echo " <anchor><b>Yenile</b><go href=\"datpan.php?go=index&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
<postfield name=\"bb\" value=\"$(bb$ref)\"/>
<postfield name=\"cc\" value=\"$(cc$ref)\"/>
<postfield name=\"dd\" value=\"$(dd$ref)\"/>
<postfield name=\"ee\" value=\"$(ee$ref)\"/>
<postfield name=\"qq\" value=\"$(qq$ref)\"/>
<postfield name=\"vv\" value=\"$(vv$ref)\"/>
<postfield name=\"xx\" value=\"$(xx$ref)\"/>
</go></anchor><br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u><b>".$row['user']."</b>[ melumat yenilendi! ]</u><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=index&amp;ref=$ref\">index dater</a><br/>\n";
echo $fsize2;
file_put_contents('file/dater/1.dat',$aa."\n".$bb."\n".$cc."\n".$dd."\n".$ee."\n".$qq."\n".$vv."\n".$xx);
@CHMOD("file/dater/1.dat", 0666);
}
break;

case 'dehliz':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$asef = file("file/dater/2.dat");
$a = trim($asef[0]);
$b = trim($asef[1]);
$c = trim($asef[2]);
$d = trim($asef[3]);
$e = trim($asef[4]);
$q = trim($asef[5]);
$v = trim($asef[6]);
$x = trim($asef[7]);
$t = trim($asef[8]);
$o = trim($asef[9]);
$n = trim($asef[10]);
$l = trim($asef[11]);
$z = trim($asef[12]);
$g = trim($asef[13]);
$i = trim($asef[14]);
$m = trim($asef[15]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>Dehliz dater Panel</b>:<br/>*****<br/>\n";
echo "<b>StanDaRT</b> / <b>Sizin ZoVQ</b>:<br/>\n";
echo $ay;
echo $fsize2;

echo $fsize1;
echo "Yenile:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Tanişliq-Online:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"bb$ref\"  value=\"".$b."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>CHAT (Söhbet Otaqları):\n";
echo $fsize2;
echo "<input size=\"10\" name=\"cc$ref\"  value=\"".$c."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>[Şexsi Kabinetim]:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"dd$ref\"  value=\"".$d."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Anketime baxanlar:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"ee$ref\"  value=\"".$e."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Dostlarim:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"qq$ref\"  value=\"".$q."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Mesajlarin:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"vv$ref\"  value=\"".$v."\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<br/>Mektublariniz:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"xx$ref\"  value=\"".$x."\" emptyok=\"false\"/><br/>\n";
//------------ cox idi diye sef salmayim xett qoyuruq -------------//
echo $fsize1;
echo "<br/>MMS Qutusu:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"tt$ref\"  value=\"".$t."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Qalereya:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"oo$ref\"  value=\"".$o."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Kazino oyunlari:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"nn$ref\"  value=\"".$n."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Nick Axtar:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"ll$ref\"  value=\"".$l."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Smaylikler:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"zz$ref\"  value=\"".$z."\" emptyok=\"false\"/><br/>\n";


echo $fsize1;
echo "<br/>Qaydalar:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"gg$ref\"  value=\"".$g."\" emptyok=\"false\"/><br/>\n";


echo $fsize1;
echo "<br/>Statistika:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"ii$ref\"  value=\"".$i."\" emptyok=\"false\"/><br/>\n";

echo $fsize1;
echo "<br/>Yeniler:\n";
echo $fsize2;
echo "<input size=\"10\" name=\"mm$ref\"  value=\"".$m."\" emptyok=\"false\"/><br/>\n";
print $ay;
print $fsize1;
echo " <anchor><b>Yenile</b><go href=\"datpan.php?go=dehliz&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
<postfield name=\"bb\" value=\"$(bb$ref)\"/>
<postfield name=\"cc\" value=\"$(cc$ref)\"/>
<postfield name=\"dd\" value=\"$(dd$ref)\"/>
<postfield name=\"ee\" value=\"$(ee$ref)\"/>
<postfield name=\"qq\" value=\"$(qq$ref)\"/>
<postfield name=\"vv\" value=\"$(vv$ref)\"/>
<postfield name=\"xx\" value=\"$(xx$ref)\"/>
<postfield name=\"tt\" value=\"$(tt$ref)\"/>
<postfield name=\"oo\" value=\"$(oo$ref)\"/>
<postfield name=\"nn\" value=\"$(nn$ref)\"/>
<postfield name=\"ll\" value=\"$(ll$ref)\"/>
<postfield name=\"zz\" value=\"$(zz$ref)\"/>
<postfield name=\"gg\" value=\"$(gg$ref)\"/>
<postfield name=\"ii\" value=\"$(ii$ref)\"/>
<postfield name=\"mm\" value=\"$(mm$ref)\"/>
</go></anchor><br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u><b>".$row['user']."</b>[ melumat yenilendi! ]</u><br/>\n";
echo "<a href=\"datpan.php?id=$id&amp;ps=$ps&amp;go=index&amp;ref=$ref\">index dater</a><br/>\n";
echo $fsize2;
file_put_contents('file/dater/2.dat',$aa."\n".$bb."\n".$cc."\n".$dd."\n".$ee."\n".$qq."\n".$vv."\n".$xx."\n".$tt."\n".$oo."\n".$nn."\n".$ll."\n".$zz."\n".$gg."\n".$ii."\n".$mm);
@CHMOD("file/dater/2.dat", 0666);
}
break;





}

if ($ay) {
echo $fsize1;
echo $divide;
echo "<a href=\"datpan.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">DaTer Panel</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";

echo "<small>M&#252;ellif: <b>ErroR!ink</b></small><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();

?>


