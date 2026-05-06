<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header ("Content-type:text/vnd.wap.wml; charset=utf-8");

function maketime($string) {
if($string < 3600){
$string = sprintf("%02d:%02d", (int)($string / 60) % 60, $string % 60);
}else{
$string = sprintf("%02d:%02d:%02d", (int)($string / 3600) % 24, (int)($string / 60) % 60, $string % 60);
};
return $string;
};

require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n
<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.1//EN\"
\"http://www.wapforum.org/DTD/wml_1.1.xml\">
<wml>
<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>
<card title=\"Bank Xidmeti\">";
print "<p><small>";
if($id==1){echo '(<a href="bank.php?id='.$id.'&amp;ps='.$ps.'&amp;act=bankdel&amp;ref=$ref">Ballari Sil!!</a>)<br />';}
echo "<img src=\"img/bank.png\" alt=\"\"/><br/>";
if(!empty($id)) 
{
$q = mysql_query("select id,user,pass,bal,level from users where id='".$id."';");
}
else
{
die ($lang['empty_login']."</small></p></card></wml>");
}

$data = mysql_fetch_array($q);

$id=$data['id'];
$user=$data['user'];
$bal=$data['bal'];
$level=$data['level'];

if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = 'index';
}
$config['maxsumbank'] = 10000;

$title = 'Vstavka';


    switch ($act):

case "bankdel":
    IF($id!=1)
    {
        ECHO "Bax Bura olmaz... :))<br/>\n";
        ECHO $divide;
        BREAK;
    }
mysql_query ("TRUNCATE `bank`;");
echo "<b>Bankdaki Ballar Tam Silindi.</b><br/>\n";
echo "----<br/>";
echo "<a href=\"bank.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>";
break;

case "emanet":
echo "<b>Bize G&#252;venenler:</b><br/>----<br/>";
$assassin = mysql_query("SELECT * FROM bank");
$rg++;
while ($arr = mysql_fetch_array($assassin)) {
echo $rg++.") ".$arr["bank_user"]." - Bankda: ".$arr["bank_sum"]." (<b>bal</b>)<br/>";}
echo "----<br/>";
echo "<a href=\"bank.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri qay&#305;t</a><br/>";
break;

    case "index":

        $querybank=mysql_query("SELECT * FROM `bank` WHERE `bank_user`='$user' LIMIT 1;");
        //$databank = $querybank -> fetch();
        $databank=mysql_fetch_assoc($querybank);
       if (!empty($databank)) {


            echo '<b>Bankdak&#305; Hesab&#305;n&#305;z:</b><br />----<br/>';
            echo 'Hesab&#305;nda: <b>'.$bal.'</b> bal var  <br />';
            echo 'Bankda: <b>' .$databank['bank_sum']. '</b> bal var<br /><br />';

            if ($databank['bank_sum'] > $config['maxsumbank']) {
                echo '<b>Diqqet! Sizin chox boyuk meblegde baliniz var</b><br />';
                echo 'Faiz almaq &#252;&#231;&#252;n g&#246;sterilen meble&#287; maximimum g&#246;sterilen meble&#287;den &#231;oxdur ' .$databank['bank_sum'] - $config['maxsumbank'] . '<br />';
            } 

            if ($databank['bank_sum'] > 0 && $databank['bank_sum'] <= $config['maxsumbank']) {
                $stavka = 1;
                if ($databank['bank_sum'] >= 2000) {
                    $stavka = 0.5;
                } 
                if ($databank['bank_sum'] >= 4000) {
                    $stavka = 0.4;
                } 
                if ($databank['bank_sum'] >= 6000) {
                    $stavka = 0.3;
                } 
                if ($databank['bank_sum'] >= 8000) {
                    $stavka = 0.2;
                } 
                if ($databank['bank_sum'] >= 10000) {
                    $stavka = 0.1;
                } 
                $percent = round((($databank['bank_sum'] * $stavka) / 100));

                if ($databank['bank_time'] >= time()) {






                    echo 'Faiz alma&#287;&#305;n&#305;z &#252;&#231;&#252;n qalan vaxt: (<u>'.maketime($databank['bank_time']-time()).'</u>) <br />';
                    echo 'Bank&#305;n size &#246;deyeceyi bal: (<b>' .$percent. '</b> bal)<br /><br />';
                } else {
                    mysql_query("UPDATE `bank` SET `bank_sum`=`bank_sum`+'$percent', `bank_oper`=`bank_oper`+1, `bank_time`='".(time() + 86400)."' WHERE `bank_user`='$user'");

                    echo '<b>Bal u&#287;urla elave edildi. Elde edeceyiniz faiz geliri ' .$percent. ' bal</b><br /><br />';
                } 
            } else {

                  echo 'Hesab&#305;n&#305;zdan faiz almaq &#252;&#231;&#252;n Banka bir vasaitiniz olmal&#305;d&#305;r. En az <b>100</b> bal. Daha &#231;ox <b>' .$config['maxsumbank']. '</b> bal meble&#287;ine qeder icaze verilir.<br /><br />';         
		 } 
        } else {
        echo 'Hesab&#305;nda: '.$bal.' var.<br/>----<br/>';

            echo 'Siz bizim bankda yeni m&#252;&#351;terisiz. Bize ballar&#305;n&#305;z&#305; etibar etmeyinize &#231;ox &#351;ad&#305;q<br />';
            echo '<u>Hal haz&#305;rda sizin hesab aktiv deyil</u>.Aktiv olmas&#305; &#252;&#231;&#252;n Banka bal elave etmek laz&#305;md&#305;rki faiz(%) alasan.<br/>----<br/>';
           }

        echo '<b>Ne&#231;e bal?</b> (max: 100 bal)<br />';

        
		
