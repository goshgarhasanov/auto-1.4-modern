<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$P_ARR) = check_login($link);


if ($row['id'] != 1) {
$_v->title('xeta','center');
$_v->fsize1($fsize1);
echo "Daxil Olma Icazeniz Yoxdur..!\n";
mysql_query( "UPDATE users SET kik = '9999999999', whokik = 'Sistem', whykik = 'icazesiz yere burnunu soxur' WHERE id = '".$id."'" );
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

    if($go==1)
    {
        @mysql_query("update users set dehlizi='1' WHERE id='".$nk."';");
    }
    else if($go==2)
    {
        @mysql_query("update users set dehlizi='0' WHERE id='".$nk."';");
    }


    if($go==3)
    {
        @mysql_query("update users set infophp='1' WHERE id='".$nk."';");
    }
    else if($go==4)
    {
        @mysql_query("update users set infophp='0' WHERE id='".$nk."';");
    }


    if($go==5)
    {
        @mysql_query("update users set onphp='1' WHERE id='".$nk."';");
    }
    else if($go==6)
    {
        @mysql_query("update users set onphp='0' WHERE id='".$nk."';");
    }

    if($go==7)
    {
        @mysql_query("update users set chatphp='1' WHERE id='".$nk."';");
    }
    else if($go==8)
    {
        @mysql_query("update users set chatphp='0' WHERE id='".$nk."';");
    }


      if($go==9)
    {
        @mysql_query("update users set meqanickphp='1' WHERE id='".$nk."';");
    }
    else if($go==10)
    {
        @mysql_query("update users set meqanickphp='0' WHERE id='".$nk."';");
    }


        if($go==11)
    {
        @mysql_query("update users set znakalphp='1' WHERE id='".$nk."';");
    }
    else if($go==12)
    {
        @mysql_query("update users set znakalphp='0' WHERE id='".$nk."';");
    }

            if($go==13)
    {
        @mysql_query("update users set hesabphp='1' WHERE id='".$nk."';");
    }
    else if($go==14)
    {
        @mysql_query("update users set hesabphp='0' WHERE id='".$nk."';");
    }


            if($go==15)
    {
        @mysql_query("update users set mduelphp='1' WHERE id='".$nk."';");
    }
    else if($go==16)
    {
        @mysql_query("update users set mduelphp='0' WHERE id='".$nk."';");
    }


            if($go==17)
    {
        @mysql_query("update users set forumphp='1' WHERE id='".$nk."';");
    }
    else if($go==18)
    {
        @mysql_query("update users set forumphp='0' WHERE id='".$nk."';");
    }


            if($go==19)
    {
        @mysql_query("update users set hekayephp='1' WHERE id='".$nk."';");
    }
    else if($go==20)
    {
        @mysql_query("update users set hekayephp='0' WHERE id='".$nk."';");
    }


            if($go==21)
    {
        @mysql_query("update users set statphp='1' WHERE id='".$nk."';");
    }
    else if($go==22)
    {
        @mysql_query("update users set statphp='0' WHERE id='".$nk."';");
    }


            if($go==23)
    {
        @mysql_query("update users set msgphp='1' WHERE id='".$nk."';");
    }
    else if($go==24)
    {
        @mysql_query("update users set msgphp='0' WHERE id='".$nk."';");
    }


            if($go==25)
    {
        @mysql_query("update users set profilephp='1' WHERE id='".$nk."';");
    }
    else if($go==26)
    {
        @mysql_query("update users set profilephp='0' WHERE id='".$nk."';");
    }



            if($go==27)
    {
        @mysql_query("update users set cabinetphp='1' WHERE id='".$nk."';");
    }
    else if($go==28)
    {
        @mysql_query("update users set cabinetphp='0' WHERE id='".$nk."';");
    }

            if($go==29)
    {
        @mysql_query("update users set changephp='1' WHERE id='".$nk."';");
    }
    else if($go==30)
    {
        @mysql_query("update users set changephp='0' WHERE id='".$nk."';");
    }






$us=$row["user"];

if(isset($nk)){
$select = @mysql_query ("Select * from users where id='".$nk."'");
} else {
$nick=trim($nick);
if($nick=="")$nick=0;
$latuser=strtolower($nick);
$select = mysql_query ("Select * from users where latuser = '".$latuser."'");
}
if (mysql_affected_rows() == 0) {
$_v->title('xeta','center');
$_v->fsize1($fsize1);
echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>****<br/>\n";
if(isset($rm)){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a>\n";
}else{
echo "<b><a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a></b>\n";
}
echo "<br/><a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

$inf = mysql_fetch_array ($select); 
$pid = $inf["id"];
$level = $inf["level"];
$password = $inf["pass"];
$nick = $inf["user"];
$us_soft = $inf["user_soft"];
$us_ip = $inf["user_ip"];

$dehlizi = $inf['dehlizi'];
$mduelphp = $inf['mduelphp'];
$onphp = $inf['onphp'];
$infophp = $inf['infophp'];
$hesabphp = $inf['hesabphp'];
$znakalphp = $inf['znakalphp'];
$chatphp = $inf['chatphp'];
$meqanickphp = $inf['meqanickphp'];
$forumphp = $inf['forumphp'];
$hekayephp = $inf['hekayephp'];
$statphp = $inf['statphp'];
$msgphp = $inf['msgphp'];
$profilephp = $inf['profilephp'];
$cabinetphp = $inf['cabinetphp'];
$changephp = $inf['changephp'];

if(isset($_GET["mkdel"]) and $level<$row["level"] and $P_ARR[19]==1)
{


 

}
if(isset($_GET["msdel"]) and $level<$row["level"] and $P_ARR[20]==1)
{
    @mysql_query("delete from mesaj WHERE idwho = '".$nk."' or idtowhom = '".$nk."'idtowhom");
    wmlpage("OK!..","Qeyd etdiyiniz nikin butun mesajlari silindi..<br/>----<br/><anchor>&#171; Geri Qay&#305;t<prev/></anchor>");
}
if(isset($_GET["rmdel"]) and $level<$row["level"] and $row['delmsg']==1)
{
    $i=0;
    while($i <= 10)
    {
        @mysql_query("delete from room{$i} WHERE usid = '".$nk."'");
        $i++;
    }
    wmlpage("OK!..","Qeyd etdiyiniz nikin butun otaq mesajlari silindi..<br/>----<br/><anchor>&#171; Geri Qay&#305;t<prev/></anchor>");
}


$keys = file( "file/select/".$id.".reg" );
$srok = trim( $keys[0] );
$keygens = trim( $keys[1] );
$tm = time( );
$_SERVER['REQUEST_URI'] = str_ireplace( "&", "&amp;", $_SERVER['REQUEST_URI'] );
if ($srok < $tm)
{
    if (!isset($_POST['keygen']))
    {
$_v->title('G&#252;venlik &#351;ifresi','left');
$_v->fsize1($fsize1);

echo "G&#252;venlik &#351;ifresi: <br/>\n";
$_v->action("".$_SERVER['REQUEST_URI']."");
print $_v->input("<input name=\"acar$ref\" title=\"G&#252;venlik &#351;ifresi\" format=\"*N\" emptyok=\"true\"/>").'<br/>';
print $_v->submit('Daxil ol','keygen=key');
if($_v->ver!='wml') {
echo "<br/>";
}
$_v->divide();
print "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";

$_v->fsize2($fsize2);
$_v->end('1',$link);
        exit;
    }
    else
    {
        $acar = trim( " {$acar} " );
        if ( $keygens != $acar )
        {
$_v->title('xeta','left');
$_v->fsize1($fsize1);
            echo "<b>Daxil etdiyiniz &#351;ifre yanl&#305;&#351;d&#305;r...</b>\n";
            print "<br/>****<br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
            exit;
        }
        else
        {

$_v->title('Icaze Paneli','left');
$_v->fsize1($fsize1);
            echo "Xo&#351; geldiz h&#246;rmetli <b>{$row['user']}</b>...\n";
            print "<br/>****<br/>";
            $newtm = $tm + 500;
            $save = fopen( "file/select/{$id}.reg", "w" );
            $qeyd .= "{$newtm}\n";
            $qeyd .= "{$acar}\n";
            fputs( $save, $qeyd );
            fclose( $save );
            $fi = fopen( "file/control/20.dat", "a+" );
            $data = date( "d-M-y [H:i]" );
            $lst = "".base64_encode( "<b><u>".$row['user']."</u></b> Icaze Panele Daxil oldu. Vaxt&#305;: {$data},<br/> Onun  ip: {$REMOTE_ADDR}, ve Softu: {$HTTP_USER_AGENT}<br/>-=-=-<br/>" )."";
            fwrite( $fi, "{$lst}\n" );
            fflush( $fi );
            fclose( $fi );
        }
    }
}
else
{

$_v->title('&#304;caze Panel','left');
$_v->fsize1($fsize1);
    $newtm = $tm + 200;
    $save = fopen( "file/select/{$id}.reg", "w" );
    $qeyd .= "{$newtm}\n";
    $qeyd .= "{$keygens}";
    fputs( $save, $qeyd );
    fclose( $save );
}

echo "Leqeb: <b><u>$nick</u></b><br/>\n";








$_v->divide();



  if($dehlizi==1)
    {
        echo "Dehlize daxil Ola  <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=2&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Dehlize daxil Ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=1&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


  if($onphp==1)
    {
        echo "Onlayna daxil Ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=6&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Onlayna daxil Ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=5&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }



  if($infophp==1)
    {
        echo "infoya daxil Ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=4&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "infoya daxil Ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=3&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }



   if($chatphp==1)
    {
        echo "Otaqlara daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=8&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Otaqlara daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=7&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($meqanickphp==1)
    {
        echo "Meqa nik ala <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=10&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Meqa nik ala <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=9&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
       
       if($znakalphp==1)
    {
        echo "Znak ala <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=12&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Znak ala <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=11&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($hesabphp==1)
    {
        echo "Bal Xidmetine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=14&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Bal Xidmetine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=13&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($mduelphp==1)
    {
        echo "Duele daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=16&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Duele daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=15&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }



       if($forumphp==1)
    {
        echo "Foruma daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=18&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Foruma daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=17&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($hekayephp==1)
    {
        echo "Hekaye Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=20&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Hekaye Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=19&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }

       if($statphp==1)
    {
        echo "Statiska Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=22&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Statiska Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=21&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($msgphp==1)
    {
        echo "Mesaj Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=24&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Mesaj Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=23&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($profilephp==1)
    {
        echo "Anket Deyisme Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=26&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Anket Deyisme Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=25&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }



       if($cabinetphp==1)
    {
        echo "Kabinete Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=28&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Kabinete Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=27&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }


       if($changephp==1)
    {
        echo "Qurgular Bolmesine daxil ola <b><u>Bilmir</u></b> - [<a href=\"icaze.php?go=30&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }
    else
    {
       echo "Qurgular Bolmesine daxil ola <b><u>Bilir</u></b> - [<a href=\"icaze.php?go=29&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">x</a>]<br/>\n";
    }




$_v->divide();
if($rm!=""){
echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}else{
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
?>