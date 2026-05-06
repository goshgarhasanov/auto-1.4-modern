<?php
require("inc.php");
$link = connect_db();

$dfghdfgdf = file("file/dat_folder/domen.dat");
$vcxvcvc0 = trim($dfghdfgdf [0]);
$vcxvcvc4 = trim($dfghdfgdf [4]);

$satir = file("file/dat_folder/domenler.dat");
$dsay = count($satir);

require("saytgo.php");
$ref=rand(10000,1000000);

$adamlar = @mysql_query ("SELECT * FROM `conf` where `acar` ='1';");
$mp = mysql_fetch_array ($adamlar);
$son=$mp["son"];
$qiz=$mp["qadin"];
$kisi=$mp["kisi"];
$max=$mp["max"];
$tarix=$mp["tarix"];

$q1 = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `time` > '".$_AUTO['online']."' and `inv` != '3' and `kik`<'".time()."' and banned = '0';");
$all_room = mysql_result($q1, 0);

$_v->title('Chat.'.$site,'center');
$_v->fsize1('small');
require("logo1.php");
$qey = file("file/log/1.dat");
$img = trim($qey[0]);
$metn = trim($qey[1]);


if($img)echo "<img src=\"http://$img\" alt=\"&#350;ekil\"/><br/>";
if($metn)echo "$metn<br/>*****<br/>";
require("./file/dat_folder/n_n/nikoi.php");

if ($number_1 == 1) {require("onlinesms.php");
$_v->divide();}




if ($number_18 != 'x'){echo "<a href=\"elaqe.php?$ref\">".$number_18."</a><br/>----<br/>";}

/*
echo "<a href=\"xost_reklam.php?$ref\">Reklam Yerlesdir</a> (Azercell ile Tesdiqle)<br/>";
reklam('2');
$sql = mysql_query("SELECT * FROM `AN_reklam` where harda = '1' and mud > '".time()."' ORDER BY `id` asc;");
if(mysql_num_rows($sql) != 0) {
while($EH_s = mysql_fetch_array($sql))
echo $divide;
{
echo "Reklam: <a href=\"http://".$EH_s["urlu"]."\">".$EH_s["adi"]."</a> - ".$EH_s["shuar"]."<br/>";
}
echo $divide;
}

*/


//echo $divide;
echo "<b><span style=\"color: #ff0000\">$site</span></b><br/>----<br/>\n";

if ($number_200 == 1){
require("sekil.php");
echo $divide;

}


if ($number_19 == 1){
#require("videos.php");
$_v->divide();

}


$qey1 = file("file/log/2.dat");
$link1 = trim($qey1[0]);
$link2 = trim($qey1[1]);
$link3 = trim($qey1[2]);
$link4 = trim($qey1[3]);
$link5 = trim($qey1[4]);
$link6 = trim($qey1[5]);
$link7 = trim($qey1[6]);
$link8 = trim($qey1[7]);

if($link1)echo "<a href=\"http://$link1\">$link2</a><br/>";
if($link3)echo "<a href=\"http://$link3\">$link4</a><br/>";
if($link5)echo "<a href=\"http://$link5\">$link6</a><br/>";
if($link7)echo "<a href=\"http://$link7\">$link8</a><br/>";
if($link1)echo "*-=-*<br/>";

$img = trim($qey[2]);
$metn = trim($qey[3]);
if($img)echo "<img src=\"http://$img\" alt=\"&#350;ekil\"/><br/>\n";
if($metn)echo "$metn<br/>*****<br/>\n";

$q = mysql_query("select `id`,`title`,`saat`,`content` from `elan` WHERE `saat`>'".$SERVER_TIME."' order by `id` desc;");
while($arr=@mysql_fetch_array($q)) {
echo "<i>".$arr['title']."</i>... <br/><b>&#304;mza</b>: <u>".$arr['content']."</u><br/>";
$mxs="1";
}

////////////////////////bizim catin yarasiqi//////////
/*
if ($number_100 == 1){
{
$resu = mysql_query ("Select * from albom  order by rand() desc limit 0,4;");
if(mysql_affected_rows() != false)
{
echo "<b><i><u>Foto </u>/ Gallery</i></b><br/>";
}
while ($a2 = mysql_fetch_array($resu))
{
$uid=$a2['idfoto'];
$u_id=$a2['id'];
$photo=$a2['photo'];
$vote=$a2['votes'];

$qus = mysql_query ("Select user from users where id = '".$uid."'");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus); 
$u_user = $ind["idfoto"];
}

echo "<small><img style=\"border: 1px solid #424503;border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;\" src=\"show_photo.php?id=".$u_id."&amp;w=49&amp;h=72\" alt=\"Photo\" /></small>\n";
//echo "<small><img style=\"border: 0px solid #696969; border-top-left-radius: 60px; border-top-right-radius: 60px; border-bottom-left-radius: 60px; border-bottom-right-radius: 60px;\" src=\"show_photo.php?id=".$u_id."&amp;w=62&amp;h=70\" alt=\"Photo\" /></small>\n";
$yar="1";
}
if(mysql_affected_rows() != false)
{
echo "<br/>";
echo $divide;
}
if($yar=="1")echo "";
}
}
///////////////////////son/////
*/


if($mxs=="1")echo "<br/>";
if($all_room=="0")

