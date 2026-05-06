<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,) = check_login($link); 


$_v->title('TOP-10');
$_v->fsize1($fsize1);
	
switch($mod) {

case 'hediyye':
echo "Aktiv istifade&#231;iler aras&#305;nda her ay&#305;n ax&#305;r&#305; ilk &#252;&#231;l&#252;ye &#231;&#305;xanlara hediyyeler a&#351;a&#287;dak&#305;lard&#305;r.<br/>";
$_v->divide();
echo "1-ci yer: 60 bal hediyye.<br/>";
echo "2-ci yer: 40 bal hediyye.<br/>";
echo "3-c&#252; yer: 30bal hediyye.<br/>";
echo "4-c&#252; yer: 20 bal hediyye.<br/>";
echo "5-ci yer: 10 bal hediyye.<br/>";
echo "[<a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=aktiv&amp;ref=$ref\">Aktiv &#304;stifade&#231;iler</a>]<br/>";

break;

case 'agill':
echo "<b>En A&#287;&#305;ll&#305; istifade&#231;iler</b>:<br/>";
$_v->divide();
$r = @mysql_query ("SELECT user,credits,id FROM users ORDER BY credits desc LIMIT 0,10;");
$i = 1;
while ($a = mysql_fetch_array($r))
{
echo ($i++).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=".$a["id"]."&amp;ref=$ref\">".$a["user"]."</a> - (<b>".$a["credits"]."</b>-cavab)<br/>\n";
}
break;

case 'aktiv':
echo "<b>En &#231;ox aktiv olanlar</b>:<br/>";
$_v->divide();
$r = @mysql_query ("SELECT user,posts,id FROM users ORDER BY posts desc LIMIT 0,10;");
$i = 1;
while ($a = mysql_fetch_array($r))
{
echo ($i++).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=".$a["id"]."&amp;ref=$ref\">".$a["user"]."</a> - (<b>".$a["posts"]."</b>-post)<br/>\n";
}
break;




case 'fqadin':
echo "<b>&#199;at&#305;n Yara&#351;&#305;ql&#305; Xan&#305;mlar&#305;</b><br/>\n";
$_v->divide();
$resu = @mysql_query ("Select vote,photo,idfoto,id from albom where sex = '1' order by vote desc limit 0,10;");
$i = 1;
while ($a2 = mysql_fetch_array($resu))
{
$uid=$a2['id'];
$u_id=$a2['idfoto'];
$photo=$a2['photo'];
$vote=$a2['vote'];

$qus = mysql_query ("Select user from users where id = '".$u_id."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
echo ($i++).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><img src=\"image.php?img=photos/$u_id/$photo&amp;size=40\" alt=\"FoTo\"/></a> <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$u_id&amp;ref=$ref\">".$u_user."</a> (<b>".$vote."</b> Ses)<br/>";
}

}
break;


case 'foglan':
echo "<b>&#199;at&#305;n Yara&#351;&#305;ql&#305; Oglanlar&#305;</b><br/>\n";
$_v->divide();
$resu = @mysql_query ("Select vote,photo,idfoto,id from albom where sex = '0' order by vote desc limit 0,10;");
$i = 1;
while ($a2 = mysql_fetch_array($resu))
{
$uid=$a2['id'];
$u_id=$a2['idfoto'];
$photo=$a2['photo'];
$vote=$a2['vote'];

$qus = mysql_query ("Select user from users where id = '".$u_id."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
echo ($i++).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><img src=\"image.php?img=photos/$u_id/$photo&amp;size=40\" alt=\"FoTo\"/></a> <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$u_id&amp;ref=$ref\">".$u_user."</a> (<b>".$vote."</b> Ses)<br/>";
}

}
break;











case 'varli':
$user=$row["user"];
echo "<b>Chat&#305;n varl&#305; istifade&#231;ileri!</b><br/>";
$userm = mysql_query ("select count(id) as num from users where `bal` > '0';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
if(!isset($s) or $s<0)$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
$_v->divide();
echo "Cemi: $num.<br/>\n";
echo $divide;
$r = mysql_query ("select id,user,bal from users where `bal` > '0' order by bal desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['user'];
$usid=$arr['id'];
$bal=$arr['bal'];
if($user==$login)echo ($i).") <b><a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a></b> (<b>$bal</b>-bal)<br/>";
else echo ($i).") <a href=\"inside.php?id=$id&amp;ps=$ps&amp;nk=$usid&amp;ref=$ref\">".$login."</a> (<b>$bal</b>-bal)<br/>";
}

$next=$s+1;
$prev=$s-1;


$son = $do/10;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"top.php?mod=varli&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}
	
if (($num>$do)&&($s==$son)) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo " | <a href=\"top.php?mod=varli&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">$do&gt;&gt;</a><br/>\n";
}
if($s>1) echo "<br/>";
break;



default:
echo "<b>TOP-10 Reytinq</b><br/>\n";
$_v->divide();
$agilli=mysql_fetch_array(mysql_query("SELECT user FROM users ORDER BY credits desc LIMIT 0,1"));
echo "- A&#287;&#305;ll&#305; istifade&#231;i: <b>$agilli[0]</b> - <a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=agill&amp;ref=$ref\">ard&#305;</a><br/>\n";

$posts=mysql_fetch_array(mysql_query("SELECT user FROM users ORDER BY posts desc LIMIT 0,1"));
echo "- Aktiv istifade&#231;i: <b>$posts[0]</b> - <a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=aktiv&amp;ref=$ref\">ard&#305;</a><br/>\n";



$fotoq=mysql_fetch_array(mysql_query("SELECT idfoto FROM albom where  sex = '1' ORDER BY vote desc LIMIT 1"));
$fotoq=mysql_fetch_array(mysql_query("SELECT user FROM users where id ='".$fotoq['0']."'"));

echo "- Chat&#305;n yara&#351;&#305;ql&#305; xan&#305;m&#305;: <b>$fotoq[0]</b> - <a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=fqadin&amp;ref=$ref\">ard&#305;</a><br/>\n";

$fotoq=mysql_fetch_array(mysql_query("SELECT idfoto FROM albom where  sex = '0' ORDER BY vote desc LIMIT 1"));
$fotoq=mysql_fetch_array(mysql_query("SELECT user FROM users where id ='".$fotoq['0']."'"));
echo "- Chat&#305;n yara&#351;&#305;ql&#305; o&#287;lan&#305;: <b>$fotoq[0]</b> - <a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=foglan&amp;ref=$ref\">ard&#305;</a><br/>\n";

$varli=mysql_fetch_array(mysql_query("SELECT user FROM users ORDER BY bal desc LIMIT 0,1"));
echo "- Varl&#305; istifade&#231;i: <b>$varli[0]</b> - <a href=\"top.php?id=$id&amp;ps=$ps&amp;mod=varli&amp;ref=$ref\">ard&#305;</a><br/>\n";

$qey = file("file/dat_folder/enter.dat");
$luser = trim($qey[3]);
if($luser!="")
echo "- Beyenilen istifade&#231;i: <b>$luser</b> <br/>\n";
break;
}

$_v->divide();

if($mod) {
echo "<a href=\"top.php?id=$id&amp;ps=$ps&amp;ref=$ref\">ToP-10</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>