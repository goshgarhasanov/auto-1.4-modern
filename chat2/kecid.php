<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$us=$row["user"];
$sex=$row["sex"];
$level=$row["level"];


//////////////////////////////////// Avtomatik Status verilmesi.
if (($row["posts"]>=1000)&&($row["level"]<1)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=1");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 1; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "".$sta1."";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}
if (($row["posts"]>=3000)&&($row["level"]<2)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=2");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 2; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "".$tebrik." <b>".$user."</b>!!! ".$sta2."";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}

if (($row["posts"]>=7000)&&($row["level"]<3)){
$syst = @mysql_query ("Select user from users where id='1' LIMIT 1;");
$rr = @mysql_fetch_array ($syst);
$adm = $rr["user"];
$levelselect = @mysql_query ("Select name from levels where level=3");
$levels = @mysql_fetch_array($levelselect);
$levelname = $levels["name"];
$row["level"] = 3; $row["status"] = "".$levelname."";
mysql_query ("UPDATE users SET status = '".$row["status"]."', level = '".$row["level"]."' WHERE id = '".$id."';");
$data = date("d-M-Y [H:i]");
$kolw = rand(0,99999999);
$times = time()+$vaxt;
$message = "".$tebrik." <b>".$user."</b>!!! ".$sta2."";
mysql_query("insert into zapiski values(0,'".$adm."','7','".$message."','".$user."','".$id."','".$times."','0','".$tebrik."','".$data."','1','1');");
}
////////////////////////////////////


$where = $_POST['where'];

switch ($where) {
default:
header ("location: enter.php?id=$id&ps=$ps&savalan=$savalan&ref=$ref");
break;

case 'mektub':
header ("location: mektub.php?id=$id&ps=$ps&savalan=$savalan&ref=$ref");
break;

case 'love':
header ("location: on.php?id=$id&ps=$ps&savalan=$savalan&ref=$ref");
break;

case 'mms':
header ("location: mms.php?id=$id&ps=$ps&savalan=$savalan&ref=$ref");
break;

case 'kimharda':
header ("location: onlayn.php?id=$id&ps=$ps&savalan=$savalan&ref=$ref");
break;


case '0':
case '1':
case '2':
case '3':
case '4':
case '5':
case '6':
case '7':
case '8':
case '9':
case '10':
case '11':
case '12':
case '13':
case '14':
case '15':
case '16':
case '17':
case '18':
case '19':
case '20':
header ("Location: chat.php?id=$id&ps=$ps&rm=$where&savalan=$savalan&ref=$ref");
break;
}

?>