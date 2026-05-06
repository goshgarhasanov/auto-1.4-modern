<?php

if ($_AUTO['time'] != '0') {
	$SERVER_TIME = time() + $_AUTO['time'];
}
else {
	$SERVER_TIME = time();
}

function optimize(){
global $SERVER_TIME;
}
optimize();

require(DOCUMENT_ROOT.'file/dat_folder/show_foto.inc');
include(DOCUMENT_ROOT.'file/require/data.inc');
$gun=date("j");
if($update[gun] != $gun and $footo[aktiv] == '1') {

$file = (DOCUMENT_ROOT.'file/require/data.inc');
@require "$file";
$gun=date("j");
$fpp = fopen($file, 'w');
$data .= '<?php //time '."\n";
$data .= '$update = array('."\n";
$data .= '    "gun" => "'.$gun.'",'."\n";
$data .= ');'."\n";
$data .= '?>';
fputs($fpp, $data);
@chmod(DOCUMENT_ROOT.'file/require/data.inc', 0666);
$currdate = date( 'd-m-Y' , strtotime( "-1 day" ) );
$resu = @mysql_query( "Select id,idfoto,vote from show_foto where date = '".$currdate."' order by vote desc limit 0,1;" );
 while ( $raa = mysql_fetch_array( $resu ) ) {
        $idfoto = $raa["idfoto"];
        $vote = $raa["vote"];
        $qus = mysql_query( "Select `user` from `users` where `id` = '".$idfoto ."'" );
        if ( mysql_affected_rows() != 0 ) {
            $ind = mysql_fetch_array( $qus );
            $u_foto = $ind["user"];
            $i_foto = $ind["id"];
            $ggalery = mysql_query( "select sum(vote) as num from show_foto where date ='".$currdate."';" );
#--------------------------------
            $foto = mysql_fetch_array( $ggalery );
            $num = $foto["num"];
#---------------------------------
            $show_qalib = $num / 2;
            mysql_query( "update users set `bal`=`bal`+'" . $show_qalib . "' where id = '" . $idfoto . "';" );
            $foto_metin = "Hormetli <b>" . $u_foto . "</b> siz <b>&#350;ekil Yari&#351;masinda</b> <b>$vote</b> sesle <b>1-ci</b> yere cixdiqiniz ucun <b>$show_qalib</b> bal qazandiz!";
            mysql_query( "insert into zapiski values(0,'&#350;ekil &#350;ou','0','" . $foto_metin . "','" . $u_foto . "','" . $idfoto . "','" . time() . "','0','&#350;ekil &#350;ou','" . date( "d-M-Y [H:i]" , mktime( date( "H" ) + $xsat ) ) . "','1','1');" );
// admin sms
            $foooo_metin = "Hormetli Admin &#350;ekil yari&#351;masinda <b>$u_foto</b> niki $vote sesle 1-ci yere &#231;ixdi ve <b>$show_qalib</b> bal qazandiz!";
            mysql_query( "insert into zapiski values(0,'&#350;ekil &#350;ou','0','" . $foooo_metin . "','ADMIN','1','" . time() . "','0','&#350;ekil &#350;ou','" . date( "d-M-Y [H:i]" , mktime( date( "H" ) + $xsat ) ) . "','1','1');" );

            @MYSQL_QUERY( "TRUNCATE TABLE show_fikir" );
            @MYSQL_QUERY( "TRUNCATE TABLE show_ses" );
        }
    }
}


