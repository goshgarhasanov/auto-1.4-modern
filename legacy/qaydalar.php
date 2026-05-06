<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n";
echo "<wml>\n<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/>\n";
echo "<meta http-equiv=\"Pragma\" content=\"no-cache\"/></head>\n";
echo "<card id=\"x\" title=\"Qaydalar\">\n";
echo "<p>\n";



global $mode;
switch ($mode){

case "moders":
?>
<small><b>R&#252;tbeliler &#252;&#231;&#252;n Qaydalar</b><br/>---<br/></small>
<small>1) Moderler chatda yaxshi hereketleri ile diger istifadechilere numune olmalidirlar.</small><br/>
<small>2) Moder yagli shriftlerle ancaq istifadechileri xeberdarliq uchun ve chatda vacib xeberi istifadechilerin diqqetine chatdirmaq uchun yazmalidir.</small><br/>
<small>3) Moder chatda chat qaydalarini pozan istifadechileri atmalidir</small><br/>
<small>4) Moder,Adminden sahib oldugu statusdan artiq status istese hemin an sahib oldugu statusu da itirecek</small><br/>
<small>5) Moder ozunu statusuna layiq aparmalidir,chatda hech kimi incitmemelidir</small><br/>
<small>6) ADMINSTRATORUN HEREKETI MUZAKIRE OLUNMUR!</small><br/>
<small>7) Istifadechileri chatdan atmaq qeti qadagandir, eger chat qaydasini pozmayibsa, kim eger Zarafata Istifadeci Atsa cezalanacaq.</small><br/>
<small>8) Yuxarida gosterilen qaydalari pozan moderin hemin an statusu alinacaq ve ola bilsin chatdan hemishelik atilacaq!</small><br/>
<?
echo "---<br/>";
print "<small><a href=\"qaydalar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a></small><br/>";
break;

case "users":

?>
<small><b>&#304;stifade&#231;iler &#252;&#231;&#252;n Qaydalar</b><br/>---<br/></small>
<small>1) Istifadechiler chatda pis soz danishmamalidirlar ve diger istifadechileri tehqir etmemelidirler</small><br/>
<small>2) Istifadechi chatda Admin ve moderleri tehqir etmemelidir</small><br/>
<small>3) Istifadechiler Admin ve Moderleri status isteyerek bezdirmemelidirler. Admin de sizin kimi chata vaxtini kechirmeye,sohbet etmeye gelir.:)</small><br/>
<small>4) Diger saytlari reklam etmek, flud etmek, eyni sozleri tekrarlamaq, standart olmayan menasiz simvollar yazmaq, ardicil olaraq smaylik yazmaq, boyuk herfle yazmaq qeti qadagandir!</small><br/>
<small>5) Chatda Adminin icazesi olmadan hansisa elani etmek olmaz!</small><br/>
<small>6) Azerbaycan Respublikasinin maraqlarini eks etdiren sohbetler etmek olmaz,Azerbaycan Respublikasinin qanunvericiliyinde gosterilen qanunlari pozmaq olmaz!!!</small><br/>
<small>7) Diger milletleri ve dinlerini tehqir etmek qeti qadagandir!(ermenilerden bashqa)</small><br/>
<small>8) Yuxarida gosterilen qaydalari pozan istifadechi derhal chatdan atilacaq!</small><br/>
<?
echo "---<br/>";
print "<small><a href=\"qaydalar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a></small><br/>";
break;


default:
print "<small><b>Qaydalar:</b><br/>---</small><br/>";
print "<small><a href=\"qaydalar.php?mode=users&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;stifade&#231;iler &#220;&#231;&#252;n</a></small><br/>";
print "<small><a href=\"qaydalar.php?mode=moders&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">R&#252;tbeliler &#220;&#231;&#252;n</a></small><br/>";
echo "---<br/>";
break;
}

print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
echo "</p></card></wml>";
?>
