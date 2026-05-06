<?
function pagenav($base_url, $start, $max_value, $num_per_page) {
        $pgcont = 4;
        $pgcont = (int)($pgcont - ($pgcont % 2)) / 2;
    if ($start >= $max_value)
        $start = max(0, (int)$max_value - (((int)$max_value % (int)$num_per_page) == 0 ? $num_per_page : ((int)$max_value % (int)$num_per_page)));
    else
        $start = max(0, (int)$start - ((int)$start % (int)$num_per_page));
    $base_link = '<a href="' . strtr($base_url, array ('%' => '%%')) . 'start=%d' . ''.$kod.''.$cat.''.$akt.''.$cid.''.$p.''.$nm.'">%s</a> ';
    $pageindex = $start == 0 ? '' : sprintf($base_link, $start - $num_per_page, ' &#171;');
    if ($start > $num_per_page * $pgcont)
        $pageindex .= sprintf($base_link, 0, '1');
    if ($start > $num_per_page * ($pgcont + 1))
        $pageindex .= '... ';
    for ($nCont = $pgcont; $nCont >= 1; $nCont--)
        if ($start >= $num_per_page * $nCont) {
            $tmpStart = $start - $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    $pageindex .= '<b>'.($start / $num_per_page + 1).'</b> ';
    $tmpMaxPages = (int)(($max_value - 1) / $num_per_page) * $num_per_page;
    for ($nCont = 1; $nCont <= $pgcont; $nCont++)
        if ($start + $num_per_page * $nCont <= $tmpMaxPages) {
            $tmpStart = $start + $num_per_page * $nCont;
            $pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
        }
    if ($start + $num_per_page * ($pgcont + 1) < $tmpMaxPages)
        $pageindex .= '... ';
    if ($start + $num_per_page * $pgcont < $tmpMaxPages)
        $pageindex .= sprintf($base_link, $tmpMaxPages, $tmpMaxPages / $num_per_page + 1);
    if ($start + $num_per_page < $max_value) {
        $display_page = ($start + $num_per_page) > $max_value ? $max_value : ($start + $num_per_page);
        $pageindex .= sprintf($base_link, $display_page, ' &#187;');
    }
    return $pageindex;
}


function antirekl($var) {
    $var = strtr($var, array (
    // Herfler
        '[/u]' => '</u>',
        '[u]' => '<u>',
        '[/i]' => '</i>',
        '[i]' => '<i>',
        '[/b]' => '</b>',
        '[b]' => '<b>',
        'Sh' => '&#350;',
        'sh' => '&#351;',
        'W' => '&#350;',
        'w' => '&#351;',
        'Ch' => '&#199;',
        'ch' => '&#231;',
        'Gh' => '&#286;',
        'gh' => '&#287;',
    // Panyatka :-)
        'peyser' => 'boyun ard&#305;',
    // Reklam
        ".ru" => "***",
        ".com" => "***",
        ".net" => "***",
        ".org" => "***",
        ".info" => "***",
        ".mobi" => "***",
        ".wen" => "***",
        ".kmx" => "***",
        ".h2m" => "***",
        ".az" => "***",
        ".in" => "***",
        ".im" => "***",
        ".us" => "***",
        ".su" => "***",
        "sik" => "***",
        "got" => "***",
        "qehbe" => "***"
    ));
    return $var;
}
function notags($var = '') {
    $var = strtr($var, array (
        '[green]' => '',
        '[/green]' => '',
        '[red]' => '',
        '[/red]' => '',
        '[blue]' => '',
        '[/blue]' => '',
        '[b]' => '',
        '[/b]' => '',
        '[i]' => '',
        '[/i]' => '',
        '[u]' => '',
        '[/u]' => '',
        '[s]' => '',
        '[/s]' => '',
        '[c]' => '',
        '[/c]' => ''
    ));
    return $var;
}
function checkout($str, $br = 0, $tags = 0) {
    $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
    if ($br == 1)
        $str = nl2br($str);
    elseif ($br == 2)
        $str = str_replace("\r\n", ' ', $str);
    if ($tags == 1)
        $str = tags($str);
    elseif ($tags == 2)
        $str = notags($str);
    $str = strtr($str, array (
        chr(0)=> '',
        chr(1)=> '',
        chr(2)=> '',
        chr(3)=> '',
        chr(4)=> '',
        chr(5)=> '',
        chr(6)=> '',
        chr(7)=> '',
        chr(8)=> '',
        chr(9)=> '',
        chr(10)=> '',
        chr(11)=> '',
        chr(12)=> '',
        chr(13)=> '',
        chr(14)=> '',
        chr(15)=> '',
        chr(16)=> '',
        chr(17)=> '',
        chr(18)=> '',
        chr(19)=> '',
        chr(20)=> '',
        chr(21)=> '',
        chr(22)=> '',
        chr(23)=> '',
        chr(24)=> '',
        chr(25)=> '',
        chr(26)=> '',
        chr(27)=> '',
        chr(28)=> '',
        chr(29)=> '',
        chr(30)=> '',
        chr(31)=> ''
    ));
    return $str;
}

$onl_vaxt = time() - 900;

$r_vaxt = 1800 + time();
$v_refresh = file("file/dat_folder/refresh.dat");
$v_time = trim($v_refresh[0]);

if ($v_time < time()){
$et = mysql_query("SELECT * FROM `group`;");
while($us_cemi = mysql_fetch_array($et))
{
$usse = mysql_query("SELECT COUNT(*) FROM `users` WHERE `group` = '".$us_cemi["id"]."' and `group_act` = '1';");
$in_users = mysql_result($usse, 0);
mysql_query ("UPDATE `group` SET `say` = '".$in_users."' where `id` = '".$us_cemi["id"]."';");
}
@$save= fopen("file/dat_folder/refresh.dat", "w+");
@fwrite($save, "$r_vaxt");
@fflush($save);
@fclose($save);
}
?>
