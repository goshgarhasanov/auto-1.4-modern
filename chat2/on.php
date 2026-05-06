<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__)); 
if (($row["banned"]!=0)or($row["con"]!=0)or(time()<$row["kik"])) {
header ("Location: session.php?id=$id&ps=$ps&ref=$ref");
exit;
}

require("./file/fun/muen");
$time = time()+$vaxt;
mysql_query ("Update `users` set  `time`='".$time."' where `id` ='".$id."';");



$msn = $row["msn"];
if($msn>=999){
$query = mysql_query("SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';");
$msn = @mysql_result($query, 0);
mysql_query("UPDATE `users` SET `msn` = '".$msn."' WHERE `id` = '".$id."' LIMIT 1;");
}

$time=date ("H:i",mktime(date ("H")+$xsat));

ob_start();
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"online\" title=\"($msn) Mesaj))) Onlayn(".$time.")\" ontimer=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\"><timer value=\"200\"/>\n";
if (strpos ($HTTP_USER_AGENT,"Windows") !== false){
echo "<do type=\"accept\" name=\"Yenile\" label=\"Yenile\"><go href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
echo "<do type=\"accept\" name=\"Dehliz\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
}

echo "<p align=\"center\">\n";
print $fsize1;
$qey = file("file/logo/2.dat");
$asef = trim($qey[0]);
if($asef)echo "<img src=\"http://$asef\" alt=\"&#350;ekil\"/><br/>";

echo "<a href=\"like_nik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Nikini N&#252;mayi&#351; et</a><br/>\n";
$anket = mysql_query("SELECT * FROM like_info WHERE time > '".time() ."' ORDER BY RAND() DESC LIMIT 1;");
if(mysql_affected_rows() == true)
{
    $ank = mysql_fetch_object($anket);
    $anik = $ank->user;
    $anid = $ank->usid;
    $info = select_nk($anid);
    $birthday = $info->birth;
    $yy  = date("Y");
    $dd1 = substr($birthday,0,2);
    $yy1 = substr($birthday,6,4);
    $ages = ($yy > $yy1) ? ($yy - $yy1) : "xXx";
    $ages = (!$ages || $ages == 0 || $ages == "" || $ages > $yy) ? "xXx" : $ages." ya&#351;";
    $cins = $info->sex;
    if ($cins==0) $cins="Ki&#351;i"; else $cins="Xan&#305;m";
    echo "(*** <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$anid."&amp;ref=$ref\">".$anik."</a>-".$cins." ***)<br/>\n";
}



print $fsize2;

echo "</p><p align=\"left\">\n";
print $fsize1;

print "<a href=\"mega.php?id=$id&amp;ps=$ps&amp;ref=$ref\">MeQa</a> I <a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Znak Al</a> I <a href=\"rnick.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Super nik</a><br/>";
if($msn>0){
$yeniler = "<a href=\"m_1.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesajlar&#305;n <b>(+$msn)</b></a>";
}else{
$yeniler = "<a href=\"m_1.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesajlar&#305;n ($msn)</a>";
}
echo "".$yeniler."\n";

echo "| ";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;r=$ref\">Yenile</a><br/>";
if($bilis!="3") {
echo "Online: <a href=\"on.php?id=$id&amp;ps=$ps&amp;c=2&amp;r=$ref\"><b>".$cemi."</b></a> nefer<br/>";
}else {
$curdate=date("d-m-Y");
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(id) from users WHERE date = '".$curdate."' and banned!='2';"));
    echo "Onlaynda: (<b>".$cemi."</b>)nefer/(<a href=\"stat.php?id=$id&amp;ps=$ps&amp;mod=yeni&amp;ref=$ref\">+".$newtoday[0]."</a>)<br/>\n";
}
if($bilis!="0")echo "Ki&#351;i: <a href=\"on.php?id=$id&amp;ps=$ps&amp;c=0&amp;r=$ref\">".$usersm[0]."</a>\n";
else echo "Ki&#351;i: ".$usersm[0]."\n";
echo "|\n";
if($bilis!="1")echo "Qad&#305;n: <a href=\"on.php?id=$id&amp;ps=$ps&amp;c=1&amp;r=$ref\">".$usersj[0]."</a><br/>\n";
else echo "Qad&#305;n: ".$usersj[0]."<br/>\n";

