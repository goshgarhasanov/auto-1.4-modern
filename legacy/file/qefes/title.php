<?php
$userall = mysql_query( "select count(`id`) as `num` from `qefes` where `off` = '0'" );
$usm = mysql_fetch_array( $userall );
$nam = $usm['num'];
if ( 3 <= $nam )
{
    if ( $nam == 3 && $dat_config_limit == 2 )
    {
        $limit = 1;
    }
    else if ( $nam == 3 && $dat_config_limit == 3 )
    {
        $limit = 1;
    }
    else if ( $nam == 4 && $dat_config_limit == 3 )
    {
        $limit = 2;
    }
    else
    {
        $limit = $dat_config_limit;
    }
}
else
{
    $limit = 1;
    $extra = 1;
}
?>
