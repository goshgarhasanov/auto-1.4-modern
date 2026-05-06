<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
if($row["statphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Statiskaya Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayna</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($row['level']>=8)
{
$table_banned = "and `banned`!='2'";
}
else
{
$table_banned = "and `banned`!='2'";
}


$_v->do_type[] =  "<do type=\"options\" name=\"stats\" label=\"Statistika\"><go href=\"stat.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
$_v->do_type[] = "<do type=\"options\" name=\"out\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
$_v->title('Statistika');
$_v->fsize1($fsize1);


switch($mod) {


case "missia";
$_v->align('center');
echo "Missia <b>Top 10</b> Statistikasi<br/>";
$_v->divide();
echo "<b>Bu Oyunda Her Kes Gec Tez Faizi Dolanda Qalib Olacaq!</b><br/>$divide";
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;$ref&amp;mod=apident\">Qaydalar ve Hediyyeler</a><br/>";
$_v->align('left');

$dart = mysql_query("select `id`,`user`,`action` from `users` where `level` < '9' and `action` > '0' and `banned` = '0' order by `action` desc limit 10;");
$i = 1;
while($b = mysql_fetch_object($dart)){

list($bis,$is) = explode(".",$b->action);
$is = @strlen(2,$is);
if($i == 1){$img = "<img src=\"img/1.gif\" alt=\"x\"/>";}
if($i == 2){$img = "<img src=\"img/2.gif\" alt=\"x\"/>";}
if($i == 3){$img = "<img src=\"img/3.gif\" alt=\"x\"/>";}

if($i > 3){$img = "";}
echo $i++.") $img <a href=\"info.php?id=$id&amp;ps=$ps&amp;$ref&amp;nk=".$b->id."\">".$b->user." </a> - <img src=\"img/load.php?ses=".$b->action."\" alt=\"x\"/><br/>";
}
break;

case "apident";
echo "Qaydalar: <br/>";
$_v->divide();
echo "1) Bu istifadecilerin saytda aktivliyini artirmaq ucun nezerde tutulmus bir oyundur.<br/>";
echo "2) Burda Siz Saytda Aktiv Olmaginiza Gore Yazdigin Mesajlara Gore Ve Ferqli Ferqli Istifadelere Gore + % -ler toplayirsiniz.<br/>";
echo "3) Bu % Ler 100 Olarsa Sizlerle Ferqli Bal ve Post Hediyyeleri Verilir.<br/>";
echo "4) Her Mesaja ve Sohbet Otaqlarinda Yazilan Yaziya Gore 0.02 % Verilir.<br/>";
echo "5) Her Online Sms/Ozunu Goster - den Istifadeye Gore 0.10 % Verilir.<br/>";
echo "6) Bu Oyunda Her Kes udacaq cunki Her kesin gec tez faizi dolacaq ve faizi dolan hediyyelerini alandan sonra faizleri sifirlanir arxada qalanlar hediyye qazanir!<br/>";
break;


case 'varli':
$user=$row["user"];
echo "<b>Chat&#305;n En varl&#305;lar&#305;! N&#246;mre 1-ler!</b><br/>Eger sende nikinin 1-ci yerlerde olma&#287;&#305;n&#305; isteyirsense, hesab&#305;na bal y&#252;kle!<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal&#305; nece y&#252;klemek olar?!</a><br/>\n";

$userm = mysql_query ("select count(`id`) as `num` from `users` where `bal` > '0' $table_banned;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s) or $s<0)$s=0;
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

echo "<i>&#199;atda he&#231;kesin hesab&#305;nda bal yoxdur...</i><br/>";

break;
}
echo "G&#246;sterir: $n-$do /Cemi: $num<br/>\n";
$_v->divide();
$r = mysql_query ("select id,user,bal from users where `bal` > '0' order by bal desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$bal=$arr['bal'];
echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> ($bal bal)<br/>";
}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide;
echo "<a href=\"stat.php?mod=varli&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"stat.php?mod=varli&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}
break;

case '10ym':
echo "<b>Agilli &#304;stifade&#231;iler</b><br/>\n";
$_v->divide();
$resu = @mysql_query ("Select user,credits from users order by credits desc limit 0,100;");
$i = 1;
while ($a2 = mysql_fetch_array($resu))
{
if($a2["credits"]!=0)echo ($i++).") ".$a2["user"]." (<b>".$a2["credits"]."</b> Cavab)<br/>\n";
}
break;



case 'gallery':

echo "<b>&#199;at&#305;n Yara&#351;&#305;ql&#305;lar&#305;</b><br/>\n";
$_v->divide();
$resu = @mysql_query ("Select vote,photo,idfoto,id from albom  order by vote desc limit 0,10;");
$i = 1;
while ($a2 = mysql_fetch_array($resu))
{
$uid=$a2['id'];
$u_id=$a2['idfoto'];
$photo=$a2['photo'];
$vote=$a2['vote'];

$qus = mysql_query ("Select user from users where id = '".$u_id."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where id = '".$u_id."'");
}

$daroq = getimagesize("photos/$u_id/$photo");
$n_nam = $daroq[2];
if($n_nam=="1"){$img_type="gif";}
if($n_nam=="2"){$img_type="jpg";}
if($n_nam=="3"){$img_type="png";}

echo ($i++).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=top&amp;ref=$ref\"><img src=\"image.php?img=photos/$u_id/$photo&amp;size=40\" alt=\"$fuser\"/></a> ".$u_user." (<b>".$vote."</b> Ses)<br/>";
}
break;


case '10post':
echo "<b>En &#199;ox Dan&#305;&#351;anlar</b><br/>\n";
$_v->divide();
$r = @mysql_query ("SELECT user,posts FROM users WHERE id != '1'  and banned='0' ORDER BY posts desc LIMIT 0,10;");
$i = 1;
while ($a = mysql_fetch_array($r))
{
echo ($i++).") ".$a["user"]." - <b>".$a["posts"]."</b><br/>\n";
}
break;




case 'yeni':
$curdate=date("d-m-Y");
$user=$row["user"];
echo "<b>Yeni gelenler</b><br/>\n";
$userm = mysql_query ("select count(`id`) as `num` from `users` where `date`='".$curdate."' $table_banned;");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s) or $s<0)$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo "Cemi: $num | $n/$do<br/>\n";
$_v->divide();
$r = mysql_query ("select `id`,`user`,`posts` from `users` where `date` = '$curdate' $table_banned order by `id` desc limit $o,$do");
if (mysql_affected_rows() == 0) {
echo "Bu g&#252;n yeni istifad&#231;i &#231;ata &#252;zv olmay&#305;b.<br/>\n";
} else {
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$posts=$arr['posts'];
if($user==$login)echo ($i).") <b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a></b> <b>($posts)</b><br/>";
else echo ($i).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> (Post:<b> $posts</b>)<br/>";
}

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"stat.php?mod=yeni&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}}

