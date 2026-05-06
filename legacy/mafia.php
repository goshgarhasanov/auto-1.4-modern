<?php //NeoN
ob_start();
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);



function users($values='', $user) {if($values!=''){$vars = $values;
}else{$vars = '*';
}
$user = mysql_escape_string($user);
if(is_numeric($user)) {
$Sql = "SELECT $vars FROM `users` WHERE `id`='".$user."'";
$Query = @Mysql_Query($Sql);
} else {
$Sql = "SELECT $vars FROM `users` WHERE LOWER(`user`)='". strtolower($user) ."'";
$Query = @Mysql_Query($Sql);
}
$Result = @MySql_Fetch_Array($Query);
mysql_free_result($Query);
return $Result;
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




function int( $str ) {
      return strtolower( preg_replace( array( '/[^0-9]/' ), '', $str ) );
   }
   function pagestart( $total, $max ) {
      global $_GET;
      $page = (!isset( $_GET['page'] )) ? 0 : intval( $_GET['page'] );
      $page = preg_replace( '/[^0-9]/', '', $page );
      $start = (!isset( $_GET['page'] )) ? 0 : ($page * $max);
      if( ceil( $total / $max ) < $page ) {
         $start = 0;
      } return array( $page, $start, $max );
   }

/*
//->users tables...
#----------------------------------------------------------------------------
`mafia` -> oyuna uzv oldugunu bildirir , 
`mafia_act` -> uzv olduqdan sonra oyuna girisin tesdiq olmasini bildirir ,
`mafia_cp` -> oyundaki butun moderler ,
`mafia_write` -> sexsi/umumi rejim ,
#----------------------------------------------------------------------------
//->other tables...
#----------------------------------------------------------------------------
`mafia` -> oyun aparisina aid tables ,
`mafia_ban` -> ban olunan uzvlerin tablesi ,
`mafia_room` -> oyun gedisati otaq ,
*/

$st_val = (isset($_POST['st']) && !empty($_POST['st'])) ? "value='".mysql_real_escape_string($_POST['st'])."'" : false;
$rehber_mafia = array(1 => "<b>[ADM]</b>", 2 => "<b>[MOD]</b>");
$geri = "<a href=\"javascript:history.back(-1)\">Geri qayit</a><br/>";

$mafia = $row["mafia"];
$mafia_cp = $row["mafia_cp"];
$bal = $row["bal"];
$avr = $row["avr"];

//->Butun aktiv oyuncular
$aktiv_uzv = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '1' and `mafia_cp` = '0';");
$uzv = mysql_num_rows($aktiv_uzv);

//->Oyuncu (Men)
$uzv_user = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '1' and `id` = '$id';");
$uzv_user = mysql_num_rows($uzv_user);

//->Oyun Aparicisi
$a_id = mysql_query("SELECT * FROM `mafia` WHERE `id` = '1';");
$a_info = mysql_fetch_array($a_id);
$aparici = users("*",$a_info['admin']);

//->Oyundan xaric olunan uzvler
$ban_uzv = mysql_query("SELECT * FROM `mafia_ban` WHERE `mafia_id` = '1';");
$ban_uzv = mysql_num_rows($ban_uzv);

//->Oyundan xaric olunan uzv (Men)
$ban_user_s = mysql_query("SELECT * FROM `mafia_ban` WHERE `usid` = '$id' and `mafia_id` = '1';");
$ban_user = mysql_num_rows($ban_user_s);

//->Oyun aktiv/deaktiv
$oyun_act = mysql_query("SELECT * FROM `mafia` WHERE `id` = '1' and `act` = '1';");
$oyun_act = mysql_num_rows($oyun_act);

//->Otaqda olan uzvler
$otaq_vaxt = $SERVER_TIME - 900;
$total_s = mysql_query("SELECT DISTINCT `usid`,`name` FROM `mafia_room` WHERE `mafia_id` = '1' and `time` > '$otaq_vaxt' ORDER BY `time` DESC;");
$total_room = mysql_num_rows($total_s);

//->Butun Moderler
$total = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_cp` != '0' and `id` != '{$aparici['id']}';");
$total_cp = mysql_num_rows($total);

//->Tesdiq Gozleyenler
$t_tesdiq = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '0';");
$tesdiq = mysql_num_rows($t_tesdiq);

//->Yazi qiymetleri
if($mafia_cp == 1){
$qalin = 0;
$xetli = 0;
$kursiv = 0;
}else{
$qalin = 15;
$xetli = 10;
$kursiv = 5;
}

$_v->title('Mafia Clan');
$_v->html("<script type='text/javascript'>function javaclick(){document.getElementById('myform').submit();}</script>");
$_v->html("<style type=\"text/css\">#nick {display: inline;}");
if(($mod == "room" && $type != "spring") || $mod == "who" || $mod == "moders") {
$_v->html("
input[type=submit],a.button
{
	text-shadow:rgba(0,0,0,0.3) 0 0px 0px;
	border-radius:0px;
	box-shadow:rgba(0,0,0,0.2) 0 1px 2px;
	color:#0e63b8;
	border:solid 1px #0e63b8;
	background:url('') repeat-x #F9F7F1;
}
input[type=submit]:hover{color:#fff; background:#0e63b8;}
");
}
$_v->html("</style>");
$_v->fsize1($fsize1);

switch ($mod){

case 'rules':
/* $_v->align('center');
echo "<b>Mafia Oyunun yaranma tarixi</b><br/><br/>";
$_v->align('left');
echo "
Hal-haz?rda Az?rbaycanda da g?ncl?r aras?nda genis yay?lm?s Mafia oyunu 1986-c? ild? Moskva Dovl?t Universitetinin t?l?b?si Dmitri Dav?dov t?r?find?n yarad?l?b. Oyun q?sa zaman k?siyind? t?l?b?l?r aras?nda genis sohr?t qazand?. Universiteti bitirikd?n sonra el? ordaca qal?b psixologiyadan d?rs kec?n Dmitrinin bir cox t?l?b?si xarici idi v? onlar mu?lliml?rind?n oyr?ndikl?ri bu oyunu ozl?ri il? dunyan?n bir cox olk?l?rin?- Slovakiya, Cexiya, Sloveniya, Avstriya, Polsa, Rum?niya, Belcika, Boyuk Britaniya, Norvec v? s. yayd?lar. Oyunun populyarlasmas?nda Italiyan?n c?kdiyi mafia serial? olan \"Sprut\"un da boyuk rolu oldu. Sirr deyil ki, oyunun Norvec versiyas? indinin ozund? d? Komissar Katani (\"Sprut\" filminin bas q?hr?man?) kimi adlan?r.
Dunyan?n ?n maraql? intellektual v? psixoloji 50 oyunundan biri hesab edil?n Mafia bugun dunyan?n ?n muxt?lif m?kanlar?nda, ?n muxt?lif qaydalarla oynan?l?r.
Mafiya ustal?qla yalan dan?sma v? aktyorluq oyunudur. Psixoloji g?rginliyin pik h?ddind? yen? d? oz h?y?can?n? bogmaq v? iti q?rar q?bul etm?k- bunlar olmadan yaxs? bir mafia oyuncusu olmaq mumkun deyildir. T?kc? ozu ucun yox, butun komandan ucun oynamaq, yeri g?l?nd? oz yoldas?n?, b?zi hallarda is? h?tta ozunu qurban verm?yi bacarmaq... Yaxs? mafia oyuncusu ozund? bir nec? keyfiyy?ti birl?sdirm?lidir. Amma ?lb?tt? ki, qaydalar? bilm?k d? s?rtdir.
Heyat.az sayt? olaraq biz Siz? bu oyunun Az?rbaycanda daha genis yay?lm?s variant?n?n qaydalar?n? t?qdim edirik.
"; */
$_v->align('center');
echo "<b>Mafiya Oyunu Qaydalar?</b><br/><br/>";
$_v->align('left');
echo "
Mafia oyununda istirakcilar Aparicidan ve 8-20 nefer arase oyuncudan ibaretdir. Oyuncular serti olaraq 3 qrupa bolunur:<br/>

<b>MAFIA CLAN:</b><br/>

<u>Don Mafia-1 nefer</u><br/>

En tehlukeli MAFIA CLAN uzvu. Her gece kecirilen \"Mafia gecesinde\" istediyi oyuncunu oldurur. (Basqa sertleri \"Mafia gecesi\" haqda qeydde oxu)<br/>

<u>Qurd (Mafia Canavari)- 1 nefer</u><br/>

Don Mafianin intiqamcisi. Eger Don Mafiadan qabaq oldurulmezse, Don Mafia olen an o da olur- amma Don Mafianin en boyuk dusmenlerinden birini mehv edir olmemisden qabaq.<br/>

<u>Mafiozi- 1-3 nefer arase</u><br/>

Don Mafia olerse Mafiozilerden biri onun statusuna sahib olur. (Aparicinin secimiyle)<br/>

Oyunda esas missiyalari oyuncular arasinda fikir ayriliqlari yaratmaq, temiz vetendaslari sesverme yoluyla aradan qaldirmaq ve hetta bezen bir-birlerini qurban vermek bahasina olsa bele MAFIA CLANin qelebesini temin etmekdir.<br/><br/>

<b>Sivil vetendaslar:</b><br/>

<u>Komissar- 1 nefer</u><br/>

en faydali vetendas. 2 gecedin bir kecirilen \"Komissar gecesinde\" Komissar subhelendiyi vetendaslardan birine ates acir. (Sivil vetendasi + himayeye goturulmus oyuncunu oldure bilmez, daha etrafli asagida \"Komissar gecesi\" haqda qeydde oxu)<br/>

Komissar en faydali sivil vetendasdir. Buna gore de ozunu maksimum gizli saxlamalidir ki, \"Mafia Gecesinde\" vurulmasin.<br/>

<u>Mer- 1 nefer</u><br/>

Statusundan asili olmayaraq istediyi oyuncunu himayeye goturur. Mer sag oldugu muddetde onun himayeye goturduyu oyuncu hec bir gecede vurula bilmez. (Daha etrafli asagida \"himaye akti\" haqdaki qeydi oxu) Mer olduyu zaman himaye akti quvveden dusur.<br/>

<u>Kamikadze- 1 nefer</u><br/>

Kamikadze olduyu zaman istediyi oyuncunu ozuyle beraber mehv ede biler. Amma maksimum calismalidir ki, MAFIA CLAN uzvunu oldursun, cunki Kamikadze sivil vetendaslarin bir uzvudur.<br/>

<u>Vetendas- 2-10 nefer arasi</u><br/>

Oyunda esas missiyalari MAFIA CLAN-in uzvlerini mehv etmek, Sivil Vetendas komandasinin qelebesini temin etmekdir. Amma Vetendaslar bir dustura emin olmalidirlar: Mafia Oyununda ozund?n basqa hec kim? inanma!<br/><br/>

<b>Neytral uzvler:</b><br/>

<u>Satqin- 1 nefer</u><br/>

Satqin her 3 geceden bir kecirilen \"Satqin gecesinde\" istediyi oyuncunun kartina baxir. Ve seher acildigi zaman Apariciya hemin oyuncunun kartinin her kese elan edilib, edilmemesini qerar verir. (Basqa sertleri \"Satqin gecesi\" haqda qeydde oxu)<br/>

Satqin Neytral uzvdur, oyunda esas missiyasi tereflerden (MAFIA CLAN vs Sivil Vetendas komandasi) biri digerini qalib gelene qeder ozunu qorumaqdir.<br/>

<u>Manyak- 1 nefer</u><br/>

Manyak her 3 geceden bir kecirilen \"Manyak Gecesinde\" istediyi oyuncuya atis acir. (Basqa sertleri \"Manyak Gecesi\" haqda qeydde oxu)<br/>

Manyak Neyrtral uzvdur. Oyunda esas missiyasi Mafia-Vetendas muharibesinde tereflerden biri qalib gelene qeder ozunu qorumaqdir.<br/><br/>

<b>Oyuna hazirliq:</b><br/>

Tecrubeli, oyunun nebzini daim nezaretde saxlamagi bacaran istirakcilardan biri Aparici secilir. Yerde qalan istirakcilarin sayi hesablanir. eger istirakcilarin sayi 8-12 arasindadirsa demeli oyunda 3 nefer Mafia Clan olacaq. (Don Mafia, Qurd ve Mafiozi)<br/>

eger istirakcilarin sayi 13-17 araligindaddirsa demili oyunda 4 nefer Mafia Clan olacaq. (Don Mafia, Qurd ve 2 nefer Mafiozi)<br/>

eger istirakcilarin sayi 18 ve daha yuksekdirse demeli oyunda 5 nefer Mafia Clan olacaq. (Don Mafia, Qurd ve 3 nefer Mafiozi)<br/>

Diger oyuncular ise Komissar, Mer, Kamikadze, Satqin, Manyak ve yerde ne qeder oyuncu qalirsa o qeder de vetendas.<br/><br/>

<i>Meselen, eger Aparicidan basqa 16 nefer istirakci varsa, onda 16 eded bu kartlar (xususi kartiniz yoxdursa, kagiza da yaza bilirsiniz) hazirlanacaq:

Don Mafia, Qurd, Mafiozi, Mafiozi, Komissar, Mer, Kamikadze, Vetendas, Vetendas, Vetendas, Vetendas, Vetendas, Vetendas, Vetendas, Satqin, Manyak.</i><br/><br/>

<b>Himaye akti:</b><br/>

Oyun baslarken Mer istediyi oyuncunu himayeye goturur. (O Mafia Clan da ola bilir, Sivil vetendas da, Neytral uzv de, Mer bundan xebersiz olur)

Himayeye goturulmus oyuncu Mer sag oldugu muddetde hec bir gecede (Mafia, Komissar ve Manyak) gecesinde oldurule bilmez ve Satqin gecesinde karti acila bilmez. Himayeye goturulmus oyuncu yalniz gunduz sesvermesinde oyundan kenarlasdirila biler ve ya Kamikadze vurulduqda onun terefinden partladila bilir.

Mer oldukden sonra Himaye Akti quvveden dusur.<br/><br/>

<u>HEC KIM OYUN BOYU AND ICE BILMEZ. \"Allah haqqi, Men mafia deyilem\", \"Babamin qebrine and olsun Men Merem\", \"Ozum olum men Kamikadzeyem\" ve s. bu tip and icenler o deqiqe oyundan kenarlasdirilacaq!!!</u><br/><br/>

<i>Oldurulmus oyuncular butun oyunu cenqerlari cixmadan kenardan izlemelidirler. Kimse neyesi isare etse, ya reaksiya gosterse onun komandasina avtomatik meglubiyyet verilir. Mafia oyunun en gozel qaydasi budur: OLULUR DANISMIR!</i><br/>
";
$_v->divide();
echo $geri;
break;

case 'kick_game':
$_v->align('center');
echo "<b>Oyundan qovulanlar</b><br/><br/>";
$_v->align('left');
$next_id = next_id($ban_uzv,10);
$i = $next_id['start'];
$ban = mysql_query("SELECT * FROM `mafia_ban` where `mafia_id` = '1' ORDER BY `time` DESC limit $next_id[start],$next_id[max_page];");
if(!mysql_num_rows($ban)){
echo "Oyundan qovulan olmay?b :=)<br/>";
$_v->divide();
echo $geri;
break;
}

if(isset($_GET['del'])){
if($id != 1 && !$mafia_cp && $id != $aparici['id']){
echo "Bu bolmeye yalniz oyun adminleri daxil ola biler!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

$del = intval($_GET['del']);
$bann = mysql_query("SELECT * FROM `mafia_ban` WHERE `mafia_id` = '1' and `id` = '$del';");
$list = mysql_fetch_array($bann);
$inf = users("*",$list['usid']);

if(($inf['id'] == $id || $inf['id'] == 1 || $inf['id'] == $aparici["id"] || ($inf['mafia_cp'] > 0 && $id != $aparici["id"])) && $id != 1){
echo "Bax bu ujey olmaz!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if(mysql_query("delete from `mafia_ban` where `id` = '$del' and `mafia_id` = '1';")){
$inf_rehber = users("*",1);
$inf_aparici = users("*",$aparici['id']);

$message = "Hormetli <b>{$inf['user']}</b>, <u>{$row['user']}</u> Mafia oyununda sizi bandan azad etdi.!";
$message_rehber = "Hormetli <b>{$inf_rehber['user']}</b>, <u>{$row['user']}</u> Mafia oyununda {$inf['user']} nikini bandan azad etdi.!";
$message_aparici = "Hormetli <b>{$inf_aparici['user']}</b>, <u>{$row['user']}</u> Mafia oyununda {$inf['user']} nikini bandan azad etdi.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf['id']}' , `towhom` = '{$inf['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message';");
if($id != 1){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_rehber['id']}' , `towhom` = '{$inf_rehber['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_rehber';"); }
if($id != $aparici['id']){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_aparici['id']}' , `towhom` = '{$inf_aparici['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_aparici';");	}
mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '<span style=\'color:red\'><b>{$inf['user']} niki oyuna qaytarildi.!</b></span>', `kime_nik` = '', `nov` = '0', `time` = '$SERVER_TIME';");
mysql_query ("Update `users` set `mafia_cp` = '0', `mafia_act` = '1', `mafia` = '1' where `id` = '{$inf['id']}';");
echo "<b>".$inf['user']."</b> oyuna qaytarildi!.<br/>\n";
}
$_v->divide();
echo $geri;
break;
}

while($list = mysql_fetch_array($ban))
{
$i++;
$nk = $list["usid"];
$name = $list["name"];
$sebeb = $list["sebeb"];
$time = $list["time"];

$inf = users("*",$nk);

echo $i.") ";
if(((($inf['id'] != $id && $inf['id'] != 1 && $inf['id'] != $aparici["id"]) || ($inf['mafia_cp'] > 0 && $id == $aparici["id"] && $inf['id'] != $id)) && ($id == 1 || $mafia_cp || $id == $aparici['id'])) || $id == 1){
echo "<a href=\"mafia.php?mod=$mod&amp;del={$list['id']}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Azad et</a> -\n";}
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$name</a><br/>";
echo "<u>Xaric olundugu tarix:</u> <span style='color:red'>".time_date($time)."</span><br/>";
if($sebeb!='')echo "<u>Sebeb:</u> (<span style='color:red'>$sebeb</span>)<br/>";
$_v->divide();
}

if($next_id['a'] > $next_id['max_page'])
{
   echo page_next("mafia.php?mod=kick_game&amp;id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
   $_v->divide();
}

echo $geri;
break;

case 'room':
if($oyun_act){
$_v->align('center');
echo "<b>Xeta</b><br/><br/>";
$_v->align('left');
echo "Oyun muveqqeti dayandilib!.<br/>";
$_v->divide();
echo $geri;
break;
}

if($id != 1 || $id != $aparici["id"]){
if($ban_user){
$_v->align('center');
echo "<b>Xeta</b><br/><br/>";
$_v->align('left');
$list = mysql_fetch_array($ban_user_s);
$sebeb = $list["sebeb"];
$time = $list["time"];
echo "Siz qaydalari pozdugunza gore oyundan xaric olunmusunuz!<br/>";
if($sebeb!='')echo "<u>Sebeb:</u> (<span style='color:red'>$sebeb</span>)<br/>";
echo "<u>Xaric oludugunuz tarix:</u> <span style='color:red'>".time_date($time)."</span><br/>";
$_v->divide();
echo $geri;
break;
}
}

if($_POST['get']=="yaz"){
if($id != 1 || $id != $aparici["id"]){
if(!$mafia){
$_v->align('left');
echo "Siz oyuna uzv deyilsiniz. Yaz? yaza bilmersiniz!<br/>";
echo "<a href=\"mafia.php?mod=connect&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyuna uzv ol</a><br/>";
$_v->divide();
echo $geri;
break;
}else{
if(!$uzv_user){
$_v->align('left');
echo "Oyuna girisiniz hele tesdiqlenmeyib!<br/>";
$_v->divide();
echo $geri;
break;
}
}
}

if(empty($_POST['message'])){
echo "Mesaj yazmadiniz!<br/>";
$_v->divide();
echo $geri;
break;
}

if($_POST['yazi']==1){
if($row['bal'] < $qalin){
echo "Qal&#305;n yazmaq ucun hesab&#305;n&#305;zda ($qalin) olmal&#305;d&#305;r.!<br/>";
$_v->divide();
echo $geri;
break;
}else{
mysql_query ("update `users` set `bal` = `bal` - $qalin WHERE `id` = '$id';"); }
}else if($_POST['yazi']==2){
if($row['bal'] < $xetli){
echo "Xettli yazmaq ucun hesab&#305;n&#305;zda ($xetli) olmal&#305;d&#305;r.!<br/>";
$_v->divide();
echo $geri;
break;
}else{
mysql_query ("update `users` set `bal` = `bal` - $xetli WHERE `id` = '$id';"); }
}else if($_POST['yazi']==3){
if($row['bal'] < $kursiv){
echo "Eyri yazmaq ucun hesab&#305;n&#305;zda ($kursiv) olmal&#305;d&#305;r.!<br/>";
$_v->divide();
echo $geri;
break;
}else{
mysql_query ("update `users` set `bal` = `bal` - $kursiv WHERE `id` = '$id';"); }
}else if($_POST['yazi'] < 0 || $_POST['yazi'] > 3){
echo "Hackerlik senlik deyil ay malis!.<br/>";
$_v->divide();
echo $geri;
break;
}

mysql_query("SELECT * FROM `mafia_room` WHERE `mafia_id` = '1' and `usid` = '$id' and `text` = '{$_POST['message']}';");
if(mysql_affected_rows()){
echo "Flood etmek olmaz.!<br/>";
$_v->divide();
echo $geri;
break;
}

$kim = $_POST['kime_n'];
$fikir = in_smile($_POST['message']);

if($_POST['yazi']==1)$mesaj = '<b>'.$fikir.'</b>';
else if($_POST['yazi']==2)$mesaj = '<u>'.$fikir.'</u>';
else if($_POST['yazi']==3)$mesaj = '<i>'.$fikir.'</i>';
else $mesaj = $fikir;

mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '$mesaj', `kime_nik` = '$kim', `nov` = '{$_POST['nov']}', `time` = '$SERVER_TIME';");
mysql_query ("UPDATE `users` SET `posts` = `posts` + 1 where `id` = '$id';");
}

if(isset($_POST['del'])){
$q = mysql_query("SELECT * FROM `mafia_room` WHERE `mafia_id` = '1' and `id` = '$del';");
$list = mysql_fetch_array($q);
if(($mafia_cp != 0 && $list['usid'] != 1 && $list['usid'] != $aparici["id"]) || ($id == 1) || ($id == $aparici["id"] && $list['usid'] != 1)){
mysql_query ("delete from `mafia_room` where `id` = '$del';"); }
}

if(isset($_GET['page'])) $sehife = "&amp;page=".intval($_GET['page']);

if($act=="sexsi"){
if(mysql_query("UPDATE `users` SET `mafia_write` = '1' where `id` = '$id';")){
header("Location: mafia.php?mod=$mod".str_replace("&amp;","&",$sehife)."&id=$id&ps=$ps");}
}else if($act=="umumi"){
if(mysql_query("UPDATE `users` SET `mafia_write` = '0' where `id` = '$id';")){
header("Location: mafia.php?mod=$mod".str_replace("&amp;","&",$sehife)."&id=$id&ps=$ps");}
}

if($type=="spring"){
if($id != 1){
if(!$mafia){
$_v->align('left');
echo "Siz oyuna uzv deyilsiniz. Yaz? yaza bilmersiniz!<br/>";
echo "<a href=\"mafia.php?mod=connect&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyuna uzv ol</a><br/>";
$_v->divide();
echo $geri;
break;
}else{
if(!$uzv_user){
$_v->align('left');
echo "Oyuna girisiniz hele tesdiqlenmeyib!<br/>";
$_v->divide();
echo $geri;
break;
}
}
}

if(isset($_GET["nk"]) && !empty($_GET["nk"])){
$inf = users("*",$nk);
$nick_post = $inf['user'];
$nk_post = intval($_GET["nk"]);
$nk_url = "nk={$nk_post}&amp;";
}elseif(isset($_POST["nk"]) && !empty($_POST["nk"])){
$nick_post = $_POST["kime_nik"];
$nk_post = intval($_POST["nk"]);
$nk_url = "nk={$nk_post}&amp;";
}

if(isset($nk_post)){
echo "Anketi &#xbb; <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk_post&amp;ref=$ref\">$nick_post</a><br/>";
$_v->divide(); }

echo "Mesajiniz -\n";
echo "<a href=\"smile.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smaylikler</a><br/>\n";
$_SESSION['smiles'] = "mafia.php?mod=$mod&amp;type=spring&amp;".$nk_url;
$_v->action( "mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;act=yaz&amp;ref=$ref" );
print $_v->input( "<input $st_val name=\"message{$ref}\" title=\"message\" emptyok=\"true\"/>" )."<br/>\n";

if(isset($nick_post)){
$option = "<select name=\"nov{$ref}\">|";
$option .= "<option value=\"0\">Umumi</option>|";
$option .= "<option value=\"1\">Shexsi</option>|";
$option .= "</select>";
print $_v->select($option)."<br/>";
}

if($mafia_cp != 1){
$_qalin = '('.$qalin.' Bal)';
$_xetli = '('.$xetli.' Bal)';
$_kursiv = '('.$kursiv.' Bal)';
}

echo "Yaz&#305; tipi:<br/>";
$option = "<select name=\"yazi{$ref}\">|";
$option .= "<option value=\"0\">Bos</option>|";
$option .= "<option value=\"1\">Qal&#305;n $_qalin</option>|";
$option .= "<option value=\"2\">Xettli $_xetli</option>|";
$option .= "<option value=\"3\">Eyri $_kursiv</option>|";
$option .= "</select>";
print $_v->select($option)."\n";

if (isset($nick_post)) {
$pf = "kime_n=$nick_post,";
}
$pf .= 'get=yaz';
print $_v->submit('G&#246;nder',$pf);
$_v->divide();
echo $geri;
break;
}

$_v->Redirect("mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref",$avr);

if($a_info['info']){
$_v->align("center");
echo "<b>".$a_info['info']."</b><br/>\n";
$_v->align("left");
}

$_v->html('<span class="mlink">');
echo "<a href=\"mafia.php?mod=$mod&amp;type=spring&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yaz</a>\n";
$_v->html('</span>');
$_v->wml("|\n");

$_v->html('<span class="mlink">');
echo "<a href=\"mafia.php?mod=$mod{$sehife}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a>\n";
$_v->html('</span>');
$_v->wml("|\n");

$_v->html('<span class="mlink">');
if(!$row['mafia_write']){
echo "<a href=\"mafia.php?mod=$mod{$sehife}&amp;id=$id&amp;ps=$ps&amp;act=sexsi&amp;ref=$ref\">Shexsi</a>";
}else{ echo "<a href=\"mafia.php?mod=$mod{$sehife}&amp;id=$id&amp;ps=$ps&amp;act=umumi&amp;ref=$ref\">Umumi</a>"; }
$_v->html('</span>');

if($id == 1 || $mafia_cp || $id == $aparici['id']){
$_v->wml(" |\n");
$_v->html('<span id="bar_right"><span class="mlink">');
echo "<a href=\"mafia.php?mod=panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Mafia Panel</a>";
$_v->html('</span></span>');
}

echo "<br/>\n";
$_v->divide();

echo "<u>Oyuncular</u> (<a href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=who&amp;ref=$ref\">$uzv</a>) |\n";
echo "<u>Adminler</u> (<a href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=moders&amp;ref=$ref\">$total_cp</a>)<br/>\n";
$_v->divide();

if($row['mafia_write']){
if($id == $aparici["id"]){
$where = "and `usid` != '1'";
}else{
$where = "and `name` = '{$row['user']}'"; }
$onu = mysql_query("SELECT COUNT(*) FROM `mafia_room` WHERE `mafia_id` = '1' and `kime_nik` != '' {$where};");
}else{
$onu = mysql_query("SELECT COUNT(*) FROM `mafia_room` WHERE `mafia_id` = '1' and `kime_nik` = '';"); }
$onu = @mysql_result($onu, 0);

$next_id = next_id($onu,10);
$i = $next_id['start'];

if($row['mafia_write']){
$q = mysql_query("SELECT * FROM `mafia_room` WHERE `mafia_id` = '1' and `kime_nik` != '' ORDER BY `time` DESC LIMIT $next_id[start],$next_id[max_page];");
}else{
$q = mysql_query("SELECT * FROM `mafia_room` WHERE `mafia_id` = '1' ORDER BY `time` DESC LIMIT $next_id[start],$next_id[max_page];");
}

if(!$onu){
$msg_nov = $row['mafia_write'] ? "Sexsi" : "Umumi";
echo "<b>".$msg_nov."</b> mesaj yazilmayib!.<br/>";
$_v->divide();
echo $geri;
break;
}

while($view = mysql_fetch_array($q))
{
$i++;
$sms_id = $view['id'];
$nk = $view['usid'];
$name = $view['name'];
$message = $view['text'];
$tarix = time_date($view['time']);
$user = $view['kime_nik'];
$nov = $view['nov'];
$inf = users("*",$nk);
$r_mafia = ($nk == $aparici["id"] || $nk == 1) ? "<b>[AP]</b>" : $rehber_mafia[$inf['mafia_cp']];

if($nov!=0){
if($row["user"] == $user || $id == $nk || $id == 1 || $aparici["id"] == $id){
echo $r_mafia;
if($id == 1){
if($_v->ver == "wml") {
if($nk != 1){
echo "(<anchor title=\"go\">Ban<go href=\"mafia.php?mod=panel&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$nk\"/></go></anchor> - ";
}else{
echo "("; }
echo "<anchor title=\"go\">Sil<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>) ";
}else{
if($nk != 1){
$_v->java_action("mafia.php?mod=panel&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;ref=$ref",'nick');
print $_v->submit('Ban',"nick=$nk");
}
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref",'nick');
print $_v->submit('Sil',"del=$sms_id");
}
}

if($_v->ver == "wml") {
echo "<anchor title=\"go\">$name<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;type=spring&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/></go></anchor>";
}else{
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;type=spring&amp;ref=$ref",'nick');
print $_v->submit($name,"nk=$nk,kime_nik=$name"); }
echo " ($tarix): <b>[Sexsi]</b> $user &#xbb; $message<br/>\n";
$_v->divide(); }
}else{
echo $r_mafia;
if(($mafia_cp != 0 && $nk != 1 && $nk != $aparici["id"]) || ($id == 1) || ($id == $aparici["id"] && $nk != 1)){
if($_v->ver == "wml") {
if(((($nk != $id && $nk != 1 && $nk != $aparici["id"]) || ($inf['mafia_cp'] > 0 && $id == $aparici["id"] && $nk != $id)) && ($id == 1 || $mafia_cp || $id == $aparici['id'])) || ($id == 1 && $nk != 1)){
echo "(<anchor title=\"go\">Ban<go href=\"mafia.php?mod=panel&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$nk\"/></go></anchor> - ";
}else{
echo "("; }
echo "<anchor title=\"go\">Sil<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$sms_id\"/></go></anchor>) ";
}else{
if(((($nk != $id && $nk != 1 && $nk != $aparici["id"]) || ($inf['mafia_cp'] > 0 && $id == $aparici["id"] && $nk != $id)) && ($id == 1 || $mafia_cp || $id == $aparici['id'])) || ($id == 1 && $nk != 1)){
$_v->java_action("mafia.php?mod=panel&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;ref=$ref",'nick');
print $_v->submit('Ban',"nick=$nk");
}
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref",'nick');
print $_v->submit('Sil',"del=$sms_id"); }
}
if($_v->ver == "wml") {
echo "<anchor title=\"go\">$name<go href=\"mafia.php?mod=$mod&amp;type=spring&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$nk\"/>";
echo "<postfield name=\"kime_nik\" value=\"$name\"/>";
echo "</go></anchor>";
}else{
$_v->java_action("mafia.php?mod=$mod&amp;type=spring&amp;id=$id&amp;ps=$ps&amp;ref=$ref",'nick');
print $_v->submit($name,"nk=$nk,kime_nik=$name");
}

echo " ($tarix): ";
if($user!='' && $nov == 0){
echo "<b>$user</b> &#xbb; "; }
echo "$message<br/>\n";
$_v->divide();
}
}

if($next_id['a'] > $next_id['max_page'])
{
   echo page_next("mafia.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
   $_v->divide();
}
break;

case 'who':
$_v->align('left');
echo "<b>Oyuncular ($uzv)</b><br/>";
$_v->divide();

if(!$uzv) {
echo "Oyuncu teyin edilmeyib!<br/>\n";
$_v->divide();
echo $geri;
break;
}

if(isset($_POST['del'])){
$del = intval($_POST['del']);
$inf = users("*",$del);
if(($mafia_cp > 0 && $del != 1 && $del != $aparici["id"]) || ($id == 1) || ($id == $aparici["id"] && $del != 1)){
mysql_query("update `users` set `mafia` = '0', `mafia_act` = '0', `mafia_cp` = '0' WHERE `id` = '$del' and `mafia` = '1' and `mafia_act` = '1' and `mafia_cp` = '0';");
mysql_query("delete FROM `mafia_room` where `usid` = '$del' or `kime_nik` = '{$inf['user']}';"); }
}

$q = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '1' and `mafia_cp` = '0';");

$i = 1;
$q_cem = mysql_num_rows($q);
while($view = mysql_fetch_array($q))
{
$us_n = $view['user'];
$us_i = $view['id'];

if(($mafia_cp > 0 && $us_i != 1 && $us_i != $aparici["id"]) || ($id == 1) || ($id == $aparici["id"] && $us_i != 1))
{
if($_v->ver == "wml"){
echo "(<anchor title=\"go\">Sil<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"del\" value=\"$us_i\"/></go></anchor>) ";
}else{
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref",'nick');
print $_v->submit('Sil',"del=$us_i"); }
}

if($_v->ver == "wml") {
echo "<anchor title=\"go\">".$us_n."<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=room&amp;type=spring&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"$us_i\"/>";
echo "<postfield name=\"kime_nik\" value=\"$us_n\"/>";
echo "</go></anchor>";
}else{
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=room&amp;type=spring&amp;ref=$ref",'nick');
print $_v->submit($us_n,"nk=$us_i,kime_nik=$us_n");
}
echo ($q_cem != $i) ? ",\n" : "";
$i++;
}
echo "<br/>\n";
$_v->divide();
echo $geri;
break;

case 'connect':
$_v->align('left');

if($id == 0){
echo "Siz saytin yaradicisiniz!.<br/>Siz hara bura hara?!.<br/>";
$_v->divide();
echo $geri;
break;
}

if($id == $aparici["id"]){
echo "Siz oyunun aparicisisiniz!.<br/>Siz hara bura hara?!.<br/>";
$_v->divide();
echo $geri;
break;
}

if($ban_user){
echo "Siz oyundan xaric olmusunuz!.<br/>Xaric olunan uzvler yeniden uzv ola bilmez!.<br/>";
$_v->divide();
echo $geri;
break;
}

if($mafia){
echo "Siz oyunun uzvsunuz!.<br/>Tekrar uzv olmaq isteyirsiniz?!.<br/>";
$_v->divide();
echo $geri;
break;
}

if(empty($action)) {
echo "<b>Oyuna uzv ol</b><br/>";
$_v->divide();
echo "Siz heqiqeten oyuna uzv olmaq isteyirsiniz?<br/>";
$_v->divide();
echo "<a href=\"mafia.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a> / <a href=\"mafia.php?mod=$mod&amp;action=ok&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Beli</a><br/>";
}else if($action=="ok"){
echo "<u>Uzv oldunuz</u><br/>";
$_v->divide();
echo "Siz art&#305;q oyunun bir uzvusunuz.!<br/>";
echo "Oyun aparicisi-i sizi tesdiqledikden sonra oyuna baslaya bileceksiniz.!<br/>";
$mafia_cp = mysql_query("SELECT * FROM `users` WHERE `mafia_cp` != '0';");
while($list = mysql_fetch_array($mafia_cp)){
$mesaj = "Hormetli <b>{$list['user']}</b> <u>{$row['user']}</u> mafia oyuna uzv olmaq isteyir<br/>Zehmet olmasa <b>Mafia Panele</b> daxil olub bu istifade&#231;ini tesdiq ederdiz.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$list['id']}' , `towhom` = '{$list['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$mesaj';");
}
mysql_query ("Update `users` set `mafia` = '1', `mafia_act` = '0', `mafia_cp` = '0' where `id` = '$id';");
}
$_v->divide();
echo $geri;
break;

case 'moders':
$_v->align('left');
echo "<b>Oyunun adminleri</b><br/>";
$_v->divide();

if(!$total_cp) {
echo "Admin teyin edilmeyib!<br/>\n";
$_v->divide();
echo $geri;
break;
}

$next_id = next_id($total_cp,10);
$i = $next_id['start'];

$moder = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_cp` != '0' and `id` != '{$aparici['id']}' order by `mafia_cp` asc limit $next_id[start],$next_id[max_page];;");
while($v = mysql_fetch_array($moder))
{
$i++;
$cp = $v['mafia_cp'];

if($v['time'] > $SERVER_TIME){
$img = "<img src=\"img/wifi_onn.png\"/>";
}else{
$img = "<img src=\"img/wifi_off.png\"/>"; }

echo $img." ";

if($_v->ver == "wml") {
echo "<anchor title=\"go\">".$v['user']."<go href=\"mafia.php?id=$id&amp;ps=$ps&amp;mod=room&amp;type=spring&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"nk\" value=\"{$v['id']}\"/>";
echo "<postfield name=\"kime_nik\" value=\"{$v['user']}\"/>";
echo "</go></anchor>";
}else{
$_v->java_action("mafia.php?id=$id&amp;ps=$ps&amp;mod=room&amp;type=spring&amp;ref=$ref",'nick');
print $_v->submit($v['user'],"nk={$v['id']},kime_nik={$v['user']}");
}

echo " ".$rehber_mafia[$cp]."<br/>\n";
}

if($next_id['a'] > $next_id['max_page'])
{
   $_v->divide();
   echo page_next("mafia.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

$_v->divide();
echo $geri;
break;

case 'panel':
if($id != 1 && !$mafia_cp && $id != $aparici['id']){
echo "Bu bolmeye yalniz oyun adminleri daxil ola biler!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if(isset($_POST['act']) || isset($_GET['act'])){
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act'];
if($act == "edit"){
$nick = isset($_POST['nick']) ? $_POST['nick'] : $_GET['nick'];
if(!ctype_digit($nick)){
$nick = trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);

if($ruser==$nick){
$select = mysql_query ("Select * from `users` where `latuser` = '$latuser';");
}else{
$select = mysql_query ("select * from `users` where `ruser` = '$ruser';");
}
}else{
$select = mysql_query ("Select * from `users` where `id` = '$nick';");
}

if(!mysql_affected_rows()){
echo "Bele istifadeci movcud deyil!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

$result = mysql_fetch_array($select);
$inf = users("*",$result['id']);

if(($inf['id'] == $id || $inf['id'] == 1 || $inf['id'] == $aparici["id"] || ($inf['mafia_cp'] > 0 && $id != $aparici["id"])) && $id != 1){
echo "Bax bu ujey olmaz!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `id` = '{$inf['id']}';");
if(!mysql_affected_rows()){
echo "<b>{$inf['user']}</b> oyunun uzvu deyil!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if($_GET['nov'] == "ceza"){
mysql_query("SELECT * FROM `mafia_ban` WHERE `usid` = '{$inf['id']}' and `mafia_id` = '1';");
if(mysql_affected_rows()){
echo "Siz bu sexsi daha once xaric etmisiz.!<br/>";
$_v->divide();
echo $geri;
break;
}
if(!isset($_POST['ceza'])){
echo $inf['user']." -in cezalanma sebebi:<br/>\n";
$_v->action( "mafia.php?mod=$mod&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;nick={$inf['id']}&amp;ref=$ref" );
print $_v->input("<input type=\"text\" name=\"sebeb{$ref}\" title=\"Sebeb\" emptyok=\"true\"/>" )."<br/>";
print $_v->submit('Xaric et','ceza=ok');
}else{
$sebeb = trim($_POST['sebeb']);
$message = "<span style=\'color:red\'><b>{$inf['user']} niki oyundan xaric edildi!.</b></span>";
mysql_query("insert into `mafia_ban` set `usid` = '{$inf['id']}', `name` = '{$inf['user']}', `mafia_id` = '1', `sebeb` = '$sebeb', `time` = '$SERVER_TIME';");
mysql_query ("Update `users` set `mafia_cp` = '0', `mafia_act` = '0', `mafia` = '0' where `id` = '{$inf['id']}' and `mafia` = '1';");
mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '$message', `kime_nik` = '', `nov` = '0', `time` = '$SERVER_TIME';");
echo "<b>{$inf['user']}</b> oyundan ugurla xaric edildi.!<br/>\n";
}
$_v->divide();
echo $geri;
break;
}

if($_GET['nov'] == "rutbe"){
if(!isset($_POST['level'])){
echo "ID: <b>{$inf['id']}</b><br/>";
echo "Nik: <b>{$inf['user']}</b><br/>";
$_v->divide();
echo "R&#252;tbesi<br/>";
$_v->action( "mafia.php?mod=$mod&amp;act=edit&amp;nov=rutbe&amp;id=$id&amp;ps=$ps&amp;nick={$inf['id']}&amp;ref=$ref" );
$option = "<select name=\"rutbe{$ref}\">|";
$option .= "<option value=\"0\">User</option>|";
$option .= "<option value=\"2\">Moder</option>|";
$option .= "</select>";
print $_v->select( $option, $inf['mafia_cp'] )."<br/>";
print $_v->submit('Deyi&#351;','level=ok');
}else{
$rutbe = intval($_POST['rutbe']);

if($rutbe != 0 && $rutbe != 2){
echo "Duzgun secim edin!<br/>\n";
$_v->divide();
echo $geri;
break;
}

mysql_query("SELECT * FROM `users` WHERE `id` = '{$inf['id']}' and `mafia` = '1' and `mafia_cp` = '$rutbe';");
if(mysql_affected_rows()){
echo "Siz bu sexse daha once rutbe verdiniz.!<br/>";
$_v->divide();
echo $geri;
break;
}

if(!$rutbe){
$level = "Adi Oyuncu";
}else{
$level = "Moder";
}

$inf_rehber = users("*",1);
$inf_aparici = users("*",$aparici['id']);

$message = "Hormetli <b>{$inf['user']}</b>, <u>{$row['user']}</u> Mafia oyununda size  <b>{$level}</b> vezifesi teyin etdi.!";
$message_rehber = "Hormetli <b>{$inf_rehber['user']}</b>, <u>{$row['user']}</u> Mafia oyununda {$inf['user']} nikine  <b>{$level}</b> vezifesi teyin etdi.!";
$message_aparici = "Hormetli <b>{$inf_aparici['user']}</b>, <u>{$row['user']}</u> Mafia oyununda {$inf['user']} nikine  <b>{$level}</b> vezifesi teyin etdi.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf['id']}' , `towhom` = '{$inf['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message';");
if($id != 1){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_rehber['id']}' , `towhom` = '{$inf_rehber['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_rehber';"); }
if($id != $aparici['id']){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_aparici['id']}' , `towhom` = '{$inf_aparici['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_aparici';");	}
mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '<span style=\'color:red\'><b>{$inf['user']} nikine {$level} vezifesi teyin edildi.!</b></span>', `kime_nik` = '', `nov` = '0', `time` = '$SERVER_TIME';");
mysql_query ("Update `users` set `mafia_cp` = '$rutbe' where `id` = '{$inf['id']}' and `mafia` = '1'");
echo "Rutbe verildi.!<br/>";
}
$_v->divide();
echo $geri;
break;
}

if($_GET['nov'] == "tesdiq"){
mysql_query("SELECT * FROM `users` WHERE `id` = '{$inf['id']}' and `mafia` = '1' and `mafia_act` = '1';");
if(mysql_affected_rows()){
echo "Siz bu sexse daha once tesdiqlediniz.!<br/>";
$_v->divide();
echo $geri;
break;
}

if(mysql_query("Update `users` set `mafia` = '1', `mafia_act` = '1' where `id` = '{$inf['id']}';")){
$inf_rehber = users("*",1);
$inf_aparici = users("*",$aparici['id']);

$message = "Hormetli <b>{$inf['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun sizi tesdiqledi.!";
$message_rehber = "Hormetli <b>{$inf_rehber['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun {$inf['user']} nikini tesdiqledi.!";
$message_aparici = "Hormetli <b>{$inf_aparici['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun {$inf['user']} nikini tesdiqledi.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf['id']}' , `towhom` = '{$inf['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message';");
if($id != 1){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_rehber['id']}' , `towhom` = '{$inf_rehber['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_rehber';"); }
if($id != $aparici['id']){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_aparici['id']}' , `towhom` = '{$inf_aparici['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_aparici';");	}
mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '<span style=\'color:red\'><b>{$inf['user']} niki oyuna qosuldu.!</b></span>', `kime_nik` = '', `nov` = '0', `time` = '$SERVER_TIME';");
echo "<b>{$inf['user']}</b> niki artiq oyunun bir uzvudur!.<br/>";
}else{
echo "Sehvlik kodu: ".mysql_error();
}
$_v->divide();
echo $geri;
break;
}

if($_GET['nov'] == "redd"){
if(mysql_query("Update `users` set `mafia` = '0', `mafia_act` = '0' where `id` = '{$inf['id']}';")){
$inf_rehber = users("*",1);
$inf_aparici = users("*",$aparici['id']);

$message = "Hormetli <b>{$inf['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun sizi tesdiqlemedi.!";
$message_rehber = "Hormetli <b>{$inf_rehber['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun {$inf['user']} nikini tesdiqlemedi.!";
$message_aparici = "Hormetli <b>{$inf_aparici['user']}</b>, <u>{$row['user']}</u> Mafia oyun giris ucun {$inf['user']} nikini tesdiqlemedi.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf['id']}' , `towhom` = '{$inf['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message';");
if($id != 1){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_rehber['id']}' , `towhom` = '{$inf_rehber['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_rehber';"); }
if($id != $aparici['id']){
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf_aparici['id']}' , `towhom` = '{$inf_aparici['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_aparici';");	}
echo "<b>{$inf['user']}</b> niki artiq oyunun bir uzvu deyil!.<br/>";
}else{
echo "Sehvlik kodu: ".mysql_error();
}
$_v->divide();
echo $geri;
break;
}

echo "ID: <b>{$inf['id']}</b><br/>";
echo "Nik: <b>{$inf['user']}</b><br/>";
if($id == 1 || $id == $aparici["id"]) echo "Oyunda rutbesi: <b>{$rehber_mafia[$inf['mafia_cp']]}</b><br/>";
$_v->divide();
echo "<a href=\"mafia.php?mod=$mod&amp;act=edit&amp;nov=ceza&amp;id=$id&amp;ps=$ps&amp;nick={$inf['id']}&amp;ref=$ref\">Cezalandir</a><br/>\n";
echo "<a href=\"mafia.php?mod=$mod&amp;act=edit&amp;nov=rutbe&amp;id=$id&amp;ps=$ps&amp;nick={$inf['id']}&amp;ref=$ref\">R&#252;tbe Ver</a><br/>\n";
$_v->divide();
}elseif($act == "tesdiq"){
if(!$tesdiq){
echo "Tesdiq gozleyen istifadeci yoxdur!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

echo "<b>Tesdiq gozleyen uzvler</b><br/>\n";
$_v->divide();

while($list = mysql_fetch_array($t_tesdiq)){
$nk = $list['id'];
$user = $list['user'];
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">$user</a> &#xbb; <a style='color:green' href=\"mafia.php?mod=$mod&amp;act=edit&amp;nov=tesdiq&amp;id=$id&amp;ps=$ps&amp;nick=$nk&amp;ref=$ref\">Tesdiq et</a>\n";
echo "- <a style='color:red' href=\"mafia.php?mod=$mod&amp;act=edit&amp;nov=redd&amp;id=$id&amp;ps=$ps&amp;nick=$nk&amp;ref=$ref\">Redd et</a><br/>\n";
$_v->divide();
}
echo $geri;
}elseif($act == "mesaj"){
if($id != 1 && $id != $aparici['id']){
echo "Sizin bura girise icazeniz yoxdur!.<br/>\n";
$_v->divide();
echo $geri;
break;
}
if(!isset($_POST['send'])){
echo "Umumi Mesaj:<br/>";
$_v->action( "mafia.php?mod=$mod&amp;act=mesaj&amp;id=$id&amp;ps=$ps&amp;ref=$ref" );
print $_v->input( "<input type=\"text\" name=\"mesaj{$ref}\" title=\"Mesaj\" emptyok=\"true\"/>" )."<br/>";
echo "Yalniz:<br/>\n";
$option = "<select name=\"kime{$ref}\">|";
$option .= "<option value=\"1\">Uzvlere</option>|";
$option .= "<option value=\"2\">Rehberlere</option>|";
$option .= "</select>";
print $_v->select( $option )."<br/>";
print $_v->submit('G&#246;nder','send=ok');
}else{
if($_POST["kime"] != 1 && $_POST["kime"] != 2){
echo "Duzgun secim edin!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if($id == 1){
$where = "`id` != '1'";
}else{
$where = "`id` NOT IN (1,{$aparici['id']})";
}

if($_POST["kime"]==1){
$s = mysql_query("SELECT * FROM `users` WHERE `mafia` = '1' and `mafia_act` = '1' and {$where} and `mafia_cp` = '0';");
$kime = "Uzvlerine";
}elseif($_POST["kime"]==2){
$s = mysql_query("SELECT * FROM `users` WHERE `mafia_cp` > '0' and {$where};");
$kime = "Rehberlerine";
}

while($list = mysql_fetch_array($s)){
$nk = $list['id'];
$user = $list['user'];
$mesaj = $_POST['mesaj'];
$inf = users("*",$id);

mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '$nk' , `towhom` = '$user' , `idwho` = '1' , `who` = '{$inf['user']}' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$mesaj';");
}

echo "Yazd&#305;g&#305;n&#305;z mesaj b&#252;t&#252;n Mafia oyun $kime g&#246;nderildi.!<br/>\n";
}
$_v->divide();
echo $geri;
}elseif($act == "delroom"){
if($id != 1 && $id != $aparici['id']){
echo "Sizin bura girise icazeniz yoxdur!.<br/>\n";
$_v->divide();
echo $geri;
break;
}
if(mysql_query("delete FROM `mafia_room` where `mafia_id` = '1';")){
echo "<u>Mafia oyun otagi temizlendi!.</u><br/>";
}else{
echo "Sehvlik kodu: ".mysql_error();
}
$_v->divide();
echo $geri;
}elseif($act == "callroom"){
if($id == 1){
$where = "`id` != '1'";
$kime = "ve rehberler";
}elseif($id == $aparici['id']){
$where = "`id` NOT IN (1,{$aparici['id']})";
$kime = "ve adminler";
}else{
$where = "`mafia_cp` = '0'";
}
if(!isset($_POST['call'])){
echo "Uzvler:<br/>";
$_v->action( "mafia.php?mod=$mod&amp;act=callroom&amp;id=$id&amp;ps=$ps&amp;ref=$ref" );
$option = "<select name=\"who{$ref}\">|";
$option .= "<option value=\"1\">Butun uzvler {$kime}</option>|";
$option .= "<option value=\"2\">Yalniz online olanlar</option>|";
$option .= "</select>";
print $_v->select( $option )."<br/>";
print $_v->submit('G&#246;nder','call=ok');
}else{
$who = intval($_POST['who']);

if($who != 1 && $who != 2){
echo "Duzgun secim edin!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if($who==1){
$sql = mysql_query("UPDATE `users` SET `con` = '9' where `mafia` = '1' and `mafia_act` = '1' and {$where};");
$kime = "Butun";
}else{
$sql = mysql_query("UPDATE `users` SET `con` = '9' where `time` > '$SERVER_TIME' and `mafia` = '1' and `mafia_act` = '1' and {$where};");
$kime = "Onlayn olan butun";
}

if($sql){
echo $kime." Mafia oyun uzvleri otaga devet gonderildi!.<br/>\n";
}else{
echo "Sehvlik kodu: ".mysql_error();
}
}
$_v->divide();
echo $geri;
}elseif($act == "duzelis"){
if($id != 1 && $id != $aparici['id']){
echo "Sizin bura girise icazeniz yoxdur!.<br/>\n";
$_v->divide();
echo $geri;
break;
}
if(!isset($_POST['add'])){
$_v->action( "mafia.php?mod=$mod&amp;act=duzelis&amp;id=$id&amp;ps=$ps&amp;ref=$ref" );
echo "Otaq mesaji:<br/>\n";
print $_v->input( "<input type=\"text\" name=\"room{$ref}\" title=\"Otaq mesaji\" value=\"".$a_info['info']."\" emptyok=\"true\"/>" )."<br/>";
if($id == 1){
echo "Aparici: (Id nomresi)<br/>\n";
print $_v->input( "<input type=\"text\" name=\"aparici{$ref}\" title=\"Aparici\" value=\"".$a_info['admin']."\"/>")."<br/>\n"; }
echo "Oyun Statusu:<br/>\n";
$option = "<select name=\"sts{$ref}\">|";
$option .= "<option value=\"0\">Aciq</option>|";
$option .= "<option value=\"1\">Bagli</option>|";
$option .= "</select>";
print $_v->select($option,$a_info['act'])."<br/>\n";
$_v->divide();
print $_v->submit('Deyis','add=ok');
}else{
$room = mysql_real_escape_string($_POST['room']);
$rehber = intval($_POST['aparici']);
$sts = intval($_POST['sts']);

if($id == 1){
if(empty($_POST['aparici'])){
echo "Aparicini teyin etmediniz!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$rehber';");
if(!mysql_affected_rows()){
echo "Bazada bele istifadeci yoxdur!.<br/>\n";
$_v->divide();
echo $geri;
break;
}

if($rehber != $aparici['id']){
$inf = users("*",$rehber);
$message = "Hormetli <b>{$inf['user']}</b>, <u>{$row['user']}</u> Mafia oyununda size aparici vezifesini layiq gordu.!";
$message_old = "Hormetli <b>{$aparici['user']}</b>, <u>{$row['user']}</u> Mafia oyununda sizi aparici vezifesinden azad etdi.!";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$inf['id']}' , `towhom` = '{$inf['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message';");
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '{$aparici['id']}' , `towhom` = '{$aparici['user']}' , `idwho` = '0' , `who` = 'Sistem' , `time` = '$SERVER_TIME' ,`topic` = 'Mafia Oyunu' , `message` = '$message_old';");
mysql_query ("INSERT INTO `mafia_room` SET `usid` = '$id', `name` = '{$row['user']}', `mafia_id` = '1', `text` = '<span style=\'color:red\'><b>{$inf['user']} niki oyuna aparici teyin olundu.!</b></span>', `kime_nik` = '', `nov` = '0', `time` = '$SERVER_TIME';");
mysql_query ("Update `users` set `mafia` = '1', `mafia_act` = '1', `mafia_cp` = '1', `con` = '9' where `id` = '$rehber';");
mysql_query ("Update `users` set `mafia_cp` = '0' where `id` = '{$aparici['id']}';");
}

$where = ", `admin` = '$rehber'";
}
mysql_query("update `mafia` set `info` = '$room', `act` = '$sts' {$where} where `id` = '1';");
echo "<u>Duzeli&#351;ler qeyde alindi.!</u><br/>";
}
$_v->divide();
echo $geri;
}
break;
}

echo "Oyuncu <b>Nik / ID</b><br/>";
$_v->action( "mafia.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;ref=$ref" );
print $_v->input( "<input type=\"text\" name=\"nick\" title=\"Oyuncu niki\" emptyok=\"true\"/>" )."<br/>";
print $_v->submit('Redakte et','act=edit');
$_v->divide();
echo "<a href=\"mafia.php?mod=$mod&amp;act=tesdiq&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tesdiq g&#246;zleyenler</a> ($tesdiq)<br/>";
echo "<a href=\"mafia.php?mod=$mod&amp;act=callroom&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyun uzvleri ota&#287;a cagir</a><br/>";
if($id == 1 || $id == $aparici['id']){
$_v->divide();
echo "<a href=\"mafia.php?mod=$mod&amp;act=mesaj&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Uzvlere mesaj</a><br/>";
echo "<a href=\"mafia.php?mod=$mod&amp;act=delroom&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Otagi temizle</a><br/>";
echo "<a href=\"mafia.php?mod=$mod&amp;act=duzelis&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyun duzelisleri</a><br/>";
}
$_v->divide();
echo $geri;
break;

default:
$_v->align('center');
echo "<a href='mafia.php?mod=rules&amp;id=$id&amp;ps=$ps&amp;ref=$ref'><img src='img/mafia.gif' alt='Mafia Clan'/></a><br/>
<b><a href='mafia.php?mod=rules&amp;id=$id&amp;ps=$ps&amp;ref=$ref'>Mafia Clan Qaydalari</a></b><br/>";
$_v->divide();
echo "<b>Apar&#305;c&#305;:</b> <a href='info.php?id=$id&amp;ps=$ps&amp;nk={$aparici['id']}&amp;ref=$ref'>{$aparici['user']}</a><br/>";
echo "Mafia &#252;zvleri: (<b>$uzv</b>)<br/>\n";

$_v->align('left');

if($id != 1 && $id != $aparici["id"] && !$uzv_user && $mafia){
echo "<span style='color:red'><i>Oyuna girisiniz hele tesdiqlenmeyib!.</i></span><br/>";
$_v->divide();
}

if($id == 1 || $mafia_cp || $id == $aparici['id']){
echo "&#xbb; <a href=\"mafia.php?mod=panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Mafia Panel</a><br/>"; }

echo "&#xbb; <a href='mafia.php?mod=room&amp;id=$id&amp;ps=$ps&amp;ref=$ref'>Mafia Ota&#287;&#305;</a>($uzv)<br/>";
echo "&#xbb; <a href='mafia.php?mod=kick_game&amp;id=$id&amp;ps=$ps&amp;ref=$ref'>Qovulanlar</a>($ban_uzv)<br/>";
if($id != 1 && $id != $aparici["id"] && !$mafia){
echo "&#xbb; <a href=\"mafia.php?mod=connect&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Oyuna uzv ol</a><br/>"; }
break;
}

if($mod) echo "<a href='mafia.php?id=$id&amp;ps=$ps&amp;ref=$ref'>Mafia Clan</a><br/>";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Tanisliq</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

//$_v->align('center');
//echo "Mafia Clanda: (<b>$uzv</b>)<br/>\n";
//echo "Programmer: <b>GameKinq</b> Created by<br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>