<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);

if($p_arr['7']!=1)
{
	$_v->title('Olmaz','center');
	$_v->fsize1($fsize1);
	echo 'Sizin buna hüququnuz yoxdur.<br/>----<br/>';
	echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

if(!$nick)
{
	$_v->title('Axtar');
	$_v->fsize1($fsize1);
	$_v->action("a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref");

	echo "<b>Leqeb / ID:</b><br/>\n";
print $_v->input("<input name=\"nick$ref\" title=\"title\" emptyok=\"true\"/>").'<br/>';

	$_v->divide();
	echo "IP-Adress:\n";
	print $_v->select("<select name=\"ip$ref\">|<option value=\"0\">Aktiv</option>|<option value=\"1\">Deaktiv</option>|</select>",'null').'<br/>';


	echo "IP-Soft:\n";
	print $_v->select("<select name=\"soft$ref\">|<option value=\"0\">Aktiv</option>|<option value=\"1\">Deaktiv</option>|</select>",'null').'<br/>';

	echo "Parol:\n";
	print $_v->select("<select name=\"pw$ref\">|<option value=\"0\">Aktiv</option>|<option value=\"1\">Deaktiv</option>|</select>",'null').'<br/>';

	echo "Cinsi:\n";
	print $_v->select("<select name=\"sex$ref\">|<option value=\"0\">O&#287;lanlar</option>|<option value=\"1\">Q&#305;zlar</option>|<option value=\"2\">Ham&#305;s&#305;</option>|</select>",'null').'<br/>';
	print $divide;

	print $_v->submit1('Axtar');

	$_v->divide();
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}





if($nick != ""){
$nick=trim($nick);       
if($nick=="")$nick=0;          
if (!ctype_digit($nick)) {        
    $latuser=strtolower($nick);
   $select = mysql_query ("Select * from users where latuser = '".$latuser."'"); 
}
else 
{
   $select = mysql_query ("Select * from users where id = '".$nick."'"); 
}

if (mysql_affected_rows() == 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo 'Bele bir istifade&#231;i m&#246;vcut deyil...<br/>----<br/>';
	echo "<a href=\"a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$inf = mysql_fetch_array ($select); 
$user_ip = $inf["user_ip"];
$user_soft = $inf["user_soft"];
$user_sex = $inf["sex"];
$user_ps= $inf["pass"];




if ($ip == 0) $l1 = "AND `user_ip` = '".$user_ip."'"; else $l1 = "";
if ($soft == 0) $l2 = "AND `user_soft` = '".$user_soft."'"; else $l2 = "";
if ($sex != 2) $l3 = "AND `sex` = '".$user_sex."'"; else $l3 = "";
if ($pw == 0) $l4 = "AND `pass` = '".$user_ps."'"; else $l4 = "";
$sorgu = "SELECT * FROM `users` WHERE `id`!='0' $l1 $l2 $l3 $l4";


$sorgu1 = mysql_query($sorgu." ORDER BY `id` ASC");
$alls = mysql_num_rows($sorgu1);



if(isset($_GET['s'])) $s = intval($_GET['s']);
else $s = 0;
if($s < 0) $s = 0;
if($s > $alls) $s = 0;
$c = $s + 1;


$_v->title('Ox&#351;arlar');
$_v->fsize1($fsize1);

if($alls == 0)
{
	echo "<i>He&#231; bir netice tap&#305;lmad&#305;.</i><br/>\n";
	echo $divide;
	echo "<a href=\"a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
}
else
{
if(!isset($s))$s=1;
$mx=round(($alls/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;

$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$alls)$do=$alls;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;


echo "<u>Ox&#351;arlar</u><br/>----<br/>\n";
echo "Tap&#305;ld&#305; \"<b>$alls</b>\" nefer:<br/>";
$_v->divide();

$r = mysql_query($sorgu." ORDER BY `id` ASC  LIMIT $o,$do;");

for ($i=$ot;$i<=$do;$i++){
$a = mysql_fetch_array($r);
$u_user = $a ["user"];
$images = $a ["img"];                    
$u_id = $a ["id"];
$year = $a ["year"];
$sex_x = $a ["sex"];

if($sex_x==0){$cins = "Ki&#351;i";} else {$cins = "Qad&#305;n";}
$year = date("Y")-$year;
$img_type="error";

if($images!="0"){
$albom = @mysql_query("SELECT photo FROM `albom` WHERE `idfoto`='".$u_id."' order by vote desc;");
$img = mysql_fetch_array($albom);
$photos = $img ["photo"];
if(file_exists("photos/".$u_id."/".$photos."")){ $daroq = getimagesize("photos/$u_id/$photos"); }
$n_nam = $daroq[2];
 if($n_nam=="1"){$img_type="gif";}
 elseif($n_nam=="2"){$img_type="jpg";}
 elseif($n_nam=="3"){$img_type="png";}

$photo = "<img src=\"normal/".base64_encode("photos/$u_id/$photos")."/40/$site-$u_user.$img_type\" alt=\"$u_user\"/>\n";
}


echo "".$i.")";
if($img_type!="error"){echo $photo;}
echo " <a href=\"axtar.php?bol=0&amp;id=$id&amp;ps=$ps&amp;nick=$u_user&amp;ref=$ref\">$u_user</a> ya&#351;&#305;: $year  $cins<br/>";
}
$_v->divide();

$next=$s+1;
$prev=$s-1;
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"a-axtar.php?go=axtar&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;nick=$nick&amp;ip=$ip&amp;soft=$soft&amp;sex=$sex&amp;pw=$pw&amp;ref=$ref\">&lt;&lt;$ot</a>.\n";
}

$tes = $alls/10;
$test = round($tes);

if ($test>$s) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$alls)$do=$alls;
echo " | <a href=\"a-axtar.php?go=axtar&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;nick=$nick&amp;ip=$ip&amp;soft=$soft&amp;sex=$sex&amp;pw=$pw&amp;ref=$ref\">$do&gt;&gt;</a>\n";
}
if(($s>=1)and($alls>10))echo "<br/>";
echo "<a href=\"a-axtar.php?go=axtar&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}


echo "<a href=\"a-axtar.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Gizli Axtar&#305;&#351;</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\" accesskey=\"0\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>