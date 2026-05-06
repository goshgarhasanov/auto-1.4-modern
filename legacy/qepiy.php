<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__));


echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"exchange\" title=\"Qepiy Banki\">";
echo "<p align=\"left\">";
echo $fsize1;


switch($bol){

default:
$user = $row["user"];
$qepiy = $row["qepiy"];
echo "<p align=\"center\">";
echo "Qepiy Yukleme Merkezi<br/>";
echo "Balasinizda : $qepiy Qepiy var<br/>";
echo "</p>";
echo "Qepiy Bank Xidmeti :<br/>";
echo "<a href=\"qepiy.php?id=$id&amp;ps=$ps&amp;bol=bal&amp;$ref\">Balini QePiY-e Deyis</a><br/>";
echo $ay;
echo "<a href=\"qepiy.php?id=$id&amp;ps=$ps&amp;bol=kontur&amp;$ref\">Konturla QePiY AlmaQ</a><br/>";

break;

case 'bal':

$file = @file("file/qepiy/exchange.dat");
        $number_1 = trim($file[0]);
		$number_2 = trim($file[1]);
		$number_3 = trim($file[2]);
		$number_4 = trim($file[3]);
		$number_5 = trim($file[4]);
		$number_6 = trim($file[5]);

$user = $row["user"];
$bal = $row["bal"];
$qepiy = $row["qepiy"];

echo "Siz burda Balansinizdaki Bali Negd Qepiye Cevire Bilersiniz.Hesabinizda <b>$bal</b> bal var.!<br/>----<br/>";
echo "<b>$number_1</b> bal <b>$number_2</b> Qepiy <a href=\"qepiy.php?bol=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "<b>$number_3</b> bal <b>$number_4</b> bala <a href=\"qepiy.php?bol=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
echo "<b>$number_5</b> bal <b>$number_6</b> bala <a href=\"qepiy.php?bol=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Deyi&#351;</a><br/>";
break;

case '1':
$file = @file("file/qepiy/exchange.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$qepiy =$row['qepiy'];
$bal =$row['bal'];
if($bal<$number_1){
echo "Sizin hesabinizda <b>$number_1</b> bal yoxdurki <b>$number_2</b> qepiy-e deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"qepiy.php?bol=bal&amp;id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";
}else{
mysql_query("UPDATE `users` SET `qepiy`= ".$qepiy." + '$number_2'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `bal`= ".$bal." - '$number_1'  WHERE `id` = '".$id."';");
echo "Hesabiniza <b>$number_2</b> qepiy elave olundu.Tebrikler...<br/>";
mysql_query ("Update `users` set `stat`='0.08'+`stat` where `id` ='".$id."';");

}
break;

case '2':
$file = @file("file/qepiy/exchange.dat");
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
$qepiy =$row['qepiy'];
$bal =$row['bal'];
if($bal<$number_3){
echo "Sizin hesabinizda <b>$number_3</b> bal yoxdurki <b>$number_4</b> Qepiy-e deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"qepiy.php?bol=bal&amp;id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";
}else{
mysql_query("UPDATE `users` SET `qepiy`= ".$qepiy." + '$number_4'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `bal`= ".$bal." - '$number_3'  WHERE `id` = '".$id."';");
echo "Hesabiniza <b>$number_4</b> qepiy elave olundu.Tebrikler...<br/>";
mysql_query ("Update `users` set `stat`='0.08'+`stat` where `id` ='".$id."';");
}
break;

case '3':
$file = @file("file/qepiy/exchange.dat");
$number_5 = trim($file[4]);
$number_6 = trim($file[5]);
$qepiy =$row['qepiy'];
$bal =$row['bal'];

if($bal<$number_5){
echo "Sizin hesabinizda <b>$number_5</b> bal yoxdurki <b>$number_6</b> qepiy-e deyi&#351;esiniz ((...<br/>";
echo $divide;
echo "<a href=\"qepiy.php?bol=bal&amp;id=$id&amp;ps=$ps&amp;amp;$ref\">Geri Qayit</a><br/>";

}else{
mysql_query("UPDATE `users` SET `qepiy`= ".$qepiy." + '$number_6'  WHERE `id` = '".$id."';");
mysql_query("UPDATE `users` SET `bal`= ".$bal." - '$number_5'  WHERE `id` = '".$id."';");

echo "Hesabiniza <b>$number_6</b> qepiy elave olundu.Tebrikler...<br/>";
mysql_query ("Update `users` set `stat`='0.08'+`stat` where `id` ='".$id."';");
}
break;



case "kontur";
$user = $row['user'];
 if(!isset($_POST['kontur']))
    {
        echo "<b>Kontur &#350;ifresi ile QePiY Y&#252;kle</b><br/>\n";
        echo "---<br/>";
        echo "Operator (se&#231;):<br/>\n";
        echo $fsize2;
        $nn=file("file/qepiy/kont.dat");
        $man1 = trim($nn[0]);
        $bal2 = trim($nn[1]);
        $man3 = trim($nn[2]);
        $bal4 = trim($nn[3]);
        $man5 = trim($nn[4]);
        $bal6 = trim($nn[5]);
        $man7 = trim($nn[6]);
        $bal8 = trim($nn[7]);
        $man9 = trim($nn[8]);
        $bal10 = trim($nn[9]);

        echo "<select name=\"op$ref\">";
        echo "<option value=\"Azercell\">Azercell</option>\n";
        echo "<option value=\"Bakcell\">Bakcell</option>\n";
        echo "<option value=\"Nar Mobile\">Nar Mobile</option>\n";
        echo "</select><br/>\n";
        echo $fsize1;
        echo "Qiymet (se&#231;):<br/>\n";
        echo $fsize2;
        echo "<select name=\"azn$ref\">";
        if($man1)echo "<option value=\"$man1\">$man1 AZN ($bal2 Azn)</option>\n";
        if($man3)echo "<option value=\"$man3\">$man3 AZN ($bal4 Azn)</option>\n";
        if($man5)echo "<option value=\"$man5\">$man5 AZN ($bal6 Azn)</option>\n";
        if($man7)echo "<option value=\"$man7\">$man7 AZN ($bal8 Azn)</option>\n";
        if($man9)echo "<option value=\"$man9\">$man9 AZN ($bal10 Azn)</option>\n";
        echo "</select><br/>\n";
        echo $fsize1;
        echo "Shifre:<br/>\n";
        echo $fsize2;
        echo "<input name=\"kontur$ref\" maxlength=\"14\" value=\"\" title=\"kontur\" emptyok=\"false\" format=\"*N\"/><br/>\n";
        echo $fsize1;
        echo "<anchor title=\"go\">Y&#252;kle<go href=\"qepiy.php?bol=kontur&amp;mod=5&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
        echo "<postfield name=\"kontur\" value=\"$(kontur$ref)\"/>\n";
        echo "<postfield name=\"op\" value=\"$(op$ref)\"/>\n";
        echo "<postfield name=\"azn\" value=\"$(azn$ref)\"/>\n";
        echo "</go></anchor><br/>\n";
        echo "----<br/>";
        echo "<u>Qeyd</u>: Hesabiniza ,<b>Qepiy</b> Yukleyerek Qepiy Xidmetlerinden Yararlana Ve Diger Istifadecilerden Ferqlene Bilersiniz.<br/>\n";
        }
        else
        {
        $error_message = array();
        if (!ctype_digit($azn)) {
        $error_message[] = 'Se&#231;diyiniz Qiymet d&#252;zg&#252;n deyil.';
        }

        if (!ctype_digit($kontur)) {
        $error_message[] = 'Kontur &#350;ifresi d&#252;zg&#252;n deyil.';
        }elseif (strlen($kontur)<='12' or strlen($kontur)>='15') {
        $error_message[] = 'Kontur &#350;ifresi d&#252;zg&#252;n deyil.';
        }

        if ($op!='Azercell' and $op!='Bakcell' and $op!='Nar Mobile') {
        $error_message[] = 'Se&#231;diyiniz Operator d&#252;zg&#252;n deyil.';
        }

        $error_message_count = count($error_message);
        if($error_message_count!='0'){
        echo '<b>Xeta:</b><br/>----<br/>';
        while(list($num,$num1) = each($error_message)) {
        echo '<b>'.($num+1).')</b> '.$num1.'<br/>';
        }
        echo '----<br/>';
        }else{

        $message = "Diqqet! <b>$user</b> niki Qepiy y&#252;kleyir. Operator: <b>$op</b> , <b>$azn</b> manat &#351;ifre: <b>$kontur</b>";

        mysql_query("Select readd from zapiski WHERE (who='".$user." kontur')and(idwho ='".$id."')and(message = '".$message."')and(towhom = 'ADMIN')and(idtowhom = '1')and(topic = 'Kontur Azn');")or die('error');
        if (mysql_affected_rows()==0){
        $data = date("H:i",mktime(date ("H")+$xsat));
        @mysql_query("Insert into zapiski set who ='$user kontur', idwho ='$id', message = '".$message."', towhom = 'ADMIN', idtowhom = '1', time = '".time()."', readd = '0', topic = 'Kontur Azn', date='".$data."'");
        }
        echo "&#350;ifre yoxlan&#305;l&#305;qdan sonra Qepiy hesab&#305;n&#305;za y&#252;klenecekdir.<br/><b>Diqqet</b>: Hesab&#305;n&#305;za azn y&#252;klenene qeder kontur kart&#305;n&#305; atmay&#305;n.<br/>\n";
        }
    }

break;

}
echo $ay;
echo "<a href=\"qepiy.php?id=$id&amp;ps=$ps&amp;amp;$ref\">QePiY Exchange</a><br/>";

echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;amp;$ref\">Dehliz</a>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>