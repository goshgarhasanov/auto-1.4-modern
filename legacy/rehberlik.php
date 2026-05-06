<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if (($row['id'] != 1)) {
$_v->title('Stopppp','center');
$_v->fsize1($fsize1);
echo "Rehberlik Bolmesine Daxil Olma Icazeniz Yoxdur..!<br/>\n";
mysql_query( "UPDATE users SET kik = '9999999999', whokik = 'Sistem', whykik = 'Rehberlik Panele Daxil Olmaga Cehd' WHERE id = '".$id."'" );
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit( );
}

function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "N&#246;vbeti &#187;";
$_PREVPAGE = "&#171; Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}


$_v->title('Rehberlik Paneli');
$_v->fsize1($fsize1);




$nn=intval($_GET['nn']);
switch($nn)
{
default:
echo "<u>Auto Chat Funksiya Version Gold</u><br/>";
$_v->divide();
echo "&#8226; <a href=\"rehberlik.php?nn=82&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Style Gold Panel</b></a><br/>";
echo "&#8226; <a href=\"filtr_panel.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Filtr Paneli</a><br/>";
echo "&#8226; <a href=\"data_panel.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Partner Paneli</b></a><br/>";
echo "&#8226; <a href=\"boot.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Canli Boot Paneli</a><br/>";
echo "&#8226; <a href=\"sukan.php?id=$id&amp;ps=$ps&amp;&amp;act=panel&amp;ref=$ref\">Suruculuk Panel</a><br/>\n";
echo "&#8226; <a href=\"xeber/admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeber Paneli</a><br/>\n";
echo "&#8226; <a href=\"rehberlik.php?nn=1112&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nomre Panel</a><br/>";
echo "&#8226; <a href=\"security_panel.php?id=$id&amp;ps=$ps&amp;&amp;act=panel&amp;ref=$ref\">2-Ci Parol Panel</a><br/>\n";
echo "&#8226; <a href=\"rehberlik.php?nn=7777&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Seo Panel</a><br/>";
echo "&#8226; <a href=\"xatire_panel.php?id=$id&amp;ps=$ps&amp;&amp;act=panel&amp;ref=$ref\">Xatire Defter Panel</a><br/>\n";
echo "&#8226; <a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=7779&amp;ref=$ref\">Aktiv Domen Sat&#305;&#351;&#305;</a><br/>";
echo "&#8226;  <a href=\"rehberlik.php?nn=670&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qeydiyyat Tesdiq Panel</a><br/>\n";
$_v->divide();
echo "&#8226; <a href=\"mp.php?id=$id&amp;ps=$ps&amp;bol=admin&amp;ref=$ref\">Mp3 Paneli</a><br/>\n";
echo "&#8226; <a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;mod=4&amp;ref=$ref\">Znak Paneli</a><br/>\n";
echo "&#8226; <a href=\"video_panel.php?id=$id&amp;ps=$ps&amp;go=video_admin&amp;ref=$ref\">Video Paneli</a><br/>\n";
echo "&#8226; <a href=\"sekil_panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Shekil Paneli</a><br/>\n";
echo "&#8226; <a href=\"rehberlik.php?nn=83&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye Paneli</a><br/>";
echo "&#8226; <a href=\"rnick.php?mod=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli Nik Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=88&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Logo Rand Paneli</a><br/>";
$_v->divide();
echo "&#8226; <a href=\"rehberlik.php?nn=7777&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Exchange Panel</a><br/>";

echo "&#8226; <a href=\"rehberlik.php?nn=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Security Panel</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=60&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Delete Panel</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye Paneli Otaq</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=71&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dost / &#304;qnor Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=15&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Post idare Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=19&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal idare Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=23&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayn Bonus Bal</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=32&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Kupon Bonus Bal</a><br/>";
$_v->divide();
echo "&#8226; <a href=\"rehberlik.php?nn=24&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Uzun Nick Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=25&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfo idare Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=26&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qeydiyyat Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=27&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Meqa Nik Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=29&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Znak Al Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=1111&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">ID AL Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=30&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz Link Adlari</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=31&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayn Link Adlari</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=33&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;ndex Link Adlari</a><br/>";
$_v->divide();
echo "&#8226; <a href=\"rehberlik.php?nn=34&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Reklam Paneli</a><br/>";

echo "&#8226; <a href=\"rehberlik.php?nn=37&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Missia Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=36&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ferqli Nick Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=38&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yalanci User Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=39&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yalanci User Paneli v2</a><br/>";
echo "&#8226; <a href=\"stsonline.php?bc=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">On Status Paneli</a><br/>";
echo "&#8226; <a href=\"onlinesms.php?b=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Online SMS Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=54&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Show Foto Paneli</a><br/>";

$_v->divide();

echo "&#8226; <a href=\"rehberlik.php?nn=35&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;atdan Xaric et Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=65&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Adminle Elaqe Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=58&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Komputerle Qeydiyyat</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=67&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qeydiyyata Qadaga</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=77&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfo Status Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=78&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfondan Qov Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=79&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sayta Ke&#231;id Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=86&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rutbe Satis Paneli</a><br/>";

/////caseler basladi B3RD3N!CK/////

break;

case '666';
mysql_query("DELETE FROM `users` WHERE `id` = '".$utes."';");
echo "Silindi. <br/>\n";
break;

case '667';
mysql_query("UPDATE `users` SET `qeyd_micro` = '1' WHERE `id` = '".$utes."';");
echo "Tesdiq Edildi. <br/>\n";
break;

case '668':
mysql_query("UPDATE `users` set `qeyd_micro`='1'");
echo "Secdiyiniz butun niklerin Qeydiyyati Tesdiqlendi<br/>";
break;


case '669':
echo "Siz Burdan Qeydiyyat Tesdiqi Gozleyenin Qeydiyyatini Testiqleye Ve Ya Sile Bilersiz.!!<hr>";

echo " <a href=\"rehberlik.php?nn=670&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Qeydiyyat Paneli</b></a> <hr>";
echo "<a href=\"rehberlik.php?nn=668&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hamsini Tesdiqle</a><br/>";


$sql = mysql_query("SELECT * FROM `users` WHERE `qeyd_micro` = '0';");
if(mysql_num_rows($sql) != 0) {
while($micro_s = mysql_fetch_array($sql))
{


echo "ID: ".$micro_s["id"]."<br/>\n";
echo "Leqeb: ".$micro_s["user"]."<br/>\n";
echo "<a href=\"rehberlik.php?nn=667&amp;id=$id&amp;ps=$ps&amp;utes=".$micro_s["id"]."&amp;ref=$ref\">Tesdiqle</a> - ";
echo "<a href=\"rehberlik.php?nn=666&amp;id=$id&amp;ps=$ps&amp;utes=".$micro_s["id"]."&amp;ref=$ref\">Sil</a><br/>";


}
}else{
echo "Tesdiq Gozleyen Yoxdur.\n";
}

break;



case '670':
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "Qeydiyyati Tesdiqli ve ya Tesdiqsiz Ede Bilersiniz.!<br/><hr>";
echo "Qeydiyyat Paneli<br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$rpos = file("file/dat_folder/micro_regt.dat");

$ferqli = trim($rpos[0]);


$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=670&amp;ref=$ref");

echo "Qeydiyyat Novu<br/>\n";
if ($ferqli == 1) {
print $_v->select("<select name=\"ferqli\" value=\"".$ferqli."\">|<option value=\"1\">Tesdiqsiz</option>|<option value=\"0\">Tesdiqli</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"ferqli\" value=\"".$ferqli."\">|<option value=\"0\">Tesdiqli</option>|<option value=\"1\">Tesdiqsiz</option></select>",'null').'<br/>';
}


print $_v->submit('Deyi&#351;','deyish=ok');

//echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=669\">Tesdiq Gozleyenler\n";

} else {
$bol = trim($_POST["bol"]);


$file = fopen("file/dat_folder/micro_regt.dat", "w");
$data .= "$ferqli\n";

fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/micro_regt.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;



case '7779':

if(!$_POST['act']){
echo "<b>Aktiv Domen Sat&#305;&#351;&#305;</b>:<br/>\n";
$_v->divide();
$_v->action("rehberlik.php?nn=7779&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
$satir = file("file/dat_folder/domenler.dat");
$domen0 = trim($satir [0]);
$domen1 = trim($satir [1]);
$domen2 = trim($satir [2]);
$domen3 = trim($satir [3]);
$domen4 = trim($satir [4]);
$domen5 = trim($satir [5]);
$domen6 = trim($satir [6]);
$domen7 = trim($satir [7]);
$domen8 = trim($satir [8]);
$domen9 = trim($satir [9]);
$domen10 = trim($satir [10]);
$domen11 = trim($satir [11]);
$domen12 = trim($satir [12]);
$domen13 = trim($satir [13]);
$domen14 = trim($satir [14]);
$domen15 = trim($satir [15]);
$domen16 = trim($satir [16]);
$domen17 = trim($satir [17]);
$domen18 = trim($satir [18]);
$domen19 = trim($satir [19]);

$dfghdfgdf = file("file/dat_folder/domen.dat");
$vcxvcvc0 = trim($dfghdfgdf [0]);
$vcxvcvc1 = trim($dfghdfgdf [1]);
$vcxvcvc2 = trim($dfghdfgdf [2]);
$vcxvcvc3 = trim($dfghdfgdf [3]);
$vcxvcvc4 = trim($dfghdfgdf [4]);
echo "<i><b><u>Deaktivle&#351;dirmek istediyiniz b&#246;lmeni <span style=\"color:red\">Bo&#351;</span> Burax&#305;n</u></b></i><br/>\n";
echo "Linkin Adi:<span style=\"color:red\"> Aktiv Domen Satisi ve ya Aktiv Domenlerimiz ve s.</span> <br/>\n";
print $_v->input("<input maxlength=\"25\" size=\"20\" name=\"avcxvcvc0{$ref}\"  value=\"".$vcxvcvc0."\"/>") . "<br/>".$divide;

echo "Sayt&#305;n B&#252;t&#252;n Domenlerle Birge Son Sat&#305;&#351; Qiymeti:<br/>\n";
print $_v->input("<input size=\"4\" name=\"avcxvcvc1{$ref}\" maxlength=\"6\" value=\"".$vcxvcvc1."\"/>") . " AZN<br/>";

echo "&#214;deni&#351; &#220;sullar&#305;:<br/>\n";
print $_v->input("<input maxlength=\"250\" size=\"15\" name=\"avcxvcvc2{$ref}\"  value=\"$vcxvcvc2\"/>") . "<br/>";


echo "Elaqe n&#246;mresi:\n";
print $_v->input("<input size=\"12\" name=\"avcxvcvc3{$ref}\" maxlength=\"15\" value=\"" . $vcxvcvc3 . "\"/>") . "<br/>";

echo "Link G&#246;r&#252;ns&#252;n ??? \n";
print $_v->select( '<select name="avcxvcvc4' . $ref . '">|<option value="0">Aciq </option>|<option value="3">Bagli </option>|</select>', $vcxvcvc4 ) . '<br/>'.$divide;

echo "Domenin Ad&#305; - Qiymeti (Haqq&#305;nda Melumat)<br/>\n";

print "<b>1</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen0{$ref}\"  value=\"$domen0\"/>") . "<br/>";
print "<b>2</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen1{$ref}\"  value=\"$domen1\"/>") . "<br/>";
print "<b>3</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen2{$ref}\"  value=\"$domen2\"/>") . "<br/>";
print "<b>4</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen3{$ref}\"  value=\"$domen3\"/>") . "<br/>";
print "<b>5</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen4{$ref}\"  value=\"$domen4\"/>") . "<br/>";
print "<b>6</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen5{$ref}\"  value=\"$domen5\"/>") . "<br/>";
print "<b>7</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen6{$ref}\"  value=\"$domen6\"/>") . "<br/>";
print "<b>8</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen7{$ref}\"  value=\"$domen7\"/>") . "<br/>";
print "<b>9</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen8{$ref}\"  value=\"$domen8\"/>") . "<br/>";
print "<b>10</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen9{$ref}\"  value=\"$domen9\"/>") . "<br/>";
print "<b>11</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen10{$ref}\"  value=\"$domen10\"/>") . "<br/>";
print "<b>12</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen11{$ref}\"  value=\"$domen11\"/>") . "<br/>";
print "<b>13</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen12{$ref}\"  value=\"$domen12\"/>") . "<br/>";
print "<b>14</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen13{$ref}\"  value=\"$domen13\"/>") . "<br/>";
print "<b>15</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen14{$ref}\"  value=\"$domen14\"/>") . "<br/>";
print "<b>16</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen15{$ref}\"  value=\"$domen15\"/>") . "<br/>";
print "<b>17</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen16{$ref}\"  value=\"$domen16\"/>") . "<br/>";
print "<b>18</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen17{$ref}\"  value=\"$domen17\"/>") . "<br/>";
print "<b>19</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen18{$ref}\"  value=\"$domen18\"/>") . "<br/>";
print "<b>20</b>)". $_v->input("<input maxlength=\"250\" size=\"15\" name=\"qdomen19{$ref}\"  value=\"$domen19\"/>") . "<br/>";
print $_v->submit("Elave Et", "act=ok");
} else {
echo "<u>H&#246;rmetli <b>" . $row['user'] . "</b> melumat yenilendi!</u><br/>";

file_put_contents('file/dat_folder/domen.dat', $avcxvcvc0 . "
" . $avcxvcvc1 . "
" . $avcxvcvc2 . "
" . $avcxvcvc3 . "
" . $avcxvcvc4);

$files = fopen("file/dat_folder/domenler.dat", "w");
if($qdomen0!="")fwrite($files, "$qdomen0\n");
if($qdomen1!="")fwrite($files, "$qdomen1\n");
if($qdomen2!="")fwrite($files, "$qdomen2\n");
if($qdomen3!="")fwrite($files, "$qdomen3\n");
if($qdomen4!="")fwrite($files, "$qdomen4\n");
if($qdomen5!="")fwrite($files, "$qdomen5\n");
if($qdomen6!="")fwrite($files, "$qdomen6\n");
if($qdomen7!="")fwrite($files, "$qdomen7\n");
if($qdomen8!="")fwrite($files, "$qdomen8\n");
if($qdomen9!="")fwrite($files, "$qdomen9\n");
if($qdomen10!="")fwrite($files, "$qdomen10\n");
if($qdomen11!="")fwrite($files, "$qdomen11\n");
if($qdomen12!="")fwrite($files, "$qdomen12\n");
if($qdomen13!="")fwrite($files, "$qdomen13\n");
if($qdomen14!="")fwrite($files, "$qdomen14\n");
if($qdomen15!="")fwrite($files, "$qdomen15\n");
if($qdomen16!="")fwrite($files, "$qdomen16\n");
if($qdomen17!="")fwrite($files, "$qdomen17\n");
if($qdomen18!="")fwrite($files, "$qdomen18\n");
if($qdomen19!="")fwrite($files, "$qdomen19\n");
fclose($files);
}
break;

case 7777:
echo "<b>Seo Sozler Paneli</b><br/>";
$goldum = file("file/dat_folder/seo.dat");
$seo = trim($goldum[0]);

echo "---<br/>Index Seo Sozler:<br/>";

$_v->action("rehberlik.php?nn=7777&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}");

echo "<input name=\"error\" value=\"$seo\" emptyok=\"false\"/><br/>";

if($_v->ver != "wml"){
echo "---<br/>";
print $_v->submit( "Yenile", "sss=ok" );
}else{
echo "---<br/>[ <anchor title=\"go\">Yenile<go href=\"rehberlik.php?nn=7777&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\"><postfield name=\"error\" value=\"$(error)\"/></go></anchor> ]<br/>";
}
if(isset($_POST['error'])){
@$saxla = @fopen( "file/dat_folder/seo.dat", "w" );
$ass .= $_POST['error']."\n";
@fwrite($saxla,"{$ass}");
@fflush($saxla);
@fclose($saxla);
if($saxla) echo "---<br/>Elave Edildi!<br/>";
}
break;

case 7777:

require(DOCUMENT_ROOT."file/dat_folder/exchange.inc");

if(!isset($_POST['post-500'])){
$_v->action("rehberlik.php?nn=7777&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "<b>Exchange Panel</b><br/>";
echo $divide;
echo "500 Post:<br/>\n";
print $_v->input("<input name=\"post-500\" value=\"".$exc_arr['post-500']."\" size=\"10\"/>")."-Bal<br/>\n";

echo "1000 Post:<br/>\n";
print $_v->input("<input name=\"post-1000\" value=\"".$exc_arr['post-1000']."\" size=\"10\"/>")."-Bal<br/>\n";

echo "5000 Post:<br/>\n";
print $_v->input("<input name=\"post-5000\" value=\"".$exc_arr['post-5000']."\" size=\"10\"/>")."-Bal<br/>\n";

echo "50 Cavab:<br/>\n";
print $_v->input("<input name=\"credit-50\" value=\"".$exc_arr['credit-50']."\" size=\"10\"/>")."-Bal<br/>\n";

echo "150 Cavab:<br/>\n";
print $_v->input("<input name=\"credit-150\" value=\"".$exc_arr['credit-150']."\" size=\"10\"/>")."-Bal<br/>\n";

echo "300 Cavab:<br/>\n";
print $_v->input("<input name=\"credit-300\" value=\"".$exc_arr['credit-300']."\" size=\"10\"/>")."-Bal<br/>\n";

print $_v->submit('Yenile');

} else {
$asibka = false; 
foreach ( $_POST as $_key => $_val ){
if(!is_numeric($_POST[$_key])){
$asibka = true; 
} else if(strlen($_POST[$_key])>='6'){
$asibka = true; 
}
}
if($asibka==false){
$FP = @FOPEN(DOCUMENT_ROOT.'file/dat_folder/exchange.inc', 'w');
$DATA .= '<?php // CREATED BY: Savik'."\n".'$exc_arr = array('."\n";
foreach ( $_POST as $_key => $_val ){
$DATA .= '    "'.$_key.'" => "'.trim($_POST[$_key]).'",'."\n"; 
}
$DATA .= ');'."\n\n";
$DATA .= '?'.'>';
@UMASK(0111);
@FPUTS($FP, $DATA);
@FCLOSE($FP);
echo "Melumatlar deyi&#351;dirildi!..<br/>\n";
}else{
echo "Xeta var!..<br/>\n";
}
echo "<a href=\"rehberlik.php?nn=7777&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}



break;

case 3:
echo "<br/><a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=1\">Yeni Parol Yarat</a><br/>";
$pp=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `nihad_panel`;"));
$pp = trim($pp[0]);
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=4\">Parolu Olanlar</a>-($pp)<br/>";
break;
case 1:
$security = mysql_query("SELECT * FROM nihad_panel");
$panel = mysql_fetch_object($security);

if(!isset($unvan)){

echo "Yeni Parol Yarat<br/>----<br/>";
echo "Nick ve ya ID:<br/>";

if($_v->ver=="wml"){
echo "<input type=\"text\" name=\"login{$ref}\"/>";
echo "<br/><anchor title=\"go\">Axtari&#351;<go href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=1&amp;unvan=go\" method=\"post\">\n";
echo "<postfield name=\"login\" value=\"$(login{$ref})\"/>\n";
echo "</go></anchor><br/>\n";
}else{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=1&amp;unvan=go");

print $_v->input("<input type=\"text\" name=\"login{$ref}\"/>").'<br/>';



print $_v->submit('Axtari&#351;','unvan=go');
}
}else{

if(is_numeric($login)){
$axtar = mysql_query("SELECT * FROM users WHERE id='".$login."'");
}else{
$axtar = mysql_query("SELECT * FROM users WHERE user='".$login."'");
}

if(mysql_num_rows($axtar)==0){echo "Bele Bir istifadeci Movcud deyil.<br/>";}else{
$auto = mysql_fetch_object($axtar);
echo "Leqeb: <b>".$auto->user."</b> <br/>----<br/>";

$sec = mysql_query("SELECT * FROM nihad_panel WHERE usid='".$login."'");
if(mysql_affected_rows()==0){
echo "Security Paneli M&#246;vcud Deyil.<br/>----<br/>";
echo "Bu &#304;stifade&#231;i &#252;&#231;&#252;n &#304;kinci Parol Yarad&#305;ls&#305;n ?<br/>";
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rid=".$auto->id."&amp;nn=2\">Beli</a> 
/ <a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a><br/>";

}else{
echo "Security Panel M&#246;vcuddur.<br/>";
}}}


break;
case 2:
$ra = mysql_query("SELECT * FROM nihad_panel WHERE usid='".$rid."'");
if(mysql_affected_rows()==0){
if(!isset($add)){
$sel = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
if(mysql_affected_rows()==0){echo "Bele bir istifadei movcud deyil<br/>";}else{
$us = mysql_fetch_object($sel);
echo "Leqeb: <b>".$us->user."</b><br/>----<br/>";
///wml
if($_v->ver=="wml"){
echo "Login: <br/>";
echo "<input type=\"text\" name=\"login{$ref}\"/><br/>";
echo "Parol:<br/>";
echo "<input type=\"text\" name=\"pass{$ref}\"/><br/>";
echo "<anchor title=\"go\">Yarat<go href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=2&amp;add=go&amp;rid=$rid\" method=\"post\">\n";
echo "<postfield name=\"login\" value=\"$(login{$ref})\"/>\n";
echo "<postfield name=\"pass\" value=\"$(pass{$ref})\"/>\n";
echo "</go></anchor><br/>\n";
}
//wml son
if($_v->ver!=="wml"){
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=2&amp;add=go&amp;rid=$rid");
echo "Login: <br/>";
print $_v->input("<input type=\"text\" name=\"login{$ref}\"/>").'<br/>';
echo "Parol:<br/>";
print $_v->input("<input type=\"text\" name=\"pass{$ref}\"/>").'<br/>';

print $_v->submit('Yarat','add=go');
echo "<br/>";
}


}}else{
if(empty($rid)){echo "Leqeb Se&#231;ilmeyib.<br/>";}else{
if(empty($login) || empty($pass)){echo "B&#252;t&#252;n Xanalar&#305; Doldurun.<br/>";}else{

if(mysql_query("INSERT into nihad_panel SET usid='".$rid."',login='".$login."',pass='".$pass."'")){

$ol = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
$a = mysql_fetch_object($ol);
echo "<b>Login ve Parol U&#287;urla Yarad&#305;ld&#305;.</b><br/>----<br/>Melumatlar:<br/>----<br/>Leqeb: <b>".$a->user."</b><br/>
Login: <b>".$login."</b><br/>
Parol: <b>".$pass."</b><br/>
";
}else{echo "Xeta ba&#351; verdi<br/>";}
}}}}else{
echo "Art&#305;q ikinci Parol M&#246;vcuddur<br/>";
}
break;


case 4:

echo "Halhazirda ikinci Parol M&#246;vcud Olanlar<br/>";
echo "<br/>";
$sqlks = mysql_query("select id from nihad_panel");
$total = mysql_num_rows($sqlks);
if ((strpos ($HTTP_USER_AGENT,"Windows") !== false)||(strpos ($HTTP_USER_AGENT,"Opera") !== false))
{$r_k="ok";$max_page = 10;}else{$r_k="";$max_page = 10;}$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($total/$max_page) < $page){$start = 0;$end = $max_page;}

$sql = mysql_query("SELECT * FROM `nihad_panel` ORDER BY `id` desc limit $start,$max_page;");
if(mysql_affected_rows()==false){
echo "Security Paneli olan istifade&#231;i Yoxdur.<br/>";
}else{$m = 1;
while ($sm = mysql_fetch_array($sql)){

$mn = mysql_query("SELECT * FROM users WHERE id='".$sm["usid"]."'");
$l = mysql_fetch_object($mn);
echo "[<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=6&amp;g=".$sm["usid"]."\">x</a>] ".($start++).") <a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=5&amp;g=".$sm["usid"]."\">".$l->user."</a><br/>";
}if ($total > $max_page) {
echo "<br/>";
echo navigation('rehberlik.php?id='.$id.'&amp;ps='.$ps.'&amp;nn=4&amp;ref='.$ref.'', $total, $max_page, $page) ;
}
}
break;
case 5:
$r = mysql_query("SELECT * FROM nihad_panel WHERE usid='".$g."'");
if(mysql_affected_rows()==false){echo "Bu istifadeci &#252;&#231;&#252;n ikinci Parol Secilmeyib";}else{
$y = mysql_fetch_array($r);

$p = mysql_query("SELECT * FROM users WHERE id='".$g."'");
$o = mysql_fetch_object($p);

if(!isset($aauto)){

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=5&amp;aauto=go&amp;g=$g");
echo "Leqeb: <b>".$o->user."</b><br/>----<br/>";

echo "Login: <br/>";
print $_v->input("<input type=\"text\" name=\"login{$ref}\" value=\"".$y["login"]."\"/>").'<br/>';
echo "Parol:<br/>";
print $_v->input("<input type=\"text\" name=\"pass{$ref}\" value=\"".$y["pass"]."\"/>").'<br/>';


print $_v->submit('Yarat','action=save');


}else{
if(empty($login) || empty($pass)){echo "B&#252;t&#252;n Xanalar&#305; Doldurun.<br/>";}else{

if(mysql_query("UPDATE nihad_panel SET login='".$login."',pass='".$pass."' WHERE usid='".$g."'")){echo "<b>Parol Yenilendi.</b><br/>";}else{
echo "Xeta Bas Verdi .!";
}}}}
break;
case 6:
$ri = mysql_query("SELECT * FROM nihad_panel WHERE usid='".$g."'");
if(mysql_affected_rows()==false){echo "Bu Leqeb &#220;&#231;&#252;n &#304;kinci Parol Se&#231;ilmeyib<br/>";
}else{

if(mysql_query("DELETE FROM nihad_panel WHERE usid='".$g."'")){echo "Melumat U&#287;urla Silindi.Te&#351;ekkurler.<br/>";}else{
echo "Xeta Bas Verdi !";
}}
break;
case 7:
echo "Otaqda Posta Gore Bal Hediyye.<br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$rpos = file("file/dat_folder/n_n/roompost.dat");
$rpb_rpost = trim($rpos[0]);
$rpb_bal = trim($rpos[1]);
$bonus = trim($rpos[2]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=7&amp;ref=$ref");



echo "Rejim\n";
if ($bonus == 1) {
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Ne&#231;e posta?: ";
print $_v->input("<input size=\"9\" name=\"rppost\" maxlength=\"9\" format=\"*N\" value=\"".$rpb_rpost."\" emptyok=\"false\"/>").'-Post.<br/>';
echo "Ne&#231;e bal?: ";
print $_v->input("<input size=\"9\" name=\"rppbal\" maxlength=\"9\" format=\"*N\" value=\"".$rpb_bal."\" emptyok=\"false\"/>").'-Bal.<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$rppost = trim($_POST["rppost"]);
$rppbal = trim($_POST["rppbal"]);
$bonus = trim($_POST["bonus"]);

$file = fopen("file/dat_folder/n_n/roompost.dat", "w");
$data .= "$rppost\n";
$data .= "$rppbal\n";
$data .= "$bonus\n";
fwrite($file, $data);
fclose($file);

echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;


case 71:
echo "&#8226; <a href=\"rehberlik.php?nn=8&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dost Et Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=70&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dost &#199;&#305;xart Paneli</a><br/>";
$_v->divide();
echo "&#8226; <a href=\"rehberlik.php?nn=9&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;qnor Et Paneli</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=72&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;qnor &#199;&#305;xart Paneli</a><br/>";
break;
case 8:
echo "<b><u>Dostluga Elave Et Panel</u></b><br/>----<br/>\n";    
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=12&amp;ref=$ref");
echo "&#304;D:<br/>\n";  
print $_v->input("<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"true\"/>").'<br/>';
echo "Dost &#304;D:<br/>\n";      
print $_v->input("<input name=\"dost$ref\" maxlength=\"40\" value=\"\" title=\"dost\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Dost et','action=save');

break;


case 70:
echo "<b><u>Dostluqdan &#199;&#305;xart Panel</u></b><br/>----<br/>\n";    
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=13&amp;ref=$ref");
echo "&#304;D:<br/>\n";  
print $_v->input("<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"true\"/>").'<br/>';
echo "Dost &#304;D:<br/>\n";      
print $_v->input("<input name=\"dost$ref\" maxlength=\"40\" value=\"\" title=\"dost\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('&#199;&#305;xart','deyish=ok');
break;


case 9:

echo "<b><u>&#304;qnora Elave Et Panel</u></b><br/>----<br/>\n";  
echo "&#304;D:<br/>\n";      
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=10&amp;ref=$ref");

print $_v->input("<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"true\"/>").'<br/>';

echo "&#304;gnor Leqeb &#304;D:<br/>\n";      
print $_v->input("<input name=\"ignor$ref\" maxlength=\"40\" value=\"\" title=\"iqnor\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('&#304;qnor etdir','action=save');


break;


case 72:

echo "<b><u>&#304;qnordan &#199;&#305;xart Panel</u></b><br/>----<br/>\n";  
echo "&#304;D:<br/>\n";      
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=11&amp;ref=$ref");

print $_v->input("<input name=\"nik$ref\" maxlength=\"40\" value=\"\" title=\"nik\" emptyok=\"true\"/>").'<br/>';

echo "&#304;gnor Leqeb &#304;D:<br/>\n";      
print $_v->input("<input name=\"ignor$ref\" maxlength=\"40\" value=\"\" title=\"iqnor\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('&#304;qnor &#199;&#305;xart','action=save');

break;



case 10:
$select = mysql_query ("Select id,user from users where id = '".$nik."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>&#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";
break;
}
$inf = mysql_fetch_array ($select);
$nick1 = $inf["user"];
$usid1 = $inf["id"]; 

$select = mysql_query ("Select id,user from users where id = '".$ignor."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>&#304;gnor Leqeb &#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n"; 

break;
}
$inf = mysql_fetch_array ($select);
$nick2 = $inf["user"];
$usid2 = $inf["id"]; 

mysql_query ("Insert into ignor set id='".$usid1."', usid='".$usid2."'");
mysql_query ("Insert into ignor set id='".$usid2."', usid='".$usid1."'");

echo "<b><u>istek qebul edildi</u></b><br/>---<br/>\n";
echo "<b>$nick2</b> - <u>$nick1</u> leqebine ignor Etdirildi.. :)<br/>\n";   

break;


case 11:
$select = mysql_query ("Select id,user from users where id = '".$nik."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>&#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>---<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$nick1 = $inf["user"];
$usid1 = $inf["id"]; 

$select = mysql_query ("Select id,user from users where id = '".$ignor."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>&#304;gnor Leqeb &#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>---<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$nick2 = $inf["user"];
$usid2 = $inf["id"]; 

@mysql_query ("Delete from ignor where usid ='".$usid2."' and id = '".$usid1."'");
@mysql_query ("Delete from ignor where usid ='".$usid1."' and id = '".$usid2."'");

echo "<b><u>YES - &#304;gnor &#231;&#305;xart</u></b><br/>---<br/>\n";
echo "<b>$nick2</b> - <u><b>$nick1</b></u> leqebinin ignorundan &#231;&#305;xar&#305;ld&#305;.. :)<br/>\n";   


break;



case 12:
$select = mysql_query ("Select id,user from users where id = '".$nik."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>&#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$nick1 = $inf["user"];
$usid1 = $inf["id"]; 

$select = mysql_query ("Select id,user from users where id = '".$dost."'"); 
if (mysql_affected_rows() == 0) {

echo "<b>Dost &#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n"; 

break;
}
$inf = mysql_fetch_array ($select);
$nick2 = $inf["user"];
$usid2 = $inf["id"];
 
mysql_query ("Insert into friends set id='".$usid1."', usid='".$usid2."'");
mysql_query ("Insert into friends set id='".$usid2."', usid='".$usid1."'");

echo "<b><u>istek qebul edildi</u></b><br/>---<br/>\n";
echo "<b>$nick2</b> - <u><b>$nick1</b></u> Leqebinin dostlar siyah&#305;s&#305;na Ugurla Elave Edildi..!<br/>\n";   

break;


case 13:
$select = mysql_query ("Select id,user from users where id = '".$nik."'"); 
if (mysql_affected_rows() == 0) {
echo "<b>&#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";
break;
}
$inf = mysql_fetch_array ($select);
$nick1 = $inf["user"];
$usid1 = $inf["id"]; 

$select = mysql_query ("Select id,user from users where id = '".$dost."'"); 
if (mysql_affected_rows() == 0) {
echo "<b>Dost &#304;D</b> - b&#246;lmesi d&#252;z deyil.. :(<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n"; 
break;
}
$inf = mysql_fetch_array ($select);
$nick2 = $inf["user"];
$usid2 = $inf["id"]; 
@mysql_query ("Delete from friends where usid ='".$usid2."' and id = '".$usid1."'");
@mysql_query ("Delete from friends where usid ='".$usid1."' and id = '".$usid2."'");
echo "<b><u>istek qebul edildi</u></b><br/>---<br/>\n";
echo "<b>$nick2</b> - <u>$nick1</u> leqebinin dostlar siyah&#305;s&#305;ndan &#231;&#305;xar&#305;ld&#305;.. :)<br/>\n";   


break;
case 15:
echo "&#8226; <a href=\"rehberlik.php?nn=16&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;ya Post Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=17&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;n&#305;n Postun Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=18&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;n&#305;n Postun Deyis</a><br/>";
echo " <br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=47&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlara Post Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=48&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlarin Postun Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=49&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlarin Postun Deyis</a><br/>";
echo " <br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=50&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilere Post Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=51&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilerin Postun Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=52&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilerin Postun Deyis</a><br/>";
break;



case 47:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=47&amp;ref=$ref&amp;auto=ok");
echo "Burdan Qizlara Post Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post?<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}else{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` + '".$nihadposts."'  Where sex = '1' ");
}
echo "Qizlarin Post Hesab&#305;na <b>$nikopost</b> Post Elave Edildi..!<br/>";
}
break;


case 48:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=48&amp;ref=$ref&amp;auto=ok");
echo "Burdan Qizlarin Post Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post?<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` - '".$nihadposts."'  Where sex = '1' ");
}
echo " Qizlarin Post Hesab&#305;ndan <b>$nikopost</b> Post C&#305;x&#305;ld&#305;..!<br/>";
}
break;
case 49:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=49&amp;ref=$ref&amp;auto=ok");
echo "Burdan Qizlarin Postun Deyise Bilersiz.!<br/><br/> ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set posts='".$nihadposts."'  Where sex = '1' ");
}
echo "Qizlarin Post Hesab&#305; <b>$nikopost</b> Post Edildi..!<br/>";
}
break;



case 50:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=50&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ki&#351;ilere Post Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` + '".$nihadposts."'  Where sex = '0' ");
}
echo "Ki&#351;ilerin Post Hesab&#305;na <b>$nikopost</b> Post Elave Edildi..!<br/>";
}
break;


