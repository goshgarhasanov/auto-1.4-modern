<?
header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,) = check_login($link);
WHO("-","-",BASENAME(__FILE__));
$user = $row['user'];
$level = $row['level'];
$bal = $row['bal'];
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card title=\"Reytinq\">\n";
switch($mod) {


case "ses" :
$bals = file( "file/bal_bot/0.dat" );
$r_bal = trim( $bals[18] );
$fp = file( "file/dat_folder/reytinq.dat" );
if ( $fp[0] == 2 )
{
echo "<p align=\"center\">\n";
print $fsize1;
print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
print $fsize2;
break;
}
if ( $fp[0] == 1 )
{
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Sesverme dayand&#305;r&#305;l&#305;b...<br/>";
echo $fsize2;
break;
}
if ( !isset( $_POST['action'] ) )
{
if ( isset( $usid ) )
{
$user = @mysql_fetch_array( @mysql_query( @"Select user from users where id = '".@$usid."' LIMIT 1;" ) );
}
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Beyendiyin istifade&#231;iye ses ver onu reytinqde 1-ci et:<br/><i>1-ses, {$r_bal}-bal deyerindedir</i>.<br/>*****<br/>\n";
echo "<b>Leqeb / ID</b><br/>\n";
echo $fsize2;
echo "<input name=\"usid\" maxlength=\"20\" value=\"{$user['0']}\"/><br/>\n";
echo $fsize1;
$agent = htmlentities( addslashes( $HTTP_USER_AGENT ) );
if ( strpos( $agent, "M3Gate" ) !== false || strpos( $agent, "Opera" ) !== false || strpos( $agent, "emulator" ) !== false || strpos( $agent, "WinWAP" ) !== false || strpos( $agent, "Wapsilon" ) !== false || strpos( $agent, "Mozilla" ) !== false || strpos( $agent, "M3GATE" ) !== false )
{
echo "<b>Ses</b> - - - -\n";
}
else
{
echo "<b>Ses</b><br/>\n";
}
echo $fsize2;
echo "<input size=\"6\" name=\"send{$ref}\" maxlength=\"6\" format=\"*N\"/><br/>";
echo $fsize1;
echo "[<anchor title=\"ok\">Ses ver<go href=\"reytinq.php?mod=ses&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
echo "<postfield name=\"nick\" value=\"$(usid)\"/>";
echo "<postfield name=\"send\" value=\"$(send{$ref})\"/>";
echo "<postfield name=\"action\" value=\"qeyd\"/>";
echo "</go></anchor>]<br/>";
echo $fsize2;
}
else
{
$sends = $send * $r_bal;
if ( $bal < $sends || $sends <= 0 )
{
echo "<p align=\"center\">\n";
echo $fsize1;
echo "H&#246;rmetli <u>{$user}</u>, 1 ses - {$r_bal} bal deyerindedir.<br/><b>{$send}</b>-ses &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$sends}</b>-bal olmal&#305;d&#305;r!<br/>";
echo "-=-<br/>";
echo "Hesab&#305;n&#305;zda <b>{$bal}</b>, bal var.<br/>";
echo "-=-<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
echo "<a href=\"reytinq.php?mod=ses&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
print $fsize2;
break;
}
$nick = trim( $nick );
if ( !ctype_digit( $nick ) )
{
if ( $nick == "" )
{
$nick = 0;
}
$latuser = strtolower( $nick );
$q = mysql_query( "select user,id,ses from users where latuser='".$latuser."';" );
}
else
{
$q = mysql_query( "select user,id,ses from users where id='".$nick."';" );
}
if ( mysql_affected_rows( ) == 0 )
{
echo "<p align=\"center\">\n";
echo $fsize1;
echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>";
echo "-=-<br/>";
echo "<a href=\"reytinq.php?mod=ses&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri qay&#305;t</a><br/>\n";
echo $fsize2;
break;
}
$data = mysql_fetch_array( $q );
$usid = $data['id'];
$myses = $data['ses'];
$ishtirak = mysql_query( "select ses from reytinq where kim = '".$id."' and kime = '".$usid."'" );
if ( mysql_affected_rows( ) == 0 )
{
mysql_query( "Insert into reytinq set kim='".$id."', kime='".$usid."', ses='".$send."'" );
$sens = $send;
}
else
{
$cc = mysql_fetch_array( $ishtirak );
$rses = $cc['ses'];
$sens = $rses + $send;
$qebul1 = "Update `reytinq` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$usid."' where kim = '".$id."' and kime = '".$usid."'";
mysql_query( $qebul1 );
}
$sens = $myses + $send;
mysql_query( "Update users set ses='".$sens."' where id='".$usid."'" );
$bal = $row['bal'];
$newbal = $bal - $sends;
mysql_query( "Update users set bal='".$newbal."' where id='".$id."'" );
$login = $data['user'];
echo "<p align=\"center\">\n";
echo $fsize1;
echo "H&#246;rmetli <u>{$user}</u>, siz &#246;z hesab&#305;n&#305;zdan <b>{$sends}</b>, bal xercleyerek.<br/>";
if ( $id != $usid )
{
echo "<b>{$login}</b>, leqebli istifade&#231;iye <b>{$send}</b>-ses  verdiniz...<br/>";
}
else
{
echo "<b>&#214;z&#252;n&#252;ze  {$send}</b>-ses  verdiniz...<br/>";
}
echo "Sizin verdiyiniz <b>{$send}</b>-ses \n";
if ( $id != $usid )
{
echo "<b>{$login}</b>, &#252;&#231;&#252;n qebul olundu!<br/>-=-<br/>";
}
else
{
echo "qebul olundu!<br/>-=-<br/>";
}
echo "<i>Te&#351;ekk&#252;rler...</i><br/>";
echo "-=-<br/>";
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Reytinq</a><br/>\n";
echo $fsize2;
$date = date( "d.m.y |H:i", mktime( date( "H" ) + $xsat ) );
@$save = @fopen( "file/bal_bot/15.dat", "a+" );
$qeyd = "".base64_encode( "<b>{$user}</b> - <u>{$login}</u> reytinqde <b>{$send}</b>, ses verdi: (<u>{$bal} - {$sends}=<b>{$newbal}</b></u>)-({$date})" )."\n";
@fwrite( @$save, @"{$qeyd}" );
@fflush( @$save );
@fclose( @$save );
$u_ses = mysql_query( "select ses,id,user from users order by ses DESC limit 1" );
$bs = mysql_fetch_array( $u_ses );
$bses = $bs['ses'];
$busid = $bs['id'];
$blogin = $bs['user'];
$dat = file( "file/dat_folder/enter.dat" );
$dses = trim( $dat[5] );
if ( $dses == "" )
{
$dses = 0;
}
if ( $dses < $bses )
{
$test1 = trim( $dat[0] );
$test2 = trim( $dat[1] );
$test3 = trim( $dat[2] );
$test7 = trim( $dat[6] );
$test8 = trim( $dat[7] );
$test9 = trim( $dat[8] );
$test10 = trim( $dat[9] );
$test11 = trim( $dat[10] );
$test12 = trim( $dat[11] );
$file = fopen( "file/dat_folder/enter.dat", "w" );
$data = "{$test1}\n";
$data .= "{$test2}\n";
$data .= "{$test3}\n";
$data .= "{$blogin}\n";
$data .= "{$busid}\n";
$data .= "{$bses}\n";
$data .= "{$test7}\n";
$data .= "{$test8}\n";
$data .= "{$test9}\n";
$data .= "{$test10}\n";
$data .= "{$test11}\n";
$data .= "{$test12}";
fwrite( $file, $data );
fclose( $file );
}
}
break;

case "kimler" :
echo "<p align=\"left\">\n";
echo $fsize1;
$user = @mysql_fetch_array( @mysql_query( @"Select user from users where id = '".@$uid."' LIMIT 1;" ) );
$userm = mysql_query( "select count(id) as num from reytinq where kime = '".$uid."';" );
$usm = mysql_fetch_array( $userm );
$num = $usm['num'];
if ( $user[0] == "" )
{
echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;!<br/>";
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
echo $fsize2;
break;
}
if ( $num == 0 )
{
echo "<b>{$user['0']}</b> ses veren olmay&#305;b...<br/>";
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
}
else
{
echo "<b>{$user['0']}</b> nickli istifade&#231;ini destekleyenler.<br/>";
echo "Cemi <b>{$num}</b> nefer:<br/>";
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $num / 10 + 0.45 );
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
if ( $num < $do )
{
$do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo $divide;
$r = mysql_query( "select kim,ses from reytinq where kime ='".$uid."' order by ses desc limit {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $r );
$usid = $arr['kim'];
$xes = $arr['ses'];
$sesveren = @mysql_fetch_array( @mysql_query( @"Select user from users where id='".@$usid."' LIMIT 1;" ) );
echo $i.") <a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">".$sesveren[0]."</a> (<b>{$xes}</b> ses)<br/>";
++$i;
}
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $num < $do )
{
$do = $num;
}
echo $divide;
echo "<a href=\"reytinq.php?mod=kimler&amp;id={$id}&amp;ps={$ps}&amp;uid={$uid}&amp;s={$next}&amp;ref={$ref}\">&gt;&gt;{$ot}-{$do}&gt;&gt;</a>\n";
}
if ( 1 < $s )
{
echo $divide;
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo "<a href=\"reytinq.php?mod=kimler&amp;id={$id}&amp;ps={$ps}&amp;uid={$uid}&amp;s={$prev}&amp;ref={$ref}\">&lt;&lt;{$ot}-{$do}&lt;&lt;</a>\n";
}
}
echo "----<br/><b><a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}]\">Reytinq</a></b><br/>";
echo $fsize2;
break;