if($requ=="xal"){
echo "Xala g&#246;re |\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;l=0&amp;r=$ref\">Vaxta g&#246;re</a><br/>\n";
echo "<a href=\"xal.php?id=$id&amp;ps=$ps&amp;r=$ref\">Xal al: irelide g&#246;r&#252;n</a><br/>\n";
}else{
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;l=1&amp;r=$ref\">Xala g&#246;re</a> |\n";
echo "Vaxta g&#246;re<br/>\n";
}
//echo"<br/>";
echo "Profil &#350;&#601;kil: ";
if ($row['aser'] == 1) {
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;tip=b&amp;r=$ref\">Off</a> /<b>Onn</b><br/>";
} else {
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;tip=a&amp;r=$ref\">Onn</a> /<b>Off</b><br/>";
}

echo $divide;

if(strlen($message)>=1)
require("file/fun/2");



print $fsize2;

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

$r = mysql_query ("select id,user,birth,sex,zn,rusl,xal,stsonline,mega_nik from users where time> '".time()."' $muenn ".$gizli." group by user $savik limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$zn=$arr['zn'];
$rusl=$arr['rusl'];
$sex=$arr["sex"];
$xal=$arr["xal"];
$stsonline=$arr["stsonline"];



if($rusl!="")$login=" <img src=\"img/r".$rusl.".gif\" alt=\"$login\"/>";	
	
if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif\" alt=\"$login\"/>";
}else{
$meganik = $arr["mega_nik"];
if($meganik=="0")  {$login = "$login";}
if($meganik=="1")  {$login ="<big><b>$login</b></big>";}
if($meganik=="2")  {$login="<b>$login</b>";}
if($meganik=="3")  {$login="<i>$login</i>";}
if($meganik=="4")  {$login="<b><i>$login</i></b>";}
}


$on_off_photo = isset ($_GET['tip']) ? trim($_GET['tip']) : '';

switch($on_off_photo)
{

case "a":
mysql_query("UPDATE `users` SET `aser` = '1' where `id` ='".$id."'");
header("Location: on.php?id={$id}&ps={$ps}&{$ref}");
break;

case "b":
mysql_query("UPDATE `users` SET `aser` = '0' where `id` ='".$id."'");
header("Location: on.php?id={$id}&ps={$ps}&{$ref}");
break;
}



if($requ=="xal"){
if($xal!="0")$xals = "(<b>".$xal."</b>-xal)\n";
else $xals ="";
}


$d=date("d-m-");
$y=date("Y");
$birth=$arr["birth"];

$d1=substr($birth,0,2);
$m1=substr($birth,4,2);
$y1=substr($birth,6,4);
if ($sex==0) $sex="Kişi"; else $sex="Xanim";

if ($y>$y1) $age=$y-$y1; else $age="(Bilinmir)";
if ((!$age)||($age==0)||($age=="")||($age>$y)) $age="(Bilinmir)"; else $age="<b>".$age."</b>";

if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif\" alt=\"$login\"/>";
}



