<?php
function OPERAT0R($sec_ip, $ip_num, $num_1, $num_2) {
$ip_text = substr($sec_ip, 0, $ip_num);
if ($num_1 != 0 && $num_2 != 0) {
$ip_text2 = substr($ip_text, $ip_num - strlen($num_2 - $num_1), $ip_num);
if ($num_1 <= $ip_text2 && $ip_text2 <= $num_2) {
$sec_ip = $ip_text;
$cixilan = $ip_text2 - $num_1;
$ip_text2 = $ip_text2 - $cixilan;
if ($ip_text2 != 0) {
$sec_ip = substr($sec_ip, 0, strlen($sec_ip) - strlen($ip_text2)).$ip_text2;
}}} else {
$sec_ip = $ip_text;
}
return $sec_ip;
}

function OPERATOR($USER_IP) {
require("file/require/update.inc");

while (list($ip_adress_num, $value_ip_adress) = $ip_adress_num)
{
if (ip2long($USER_IP) <= ip2long($user_ip_adress_max[$ip_adress_num]) && ip2long($value_ip_adress) <= ip2long($USER_IP))
{
return $user_ip_adress_name[$ip_adress_num];
}
}
return "NULL";
}





?>
