<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$user = $row['user'];
FUNCTION DHMS_TIME($NEW)
{
    $NEW    = $NEW - TIME();
    $DAY    = @FLOOR($NEW / 86400);
    $HOUR   = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
    $MINUT  = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
    $SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
    $DAY    = ($DAY!=0) ? $DAY." g&#252;n " : FALSE;
    $HOUR   = ($HOUR!=0) ? $HOUR." saat " : FALSE;
    $MINUT  = ($MINUT!=0) ? $MINUT." deq " : FALSE;
    $SECOND = ($SECOND!=0) ? $SECOND." san" : FALSE;
    RETURN $DAY.$HOUR.$MINUT.$SECOND;
}
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
echo "<card id=\"Root\" title=\"ErroR_1.4 Panel\">\n";
echo "<p mode=\"wrap\">\n";
$time = date("H:i");

switch ($go) {

case 'error':

echo $fsize1;

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=fm&amp;ref=$ref\"><big>FAYL/MeNeCeR</big></a><br/>\n";
print $divide;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=bonus&amp;ref=$ref\"><b>Qeydiyyat bonus1.4</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=chatonline&amp;ref=$ref\"><b>Onlaynda olanlar</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=yonelt&amp;ref=$ref\"><b>Qeydiyyat Yonelt</b></a><br/>\n";

echo  "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qeyqay&amp;ref=$ref\"><b>Qeydiyyat Novu</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=rutbe_panel&amp;ref=$ref\"><b>Rutbe  PaneL</b></a><br/>\n";

echo "<b><a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qayda&amp;ref=$ref\">Qayda Panel</a></b><br/>\n"; 
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=l&amp;ref=$ref\"><b>LoGo PaneL</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=skript_panel&amp;ref=$ref\"><b>Skript Panel</b></a><br/>\n";

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=rga&amp;ref=$ref\"><b>ReG Panel !</b></a><br/>\n";

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=mega_panel&amp;ref=$ref\"><b>MeQa Panel</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=snick_panel&amp;ref=$ref\"><b>Super Nick Panel</b></a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=dost-p&amp;ref=$ref\">Dost Panel</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=iqnor-p&amp;ref=$ref\">Iqnor Panel</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=znak_panel&amp;ref=$ref\">Znak Panel</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=spammer&amp;ref=$ref\">Qeydiyyat Spam</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=logp&amp;ref=$ref\"><b>LoGin panel</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=deyp&amp;ref=$ref\"><b>Deyisme panel</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=sfrp&amp;ref=$ref\"><b>Sifirla panel</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=dehcinsp&amp;ref=$ref\"><b>IsaRe panel</b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepiy&amp;ref=$ref\"><b>QePiY panel</b></a><br/>\n";

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=hedyp&amp;ref=$ref\"><b>Hediyyeler ver panel</b></a><br/>\n";

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=silgi_ishleri&amp;ref=$ref\"><b>Silgi Panel</b></a><br/>";
echo "<a href=\"onoff.php?id=$id&amp;ps=$ps&amp;go=online_bot\">On/Off Bot Panel</a><br/>\n";

echo $fsize2;

break;



case "sfrp":
echo $fsize1;
echo $divide;
echo "<b>Sifirlama isleri)))</b><br/>";
echo $divide;


echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=pla&amp;ref=$ref\">Gunluk Post S&#305;f&#305;rla</a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=pl&amp;ref=$ref\">Postlari S&#305;f&#305;rla</a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=bl&amp;ref=$ref\">Ballari S&#305;f&#305;rla</a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=xl&amp;ref=$ref\">Xallari S&#305;f&#305;rla</a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=ql&amp;ref=$ref\">Qepiyleri S&#305;f&#305;rla</a><br/>";

echo $fsize2;



break;


case "qepiy":
echo $fsize1;

echo "<b>!! QePiT PaNeL</b><br/>";
echo $ay;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepgonder&amp;ref=$ref\">Kime qepiy?</a><br/>";
echo $ay;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepiy1&amp;ref=$ref\">Konturla Qepiy</a><br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepiy2&amp;ref=$ref\">Bal ile qepiy</a><br/>";

echo $fsize2;
break;

case 'qepiy1';
if(!isset($_POST['action']))
    {
        $file = @file("file/qepiy/kont.dat");
        $number_1 = trim($file[0]);
                $number_2 = trim($file[1]);
                $number_3 = trim($file[2]);
                $number_4 = trim($file[3]);
                $number_5 = trim($file[4]);
                $number_6 = trim($file[5]);
                $number_7 = trim($file[6]);
                $number_8 = trim($file[7]);
        echo "<small>Qepiy Yukleme Qiymetleri <u>Kontur</u></small><br/>\n";
        echo $divide;
                echo "<small>$number_1 Azn-e :</small>";
        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"3\"/><small> - Qepiy</small><br/> ";
                echo "<small>$number_3 Azn-e :</small>";
        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"3\"/><small> - Qepiy</small><br/> ";
            echo "<small>$number_5 Azn-e :</small>";
        echo "<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"3\"/><small> - Qepiy</small><br/> ";
            echo "<small>$number_7 Azn-e :</small>";
        echo "<input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"3\"/><small> - Qepiy</small><br/> ";

                echo $divide;
        echo "Yenile<anchor title=\"go\">&#xbb;&#xbb;<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepiy1&amp;$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(1\"/>";
                echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
                echo "<postfield name=\"number_3\" value=\"$(2\"/>";
                echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
                echo "<postfield name=\"number_5\" value=\"$(3\"/>";
                echo "<postfield name=\"number_6\" value=\"$(number_6$ref)\"/>";
                echo "<postfield name=\"number_7\" value=\"$(5\"/>";
                echo "<postfield name=\"number_8\" value=\"$(number_8$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor><br/>";
    }
    else
    {
        $save = @fopen("file/qepiy/kont.dat", "w");
        $data .= $number_1."\n";
        $data .= $number_2."\n";
        $data .= $number_3."\n";
        $data .= $number_4."\n";
        $data .= $number_5."\n";
        $data .= $number_6."\n";
        $data .= $number_7."\n";
        $data .= $number_8."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Qiymetler Ugurla Yenilendi</small><br/>\n";
    }

break;

case 'qepiy2';
if(!isset($_POST['action']))
    {
        $file = @file("file/qepiy/exchange.dat");
        $number_1 = trim($file[0]);
                $number_2 = trim($file[1]);
                $number_3 = trim($file[2]);
                $number_4 = trim($file[3]);
                $number_5 = trim($file[4]);
                $number_6 = trim($file[5]);
        echo "<small>Exchange  <u>Qepiy</u></small><br/>\n";
        echo $divide;
                echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"4\"/><small> - Bal  > </small>";
        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"3\"/><small> - qepiy</small><br/> ";

                echo "<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"4\"/><small> - Bal  > </small>";
        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"3\"/><small> - qepiy</small><br/> ";

            echo "<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"4\"/><small> - Bal  > </small>";
        echo "<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"3\"/><small> - qepiy</small><br/> ";

                echo $divide;
        echo "<small>Yenile</small> <anchor title=\"go\"><small>&#xbb;&#xbb;</small><go href=\"error.php?id=$id&amp;ps=$ps&amp;go=qepiy2&amp;$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
                echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
                echo "<postfield name=\"number_3\" value=\"$(number_3$ref)\"/>";
                echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
                echo "<postfield name=\"number_5\" value=\"$(number_5$ref)\"/>";
                echo "<postfield name=\"number_6\" value=\"$(number_6$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor><br/>";
    }
    else
    {
        $save = @fopen("file/qepiy/exchange.dat", "w");
        $data .= $number_1."\n";
        $data .= $number_2."\n";
        $data .= $number_3."\n";
        $data .= $number_4."\n";
        $data .= $number_5."\n";
        $data .= $number_6."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Qiymetler Ugurla Yenilendi</small><br/>\n";
    }

break;


case 'slhpp':
if(!isset($_POST['EH']))
{
echo "Butun istifadechilere Sual cavab gonder !<br/>----<br/>";
echo "Sual cavab miqdari<br/>";
echo "<input type=\"text\" name=\"credits$ref\" value=\"\" maxlength=\"500\"/><br/>";
echo "
<anchor>Gonder<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=slhpp&amp;ref=$ref\" method=\"post\">
<postfield name=\"credits\" value=\"$(credits$ref)\"/>
<postfield name=\"EH\" value=\"ok\"/>
</go></anchor><br/>";
}
else
{
$credits = trim(htmlspecialchars(mysql_escape_string($_POST['credits'])));

$EH = mysql_query("SELECT * FROM `users` ;");
while($eyyub_hesenov_designer = mysql_fetch_array($EH))
{
$uid = $eyyub_hesenov_designer['id'];
mysql_query("UPDATE `users` SET `credits` = `credits` + ".$credits." WHERE `id` = '".$uid."' ;");
}

echo "Tebrikler <b>".$credits."</b> Sual cavab butun istifadechilerin hesablarina elave olundu.<br/>";
}
break;


case 'dehcinsp':
if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/isare.dat");
        $number_1 = trim($file[0]);
        $number_2 = trim($file[1]);
        $number_3 = trim($file[2]);
        echo "<small>Dehlizdeki Duzelisler (Design)</small><br/>\n";
        echo $divide;
        echo "<small>Isare :  $number_1</small><br/>";
        echo $divide;
        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"10\"/>  ";
        echo "<small>- Isare(kodlu halin yazin!)</small><br/>";
        echo $divide;
        echo "[<anchor title=\"go\"><small>Melumat&#305; Deyi&#351;</small><go href=\"error.php?go=dehcinsp&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";
    }
    else
    {
        $save = @fopen("file/dat_folder/isare.dat", "w");
        $data .= $number_1."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..</small><br/>\n";
    }
