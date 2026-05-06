<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

require("./file/fun/muen");

if($row['room']!='28'){
mysql_query ("Update `users` set `room`='28' where `id` ='".$id."';");
};
$r = mysql_query ("select count(`readd`) as `num` from `zapiski` WHERE (`idtowhom` = '".$id."')and(`readd` = '0')and(`ininc` = '1');");
$a = mysql_fetch_array($r);
$inb = $a["num"]; 

$msn = $row["msn"];
if($msn>=999){
$rr = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");
$aa = mysql_fetch_array($rr);
$msn = $aa["num"];
mysql_query("UPDATE `users` SET `msn` = '".$msn."' WHERE `id` = '".$id."' LIMIT 1;");
}

require("file/dat_folder/n_n/niko.php");
if($row["onphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Onlayna Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Otaqlar</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$v_max = $number_14;

$avr = $row["avr"];

ob_start();

if (strpos ($HTTP_USER_AGENT,"Windows") !== false)
{
	$_v->do_type = array("<do type=\"accept\" name=\"Yenile\" label=\"Yenile\"><go href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do> ","<do type=\"accept\" name=\"Dehliz\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>");
	$v_max = $number_13;
}

if($avr >= 10) $_v->Redirect("on.php?id=$id&amp;ps=$ps&amp;ref=$ref",$avr);
$_v->title('Online Mesaj ('.date("H:i",$SERVER_TIME).')','center');
$_v->fsize1($fsize1);
$sql = mysql_query("SELECT * FROM `AN_reklam` where harda = '3' and mud > '".time()."' ORDER BY `id` asc;");
if(mysql_num_rows($sql) != 0) {
while($EH_s = mysql_fetch_array($sql))
{
echo "Reklam: <a href=\"http://".$EH_s["urlu"]."\">".$EH_s["adi"]."</a> - ".$EH_s["shuar"]."<br/>";
}
echo $divide;
}

if ($number_22 == 1) {
require("file/dat_folder/top_reytinq_users.php");}

if ($ferqli == 1 and 1==2) {
echo "<br/><a href=\"on_ferqli.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Nickini g&#246;ster</a><br/>\n";
$anket = mysql_query("SELECT * FROM like_info WHERE time > '".time() ."' ORDER BY RAND() DESC LIMIT 1;");
if(mysql_affected_rows() == true)
{
    $ank = mysql_fetch_object($anket);
    $anik = $ank->user;
    $anid = $ank->usid;
echo "<u><b>Ferqli Nick</b></u>: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$anid."&amp;ref=$ref\">".$anik."</a><br/>\n";

}
}



require("file/dat_folder/n_n/onbonus");
////

$_v->align('left');

if ($number_15 == 1) {require("onlinesms.php");
echo $divide;
}

#-------------------------------------------------------------------------------

if ($number_24 == 1) {
$r = mysql_query("select * from `user_books` where `status` = '1' order by rand() desc limit 1;");
while($heka = mysql_fetch_array($r))
{
$hid = $heka['id'];
$hekayead = $heka['name'];
   echo "<b><u>Maraqli Hekaye:</u></b> <a href=\"hekaye.php?go=info&amp;id=$id&amp;ps=$ps&amp;cid=$hid&amp;ref=$ref\">".$hekayead."</a><br/>";
}
}

if ($number_23 == 1) {
$sql = mysql_query("SELECT * FROM `sh_tem`  order by rand() limit 1" );
while($emirf = mysql_fetch_array($sql))
{
$for_id=$emirf['id'];
$for_name=$emirf['name'];

$count = mysql_query("SELECT COUNT(id) FROM sh_post WHERE tema='".$for_id."'");
$count_comment = mysql_result($count, 0);

echo "<u><b>Forum Fikir:</b></u> <a href=\"forum.php?id=$id&amp;ps=$ps&amp;cmd=4&amp;uid=".$for_id."&amp;ref=$ref\">".$for_name."</a> (".$count_comment.")<br/>\n";

}
}

if($yer=='0' and $bonusm=='1'){echo "<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=missia&amp;ref=$ref\">Missia Statistikam:</a>\n";
mission($row['action']);}

if ($number_1 != 'x')echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_1."</a><br/>\n";
if ($number_2 != 'x')echo " <a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><b><span>".$number_2."</span></b></a><br/>\n"; 
if($inb != "0") echo "(<b>".$inb."</b>) <a href=\"bildiris.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yeni Bildiris</a> var!<br/>\n";

if ($number_3 != 'x')echo "<a href=\"mesaj.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_3."</a> (<a href=\"mesaj.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$msn."</a>)\n";
if ($number_3 != 'x')echo "| ";
if ($number_4 != 'x')echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_4."</a><br/>";
if ($number_11 != 'x')echo " ".$number_11." (<b><a href=\"on.php?id=$id&amp;ps=$ps&amp;c=2&amp;ref=$ref\">".$cemi."</a></b>) ".$number_12."<br/>";
if ($number_5 != 'x'){
if($bilis!="0")echo " ".$number_5." <a href=\"on.php?id=$id&amp;ps=$ps&amp;c=0&amp;ref=$ref\">".$usersm[0]."</a>\n";
else echo " ".$number_5." ".$usersm[0]."\n";

echo "|\n";
if($bilis!="1")echo "".$number_6." <a href=\"on.php?id=$id&amp;ps=$ps&amp;c=1&amp;ref=$ref\">".$usersj[0]."</a><br/>\n";
else echo " ".$number_6." ".$usersj[0]."<br/>\n";
}
if ($number_7 != 'x'){
if($requ=="xal"){
echo "Xala g&#246;re |\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;l=0&amp;ref=$ref\">Vaxta g&#246;re</a><br/>\n";
echo "<a href=\"xal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_7."</a><br/>\n";
}else{
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;l=1&amp;ref=$ref\">Xala g&#246;re</a> |\n";
echo "Vaxta g&#246;re<br/>\n";
}
} 
////
$o = mysql_query("SELECT COUNT(*) FROM `mduel` WHERE `devet` = '2' and `dtime` > '".time()."';");
$obwi = mysql_result($o, 0);
if ($number_17 != 'x'){
echo "<a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><span style='color:red'>".$number_17."</span></a>";
}
if ($number_18 != 'x'){
echo " | <a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><span style='color:red'>".$number_18."</span></a>";
}
if ($number_19 != 'x'){
echo " | <a href=\"meqa.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><span style='color:red'>".$number_19."</span></a>";
}
if ($number_20 != 'x'){
echo " | <a href=\"mduel.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\"><span style='color:red'>".$number_20."</span></a>-($obwi)";
}
if ($number_17 != 'x' or $number_18 != 'x' or $number_19 != 'x' or $number_20 != 'x'){
echo "<br/>\n";
}

///
$_v->divide();
if ($number_16 != 'x'){
if ($row['shekil'] == 0) {
    echo "".$number_16." <a href=\"on.php?id=$id&amp;ps=$ps&amp;shekil=1&amp;ref=$ref\">A&#231;</a><br/>";
} else {
    echo "".$number_16." <a href=\"on.php?id=$id&amp;ps=$ps&amp;shekil=0&amp;ref=$ref\">Ba&#287;la</a><br/>";
} 
}


//$_v->divide();
if(strlen($message)>=1){
if($nn==01){
require("file/fun/2");
}
}

$next_id = next_id($onu,$v_max);
$i = $next_id[start];

$r = mysql_query ("select `id`,`user`,`birth`,`city`,`sex`,`zn`,`xal`,`stsonline`,`meqa`,`image_fon` from `users` where `time`> '".$_AUTO['online']."' and `inv`!='3' and `kik`<'".time()."' and banned = '0' $muenn $forma limit $next_id[start],$next_id[max_page];");
while($object = mysql_fetch_object($r)) 
{
$i++;
	$xals = ($object->xal!='0') ? '(<b>'.$object->xal.'</b>-xal)' : null;
	$xals = ($requ=='xal') ? $xals : null;
	if($object->sex==0) $object->sex="K"; else $object->sex="Q";

	
	list($gun,$ay,$il) = split('-',$object->birth);
	
	if($object->birth = (date('Y') - $il))
	{
		$ay = (date('m') - $ay);
		if(0 > $ay or ($ay==0 and $gun <= (date('d') - $gun))) {
			--$object->birth;
		}
	}

if($inc_on['arxiv']!='x' and 1==2){
$_v->html('<div style="float:right;">');
$_v->html("<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=".$object->id."&amp;ref=$ref\"><img src=\"img/arxiv.png\"/></a>");
$_v->html('</div>');
}
	
	if($object->zn!="") $object->zn=" <img src=\"img/z".$object->zn.".gif\" alt=\".\"/>";

	if((file_exists("i/".$object->id.".gif")&&($row["rnikler"]==0))) {
		$object->user = "<img src=\"i/".$object->id.".gif\" alt=\"$object->user\"/>";
	} else if ($object->meqa == 1) {
		$object->user = "<b>".$object->user."</b>";
	} else if ($object->meqa == 2) {
		$object->user = "<i>".$object->user."</i>";
	} else if ($object->meqa == 3) {
		$object->user = "<b><i>".$object->user."</i></b>";
	} else if ($object->meqa == 4) {
		$object->user = "<big>".$object->user."</big>";
	}
if($row["shekil"]==1 and $number_16 != 'x'){
if($object->image_fon=="" and $object->sex == K){
$object->image_fon="<img style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\" src=\"img/sexo.gif\" width=\"35\" height=\"35\" alt=\"foto\"/>";
}
else if($object->image_fon=="" and $object->sex == Q){
$object->image_fon="<img style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\" src=\"img/sexq.gif\" width=\"35\" height=\"35\" alt=\"foto\"/>";
}else{
$object->image_fon="<img style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\" src=\"image.php?img=photos/src/".$object->image_fon."&amp;\" width=\"35\" height=\"35\" alt=\"foto\"/>";
}
$imgon =$object->image_fon;
}	
 $_v->html('<div class="links">');
	echo ($i).") $imgon ".$object->zn."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$object->id&amp;re=$ref\">".$object->user."</a> [".$object->birth.",".$object->sex.",".$object->city."] $xals<br/>\n";

	if(strlen($object->stsonline)>3)
	{
	   $usms = @mysql_fetch_array(mysql_query ("select count(`id`) as num from `status_beyen` where `uid` ='".$object->id."';"));
	   $like = $usms["num"];
	   if ($like!=0)$sts = " / <a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;bc=7&amp;uid=$object->id&amp;ref=$ref\">+".$like."</a>)";
	   else $sts = ")";
	   if($row['level']==9 or $id==$object->id)echo "<a href=\"stsonline.php?bc=4&amp;id=$id&amp;ps=$ps&amp;nk=".$object->id."&amp;ref=$ref\">[x]</a>-\n";
	   $total = @mysql_num_rows(mysql_query("select `id` from `status_fikir` where `uid` = '".$object->id."';"));
	   if ($total!=0)$fik = "(<a href=\"stsonline.php?bc=5&amp;id=$id&amp;ps=$ps&amp;uid=$object->id&amp;ref=$ref\">Fikir: $total</a>".$sts."";
	   else $fik = "(<a href=\"stsonline.php?bc=5&amp;id=$id&amp;ps=$ps&amp;uid=$object->id&amp;ref=$ref\">Fikir bildir</a>".$sts."";
	   echo $object->stsonline." ".$fik."\n";
	$_v->wml('<br/>');
	}
	else if($id==$object->id)
	{
		echo "Online Status <a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yaz</a>\n";
	$_v->wml('<br/>');
	}
 $_v->html('</div>');
}



if($next_id['a'] > $next_id['max_page'])
{
$_v->divide();
	echo page_next("on.php?id=$id&amp;ps=$ps&amp;ref=$ref", $next_id['a'], $next_id['max_page'], $next_id['page']);
}
	


$_v->divide();
if ($number_9 != 'x')echo  "<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_9."</a><br/>\n";
if ($number_8 != 'x')echo "<a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_8."</a><br/>\n";
if ($number_10 != 'x')echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">".$number_10."</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
?>