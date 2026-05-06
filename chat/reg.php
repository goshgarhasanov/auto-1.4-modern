<?php
session_start();

require("inc.php");
$link = connect_db();
// reg(); — undefined helper, removed in modernization
if (function_exists('reg')) { reg(); }
require("antispam.php");
require("file/require/capchat.php");


$AsantPass = file(DOCUMENT_ROOT.'file/dat_folder/asant_pass.dat');
foreach($AsantPass as $val) {
if(trim($_POST['pass']) == trim($val)) {
$_v->title('Qeydiyyat');
$_v->fsize1('small');
echo "Se&#231;diyiniz &#351;ifre &#231;ox asantd&#305;r, Zehmet olmasa ba&#351;qa &#351;ifre se&#231;in.<br/>\n";
echo "****<br/>\n";
echo "<a href=\"reg.php?SID=".$session_id."&amp;re=$ref\">Geri Qay&#305;t</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
die();
}
}





$setting = @mysql_query ("Select * from `setting` where `klu4`='1'");
$set = mysql_fetch_array ($setting);
$setting = (object) $set;
$reg = $set["reg"];
$time_bal = $set["bal"];
$time_bal1 = $set["balq"];
$computer= $set["computer"];


$ip_name = is_opera($_SERVER['REMOTE_ADDR']);
$session_id = session_id();

