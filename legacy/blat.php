<?php
require("inc.php");
$ref=rand(10000,1000000);
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row["bal"];
$user = $row["user"];

if($b!='1' and $b!='2' and $b!='3'){
header("Location: on.php?id=$id&ps=$ps&ref=$ref");
exit;
}

$_v->title('Durtmeleki Tez yazsin Cavab:)');
$_v->fsize1($fsize1);

if($b=='1'){
if ($bal<2) {
echo "G&#246;z vurmaq &#252;&#231;&#252;n balans&#305;n&#305;zda 2 bal olmal&#305;d&#305;r.<br/>---<br/>\n";
echo "<b><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesab&#305;na Bal y&#252;kle</a></b><br/>";
} else {
$bal=$bal-2;
mysql_query ("Update `users` set `bal`='".$bal."' where `id`='".$id."';");
$message = "<b>$user</b>, Size G&#246;z vurdu<img src=\"img/goz.gif\" alt=\"img\"/>  ";
mysql_query("Insert into `zapiski` set `who` ='Size G&#246;z vuran var :)', `idwho` ='0', `message` = '".$message."', `towhom` = '".$user."', `idtowhom` = '".$nk."', `time` = '".$SERVER_TIME."', `topic` = 'Size G&#246;z vuran var :)';");

echo "Siz se&#231;diyiniz istifade&#231;iye G&#246;z vurdunuz. Balans&#305;n&#305;zdan 2 bal &#231;&#305;x&#305;ld&#305;..<br/>Xidmetden istifade etdiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler..<br/>";
}
}elseif($b=='2'){
if ($row["bal"]<10) {
echo "Sizin 10 Bal&#305;n&#305;z olmasa Bu istifade&#231;iye &#246;p&#252;c&#252;k g&#246;ndere bilmersiniz...<br/>---<br/>\n";
echo "<b><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesab&#305;na Bal y&#252;kle</a></b><br/>\n";
} else {
$bal=$bal-10;
mysql_query ("Update `users` set `bal`='".$bal."' where `id`='".$id."';");
$message = "<b>$user</b>, size &#246;p&#252;c&#252;k g&#246;nderdi<img src=\"img/op.gif\" alt=\"img\"/> ";
mysql_query("Insert into `zapiski` set `who` ='Size &#246;p&#252;c&#252;k var :)', `idwho` ='0', `message` = '".$message."', `towhom` = '".$user."', `idtowhom` = '".$nk."', `time` = '".$SERVER_TIME."', `topic` = 'Size &#246;p&#252;c&#252;k var :))';");
echo "Siz se&#231;diyiniz istifade&#231;iye &#246;p&#252;c&#252;k g&#246;nderdiniz. Balans&#305;n&#305;zdan 10 bal &#231;&#305;x&#305;ld&#305;..<br/>Xidmetden istifade etdiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler..<br/>";
}
}elseif($b=='3'){
if ($bal<5) {
echo "Sizin 5 Bal&#305;n&#305;z olmasa Bu istifade&#231;ini D&#252;rtmeleye bilmersiniz...<br/>----<br/>\n";
echo "<b><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesab&#305;na Bal y&#252;kle</a></b><br/>\n";
} else {
$bal=$bal-5;
mysql_query ("Update `users` set `bal`='".$bal."' where `id`='".$id."';");
$message = "<b>$user</b>, Sizi D&#252;rdmeleyir ki, ona cavab yazas&#305;z <img src=\"img/durt.gif\" alt=\"img\"/> ";
mysql_query("Insert into `zapiski` set  `who` ='Sizi D&#252;rtmelediler :)', `idwho` ='0', `message` = '".$message."', `towhom` = '".$user."', `idtowhom` = '".$nk."', `time` = '".$SERVER_TIME."', `topic` = 'Diqqet! Sizi D&#252;rtmelediler :)';");
echo "Siz se&#231;diyiniz istifade&#231;ini D&#252;rtmelediniz. Balans&#305;n&#305;zdan 5 bal &#231;&#305;x&#305;ld&#305;..<br/>Xidmetden istifade etdiyiniz &#252;&#231;&#252;n te&#351;ekk&#252;rler..<br/>";
}
}
$_v->divide();
if($rm!='')
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>\n";
else
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>