<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
$ref=rand(10000,1000000);
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__));
if($rm!="")$takep="&amp;rm=$rm&amp;ref=$ref";
else $takep="&amp;ref=$ref";



echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"MAXIMUM\" title=\"Aktivlik reytinqi\">\n";
echo "<p align=\"left\">\n";
echo "<small>"; 

//acildi 
if(isset($_GET['bolme'])) 
{ 
$bolme = $_GET['bolme']; 
} 
else 
{ 
$bolme = ""; 
} 

switch ($bolme) { 

default: 
echo "<b>Aktivlik reytinqi</b><br/>"; 
echo "Bu g&#252;n&#252;n aktiv istifade&#231;ileri:<br/>"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=presents$takep\">Hediyyeler</a><br/>****\n<br/>"; 
echo "G&#252;nl&#252;k | <a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=2$takep\">Heftelik</a> |\n"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=3$takep\">Ayl&#305;q</a>\n"; 
//echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=4$takep\">Umumi</a><br/>\n"; 
echo "<br/><br/>"; 
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active` > '0';"); 
$inmenu = mysql_result($q, 0); 
if(isset($_GET['s'])) $s = $_GET['s']; 
else $s = 0; 
if($s < 0) $s = 0; 
if($s > $inmenu) $s = 0; 

$q = mysql_query("SELECT `id`,`user`,`zn`,`aktivtime`,`time_active` FROM `users` WHERE `time_active` > '0' ORDER BY `time_active` DESC LIMIT $s,20;"); 

$c = $s; 
while($nick = mysql_fetch_array($q)) 
{ 
$c++; 
$login=$nick['user'];
$usid=$nick['id'];
$zn=$nick['zn'];

$yeni = $nick['time_active']; 
// Saat 
$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 
if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif\" alt=\"$login\"/>";
}
if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if ($id==$usid){
echo "<b>$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")</b><br/>";
}else{
echo "$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")<br/>";
}


}

if ($s = 0)echo "G&#252;n erzinde aktiv istifade&#231;i qeyde al&#305;nmay&#305;b...<br/>";

if ($inmenu > $s + 20) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."$takep\">N&#246;vbeti &gt;&gt;&gt;</a><br/>\n"; 
if ($s > 0) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."$takep\">&lt;&lt;&lt; Evvelki</a><br/>\n"; 
echo $divide;

echo "<i><b>Qeyd:</b> Nickler &#252;mumi aktiv oldu&#287;u vaxta esasen s&#305;ralanm&#305;&#351;d&#305;r.</i><br/>"; 
break; 


case '2': 
echo "<b>Aktivlik reytinqi</b><br/>"; 
echo "Bu heftenin aktiv istifade&#231;ileri:<br/>"; 
//echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=presents$takep\">Hediyyeler</a><br/>****\n"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps$takep\">G&#252;nl&#252;k</a> | Heftelik |\n"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=3$takep\">Ayl&#305;q</a>\n"; 
//echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=4$takep\">Umumi</a><br/>\n"; 
echo "<br/><br/>"; 
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active1` > '0';"); 
$inmenu = mysql_result($q, 0); 
if(isset($_GET['s'])) $s = $_GET['s']; 
else $s = 0; 
if($s < 0) $s = 0; 
if($s > $inmenu) $s = 0; 

$q = mysql_query("SELECT `id`,`user`,`zn`,`aktivtime`,`time_active1` FROM `users` WHERE `time_active1` > '0' ORDER BY `time_active1` DESC LIMIT $s,20;"); 
$c = $s; 
while($nick = mysql_fetch_array($q)) 
{ 

$c++; 
$yeni = $nick['time_active1']; 
// Saat 
$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 
$login=$nick['user'];
$usid=$nick['id'];
$zn=$nick['zn'];

if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif\" alt=\"$login\"/>";
}
if ($id==$usid){
echo "<b>$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")</b><br/>";
}else{
echo "$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")<br/>";
}
} 
if ($inmenu > $s + 20) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."&amp;bolme=3$takep\">N&#246;vbeti &gt;&gt;&gt;</a><br/>\n"; 
if ($s > 0) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."&amp;bolme=3$takep\">&lt;&lt;&lt; Evvelki</a><br/>\n"; 
echo $divide;

echo "<i><b>Qeyd:</b> Nickler &#252;mumi aktiv oldu&#287;u vaxta esasen s&#305;ralanm&#305;&#351;d&#305;r.</i><br/>"; 
break;


case '3': 
echo "<b>Aktivlik reytinqi</b><br/>"; 
echo "Bu ay&#305;n aktiv istifade&#231;ileri:<br/>"; 
//echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=presents$takep\">Hediyyeler</a><br/>****\n"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps$takep\">G&#252;nl&#252;k</a> |\n"; 
echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=2$takep\">Heftelik</a> | Ayl&#305;q\n"; 
//echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;bolme=4$takep\">Umumi</a><br/>\n"; 
echo "<br/><br/>"; 
$q = mysql_query("SELECT COUNT(*) FROM `users` WHERE `time_active2` > '0';"); 
$inmenu = mysql_result($q, 0); 
if(isset($_GET['s'])) $s = $_GET['s']; 
else $s = 0; 
if($s < 0) $s = 0; 
if($s > $inmenu) $s = 0; 