default:
$fp = file( "file/dat_folder/reytinq.dat" );
$reytinq = trim( $fp[0] );
$reytime = trim( $fp[1] );
$datgun = trim( $fp[2] );
if ( $reytime < time( ) )
{
$dat = file( "file/dat_folder/enter.dat" );
$test1 = trim( $dat[0] );
$test2 = trim( $dat[1] );
$test3 = trim( $dat[2] );
$test7 = trim( $dat[6] );
$test8 = trim( $dat[7] );
$test9 = trim( $dat[8] );
$test10 = trim( $dat[9] );
$test11 = trim( $dat[10] );
$test12 = trim( $dat[11] );
$file = fopen( "file/dat_folder/enter.dat", "w" );
$data = "{$test1}\n";
$data .= "{$test2}\n";
$data .= "{$test3}\n";
$data .= "\n";
$data .= "\n";
$data .= "\n";
$data .= "{$test7}\n";
$data .= "{$test8}\n";
$data .= "{$test9}\n";
$data .= "{$test10}\n";
$data .= "{$test11}\n";
$data .= "{$test12}";
fwrite( $file, $data );
fclose( $file );
$reytime = 86400 * $datgun + time( );
$file = fopen( "file/dat_folder/reytinq.dat", "w" );
$data = "{$reytinq}\n";
$data .= "{$reytime}\n";
$data .= "{$datgun}";
fwrite( $file, $data );
fclose( $file );
}
echo "<p align=\"left\">\n";
print $fsize1;
print "<b>&#304;stifade&#231;i reytinqi:</b><br/>";
print "****<br/>";
print "En &#231;ox ses say&#305; olan istifade&#231;inin leqebi dehlizde <b>Lider</b> olaraq g&#246;r&#252;necek!<br/>";
print "<i>Sesverme Reytinqi her <b>{$datgun}</b> g&#252;nden sonra 0-dan ba&#351;lay&#305;r</i><br/>";
echo "<a href=\"reytinq.php?mod=ses&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Ses Ver!</a><br/>";
print "****<br/>";
print $fsize2;
$userall = mysql_query( "select count(id) as num from users where `ses` > 0;" );
$usm = mysql_fetch_array( $userall );
$num = $usm['num'];
if ( !isset( $s ) )
{
$s = 0;
}
$mx = round( $num / 10 + 0.45 );
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
if ( $num < $do )
{
$do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
echo $fsize1;
if ( $num == 0 )
{
echo "Reytinqde he&#231;kes yoxdur...<br/>\n";
print $fsize2;
break;
}
echo "M&#252;barize aparanlar: {$num} nefer<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query( "select user,ses,id from users order by ses desc limit {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
$arr = mysql_fetch_array( $r );
$usid = $arr['id'];
$ses = $arr['ses'];
$user = $arr['user'];
print $fsize1;
if ( $user != "" )
{
echo "{$i}) <a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">".$user."</a>-(<a href=\"reytinq.php?mod=kimler&amp;id={$id}&amp;ps={$ps}&amp;uid={$usid}&amp;ref={$ref}\">".$ses."</a> - ses)<br/>";
}
print $fsize2;
++$i;
}
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
$ot = ( $next - 1 ) * 10 + 1;
$do = $next * 10;
if ( $num < $do )
{
$do = $num;
}
echo $divide;
echo $fsize1;
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;s={$next}&amp;ref={$ref}\">N&#246;vbeti 10&gt;</a><br/>\n";
echo $fsize2;
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 10 + 1;
$do = $prev * 10;
echo $fsize1;
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;ref={$ref}\">&lt;-Evvelki 10</a><br/>\n";
echo $fsize2;
}

break;
}
echo $fsize1;

echo "----<br/>\n";
if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata Qay&#305;t</a><br/>\n";

if($mod) {
echo "<a href=\"reytinq.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}]\">Reytinq</a><br/>";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p></card></wml>";
mysql_close ($link);
?>