////sifirlama gundelik
$today = @file(DOCUMENT_ROOT."file/dat_folder/today.dat");
$bugun = trim($today[0]);
if($bugun!=date("d")) {
#-------------------------------------------------------------------
$file = DOCUMENT_ROOT."file/dat_folder/audio.inc";
require($file);

if($audio['number_1'] > 0){
$number_1 = $SERVER_TIME - ($audio['number_1'] * $audio['number_2']);
$query = mysql_query("SELECT * FROM `mesaj` WHERE `readd`='1' AND `type`='1' AND `photo`!='NULL' AND `time`<'{$number_1}';");
if(mysql_affected_rows() > 0){
while($object = mysql_fetch_object($query)){
$file = "audio/{$object->idwho}/{$object->photo}";
if(file_exists($file)){
$unlink = unlink($file);
}
$delete = mysql_query("DELETE FROM `mesaj` WHERE `klu4`='{$object->klu4}'");
}
}
}

if($audio['number_3'] > 0){
$number_2 = $SERVER_TIME - ($audio['number_3'] * $audio['number_4']);
$query = mysql_query("SELECT * FROM `mesaj` WHERE `type`='1' AND `photo`!='NULL' AND `time`<'{$number_2}';");
if(mysql_affected_rows() > 0){
while($object = mysql_fetch_object($query)){
$file = "audio/{$object->idwho}/{$object->photo}";
if(file_exists($file)){
$unlink = unlink($file);
}
$delete = mysql_query("DELETE FROM `mesaj` WHERE `klu4`='{$object->klu4}'");
}
}
}
#-------------------------------------------------------------------	

////sifirlama hefte
if(date('w',$SERVER_TIME)==1)			{
$tables1 = $tables2 = '';
mysql_query("UPDATE `users` SET `time_active1` = '0';");
$tables1="`time_active1` = `time_active1`+`time_active`, ";
}

			
$tables2="`time_active2` = `time_active2`+`time_active`, ";			
$tables1="`time_active1` = `time_active1`+`time_active`, ";
mysql_query("UPDATE `users` SET  ".$tables1.$tables2." `time_active` = '0';");

mysql_query ("update `users` set `xal` = '0',  `ses`='0', `nnposts`='0', `vanket`='0', `stsonline` = '',  `infostat` = '', `fr_limit` = '0';");
mysql_query ("TRUNCATE `viewanket`;");
mysql_query ("TRUNCATE `d_teklif`;");
mysql_query ("TRUNCATE `reytinq`;");
mysql_query ("TRUNCATE `status_beyen`;");
mysql_query ("TRUNCATE `status_fikir`;");
mysql_query ("TRUNCATE `foto_beyen`;");
mysql_query ("TRUNCATE `foto_fikir`;");
mysql_query ("TRUNCATE `capchat`;");




$dat = file( "file/dat_folder/enter.dat" );
    $test1 = trim( $dat[0] );
    $test2 = trim( $dat[1] );
    $test3 = trim( $dat[2] );
    $test7 = trim( $dat[6] );
    $test8 = trim( $dat[7] );
    $test9 = trim( $dat[8] );
    $test10 = trim( $dat[9] );
    $test11 = trim( $dat[10] );
    $test12 = trim( $dat[11] );
    $file = fopen( "file/dat_folder/enter.dat", "w" );
    $data = "{$test1}\n";
    $data .= "{$test2}\n";
    $data .= "{$test3}\n";
    $data .= "\n";
    $data .= "\n";
    $data .= "\n";
    $data .= "{$test7}\n";
    $data .= "{$test8}\n";
    $data .= "{$test9}\n";
    $data .= "{$test10}\n";
    $data .= "{$test11}\n";
    $data .= "{$test12}";
    fwrite( $file, $data );
    fclose( $file );
    $reytime = 86400 * $datgun + time( );
    $file = fopen( "file/dat_folder/reytinq.dat", "w" );
    $data = "{$reytinq}\n";
    $data .= "{$reytime}\n";
    $data .= "{$datgun}";
    fwrite( $file, $data );
    fclose( $file );
    mysql_query( "delete from reytinq" );
    mysql_query( "Update users set ses='0' where ses!='0'" );
    @file_put_contents( @$PUBLICHTML_URL."file/dat_folder/top_reytinq_users.php", "" );

@$saxla = @fopen(DOCUMENT_ROOT."file/dat_folder/today.dat", "w+");
@fwrite(@$saxla, @date("d"));
@fflush(@$saxla);
@fclose(@$saxla);
@chmod(DOCUMENT_ROOT."file/dat_folder/today.dat", 0666);}


///son buga

$q = mysql_query("SELECT * FROM nihad_panel WHERE usid='{$row['id']}'");
if ($inf = mysql_fetch_object($q)) {
	if (empty($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != $inf->login) || ($_SERVER['PHP_AUTH_PW'] != $inf->pass)) {
		header('WWW-Authenticate: Basic realm="Security Parol"');
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}
}

if (base64_decode($ps) == $row['pass']) {
	mysql_query('Update `users` set `pass`=\'' . base64_encode($row['pass']) . '\'  WHERE `id` = \'' . $id . '\';');
}


foreach ($_POST as $p_keys => $p_vals) {
	if (strpos($p_keys, ':ref')) {
		$_key_name = substr($p_keys, 0, 7);

		if ($_key_name == 'message') {
			$_POST['message'] = $message = $p_vals;
		}
	}

}



$SCRIPT_NAME = basename($_SERVER['SCRIPT_NAME']);
$redial_panel = false;

