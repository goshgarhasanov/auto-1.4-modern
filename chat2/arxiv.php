<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);




if($row['room']!='28'){
mysql_query("UPDATE `users` SET `room` = '28' WHERE `id` = '".$id."' LIMIT 1;");
};

if ($rm != "") {
$takep = "&amp;rm={$rm}&amp;ref={$ref}";
} else {
$takep = "&amp;ref={$ref}";
}

$user = $row['user'];


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"onmesaj\" title=\"Mesaj\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
settype($nk, "integer");

$u_s = mysql_query("Select `user`,`id`,`time`,`zn` from `users` WHERE `id` = '".$nk."';");
if (mysql_affected_rows() == 0) {
echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>\n";
echo "$divide\n";
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Mesaj</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit();
}

$u_i = mysql_fetch_array( $u_s );
$u_user = $u_i['user'];
$u_time = $u_i['time'];
$u_zn = $u_i['zn'];

if ($u_zn != "") {
$u_zn = "<img src=\"img/z".$u_zn.".gif\" alt=\".\"/>";
}

$zn = $row['zn'];

if ($zn != "") {
$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
}

if (2 <= strlen($_POST['message'])) {
include( "./file/require/send" );
}

$query = mysql_query( "select COUNT(`klu4`) from `mesaj` where (`idwho` = '".$nk."' and `idtowhom` ='".$id."') or (`idwho` = '".$id."' and `idtowhom` ='".$nk."');" );
$all = @mysql_result( $query, 0 );
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $all / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $all < $do )
{
$do = $all;
}
$o = $ot - 1;
$ff = $ot;
if ( $do == 0 )
{
$ff = $o;
}

$r = mysql_query("Select * from `mesaj` WHERE  (idwho = '".$nk."' and idtowhom ='".$id."') or (idwho = '".$id."' and idtowhom ='".$nk."') order by time desc limit {$o},{$do};");
if ($u_user == "") {
echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>\n";
echo "$divide\n";
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}{$takep}\">Mesaj</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);
exit();
}

$id=$_GET["id"];
$ps=$_GET["ps"];


mysql_query( "Update `mesaj` set `readd` = '1', `insend` = '0' WHERE (`idtowhom` = '".$id."' and `idwho` ='".$nk."');" );
echo "{$zn}<b>{$user}</b>+{$u_zn}<a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">{$u_user}</a>\n";

if (time() < $u_time) {
echo "(<img src=\"img/online.gif\" alt=\"Online\"/>)";
} else {
echo "(<img src=\"img/offline.gif\" alt=\"Offline\"/>)";
}
echo "<br/>\n";

$rr = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");
$aa = mysql_fetch_array($rr);
$num = $aa["num"];



$sele = mysql_query("SELECT COUNT(*) FROM `d_teklif` WHERE usid = '".$id."';");
$teklif = mysql_result($sele, 0);
if ($teklif!=0) echo "&#xbb; <a href=\"friends.php?id=$id&amp;ps=$ps&amp;go=offer$takep\">Yeni ".$teklif." Dostluq Teklifi var!</a><br/>\n";


$rs = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1');");
$a = mysql_fetch_array($rs);
$inb = $a["num"];


$msn = $row["msn"];
if($num!=$msn){
mysql_query("UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."' LIMIT 1;");
$msn = $num;
}

$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' AND `read` = 0 and `d2` = '0';");
$newto = mysql_result($q, 0);
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' and `d2` = '0';");
$to = mysql_result($q, 0);

if(($msn>0)or($inb!="0")or($teklif!="0")or($newto!="0"))echo "$divide\n";
if($inb != "0") echo "&#xbb; <a href=\"mektub.php?bol=1&amp;id=$id&amp;ps=$ps$takep\">Yeni ".$inb." Mektub var!</a><br/>\n";
if($msn>0)echo "&#xbb; <a href=\"mesaj.php?id=$id&amp;ps=$ps$takep\">Yeni ".$msn." Mesaj&#305;n&#305;z var!</a><br/>\n";
if($newto != "0") echo "&#xbb; <a href=\"mms.php?id=$id&amp;ps=$ps&amp;mod=inbox$takep\">Yeni ".$newto." MMS Mektubun var!</a><br/>\n";
if(($msn>0)or($inb!="0")or($newto!="0"))echo "$divide\n";

$usersm=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='0' and time> '".time()."'"));
$usersj=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM users where sex='1' and time> '".time()."'"));
$cemi=$usersj[0]+$usersm[0];
echo "<input name=\"message{$ref}\" maxlength=\"600\" title=\"message\"/><br/>\n";
echo "<anchor>G&#246;nder<go href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\" method=\"post\">\n";
echo "<postfield name=\"message\" value=\"\$(message{$ref})\"/>\n";
echo "</go></anchor> | \n";

echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Yenile</a> |\n";
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata qay&#305;t</a>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online($cemi)</a>\n";

echo "<br/>\n";
$i = $ot;
while ( $i <= $do )
{
$inz = mysql_fetch_array( $r );
$klu4 = $inz['klu4'];
$myname = $inz['who'];
$u_name = $inz['towhom'];
$u_id = $inz['idtowhom'];
$saat = $inz['date'];
$tarix = $inz['tarix'];
$oxunub = $inz['readd'];
$msg = $inz['message'];
$mesaj_qebul = $inz['icaze'];


if ( $oxunub == 0 )
{
$oxunub = "[<i>Oxunmay&#305;b</i>]";
}
else
{
$oxunub = "";
}
$ddunen = date( "d.m.Y", mktime( date( "H" ) - 24 ) );
$tarix = str_replace( $ddunen, "D&#252;nen", $tarix );
$tarix = str_replace( date( "d.m.Y" ), "Bu g&#252;n", $tarix );

echo "<b>{$myname}</b>:{$oxunub}({$tarix}-{$saat})&#xbb; {$msg}<br/>\n";
++$i;
}
if ($saat == "") {
echo "Mesaj Yoxdur...<br/>$divide\n";
} else {
echo "$divide\n";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $all / 10;
$test = round( $tes );
if ( $do < $all && $s <= $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $all < $do )
{
$do = $all;
}
echo " |  <a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;s={$next}{$takep}\">{$do}&gt;&gt;</a>\n";
}
if ( 10 < $all )
{
echo "<br/>$divide";
}
}
if ($rm != "") {
echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\">Chata qay&#305;t</a><br/>\n";
}
if($rm!="")echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online($cemi)</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p></card>\n";
echo "<card id=\"yaz\" title=\"Cavab mesaj&#305;\">\n";
echo "<p>";
echo $fsize1;
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input name=\"message{$ref}\" maxlength=\"600\" title=\"message\"/><br/>\n";
echo $fsize1;
echo "<anchor>G&#246;nder<go href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\" method=\"post\">\n";
echo "<postfield name=\"message\" value=\"\$(message{$ref})\"/>\n";
echo "</go></anchor>\n";
echo "<br/>$divide";
echo "<a href=\"arxiv.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">Geri Qay&#305;t</a><br/>\n";
if($rm!="")echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online($cemi)</a><br/>\n";
 

echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}{$takep}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);
ob_end_flush();
?>