/////////////////////////////////////////
if (bbses($_COOKIE['vreg'])>$SERVER_TIME){
$tkick = bbses($_COOKIE['vreg']) - $SERVER_TIME;
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

$_v->title('IP BAN!','center');
$_v->fsize1('small');
$_v->html('<div class="inputRed"><b>You IP Banned</b></div><br/>');
echo "Reklam ve ya s&#246;y&#252;&#351; xarakterli nik a&#231;maq istediyinize g&#246;re qeydiyyat&#305;n&#305;z ba&#287;lan&#305;b.<br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz.<br/>\n";
echo "----<br/><a href=\"license.php\">License</a><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}




if($_SESSION["regtime"]<$SERVER_TIME){
$_SESSION["regstr"]="newuser";
}


elseif(bbses($_SESSION["regstr"])!="newuser"){
$flodtime = bbses($_SESSION["regtime"])-$SERVER_TIME;
$_v->title('Qeydiyyat Dayandirilib','center');
$_v->fsize1('small');
echo "&#199;ata Qeydiyyat M&#252;veqqeti olaraq Ba&#287;lanm&#305;&#351;d&#305;r (Adminstrator Terefinden).<br/>";
echo "Daha Sonra Qeyd olma&#287;a &#231;al&#305;&#351;&#305;n..<br/>";
echo "H&#246;rmetle <b> $_AUTO[admin]</b><br/>----<br/>";
echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
};



mysql_query ("Select * from `bannlist` WHERE (`ip` = '".$REMOTE_MAX."')and(`soft` = 'IP-BAN');");
if (mysql_affected_rows()!=0) {
$_v->title('IP Adress BAN!','center');
$_v->fsize1('small');
echo "<b>Sizin Daxil olduqunuz IP Adress BAN Edilib!</b><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}

mysql_query ("Select * from `bannlist` WHERE (`ip` = '".$REMOTE_MAX."')and(`soft` = 'IP-BAN');");
if (mysql_affected_rows()!=0) {
$_v->title('IP Adress BAN!','center');
$_v->fsize1('small');
echo "<b>Sizin Daxil olduqunuz IP Adress BAN Edilib!</b><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
$icaze = 0;
$adamlar = @mysql_query ("SELECT * FROM `conf` where `acar` ='1';");
$mp = mysql_fetch_array ($adamlar);
$soft=$mp["soft"];
$ipp=$mp["ipp"];
$qip=$mp["qip"];
$qsoft=$mp["qsoft"];
$qtime=$mp["time"];


if($OPERATOR=='NULL' and !$ip_name){
$icaze = 1;
}


/* if($OPERATOR=='NULL'){
$icaze = 1;
$dostup1 = $ipp;
$dostup2 = $REMOTE_ADDRR;
}
else
{
$dostup1 = $soft;
$dostup2 = $HTTP_USER_AGENT;
}


if($dostup1==$dostup2){
$_v->title('Stop','center');
$_v->fsize1('small');
echo "<br/>Siz Chatdan Xaric Edilibsiz Vaxtin Bitmesini G&#246;zleyin.<br/>******<br/>\n";
echo "<i>Xaric Edilmi&#351; istifade&#231;ilere qeydiyyatdan ke&#231;mek qada&#287;an edilib</i><br/>******<br/>\n";
echo "<br/><a href=\"http://$site_url\">$site</a><br/>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
 */

if ($reg==0){
$_v->title('Qeydiyyat Dayandirilib','center');
$_v->fsize1('small');
echo "&#199;ata Qeydiyyat M&#252;veqqeti olaraq Ba&#287;lanm&#305;&#351;d&#305;r (Adminstrator Terefinden).<br/>";
echo "Daha Sonra Qeyd olma&#287;a &#231;al&#305;&#351;&#305;n..<br/>";
echo "Eger Qeydiyyat 1 g&#252;n erzinde ba&#287;l&#305; olarsa <b>$_AUTO[nomre]</b> n&#246;mresine m&#252;raciet edin.<br/>";
echo "H&#246;rmetle <b> $_AUTO[admin]</b><br/>----<br/>";
echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}

antiatackreg();
antiadeshtt();



if ($computer==0 and $icaze==1){
$_v->title('Qeydiyyat','center');
$_v->fsize1('small');
echo "Komp&#252;terle qeydiyyat ba&#287;l&#305;d&#305;r.<br/>----<br/>";
echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}


if(!isset($_POST['meqsed']))
{
$_v->title('Qeydiyyat');
$_v->fsize1('small');

$_v->action("reg.php?go=reg&amp;SID=$session_id");

echo "<b>Yeni Qeydiyyat</b><br/>";
$_v->divide();
echo "Leqeb:<br/>\n";
print $_v->input('<input name="user" maxlength="20" title="Leqebiniz (Nick)" emptyok="false"/>').'<br/>';

echo "&#350;ifre:<br/>\n";
print $_v->input('<input name="pass" maxlength="15" title="&#350;ifreniz" emptyok="false"/>').'<br/>';

echo "Ad&#305;n&#305;z:<br/>\n";
print $_v->input('<input name="name" maxlength="15" title="Real Ad&#305;n&#305;z" emptyok="false"/>').'<br/>';

echo "Cinsiniz:<br/>\n";
print $_v->select('<select name="sex">|<option value="0">Ki&#351;i</option>|<option value="1">Qad&#305;n</option>|</select>',$sex).'<br/>';

echo "Do&#287;um tarixiniz:<br/>\n";
print $_v->select('<select name=\"day\">|<option value=\"\">----</option>|<option value=\"01\">01</option>|<option value=\"02\">02</option>|<option value=\"03\">03</option>|<option value=\"04\">04</option>|<option value=\"05\">05</option>|<option value=\"06\">06</option>|<option value=\"07\">07</option>|<option value=\"08\">08</option>|<option value=\"09\">09</option>|<option value=\"10\">10</option>|<option value=\"11\">11</option>|<option value=\"12\">12</option>|<option value=\"13\">13</option>|<option value=\"14\">14</option>|<option value=\"15\">15</option>|<option value=\"16\">16</option>|<option value=\"17\">17</option>|<option value=\"18\">18</option>|<option value=\"19\">19</option>|<option value=\"20\">20</option>|<option value=\"21\">21</option>|<option value=\"22\">22</option>|<option value=\"23\">23</option>|<option value=\"24\">24</option>|<option value=\"25\">25</option>|<option value=\"26\">26</option>|<option value=\"27\">27</option>|<option value=\"28\">28</option>|<option value=\"29\">29</option>|<option value=\"30\">30</option>|<option value=\"31\">31</option>|</select>').'-'; print $_v->select('<select name=\"month\">|<option value=\"\">----</option>|<option value=\"01\">Yanvar</option>|<option value=\"02\">Fevral</option>|<option value=\"03\">Mart</option>|<option value=\"04\">Aprel</option>|<option value=\"05\">May</option>|<option value=\"06\">&#304;yun</option>|<option value=\"07\">&#304;yul</option>|<option value=\"08\">Avqust</option>|<option value=\"09\">Sentyabr</option>|<option value=\"10\">Oktyabr</option>|<option value=\"11\">Noyabr</option>|<option value=\"12\">Dekabr</option>|</select>').'-'; 
print $_v->input('<input size="4" name="year" maxlength="4" value=\"19\" format="*N" emptyok="false"/>').'<br/>';

echo "&#350;eher:<br/>\n";	
$optiona = "<select name=\"city\">|";
$optiona .= "<option value=\"Abseron\">Abseron</option>|";
$optiona .= "<option value=\"Agcabedi\">Agcabedi</option>|";
$optiona .= "<option value=\"Agdam\">Agdam</option>|";
$optiona .= "<option value=\"Agdas\">Agdas</option>|";
$optiona .= "<option value=\"Agstafa\">Agstafa</option>|";
$optiona .= "<option value=\"Agsu\">Agsu</option>|";
$optiona .= "<option value=\"Astara\">Astara</option>|";
$optiona .= "<option value=\"Baki\">Baki</option>|";
$optiona .= "<option value=\"Balaken\">Balaken</option>|";
$optiona .= "<option value=\"Berde\">Berde</option>\|";
$optiona .= "<option value=\"Beyleqan\">Beyleqan</option>|";
$optiona .= "<option value=\"Bilesuvar\">Bilesuvar</option>|";
$optiona .= "<option value=\"Cebrayil\">Cebrayil</option>|";
$optiona .= "<option value=\"Celilabad\">Celilabad</option>|";
$optiona .= "<option value=\"Daskesen\">Daskesen</option>|";
$optiona .= "<option value=\"Deveci\">Deveci</option>|";
$optiona .= "<option value=\"Fuzuli\">Fuzuli</option>|";
$optiona .= "<option value=\"Gedebey\">Gedebey</option>|";
$optiona .= "<option value=\"Gence\">Gence</option>|";
$optiona .= "<option value=\"Goranboy\">Goranboy</option>|";
$optiona .= "<option value=\"Goycay\">Goycay</option>|";
$optiona .= "<option value=\"Goy-gol\">Goy-gol</option>|";
$optiona .= "<option value=\"Haciqabul\">Haciqabul</option>|";
$optiona .= "<option value=\"Imisli\">Imisli</option>|";
$optiona .= "<option value=\"Ismayilli\">Ismayilli</option>|";
$optiona .= "<option value=\"Kelbecer\">Kelbecer</option>|";
$optiona .= "<option value=\"Kurdemir\">Kurdemir</option>|";
$optiona .= "<option value=\"Lacin\">Lacin</option>|";
$optiona .= "<option value=\"Lenkaran\">Lenkaran</option>|";
$optiona .= "<option value=\"Lerik\">Lerik</option>|";
$optiona .= "<option value=\"Masalli\">Masalli</option>|";
$optiona .= "<option value=\"Mingecevir\">Mingecevir</option>|";
$optiona .= "<option value=\"NMR-(Babek)\">NMR-(Babek)</option>|";
$optiona .= "<option value=\"NMR-(Culfa)\">NMR-(Culfa)</option>|";
$optiona .= "<option value=\"NMR-(Ordubad)\">NMR-(Ordubad)</option>|";
$optiona .= "<option value=\"NMR-(Sederek)\">NMR-(Sederek)</option>|";
$optiona .= "<option value=\"NMR-(Sahbuz)\">NMR-(Sahbuz)</option>|";
$optiona .= "<option value=\"NMR-(Serur)\">NMR-(Serur)</option>|";
$optiona .= "<option value=\"NMR-(Naxcivan)\">NMR-(Naxcivan)</option>|";
$optiona .= "<option value=\"Neftcala\">Neftcala</option>|";
$optiona .= "<option value=\"Oguz\">Oguz</option>|";
$optiona .= "<option value=\"Qax\">Qax</option>|";
$optiona .= "<option value=\"Qaradag\">Qaradag</option>|";
$optiona .= "<option value=\"Qazax\">Qazax</option>|";
$optiona .= "<option value=\"Qovlyar\">Qovlyar</option>|";
$optiona .= "<option value=\"Qebele\">Qebele</option>|";
$optiona .= "<option value=\"Qobustan\">Qobustan</option>|";
$optiona .= "<option value=\"Quba\">Quba</option>|";
$optiona .= "<option value=\"Qubadli\">Qubadli</option>|";
$optiona .= "<option value=\"Qusar\">Qusar</option>|";
$optiona .= "<option value=\"Saatli\">Saatli</option>|";
$optiona .= "<option value=\"Sabirabad\">Sabirabad</option>|";
$optiona .= "<option value=\"Salyan\">Salyan</option>|";
$optiona .= "<option value=\"Samux\">Samux</option>|";
$optiona .= "<option value=\"Siyezen\">Siyezen</option>|";
$optiona .= "<option value=\"Sumqayit\">Sumqayit</option>|";
$optiona .= "<option value=\"Shamaxi\">Shamaxi</option>|";
$optiona .= "<option value=\"Sheki\">Sheki</option>|";
$optiona .= "<option value=\"Shemkir\">Shemkir</option>|";
$optiona .= "<option value=\"Shirvan\">Shirvan</option>|";
$optiona .= "<option value=\"Shusa\">Shusa</option>|";
$optiona .= "<option value=\"Terter\">Terter</option>|";
$optiona .= "<option value=\"Tovuz\">Tovuz</option>|";
$optiona .= "<option value=\"Ucar\">Ucar</option>|";
$optiona .= "<option value=\"Xacmaz\">Xacmaz</option>|";
$optiona .= "<option value=\"Xanlar\">Xanlar</option>|";
$optiona .= "<option value=\"Xankendi\">Xankendi</option>|";
$optiona .= "<option value=\"Xizi\">Xizi</option>|";
$optiona .= "<option value=\"Xocavend\">Xocavend</option>|";
$optiona .= "<option value=\"Xocali\">Xocali</option>|";
$optiona .= "<option value=\"Yardimli\">Yardimli</option>|";
$optiona .= "<option value=\"Yevlax\">Yevlax</option>|";
$optiona .= "<option value=\"Zaqatala\">Zaqatala</option>|";
$optiona .= "<option value=\"Zengilan\">Zengilan</option>|";
$optiona .= "<option value=\"Zerdab\">Zerdab</option>|";
$optiona .= "<option value=\"Rusiya\">Rusiya</option>|";
$optiona .= "<option value=\"Turkiye\">Turkiye</option>|";
$optiona .= "<option value=\"Iran\">Iran</option>|";
$optiona .= "<option value=\"Dagistan\">Dagistan</option>|";
$optiona .= "<option value=\"Gurcustan\">Gurcustan</option>|";
$optiona .= "<option value=\"Qerbi Aze\">Qerbi Aze</option>|";
$optiona .= "<option value=\"Xarici olke\">Xarici olke</option>|";
$optiona .= "</select>";
print $_v->select($optiona,$row['city']).'<br/>';	



echo "&#214;z haqq&#305;n&#305;zda melumat yaz&#305;n:<br/>\n";
print $_v->input('<input name=\"infa\" maxlength=\"200\" title=\"&#214;z haqq&#305;n&#305;zda melumat\" emptyok=\"false\"/>').'<br/>';

echo "Meqsed:<br/>\n";
print $_v->select('<select name=\"meqsed\">|<option value=\"3\">Hems&#246;hbet olmaq</option>|<option value=\"2\">Virtual Dostluq</option>|<option value=\"1\">Sevgi Tapmaq</option>|<option value=\"0\">Dost Tapmaq</option>|</select>').'<br/>';

print $_v->submit2('Qeyd ol');
print $_v->divide();

echo "<a href=\"index.php\">Ana sehfe</a> | ";
echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";

}
else
{

foreach($_POST as $key => $val)
{
	${$key} = $val;
}

$error = true;

if(bbses($_SESSION["regstr"])!="newuser"){
header ("Location: reg.php"); exit; 
}

$user = trim(" $user ");
$user = ereg_replace(" +"," ",$user);
$pass = trim(" $pass ");
$pass = ereg_replace(" +"," ",$pass);
$name = trim(" $name ");
$name = ereg_replace(" +"," ",$name);
$day = trim(" $day ");
$day = ereg_replace(" +"," ",$day);
$month = trim(" $month ");
$month = ereg_replace(" +"," ",$month);
$year = trim(" $year ");
$year = ereg_replace(" +"," ",$year);
$city  = trim(" $city  ");
$city  = ereg_replace(" +"," ",$city);
$infa  = trim(" $infa  ");
$infa  = ereg_replace(" +"," ",$infa);
$infa=substr($infa,0,400);
$city  = trim(" $city  ");
$city  = ereg_replace(" +"," ",$city);
$user = eregi_replace("\\(P!\\)", "0", $user);


$help = "Leqebiniz yaln&#305;z Lat&#305;n heriflerinden ibaret ola biler.";

$emp = "Xanalar Tam doldurulmayib xaish edirik tam olaraq doldurarsaniz!!";
$wrongdate = "Siz Do&#287;um Tarixini d&#252;zg&#252;n yazmam&#305;s&#305;n&#305;z<br/><u>D&#252;zg&#252;n yaz&#305;l&#305;&#351; qaydas&#305;</u>: G&#252;n-Ay-&#304;l";
$god=date("Y",$SERVER_TIME)-10;


function number_nick($str) 
{
  return strtolower(preg_replace(array('/[^0-9]/'), '', $str)); 
}
////////////////////

antispam();
if(ctype_digit($user)){$msg = "".$help."";}
elseif ($user === ""){$msg = "".$emp."";}
elseif ($user ==""){$msg = "Leqebi Yazmadiz";}
elseif ($pass === ""){$msg = "&#350;ifrenizi yazmad&#305;n&#305;z!";}
elseif (strpos($user,"|")!==false){$msg = "Leqebde Qada&#287;an edilmi&#351; simvollar var!";}
elseif(!preg_match("!^[a-z0-9]+$!i",$pass)){$msg = "Parolda icazesiz simvollar var!";}
elseif ($name == ""){$msg = "".$emp."";}
elseif ($day == ""){$msg = "".$emp."";}
elseif ($month == ""){$msg = "".$emp."";}
elseif ($year == ""){$msg = "".$emp."";}
elseif ($error_msg_keys != ""){$msg = $error_msg_keys;}
elseif (strlen($user) < 4) {$msg = "Leqeb 4 simvoldan az olmal&#305;d&#305;r!";}
elseif (strlen($user) > 20) {$msg = "Leqeb 20 simvoldan art&#305;q olmamal&#305;d&#305;r!!";}
elseif ((strlen($day) !== 2)||($day>31)){$msg = "".$wrongdate."";}
elseif ((strlen($month) !== 2)||($month>12)){$msg = "".$wrongdate."";}
elseif ((strlen($year) !== 4)||($year>=$god)||($year<1950)){$msg = "".$wrongdate."";}
elseif (($sex == "")&&($sex !== "0")&&($sex !== "1")){$msg = "Qeyd etdiyiniz Cins do&#287;ru deyil.";}
elseif (strlen(number_nick($user))>='5'){$msg = "Nikde heddinden cox reqem var.";}
elseif((!preg_match("!^[a-z1-9@\\*\\)\\(\\?\\!\\-_\\]\\[=~]+$!i",$user))&&(!preg_match("!^[1-9@\\*\\)\\(\\?\\!\\-_\\]\\|\\[=~]+$!i",$bak))){$msg = "Leqebde Qada&#287;an edilmi&#351; simvollar var!";}
else
{
$user = chkdsk($user,basename(__FILE__),"Leqeb");
        $user = HtmlSpecialChars($user);
        $pass = HtmlSpecialChars($pass);
        $day = HtmlSpecialChars($day);
        $month = HtmlSpecialChars($month);
        $year = HtmlSpecialChars($year);
        $mob = HtmlSpecialChars($mob);
        $meqsed = HtmlSpecialChars($meqsed);
        

$name = chkdsk($name,basename(__FILE__),"Ad");
$infa = chkdsk($infa,basename(__FILE__),"Haqq&#305;nda");
$city = chkdsk($city,basename(__FILE__),"&#350;eher");

$name = narmobil($name);
$infa = narmobil($infa);
$city = narmobil($city);


$open=fopen("file/control/15.dat","r");
while(!feof($open)) @$search.=base64_decode(fgets($open,1024));
fclose($open);
$nick = $user;
$nick = str_replace("*", "&#8470;1", $nick);
$nick = str_replace(")", "&#8470;2", $nick);
$nick = str_replace("(", "&#8470;3", $nick);
$nick = str_replace("?", "&#8470;4", $nick);
$nick = str_replace("]", "&#8470;5", $nick);
$nick = str_replace("[", "&#8470;6", $nick);
$search = str_replace("*", "&#8470;1", $search);
$search = str_replace(")", "&#8470;2", $search);
$search = str_replace("(", "&#8470;3", $search);
$search = str_replace("?", "&#8470;4", $search);
$search = str_replace("]", "&#8470;5", $search);
$search = str_replace("[", "&#8470;6", $search);

if(eregi(strtolower("#$nick#"),strtolower($search))){
$_v->title('Ban Edilib');
$_v->fsize1('small');
echo "\"<b>$user</b>\" Leqebi Ban edilib!<br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}

$latuser=strtolower($user);
$fiad =str_replace("_az", "....................................", $latuser);
$fiad =str_replace("*az", "....................................", $latuser);
$fiad =str_replace("_wen", "....................................", $fiad);
$refresh=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM nikoreg2 "));
$refresh = $refresh[0];
$resu = @mysql_query ("Select id,reklam from nikoreg2 order by id desc limit ".$refresh.";");
if (mysql_affected_rows() == 0) {
}
$i = 1;
while ($punt = mysql_fetch_array($resu))
{
 $fiad =str_replace("$punt[reklam]", "....................................", $fiad);
}
$fiad =str_replace("dumsu", "....................................", $fiad);
$fiad =str_replace("*ru", "....................................", $fiad);
$fiad =str_replace("_ru", "....................................", $fiad);
$fiad =str_replace("_net", "....................................", $fiad);
$fiad =str_replace("_com", "....................................", $fiad);
$fiad =str_replace("_biz", "....................................", $fiad);
$fiad =str_replace("*blz", "....................................", $fiad);
$fiad =str_replace("_blz", "....................................", $fiad);
$fiad =str_replace("_blz", "....................................", $fiad);
$fiad =str_replace("*ws", "....................................", $fiad);
$fiad =str_replace("_ws", "....................................", $fiad);
$fiad =str_replace("_vv", "....................................", $fiad);
$fiad =str_replace("*vv", "....................................", $fiad);
$fiad =str_replace("-net", "....................................", $fiad);
$fiad =str_replace("-com", "....................................", $fiad);
$fiad =str_replace("-biz", "....................................", $fiad);
$fiad =str_replace("-blz", "....................................", $fiad);
$fiad =str_replace("-ru", "....................................", $fiad);
$fiad =str_replace("-ws", "....................................", $fiad);
$fiad =str_replace("-vv", "....................................", $fiad);
$fiad =str_replace("*az", "....................................", $fiad);
$fiad =str_replace("=az", "....................................", $fiad);
$fiad =str_replace("*biz", "....................................", $fiad);
$fiad =str_replace("=biz", "....................................", $fiad);
$fiad =str_replace("=blz", "....................................", $fiad);
$fiad =str_replace("=net", "....................................", $fiad);
$fiad =str_replace("*net", "....................................", $fiad);
$fiad =str_replace("=ru", "....................................", $fiad);
$fiad =str_replace("=ws", "....................................", $fiad);
$fiad =str_replace("=vv", "....................................", $fiad);
$fiad=str_replace("-", "", $fiad);
$fiad=str_replace("~", "", $fiad);
$fiad=str_replace("@", "", $fiad);
$fiad=str_replace("\*", "", $fiad);
$fiad=str_replace("_", "", $fiad);
$fiad=str_replace("\[", "", $fiad);
$fiad=str_replace("]", "", $fiad);
$fiad=str_replace("=", "", $fiad);
$fiad =str_replace("electron", "..................................", $fiad);
$fiad =str_replace("nihad_niko", "..................................", $fiad);
$fiad =str_replace("adm", "....................", $fiad);
$fiad =str_replace("stat", "....................", $fiad);
$fiad =str_replace("sox", "....................", $fiad);
$fiad =str_replace("sox", "....................", $fiad);
$fiad =str_replace("sik", "....................................", $fiad);
$fiad =str_replace("qehb", "....................................", $fiad);
$fiad =str_replace("qehib", "....................................", $fiad);
$fiad =str_replace("got", "....................................", $fiad);
$fiad =str_replace("peyse", "....................................", $fiad);
$fiad =str_replace("cindir", "....................................", $fiad);
$fiad =str_replace("wap", "....................................", $fiad);
$fiad =str_replace("wenru", "....................................", $fiad);
$fiad =str_replace("wensu", "....................................", $fiad);
$fiad =str_replace("rehber", "....................................", $fiad);

if (strlen($fiad) > 20) 
{
setcookie ("vreg", $SERVER_TIME+86400, $SERVER_TIME+86400);  //1 gun
$_v->title('Xeta');
$_v->fsize1('small');
echo "<b>Bu nik olmaz!</b><br/>\n";
echo "****<br/><a href=\"reg.php?ref=$ref\">Geri Qay&#305;t</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
$date = date("d.m.y [H:i]",$SERVER_TIME); 
@$save= fopen("file/control/12.dat", "a+"); 
$qeyd = "Leqeb: <b>$user</b> Password: $pass (<b>$date</b>)";
$qeyd .= "IP: <b>$REMOTE_ADDR</b> Soft: $HTTP_USER_AGENT";
$qeyd = "".base64_encode($qeyd)."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
exit;
}
$fiad = chkdsk($fiad,basename(__FILE__),'Nick');

$latuser=strtolower($user);
mysql_query ("Select `id` from `users` where `latuser` = '".$latuser."';");
if (mysql_affected_rows() == 0) {
$levelselect = @mysql_query ("Select `name` from `levels` where `level`='0'");
$levels = @mysql_fetch_array($levelselect);
$lev0 = $levels["name"];
$birth = "$day-$month-$year";
$now = date("d-m-Y",$SERVER_TIME);

if($sex=='1')
{
$setbal = $set['bal2'];
$setposts = $set['posts2'];
}
else
{
$setbal = $set['bal1'];
$setposts = $set['posts1'];
}

$rpos = file("file/dat_folder/micro_regt.dat");
$ferqli = trim($rpos[0]);

antireg();
if (mysql_query ("Insert into `users` set `user`='".$user."', `pass`='".base64_encode($pass)."', `name`='".$name."', `sex`='".$sex."', `birth`='".$birth."', `meqsed`='".$meqsed."', `infa`='".$infa."', `date`='".$now."', `city`='".$city."', `latuser` = '".$latuser."', `user_ip`='".$REMOTE_ADDR."', `bal`='".$setbal."', `posts`='".$setposts."', `user_soft` = '".$HTTP_USER_AGENT."', `time`='".$SERVER_TIME."', `status` = '".$lev0."', `year` = '".$year."', `st_bal_count` = '".$time_bal."', `qeyd_micro` = '".$ferqli."', `st_bal_count1` = '".$time_bal1."', `version` = '".$_v->ver."';")) {
$id=mysql_insert_id();
$msg = "<u>Qeydiyyatdan Tamamland&#305;!</u>";
$error = False;
} else {
$msg = " ".mysql_error()." ";
}
} else {
$msg = "Se&#231;mek istediyiniz \"<b>$user</b>\" leqebi art&#305;q m&#246;vcuddur, ba&#351;qa leqeb se&#231;in";
}
}
if ($error) {
$_v->title('Xeta');
$_v->fsize1('small');
	echo "$msg<br/>----<br/>\n";
	echo "<a href=\"reg.php?ref=$ref\">Geri Qay&#305;t</a>\n";
} else {
$_SESSION["regtime"]=$SERVER_TIME+60;
$_SESSION["regstr"]="";
require("file/fun/0");
$time=$SERVER_TIME;
$_v->title('Qeyd oldunuz!');
$_v->fsize1('small');

	echo "".$msg."<br/><br/>\n";
	echo "Sizin Leqeb:\n";
	echo "<b>".$user."</b><br/>\n";
	echo "Sizin ID:\n";
	echo "<b>".$id."</b><br/>\n";
	echo "Sizin &#350;ifre:\n";
	echo "<b>".$pass."</b><br/>----<br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=".base64_encode($pass)."&amp;ref=$ref\">&#199;ata Daxil ol</a><br/>\n";
	$_v->divide();
	echo "<a href=\"http://$site_url/?$ref\">$site</a>\n";

if($sex==0){
$cinsi = "";   
mysql_query("UPDATE `conf` SET `kisi` = 1+`kisi`, `son` = '".$user."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$SERVER_TIME."'  where `acar` ='1';");
} else {
$cinsi = "Xan&#305;m";   
mysql_query("UPDATE `conf` SET `qadin` = 1+`qadin`, `son` = '".$user."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$SERVER_TIME."'  where `acar` ='1';");
}

$data=date("d-M-Y [H:i]",$SERVER_TIME);
$topic = "Xo&#351; geldiz $user";
$message = "Salam <b>$user</b>. $cinsi! Men &#199;ata yenu &#252;zv olan istifade&#231;ileri melumatland&#305;r&#305;ram.<br/> Size aid olan b&#252;t&#252;n melumatlar \"<u>Dehlizde\"/\"&#350;exsi-Kabinet</u>\" b&#246;lmesinde yerle&#351;dirilib. Daha elave melumatlar haqq&#305;nda  ise, \"<u>Dehlizde\"/\"Melumatlar</u>\" b&#246;lmesindedir. Status, R&#252;tbe ve.s almaq &#252;&#231;&#252;n \"<u>Dehlizde\"/\"Bal Xidmetleri</u>\"-ne daxil olun.";
mysql_query("insert into zapiski values(0,'".$_AUTO['admin']."','0','".$message."','".$user."','".$id."','".$SERVER_TIME."','0','".$topic."','".$data."','1','1');");

$rnd = rand(0,99999999);
$today=date ("H:i",$SERVER_TIME);
$txt = "<u>leqebli istifade&#231;i Yeni Qeyd oldu</u>!";
mysql_query ("Insert into room0 set klu4= '".$rnd."', time='".$today."', who='".$user."', message='".$txt."', id='".$SERVER_TIME."', towhom='1', hid='0', usid='".$id."'");
}
}
$_v->fsize2('small');
$_v->end('1',$link);
?>