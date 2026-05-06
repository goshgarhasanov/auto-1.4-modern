<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);
$takep="&amp;ref=$ref";


if($p_arr['204']!=1){
$_v->title('Smile Panel','center');
$_v->fsize1($fsize1);
echo '<b>Smile Panel</b><br/>';
$_v->align('left');
echo 'Giri?? h??ququnuz yoxdur<br/>';
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

ob_start();
switch ($b) {
default:
$_v->title('Smile Panel','center');
$_v->fsize1($fsize1);
echo '<b>Smile Panel</b><br/>';
$_v->align('left');

if($bol==''){
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">B&#246;lme Edit</a> | \n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=1$takep\">Optimize</a>\n";

echo '<br/>'.$divide;
$catalog = mysql_query("SELECT `id`,`name`,`count` FROM `smiles_cat` order by `order` asc;");
if (mysql_affected_rows() != 0){
while ($cat = mysql_fetch_array($catalog)) {
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2&amp;smid=".$cat['id'].$takep."\">$cat[name]</a>-($cat[count])<br/>\n";
}
}
else
{
echo "Smaylikler ???§??n B?¶lme yarad?±lmay?±b.<br/>\n";
}
}
elseif($bol=='2')
{
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a>\n";
echo "| <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri qay?±t</a><br/>\n";
echo $divide;
$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;bol=3".$takep."");

echo "B?¶lme ad?±:<br/>\n";
print $_v->input("<input type=\"text\" name=\"bolme$ref\" value=\"$sif[name]\" maxlength=\"20\"/>").'<br/>';

echo "Post:<br/>\n";
print $_v->input("<input type=\"text\" name=\"access$ref\" value=\"$sif[smile]\" format=\"*N\" maxlength=\"11\"/>").'<br/>';

print $_v->submit('Elave Et','action=save');
if($_v->ver!='wml') {
echo "<br/>";
}
}
elseif($bol=='3')
{
if(strlen($_POST['bolme'])>=25){
$error_raport[] = 'B?¶lmenin ad?± 25 simvoldan ?§ox olmamal?±d?±r.';
}
if(strlen($_POST['bolme'])<=3){
$error_raport[] = 'B&#246;lmenin ad&#305; 3 simvoldan ?§ox olmal?±d?±r.';
}
if(!ctype_digit($_POST['access'])){
$error_raport[] = 'Post yaln?±z reqemlerden ibaret olmal?±d?±r.';
}

$sm_bolme = narmobil($_POST['bolme']);
$sm_post = (int)$_POST['access'];
$catalog = mysql_query("SELECT `id` FROM `smiles_cat` WHERE `name` = '".$sm_bolme."';");
if (mysql_affected_rows() != 0){
$error_raport[] = 'Bele bir B?¶lme m?¶vcutdur.';
}

$error_message_count = count($error_raport);
if($error_message_count!='0'){// Error varsa
while(list($num,$num1) = each($error_raport)) {
echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
}
echo $divide;
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a>\n";
echo "| <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri qay?±t</a><br/>\n";
echo $divide;
echo "B?¶lme ad?±:<br/>\n";
$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;bol=3".$takep."");
print $_v->input("<input type=\"text\" name=\"bolme$ref\" value=\"$_POST[bolme]\" maxlength=\"20\"/>").'<br/>';

echo "Post:<br/>\n";
print $_v->input("<input type=\"text\" name=\"access$ref\" value=\"$_POST[access]\" format=\"*N\" maxlength=\"11\"/>").'<br/>';

print $_v->submit('Elave Et','action=save');
if($_v->ver!='wml') {
echo "<br/>";
}
}else{

$order = '';
$i = 1;
$order_filed = mysql_query("SELECT `order` FROM `smiles_cat` order by `order` asc;");
if (mysql_affected_rows() != 0){
while ($inf = mysql_fetch_array($order_filed)) {
if($i!=$inf['order'])
{
$order = $i;
continue;
}
$i++;
}
if($order=='')$order = $i;
}
else
{
$order = 1;
}
if(mysql_query ("Insert into `smiles_cat` set `name`= '".$sm_bolme."', `posts`='".$sm_post."', `order`='".$order."';"))
if($a==$a){
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Geri qay?±t</a>\n";
echo "| <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">B?¶lme Edit</a><br/>\n";
echo $divide;

echo 'B?¶lme yarad?±ld?±<br/>';
}
else
{
echo '<b>Error</b>: '.mysql_error().'<br/>';
}

}
}
elseif($bol=='4' AND (ctype_digit($_GET['d']) or ctype_digit($_GET['del'])))
{
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri qay?±t</a>\n";
echo "| <a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a><br/>\n";
echo $divide;

if($_GET['del']!=''){
mysql_query("SELECT `id` FROM `smiles_cat` WHERE `id` = '".$_GET['del']."';");
if (mysql_affected_rows() != 0){
mysql_query("delete from `smiles_cat` where `id` = '".$_GET['del']."';");
$i = 0;
$catalog = mysql_query("SELECT `smile` FROM `smiles` WHERE `usid` = '0' and `b` = '".$_GET['del']."';");
if (mysql_affected_rows() != 0){
while ($cat = mysql_fetch_array($catalog)) {
$i++;
@unlink($cat['smile']);
}
$danne = 've i?§inde olan '.$i.' smaylik';
}
else
$danne = '';
mysql_query("delete from `smiles` where `b` = '".$_GET['del']."';");
echo 'B?¶lme '.$danne.' silindi.<br/>';
}
else
{
echo "Silmek istediyiniz b?¶lme tap?±lmad?±.<br/>\n";
}
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
}


$catalog = mysql_query("SELECT `id`,`name`,`posts`,`line`,`count` FROM `smiles_cat` WHERE `id` = '".$_GET['d']."';");
if (mysql_affected_rows() != 0){
$inf = mysql_fetch_array($catalog);
echo 'B?¶lmenin ad?±: <u>'.$inf['name'].'</u><br/>
Cemi smile: <b>'.$inf['count'].'</b><br/>
Post icaze : <b>'.$inf['posts'].'</b>
<br/>----<br/>
Eger bu b?¶lmeni silsez i?§inde olan b??t??n smaylikler silinecek...<br/>';
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=4&amp;del=".$inf['id'].$takep."\">Raz?±yam</a><br/>\n";
}
else
{
echo "Silmek istediyiniz b?¶lme tap?±lmad?±.<br/>\n";
}

}
elseif($bol=='5' AND ctype_digit($_GET['e']))
{
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri qay?±t</a> |\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a><br/>\n";
echo $divide;

if($_POST['line']!=''){

$catalog = mysql_query("SELECT `id`,`order` FROM `smiles_cat` WHERE `id` = '".$_GET['e']."';");
if (mysql_affected_rows() == 0){
echo 'B?¶lme tap?±lmad?±<br/>';
}else{
$inf = mysql_fetch_array($catalog);

if(strlen($_POST['bolme'])>=25){
$error_raport[] = 'B&#246;lmenin ad&#305; 25 simvoldan &#231;ox olmamal&#305;d&#305;r.';
}

if(strlen($_POST['bolme'])<=3){
$error_raport[] = 'B&#246;lmenin ad&#305; 3 simvoldan ?§ox olmal?±d?±r.';
}

if(!ctype_digit($_POST['access'])){
$error_raport[] = 'Post yaln?±z reqemlerden ibaret olmal?±d?±r.';
}

if(!ctype_digit($_POST['order'])){
$error_raport[] = 'B?¶lmenin n?¶mresi yaln?±z reqemlerden ibaret olmal?±d?±r.';
}

if(strlen($_POST['order'])>=3){
$error_raport[] = 'B?¶lmenin n?¶mresi 99-dan b?¶y??k olmamal?±d?±r.';
}





$error_message_count = count($error_raport);
if($error_message_count!='0'){
while(list($num,$num1) = each($error_raport)) {
						echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
}
						echo '----<br/>';

echo "B?¶lme ad?±:<br/>\n";
$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;bol=5&amp;e=".$_GET['e'].$takep."");

print $_v->input("<input type=\"text\" name=\"bolme$ref\" value=\"$_POST[bolme]\" maxlength=\"20\"/>").'<br/>';

echo "N?¶mresi:\n";
print $_v->input("<input type=\"text\" size=\"7\" name=\"order$ref\" value=\"$_POST[order]\" maxlength=\"2\"/>").'<br/>';


echo "Post icazesi:<br/>\n";
print $_v->input("<input type=\"text\" name=\"access$ref\" value=\"$_POST[access]\" format=\"*N\" maxlength=\"11\"/>").'<br/>';


echo "B?¶lmenin g?¶r??nt??s??:<br/>\n";

$option = "<select name=\"line$ref\">|";
if($_POST['line']=='1'){
$option .= "<option value=\"1\">Aktiv</option>|";
$option .= "<option value=\"2\">Deaktiv</option>|";
}else{
$option .= "<option value=\"2\">Deaktiv</option>|";
$option .= "<option value=\"1\">Aktiv</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
echo $divide;
print $_v->submit('Elave Et','action=save');

}else{



$order_filed = mysql_query("SELECT `order` FROM `smiles_cat` order by `order` desc;");
$order_f = mysql_fetch_array($order_filed);
$max_order = $order_f['order'];


if($_POST['order']>$max_order){
$_POST['order'] = $max_order;
}

$smid = $inf['id'];
$oldorder = $inf['order'];

if($oldorder!=$_POST['order']){
$catalog = mysql_query("SELECT `id` FROM `smiles_cat` WHERE `order` = '".$_POST['order']."';");
if (mysql_affected_rows() != 0){
$inf = mysql_fetch_array($catalog);
mysql_query("UPDATE `smiles_cat` SET `order` = '".$oldorder."' WHERE `id` = '".$inf['id']."';");
}
}


$name = narmobil($_POST['bolme']);
$access = intval($_POST['access']);
$line = intval($_POST['line']);
$order = intval($_POST['order']);
mysql_query("UPDATE `smiles_cat` SET `name` = '".$name."', `order` = '".$order."', `posts` = '".$access."', `line` = '".$line."' WHERE `id` = '".$smid."';");

echo 'Melumat qeyd oldu<br/>';
}
}
}else{

$catalog = mysql_query("SELECT `id`,`name`,`posts`,`order`,`line` FROM `smiles_cat` WHERE `id` = '".$_GET['e']."';");
if (mysql_affected_rows() == 0){
echo 'B?¶lme tap?±lmad?±<br/>';
}else{
$inf = mysql_fetch_array($catalog);

$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;bol=5&amp;e=".$_GET['e'].$takep."");

echo "B?¶lme ad?±:<br/>\n";
print $_v->input("<input type=\"text\" name=\"bolme$ref\" value=\"$inf[name]\" maxlength=\"20\"/>").'<br/>';



echo "N?¶mresi:\n";
print $_v->input("<input type=\"text\" size=\"7\" name=\"order$ref\" value=\"$inf[order]\" maxlength=\"2\"/>").'<br/>';

echo "Post icazesi:<br/>\n";
print $_v->input("<input type=\"text\" name=\"access$ref\" value=\"$inf[posts]\" format=\"*N\" maxlength=\"11\"/>").'<br/>';


echo "B?¶lmenin g?¶r??nt??s??:<br/>\n";

$option = "<select name=\"line$ref\">|";
if($_POST['line']=='1'){
$option .= "<option value=\"1\">Aktiv</option>|";
$option .= "<option value=\"2\">Deaktiv</option>|";
}else{
$option .= "<option value=\"2\">Deaktiv</option>|";
$option .= "<option value=\"1\">Aktiv</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
echo $divide;
print $_v->submit('Elave Et','action=save');
 
}

}
}
elseif($bol=='1')
{
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a>\n";
echo "| <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Yarat</a><br/>\n";
echo $divide;
$catalog = mysql_query("SELECT `id`,`name`,`line` FROM `smiles_cat` order by `order` asc;");
if (mysql_affected_rows() != 0){
while ($cat = mysql_fetch_array($catalog)) {
if($cat['line']!='1')$line = '-Deaktiv'; else $line = '';
echo "[<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=4&amp;d=".$cat['id'].$takep."\">x</a>]\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;bol=5&amp;e=".$cat['id'].$takep."\">$cat[name]</a>$line<br/>\n";
}
}
else
{
echo "B?¶lme Yoxdur.<br/>\n";
}
}

echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;



case '2':
if(isset($_GET['wmid'])){
$smid=$wmid=(int)$_GET['wmid'];
// }elseif(isset($_GET['wid'])){
// $smid=$wid=(int)$_GET['wid'];
}else
$smid = (int)$_GET['smid'];
if($p!='')$ptakep = "&amp;p=$p";

$_v->title('Smile Panel','center');
$_v->fsize1($fsize1);

echo '<b>Smile Panel</b><br/>';
$_v->align('left');


if($wmid!=''){
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a>\n";

$r = mysql_query ("Select `id`,`usid`,`name`,`smile`,`posts`,`time`,`b` from `smiles` WHERE `id` = '".$smid."';");
if (mysql_affected_rows() == 0){
echo '<br/>'.$divide;
echo 'Smaylik b?¶lmede tap?±lmad?±<br/>';
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
}
$a=mysql_fetch_array($r);




$catalog = mysql_query("SELECT `id`,`name` FROM `smiles_cat` WHERE `id` = '".$a['b']."';");
if (mysql_affected_rows() == 0){
echo '<br/>'.$divide;
echo "B?¶lme tap?±lmad?±.<br/>\n";
}
else
{
$kod = narmobil($_POST['kod']);
$name_old = mysql_query("SELECT `id` FROM `smiles` WHERE `name` = '".$kod."';");
if (mysql_affected_rows() != 0){
$error_raport[] = 'Bu adda smaylik bazada var ba??qa ad se?§in';
}

$cat = mysql_fetch_array($catalog);

if($_POST['kod']!='' and $_POST['dir']!=''){

if(strlen($_POST['kod'])<=1){
$error_raport[] = 'Kod 1 simvoldan ?§ox olmal?±d?±r.';
}

if(strlen($_POST['kod'])>20){
$error_raport[] = 'Kod 20 simvoldan ?§ox olmamal?±d?±r.';
}

if(!ctype_digit($_POST['dir']) or $_POST['dir']==''){
$error_raport[] = 'B?¶lme d??zg??n se?§ilmeyib.';
}

if(preg_match('#^:(.*)$#i', $_POST['kod'])==false and preg_match('#^\.(.*)\.$#i', $_POST['kod'])==false)
{
$error_raport[] = 'Kod bu formada yaz?±lmal?±d?±r: .ga. (sa???±nda solunda n?¶kte ile) ve ya :D (iki n?¶kteden sonra simvol).';
}

$error_message_count = count($error_raport);
if($error_message_count!='0'){


echo " / <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2$ptakep&amp;smid=$a[b]$takep\">$cat[name]</a> /\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=3&amp;smid=$a[b]$ptakep$takep\">Y??kle</a><br/>\n";
echo $divide;

$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;b=$b&amp;wmid=".$wmid.$ptakep.$takep."");

while(list($num,$num1) = each($error_raport)) {
echo '<div class="o_k"><b>'.($num+1).')</b> '.$num1."<br/></div>\n";
}
echo $divide;

echo 'Kod:<br/>';
print $_v->input("<input name=\"kod$ref\" type=\"text\" value=\"$_POST[kod]\" maxlength=\"20\"/>").'<br/>';

print 'B?¶lme:<br/>';

$option = '<select name="dir'.$ref.'">|';
$catalog_1 = mysql_query("SELECT `id`,`name` FROM `smiles_cat` WHERE 1;");
while ($cat1 = mysql_fetch_array($catalog_1)) {
$option .= '<option value="'.$cat1['id'].'">'.$cat1['name'].'</option>|';
}
$option .= '</select>';
print $_v->select($option,$cat['id']).'<br/>';


$muellif = @mysql_fetch_array(@mysql_query ("Select `user` from `users` where `id` = '".$a['usid']."' LIMIT 1;"));
if($muellif[0])
echo 'M??ellif: '.$muellif[0].'<br/>';
print $_v->submit('Deyi??dir');

echo "<br/>\n";
}else{
echo " / <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2$ptakep&amp;smid=$a[b]$takep\">$cat[name]</a> /\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=3&amp;smid=$a[b]$ptakep$takep\">Y??kle</a><br/>\n";
echo $divide;
echo 'Melumat Deyi??dirildi.<br/>';

mysql_query("UPDATE `smiles` SET `name` = '".$kod."', `b`='".(int)$_POST['dir']."' WHERE `id` = '".$a['id']."';");
}

}else{
echo " / <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2$ptakep&amp;smid=$a[b]$takep\">$cat[name]</a> /\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=3&amp;smid=$a[b]$ptakep$takep\">Y??kle</a><br/>\n";
echo $divide;
$_v->action("smilein.php?id=$id&amp;ps=$ps&amp;b=$b&amp;wmid=".$wmid.$ptakep.$takep);

echo 'Kod:<br/>';
print $_v->input("<input name=\"kod$ref\" type=\"text\" value=\"$a[name]\" maxlength=\"20\"/>").'<br/>';

print 'B?¶lme:<br/>';

$option = '<select name="dir'.$ref.'">|';
$catalog_1 = mysql_query("SELECT `id`,`name` FROM `smiles_cat` WHERE 1;");
while ($cat1 = mysql_fetch_array($catalog_1)) {
$option .= '<option value="'.$cat1['id'].'">'.$cat1['name'].'</option>|';
}
$option .= '</select>';
print $_v->select($option,$cat['id']).'<br/>';

$muellif = @mysql_fetch_array(@mysql_query ("Select `user` from `users` where `id` = '".$a['usid']."' LIMIT 1;"));
if($muellif[0])
echo 'M??ellif: '.$muellif[0].'<br/>';

print $_v->submit('Deyi??dir');
}
}
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
}

echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a>\n";
$catalog = mysql_query("SELECT `id`,`name`,`posts`,`line` FROM `smiles_cat` WHERE `id` = '".$smid."';");
if (mysql_affected_rows() == 0){
echo '<br/>'.$divide;
echo "B?¶lme tap?±lmad?±.<br/>\n";
}
else
{
$cat = mysql_fetch_array($catalog);
echo " / $cat[name] /\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=3&amp;smid=$smid$ptakep$takep\">Y??kle</a><br/>\n";
echo $divide;
if($wid!=''){
$r = mysql_query ("Select `smile` from `smiles` WHERE `id` = '".$wid."' and `b` = '".$smid."';");
if (mysql_affected_rows() == 0){
echo 'Silmek istediyiniz smaylik m?¶vcut deyil<br/>';
echo $divide;
}else{
$a=mysql_fetch_array($r);
mysql_query("DELETE FROM `smiles` WHERE `id` = '".$wid."';");
mysql_query("UPDATE `smiles_cat` SET `count`=`count`-1 WHERE `id` = '".$smid."';");
@unlink($a['smile']);
}
}
$r = mysql_query("select count(`id`) as `num` from `smiles` where `a` = '0' and `b` = '".$cat['id']."';");
$a = mysql_fetch_array($r);
$all_sm = $a["num"];

if ($all_sm == 0){
echo "Bu b?¶lmede he?§bir smaylik yoxdur...<br/>\n";   
}else{

$num = 10;
@$p = (int)$_GET['p'];
$total = (($all_sm - 1) / $num) + 1;
$total =  intval($total);
$p = intval($p);
if(empty($p) or $p < 0) $p = 1;
if($p > $total) $p = $total;
$start = $p * $num - $num;

if($p>=2)
$takep="&amp;p=$p&amp;ref=$ref";

$r = mysql_query ("Select `id`,`usid`,`name`,`smile`,`posts`,`time` from `smiles` WHERE `a` = '0' and `b` = '".$cat['id']."' order by `time` desc LIMIT $start,$num;");
while($a=mysql_fetch_array($r)){
$sm_id = $a["id"];
$sm_usid = $a["usid"];
$sm_name = $a["name"];
$sm_smile = $a["smile"];                    

echo "[<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2&amp;smid=$smid&amp;wid=$sm_id$takep\">x</a>]\n";
echo "<img src=\"".$sm_smile."\" alt=\"img\"/> - <a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2&amp;wmid=$sm_id$takep\">$sm_name</a><br/>\n";

}
$takep="&amp;ref=$ref";

$url_for_pstr="smilein.php?id=$id&amp;ps=$ps&amp;b=$b&amp;smid=$cat[id]&amp;p=";
if($p - 3 > 0) $p3left = " <a href=\"".$url_for_pstr.($p-3)."&amp;ref=$ref\">".($p-3)."</a> | ";
if($p - 2 > 0) $p2left = " <a href=\"".$url_for_pstr.($p-2)."&amp;ref=$ref\">".($p-2)."</a> | ";
if($p - 1 > 0) $p1left = " <a href=\"".$url_for_pstr.($p-1)."&amp;ref=$ref\">".($p-1)."</a> | ";

if($p + 3 <= $total) $p3right = " | <a href=\"".$url_for_pstr.($p+3)."&amp;ref=$ref\">".($p+3)."</a>";
if($p + 2 <= $total) $p2right = " | <a href=\"".$url_for_pstr.($p+2)."&amp;ref=$ref\">".($p+2)."</a>";
if($p + 1 <= $total) $p1right = " | <a href=\"".$url_for_pstr.($p+1)."&amp;ref=$ref\">".($p+1)."</a>";
if ($total > 1)
{
echo $divide;
echo $p3left.$p2left.$p1left.'<b>'.$p.'</b>'.$p1right.$p2right.$p3right.'<br/>';
}

}
}
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;




case '3':
header("Content-type: application/vnd.wap.xhtml+xml; charset=UTF-8");
$smid = (int)$_GET['smid'];
if($p!='')$ptakep = "&amp;p=$p";
if($_v->ver=="wml")$_v->ver="vista1";

$_v->title('Smile Panel','left');
$catalog = mysql_query("SELECT `id`,`name`,`posts` FROM `smiles_cat` WHERE `id` = '".$smid."';");
if (mysql_affected_rows() == 0){


echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$ptakep$takep\">B?¶lmeler</a> | \n";
echo "???????? | \n";
echo "Y??kle\n";

echo "B?¶lme tap?±lmad?±.<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
break;
}
$cat = mysql_fetch_array($catalog);

echo "<div class=\"mini\">\n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a> | \n";
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;b=2&amp;smid=".$cat['id'].$ptakep.$takep."\">".$cat['name']."</a> | \n";
echo "Y??kle\n";
echo "</div>\n"; 

echo "<div class=\"index\">\n";
if($_POST['kod']!='' and $_FILES['smile']['name']!='')
{

if(strlen($_POST['kod'])<=1){
$error_raport[] = 'Kod 1 simvoldan ?§ox olmal?±d?±r.';
}

if(strlen($_POST['kod'])>20){
$error_raport[] = 'Kod 20 simvoldan ?§ox olmamal?±d?±r.';
}

if(!ctype_digit($_POST['dir']) or $_POST['dir']==''){
$error_raport[] = 'B?¶lme d??zg??n se?§ilmeyib.';
}

if(preg_match('#^:(.*)$#i', $_POST['kod'])==false and preg_match('#^\.(.*)\.$#i', $_POST['kod'])==false)
{
$error_raport[] = 'Kod bu formada yaz?±lmal?±d?±r: .ga. (sa???±nda solunda n?¶kte ile) ve ya :D (iki n?¶kteden sonra simvol).';
}

$smile_tmp = $_FILES['smile']['tmp_name'];
if($smile_tmp)$par = GetImageSize($smile_tmp);



function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|http|post|else|basename|hr+c)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
if(is_image($_FILES['smile']['tmp_name']) == "shell")
{
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta: </b>  Anti shell..<br/>';
echo '----</div>';	
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

/////////////////////////


$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['smile']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['smile']['name']);

			if($FileSize > 100 * 1024) { // 100 kb
				$albom->error = '&#350;ekil 100 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}

if($albom->error) {
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '---</div>';
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

/*
$access = array("gif","jpeg","jpg","png");
$pathinfo = pathinfo($_FILES['smile']['name']);
$img_type = strtolower($pathinfo['extension']);

if (!in_array($img_type, $access)){
$error_raport[] = 'Smaylik gif, jpg, png, jpeg format?±nda olmal?±d?±r.';
}
*/
if(round($_FILES['smile']['size'])>='102400')
{
$error_raport[] = 'Smaylik 100-kb dan ?§ox olmamal?±d?±r.';
}


$error_message_count = count($error_raport);
if($error_message_count!='0'){
while(list($num,$num1) = each($error_raport)) {
echo '<div class="o_k"><b>'.($num+1).')</b> '.$num1."<br/></div>\n";
}
}else{

$name_old = mysql_query("SELECT `id`,`time` FROM `smiles` WHERE `name` = '".$kod."';");
if (mysql_affected_rows() != 0){
$o_sm = mysql_fetch_array($name_old);
$old_time = $o_sm['time'];
if($old_time>$SERVER_TIME-120)
echo '<font color = "#009900">Smaylik Y??klendi</font><br/>';
else
echo '<div class="o_k">Bu adda smaylik bazada var ba??qa ad se?§in<br/></div>';
}else{
$max_id = mysql_query("SELECT `id` FROM `smiles` order by `id` desc;");
$max_id = mysql_fetch_array($max_id);
$max_id = $max_id['id']+1;
$img_niko = 'gif';



$thisFile = 'smile_v2/'.$max_id.'.'.$img_niko;
if(file_exists($thisFile)) {
	unlink($thisFile);
}
if(copy($smile_tmp,$thisFile)){
$kod = narmobil($_POST['kod']);
mysql_query("INSERT INTO `smiles` SET `usid`='".$id."', `name`='".$kod."', `smile`='smile_v2/".$max_id.".".$img_niko."', `a` = '0', `b` = '".$_POST['dir']."';") or die (mysql_error());
mysql_query("UPDATE `smiles_cat` SET `count`=`count`+1 WHERE `id` = '".$_POST['dir']."';");

echo '<font color = "#009900">Smaylik Y??klendi</font><br/>';
}else{
echo '<div class="o_k">FTP-de <b>smile_v2</b> papkasi yoxdur ve ya chmod 0777 icazesi yoxdur<br/></div>';
}
}
}
echo $divide;
echo "<form ENCTYPE=\"multipart/form-data\" action=\"smilein.php?id=$id&amp;ps=$ps&amp;b=$b&amp;smid=$smid$ptakep$takep\" method=\"post\">";
print '<b>Kod:</b> (:D .ga.) ve.s<br/>';
echo "<input name=\"kod\" type=\"text\" value=\"$_POST[kod]\" maxlength=\"20\"/><br/>";
print '<b>File:</b><br/>';
echo "<input name=\"smile\" type=\"file\"/><br/>";
print 'B?¶lme:<br/>';
print '<select name="dir">';
print '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
$catalog_1 = mysql_query("SELECT `id`,`name` FROM `smiles_cat` WHERE `id`!='".$smid."';");
while ($cat1 = mysql_fetch_array($catalog_1)) {
print '<option value="'.$cat1['id'].'">'.$cat1['name'].'</option>';
}
print '</select><br/>';
echo "<input type=\"submit\" value=\"Y??kle\"/></form>";
}else{
echo $cat['posts'].' postdan yuxar?±lar ???§??n.<br/>'.$divide;
echo "<form ENCTYPE=\"multipart/form-data\" action=\"smilein.php?id=$id&amp;ps=$ps&amp;b=$b&amp;smid=$smid$ptakep$takep\" method=\"post\">";
print '<b>Kod:</b> (:D .ga.) ve.s<br/>';
echo "<input name=\"kod\" type=\"text\" maxlength=\"20\"/><br/>";
print '<b>File:</b><br/>';
echo "<input name=\"smile\" type=\"file\"/><br/>";
print 'B?¶lme:<br/>';

print '<select name="dir">';
print '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
$catalog_1 = mysql_query("SELECT `id`,`name` FROM `smiles_cat` WHERE `id`!='".$smid."';");
while ($cat1 = mysql_fetch_array($catalog_1)) {
print '<option value="'.$cat1['id'].'">'.$cat1['name'].'</option>';
}
print '</select><br/>';
echo "<input type=\"submit\" value=\"Y??kle\"/></form>";
}
echo "<br/>";
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->end('1',$link);
break;



case '1':
function s1_optimize()
{
global $SERVER_TIME;
$file = "<?PHP //optimize Smiles. Tarix: ".date('d.m.Y | H:i',$SERVER_TIME)."\n\n";$i=0;
$catalog = mysql_query("SELECT `id`,`name`,`posts`,`order`,`count` FROM `smiles_cat` WHERE `count` != '0' and `line`='1' order by `order` asc;");
if (mysql_affected_rows() != 0){
while ($cat = mysql_fetch_array($catalog)) {
$kod_array = $img_array = '';
$smiles = mysql_query("SELECT `name`,`smile` FROM `smiles` WHERE `b` = '".$cat['id']."';");
if (mysql_affected_rows() != 0){
$z=0;
while ($sm = mysql_fetch_array($smiles)) {
$kod_array[] = $sm['name'];
$img_array[] = $sm['smile'];
$z++;
}
mysql_query("UPDATE `smiles_cat` SET `count` = '".$z."' WHERE `id` = '".$cat['id']."';");
$file .= "if(\$posts>'$cat[posts]')// $cat[posts] postdan yuxarilar ucun, $cat[count] eded smaylik\n{\n";
$file .= "array_push(\$smiles,";
foreach ($kod_array as $value) {
$file .= "'".$value."',";
}
$file =substr($file,0,-1);
$file .= ");\n";
$file .= "array_push(\$replaces,";
foreach ($img_array as $key => $value) {
$file .= "\"<img src=\\\"".$value."\\\" alt=\\\"".$kod_array[$key] ."\\\"/>\",";
}
$file =substr($file,0,-1);
$file .= ");\n";
$file .= "}\n";
}
else
{
mysql_query("UPDATE `smiles_cat` SET `count` = '0' WHERE `id` = '".$cat['id']."';");
}
$i++;
}
}
$file .= '?>';
if(strlen($file)>60){
file_put_contents('file/dat_folder/smile.php',$file);
return 'YES Optimize.<br/>----<br/>';
}
}

function del_smile_auto()
{
if(date('m',filemtime("file/dat_folder/smile.php"))!=date('m')){
$directory = 'smile_v2';
$dir = opendir($directory);
while(($file = readdir($dir)))
{
if ( is_file ($directory."/".$file))
{
$smid=explode(".", $file);
$r = mysql_query ("select `id` from `smiles` where `id` = '".$smid['0']."';");
if (mysql_affected_rows() == 0) {
@unlink ($directory."/".$file);
}
}
else if ( is_dir ($directory."/".$file) &&($file != ".") && ($file != ".."))
{
full_del_dir ($directory."/".$file); 
}
}
@closedir ($dir);
@rmdir ($directory);
return 'auto optimize 2<br/>----<br/>';
}
return;
}


$_v->title('Smile Panel','center');
$_v->fsize1($fsize1);
$_v->align('left');
echo "<a href=\"smilein.php?id=$id&amp;ps=$ps$takep\">B?¶lmeler</a><br/>\n";
echo $divide;
if($optimize=='1')
{
echo s1_optimize();
echo del_smile_auto();
}
echo 'Sonuncu defe '.@date('d.m.Y',filemtime("file/dat_folder/smile.php")).' tarixinde Optimize olunub. <a href="smilein.php?id='.$id.'&amp;ps='.$ps.'&amp;b=1&amp;optimize=1'.$takep.'">Yenile</a><br/>';
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;




}

ob_end_flush();
?>