{
	echo "&#199;atda ve Mesajda he&#231;kes yoxdur :=(<br/>\n";
}
else
{
	if ($number_2 != 'x'){echo "".$number_2." <a href=\"o_line.php?$ref\">".$all_room."</a>, ".$number_3."<br/>\n";}
}
$_v->divide();


if ($number_4 != 'x')echo "".$number_4."<br/>\n";
$_v->action("enter.php?ref=$ref");

print $_v->input('<input name="us" maxlength="30" title="nick"/>').'<br/>';

if($OPERATOR=='NULL')
{

	if ($number_5 != 'x'){print ''.$number_5.'<br/>';}
	print $_v->input('<input type="password" name="npass" maxlength="20" title="Parol"/>').'<br/>';
}
else
{
	if ($number_5 != 'x'){print ''.$number_5.'<br/>';}
	print $_v->input('<input name="npass" maxlength="20" title="Parol"/><br/>');
}
if ($number_6 != 'x'){
//print $_v->submit('Daxil Ol');
print $_v->submit(''.$number_6.'');
$_v->wml('<br/>');
$_v->html('<br/>');
}

if ($number_7 != 'x'){

$show_date = date("Y-m-d");
$sid= date("H")+1;
$sq = mysql_query("SELECT `site_url` FROM `data_reg` WHERE `active`= 1 AND `sid`='".$sid."' AND `date`='".$show_date."'");
$emir = mysql_fetch_array($sq);
if(mysql_num_rows($sq)>0){
$url = $emir['site_url'];
echo "<a href=\"".$url."\"><b>".$number_7."</b></a> (Y&#246;nelib)<br/>----<br/>";
}else{
echo "<img src =\"http://fulhost.info/images/reg.png\"/> <b><a href=\"reghelp.php?$ref\">".$number_7."</a>( Tam Pulsuz )</b><br/>----<br/>";
}
//echo "<a href=\"xost_reg.php?$ref\">Qeydiyyat Y&#246;nelt</a> (Azercell ile Tesdiqle)<br/>---<br/>";
}



$umumi = $kisi+$qiz;
if ($number_8 != 'x')echo "".$number_8." <b>".$son."</b><br/>\n";
$newtoday=mysql_fetch_array(mysql_query("SELECT COUNT(`id`) from `users` WHERE `date` = '".date("d-m-Y",$SERVER_TIME)."';"));
if ($number_9 != 'x')echo "".$number_9." <b>".$newtoday[0]."</b><br/>\n";
if ($number_10 != 'x')echo "".$number_10." <b>".$umumi."</b><br/>\n";
if ($number_11 != 'x')echo "".$number_11." <b>".$kisi."</b> | \n";
if ($number_12 != 'x')echo "".$number_12." <b>".$qiz."</b><br/>\n";

if ($number_8 != 'x' or $number_9 != 'x' or $number_10 != 'x' or $number_11 != 'x' or $number_12 != 'x'){
echo $divide;
}


if($max<$all_room){
$date = date("d.m.y /H:i",$SERVER_TIME); 
if($time=="")
mysql_query("UPDATE `conf` SET `max` = '".$all_room."', `tarix` = '".$date."' where `acar` ='1';");
}

if ($number_13 != 'x')echo "<u>".$number_13."</u> - <b>($max)</b><br/>\n";

if ($number_14 != 'x')echo "<u>".$number_14."</u>: <b>$tarix</b><br/>\n";
if ($number_13 != 'x' or $number_14 != 'x'){
echo "*****<br/>\n";
}


include("xeber.php");

echo "<a href=\"http://fulserver.biz\">Sayt+Chat Sifari&#351;i</a> (Tam Guvenili)<br/>\n";
echo $divide;
if ($number_15 != 'x'){
$z_h = file("file/dat_folder/hediyye_i.dat");
if(trim($z_h[4]) > $SERVER_TIME){
echo "Son Hediyye:<br/>\n";
echo "<img src=\"".trim($z_h[2])."\" width=\"75\" height=\"75\" alt=\"Son Hediyye\"/><br/>\n";
echo trim($z_h[0])." - ".trim($z_h[1])."<br/>\n";
echo $divide;
}
}
if($vcxvcvc0!='x' and $vcxvcvc0!='' and  $dsay!='0' and ($vcxvcvc4=='0' or $vcxvcvc4=='2'))echo "<b><a href=\"domen.php?$ref\">$vcxvcvc0</a></b><br/>\n";

echo "ScriptName: <u><a href=\"license.php?$ref\">auto 1.4</a></u><br/>\n";
//echo $divide;
echo "M&#252;ellif: <b>Goshgar Hasanzadeh</b><br/>\n";
//echo "<b>&#169; B&#252;t&#252;n H&#252;quqlar Qorunur</b><br/>\n";
$_v->divide();

echo "<a href=\"http://$site_url/?$ref\">$site</a><br/>\n";
$_v->divide();
$vuqar = file("file/dat_folder/seo.dat");
$seo = trim($vuqar[0]);
echo "<b>$seo</b>";

$img1 = trim($qey[4]);
$img2 = trim($qey[5]);
if($img1)echo "$img1";
if($img2)echo "$img2";

$_v->fsize2('small');
$_v->End('1',$link);
?>