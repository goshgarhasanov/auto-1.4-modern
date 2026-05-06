<?php
session_name('SID');
session_start();
header("Cache-Control: no-cache");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();

FUNCTION REGISTER_END()
{
    FOREACH($_SESSION AS $H => $V)
    {
        IF(@EREG('REG_(.+)', $H, $HP))
        {
            UNSET($_SESSION[$H]);
        }
    }
}

$regusertime = '600';// novbeti qeydiyyatin kecme saniyyesi 600 = 10 deqiqe
$ref=rand(10000,1000000);
$brayz=strtok($HTTP_USER_AGENT,'/');

$setting = @mysql_query ("Select * from setting where klu4='1'");
$set = mysql_fetch_array ($setting);
$rus = $set["rus"];
$reg = $set["reg"];
$computer= $set["computer"];
$komputer= $set["komputer"];

if($_POST['meqsed'] == "") {
    $value = substr(md5(md5(date("d.m"))), 22, strlen(md5(md5(date("d.m")))));
    if(!isset($_COOKIE[$value])) {
        setcookie($value, 0, time() + 86400);
    }
}
if($_POST['user'] != "") {
    $user = $_POST['user'];
}
if($user == "") {
    $keyround = rand(1000, 1000000);
    if(file_exists("file/dat_folder/reg/".md5($HTTP_USER_AGENT.$REMOTE_ADDR))) {
        $dat_files_keysflo = file("file/dat_folder/reg/".md5($HTTP_USER_AGENT.$REMOTE_ADDR));
        $dat_files_keysflood = trim($dat_files_keysflo[0]);
        $dat_files_active = trim($dat_files_keysflo[1]);
        if($dat_files_keysflood <= time()) {
            $filesave = fopen("file/dat_folder/reg/".md5($HTTP_USER_AGENT.$REMOTE_ADDR), "w");
            fwrite($filesave, $keyround);
            fclose($filesave);
            $dat_files_active = 0;
        }
        if($dat_files_active == "1") {
            $dat_files_keysflood = $dat_files_keysflood - time();
            if($dat_files_keysflood < 60 && 0 < $dat_files_keysflood) {
                $vaxt = "saniyyeden\n";
            } else if($dat_files_keysflood < 3600 && 60 < $dat_files_keysflood) {
                $new = $dat_files_keysflood;
                $dat_files_keysflood = $new / 60;
                $vaxt = "deqiqeden\n";
            } else if(3600 < $dat_files_keysflood) {
                $new = $dat_files_keysflood;
                $dat_files_keysflood = $new / 3600;
                $vaxt = "saat\n";
            }
            $dat_files_keysflood = round($dat_files_keysflood );
            wmlpage("Anti Flood", "Siz ".$dat_files_keysflood." ".$vaxt." sonra qeydiyyatdan kece bilersiz.");
        }
    } else {
        $filesave = fopen("file/dat_folder/reg/".md5($HTTP_USER_AGENT.$REMOTE_ADDR), "w");
        fwrite($filesave, $keyround);
        fclose($filesave);
    }
}
del_ref_forum("file/dat_folder/reg");


IF($_SESSION["REG_KEY"]!=TRUE)
{
    $GEN = gen(rand(1,7));
    $_SESSION["REG_KEY"] = $GEN;
    $_SESSION["REG_KEY_AUT"] = $GEN;
}
$REG_KEY = $_SESSION["REG_KEY"];
$KEY_AUT = $_SESSION["REG_KEY_AUT"];


if(bbses($_COOKIE['vreg'])>time())
{
    $tkick = bbses($_COOKIE['vreg']) - time();
    if($tkick < 60 && $tkick > 0)
    {
        $vaxt = "saniyye\n";
    }
    else if($tkick < 3600 && $tkick > 60)
    {
        $new = $tkick;
        $tkick = $new/60;
        $vaxt = "deqiqe\n";
    }
    else if($tkick < 86400 && $tkick > 3600)
    {
        $new = $tkick;
        $tkick = $new/3600;
        $vaxt = "saat\n";
    }
    else if($tkick > 86400)
    {
        $new = $tkick;
        $tkick = $new/86400;
        $vaxt = "g&#252;n\n";
    }
    $tkick = round($tkick);
    wmlpage("IP BAN!..", "Reklam ve ya s&#246;y&#252;&#351; xarakterli nik a&#231;maq istediyinize g&#246;re qeydiyyat&#305;n&#305;z ba&#287;lan&#305;b.<br/>Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz.<br/><a href=\"license.php\">Script License</a>");
}
if($_SESSION["regtime"] < time())
{
    $_SESSION["regstr"] = "newuser";
}
else if(bbses($_SESSION["regstr"])!="newuser")
{
    $flodtime = bbses($_SESSION["regtime"])-time();
    wmlpage("Qeydiyyat Dayandirilib!..", "&#199;ata Qeydiyyat M&#252;veqqeti olaraq Ba&#287;lanm&#305;&#351;d&#305;r (Adminstrator Terefinden).<br/>Daha Sonra Qeyd olma&#287;a &#231;al&#305;&#351;&#305;n..<br/>H&#246;rmetle <b> $admin</b>");
}
mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = '".$HTTP_USER_AGENT."')");
if ((mysql_affected_rows()!=0)&&($row["level"]<7))
{
    wmlpage("IP-SOFT BAN!..", "Siz IP+SOFT &#220;zre Ban Olmusuz!");
}
mysql_query ("Select * from bannlist WHERE (ip = '".$REMOTE_ADDR."')and(soft = 'IP-BAN')");
if (mysql_affected_rows()!=0)
{
    wmlpage("IP Adress BAN!..", "Sizin Daxil olduqunuz IP Adress BAN Edilib!");
}

