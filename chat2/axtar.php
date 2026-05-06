<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
WHO("-","-",BASENAME(__FILE__));
if ( !isset( $bol ) )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"axtar\" title=\"Axtar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Leqeb / ID:</b><br/>\n";
echo $fsize2;
echo "<input name=\"nick\" title=\"Axtar&#305;&#351;\"/><br/>\n";
echo "<select name=\"replice{$ref}\">\n";
echo "<option value=\"0\">Deqiq</option>\n";
echo "<option value=\"1\">Ox&#351;arlar</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "<anchor>Axtar<go href=\"axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"bol\" value=\"$(replice{$ref})\"/>\n";
echo "<postfield name=\"nick\" value=\"$(nick)\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>";
echo $fsize1;
echo $divide;
echo "<a href=\"axtar.php?bol=all&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#220;mumi Axtar&#305;&#351;</a><br/>\n";
echo $fsize2;
echo $fsize1;
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( $bol == "all" )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"a_sis\" title=\"&#220;mumi Axtar&#305;&#351;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>&#220;mumi Axtar&#305;&#351;:</b><br/>\n";
echo $divide;
echo "Cinsi:<br/>\n";
echo $fsize2;
echo "<select name=\"sex{$ref}\">\n";
echo "<option value=\"2\">Vacib deyil</option>\n";
echo "<option value=\"0\">Ki&#351;i</option>\n";
echo "<option value=\"1\">Xan&#305;m</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Yasi:<br/>\n";
echo $fsize2;
echo "<select name=\"yash1{$ref}\">";
$gun = array( "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38" );
$gun2 = array( "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980", "1979", "1978", "1977", "1976", "1975", "1974", "1973", "1972" );
$g = 0;
while ( $g <= 28 )
{
echo "<option value=\"".$gun2[$g]."\">".$gun[$g]."</option>";
++$g;
}
echo "</select>\n";
echo $fsize1;
echo "den -\n";
echo $fsize2;
echo "<select name=\"yash2{$ref}\">";
$gun = array( "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38" );
$gun2 = array( "2000", "1999", "1998", "1997", "1996", "1995", "1994", "1993", "1992", "1991", "1990", "1989", "1988", "1987", "1986", "1985", "1984", "1983", "1982", "1981", "1980", "1979", "1978", "1977", "1976", "1975", "1974", "1973", "1972" );
$g = 28;
while ( 0 <= $g )
{
echo "<option value=\"".$gun2[$g]."\">".$gun[$g]."</option>";
--$g;
}
echo "</select>";
echo $fsize1;
echo "dek<br/>\n";
echo "Yaln&#305;z onlaynda olanlar?<br/>\n";
echo $fsize2;
echo "<select name=\"line{$ref}\">\n";
echo "<option value=\"2\">Xeyr</option>\n";
echo "<option value=\"1\">Beli</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "Yaln&#305;z foto &#351;ekli olanlar?<br/>\n";
echo $fsize2;
echo "<select name=\"foto{$ref}\">\n";
echo "<option value=\"2\">Xeyr</option>\n";
echo "<option value=\"1\">Beli</option>\n";
echo "</select><br/>\n";
echo $fsize1;
echo "<anchor>[Axtar]<go href=\"axtar.php?bol=2&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
echo "<postfield name=\"sex\" value=\"$(sex{$ref})\"/>\n";
echo "<postfield name=\"yash1\" value=\"$(yash1{$ref})\"/>\n";
echo "<postfield name=\"yash2\" value=\"$(yash2{$ref})\"/>\n";
echo "<postfield name=\"line\" value=\"$(line{$ref})\"/>\n";
echo "<postfield name=\"foto\" value=\"$(foto{$ref})\"/>\n";
echo "</go></anchor>\n";
echo $fsize2;
echo "<br/>";
echo $fsize1;
echo $divide;
echo "<a href=\"axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Ferdi Axtar&#305;&#351;</a><br/>\n";
echo $fsize2;
echo $fsize1;
echo $divide;
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( $bol == "1" )
{
$latuser = strtolower( $nick );
$b2 = "2";
if ( isset( $_POST['nick'] ) )
{
$nick = $_POST['nick'];
}
else
{
$nick = $_GET['nick'];
}
$query = mysql_query( "select COUNT(id) FROM users WHERE (`latuser` LIKE \"%".$latuser."%\") or (`id`= \"".$nick."\") and (`banned`!= \"".$b2."\");" );
$all = @mysql_result( @$query, 0 );
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $all / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $all < $do )
{
$do = $all;
}
$o = $ot - 1;
$ff = $ot;
if ( $do == 0 )
{
$ff = $o;
}
$sorgu = mysql_query( "SELECT * FROM `users` WHERE (`latuser` LIKE '%".$latuser."%') or (`id`= '".$nick."') and `banned`!='".$b2."' order by time ASC limit {$o},{$do};" );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
if ( $all == "0" )
{
echo "<card id=\"a_not\" title=\"Tap&#305;lmad&#305;\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
}
else
{
echo "<card id=\"a_ok\" title=\"Tap&#305;lanlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "\"<b>{$nick}</b>\" <u>S&#246;z&#252;ne ox&#351;ar leqebler</u>:<br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>{$all}</b>\" nefer:<br/>****<br/>\n";
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $sorgu );
$u_user = $a['user'];
$sex = $a['sex'];
$u_id = $a['id'];
if ( $sex == 0 )
{
$cins = "Ki&#351;i";
}
else
{
$cins = "Qad&#305;n";
}
echo $i.") <a href=\"axtar.php?bol=0&amp;id={$id}&amp;ps={$ps}&amp;nick={$u_user}&amp;ref={$ref}\">{$u_user}</a>-{$cins}<br/>";
++$i;
}
echo "****<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"axtar.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;nick={$nick}&amp;ref={$ref}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $all / 10;
$test = round( $tes );
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $all < $do )
{
$do = $all;
}
echo " | <a href=\"axtar.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;nick={$nick}&amp;ref={$ref}\">{$do}&gt;&gt;</a>\n";
}
if ( 1 <= $s && 10 < $all )
{
echo "<br/>";
}
echo "<a href=\"axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
}
if ( $bol == "2" )
{
if ( $sex < 0 || 1 < $sex )
{
$sex = 2;
}
if ( empty( $yash1 ) )
{
$yash1 = "1989";
}
if ( empty( $yash2 ) )
{
$yash2 = "1980";
}
if ( empty( $line ) )
{
$line = 2;
}
if ( $foto == 1 )
{
$if_foto = "AND `img` != '0'";
}
else
{
$if_foto = "";
}
if ( $line == 1 )
{
$if_online = "AND `time` > '".time( )."'";
}
else
{
$if_online = "";
}
if ( $sex != 2 )
{
$if_sex = "AND `sex` = '".$sex."'";
}
$sorgu = "SELECT * FROM `users` WHERE `year`  >= '".$yash2."' and `banned`!='2' AND `year` <= '".$yash1."' {$if_foto} {$if_online} {$if_sex}";
$sorgu1 = mysql_query( $sorgu." ORDER BY `id` ASC" );
$alls = mysql_num_rows( $sorgu1 );
if ( isset( $_GET['s'] ) )
{
$s = intval( $_GET['s'] );
}
else
{
$s = 0;
}
if ( $s < 0 )
{
$s = 0;
}
if ( $alls < $s )
{
$s = 0;
}
$c = $s + 1;
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
if ( $alls == 0 )
{
echo "<card id=\"a_not\" title=\"Tap&#305;lmad&#305;\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
echo $divide;
echo "<a href=\"axtar.php?bol=all&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
else
{
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $alls / 10 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $alls < $do )
{
$do = $alls;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo "<card id=\"a_ok\" title=\"Tap&#305;lanlar\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<u>Tap&#305;lanlar</u><br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>{$alls}</b>\" nefer:<br/>****<br/>\n";
$r = mysql_query( $sorgu." ORDER BY `id` ASC  LIMIT {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$a = mysql_fetch_array( $r );
$u_user = $a['user'];
$images = $a['img'];
$u_id = $a['id'];
$year = $a['year'];
$sex = $a['sex'];
if ( $sex == 0 )
{
$cins = "Ki&#351;i";
}
else
{
$cins = "Qad&#305;n";
}
$year = date( "Y" ) - $year;
if ( $images != "0" )
{
$albom = @mysql_query( @"SELECT photo FROM `albom` WHERE `idfoto`='".@$u_id."' order by vote desc;" );
$img = mysql_fetch_array( $albom );
$photos = $img['photo'];
if ( file_exists( "photos/".$u_id."/".$photos."" ) )
{
$daroq = getimagesize( "photos/{$u_id}/{$photos}" );
}
$n_nam = $daroq[2];
if ( $n_nam == "1" )
{
$img_type = "gif";
}
else if ( $n_nam == "2" )
{
$img_type = "jpg";
}
else if ( $n_nam == "3" )
{
$img_type = "png";
}
else
{
$img_type = "error";
}
$photo = "<img src=\"image.php?img=photos/{$u_id}/{$photos}&amp;size=40\" alt=\"{$u_user}\"/>\n";
}
echo "".$i.")";
if ( $img_type != "error" )
{
echo $photo;
}
echo " <a href=\"axtar.php?bol=0&amp;id={$id}&amp;ps={$ps}&amp;nick={$u_user}&amp;ref={$ref}\">{$u_user}</a> ya&#351;&#305;: {$year}  {$cins}<br/>";
++$i;
}
echo "****<br/>";
$next = $s + 1;
$prev = $s - 1;
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"axtar.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;sex={$sex}&amp;yash1={$yash1}&amp;yash2={$yash2}&amp;line={$line}&amp;foto={$foto}&amp;ref={$ref}\">&lt;&lt;{$ot}</a>.\n";
}
$tes = $alls / 10;
$test = round( $tes );
if ( $s < $test )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $alls < $do )
{
$do = $alls;
}
echo " | <a href=\"axtar.php?bol={$bol}&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;sex={$sex}&amp;yash1={$yash1}&amp;yash2={$yash2}&amp;line={$line}&amp;foto={$foto}&amp;ref={$ref}\">{$do}&gt;&gt;</a>\n";
}
if ( 1 <= $s && 10 < $alls )
{
echo "<br/>";
}
echo "<a href=\"axtar.php?bol=all&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
}
}
if ( $bol == "0" )
{
if ( !ctype_digit( $nick ) )
{
$nick = trim( $nick );
if ( $nick == "" )
{
$nick = 0;
}
$latuser = strtolower( $nick );
$select = @mysql_query( @"Select * from users where latuser = '".@$latuser."' and banned!='2'" );
}
else
{
$select = @mysql_query( @"Select * from users where id='".@$nick."' and banned!='2'" );
}
if ( mysql_affected_rows( ) == 0 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"xeta\" title=\"Xeta\">";
echo "<p align=\"left\">";
echo $fsize1;
echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>";
echo "*****<br/>";
echo "<a href=\"axtar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Axtar&#305;&#351;</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
$takep = "&amp;ref={$ref}";
$inf = mysql_fetch_array( $select );
$nk = $inf['id'];
$nick = $inf['user'];
$name = $inf['name'];
$sex = $inf['sex'];
$time = $inf['time'];
$nastroi = $inf['nastroi'];
$para = $inf['para'];
$tox = $inf['tox'];
$mexvi = $inf['mexvi'];
$level = $inf['level'];
$img = $inf['img'];
$levelselect = @mysql_query( @"Select name from levels where level='".@$level."'" );
$levels = @mysql_fetch_array( @$levelselect );
$levname = $levels['name'];
ob_start( );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"info\" title=\"{$nick} haqq&#305;nda\">\n";
echo "<p mode=\"wrap\">\n";
echo $fsize1;
echo "\"<b>{$nick}</b>\" haqq&#305;nda melumat...<br/>";
echo $divide;
echo "<a href=\"mektub.php?bol=yaz&amp;id={$id}&amp;ps={$ps}&amp;to={$nick}{$takep}\">Mektub Yaz</a><br/>\n";
if ( $mexvi != 0 && $row['level'] < 7 )
{
echo "<b>Bu istifade&#231;i Tam Mexvidir.</b><br/>";
if ( 3 < $row['level'] )
{
echo "----<br/><b><a href=\"ceza.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">Cezaland&#305;r</a></b><br/>\n";
}
}
else
{
if ( $zn != "" )
{
$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";
}
echo "-ID n&#246;mresi: <b>{$nk}</b> {$zn}<br/>\n";
echo "-Nike <a href=\"ses.php?mod=votes1&amp;id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">1</a>-";
echo "<a href=\"ses.php?mod=votes5&amp;id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">5</a>-";
echo "<a href=\"ses.php?mod=votes10&amp;id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">10</a> Ses Ver!<br/>";
echo "<b>-Ad&#305;:</b> {$name}<br/>\n";
if ( $img != "0" )
{
echo "<a href=\"img_a.php?img={$nk}&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep}\">Foto Albom</a> ({$img})<br/>\n";
}
else
{
echo "<u>&#350;ekili Yoxdur</u><br/>\n";
}
if ( $nastroi != "" )
{
echo "<b>-Ehval&#305;:</b> {$nastroi}<br/>\n";
}
if ( $sex == "0" )
{
echo "<b>-Cinsi:</b> Ki&#351;i<br/>\n";
}
else if ( $sex == "1" )
{
echo "<b>-Cinsi:</b> Qad&#305;n<br/>\n";
}
if ( 3 < $level && $mexvi == "0" )
{
echo "<b>-R&#252;tbe: <u>{$levname}</u></b><br/>\n";
}
if ( $para != "" )
{
echo "<u>-Heyat yolda&#351;&#305;:</u> <b>{$para}</b> <a href=\"axtar.php?go=view&amp;id={$id}&amp;ps={$ps}&amp;nick={$para}&amp;rm={$rm}&amp;{$ref}\"><img src=\"img/uzuk.gif\"/></a><br/>\n";
}
echo $divide;
if ( time( ) <= $time )
{
echo "<b>Online</b>: <img src=\"img/online.gif\"/><br/>\n";
}
else
{
$tkick = time( ) - $time;
if ( $tkick < 60 && 0 < $tkick )
{
$vaxt = "saniyye\n";
}
else if ( $tkick < 3600 && 60 < $tkick )
{
$new = $tkick;
$tkick = $new / 60;
$vaxt = "deqiqe\n";
}
else if ( $tkick < 86400 && 3600 < $tkick )
{
$new = $tkick;
$tkick = $new / 3600;
$vaxt = "saat\n";
}
else if ( 86400 < $tkick )
{
$new = $tkick;
$tkick = $new / 86400;
$vaxt = "g&#252;n\n";
}
$tkick = round( $tkick );
echo "<b>Offline</b>: <img src=\"img/offline.gif\"/>\n";
if ( 8 < $level && $row['level'] < 8 )
{
echo "<i>Melumat yoxdur(((</i><br/>\n";
}
else
{
echo "<i>({$tkick} {$vaxt} evvel &#199;atdan &#231;&#305;x&#305;b.)</i><br/>\n";
}
}
echo $divide;
$qed = mysql_query( "SELECT COUNT(*)  FROM `hediyye_box` WHERE `uid` = '".$nk."';" );
$hedi = mysql_result( $qed, 0 );
$qes = mysql_query( "SELECT COUNT(*)  FROM `fikirler` WHERE `uid` = '".$nk."';" );
$su = mysql_result( $qes, 0 );
echo "[<a href=\"padarka.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;rm={$rm}&amp;r={$ref}\">Hediyyeleri</a>({$hedi})]<br/>\n";
echo "[<a href=\"fikirler.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;rm={$rm}&amp;{$ref}\">Xatire Defteri</a>({$su})]<br/>\n";
echo "<b>[<a href=\"tel.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;rm={$rm}&amp;r={$ref}\">Tel Modeline bax</a>]</b><br/>\n";
echo "[<b><anchor>Tam Melumat<go href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;re={$ref}\" method=\"post\">";
echo "<postfield name=\"info\" value=\"open\"/>";
echo "</go></anchor></b>]<br/>\n";
if ( $mexvi != 0 )
{
echo "<b>Bu &#304;stifade&#231;i Mexvidir</b><br/>\n";
}
echo "----<br/>\n";
if ( 3 < $row['level'] )
{
echo "<b><a href=\"ceza.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">Cezaland&#305;r</a></b><br/>\n";
}
echo "<a href=\"ignor.php?mod=add&amp;id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">&#304;gnor et(he&#231;ne yazmas&#305;n)</a><br/>\n";
echo "<a href=\"friends.php?mod=add&amp;id={$id}&amp;ps={$ps}&amp;nick={$nk}{$takep}\">Dostlara elave et</a><br/>\n";
echo $divide;
if ( $row['level'] < 4 && $level < 4 && $inf['tox'] != 1 )
{
echo "[<a href=\"hesab.php?bolme=x&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;{$ref}\">&#199;atdan Xaric et</a>]<br/>\n";
}
if ( $inf['tox'] == 1 )
{
echo "<u>Bu &#304;stifade&#231;i Toxunulmazd&#305;r</u><br/>\n";
}
}
if ( $row['level'] == 9 )
{
echo $divide;
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}{$takep}\">Mesajlar&#305;n&#305; oxu</a><br/>\n";
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;rm=0{$takep}\">Mektublar&#305;n&#305; oxu</a><br/>\n";
}
if ( 4 <= $row['level'] )
{
echo "----<br/>";
if ( $row['level'] == 9 && ( $level != 9 || $id == 1 ) )
{
echo "<u><b>&#350;ifresi:</b> ".base64_decode( "{$inf['pass']}" )."</u><br/>\n";
}
if ( $level < $row['level'] || 4 <= $row['level'] && $id == 1 )
{
echo "<b>IP: {$inf['user_ip']}</b><br/>\n";
echo "<u><b>Soft:</b> {$inf['user_soft']}</u><br/>\n";
echo "----<br/>";
}
else if ( $level == 9 )
{
echo "<i><b>Rehberlik haqq&#305;nda Melumat Verilmir</b></i><br/>";
}
}
}
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\" accesskey=\"0\">Dehliz</a>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_close( $link );
ob_end_flush( );
?>
