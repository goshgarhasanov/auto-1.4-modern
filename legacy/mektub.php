<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__)); 
$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = '29' WHERE `id` = '".$id."' LIMIT 1;");
$us=$row["user"];
$posts=$row["posts"]; 
if($rm!="")$takep="&amp;rm=$rm&amp;ref=$ref";
else $takep="&amp;ref=$ref";
function cc_tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 Saat: <u>$cc_time2</u>";
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
if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye==0))$cc_muddet = "<u>halhazirda</u>";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<60))$cc_muddet = "<u>$cc_saniye saniye</u> evvel";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "<u>$cc_deqiqe deqiqe</u> evvel";
else $cc_muddet = "<u>$cc_saat_tam saat</u> evvel";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;nen Saat: <u>$time_p[1]</u>";}else{
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
$cc_time="".$w[$hefte]." Saat: <u>$cc_time2</u>";
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


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";

switch ($bol) {

default:
echo "<card id=\"boxca\" title=\"Mektub Qutusu\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "\"<b>Mektub</b>\" Qutusu:<br/>
<u>Mektublar 1 hefteden &#231;ox saxlan&#305;lm&#305;r</u><br/>\n";
echo $divide;
echo $fsize2;
echo "</p>\n";
echo "<p>\n";
echo $fsize1;
$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1')");
$a = mysql_fetch_array($r);
$inb = $a["num"];
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Gelenler($inb)</a><br/>\n";
$r = mysql_query("select count(readd) as num from zapiski where (idwho = '".$id."')and(insend ='1')");
$a = mysql_fetch_array($r);
$num = $a["num"];
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Gedenler($num)</a><br/>\n";
$r = mysql_query ("select count(readd) as num from zapiski WHERE (idwho = '".$id."')and(readd = '0')and(insend = '1')");
$a = mysql_fetch_array($r);
$out = $a["num"];
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=4$takep\">G&#246;nderilib oxunmayanlar($out)</a><br/>\n";
$r = mysql_query("select count(readd) as num from zapiski where (idtowhom = '".$id."')and(ininc ='1')");
$a = mysql_fetch_array($r);
$arx = $a["num"];
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=6$takep\">Arxiv Mektublar&#305;n&#305;z($arx)</a><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=yaz$takep\">Mektub yaz</a><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?go=hamisi&amp;id=$id&amp;ps=$ps&amp;bol=sil&amp;go=all$takep\">B&#252;t&#252;n Mektublar&#305; Sil</a><br/>\n";
echo $divide;
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;

case 'oxu':
$r = mysql_query ("Select who,topic,date,message,idtowhom,idwho,time,readd from zapiski WHERE klu4 = '".$im."'");
if (mysql_affected_rows() == 0){
echo "<card id=\"xeta\" title=\"xeta\" ontimer=\"mektub.php?id=$id&amp;ps=$ps$takep\"><timer value=\"10\"/>\n";
echo "<p align=\"center\">\n";
echo "Mektub Yoxdur..!\n";
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}

$a = mysql_fetch_array($r);
if ($a["idtowhom"] != $id){
echo "<card id=\"xeta\" title=\"xeta\" ontimer=\"mektub.php?id=$id&amp;ps=$ps$takep\"><timer value=\"15\"/>\n";
echo "<p align=\"center\">\n";
echo "Mektub Yoxdur!\n";
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit();
}

echo "<card id=\"read\" title=\"Mektublar\">\n";
$who = $a ["who"];

if(empty($a ["who"])) {
$who = "not user";
} else {
$who = $a ["who"];
}

$topic = $a ["topic"];
$date = $a ["date"];
$message = $a ["message"];
$usid = $a ["idwho"];
$read = $a ["readd"];
$tari = $a ["time"];

$zn_sql = @mysql_query ("Select id,zn from users where id='".$usid."'");
$inf = mysql_fetch_array ($zn_sql);
$zn = $inf["zn"];
if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$who = "<img src=\"i/".$usid.".gif\" alt=\"$who\"/>";
}
if ($read == 0)mysql_query ("Update zapiski set readd = '1' WHERE klu4 ='".$im."'");
echo "<p align=\"center\">";
echo $fsize1;
echo "\"".$zn." <span style='color:deeppink'><b>$who</b></span>\" ".cc_tarix($tari)." Size yaz&#305;b.<br/>\n";
echo $fsize2;
echo "</p><p align=\"left\">";
echo $fsize1;
if ($topic!=""){echo "M&#246;vzu: $topic<br/>\n";echo $divide;}
echo "<b>Mektub</b>:  $message<br/>\n";
echo $divide;
if ($usid != 0) {
echo "Cavab:<br/>";
echo $fsize2;
echo "<input name=\"message$ref\" maxlength=\"600\" value=\"\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"mektub.php?go=pn&amp;id=$id&amp;ps=$ps&amp;bol=yaz$takep\" method=\"post\">\n";
$who = $a ["who"];
echo "<postfield name=\"towhom\" value=\"$who\"/>\n";
echo "<postfield name=\"topic\" value=\"$(topic$ref)\"/>\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "<postfield name=\"rm\" value=\"$rm\"/>\n";
echo "<postfield name=\"action\" value=\"gonder\"/>\n";
echo "</go></anchor><br/>\n";
echo "<a href=\"tel.php?id=$id&amp;ps=$ps&amp;nk=$usid$takep\">Tel Modeline Bax*</a><br/>\n";
echo "<a href=\"ignor.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;mod=add$takep\">&#304;gnor et</a>-(he&#231;ne yazmas&#305;n)<br/>\n";
echo $divide;
echo "<a href=\"mektub.php?bol=sil&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;im=$im&amp;ininc=1$takep\">Bu Mektubu sil</a><br/>\n";
echo "<a href=\"mektub.php?bol=delmall&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;usid=$usid&amp;ininc=1$takep\">B&#252;t&#252;n Mektublar&#305;n&#305; sil</a><br/>\n";
echo $divide;
}
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri Qay&#305;t</a><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?s=$s&amp;id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;