case 51:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=51&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ki&#351;ilerin Post Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` - '".$nihadposts."'  Where sex = '0' ");
}
echo "Ki&#351;ilerin Post Hesab&#305;ndan <b>$nikopost</b> Post C&#305;x&#305;ld&#305;..!<br/>";
}
break;
case 52:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{


$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=52&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ki&#351;ilerin Postun Deyise Bile<br/><br/>  ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set posts='".$nihadposts."'  Where sex = '0' ");
}
echo "Ki&#351;ilerin Post Hesab&#305; <b>$nikopost</b> Post Edildi..!<br/>";
}
break;


case 16:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=16&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;ya Post Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` + '".$nihadposts."'");
}
echo " Ham&#305;n&#305;n Post Hesab&#305;na <b>$nikopost</b> Post Elave Edildi..!<br/>";
}
break;


case 17:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=17&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;n&#305;n Post Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set `posts` = `posts` - '".$nihadposts."'");
}
echo " Ham&#305;n&#305;n Post Hesab&#305;ndan <b>$nikopost</b> Post C&#305;x&#305;ld&#305;..!<br/>";
}
break;
case 18:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=18&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;n&#305;n Postun Deyise Bilersiz.!<br/><br/>  ";
print $_v->input("<input size=\"5\" name=\"nikopost\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Post<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');


}
else
{
{
$nihadposts=$_POST["nikopost"];
mysql_query ("Update users set posts='".$nihadposts."'");
}
echo "Ham&#305;n&#305;n Post Hesab&#305; <b>$nikopost</b> Post Edildi..!<br/>";
}
break;


case 19:
echo "&#8226; <a href=\"rehberlik.php?nn=20&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;ya Bal Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=21&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;n&#305;n Balin Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=22&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ham&#305;n&#305;n Balin Deyis</a><br/>";
echo " <br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=41&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlara Bal Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=42&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlarin Balin Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=43&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qizlarin Balin Deyis</a><br/>";
echo " <br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=44&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilere Bal Hediyye</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=45&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilerin Balin Azalt</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=46&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;ilerin Balin Deyis</a><br/>";
break;


case 41:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=41&amp;ref=$ref&amp;auto=ok");
echo "Burdan Yalniz Qizlara Bal Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');


}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` + '".$nihadbal."' Where sex = '1' ");
}
echo "Qizlarin Bal Hesab&#305;na <b>$nikobal</b> Bal Elave Edildi..!<br/>";
}
break;
case 42:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=42&amp;ref=$ref&amp;auto=ok");
echo "Burdan Qizlarin Bal Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` - '".$nihadbal."' Where sex = '1' ");
}
echo "Qizlarin Bal Hesab&#305;ndan <b>$nikobal</b> Bal C&#305;x&#305;ld&#305;..!<br/>";
}
break;