if ((getmicrotime() - $row['time']) <= '1') {
	if (@file_exists(DOCUMENT_ROOT . 'file/dat_folder/ref_forum/ipn_' . $id . '.log')) {
		$select_dat_attack = @file(DOCUMENT_ROOT . 'file/dat_folder/ref_forum/ipn_' . $id . '.log');
		$select_dat_count = trim($select_dat_attack['0']);
		$select_dat_time = trim($select_dat_attack['1']);

		if (($SERVER_TIME + 25) < $select_dat_time) {
			$select_dat_count = '0';
			$select_dat_time = $SERVER_TIME;
		}


		if ((15 <= $select_dat_count) && (($SERVER_TIME - 22) < $select_dat_time)) {
			header('Content-Type:text/html; charset=UTF-8');
			echo '<center>Anti-DDOS Attack.</center> <br> <a href="license.php">License</a>';
			exit();
		}
		else if ('15' <= $select_dat_count) {
			$select_dat_count = '0';
			$select_dat_time = $SERVER_TIME;
		}

	}
	else {
		$select_dat_count = '0';
		$select_dat_time = $SERVER_TIME;
	}

	$select_dat_count = $select_dat_count + 1;
	file_put_contents(DOCUMENT_ROOT . 'file/dat_folder/ref_forum/ipn_' . $id . '.log', $select_dat_count . "\n" . $select_dat_time);
}


$OPERATOR = trim($A_OPERA['0']);
$REMOTE_MAX = trim($A_OPERA['1']);
$ARR_BORWSER = '';

if($OPERATOR!='NULL') {
$ARR_BORWSER = "and `soft` = '".$HTTP_USER_AGENT."'";
}