break;





case "hedyp":
echo $fsize1;
echo $divide;
echo "<b>hediyye isleri)))</b><br/>";
echo $divide;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=ph&amp;ref=$ref\">Ham&#305;ya Post Hediyye</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=bh&amp;ref=$ref\">Ham&#305;ya Bal Hediyye</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=xh&amp;ref=$ref\">Ham&#305;ya Xal Hediyye</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=slhpp&amp;ref=$ref\">Ham&#305;ya Cavab Hediyye</a><br/>\n";

echo $fsize2;

break;


case 'dost-p':
echo $fsize1;
echo "<b>Dost Paneli</b><br/>*****<br/>\n";
echo "ID:<br/>\n";
echo $fsize2;
echo "<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "Dost ID:<br/>\n";
echo $fsize2;
echo "<input name=\"dost$ref\" maxlength=\"40\" value=\"\" title=\"dost\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">Elave et<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=go-dost-p&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nik\" value=\"$(nik$ref)\"/>\n";
echo "<postfield name=\"dost\" value=\"$(dost$ref)\"/>\n";
echo "</go></anchor><br/>---<br/>\n";
echo "<anchor title=\"go\">Cixart<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=un-dost-p&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"nik\" value=\"$(nik$ref)\"/>\n";
echo "<postfield name=\"dost\" value=\"$(dost$ref)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
break;




 case 'iqnor-p':

 echo $fsize1;
 echo "<b>Iqnor Paneli</b><br/>*****<br/>\n";
 echo "ID:<br/>\n";
 echo $fsize2;
 echo "<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"false\"/><br/>\n";
 echo $fsize1;
 echo "Dost ID:<br/>\n";
 echo $fsize2;
 echo "<input name=\"ignor$ref\" maxlength=\"40\" value=\"\" title=\"iqnor\" emptyok=\"false\"/><br/>\n";
 echo $fsize1;
 echo "<anchor title=\"go\">Elave et<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=go-iqnor-p&amp;ref=$ref\" method=\"post\">\n";
 echo "<postfield name=\"nik\" value=\"$(nik$ref)\"/>\n";
 echo "<postfield name=\"ignor\" value=\"$(ignor$ref)\"/>\n";
 echo "</go></anchor><br/>---<br/>\n";
 echo "<anchor title=\"go\">Cixart<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=un-iqnor-p&amp;ref=$ref\" method=\"post\">\n";
 echo "<postfield name=\"nik\" value=\"$(nik$ref)\"/>\n";
 echo "<postfield name=\"ignor\" value=\"$(ignor$ref)\"/>\n";
 echo "</go></anchor><br/>\n";
 echo $fsize2;

 break;


case 'go-iqnor-p':

$select = mysql_query ("Select id,user from users where id = '".$nik."'");
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "ID duzgun deyil!<br/>-=-<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array ($select);
$nick1 = $inf["user"];
$usid1 = $inf["id"];

$select = mysql_query ("Select id,user from users where id = '".$ignor."'");
if (mysql_affected_rows() == 0) {
echo $fsize1;
echo "Dost ID duzgun deyil!<br/>-=-<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo $fsize2;
break;
}
$inf = mysql_fetch_array ($select);
$nick2 = $inf["user"];
$usid2 = $inf["id"];

mysql_query ("Insert into ignor set id='".$usid1."', usid='".$usid2."'");
echo $fsize1;
echo "$nick2 <u>$nick1</u> leqebinin iqnor siyahisina elave olundu.<br/>\n";
echo $fsize2;

