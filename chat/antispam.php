<?
if(SID!='')$SESID = "&amp;".SID;
$ref=rand(10000,1000000);
$brayz=strtok($HTTP_USER_AGENT,'/');

//if($_SESSION["regtime"]==""){
//header ("Location: reghelp.php"); exit; 
//}

function xhtmlpage($title,$text_page)
{
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"".strtolower($title)."\" title=\"$title\">\n";
echo "<p align=\"center\">\n";
echo "<small>\n";
echo "$text_page\n";
echo "</small>\n";
echo "</p></card></wml>";
exit;
}

function silinsin($myfile){
$oldtime = time()-600;
$dir = opendir ($myfile);
while ($file = readdir ($dir)) {
if (( $file != ".") && ($file != "..")) {
if(filemtime($myfile."/".$file)<$oldtime){
@unlink("$myfile/$file");
}
}
}
closedir ($dir);
}
if($OPERATOR=='NULL')
{
$SESSION_BROWSER = $REMOTE_MAX;
}
else
{
$SESSION_BROWSER = $HTTP_USER_AGENT.$REMOTE_MAX;
}

if($_GET['SID']!="")
{
$reg_hidden_post = 'GET';
}
else
{
$reg_hidden_post = 'POST';
}

if($_POST['user']!="")$user = $_POST['user'];
else if($_GET['user']!="")$user = $_GET['user'];

$save_temp = $_SERVER['HTTP_ACCEPT'];
$save_temp .= $_SERVER['HTTP_ACCEPT_CHARSET'];
$save_temp .= $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$save_temp .= $_SERVER['HTTP_X_WAP_PROFILE'];
$save_temp .= $_SERVER['HTTP_ACCEPT_ENCODING'];