case 43:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=43&amp;ref=$ref&amp;auto=ok");
echo "Burdan Qizlarin Balin Deyise Bilersiz.!<br/><br/>  ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set bal='".$nihadbal."' Where sex = '1' ");
}
echo "Qizlarin Bal Hesab&#305; <b>$nikobal</b> Bal Edildi..!<br/>";
}
break;

case 44:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=44&amp;ref=$ref&amp;auto=ok");
echo "Burdan Yalniz Ki&#351;ilere Bal Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` + '".$nihadbal."' Where sex = '0' ");
}
echo "Ki&#351;ilerin Bal Hesab&#305;na <b>$nikobal</b> Bal Elave Edildi..!<br/>";
}
break;
case 45:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=45&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ki&#351;ilerin Bal Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` - '".$nihadbal."' Where sex = '0' ");
}
echo "Ki&#351;ilerin Bal Hesab&#305;ndan <b>$nikobal</b> Bal C&#305;x&#305;ld&#305;..!<br/>";
}
break;


case 46:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=46&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ki&#351;ilerin Balin Deyise Bilersiz.!<br/><br/>  ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');

}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set bal='".$nihadbal."' Where sex = '0' ");
}
echo "Ki&#351;ilerin Bal Hesab&#305; <b>$nikobal</b> Bal Edildi..!<br/>";
}
break;

case 20:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=20&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;ya Bal Hediyye Ede Bilersiz.!<br/><br/> + ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` + '".$nihadbal."'");
}
echo "Ham&#305;n&#305;n Bal Hesab&#305;na <b>$nikobal</b> Bal Elave Edildi..!<br/>";
}
break;


case 21:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=21&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;n&#305;n Bal Hesabin Azalda Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set `bal` = `bal` - '".$nihadbal."'");
}
echo "Ham&#305;n&#305;n Bal Hesab&#305;ndan <b>$nikobal</b> Bal C&#305;x&#305;ld&#305;..!<br/>";
}
break;
case 22:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=22&amp;ref=$ref&amp;auto=ok");
echo "Burdan Ham&#305;n&#305;n Balin Deyise Bilersiz.!<br/><br/> - ";
print $_v->input("<input size=\"5\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" emptyok=\"true\"/>").'-Bal<br/><br/>';
print $_v->submit('G&#246;nder','auto=ok');
}
else
{
{
$nihadbal=$_POST["nikobal"];
mysql_query ("Update users set bal='".$nihadbal."'");
}
echo "Ham&#305;n&#305;n Bal Hesab&#305; <b>$nikobal</b> Bal Edildi..!<br/>";
}
break;

case 23:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}


echo "<b>Onlayn Bonus Paneli.</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/balniko.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=23&amp;ref=$ref");
echo "Rejim\n";
if ($bonus == 1) {
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Ne&#231;e bal?: ";

print $_v->input("<input size=\"9\" name=\"nihadbal\" maxlength=\"9\" format=\"*N\" value=\"".$nihadbal."\" emptyok=\"false\"/>").'-Bal.<br/>';
echo "Vaxt?: ";
print $_v->input("<input size=\"9\" name=\"nikovaxt\" maxlength=\"9\" format=\"*N\" value=\"".$nikovaxt."\" emptyok=\"false\"/>").'-saniye.<br/>';
print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$nihadbal = trim($_POST["nihadbal"]);
$nikovaxt = trim($_POST["nikovaxt"]);
$bonus = trim($_POST["bonus"]);

$file = fopen("file/dat_folder/n_n/balniko.dat", "w");
$data .= "$nihadbal\n";
$data .= "$nikovaxt\n";
$data .= "$bonus\n";
fwrite($file, $data);
fclose($file);

echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;

case 24:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}


echo "<b>Uzun Nick Paneli.</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/uzunnick.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=24&amp;ref=$ref");
echo "Rejim\n";
if ($bonus == 1) {
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Ne&#231;e bal?: ";
print $_v->input("<input size=\"9\" name=\"nikovaxt\" maxlength=\"9\" format=\"*N\" value=\"".$nikovaxt."\" emptyok=\"false\"/>").'<br/>';
echo "Simvol?: ";
print $_v->input("<input size=\"9\" name=\"nihadbal\" maxlength=\"9\" format=\"*N\" value=\"".$nihadbal."\" emptyok=\"false\"/>").'<br/>';
print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$nihadbal = trim($_POST["nihadbal"]);
$nikovaxt = trim($_POST["nikovaxt"]);
$bonus = trim($_POST["bonus"]);

$file = fopen("file/dat_folder/n_n/uzunnick.dat", "w");
$data .= "$nihadbal\n";
$data .= "$nikovaxt\n";
$data .= "$bonus\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/uzunnick.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;
case 25:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}


echo "<b>&#304;nfo Paneli Aktiv Etdikde istifadecinin <b>Tam Melumati</b> Qoyacaginiz Limiti Kecenden Sonra Aktiv Olacaq..!</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/post.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=25&amp;ref=$ref");
echo "Rejim\n";
if ($bonus == 1) {
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonus\" value=\"".$bonus."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Limit: ";
print $_v->input("<input size=\"9\" name=\"nikovaxt\" maxlength=\"9\" format=\"*N\" value=\"".$nikovaxt."\" emptyok=\"false\"/>").'<br/>';

echo "Emir\n";

print $_v->select("<select name=\"nihadbal\" value=\"".$nihadbal."\">|<option value=\"Post\">Post</option>|<option value=\"bal\">Bal</option></select>",'null').'<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$nihadbal = trim($_POST["nihadbal"]);
$nikovaxt = trim($_POST["nikovaxt"]);
$bonus = trim($_POST["bonus"]);

$file = fopen("file/dat_folder/n_n/post.dat", "w");
$data .= "$nihadbal\n";
$data .= "$nikovaxt\n";
$data .= "$bonus\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/post.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;
case 26:
$y0nnn=file("file/dat_folder/n_n/reg.dat");
$y0n_url = $y0nnn[0];
$y0n_time = trim($y0nnn[1]);

if (!$_POST["nihadniko"])
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=26&amp;ref=$ref");


print $_v->submit('Y&#246;nelt','nihadniko=add');

$_v->divide();
if ($y0n_time > time()) {
echo "<b>Qeydiyyat hal haz&#305;rda y&#246;nlendirilib!.</b><br/>";
echo "Unvan: <b>".$y0n_url."</b><br/>";
} else {
echo "Qeydiyyat hal haz&#305;rda he&#231; bir &#231;ata y&#246;nlendirilmeyib!.<br/>";
}
}
else
if ($_POST["nihadniko"]=="add")
{
echo "&#199;at&#305;n adresi (http:// yazma!):<br/>";

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=26&amp;ref=$ref");


print $_v->input("<input type=\"text\" name=\"urlu$ref\" maxlength=\"50\"/>").'<br/>';



echo "M&#252;ddet:<br/>";

print $_v->input("<input type=\"text\" name=\"mud$ref\" maxlength=\"3\" size=\"3\"/>").'<br/>';

print $_v->select("<select name=\"mudd\" value=\"mudd$ref\">|<option value=\"3600\">Saat</option>|<option value=\"86400\">G&#252;n</option></select>",'null').'<br/>';


print $_v->submit('Y&#246;nelt','nihadniko=save');


}
else
if ($_POST["nihadniko"]=="save")
{
$urlu = mysql_escape_string($_POST["urlu"]);
$mud = trim($_POST["mud"]);
$mudd = trim($_POST["mudd"]);
$muddd = ($mud * $mudd) + time();

$file = fopen("file/dat_folder/n_n/reg.dat", "w");
$data .= "$urlu\n";
$data .= "$muddd\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/reg.dat", 0777);
echo "Qeydiyyat y&#246;nlendirildi!.<br/>";
}
break;
case 27:
echo "Meqa istifade&#231;iler:<br/>";
echo "*****<br/>";
echo "<a href=\"rehberlik.php?nn=28&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qiymet</a><br/>";
echo "*****<br/>";
$x = intval($_GET['x']);
if ($x!=0) {
mysql_query ("update `users` set meqa = '0', meqa_time = '0' where `id` = '".$x."';");
echo "Qeyd etdiyiniz istifade&#231;inin meqa niki le&#287;v olundu.<br/>";
} else {
$ALL = @MYSQL_QUERY("SELECT COUNT(id) FROM users WHERE meqa_time > '".time()."';");
$TOTAL = @MYSQL_RESULT($ALL, 0);
$MAX = 10;
$PAGE = (!ISSET($_GET['page'])) ? 0 : intval($_GET['page']);
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE) {
    $START = 0;
}
$SQL = @MYSQL_QUERY("SELECT id,user,meqa,meqa_time FROM users WHERE meqa_time > '".time()."' ORDER BY meqa_time DESC LIMIT $START,$MAX;");
IF(@MYSQL_AFFECTED_ROWS() == FALSE) {
    ECHO "&#199;atda hal-haz&#305;rda meqa istifade&#231;i yoxdur.<br/>\n";
}
WHILE($OBJ = @MYSQL_FETCH_OBJECT($SQL)) {

    $meqa = $OBJ->meqa;

    if ($meqa == 1) {
        $dn1 = "<b>";
        $dn2 = "</b>";
    } else if ($meqa == 2) {
        $dn1 = "<i>";
        $dn2 = "</i>";
    } else if ($meqa == 3) {
        $dn1 = "<b><i>";
        $dn2 = "</i></b>";
    } else if ($meqa == 4) {
        $dn1 = "<big>";
        $dn2 = "</big>";
    } else {
        $dn1 = "";
        $dn2 = "";
    }

    ECHO ($START+1).") ".$dn1."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$OBJ->id."&amp;ref=$ref\">".$OBJ->user."</a>".$dn2." [<a href=\"rehberlik.php?nn=27&amp;x=".$OBJ->id."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]<br/>\n";
    ++$START;
}
IF($TOTAL > $MAX) {
    ECHO navigation("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=27&amp;ref=$ref", $TOTAL, $MAX, $PAGE);
}
}
break;




case 28:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>Meqa Nick Qiymet</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$rpos = file("file/dat_folder/n_n/meqa_niko.dat");
$meqa1 = trim($rpos[0]);
$meqa2 = trim($rpos[1]);
$meqa3 = trim($rpos[2]);
$meqa4 = trim($rpos[3]);
$bonuss = trim($rpos[4]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=28&amp;ref=$ref");


echo "Rejim\n";
if ($bonuss == 1) {
print $_v->select("<select name=\"bonuss\" value=\"".$bonuss."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonuss\" value=\"".$bonuss."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Qalin: ";
print $_v->input("<input size=\"9\" name=\"meqa1\" maxlength=\"9\" format=\"*N\" value=\"".$meqa1."\" emptyok=\"false\"/>").'<br/>';
echo "Kursiv : ";
print $_v->input("<input size=\"9\" name=\"meqa2\" maxlength=\"9\" format=\"*N\" value=\"".$meqa2."\" emptyok=\"false\"/>").'<br/>';
echo "Qalin, Kursiv : ";
print $_v->input("<input size=\"9\" name=\"meqa3\" maxlength=\"9\" format=\"*N\" value=\"".$meqa3."\" emptyok=\"false\"/>").'<br/>';
echo "Boyuk : ";
print $_v->input("<input size=\"9\" name=\"meqa4\" maxlength=\"9\" format=\"*N\" value=\"".$meqa4."\" emptyok=\"false\"/>").'<br/>';



print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$meqa1 = trim($_POST["meqa1"]);
$meqa2 = trim($_POST["meqa2"]);
$meqa3 = trim($_POST["meqa3"]);
$meqa4 = trim($_POST["meqa4"]);
$bonuss = trim($_POST["bonuss"]);

$file = fopen("file/dat_folder/n_n/meqa_niko.dat", "w");
$data .= "$meqa1\n";
$data .= "$meqa2\n";
$data .= "$meqa3\n";
$data .= "$meqa4\n";
$data .= "$bonuss\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/meqa_niko.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;
case 29:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!$_POST['nn']){
$sto = file("file/dat_folder/n_n/znaknihad_niko.dat");
$znak1 = trim($sto[0]);
$znak2 = trim($sto[1]);
$znak3 = trim($sto[2]);
$znak4 = trim($sto[3]);
$znak5 = trim($sto[4]);
$znak6 = trim($sto[5]);
ECHO "<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Znak elave et</a><br/>\n";

echo "<b>Znak Qiymet Paneli</b>:<br/>\n";
$_v->divide();

echo "<b>Qiymeti Teyin Edin</b>:<br/>\n";
$_v->divide();
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=29&amp;ref=$ref");

echo "1 saat ";
print $_v->input("<input size=\"3\" name=\"saat$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak1."\" emptyok=\"false\"/>").'-Bal<br/>';
echo "12 saat ";
print $_v->input("<input size=\"3\" name=\"saati$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak2."\" emptyok=\"false\"/>").'-Bal<br/>';
echo "1 g&#252;n ";
print $_v->input("<input size=\"3\" name=\"gun$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak3."\" emptyok=\"false\"/>").'-Bal<br/>';
echo "3 g&#252;n ";
print $_v->input("<input size=\"3\" name=\"guni$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak4."\" emptyok=\"false\"/>").'-Bal<br/>';
echo "7 g&#252;n ";
print $_v->input("<input size=\"3\" name=\"ygun$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak5."\" emptyok=\"false\"/>").'-Bal<br/>';
echo "30 g&#252;n ";
print $_v->input("<input size=\"3\" name=\"ogun$ref\" maxlength=\"33\" format=\"*N\" value=\"".$znak6."\" emptyok=\"false\"/>").'-Bal<br/>';

$_v->divide();

print $_v->submit('Deyi&#351;','nn=ok');
}else{
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
file_put_contents('file/dat_folder/n_n/znaknihad_niko.dat',$saat."\n".$saati."\n".$gun."\n".$guni."\n".$ygun."\n".$ogun);
@chmod("file/dat_folder/n_n/znaknihad_niko.dat", 0777);
}

break;



case 30:

if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/ndehliz.dat");
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
$number_15 = trim($file[14]);
$number_16 = trim($file[15]);
$number_17 = trim($file[16]);
$number_18 = trim($file[17]);
$number_19 = trim($file[18]);
$number_20 = trim($file[19]);
$number_21 = trim($file[20]);
$number_22 = trim($file[21]);
$number_23 = trim($file[22]);
$number_24 = trim($file[23]);
$number_25 = trim($file[24]);
$number_26 = trim($file[25]);
$number_27 = trim($file[26]);
$number_28 = trim($file[27]);
$number_29 = trim($file[28]);
$number_30 = trim($file[29]);
$number_31 = trim($file[30]);
$number_32 = trim($file[31]);
$number_33 = trim($file[32]);
$number_34 = trim($file[33]);
$number_35 = trim($file[34]);
$number_36 = trim($file[35]);
$number_37 = trim($file[36]);
$number_38 = trim($file[37]);
$number_39 = trim($file[38]);
$number_40 = trim($file[39]);
$number_41 = trim($file[40]);
$number_42 = trim($file[41]);
$number_43 = trim($file[42]);
$number_44 = trim($file[43]);
$number_45 = trim($file[44]);
$number_46 = trim($file[45]);
$number_47 = trim($file[46]);
$number_48 = trim($file[47]);
$number_49 = trim($file[48]);
$number_50 = trim($file[49]);
$number_51 = trim($file[50]);
$number_52 = trim($file[51]);

$number_53 = trim($file[52]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=30&amp;ref=$ref");

echo "<b>Dehlizin Link Adlar&#305;</b><br/>\n";
$_v->divide();
echo "<i>Her hans&#305; linkin adin deyi&#351;e bilersiz. Deaktivle&#351;dirmek &#252;&#231;&#252;n link ad&#305; yerine</i> <b>x</b> <i>yaz&#305;n</i><br/>";
$_v->divide();


echo "Adminle Elaqe<br/>";

print $_v->input("<input type=\"text\" name=\"number_47$ref\" value=\"".$number_47."\" size=\"12\"/>").'<br/>';



echo "G&#252;n&#252;n Aktivi<br/>";
print $_v->input("<input type=\"text\" name=\"number_45$ref\" value=\"".$number_45."\" size=\"12\"/>").'<br/>';


echo "Onlayn SmS<br/>";
if ($number_1 == 1) {
print $_v->select("<select name=\"number_1\" value=\"".$number_1."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_1\" value=\"".$number_1."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Sende &#246;z&#252;n&#252; G&#246;ster<br/>";
print $_v->input("<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"12\"/>").'<br/>';

echo "---(ara xett)<br/>";

print $_v->input("<input type=\"text\" name=\"number_44$ref\" value=\"".$number_44."\" size=\"12\"/>").'<br/>';

echo "Saat tarix<br/>";
if ($number_51 == 1) {
print $_v->select("<select name=\"number_51\" value=\"".$number_51."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_51\" value=\"".$number_51."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "Hesabina Bal Elave Et!<br/>";
print $_v->input("<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"12\"/>").'<br/>';


echo "Online Duraka (Kart)<br/>";
print $_v->input("<input type=\"text\" name=\"number_39$ref\" value=\"".$number_39."\" size=\"12\"/>").'<br/>';



echo "Virtual-Qefes<br/>";
print $_v->input("<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"12\"/>").'<br/>';

echo "Aktivliyiniz<br/>";

print $_v->input("<input type=\"text\" name=\"number_29$ref\" value=\"".$number_29."\" size=\"12\"/>").'<br/>';

echo "<br/>";


echo "Rengli Nick AL<br/>";

print $_v->input("<input type=\"text\" name=\"number_48$ref\" value=\"".$number_48."\" size=\"12\"/>").'<br/>';


echo "Meqa Nick AL<br/>";

print $_v->input("<input type=\"text\" name=\"number_49$ref\" value=\"".$number_49."\" size=\"12\"/>").'<br/>';



echo "<br/>";

echo "GOLD User<br/>";

print $_v->input("<input type=\"text\" name=\"number_41$ref\" value=\"".$number_41."\" size=\"12\"/>").'<br/>';

echo "Anti-&#304;qnor Sistemi<br/>";

print $_v->input("<input type=\"text\" name=\"number_42$ref\" value=\"".$number_42."\" size=\"12\"/>").'<br/>';

echo "---(ara xett)<br/>";

print $_v->input("<input type=\"text\" name=\"number_43$ref\" value=\"".$number_43."\" size=\"12\"/>").'<br/>';

echo "<br/>";


echo "Top-10<br/>";
print $_v->input("<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"12\"/>").'<br/>';

echo "Idare Heyyeti<br/>";
print $_v->input("<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"12\"/>").'<br/>';

echo "CHAT`in En Varlilari*<br/>";
print $_v->input("<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"12\"/>").'<br/>';


