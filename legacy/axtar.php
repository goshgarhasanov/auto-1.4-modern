<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if(!isset($bol)){
$_v->title('Axtar');
$_v->fsize1($fsize1);
echo "<b>Leqeb / ID:</b><br/>\n";

$_v->action("axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"nick\" title=\"Axtar&#305;&#351;\"/>").'<br/>';
print $_v->select("<select name=\"bol$ref\">|<option value=\"0\">Deqiq</option>|<option value=\"1\">Ox&#351;arlar</option>|</select>",'null').'<br/>';
print $_v->submit('Axtar','action=save');
$_v->divide();
echo "<a href=\"axtar.php?bol=all&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#220;mumi Axtar&#305;&#351;</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($bol=="all")
{
$_v->title('&#220;mumi Axtar&#305;&#351;');
$_v->fsize1($fsize1);

echo "<b>&#220;mumi Axtar&#305;&#351;:</b><br/>\n";
$_v->divide();
echo "Cinsi:<br/>\n";

$_v->action("axtar.php?bol=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->select("<select name=\"sex$ref\">|<option value=\"2\">Vacib deyil</option>|<option value=\"0\">Ki&#351;i</option>|<option value=\"1\">Xan&#305;m</option>|</select>").'<br/>';

echo "Yasi:<br/>\n";

$option = "<select name=\"yash1$ref\">|";
$gun=array('10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38');
$gun2=array('2000','1999','1998','1997','1996','1995','1994','1993','1992','1991','1990','1989','1988','1987','1986','1985','1984','1983','1982','1981','1980','1979','1978','1977','1976','1975','1974','1973','1972');
for ($g=0; $g<=28; $g++){$option .= "<option value=\"".$gun2[$g]."\">".$gun[$g]."</option>|";}
$option .="</select>";
print $_v->select($option).'';

$option = "<select name=\"yash2$ref\">|";
$gun=array('10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38');
$gun2=array('2000','1999','1998','1997','1996','1995','1994','1993','1992','1991','1990','1989','1988','1987','1986','1985','1984','1983','1982','1981','1980','1979','1978','1977','1976','1975','1974','1973','1972');
for ($g=28; $g>=0; $g--){$option .= "<option value=\"".$gun2[$g]."\">".$gun[$g]."</option>|";}
$option .= "</select>";
print 'den - '.$_v->select($option).'dek<br/>';

echo "Yaln&#305;z onlaynda olanlar?<br/>\n";
print $_v->select("<select name=\"line$ref\">|<option value=\"2\">Xeyr</option>|<option value=\"1\">Beli</option>|</select>").'<br/>';


echo "Yaln&#305;z foto &#351;ekli olanlar?<br/>\n";

print $_v->select("<select name=\"foto$ref\">|<option value=\"2\">Xeyr</option>|<option value=\"1\">Beli</option>|</select>").'<br/>';

print $_v->submit('Axtar','action=save');

$_v->divide();
echo "<a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Ferdi Axtar&#305;&#351;</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if($bol == "1"){
$latuser=strtolower($nick);
$b2 = "2";
if(isset($_POST['nick']))$nick = $_POST['nick']; else $nick = $_GET['nick'];
$query = mysql_query('select COUNT(id) FROM users WHERE (`latuser` LIKE "%'.$latuser.'%") or (`id`= "'.$nick.'") and (`banned`!= "'.$b2.'");');
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

$sorgu = mysql_query("SELECT * FROM `users` WHERE (`latuser` LIKE '%".$latuser."%') or (`id`= '".$nick."') and `banned`!='".$b2."' order by time ASC limit $o,$do;");

if($all=="0"){
	$_v->title('Tap&#305;lmad&#305;','center');
	$_v->fsize1($fsize1);
	echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
	$_v->divide();
}
else
{
	$_v->title('Tap&#305;lanlar');
	$_v->fsize1($fsize1);

	
	echo "\"<b>$nick</b>\" <u>S&#246;z&#252;ne ox&#351;ar leqebler</u>:<br/>----<br/>\n";	
	
	echo "Tap&#305;ld&#305; \"<b>$all</b>\" nefer:<br/>\n";
	$_v->divide();

	for ($i=$ot;$i<=$do;$i++){
		$a = mysql_fetch_array($sorgu);
		$u_user = $a ["user"];
		$sex = $a ["sex"];                    
		$u_id = $a ["id"];
		if($sex==0){$cins = "Ki&#351;i";} else {$cins = "Qad&#305;n";}
		echo $i.") <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$u_user&amp;ref=$ref\">$u_user</a>-$cins<br/>";
	}
	$_v->divide();

	$next=$s+1;
	$prev=$s-1;
	if($s>1) {
		$ot=(($prev-1)*10)+1;
		$do=$prev*10;
		echo "<a href=\"axtar.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;nick=$nick&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
	}

	$tes = $all/10;
	$test = round($tes);

	if ($test>$s) {
		$ot=(($next-1)*10)+1;
		$do=$next*10;
		if($do>$all)$do=$all;
		echo " | <a href=\"axtar.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;nick=$nick&amp;ref=$ref\">$do&gt;&gt;</a>\n";
	}

	if(($s>=1)and($all>10))echo "<br/>";
	echo "<a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

}
}






if($bol == "2"){
if($sex < 0 or $sex > 1) $sex = 2;
if(empty($yash1)) $yash1 = "1989"; 
if(empty($yash2)) $yash2 = "1980"; 
if(empty($line)) $line = 2; 

if ($foto == 1) $if_foto = "AND `img` != '0'"; else $if_foto = "";
if ($line == 1) $if_online = "AND `time` > '".$SERVER_TIME."'"; else $if_online = "";
if ($sex != 2) $if_sex = "AND `sex` = '".$sex."'";
$sorgu = "SELECT * FROM `users` WHERE `year`  >= '".$yash2."' and `banned`!='2' AND `year` <= '".$yash1."' $if_foto $if_online $if_sex";


$sorgu1 = mysql_query($sorgu." ORDER BY `id` ASC");
$alls = mysql_num_rows($sorgu1);



if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $alls) $s = 0;
$c = $s + 1;



if($alls == 0)
{
$_v->title('Tap&#305;lmad&#305;');
$_v->fsize1($fsize1);

echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"axtar.php?bol=all&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
}
else
{
if(!isset($s))$s=1;
$mx=round(($alls/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;

$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$alls)$do=$alls;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;


$_v->title('Tap&#305;lanlar');
$_v->fsize1($fsize1);
echo "<u>Tap&#305;lanlar</u><br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>$alls</b>\" nefer:<br/>\n";
$_v->divide();

$r = mysql_query($sorgu." ORDER BY `id` ASC  LIMIT $o,$do");

for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($r);
$u_user = $a ["user"];
$images = $a ["img"];                    
$u_id = $a ["id"];
$year = $a ["year"];
$sex = $a ["sex"];

if($sex==0){$cins = "Ki&#351;i";} else {$cins = "Qad&#305;n";}
$year = date("Y",$SERVER_TIME)-$year;
if($images!="0"){
$albom = @mysql_query("SELECT photo FROM `albom` WHERE `idfoto`='".$u_id."' order by vote desc;");
$img = mysql_fetch_array($albom);
$photos = $img["photo"];
if(file_exists("photos/".$u_id."/".$photos."")){ $daroq = getimagesize("photos/$u_id/$photos"); }
$n_nam = $daroq[2];
 if($n_nam=="1"){$img_type="gif";}
 elseif($n_nam=="2"){$img_type="jpg";}
 elseif($n_nam=="3"){$img_type="png";}
 else{$img_type="error";}
$photo = "<img src=\"image.php?img=photos/$u_id/$photos&amp;size=40\" alt=\"$u_user\"/>\n";
}


echo "".$i.")";
if($img_type!="error"){echo $photo;}
echo " <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$u_user&amp;ref=$ref\">$u_user</a> ya&#351;&#305;: $year  $cins<br/>";
}
$_v->divide();

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"axtar.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;sex=$sex&amp;yash1=$yash1&amp;yash2=$yash2&amp;line=$line&amp;foto=$foto&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $alls/10;
$test = round($tes);

if ($test>$s) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$alls)$do=$alls;
echo " | <a href=\"axtar.php?bol=$bol&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;sex=$sex&amp;yash1=$yash1&amp;yash2=$yash2&amp;line=$line&amp;foto=$foto&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}

if(($s>=1)and($alls>10))echo "<br/>";


echo "<a href=\"axtar.php?bol=all&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";

}
}