echo "<input name=\"gold\" maxlength=\"8\" value=\"$row[gold]\" title=\"gold\" emptyok=\"false\"/><br/>\n";		
		
echo "<select name=\"oper\">\n";
echo "<option value=\"2\">Banka Bal Qoy</option>\n";
echo "<option value=\"1\">Bankdan Bal&#305; G&#246;t&#252;r</option>\n";
echo "</select><br/>\n"; 
		
echo "[<anchor title=\"go\">Ok<go href=\"bank.php?id=$id&amp;ps=$ps&amp;act=operacia&amp;ref=$ref\" method=\"post\">\n";		

echo "<postfield name=\"gold\" value=\"$(gold)\"/>\n";
echo "<postfield name=\"oper\" value=\"$(oper)\"/>\n";
echo "</go></anchor>]<br/>----<br/>\n";
        echo 'Maksimum emanet meblegi: <b>' .$config['maxsumbank']. '</b> bal<br/>----<br/>';
        echo 'Faiz derecesi emanetin meble&#287;inden as&#305;l&#305;d&#305;r.<br/>****<br/>';
        echo '&#xbb; 100 den 2000 bala qeder - Qazanc <b>0.5%</b><br/>';
        echo '&#xbb; 4000 baldan &#231;ox - Qazanc <b>0.4%</b><br/>';
        echo '&#xbb; 6000 baldan &#231;ox - Qazanc <b>0.3%</b><br/>';
        echo '&#xbb; 8000 baldan &#231;ox - Qazanc <b>0.2%</b><br/>';
        echo '&#xbb; 10.000 baldan &#231;ox - Qazanc <b>0.2%</b><br/>****<br/>';

        $total=mysql_result(mysql_query("SELECT count(*) FROM `bank`;"),0);

        echo 'Bize G&#252;venenler: (<b>' . $total . '</b>)<br/>----<br/>';
        break;

    case "operacia":

        $gold=$_POST['gold'];
		
		 if ( !preg_match( "!^[0-9]+$!i", $gold ) )
                {
				
			
				
                    echo "<b>Laz&#305;m olan Meble&#287;i Daxil Etmediniz.</b><br/>----<br/>";
				
					
					
                }else{
		
        $oper=$_POST['oper'];

        if ($oper==1) {
            $config['newtitle'] = 'Hesabin &#231;&#305;xar&#305;lmas&#305;';

            if ($gold > 0) {
            $w = mysql_query("select bank_sum from bank where `bank_user`='".$user."' LIMIT 1;");
                $sata = mysql_fetch_array($w);
                $bank_sum=$sata['bank_sum'];

                if (!empty($bank_sum)) {
                    if ($gold <= $bank_sum) {
                       mysql_query("UPDATE `users` SET `bal`=`bal`+'$gold' WHERE `user`='$user'");
                        mysql_query("UPDATE `bank` SET `bank_sum`=`bank_sum`-'$gold', `bank_time`='".(time() + 86400)."' WHERE `bank_user`='$user'");

                        echo 'G&#246;sterilen <b>' .$gold. '</b> bal deyerinde meble&#287; u&#287;urla hesab&#305;n&#305;zdan &#231;&#305;xar&#305;ld&#305;..<br />';
                    } else {
                        echo '<b>Xeta!</b><br/>Hesab&#305;n&#305;zda olan meble&#287;den &#231;ox bal &#231;&#305;xarda bilmersiz!<br/>';
                    } 
                } else {
                    echo '<b>Xeta!</b><br/>Hesab&#305;n&#305;zdan pul &#231;&#305;xarda bilmersiz.&#199;&#252;nki sizin bankda hesab&#305;n&#305;z yoxdur!<br/>';
                } 
            } else {
                echo '<b>Xeta!</b><br/>Laz&#305;m olan meble&#287;i daxil etmelisiniz!<br/>';
            } 
        } 

        if ($oper==2) {
            $config['newtitle'] = 'Netice';

            if ($gold > 0) {
                if ($gold <= $bal) {
                    mysql_query("UPDATE `users` SET `bal`=`bal`-'$gold' WHERE `user`='$user'");

                    $querybank=mysql_fetch_array(mysql_query("SELECT `bank_id` FROM `bank` WHERE `bank_user`='$user' LIMIT 1"));
                    if (!empty($querybank)) {

                        mysql_query("UPDATE `bank` SET `bank_sum`=`bank_sum`+'$gold',`bank_time`='".(time() + 86400)."' WHERE `bank_user` = '$user' ");

                   }
                   else
                   {
                        mysql_query("INSERT INTO `bank` (`bank_user`, `bank_sum`, `bank_time`) VALUES ('$user', '$gold', '".(time() + 86400)."')");
                    }


                    echo '<b>' .$gold. '</b> bal deyerinde meble&#287; bank hesab&#305;n&#305;za u&#287;urla elave edildi.<br />';
                    mysql_query ("Update `users` set `stat`='0.03'+`stat` where `id` ='".$id."';");

					echo 'Emanetden alacag&#305;n&#305;z faizi <b>24</b> saatdan tez g&#246;t&#252;re bilmersiz.<br /><br />';
                } else {
                    echo 'D&#252;zg&#252;n yaz&#305;lmayan meble&#287;, bu meble&#287; sizin cibinizde yoxdur.<br/>';
                } 
            } else {
                echo 'Laz&#305;m olan meble&#287;i daxil etmelisiniz!';
            } 
        }
		}

        echo '<a href="bank.php?id='.$id.'&amp;ps='.$ps.'">Geri Qay&#305;t</a><br />';
        break;

    default:
        header("location: bank.php?id=$id&amp;pass=$pass");
        exit;
        endswitch;

echo '<a href="bank.php?id='.$id.'&amp;ps='.$ps.'&amp;act=emanet&amp;ref=$ref">Emanet&#231;iler</a><br />';
echo '<a href="enter.php?id='.$id.'&amp;ps='.$ps.'">Dehliz</a><br />';



mysql_close();

print "</small>
</p>
</card>
</wml>";
?> 
