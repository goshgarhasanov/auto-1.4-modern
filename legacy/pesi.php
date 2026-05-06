<?
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

function yusif($nk)
{
    $nk = intval($nk);
    $users = @mysql_query("SELECT * FROM users WHERE id='".$nk."'");
    if(mysql_affected_rows() == false)
    {
        return "<b>NICK ERROR</b>";
    }
    else
    {
        return mysql_fetch_object($users);
    }
}
function tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 Saat: $cc_time2";
$time_p[0]=date("j n Y", $time);
$time_p[1]=date("H:i", $time);
$ccvaxt=(time()-$time);
$cc_s = $ccvaxt/ 3600;
$cc_saat_tam = strtok($cc_s,'.');
$cc_saat_san = $cc_saat_tam * 3600;
$cc_d = $ccvaxt / 60;
$cc_dq_tam =strtok($cc_d,'.');
$cc_deqiqe_san = $cc_dq_tam * 60;
$cc_deqiqe_hesab = ($ccvaxt - $cc_saat_san) / 60;
$cc_deqiqe = strtok($cc_deqiqe_hesab,'.');
$cc_saniye = $ccvaxt - $cc_deqiqe_san;

if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<20))$cc_muddet = "El&#601; indi";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye>=20)&&($cc_saniye<60))$cc_muddet = "$cc_saniye saniyy&#601; &#601;vv&#601;l";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "$cc_deqiqe d&#601;qiq&#601; &#601;vv&#601;l";
else $cc_muddet = "$cc_saat_tam saat &#601;vv&#601;l";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;n&#601;n saat: $time_p[1]";}else{
$w[1]="B.e";
$w[2]="&#199;.ax&#351;.";
$w[3]="&#199;&#601;r.";
$w[4]="C.ax&#351;";
$w[5]="C&#252;m&#601;";
$w[6]="&#350;&#601;.";
$w[7]="Bazar";
$hefte=date("w",$time);
if($w[$hefte]!=""){
$cc_time2="".date("H:i", $time)."";
$cc_time="".$w[$hefte]." Saat: $cc_time2";
}else{
$cc_time=str_replace("Jan","Yanvar",$cc_time);
$cc_time=str_replace("Feb","Fevral",$cc_time);
$cc_time=str_replace("Mar","Mart",$cc_time);
$cc_time=str_replace("May","May",$cc_time);
$cc_time=str_replace("Apr","Aprel",$cc_time);
$cc_time=str_replace("Jun","Iyun",$cc_time);
$cc_time=str_replace("Jul","Iyul",$cc_time);
$cc_time=str_replace("Aug","Avqust",$cc_time);
$cc_time=str_replace("Sep","Sentyabr",$cc_time);
$cc_time=str_replace("Oct","Oktyabr",$cc_time);
$cc_time=str_replace("Nov","Noyabr",$cc_time);
$cc_time=str_replace("Dec","Dekabr",$cc_time);
}}}
return $cc_time;
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
echo "<card id=\"exchange\" title=\"Pesiler Siyahisi\">";
echo "<p align=\"left\">";
echo $fsize1;

switch($bol){
default:
$mysql = mysql_query("SELECT * FROM `pesi`;");
$cemi_pesi = mysql_num_rows($mysql);
if(isset($HTTP_GET_VARS['deluser']) and $row["level"] == 9){
@MYSQL_QUERY("DELETE FROM pesi WHERE id='".$HTTP_GET_VARS['deluser']."'");
}
echo "Bu Saytda soyu&#351; soyub ve ya ba&#351;qa sayti reklam edib <b>PEYSER</b> statusu qazananlar.!<br/>Eger bu siyahiya d&#252;&#351;mek istemirsinizse reklam etmeyin!<br/>****<br/>";
echo "Cemi (<b>$cemi_pesi</b>) nefer<br/><br/>";
if($cemi_pesi==0){
echo "Siyah&#305; bo&#351;dur.!<br/>";
}else{
$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($cemi_pesi/$max_page) < $page){
$start = 0;
$end = $max_page;
}
$emr = mysql_query("SELECT * FROM `pesi` ORDER BY `id` DESC LIMIT $start, $max_page;");
while($yp = mysql_fetch_object($emr)){
$sik = yusif($yp->usid);
echo ($start+1).") <a href=\"pesi.php?bol=1&amp;fid=".$yp->id."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">".$sik->user."</a>[oxu]";
if($row["level"] == 9){
echo " - <a href=\"pesi.php?deluser=".$yp->id."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a><br/>";
}else{
echo "<br/>";
}
++$start;
}
if($cemi_pesi > $max_page){
echo navigation("pesi.php?id=$id&amp;ps=$ps&amp;ref=$ref", $cemi_pesi, $max_page, $page);
}
}
break;
case '2':

