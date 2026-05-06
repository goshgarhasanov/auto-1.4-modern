<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$takep = "&amp;ref={$ref}";
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


$online = time() + $vaxt;
mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = '28' WHERE `id` = '".$id."' LIMIT 1;");

global $bol;
switch ( $bol )
{
default :
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"arxiv\" title=\"Arxiv Mesajlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "\"<b>Arxiv</b>\" Mesajlar:<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query( "select count(readd) as num from mesaj WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1')" );
$a = mysql_fetch_array( $r );
$inb = $a['num'];
$r = mysql_query( "select count(readd) as num from mesaj WHERE (idwho = '".$id."')and(readd = '0')and(insend = '1')" );
$a = mysql_fetch_array( $r );
$out = $a['num'];
mysql_close( $link );
echo $fsize1;
echo "<a href=\"m_2.php?bol=1&amp;id={$id}&amp;ps={$ps}{$takep}\">Gelenler(".$inb.")</a><br/>\n";
echo "<a href=\"m_2.php?bol=2&amp;id={$id}&amp;ps={$ps}{$takep}\">Gedenler(".$out.")</a><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=yaz&amp;id={$id}&amp;ps={$ps}{$takep}\">Mesaj yaz</a><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=opdel&amp;id={$id}&amp;ps={$ps}{$takep}\">B&#252;t&#252;n Mesajlar&#305; Sil</a><br/>\n";
echo $divide;
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Mesaja qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
break;
case "1" :
$r = mysql_query( "select count(readd) as num from mesaj where (idtowhom = '".$id."')and(ininc ='1')" );
$a = mysql_fetch_array( $r );
$num = $a['num'];
if ( $num == 0 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"not\" title=\"Mesaj Yoxdur\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Hal-haz&#305;rda Mesaj&#305;n&#305;z Yoxdur.</u><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
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
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"gelen\" title=\"Gelenler\">\n";
echo "<p>\n";
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
$do = $num;
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo $fsize1;
echo "<b>Size gelen Mesajlar:</b><br/>****<br/>\n";
echo "Sehife ".$n."-".$do." / ".$num."<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query( "Select who,idwho,date,klu4,readd,time from mesaj WHERE (idtowhom = '".$id."')and(ininc ='1') order by time desc LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $r );
$idwho = $a['idwho'];
$date = $a['date'];
$klu4 = $a['klu4'];
$read = $a['readd'];
$fromw = $a['who'];
echo $fsize1;
if ( $read == 1 )
{
echo "<a href=\"m_2.php?bol=3&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">".$fromw."</a> [".cc_tarix($a['time'])."]<br/>\n";
}
else
{
echo "<b><a href=\"m_2.php?bol=3&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">".$fromw."</a>\t</b> [".cc_tarix($a['time'])."]<br/>\n";
}
echo $fsize2;
++$i;
}
echo $divide;
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
echo "<a href=\"m_2.php?bol=1&amp;id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
echo $fsize2;
$break = 1;
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo $fsize1;
echo "<a href=\"m_2.php?bol=1&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
echo $fsize2;
$break = 1;
}
echo $fsize1;
if ( isset( $break ) )
{
echo $divide;
}
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
break;
case "2" :
$r = mysql_query( "select count(readd) as num from mesaj where (idwho = '".$id."')and(insend ='1')" );
$a = mysql_fetch_array( $r );
$num = $a['num'];
if ( $num == 0 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"not\" title=\"no mesaj\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Siz he&#231;kese mesaj g&#246;ndermemisiz!</u><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
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
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"geden\" title=\"Gedenler\">\n";
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
echo "<b>Sizin yazd&#305;qlar&#305;n&#305;z:</b><br/>****<br/>\n";
echo "Sehife {$n}-{$do} / {$num}<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query( "Select who,date,klu4,readd,towhom,time from mesaj WHERE (idwho = '".$id."')and(insend ='1') order by time desc LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $r );
$fromw = $a['who'];
$towhom = $a['towhom'];
$klu4 = $a['klu4'];
$read = $a['readd'];
echo $fsize1;
if ( $read == 1 )
{
echo "Oxunub  <a href=\"m_2.php?bol=oxu&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">{$towhom}</a>[".cc_tarix($a['time'])."]\n";
}
else
{
echo " <b>Oxunmay&#305;b <a href=\"m_2.php?bol=oxu&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}{$takep}\">{$towhom}</a>[".cc_tarix($a['time'])."]</b>\n";
}
echo "- <a href=\"m_2.php?bol=del&amp;id={$id}&amp;ps={$ps}&amp;im={$klu4}&amp;s={$s}&amp;insend=1{$takep}\">[x]</a><br/>\n";
echo $fsize2;
++$i;
}
mysql_close( $link );
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
$do = $num;
echo $fsize1;
echo "<a href=\"m_2.php?bol=2&amp;id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">&gt;&gt;{$ot}-{$do}&gt;&gt;</a><br/>\n";
echo $fsize2;
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo $fsize1;
echo "<a href=\"m_2.php?bol=2&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}&lt;&lt;</a><br/>\n";
echo $fsize2;
}
echo $fsize1;
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Mesajlar</a><br/>\n";
if ( isset( $rm ) )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep}\">Chata Qayit</a><br/>";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>";
break;
case "3" :
do
{
do
{
settype( $im, "integer" );
$r = mysql_query( "Select who,date,message,idtowhom,readd,idwho,icaze,time from mesaj WHERE klu4 = '".$im."'" );
if ( mysql_affected_rows( ) == 0 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"not\" title=\"tap&#305;lmad&#305;\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u>Mesaj Tap&#305;lmad&#305;...</u><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
$a = mysql_fetch_array( $r );
if ( $a['idtowhom'] != $id )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xeta\" title=\"xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u><i>Bu Mesaj size aid deyil!</i></u><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"oxu\" title=\"Mesaj\">\n";
echo "<p align=\"center\">\n";
$who = $a['who'];
$idwho = $a['idwho'];
$date = $a['date'];
$message = $a['message'];
$read = $a['readd'];
$mesaj_qebulu = $a['icaze'];
if ( $read == 0 )
{
mysql_query( "Update `mesaj` set `readd` = '1' WHERE `klu4` ='".$im."'" );
$tms = mysql_query( "SELECT COUNT(*) FROM `mesaj` WHERE (`idwho` ='".$idwho."')and(`idtowhom` = '".$id."')and(`readd` = '0');" );
$tmsn = mysql_result( $tms, 0 );
if ( $tmsn == 0 )
{
mysql_query( "Update `users` set `msn`=`msn`-1 where `id` ='".$id."';" );
}
}
echo $fsize1;
echo "\"<a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;ref={$ref}\">".$who."</a>\" ".cc_tarix($a['time'])." Size yaz&#305;b.<br/>\n";
//echo "{$date} tarixinde<br/>\n";
echo $fsize2;
echo "</p>\n";
echo "<p>\n";
echo $fsize1;
echo $divide;
echo "<b>Mesaj</b>: <i>{$message}</i>.<br/>\n";
echo $divide;
if ( $mesaj_qebulu == 0 )
{
echo "Cavab:<br/>\n";
echo $fsize2;
echo "<input name=\"message{$ref}\" maxlength=\"600\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"gonder\">G&#246;nder<go href=\"on.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"{$idwho}\"/>\n";
echo "<postfield name=\"message\" value=\"\$(message{$ref})\"/>\n";
echo "</go></anchor>\n";
echo "<br/>";
break;
}
else if ( !( $mesaj_qebulu == 1 ) )
{
break;
}
else
{
mysql_query( "Select * from friends where usid='".$id."' and id='".$nk."'" );
if ( mysql_affected_rows( ) == true )
{
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"message{$ref}\" maxlength=\"600\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor title=\"gonder\">G&#246;nder<go href=\"on.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"{$idwho}\"/>\n";
echo "<postfield name=\"message\" value=\"\$(message{$ref})\"/>\n";
echo "</go></anchor>\n";
echo "<br/>";
break;
}
else
{
echo "<i>Bu istifade&#231;i yaln&#305;z dostlar&#305;ndan mesaj qebul edir.</i>";
echo "<br/>";
}
}
break;
} while ( 0 );
echo "<u>Bu istifade&#231;i mesaj qebul etmir.</u><br/>";
} while ( 0 );
echo $divide;
echo "<a href=\"ignor.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;mod=add&amp;ref={$ref}\">&#304;gnor et</a>-(he&#231;ne yazmas&#305;n)<br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=del&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;im={$im}&amp;ininc=1{$takep}\">Bu Mesaj&#305; sil</a><br/>\n";
echo "<a href=\"m_2.php?bol=delall&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;usid={$idwho}&amp;ininc=1{$takep}\">B&#252;t&#252;n mesajlar&#305;n&#305; sil</a><br/>\n";
echo "<a href=\"m_2.php?bol=req&amp;id={$id}&amp;ps={$ps}&amp;im={$im}&amp;who={$who}{$takep}\">Oxunmam&#305;&#351; kimi qeyd et</a><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=1&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;
case "req" :
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"newokey\" title=\"Qeyd edildi\">\n";
echo "<p align=\"center\">\n";
mysql_query( "Update mesaj set readd = '0' WHERE klu4 ='".$im."'" );
echo $fsize1;
echo "Oxunmam&#305;&#351; kimi qeyd olundu.<br/>";
echo $divide;
echo "<a href=\"m_2.php?bol=1&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Gelenler</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;

case "del" :
if ( !ctype_digit( $im ) )
{
header( "Location: index.php" );
exit( );
}
$r = mysql_query( "Select idtowhom,idwho from mesaj WHERE klu4 = '".$im."' " );
if (mysql_affected_rows() != 0 && ($a['idtowhom'] == $id || $a['idwho'] == $id))
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"msgdel\" title=\"Silindi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Mesaj Silindi!</b><br/>\n";
echo $divide;
if ( isset( $ininc ) )
{
echo "<a href=\"m_2.php?bol=1&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
} else {
echo "<a href=\"m_2.php?bol=2&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
echo $fsize2;
if ( isset( $insend ) )
{
mysql_query( "update mesaj set insend = '0' WHERE klu4 = '".$im."' " );
}
if ( isset( $ininc ) )
{
mysql_query( "update mesaj set ininc = '0' WHERE klu4 = '".$im."' " );
}
mysql_query( "delete from mesaj WHERE (insend = '0')and(ininc = '0')" );
echo "</p></card></wml>\n";
mysql_close( $link );
}
else
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xeta\" title=\"Xeta\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u><i>Bu mesaj Size aid deyil.</i></u><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}{$takep}\">Arxiv Qutusu</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close($r);
}
break;

