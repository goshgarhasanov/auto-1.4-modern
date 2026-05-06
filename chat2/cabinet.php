<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if (isset($rm)) $takep2="&amp;rm=$rm&amp;ref=$ref";
else $takep2="&amp;ref=$ref";

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";

echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"cabinet\" title=\"&#350;exsi Kabinet\">";
echo "<p>";

switch($go) {

default:
echo $fsize1;
echo "Salam <b>".$row["user"]."</b>!<br/>";
echo "Bura sizin &#350;exsi Kabinetinizdir, Burda olan melumatlar yaln&#305;z Size aiddir...<br/>";
echo $divide;

$r = mysql_query ("select count(readd) as num from zapiski WHERE (idtowhom = '".$id."')and(readd = '0')and(ininc = '1')");
$a = mysql_fetch_array($r);
$inb = $a["num"];

$r2 = mysql_query ("select count(klu4) as num from zapiski WHERE (idtowhom = '".$id."')and(ininc = '1')");
$a2 = mysql_fetch_array($r2);
$inball = $a2["num"];



$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' AND `read` = 0 and `d2` = '0';");
$newto = mysql_result($q, 0);
$q = mysql_query("SELECT COUNT(*) FROM `mms` WHERE  `to` = '".$id."' and `d2` = '0';");
$to = mysql_result($q, 0);


$qex = mysql_query("SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$id."';");
$xati = mysql_result($qex, 0);
$qed = mysql_query("SELECT COUNT(*)  FROM `hediyye_box` WHERE `uid` = '".$id."';");
$hedi = mysql_result($qed, 0);
$r3 = mysql_query ("select count(klu4) as num from mesaj WHERE (idtowhom = '".$id."')and(ininc = '1')");
$a3 = mysql_fetch_array($r3);
$mnball = $a3["num"];

$msn = $row["msn"];
if($msn>=999){
$query = mysql_query("SELECT COUNT(DISTINCT `idwho`) FROM `mesaj` where `idtowhom` = '".$id."' and `readd` ='0' and `ininc`='1';");
$msn = @mysql_result($query, 0);
mysql_query("UPDATE `users` SET `msn` = '".$msn."' WHERE `id` = '".$id."';");
}


echo  "&#8226;<a href=\"m_2.php?id=$id&amp;ps=$ps&amp;savalan=$savalan&amp;ref=$ref\">Mesajlar</a>($msn/$mnball)<br/>";

echo "&#8226;<a href=\"mektub.php?id=$id&amp;ps=$ps$takep2\">Mektublar</a>($inb/$inball)<br/>";
echo "&#8226;<a href=\"mms.php?id=$id&amp;ps=$ps$takep2\">MMS Mektublar</a>($newto/$to)<br/>";
if($row["img"]!='0')echo "&#8226;<a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=$ps$takep2\">Foto-Albom &#350;ekillerim</a>($row[img])<br/>";
else echo "&#8226;<a href=\"foto.php?id=$id&amp;ps=$ps$takep2\">Foto-Alboma &#350;ekil Y&#252;kle</a><br/>";
echo "&#8226;<a href=\"hediyye.php?id=$id&amp;ps=$ps&amp;nk=$id&amp;ref=$ref\">Hediyyeler</a>(<b>Yeni!</b>)<br/>\n"; 
echo "&#8226;<a href=\"hediyye_user.php?id=$id&amp;ps=$ps&amp;nk=$id$takep2\">Hediyyelerim</a>($hedi)<br/>";
echo "&#8226;<a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$id$takep2\">Xatire Defterim</a>($xati)<br/>";

echo $divide;

if (empty($deyish)) {
$xstatus = $row["xstatus"];
} else {
mysql_query ("Update users set xstatus='".$xstatus."' where id ='".$id."'");
}
if ($xstatus == 1) {
$xmesaj = "Online";
} else if ($xstatus == 2) {
$xmesaj = "Offline";
} else if ($xstatus == 3) {
$xmesaj = "Me&#351;gulam";
} else if ($xstatus == 4) {
$xmesaj = "Sevgi axtar&#305;ram";
} else if ($xstatus == 5) {
$xmesaj = "Tan&#305;&#351; olmuram";
} else if ($xstatus == 6) {
$xmesaj = "Dar&#305;x&#305;ram";
} else if ($xstatus == 7) {
$xmesaj = "&#199;ekirem";
}
echo "<b>X-Status:</b> ";
if ($xstatus!=0)echo "<img src=\"img/x-status/".$xstatus.".gif\"/> <u>".$xmesaj."</u>";
echo "<br/>";
echo $fsize2;
echo "<select name=\"xstatus$ref\" value=\"".$xstatus."\">";
echo "<option value=\"0\">Bo&#351;</option>";
echo "<option value=\"1\">Online</option>";
echo "<option value=\"2\">Offline</option>";
echo "<option value=\"3\">Me&#351;gulam</option>";
echo "<option value=\"4\">Sevgi axtar&#305;ram</option>";
echo "<option value=\"5\">Tan&#305;&#351; olmuram</option>";
echo "<option value=\"6\">Dar&#305;x&#305;ram</option>";
echo "<option value=\"7\">&#199;ekirem</option>";
echo "</select> ";
echo $fsize1;
echo "<anchor>Ok<go href=\"cabinet.php?id=$id&amp;ps=$ps&amp;ps=$ps&amp;ref=$ref\" method=\"post\">
<postfield name=\"xstatus\" value=\"$(xstatus$ref)\"/>
<postfield name=\"deyish\" value=\"ok\"/>
</go></anchor><br/>";
echo $divide;

echo "&#xbb;<a href=\"profile.php?id=$id&amp;ps=$ps$takep2\">Anket - Melumatlar</a><br/>";
echo "&#xbb;<a href=\"change.php?id=$id&amp;ps=$ps$takep2\">Qur&#287;ular (Settings)</a><br/>";
echo "&#xbb;<a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;go=ehval$takep2\">Ehval&#305;m</a><br/>";
echo "&#xbb;<a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Nick Axtar</a><br/>";
echo "&#xbb;<i><a href=\"axtar.php?bol=all&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Axtar&#305;&#351; Sistemi</a></i><br/>";

echo $divide;
$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kimi` = '".$id."';");
$who = mysql_result($q, 0);
echo  "&#8226;<a href=\"beyen.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Beyendiklerim</a>(".$who.")<br/>\n";
$userm = mysql_query ("select count(id) as num from viewanket where `myid`='".$id."';");
$usm = mysql_fetch_array($userm);
$bax = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($bax/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$bax)$do=$bax;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo  "&#8226;<a href=\"viewanket.php?id=$id&amp;ps=$ps&amp;savalan=$savalan&amp;ref=$ref\">Anketime baxanlar</a>(".$bax.")<br/>\n";

$usms = mysql_fetch_array(mysql_query ("select count(klu4) as num from friends where id ='".$id."';"));
$kol_friend = $usms["num"];
echo "&#8226;<a href=\"friends.php?id=$id&amp;ps=$ps$takep2\">Dostlar Siyah&#305;s&#305;</a>(".$kol_friend.")<br/>";
$usm = mysql_fetch_array(mysql_query ("select count(klu4) as num from ignor where id ='".$id."';"));
$kol_ignor = $usm["num"];
echo "&#8226;<a href=\"ignor.php?id=$id&amp;ps=$ps$takep2\">&#304;qnor Siyah&#305;s&#305;</a>(".$kol_ignor.")<br/>";
$xelil = mysql_fetch_array(mysql_query ("select count(klu4) as dj_xxx from info_ignor where id ='".$id."';"));
$kol_ignor = $xelil["dj_xxx"];
echo "&#8226;<a href=\"info_ignor.php?id=$id&amp;ps=$ps$takep2\">Anket &#304;qnor Siyah&#305;s&#305;</a>(".$kol_ignor.")<br/>";
echo $fsize2;
break;

case 'foto':
echo $fsize1;
echo "<b>Foto Albom</b>:<br/>";
echo $divide;
if($del!=""){
$q = mysql_query("SELECT * FROM `albom` WHERE `photo` = '".$del."' and `idfoto` = '".$id."';");
if(mysql_num_rows($q) != 0)
{
mysql_query("DELETE from albom where photo = '".$del."'limit 1;");
$img = $row["img"]-1;
mysql_query ("update users set img = '".$img."' where id = '".$id."'");
if (file_exists("photos/".$id."/".$del.""))
{
unlink ("photos/".$id."/".$del."");
}
}
echo "<u>&#350;ekil Silindi...</u><br/>\n";
echo $divide;
echo "&#8226; <a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=$ps$takep2\">&#350;ekiller Foto-Albom</a><br/>";
echo $fsize2;
break;
}
echo "&#350;ekili silmek &#252;&#231;&#252;n [x] D&#252;ymesine t&#305;klay&#305;n (&#351;ekile verilen seslerde silinecek).<br/>----<br/>\n";

if(!is_dir(photos ."/".$id))
{
mkdir(addslashes(photos) . '/'.$id.'');
chmod(addslashes(photos) . '/'.$id.'', 0777);
}


if ($handle = opendir('photos/'.$id.'')) 
{ 
		$c = 1;
    while (false !== ($file = readdir($handle))) 
    {  

        if ($file != "." && $file != ".." && $file != "Thumbs.db")
        {  
			$a[]=$file;
            echo "".$c." [<a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=".$ps."&amp;del=".$file."&amp;ref=$ref\">x</a>] \n<a href=\"photos/$id/$file\">$file</a><br/>\n";  
			$c++;
        }  

    } 

closedir($handle);  
}

$cnt=count($a);
if($cnt==0)echo "<i><b>\"Foto-Albom</b>\"-da &#350;ekiliniz yoxdur...</i><br/>\n";
if($cnt!=10){
echo $divide;
echo "&#8226; <a href=\"foto.php?id=$id&amp;ps=$ps&amp;mod=photo$takep2\">Yeni &#350;ekil Y&#252;kle</a><br/>";
}
echo $fsize2;
break;


case 'ehval':
if(!isset($_POST['ehval']))
{
echo $fsize1;
echo "Ehval&#305;n&#305;z<br/>";
echo $fsize2;
$nastroi=$row['nastroi'];
echo "<input name=\"nastroi\" maxlength=\"20\" value=\"$nastroi\"/><br/>";
echo $fsize1;

echo "<anchor title=\"go\">Yadda saxla<go href=\"cabinet.php?id=$id&amp;ps=$ps&amp;go=ehval$takep\" method=\"post\">\n";
echo "<postfield name=\"ehval\" value=\"$(nastroi)\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}else{
$nastroi = check($nastroi);
require("file/require/sh_files");
$ehval = narmobil($ehval);
mysql_query ("Update users set nastroi='".$ehval."' where id ='".$id."';");

echo $fsize1;
echo "Sizin ehval&#305;n&#305;z deyi&#351;ildi!<br/>";
echo $fsize2;

}
break;


case 'img_c':
echo $fsize1;
mysql_query("UPDATE `users` SET `deh_foto`='1' WHERE id='$id'");
echo "<b>Hormetli <u>".$row["user"]."</u></b><br/>****<br/>";
echo "Siz Dehlizde g&#246;runen Fotonu ba&#287;lad&#305;n&#305;z...<br/>
Foto Art&#305;q sizde g&#246;r&#252;nmeyecek.<br/>";
echo $fsize2;
break;

case 'img_ca':
echo $fsize1;
mysql_query("UPDATE `users` SET `deh_foto`='0' WHERE id='$id'");
echo "<b>Hormetli <u>".$row["user"]."</u></b><br/>****<br/>";
echo "Siz Dehlizde g&#246;runen Fotonu a&#231;d&#305;n&#305;z...<br/>";
echo $fsize2;
break;


}
print $fsize1;
echo $divide;
if($go) echo "<a href=\"cabinet.php?id=$id&amp;ps=$ps$takep2\">&#350;exsi Kabinet</a><br/>\n";
if (isset ($rm))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>