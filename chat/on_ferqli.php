<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);





$rpos = file("file/dat_folder/n_n/on_niko.dat");
$bal = trim($rpos[0]);
$ferqli = trim($rpos[1]);
$cixilan = $bal;
$user = $row['user'];
if ($ferqli == 1) {
function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "N&#246;vbeti &#187;";
$_PREVPAGE = "&#171; Evvelki";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}

@mysql_query("SELECT id FROM like_info WHERE time > '".time() ."' AND usid='".$id."';");
if(mysql_affected_rows() == false)
{
    $status = true;
}
else
{
    $status = false;
}

ob_start();
$_v->title('Sende Ferqli nick ol','center');
$_v->fsize1($fsize1);

echo "<u><b>Sende Ferqli nick ol</b></u><br/>";
echo $divide;


$anket = mysql_query("SELECT * FROM like_info WHERE time > '".time() ."' ORDER BY RAND() DESC LIMIT 1;");
if(mysql_affected_rows() == true)
{
    $ank = mysql_fetch_object($anket);
    $anik = $ank->user;
    $anid = $ank->usid;
echo "<u><b>Ferqli Nick</b></u>: <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$anid."&amp;ref=$ref\">".$anik."</a><br/>\n";
}

$_v->align('left');

switch($go)
{
    default:
    if($status == true)
    {
        echo "<a href=\"on_ferqli.php?go=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Nickini g&#246;ster</a><br/>\n";
    }
    else
    {
        echo "Sizin ferqi nickiniz aktivdir. Eger levg etmek isteyirsizse <u>Xidmeti le&#287;v et</u> linkine t&#305;klay&#305;n<br/>\n";
        echo "<a href=\"on_ferqli.php?go=1&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xidmeti le&#287;v et</a>(pulsuz)<br/>\n";
    }
    echo $divide;
    @mysql_query("DELETE FROM like_info WHERE time < '".time()."';");
    $like = mysql_query("SELECT COUNT(id) FROM like_info WHERE time > '".time()."';");
    $total = mysql_result($like, 0);
    $max = 10;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start = 0;
        $end = $max;
    }
    $like = mysql_query("SELECT * FROM like_info WHERE time > '".time()."' ORDER BY time DESC LIMIT $start,$max;");
    if(mysql_affected_rows() == false)
    {
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($arr = mysql_fetch_object($like))
    {
        $login = $arr->user;
        $usid = $arr->usid;
    
        //$inf = select_nk($usid);
        $zn = $inf->zn;
        $sex = $inf->sex;
        $birth = $inf->birth;
        $d = date("d-m-");
        $y  = date("Y");
        $d1 = substr($birth,0,2);
        $m1 = substr($birth,4,2);
        $y1 = substr($birth,6,4);
        $sex = ($sex == 0) ? "K" : "Q";
        $age = ($y > $y1) ? ($y - $y1) : "(xXx)";
        $age = (!$age || $age == 0 || $age == "" || $age > $y) ? "(xXx)" : "<b>".$age."</b>";
        if($zn!="")
        {
            $zn = " <img src=\"img/z".$zn.".gif\" alt=\".\"/>";
        }
        $login = ($usid == $id) ? "<b>".$login."</b>" : $login;
        echo ($start+1).") ".$zn."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$usid."&amp;ref=$ref\">".$login."</a> ";
        if($row['level'] >= 8)
        {
            echo "[<a href=\"on_ferqli.php?go=2&amp;del=$usid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]\n";
        }
        echo "<br/>\n";
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("on_ferqli.php?id=$id&amp;ps=$ps&amp;ref=$ref", $total, $max, $page);
    }
    break;
    
    case 1;
    if(!isset($_GET['stat']))
    {
        echo "<b>Qeyd:</b> Ferqli nick olan istifade&#231;ilerin nickleri tan&#305;&#351;l&#305;qda yuxar&#305;da g&#246;r&#252;necek. <br/> 1 g&#252;nl&#252;k xidmetin deyeri <b>$cixilan</b> bald&#305;r!..<br/>";
        echo $divide;
        echo "Sizde ferqli nick olmaq isteyirsizmi?<br/>\n";
        echo "<a href=\"on_ferqli.php?go=$go&amp;stat=yes&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Beli</a> / \n";
        echo "<a href=\"on_ferqli.php?go=$go&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a><br/>\n";
    }
    else
    {
        if($stat=="yes")
        {
            if($status == false)
            {
                echo "Sizin ferqi nickiniz aktivdir. Eger levg etmek isteyirsizse <u></u> linkine t&305;klay&#305;n<br/>\n";
                echo "<a href=\"on_ferqli.php?go=1&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xidmeti le&#287;v et</a><br/>\n";
                break;
            }
            else
            {
                if($row['bal'] < $cixilan)
                {
                    echo "Ferqli nick olmaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$cixilan</b> bal olmal&#305;d&#305;r!..<br/>\n";
                    break;
                }
                else
                {
                    $sql = mysql_query("INSERT INTO like_info SET usid='".$id."', user='".$user."', time='".(time()+86400)."'");
                    if($sql == true)
                    {
                        @mysql_query("UPDATE users SET bal = bal - '".$cixilan."' WHERE id='".$id."'");
                        echo "Nickiniz 1 g&#252;nl&#252;k ferqli nick oldu. Tebrikler!..<br/>\n";
                    }
                    else
                    {
                        echo "Baza ile elaqe yaranm&#305;r. Bir ne&#231;e deqiqe sonra yene yoxlay&#305;n!..<br/>\n";
                    }
                }
            }
        }
        else
        {
            if($status == true)
            {
                echo "Sizin ferqli nickiniz olmad&#305;&#287;&#305;ndan xidmeti le&#287;v etmek m&#252;mk&#252;n deyil!..<br/>\n";
                break;
            }
            else
            {
                $sql = mysql_query("DELETE FROM like_info WHERE usid='".$id ."' AND time > '".time()."'");
                if($sql == true)
                {
                    echo "Xidmet le&#287;v edildi!..<br/>\n";
                }
                else
                {
                    echo "Baza ile elaqe yaranm&#305;r. Bir ne&#231;e deqiqe sonra yene yoxlay&#305;n!..<br/>\n";
                }
            }
        }
    }
    break;

    case 2;
    if($row['level'] < 8)
    {
        echo "Bura olmaz!..<br/>\n";
        break;
    }
    if(isset($_GET['del']))
    {
        
        if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE id='".$del."'"))==0)
        {
            echo "Nick tap&#305;lmad&#305;!..<br/>\n";
            break;
        }
        else
        {
            $sql = mysql_query("DELETE FROM like_info WHERE usid='".$del ."'");
            if($sql == true)
            {
                echo "Qeyd etdiyiniz istifade&#231;inin ferqli nicki le&#287;v edildi!..<br/>\n";
            }
            else
            {
                echo "Baza ile elaqe yaranm&#305;r. Bir ne&#231;e deqiqe sonra yene yoxlay&#305;n!..<br/>\n";
            }
        }
    }
    else
    {
        echo "Melumat d&#252;zg&#252;n deyil!..<br/>\n";
    }
    break;
}
if($go == true)
{
    echo $divide;
    echo "<a href=\"on_ferqli.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
} 
}
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>
