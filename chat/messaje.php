<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$qiymet=100;

function sehife($base_url, $start, $max_value, $num_per_page) {
        $pgcont = 4;
        $pgcont = (int)($pgcont - ($pgcont % 2)) / 2;
    if ($start >= $max_value)
        $start = max(0, (int)$max_value - (((int)$max_value % (int)$num_per_page) == 0 ? $num_per_page : ((int)$max_value % (int)$num_per_page)));
    else
        $start = max(0, (int)$start - ((int)$start % (int)$num_per_page));
    $base_link = '<a href="' . strtr($base_url, array ('%' => '%%')) . 'start=%d' . ''.$kod.''.$cat.''.$akt.''.$cid.''.$p.''.$nm.'">%s</a> ';
    $pageindex = $start == 0 ? '' : sprintf($base_link, $start - $num_per_page, ' &#171;');
    if ($start > $num_per_page * $pgcont)
        $pageindex .= sprintf($base_link, 0, '1');
    if ($start > $num_per_page * ($pgcont + 1))
        $pageindex .= '... ';
    for ($nCont = $pgcont; $nCont >= 1; $nCont--)
        if ($start >= $num_per_page * $nCont) {
            $tmpStart = $start - $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    $pageindex .= '<b>'.($start / $num_per_page + 1).'</b> ';
    $tmpMaxPages = (int)(($max_value - 1) / $num_per_page) * $num_per_page;
    for ($nCont = 1; $nCont <= $pgcont; $nCont++)
        if ($start + $num_per_page * $nCont <= $tmpMaxPages) {
            $tmpStart = $start + $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    if ($start + $num_per_page * ($pgcont + 1) < $tmpMaxPages)
        $pageindex .= '... ';
    if ($start + $num_per_page * $pgcont < $tmpMaxPages)
        $pageindex .= sprintf($base_link, $tmpMaxPages, $tmpMaxPages / $num_per_page + 1);
    if ($start + $num_per_page < $max_value) {
        $display_page = ($start + $num_per_page) > $max_value ? $max_value : ($start + $num_per_page);
        $pageindex .= sprintf($base_link, $display_page, ' &#187;');
    }
    return $pageindex;
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
$bal = $row['bal'];
if($qiymet > $bal){
echo "<card id=\"xeta\" title=\"Bal Qokku :)\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "&#304;stifade&#231;inin mesajlarini oxumaq &#252;&#231;&#252;n <b>$qiymet</b> baliniz olmalidir<br/>****<br/>Tess&#252;f etmeyin hesabiniza bal y&#252;kleyin :)<br/>\n";
echo $divide;
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hesabina bal y&#252;kle</a><br/>\n";
echo $divide;
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}
if ( $gedis == "1" ){
if ( isset( $_POST['nick'] ) ){
$nick = $_POST['nick'];
}else{
$nick = $_GET['nick'];
}
$latuser = strtolower( $nick );
$query = mysql_query( "select COUNT(id) FROM users WHERE (`latuser` LIKE \"%".$latuser."%\") or (`id`= \"".$nick."\");" );
$all = @mysql_result( @$query, 0 );
if($start=='')$start = 0;
$i = $start + 1;
$yepa = 10;
$sorgu = mysql_query( "SELECT * FROM `users` WHERE (`latuser` LIKE '%".$latuser."%') or (`id`= '".$nick."') order by time ASC limit {$start},{$yepa};" );
if ( $all == "0" ){
echo "<card id=\"error\" title=\"Tap&#305;lmad&#305;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"messaje.php?go=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}else{
echo "<card id=\"a_ok\" title=\"Tap&#305;lanlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "\"<b>{$nick}</b>\" <u>S&#246;z&#252;ne ox&#351;ar leqebler</u>:<br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>{$all}</b>\" nefer:<br/>****<br/>\n";
while ($a = mysql_fetch_array($sorgu)){
$user = $a['user'];
$sex = $a['sex'];
$u_id = $a['id'];
if ( $sex == 0 ){
$cins = "Ki&#351;i";
}else{
$cins = "Qad&#305;n";
}
echo $i.") <a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$u_id}&amp;ref={$ref}\">{$user}</a>- <a href=\"messaje.php?id={$id}&amp;ps={$ps}&amp;nk={$u_id}&amp;ref={$ref}\">[oxu]</a>-{$cins}<br/>";
++$i;
}
echo "****<br/>";
if ($all > $yepa) {
echo sehife('messaje.php?id='.$id.'&amp;ps='.$ps.'&amp;gedis=1&amp;ref='.$ref.'&amp;', $start, $all, $yepa);
echo "<br/>";
echo $divide;
}
echo "<a href=\"messaje.php?get=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}

if ( $get == "tap" )
{
echo "<card id=\"axtar\" title=\"Axtar&#305;&#351;.\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Nick / &#304;D:<br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"Axtar&#305;&#351;\"/><br/>\n";
echo $fsize1;
echo "<anchor>Axtar<go href=\"messaje.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"gedis\" value=\"1\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo "<br/>----<br/><a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal xidmetleri</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}

echo "<card title=\"Mesajlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
if(empty( $act)){
$qq = mysql_query("SELECT * FROM `users` WHERE `id` = '".$nk."';");
if (mysql_affected_rows()==0){
echo "Bele bir user bazada yoxdur.!<br/>$divide";
echo "<a href=\"messaje.php?get=tap&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#171; Geri qay&#305;t</a><br/>\n";
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
exit( );
}

$query = mysql_query( "select COUNT(*) from `mesaj` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7';" );
$all = @mysql_result( @$query, 0 );

if($start=='')$start = 0;
$i = $start + 1;
$yepa = 20;

$q = mysql_query( "select * from `mesaj` where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7' order by time desc limit {$start},{$yepa};" );
$us = mysql_query( "select * from users where id = '".$nk."';" );
$arrs = mysql_fetch_array( $us );
$kimm = $arrs['user'];
echo "<b>$kimm nikinin mesajlari</b>: (<b>{$all}</b>)<br/>*****<br/>";

echo "<a href=\"messaje.php?get=tap&amp;id={$id}&amp;ps={$ps}{$takep2}\">Axtar</a> |\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$takep\">Online</a><br/>----<br/>\n";
$bal = $row['bal'];
$level = $arrs['level'];
$level1 = $row['level'];
if( ( $level > $level1 ) or ( $bal < $qiymet ) ){
echo "Bax bu olmaz ))<br/>---<br/>\n";
}else{
if ( $all == 0 ){
echo "<u>Bu nike aid mesaj yoxdur.</u><br/>\n";
}else{
while ($arr = mysql_fetch_array( $q )){
$kim = $arr['who'];
$kime = $arr['towhom'];
$mesag = $arr['message'];
$read = $arr['readd'];
$klu4 = $arr['klu4'];
$idtowhom = $arr['idtowhom'];
$idwho = $arr['idwho'];
$bal = $row['bal'];
$qiymet=220;
if( $start == 0 ){
mysql_query("UPDATE `users` SET `bal`= ".$bal." - '".$qiymet."'  WHERE `id` = '".$id."';");
}
print " <b>{$i})</b> <font color=\"red\">".$kim."</font> &#187; <font color=\"blue\">".$kime."</font>";
print " -&#187; <u>".$mesag."</u><br/><br/>";
++$i;
}

if ($all > $yepa) {
echo $divide;
echo sehife('messaje.php?id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'&amp;nk='.$nk.'&amp;', $start, $all, $yepa);
echo "<br/>";
}


}

echo "----<br/>";
}



echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref=$ref\">Dehliz</a><br/>";
}

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close( $link );
?>