$tes = $num/10;
$test = round($tes);

if (($num>$do)&&($test>=$s)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " |  <a href=\"stat.php?mod=yeni&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a>\n";
echo "<br/>";
}
if($s>1)echo "<br/>";

break;

case 'birthday':
$d=date("d-m-");
$y=date("Y");
$select = mysql_query ("Select `id`,`user`,`birth` from `users` where `birth` LIKE '%$d%' $table_banned;");
echo "<b>Adg&#252;n&#252; olanlar&#305; Tebrik edirik:</b><br/>\n";
$_v->divide();
if (mysql_affected_rows() == 0) {
echo "Bu g&#252;n he&#231;kesin adg&#252;n&#252; olmay&#305;b.<br/>\n";
} else {
$i = 1;
while ($inf = @mysql_fetch_array ($select)){
$us=$inf["user"];
$usid=$inf["id"];
$birth=$inf["birth"];
$d1=substr($birth,0,2);
$m1=substr($birth,4,2);
$y1=substr($birth,6,4);
if ($y>$y1) $age=$y-$y1; else $age="(yas)";
if ((!$age)||($age==0)||($age=="")||($age>$y)) $age="(Bilinmir)"; else $age="(yash <b>".$age."</b> )\n";
echo ($i++).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$us."</a> ".$age."<br/>\n";
}
}
break;

