<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8"); 

require("ay.php");
$link = connect_db(); 
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$takep="&amp;ref=$ref"; 

$select = @mysql_query ("Select * from `users` where `id`='".$nk."' and `banned`!='2';");

if (mysql_affected_rows() == 0){ 
echo $xml; 
echo $dtd; 
echo "<wml>"; 
echo "<card id=\"xeta\" title=\"Xeta\">"; 
echo "<p align=\"center\">"; 
echo $fsize1; 
echo "Nick Tap&#305;lmad&#305;. Yeqin Silinib.<br/>"; 
echo $divide; 
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n"; 
echo $fsize2; 
echo "</p></card></wml>"; 
mysql_close ($link); 
exit; 
} 

$inf = mysql_fetch_array ($select); 
$usid=$inf["id"]; 
$nick = $inf["user"]; 
$name = $inf["name"]; 
$bal = $inf["bal"]; 
$sex = $inf["sex"]; 
$time = $inf["onl"];
$nastroi = $inf["nastroi"]; 
$status = $inf["status"]; 
$para = $inf["para"]; 
$mesaj_qebulu=$inf["mektub_qebulu"]; 
$tox=$inf["tox"]; 
$mexvi=$inf["mexvi"]; 
$level=$inf["level"]; 
$img=$inf["img"]; 
$zn=$inf["zn"]; 
$qefes=$inf["qefes"]; 
$yeni=$inf["vaxt_gun"]; 

if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>"; 
else $inf["zn"]="x"; 

ob_start(); 
echo $xml; 
echo $dtd; 
echo "<wml>\n"; 
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n"; 
echo "<card id=\"info\" title=\"$nick\">\n"; 
echo "<p align=\"left\" mode=\"wrap\">\n"; 
echo $fsize1; 
echo "$zn<b>".$nick."</b> hediyyeleri:<br/>\n"; 
$hed = mysql_query("SELECT * FROM `hediyye_box` WHERE `uid`='".$nk."';"); 
if(mysql_affected_rows() == 0){ 
echo $divide; 
echo "<i>Hediyyesi Yoxdur...</i><br/>\n"; 
}else{ 
while($he = mysql_fetch_array($hed)){ 
$who = $he["kim"]; 
$hediyye = $he["hediyye"]; 
$nomre = $he["acar"]; 
$nkk = $he["mid"]; 
$text = $he["text"]; 

echo $divide; 
if($id==$usid)echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=del&amp;cid=$cid&amp;$ref\">[x]</a>"; 
echo "<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;bol=who&amp;cid=$nomre&amp;$ref\"><img src=\"hediyye/$hediyye.gif\" alt=\"$hediyye\"/></a><br/>"; 
echo $text."<br/>"; 
echo "<a href=\"info.php?id=$id&amp;nk=$nkk&amp;ps=$ps&amp;$ref\">$who</a><br/>\n"; 
} 
} 
echo $divide; 
echo "[<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Hediyye Ver</a>]<br/>\n"; 
echo $divide; 
if($re!="")echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Online Mesaj</a><br/>\n"; 
else echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\" accesskey=\"0\">Dehliz</a><br/>\n"; 
echo $fsize2; 
echo "</p></card></wml>\n"; 
mysql_close ($link); 
ob_end_flush(); 
?>
