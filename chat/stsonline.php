<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

function cc_tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 $cc_time2";
$time_p[0]=date("j n Y", $time);
$time_p[1]=date("H:i", $time);
$ccvaxt=(time()-$time);
$cc_s = $ccvaxt/ 3600;
$cc_saat_tam = strtok($cc_s,'.');
$cc_saat_san = $cc_saat_tam * 3600;
$cc_d = $ccvaxt / 60;
$cc_dq_tam =strtok($cc_d,'.');
$cc_deqiqe_san = $cc_dq_tam * 60;
$cc_deqiqe_hesab = ($ccvaxt - $cc_saat_san) / 60;
$cc_deqiqe = strtok($cc_deqiqe_hesab,'.');
$cc_saniye = $ccvaxt - $cc_deqiqe_san;
if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye==0))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<60))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "$cc_time2";
else $cc_muddet = "$cc_time2";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;nen $time_p[1]";}else{
$w[1]="Bazar ertesi";
$w[2]="&#199;er&#351;enme Ax&#351;am&#305;";
$w[3]="&#199;er&#351;enbe";
$w[4]="C&#252;me Ax&#351;am&#305;";
$w[5]="C&#252;me";
$w[6]="&#350;enbe";
$w[7]="Bazar";
$hefte=date("w",$time);
if($w[$hefte]!=""){
$cc_time2="".date("H:i", $time)."";
$cc_time="".$w[$hefte]." $cc_time2";
}else{
$cc_time=str_replace("Jan","Yanvar",$cc_time);
$cc_time=str_replace("Feb","Fevral",$cc_time);
$cc_time=str_replace("Mar","Mart",$cc_time);
$cc_time=str_replace("May","May",$cc_time);
$cc_time=str_replace("Apr","Aprel",$cc_time);
$cc_time=str_replace("Jun","Iyun",$cc_time);
$cc_time=str_replace("Jul","Iyul",$cc_time);
$cc_time=str_replace("Aug","Avqust",$cc_time);
$cc_time=str_replace("Sep","Sentyabr",$cc_time);
$cc_time=str_replace("Oct","Oktyabr",$cc_time);
$cc_time=str_replace("Nov","Noyabr",$cc_time);
$cc_time=str_replace("Dec","Dekabr",$cc_time);
}}}
return $cc_time;
}


$r_k="";
if ((strpos ($HTTP_USER_AGENT,"Windows") !== false)||(strpos ($HTTP_USER_AGENT,"Opera") !== false))
{
$r_k="ok";
}
$us=$row["user"];
$bal = $row['bal'];
$smset = $row["smiles"];
$posts = $row["posts"];
$stsonline = $row["stsonline"];
$level = $row["level"];

$sts = file("file/dat_folder/stsonline.dat");
$qiymet = str_replace("-", "", (int)trim($sts[0]));
$muellif = trim($sts[1]);
$beyen_b = trim($sts[2]);
$simvol = trim($sts[3]);
$postl = trim($sts[4]);

if (!ctype_digit($qiymet) or $qiymet==0) 
$qiymet = 1;



