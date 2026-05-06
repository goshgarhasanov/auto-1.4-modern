<?php
$gun = date( "w" );
if ( !file_exists( "file/qefes/0_aktiv.dat" ) )
{
    @rename( "file/qefes/0_deaktiv.dat", "file/qefes/0_aktiv.dat" );
}
$file = file( "file/qefes/0_aktiv.dat" );
if ( !isset( $_POST['sra1'] ) )
{
    $sra0 = trim( $file[0] );
    $sra1 = trim( $file[1] );
    $sra1 = str_replace( "<br/>", "", $sra1 );
    $sra1 = str_replace( "<b>", "[b]", $sra1 );
    $sra1 = str_replace( "</b>", "[/b]", $sra1 );
    echo "<b>Qefes Panel</b><br/>*****<br/>\n";
    echo $fsize2;
    echo "</p>\n";
    echo "<p align =\"left\">\n";
    echo $fsize1;
    echo "Dehlize mesaj<br/>";
    echo $fsize2;
    echo "<input type=\"text\" name=\"sra1{$ref}\" maxlength=\"500\" value=\"{$sra1}\"/><br/>\n";
    echo "<select name=\"sra0{$ref}\">";
    if ( $sra0 == $gun )
    {
        echo "<option value=\"{$gun}\">Aktiv</option>";
        echo "<option value=\"x\">Deaktiv</option>";
    }
    else
    {
        echo "<option value=\"x\">Deaktiv</option>";
        echo "<option value=\"{$gun}\">Aktiv</option>";
    }
    echo "</select><br/>";
    echo $fsize1;
    echo "<anchor>[Yenile]<go href=\"qefes.php?id={$id}&amp;ps={$ps}&amp;cid=0&amp;jo=3&amp;ref={$ref}\" method=\"post\">\n";
    echo "<postfield name=\"sra0\" value=\"\$(sra0{$ref})\"/>\n";
    echo "<postfield name=\"sra1\" value=\"\$(sra1{$ref})\"/>\n";
    echo "</go></anchor><br/>-----\n";
}
else
{
    $sra1 = narmobilqefes( $sra1 );
    $file = fopen( "file/qefes/0_aktiv.dat", "w" );
    $data .= "{$sra0}\n";
    $data .= "{$sra1}<br/>";
    fwrite( $file, $data );
    fclose( $file );
    echo "Melumat Yenilendi!<br/>";
}
?>
