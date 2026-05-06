<?php 
include('inc.php');
$link = connect_db();

$id = intval($_GET['id']);
$sql = mysql_query("SELECT `url` FROM `data_reklam` WHERE `id` = '{$id}';");
if( $object = mysql_fetch_object($sql) ) {
	mysql_query("UPDATE `data_reklam` SET `clicks`=`clicks`+'1' WHERE `id` ='{$id}';");
	header("Location: {$object->url}"); die;
}