switch ($bc) {

default:
$_v->title('Online Status','center');
$_v->fsize1($fsize1);
echo "<b>Online Status</b><br/>\n";
$_v->divide();
$_v->align('left');
echo "Yazd&#305;q&#305;n&#305;z s&#246;z onlinede nikinizin alt&#305;nda g&#246;r&#252;necek. (Xidmet deyeri: <b>".$qiymet."</b> bal)<br/>\n";
$_v->action("stsonline.php?bc=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"msg$ref\" maxlength=\"$simvol\" value=\"".$stsonline."\" title=\"Online Status\"/>");

if($row['level']==9)echo "<a href=\"stsonline.php?bc=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Panel</a>";
echo "<br/>\n";


print $_v->submit('Elave et','action=save');

echo "<br/><a href=\"stsonline.php?bc=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a> (<b>0</b> bal)<br/>\n";
$_v->divide();
echo "<b>Qeyd</b>: <u>Her g&#252;n 24:00 dan sonra melumat bazas&#305; yenilenir.</u><br/>\n";
break;

case 'info':
mysql_query ("Select * from info_qov where usid='".$id."' and id='".$nk."'");
if (mysql_affected_rows() == true){
$select = @mysql_query ("Select `id`,`user` from `users` where `id`='".$nk."';");
$inf = mysql_fetch_array ($select);
mysql_free_result($select);
$user=$inf["user"];
$_v->title('info iqnor','center');
$_v->fsize1($fsize1);
echo "<b>$user</b> Sizi Infodan Qovub :))<br/>";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if ($nk==$id){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z - &#246;z&#252;n&#252;ze yaza bilmersiniz.<br/>\n";
break;
}
if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
$y0xlama = mysql_query ("SELECT `id`,`user`,`stsonline`,`zn`,`mesaj` FROM `users` where `id` = '".$nk."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
$mesaj = $oxu["mesaj"];

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

$_v->title(''.$logi.' &#252;&#231;&#252;n mesaj','left');
$_v->fsize1($fsize1);
if(($mesaj ==0)or($level ==9)){
echo "$zn<b>".$logi."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
$_v->action("stsonline.php?id=$id&amp;ps=$ps&amp;bc=5&amp;uid=$uid&amp;ref=$ref".$refresh."");

print $_v->input("<input name=\"msg$ref\" maxlength=\"200\" value=\"\" title=\"Online Status Fikir\"/>").'<br/>';

if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
{
$option = "<select name=\"shr$ref\" multiple=\"true\">|";
			if($p_arr['210']==1)$option .= "<option value=\"1\">Kursiv</option>|";
			if($p_arr['211']==1)$option .= "<option value=\"2\">Alt&#305; Xetli</option>|";
			if($p_arr['212']==1)$option .= "<option value=\"3\">Qal&#305;n</option>|";
			if($p_arr['213']==1)$option .= "<option value=\"4\">B&#246;y&#252;k</option>|";
			$option .= "</select>";
print $_v->select($option).'<br/>';
}


$_v->sub_val('msg', $logi.', {msg}');
print $_v->submit('G&#246;nder','towhom='.$nk);
}else{
if(($mesaj ==1)or($level ==9)){
mysql_query ("Select * from friends where usid='".$id."' and id='".$nk."';");
if (mysql_affected_rows() == true){
echo "$zn<b>".$logi."</b>, &#252;&#231;&#252;n mesaj:<br/>\n";
$_v->action("stsonline.php?id=$id&amp;ps=$ps&amp;bc=5&amp;uid=$uid&amp;ref=$ref".$refresh."");

print $_v->input("<input name=\"msg$ref\" maxlength=\"200\" value=\"\" title=\"Online Status Fikir\"/>").'<br/>';

if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
{
$option = "<select name=\"shr$ref\" multiple=\"true\">|";
			if($p_arr['210']==1)$option .= "<option value=\"1\">Kursiv</option>|";
			if($p_arr['211']==1)$option .= "<option value=\"2\">Alt&#305; Xetli</option>|";
			if($p_arr['212']==1)$option .= "<option value=\"3\">Qal&#305;n</option>|";
			if($p_arr['213']==1)$option .= "<option value=\"4\">B&#246;y&#252;k</option>|";
			$option .= "</select>";
print $_v->select($option).'<br/>';
}
$_v->sub_val('msg', $logi.', {msg}');
print $_v->submit('G&#246;nder','towhom='.$nk);
}
else
{
echo "<u><b>$logi</b> yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>";
}
}
else{
echo "<u><b>$logi</b> mesaj qebul etmir.</u><br/>";
}};

if($row['level']==9){
if($mesaj==1){
$_v->divide();
echo "<u><b>$logi</b> yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</u><br/>";
}
if($mesaj==2){
$_v->divide();
echo "<u><b>$logi</b> mesaj qebul etmir.</u><br/>";
}
}
break;

case '8':
if($row['level']!=9){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}

$y0xlama = mysql_query ("SELECT id,user,stsonline,zn FROM `users` where id = '".$nk."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
$_v->title(''.$logi.' Beynilenlerden silindi!','left');
$_v->fsize1($fsize1);
mysql_query("DELETE FROM `status_beyen` WHERE `id`='".$del_b."' limit 1");
echo "<b>$logi</b> Beynilenlerden silindi!<br/>";
break;

case '7':
$usms = mysql_fetch_array(mysql_query ("select count(`id`) as `num` from `status_beyen` where `uid` ='".$uid."';"));
$all = $usms["num"];

$y0xlama = mysql_query ("SELECT `id`,`user`,`stsonline`,`zn` FROM `users` where `id` = '".$uid."'");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];



$_v->title('Beyenenler','left');
$_v->fsize1($fsize1);
if ($all!=0){

if((file_exists("i/".$oxu["id"].".gif")&&($row["rnikler"]==0))){
$logi = "<img src=\"i/".$oxu["id"].".gif\" alt=\"$logi\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=7&amp;uid=$uid&amp;ref=$ref".$refresh."\">Yenile</a> - ";
echo "".$zn." <a href=\"info.php?id=$id&amp;ps=$ps&amp;bc=info&amp;uid=$uid&amp;nk=".$oxu["id"]."&amp;ref=$ref".$refresh."\">".$logi."</a><br/>";
echo "Online Statusu: \"<u>".$oxu["stsonline"]."</u>\"<br/>Cemi <u>$all</u> nefer beyenib.<br/>";
echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=6&amp;uid=$uid&amp;ref=$ref".$refresh."\">Mende Beyenirem</a>(<b>$beyen_b</b> bal)<br/>";
$_v->divide();
}
if ($all==0)echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\">$logi</a> nikinin Online Statusunu he&#231; kim beyenmemeyib.<br/>";



if (strpos ($HTTP_USER_AGENT,"Windows") !== false){ 
$max_page = 15;
}else{
$max_page = 10;
}
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($all/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}

$q = mysql_query("SELECT `id`,`like_uid`,`like_us`,`tarix` FROM `status_beyen` WHERE `uid` = '".$uid."' ORDER BY `tarix` DESC LIMIT $start,$max_page;");
while($view = mysql_fetch_array($q))
{
$del_b = $view["id"];
$like_uid = $view["like_uid"];
$like_us = $view["like_us"];
$tarix = $view["tarix"];

$yoxlama = mysql_query ("SELECT `id`,`user`,`stsonline`,`zn` FROM `users` where `id` = '".$like_uid."' limit 1");
if (mysql_affected_rows() == 0){
$like_us = "<b>Nik silinib</b>";
}
$ox = mysql_fetch_array ($yoxlama);
$zn = $ox["zn"];

if((file_exists("i/".$like_uid.".gif")&&($row["rnikler"]==0))){
$like_us = "<img src=\"i/".$like_uid.".gif\" alt=\"$like_us\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($row['level']==9)echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=8&amp;del_b=".$del_b."&amp;nk=$like_uid&amp;ref=$ref".$refresh."\">[x]</a>-\n";

echo "$zn<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$like_uid."&amp;ref=$ref".$refresh."\">$like_us</a>(".cc_tarix($tarix).")<br/>";
}
if($all > $max_page)
{
$_v->divide();
echo page_next("stsonline.php?id=$id&amp;ps=$ps&amp;bc=7&amp;uid=$uid&amp;ref=$ref", $all, $max_page, $page);
}


break;

case '6':
if ($uid==$id){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "&#214;z&#252;n&#252;z - &#246;z&#252;n&#252;z&#252; beyene bilmersiniz.<br/>\n";
break;
}
if ($row['bal'] < $beyen_b){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "Sizin <b>$bal</b> bal&#305;n&#305;z var. Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$beyen_b."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
break;
} 
$_v->title('Beyendiniz','left');
$_v->fsize1($fsize1);
$y0xlama = mysql_query ("SELECT `id`,`user`,`stsonline`,`zn` FROM `users` where `id` = '".$uid."' limit 1");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];

$pos = mysql_query( "SELECT * FROM `status_beyen` WHERE `uid` = '".$uid."' order by `id` desc limit 1;" );
$son = mysql_fetch_array( $pos );
$like_uid = $son['like_uid'];
if ( $like_uid != $id )
{
mysql_query("INSERT INTO `status_beyen` SET `like_uid` = '".$id."', `like_us` = '".$row["user"]."', `like` = `like` + 1, tarix = '".time()."', `uid` = '".$uid."';");
echo "Siz <b>$logi</b> nikinin Online Statusunu beyendiniz!<br/>\n";
}
else
{
echo "Siz <b>$logi</b> nikinin Online Statusunu art&#305;q beyenimisiniz!<br/>\n";
}
break;

case '5':
mysql_query ("Select * from info_qov where usid='".$id."' and id='".$uid."'");
if (mysql_affected_rows() == true){
$select = @mysql_query ("Select `id`,`user` from `users` where `id`='".$uid."';");
$inf = mysql_fetch_array ($select);
mysql_free_result($select);
$user=$inf["user"];
$_v->title('info iqnor','center');
$_v->fsize1($fsize1);
echo "<b>$user</b> Sizi Infodan Qovub :))<br/>";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$_v->title('Online Status','left');
$_v->fsize1($fsize1);
$y0xlama = mysql_query ("SELECT `id`,`user`,`stsonline`,`zn` FROM `users` where `id` = '".$uid."' limit 1");
$oxu = mysql_fetch_array ($y0xlama);
$zn = $oxu["zn"];
$logi = $oxu["user"];
if((file_exists("i/".$oxu["id"].".gif")&&($row["rnikler"]==0))){
$logi = "<img src=\"i/".$oxu["id"].".gif\" alt=\"$logi\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}
echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=5&amp;uid=$uid&amp;ref=$ref".$refresh."\">Yenile</a> - ";
echo "".$zn." <a href=\"info.php?id=$id&amp;ps=$ps&amp;bc=info&amp;uid=$uid&amp;nk=".$oxu["id"]."&amp;ref=$ref\">".$logi."</a><br/>";
echo "Online Statusu: \"<u>".$oxu["stsonline"]."</u>\"<br/>";



$usms = mysql_fetch_array(mysql_query ("select count(`id`) as `num` from `status_beyen` where `uid` ='".$uid."';"));
$like = $usms["num"];
if ($like!=0)echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=7&amp;uid=$uid&amp;ref=$ref".$refresh."\">Beyenenler</a>(<b>$like</b> nefer)<br/>";
echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=6&amp;uid=$uid&amp;ref=$ref".$refresh."\">Mende Beyenirem</a>(<b>$beyen_b</b> bal)<br/>";



if (($row['level']==9)&&($_GET["del_c"])){
mysql_query("DELETE FROM `status_fikir` WHERE `id`='".$_GET["del_c"]."' limit 1");
$_v->divide();
echo "Fikir silindi!.<br/>";
}
if(isset($_POST['msg']))
{
	if ($row["posts"]<$postl)
	{
		$_v->divide();
		echo "Statusa &#351;erh vermek &#252;&#231;&#252;n <u>$postl</u> postunuz olmal&#305;d&#305;r.<br/>";
		echo "<i><b>Diqqet!</b>: <u>Postunuz hesab&#305;n&#305;zdan &#231;&#305;x&#305;lmayacaq. Bu sadece &#231;at&#305;m&#305;z&#305;n seviyyesini qoruyub saxlamaq&#231;&#252;n nezerde tutulub.</u></i><br/>";
	}
	else
	{

	if(empty($msg)){$error = $divide."Fikrinizi qeyd etmediniz.<br/>";$cvb = 1;}
	$x = mysql_query("SELECT * FROM `status_fikir` WHERE `uid` = '".$uid."' and `muellif` = '".$id."' and `vaxt` >= '".(time()-10)."';");
	if(mysql_num_rows($x)!=0){$cvb = 1;}

	if ($error){echo $error;}

	if ($cvb!=1)
		{
			$msg = $_POST['msg'];
			if(strlen($msg)>=201)
			{
				$msg = substr($msg, 0, 200);
			}
			
			if($msg!='')
			{
				$msg = narmobil(chkdsk($msg,basename(__FILE__),"Online Status Fikir"));
			}

			if ($row["level"]<5) {require("filtr.php");}

			if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\0\">\\3</a>", $msg);

			if($smset!=0){$msg = in_smile($msg,$posts);}

			if($p_arr['200']==1)
			{
				$shr = $_POST['shr'];
				if($p_arr['210']==1)
				{
					if(substr_count($shr, "1") != 0) $msg = "<i>$msg</i>";
				}
				if($p_arr['211']==1)
				{
					if(substr_count($shr, "2") != 0) $msg = "<u>$msg</u>";
				}
				if($p_arr['212']==1)
				{
					if(substr_count($shr, "3") != 0) $msg = "<b>$msg</b>";
				}
				if($p_arr['213']==1)
				{
					if(substr_count($shr, "4") != 0) $msg = "<big>$msg</big>";
				}
			}
			$reng = $row["shrift"];

			mysql_query("INSERT INTO `status_fikir` SET `uid` = '".$uid."', `muellif` = '".$id."', `vaxt` = '".time()."', `fikir` = '".$msg."', `reng` = '".$reng."';");
		}
	}
}
echo "*****<br/>";
$sqlks = mysql_query("select `id` from `status_fikir` where `uid` = '".$uid."'");
$total = mysql_num_rows($sqlks);

if($total == 0)echo "Bu statusa fikir bildiren olmay&#305;b.<br/>\n";
if (strpos ($HTTP_USER_AGENT,"Windows") !== false){
$max_page = 15;
}else{
$max_page = 10;
}
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($total/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}

$sql = mysql_query("SELECT * FROM `status_fikir` where `uid` = '".$uid."' ORDER BY `vaxt` desc limit $start,$max_page;");

while($savik = mysql_fetch_array($sql))
{
$yoxlama = mysql_query ("SELECT * FROM `users` where `id` = '".$savik['muellif']."'");
if (mysql_affected_rows() == 0) {
$muellif = "[<u>nik silinib</u>]";
} else {

$inf = mysql_fetch_array ($yoxlama);
$zn = $inf["zn"];
$login = $inf["user"];
if((file_exists("i/".$inf["id"].".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$inf["id"].".gif\" alt=\"$login\"/>";
}
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

$oxu = mysql_fetch_array ($y0xlama);
$muellif = "".$zn." <a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=info&amp;nk=".$inf["id"]."&amp;uid=$uid&amp;ref=$ref".$refresh."\">".$login."</a>";
}
$reng = $savik["reng"];
$fikir = $savik["fikir"];
if($row['level']==9)echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=5&amp;uid=$uid&amp;del_c=".$savik['id']."&amp;ref=$ref".$refresh."\">[x]</a> - ";
if($r_k=="ok"){$fikir = "<span style=\"color: $reng\">$fikir</span>";}
if ($smset==0)$fikir = preg_replace("|<img[^>]+>|isU", "|smaylik|", $fikir); 
$fikir = str_replace($us."", "<b><u>".$us."</u></b>", $fikir);
echo $muellif." (".cc_tarix($savik['vaxt']).") ".$fikir."<br/>";
++$start;
}
if ($total > $max_page) {
$_v->divide();
echo page_next('stsonline.php?id='.$id.'&amp;ps='.$ps.'&amp;bc=5&amp;uid='.$uid.'&amp;ref='.$ref.'', $total, $max_page, $page) ;
}
echo "*****<br/>";
//$_v->fsize2($fsize2);

$_v->action("stsonline.php?id=$id&amp;ps=$ps&amp;bc=5&amp;uid=$uid&amp;ref=$ref".$refresh."");

print $_v->input("<input name=\"msg$ref\" maxlength=\"200\" value=\"\" title=\"Online Status Fikir\"/>").'<br/>';

if($p_arr['200']==1 and ($p_arr['210']==1 or $p_arr['211']==1 or $p_arr['212']==1 or $p_arr['213']==1))
{
$option = "<select name=\"shr$ref\" multiple=\"true\">|";
			if($p_arr['210']==1)$option .= "<option value=\"1\">Kursiv</option>|";
			if($p_arr['211']==1)$option .= "<option value=\"2\">Alt&#305; Xetli</option>|";
			if($p_arr['212']==1)$option .= "<option value=\"3\">Qal&#305;n</option>|";
			if($p_arr['213']==1)$option .= "<option value=\"4\">B&#246;y&#252;k</option>|";
			$option .= "</select>";
print $_v->select($option).'<br/>';
}


print $_v->submit('Fikir Bildir','action=save');

break;

case '4':
if($row['level']!=9 and $nk!=$id){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}

$slr = @mysql_query ("Select `id`,`user` from `users` where `id`='".$nk."' ;");
$ir = mysql_fetch_array ($slr);
$nks=$ir["user"];

$selr = @mysql_query ("Select `id`,`user` from `users` where `id`='1' ;");
$inr = mysql_fetch_array ($selr);
$adminid=$inr["id"];
$adminuser=$inr["user"];

$rnd = rand(0,99999999); 
$metn = "<u>".$ir["user"]."</u> nikinin Online Statusunu <b>".$row["user"]."</b> niki sildi.";
mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$adminid."',`towhom` = '".$adminuser."',`idwho` = '7',`time` = '".$SERVER_TIME."',`who` = 'Xeberci',`readd` =  '0',`topic` = 'Online Status',`message` = '".$metn."';");
$_v->title('Le&#287;v oldu','left');
$_v->fsize1($fsize1);
mysql_query("DELETE FROM `status_fikir` WHERE `uid`='".$nk."'");
mysql_query("DELETE FROM `status_beyen` WHERE `uid`='".$nk."'");

mysql_query("UPDATE `users` SET `stsonline` = '' WHERE `id` = '".$nk."';");
echo "Status yaz&#305;s&#305; le&#287;v olundu.<br/>\n";
break;

case '3':
if($row['level']!=9){
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "Sizin bura daxil olmaq icazeniz yoxdur.<br/>\n";
break;
}
$_v->title('Mini Panel','left');
$_v->fsize1($fsize1);

if(!$_POST['qiymetup']){
echo "M&#252;ellif: <b>$muellif</b><br/>\n";
$_v->divide();
$_v->action("stsonline.php?bc=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Online Status Qiymeti:<br/>\n";

print $_v->input("<input size=\"2\" name=\"qiymetup$ref\" maxlength=\"2\" format=\"*N\" value=\"".$qiymet."\" emptyok=\"false\"/>").'<br/>';

echo "Beyenme Qiymeti:<br/>\n";

print $_v->input("<input size=\"2\" name=\"beyenup$ref\" maxlength=\"2\" format=\"*N\" value=\"".$beyen_b."\" emptyok=\"false\"/>").'<br/>';

echo "Simvol Sayi:<br/>\n";

print $_v->input("<input size=\"2\" name=\"simvolup$ref\" maxlength=\"2\" format=\"*N\" value=\"".$simvol."\" emptyok=\"false\"/>").'<br/>';

echo "Post Limiti:<br/>\n";

print $_v->input("<input size=\"3\" name=\"postlup$ref\" maxlength=\"3\" format=\"*N\" value=\"".$postl."\" emptyok=\"false\"/>").'<br/>';




print $_v->submit('Yenile','action=save');


}else{
echo "<b>H&#246;rmetli <u>".$row['user']."</u> melumat&#305; yenilendi!</b><br/>\n";
file_put_contents('file/dat_folder/stsonline.dat',(int)$qiymetup."\n".$row['user']."\n".(int)$beyenup."\n".(int)$simvolup."\n".(int)$postlup);
}
//$_v->fsize2($fsize2);
break;

case '2':
$_v->title('Le&#287;v oldu','left');
$_v->fsize1($fsize1);
mysql_query("UPDATE `users` SET `stsonline` = '' WHERE `id` = '".$id."';");
mysql_query("DELETE FROM `status_fikir` WHERE `uid` = '".$id."'");
echo "Sizin status yaz&#305;n&#305;z le&#287;v olundu.<br/>\n";
break;

case '1':
if ($bal < $qiymet) {
$_v->title('Diqqet','left');
$_v->fsize1($fsize1);
echo "Sizin <b>$bal</b> bal&#305;n&#305;z var. Bu xidmetinden yararlanmaq &#252;&#231;&#252;n <b>".$qiymet."</b> bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
} else {
$_v->title('Elave oldu','left');
$_v->fsize1($fsize1);
$qaliq = $bal - $qiymet;

if(strlen($msg)>=$simvol)
$msg = substr($msg, 0, $simvol);

	if($msg!='')
	{
		$msg = narmobil(chkdsk($msg,basename(__FILE__),"Online Status"));

		if (mysql_query("UPDATE `users` SET `stsonline` = '".$msg."', `bal` = '".$qaliq."' WHERE `id` = '".$id."';")) {
		echo "D&#252;&#351;&#252;nd&#252;y&#252;n&#252;z qeyde al&#305;nd&#305;: <b>$msg</b><br/>";
		echo "Hesab&#305;n&#305;zdan <b>$qiymet</b> bal &#231;&#305;x&#305;ld&#305; ve hesab&#305;n&#305;zda <u>$qaliq</u> bal qald&#305;.<br/>";
		} else {
		echo "Bazada problem var. 30 saniyeden sora tekrar yoxlay&#305;n.<br/>";
		}
	}
	else
	{
		echo "Hecne yazmadiz.<br/>";
	}
}
break;
}
$_v->divide();
if($b=='1' or $b=='2' or $b=='3' or $b=='4' or $b=='5'){
echo "<a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
}
if($page!=""){
$refresh = "&amp;page=$page";
}else{
$refresh = "";
}

if($b=='6' or $b=='7' or $b=='info'){
echo "<a href=\"stsonline.php?bc=5&amp;id=$id&amp;ps=$ps&amp;uid=$uid&amp;ref=$ref".$refresh."\">Geri qay&#305;t</a><br/>\n";
}
if($b=='8'){
echo "<a href=\"stsonline.php?bc=7&amp;id=$id&amp;ps=$ps&amp;uid=$nk&amp;ref=$ref".$refresh."\">Geri qay&#305;t</a><br/>\n";
}
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>