if (trim($SCRIPT_NAME) != 'session.php') {
	
	if($row["level"]<5){
		$brawserban = mysql_query ("Select `soft` from `bannlist` WHERE `ip` = '".$REMOTE_MAX."' ".$ARR_BORWSER.";");
		if (mysql_affected_rows()!=0) {
			header("Location: session.php?id=$id&ps=$ps&ref=$ref");
			exit;
		}
	}


function user_ban_list(){
global $id, $ps, $inf, $SERVER_TIME, $ref, $p_arr, $rm;
if($rm!='' and $rm<=10)$room_id = "&amp;rm=$rm"; else $room_id = false;
if($p_arr['92']!=1 and $p_arr['170']!=1 and $p_arr['228']!=1 and $p_arr['231']!=1 and $p_arr['235']!=1){
return;
}
if($inf['kik']>$SERVER_TIME and $p_arr['170']=='1'){
echo 'Bu istifadeci vaxt ile <u>'.$inf['whokik'].'</u> terefinden xarc olunub.<br/>';
if($inf['whykik']!='')echo '<b>Sebeb</b>: '.$inf['whykik'].'<br/>';
echo 'Vaxtının bitmesine '.qaliq($inf['kik']).' qalıb.';
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=1&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';
}

if($inf['banned']=='1' and $p_arr['228']=='1'){
echo 'Bu istifadeci <u>'.$inf['whokik'].'</u> terefinden BAN edilib.';
if($inf['whykik']!='')echo '<br/><b>Sebeb</b>: '.$inf['whykik'];
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=2&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';
}elseif($inf['banned']=='2' and $p_arr['235']=='1'){
echo 'Bu istifadeci <u>'.$inf['whokik'].'</u> terefinden Bazadan silinib.';
if($inf['whykik']!='')echo '<br/><b>Sebeb</b>: '.$inf['whykik'];
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=3&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';
}

if($inf['inv']=='2' and $p_arr['92']=='1'){
echo 'Bu istifadeci <u>'.$inf['whokik'].'</u> terefinden Tam iqnor edilib.';
if($inf['whykik']!='')echo '<br/><b>Sebeb</b>: '.$inf['whykik'];
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=4&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';
}

if($p_arr['231']=='1'){
$A_OPERA_USER = OPERATOR($inf["user_ip"]);
$OPERATOR_USER = trim($A_OPERA_USER['0']);
$REMOTE_MAX_USER = trim($A_OPERA_USER['1']);
if($OPERATOR_USER=='NULL'){
$banned = mysql_query ("Select `user`,`moder`,`sebeb` from `bannlist` WHERE (`ip` = '".$inf["user_ip"]."')and(`soft` = 'IP-BAN');");
if(mysql_affected_rows()!=0) {
$iban = @mysql_fetch_array($banned);
$sebebkar = $iban['user'];
$muellif = $iban['moder'];
$sebeb = $iban['sebeb'];

if($sebebkar==$inf['user'])
echo 'Bu istifadecini <u>'.$inf['whokik'].'</u> IP Adresini BAN edib.';
else
echo 'Bu istifadeci IP Adres uzre BAN edilib. Sebebkar '.$sebebkar.'';
if($sebeb!='')echo '<br/><b>Sebeb</b>: '.$sebeb;
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=5&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';

}
}else{
$banned = mysql_query ("Select `user`,`moder`,`sebeb` from `bannlist` WHERE (`ip` = '".$REMOTE_MAX_USER."')and(`soft` = '".$inf["user_soft"]."');");
if(mysql_affected_rows()!=0) {
$iban = @mysql_fetch_array($banned);
$sebebkar = $iban['user'];
$muellif = $iban['moder'];
$sebeb = $iban['sebeb'];

if($sebebkar==$inf['user'])
echo 'Bu istifadecini <u>'.$inf['whokik'].'</u> Telefon Modeli uzre BAN edib.';
else
echo 'Bu istifadeci Telefon Modeli uzre BAN edilib. Sebebkar '.$sebebkar.'';
if($sebeb!='')echo '<br/><b>Sebeb</b>: '.$sebeb;
echo " [<a href=\"access.php?id=$id&amp;ps=$ps$room_id&amp;nk=$inf[id]&amp;b=5&amp;ref=$ref\">x</a>]\n";
echo '<br/>----<br/>';
}
}
}
return;
}

if (($row['banned']!='0')or($row['con']!='0')or($SERVER_TIME<$row['kik']))
{
	header ("Location: session.php?id=$id&ps=$ps&ref=$ref");
	exit;
}




if($SERVER_TIME>($row['ontime']+240))
{
	mysql_query("UPDATE `users` SET `ontime` = '".$SERVER_TIME."', `time` = '".$SERVER_TIME."' WHERE `id` = '".$id."';");
	$redial_panel = '1';
}
else
{
	$update_rand_time = false;
	if(date('Hi',$SERVER_TIME) >= $_AUTO['reftime'])
	{
		if(@file_exists(DOCUMENT_ROOT."file/log/stoped"))
		{
			$select_dat_time = @file(DOCUMENT_ROOT."file/log/stoped");
			$select_dat_time = trim($select_dat_time['0']);
		}
		else 
		{
			$select_dat_time = '8';
		}

		if($select_dat_time!=date('w',$SERVER_TIME))
		{
			@file_put_contents(DOCUMENT_ROOT.'file/log/stoped', date('w',$SERVER_TIME))or die('<b>ERROR CHMOD 777</b>: '.DOCUMENT_ROOT.'file/log/stoped');
			$tables1 = $tables2 = '';
			if(date('d',($SERVER_TIME+86400))=='01')
			{
				if(@file_exists(DOCUMENT_ROOT."file/dat_folder/top_active.dat"))
				{
					$dat_top = @file(DOCUMENT_ROOT."file/dat_folder/top_active.dat");
					$all_users_top = trim($dat_top['0']);
					if($all_users_top>='1')
					{
						$r_i = 1;
						$select_db_top_reytinq = mysql_query("select `id`,`user`,`bal`,`time_active2` from `users` order by `time_active2` desc limit ".$all_users_top.";");
						while($arr_top=mysql_fetch_array($select_db_top_reytinq))
						{
							$users_arr_bal = trim($dat_top[$r_i]);
							$message = 'Hormetli '.$arr_top['user'].' Siz bu ay Aktivlik reytinqinde '.$r_i.' yere c?xd?q?n?z ucun '.$users_arr_bal.' bal hediyye qazand?n?z. Tebrikler';
							mysql_query("Insert into `zapiski` set `who` ='".$_AUTO['admin']."', `idwho` ='0', `message` = '".$message."', `towhom` = '".$arr_top['user']."', `idtowhom` = '".$arr_top['id']."', `time` = '".$SERVER_TIME."', `topic` = 'Qalib olduz!';");
							$users_arr_bal = $users_arr_bal+$arr_top['bal'];
							$r_i++;
							mysql_query("UPDATE `users` SET `bal` = '".$users_arr_bal."' WHERE `id` = '".$arr_top['id']."' LIMIT 1;");
						}
					}
				}
				mysql_query("UPDATE `users` SET `time_active2` = '0' WHERE `time_active2` > '0';");
			}
			else
			{
				$tables2="`time_active2` = `time_active2`+`time_active`, ";
			}
			
			if(date('w',$SERVER_TIME)==1)
			{
				mysql_query("UPDATE `users` SET `time_active` = '0', `time_active1` = '0';");
			}
			else
			{
				$tables1="`time_active1` = `time_active1`+`time_active`, ";
			}
			mysql_query("UPDATE `users` SET  ".$tables1.$tables2." `time_active` = '0';");
			
		}
	}
	elseif (($SERVER_TIME - $row['ontime']) >= '60')
	{
		if($row['st_bal_count']!='0')
		{
			$st_bal_time_update_2 = ", `st_bal_time`='".($row['st_bal_time']+1)."'";
			$row['st_bal_time'] = ($row['st_bal_time']+1);
		}
		else
		{
			$st_bal_time_update_2 ='';
		}
		$update_rand_time = ", `ontime` = '".$SERVER_TIME."', `time_active` = `time_active`+'".($SERVER_TIME-$row['ontime'])."' ".$st_bal_time_update_2;
	}
	
	mysql_query("UPDATE `users` SET  `time` = '".$SERVER_TIME."' ".$update_rand_time." WHERE `id` = '".$id."';");
}



if($redial_panel == '1')
{
		if(file_exists(DOCUMENT_ROOT.'file/select/'.$id.'.php'))
		{
			if($row['panel']!='1')
			{
				mysql_query("update `users` set `panel` = '1' where `id`='".$id."';");
			}
			@include(DOCUMENT_ROOT.'file/select/'.$id.'.php');
		}
		elseif($row['level']>='4')
		{
			if($row['panel']!='2')
			{
				mysql_query("update `users` set `panel` = '2' where `id`='".$id."';");
			}
			@include(DOCUMENT_ROOT.'file/level/'.$row['level'].'.php');
		}
		else
		{
			$p_arr = array('0' => '0','1' => '0','2' => '0','3' => '0','4' => '0','5' => '0','6' => '0','7' => '0','8' => '0','9' => '0','10' => '0','11' => '0','12' => '0','13' => '0','14' => '0','15' => '0','16' => '0','17' => '0','18' => '0','19' => '0','20' => '0','21' => '0','22' => '0','23' => '0','24' => '0','25' => '0','26' => '0','27' => '0','28' => '0','29' => '0','30' => '0','31' => '0','32' => '0','33' => '0','34' => '0','35' => '0','36' => '0','37' => '0','38' => '0','39' => '0','40' => '0','41' => '0','42' => '0','43' => '0','44' => '0','45' => '0','46' => '0','47' => '0','48' => '0','49' => '0','50' => '0','51' => '0','52' => '0','53' => '0','54' => '0','55' => '0','56' => '0','57' => '0','58' => '0','59' => '0','60' => '0','61' => '0','62' => '0','63' => '0','64' => '0','65' => '0','66' => '0','67' => '0','68' => '0','69' => '0','70' => '0','71' => '0','72' => '0','73' => '0','74' => '0','75' => '0','76' => '0','77' => '0','78' => '0','79' => '0','80' => '0','81' => '0','82' => '0','83' => '0','84' => '0','85' => '0','86' => '0','87' => '0','88' => '0','89' => '0','90' => '0','91' => '0','92' => '0','93' => '0','94' => '0','95' => '0','96' => '0','97' => '0','98' => '0','99' => '0','100' => '0','101' => '0','102' => '0','103' => '0','104' => '0','105' => '0','106' => '0','107' => '0','108' => '0','109' => '0','110' => '0','111' => '0','112' => '0','113' => '0','114' => '0','115' => '0','116' => '0','117' => '0','118' => '0','119' => '0','120' => '0','121' => '0','122' => '0','123' => '0','124' => '0','125' => '0','126' => '0','127' => '0','128' => '0','129' => '0','130' => '0','131' => '0','132' => '0','133' => '0','134' => '0','135' => '0','136' => '0','137' => '0','138' => '0','139' => '0','140' => '0','141' => '0','142' => '0','143' => '0','144' => '0','145' => '0','146' => '0','147' => '0','148' => '0','149' => '0','150' => '0','151' => '0','152' => '0','153' => '0','154' => '0','155' => '0','156' => '0','157' => '0','158' => '0','159' => '0','160' => '0','161' => '0','162' => '0','163' => '0','164' => '0','165' => '0','166' => '0','167' => '0','168' => '0','169' => '0','170' => '0','171' => '0','172' => '0','173' => '0','174' => '0','175' => '0','176' => '0','177' => '0','178' => '0','179' => '0','180' => '0','181' => '0','182' => '0','183' => '0','184' => '0','185' => '0','186' => '0','187' => '0','188' => '0','189' => '0','190' => '0','191' => '0','192' => '0','193' => '0','194' => '0','195' => '0','196' => '0','197' => '0','198' => '0','199' => '0','200' => '0','201' => '0','202' => '0','203' => '0','204' => '0','205' => '0','206' => '0','207' => '0','208' => '0','209' => '0','210' => '0','211' => '0','212' => '0','213' => '0','214' => '0','215' => '0','216' => '0','217' => '0','218' => '0','219' => '0','220' => '0','221' => '0','222' => '0','223' => '0','224' => '0','225' => '0','226' => '0','227' => '0','228' => '0','229' => '0','230' => '0','231' => '0','232' => '0','233' => '0','234' => '0','235' => '0','236' => '0','237' => '0','238' => '0','239' => '0','240' => '0','241' => '0','242' => '0','243' => '0','244' => '0','245' => '0','246' => '0','247' => '0','248' => '0','249' => '0','250' => '0');
		}
}
else
{
	if($row['panel']=='1')
	{
		@include(DOCUMENT_ROOT.'file/select/'.$id.'.php');
	}
	elseif($row['panel']=='2')
	{
		@include(DOCUMENT_ROOT.'file/level/'.$row['level'].'.php');
	}
	else
	{
		$p_arr = array('0' => '0','1' => '0','2' => '0','3' => '0','4' => '0','5' => '0','6' => '0','7' => '0','8' => '0','9' => '0','10' => '0','11' => '0','12' => '0','13' => '0','14' => '0','15' => '0','16' => '0','17' => '0','18' => '0','19' => '0','20' => '0','21' => '0','22' => '0','23' => '0','24' => '0','25' => '0','26' => '0','27' => '0','28' => '0','29' => '0','30' => '0','31' => '0','32' => '0','33' => '0','34' => '0','35' => '0','36' => '0','37' => '0','38' => '0','39' => '0','40' => '0','41' => '0','42' => '0','43' => '0','44' => '0','45' => '0','46' => '0','47' => '0','48' => '0','49' => '0','50' => '0','51' => '0','52' => '0','53' => '0','54' => '0','55' => '0','56' => '0','57' => '0','58' => '0','59' => '0','60' => '0','61' => '0','62' => '0','63' => '0','64' => '0','65' => '0','66' => '0','67' => '0','68' => '0','69' => '0','70' => '0','71' => '0','72' => '0','73' => '0','74' => '0','75' => '0','76' => '0','77' => '0','78' => '0','79' => '0','80' => '0','81' => '0','82' => '0','83' => '0','84' => '0','85' => '0','86' => '0','87' => '0','88' => '0','89' => '0','90' => '0','91' => '0','92' => '0','93' => '0','94' => '0','95' => '0','96' => '0','97' => '0','98' => '0','99' => '0','100' => '0','101' => '0','102' => '0','103' => '0','104' => '0','105' => '0','106' => '0','107' => '0','108' => '0','109' => '0','110' => '0','111' => '0','112' => '0','113' => '0','114' => '0','115' => '0','116' => '0','117' => '0','118' => '0','119' => '0','120' => '0','121' => '0','122' => '0','123' => '0','124' => '0','125' => '0','126' => '0','127' => '0','128' => '0','129' => '0','130' => '0','131' => '0','132' => '0','133' => '0','134' => '0','135' => '0','136' => '0','137' => '0','138' => '0','139' => '0','140' => '0','141' => '0','142' => '0','143' => '0','144' => '0','145' => '0','146' => '0','147' => '0','148' => '0','149' => '0','150' => '0','151' => '0','152' => '0','153' => '0','154' => '0','155' => '0','156' => '0','157' => '0','158' => '0','159' => '0','160' => '0','161' => '0','162' => '0','163' => '0','164' => '0','165' => '0','166' => '0','167' => '0','168' => '0','169' => '0','170' => '0','171' => '0','172' => '0','173' => '0','174' => '0','175' => '0','176' => '0','177' => '0','178' => '0','179' => '0','180' => '0','181' => '0','182' => '0','183' => '0','184' => '0','185' => '0','186' => '0','187' => '0','188' => '0','189' => '0','190' => '0','191' => '0','192' => '0','193' => '0','194' => '0','195' => '0','196' => '0','197' => '0','198' => '0','199' => '0','200' => '0','201' => '0','202' => '0','203' => '0','204' => '0','205' => '0','206' => '0','207' => '0','208' => '0','209' => '0','210' => '0','211' => '0','212' => '0','213' => '0','214' => '0','215' => '0','216' => '0','217' => '0','218' => '0','219' => '0','220' => '0','221' => '0','222' => '0','223' => '0','224' => '0','225' => '0','226' => '0','227' => '0','228' => '0','229' => '0','230' => '0','231' => '0','232' => '0','233' => '0','234' => '0','235' => '0','236' => '0','237' => '0','238' => '0','239' => '0','240' => '0','241' => '0','242' => '0','243' => '0','244' => '0','245' => '0','246' => '0','247' => '0','248' => '0','249' => '0','250' => '0');
	}
}


if($p_arr['0']=='0')
{
	$p_arr['5'] = $p_arr['7']=$p_arr['8']= $p_arr['9']= $p_arr['10']= $p_arr['11']= $p_arr['12']= $p_arr['13']= $p_arr['14']= $p_arr['15']= $p_arr['16']= $p_arr['17']= $p_arr['18']= $p_arr['19']= $p_arr['20']= $p_arr['21']= $p_arr['22']= $p_arr['23']= $p_arr['24']= $p_arr['25']= $p_arr['26']= $p_arr['27']= $p_arr['28']= $p_arr['29']= $p_arr['30']= $p_arr['31']= $p_arr['32']= $p_arr['33']= $p_arr['34']= $p_arr['35']= $p_arr['36']= $p_arr['37']= $p_arr['38']= $p_arr['39']= $p_arr['40']= $p_arr['41']= $p_arr['42']= $p_arr['43']= $p_arr['44']= $p_arr['45'] = '0';
}

if($p_arr['1']=='0')
{
	$p_arr['81'] = $p_arr['82']=$p_arr['83']= $p_arr['84']= $p_arr['85']= $p_arr['86']= $p_arr['87']= $p_arr['88']='0';
}

if($p_arr['2']=='0')
{
	$p_arr['50']=$p_arr['51']=$p_arr['52']=$p_arr['53']=$p_arr['54']=$p_arr['55']=$p_arr['56']=$p_arr['57']=$p_arr['58']=$p_arr['59']=$p_arr['60']=$p_arr['61']=$p_arr['62']=$p_arr['63']=$p_arr['64']='0';
}

if($p_arr['3']=='0')
{
	$p_arr['70']=$p_arr['71']=$p_arr['72']=$p_arr['73']=$p_arr['74']=$p_arr['75']=$p_arr['76']=$p_arr['77']=$p_arr['78']=$p_arr['79']=$p_arr['80']='0';
}

if($p_arr['4']=='0')
{
	$p_arr['200']=$p_arr['201']=$p_arr['202']=$p_arr['203']=$p_arr['204']='0';
}

if($p_arr['32']=='0')
{
	$p_arr['97']=$p_arr['98']=$p_arr['99']='0';
}

if($p_arr['34']=='0')
{
	$p_arr['100']=$p_arr['101']=$p_arr['102']='0';
}

if($p_arr['35']=='0')
{
	$p_arr['105']=$p_arr['106']=$p_arr['107']='0';
}

if($p_arr['39']=='0')
{
	$p_arr['120']=$p_arr['121']=$p_arr['122']=$p_arr['123']=$p_arr['124']=$p_arr['125']=$p_arr['126']=$p_arr['127']=$p_arr['128']=$p_arr['129']=$p_arr['130']=$p_arr['131']=$p_arr['132']=$p_arr['133']=$p_arr['134']='0';
}

if($p_arr['40']=='0')
{
	$p_arr['140']=$p_arr['141']=$p_arr['142']=$p_arr['143']=$p_arr['144']=$p_arr['145']=$p_arr['146']='0';
}

if($p_arr['41']=='0')
{
	$p_arr['150']=$p_arr['151']=$p_arr['152']='0';
}

if($p_arr['42']=='0')
{
	$p_arr['155']='0';
}

if($p_arr['81']=='0')
{
	$p_arr['170']=$p_arr['171']=$p_arr['172']=$p_arr['173']=$p_arr['174']=$p_arr['175']=$p_arr['176']=$p_arr['177']=$p_arr['178']=$p_arr['179']=$p_arr['180']=$p_arr['181']=$p_arr['182']=$p_arr['183']=$p_arr['184']=$p_arr['184']=$p_arr['185']=$p_arr['186']=$p_arr['187']=$p_arr['188']=$p_arr['189']=$p_arr['190']='0';
}

if($p_arr['170']=='0')
{
	$p_arr['237']=$p_arr['238']='0';
}
if($p_arr['82']=='0')
{
	$p_arr['225']='0';
}

if($p_arr['83']=='0')
{
	$p_arr['92']='0';
}

if($p_arr['84']=='0')
{
	$p_arr['226']=$p_arr['227']=$p_arr['228']='0';
}

if($p_arr['85']=='0')
{
	$p_arr['229']=$p_arr['230']=$p_arr['231']='0';
}

if($p_arr['87']=='0')
{
	$p_arr['233']=$p_arr['234']=$p_arr['235']='0';
}

if($p_arr['63']=='0')
{
	$p_arr['214']=$p_arr['215']=$p_arr['216']=$p_arr['217']=$p_arr['218']=$p_arr['219']=$p_arr['220']=$p_arr['221']=$p_arr['222']=$p_arr['223']='0';
}

if($p_arr['200']=='0')
{
	$p_arr['210']=$p_arr['211']=$p_arr['212']=$p_arr['213']='0';
}

if($p_arr['203']=='0')
{
	$p_arr['236']='0';
}


function exit_time($time)
{
global $_AUTO;
$time = $time + $_AUTO['ofline'];
return $time;
}

if($_GET['message']!='' or $_POST['message']!='') {
$message = ( isset($_POST['message']) ) ? $_POST['message'] : $_GET['message'];
$message = chkdsk($message,basename($_SERVER['SCRIPT_NAME']));
}
if($_GET['msg']!='' or $_POST['msg']!='') {
$msg = ( isset($_POST['msg']) ) ? $_POST['msg'] : $_GET['msg'];
$msg = chkdsk($msg,basename($_SERVER['SCRIPT_NAME']));
}

}


