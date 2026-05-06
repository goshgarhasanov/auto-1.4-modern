<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$user=$row["user"];
$bal=$row['bal'];

$bals=file("file/bal_bot/0.dat");
$r_bal = trim($bals[18]);
$fp=file("file/dat_folder/reytinq.dat");


$_v->title('Reytinq','center');
$_v->fsize1($fsize1);


switch($mod) {

default:
header ("Location: reytinq.php?id=$id&ps=$ps&ref=$ref");
break;

case 'votes1':
$send=1;
$sends = $send*$r_bal;

if($fp[0]==2){
print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
break;
}

if ($fp[0]==1){
echo "Sesverme dayand&#305;r&#305;l&#305;b...<br/>";
break;
}
if ($bal<$r_bal) {
echo "H&#246;rmetli <u>$user</u>, 1 ses - $r_bal bal deyerindedir.<br/><b>$send</b>-ses &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$sends</b>-bal olmal&#305;d&#305;r!<br/>";
echo "-=-<br/>"; 
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
echo "-=-<br/>"; 
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$q = mysql_query("select `id`,`user`,`ses`,`sex` from `users` where `id`='".$nk."';");
if (mysql_affected_rows() == 0) {
echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>";
echo "-=-<br/>"; 
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$data = mysql_fetch_array($q);
$usid = $data['id'];
$myses = $data['ses'];
$login = $data['user'];
$cins = $data['sex'];

$ishtirak = mysql_query ("select `ses` from `reytinq` where `kim` = '".$id."' and `kime` = '".$usid."';");
if (mysql_affected_rows() == 0) {
mysql_query ("Insert into `reytinq` set `kim`='".$id."', `kime`='".$usid."', `ses`='".$send."', `user`='".$row['user']."', `sex`='".$cins."';");
$sens=$send;
}else{
$cc = mysql_fetch_array ($ishtirak);
$rses = $cc["ses"];
$sens = $rses+$send;
mysql_query ("Update `reytinq` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$usid."' where `kim` = '".$id."' and `kime` = '".$usid."';");
}


$sens = $myses+$send;

mysql_query ("Update `users` set `ses`='".$sens."' where `id`='".$usid."';");

$bal=$row['bal'];
$newbal=$bal-$sends;
mysql_query ("Update `users` set `bal`='".$newbal."' where `id`='".$id."';");
top_all_reytinq();
echo "<p align=\"center\">\n";
echo "H&#246;rmetli <u>$user</u>, siz &#246;z hesab&#305;n&#305;zdan <b>$sends</b>, bal xercleyerek.<br/>";
if($id!=$usid)echo "<b>$login</b>, leqebli istifade&#231;iye <b>$send</b>-ses  verdiniz...<br/>";
else echo "<b>&#214;z&#252;n&#252;ze  $send</b>-ses  verdiniz...<br/>";
echo "Sizin verdiyiniz <b>$send</b>-ses \n";
if($id!=$usid)echo "<b>$login</b>, &#252;&#231;&#252;n qebul olundu!<br/>-=-<br/>";
else echo "qebul olundu!<br/>-=-<br/>";
echo "<i>Te&#351;ekk&#252;rler...</i><br/>";
echo "-=-<br/>";
echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq</a><br/>\n";

$date = date("d.m.y |H:i",$SERVER_TIME); 
@$save= fopen("file/bal_bot/15.dat", "a+"); 
$qeyd = base64_encode("<b>$user</b> - <u>$login</u> reytinqde <b>$send</b>, ses verdi: (<u>$bal - $sends=<b>$newbal</b></u>)-($date)")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);



$u_ses = mysql_query ("select `ses`,`id`,`user` from `users` order by `ses` DESC limit 1;");
$bs = mysql_fetch_array ($u_ses);
$bses = $bs["ses"];
$busid = $bs["id"];
$blogin = $bs["user"];


$dat = file("file/dat_folder/enter.dat");
$dses = trim($dat[5]);
if($dses=="")$dses=0;
if($dses<$bses){
$test1= trim($dat[0]);
$test2= trim($dat[1]);
$test3= trim($dat[2]);
$test7= trim($dat[6]);
$test8= trim($dat[7]);
$test9= trim($dat[8]);
$test10= trim($dat[9]);
$test11= trim($dat[10]);
$test12= trim($dat[11]);

$file = fopen("file/dat_folder/enter.dat", "w");
$data = "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "$blogin\n";
$data .= "$busid\n";
$data .= "$bses\n";
$data .= "$test7\n";
$data .= "$test8\n";
$data .= "$test9\n";
$data .= "$test10\n";
$data .= "$test11\n";
$data .= "$test12";
fwrite($file, $data);
fclose($file);
}
break;


case 'votes5':
$send=5;
$sends = $send*$r_bal;
if($fp[0]==2){
print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
break;
}

if ($fp[0]==1){

echo "Sesverme dayand&#305;r&#305;l&#305;b...<br/>";
break;
}
if ($bal<$sends) {
echo "H&#246;rmetli <u>$user</u>, 1 ses - $r_bal bal deyerindedir.<br/><b>$send</b>-ses &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$sends</b>-bal olmal&#305;d&#305;r!<br/>";
echo "-=-<br/>"; 
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
echo "-=-<br/>"; 
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$q = mysql_query("select `id`,`user`,`ses`,`sex` from `users` where `id`='".$nk."';");
if (mysql_affected_rows() == 0) {
echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>";
echo "-=-<br/>"; 
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$data = mysql_fetch_array($q);
$usid = $data['id'];
$myses = $data['ses'];
$login = $data['user'];
$cins = $data['sex'];

$ishtirak = mysql_query ("select `ses` from `reytinq` where `kim` = '".$id."' and `kime` = '".$usid."';");
if (mysql_affected_rows() == 0) {
mysql_query ("Insert into `reytinq` set `kim`='".$id."', `kime`='".$usid."', `ses`='".$send."', `user`='".$row['user']."', `sex`='".$cins."';");
$sens=$send;
}else{
$cc = mysql_fetch_array ($ishtirak);
$rses = $cc["ses"];
$sens = $rses+$send;
mysql_query ("Update `reytinq` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$usid."' where `kim` = '".$id."' and `kime` = '".$usid."';");
}


$sens = $myses+$send;
mysql_query ("Update `users` set `ses`='".$sens."' where `id`='".$usid."';");
$newbal=$bal-$sends;
mysql_query ("Update `users` set `bal`='".$newbal."' where `id`='".$id."';");
top_all_reytinq();
echo "H&#246;rmetli <u>$user</u>, siz &#246;z hesab&#305;n&#305;zdan <b>$sends</b>, bal xercleyerek.<br/>";
if($id!=$usid)echo "<b>$login</b>, leqebli istifade&#231;iye <b>$send</b>-ses  verdiniz...<br/>";
else echo "<b>&#214;z&#252;n&#252;ze  $send</b>-ses  verdiniz...<br/>";
echo "Sizin verdiyiniz <b>$send</b>-ses \n";
if($id!=$usid)echo "<b>$login</b>, &#252;&#231;&#252;n qebul olundu!<br/>-=-<br/>";
else echo "qebul olundu!<br/>-=-<br/>";
echo "<i>Te&#351;ekk&#252;rler...</i><br/>";
echo "-=-<br/>";
echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq</a><br/>\n";

$date = date("d.m.y |H:i",$SERVER_TIME); 
@$save= fopen("file/bal_bot/15.dat", "a+"); 
$qeyd = base64_encode("<b>$user</b> - <u>$login</u> reytinqde <b>$send</b>, ses verdi: (<u>$bal - $sends=<b>$newbal</b></u>)-($date)")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);

$u_ses = mysql_query ("select ses,id,user from users order by ses DESC limit 1");
$bs = mysql_fetch_array ($u_ses);
$bses = $bs["ses"];
$busid = $bs["id"];
$blogin = $bs["user"];


$dat = file("file/dat_folder/enter.dat");
$dses = trim($dat[5]);
if($dses=="")$dses=0;
if($dses<$bses){
$test1= trim($dat[0]);
$test2= trim($dat[1]);
$test3= trim($dat[2]);
$test7= trim($dat[6]);
$test8= trim($dat[7]);
$test9= trim($dat[8]);
$test10= trim($dat[9]);
$test11= trim($dat[10]);
$test12= trim($dat[11]);

$file = fopen("file/dat_folder/enter.dat", "w");
$data = "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "$blogin\n";
$data .= "$busid\n";
$data .= "$bses\n";
$data .= "$test7\n";
$data .= "$test8\n";
$data .= "$test9\n";
$data .= "$test10\n";
$data .= "$test11\n";
$data .= "$test12";
fwrite($file, $data);
fclose($file);
}
break;

case 'votes10':
$send=10;
$sends = $send*$r_bal;

if($fp[0]==2){
print "Reytinq M&#252;veqqeti olaraq Dayand&#305;r&#305;l&#305;b...<br/>";
break;
}

if ($fp[0]==1){
echo "Sesverme dayand&#305;r&#305;l&#305;b...<br/>";
break;
}

if ($bal<$sends) {
echo "H&#246;rmetli <u>$user</u>, 1 ses - $r_bal bal deyerindedir.<br/><b>$send</b>-ses &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>$sends</b>-bal olmal&#305;d&#305;r!<br/>";
echo "-=-<br/>"; 
echo "Hesab&#305;n&#305;zda <b>$bal</b>, bal var.<br/>";
echo "-=-<br/>"; 
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$q = mysql_query("select `id`,`user`,`ses`,`sex` from `users` where `id`='".$nk."';");
if (mysql_affected_rows() == 0) {
echo "Axtard&#305;&#287;&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>";
echo "-=-<br/>"; 
echo "<a href=\"reytinq.php?mod=ses&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>\n";
break;
}

$data = mysql_fetch_array($q);
$usid = $data['id'];
$myses = $data['ses'];
$login = $data['user'];
$cins = $data['sex'];

$ishtirak = mysql_query ("select `ses` from `reytinq` where `kim` = '".$id."' and `kime` = '".$usid."';");
if (mysql_affected_rows() == 0) {
mysql_query ("Insert into `reytinq` set `kim`='".$id."', `kime`='".$usid."', `ses`='".$send."', `user`='".$row['user']."', `sex`='".$cins."';");
$sens=$send;
}else{
$cc = mysql_fetch_array ($ishtirak);
$rses = $cc["ses"];
$sens = $rses+$send;
mysql_query ("Update `reytinq` set `ses` = '".$sens."', `kim` = '".$id."', `kime` = '".$usid."' where `kim` = '".$id."' and `kime` = '".$usid."';");
}

$sens = $myses+$send;

mysql_query ("Update `users` set `ses`='".$sens."' where `id`='".$usid."';");

$bal=$row['bal'];
$newbal=$bal-$sends;
mysql_query ("Update users set bal='".$newbal."' where id='".$id."'");
top_all_reytinq();
echo "H&#246;rmetli <u>$user</u>, siz &#246;z hesab&#305;n&#305;zdan <b>$sends</b>, bal xercleyerek.<br/>";
if($id!=$usid)echo "<b>$login</b>, leqebli istifade&#231;iye <b>$send</b>-ses  verdiniz...<br/>";
else echo "<b>&#214;z&#252;n&#252;ze  $send</b>-ses  verdiniz...<br/>";
echo "Sizin verdiyiniz <b>$send</b>-ses \n";
if($id!=$usid)echo "<b>$login</b>, &#252;&#231;&#252;n qebul olundu!<br/>-=-<br/>";
else echo "qebul olundu!<br/>-=-<br/>";
echo "<i>Te&#351;ekk&#252;rler...</i><br/>";
echo "-=-<br/>";
echo "<a href=\"reytinq.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Reytinq</a><br/>\n";
$date = date("d.m.y |H:i",$SERVER_TIME); 
@$save= fopen("file/bal_bot/15.dat", "a+"); 
$qeyd = "".base64_encode("<b>$user</b> - <u>$login</u> reytinqde <b>$send</b>, ses verdi: (<u>$bal - $sends=<b>$newbal</b></u>)-($date)")."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);


$u_ses = mysql_query ("select `ses`,`id`,`user` from `users` order by `ses` DESC limit 1;");
$bs = mysql_fetch_array ($u_ses);
$bses = $bs["ses"];
$busid = $bs["id"];
$blogin = $bs["user"];


$dat = file("file/dat_folder/enter.dat");
$dses = trim($dat[5]);
if($dses=="")$dses=0;
if($dses<$bses){
$test1= trim($dat[0]);
$test2= trim($dat[1]);
$test3= trim($dat[2]);
$test7= trim($dat[6]);
$test8= trim($dat[7]);
$test9= trim($dat[8]);
$test10= trim($dat[9]);
$test11= trim($dat[10]);
$test12= trim($dat[11]);

$file = fopen("file/dat_folder/enter.dat", "w");
$data = "$test1\n";
$data .= "$test2\n";
$data .= "$test3\n";
$data .= "$blogin\n";
$data .= "$busid\n";
$data .= "$bses\n";
$data .= "$test7\n";
$data .= "$test8\n";
$data .= "$test9\n";
$data .= "$test10\n";
$data .= "$test11\n";
$data .= "$test12";
fwrite($file, $data);
fclose($file);
}
break;
}

$_v->divide();
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
else echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaja Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>