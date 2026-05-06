<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2, $P_ARR) = check_login($link);

if ($P_ARR[35]!=1 OR ($P_ARR[147]==0 AND $P_ARR[148]==0 AND $P_ARR[149]==0))
{
    echo $xml;
    echo $dtd;
    echo "<wml>\n";
    echo "<card id=\"xeta\" title=\"xeta\">\n";
    echo "<p align=\"center\">\n";
    echo $fsize1;
    echo "Daxil Olma Icazeniz Yoxdur!<br/>\n";
    echo $fsize2;
    echo "</p>\n";
    echo "</card>\n";
    echo "</wml>\n";
    mysql_close( $link );
    exit( );
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.3//EN\" \"http://www.wapforum.org/DTD/wml13.dtd\"><wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"areklam\" title=\"Anti-Reklam\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

$t = mysql_escape_string( $_GET['t'] );
if ( isset( $key ) )
{
    $key = trim( mysql_escape_string( $_GET['key'] ) );
}

    if ( $_GET['b'] != "" )
    {
        $issetb = "&amp;b={$b}";
    }
    else
    {
        $issetb = false;
    }
    if ( $_GET['key'] != "" )
    {
        $issetk = "&amp;key={$key}";
    }
    else
    {
        $issetk = false;
    }
    if ( $b != 1 )
    {
        if ( $key != "" )
        {
            $query = mysql_query( "SELECT COUNT(`banmsg`) FROM `auto_ban_v2` WHERE `banmsg` = '".base64_decode( $key )."';" );
            $all_reklam = @mysql_result( $query, 0 );
            if($P_ARR[149]==0)
            {
                echo "Reklamlari oxumaq icazeniz yoxdur.<br/>\n";
            }
            else if ( $all_reklam == 0 )
            {
                echo "Melumat yoxdur.<br/>\n";
            }
            else
            {
            echo "<i><u>".base64_decode( $key )."</u> - qada&#287;an olunmu&#351; s&#246;ze g&#246;re cezalananlar.</i><br/>----<br/>\n";
            $num = 12;
            @$p = ( integer )$_GET['p'];
            $total = ( $all_reklam - 1 ) / $num + 1;
            $total = intval( $total );
            $p = intval( $p );
            if ( empty( $p ) || $p < 0 )
            {
                $p = 1;
            }
            if ( $total < $p )
            {
                $p = $total;
            }
            $start = $p * $num - $num;
            $r = mysql_query( "SELECT * FROM `auto_ban_v2` WHERE `banmsg` = '".base64_decode( $key )."' order by `id` desc LIMIT {$start},{$num};" );
            while ( $inf = mysql_fetch_array( $r ) )
            {
                $usid = $inf['usid'];
                $user = $inf['user'];
                $message = $inf['message'];
                $sebeb = $inf['sebeb'];
                $banned = $inf['banned'];
                $banmsg = $inf['banmsg'];
                $time = $inf['time'];
                if ( $usid != 0 )
                {
                    echo "<a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">{$user}</a>\n";
                }
                echo "{$message}<br/>\n";
            }
            }
            echo $divide;
            echo "<a href=\"panel.php?id={$id}&amp;ps=".$ps.$issetb."&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
        }
        else
        {
            if ( $b != 1 )
            {
                echo "Reklama g&#246;re |\n";
            }
            else
            {
                echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Reklama g&#246;re</a> |\n";
            }
            if ( $b == 1 )
            {
                echo "Bana g&#246;re<br/>\n";
            }
            else
            {
                echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b=1&amp;ref={$ref}\">Bana g&#246;re</a><br/>\n";
            }
            echo $divide;
            $query = mysql_query( "SELECT COUNT(DISTINCT `banmsg`) FROM `auto_ban_v2`;" );
            $all_reklam = @mysql_result( $query, 0 );
            if ( $all_reklam == 0 )
            {
                echo "Melumat yoxdur.<br/>\n";
            }
            else
            {
            $num = 12;
            @$p = ( integer )$_GET['p'];
            $total = ( $all_reklam - 1 ) / $num + 1;
            $total = intval( $total );
            $p = intval( $p );
            if ( empty( $p ) || $p < 0 )
            {
                $p = 1;
            }
            if ( $total < $p )
            {
                $p = $total;
            }
            $start = $p * $num - $num;
            $r = mysql_query( "SELECT DISTINCT `banmsg` FROM `auto_ban_v2` order by `id` desc LIMIT {$start},{$num};" );
            while ( $inf = mysql_fetch_array( $r ) )
            {
                $information = $inf['banmsg'];
                echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;key=".base64_encode( $information )."&amp;ref={$ref}\">{$information}</a><br/>\n";
            }
        }
    }
    }
    else
    {
        if ( $ban != "" )
        {
            $ban = trim( mysql_escape_string( $_GET['ban'] ) );
            $query = mysql_query( "SELECT COUNT(`banmsg`) FROM `auto_ban_v2` WHERE `banned` = '".$ban."';" );
            $all_reklam = @mysql_result( $query, 0 );
            if($P_ARR[149]==0)
            {
                echo "Reklamlari oxumaq icazeniz yoxdur.<br/>\n";
                echo $divide;
                echo "<a href=\"panel.php?id={$id}&amp;ps=".$ps.$issetb."&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
            }
            else if ( $all_reklam == 0 )
            {
                echo "Melumat yoxdur.<br/>\n";
                echo $divide;
                echo "<a href=\"panel.php?id={$id}&amp;ps=".$ps.$issetb."&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
            }
            else
            {
            if ( $ban == 0 )
            {
                $bantitlename = "G&#246;ndere bilmeyenler";
            }
            else if ( $ban == 1 )
            {
                $bantitlename = "BAN Olanlar";
            }
            else if ( $ban == 2 )
            {
                $bantitlename = "Silinenler";
            }
            else if ( $ban == 3 )
            {
                $bantitlename = "Tam iqnor";
            }
            else if ( $ban == 4 )
            {
                $bantitlename = "Xaric edilenler";
            }
            echo "Qada&#287;an olunmu&#351; s&#246;zlerden <b>".$bantitlename."</b><br/>----<br/>\n";
            $num = 12;
            @$p = ( integer )$_GET['p'];
            $total = ( $all_reklam - 1 ) / $num + 1;
            $total = intval( $total );
            $p = intval( $p );
            if ( empty( $p ) || $p < 0 )
            {
                $p = 1;
            }
            if ( $total < $p )
            {
                $p = $total;
            }
            $start = $p * $num - $num;
            $r = mysql_query( "SELECT * FROM `auto_ban_v2` WHERE `banned` = '".$ban."' order by `id` desc LIMIT {$start},{$num};" );
            while ( $inf = mysql_fetch_array( $r ) )
            {
                $usid = $inf['usid'];
                $user = $inf['user'];
                $message = $inf['message'];
                $sebeb = $inf['sebeb'];
                $banned = $inf['banned'];
                $banmsg = $inf['banmsg'];
                $time = $inf['time'];
                if ( $usid != 0 )
                {
                    echo "<a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">{$user}</a>\n";
                }
                echo "{$message}<br/>\n";
            }
            echo $divide;
            echo "<a href=\"panel.php?id={$id}&amp;ps=".$ps.$issetb."&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
          }
        }
        else
        {
            if ( $b != 1 )
            {
                echo "Reklama g&#246;re |\n";
            }
            else
            {
                echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Reklama g&#246;re</a> |\n";
            }
            if ( $b == 1 )
            {
                echo "Bana g&#246;re<br/>\n";
            }
            else
            {
                echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b=1&amp;ref={$ref}\">Bana g&#246;re</a><br/>\n";
            }
            echo $divide;
            echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;ban=0&amp;ref={$ref}\">Deaktiv</a><br/>\n";
            echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;ban=1&amp;ref={$ref}\">Ban olanlar</a><br/>\n";
            echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;ban=2&amp;ref={$ref}\">Silinenler</a><br/>\n";
            echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;ban=3&amp;ref={$ref}\">Tam iqnor</a><br/>\n";
            echo "<a href=\"panel.php?id={$id}&amp;ps={$ps}&amp;b={$b}&amp;ban=4&amp;ref={$ref}\">Vaxt ile qovulanlar</a><br/>\n";
        }
    }
    $url_for_pstr = "panel.php?id={$id}&amp;ps=".$ps.$issetb.$issetk."&amp;p=";
    if ( 0 < $p - 3 )
    {
        $p3left = ( ( " <a href=\"".$url_for_pstr.( $p - 3 ) )."&amp;{$ref}\">".( $p - 3 ) )."</a> | ";
    }
    if ( 0 < $p - 2 )
    {
        $p2left = ( ( " <a href=\"".$url_for_pstr.( $p - 2 ) )."&amp;{$ref}\">".( $p - 2 ) )."</a> | ";
    }
    if ( 0 < $p - 1 )
    {
        $p1left = ( ( " <a href=\"".$url_for_pstr.( $p - 1 ) )."&amp;{$ref}\">".( $p - 1 ) )."</a> | ";
    }
    if ( $p + 3 <= $total )
    {
        $p3right = ( ( " | <a href=\"".$url_for_pstr.( $p + 3 ) )."&amp;{$ref}\">".( $p + 3 ) )."</a>";
    }
    if ( $p + 2 <= $total )
    {
        $p2right = ( ( " | <a href=\"".$url_for_pstr.( $p + 2 ) )."&amp;{$ref}\">".( $p + 2 ) )."</a>";
    }
    if ( $p + 1 <= $total )
    {
        $p1right = ( ( " | <a href=\"".$url_for_pstr.( $p + 1 ) )."&amp;{$ref}\">".( $p + 1 ) )."</a>";
    }
    if ( 1 < $total )
    {
        echo $divide;
        echo $p3left.$p2left.$p1left."<b>".$p."</b>".$p1right.$p2right.$p3right."<br/>";
    }
echo $divide;
if($P_ARR[147]==1)
{
    if ( $issetk == false && $ban == "" )
    {
        echo "&#187;<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;go=arek&amp;ref={$ref}\">Elave Et</a><br/>----<br/>\n";
    }
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a> |\n";
if($P_ARR[0]==1)echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );

?>