echo "Bal xidmetleri<br/>";

print $_v->input("<input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"12\"/>").'<br/>';


echo "R&#252;tbelerin Sat&#305;&#351;&#305;<br/>";

print $_v->input("<input type=\"text\" name=\"number_50$ref\" value=\"".$number_50."\" size=\"12\"/>").'<br/>';


echo "Forum<br/>";

print $_v->input("<input type=\"text\" name=\"number_9$ref\" value=\"".$number_9."\" size=\"12\"/>").'<br/>';

echo "Etiraflar<br/>";

print $_v->input("<input type=\"text\" name=\"number_10$ref\" value=\"".$number_10."\" size=\"12\"/>").'<br/>';

echo "Marqali Hekaye<br/>";

print $_v->input("<input type=\"text\" name=\"number_11$ref\" value=\"".$number_11."\" size=\"12\"/>").'<br/>';

echo "MP3 Baza(Pulsuz)<br/>";

print $_v->input("<input type=\"text\" name=\"number_12$ref\" value=\"".$number_12."\" size=\"12\"/>").'<br/>';
echo "VIDEO Baza(Pulsuz)<br/>";

print $_v->input("<input type=\"text\" name=\"number_52$ref\" value=\"".$number_52."\" size=\"12\"/>").'<br/>';

echo "SEKIL Baza(Pulsuz)<br/>";

print $_v->input("<input type=\"text\" name=\"number_53$ref\" value=\"".$number_53."\" size=\"12\"/>").'<br/>';


echo "ID N&#246;mrem<br/>";

print $_v->input("<input type=\"text\" name=\"number_13$ref\" value=\"".$number_13."\" size=\"12\"/>").'<br/>';

echo "Hesab&#305;mdak&#305; BaL<br/>";

print $_v->input("<input type=\"text\" name=\"number_14$ref\" value=\"".$number_14."\" size=\"12\"/>").'<br/>';

echo "Cemi Postum<br/>";


print $_v->input("<input type=\"text\" name=\"number_15$ref\" value=\"".$number_15."\" size=\"12\"/>").'<br/>';


echo "<br/>";

echo "Yenile<br/>";

print $_v->input("<input type=\"text\" name=\"number_16$ref\" value=\"".$number_16."\" size=\"12\"/>").'<br/>';

echo "Online Mesaj<br/>";

print $_v->input("<input type=\"text\" name=\"number_17$ref\" value=\"".$number_17."\" size=\"12\"/>").'<br/>';


echo "K ";


print $_v->input("<input type=\"text\" name=\"number_18$ref\" value=\"".$number_18."\" size=\"3\"/>").' Q ';
print $_v->input("<input type=\"text\" name=\"number_19$ref\" value=\"".$number_19."\" size=\"3\"/>").'<br/>';


echo "CHAT (S&#246;hbet Otaqlar&#305;)<br/>";

print $_v->input("<input type=\"text\" name=\"number_20$ref\" value=\"".$number_20."\" size=\"12\"/>").'<br/>';

echo "[&#350;exsi Kabinetim]<br/>";

print $_v->input("<input type=\"text\" name=\"number_21$ref\" value=\"".$number_21."\" size=\"12\"/>").'<br/>';

echo "Anketime baxanlar<br/>";

print $_v->input("<input type=\"text\" name=\"number_22$ref\" value=\"".$number_22."\" size=\"12\"/>").'<br/>';

echo "Beyendiklerim<br/>";

print $_v->input("<input type=\"text\" name=\"number_23$ref\" value=\"".$number_23."\" size=\"12\"/>").'<br/>';

echo "Contact List<br/>";

print $_v->input("<input type=\"text\" name=\"number_24$ref\" value=\"".$number_24."\" size=\"12\"/>").'<br/>';


echo "---(ara xett)<br/>";

print $_v->input("<input type=\"text\" name=\"number_25$ref\" value=\"".$number_25."\" size=\"12\"/>").'<br/>';

echo "<br/>";


echo "Mesaj Qutusu<br/>";

print $_v->input("<input type=\"text\" name=\"number_26$ref\" value=\"".$number_26."\" size=\"12\"/>").'<br/>';


echo "MMS Qutusu<br/>";

print $_v->input("<input type=\"text\" name=\"number_28$ref\" value=\"".$number_28."\" size=\"12\"/>").'<br/>';

echo "---(ara xett)<br/>";
print $_v->input("<input type=\"text\" name=\"number_31$ref\" value=\"".$number_31."\" size=\"12\"/>").'<br/>';

echo "<br/>";




echo "Qalereya<br/>";
print $_v->input("<input type=\"text\" name=\"number_30$ref\" value=\"".$number_30."\" size=\"12\"/>").'<br/>';


echo "Duel Oyunu<br/>";

print $_v->input("<input type=\"text\" name=\"number_34$ref\" value=\"".$number_34."\" size=\"12\"/>").'<br/>';

echo "Kazino Oyunlari<br/>";

print $_v->input("<input type=\"text\" name=\"number_32$ref\" value=\"".$number_32."\" size=\"12\"/>").'<br/>';

echo "Virtual Bilik<br/>";
print $_v->input("<input type=\"text\" name=\"number_40$ref\" value=\"".$number_40."\" size=\"12\"/>").'<br/>';

echo "---(ara xett)<br/>";
print $_v->input("<input type=\"text\" name=\"number_33$ref\" value=\"".$number_33."\" size=\"12\"/>").'<br/>';

echo "<br/>";

echo "Nick Axtar<br/>";


print $_v->input("<input type=\"text\" name=\"number_35$ref\" value=\"".$number_35."\" size=\"12\"/>").'<br/>';

echo "Smaylikler<br/>";
print $_v->input("<input type=\"text\" name=\"number_36$ref\" value=\"".$number_36."\" size=\"12\"/>").'<br/>';


echo "Qaydalar<br/>";
print $_v->input("<input type=\"text\" name=\"number_37$ref\" value=\"".$number_37."\" size=\"12\"/>").'<br/>';


echo "&#199;at Statistika<br/>";
print $_v->input("<input type=\"text\" name=\"number_38$ref\" value=\"".$number_38."\" size=\"12\"/>").'<br/>';


echo "Yeni Gelen<br/>";

print $_v->input("<input type=\"text\" name=\"number_46$ref\" value=\"".$number_46."\" size=\"12\"/>").'<br/>';


$_v->divide();


