<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


$user=$row["user"];
$level=$row["level"];

if($p_arr['40']!=1 or ($p_arr['140']!=1 and $p_arr['141']!=1 and $p_arr['142']!=1 and $p_arr['143']!=1 and $p_arr['144']!=1 and $p_arr['145']!=1 and $p_arr['146']!=1))
{
$_v->title('Olmaz','left');
$_v->fsize1($fsize1);
echo "Daxil Olma Icazeniz Yoxdur!<br/>----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
exit;
}



$_v->title('Mesaj Panel','left');
switch($bolme) {

default:
$_v->fsize1($fsize1);
echo "<b>Mesaj Paneli</b><br/>";
if($p_arr['140']==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=index&amp;ref=$ref\">Indexe Mesaj</a>(ba&#351;l&#305;qa)<br/>\n";
if($p_arr['141']==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=index1&amp;ref=$ref\">Indexe Mesaj</a>(logonun alt&#305;na)<br/>\n";
if($p_arr['142']==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=link&amp;ref=$ref\">Indexe link</a>(logolar&#305;n alt&#305;na)<br/>\n";
if($p_arr['143']==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=dehliz&amp;ref=$ref\">Dehlize Mesaj</a><br/>\n";
if($p_arr['140']==1 or $p_arr['141']==1 or $p_arr['142']==1 or $p_arr['143']==1)
$_v->divide();

if($p_arr['144']==1){
echo "*<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=reytinq&amp;ref=$ref\">Top reytinq</a><br/>\n";
$_v->divide();
}
if($id==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=bildiris&amp;ref=$ref\">&#304;stifade&#231;ilere mesaj</a>(Bildirisle)<br/>\n";
if($p_arr['146']==1)
echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=mesaj&amp;ref=$ref\">&#304;stifade&#231;ilere mesaj</a>(Metnle)<br/>\n";
$_v->fsize2($fsize2);
break;

case 'index':
if($p_arr['140']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
$file = file("file/log/1.dat");

if(!isset($_POST['action']))
{
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj &#231;at&#305;n giri&#351;inde (index-de) lap yuxar&#305; hissesinde g&#246;r&#252;necek.<br/>";
$_v->fsize2($fsize2);
$logo = trim($file[0]);
$message = trim($file[1]);
$test1 = trim($file[2]);
$test2 = trim($file[3]);

$_v->fsize1($fsize1);
echo "&#350;ekil:<br/>\n";
$_v->fsize2($fsize2);
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=index&amp;ref=$ref");
$_v->fsize1($fsize1);
print $_v->input("<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/>").'<br/>';
echo "Mesaj:<br/>\n";
print $_v->input("<input type=\"text\" name=\"message$ref\" maxlength=\"90000\" value=\"$message\"/>").'<br/>';
print $_v->submit('Elave Et','action=save');
$_v->fsize2($fsize2);
}
else
{
$logo = trim(htmlspecialchars($_POST['logo']));
$logo = str_replace('$', '$$', $logo);
$logo = str_replace('http://', '', $logo);
$logo = str_replace("\r\n", "", $logo);
$logo = str_replace("\n", "", $logo);
$message = narmobila($message);


$test1 = trim($file[2]);
$test2 = trim($file[3]);
$file = fopen("file/log/1.dat", "w");
$data .= "$logo\n";
$data .= "$message";
$data .= "$test1";
$data .= "$test2";
fwrite($file, $data);
fclose($file);

$_v->fsize1($fsize1);
echo "H&#246;rmetli <b>$user</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
$_v->fsize2($fsize2);
}

break;


case 'index1':
if($p_arr['141']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
$file = file("file/log/1.dat");
if(!isset($_POST['action']))
{
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj &#231;at&#305;n giri&#351;inde (index-de) &#231;at&#305;n logo &#351;ekilinin alt&#305;nda g&#246;r&#252;necek.<br/>";
$_v->fsize2($fsize2);
$logo = trim($file[2]);
$message = trim($file[3]);

$_v->fsize1($fsize1);
echo "&#350;ekil:<br/>\n";
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=index1&amp;ref=$ref");
print $_v->input("<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/>").'<br/>';

echo "Mesaj:<br/>\n";
print $_v->input("<input type=\"text\" name=\"message$ref\" maxlength=\"90000\" value=\"$message\"/>").'<br/>';



print $_v->submit('Elave Et','action=save');
$_v->fsize2($fsize2);
}
else
{
$logo = trim(htmlspecialchars($_POST['logo']));
$logo = str_replace('$', '$$', $logo);
$logo = str_replace('http://', '', $logo);
$message = trim(htmlspecialchars($_POST['message']));
$message = str_replace('$', '$$', $message);
$logo = str_replace("\r\n", "", $logo);
$logo = str_replace("\n", "", $logo);
$message = str_replace("\r\n", "", $message);
$message = str_replace("\n", "", $message);

$test1 = trim($file[0]);
$test2 = trim($file[1]);
$file = fopen("file/log/1.dat", "w");
$data .= "$test1\n";
$data .= "$test2\n";
$data .= "$logo\n";
$data .= "$message";
fwrite($file, $data);
fclose($file);

$_v->fsize1($fsize1);
echo "H&#246;rmetli <b>$user</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
$_v->fsize2($fsize2);
}
break;


case 'link':
if($p_arr['142']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
if(!isset($_POST['action']))
{
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z linkler ve ya link &#231;at&#305;n giri&#351;inde (index-de) logolar&#305;n alt&#305;na g&#246;r&#252;necek.<br/>";
echo "<b>Qayda</b>: Link yaz&#305;lan yerlere linki, Ad&#305; yaz&#305;lan yerlere ise linkin ad&#305;n&#305; yaz&#305;n.<br/>";
echo "<u>Numune</u>: link1=http://$site | Ad&#305;=Super Sayt<br/>";
$_v->divide();

$_v->fsize2($fsize2);
$file = file("file/log/2.dat");
$link1 = trim($file[0]);
$link2 = trim($file[1]);
$link3 = trim($file[2]);
$link4 = trim($file[3]);
$link5 = trim($file[4]);
$link6 = trim($file[5]);
$link7 = trim($file[6]);
$link8 = trim($file[7]);

$_v->fsize1($fsize1);
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=link&amp;ref=$ref");
echo "<b>1</b>) Link:\n";


print $_v->input("<input type=\"text\" name=\"link1$ref\" maxlength=\"200\" value=\"http://$link1\"/> | ");

echo "Ad&#305;:\n";


print $_v->input("<input type=\"text\" name=\"link2$ref\" maxlength=\"50\" value=\"$link2\"/>").'<br/>';

echo "<b>2</b>) Link:\n";


print $_v->input("<input type=\"text\" name=\"link3$ref\" maxlength=\"200\" value=\"http://$link3\"/> | ");

echo "Ad&#305;:\n";

print $_v->input("<input type=\"text\" name=\"link4$ref\" maxlength=\"50\" value=\"$link4\"/>").'<br/>';

echo "<b>3</b>) Link:\n";
print $_v->input("<input type=\"text\" name=\"link5$ref\" maxlength=\"200\" value=\"http://$link5\"/> | ");
echo "Ad&#305;:\n";
print $_v->input("<input type=\"text\" name=\"link6$ref\" maxlength=\"50\" value=\"$link6\"/>").'<br/>';
echo "<b>4</b>) Link:\n";
print $_v->input("<input type=\"text\" name=\"link7$ref\" maxlength=\"200\" value=\"http://$link7\"/> | ");
echo "Ad&#305;:\n";
print $_v->input("<input type=\"text\" name=\"link8$ref\" maxlength=\"50\" value=\"$link8\"/>").'<br/>';




$_v->divide();



print $_v->submit('Elave Et','action=save');

$_v->fsize2($fsize2);
}
else
{
$link1 = trim(htmlspecialchars($_POST['link1']));
$link1 = str_replace('$', '$$', $link1);
$link1 = str_replace('http://', '', $link1);
$link1 = str_replace("\r\n", "", $link1);
$link1 = str_replace("\n", "", $link1);

$link2 = trim(htmlspecialchars($_POST['link2']));
$link2 = str_replace('$', '$$', $link2);
$link2 = str_replace('http://', '', $link2);
$link2 = str_replace("\r\n", "", $link2);
$link2 = str_replace("\n", "", $link2);

$link3 = trim(htmlspecialchars($_POST['link3']));
$link3 = str_replace('$', '$$', $link3);
$link3 = str_replace('http://', '', $link3);
$link3 = str_replace("\r\n", "", $link3);
$link3 = str_replace("\n", "", $link3);

$link4 = trim(htmlspecialchars($_POST['link4']));
$link4 = str_replace('$', '$$', $link4);
$link4 = str_replace('http://', '', $link4);
$link4 = str_replace("\r\n", "", $link4);
$link4 = str_replace("\n", "", $link4);

$link5 = trim(htmlspecialchars($_POST['link5']));
$link5 = str_replace('$', '$$', $link5);
$link5 = str_replace('http://', '', $link5);
$link5 = str_replace("\r\n", "", $link5);
$link5 = str_replace("\n", "", $link5);

$link6 = trim(htmlspecialchars($_POST['link6']));
$link6 = str_replace('$', '$$', $link6);
$link6 = str_replace('http://', '', $link6);
$link6 = str_replace("\r\n", "", $link6);
$link6 = str_replace("\n", "", $link6);

$link7 = trim(htmlspecialchars($_POST['link7']));
$link7 = str_replace('$', '$$', $link7);
$link7 = str_replace('http://', '', $link7);
$link7 = str_replace("\r\n", "", $link7);
$link7 = str_replace("\n", "", $link7);

$link8 = trim(htmlspecialchars($_POST['link8']));
$link8 = str_replace('$', '$$', $link8);
$link8 = str_replace('http://', '', $link8);
$link8 = str_replace("\r\n", "", $link8);
$link8 = str_replace("\n", "", $link8);



$file = fopen("file/log/2.dat", "w");
$data .= "$link1\n";
$data .= "$link2\n";
$data .= "$link3\n";
$data .= "$link4\n";
$data .= "$link5\n";
$data .= "$link6\n";
$data .= "$link7\n";
$data .= "$link8";
fwrite($file, $data);
fclose($file);

$_v->fsize1($fsize1);
echo "H&#246;rmetli <b>$user</b>, Qeyd etdiyiniz linkler Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
$_v->fsize2($fsize2);
}

break;


case 'dehliz':
if($p_arr['143']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
if(!isset($_POST['action']))
{
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj Dehlizde ac&#305;q formada g&#246;r&#252;necek.<br/>";

$file = file("file/dat_folder/enter.dat");
$logo= trim($file[0]);
$mesaj= trim($file[1]);
$message = trim($file[2]);
$mesaj = str_replace("<u>", "", $mesaj);
$mesaj = str_replace("</u>", "", $mesaj);
$mesaj = str_replace("<i>", "", $mesaj);
$mesaj = str_replace("</i>", "", $mesaj);
$mesaj = str_replace("<b>", "", $mesaj);
$mesaj = str_replace("</b>", "", $mesaj);
$mesaj = str_replace("<big>", "", $mesaj);
$mesaj = str_replace("</big>", "", $mesaj);
$message = str_replace("<u>", "", $message);
$message = str_replace("</u>", "", $message);
$message = str_replace("<i>", "", $message);
$message = str_replace("</i>", "", $message);
$message = str_replace("<b>", "", $message);
$message = str_replace("</b>", "", $message);
$message = str_replace("<big>", "", $message);
$message = str_replace("</big>", "", $message);
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=dehliz&amp;ref=$ref");
echo "&#350;ekil:<br/>\n";
echo "<br/>\n";
print $_v->input("<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/>").'<br/>';


echo "Ba&#351;l&#305;q:<br/>\n";


print $_v->input("<input type=\"text\" name=\"mesaj$ref\" maxlength=\"200\" value=\"$mesaj\"/>");

print $_v->select("<select name=\"s$ref\">|<option value=\"0\">normal</option>|<option value=\"1\">Kursiv</option>|<option value=\"2\">Alt&#305; xetli</option>|<option value=\"3\">Qal&#305;n</option>|<option value=\"4\">B&#246;y&#252;k Qal&#305;n</option>|</select>",'null').'<br/>';
echo "Mesaj:<br/>\n";
print $_v->input("<input type=\"text\" name=\"message$ref\" maxlength=\"90000\" value=\"$message\"/>");

print $_v->select("<select name=\"v$ref\">|<option value=\"0\">normal</option>|<option value=\"1\">Kursiv</option>|<option value=\"2\">Alt&#305; xetli</option>|<option value=\"3\">Qal&#305;n</option>|<option value=\"4\">B&#246;y&#252;k Qal&#305;n</option>|</select>",'null').'<br/>';

print $_v->submit('Elave Et','action=save');

$_v->fsize2($fsize2);
}
else
{
$logo = str_replace('http://', '', $logo);

$mesaj = narmobila($mesaj);
$message = narmobila($message);
$logo = narmobila($logo);

if($s==1){
$shr1 = "<i>"; $shr2 = "</i>";
}elseif($s==2){
$shr1 = "<u>"; $shr2 = "</u>";
}elseif($s==3){
$shr1 = "<b>"; $shr2 = "</b>";
}elseif($s==4){
$shr1 = "<b><big>"; $shr2 = "</big></b>";
}

if($v==1){
$shr3 = "<i>"; $shr4 = "</i>";
}elseif($v==2){
$shr3 = "<u>"; $shr4 = "</u>";
}elseif($v==3){
$shr3 = "<b>"; $shr4 = "</b>";
}elseif($v==4){
$shr3 = "<b><big>"; $shr4 = "</big></b>";
}
$file = file("file/dat_folder/enter.dat");
$test1= trim($file[3]);
$test2= trim($file[4]);
$test3= trim($file[5]);
$test4= trim($file[6]);
$ffoto = trim($file[7]);
$fusid = trim($file[8]);
$fuser = trim($file[9]);
$qeyd = trim($file[10]);
$ftimer = trim($file[11]);

$file = fopen("file/dat_folder/enter.dat", "w");
$data .= "$logo\n";
$data .= "$shr1$mesaj$shr2\n";
$data .= "$shr3$message$shr4\n";
$data .= "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "$test4\n";
$data .= "$ffoto\n";
$data .= "$fusid\n";
$data .= "$fuser\n";
$data .= "$qeyd\n";
$data .= "$ftimer";
fwrite($file, $data);
fclose($file);

$_v->fsize1($fsize1);
echo "H&#246;rmetli <b>$user</b>, Sizin qeydiniz dehlize elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
$_v->fsize2($fsize2);
}

break;

case 'reytinq':
if($p_arr['144']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
$file = file("file/log/1.dat");
if(!isset($_POST['action']))
{
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yerle&#351;direceyiniz reytinq &#231;at&#305;n giri&#351;inde (index-de) en a&#351;a&#287;&#305;s&#305;nda g&#246;r&#252;necek.<br/>";

$reyt1 = trim($file[4]);
$reyt2 = trim($file[5]);

$reyt1 = trim(htmlspecialchars($reyt1));
$reyt2 = trim(htmlspecialchars($reyt2));

$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=reytinq&amp;ref=$ref");

echo "Reytinq linki 1:<br/>\n";

print $_v->input("<input type=\"text\" name=\"reyt1$ref\" maxlength=\"200\" value=\"$reyt1\"/>").'<br/>';


echo "Reytinq linki 2:<br/>\n";

print $_v->input("<input type=\"text\" name=\"reyt2$ref\" maxlength=\"200\" value=\"$reyt2\"/>").'<br/>';




print $_v->submit('Elave Et','action=save');

$_v->fsize2($fsize2);
}
else
{
$reyt1 = trim(htmlspecialchars($_POST['reyt1']));
$reyt2 = trim(htmlspecialchars($_POST['reyt2']));
$reyt1 = str_replace("\\", "", $reyt1);
$reyt1 = str_replace("&quot;", "\"", $reyt1);
$reyt1 = str_replace("&gt;", ">", $reyt1);
$reyt1 = str_replace("&lt;", "<", $reyt1);

$reyt2 = str_replace("\\", "", $reyt2);
$reyt2 = str_replace("&quot;", "\"", $reyt2);
$reyt2 = str_replace("&gt;", ">", $reyt2);
$reyt2 = str_replace("&lt;", "<", $reyt2);


$test1 = trim($file[0]);
$test2 = trim($file[1]);
$test3 = trim($file[2]);
$test4 = trim($file[3]);

$file = fopen("file/log/1.dat", "w");
$data .= "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "$test4\n";
$data .= "$reyt1\n";
$data .= "$reyt2";
fwrite($file, $data);
fclose($file);

$_v->fsize1($fsize1);
echo "H&#246;rmetli <b>$user</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
$_v->fsize2($fsize2);
}
break;


case 'bildiris':
if($p_arr['145']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
if(!isset($_POST['action']))
{
$qizlar=mysql_query ("SELECT * FROM users where sex = '1' ");
$qiz = mysql_affected_rows();
$oglanlar=mysql_query ("SELECT * FROM users where sex = '0' ");
$oglan = mysql_affected_rows();
$cem = $qiz+$oglan;
$_v->fsize1($fsize1);
print "<u>&#304;stifade&#231;ilerin say&#305;</u>: <b>".$cem."</b><br/>";
print "O&#287;lanlar: <b>".$oglan."</b><br/>";
print "Q&#305;zlar: <b>".$qiz."</b><br/>";
$_v->divide();
echo "Yazd&#305;q&#305;n&#305;z metn bildiris vasitesile g&#246;nderilecek.<br/>\n";
$_v->divide();
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=bildiris&amp;ref=$ref");


echo "Metn:<br/>";

print $_v->input("<input name=\"msg$ref\" type=\"text\"/>").'<br/>';


echo "Kimlere?<br/>";

print $_v->select("<select name=\"cins$ref\">|<option value=\"0\">Herkese</option>|<option value=\"1\">Q&#305;zlara</option>|<option value=\"2\">O&#287;lanlara</option>|<option value=\"3\">R&#252;tbelilere</option>|</select>",'null').'<br/>';




print $_v->submit('Elave Et','action=save');

$_v->fsize2($fsize2);

break;
}
else
{
if($cins==1){
$select=mysql_query ("SELECT * FROM users where sex = '1' and time>'".($SERVER_TIME-(86400*3))."'");
}elseif($cins==2){
$select=mysql_query ("SELECT * FROM users where sex = '0' and time>'".($SERVER_TIME-(86400*3))."'");
}elseif($cins==0){
$select=mysql_query ("SELECT * FROM users where time>'".($SERVER_TIME-(86400*3))."'");
}else{ 
$select=mysql_query ("SELECT * FROM users where level > '3' and time>'".($SERVER_TIME-(86400*3))."'");
}

$msg = narmobil($msg);
$topic = narmobil($topic);
$dataspamm = date("H:i",$SERVER_TIME); 
$timespamm = $SERVER_TIME-600;
while ( $allu = mysql_fetch_array ($select) )
{
mysql_query("insert into zapiski values(0,'".$user."','".$id."','".$msg."','".$allu["user"]."','".$allu["id"]."','".$timespamm."','0','".$topic."','".$dataspamm."','1','1');");
}
$_v->fsize1($fsize1);

if($cins==1){
print "Sizin mesaj&#305;n&#305;z b&#252;t&#252;n <u>Q&#305;zlara</u>, Bildiris vesitesi ile g&#246;nderildi!<br/>";
}elseif($cins==2){
print "Sizin mesaj&#305;n&#305;z b&#252;t&#252;n <u>O&#287;lanlara</u>, Bildiris vesitesi ile g&#246;nderildi!<br/>";
}elseif($cins==0){
print "Sizin mesaj&#305;n&#305;z b&#252;t&#252;n <u>istifade&#231;ilere</u>, Bildiris vesitesi ile g&#246;nderildi!<br/>";
}else{
print "Sizin mesaj&#305;n&#305;z b&#252;t&#252;n <b>R&#252;tbeli &#350;exslere</b>, Bildiris vesitesi ile g&#246;nderildi!<br/>";
}
$_v->fsize2($fsize2);
}
break;





case 'mesaj':
if($p_arr['146']!=1){
$_v->fsize1($fsize1);
echo "Buna huququnuz yoxdur.<br/>\n";
$_v->fsize2($fsize2);
break;
}
if(strlen($_POST['message'])<5)
{
$file = file("file/dat_folder/mesaj.dat");
$logo = trim($file[2]);
$message = trim($file[3]);
$_v->fsize1($fsize1);
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj istifade&#231;ilerin ekran&#305;na &#231;&#305;xacaq!<br/>----<br/>";
$_v->action("mesajes.php?id=$id&amp;ps=$ps&amp;bolme=mesaj&amp;ref=$ref");

echo "Mesaj:<br/>\n";

print $_v->input("<input type=\"text\" name=\"message$ref\" maxlength=\"90000\" value=\"$message\"/>").'<br/>';

echo "&#350;ekil:<br/>\n";

print $_v->input("<input type=\"text\" name=\"logo$ref\" maxlength=\"200\" value=\"http://$logo\"/>").'<br/>';

echo "Kimlere?<br/>\n";
/*
echo "<select name=\"alici$ref\">\n";
echo "<option value=\"0\">Q&#305;zlara </option>\n";
echo "<option value=\"1\">O&#287;lanlara</option>\n";
echo "<option value=\"2\">Herkese</option>\n";
echo "<option value=\"3\">R&#252;tbelilere</option>\n";
echo "</select><br/>\n";

$_v->fsize1($fsize1);
echo "<anchor>[G&#246;nder]<go href=\"mesajes.php?id=$id&amp;ps=$ps&amp;bolme=mesaj&amp;ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo$ref)\"/>\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "<postfield name=\"alici\" value=\"$(alici$ref)\"/>\n";
echo "</go></anchor><br/>\n";*/

print $_v->select("<select name=\"alici$ref\">|<option value=\"0\">Q&#305;zlara</option>|<option value=\"1\">O&#287;lanlara</option>|<option value=\"2\">Herkese</option>|<option value=\"3\">R&#252;tbelilere</option>|</select>",'null').'<br/>';




print $_v->submit('Elave Et','action=save');


$_v->fsize2($fsize2);
}
else
{
$logo = str_replace('$', '$$', $logo);
$logo = str_replace('http://', '', $logo);
$message = str_replace('$', '$$', $message);
$logo = str_replace("\r\n", "", $logo);
$logo = str_replace("\n", "", $logo);
$message = str_replace("\r\n", "", $message);
$message = str_replace("\n", "", $message);
$message = narmobil($message);
$file = fopen("file/dat_folder/mesaj.dat", "w");
$data = $logo."\n";
$data .= $message."";
fwrite($file, $data);
fclose($file);

if($alici=="0"){
$_v->fsize1($fsize1);
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n Xan&#305;mlara g&#246;nderildi!<br/>\n";
$_v->fsize2($fsize2);
@mysql_query ("update users set con = 1 where sex = 1 ");
}elseif($alici=="1"){
$_v->fsize1($fsize1);
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n O&#287;lanlara g&#246;nderildi!<br/>\n";
$_v->fsize2($fsize2);
@mysql_query ("update users set con = 1 where sex = 0 ");
}elseif($alici=="2"){
$_v->fsize1($fsize1);
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n istifade&#231;ilere g&#246;nderildi!<br/>\n";
$_v->fsize2($fsize2);
@mysql_query ("update users set con = 1");
}elseif($alici=="3"){
$_v->fsize1($fsize1);
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n r&#252;tbelilere g&#246;nderildi!<br/>\n";
$_v->fsize2($fsize2);
@mysql_query ("update users set con = 1 where level >= 4");
}
}
break;
}

$_v->fsize1($fsize1);
$_v->divide();
if($bolme!='')echo "<a href=\"mesajes.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaj Paneli</a><br/>\n";
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>