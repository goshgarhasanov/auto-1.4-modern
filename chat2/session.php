<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "./file/inc" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$leqeb = $row['user'];
if ( $row['con'] == 5 )
{
mysql_query( "UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';" );
if ( $row['sex'] == 1 )
{
$qadin = "Xanim";
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"qefes\" title=\"Virtual Qefes Xeberleri\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "H&#246;rmetli <b>{$row['user']}</b>. {$qadin} A&#351;a&#287;&#305;dak&#305;lar&#305; Oxuyun!<br/>*****<br/>\n";
echo "Bu Mesaj Size <b>Virtual Qefes</b>-den gelib.<br/>----<br/>\n";
echo "Siz Virtual Qefes oyununda az ses toplayan istifafde&#231;i oldu&#287;unuz &#252;&#231;&#252;n me&#287;lub oldunuz...<br/>\n";
echo "Siz art&#305;q Qefes i&#351;tirak&#231;&#305;s&#305; deyilsiz!<br/>\n";
echo "*****<br/>\n";
echo "<a href=\"qefes.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Virtual Qefes</a><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
exit( );
}
if ( $row['con'] == 1 )
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<card id=\"admn\" title=\"Adminden Mesaj\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
$mesaj = file( "file/dat_folder/mesaj.dat" );
$qara = trim( $mesaj[0] );
$kursiv = trim( $mesaj[1] );
$shekil = trim( $mesaj[2] );
$message = trim( $mesaj[3] );
echo "<b>{$qara}</b><br/>*****<br/>\n";
echo "<u>{$kursiv}</u><br/><br/>\n";
if ( !empty( $shekil ) )
{
echo "<img src=\"http://{$shekil}\" alt=\"Smaylik\" /><br/>\n";
}
if ( !empty( $message ) )
{
echo "{$message}<br/>\n";
}
echo "<br/>****<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_query( "UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 2 )
{
$levelselect = @mysql_query( @"Select name from levels where level='".@$row['level']."'" );
$levels = @mysql_fetch_array( @$levelselect );
$levname = $levels['name'];
if ( $row['sex'] == 1 )
{
$cins = ", Xan&#305;m";
}
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"sysb\" title=\"Sistem Mesaj&#305;\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "H&#246;rmetli <b>{$leqeb}</b>{$cins}<br/>*****<br/>\n";
echo "Siz Bal xidmetlerinden <b>{$levname}</b>, r&#252;tbesi alm&#305;&#351;d&#305;n&#305;z...<br/>\n";
echo "Bu g&#252;n Sizin r&#252;tbenizin vaxt&#305; tamam oldu!<br/>\n";
echo "<u>Siz art&#305;q r&#252;tbeli &#351;exslerden deyilsiniz</u>!\n";
echo "<br/>****<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_query( "UPDATE `users` SET `con`='0', level='0' WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 3 )
{
if ( $row['sex'] == 1 )
{
$cins = ", Xan&#305;m";
}
echo $xml;
echo $dtd;
echo "<wml>";
echo "<card id=\"sysa\" title=\"Sistem Mesaj&#305;\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "H&#246;rmetli <b>{$leqeb}</b>{$cins} Oxuyun<br/>*****<br/>\n";
echo "Size Rehberlik m&#252;veqqeti (vaxt ile) r&#252;tbe vermi&#351;di.<br/>\n";
echo "R&#252;tbenin m&#252;ddeti tamam oldu.\n";
echo "<b>Siz indi r&#252;tbeli &#350;exs deyilsiz!</b><br/>----<br/>\n";
echo "<i>Yeniden r&#252;tbe almaq &#252;&#231;&#252;n bal xidmetinden istifade edin,</i><br/>";
echo "<u>Rehberliyi narahat etmeyin belke yox demeye &#252;z&#252; gelmir, bu o demek deyil ki, &#252;z vurmal&#305;s&#305;z...</u>!\n";
echo "<br/>****<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>\n";
mysql_query( "UPDATE `users` SET `con`='0', `level`='2' WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 4 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"kik\" title=\"Xaric Edilibsiz!\">";
echo "<p align=\"left\">";
echo $fsize1;
$whokik = $row['whokik'];
$whykik = $row['whykik'];
echo "<b>Diqqet Siz Xeberdarl&#305;q Edilirsiz.</b><br/>*****<br/>";
echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
echo "<a href=\"qaydalar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Qaydalar</a>-&#305; oxuyun. h&#252;ququnuzu bilin.<br/>----<br/>";
echo "<i>Qaydalar&#305; pozsan&#305;z xaric edileceksiz</i>!<br/>*****<br/>";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_query( "UPDATE `users` SET `con`='0' WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 5 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"Bal Xidmeti!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>Rengli nikivizin haqq&#305;nda melumat.</b><br/>*****<br/>";
echo "Siz 1 ay bundan evvel bal xidmetlerinden ald&#305;&#287;&#305;n&#305;z Rengli nikin vaxt&#305; tamam oldu!<br/>*****<br/>";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_query( "UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 6 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"Bal Xidmeti!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>G&#246;r&#252;nmezlik haqq&#305;nda melumat.</b><br/>*****<br/>";
echo "Siz 1 ay bundan evvel bal xidmetlerinden nikinizi \"<u>G&#246;r&#252;nmez</u>\" etmi&#351;diz.<br/>Bu g&#252;n \"<u>g&#246;r&#252;nmez</u>\"liyinizin vaxt&#305; tamam oldu!<br/>*****<br/>";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_query( "UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 7 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"Bal Xidmeti!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>Toxunulmazl&#305;q haqq&#305;nda melumat.</b><br/>*****<br/>";
echo "Siz 1 ay bundan evvel bal xidmetlerinden \"<u>Toxunulmazl&#305;q</u>\"  alm&#305;&#351;d&#305;n&#305;z.<br/>Bu g&#252;n Sizin \"<u>Toxunulmazl&#305;q</u>\"&#305;n&#305;z&#305;n vaxt&#305; tamam oldu!<br/>*****<br/>";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_query( "UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( $row['con'] == 8 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"Bal Xidmeti!\">";
echo "<p align=\"center\">";
echo $fsize1;
echo "<b>Toxunulmazl&#305;q haqq&#305;nda melumat.</b><br/>*****<br/>";
echo "Siz 1 ay bundan evvel bal xidmetlerinden \"<u>Toxunulmazl&#305;q</u>\"  alm&#305;&#351;d&#305;n&#305;z.<br/>Bu g&#252;n Sizin \"<u>Toxunulmazl&#305;q</u>\"&#305;n&#305;z&#305;n vaxt&#305; tamam oldu!<br/>*****<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_query( "UPDATE `users` SET `con`='0'  WHERE `id` = '".$id."';" );
mysql_close( $link );
exit( );
}
if ( time( ) < $row['kik'] )
{
$tkick = $row['kik'] - time( );
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
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"kik\" title=\"Xaric Edilibsiz!\">";
echo "<p align=\"left\">";
echo $fsize1;
$whokik = $row['whokik'];
$whykik = $row['whykik'];
echo "<b>".$whokik." Siz Chatdan xaric Edib.</b><br/>*****<br/>";
echo "<u>Xaric olunma m&#252;ddeti</u>: <b>".$tkick." (".$vaxt.")</b><br/>";
echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
echo "<a href=\"qaydalar.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Qaydalar</a>-&#305; oxuyun. <br/>";
echo "Eger sebebsiz xaric edilibsizse Rehberliye m&#252;raciet ede bilersiz....<br/>";
echo "<i>Tebii ki, xaric olunma m&#252;ddeti bitenden sonra</i><br/>*****<br/>";
echo "<u>{$site}</u>\n";
echo "<a href=\"http://{$site}\">&#xbb;&#xbb;&#xbb;</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( $row['level'] < 5 )
{
mysql_query( "Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = '".$HTTP_USER_AGENT."')" );
if ( mysql_affected_rows( ) != 0 )
{
$brayz = strtok( $_SERVER['HTTP_USER_AGENT'], "/" );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"bansoft\" title=\"{$brayz} BAN!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "\"<b>{$brayz}</b>\" Markal&#305; telefon modellerinin &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/> <i>\"<b>{$brayz}</b>\" markal&#305; Telefon modeli Ban Edilib!</i><br/>----<br/>\n";
echo "<a href=\"http://{$site}\">{$site}</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
mysql_query( "Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = 'IP-BAN')" );
if ( mysql_affected_rows( ) != 0 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"ipban\" title=\"{$REMOTE_ADDR} BAN!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "\"<b>{$REMOTE_ADDR}</b>\" IP-Adressi ile &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/>----<br/>\n";
echo "<a href=\"http://{$site}\">{$site}</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
}
else
{
mysql_query( "Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = '".$HTTP_USER_AGENT."')" );
if ( mysql_affected_rows( ) != 0 )
{
$brayz = strtok( $_SERVER['HTTP_USER_AGENT'], "/" );
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"bansoft\" title=\"{$brayz} BAN!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Diqqet!</b><br/>----<br/>\"<b>{$brayz}</b>\" markal&#305; Telefon modelleri BAN oldu.<br/>Sizin R&#252;tbeniz olduqu &#252;&#231;&#252;n Siz &#199;ata daxil ola bilersiz.<br/>----<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
@mysql_query( @"UPDATE `users` SET `banned`='0'  WHERE `id` = '".@$id."';" );
mysql_close( $link );
exit( );
}
mysql_query( "Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = 'IP-BAN')" );
if ( mysql_affected_rows( ) != 0 )
{
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"bansoft\" title=\"{$REMOTE_ADDR} BAN!\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<b>Diqqet!</b><br/>----<br/>\"<b>{$REMOTE_ADDR}</b>\" IP-Adressi ile &#199;ata giri&#351;i ba&#287;lan&#305;b.<br/>Sizin R&#252;tbeniz olduqu &#252;&#231;&#252;n Siz &#199;ata daxil ola bilersiz.<br/>----<br/>\n";
echo "<anchor>Geri Qay&#305;t<prev/></anchor><br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
@mysql_query( @"UPDATE `users` SET `banned`='0'  WHERE `id` = '".@$id."';" );
mysql_close( $link );
exit( );
}
}
if ( $row['banned'] == 1 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"BAN!\">";
echo "<p align=\"center\">";
echo $fsize1;
$whokik = $row['whokik'];
$whykik = $row['whykik'];
echo "<b>".$whokik." Siz BAN Edib.</b><br/>*****<br/>";
if ( $whykik != "" )
{
echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
}
echo "<a href=\"http://{$site}\">{$site}</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( $row['banned'] == 2 )
{
echo $xml;
echo $dtd;
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"bxid\" title=\"Silinib!\">";
echo "<p align=\"center\">";
echo $fsize1;
$whokik = $row['whokik'];
$whykik = $row['whykik'];
echo "<b>".$whokik." Sizin leqebinizi Silib.</b><br/>*****<br/>";
if ( $whykik != "" )
{
echo "<b>Sebeb</b>: ".$whykik."<br/>----<br/>";
}
echo "<a href=\"http://{$site}\">{$site}</a><br/>";
echo $fsize2;
echo "</p></card></wml>";
mysql_close( $link );
exit( );
}
if ( 3 <= $row['banned'] )
{
@mysql_query( @"UPDATE `users` SET `banned`='0' WHERE `id` = '".@$id."';" );
}
if ( $row['con'] == "0" )
{
@mysql_query( @"UPDATE `users` SET `con`='0' WHERE `id` = '".@$id."';" );
if ( $rm != "" )
{
header( "Location: chat.php?id={$id}&ps={$ps}&rm={$rm}&ref={$ref}" );
}
else
{
header( "Location: enter.php?id={$id}&ps={$ps}&ref={$ref}" );
}
exit( );
}
?>
