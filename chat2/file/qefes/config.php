<?php
function cuci( $cuci )
{
    $ccicix = strlen( $cuci ) - 1;
    $cuc = substr( $cuci, $ccicix, strlen( $cuci ) );
    $cicu = array(
        "1" => "".$cuci."-ci",
        "2" => "".$cuci."-ci",
        "3" => "".$cuci."-c&#252;",
        "4" => "".$cuci."-c&#252;",
        "5" => "".$cuci."-ci",
        "6" => "".$cuci."-c&#305;",
        "7" => "".$cuci."-ci",
        "8" => "".$cuci."-ci",
        "9" => "".$cuci."-cu",
        "0" => "".$cuci."-cu",
        "11" => "Noyabr",
        "12" => "Dekabr"
    );
    $cuc = $cicu[$cuc];
    return $cuc;
}
?>