if ($id!="1"){
echo "Bas bayra!<br/>";
break;
}

$nk = $HTTP_GET_VARS["nk"];
$yusif = @mysql_query ("Select `id`,`user`,`user_ip`,`user_soft` from `users` where `id`='".$nk."' and banned!='2';");
if (mysql_affected_rows() == 0){
echo "Bele User Bazada Yoxdu.!<br/>$divide";
echo "<a href=\"axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">User axtar</a><br/>\n";
break;
}
$inf = mysql_fetch_array ($yusif);
$ip = $inf["user_ip"];
$usid=$inf["id"];
$user = $inf["user"];
$soft = $inf["user_soft"];
if(!isset($HTTP_POST_VARS[action])){
echo "Nick: <b>".$user."</b><br/>";
echo "Sebeb: <input name=\"sbb\" title=\"Sebeb\" type=\"text\"/><br/>\n";
echo "ip Adresi: <u>".$ip."</u><br/>";
echo "Cihaz: <u>".$soft."</u><br/><br/>";
echo "<anchor title=\"go\">Elave et<go href=\"pesi.php?bol=2&amp;id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\" method=\"post\">";
echo "<postfield name=\"sbb\" value=\"$(sbb)\"/>";
echo "<postfield name=\"ip\" value=\"$ip\"/>";
echo "<postfield name=\"user\" value=\"$user\"/>";
echo "<postfield name=\"soft\" value=\"$soft\"/>";
echo "<postfield name=\"action\" value=\"ok\"/>";
echo "</go></anchor><br/>";
}else{
$sbb = narmobil($HTTP_POST_VARS["sbb"]);
if($sbb==""){
echo "Sebeb Qeyd Edin.!<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
$sik = mysql_query("SELECT * FROM `pesi` WHERE `usid` = '".$usid."' AND `user` = '".$user."';");
if(mysql_affected_rows() != 0){
echo "<b>$user</b> artiq peyserler siyahisindadir.!<br/>";
echo $divide;
echo "<anchor>&#171; Geri Qay&#305;t<prev/></anchor><br/>";
break;
}
$ok = mysql_query("INSERT INTO `pesi` SET `usid` = '".$usid."', `text` = '".$sbb."', `user` = '".$user."',`ip` = '".$ip."',`soft` = '".$soft."',`time` = '".time()."';");
if( $ok ) {
echo "<b>$user</b> Peyserler siyahisina elave olundu.!<br/>";
echo $divide;
echo "<a href=\"info.php?nk=$nk&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">&#171; Geri Qayit</a><br/>\n";
}else{
echo "Database sehfi.<br/>";
}
}
break;
case '1':
$fid = intval($_GET['fid']);
$y = mysql_query("SELECT * FROM `pesi` WHERE `id` = '".$fid."' LIMIT 1;");
if (mysql_affected_rows() == 0){
echo "Sehf ba&#351; verdi.<br/>";
break;
}
$sox = mysql_query("SELECT * FROM `pesi` WHERE `id` = '".$fid."';");
$inf = mysql_fetch_array($sox);
$ip = $inf['ip'];
$user = $inf['user'];
$usid = $inf['usid'];
$soft = $inf['soft'];
$sebeb = $inf['text'];
echo "<u>$user</u>-peyserin melumatlari.<br/>$divide";
echo "Nicki: <b>$user</b><br/>";
echo "IP adresi: <u>$ip</u><br/>";
echo "Cihazi: <u>$soft</u><br/>";
echo "Peyser &#231;&#305;xma sebebi: <b>$sebeb</b><br/>";
echo "Tarix: <u>".tarix($inf['time'])."</u><br/>";
echo $divide;
echo "<a href=\"pesi.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#171; Geri Qayit</a><br/>\n";
break;
}
echo $divide;
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
mysql_close($link);
?>
