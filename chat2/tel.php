<?php
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$select = @mysql_query( @"Select `user`,`user_ip`,`user_soft`,`level` from `users` where `id`='".@$nk."';" );
if ( mysql_affected_rows( ) == 0 )
{
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
    echo "<wml>\n";
    echo "<card id=\"xeta\" title=\"Xeta\" ontimer=\"chat.php?id={$id}&amp;ps={$ps}{$takep}\"><timer value=\"10\"/>\n";
    echo "<p align=\"center\">\n";
    echo "<small>\n";
    echo "user tap&#305;lmad&#305;!\n";
    echo "</small>\n";
    echo "</p>\n";
    echo "</card>\n";
    echo "</wml>\n";
    mysql_close( $link );
    exit( );
}
$inf = mysql_fetch_array( $select );
$nick = $inf['user'];
$us_ip = $inf['user_ip'];
$us_soft = $inf['user_soft'];
$u_level = $inf['level'];
if ( 4 <= $u_level )
{
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
    echo "<wml>\n";
    echo "<card id=\"xeta\" title=\"Xeta\">\n";
    echo "<p align=\"center\">\n";
    echo "<small>\n";
    echo "R&#252;tbeli &#351;exslerin telefon modeline baxmaq m&#252;mk&#252;n deyil!\n";
    echo "<br/>*****<br/>\n";
    if ( $rm != "" )
    {
        echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    }
    else
    {
        echo "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    }
    echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
    echo "</small>\n";
    echo "</p>\n";
    echo "</card>\n";
    echo "</wml>\n";
    mysql_close( $link );
    exit( );
}
$t_bax = 4;
if ( $row['bal'] < $t_bax )
{
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
    echo "<wml>\n";
    echo "<card id=\"notbal\" title=\"Hesab&#305;n&#305;zda bal azd&#305;r\">\n";
    echo "<p align=\"center\">\n";
    echo $fsize1;
    echo "<b>{$nick}</b>, Nikli istifade&#231;inin <br/> Telefon modeline baxmaq &#252;&#231;&#252;n,\r\n<br/>Size {$t_bax} bal laz&#305;md&#305;r.<br/>*****<br/>\n";
    echo "Hesab&#305;n&#305;zda <b>{$row['bal']}</b>, bal var...<br/>\n";
    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
    echo "<br/>*****<br/>\n";
    if ( $rm != "" )
    {
        echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    }
    else
    {
        echo "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
    }
    echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
    echo $fsize2;
    echo "</p>\n";
    echo "</card>\n";
    echo "</wml>\n";
    mysql_close( $link );
    exit( );
}
$newbal = $row[bal] - $t_bax;
$tubal = "Update `users` set `bal` = '".$newbal."' where `id` ='".$id."'";
mysql_query( $tubal );
ob_start( );
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"xtel\" title=\"{$nick} Tel Modeli\">\n";
echo "<p mode=\"wrap\">\n";
echo $fsize1;
echo "-<b>ID:</b> {$nk}<br/>\n";
echo "-<b>Nick:</b> {$nick}<br/>****\n";
require( "function.php" );
if ( IPcode( $us_ip, 11, 76, 91 ) == "217.168.176" || IPcode( $us_ip, 6, 0, 0 ) == "176.28" || IPcode( $us_ip, 10, 0, 0 ) == "77.244.112" || IPcode( $us_ip, 11, 2, 9 ) == "109.235.192" )
{
    echo "<br/><b>&#199;ata telefonla daxil olur.</b>\n";
    echo "<br/>Daxil olduqu operator\n";
    if ( IPcode( $us_ip, 11, 76, 91 ) == "217.168.176" )
    {
        echo "<u><b>Azercell</b>. (SIM Kart)</u><br/>\n";
    }
    else if ( IPcode( $us_ip, 6, 0, 0 ) == "176.28" )
    {
        echo "<u><b>Bakcell</b>. (CIN Kart)</u><br/>\n";
    }
    else if ( IPcode( $us_ip, 10, 0, 0 ) == "77.244.112" || IPcode( $us_ip, 11, 2, 9 ) == "109.235.192" )
    {
        echo "<u><b>NarMobile</b>. (Nar Kart)</u><br/>\n";
    }
    else
    {
        echo "<b>Bilinmir</b><br/>\n";
    }
    echo "<u>IP Adresi</u>: <b>{$us_ip}</b><br/>\n";
    $marka = strtok( $us_soft, "/" );
    echo "<u>Telefon Markas&#305;: <b>{$marka}</b></u>\n";
}
else
{
    echo "<br/><b>&#199;ata komp&#252;terle daxil olur.</b>\n";
    echo "<br/><u>IP Adresi:</u> {$us_ip}\n";
    echo "<br/><u>Browser:</u> {$us_soft}\n";
}
echo "<br/>----<br/>";
if ( $rm != "" )
{
    echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
else
{
    echo "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush( );
?>
