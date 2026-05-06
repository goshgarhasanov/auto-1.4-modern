<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


if($p_arr['3']!=1){
header ("Location: enter.php?id=$id&ps=$ps&ref=$ref");
exit;
}
if(!file_exists("file/select/".$id.".reg")){
$save_new=fopen("file/select/".$id.".reg","w");
chmod(addslashes("file/select/".$id.".reg"), 0666);


$qeyd_new = $newtm."\n";
$qeyd_new .= "0\n";
fputs($save_new,$qeyd_new);
fclose($save_new);
$keygens = '0';
}else{
$keys = file("file/select/".$id.".reg");
$srok = trim($keys[0]);
$keygens = trim($keys[1]);
}


$_SERVER['REQUEST_URI']=str_ireplace("&","&amp;",$_SERVER['REQUEST_URI']);

if($srok<$SERVER_TIME){
if(!isset($_POST['keygen']))
{
;
$_v->title('G&#252;venlik &#351;ifresi','left');
$_v->fsize1($fsize1);

echo "G&#252;venlik &#351;ifresi: <br/>\n";
$_v->action("".$_SERVER['REQUEST_URI']."");
print $_v->input("<input name=\"acar$ref\" title=\"G&#252;venlik &#351;ifresi\" format=\"*N\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Daxil ol','keygen=key');
if($_v->ver!='wml') {
echo "<br/>";
}
$_v->divide();
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
else
{
$acar = trim(" $acar ");
if($keygens!=$acar){
$_v->title('&#350;ifre yanl&#305;&#351;d&#305;r','center');
$_v->fsize1($fsize1);
echo "<b>Daxil etdiyiniz &#351;ifre yanl&#305;&#351;d&#305;r...</b>\n";
print "<br/>****<br/>";
print "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}else{
$_v->title('Bal Panel','left');
$_v->fsize1($fsize1);
echo "Xo&#351; geldiz h&#246;rmetli <b>$row[user]</b>...\n";
print "<br/>****<br/>";

$newtm = $SERVER_TIME+500;
$save=fopen("file/select/$id.reg","w");
$qeyd .= "$newtm\n";
$qeyd .= "$acar\n";
fputs($save,$qeyd);
fclose($save);
$fi = fopen("file/control/20.dat", "a+");
$data = date("d-M-y [H:i]");
$lst = base64_encode("<b><u>".$row["user"]."</u></b> Bal Panele Daxil oldu. Vaxt&#305;: $data,<br/> Onun  ip: $REMOTE_ADDR, ve Softu: $HTTP_USER_AGENT<br/>-=-=-<br/>")."";
fwrite($fi, "$lst\n");
fflush($fi);
fclose($fi);
}
}
}else {
$_v->title('Bal Panel','left');
$_v->fsize1($fsize1);

if(($srok+150)<$SERVER_TIME){
$newtm = $SERVER_TIME+500;
$save=fopen("file/select/$id.reg","w");
$qeyd .= "$newtm\n";
$qeyd .= "$keygens";
fputs($save,$qeyd);
fclose($save);
}
}

$user=$row["user"];
if(!isset($_POST['action']))
{
switch($bolme) {

default:

echo "<b>Bal Paneli</b><br/>----<br/>\n";
if($p_arr['70']==1 or $p_arr['71']==1){
echo "Leqeb / &#304;D: <br/>\n";
$_v->action("bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"nick$ref\" title=\"Leqeb\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Melumat&#305; A&#231;','action=tap');

if($_v->ver!='wml') {
echo "<br/>";
}
if($p_arr['72']==1 or $p_arr['73']==1 or $p_arr['75']==1 or $p_arr['77']==1 or $p_arr['79']==1 or $p_arr['80']==1)
$_v->divide();
}
if($p_arr['72']==1)
print "<a href=\"bal_add.php?bolme=qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Qiymetleri</a><br/>";
if($p_arr['73']==1)
print "<a href=\"bal_add.php?bolme=nezaret&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nezaret Paneli</a><br/>";
if($p_arr['75']==1)
print "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
if($p_arr['77']==1)
print "<a href=\"renglinik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli nik Panel</a><br/>\n";
if($p_arr['79']==1)
print "<a href=\"bal_add.php?bolme=kont&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme qiymetleri</a><br/>\n";
if($p_arr['80']==1)
print "<a href=\"bal_add.php?bolme=kod&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Panelin &#351;ifresi</a><br/>\n";


break;


case 'kont':
if(!isset($_POST['nihadniko'])){
	$nn=file("file/bal_bot/down.dat");
	$man1 = trim($nn[0]);
	$bal1 = trim($nn[1]);
	$man2 = trim($nn[2]);
	$bal2 = trim($nn[3]);
	$man3 = trim($nn[4]);
	$bal3 = trim($nn[5]);
	$man4 = trim($nn[6]);
	$bal4 = trim($nn[7]);
	$man5 = trim($nn[8]);
	$bal5 = trim($nn[9]);
	$man6 = trim($nn[10]);
	$bal6 = trim($nn[11]);

	$_v->action("bal_add.php?bolme=kont&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
	echo "<u>Bal Y&#252;kleme qiymetleri.</u><br/>\n";
	echo $divide;
	print $_v->input("<input size =\"2\" name=\"man1$ref\" value=\"$man1\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal1$ref\" value=\"$bal1\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 

	print $_v->input("<input size =\"2\" name=\"man2$ref\" value=\"$man2\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal2$ref\" value=\"$bal2\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 

	print $_v->input("<input size =\"2\" name=\"man3$ref\" value=\"$man3\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal3$ref\" value=\"$bal3\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 

	print $_v->input("<input size =\"2\" name=\"man4$ref\" value=\"$man4\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal4$ref\" value=\"$bal4\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 
	
	
	print $_v->input("<input size =\"2\" name=\"man5$ref\" value=\"$man5\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal5$ref\" value=\"$bal5\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 


	print $_v->input("<input size =\"2\" name=\"man6$ref\" value=\"$man6\" format=\"*N\"/>",$ref);
	echo " manat - ";
	print $_v->input("<input size =\"5\" name=\"bal6$ref\" value=\"$bal6\" format=\"*N\"/>",$ref);
	echo " bal<br/>\n"; 

	print $_v->submit('Yenile','nihadniko=true');

}else{
	foreach($_POST As $_key => $_val)
	{
		$_POST[$_key] = intval($_val);
	}
	echo "<u>Bal Y&#252;kleme qiymetleri yenilendi</u><br/>\n";
 	$save= fopen("file/bal_bot/down.dat", "w"); 
	$qeyd = $man1."\n".$_POST['bal1']."\n".$_POST['man2']."\n".$_POST['bal2']."\n".$_POST['man3']."\n".$_POST['bal3']."\n".$_POST['man4']."\n".$_POST['bal4']."\n".$_POST['man5']."\n".$_POST['bal5']."\n".$_POST['man6']."\n".$_POST['bal6'];
	fwrite($save, "$qeyd");
	fflush($save);
	fclose($save);

}



break;

case 'bank':
if($p_arr['75']!=1){

echo 'Sizin buna hüququnuz yoxdur.<br/>';

break;
}

echo "<i>Bank B&#246;lmesi.</i><br/>";
echo $divide;

$qaliq = @mysql_query ("Select COUNT(`bal`) from `users` where `bal`!='0';");
$baliolanlar = mysql_fetch_array ($qaliq);

$hesab = @mysql_query ("Select `xerc` from `setting` where `klu4` = '1';");
$cc = mysql_fetch_array ($hesab);
$bank=$cc["xerc"];


echo "<b>Bank > </b>Bank Sistemine xo&#351; geldiz!<br/>****<br/>\n";
echo "<b>$baliolanlar[0]</b>. neferin hesab&#305;nda bal var. <br/>\n";
echo "<b>$bank</b>. Bal Xerclenib. <br/>\n";
$_v->action("bal_add.php?bolme=okey&amp;id=$id&amp;ps=$ps");
print $_v->input("<input name=\"bank$ref\" value=\"$bank\" format=\"*N\" title=\"bank\"/>").'<br/>';
print $_v->submit('Yenile');
$_v->divide('wml');
echo "<u>Hal-haz&#305;rda Bal Sisteminden istifade edenler.</u><br/>****<br/>\n";


$rutbe = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='3';");
$rutbe = mysql_fetch_array ($rutbe);
echo "R&#252;tbeliler: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=rutbe&amp;ref=$ref\">$rutbe[0]</a></b><br/>\n";

$gorun = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='2';");
$gorun = mysql_fetch_array ($gorun);
echo "G&#246;r&#252;nmez: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=gorun&amp;ref=$ref\">$gorun[0]</a></b><br/>\n";


$tox = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='4';");
$tox = mysql_fetch_array ($tox);
echo "Toxunulmaz: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=tox&amp;ref=$ref\">$tox[0]</a></b><br/>\n";

$reng = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='5';");
$reng = mysql_fetch_array ($reng);
echo "Rengli Yazanlar: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=reng&amp;ref=$ref\">$reng[0]</a></b><br/>\n";

$mexvi = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='6';");
$mexvi = mysql_fetch_array ($mexvi);
echo "Tam Mexvi: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=mexvi&amp;ref=$ref\">$mexvi[0]</a></b><br/>\n";

$antiiqnor = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='7';");
$antiiqnor = mysql_fetch_array ($antiiqnor);
echo "Anti &#304;qnor: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=antiignor&amp;ref=$ref\">$antiiqnor[0]</a></b><br/>\n";

$golduser = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='8';");
$golduser = mysql_fetch_array ($golduser);
echo "Gold User: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=golduser&amp;ref=$ref\">$golduser[0]</a></b><br/>\n";


$nikduzelt = @mysql_query ("Select COUNT(`id`) from `hesab` where `x`='9';");
$nikduzelt = mysql_fetch_array ($nikduzelt);
echo "Rengli nik d&#252;zeldenler: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=cnik&amp;ref=$ref\">$nikduzelt[0]</a></b><br/>\n";
echo $divide;

echo "<u>Admin Panelden</u><br/>****<br/>\n";
$gorunmez = @mysql_query ("Select COUNT(*) from users where inv='1';");
$gorunmez = mysql_fetch_array ($gorunmez);
echo "G&#246;r&#252;nmez (panel): <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=gorunme&amp;ref=$ref\">$gorunmez[0]</a></b><br/>\n";

$gorunmez_tam = @mysql_query ("Select COUNT(*) from users where inv='3';");
$gorunmez_tam = mysql_fetch_array ($gorunmez_tam);
echo "Tam G&#246;r&#252;nmez (panel): <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=gorunmez&amp;ref=$ref\">$gorunmez_tam[0]</a></b><br/>\n";


$tox_p = @mysql_query ("Select COUNT(*) from users where tox!='0';");
$tox_p = mysql_fetch_array ($tox_p);
echo "Toxunulmaz: <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=tox_p&amp;ref=$ref\">$tox_p[0]</a></b><br/>\n";

$reng_p = @mysql_query ("Select COUNT(*) from users where shrift!='';");
$reng_p = mysql_fetch_array ($reng_p);
echo "Rengli Yazanlar (panel): <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=reng_p&amp;ref=$ref\">$reng_p[0]</a></b><br/>\n";

$mexvi_p = @mysql_query ("Select COUNT(*) from users where mexvi!='0';");
$mexvi_p = mysql_fetch_array ($mexvi_p);
echo "Tam Mexvi (panel): <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=mexvi_p&amp;ref=$ref\">$mexvi_p[0]</a></b><br/>\n";



$gizlilik = @mysql_query ("Select COUNT(*) from users where gizlilik='2';");
$gizlilik = mysql_fetch_array ($gizlilik);
echo "&#350;exsini g&#246;renler: (panel) <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=gizlilik&amp;ref=$ref\">$gizlilik[0]</a></b><br/>\n";

$del_msg = @mysql_query ("Select COUNT(*) from users where delmsg!='0';");
$del_msg = mysql_fetch_array ($del_msg);
echo "Yaz&#305;n&#305; silenler: (otaq) <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=delmsg&amp;ref=$ref\">$del_msg[0]</a></b><br/>\n";

$znak = @mysql_query ("Select COUNT(*) from users where zn!='';");
$znak = mysql_fetch_array ($znak);
echo "Znak&#305; olanlar: (panel) <b><a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;bolme=znak&amp;ref=$ref\">$znak[0]</a></b><br/>\n";


break;



case 'okey':
mysql_query("UPDATE setting SET xerc = '".$bank."' where klu4 = '1'");
echo "<b>Melumat yenilendi</b><br/>";
break;

case 'alximik':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='1';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='1' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Alximik</b>,  yoxdur...</i><br/>\n";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} else {
echo "<u>Alximikler</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix) ";
if($p_arr['76']==1)echo "[<a href=\"bal_add.php?bolme=alximik&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=alximik&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=alximik&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Tam Mexviliyi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/13.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Alximiqliyini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("delete from `hesab` where usid='".$x."' and x = '1' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=alximik&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;








case 'gorun':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='2';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='2' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>G&#246;r&#252;nmez</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>G&#246;r&#252;nmezler</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix) ";
if($p_arr['76']==1)echo "[<a href=\"bal_add.php?bolme=gorun&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=gorun&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=gorun&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>G&#246;r&#252;nmezlik</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/7.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin G&#246;r&#252;nmezliyini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("delete from `hesab` where usid='".$x."' and x = '2' limit 1;");
mysql_query("UPDATE users SET inv = '0' where id = '$x'");

echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=gorun&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;



case 'gorunme':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `inv`='1';");
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

$q = mysql_query("select id,user from users where `inv`='1' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>G&#246;r&#252;nmez</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Tam G&#246;r&#252;nmezler</u> (panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=gorunme&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=gorunme&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=gorunme&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>G&#246;r&#252;nmezlik</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET inv = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=gorunme&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;


case 'gorunmez':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `inv`='3';");
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

$q = mysql_query("select id,user from users where `inv`='3' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Tam G&#246;r&#252;nmez</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Tam G&#246;r&#252;nmezler</u> (panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=gorunmez&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=gorunmez&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=gorunmez&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Tam G&#246;r&#252;nmezlik</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET inv = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=gorunmez&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;



case 'gizlilik':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `gizlilik`='2';");
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

$q = mysql_query("select id,user from users where `gizlilik`='2' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>&#350;exsini g&#246;ren</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>&#350;exsini g&#246;renler</u> (panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=gizlilik&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=gizlilik&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=gizlilik&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";


} elseif($x!="" and $p_arr['76']==1){

echo "<b>&#350;exsini g&#246;rmeyi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET gizlilik = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=gizlilik&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;




case 'tox_p':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `tox`!='0';");
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

$q = mysql_query("select id,user from users where `tox`!='0' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Toxunulmaz</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Toxunulmazl&#305;q (panel)</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=tox_p&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=tox_p&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=tox_p&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";


} elseif($x!="" and $p_arr['76']==1){

echo "<b>Toxunulmazl&#305;q&#305;</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET tox = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=tox_p&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;







case 'reng_p':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `shrift`!='';");
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

$q = mysql_query("select id,user from users where `shrift`!='' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Rengli yazan</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Rengli yazanlar (panel)</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - <a href=\"bal_add.php?bolme=reng_p&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=reng_p&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=reng_p&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Rengli yaz&#305;s&#305;</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET shrift = '' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=reng_p&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;










case 'mexvi_p':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `mexvi`!='0';");
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

$q = mysql_query("select id,user from users where `mexvi`!='0' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Tam Mexvi</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Tam Mexvi Olanlar</u> (Panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=mexvi_p&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=mexvi_p&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=mexvi_p&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Tam Mexviliyi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET tox = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=mexvi_p&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;




case 'delmsg':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `delmsg`!='0';");
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

$q = mysql_query("select id,user from users where `delmsg`!='0' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Yaz&#305; silen</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Yaz&#305; silenler</u> (Panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];

echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=delmsg&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=delmsg&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=delmsg&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Yaz&#305; silmeyi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET delmsg = '0' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=delmsg&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;






case 'znak':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from users where `zn`!='';");
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

$q = mysql_query("select id,user,zn from users where `zn`!='' order by id desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Znak&#305; olan</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Znak&#305; olanlar</u> (Panel): (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['user'];
$usid = $arr['id'];
$zn = $arr['zn'];
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
echo "<b>$i</b>. $zn<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a>";
if($p_arr['76']==1)echo " - [<a href=\"bal_add.php?bolme=znak&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=znak&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=znak&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Znak&#305;</b> - <u>Le&#287;v Edildi!</u><br/>\n";
mysql_query("UPDATE users SET zn = '' where id = '$x'");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=znak&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;




case 'rutbe':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='3';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='3' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>R&#252;tbeli</b>,  &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>R&#252;tbeliler</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=rutbe&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=rutbe&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=rutbe&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} elseif($x!="" and $p_arr['76']==1){

echo "<b>R&#252;tbesi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/6.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin R&#252;tbesini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("delete from `hesab` where usid='".$x."' and x = '3' limit 1;");
mysql_query("UPDATE users SET level = '0' where id = '$x'");

echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=rutbe&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;



case 'tox':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='4';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='4' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Toxunulmazl&#305;&#287;&#305;</b>,  olan istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Toxunulmaz Olanlar</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=tox&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Toxunulmazl&#305;&#287;&#305;</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/9.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Toxunulmazl&#305;&#287;&#305;n&#305; Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("UPDATE users SET tox = '0' where id = '$x'");
mysql_query("delete from `hesab` where usid='".$x."' and x = '4' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=tox&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;


case 'reng':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='5';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='5' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Rengli Yaz&#305;s&#305;</b>,  olan istifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Rengli Yazanlar</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=reng&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=reng&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=reng&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";

} elseif($x!="" and $p_arr['76']==1){

echo "<b>Rengli Yaz&#305;s&#305;</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/10.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Rengli Yaz&#305;s&#305;n&#305; Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("UPDATE users SET yazi = '' where id = '$x'");
mysql_query("delete from `hesab` where usid='".$x."' and x = '5' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=reng&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;










case 'mexvi':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='6';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='6' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Tam Mexvi</b>,  olan istifade&#231;i yoxdur...</i><br/>\n";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} else {
echo "<u>Tam Mexvi Olanlar</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=mexvi&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
} elseif($x!="" and $p_arr['76']==1){

echo "<b>Tam Mexviliyi</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/13.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Tam Mexviliyini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);
mysql_query("UPDATE users SET mexvi = '0' where id = '$x'");
mysql_query("delete from `hesab` where usid='".$x."' and x = '6' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=mexvi&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;





case 'antiignor':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='7';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='7' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Anti &#304;qnor</b>, Sisteminden istifade eden yoxdur...</i><br/>\n";
} else {
echo "<u>Anti &#304;qnor</u>  Olanlar: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=antiignor&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=antiignor&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=antiignor&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} elseif($x!="" and $p_arr['76']==1){

echo "<b>Anti &#304;qnorlu&#287;u</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/16.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Anti &#304;qnorluqunu Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);

mysql_query("delete from `hesab` where usid='".$x."' and x = '7' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=antiignor&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;


case 'golduser':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='8';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='8' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Gold User</b>, &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Gold User</u> Olanla: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt ($tarix)";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=golduser&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=golduser&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=golduser&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} elseif($x!="" and $p_arr['76']==1){

echo "<b>Gold User</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/17.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Gold Userliyini Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, "$qeyd");
fflush($save);
fclose($save);

mysql_query("delete from `hesab` where usid='".$x."' and x = '8' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=golduser&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;



case 'cnik':
if(empty($x)) {
$query = mysql_query("select COUNT(id) from hesab where `x`='9';");
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

$q = mysql_query("select id,leqeb,usid,tarix,saat from hesab where `x`='9' order by saat desc limit $o,$do;");

if (mysql_affected_rows() == 0) {
echo "<i><b>Rengli nik d&#252;zelden</b>, &#304;stifade&#231;i yoxdur...</i><br/>\n";
} else {
echo "<u>Rengli nik d&#252;zeldenler</u>: (<b>$all</b>)<br/>----<br/>";
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($q);
$leqeb = $arr['leqeb'];
$usid = $arr['usid'];
$tarix = $arr['tarix'];
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
echo "<b>$i</b>. <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">$leqeb</a> - (<b>$saat</b>) $vaxt";
if($p_arr['76']==1)echo " [<a href=\"bal_add.php?bolme=cnik&amp;id=$id&amp;ps=$ps&amp;x=$usid&amp;s=$s&amp;ref=$ref\">x</a>]";
echo "<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bal_add.php?bolme=cnik&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
}
$test = round($all, 1)/10;


if ($s < $test) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$all)$do=$all;
echo " |  <a href=\"bal_add.php?bolme=cnik&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if($all>10)echo "<br/>";
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=bank&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bank B&#246;lmesi</a><br/>";
} elseif($x!="" and $p_arr['76']==1){
@unlink ("i/".$x.".gif");


echo "<b>Rengli niki</b> - <u>Le&#287;v Edildi!</u><br/>\n";
$data = date("d.m.y [H:i]",$SERVER_TIME); 
$save= fopen("file/bal_bot/18.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user: - ID=$x Olan istifade&#231;inin Rengli nik d&#252;zeltme h&#252;ququnu Le&#287;v Etdi</b> -  Tarix: $data")."\n";
fwrite($save, $qeyd);
fflush($save);
fclose($save);

mysql_query("delete from `hesab` where usid='".$x."' and x = '9' limit 1;");
echo "----<br/>";
echo "<a href=\"bal_add.php?bolme=cnik&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>";
}

break;







case 'kod':
if($p_arr['80']!=1)
{

echo 'Sizin buna hüququnuz yoxdur.<br/>';

break;
}
if(!isset($_POST['kod']))
{
$_v->action("bal_add.php?bolme=kod&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Bal Panelinin &#351;ifresinin deyi&#351;dirilmesi<br/>";
echo $divide;

echo "Hal-haz&#305;rk&#305; &#351;ifre<br/>";
print $_v->input("<input  size=\"10\" type=\"password\" name=\"kkod$ref\" title=\"Hal-haz&#305;rk&#305; &#351;ifre\"  emptyok=\"false\" maxlength=\"20\"/>").'<br/>';

echo "Yeni &#351;ifre<br/>";
print $_v->input("<input  size=\"10\" type=\"password\" name=\"ykod$ref\" title=\"Yeni &#351;ifre\"  emptyok=\"false\" maxlength=\"20\"/>").'<br/>';

echo "Yeni &#351;ifre (tekrar)<br/>";
print $_v->input("<input  size=\"10\" type=\"password\" name=\"yykod$ref\" title=\"Yeni &#351;ifre (tekrar)\"  emptyok=\"false\" maxlength=\"20\"/>").'<br/>';

echo $divide;
print $_v->submit('Yenile','kod=45');
if($_v->ver!='wml') {
echo "<br/>";
}
}else{
$nn=file("file/select/$id.reg");
$nkod = trim($nn[1]);

if($kkod!=$nkod){

echo "Hal-haz&#305;rk&#305; &#351;ifrenizi d&#252;g&#252;n deyil.<br/>";
echo $divide;
print "<a href=\"bal_add.php?bolme=kod&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
}

if(preg_match("/[^0-9]+/",$ykod)){

echo "&#350;ifreniz yaln&#305;z reqemlerden ibraret olmal&#305;d&#305;r.<br/>";
echo $divide;
print "<a href=\"bal_add.php?bolme=kod&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
}

if($ykod!=$yykod){

echo "Yeni  &#351;ifrenizi d&#252;g&#252;n deyil.<br/>";
echo $divide;
print "<a href=\"bal_add.php?bolme=kod&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
}

$save=fopen("file/select/$id.reg","w");
$qeyd = "$newtm\n";
$qeyd .= "$yykod\n";
$qeyd .= "$license";
fputs($save,$qeyd);
fclose($save);

echo "Bal Panelinizin &#351;ifresi deyi&#351;ildi!<br/>";

}
break;


case 'nezaret':
if($p_arr['73']!=1)
{

echo 'Sizin buna hüququnuz yoxdur.<br/>';

break;
}
if(!isset($n)){

echo "<b>Nezaret Panel:</b><br/>----<br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tebrik / Elan</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Statusu deyi&#351;enler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Leqebini deyi&#351;enler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli nik Sifari&#351;</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal g&#246;nderenler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=6&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">R&#252;tbe alanlar</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=7&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">G&#246;runmez olanlar</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=8&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xaric Edenler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=9&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Toxunulmazl&#305;q</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=10&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli yaz&#305;</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=11&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Evlenenler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=12&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ban A&#231;anlar</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=13&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tam Mexvilik</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=14&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize &#350;ekil</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=15&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinqe ses verenler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=16&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Anti-Iqnor Sistemi</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=17&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Gold User</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=18&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rengli nik d&#252;zeldenler</a><br/>\n";
echo "&#xbb;<a href=\"bal_add.php?bolme=nezaret&amp;n=20&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Rehberliyin satd&#305;&#287;&#305; ballar</a><br/>\n";

}
else
{
//include("./file/fun/1");
//
if($n=="1"){
define("s_msg", "Tebrik-Elan yazanlar");
define("n_msg", "Tebrik-Elan yazanlar haqq&#305;nda melumat yoxdur..");
define("d_msg", "<b>Tebrik-Elan</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="2"){
define("s_msg", "Statusu deyi&#351;enler");
define("n_msg", "Statusunu deyi&#351;en olmay&#305;b..");
define("d_msg", "<b>Status</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="3"){
define("s_msg", "Leqebini deyi&#351;enler");
define("n_msg", "Leqebini deyi&#351;en olmay&#305;b..");
define("d_msg", "<b>Leqebini deyi&#351;enler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="4"){
define("s_msg", "Rengli nik sifari&#351; edenler");
define("n_msg", "Rengli nik sifari&#351; eden olmay&#305;b..");
define("d_msg", "<b>Rengli nik sifari&#351; edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="4"){
define("s_msg", "Rengli nik sifari&#351; edenler");
define("n_msg", "Rengli nik sifari&#351; eden olmay&#305;b..");
define("d_msg", "<b>Rengli nik sifari&#351; edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="5"){
define("s_msg", "Bal g&#246;nderenler");
define("n_msg", "Bal g&#246;nderen olmay&#305;b..");
define("d_msg", "<b>Bal g&#246;nderenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="6"){
define("s_msg", "R&#252;tbe alanlar");
define("n_msg", "Bal Xidmetinden R&#252;tbe alan olmay&#305;b..");
define("d_msg", "<b>R&#252;tbe alanlar</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="7"){
define("s_msg", "G&#246;r&#252;nmez olanlar");
define("n_msg", "Bal Xidmeti ile G&#246;r&#252;nmezlik alan olmay&#305;b..");
define("d_msg", "<b>G&#246;r&#252;nmez olanlar</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="8"){
define("s_msg", "Xaric Edenler");
define("n_msg", "Bal Xidmetinin k&#246;mekliyi ile he&#231;kes xaric edilmeyib..");
define("d_msg", "<b>Xaric Edenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="9"){
define("s_msg", "Toxunulmazl&#305;q");
define("n_msg", "Bu xidmetden istifade eden olmay&#305;b..");
define("d_msg", "<b>Toxunulmazl&#305;q</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="10"){
define("s_msg", "Rengli Yaz&#305;lar");
define("n_msg", "Rengli Yaz&#305; alan olmay&#305;b..");
define("d_msg", "<b>Rengli Yaz&#305;</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="11"){
define("s_msg", "Evlenenler Haqq&#305;nda");
define("n_msg", "He&#231;kes evlenmeyib..");
define("d_msg", "<b>Evlenenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="12"){
define("s_msg", "Ban A&#231;anlar");
define("n_msg", "Bu xidmetden istifade eden olmay&#305;b..");
define("d_msg", "<b>Ban A&#231;anlar</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="13"){
define("s_msg", "Tam Mexvilik");
define("n_msg", "Tam Mexvi olanlar haqq&#305;nda melumat yoxdur..");
define("d_msg", "<b>Tam Mexvilik</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="14"){
define("s_msg", "Dehlize &#350;ekil");
define("n_msg", "Dehlize &#350;ekil yerle&#351;diren olmay&#305;b..");
define("d_msg", "<b>Dehlize &#350;ekil yerle&#351;direnler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="15"){
define("s_msg", "Reytinqe ses verenler");
define("n_msg", "Reytinqe ses veren olmay&#305;b..");
define("d_msg", "<b>Reytinqe ses verenler</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="16"){
define("s_msg", "Anti-Iqnor Sistemi");
define("n_msg", "Anti-Iqnor Sisteminden istifade eden olmay&#305;b..");
define("d_msg", "<b>Anti-Iqnor</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="17"){
define("s_msg", "Gold User");
define("n_msg", "Gold User Sisteminden istifade eden olmay&#305;b..");
define("d_msg", "<b>Gold User</b>. haqq&#305;nda melumatlar silindi!");
}elseif($n=="18"){
define("s_msg", "Rengli nik d&#252;zeldenler");
define("n_msg", "Rengli nik d&#252;zelden olmay&#305;b..");
define("d_msg", "<b>Rengli nik d&#252;zeldenler</b>. haqq&#305;nda melumatlar silindi!");

}elseif($n=="20"){
define("s_msg", "Rehberliyin satd&#305;&#287;&#305; ballar");
define("n_msg", "Rehberlik he&#231;kese bal satmay&#305;b..");
define("d_msg", "<b>Rehberliyin satd&#305;&#287;&#305; ballar</b>. haqq&#305;nda melumatlar silindi!");
}
//
if(preg_match("/[^0-9]+/",$n)){

echo "Guya indi sen a&#287;&#305;ll&#305;sanda he?:)<br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;}

if((!file_exists("file/bal_bot/$n.dat"))or($n=="0")){

echo "Fayl tap&#305;lmad&#305;...<br/>\n";

break;
}

if($p_arr['74']!=1 and $fl!=''){

echo "Silmek hüququnuz yoxdur.<br/>\n";

break;
}

if($fl=="x"){
$fp=fopen("file/bal_bot/$n.dat", "w");
fclose($fp);

echo "".d_msg."<br/>\n";

break;
}
elseif(isset($fl))
{
$file=file("file/bal_bot/$n.dat");	
$fp=fopen("file/bal_bot/$n.dat","w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$fl) {$silinen = "$file[$i]"; unset($file[$i]);} }
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);

echo "<b>silindi</b>!<br/>****<br/>";
echo "<a href=\"bal_add.php?bolme=nezaret&amp;n=$n&amp;m=$m&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

break;
}


echo "<b>".s_msg.":</b>\n";
if($p_arr['74']==1)echo "<a href=\"bal_add.php?bolme=nezaret&amp;n=$n&amp;fl=x&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">xXx</a>";
echo "<br/>****<br/>\n";

$file = file("file/bal_bot/$n.dat");
$total = count($file);    

$m = (int)$_GET['m'];
if($m < 0 || $m > $total){$m = 0;}
if ($total < $m + 10){ $end = $total; }
else {$end = $m + 10; }
for ($i = $m; $i < $end; $i++){

$file = file("file/bal_bot/$n.dat");
$file = array_reverse($file);
$i2=round($i+1);
$num=$total-$i-1;
echo $i2." ".base64_decode($file[$i]);
if($p_arr['74']==1)echo "[<a href=\"bal_add.php?bolme=nezaret&amp;n=$n&amp;m=$m&amp;id=$id&amp;ps=$ps&amp;fl=$num&amp;ref=$ref\">x</a>]";
echo "<br/>";
}
if($total<1){echo "<u>".n_msg.".</u><br/>";}
if ($m != 0) {echo "<a href=\"bal_add.php?bolme=nezaret&amp;m=".($m - 10)."&amp;n=$n&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&lt;&lt;&lt;- </a> ";}
if (($total > $m + 10)&&($m != 0))echo'|'; 
if ($total > $m + 10) {echo " <a href=\"bal_add.php?bolme=nezaret&amp;m=".($m + 10)."&amp;n=$n&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"> -&gt;&gt;&gt;</a>";}
if (($total > $m + 10)or($m != 0))echo "<br/>\n";




}
break;

case 'qiymet':
if($p_arr['72']!=1)
{

echo 'Sizin buna hüququnuz yoxdur.<br/>';

break;
}
if(!isset($_POST['niko']))
{
$bal=file("file/bal_bot/0.dat");
$bot_a = trim($bal[0]);
$bot_u = trim($bal[1]);
$r_nik_1 = trim($bal[2]);
$r_nik_2 = trim($bal[3]);
$send_bal = trim($bal[4]);
$leqeb_d = trim($bal[5]);
$status_d = trim($bal[6]);
$vip_al = trim($bal[7]);
$killer_al = trim($bal[8]);
$gorunmez_al = trim($bal[9]);
$t_elan = trim($bal[10]);
$tox_b = trim($bal[11]);
$r_yazi = trim($bal[12]);
$aile_b = trim($bal[13]);
$b_ban = trim($bal[14]);
$b_mex = trim($bal[15]);
$b_img = trim($bal[16]);
$qefes = trim($bal[17]);
$reytinq = trim($bal[18]);
$t_bax = trim($bal[19]);
$t_q_blet = trim($bal[20]);
$antiiqnor = trim($bal[21]);
$deling = trim($bal[22]);
$golduser = trim($bal[23]);
$nikduzelt = trim($bal[24]);


$_v->action("bal_add.php?bolme=qiymet&amp;id=$id&amp;ps=$ps&amp;ref=$ref");


echo "<b>Bal Xidmetlerinin Qiymetleri.</b><br/>";
echo $divide;
echo "<i>Her hans&#305; xidmeti deaktivle&#351;dirmek &#252;&#231;&#252;n qiymet yerine</i> <b>x</b> <i>yaz&#305;n</i><br/>\n";
echo $divide;

echo "Melumat&#231;&#305; Admin:\n";
print $_v->input("<input  size=\"10\" name=\"bot_a$ref\" title=\"Melumat&#231;&#305;n&#305;n ad&#305;\"  emptyok=\"false\" maxlength=\"20\" value=\"$bot_a\"/>").'<br/>';

echo "Melumat&#231;&#305; User=:\n";
print $_v->input("<input  size=\"10\" name=\"bot_u$ref\" title=\"Melumat&#231;&#305;n&#305;n ad&#305;\"  emptyok=\"false\" maxlength=\"20\" value=\"$bot_u\"/>").'<br/>';


echo $divide;

echo "Rengli nik hereketsiz:=\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"r_nik_1$ref\" title=\"Rengli nik hereketsiz\"  emptyok=\"false\" maxlength=\"10\" value=\"$r_nik_1\"/>").'<br/>';


echo "Rengli nik hereketli:=\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"r_nik_2$ref\" title=\"Rengli nik hereketli\"  emptyok=\"false\" maxlength=\"10\" value=\"$r_nik_2\"/>").'<br/>';
echo "Bal g&#246;ndermek %-ile:=\n";
print $_v->input("<input size=\"6\" name=\"send_bal$ref\" title=\"Bal g&#246;ndermek %-ile\"  emptyok=\"false\" maxlength=\"2\" value=\"$send_bal\"/>").'<br/>';

echo "Leqebi  deyi&#351;dirmek : =\n";
print $_v->input("<input size=\"6\" name=\"leqeb_d$ref\" title=\"Leqebi  deyi&#351;dirmek\"  emptyok=\"false\" maxlength=\"10\" value=\"$leqeb_d\"/>").'<br/>';

echo "Statusu deyi&#351;dirmek: =\n";
print $_v->input("<input size=\"6\" name=\"status_d$ref\" title=\"Statusu deyi&#351;dirmek\"  emptyok=\"false\" maxlength=\"10\" value=\"$status_d\"/>").'<br/>';

$levelselect = @mysql_query ("Select name from levels where level='4'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];

echo "$levname r&#252;tbesi 1 ayl&#305;q: =\n";
print $_v->input("<input size=\"6\" name=\"vip_al$ref\" title=\"$levname r&#252;tbesi 1 ayl&#305;q\"  emptyok=\"false\" maxlength=\"10\" value=\"$vip_al\"/>").'<br/>';


$levelselect = @mysql_query ("Select name from levels where level='5'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];

echo "$levname r&#252;tbesi 1 ayl&#305;q: =\n";

print $_v->input("<input size=\"6\" name=\"killer_al$ref\" title=\"$levname r&#252;tbesi 1 ayl&#305;q\"  emptyok=\"false\" maxlength=\"10\" value=\"$killer_al\"/>").'<br/>';

echo "G&#246;r&#252;nmez olmaq:=\n";

print $_v->input("<input size=\"6\" name=\"gorunmez_al$ref\" title=\"G&#246;r&#252;nmez olmaq\"  emptyok=\"false\" maxlength=\"10\" value=\"$gorunmez_al\"/>").'<br/>';


echo "Tebrik-Elan:\n";

print $_v->input("<input size=\"6\" name=\"t_elan$ref\" title=\"Tebrik-Elan\"  emptyok=\"false\" maxlength=\"10\" value=\"$t_elan\"/>").'<br/>';


echo "Toxunulmazl&#305;q:\n";
print $_v->input("<input size=\"6\" name=\"tox_b$ref\" title=\"Toxunulmazl&#305;q\"  emptyok=\"false\" maxlength=\"10\" value=\"$tox_b\"/>").'<br/>';

echo "Rengli Yaz&#305;:\n";
print $_v->input("<input size=\"6\" name=\"r_yazi$ref\" title=\"Rengli Yaz&#305;\"  emptyok=\"false\" maxlength=\"10\" value=\"$r_yazi\"/>").'<br/>';



echo "&#199;atdan Evlenmek:\n";
print $_v->input("<input size=\"6\" name=\"aile_b$ref\" title=\"&#199;atdan Evlenmek\"  emptyok=\"false\" maxlength=\"10\" value=\"$aile_b\"/>").'<br/>';

echo "Ban&#305;a&#231;maq:\n";

print $_v->input("<input size=\"6\" name=\"b_ban$ref\" title=\"Ban&#305;a&#231;maq\"  emptyok=\"false\" maxlength=\"10\" value=\"$b_ban\"/>").'<br/>';


echo "Tam Mexvilik:\n";
print $_v->input("<input size=\"6\" name=\"b_mex$ref\" title=\"Tam Mexvilik\"  emptyok=\"false\" maxlength=\"10\" value=\"$b_mex\"/>").'<br/>';

echo "Dehlize &#351;ekil:\n";
print $_v->input("<input size=\"6\" name=\"b_img$ref\" title=\"b_img\"  emptyok=\"false\" maxlength=\"10\" value=\"$b_img\"/>").'<br/>';

echo "Qefesde ses:\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"qefes$ref\" title=\"qefes ses\"  emptyok=\"false\" maxlength=\"10\" value=\"$qefes\"/>").'<br/>';
echo "Reytinq ses:\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"reytinq$ref\" title=\"reytinq ses\"  emptyok=\"false\" maxlength=\"10\" value=\"$reytinq\"/>").'<br/>';
echo "Tel modeline baxmaq:\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"t_bax$ref\" title=\"Telefon modeline baxmaq\"  emptyok=\"false\" maxlength=\"10\" value=\"$t_bax\"/>").'<br/>';
echo "Qefese bilet:\n";
print $_v->input("<input size=\"6\" format=\"*N\" name=\"t_q_blet$ref\"  emptyok=\"false\" maxlength=\"10\" value=\"$t_q_blet\"/>").'<br/>';
echo "Anti-&#304;qnor:\n";
print $_v->input("<input size=\"6\" name=\"antii$ref\"  emptyok=\"false\" maxlength=\"10\" value=\"$antiiqnor\"/>").'<br/>';
echo "Herkesi &#304;qnordan &#231;&#305;xartmaq:\n";
print $_v->input("<input size=\"6\" name=\"deling$ref\"  emptyok=\"false\" maxlength=\"10\" value=\"$deling\"/>").'<br/>';
echo "Gold User:\n";
print $_v->input("<input size=\"6\" name=\"golduser$ref\"  emptyok=\"false\" maxlength=\"10\" value=\"$golduser\"/>").'<br/>';
echo "Rengli Nik D&#252;zelt:\n";
print $_v->input("<input size=\"6\" name=\"nikduzelt$ref\"  emptyok=\"false\" maxlength=\"10\" value=\"$nikduzelt\"/>").'<br/>';
echo $divide;
print $_v->submit('Yenile','niko=ok');
if($_v->ver!='wml') {
echo "<br/>";
}
}
else
{

$save=fopen('file/bal_bot/0.dat','w');
$qeyd = "$bot_a\n";
$qeyd .= "$bot_u\n";
$qeyd .= "$r_nik_1\n";
$qeyd .= "$r_nik_2\n";
$qeyd .= "$send_bal\n";
$qeyd .= "$leqeb_d\n";
$qeyd .= "$status_d\n";
$qeyd .= "$vip_al\n";
$qeyd .= "$killer_al\n";
$qeyd .= "$gorunmez_al\n";
$qeyd .= "$t_elan\n";
$qeyd .= "$tox_b\n";
$qeyd .= "$r_yazi\n";
$qeyd .= "$aile_b\n";
$qeyd .= "$b_ban\n";
$qeyd .= "$b_mex\n";
$qeyd .= "$b_img\n";
$qeyd .= "$qefes\n";
$qeyd .= "$reytinq\n";
$qeyd .= "$t_bax\n";
$qeyd .= "$t_q_blet\n";
$qeyd .= "$antii\n";
$qeyd .= "$deling\n";
$qeyd .= "$golduser\n";
$qeyd .= "$nikduzelt";

fputs($save,$qeyd);
fclose($save);

echo "Bal xidmetlerinin qiymetleri deyi&#351;dirildi!<br/>Te&#351;ekk&#252;rler<br/>";


}
break;
}

}

if($_POST['action']=="tap")
{
if($p_arr['70']!=1 and $p_arr['71']!=1){

echo 'Sizin buna hüququnuz yoxdur.<br/>';
echo $divide;
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = mysql_query ("Select id,user,bal,level from users where latuser = '".$latuser."'");
} else {
$select = mysql_query ("Select id,user,bal,level from users where id = '".$nick."'");
}
if (mysql_affected_rows() == 0) {

echo "Bele istifade&#231;i bazada yoxdur!<br/>\n";
echo $divide;
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$inf = mysql_fetch_array ($select);
$usid = $inf["id"];
$level=$inf["level"];
if(($level >= $row["level"])&&($usid!=$id)&&($id!='1')){

echo "Buna H&#252;ququnuz yoxdur...<br/>\n";
echo $divide;
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

echo "<b>&#304;D-N&#246;mresi</b>: <u>$usid</u><br/>\n";
echo "<b>Leqebi</b>: <u>$inf[user]</u><br/>\n";



echo "<b>BAL Hesab&#305;</b>: <u>$inf[bal]</u><br/>\n";
$_v->action("bal_add.php?go=upd&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

$option = "<select name=\"dey\">|";
if($p_arr['71']==1)
$option .= "<option value=\"0\">-</option>|";
if($p_arr['70']==1)
$option .= "<option value=\"1\">+</option>|";
$option .= "</select>";
print $_v->select($option);
print $_v->input("<input size=\"2\" name=\"new$ref\" value=\"0\" title=\"Deyi&#351;en\"/>").'<br/>';

print $_v->submit('Yenile','action=edit,upid='.$usid);
if($_v->ver!='wml') {
echo "<br/>";
}
$file = fopen("file/bal_bot/reflesh.dat", "w");
fwrite($file, $ref);
fclose($file);
}
elseif($_POST['action']=="edit")
{
settype($upid, 'integer');
$a = mysql_query("SELECT user,bal FROM users WHERE id ='".$upid."'");
$b = mysql_fetch_array ($a);
$bal = $b["bal"];
$nick = $b["user"];

$kode = file("file/bal_bot/reflesh.dat");
$codem = trim($kode[0]);

if($dey=='0' and $p_arr['71']!=1){

echo 'Sizin buna hüququnuz yoxdur.<br/>----<br/>';
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($dey!='0' and $p_arr['70']!=1){

echo 'Sizin buna hüququnuz yoxdur.<br/>----<br/>';
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($codem=="0"){

if($dey=="0")echo "Siz bu istifade&#231;iye az&#246;nce <b>$new</b>, bal y&#252;klediz...<br/>----<br/>";
else echo "Siz bu istifade&#231;inin hesab&#305;ndan az&#246;nce <b>$new</b>, bal &#231;&#305;xartd&#305;z...<br/>----<br/>";
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);

exit;
}
$file = fopen("file/bal_bot/reflesh.dat", "w");
fwrite($file, 0);
fclose($file);

if($dey=="0")
{
$newbal = $bal-$new;
$message = "H&#246;rmetli <b>".$nick."</b>! Sizin hesab&#305;n&#305;zdan <b>$new</b>, bal &#231;&#305;x&#305;ld&#305;...<br/>Hesab&#305;n&#305;zda cemi: <b>$newbal</b>, qald&#305;!";
$botmsg = " $new</b>, <u>bal &#231;&#305;xartd&#305; Cemi (<b>$newbal</b>) bal&#305; qald&#305;</u>.\n";
}
else
{
$newbal = $bal+$new;
$message = "H&#246;rmetli <b>".$nick."</b>! Sizin hesab&#305;n&#305;za <b>$new</b>, Y&#252;klendi... <br/>Hesab&#305;n&#305;zda cemi: <b>$newbal</b>, bal oldu!";
$botmsg = " $new</b>, y&#252;kledi: Cemi  (<b>$newbal</b>) bal&#305; oldu.\n";
}
@$fi = fopen("file/bal_bot/20.dat", "a+");
$date = date("d.m.y [H:i]",$SERVER_TIME); 
$user = $row['user'];
$lst = "".base64_encode("$user - <b>$nick $botmsg ($date)")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

$upnick = mysql_escape_string($upnick);

$us_s = file("file/bal_bot/0.dat");
$us_sistem = trim($us_s[1]);

$ins_str = "Update users set bal='".$newbal."' where id ='".$upid."'";
if (mysql_query ($ins_str)) {

$data = date("d-M-Y [H:i]");
$kol = rand(0,99999999);
$topic = "Bal Hesabat&#305;";
mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$us_sistem."', idwho ='', message = '".$message."', towhom = '".$nick."', idtowhom = '".$upid."', time = '".$SERVER_TIME."', readd = '0', topic = '".$topic."', date='".$data."'");



if($dey=="0"){echo "<b>$nick</b>, leqebli istifade&#231;inin hesab&#305;ndan <b>$new</b>, bal &#231;&#305;xard&#305;ld&#305;<br/>Cemi hesab&#305;nda: <b>$newbal</b>, bal qald&#305;!<br/>\n";}
else {echo "<b>$nick</b>, leqebli istifade&#231;inin hesab&#305;na <b>$new</b>, bal elave edildi.<br/>Cemi: <b>$newbal</b>, bal oldu!<br/>\n";}

} else {

echo "Database xetas&#305;:<br/>\n";

}
}


////////////////////


if($n=="")$_v->divide();
else echo "****<br/>";

if($n!="")
{
echo "<a href=\"bal_add.php?bolme=nezaret&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nezaret Paneli</a><br/>\n";
}
if((isset($_POST['action']))or($bolme!=""))
{
echo "<a href=\"bal_add.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Sistem</a><br/>\n";
}
if($n=="")echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
?>