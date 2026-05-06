<?php
require("inc.php");
$link = connect_db();


$file = @file("file/dat_folder/n_n/elaqe.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
$number_5 = trim($file[4]);
$number_6 = trim($file[5]);
$number_7 = trim($file[6]);
$number_8 = trim($file[7]);
$number_9 = trim($file[8]);


if(isset($id)){
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);



$_v->title('Adminle Elaqe');
$_v->fsize1($fsize1);





if ($number_1 != 'x'){echo "&#xbb; Ad&#305;: <b>$number_1</b><br/>\n";
echo "<br/>";}
if ($number_2 != 'x'){echo "&#xbb; Soyad&#305;: <b>$number_2</b><br/>\n";
echo "<br/>";}
if ($number_3 != 'x'){echo "&#xbb; Tel(1): <b>$number_3</b><br/>\n";
echo "<br/>";}
if ($number_4 != 'x'){echo "&#xbb; Tel(2): <b>$number_4</b><br/>\n";
echo "<br/>";}
if ($number_5 != 'x'){echo "&#xbb; Tel(3): <b>$number_5</b><br/>\n";
echo "<br/>";}
if ($number_6 != 'x'){echo "&#xbb; Mail: <b>$number_6</b><br/>\n";
echo "<br/>";}
if ($number_7 != 'x'){echo "&#xbb; Agent: <b>$number_7</b>\n";

echo "<br/>";}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";


}else{

$_v->title('Adminle Elaqe');
$_v->fsize1($fsize1);



echo "<br/>";
if ($number_1 != 'x'){echo "&#xbb; Ad&#305;: <b>$number_1</b><br/><br/>\n";}

if ($number_2 != 'x'){echo "&#xbb; Soyad&#305;: <b>$number_2</b><br/><br/>\n";}

if ($number_3 != 'x'){echo "&#xbb; Tel(1): <b>$number_3</b><br/><br/>\n";}

if ($number_4 != 'x'){echo "&#xbb; Tel(2): <b>$number_4</b><br/><br/>\n";}

if ($number_5 != 'x'){echo "&#xbb; Tel(3): <b>$number_5</b><br/><br/>\n";}
if ($number_6 != 'x'){echo "&#xbb; Mail: <b>$number_6</b><br/><br/>\n";}

if ($number_7 != 'x'){echo "&#xbb; Agent: <b>$number_7</b><br/><br/>\n";}


echo "<a href=\"index.php?ref=$ref\">Ana Sehife</a><br/>";

}



$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>