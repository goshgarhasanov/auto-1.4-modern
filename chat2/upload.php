<?php
error_reporting(0);
header ("Content-type: text/html; charset=utf-8");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: no-cache, must-relative");
require("ay.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$posts = $row["posts"];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html><head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>\n";
echo "<title>MMS Mektub</title>\n";
echo "<style type=\"text/css\">
body { font-weight: normal; font-size: normal; font-family: arial; color: #ffffff; background-color: #031322;}

      a {color:#F9C453;}
      a:active {text-decoration: underline; color :#2C75B1;}
      a:hover {text-decoration: none; color :red;}
	  
div { margin: 1px 0px 1px 0px; padding: 1px 5px 5px 5px; font-size: 14px;}
div.form { background-color: #000000; border-left: 5px solid #7FA9D2;  border-right: 5px solid #7FA9D2; color: red; padding:3px; margin:2px}
div.e_r {color: red;}
div.o_k {color: #F92FF5;}
.c{background-color: #005500; border-top: 2px solid #00ff49; border-left: 2px solid #00ff49; border-bottom: 3px solid #00ff49; border-right: 2px solid #00ff49; color: #FFFFFF; padding:3px; margin:2px }                                          
.main{background-color: #3F5972; border-top: 2px solid #7FA9D2; border-left: 2px solid #7FA9D2; border-bottom: 3px solid #3a384f; border-right: 2px solid #3a384f; color: #FFFFFF; padding:3px; margin:2px }

</style></head><body>";

echo "<center><div class=c><b><big>MMS Fayl g&#246;nder</big></b><br/></center></div>";
echo "<div class=\"form\">\n";

if ($posts < 100)
{
echo "MMS Mektub (gif, jpeg, jpg, png, 3gp, mp3, doc) xidmetinden istifade etmek &#252;&#231;&#252;n<br/><br/>Sizin minumum <b>100</b> postunuz olmal&#305;d&#305;r!<br/>----<br/>";
echo "</form></div>";
echo "<center><div class=c><div class=\"e_r\">";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;$ref\">MMS Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
echo "</center></div></div>";
echo "</body></html>";
exit();
}

if(!isset($_POST['action']))
{
echo "<form action=\"upload.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\" enctype=\"multipart/form-data\">\n";
echo "<b>Kime (Leqeb /ID)</b>:<br/>\n";
echo "<input type=\"nick$ref\" name=\"nk\" /><br />\n";
echo "<b>MMS fayl Daxil et:</b><br/>\n";
echo "<input type=\"file\" name=\"mms\" /><br />\n";
echo "<u>Qeyd:</u><br/>\n";
echo "<input type=\"text\" name=\"text\" /><br />\n";
echo "<input type=\"hidden\" name=\"action\" value=\"upload\" />\n";
echo "<input type=\"submit\" value=\"G&#246;nder\" /><br/>\n";
}
else
{

if(!is_uploaded_file($_FILES['mms']['tmp_name']))
{
$error = "Fayl&#305; Se&#231;memisiz.<br/>";
}

if(filesize($_FILES['mms']['tmp_name']) > 1024 * 5100)
{
$error = "MMS Fayl&#305;n hecmi 5 Mb-dan &#231;ox olmamal&#305;d&#305;r!<br />";
}

$aktiv = array("gif", "jpeg", "jpg", "png", "3gp", "mp3");
$pathinfo = pathinfo($_FILES['mms']['name']);
if (!in_array(strtolower($pathinfo['extension']), $aktiv))
{
$error = "<center><b><big>Diqqet!</b></big><br/>----<br/><i>Siz yaln&#305;z a&#351;a&#287;&#305;dak&#305; formatlarda olan fayllar g&#246;ndere bilersiz:</i><br/>gif, jpeg, jpg, png, 3gp, mp3, doc.<br/></center>\n";
}


if (empty($nk))
{
$error = "<b>Siz he&#231; bir leqeb yazmad&#305;z MMS kime g&#246;nderim? )))</b>";
}

$nk = strtolower($nk);
if (!ctype_digit($nk))
{
$nk = trim($nk);
if ($nk == "")
{
$nk = 0;
}
$latuser = strtolower($nk);
$latuser = mysql_escape_string($latuser);
$q = mysql_query("SELECT * FROM `users` WHERE `latuser` = '".$latuser."';");
}
else
{
$nk = mysql_escape_string($nk);
$q = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
}

if(mysql_affected_rows() == 0)
{
$error = "<center><b><u>Tap&#305;lmad&#305;!</b></u><br/>----<br/><div class=\"e_r\">
<b><u>$nk</u>, leqebli</b><b>istifade&#231;i bazada tap&#305;lmad&#305;.</b><br/>";
}
else
{
$user_data = mysql_fetch_array($q);
$toid = $user_data['id'];
$time = $user_data['time'];
$alici = $user_data['user'];
$mektub_q = $user_data['mektub_qebulu'];
}

if ($row['level'] != 9)
{
if ($mektub_q == 1)
{
mysql_query( "Select * from friends where usid='".$id."' and id='".$toid."'" );
if (mysql_affected_rows() == false)
{
$error = "<center><b><u>STOP!</b></u><br/>----<br/><div class=\"e_r\"><u>Bu istifade&#231;i yaln&#305;z dostlar&#305;ndan MMS qebul edir.</u></div></center>";
}
}

if ($mektub_q == 2)
{
$error = "<center><b><u>STOP!</b></u><br/>----<br/><div class=\"e_r\"><u>Bu istifade&#231;i MMS qebul etmir.</u></div></center>";
}

}

@mysql_query( @"Select * from ignor where usid='".@$id."' and id='".@$toid."'" );
if ( mysql_affected_rows( ) == true )
{
$error = "<center><b><u>STOP!</b></u><br/>----<br/><div class=\"e_r\"><b>".$alici."</b> <i>Sizi ignor edib</i>.<br/>Bu veziyyetde Siz ona mms g&#246;ndere bilmersiz!</div></center>";
}

if ($toid == $id)
{
$error = "<center><b><u>STOP!</b></u><br/>----<br/><div class=\"e_r\"><b>Havalan&#305;bsan?</b><br/></div></center>";
}

$date = date("d-m-Y H:i:s");

$q = mysql_query("SELECT * FROM `mms` WHERE `kod` = '".$olchu."' AND `to` = '".$toid."';");
if(mysql_num_rows($q) != 0)
{
$error = "<b>Bu &#351;ekili siz daha &#246;nce bu istifade&#231;iye g&#246;nderibsiz!</b>";
}

if (isset($error))
{
echo $error."<br/>";
echo "</form></div>";
echo "<center><div class=c><div class=\"e_r\">";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;$ref\">MMS Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
echo "</center></div></div>";
echo "</body></html>";
exit();
}

for ($i=1; $i<strlen($_FILES['mms']['name']); $i++) {
 if (strpos($_FILES['mms']['name'], '.', $offst) > 0) {
 $bf=strpos($_FILES['mms']['name'], '.', $offst);
 $offst=$bf+1;
 }
};
$photo_type = substr($_FILES['mms']['name'], $bf, strlen($_FILES['mms']['name'])-$bf+1);

$rn = rand(1000000, 9999999);
$adi = $id.$rn.$photo_type;
	
if(copy($_FILES['mms']['tmp_name'], "mms/".$adi.""))
{

}
$olchu=round(filesize("mms/".$adi."")/1024,1);

$query = mysql_query("INSERT INTO `mms` VALUES(0, '".$id."', '".$toid."', '".$id."', '$adi', '".$olchu."', '".$text."', '".$date."', '".time()."', 0, 0, 0);");
$sql = mysql_query("UPDATE `mms` SET `photo` = '$adi', `id` = '".$id."' where `lid` = '".$lid."' ;");

if($query)
{
$olchu=round(filesize("mms/".$adi."")/1024,1);
echo "<b>".$olchu." Kb MMS <u>$alici</u> leqebli istifade&#231;iye  g&#246;nderildi.</b><br/>\n";
}
else
{
echo "<b>Xeta ba&#351; verdi.</b><br/>\n";
echo mysql_error()."<br/>\n";
}

}
echo "</form></div>";
echo "<center><div class=c><div class=\"e_r\">";
echo "<a href=\"mms.php?id=$id&amp;ps=$ps&amp;$ref\">MMS Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;$ref\">Dehliz</a><br/>\n";
echo "</center></div></div>";
echo "</body></html>";
?>
