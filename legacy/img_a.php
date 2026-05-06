<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$img = (isset( $_POST['img'] ) ? $_POST['img'] : $_GET['img']);
if (isset($img)){
$img = nk($img);
}

if(isset($_GET['down'])){

$albom = mysql_fetch_object(mysql_query( "Select * from albom where id='".$_GET['down']."';"));

if($albom->photo!=""){

if ((mysql_num_rows(mysql_query("SELECT * FROM `albom_down` WHERE `usid` = '".$id."' and `id_albom` = '".$down."';"))) == 0){
mysql_query("INSERT INTO `albom_down` SET `id_albom` = '".$_GET['down']."', `time` = '".$SERVER_TIME."', `usid` = '".$id."', `count` = '1';");
}else{
mysql_query("UPDATE `albom_down` SET `time` = '".$SERVER_TIME."', `count` = `count`+'1' WHERE `usid` = '".$id."';");
}


header("Location: images.php?img=photos/{$albom->idfoto}/{$albom->photo}"); die; 

}

}


if($rm != "" ){
$takep = "&amp;rm={$rm}&amp;ref={$ref}";
}else if( $x != "" ){
$takep = "&amp;x={$x}&amp;&amp;ref={$ref}";
}else{
$takep = "&amp;ref={$ref}";
}
switch ($bol) {
default:


$qus = mysql_query("Select user from users where id = '".$img."';");

if (mysql_affected_rows()!= 0){
$ind = mysql_fetch_array($qus);
$u_user = $ind['user'];
}
   $_v->title('Foto-Albom / '.$u_user,'center');
   $_v->fsize1($fsize1);

$query = mysql_query("select COUNT(id) from albom where idfoto = '".$img."';");
$all = @mysql_result($query, 0);

$mov = $_GET['mov'];
if(isset($mov)){
$page = $_GET['page'] = $mov;
}

$next_id = next_id($all,'1');


if(isset($imgid)){
$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$imgid."';");

}else{

$q = mysql_query("select * from albom where idfoto = '".$img."' order by id desc limit $next_id[start],$next_id[max_page];");
}


if ($all == 0 ){
echo "<i>Bu &#304;stifade&#231;inin Foto-Albomunda &#350;ekili yoxdur</i><br/>----<br/>\n";
}else{
echo "\"<b>{$u_user}</b>\" / <u>&#350;ekiller</u> - (<b>{$all}</b>)<br/>";
$arr = mysql_fetch_array($q);
$photo = $arr['photo'];
$info = $arr['info'];
$fid = $arr['id'];
$idfoto = $arr['idfoto'];
$vote = $arr['vote'];
$comment = $arr['comment'];

$dv = mysql_query( "SELECT * FROM `albom_down` WHERE `id_albom` = '".$fid."';" );
$down = mysql_num_rows($dv);


if(file_exists("photos/".$img."/".$photo)){
echo "<img src=\"image.php?img=photos/{$img}/{$photo}&amp;size=150\" alt=\"{$u_user}\"/><br/>\n";

echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;down={$fid}&amp;ref=$ref\">Y&#252;kle</a> - <a href=\"img_a.php?bol=down&amp;id={$id}&amp;ps={$ps}&amp;key={$fid}&amp;mov={$next_id['page']}{$takep}\">(".$down.")</a>\n";

if (8 < $row['level'] || $id == $idfoto ){
echo "/ <a href=\"img_a.php?bol=3&amp;key={$fid}&amp;id={$id}&amp;ps={$ps}{$takep}\">Sil</a>\n";
}
echo "<br/>\n";

if($id == $idfoto ){
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;bol=5&amp;mov={$next_id['page']}&amp;key={$fid}{$takep}\">Profile Qoy</a><br/>";
}

echo "<a href=\"img_a.php?bol=4&amp;id={$id}&amp;ps={$ps}&amp;key={$fid}&amp;mov={$next_id['page']}{$takep}\">&#350;erhler</a>-(".$comment.")<br/>\n";



if ($info){
echo "-<br/><u><b>Qeyd</b></u>:{$info}<br/> - <br/>";
}


echo "<a href=\"img_a.php?bol=vote&amp;id={$id}&amp;ps={$ps}&amp;key={$fid}&amp;mov={$next_id['page']}{$takep}\">Beyen</a> - <a href=\"img_a.php?bol=votes&amp;id={$id}&amp;ps={$ps}&amp;key={$fid}&amp;mov={$next_id['page']}{$takep}\">(".$vote.")</a><br/>\n";

}else{
echo "<i>&#350;ekil y&#252;klenmir (<b>Ftp</b>-den silinib)...</i>\n";

@unlink( "photos/{$id}/{$photo}");

mysql_query( "DELETE from albom where id = '".$fid."'" );
mysql_query( "DELETE from albom_fikir where key = '".$fid."'" );
mysql_query( "DELETE from albom_vote where id_albom = '".$fid."'" );
mysql_query( "DELETE albom_down where id_albom = '".$fid."'" );
mysql_query( "update users set img = img-1 where id = '".$idfoto."';" );
}


if($next_id['a'] > $next_id['max_page']){
echo page_next("img_a.php?id=$id&amp;ps=$ps&amp;img=$idfoto&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
}


$_v->divide();

}

break;


case '1':
$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$fid."';");
if (mysql_affected_rows() == 0){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>";
break;
}


