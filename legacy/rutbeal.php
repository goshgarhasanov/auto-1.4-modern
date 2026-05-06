<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,) = check_login($link); 

$_v->title('R&#252;tbelerin sat&#305;&#351;&#305;','left');
$_v->fsize1($fsize1);
$file = @file("file/dat_folder/n_n/rutbeal.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
$number_5 = trim($file[4]);
$number_6 = trim($file[5]);
$number_7 = trim($file[6]);
$number_8 = trim($file[7]);
$number_9 = trim($file[8]);
$number_10 = trim($file[9]);
$number_11 = trim($file[10]);
$number_12 = trim($file[11]);
$number_13 = trim($file[12]);
$number_14 = trim($file[13]);

if ($number_1 == 'x' and $number_2 == 'x' and $number_3 == 'x' and $number_4 == 'x' and $number_5 == 'x' and $number_6 == 'x'){
echo "<b>Xidmet Deaktiv Edilib..!</b><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
switch($mod) {

case 'rehberlik':
//if ($number_1 != 'x')
$nn = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_1</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_7</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Forumda R&#252;tbe (Rehber)<br/>";
echo "[+] Leqebi Deyi&#351;mek<br/>";
echo "[+] Post Vermek<br/>";
echo "[+] Iqnor Paneli<br/>";
echo "[+] Dost Paneli<br/>";
echo "[+] Gizli Axtar&#305;&#351;<br/>";
echo "[+] Sual elave et<br/>";
echo "[+] IP-den ban Etmek<br/>";
echo "[+] Telefonu ban Etmek<br/>";
echo "[+] Tam Iqnor Etmek<br/>";
echo "[+] Mektublar&#305; Oxu<br/>";
echo "[+] Mesajlar&#305; Oxu<br/>";
echo "[+] MMS Mektublar&#305; Oxu<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 90 G&#252;ne qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek.<br/>";
echo "[+] Ban etmek<br/>";
echo "[+] &#304;stifade&#231;i ad&#305;n&#305; silmek<br/>";
echo "[+] Ban A&#231;maq<br/>";
echo "[+] IP-Soft A&#231;maq<br/>";
echo "[+] IP-Soft G&#246;rmek (Tel Modeli)<br/>";
echo "[+] B&#252;t&#252;n otaqlar&#305; silmek<br/>";
echo "[+] Otaqda Yaz&#305;lar&#305; silmek (Tek-Tek)<br/>";
echo "[+] Ota&#287;lara Elan<br/>";
echo "[+] Elan elave etmek<br/>";
echo "[+] Elan&#305; Silmek<br/>";
echo "[+] Ball&#305; Elan&#305; Silmek<br/>";
echo "[+] B&#252;t&#252;n otaqlar&#305; silmek<br/>";
echo "[+] Control Panel<br/>";
echo "[+] Sor&#287;u elave emek<br/>";
echo "[+] &#350;ikayet paneli<br/>";
echo "[+] Reklam paneli<br/>";
echo "[+] Otaqlarda: <b>Qara,</b> <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";
break;


case 'admin':
$nn = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_3</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_9</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 10 G&#252;ne qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek<br/>";
echo "[+] Ban etmek<br/>";
echo "[+] &#304;stifade&#231;i ad&#305;n&#305; silmek<br/>";
echo "[+] B&#252;t&#252;n Qovulanlara nezaret<br/>";
echo "[+] Reklam paneli<br/>";
echo "[+] &#350;ikayet paneli<br/>";
echo "[+] Otaqlarda: <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";

break;

case 'sadmin':
$nn = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_2</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_8</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 15 G&#252;ne qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek.<br/>";
echo "[+] Ban etmek<br/>";
echo "[+] &#304;stifade&#231;i ad&#305;n&#305; silmek<br/>";
echo "[+] Ban A&#231;maq<br/>";
echo "[+] IP-Soft A&#231;maq<br/>";
echo "[+] IP-Soft G&#246;rmek (Tel Modeli)<br/>";
echo "[+] B&#252;t&#252;n otaqlar&#305; silmek<br/>";
echo "[+] Elan elave etmek<br/>";
echo "[+] Elan&#305; Silmek<br/>";
echo "[+] Ball&#305; Elan&#305; Silmek<br/>";
echo "[+] B&#252;t&#252;n otaqlar&#305; silmek<br/>";
echo "[+] Control Panel<br/>";
echo "[+] Sor&#287;u elave emek<br/>";
echo "[+] &#350;ikayet paneli<br/>";
echo "[+] Reklam paneli<br/>";
echo "[+] Otaqlarda: <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";
break;

case 'smoder':
$nn = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_4</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_10</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 5 G&#252;ne qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek<br/>";
echo "[+] Ban etmek<br/>";
echo "[+] &#350;ikayet paneli<br/>";
echo "[+] Otaqlarda: <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";
break;




case 'moder':
$nn = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_5</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_11</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 2 G&#252;ne qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek<br/>";
echo "[+] Otaqlarda: <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";

break;


case 'vip':
$nn = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($nn);
echo "<b>".$arr['name']."</b><br/>\n";
$_v->divide();
echo "".$arr['name'].": <b>$number_6</b> AZN<br/>\n";
echo "N&#246;vbeti Ay: <b>$number_12</b> AZN<br/>";
echo "---<br/>";
echo "<b>".$arr['name']."</b> Statusuna aid &#246;zellikler:\n";
echo "<br/>[+] sayt&#305;n toxunulmaz&#305; olursuz !<br/>";
echo "Funksiyalar:<br/>";
echo "[+] Xaric etmek (5 Deqiqeden - 24 saata qeder)<br/>";
echo "[+] Xeberdarl&#305;q etmek<br/>";
echo "[+] Otaqlarda: <u>Xetli,</u> <i>eyri</i> yaza bilir!<br/>";

break;

default:

echo "<b>R&#252;tbelerin sat&#305;&#351;&#305;</b><br/>\n";
$_v->divide();
$nn = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($nn);
if ($number_1 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_1 AZN<br/>\n";
if ($number_1 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=rehberlik&amp;ref=$ref\">Bax</a><br/>\n";

if ($number_1 != 'x')$_v->divide();
$nn = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($nn);
if ($number_2 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_2 AZN<br/>\n";
if ($number_2 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=sadmin&amp;ref=$ref\">Bax</a><br/>\n";


if ($number_2 != 'x')$_v->divide();
//echo "----<br/>\n";
$nn = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($nn);
if ($number_3 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_3 AZN<br/>\n";
if ($number_3 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=admin&amp;ref=$ref\">Bax</a><br/>\n";

if ($number_3 != 'x')$_v->divide();
//echo "----<br/>\n";
$nn = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($nn);
if ($number_4 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_4 AZN<br/>\n";
if ($number_4 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=smoder&amp;ref=$ref\">Bax</a><br/>\n";

if ($number_4 != 'x')$_v->divide();
//echo "----<br/>\n";
$nn = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($nn);
if ($number_5 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_5 AZN<br/>\n";
if ($number_5 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=moder&amp;ref=$ref\">Bax</a><br/>\n";
if ($number_5 != 'x')$_v->divide();
//echo "----<br/>\n";
$nn = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($nn);
if ($number_6 != 'x')echo "<b>".$arr['name']."</b> 1-ayl&#305;&#287;&#305; $number_6 AZN<br/>\n";
if ($number_6 != 'x')echo "Daha etrafl&#305; melumat &#252;&#231;&#252;n <a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;mod=vip&amp;ref=$ref\">Bax</a><br/>\n";

break;
}
echo "---<br/>";
//$_v->divide();
echo "<b>&#214;deni&#351;</b>: $number_13<br/>\n";
echo "<i>Status almaq &#252;c&#252;n :</i><br/>\n";
echo "Elaqe: <b>$number_14</b><br/>\n";
$_v->divide();


if($mod) {
echo "<a href=\"rutbeal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qayit</a><br/>\n";
}
print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>