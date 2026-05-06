<?php
header ("Content-type:text/vnd.wap.wml");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n
<wml>\n<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/>\n
<meta http-equiv=\"Pragma\" content=\"no-cache\"/></head>\n
<card id=\"x\" title=\"Qaydalar\">\n
<p><small>";

global $mode;
switch ($mode)
{
case "moders":
print "1) Moderler chatda yaxshi hereketleri ile diger istifadechilere numune olmalidirlar.<br/>2) Moder yagli shriftlerle ancaq istifadechileri xeberdarliq uchun ve chatda vacib xeberi istifadechilerin diqqetine chatdirmaq uchun yazmalidir<br/>3) Moder chatda chat qaydalarini pozan istifadechileri atmalidir<br/>4) Moder,Adminden sahib oldugu statusdan artiq status istese hemin an sahib oldugu statusu da itirecek<br/>5) Moder ozunu statusuna layiq aparmalidir,chatda hech kimi incitmemelidir<br/>6) ADMINSTRATORUN HEREKETI MUZAKIRE OLUNMUR!<br/>7) Istifadechileri chatdan atmaq qeti qadagandir, eger chat qaydasini pozmayibsa, kim eger Zarafata Istifadeci Atsa cezalanacaq.<br/>8) Yuxarida gosterilen qaydalari pozan moderin hemin an statusu alinacaq ve ola bilsin chatdan hemishelik atilacaq!<br/><a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>";
break;
case "users":
?>
1) Istifadechiler chatda pis soz danishmamalidirlar ve diger istifadechileri tehqir etmemelidirler<br/>
2) Istifadechi chatda Admin ve moderleri tehqir etmemelidir<br/>
3) Istifadechiler Admin ve Moderleri status isteyerek bezdirmemelidirler. Admin de sizin kimi chata vaxtini kechirmeye,sohbet etmeye gelir.:)<br/>
4) Diger saytlari reklam etmek, flud etmek, eyni sozleri tekrarlamaq, standart olmayan menasiz simvollar yazmaq, ardicil olaraq smaylik yazmaq, boyuk herfle yazmaq qeti qadagandir!<br/>
5) Chatda Adminin icazesi olmadan hansisa elani etmek olmaz!<br/>
6) Azerbaycan Respublikasinin maraqlarini eks etdiren sohbetler etmek olmaz,Azerbaycan Respublikasinin qanunvericiliyinde gosterilen qanunlari pozmaq olmaz!!! <br/>
7) Diger milletleri ve dinlerini tehqir etmek qeti qadagandir!(ermenilerden bashqa)<br/>
8) Yuxarida gosterilen qaydalari pozan istifadechi derhal chatdan atilacaq!<br/>
<?
print "<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>";
break;

case "faq":
print "1)Sual:<b>Kompyuterden chata daxil olaq?</b><br/>Cavab:Bezi kompyuterden gelen istifadechiler reklam, flud, soyush soydukleri uchun komputerden girish baglanilmishdir. Kompyuterden girish pulladir. Unutmayin bu bir WAP chatdir, WEB yox... Biz yalniz seviyyeni qoruyuruq.<br/>---<br/>
2)Sual:<b>Kontur az getmeyin yolu?</b><br/>Cavab:Konturun az getmesi uchun Dehliz>>Shexsi Kabinet>>Chat Duzelishleri bolmesinden rengli nikleri, smayllari sondure, avtoyenilenmeni sondure ve ya vaxtini artira, yazilarin sayini azalda bilersiniz.<br/>---<br/>
3)Sual:<b>Bal sistemi haqqinda?</b><br/>Cavab:Bal almaq uchun dehlizde Bal Elave Et bolmesinde etrafli yazilib. Bal size chatda elave funksiyalar (Nik deyishmek, Rengli nik almaq, Status almaq ve s.) uchun lazimdir. Eger baliniz varsa Dehlizde Xidmetler bolmesinde balinizdan istifade ede bilersiniz.<br/>---<br/>
4)Sual:<b>Iqnordan nece chixardaq?</b><br/>Cavab:Chatda xoshunuza gelmeyen istifadechini iqnora ata bilersizniz. Eger sehven iqnor etmishsinizse onda Dehliz>>Shexsi Kabinet>>Ignorda olanlar(Zehlemgetmishler) bolmesinden istediyiniz niki iqnordan chixarda bilersizniz.<br/>---<br/>
5)Sual:<b>Statusu nece alaq?</b><br/>Cavab:Status almaq uchun ya baliniz, ya da aktiv olmalisiniz. Admin en aktiv, diger istefadechilerden ferqlenenlere status verir. Bal ile status almaq uchun Dehliz>>Bal Sistemi>>Vezife al bolmesinden ala biler.<br/>---<br/>
6)Sual:<b>Rengli niki alaq?</b><br/>Cavab:Rengli nik saytda sizi diger istifadechilerden ferqlendirecek. Rengli niki sifarish verirsinizse 1 ayi 150 bal, eger niki ozunuz duzeldirsinizse 100 bal. Nik duzeltmek uchun Dehliz>>Bal Sistemi>>Rengli nik Yarat bolmesine baxin<br/>---<br/>
<a href=\"qayda.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>";
break;
default:
print"<b>Qaydalar</b><br/>
<a href=\"qayda.php?mode=users&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Istifadeciler Ucun</a><br/>
<a href=\"qayda.php?mode=moders&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Moderler Ucun</a><br/>
---<br/>";
break;
}

print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";

print "</small></p></card></wml>";
?>
