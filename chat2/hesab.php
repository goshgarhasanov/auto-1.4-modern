<?php
header( "Cache-Control: no-cache" );
header( "Content-type:text/vnd.wap.wml; charset=utf-8" );
require( "ay.php" );
$link = connect_db( );

list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


$thesite = "qusse.biz";
$online = time( ) + $vaxt;
mysql_query( "UPDATE `users` SET `time` = '".$online."' WHERE `id` = '".$id."' LIMIT 1;" );
$bal = $row['bal'];
$user = $row['user'];
ob_start( );
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\" \"http://www.wapforum.org/DTD/wml_1.1.xml\">\n";
echo "<wml>\n<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/>\n";
echo "<meta http-equiv=\"{$site}\" content=\"no-cache\"/></head>\n";
if ( !file_exists( "file/bal_bot/0.dat" ) )
{
    echo "<card id=\"temir\" title=\"Temir\">\n";
    echo "<p>\n";
    echo $fsize1;
    echo "<b>Bal xidmetleri</b>, 2-3 saatliq temir ile elaqedar fasile edir.<br/>";
    echo $divide;
    print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>";
    echo $fsize2;
    echo "</p></card></wml>";
    ob_end_flush( );
    exit( );
}

//global $bolme;

switch ( $bolme )
{
    case "nik" :
        $bals = file( "file/bal_bot/0.dat" );
        $r_nik_1 = trim( $bals[2] );
        $r_nik_2 = trim( $bals[3] );
        $c_nick = mysql_query( "select time from `c_nick` where `to` = '".$id."'" );
        $nikc = mysql_fetch_array( $c_nick );
        $niktime = $nikc['time'];
        echo "<card id=\"bal_xidmet\" title=\"Rengli nik Sifrari&#351;\">\n";
        echo "<p>\n";
        if ( !isset( $_POST['action'] ) )
        {
            echo $fsize1;
            echo "<b>Rengli nik Sifrari&#351;</b><br/>*****<br/>\n";
            echo "Rengli nick 2 formadad&#305;r (<i>Hereketli ve hereketsiz</i>).<br/>\r\nHereketsiz nick 1 ayl&#305;&#287;&#305; <b>".$r_nik_1."</b>. bal,<br/>\r\nHereketli nickin, ise 1 ayl&#305;q  <b>".$r_nik_2."</b>, bal deyerindedir.<br/>";
            echo "----<br/><i>Nickler Sizin istediyiniz qrafikada haz&#305;rlan&#305;r.</i><br/>\r\n<i>Sifari&#351; edildikden 24 saat erzinde haz&#305;r olur.</i><br/>----<br/>\n";
            echo "Sizin balans&#305;n&#305;zda <b>{$bal}</b>, bal var<br/>\n";
            echo "----<br/>\n";
            $q = mysql_query( "SELECT * FROM `c_nick` WHERE `to` = '".$id."';" );
            if ( mysql_num_rows( $q ) != 0 )
            {
                if ( file_exists( "i/".$id.".gif" ) )
                {
                    $tkick = $niktime - time( );
                    if ( $tkick < 60 && 0 < $tkick )
                    {
                        $vaxt = "saniyye\n";
                    }
                    else if ( $tkick < 3600 && 60 < $tkick )
                    {
                        $new = $tkick;
                        $tkick = $new / 60;
                        $vaxt = "deqiqe\n";
                    }
                    else if ( $tkick < 86400 && 3600 < $tkick )
                    {
                        $new = $tkick;
                        $tkick = $new / 3600;
                        $vaxt = "saat\n";
                    }
                    else if ( 86400 < $tkick )
                    {
                        $new = $tkick;
                        $tkick = $new / 86400;
                        $vaxt = "g&#252;n\n";
                    }
                    $tkick = round( $tkick );
                    echo "<u>Rengli nickiniz var ve aktivdir</u>:<br/><b>Nickin g&#246;r&#252;nt&#252;s&#252;</b>: <img src=\"i/{$id}.gif\" alt=\"{$user}\" /><br/>";
                    echo "<i>Nickin vaxt&#305;n&#305;n tamam olmas&#305;na <b>{$tkick} {$vaxt}</b> qal&#305;b</i>...<br/>";
                    echo "----<br/>\n";
                    echo $fsize2;
                    break;
                }
                echo "<i>Rengli Nikiniz FTP-den silinib</i>... <b>Admine M&#252;raciet edin!</b><br/>";
                echo "----<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $r_nik_1 )
            {
                echo "<i>Rengli  Nick sifari&#351; etmek &#252;&#231;&#252;n hesab&#305;n&#305;zda en az&#305; <b>{$r_nik_1}</b> bal olmal&#305;d&#305;r...</i><br/>";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
            }
            else
            {
                echo "<b>Nickin N&#246;v&#252;</b>:<br/>";
                echo $fsize2;
                echo "<select name=\"niks\">\n";
                echo "<option value=\"1\">Hereketsiz - {$r_nik_1} bal</option>\n";
                echo "<option value=\"2\">Hereketli - {$r_nik_2} bal</option>\n";
                echo "</select><br/>\n";
                echo $fsize1;
                echo "<b>Qeydiniz</b>:<br/>\n";
                echo $fsize2;
                echo "<input name=\"qeyd\" maxlength=\"9000\" title=\"Rengli nikin g&#246;r&#252;n&#252;&#351;&#252; barede yaz&#305;n\" emptyok=\"true\"/><br/>\n";
                echo $fsize1;
                echo "<anchor title=\"go\">Sifari&#351; et<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=nik&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"niks\" value=\"$(niks)\"/>\n";
                echo "<postfield name=\"qeyd\" value=\"$(qeyd)\"/>\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "</go></anchor><br/>\n";
            }
            echo "----<br/>\n";
            echo $fsize2;
            break;
        }
        echo $fsize1;
        $q = mysql_query( "SELECT * FROM `sifarish` WHERE `to` = '".$id."';" );
        if ( mysql_num_rows( $q ) != 0 )
        {
            if ( !file_exists( "i/".$id.".gif" ) )
            {
                echo "H&#246;rmetli <b>{$user}</b>.<br/> Siz <u>Rengli Nik</u>, Sifari&#351; edibsiz...<br/>Zehmet olmasa Sifrai&#351;in yoxlan&#305;lmas&#305;n&#305; g&#246;zleyin.<br/>\n";
            }
            else
            {
                echo "<u>Rengli nikiniz var ve aktivdir</u>: <img src=\"i/".$id.".gif?".rand( 100, 999 )."\" alt=\"{$user}\" /><br/>";
            }
            echo "----<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $niks == "1" && $bal < "{$r_nik_1}" )
        {
            echo "<b>1 ayl&#305;q hereketsiz nik almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$r_nik_1}</b>, bal olmal&#305;d&#305;r!</b><br/>----<br/>\n";
            echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
            echo "<a href=\"hesab.php?bolme=nik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $niks == "2" && $bal < "{$r_nik_2}" )
        {
            echo "<b>1 ayl&#305;q hereketli nik almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$r_nik_2}</b>, bal olmal&#305;d&#305;r!</b><br/>----<br/>\n";
            echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
            echo "<a href=\"hesab.php?bolme=nik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        require( "file/require/sh_files" );
        $qeyd = narmobil( $qeyd );
        if ( empty( $niks ) )
        {
            echo "<b>Hereketli ve ya hereketsiz bir nik se&#231;in!</b><br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( empty( $qeyd ) )
        {
            echo "Rengli nikiniz g&#246;r&#252;n&#252;&#351;&#252; haqq&#305;nda qeyd yazmal&#305;s&#305;z. <br/>Rengli nikin g&#246;r&#252;n&#252;&#351;&#252; barede etrafl&#305; qeyd yaz&#305;n ki, rengli nikiviz &#252;reyinizce olsun!<br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
        if ( $niks == 1 )
        {
            $newbal = $bal - $r_nik_1;
            $qr_nik = $r_nik_1;
            $nikss = "1 Ayl&#305;q Hereketsiz (sade) Nik Sifari&#351; etdi";
        }
        else
        {
            $newbal = $bal - $r_nik_2;
            $qr_nik = $r_nik_2;
            $nikss = "1 Ayl&#305;q Hereketli Nik Sifari&#351; etdi";
        }
        $time = time( );
        $sql = mysql_query( "insert into `sifarish` values(0,'1','{$id}','{$date}','{$time}','".$niks."','{$qeyd}');" );
        if ( $sql )
        {
            echo "<b>Sifari&#351;iniz Qeyd edildi.</b><br/>*****<br/>";
            echo "Tezlikle Sizin Rengli nikiniz Aktiv edilecek<br/>----<br/><i>Bal Xidmetinden istifade etdiyiniz &#252;&#231;&#252;n,</i><br/><b>Te&#351;ekk&#252;rler</b>\n";
            echo "<br/>----<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
            echo "<br/>*****<br/>\n";
            $update = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."' WHERE `id` = '".$id."';" );
            $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $user = $row['user'];
            @$save = @fopen( "file/bal_bot/4.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}</b>: - {$nikss} (<u>{$bal}-{$qr_nik}=<b>{$newbal}</b></u>)-({$date})" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
            $mp = mysql_fetch_array( $xerc );
            $satish = $mp['xerc'];
            $satish = $satish + $qr_nik;
            mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where klu4='1' limit 1;" );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $b_user = trim( $bals[0] );
            $user_bot = trim( $bals[1] );
            $message = "<b>{$user}</b> - {$nikss}.<br/> {$bal} - {$qr_nik} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
            mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Rengli nik ".$qr_nik."','".$data."','1','1');" );
            $message = "H&#246;rmetli <b>{$user}</b>. Siz Bal Sisteminden &#304;stifade ederek <b>".$nikss."niz</b>:<br/>Hesab&#305;n&#305;zda {$bal} - {$qr_nik} = {$newbal} bal qald&#305;.<br/>Tezlikle Rengli nikiniz haz&#305;rlanacaq<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
        }
        echo $fsize2;
        break;
    case "sendbal" :
        $bals = file( "file/bal_bot/0.dat" );
        $send_bal = trim( $bals[4] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $send_bal == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Bal g&#246;nder\">\n";
        echo "<p>\n";
        if ( !isset( $_POST['action'] ) )
        {
            $file = fopen( "file/bal_bot/ref.dat", "w" );
            fwrite( $file, $ref );
            fclose( $file );
            echo $fsize1;
            echo "<b>Bal g&#246;nder</b><br/>\n";
            echo "*****<br/>\n";
            echo "<b>Qeyd</b>: Bal ko&#231;&#252;rmelerinde -{$send_bal}% komissiya haqq&#305; tutulur.<br/>----<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----<br/>\n";
            echo "<b>Kime ?</b> (Leqeb / &#304;D)<br/>";
            echo $fsize2;
            echo "<input name=\"kime\" maxlength=\"300\" value=\"\"/><br/>\n";
            echo $fsize1;
            echo "<b>Ne Qeder ?</b><br/>";
            echo $fsize2;
            echo "<input size=\"6\" name=\"send\" maxlength=\"6\" format=\"*N\"/>";
            echo $fsize1;
            echo " Bal<br/>\n";
            echo "<anchor>K&#246;&#231;&#252;r<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=sendbal&amp;ref={$ref}\" method=\"post\">\n";
            echo "<postfield name=\"kime\" value=\"$(kime)\"/>\n";
            echo "<postfield name=\"send\" value=\"$(send)\"/>\n";
            echo "<postfield name=\"action\" value=\"save\"/>\n";
            echo "</go></anchor><br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
        }
        else
        {
            echo $fsize1;
            if ( $send < 1 )
            {
                echo "<i>0 bal g&#246;ndermek olmur!</i><br/>*****<br/>";
                echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=sendbal&amp;ref={$ref}\">Geri qay&#305;t</a><br/>---<br/>\n";
                echo $fsize2;
                break;
            }
            $kode = file( "file/bal_bot/ref.dat" );
            $kode = trim( $kode[0] );
            $cixilan = $send * $send_bal / 100;
            $setbal = $bal - $send - $cixilan;
            $cixilan = round( $cixilan, 2 );
            if ( $setbal <= 0 )
            {
                echo "<i>G&#246;ndermek istediyiniz meble&#287; hesab&#305;n&#305;zda yoxdur!</i><br/>";
                echo "*****<br/>";
                echo "<b>Qeyd</b>: Kimese g&#246;ndermek istediyinizse evvala &#246;z hesab&#305;n&#305;za bal y&#252;kleyin!<br/>----<br/>";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
                echo "*****<br/>";
                echo $fsize2;
                break;
            }
            if ( !ctype_digit( $kime ) )
            {
                $kime = trim( $kime );
                if ( $kime == "" )
                {
                    $kime = 0;
                }
                $latuser = strtolower( $kime );
                $sel = mysql_query( "select id,user,bal from users where latuser = '".$latuser."'" );
            }
            else
            {
                $sel = mysql_query( "select id,user,bal from users where id = '".$kime."'" );
            }
            $row2 = mysql_fetch_array( $sel );
            $uuser = $row2['user'];
            $kbal = $row2['bal'];
            $uuid = $row2['id'];
            if ( $uuser == "" )
            {
                echo "<i>Axdard&#305;q&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305; yeniden ceht edin.</i><br/>----<br/>";
                echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=sendbal&amp;ref={$ref}\">Geri qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $uuid == "{$id}" )
            {
                echo "<i>&#214;z-&#246;z&#252;n&#252;ze bal g&#246;ndere bilmersiz...</i><br/>----<br/>";
                echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=sendbal&amp;ref={$ref}\">Geri qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $kode != 0 )
            {
                $setbal = round( $setbal, 2 );
                $uubal = round( $uubal, 2 );
                $gobal = "Update `users` set `bal` = '".$setbal."' where `id` ='".$id."'";
                mysql_query( $gobal );
                $uubal = $kbal + $send;
                $colse = "Update `users` set `bal` = '".$uubal."' where `id` = '".$uuid."'";
                mysql_query( $colse );
                echo "<b>Bal G&#246;nderildi!</b><br/>*****<br/>";
                echo "Siz &#246;z hesab&#305;n&#305;zdan <b>{$uuser}</b>, leqebli istifade&#231;iye {$send} bal g&#246;nderdiz.<br/> Elave olaraq sizin hesab&#305;n&#305;zdan {$send_bal}% ({$cixilan} bal) Komisiyya haqq&#305; c&#305;x&#305;ld&#305;.<br/>----<br/>";
                echo "Hesab&#305;n&#305;zda <b>{$setbal}</b>, bal qald&#305;...<br/>*****<br/>\n";
                echo $fsize2;
                $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $user = $row['user'];
                $miqdar = $send + $cixilan;
                @$save = @fopen( "file/bal_bot/5.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b> - <u>{$uuser}</u> <b>{$send}</b> bal. Komissiya ".$send_bal."%ile-(<b>{$cixilan}</b>) (<u>{$bal} - {$miqdar}=<b>{$setbal}</b></u>)-({$date})" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $cixilan;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';" );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $message = "{$user} - {$uuser} leqebine {$send} bal g&#246;nderdi: komissiya haqq&#305;-(<b>{$cixilan}</b>) {$bal} - {$send} = {$setbal} bal qald&#305;<br/> Bankda <b>{$satish}</b> bal var =:)";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','send bal {$acixilan}','".$data."','1','1');" );
                $message = "<b>Diqqet</b>!!! <u>{$user}</u>, leqebli &#351;exs sizin hesab&#305;n&#305;za {$send} bal g&#246;nderdi.";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$uuser."','".$uuid."','".time( )."','0','Size {$send} bal g&#246;nderdiler','".$data."','1','1');" );
                $message = "H&#246;rmetli <u>{$user}</u>, Siz &#214;z Hesab&#305;n&#305;zdan {$send} bal <u>{$uuser}</u>. leqebli &#350;exse  g&#246;nderdiz. Komissiya haqq&#305; <b>{$cixilan}</b> bal:<br/> Hesab&#305;n&#305;zda {$bal} - {$miqdar} = {$setbal} bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                $i = 0;
                while ( $i <= 9 )
                {
                    $st = time( );
                    $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                    $mes = "<b>".$user."</b>, - <b>".$uuser."</b>. leqebli istifade&#231;iye <b>".$send."</b>, bal g&#246;nderdi...";
                    $rnd = rand( 0, 99999999 );
                    mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                    ++$i;
                }
                $rnd = rand( 0, 9 );
                $online = time( ) + $vaxt;
                mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
            }
            else
            {
                echo "Siz &#246;z hesab&#305;n&#305;zdan <b>{$uuser}</b>, nikli istifade&#231;iye {$send} bal g&#246;nderdiz....<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $file = fopen( "file/bal_bot/ref.dat", "w" );
            fwrite( $file, 0 );
            fclose( $file );
        }
        break;
    case "yeninik" :
        $bals = file( "file/bal_bot/0.dat" );
        $leqeb_d = trim( $bals[5] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $leqeb_d == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Yeni &#304;stifade&#231;i ad&#305;\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            echo "<b>Yeni &#304;stifade&#231;i ad&#305;</b><br/>*****<br/>\n";
            echo "&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;mek, <b>{$leqeb_d}</b>, bal deyerindedir.<br/>\n";
            if ( $leqeb_d <= $bal )
            {
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
                echo "----<br/>";
                echo "<b>Yeni &#304;stifade&#231;i ad&#305;n&#305;z:</b><br/>\n";
                echo $fsize2;
                echo "<input name=\"yeninik\" maxlength=\"20\" value=\"{$user}\" title=\"yeninik\" emptyok=\"true\"/><br/>\n";
                echo $fsize1;
                echo "<anchor title=\"go\">Deyi&#351;dir<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=yeninik&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"yeninik\" value=\"$(yeninik)\"/>\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "</go></anchor><br/>\n";
            }
            else
            {
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----<br/>\n";
                echo "<b>Qeyd</b>: Leqebinizi deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
                echo "----<br/>";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
            }
            echo "*****<br/>";
        }
        else
        {
            if ( 15 < strlen( $yeninik ) || strlen( $yeninik ) < 3 )
            {
                echo "<i>Se&#231;mek istediyiniz leqebin simvolu 3-den 15-e qeder ola biler.</i><br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme=yeninik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( preg_match( "/[^A-Za-z\\@\\*\\(\\)\\!\\-\\~\\_\\[\\]\\=]+/", $yeninik ) )
            {
                echo "Se&#231;mek istediyiniz leqebde qada&#287;an olunmu&#351; simvol var.<br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme=yeninik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $leqeb_d )
            {
                echo "<i>&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$leqeb_d}</b>, bal olmal&#305;d&#305;r!</i><br/>";
                echo $divide;
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>, bal var.<br/>";
                echo "*****<br/>";
            }
            else
            {
                $newbal = $bal - $leqeb_d;
                $yeninik = trim( $yeninik );
                $lowernick = strtolower( $yeninik );
                $q = mysql_query( "SELECT * FROM `users` WHERE `latuser` = '".$lowernick."';" );
                if ( mysql_affected_rows( ) != 0 )
                {
                    echo "<i>Se&#231;mek istediyiniz &#304;stifade&#231;i ad&#305; m&#246;vcutdur!</i>\n";
                    echo "<br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                $sql = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."', `latuser` = '".$lowernick."', `user` = '".$yeninik."' WHERE `id` = '".$id."';" );
                $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                @$save = @fopen( "file/bal_bot/3.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b>: - <u>{$yeninik}</u> (<u>{$bal}-{$leqeb_d}=<b>{$newbal}</b></u>)-({$date})" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $leqeb_d;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';" );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $message = "<u>{$user}</u> - Leqebini deyi&#351;ib <b>{$yeninik}</b>, etdi: <br/>Hesab&#305;nda {$bal} - {$leqeb_d} = {$newbal} bal qald&#305;<br/> Bankda <b>{$satish}</b> bal var =:)";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Leqeb ".$leqeb_d." bal','".$data."','1','1');" );
                $message = "H&#246;rmetli <u>{$user}</u>, Siz Bal Xidmetinden istifade ederek, &#246;z leqebinizi deyi&#351;ib <b>{$yeninik}</b> etdiniz! <br/> Hesab&#305;n&#305;zda {$bal} - {$leqeb_d} = {$newbal} bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$yeninik."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                if ( $sql )
                {
                    echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z &#304;stifade&#231;i ad&#305;n&#305;z&#305; (Leqebinizi), deyi&#351;dirdiniz!<br/>----<br/>Yeni &#304;stifade&#231;i Ad&#305;n&#305;z:<br/><b>{$yeninik}</b>\n";
                    echo "<br/>----<br/>\n";
                    echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
                    echo "<br/>*****<br/>\n";
                }
            }
        }
        echo $fsize2;
        break;
    case "status" :
        $bals = file( "file/bal_bot/0.dat" );
        $status_d = trim( $bals[6] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $status_d == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Status\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            $stat = $row['status'];
            echo "<b>Statusu deyi&#351;mek</b><br/>*****<br/>\n";
            echo "Statusu deyi&#351;mek <b>{$status_d}</b>, bal deyerindedir.<br/>\n";
            if ( $status_d <= $bal )
            {
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
                echo "----<br/>";
                echo "<b>Yeni statusunuz:</b><br/>\n";
                echo $fsize2;
                echo "<input name=\"status\" maxlength=\"22\" value=\"{$stat}\" title=\"status\" emptyok=\"true\"/><br/>\n";
                echo $fsize1;
                echo "<anchor title=\"deyi&#351;dir\">Deyi&#351;dir<go href=\"hesab.php?id={$id}&amp;bolme=status&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"status\" value=\"$(status)\"/>\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "</go></anchor><br/>\n";
            }
            else
            {
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----<br/>\n";
                echo "<b>Qeyd</b>: Statusun yaz&#305;s&#305;n&#305; deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;za bal y&#252;kleyin!<br/>\n";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
            }
            echo "*****<br/>";
        }
        else
        {
            $stat = $row['status'];
            if ( $stat == $status )
            {
                echo "<b>Tebrikler.</b><br/>*****<br/> Siz u&#287;urla &#246;z statusunuzu deyi&#351;dirdiniz<br/>----<br/>";
                echo "Yeni Statusunuz:<br/><b>{$status}</b>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( !preg_match( "!^[a-z1-9@\\*\\)\\(\\?\\!\\-_\\]\\[=~]+$!i", $status ) )
            {
                echo "<i>Yazd&#305;&#287;&#305;n&#305;z statusda qada&#287;an olunmu&#351; simvol var.</i><br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme=status&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $status_d )
            {
                echo "<i>Statusunuzu deyi&#351;dirmek &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$status_d}</b>, bal olmal&#305;d&#305;r!<br/>Sizin hesab&#305;n&#305;zda ise <b>{$bal}</b>, bal var.</i><br/>";
                echo "----<br/>";
                echo "<a href=\"hesab.php?bolme=status&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $newbal = $bal - $status_d;
            $status = trim( $status );
            $sql = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."', `status` = '".$status."' WHERE `id` = '".$id."';" );
            $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $user = $row['user'];
            @$save = @fopen( "file/bal_bot/2.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}</b>: - <u>{$stat}</u> statusu pozdu <b>{$status}</b> yazd&#305;. (<u>{$bal}-{$status_d}=<b>{$newbal}</b></u>)-({$date})" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
            $mp = mysql_fetch_array( $xerc );
            $satish = $mp['xerc'];
            $satish = $satish + $status_d;
            mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';" );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $message = "<u>{$user}</u> - Statusunu deyi&#351;ib <b>{$status}</b>, yazd&#305;: <br/>Hesab&#305;nda {$bal} - {$status_d} = {$newbal} bal qald&#305;<br/> Bankda <b>{$satish}</b> bal var =:)";
            mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Status ".$status_d." bal','".$data."','1','1');" );
            $message = "H&#246;rmetli <u>{$user}</u>, Siz Bal Xidmetinden istifade ederek, &#246;z Statusunuzu deyi&#351;ib <b>{$status}</b> yazd&#305;n&#305;z! <br/> Hesab&#305;n&#305;zda {$bal} - {$status_d} = {$newbal} bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
            if ( $sql )
            {
                echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#246;z statusunuzu deyi&#351;dirdiniz<br/>----<br/>Yeni Statusunuz:<br/><b>{$status}</b>\n";
                echo "<br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
                echo "<br/>*****<br/>\n";
            }
        }
        echo $fsize2;
        break;
    case "vip" :
        $bals = file( "file/bal_bot/0.dat" );
        $vip_al = trim( $bals[7] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $vip_al == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        $lev = $row['level'];
        $levelselect = @mysql_query( "Select name from levels where level='4'" );
        $levels = @mysql_fetch_array( @$levelselect );
        $lvname = $levels['name'];
        echo "<card id=\"bal_xidmet\" title=\"{$lvname} R&#252;tbe\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            echo $fsize2;
            echo "</p>\n";
            echo "<p align=\"center\">\n";
            echo $fsize1;
            echo "Siz Bal xidmetinden istifade ederek &#246;z&#252;n&#252;ze 1 ayl&#305;q <u>{$lvname}</u>, r&#252;tbesi ala bilersiniz!<br/>1 ayl&#305;q <u>{$lvname}</u>, r&#252;tbesinin qiymeti <b>{$vip_al}</b>, bal deyerindedir.<br/>\n";
            echo "Hal-haz&#305;rda sizin r&#252;tbeniz: ";
            if ( 4 <= $lev )
            {
                $levelselect = @mysql_query( @"Select name from levels where level='".@$lev."'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $levname = $levels['name'];
                echo " <b>{$levname}</b><br/>*****<br/>";
            }
            else
            {
                echo " <u>Yoxdur</u><br/>*****<br/>";
            }
            echo $fsize2;
            echo "</p>\n";
            echo "<p align=\"left\">\n";
            echo $fsize1;
            echo "1) Siz <b>{$lvname}</b>. r&#252;tbesi ald&#305;qda &#199;at&#305;n hem sakini, hem de  m&#252;hafize&#231;isi olacaqs&#305;z. &#199;atda qaydalar&#305; pozanlar&#305;, Xeberdarl&#305;q ede bilersiz. Sizin Xeberdarl&#305;q&#305;n&#305;z&#305; he&#231;e sayanlar&#305; ise &#199;atdan Xarc ede bilersiz.<br/>\n";
            echo "2) Siz bu r&#252;tbeni bal Sisteminden ald&#305;&#287;&#305;n&#305;z &#252;&#231;&#252;n qaydalar&#305; pozanlar&#305; xaric etmeye mecbur deyilsiz.<br/>\n";
            echo "3) R&#252;tbenizden sui istifade etsez (<i>&#214;z menafeyine g&#246;re ve ya Sebebsiz xaric etmek</i>),  <b>BAN</b>, edile bilersiz.<br/>\n";
            echo "4) Reklam edenleri, Kiminse Valideyinini ve kimese &#351;iddetli s&#246;y&#252;&#351; s&#246;yenleri Xeberdarl&#305;qs&#305;z Xarc ede bilersiz.<br/>----<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
            echo $divide;
            if ( $lev < 4 )
            {
                if ( $vip_al <= $bal )
                {
                    echo "<anchor title=\"Sifari&#351; et\">He<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=vip&amp;ref={$ref}\" method=\"post\">\n";
                    echo "<postfield name=\"action\" value=\"save\"/>\n";
                    echo "</go></anchor> /\n";
                    echo " <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a><br/>\n";
                }
                else
                {
                    echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>{$vip_al}</b>, bal olmal&#305;d&#305;r.<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
                }
            }
            else if ( $lev == 9 )
            {
                echo "<b>Salam &#350;ef siz hara bura hara?:)</b><br/>\n";
            }
            else
            {
                $ru = @mysql_query( @"select saat,tarix from `hesab` where usid = '".@$id."' and x = '3' limit 1;" );
                if ( mysql_affected_rows( ) == 0 )
                {
                    echo "<i>Size Rehberlik terefinden r&#252;tbe verildiyi &#252;&#231;&#252;n bal xidmetinden r&#252;tbe ala bilmersiz.</i><br/>\n";
                }
                else
                {
                    $tru = @mysql_fetch_array( @$ru );
                    $saat = $tru['saat'];
                    if ( time( ) < $saat )
                    {
                        echo "Siz <u>Bal Xidmet</u>-lerinden <u>".$tru['tarix']."</u>, tarixinde r&#252;tbe alm&#305;s&#305;n&#305;z.<br/>\n";
                        $tkick = $saat - time( );
                        if ( $tkick < 60 && 0 < $tkick )
                        {
                            $var = "saniye";
                        }
                        else if ( $tkick < 3600 && 60 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 60;
                            $var = "deqiqe";
                        }
                        else if ( $tkick < 86400 && 3600 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 3600;
                            $var = "saat";
                        }
                        else if ( 86400 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 86400;
                            $var = "g&#252;n";
                        }
                        $tkick = round( $tkick, 0 );
                        echo "R&#252;tbenizin vaxt&#305;na {$tkick} {$var} qal&#305;b.<br/>\n";
                    }
                    else
                    {
                        $user = $row['user'];
                        echo "H&#246;rmetli <b>{$user}</b>, Sizin r&#252;tbenizin vaxt&#305; tamam olub.<br/>\n";
                    }
                }
            }
            echo "*****<br/>\n";
        }
        else
        {
            if ( "4" <= $lev )
            {
                echo "Sizin";
                $levelselect = @mysql_query( @"Select name from levels where level='".@$lev."'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $levname = $levels['name'];
                echo " <b>{$levname}</b>";
                echo " R&#252;tbeniz var!<br/>";
                echo "*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $vip_al )
            {
                echo "1 ayl&#305;q VIP R&#252;tbesi almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$vip_al}</b>, bal olmal&#305;d&#305;r!<br/>";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=status&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
            }
            else
            {
                $newbal = $bal - $vip_al;
                $sql = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."', `level` = '4' WHERE `id` = '".$id."';" );
                if ( $sql )
                {
                    echo "<b>Tebrikler.</b><br/> Siz u&#287;urla <u>{$lvname}</u>, R&#252;tbesi ald&#305;n&#305;z!<br/>Qaydalar&#305; unutmay&#305;n...\n";
                    echo "<br/>----<br/>\n";
                    echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
                    echo "<br/>*****<br/>\n";
                }
                $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $user = $row['user'];
                $saat = 2592000 + time( );
                mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$date}','{$saat}','3');" );
                @$save = @fopen( "file/bal_bot/6.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b>: - 1 ayl&#305;q <b>{$lvname}</b>, r&#252;tbesi ald&#305;: (<u>{$bal}-{$vip_al}=<b>{$newbal}</b></u>)-({$date})" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $vip_al;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';" );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $message = "<b>{$user}</b> - <b>{$lvname}</b> R&#252;tbesi ald&#305;! {$bal} - {$vip_al} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...\n";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','{$vip_al} bal - R&#252;tbe sat&#305;l&#305;b','".$data."','1','1');" );
                $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <b>{$lvname}</b> R&#252;tbesi Sahib olduz!<br/> Hesab&#305;n&#305;zda {$bal} - {$vip_al} = {$newbal} bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n size Te&#351;ekk&#252;rler!</i><br/><br/><b>Qeyd</b>: Eger hans&#305;sa bir internet kafede oturursuzsa &#199;atdan &#231;&#305;xd&#305;q&#305;n&#305;z zaman opera program&#305;ndan zaklatkalar&#305; silmeyi unutmay&#305;n. &#350;ifrenize telefon n&#246;mrenizi ve ya sade simvol yazmay&#305;n. Ununtmay&#305;n Sizin leqebinizle kimse &#199;ata girib qaydalar&#305; pozarsa bunun mesuliyyeti size aiddir\n";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','".$lvname." R&#252;tbesi','".$data."','1','1');" );
                $i = 0;
                while ( $i <= 9 )
                {
                    $st = time( );
                    $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                    $mes = "<b>{$user}</b>, <u>Bal Sisteminden istifade ederek</u>, <b>{$lvname}</b>. R&#252;tbesi ald&#305;! <u>Tebrikler!!!</u>";
                    $rnd = rand( 0, 99999999 );
                    mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                    ++$i;
                }
                $rnd = rand( 0, 9 );
                $online = time( ) + $vaxt;
                mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
            }
        }
        echo $fsize2;
        break;
    case "killer" :
        $bals = file( "file/bal_bot/0.dat" );
        $kill_al = trim( $bals[8] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $kill_al == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        $levelselect = @mysql_query( "Select name from levels where level='5'" );
        $levels = @mysql_fetch_array( @$levelselect );
        $lvname = $levels['name'];
        echo "<card id=\"bal_xidmet\" title=\"{$lvname} R&#252;tbe\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            echo $fsize2;
            echo "</p>\n";
            echo "<p align=\"center\">\n";
            echo $fsize1;
            echo "Siz Bal xidmetinden istifade ederek &#246;z&#252;n&#252;ze 1 ayl&#305;q <u>{$lvname}</u>, r&#252;tbesi ala bilersiniz!<br/>1 ayl&#305;q <u>{$lvname}</u>, r&#252;tbesinin qiymeti <b>{$kill_al}</b>, bal deyerindedir.<br/>\n";
            echo "Hal-haz&#305;rda sizin r&#252;tbeniz: ";
            if ( 4 <= $lev )
            {
                $levelselect = @mysql_query( @"Select name from levels where level='".@$lev."'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $levname = $levels['name'];
                echo " <b>{$levname}</b><br/>*****<br/>";
            }
            else
            {
                echo " <u>Yoxdur</u><br/>*****<br/>";
            }
            echo $fsize2;
            echo "</p>\n";
            echo "<p align=\"left\">\n";
            echo $fsize1;
            echo "1) Siz <b>{$lvname}</b>. r&#252;tbesi ald&#305;qda &#199;at&#305;n hem sakini, hem de  m&#252;hafize&#231;isi olacaqs&#305;z. &#199;atda qaydalar&#305; pozanlar&#305;, Xeberdarl&#305;q ede bilersiz. Sizin Xeberdarl&#305;q&#305;n&#305;z&#305; he&#231;e sayanlar&#305; ise &#199;atdan Xarc ede bilersiz.<br/>\n";
            echo "2) Siz bu r&#252;tbeni bal Sisteminden ald&#305;&#287;&#305;n&#305;z &#252;&#231;&#252;n qaydalar&#305; pozanlar&#305; xaric etmeye mecbur deyilsiz.<br/>\n";
            echo "3) R&#252;tbenizden sui istifade etsez (<i>&#214;z menafeyine g&#246;re ve ya Sebebsiz xaric etmek</i>),  <b>BAN</b>, edile bilersiz.<br/>\n";
            echo "4) Reklam edenleri, Kiminse Valideyinini ve kimese &#351;iddetli s&#246;y&#252;&#351; s&#246;yenleri Xeberdarl&#305;qs&#305;z Xarc ede bilersiz.<br/>----<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
            echo $divide;
            if ( $lev < 4 )
            {
                if ( $kill_al <= $bal )
                {
                    echo "<anchor title=\"R&#252;tbe Al\">He<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=killer&amp;ref={$ref}\" method=\"post\">\n";
                    echo "<postfield name=\"action\" value=\"save\"/>\n";
                    echo "</go></anchor> /\n";
                    echo " <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a><br/>\n";
                }
                else
                {
                    echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>{$kill_al}</b>, bal olmal&#305;d&#305;r.<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
                }
            }
            else if ( $lev == 9 )
            {
                echo "<b>Salam &#350;ef siz hara bura hara?:)</b><br/>\n";
            }
            else
            {
                $ru = @mysql_query( @"select saat,tarix from `hesab` where usid = '".@$id."' and x = '3' limit 1;" );
                if ( mysql_affected_rows( ) == 0 )
                {
                    echo "<i>Size Rehberlik terefinden r&#252;tbe verildiyi &#252;&#231;&#252;n bal xidmetinden r&#252;tbe ala bilmersiz.</i><br/>\n";
                }
                else
                {
                    $tru = @mysql_fetch_array( @$ru );
                    $saat = $tru['saat'];
                    if ( time( ) < $saat )
                    {
                        echo "Siz <u>Bal Xidmet</u>-lerinden <u>".$tru['tarix']."</u>, tarixinde r&#252;tbe alm&#305;s&#305;n&#305;z.<br/>\n";
                        $tkick = $saat - time( );
                        if ( $tkick < 60 && 0 < $tkick )
                        {
                            $var = "saniye";
                        }
                        else if ( $tkick < 3600 && 60 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 60;
                            $var = "deqiqe";
                        }
                        else if ( $tkick < 86400 && 3600 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 3600;
                            $var = "saat";
                        }
                        else if ( 86400 < $tkick )
                        {
                            $new = $tkick;
                            $tkick = $new / 86400;
                            $var = "g&#252;n";
                        }
                        $tkick = round( $tkick, 0 );
                        echo "R&#252;tbenizin vaxt&#305;na {$tkick} {$var} qal&#305;b.<br/>\n";
                    }
                    else
                    {
                        $user = $row['user'];
                        echo "H&#246;rmetli <b>{$user}</b>, Sizin r&#252;tbenizin vaxt&#305; tamam olub.<br/>\n";
                    }
                }
            }
            echo "*****<br/>\n";
        }
        else
        {
            if ( "4" <= $lev )
            {
                echo "Sizin";
                $levelselect = @mysql_query( @"Select name from levels where level='".@$lev."'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $levname = $levels['name'];
                echo " <b>{$levname}</b>";
                echo " R&#252;tbeniz var!<br/>";
                echo "----<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $kill_al )
            {
                echo "<i>1 ayl&#305;q <b>{$levname}</b>, R&#252;tbesi almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$kill_al}</b>, bal olmal&#305;d&#305;r!</i><br/>";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=status&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>*****<br/>\n";
                break;
            }
            $newbal = $bal - $kill_al;
            $sql = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."', `level` = '5' WHERE `id` = '".$id."';" );
            if ( $sql )
            {
                $levelselect = @mysql_query( "Select name from levels where level='5'" );
                $levels = @mysql_fetch_array( @$levelselect );
                $lvname = $levels['name'];
                echo "<b>Tebrikler.</b><br/> Siz u&#287;urla <u>{$lvname}</u>, R&#252;tbesi ald&#305;n&#305;z!<br/>Qaydalar&#305; unutmay&#305;n...\n";
                echo "<br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
                echo "<br/>*****<br/>\n";
            }
            $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $user = $row['user'];
            $saat = 2592000 + time( );
            mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$date}','{$saat}','3');" );
            @$save = @fopen( "file/bal_bot/6.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}</b>: - 1 ayl&#305;q <b>{$lvname}</b>, r&#252;tbesi ald&#305;: (<u>{$bal}-{$kill_al}=<b>{$newbal}</b></u>)-({$date})" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
            $mp = mysql_fetch_array( $xerc );
            $satish = $mp['xerc'];
            $satish = $satish + $kill_al;
            mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."'  where `klu4` = '1';" );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $message = "<b>{$user}</b> - <b>{$lvname}</b> R&#252;tbesi ald&#305;! {$bal} - {$kill_al} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...\n";
            mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','{$kill_al} bal - Rutbe sat&#305;l&#305;b','".$data."','1','1');" );
            $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <b>{$lvname}</b> R&#252;tbesi Sahib olduz!<br/> Hesab&#305;n&#305;zda {$bal} - {$kill_al} = {$newbal} bal qald&#305;.<br/> <i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n size Te&#351;ekk&#252;rler!</i><br/><br/><b>Qeyd</b>: Eger hans&#305;sa bir internet kafede oturursuzsa &#199;atdan &#231;&#305;xd&#305;q&#305;n&#305;z zaman opera program&#305;ndan zaklatkalar&#305; silmeyi unutmay&#305;n. &#350;ifrenize telefon n&#246;mrenizi ve ya sade simvol yazmay&#305;n. Ununtmay&#305;n Sizin leqebinizle kimse &#199;ata girib qaydalar&#305; pozarsa bunun mesuliyyeti size aiddir\n";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','".$lvname." R&#252;tbesi','".$data."','1','1');" );
            $i = 0;
            while ( $i <= 9 )
            {
                $st = time( );
                $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                $mes = "<b>{$user}</b>, <u>Bal Sisteminden istifade ederek</u>, <b>{$lvname}</b>. R&#252;tbesi ald&#305;! <u>Tebrikler!!!</u>";
                $rnd = rand( 0, 99999999 );
                mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                ++$i;
            }
            $rnd = rand( 0, 9 );
            $online = time( ) + $vaxt;
            mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
        }
        echo $fsize2;
        break;
    case "gorunmez" :
        $bals = file( "file/bal_bot/0.dat" );
        $gorunmez_al = trim( $bals[9] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $gorunmez_al == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"G&#246;r&#252;nmez\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            $inv = $row['inv'];
            if ( $inv == "0" )
            {
                echo $fsize2;
                echo "</p>\n";
                echo "<p align=\"center\">\n";
                echo $fsize1;
                echo "<b>G&#246;r&#252;nmez</b>-lik<br/>*****<br/>\n";
                echo $fsize2;
                echo "</p>\n";
                echo "<p align=\"left\">\n";
                echo $fsize1;
                echo "Eger siz leqebinizi g&#246;r&#252;nmez etseniz nikiniz hec yerde gorunmeyecek dehlizde otaqlarda ve.s <img src=\"img/z9.gif\" alt=\".\"/><u>G&#246;r&#252;nmez</u>, kimi yaz&#305;lacaq...<br/> Sizin Leqebiniz yaln&#305;z otaqda nese yazsaz otaqdak&#305; adamlar g&#246;re biler.<br/>----<br/>\n";
                echo "Bu xidmetden 1 ayl&#305;q istifade haqq&#305; <b>{$gorunmez_al}</b> bal deyerindedir.<br/>\n";
            }
            echo "Sizin Leqebiniz:\n";
            if ( $inv == "0" )
            {
                echo "<u>G&#246;r&#252;nmez deyil.</u><br/>";
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
            }
            else
            {
                echo "<u>G&#246;r&#252;nmezdir.</u><br/>----<br/>";
                echo "&#304;stifade&#231;i ad&#305;n&#305;z&#305;n <u>g&#246;r&#252;nmez</u>-liyini le&#287;v etmeye eminsiz?<br/>\n";
            }
            echo $divide;
            if ( $inv == 0 )
            {
                if ( $gorunmez_al <= $bal )
                {
                    echo "<anchor title=\"go\">G&#246;r&#252;nmez et<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=gorunmez&amp;ref={$ref}\" method=\"post\">\n";
                    echo "<postfield name=\"gorunmez\" value=\"1\"/>\n";
                    echo "<postfield name=\"action\" value=\"save\"/>\n";
                    echo "</go></anchor><br/>\n";
                }
                else
                {
                    echo "Bu Xidmet &#252;&#231;&#252;n Hesab&#305;n&#305;zda <b>{$gorunmez_al}</b>, bal olmal&#305;d&#305;r.<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
                }
            }
            else
            {
                echo "<anchor title=\"go\">Beli<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=gorunmez&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"gorunmez\" value=\"0\"/>\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "</go></anchor> / \n";
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a><br/>";
            }
            echo "*****<br/>\n";
        }
        else
        {
            $inv = $row['inv'];
            if ( $gorunmez == "{$inv}" )
            {
                echo "Stop Telesme Emeliyyat u&#287;urla sona cat&#305;b!<br/>";
                echo "*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $bal < $gorunmez_al && $gorunmez == 1 )
            {
                echo "&#304;stifade&#231;i ad&#305;n&#305; <u>G&#246;r&#252;nmez</u>, etmek  &#252;&#231;&#252;n hesab&#305;n&#305;zda <b>{$gorunmez_al}</b>, bal olmal&#305;d&#305;r!<br/>----<br/>";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>*****<br/>\n";
            }
            else
            {
                if ( $gorunmez != 0 )
                {
                    $newbal = $bal - $gorunmez_al;
                }
                else
                {
                    $newbal = $bal;
                }
                settype( $gorunmez, "integer" );
                $sql = mysql_query( "UPDATE `users` SET `bal` = '".$newbal."', `inv` = '".$gorunmez."' WHERE `id` = '".$id."';" );
                $user = $row['user'];
                if ( $sql )
                {
                    if ( $inv == "0" )
                    {
                        echo "<b>Tebrikler.</b><br/> Siz u&#287;urla &#304;stifade&#231;i ad&#305;n&#305;z&#305; <b>G&#246;r&#252;nmez</b>,  etdiniz!<br/>----<br/>\n";
                    }
                    else
                    {
                        echo "<u>Siz &#246;z G&#246;r&#252;nmezliyinizi le&#287;v etdiz</u><br/>*****<br/>";
                    }
                    $date = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                    if ( $gorunmez != 0 )
                    {
                        $msg = "(<u>{$bal}-{$gorunmez_al}=<b>{$newbal}</b></u>)";
                        echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;\n";
                        echo "<br/>*****<br/>\n";
                        $saat = 2592000 + time( );
                        mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$date}','{$saat}','2');" );
                        $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                        $mp = mysql_fetch_array( $xerc );
                        $satish = $mp['xerc'];
                        $satish = $satish + $gorunmez_al;
                        mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                        $adminm = "<b>{$user}</b> - g&#246;r&#252;nmez oldu:<br/> {$bal} - {$gorunmez_al} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
                        $userm = "H&#246;rmetli <b>{$user}</b>. Siz Bal Sisteminden &#304;stifade ederek 1 ayl&#305;q <b>G&#246;r&#252;nmez</b>, oldunuz:<br/>Hesab&#305;n&#305;zda {$bal} - {$gorunmez_al} = {$newbal} bal qald&#305;.<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
                    }
                    else
                    {
                        $msg = "(<b>G&#246;r&#252;nmezliyini Le&#287;v Etdi</b>)";
                        mysql_query( "delete from `hesab` where usid='".$id."' and x = '2' limit 1;" );
                        $adminm = "<b>{$user}</b> - g&#246;r&#252;nliyini le&#287;v etdi:<br/> Hesab&#305;nda <b>{$newbal}</b>, bal var.";
                        $userm = "H&#246;rmetli <b>{$user}</b>. Siz Bal Sisteminden ald&#305;&#287;&#305;n&#305;z <b>G&#246;r&#252;nmez</b>-liyinizi vaxt&#305;ndan evvel le&#287;v etdiniz...<br/><i>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</i>";
                    }
                    @$save = @fopen( "file/bal_bot/7.dat", "a+" );
                    $qeyd = "".base64_encode( "<b>{$user}</b>: - {$msg} Tarix: {$date}" )."\n";
                    @fwrite( @$save, @"{$qeyd}" );
                    @fflush( @$save );
                    @fclose( @$save );
                    $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                    $ferq = $bal - $newbal;
                    mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$adminm."','','1','".time( )."','0','G&#246;r&#252;nmezlik ".$ferq." bal','".$data."','1','1');" );
                    mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$userm."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                }
            }
        }
        echo $fsize2;
        break;
    case "elan" :
        $bals = file( "file/bal_bot/0.dat" );
        $t_elan = trim( $bals[10] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $t_elan == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Tebrik Elanlar\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            if ( $bal < $t_elan )
            {
                echo "Tebrik Elan&#305; Yerle&#351;dirmek &#252;&#231;&#252;n Hesab&#305;n&#305;zda en az&#305; <b>{$t_elan}</b>, bal olmal&#305;d&#305;r.<br/>\n";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>*****<br/>\n";
            }
            else
            {
                echo "<u>Diqqet</u>: Burda Ba&#351;qa saytlar&#305; reklam etmek, Siyasi elan, Tehqir ve.s. yazmaq olmaz!<br/>\n";
                echo "Balans&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>*****<br/>\n";
            }
            echo "Tebrik ve ya Elan:<br/>\n";
            echo $fsize2;
            echo "<input maxlength=\"150\"  name=\"tebrik\" title=\"Tebrik ve ya Elan\"/><br/>\n";
            echo $fsize1;
            echo "M&#252;ddet (vaxt):<br/>\n";
            echo $fsize2;
            $t_elan1 = $t_elan * 5;
            $t_elan2 = $t_elan * 10;
            $t_elan3 = $t_elan * 15;
            echo "<select name=\"saat\">\n";
            echo "<option value=\"1\">1 saatl&#305;q ({$t_elan} bal)</option>\n";
            echo "<option value=\"5\">5 saatl&#305;q ({$t_elan1} bal)</option>\n";
            echo "<option value=\"12\">12 saatl&#305;q ({$t_elan2} bal)</option>\n";
            echo "<option value=\"24\">1 g&#252;nl&#252;k ({$t_elan3} bal)</option>\n";
            echo "</select><br/>\n";
            echo $fsize1;
            echo "<anchor>Elave et<go href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
            echo "<postfield name=\"tebrik\" value=\"$(tebrik)\"/>\n";
            echo "<postfield name=\"saat\" value=\"$(saat)\"/>\n";
            echo "<postfield name=\"action\" value=\"save\"/>\n";
            echo "</go></anchor>\n";
            echo "<br/>\n";
            echo "*****<br/>\n";
        }
        else
        {
            if ( $saat == 24 )
            {
                $t_elan = $t_elan * 15;
            }
            else if ( $saat == 12 )
            {
                $t_elan = $t_elan * 10;
            }
            else if ( $saat == 5 )
            {
                $t_elan = $t_elan * 5;
            }
            else if ( $saat == 1 )
            {
                $t_elan = $t_elan;
            }
            else
            {
                exit( );
            }
            if ( $bal < $t_elan )
            {
                echo "Sayt&#305;n gireceyine {$saat} saatl&#305;q tebrik ve ya elan yerle&#351;dirmek &#252;&#231;&#252;n {$t_elan} bal laz&#305;md&#305;r.<br/>\n";
                echo "Sizin balans&#305;n&#305;zda <b>{$bal}</b>. bal var.<br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal y&#252;leme qaydas&#305;</a><br/>\n";
                echo "<a href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>----<br/>\n";
                echo $fsize2;
                break;
            }
            $q = mysql_query( "SELECT * FROM `elan` WHERE `title` = '".$tebrik."' and `saat` > '".time( )."';" );
            if ( mysql_num_rows( $q ) != 0 || $tebrik == "" )
            {
                echo "<b>Sizin Tebrikiniz Qeyd Edilib!</b><br/><i>Eyni elan&#305; 2 defe yazmaq olmaz...</i><br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>----<br/>\n";
                echo $fsize2;
                break;
            }
            if ( "200" <= strlen( $tebrik ) )
            {
                echo "Tebrik elaninizi 150 simvoldan artiq yazmaq ixtiyariniz yoxdur<br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>----<br/>\n";
                echo $fsize2;
                break;
            }
            require( "file/require/sh_files" );
            $tebrik = narmobil( $tebrik );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $qsaat = $saat * 3600 + time( );
            $aciq = mysql_query( "insert into elan values(0,'{$tebrik}','{$user}','{$data}','{$qsaat}');" );
            $newbal = $bal - $t_elan;
            $qaliq = 2;
            mysql_query( "Update `users` set `bal`='".$newbal."' where `id`='".$id."';" );
            if ( $aciq )
            {
                echo "<b>Sizin Tebrik mesaj&#305;n&#305;z elave edildi!</b><br/>*****<br/>\n";
                echo "<i>Elana Baxmaq &#252;&#231;&#252;n <a href=\"index.php?ref={$ref}\">Daxil Ol</a></i><br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zdan {$t_elan} bal &#231;&#305;x&#305;ld&#305;. <br/>Elan {$saat} saatdan sonra avtomatik silinecek.<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. qald&#305;!<br/>*****<br/>\n";
                $save = fopen( "file/bal_bot/1.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b>: - {$tebrik}.<br/><b>&#xbb;&#xbb;</b>- ({$saat} saatl&#305;q) - (<u>{$bal}-{$t_elan}=<b>{$newbal}</b></u>) -(<i>{$data}</i>)" )."\n";
                fwrite( $save, "{$qeyd}" );
                fflush( $save );
                fclose( $save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $t_elan;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                $adminm = "<b>{$user}</b> - {$saat} saatliq Tebrik-Elan yerle&#351;dirdi. <br/>Mesaj: <i>{$tebrik}</i>. <br/>{$bal} - {$t_elan} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var.";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$adminm."','','1','".time( )."','0','Tebrik: {$t_elan} bal','".$data."','1','1');" );
                $userm = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade edib &#199;at&#305;n ilk sehifesine {$saat} saatl&#305;q Tebrik Mesaj&#305; yerle&#351;dirdiniz. <br/>Mesaj beledir: <i>{$tebrik}</i><br/> Hesab&#305;n&#305;zda {$bal}-{$t_elan}={$newbal} bal qald&#305;.<br/> <u>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</u>";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$userm."','".$user."','".$id."','".time( )."','0','Tebrik mesaj&#305;','".$data."','1','1');" );
            }
            else
            {
                echo "<b>Sehv var! Yeniden ceht edin</b><br/>\n";
                echo "*****<br/><a href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>----<br/>\n";
            }
        }
        echo $fsize2;
        break;
    case "x" :
        echo "<card id=\"bal_xidmet\" title=\"Xaric Etmek\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['nick'] ) )
        {
            if ( $nk != "" )
            {
                $pnik = @mysql_fetch_array( @mysql_query( @"Select user from users where id = '".@$nk."' LIMIT 1;" ) );
            }
            echo " Balans&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----<br/>";
            echo "Leqebi<br/>\n";
            echo $fsize2;
            echo "<input name=\"nick{$ref}\" maxlength=\"20\" value=\"{$pnik['0']}\" title=\"Leqebi\"/><br/>\n";
            echo $fsize1;
            echo "Vaxt:<br/>\n";
            echo $fsize2;
            echo "<select name=\"wtime{$ref}\">\n";
            echo "<option value=\"30\">30 Deqiqe (40 bal)</option>\n";
            echo "<option value=\"60\">1 Saat (80 bal)</option>\n";
            echo "<option value=\"120\">2 Saat (140 bal)</option>\n";
            echo "<option value=\"180\">3 Saat (220 bal)</option>\n";
            echo "</select><br/>\n";
            echo $fsize1;
            echo "<b>Sebeb:</b> (Tehqir olmaz)<br/>\n";
            echo $fsize2;
            echo "<input name=\"whykik{$ref}\" maxlength=\"50\" title=\"whykik\"/><br/>\n";
            echo $fsize1;
            echo "<u><anchor title=\"Xaric et\">Xaric et!<go href=\"hesab.php?bolme=x&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\" method=\"post\">\n";
            echo "<postfield name=\"nick\" value=\"$(nick{$ref})\"/>\n";
            echo "<postfield name=\"wtime\" value=\"$(wtime{$ref})\"/>\n";
            echo "<postfield name=\"whykik\" value=\"$(whykik{$ref})\"/>\n";
            echo "</go></anchor></u>\n";
            echo "<br/>----<br/>\n";
            if ( $nk != "" )
            {
                echo "<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;nk={$nk}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>----<br/>";
            }
            echo $fsize2;
            break;
        }
        if ( isset( $nk ) )
        {
            $select = @mysql_query( @"Select * from users where id='".@$nk."'" );
        }
        else
        {
            $nick = trim( $nick );
            if ( $nick == "" )
            {
                $nick = 0;
            }
            if ( !ctype_digit( $nick ) )
            {
                $latuser = strtolower( $nick );
                $select = mysql_query( "Select * from users where latuser = '".$latuser."'" );
            }
            else
            {
                $select = mysql_query( "Select * from users where id = '".$nick."'" );
            }
        }
        if ( mysql_affected_rows( ) == 0 )
        {
            echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>----<br/>\n";
            if ( $rm != "" )
            {
                echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>*****<br/>";
            }
            echo $fsize2;
            break;
        }
        $inf = mysql_fetch_array( $select );
        $pid = $inf['id'];
        $level = $inf['level'];
        $pnik = $inf['user'];
        $otaq = $inf['room'];
        $vtme = $inf['kik'];
        $xare = $inf['whokik'];
        $ipp = $inf['user_ip'];
        $soft = $inf['user_soft'];
        $otime = time( );
        if ( $otime < $vtme )
        {
            $tkick = $vtme - time( );
            if ( $tkick < 60 && 0 < $tkick )
            {
                $var = "saniyyelik";
            }
            else if ( $tkick < 3600 && 60 <= $tkick )
            {
                $new = $tkick;
                $tkick = $new / 60;
                $var = "deqiqelik";
            }
            else if ( $tkick < 86400 && 3600 <= $tkick )
            {
                $new = $tkick;
                $tkick = $new / 3600;
                $var = "saatl&#305;q";
            }
            else if ( 86400 <= $tkick )
            {
                $new = $tkick;
                $tkick = $new / 86400;
                $var = "g&#252;nl&#252;k";
            }
            $tkick = round( $tkick, 0 );
            if ( $xare == $user )
            {
                echo "{$pnik} leqebli istifadecini siz ujey {$tkick} {$var}  xaric edibsiz...<br/>----<br/>\n";
            }
            else
            {
                echo "{$pnik} leqebli istifadecini sizden evvel <u>{$xare}</u>, {$tkick} {$var}  xaric edib...<br/>----<br/>\n";
            }
            echo "<a href=\"hesab.php?bol=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>----<br/>\n";
            if ( $rm != "" )
            {
                echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>*****<br/>";
            }
            echo $fsize2;
            break;
        }
        if ( $wtime == "30" )
        {
            $vaxtc = "40";
        }
        if ( $wtime == "60" )
        {
            $vaxtc = "80";
        }
        if ( $wtime == "120" )
        {
            $vaxtc = "140";
        }
        if ( $wtime == "180" )
        {
            $vaxtc = "220";
        }
        if ( $vaxtc != 40 && $vaxtc != 80 && $vaxtc != 140 && $vaxtc != 220 )
        {
            echo "Ataka olmaz))<br/>*****<br/>";
            echo $fsize2;
            break;
        }
        if ( $bal < $vaxtc )
        {
            echo "Tess&#252;f ki, hesab&#305;n&#305;zda bal yeterli deyil.<br/>----<br/>";
            if ( $rm != "" )
            {
                echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>";
            }
            else
            {
                echo "<a href=\"hesab.php?bolme=x&amp;id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">Geri Qay&#305;t</a><br/>";
            }
            echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>*****<br/>\n";
            print $fsize2;
            break;
        }
        if ( $inf['tox'] != 0 )
        {
            echo "<b>{$pnik}</b> Leqebli &#350;exsin Toxunulmazl&#305;q&#305; Var... <br/><i>Onu Melekler Qoruyur!</i><br/>----<br/>\n";
            if ( $rm != "" )
            {
                echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>*****<br/>";
            }
            echo $fsize2;
            break;
        }
        if ( 4 < $level )
        {
            echo "<i>R&#252;tbeli &#350;exsleri Bal ile &#231;atdan Xaric Etmek Olmaz!!!</i><br/>----<br/>\n";
            if ( $rm != "" )
            {
                echo "<a href=\"chat.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}&amp;ref={$ref}\">&#199;ata Qay&#305;t</a><br/>*****br/>";
            }
            echo $fsize2;
            break;
        }
        echo "\"<b>{$pnik}</b>\"<br/>";
        echo "Chatdan Xaric Edildi!<br/>----<br/>\n";
        $newbal = $bal - $vaxtc;
        mysql_query( "Update users set bal='".$newbal."' where id='".$id."'" );
        $totime = $wtime;
        $wtime = $wtime * 60 + time( );
        require( "file/require/sh_files" );
        $whykik = narmobil( $whykik );
        mysql_query( "UPDATE users SET kik = '".$wtime."', whokik = '".$user."', con = '4', whykik = '".$whykik."' WHERE id = '".$pid."'" );
        $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
        $mp = mysql_fetch_array( $xerc );
        $satish = $mp['xerc'];
        $satish = $satish + $vaxtc;
        mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
        $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
        $bals = file( "file/bal_bot/0.dat" );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        $message = "<b>{$user}</b> - <b>{$pnik}</b> ({$totime} deq.) &#199;atdan xaric etdi. Sebeb: <u>({$whykik})</u>. <br/>{$bal} - {$vaxtc} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
        mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Xaric: {$vaxtc} bal','".$data."','1','1');" );
        $message = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade edib, {$pnik} leqebli istifade&#231;ni {$totime} deqiqelik &#199;atdan Xaric etdiz! <br/>Hesab&#305;n&#305;zda {$bal}-{$vaxtc}={$newbal} bal qald&#305;.";
        mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
        $i = 0;
        while ( $i <= 9 )
        {
            $st = time( );
            $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
            $tleft = $row['whykik'] - time( );
            $mes = "<b>{$user}</b>, <u>Bal Sisteminden istifade ederek</u>, <b>{$pnik}</b>. leqebli istifade&#231;ini {$totime} deqiqelik &#199;atdan xaric etdi. (Sebeb: {$whykik}.)";
            $rnd = rand( 0, 99999999 );
            mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='".$user_bot."', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
            ++$i;
        }
        $online = time( ) + $vaxt;
        if ( $rm != "" )
        {
            mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rm."' WHERE `id` = '10';" );
        }
        if ( $rm != "" )
        {
            $otaq = $rm;
        }
        $selotaq = @mysql_query( @"Select name from rooms where rm='".@$otaq."'" );
        $onam = @mysql_fetch_array( @$selotaq );
        $otaqadi = $onam['name'];
        $save = fopen( "file/bal_bot/8.dat", "a+" );
        $qeyd = "".base64_encode( "<b>{$user}</b>: - {$pnik}. - {$totime} deq. sebeb: (<u>{$whykik}</u>) (<u>{$bal}-{$vaxtc}=<b>{$newbal}</b></u>) [{$otaqadi}] (<i>{$data}</i>)" )."\n";
        @fwrite( @$save, @"{$qeyd}" );
        @fflush( @$save );
        @fclose( @$save );
        echo $fsize2;
        break;
    case "tox" :
        $bals = file( "file/bal_bot/0.dat" );
        $tox_b = trim( $bals[11] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $tox_b == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Toxunulmazl&#305;q\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['tox'] ) )
        {
            if ( $row['tox'] == "0" )
            {
                if ( $bal < $tox_b )
                {
                    echo "<b>Toxunulmazl&#305;q</b><br/>*****<br/>\n";
                    echo "Toxunulmazl&#305;q o demekdir ki, sizi &#231;atda adi istifade&#231;iler xaric ede bilmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>{$tox_b}</b>, bald&#305;r.<br/>Sizin hesab&#305;n&#305;zda bal yeterli deyil...\n";
                    echo "<br/>----<br/>\n";
                    echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                    echo "<br/>----<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                echo "<b>Toxunulmazl&#305;q</b><br/>*****<br/>\n";
                echo "Toxunulmazl&#305;q  Sizi &#231;atda ad&#305; istifade&#231;ilerin xaric etmesine qada&#287;a qoyur.<br/>\n";
                echo "ve Sizi xaric etmek olmur (R&#252;tbeli &#350;exslerden ba&#351;qa).<br/>\n";
                echo "----<br/>Bu xidmetden 1 ayl&#305;q istifade haqq&#305; <b>{$tox_b}</b> bald&#305;r...\n";
                echo "<br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                echo "<br/>----<br/>\n";
                echo "Toxunulmaz &#350;exs olmaq isteyirsiz?<br/>\n";
                echo "<anchor>Beli<go href=\"hesab.php?bolme=tox&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                echo "<postfield name=\"tox\" value=\"save\"/>";
                echo "</go></anchor>.\n";
                echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
                echo "<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            echo "H&#246;rmetli <b>{$user}</b>.<br/><br/>\n";
            echo "Siz toxunulmazl&#305;&#287;&#305;n&#305;z&#305;  le&#287;v etmeye eminsiz?\n";
            echo "<br/>*****<br/>";
            echo "<anchor>Beli<go href=\"hesab.php?bolme=tox&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"tox\" value=\"delete\"/>";
            echo "</go></anchor>.\n";
            echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
            echo "<br/>*****<br/>";
            echo $fsize2;
        }
        else
        {
            if ( $_POST['tox'] == "save" )
            {
                if ( $bal < $tox_b )
                {
                    echo "<i>\"<b>Toxunulmaz</b>\" olmaq &#252;&#231;&#252;n <b>{$tox_b}</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
                    echo "<br/>----<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
                    echo "<br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                if ( $row['tox'] != "0" )
                {
                    echo $fsize2;
                    echo "</p>";
                    echo "<p align=\"center\">";
                    echo $fsize1;
                    echo "<i>H&#246;rmetli <b>{$user}</b><br/> Sizin Toxunulmazl&#305;&#287;&#305;n&#305;z var!</i><br/>*****<br/>";
                    echo $fsize2;
                    break;
                }
                $newbal = $bal - $tox_b;
                $son = "Update users set bal = '".$newbal."', tox = '1' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $saat = 2592000 + time( );
                mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$data}','{$saat}','4');" );
                $save = fopen( "file/bal_bot/9.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b>: (<u>{$bal}-{$tox_b}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $tox_b;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                $message = "<b>{$user}</b> - Toxunulmaz oldu... {$bal} - {$tox_b} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Toxunulmaz {$tox_b} bal','".$data."','1','1');" );
                $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <u>Toxunulmaz &#350;exs</u>. oldunuz!<br/> Hesab&#305;n&#305;zda {$bal} - {$tox_b} = {$newbal} bal qald&#305;.<br/>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Toxunulmazl&#305;q','".$data."','1','1');" );
                echo "<b>Tebrikler!!!</b><br/>*****<br/>";
                echo "Siz \"<u>Toxunulmaz</u>\" &#350;exs olduz!<br/>";
                echo "&#304;ndi Sizi adi istifade&#231;iler &#231;atdan xaric edebilmez.<br/>----<br/>";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. qald&#305;<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            if ( $_POST['tox'] == "delete" )
            {
                if ( $row['tox'] == "0" )
                {
                    echo "H&#246;rmetli <b>{$user}</b><br/> Sizin Toxunulmazl&#305;&#287;&#305;n&#305;z Yoxdur))<br/>*****<br/>";
                    echo $fsize2;
                    break;
                }
                $son = "Update users set tox = '0' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                mysql_query( "delete from `hesab` where usid='".$id."' and x = '4' limit 1;" );
                @$save = @fopen( "file/bal_bot/9.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}: - Toxunulmazl&#305;&#287;&#305;n&#305; Le&#287;v Etdi</b> -  Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $message = "<b>{$user}</b> - Toxunulmazl&#305;&#287;&#305;n&#305; le&#287;v etdi...";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Toxunulmazl&#305;q&#305;n le&#287;vi','".$data."','1','1');" );
                $istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>{$user}</b>. Siz <u>Toxunulmazl&#305;&#287;&#305;n&#305;z&#305;</u>, le&#287;v etdiniz!";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                echo "<u>Siz &#246;z Toxunulmazl&#305;&#287;&#305;n&#305; le&#287;v etdiz</u><br/>*****<br/>";
                echo $fsize2;
            }
        }
        break;
    case "color" :
        $bals = file( "file/bal_bot/0.dat" );
        $r_yazi = trim( $bals[12] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $r_yazi == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        $shrift = $row['shrift'];
        echo "<card id=\"bal_xidmet\" title=\"Rengli Yaz&#305;\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            if ( $shrift != "" )
            {
                echo "H&#246;rmetli <b>{$user}</b>.<br/><br/>\n";
                echo "Siz rengli yaz&#305;n&#305;z&#305; le&#287;v etmeye eminsiz???\n";
                echo "<br/>*****<br/>";
                echo "<anchor>Beli<go href=\"hesab.php?bolme=color&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                echo "<postfield name=\"action\" value=\"delete\"/>";
                echo "</go></anchor>.\n";
                echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
                echo "<br/>*****<br/>";
            }
            else
            {
                echo "<b>Rengli yaz&#305;lar</b><br/>*****<br/>\n";
                echo "Rengli yaz&#305;lar 5 rengden ibaretdir:<br/>\n";
                echo "Siz <u>rengli yaz&#305;</u>, ald&#305;qda chatda yazd&#305;q&#305;n&#305;z yaz&#305;lar qara reng yox, se&#231;diyiniz<br/>\n";
                echo "rengde g&#246;rsenecek  ve Siz diger istifade&#231;ilerden daha &#231;ox se&#231;ileceksiz,<br/>\n";
                echo "----<br/>\n";
                echo "<u>1 ayl&#305;q</u> rengli yaz&#305;n&#305;n qiymeti <b>{$r_yazi}</b>, bald&#305;r.<br/>\n";
                echo "----<br/>\n";
                echo "<b>Qeyd:</b> - <i>Rengler yaln&#305;z komp&#252;terle giren istifade&#231;ilerde g&#246;rsenir</i>.\n";
                echo "<br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                echo "<br/>----<br/>\n";
                echo "<b>Rengler:</b>\n";
                echo $fsize2;
                echo $fsize1;
                if ( $REMOTE_ADDR != "77.244.112.177" && $REMOTE_ADDR != "77.244.112.211" && $REMOTE_ADDR != "109.235.193.199" && $REMOTE_ADDR != "109.235.193.196" && $REMOTE_ADDR != "109.235.193.193" && $REMOTE_ADDR != "109.235.193.197" )
                {
                    echo "<span style=\"color: #990000\">Q&#305;rm&#305;z&#305;</span>\n";
                    echo "<span style=\"color: blue\">G&#246;y,</span>\n";
                    echo "<span style=\"color: green\">Ya&#351;&#305;l,</span>\n";
                    echo "<span style=\"color: Indigo\">&#199;ehray&#305;</span> ve \n";
                    echo "<span style=\"color: Magenta\">Nar&#305;nc&#305;.</span>\n";
                }
                else
                {
                    echo "Q&#305;rm&#305;z&#305;\n";
                    echo "G&#246;y,\n";
                    echo "Ya&#351;&#305;l,\n";
                    echo "&#199;ehray&#305; ve \n";
                    echo "Nar&#305;nc&#305;.\n";
                }
                echo "<br/>\n";
                echo $fsize2;
                echo "<select name=\"rengs{$ref}\">\n";
                echo "<option value=\"#990000\">Q&#305;rm&#305;z&#305; ({$r_yazi} bal)</option>\n";
                echo "<option value=\"blue\">G&#246;y ({$r_yazi} bal)</option>\n";
                echo "<option value=\"green\">Ya&#351;&#305;l ({$r_yazi} bal)</option>\n";
                echo "<option value=\"Indigo\">&#199;ehray&#305; ({$r_yazi} bal)</option>\n";
                echo "<option value=\"Magenta\">Nar&#305;nc&#305; ({$r_yazi} bal)</option>\n";
                echo "</select><br/>\n";
                echo $fsize1;
                echo "<u><anchor title=\"go\">Rengi Al<go href=\"hesab.php?bolme=color&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "<postfield name=\"rengs\" value=\"$(rengs{$ref})\"/>\n";
                echo "</go></anchor></u>\n";
                echo "<br/>*****<br/>";
            }
            echo $fsize2;
        }
        else
        {
            if ( $_POST['action'] == "save" )
            {
                if ( $row['shrift'] != "" )
                {
                    echo "H&#246;rmetli <b>{$user}</b><br/> Sizin Rengli &#351;iriftiniz (yaz&#305;n&#305;z) var!<br/>*****<br/>";
                    echo $fsize2;
                    break;
                }
                if ( $bal < $r_yazi )
                {
                    echo "<i>Rengli yaz&#305; almaq &#252;&#231;&#252;n  <b>{$r_yazi}</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
                    echo "<br/>----<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
                    echo "<br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                $newbal = $bal - $r_yazi;
                $son = "Update users set bal = '".$newbal."', shrift = '".$rengs."' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $saat = 2592000 + time( );
                mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$data}','{$saat}','5');" );
                @$save = @fopen( "file/bal_bot/10.dat", "a+" );
                $qeyd = "".base64_encode( "<b><span style=\"color: {$rengs}\">{$user}</span></b>: - (<u>{$bal}-{$r_yazi}=<b>{$newbal}</b></u>)-({$data})" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $r_yazi;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                $message = "<b>{$user}</b> - Rengli &#350;rift ald&#305;... {$bal} - {$r_yazi} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Rengli Yaz&#305; {$r_yazi} bal','".$data."','1','1');" );
                $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <u>Rengli Yaz&#305;</u>. ald&#305;n&#305;z!<br/> Hesab&#305;n&#305;zda {$bal} - {$r_yazi} = {$newbal} bal qald&#305;.";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Rengli Yaz&#305;','".$data."','1','1');" );
                echo "<b>Tebrikler!!!</b><br/>*****<br/>";
                echo "Siz \"<u>Rengli Yaz&#305;</u>\" ald&#305;n&#305;z!<br/>";
                echo "&#304;ndi Sizi adi istifade&#231;ilerden ferqli olaraq &#199;atda yaz&#305;lar&#305;n&#305;z Rengli olacaq.<br/>----<br/>";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. qald&#305;<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            if ( $_POST['action'] == "delete" )
            {
                if ( $row['shrift'] == "" )
                {
                    echo "H&#246;rmetli <b>{$user}</b><br/> Sizin Rengli &#351;iriftiniz (yaz&#305;n&#305;z) Yoxdur))<br/>*****<br/>";
                    echo $fsize2;
                }
                else
                {
                    $son = "Update users set shrift = '' where id ='".$id."'";
                    mysql_query( $son );
                    $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                    mysql_query( "delete from `hesab` where usid='".$id."' and x = '5' limit 1;" );
                    @$save = @fopen( "file/bal_bot/10.dat", "a+" );
                    $qeyd = "".base64_encode( "<b><span style=\"color: {$rengs}\">{$user} Rengli yaz&#305;s&#305;n&#305; le&#287;v etdi</span></b>: -({$data})" )."\n";
                    @fwrite( @$save, @"{$qeyd}" );
                    @fflush( @$save );
                    @fclose( @$save );
                    $message = "<b>{$user}</b> - Rengli Yaz&#305;s&#305;n&#305; le&#287;v etdi...";
                    mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Rengli Yaz&#305;n&#305;n le&#287;vi','".$data."','1','1');" );
                    $istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>{$user}</b>. Siz <u>Rengli Yaz&#305;</u>-n&#305;z&#305; le&#287;v etdiniz!";
                    mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                    echo "<u>Siz &#246;z Rengli &#351;iriftinizi le&#287;v etdiz</u><br/>*****<br/>";
                    echo "Art&#305;q sizin yaz&#305;lar&#305;n&#305;z Qara (Sade) rengde olacaq...<br/>*****<br/>";
                    echo $fsize2;
                }
            }
        }
        break;
    case "kebin" :
        $bals = file( "file/bal_bot/0.dat" );
        $aile_b = trim( $bals[13] );
        $bb_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $aile_b == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        $para = $row['para'];
        $sex = $row['sex'];
        if ( $sex == 0 )
        {
            $cins = "Ki&#351;i";
        }
        else
        {
            $cins = "Qad&#305;n";
        }
        echo "<card id=\"bal_xidmet\" title=\"&#199;atda Evlenmek\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            if ( $para == "" )
            {
                if ( file_exists( "file/dat_folder/Aile/{$id}" ) )
                {
                    $ts = file( "file/dat_folder/Aile/{$id}" );
                    $asaat = trim( $ts[0] );
                    $teklif = trim( $ts[1] );
                    $usid = trim( $ts[2] );
                }
                echo "<b>&#199;atda Evlenmek</b><br/>*****<br/>\n";
                echo "&#199;atda evlenmek &#252;&#231;&#252;n her 2 terefin hesab&#305;nda {$aile_b} bal olmal&#305;d&#305;r...<br/><br/>\r\n<b>1</b>. Siz evlendikde 24 saatl&#305;q &#231;atda dehlizde sizin evliliyiniz baresinde elan verilecek.<br/>\r\n<b>2</b>. Dehlizde olan elanda sizin ve sizin &#351;ahidinizin (sa&#287;di&#351;) (hem&#231;inin eks terefin) adlar&#305; qeyd olacaq size tebrikler yazmaq &#252;&#231;&#252;n imkanlar olacaq.<br/>\r\n<b>3</b>. Hem&#231;inin balay&#305; &#252;&#231;&#252;n 1 g&#252;nl&#252;k x&#252;susi otaqda ala bilersiz.<br/>\r\n<b>4</b>. En esas&#305; hemi&#351;elik ve ya ayr&#305;lanadek her ikinizin anketinde heyat yolda&#351;&#305;n&#305;z&#305;n ad&#305; qeyd olacaq.\n";
                echo "<br/>----<br/>\n";
                echo "Sizin hesab&#305;n&#305;zda <b>{$bal}</b>. bal var.\n";
                echo "<br/>----<br/>\n";
                if ( $bal < $aile_b )
                {
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
                }
                else
                {
                    if ( $asaat == "x" )
                    {
                        echo "<b>{$teklif}</b>, leqebli &#350;exs Sizinle evlenmek isteyir.<br/>\n";
                        echo "Onun teklifini qebul edirsinizse toydak&#305; &#351;ahidinizin ad&#305;n&#305; ve toyun vaxt&#305;n&#305; yaz&#305;n ve tesdiqleyin.<br/>\n";
                        echo "----<br/>\n";
                        echo "<i>Eger bu teklifi redd etmek isteyirsinizse \"<u>Raz&#305; deyilem</u>\" d&#252;ymesine t&#305;klay&#305;n</i>.<br/>----<br/>\n";
                    }
                    else
                    {
                        echo "<u>Sevgiliniz</u>:<br/>\n";
                        echo $fsize2;
                        echo "<input name=\"s_user\" maxlength=\"12\" title=\"Sevgiliniz\" emptyok=\"true\"/><br/>\n";
                        echo $fsize1;
                    }
                    echo "<u>&#350;ahidiniz</u>:<br/>\n";
                    echo $fsize2;
                    echo "<input name=\"sh_user\" maxlength=\"12\" title=\"&#350;ahidiniz\" emptyok=\"true\"/><br/>\n";
                    echo $fsize1;
                    if ( $asaat == "x" )
                    {
                        echo "<b>Saat</b>:\n";
                        echo $fsize2;
                        echo "<input size=\"2\" name=\"saat\" value=\"22\" maxlength=\"2\" format=\"*N\"/>:<input size=\"2\" name=\"deqiqe\" value=\"00\" maxlength=\"2\" format=\"*N\"/><br/>";
                        echo $fsize1;
                        echo "----<br/>\n";
                    }
                    echo "<anchor title=\"Evlen\">Tesdiqle<go href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                    echo "<postfield name=\"sh_user\" value=\"$(sh_user)\"/>";
                    if ( $asaat == "x" )
                    {
                        echo "<postfield name=\"saat\" value=\"$(saat)\"/>";
                        echo "<postfield name=\"deqiqe\" value=\"$(deqiqe)\"/>";
                        echo "<postfield name=\"s_user\" value=\"{$teklif}\"/>";
                    }
                    else
                    {
                        echo "<postfield name=\"s_user\" value=\"$(s_user)\"/>";
                    }
                    echo "<postfield name=\"action\" value=\"save\"/>";
                    echo "</go></anchor><br/>\n";
                    if ( $asaat == "x" )
                    {
                        echo "----<br/>\n";
                        echo "<anchor title=\"yox\">Raz&#305; deyilem<go href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
                        echo "<postfield name=\"s_user\" value=\"{$teklif}\"/>\n";
                        echo "<postfield name=\"action\" value=\"delete\"/>\n";
                        echo "</go></anchor><br/>\n";
                    }
                }
                echo "*****<br/>\n";
                echo $fsize2;
            }
            else
            {
                echo "<b>Bo&#351;anmaq - Ayr&#305;lmaq</b>.<br/><br/>\n";
                echo "Siz {$para} leqebli &#351;exs &#199;atda heyat yolda&#351;&#305;n&#305;z.\n";
                echo "<br/>----<br/>";
                echo "<i>Ayr&#305;lmaqa eminsiniz?</i>\n";
                echo "<br/>----<br/>";
                echo "<anchor>Beli<go href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                echo "<postfield name=\"action\" value=\"delete\"/>";
                echo "</go></anchor>.\n";
                echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
                echo "<br/>*****<br/>";
                echo $fsize2;
            }
            break;
        }
        if ( $_POST['action'] == "save" )
        {
            if ( $bal < $aile_b )
            {
                echo "<i>&#199;atda \"<b>Evlenmek</b>\"  &#252;&#231;&#252;n <b>{$aile_b}</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
                echo "<br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $para != "" )
            {
                echo "<i>Siz <b>{$para}</b> ile evlisiniz!</i><br/>";
                echo "*****<br/>\n";
                echo $fsize2;
                break;
            }
            $latuser = strtolower( $s_user );
            $q = mysql_query( "SELECT * FROM `users` WHERE `latuser` = '".$latuser."';" );
            if ( mysql_num_rows( $q ) == 0 )
            {
                echo $fsize2;
                echo "</p>\n";
                echo "<p align=\"center\">\n";
                echo $fsize1;
                echo "<i><b>{$s_user}</b>, leqebli istifade&#231;i tap&#305;lmad...</i><br/>";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $inf = mysql_fetch_array( $q );
            $u_user = $inf['user'];
            $u_id = $inf['id'];
            $u_para = $inf['para'];
            $u_sex = $inf['sex'];
            if ( $u_para != "" )
            {
                echo "<b>{$u_user}</b>, leqebli istifade&#231;i &#231;atda <b>{$u_para}</b>, leqebli istifade&#231;i ile evlidir!<br/>";
                echo "----<br/>\n";
                echo "<i>Heyatda 1 neferin 2 ve daha &#231;ox arvad&#305; ola biler ama bizim &#231;atda bu yolverilmezdir. :=)</i><br/>";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( $u_sex == "{$sex}" )
            {
                echo "<i><b>{$cins}-{$cins}</b>, ile evlene bilmez!</i><br/>";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( file_exists( "file/dat_folder/Aile/{$id}" ) && $saat == "" )
            {
                echo "Stop Telesme Emeliyyat u&#287;urla sona cat&#305;b!<br/>";
                echo "*****<br/>\n";
                echo $fsize2;
                break;
            }
            if ( file_exists( "file/dat_folder/Aile/{$u_id}" ) )
            {
                $ai = file( "file/dat_folder/Aile/{$u_id}" );
                $a1_u_user = base64_decode( trim( $ai[0] ) );
                $a2_id = base64_decode( trim( $ai[1] ) );
                $a3_sh_user = base64_decode( trim( $ai[2] ) );
            }
            if ( $a2_id == "{$id}" )
            {
                $newbal = $bal - $aile_b;
                $son = "Update users set bal = '".$newbal."' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $save = fopen( "file/bal_bot/11.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b> - <b>{$u_user} Teklifini qebul etdi</b>. (<u>{$bal}-{$aile_b}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $aile_b;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                if ( $u_sex == 1 )
                {
                    $cinsi = "Ki&#351;iye";
                }
                else
                {
                    $cinsi = "Xan&#305;ma";
                }
                $message = "<b>{$user}</b> - {$u_user} leqebine evlilik teklifini qebul etdi: {$bal} - {$aile_b} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
                mysql_query( "insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".time( )."','0','Evlenmek {$aile_b} bal','".$data."','1','1');" );
                $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <u>{$u_user}</u>, leqebli  &#350;exsin teklifini qebul ederek onunla evlendiniz.<br/> Hesab&#305;n&#305;zda {$bal} - {$aile_b} = {$newbal} bal qald&#305;.";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Evlenmek','".$data."','1','1');" );
                $u_istifadeci = "H&#246;rmetli <b>{$u_user}</b>.  <u>{$user}</u>, leqebli  &#350;exs Sizin teklifinizi qebul etdi ve sizinle evlendi<br/><b>Tebrikler</b>";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$u_istifadeci."','".$u_user."','".$u_id."','".time( )."','0','Evlenmek','".$data."','1','1');" );
                $saat = "{$saat}:{$deqiqe}";
                $stime = 86400 + time( );
                if ( $sex != 0 )
                {
                    if ( mysql_query( "insert into svadbi values(0,'".$a1_u_user."','".$user."','".$sh_user."','".$a3_sh_user."','".$stime."','".$saat."','".$site."');" ) && mysql_query( "Update users set para='".$a1_u_user."' where id ='".$id."'" ) )
                    {
                    }
                }
                else
                {
                    if ( mysql_query( "insert into svadbi values(0,'".$user."','".$a1_u_user."','".$a3_sh_user."','".$sh_user."','".$stime."','".$saat."','".$site."');" ) && mysql_query( "Update users set para='".$a1_u_user."' where id ='".$id."'" ) )
                    {
                    }
                }
                $i = 0;
                while ( $i <= 9 )
                {
                    $st = time( );
                    $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                    $mes = "<b>".$user."</b>, leqebli &#350;exs <b>".$u_user."</b>, ona etdiyi evlilik teklifini qebul etdi. Tebrikler!!!";
                    $rnd = rand( 0, 99999999 );
                    mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                    ++$i;
                }
                $rnd = rand( 0, 9 );
                $online = time( ) + $vaxt;
                mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
                unlink( "file/dat_folder/Aile/{$id}" );
                unlink( "file/dat_folder/Aile/{$u_id}" );
                echo "<b>Tebrikler</b><br/>*****<br/>";
                echo "Siz {$a1_u_user} leqebli istifade&#231;inin size etdiyi  evlenmek Teklifine he cavab&#305; verdiniz ve siz onunla evlendiniz!  <br/>\n";
                echo "----<br/>\n";
                echo "<b>Admin</b>: <u>Sizi Tebrik edirik...</u>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $newbal = $bal - $aile_b;
            $son = "Update users set bal = '".$newbal."' where id ='".$id."'";
            mysql_query( $son );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $save = fopen( "file/bal_bot/11.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}</b> - <i>{$u_user} Teklif Etdi</i>... (<u>{$bal}-{$aile_b}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
            $mp = mysql_fetch_array( $xerc );
            $satish = $mp['xerc'];
            $satish = $satish + $aile_b;
            mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
            if ( $u_sex == 1 )
            {
                $cinsi = "Ki&#351;iye";
            }
            else
            {
                $cinsi = "Xan&#305;ma";
            }
            $message = "<b>{$user}</b> - {$u_user} leqebine evlilik teklif etdi: {$bal} - {$aile_b} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
            mysql_query( "insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".time( )."','0','Evlenmek {$aile_b} bal','".$data."','1','1');" );
            $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek <u>{$u_user}</u>, leqebli  {$cinsi} evlilik teklif etdiniz.<br/> Hesab&#305;n&#305;zda {$bal} - {$aile_b} = {$newbal} bal qald&#305;.";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Evlenmek','".$data."','1','1');" );
            $u_istifadeci = "H&#246;rmetli <b>{$u_user}</b>.  <u>{$user}</u>, leqebli  &#350;exs sizinle evlenmek isteyir.<br/><u>{$user}</u>-in Teklifini deyerlendirmek &#252;&#231;&#252;n Bal xidmetleri menyusunda Evlenmek b&#246;lmesine daxil olun";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$u_istifadeci."','".$u_user."','".$u_id."','".time( )."','0','Evlenmek','".$data."','1','1');" );
            if ( $u_sex == 0 )
            {
                $deyishencins = "Cenablar&#305;na";
            }
            else
            {
                $deyishencins = "leqebli Xan&#305;ma";
            }
            $i = 0;
            while ( $i <= 9 )
            {
                $st = time( );
                $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                $mes = "<b>".$user."</b>, leqebli &#350;exs <b>".$u_user."</b>, {$deyishencins} evlilik teklif etdi!";
                $rnd = rand( 0, 99999999 );
                mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                ++$i;
            }
            $rnd = rand( 0, 9 );
            $online = time( ) + $vaxt;
            mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
            $saves = fopen( "file/dat_folder/Aile/{$u_id}", "w+" );
            $mysave = "x\n";
            $mysave .= "{$user}\n";
            $mysave .= "{$id}";
            @fwrite( @$saves, @"{$mysave}" );
            @fflush( @$saves );
            @fclose( @$saves );
            $save = fopen( "file/dat_folder/Aile/{$id}", "w+" );
            $aile = "".base64_encode( "{$user}" )."\n";
            $aile .= "".base64_encode( "{$u_id}" )."\n";
            $aile .= "".base64_encode( "{$sh_user}" )."";
            @fwrite( @$save, @"{$aile}" );
            @fflush( @$save );
            @fclose( @$save );
            if ( $u_sex == 0 )
            {
                $ecins = "Ki&#351;iye";
            }
            else
            {
                $ecins = "Xan&#305;ma";
            }
            echo "<b>Tebrikler</b><br/>*****<br/>";
            echo "Siz {$u_user} leqebli {$ecins} evlenmek Teklif etdiniz!<br/>\n";
            echo "{$u_user} &#304;ndi  Sizin Teklifinizi Qebul etmelidir...<br/>\n";
            echo "----<br/>\n";
            echo "<b>Qeyd</b>: Eger qebul etmese bu evlilik ba&#351; tutmayacaq.\n";
            echo "<br/>*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $_POST['action'] == "delete" )
        {
            $q = mysql_query( "SELECT * FROM `users` WHERE `user` = '".$s_user."';" );
            if ( mysql_num_rows( $q ) != 0 )
            {
                $inf = mysql_fetch_array( $q );
                $u_id = $inf['id'];
            }
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            if ( $para == "" )
            {
                unlink( "file/dat_folder/Aile/{$id}" );
                unlink( "file/dat_folder/Aile/{$u_id}" );
                $message = "<b>{$user}</b> - <b>{$s_user}</b>, leqebli istifade&#231;iden evlilik teklifini redd etdi...";
                mysql_query( "insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".time( )."','0','Melumat-Bal','".$data."','1','1');" );
                $istifadeci = "<b>Diqqet</b>! \"<b>{$s_user}</b>\" leqebli &#350;exs Sizin ona etdiyiniz evlilik teklifini redd etdi...";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$s_user."','".$u_id."','".time( )."','0','Melumat','".$data."','1','1');" );
                @$save = @fopen( "file/bal_bot/11.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}: - {$s_user}</b> Evlilik teklifini REDD etdi -  Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                echo "<i>Siz \"<b>{$s_user}</b>\" leqebli &#350;exsin size etdiyi evlilik teklifini redd etdiniz...</i><br/>*****<br/>";
                echo $fsize2;
                $i = 0;
                while ( $i <= 9 )
                {
                    $st = time( );
                    $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                    $mes = "<b>".$user."</b>, - <b>{$s_user}</b> ona etdiyi evlilik teklifini REDD ETDI!!!";
                    $rnd = rand( 0, 99999999 );
                    mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                    ++$i;
                }
                $rnd = rand( 0, 9 );
                $online = time( ) + $vaxt;
                mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
                break;
            }
            mysql_query( "Update users set para = '' where id ='".$id."'" );
            mysql_query( "Update users set para = '' where id ='".$u_id."'" );
            @$save = @fopen( "file/bal_bot/11.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}: - {$para}</b> leqebli istifade&#231;iden Ayr&#305;ld&#305; -  Tarix: {$data}" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $message = "<b>{$user}</b> - <b>{$para}</b>, leqebli istifade&#231;iden ayr&#305;ld&#305;...";
            mysql_query( "insert into zapiski values(0,'".$bb_user."','0','".$message."','','1','".time( )."','0','Melumat-Bal','".$data."','1','1');" );
            $istifadeci = "<b>Diqqet</b>! Sizin &#199;atdak&#305; heyat yolda&#351;&#305;n&#305;z (<u>{$user}</u>) Sizden ayr&#305;ld&#305; (bo&#351;and&#305;)";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$para."','".$u_id."','".time( )."','0','Melumat','".$data."','1','1');" );
            echo "<u>Siz <b>{$para}</b>, leqebli istifade&#231;iden Ayr&#305;ld&#305;n&#305;z</u><br/>*****<br/>";
            echo $fsize2;
            $i = 0;
            while ( $i <= 9 )
            {
                $st = time( );
                $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                $mes = "<b>".$user."</b>, - <b>{$para}</b> leqebli istifade&#231;iden ayr&#305;ld&#305;!!!";
                $rnd = rand( 0, 99999999 );
                mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                ++$i;
            }
            $rnd = rand( 0, 9 );
            $online = time( ) + $vaxt;
            mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
        }
        break;
    case "ban" :
        $bals = file( "file/bal_bot/0.dat" );
        $b_ban = trim( $bals[14] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $b_ban == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Ban A&#231;maq\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            echo "Siz Ban edilmi&#351; leqeb bandan azad ede bilersiz.<br/>\n";
            echo "Bu xidmetden istifade etsez {$b_ban} bal hesab&#305;n&#305;zdan &#231;&#305;x&#305;lacaq!<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----<br/>\n";
            echo "<anchor>Ban Edilmish leqeb axtar<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"action\" value=\"axtar\"/>";
            echo "</go></anchor><br/>\n";
            echo "<anchor>Ban Edilenler Siyahisi<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"action\" value=\"select\"/>";
            echo "</go></anchor><br/>\n";
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $_POST['action'] == "axtar" )
        {
            echo "Ban Edilmi&#351; Niki Yaz&#305;n:<br/>\n";
            echo $fsize2;
            echo "<input name=\"nick{$ref}\" title=\"nick\"/><br/>\n";
            echo $fsize1;
            echo "<anchor title=\"go\">[Axtar]<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">\n";
            echo "<postfield name=\"nick\" value=\"$(nick{$ref})\"/>\n";
            echo "<postfield name=\"action\" value=\"tap\"/>";
            echo "</go></anchor>\n";
            echo $fsize2;
            echo $fsize1;
            echo "<br/>----<br/>\n";
            echo "<a href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
            echo "<br/>*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $_POST['action'] == "tap" )
        {
            $nick = trim( $nick );
            if ( $nick == "" )
            {
                $nick = 0;
            }
            $latuser = strtolower( $nick );
            $select = mysql_query( "Select id,user,banned,time,visit from users where latuser = '".$latuser."'" );
            if ( mysql_affected_rows( ) == 0 )
            {
                echo "Bele bir istifade&#231;i m&#246;vcut deyil\n";
                echo "<br/>----<br/>\n";
                echo "<anchor>Geri Qay&#305;t<prev/></anchor>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $inf = mysql_fetch_array( $select );
            $usid = $inf['id'];
            $bannick = $inf['user'];
            $bantime = $inf['time'];
            $visit = $inf['visit'];
            $banaktiv = $inf['banned'];
            if ( $banaktiv != 1 )
            {
                echo "<u>{$bannick}</u>, Ban Edilmeyib...\n";
                echo "<br/>----<br/>\n";
                echo "<anchor>Geri Qay&#305;t <prev/></anchor>\n";
                echo "<br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $tkick = time( ) - $bantime;
            if ( $tkick < 60 && 0 < $tkick )
            {
                $vaxt = "saniyye\n";
            }
            else if ( $tkick < 3600 && 60 < $tkick )
            {
                $new = $tkick;
                $tkick = $new / 60;
                $vaxt = "deqiqe\n";
            }
            else if ( $tkick < 86400 && 3600 < $tkick )
            {
                $new = $tkick;
                $tkick = $new / 3600;
                $vaxt = "saat\n";
            }
            else if ( 86400 < $tkick )
            {
                $new = $tkick;
                $tkick = $new / 86400;
                $vaxt = "g&#252;n\n";
            }
            $tkick = round( $tkick );
            echo "ID n&#246;mresi: <b>{$usid}</b>\n";
            echo "<br/>Leqeb: <b>{$bannick}</b> \n";
            $d = substr( $visit, 8, 2 );
            if ( substr( $d, 0, 1 ) == 0 )
            {
                $d = substr( $d, 1, 2 );
            }
            $m = substr( $visit, 5, 2 );
            if ( substr( $m, 0, 1 ) == 0 )
            {
                $m = substr( $m, 1, 2 );
            }
            $y = substr( $visit, 0, 4 );
            $cp = substr( $visit, 11, 2 );
            if ( substr( $cp, 0, 1 ) == 0 )
            {
                $cp = substr( $cp, 1, 2 );
            }
            $mn = substr( $visit, 14, 2 );
            $month = array( "", "Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avqust", "Sentyabr", "Oktyabr", "Noyabr", "Dekabr" );
            echo "<br/><b>Ban Edilib</b>: {$d} {$month[$m]} {$y}  Saat: {$cp}:{$mn}  ({$tkick} {$vaxt} evvel)\n";
            echo "<br/>****<br/>Bu leqeb bandan Azad ede bilersiz! <br/>Bunun &#252;&#231;&#252;n hesab&#305;n&#305;zdan {$b_ban} bal &#231;&#305;x&#305;lacaq.<br/>\n";
            echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>----\n";
            echo "<br/>Raz&#305;s&#305;z? \n";
            echo "<anchor>Beli<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"u_id\" value=\"{$usid}\"/>";
            echo "<postfield name=\"action\" value=\"delban\"/>";
            echo "</go></anchor>. /\n";
            echo "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
            echo "<br/>----<br/>\n";
            echo "<anchor>Ba&#351;qa nik axtar<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"action\" value=\"axtar\"/>";
            echo "</go></anchor>\n";
            echo "<br/>*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $_POST['action'] == "select" )
        {
            $query = mysql_query( "select COUNT(id) FROM users WHERE banned = '1'" );
            $all = @mysql_result( @$query, 0 );
            if ( !isset( $s ) )
            {
                $s = 0;
            }
            $mx = round( $all / 10 + 0.45 );
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
            if ( $all < $do )
            {
                $do = $all;
            }
            $o = $ot - 1;
            $ff = $ot;
            if ( $do == 0 )
            {
                $ff = $o;
            }
            $q = mysql_query( "select id,user,whokik from users where banned = '1' order by time ASC limit {$o},{$do};" );
            if ( mysql_affected_rows( ) == 0 )
            {
                echo "<i><b>Ban Edilen</b>, istifade&#231;i yoxdur...</i><br/>*****<br/>\n";
            }
            else
            {
                echo "<b>Ban Edilenler</b> ({$all})<br/>*****<br/>";
                $i = $ot;
                while ( $i <= $do )
                {
                    $arr = mysql_fetch_array( $q );
                    $nk = $arr['id'];
                    $buser = $arr['user'];
                    $muellif = $arr['whokik'];
                    if ( $sebeb != "" )
                    {
                        $sebeb = "Sebeb: (<i>".$sebeb."</i>)";
                    }
                    echo "<b>{$i}</b>. <anchor>{$buser}<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                    echo "<postfield name=\"nick\" value=\"{$buser}\"/>";
                    echo "<postfield name=\"action\" value=\"tap\"/>";
                    echo "</go></anchor>\n";
                    echo "- {$sebeb}  <u>{$muellif}</u><br/>\n";
                    ++$i;
                }
                $next = $s + 1;
                $prev = $s - 1;
                if ( 1 < $s )
                {
                    $ot = ( $prev - 1 ) * 10 + 1;
                    $do = $prev * 10;
                    echo "<anchor>&lt;&lt;{$ot}<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;s={$prev}&amp;ref={$ref}\" method=\"post\">";
                    echo "<postfield name=\"s\" value=\"{$prev}\"/>";
                    echo "<postfield name=\"action\" value=\"select\"/>";
                    echo "</go></anchor>.\n";
                }
                $tes = $all / 10;
                $test = round( $tes );
                if ( $do < $all && $s < $test )
                {
                    $ot = ( $next - 1 ) * 10 + 1;
                    $do = $next * 10;
                    if ( $all < $do )
                    {
                        $do = $all;
                    }
                    echo " |  <anchor>{$do}&gt;&gt;<go href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;s={$next}&amp;ref={$ref}\" method=\"post\">";
                    echo "<postfield name=\"s\" value=\"{$next}\"/>";
                    echo "<postfield name=\"action\" value=\"select\"/>";
                    echo "</go></anchor>\n";
                }
                echo "<br/>";
            }
            echo "*****<br/>\n";
            echo $fsize2;
            break;
        }
        if ( $_POST['action'] == "delban" )
        {
            if ( $bal < $b_ban )
            {
                echo "Ban Edilmi&#351; Leqebi Bandan &#231;&#305;xartmaq &#252;&#231;&#252;n,<br/>Hesab&#305;n&#305;zdan <b>{$b_ban}</b>, bal olmal&#305;d&#305;r\n";
                echo "<br/>----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                echo "<br/>----<br/>\n";
                echo "<a href=\"hesab.php?bolme={$id}&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>*****<br/>\n";
                echo $fsize2;
                break;
            }
            $select = mysql_query( "Select id,user,banned from users where id = '".$u_id."'" );
            if ( mysql_affected_rows( ) != 0 )
            {
                $aktiv = mysql_fetch_array( $select );
                $u_id = $aktiv['id'];
                $bannick = $aktiv['user'];
                $testban = $aktiv['banned'];
                if ( $testban == 1 )
                {
                    $newbal = $bal - $b_ban;
                    mysql_query( "UPDATE `users` SET `banned` = '0'  WHERE `id` = '".$u_id."';" );
                    mysql_query( "UPDATE `users` SET `bal` = '".$newbal."'  WHERE `id` = '".$id."';" );
                    $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                    $mp = mysql_fetch_array( $xerc );
                    $satish = $mp['xerc'];
                    $satish = $satish + $b_ban;
                    $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                    $save = fopen( "file/bal_bot/12.dat", "a+" );
                    $qeyd = "".base64_encode( "<b>{$user}</b> - <b>{$bannick}</b> Ban&#305;n&#305; yox etdi (<u>{$bal}-{$b_ban}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
                    @fwrite( @$save, @"{$qeyd}" );
                    @fflush( @$save );
                    @fclose( @$save );
                    $message = "{$user} - {$bannick} BAN-&#305;n&#305; yox etdi hesab&#305;ndan {$bal} - {$b_ban} = {$newbal} bal qald&#305;<br/> Bankda <b>{$satish}</b> bal var...";
                    mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','{$b_ban} bal Melumat','".$data."','1','1');" );
                    $message = "<b>Diqqet</b>!!! <u>{$user}</u>, leqebli &#351;exs sizin leqebinizde olan ban&#305; &#231;&#305;xartd&#305;. O bunun &#252;&#231;&#252;n {$b_ban} bal xercledi &#231;al&#305;&#351;&#305;n qaydalar&#305; pozmayas&#305;z.";
                    mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$bannick."','".$u_id."','".time( )."','0','Melumat','".$data."','1','1');" );
                    $message = "H&#246;rmetli <u>{$user}</u>, Siz  Hesab&#305;n&#305;zdan {$b_ban} bal xercleyerek <u>{$bannick}</u>. leqebli &#351;exs  ban&#305;n&#305; &#231;&#305;xartd&#305;n&#305;z.<br/> Hesab&#305;n&#305;zda {$bal} - {$b_ban} = {$newbal} bal qald&#305;.";
                    mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$message."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                    echo "<b>Te&#351;ekk&#252;rler</b><br/>*****<br/>\n";
                    echo "Siz <u>{$bannick}</u>, leqebli &#350;exsin BAN-&#305;n&#305; yox etdiniz !<br/>----<br/>\n";
                    echo "Sizin Hesab&#305;n&#305;zda <b>{$newbal}</b>. bal qald&#305;<br/>*****<br/>\n";
                }
                echo $fsize2;
                break;
            }
        }
        break;
    case "mexvi" :
        $bals = file( "file/bal_bot/0.dat" );
        $b_mex = trim( $bals[15] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $b_mex == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        echo "<card id=\"bal_xidmet\" title=\"Tam Mexvilik\">\n";
        echo "<p>\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            if ( $row['mexvi'] == "0" )
            {
                if ( $bal < $b_mex )
                {
                    echo "<b>Tam Mexvilik</b><br/>*****<br/>\n";
                    echo "\"Tam Mexvilik\" o demekdir ki, &#199;atda Sizin anketiniz (melumatlar&#305;n&#305;z) g&#246;rsenmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>{$b_mex}</b>, bald&#305;r.<br/>Sizin hesab&#305;n&#305;zda bal yeterli deyil...\n";
                    echo "<br/>----<br/>\n";
                    echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                    echo "<br/>----<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                echo "<b>Tam Mexvilik</b><br/>*****<br/>\n";
                echo "\"Tam Mexvilik\" o demekdir ki, &#199;atda Sizin anketiniz (melumatlar&#305;n&#305;z) g&#246;rsenmir.<br/>Bu Xidmetin 1 ayl&#305;q istifade haqq&#305; <b>{$b_mex}</b>, bald&#305;r.<br/>\n";
                echo "----<br/>\n";
                echo "Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var\n";
                echo "<br/>----<br/>\n";
                echo "Tam Mexvi olmaq isteyirsiz?<br/>\n";
                echo "<anchor>Beli<go href=\"hesab.php?bolme=mexvi&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
                echo "<postfield name=\"action\" value=\"save\"/>";
                echo "</go></anchor>.\n";
                echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
                echo "<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            echo "H&#246;rmetli <b>{$user}</b>.<br/><br/>\n";
            echo "Siz Tam Mexviliyinizi  le&#287;v etmeye eminsiz?\n";
            echo "<br/>*****<br/>";
            echo "<anchor>Beli<go href=\"hesab.php?bolme=mexvi&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\" method=\"post\">";
            echo "<postfield name=\"action\" value=\"delete\"/>";
            echo "</go></anchor>.\n";
            echo " / <a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Xeyir</a>\n";
            echo "<br/>*****<br/>";
            echo $fsize2;
        }
        else
        {
            if ( $_POST['action'] == "save" )
            {
                if ( $bal < $b_mex )
                {
                    echo "<i>\"<b>Tam Mexvi</b>\" olmaq &#252;&#231;&#252;n <b>{$b_mex}</b>, bal&#305;n&#305;z olmal&#305;d&#305;r!</i>\n";
                    echo "<br/>----<br/>\n";
                    echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a>\n";
                    echo "<br/>*****<br/>\n";
                    echo $fsize2;
                    break;
                }
                if ( $row['mexvi'] != "0" )
                {
                    echo $fsize2;
                    echo "</p>";
                    echo "<p align=\"center\">";
                    echo $fsize1;
                    echo "<i>H&#246;rmetli <b>{$user}</b><br/> Siz \"Tam Mexvi\" istifade&#231;isiniz!</i><br/>*****<br/>";
                    echo $fsize2;
                    break;
                }
                $newbal = $bal - $b_mex;
                $son = "Update users set bal = '".$newbal."', mexvi = '1' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                $saat = 2592000 + time( );
                mysql_query( "insert into `hesab` values(0,'{$user}','{$id}','{$data}','{$saat}','6');" );
                $save = fopen( "file/bal_bot/13.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}</b>: (<u>{$bal}-{$b_mex}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
                $mp = mysql_fetch_array( $xerc );
                $satish = $mp['xerc'];
                $satish = $satish + $b_mex;
                mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
                $message = "<b>{$user}</b> - Tam Mexvi oldu... {$bal} - {$b_mex} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Toxunulmaz {$b_mex} bal','".$data."','1','1');" );
                $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek \"<u>Tam Mexvi</u>\" istifade&#231;i oldunuz!<br/> Hesab&#305;n&#305;zda {$bal} - {$b_mex} = {$newbal} bal qald&#305;.";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Toxunulmazl&#305;q','".$data."','1','1');" );
                echo "<b>Tebrikler!!!</b><br/>*****<br/>";
                echo "Siz \"<u>Tam Mexvi</u>\"  istifade&#231;i olduz!<br/>";
                echo "Sizin Melumatlar&#305;n&#305;z Tam Mexvile&#351;dirildi.<br/>----<br/>";
                echo "Hesab&#305;n&#305;zda <b>{$newbal}</b>. qald&#305;<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            if ( $_POST['action'] == "delete" )
            {
                if ( $row['mexvi'] == "0" )
                {
                    echo "H&#246;rmetli <b>{$user}</b><br/> Siz Tam Mexvi istifade&#231;i deyildiz...<br/>*****<br/>";
                    echo $fsize2;
                    break;
                }
                $son = "Update users set mexvi = '0' where id ='".$id."'";
                mysql_query( $son );
                $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
                mysql_query( "delete from `hesab` where usid='".$id."' and x = '6' limit 1;" );
                @$save = @fopen( "file/bal_bot/13.dat", "a+" );
                $qeyd = "".base64_encode( "<b>{$user}: - Tam Mexviliyini Le&#287;v Etdi</b> -  Tarix: {$data}" )."\n";
                @fwrite( @$save, @"{$qeyd}" );
                @fflush( @$save );
                @fclose( @$save );
                $message = "<b>{$user}</b> - Tam Mexviliyini le&#287;v etdi...";
                mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Melumat-Bal','".$data."','1','1');" );
                $istifadeci = "<b>Diqqet</b>! H&#246;rmetli <b>{$user}</b>. Siz <u>Tam Mexviliyinizi</u>, le&#287;v etdiniz!";
                mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
                echo "<u>Siz Tam Mexviliyini le&#287;v etdiz</u><br/>*****<br/>";
                echo $fsize2;
            }
        }
        break;
    case "img_view" :
        $qey = file( "file/dat_folder/enter.dat" );
        $ffoto = trim( $qey[7] );
        $fusid = trim( $qey[8] );
        $fuser = trim( $qey[9] );
        $qeyd = trim( $qey[10] );
        $regtime = trim( $qey[11] );
        if ( $fuser != "" )
        {
            echo "<card id=\"us_foto\" title=\"Sekil: ".$fuser."\">\n";
            echo "<p align=\"center\">\n";
            echo $fsize1;
            echo "Leqebi:\n";
            echo "<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;nk={$fusid}&amp;ref={$ref}\">".$fuser."</a><br/><br/>\n";
            echo $fsize2;
            if ( file_exists( "photos/".$ffoto."" ) )
            {
                echo "<img src=\"images.php?img=photos/{$ffoto}\" alt=\"foto\"/><br/>\n";
                echo $fsize1;
                echo "<a href=\"images.php?img=photos/{$ffoto}\">Y&#252;kle</a><br/><br/>\n";
                echo $fsize2;
            }
            echo $fsize1;
            if ( $qeyd != "" )
            {
                echo "".$qeyd."<br/>----<br/>\n";
            }
            echo "<a href=\"hesab.php?bolme=imgview&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Sen de &#351;eklini yerle&#351;dir</a><br/>\n";
        }
        else
        {
            echo "<card id=\"us_foto\" title=\"&#214;z&#252;n&#252; g&#246;ster\">\n";
            echo "<p align=\"center\">\n";
            echo $fsize1;
            echo "----<br/>\n";
            echo "<a href=\"hesab.php?bolme=imgview&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;eklini yerle&#351;dir</a><br/>\n";
        }
        if ( $regtime < time( ) )
        {
            $file = file( "file/dat_folder/enter.dat" );
            $test = trim( $file[0] );
            $test2 = trim( $file[1] );
            $test3 = trim( $file[2] );
            $test4 = trim( $file[3] );
            $test5 = trim( $file[4] );
            $test6 = trim( $file[5] );
            $test7 = trim( $file[6] );
            $files = fopen( "file/dat_folder/enter.dat", "w" );
            $xfil .= "{$test}\n";
            $xfil .= "{$test2}\n";
            $xfil .= "{$test3}\n";
            $xfil .= "{$test4}\n";
            $xfil .= "{$test5}\n";
            $xfil .= "{$test6}\n";
            $xfil .= "{$test7}";
            fwrite( $files, $xfil );
            fclose( $files );
        }
        echo "----<br/>\n";
        echo $fsize2;
        break;

    case "imgview" :
        if ( $del == "ok" )
        {
            if ( $row['level'] != 9 )
            {
                exit( );
            }
            echo "<card id=\"x_panel\" title=\"&#350;ekil silindi\">\n";
            echo "<p align=\"center\">\n";
            $file = file( "file/dat_folder/enter.dat" );
            $test = trim( $file[0] );
            $test2 = trim( $file[1] );
            $test3 = trim( $file[2] );
            $test4 = trim( $file[3] );
            $test5 = trim( $file[4] );
            $test6 = trim( $file[5] );
            $test7 = trim( $file[6] );
            $files = fopen( "file/dat_folder/enter.dat", "w" );
            $xfil .= "{$test}\n";
            $xfil .= "{$test2}\n";
            $xfil .= "{$test3}\n";
            $xfil .= "{$test4}\n";
            $xfil .= "{$test5}\n";
            $xfil .= "{$test6}\n";
            $xfil .= "{$test7}";
            fwrite( $files, $xfil );
            fclose( $files );
            echo $fsize1;
            echo "Dehlizdeki &#351;ekil silindi...<br/>----<br/>";
            echo $fsize2;
            break;
        }
        $bals = file( "file/bal_bot/0.dat" );
        $b_img = trim( $bals[16] );
        $b_user = trim( $bals[0] );
        $user_bot = trim( $bals[1] );
        unset( $bals );
        if ( $b_img == "x" )
        {
            echo "<card id=\"xeta\" title=\"Xeta\">\n";
            echo "<p>\n";
            echo $fsize1;
            echo "Bele xidmet yoxdur<br/>\n";
            echo $divide;
            if ( $bolme )
            {
                print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
            }
            print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
            echo $fsize2;
            echo "</p></card></wml>";
            ob_end_flush( );
            exit( );
        }
        $qey = file( "file/dat_folder/enter.dat" );
        $regtime = trim( $qey[11] );
        if ( time( ) < $regtime )
        {
            echo "<card id=\"bal_xidmet\" title=\"G&#246;zleyin\">\n";
            echo "<p align=\"center\">\n";
            echo $fsize1;
            $regtime = ( $regtime - time( ) ) / 60;
            $regtime = round( $regtime );
            echo "Hal-haz&#305;rda dehlizde aktiv olan &#351;ekil var.<br/><br/>\n";
            echo "Yeni &#350;ekil elave etmek &#252;&#231;&#252;n {$regtime} deqiqe g&#246;zlemelisiz.<br/><br/>\n";
            echo $fsize2;
            break;
        }
        echo "<card id=\"bal_xidmet\" title=\"&#214;z&#252;n&#252; g&#246;ster\">\n";
        echo "<p align=\"center\">\n";
        echo $fsize1;
        if ( !isset( $_POST['action'] ) )
        {
            if ( $row['img'] == "0" )
            {
                echo "<br/>Anketinizde &#351;ekil yoxdur, &#246;nce Anketinize\n";
                echo "<a href=\"foto.php?mod=photo&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#350;ekilinizi y&#252;kleyin</a>\n";
                echo "<br/>----<br/>\n";
                echo $fsize2;
                break;
            }
            if ( !isset( $_POST['image'] ) )
            {
                echo "<u>&#350;ekil Se&#231;in</u><br/>----<br/>\n";
                if ( $handle = opendir( "photos/".$id."" ) )
                {
                    $c = 1;
                    while ( false !== ( $file = readdir( $handle ) ) )
                    {
                        if ( $file != "." && $file != ".." && $file != "Thumbs.db" )
                        {
                            $a[] = $file;
                            echo "{$c}\n";
                            $daroq = getimagesize( "photos/{$id}/{$file}" );
                            $n_nam = $daroq[2];
                            if ( $n_nam == "1" )
                            {
                                $img_type = "gif";
                            }
                            if ( $n_nam == "2" )
                            {
                                $img_type = "jpg";
                            }
                            if ( $n_nam == "3" )
                            {
                                $img_type = "png";
                            }
                            if ( 60 < $daroq[0] || 60 < $daroq[1] )
                            {
                                echo "<anchor><img src=\"image.php?img=photos/{$id}/{$file}&amp;size=60\" alt=\"{$site}-{$user}.{$img_type}\"/><go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=imgview&amp;ref={$ref}\" method=\"post\">\n";
                            }
                            else
                            {
                                echo "<anchor><img src=\"photos/{$id}/{$file}\" alt=\"foto {$c}\"/><go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=imgview&amp;ref={$ref}\" method=\"post\">\n";
                            }
                            echo "<postfield name=\"image\" value=\"{$file}\"/>\n";
                            echo "</go></anchor>\n";
                            ++$c;
                        }
                    }
                    echo "<br/>----<br/>\n";
                    closedir( $handle );
                }
            }
            else
            {
                echo "<b>&#214;z&#252;n&#252; g&#246;ster</b><br/>----<br/>\n";
                echo $fsize2;
                $daroq = getimagesize( "photos/{$id}/".$_POST['image']."" );
                $n_nam = $daroq[2];
                if ( $n_nam == "1" )
                {
                    $img_type = "gif";
                }
                if ( $n_nam == "2" )
                {
                    $img_type = "jpg";
                }
                if ( $n_nam == "3" )
                {
                    $img_type = "png";
                }
                if ( 210 < $daroq[0] || 210 < $daroq[1] )
                {
                    echo "<img src=\"image.php?img=photos/{$id}/".$_POST['image']."&amp;size=100\" alt=\"foto\"/><br/>\n";
                }
                else
                {
                    echo "<img src=\"photos/{$id}/".$_POST['image']."\" alt=\"foto\"/><br/>\n";
                }
                echo $fsize1;
                echo "Se&#231;diyiniz &#350;ekil ve yazaca&#287;&#305;n&#305;z mesaj dehlizde g&#246;r&#252;necek.<br/>\n";
                echo "*****<br/>Hesab&#305;n&#305;zda <b>{$bal}</b>. bal var<br/>\n";
                echo "<br/>Mesaj&#305;n&#305;z:<br/>\n";
                echo $fsize2;
                echo "<input name=\"mesaj{$ref}\" maxlength=\"1000\" title=\"Mesaj&#305;n&#305;z\" emptyok=\"true\"/><br/>\n";
                $img_2 = $b_img * 2;
                $img_3 = $b_img * 3;
                echo "<select name=\"saat{$ref}\">\n";
                echo "<option value=\"1\">1 - Saatl&#305;q {$b_img} bal</option>\n";
                echo "<option value=\"2\">2 - Saatl&#305;q - {$img_2} bal</option>\n";
                echo "<option value=\"3\">3 - Saatl&#305;q - {$img_3} bal</option>\n";
                echo "</select><br/>\n";
                echo $fsize1;
                echo "<anchor>G&#246;nder<go href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;bolme=imgview&amp;ref={$ref}\" method=\"post\">\n";
                echo "<postfield name=\"mesaj\" value=\"$(mesaj{$ref})\"/>\n";
                echo "<postfield name=\"saat\" value=\"$(saat{$ref})\"/>\n";
                echo "<postfield name=\"image\" value=\"{$_POST['image']}\"/>\n";
                echo "<postfield name=\"action\" value=\"save\"/>\n";
                echo "</go></anchor>\n";
                echo "<br/>----<br/>\n";
            }
            echo $fsize2;
        }
        else
        {
            $b_img = $b_img * $saat;
            if ( $bal < $b_img || $b_img <= 0 )
            {
                echo "Bu Xidmetden istifade etmek &#252;&#231;&#252;n hesab&#305;n&#305;zdaki bal yetersizdir.<br/>\n";
                echo "----<br/>\n";
                echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>\n";
                echo "<a href=\"hesab.php?bolme=imgview&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Geri Qay&#305;t</a>\n";
                echo "<br/>*****<br/>";
                echo $fsize2;
                break;
            }
            $newbal = $bal - $b_img;
            $son = "Update users set bal = '".$newbal."' where id ='".$id."'";
            mysql_query( $son );
            $data = date( "d.m.y [H:i]", mktime( date( "H" ) + $xsat ) );
            $save = fopen( "file/bal_bot/14.dat", "a+" );
            $qeyd = "".base64_encode( "<b>{$user}</b>: (<u>{$bal}-{$b_img}=<b>{$newbal}</b></u>) Tarix: {$data}" )."\n";
            @fwrite( @$save, @"{$qeyd}" );
            @fflush( @$save );
            @fclose( @$save );
            $xerc = @mysql_query( "Select `xerc` from `setting` where `klu4` = '1';" );
            $mp = mysql_fetch_array( $xerc );
            $satish = $mp['xerc'];
            $satish = $satish + $b_img;
            mysql_query( "UPDATE `setting` SET `xerc` = '".$satish."' where `klu4`='1';" );
            $message = "<b>{$user}</b> - Dehlize {$saat} saatl&#305;q &#350;ekil yerle&#351;dirdi... {$bal} - {$b_img} = {$newbal} bal qald&#305;.<br/> Bankda <b>{$satish}</b> bal var...";
            mysql_query( "insert into zapiski values(0,'".$b_user."','0','".$message."','','1','".time( )."','0','Dehlize &#350;ekil','".$data."','1','1');" );
            $istifadeci = "H&#246;rmetli <b>{$user}</b>. Siz Bal Xidmetinden istifade ederek dehlize {$saat} saatl&#305;q \"<u>&#350;ekilinizi yerle&#351;dirdiz</u>\".<br/> Hesab&#305;n&#305;zda {$bal} - {$b_img} = {$newbal} bal qald&#305;.";
            mysql_query( "insert into zapiski values(0,'".$user_bot."','0','".$istifadeci."','".$user."','".$id."','".time( )."','0','Melumat','".$data."','1','1');" );
            $i = 0;
            while ( $i <= 9 )
            {
                $st = time( );
                $today = date( "H:i", mktime( date( "H" ) + $xsat ) );
                $mes = "<b>".$user."</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>";
                $rnd = rand( 0, 99999999 );
                mysql_query( "Insert into room{$i} set klu4= '".$rnd."', time='".$today."', who='{$user_bot}', message='".$mes."', id='".$st."', towhom='', hid='0', usid='10'" );
                ++$i;
            }
            $rnd = rand( 0, 9 );
            $online = time( ) + $vaxt;
            mysql_query( "UPDATE `users` SET `time` = '".$online."', `room` = '".$rnd."' WHERE `id` = '10';" );
            require( "file/require/sh_files" );
            $mesaj = narmobil( $mesaj );
            $file = file( "file/dat_folder/enter.dat" );
            $test1 = trim( $file[0] );
            $test2 = trim( $file[1] );
            $test3 = trim( $file[2] );
            $test4 = trim( $file[3] );
            $test5 = trim( $file[4] );
            $test6 = trim( $file[5] );
            $test7 = trim( $file[6] );
            $reqtime = $saat * 3600 + time( );
            $files = fopen( "file/dat_folder/enter.dat", "w" );
            $xfil .= "{$test1}\n";
            $xfil .= "{$test2}\n";
            $xfil .= "{$test3}\n";
            $xfil .= "{$test4}\n";
            $xfil .= "{$test5}\n";
            $xfil .= "{$test6}\n";
            $xfil .= "{$test7}\n";
            $xfil .= "{$id}/{$image}\n";
            $xfil .= "{$id}\n";
            $xfil .= "{$user}\n";
            $xfil .= "{$mesaj}\n";
            $xfil .= "{$reqtime}";
            fwrite( $files, $xfil );
            fclose( $files );
            echo "<b>Tebrikler</b><br/>*****<br/>\n";
            echo "Sizin &#350;ekiliniz \"<b>".$saat."</b>\" saatl&#305;q dehlize yerle&#351;dirildi...\n";
            echo "<br/>*****<br/>";
            echo $fsize2;
        }
        break;
    case "bal" :
        require( "qiymet.php" );
        break;
    case "21" :
        require( "file/fun/21" );
        break;
    case "22" :
        require( "file/fun/22" );
        break;
    case "23" :
        require( "file/fun/23" );
        break;
    case "24" :
        require( "file/fun/24" );
        break;

		

case "25" :
echo "<card title=\"Hereketli rengli Nik D&#252;zelt\">\n";
echo "<p>\n";
echo $fsize1;

$bals=file("file/bal_bot/0.dat");
$arn_hazir = trim($bals[25]);

$r_d = mysql_query("select * from hesab where usid = '".$id."' and x = '11'");
if (mysql_num_rows($r_d)!=0) {
$rd_oxu = mysql_fetch_array ($r_d);
$nik_time = $rd_oxu["saat"];
} else {
$nik_time = 0;
}
if(!isset($_POST['action']))
{
if ($nik_time < time()) {
echo "Rengli nik funksiyas&#305;n&#305; Aktiv etdikde \"<b>".$arn_hazir." bal</b>\" balans&#305;n&#305;zdan &#231;&#305;x&#305;l&#305;r.<br/>";
echo "Daha sonra \"<b>30 g&#252;n</b>\" erzinde limitsiz olaraq rengli nik d&#252;zelde, rengini deyi&#351;e ve  Aktiv - Deaktiv ede bilirsiniz.<br/>";
if ($bal < $arn_hazir) {
echo "****<br/>";
echo "Sizin hesab&#305;n&#305;zda (<b>".$bal."</b>) bal var ve bu xidmetden istifade etmek &#252;&#231;&#252;n yeterli deyil.<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>";
}
} else {
$gun = ($nik_time - time()) / 86400;
$gun = strtok($gun,'.');

if(!file_exists("i/".$id.".gif")){
echo "Rengli nik funksiyan&#305;z Deaktivdir aktivle&#351;dirmek &#252;&#231;&#252; balans&#305;n&#305;zdan bal c&#305;x&#305;lmayacaq.<br/>";
echo "\"<u>$gun g&#252;n</u>\" erzinde bu xidmetden bals&#305;z istifade ede bilersiz.<br/>";
}

if(file_exists("i/".$id.".gif")){
echo "Siz funksiyan&#305; aktiv etmisiniz ve \"<u>$gun g&#252;n erzinde</u>\" &#304;stediyiniz zaman &#246;z&#252;n&#252;ze rengli nik d&#252;zelde ve deaktiv ede bilersiz buna g&#246;re hesab&#305;n&#305;zdan bal &#231;&#305;x&#305;lmayacaq.<br/>";
echo "Hal-haz&#305;rda Rengli nickiniz aktivdir.<img src=\"i/".$id.".gif?$ref\" alt=\"Rengli nick\"/><br/>";
}

}

echo $divide;
echo "Fonun rengi:";
echo $fsize2;
echo "<select name=\"fon$ref\">";
echo '<option value="white">A&#287;</option>
<option value="pink">&#199;ehray&#305;</option>
<option value="red">Q&#305;rm&#305;z&#305;</option>
<option value="Tomato">A&#231;&#305;q q&#305;rm&#305;z&#305;</option>
<option value="Maroon">T&#252;nd q&#305;rm&#305;z&#305;</option>
<option value="yellow">Sar&#305;</option>
<option value="Gold">T&#252;nd sar&#305;</option>
<option value="orange">Nar&#305;nc&#305;</option>
<option value="blue">Mavi</option>
<option value="Aqua">A&#231;&#305;q mavi</option>
<option value="Lime">Ya&#351;&#305;l</option>
<option value="Chartreuse">A&#231;&#305;q ya&#351;&#305;l</option>
<option value="violet">Ben&#246;v&#351;eyi</option>
<option value="green">Ya&#351;&#305;l</option>
<option value="brown">Qehveyi</option>
<option value="LightGrey">Boz (50 %)</option>
<option value="DimGray">Boz (75 %)</option>
<option value="grey">Boz</option>
<option value="black">Qara</option>';
echo "</select><br/>";
echo $fsize1;
echo "Herflerin rengi:";
echo $fsize2;
echo "<select name=\"text$ref\" value=\"black\">";
echo '<option value="white">A&#287;</option>
<option value="pink">&#199;ehray&#305;</option>
<option value="red">Q&#305;rm&#305;z&#305;</option>
<option value="Tomato">A&#231;&#305;q q&#305;rm&#305;z&#305;</option>
<option value="Maroon">T&#252;nd q&#305;rm&#305;z&#305;</option>
<option value="yellow">Sar&#305;</option>
<option value="Gold">T&#252;nd sar&#305;</option>
<option value="orange">Nar&#305;nc&#305;</option>
<option value="blue">Mavi</option>
<option value="Aqua">A&#231;&#305;q mavi</option>
<option value="Lime">Ya&#351;&#305;l</option>
<option value="Chartreuse">A&#231;&#305;q ya&#351;&#305;l</option>
<option value="violet">Ben&#246;v&#351;eyi</option>
<option value="green">Ya&#351;&#305;l</option>
<option value="brown">Qehveyi</option>
<option value="LightGrey">Boz (50 %)</option>
<option value="DimGray">Boz (75 %)</option>
<option value="grey">Boz</option>
<option value="black">Qara</option>';
echo "</select><br/>";
echo $fsize1;
echo "Effekt:";
echo $fsize2;
echo "<select name=\"effect$ref\" value=\"1\">";
echo "<option value=\"1\">Herfler</option>";
echo "<option value=\"2\">Sagdan sola soldan saga</option>";
echo "<option value=\"3\">Deyishken rengler</option>";
echo "<option value=\"4\">Yanib Sonen</option>";
echo "</select><br/>";
echo $fsize1;
echo "Aktivlik:<br/>";
echo $fsize2;
echo "<select name=\"action$ref\" value=\"1\">";
echo "<option value=\"0\">Xeyir</option>";
echo "<option value=\"1\">Beli</option>";
echo "</select><br/>";
echo $fsize1;
echo "<anchor>[Ok]<go href=\"hesab.php?bolme=25&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;ver=wml\" method=\"post\">
<postfield name=\"fon\" value=\"$(fon$ref)\"/>
<postfield name=\"text\" value=\"$(text$ref)\"/>
<postfield name=\"effect\" value=\"$(effect$ref)\"/>
<postfield name=\"action\" value=\"$(action$ref)\"/>
</go></anchor><br/>\n";
}
else
{
$effect = htmlspecialchars($_POST['effect']);
$text = htmlspecialchars($_POST['text']);
$fon = htmlspecialchars($_POST['fon']);
$effect = intval($_POST['effect']);

$rengli_nick="RN$action";
$error = "";

if ($nik_time<time()) {
if ($bal < $arn_hazir) {
$error = "Rengli nik d&#252;zeltmek &#252;&#231;&#252;n Hesab&#305;n&#305;zda  \"<b>$arn_hazir</b>\" bal olmal&#305;d&#305;r.<br/>
Sizin Hesab&#305;n&#305;zda \"<b>$bal</b>\" bal var<br/>$divide<a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a><br/>$divide";
}
}

$q = mysql_query("SELECT * FROM `c_nick` WHERE `to` = '".$toid."';");

if(mysql_num_rows($q) != 0)
{
$axtar = mysql_fetch_array($q);
$sonvaxt = $axtar['time'];

$tkick = $sonvaxt - time();
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniye\n";
}
elseif($tkick < 3600 && $tkick > 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick > 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick > 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);

$error = "Sizin rengli nikiniz var. Rengli nikinizin vaxt&#305;na $tkick $vaxt qal&#305;b<br/>$divide";
}

if(!empty($error))
{
echo $error;
echo "<a href=\"hesab.php?bolme=25&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"hesab.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Xidmetleri</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
exit();
}

if ($nik_time<time()) {
if ($bal > $arn_hazir) {
@$fi = fopen("file/bal_bot/18.dat", "a+");
$data = date("d.m.y [H:i]");
$lst = "<b>$us</b>: Tarix: $data<br/>\n";
@fwrite($fi, "$lst");
@fflush($fi);
@fclose($fi);

$saat = (86400 * 30) + time();
$qaliq = $bal - $arn_hazir;
mysql_query("UPDATE `users` SET `bal` = '".$qaliq."' WHERE `id` = '".$id."';");

$data = date("d.M.Y [H:i]");
$message = "<i>H&#246;rmetli <b>$user</b>. Siz Bal Xidmetinden istifade ederek \"<b>Hereketli rengli nik d&#252;zeltenlerden</b>\" oldunuz.<br/> Hesab&#305;n&#305;zda $bal - $arn_hazir = $qaliq bal qald&#305;.</i>.";
mysql_query("Insert into zapiski set klu4='0', who ='".$m_admin."', idwho ='0', message = '".$message."', towhom = '".$user."', idtowhom = '".$id."', time = '".time()."', readd = '0', topic = '<u>Melumat</u>', date='".$data."'");
mysql_query("insert into hesab set leqeb = '".$user."', usid = '".$id."', tarix = '".$tarix."', saat = '".$saat."', x = '11'");
}
}

if($rengli_nick=="RN1") {

$file = "http://qusse.biz/chat/color_anime.php?leqeb=".$user."&fon=".$fon."&text=".$text."&effect=".$effect;
$newfile = "i/".$id.".gif";

if (!copy($file, $newfile)) {
echo "Sehv";
}

echo "<img src=\"http://qusse.biz/chat/color_anime.php?leqeb=".$user."&amp;fon=".$fon."&amp;text=".$text."&amp;effect=".$effect."&amp;ref=$ref\" alt=\"Rengli nick\"/><br/>
Hereketli rengli nickiniz aktiv olundu.<br/>\n";
} else {
echo "Herektli rengli nickiniz deaktiv olundu.<br/>\n";
unlink ("i/".$id.".gif");
}

}
echo $divide;
if(!empty($action))echo "<a href=\"hesab.php?bolme=25&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo $fsize2;
break;

		
		
		
		
		
		
default:
echo "<card id=\"bal_xidmet\" title=\"Bal Xidmetleri\">\n";
echo "<p>\n";
$bals = file( "file/bal_bot/0.dat" );
$r_nik_1 = trim( $bals[2] );
$r_nik_2 = trim( $bals[3] );
$send_bal = trim( $bals[4] );
$leqeb_d = trim( $bals[5] );
$status_d = trim( $bals[6] );
$vip_al = trim( $bals[7] );
$killer_al = trim( $bals[8] );
$gorunmez_al = trim( $bals[9] );
$t_elan = trim( $bals[10] );
$tox_b = trim( $bals[11] );
$r_yazi = trim( $bals[12] );
$aile_b = trim( $bals[13] );
$b_ban = trim( $bals[14] );
$b_mex = trim( $bals[15] );
$b_img = trim( $bals[16] );
$antiiqnor = trim( $bals[21] );
$deling = trim( $bals[22] );
$znak = trim( $bals[23] );
$nikduzelt = trim( $bals[24] );
$arn_hazir = trim( $bals[25] );

unset( $bals );

echo $fsize1;
$inv = $row['inv'];
$tox = $row['tox'];
$yazi = $row['shrift'];
$para = $row['para'];
$mexvi = $row['mexvi'];
print "<b><u>Bal xidmetleri</u></b><br/>----<br/>";
print "Hesab&#305;n&#305;zda (<b>{$bal}</b>) Bal var<br/>";
echo "<a href=\"hesab.php?bolme=bal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Y&#252;kleme Qaydas&#305;</a><br/>----<br/>\n";
    print "<a href=\"znak_al.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Znak Elde Et</a><br/>";

if ( $t_elan != "x" )
{
    print "<a href=\"hesab.php?bolme=elan&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Tebrik Elan Yerle&#351;dir</a> ({$t_elan} bal)<br/>";
}
if ( $deling != "x" )
{
    print "<a href=\"hesab.php?bolme=22&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Herkesi &#304;qnordan &#231;&#305;xartmaq</a> ({$deling} bal)<br/>";
}
if ( $antiiqnor != "x" )
{
    print "<a href=\"hesab.php?bolme=21&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Anti-&#304;qnor Sistemi</a> ({$antiiqnor} bal)<br/>";
}
if ( $znak != "x" )
{
    print "<b><a href=\"hesab.php?bolme=23&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Gold User</a></b> ({$znak} bal)<br/>";
}
if ( $nikduzelt != "x" )
{
   // print "<a href=\"hesab.php?bolme=24&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nik D&#252;zelt</a> ({$nikduzelt} bal)<br/>";
}
print "<a href=\"hesab.php?bolme=nik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Nik Sifari&#351; Et</a> ({$r_nik_1}-{$r_nik_2} bal)<br/>";
if ( $arn_hazir != "x" )

{
//echo "<a href=\"hesab.php?bolme=25&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hereketli Rengli Nik D&#252;zelt</a> ($arn_hazir bal)<br/>";
}
if ( $send_bal != "x" )
{
    print "<a href=\"hesab.php?bolme=sendbal&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dostuna Bal G&#246;nder</a> ({$send_bal}%)<br/>";
}
if ( $leqeb_d != "x" )
{
    print "<a href=\"hesab.php?bolme=yeninik&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#304;stifade&#231;i ad&#305;n&#305; deyi&#351;</a> ({$leqeb_d} bal)<br/>";
}
if ( $status_d != "x" )
{
    print "<a href=\"hesab.php?bolme=status&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Statusu Deyi&#351;</a> ({$status_d} bal)<br/>";
}
if ( $vip_al != "x" )
{
    $levelselect = @mysql_query( "Select name from levels where level='4'" );
    $levels = @mysql_fetch_array( @$levelselect );
    $vips = $levels['name'];
    print "<a href=\"hesab.php?bolme=vip&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">{$vips} R&#252;tbe Al</a> ({$vip_al} bal)<br/>";
}
if ( $killer_al != "x" )
{
    $levelselect = @mysql_query( "Select name from levels where level='5'" );
    $levels = @mysql_fetch_array( @$levelselect );
    $killers = $levels['name'];
    print "<a href=\"hesab.php?bolme=killer&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">{$killers} R&#252;tbe Al</a> ({$killer_al} bal)<br/>";
}
print "<a href=\"hesab.php?bolme=x&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#199;atdan Xaric et</a> (40-220 bal)<br/>";
if ( $gorunmez_al != "x" )
{
    if ( $inv == 0 )
    {
        print "<a href=\"hesab.php?bolme=gorunmez&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Niki G&#246;r&#252;nmez et</a> ({$gorunmez_al} bal)<br/>";
    }
    else
    {
        print "<a href=\"hesab.php?bolme=gorunmez&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">G&#246;r&#252;nmezliyi le&#287;v et</a> (<b>0 bal</b>)<br/>";
    }
}
if ( $tox_b != "x" )
{
    if ( $tox == 0 )
    {
        print "<a href=\"hesab.php?bolme=tox&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Toxunulmazl&#305;q </a> ({$tox_b} bal)<br/>";
    }
    else
    {
        print "<a href=\"hesab.php?bolme=tox&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Toxunulmazl&#305;q&#305; le&#287;v et</a> (<b>0 bal</b>)<br/>";
    }
}
if ( $r_yazi != "x" )
{
    if ( $yazi == "" )
    {
        print "<a href=\"hesab.php?bolme=color&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Yaz&#305;</a> ({$r_yazi} bal)<br/>";
    }
    else
    {
        print "<a href=\"hesab.php?bolme=color&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Rengli Yaz&#305;n&#305; le&#287;v et</a> (<b>0 bal</b>)<br/>";
    }
}
if ( $aile_b != "x" )
{
    if ( $para == "" )
    {
        print "<a href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#199;atdan Evlenmek</a> ({$aile_b} bal)<br/>";
    }
    else
    {
        print "<a href=\"hesab.php?bolme=kebin&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Ayr&#305;lmaq (Bo&#351;anmaq)</a> (<b>0 bal</b>)<br/>";
    }
}
if ( $b_ban != "x" )
{
    print "<a href=\"hesab.php?bolme=ban&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Ban Edilmi&#351; Leqebi a&#231;maq</a> ({$b_ban} bal)<br/>";
}
if ( $b_mex != "x" )
{
    if ( $mexvi == "0" )
    {
        print "<a href=\"hesab.php?bolme=mexvi&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Tam Mexvi &#304;stifade&#231;i</a> ({$b_mex} bal)<br/>";
    }
    else
    {
        print "<a href=\"hesab.php?bolme=mexvi&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Tam Mexviliyi le&#287;v et</a> (<b>0 bal</b>)<br/>";
    }
}
if ( $b_img != "x" )
{
    print "<a href=\"hesab.php?bolme=imgview&amp;id={$id}&amp;ps={$ps}&amp;ref={$ref}\">&#214;z&#252;n&#252; g&#246;ster (Dehlizde)</a> ({$b_img} bal)<br/>";
}
echo "----<br/>";
echo $fsize2;
break;
}

echo $fsize1;
if ($bolme)print "<a href=\"hesab.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Bal Xidmetleri</a><br/>\n";
print "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";
echo $fsize2;
echo "</p></card></wml>";
ob_end_flush();
?>
