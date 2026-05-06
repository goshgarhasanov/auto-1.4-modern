<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"Melumatlar\" title=\"Melumatlar\">";
echo "<do type=\"options\" name=\"out\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
echo "<p align=\"left\">";
echo $fsize1;
switch($mod) {

case '1':
echo "<b>&#199;atdan Xaric Edileceksiz:</b><br/>";
echo $divide;
echo "1. &#199;atda her hans&#305; bir davaya ve ya terbiyeden kenar s&#246;zler i&#351;lendikde..<br/>2. Ba&#351;qa bir istifade&#231;ini tehqir etdikde.<br/>3. &#199;atda dini, irqi ayr&#305;-se&#231;kilik ve ya yerlipereslik etdikde.<br/>4. Flud etdikde(eyni s&#246;z&#252; ve ya simvolu tekrar etdikde).<br/>5. &#199;atda menfi emosiya yaratd&#305;qda.<br/>6. Admin ve Moderi bezdirdikde.<br/>7. Moderlerin i&#351;ine qar&#305;&#351;a bilmersiniz. Eks teqdirde siz qovulacaqs&#305;n&#305;z. &#350;ikayetiniz varsa Admine m&#252;raciet ede bilersiniz.<br/>8. Reklam etdikde<br/>9. B&#214;Y&#220;K herfle daim yazd&#305;qda &#199;atdan Xaric edileceksiz. Azerbaycan dilinden ba&#351;qa dilde dan&#305;&#351;maq olmaz.<br/>10. &#214;z&#252;n&#252; Admin veya Moder kimi teqdim etdikde Xaric edileceksiz.<br/>";

echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=4&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
break;


case '4':

echo "<b>&#304;gnor</b> (kimdense zehlen getmesi):<br/>";
echo $divide;
echo "Siz zehleniz getdiyi insani ignor ede bilersiniz. Bu zaman iqnor etdiyiniz &#350;exs size &#231;atda ve ya mektublarda yaza bilmeyecek. Eger geri &#231;&#305;xartmaq isteseniz \"&#350;exsi Kabinete\" daxil olub \"IGNOR list\"-den leqebi silmek laz&#305;md&#305;r.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=5&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=1&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;

case '5':

echo "<b>Dostlar&#305;n Siyah&#305;s&#305;:</b><br/>";
echo $divide;
echo "Dostlar siyah&#305;s&#305;na elave etdiyiniz &#350;exs &#199;ata daxil olduqda Size melumat gelecek, hem&#231;inin siz mektublar&#305; ve ya mesajlar&#305; ba&#287;lad&#305;qda yaln&#305;z dostlar&#305;n&#305;zdan mesaj ve ya mektub qebulunu a&#231;&#305;q saxlaya bilersiz.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=6&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=4&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;

case '6':

echo "<b>Mektublar haqq&#305;nda::</b><br/>";
echo $divide;
echo "Siz istifade&#231;ilere mektub g&#246;ndere bilersiniz. Mektubun oxunub-oxunmamas&#305; haqq&#305;nda melumat&#305; Gedenler qutusuna bax&#305;b &#246;yrene bilersiz. Mektubda otaqda oldu&#287;u kimi smayliklerden istifade ede bilersiz.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=7&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=5&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;

case '7':

echo "<b>Statuslar:</b><br/>";
echo $divide;
echo "Statuslar automatik olaraq Sistem terefinden verilir. Status Vezife demek deyil, Status yaln&#305;z reytinq kimi bilinir. &#304;stenilen statusu olan istifade&#231; he&#231;kesi &#231;atdan xaric ede bilmez. Yaln&#305;z Vezifesi (R&#252;tbeli) &#350;exsler istifade&#231;ileri &#231;atdan xaric etmek h&#252;ququ var.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=9&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=6&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;


case '9':

echo "<b>R&#252;tbe almaq &#252;&#231;&#252;n ne etmeli?</b><br/>";
echo $divide;
echo "Bunu siz du&#351;&#252;nmeyin. Rehberlik bilir kime ve ne vaxt R&#252;tbe verecek. Adminlerden ve ya Rehberlikden r&#252;tbe istemeyiniz faydas&#305;zd&#305;r. Rehberlik heyyetinden r&#252;tbe istemekle, R&#252;tbe almaq imkan&#305;n&#305;z&#305;da itirmi&#351; olursuz!<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=10&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=7&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;

case '10':

echo "<b>Sual?-Cavab!:</b><br/>";
echo $divide;
echo "Sual Sistem terefinden verilir ve cavaba gore size xal verilir.Siz suallara cavab vermekle--Shagird 0-100 cavab,Telebe 100-500 cavab,Bakalavr 500-1000 cavab,Magistr 1000-2000 cavab,Doktora Namized 2000-5000 cavab,Elmler Doktoru 5000-7000 cavab,Kelle Sualin Muellimi =) 7000 cavabdan chox topladiqda bu statuslari qaza bilersiniz.<br/>\n";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=11&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=9&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;

case '11':
echo "<b>Gizli otaq:</b><br/>";
echo $divide;
echo "Gizli otaqa daxil olarkaen istenilen bir kod yazmal&#305;s&#305;n&#305;z, istediyiniz istifade&#231;iye bu &#351;ifreni vere bilersiz. &#350;ifreni verdiyiniz &#350;exs kodu yaz&#305;b Gizli otaqa daxil olduqda siz eyni otaqa d&#252;&#351;&#252;rs&#252;z. Nezerinize &#231;atd&#305;r&#305;m ki, bu otaqa he&#231; bir vezifeli &#350;exsler cavabdehlik da&#351;&#305;m&#305;r.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=13&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=10&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;



case '13':
echo "<b>&#350;ekli nece y&#252;klemeli?</b><br/>";
echo $divide;
echo "&#214;z melumatlar&#305;n&#305;za (Anketinize) &#246;z &#351;ekilinizi y&#252;klemek &#252;&#231;&#252;n \"&#350;exsi Kabinet\"-e daxil olub \"&#350;ekil y&#252;kle\" b&#246;lmesine daxil olmal&#305;s&#305;n&#305;z.<br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=14&amp;ref=$ref\">&gt;&gt;&gt;</a><br/>\n";
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=11&amp;ref=$ref\">&lt;&lt;&lt;</a><br/>\n";
break;



case '14':
echo "<b>Sehvler:</b><br/>";
echo $divide;
echo "&#199;atda her hans&#305; bir i&#351;lemeyen sehvliye rast geldikde \"<b>Admin</b>\" leqebli &#350;exse mektub vasitesi ile bildirin. Hemin xeta tez bir zamanda aradan qald&#305;r&#305;lacaq.<br/>----<br/><u>Qaydalar&#305; oxuduqunuz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</u><br/>";
echo $divide;
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=13\">&lt;&lt;&lt;</a><br/>\n";
break;


  case '15':
  echo "<b><u>Reytinq haqda sual ve cavab:</u></b><br/>";
  echo $divide;
  echo "<b>Sual: Reytinq nece artir?</b><br/>";
  echo "<b>Cavab</b>:<br/>";
  echo "Mesaj Yazarken - <u>0.02 %</u><br/>";
  echo "Online Sms yazarken - <u>0.05 %</u><br/>";
  echo "Online Status yazarken - <u>0.05 %</u><br/>";
  echo "Ankete Foto Elave ederken - <u>0.04 %</u><br/>";
  echo "Znak Alarken - <u>0.10 %</u><br/>";
  echo "Meqa nik alarken - <u>0.1 %</u><br/>";
  echo "Banka bal qoyarken - <u>0.03 %</u><br/>";
  echo "QePiY alarken - <u>0.08 %</u><br/>";
  echo $divide;
  echo "<b>Diqqet</b>: Qayda pozuntusu ederken reytinq 0-lanir.<br/>";
  break;

default:
echo "<b>Melumatlar:</b><br/>****<br/>";
echo "<b><a href=\"smaylikler.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smaylikler</a></b><br/>----<br/>\n";
echo "1. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=1&amp;ref=$ref\">S&#246;hbet Qaydalar&#305;</a><br/>";
echo "3. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=4&amp;ref=$ref\">&#304;qnor List</a><br/>";
echo "4. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=5&amp;ref=$ref\">Dostlar Siyah&#305;s&#305;</a><br/>";
echo "5. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=6&amp;ref=$ref\">Mektub haqq&#305;nda</a><br/>";
echo "6. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=7&amp;ref=$ref\">Status haqq&#305;nda</a><br/>";
echo "7. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=9&amp;ref=$ref\">R&#252;tbe almaq &#252;&#231;&#252;n ne etmeli?</a><br/>";
echo "8. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=10&amp;ref=$ref\">Sual-Cavab Oyunu</a><br/>";
echo "9. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=13&amp;ref=$ref\">&#350;ekli nece y&#252;kleyek?</a><br/>";
echo "10. <a href=\"melumat.php?id=$id&amp;ps=$ps&amp;mod=14&amp;ref=$ref\">Sehvlikler</a><br/>";


break;



}

if ($mod!="smile")echo "****<br/>";
if ($sm==""){
if($mod) {
echo "<a href=\"melumat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Melumatlar</a><br/>";
}
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>";

echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>