$q = mysql_query("SELECT `id`,`user`,`zn`,`aktivtime`,`time_active2` FROM `users` WHERE `time_active2` > '0' ORDER BY `time_active2` DESC LIMIT $s,20;"); 
$c = $s; 
while($nick = mysql_fetch_array($q)) 
{ 
$c++; 
$yeni = $nick['time_active2']; 
// Saat 
$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 

$login=$nick['user'];
$usid=$nick['id'];
$zn=$nick['zn'];

if($zn!="")$zn=" <img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if((file_exists("i/".$usid.".gif")&&($row["rnikler"]==0))){
$login = "<img src=\"i/".$usid.".gif\" alt=\"$login\"/>";
}

if ($id==$usid){
echo "<b>$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")</b><br/>";
}else{
echo "$c) ".$zn."<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;bolme=akt_us$takep\">$login</a>(";
if ($saat_tam != 0)echo "".$saat_tam." saat ";
if ($deqiqe != 0)echo "".$deqiqe." deq. ";
if ($saniye != 0)echo "".$saniye." san.";
echo ")<br/>";
}

} 
if ($inmenu > $s + 20) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s + 20)."&amp;bolme=3$takep\">N&#246;vbeti &gt;&gt;&gt;</a><br/>\n"; 
if ($s > 0) print "<a href=\"aktivlik.php?id=$id&amp;ps=$ps&amp;s=".($s - 20)."&amp;bolme=3$takep\">&lt;&lt;&lt; Evvelki</a><br/>\n"; 
echo $divide;

echo "<i><b>Qeyd:</b> Nickler &#252;mumi aktiv oldu&#287;u vaxta esasen s&#305;ralanm&#305;&#351;d&#305;r.</i><br/>"; 
break;

case 'presents': 
echo "Qalibler ayl&#305;q aktiv vaxt &#252;zre her ay&#305;n sonu m&#252;eyyen olunur<br/>"; 
echo "<br/>"; 
echo "<b>Hediyyeler:</b><br/>"; 
echo "<br/>"; 
echo "1-ci yer: 150 bal<br/>"; 
echo "<br/>"; 
echo "2-ci yer: 100 bal<br/>"; 
echo "<br/>"; 
echo "3-c&#252; yer: 50 bal<br/>"; 
echo "<br/>"; 
echo "<b>Qeyd:</b> Nicklerin yan&#305;nda yaz&#305;lan (saat deq. san.) hemin istifadea&#231;inin 5 deqiqelik onlayn vaxt&#305;n&#305;n hesablamalar&#305;na esasen m&#252;yenle&#351;dilir. Vaxtlar gece 12 tamamda s&#305;f&#305;rlan&#305;r.

Hediyyeler avtomatik olaraq qaliblerin balansina ay sonunda elave edilir.<br/>"; 
echo $divide;

echo "<i><b>Qeyd:</b> Nickler &#252;mumi aktiv oldu&#287;u vaxta esasen s&#305;ralanm&#305;&#351;d&#305;r.</i><br/>"; 
break; 


case 'akt_us': 
$select = @mysql_query ("Select id,pass,user,mexvi,time_active,time_active1,time_active2 from users where id='".$nk."'");

if (mysql_affected_rows() == 0){

echo "Bele istifadeci movcud deyil!<br/>";
echo "*****<br/>";
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
mysql_close ($link);
exit;
}
$inf = mysql_fetch_array ($select);

$usid=$inf["id"];
$nick = $inf["user"];
$mexvi=$inf["mexvi"];
$yeni=$inf["time_active"];
$time_active1=$inf["time_active1"];
$time_active2=$inf["time_active2"];

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";






if(($mexvi!=1)or($row["level"]>7)){

if ($id==$nk) {
echo "<b>".$nick."</b>, Sizin aktivliyiniz:<br/><br/>\n";
}
else
{
echo "<b>".$nick."</b>, nikinin aktivliyi:<br/><br/>\n";
}

//////////////aktivliyi/////////////
// Saat 
$s_san = $yeni / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $yeni / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($yeni - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $yeni - $deqiqe_san; 

echo "<u>G&#252;nl&#252;k</u>: ".$saat_tam." saat ".$deqiqe." deq. ".$saniye." san.<br/>"; 
echo $divide;


// Saat 
$s_san = $time_active1 / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $time_active1 / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($time_active1 - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $time_active1 - $deqiqe_san; 

echo "Heftelik: ".$saat_tam." saat ".$deqiqe." deq. ".$saniye." san.<br/>"; 
echo $divide;

// Saat 
$s_san = $time_active2 / 3600; 
$saat_tam = strtok($s_san,'.'); 
$saat_san = $saat_tam * 3600; 
// Deqiqe 
$d = $time_active2 / 60; 
$dq_tam =strtok($d,'.'); 
$deqiqe_san = $dq_tam * 60; 
$deqiqe_hesab = ($time_active2 - $saat_san) / 60; 
$deqiqe = strtok($deqiqe_hesab,'.'); 
// Saniye 
$saniye = $time_active2 - $deqiqe_san; 

echo "<u>Ayl&#305;q</u>: ".$saat_tam." saat ".$deqiqe." deq. ".$saniye." san.<br/>"; 

}
//////////////aktivliyi son/////////////

if($mexvi==1)echo "$zn<b>".$nick." $mexvidir</b><br/>\n";


break; 

break; 
} 

echo $divide;

if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Chata Qay&#305;t</a><br/>\n";
else echo  "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>";


if ($bolme!="") echo "<a href=\"aktivlik.php?id=$id&amp;ps=$ps$takep\">Aktivlik reytinqi</a><br/>\n";



echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n"; 
echo "</small>\n"; 
echo "</p></card></wml>"; 
mysql_close ($link);
ob_end_flush();
?>