case 'moxu':
$r = mysql_query ("Select who,topic,date,message,idtowhom,towhom,idwho,readd from zapiski WHERE klu4 = '".$im."'");
$a = mysql_fetch_array($r);
$towhom = $a["towhom"];
$message = $a["message"];
$topic = $a["topic"];
echo "<card id=\"boxca\" title=\"Yaz&#305;lan Mektub\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Bu Mektubu \"<b>".$towhom."</b>\" leqebli &#350;exse g&#246;nderibsiz:<br/>";
echo $divide;
echo "<b>Mektub</b>: ".$message."<br/>";
echo "<br/>";
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=yaz&amp;key=".$im."$takep\">Mektubu y&#246;nlendir</a><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;

case 'delmall':
echo "<card id=\"msgdel\" title=\"Silindi\">\n";
$select = mysql_query( "select id,user from users where id = '".$usid."';" );
$rows = mysql_fetch_array( $select );
$user = $rows['user'];
if ( isset( $insend ) )
{
mysql_query( "update zapiski set insend = '0' WHERE idwho = '".$id."' and idtowhom = '".$usid."';" );
}
if ( isset( $ininc ) )
{
mysql_query( "update zapiski set ininc = '0' WHERE idtowhom = '".$id."' and idwho = '".$usid."';" );
}
mysql_query( "delete from zapiski WHERE (insend = '0')and(ininc = '0') and idtowhom = '".$id."';" );

echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>".$user."</b>-den gelen b&#252;t&#252;n Mektublar silindi!<br/>\n";
echo $divide;
echo "<a href=\"mektub.php?bol=1&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";

echo $fsize2;
break;

case '1':
$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1')");
$a = mysql_fetch_array($r);
$num = $a["num"];
if ($num == 0){
echo "<card id=\"notmsg\" title=\"Mektub Yoxdur\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Hal-haz&#305;rda Mektubunuz Yoxdur.</u><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);
exit;
}

if(!isset($s))$s=1;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;

echo "<card id=\"gelen\" title=\"Gelenler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo "<b>Gelenler:</b><br/>";
echo "****<br/>";
$r = mysql_query ("Select who,topic,date,time,klu4 from zapiski WHERE (idtowhom = '".$id."')and(readd = '0') order by time desc LIMIT $o,$do");

for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($r);

