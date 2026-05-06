<?php
function IPcode( $sec_ip, $ip_num, $num_1, $num_2 )
{
    $ip_text = substr( $sec_ip, 0, $ip_num );
    if ( $num_1 != 0 && $num_2 != 0 )
    {
        $ip_text2 = substr( $ip_text, $ip_num - strlen( $num_2 - $num_1 ), $ip_num );
        if ( $num_1 <= $ip_text2 && $ip_text2 <= $num_2 )
        {
            $sec_ip = $ip_text;
            $Var_792 = $ip_text2 - $num_1;
            $ip_text2 = $ip_text2 - $cixilan;
            if ( $ip_text2 != 0 )
            {
                $sec_ip = substr( $sec_ip, 0, strlen( $sec_ip ) - strlen( $ip_text2 ) ).$ip_text2;
            }
        }
    }
    else
    {
        $sec_ip = $ip_text;
    }
    return $sec_ip;
}

?>