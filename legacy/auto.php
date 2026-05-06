<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$admin_p_arr) = check_login($link);
$user_not_fond = false;

if($id!='1' or $row['level']!='9')
{
$_v->title('Olmaz','center');
$_v->fsize1($fsize1);
echo "Sizin buna h&#252;ququnuz yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

function date_reqem_time($date) {
$date = str_replace(" ", "",$date);
$date = preg_replace("/([0-9]{2}).([0-9]{2}).([0-9]{4})-([0-9]{2}):([0-9]{2}):([0-9]{2})/i","$4,$5,$6,$2,$1,$3",$date);
if(!preg_match("!^[0-9//,]+$!i",$date)){
return 'error';
}
$date = explode(',',$date);
return mktime($date[0],$date[1],$date[2],$date[3],$date[4],$date[5]);
}
function cuci($cuci)
{
$cuc = substr($cuci,strlen($cuci)-1,strlen($cuci));
$cicu=array('1'=>''.$cuci.'-ci','2'=>''.$cuci.'-ci','3'=>''.$cuci.'-c&#252;','4'=>''.$cuci.'-c&#252;','5'=>''.$cuci.'-ci','6'=>''.$cuci.'-c&#305;','7'=>''.$cuci.'-ci','8'=>''.$cuci.'-ci','9'=>''.$cuci.'-cu','0'=>''.$cuci.'-cu','11'=>'Noyabr','12'=>'Dekabr');
$cuc = $cicu[$cuc];
return $cuc;
}

function load_panel($user,$userid){
global $HTTP_GET_VARS;
if($HTTP_GET_VARS['add']!='1')
{
return '0';
}
$file = '<?PHP //user: '.$user.' 
';
$file .= '$p_arr = array(
';
for ($i=0;$i<=250;$i++){
$file .= '\''.$i.'\' => \'0\'';
if($i!='250')$file .= ',
';
else $file .= '
';
}
$file .= ');
';
$file .= '?>';

if(file_put_contents('file/select/'.$userid.'.php',$file))
{
mysql_query("update `users` set `panel` = '1' where `id`='".$userid."';");
@chmod(addslashes("file/select/".$userid.".php"), 02777);

echo 'Melumat qeyd oldu<br/>';
}
else
{
echo 'Error update<br/>';
}
return '1';
}
if($nk!=''){
$nk=trim($nk);
$latuser=strtolower($nk);
if (!ctype_digit($nk)) {
$select_db = mysql_query ("Select `id`,`user`,`level` from `users` where `latuser` = '".$latuser."';");
} else {
$select_db = mysql_query ("Select `id`,`user`,`level` from `users` where `id` = '".$nk."';");
}
if (mysql_affected_rows() == 0) {
$user_not_fond = '1';
$b = '8';
}
else
{
$inf = mysql_fetch_array($select_db);
$nk = $inf["id"];
$b = '2';
}
}
function user_level($id){
$lev = mysql_query("select `name` from `levels` where `level`='".$id."';");
$rowl=mysql_fetch_array($lev);
return $rowl['name'];
}

function edit_php($nk,$np){
$data = file('file/'.$nk.'.php');
$b = '\''.$np.'\' =>';

foreach($data as $f){

if(stristr($f,$b)!=false)
{
preg_match('#=> \'(.*)\'#',$f,$matches); 
if($matches[1]=='0'){$np = '1';}else{$np='0';};
$save .= $b.' \''.$np.'\',
';
}else{
$save .= $f;
}
}
if(strlen($save)>100)
file_put_contents('file/'.$nk.'.php',$save);
}
function standart_panel($nk,$level,$a){
global $inf;
if($a=='1'){
if(!file_exists('file/level/'.$level.'.php')){
echo '<b>Error</b>: Standart Panel yoxdur<br/>';
return;
}
$data = file('file/level/'.$level.'.php');
$save ='<?PHP //user: '.$inf['user'].'
';
foreach($data as $key => $f){
if($key!='0')
$save .= $f;
}
if(file_put_contents('file/select/'.$nk.'.php',$save))
{
echo 'Panel Standartlaşdı.<br/>';
}
else
{
echo 'Error.<br/>';
}
}
elseif($a=='2')
{
if(@unlink('file/select/'.$nk.'.php'))
{
$select_r = mysql_query("select `level` from `users` where `id`='".$nk."' LIMIT 1;");
$inf_r=mysql_fetch_array($select_r);
$inf_r = ($inf_r>3) ? '2' : '0';
mysql_query("update `users` set `panel` = '".$inf_r."' where `id`='".$nk."';");
echo 'Paneli Leğv Edildi!<br/>';
}
else
{
echo 'Bu istifadeçinin paneli yoxdur!<br/>';
}
}
sleep(1);
return;
}
function array_panel($a,$b,$c=null){
global $id,$ps,$nk,$ref,$np,$HTTP_GET_VARS;
if($HTTP_GET_VARS['l']){
$dir_name = 'level';
$bb = "&amp;b=".$HTTP_GET_VARS['b'];
$nkl = "&amp;l=".$HTTP_GET_VARS['l'];
}
else
{
$dir_name = 'select';
$bb ='';
$nkl = "&amp;nk=".$nk;
}
if($np!=''){
if($a>$np or $b<$np or !ctype_digit($np))
{
echo 'Melumat sehvdir.
<br/>----<br/>
';
}else{
edit_php($dir_name.'/'.$nk,$np);
if($np=='0'){$np = '1';}else{$np='0';};
}
}
require("file/".$dir_name."/".$nk.".php");
//11=>'Ban Açmaq',12=>'Silinmişi niki qaytarmaq',13=>'Xaric Edileni qaytarmaq',14=>'İP Açmaq',15=>'Telefonu açmaq',16=>'Tam Iqnor açmaq',
$name = array(0=>'Admin Panel',1=>'Ceza Panel',2=>'Redaktor',3=>'Bal Panel',4=>'Xüsusi funksiyalar',5=>'Şikayyet panel',6=>'Anket Edit',7=>'Gizli Axtarış',8=>'Ümumi Qurğular',9=>'Qeydiyyat Sayı',10=>'Sual elave et',17=>'Auto Delete',18=>'MMS-leri silmek',19=>'Mektubları silmek',20=>'Mesajları silmek',21=>'Otağları silmek',22=>'Postu 0 olanları silmek',23=>'30 gün gelmeyenleri silmek',24=>'Sorğu Elave Et',25=>'Sorğu sil',26=>'Otağlara Elan',27=>'Elan elave et',28=>'Elani Sil',29=>'Ballı Elani Sil',30=>'Sualları tek-tek Sil',31=>'Evlilik Elanını Sil',32=>'Otağın Adını Deyişdir',33=>'Rütbenin Adları',34=>'Extra Panel',35=>'Anti-Reklam Panel',36=>'Online Gösterici',37.5=>'Smile Panel',37=>'Qefes Panel',38=>'Reytinq Paneli',39=>'Control Panel',40=>'Mesaj Paneli',41=>'Mektub-Mesaj Oxumaq',42=>'MMS Mektubları Oxu',43=>'Otaqları Oxu',44=>'-',45=>'Topiki Deyiş',50=>'Leqeb',51=>'Parol',52=>'Postlar',53=>'Oyun postlar',54=>'Suala Cavab',55=>'Status',56=>'Sözleri silmek',57=>'Toxunulmazlıq',58=>'Tam Mexvilik',59=>'Şexsini görmek',60=>'Görünmezlik',61=>'Şriftin rengi',62=>'Qeydiyyat Tarixi',63=>'Rütbe',64=>'Forum Rütbe',70=>'Bal vermek',71=>'Bal Almaq',72=>'Bal Qiymetleri',73=>'Nezaret Paneli',74=>'Nezaret Panelini silmek',75=>'Bank Bölmesi',76=>'Bank Bölmesi silmek',77=>'Rengli nik panel',78=>'Rengli nik vermek',79=>'Bal Yükleme qiymetleri',80=>'Panelin şifresi',81=>'Vaxt ile xaric',82=>'Xeberdarlıq',83=>'TAM İqnor',84=>'Ban İstifadeçi',85=>'Ban Telefon+IP',86=>'IP-Soft+Del Hidden',87=>'İstifadeçi adını sil',88=>'Bütün yazıları sil',92=>'Qaytarmaq',97=>'Otaq Nömresini deyişmek',98=>'Otağın adını deyişmek',99=>'Otaqa bal-post icaze',100=>'Znak ver',101=>'ID düzelt',102=>'Rütbe ver',105=>'Elave et',106=>'Reklami sil',107=>'Sözleri oxumaq',120=>'Silinen Mesajlar',121=>'Xeberdarlıq',122=>'Xaric Edenler',123=>'Qaytarılanlar',124=>'IP Ban Edenler',125=>'Browser Ban Edenler',126=>'Leqeb Ban Edenler',127=>'Bazadan Silenler',128=>'Tam İqnor Edenler',129=>'Gizli Otaq',130=>'Müveqqeti rütbe',131=>'Uğursuz Qeydiyyat',132=>'-',133=>'Silmek Hüququ',134=>'Oxumaq hüququ',140=>'Indexe Mesaj 1',141=>'Indexe Mesaj 2',142=>'Indexe link',143=>'Dehlize Mesaj',144=>'Top reytinq',145=>'İstifadeçilere Mektub',146=>'İstifadeçilere Mesaj',150=>'Mektublar oxumaq',151=>'Mesaj oxumaq',152=>'Silmek',155=>'Silmek',170=>'Qaytarmaq',171=>'5 deqiqe',172=>'15 deqiqe',173=>'30 deqiqe',174=>'45 deqiqe',175=>'1 saat',176=>'2 saat',177=>'3 saat',178=>'5 saat',179=>'1 gün',180=>'2 gün',181=>'3 gün',182=>'5 gün',183=>'10 gün',183=>'15 gün',184=>'20 gün',185=>'30 gün',186=>'45 gün',187=>'60 gün',188=>'90 gün',189=>'Hemişe otaqa elan düşsün',190=>'Otaqdan qovubsa elan düşsün',200=>'Otaq yazılar',201=>'IP-Soft Görmek',202=>'Tam Toxunulmazı qovmaq',203=>'Mektub Reklam (Nezaret)',204=>'Smile Panel',210=>'kursiv yazı',211=>'Altı xetli',212=>'Qalın yazı',213=>'Böyük yazı',214=>user_level(0),215=>user_level(1),216=>user_level(2),217=>user_level(3),218=>user_level(4),219=>user_level(5),220=>user_level(6),221=>user_level(7),222=>user_level(8),223=>user_level(9),225=>'Otaqa elan düşsün',226=>'Hemişe otaqa elan düşsün',227=>'Otaqdan qovubsa elan düşsün',228=>'Qaytarmaq',229=>'Hemişe otaqa elan düşsün',230=>'Otaqdan qovubsa elan düşsün',231=>'Qaytarmaq',233=>'Hemişe otaqa elan düşsün',234=>'Otaqdan qovubsa elan düşsün',235=>'Qaytarmaq',236=>'Silmek hüququ',237=>'Hemişe otaqa elan düşsün',238=>'Otaqdan  elan düşsün',250=>'Son');
$in = array(0=>' -', 1=>'+');
if($c!=null){
echo '<b>'.$name[$c].'</b><br/>----<br/>';
$c = "c=$c&amp;";
}
for ($i=$a;$i<=$b;$i++){
if($name[$i]!='-' and $name[$i]!='')
print '[<a href="auto.php?'.$c.'np='.$i.$bb.'&amp;id='.$id.'&amp;ps='.$ps.$nkl.'&amp;ref='.$ref.'">'.$in[$p_arr[$i]].'</a>]';
if($i<='4' or $i=='32' or $i=='34' or $i=='35' or $i=='39' or $i=='40' or $i=='41' or $i=='42' or $i=='63' or $i=='81' or $i=='82' or $i=='83' or $i=='84' or $i=='85' or $i=='87' or $i=='170' or $i=='200' or $i=='203'){
if($p_arr[$i]==1)
print ' -<a href="auto.php?c='.$i.$bb.'&amp;id='.$id.'&amp;ps='.$ps.$nkl.'&amp;ref='.$ref.'">'.$name[$i].'</a><br/>';
else
echo ' -'.$name[$i].'<br/>';
}
elseif($name[$i]=='-')
echo '----<br/>';
elseif($name[$i]!='')
echo ' -'.$name[$i].'<br/>';

}
echo "\n";
}
ob_start();
$_v->title('Auto Panel','center');
$_v->fsize1($fsize1);
echo '<b>Auto Panel</b><br/>----<br/>';
$_v->fsize2($fsize2);
$_v->fsize1($fsize1);
$_v->align('left');
switch($b) {
default:
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=3&amp;ref='.$ref.'">Standart Panel</a><br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=8&amp;ref='.$ref.'">Xüsusi Panel</a><br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=4&amp;ref='.$ref.'">Online Vaxt</a><br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=5&amp;ref='.$ref.'">Aylıq Hediyye</a><br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=7&amp;ref='.$ref.'">Saatlıq Hediyye</a><br/>';
@mysql_query("UPDATE `users` SET `ontime`='".$row['ontime']."' WHERE `ontime`>'".$row['ontime']."';");
break;



case '8':
if($inf['user']=='' and $nk!=''){
echo 'Axtardıqınız istifadeçi tapılmadı.<br/>----<br/>';
}
echo "Leqeb:<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"nk$ref\" title=\"nick\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Select','action=save');

echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=9&amp;ref='.$ref.'">Xüsusi Panel olanlar</a><br/>';
break;

case '7':
if($_POST['bal_active']!='' and $_POST['bal_active1']!=''){
if($_POST['bal_active']==0 or $_POST['bal_active1']==0)
echo 'Her saata bal hediyyesi leğv edildi.<br/>';
else
echo 'Her saata göre Kisilere '.$_POST['bal_active'].' Xanimlara '.$_POST['bal_active1'].' bal hediyye verilecek.<br/>';
mysql_query("UPDATE `users` SET `st_bal_count`='".$_POST['bal_active']."' WHERE `st_bal_count`!='".$_POST['bal_active']."';");
mysql_query("UPDATE `users` SET `st_bal_count1`='".$_POST['bal_active1']."' WHERE `st_bal_count1`!='".$_POST['bal_active1']."';");
mysql_query("UPDATE `setting` SET `bal`='".$_POST['bal_active']."', `balq`='".$_POST['bal_active1']."' WHERE `klu4`='1';");
}else{
echo 'Saatlıq bal hediyyesi<br/>----<br/>';

echo "1 Saata düşen bal (0 deaktiv demekdir).<br/>----<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=7&amp;ref=$ref");
echo "Kisi<br/>";
print $_v->input("<input name=\"bal_active$ref\" maxlength=\"4\" value=\"$row[st_bal_count]\" format=\"*N\" emptyok=\"true\"/>").'<br/>';
echo "Xanim<br/>";
print $_v->input("<input name=\"bal_active1$ref\" maxlength=\"4\" value=\"$row[st_bal_count1]\" format=\"*N\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Yenile','action=save');

}
break;

case '9':
$dir = opendir($PUBLICHTML_URL."file/select");
$array = array();
while ($file = readdir($dir))
{
if($file!= "." and $file!= ".." and strrchr($file,'.')=='.php')
{
$array[] = $file;
}
}
if(count($array)==0)
{
echo "Heçkese xüsusi panel verilmeyib...<br/>";
}
else
{
echo "Xüsusi Paneli olanlar:<br/>----<br/>\n";
}
$max = 12;
$total = count($array);
$start = (!isset($page)) ? 0 : ($page * $max);
$end = (!isset($page)) ? $max : ($start + $max);
if(ceil($total/$max) < $page)
{
$start=0;
$end=$max;
}
while ($start < $end)
{
if(!empty($array[$start]))
{
$us = select_id(strtok($array[$start],".php"),'`id`,`user`,`sex`');
$sex = ($us->sex == 0) ? "K" : "Q";
if($us->user=='User Delete')@unlink('file/select/'.$array[$start]);
echo ($start+1).") <a href=\"auto.php?id=$id&amp;ps=$ps&amp;nk=".strtok($array[$start],".php")."&amp;$ref\">".$us->user."</a> (".$sex.") <br/>\n";
}
$start++;
}
closedir($dir);
if($total > $max)
{
echo page_next("auto.php?c=$c&amp;id=$id&amp;ps=$ps&amp;b=9&amp;$ref",$total,$max,$page);
}

break;





case '4':
function php_online_time($array,$script_time){
$file = "<?PHP //Auto Online v2\n";
$file .= "\$_AUTO['chat'] = '".(intval($array['chat'])*60)."';\n";
$file .= "\$_AUTO['online'] = '".(intval($array['online'])*60)."';\n";
$file .= "\$_AUTO['ofline'] = '".(intval($array['ofline'])*60)."';\n";
$file .= "\$_AUTO['reftime'] = '".intval($array['reftime'])."';\n";
$file .= "\$_AUTO['regtime'] = '".(intval($array['regtime'])*60)."';\n";
$file .= "\$_AUTO['admin'] = '".narmobila($array['admin'])."';\n";
$file .= "\$_AUTO['nomre'] = '".narmobila($array['nomre'])."';\n";
$file .= "\$_AUTO['time'] = '".$script_time."';\n";
$file .= '?>';
if(@fileperms("file/dat_folder/online.php")!='33279'){
echo 'Error update 1<br/>';
return '0';
}
elseif(strlen($file)<100)
{
echo 'Tekrar ceht edin.<br/>';
}
elseif(file_put_contents('file/dat_folder/online.php',$file))
{
echo 'Melumat qeyd oldu<br/>';
}
else
{
echo 'Error update 2<br/>';
}
return '1';
}

if($_POST['chat']!='' and $_POST['online']!='' and $_POST['ofline']!='' and $_POST['reftime']!='' and $_POST['regtime']!='' and $_POST['admin']!='' and count($_POST)=='9')
{
if($_POST['chat']<'5' or !ctype_digit($_POST['chat'])){
$error_raport[] = 'Otaqların online vaxtı 5 deqiqeden az olmamalıdır.';
}
if($_POST['online']<'5' or !ctype_digit($_POST['online'])){
$error_raport[] = 'Ümumi bölmelerın online vaxtı 5 deqiqeden az olmamalıdır.';
}
if($_POST['ofline']<'1' or !ctype_digit($_POST['ofline'])){
$error_raport[] = 'Saytda aktiv olmayan istifadeçinin oflineye düşmesi 1 deqiqeden az olmamalıdır.';
}
$date_reqem_time = date_reqem_time($_POST['time']);
if(!ctype_digit($_POST['rtime']) or $date_reqem_time=='error'){
$_POST['rtime'] = $SERVER_TIME;
$_POST['time'] = date('d.m.Y - H:i', $SERVER_TIME);
$error_raport[] = 'Serverin Saatı düzgün seçilmeyib.'.$_POST['rtime'];
}
$date_reqem_time = $date_reqem_time-(int)$_POST['rtime'];
if($_POST['reftime']<'2300' or $_POST['reftime']>'2355'){
$error_raport[] = 'Sıfırlanma vaxtı, 2300 dan - 2355 qeder olmalıdır.';
}

if($_POST['regtime']<'0' or $_POST['regtime']>'999'){
$error_raport[] = 'Qeydiyyat intervalı, 0 - 999 deqiqe olmalıdır';
}
if(strlen($_POST['admin'])<'3' or strlen($_POST['admin'])>'30'){
$error_raport[] = 'Adminin Niki 3 - 30 simvola qeder olmalıdır';
}
if(strlen($_POST['nomre'])>'30'){
$error_raport[] = 'Elaqe nomresi 30 simvoldan çox olmamalıdır.';
}
$error_message_count = count($error_raport);
if($error_message_count!='0'){
while(list($num,$num1) = each($error_raport)) {
echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
}
echo $divide;
echo "Yazılan reqemler deqiqe kimi hesablanır.<br/>----<br/>\n";
echo "Otaqlar:<br/>\n";

$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=4&amp;ref=$ref");

print $_v->input("<input name=\"chat$ref\" maxlength=\"12\" value=\"".$_POST['chat']."\" format=\"*N\"  emptyok=\"true\"/>").'<br/>';

echo "Online:<br/>\n";
print $_v->input("<input name=\"online$ref\" maxlength=\"12\" value=\"".$_POST['online']."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';


echo "Anket Ofline:<br/>\n";
print $_v->input("<input name=\"ofline$ref\" maxlength=\"12\" value=\"".$_POST['ofline']."\" format=\"*N\"  emptyok=\"true\"/>").'<br/>';

echo "Sıfırlanma vaxtı:<br/>\n";

print $_v->input("<input name=\"reftime$ref\" maxlength=\"4\" value=\"".$_POST['reftime']."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';


echo "Qeydiyyat intervalı:<br/>\n";
print $_v->input("<input name=\"regtime$ref\" maxlength=\"4\" value=\"".$_POST['regtime']."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

echo "Adminin Niki:<br/>\n";
print $_v->input("<input name=\"admin$ref\" maxlength=\"30\" value=\"".$_POST['admin']."\" emptyok=\"true\"/>").'<br/>';


echo "Elaqe nomresi:<br/>\n";
print $_v->input("<input name=\"nomre$ref\" maxlength=\"30\" value=\"".$_POST['nomre']."\" emptyok=\"true\"/>").'<br/>';


echo "".date('d.m.Y - H:i:s', time())."<br/>\n";
print $_v->input("<input name=\"time$ref\" maxlength=\"21\" value=\"".date('d.m.Y - H:i:s', $SERVER_TIME)."\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Yenile','rtime='.time());
}else{
php_online_time($_POST,$date_reqem_time);
}
}else{
echo "Yazılan reqemler deqiqe kimi hesablanır.<br/>----<br/>\n";
echo "Otaqlar:<br/>\n";

$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=4&amp;ref=$ref");

print $_v->input("<input name=\"chat$ref\" maxlength=\"12\" value=\"".(($SERVER_TIME-$_AUTO['chat'])/60)."\" format=\"*N\" title=\"chat online\" emptyok=\"true\"/>").'<br/>';

echo "Online:<br/>\n";
print $_v->input("<input name=\"online$ref\" maxlength=\"12\" value=\"".(($SERVER_TIME-$_AUTO['online'])/60)."\" format=\"*N\" title=\"online\" emptyok=\"true\"/>").'<br/>';

echo "Anket Ofline:<br/>\n";
print $_v->input("<input name=\"ofline$ref\" maxlength=\"12\" value=\"".($_AUTO['ofline']/60)."\" format=\"*N\" title=\"ofline online\" emptyok=\"true\"/>").'<br/>';


echo "Sıfırlanma vaxtı:<br/>\n";
print $_v->input("<input name=\"reftime$ref\" maxlength=\"4\" value=\"".$_AUTO['reftime']."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

echo "Qeydiyyat intervalı:<br/>\n";
print $_v->input("<input name=\"regtime$ref\" maxlength=\"4\" value=\"".($_AUTO['regtime']/60)."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';
echo "Adminin Niki:<br/>\n";
print $_v->input("<input name=\"admin$ref\" maxlength=\"30\" value=\"".$_AUTO['admin']."\" emptyok=\"true\"/>").'<br/>';
echo "Elaqe nomresi:<br/>\n";
print $_v->input("<input name=\"nomre$ref\" maxlength=\"30\" value=\"".$_AUTO['nomre']."\" emptyok=\"true\"/>").'<br/>';

echo "".date('d.m.Y - H:i:s', time())."<br/>\n";
print $_v->input("<input name=\"time$ref\" maxlength=\"21\" value=\"".date('d.m.Y - H:i:s', $SERVER_TIME)."\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yenile','rtime='.time());
}
break;


case '5':
if($_POST['say1']!=''){
$active_top = file('file/dat_folder/top_active.dat');
$save = $active_top[0];
for($i=1; $i<=$active_top[0]; $i++){
if($_POST['say'.$i]==''){
$error_raport[] = cuci($i).' bölmeye heçne yazmamısız.';
}
elseif(!ctype_digit($_POST['say'.$i])){
$error_raport[] = 'Bal hediyyesi yalnız reqemlerden ibaret olmalıdır.';
}
$save .=  $_POST['say'.$i]."\n";
}
$save =  substr($save,0,-1);
$error_message_count = count($error_raport);
if($error_message_count!='0'){
while(list($num,$num1) = each($error_raport)) {
echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
}
echo $divide;
echo "Aktivlik reyqinqinde her ayın 1-i daha çox aktiv olan <a href=\"auto.php?id=$id&amp;ps=$ps&amp;b=6&amp;ref=$ref\">".trim($active_top[0])." istifadeçiye</a> bal hediyyesi.<br/>----<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=5&amp;ref=$ref");

for($i=1; $i<=$active_top[0]; $i++)
{

echo cuci($i)." yer:<br/>\n";
print $_v->input("<input name=\"say$i$ref\" maxlength=\"12\" value=\"".trim($active_top[$i])."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';


}
print $_v->submit('Yenile','action=save');

for($i=1; $i<=$active_top[0]; $i++)
{ 
print $_v->input("<postfield name=\"say$i\" value=\"$(say$i$ref)\"/>");

}
}else{
if(strlen($save)>3)
file_put_contents('file/dat_folder/top_active.dat',$save); 
echo 'Melumat qeyd oldu<br/>----<br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=5&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
}else{
$active_top=file("file/dat_folder/top_active.dat");
echo "Aktivlik reyqinqinde her ayın 1-i daha çox aktiv olan <a href=\"auto.php?id=$id&amp;ps=$ps&amp;b=6&amp;ref=$ref\">".trim($active_top[0])." istifadeçiye</a> bal hediyyesi.<br/>----<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=5&amp;ref=$ref");

for($i=1; $i<=$active_top[0]; $i++)
{

echo cuci($i)." yer:<br/>\n";
print $_v->input("<input name=\"say$i$ref\" maxlength=\"12\" value=\"".trim($active_top[$i])."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

}
print $_v->submit('Yenile','action=save');

for($i=1; $i<=$active_top[0]; $i++)
{
print $_v->input("<postfield name=\"say$i\" value=\"$(say$i$ref)\"/>");
} 
}
break;

case '6':
if($_POST['top_user']!=''){
if(($_POST['top_user'])>99){
$error_raport[] = 'Mükafatlandırılacaq şexslerin sayı 99-dan çox olmamalıdır.';
}
if(!ctype_digit($_POST['top_user'])){
$error_raport[] = 'Mükafatlandırılacaq şexslerin sayı reqemlerden ibaret olmamalıdır.';
}
$error_message_count = count($error_raport);
if($error_message_count!='0'){
while(list($num,$num1) = each($error_raport)) {
echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
}
echo $divide;
$active_top=file("file/dat_folder/top_active.dat");
echo "Neçe istifadeçi mükafatlandırılacaq?.<br/>----<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=6&amp;ref=$ref");

print $_v->input("<input name=\"top_user$ref\" maxlength=\"2\" value=\"".$_POST['top_user']."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yenile','action=save');

}else{

$data = file('file/dat_folder/top_active.dat');
foreach($data as $key => $f){
if($key==0)
$save .=  $_POST['top_user']."\n";
elseif($_POST['top_user']>=$key)
$save .=  $f;
}
if(strlen($save)>1)
file_put_contents('file/dat_folder/top_active.dat',$save);


echo 'Melumat qeyd oldu<br/>----<br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b=5&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
}else{
$active_top=file("file/dat_folder/top_active.dat");
echo "Neçe istifadeçi mükafatlandırılacaq?.<br/>----<br/>\n";
$_v->action("auto.php?id=$id&amp;ps=$ps&amp;b=6&amp;ref=$ref");

print $_v->input("<input name=\"top_user$ref\" maxlength=\"2\" value=\"".trim($active_top[0])."\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yenile','action=save');

}
break;


case '2':
if($_GET['l']!='')
{
echo 'Düzgün kecid etmediz.<br/>';
break;
}
if($_GET['c']=='r' )
{
$lev = mysql_query("select `name` from `levels` where `level` = '".$inf['level']."';");
$arr_inf=mysql_fetch_array($lev);
if($inf['level']>='4')$arr_status = 'Rütbe'; else $arr_status = 'Status';
echo 'Leqeb: <b>'.$inf['user'].'</b>.<br/>';
echo $arr_status.': <b>'.$arr_inf['name'].'</b>.<br/>';
echo $divide;

if($m=='1'){
echo 'Paneli - <b>'.$arr_inf['name'].'</b> Paneli ile eyni olmasına eminsiniz?<br/>
<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;m=3&amp;ref='.$ref.'">Beli</a> | 
<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Xeyir</a><br/>';
}elseif($m=='2'){
echo 'Paneli leğv edilsin?<br/>
<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;m=4&amp;ref='.$ref.'">Beli</a> | 
<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Xeyir</a><br/>';
}elseif($m=='3'){
standart_panel($nk,$inf['level'],'1');
}elseif($m=='4'){
standart_panel($nk,$inf['level'],'2');
}else{
if($inf['level']>='4')
echo '<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;m=1&amp;ref='.$ref.'">Standart</a> | ';
else
echo 'Standart | ';
echo '<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;m=2&amp;ref='.$ref.'">Leğv et</a><br/>';
}

echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
break;
}
if($inf['user']=='')
{
echo 'Axtardıqınız istifadeçi tapılmadı.<br/>
';
break;
}

$load_panel = '1';
if(!file_exists('file/select/'.$nk.'.php'))
{
if($add!='1'){
echo '<b>'.$inf['user'].'</b> üçün xüsusi panel yoxdur.<br/>';
echo $divide;
echo 'Paneli olsun?<br/>';
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;add=1&amp;ref='.$ref.'">Beli</a> |
<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'">Xeyir</a><br/>
';
}
$load_panel = load_panel($inf['user'],$_GET['nk']);
}
elseif($_GET['c']=='32')
{
array_panel(97,99,'32');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='34')
{
array_panel(100,102,'34');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='35')
{
array_panel(105,107,'35');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='39')
{
array_panel(120,134,'39');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='40')
{
array_panel(140,146,'40');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='41')
{
array_panel(150,152,'41');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='42')
{
array_panel(155,155,'42');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='0')
{
array_panel(5,45,'0');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='1')
{
array_panel(81,88,'1');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='2')
{
array_panel(50,64,'2');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='3')
{
array_panel(70,80,'3');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='4')
{
array_panel(200,204,'4');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='63')
{
array_panel(214,223,'63');
echo $divide;
echo '<a href="auto.php?c=2&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='81')
{
array_panel(170,190,'81');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='82')
{
array_panel(225,225,'82');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='83')
{
array_panel(92,92,'83');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='84')
{
array_panel(226,228,'84');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='85')
{
array_panel(229,231,'85');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='87')
{
array_panel(233,235,'87');;
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='170')
{
array_panel(237,238,'170');
echo $divide;
echo '<a href="auto.php?c=81&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='200')
{
array_panel(210,213,'200');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='201')
{
array_panel(214,223,'201');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='203')
{
array_panel(236,236,'203');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($load_panel=='1')
{
array_panel(0,4);
echo $divide;
echo '<a href="auto.php?c=r&amp;id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'">Restart Panel</a><br/>';
}
break;

case '3':
if($_GET['l']<'4' or $_GET['l']>'9' or !ctype_digit($_GET['l']) ){
$lev = mysql_query("select `level`,`name` from `levels` where `level` > '3' order by `level` desc;");
while($arr=mysql_fetch_array($lev)) {
echo "<a href=\"auto.php?id=$id&amp;ps=$ps&amp;b=3&amp;l=".$arr['level']."&amp;ref=$ref\">".$arr['name']."</a><br/>\n";
}
break;
}
$nk = $_GET['l'];
if(!file_exists('file/level/'.$nk.'.php'))
{
if($add!='1'){
echo 'Bu rütbeye uyğun panel yoxdur. 0505911994 nömresi ile elaqe saxlayın.<br/>';
}
break;
}
if($_GET['c']=='32')
{
array_panel(97,99,'32');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='34')
{
array_panel(100,102,'34');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='35')
{
array_panel(105,107,'35');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='39')
{
array_panel(120,134,'39');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='40')
{
array_panel(140,146,'40');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='41')
{
array_panel(150,152,'41');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='42')
{
array_panel(155,155,'42');
echo $divide;
echo '<a href="auto.php?c=0&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='0')
{
array_panel(5,45,'0');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='1')
{
array_panel(81,88,'1');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='2')
{
array_panel(50,64,'2');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='3')
{
array_panel(70,80,'3');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='4')
{
array_panel(200,204,'4');
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='63')
{
array_panel(214,223,'63');
echo $divide;
echo '<a href="auto.php?c=2&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='81')
{
array_panel(170,190,'81');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='82')
{
array_panel(225,225,'82');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='83')
{
array_panel(92,92,'83');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='84')
{
array_panel(226,228,'84');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='85')
{
array_panel(229,231,'85');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='87')
{
array_panel(233,235,'87');
echo $divide;
echo '<a href="auto.php?c=1&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='170')
{
array_panel(237,238,'170');
echo $divide;
echo '<a href="auto.php?c=64&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='200')
{
array_panel(210,213,'200');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='201')
{
array_panel(214,223,'201');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
elseif($_GET['c']=='203')
{
array_panel(236,236,'203');
echo $divide;
echo '<a href="auto.php?c=4&amp;id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;l='.$nk.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
else
{
array_panel(0,4);
echo $divide;
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;b='.$b.'&amp;ref='.$ref.'">Geri qayıt</a><br/>';
}
break;
}
echo $divide;
if($b!='')
echo '<a href="auto.php?id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'">Auto Panel</a><br/>';
echo '<a href="enter.php?id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'">Dehliz</a><br/>';

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>