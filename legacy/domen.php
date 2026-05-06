<?php
require("inc.php"); 

$link = connect_db();



if($ps!=""){

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 

$zad="id=$id&amp;ps=$ps&amp;";

}else{

$zad="";

}



$adm = @mysql_query ("Select user from users where id='1' LIMIT 1;");

$z = @mysql_fetch_array ($adm);

$eliko = $z["user"];



$dfghdfgdf = file("file/dat_folder/domen.dat");

$vcxvcvc0 = trim($dfghdfgdf [0]);

$vcxvcvc1 = trim($dfghdfgdf [1]);

$vcxvcvc2 = trim($dfghdfgdf [2]);

$vcxvcvc3 = trim($dfghdfgdf [3]);

$vcxvcvc4 = trim($dfghdfgdf [4]);



$satir = file("file/dat_folder/domenler.dat");

$domen0 = trim($satir [0]);

$domen1 = trim($satir [1]);

$domen2 = trim($satir [2]);

$domen3 = trim($satir [3]);

$domen4 = trim($satir [4]);

$domen5 = trim($satir [5]);

$domen6 = trim($satir [6]);

$domen7 = trim($satir [7]);

$domen8 = trim($satir [8]);

$domen9 = trim($satir [9]);

$domen10 = trim($satir [10]);

$domen11 = trim($satir [11]);

$domen12 = trim($satir [12]);

$domen13 = trim($satir [13]);

$domen14 = trim($satir [14]);

$domen15 = trim($satir [15]);

$domen16 = trim($satir [16]);

$domen17 = trim($satir [17]);

$domen18 = trim($satir [18]);

$domen19 = trim($satir [19]);

$say = count($satir);



$_v->title($vcxvcvc0,'left');

$_v->fsize1($fsize1);



if($say=="0" or $vcxvcvc4=="3" or $vcxvcvc0=="" or $vcxvcvc0=="x"){

header("Location: index.php?"); die;

}else{

echo "<b>Bu Mekan Azerbaycanda N=1-dir. <br/>Daha $say Sayt Bizim Chata Birle&#351;ib.</b><br/>";

//if($vcxvcvc1 != "" and $vcxvcvc1!="x")echo "<b>Saytin Butun Domenlerle Birge Son Sati&#351; Qiymeti: 2000 AZN</b><br/>";

//echo "<b>Domenlerimizin Siyah&#305;s&#305;:</b> ";

//if($vcxvcvc1 != "" and $vcxvcvc1!="x")echo "<b>(Qiymetler Endirildi)</b>";

echo "<br/><b>****</b><br/>";

for($i=0;$i<$say;$i++){

$m = $i+1;

echo "<b>$m)</b>$satir[$i]<br/>";

}}

echo "<b>****</b><br/>";

echo "<span style=\"color:blue\">Diqqet:</span> <b>Bunu unutmayin ki her bir domeni butun sayt taniyir!</b><br/>";

if($vcxvcvc1 != "" and $vcxvcvc1!="x"){

if($vcxvcvc2 != "" and $vcxvcvc2!="x")echo "<span style=\"color:blue\">&#214;deni&#351; &#220;sullar&#305;:</span> <b>$vcxvcvc2</b><br/>";

if($vcxvcvc3 != "" and $vcxvcvc3!="x") {

echo "<span style=\"color:blue\">Tel:</span> <b><a href=\"wtai://wp/mc;".$vcxvcvc3."\">".$vcxvcvc3."</a></b><br/>";

}

if($zad!=""){

echo "<b><a href=\"info.php?".$zad."nk=1&amp;ref=$ref\">$eliko</a> Nickine Yazin.</b><br/>";

}else {

echo "<b>Chatda <a href=\"reghelp.php?".$zad."ref=$ref\">Qeyd Ol</a>-un, $eliko Nickine Yazin.</b><br/>";

}}

$_v->divide();

if($zad!=""){

echo "&#xbb; <a href=\"on.php?".$zad."ref=$ref\">Online Mesaj</a><br/>";

echo "&#xbb; <a href=\"enter.php?".$zad."ref=$ref\">Dehliz</a><br/>";

}else {

echo "<a href=\"index.php?".$zad."ref=$ref\">[$site]</a><br/>";

}

$_v->fsize2($fsize2);

$_v->end('1',$link);

?>