print $fsize1;
$qadaga = $row['aser'];
if ($qadaga == 1) {
   $fotosu = mysql_fetch_array(mysql_query("SELECT * FROM albom WHERE idfoto='".$usid."' ORDER BY photo limit 0,1"));
   $fotouser = $fotosu["photo"];
   $idfoto = $fotosu["idfoto"];

   echo "<table><tr>";
   echo "<td>";
   if (!$idfoto) {
      if ($arr[sex] == 0)
       echo "<img src=\"http://berdemiz.com/chat/img/no_img_0.gif\" height=\"45\" width=\"45\"/><br/>";
          else
           echo "<img src=\"http://berdemiz.com/chat/img/no_img_1.gif\" height=\"45\" width=\"45\"/><br/>";
   }else{
       echo "<a href=\"img_a.php?img=$usid&amp;id=$id&amp;ps=$ps&amp;rm=$rm$takep\"><img src=\"photos/$idfoto/$fotouser\"  height=\"45\" width=\"45\"/></a><br/>";
   }
   echo "</td><td>";
   echo "".$zn."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;l=1&amp;re=$ref\">".$login."</a>  [ ".$age.",".$sex." ]".$xals."<br/>\n";

    echo "</td>";
    echo "</tr></table>";
} else {


echo ($i)." )&#187; ".$sekil." ".$zn." <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;l=1&amp;re=$ref\">".$login."</a> [ ".$age.",".$sex." ".$xals." ]<br/>\n";
}


if($stsonline!=""){

   $titlesi = str_replace("<", "", $stsonline);
   $titlesi = str_replace(">", "", $titlesi);
   $titlesi = str_replace("\"", "", $titlesi);


// Smayl
$msg = $titlesi;
require("smile.php");

$minpos = 355;
$nm = 355;
$j = 0;
while ( $j <= count( $smiles ) - 1 )
{
$tmpp = strpos( $msg, $smiles[$j] );
$zzzd = $smiles[$nm];
if ( $tmpp < $minpos && $tmpp !== FALSE )
{
$minpos = $tmpp;
$nm = $j;
}
++$j;
}
if ( $minpos != 355 )
{
$st1 = substr( $msg, 0, $minpos + strlen( $smiles[$nm] ) );
$st2 = substr( $msg, $minpos + strlen( $smiles[$nm] ), strlen( $msg ) - strlen( $st1 ) );
$st1 = str_replace( $smiles[$nm], $replaces[$nm], $st1 );
$msg = $st1.$st2;
}

// Smayl son

	if($row['level']==9)echo "<a href=\"stsonline.php?b=4&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">[sil]</a> - ";
	$sql = mysql_query("select id from stsonline_fikir where uid = '".$usid."'");
	$total = mysql_num_rows($sql);
	echo " ".$msg." <a href=\"stsonline.php?b=7&amp;id=$id&amp;ps=$ps&amp;uid=$usid&amp;ref=$ref\">+<b>$total</b></a>/";
	$sql = mysql_query("select id from stsonline_like where cc_id = '".$usid."'");
	$like = mysql_num_rows($sql);
	echo "(<a href=\"stsonline.php?b=like&amp;id=$id&amp;ps=$ps&amp;uid=$usid&amp;ref=$ref\"><img src=\"img/default.jpeg\" alt=\".\"/></a><b><a href=\"stsonline.php?b=wholike&amp;id=$id&amp;ps=$ps&amp;uid=$usid&amp;ref=$ref\">$like</a></b>)<br/>\n";
	
   }  else{
          if($id=="$usid"){
          echo "<i><u>Onlayn status</u></i><a href=\"stsonline.php?id=$id&amp;ps=$ps&amp;l=1&amp;ref=$ref\"> yaz</a><br/>\n";
          }
    }


print $fsize2;
}

mysql_close ($link);
$next=$s+1;
$prev=$s-1;
if ($onu>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$onu)$do=$onu;
echo $fsize1;
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&#187;$ot-$do&#187;</a><br/>\n";
echo $fsize2;
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo $fsize1;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&#171;$ot-$do&#171;</a><br/>\n";
echo $fsize2;
}

print $fsize1;


echo "<br/>";

echo "<a href=\"m_1.php?id=$id&amp;ps=$ps&amp;m=arxiv&amp;ref=$ref\">Arxiv Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";


echo $fsize2;
echo "</p></card></wml>";
ob_end_flush();
exit;
?>