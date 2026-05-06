<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$user=$row["user"];	

if(isset($_POST['gizli']))
{

if((preg_match("/[^0-9a-z]+/",$pwd))or($pwd=="")){
$_v->title('Gizli Otaqa giri&#351;','center');
$_v->fsize1($fsize1);
echo "&#350;ifreniz herif ve ya reqemlerden ibaret olmalidir.<br/>----<br/>";
echo "<a href=\"otaq.php?id=$id&amp;ps=$ps&amp;rm=10&amp;ref=$ref\">Geri Qay&#351;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

@$save= fopen("file/control/10.dat", "a+"); 
$date = date("d.m.y [H:i]",$SERVER_TIME); 
$qeyd = "".base64_encode("Leqeb <u>$user</u>: - Kod <b>$pwd</b>: <u>$date</u> ")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);


$_v->title('Gizli Otaqa giri&#351;','center');
$_v->fsize1($fsize1);
echo "Siz Gizli ota&#287;a daxil olursunuz... <br/>Ota&#287;&#305;n &#351;ifresi: <b>$pwd</b><br/>----<br/>";
echo "<b><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;pwd=$pwd&amp;ref=$ref\">Daxil ol</a></b><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


$level=$row["level"];


   $bal=$row['bal'];
   $posts=$row['posts'];
   $status=$row['status'];
   $ip=$row['user_ip'];
   $room=$row['room'];

$levelselect = @mysql_query ("Select `name` from `levels` where `level`='".$level."';");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];

$_v->title('Otaqa giri&#351;');
$_v->fsize1($fsize1);


echo "Leqeb: <b>$user</b><br/>\n";
echo "Status: <b>$status</b><br/>\n"; 
if  ($level>3)echo "<u>R&#252;tbeniz</u>: <b>$levelname</b><br/>\n";
if(file_exists("i/".$id.".gif"))echo "<u>Rengli nikiniz var</u>: <img src=\"i/$id.gif\"/><br/>";
else echo "Rengli nikiniz yoxdur <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;bolme=nik&amp;ref=$ref\">Sifari&#351; et</a><br/>\n";
echo "Sizin <b>$bal</b>. bal&#305;n&#305;z var <br/>\n"; 
echo "Hesab&#305;n&#305;zda <b>$posts</b>, post var<br/>\n"; 

if ($rm=='10')
{
	$_v->divide();
	echo "<b>Qeyd</b>: Daxil olduqunuz otaq gizli otaqd&#305;r. Siz bu otaqa daxil olarken bir kod yazmal&#305;s&#305;z ve hemin kodu istediyiniz adama verin o da otaqa girende sizin yazd&#305;&#287;&#305;n&#305;z kodu yazs&#305;n.  Siz eyni otaqa d&#252;&#351;eceksiz. Sizin otaqa ba&#351;qa adamlar gire bilmeyecek (yazd&#305;&#287;&#305;n&#305;z kodu bilmeseler)<br/>****<br/>\n";
	echo "<b>Gizli kod</b><br/>\n";
	$_v->action("otaq.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref");
	print $_v->input("<input name=\"pwd$ref\" value=\"\" title=\"pwd\"/>").'<br/>';
	print $_v->submit('Daxil Ol','gizli=save');
}
else
{
	echo "----<br/>\n"; 
	echo "<b><a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Daxil ol</a></b><br/>\n";
}
$_v->divide();
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehlize qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>