break;


 case 'un-iqnor-p':

 $select = mysql_query ("Select id,user from users where id = '".$nik."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick1 = $inf["user"];
 $usid1 = $inf["id"];

 $select = mysql_query ("Select id,user from users where id = '".$ignor."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "Dost ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick2 = $inf["user"];
 $usid2 = $inf["id"];

 @mysql_query ("Delete from ignor where usid ='".$usid2."' and id = '".$usid1."'");
 echo $fsize1;
 echo "$nick2 <u>$nick1</u> leqebinin iqnor siyahisindan silindi.<br/>\n";
 echo $fsize2;

 break;


case 'go-dost-p':

 $select = mysql_query ("Select id,user from users where id = '".$nik."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick1 = $inf["user"];
 $usid1 = $inf["id"];

 $select = mysql_query ("Select id,user from users where id = '".$dost."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "Dost ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick2 = $inf["user"];
 $usid2 = $inf["id"];

 mysql_query ("Insert into friends set id='".$usid1."', usid='".$usid2."'");
 echo $fsize1;
 echo "$nick2 <u>$nick1</u> leqebinin dostlar siyahisina elave olundu.<br/>\n";
 echo $fsize2;

 break;


 case 'un-dost-p':

 $select = mysql_query ("Select id,user from users where id = '".$nik."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick1 = $inf["user"];
 $usid1 = $inf["id"];

 $select = mysql_query ("Select id,user from users where id = '".$dost."'");
 if (mysql_affected_rows() == 0) {
 echo $fsize1;
 echo "Dost ID duzgun deyil!<br/>-=-<br/>\n";
 echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
 echo $fsize2;
 break;
 }
 $inf = mysql_fetch_array ($select);
 $nick2 = $inf["user"];
 $usid2 = $inf["id"];

 @mysql_query ("Delete from friends where usid ='".$usid2."' and id = '".$usid1."'");
 echo $fsize1;
 echo "$nick2 <u>$nick1</u> leqebinin dostlar siyahisindan cixartildi.<br/>\n";
 echo $fsize2;

 break;



case "deyp":

echo $fsize1;
print $divide;
echo "<b>Deyisme isleri)))</b><br/>";
print $divide;

echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=postu&amp;ref=$ref\">Ham&#305;n&#305;n Postunu Deyi&#351;</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=balu&amp;ref=$ref\">Ham&#305;n&#305;n Bal&#305;n&#305; Deyi&#351;</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=xalu&amp;ref=$ref\">Ham&#305;n&#305;n Xal&#305;n&#305; Deyi&#351;</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=qopu&amp;ref=$ref\">Ham&#305;n&#305;n Qepiyini Deyi&#351;</a><br/>\n";


echo $fsize2;

break;








case "logp":
    if(!isset($_POST['action']))
    {



        $file = @file("file/dat_folder/login.dat");
        $file1 = @file("file/dat_folder/sifre.dat");
        $file3 = @file("file/dat_folder/sifreuser.dat");


        $file4 = @file("file/dat_folder/login2.dat");
        $file5 = @file("file/dat_folder/sifre2.dat");
        $file6 = @file("file/dat_folder/sifreuser2.dat");


        $file7 = @file("file/dat_folder/login3.dat");
        $file8 = @file("file/dat_folder/sifre3.dat");
        $file9 = @file("file/dat_folder/sifreuser3.dat");

        $number_1 = trim($file[0]);
        $number_2 = trim($file1[0]);
        $number_3 = trim($file3[0]);

        $number_4 = trim($file4[0]);
        $number_5 = trim($file5[0]);
        $number_6 = trim($file6[0]);


        $number_7 = trim($file7[0]);
        $number_8 = trim($file8[0]);
        $number_9 = trim($file9[0]);

        echo "Login : ";

        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"15\"/><br/> ";
        echo " Sifre : ";
        echo " <input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"15\"/><br/>";
        echo "Kime :";
        echo " <input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"1\"/><small> (Idle) </small><br/>";

        echo $divide;

        echo "Login : ";

        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"15\"/><br/> ";
        echo " Sifre : ";
        echo " <input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"15\"/><br/>";
        echo "Kime :";
        echo " <input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"1\"/><small> (Idle) </small><br/>";

        echo $divide;
        echo "Login : ";

        echo "<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"15\"/><br/> ";
        echo " Sifre : ";
        echo " <input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"15\"/><br/>";
        echo "Kime :";
        echo " <input type=\"text\" name=\"number_9$ref\" value=\"".$number_9."\" size=\"1\"/><small> (Idle) </small><br/>";

        echo $divide;
        echo "[<anchor title=\"go\">Melumat&#305; Deyi&#351;<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=logp&amp;ref=$ref&amp;act=del\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
        echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
        echo "<postfield name=\"number_3\" value=\"$(number_3$ref)\"/>";
        echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
        echo "<postfield name=\"number_5\" value=\"$(number_5$ref)\"/>";
        echo "<postfield name=\"number_6\" value=\"$(number_6$ref)\"/>";
        echo "<postfield name=\"number_7\" value=\"$(number_7$ref)\"/>";
        echo "<postfield name=\"number_8\" value=\"$(number_8$ref)\"/>";
        echo "<postfield name=\"number_9\" value=\"$(number_9$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";


echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";

    }
    else
    {






        $save = @fopen("file/dat_folder/login.dat", "w");
        $save1 = @fopen("file/dat_folder/sifre.dat", "w");
        $save3 = @fopen("file/dat_folder/sifreuser.dat", "w");
        $save4 = @fopen("file/dat_folder/login2.dat", "w");
        $save5 = @fopen("file/dat_folder/sifre2.dat", "w");
        $save6 = @fopen("file/dat_folder/sifreuser3.dat", "w");
        $save7 = @fopen("file/dat_folder/login3.dat", "w");
        $save8 = @fopen("file/dat_folder/sifre3.dat", "w");
        $save9 = @fopen("file/dat_folder/sifreuser3.dat", "w");
        $data .= $number_1."\n";
        $data1 .= $number_2."\n";
        $data3 .= $number_3."\n";
        $data4 .= $number_4."\n";
        $data5 .= $number_5."\n";
        $data6 .= $number_6."\n";
        $data7 .= $number_7."\n";
        $data8 .= $number_8."\n";
        $data9 .= $number_9."\n";
        @fwrite($save, $data);
        @fwrite($save1, $data1);
        @fwrite($save3, $data3);
        @fwrite($save4, $data4);
        @fwrite($save5, $data5);
        @fwrite($save6, $data6);
        @fwrite($save7, $data7);
        @fwrite($save8, $data8);
        @fwrite($save9, $data9);
        @fflush($save);
        @fflush($save1);
        @fclose($save);
        @fclose($save1);
        @fclose($save3);
        @fflush($save3);
        @fclose($save4);
        @fflush($save4);
        @fclose($save5);
        @fflush($save5);
        @fclose($save6);
        @fflush($save6);
        @fclose($save7);
        @fflush($save7);
        @fclose($save8);
        @fflush($save8);
        @fclose($save9);
        @fflush($save9);
        echo "Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
    }
    break;


case 'cookie_panel':
if($id!=1){
echo $fsize1;
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
echo $fsize2;
break;
}
echo $fsize1;
echo "<b>Cookie Panel</b> |\n";
echo "<a href=\"error.php?go=cookie_panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a><br/>\n";
echo $divide;
echo $fsize2;

if($del!=""){
if($id==1){
mysql_query("DELETE FROM cookie_ban WHERE id='".$del."'");
}
}
echo $fsize1;

$c4n4pl4_cookie = mysql_query("SELECT COUNT(`id`) FROM `cookie_ban` WHERE `acar` = '0';");
$num = mysql_result($c4n4pl4_cookie, 0);
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;


$r = mysql_query ("select id,cookie,uid,tarix from cookie_ban where `acar` = '0' order by id desc limit $o,$do");
if(mysql_affected_rows() == false)
{
echo "Cookie-de He&#231;kes yoxdur.<br/>\n";
}
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$sid=$arr['id'];
$usid=$arr['uid'];
$tarix=$arr['tarix'];

$select = @mysql_query("Select id,user from users where id='".$usid."'");
$inf = mysql_fetch_array($select);
$uid = $inf['id'];
$login = $inf['user'];

echo "<b>$i</b>) <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$uid."&amp;ref=$ref\">".$login."</a>(".date("d.m.y | H:i", $tarix).")\n";

echo "- [<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=cookie_panel&amp;del=$sid&amp;ref=$ref\">x</a>]<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide;
echo "<a href=\"error.php?go=cookie_panel&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"hesab.php?go=cookie_panel&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}

if($num>0){
echo $divide;
echo "&#220;mumi Cookie: <b>$num</b><br/>";
}
echo $fsize2;


break;



























case 'spammer';


if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/spam.dat");
        $number_1 = trim($file[0]);
        $number_2 = trim($file[1]);			
        echo "<small>Qeydiyyat Spam Duzelisler</small><br/>\n";
        echo $divide;
		echo "<small>1 Nefer Maximum </small>";
        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"2\"/>-<small>Nik Aca Bilir</small><br/> ";
        echo $divide;
		echo "<small>Novbeti Qeydiyyat Ucun </small>";
        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"2\"/>-<small>Saniye Gozlemelidir</small><br/> ";
        echo $divide;
        echo "[<anchor title=\"go\"><small>Melumat&#305; Deyi&#351;</small><go href=\"error.php?go=spammer&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
		echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";
    }
    else
    {
        $save = @fopen("file/dat_folder/spam.dat", "w");
        $data .= $number_1."\n";	
        $data .= $number_2."\n";		
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..</small><br/>\n";
    }


break;

















case 'znak_panel':
if($id!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;

echo "<b>Znak Panel</b>:<br/>\n";
echo $divide;

echo "[<a href=\"error.php?go=znak_qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Znak qiymet</a>]<br/>";
echo "[<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;go=bonus&amp;ref=$ref\">Znak elave et</a>]<br/>";

echo $fsize2;

break;

case 'znak_qiymet':
if($id!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}

if(!$_POST['saat']){
$sto = file("file/dat_folder/znak.dat");
$saato = trim($sto[0]);
$saatio = trim($sto[1]);
$guno = trim($sto[2]);
$gunio = trim($sto[3]);
$guny = trim($sto[4]);
$oun = trim($sto[5]);

echo $fsize1;
echo "<b>Znak Qiymet Panel</b>:<br/>\n";
echo $divide;
echo $fsize2;
echo $fsize1;
echo "Qiymetler:<br/>\n";
echo "1 saat";
echo "<input size=\"3\" name=\"saat$ref\" maxlength=\"3\" format=\"*N\" value=\"".$saato."\" emptyok=\"false\"/>bal.<br/>\n";
echo "12 saat";
echo "<input size=\"3\" name=\"saati$ref\" maxlength=\"3\" format=\"*N\" value=\"".$saatio."\" emptyok=\"false\"/>bal.<br/>\n";
echo "1 g&#252;n";
echo "<input size=\"3\" name=\"gun$ref\" maxlength=\"3\" format=\"*N\" value=\"".$guno."\" emptyok=\"false\"/>bal.<br/>\n";
echo "3 g&#252;n";
echo "<input size=\"3\" name=\"guni$ref\" maxlength=\"3\" format=\"*N\" value=\"".$gunio."\" emptyok=\"false\"/>bal.<br/>\n";
echo "7 g&#252;n";
echo "<input size=\"3\" name=\"ygun$ref\" maxlength=\"3\" format=\"*N\" value=\"".$guny."\" emptyok=\"false\"/>bal.<br/>\n";
echo "30 g&#252;n";
echo "<input size=\"3\" name=\"ogun$ref\" maxlength=\"3\" format=\"*N\" value=\"".$oun."\" emptyok=\"false\"/>bal.<br/>\n";

echo $fsize2;
print $fsize1;
echo $divide;
echo "[<anchor>Yenile<go href=\"error.php?go=znak_qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"saat\" value=\"$(saat$ref)\"/>
<postfield name=\"saati\" value=\"$(saati$ref)\"/>
<postfield name=\"gun\" value=\"$(gun$ref)\"/>
<postfield name=\"guni\" value=\"$(guni$ref)\"/>
<postfield name=\"ygun\" value=\"$(ygun$ref)\"/>
<postfield name=\"ogun\" value=\"$(ogun$ref)\"/>

</go></anchor>]<br/>\n";
}else{
echo $fsize1;
echo "<u>H&#246;rmetli <b>".$row['user']."</b> melumat yenilendi!</u><br/>\n";
file_put_contents('file/dat_folder/znak.dat',$saat."\n".$saati."\n".$gun."\n".$guni."\n".$ygun."\n".$ogun);
@chmod("file/dat_folder/znak.dat", 0666);
}
echo $fsize2;
break;



case 'snick_panel':
if($id!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
echo $fsize1;

echo "<b>Super Nick Panel</b>:<br/>\n";
echo $divide;

echo "[<a href=\"error.php?go=snick_qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Super Nick qiymet</a>]<br/>";
echo "[<a href=\"rnick.php?mod=4&amp;id=$id&amp;ps=$ps&amp;go=bonus&amp;ref=$ref\">Super Nick elave et</a>]<br/>";

echo $fsize2;

break;


case 'snick_qiymet';

if($id!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
} else {

if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/rnickk.dat");
        $number_1 = trim($file[0]);
        $number_2 = trim($file[1]);	
        $number_3 = trim($file[2]);		
		$number_4 = trim($file[3]);
		$number_5 = trim($file[4]);
		$number_6 = trim($file[5]);
        echo "<small>Super Nicki Qiymet Paneli</small><br/>\n";
        echo $divide;
		echo "<small>1 Saat :</small>";
        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"3\"/><small> - Bal</small><br/> ";
		echo "<small>12 Saat :</small>";
        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"3\"/><small> - Bal</small><br/> ";
		echo "<small>1 Gun :</small>";
        echo "<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"3\"/><small> - Bal</small><br/> ";
		echo "<small>3 Gun :</small>";
        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"3\"/><small> - Bal</small><br/> ";
		echo "<small>7 Gun :</small>";
        echo "<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"3\"/><small> - Bal</small><br/> ";
		echo "<small>30 Gun :</small>";
        echo "<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"3\"/><small> - Bal</small><br/> ";
		
		echo $divide;
        echo "[<anchor title=\"go\"><small>Melumat&#305; Deyi&#351;</small><go href=\"error.php?go=snick_qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
		echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
		echo "<postfield name=\"number_3\" value=\"$(number_3$ref)\"/>";
		echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
		echo "<postfield name=\"number_5\" value=\"$(number_5$ref)\"/>";
		echo "<postfield name=\"number_6\" value=\"$(number_6$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";
    }
    else
    {
        $save = @fopen("file/dat_folder/rnickk.dat", "w");
        $data .= $number_1."\n";	
        $data .= $number_2."\n";	
        $data .= $number_3."\n";	
        $data .= $number_4."\n";
        $data .= $number_5."\n";
        $data .= $number_6."\n";		
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "<small>Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..</small><br/>\n";
    }

}
break;

























case 'forum_fikirler':

$time = time()-0;

mysql_query ("DELETE from chat_fikirler");

echo $fsize1;

echo "Forumdaki Butun Fikirler Silindi !<br/>\n";

echo $fsize2;

break;


case 'forum_movzular':

$time = time()-0;

mysql_query ("DELETE from chat_forums");

echo $fsize1;

echo "Forumdaki Butun Movzular Silindi !<br/>\n";

echo $fsize2;

break;
case 'hediyye':

$time = time()-0;

mysql_query ("DELETE from hediyye_box");

echo $fsize1;

echo "Butun Hediyyeler Silindi!<br/>\n";

echo $fsize2;

break;
case 'silgi_ishleri':
echo "<small>";
echo "&#304;stifade&#231;i Reytinqi<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=clear_reytinq&amp;r=$ref\">Niklere verilen sesleri sil</a><br/>\n";
echo $divide;

echo "Online SMS-ler<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=online_sms&amp;r=$ref\">B&#252;t&#252;n Online smsleri sil</a><br/>\n";
echo $divide;

echo "Virtual Qefes<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=clear_qefes&amp;r=$ref\">Virtual qefese verilen sesleri sil</a><br/>\n";
echo $divide;


echo "&#304;stifade&#231;i &#350;ekilleri<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=clear_albom&amp;r=$ref\">B&#252;t&#252;n Foto Albomu sil</a><br/>\n";

echo $divide;




echo "Hediyyeler Sistemi<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=hediyye&amp;r=$ref\">B&#252;t&#252;n Hediyyeleri sil</a><br/>\n";
echo $divide;


echo "Forum B&#246;lmesi<br/>";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=forum_movzular&amp;r=$ref\">B&#252;t&#252;n M&#246;vzular&#305; sil</a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=forum_fikirler&amp;r=$ref\">B&#252;t&#252;n Fikirleri sil</a><br/>\n";
echo "</small>";
break;



case 'clear_albom':
$update = mysql_query("UPDATE `albom` = '0';");
mysql_query("delete from albom");
echo $fsize1;
echo " Butun foto albom silindi!<br/>\n";
echo $fsize2;
break;



case 'clear_fotoses':
$update = mysql_query("UPDATE `albom` SET `ses` = '0';");
mysql_query("delete from golos");
echo $fsize1;
echo " Shekile verilen Sesler silindi!<br/>\n";
echo $fsize2;
break;

case 'online_sms':

$time = time()-0;

mysql_query ("DELETE from online_sms");

echo $fsize1;

echo "Butun Onlinesms silindi!<br/>\n";

echo $fsize2;

break;

case 'clear_qefes':
$update = mysql_query("UPDATE `qefes` SET `ses` = '0';");
mysql_query("delete from golos");
echo $fsize1;
echo "Virtual qefese verilen Sesler silindi!<br/>\n";
echo $fsize2;
break;

case 'clear_reytinq':
$update = mysql_query("UPDATE `users` SET `ses` = '0';");
mysql_query("delete from golos");
echo $fsize1;
echo "Butun niklere verilen Sesler silindi!<br/>\n";
echo $fsize2;
break;

case 'forumfikir':

$time = time()-0;

mysql_query ("DELETE from forum_fikir");

echo $fsize1;

echo "Forumda olan fikirleri silindi!<br/>\n";

echo $fsize2;

break;








case "qeyqay" :
echo "Qeydiyyat Qaydalari Novu<br/>";
echo $divide;
$file = @file("file/dat_folder/qeyqay.dat");
$number_1 = trim($file[0]);
echo "<b>Veziyyet : $number_1 </b><br/>";
echo $divide;
if (!$_POST["deyish"]) {
echo "Giris Novu?: ";
echo $fsize1;
echo "<select name=\"rppost\" value=\"".$rpb_posts."\">\n";
echo "<option value=\"reghelp\">Standart Normal</option>\n";
echo "<option value=\"18+\">18 +</option>\n";
echo "</select><br/>\n";
echo $fsize2;
echo "<anchor title=\"go\">Deyi&#351;<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=qeyqay&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"rppost\" value=\"$(rppost)\"/>\n";
echo "<postfield name=\"deyish\" value=\"EH\"/>\n";
echo "</go></anchor><br/>\n";
} else {
$rppost = trim($_POST["rppost"]);
$rppbal = trim($_POST["rppbal"]);
$file = fopen("file/dat_folder/qeyqay.dat", "w");
$data .= "$rppost\n";
$data .= "$rppbal\n";
fwrite($file, $data);
fclose($file);
echo "Deyi&#351;iklikler qeyde al&#305;nd&#305;.<br/>";
}
break;
















case "yonelt" :
echo $fsize1;
echo "<b>Qeydiyyat Yonelt</b><br/>";
$sm=file("file/dat_folder/yonelt.dat");
if(trim($sm[0])>time()){
if(!isset($_GET['sss'])){
echo "Qeydiyyatiniz yonelib: ".trim($sm[1])."<br/>";
echo "<a href=\"error.php?go=yonelt&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;sss\">Qeydiyyati Qaytar</a><br/>";
}else{
@$sxx = @fopen( "file/dat_folder/yonelt.dat", "w" );
$fuck = time()."\n";
@fwrite($sxx,"{$fuck}");
@fflush($sxx);
@fclose($sxx);
if($sxx) echo "Qeydiyyat Qaytarildi<br/>";
}}elseif(($sm=="")||(trim($sm[0])<time())){
echo "Sayt(Sehife):<input name=\"yonelt\" value=\"http://\" emptyok=\"false\"/><br/>";
echo "Muddet:<select name=\"muddet\"><option value=\"86400\">1 gun</option><option value=\"604800\">1 hefte</option><option value=\"2592000\">1 ay</option></select><br/>";
echo "<anchor title=\"go\">Yonelt!<go href=\"error.php?go=yonelt&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\"><postfield name=\"yonelt\" value=\"$(yonelt)\"/><postfield name=\"muddet\" value=\"$(muddet)\"/></go></anchor><br/>";
if(isset($_POST['yonelt'])){
@$saxla = @fopen( "file/dat_folder/yonelt.dat", "w" );
$times=time()+$_POST['muddet'];
$ass .= $times."\n";
$ass .= $_POST['yonelt']."\n";
@fwrite($saxla,"{$ass}");
@fflush($saxla);
@fclose($saxla);
if($saxla) echo "Qeydiyyat yoneldi<br/>";
}}
echo $fsize2;
break;




case 'chatonline':
echo $fsize1;
$time = ($vaxt - 300) + time();
$sql = mysql_query("SELECT * FROM `users` WHERE `time` > '".$time."' order by time desc;");
echo "<b>5 deqiqe erzinde &#231;atda olanlar:(".mysql_num_rows($sql).")</b><br/>";
echo $divide;
while ($sql_view = mysql_fetch_array($sql)) {
if($sql_view["sex"]=="0")$sex="K";else$sex="Q";
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$sql_view["id"]."&amp;ref=$ref\">".$sql_view["user"]."</a>(".$sex."), ";
}
echo "<br/>";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;






case 'qayda':
echo $fsize1;
echo "<b>Qayda Paneli</b><br/>";
echo $divide;
$nini = file("file/dat_folder/qayda.dat");
for($ii=0;$ii<15;$ii++){
$m=$ii+1;
echo "<b>".$m."</b>)<input name=\"n".$ii."\" value=\"".$nini[$ii]."\"/><br/>\n";
}
echo "<anchor title=\"go\">Elave Et<go href=\"error.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;go=qet\" method=\"post\">";
echo "<postfield name=\"m0\" value=\"$(n0)\"/>\n";
echo "<postfield name=\"m1\" value=\"$(n1)\"/>\n";
echo "<postfield name=\"m2\" value=\"$(n2)\"/>\n";
echo "<postfield name=\"m3\" value=\"$(n3)\"/>\n";
echo "<postfield name=\"m4\" value=\"$(n4)\"/>\n";
echo "<postfield name=\"m5\" value=\"$(n5)\"/>\n";
echo "<postfield name=\"m6\" value=\"$(n6)\"/>\n";
echo "<postfield name=\"m7\" value=\"$(n7)\"/>\n";
echo "<postfield name=\"m8\" value=\"$(n8)\"/>\n";
echo "<postfield name=\"m9\" value=\"$(n9)\"/>\n";
echo "<postfield name=\"m10\" value=\"$(n10)\"/>\n";
echo "<postfield name=\"m11\" value=\"$(n11)\"/>\n";
echo "<postfield name=\"m12\" value=\"$(n12)\"/>\n";
echo "<postfield name=\"m13\" value=\"$(n13)\"/>\n";
echo "<postfield name=\"m14\" value=\"$(n14)\"/>\n";
echo "</go></anchor><br/>";
echo $fsize2;
break;

case 'qet':
$ma=trim(htmlspecialchars($_POST['m0']));
$mb=trim(htmlspecialchars($_POST['m1']));
$mc=trim(htmlspecialchars($_POST['m2']));
$md=trim(htmlspecialchars($_POST['m3']));
$me=trim(htmlspecialchars($_POST['m4']));
$mf=trim(htmlspecialchars($_POST['m5']));
$mg=trim(htmlspecialchars($_POST['m6']));
$mh=trim(htmlspecialchars($_POST['m7']));
$mx=trim(htmlspecialchars($_POST['m8']));
$ml=trim(htmlspecialchars($_POST['m9']));
$mq=trim(htmlspecialchars($_POST['m10']));
$mm=trim(htmlspecialchars($_POST['m11']));
$mn=trim(htmlspecialchars($_POST['m12']));
$mo=trim(htmlspecialchars($_POST['m13']));
$mu=trim(htmlspecialchars($_POST['m14']));
echo $fsize1;
$files = fopen("file/dat_folder/qayda.dat", "w");
if($ma!="")fwrite($files, "$ma\n");
if($mb!="")fwrite($files, "$mb\n");
if($mc!="")fwrite($files, "$mc\n");
if($md!="")fwrite($files, "$md\n");
if($me!="")fwrite($files, "$me\n");
if($mf!="")fwrite($files, "$mf\n");
if($mg!="")fwrite($files, "$mg\n");
if($mh!="")fwrite($files, "$mh\n");
if($mx!="")fwrite($files, "$mx\n");
if($ml!="")fwrite($files, "$ml\n");
if($mq!="")fwrite($files, "$mq\n");
if($mm!="")fwrite($files, "$mm\n");
if($mn!="")fwrite($files, "$mn\n");
if($mo!="")fwrite($files, "$mo\n");
if($mu!="")fwrite($files, "$mu\n");
fclose($files);
echo "<b>Qayda Paneli</b><br/>";
echo $divide;
echo "Qaydalar elave edildi<br/>$divide";
echo "<a href=\"error.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}&amp;go=qayda\">Qayda Paneli</a><br/>\n";
echo $fsize2;
break;




case 'postu':
if($row['level']!=9){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($act))
{
echo $fsize1.'
Ham&#305;n&#305;n Postu:<br/>
<input size="5" name="post" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=postu&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="post" value="$(post)"/>
</go></anchor><br/>
'.$fsize2;
}
else
{
{
$jposts=$_POST["post"];
mysql_query ("Update users set posts='".$jposts."'");
}
echo $fsize1.' Ham&#305;n&#305;n Post Hesab&#305; Yenilendi<br/>'.$fsize2;
}
break;


case 'qopu':
if($row['level']!=9){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($act))
{
echo $fsize1.'
Ham&#305;n&#305;n Qepiyi:<br/>
<input size="5" name="qepiy" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=qopu&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="qepiy" value="$(qepiy)"/>
</go></anchor><br/>
'.$fsize2;
}
else
{
{
$qepiyi=$_POST["qepiy"];
mysql_query ("Update users set qepiy='".$qepiyi."'");
}
echo $fsize1.' Ham&#305;n&#305;n Qepiy Hesab&#305; Yenilendi<br/>'.$fsize2;
}
break;















case 'balu':

if(!isset($act))
{
echo $fsize1.'
Ham&#305;n&#305;n Bal&#305;:<br/>
<input size="5" name="bal" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=balu&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="bal" value="$(bal)"/>
</go></anchor><br/>
'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
else
{
{
$jbal=$_POST["bal"];
mysql_query ("Update users set bal='".$jbal."'");
}
echo $fsize1.' Ham&#305;n&#305;n Bal Hesab&#305; Yenilendi<br/>'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
break;



case 'xalu':

if(!isset($act))
{
echo $fsize1.'
Ham&#305;n&#305;n Xal&#305;:<br/>
<input size="5" name="xal" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=xalu&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="xal" value="$(xal)"/>
</go></anchor><br/>
'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
else
{
{
$jbal=$_POST["xal"];
mysql_query ("Update users set xal='".$jbal."'");
}
echo $fsize1.' Ham&#305;n&#305;n Xal Hesab&#305; Yenilendi<br/>'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
break;









case 'mega_panel':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$donamor = file("file/dat_folder/mega_panel.dat");
$a = trim($donamor[0]);
$b = trim($donamor[1]);
$c = trim($donamor[2]);
$d = trim($donamor[3]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>Mega nick Panel</b>:<br/>\n";
echo $divide;
echo $fsize2;

echo $fsize1;
echo "B&#246;y&#252;k Nik:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Qal&#305;n:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"bb$ref\"  value=\"".$b."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Eyri:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"cc$ref\"  value=\"".$c."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Qal&#305;n-eyri:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"dd$ref\"  value=\"".$d."\" emptyok=\"false\"/><br/>\n";
print $fsize1;
echo "[<anchor>Yenile<go href=\"error.php?go=mega_panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
<postfield name=\"bb\" value=\"$(bb$ref)\"/>
<postfield name=\"cc\" value=\"$(cc$ref)\"/>
<postfield name=\"dd\" value=\"$(dd$ref)\"/>
</go></anchor>]<br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u>H&#246;rmetli <b>".$row['user']."</b> melumat yenilendi!</u><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=mega_panel&amp;ref=$ref\">Mega nick Paneli</a><br/>\n";
echo $fsize2;
file_put_contents('file/dat_folder/mega_panel.dat',$aa."\n".$bb."\n".$cc."\n".$dd);
@CHMOD("file/dat_folder/mega_panel.dat", 0666);

}
break;



case 'ph':
if($row['level']!=9){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($act))
{
echo $fsize1.'
Hediyye Post:<br/>
<input size="5" name="post" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=ph&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="post" value="$(post)"/>
</go></anchor><br/>
'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
else
{
{
$jposts=$_POST["post"];
mysql_query ("Update users set `posts` = `posts` + '".$jposts."'");
}
echo $fsize1.' Ham&#305;n&#305;n Post Hesab&#305;na <b>$post</b> Post Elave Edildi<br/>'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
break;


case 'bh':

if(!isset($act))
{
echo $fsize1.'
Hediyye Bal:<br/>
<input size="5" name="bal" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=bh&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="bal" value="$(bal)"/>
</go></anchor><br/>
'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
else
{
{
$jbal=$_POST["bal"];
mysql_query ("Update users set `bal` = `bal` + '".$jbal."'");
}
echo $fsize1.' Ham&#305;n&#305;n Bal Hesab&#305;na <b>$bal</b> Bal Elave Edildi<br/>'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
break;




case 'xh':

if(!isset($act))
{
echo $fsize1.'
Hediyye Xal:<br/>
<input size="5" name="xal" maxlength="5" format="*N" emptyok="false"/> ?<br/>
<anchor title="go">Deyi&#351;<go href="error.php?id='.$id.'&amp;ps='.$ps.'&amp;go=xh&amp;ref='.$ref.'&amp;act=del" method="post">
<postfield name="xal" value="$(bal)"/>
</go></anchor><br/>
'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
else
{
{
$jxal=$_POST["xal"];
mysql_query ("Update users set `xal` = `xal` + '".$jxal."'");
}
echo $fsize1.' Ham&#305;n&#305;n xal Hesab&#305;na <b>$xal</b> Bal Elave Edildi<br/>'.$fsize2;
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
}
break;


























case 'xl':
if($id!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$r = mysql_query ("SELECT * from users WHERE xal");
$a = mysql_fetch_array($r);
while ($a !== false){
$pid = $a["id"];
settype($pid, 'integer');
mysql_query("UPDATE users set xal = '0' WHERE id = '".$pid."'");
$a = mysql_fetch_array($r);
}
echo $fsize1;
echo "Butun Xallar S&#305;f&#305;rland&#305;<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;

case 'ql':
if($id!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$r = mysql_query ("SELECT * from users WHERE qepiy");
$a = mysql_fetch_array($r);
while ($a !== false){
$pid = $a["id"];
settype($pid, 'integer');
mysql_query("UPDATE users set qepiy = '0' WHERE id = '".$pid."'");
$a = mysql_fetch_array($r);
}
echo $fsize1;
echo "Butun Qepiyler S&#305;f&#305;rland&#305;<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;











case 'bl':
if($id!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$r = mysql_query ("SELECT * from users WHERE bal");
$a = mysql_fetch_array($r);
while ($a !== false){
$pid = $a["id"];
settype($pid, 'integer');
mysql_query("UPDATE users set bal = '0' WHERE id = '".$pid."'");
$a = mysql_fetch_array($r);
}
echo $fsize1;
echo "Butun Ballar S&#305;f&#305;rland&#305;<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;

case 'pl':
if($id!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$r = mysql_query ("SELECT * from users WHERE posts");
$a = mysql_fetch_array($r);
while ($a !== false){
$pid = $a["id"];
settype($pid, 'integer');
mysql_query("UPDATE users set posts = '0' WHERE id = '".$pid."'");
$a = mysql_fetch_array($r);
}
echo $fsize1;
echo "Butun Postlar S&#305;f&#305;rland&#305;<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;


case 'pla':
if($id!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$r = mysql_query ("SELECT * from users WHERE bugunpost");
$a = mysql_fetch_array($r);
while ($a !== false){
$pid = $a["id"];
settype($pid, 'integer');
mysql_query("UPDATE users set bugunpost = '0' WHERE id = '".$pid."'");
$a = mysql_fetch_array($r);
}
echo $fsize1;
echo "Butun Gunluk Postlar S&#305;f&#305;rland&#305;<br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
break;





case 'fm':

echo $fsize1;


$sm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM smiles "));

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=add_smile&amp;ver=html&amp;ref=$ref\"><b>Smayl elave et</b></a><br/>\n";
echo "<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Znak elave et!</b></a><br/>\n";
echo "<a href=\"hediyye_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye Panel</a><br/>\n";
print $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=smiles&amp;ref=$ref\">Bazadak&#305; smayllar</a>(<b>".$sm[0]."</b>)<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editbolmes&amp;ref=$ref\">Smaylik Bolme Adlar&#305;</a><br/>\n";
echo $divide;


echo $fsize2;
break;



    
	
	
	case "bonus":
    if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/auto_reg_priz.dat");
        $priz_1 = trim($file[0]);
        $priz_2 = trim($file[1]);
        $priz_3 = trim($file[2]);
        echo "Yeni qeydiyyat ke&#231;enlere hediyye.<br/>\n";
        echo $divide;
        echo "Bal: <br/>";
		echo $fsize1;
        echo "<input type=\"text\" name=\"priz_1$ref\" value=\"".$priz_1."\" size=\"6\"/><br/>";
		echo $fsize2;
        echo "Post: <br/>";
		echo $fsize1;
        echo "<input type=\"text\" name=\"priz_2$ref\" value=\"".$priz_2."\" size=\"6\"/><br/>";
		echo $fsize2;
        echo "R&#252;tbe: <br/>";
      echo $fsize1;
        echo "<select name=\"priz_3$ref\" value=\"".$priz_3."\">";
        $sql = mysql_query("select * from levels order by level asc");
        while($lev = mysql_fetch_array($sql))
        {
            echo "<option value=\"".$lev["level"]."\">".$lev["level"]." - ".$lev["name"]."</option>";
        }
        echo "</select><br/>";
        echo $fsize2;
        echo $divide;
        echo "[<anchor title=\"go\">Deyi&#351;<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=bonus&amp;ref=$ref\" method=\"post\">\n";
        echo "<postfield name=\"priz_1\" value=\"$(priz_1$ref)\"/>";
        echo "<postfield name=\"priz_2\" value=\"$(priz_2$ref)\"/>";
        echo "<postfield name=\"priz_3\" value=\"$(priz_3$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";
    }
    else
    {
        $save = @fopen("file/dat_folder/auto_reg_priz.dat", "w");
        $data .= intval($priz_1)."\n";
        $data .= intval($priz_2)."\n";
        $data .= intval($priz_3)."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
    }
    break;



case 'l':
$fsize1;
echo "<small>LoGo Paneliviz!!!!</small><br/>";
echo $divide;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo&amp;ref=$ref\"><b><small>LoGo Dehliz</small></b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo1&amp;ref=$ref\"><b><small>LoGo Online</small></b></a><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo2&amp;ref=$ref\"><b><small>LoGo Giris</small></b></a><br/>\n";



$fsize2;
break;



case 'logo':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
if(!isset($_POST['action']))
{
echo $fsize1;
echo "<b>Qeyd</b>:LoGonuz Dehlizde gorunecek))<br/>";
echo $fsize2;
$file = file("file/logo/1.dat");
$logo= trim($file[0]);
$mesaj= trim($file[1]);

echo $fsize1;
echo "&#350;ekil: unvan ))<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/><br/>\n";

echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo$ref)\"/>\n";

echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$logo = str_replace('http://', '', $logo);
$logo = narmobilfut($logo);
$file = fopen("file/logo/1.dat", "w");
$data .= "$logo\n";
fwrite($file, $data);
fclose($file);

echo $fsize1;
echo "H&#246;rmetli <b>$user</b>logo yerlewdirildi... ))))))<br/>";
echo $fsize2;
}

break;

case 'logo1':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
if(!isset($_POST['action']))
{
echo $fsize1;
echo "<b>Qeyd</b>:LoGonuz Onlaynda gorunecek))<br/>";
echo $fsize2;
$file = file("file/logo/2.dat");
$logo= trim($file[0]);
$mesaj= trim($file[1]);

echo $fsize1;
echo "&#350;ekil: unvan ))<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/><br/>\n";

echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo1&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo$ref)\"/>\n";

echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$logo = str_replace('http://', '', $logo);
$logo = narmobilfut($logo);
$file = fopen("file/logo/2.dat", "w");
$data .= "$logo\n";
fwrite($file, $data);
fclose($file);

echo $fsize1;
echo "H&#246;rmetli <b>$user</b>logo yerlewdirildi... ))))))<br/>";
echo $fsize2;
}

break;



case 'logo2':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
if(!isset($_POST['action']))
{
echo $fsize1;
echo "<b>Qeyd</b>:LoGonuz Girisde gorunecek))<br/>";
echo $fsize2;
$file = file("file/logo/3.dat");
$logo= trim($file[0]);
$mesaj= trim($file[1]);

echo $fsize1;
echo "&#350;ekil: unvan ))<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/><br/>\n";

echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=logo2&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo$ref)\"/>\n";

echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$logo = str_replace('http://', '', $logo);
$logo = narmobilfut($logo);
$file = fopen("file/logo/3.dat", "w");
$data .= "$logo\n";
fwrite($file, $data);
fclose($file);

echo $fsize1;
echo "H&#246;rmetli <b>$user</b>logo yerlewdirildi... ))))))<br/>";
echo $fsize2;
}

break;

  case 'rga':
    if(!isset($_POST['action']))
    {
        $file = @file("file/dat_folder/regnick.dat");
        $number_1 = trim($file[0]);
        $number_2 = trim($file[1]);
        $number_3 = trim($file[2]);
        $number_4 = trim($file[3]);
        $number_5 = trim($file[4]);


        echo "<u>Nikin Uzunlugu</u>: <br/>";

        echo "<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"6\"/><br/>";

        echo "<u>Sifrenin Uzunlugu</u>: <br/>";

        echo "<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"6\"/><br/>";

        echo "<u>Adin Uzunlugu</u>: <br/>";

        echo "<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"6\"/><br/>";

        echo "<u>Qeydiyyatdaki Seher</u>: <br/>";

        echo "<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"6\"/><br/>";

        echo "<u>Qeydiyyatdaki Haqqinda</u>: <br/>";

        echo "<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"6\"/><br/>";


        echo $divide;
        echo "[<anchor title=\"go\">Melumat&#305; Deyi&#351;<go href=\"error.php?id=$id&amp;ps=$ps&amp;go=rga&amp;ref=$ref&amp;act=del\" method=\"post\">";
        echo "<postfield name=\"number_1\" value=\"$(number_1$ref)\"/>";
        echo "<postfield name=\"number_2\" value=\"$(number_2$ref)\"/>";
        echo "<postfield name=\"number_3\" value=\"$(number_3$ref)\"/>";
        echo "<postfield name=\"number_4\" value=\"$(number_4$ref)\"/>";
        echo "<postfield name=\"number_5\" value=\"$(number_5$ref)\"/>";
        echo "<postfield name=\"action\" value=\"ok\"/>";
        echo "</go></anchor>]<br/>";



echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><small>Geri Qay&#305;t</small></a><br/>\n";

    }
    else
    {
        $save = @fopen("file/dat_folder/regnick.dat", "w");
        $data .= $number_1."\n";
        $data .= $number_2."\n";
        $data .= $number_3."\n";
        $data .= $number_4."\n";
        $data .= $number_5."\n";
        @fwrite($save, $data);
        @fflush($save);
        @fclose($save);
        echo "Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
    }
    break;








case 'rutbe_panel':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$donamor = file("file/dat_folder/rutbe_panel.dat");
$a = trim($donamor[0]);
$b = trim($donamor[1]);
$c = trim($donamor[2]);
$d = trim($donamor[3]);

if(!$_POST['aa']){
echo $fsize1;
echo "<b>RuTbe Qiymet Panel</b>:<br/>\n";
echo $divide;
echo $fsize2;

echo $fsize1;
echo "Rehberlik:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Super_Admin:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"bb$ref\"  value=\"".$b."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Moder:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"cc$ref\"  value=\"".$c."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>ViP / ViPka:<br/>\n";
echo $fsize2;
echo "<input size=\"6\" name=\"dd$ref\"  value=\"".$d."\" emptyok=\"false\"/><br/>\n";







print $fsize1;
echo "(<anchor>Yenile<go href=\"error.php?go=rutbe_panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
<postfield name=\"bb\" value=\"$(bb$ref)\"/>
<postfield name=\"cc\" value=\"$(cc$ref)\"/>
<postfield name=\"dd\" value=\"$(dd$ref)\"/>
</go></anchor>)<br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u>H&#246;rmetli <b>".$row['user']."</b> melumat yenilendi!</u><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=rutbe_panel&amp;ref=$ref\">Rutbe qiymet Paneli</a><br/>\n";
echo $fsize2;
file_put_contents('file/dat_folder/rutbe_panel.dat',$aa."\n".$bb."\n".$cc."\n".$dd);
@CHMOD("file/dat_folder/rutbe_panel.dat", 0666);

}
break;



case 'skript_panel':
if($id!='1'){
echo $fsize1;
echo "Sizin buna huququnuz yoxdur.<br/>\n";
echo $fsize2;
break;
}
$asef = file("file/dat_folder/skript_panel.dat");
$a = trim($asef[0]);
$b = trim($asef[1]);
$c = trim($asef[2]);
$d = trim($asef[3]);
if(!$_POST['aa']){
echo $fsize1;
echo "<b>Lisenziya Adi ))))))</b>:<br/>\n";
echo $divide;
echo $fsize2;

echo $fsize1;
echo "Skript:\n";
echo $fsize2;
echo "<input size=\"8\" name=\"aa$ref\"  value=\"".$a."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Lisenziya:\n";
echo $fsize2;
echo "<input size=\"8\" name=\"bb$ref\"  value=\"".$b."\" emptyok=\"false\"/>\n";
echo "<br/>";
echo $fsize1;
echo "Yazar:\n";
echo $fsize2;
echo "<input size=\"8\" name=\"cc$ref\"  value=\"".$c."\" emptyok=\"false\"/>\n";
echo $fsize1;
echo "<br/>Coder:\n";
echo $fsize2;
echo "<input size=\"8\" name=\"dd$ref\"  value=\"".$d."\" emptyok=\"false\"/><br/>\n";
print $fsize1;


echo "(<anchor>Yenile<go href=\"error.php?go=skript_panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"aa\" value=\"$(aa$ref)\"/>
<postfield name=\"bb\" value=\"$(bb$ref)\"/>
<postfield name=\"cc\" value=\"$(cc$ref)\"/>
<postfield name=\"dd\" value=\"$(dd$ref)\"/>
</go></anchor>)<br/>\n";
echo $fsize2;
}else{
echo $fsize1;
echo "<u>H&#246;rmetli <b>".$row['user']."</b> melumat yenilendi!</u><br/>\n";
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=skript_panel&amp;ref=$ref\">Lisenziya Ad Panel</a><br/>\n";
echo $fsize2;
file_put_contents('file/dat_folder/skript_panel.dat',$aa."\n".$bb."\n".$cc."\n".$dd);
@CHMOD("file/dat_folder/skript_panel.dat", 0666);

}
break;


}

if ($go) {
echo $fsize1;
echo $divide;
echo "<a href=\"error.php?id=$id&amp;ps=$ps&amp;go=error&amp;ref=$ref\">ErroR Panel</a><br/>\n";
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