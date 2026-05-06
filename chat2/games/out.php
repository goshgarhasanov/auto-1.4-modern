<?php
ini_set( "session.use_cookies", "0" );
ini_set( "session.use_trans_sid", "0" );
ini_set( "url_rewriter.tags", "" );
session_name( "stw" );
session_start( );
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml" );
session_destroy( );
$taker = "{$ses}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}";
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"done\" title=\"Done!\" ontimer=\"../enter.php?{$taker}\"><timer value=\"5\"/>\n";
echo "<p align=\"center\">\n";
echo "<small>";
echo "N&#246;vbeti Oyuna Kimi Helelik!<br/>----<br/>\n";
echo "<a href=\"../enter.php?{$taker}\">Biraz G&#246;zleyin!</a><br/>\n";
echo "</small>";
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
?>