if(empty($a ["who"])) {
$fromw = "not user";
} else {
$fromw = $a ["who"];
}
$topic = $a ["topic"];
$date = $a ["date"];
$klu4 = $a ["klu4"];

echo "<b><a href=\"mektub.php?bol=oxu&amp;id=$id&amp;ps=$ps&amp;im=$klu4&amp;s=$s\">$fromw</a></b>[".cc_tarix($a ["time"])."]\n";
echo "[<a href=\"mektub.php?s=$s&amp;id=$id&amp;ps=$ps&amp;bol=sil&amp;im=$klu4&amp;sil\">x</a>]\n";
echo "<br/>";
}

$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo "<br/><a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=1&amp;s=$next$takep\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=1&amp;s=$prev$takep\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;

case '2':
$r = mysql_query("select count(readd) as num from zapiski where (idwho = '".$id."')and(insend ='1')");
$a = mysql_fetch_array($r);
$num = $a["num"];
if ($num == 0){
echo "<card id=\"xeta\" title=\"no mektub\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Siz he&#231;kese mektub g&#246;ndermemisiz!</u><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);   
exit;
}

if(!isset($s))$s=1;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;

echo "<card id=\"outbox\" title=\"Gedenler\">\n";
echo "<p>\n";
echo $fsize1;

$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo "<b>Sizin yazd&#305;qlar&#305;n&#305;z:</b><br/>****<br/>";
$r = mysql_query ("Select who,topic,date,klu4,readd,towhom from zapiski WHERE (idwho = '".$id."')and(insend ='1') order by time desc LIMIT $o,$do");
for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($r);
$fromw = $a ["who"];
$towhom = $a ["towhom"];
$topic = $a ["topic"];
$date = $a ["date"];                    
$klu4 = $a ["klu4"];
$read = $a ["readd"];

echo "Oxunub <a href=\"mektub.php?bol=moxu&amp;id=$id&amp;ps=$ps&amp;im=$klu4&amp;s=$s\">$towhom</a> - [<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=sil&amp;im=$klu4&amp;s=$s&amp;insend=1\">x</a>]<br/>";
}
mysql_close($link);
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2&amp;s=$next$takep\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2&amp;s=$prev$takep\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}
echo "---<br/>\n";
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;

case '4':
if (isset($rm)) $takep2="&amp;rm=$rm$takep";
else $takep2="$takep";

$r = mysql_query("select count(readd) as num from zapiski where (idwho = '".$id."')and(readd = '0')and(insend ='1')");
$a = mysql_fetch_array($r);
$num = $a["num"];
if ($num == 0){
echo "<card id=\"error\" title=\"Oxunub\" >\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Sizin g&#246;nderdiyiniz b&#252;t&#252;n mektublar&#305;n&#305;z oxunub...</u><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
exit;
}

if(!isset($s))$s=1;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;

echo "<card id=\"inbox\" title=\"Oxunmayanlar\">\n";
echo "<p>\n";

$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo $fsize1;
echo "<b>G&#246;nderilib oxunmayanlar:</b><br/>****<br/>";
echo $fsize2;
$r = mysql_query ("Select who,topic,date,klu4,readd,towhom from zapiski WHERE (idwho = '".$id."')and(readd = '0')and(insend ='1') order by time desc LIMIT $o,$do");
for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($r);
$fromw = $a ["who"];
$towhom = $a ["towhom"];
$topic = $a ["topic"];
$date = $a ["date"];
$klu4 = $a ["klu4"];
$read = $a ["readd"];
echo $fsize1;
if ($read == 0) echo "<b>Oxunmay&#305;b <a href=\"mektub.php?bol=moxu&amp;id=$id&amp;ps=$ps&amp;im=$klu4&amp;s=$s$takep2\">$towhom</a></b> - <a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=sil&amp;im=$klu4&amp;s=$s&amp;ininc=1&amp;sil$takep2\">[x]</a><br/>\n";
echo $fsize2;
}
mysql_close($link);
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $fsize1;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=4&amp;s=$next$takep2\">Novbeti</a><br/>\n";
echo $fsize2;
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo $fsize1;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=4&amp;s=$prev$takep2\">Evvelki</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektublar</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;