case 'kick':
echo "<b>Vaxt ile Xaric olanlar:</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT `id`,`user`,`kik`,`whykik` FROM `users` WHERE `kik` > '".$SERVER_TIME."' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "Heleki he&#231;kes vaxt ile cezalanmay&#305;b ve ya ceza vaxt&#305; qurtar&#305;b:)<br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$vaxt = $a["kik"];
$sebeb = $a["whykik"];
$vaxt=$vaxt-$SERVER_TIME;
$vaxt=$vaxt/60;
$vaxt = round($vaxt);
echo "Vaxt: $vaxt deq: <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">".$nick."</a> (Sebeb: <u>".$sebeb."</u>)<br/>\n";
$a = mysql_fetch_array($r);
}
}
break;


case 'ipsoft':
echo "<b>IP-Browser-den Ban Edilenenler</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT ip,soft,user FROM bannlist");
if (mysql_affected_rows() == 0) {
echo "Heckes IP-Soft uzre ban edilmeyib :=)<br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$ip=$a["ip"];
$soft=$a["soft"];
$bannik=$a["user"];
$brauz=strtok($soft,'/');
echo "<b>Leqebi:</b> ".$bannik." <b>IP:</b> ".$ip." /<b> Browser: </b>".$brauz."<br/>\n";
$a = mysql_fetch_array($r);
}
}
break;

case 'ban':
echo "<b>Niki Ban edilenler</b><br/>\n";
$_v->divide();

$r = mysql_query("SELECT user FROM users WHERE `banned` = '1';");
if (mysql_affected_rows() == 0) {
echo "Sevindirici haldir ki he&#231;kesin niki ban edilmeyib :=)<br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$bannik=$a["user"];
$brauz=strtok($soft,'/');
echo "".$bannik." <br/>\n";
$a = mysql_fetch_array($r);
}
}
break;


case 'level9':
$lev = mysql_query("select level,name from levels where level = 9");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT `id`,`user`,`posts`,`mexvi` FROM `users` WHERE `level` = '9';");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";
$a = mysql_fetch_array($r);
}
}
break;


case 'level8':
$lev = mysql_query("select `level`,`name` from `levels` where `level` = '8';");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT id,user,posts,mexvi FROM users WHERE level = '8' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";
$a = mysql_fetch_array($r);
}
}
break;

case 'level7':
$lev = mysql_query("select level,name from levels where level = 7");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT id,user,posts,mexvi FROM users WHERE level = '7' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";

$a = mysql_fetch_array($r);
}
}
break;

case 'level6':
$lev = mysql_query("select level,name from levels where level = 6");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT id,user,posts,mexvi FROM users WHERE level = '6' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";
$a = mysql_fetch_array($r);
}
}
break;


case 'level5':
$lev = mysql_query("select level,name from levels where level = 5");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT id,user,posts,mexvi FROM users WHERE level = '5' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";

$a = mysql_fetch_array($r);
}
}
break;



case 'level4':
$lev = mysql_query("select level,name from levels where level = 4");
$arr=mysql_fetch_array($lev);

echo "<b>$arr[name]</b><br/>\n";
$_v->divide();
$r = mysql_query("SELECT id,user,posts,mexvi FROM users WHERE level = '4' $table_banned;");
if (mysql_affected_rows() == 0) {
echo "<i>&#199;atda he&#231;kes $arr[name] vezifesine sahib deyil...</i><br/>\n";
} else {
$a = mysql_fetch_array($r);
while ($a !== false){
$nk = $a["id"];
$nick = $a["user"];
$posts = $a["posts"];
$mexvi = $a["mexvi"];
if($mexvi==0)echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>)<br/>\n";
elseif($mexvi!=0 and $row["level"]==9) echo "<a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;r=$ref\">".$nick."</a> (Post: <b>".$posts."</b>) <b>Gizli</b><br/>\n";

$a = mysql_fetch_array($r);
}
}
break;

default:

echo "<b>MESAJ-in Statistikasi</b><br/>\n";
$_v->divide();
$adamlar = @mysql_query ("SELECT * FROM `conf` WHERE `acar` = '1';");
$mp = mysql_fetch_array ($adamlar);
$nick=$mp["son"];
$qadin=$mp["qadin"];
$kisi=$mp["kisi"];
$umumi=$kisi+$qadin;