print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');

} else {
$save = @fopen("file/dat_folder/n_n/ndehliz.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
$data .= trim($number_5)."\n";
$data .= trim($number_6)."\n";
$data .= trim($number_7)."\n";
$data .= trim($number_8)."\n";
$data .= trim($number_9)."\n";
$data .= trim($number_10)."\n";
$data .= trim($number_11)."\n";
$data .= trim($number_12)."\n";
$data .= trim($number_13)."\n";
$data .= trim($number_14)."\n";
$data .= trim($number_15)."\n";
$data .= trim($number_16)."\n";
$data .= trim($number_17)."\n";
$data .= trim($number_18)."\n";
$data .= trim($number_19)."\n";
$data .= trim($number_20)."\n";
$data .= trim($number_21)."\n";
$data .= trim($number_22)."\n";
$data .= trim($number_23)."\n";
$data .= trim($number_24)."\n";
$data .= trim($number_25)."\n";
$data .= trim($number_26)."\n";
$data .= trim($number_27)."\n";
$data .= trim($number_28)."\n";
$data .= trim($number_29)."\n";
$data .= trim($number_30)."\n";
$data .= trim($number_31)."\n";
$data .= trim($number_32)."\n";
$data .= trim($number_33)."\n";
$data .= trim($number_34)."\n";
$data .= trim($number_35)."\n";
$data .= trim($number_36)."\n";
$data .= trim($number_37)."\n";
$data .= trim($number_38)."\n";
$data .= trim($number_39)."\n";
$data .= trim($number_40)."\n";
$data .= trim($number_41)."\n";
$data .= trim($number_42)."\n";
$data .= trim($number_43)."\n";
$data .= trim($number_44)."\n";
$data .= trim($number_45)."\n";
$data .= trim($number_46)."\n";
$data .= trim($number_47)."\n";
$data .= trim($number_48)."\n";
$data .= trim($number_49)."\n";
$data .= trim($number_50)."\n";
$data .= trim($number_51)."\n";
$data .= trim($number_52)."\n";
$data .= trim($number_53)."\n";


@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/ndehliz.dat", 0777);
echo "Dehliz link adlari qeyd etdiyiniz kimi deyi&#351;dirildi..!<br/>\n";
}
break;
case 31:
if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/onphp.dat");
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
$number_15 = trim($file[14]);
$number_16 = trim($file[15]);
$number_17= trim($file[16]);
$number_18 = trim($file[17]);
$number_19 = trim($file[18]);
$number_20 = trim($file[19]);
$number_21= trim($file[20]);
$number_22= trim($file[21]);
$number_23= trim($file[22]);
$number_24= trim($file[23]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=31&amp;ref=$ref");

echo "<b>Onlayn link adlar&#305;.</b><br/>\n";
$_v->divide();
echo "<i>Her hans&#305; linkin adin deyi&#351;e bilersiz. Deaktivle&#351;dirmek &#252;&#231;&#252;n link ad&#305; yerine</i> <b>x</b> <i>yaz&#305;n</i><br/>";
$_v->divide();
echo "<b>Onlaynda Niklerin 1 Sehifede Sayi:</b><br/>";
echo "Komputer ";
print $_v->input("<input type=\"text\" name=\"number_13$ref\" value=\"".$number_13."\" size=\"3\"/>").' Telefon ';

print $_v->input("<input type=\"text\" name=\"number_14$ref\" value=\"".$number_14."\" size=\"3\"/>").'<br/>';



$_v->divide();
echo "Sevimli Anket<br/>";

if ($number_22 == 1) {
print $_v->select("<select name=\"number_22\" value=\"".$number_22."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_22\" value=\"".$number_22."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Onlayn SmS<br/>";
if ($number_15 == 1) {
print $_v->select("<select name=\"number_15\" value=\"".$number_15."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_15\" value=\"".$number_15."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
///
echo "Forum Random<br/>";

if ($number_23 == 1) {
print $_v->select("<select name=\"number_23\" value=\"".$number_23."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_23\" value=\"".$number_23."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Hekaye Random<br/>";

if ($number_24 == 1) {
print $_v->select("<select name=\"number_24\" value=\"".$number_24."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_24\" value=\"".$number_24."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}



echo "Hesabina Bal Yukle<br/>";

print $_v->input("<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"12\"/>").'<br/>';

echo "CHAT (S&#246;hbet otaqlar&#305;)<br/>";
print $_v->input("<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"12\"/>").'<br/>';
echo "Mesajlar&#305;n<br/>";

print $_v->input("<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"12\"/>").'<br/>';

echo "Yenile<br/>";

print $_v->input("<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"12\"/>").'<br/>';



echo "Online ";
print $_v->input("<input type=\"text\" name=\"number_11$ref\" value=\"".$number_11."\" size=\"4\"/>").' Nefer ';

print $_v->input("<input type=\"text\" name=\"number_12$ref\" value=\"".$number_12."\" size=\"4\"/>").'<br/>';



echo "K ";
print $_v->input("<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"3\"/>").' Q ';

print $_v->input("<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"3\"/>").'<br/>';


echo "Xal al: irelide g&#246;r&#252;n<br/>";
print $_v->input("<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"12\"/>").'<br/>';
///elave

echo "Znak Al<br/>";
print $_v->input("<input type=\"text\" name=\"number_17$ref\" value=\"".$number_17."\" size=\"12\"/>").'<br/>';
echo "Rengli Nik<br/>";
print $_v->input("<input type=\"text\" name=\"number_18$ref\" value=\"".$number_18."\" size=\"12\"/>").'<br/>';
echo "Meqa Nik<br/>";
print $_v->input("<input type=\"text\" name=\"number_19$ref\" value=\"".$number_19."\" size=\"12\"/>").'<br/>';
echo "Dueller<br/>";
print $_v->input("<input type=\"text\" name=\"number_20$ref\" value=\"".$number_20."\" size=\"12\"/>").'<br/>';


///eave son
echo "&#350;ekilleri<br/>";
print $_v->input("<input type=\"text\" name=\"number_16$ref\" value=\"".$number_16."\" size=\"12\"/>").'<br/>';

echo "Arxiv Qutusu<br/>";

print $_v->input("<input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"12\"/>").'<br/>';

echo "&#350;exsi Kabinetim<br/>";
print $_v->input("<input type=\"text\" name=\"number_9$ref\" value=\"".$number_9."\" size=\"12\"/>").'<br/>';

echo "Dehliz<br/>";

print $_v->input("<input type=\"text\" name=\"number_10$ref\" value=\"".$number_10."\" size=\"12\"/>").'<br/>';

$_v->divide();


print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');

} else {
$save = @fopen("file/dat_folder/n_n/onphp.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
$data .= trim($number_5)."\n";
$data .= trim($number_6)."\n";
$data .= trim($number_7)."\n";
$data .= trim($number_8)."\n";
$data .= trim($number_9)."\n";
$data .= trim($number_10)."\n";
$data .= trim($number_11)."\n";
$data .= trim($number_12)."\n";
$data .= trim($number_13)."\n";
$data .= trim($number_14)."\n";
$data .= trim($number_15)."\n";
$data .= trim($number_16)."\n";
$data .= trim($number_17)."\n";
$data .= trim($number_18)."\n";
$data .= trim($number_19)."\n";
$data .= trim($number_20)."\n";
$data .= trim($number_21)."\n";
$data .= trim($number_22)."\n";
$data .= trim($number_23)."\n";
$data .= trim($number_24)."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/onphp.dat", 0777);
echo "Onlayn link adlari qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
}
break;

case 32:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}


echo "<b>Bonus Kupon Paneli.</b><br/>";

echo "&#8226; <a href=\"rehberlik.php?nn=73&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye Elave Et</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=75&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye Qazananlar</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=74&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyyeler</a><br/>";
$_v->divide();
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/onlineniko.dat");
$bonusn = trim($rpos[0]);
$cpon = trim($rpos[1]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=32&amp;ref=$ref");

echo "Rejim\n";
if ($bonusn == 1) {
print $_v->select("<select name=\"bonusn\" value=\"".$bonusn."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonusn\" value=\"".$bonusn."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "Kpon Vaxti Saniye: ";

print $_v->input("<input size=\"9\" name=\"cpon\" maxlength=\"9\" format=\"*N\" value=\"".$cpon."\" emptyok=\"false\"/>").'<br/>';

$_v->divide();


print $_v->submit('Deyi&#351;','deyish=ok');

} else {
$bonusn = trim($_POST["bonusn"]);
$cpon = trim($_POST["cpon"]);
$file = fopen("file/dat_folder/n_n/onlineniko.dat", "w");
$data .= "$bonusn\n";
$data .= "$cpon\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/onlineniko.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;

case 73:

if (!$_POST["deyish"]) {
 echo "Meble&#287;<br/>";
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=73&amp;ref=$ref");
 
print $_v->input("<input name=\"mebleg$re\" emptyok=\"false\"/>").'<br/>';

 echo "Hediyye<br/>"; 

print $_v->select("<select name=\"hed$ref\">|<option value=\"bal\">Bal</option>|<option value=\"posts\">Post</option>|<option value=\"credits\">Cavab</option></select>",'null').'<br/>';



print $_v->submit('Elave Et','deyish=ok');

 }else{ 
 $yenihed = false; 
 $hediyye = array("bal","posts","credits"); 
 if(!preg_match("!^[0-9]+$!i",$mebleg)){ 
 $yenihed = true; 
 }else if(!in_array($hed,$hediyye)){ 
 $yenihed = true; 
 } 
 if($yenihed==false){ 
 mysql_query ("Select * from online where mebleg='".$mebleg."' and name='".$hed."'"); 
 if (mysql_affected_rows()==0){ 
 mysql_query ("INSERT INTO online SET mebleg = '".$mebleg."', name = '".$hed."', time = '".time()."'"); 
 echo "Elave Olundu..!<br/>"; 
 }else{ 
 echo "Mebleg Bazada Var..!<br/>"; 
 } 
 }else{ 
 echo "Xeta bas verdi.<br/>"; 
 } 
 }
 break;

case 74: 
 $connect = mysql_query("SELECT * FROM `online`;"); 
 $cemi = mysql_num_rows($connect); 
 if($cemi==0){ 
 echo "Hediyye elave edilmeyib!..<br/>"; 
 } 
$onu = mysql_num_rows(mysql_query("SELECT * FROM online"));
$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($onu/$max_page) < $page)
{
$start = 0;
$end = $max_page;
}

 if(isset($HTTP_GET_VARS['del']) and $id==1){ 
 mysql_query("DELETE FROM online WHERE id='".$HTTP_GET_VARS['del']."'"); 
 } 

 $q = mysql_query("SELECT * FROM `online` ORDER BY `time` DESC LIMIT $start, $max_page;"); 
 while ($inf = mysql_fetch_array($q)){ 
 $m = $inf['mebleg']; 
 $nn = $inf['name']; 

 if($nn=="bal"){ 
 $nn="Bal"; 
 }else if($nn=="posts"){ 
 $nn="Post"; 
 }else if($nn=="credits"){ 
 $nn="Cavab"; 
 } 

 echo "".($start+1).") Hediyye: <b>$m</b> - <u>$nn</u>"; 
 echo " [<a href=\"rehberlik.php?del=".$inf["id"]."&amp;nn=74&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]<br/>"; 
 ++$start; 
 } 
 
if($onu > $max_page)
{
$_v->divide();
echo navigation("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=74&amp;ref=$ref", $onu, $max_page, $page);
}
break;
case 75:
$file = file("file/dat_folder/n_n/chat.dat"); 
$total = count($file); 
if($total!='0'){
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=81&amp;ref=$ref\">Temizle</a><br/>";
$_v->divide();
echo "Hediyye Qazananlar cemi <b>".$total."</b> nefer<br/>\n"; 
$_v->divide();
}
$max = 10;
$page = preg_replace('/[^0-9]/', '', $page);
$start = (!isset($page)) ? 0 : ($page * $max);
$end = (!isset($page)) ? $max : ($start + $max);
if(ceil($total/$max) < $page)
{
$start=0;
$end=$max;
}
while ($start <= $end - 1)
{
$file = file("file/dat_folder/n_n/chat.dat"); 
$file = array_reverse($file); 
if(!empty($file[$start]))
{
echo ($start+1).") ".$file[$start].""; 
echo "<br/>"; 
}
++$start;
}
if($total > $max)
{

$_v->divide();
echo navigation("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=75&amp;ref=$ref",$total,$max,$page);

}
 if($total < 1){ 
 echo "Hediyye Qazanan olmayib..!<br/>"; 
 } 
 break; 

 
case 33:
if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/indexphp.dat");
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
$number_15 = trim($file[14]);
$number_16 = trim($file[15]);
$number_17 = trim($file[16]);
$number_18 = trim($file[17]);
$number_19 = trim($file[18]);
$number_100 = trim($file[19]);
$number_200 = trim($file[20]);


$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=33&amp;ref=$ref");

echo "<b>index link adlar&#305;.</b><br/>\n";
$_v->divide();
echo "<i>Her hans&#305; linkin adin deyi&#351;e bilersiz. Deaktivle&#351;dirmek &#252;&#231;&#252;n link ad&#305; yerine</i> <b>x</b> <i>yaz&#305;n</i><br/>";
$_v->divide();
echo "Onlayn SmS<br/>";
if ($number_1 == 1) {
print $_v->select("<select name=\"number_1\" value=\"".$number_1."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_1\" value=\"".$number_1."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "VIDEO Baza(Pulsuz)<br/>";

if ($number_19 == 1) {
print $_v->select("<select name=\"number_19\" value=\"".$number_19."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_19\" value=\"".$number_19."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "SEKIL Baza(Pulsuz)<br/>";

if ($number_200 == 1) {
print $_v->select("<select name=\"number_200\" value=\"".$number_200."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_200\" value=\"".$number_200."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}



echo "CATIN YARASIQLILARI<br/>";

if ($number_100 == 1) {
print $_v->select("<select name=\"number_100\" value=\"".$number_100."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_100\" value=\"".$number_100."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "Adminle Elaqe<br/>";

print $_v->input("<input type=\"text\" name=\"number_18$ref\" value=\"".$number_18."\" size=\"12\"/>").'<br/>';

echo "Online ";
print $_v->input("<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"4\"/>").' nefer ';

print $_v->input("<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"4\"/>").'<br/>';

echo "Nick ve ya ID<br/>";
print $_v->input("<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"12\"/>").'<br/>';


echo "Parol<br/>";

print $_v->input("<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"12\"/>").'<br/>';

echo "Daxil Ol<br/>";

print $_v->input("<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"12\"/>").'<br/>';

echo "Qeydiyyat<br/>";

print $_v->input("<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"12\"/>").'<br/>';





echo "Yeni istifade&#231;i<br/>";

print $_v->input("<input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"12\"/>").'<br/>';

echo "Yeni gelenler<br/>";

print $_v->input("<input type=\"text\" name=\"number_9$ref\" value=\"".$number_9."\" size=\"12\"/>").'<br/>';

echo "Cemi qeydiyyat<br/>";

print $_v->input("<input type=\"text\" name=\"number_10$ref\" value=\"".$number_10."\" size=\"12\"/>").'<br/>';

echo "O&#287;lanlar<br/>";

print $_v->input("<input type=\"text\" name=\"number_11$ref\" value=\"".$number_11."\" size=\"12\"/>").'<br/>';

echo "Q&#305;zlar<br/>";

print $_v->input("<input type=\"text\" name=\"number_12$ref\" value=\"".$number_12."\" size=\"12\"/>").'<br/>';


echo "Max Online<br/>";

print $_v->input("<input type=\"text\" name=\"number_13$ref\" value=\"".$number_13."\" size=\"12\"/>").'<br/>';

echo "Tarix<br/>";

print $_v->input("<input type=\"text\" name=\"number_14$ref\" value=\"".$number_14."\" size=\"12\"/>").'<br/>';

echo "Son Hediyye<br/>";

print $_v->input("<input type=\"text\" name=\"number_15$ref\" value=\"".$number_15."\" size=\"12\"/>").'<br/>';



$_v->divide();
print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');


} else {
$save = @fopen("file/dat_folder/n_n/indexphp.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
$data .= trim($number_5)."\n";
$data .= trim($number_6)."\n";
$data .= trim($number_7)."\n";
$data .= trim($number_8)."\n";
$data .= trim($number_9)."\n";
$data .= trim($number_10)."\n";
$data .= trim($number_11)."\n";
$data .= trim($number_12)."\n";
$data .= trim($number_13)."\n";
$data .= trim($number_14)."\n";
$data .= trim($number_15)."\n";
$data .= trim($number_16)."\n";
$data .= trim($number_17)."\n";
$data .= trim($number_18)."\n";
$data .= trim($number_19)."\n";
$data .= trim($number_100)."\n";
$data .= trim($number_200)."\n";

@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/indexphp.dat", 0777);
echo "Index link adlari qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
}
break;

case 34:
if (!$_POST["NN"])
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=34&amp;ref=$ref");

print $_v->submit('Elave et','NN=add');


$_v->divide();
$sql = mysql_query("SELECT * FROM `AN_reklam` ORDER BY `id` asc;");
if(mysql_num_rows($sql) == 0) {
echo "Sayt&#305;n&#305;zda n&#252;mayi&#351; olunan reklam yoxdur.<br/>\n";
} else {
while($NN_s = mysql_fetch_array($sql))
{

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=34&amp;ref=$ref");

print $_v->submit('x','NN=del,rrid='.$NN_s['id']);


echo " <a href=\"http://".$NN_s["urlu"]."\">".$NN_s["adi"]."</a> - ".$NN_s["shuar"];
if ($NN_s["mud"]<time()) {
echo "(vaxt&#305; bitib)";
}
echo "<br/>";
}}
}
else
if ($_POST["NN"]=="add")
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=34&amp;ref=$ref");

echo "Sayt&#305;n ad&#305;:<br/>";
print $_v->input("<input type=\"text\" name=\"adi$ref\" maxlength=\"50\"/>").'<br/>';


echo "Reklam metni:<br/>";
print $_v->input("<input type=\"text\" name=\"shuar$ref\" maxlength=\"50\"/>").'<br/>';


echo "Sayt&#305;n adresi (http:// yazma!):<br/>";

print $_v->input("<input type=\"text\" name=\"urlu$ref\" maxlength=\"50\"/>").'<br/>';

echo "Reklam harda getsin?:<br/>";
print $_v->select("<select name=\"harda$ref\">|<option value=\"1\">&#199;at&#305;n giri&#351;i</option>|<option value=\"2\">&#199;at&#305;n Dehlizi</option>|<option value=\"3\">Online Mesaj</option></select>",'null').'<br/>';



echo "M&#252;ddet:<br/>";

print $_v->input("<input type=\"text\" name=\"mud$ref\" maxlength=\"3\" size=\"3\"/>");

print $_v->select("<select name=\"mudd$ref\">|<option value=\"3600\">Saat</option>|<option value=\"86400\">G&#252;n</option></select>",'null').'<br/>';



print $_v->submit('Elave Et','NN=insrt');

}
else
if ($_POST["NN"]=="insrt")
{
$adi = mysql_escape_string($_POST["adi"]);
$shuar = mysql_escape_string($_POST["shuar"]);
$urlu = mysql_escape_string($_POST["urlu"]);
$harda = trim($_POST["harda"]);
$mud = trim($_POST["mud"]);
$mudd = trim($_POST["mudd"]);
$muddd = ($mud * $mudd) + time();

mysql_query ("Select * from AN_reklam where adi = '".$adi."' and urlu = '".$urlu."'");
if (mysql_affected_rows() == false) {
mysql_query ("INSERT INTO AN_reklam SET adi = '".$adi."', shuar = '".$shuar."', urlu = '".$urlu."', harda = '".$harda."', mud = '".$muddd."'");
echo "Reklam elave olundu ve hal haz&#305;rda qeyd olunan sehifede n&#252;mayi&#351; olunur!.<br/>";
} else {
echo "Art&#305;q sistemde bu adl&#305; sayt&#305;n reklam&#305; m&#246;vcuddur!.<br/>";
}



}
else
if ($_POST["NN"]=="edit")
{

}
else
if ($_POST["NN"]=="save")
{

}else
if ($_POST["NN"]=="del")
{
mysql_query("DELETE FROM AN_reklam WHERE id = '".trim($_POST["rrid"])."'");
echo "Qeyd olunan reklam silindi!.<br/>";
} 
break;



case 35:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>&#199;atdan Xaric et Qiymeti</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaric1 = trim($xx1[0]);
$xaric2 = trim($xx1[1]);
$xaric3 = trim($xx1[2]);
$xaric4 = trim($xx1[3]);
$xaricc = trim($xx1[4]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=35&amp;ref=$ref");


echo "Rejim\n";
if ($xaricc == 1) {
print $_v->select("<select name=\"xaricc\" value=\"".$xaricc."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"xaricc\" value=\"".$xaricc."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "30 Deqiqe: ";
print $_v->input("<input size=\"9\" name=\"xaric1\" maxlength=\"9\" format=\"*N\" value=\"".$xaric1."\" emptyok=\"false\"/>").'<br/>';
echo "1 Saat : ";
print $_v->input("<input size=\"9\" name=\"xaric2\" maxlength=\"9\" format=\"*N\" value=\"".$xaric2."\" emptyok=\"false\"/>").'<br/>';
echo "2 Saat : ";
print $_v->input("<input size=\"9\" name=\"xaric3\" maxlength=\"9\" format=\"*N\" value=\"".$xaric3."\" emptyok=\"false\"/>").'<br/>';
echo "3 Saat : ";
print $_v->input("<input size=\"9\" name=\"xaric4\" maxlength=\"9\" format=\"*N\" value=\"".$xaric4."\" emptyok=\"false\"/>").'<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');
} else {
$xaric1 = trim($_POST["xaric1"]);
$xaric2 = trim($_POST["xaric2"]);
$xaric3 = trim($_POST["xaric3"]);
$xaric4 = trim($_POST["xaric4"]);
$xaricc = trim($_POST["xaricc"]);

$file = fopen("file/dat_folder/n_n/xaric_niko.dat", "w");
$data .= "$xaric1\n";
$data .= "$xaric2\n";
$data .= "$xaric3\n";
$data .= "$xaric4\n";
$data .= "$xaricc\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/xaric_niko.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;

case 36:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>Ferqli Nick Paneli</b><br/>";
$_v->divide();
if (!$_POST["deyish"]) {
$rpos = file("file/dat_folder/n_n/on_niko.dat");
$bal = trim($rpos[0]);
$ferqli = trim($rpos[1]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=36&amp;ref=$ref");

echo "Rejim\n";
if ($ferqli == 1) {
print $_v->select("<select name=\"ferqli\" value=\"".$ferqli."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"ferqli\" value=\"".$ferqli."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "Qiymeti: ";
print $_v->input("<input size=\"9\" name=\"bal\" maxlength=\"9\" format=\"*N\" value=\"".$bal."\" emptyok=\"false\"/>").'<br/>';


print $_v->submit('Deyi&#351;','deyish=ok');



} else {
$bal = trim($_POST["bal"]);
$ferqli = trim($_POST["ferqli"]);

$file = fopen("file/dat_folder/n_n/on_niko.dat", "w");
$data .= "$bal\n";
$data .= "$ferqli\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/on_niko.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;

case 37:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}


echo "<b>Missia Statistikada 100 Faiz Tam Dolduqda Verilecek Hediyye</b><br/>";
$_v->divide();
echo " <a href=\"rehberlik.php?nn=53&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Userlerin Faizin Deyis</a><br/>";
$_v->divide();
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/missia.dat");
$nihadpost = trim($rpos[0]);
$nikobal = trim($rpos[1]);
$bonusm = trim($rpos[2]);
$yer = trim($rpos[3]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=37&amp;ref=$ref");

echo "Rejim\n";
if ($bonusm == 1) {
print $_v->select("<select name=\"bonusm\" value=\"".$bonusm."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"bonusm\" value=\"".$bonusm."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}

echo "Faiz Gorulsun\n";

if ($yer == 0) {
print $_v->select("<select name=\"yer\" value=\"".$yer."\">|<option value=\"0\">Online</option>|<option value=\"1\">Dehliz</option>|<option value=\"2\">info</option></select>",'null').'<br/>';
}else if ($yer == 1) {
print $_v->select("<select name=\"yer\" value=\"".$yer."\">|<option value=\"1\">Dehliz</option>|<option value=\"0\">Online</option>|<option value=\"2\">info</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"yer\" value=\"".$yer."\">|<option value=\"2\">info</option>|<option value=\"0\">Online</option>|<option value=\"1\">Dehliz</option></select>",'null').'<br/>';
}


echo "Ne&#231;e bal?: ";

print $_v->input("<input size=\"9\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" value=\"".$nikobal."\" emptyok=\"false\"/>").'<br/>';


echo "Ne&#231;e post?: ";

print $_v->input("<input size=\"9\" name=\"nihadpost\" maxlength=\"9\" format=\"*N\" value=\"".$nihadpost."\" emptyok=\"false\"/>").'<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');

} else {
$nihadbal = trim($_POST["nihadbal"]);
$nikovaxt = trim($_POST["nikovaxt"]);
$bonusm = trim($_POST["bonusm"]);
$yer = trim($_POST["yer"]);

$file = fopen("file/dat_folder/n_n/missia.dat", "w");
$data .= "$nihadpost\n";
$data .= "$nikobal\n";
$data .= "$bonusm\n";
$data .= "$yer\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/missia.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;


case 53:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
if(!isset($auto))
{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=53&amp;ref=$ref");

echo "Siz Burdan Butun Userlerin Missia Faizlerin Deyise Bilersiz<br/>---<br/>";

print $_v->input("<input size=\"9\" name=\"action\" maxlength=\"9\" format=\"*N\" value=\"".$action."\" emptyok=\"false\"/>").'<br/>';

print $_v->submit('Deyi&#351;','auto=ok');
}
else
{
{
$action=$_POST["action"];
mysql_query ("Update users set `action` ='".$action."'");
}
echo " Missia faizler <b>$action</b> Edildi..!<br/>";
}
break;


case 38:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}

echo "<b>Yalanci User Elave Et</b><br/>";


if(!isset($mods)){

echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=38&amp;ref=$ref\">Yenile</a><br/>----<br/>";

$array_random_name = array("Aysel","Aygun","Sema","Vusale","Vuqar","Sadiq","Sahib","Sahil","Sevinc","Sevda","Seven_urek","Hesret","Cavan_","Guler_","Sevgi_","Sensiz_","Tural_","Nicat_","Duyqu");
$randoms = array_rand($array_random_name);




if($_v->ver=="wml"){

echo "User Nick: <input type=\"text\" value=\"".$array_random_name[$randoms].rand(0,44)."\" name=\"username{$ref}\"/><br/>";
echo "User Sex: <select name=\"sex\">
<option value=\"0\">Ki&#351;i</option>
<option value=\"1\">Qad&#305;n</option>
</select><br/>";

echo "<anchor title=\"go\">Elave et<go href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=38&amp;ref=$ref&amp;mods=useradd\" method=\"post\">\n";
echo "<postfield name=\"sex\" value=\"$(sex)\"/>\n";
echo "<postfield name=\"username\" value=\"$(username{$ref})\"/>\n";
echo "</go></anchor><br/>\n";


}else{
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=38&amp;ref=$ref&amp;mods=useradd");

echo "User Nick:";

print $_v->input("<input type=\"text\" value=\"".$array_random_name[$randoms].rand(0,44)."\" name=\"username$ref\"/>").'<br/>';

echo "User Sex:";

print $_v->select("<select name=\"sex\">|<option value=\"0\">Ki&#351;i</option>|<option value=\"1\">Qad&#305;n</option></select>",'null').'<br/>';

print $_v->submit('Elave et','mods=useradd');
}


}else{
$info = array("Hmmmmm","Sade Semimi","Xeyanete ve yalana nifet edirem","Sade semimi bir insanla Dost olmaq isteyirem","Tanls ol bilersen","Qisqanc,Wirin,Delisov,Decel bir insan","Tez Kuseyenem","Melumat Vermirem","Ne iwin var Anketimde ? ","Sene ne","Deye bilmerem","Maraqlidise ozun sorus");
$info_rand = array_rand($info);
$city = array("Baki","Gence","Mingecevir","Quba","Saatli","Lenkeran","Goranboy","Semkir","Fuzuli","Imisli","Agdas","Seki","Azerbaycan","Olmaz","Demirem","Bilmesen yaxsidi","Senlik Deyil","Dogma Baki","Baku");
$city_random = array_rand($city);
$sex = $_POST["sex"];
$username = $_POST["username"];
$mysql_user_test = mysql_num_rows(mysql_query("SELECT * FROM users WHERE user='".$username."'"));
if($sex!=0 && $sex!=1){
echo $auto_error;
}elseif(!ctype_digit($sex)){
echo $auto_error;
}elseif($mysql_user_test!=0){
echo "<br/>Bele &#304;stifade&#231;i M&#246;vcuddur.<br/>";
}elseif(strlen($username) > 20){
echo "<br/>&#304;stifade&#231;i ad&#305; 20 Simvoldan &#199;ox ola bilmez.<br/>";
}elseif(strlen($username) < 3){
echo "<br/>&#304;stifade&#231;i Ad&#305; 3 Simvoldan az ola bilmez.<br/>";
}else{
$levelselect = @mysql_query ("Select name from levels where level=0");
$levels = @mysql_fetch_array($levelselect);
$lev0 = $levels["name"];
$day = rand(10,31);
$month = rand(10,12);
$year = rand(1980,1995);
$birth = "$day-$month-$year";
$password_generate = array("seex","olmeaz","bakdi","azerbdaycan","sednsiz","heydat","dundya","gunfes","mafvraq","1235tt654","123tg45","1dfg234","sensizltffgik","dizftgayner","sadgfe","fay","sevmgvdeni","lovtge","sevrtgi");
$password = array_rand($password_generate);
if($sex==0){
$name_user = array("","SeNLiK DeYiL","BiLMeSeN De oLaR","Elmar","Yusif","elnur","Zaur","Xalid","Xaliq","Polad","Perviz","Delisov","Xaliq","Orxan","Nicat","Telman","Ulvu","Mirze","Mahir","Rahul","Rahib","Elvin","Tural","Vusal","Sadiq","Sahil","Rehman","Fuad");
$names = array_rand($name_user);
}elseif($sex==1){
$name_user = array("Bilmesen de olar","Maraqsizdi","Sene Ne","Demirem","","Gulsen","Guler","Ayten","Sevgi","Deli","Aytac","Gulcan","Gulten","Aygun","Aysel","Aydan","Fidan","Tenha","olmaz","Lale","Leyla","Gulnar","Sevda","Sevinc","Aysel","Aysun","jale","Ulviyye","Fidan","Gunel","Arzu","Sevgi_Meleyi","Oglana_Atval");
$names = array_rand($name_user);
}$setting = @mysql_query ("Select * from setting where klu4='1'");
$set = mysql_fetch_array ($setting);
$komputer = $set["komputer"];
$now = date("d-m-Y");
$lastuser = strtolower($username);
$ip_random = rand(0,255);
$user_ip = array("176.32.34.$ip_random","94.20.34.$ip_random","85.132.44.$ip_random","125.32.65.$ip_random","215.45.51.$ip_random","251.65.35.$ip_random","178.32.60.$ip_random","82.145.208.$ip_random","217.168.186.$ip_random","94.20.194.$ip_random");
$random_ip = array_rand($user_ip);
$user_agent = array("Opera/9.80 (Windows NT 6.1; U; az) Presto/2.7.62 Version/11.01","Nokia6300/2.0 (07.21) Profile/MIDP-2.0 Configuration/CLDC-1.1","Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.30567/28.2555; U; en) Presto/2.8.119 Version/11.10","Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.30567/28.2555; U; en) Presto/2.8.119 Version/11.10","Nokia6233/2.0 (05.60) Profile/MIDP-2.0 Configuration/CLDC-1.1","NokiaC-3/2.0 (05.60) Profile/MIDP-2.0 Configuration/CLDC-1.1","Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.52");
$random_agent = array_rand($user_agent);
$elave_time = time()+$vaxt;
$elave_sira = time()+$vaxt+300;
//$_active = rand(0,3860);
$posts_add = rand(0,96);
$time_active = rand(0,9999);
$insert_table_user = "Insert into users set user='".$username."', pass='".base64_encode($password_generate[$password])."', name='".$name_user[$names]."', sex='".$sex."', birth='".$birth."', infa='".$info[$info_rand]."', date='".$now."', city='".$city[$city_random]."', latuser = '".$lastuser."', user_ip='".$user_ip[$random_ip]."', user_soft = '".$user_agent[$random_agent]."', time='".$elave_time."', year = '".$year."',posts='".$posts_add."',nnposts='".$posts_add."',time_active='".$time_active."'";
if($sex==0){
$insert_conf = "UPDATE `conf` SET `kisi` = 1+kisi,son='".$username."',time='".time()."'";
}elseif($sex==1){
$insert_conf = "UPDATE `conf` SET `qadin` = 1+qadin,son='".$username."',time='".time()."'";
}if(mysql_query($insert_table_user)){
echo "<br/><b>$username</b> Adli Istifade&#231;i U&#287;urla bazaya elave Olundu. Te&#351;ekk&#252;rler<br/>";
mysql_query("UPDATE `yenigelen` SET `qsay` = 1+`qsay`, `saat` = '".$tm."'  where `useradd` ='1';");
if(mysql_query($insert_conf)){
echo "";
}else{
echo "Config Error ".mysql_error();
}}else{
echo "Bazada Problem var..<br/>";
}}}
break;


case 39:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "Chata Yalanci User Elave Et.<br/>";
$_v->divide();
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=40&amp;ref=$ref");




echo "Nik:<br/>\n";
print $_v->input("<input name=\"nik\" title=\"Nik\"/>").'<br/>';

echo "Say:<br/>\n";
//print $_v->input("<input name=\"say\" title=\"Say\"/>").'<br/>';
print $_v->select("<select name=\"say\">|<option value=\"1\">1</option>|<option value=\"5\">5</option>|<option value=\"10\">10</option>|<option value=\"20\">20</option>|<option value=\"50\">50</option>|<option value=\"100\">100</option>|<option value=\"500\">500</option>|<option value=\"1000\">1000</option></select>",'null').'<br/>';


echo "<b>*</b>Cins:<br/>\n";

print $_v->select("<select name=\"sex\">|<option value=\"0\">Ki&#351;i</option>|<option value=\"1\">Qad&#305;n</option></select>",'null').'<br/>';


echo "<b>*</b>Do&#287;um Tarixi:<br/>\n";
print $_v->input("<input size=\"2\" name=\"day\" maxlength=\"2\" format=\"*N\"/>");

print $_v->input("<input size=\"2\" name=\"month\" maxlength=\"2\" format=\"*N\"/>");
print $_v->input("<input size=\"4\" name=\"year\" maxlength=\"4\" format=\"*N\" emptyok=\"false\"/>").'<br/>';
print $_v->submit('Elave et','action=save');


break;
case 1112:
$_v->fsize1($fsize1);
if($id=='1' and $row['level']=='9'){

$user=$row["user"];
$nomre=$row["nomre"];

$userm = mysql_query ("select count(`id`) as `num` from `users` where `nomre` > '0' ;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];

if(!isset($s))$s=0;

$mx=round(($num/30)+0.45);

if($s>$mx)$s=$mx;
if($s==0)$s=1;

$ot=(($s-1)*30)+1;
$do=$s*30;

if($do>$num)$do=$num;

$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

if($num ==0){

echo "Nomresi olan yoxdur<br/>";

}

echo "Cemi: <b>$num</b> | <a href=\"rehberlik.php?nn=1112&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a><br/>\n";

echo $divide;

$r = mysql_query ("select id,user,sex,nomre from users where `nomre` > '0' order by sex desc limit $o,$do");

for ($i=$ot;$i<=$do;$i++){

$arr = mysql_fetch_array($r);

$login=$arr['user'];
$usid=$arr['id'];
$sex=$arr['sex'];
$nomre=$arr['nomre'];

if ($sex==0) $sex="Kisi";
else $sex="Qadin";

if(@$nomre){
$nomre = trim(" $nomre ");
$nomre = ereg_replace("994","0",$nomre);
}

echo ($i).") | <b>$sex</b> | <a href=\"wtai://wp/mc;+$nomre\">$nomre</a> | <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> |<br/>";

}

$next=$s+1;
$prev=$s-1;

if ($num>$do) {

$ot=(($next-1)*30)+1;
$do=$next*30;

if($do>$num)$do=$num;

echo $divide;

echo "<a href=\"rehberlik.php?nn=1112&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";

}

if($s>1) {

$ot=(($prev-1)*30)+1;
$do=$prev*30;

echo "<a href=\"rehberlik.php?nn=1112&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";

}

}



break;

case 1111:

if(!isset($_POST['action'])) {
if($_v->ver != "wml"){
echo "<form action=\"rehberlik.php?nn=$nn&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
}
$file = file("file/dat_folder/rutbe1.dat");
$l8 = trim($file[0]);
$l7 = trim($file[1]);
$l6 = trim($file[2]);
$l5 = trim($file[3]);
$l4 = trim($file[4]);
$number = trim($file[5]);
$active = trim($file[6]);

echo "<u>R&#252;tbelerin sat&#305;&#351; qiymetleri</u>:<br/>\n";
echo $divide;
$lev = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($lev);
echo "- <u>Istediyiniz Qizil ID Nomresi </u>:\n";
echo "<input type=\"text\" name=\"l8$re\" maxlength=\"3\" value=\"".$l8."\" format=\"*N\" size=\"3\"/> AZN<br/>";


$lev = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($lev);
echo "- <u>Istediyiniz Gumus ID Nomresi</u> :\n";
echo "<input type=\"text\" name=\"l7$re\" maxlength=\"3\" value=\"".$l7."\" format=\"*N\" size=\"3\"/> AZN<br/>";


$lev = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($lev);
echo "- <u>Guzgu ID Nomresi</u> :\n";
echo "<input type=\"text\" name=\"l6$re\" maxlength=\"3\" value=\"".$l6."\" format=\"*N\" size=\"3\"/> AZN<br/>";


$lev = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($lev);
echo "- <u>Sonu 00 iLe Biten</u> :\n";
echo "<input type=\"text\" name=\"l5$re\" maxlength=\"3\" value=\"".$l5."\" format=\"*N\" size=\"3\"/> AZN<br/>";

$lev = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($lev);
echo "- <u>Oz Istediyi Id Nomresi</u> :\n";
echo "<input type=\"text\" name=\"l4$re\" maxlength=\"3\" value=\"".$l4."\" format=\"*N\" size=\"3\"/> AZN<br/>";



echo "- &#399;laq&#601; n&#246;mr&#601;si:\n";

echo "<input type=\"text\" name=\"number$re\" maxlength=\"10\" value=\"".$number."\" format=\"*N\" size=\"10\"/><br/>";

echo "- &#304;&#351; prinsipi:\n";

echo "<select name=\"active$re\" value=\"".$active."\">\n";
echo "<option value=\"1\">Aktiv</option>\n";
echo "<option value=\"0\">Deaktiv</option>\n";
echo "</select><br/>\n";


echo $divide;
if($_v->ver != "wml"){
echo "<input type=\"hidden\" name=\"action\" value=\"ok\"/>\n";
echo "<input value=\"Deyi&#351;\" class=\"head\" style=\"margin:6px 0 5px 0;\" type=\"submit\"></form>\n";
}else{
echo "[<anchor title=\"nn\">Deyi&#351;<go href=\"rehberlik.php?nn=1111&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"l8\" value=\"$(l8$re)\"/>";
echo "<postfield name=\"l7\" value=\"$(l7$re)\"/>";
echo "<postfield name=\"l6\" value=\"$(l6$re)\"/>";
echo "<postfield name=\"l5\" value=\"$(l5$re)\"/>";
echo "<postfield name=\"l4\" value=\"$(l4$re)\"/>";
echo "<postfield name=\"number\" value=\"$(number$re)\"/>";
echo "<postfield name=\"active\" value=\"$(active$re)\"/>";
echo "<postfield name=\"action\" value=\"ok\"/>";
echo "</nn></anchor>]<br/>";
}
} else {
$save = @fopen("file/dat_folder/rutbe1.dat", "w");
$data .= $l8."\n";
$data .= $l7."\n";
$data .= $l6."\n";
$data .= $l5."\n";
$data .= $l4."\n";
$data .= $number."\n";
$data .= $active."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
echo "Melumatlar qeyd etdiyiniz kimi deyi&#351;dirildi!<br/>\n";
echo "<a href=\"rehberlik.php?nn=$nn&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}

break;


case 40:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>Yalanci Userler</b><br/><br/>";

$nik = trim($_POST['nik']);
$say = intval($_POST['say']);
$latuser = strtolower($nik);
$day = trim($_POST['day']);
$day = ereg_replace(" +"," ",$day);
$month = trim($_POST['month']);
$month = ereg_replace(" +"," ",$month);
$year = trim($_POST['year']);
$year = ereg_replace(" +"," ",$year);

$levelselect = @mysql_query ("Select name from levels where level=0");
$levels = @mysql_fetch_array($levelselect);
$lev0 = $levels["name"];
$birth = $day."-".$month."-".$year;
$now = date("d-m-Y");


for ($i = 0; $i < $say; ++$i) {
$maxID=mysql_result(mysql_query("SELECT MAX(`id`) FROM `users`"), 0)+1;
$rand = rand(1111,9999);
if (mysql_query("Insert into users set user='".$nik."', pass='".base64_encode($rand)."', sex='".$sex."',name='?????', birth='".$birth."', meqsed='0', date='".$now."', latuser = '".$latuser."', time='".time()."'+'".$vaxt."', status = '".$lev0."', year = '".$year."';")) {
$ID = mysql_insert_id();
echo "<u>".$nik."</u> iD= ".$ID."<br/>\n";
if($sex==0){  
mysql_query("UPDATE `conf` SET `kisi` = 1+`kisi`, `son` = '".$nik."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$SERVER_TIME."'  where `acar` ='1';");
}elseif($sex==1){ 
mysql_query("UPDATE `conf` SET `qadin` = 1+`qadin`, `son` = '".$nik."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$SERVER_TIME."'  where `acar` ='1';");
}

} else {
echo mysql_error();
}
}

break;




case 54:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$file = "file/dat_folder/show_foto.inc";
@require "$file";

if(!isset($_POST['nniko'])){
echo "<b>Show Foto Functions</b>:<br/>\n";
$_v->divide();
echo "Oyuna &#350;ekil Elave Etmek:<br/>";
$_v->action("rehberlik.php?nn=54&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

print $_v->input("<input name=\"bal$ref\" value=\"".$footo['bal']."\" size=\"8\"/>").'Bal<br/>';
$_v->divide();
echo "Oyuna &#350;ekil Elave Limiti:<br/>";
print $_v->input("<input name=\"max$ref\" value=\"".$footo['max']."\" size=\"8\"/>").'-i&#351;tirak&#231;i<br/>';
$_v->divide();
echo "Rejim<br/>";

if($footo[aktiv] == 1){
print $_v->select("<select name=\"aktiv\" value=\"".$footo['aktiv']."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"aktiv\" value=\"".$footo['aktiv']."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
$_v->divide();
print $_v->submit('Deyi&#351;dir','nniko=ok');

$_v->divide();
echo "<b>Show Delete Panel:</b><br/>\n";
$_v->divide();

echo "<a href=\"rehberlik.php?nn=55&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yar&#351;mani Temizle</a><br/>";
echo "<a href=\"rehberlik.php?nn=56&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yar&#351;madaki Sesleri Temizle</a><br/>";

}else{

  $fpp = fopen($file, 'w');
$data .= '<?php //foto'."\n";
$data .= '$footo = array('."\n";


$data .= '    "bal" => "'.trim($_POST['bal']).'",'."\n";
$data .= '    "aktiv" => "'.trim($_POST['aktiv']).'",'."\n";
$data .= '    "max" => "'.trim($_POST['max']).'",'."\n";

$data .= ');'."\n";
$data .= '?>';
fputs($fpp, $data);
@chmod($file,0777);
echo "Melumat deyi&#351;dirildi..!<br/>";
}
break;
case 55:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$ALBOM = @MYSQL_QUERY("SELECT * FROM `show_foto` where `photo` != ''");
WHILE($ALB = @MYSQL_FETCH_OBJECT($ALBOM))
  {

 unlink("show_foto/".$ALB->photo."");

 }
 mysql_query("DELETE FROM show_foto");
  echo "Butun Yari&#351;ma Arxivi ve Bazadaki &#350;ekiller silindi..!<br/>";
  break;
case 56:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("DELETE FROM show_ses");
 $cem = "Update show_foto set vote = '0'";
mysql_query ($cem);
echo "Butun Yari&#351;madaki Sesler ve Ses verenler Silindi..!<br/>";
  break;




require("file/dat_folder/n_n/reg_time.inc");
$vaxt_gun = $reg['qeyd_time'] - time();
////
$s_gun = $vaxt_gun / 86400;
$gun_tam = strtok($s_gun,'.');
$gun_san = $gun_tam * 86400;

// Saat
$s_san = $vaxt_gun / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;

$saat_hesab = ($vaxt_gun - $gun_san) / 3600;
$saat = strtok($saat_hesab,'.');
// Deqiqe
$d = $vaxt_gun / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($vaxt_gun - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $vaxt_gun - $deqiqe_san;
  break;

case 58:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
  $file = "file/dat_folder/n_n/reg_time.inc";
@require "$file";

# Vaxt aktiv olanda
if($reg[qeyd_time]>time()) {
$vaxt_gun = $reg[qeyd_time] - time();
////
$s_gun = $vaxt_gun / 86400;
$gun_tam = strtok($s_gun,'.');
$gun_san = $gun_tam * 86400;

// Saat
$s_san = $vaxt_gun / 3600;
$saat_tam = strtok($s_san,'.');
$saat_san = $saat_tam * 3600;

$saat_hesab = ($vaxt_gun - $gun_san) / 3600;
$saat = strtok($saat_hesab,'.');
// Deqiqe
$d = $vaxt_gun / 60;
$dq_tam =strtok($d,'.');
$deqiqe_san = $dq_tam * 60;
$deqiqe_hesab = ($vaxt_gun - $saat_san) / 60;
$deqiqe = strtok($deqiqe_hesab,'.');
// Saniye
$saniye = $vaxt_gun - $deqiqe_san;

echo "Hazirda Komputerle Qeydiyyat Ba&#287;lidir!<br/>";
echo "Bitmesine";
if($gun_tam != 0) {
echo " $gun_tam g&#252;n";
}
if($saat != 0){
echo " $saat saat";
}
if($deqiqe != 0) {
echo " $deqiqe deq.";
}
if($saniye != 0) {
echo " $saniye san.";
}
echo " qalib<br/>";
echo "<a href=\"rehberlik.php?nn=59&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Vaxti Sifirla</a><br/>";

break;
}
#-------------------------------------------------------------------------------

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=58&amp;ref=$ref");





if(!isset($_POST['reg_vaxt'])){
echo "<b>Kom&#252;terle Qeydiyyati Ba&#287;la</b><br/>";
$_v->divide();

echo "M&#252;ddet";
print $_v->input("<input size=\"3\" name=\"reg_time$ref\" maxlength=\"3\" format=\"*N\" title=\"Vaxti Yazin\" emptyok=\"false\"/>").'<br/>';


print $_v->select("<select name=\"reg_vaxt$ref\">|<option value=\"0\">Deqiqe</option>|<option value=\"1\">Saat</option>|<option value=\"2\">G&#252;n</option></select>",'null').'<br/>';


print $_v->submit('Ba&#287;la','deyish=ok');

}else{
if($reg_vaxt==0) {
# Deqiqe
$bagla=$reg_time*60;
}elseif($reg_vaxt==1){
# Saat
$bagla=$reg_time*3600;
}elseif($reg_vaxt==2){
# Gun
$bagla=$reg_time*86400;
}
# Vaxt tesdiq
$qeyd_time = time()+$bagla;

$fpp = fopen($file, 'w');
$data .= '<?php //reg '."\n";
$data .= '$reg = array('."\n";
$data .= '    "qeyd_time" => "'.$qeyd_time.'",'."\n";
$data .= ');'."\n";
$data .= '?>';

fputs($fpp, $data);
@fclose($file);
@chmod($file,0777);
echo "Melumat deyi&#351;dirildi..!<br/>";
$_v->divide();
echo "<a href=\"rehberlik.php?nn=58&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri</a><br/>";

}

break;
case 59:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
$file = "file/dat_folder/n_n/reg_time.inc";
@require "$file";
#-------------------------------------------------------------------------------
if($reg[qeyd_time]>time()) {
$qeyd_time = 0;
$fpp = fopen($file, 'w');
$data .= '<?php //reg '."\n";
$data .= '$reg = array('."\n";


$data .= '    "qeyd_time" => "'.$qeyd_time.'",'."\n";

$data .= ');'."\n";
$data .= '?>';

fputs($fpp, $data);
@fclose($file);
@chmod($file,0777);
echo "Melumat deyi&#351;dirildi..<br/>";
$_v->divide();
echo "<a href=\"rehberlik.php?nn=58&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri</a><br/>";
}else{
echo "Hazirda Vaxt Aktiv Deyil..!<br/>";
echo "---<br/>";
echo "<a href=\"rehberlik.php?nn=58&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri</a><br/>";
}
break;



case 60:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
echo "&#8226; <a href=\"rehberlik.php?nn=63&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">G&#252;nl&#252;k Postu Sifirla</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=64&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyun Postlarin Sifirla</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=62&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sual Cavablari Sifirla</a><br/>";
echo "&#8226; <a href=\"rehberlik.php?nn=61&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">B&#252;t&#252;n Xallari Sifirla</a><br/>";
break;
case 61:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("Update users set xal = '0'");
echo "B&#252;t&#252;n Xallar Sifirlandi..!<br/>";
break;
case 62:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("Update users set credits = '0'");
echo "Sual Cavablari Sifirlandi..!<br/>";
break;
case 63:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("Update users set nnposts = '0'");
echo "B&#252;t&#252;n g&#252;nl&#252;k postlar Sifirlandi..!<br/>";
break;
case 64:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur...<br/>\n";
break;
}
mysql_query("Update users set gposts = '0'");
echo "Oyun postlari Sifirlandi..!<br/>";
break;


case 65:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/elaqe.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
$number_5 = trim($file[4]);
$number_6 = trim($file[5]);
$number_7 = trim($file[6]);
$number_8 = trim($file[7]);
$number_9 = trim($file[8]);
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=65&amp;ref=$ref");
echo "<b>Elaqe paneli.</b><br/>\n";
$_v->divide();
echo "<i>Her hans&#305; bolmenin adini deyi&#351;dire bilersiz. Deaktivle&#351;dirmek &#252;&#231;&#252;n xanaya</i> <b>x</b> <i>yaz&#305;n</i><br/>";
$_v->divide();
echo "<b>Ad</b> <br/>";

print $_v->input("<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"12\"/>").'<br/>';

echo "<b>Familiya</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"12\"/>").'<br/>';
echo "<b>Tel(1)</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"12\"/>").'<br/>';
echo "<b>Tel (2)</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"12\"/>").'<br/>';
echo "<b>Tel(3)</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"12\"/>").'<br/>';
echo "<b>Mail</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"12\"/>").'<br/>';
echo "<b>Agent</b> <br/>";
print $_v->input("<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"12\"/>").'<br/>';

print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');



} else {
$save = @fopen("file/dat_folder/n_n/elaqe.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
$data .= trim($number_5)."\n";
$data .= trim($number_6)."\n";
$data .= trim($number_7)."\n";
$data .= trim($number_8)."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/elaqe.dat", 0777);
echo "Elaqe bolmesi qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
}
break;

case 66:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!$_POST['elave']){
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=66&amp;ref=$ref");
echo "Elave Edilecek Reklam:<br/>";

print $_v->input("<input name=\"reklam\" maxlength=\"15\" value=\"\" title=\"Nick\" emptyok=\"false\"/>").'<br/>';

$_v->divide();


print $_v->submit('Elave Et','elave=ok');


$_v->divide();
  $niko_freg=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM nikoreg2 "));
$niko_freg = $niko_freg[0];
echo "<a href=\"rehberlik.php?nn=67&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Elave Edilenler</a>($niko_freg)<br/>";
}else{
  $date = date("d-m-Y");
if(mysql_query("insert into nikoreg2 values(0,'$reklam','$date');")) {
echo "Elave Olundu!<br/>";
}else{
echo "".mysql_error()."<br/>";
}

}
break;
case 67:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=66\">Elave et</a>";
echo " / <a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;nn=68\">Axtar</a><br/>";
$userm = mysql_query ("select count(id) as num from nikoreg2;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
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
if($num ==0){

echo "<i>Elave edilmeyib !</i><br/>";
break;
}

$_v->divide();
$r = mysql_query ("select * from nikoreg2 order by date desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['name'];
$usid=$arr['whoid'];
$san=$arr['san'];
$act=$arr['id'];
echo ($i).") <b>$arr[reklam] - $arr[date]</b> [<a href=\"rehberlik.php?nn=69&amp;act=$act&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
$_v->divide();
echo "<a href=\"rehberlik.php?nn=67&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"rehberlik.php?nn=67&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}
break;
case 68:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}

if(!isset($bol)){
echo "Reklam<br/>";

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=68&amp;ref=$ref");

print $_v->input("<input name=\"reklam\" title=\"Axtar&#305;&#351;\"/>").'<br/>';

print $_v->submit('Axtar','bol=ok');

}else{
$select = @mysql_query ("Select `id`,`reklam`,`date` from `nikoreg2` where `reklam`='".$reklam."';");
if (mysql_affected_rows() == 0){	
echo "Reklam Tapilmadi<br/>";
}else{
$arr = mysql_fetch_array ($select);
echo "Reklam: <b>$arr[reklam]</b><br/>";
echo "Tarix: <b>$arr[date]</b><br/>";
echo "<a href=\"rehberlik.php?nn=69&amp;act=$arr[id]&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a><br/>";
	
}	
	
}

break;
/////

case 77:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}

echo "<b>info Status Panel..!</b><br/>";
echo $divide;
if (!$_POST["deyish"]) {
$nn = file("file/dat_folder/n_n/infostat.dat");
$nikobal = trim($nn[0]);
$simvol = trim($nn[1]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=77&amp;ref=$ref");
echo "Qiymet bal?: ";
print $_v->input("<input size=\"9\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" value=\"".$nikobal."\" emptyok=\"false\"/>").'<br/>';

echo "Simvol?: ";
print $_v->input("<input size=\"9\" name=\"simvol\" maxlength=\"9\" format=\"*N\" value=\"".$simvol."\" emptyok=\"false\"/>").'<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');

} else {
$nikobal = trim($_POST["nikobal"]);
$simvol = trim($_POST["simvol"]);
$file = fopen("file/dat_folder/n_n/infostat.dat", "w");
$data .= "$nikobal\n";
$data .= "$simvol\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/infostat.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;

/////
case 69:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(mysql_query("DELETE FROM `nikoreg2` WHERE `id` = '".$act."';")) {

echo "<b>Reklam silindi..!</b><br/>";

 } else {
 echo "<b>Baza ile elaqe yaranmir daha sonra yoxla...</b><br/>";
 }


break;
case 78:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<b>&#304;nfondan Qov Paneli..!</b><br/>";
echo $divide;
if (!$_POST["deyish"]) {

$rpos = file("file/dat_folder/n_n/nikobal.dat");
$nikobal = trim($rpos[0]);

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=78&amp;ref=$ref");

echo "Qiymet bal?: ";
print $_v->input("<input size=\"9\" name=\"nikobal\" maxlength=\"9\" format=\"*N\" value=\"".$nikobal."\" emptyok=\"false\"/>").'<br/>';

print $_v->submit('Deyi&#351;','deyish=ok');

} else {
$nikobal = trim($_POST["nikobal"]);
$file = fopen("file/dat_folder/n_n/nikobal.dat", "w");
$data .= "$nikobal\n";
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/nikobal.dat", 0777);
echo "Melumat qeyde al&#305;nd&#305;.<br/>";
}
break;
case 82:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/style.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
echo "Dizayn Duzeli&#351;leri...<br/>";
$_v->divide();
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=82ref=$ref");


echo "<a href=\"rehberlik.php?nn=91&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><b>Userlerin Stylin Deyi&#351;</b></a><br/><br/>";

echo "&#304;con Version<br/>";

if ($number_3 =="1") {
print $_v->select("<select name=\"number_3\" value=\"".$number_3."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_3\" value=\"".$number_3."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}


echo "Style Location<br/>";

if ($number_2 =="right") {
print $_v->select("<select name=\"number_2\" value=\"".$number_2."\">|<option value=\"right\">Sa&#287;</option>|<option value=\"left\">Sol</option>|<option value=\"center\">Orta</option></select>",'null').'<br/>';
}else if ($number_2 =="sol") {
print $_v->select("<select name=\"number_2\" value=\"".$number_2."\">|<option value=\"left\">Sol</option>|<option value=\"center\">Orta</option>|<option value=\"right\">Sa&#287;</option></select>",'null').'<br/>';
}else {
print $_v->select("<select name=\"number_2\" value=\"".$number_2."\">|<option value=\"center\">Orta</option>|<option value=\"right\">Sa&#287;</option>|<option value=\"left\">Sol</option></select>",'null').'<br/>';
}


echo "Milli Bayraq Versiya<br/>";

if ($number_4 =="1") {
print $_v->select("<select name=\"number_4\" value=\"".$number_4."\">|<option value=\"1\">A&#231;&#305;q</option>|<option value=\"0\">Ba&#287;l&#305;</option></select>",'null').'<br/>';
}else{
print $_v->select("<select name=\"number_4\" value=\"".$number_4."\">|<option value=\"0\">Ba&#287;l&#305;</option>|<option value=\"1\">A&#231;&#305;q</option></select>",'null').'<br/>';
}
echo "<br/> ";
print $_v->submit('Deyi&#351;','action=ok');
}else{
$number_1 = trim($_POST["number_1"]);
$number_2 = trim($_POST["number_2"]);
$number_3 = trim($_POST["number_3"]);
$save = @fopen("file/dat_folder/n_n/style.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/style.dat", 0777);
echo "Style qeyd etdiyiniz kimi deyi&#351;dirildi!..<br/>\n";
}
break;
case 83:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<u>Hediyye Panel</u><br/>";
echo $divide;
echo "<a href=\"hediyye_upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Hediyye y&#252;kle</a><br/>";
echo "<a href=\"rehberlik.php?nn=84&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Kategoriyalar</a><br/>";
echo "<a href=\"rehberlik.php?nn=85&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qiymetler</a><br/>";
break;
case 84:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
function full_del_dir($directory)
{
$dir = opendir($directory);
while ($file = readdir($dir))
{
if (is_file($directory."/".$file))
{
@unlink($directory."/".$file);
}
else if (is_dir($directory."/".$file) && $file != "." && $file != "..")
{
full_del_dir($directory."/".$file);
}

}
@closedir($dir);
@rmdir($directory);
}
function count_files($dirname){
if(is_dir($dirname)){
$dir_handle = opendir($dirname);
}
if(!$dir_handle){
return false;
}
$files = 0;
while($file = readdir($dir_handle)){
if($file != "." and $file != ".." and $file != ".htaccess" and $file != "Thumbs.db" and strrchr($file,'.')!=='.dat' and strrchr($file,'.')!=='.php' and strrchr($file,'.')!=='.wml' and strrchr($file,'.')!=='.inc'){
if(!is_dir($dirname."/".$file)){
$files++;
} else {
$files += count_files($dirname."/".$file);
}
}
}
closedir($dir_handle);
return $files;
}
echo "<u>Kategoriyalar</u><br/>".$divide;
echo "Qovluq ad&#305;:<br/>";
$_v->action("rehberlik.php?nn=84&amp;id=$id&amp;ps=$ps&amp;ref=".$ref);
print $_v->input("<input name=\"kategory$ref\" type=\"text\"/>")."<br/>\n";
print $_v->submit("Elave et","action=ok");

echo $divide;

echo "Temizlemek istediyiniz qovlu&#287;un qaba&#287;&#305;ndak&#305; [sil] i&#351;aresine t&#305;klay&#305;n.<br/>";
if(isset($_POST['action'])){
echo $divide;
$kategory = narmobil(trim($_POST['kategory']));
if(!preg_match("!^[a-z[ ]+$!i", strtolower($kategory)))
{
echo "Qovlu&#287;un ad&#305;nda qada&#287;an edilmi&#351; i&#351;areler var.<br/>";
}
else
{
if ( !is_dir( "hediyye/".$kategory ) )
{
@mkdir(addslashes("hediyye/".$kategory.""));
@chmod(addslashes("hediyye/".$kategory.""), 02777);
$file = fopen("hediyye/".$kategory."/post.dat", "w+");
fwrite($file, "0");
fclose($file);
@chmod(addslashes("hediyye/".$kategory."/post.dat"), 0666);
@copy("hediyye/.htaccess", "hediyye/".$kategory."/.htaccess");
echo "Qovluq yaradildi.<br/>";
}
else
{
echo "Bu ad &#252;zre qovluq m&#246;vcuddur.<br/>";
}
}
}
if(isset($_GET['delet']))
{
echo $divide;
if(!is_dir("hediyye/".trim($_GET['delet'])))
{
echo "<b>".trim($_GET['delet'])."</b> bu adda qovluq m&#246;vcud deyil.<br/>";
}
else
{
full_del_dir("hediyye/".trim($_GET['delet']));
if(count_files($_GET['delet'])> 3 )
{
echo "Qovlu&#287;u temizlemek m&#252;mk&#252;n deyil.<br/>";
}
else
{
echo "Qeyd etdiyiniz <b>".trim($_GET['delet'])."</b> adl&#305; qovluq temizlendi.<br/>";
}
}
}
echo $divide;
$dir = opendir("hediyye");
while($file = readdir($dir))
{
if($file != "." and $file != ".." and is_dir("hediyye/".$file))
{
echo "[<a href=\"rehberlik.php?nn=84&amp;id=$id&amp;ps=$ps&amp;$ref&amp;delet=$file\">sil</a>] -\n";
echo "<u>".$file." ".count_files("hediyye/".$file)."</u><br/>\n";
}
}
closedir($dir);

break;

case 85:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}

echo "<u>Qiymetler</u><br/>".$divide;
if(!isset($_POST['action']))
{
$_v->action("rehberlik.php?nn=85&amp;id=$id&amp;ps=$ps&amp;ref=".$ref);

$dir = opendir("hediyye");
$i=1;
while($file = readdir($dir))
{
if($file != "." and $file != ".." and is_dir("hediyye/".$file))
{
$f = file("hediyye/".$file."/post.dat");
$f = trim($f[0]);
print $_v->input("<input name=\"post_$i$ref\" value=\"$f\" size=\"5\"/>")." - <u>".$file."</u><br/>\n";
}
++$i;
}
closedir($dir);
echo $divide;
print $_v->submit("Melumat&#305; Deyi&#351;","action=ok");
}
else
{
$dir = opendir("hediyye");
$i=1;
while($file = readdir($dir))
{
if($file != "." and $file != ".." and is_dir("hediyye/".$file))
{
$data =  intval($_POST["post_$i"]);
$x_file = fopen("hediyye/".$file."/post.dat", "w+");
fwrite($x_file, $data);
fclose($x_file);
}
++$i;
}
closedir($dir);
echo "Qiymetler deyi&#351;dirildi.<br/>";
}
break;
case 86:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!isset($_POST['action'])){
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
$_v->action("rehberlik.php?nn=86&amp;id=$id&amp;ps=$ps&amp;ref=".$ref);
echo "<b>Rutbe Qiymetleri.</b><br/>\n";
$_v->divide();
echo "<i>Her hans&#305;n&#305; deaktivle&#351;dirmek &#252;&#231;&#252;n qiymet yerine</i> <b>x</b> <i>yaz&#305;n</i><br/>";
$_v->divide();
echo "<b>&#214;deni&#351;:</b><br/>";
print $_v->input("<input type=\"text\" name=\"number_13$ref\" value=\"".$number_13."\" size=\"12\"/>").'<br/>';

echo "Elaqe:<br/>";
print $_v->input("<input type=\"text\" name=\"number_14$ref\" value=\"".$number_14."\" size=\"12\"/>").'<br/>';
echo "<br/>";


$nn = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_1$ref\" value=\"".$number_1."\" size=\"12\"/>").' AZN<br/>';

echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_7$ref\" value=\"".$number_7."\" size=\"12\"/>").' AZN<br/>';
$nn = mysql_query("select level,name from levels where level = 8");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_2$ref\" value=\"".$number_2."\" size=\"12\"/>").' AZN<br/>';
echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_8$ref\" value=\"".$number_8."\" size=\"12\"/>").' AZN<br/>';
$nn = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_3$ref\" value=\"".$number_3."\" size=\"12\"/>").' AZN<br/>';
echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_9$ref\" value=\"".$number_9."\" size=\"12\"/>").' AZN<br/>';
$nn = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_4$ref\" value=\"".$number_4."\" size=\"12\"/>").' AZN<br/>';
echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_10$ref\" value=\"".$number_10."\" size=\"12\"/>").' AZN<br/>';

$nn = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_5$ref\" value=\"".$number_5."\" size=\"12\"/>").' AZN<br/>';
echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_11$ref\" value=\"".$number_11."\" size=\"12\"/>").' AZN<br/>';

$nn = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($nn);
echo "".$arr['name']."<br/>";
print $_v->input("<input type=\"text\" name=\"number_6$ref\" value=\"".$number_6."\" size=\"12\"/>").' AZN<br/>';
echo "N&#246;vbeti Ay<br/>";
print $_v->input("<input type=\"text\" name=\"number_12$ref\" value=\"".$number_12."\" size=\"12\"/>").' AZN<br/>';

$_v->divide();


print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');

} else {
$save = @fopen("file/dat_folder/n_n/rutbeal.dat", "w");
$data .= trim($number_1)."\n";
$data .= trim($number_2)."\n";
$data .= trim($number_3)."\n";
$data .= trim($number_4)."\n";
$data .= trim($number_5)."\n";
$data .= trim($number_6)."\n";
$data .= trim($number_7)."\n";
$data .= trim($number_8)."\n";
$data .= trim($number_9)."\n";
$data .= trim($number_10)."\n";
$data .= trim($number_11)."\n";
$data .= trim($number_12)."\n";
$data .= trim($number_13)."\n";
$data .= trim($number_14)."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/rutbeal.dat", 0777);
echo "Rutbe satis bolmesi qeyd etdiyiniz kimi deyi&#351;dirildi..!<br/>\n";
}
break;

case 88:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
echo "<u>Logo Rand Panel</u><br/>";
echo $divide;
echo "<a href=\"logo.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Logo y&#252;kle</a><br/>";
echo "<a href=\"rehberlik.php?nn=89&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Logo idare</a><br/>";
echo "<a href=\"rehberlik.php?nn=90&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Logo Sil</a><br/>";
break;

case 89:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!isset($_POST['action'])){
$file = @file("file/dat_folder/n_n/logo.dat");
$number_1 = trim($file[0]);

echo "Logo Melumat...<br/>";
$_v->divide();
$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=89ref=$ref");
echo "Logo Location<br/>";
if ($number_1 ==0) {
print $_v->select("<select name=\"number_1\">|<option value=\"0\">Bagl&#305;</option>|<option value=\"1\">&#199;at&#305;n giri&#351;i</option>|<option value=\"2\">&#199;at&#305;n Dehlizi</option>|<option value=\"3\">Giri&#351; ve Dehliz</option></select>",'null').'<br/>';
} else if ($number_1 ==1) {
print $_v->select("<select name=\"number_1\">|<option value=\"1\">&#199;at&#305;n giri&#351;i</option>|<option value=\"2\">&#199;at&#305;n Dehlizi</option>|<option value=\"3\">Giri&#351; ve Dehliz</option>|<option value=\"0\">Bagl&#305;</option></select>",'null').'<br/>';
}else if ($number_1 ==2) {
print $_v->select("<select name=\"number_1\">|<option value=\"2\">&#199;at&#305;n Dehlizi</option>|<option value=\"3\">Giri&#351; ve Dehliz</option>|<option value=\"1\">&#199;at&#305;n giri&#351;i</option>|<option value=\"0\">Bagl&#305;</option></select>",'null').'<br/>';
}else {
print $_v->select("<select name=\"number_1\">|<option value=\"3\">Giri&#351; ve Dehliz</option>|<option value=\"1\">&#199;at&#305;n giri&#351;i</option>|<option value=\"2\">&#199;at&#305;n Dehlizi</option>|<option value=\"0\">Bagl&#305;</option></select>",'null').'<br/>';
}


echo "<br/> ";
print $_v->submit('Deyi&#351;','action=ok');
}else{
$number_1 = trim($_POST["number_1"]);
$save = @fopen("file/dat_folder/n_n/logo.dat", "w");
$data .= trim($number_1)."\n";
@fwrite($save, $data);
@fflush($save);
@fclose($save);
@chmod("file/dat_folder/n_n/logo.dat", 0777);
echo "Logo melumat qeyd etdiyiniz kimi deyi&#351;dirildi..!<br/>\n";
}
break;

case 90:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
function count_files($dirname){
if(is_dir($dirname)){
$dir_handle = opendir($dirname);
}
if(!$dir_handle){
return false;
}
$files = 0;
while($file = readdir($dir_handle)){
if($file != "." and $file != ".." and $file != ".htaccess" and $file != "Thumbs.db" and strrchr($file,'.')!=='.dat' and strrchr($file,'.')!=='.php' and strrchr($file,'.')!=='.wml' and strrchr($file,'.')!=='.inc'){
if(!is_dir($dirname."/".$file)){
$files++;
} else {
$files += count_files($dirname."/".$file);
}
}
}
closedir($dir_handle);
return $files;
}
$count = count_files("logo");

if (file_exists("logo/$count.png"))
{
unlink("logo/$count.png");
echo "$count.png Logo silindi..!<br/>";
}else{
echo "Logo Yoxdur..!<br/>";
}
break;


case 91:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
if(!isset($_POST['action'])){
echo "Siz Butub userlerin style Secimin Deyi&#351;e Bilersiz..!<br/>";
$_v->divide();

$_v->action("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=91ref=$ref");
print $_v->select("<select name=\"style\">|<option value=\"wml\">Wml Sade</option>|<option value=\"win\">Windows Rengli</option>|<option value=\"vista1\">Sari Rengli</option>|<option value=\"vista2\">Yasil Rengli</option>|<option value=\"vista3\">Azeri Milli Rengli</option></select>",'null').'<br/>';
echo "<br/>";
print $_v->submit('Melumat&#305; Deyi&#351;','action=ok');

}else{

$versurl=trim($_POST["style"]);
mysql_query("Update `users` set `version`='".$versurl."'");

echo "Ham&#305;n&#305;n style secimi Deyi&#351;di..!<br/>";
}

break;


case 79:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
$file = file("file/dat_folder/n_n/saytgo.dat"); 
$total = count($file); 
if($total!='0'){
echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;nn=80&amp;ref=$ref\">Kecidleri Temizle</a><br/>";
$_v->divide();
echo "Sayta Cemi <b>".$total."</b> Kecid Edilib.<br/>\n"; 
$_v->divide();
}
$max = 10;
$page = preg_replace('/[^0-9]/', '', $page);
$start = (!isset($page)) ? 0 : ($page * $max);
$end = (!isset($page)) ? $max : ($start + $max);
if(ceil($total/$max) < $page)
{
$start=0;
$end=$max;
}
while ($start <= $end - 1)
{
$file = file("file/dat_folder/n_n/saytgo.dat"); 
$file = array_reverse($file); 
if(!empty($file[$start]))
{
echo ($start+1).") ".$file[$start].""; 
echo "<br/>"; 
}
++$start;
}
if($total > $max)
{

$_v->divide();
echo navigation("rehberlik.php?id=$id&amp;ps=$ps&amp;nn=79&amp;ref=$ref",$total,$max,$page);

}
 if($total < 1){ 
 echo "Chata Kecid Eden olmayib..!<br/>"; 
 } 
 break; 
case 80:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
$file = fopen("file/dat_folder/n_n/saytgo.dat", "w");
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/saytgo.dat", 0777);
 echo "Chata Kecid Arxivi Temizlendi..!<br/>"; 
 break; 
 
 case 81:
if($row['id']!=1){
echo "Daxil Olma Icazeniz Yoxdur..!<br/>\n";
break;
}
$file = fopen("file/dat_folder/n_n/chat.dat", "w");
fwrite($file, $data);
fclose($file);
@chmod("file/dat_folder/n_n/chat.dat", 0777);
 echo "Kpon Hediyye Qazananlar Arxivi Temizlendi..!<br/>"; 
 break;  
}
$_v->divide();
if($nn) echo "<a href=\"rehberlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Rehberlik Paneli</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>