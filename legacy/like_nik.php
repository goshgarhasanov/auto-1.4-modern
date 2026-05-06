<?php

header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$cixilan = 30;
$user = $row['user'];


$like_savik = @mysql_query ("SELECT id,time FROM like_info WHERE time > '".time() ."' AND usid='".$id."';");
if(mysql_affected_rows() == false)
{
    $status = true;
}
else
{
    $status = false;
}
$savik = mysql_fetch_array ($like_savik);
$gun=$savik["time"];

$gun = $gun - time();
if($gun < 60 && $gun > 0)
{
$secund = "saniyye\n";
}
elseif($gun < 3600 && $gun > 59)
{
$new = $gun;
$gun = $new/60;
$secund = "deqiqe\n";
}
elseif($gun < 86400 && $gun >=3599)
{
$new = $gun;
$gun = $new/3600;
$secund = "saat\n";
}
$gun = round($gun);

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card id=\"index\" title=\"Nikini N&#252;mayi&#351; et\">";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u><b>Nikini N&#252;mayi&#351; et</b></u><br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;

switch($go)
{
    default:
    if($status == true)
    {
        echo "<a href=\"like_nik.php?go=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">N&#252;mayi&#351;e Ba&#351;la</a><br/>\n";
    }
    else
    {
        echo "Sizin nikiniz n&#252;mayi&#351; olnur.N&#252;mayi&#351;in bitmesine <b>{$gun} {$secund}</b> qal&#305;b. Eger levg etmek isteyirsizse <u>Xidmeti le&#287;v et</u> linkine t&#305;klay&#305;n.<br/>\n";
        echo "<a href=\"like_nik.php?go=1&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xidmeti le&#287;v et</a>(Pulsuz)<br/>\n";
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
    
        $inf = select_nk($usid);
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
        $login = (file_exists("i/".$usid.".gif") and $row["rnikler"] == 0) ? "<img src=\"i/".$usid.".gif?$ref\" alt=\"".$login."\"/>" : $login;

        echo ($start+1).") ".$zn."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$usid."&amp;ref=$ref\">".$login."</a> | ".$age.",".$sex." ";
        if($row['level'] >= 8)
        {
            echo "[<a href=\"like_nik.php?go=2&amp;del=$usid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>]\n";
        }
        echo "<br/>\n";
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("like_nik.php?id=$id&amp;ps=$ps&amp;ref=$ref", $total, $max, $page);
    }
    break;
    
    case 1;
    if(!isset($_GET['stat']))
    {
        echo "<b>Qeyd:</b> N&#252;mayi&#351; olunan istifade&#231;ilerin nikleri <b>Online Mesaj</b>-da yuxar&#305;da g&#246;r&#252;necek. <br/> 1 g&#252;nl&#252;k xidmetin deyeri <b>$cixilan</b> bald&#305;r!..<br/>";
        echo $divide;
        echo "Sizde nikinizi n&#252;mayi&#351; etmek isteyirsizmi?<br/>\n";
        echo "<a href=\"like_nik.php?go=$go&amp;stat=yes&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Beli</a> / \n";
        echo "<a href=\"like_nik.php?go=$go&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xeyr</a><br/>\n";
    }
    else
    {
        if($stat=="yes")
        {
            if($status == false)
            {
                echo "Sizin nikiniz n&#252;mayi&#351; olunur. Eger levg etmek isteyirsizse <u></u> linkine t&305;klay&#305;n<br/>\n";
                echo "<a href=\"like_nik.php?go=1&amp;stat=no&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Xidmeti le&#287;v et</a><br/>\n";
                break;
            }
            else
            {
                if($row['bal'] < $cixilan)
                {
                    echo "Nikinizi N&#252;mayi&#351; etmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$cixilan</b> bal olmal&#305;d&#305;r!..<br/>\n";
                    break;
                }
                else
                {
                    $sql = mysql_query("INSERT INTO like_info SET usid='".$id."', user='".$user."', time='".(time()+86400)."'");
                    if($sql == true)
                    {
                        @mysql_query("UPDATE users SET bal = bal - '".$cixilan."' WHERE id='".$id."'");
                        echo "Nikiniz 1 g&#252;nl&#252;k N&#252;mayi&#351; olunacaq. Tebrikler!..<br/>\n";
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
                echo "Sizin nikiniz n&#252;mayi&#351; olunmad&#305;&#287;&#305;ndan xidmeti le&#287;v etmek m&#252;mk&#252;n deyil!..<br/>\n";
                break;
            }
            else
            {
                $sql = mysql_query("DELETE FROM like_info WHERE usid='".$id ."' AND time > '".time()."'");
                if($sql == true)
                {
                    echo "N&#252;mayi&#351; le&#287;v edildi!..<br/>\n";
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
        $del = $_GET['del'];
        if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE id='".$del."'"))==0)
        {
            echo "Nik tap&#305;lmad&#305;!..<br/>\n";
            break;
        }
        else
        {
            $sql = mysql_query("DELETE FROM like_info WHERE usid='".$del ."'");
            if($sql == true)
            {
                echo "Qeyd etdiyiniz istifade&#231;inin n&#252;mayi&#351;i le&#287;v edildi!..<br/>\n";
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
    echo "<a href=\"like_online.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
ob_end_flush();
?>