$_v->title("Foto-Albom",'center');
$_v->fsize1($fsize1);



$arr = mysql_fetch_array($q);
$vote=$arr['vote'];
$photo=$arr['photo'];
$info=$arr['info'];
$idfoto=$arr['idfoto'];
$del=$arr['id'];

$qus = mysql_query ("Select user from users where id = '".$idfoto."';"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$del."';");
}


echo "\"<b>$u_user</b>\" leqebli &#350;exsin &#351;ekili<br/>*****<br/>\n";

if (file_exists("photos/".$idfoto."/".$photo.""))
{
	echo "<img src=\"image.php?img=photos/{$idfoto}/{$photo}&amp;size=150\" alt=\".\"/><br/>\n";
	$a_down = mysql_fetch_object(mysql_query ("SELECT COUNT(`id`) as `num` FROM `albom_down` WHERE `id_albom` ='{$arr['id']}';"));
	echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;down={$arr['id']}&amp;ref=$ref\">Y&#252;kle</a> - <a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=down&amp;key={$arr['id']}&amp;ref=$ref\">({$a_down->num})</a> ";
}else{
echo "<i>&#350;ekil y&#252;klenmir (<b>Ftp</b>-den silinib)...</i>\n";
}

if(($row["level"]>7)or($id==$idfoto))echo "/ <a href=\"img_a.php?bol=3&amp;del=$del&amp;id=$id&amp;ps=$ps$takep\">Sil</a>\n";
echo "<br/>\n";
echo "<a href=\"img_a.php?bol=4&amp;id=$id&amp;ps=$ps&amp;key=$del&amp;mov=$img$takep\">&#350;ekil haqq&#305;nda qeydler</a><br/>\n";
if ($id==$idfoto)echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=5&amp;key=$fid$takep\">Bu &#351;ekli Ankete qoy</a><br/>";
echo "-<br/>\n";
if($info)echo "<u>Qeyd</u>: $info<br/>-<br/>";
echo "<a href=\"img_a.php?bol=vote&amp;id=$id&amp;ps=$ps&amp;key=$del$takep\">Beyen</a> <a href=\"img_a.php?bol=votes&amp;id=$id&amp;ps=$ps&amp;key=$del$takep\">($vote)</a><br/>";
echo "----<br/>\n";
echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;img=$idfoto&amp;mov=$img$takep\">Diger &#350;ekilleri</a><br/>\n";
break;

case "4" :
require("file/fun/25");
break;


case "5" :
$_v->title('Esas &#351;ekil','center');
$_v->fsize1($fsize1);

if ($row['posts'] < 1000){
echo "Balans&#305;n&#305;zdak&#305; postlar&#305;n say&#305; 1000-i ke&#231;dikden esas &#351;ekil se&#231;e bilersiz.<br/>\n";
}else{
$qq = mysql_query("SELECT * FROM `albom` WHERE `id`='".$key."' and `idfoto`='".$id."';");
if(mysql_num_rows($qq) == 0 ){
echo "Bu &#351;ekil size aid deyil.<br/>\n";
}else{
  

$ind = mysql_fetch_array($qq);


@unlink("photos/src/".$row['image_fon']);


include("file/require/class_img.php");
N_SIZE_COPY("./photos/{$id}/{$ind['photo']}", "photos/src/".$ind['photo']);


mysql_query("UPDATE `users` SET `image_fon`='".$ind['photo']."' WHERE `id` = '".$id."';");
echo "Se&#231;diyiniz &#351;ekil ankete elave olundu.<br/>\n";
}
}
$_v->divide();
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;img={$id}{$takep}\">Geri qay&#305;t</a><br/>";
break;



case "down" :

$qdow = mysql_query("SELECT * FROM `albom` WHERE `id`='".$key."';");

