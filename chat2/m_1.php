<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($row['room']!='28'){
mysql_query ("Update users set `room`='28' where `id` ='".$id."';");
};

$msn = $row['msn'];
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

if ($rm != "") {
$takep = "&amp;rm={$rm}&amp;ref={$ref}";
} else {
$takep = "&amp;ref={$ref}";
}

ob_start( );
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
switch ( $m )
{
default :
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
if ( $num != $msn )
{
mysql_query( "UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';" );
}
if ( $num == 0 )
{
echo "<card id=\"nomesaj\" title=\"Yeni Mesaj Yoxdur\">\n";
echo "<p>\n";
echo $fsize1;
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Arxiv</a><br/>\n";
echo "----<br/>\n";
echo "Yeni mesaj&#305;n&#305;z Yoxdur<br/>\n";
echo "----<br/>\n";
break;
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
echo "<card id=\"gelenler\" title=\"Mesajlar/Gelenler\">\n";
echo "<p>\n";
echo $fsize1;
echo "<b>{$num}</b> Yeni mesaj&#305;n&#305;z var<br/>\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Arxiv</a><br/>\n";
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
echo "----<br/>\n";
$rr = mysql_query( "SELECT  DISTINCT `idwho` FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1' order by `time` ASC LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$qc = mysql_fetch_array( $rr );
$dis_idwho = $qc['idwho'];
$q_2 = mysql_query( "SELECT `who`,`idwho`,`date`,`time` FROM `mesaj` where `idwho` = '".$dis_idwho."' order by time desc" );
$a = mysql_fetch_array( $q_2 );
$user_name = $a['who'];
$user_id = $a['idwho'];
$mesaj_date = $a['date'];
$tarix = $a['time'];

$zn_sql = @mysql_query ("Select id,zn from users where id='".$user_id."'");
$inf = mysql_fetch_array ($zn_sql);
$zn = $inf["zn"];
if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$user_id.".gif")&&($row["rnikler"]==0))){
$user_name = "<img src=\"i/".$user_id.".gif\" alt=\"$who\"/>";
}
$query = mysql_query( "select COUNT(readd) from mesaj where idwho = '".$dis_idwho."' and idtowhom = '".$id."' and readd ='0' and `ininc`='1' ;" );
$all = @mysql_result( $query, 0 );
echo "".$zn."<b>{$user_name} <a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$user_id}{$takep}\">Oxu ({$all})</a></b> [".cc_tarix($a['time'])."] - \n";
echo "<a href=\"m_1.php?m=del&amp;id={$id}&amp;ps={$ps}&amp;uid={$user_id}{$takep}\">[x]</a><br/>\n";
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
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
}
echo "----<br/>\n";
break;
case "arxiv" :
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='1' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
if ( $num == 0 )
{
echo "<card id=\"arxiv\" title=\"Arxiv (Oxunmu&#351;lar)\">\n";
echo "<p>\n";
echo $fsize1;
echo "Arxiv (Oxunmu&#351;lar) (<b>{$num}</b>)<br/>\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yeni Mesajlar</a><br/>\n";
echo "----<br/>\n";
echo "Yeni mesaj&#305;n&#305;z Yoxdur<br/>\n";
echo "----<br/>\n";
break;
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
echo "<card id=\"arxiv\" title=\"Arxiv (Oxunmu&#351;lar)\">\n";
echo "<p>\n";
echo $fsize1;
echo "Arxiv (Oxunmu&#351;lar) (<b>{$num}</b>)<br/>\n";
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Yenile</a> |\n";
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Yeni Mesajlar</a><br/>\n";
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
echo "----<br/>\n";
$rr = mysql_query( "SELECT  DISTINCT `idwho` FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='1' and `ininc`='1' order by `time` desc LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$qc = mysql_fetch_array( $rr );
$dis_idwho = $qc['idwho'];
$q_2 = mysql_query( "SELECT `who`,`idwho`,`date`,`time` FROM `mesaj` where `idwho` = '".$dis_idwho."' order by time desc" );
$a = mysql_fetch_array( $q_2 );
$user_name = $a['who'];
$user_id = $a['idwho'];
$mesaj_date = $a['date'];

$zn_sql = @mysql_query ("Select id,zn from users where id='".$user_id."'");
$inf = mysql_fetch_array ($zn_sql);
$zn = $inf["zn"];
if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$user_id.".gif")&&($row["rnikler"]==0))){
$user_name = "<img src=\"i/".$user_id.".gif\" alt=\"$who\"/>";
}
$query = mysql_query( "select COUNT(readd) from mesaj where idwho = '".$dis_idwho."' and idtowhom = '".$id."' and readd ='1' and `ininc`='1' ;" );
$all = @mysql_result( $query, 0 );
echo "".$zn."<b>{$user_name} <a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$user_id}{$takep}\">Oxu ({$all})</a></b> [".cc_tarix($a['time'])."] - \n";
echo "[<a href=\"m_1.php?xiv=1&amp;m=del&amp;id={$id}&amp;ps={$ps}&amp;uid={$user_id}{$takep}\">x</a>]<br/>\n";
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
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
}
echo "----<br/>\n";
break;

case "del" :
echo "<card id=\"sil\" title=\"Silindi\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Mesaj Silindi...<br/>*****<br/>\n";
if ( $xiv != "" )
{
mysql_query( "update mesaj set ininc = '0' WHERE (idwho = '".$uid."' and idtowhom = '".$id."') or (idwho = '".$id."' and idtowhom = '".$uid."')" );
echo "<a href=\"m_1.php?m=arxiv&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
}
else
{
echo "<a href=\"m_1.php?id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
mysql_query( "update mesaj set ininc = '0' WHERE (idwho = '".$uid."' and idtowhom = '".$id."') or (idwho = '".$id."' and idtowhom = '".$uid."') and (readd = '0')" );
}
$query = mysql_query( "SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';" );
$num = @mysql_result( $query, 0 );
mysql_query( "UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';" );
mysql_close( $link );
echo "----<br/>\n";
break;
}
if ( $rm != "" )
{
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">Chata qay&#305;t</a><br/>\n";
}
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Online Mesaj</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush( );
?>
