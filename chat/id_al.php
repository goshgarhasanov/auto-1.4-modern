<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$us=$row["user"];




$file = file("file/dat_folder/rutbe1.dat");
$l8 = trim($file[0]);
$l7 = trim($file[1]);
$l6 = trim($file[2]);
$l5 = trim($file[3]);
$l4 = trim($file[4]);
$number = trim($file[5]);
$active = trim($file[6]);



$adamlar = @mysql_query ("SELECT * FROM conf where acar ='1';");
$mp = mysql_fetch_array ($adamlar);
$son=$mp["son"];
$qiz=$mp["qadin"];
$user = $row['user'];
$kisi=$mp["kisi"];
$max=$mp["max"];
$tarix=$mp["tarix"];
if($time!=""){
$tm = time()-(60*$time)+$vaxt;
$max = 9999999999;
}
else
$tm = time();

$q = mysql_query("SELECT COUNT(room) FROM `users` WHERE `time` > '".$tm."';");
$onlayn = mysql_result($q, 0);
ob_start( );
switch ( $bolme )
{
default:
$_v->title("Zerkalni Id aL", "left");
$_v->fsize1($fsize1);
echo "<b>Q&#305;z&#305;l ID N&#246;mreleri:</b><br/>";
echo "&#304;stediyiniz Q&#305;z&#305;l ID N&#246;mresi $l8 AZN<br/>";
echo "N&#252;mune: 22, 33, 333, 444 ve s.<br/>";
echo "---<br/>";
echo "<b>G&#252;m&#252;&#351; ID N&#246;mreleri:</b><br/>";
echo "&#304;stediyiniz G&#252;m&#252;&#351; ID N&#246;mresi $l7 AZN<br/>";
echo "N&#252;mune: 1525, 2535 ve s.<br/>";
echo "---<br/>";
echo "<b>G&#252;zg&#252; ID N&#246;mreleri:</b><br/>";
echo "&#304;stediyiniz G&#252;zg&#252; ID N&#246;mresi $l6 AZN<br/>";
echo "N&#252;mune: 5050, 1515, 3131 ve s.<br/>";
echo "---<br/>";
echo "<b>Sonu 00 ile biten ID N&#246;mreleri:</b><br/>";
echo "&#304;stediyiniz sonu 00 ile biten ID N&#246;mresi $l5 AZN<br/>";
echo "N&#252;mune: 100, 200, 300 ve s.<br/>";
echo "---<br/>";

echo "Burda olmayan, &#246;z&#252;n&#252;z&#252;n u&#287;ur n&#246;mresini, her hans&#305; xo&#351;unuza gelen n&#246;mreni ID n&#246;mresi ede bilersiniz - $l4 AZN<br/>";
echo "---<br/>";

echo "<b>&#214;deni&#351;</b>: Po&#231;t,Bank,Na&#287;d ve s. &#252;sullarla sifari&#351; etmek m&#252;mk&#252;nd&#252;r.<br/>\n";
echo "<b>Mob</b>: <a href=\"wtai://wp/mc;".$number."\">".$number."</a><br/>\n";
echo "Xahi&#351; edirik ba&#351;qa meselelere g&#246;re narahat etmiyin!<br/>\n";
break;

}
echo "----<br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);


?>