<?php


echo "<card id=\"byq\" title=\"Bal Y&#252;kleme Qaydas&#305;\">\n";
echo "<p align =\"left\">\n";
if ( !isset( $_POST['qiymet'] ) )
{
echo $fsize1;
echo "<b>Kontur &#350;ifresi ile BaL Y&#252;kle</b><br/>\n";
echo "<b>Yaln&#305;&#351; &#351;ifre g&#246;nderenlerin niki yand&#305;r&#305;lacaq.</b><br/>-=*=-<br/>\n"; 
echo $fsize2;

$nn=file("file/bal_bot/down.dat");
$man1 = trim($nn[0]);
$bal2 = trim($nn[1]);
$man3 = trim($nn[2]);
$bal4 = trim($nn[3]);
$man5 = trim($nn[4]);
$bal6 = trim($nn[5]);
$man7 = trim($nn[6]);
$bal8 = trim($nn[7]);
$man9 = trim($nn[8]);
$bal10 = trim($nn[9]);
$man11 = trim($nn[10]);
$bal12 = trim($nn[11]);



echo $fsize1;
echo "Operator (se&#231;):<br/>\n";
echo $fsize2;
echo "<select name=\"operator\">";
echo "<option value=\"Azercell\">Azercell</option>\n";
echo "<option value=\"Bakcell\">Bakcell</option>\n";
echo "<option value=\"Nar Mobile\">Nar Mobile</option>\n";
echo "</select><br/>";
echo $fsize1;
echo "Ne&#231;e AZN:<br/>";
echo $fsize2;
echo "<select name=\"azn\">";
if($man1!="" and $bal2!="")echo "<option value=\"$man1 AZN ($bal2 bal)\">$man1 ($bal2 bal)</option>";
if($man3!="" and $bal4!="")echo "<option value=\"$man3 AZN ($bal4 bal)\">$man3 ($bal4 bal)</option>";
if($man5!="" and $bal6!="")echo "<option value=\"$man5 AZN ($bal6 bal)\">$man5 ($bal6 bal)</option>";
if($man7!="" and $bal8!="")echo "<option value=\"$man7 AZN ($bal8 bal)\">$man7 ($bal8 bal)</option>";
if($man9!="" and $bal10!="")echo "<option value=\"$man9 AZN ($bal10 bal)\">$man9 ($bal10 bal)</option>";
if($man11!="" and $bal12!="")echo "<option value=\"$man11 AZN ($bal12 bal)\">$man11 ($bal12 bal)</option>";
echo "</select><br/>";

echo $fsize1;
echo "&#350;ifre:<br/>";
echo $fsize2;
echo "<input name=\"sifre$ref\" maxlength=\"15\" value=\"\" title=\"sifre\" format=\"*N\"/><br/>";
echo $fsize1;
echo "<anchor title=\"go\">[G&#246;nder]<go href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=bal&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"operator\" value=\"$(operator)\"/>\n";
echo "<postfield name=\"azn\" value=\"$(azn)\"/>\n";
echo "<postfield name=\"sifre\" value=\"$(sifre$ref)\"/>\n";
echo "<postfield name=\"qiymet\" value=\"45\"/>";
echo "</go></anchor><br/>\n";
echo $fsize2;
echo $fsize1;
echo "----<br/>\n";
echo "<u>Qeyd</u>: Hesab&#305;n&#305;za bal y&#252;kleyerek nik ve ya status yaz&#305;s&#305;n&#305; deyi&#351;mek, Tebrik-Elan yerle&#351;dirmek, Rengli nik sifari&#351; etmek, G&#246;r&#252;nmezlik elde etmek, Beyenilen info olmaq, Evlilik qeyd etmek, Hediyye g&#246;ndermek ve s. kimi xidmetlerden istifade ede bilersiniz.<br/>----<br/>\n";
echo "Daha Etrafl&#305; melumat &#252;&#231;&#252;n <b>$nomre</b> ile elaqe saxlayin.<br/>\n";
echo $fsize2;
}
else
{
         if ($sifre == "")
            {
                echo $fsize1;
                echo "Siz &#350;ifrenizi Yazmad&#305;n&#305;z.<br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
                echo $fsize2;
            }elseif (strlen($sifre) > 14) 
            {
                echo $fsize1;
                echo "&#350;ifreniz 14 reqemden &#231;ox ola bilmez!<br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
                echo $fsize2;
            }elseif (strlen($sifre) < 14) 
            {
                echo $fsize1;
                echo "&#350;ifreniz 14 Reqemden Az Olmamalidir!<br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
                echo $fsize2;
            }
else{

$usid = "1";
$syst = @mysql_query ("Select user from users where id='".$usid."' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$the_end = $rr["user"];
$us=$row["user"];

$time = time();
$data = date("d-M-Y [H:i]");
$message = "Bal y&#252;klemek isteyen <b>".$us."</b> <u>".$azn."</u> manatliq ".$operator." &#351;ifresi(<b><a href=\"wtai://wp/mc;*101#".$sifre."#\">".$sifre."</a></b>) g&#246;nderib.";
mysql_query("insert into zapiski values(0,'".$us."','".$id."','".$message."','".$the_end."','".$usid."','".$time."','0','Bal Y&#252;klemesi','".$data."','1','1');");

echo $fsize1;
echo "Sifari&#351;iniz qeyd olundu. <b>".$the_end."</b> terefinden yoxlan&#305;ld&#305;qdan sonra elave edilecek.Bal&#305;n&#305;z y&#252;klenmese kart&#305; y&#252;klemeyin g&#252;n erzinde 100% bal&#305;n&#305;z elave edilecek.<br/>\n";
echo $fsize2;
}
}
echo $fsize1;
echo "----<br/>\n";
echo $fsize2;
?>