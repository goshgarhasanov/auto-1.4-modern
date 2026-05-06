<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$us=$row["user"];
$login=$row["user"];
$usid=$row["id"];

$alltraf=$row["alltraf"];
$level=$row["level"];

$adm = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$z = @mysql_fetch_array ($adm);
$sevi = $z["user"];

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"sms\" title=\"Online SMS | $site\">\n";
echo "<p mode=\"wrap\">\n";
$time=date ("H:i");
switch($go) {

default:
echo $fsize1;
echo "<b>Online SMS</b><br/>";
echo $divide;

echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;go=mnews&amp;ref=$ref\">Yaz</a> | ";
echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yenile</a>\n";
if($level>8)echo " | <a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;go=onlaynsmssil&amp;ref=$ref\">SmS-leri Sil</a>\n";
echo "<br/><br/>";

$cm = mysql_query ("select count(id) as num from online_sms WHERE 1;");
$cmc = mysql_fetch_array($cm);
$onu = $cmc["num"]; 
if(!isset($s))$s=0;
$mx=round(($onu/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$onu)$do=$onu;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;

$print = mysql_query("select * from `online_sms` order by id desc limit $o,$do;");
if (mysql_affected_rows() == 0) {
echo "Onlayn sms yoxdur...<br/>";
echo $divide;

}
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($print);
$msg = $arr["content"];
$uid=$arr['usid'];
$yazan=$arr['login'];

require("smile.php");
$minpos = 500; $nm = 500;
for ($j=0;$j<=count($smiles)-1;$j++){
$tmpp = strpos($msgg,$smiles[$j]);
if (($tmpp < $minpos)&&($tmpp !== false)){
$minpos = $tmpp; $nm = $j;};
};
if ($minpos !=500){
$st1 = substr($msgg,0,$minpos+strlen($smiles[$nm]));
$st2 = substr($msgg,$minpos+strlen($smiles[$nm]),strlen($msgg)-strlen($st1));
$st1 = str_replace($smiles[$nm],$replaces[$nm],$st1);
$msgg = $st1.$st2;
}
unset($smiles);
unset($replaces);
if($level>8)echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;go=sil&amp;content=".$arr['id']."&amp;nk=".$uid."&amp;ref=$ref\">[x]</a>- \n";
echo "<b>".$yazan."</b> &#187; ".$msg."";
echo "<br/>";
echo $divide;
}   
$next=$s+1;
$prev=$s-1;
if ($onu>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$onu)$do=$onu;
echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">N&#246;vbeti &gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt; Evvelki</a><br/>\n";
}



echo $fsize2;
break;

case 'onlaynsmssil':


$time = time()-$vaxt;
mysql_query ("DELETE from online_sms");
echo $fsize1;
echo "&#220;mumi Online SMSler silindi!<br/>\n";
echo $divide;

echo $fsize2;
break;

case 'sil':
echo $fsize1;
$syst = @mysql_query ("Select user from users where id='".$nk."' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$nik = $rr["user"];

$silinen = @mysql_query(@"Select id,login,content,date from online_sms where id= '".$content."' LIMIT 1" );
$dum = mysql_fetch_array($silinen);
$vax = $dum['date'];
$kim = $dum['login'];
$mesaj = $dum['content'];
mysql_query( "DELETE FROM online_sms WHERE id='{$content}' LIMIT 1" );

echo "<b>$nik</b> nikinin <u>Online SMS</u>i silindi.<br/>";

echo $divide;
echo $fsize2;
break;

case 'mnews':

$bal=$row['bal'];
if($bal<10){
echo $fsize1;
echo "Balans&#305;n&#305;zda kifayet qeder bal yoxdur.<br/>";
echo "Xidmetin Deyeri 10 bald&#305;r<br/>\n";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesabina Bal Y&#252;kle</a><br/>---<br/>";

echo $fsize2;
}else{

$content=trim(htmlspecialchars(stripslashes($content)));
$date=date("j.m.Y");
if(empty($content)) $error=$error."<u>SMS yazmamisiz!</u><br/>";
if(empty($action)) {
print $fsize1;
print "SMS-Mesaj:<br/>";
print $fsize2;
echo "<input name=\"content\" maxlength=\"150\" title=\"content\"/><br/>";
print $fsize1;
print "<anchor>Elave Et<go href=\"online_sms.php?id=$id&amp;ps=$ps&amp;go=mnews\" method=\"post\">";
print "<postfield name=\"action\" value=\"add\"/>";
print "<postfield name=\"content\" value=\"$(content)\"/>";
print "<postfield name=\"date\" value=\"$date\"/>";
print "</go></anchor><br/>";

echo $divide;

print $fsize2;
require("smile.php");
} else {
if(empty($error)) {
if($content!=$last_online_sms['content']) {


if(mysql_query("insert into online_sms values(0,'$login','$content','$date','$usid');")) {
print $fsize1;
$bal=$bal-10;
mysql_query ("Update users set bal='".$bal."' where id='".$id."'");
print "<b>Mesaj elave edildi!</b><br/>";
mysql_query ("Update `users` set `stat`='0.05'+`stat` where `id` ='".$id."';");
echo $divide;

}else{
print $fsize1;
print "Online SMS yazmaq &#252;&#231;&#252;n <b>10</b>. bal&#305;n&#305;z olmal&#305;d&#305;r.<br/>";
print "Sizin hesabinizda <b>$row[bal]</b>. bal var.<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesabina Bal Y&#252;kle</a><br/>";

print $fsize2;
}
} else {
print $fsize1;
print "<b>Bele SMS artiq elave edilib!</b><br/>";
echo $divide;

}
print $fsize2;
} else {
print $fsize1;
print $error;
print $fsize2;
}
}
break;

}}


////////////////////





echo $fsize1;
if ($go)echo "<a href=\"online_sms.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
else echo "<b>Qeyd</b>:Xidmetin deyeri <b>10</b> Bald&#305;r.<br/>";


echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close ($link);
?>