echo "Qeydiyyat Say&#305;: <b>".$umumi."</b><br/>\n";

echo "Ki&#351;iler: <b>".$kisi."</b><br/>\n";
echo "Qad&#305;nlar: <b>".$qadin."</b><br/>\n";
echo "---<br/>";

$kick=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where `kik` > ".$SERVER_TIME." $table_banned;"));
$banned=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where `banned` = '1';"));
$ipsoft=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `bannlist`"));
echo "Vaxt ile Xaric edilenler: <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=kick&amp;ref=$ref\">".$kick[0]."</a><br/>\n";
echo "Niki Ban Edilenler: <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=ban&amp;ref=$ref\">".$banned[0]."</a><br/>\n";
echo "IP+SOFT Ban Edilenler: <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=ipsoft&amp;ref=$ref\">".$ipsoft[0]."</a><br/>\n";

echo "---<br/>";
$curdate=date("d-m-Y");
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) from `users` WHERE `date` = '".$curdate."' $table_banned;"));
echo "Bu G&#252;n Qeyd Olanlar: <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=yeni&amp;ref=$ref\">".$newtoday[0]."</a><br/>\n";
$d=date("d-m-");
$birth = mysql_fetch_array(mysql_query ("Select count(`id`) from `users` where `birth` LIKE '%$d%' $table_banned;"));
echo "Ad G&#252;nu Olanlar: <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=birthday&amp;ref=$ref\">".$birth[0]."</a><br/>\n";
echo "---<br/>";
if($row['level']!=9)
$pasible = "and mexvi = '0'";
else
$pasible = "";

$lev = mysql_query("select `level`,`name` from `levels` where `level` > '3' order by `level` desc;");
while($arr=mysql_fetch_array($lev)) {
$sayi=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) FROM `users` where `level`='".$arr['level']."' $pasible $table_banned;"));
echo "".$arr['name'].": <a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=level".$arr['level']."&amp;ref=$ref\">".$sayi[0]."</a><br/>\n";
}
$m0=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room0`;"));
$m1=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room1`;"));
$m2=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room2`;"));
$m3=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room3`;"));
$m4=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room4`;"));
$m5=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room5`;"));
$m6=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room6`;"));
$m7=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room7`;"));
$m8=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room8`;"));
$m9=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `room9`;"));
$m10=mysql_fetch_array(mysql_query("SELECT COUNT(klu4) FROM room10"));
$summa=$m0[0]+$m1[0]+$m2[0]+$m3[0]+$m4[0]+$m5[0]+$m6[0]+$m7[0]+$m8[0]+$m9[0]+$m10[0];

echo "---<br/>";
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=varli&amp;ref=$ref\">&#199;at&#305;n En Varl&#305;lar&#305;</a><br/>\n";
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=10post&amp;ref=$ref\">En &#231;ox Dan&#305;&#351;anlar</a><br/>\n";
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=gallery&amp;ref=$ref\">En G&#246;zel &#304;stifade&#231;iler</a><br/>\n";
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=10ym&amp;ref=$ref\">En Ag&#305;ll&#305;lar</a><br/>\n";
echo "---<br/>\n";

echo "Bazadak&#305; Otaq Mesaj: <b>".$summa."</b><br/>\n";
$mesajlar=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `mesaj`;"));
echo "Bazadak&#305; Online-Mesaj: <b>".$mesajlar[0]."</b><br/>\n";
$mektublar=mysql_fetch_array(mysql_query("SELECT COUNT(`klu4`) FROM `zapiski`;"));
echo "Bazadak&#305; Mektublar: <b>".$mektublar[0]."</b><br/>\n";
$mmsletters=mysql_fetch_array(mysql_query("SELECT COUNT(`lid`) FROM `mms`;"));
echo "Cemi MMS Mektublar: <b>".$mmsletters[0]."</b><br/>\n";
$vopros=mysql_fetch_array(mysql_query("SELECT COUNT(`number`) FROM `bots`;"));
echo "Bazadak&#305; Suallar: <b>".$vopros[0]."</b><br/>\n";
break;
}
$_v->divide();
if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>\n";

if($mod) {
echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Statistika</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>