$icaze = 0;
$adamlar = @mysql_query ("SELECT * FROM conf where acar ='1';");
$mp = mysql_fetch_array ($adamlar);
$soft=$mp["soft"];
$ipp=$mp["ipp"];
$qip=$mp["qip"];
$qsoft=$mp["qsoft"];
$qtime=$mp["time"];


if($OPERATOR1 == "NULL") {
    $icaze = 1;
    $dostup1 = $ipp;
    $dostup2 = $REMOTE_ADDR;
} else {
    $dostup1 = $soft;
    $dostup2 = $HTTP_USER_AGENT;
}
/*
if($dostup1==$dostup2)
{
    wmlpage("STOP!", "Siz Chatdan Xaric Edilibsiz Vaxtin Bitmesini G&#246;zleyin.<br/>******<br/><b>Xaric Edilmi&#351; istifade&#231;ilere qeydiyyatdan ke&#231;mek qada&#287;an edilib.</b>");
}
*/
if ($reg==0)
{
    wmlpage("Qeydiyyat Ba&#287;lanm&#305;&#351;d&#305;r!..", "&#199;ata Qeydiyyat M&#252;veqqeti olaraq Ba&#287;lanm&#305;&#351;d&#305;r (Adminstrator Terefinden).<br/>Daha Sonra Qeyd olma&#287;a &#231;al&#305;&#351;&#305;n..<br/>Eger Qeydiyyat 1 g&#252;n erzinde ba&#287;l&#305; olarsa <b>$nomre</b> n&#246;mresine m&#252;raciet edin.<br/>H&#246;rmetle <b>$admin</b>");
}
if ($computer==0 and $icaze==1)
{
    wmlpage("Qeydiyyat!..", "Komp&#252;terle qeydiyyat ba&#287;l&#305;d&#305;r.");
}

