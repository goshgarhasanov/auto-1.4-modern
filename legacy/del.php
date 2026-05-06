<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);      

if($row["delmsg"] != 1){
$_v->title('Xeta','left');
$_v->fsize1($fsize1);
echo "Bu s&#246;z&#252; silmeye h&#252;ququnuz yoxdur!<br/>****<br/>\n";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

if($rm==10) $takep="&amp;ref=$ref&amp;pwd=$pwd";
else $takep="&amp;ref=$ref";

$room="room".$rm;
settype($klu4, 'integer');

$silinen = @mysql_query ("Select time,who,message from room$rm  WHERE klu4='$klu4' LIMIT 1");
$dum = mysql_fetch_array ($silinen);
$vax=$dum["time"];
$kim=$dum["who"];
$mesaj=$dum["message"];

@$fi = fopen("file/control/1.dat", "a+"); 
$lst = "".base64_encode("<u>$row[user]</u>. $kim [$vax]>$mesaj")."\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

mysql_query("DELETE FROM room$rm WHERE klu4='$klu4' LIMIT 1");
$_v->Redirect("chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep",'5');
$_v->title('Silindi','left');

$_v->fsize1($fsize1);

echo "<u>Mesaj Silindi</u>!<br/>****<br/>\n";
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">&#199;ata Qay&#305;t</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>