case "delall" :
settype( $usid, "integer" );
$select = mysql_query( "select id,user from users where id = '".$usid."'" );
$rows = mysql_fetch_array( $select );
$user = $rows['user'];
if ( isset( $insend ) )
{
mysql_query( "update mesaj set insend = '0' WHERE idwho = '".$id."' and idtowhom = '".$usid."'" );
}
if ( isset( $ininc ) )
{
mysql_query( "update mesaj set ininc = '0' WHERE idtowhom = '".$id."' and idwho = '".$usid."'" );
}
mysql_query( "delete from mesaj WHERE (insend = '0')and(ininc = '0') and idtowhom = '".$id."'" );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"msgdel\" title=\"Silindi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>".$user."</b>-den gelen b&#252;t&#252;n mesajlar silindi!<br/>\n";
echo $divide;
if ( !isset( $ininc ) )
{
break;
}
else
{
echo "<a href=\"m_2.php?bol=1&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
echo "<a href=\"m_2.php?bol=2&amp;s={$s}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;
case "opdel" :
mysql_query( "update `mesaj` set `insend` = '0' WHERE `idwho` = '".$id."'" );
mysql_query( "update `mesaj` set `ininc` = '0' WHERE `idtowhom` = '".$id."'" );
mysql_query( "update `users` set `msn` = '0' WHERE `id` = '".$id."'" );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"opdel\" title=\"Temizlik...\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "B&#252;t&#252;n mesajlar&#305;n&#305;z silindi!<br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Arxiv Mesajlar</a><br/>\n";
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Mesaja Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;
case "oxu" :
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"oldmsg\" title=\"Yaz&#305;lan Mesaj\">\n";
echo "<p align=\"center\">";
$message = $topic = $towhom = "";
$r = mysql_query( "SELECT klu4,towhom,message,time FROM mesaj WHERE klu4 = '".$im."'" );
$a = mysql_fetch_array( $r );
$towhom = $a['towhom'];
$message = $a['message'];
$key = $a['klu4'];
if ( $message != "" )
{
if ( strstr( $message, "<img src=\"" ) )
{
$tend = strpos( $message, "\"/>" );
$t = strlen( $message );
$msgend = substr( $message, $tend + 3, $t );
$msgtemp = substr( $message, 0, $tend );
$t1 = strpos( $msgtemp, "<img src=\"" );
$msgfirst = substr( $msgtemp, 0, $t1 );
$t2 = strlen( $msgtemp );
$t3 = strpos( $msgtemp, "alt=\"" );
$msgaver = substr( $msgtemp, $t3 + 5, $t2 );
$message = $msgfirst.$msgaver.$msgend;
}
if ( strstr( $message, "<a href=\"" ) )
{
$tend = strpos( $message, "</a>" );
$t = strlen( $message );
$msgend = substr( $message, $tend + 4, $t );
$tend2 = strpos( $message, "\">" );
$msgtemp = substr( $message, 0, $tend2 );
$t1 = strpos( $msgtemp, "<a href=\"" );
$msgfirst = substr( $msgtemp, 0, $t1 );
$t2 = strlen( $msgtemp );
$t3 = strpos( $msgtemp, "<a href=\"" );
$msgaver = substr( $msgtemp, $t3 + 9, $t2 );
$message = $msgfirst.$msgaver.$msgend;
}
}
echo $fsize1;
echo "Bu mesaj&#305; \"<b>{$towhom}</b>\" leqebli &#350;exse g&#246;nderibsiz:<br/>\n";
echo $divide;
echo "<b>Mesaj</b>: {$message}<br/><br/>\n";
echo "<a href=\"m_2.php?bol=yaz&amp;id={$id}&amp;ps={$ps}&amp;key={$key}&amp;ref={$ref}\">Mesaj&#305; y&#246;nlendir</a><br/>\n";
echo $divide;
echo $fsize2;
echo $fsize1;
echo "<a href=\"m_2.php?bol=2&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;

case "yaz" :
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
if ( isset( $key ) )
{
echo "<card id=\"yon\" title=\"Mesaj&#305;n Y&#246;nlenmesi\">\n";
}
else
{
echo "<card id=\"newmsg\" title=\"Mesaj Yaz\">\n";
}
echo "<p>";
if ( isset( $key ) )
{
$message = $topic = $towhom = "";
$r = mysql_query( "SELECT klu4,towhom,message FROM mesaj WHERE klu4 = '".$key."'" );
$a = mysql_fetch_array( $r );
$towhom = $a['towhom'];
$message = $a['message'];
$key = $a['klu4'];
if ( $message != "" )
{
if ( strstr( $message, "<img src=\"" ) )
{
$tend = strpos( $message, "\"/>" );
$t = strlen( $message );
$msgend = substr( $message, $tend + 3, $t );
$msgtemp = substr( $message, 0, $tend );
$t1 = strpos( $msgtemp, "<img src=\"" );
$msgfirst = substr( $msgtemp, 0, $t1 );
$t2 = strlen( $msgtemp );
$t3 = strpos( $msgtemp, "alt=\"" );
$msgaver = substr( $msgtemp, $t3 + 5, $t2 );
$message = $msgfirst.$msgaver.$msgend;
}
if ( strstr( $message, "<a href=\"" ) )
{
$tend = strpos( $message, "</a>" );
$t = strlen( $message );
$msgend = substr( $message, $tend + 4, $t );
$tend2 = strpos( $message, "\">" );
$msgtemp = substr( $message, 0, $tend2 );
$t1 = strpos( $msgtemp, "<a href=\"" );
$msgfirst = substr( $msgtemp, 0, $t1 );
$t2 = strlen( $msgtemp );
$t3 = strpos( $msgtemp, "<a href=\"" );
$msgaver = substr( $msgtemp, $t3 + 9, $t2 );
$message = $msgfirst.$msgaver.$msgend;
}
}
echo $fsize1;
echo "<b>Mesaj</b>: {$message}<br/>\n";
echo $divide;
echo $fsize2;
}
echo $fsize1;
echo "<u>Kime</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"towhom{$ref}\" maxlength=\"30\" title=\"Kime?\"/><br/>\n";
if ( !isset( $key ) )
{
echo $fsize1;
echo "<u>Mesaj</u>:<br/>\n";
echo $fsize2;
echo "<input name=\"message{$ref}\" maxlength=\"600\" title=\"Mesaj&#305;n&#305;z\"/><br/>\n";
}
echo $fsize1;
echo "<anchor title=\"G&#246;nder\">G&#246;nder<go href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\" method=\"post\">\n";
echo "<postfield name=\"nk\" value=\"\$(towhom{$ref})\"/>\n";
if ( !isset( $key ) )
{
echo "<postfield name=\"message\" value=\"\$(message{$ref})\"/>\n";
}
else
{
echo "<postfield name=\"message\" value=\"{$message}\"/>\n";
}
echo "</go></anchor><br/>\n";
echo $divide;
echo $fsize2;
echo $fsize1;
if ( isset( $key ) )
{
echo "<a href=\"m_2.php?bol=2&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "<a href=\"m_2.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Arxiv Mesajlar</a><br/>\n";
}
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
break;
}
?>
