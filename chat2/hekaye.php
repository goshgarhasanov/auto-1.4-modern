<?php
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$user=$row["user"];

@mysql_query("update users set room='121' where id='".$id."'");

$tm = time()-(60*10)+$vaxt;

$users_count = @mysql_query("select count(id) from users where room='121' and time > '".$tm."'");
$online = @mysql_result($users_count, 0);

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";

switch($mod)
{
default:
echo "<card id=\"index\" title=\"Hekayeler\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
if($row['level'] == 9)
{
$savikom = mysql_query("SELECT COUNT(`id`) FROM `hekaye` WHERE `act` = '0';");
$hek = mysql_result($savikom, 0);
if($hek > 0)echo "<a href=\"hekaye.php?mod=admin&amp;id=$id&amp;ps=$ps&amp;ref={$ref}\">Testiq isteyen var!</a>(<b>$hek</b>)<br/>";
}
echo "<u>$site</u> / <u>Hekayeler</u><br/>";
echo "*****<br/>";
/////////////////////////////////////////hekaye
$r = mysql_query ("Select id,name,ses,user from `hekaye` WHERE  act = '1' order by rand() limit 0,1;");
while($sek = mysql_fetch_array($r))
{
   $hid = $sek['id'];
   $hekaye = $sek['name'];
   $ses = $sek['ses'];
   $muellif = $sek['user'];
       if ($ses!=0)$hekises = " <u>+$ses ses</u>)";
       else $hekises = ")";
   echo "<a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$hekaye."</a>(<b>".$muellif."</b>$hekises<br/>";
}
//////////////////////////////////////////hekaye son
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;

print "<a href=\"hekaye.php?mod=top&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Top 10 Beyenilen</a><br/>\n";
print "<a href=\"hekaye.php?mod=new&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Son elaveler</a><br/>\n";
echo "*****<br/>";
$query = mysql_query("select COUNT(`id`) from `hekaye` where `act` = '1'");
$all = @mysql_result($query, 0);

$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($all/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}
$r = mysql_query ("Select * from `hekaye` WHERE  act = '1' order by time desc limit $start,$max_page;");

if(mysql_affected_rows() == false)
{
echo "<u>Hekaye yazan olmay&#305;b..</u><br/>";
}

while($sek = mysql_fetch_array($r))
{
   $hid = $sek['id'];
   $name = $sek['name'];
   $ses = $sek['ses'];
   $muellif = $sek['user'];
       if ($ses!=0)$hekises = " <u>+$ses ses</u>)";
       else $hekises = ")";
   echo ($start+1).") <a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$name."</a> &gt; (<b>".$muellif."</b>$hekises<br/>";
++$start;
}
if ($all > $max_page) {
echo $divide;
echo navigation('hekaye.php?id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'', $all, $max_page, $page) ;
}
//echo "----<br/>";
//print "Online: <a href=\"hekaye.php?mod=online&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">$online</a><br/>\n";
echo $divide;
print "[<a href=\"hekaye.php?mod=send&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Elave Et</a>]<br/>\n";
echo $fsize2;
break;


case "online":
echo "<card id=\"index\" title=\"Hekayeler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
print "<u>Onlayn istifadeciler</u><br/>\n";
echo $divide;
$query = mysql_query("select COUNT(`id`) from `users` where room = '121' and time > '".$tm."'");
$all = @mysql_result($query, 0);

if($all==0)
{
   echo "<i>Onlaynda heckim yoxdur..</i><br/>";
}

if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$r = mysql_query ("Select id,user from `users` WHERE room = '121' and time > '".$tm."' order by time desc limit $o,$do;");

for ($i=$ot;$i<=$do;$i++)
{
   $sek = mysql_fetch_array ($r);
   $hid = $sek['id'];
   $name = $sek['user'];
   echo $i.") <a href=\"info.php?nk=$hid&amp;id=$id&amp;ps=$ps&amp;ref={$ref}\">".$name."</a><br/>";
}
if($all>10)
{
   echo "*****<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1)
{
   $ot=(($prev-1)*10)+1;
   $do=$prev*10;
   echo "<a href=\"hekaye.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref={$ref}\">&lt;&lt;$ot&lt;&lt;</a>.\n";
}

$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>=$s))
{
   $ot=(($next-1)*10)+1;
   $do=$next*10;
   if($do>$all)$do=$all;
   echo " |  <a href=\"hekaye.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref={$ref}\">&gt;&gt;$do&gt;&gt;</a>\n";
}
if($all>10)
{
   echo "<br/>";
}
echo $fsize2;
break;

case "new":
echo "<card id=\"index\" title=\"Hekayeler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
print "<u>Son elave olunanlar</u><br/>\n";
echo $divide;
$query = mysql_query("select COUNT(`id`) from `hekaye` where `time` > '".$today."' and `act` = '1'");
$all = @mysql_result($query, 0);

$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($all/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}
$r = mysql_query ("Select * from `hekaye` WHERE `time` > '".$today."' and act = '1' order by time desc limit $start,$max_page;");

if(mysql_affected_rows() == false)
{
echo "<u>Bug&#252;n hekaye elave eden olmay&#305;b...</u><br/>";
}
while($sek = mysql_fetch_array($r))
{
   $hid = $sek['id'];
   $name = $sek['name'];
   $ses = $sek['ses'];
   $muellif = $sek['user'];
       if ($ses!=0)$hekises = " <u>+$ses ses</u>)";
       else $hekises = ")";
   echo ($start+1).") <a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$name."</a> &gt; (<b>".$muellif."</b>$hekises<br/>";
++$start;
}
if ($all > $max_page) {
echo $divide;
echo navigation('hekaye.php?mod=new&amp;id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'', $all, $max_page, $page) ;
}
echo $fsize2;
break;

case "user":
echo "<card id=\"index\" title=\"Hekayeler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$uss = mysql_query("select * from `users` where user='".$nick."'");
if(mysql_affected_rows() == false){
echo "Istifadeci tapilmadi<br/>";
break;
}
print "<u><b>".$nick."</b>- hekayeleri.</u><br/>\n";
echo $divide;

$query = mysql_query("select COUNT(`id`) from `hekaye` where `act` = '1' and user='".$nick."'");
$all = @mysql_result($query, 0);

if($all==0)
{
   echo "<i>Bu istifade&#231;inin hekayesi yoxdur..</i><br/>";
}

if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;

$r = mysql_query ("Select * from `hekaye` WHERE act = '1' and user='".$nick."' order by ses desc limit $o,$do;");

for ($i=$ot;$i<=$do;$i++)
{
   $sek = mysql_fetch_array ($r);
   $hid = $sek['id'];
   $name = $sek['name'];
   $ses = $sek['ses'];
   echo $i.") <a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$name."</a> &gt; (<b>$ses</b>)<br/>";
}
if($all>10)
{
   echo "*****<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1)
{
   $ot=(($prev-1)*10)+1;
   $do=$prev*10;
   echo "<a href=\"hekaye.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;nick=$nick&amp;s=$prev&amp;ref={$ref}\">&lt;&lt;$ot&lt;&lt;</a>.\n";
}

$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>=$s))
{
   $ot=(($next-1)*10)+1;
   $do=$next*10;
   if($do>$all)$do=$all;
   echo " |  <a href=\"hekaye.php?mod=$mod&amp;id=$id&amp;ps=$ps&amp;nick=$nick&amp;s=$next&amp;ref={$ref}\">&gt;&gt;$do&gt;&gt;</a>\n";
}
if($all>10)
{
   echo "<br/>";
}
echo $fsize2;
break;


case "top":
echo "<card id=\"index\" title=\"Hekayeler\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
print "<u>Top 10 Beyenilen</u><br/>\n";
echo $divide;
$query = mysql_query("select COUNT(`id`) from `hekaye` where `ses` > '0' and `act` = '1'");
$total = @mysql_result($query, 0);


$max_page = 10;
$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
$start = (!isset($page)) ? 0 : ($page * $max_page);
$end = (!isset($page)) ? $max_page : ($start + $max_page);
if(ceil($total/$max_page) < $page)
{
    $start = 0;
    $end = $max_page;
}

$r = mysql_query ("Select * from `hekaye` WHERE `ses` > '0' and act = '1' order by ses desc limit $start,$max_page;");
if(mysql_affected_rows() == false)
{
echo "<b>Top 10 Beyenilen Yoxdur...</b><br/>";
}
while($sek = mysql_fetch_array($r))
{
   $hid = $sek['id'];
   $name = $sek['name'];
   $ses = $sek['ses'];
   $muellif = $sek['user'];
       if ($ses!=0)$hekises = " <u>+$ses ses</u>)";
       else $hekises = ")";
   echo ($start+1).") <a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$name."</a> &gt; (<b>".$muellif."</b>$hekises<br/>";++$start;
}
if ($total > $max_page) {
echo $divide;
echo navigation('hekaye.php?mod=top&amp;id='.$id.'&amp;ps='.$ps.'&amp;ref='.$ref.'', $total, $max_page, $page) ;
}
echo $fsize2;
break;



case "send":
echo "<card id=\"sed\" title=\"Hekaye Elave Et\">\n";
echo "<p align=\"left\">\n";
if(!$action)
{
   echo $fsize1;
   echo "Ba&#351;l&#305;q:(max: 50 herf)<br/>\n";
   echo $fsize2;
   echo "<input name=\"name$ref\" maxlength=\"50\" title=\"Ba&#351;l&#305;q\"/><br/>\n";
   echo $fsize1;
   echo "Hekaye:<br/>\n";
   echo $fsize2;
   echo "<input name=\"body$ref\" title=\"Hekaye\"/><br/>\n";
   echo $fsize1;
   echo "[<anchor>Elave Et<go href=\"hekaye.php?mod=send&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
   echo "<postfield name=\"name\" value=\"$(name$ref)\"/>\n";
   echo "<postfield name=\"body\" value=\"$(body$ref)\"/>\n";
   echo "<postfield name=\"action\" value=\"send\"/>";
   echo "</go></anchor>]<br/>";
   echo $fsize2;
}
else
{
   if(empty($_POST['name']))
   {
       $error = "Hekaye &#252;&#231;&#252;n ba&#351;l&#305;q yazmad&#305;z.<br/>\n";
   }
   if(empty($_POST['body']))
   {
       $error = "Hekaye &#252;&#231;&#252;n metn yazmad&#305;z.<br/>\n";
   }
   if(mysql_num_rows(mysql_query("select * from `hekaye` where `name` = '".$name."'"))!=0)
   {
       $error = "Bu adda hekaye art&#305;q m&#246;vcuddur.<br/>\n";
   }
   if(strlen($name) > 50)
   {
       $error = "Ba&#351;l&#305;q maksimum 50 herfden ibaret ola biler.<br/>\n";
   }
   if(!$error)
   {
       $name = narmobilay($name);
       $body = narmobilay($body);
       if(mysql_query("insert into hekaye set usid='".$id."', user='".$user."', name='".$name."', body='".$body."', time='".time()."'"))
       {
           echo $fsize1;
           echo "Yazd&#305;&#287;&#305;n&#305;z hekaye u&#287;urla g&#246;nderildi. Yaln&#305;z <b>Admin</b> tesdiqledikden sonra diger &#252;mumi hekayelere elave olunacaq.<br/>\n";
           echo $fsize2;
       }
       else
       {
           echo $fsize1;
           echo "Baza ile elaqe yaranm&#305;r.<br/>\n";
           echo $fsize2;
       }
   }
   else
   {
       echo $fsize1;
       echo $error;
       echo $fsize2;
   }
}
break;

case "read":
$h = intval($_GET['h']);
$query = mysql_query("select * from `hekaye` where `id` = '".$h."'");

if(mysql_affected_rows()==0)
{
   echo "<card id=\"error\" title=\"Xeta!\">\n";
   echo "<p align=\"left\">\n";
   echo $fsize1;
   echo "<i>Hekaye Tapilmadi..</i><br/>";
   echo $divide;
   echo "<a href=\"hekaye.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
   echo $fsize2;
   break;
}

$hek = @mysql_fetch_array($query);
$name = $hek['name'];

echo "<card id=\"name\" title=\"$name\">\n";
echo "<p align=\"center\">\n";
echo $fsize1;
echo "<u><b>$name</b></u><br/>";
echo "*****<br/>";
echo $fsize2;
echo "</p><p align=\"left\">\n";
echo $fsize1;

$body = $hek['body'];
$usid = $hek['usid'];
$name = $hek['user'];
$oxunub = $hek['oxu'];
$sesler = $hek['ses'];
$tesdiq = $hek['act'];
$tarix = date("Y-m-d / H:i", $hek['time']);

echo "<b>G&#246;nderen -&#187; <a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">$name</a></b><br/>";
echo "<u>Hekaye</u>:<br/><i>$body</i><br/>";
echo $divide;
$lik = mysql_query("select * from `hekaye_beyen` where usid='".$id."' and hekid = '".$h."'");
if(mysql_num_rows($lik)==0)
{
   echo "<u>Hekayeni beyenirsizmi?</u><br/>";
   echo "<a href=\"hekaye.php?mod=like&amp;h=$h&amp;id={$id}&amp;ps={$ps}&amp;go=yes&amp;ref={$ref}\">Beli</a> / <a href=\"hekaye.php?mod=like&amp;h=$h&amp;id={$id}&amp;ps={$ps}&amp;go=no&amp;ref={$ref}\">Xeyr</a><br/>";
   echo $divide;
}
echo "Tarix: $tarix <br/>";
echo "Oxunub: $oxunub defe<br/>";
echo "Sesleri: <b>$sesler</b><br/>";

if($row['level'] > 7)
{
   echo "*****<br/>";
   if($tesdiq == 0)
   {
       echo "<a href=\"hekaye.php?mod=admin&amp;h=$h&amp;id={$id}&amp;ps={$ps}&amp;go=ok&amp;ref={$ref}\">Tesdiq et</a> / ";
   }
   echo "<a href=\"hekaye.php?mod=admin&amp;h=$h&amp;id={$id}&amp;ps={$ps}&amp;go=del&amp;ref={$ref}\">Sil</a><br/>";
}
mysql_query("update hekaye set oxu = oxu + 1 where id = '".$h."'");
echo $fsize2;
break;

case "like":
echo "<card id=\"admin\" title=\"Hekaye Panel\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;
$h = intval($_GET['h']);
$query = mysql_query("select * from `hekaye` where `id` = '".$h."'");
if(mysql_affected_rows()==0)
{
   echo "<u>Hekaye Tapilmadi..</u><br/>";
   echo $divide;
   print "<a href=\"hekaye.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
   echo $fsize2;
   break;
}
$arr = mysql_fetch_array($query);

if($go=="yes")
{
   $lik = mysql_query("select * from `hekaye_beyen` where usid='".$id."' and hekid = '".$h."'");
   if(mysql_num_rows($lik)==0)
   {
      echo "<u>".$arr['user']."</u> size &#246;z te&#351;ekk&#252;r&#252;n&#252; bildirir..<br/>";
      mysql_query("insert into hekaye_beyen set usid='".$id."', hekid = '".$h."'");
      mysql_query("update hekaye set ses = ses + 1, today_votes = today_votes + 1 where id = '".$h."'");
      $data = date("d-M-Y [H:i]");
      $times = time() + $vaxt;
      $message = "H&#246;rmetli <b>".$arr['user']."</b> sizin <u>Hekayeler</u> b&#246;lm&#252;ndeki <u>".$arr['body']."</u> adli hekayenizi <b>".$user."</b> &#231;ox beyenir!";
      mysql_query("insert into zapiski values(0,'Sistem','7','".$message."','".$user."','".$arr['usid']."','".$times."','0','Hekayeler!..','".$data."','1','1');");
   }
   else
   {
      echo "<u>Siz daha &#246;nce bu hekayeni beyenmisiz..</u><br/>";
   }
}
else
{
   echo "<u>".$arr['user']."</u> teess&#252;f edir onun yazd&#305;&#287;&#305; hekaye xo&#351;unuza gelmedi..<br/>";
}
echo $fsize2;
break;

case "admin":
echo "<card id=\"admin\" title=\"Hekaye Panel\">\n";
echo "<p align=\"left\">\n";
echo $fsize1;

if($row['level'] < 8)
{
   echo "Bu b&#246;lmeye giri&#351; icazeniz yoxdur..<br/>";
   echo $divide;
   print "<a href=\"hekaye.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
   echo $fsize2;
   break;
}

switch ($go)
{
   default:
   echo "<u>Tesdiq g&#246;zleyenler</u><br/>";
   echo $divide;
   $query = mysql_query("select COUNT(`id`) from `hekaye` where `act` = '0'");
   $all = @mysql_result($query, 0);

if($all==0)
{
   echo "<i>Tesdiq g&#246;zleyen hekaye yoxdur..</i><br/>";
}

if(!isset($s))$s=0;
$mx=round(($all/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$all)$do=$all;
$o=$ot-1;
$ff=$ot;
if($do==0)$ff=$o;
$r = mysql_query ("Select * from `hekaye` WHERE  act = '0' order by time desc limit $o,$do;");

for ($i=$ot;$i<=$do;$i++)
{
   $sek = mysql_fetch_array ($r);
   $hid = $sek['id'];
   $name = $sek['name'];
   $muellif = $sek['user'];
   $date = date("Y-m-d", $sek['time']);
   echo $i.") <a href=\"hekaye.php?mod=read&amp;id=$id&amp;ps=$ps&amp;h=$hid&amp;ref={$ref}\">".$name."</a> [".$muellif."]<br/>";
}

if($all > 10)
{
   echo "*****<br/>\n";
}
$next=$s+1;
$prev=$s-1;
if($s>1)
{
   $ot=(($prev-1)*10)+1;
   $do=$prev*10;
   echo "<a href=\"hekaye.php?mod=admin&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref={$ref}\">&lt;&lt;$ot&lt;&lt;</a>.\n";
}

$tes = $all/10;
$test = round($tes);
if (($all>$do)&&($test>=$s))
{
   $ot=(($next-1)*10)+1;
   $do=$next*10;
   if($do>$all)$do=$all;
   echo " |  <a href=\"hekaye.php?mod=admin&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref={$ref}\">&gt;&gt;$do&gt;&gt;</a>\n";
}
if($all>10)
{
   echo "<br/>";
}
break;

case "del":
$h = intval($_GET['h']);
$query = mysql_query("select * from `hekaye` where `id` = '".$h."'");
if(mysql_affected_rows()==0)
{
   echo "<u>Hekaye Tapilmadi..</u><br/>";
}
else
{
    if(!isset($_POST['sebeb']))
    {
    echo "Sebeb:<br/>\n";
    echo $fsize2;
    echo "<input name=\"sebeb$ref\" title=\"Sebeb\"/><br/>\n";
    echo $fsize1;
    echo "<anchor>G&#246;nder<go href=\"hekaye.php?mod=$mod&amp;h=$h&amp;go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
    echo "<postfield name=\"sebeb\" value=\"$(sebeb$ref)\"/>\n";
    echo "</go></anchor><br/>";
    }
    else
    {
        $h = intval($_GET['h']);
        $query = mysql_query("select * from hekaye where id='".$h."'");
        $arr = mysql_fetch_array($query);
        $data = date("d-M-Y [H:i]");
        $times = time() + $vaxt;
        $message = "H&#246;rmetli <b>".$arr['user']."</b> sizin <u>Hekayeler</u> b&#246;lm&#252;ndeki <u>".$arr['body']."</u> adli hekayeniz <b>".$user."</b> terefinden deaktiv edildi!<br/>----<br/><b>Sebeb:</b> $sebeb";
        mysql_query("insert into zapiski values(0,'Sistem','7','".$message."','".$user."','".$arr['usid']."','".$times."','0','Hekayeler!..','".$data."','1','1');");
        if(mysql_query("delete from hekaye where id='".$h."'"))
        {
            echo "<u>Hekaye Silindi..</u><br/>";
        }
        else
        {
            echo "<u>Database Error..</u><br/>";
        }
    }
}
break;

case "ok":
$h = intval($_GET['h']);
$query = mysql_query("select * from `hekaye` where `id` = '".$h."'");
if(mysql_affected_rows()==0)
{
   echo "<u>Hekaye Tapilmadi..</u><br/>";
}
else
{
if(mysql_query("update hekaye set act='1' where id = '".$h."'"))
{
   echo "<u>Hekaye Tesdiqlendi..</u><br/>";
   $h = intval($_GET['h']);
   $query = mysql_query("select * from hekaye where id='".$h."'");
   $arr = mysql_fetch_array($query);
   $data = date("d-M-Y [H:i]");
   $times = time() + $vaxt;
   $message = "H&#246;rmetli <b>".$arr['user']."</b> sizin <u>Hekayeler</u> b&#246;lm&#252;ndeki <u>".$arr['body']."</u> adli hekayeniz tesdiqlendi ve diger hekayeler arasina elave olundu. Tebrikler!";
   mysql_query("insert into zapiski values(0,'Sistem','7','".$message."','".$user."','".$arr['usid']."','".$times."','0','Hekayeler!..','".$data."','1','1');");
}
else
{
   echo "<u>Database Error..</u><br/>";
}
}
break;
}

echo $fsize2;
break;
}

echo $fsize1;
echo $divide;
if ($mod)
{
   print "<a href=\"hekaye.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Hekayeler</a><br/>\n";
}
print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";


echo $fsize2;
echo "</p>\n\n";
echo "</card>\n";
echo "</wml>\n";
mysql_close($link);
?>