$adm = @mysql_query('Select user from users where id=\'7\' LIMIT 1;');
$meqa = @mysql_fetch_array($adm);
$administration = $meqa['user'];


$meqa_sql = mysql_query('SELECT `id`,`user` FROM `users` WHERE `meqa_time`!= \'0\' and `meqa_time` < ' . time() . ';');
while ($zn_users = mysql_fetch_array($meqa_sql)) {
	mysql_query('UPDATE `users` SET `meqa` = \'\', meqa_time = \'0\' WHERE `id` = \'' . $zn_users['id'] . '\';');
	$rnd = rand(0, 99999999);
	$metn = 'Hormetli <b>' . $zn_users['user'] . '</b> Aldiginiz Meqa Nikin Muddeti Bitdi...';
	mysql_query('INSERT INTO `zapiski` SET `idtowhom` = \'' . $zn_users['id'] . '\',`towhom` = \'' . $zn_users['user'] . '\',`idwho` = \'7\',`time` = \'' . time() . '\',`who` = \'' . $administration . '\',`date` = \'' . date('H:i - d.m.y') . '\',`readd` = \'0\',`topic` = \'Meqa Nik Muddet\',`message` = \'' . $metn . '\';');
}


$zn_sql = mysql_query('SELECT `id`,`user` FROM `users` WHERE `zn_time`!= \'0\' and `zn_time` < ' . time() . ';');
while ($zn_users = mysql_fetch_array($zn_sql)) {
	mysql_query('UPDATE `users` SET `zn` = \'\', zn_time = \'0\' WHERE `id` = \'' . $zn_users['id'] . '\';');
	$rnd = rand(0, 99999999);
	$metn = 'Hormetli <b>' . $zn_users['user'] . '</b> Aldiginiz Znakin Muddeti Bitdi...';
	mysql_query('INSERT INTO `zapiski` SET `idtowhom` = \'' . $zn_users['id'] . '\',`towhom` = \'' . $zn_users['user'] . '\',`idwho` = \'7\',`time` = \'' . time() . '\',`who` = \'' . $administration . '\',`date` = \'' . date('H:i - d.m.y') . '\',`readd` = \'0\',`topic` = \'Znak Muddet\',`message` = \'' . $metn . '\';');
}

$rn_sql = mysql_query('SELECT `id`,`user` FROM `users` WHERE `rn_time`!= \'0\' and `rn_nik`!= \'0\'  and `rn_time` < ' . time() . ';');
while ($rn_users = mysql_fetch_array($rn_sql)) {
	mysql_query('UPDATE `users` SET `rn_time` = \'0\', rn_nik = \'0\' WHERE `id` = \'' . $rn_users['id'] . '\';');
	unlink('i/' . $rn_users['id'] . '.gif');
	$rnd = rand(0, 99999999);
	$metn = 'Hormetli <b>' . $rn_users['user'] . '</b>. Aldiginiz Rengli Nikin muddeti bitdi..!';
	mysql_query('INSERT INTO `zapiski` SET `idtowhom` = \'' . $rn_users['id'] . '\',`towhom` = \'' . $rn_users['user'] . '\',`idwho` = \'1\',`time` = \'' . time() . '\',`who` = \'' . $administration . '\',`date` = \'' . date('H:i - d.m.y') . '\',`readd` = \'0\',`topic` = \'Rengli Nik\',`message` = \'' . $metn . '\';');
}

?>
