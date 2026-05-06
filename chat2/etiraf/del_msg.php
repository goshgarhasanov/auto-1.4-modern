<?php
error_reporting(0);
header("Content-type:text/vnd.wap.wml");
header("Cache-Control: no-store, no-cache, must-revalidate");

include("../ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row['bal'];
$level = $row['level'];
$nickname = $row['user'];

if($level<7){
exit;
}

//$msg_id = intval($_GET['msg_id']);
$msg_id = intval($_POST['msg_id']);
$eid = intval($_GET['eid']);
mysql_query("DELETE FROM `etiraf_sherh` WHERE `id` = '".$msg_id."' AND `ideti` = '".$eid."' LIMIT 1;");

header ("location: index.php?go=goster&id=$id&ps=".$ps."&eid=".intval($_GET['eid'])."&ref=$ref");

?>
