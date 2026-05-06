<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if (isset($rm)) $takep2="&amp;rm=$rm&amp;ref=$ref";
else $takep2="&amp;ref=$ref";

if($rm==10) $takep="&amp;pwd=$pwd&amp;ref=$ref";
else if($mod=="privat") $takep="&amp;mod=$mod&amp;ref=$ref";
else $takep="&amp;ref=$ref";

if($row["cabinetphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Kabinet Bolmasine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayn</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$_v->title('&#350;exsi Kabinet');
$_v->fsize1($fsize1);

switch($go) {

default:
echo "Salam <b>".$row["user"]."</b>!<br/>";
echo "Bura sizin &#350;exsi Kabinetinizdir, Burda olan melumatlar yaln&#305;z Size aiddir...<br/>";
$_v->divide();
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
$qeh = mysql_query("SELECT COUNT(*)  FROM `hediyye` WHERE `toid` = '".$id."';");
$hedi = mysql_result($qeh, 0);

echo "&#8226; <a href=\"mms.php?id=$id&amp;ps=$ps$takep2\">MMS Mektublar</a>($newto/$to)<br/>";
if($row["img"]!='0')echo "&#8226; <a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=$ps$takep2\">Foto-Albom &#350;ekillerim</a>($row[img])<br/>";
else echo "&#8226; <a href=\"foto.php?id=$id&amp;ps=$ps$takep2\">Foto-Alboma &#350;ekil Y&#252;kle</a><br/>";
echo "&#8226; <a href=\"hediyye.php?bol=2&amp;id=$id&amp;ps=$ps&amp;nk=$id$takep2\">Hediyyelerim</a>($hedi)<br/>";
echo "&#8226; <a href=\"fikirler.php?id=$id&amp;ps=$ps&amp;nk=$id$takep2\">Xatire Defterim</a>($xati)<br/>";

$_v->divide();
if (empty($deyish)) {
	$xstatus = $row["xstatus"];
} else {
	mysql_query ("Update users set xstatus='".intval($xstatus)."' where id ='".$id."' LIMIT 1;");
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


$option = "<select name=\"xstatus$ref\">|";
$option .= "<option value=\"0\">Bo&#351;</option>|";
$option .= "<option value=\"1\">Online</option>|";
$option .= "<option value=\"2\">Offline</option>|";
$option .= "<option value=\"3\">Me&#351;gulam</option>|";
$option .= "<option value=\"4\">Sevgi axtar&#305;ram</option>|";
$option .= "<option value=\"5\">Tan&#305;&#351; olmuram</option>|";
$option .= "<option value=\"6\">Dar&#305;x&#305;ram</option>|";
$option .= "<option value=\"7\">&#199;ekirem</option>|";
$option .= "</select>";

$_v->action("cabinet.php?id=$id&amp;ps=$ps&amp;ps=$ps&amp;ref=$ref");
print $_v->select($option,$xstatus).' ';
print $_v->submit1('Ok','deyish=ok');
$_v->wml('<br/>');
echo $divide;

echo "&#xbb; <a href=\"profile.php?id=$id&amp;ps=$ps$takep2\">Anket - Melumatlar</a><br/>";
echo "&#xbb; <a href=\"change.php?id=$id&amp;ps=$ps$takep2\">Qur&#287;ular (Settings)</a><br/>";
echo "&#xbb; <a href=\"cabinet.php?id=$id&amp;ps=$ps&amp;go=ehval$takep2\">Ehval&#305;m</a><br/>";
echo "&#xbb; <a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Nick Axtar</a><br/>";
echo "&#xbb; <i><a href=\"axtar.php?bol=all&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Axtar&#305;&#351; Sistemi</a></i><br/>";

echo $divide;

$usms = mysql_fetch_array(mysql_query ("select count(klu4) as num from friends where id ='".$id."';"));
$kol_friend = $usms["num"];
echo "&#8226; <a href=\"friends.php?id=$id&amp;ps=$ps$takep2\">Dostlar Siyah&#305;s&#305;</a>(".$kol_friend.")<br/>";
$usm = mysql_fetch_array(mysql_query ("select count(klu4) as num from ignor where id ='".$id."';"));
$kol_ignor = $usm["num"];
echo "&#8226; <a href=\"ignor.php?id=$id&amp;ps=$ps$takep2\">&#304;qnor Siyah&#305;s&#305;</a>(".$kol_ignor.")<br/>";

	$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kim` = '".$id."';");
	$my = mysql_result($q, 0);
	echo "&#8226; <a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=my_likes&amp;ref=$ref\">Beyendiklerim</a>($my)<br/>";
	$q = mysql_query("SELECT COUNT(*) FROM `beyen` WHERE `kimi` = '".$id."';");
	$who = mysql_result($q, 0);
	echo "&#8226; <a href=\"beyen.php?id=$id&amp;ps=$ps&amp;bol=wholike&amp;nk=$id&amp;ref=$ref\">Beyenenler</a>($who)<br/>";
	$usmnn = mysql_fetch_array(mysql_query ("select count(klu4) as num from info_qov where id ='".$id."';"));
$kol_ignori = $usmnn["num"];
echo "&#8226; <a href=\"info_qov.php?id=$id&amp;ps=$ps$takep2\">&#304;nfodan Qovduqlarim</a>(".$kol_ignori.")<br/>";
break;

case 'foto':
echo "<b>Foto Albom</b>:<br/>";
echo $divide;
if($del!="")
{
	$q = mysql_query("SELECT * FROM `albom` WHERE `id` = '".$del."' and `idfoto` = '".$id."';");
	if(mysql_num_rows($q) != 0)
	{
		$inf = mysql_fetch_array($q);
		mysql_query("DELETE from `albom` where `id` = '".$del."' limit 1;");
		$img = $row["img"]-1;
		mysql_query ("update `users` set `img` = '".$img."', `image_fon` = '' where `id` = '".$id."';");
		if (file_exists("photos/".$id."/".$inf['photo']))
		{
			unlink ('photos/'.$id.'/'.$inf['photo']);
			@unlink ('photos/src/'.$id.'.gif');
		}
	}
	echo "<u>&#350;ekil Silindi...</u><br/>\n";
	echo $divide;
	echo "&#8226; <a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=$ps$takep2\">&#350;ekiller Foto-Albom</a><br/>";
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
			$q = mysql_query("SELECT * FROM `albom` WHERE `photo` = '".$file."' and `idfoto` = '".$id."';");
			if (mysql_affected_rows() != 0) 
			{
				$inf = mysql_fetch_array($q);
					$a[]=$file;
					echo "".$c." [<a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=".$ps."&amp;del=".$inf['id']."&amp;ref=$ref\">x</a>] \n<a href=\"photos/$id/$file\">$file</a><br/>\n";  
					$c++;
			}
        }
    }
closedir($handle);  
}

$cnt=count($a);
if($cnt==0)echo "<i><b>\"Foto-Albom</b>\"-da &#350;ekiliniz yoxdur...</i><br/>\n";
if($cnt!=10){
$_v->divide();
echo "&#8226; <a href=\"foto.php?id=$id&amp;ps=$ps&amp;mod=photo$takep2\">Yeni &#350;ekil Y&#252;kle</a><br/>";
}
break;


case 'ehval':
if(!isset($_POST['message']))
{
	$_v->action("cabinet.php?id=$id&amp;ps=$ps&amp;go=ehval$takep");
	echo "Ehval&#305;n&#305;z<br/>";
	$message=$row['nastroi'];
	print $_v->input("<input name=\"message$ref\" maxlength=\"20\" value=\"$message\"/>").'<br/>';
	print $_v->submit('Yadda saxla','deyish=ok');
}
else
{
	$message = narmobil($message);
	mysql_query ("Update `users` set `nastroi`='".$message."' where `id` ='".$id."';");

	echo "Sizin ehval&#305;n&#305;z deyi&#351;ildi!<br/>";
}
break;
}

$_v->divide();
if($go) echo "<a href=\"cabinet.php?id=$id&amp;ps=$ps$takep2\">&#350;exsi Kabinet</a><br/>\n";
if (isset ($rm))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>