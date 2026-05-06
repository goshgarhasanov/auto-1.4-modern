<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


if($row["forumphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Foruma Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayn</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$forum_level = $row['forum'];


if($cmd=="4"){
if(!isset($_GET['uid']))$cmd="";
$uid = (int)$_GET['uid'];
$tema=@mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"));
$title = "M&#246;vzu";
$title2 = "Forum / $tema[name]";


}elseif($cmd=="3"){
if(!isset($_GET['uid']))$cmd="";
$uid = (int)$_GET['uid'];
$pod_cat=@mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$uid';"));
if(!isset($pod_cat["refid"]))
exit;
$cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$pod_cat[refid]';"));
$title = "$pod_cat[name] M&#246;vzular&#305;";
}elseif($cmd=="2"){

if(!isset($_GET['uid']))$cmd="";
$uid = (int)$_GET['uid'];
$cat=@mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$uid';"));
$title = "Forum - $cat[name]";
}elseif($cmd=="m"){
$qus = mysql_query ("Select `id`,`user` from `users` where `id` = '".$nk."';"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
$nk = $ind["id"];
if($nk==$id){
$user_forum_movzulari = "Sizin yaratd&#305;&#287;&#305; forum m&#246;vzular&#305;\n";
$title = "Sizin Forum M&#246;vzular&#305;n&#305;z";
}else{
$user_forum_movzulari = "<b>$u_user</b>, leqebli &#351;exsin yaratdiqi forum m&#246;vzular&#305;\n";
$title = "$u_user Forum M&#246;vzular&#305;";
$reflesh = "&amp;nk=$nk";
}
}else{
$nk = $id;
$user_forum_movzulari = "Sizin yaratd&#305;&#287;&#305; forum m&#246;vzular&#305;\n";
$title = "Sizin Forum M&#246;vzular&#305;n&#305;z";
}
}else{

$title = "&#220;mumi Forum";
}
$mygetname = "id=$id&amp;ps=$ps";

if($title2!="")$title1 = $title2;
else $title1 = $title;

$_v->title(''.$title1.'','left');
$_v->fsize1($fsize1);


switch($cmd) {
default:




if(file_exists("file/dat_folder/ref_forum/$id")){
$reg_forum = file("file/dat_folder/ref_forum/$id");
$reg_forum_time = trim($reg_forum[0]);
if ($reg_forum_time<$SERVER_TIME){
@unlink("file/dat_folder/ref_forum/$id");
}
}


if($forum_level >=2)
echo "<a href='forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref'>Admin-Panel</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=m&amp;nk=$id&amp;ref=$ref\">Sizin M&#246;vzular</a><br/>\n";

$new_q=mysql_query("SELECT * FROM `sh_new` ORDER BY `time` DESC LIMIT 3;");
if (mysql_affected_rows() != 0) {
echo "----<br/>\n";
while($new=mysql_fetch_array($new_q))
{
echo "<a href=\"forum.php?$mygetname&amp;cmd=1&amp;uid=$new[id]&amp;ref=$ref\">$new[name]</a><br/>\n";
if($new['description']!="")echo "<small>$new[description]</small><br/>\n";
}
echo "----<br/>\n";
};


$cat_q=mysql_query("SELECT * FROM `sh_cat` ORDER BY `abc` ASC;");
echo "<b>B&#246;lmeler:</b><br/>--------<br/>\n";
while($cat=mysql_fetch_array($cat_q))
{
//$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `cat`='$cat[id]' and `tesdiq`='2'");
//$temp = mysql_fetch_array($result00);
$num_pod=mysql_num_rows(mysql_query("SELECT * FROM `sh_podcat` WHERE `refid`='$cat[id]';"));
echo "<a href=\"forum.php?$mygetname&amp;cmd=2&amp;uid=".$cat["id"]."&amp;ref=$ref\">$cat[name]</a> [$cat[kataloq]/$cat[movzu]]<br/>\n";
}

echo "--------<br/>\n";
$actual_q=mysql_query("SELECT * FROM `sh_tem` WHERE `close`='0' and `tesdiq`='2' ORDER BY `time` DESC LIMIT 5");
echo "<u>Son 5 aktiv m&#246;vzu:</u><br/>\n";
while($actual=mysql_fetch_array($actual_q)){
$posl_post=mysql_fetch_array(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$actual[id]' ORDER BY `date` DESC;"));
$postov=mysql_num_rows(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$actual[id]' ORDER BY `date` DESC;"));
$us_av=mysql_query("SELECT * FROM `users` WHERE `id`='$posl_post[avtor]'");
$user_avtor=mysql_fetch_array($us_av);
$ddunen = date("d.m.Y",$SERVER_TIME);
$posl_post['date']=str_replace($ddunen, "D&#252;nen", $posl_post['date']);
$posl_post['date']=str_replace(date("d.m.Y",$SERVER_TIME), "Bu g&#252;n", $posl_post['date']);


echo "<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=".$actual['id']."&amp;ref=$ref\">$actual[name]</a>($postov) - [$posl_post[date] \n";
if(mysql_num_rows($us_av)==1)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;&amp;nk=".$user_avtor["id"]."&amp;ref=$ref\">".$user_avtor["user"]."</a>]<br/>";
else echo "Silinib[".$posl_post['avtor']."]]<br/>\n";}
if($id<11){
echo "----<br/><b>Statistika:</b><br/>\n";
echo "B&#246;lme: ".mysql_num_rows(mysql_query("SELECT * FROM `sh_cat`"))."<br/>\n";
echo "Kataloq: ".mysql_num_rows(mysql_query("SELECT * FROM `sh_podcat`"))."<br/>\n";
echo "M&#246;vzu: ".mysql_num_rows(mysql_query("SELECT * FROM `sh_tem` WHERE `tesdiq`='2'"))."<br/>\n";
}

echo $divide;
break;






case 'm':
$num = 10;
@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `avtor`='$nk' and `tesdiq`='2';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

if($rm>=60){
$filechat = "s_info.php";
}
else
{
$emocore = str_replace('windows ce', '', strtolower($HTTP_USER_AGENT));
$emo_pc = Array('linux', 'bsd', 'x11', 'unix', 'windows', 'mac');
foreach ($emo_pc as $fuck) 
{
if (strpos($emocore, $fuck) !== false) {
$mc = 1;
}}
if($mc=="1"){$filechat = "inside.php";}else {$filechat = "cs_inf.php";}
}


if($posts<=0){
if($id!=$nk)
echo "<b>$u_user</b>, leqebli istifade&#231;i he&#231;bir m&#246;vzu yaratmay&#305;b...<br/>----<br/>\n";
else
echo "Siz he&#231;bir m&#246;vzu yaratmay&#305;bs&#305;z...<br/>----<br/>\n";
if($rm!="")echo "<a href=\"$filechat?$mygetname&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}
else
{
$podcat_query=@mysql_query("SELECT * FROM `sh_tem` where `avtor`='$nk' and `tesdiq`='2' ORDER BY `time` DESC LIMIT $start,$num;");
echo "<i>$user_forum_movzulari</i><br/>----<br/>";
while($pod_cat=mysql_fetch_array($podcat_query))
{
$tarix_s=mysql_query("SELECT * FROM `sh_post` where `tema`='".$pod_cat["id"]."' ORDER BY `time` ASC;");
$t_s=mysql_fetch_array($tarix_s);

if($t_s["time"]<($SERVER_TIME-86400))
$tarix = "[".date('d.m.Y H:i', $t_s["time"])."]";
else
$tarix = "Bu g&#252;n (".date('H:i', $t_s["time"]).")";

echo "<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=".$pod_cat["id"]."&amp;ref=$ref\">".$pod_cat["name"]."</a> ".$tarix."<br/>\n";

}



$url_for_pstr="forum.php?$mygetname&amp;cmd=$cmd$reflesh&amp;page=";

if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";


if ($total > 1)
{
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'<br/>';
}








echo "----<br/>\n";
}
if($rm!="")echo "<a href=\"$filechat?$mygetname&amp;rm=$rm&amp;nk=$nk&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

break;



case 'yeni':

if(!isset($_GET['uid']))$error .= "Kataloq Se&#231;memisiz.<br/>";
$uid = (int)$_GET['uid'];
$podcat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$uid';"));
if(!$podcat)$error .= "Kataloq Tap&#305;lmad&#305;.<br/>";
if(!$error){
if(!isset($_POST['name']) and !isset($_POST['text']))
{



////////////////////DAT FILE
$file = file("file/dat_folder/forum_confiq.dat");
$dat_fdeyer = trim($file[0]);//qiymet
$dat_fbalpost = trim($file[1]);///okkkkkkkkkkkkk
$dat_fkecersiz = trim($file[2]);

$ballazim=0;
if($dat_fbalpost==1)
{
$dat_bal = bal;
}
else
{
$dat_bal = posts;
}


if($dat_fkecersiz==1)
{
if($forum_level==0)
$ballazim = 1;
}
elseif($dat_fkecersiz==2)
{
if($forum_level<=1 and $row["level"]<=3)
$ballazim = 1;
}

elseif($dat_fkecersiz==3)
{
$ballazim = 0;
}

elseif($dat_fkecersiz==4)
{
$ballazim = 1;
}
else
{
echo "Forum qur&#287;ular&#305; d&#252;zg&#252;n deyil. (Rehberliye m&#252;raciet edin)<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}

if($ballazim==1)
{
if($dat_bal==posts){
$deyishenfiled = "Post";
if($row['posts']<$dat_fdeyer)
echo "<u>Sizin hesab&#305;n&#305;zdan Post c&#305;x&#305;lmayacaq sadece postu $dat_fdeyer  &#231;ox olan istifade&#231;iler m&#246;vzu yarada biler.</u><br/>----<br/>\n";
}
else
{
$deyishenfiled = "bal";
if($row['bal']<$dat_fdeyer)
$qeyd = "<br/><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a>";
else
$qeyd = "";
echo "M&#246;vzu yaratmaq  \"<b>$dat_fdeyer $deyishenfiled</b>\" deyerindedir.$qeyd<br/>----<br/>";

}


}




echo '<i>Yeni M&#246;vzu yarat</i><br/>----<br/>';

////////////////////SON DAT


$_v->action("forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref");
echo "M&#246;vzunun ad&#305;:<br/>";
print $_v->input("<input name=\"name$ref\" maxlength=\"50\" emptyok=\"true\"/>").'<br/>';

echo "M&#246;vzu:<br/>";
print $_v->input("<input name=\"text$ref\" maxlength=\"1000\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yarat','action=save');
echo "----<br/>\n";

echo "<a href=\"forum.php?$mygetname&amp;cmd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
}
else 
{
$mysec=@mysql_query("SELECT * FROM `sh_tem` WHERE `cat` = '".$uid."' ORDER BY `id` desc"); 
$suid = @mysql_fetch_array($mysec);
$s_u_id=$suid['avtor'];
$s_u_id1=$suid['cat'];
$kid=$suid['id'];

if(strlen($_POST['text'])<50) $error = 'M&#246;vzunu &#231;ox q&#305;sa yazm&#305;s&#305;z, M&#246;vzunun metini &#231;ox olmal&#305;d&#305;r!<br/>';
if(strlen($_POST['name'])>60) $error = 'M&#246;vzunu ad&#305; 50 herfden &#231;ox olmamal&#305;d&#305;r!<br/>';

if($_POST['name']=="")$error = "M&#246;vzunun ad&#305;n&#305; yazmam&#305;s&#305;z.<br/>";
if($_POST['text']=="")$error = "M&#246;vzunu yazmam&#305;s&#305;z.<br/>";

if($id==$s_u_id)
{
$error = "Tez-tez m&#246;vzu yaratmaq olmaz, sonuncu m&#246;vzunu Siz yarad&#305;bs&#305;z.<br/>";
}

if(!$error){
$name=$_POST['name'];
$text=$_POST['text'];



$name = in_smile(narmobil($name));
$text = in_smile(narmobil($text));



////////////////////DAT FILE
$file = file("file/dat_folder/forum_confiq.dat");
$dat_fdeyer = trim($file[0]);
$dat_fbalpost = trim($file[1]);
$dat_fkecersiz = trim($file[2]);
if($dat_fkecersiz==1)
{
if($forum_level==0)
$ballazim = 1;
}
elseif($dat_fkecersiz==2)
{
if($forum_level==0 and $row["level"]<=3)
$ballazim = 1;
}
elseif($dat_fkecersiz==3)
{
$ballazim = 0;
}
elseif($dat_fkecersiz==4)
{
$ballazim = 1;
}
else
{
echo "Forum qur&#287;ular&#305; d&#252;zg&#252;n deyil. (Rehberliye m&#252;raciet edin)<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}


if($dat_fbalpost==1)
{
$dat_bal = bal;
}
else
{
$dat_bal = posts;
}

if($ballazim==1)
{



if($dat_bal==bal){
$updatebalcixilsin = "`bal`=`bal`-'$dat_fdeyer'";
if($row['bal']<$dat_fdeyer){
echo "M&#246;vzu yaratmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda \"<b>$dat_fdeyer bal</b>\" olmal&#305;d&#305;r.<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}
}elseif($dat_bal==posts){
$updatebalcixilsin = "`bal`=`bal`";
if($row['posts']<$dat_fdeyer){
echo "M&#246;vzu yaratmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda \"<b>$dat_fdeyer Post</b>\" olmal&#305;d&#305;r.$qeyd<br/>\n";
echo "<u>Sizin hesab&#305;n&#305;zdan Post c&#305;x&#305;lmayacaq sadece postu $dat_fdeyer  &#231;ox olan istifade&#231;iler m&#246;vzu yarada biler.</u><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}
}



}
////////////////////SON DAT
$dat_ftesdiq = trim($file[6]);

$date=date("d.m.Y H:i",$SERVER_TIME);
$add_topic=mysql_query("INSERT INTO `sh_tem` SET name='$name', `time`='$SERVER_TIME', `cat`='$uid', `avtor`='$id', `tesdiq`='$dat_ftesdiq';");


if($add_topic){
$updatepodforum = "";

$id_topic=mysql_insert_id(); 
$add_post=mysql_query("INSERT INTO `sh_post` SET avtor='$id', date='$date', text='$text', tema='$id_topic', `time`='$SERVER_TIME';");
$plus_post_me=$row['fpost']+1;
$plus_post_podcat_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$uid';")); 
$plus_post_podcat=$plus_post_podcat_q['post']+1;



if($dat_ftesdiq==2) $updatepodforum = "`fpost`='$plus_post_me'";

if($updatepodforum!="")
$updatebalcixilsin = ", $updatebalcixilsin";

mysql_query("UPDATE `users` SET  ".$updatepodforum." ".$updatebalcixilsin." WHERE `id`='$id';");

if($dat_ftesdiq==2) {
//@mysql_query("UPDATE `sh_podcat` SET `post`='$plus_post_podcat' WHERE id='$uid'");
@mysql_query("UPDATE `sh_cat` SET `movzu`=1+`movzu` WHERE `id`='$plus_post_podcat_q[refid]';");
}

if($add_post)echo "Sizin Qeyd etdiyiniz m&#246;vzu yarad&#305;ld&#305;.<br/>\n";
if($dat_ftesdiq!=2)echo "Forum idarecileri Sizin M&#246;vzunu tesdiqlemesini g&#246;zleyin<br/>\n";
if($add_post)echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cd&amp;uid=$uid&amp;ref=$ref\">B&#246;lmeye Qay&#305;t</a><br/>\n";

}
else echo "Xeta <br/>----<br/><a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
else
{

echo $error;
$_v->action("forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref");
echo "<br/>M&#246;vzunun ad&#305;:<br/>";
print $_v->input("<input name=\"name$ref\" value=\"".$_POST['name']."\" maxlength=\"50\" emptyok=\"true\"/>").'<br/>';

echo "M&#246;vzu:<br/>";
print $_v->input("<input name=\"text$ref\" maxlength=\"1000\" value=\"".$_POST['text']."\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yarat','action=save');
echo "----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
}
}
}
else
{
echo $error;
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
}
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;










/////////////////////// Xeberlere aitdir
case '1':
if(!isset($_GET['uid'])) {
echo "Xeber Se&#231;ilmeyib. <br/>----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
break;
}
else if(isset($_GET['edit']) and $forum_level>=3)//admin deyishe biler furvin 3
{
$uid=$_GET['uid'];
if(!$new=mysql_fetch_array(mysql_query("SELECT * FROM `sh_new` WHERE `id`='$uid'"))){
echo "Xeber tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
break;
}


if(!isset($_POST['name'])){
$_v->action("forum.php?$mygetname&amp;cmd=1&amp;uid=$uid&amp;edit");

echo "<b>Xeberin ad&#305;</b><br/>\n";
print $_v->input("<input name=\"name$ref\" value=\"$new[name]\"  maxlength=\"100\" emptyok=\"true\"/>").'<br/>';


echo "<u>Text S&#246;z</u><br/>\n";
print $_v->input("<input name=\"desc$ref\" value=\"$new[description]\"  maxlength=\"1000\" emptyok=\"true\"/>").'<br/>';


echo "<i>Xeberin mezmunu</i><br/>\n";

print $_v->input("<input name=\"text$ref\" value=\"$new[text]\"  maxlength=\"400\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Elave et','action=save');

echo "<br/>\n";
}
else if($_POST['text']!='' and $_POST['name']!='')
{


$text = narmobil($text);
$desc = narmobil($desc);
$name = narmobil($name);


if(mysql_query("UPDATE `sh_new` SET `text`='".$text."', `description`='".$desc."', `name`='".$name."' WHERE `id`='$uid';"))
echo "Xeber Yenilendi<br/>\n";
else echo mysql_error().'Xeta';
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a>\n";

}
else if(isset($_GET['del']) and $forum_level>=3)//admin sile biler furvin 3
{
$uid=$_GET['uid']; 
if(!$new=mysql_fetch_array(mysql_query("SELECT * FROM `sh_new` WHERE `id`='$uid';"))){
echo "Xeber tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
break;
}
if(mysql_query("DELETE FROM `sh_new` WHERE `id`='$uid'"))echo "Xeber silindi<br/>----<br/>\n";
else echo mysql_error().'Xeta<br/>----<br/>';
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a>\n";
}
else
{
$uid = (int)$_GET['uid'];
if(@mysql_fetch_array(mysql_query("SELECT * FROM `sh_new` WHERE `id`='$uid';"))){
$new_q=mysql_query("SELECT * FROM `sh_new` WHERE `id`='$uid'");
if(mysql_num_rows($new_q) != 0)
{
function shch($msg){
$msg = str_replace("[/b]", "</b>", $msg);
$msg = str_replace("[b]", "<b>", $msg);
$msg = str_replace("[/u]", "</u>", $msg);
$msg = str_replace("[u]", "<u>", $msg);
$msg = str_replace("[/i]", "</i>", $msg);
$msg = str_replace("[i]", "<i>", $msg);
$msg = str_replace("[br]", "<br/>", $msg);
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);
return $msg;
}


while($new=mysql_fetch_array($new_q))
{
$user_avtor=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$new[avtor]';"));
if(!$user_avtor)$avtor="Silinib.".$new['avtor'];
else $avtor="<a href=\"inside.php?$mygetname&amp;nk=$user_avtor[id]&amp;ref=$ref\">$user_avtor[user]</a>\n";
//Tarix:</b> $new[date]<br/>-------<br/>
$_v->align('center');
echo "<b>$new[name]</b><br/>-------<br/>";
$_v->align('left');
echo "".shch($new['text'])."M&#252;ellif: $avtor<br/>\n";
}
if($forum_level>=3)echo "<a href=\"forum.php?$mygetname&amp;cmd=1&amp;uid=$uid&amp;edit&amp;ref=$ref\">Edit</a> | <a href=\"forum.php?$mygetname&amp;cmd=1&amp;uid=$uid&amp;del\">Delete</a><br/>----<br/>\n";

}
}
else 
echo "Xeber Tap&#305;lmad&#305;<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
}
break;
/////////////////////////////////////////////////////////////////



case '2':
if(isset($_GET['uid'])){

$uid = (int)$_GET['uid'];

if ($cat) {
$podcat_query=mysql_query("SELECT * FROM `sh_podcat` where `refid`='$uid';");
if(mysql_num_rows($podcat_query)>0){
echo "<u>Kataloq se&#231;in</u>\n<br/>----<br/>\n";
while($pod_cat=mysql_fetch_array($podcat_query))
{
$tem_num=mysql_num_rows(mysql_query("SELECT * FROM `sh_tem` WHERE `cat`='$pod_cat[id]' and `tesdiq`='2';"));
echo "<a href=\"forum.php?$mygetname&amp;cmd=3&amp;uid=".$pod_cat["id"]."&amp;ref=$ref\">".$pod_cat["name"]."</a> [".$tem_num."]<br/>\n";
}
echo "----<br/>\n";
}
else echo "Bu b&#246;lmede Kataloq yaradilmay&#305;b...<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
}
else
{
echo "Bele B&#246;lme yoxdur...<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
}
}
else
{
echo "Bele B&#246;lme yoxdur...<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
}
break;


case '3':
if(!$cat or !$pod_cat){ echo "Daxil olmaq istediyiniz kataloq m&#246;vcut deyil.<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
}else{
echo "<i><a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cmd&amp;uid=$uid&amp;ref=$ref\">Yeni M&#246;vzu yarat</a></i><br/>\n";

echo "----<br/>\n";
$num = 10;@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `cat`='$uid' and `tesdiq`='2';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

$tem_q=mysql_query("SELECT * FROM `sh_tem` WHERE `cat`='$uid' and `tesdiq`='2' ORDER BY `time` DESC LIMIT $start,$num;");
if($posts != 0) {
while($tema=mysql_fetch_array($tem_q)) {
$posl_post=mysql_fetch_array(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$tema[id]' ORDER BY `date` DESC;"));
$postov=mysql_num_rows(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$tema[id]' ORDER BY `date` DESC;"));
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$posl_post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);

$ddunen = date("d.m.Y",($SERVER_TIME-86400));
$posl_post['date']=str_replace($ddunen, "D&#252;nen", $posl_post['date']);
$posl_post['date']=str_replace(date("d.m.Y",$SERVER_TIME), "Bu g&#252;n", $posl_post['date']);


if($tema['close']==1)echo "<img src=\"img/lock.gif\" alt=\"[X]\"/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$tema[id]&amp;ref=$ref\">$tema[name]</a> (".($postov-1).") [<u>$posl_post[date]</u>]\n";
if(mysql_num_rows($us_q)==0)echo " <b>Silinib</b>.$posl_post[avtor]<br/>";
else echo " <b>$user_avtor[user]</b><br/>\n";

}

//
$url_for_pstr="forum.php?$mygetname&amp;cmd=3&amp;uid=$uid&amp;page=";

if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";


if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'<br/>';
}
echo "----<br/>\n";
}
else echo "Bu Kataloqda he&#231;bir M&#246;vzu yoxdur.<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a>&#0187;\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=2&amp;uid=$cat[id]&amp;ref=$ref\">$cat[name]</a><br/>\n";
}

break;

case '4':
$uid=$_GET['uid']; 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if($_POST["text"]!=""){//
$tema_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`=$_POST[tema] and `close`='0';"));
if(!$tema_q)$errormesaj .= "M&#246;vzu tap&#305;lmad&#305;.<br/>";
if(!isset($_POST['text']) or trim($_POST['text'])=='') $errormesaj .="Mesaj yazmam&#305;s&#305;n&#305;z.<br/>\n";
if(!$errormesaj){




////////////////////DAT FILE
$file = file("file/dat_folder/forum_confiq.dat");
$dat_sdeyer = trim($file[3]);
$dat_sbalpost = trim($file[4]);
$dat_skecersiz = trim($file[5]);


$ballazim=0;
if($dat_sbalpost==1)
{
$dat_bal = bal;
}
else
{
$dat_bal = posts;
}



if($dat_skecersiz==1)
{
if($forum_level==0)
$ballazim = 1;
}
elseif($dat_skecersiz==2)
{
if($forum_level<=1 and $row["level"]<=3)
$ballazim = 1;
}

elseif($dat_skecersiz==3)
{
$ballazim = 0;
}

elseif($dat_skecersiz==4)
{
$ballazim = 1;
}
else
{
echo "Forum qur&#287;ular&#305; d&#252;zg&#252;n deyil. (Rehberliye m&#252;raciet edin)<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=yeni&amp;cd=$cd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}




if($ballazim==1)
{
if($dat_bal==posts){
$deyishenfiled = "post";

if($row['posts']<$dat_sdeyer)
$qeyd = "<u>Sizin hesab&#305;n&#305;zdan Post c&#305;x&#305;lmayacaq sadece postu $dat_sdeyer  &#231;ox olan istifade&#231;iler fikir bildire biler.</u><br/>";
}
else
{
$deyishenfiled = "bal";

if($row['bal']<$dat_sdeyer){
$qeyd = "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>";
}
else
{
mysql_query("UPDATE `users` SET `bal`=`bal`-1 WHERE id='$id';");
}

}
if(strlen($qeyd)>=50){
echo "$qeyd Fikir bildirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda \"<b>$dat_sdeyer $deyishenfiled</b>\" olmal&#305;d&#305;r.$qeyd<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;page=$page&amp;ref=$ref\">Geri qay&#305;</a><br/>\n";
break;
}

}

////////////////////SON DAT

$plus_post_podcat_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema_q[cat]';")); 
$plus_post_podcat=$plus_post_podcat_q['post']+1;
$plus_post_cat_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$plus_post_podcat_q[refid]';"));
$plus_post_cat=$plus_post_cat_q['post']+1;


$time_sec=45;

$reg_forum_time = 0;
if(file_exists("file/dat_folder/ref_forum/$id")){
$reg_forum = file("file/dat_folder/ref_forum/$id");
$reg_forum_time = trim($reg_forum[0]);
}

if (@$reg_forum_time<$SERVER_TIME)
{
$date=date("d.m.Y H:i",$SERVER_TIME);
$text=$_POST['text']; 
$tema1=$_POST['tema'];
$text = substr($text,0,550);


$text = in_smile(narmobil($text));

$file = fopen("file/dat_folder/ref_forum/$id", "w");
fwrite($file, $SERVER_TIME+$time_sec);
fclose($file);


$reg_forum_time=$SERVER_TIME+$time_sec;
$insert_post=mysql_query("INSERT INTO `sh_post` SET `avtor`='$id', `date`='$date', `text`='$text', `tema`='$tema1', `time`='$SERVER_TIME';");
if($insert_post){
$mesajadd .= "Mesaj&#305;n&#305;z elave edildi.<br/>";
mysql_query("UPDATE `sh_podcat` SET `post`='$plus_post_podcat' WHERE id=$tema_q[cat]");
mysql_query("UPDATE `sh_tem` SET `time`='$SERVER_TIME' WHERE id='$tema1';");
$mesajadd .= mysql_error();
}
else $mesajadd .= "Mesaj elave edilmedi yeniden qeyd edin...<br/>".mysql_error();
}
else 
{
$time_sec=$reg_forum_time-$SERVER_TIME;

$valuemesaj = trim(htmlspecialchars($_POST['text']));

$mesajadd .= ' '.$time_sec.' saniyyeden sonra mesaj yaza bilersiz!<br/>';
}
}
else
$mesajadd = $errormesaj;
}

if(isset($_GET['edit1']) and $forum_level==3)
{
$edit1=abs($_GET['edit1']); 
if(!$edit_tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
ob_end_flush();
break;
}
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `id`='$edit1'  LIMIT 1;");
$post=mysql_fetch_array($post_q);

if(!isset($_POST['editmovzu'])){

$_v->action("forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref");

echo "M&#246;vzunun ad&#305;<br/>";

print $_v->input("<input name=\"name$ref\" maxlength=\"50\" value=\"$edit_tema[name]\" emptyok=\"true\"/>").'<br/>';

echo "M&#246;vzu<br/>";
print $_v->input("<input name=\"editmovzu$ref\" maxlength=\"500\" value=\"".$post['text']."\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Deyi&#351;dir','action=save');

echo "<br/>\n";
}
else if(trim($_POST['name'])!= '' ){


if(strlen($_POST['editmovzu'])<10) $error = "M&#246;vzunu &#231;ox q&#305;sa yazm&#305;s&#305;z, R&#252;tbeli olduqunuz &#252;&#231;&#252;n 10 simvoldan &#231;ox yazmal&#305;s&#305;z!<br/>";
if(strlen($_POST['name'])>60) $error .= "M&#246;vzunu ad&#305; 50 herfden &#231;ox olmamal&#305;d&#305;r!<br/>";


if($error){
echo $error."\n";  
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}

function shch($msg){
$msg = substr($msg,0,320);
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);
return $msg;
}
$name = shch(narmobil($name));
$editmovzu = shch(narmobil($editmovzu));

if(mysql_query("UPDATE `sh_tem` SET `name`='$name' WHERE `id`='$uid';") and mysql_query("UPDATE `sh_post` SET `text`='".$editmovzu."' WHERE `id`='$edit1';"))
echo "Melumat Yenilendi<br/>\n";  
else echo mysql_error().'Xeta';

}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}
elseif(isset($_GET['edit']) and $forum_level==3)
{
$edit=abs($_GET['edit']); 
if(!$edit_tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_post` WHERE `id`='$edit';"))){
echo "Mesaj tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}



if(!isset($_POST['editmesaj'])){

$edit_tema['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $edit_tema['text']); 
$edit_tema['text'] = preg_replace("|\"/>+|isU", "", $edit_tema['text']); 

$_v->action("forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;edit=$edit&amp;ref=$ref");

echo "Mesaj<br/>";

print $_v->input("<input name=\"editmesaj$ref\" maxlength=\"300\" value=\"$edit_tema[text]\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Deyi&#351;dir','action=save');
echo "<br/>\n";

}
else if(trim($_POST['editmesaj'])!= '' ){


function shch($msg){
$msg = substr($msg,0,320);
return $msg;
}
$text = in_smile(shch(narmobil($_POST['editmesaj'])));

if(mysql_query("UPDATE `sh_post` SET `text`='".$text."' WHERE `id`='$edit';"))
echo "Mesaj deyi&#351;dirildi.<br/>\n";  
else echo mysql_error().'Xeta';
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;page=$page&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}

else if(isset($_GET['del1']) and $forum_level==3)
{
$uid=abs($_GET['uid']); 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}


$postov_v_cate=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));


echo "M&#246;vzu silindi<br/>"; 
mysql_query("UPDATE `sh_tem` SET `tesdiq`='3' WHERE `id`='$uid';");
mysql_query("UPDATE `sh_post` SET `tesdiq`='3' WHERE `id`='$uid';");

mysql_query("UPDATE `sh_cat` SET `movzu`=`movzu`-1 WHERE `id`='$postov_v_cate[refid]';");
mysql_query("UPDATE `users` SET  `fpost`=`fpost`-1 WHERE `id`='".$tema["avtor"]."';");


echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
else if(isset($_GET['del']) and $forum_level>=2)
{
mysql_query("DELETE FROM `sh_post` WHERE `id`='$del';");

echo "Mesaj silindi<br/>\n"; 
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";


break;
}
else if(isset($_GET['cl']) and $forum_level>=2)
{
$uid=$_GET['uid']; 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
if($_GET['cl']==1){
if(mysql_query("UPDATE `sh_tem` SET `close`='1' WHERE `id`='$uid';"))echo "M&#246;vzu ba&#287;land&#305;<br/>\n";
}
else 
{
if(mysql_query("UPDATE `sh_tem` SET `close`='0' WHERE `id`='$uid';"))echo "M&#246;vzu a&#231;&#305;ld&#305;<br/>\n";
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

if(!$tema) {
echo "M&#246;vzu Tap&#305;lmad&#305;";
echo "<br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$podcat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));
$cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE id='$podcat[refid]';"));

$i=1;
$num = 8;
@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_post` where `tema`='$uid';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
//$start = $start+1;
$iz = $page*$num-$num+1;
$i = $iz;
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$uid' ORDER BY `time` LIMIT $start,$num;");
if($posts !=0){
if($page!=1){$abcdef=$page*$num-1; //echo "$abcdef";
}
while($post=mysql_fetch_array($post_q)){
if ($row["smiles"]==0){
$post['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $post['text']); 
$post['text'] = preg_replace("|\"/>+|isU", "", $post['text']); 
}
if($i==1){

$_v->align('center');
echo "<b><u>$tema[name]</u></b><br/>------<br/>\n";
$_v->align('left');
echo "".$post["text"]."<br/>------<br/>\n";
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);
$date=date("ndHis",$SERVER_TIME); 

if(mysql_num_rows($us_q)==0)
echo "Silinib$post[avtor]";
else 
echo "M&#252;ellif: <a href='inside.php?$mygetname&amp;nk=$post[avtor]&amp;ref=$ref'>$user_avtor[user]</a>\n";

$post['date']=str_replace(date("d.m.Y",$SERVER_TIME), "Bu g&#252;n", $post['date']);

echo "<br/>Tarix: [$post[date]]\n";
if($forum_level==3)echo "<br/>[<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;edit1=$post[id]&amp;ref=$ref\">Edit</a>] [<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;del1&amp;ref=$ref\">Delete</a>]\n";

echo "<br/>=============<br/>\n";
}else{
if($i!=2)echo "----<br/>";
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);

$us_q = mysql_query ("Select `user` from `users` where `id` = '".$post["avtor"]."';"); 
if (mysql_affected_rows() != 0) {
$user_avtor = mysql_fetch_array ($us_q); 
$u_user = $user_avtor["user"];
$u_user = "<a href=\"inside.php?$mygetname&amp;nk=".$post["avtor"]."&amp;ref=$ref\">$u_user</a>\n";
}else{
$u_user = "<b>Silinib</b>#".$post["avtor"]."";
}

echo " $u_user\n";
if($forum_level==3)echo "[<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;page=$page&amp;edit=$post[id]&amp;ref=$ref\">E</a>]";
if($forum_level>=2)echo "[<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;page=$page&amp;del=$post[id]&amp;ref=$ref\">X</a>]\n";

$post['date']=str_replace(date("d.m.Y",$SERVER_TIME), "Bu g&#252;n", $post['date']);

echo " [".$post["date"]."]<br/>".$post["text"]."<br/>\n";
}
$i++;
}


//
$url_for_pstr="forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;page=";
if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";

if ($total > 1)
{
echo "----<br/>\n";

Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<b>".$page."</b>".$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage."<br/>".$nazad." ".$vpered;
echo "<br/>----<br/>\n";
}
//
}
else
{
$colse=1;
echo "He&#231;bir mesaj yoxdur<br/>----<br/>";
}
if($colse!=1){
if($mesajadd!="")$mesajadd ='<i>'.$mesajadd.'</i>';
if($tema['close']==0){

echo "<br/>".$mesajadd." Mesaj yazmaq<br/>";
$_v->action("forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;page=$page&amp;ref=$ref");

print $_v->input("<input name=\"text$ref\" maxlength=\"300\" value=\"$valuemesaj\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('G&#246;nder','tema='.$uid.'');
echo "<br/>\n";

} else if($tema['close']==1){echo "<b>Bu m&#246;vzu ba&#287;l&#305;d&#305;r.</b><br/>----<br/>\n";}

if($tema['close']==0 and $forum_level>=2)echo "<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;cl=1&amp;ref=$ref\">[M&#246;vzunu ba&#287;la]</a><br/>----<br/>\n";
elseif($tema['close']==1 and $forum_level>=2)echo "<a href=\"forum.php?$mygetname&amp;cmd=4&amp;uid=$uid&amp;cl=0&amp;ref=$ref\">[M&#246;vzunu a&#231;]</a><br/>----<br/>\n";
}


echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> \n";
if($podcat && $cat)echo "&#0187; <a href='forum.php?$mygetname&amp;cmd=2&amp;uid=$cat[id]&amp;ref=$ref'>$cat[name]</a> &#0187; <a href='forum.php?$mygetname&amp;cmd=3&amp;uid=$podcat[id]&amp;ref=$ref'>$podcat[name]</a><br/>";

break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




case 'f1':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}
$forum_q=mysql_query("SELECT * FROM `sh_cat` ORDER BY `abc` ASC;");
echo "<b>Forum Panel</b><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f5&amp;ref=$ref\">Xeber yaz</a> |\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f2&amp;yeni&amp;ref=$ref\">Yeni B&#246;lme</a><br/>----<br/>\n";




while($forum=mysql_fetch_array($forum_q))
{
$num_pod=mysql_num_rows(mysql_query("SELECT * FROM `sh_podcat` WHERE `refid`='$forum[id]';")); 
echo "<a href=\"forum.php?$mygetname&amp;cmd=f2&amp;uid=".$forum["id"]."&amp;ref=$ref\">$forum[name]</a> [$forum[kataloq]/$forum[movzu]]
[<a href=\"forum.php?$mygetname&amp;cmd=f2&amp;edit=".$forum["id"]."&amp;ref=$ref\">edit</a>]-[<a href=\"forum.php?$mygetname&amp;cmd=f2&amp;del=".$forum["id"]."&amp;ref=$ref\">x</a>]<br/>\n";
}
echo "----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=mov&amp;ref=$ref\">M&#246;vqey</a><br/>\n";

echo "<a href=\"forum.php?$mygetname&amp;cmd=tesdiq&amp;ref=$ref\">Tesdiqlenme</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=delete&amp;ref=$ref\">Silinmi&#351; m&#246;vzular</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=fq&amp;ref=$ref\">Forum Qur&#287;ular</a><br/>----<br/>\n";

echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;




case 'mov':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}
if(!isset($_POST['edit']))
{
echo "<b>M&#246;vqey</b><br/>----<br/>\n";

$i=1;


$_v->action("forum.php?id=$id&amp;ps=$ps&amp;cmd=mov&amp;ref=$ref");

$forum_q=mysql_query("SELECT * FROM `sh_cat` ORDER BY `abc` ASC;");
while($forum=mysql_fetch_array($forum_q))
{
$option =  "<select name=\"fdeyer_$i$ref\">|";	
$forum_q1=mysql_query("SELECT * FROM `sh_cat` WHERE `id` = '".$forum['id']."' ORDER BY `abc` ASC;");
while($forum1=mysql_fetch_array($forum_q1))
{
$option .= "<option value=\"$forum[abc]:$forum[id]\">$forum[name]</option>|";
}
$forum_q1=mysql_query("SELECT * FROM `sh_cat` WHERE `id` != '".$forum['id']."' ORDER BY `abc` ASC;");
while($forum1=mysql_fetch_array($forum_q1))
{
$option .= "<option value=\"$forum1[abc]:$forum1[id]\">$forum1[name]</option>|";
}
$i++;
$option .= "</select>";
print $_v->select($option).'<br/>';

}

//
print $_v->submit('Yenile','edit=list');
/*
for ($j=1; $j<=$i; $j++){
$f = $j-1;
echo "<postfield name=\"fdeyer_$f\" value=\"$(fdeyer_$f$ref)\"/>\n";
}
echo "<postfield name=\"edit\" value=\"list\"/>\n";
echo "</go></anchor><br/>----<br/>\n";*/
echo "<br/>";
}
else
{




$i=1;
$forum_q1=mysql_query("SELECT * FROM `sh_cat` ORDER BY `abc` ASC;");
while($forum1=mysql_fetch_array($forum_q1))
{

$id_text = explode(":",$_POST["fdeyer_".$i]);
$abc_text = trim($id_text[0]);
$id_text = trim($id_text[1]);

$updateref = "update".$i;
$$updateref = "UPDATE `sh_cat` SET `abc`='".$forum1["abc"]."' where  `abc`='".$abc_text."' and `id`='".$id_text."';";

$say_abc_text.=$abc_text;
$i++;
}
$i = $i-1;

$no_access = "";

for ($j=1;$j<=$i;$j++){
if (!eregi($j, $say_abc_text)) 
$no_access .= "not";
}


if($no_access=="not"){

echo "D&#252;zg&#252;n formada s&#305;ralay&#305;n...<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=mov&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";	

echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";	

break;
}


for ($j=1;$j<=$i;$j++){
$update = "update".$j;
mysql_query($$update);
}
echo "M&#246;vqey se&#231;ildi! <br/>----<br/>\n";


}
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";	
break;


case 'deaktiv':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}
$uid = (int)$_GET['uid'];
$tema=@mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='1';"));


if(isset($_GET['edit1']) and $forum_level==3)
{
$edit1=abs($_GET['edit1']); 
if(!$edit_tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu taps#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
ob_end_flush();
break;
}
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `id`='$edit1'  LIMIT 1;");
$post=mysql_fetch_array($post_q);

if(!isset($_POST['editmovzu'])){

$post['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $post['text']); 
$post['text'] = preg_replace("|\"/>+|isU", "", $post['text']); 
$_v->action("forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref");

echo "M&#246;vzunun ad&#305;<br/>";
print $_v->input("<input name=\"name$ref\" maxlength=\"50\" value=\"$edit_tema[name]\" emptyok=\"true\"/>").'<br/>';

echo "M&#246;vzu<br/>";
print $_v->input("<input name=\"editmovzu$ref\" maxlength=\"1000\" value=\"".$post['text']."\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','action=save');
echo "<br/>\n";
}
else if(trim($_POST['name'])!= '' ){


if(strlen($_POST['editmovzu'])<10) $error = "M&#246;vzunu &#231;ox q&#305;sa yazm&#305;s&#305;z, R&#252;tbeli olduqunuz &#252;&#231;&#252;n 10 simvoldan &#231;ox yazmal&#305;s&#305;z!<br/>";
if(strlen($_POST['name'])>60) $error .= "M&#246;vzunu ad&#305; 50 herfden &#231;ox olmamal&#305;d&#305;r!<br/>";


if($error){
echo $error."\n";  
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}


$name = narmobil($name);
$text = in_smile(narmobil($editmovzu));


if(mysql_query("UPDATE `sh_tem` SET `name`='$name' WHERE `id`='$uid';") and mysql_query("UPDATE `sh_post` SET `text`='".$text."' WHERE `id`='$edit1';"))
echo "Melumat Yenilendi<br/>\n";  
else echo mysql_error().'Xeta';
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}
else if(isset($_GET['del1']) and $forum_level==3)
{
$uid=abs($_GET['uid']); 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='1';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}
$postov_v_teme=mysql_num_rows(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$uid';"));
$postov_v_cate=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));
$postov_v_forume=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$postov_v_cate[refid]';"));

$budet_v_forume=$postov_v_forume['post']-1;


echo "M&#246;vzu silindi<br/>"; 
mysql_query("UPDATE `sh_tem` SET `tesdiq`='3' WHERE `id`='$uid';");
mysql_query("UPDATE `sh_post` SET `tesdiq`='3' WHERE `id`='$uid';");


echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=tesdiq&amp;uid=$postov_v_cate[refid]&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
else if(isset($_GET['tesdiq']))
{
$uid=abs($_GET['uid']); 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='1';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=tesdiq&amp;&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$postov_v_teme=mysql_num_rows(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$uid';"));
$postov_v_cate=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));
$postov_v_forume=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$postov_v_cate[refid]';"));

$budet_v_forume=$postov_v_forume['post']-1;



$user_id_select=mysql_fetch_array(mysql_query("SELECT `avtor`,`cat` FROM `sh_tem` WHERE `id`='$uid';")); 

$plus_post_me=$row['fpost']+1;
$plus_post_podcat_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$user_id_select[1]';")); 
$plus_post_podcat=$plus_post_podcat_q['post']+1;


mysql_query("UPDATE `users` SET  `fpost`='$plus_post_me' WHERE `id`='".$user_id_select[0]."'");
mysql_query("UPDATE `sh_tem` SET `tesdiq`='2' WHERE `id`='$uid';");
mysql_query("UPDATE `sh_post` SET `tesdiq`='2' WHERE `id`='$uid';");
@mysql_query("UPDATE `sh_cat` SET `movzu`=1+`movzu` WHERE `id`='$plus_post_podcat_q[refid]';");

echo "M&#246;vzu Tesdiqlendi<br/>"; 



echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=tesdiq&amp;uid=$plus_post_podcat_q[id]&amp;ref=$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}


if(!$tema) {
echo "M&#246;vzu Tap&#305;lmad&#305;";
echo "<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$podcat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));
$cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE id='$podcat[refid]';"));

$i=1;
$num = 8;
@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_post` where `tema`='$uid';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
//$start = $start+1;
$iz = $page*$num-$num+1;
$i = $iz;
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$uid' ORDER BY `time` LIMIT $start,$num;");
if($posts !=0){
if($page!=1){$abcdef=$page*$num-1; //echo "$abcdef";
}
while($post=mysql_fetch_array($post_q)){
if ($row["smiles"]==0){
$post['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $post['text']); 
$post['text'] = preg_replace("|\"/>+|isU", "", $post['text']); 
}
if($i==1){


echo "<b><u>$tema[name]</u></b><br/>------<br/>".$post["text"]."<br/>------<br/>\n";
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$post[avtor]'");
$user_avtor=mysql_fetch_array($us_q);
$date=date("ndHis"); 

if(mysql_num_rows($us_q)==0)
echo "Silinib$post[avtor]";
else 
echo "M&#252;ellif: <a href='inside.php?$mygetname&amp;nk=$post[avtor]&amp;ref=$ref'>$user_avtor[user]</a>\n";

$post['date']=str_replace(date("d.m.Y"), "Bu g&#252;n", $post['date']);

echo "<br/>Tarix: [$post[date]]\n";
echo "<br/>[<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$post[id]&amp;ref=$ref\">Edit</a>] [<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;del1&amp;ref=$ref\">Delete</a>]\n";
echo "<br/>[<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;tesdiq=$post[id]&amp;ref=$ref\">Tesdiqle</a>]\n";

echo "<br/>----<br/>\n";
}
$i++;
}


//
$url_for_pstr="forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;page=";
if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";

if ($total > 1)
{
echo "----<br/>\n";

Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<b>".$page."</b>".$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage."<br/>".$nazad." ".$vpered;
echo "<br/>----<br/>\n";
}
//
}


echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;









case 'silinib':
$uid = (int)$_GET['uid'];
$tema=@mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='3';"));


if(isset($_GET['edit1']))
{
$edit1=abs($_GET['edit1']); 
if(!$edit_tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";
ob_end_flush();
break;
}
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `id`='$edit1'  LIMIT 1;");
$post=mysql_fetch_array($post_q);

if(!isset($_POST['editmovzu'])){

$post['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $post['text']); 
$post['text'] = preg_replace("|\"/>+|isU", "", $post['text']); 
$_v->action("forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref");

echo "M&#246;vzunun ad&#305;<br/>";
print $_v->input("<input name=\"name$ref\" maxlength=\"50\" value=\"$edit_tema[name]\" emptyok=\"true\"/>").'<br/>';

echo "M&#246;vzu<br/>";
print $_v->input("<input name=\"editmovzu$ref\" maxlength=\"1000\" value=\"".$post['text']."\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','action=save');

echo "<br/>\n";
}
else if(trim($_POST['name'])!= '' ){


if(strlen($_POST['editmovzu'])<10) $error = "M&#246;vzunu &#231;ox q&#305;sa yazm&#305;s&#305;z, R&#252;tbeli olduqunuz &#252;&#231;&#252;n 10 simvoldan &#231;ox yazmal&#305;s&#305;z!<br/>";
if(strlen($_POST['name'])>60) $error .= "M&#246;vzunu ad&#305; 50 herfden &#231;ox olmamal&#305;d&#305;r!<br/>";


if($error){
echo $error."\n";  
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$edit1&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;
}



$name = narmobil($name);
$text = in_smile(narmobil($editmovzu));


if(mysql_query("UPDATE `sh_tem` SET `name`='$name' WHERE `id`='$uid';") and mysql_query("UPDATE `sh_post` SET `text`='".$text."' WHERE `id`='$edit1';"))
echo "Melumat Yenilendi<br/>\n";  
else echo mysql_error().'Xeta';
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}
else if(isset($_GET['del1']))
{
$uid=abs($_GET['uid']); 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='3';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=delete&amp;uid=$tema[cat]$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}
echo "M&#246;vzu TAM silindi<br/>\n"; 
mysql_query("DELETE FROM `sh_tem` WHERE `id`='$uid';");
mysql_query("DELETE FROM `sh_post` WHERE `id`='$uid';");

echo "<a href=\"forum.php?$mygetname&amp;cmd=delete&amp;uid=$tema[cat]$ref\">Geri Qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}
else if(isset($_GET['qayit']))
{
$uid=abs($_GET['uid']); 
if(!$tema=mysql_fetch_array(mysql_query("SELECT * FROM `sh_tem` WHERE `id`='$uid' and `tesdiq`='3';"))){
echo "M&#246;vzu tap&#305;lmad&#305;.<br/>";
echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
break;
}

@mysql_query("UPDATE `sh_tem` SET `tesdiq`='2' WHERE `id`='$uid' LIMIT 1;");

$user_id_select=mysql_fetch_array(mysql_query("SELECT `avtor`,`cat` FROM `sh_tem` WHERE `id`='$uid';")); 
$plus_post_podcat_q=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$user_id_select[1]';")); 

mysql_query("UPDATE `sh_cat` SET `movzu`=`movzu`+1 WHERE `id`='$plus_post_podcat_q[refid]';");
mysql_query("UPDATE `users` SET  `fpost`=1+`fpost` WHERE `id`='".$user_id_select[0]."';");
echo "M&#246;vzu qaytar&#305;ld&#305;<br/>"; 


echo "----<br/><a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a><br/>\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

if(!$tema) {
echo "M&#246;vzu Tap&#305;lmad&#305;";
echo "<br/>----<br/>\n";
echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}

$podcat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$tema[cat]';"));
$cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE id='$podcat[refid]';"));

$i=1;
$num = 8;
@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_post` where `tema`='$uid';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
//$start = $start+1;
$iz = $page*$num-$num+1;
$i = $iz;
$post_q=mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$uid' ORDER BY `time` LIMIT $start,$num;");
if($posts !=0){
if($page!=1){$abcdef=$page*$num-1; //echo "$abcdef";
}
while($post=mysql_fetch_array($post_q)){
if ($row["smiles"]==0){
$post['text'] = preg_replace("|<img[^>]+ alt=\"|isU", "", $post['text']); 
$post['text'] = preg_replace("|\"/>+|isU", "", $post['text']); 
}
if($i==1){

$_v->align('center');

echo "<b><u>$tema[name]</u></b><br/>------<br/>";
$_v->align('left');

echo "".$post["text"]."<br/>------<br/>\n";
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);
$date=date("ndHis"); 

if(mysql_num_rows($us_q)==0)
echo "Silinib$post[avtor]";
else 
echo "M&#252;ellif: <a href='inside.php?$mygetname&amp;nk=$post[avtor]&amp;ref=$ref'>$user_avtor[user]</a>\n";

$post['date']=str_replace(date("d.m.Y"), "Bu g&#252;n", $post['date']);

echo "<br/>Tarix: [$post[date]]\n";
echo "<br/>[<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;qayit=$post[id]&amp;ref=$ref\">Qaytar</a>] [<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;del1&amp;ref=$ref\">Tam Sil</a>]\n";

echo "<br/>[<a href=\"forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;edit1=$post[id]&amp;ref=$ref\">Redakta Et</a>]\n";
echo "<br/>----<br/>\n";
}
$i++;
}


//
$url_for_pstr="forum.php?$mygetname&amp;cmd=$cmd&amp;uid=$uid&amp;page=";
if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";

if ($total > 1)
{
echo "----<br/>\n";

Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<b>".$page."</b>".$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage."<br/>".$nazad." ".$vpered;
echo "<br/>----<br/>\n";
}
//
}


echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;







case 'delete':
if($forum_level<=1) {
echo "&#304;cazeniz yoxdur...";
break;
}

if($uid){


echo "Silinmi&#351; m&#246;vzular.<br/>----<br/>\n";
$num = 10;@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `cat`='$uid' and `tesdiq`='3';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

$tem_q=mysql_query("SELECT * FROM `sh_tem` WHERE `cat`='$uid' and `tesdiq`='3' ORDER BY `time` DESC LIMIT $start,$num;");
if($posts != 0) {
while($tema=mysql_fetch_array($tem_q)) {
$posl_post=mysql_fetch_array(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$tema[id]' ORDER BY `date` DESC;"));
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$posl_post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);

$ddunen = date("d.m.Y",$SERVER_TIME);
$posl_post['date']=str_replace($ddunen, "D&#252;nen", $posl_post['date']);
$posl_post['date']=str_replace(date("d.m.Y"), "Bu g&#252;n", $posl_post['date']);

if($tema['close']==1)echo "<img src=\"img/lock.gif\" alt=\"[X]\"/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=silinib&amp;uid=$tema[id]&amp;ref=$ref\">$tema[name]</a> [<u>$posl_post[date]</u>]\n";
if(mysql_num_rows($us_q)==0)echo " <b>Silinib</b>.$posl_post[avtor]<br/>";
else echo " <b>$user_avtor[user]</b><br/>\n";

}

//
$url_for_pstr="forum.php?$mygetname&amp;cmd=tesdiq&amp;uid=$uid&amp;page=";

if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";


if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'<br/>';
}
}
else echo "Bu Kataloqda Silinmi&#351; M&#246;vzu yoxdur.<br/>\n";



















}




else



{
$podcat_query=mysql_query("SELECT * FROM `sh_podcat`;");
if(mysql_num_rows($podcat_query)>0){
echo "Silinmi&#351; M&#246;vzular.<br/>----<br/>\n";
while($pod_cat=mysql_fetch_array($podcat_query))
{
$tem_num=mysql_num_rows(mysql_query("SELECT *FROM `sh_tem` WHERE `cat`='$pod_cat[id]' and `tesdiq`='3';"));
echo "&#0187; <a href='forum.php?$mygetname&amp;cmd=delete&amp;uid=$pod_cat[id]&amp;ref=$ref'>$pod_cat[name]</a> [$tem_num]<br/>\n";
}
}
else 
{
echo "Silinmi&#351; M&#246;vzu yoxdur.<br/>\n";
}
}

echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;




case 'tesdiq':
if($forum_level<=1) {
echo "&#304;cazeniz yoxdur...";
break;
}

if($uid){


echo "Tesdiq g&#246;zleyenler.<br/>----<br/>\n";
$num = 10;@$page = (int)$_GET['page'];
$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `cat`='$uid' and `tesdiq`='1';");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;

$tem_q=mysql_query("SELECT * FROM `sh_tem` WHERE `cat`='$uid' and `tesdiq`='1' ORDER BY `time` DESC LIMIT $start,$num;");
if($posts != 0) {
while($tema=mysql_fetch_array($tem_q)) {
$posl_post=mysql_fetch_array(mysql_query("SELECT * FROM `sh_post` WHERE `tema`='$tema[id]' ORDER BY `date` DESC;"));
$us_q=mysql_query("SELECT * FROM `users` WHERE `id`='$posl_post[avtor]';");
$user_avtor=mysql_fetch_array($us_q);

$ddunen = date("d.m.Y",($SERVER_TIME-86400));
$posl_post['date']=str_replace($ddunen, "D&#252;nen", $posl_post['date']);
$posl_post['date']=str_replace(date("d.m.Y",$SERVER_TIME), "Bu g&#252;n", $posl_post['date']);

if($tema['close']==1)echo "<img src=\"img/lock.gif\" alt=\"[X]\"/>\n";
echo "<a href=\"forum.php?$mygetname&amp;cmd=deaktiv&amp;uid=$tema[id]&amp;ref=$ref\">$tema[name]</a> [<u>$posl_post[date]</u>]\n";
if(mysql_num_rows($us_q)==0)echo " <b>Silinib</b>.$posl_post[avtor]<br/>";
else echo " <b>$user_avtor[user]</b><br/>\n";

}

//
$url_for_pstr="forum.php?$mygetname&amp;cmd=tesdiq&amp;uid=$uid&amp;page=";

if($page - 5 > 0) $page5left = " <a href=\"".$url_for_pstr.($page-5)."&amp;ref=$ref\">".($page-5)."</a> | ";
if($page - 4 > 0) $page4left = " <a href=\"".$url_for_pstr.($page-4)."&amp;ref=$ref\">".($page-4)."</a> | ";
if($page - 3 > 0) $page3left = " <a href=\"".$url_for_pstr.($page-3)."&amp;ref=$ref\">".($page-3)."</a> | ";
if($page - 2 > 0) $page2left = " <a href=\"".$url_for_pstr.($page-2)."&amp;ref=$ref\">".($page-2)."</a> | ";
if($page - 1 > 0) $page1left = " <a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">".($page-1)."</a> | ";

if($page + 5 <= $total) $page5right = " | <a href=\"".$url_for_pstr.($page+5)."&amp;ref=$ref\">".($page+5)."</a>";
if($page + 4 <= $total) $page4right = " | <a href=\"".$url_for_pstr.($page+4)."&amp;ref=$ref\">".($page+4)."</a>";
if($page + 3 <= $total) $page3right = " | <a href=\"".$url_for_pstr.($page+3)."&amp;ref=$ref\">".($page+3)."</a>";
if($page + 2 <= $total) $page2right = " | <a href=\"".$url_for_pstr.($page+2)."&amp;ref=$ref\">".($page+2)."</a>";
if($page + 1 <= $total) $page1right = " | <a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">".($page+1)."</a>";

if($page - 1 > 0) $nazad = "<a href=\"".$url_for_pstr.($page-1)."&amp;ref=$ref\">Evvelki</a>";
if($page + 1 <= $total) $vpered = "<a href=\"".$url_for_pstr.($page+1)."&amp;ref=$ref\">Sonrak&#305;</a>";


if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'<br/>';
}
}
else 
{
echo "Bu Kataloqda he&#231;bir M&#246;vzu yoxdur.<br/>\n";
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=tesdiq&amp;ref=$ref\">Diger Kataloqlar</a><br/>\n";

}

}
else
{
$podcat_query=mysql_query("SELECT * FROM `sh_podcat`;");
if(mysql_num_rows($podcat_query)>0){
echo "Tesdiq g&#246;zleyenler.<br/>----<br/>\n";
while($pod_cat=mysql_fetch_array($podcat_query))
{
$tem_num=mysql_num_rows(mysql_query("SELECT *FROM `sh_tem` WHERE `cat`='$pod_cat[id]' and `tesdiq`='1';"));
echo "&#0187; <a href='forum.php?$mygetname&amp;cmd=tesdiq&amp;uid=$pod_cat[id]&amp;ref=$ref'>$pod_cat[name]</a> [$tem_num]<br/>\n";
}
}
else 
{
echo "Tesdiq g&#246;zleyen M&#246;vzu yoxdur.<br/>\n";
}
}

echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;






case 'fq':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...";
break;
}

if(!isset($_POST['fdeyer']))
{


$file = file("file/dat_folder/forum_confiq.dat");
$dat_fdeyer = trim($file[0]);
$dat_fbalpost = trim($file[1]);
$dat_fkecersiz = trim($file[2]);
$dat_sdeyer = trim($file[3]);
$dat_sbalpost = trim($file[4]);
$dat_skecersiz = trim($file[5]);
$dat_ftesdiq = trim($file[6]);
echo "<b>Forum Qur&#287;ular</b><br/>----<br/>\n";
echo "M&#246;vzu yaratmaq<br/>\n";

$_v->action("forum.php?id=$id&amp;ps=$ps&amp;cmd=fq&amp;ref=$ref");

print $_v->input("<input type=\"text\" name=\"fdeyer$ref\" maxlength=\"15\" value=\"$dat_fdeyer\"/>");

$option =  "<select name=\"fbalpost$ref\">|";
if($dat_fbalpost==1){
$option .= "<option value=\"1\">Bal</option>|";
$option .= "<option value=\"2\">Post</option>|";
}else{
$option .= "<option value=\"2\">Post</option>|";
$option .= "<option value=\"1\">Bal</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

$option =  "<select name=\"fkecersiz$ref\">|";
if($dat_fkecersiz==1){
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
}elseif($dat_fkecersiz==2){
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
}elseif($dat_fkecersiz==3){
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
}else{
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

echo "Fikir bildirmek<br/>\n";




print $_v->input("<input type=\"text\" name=\"sdeyer$ref\" maxlength=\"15\" value=\"$dat_sdeyer\"/>");

$option =  "<select name=\"sbalpost$ref\">|";
if($dat_sbalpost==1){
$option .= "<option value=\"1\">Bal</option>|";
$option .= "<option value=\"2\">Post</option>|";
}else{
$option .= "<option value=\"2\">Post</option>|";
$option .= "<option value=\"1\">Bal</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
$option =  "<select name=\"skecersiz$ref\">|";
if($dat_skecersiz==1){
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
}elseif($dat_skecersiz==2){
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
}elseif($dat_skecersiz==3){
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
}else{
$option .= "<option value=\"4\">Herkese ke&#231;erli</option>|";
$option .= "<option value=\"1\">F-R ke&#231;ersiz</option>|";
$option .= "<option value=\"2\">F-R ve C-R ke&#231;ersiz</option>|";
$option .= "<option value=\"3\">Herkese ke&#231;ersiz</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';
///



echo "Tesdiqleme<br/>\n";
$option =  "<select name=\"ftesdiq$ref\">|";
if($dat_ftesdiq==1){
$option .= "<option value=\"1\">Tesdiq olsun</option>|";
$option .= "<option value=\"2\">Tesdiq olmas&#305;n</option>|";
}else{
$option .= "<option value=\"2\">Tesdiq olmas&#305;n</option>|";
$option .= "<option value=\"1\">Tesdiq olsun</option>|";
}
$option .= "</select>";
print $_v->select($option).'<br/>';

print $_v->submit('Yenile','action=save');


echo "<br/>\n";
}
else
{


$error_mesaj="Melumatlar d&#252;zg&#252;n formada deyil...<br/>\n";
if(!preg_match("!^[0-9]+$!i",$fdeyer))  {
$error = $error_mesaj;
} elseif(!preg_match("!^[0-9]+$!i",$fbalpost))  {
$error = $error_mesaj;
} elseif(!preg_match("!^[0-9]+$!i",$fkecersiz))  {
$error = $error_mesaj;
} 
elseif(!preg_match("!^[0-9]+$!i",$sdeyer))  {
$error = $error_mesaj;
} 
elseif(!preg_match("!^[0-9]+$!i",$sbalpost))  {
$error = $error_mesaj;
}
elseif(!preg_match("!^[0-9]+$!i",$skecersiz))  {
$error = $error_mesaj;
}
elseif(!preg_match("!^[0-9]+$!i",$ftesdiq))  {
$error = $error_mesaj;
}

if($error){
echo $error;
echo "<a href=\"forum.php?$mygetname&amp;cmd=fq&amp;ref=$ref\">Geri qay&#305;t</a><br/>----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
}else{
$file = fopen("file/dat_folder/forum_confiq.dat", "w");
$data .= "$fdeyer\n";
$data .= "$fbalpost\n";
$data .= "$fkecersiz\n";
$data .= "$sdeyer\n";
$data .= "$sbalpost\n";
$data .= "$skecersiz\n";
$data .= "$ftesdiq";
fwrite($file, $data);
fclose($file);
echo "Melumat Yenilendi!<br/>";
}
}


echo "----<br/>\n";
echo "<a href=\"forum.php?$mygetname&amp;ref=$ref\">Forum</a> |\n";
break;



case 'f2':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...";
break;
}
if(isset($_GET['uid'])){
$uid=$_GET['uid'];
$cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE id='$uid';"));
if(!$cat)die("Tap&#305;lmad&#305;<br/>\n");

$podcat_query=mysql_query("SELECT * FROM `sh_podcat` where `refid`='$uid';");
if(mysql_num_rows($podcat_query)>0){
echo "<b>$cat[name]</b> B&#246;lmesi.<br/>----<br/>\n";

echo " <a href='forum.php?$mygetname&amp;cmd=f3&amp;new=$uid&amp;ref=$ref'>Yeni Kataloq</a><br/>----<br/>";

while($pod_cat=mysql_fetch_array($podcat_query))
{$tem_num=mysql_num_rows(mysql_query("SELECT *FROM `sh_tem` WHERE `cat`='$pod_cat[id]';"));
echo "&#0187; <a href='forum.php?$mygetname&amp;cmd=3&amp;uid=$pod_cat[id]&amp;ref=$ref'>$pod_cat[name]</a> [$tem_num/$pod_cat[post]] 
<a href='forum.php?$mygetname&amp;cmd=f3&amp;edit=$pod_cat[id]&amp;ref=$ref'>[edit]</a> - [<a href='forum.php?$mygetname&amp;cmd=f3&amp;del=$pod_cat[id]&amp;ref=$ref'>x</a>]<br/>\n";}
}
else 
{
echo "<a href='forum.php?$mygetname&amp;cmd=f3&amp;new=$uid'>Yeni Kataloq</a><br/>----<br/>\n";

echo "B&#246;lmede he&#231;bir kataloq yoxdur.<br/>\n";

}
}

else if(isset($_GET['yeni'])){
if($_POST['name']=="")
{
echo "Yeni B&#246;lme<br/>\n";
if($_v->ver!="wml"){

echo "<form action=\"forum.php?{$mygetname}&amp;cmd=f2&amp;yeni&amp;ref={$ref}\" method=\"post\" title=\"Yarat\">\n";
echo "<input name=\"name\" maxlength=\"400\" emptyok=\"true\"/><br/>\n";
echo "<input type=\"submit\" class=\"ibutton\" value=\"Yarat\" name=\"send\"></form>\n";

//$_v->action("forum.php?$mygetname&amp;cmd=f2&amp;yeni&amp;ref=$ref");

//print $_v->input("<input name=\"text$ref\" maxlength=\"400\" emptyok=\"true\"/>").'<br/>';

//sil
//print $_v->submit('Yarat','action=save,name='.$text);

echo "<br/>\n";
}
if($_v->ver=="wml"){
echo "<input name=\"text$ref\" maxlength=\"400\" emptyok=\"true\"/><br/>\n";


echo "<anchor>Yarat<go href=\"forum.php?$mygetname&amp;cmd=f2&amp;yeni&amp;ref=$ref\" method=\"post\">
<postfield name=\"name\" value=\"$(text$ref)\"/>
</go></anchor><br/>\n";
}
}
else if(trim($_POST['name'])!= '') {

$name = mysql_real_escape_string(trim(htmlspecialchars($_POST['name'])));

$forum_q1=mysql_query("SELECT `abc` FROM `sh_cat` ORDER BY `abc` DESC;");
$forum1=mysql_fetch_array($forum_q1);
$max_abc = $forum1['abc']+1;

$add_cat=mysql_query("INSERT INTO `sh_cat` SET `name`='$name', `abc`='$max_abc';");
if($add_cat)echo "B&#246;lme yarad&#305;ld&#305;<br/>\n";
else echo "Xeta....<br/>".mysql_error()."<br/>\n";
}
}



else if(isset($_GET['edit']))
{
$uid = abs(intval($_GET['edit'])); 
if(!$edit_cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$uid' LIMIT 1;")))
{
echo "Kataloq tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;
};

if(!isset($_POST['name']))
{
echo "<b>B&#246;lmenin ad&#305;</b><br/>\n";
$_v->action("forum.php?$mygetname&amp;cmd=f2&amp;edit=$uid&amp;ref=$ref");

print $_v->input("<input name=\"name$ref\" value=\"".$edit_cat["name"]."\" maxlength=\"25\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Deyi&#351;dir','action=save');

echo "<br/>\n";
}else if(trim($_POST['name']) != '') {

$name = narmobil($_POST['name']);

$upd_cat=mysql_query("UPDATE `sh_cat` SET `name`='$name' WHERE `id`='$uid' LIMIT 1;");
if($upd_cat)echo "B&#246;lmenin ad&#305; deyi&#351;dirildi<br/>\n";
else echo mysql_error()."<br/>Xeta ba&#351; verdi<br/>\n";
}
}


else if(isset($_GET['del']))
{
$uid= abs($_GET['del']); 
if(!mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$uid';")))
{
echo "B&#246;lme tap&#305;lmad&#305; ve ya silinib.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;
};
$delete=mysql_query("DELETE FROM `sh_cat` WHERE `id`='$uid';");
if($delete)echo "B&#246;lme silindi<br/>\n";
else echo mysql_error()."<br/>Xeta ba&#351; verdi<br/>\n";
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;



case 'f3':
if($forum_level!=3) {
echo "&#304;cazeniz yoxdur...";
break;
}

if(isset($_GET['new']))
{
$uid=abs($_GET['new']); 

if(!$new_forum=mysql_fetch_array(mysql_query("SELECT * FROM `sh_cat` WHERE `id`='$uid';")))
{
echo "B&#246;lme tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;
};

if(!isset($_POST['name'])){
$_v->align('center');
echo "<b>$new_forum[name]</b> B&#246;lmesinde<br/>\n";
$_v->align('left');
echo "Yeni Kataloq:<br/>\n";

$_v->action("forum.php?$mygetname&amp;cmd=f3&amp;new=$uid&amp;ref=$ref");


print $_v->input("<input name=\"name$ref\" maxlength=\"25\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Yarat','action=save');

echo "<br/>\n";
}
else if(trim($_POST['name'])!=''){

$name = narmobil($_POST['name']);

$add_podcat=mysql_query("INSERT INTO `sh_podcat` SET `name`='$name', `refid`='$uid';");
@mysql_query("UPDATE `sh_cat` SET `kataloq`=1+`kataloq` WHERE `id`='$uid';");

if($add_podcat)
echo "Kataloq yarad&#305;ld&#305;<br/>\n";
else 
echo "Xeta<br/>".mysql_error()."<br/>\n"; 
}
}///////////////yuxari hazirdi.


else if(isset($_GET['edit']))
{
$uid=abs($_GET['edit']); 
if(!$podcat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$uid';")))
{
echo "Kataloq tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;
};
if($_POST['name']=="")
{
echo "Kataloq<br/>\n";
$_v->action("forum.php?$mygetname&amp;cmd=f3&amp;edit=$uid&amp;ref=$ref");

print $_v->input("<input name=\"name$ref\" value=\"$podcat[name]\" maxlength=\"25\" emptyok=\"true\"/><").'<br/>';

print $_v->submit('Deyi&#351;dir','action=save');

echo "<br/>\n";

}
else if(trim($_POST['name'])!= ''){


$name = narmobil($_POST['name']);
$upd_podcat=mysql_query("UPDATE `sh_podcat` SET `name`='$name' WHERE `id`='$uid';");
if($upd_podcat)echo "Kataloqun ad&#305; deyi&#351;dirildi.<br/>\n";
else echo "Xeta<br/>".mysql_error()."<br/>\n";
}
}



else if(isset($_GET['del']))
{
$uid=abs($_GET['del']); 
if(!$del_cat=mysql_fetch_array(mysql_query("SELECT * FROM `sh_podcat` WHERE `id`='$uid';")))
{
echo "Kataloq tap&#305;lmad&#305;.<br/>----<br/>";
echo "<a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";

break;
};

$del_podcat=mysql_query("DELETE FROM `sh_podcat` WHERE `id`='$uid';");
if($del_podcat){
echo "Kataloq silindi.<br/>\n"; 
@mysql_query("UPDATE `sh_cat` SET `kataloq`=`kataloq`-1 WHERE `id`='$del_cat[refid]';");

//$num_pod=mysql_num_rows(mysql_query("SELECT COUNT(*) FROM `sh_tem` WHERE `refid`=$cat[id]"));
//$result00 = mysql_query("SELECT COUNT(*) FROM `sh_tem` where `cat`='$del_cat[refid]' and `tesdiq`='2'");



}
else echo "Xeta ".mysql_error()."<br/>\n";
}
if(!isset($fadp))
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";
break;


case 'f5':
if($forum_level<=2) {
echo "&#304;cazeniz yoxdur...";
break;
}
if($_POST['name']==""){
echo "<b>Xeber&#305;n ad&#305;</b><br/>\n";
$_v->action("forum.php?$mygetname&amp;cmd=f5&amp;ref=$ref");

print $_v->input("<input name=\"name$ref\" maxlength=\"100\" emptyok=\"true\"/>").'<br/>';

echo "<u>Text S&#246;z</u><br/>\n";
print $_v->input("<input name=\"desc$ref\" maxlength=\"1000\" emptyok=\"true\"/>").'<br/>';


echo "<i>Xeberin mezmunu</i><br/>\n";
print $_v->input("<input name=\"text$ref\" maxlength=\"400\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Elave et','action=save');

echo "<br/>\n";

}else if(trim($_POST['name']) != '') {


if(strlen($_POST['name'])<3) $error .= "Xeberin ad&#305;n&#305 &#231;ox q&#305;sa yazm&#305;s&#305;z!<br/>\n";
if(strlen($_POST['text'])<10) $error .= "Xeberin mezmununu &#231;ox q&#305;sa yazm&#305;s&#305;z!<br/>\n";



if(!$error){

$name = narmobil($_POST['name']);
$desc = narmobil($_POST['desc']);
$text = narmobil($_POST['text']);



$date=date("d.m.Y H:i",$SERVER_TIME); 
$avtor=$row['id'];
if(mysql_query("INSERT INTO `sh_new` SET `name`='".$name."', `description`='".$desc."', `text`='".$text."', `time`='$SERVER_TIME', `date`='$date', `avtor`='$avtor';"))echo "Xeber elave edildi.".mysql_error()."<br/>\n";
else echo "Xeta".mysql_error()."<br/>\n";
}
else
{
echo "<b>Xeta</b>:\n".$error;
echo "----<br/><b>Xeberin ad&#305;</b><br/>\n";
$_v->action("forum.php?$mygetname&amp;cmd=f5&amp;ref=$ref");

print $_v->input("<input name=\"name$ref\" value=\"$_POST[name]\" maxlength=\"100\" emptyok=\"true\"/>").'<br/>';
echo "<u>Text S&#246;z</u><br/>\n";

print $_v->input("<input name=\"desc$ref\" value=\"$_POST[desc]\" maxlength=\"1000\" emptyok=\"true\"/>").'<br/>';

echo "<i>Xeberin mezmunu</i><br/>\n";
print $_v->input("<input name=\"text$ref\" value=\"$_POST[text]\" maxlength=\"400\" emptyok=\"true\"/>").'<br/>';

print $_v->submit('Elave et','action=save');
echo "<br/>\n";


}
}
echo "----<br/><a href=\"forum.php?$mygetname&amp;cmd=f1&amp;ref=$ref\">Forum Panel</a><br/>\n";

break;


}
if($cid)echo "<a href =\"forum.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Forum</a><br/>*****<br/>\n";
echo "<a href =\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>