if($bol == "0"){

if($row['level']>=8)
{
$table_banned = '';
}
else
{
$table_banned = "and `banned`!='2'";
}

if (!ctype_digit($nick)) {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = @mysql_query ("Select * from `users` where `latuser` = '".$latuser."' ".$table_banned.";");
} else {
$select = @mysql_query ("Select * from `users` where `id`='".$nick."' ".$table_banned.";");
}
if (mysql_affected_rows() <= 0){
$_v->title('Xeta');
$_v->fsize1($fsize1);
echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>";
$_v->divide();
echo "<a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Axtar&#305;&#351;</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$takep = "&amp;ref=$ref";
$inf = mysql_fetch_array ($select);
$nk=$inf["id"];
$nick = $inf["user"];
$name = $inf["name"];
$bal = $inf["bal"];
$sex = $inf["sex"];
$time = $inf["time"];
$nastroi = $inf["nastroi"];
$status = $inf["status"];
$para = $inf["para"];
$mesaj=$inf["mesaj"];
$tox=$inf["tox"];
$mexvi=$inf["mexvi"];
$level=$inf["level"];
$img=$inf["img"];
$zn=$inf["zn"];
$qefes=$inf["qefes"];
$xstatus=$inf["xstatus"];
$Post=$inf["posts"];

if ($xstatus == 1) {
$xmesaj = "Online";
} else if ($xstatus == 2) {
$xmesaj = "Offline";
} else if ($xstatus == 3) {
$xmesaj = "Me&#351;gulam";
} else if ($xstatus == 4) {
$xmesaj = "Sevgi axtar&#305;ram";
} else if ($xstatus == 5) {
$xmesaj = "Tan&#305;&#351; olmuram";
} else if ($xstatus == 6) {
$xmesaj = "Dar&#305;x&#305;ram";
} else if ($xstatus == 7) {
$xmesaj = "&#199;ekirem";
}

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
else $inf["zn"]="x";

if($row["infophp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz infoya Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$rpos = file("file/dat_folder/n_n/post.dat");
$nihadbal = trim($rpos[0]);
$nikovaxt = trim($rpos[1]);
$bonus = trim($rpos[2]);
$xx1 = file("file/dat_folder/n_n/xaric_niko.dat");
$xaricc = trim($xx1[4]);
ob_start();
$_v->title($nick.' haqq&#305;nda');
$_v->fsize1($fsize1);

echo "\"<b>$nick</b>\" haqq&#305;nda melumat...<br/>";
$_v->divide();
echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Mesaj Yaz</a><br/>\n";
echo $divide;

if($mexvi!='0' and $row['level']<8){
if (eregi("nak", $inf["zn"]))
echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";
else
echo "<b>Nick:</b> $nick<br/>\n";
if ($sex=="0")echo "<b>Cinsi:</b> Ki&#351;i<br/>\n";
else if ($sex=="1")echo "<b>Cinsi:</b> Qad&#305;n<br/>\n";
echo $divide;
echo '<b>Tam Mexvi istifade&#231;i</b><br/>';

if($inf["tox"] == '1')
{
echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
elseif($inf["tox"] == '2')
{
echo "<u>TAM Toxunulmaz</u> - <img src=\"img/toxu_2.gif\"/><br/>\n";
}
if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1)){
echo $divide;
user_ban_list();
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps$takep\">Cezaland&#305;r</a></b><br/>\n";
}
elseif($inf["tox"]== '0')
{
if($xaricc!="0"){echo $divide;
echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";
}
echo $divide;
}
}else{
if ($qefes!="0"){
echo "<u>Virtual Qefes</u>, i&#351;tirak&#231;&#305;s&#305;...<br/>\n";
if($qefes==3)echo "Me&#287;lub olub<br/>\n";
else
echo "[<a href=\"qefes.php?cid=ses&amp;id=$id&amp;ps=$ps&amp;login=$nick&amp;$ref\">Ses ver</a>]<br/>\n";
echo $divide;
}

if($inf['image_fon']!=''){
echo "<img src=\"photos/src/".$inf['image_fon']."\" alt=\"Foto\"/><br/>\n";
echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
echo $divide;
}

echo "<b>-ID:</b> $nk<br/>\n";
if (eregi("nak", $inf["zn"]))
echo "<u>Gold User</u>: <img src=\"img_code.php?user=$nick&amp;$ref\" alt=\"$nick\"/><br/>\n";

echo "<b>-Ad&#305;:</b> $name<br/>\n";

if($inf['image_fon']=='' and $img!='0'){
echo "<a href=\"img_a.php?img=$nk&amp;id=$id&amp;ps=$ps$takep\">Foto Albom</a> ($img)<br/>\n";
}

if($nastroi!="") echo "<b>-Ehval&#305;:</b> $nastroi<br/>\n";
if ($sex=="0")echo "<b>-Cinsi:</b> Ki&#351;i<br/>\n";
else if ($sex=="1")echo "<b>-Cinsi:</b> Qad&#305;n<br/>\n";
if($level>3){
$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$level."';");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels['name'];
echo "<b>-R&#252;tbe: <u>$levname</u></b><br/>\n";
}

if($para!='')echo "<u>-Heyat yolda&#351;&#305;:</u> <b>$para</b> <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$para&amp;$ref\"><img src=\"img/uzuk.gif\"/></a><br/>\n";
if($bal>0) echo "<b>-Ballar&#305;:</b> ($bal)<br/>\n";


echo "<b>-G&#252;nl&#252;k reytinq:</b> (<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".ac_user_time($inf['time_active'])."</a>)<br/>\n";
echo $divide;

if(exit_time($time)>=$SERVER_TIME){
if ($xstatus!=0)echo "<b>Status:</b> <img src=\"img/x-status/".$xstatus.".gif\"/> <u>".$xmesaj."</u><br/>\n";
else
echo "<b>Online</b> - (Hal-haz&#305;rda saytdad&#305;r.)<br/>\n";
}
else 
{
$tkick = $SERVER_TIME - exit_time($time);

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

if($level>8&&$row['level']<8) echo "<i>Melumat yoxdur(((</i><br/>\n";
else echo "<b>Offline</b>: - ($tkick $vaxt evvel &#199;atdan &#231;&#305;x&#305;b.)<br/>\n";
}
echo $divide;

if($mexvi!='0')
{
echo '<b>Tam Mexvi istifade&#231;i</b><br/>';
}
if($inf["tox"] == '1')
{
echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
elseif($inf["tox"] == '2')
{
echo "<u>TAM Toxunulmaz</u> - <img src=\"img/toxu_2.gif\"/><br/>\n";
}
if($mexvi!='0' or $inf["tox"]!='0')
echo $divide;

if($bonus=="1"){
if($$nihadbal<"$nikovaxt")
{
echo "<b>$nick</b> $nikovaxt $nihadbal Yigdiqdan Sora <b><i>Tam Melumati</i></b> Aktiv Olacaq..!<br/>\n";
}
}
if($bonus=="0" or $$nihadbal>$nikovaxt or $row['level']>7){
print $_v->submit('<b>Tam Melumat</b>','info=open',"inside.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep");
}
$_v->divide('wml');

if($p_arr['1']==1 and ($p_arr['81']==1 or $p_arr['82']==1 or $p_arr['83']==1 or $p_arr['84']==1 or $p_arr['85']==1 or $p_arr['86']==1 or $p_arr['87']==1 or $p_arr['88']==1)){
user_ban_list();
echo "<b><a href=\"ceza.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Cezaland&#305;r</a></b><br/>\n";
$_v->divide();
}
elseif($inf["tox"]== '0')
{
if($xaricc!="0"){echo "[<a href=\"hesab.php?bolme=x&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;$ref\">&#199;atdan Xaric et</a>]<br/>\n";
$_v->divide();}
}
}


}

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>