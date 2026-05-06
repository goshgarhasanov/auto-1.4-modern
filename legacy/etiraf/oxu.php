<?php
include("../ay.php");

$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$eid = intval($_GET['eid']);

$q = mysql_query("SELECT * FROM `etiraf_text` WHERE `id` = '".$eid."' LIMIT 1;");

if(mysql_num_rows($q) != 0)
{
@mysql_query("UPDATE `etiraf_text` SET `count_read`=`count_read`+'1' WHERE id='$eid'");

header ("location: index.php?go=goster&eid=".$eid."&id=".$_GET['id']."&ps=".$_GET['ps']."&ref=$ref");
} else {
header ("location: index.php?id=$id&ps=$ps&ref=$ref");
}

?>