if(mysql_num_rows($qdow) == 0 ){
  $_v->title('Xeta','ceter');
  $_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>\n";

}else{

$xrr = mysql_fetch_array($qdow);
$photo = $xrr['photo'];
$idfoto = $xrr['idfoto'];
$key = $xrr['id'];

$_v->title('&#351;ekili Y&#252;leyenler','left');
$_v->fsize1($fsize1);

echo "<img src=\"image.php?img=photos/{$idfoto}/{$photo}&amp;h=150&amp;w=150\" alt=\".\"/><br/>\n";

$xx = select_nk($idfoto);

echo "<b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$xx->id."&amp;ref=$ref\">".$xx->user."</a></b> / Nikinin <u>&#350;ekili</u><br/>\n";
$_v->divide();

if($_GET["del"]!="" && ( $idfoto == $id || $row['level'] == 9 ) ){
@mysql_query( @"delete from `albom_down` WHERE `id` = '".$_GET["del"]."';" );
}

$qc = mysql_query( "SELECT * FROM `albom_down` WHERE `id_albom` = '".$key."';" );
$all = mysql_num_rows( $qc );

if($all==0){
echo "&#351;ekili y&#252;kleyen olmay&#304;b <br/>";
}else{

echo "Cemi <u>$all</u> Nefer y&#252;kleyib.<br/>";
$_v->divide();
$next_id = next_id($all);

$qt = mysql_query("SELECT `id`,`usid`,`id_albom`,`count`,`time` FROM `albom_down` WHERE `id_albom` = '".$key."' ORDER BY `time` DESC LIMIT $next_id[start],$next_id[max_page];");
while($view = mysql_fetch_array($qt)){
$del_b = $view["id"];
$usid = $view["usid"];
$time = $view["time"];
$count = $view["count"];

$us = select_nk($usid);
$like_us = $us->user;
$zn = $us->zn;

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$like_us = "<img src=\"i/".$usid.".gif\" alt=\"{$view["user"]}\"/>";
}

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($row['level']==9)echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=down&amp;del=".$del_b."&amp;key=$key&amp;mov={$mov}&amp;ref=$ref\">[x]</a>-\n";

echo "$zn<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$us->id."&amp;ref=$ref\">$like_us</a> - (".time_date($time).") cemi (".$count." defe)<br/>";
}

if($next_id['a'] > $next_id['max_page']){
echo page_next("img_a.php?id=$id&amp;ps=$ps&amp;bol=down&amp;key=$key&amp;mov={$mov}&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

}

$_v->divide();
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;img={$xx->id}{$takep}\">Geri qay&#305;t</a><br/>";
}
break;


case "votes" :

$vot = mysql_query("SELECT * FROM `albom` WHERE `id`='".$key."';");

if(mysql_num_rows($vot) == 0 ){
  $_v->title('Xeta','ceter');
  $_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>\n";

}else{

$vt = mysql_fetch_array($vot);
$photo = $vt['photo'];
$idfoto = $vt['idfoto'];
$key = $vt['id'];

$_v->title('&#351;ekili Beyenenler','left');
$_v->fsize1($fsize1);

echo "<img src=\"image.php?img=photos/{$idfoto}/{$photo}&amp;h=150&amp;w=150\" alt=\".\"/><br/>\n";

$xx = select_nk($idfoto);

echo "<b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$xx->id."&amp;ref=$ref\">".$xx->user."</a></b> / Nikinin <u>&#350;ekili</u><br/>\n";
$_v->divide();

if($_GET["del"]!="" && ( $idfoto == $id || $row['level'] == 9)){
$del_vot = mysql_query( "delete from `albom_vote` WHERE `key` = '".$_GET["del"]."';" );

$a_ses = mysql_query( "SELECT * FROM `albom_vote` WHERE `id_albom` = '".$key."';" );
$all_ses = mysql_num_rows($a_ses);

mysql_query( "update albom set vote ='".$all_ses."' where id = '".$key."';" );
}

$vc = mysql_query( "SELECT * FROM `albom_vote` WHERE `id_albom` = '".$key."';" );
$all = mysql_num_rows($vc);

if($all==0){
echo "&#351;ekili Beyenen olmay&#304;b <br/>";
}else{

echo "Cemi <u>$all</u> Nefer beyenib.<br/>";
$_v->divide();
$next_id = next_id($all);

$vot_es = mysql_query("SELECT `key`,`id`,`id_albom`,`vote`,`time` FROM `albom_vote` WHERE `id_albom` = '".$key."' ORDER BY `time` DESC LIMIT $next_id[start],$next_id[max_page];");
while($vie = mysql_fetch_array($vot_es)){
$del_b = $vie["key"];
$usid = $vie["id"];
$time = $vie["time"];
$vote = $vie["vote"];

$us = select_nk($usid);
$like_us = $us->user;
$zn = $us->zn;

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$like_us = "<img src=\"i/".$usid.".gif\" alt=\"{$view["user"]}\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($row['level']==9)echo "<a href=\"img_a.php?id=$id&amp;ps=$ps&amp;bol=votes&amp;del=".$del_b."&amp;key=$key&amp;mov={$mov}&amp;ref=$ref\">[x]</a>-\n";

echo "$zn<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$us->id."&amp;ref=$ref\">$like_us</a> - (".time_date($time).")<br/>";
}

if($next_id['a'] > $next_id['max_page']){
echo page_next("img_a.php?id=$id&amp;ps=$ps&amp;bol=votes&amp;key=$key&amp;mov={$mov}&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

}

$_v->divide();
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;img={$xx->id}{$takep}\">Geri qay&#305;t</a><br/>";

}
break;



case "vote" :

$vot = mysql_query("SELECT * FROM `albom` WHERE `id`='".$key."';");

$vt = mysql_fetch_array($vot);
$idfoto = $vt['idfoto'];
$key = $vt['id'];
$nick = select_nk($idfoto);

if($id == $idfoto){
  $_v->title('Xeta','ceter');
  $_v->fsize1($fsize1);
echo "<i>Oz &#350;ekilinizi beyene bilmezsiniz.</i><br/>----<br/>\n";
}else if(mysql_num_rows($vot) == 0 ){
  $_v->title('Xeta','ceter');
  $_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>\n";
}else{


$vc = mysql_query( "SELECT * FROM `albom_vote` WHERE `id_albom` = '".$key."' and `id` = '".$id."';" );
if(mysql_num_rows($vc) == 0){
$_v->title('Beyendin','center');
$_v->fsize1($fsize1);
echo "<u>Tebrikler</u><br/>----<br/>\"<b>{$nick->user}</b>\" &#350;ekilin Beyendiniz...\n";
mysql_query( "update albom set vote = vote+1 where id = '".$key."';" );
mysql_query( "INSERT INTO `albom_vote` SET id = '".$id."', time = '".$SERVER_TIME."', vote = '1', id_albom = '".$key."';" );

}else{

$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Siz <b>".$nick->user." </b>in &#350;ekilin art&#305;q Beyenmisiniz...\n";

}

}


$_v->divide();
echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;img={$nick->id}{$takep}\">Geri qay&#305;t</a><br/>";
break;


case "3" :

$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$key."';");
if ( mysql_affected_rows() == 0) {
$_v->title('xeta','center');
   $_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>";
break;
}

$arr = mysql_fetch_array($q);
$photo = $arr['photo'];
$info = $arr['info'];
$u_id = $arr['idfoto'];
$key = $arr['id'];

$uid = select_nk($u_id);

$_v->title('Silindi','center');
$_v->fsize1($fsize1);

if ( 8 <= $row['level'] || $id == $u_id ){



include("file/require/class_img.php" );

if($uid->image_fon == $photo){
mysql_query( "update `users` set `image_fon` = '' where id = '".$u_id."';" );
@unlink( @"photos/src/".$uid->image_fon);
}

mysql_query( "DELETE from `albom` where `id` = '".$key."';" );
@mysql_query( @"delete from `albom_vote` WHERE `id_albom` = '".$key."';" );
@mysql_query( @"delete from `albom_down` WHERE `id_albom` = '".$key."';" );
@mysql_query( @"delete from `albom_fikir` WHERE `key` = '".$key."';" );
mysql_query( "update `users` set `img` = `img`-1 where id = '".$u_id."';" );

@unlink( "photos/{$u_id}/{$photo}");


echo "<u>&#350;ekil Silindi...</u><br/>-<br/>";
}else{
echo "Sizin Bu &#350;ekili Silmeye &#304;xtiyar&#305;n&#305;z yoxdur...<br/>----<br/>\n";
}

echo "<a href=\"img_a.php?id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;img={$u_id}{$takep}\">Geri Qay&#305;t</a><br/>\n";
break;
}

if ( $rm != "" ){
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">&#199;ata Qay&#305;t</a><br/>\n";
}else if ( $x != "" ){
echo "<a href=\"galery.php?id={$id}&amp;ps={$ps}{$takep}\">Foto Qalereya</a><br/>\n";
}
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>