case '6':
$r = mysql_query( "select count(readd) as num from zapiski where (idtowhom = '".$id."')and(readd = '1')and(ininc ='1');" );
$a = mysql_fetch_array( $r );
$num = $a['num'];
if ( $num == 0 )
{
echo "<card id=\"xeta\" title=\"Mektub yoxdur\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Arxivde Mektubunuz Yoxdur</u><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id={$id}&amp;ps={$ps}{$takep}\">Mektub Qutusu</a><br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">Chata Qay&#305;t</a><br/>";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a>\n";
echo $fsize2;
mysql_close( $link );
exit( );
}
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $num / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}

echo "<card id=\"arxiv\" title=\"Arxiv Mektublar\">\n";
echo "<p>\n";
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $num < $do )
{
$do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo $fsize1;
echo "<b>Arxiv Mektublar&#305;n&#305;z...</b><br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query( "Select idwho,topic,date,klu4,readd,time,who from zapiski WHERE (idtowhom = '".$id."')and(readd = '1')and(ininc ='1') order by time desc LIMIT {$o},{$do};" );
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $r );
$idwho = $a['idwho'];
$topic = $a['topic'];
$date = $a['date'];
$klu4 = $a['klu4'];
$read = $a['readd'];
$fromw = $a['who'];
if ( mysql_affected_rows( ) != 0 )
{
echo $fsize1;
if ( $topic != "" )
{
$topic = " (".$topic.")";
}
if ( $read == 1 )
{
echo "<a href=\"mektub.php?bol=oxu&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">".$fromw."".$topic."</a> [".cc_tarix($a["time"])."]<br/>\n";
}
else
{
echo "<b><a href=\"mektub.php?bol=oxu&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">".$fromw."".$topic."</a> [".cc_tarix($a["time"])."]</b><br/>\n";
}
echo $fsize2;
}
++$i;
}
mysql_close( $link );
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $num < $do )
{
$do = $num;
}
echo $fsize1;
echo "<a href=\"mektub.php?bol=6&amp;id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">&gt;&gt;".$ot."-".$do."&gt;&gt;</a><br/>\n";
echo $fsize2;
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo $fsize1;
echo "<a href=\"mektub.php?bol=6&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;".$ot."-".$do."&lt;&lt;</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo $divide;
echo "<a href=\"mektub.php?id={$id}&amp;ps={$ps}{$takep}\">Mektub Qutusu</a><br/>\n";
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">Chata Qay&#305;t</a><br/>";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a>\n";
echo $fsize2;
break;

case 'sil':
if (isset($sil)){
echo "<card id=\"silindi\" title=\"Silindi\">\n";

echo "<p align=\"center\">\n";
echo $fsize1;
mysql_query ("delete from zapiski WHERE klu4 = '".$im."'");
echo "<b>Mektub Silindi!</b><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=1$takep\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";  
exit();
}

if (isset($go)){
echo "<card id=\"deleted\" title=\"Temizlik...\">\n";
mysql_query ("update zapiski set insend = '0' WHERE idwho = '".$id."'");
mysql_query ("update zapiski set ininc = '0' WHERE idtowhom = '".$id."'");
mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0')");
echo "<p align=\"center\">\n";
echo $fsize1;
echo "B&#252;t&#252;n Mektublar&#305;n&#305;z silindi!<br/>\n";
echo $divivde;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";  
exit();
}

$r = mysql_query ("Select idtowhom,idwho from zapiski WHERE klu4 = '".$im."' ");
$a = mysql_fetch_array($r);
if ((mysql_affected_rows() != 0)&&(($a["idtowhom"]==$id)||($a["idwho"]==$id))){
if (isset($ininc)) echo "<card id=\"deleted\" title=\"silindi\" >\n";
else echo "<card id=\"deleted\" title=\"silindi\" >\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Mektub Silindi!</b><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
if (isset($insend)) mysql_query ("update zapiski set insend = '0' WHERE klu4 = '".$im."' ");
if (isset($ininc)) mysql_query ("update zapiski set ininc = '0' WHERE klu4 = '".$im."' ");
mysql_query ("delete from zapiski WHERE (insend = '0')and(ininc = '0')");
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";  
exit();
} else {
echo "<card id=\"xeta\" title=\"xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Mektubunuz yoxdur.</u>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=2$takep\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
exit();
}
break;

