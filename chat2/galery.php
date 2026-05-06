<?
header('Cache-Control: no-store, no-cache, must-revalidate');
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$user=$row["user"];
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<card title=\"Qalereya!\">\n";

switch($mod) {
default:
echo "<p align=\"left\">\n";
echo $fsize1;
echo "Laz&#305;ms&#305;z Fotolar Silinecek!<br/>";
$galery = mysql_query ("select count(id) as num from albom");
$foto = mysql_fetch_array($galery);
$kolfoto = $foto["num"];
echo "Cemi Foto: <b>".$kolfoto."</b><br/>";
echo $divide; 
echo "<b><a href=\"foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Foto y&#252;kle</a></b><br/>";
echo $divide;
$galerym = mysql_query ("select count(id) as num from albom where sex ='0'");
$fotomr = mysql_fetch_array($galerym);
$fotom = $fotomr["num"];
echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;iler</a>(<b>".$fotom."</b>)<br/>";
$galeryz = mysql_query ("select count(id) as num from albom where sex ='1'");
$fotozr = mysql_fetch_array($galeryz);
$fotoz = $fotozr["num"];
echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qadinlar</a>(<b>".$fotoz."</b>)<br/>";

echo $divide; 
echo $fsize2;
break;

case 'm':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Ki&#351;iler!</b><br/>";
echo $divide; 
echo $fsize2;
$galery = mysql_query ("select count(id) as num from albom where sex ='0';");
$foto = mysql_fetch_array($galery);
$num = $foto["num"]; 
if ($num == 0){
echo $fsize1;
echo "<i>Ki&#351;ilerden he&#231;kesin Foto Albomunda &#350;ekil yoxdur!</i><br/>----<br/>";
echo $fsize2;
mysql_close($link);
}else{
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo $fsize1;
echo "Cemi: $num<br/>\n";
echo $divide;
echo $fsize2;
$r = mysql_query ("select vote,photo,idfoto,id from `albom` where sex = '0' order by vote desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
echo $fsize1;

$ses=$arr['vote'];
$photo=$arr['photo'];
$idfoto=$arr['idfoto'];
$uid=$arr['id'];

$qus = mysql_query ("Select user from users where id = '".$idfoto."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where idfoto = '".$idfoto."'");
}

if(!file_exists("photos/".$idfoto."/".$photo."")){
mysql_query ("DELETE from albom where id = '".$uid."';");
echo "delete file";
}

$daroq = getimagesize("photos/$idfoto/$photo");
$n_nam = $daroq[2];
 if($n_nam=="1"){$img_type="gif";}
 elseif($n_nam=="2"){$img_type="jpg";}
 elseif($n_nam=="3"){$img_type="png";}

if ($id==$idfoto){
echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=m&amp;ref=$ref\"><img src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a><b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a></b>| Ses: ".$ses."\n"; 
}else{
echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=m&amp;ref=$ref\"><img src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a>| Ses: ".$ses."\n"; 
}
echo $fsize2;
echo "<br/>";

echo $fsize1;
echo $divide; 
echo $fsize2;
}                                  
mysql_close($link);
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $fsize1;
echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">Sonraki 10</a><br/>\n";
echo $fsize2;
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo $fsize1;
echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">Evvelki 10</a><br/>\n";
echo $fsize2;
}
}
break;

case 'q':
echo "<p align=\"left\">\n";
echo $fsize1;
echo "<b>Qad&#305;nlar!</b><br/>";
echo $divide; 
echo $fsize2;

$galery = mysql_query ("select count(id) as num from albom where sex ='1';");
$foto = mysql_fetch_array($galery);
$num = $foto["num"]; 
if ($num == 0){
echo $fsize1;
echo "<i>Qad&#305;nlardan he&#231;kesin Foto Albomunda &#350;ekil yoxdur!</i><br/>----<br/>";
echo $fsize2;
mysql_close($link);
}else{
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
echo $fsize1;
echo "Cemi: $num<br/>\n";
echo $divide;
echo $fsize2;

$r = mysql_query ("select vote,photo,idfoto,id from `albom` where sex = '1' order by vote desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
echo $fsize1;
$ses=$arr['vote'];
$photo=$arr['photo'];
$idfoto=$arr['idfoto'];
$uid=$arr['id'];

$qus = mysql_query ("Select user from users where id = '".$idfoto."'"); 
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from albom where idfoto = '".$idfoto."'");
}

if(!file_exists("photos/".$idfoto."/".$photo."")){
mysql_query ("DELETE from albom where id = '".$uid."';");
echo "delete file";
}


$daroq = getimagesize("photos/$idfoto/$photo");
$n_nam = $daroq[2];
 if($n_nam=="1"){$img_type="gif";}
 elseif($n_nam=="2"){$img_type="jpg";}
 elseif($n_nam=="3"){$img_type="png";}

 
if ($id==$idfoto){
echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=q&amp;ref=$ref\"><img src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a></b>| Ses: ".$ses."\n"; 
}else{
echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=q&amp;ref=$ref\"><img src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a>| Ses: ".$ses."\n"; 
}
echo $fsize2;
echo "<br/>";

echo $fsize1;
echo $divide; 
echo $fsize2;
}                                  
mysql_close($link);
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $fsize1;
echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">Sonraki 10</a><br/>\n";
echo $fsize2;
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo $fsize1;
echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">Evvelki 10</a><br/>\n";
echo $fsize2;
}
}
break;

}
echo $fsize1;
if (isset ($rm))echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm\">&#199;ata Qay&#305;t</a><br/>\n"; 

if($mod) echo "<a href=\"galery.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qalereya</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
?>