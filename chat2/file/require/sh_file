<?php
function narmobil( $msg )
{
$msg = trim( " {$msg} " );
$msg = ereg_replace( " +", " ", $msg );
$msg = substr( $msg, 0, 5000 );
$msg = str_replace( "", " ", $msg );
$msg = str_replace( "\$", "\$\$", $msg );
$msg = strtr($msg,array(chr("0")=>"",chr("1")=>"",chr("2")=>"",chr("3")=>"",chr("4")=>"",chr("5")=>"",chr("6")=>"",chr("7")=>"",chr("8")=>"",chr("9")=>"",chr("10")=>"",chr("11")=>"",chr("12")=>"",chr("13")=>"",chr("14")=>"",chr("15")=>"",chr("16")=>"",chr("17")=>"",chr("18")=>"",chr("19")=>"",chr("20")=>"",chr("21")=>"",chr("22")=>"",chr("23")=>"",chr("24")=>"",chr("25")=>"",chr("26")=>"",chr("27")=>"",chr("28")=>"",chr("29")=>"",chr("30")=>"",chr("31")=>""));
$msg = htmlspecialchars( $msg );
$msg = str_replace( "\"", "&quot;", $msg );
$msg = str_replace( "|", "&#0166;", $msg );
$msg = str_replace( "'", "&#8216;", $msg );
$msg = str_replace( "\\", "", $msg );
$msg = str_replace( "\\n", " ", $msg );
$msg = str_replace( "\n", " ", $msg );
$msg = str_replace( "\$", "\$\$", $msg );
$msg = str_replace( "#_", "<br/>", $msg );
$msg = addslashes( $msg );
return $msg;
}

?>
