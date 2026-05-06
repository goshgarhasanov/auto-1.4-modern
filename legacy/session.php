<?php
require("inc.php");
$link = connect_db();

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$leqeb=$row["user"];



$virtual_id = bbses($_COOKIE['setban']);

if ($virtual_id!="") {
$exp=explode("|", $virtual_id);
$v_time = trim($exp['0']);
$v_id = trim($exp['1']);
}


if ($row['kik']==10 and $row['con']==0){
if (strlen($virtual_id)>=11) {
setcookie("setban","",$SERVER_TIME-7776001);
}
$whykik = $row["whykik"];
mysql_query("UPDATE `users` SET `kik`='0' WHERE `id` = '".$id."';");

$_v->title('Qaytarildiz','center');
$_v->fsize1($fsize1);

	echo "H&#246;rmetli <b>".$leqeb."</b>, Sizi <b>".$row["whokik"]."</b> - leqebli Admin &#199;ata qaytard&#305;<br/>*****<br/>";
	if($whykik!="")echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if ($row['con']==5){
mysql_query("UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';");
if ($row["sex"]==1) $qadin="Xanim";

$_v->title('Virtual Qefes Xeberleri','center');
$_v->fsize1($fsize1);

	echo "H&#246;rmetli <b>$row[user]</b>. $qadin A&#351;a&#287;&#305;dak&#305;lar&#305; Oxuyun!<br/>*****<br/>\n";
	echo "Bu Mesaj Size <b>Virtual Qefes</b>-den gelib.<br/>----<br/>\n";
	echo "Siz Virtual Qefes oyununda az ses toplayan istifafde&#231;i oldu&#287;unuz &#252;&#231;&#252;n me&#287;lub oldunuz...<br/>\n";
	echo "Siz art&#305;q Qefes i&#351;tirak&#231;&#305;s&#305; deyilsiz!<br/>\n";
	echo "*****<br/>\n";
	echo "<a href=\"qefes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual Qefes</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

//istifadecilere mesaj panelden
if ($row['con']==1){
mysql_query("UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';");

$_v->title('Adminden Mesaj','center');
$_v->fsize1($fsize1);

	$mesaj = file("file/dat_folder/mesaj.dat");
	$shekil = trim($mesaj[0]);
	$message = trim($mesaj[1]);
	echo "<b>Bu mesaj Rehberlik terefinden gönderilib.</b><br/>----<br/>\n";
	echo $message."<br/>----<br/>\n";
	if(!empty($shekil)) echo "<img src=\"http://$shekil\" alt=\"img\" />\n";
	echo "<br/>****<br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

//rutbenin vaxti bal ximdetinden ******************************************
if ($row['con']==2){
$levelselect = @mysql_query ("Select name from levels where level='".$row['level']."'");
$levels = @mysql_fetch_array($levelselect);
$levname = $levels["name"];
mysql_query("UPDATE `users` SET `con`='0', level='0' WHERE `id` = '".$id."';");

$_v->title('Sistem Mesaj&#305;','center');
$_v->fsize1($fsize1);

	echo "H&#246;rmetli <b>$leqeb</b>$cins<br/>*****<br/>\n";
	echo "Siz Bal xidmetlerinden <b>$levname</b>, r&#252;tbesi alm&#305;&#351;d&#305;n&#305;z...<br/>\n";
	echo "Bu g&#252;n Sizin r&#252;tbenizin vaxt&#305; tamam oldu!<br/>\n";
	echo "<u>Siz art&#305;q r&#252;tbeli &#351;exslerden deyilsiniz</u>!\n";
	echo "<br/>****<br/>\n";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

//rutbenin vaxti Admin Panel ******************************************
if ($row['con']==3){
if($row['sex']==1)$cins = ", Xan&#305;m";

mysql_query("UPDATE `users` SET `con`='0', `level`='2' WHERE `id` = '".$id."';");

$_v->title('Sistem Mesaj&#305;','center');
$_v->fsize1($fsize1);

	echo "H&#246;rmetli <b>$leqeb</b>$cins Oxuyun<br/>*****<br/>\n";
	echo "Size Rehberlik m&#252;veqqeti (vaxt ile) r&#252;tbe vermi&#351;di.<br/>\n";
	echo "R&#252;tbenin m&#252;ddeti tamam oldu.\n";
	echo "<b>Siz indi r&#252;tbeli &#350;exs deyilsiz!</b><br/>----<br/>\n";
	echo "<i>Yeniden r&#252;tbe almaq &#252;&#231;&#252;n bal xidmetinden istifade edin,</i><br/>";
	echo "<u>Rehberliyi narahat etmeyin belke yox demeye &#252;z&#252; gelmir, bu o demek deyil ki, &#252;z vurmal&#305;s&#305;z...</u>!\n";
	echo "<br/>****<br/>\n";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


/////////////////////xeberdarliq
if ($row['con']==4)
{
mysql_query("UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';");
$_v->title('Xaric Edilibsiz');
$_v->fsize1($fsize1);

	$whokik = $row["whokik"];
	$whykik = $row["whykik"];
	echo "<b>Diqqet Siz Xeberdarl&#305;q Edilirsiz.</b><br/>*****<br/>";
	if($whykik)echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
	echo "<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a>-&#305; oxuyun. h&#252;ququnuzu bilin.<br/>----<br/>";
	echo "<i>Qaydalar&#305; pozsan&#305;z xaric edileceksiz</i>!<br/>*****<br/>";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if ($row['con']==5){
mysql_query("UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';");

$_v->title('Bal Xidmeti');
$_v->fsize1($fsize1);

	echo "<b>Rengli nikivizin haqq&#305;nda melumat.</b><br/>*****<br/>";
	echo "Siz 1 ay bundan evvel bal xidmetlerinden ald&#305;&#287;&#305;n&#305;z Rengli nikin vaxt&#305; tamam oldu!<br/>*****<br/>";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if ($row['con']==6){
mysql_query("UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';");

$_v->title('Bal Xidmeti','center');
$_v->fsize1($fsize1);

	echo "<b>G&#246;r&#252;nmezlik haqq&#305;nda melumat.</b><br/>*****<br/>";
	echo "Siz 1 ay bundan evvel bal xidmetlerinden nikinizi \"<u>G&#246;r&#252;nmez</u>\" etmi&#351;diz.<br/>Bu g&#252;n \"<u>g&#246;r&#252;nmez</u>\"liyinizin vaxt&#305; tamam oldu!<br/>*****<br/>";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


if ($row['con']==7){
mysql_query("UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';");

$_v->title('Bal Xidmeti','center');
$_v->fsize1($fsize1);

	echo "<b>Toxunulmazl&#305;q haqq&#305;nda melumat.</b><br/>*****<br/>";
	echo "Siz 1 ay bundan evvel bal xidmetlerinden \"<u>Toxunulmazl&#305;q</u>\"  alm&#305;&#351;d&#305;n&#305;z.<br/>Bu g&#252;n Sizin \"<u>Toxunulmazl&#305;q</u>\"&#305;n&#305;z&#305;n vaxt&#305; tamam oldu!<br/>*****<br/>";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if ($row['con']==8){
mysql_query("UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';");

$_v->title('Bal Xidmeti','center');
$_v->fsize1($fsize1);

	echo "<b>Toxunulmazl&#305;q haqq&#305;nda melumat.</b><br/>*****<br/>";
	echo "Siz 1 ay bundan evvel bal xidmetlerinden \"<u>Toxunulmazl&#305;q</u>\"  alm&#305;&#351;d&#305;n&#305;z.<br/>Bu g&#252;n Sizin \"<u>Toxunulmazl&#305;q</u>\"&#305;n&#305;z&#305;n vaxt&#305; tamam oldu!<br/>*****<br/>\n";
	$_v->last_page();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




// Xaric edilmek ******************************************
if($SERVER_TIME<$row["kik"]){
setcookie("setban",$row["kik"]."|".$id,$row["kik"]); 

$tkick = $row["kik"] - $SERVER_TIME;

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

$_v->title('Xaric Edilibsiz!');
$_v->fsize1($fsize1);

	$whokik = $row["whokik"];
	$whykik = $row["whykik"];
	echo "<b>".$whokik." Sizi &#199;atdan xaric Edib.</b><br/>*****<br/>";
	echo "<u>Xaric olunma m&#252;ddeti</u>: <b>".$tkick." (".$vaxt.")</b><br/>";
	if($whykik)echo "<b>Sebeb</b>: ".$whykik."<br/>";
	
	//require("data_session.php");
if ($banned['xaricmetod'] == '1') {
	echo "----<br/><a href=\"data_session.php?id=$id&amp;ps=$ps&amp;nn=xaric&amp;ref=$ref\">Nikin vaxtından əvvəl qaytarılması.</a><br/>";
}
	
	echo "----<br/><a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a>-&#305; oxuyun. <br/>";
	echo "Eger sebebsiz xaric edilibsizse Rehberliye m&#252;raciet ede bilersiz....<br/>";
	echo "<i>Tebii ki, xaric olunma m&#252;ddeti bitenden sonra.</i><br/>*****<br/>";
	echo "<u>$site</u>\n";
	echo "<a href=\"http://$site_url\">&#xbb;&#xbb;&#xbb;</a><br/>";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




// Xaric edilmek cookie******************************************

if($SERVER_TIME<$v_time){
$tkick = $v_time - $SERVER_TIME;
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

$_v->title('Xaric Edilibsiz!');
$_v->fsize1($fsize1);

	echo "<b>Siz &#199;atdan xaric edilibsiz.</b><br/>*****<br/>\n";
	echo "<u>Xaric olunma m&#252;ddeti</u>: <b>".$tkick." (".$vaxt.")</b><br/>----<br/>\n";
	echo "<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a>-&#305; oxuyun. <br/>\n";
	echo "Eger sebebsiz xaric edilibsizse Rehberliye m&#252;raciet ede bilersiz....<br/>\n";
	echo "<i>Tebii ki, xaric olunma m&#252;ddeti bitenden sonra.</i><br/>*****<br/>\n";
	echo "<u>$site</u>\n";
	echo "<a href=\"http://$site_url\">&#xbb;&#xbb;&#xbb;</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


//IP-Browser Ban edilmek #################################### IP-Adress Ban edilmek. 
if($row["level"]<5){
mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_MAX."')and(soft = '".$HTTP_USER_AGENT."')");
if(mysql_affected_rows()!=0) {
$brayz=strtok($_SERVER["HTTP_USER_AGENT"],'/');
$_v->title($brayz.' BAN!','center');
$_v->fsize1($fsize1);

	echo "\"<b>$brayz</b>\" Markal&#305; telefon modellerinin &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/> <i>\"<b>$brayz</b>\" markal&#305; Telefon modeli Ban Edilib!</i><br/>----<br/>\n";
	echo "<a href=\"http://$site_url\">$site</a><br/>";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
//******************************************
mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_MAX."')and(soft = 'IP-BAN')");
if(mysql_affected_rows()!=0) {
$_v->title("$REMOTE_ADDR BAN!",'center');
$_v->fsize1($fsize1);

	echo "\"<b>$REMOTE_ADDR</b>\" IP-Adressi ile &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/>----<br/>\n";
	echo "<a href=\"http://$site_url\">$site</a><br/>";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
}
else
{
	mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_MAX."')and(soft = '".$HTTP_USER_AGENT."')");
	if(mysql_affected_rows()!=0) {
	$brayz=strtok($_SERVER["HTTP_USER_AGENT"],'/');
	@mysql_query("UPDATE `users` SET `banned`='0'  WHERE `id` = '".$id."';");
	$_v->title("$brayz BAN!",'center');
	$_v->fsize1($fsize1);

		echo "<b>Diqqet!</b><br/>----<br/>\"<b>$brayz</b>\" markal&#305; Telefon modelleri BAN oldu.<br/>Sizin R&#252;tbeniz olduqu &#252;&#231;&#252;n Siz &#199;ata daxil ola bilersiz.<br/>----<br/>\n";
		$_v->last_page();
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
	}
	//******************************************
	mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_MAX."')and(soft = 'IP-BAN')");
	if(mysql_affected_rows()!=0)
	{
	@mysql_query("UPDATE `users` SET `banned`='0'  WHERE `id` = '".$id."';");

	$_v->title("$REMOTE_ADDR BAN!",'center');
	$_v->fsize1($fsize1);

		echo "<b>Diqqet!</b><br/>----<br/>\"<b>$REMOTE_ADDR</b>\" IP-Adressi ile &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/>Sizin R&#252;tbeniz olduqu &#252;&#231;&#252;n Siz &#199;ata daxil ola bilersiz.<br/>----<br/>\n";
		$_v->last_page();
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
	}
}

if ($row['banned']==1){
setcookie("setban",$id,$SERVER_TIME+259200);
// if($virtual_id!=""){
// mysql_query("UPDATE `users` SET `banned`='1', `whokik`='".$row["whokik"]."', `whykik`='".$row["whykik"]."' WHERE `id` = '".$id."';");
// }


$_v->title('BAN!','center');
$_v->fsize1($fsize1);

	$whokik = $row["whokik"];
	$whykik = $row["whykik"];
	echo $whokik." Sizi BAN edib.<br/>*****<br/>\n";
	
if ($banned['banmetod'] == '1') {
	echo "<a href=\"data_session.php?id=$id&amp;ps=$ps&amp;nn=ban&amp;ref=$ref\">Banın Açılması.</a><br/>----<br/>";
}
	
	if($whykik!="")echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>\n";
	echo "<a href=\"http://$site_url\">$site</a><br/>\n";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}




if ($row['banned']==2){
setcookie("setban",$id,$SERVER_TIME+259200);
// if($virtual_id!=""){
// mysql_query("UPDATE `users` SET `banned`='2', `whokik`='".$row["whokik"]."', `whykik`='".$row["whykik"]."' WHERE `id` = '".$id."';");
// }

$_v->title('Delete!','center');
$_v->fsize1($fsize1);

	$whokik = $row["whokik"];
	$whykik = $row["whykik"];
	echo "<b>".$whokik." Sizin leqebinizi Silib.</b><br/>*****<br/>";
	
	if ($banned['delmetod'] == '1') {
	echo "<a href=\"data_session.php?id=$id&amp;ps=$ps&amp;nn=del&amp;ref=$ref\">Silinmiş nikin qaytarılması.</a><br/>----<br/>";
}
	if($whykik!="")echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
	echo "<a href=\"http://$site_url\">$site</a><br/>";
	
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

//Defual  ******************************************
if ($row['banned']>=3){
@mysql_query("UPDATE `users` SET `banned`='0' WHERE `id` = '".$id."';");
}


if ($row['con']=="0"){
@mysql_query("UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';");
if($rm!=""){
header ("Location: chat.php?id=$id&ps=$ps&rm=$rm&ref=$ref");
}
else 
{
header ("Location: enter.php?id=$id&ps=$ps&ref=$ref");
}
exit;
}
?>