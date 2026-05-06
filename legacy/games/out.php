<?php
ini_set( "session.use_cookies", "0" );
ini_set( "session.use_trans_sid", "0" );
ini_set( "url_rewriter.tags", "" );
session_name( "stw" );
session_start( );
session_destroy( );
require( "../inc.php" );
$link = connect_db( );
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$taker = "{$ses}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}";
$_v->Redirect("../enter.php?{$taker}","10");
$_v->title('&#199;&#305;x&#305;&#351;','center');
$_v->fsize1($fsize1);
echo "N&#246;vbeti Oyuna Kimi Helelik!<br/>\n";
$_v->divide();
echo "<a href=\"../enter.php?{$taker}\">Biraz G&#246;zleyin!</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('0',$link);
?>