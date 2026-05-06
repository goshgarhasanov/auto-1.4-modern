<?php
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$user = $row['user'];
$level = $row['level'];
if ( $row['level'] < 8 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"error\" title=\"error\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Daxil Olma Icazeniz Yoxdur!\n";
echo $fsize1;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card title=\"Mesaj Panel\">\n";
echo "<p align=\"left\">\n";
//break;

switch ( $bolme )
{


default :
echo $fsize1;
echo "<b>Mesaj Paneli</b><br/>";
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=index&amp;ref={$ref}\">Indexe Mesaj</a>(ba&#351;l&#305;qa)<br/>\n";
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=index1&amp;ref={$ref}\">Indexe Mesaj</a>(logonun alt&#305;na)<br/>\n";
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=link&amp;ref={$ref}\">Indexe link</a>(logolar&#305;n alt&#305;na)<br/>\n";
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=dehliz&amp;ref={$ref}\">Dehlize Mesaj</a><br/>\n";
echo $divide;
echo "*<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=reytinq&amp;ref={$ref}\">Top reytinq</a><br/>\n";
echo $divide;
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=mektub&amp;ref={$ref}\">&#304;stifade&#231;ilere mesaj</a>(Mektubla)<br/>\n";
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=mesaj&amp;ref={$ref}\">&#304;stifade&#231;ilere mesaj</a>(Metnle)<br/>\n";
echo $fsize2;
break;
//}
case "index" :

$file = file( "file/log/1.dat" );
if ( !isset( $_POST['action'] ) )
{
echo $fsize1;
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj &#231;at&#305;n giri&#351;inde (index-de) lap yuxar&#305; hissesinde g&#246;r&#252;necek.<br/>";
echo $fsize2;
$logo = trim( $file[0] );
$message = trim( $file[1] );
$test1 = trim( $file[2] );
$test2 = trim( $file[3] );
echo $fsize1;
echo "&#350;ekil:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo{$ref}\" maxlength=\"200\" value=\"http://{$logo}\"/><br/>\n";
echo $fsize1;
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"message{$ref}\" maxlength=\"90000\" value=\"{$message}\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=index&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo{$ref})\"/>\n";
echo "<postfield name=\"message\" value=\"$(message{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$logo = trim( htmlspecialchars( $_POST['logo'] ) );
$logo = str_replace( "\$", "$\$", $logo );
$logo = str_replace( "http://", "", $logo );
$message = trim( htmlspecialchars( $_POST['message'] ) );
$message = str_replace( "\$", "$\$", $message );
$logo = str_replace( "\r\n", "", $logo );
$logo = str_replace( "\n", "", $logo );
$message = str_replace( "\r\n", "", $message );
$message = str_replace( "\n", "", $message );
$test1 = trim( $file[2] );
$test2 = trim( $file[3] );
$file = fopen( "file/log/1.dat", "w" );
$data .= "{$logo}\n";
$data .= "{$message}";
$data .= "{$test1}";
$data .= "{$test2}";
fwrite( $file, $data );
fclose( $file );
echo $fsize1;
echo "H&#246;rmetli <b>{$user}</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
echo $fsize2;
}
break;

case "link" :
if ( !isset( $_POST['action'] ) )
{
echo $fsize1;
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z linkler ve ya link &#231;at&#305;n giri&#351;inde (index-de) logolar&#305;n alt&#305;na g&#246;r&#252;necek.<br/>";
echo "<b>Qayda</b>: Link yaz&#305;lan yerlere linki, Ad&#305; yaz&#305;lan yerlere ise linkin ad&#305;n&#305; yaz&#305;n.<br/>";
echo "<u>Numune</u>: link1=http://{$site} | Ad&#305;=Super Sayt<br/>";
echo $divide;
echo $fsize2;
$file = file( "file/log/2.dat" );
$link1 = trim( $file[0] );
$link2 = trim( $file[1] );
$link3 = trim( $file[2] );
$link4 = trim( $file[3] );
$link5 = trim( $file[4] );
$link6 = trim( $file[5] );
$link7 = trim( $file[6] );
$link8 = trim( $file[7] );
echo $fsize1;
echo "<b>1</b>) Link:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link1{$ref}\" maxlength=\"200\" value=\"http://{$link1}\"/> | \n";
echo $fsize1;
echo "Ad&#305;:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link2{$ref}\" maxlength=\"50\" value=\"{$link2}\"/><br/>\n";
echo $fsize1;
echo "<b>2</b>) Link:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link3{$ref}\" maxlength=\"200\" value=\"http://{$link3}\"/> | \n";
echo $fsize1;
echo "Ad&#305;:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link4{$ref}\" maxlength=\"50\" value=\"{$link4}\"/><br/>\n";
echo $fsize1;
echo "<b>3</b>) Link:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link5{$ref}\" maxlength=\"200\" value=\"http://{$link5}\"/> | \n";
echo $fsize1;
echo "Ad&#305;:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link6{$ref}\" maxlength=\"50\" value=\"{$link6}\"/><br/>\n";
echo $fsize1;
echo "<b>4</b>) Link:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link7{$ref}\" maxlength=\"200\" value=\"http://{$link7}\"/> | \n";
echo $fsize1;
echo "Ad&#305;:\n";
echo $fsize2;
echo "<input type=\"text\" name=\"link8{$ref}\" maxlength=\"50\" value=\"{$link8}\"/><br/>\n";
echo $fsize1;
echo $divide;
echo "[<anchor>Ealve Et<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=link&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"link1\" value=\"$(link1{$ref})\"/>\n";
echo "<postfield name=\"link2\" value=\"$(link2{$ref})\"/>\n";
echo "<postfield name=\"link3\" value=\"$(link3{$ref})\"/>\n";
echo "<postfield name=\"link4\" value=\"$(link4{$ref})\"/>\n";
echo "<postfield name=\"link5\" value=\"$(link5{$ref})\"/>\n";
echo "<postfield name=\"link6\" value=\"$(link6{$ref})\"/>\n";
echo "<postfield name=\"link7\" value=\"$(link7{$ref})\"/>\n";
echo "<postfield name=\"link8\" value=\"$(link8{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$link1 = trim( htmlspecialchars( $_POST['link1'] ) );
$link1 = str_replace( "\$", "$\$", $link1 );
$link1 = str_replace( "http://", "", $link1 );
$link1 = str_replace( "\r\n", "", $link1 );
$link1 = str_replace( "\n", "", $link1 );
$link2 = trim( htmlspecialchars( $_POST['link2'] ) );
$link2 = str_replace( "\$", "$\$", $link2 );
$link2 = str_replace( "http://", "", $link2 );
$link2 = str_replace( "\r\n", "", $link2 );
$link2 = str_replace( "\n", "", $link2 );
$link3 = trim( htmlspecialchars( $_POST['link3'] ) );
$link3 = str_replace( "\$", "$\$", $link3 );
$link3 = str_replace( "http://", "", $link3 );
$link3 = str_replace( "\r\n", "", $link3 );
$link3 = str_replace( "\n", "", $link3 );
$link4 = trim( htmlspecialchars( $_POST['link4'] ) );
$link4 = str_replace( "\$", "$\$", $link4 );
$link4 = str_replace( "http://", "", $link4 );
$link4 = str_replace( "\r\n", "", $link4 );
$link4 = str_replace( "\n", "", $link4 );
$link5 = trim( htmlspecialchars( $_POST['link5'] ) );
$link5 = str_replace( "\$", "$\$", $link5 );
$link5 = str_replace( "http://", "", $link5 );
$link5 = str_replace( "\r\n", "", $link5 );
$link5 = str_replace( "\n", "", $link5 );
$link6 = trim( htmlspecialchars( $_POST['link6'] ) );
$link6 = str_replace( "\$", "$\$", $link6 );
$link6 = str_replace( "http://", "", $link6 );
$link6 = str_replace( "\r\n", "", $link6 );
$link6 = str_replace( "\n", "", $link6 );
$link7 = trim( htmlspecialchars( $_POST['link7'] ) );
$link7 = str_replace( "\$", "$\$", $link7 );
$link7 = str_replace( "http://", "", $link7 );
$link7 = str_replace( "\r\n", "", $link7 );
$link7 = str_replace( "\n", "", $link7 );
$link8 = trim( htmlspecialchars( $_POST['link8'] ) );
$link8 = str_replace( "\$", "$\$", $link8 );
$link8 = str_replace( "http://", "", $link8 );
$link8 = str_replace( "\r\n", "", $link8 );
$link8 = str_replace( "\n", "", $link8 );
$file = fopen( "file/log/2.dat", "w" );
$data .= "{$link1}\n";
$data .= "{$link2}\n";
$data .= "{$link3}\n";
$data .= "{$link4}\n";
$data .= "{$link5}\n";
$data .= "{$link6}\n";
$data .= "{$link7}\n";
$data .= "{$link8}";
fwrite( $file, $data );
fclose( $file );
echo $fsize1;
echo "H&#246;rmetli <b>{$user}</b>, Qeyd etdiyiniz linkler Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
echo $fsize2;
}
break;

case "index1" :

$file = file( "file/log/1.dat");
if ( !isset( $_POST['action'] ) ){
echo $fsize1;
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj &#231;at&#305;n giri&#351;inde (index-de) &#231;at&#305;n logo &#351;ekilinin alt&#305;nda g&#246;r&#252;necek.<br/>";
echo $fsize2;
$logo = trim( $file[2] );
$message = trim( $file[3] );
echo $fsize1;
echo "&#350;ekil:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo{$ref}\" maxlength=\"200\" value=\"http://{$logo}\"/><br/>\n";
echo $fsize1;
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"message{$ref}\" maxlength=\"90000\" value=\"{$message}\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=index1&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo{$ref})\"/>\n";
echo "<postfield name=\"message\" value=\"$(message{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;

}else{

$logo = trim( htmlspecialchars( $_POST['logo'] ) );
$logo = str_replace( "\$", "$\$", $logo );
$logo = str_replace( "http://", "", $logo );
$message = trim( htmlspecialchars( $_POST['message'] ) );
$message = str_replace( "\$", "$\$", $message );
$logo = str_replace( "\r\n", "", $logo );
$logo = str_replace( "\n", "", $logo );
$message = str_replace( "\r\n", "", $message );
$message = str_replace( "\n", "", $message );
$test1 = trim( $file[0] );
$test2 = trim( $file[1] );
$file = fopen( "file/log/1.dat", "w" );
$data .= "{$test1}\n";
$data .= "{$test2}\n";
$data .= "{$logo}\n";
$data .= "{$message}";
fwrite( $file, $data );
fclose( $file );
echo $fsize1;
echo "H&#246;rmetli <b>{$user}</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
echo $fsize2;
}
break;



case "reytinq" :
$file = file( "file/log/1.dat" );
if ( !isset( $_POST['action'] ) )
{
echo $fsize1;
echo "<b>Qeyd</b>: Yerle&#351;direceyiniz reytinq &#231;at&#305;n giri&#351;inde (index-de) en a&#351;a&#287;&#305;s&#305;nda g&#246;r&#252;necek.<br/>";
echo $fsize2;
$reyt1 = trim( $file[4] );
$reyt2 = trim( $file[5] );
$reyt1 = trim( htmlspecialchars( $reyt1 ) );
$reyt2 = trim( htmlspecialchars( $reyt2 ) );
echo $fsize1;
echo "Reytinq linki 1:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"reyt1{$ref}\" maxlength=\"200\" value=\"{$reyt1}\"/><br/>\n";
echo $fsize1;
echo "Reytinq linki 2:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"reyt2{$ref}\" maxlength=\"200\" value=\"{$reyt2}\"/><br/>\n";
echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=reytinq&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"reyt1\" value=\"$(reyt1{$ref})\"/>\n";
echo "<postfield name=\"reyt2\" value=\"$(reyt2{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$reyt1 = trim( htmlspecialchars( $_POST['reyt1'] ) );
$reyt2 = trim( htmlspecialchars( $_POST['reyt2'] ) );
$reyt1 = str_replace( "\\", "", $reyt1 );
$reyt1 = str_replace( "&quot;", "\"", $reyt1 );
$reyt1 = str_replace( "&gt;", ">", $reyt1 );
$reyt1 = str_replace( "&lt;", "<", $reyt1 );
$reyt2 = str_replace( "\\", "", $reyt2 );
$reyt2 = str_replace( "&quot;", "\"", $reyt2 );
$reyt2 = str_replace( "&gt;", ">", $reyt2 );
$reyt2 = str_replace( "&lt;", "<", $reyt2 );
$test1 = trim( $file[0] );
$test2 = trim( $file[1] );
$test3 = trim( $file[2] );
$test4 = trim( $file[3] );
$file = fopen( "file/log/1.dat", "w" );
$data .= "{$test1}\n";
$data .= "{$test2}\n";
$data .= "{$test3}\n";
$data .= "{$test4}\n";
$data .= "{$reyt1}\n";
$data .= "{$reyt2}";
fwrite( $file, $data );
fclose( $file );
echo $fsize1;
echo "H&#246;rmetli <b>{$user}</b>, Sizin qeydiniz Indexe elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
echo $fsize2;
}
break;
case "mektub" :
if ( !isset( $_POST['action'] ) )
{
$qizlar = mysql_query( "SELECT * FROM users where sex = '1' " );
$qiz = mysql_affected_rows( );
$oglanlar = mysql_query( "SELECT * FROM users where sex = '0' " );
$oglan = mysql_affected_rows( );
$cem = $qiz + $oglan;
echo $fsize1;
print "<u>&#304;stifade&#231;ilerin say&#305;</u>: <b>".$cem."</b><br/>";
print "O&#287;lanlar: <b>".$oglan."</b><br/>";
print "Q&#305;zlar: <b>".$qiz."</b><br/>";
echo $divide;
echo "Yazd&#305;q&#305;n&#305;z mektub b&#252;t&#252;n R&#252;tbelilere g&#246;nderilecek.<br/>\n";
echo $divide;
print "M&#246;vzu:<br/>";
echo $fsize2;
echo "<input name=\"topic{$ref}\" type=\"text\"/><br/>";
echo "Metn:<br/>";
echo "<input name=\"msg{$ref}\" type=\"text\"/><br/>";
echo $fsize1;
echo "\r\n<anchor title=\"next\">G&#246;nder\r\n<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=mektub&amp;ref={$ref}\" method=\"post\">\r\n<postfield name=\"msg\" value=\"$(msg{$ref})\"/>\r\n<postfield name=\"topic\" value=\"$(topic{$ref})\"/>\r\n<postfield name=\"action\" value=\"save\"/>\r\n</go></anchor><br />";
echo $fsize2;
break;
}
$select = mysql_query( "SELECT * FROM users where level > '3'" );
while ( $allu = mysql_fetch_array( $select ) )
{
$msg = trim( htmlspecialchars( stripslashes( $msg ) ) );
$topic = trim( htmlspecialchars( stripslashes( $topic ) ) );
$kol = rand( 0, 99999999 );
$dataspamm = date( "d-M-Y [H:i]" );
$timespamm = time( ) + $vaxt;
mysql_query( "insert into zapiski values(0,'".$user."','".$id."','".$msg."','".$allu['user']."','".$allu['id']."','".$timespamm."','0','".$topic."','".$dataspamm."','1','1');" );
}
echo $fsize1;
print "Sizin mesaj&#305;n&#305;z b&#252;t&#252;n <b>R&#252;tbeli &#350;exslere</b>, Mektub vesitesi ile g&#246;nderildi!<br/>";
echo $fsize2;
break;
case "mesaj" :
if ( !isset( $_POST['action'] ) )
{
$file = file( "file/dat_folder/mesaj.dat" );
$qara = trim( $file[0] );
$kursiv = trim( $file[1] );
$logo = trim( $file[2] );
$message = trim( $file[3] );
echo $fsize1;
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj istifade&#231;ilerin ekran&#305;na &#231;&#305;xacaq!<br/>----<br/>";
echo $fsize2;
echo $fsize1;
echo "Qara Heriflerle:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"qara{$ref}\" maxlength=\"200\" value=\"{$qara}\"/><br/>\n";
echo $fsize1;
echo "Kursiv:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"kursiv{$ref}\" maxlength=\"200\" value=\"{$kursiv}\"/><br/>\n";
echo $fsize1;
echo "&#350;ekil:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo{$ref}\" maxlength=\"200\" value=\"http://{$logo}\"/><br/>\n";
echo $fsize1;
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"message{$ref}\" maxlength=\"90000\" value=\"{$message}\"/><br/>\n";
echo $fsize1;
echo "Kimlere?<br/>\n";
echo $fsize2;
echo "<select name=\"alici{$ref}\">\n";
echo "<option value=\"0\">Q&#305;zlara </option>\n";
echo "<option value=\"1\">O&#287;lanlara</option>\n";
echo "<option value=\"2\">Herkese</option>\n";
echo "<option value=\"3\">R&#252;tbelilere</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "<anchor>[G&#246;nder]<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=mesaj&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"qara\" value=\"$(qara{$ref})\"/>\n";
echo "<postfield name=\"kursiv\" value=\"$(kursiv{$ref})\"/>\n";
echo "<postfield name=\"logo\" value=\"$(logo{$ref})\"/>\n";
echo "<postfield name=\"message\" value=\"$(message{$ref})\"/>\n";
echo "<postfield name=\"alici\" value=\"$(alici{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor><br/>\n";
echo $fsize2;
}
else
{
$qara = str_replace( "\$", "$\$", $qara );
$kursiv = str_replace( "\$", "$\$", $kursiv );
$logo = str_replace( "\$", "$\$", $logo );
$logo = str_replace( "http://", "", $logo );
$message = str_replace( "\$", "$\$", $message );
$qara = str_replace( "\r\n", "", $qara );
$qara = str_replace( "\n", "", $qara );
$kursiv = str_replace( "\r\n", "", $kursiv );
$kursiv = str_replace( "\n", "", $kursiv );
$logo = str_replace( "\r\n", "", $logo );
$logo = str_replace( "\n", "", $logo );
$message = str_replace( "\r\n", "", $message );
$message = str_replace( "\n", "", $message );
include( "./file/require/sh_file" );
$message = narmobil( $message );
$kursiv = narmobil( $kursiv );
$qara = narmobil( $qara );
$file = fopen( "file/dat_folder/mesaj.dat", "w" );
$data .= "{$qara}\n";
$data .= "{$kursiv}\n";
$data .= "{$logo}\n";
$data .= "{$message}";
fwrite( $file, $data );
fclose( $file );
if ( $alici == "0" )
{
echo $fsize1;
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n Xan&#305;mlara g&#246;nderildi!<br/>\n";
echo $fsize2;
@mysql_query( "update users set con = 1 where sex = 1 " );
}
else if ( $alici == "1" )
{
echo $fsize1;
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n O&#287;lanlara g&#246;nderildi!<br/>\n";
echo $fsize2;
@mysql_query( "update users set con = 1 where sex = 0 " );
}
else if ( $alici == "2" )
{
echo $fsize1;
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n istifade&#231;ilere g&#246;nderildi!<br/>\n";
echo $fsize2;
@mysql_query( "update users set con = 1" );
}
else if ( $alici == "3" )
{
echo $fsize1;
echo "Yazdi&#287;&#305;n&#305;z mesaj b&#252;t&#252;n r&#252;tbelilere g&#246;nderildi!<br/>\n";
echo $fsize2;
@mysql_query( "update users set con = 1 where level >= 4" );
}
}
break;
case "dehliz" :
if ( !isset( $_POST['action'] ) )
{
echo $fsize1;
echo "<b>Qeyd</b>: Yazacaq&#305;n&#305;z mesaj Dehlizde ac&#305;q formada g&#246;r&#252;necek.<br/>";
echo $fsize2;
$file = file( "file/dat_folder/enter.dat" );
$logo = trim( $file[0] );
$mesaj = trim( $file[1] );
$message = trim( $file[2] );
$mesaj = str_replace( "<u>", "", $mesaj );
$mesaj = str_replace( "</u>", "", $mesaj );
$mesaj = str_replace( "<i>", "", $mesaj );
$mesaj = str_replace( "</i>", "", $mesaj );
$mesaj = str_replace( "<b>", "", $mesaj );
$mesaj = str_replace( "</b>", "", $mesaj );
$mesaj = str_replace( "<big>", "", $mesaj );
$mesaj = str_replace( "</big>", "", $mesaj );
$message = str_replace( "<u>", "", $message );
$message = str_replace( "</u>", "", $message );
$message = str_replace( "<i>", "", $message );
$message = str_replace( "</i>", "", $message );
$message = str_replace( "<b>", "", $message );
$message = str_replace( "</b>", "", $message );
$message = str_replace( "<big>", "", $message );
$message = str_replace( "</big>", "", $message );
echo $fsize1;
echo "&#350;ekil:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"logo{$ref}\" maxlength=\"200\" value=\"http://{$logo}\"/><br/>\n";
echo $fsize1;
echo "Ba&#351;l&#305;q:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"mesaj{$ref}\" maxlength=\"200\" value=\"{$mesaj}\"/>\n";
echo "<select name=\"nov{$ref}\">\n";
echo "<option value=\"0\">normal</option>\n";
echo "<option value=\"1\">Kursiv</option>\n";
echo "<option value=\"2\">Alt&#305; xetli</option>\n";
echo "<option value=\"3\">Qal&#305;n</option>\n";
echo "<option value=\"4\">B&#246;y&#252;k Qal&#305;n</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Mesaj:<br/>\n";
echo $fsize2;
echo "<input type=\"text\" name=\"message{$ref}\" maxlength=\"90000\" value=\"{$message}\"/>\n";
echo "<select name=\"novv{$ref}\">\n";
echo "<option value=\"0\">normal</option>\n";
echo "<option value=\"1\">Kursiv</option>\n";
echo "<option value=\"2\">Alt&#305; xetli</option>\n";
echo "<option value=\"3\">Qal&#305;n</option>\n";
echo "<option value=\"4\">B&#246;y&#252;k Qal&#305;n</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "[<anchor>Ealve Et<go href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;bolme=dehliz&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"logo\" value=\"$(logo{$ref})\"/>\n";
echo "<postfield name=\"mesaj\" value=\"$(mesaj{$ref})\"/>\n";
echo "<postfield name=\"message\" value=\"$(message{$ref})\"/>\n";
echo "<postfield name=\"s\" value=\"$(nov{$ref})\"/>\n";
echo "<postfield name=\"v\" value=\"$(novv{$ref})\"/>\n";
echo "<postfield name=\"action\" value=\"save\"/>\n";
echo "</go></anchor>]<br/>\n";
echo $fsize2;
}
else
{
$logo = str_replace( "http://", "", $logo );
include( "./file/require/sh_file" );
$mesaj = narmobil( $mesaj );
$message = narmobil( $message );
$logo = narmobil( $logo );
if ( $s == 1 )
{
$shr1 = "<i>";
$shr2 = "</i>";
}
else if ( $s == 2 )
{
$shr1 = "<u>";
$shr2 = "</u>";
}
else if ( $s == 3 )
{
$shr1 = "<b>";
$shr2 = "</b>";
}
else if ( $s == 4 )
{
$shr1 = "<b><big>";
$shr2 = "</big></b>";
}
if ( $v == 1 )
{
$shr3 = "<i>";
$shr4 = "</i>";
}
else if ( $v == 2 )
{
$shr3 = "<u>";
$shr4 = "</u>";
}
else if ( $v == 3 )
{
$shr3 = "<b>";
$shr4 = "</b>";
}
else if ( $v == 4 )
{
$shr3 = "<b><big>";
$shr4 = "</big></b>";
}
$file = file( "file/dat_folder/enter.dat" );
$test1 = trim( $file[3] );
$test2 = trim( $file[4] );
$test3 = trim( $file[5] );
$test4 = trim( $file[6] );
$ffoto = trim( $file[7] );
$fusid = trim( $file[8] );
$fuser = trim( $file[9] );
$qeyd = trim( $file[10] );
$ftimer = trim( $file[11] );
$file = fopen( "file/dat_folder/enter.dat", "w" );
$data .= "{$logo}\n";
$data .= "{$shr1}{$mesaj}{$shr2}\n";
$data .= "{$shr3}{$message}{$shr4}\n";
$data .= "{$test1}\n";
$data .= "{$test2}\n";
$data .= "{$test3}\n";
$data .= "{$test4}\n";
$data .= "{$ffoto}\n";
$data .= "{$fusid}\n";
$data .= "{$fuser}\n";
$data .= "{$qeyd}\n";
$data .= "{$ftimer}";
fwrite( $file, $data );
fclose( $file );
echo $fsize1;
echo "H&#246;rmetli <b>{$user}</b>, Sizin qeydiniz dehlize elave edildi!<br/>Te&#351;ekk&#252;rler...<br/>";
echo $fsize2;
}
break;

}

echo $fsize1;
echo $divide;
if ( $bolme )
{
echo "<a href=\"mesajes.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Mesaj Paneli</a><br/>\n";
}
else
{
echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">-Admin Panel-</a><br/>\n";
}
echo $fsize2;
echo "</p></card></wml>";
?>
