<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
$user = $row['user'];

if($p_arr['0'] != 1) {
$_v->title('No Access','center');
$_v->fsize1($fsize1);
echo "Daxil Olma Icazeniz Yoxdur!<br/>\n";
print $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




$_v->title('Admin Panel');
$_v->fsize1($fsize1);
switch($go) {
default:



echo "<b>Admin Paneli</b><br/>----<br/>\n";

if($p_arr['2']==1 or $p_arr['6']==1 or $p_arr['1']==1){
echo "Nick ve ya ID:<br/>\n";
if($p_arr['2']==1){
$_v->action("admin.php?go=view&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"nick$ref\" title=\"nick\" emptyok=\"true\"/>").'<br/>';
print $_v->submit1('Redakte ET');
if($_v->ver!='wml')echo "<br/>";
}
if($p_arr['6']==1){
$_v->action("admin.php?go=infous&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

print $_v->input("<input name=\"nick$ref\" title=\"nick\" emptyok=\"true\"/>").'<br/>';


print $_v->submit1('Anketas&#305;');
echo "----<br/>\n";

}


}


if($p_arr['7']==1){
echo "<a href=\"a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Gizli Axtar&#305;&#351;</a><br/>\n";
}
if($p_arr['8']==1 or $p_arr['9']==1){
echo $divide;
}
if($p_arr['8']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bots&amp;ref=$ref\">&#220;mumi Qur&#287;ular</a><br/>\n";
}
if($p_arr['9']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=qeydiyyat&amp;ref=$ref\">Qeydiyyat Say&#305;</a><br/>\n";
}
if($id=='1' and $row['level']=='9'){
echo "<b><a href=\"auto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Auto Panel</a></b><br/>\n";
echo "<b><a href=\"mp.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MP3 Panel</a></b><br/>\n";
if($id == 1) echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=audio&amp;ref=$ref\">S&#601;sli mesaj panel</a><br/>\n";

}
if($p_arr['10']==1 or $p_arr['228']==1 or $p_arr['235']==1 or $p_arr['170']==1 or $p_arr['231']==1 or $p_arr['92']==1){
echo $divide;
}
if($p_arr['10']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=addvopr&amp;ref=$ref\">Sual elave et</a><br/>\n";
}
if($p_arr['228']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;ref=$ref\">Leqebi Ban Edilib</a><br/>\n";
}
if($p_arr['235']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;ref=$ref\">Leqebi Bazadan Silinib</a><br/>\n";
}
if($p_arr['170']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Edilib</a><br/>\n";
}
if($p_arr['231']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;ref=$ref\">IP-den ban Edilib</a><br/>\n";

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;ref=$ref\">Telefonu ban Edilib</a><br/>\n";
}
if($p_arr['92']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;ref=$ref\">Tam Iqnor Edilib</a><br/>\n";
}

if($p_arr['17']==1 or $p_arr['18']==1 or $p_arr['19']==1 or $p_arr['20']==1 or $p_arr['21']==1 or $p_arr['22']==1 or $p_arr['23']==1){
echo $divide;
}

if($p_arr['17']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=adel&amp;ref=$ref\">Auto Delete</a><br/>\n";
}
if($p_arr['18']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=clearmms&amp;ref=$ref\">MMS Mektublar&#305; Sil(1 ay)</a><br/>\n";
}
if($id=='1'){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=mekoxu&amp;ref=$ref\">Bildirisleri Sil (Oxunmu&#351;)</a><br/>\n";
}
if($p_arr['19']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=clearok&amp;ref=$ref\">Bildirisleri Sil(ham&#305;s&#305;n&#305;)</a><br/>\n";
}
if($id=='1'){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=msgoxu&amp;ref=$ref\">Mesajlar&#305; Sil (Oxunmu&#351;)</a><br/>\n";
}
if($p_arr['20']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=msgtmd&amp;ref=$ref\">Mesajlar&#305; Sil(ham&#305;s&#305;n&#305;)</a><br/>\n";
}
if($p_arr['21']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=clallroom&amp;ref=$ref\">Ota&#287;lar&#305; Sil</a><br/>\n";
}
if($p_arr['22']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=clear_us&amp;ref=$ref\">Deaktiv Userleri Sil</a><br/>\n";
}
if($p_arr['23']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=old_users&amp;ref=$ref\">Aktiv olmayan Userleri Sil</a><br/>\n";
}

if($p_arr['24']==1 or $p_arr['25']==1 or $p_arr['26']==1 or $p_arr['27']==1 or $p_arr['28']==1 or $p_arr['29']==1 or $p_arr['30']==1){
echo $divide;
}
if($p_arr['24']==1){
echo "<a href=\"votes.php?id=$id&amp;ps=$ps&amp;mode=add&amp;ref=$ref\">Sorgu Elave Et</a><br/>"; 
}
if($p_arr['25']==1){
echo "<a href=\"votes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Sorgu sil</a><br/>";
}


if($p_arr['26']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=tell&amp;ref=$ref\">Ota&#287;lara Elan</a><br/>\n";
}
if($p_arr['27']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=mobi&amp;ref=$ref\">Elan elave et</a><br/>";
}
if($p_arr['28']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dobi&amp;ref=$ref\">Elani Sil</a><br/>";
}
if($id=='1'){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=elanok&amp;ref=$ref\">Elani Sil (ham&#305;s&#305;n&#305;)</a><br/>";
}
if($p_arr['29']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Ball&#305; Elani Sil</a><br/>";
}
if($p_arr['30']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=delvoprose&amp;ref=$ref\">Suallar&#305; tek-tek Sil</a><br/>";
}

if($p_arr['31']==1){
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=dsvadbi&amp;ref=$ref\">Evlilik Elan&#305;n&#305; Sil</a><br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=razvod&amp;ref=$ref\">Evlileri Ayir</a><br/>";
}
if($p_arr['32']==1 or $p_arr['33']==1){
echo $divide;
}
if($p_arr['32']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Ota&#287;&#305;n Ad&#305;n Deyi&#351;dir</a><br/>\n";
}
if($p_arr['33']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels&amp;ref=$ref\">R&#252;tbenin Adlar&#305;</a><br/>\n";
}

if($p_arr['36']==1 or ($p_arr['35']==1 and ($p_arr['105']!=0 or $p_arr['106']!=0 or $p_arr['107']!=0)) or ($p_arr['34']==1 and ($p_arr['100']!=0 or $p_arr['101']!=0 or $p_arr['102']!=0))){
echo $divide;
}

if(($p_arr['34']==1) and ($p_arr['100']!=0 or $p_arr['101']!=0 or $p_arr['102']!=0)){
echo "[<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=extra&amp;ref=$ref\">Extra Panel</a>]<br/>\n";
}
if(($p_arr['35']==1) and ($p_arr['105']!=0 or $p_arr['106']!=0 or $p_arr['107']!=0)){
echo "[<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-Reklam Panel</a>]<br/>\n";
}
if($p_arr['36']==1){
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=online&amp;x=5&amp;ref=$ref\">Online G&#246;sterici</a><br/>";
}

if($p_arr['37']==1 or $p_arr['38']==1 or $p_arr['204']==1 or $p_arr['39']==1 or $p_arr['40']==1 or $p_arr['41']==1 or $p_arr['42']==1 or $p_arr['43']==1){
echo $divide;
}

if($p_arr['204']==1){
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Smile Panel</a><br/>\n";
}

if($p_arr['37']==1){
echo "<a href=\"qefes.php?cid=0&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qefes Panel</a><br/>\n";
}
if($p_arr['38']==1){
echo "<a href=\"admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq Paneli</a><br/>\n";
}
if($p_arr['39']==1 and ($p_arr['120']!=0 or $p_arr['121']!=0 or $p_arr['122']!=0 or $p_arr['123']!=0 or $p_arr['124']!=0 or $p_arr['125']!=0 or $p_arr['126']!=0 or $p_arr['127']!=0 or $p_arr['128']!=0 or $p_arr['129']!=0 or $p_arr['130']!=0 or $p_arr['132']!=0 or $p_arr['133']!=0)){
echo "<a href=\"control.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Control Panel</a><br/>\n";
}
if($p_arr['40']==1){
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaj Paneli</a><br/>\n";
}

if($p_arr['41']==1 and ($p_arr['150']!=0 or $p_arr['151']!=0))
{
if($p_arr['151']==1)
echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesajlar&#305; Oxu</a><br/>\n";
}
if($p_arr['42']==1){
echo "<a href=\"view_s.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MMS Mektublar&#305; Oxu</a><br/>\n";
}
if($p_arr['43']==1){
echo "<a href=\"admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Otaqlar&#305; Oxu</a><br/>\n";
}



break;

case 'audio':
if($id != 1){
echo "Bura daxil olma&#287;a icaz&#601;niz yoxdur!<br/>\n";
break;
}

$act = strip_tags($_GET['act']);
switch($act){
case '1':
$query = mysql_query("SELECT * FROM `mesaj` WHERE `readd`='1' AND `type`='1' AND `photo`!='NULL';");
if(mysql_affected_rows() > 0){
while($object = mysql_fetch_object($query)){
$file = "audio/{$object->idwho}/{$object->photo}";
if(file_exists($file)){
$unlink = unlink($file);
}
$delete = mysql_query("DELETE FROM `mesaj` WHERE `klu4`='{$object->klu4}'");
}
echo "Oxunmu&#351; s&#601;sli mesajlar silindi<br/>\n";	
}else{
echo "Oxunmu&#351; s&#601;sli mesaj yoxdur!<br/>\n";
}
break;

case '2':
$query = mysql_query("SELECT * FROM `mesaj` WHERE `type`='1' AND `photo`!='NULL';");
if(mysql_affected_rows() > 0){
while($object = mysql_fetch_object($query)){
$file = "audio/{$object->idwho}/{$object->photo}";
if(file_exists($file)){
$unlink = unlink($file);
}
$delete = mysql_query("DELETE FROM `mesaj` WHERE `klu4`='{$object->klu4}'");
}
echo "&#220;mumi s&#601;sli mesajlar silindi<br/>\n";	
}else{
echo "&#220;mumi s&#601;sli mesaj yoxdur!<br/>\n";
}
break;
	
default:
$file = DOCUMENT_ROOT."file/dat_folder/audio.inc";
require($file);

echo "Oxunmu&#351; s&#601;sli mesajlar - <a href='admin.php?go=$go&amp;act=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref'>(x)</a><br/>\n";
echo "&#220;mumi s&#601;sli mesajlar - <a href='admin.php?go=$go&amp;act=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref'>(x)</a><br/>\n";

echo $divide;

if(isset($_POST['action'])){
	$number_1 = intval($_POST['number_1']);
	$number_2 = intval($_POST['number_2']);
	$number_3 = intval($_POST['number_3']);
	$number_4 = intval($_POST['number_4']);
	
	$error = array();
	
	if(!in_array($number_2, array(3600,86400)) || !in_array($number_4, array(3600,86400))){
	$error[] = "D&#252;zg&#252;n se&#231;im edin!";
	}
	
	if(count($error) > 0){
	foreach($error as $list){
	echo "<u style='color: red;'>$list</u><br/>\n";
	}
	}else{
	$data .= '<?php'."\n";
	$data .= '$audio = array('."\n";
	$data .= '    "number_1" => "'.$number_1.'",'."\n";
	$data .= '    "number_2" => "'.$number_2.'",'."\n";
	$data .= '    "number_3" => "'.$number_3.'",'."\n";
	$data .= '    "number_4" => "'.$number_4.'",'."\n";
	$data .= ');'."\n";
	$data .= '?>';	
	file_put_contents($file, $data);
	echo "<u style='color: green;'>M&#601;lumat yenil&#601;ndi</u><br/>\n";
	}
	
	echo $divide;
}

$_v->action("admin.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Oxunmu&#351; s&#601;sli mesajlar:<br/>\n";
print $_v->input( "<input size=\"3\" name=\"number_1\" maxlength=\"3\" format=\"*N\" value=\"{$audio['number_1']}\" emptyok=\"false\"/>" )."\n";
$option = "<select name=\"number_2\">|";
$option .= "<option value=\"3600\">saat</option>|";
$option .= "<option value=\"86400\">g&#252;n</option>|";
$option .= "</select>";
print $_v->select($option,$audio['number_2'])."<br/>";

echo "&#220;mumi s&#601;sli mesajlar:<br/>\n";
print $_v->input( "<input size=\"3\" name=\"number_3\" maxlength=\"3\" format=\"*N\" value=\"{$audio['number_3']}\" emptyok=\"false\"/>" )."\n";
$option = "<select name=\"number_4\">|";
$option .= "<option value=\"3600\">saat</option>|";
$option .= "<option value=\"86400\">g&#252;n</option>|";
$option .= "</select>";
print $_v->select($option,$audio['number_4'])."<br/>";

$_v->divide();

print $_v->submit('Yenile','action=save');
}

break;


case 'online':
if($p_arr['36']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$oglan=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='0'"));
$qiz=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='1'"));
$cemi=$oglan[0]+$qiz[0];

echo "Bazada <b>$cemi</b>, aktiv istifadeci var...<br/><br/>";
echo "Oglanlar <b>$oglan[0]</b>.<br/>Qizlar: <b>$qiz[0]</b>.<br/>";
if(!isset($x))$x = 5;
$on_time = 60*$x;
$on_time = $SERVER_TIME-$on_time;

$query=mysql_query("select `id`,`user_ip`,`sex` from `users` where `ontime` >".$on_time.";");
$i=0;
$model = array();
while($info=mysql_fetch_array($query)){
$A_OPERA = OPERATOR($info['user_ip']);
$OPERATOR = trim($A_OPERA['0']);
$model[$OPERATOR]++;
if($info['sex']=='0')
$model['oglan']++;
else
$model['qiz']++;
$model['cemi']++;
}

echo "<br/>Online: (<u>$x</u>) deq <br/> Cemi: <b>".(int)$model['cemi']."</b><br/>";
echo "Oglanlar <b>".(int)$model['oglan']."</b><br/>Qizlar: <b>".(int)$model['qiz']."</b><br/><br/>";
echo "Azercell: <b>".(int)$model['azercell']."</b><br/>";
echo "Bakcell: <b>".(int)$model['bakcell']."</b><br/>";
echo "Narmobile: <b>".(int)$model['azerfon']."</b><br/>";
echo "Diger <b>".(int)$model['NULL']."</b><br/>";

break;




case 'arek':

if($p_arr['105']!=1)
{
echo "Giris icazeniz yoxdur.<br/>\n";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->end('1',$link);
ob_end_flush();
exit;
}
$v2 = mysql_escape_string($_GET['v2']);
switch ($v2) {

case 'add':
if($_POST['up_0']=="" or $_POST['up_1']=="" or $_POST['up_2']=="" or $_POST['up_3']=="" or $_POST['up_4']==""){
$filed0=$filed1=$filed2=$filed3=$filed4=false;
if($edit!=""){
$file_db=file("file/dat_folder/black.dat");	
for ($i=0;$i< sizeof($file_db);$i++) { if ($i==$edit) {$edition = $file_db[$i];} }
if(strlen($edition)>=11){

$exp_db=explode("|", $edition);
$filed0 = trim($exp_db[0]);
$filed1 = trim($exp_db[1]);
$filed2 = trim($exp_db[2]);
$filed3 = trim($exp_db[3]);
$filed4 = trim($exp_db[4]);
$reflesh = "&amp;edit=$edit";
}
}

echo "Qadaqan edilmi&#351; s&#246;zlerin elave edilmesi.<br/>\n";
$_v->divide();
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add".$reflesh."&amp;ref=$ref");

echo "S&#246;z:<br/>\n";
print $_v->input("<input name=\"up_0$ref\" value=\"$filed0\" title=\"S&#246;z\"/>").'<br/>';//min 3 simvol


echo "Simvol:<br/>\n";
$option =  "<select name=\"up_1$ref\">|";
if($filed1 == '0'){
$option .= "<option value=\"0\">Standart</option>|";
$option .= "<option value=\"1\">Herfler</option>|";
$option .= "<option value=\"2\">Reqemler</option>|";
}else if($filed1 == '1'){
$option .= "<option value=\"1\">Herfler</option>|";
$option .= "<option value=\"0\">Standart</option>|";
$option .= "<option value=\"2\">Reqemler</option>|";
}else{
$option .= "<option value=\"2\">Reqemler</option>|";
$option .= "<option value=\"1\">Herfler</option>|";
$option .= "<option value=\"0\">Standart</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
echo "Ceza n&#246;v&#252;:<br/>\n";
$option =  "<select name=\"up_2$ref\">|";
if($filed2 == '0'){ 
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
} elseif($filed2 == '1'){
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
} elseif($filed2 == '2'){
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
} elseif($filed2 == '3'){
$option .= "<option value=\"3\">Tam iqnor</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
} elseif($filed2 == '4'){
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
} elseif($filed2 == '5'){
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
} elseif($filed2 == '6'){
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
} elseif($filed2 == '7'){
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"8\">1 Ay xaric</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
} elseif($filed2 == '8'){
$option .= "<option value=\"8\">1 Ay xaric</option>|";
$option .= "<option value=\"4\">15 deq xaric</option>|";
$option .= "<option value=\"5\">1 Saat xaric</option>|";
$option .= "<option value=\"6\">6 Saat xaric</option>|";
$option .= "<option value=\"7\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
} else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Ban olsun</option>|";
$option .= "<option value=\"2\">Silinsin</option>|";
$option .= "<option value=\"3\">Tam iqnor</option>|";
$option .= "<option value=\"900\">15 deq xaric</option>|";
$option .= "<option value=\"3600\">1 Saat xaric</option>|";
$option .= "<option value=\"21600\">6 Saat xaric</option>|";
$option .= "<option value=\"172800\">2 G&#252;n xaric</option>|";
$option .= "<option value=\"2592000\">1 Ay xaric</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';


echo "Sebeb:<br/>\n";
print $_v->input("<input name=\"up_3$ref\" value=\"$filed3\" title=\"S&#246;z\"/>").'<br/>';//min 3 simvol


echo "Panele d&#252;&#351;s&#252;n?:<br/>\n";
$option =  "<select name=\"up_4$ref\">|";
if($filed4 == 1){
$option .= "<option value=\"1\">Beli</option>|";
$option .= "<option value=\"0\">Xeyir</option>|";
}else{
$option .= "<option value=\"0\">Xeyir</option>|";
$option .= "<option value=\"1\">Beli</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
print $_v->submit('Elave et','action=save');
}else{
$up_1 = intval($up_1);
$up_2 = intval($up_2);
$up_4 = intval($up_4);
$error_up=false;

if($up_1!='0' and $up_1!='1' and $up_1!='2'){
$error_up='Melumat d&#252;zg&#252;n deyil<br/>';
}elseif($up_4!='0' and $up_4!='1'){
$error_up='Melumat d&#252;zg&#252;n deyil<br/>';
}elseif(strlen($up_0)<3){
$error_up='Minumum 3 simvoldan ibaret s&#246;zu qada&#287;an etmek olar.<br/>';
}
$up_0 = str_replace("|", "", $up_0);
$up_3 = str_replace("|", "", $up_3);

if($error_up){
echo $error_up;
break;
}
if($edit!=""){
$file_db=file("file/dat_folder/black.dat");	
for ($i=0;$i< sizeof($file_db);$i++) { if ($i==$edit) {$edition = $file_db[$i];} }

if(strlen($edition)>=11){
$nn1 = $nn2 = $save_filed ="";
for ($i=0;$i< sizeof($file_db);$i++) {
if ($i==$edit) {
if(strlen($file_db[($i+1)])>=6)
$nn2 = "\n";
elseif(strlen($file_db[($i-1)])>=6)
$nn1 = "";
$save_filed .= $nn1.$up_0."|".$up_1."|".$up_2."|".$up_3."|".$up_4.$nn2;
}else{
$save_filed .= "".$file_db[$i];
}
}
echo "Redakta olundu<br/>\n";
$saved= @fopen("file/dat_folder/black.dat", "w"); 
@fwrite($saved, $save_filed);
@fflush($saved);
@fclose($saved);
}
}
else
{
echo "Elave olundu<br/>\n";
$file_db=file("file/dat_folder/black.dat");	
if(strlen($file_db[0].$file_db[1].$file_db[2])>=8)
$nn1 = "\n";

$save_filed = $nn1.$up_0."|".$up_1."|".$up_2."|".$up_3."|".$up_4;
$saved= @fopen("file/dat_folder/black.dat", "a"); 
@fwrite($saved, $save_filed);
@fflush($saved);
@fclose($saved);
}
}
break;

default:
if($del!=""){
if($p_arr['106']==1){
$file=file("file/dat_folder/black.dat");	
$fp=fopen("file/dat_folder/black.dat","w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$del) { unset($file[$i]);}}
if($i==(sizeof($file)+1))
$file[(sizeof($file)-1)] = str_replace("\n", "", $file[(sizeof($file)-1)]);
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);
}
}

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add&amp;ref=$ref\">Elave et</a><br/>\n";
echo $divide;

$file = file("file/dat_folder/black.dat");
$total = count($file);  

$m = (int)$_GET['m'];
if($m < 0 || $m > $total){$m = 0;}
if ($total < $m + 20){ $end = $total; }
else {$end = $m + 20; }
for ($i = $m; $i < $end; $i++){
$file = file("file/dat_folder/black.dat");
$file = array_reverse($file);
$i2=round($i+1);
$num=$total-$i-1;

$exp=explode("|", $file[$i]);

echo $i2.") <a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;v2=add&amp;edit=$num&amp;ref=$ref\">".$exp[0]."</a>";
if($p_arr['106']==1)
echo " - [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;del=$num&amp;ref=$ref\">x</a>]";

echo "<br/>";
}
if($total<1){echo "<u>Siz hecbir s&#246;z&#252; qada&#287;an etmemisiz.</u><br/>";}
if ($m != 0) {echo "<a href=\"admin.php?m=".($m - 20)."&amp;go=arek&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&lt;&lt;&lt;- </a> ";}
if (($total > $m + 20)&&($m != 0))echo'|'; 
if ($total > $m + 20) {echo " <a href=\"admin.php?m=".($m + 20)."&amp;go=arek&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"> -&gt;&gt;&gt;</a>";}
if (($total > $m + 20)or($m != 0))echo "<br/>\n";
break;

}
//echo "<br/>";
echo $divide;
if($v2)
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=arek&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
else
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-Reklam</a><br/>\n";




break;



case 'adel':
if($p_arr['17']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
if(!isset($_POST['action']))
{

echo "Avtomatik temizleme rejimi.<br/>";
echo $divide;


$file = file("file/dat_folder/delete.dat");
$del_1 = trim($file[1]);
$del_2 = trim($file[2]);
$del_3 = trim($file[3]);
$del_4 = trim($file[4]);
$del_5 = trim($file[5]);
$del_6 = trim($file[6]);


echo "Oxunmu&#351; mesajlar:<br/>\n";

$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=adel&amp;ref=$ref");
$option =  "<select name=\"del_1_up$ref\">|";
if($del_1 == 1){
$option .= "<option value=\"1\">1 g&#252;n </option>|";
$option .= "<option value=\"2\">2 g&#252;n </option>|";
$option .= "<option value=\"4\">4 g&#252;n </option>|";
$option .= "<option value=\"6\">6 g&#252;n </option>|";
$option .= "<option value=\"8\">8 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
} elseif($del_1 == 2){
$option .= "<option value=\"2\">2 g&#252;n </option>|";
$option .= "<option value=\"4\">4 g&#252;n </option>|";
$option .= "<option value=\"6\">6 g&#252;n </option>|";
$option .= "<option value=\"8\">8 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">1 g&#252;n </option>|";
} elseif($del_1 == 4){
$option .= "<option value=\"4\">4 g&#252;n </option>|";
$option .= "<option value=\"6\">6 g&#252;n </option>|";
$option .= "<option value=\"8\">8 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">1 g&#252;n </option>|";
$option .= "<option value=\"2\">2 g&#252;n </option>|";
} elseif($del_1 == 6){
$option .= "<option value=\"6\">6 g&#252;n </option>|";
$option .= "<option value=\"8\">8 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">1 g&#252;n </option>|";
$option .= "<option value=\"2\">2 g&#252;n </option>|";
$option .= "<option value=\"4\">4 g&#252;n </option>|";
} elseif($del_1 == 8){
$option .= "<option value=\"8\">8 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">1 g&#252;n </option>|";
$option .= "<option value=\"2\">2 g&#252;n </option>|";
$option .= "<option value=\"4\">4 g&#252;n </option>|";
$option .= "<option value=\"6\">6 g&#252;n </option>|";
} else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">1 g&#252;n </option>|";
$option .= "<option value=\"2\">2 g&#252;n </option>|";
$option .= "<option value=\"4\">4 g&#252;n </option>|";
$option .= "<option value=\"6\">6 g&#252;n </option>|";
$option .= "<option value=\"8\">8 g&#252;n </option>|";
}           
$option .= "</select>";
print $_v->select($option).'<br/>';





echo "&#220;mumi mesajlar:<br/>\n";

$option =  "<select name=\"del_2_up$ref\">|";
if($del_2 == 01){
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
} elseif($del_2 == 02){
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
} elseif($del_2 == 04){
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
} elseif($del_2 == 06){
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
} elseif($del_2 == 08){
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
} elseif($del_2 == 10){
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
} elseif($del_2 == 12){
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
} elseif($del_2 == 15){
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
}else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';





echo "Oxunmu&#351; Bildirisler:<br/>\n";

$option =  "<select name=\"del_3_up$ref\">|";
if($del_3 == 01){
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
} elseif($del_3 == 02){
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
} elseif($del_3 == 04){
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
} elseif($del_3 == 06){
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
} elseif($del_3 == 08){
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
} elseif($del_3 == 10){
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
} elseif($del_3 == 12){
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
} elseif($del_3 == 15){
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
}else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"01\">1 g&#252;n </option>|";
$option .= "<option value=\"02\">2 g&#252;n </option>|";
$option .= "<option value=\"04\">4 g&#252;n </option>|";
$option .= "<option value=\"06\">6 g&#252;n </option>|";
$option .= "<option value=\"08\">8 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"12\">12 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';






echo "&#220;mumi Bildirisler:<br/>\n";

$option =  "<select name=\"del_4_up$ref\">|";
if($del_4 == 5){
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
}elseif($del_4 == 10){
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
}elseif($del_4 == 15){
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
}elseif($del_4 == 20){
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
}elseif($del_4 == 30){
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
}elseif($del_4 == 45){
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
}elseif($del_4 == 60){
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
}elseif($del_4 == 90){
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
}else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"5\">5 g&#252;n </option>|";
$option .= "<option value=\"10\">10 g&#252;n </option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"20\">20 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';





echo "Passiv istifade&#231;ilerin silinmesi:<br/>\n";

$option =  "<select name=\"del_5_up$ref\">|";
if($del_5 == 15){
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
}elseif($del_5 == 30){
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
}elseif($del_5 == 45){
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
}elseif($del_5 == 60){
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
}elseif($del_5 == 90){
$option .= "<option value=\"90\">90 g&#252;n </option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
}else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"15\">15 g&#252;n </option>|";
$option .= "<option value=\"30\">30 g&#252;n </option>|";
$option .= "<option value=\"45\">45 g&#252;n </option>|";
$option .= "<option value=\"60\">60 g&#252;n </option>|";
$option .= "<option value=\"90\">90 g&#252;n </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';





echo "MySql bazanin temiri:<br/>\n";

$option =  "<select name=\"del_6_up$ref\">|";
if($del_6 == 1){
$option .= "<option value=\"1\">Aktiv</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
}else{
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Aktiv</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';



echo $divide;
print $_v->submit('Elave et','action=save');

}
else
{
$error = 0;

if(!preg_match("!^[0-9]+$!i",$del_1_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_2_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_3_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_4_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_5_up)){$error = 1;}
elseif(!preg_match("!^[0-9]+$!i",$del_6_up)){$error = 1;}


if($error==0){
$file = fopen("file/dat_folder/delete.dat", "w");
$data .= "0\n";
$data .= "$del_1_up\n";
$data .= "$del_2_up\n";
$data .= "$del_3_up\n";
$data .= "$del_4_up\n";
$data .= "$del_5_up\n";
$data .= "$del_6_up";
fwrite($file, $data);
fclose($file);
$msg = "Melumatlar yenilendi!<br/>Te&#351;ekk&#252;rler...<br/>";
}
else
$msg = "Xeta ba&#351; verdi yeniden yoxlay&#305;n<br/>";


echo $msg;

}
break;


case 'r_p':
if($p_arr['38']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

$fp=file("file/dat_folder/reytinq.dat");
$reytinq = trim($fp[0]);
$test1 = trim($fp[1]);
$datgun = trim($fp[2]);


echo "<b>Reytinq Panel</b><br/>\n";
echo $divide;

if(!isset($_POST['r_p']))
{
echo "Avtomatik Yenilensin (G&#252;n):<br/>\n";
$_v->action("admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

print $_v->input("<input size=\"2\" name=\"gun$ref\" value=\"$datgun\" title=\"Yenilenme m&#252;ddeti\"/>").'<br/>';




echo "Reytinqin Veziyyeti:<br/>\n";

$option = "<select name=\"r_p$ref\">|";
if ($reytinq==0){
$option .= "<option value=\"0\">Aktiv A&#231;q </option>|";
$option .= "<option value=\"1\">Sesverme STOP</option>|";
$option .= "<option value=\"2\">Reytinq STOP </option>|";
}elseif ($reytinq==1){ 
$option .= "<option value=\"1\">Sesverme STOP</option>|";
$option .= "<option value=\"0\">Aktiv A&#231;q </option>|";
$option .= "<option value=\"2\">Reytinq STOP </option>|";
}else {
$option .= "<option value=\"2\">Reytinq STOP </option>|";
$option .= "<option value=\"1\">Sesverme STOP</option>|";
$option .= "<option value=\"0\">Aktiv A&#231;q </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

	print $_v->submit('Deyi&#351;dir','action=save');
	echo $divide;
	print $_v->submit('Reytinqi Temizle','r_p=del',"admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref");


}
elseif($_POST['r_p']=="del"){

$dat = file("file/dat_folder/enter.dat");
$test1= trim($dat[0]);
$test2= trim($dat[1]);
$test3= trim($dat[2]);
$test7= trim($dat[6]);
$test8= trim($dat[7]);
$test9= trim($dat[8]);
$test10= trim($dat[9]);
$test11= trim($dat[10]);
$test12= trim($dat[11]);

$file = fopen("file/dat_folder/enter.dat", "w");
$data = "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "\n";
$data .= "\n";
$data .= "\n";
$data .= "$test7\n";
$data .= "$test8\n";
$data .= "$test9\n";
$data .= "$test10\n";
$data .= "$test11\n";
$data .= "$test12";
fwrite($file, $data);
fclose($file);

$reytime = 86400 * $datgun + $SERVER_TIME;
$file = fopen("file/dat_folder/reytinq.dat", "w");
$data = "$reytinq\n";
$data .= "$reytime\n";
$data .= "$datgun";
fwrite($file, $data);
fclose($file);

mysql_query ("delete from reytinq");
mysql_query ("Update users set ses='0' where ses!='0'");
@file_put_contents($PUBLICHTML_URL.'file/dat_folder/top_reytinq_users.php','');

echo "<u>Reytinq Temizlendi</u><br/>\n";
echo $divide;

echo "<a href=\"admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";



}
else
{
$newregtime = 86400 * $gun + $SERVER_TIME;
if($newregtime<$test1) {$test1=$newregtime;}

$file = fopen("file/dat_folder/reytinq.dat", "w");
$data = "$r_p\n";
$data .= "$test1\n";
$data .= "$gun";
fwrite($file, $data);
fclose($file);


echo "<u>Reytinq Yenilendi</u><br/>\n";
echo $divide;

echo "<a href=\"admin.php?go=r_p&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

}
break;

case 'o':
if($p_arr['43']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
//
$smset = $row["smiles"]; 
$max = $row["max"];
$level = $row["level"];


$rm=htmlspecialchars($rm);
if ($rm<0||$rm>10||!isset($rm)) exit;
$room="room".$rm;

if (!isset($leqeb) and !isset($nk))
{
echo "Leqeb<br/>\n";
$_v->action("admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"leqeb$ref\" title=\"Leqeb\" emptyok=\"true\"/>").'<br/>';


echo "Otaq:\n";
$option = "<select name=\"rm$ref\">|";
for($i = 0; $i <= 10; $i++) {
$levelselect = @mysql_query ("Select name from rooms where rm='".$i."'");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];;
$option .= "<option value=\"".$i."\">".$i."-".$levelname."</option>|";

//echo "<option value=\"".$i."\">".$i."-".$levelname."</option>\n";
}
$option .= "</select>";
print $_v->select($option).'<br/>';


echo "Rejim:\n";
$option = "<select name=\"p$ref\">|";

$option .= "<option value=\"0\">Ham&#305;s&#305; </option>|";
$option .= "<option value=\"1\">&#220;mumi </option>|";
$option .= "<option value=\"2\">&#350;exsi </option>|";

$option .= "</select>";
print $_v->select($option).'<br/>';
print $_v->submit('Yoxla','action=go');
echo "<br/>";

echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

 
if (!isset($n)||$n<0) $n=0;
$seh=$n/10; 


if($leqeb!=""){
if (!ctype_digit($leqeb)) {
$latuser=strtolower($leqeb);
$r = mysql_query ("select id,user from users where latuser = '".$latuser."'");
}else{
$r = mysql_query ("select id,user from users where id = '".$leqeb."'");
}
}else{
$r = mysql_query ("select id,user from users where id = '".$nk."'");
}

$arr = mysql_fetch_array($r);
$leqeb=$arr['user'];
$nk=$arr['id'];

$roomselect = @mysql_query ("Select name from rooms where rm='".$rm."' ;");
$rooms = @mysql_fetch_array($roomselect);
$roomname=$rooms["name"];



$bmax = $max*2;
if($p=="0"){
$res = @mysql_query ("Select klu4,time,who,message,id,towhom,usid from $room where usid='".$nk."' or towhom='".$nk."' order by id desc LIMIT $n,$bmax;");
$mss = "***";
}elseif($p=="1"){
$res = @mysql_query ("Select klu4,time,who,message,id,towhom,usid from $room where usid='".$nk."' and (towhom='') order by id desc LIMIT $n,$bmax;");
$mss = "&#220;mumi";
}elseif($p=="2"){
$res = @mysql_query ("Select klu4,time,who,message,id,towhom,usid from $room where usid='".$nk."' and (towhom!='') order by id desc LIMIT $n,$bmax;");
$mss = "&#350;exsi";
}

$kol = mysql_affected_rows();   
@$total=$kol -1;


 
echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">$leqeb</a> - [$roomname] - $mss\n";
echo "<br/>---";

$mread =0; 
while ($mread < $max){ 
$data = mysql_fetch_array ($res);
if($data===false)break;
$klu4 = $data['klu4'];
$date = $data["time"];
$msg = $data["message"];

if ($smset==0)$msg = preg_replace("|<img[^>]+>|isU", "|smaylik|", $msg); 

$time = $data["id"];
$th = $data["towhom"];

if ($th == ""){

echo "<br/><a href=\"del.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rm=$rm&amp;time=$date&amp;klu4=$klu4\">x</a>";

echo "$date&gt;$msg"; $mread++;
}


else if ($th != ""){
echo "<br/><a href=\"del.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rm=$rm&amp;time=$date&amp;klu4=$klu4\">x</a>";

echo "<b>$date&gt;</b>$msg"; $mread++;
}
}    


$page_next = $n + $max;
$page_prev = $n - $max;
if($n==0)$total+1;

if ($n >= $max) {
echo "<br/><a href=\"admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;n=$page_prev&amp;nk=$nk&amp;ref=$ref&amp;p=$p\">&lt;&lt;&lt;</a>. -- \n";
}else {echo "<br/>\n";}
if ($n < $total) {
echo "<a href=\"admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;n=$page_next&amp;nk=$nk&amp;ref=$ref&amp;p=$p\">&gt;&gt;&gt;</a>. ";
}

echo "<br/>---<br/><a href=\"admin.php?go=o&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nick</a>\n";
echo " : <a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
 
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
//
break;


case 'clear_us':
if($p_arr['22']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
mysql_query ("delete from `users` where `posts`<='5' and `id`>12;");
echo '0 postu olan user-ler silindi!<br/>';
break;


case 'old_users';
if($p_arr['23']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$del_time = $SERVER_TIME-2592000;

$query=mysql_query("select `id`,`time` from `users` where `id`>'12' and `time` <".$del_time.";");
$i=0;
while($info=mysql_fetch_array($query))
{
mysql_query("delete from `users` where `id`='".$info['id']."'");
mysql_query("delete from `friends` where `id`='".$info['id']."' or `usid`='".$info['id']."'");
mysql_query("delete from `ignor` where `id`='".$info['id']."' or `usid`='".$info['id']."'");
mysql_query("delete from `hesab` where `usid`='".$info['id']."'");
mysql_query ("delete from `albom` where `idfoto`='".$info['id']."'");
mysql_query ("delete from `zapiski` where `idtowhom`='".$info['id']."' or `idwho`='".$info['id']."'");
mysql_query ("delete from `c_nick` where `to`='".$info['id']."'");
mysql_query ("delete from `mms` where `to`='".$info['id']."' or `from`='".$info['id']."'");
$i++;
}
echo " <b>30</b> G&#252;n erzinde aktiv olmayan <b>".$i."</b> istifade&#231;i Bazadan silindi!<br/>";
break;



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

case 'iqnore':
if($p_arr['92']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
if(empty($act)) {
$query = mysql_query("select COUNT(`id`) from `users` where `inv`='2';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `id`,`user`,`whokik`,`whykik` from `users` where `inv`='2' order by `ontime` desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Tam &#304;qnor</b>,  edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Tam Iqnor Edilib</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$sebeb = $arr['whykik'];
$moder = $arr['whokik'];
$act = $arr['id'];
if($sebeb!="")$sebeb = "Sebeb: (<i>$sebeb</i>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$act&amp;ref=$ref\">$buser</a> - $sebeb <b>$moder</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=iqnore&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/10;
$test = round($tes,2);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=iqnore&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=iqnore&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Azad Et</a><br/>";
}
}

} elseif($act=="del"){

echo "<b>Tam &#304;qnor</b> - <u>Edilenler Azad Edildi!</u><br/>\n";

@$fi = fopen("file/control/4.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("<b>$user - \"Tam &#304;qnor\" Edilenleri Azad Etdi</b>. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query("UPDATE `users` SET `inv` = '0' where `inv` = '2';");
} else {
mysql_query("UPDATE `users` SET `inv` = '0' where `id`='".$act."';");

echo "<u>$xuser</u>, Tam &#304;qnordan Azad Edildi...<br/>";
@$fi = fopen("file/control/4.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebini Tam &#304;qnordan Azad Etdi. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=iqnore&amp;ref=$ref\">Iqnor Edilenler</a><br/>";

}
break;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


case 'banip':
if($p_arr['231']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

if(empty($act)) {
$query = mysql_query("select COUNT(`klu4`) from `bannlist` where `soft`='IP-BAN';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `klu4`,`ip`,`soft`,`user`,`moder` from `bannlist` where `soft`='IP-BAN' order by `klu4` desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>IP-Adress</b>-i  ban edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<b>IP-den ban Edilib</b>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$usip = $arr['ip'];
$browser = $arr['soft'];
$moder = $arr['moder'];
$act = $arr['klu4'];

echo "<b>$i</b>. <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$buser&amp;ref=$ref\">$buser</a> - <b>$usip</b>... Ban Eden: <u>$moder</u> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=banip&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $all/10;
$test = round($tes,2);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=banip&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=banip&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Deaktivle&#351;dir</a><br/>";
}
}

} elseif($act=="del"){
mysql_query ("delete from `bannlist` where `soft`='IP-BAN';");

echo "<b>IP-Adressi</b> - <u>BAN Edilenler Deaktivle&#351;dirildi!</u><br/>\n";

@$fi = fopen("file/control/5.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = "".base64_encode("<b>$user B&#252;t&#252;n IP-Adreslere Edilen Banlar&#305; Deaktivle&#351;dirdi</b>! <u>$data</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
} else {
mysql_query ("delete from `bannlist` where `klu4` = '".$act."';");
echo "<u>$xuser</u>, IP-Adressindeki Ban Deaktivle&#351;dirildi...<br/>";
@$fi = fopen("file/control/5.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebinin IP-Adress Edilmi&#351; Ban&#305; Deaktivle&#351;dirdi. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=banip&amp;ref=$ref\">IP Ban Edilenler</a><br/>";

}
break;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


case 'bantel':
if($p_arr['231']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

if(empty($act)) {
$query = mysql_query("select COUNT(`klu4`) from `bannlist` where `soft`!='IP-BAN';");
$all = @mysql_result($query, 0);
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$q = mysql_query("select `klu4`,`ip`,`soft`,`user`,`moder` from `bannlist` where `soft`!='IP-BAN' order by `klu4` desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Telefon Model</b>-i  ban edilen istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<b>BAN Telefon</b>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$buser = $arr['user'];
$usip = $arr['ip'];
$browser = $arr['soft'];
$moder = $arr['moder'];
$act = $arr['klu4'];

echo "<b>$i</b>. <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$buser&amp;ref=$ref\">$buser</a> - $browser. <b>$moder</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;xuser=$buser&amp;act=$act&amp;s=$s&amp;ref=$ref\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=bantel&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=bantel&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($all>10)echo "<br/>";
if($s<"2"){
echo "----<br/>";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=bantel&amp;act=del&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Deaktivle&#351;dir</a><br/>";
}
}

} elseif($act=="del"){
mysql_query ("delete from `bannlist` where `soft`!='IP-BAN';");

echo "<b>Telefon Modeli</b> - <u>BAN Edilenler Deaktivle&#351;dirildi!</u><br/>\n";

@$fi = fopen("file/control/4.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("<b>$user B&#252;t&#252;n Telefonlara Edilen Banlar&#305; Deaktivle&#351;dirdi</b>! <u>$data</u>")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
} else {
mysql_query ("delete from `bannlist` where `klu4` = '".$act."';");

echo "<u>$xuser</u>, Telefonundak&#305; Ban Deaktivle&#351;dirildi...<br/>";
@$fi = fopen("file/control/4.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("$user - \"<b>$xuser</b>\" leqebinin Telefonuna Edilmi&#351; Ban&#305; Deaktivle&#351;dirdi.  [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;s=$s&amp;go=bantel&amp;ref=$ref\">IP Ban Edilenler</a><br/>";

}
break;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'deluser':
if($p_arr['235']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$query = mysql_query("select COUNT(`id`) from `users` where `banned`='2';");
$all = @mysql_result($query, 0);
if(empty($act)) {
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$query = @mysql_query("SELECT `id`,`user`,`whokik`,`whykik` FROM `users` WHERE `banned`='2' order by `ontime` desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Leqebi</b>, Bazadan Silinen olmay&#305;b...</i><br/>\n";

break;
} else {
echo "<b>Leqebi Bazadan Silinib</b> ($all)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($query);
$ban_id = $arr['id'];
$buser = $arr['user'];
$muellif = $arr['whokik'];
$sebeb = $arr['whykik'];
if($sebeb!="")$sebeb = "Sebeb: (<u>".$sebeb."</u>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$ban_id&amp;ref=$ref\">$buser</a> - $sebeb <b>$muellif</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;s=$s&amp;act=$ban_id\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$tes = $all/10;
$test = round($tes);

if (($all>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($all>10))echo "<br/>";
if($s==1){
echo "----<br/><a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=dall&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Sil</a><br/>\n";
echo "<a href=\"admin.php?go=deluser&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=unpid&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Aktiv Et</a><br/>\n";
}

}elseif($act=="dall"){

echo "<b>Ban Edilmi&#351; &#304;stifade&#231;iler</b> - <u>Bazadan Silindi!</u><br/>\n";

@$fi = fopen("file/control/8/9".$ref.".dat", "a+"); 
$data = date("d.m.Y [H:i]",$SERVER_TIME); 
$qeyd .= "".base64_encode("<b>================</b>.")."\n";
$query = @mysql_query("SELECT `user`,`id` FROM `users` WHERE `banned`='2';");
for ($i=1;$i<=$all;$i++){
$arr = mysql_fetch_array($query);
$buser = $arr['user'];
$u_id = $arr['id'];
$qeyd .= "".base64_encode(":".$buser.":")."\n";
mysql_query ("delete from `albom` where `idfoto`='".$u_id."'");
mysql_query ("delete from `ignor` where `id`='".$u_id."' or `usid`='".$u_id."'");
mysql_query ("delete from `friends` where `id`='".$u_id."' or `usid`='".$u_id."'");
mysql_query ("delete from `zapiski` where `idtowhom`='".$u_id."' or `idwho`='".$u_id."'");
mysql_query ("delete from `c_nick` where `to`='".$u_id."'");
mysql_query ("delete from `mms` where `to`='".$u_id."' or `from`='".$u_id."'");
}
$qeyd .= base64_encode("<b>Bazadan Tam Silinenlerin siyah&#305;s&#305;</b>: <br/><u>Tarix</u>: $data")."\n";
@fwrite($fi, "$qeyd");
@fflush($fi);
@fclose($fi);
@$fi = fopen("file/control/8.dat", "a+"); 
$lst .= base64_encode("<b>Bazadan Silindiler Tesdiqlendi!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query ("delete from `users` where `banned`='2' and `id`>'11'");
}elseif($act=="unpid"){

echo "Bazadan Silinen B&#252;t&#252;n istifade&#231;iler Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";

$data = date("d.m.Y [H:i]",$SERVER_TIME); 
@$fi = fopen("file/control/7.dat", "a+"); 
$lst .= base64_encode("<b>$user - Ban Edilenleri Qaytard&#305;!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
mysql_query("update `users` set `banned` = 0 where `banned`='2'");
}else{
settype($act, 'integer');
mysql_query("update `users` set `banned` = 0 where `id`='".$act."'");

echo "&#304;stifade&#231;i &#199;ata Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=deluser&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";

}
break;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


case 'leqebban':
if($p_arr['228']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$query = mysql_query("select COUNT(id) from users where `banned`='1';");
$all = @mysql_result($query, 0);
if(empty($act)) {
if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$query = @mysql_query("SELECT `id`,`user`,`whokik`,`whykik` FROM `users` WHERE `banned`='1' order by `ontime` desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Leqebi</b>, Ban Edilen istifade&#231;i olmay&#305;b...</i><br/>\n";

break;
} else {
echo "<b>Leqebi Ban Edilib</b> ($all)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($query);
$ban_id = $arr['id'];
$buser = $arr['user'];
$muellif = $arr['whokik'];
$sebeb = $arr['whykik'];
if($sebeb!="")$sebeb = "Sebeb: (<u>".$sebeb."</u>)";
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$ban_id&amp;ref=$ref\">$buser</a> - $sebeb <b>$muellif</b> [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;s=$s&amp;act=$ban_id\">x</a>]<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$tes = $all/10;
$test = round($tes);

if (($all>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($all>10))echo "<br/>";
if($s==1){
echo "----<br/><a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=dall&amp;ref=$ref\">Ban Edilenleri Sil</a><br/>\n";
echo "<a href=\"admin.php?go=leqebban&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;act=unpid&amp;ref=$ref\">Ban Edilenleri Aktiv Et</a><br/>\n";
}

}elseif($act=="dall"){


echo "<b>Ban Edilmi&#351; &#304;stifade&#231;iler</b> - <u>Bazadan Silindi!</u><br/>\n";

@$fi = fopen("file/control/7/9".$ref.".dat", "a+"); 
$data = date("d.m.Y [H:i]",$SERVER_TIME); 
$qeyd .= "".base64_encode("<b>================</b>.")."\n";
$query = @mysql_query("SELECT `user`,`id` FROM `users` WHERE `banned`='1';");
for ($i=1;$i<=$all;$i++){
$arr = mysql_fetch_array($query);
$buser = $arr['user'];
$u_id = $arr['id'];
$qeyd .= "".base64_encode(":".$buser.":")."\n";
mysql_query ("delete from `albom` where `idfoto`='".$u_id."';");
mysql_query ("delete from `ignor` where `id`='".$u_id."' or `usid`='".$u_id."';");
mysql_query ("delete from `friends` where `id`='".$u_id."' or `usid`='".$u_id."';");
mysql_query ("delete from `zapiski` where `idtowhom`='".$u_id."' or `idwho`='".$u_id."';");
mysql_query ("delete from `c_nick` where `to`='".$u_id."';");
mysql_query ("delete from `mms` where `to`='".$u_id."' or `from`='".$u_id."';");
}
$qeyd .= base64_encode("<b>Bazadan Tam Silinenlerin siyah&#305;s&#305;</b>: <br/><u>Tarix</u>: $data")."\n";
@fwrite($fi, "$qeyd");
@fflush($fi);
@fclose($fi);
@$fi = fopen("file/control/7.dat", "a+"); 
$lst .= base64_encode("<b>Ban Edilenler Bazadan Silindi!!!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

mysql_query ("delete from `users` where `banned`='1' and `id`>'11';");

}elseif($act=="unpid"){

echo "Ban Edilen B&#252;t&#252;n istifade&#231;iler Qaytar&#305;ld&#305;...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";

$data = date("d.m.Y [H:i]",$SERVER_TIME); 
@$fi = fopen("file/control/7.dat", "a+"); 
$lst .= base64_encode("<b>$user - Ban Edilenleri Qaytard&#305;!</b>: $data ID=<u>$ref</u>")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);
mysql_query("update `users` set `banned` = 0 where `banned`='1';");

}else{
settype($act, 'integer');
mysql_query("update `users` set `banned` = 0 where `id`='".$act."';");

echo "Leqeb bandan azad edildi...<br/>Te&#351;ekk&#252;rler<br/>*****<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=leqebban&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";

}
break;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





case 'mobi':
if($p_arr['27']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
$_v->fsize2($fsize2);
break;
}
if(empty($title)) $error=$error."<u>Ad yazilmayib!</u><br/>";
if(empty($content)) $error=$error."<u>Elan yazilmayib!</u><br/>";
if(empty($action)) {	
echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";

print $divide;
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=mobi");
echo "Adi:<br/>";
print $_v->input("<input name=\"title$ref\" title=\"title\" emptyok=\"true\"/>").'<br/>';
echo "Metn:<br/>";
print $_v->input("<input name=\"content$ref\" title=\"content\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Elave et','action=add');
print "<br/>";
}
 else
 { if(empty($error)) {
if($title!=$last_obiav['title']) {
$title = narmobila($title);
$content = narmobila($content);
if(mysql_query("insert into `obiav` values(0,'$user','$title','$content');")) {
echo "<b>Elan elave edildi!</b><br/>";
} else {
echo "<b>Sehv var!</b><br/>";
}
} else {
echo "<b>Bele elan m&#246;vcuddur!</b><br/>";
}
} else {
print $error;
}
}
break;

case 'dobi':
if($p_arr['28']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$q = mysql_query("select * from `obiav` order by `id` desc;");
if (mysql_affected_rows() == 0) {

echo "Elan yoxdur!!!<br/>\n";

} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {

print "<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=dobi&amp;mid=".$arr['id']."\">".$arr['title']."</a><br/>";

}
} else {
if(mysql_query("delete from `obiav` where `id`='$mid' limit 1;")){

echo "<b>Elan silindi!</b><br/>";
}
}
}
break;


case 'xelan_i':
if($p_arr['29']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

$q = mysql_query("select * from `elan` order by `saat` desc;");
if (mysql_affected_rows() == 0) {
print "Tebrik Mesaj&#305; Yoxdur...<br/>\n";
} else {
if(empty($action)) {
print "<b>Tebrik Mesajlar&#305;</b><br/>*****<br/>\n";

while($arr=mysql_fetch_array($q)) {
$saat = $arr['saat'];

$saat = $saat - $SERVER_TIME;
if($saat > 0){

if($saat < 60 && $saat > 0)
{
$vaxt = "saniyye\n";
}
elseif($saat < 3600 && $saat > 60)
{
$new = $saat;
$saat = $new/60;
$vaxt = "deqiqe\n";
}
elseif($saat < 86400 && $saat > 3600)
{
$new = $saat;
$saat = $new/3600;
$vaxt = "saat\n";
}
elseif($saat > 86400)
{
$new = $saat;
$saat = $new/86400;
$vaxt = "g&#252;n\n";
}
$saat = round($saat);
}
else
{
$saat ="Vaxt&#305; Bitib";
}

print "".$arr['title']." - \"<b>".$arr['content']." ($saat $vaxt)</b>\" [<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>";
}
echo "----<br/><a href=\"admin.php?action=all&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Sil</a><br/>";
} elseif($action=="all") {
if(mysql_query("delete from `elan` where `saat`<'".$SERVER_TIME."';")){
print "<u>Vaxt&#305; Bitmi&#351; B&#252;t&#252;n Tebrik Mesajlar&#305; Silindi!</u><br/>";
}
}else{
if(mysql_query("delete from `elan` where `id`='$mid' limit 1;")){
print "<b>Tebrik mesaj&#305; silindi!</b><br/>";
echo "----<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
}
}

break;





case 'toy':
if($p_arr['29']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

$q = mysql_query("select * from `elan` order by `saat` desc;");
if (mysql_affected_rows() == 0) {
print "Tebrik Mesaj&#305; Yoxdur...<br/>\n";
} else {
if(empty($action)) {
print "<b>Tebrik Mesajlar&#305;</b><br/>*****<br/>\n";

while($arr=mysql_fetch_array($q)) {
$saat = $arr['saat'];

$saat = $saat - $SERVER_TIME;
if($saat > 0){

if($saat < 60 && $saat > 0)
{
$vaxt = "saniyye\n";
}
elseif($saat < 3600 && $saat > 60)
{
$new = $saat;
$saat = $new/60;
$vaxt = "deqiqe\n";
}
elseif($saat < 86400 && $saat > 3600)
{
$new = $saat;
$saat = $new/3600;
$vaxt = "saat\n";
}
elseif($saat > 86400)
{
$new = $saat;
$saat = $new/86400;
$vaxt = "g&#252;n\n";
}
$saat = round($saat);
}
else
{
$saat ="Vaxt&#305; Bitib";
}

print "".$arr['title']." - \"<b>".$arr['content']." ($saat $vaxt)</b>\" [<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>";
}
echo "----<br/><a href=\"admin.php?action=all&amp;id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Ham&#305;s&#305;n&#305; Sil</a><br/>";
} elseif($action=="all") {
if(mysql_query("delete from `elan` where `saat`<'".$SERVER_TIME."';")){
print "<u>Vaxt&#305; Bitmi&#351; B&#252;t&#252;n Tebrik Mesajlar&#305; Silindi!</u><br/>";
}
}else{
if(mysql_query("delete from `elan` where `id`='$mid' limit 1;")){
print "<b>Tebrik mesaj&#305; silindi!</b><br/>";
echo "----<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xelan_i&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
}
}

break;

case 'extra':
if($p_arr['34']!=1 or ($p_arr['100']==0 and $p_arr['101']==0 and $p_arr['102']==0)){

echo "Burda hecne yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}

switch ($fun){
default:

echo "<b>Funksiyalar Paneli</b><br/>\n";
echo $divide;
echo "Leqeb / ID:<br/>\n";
$_v->action("admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

print $_v->input("<input name=\"nick\" title=\"nick\" emptyok=\"true\"/>").'<br/>';//min 3 simvol


echo "Modul: ";
$option =  "<select name=\"fun$ref\">|";
if($p_arr['100']==1){
$option .= "<option value=\"1\">Znak Ver</option>|";}
if($p_arr['101']==1){
$option .= "<option value=\"2\">ID d&#252;zelt</option>|";}
if($p_arr['102']==1){
$option .= "<option value=\"3\">R&#252;tbe ver</option>|";}
$option .= "</select>";
print $_v->select($option).'<br/>';

print $_v->submit('Davam et','action=save');
echo "<br/>";
break;

case '1':
if($p_arr['100']!=1){

echo "Icazeniz yoxdur!<br/>\n";

break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,level,inv,zn,zn_time from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,level,inv,zn,zn_time from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,level,inv,zn,zn_time from users where id = '".$nick."'");
}

if (mysql_affected_rows() <= 0){

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$nick = $inf["user"];
$level2=$inf["level"];
$zn=$inf["zn"];
if($level2 >= $row["level"]&&$id!=1&&$id!=0){

echo "Bax bu ujey olmaz:)<br/>\n";

break;
}

$ZN_ORDERS = ARRAY(
'3600' => '5', // 1 saat
'43200' => '15', // 12 saat
'86400' => '30', // 1 gun
'259200' => '50', // 3 gun
'604800' => '100', // 7 gun
'2592000' => '400'  // 30 gun
);
@DEFINE('LINK_PATH','');
@DEFINE('ZN_DIRECTORY', 'img/zn');
@DEFINE('PAGE_LIMIT',   10);
@DEFINE('PHP_SELF', BASENAME(__FILE__));

CLASS FUNCTIONS{
FUNCTION DTIME($NEW){
$DAY= @FLOOR($NEW / 86400);
$HOUR   = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
$MINUT  = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
$SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
$DAY= ($DAY!=0) ? $DAY." g&#252;n " : FALSE;
$HOUR   = ($HOUR!=0) ? $HOUR." saat " : FALSE;
$MINUT  = ($MINUT!=0) ? $MINUT." deq " : FALSE;
$SECOND = ($SECOND!=0) ? $SECOND." san" : FALSE;
RETURN $DAY.$HOUR.$MINUT.$SECOND;
}
FUNCTION PAGESTART($TOTAL,$MAX){
GLOBAL $HTTP_GET_VARS;
$VARS = $HTTP_GET_VARS['page'];
$PAGE = (!ISSET($VARS)) ? 0 : INTVAL($VARS);
$START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
IF(CEIL($TOTAL/$MAX) < $PAGE){
$START = 0;
}
RETURN ARRAY($PAGE,$START,$MAX);
}
FUNCTION PAGENAV($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
$_NEXTPAGE = "N&#246;vbeti";
$_PREVPAGE = "Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
$STRING_P = FALSE;
IF($ON_P==1){
$STRING_P = '<a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($TOTAL_P>10){
$MAX_P = ($TOTAL_P>3) ? 3 : $TOTAL_P;
FOR($START=1; $START<$MAX_P + 1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$MAX_P){
$STRING_P .= " ";
}
}
IF($TOTAL_P>3){
IF($ON_P>1 && $ON_P<$TOTAL_P){
$STRING_P .= ($ON_P>5) ? ' ... ' : ' ';
$MIN_P = ($ON_P>4) ? $ON_P : 5;
$MAX_P = ($ON_P<$TOTAL_P-4) ? $ON_P : ($TOTAL_P-4);
FOR($START=$MIN_P-1; $START<$MAX_P+2; $START++){
$STRING_P .= ($START == $ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$MAX_P+1){
$STRING_P .= ' ';
}
}
$STRING_P .= ($ON_P<$TOTAL_P-4) ? ' ... ' : ' ';
} ELSE {
$STRING_P .= ' ... ';
}
FOR($START=$TOTAL_P-2; $START<$TOTAL_P+1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]'  : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$TOTAL_P){
$STRING_P .= " ";
}
}
}
} ELSE {
FOR($START=1; $START<$TOTAL_P+1; $START++){
$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
IF($START<$TOTAL_P){
$STRING_P .= ' ';
}
}
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P."<br/>";
}
FUNCTION COUNT_IMG_FILES($DIRECTORY){
IF(@IS_DIR($DIRECTORY)){
$DIR_HANDLE = @OPENDIR($DIRECTORY);
}
IF(!$DIR_HANDLE){
RETURN FALSE;
}
$COUNT = 0;
WHILE($IMG = @READDIR($DIR_HANDLE)){
IF($IMG!="." AND $IMG!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($IMG))){
IF(!IS_DIR($DIRECTORY."/".$IMG)){
$COUNT++;
} ELSE {
$COUNT += FUNCTIONS::COUNT_IMG_FILES($DIRECTORY."/".$IMG);
}
}
}
@CLOSEDIR($DIR_HANDLE);
RETURN $COUNT;
}
FUNCTION GENERATOR_IMG($VALUE){
IF(!FILE_EXISTS(ZN_DIRECTORY.'/'.$VALUE.'.gif')){
RETURN $VALUE;
} ELSE {
RETURN FUNCTIONS::GENERATOR_IMG($VALUE+1);
}
}
}

$FN = NEW FUNCTIONS;
$zn_vaxt = $_POST['time'];
$znak = $_POST['znak'];
if($_POST["znak"]){
if($_POST["znak"]=="x"){
echo "\"<b>$nick</b>\" leqebli istifade&#231;iden znak le&#287;v edildi!<br/>";
mysql_query("UPDATE users SET zn = '',zn_time = '0' where id='".$usid."'");
}
else
{
$zn_time = $SERVER_TIME + $zn_vaxt;
echo "\"<b>$nick</b>\" leqebli istifade&#231;iye <u>".$FN->DTIME($zn_time - $SERVER_TIME)."</u> m&#252;ddetliyine <img src=\"img/zn/$znak\" alt=\".\"/> znak verildi.<br/>";

$zn_name = STRTOK($znak, ".");
mysql_query("UPDATE users SET zn = 'n/".$zn_name."',zn_time = '".($SERVER_TIME + $zn_vaxt)."' where id='".$usid."'");

if ($inf["sex"] == 0) $cinsi = " bey!";
else $cinsi = " xan&#305;m!";

$MSG = "H&#246;rmetli <u>".$inf['user']."</u> $cinsi <b>".$row['user']."</b> niki size <u>".$FN->DTIME($zn_time - $SERVER_TIME)."</u> m&#252;ddetliyine <img src=\"img/zn/".$znak."\" alt=\".\"/> znak verdi.";
@MYSQL_QUERY("INSERT INTO `zapiski` SET `idtowhom` = '".$usid."',`towhom` = '".$nick."',`idwho` = '0',`time` = '".$SERVER_TIME."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Znak',`message` = '".$MSG."';");

$sel = @mysql_query ("Select`user` from `users` where `id`='1' ;");
$ini = mysql_fetch_array ($sel);
$savo=$ini["user"];

$rnd = rand(0,99999999); 
$metn = "<b>".$row["user"]."</b> niki  <u>".$inf['user']."</u> nikine <i>".$FN->DTIME($zn_time - $SERVER_TIME)."</i> m&#252;ddetliyine <img src=\"img/zn/".$znak."\" alt=\".\"/> znak verdi.Dedimki xeberiniz olsun";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '1',`towhom` = '".$savo."',`idwho` = '0',`time` = '".$SERVER_TIME."',`who` = 'Sistem',`readd` =  '0',`topic` = 'Znak',`message` = '".$metn."';");

}
break;
}


$DIRECTORY = @OPENDIR(ZN_DIRECTORY);
IF(!$DIRECTORY){
echo "Bazada znak yoxdur<br/>\n";
} ELSE {
IF($inf['zn']!=''){
if ($inf["sex"] == 0) $cinsi = " beyin!";
else $cinsi = " xan&#305;m&#305;n!";

$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=extra&amp;ref=$ref");

echo "H&#246;rmetli <b>".$inf['user']."</b> ".$cinsi." znak&#305; var vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($inf['zn_time'] - $SERVER_TIME)."</u> qal&#305;b.<br/>Yeni znak almaq &#252;&#231;&#252;n k&#246;hne znak&#305; le&#287;v etmelisiz.\n";
echo "<img src=\"img/z".$inf['zn'].".gif\" alt=\"Znak\"/>\n";
$pf = "znak=x,";
$pf .= "nick=".$nick.",";
$pf .= "fun=1";
print $_v->submit("Le&#287;v et",$pf);  
} ELSE {
if ($inf["sex"] == 0) $cinsi = " beyin!";
else $cinsi = " xan&#305;m&#305;n!";

echo "H&#246;rmetli <b>".$inf['user']."</b> ".$cinsi." znak&#305; yoxdur.A&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z znaklardan z&#246;vq&#252;n&#252;ze uy&#287;un olan&#305;n&#305; se&#231;e bilersiz..<br/>";
}
echo $divide;
if($id=='1'){
IF(ISSET($HTTP_GET_VARS['cid'])){
$DEL = STR_REPLACE("../", "", $HTTP_GET_VARS['cid']);
$DEL = STR_REPLACE("./", "",  $DEL);
IF(!FILE_EXISTS(ZN_DIRECTORY."/".$DEL)){
echo "<b>Qeyd etdiyiniz znak bazada m&#246;vcut deyil!</b><br/>\n";
} ELSE {
@UNLINK(ZN_DIRECTORY."/".$DEL);
echo "<b>Qeyd etdiyiniz znak bazadan silindi!</b><br/>\n";
}
echo $divide;
}
}

$_ARR = @ARRAY();
WHILE($ZN = @READDIR($DIRECTORY)){
IF($ZN!="." AND $ZN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($ZN))){
$_ARR[] = $ZN;
}
}
$TOTAL = COUNT($_ARR);

LIST($PAGE,$START,$MAX) = $FN->PAGESTART($TOTAL,PAGE_LIMIT);
$END = !ISSET($PAGE) ? $MAX : ($START+$MAX);
WHILE($START<$END){
IF(!EMPTY($_ARR[$START])){
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=extra&amp;ref=$ref");

if($id=='1'){
echo "[<a href=\"admin.php?cid=".$_ARR[$START]."&amp;go=extra&amp;nick=$nick&amp;fun=1&amp;id=$id&amp;ps=$ps&amp;page=".$PAGE."&amp;ref=$ref\">x</a>]\n";
}
echo "<b>".($START+1)."</b>) <img src=\"".LINK_PATH.ZN_DIRECTORY."/".$_ARR[$START]."\" alt=\"znak\"/>\n";
$option ="<select name=\"time\">|";
FOREACH($ZN_ORDERS AS $VALUE => $KEY){
$option .="<option value=\"".$VALUE."\">".$FN->DTIME($VALUE)."</option>|";
}
$option .="</select>";
print $_v->select($option)."\n";
$pf = "znak=".$_ARR[$START].",";
$pf .= "nick=".$nick.",";
$pf .= "fun=1";
print $_v->submit("Se&#231;",$pf);    
echo $divide;
}
$START++;
}
if($TOTAL>$MAX){
echo $FN->PAGENAV("admin.php?&amp;id=$id&amp;ps=$ps&amp;go=extra&amp;nick=$usid&amp;fun=1&amp;ref=$ref&amp;", $TOTAL, $MAX, $PAGE);
}
}
if($TOTAL!='0'){
echo $divide;
echo "Bazada cemi <u>".$TOTAL."</u> znak var.<br/>\n";
}
break;




case '2':
if($p_arr['101']!=1){

echo "Icazeniz yoxdur!<br/>\n";

break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,level,inv,zn from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,level,inv,zn from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,level,inv,zn from users where id = '".$nick."'");
}

if (mysql_affected_rows() <= 0) {

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$nick = $inf["user"];
$level2=$inf["level"];
$zn=$inf["zn"];
if($level2 >= $row["level"]&&$id!=1){

echo "Bax bu ujey olmaz:)<br/>\n";

break;
}
$qus = mysql_query ("Select id from users order by id desc"); 
$ind = mysql_fetch_array ($qus); 
$max_id = $ind["id"];


if($_POST["u_id"]!=""){
mysql_query ("select id from users where id='".$u_id."'");
if ((mysql_affected_rows() != 0)or($max_id<=$u_id) or preg_match("/[^0-9]+/",$u_id)) {

if(preg_match("/[^0-9]+/",$u_id))
echo "ID n&#246;mresi yaln&#305;z reqemlerden ibaret olmal&#305;d&#305;r!<br/>\n";
else
if($max_id<=$u_id)echo "\"<b>$max_id</b>\"-den b&#246;y&#252;k  ID n&#246;mresi vermek olmaz!<br/>\n";
else
echo "Bu ID n&#246;mresi m&#246;vcuddur. Ba&#351;qa ID se&#231;in.<br/>\n";
echo $divide;
echo "<u>ID N&#246;mresi</u>:\n";
$_v->action("admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"u_id$ref\" size=\"8\" value=\"$usid\" title=\"ID N&#246;mresi\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','fun=2,usid='.$usid);
echo "<br/>";
break;
}


echo "\"<b>$nick</b>\" leqebli istifade&#231;iden ID n&#246;mresi deyi&#351;dirildi \"<b>$u_id</b>\" edildi!<br/>";

$latuser=strtolower($nick);
mysql_query ("Update users set id='".$u_id."' where id ='".$usid."'")or die(mysql_error());
mysql_query("UPDATE `friends` SET `usid` = '".$u_id."' where `usid`='".$usid."'");
mysql_query("UPDATE `friends` SET `id` = '".$u_id."' where `id`='".$usid."'");
mysql_query("UPDATE `ignor` SET `usid` = '".$u_id."' where `usid`='".$usid."'");
mysql_query("UPDATE `ignor` SET `id` = '".$u_id."' where `id`='".$usid."'");
mysql_query("UPDATE `hesab` SET `usid` = '".$u_id."' where `usid` = '".$usid."'");
mysql_query("UPDATE `albom` SET `idfoto` = '".$u_id."' where `idfoto` = '".$usid."'");
mysql_query("UPDATE `mms` SET `d1` = '1', `d2` = '1'  where `to`='".$usid."' or `from`='".$usid."'");
mysql_query("UPDATE `c_nick` SET `to` = '".$u_id."' where `to` = '".$usid."'");

if(file_exists("i/".$usid.".gif")){
if(file_exists("i/".$u_id.".gif"))
@unlink("i/".$u_id.".gif");
@rename("i/".$usid.".gif", "i/".$u_id.".gif");
}
if(file_exists("file/select/".$usid.".reg")){
@rename("file/select/".$usid.".reg", "file/select/".$u_id.".reg");
}
if(file_exists("file/select/".$usid.".php")){
@rename("file/select/".$usid.".php", "file/select/".$u_id.".php");
}
break;
}


echo "<b>Qeyd: $max_id</b>-dan a&#351;aq&#305; id reqemi vere bilersiz.<br/>\n";
echo $divide;

echo "Leqeb: <b>$nick</b><br/>\n";
echo "<u>ID N&#246;mresi</u>:\n";

$_v->action("admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"u_id$ref\" size=\"8\" value=\"$usid\" title=\"ID N&#246;mresi\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','fun=2,nick='.$usid);
echo "<br/>";
break;





case '3':
if($p_arr['102']!=1){

echo "Icazeniz yoxdur!<br/>\n";

break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,level,inv,zn from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,level,inv,zn from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,level,inv,zn from users where id = '".$nick."'");
}

if (mysql_affected_rows() <= 0) {

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$nick = $inf["user"];
$level2=$inf["level"];
$room=$inf["room"];
$zn=$inf["zn"];
if($level2 >= $row["level"]&&$id!=1){

echo "Bax bu ujey olmaz:)<br/>\n";

break;
}


if($_POST["mud"]!="" and $_POST["secund"]!=""){
if ($inf["level"]>$row["level"]){
$levelselect = @mysql_query ("Select name from levels where level='".$level2."'");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];

echo "Bu &#350;exsin <b>".$levelname."</b> r&#252;tbesi var. Vaxt ile r&#252;tbe vermek olmaz...<br/>";

break;
}
settype($rutbe, 'integer');
settype($mud, 'integer');
if($secund==0)$mud=3;
if($mud==0){
$rutbevaxt = $secund*86400+$SERVER_TIME;
}elseif($mud==1){
$rutbevaxt = $secund*2592000+$SERVER_TIME;
}else{
$rutbevaxt = 0;
$rutbe = 0;
}
if (mysql_query ("Update users set  level='".$rutbe."', rutbe = '".$rutbevaxt."', panel = '2' where id ='".$usid."'")) {
if (($level2 != $rutbe)&&($elan!="0")){
$levelselect = @mysql_query ("Select name from levels where level='".$rutbe."'");
$levels = @mysql_fetch_array($levelselect);
$ur=$levels["name"];
if($elan==2){
$rutbevaxt = $rutbevaxt - $SERVER_TIME;
if($rutbevaxt < 3600 && $rutbevaxt > 59)
{
$new = $rutbevaxt;
$rutbevaxt = $new/60;
$secund = "deqiqelik\n";
}
elseif($rutbevaxt < 86400 && $rutbevaxt >=3599)
{
$new = $rutbevaxt;
$rutbevaxt = $new/3600;
$secund = "saatl&#305;q\n";
}
elseif($rutbevaxt > 86399)
{
$new = $rutbevaxt;
$rutbevaxt = $new/86400;
$secund = "g&#252;nl&#252;k\n";
}
$rutbevaxt = round($rutbevaxt);
}
for ($i=0; $i<=10; $i++){
$st = $SERVER_TIME;
$today=date ("H:i");
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
if($elan==1){$mes = "<b>DiQQET! $user <u>".$nick."</u>  Leqebli  istifade&#231;ini ".$ur." vezifesine teyin etdi!</b>";}
else
{
$mes = "<b>DiQQET! $user <u>".$nick."</u> Leqebli  istifade&#231;iye <u>".$rutbevaxt." ".$secund."</u>, ".$ur." vezifesi teyin etdi</b>!";
}
$rnd = rand(0,99999999);
@mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Status', message='".$mes."', id='".$st."', towhom='', hid='0', usid='9'");
}
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
$data = date("d.m.Y [H:i]",$SERVER_TIME); 
$kol = rand(0,99999999);
$topic = "Tebrikler!";
$message = "<b>".$nick."</b>!Tebrik edirem. Siz Bu vezifeye layiq goruldunuz. ".$lev." <b>".$user."</b> qerara aldiki size <b>".$ur."</b> vezifesini teyin etsin.Edaletli olun.Eger sizden 1 shikayet gelse ve bu dogru olsa Vezife geri qaytarilmamaq shertile alinacaq.Sui istifade olunsa Vezife yene geri alinacaq.Hech bir user Haqqinda Heckime Melumat verile bilmez,eks teqdirde Vezife alinacaq!";
@mysql_query("insert into zapiski values(0,'Status','0','".$message."','".$nick."','".$upid."','".$SERVER_TIME."','0','".$topic."','".$data."','1','1');");
}
mysql_query ("Update users set time='".$SERVER_TIME."', room='".$room."' where id ='9'");


echo "<b><b>Melumat yenilendi.</b></b><br/>\n";

} else {

echo "Database error:<br/>\n";

echo " ".mysql_error()." ";
}
break;
}
/////////////////////////////////////////

echo "Leqeb: <b>$nick</b><br/>\n";
echo $divide;
$_v->action("admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
echo "R&#252;tbe:<br/>\n";
$option = "<select name=\"rutbe$ref\">|";

if($inf["level"] != 0)
{
	$i = $inf["level"];
	$levelselect = @mysql_query ("Select name from levels where level='".$i."'");
	$levels = @mysql_fetch_array($levelselect);
	$levelname=$levels["name"];
	$option .= "<option value=\"".$i."\">".$i."-".$levelname."</option>|";
}
if ($row["level"]==9)
{
	for($i = 4; $i <= 8; $i++)
	{
		$levelselect = @mysql_query ("Select name from levels where level='".$i."' order by level desc;");
		$levels = @mysql_fetch_array($levelselect);
		$levelname=$levels["name"];;
		$option .= "<option value=\"".$i."\">".$i."-".$levelname."</option>|";
	}
}
$option .= "</select>";
print $_v->select($option,$inf["level"]).'<br/>';

echo "M&#252;ddet:<br/>\n";
print $_v->input("<input name=\"secund$ref\" title=\"Vaxt\" maxlength=\"2\" format=\"*N\" emptyok=\"true\"/>").'<br/>';

echo "N&#246;v: - :\n";
print $_v->select("<select name=\"mud$ref\">|<option value=\"0\">G&#252;nl&#252;k </option>|<option value=\"1\">Ayl&#305;q </option>|</select>").'<br/>';

echo "Otaqlara Elan:<br/>\n";
print $_v->select("<select name=\"elan$ref\">|<option value=\"0\">Elans&#305;z</option>|<option value=\"1\">Vaxt bilinmesin</option>|<option value=\"2\">Oldu&#287;u kimi d&#252;&#351;s&#252;n</option>|</select>").'<br/>';

echo $divide;
print $_v->submit('R&#252;tbe ver','fun=3,nick='.$usid);
echo "<br/>";
break;
}
break;
case 'nikq':
if($id !=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
break;
}
if($_POST['upid']=="")
{
$nick=trim($nick);
if (!ctype_digit($nick)) {
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = mysql_query ("Select * from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("Select * from users where id = '".$nick."'");
}
if (mysql_affected_rows() <= 0) {

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$u_user = $inf["user"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$level2=$inf["level"];
$posts=$inf["posts"];
/////eave
$avr=$inf["avr"];
$mesaj=$inf["mesaj"];
$rnikler=$inf["rnikler"];
$nax=$inf["max"];
$mektub_qebulu=$inf["mektub_qebulu"];
$say=$inf["say"];
$smls=$inf["smiles"];
$safe=$inf["safe"];
$fsize=$inf["fsize"];
$ssms=$inf["ssms"];
$dost=$inf["dost"];
$anketb=$inf["anketb"];

if($level2 >= $row["level"]&&$id!=1){

echo "Bax bu ujey olmaz:)<br/>\n";
break;
}
	echo "<b>&#199;at Qur&#287;ular&#305;</b><br/>\n";

	$_v->divide();
echo "Leqebi:\n";
echo "<b>$u_user</b><br/>-----<br/>\n";
$_v->action("admin.php?go=nikq&amp;id=$id&amp;ps=$ps&amp;ref=$ref");


echo "Sesli SmS:<br/>\n";
$option = "<select name=\"ssms\">|";
if ($inf["ssms"]==1){
	    $option .= "<option value=\"1\">A&#231;&#305;q</option>|";
		$option .= "<option value=\"0\">Bagl&#305; </option>|";
}else if ($inf["ssms"]==0){
        $option .= "<option value=\"0\">Bagl&#305; </option>|";
	    $option .= "<option value=\"1\">A&#231;&#305;q</option>|";
}
	$option .= "</select>";
print $_v->select($option,$inf['ssms']).'<br/>';
	
echo "Ankete Baxmaq:<br/>\n";
$option = "<select name=\"anketb\">|";
if ($inf["anketb"]==0){
	    $option .= "<option value=\"0\">A&#231;&#305;q</option>|";
		$option .= "<option value=\"1\">Bagl&#305; </option>|";
}else if ($inf["anketb"]==1){
        $option .= "<option value=\"1\">Bagl&#305; </option>|";
	    $option .= "<option value=\"0\">A&#231;&#305;q</option>|";
}
	$option .= "</select>";
	print $_v->select($option,$inf['anketb']).'<br/>';
	
	
echo "Dostluq Qebulu:<br/>\n";
$option = "<select name=\"dost\">|";
if ($inf["dost"]==0){
	    $option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
		$option .= "<option value=\"1\">Dostluq Qebulu Bagl&#305;</option>|";
}else if ($inf["dost"]==1){
        $option .= "<option value=\"1\">Dostluq Qebulu Bagl&#305;</option>|";
	    $option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
}
	$option .= "</select>";
print $_v->select($option,$inf['dost']).'<br/>';

	echo "Yenilenme vaxt&#305;(san):<br/>\n";

		$option = "<select name=\"avr\">|";
 if ($inf["avr"]==100){
	$option .= "<option value=\"100\">10</option>|";
	}else if ($inf["avr"]==150){
	$option .= "<option value=\"150\">15</option>|";
	}else if ($inf["avr"]==200){
	$option .= "<option value=\"200\">20</option>|";
	}else if ($inf["avr"]==250){
	$option .= "<option value=\"250\">25</option>|";
	}else if ($inf["avr"]==300){
	$option .= "<option value=\"300\">30</option>|";
	}
elseif($inf["avr"] === 0) $option .= "<option value=\"0\">Off</option>|";
	$option .= "<option value=\"0\">Off</option>|";
   if($inf["avr"] != 100) $option .= "<option value=\"100\">10</option>|";
    if($inf["avr"] != 150)$option .= "<option value=\"150\">15</option>|";
	if($inf["avr"] != 200)$option .= "<option value=\"200\">20</option>|";
	if($inf["avr"] != 250)$option .= "<option value=\"250\">25</option>|";
	if($inf["avr"] != 300)$option .= "<option value=\"300\">30</option>|";

	$option .= "</select>";
	print $_v->select($option,$inf['avr']).'<br/>';

	
	
	echo "Mesajlar&#305;n say&#305;:<br/>\n";

$max=$inf["max"]; 
	$option = "<select name=\"max\">|";
	if($inf["max"] ==$max){
	$option .= "<option value=\"$max\">$max</option>|";
	}
	if($inf["max"] != 5)$option .= "<option value=\"5\">5</option>|";
	if($inf["max"] != 8)$option .= "<option value=\"8\">8</option>|";
	if($inf["max"] != 10)$option .= "<option value=\"10\">10</option>|";
	if($inf["max"] != 12)$option .= "<option value=\"12\">12</option>|";
	if($inf["max"] != 15)$option .= "<option value=\"15\">15</option>|";
	if($inf["max"] != 20)$option .= "<option value=\"20\">20</option>|";
	if($inf["max"] != 25)$option .= "<option value=\"25\">25</option>|";
	if($inf["max"] != 30)$option .= "<option value=\"30\">30</option>|";
	if($inf["max"] != 50)$option .= "<option value=\"50\">50</option>|";
	$option .= "</select>";
	print $_v->select($option,$inf['max']).'<br/>';

	echo "Mektub qebulu:<br/>\n";

	$option = "<select name=\"mektub_qebulu\">|";
	if($inf["mektub_qebulu"] ==0){
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	$option .= "<option value=\"1\">Dostlar</option>|";
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	}
	else if($inf["mektub_qebulu"] ==1){
	$option .= "<option value=\"1\">Dostlar</option>|";
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	}
	else if($inf["mektub_qebulu"] ==2){
	$option .= "<option value=\"2\">He&#231;kim</option>|";
	$option .= "<option value=\"0\">Ham&#305;</option>|";
	$option .= "<option value=\"1\">Dostlar</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$inf['mektub_qebulu']).'<br/>';


	echo "Mesaj qebulu (Tan&#305;&#351;l&#305;q):<br/>\n";
	$option = "<select name=\"mesaj\">|";
	if($inf["mesaj"] ==0){
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	}
	else if($inf["mesaj"] ==1){
	$option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
	}
	else if($inf["mesaj"] ==2){
	$option .= "<option value=\"2\">Tan&#305;&#351;l&#305;&#287;&#305; ba&#287;la</option>|";
	$option .= "<option value=\"0\">Herkes &#252;&#231;&#252;n aktiv</option>|";
    $option .= "<option value=\"1\">Dostlar &#252;&#231;&#252;n aktiv</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$inf['mesaj']).'<br/>';



	echo "Yazanda:<br/>\n";

	$option = "<select name=\"say\">|";
	if($inf["say"] ==1){
	$option .= "<option value=\"1\">&#350;exsi</option>|";
	$option .= "<option value=\"0\">&#220;mumi</option>|";
	}else{	
$option .= "<option value=\"0\">&#220;mumi</option>|";
$option .= "<option value=\"1\">&#350;exsi</option>|";	
		}
	$option .= "</select>";
	print $_v->select($option,$inf['say']).'<br/>';

	echo "Rengli Nikler:<br/>\n";
	$option = "<select name=\"rnikler\">|";
	if($inf["rnikler"] ==0){
	$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
	$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
	}else{
$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
}
	$option .= "</select>"; 
	print $_v->select($option,$inf['rnikler']).'<br/>';
	echo "Smayllar:<br/>\n";
$option = "<select name=\"smls\">|";
	if($inf["smiles"] ==2){
	$option .= "<option value=\"2\">A&#231;&#305;q</option>|";
	$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";
	}else{
	$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
	$option .= "<option value=\"2\">A&#231;&#305;q</option>|";
	}
	$option .= "</select>"; 
	print $_v->select($option,$inf['smiles']).'<br/>';


	echo "Tehl&#252;kesizlik:<br/>\n";
	$option = "<select name=\"safe\">|"; 
if($inf["safe"] ==1){
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
	}else{
$option .= "<option value=\"0\">Ba&#287;l&#305;</option>|";  
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
}
	$option .= "</select>";
	print $_v->select($option,$inf['safe']).'<br/>';


	echo "Herflerin &#246;l&#231;&#252;s&#252;:<br/>\n";
	$option = "<select name=\"fsize\">|";
	if($inf["fsize"] ==0){
	$option .= "<option value=\"0\">Normal</option>|";
	$option .= "<option value=\"1\">B&#246;y&#252;k</option>|";
	}else{
	$option .= "<option value=\"1\">B&#246;y&#252;k</option>|";
	$option .= "<option value=\"0\">Normal</option>|";
	}
	$option .= "</select>";
	print $_v->select($option,$inf['fsize']).'<br/>';

	$_v->divide();


print $_v->submit('Deyi&#351;dir','upid='.$usid);
}
else
{

$error = true;

$emp="Duzgun format deyil!";
if(!preg_match("!^[0-9]+$!i",$avr)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$max)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$mektub_qebulu)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$say)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$smls)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$safe)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$mesaj)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$ssms)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$dost)){$error = $emp;}
elseif(!preg_match("!^[0-9]+$!i",$anketb)){$error = $emp;}
else {
$status = check($status);
$fsize = check($fsize);

settype($avr, 'integer');
settype($mesaj, 'integer');
settype($rnikler, 'integer');
settype($max, 'integer');
settype($mektub_qebulu, 'integer');
settype($say, 'integer');
settype($smls, 'integer');
settype($safe, 'integer');
settype($fsize, 'integer');
settype($ssms, 'integer');
settype($dost, 'integer');
settype($anketb, 'integer');
settype($upid, 'integer');

$ins_str = "Update users set avr='".$avr."', mesaj='".$mesaj."', rnikler='".$rnikler."',ssms='".$ssms."', dost='".$dost."', anketb='".$anketb."', max='".$max."',mektub_qebulu='".$mektub_qebulu."', say='".$say."',  smiles='".$smls."', safe='".$safe."', fsize='".$fsize."' where id ='".$upid."'";
if (mysql_query ($ins_str)) {

if($mesaj!=$inf['mesaj'])
	{
			mysql_query("UPDATE `mesaj` SET `icaze`='$mesaj' WHERE `idwho` = '".$upid."';");
	}
else
	{
		$error = mysql_error();
	}

echo "<b>Melumat Yenilendi</b><br/>";

}
}




}
break;


case 'infous':
if($p_arr['6']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
if($_POST['upid']=="" and $_POST['sex']=="")
{
$nick=trim($nick);
if (!ctype_digit($nick)) {
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = mysql_query ("Select * from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("Select * from users where id = '".$nick."'");
}
if (mysql_affected_rows() <= 0) {

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$u_user = $inf["user"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$level2=$inf["level"];
$posts=$inf["posts"];


if($level2 >= $row["level"]&&$id!=1){

echo "Bax bu ujey olmaz:)<br/>\n";

break;
}

echo "Leqebi:\n";
echo "<b>$u_user</b><br/>-----<br/>\n";
//$name = htmlspecialchars($inf['name']);
$name = $inf['name'];
$_v->action("admin.php?go=infous&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Ad&#305;:<br/>\n";
print $_v->input("<input name=\"name$ref\" value=\"$name\" title=\"Ad&#305;\"/>").'<br/>';



echo "Cinsi:<br/>\n";
print $_v->select("<select name=\"sex$ref\">|<option value=\"0\">Ki&#351;i </option>|<option value=\"1\">Qad&#305;n </option>|</select>",$inf["sex"]).'<br/>';




@list( $day, $month, $year ) = split( '-', $inf["birth"] );

echo "Do&#287;um Tarixi:<br/>\n";

print $_v->input("<input size=\"2\" name=\"day$ref\" value=\"$day\" maxlength=\"2\" format=\"*N\"/>").'-';
print $_v->input("<input size=\"2\" name=\"month$ref\" value=\"$month\" maxlength=\"2\" format=\"*N\"/>").'-';
print $_v->input("<input size=\"4\" name=\"year$ref\" value=\"$year\"  maxlength=\"4\" format=\"*N\" emptyok=\"false\"/>").'<br/>';


echo "Ya&#351;ad&#305;&#287;&#305; yer:<br/>\n";

//city = htmlspecialchars($inf['city']);
$city = $inf['city'];

print $_v->input("<input name=\"city$ref\" value=\"$city\" title=\"&#350;eher\"/>").'<br/>';



echo "N&#246;mresi:<br/>\n";
print $_v->input("<input name=\"nom$ref\" value=\"$inf[nomre]\" title=\"N&#246;mresi\"/>").'<br/>';



echo "Haqq&#305;nda:<br/>\n";

//$infa = htmlspecialchars($inf['infa']);
$infa = $inf['infa'];

if(strstr($infa,"<img src=\""))
{
$tend = strpos($infa,"\"/>");
$t=strlen($infa);
$msgend=substr($infa,$tend+3,$t);
$msgtemp=substr($infa,0,$tend);
$t1=strpos($msgtemp,"<img src=\"");
$msgfirst=substr($msgtemp,0,$t1);
$t2=strlen($msgtemp);
$t3=strpos($msgtemp,"alt=\"");
$msgaver=substr($msgtemp,$t3+5,$t2);
$infa=$msgfirst.$msgaver.$msgend;
}

print $_v->input("<input name=\"infa$ref\" value=\"$infa\" title=\"Haqq&#305;nda\"/>").'<br/>';

echo "Mesajlara auto cavab:<br/>\n";
$avtootvetm = $inf['avtootvetm'];
print $_v->input("<input name=\"avtootvetm$ref\" maxlength=\"250\" value=\"$avtootvetm\" title=\"Mektublara cavab\" emptyok=\"true\"/>").'<br/>';


echo "Mektublara auto cavab:<br/>\n";

//$avtootvet = htmlspecialchars($inf['avtootvet']);
$avtootvet = $inf['avtootvet'];
print $_v->input("<input name=\"avtootvet$ref\" maxlength=\"250\" value=\"$avtootvet\" title=\"Mektublara cavab\" emptyok=\"true\"/>").'<br/>';

echo "&#199;atda Meqsed:<br/>\n";

print $_v->select("<select name=\"meqsed$ref\">|<option value=\"1\">Sevgi Tapmaq</option>|<option value=\"2\">Virtual Dostluq</option>|<option value=\"3\">Dost Tapmaq</option>|</select>",$inf["meqsed"]).'<br/>';
print $_v->submit('Deyi&#351;dir','upid='.$usid);
if($_v->ver!='wml') {
echo "<br/>";
}
}
else
{



$error = true;

$emp2 = "Melumat Formati Duzgun Deyil.!";
$emp = "Butun Bolmeler(esasen *(ulduz olan bolmeler) tamamlanmayib!";
$wrongdate = "Dogum Tarixi Duzgun Yazilmayib.Bu Reala Uygun Olmalidir =)";
$god=date("Y",$SERVER_TIME)-10;

if ($name == "") {$msg = "&#304;stifade&#231;inin ad&#305;n&#305; yazmad&#305;z.";}
elseif ((strlen($day) !== 2)||($day>31)){$msg = "Anadan oldu&#287;u g&#252;n&#252; d&#252;zg&#252;n deyil.";}
elseif ((strlen($month) !== 2)||($month>12)){$msg = "Anadan oldu&#287;u ay d&#252;zg&#252;n deyil.";}
elseif ((strlen($year) !== 4)||($year>=$god)||($year<1970)){$msg = "Anadan oldu&#287;u &#304;l d&#252;zg&#252;n deyil.";}
else {
$day = check($day);
$month = check($month);
$year = check($year);
$city = check($city);
$nom = check($nom);
$infa = check($infa);
$avtootvet = check($avtootvet);
$avtootvetm = check($avtootvetm);
$infa=substr($infa,0,400);
$avtootvetm=substr($avtootvetm,0,1000);
$avtootvet=substr($avtootvet,0,1000);
if(!preg_match("!^[0-9]+$!i",$day)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}
elseif(!preg_match("!^[0-9]+$!i",$month)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}
elseif(!preg_match("!^[0-9]+$!i",$year)){$error = "Do&#246;um tarixi reqemlerden ibaret olmal&#305;d&#305;r";}

        $day = HtmlSpecialChars($day);
        $month = HtmlSpecialChars($month);
        $year = HtmlSpecialChars($year);
        $nom = HtmlSpecialChars($nom);
		
$name = narmobil($name);
$infa = narmobil($infa);
$city = narmobil($city);
$avtootvet = narmobil($avtootvet);
$avtootvetm = narmobil($avtootvetm);
$infa=in_smile($infa,$posts);

settype($meqsed, 'integer');
settype($upid, 'integer');
settype($sex, 'integer');
$birth = "$day-$month-$year";
$ins_str = "Update users set name='".$name."', birth='".$birth."', meqsed='".$meqsed."', avtootvetm='".$avtootvetm."', avtootvet='".$avtootvet."', nomre='".$nom."', sex='".$sex."', city='".$city."', infa='".$infa."'  where id = '".$upid."'";
if (mysql_query ($ins_str)) {

echo "<b>Melumat Yenilendi</b><br/>";

}
}
}
break;


case 'view':
if($p_arr['2']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$ruser = rus_to_k($nick);
if($ruser==$nick){
$select = mysql_query ("Select id,user,date,pass,posts,delmsg,status,level,fut_level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,bal,time_active,nnposts,anket,ankets,stsonline,forum from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("select id,user,date,pass,posts,delmsg,status,level,fut_level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,bal,time_active,nnposts,anket,ankets,stsonline,forum from users where ruser = '".$ruser."'");
}
} else {
$select = mysql_query ("Select id,user,date,pass,posts,delmsg,status,level,fut_level,credits,gposts,inv,user_ip,user_soft,img,gizlilik,shrift,mexvi,tox,bal,time_active,nnposts,anket,ankets,stsonline,forum from users where id = '".$nick."'");
}
if (mysql_affected_rows() <= 0) {

echo "Bele istifade&#231;i m&#246;vcud deyil!<br/>\n";

break;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$us_ip = $inf["user_ip"];
$us_soft = $inf["user_soft"];
$level2=$inf["level"];
$act_level = 0;

if($p_arr['223']==1){
$act_level = 9;
}elseif($p_arr['222']==1){
$act_level = 8;
}elseif($p_arr['221']==1){
$act_level = 7;
}elseif($p_arr['220']==1){
$act_level = 6;
}elseif($p_arr['219']==1){
$act_level = 5;
}elseif($p_arr['218']==1){
$act_level = 4;
}elseif($p_arr['217']==1){
$act_level = 3;
}elseif($p_arr['216']==1){
$act_level = 2;
}elseif($p_arr['215']==1){
$act_level = 1;
}elseif($p_arr['214']==1){
$act_level = 0;
}

if($act_level==0)$act_level = $row['level'];

if(($level2 >= $act_level)and($level2 >= 4)and($id!=$usid)and($id!=1)){

echo "Bax bu ujey olmaz:)<br/>\n";

break;
}



echo "ID-N&#246;mre:\n";
echo "$usid<br/>\n";

if($p_arr['50']!=1)
{
echo "Leqebi:\n";
echo '<b>'.$inf['user']."</b><br/>\n";
}

echo $divide;
$_v->action("admin.php?go=upd&amp;id=$id&amp;ps=$ps&amp;ref=$ref");


if($p_arr['50']==1){

echo "Leqebi:<br/>\n";
print $_v->input("<input name=\"upnick$ref\" value=\"$inf[user]\" title=\"nick\"/>").'<br/>';
}

if($p_arr['51']==1){

echo "Parol:<br/>\n";
print $_v->input("<input name=\"upass$ref\" value=\"".base64_decode($inf[pass])."\" title=\"upass\"/>").'<br/>';
}
if($p_arr['52']==1){

echo "Postlar&#305;:<br/>\n";
print $_v->input("<input name=\"posts$ref\" value=\"$inf[posts]\" format=\"*N\" title=\"posts\"/>").'<br/>';
}
if($id==1){
echo "G&#252;nl&#252;k Postu:<br/>\n";
print $_v->input("<input name=\"nnposts$ref\" value=\"$inf[nnposts]\" format=\"*N\" title=\"nnposts\"/>").'<br/>';
echo "G&#252;nl&#252;k Aktivliyi:<br/>\n";
print $_v->input("<input name=\"time_active$ref\" value=\"$inf[time_active]\" format=\"*N\" title=\"time_active\"/>").'<br/>';
}
if($p_arr['70']==1){
echo "Ballar&#305;:<br/>\n";
print $_v->input("<input name=\"bals$ref\" value=\"$inf[bal]\" format=\"*N\" title=\"bal\"/>").'<br/>';
}

if($p_arr['53']==1){

echo "Oyun postlar&#305;:<br/>\n";
print $_v->input("<input name=\"gposts$ref\" value=\"$inf[gposts]\" format=\"*N\" title=\"gposts\"/>").'<br/>';
}
if($p_arr['54']==1){

echo "Suala Cavablar&#305;:<br/>\n";
print $_v->input("<input name=\"credits$ref\" value=\"$inf[credits]\" format=\"*N\" title=\"posts\"/>").'<br/>';
}
if($id==1){
echo "Online Statusu:<br/>\n";
print $_v->input("<input name=\"stsonline$ref\" value=\"$inf[stsonline]\" title=\"status\"/>").'<br/>';
}
if($p_arr['55']==1){
echo "Status:<br/>\n";
print $_v->input("<input name=\"status$ref\" value=\"$inf[status]\" title=\"status\"/>").'<br/>';
}
/////
if($id==1){
echo "Tam infosu:<br/>\n";
$option = "<select name=\"anket$ref\">|";
if($inf["anket"] == 0){
$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
}else{
$option .= "<option value=\"1\">Ba&#287;l&#305;</option>|";
$option .= "<option value=\"0\">A&#231;&#305;q</option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['anket']).'<br/>';
echo "Ba&#287;l&#305; info yazisi:<br/>\n";
print $_v->input("<input name=\"ankets$ref\" value=\"$inf[ankets]\" title=\"ankets\"/>").'<br/>';
}
/////
if($p_arr['56']==1){

echo "S&#246;zleri silmek:<br/>\n";
$option = "<select name=\"delmsg$ref\">|";
if($inf["delmsg"] == 0){
$option .= "<option value=\"0\">Deaktiv </option>|";
$option .= "<option value=\"1\">Aktiv </option>|";
}else{
$option .= "<option value=\"1\">Aktiv </option>|";
$option .= "<option value=\"0\">Deaktiv </option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['delmsg']).'<br/>';

}
if($p_arr['57']==1){
echo "Toxunulmazl&#305;q:<br/>\n";
$option = "<select name=\"tox$ref\">|";
if($inf["tox"] == 0){ 
$option .= "<option value=\"0\">Deaktiv </option>|";
$option .= "<option value=\"1\">Toxunulmaz </option>|";
$option .= "<option value=\"2\">Tam Toxunulmaz </option>|";
} elseif($inf["tox"] == 1){
$option .= "<option value=\"1\">Toxunulmaz </option>|";
$option .= "<option value=\"2\">Tam Toxunulmaz </option>|";
$option .= "<option value=\"0\">Deaktiv </option>|";
}else{
$option .= "<option value=\"2\">Tam Toxunulmaz </option>|";
$option .= "<option value=\"1\">Toxunulmaz </option>|";
$option .= "<option value=\"0\">Deaktiv </option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['tox']).'<br/>';
}

if($p_arr['58']==1){
echo "Tam Mexvilik:<br/>\n";
$option = "<select name=\"mexvi$ref\">|";
if($inf["mexvi"] == 0){
$option .= "<option value=\"0\">Deaktiv </option>|";
$option .= "<option value=\"1\">Aktiv </option>|";
}else{
$option .= "<option value=\"1\">Aktiv </option>|";
$option .= "<option value=\"0\">Deaktiv </option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['mexvi']).'<br/>';
}

if($p_arr['59']==1){
echo "&#350;exsini g&#246;rs&#252;n?:<br/>\n";
$option = "<select name=\"gizlilik$ref\">|";
if($inf["gizlilik"] == 0){ 
$option .= "<option value=\"0\">Yox </option>|";
$option .= "<option value=\"2\">He </option>|";
}else{
$option .= "<option value=\"2\">He </option>|";
$option .= "<option value=\"0\">Yox </option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['gizlilik']).'<br/>';
}
if($p_arr['60']==1){
echo "G&#246;r&#252;nmezlik:<br/>\n";
$option = "<select name=\"inv$ref\">|";
if ($inf["inv"] == 0)$option .= "<option value=\"0\">Normal </option>|";
elseif ($inf["inv"] == 1)$option .= "<option value=\"1\">G&#246;r&#252;nmez</option>|";
elseif ($inf["inv"] == 3)$option .= "<option value=\"3\">Tam G&#246;r&#252;nmez</option>|";

if ($inf["inv"]!=0)$option .= "<option value=\"0\">Normal </option>|";
if ($inf["inv"]!=1)$option .= "<option value=\"1\">G&#246;r&#252;nmez</option>|";
if ($inf["inv"]!=3)$option .= "<option value=\"3\">Tam G&#246;r&#252;nmez</option>|";
$option .= "</select>";
print $_v->select($option,$inf['inv']).'<br/>';
}
if($p_arr['61']==1){
echo "&#350;riftin rengi:<br/>\n";
$option = "<select name=\"shrift$ref\">|";
if($inf["shrift"] == ""){
$option .= "<option value=\"\">Qara</option>|";
}
elseif($inf["shrift"] == "blue")
{
$option .= "<option value=\"blue\">G&#246;y</option>|";
}
elseif($inf["shrift"] == "green")
{
$option .= "<option value=\"green\">Ya&#351;l</option>|";
}
elseif($inf["shrift"] == "Magenta")
{
$option .= "<option value=\"Magenta\">Nar&#305;nc&#305;</option>|";
}
elseif($inf["shrift"] == "Indigo")
{
$option .= "<option value=\"Indigo\">Cehray&#305;</option>|";
}
elseif($inf["shrift"] == "red")
{
$option .= "<option value=\"red\">Q&#305;rm&#305;z&#305;</option>|";
}
elseif($inf["shrift"] == "#990000")
{
$option .= "<option value=\"#990000\">T&#252;nd Q&#305;rm&#305;z&#305;</option>|";
}
elseif($inf["shrift"] == "#990000")
{
$option .= "<option value=\"#fda805\">Q&#305;z&#305;l</option>|";
}
elseif($inf["shrift"] =="") 
$option .= "<option value=\"\">Qara</option>|";
$option .= "<option value=\"\">Qara</option>|";
$option .= "<option value=\"blue\">G&#246;y</option>|";
$option .= "<option value=\"green\">Ya&#351;l</option>|";
$option .= "<option value=\"Magenta\">Nar&#305;nc&#305;</option>|";
$option .= "<option value=\"Indigo\">Cehray&#305;</option>|";
$option .= "<option value=\"red\">Q&#305;rm&#305;z&#305;</option>|";
$option .= "<option value=\"#990000\">T&#252;nd Q&#305;rm&#305;z&#305;</option>|";
$option .= "<option value=\"#fda805\">Q&#305;z&#305;l</option>|";
$option .= "</select>";
print $_v->select($option,$inf['shrift']).'<br/>';
}
if($p_arr['62']==1){

echo "Qeydiyyat Tarixi:<br/>\n";
	@list( $day, $month, $year ) = split( '-', $inf["date"] );
	print $_v->input("<input size=\"2\" name=\"day$ref\" value=\"$day\" maxlength=\"2\" format=\"*N\" emptyok=\"false\"/>").'-';
	print $_v->input("<input size=\"2\" name=\"month$ref\" value=\"$month\" maxlength=\"2\" format=\"*N\" emptyok=\"false\"/>").'-';
	print $_v->input("<input size=\"4\" name=\"year$ref\" value=\"$year\" maxlength=\"4\" format=\"*N\" emptyok=\"false\"/>").'<br/>';

}




if($p_arr['63']==1){
echo "R&#252;tbe:<br/>\n";
$option = "<select name=\"level$ref\">|";
$arr_select_level = array(0=>'214',1=>'215',2=>'216',3=>'217',4=>'218',5=>'219',6=>'220',7=>'221',8=>'222',9=>'223');
$num_select_level = 0;
for($i = 0; $i <= 9; $i++) {
if($p_arr[$arr_select_level[$i]]==1)
{
$num_select_level++; 
$array_select_level[] = $i;
}
}

$levelselect = @mysql_query ("Select name from levels where level='".$inf['level']."';");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];
$option .= "<option value=\"$inf[level]\">".$inf['level']."-".$levelname."</option>|";

for($i = 0; $i < $num_select_level; $i++) {
if($inf['level']!=$array_select_level[$i]){
$levelselect = @mysql_query ("Select name from levels where level='".$array_select_level[$i]."'");
$levels = @mysql_fetch_array($levelselect);
$levelname=$levels["name"];
$option .= "<option value=\"$array_select_level[$i]\">$array_select_level[$i]-".$levelname."</option>|";
}}
$option .= "</select>";
print $_v->select($option,$inf['level']).'<br/>';

}
if($p_arr['64']==1){
echo "Forumda R&#252;tbesi:<br/>\n";
$option = "<select name=\"forum$ref\">|";
if($inf['forum']==0){
$option .= "<option value=\"0\">User</option>|";
$option .= "<option value=\"1\">Heveskar</option>|";
$option .= "<option value=\"2\">Moderator</option>|";
$option .= "<option value=\"3\">Admin</option>|";
}elseif($inf['forum']==1){ 
$option .= "<option value=\"1\">Heveskar</option>|";
$option .= "<option value=\"2\">Moderator</option>|";
$option .= "<option value=\"3\">Admin</option>|";
$option .= "<option value=\"0\">User</option>|";
}elseif($inf['forum']==2){ 
$option .= "<option value=\"2\">Moderator</option>|";
$option .= "<option value=\"3\">Admin</option>|";
$option .= "<option value=\"0\">User</option>|";
$option .= "<option value=\"1\">Heveskar</option>|";
}else{ 
$option .= "<option value=\"3\">Admin</option>|";
$option .= "<option value=\"0\">User</option>|";
$option .= "<option value=\"1\">Heveskar</option>|";
$option .= "<option value=\"2\">Moderator</option>|";
}
$option .= "</select>";
print $_v->select($option,$inf['forum']).'<br/>';
}
if($p_arr['63']==1 or $p_arr['64']==1){
$option = "<select name=\"elan$ref\">|";
$option .= "<option value=\"0\">Elans&#305;z gizli</option>|";
$option .= "<option value=\"1\">Elan ile </option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';
}

if($id=='1'){
echo "Futbol Proqnozda:<br/>\n";
$option = "<select name=\"fut_level$ref\">|";
$option .= "<option value=\"0\">Qonaq</option>|";
$option .= "<option value=\"1\">Bookmaker</option>|";
$option .= '</select>';
print $_v->select( $option, $inf['fut_level'] ) . '<br/>';
}

echo "----<br/>";



if($p_arr['201']==1){

echo "IP-User:\n";
echo "$us_ip<br/>\n";
echo "Soft-User:\n";
echo "$us_soft<br/>\n";
echo "----<br/>";

}
print $_v->submit('Deyi&#351;dir','upid='.$usid);
echo "<br/>\n";

if($p_arr['51']==1){
echo $divide;
echo "<a href=\"enter.php?id=$usid&amp;ps=$inf[pass]&amp;ref=$ref\">Bu Nikle Chata Gir</a><br/>";

}
break;

case 'upd':
if($p_arr['2']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$upnick=trim($upnick);
if($upnick==""){

echo "error<br/>\n";

break;
}

settype($upid, 'integer');
$a = mysql_query("SELECT `user`,`level`,`panel` FROM `users` WHERE `id` ='".$upid."'");
$b = mysql_fetch_array ($a);
$prl = $b["level"];
$nick = $b["user"];
$latuser=strtolower($upnick);
mysql_query ("Select `id` from `users` where (`latuser` = '".$latuser."')and(`user` != '".$nick."');");
if (mysql_affected_rows() != 0) {

echo "Bele istifade&#231;i artiq m&#246;vcuddur.<br/>\n";

break;
}

$arr_insert='';
$upnick = narmobila($upnick);
$upass = mysql_escape_string($upass);
$latuser = narmobila($latuser);
$status = narmobila($status);
$ankets = narmobila($ankets);
$stsonline = narmobila($stsonline);
settype($posts, 'integer');
settype($nnposts, 'integer');
settype($bal, 'integer');
settype($time_active, 'integer');
settype($gposts, 'integer');
settype($credits, 'integer');
//settype($byeotv, 'integer');
settype($anket, 'integer');
settype($inv, 'integer');
settype($level, 'integer');
settype($mexvi, 'integer');
settype($tox, 'integer');

$birth = "$day-$month-$year";

if($p_arr['50']==1){
$arr_insert.="user='".$upnick."',";
$arr_insert.="latuser = '".$latuser."',";
}
if($p_arr['51']==1){
$arr_insert.="pass='".base64_encode($upass)."',";
}
if($p_arr['52']==1){
$arr_insert.="posts='".$posts."',";
}
if($p_arr['70']==1){
$arr_insert.="bal='".$bals."',";
}
if($id==1){

$arr_insert.="fut_level='".$fut_level."',";

$arr_insert.="nnposts='".$nnposts."',";
$arr_insert.="time_active='".$time_active."',";
$arr_insert.="anket='".$anket."',";
$arr_insert.="ankets='".$ankets."',";
$arr_insert.="stsonline='".$stsonline."',";
}
if($p_arr['53']==1){
$arr_insert.="gposts='".$gposts."',";
}
if($p_arr['54']==1){
$arr_insert.="credits='".$credits."',";
}
if($p_arr['55']==1){
$arr_insert.="status='".$status."',";
}
if($p_arr['56']==1){
$arr_insert.="delmsg='".$delmsg."',";
}
if($p_arr['57']==1){
$arr_insert.="tox = '".$tox."',";
}
if($p_arr['58']==1){
$arr_insert.="mexvi = '".$mexvi."',";
}
if($p_arr['59']==1){
$arr_insert.="gizlilik='".$gizlilik."',";
}
if($p_arr['60']==1){
$arr_insert.="inv='".$inv."',";
}
if($p_arr['61']==1){
$arr_insert.="shrift = '".$shrift."',";
}
if($p_arr['62']==1){
$arr_insert.="date='".$birth."',";
}
if($p_arr['63']==1){

if($p_arr['223']==1){
$act_level = 9;
}elseif($p_arr['222']==1){
$act_level = 8;
}elseif($p_arr['221']==1){
$act_level = 7;
}elseif($p_arr['220']==1){
$act_level = 6;
}elseif($p_arr['219']==1){
$act_level = 5;
}elseif($p_arr['218']==1){
$act_level = 4;
}elseif($p_arr['217']==1){
$act_level = 3;
}elseif($p_arr['216']==1){
$act_level = 2;
}elseif($p_arr['215']==1){
$act_level = 1;
}elseif($p_arr['214']==1){
$act_level = 0;
}

if($act_level==0)$act_level = $row['level'];


if($level>$act_level and $level!=$prl){
exit('Attack');
}
if($level>=4 and $b["panel"]!='1'){
$arr_insert.="panel = '2',";
}
elseif($level<=3 and $b["panel"]!='1'){
$arr_insert.="panel = '0',";
}

$arr_insert.="level='".$level."',";
}
if($p_arr['64']==1){
$arr_insert.="forum = '".$forum."',";
}
$arr_insert = substr($arr_insert, 0 , -1);

if (mysql_query ("Update users set ".$arr_insert." where id ='".$upid."'")) {
if (($prl != $level)&&($elan=="1")){
$levelselect = @mysql_query ("Select name from levels where level='".$level."'");
$levels = @mysql_fetch_array($levelselect);
$ur=$levels["name"];
for ($i=0; $i<=22; $i++){
$st = $SERVER_TIME;
$today=date ("H:i");
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
$mes = "<b>DiQQET! $user <u>".$nick."</u>  Leqebli  istifade&#231;ini ".$ur." vezifesine teyin etdi!</b>";
$rnd = rand(0,99999999);
@mysql_query ("Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='Status', message='".$mes."', id='".$st."', towhom='', hid='0', usid='1'");
}
$levelselect = @mysql_query ("Select name from levels where level='".$row["level"]."'");
$levels = @mysql_fetch_array($levelselect);
$lev=$levels["name"];
$data = date("d-M-Y [H:i]",$SERVER_TIME);
$kol = rand(0,99999999);
$time = $SERVER_TIME;
$topic = "Tebrikler!";
$message = "<b>".$nick."</b>!Tebrik edirem. Siz Bu vezifeye layiq goruldunuz. ".$lev." <b>".$user."</b> qerara aldiki size <b>".$ur."</b> vezifesini teyin etsin.Edaletli olun.Eger sizden 1 shikayet gelse ve bu dogru olsa Vezife geri qaytarilmamaq shertile alinacaq.Sui istifade olunsa Vezife yene geri alinacaq.Hech bir user Haqqinda Heckime Melumat verile bilmez,eks teqdirde Vezife alinacaq!";
@mysql_query("insert into zapiski values(0,'Status','1','".$message."','".$nick."','".$upid."','".$time."','0','".$topic."','".$data."','1','1');");
}

echo "<b>Melumat yenilendi.</b><br/>\n";

} else {

echo "Database error:<br/>\n";

echo " ".mysql_error()." ";
}
break;


case 'addvopr':
if($p_arr['10']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
break;
}
$_v->action("admin.php?go=goaddvopr&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Sual:<br/>\n";
print $_v->input("<input name=\"vopros\" maxlength=\"255\" title=\"quest\"/>").'<br/>';

echo "Cavab:<br/>\n";
print $_v->input("<input name=\"answ\" maxlength=\"60\" title=\"answ\"/>").'<br/>';

print $_v->submit('Elave et','action=save');
echo "<br/>\n";
break;


case 'goaddvopr':
if($p_arr['10']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
break;
}
$vbaza = mysql_query ("Select * from `bots` order by `number` DESC");
$k = mysql_affected_rows()+1;
$vop = @mysql_fetch_array($vbaza);
$sonsual = $vop["vopros"];
if($sonsual!=$vopros)
mysql_query("insert into bots values(0,'$vopros','$answ','$vopros');");
if (mysql_error() == false){

echo "Sual elave edilib.<br/>\n";
echo "Cemi sual: $k <br/>\n";

} else {

echo "Sehv var!<br/>\n";
echo "".$k." ".$vopros." ".$answ;

echo "ERROR ".mysql_error()." ";
}
break;

case 'tell':
if($p_arr['26']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";
print $divide;
$_v->action("admin.php?go=gotell&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
echo "Metn:<br/>\n";
print $_v->input("<input name=\"txt\" maxlength=\"1255\" title=\"text\"/>").'<br/>';
print $_v->submit('Gonder','action=save');

echo "<br/>\n";
break;


case 'gotell':
if($p_arr['26']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$rnd = rand(0,99999999);
$today=date ("H:i");
function bricode($text){$text = str_replace("[/b]", "</b>", $text);$text = str_replace("[b]", "<b>", $text);$text = str_replace("[/u]", "</u>", $text);$text = str_replace("[u]", "<u>", $text);$text = str_replace("[/i]", "</i>", $text);$text = str_replace("[i]", "<i>", $text);$text = str_replace("[br]", "<br/>", $text);return $text;}
$txt = bricode($txt);
for ($num = 0; $num <= 9; $num++){
$room = "room".$num;
mysql_query ("Insert into $room set klu4= '".$rnd."', time='".$today."', who='".$user."', message='".$txt."', id='".$SERVER_TIME."', towhom='', hid='0', usid='".$id."'");
}
if (mysql_error() == false){

echo "Elan edildi.<br/>\n";

} else {

echo "Sehv var!<br/>\n";

echo "ERROR ".mysql_error()." ";
}
break;

case 'clearmms':
if($p_arr['18']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$time = $SERVER_TIME-864000;
$query = mysql_query("select COUNT(`lid`) from `mms` where `time`<'".$time."';");
$all = @mysql_result($query, 0);

$query = @mysql_query("SELECT `lid`,`photo` FROM `mms` WHERE `time`<'".$time."';");
for ($i=0;$i<=$all;$i++){
$arr = mysql_fetch_array($query);
$lid = $arr['lid'];
$photo = $arr['photo'];
if((file_exists("mms/$photo")&&($photo!=""))){
unlink("mms/$photo");
}
mysql_query ("DELETE from `mms` WHERE `lid`='".$lid."';");
}

echo "1 Aydan &#231;ox qalan (<b>$all</b>) MMS Mektub Silindi!<br/>\n";

break;


///
case 'mekoxu':
if($row['id']!=1){
echo "Sizin buna huququnuz yoxdur....<br/>\n";
break;
}
mysql_query("delete from `zapiski` where `readd` ='1'");
echo "B&#252;t&#252;n Oxunmu&#351; bildirisler silindi.<br/>\n";
break;
case 'msgoxu':
if($row['id']!=1){
echo "Sizin buna huququnuz yoxdur....<br/>\n";
break;
}

$n = @MYSQL_QUERY("SELECT * FROM `mesaj` where `readd` ='1' and `multimesaj` != '0'");
WHILE($ALB = @MYSQL_FETCH_OBJECT($n))
  {

 unlink("arxiv/nn/".$ALB->photo."");

 }
mysql_query("delete from `mesaj` where `readd` ='1'");
echo "B&#252;t&#252;n Oxunmu&#351; mesajlar silindi.<br/>\n";
break;
case 'elanok':
if($row['id']!=1){
echo "Sizin buna huququnuz yoxdur....<br/>\n";
break;
}
mysql_query ("TRUNCATE `obiav`;");
echo "Bazadaki Elanlar Tam Silindi..!<br/>\n";
break;
////


case 'clearok':
if($p_arr['19']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
mysql_query ("TRUNCATE `zapiski`;");

echo "Bildiris Bazas&#305; Tam Silindi.<br/>\n";

break;

case 'msgtmd':
if($p_arr['20']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$n = @MYSQL_QUERY("SELECT * FROM mesaj where `multimesaj` != '0'");
WHILE($ALB = @MYSQL_FETCH_OBJECT($n))
  {

 unlink("arxiv/nn/".$ALB->photo."");
 }

mysql_query ("TRUNCATE `mesaj`");
@mysql_query ("update `users` set `msn` = '0' where `msn` != '0';");
@mysql_query ("update `users` set `sms` = '0' where `sms` != '0';");
echo "Mesajlar Bazas&#305; Tam Silindi.<br/>\n";

break;

case 'delvopros':
if($p_arr['30']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
mysql_query ("DELETE from bots");

echo "Bazada olan B&#252;t&#252;n suallar silindi!<br/>\n";

break;

case 'delvoprose':
if($p_arr['30']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}


if($act) {
settype($nom, 'integer');
if(mysql_query("delete from `bots` where `number` = '".$nom."';")){
print "".$nom." n&#246;mreli sual silindi...<br/>";
print "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=delvoprose&amp;s=$s&amp;ref=$ref\">Bazadak&#305; Suallar</a><br/>";
$nom = $nom-1;
$select=mysql_query ("SELECT * FROM `bots` where `number` > '".$nom."';");
while ( $allu = mysql_fetch_array ($select) )
{
$nom = $allu["number"]-1;
$noms = $allu["number"];
@mysql_query ("update `bots` set `number` = '".$nom."' where `number` = '".$noms."';");
}
}
break;
}

echo "<b>Bazadak&#305; Suallar</b>-(Alim &#252;&#231;&#252;n)<br/>\n";
$vope = mysql_query ("select count(number) as num from bots;");
$usm = mysql_fetch_array($vope);
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
echo "Cemi: $num | $n/$do<br/>---<br/>\n";

$r = mysql_query ("select number,vopros,answer from bots order by number ASC limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Bazada he&#231;bir sual yoxdur...<br/>\n";
} else{

for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
print "".$arr['number'].") ".$arr['vopros']." - (<b>".$arr['answer']."</b>) [<a href=\"admin.php?act=bots&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;go=delvoprose&amp;nom=".$arr['number']."&amp;ref=$ref\">x</a>]<br/>";
}



$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"admin.php?go=delvoprose&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}


$tes = $num/10;
$test = round($tes,2);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"admin.php?go=delvoprose&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}


break;



case 'clallroom':
if($p_arr['21']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}


echo "B&#252;t&#252;n Otaqlar Temizlendi!<br/>Te&#351;ekk&#252;rler!<br/>\n";

if(isset($rm)){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>";
}
for ($num = 0; $num <= 10; $num++){
$room = "room".$num;
mysql_query("TRUNCATE TABLE `".$room."`;");
}
break;


case 'clroom':
if($p_arr['21']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>----<br/>';
if($rm!='') echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>\n";
else echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

break;
}

echo "Sizin oldu&#287;unuz otaq silindi!<br/>\n";

if(isset($rm)){

echo "----<br/><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>";

}
$room = "room".$rm;
mysql_query("TRUNCATE TABLE `$room`;");

break;


case 'unpin':
if($p_arr['170']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$q = mysql_query("select `id`,`user`,`kik`,`whokik`,`whykik` from `users` where `kik`>'".$SERVER_TIME."' order by `id` desc;");


echo "<b>Xaric Edilibler</b>";

echo "<br/>";
echo $divide;

if(empty($act)) {
while($arr=mysql_fetch_array($q)) {
$tkick = $arr['kik'] - $SERVER_TIME;
		if($tkick < 60 && $tkick > 0)
		{
		$vaxt = "san";
		}
		elseif($tkick < 3600 && $tkick > 60)
		{
		$new = $tkick;
		$tkick = $new/60;
		$vaxt = "deq";
		}
		elseif($tkick < 86400 && $tkick > 3600)
		{
		$new = $tkick;
		$tkick = $new/3600;
		$vaxt = "saat";
		}
		elseif($tkick > 86400)
		{
		$new = $tkick;
		$tkick = $new/86400;
		$vaxt = "g&#252;n";
		}
		$tkick = round($tkick);


echo "<b>".$arr['user']."</b> - Xaric etdi: <u>".$arr['whokik']."</u> Sebeb: (".$arr['whykik'].") $tkick $vaxt [<a href=\"admin.php?act=".$arr['id']."&amp;id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">x</a>]<br/>";

}
if (mysql_affected_rows() == 0){

echo "Hal-haz&#305;rda Xaric edilen yoxdur.<br/>";

}else{


echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;act=all&amp;ref=$ref\">B&#252;t&#252;n xaric edilenleri qaytar</a><br/>";

}
}elseif($act=="all") {
mysql_query("UPDATE `users` SET `kik` = '10' where `kik` != '0';");


echo "<u>B&#252;t&#252;n xaric edilenler</u>, Chata Qaydar&#305;ld&#305;!<br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Olunanlar</a><br/>";

@$fi = fopen("file/control/5.dat", "a+"); 
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$lst = base64_encode("<b>$user vaxt ile qovulan butun istifadecileri cata qaytard?</b>. [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
} else {
if(mysql_query("UPDATE `users` SET `kik` = '10', `whokik` = '' where `id`='".$act."';")){
$usres = mysql_query("select `user` from `users` where `id`='".$act."';");
$ca=mysql_fetch_array($usres);
$xilas=$ca['user'];
echo "<u>$xilas</u>, Chata Qaydar&#305;ld&#305;!<br/>";
echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=unpin&amp;ref=$ref\">Xaric Olunanlar</a><br/>";

$data = date("d.m.y [H:i]",$SERVER_TIME); 
@$fi = fopen("file/control/4.dat", "a+"); 
$lst = base64_encode("$user - \"<b>$xilas</b>\" leqebli istifadecini vaxt?ndan evvel cata qaytard? [<u>Admin Panel</u>] $data")."\n";
@fwrite($fi, $lst);
@fflush($fi);
@fclose($fi);
}
}
break;


case 'editrooms':
if($p_arr['32']!=1 or ($p_arr['98']!=1 and $p_arr['99']!=1)){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}

echo "<b>Room Panel</b><br/>----<br/>\n";


if(empty($act)) {
$q = mysql_query("select `rm`,`name`,`activ` from `rooms` order by `pos` limit 0,11;");
while($arr=mysql_fetch_array($q)) {

if($arr['activ']!=1) $activ_rm = '-Deaktiv'; else $activ_rm = '';
echo "<a href=\"admin.php?act=rnm&amp;id=$id&amp;ps=$ps&amp;go=editrooms&amp;rm=".$arr['rm']."&amp;ref=$ref\">".$arr['rm'].". ".$arr['name']."</a>".$activ_rm."<br/>";

}
}elseif ($act=="dornm" and ($p_arr['97']==1 or $p_arr['98']==1 or $p_arr['99']==1)){
settype($rm, 'integer');





$savetable = $vergul ='';
if($p_arr['97']==1){
if($rmid<=9 and $rm!=10){
settype($rmid, 'integer');
$savetable .= "`pos`='".$rmid."'";
}
}
if($p_arr['98']==1){
if($savetable!='')$vergul = ','; else $vergul = '';
$roomname = mysql_escape_string($roomname);
$savetable .= $vergul."`name`='".$roomname."'";
}
if($p_arr['99']==1){
settype($nov, 'integer');
settype($point, 'integer');
if($savetable!='')$vergul = ','; else $vergul = '';
$savetable .= $vergul."`nov`='".$nov."', `point`='".$point."'";
}
if($p_arr['97']==1 and $p_arr['98']==1 and $p_arr['99']==1){
settype($activ, 'integer');
if($savetable!='')$vergul = ','; else $vergul = '';
$savetable .= $vergul."`activ`='".$activ."'";
}
mysql_query ("update `rooms` set ".$savetable." where `rm`='".$rm."'");

echo "Otaq?n ad? Deyi&#351;dirdi!<br/>----<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Geri qay?t</a><br/>";

} else {
settype($rm, 'integer');
$q = mysql_query("select `name`,`nov`,`point`,`pos`,`activ` from `rooms` where `rm`='".$rm."';");
$arr=mysql_fetch_array($q);
$name=$arr["name"];
$rmid=$arr["pos"];

if($p_arr['97']==1){

echo "S?ra nomresi:<br/>\n";
$_v->action("admin.php?act=dornm&amp;id=$id&amp;ps=$ps&amp;go=editrooms&amp;rm=$rm");
print $_v->input("<input name=\"rmid$ref\" maxlength=\"2\" value=\"$rmid\"  format=\"*N\" title=\"s?ra nomresi\"/>").'<br/>';

}
if($p_arr['98']==1){

echo "Otag?n ad?:<br/>\n";
print $_v->input("<input name=\"roomname$ref\" maxlength=\"200\" value=\"$name\" title=\"ad?\"/>").'<br/>';

}
if($p_arr['99']==1){

echo "Otaqa giri&#351; &#252;&#231;&#252;n:<br/>\n";
print $_v->input("<input size =\"11\" name=\"point$ref\" maxlength=\"9\" value=\"$arr[point]\"/>");

$option = "<select name=\"nov$ref\">|";
if($arr["nov"] == 1){
$option .= "<option value=\"1\">Bal</option>|";
$option .= "<option value=\"0\">Post</option>|";
}else{
$option .= "<option value=\"0\">Post</option>|";
$option .= "<option value=\"1\">Bal</option>|";
}
$option .= "</select>";
//print $_v->select($option).'<br/>';
print $_v->select($option,$arr['nov']).'<br/>';
}
if($p_arr['97']==1 and $p_arr['98']==1 and $p_arr['99']==1){

echo "Otag?n veziyyeti:<br/>\n";
$option = "<select name=\"activ$ref\">|";
if($arr["activ"] != '1'){
$option .= "<option value=\"0\">Deaktiv</option>|";
$option .= "<option value=\"1\">Aktiv</option>|";
}else{
$option .= "<option value=\"1\">Aktiv</option>|";
$option .= "<option value=\"0\">Deaktiv</option>|";
}
$option .= "</select>";
//print $_v->select($option).'<br/>';
print $_v->select($option,$arr['activ']).'<br/>';
}
print $_v->submit('Deyisdir','action=save');

echo "<br/>\n";

echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editrooms&amp;ref=$ref\">Geri qay?t</a><br/>";

}
break;


case 'dsvadbi':
if($p_arr['31']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$q = mysql_query("select `id`,`zhenih`,`nevesta`,`saat` from `svadbi` order by `id` desc;");
if (mysql_affected_rows() == 0) {

echo "Toy teyin edilmeyib!!!<br/>\n";

} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {

$saat = ($arr['saat']-$SERVER_TIME)/3600;
$saat = round($saat);
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;action=del&amp;go=dsvadbi&amp;mid=".$arr['id']."&amp;ref=$ref\"><b>".$arr['zhenih']." </b>ile <b>".$arr['nevesta']."</b>.</a> Elan (".$saat.") saatdan sonra silinecek<br/>";

}
} else {
settype($mid, 'integer');
if(mysql_query("delete from `svadbi` where `id`='".$mid."' limit 1;")){

echo "<b>Toy silindi!</b><br/>";

}
}
}
break;



case 'gorush':
if($p_arr['24']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
break;
}
if(empty($title)) $error=$error."<u>Ba&#351;l&#305;q yazmam&#305;s&#305;z!</u><br/>";
if(empty($content)) $error=$error."<u>Melumat tam ya&#305;lmay&#305;b!</u><br/>";
if(empty($organizatory)) $error=$error."<u>Melumat&#305; yerle&#351;diren yaz&#305;lmay&#305;b!</u><br/>";
if(empty($action)) {
print "Xeberin ba&#351;l&#305;&#287;&#305;:<br/>";
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=gorush");

print $_v->input("<input name=\"title$ref\" title=\"title\" emptyok=\"true\"/>").'<br/>';

print "Metn:<br/>";
echo "<b>[b][/b]</b>, <u>[u][/u]</u>, <i>[i][/i]</i>, [br]-yeni setr.<br/>\n";
print $_v->input("<input name=\"content$ref\" title=\"title\" emptyok=\"true\"/>").'<br/>';


print "Te&#351;kilat&#231;&#305;lar:<br/>";
print $_v->input("<input name=\"organizatory$ref\" title=\"title\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Elave et','action=save');

print "<br/>";
} else {
if(empty($error)) {

$title = narmobila($title);
$content = narmobila($content);
$organizatory = narmobila($organizatory);

$xe = mysql_query ("Select * from `vstrechi` where `content` = '".$content."';"); 
if (mysql_affected_rows() == 0) {
if(mysql_query("insert into `vstrechi` values(0,'$user','$title','$content','$organizatory');")) {
print "<b>G&#246;r&#252;&#351; Teyin edildi.</b><br/>";
} else {
print "<i>Bazada problem var!</i><br/>";}
} else {
print "<i>Eyni ile bu formada g&#246;r&#252;&#351; var!</i><br/>";
echo "*****<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=gorush&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
} else {
print $error;
}
}
break;

case 'xgorush':
if($p_arr['25']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';
break;
}
$q = mysql_query("select `id`,`title`,`content` from `vstrechi` order by `id` desc;");
if (mysql_affected_rows() == 0) {
print "<i>G&#246;r&#252;&#351; Teyin Edilmeyib!</i><br/>\n";
} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {
print "<b>".$arr['title']."</b><br/>".$arr['content']." [<a href=\"admin.php?action=del&amp;id=$id&amp;ps=$ps&amp;go=xgorush&amp;mid=".$arr['id']."&amp;ref=$ref\">x</a>]<br/>";

}
} else {
if(mysql_query("delete from `vstrechi` where `id`='$mid' limit 1;")){
print "<b>G&#246;r&#252;&#351; le&#287;v edildi!</b><br/>";
echo "*****<br/><a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=xgorush&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}
}
}
break;

case 'dsvadbi':
$q = mysql_query("select id,zhenih,nevesta,saat from svadbi order by id desc;");
if (mysql_affected_rows() == 0) {

echo "Toy teyin edilmeyib!!!<br/>\n";

} else {
if(empty($action)) {
while($arr=mysql_fetch_array($q)) {

$saat = ($arr['saat']-$SERVER_TIME)/3600;
$saat = round($saat);
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;action=del&amp;go=dsvadbi&amp;mid=".$arr['id']."&amp;ref=$ref\"><b>".$arr['zhenih']." </b>ile <b>".$arr['nevesta']."</b>.</a> Elan (".$saat.") saatdan sonra silinecek<br/>";

}
} else {
settype($mid, 'integer');
if(mysql_query("delete from svadbi where id='".$mid."' limit 1;")){

echo "<b>Toy silindi!</b><br/>";

}
}
}
break;



case 'razvod':
if($p_arr['31']!=1){
echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=updrazvod&amp;ref=$ref");

echo "Kishinin Nicki:<br/>";
print $_v->input("<input name=\"zhenih\" maxlength=\"12\"/>").'<br/>';


echo "Qadinin Nicki:<br/>";
print $_v->input("<input name=\"nevesta\" maxlength=\"12\"/>").'<br/>';


print $_v->submit('Ayir','action=save');



echo "<br/>";
break;

case 'updrazvod':
if(empty($zhenih)) $error=$error."<u>Beyin bolmesi tamamlanmayib!</u><br/>";
if(empty($nevesta)) $error=$error."<u>Qizin bolmesi tamamlanmayib!</u><br/>";
$latuser=strtolower($zhenih);

$result = mysql_query ("Select * from users where latuser = '".$latuser."' and sex='0'");


if (mysql_affected_rows() == 0) {

echo "<u>Bele nickli  <b>".$zhenih."</b> oglan yoxdur.</u><br/>";

break;
}
$raz=mysql_fetch_array($result);
$zhena=$raz['para'];
if ($zhena!=$nevesta){

echo "<b>".$nevesta."</b> bu qiz nishanli deyil bu nicke <b>".$zhenih."</b>.<br/>";

break;
}

$latuser2=strtolower($nevesta);
$result = mysql_query ("Select * from users where latuser = '".$latuser2."' and sex='1'");

$qiz = mysql_fetch_array ($result);
$qadin=$qiz["user"];
if (mysql_affected_rows() == 0) {

echo "<u>Bele adli <b>".$nevesta."</b>  qiz yoxdur</u><br/>";

break;
}
$raz=mysql_fetch_array($result);
$muj=$raz['para'];
if ($muj==$zhenih){

echo "<b>".$zhenih." </b> eri deyil bu qizin: <b>".$nevesta."</b>.<br/>";

break;
}
if(empty($error)) {
if($zhenih!=$last_svadbi['zhenih']) {
$zhenih=strtolower($zhenih);
$nevesta=strtolower($nevesta);
if(mysql_query("Update `users` set `para`='' where `latuser` ='".$zhenih."'")&&mysql_query("Update `users` set `para`='' where `latuser` ='".$nevesta."'")) {

echo "<b>Ayr&#305;ld&#305;lar!</b><br/>";

} else {

echo "<b>Ayrilmaq mumkun deyil.Problem var!</b><br/>";

}
} else {

echo "<b>Bu insanlar choxdan ayrilib!</b><br/>";

}
} else {

echo $error;

}
break;

case 'bots':
if($p_arr['8']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$setting = @mysql_query ("SELECT * FROM setting WHERE klu4='1' LIMIT 1;");
$set = mysql_fetch_array ($setting);

echo "<b>Bot d&#252;zeli&#351;i:</b><br/>\n";
echo $divide;
echo "Chata qeydiyyat:<br/>\n";
$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=updbots&amp;ref=$ref");

$option = "<select name=\"reg$ref\">|";
if($set["reg"] == 0){
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
} else {
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';


echo $divide;
echo "Komp&#252;terden Qeydiyyat:<br/>\n";
$option = "<select name=\"computer$ref\">|";
if($set["computer"] == 0){
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
} else {
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
echo $divide;
echo "Komp&#252;terden &#199;ata giri&#351;:<br/>\n";

$option = "<select name=\"komputer$ref\">|";
if($set["komputer"] == 0){
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
} else {
$option .= "<option value=\"1\">A&#231;&#305;q</option>|";
$option .= "<option value=\"0\">Ba&#287;l&#305; </option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';



echo "Sual-Cavaba Komp-dan cavab g&#246;t&#252;rmek:<br/>\n";

$option = "<select name=\"vict$ref\">|";
if($set["vict"] == 0){
$option .= "<option value=\"0\">Yox</option>|";
$option .= "<option value=\"1\">Beli</option>|";
} else {
$option .= "<option value=\"1\">Beli</option>|";
$option .= "<option value=\"0\">Yox</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

echo "A&#287;&#305;ll&#305;n&#305;n interval&#305;:<br/>\n";
$option = "<select name=\"victint$ref\">|";
if($set["victint"] === "10"){
$option .= "<option value=\"10\">10</option>|";
}
elseif($set["victint"] === "30"){
$option .= "<option value=\"30\">30</option>|";
}
elseif($set["victint"] === "60"){
$option .= "<option value=\"60\">60</option>|";
}
elseif($set["victint"] === "120"){
$option .= "<option value=\"120\">120</option>|";
}
elseif($set["victint"] === "300"){
$option .= "<option value=\"300\">300</option>|";
}
elseif($set["victint"] === "600"){
$option .= "<option value=\"600\">600</option>|";
}
$option .= "<option value=\"10\">10</option>|";
$option .= "<option value=\"30\">30</option>|";
$option .= "<option value=\"60\">60</option>|";
$option .= "<option value=\"120\">120</option>|";
$option .= "<option value=\"300\">300</option>|";
$option .= "<option value=\"600\">600</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';

echo "----<br/>Yeni gelenlere hediyye:<br/>----<br/>\n";
echo "Post oglanlara:<br/>\n";
print $_v->input("<input name=\"post1$ref\" maxlength=\"8\" value=\"$set[posts1]\" format=\"*N\"/>").'<br/>';

echo "Bal oglanlara:<br/>\n";
print $_v->input("<input name=\"bal1$ref\" maxlength=\"8\" value=\"$set[bal1]\" format=\"*N\"/>").'<br/>';


echo "----<br/>Post Q?zlara:<br/>\n";
print $_v->input("<input name=\"post2$ref\" maxlength=\"8\" value=\"$set[posts2]\" format=\"*N\"/>").'<br/>';

echo "Bal Q?zlara:<br/>\n";
print $_v->input("<input name=\"bal2$ref\" maxlength=\"8\" value=\"$set[bal2]\" format=\"*N\"/>").'<br/>';


echo "Satici:<br/>\n";
$option = "<select name=\"prod$ref\">|";
if($set["prod"] == 0){ 
$option .= "<option value=\"0\">Yandir</option>|";
$option .= "<option value=\"1\">Sondur</option>|";
} else {
$option .= "<option value=\"1\">Sondur</option>|";
$option .= "<option value=\"0\">Yandir</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

print $_v->submit('Yenile','action=save');

echo "<br/>\n";
break;

case 'updbots':
settype($reg, 'integer');
settype($computer, 'integer');
settype($komputer, 'integer');
settype($vict, 'integer');
settype($prod, 'integer');
settype($victint, 'integer');
settype($post1, 'integer');
settype($bal1, 'integer');
settype($post2, 'integer');
settype($bal2, 'integer');

if (!isset($error)) {
$result = mysql_query ("Select * setting where klu4 = 1");
if (mysql_affected_rows() == 0) {
$error = "database error...";
} else {
mysql_query ("Update setting set reg='".$reg."', computer='".$computer."', komputer='".$komputer."', vict='".$vict."',  prod='".$prod."', victint='".$victint."', bal1='".$bal1."', posts1='".$post1."', bal2='".$bal2."', posts2='".$post2."' where klu4 =1");

$msg = "Botlara d&#252;zeli&#351; edildi.";

}
} else {
$error = " ".mysql_error()." ";
}
if (isset($error)) {

echo "$error\n";

}

echo "<b>$msg</b><br/>\n";

break;



case 'qeydiyyat':
if($p_arr['8']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$adamlar = @mysql_query ("SELECT * FROM `conf` where `acar` = '1';");
$set = mysql_fetch_array ($adamlar);

echo "<b>&#199;at&#305;n Qur&#287;ular&#305;</b><br/>\n";
echo $divide;
echo "Q&#305;z:<br/>\n";

$_v->action("admin.php?id=$id&amp;ps=$ps&amp;go=upqeyd&amp;ref=$ref");

print $_v->input("<input size=\"9\" name=\"qadin$ref\" maxlength=\"9\" value=\"$set[qadin]\"/>").'<br/>';


echo "Ki&#351;i:<br/>\n";

echo "<br/>\n";
print $_v->input("<input size=\"9\" name=\"kisi$ref\" maxlength=\"9\" value=\"$set[kisi]\"/>").'<br/>';

echo "Yeni User:<br/>\n";
print $_v->input("<input name=\"son$ref\" maxlength=\"9\" value=\"$set[son]\"/>").'<br/>';
print $_v->submit('Yadda Saxla','action=save');
echo "<br/>\n";
break;

case 'upqeyd':
if($p_arr['8']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$qadin = trim(" $qadin ");
$kisi = trim(" $kisi ");
if (!isset($error)) {
$result = mysql_query ("Select * `conf` where `acar` = 1");
if (mysql_affected_rows() == 0) {
$error = "Baza ile elaqe kesildi...";
} else {
mysql_query ("Update `conf` set `qadin`='".$qadin."', `kisi`='".$kisi."', `son`='".$son."' where `acar`='1';");

$msg = "Qeydiyyat say&#305; deyi&#351;dirildi!";

}
} else {
$error = " ".mysql_error()." ";
}
if (isset($error)) {

echo $error."\n";

}

echo "<b>$msg</b><br/>\n";

break;



case 'editlevels':
if($p_arr['33']!=1){

echo 'Sizin buna huququnuz yoxdur.<br/>';

break;
}
$lev = mysql_query("select `level`,`name` from `levels`;");
if(empty($act)) {
while($arr=mysql_fetch_array($lev)) {

echo "<a href=\"admin.php?act=rnm&amp;id=$id&amp;ps=$ps&amp;go=editlevels&amp;level=".$arr['level']."\">".$arr['level'].". ".$arr['name']."</a><br/>";

}
} elseif ($act=="dornm") {
$levelname = mysql_escape_string($levelname);
settype($level, 'integer');
mysql_query ("update `levels` set `name`='".$levelname."' where `level`='".$level."';");

echo "R&#252;tbenin Ad&#305; deyi&#351;dirildi!<br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels\">R&#252;tbenin Adlar&#305;</a><br/>";

} else {
$lev = mysql_query("select `name` from `levels` where `level`='$level';");
$arr=mysql_fetch_array($lev);
$name=$arr["name"];
$_v->action("admin.php?act=dornm&amp;id=$id&amp;ps=$ps&amp;go=editlevels&amp;level=$level");

echo "R&#252;tbenin Ad&#305;:<br/>\n";
print $_v->input("<input name=\"levelname\" maxlength=\"200\" value=\"$name\" title=\"levelname\"/>").'<br/>';

print $_v->submit('Yenile','action=save');


echo "<br/>\n";

echo $divide;
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;go=editlevels\">R&#252;tbenin Adlar&#305;</a><br/>";

}
break;


}



$_v->divide();

if($fun)print "<a href=\"admin.php?go=extra&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Extra Panel</a><br/>";

if($go) {
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
}

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();

///////////////////////////////

?>