case 'yaz':
if ($row["ti"]!=0){
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Siz Mektub Xidmetinize Adminstrator Terefinden Qada&#287;an Qoyulub!<br/>";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps$takep\">Mektub Qutusu</a><br/>";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
break;
}
if(!@$go){
$message = $topic = $towhom = "";

if (isset($key)){
echo "<card id=\"yaz\" title=\"Mektubun Y&#246;nlenmesi\">\n";
echo "<p>\n";

$r = mysql_query ("SELECT towhom,topic,message FROM zapiski WHERE klu4 = '".$key."'");
$a = mysql_fetch_array($r);
$to = $a ["towhom"];
$topic = $a ["topic"];
$message = strip_tags($a["message"]);

echo $fsize1;
echo "<b>Mektub</b>: $message<br/>";
echo $divide;
echo "<u>Kime</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"nick$ref\" maxlength=\"30\" value=\"$to\" title=\"Kime\"/><br/>\n";
echo $fsize1;
echo "<u>M&#246;vzu</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"topic$ref\" maxlength=\"30\" value=\"$topic\" title=\"topic\"/><br/>\n"; 
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"mektub.php?go=pn&amp;id=$id&amp;ps=$ps&amp;bol=yaz$takep\" method=\"post\">\n";
echo "<postfield name=\"towhom\" value=\"$(nick$ref)\"/>\n"; 
echo "<postfield name=\"topic\" value=\"$(topic$ref)\"/>\n"; 
echo "<postfield name=\"message\" value=\"".$message."\"/>\n";
echo "<postfield name=\"rm\" value=\"$rm\"/>\n";
echo "</go></anchor><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?bol=2&amp;id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Geri Qay&#305;t</a><br/>\n";
if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
echo $fsize2;
} else {
echo "<card id=\"yaz\" title=\"Mektub Yaz\">\n";
echo "<p>\n";
echo $fsize1;
echo "<u>Kime</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"nick$ref\" maxlength=\"30\" value=\"$to\" title=\"Kime\"/><br/>\n";
echo $fsize1;
echo "<u>M&#246;vzu</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"topic$ref\" maxlength=\"30\" value=\"$topic\" title=\"topic\"/><br/>\n"; 
echo $fsize1;
echo "<u>Mektub</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"message$ref\" maxlength=\"600\" value=\"$message\" title=\"message\"/><br/>\n"; 
echo $fsize1;
echo "<anchor title=\"go\">G&#246;nder<go href=\"mektub.php?go=pn&amp;id=$id&amp;ps=$ps&amp;bol=yaz$takep\" method=\"post\">\n";
echo "<postfield name=\"towhom\" value=\"$(nick$ref)\"/>\n"; 
echo "<postfield name=\"topic\" value=\"$(topic$ref)\"/>\n"; 
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "<postfield name=\"rm\" value=\"$rm\"/>\n";
echo "</go></anchor><br/>\n";
echo $divide;
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Mektub Qutusu</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
}

echo "</p>\n";
echo "</card>\n";
echo "</wml>\n"; 
mysql_close ($link);
exit;
}

 $message = check($message);
 $topic = check($topic);
 if ($go!="all"){
 
if (ctype_digit($towhom)) {
$r = mysql_query ("Select user,id,avtootvet from users where id = '".$towhom."'"); 
}
if (ctype_digit($towhom)) {
$r = mysql_query ("Select user,id,avtootvet from users where id = '".$towhom."'"); 
}
else {
 $towhom=trim($towhom);
 if($towhom=="")$towhom=0;
 $latuser=strtolower($towhom);
 if($latuser=="robotnick")$latuser=admin;
$r = mysql_query ("Select user,id,avtootvet from users where latuser = '".$latuser."'"); 
}
if (mysql_affected_rows() == 0) {
echo "<card id=\"xeta\" title=\"xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
if($towhom!="0") echo "<b>$towhom</b> nikli istifade&#231;i tap&#305;lmad&#305;...\n";
else echo "<b>SMS Mektub g&#246;ndermek istediyiniz istifade&#231;inin Nick-ini yazmad&#305;z...</b>\n";

echo "<br/>$divide\n";
if ((isset($rm))&&($rm!="")) echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;bol=yaz$takep\">Geri Qay&#305;t</a><br/>\n";
else echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;bol=yaz$takep\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}


$csx = mysql_fetch_array($r);
$login=$csx["user"];
$usid=$csx["id"];

@mysql_query ("Select * from ignor where usid='".$id."' and id='".$usid."'");
if (mysql_affected_rows() == true){
echo "<card id=\"ignm\" title=\"&#304;qnor Edilibsiz\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>".$login."</b> nickli &#350;exs Sizi &#304;qnor edib,<br/> Siz ona mektub yaza bilmersiz\n";
echo "<br/>$divide<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;bol=yaz$takep\">Geri Qay&#305;t</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
exit;
}else{
 $time = time();
 $data = date("H:i(d-M)"); 
 $msg = $message;
 require("smile.php");
$minpos = 10000; $nm = 10000;
for ($j=0;$j<=count($smiles)-1;$j++){ 
$tmpp = strpos($msg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){ 
$minpos = $tmpp; $nm = $j;};
 }; 
if ($minpos !=10000){
if ($row["translit"]!=1){
$st1 = substr($msg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msg,$minpos+strlen($smiles[$nm]),strlen($msg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1); 
$msg = $st1.$st2;
} else {
$st1 = substr($msg,0,$minpos);
$st2 = substr($msg,$minpos, strlen($smiles[$nm]));
$st3 = substr($msg,$minpos+strlen($smiles[$nm]),strlen($msg)-strlen($st1)-strlen($st2));
$st1 = trun_to_rus($st1);
$st2 = $replaces[$nm];
$st3 = trun_to_rus($st3);
$msg = $st1.$st2.$st3;
}
} 
Unset($smiles);
unset($replaces); 
$mgs=strtolower($msg);
if ($row["level"]<5) require("file/require/reklam");
if($row["level"]>6) $msg = eregi_replace("((http://))((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z;]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((/|\?)[a-z0-9~#%&'_\+=:;\?\.-]*)*)", "<a href=\"\\3\\0\">\\3</a>", $msg); 
 $message = $msg; 
  
 $avtootvet=$csx["avtootvet"];
 $kol = rand(0,99999999);
 $time = time();
$data = date( "H:i", mktime( date( "H" ) + $xsat ) );
$reflesh = rand( 1, 3 );
$aylar = array( "Yanvar", "Fevral", "Mart", "Aprel", "May", "&#304;yun", "&#304;yul", "Avqust", "Sentyabr", "Oktaybr", "Noyabr", "Dekabr" );
$ay = date( "n" ) - 1;
$gun = date( "d" );
$data = "{$gun} {$aylar[$ay]} - {$data}";
$times = time();

mysql_query("Select readd from zapiski WHERE (who='".$us."')and(idwho ='".$id."')and(message = '".$message."')and(towhom = '".$towhom."')and(idtowhom = '".$usid."')and(topic = '".$topic."')");
if (mysql_affected_rows()===0){ 
$sent=0;
if ($rekl=="1"){
//mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$us." >>> ".$towhom."', idwho ='".$id."', message = '".$message."', towhom = 'Admin', idtowhom = '1', time = '".$times."', readd = '0', topic = '".$topic." Reklam', date='".$data."'");
//mysql_query("Insert into reklam set kim='".$id."',kime='".$usid."',mesaj='".$message."'");
mysql_query( "Insert into reklam set klu4='".$kol."', who ='".$us."', idwho ='".$id."', message = '".$msg."', towhom = '".$towhom."', idtowhom = '".$usid."', time = '".$times."', readd = '0', topic = 'Reklam', date='".$data."';" );
}else {
$sent=0;
$r = mysql_query ("SELECT * FROM users WHERE id ='".$usid."'");
$a = mysql_fetch_array($r);
$room = $a['room'];
$time = $a['time'];
$mexvi = $a['inv'];
$mektub_qebulu = $a["mektub_qebulu"];
if ($mektub_qebulu ==0) {
mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$us."', idwho ='".$id."', message = '".$message."', towhom = '".$towhom."', idtowhom = '".$usid."', time = '".$times."', readd = '0', topic = '".$topic."', date='".$data."'");  $sent=1;
};
if ($mektub_qebulu ==1) {
mysql_query ("Select * from dostlar where usid='".$id."' and id='".$usid."'");
if (mysql_affected_rows()>0){
mysql_query("Insert into zapiski set klu4='".$kol."', who ='".$us."', idwho ='".$id."', message = '".$message."', towhom = '".$towhom."', idtowhom = '".$usid."', time = '".$times."', readd = '0', topic = '".$topic."', date='".$data."'");  $sent=1;
} }};
}
else {
$sent=2;
 
}



if (mysql_error() == false){
echo "<card id=\"done\" title=\"G&#246;nderildi!\">\n";
echo "<p align =\"center\">\n";
echo $fsize1;

if ($sent==0) {
echo "Sizin mektub  <b>".$login."</b> nickli &#350;exse g&#246;nderilmedi!<br/> 
Sebeb: <b>".$login."</b> Mektub Qebulunu Baglayib.<br/>\n"; 
echo $fsize2;
}elseif($sent==1){
echo "Sizin Mektubunuz <b>$login</b> &#252;&#231;&#252;n u&#287;urla g&#246;nderilmi&#351;dir!<br/>\n";
echo $fsize2;

if ( time( ) < $time && $mexvi != 3 )
{
if ( $room == "29" )
{
echo $fsize1;
if ( $avtootvet != "" )
{
echo $divide;
echo "Auto-Cavab: <i>{$avtootvet}</i><br/>\n";
}
echo $divide;
echo "".$login." hal-haz&#305;rda <a href=\"mektub.php?id={$id}&amp;ps={$ps}{$takep}\">Mektublardad&#305;r</a><br/>\n";
echo $fsize2;
}
else if ( $room == "30" )
{
echo $fsize1;
if ( $avtootvet != "" )
{
echo $divide;
echo "Auto-Cavab: <i>{$avtootvet}</i><br/>\n";
}
echo $divide;
echo "".$login." hal-haz&#305;rda <a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehlizdedir</a><br/>\n";
echo $fsize2;
}
else if ( $room == "28" )
{
echo $fsize1;
if ( $avtootvet != "" )
{
echo $divide;
echo "Auto-Cavab: <i>{$avtootvet}</i><br/>\n";
}
echo $divide;
echo "".$login." hal-haz&#305;rda <a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Online Mesajdadir</a><br/>\n";
echo $fsize2;
}
else
{
$roomselect = @mysql_query( "Select name from rooms where rm='{$room}';" );
$rooms = @mysql_fetch_array( $roomselect );
$roomname = $rooms['name'];
echo $fsize1;
if ( $avtootvet != "" )
{
echo $divide;
echo "Auto-Cavab: <i>{$avtootvet}</i><br/>\n";
}
echo $divide;
echo "".$login." hal-haz&#305;rda\n";
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$room}{$takep}\">{$roomname}</a> ota&#287;&#305;ndad&#305;r<br/>\n";
echo $fsize2;
}
}
else if ( $avtootvet != "" )
{
echo $fsize1;
echo $divide;
echo "Avtomatik-Cavablay&#305;c&#305;: {$avtootvet}<br/>\n";
echo $fsize2;
}
}elseif ($sent==2) {
echo "Sizin mektub  <b>".$login."</b> nickli &#350;exse g&#246;nderilmedi!<br/> 
Sebeb: Bu mektubu siz bir az evvel gondermi&#351;diz... (<b>Tekrar Olmaz</b>)<br/>\n"; 
echo $fsize2;
}
echo $fsize1;
echo $divide;

if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Chata Qay&#305;t</a><br/>\n";
echo "<a href=\"mektub.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;$ref\">Mektublar</a><br/>\n";
if ($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata Qay&#305;t</a><br/>\n";
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";
$tmm = time()+$onvaxt;
mysql_query ("Update users set onl='".$tmm."', posts='".$posts."' + 1, room='letters' where id ='".$id."'");
echo $fsize2;
} else {
echo "<card id=\"xeta\" title=\"xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Diqqet</b>! Xeta ba&#351; verdi. <br/><i>Mektubunuz g&#246;nderilmedi yeniden ceht edin.</i><br/>$divide\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor>\n";
echo $fsize2;
}
mysql_close ($link);
} }
break;

}

echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
?>
