<?php
require("inc.php");

$_v->title('Qaydalar');

$_v->fsize1($fsize1);


global $mode;
switch ($mode){

case "moders":
?>
<b>R&#252;tbeliler &#252;&#231;&#252;n Qaydalar</b><br/>---<br/>
1) Moderler chatda yaxshi hereketleri ile diger istifadechilere numune olmalidirlar.<br/>
2) Moder yagli shriftlerle ancaq istifadechileri xeberdarliq uchun ve chatda vacib xeberi istifadechilerin diqqetine chatdirmaq uchun yazmalidir.<br/>
3) Moder chatda chat qaydalarini pozan istifadechileri atmalidir<br/>
4) Moder,Adminden sahib oldugu statusdan artiq status istese hemin an sahib oldugu statusu da itirecek<br/>
5) Moder ozunu statusuna layiq aparmalidir,chatda hech kimi incitmemelidir<br/>
6) ADMINSTRATORUN HEREKETI MUZAKIRE OLUNMUR!<br/>
7) Istifadechileri chatdan atmaq qeti qadagandir, eger chat qaydasini pozmayibsa, kim eger Zarafata Istifadeci Atsa cezalanacaq.<br/>
8) Yuxarida gosterilen qaydalari pozan moderin hemin an statusu alinacaq ve ola bilsin chatdan hemishelik atilacaq!<br/>
<?
echo "---<br/>";
print "<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>";
break;

case "user":

?>
<b>&#304;stifade&#231;iler &#252;&#231;&#252;n Qaydalar</b><br/>---<br/>
1) Istifadechiler chatda pis soz danishmamalidirlar ve diger istifadechileri tehqir etmemelidirler<br/>
2) Istifadechi chatda Admin ve moderleri tehqir etmemelidir<br/>
3) Istifadechiler Admin ve Moderleri status isteyerek bezdirmemelidirler. Admin de sizin kimi chata vaxtini kechirmeye,sohbet etmeye gelir.:)<br/>
4) Diger saytlari reklam etmek, flud etmek, eyni sozleri tekrarlamaq, standart olmayan menasiz simvollar yazmaq, ardicil olaraq smaylik yazmaq, boyuk herfle yazmaq qeti qadagandir!<br/>
5) Chatda Adminin icazesi olmadan hansisa elani etmek olmaz!<br/>
6) Azerbaycan Respublikasinin maraqlarini eks etdiren sohbetler etmek olmaz,Azerbaycan Respublikasinin qanunvericiliyinde gosterilen qanunlari pozmaq olmaz!!!<br/> 
7) Diger milletleri ve dinlerini tehqir etmek qeti qadagandir!(ermenilerden bashqa)<br/>
8) Yuxarida gosterilen qaydalari pozan istifadechi derhal chatdan atilacaq!<br/>
<?
echo "---<br/>";
print "<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>";
break;

	
default:
print "<b>Qaydalar:</b><br/>---<br/>";
print "<a href=\"qayda.php?mode=user&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;stifade&#231;iler &#220;&#231;&#252;n</a><br/>";
print "<a href=\"qayda.php?mode=moders&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">R&#252;tbeliler &#220;&#231;&#252;n</a><br/>";
echo "---<br/>";
break;
}

print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);



?>