if(!isset($_POST['meqsed']))
{
    echo $xml;
    echo $dtd;
    echo "<wml>\n";
    echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>";
    echo "<card id=\"reg\" title=\"Qeydiyyat\">\n";
    echo "<p mode=\"wrap\">\n";
    echo $fsize1;
    echo "<b>Qeydiyyat</b><br/>";
    echo $divide;
    echo "Leqeb:<br/>\n";
    echo $fsize2;
    echo "<input name=\"user\" maxlength=\"12\" title=\"Leqebiniz (Nick)\" emptyok=\"false\"/><br/>\n";
    echo $fsize1;
    echo "&#350;ifre:<br/>\n";
    echo $fsize2;
    echo "<input name=\"pass\"  maxlength=\"15\" title=\"&#350;ifreniz\" emptyok=\"false\"/><br/>\n";
    echo $fsize1;
    echo "Ad&#305;n&#305;z:<br/>\n";
    echo $fsize2;
    echo "<input name=\"name\" maxlength=\"15\" title=\"Real Ad&#305;n&#305;z\" emptyok=\"false\"/><br/>\n";
    echo $fsize1;
    echo "Cinsiniz:<br/>\n";
    echo $fsize2;
    echo "<select name=\"sex\">\n";
    echo "<option value=\"0\">Ki&#351;i</option>\n";
    echo "<option value=\"1\">Qad&#305;n</option>\n";
    echo "</select><br/>\n";
    echo $fsize1;
    echo "Do&#287;um tarixiniz:<br/>\n";
    echo $fsize2;
echo "<select name=\"day\">\n";
echo "<option value=\"\">---</option>\n";
echo "<option value=\"01\">01</option>\n";
echo "<option value=\"02\">02</option>\n";
echo "<option value=\"03\">03</option>\n";
echo "<option value=\"04\">04</option>\n";
echo "<option value=\"05\">05</option>\n";
echo "<option value=\"06\">06</option>\n";
echo "<option value=\"07\">07</option>\n";
echo "<option value=\"08\">08</option>\n";
echo "<option value=\"09\">09</option>\n";
echo "<option value=\"10\">10</option>\n";
echo "<option value=\"11\">11</option>\n";
echo "<option value=\"12\">12</option>\n";
echo "<option value=\"13\">13</option>\n";
echo "<option value=\"14\">14</option>\n";
echo "<option value=\"15\">15</option>\n";
echo "<option value=\"16\">16</option>\n";
echo "<option value=\"17\">17</option>\n";
echo "<option value=\"18\">18</option>\n";
echo "<option value=\"19\">19</option>\n";
echo "<option value=\"20\">20</option>\n";
echo "<option value=\"21\">21</option>\n";
echo "<option value=\"22\">22</option>\n";
echo "<option value=\"23\">23</option>\n";
echo "<option value=\"24\">24</option>\n";
echo "<option value=\"25\">25</option>\n";
echo "<option value=\"26\">26</option>\n";
echo "<option value=\"27\">27</option>\n";
echo "<option value=\"28\">28</option>\n";
echo "<option value=\"29\">29</option>\n";
echo "<option value=\"30\">30</option>\n";
echo "<option value=\"31\">31</option>\n";
echo "</select>";
echo "<small>-</small>";
echo "<select name=\"month\">\n";
echo "<option value=\"\">---</option>\n";
echo "<option value=\"01\">yanvar</option>\n";
echo "<option value=\"02\">fevral</option>\n";
echo "<option value=\"03\">mart</option>\n";
echo "<option value=\"04\">aprel</option>\n";
echo "<option value=\"05\">may</option>\n";
echo "<option value=\"06\">iyun</option>\n";
echo "<option value=\"07\">iyul</option>\n";
echo "<option value=\"08\">avqust</option>\n";
echo "<option value=\"09\">sentyabr</option>\n";
echo "<option value=\"10\">oktyabr</option>\n";
echo "<option value=\"11\">noyabr</option>\n";
echo "<option value=\"12\">dekabr</option>\n";
echo "</select>";
echo "<small>-</small>";
echo "<input size=\"4\" name=\"year\" maxlength=\"4\" format=\"*N\" emptyok=\"false\"/><br/>\n";
echo $fsize1;
echo "&#350;eher:<br/>\n";
echo $fsize2;
echo "<select name=\"city\">\n";
echo "<option value=\"1\">A&#287;cabedi</option>\n";
echo "<option value=\"2\">A&#287;dam</option>\n";
echo "<option value=\"3\">A&#287;da&#351;</option>\n";
echo "<option value=\"4\">A&#287;stafa</option>\n";
echo "<option value=\"5\">A&#287;su</option>\n";
echo "<option value=\"6\">Astara</option>\n";
echo "<option value=\"7\">Bak&#305;</option>\n";
echo "<option value=\"8\">Balaken</option>\n";
echo "<option value=\"9\">Berde</option>\n";
echo "<option value=\"10\">Beyleqan</option>\n";
echo "<option value=\"11\">Bilesuvar</option>\n";
echo "<option value=\"12\">Cebray&#305;l</option>\n";
echo "<option value=\"13\">Celilabad</option>\n";
echo "<option value=\"14\">Da&#351;kesen</option>\n";
echo "<option value=\"15\">Deve&#231;i</option>\n";
echo "<option value=\"16\">F&#252;zuli</option>\n";
echo "<option value=\"17\">Gedebey</option>\n";
echo "<option value=\"18\">Gence</option>\n";
echo "<option value=\"19\">Goranboy</option>\n";
echo "<option value=\"20\">G&#246;y&#231;ay</option>\n";
echo "<option value=\"21\">G&#246;yg&#246;l (Xanlar)</option>\n";
echo "<option value=\"22\">Hac&#305;qabul</option>\n";
echo "<option value=\"23\">&#304;mi&#351;li</option>\n";
echo "<option value=\"24\">&#304;smay&#305;ll&#305;</option>\n";
echo "<option value=\"25\">Kelbecer</option>\n";
echo "<option value=\"26\">K&#252;rdemir</option>\n";
echo "<option value=\"27\">La&#231;&#305;n</option>\n";
echo "<option value=\"28\">Lenkeran</option>\n";
echo "<option value=\"29\">Lerik</option>\n";
echo "<option value=\"30\">Masall&#305;</option>\n";
echo "<option value=\"31\">Minge&#231;evir</option>\n";
echo "<option value=\"32\">Naftalan</option>\n";
echo "<option value=\"33\">Nax&#231;&#305;van MR- Babek</option>\n";
echo "<option value=\"34\">Nax&#231;&#305;van MR- Culfa</option>\n";
echo "<option value=\"35\">Nax&#231;&#305;van MR- Kengerli</option>\n";
echo "<option value=\"36\">Nax&#231;&#305;van MR- Ordubad</option>\n";
echo "<option value=\"37\">Nax&#231;&#305;van MR- &#350;ahbuz</option>\n";
echo "<option value=\"38\">Nax&#231;&#305;van MR- Sederek</option>\n";
echo "<option value=\"39\">Nax&#231;&#305;van MR- &#350;erur</option>\n";
echo "<option value=\"40\">Nax&#231;&#305;van MR- Nax&#231;&#305;van &#351;.</option>\n";
echo "<option value=\"41\">Neft&#231;ala</option>\n";
echo "<option value=\"42\">O&#287;uz</option>\n";
echo "<option value=\"43\">Qax</option>\n";
echo "<option value=\"44\">Qazax</option>\n";
echo "<option value=\"45\">Qebele</option>\n";
echo "<option value=\"46\">Qobustan</option>\n";
echo "<option value=\"47\">Quba</option>\n";
echo "<option value=\"48\">Qubadl&#305;</option>\n";
echo "<option value=\"49\">Qusar</option>\n";
echo "<option value=\"50\">Saatl&#305;</option>\n";
echo "<option value=\"51\">Sabirabad</option>\n";
echo "<option value=\"52\">Salyan</option>\n";
echo "<option value=\"53\">Samux</option>\n";
echo "<option value=\"54\">Siyezen</option>\n";
echo "<option value=\"55\">Sumqay&#305;t</option>\n";
echo "<option value=\"56\">&#350;amax&#305;</option>\n";
echo "<option value=\"57\">&#350;eki</option>\n";
echo "<option value=\"58\">&#350;emkir</option>\n";
echo "<option value=\"59\">&#350;irvan (Eli Bayraml&#305;)</option>\n";
echo "<option value=\"60\">&#350;u&#351;a</option>\n";
echo "<option value=\"61\">Terter</option>\n";
echo "<option value=\"62\">Tovuz</option>\n";
echo "<option value=\"63\">Ucar</option>\n";
echo "<option value=\"64\">Xa&#231;maz</option>\n";
echo "<option value=\"65\">Xankendi</option>\n";
echo "<option value=\"66\">X&#305;z&#305;</option>\n";
echo "<option value=\"67\">Xocavend</option>\n";
echo "<option value=\"68\">Xocal&#305;</option>\n";
echo "<option value=\"69\">Yard&#305;ml&#305;</option>\n";
echo "<option value=\"70\">Yevlax</option>\n";
echo "<option value=\"71\">Zaqatala</option>\n";
echo "<option value=\"72\">Zengilan</option>\n";
echo "<option value=\"73\">Zerdab</option>\n";
echo "</select><br/>";

    echo $fsize1;
    echo "&#214;z haqq&#305;n&#305;zda melumat:<br/>\n";
    echo $fsize2;
    echo "<input name=\"infa\" maxlength=\"200\" title=\"&#214;z haqq&#305;n&#305;zda melumat\" emptyok=\"false\"/><br/>\n";
    echo $fsize1;
    echo "Meqsed:<br/>\n";
    echo $fsize2;
    echo "<select name=\"meqsed\">\n";
    echo "<option value=\"3\">Hems&#246;hbet olmaq</option>\n";
    echo "<option value=\"2\">Virtual Dostluq</option>\n";
    echo "<option value=\"1\">Sevgi Tapmaq</option>\n";
    echo "<option value=\"0\">Dost Tapmaq</option>\n";
    echo "</select><br/>\n";
    /*
    $savik_code = rand(10,99);
    $ac = fopen("file/dat_folder/reg_rand.dat","w+");
    fwrite($ac,$savik_code);
    fclose($ac);
    $savik = file("file/dat_folder/reg_rand.dat");
    echo $fsize1;
    echo "Kod: <b>".$savik[0]."</b> [<a href=\"reg.php?".SID."&amp;ref=".rand(100,2300)."\">?</a>]<br/>\n";
    echo "<input size=\"2\" name=\"code\" maxlength=\"2\" title=\"Kod\" emptyok=\"false\"/><br/>";
    echo $fsize2;
    */
    echo $fsize1;
    $n = @rand(1,12);
    if($n==1)$ref1 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==2)$ref2 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==3)$ref3 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==4)$ref4 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    //elseif($n==5)$ref5 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==6)$ref6 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==7)$ref7 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==8)$ref8 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==9)$ref9 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==10)$ref10 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==11)$ref11 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";
    elseif($n==12)$ref12 = "<postfield name=\"$REG_KEY\" value=\"". gen(7) ."\"/>";

    echo "<anchor title=\"go\">QeYD ol<go href=\"reg.php?go=reg&amp;". SID ."\" method=\"post\">";
    echo "<postfield name=\"user\" value=\"$(user)\"/>" . $ref1;
    echo "<postfield name=\"pass\" value=\"$(pass)\"/>" . $ref2;
    echo "<postfield name=\"name\" value=\"$(name)\"/>" . $ref3;
    echo "<postfield name=\"sex\" value=\"$(sex)\"/>" . $ref4;
    //echo "<postfield name=\"code\" value=\"$(code)\"/>" . $ref5;
    echo "<postfield name=\"day\" value=\"$(day)\"/>" . $ref6;
    echo "<postfield name=\"month\" value=\"$(month)\"/>" . $ref7;
    echo "<postfield name=\"year\" value=\"$(year)\"/>" . $ref8;
    echo "<postfield name=\"city\" value=\"$(city)\"/>" . $ref9;
    echo "<postfield name=\"nom\" value=\"$(nom)\"/>" . $ref10;
    echo "<postfield name=\"infa\" value=\"$(infa)\"/>" . $ref11;
    echo "<postfield name=\"meqsed\" value=\"$(meqsed)\"/>" . $ref12;
    echo "</go></anchor><br/>\n";
    echo $divide;
    echo "<a href=\"http://".$site_url."/?$ref\">".$site."</a>\n";
    echo $fsize2;
    echo "</p></card></wml>\n";
    exit;
}
else
{
    REGISTER_END();
    $error = true;
    if(bbses($_SESSION["regstr"])!="newuser" OR $_POST["$REG_KEY"] == "")
    {
        header ("Location: reg.php");
        exit;
    }
    //$antispa = file("file/dat_folder/reg_rand.dat"); $antispam = trim($antispa[0]);
    $user = trim(" $user ");
    $user = ereg_replace(" +"," ",$user);
    $pass = trim(" $pass ");
    $pass = ereg_replace(" +"," ",$pass);
    $name = trim(" $name ");
    $name = ereg_replace(" +"," ",$name);
    $day = trim(" $day ");
    $day = ereg_replace(" +"," ",$day);
    $month = trim(" $month ");
    $month = ereg_replace(" +"," ",$month);
    $year = trim(" $year ");
    $year = ereg_replace(" +"," ",$year);
    $city  = trim(" $city  ");
    $city  = ereg_replace(" +"," ",$city);
    $infa  = trim(" $infa  ");
    $infa  = ereg_replace(" +"," ",$infa);
    $infa = substr($infa,0,400);
    $city = trim(" $city  ");
    $city = ereg_replace(" +"," ",$city);
    $user = eregi_replace("\\(P!\\)", "0", $user);
    $help = "Leqebiniz yaln&#305;z Lat&#305;n heriflerinden ibaret ola biler.";
    $emp = "Xanalar tan doldurulmayib xai&#351; edirik tam olaraq doldurarsaniz!!";
    $wrongdate = "Siz Do&#287;um Tarixini d&#252;zg&#252;n yazmam&#305;s&#305;n&#305;z<br/><u>D&#252;zg&#252;n yaz&#305;l&#305;&#351; qaydas&#305;</u>: G&#252;n-Ay-&#304;l";
    $god = date("Y") - 10;
    if(ctype_digit($user))
    {
        $msg = $help;
    }
    else if(!preg_match("!^[a-z1-9@\\*\\)\\(\\?\\!\\-_\\]\\[=~]+$!i",$user) and !preg_match("!^[1-9@\\*\\)\\(\\?\\!\\-_\\]\\|\\[=~]+$!i",$bak))
    {
        $msg = "Leqebde Qada&#287;an edilmi&#351; simvollar var!";
    }
    else if ($user === "")
    {
        $msg = $emp;
    }
    else if ($pass === "")
    {
        $msg = "&#350;ifrenizi yazmad&#305;n&#305;z!";
    }
    else if (strpos($user,"|")!==false)
    {
        $msg = "Leqebde Qada&#287;an edilmi&#351; simvollar var!";
    }
    else if (!preg_match("!^[a-z0-9]+$!i",$pass))
    {
        $msg = "Parolda icazesiz simvollar var!";
    }
    else if ($name == "")
    {
        $msg = $emp;
    }
    else if ($day == "")
    {
        $msg = $emp;
    }
    else if ($month == "")
    {
        $msg = $emp;
    }
    else if ($year == "")
    {
        $msg = $emp;
    }
    else if ($error_msg_keys != "")
    {
        $msg = $error_msg_keys;
    }
    else if (strlen($user) < 4)
    {
        $msg = "Leqeb 4 simvoldan az olmal&#305;d&#305;r!";
    }
    else if (strlen($user) > 12)
    {
        $msg = "Leqeb 12 simvoldan art&#305;q olmamal&#305;d&#305;r!!";
    }
    else if ((strlen($day) !== 2)||($day>31))
    {
        $msg = $wrongdate;
    }
    else if ((strlen($month) !== 2)||($month>12))
    {
        $msg = $wrongdate;
    }
    else if ((strlen($year) !== 4)||($year>=$god)||($year<1950))
    {
        $msg = $wrongdate;
    }
    else if (($sex == "")&&($sex !== "0")&&($sex !== "1"))
    {
        $msg = "Qeyd etdiyiniz Cins do&#287;ru deyil.";
    }
    else if (strlen(number_nick($user))>='5')
    {
        $msg = "Nikde heddinden cox reqem var.";
    }
    //elseif ($code==""){$msg = "Tehl&#252;kesizlik Kodunu yazmad&#305;n&#305;z!";}
    //elseif ($code !== $antispam) {$msg = "Tehl&#252;kesizlik Kodunu d&#252;zg&#252;n yaz&#305;lmay&#305;b!";}
    else
    {
        $user = chkdsk($user,basename(__FILE__),"Leqeb");
        $user = HtmlSpecialChars($user);
        $pass = HtmlSpecialChars($pass);
        $day = HtmlSpecialChars($day);
        $month = HtmlSpecialChars($month);
        $year = HtmlSpecialChars($year);
        $mob = HtmlSpecialChars($mob);
        $meqsed = HtmlSpecialChars($meqsed);
        $name = chkdsk($name,basename(__FILE__),"Ad");
        $infa = chkdsk($infa,basename(__FILE__),"Haqq&#305;nda");
        $city = chkdsk($city,basename(__FILE__),"&#350;eher");
        $name = narmobilqey($name);
        $infa = narmobilqey($infa);
        $city = narmobilqey($city);
        $open = fopen("file/control/15.dat","r");
        while(!feof($open)) @$search.=base64_decode(fgets($open,1024));
        fclose($open);
        $nick = $user;
        $nick = str_replace("*", "&#8470;1", $nick);
        $nick = str_replace(")", "&#8470;2", $nick);
        $nick = str_replace("(", "&#8470;3", $nick);
        $nick = str_replace("?", "&#8470;4", $nick);
        $nick = str_replace("]", "&#8470;5", $nick);
        $nick = str_replace("[", "&#8470;6", $nick);
        $search = str_replace("*", "&#8470;1", $search);
        $search = str_replace(")", "&#8470;2", $search);
        $search = str_replace("(", "&#8470;3", $search);
        $search = str_replace("?", "&#8470;4", $search);
        $search = str_replace("]", "&#8470;5", $search);
        $search = str_replace("[", "&#8470;6", $search);
        if(eregi(strtolower("#$nick#"), strtolower($search)))
        {
            wmlpage("Ban Edilib!..", "<b>".$user."</b> Leqebi Ban edilib!");
        }
        $latuser = strtolower($user);
        $fiad = str_replace("_az", "....................................", $latuser);
        $fiad = str_replace("*az", "....................................", $latuser);
        $fiad = str_replace("_wen", "....................................", $fiad);
        $fiad = str_replace("dumsu", "....................................", $fiad);
        $fiad = str_replace("*ru", "....................................", $fiad);
        $fiad = str_replace("_ru", "....................................", $fiad);
        $fiad = str_replace("_net", "....................................", $fiad);
        $fiad = str_replace("_com", "....................................", $fiad);
        $fiad = str_replace("_biz", "....................................", $fiad);
        $fiad = str_replace("*blz", "....................................", $fiad);
        $fiad = str_replace("_blz", "....................................", $fiad);
        $fiad = str_replace("_blz", "....................................", $fiad);
        $fiad = str_replace("*ws", "....................................", $fiad);
        $fiad = str_replace("_ws", "....................................", $fiad);
        $fiad = str_replace("_vv", "....................................", $fiad);
        $fiad = str_replace("*vv", "....................................", $fiad);
        $fiad = str_replace("-net", "....................................", $fiad);
        $fiad = str_replace("-com", "....................................", $fiad);
        $fiad = str_replace("-biz", "....................................", $fiad);
        $fiad = str_replace("-blz", "....................................", $fiad);
        $fiad = str_replace("-ru", "....................................", $fiad);
        $fiad = str_replace("-ws", "....................................", $fiad);
        $fiad = str_replace("-vv", "....................................", $fiad);
        $fiad = str_replace("*az", "....................................", $fiad);
        $fiad = str_replace("=az", "....................................", $fiad);
        $fiad = str_replace("*biz", "....................................", $fiad);
        $fiad = str_replace("=biz", "....................................", $fiad);
        $fiad = str_replace("=blz", "....................................", $fiad);
        $fiad = str_replace("=net", "....................................", $fiad);
        $fiad = str_replace("*net", "....................................", $fiad);
        $fiad = str_replace("=ru", "....................................", $fiad);
        $fiad = str_replace("=ws", "....................................", $fiad);
        $fiad = str_replace("=vv", "....................................", $fiad);
        $fiad = str_replace("-", "", $fiad);
        $fiad = str_replace("~", "", $fiad);
        $fiad = str_replace("@", "", $fiad);
        $fiad = str_replace("\*", "", $fiad);
        $fiad = str_replace("_", "", $fiad);
        $fiad = str_replace("\[", "", $fiad);
        $fiad = str_replace("]", "", $fiad);
        $fiad = str_replace("=", "", $fiad);
        $fiad = str_replace("error", "..................................", $fiad);
        $fiad = str_replace("ErroR!ink", "..................................", $fiad);
		$fiad = str_replace("Nano", "..................................", $fiad);
        $fiad = str_replace("c4n4pl4", "..................................", $fiad);
        $fiad = str_replace("N4n0", "..................................", $fiad);
        $fiad = str_replace("adm", "....................", $fiad);
        $fiad = str_replace("stat", "....................", $fiad);
        $fiad = str_replace("sox", "....................", $fiad);
        $fiad = str_replace("sox", "....................", $fiad);
        $fiad = str_replace("sik", "....................................", $fiad);
        $fiad = str_replace("qehb", "....................................", $fiad);
        $fiad = str_replace("qehib", "....................................", $fiad);
        $fiad = str_replace("got", "....................................", $fiad);
        $fiad = str_replace("peyse", "....................................", $fiad);
        $fiad = str_replace("cindir", "....................................", $fiad);
        $fiad = str_replace("wap", "....................................", $fiad);
        $fiad = str_replace("wenru", "....................................", $fiad);
        $fiad = str_replace("wensu", "....................................", $fiad);
        $fiad = str_replace("rehber", "....................................", $fiad);
        if (strlen($fiad) > 20)
        {
            setcookie ("vreg", time()+86400, time()+86400);
            $date = date("d.m.y [H:i]", mktime(date ("H")+$xsat));
            $save = fopen("file/control/12.dat", "a+");
            $qeyd = "Leqeb: <b>".$user."</b> Password: ".$pass." (<b>".$date."</b>)";
            $qeyd .= "IP: <b>".$REMOTE_ADDR."</b> Soft: ".$HTTP_USER_AGENT;
            $qeyd = "". base64_encode($qeyd) ."\n";
            @fwrite($save, $qeyd);
            @fflush($save);
            @fclose($save);
            wmlpage("Xeta!..", "<b>Bu nik olmaz!</b>");
        }
        $latuser = strtolower($user);
        $result = mysql_query ("Select * from users where latuser = '".$latuser."'");
        if (mysql_affected_rows() == false)
        {
            $levelselect = @mysql_query ("Select name from levels where level=0");
            $levels = @mysql_fetch_array($levelselect);
            $lev0 = $levels["name"];
            $birth = $day."-".$month."-".$year;
            $now = date("d-m-Y");
            if($ruser)
            {
                $saves = fopen("file/log/error_raport.dat", "a+");
                @fwrite($saves, $ruser.$HTTP_USER_AGENT.$REMOTE_ADDR);
                @fflush($saves);
                @fclose($saves);
            }
			$file = @file("file/dat_folder/spam.dat");
            $aleminvaxti = trim($file[1]);
            $_SESSION["regtime"] = time()+$aleminvaxti;
            $_SESSION["regstr"] = "";
            $deletetd = substr(md5(md5(date("d.m", mktime(date("H") - 24)))), 22, strlen(md5(md5(date("d.m", mktime(date("H") - 24))))));
            if(isset($_COOKIE[$deletetd])) {
                setcookie($deletetd, "", time() - 86400);
            }
			
            $value = substr(md5(md5(date("d.m"))), 22, strlen(md5(md5(date("d.m")))));
            $user_limit = $_COOKIE[$value];
			$file = @file("file/dat_folder/spam.dat");
            $alemdarliq = trim($file[0]);
            if ($set['the'] <= "alemdarliq") {
                $limit_reg = "$alemdarliq";
            } else {
                $limit_reg = $set['the'];
            }
            if(OPERATOR1($REMOTE_ADDR) == "NULL") {
                $re_ip = mysql_query("select count(`id`) as `num` from `reg_limit` WHERE `md5` = '".md5($REMOTE_ADDR)."';");
                $re_ip = mysql_fetch_array($re_ip);
                $reg_ip = $re_ip['num'];
                if($reg_ip <= 4) {
                    mysql_query("delete from `reg_limit` WHERE `code`!='".$value."';");
                }
                if($limit_reg <= $reg_ip) {
                    wmlpage($site,"Qeydiyyat Limitiniz dolub. Siz Qeydiyyatdan g&#252;n erzinde $limit_reg defe ke&#231;e bilersiz");
                } else {
                    mysql_query("Insert into `reg_limit` set `md5`='".md5($REMOTE_ADDR)."', `code`='".$value."', `ip`='".$REMOTE_ADDR."';");
                }
            } else if($limit_reg <= $user_limit) {
                wmlpage($site,"Qeydiyyat Limitiniz dolub. Siz Qeydiyyatdan g&#252;n erzinde $limit_reg defe ke&#231;e bilersiz");
            } else if(isset($user_limit)) {
                setcookie($value, $user_limit + 1, time() + 86400);
            } else {
                $re_ip = mysql_query("select count(`id`) as `num` from `reg_limit` WHERE `md5` = '".md5($REMOTE_ADDR.$HTTP_USER_AGENT)."';");
                $re_ip = mysql_fetch_array($re_ip);
                $reg_ip = $re_ip['num'];
                if ($reg_ip <= 4) {
                    mysql_query("delete from `reg_limit` WHERE `code`!='".$value."';");
                    if($limit_reg <= $reg_ip) {
                        wmlpage($site, "Qeydiyyat Limitiniz dolub. Siz Qeydiyyatdan g&#252;n erzinde $limit_reg defe ke&#231;e bilersiz");
                    } else {
                        mysql_query("Insert into `reg_limit` set `md5`='".md5($REMOTE_ADDR.$HTTP_USER_AGENT)."', `code`='".$value."', `ip`='".$REMOTE_ADDR."';");
                    }
                }
            }
            $filesave = fopen("file/dat_folder/reg/".md5($HTTP_USER_AGENT.$REMOTE_ADDR), "w");
            fwrite($filesave, time() + $regusertime."\n1");
            fclose($filesave);

            $time = time();
 
            if (mysql_query("Insert into users set user='".$user."', pass='".base64_encode($pass)."', name='".$name."', sex='".$sex."', birth='".$birth."', meqsed='".$meqsed."', infa='".$infa."', date='".$now."', city='".$city."', latuser = '".$latuser."', user_ip='".$REMOTE_ADDR."', user_soft = '".$HTTP_USER_AGENT."', time='".time()."', status = '".$lev0."', year = '".$year."';"))
            {
                $id = mysql_insert_id();
                REG_BONUS($id);
                $msg = "Siz u&#287;urla qeydiyyatdan ke&#231;diniz ve art&#305;q <b>$site</b> &#231;at&#305;n&#305;n bir &#252;zv&#252;s&#252;z!";
                $error = False;
                unset($_SESSION['registration_kapcha']);
            }
            else
            {
                $msg = mysql_error();
            }
        }
        else
        {
            $msg = "Se&#231;mek istediyiniz \"<b>".$user."</b>\" leqebi art&#305;q m&#246;vcuddur, ba&#351;qa leqeb se&#231;in";
        }
    }
    if ($error)
    {
        wmlpage("Xeta!..", $msg."<br/>----<br/><a href=\"reg1.php?". SID ."&amp;$ref\">Geri Qay&#305;t</a>");
    }
    else
    {
    $ac = fopen("file/dat_folder/reg_rand.dat","w+");
    fwrite($ac,0);
    fclose($ac);
        echo $xml;
        echo $dtd;
        echo "<wml>\n";
        echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
        echo "<card id=\"okey\" title=\"Qeyd oldunuz!\">\n";
        echo "<p align=\"left\">\n";
        echo $fsize1;
        echo $msg."<br/>\n";
        echo $divide;
        echo "Sizin Leqeb:\n";
        echo "<b>".$user."</b><br/>\n";
        echo "Sizin ID:\n";
        echo "<b>".$id."</b><br/>\n";
        echo "Sizin &#350;ifre:\n";
        echo "<b>".$pass."</b><br/>";
		echo $divide;
        echo "<a href=\"enter.php?id=$id&amp;ps=". base64_encode($pass) ."&amp;ref=$ref\">&#199;ata Daxil ol</a><br/>\n";
        echo "****<br/><a href=\"http://".$site_url."/?$ref\">".$site."</a>\n";
        echo $fsize2;
        echo "</p></card></wml>\n";
        $tm = time();
        if($sex==0)
        {
            $cinsi = "Bey";
            mysql_query("UPDATE `conf` SET `kisi` = 1+`kisi`, `son` = '".$user."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$tm."'  where `acar` ='1';");
        }
        else
        {
            $cinsi = "Xan&#305;m";
            mysql_query("UPDATE `conf` SET `qadin` = 1+`qadin`, `son` = '".$user."', `qip` = '".$REMOTE_ADDR."', `qsoft` = '".$HTTP_USER_AGENT."', `time` = '".$tm."'  where `acar` ='1';");
        }
        $data = date("d-M-Y [H:i]",mktime(date ("H")+$xsat));
        $kol = rand(0,99999999);
        $time = time();
		
		
	
		
        $topic = "Xo&#351; geldiz $user";
        $message = "Salam <u>$user</u> $cinsi ! <b>$site</b> Sayt&#305;na Xo&#351; geldiz! Vaxt&#305;n&#305;z&#305; Maraql&#305; s&#246;hbetler ederek ke&#231;irmek isteyirsinizse Buyrun Sayt&#305;m&#305;z&#305;n <a href=\"onlayn.php?id=$id&amp;ps=". base64_encode($pass) ."&amp;ref=$ref\">S&#246;hbet otaqlar&#305;na daxil olun</a><br/>\n";
        mysql_query("insert into zapiski values(0,'".$admin."','0','".$message."','".$user."','".$id."','".$time."','0','".$topic."','".$data."','1','1');");
        $rnd = rand(0,99999999);
        $today = date ("H:i",mktime(date ("H")+$xsat));
        $txt = "<u>leqebli istifade&#231;i Yeni Qeyd oldu</u>!";
        mysql_query ("Insert into room2 set klu4= '".$rnd."', time='".$today."', who='".$user."', message='".$txt."', id='".$tm."', towhom='1', hid='0', usid='".$id."'");
    }
}

mysql_close($link);
?>