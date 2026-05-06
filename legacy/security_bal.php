<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,) = check_login($link);
ob_start();




$_v->title('2 ci Parol Al ','left');
$_v->fsize1($fsize1);

$login=$row["id"];
$user = $row["user"];
$bal = $row["bal"];
$rpos = file("file/dat_folder/parol_buga.dat");
$bal1 = trim($rpos[0]);
$parol = trim($rpos[1]);
$cixilan = $bal1;
if ($parol == 1) {


switch($act){
default:



echo "Siz burdan 2 ci Parol alaraq Nikinizi 2 Qat Parollu Tam Tehlukesiz Ede Bilersiniz! <br/>";
    $_v->divide();
    



echo "Hesab&#305;n&#305;zda (<b>".$bal."</b>) bal var.<br/>";
echo "----<br/>";



if(is_numeric($login)){
$axtar = mysql_query("SELECT * FROM users WHERE id='".$login."'");
}

if(mysql_num_rows($axtar)==0){
echo "Bele Bir istifadeci Movcud deyil.<br/>";
}else{
$assassin = mysql_fetch_object($axtar);
echo "Leqeb: <b>".$assassin->user."</b> <br/>----<br/>";


if(!isset($sc_pass[$assassin->id])){
echo "Bu &#304;stifade&#231;i &#252;&#231;&#252;n &#304;kinci Parol Yarad&#305;ls&#305;n ?<br/>";
echo "
<a href=\"security_bal.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;rid=".$assassin->id."&amp;act=mr_assassin\">Beli</a> 
/ <a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a><br/>";
echo "----<br/>";

        echo "<b>Qeyd:</b>  xidmetin deyeri <b>$cixilan</b> bald&#305;r!..<br/>";

}else{
echo "Siz Artiq 2 ci parol almisiz.[ <a href=\"security_bal.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=sil&amp;g=".$assassin->id."\">Levg et</a> ]<br/>";
}
}

break;


case 'mr_assassin':
if ($bal < $cixilan) {
        echo "<b>Diqqet!</b><br/>";
        $_v->divide();
        echo "Hesab&#305;n&#305;zda kifayet qeder bal yoxdur.<br/>";
    } else {

if(!isset($add)){
$sel = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
if(mysql_affected_rows()<=0){
echo "Bele bir istifadei movcud deyil<br/>";
}else{
$us = mysql_fetch_object($sel);
echo "Yeni Parol Yarat<br/>----<br/>";

$_v->action("security_bal.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;act=mr_assassin&amp;add=go&amp;rid=".$us->id);
print $_v->input("Parol: <input type=\"text\" name=\"pass{$ref}\"/>")."<br/>";
print $_v->submit('Yarat');

}

}else{
    
if (empty($pass)){
echo "Parol yaz&#305lmayib;.<br/>";
}else{
    
    
$save = "<?PHP //user: secrety pass \r\n";
$save .= "\$sc_pass = array(\r\n";
foreach ($sc_pass as $id_key => $id_ps){

if($id_key!= $rid){
$save .= "'".$id_key."' => '".$id_ps."',\r\n";
}

}


$save .= "'".$rid."' => '".$pass."'\r\n";
$save .= " );\r\n";
$save .= "?>";

if(file_put_contents("file/dat_folder/security.php", $save)){

$ol = mysql_query("SELECT * FROM users WHERE id='".$rid."'");
$a = mysql_fetch_object($ol);

$message = "<b>$user</b> - 2 ci parol ald&#305;.";
            mysql_query("insert into zapiski values(0,'Sistem','0','".$message."','','1','".$SERVER_TIME."','0','2 ci parol','','1','1');");

mysql_query ("update `users` set `bal` = `bal` - '".$cixilan."' where `id` = '".$id."'");
   
echo "<b>Login ve Parol U&#287;urla Yarad&#305;ld&#305;.</b><br/>----<br/>Melumatlar:<br/>----<br/>Leqeb: <b>".$a->user."</b><br/>
Parol: <b>".$pass."</b><br/>";
}else{
echo "Xeta ba&#351; verdi<br/>";
}
}
}
}



break;


case 'sil':



if(!isset($sc_pass[$g])){
echo "Xeta ba&#351; verdi<br/>";
}else{

    
$saves = "<?PHP //user: secrety pass \r\n";
$saves .= "\$sc_pass = array(\r\n";
foreach ($sc_pass as $id_key => $id_ps){

if($id_key!= $g){
$saves .= "'".$id_key."' => '".$id_ps."',\n";
}

}

$save .= substr($saves ,0,-2);
$save .= " );\r\n";
$save .= "?>";

if(file_put_contents("file/dat_folder/security.php", $save)){
    $message = "<b>$user</b> - 2 ci parolu levg etdi.";
            mysql_query("insert into zapiski values(0,'Sistem','0','".$message."','','1','".$SERVER_TIME."','0','2 ci parol','','1','1');");


echo " 2 ci parol U&#287;urla Levg edildi.Te&#351;ekkurler.<br/>";
}
}
break;
}}
$_v->divide();
if($act){
echo "<a href=\"security_bal.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qayit</a><br/>\n";
}

print "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";

print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>