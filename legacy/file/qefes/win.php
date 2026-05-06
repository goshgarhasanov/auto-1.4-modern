<?php
echo "<i><b>{$user['0']}</b> leqebli &#304;&#351;tirak&#231;&#305;n&#305; destekleyenlerin siyah&#305;s&#305;.</i><br/>---<br/>";
echo $fsize2;
echo "</p>\n";
echo "<p align =\"left\">\n";
echo $fsize1;
echo "Ses verenler: <u>{$num}</u><br/>";
echo $fsize2;
echo "<select name=\"send_ses{$ref}\">";
echo "<option value=\"1\">1</option>";
echo "<option value=\"2\">5</option>";
echo "<option value=\"3\">10</option>";
echo "<option value=\"4\">30</option>";
echo "<option value=\"5\">50</option>";
echo "<option value=\"6\">100 </option>";
echo "</select>\n";
echo $fsize1;
echo "[<anchor>ses ver<go href=\"qefes.php?id={$id}&amp;ps={$ps}&amp;cid=ses&amp;ref={$ref}\" method=\"post\">";
echo "<postfield name=\"kime\" value=\"{$user['0']}\"/>";
echo "<postfield name=\"send\" value=\"\$(send_ses{$ref})\"/>";
echo "<postfield name=\"action\" value=\"save\"/>";
echo "</go></anchor>]<br/>\n";
if ( !isset( $s ) )
{
    $s = 0;
}
$mx = round( $num / 10 + 0.45 );
if ( $mx < $s )
{
    $s = $mx;
}
if ( $s == 0 )
{
    $s = 1;
}
$ot = ( $s - 1 ) * 10 + 1;
$do = $s * 10;
if ( $num < $do )
{
    $do = $num;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
    $n = $o;
}
echo $divide;
$r = mysql_query( "select `kim`,`ses` from `qefess` where `kime` ='".$uid."' order by `ses` desc limit {$o},{$do}" );
$i = $ot;
while ( $i <= $do )
{
    $arr = mysql_fetch_array( $r );
    $usid = $arr['kim'];
    $ses = $arr['ses'];
    $sesveren = @mysql_fetch_array( @mysql_query( "Select `user` from `users` where `id`='".$usid."' LIMIT 1;" ) );
    echo $i.") <a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}&amp;ref={$ref}\">".$sesveren[0]."</a> ({$ses}-ses)<br/>";
    ++$i;
}
$next = $s + 1;
$prev = $s - 1;
if ( $do < $num )
{
    $ot = ( $next - 1 ) * 10 + 1;
    $do = $next * 10;
    if ( $num < $do )
    {
        $do = $num;
    }
    echo $divide;
    echo "<a href=\"qefes.php?cid=ses_veren&amp;id={$id}&amp;ps={$ps}&amp;uid={$uid}&amp;s={$next}&amp;ref={$ref}\">&gt;&gt;{$ot}-{$do}&gt;&gt;</a>\n";
}
if ( 1 < $s )
{
    echo $divide;
    $ot = ( $prev - 1 ) * 10 + 1;
    $do = $prev * 10;
    echo "<a href=\"qefes.php?cid=ses_veren&amp;id={$id}&amp;ps={$ps}&amp;uid={$uid}&amp;s={$prev}&amp;ref={$ref}\">&lt;&lt;{$ot}-{$do}&lt;&lt;</a>\n";
}
if ( $do < $num && 1 < $s )
{
    echo "<br/>";
}
?>
