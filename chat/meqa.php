<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);



$user = $row["user"];
$bal = $row["bal"];
$meqa = $row["meqa"];
$meqa_time = $row["meqa_time"];

if($row["meqanickphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz meqa nick xidmetine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$b = isset($_GET["b"]) ? intval($_GET["b"]) : 0;



$rpos = file("file/dat_folder/n_n/meqa_niko.dat");
$meqa1 = trim($rpos[0]);
$meqa2 = trim($rpos[1]);
$meqa3 = trim($rpos[2]);
$meqa4 = trim($rpos[3]);
$bonuss = trim($rpos[4]);
if ($bonuss == 1) {


#---------- Ayarlar ----------#
// Qalin
$qalin = $meqa1;// <- bal
// Kursiv
$kursiv = $meqa2;// <- bal
// Qalin, Kursiv
$qk = $meqa3;// <- bal
// Boyuk
$boyuk = $meqa4;// <- bal

if ($b == 1) {
    $d1 = "<b>";
    $d2 = "</b>";
    $nov = "Qal&#305;n";
    $qiymet = $qalin;
} else if ($b == 2) {
    $d1 = "<i>";
    $d2 = "</i>";
    $nov = "Kursiv";
    $qiymet = $kursiv;
} else if ($b == 3) {
    $d1 = "<b><i>";
    $d2 = "</i></b>";
    $nov = "Qal&#305;n, Kursiv";
    $qiymet = $qk;
} else if ($b == 4) {
    $d1 = "<big>";
    $d2 = "</big>";
    $nov = "B&#246;y&#252;k";
    $qiymet = $boyuk;
}

ob_start();

$_v->title('Meqa Nick');
$_v->fsize1($fsize1);

if (!$b) {
    echo "Siz burdan \"<u>Online-Mesaj</u>\"-da nikinizin g&#246;r&#252;nt&#252;s&#252;n&#252; a&#351;aqdak&#305;lardan birini se&#231;erek m&#252;veqqeti olaraq deyi&#351;e bilersiniz!.<br/>";
    $_v->divide();
    echo "Hesab&#305;n&#305;zda (<b>".$bal."</b>) bal var.<br/>";
    echo $divide;
    echo "Qalin -&#187; <b><a href=\"meqa.php?id=$id&amp;ps=$ps&amp;b=1&amp;ref=$ref\">".$user."</a></b> (<b>".$qalin."</b> bal)<br/>";
    echo "Kursiv -&#187; <i><a href=\"meqa.php?id=$id&amp;ps=$ps&amp;b=2&amp;ref=$ref\">".$user."</a></i> (<b>".$kursiv."</b> bal)<br/>";
    echo "Qalin, Kursiv -&#187; <b><i><a href=\"meqa.php?id=$id&amp;ps=$ps&amp;b=3&amp;ref=$ref\">".$user."</a></i></b> (<b>".$qk."</b> bal)<br/>";
    echo "B&#246;y&#252;k -&#187; <big><a href=\"meqa.php?id=$id&amp;ps=$ps&amp;b=4&amp;ref=$ref\">".$user."</a></big> (<b>".$boyuk."</b> bal)<br/>";
    echo "<br/>";
    echo "<i><b>Qeyd</b>: <u>N&#252;munelerin qabaqinda g&#246;sterilen bal qiymetleri xidmetin bir g&#252;nl&#252;k qiymetidir!.</u></i><br/>";
} else if ($b == 1 or $b == 2 or $b == 3 or $b == 4) {
    if ($bal < $qiymet) {
        echo "<b>Diqqet!</b><br/>";
        $_v->divide();
        echo "Hesab&#305;n&#305;zda kifayet qeder bal yoxdur.<br/>";
    } else {
       /* if ($meqa_time > time()) {
            echo "Sizin art&#305;q \"<u>Meqa Nikiniz</u>\" m&#246;vcuddur!.<br/>";
        } else {*/
            echo "<b>Tebrikler!.</b><br/>";
            $_v->divide();
            echo "Sizin nikinizin \"<u>Online-Mesaj</u>\"-da  g&#246;r&#252;n&#252;&#351;&#252; se&#231;diyiniz n&#246;v olan ".$nov." ile deyi&#351;dirildi!.<br/>";
            echo "<br/>";
            echo "Nikinizin yeni g&#246;r&#252;n&#252;t&#252;s&#252;: ".$d1."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$id&amp;ref=$ref\">".$user."</a>".$d2."<br/>";
            
            $message = "<b>$user</b> - ".$nov." nik ald&#305;.";
            mysql_query("insert into zapiski values(0,'Sistem','0','".$message."','','1','".$SERVER_TIME."','0','Meqa Nik rengli nik','','1','1');");

            $y_time = time() + 86400;
            mysql_query ("update `users` set `bal` = `bal` - '".$qiymet."', `meqa` = '".$b."', `meqa_time` = '".$y_time."' where `id` = '".$id."'");
       // }
    }
}

}
$_v->divide();
if($b)echo "<a href=\"meqa.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Meqa nik</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online-Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>