if($user==""){

$number_ref_refer = rand(1,9);
$refertime=$_SESSION["refertime"]=substr(md5(rand(10,90000)),0,6).$number_ref_refer;
$keyround = rand(1000, 1000000);
$ref_refer0=$ref_refer1=$ref_refer2=$ref_refer3=$ref_refer4=$ref_refer5=$ref_refer6=$ref_refer7=$ref_refer8=$ref_refer9=false;
$ref_refer = 'ref_refer'.$number_ref_refer;
$$ref_refer = "<postfield name=\"$refertime\" value=\"$keyround\"/>\n";


if(file_exists('file/dat_folder/ref_forum/'.md5($save_temp)))
{
$dat_files = file('file/dat_folder/ref_forum/'.md5($save_temp));
$dat_files1 = trim($dat_files[1]);
}
else
$dat_files1 = 0;


if ($dat_files1>$SERVER_TIME){
$tkick = $dat_files1 - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
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


$_v->title('IP BAN!','center');
$_v->fsize1('small');
//$_v->html('<div class="inputRed"><b>You IP Banned</b></div><br/>');
//echo "Reklam ve ya s&#246;y&#252;&#351; xarakterli nik a&#231;maq istediyinize g&#246;re qeydiyyat&#305;n&#305;z ba&#287;lan&#305;b.<br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz. Yadaki bawqa operatorla ve ya telefonla qeydiyyat kecin!<br/>\n";
echo "----<br/><a href=\"license.php\">License</a><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}




if($dat_files1<time()){
$temp = fopen('file/dat_folder/ref_forum/'.md5($save_temp), "w");
fwrite($temp, $keyround."\n".time()."\n".time());
fclose($temp);
}
if(file_exists('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER)))
{
$dat_files_keysflo = file('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER));
$dat_files_keysflood = trim($dat_files_keysflo[0]);
$dat_files_active = trim($dat_files_keysflo[1]);

if($dat_files_keysflood<=$SERVER_TIME){
$filesave = fopen('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER), "w");
fwrite($filesave, $keyround."\n".$reg_hidden_post."\n".(time()-1));
fclose($filesave);
$dat_files_active = 0;
}

if($dat_files_active=='1'){
$dat_files_keysflood =  $dat_files_keysflood-$SERVER_TIME;
if($dat_files_keysflood < 60 && $dat_files_keysflood > 0)
{
$vaxt = "saniyyeden\n";
}
elseif($dat_files_keysflood < 3600 && $dat_files_keysflood > 60)
{
$new = $dat_files_keysflood;
$dat_files_keysflood = $new/60;
$vaxt = "deqiqeden\n";
}
elseif($dat_files_keysflood > 3600)
{
$new = $dat_files_keysflood;
$dat_files_keysflood = $new/3600;
$vaxt = "saat\n";
}


$dat_files_keysflood = round($dat_files_keysflood);
$_v->title('IP BAN!','center');
$_v->fsize1('small');
echo "Siz ".$dat_files_keysflood." ".$vaxt." sonra qeydiyyatdan kece bilersiz.<br/>";
//xhtmlpage('Flood',"Siz ".$dat_files_keysflood." ".$vaxt." sonra qeydiyyatdan kece bilersiz.<br/>****<br/>
//xhtmlpage();
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}
else
{
$filesave = fopen('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER), "w");
fwrite($filesave, $keyround."\n".$reg_hidden_post."\n".time());
fclose($filesave);
}
}
else
{
$key_reg_filed  = substr($refertime,-1,1);
$ci =0;
foreach ($_POST as $key => $value) {
if($refertime==$key){
if($key_reg_filed!=$ci){
$error_msg_keys = "Spam etmek olmaz...";
  $kv = array();
$kv[] = "-------------------------------------SERVER Ping\n";
  foreach ($_SERVER as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "-------------------------------------POST Ping\n";
    foreach ($_POST as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "-------------------------------------GET Ping\n";

      foreach ($_GET as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "\n\n";

  $query_string = join("\n", $kv);

$attack = fopen('file/dat_folder/attack.dat', "a");
fwrite($attack, $query_string);
fclose($attack);
}
}
$ci++;
}





if(file_exists('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER)))
{
$dat_files_keysflo = file('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER));
$dat_files_keysflood = trim($dat_files_keysflo[0]);
$dat_files_post = trim($dat_files_keysflo[1]);
$dat_files_time = trim($dat_files_keysflo[2]);

if(file_exists('file/dat_folder/ref_forum/'.md5($save_temp)))
{
$dat_files = file('file/dat_folder/ref_forum/'.md5($save_temp));
$dat_files2 = trim($dat_files[2]);
}
else
{
$dat_files2=0;
}

if($dat_files2==0)
{
//$error_msg_keys = "Spam etmek olmaz...";
}

if($dat_files_time>time()-4)
{
//$error_msg_keys = "Spam etmek olmaz...";
}
if($_POST[$refertime]!=$dat_files_keysflood){
//$error_msg_keys = "Qeydiyyat Formas&#305; d&#252;zg&#252;n deyil";
}
if($dat_files_post=='POST' and $_GET['SID']!=''){
//$error_msg_keys = "Spam etmek olmaz...";
  $kv = array();
$kv[] = "-------------------------------------SERVER Ping POST and SID\n";
  foreach ($_SERVER as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "-------------------------------------POST Ping\n";
    foreach ($_POST as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "-------------------------------------GET Ping\n";

      foreach ($_GET as $keyr => $valuers) {
    $kv[] = "$keyr=$valuers";
  }
  $kv[] = "\n\n";

  $query_string = join("\n", $kv);

$attack = fopen('file/dat_folder/attack.dat', "a");
fwrite($attack, $query_string);
fclose($attack);
}
}
else
{
$error_msg_keys = "Spam etmek olmaz...";
}
}
silinsin('file/dat_folder/ref_forum');

function antispam(){
global $_v;
global $ref;
global $_SERVER;
global $SERVER_TIME;
global $REMOTE_MAX;
global $HTTP_USER_AGENT;
global $SESSION_BROWSER;
global $OPERATOR;
global $site;
global $site_url;


$save_temp = $_SERVER['HTTP_ACCEPT'];
$save_temp .= $_SERVER['HTTP_ACCEPT_CHARSET'];
$save_temp .= $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$save_temp .= $_SERVER['HTTP_X_WAP_PROFILE'];
$save_temp .= $_SERVER['HTTP_ACCEPT_ENCODING'];

if(file_exists('file/dat_folder/ref_forum/'.md5($save_temp)))
{
$dat_files = file('file/dat_folder/ref_forum/'.md5($save_temp));
$dat_files1 = trim($dat_files[1]);
}
else
$dat_files1 = 0;


if ($dat_files1>$SERVER_TIME){
$tkick = $dat_files1 - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
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


$_v->title('IP BAN!','center');
$_v->fsize1('small');

//echo "Reklam ve ya s&#246;y&#252;&#351; xarakterli nik a&#231;maq istediyinize g&#246;re qeydiyyat&#305;n&#305;z ba&#287;lan&#305;b.<br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz. Yadaki bawqa operatorla ve ya telefonla qeydiyyat kecin!<br/>\n";
echo "----<br/><a href=\"license.php\">License</a><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}


if($OPERATOR=='NULL')
{
$SESSION_BROWSER = $REMOTE_MAX;
}
else
{
$SESSION_BROWSER = $HTTP_USER_AGENT.$REMOTE_MAX;
}
if(file_exists('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER)))
{
$dat_files_keysflo = file('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER));
$dat_files_keysflood = trim($dat_files_keysflo[0]);
$dat_files_active = trim($dat_files_keysflo[1]);

if($dat_files_keysflood<=$SERVER_TIME){
$filesave = fopen('file/dat_folder/ref_forum/'.md5($SESSION_BROWSER), "w");
fwrite($filesave, $keyround."\n".$reg_hidden_post."\n".(time()-1));
fclose($filesave);
$dat_files_active = 0;
}

if($dat_files_active=='1'){
$dat_files_keysflood =  $dat_files_keysflood-$SERVER_TIME;
if($dat_files_keysflood < 60 && $dat_files_keysflood > 0)
{
$vaxt = "saniyyeden\n";
}
elseif($dat_files_keysflood < 3600 && $dat_files_keysflood > 60)
{
$new = $dat_files_keysflood;
$dat_files_keysflood = $new/60;
$vaxt = "deqiqeden\n";
}
elseif($dat_files_keysflood > 3600)
{
$new = $dat_files_keysflood;
$dat_files_keysflood = $new/3600;
$vaxt = "saat\n";
}


$dat_files_keysflood = round($dat_files_keysflood);
$_v->title('IP BAN!','center');
$_v->fsize1('small');
echo "Siz ".$dat_files_keysflood." ".$vaxt." sonra qeydiyyatdan kece bilersiz.<br/>";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}


}


function antiatackreg(){
global $_v;
global $ref;
global $_COOKIE;
global $SERVER_TIME;
global $site;
global $site_url;



if (bbses($_COOKIE['nnregyv'])>$SERVER_TIME){
$tkick = bbses($_COOKIE['nnregyv']) - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
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

$_v->title('IP BAN!','center');
$_v->fsize1('small');
$_v->html('<div class="inputRed"><b>You IP Banned</b></div><br/>');
echo "Sizin Browser-den daha once qeydiyyatdan kecilib.<br/>\n";
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz.<br/>\n";
echo "----<br/><a href=\"license.php\">License</a><br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}


function antiadeshtt(){
global $_v;
global $ref;
global $SERVER_TIME;
global $site;
global $site_url;
global $OPERATOR;
global $HTTP_USER_AGENT;
global $capqeyd ;
global $REMOTE_ADDR;
global $_SERVER;
//$SESSION_BROWSER = $REMOTE_ADDR.$HTTP_USER_AGENT;
$capqeyd = $HTTP_USER_AGENT.$REMOTE_ADDR;
$setting = @mysql_query ("Select * from `capchat` WHERE (`soft` = '".md5($capqeyd)."');");
$set = mysql_fetch_array ($setting);
$setting = (object) $set;


if ($setting->time >$SERVER_TIME)
{
	$tkick = $setting->time-$SERVER_TIME;
	if($tkick < 60 && $tkick > 0)
	{
		$vaxt = "saniyye\n";
	}
	elseif($tkick < 3600 && $tkick > 60)
	{
		$new = $tkick;
		$tkick = floor($new/60)+1;
		$vaxt = "deqiqe\n";
	}
	elseif($tkick < 86400 && $tkick > 3600)
	{
		$new = $tkick;
		$tkick = floor($new/3600)+1;
		$vaxt = "saat\n";
	}
	elseif($tkick > 86400)
	{
		$new = $tkick;
		$tkick = floor($new/86400)+1;
		$vaxt = "g&#252;n\n";
	}
	$tkick = round($tkick);


if (mysql_affected_rows()!=0) {
$_v->title('IP Adress BAN!','center');
$_v->fsize1('small');
echo "Siz qeydiyyatdan $tkick $vaxt sonra ke&#231;e bilersiz. Yadaki bawqa operatorla ve ya telefonla qeydiyyat kecin!<br/>\n";
echo "****<br/><a href=\"http://$site_url\">$site</a>\n";
$_v->fsize2('small');
$_v->end('1',$link);
exit;
}
}
}




function antireg(){
global $_COOKIE;
global $SERVER_TIME;
global $_SESSION;
global $_AUTO;
global $OPERATOR;
global $HTTP_USER_AGENT;
global $capqeyd;
global $REMOTE_ADDR;
global $REMOTE_MAX;

//$capqeyd = $REMOTE_ADDR.$OPERATOR;
$capqeyd = $HTTP_USER_AGENT.$REMOTE_ADDR;
$vaxt = $_AUTO['regtime'] + $SERVER_TIME;
mysql_query ("INSERT INTO `capchat` SET `ip`='".$REMOTE_MAX."', `soft`='".md5($capqeyd)."', `operator`='".$OPERATOR."', `time`='".$vaxt."';");
setcookie ("nnregyv", $SERVER_TIME+$_AUTO['regtime'], $SERVER_TIME+$_AUTO['regtime']);  //cookie  block auto+time
}
?>