<?

if ($_GET['shekil'] == '1') {
    if ($row['shekil'] == 0) {
        mysql_query ("update `users` set `shekil` = '1' where `id` = '".$id."';");
        header ("Location: on.php?id=$id&ps=$ps&ref=$ref");
        exit;
    }
} else if ($_GET['shekil'] == '0') {
    if ($row['shekil'] == 1) {
        mysql_query ("update `users` set `shekil` = '0' where `id` = '".$id."';");
        header ("Location: on.php?id=$id&ps=$ps&ref=$ref");
        exit;
    }
}
$rpos = file("file/dat_folder/n_n/on_niko.dat");
$ferqli = trim($rpos[1]);
$file = @file("file/dat_folder/n_n/onphp.dat");
$number_1 = trim($file[0]);
$number_2 = trim($file[1]);
$number_3 = trim($file[2]);
$number_4 = trim($file[3]);
$number_5 = trim($file[4]);
$number_6 = trim($file[5]);
$number_7 = trim($file[6]);
$number_8 = trim($file[7]);
$number_9 = trim($file[8]);
$number_10 = trim($file[9]);
$number_11 = trim($file[10]);
$number_12 = trim($file[11]);
$number_13 = trim($file[12]);
$number_14 = trim($file[13]);
$number_15 = trim($file[14]);
$number_16 = trim($file[15]);
$number_17 = trim($file[16]);
$number_18 = trim($file[17]);
$number_19 = trim($file[18]);
$number_20 = trim($file[19]);
$number_21 = trim($file[20]);
$number_22 = trim($file[21]);
$number_23 = trim($file[22]);
$number_24 = trim($file[23]);
/*
$number_25 = trim($file[24]);
$number_26 = trim($file[25]);
$number_27 = trim($file[26]);
$number_28 = trim($file[27]);
$number_29 = trim($file[28]);
$number_30 = trim($file[29]);
$number_31 = trim($file[30]);
$number_32 = trim($file[31]);
$number_33 = trim($file[32]);
$number_34 = trim($file[33]);
$number_35 = trim($file[34]);
$number_36 = trim($file[35]);
$number_37 = trim($file[36]);
$number_38 = trim($file[37]);
$number_39 = trim($file[38]);
$number_40 = trim($file[39]);*/
$rpos = file("file/dat_folder/n_n/missia.dat");
$bonusm = trim($rpos[2]);
$yer = trim($rpos[3]);
?>
