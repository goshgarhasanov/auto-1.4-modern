<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"exchange\" title=\"Exchange\">";
echo "<p align=\"left\">";
echo $fsize1;

//qiymetin teyini
$post1 = 500;
$bal1 = 10;
$post2 = 1000;
$bal2 = 30;
$post3 = 5000;
$bal3 = 100;
//teyin som

switch($bol){

default:

$user = $row["user"];
$posts = $row["posts"];
$bal = $row["bal"];

echo "Salam <b>$user</b>, Exchange bolmesine xo&#351; geldin.<br/>Sen burada postlarini bala &#231;evire bilersen.Hesabinda <b>$posts</b> post var.!<br/>----<br/>";
echo "<b>$post1</b> postu <b>$bal1</b> bala <a href=\"exchange.php?bol=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "<b>$post2</b> postu <b>$bal2</b> bala <a href=\"exchange.php?bol=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "<b>$post3</b> postu <b>$bal3</b> bala <a href=\"exchange.php?bol=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
break;


case '1':

$posts =$row['posts'];
$bal =$row['bal'];
if($posts<$post1){
echo "Sizin hesabinizda <b>$post1</b> post yoxdurki <b>$bal1</b> bala deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";

}else{
mysql_query("UPDATE `users` SET `bal`= ".$bal." + '".$bal1."'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `posts`= ".$posts." - '".$post1."'  WHERE `id` = '".$id."';");

echo "Hesabiniza <b>$bal1</b> bal elave olundu.Tebrikler...<br/>";
}
break;

case '2':
$posts =$row['posts'];
$bal =$row['bal'];

if($posts<$post2){
echo "Sizin hesabinizda <b>$post2</b> post yoxdurki <b>$bal2</b> bala deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";

}else{
mysql_query("UPDATE `users` SET `bal`= ".$bal." + '".$bal2."'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `posts`= ".$posts." - '".$post2."'  WHERE `id` = '".$id."';");

echo "Hesabiniza <b>$bal2</b> bal elave olundu.Tebrikler...<br/>";
}
break;

case '3':
$posts =$row['posts'];
$bal =$row['bal'];

if($posts<$post3){
echo "Sizin hesabinizda <b>$post3</b> post yoxdurki <b>$bal3</b> bala deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"exchange.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";

}else{
mysql_query("UPDATE `users` SET `bal`= ".$bal." + '".$bal3."'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `posts`= ".$posts." - '".$post3."'  WHERE `id` = '".$id."';");

echo "Hesabiniza <b>$bal3</b> bal elave olundu.Tebrikler...<br/>";
}
break;

}
echo "----<br/>";
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;$ref\">Bal xidmetleri</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Dehliz</a>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>
