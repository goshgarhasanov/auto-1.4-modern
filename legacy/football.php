<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$ref = rand(10000, 99999);
$user = $row['user'];
$level = $row['level'];
$fut_level = $row['id'];




$month_name = array("Yanvar","Fevral","Mart","Aprel","May","&#304;yun","&#304;yul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr");
$new_g = mysql_query("SELECT COUNT(id) FROM football WHERE foot_status='0';");
$new_games = mysql_result($new_g, 0);

$off_g = mysql_query("SELECT COUNT(id) FROM football WHERE foot_status!='0';");
$off_games = mysql_result($off_g, 0);

$mod = intval($_GET['mod']);
$title = array("Futbol proqnoz", "Yeni Oyunlar", "Neticeler", "Qaydalar", "Sizin Proqnozlar", "Admin panel", "Proqnoz ver", "D&#252;zg&#252;n Proqnozlar", "Yanl&#305;&#351; Proqnozlar");
$title_main = $mod > count($title) ? $title[0] : $title[$mod];




ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"index\" title=\"".$title_main."\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<img src=\"img/footbal.png\" alt=\"Futbol proqnoz\"/><br/>";
echo "*****<br/>";
print "<u>".$title_main."</u><br/>";
echo $divide;
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;

switch ($mod)
{
    default:
    if($fut_level == true)
    {
        if($id==1)echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=5&amp;ref=$ref\">Admin Panel</a><br/>\n";
        echo $divide;
    }
    echo "<img src=\"img/top.gif\" alt=\"Top\"/> <b>".$user."</b>, xo&#351; gelmisiniz. Buyurun oyunlara proqnoz verin.<br/>";
    echo "*****<br/>";
    echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=4&amp;ref=$ref\">Sizin Proqnozlar</a><br/>\n";
    echo $divide;
    echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=1&amp;ref=$ref\">Yeni Oyunlar</a>(".$new_games.")<br/>\n";
    echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=2&amp;ref=$ref\">Neticeler</a>(".$off_games.")<br/>\n";
    echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=3&amp;ref=$ref\">Qaydalar</a><br/>\n";
    break;

    case 1;//yeni oyunlar
    $total = $new_games;
    $max = 5;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start=0;
        $end=$max;
    }
    $sql = mysql_query("SELECT * FROM football WHERE foot_status='0' ORDER BY time ASC LIMIT $start,$max;");
    if(mysql_affected_rows()==false)
    {
        echo "He&#231; bir komanda m&#252;barize aparm&#305;r.<br/>\n";
    }
    while($fb = mysql_fetch_array($sql))
    {
        $fb_id = $fb['id'];
        $home_team = $fb['team_one'];
        $user_team = $fb['team_two'];
        $kafcent_0 = $fb['kafcent_0'];
        $kafcent_1 = $fb['kafcent_1'];
        $kafcent_2 = $fb['kafcent_2'];
        $fb_date = $fb['foot_date'];
        $fb_ball = $fb['bal'];
        if($start!=($page * $max))echo $divide;
        echo ($start+1).") <u>".$fb_date."</u><br/>".$home_team." - ".$user_team;
        if($fut_level == true)
        {
            echo " [<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=5&amp;go=1&amp;fid=$fb_id&amp;ref=$ref\">Edit</a>]";
        }
        echo "<br/>";
        $curdate = str_replace("/", "", $fb_date);
        $curdate = str_replace(" ", "", $curdate);
        $curdate = str_replace(":", "", $curdate);
        if($curdate > date("dmYHi"))
        {
            echo "<select name=\"kafcent$ref\">";
            echo "<option value=\"2\">2 - ( x ".$kafcent_2.")</option>";
            echo "<option value=\"1\">1 - ( x ".$kafcent_1.")</option>";
            echo "<option value=\"0\">0 - ( x ".$kafcent_0.")</option>";
            echo "</select><br/>";
            echo "Minimum $fb_ball bal<br/>\n";
            echo "Bal: ";
            echo $fsize2;
            echo "<input type=\"text\" name=\"ball$ref\" size=\"3\"/> ";
            echo $fsize1;
            echo "<anchor title=\"go\">Ok<go href=\"football.php?id=$id&amp;ps=$ps&amp;mod=6&amp;ref=$ref\" method=\"post\">";
            echo "<postfield name=\"game\" value=\"$fb_id\"/>";
            echo "<postfield name=\"ball\" value=\"$(ball$ref)\"/>";
            echo "<postfield name=\"kafcent\" value=\"$(kafcent$ref)\"/>";
            echo "</go></anchor><br/>";
        }
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("football.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;ref=$ref",$total,$max,$page);
    }
    break;

    case 2;//neticeler
    $check = trim($_GET['check']);
    echo "<select name=\"day\" value=\"".date("d")."\">";
    $d=1;
    while($d<=31)
    {
        $d = ($d < 10) ? "0".$d : $d;
        echo "<option value=\"$d\">".$d."</option>";
        $d++;
    }
    echo "</select>-";
    echo "<select name=\"month\" value=\"".date("m")."\">";
    $n=1;
    while($n<=12)
    {
        $n = ($n < 10) ? "0".$n : $n;
        echo "<option value=\"$n\">".$month_name[$n-1]."</option>";
        $n++;
    }
    echo "</select>-";
    echo "<select name=\"year\" value=\"".date("Y")."\">";
    $w=2000;
    while($w<=date("Y"))
    {
        echo "<option value=\"$w\">".$w."</option>";
        $w++;
    }
    echo "</select> ";
    echo "[<anchor title=\"go\">G&#246;ster<go href=\"football.php?check=ok&amp;id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref\" method=\"get\">";
    echo "<postfield name=\"day\" value=\"$(day)\"/>";
    echo "<postfield name=\"month\" value=\"$(month)\"/>";
    echo "<postfield name=\"year\" value=\"$(year)\"/>";
    echo "</go></anchor>]<br/>";
    echo $divide;
    if($check == true)
    {
        $today = $_GET['day']."/".$_GET['month']."/".$_GET['year'];
        $off = mysql_query("SELECT COUNT(id) FROM football WHERE foot_date >='".$today." 00:00' and foot_date <='".$today." 59:59' and foot_status!='0'");
        $off_games = mysql_result($off, 0);
    }
    $total = $off_games;
    $max = 5;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start=0;
        $end=$max;
    }
    if($check == true)
    {
        $sql = mysql_query("SELECT * FROM football WHERE foot_date >='".$today." 00:00' and foot_date <='".$today." 59:59' and foot_status!='0' ORDER BY time DESC LIMIT $start,$max;");
        $url = "&amp;check=ok&amp;day=".$_GET['day']."&amp;month=".$_GET['month']."&amp;year=".$_GET['year'];
    }
    else
    {
        $sql = mysql_query("SELECT * FROM football WHERE foot_status!='0' ORDER BY time DESC LIMIT $start,$max;");
    }
    if(mysql_affected_rows()==false)
    {
        echo "Netice yoxdur.<br/>\n";
    }
    while($fb = mysql_fetch_array($sql))
    {
        $fb_id = $fb['id'];
        $home_team = $fb['team_one'];
        $user_team = $fb['team_two'];
        $fb_shot = $fb['foot_shot'];
        $fb_date = $fb['foot_date'];
        $fb_status = $fb['foot_status'];
        if($start!=($page * $max))echo $divide;
        if($fb_status == 1)
        {
            echo "<img src=\"img/1.gif\" alt=\"*\"/> <b>".$home_team."</b> - ".$user_team;
        }
        else
        if($fb_status == 2)
        {
            echo $home_team." - <img src=\"img/1.gif\" alt=\"*\"/> <b>".$user_team."</b>";
        }
        else
        {
            echo $home_team." - ".$user_team;
        }
        echo "<br/>";
        echo "-<b>Hesab:</b> ".$fb_shot."<br/>\n";
        list($h1,$h2) = split(" - ", $fb_shot);
        if($h1 > $h2)
        {
            $cafcent = 2;
            echo "-<b>Qalib:</b> Meydan sahibi.<br/>\n";
        }
        else
        if($h1 < $h2)
        {
            $cafcent = 0;
            echo "-<b>Qalib:</b> Qonaq komanda.<br/>\n";
        }
        else
        {
            $cafcent = 1;
            echo "-<b>Oyun:</b> He&#231;-He&#231;e.<br/>\n";
        }
        echo "<u>Proqnoz&#231;ular:</u><br/>\n";
        $duzgun_prognoz = mysql_query("SELECT COUNT(id) FROM fb_prognoz WHERE football_id='".$fb_id."' AND kafcent='".$cafcent."'");
        $duzgun_count = mysql_result($duzgun_prognoz, 0);
        echo "-<b>D&#252;zg&#252;n:</b> (<b><a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=7&amp;fid=$fb_id&amp;ref=$ref\">".$duzgun_count."</a></b>)<br/>";

        $sehv_prognoz = mysql_query("SELECT COUNT(id) FROM fb_prognoz WHERE football_id='".$fb_id."' AND kafcent!='".$cafcent."'");
        $sehv_count = mysql_result($sehv_prognoz, 0);
        echo "-<b>Yanl&#305;&#351;:</b> (<b><a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=8&amp;fid=$fb_id&amp;&amp;ref=$ref\">".$sehv_count."</a></b>)<br/>";

        ++$start;
    }
    if($total > $max)
    {
        echo navigation("football.php?mod=$mod&amp;id=$id&amp;ps=$ps$url&amp;ref=$ref",$total,$max,$page);
    }
    break;

    case 3;//qaydalar
    echo "<b>1.</b>)Oyunun qaba&#287;&#305;nda <b>2</b> yaz&#305;lan&#305; se&#231;erseniz meydan sahibini, <b>1</b> se&#231;seniz beraberliyi, <b>0</b> se&#231;seniz qonaq komandan&#305;n qalib geleceyini bildirmi&#351; olacaqs&#305;n&#305;z.<br/><b>2.</b>)Eger se&#231;diyiniz oyun d&#252;z &#231;&#305;xarsa, hemin prognozun qaba&#287;&#305;nda qeyd olunan emsal(kafisent) oyuna qoydu&#287;unuz bala vurulub bal hesab&#305;n&#305;za elave edilecek.<br/><b>3.</b>)Proqnoz verdiyiniz oyunlar&#305; yoxlamaq &#252;&#231;&#252;n (qalib gelib gelmediyiniz baresinde) Sizin Pronozlar olan b&#246;lmeden izleye bilersiniz!<br/><b>4.</b>)Canl&#305; olaraqda Futbol oyunlar&#305;n&#305;n neticesini Canl&#305; Futbol Neticelerinden baxa bilersiniz!<br/>\n";
    break;

    case 4;//my prognoz
    $my = mysql_query("SELECT COUNT(id) FROM fb_prognoz WHERE user_id='".$id."';");
    $total = mysql_result($my, 0);
    $max = 5;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start=0;
        $end=$max;
    }
    $sql = mysql_query("SELECT * FROM fb_prognoz WHERE user_id='".$id."' ORDER BY date DESC LIMIT $start,$max;");
    if(mysql_affected_rows()==false)
    {
        echo "Siz he&#231; bir komandaya proqnoz vermemisiz.<br/>\n";
        break;
    }
    while($m = mysql_fetch_array($sql))
    {
        $kafcent = $m['kafcent'];
        $bal = $m['bal'];
        $fb = mysql_fetch_array(mysql_query("SELECT * FROM football WHERE id='".$m['football_id']."';"));
        $home_team = $fb['team_one'];
        $user_team = $fb['team_two'];
        $fb_shot = $fb['foot_shot'];
        $fb_date = $fb['foot_date'];
        $fb_status = $fb['foot_status'];
        $hesab = sprintf("%01.0f", ($bal * $fb['kafcent_'.$kafcent]));

        if($start!=($page * $max))echo $divide;
        echo ($start+1).") ".$home_team." - ".$user_team."<br/>\n";
        echo "-<b>Kafisent:</b> ".$fb['kafcent_'.$kafcent]."<br/>\n";
        echo "-<b>Netice:</b> ".$fb_shot."<br/>\n";
        echo "-<b>Sizin hesab:</b> ".$kafcent." | <b>Bal:</b> ".$bal."<br/>\n";
        if($fb_status==0)
        {
            echo "-<b>G&#246;zlenilen mevacib:</b> (".$fb['kafcent_'.$kafcent]." x ".$bal." = ".$hesab.") bal<br/>\n";
        }
        else
        if(($fb_status==1 and $kafcent==2)or($fb_status==2 and $kafcent==0)or($fb_status==3 and $kafcent==1))
        {
            echo "-<b>Qazan&#305;lan meble&#287;:</b> (".$hesab." bal)<br/>\n";
        }
        else
        {
            echo "-<b>&#304;tirilen meble&#287;:</b> (".$bal." bal)<br/>\n";
        }
        echo "-<b>Tarix</b> - [".$fb_date."]<br/>\n";
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("football.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;ref=$ref",$total,$max,$page);
    }
    break;





















    case 5;//
    if($id!=1)
    {
        echo "Sizin bura giri&#351; icazeniz yoxdur.<br/>\n";
        break;
    }
    switch($go)
    {
        default:
        echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=1&amp;ref=$ref\">Yeni oyun</a><br/>";
        echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=2&amp;ref=$ref\">Neticeler</a><br/>";
        echo $divide;
        echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=3&amp;ref=$ref\">Neticeleri sil</a><br/>";
        echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=4&amp;ref=$ref\">B&#252;t&#252;n oyunlar&#305; sil</a><br/>";
        echo "- <a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=5&amp;ref=$ref\">B&#252;t&#252;n proqnozlar&#305; sil</a><br/>";
        break;

        case 1;//yeni oyun
        if(isset($fid))
        {
            $select = mysql_query("SELECT * FROM football WHERE id='".$fid."'");
            $ed = mysql_fetch_array($select);
            list($new_day,$new_month,$new_year,$new_hour,$new_second) = split("-", preg_replace("/[\/s,.?!:;[ ]+/", "-", $ed['foot_date']));
            $new_bal = $ed['bal'];
            $new_team_one = $ed['team_one'];
            $new_team_two = $ed['team_two'];
            $new_kafcent_0 = $ed['kafcent_0'];
            $new_kafcent_1 = $ed['kafcent_1'];
            $new_kafcent_2 = $ed['kafcent_2'];
        }
        if(!$action == true)
        {
            echo "<u>Meydan sahibi:</u><br/>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"team_one$ref\" value=\"".$new_team_one."\" title=\"Komanda adi 1\"/><br/>";
            echo $fsize1;
            echo "<u>Qonaq komanda:</u><br/>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"team_two$ref\" value=\"".$new_team_two."\" title=\"Komanda adi 2\"/><br/>";
            echo $fsize1;
            echo "<u>Tarix:</u> (g&#252;n-ay-il saat:deqiqe)<br/>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"day$ref\" value=\"".$new_day."\" size=\"2\"/>";
            echo $fsize1."-".$fsize2;
            echo "<input type=\"text\" name=\"month$ref\" value=\"".$new_month."\" size=\"2\"/>";
            echo $fsize1."-".$fsize2;
            echo "<input type=\"text\" name=\"year$ref\" value=\"".$new_year."\" size=\"3\"/>";
            echo $fsize1." ".$fsize2;
            echo "<input type=\"text\" name=\"hour$ref\" value=\"".$new_hour."\" size=\"2\"/>";
            echo $fsize1.":".$fsize2;
            echo "<input type=\"text\" name=\"second$ref\" value=\"".$new_second."\" size=\"2\"/><br/>";
            echo $fsize1;
            echo "<u>Kafisentler:</u><br/>";
            echo "<b>0 - </b>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"kafcent_0$ref\" value=\"".$new_kafcent_0."\" size=\"4\"/><br/>";
            echo $fsize1;
            echo "<b>1 - </b>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"kafcent_1$ref\" value=\"".$new_kafcent_1."\" size=\"4\"/><br/>";
            echo $fsize1;
            echo "<b>2 - </b>";
            echo $fsize2;
            echo "<input type=\"text\" name=\"kafcent_2$ref\" value=\"".$new_kafcent_2."\" size=\"4\"/><br/>";
            echo $fsize1;
            echo "Bal say&#305;: ";
            echo $fsize2;
            echo "<input type=\"text\" name=\"bal$ref\" value=\"".$new_bal."\" size=\"5\"/><br/>";
            echo $fsize1;
            echo $divide;
            if($fid == true)
            {
                echo "[<anchor title=\"go\">Deyi&#351;<go href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=$go&amp;ref=$ref\" method=\"post\">";
            }
            else
            {
                echo "[<anchor title=\"go\">Elave et<go href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=$go&amp;ref=$ref\" method=\"post\">";
            }
            echo "<postfield name=\"team_one\" value=\"$(team_one$ref)\"/>";
            echo "<postfield name=\"team_two\" value=\"$(team_two$ref)\"/>";
            echo "<postfield name=\"kafcent_0\" value=\"$(kafcent_0$ref)\"/>";
            echo "<postfield name=\"kafcent_1\" value=\"$(kafcent_1$ref)\"/>";
            echo "<postfield name=\"kafcent_2\" value=\"$(kafcent_2$ref)\"/>";
            echo "<postfield name=\"day\" value=\"$(day$ref)\"/>";
            echo "<postfield name=\"month\" value=\"$(month$ref)\"/>";
            echo "<postfield name=\"year\" value=\"$(year$ref)\"/>";
            echo "<postfield name=\"hour\" value=\"$(hour$ref)\"/>";
            echo "<postfield name=\"second\" value=\"$(second$ref)\"/>";
            echo "<postfield name=\"bal\" value=\"$(bal$ref)\"/>";
            if($fid == true)
            {
                echo "<postfield name=\"fid\" value=\"$fid\"/>";
            }
            echo "<postfield name=\"action\" value=\"ok\"/>";
            echo "</go></anchor>]<br/>";
        }
        else
        {
            $error = false;
            $team_one = narmobilfut($_POST['team_one']);
            $team_two = narmobilfut($_POST['team_two']);
            $kafcent_0 = trim($_POST['kafcent_0']);
            $kafcent_1 = trim($_POST['kafcent_1']);
            $kafcent_2 = trim($_POST['kafcent_2']);
            $day = trim($_POST['day']);
            $month = trim($_POST['month']);
            $year = trim($_POST['year']);
            $hour = trim($_POST['hour']);
            $second = trim($_POST['second']);
            $bal = intval($_POST['bal']);
            if($team_one == false)
            {
                $error = "1 ci komandan&#305;n ad&#305;n&#305; yazmad&#305;z.";
            }
            else
            if($team_two == false)
            {
                $error = "2 ci komandan&#305;n ad&#305;n&#305; yazmad&#305;z.";
            }
            else
            if($day == false or $month == false or $year == false or $hour == false or $second == false)
            {
                $error = "Tarix g&#246;sterilen xanalardan hans&#305;sa bo&#351;dur.";
            }
            else
            if($day < date("d") or $month < date("m") or $year < date("Y"))
            {
                $error = "Tarix d&#252;zg&#252;n yaz&#305;lmay&#305;b.";
            }
            else
            if($kafcent_0 == false or $kafcent_1 == false or $kafcent_2 == false)
            {
                $error = "0,1,2 kafisentleriden hans&#305;sa bo&#351;dur.";
            }
            else
            if($bal < 5)
            {
                $error = "Bal say&#305; 5 den az olmamal&#305;d&#305;r.";
            }
            if($error == true)
            {
                echo $error."<br/>\n";
                echo $divide;
                echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
            }
            else
            {
                if($fid == true)
                {
                    $sql = mysql_query("UPDATE football SET team_one='".$team_one."', team_two='".$team_two."', kafcent_0='".$kafcent_0."', kafcent_1='".$kafcent_1."', kafcent_2='".$kafcent_2."', foot_date='".$day."/".$month."/".$year." ".$hour.":".$second."', time='".time()."', bal='".$bal."' WHERE id='".$fid."'");
                }
                else
                {
                    $sql = mysql_query("INSERT INTO football SET team_one='".$team_one."', team_two='".$team_two."', kafcent_0='".$kafcent_0."', kafcent_1='".$kafcent_1."', kafcent_2='".$kafcent_2."', foot_date='".$day."/".$month."/".$year." ".$hour.":".$second."', bal='".$bal."'");
                }
                if($sql == true)
                {
                    if($fid == true)
                    {
                        echo "Qeyd etdiyiniz oyun u&#287;urla deyi&#351;dirildi.<br/>\n";
                    }
                    else
                    {
                        echo "Yeni oyun u&#287;urla elave edildi.<br/>\n";
                    }
                }
                else
                {
                    echo "Bazada problem var bir ne&#231;e deqiqe sonra yene yoxlay&#305;n.<br/>\n";
                }
            }
        }
        break;

        case 2;//neticeler
        $total = $new_games;
        $max = 5;
        $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
        $start = (!isset($page)) ? 0 : ($page * $max);
        $end = (!isset($page)) ? $max : ($start + $max);
        if(ceil($total/$max) < $page)
        {
            $start=0;
            $end=$max;
        }
        $sql = mysql_query("SELECT * FROM football WHERE foot_status='0' ORDER BY time DESC LIMIT $start,$max;");
        if(mysql_affected_rows()==false)
        {
            echo "Netice g&#246;zleyen oyun yoxdur.<br/>\n";
        }
        while($fb = mysql_fetch_array($sql))
        {
            $fb_id = $fb['id'];
            $home_team = $fb['team_one'];
            $user_team = $fb['team_two'];
            $kafcent_0 = $fb['kafcent_0'];
            $kafcent_1 = $fb['kafcent_1'];
            $kafcent_2 = $fb['kafcent_2'];
            $fb_date = $fb['foot_date'];
            $fb_ball = $fb['bal'];
            if($start!=($page * $max))echo $divide;
            echo ($start+1).")".$fb_date."<br/>".$home_team." - ".$user_team."<br/>";
            echo "Netice: \n";
            echo $fsize2;
            echo "<input type=\"text\" name=\"shot_1$ref\" size=\"4\"/>";
            echo $fsize1."-".$fsize2;
            echo "<input type=\"text\" name=\"shot_2$ref\" size=\"4\"/>";
            echo $fsize1;
            echo " [<anchor title=\"go\">OK<go href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;go=6&amp;ref=$ref\" method=\"post\">";
            echo "<postfield name=\"shot_id\" value=\"$fb_id\"/>";
            echo "<postfield name=\"shot_1\" value=\"$(shot_1$ref)\"/>";
            echo "<postfield name=\"shot_2\" value=\"$(shot_2$ref)\"/>";
            echo "</go></anchor>]<br/>";
            ++$start;
        }
        if($total > $max)
        {
            echo navigation("football.php?mod=$mod&amp;go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref",$total,$max,$page);
        }
        break;

        case 3;//delete off game
        $delete_off = mysql_query("DELETE FROM football WHERE foot_status!='0'");
        if($delete_off)
        {
            echo "<u>B&#252;t&#252;n neticeler silindi.</u><br/>";
        }
        else
        {
            echo "<u>Xeta ba&#351; verdi.</u><br/>";
        }
        break;

        case 4;//delete all game
        $delete_all = mysql_query("TRUNCATE TABLE football");
        if($delete_all)
        {
            echo "<u>B&#252;t&#252;n oyunlar silindi.</u><br/>";
        }
        else
        {
            echo "<u>Xeta ba&#351; verdi.</u><br/>";
        }
        break;

        case 5;//delete all prognoz
        $delete_pr = mysql_query("TRUNCATE TABLE fb_prognoz");
        if($delete_pr)
        {
            echo "<u>B&#252;t&#252;n proqnoz silindi.</u><br/>";
        }
        else
        {
            echo "<u>Xeta ba&#351; verdi.</u><br/>";
        }
        break;

        case 6;//add netice
        if(isset($_POST['shot_1']) and isset($_POST['shot_2']))
        {
            $shot_one = intval($_POST['shot_1']);
            $shot_two = intval($_POST['shot_2']);
            $shot_id = intval($_POST['shot_id']);
            if($shot_one > $shot_two)
            {
                $stat = 2;
                $fb_stat = 1;
            }
            else
            if($shot_one < $shot_two)
            {
                $stat = 0;
                $fb_stat = 2;
            }
            else
            {
                $stat = 1;
                $fb_stat = 3;
            }
            $netice = array("Qonaq komanda qelebe qazand&#305;", "Oyun He&#231;-He&#231;e sona &#231;atd&#305;", "Meydan sahibi qelebe qazand&#305;");
            $arr_netice = $netice[$stat];
            $sql = mysql_query("SELECT * FROM football WHERE foot_status='0' and id='".$shot_id."';");
            if(mysql_affected_rows()==false)
            {
                echo "Oyun tap&#305;lmad&#305;.<br/>\n";
            }
            else
            {
                $fb = mysql_fetch_array($sql);
                $team_one = $fb['team_one'];
                $team_two = $fb['team_two'];
                $update = mysql_query("UPDATE football SET foot_shot='".$shot_one." - ".$shot_two."', foot_status='".$fb_stat."' WHERE id='".$shot_id."'");
                if($update == true)
                {
                    $select = mysql_query("SELECT * FROM fb_prognoz WHERE football_id='".$shot_id."'");
                    while($up = mysql_fetch_array($select))
                    {
                        $kafcent = $up['kafcent'];
                        $user_id = $up['user_id'];
                        $bal = $up['bal'];
                        $users_sql = mysql_query("SELECT * FROM users WHERE id='".$user_id."'");
                        if(mysql_num_rows($users_sql)!=0)
                        {
                            $u = mysql_fetch_array($users_sql);
                            $usid = $u['id'];
                            $us = $u['user'];
                            if($kafcent == $stat)
                            {
                                $game_kaficent = $fb['kafcent_'.$kafcent];
                                $hesab = sprintf("%01.0f", ($bal * $game_kaficent));
                                $msg = "H&#246;rmetli <b>".$us."</b>, Futbol Proqnoz oyununda <b>".$team_one." - ".$team_two."</b> komandalar&#305; aras&#305;nda geden m&#305;barizenin neticeleri belli oldu <u>".$arr_netice."</u>, Hesab: <b>".$shot_one." - ".$shot_two."</b>. Verdiyiniz proqnoz d&#252;zg&#252;n oldu&#287;u &#252;&#231;&#252;n oyuna qoydu&#287;nuz bal oyunun kafsentine vurularaq <b>".$bal." x ".$game_kaficent." = ".$hesab."</b> bal hesab&#305;n&#305;za elave olundu. Tebrik edirik!";
                                @mysql_query("UPDATE users SET bal = bal + '".$hesab."' WHERE id='".$user_id."'");
                            }
                            else
                            {
                                $msg = "H&#246;rmetli <b>".$us."</b>, Futbol Proqnoz oyununda <b>".$team_one." - ".$team_two."</b> komandalar&#305; aras&#305;nda geden m&#305;barizenin neticeleri belli oldu <u>".$arr_netice."</u>, Hesab: <b>".$shot_one." - ".$shot_two."</b>. Sizin verdiyiniz proqnoz d&#252;zg&#252;n olmad&#305;&#287;&#305;ndan hesab&#305;n&#305;za bal elave olunmad&#305;.";
                            }
                            $time = time()+$vaxt;
                            @mysql_query("INSERT INTO zapiski values(0,'Futbol Proqnoz','7','".$msg."','".$us."','".$usid."','".$time."','0','Futbol Proqnoz neticeleri','".date("d-M-Y H:i")."','1','1');");
                        }
                    }
                    $i = 0;
                    while ($i <= 9)
                    {
                        $st = time();
                        $today = date("H:i", mktime(date("H") + $xsat));
                        $mes = "<img src=\"img/top.gif\" alt=\"Top\"/> <b>Futbol neticeleri</b> - <u><b>".$team_one." - ".$team_two."</b> ".$arr_netice." (".$shot_one." - ".$shot_two.")</u>";
                        $rnd = rand(0, 99999999);
                        @mysql_query("INSERT INTO room$i SET klu4= '".$rnd."', time='".$today."', who='Hakim', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'");
                        ++$i;
                    }
                    $rnd = rand(0, 9);
                    $online = time() + $vaxt;
                    @mysql_query("UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';");
                    echo "Qeyd etdiyiniz oyunun neticeleri deyi&#351;dirildi.<br/>\n";
                }
                else
                {
                    echo "Bazada problem var bir ne&#231;e deqiqe sonra yene yoxlay&#305;n.<br/>\n";
                }
            }
        }
        break;
    }
    if($go)
    {
        echo $divide;
        echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;mod=$mod&amp;ref=$ref\">Admin panel</a><br/>\n";
    }
    break;

    case 6;//add prognoz
    $kafcent = intval($_POST['kafcent']);
    $ball = intval($_POST['ball']);
    $game = intval($_POST['game']);
    $sql = mysql_query("SELECT * FROM football WHERE foot_status='0' and id='".$game."';");
    $fb = mysql_fetch_array($sql);
    $fb_bal = $fb['bal'];
    $fb_date = $fb['foot_date'];
    $curdate = str_replace("/", "", $fb_date);
    $curdate = str_replace(" ", "", $curdate);
    $curdate = str_replace(":", "", $curdate);
    if(mysql_num_rows($sql)==0)
    {
        $error = "Oyun tap&#305;lmad&#305;.";
    }
    else
    if($curdate < date("dmYHi"))
    {
        $error = "Start verilen oyunlara proqnoz vermek olmaz.";
    }else
    if($kafcent<0 and $kafcent>2)
    {
        $error = "Xeta ba&#351; verdi.";
    }
    else
    if($ball<$fb_bal)
    {
        $error = "Bu oyuna proqnoz vermek &#252;&#231;&#252;n oyuna minimum <b>".$fb_bal."</b> bal qoymal&#305;s&#305;z.";
    }
    else
    if($fb_bal>$row['bal'])
    {
        $error = "Bu oyuna proqnoz vermek &#252;&#231;&#252;n hesab&#305;n&#305;zda kifayet qeder bal yoxdur.";
    }
    else
    if($ball> $row['bal'])
    {
        $error = "Ay u&#351;aq ged ba&#351;qa yerde oyne =)";
    }
    else
    if(mysql_num_rows(mysql_query("SELECT * FROM fb_prognoz WHERE football_id='".$game."' and user_id='".$id."';"))!=0)
    {
        $error = "Siz bu oyuna daha &#246;nce proqnoz vermisiz.";
    }
    if($error == true)
    {
        echo $error."<br/>\n";
        echo $divide;
        echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>";
    }
    else
    {
        $pr_sql = mysql_query("INSERT INTO fb_prognoz SET football_id='".$game."', user_id='".$id."', kafcent='".$kafcent."', bal='".$ball."', date='".time()."'");
        if($pr_sql == true)
        {
            echo "Verdiyiniz proqnoz qeyde al&#305;nd&#305;.<br/>\n";
            @mysql_query("UPDATE users SET bal = bal - '".$ball."' WHERE id='".$id."'");
        }
        else
        {
            echo "Bazada problem var bir ne&#231;e deqiqe sonra yene yoxlay&#305;n.<br/>\n";
        }
    }
    break;

    case 7;//duzgun prognozlar
    $fid = intval($_GET['fid']);
    $sql = mysql_query("SELECT * FROM football WHERE id='".$fid."' AND foot_status!='0';");
    if(mysql_affected_rows()==false)
    {
        echo "Oyun tap&#305;lmad&#305;.<br/>\n";
        break;
    }
    $fb = mysql_fetch_array($sql);
    $home_team = $fb['team_one'];
    $user_team = $fb['team_two'];
    $fb_shot = $fb['foot_shot'];

    echo "<u>".$home_team."</u> - <u>".$user_team."</u> oyununa d&#252;zg&#252;n proqnoz verdiler.<br/>";
    echo $divide;
    list($h1,$h2) = split(" - ", $fb_shot);
    if($h1 > $h2)
    {
        $cafcent = 2;
    }
    else if($h1 < $h2)
    {
        $cafcent = 0;
    }
    else
    {
        $cafcent = 1;
    }
    $all = mysql_query("SELECT COUNT(id) FROM fb_prognoz WHERE football_id='".$fid."' AND kafcent='".$cafcent."'");
    $total = mysql_result($all, 0);

    $max = 10;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start=0;
        $end=$max;
    }
    $duzgun = mysql_query("SELECT user_id,kafcent,bal,date FROM fb_prognoz WHERE football_id='".$fid."' AND kafcent='".$cafcent."' ORDER BY date DESC LIMIT $start,$max");
    if(mysql_affected_rows() == false)
    {
        echo "Bu oyuna proqnoz veren olmay&#305;b<br/>\n";
        break;
    }
    while(list($user_id,$kafcent,$bal,$date) = mysql_fetch_array($duzgun))
    {
        if($start!=($page * $max))echo $divide;
        $obj = select_nk($user_id);
        $usid = $obj->id;
        $username = $obj->user;
        $fb_kaficent = $fb['kafcent_'.$kafcent];
        $hesab = sprintf("%01.0f", ($bal * $fb_kaficent));

        echo "<b>Proqnoz&#231;u:</b> [<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$usid."&amp;ref=$ref\">".$username."</a>]<br/>\n";
        echo "<b>Qazand&#305;:</b> (".$fb_kaficent." x ".$bal." = ".$hesab.") bal<br/>\n";
        echo "<b>Tarix:</b> ".cc_tarix($date)."<br/>\n";
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("football.php?mod=$mod&amp;fid=$fid&amp;id=$id&amp;ps=$ps&amp;ref=$ref",$total,$max,$page);
    }
    break;

    case 8;//sehf prognozlar
    $fid = intval($_GET['fid']);
    $sql = mysql_query("SELECT * FROM football WHERE id='".$fid."' AND foot_status!='0';");
    if(mysql_affected_rows()==false)
    {
        echo "Oyun tap&#305;lmad&#305;.<br/>\n";
        break;
    }
    $fb = mysql_fetch_array($sql);
    $home_team = $fb['team_one'];
    $user_team = $fb['team_two'];
    $fb_shot = $fb['foot_shot'];

    echo "<u>".$home_team."</u> - <u>".$user_team."</u> oyununa yanl&#305;&#351; proqnoz verdiler.<br/>";
    echo $divide;
    list($h1,$h2) = split(" - ", $fb_shot);
    if($h1 > $h2)
    {
        $cafcent = 2;
    }
    else if($h1 < $h2)
    {
        $cafcent = 0;
    }
    else
    {
        $cafcent = 1;
    }
    $all = mysql_query("SELECT COUNT(id) FROM fb_prognoz WHERE football_id='".$fid."' AND kafcent!='".$cafcent."'");
    $total = mysql_result($all, 0);

    $max = 10;
    $page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
    $start = (!isset($page)) ? 0 : ($page * $max);
    $end = (!isset($page)) ? $max : ($start + $max);
    if(ceil($total/$max) < $page)
    {
        $start=0;
        $end=$max;
    }
    $duzgun = mysql_query("SELECT user_id,kafcent,bal,date FROM fb_prognoz WHERE football_id='".$fid."' AND kafcent!='".$cafcent."' ORDER BY date DESC LIMIT $start,$max");
    if(mysql_affected_rows() == false)
    {
        echo "Bu oyuna proqnoz veren olmay&#305;b<br/>\n";
        break;
    }
    while(list($user_id,$kafcent,$bal,$date) = mysql_fetch_array($duzgun))
    {
        if($start!=($page * $max))echo $divide;
        $obj = select_nk($user_id);
        $usid = $obj->id;
        $username = $obj->user;

        echo "<b>Proqnoz&#231;u:</b> [<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=".$usid."&amp;ref=$ref\">".$username."</a>]<br/>\n";
        echo "<b>&#304;tirdi:</b> (".$bal.") bal<br/>\n";
        echo "<b>Tarix:</b> ".cc_tarix($date)."<br/>\n";
        ++$start;
    }
    if($total > $max)
    {
        echo navigation("football.php?mod=$mod&amp;fid=$fid&amp;id=$id&amp;ps=$ps&amp;ref=$ref",$total,$max,$page);
    }
    break;
}
echo $divide;
if($mod)
{
    echo "<a href=\"football.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Futbol proqnoz</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
ob_end_flush();
mysql_close($link);
?>