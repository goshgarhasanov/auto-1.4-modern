<?php

function Strip_Tag($Str_Input)
{
@settype($Str_Input, 'string');
$Str_Input= @strip_tags($Str_Input);
$_Ary_TagsList= array('jav&#x0A;ascript:', 'jav&#x0D;ascript:', 'jav&#x09;ascript:', '<!-', '<', '>', '%3C', '&lt', '&lt;', '&LT', '&LT;', '&#60', '&#060', '&#0060', '&#00060', '&#000060', '&#0000060', '&#60;', '&#060;', '&#0060;', '&#00060;', '&#000060;', '&#0000060;', '&#x3c', '&#x03c', '&#x003c', '&#x0003c', '&#x00003c', '&#x000003c', '&#x3c;', '&#x03c;', '&#x003c;', '&#x0003c;', '&#x00003c;', '&#x000003c;', '&#X3c', '&#X03c', '&#X003c', '&#X0003c', '&#X00003c', '&#X000003c', '&#X3c;', '&#X03c;', '&#X003c;', '&#X0003c;', '&#X00003c;', '&#X000003c;', '&#x3C', '&#x03C', '&#x003C', '&#x0003C', '&#x00003C', '&#x000003C', '&#x3C;', '&#x03C;', '&#x003C;', '&#x0003C;', '&#x00003C;', '&#x000003C;', '&#X3C', '&#X03C', '&#X003C', '&#X0003C', '&#X00003C', '&#X000003C', '&#X3C;', '&#X03C;', '&#X003C;', '&#X0003C;', '&#X00003C;', '&#X000003C;', '\x3c', '\x3C', '\u003c', '\u003C', chr(60), chr(62));
$Str_Input= @str_replace($_Ary_TagsList, '', $Str_Input);
$Str_Input= @str_replace('

', '', $Str_Input);
return((string)$Str_Input);
}

function nk_CSS($str)

{
if ($str != "")
{
$str = eregi_replace("content-disposition:","conten
;t-dispositio
n:",$str);

$str = eregi_replace("content-type:","content
-type:",$str);
$str = eregi_replace("content-transfer-encoding:","conte
;nt-transfer-&#
101;ncoding:",$str);

$str = eregi_replace("include","include",$str
);
$str = eregi_replace("<?","<?",$str);
$str = eregi_replace("<?php","<?php",$str);

$str = eregi_replace("?>","?>",$str);
$str = eregi_replace("script","script",$str);
$str = eregi_replace("eval","eval",$str);

$str = eregi_replace("javascript","javascri
;pt",$str);
$str = eregi_replace("embed","embed",$str);

$str = eregi_replace("iframe","iframe",$str);
$str = eregi_replace("refresh", "refresh", $str);

$str = eregi_replace("onload", "onload", $str);
$str = eregi_replace("onstart", "onstart", $str);

$str = eregi_replace("onerror", "onerror", $str);
$str = eregi_replace("onabort", "onabort", $str);

$str = eregi_replace("onblur", "onblur", $str);
$str = eregi_replace("onchange", "onchange", $str);

$str = eregi_replace("onclick", "onclick", $str);
$str = eregi_replace("ondblclick", "ondblclick", $str);

$str = eregi_replace("onfocus", "onfocus", $str);
$str = eregi_replace("onkeydown", "onkeydown", $str);

$str = eregi_replace("onkeypress", "onkeypress", $str);
$str = eregi_replace("onkeyup", "onkeyup", $str);

$str = eregi_replace("onmousedown", "onmousedown", $str);
$str = eregi_replace("onmousemove", "onmousemove", $str);

$str = eregi_replace("onmouseover", "onmouseover", $str);
$str = eregi_replace("onmouseout", "onmouseout", $str);

$str = eregi_replace("onmouseup", "onmouseup", $str);
$str = eregi_replace("onreset", "onreset", $str);

$str = eregi_replace("onselect", "onselect", $str);
$str = eregi_replace("onsubmit", "onsubmit", $str);

$str = eregi_replace("onunload", "onunload", $str);
$str = eregi_replace("document", "document", $str);

$str = eregi_replace("cookie", "cookie", $str);
$str = eregi_replace("vbscript", "vbscript", $str);

$str = eregi_replace("location", "location", $str);
$str = eregi_replace("object", "object", $str);

$str = eregi_replace("vbs", "vbs", $str);
$str = eregi_replace("href", "href", $str);
$str = eregi_replace("src", "src", $str);

} 
return($str);
}

function xss_clean($data)
{
// Fix &entity\n;
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do
{
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while ($old_data !== $data);

// we are done...
return $data;
}

function anti_injection_savik(){
GLOBAL $_GET;
GLOBAL $_POST;
GLOBAL $_COOKIE;
GLOBAL $_SESSION;
GLOBAL $_REQUEST;
GLOBAL $_SERVER;

$IS_ATTACK = ARRAY("./","../",".../","/.","/..","+",",",";","\'","\"","*","load_file","union","schemata","md5","dat","inc","x:","x:\#","///","from","xp_","execute","exec","mysql","sp_executesql","sp_","select","insert","where","drop table","users","anonymouse.org","show tables","insert",","|"x'; u\pdate character s\et level=99;-\-","x';u\pdate account s\er ugradeid=255;-\-","x';u\pdate account d\rop ugradeid=255;-\-","x';u\pdate account d\rop ",",w\\here 1=1;-\\-","z'; u\pdate account s\et ugradeid=char","update","drop","sele","memb","char","version","set" ,"$","res3t","wareh","%","--","shutdown","from","select","update","character","clan","set","or","and","insert","where","drop table","show tables","#","\*","--");
IF(ISSET($_GET)){
FOREACH($_GET AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$PATHINFO = PATHINFO($_SERVER[REQUEST_URI], PATHINFO_EXTENSION);
$REQUEST_INFO = STRTOLOWER($PATHINFO);
$BS = base64_decode($_GET[$H]);
IF(IN_ARRAY(STRTOLOWER($_GET[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($REQUEST_INFO), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}
}
IF(ISSET($_POST)){
FOREACH($_POST AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$PATHINFO = PATHINFO($_SERVER[REQUEST_URI], PATHINFO_EXTENSION);
$REQUEST_INFO = STRTOLOWER($PATHINFO);
$BS = base64_decode($_POST[$H]);
IF(IN_ARRAY(STRTOLOWER($_POST[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($REQUEST_INFO), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}
}
IF(ISSET($_COOKIE)){
FOREACH($_COOKIE AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_COOKIE[$H]);
IF(IN_ARRAY(STRTOLOWER($_COOKIE[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}
}
IF(ISSET($_SESSION)){
FOREACH($_SESSION AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_SESSION[$H]);
IF(IN_ARRAY(STRTOLOWER($_SESSION[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}
}
IF(ISSET($_REQUEST)){
FOREACH($_REQUEST AS $H => $V){
IF(@EREG('(.+)', $H, $HP)){
$BS = base64_decode($_REQUEST[$H]);
IF(IN_ARRAY(STRTOLOWER($_REQUEST[$H]), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($H), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}
}
IF(ISSET($_SERVER['REMOTE_ADDR'])){
$BS = base64_decode($_SERVERR['REMOTE_ADDR']);
IF(IN_ARRAY(STRTOLOWER($_SERVERR['REMOTE_ADDR']), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
IF(ISSET($_SERVER['HTTP_USER_AGENT'])){
$BS = base64_decode($_SERVERR['HTTP_USER_AGENT']);
IF(IN_ARRAY(STRTOLOWER($_SERVERR['HTTP_USER_AGENT']), $IS_ATTACK) OR IN_ARRAY(STRTOLOWER($BS), $IS_ATTACK)){
header("Content-Type:text/html; charset=UTF-8");
exit("<center><b>Anti Injecsion Attack</b></center> <br> <a href=\"license.php?".rand(1111,9999)."\">License</a>");
}
}
}


 function xss_filter($val) {  
   $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);  
     
   $search = 'abcdefghijklmnopqrstuvwxyz';  
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
   $search .= '1234567890!@#$%^&*()';  
   $search .= '~`";:?+/={}[]-_|\'\\';  
   for ($i = 0; $i < strlen($search); $i++) {  
     
      $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); 
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); 
   }  
     
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');  
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');  
   $ra = array_merge($ra1, $ra2);  
     
   $found = true; 
   while ($found == true) {  
      $val_before = $val;  
      for ($i = 0; $i < sizeof($ra); $i++) {  
         $pattern = '/';  
         for ($j = 0; $j < strlen($ra[$i]); $j++) {  
            if ($j > 0) {  
               $pattern .= '(';  
               $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';  
               $pattern .= '|(&#0{0,8}([9][10][13]);?)?';  
               $pattern .= ')?';  
            }  
            $pattern .= $ra[$i][$j];  
         }  
         $pattern .= '/i';  
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); 
         $val = preg_replace($pattern, $replacement, $val);  
         if ($val_before == $val) {  
            $found = false;  
         }  
      }  
   }  

   return $val;  
}


function sql_filter($cek){ 
$sqlinjectionchars = array("*","/","'","\"","=","+","(",")","%20","%","\\","select"); 
$sqlinjectionchars; 
$filtered = ''; 
for($i = 0; $i <= strlen($cek); $i++){ 
if(!in_array(substr($cek,$i,1),$sqlinjectionchars)){ 
$filtered .= substr($cek,$i,1); 
}       
} 
for($i = 0; $i < count($sqlinjectionchars); $i++){ 
$filtered = str_replace($sqlinjectionchars[$i],"*",$filtered); 
} 
return $filtered; 
}





function printe($a)
{
	print '<pre>';
		print_r($a);
	print '</pre>';
}

function bal_bot($id)
{
	$data=file("file/bal_bot/0.dat");
	return intval($data[$id]);
}

function session()
{
	ini_set('arg_separator.output', "&amp;");
	ini_set('session.cookie_domain', $_SERVER['HTTP_HOST']);

	if (isset($_COOKIE['SID'])) {
		$sessid = $_COOKIE['SID'];
	} else if (isset($_GET['SID'])) {
		$sessid = $_GET['SID'];
	} else if (isset($_POST['SID'])) {
		$sessid = $_POST['SID'];
	} else {
		session_start();
		return false;
	}
   
	if (!preg_match('/^[a-z0-9]{32}$/', $sessid)) {
		return false;
	}
	session_name('SID');
	session_start();
	return true;
}


function mission($load){
Global $row,$site_url_2, $SERVER_TIME;

	$rpos = file(DOCUMENT_ROOT . 'file/dat_folder/n_n/missia.dat');
	$_r_post = trim($rpos[0]);
	$_r_bal = trim($rpos[1]);
	$status = trim($rpos[2]);

	if ($status == '1') {
		if($row['action'] > "99.80")
		{
			if(mysql_query("update `users` set `action` = '0.00' where `id` = '".$row['id']."'"))
			{
				$cree = @mysql_query ("Select user from users where id='1' LIMIT 1;");
				$rer = @mysql_fetch_array ($cree);
				$adm = $rer["user"];
				$message = "Tebrikler Siz Missiayinizi 100% Catdirdiginiza Gore <b>Sistem</b> Size $_r_bal bal ve $_r_post post Hediyye Etdi.Tebrikler.";
				
				mysql_query("insert into zapiski values(0,'".$adm."','0','".$message."','".$row['user']."','".$row['id']."','".$SERVER_TIME."','0','Tebrikler!!!','','1','1');");
				mysql_query("update `users` set `bal`=`bal`+'".$_r_bal."', `posts`=`posts`+'".$_r_post."'  where `id` = '".$row['id']."'");
			}
		}
	}
	
	if(!file_exists("img/faiz/$load.png"))
	{
		echo "<img src=\"img/load.php?ses=$row[action]\" alt=\"x\"/><br/>";
		@copy("http://".$site_url_2."/img/load.php?ses=$load","img/faiz/$load.png");
	}else{
		echo "<img src=\"img/faiz/$load.png\" alt=\"x\"/> <br/>";
	}
}



function action_up($a){
$action = false;
$exp = explode('.',$a);
if(count($exp)=='1'){
$action = intval($exp['0']).'.00';
}else if(count($exp)=='2'){
$action = intval($exp['0']).'.';
if(strlen($exp['1'])=='1'){
$action .= trim($exp['1']).'0';
}else if(strlen($exp['1'])=='2'){
$action .= trim($exp['1']);
}else{
$action .= substr(trim($exp['1']),0,2);
}
}else{
$action = '0.00';
}
if(!is_numeric($action)) $action = '0.00';
return $action;
}


function select_nk($nk)
{
	$nk=trim($nk);
	$nk = mysql_escape_string($nk);
	if (!ctype_digit($nk)) {
	$usid='0';
	if($nk=='')$nk='0';
	$latuser=strtolower($nk);
    $users = @mysql_query("SELECT * FROM `users` WHERE `latuser`='".$latuser."' LIMIT 1;");
	}else{
	$usid = $nk;
    $users = @mysql_query("SELECT * FROM `users` WHERE `id`='".$nk."' LIMIT 1;");
	}
    if(mysql_affected_rows() == false)
    {
        return (object) array('id' => $usid, 'user' => 'Not user');
    }
    else
    {
        return mysql_fetch_object($users);
    }
}

function save_log($a,$access='',$no_access='')
{
global $_FILES, $_POST, $_SERVER, $_LOG;
$basename_php=basename($_SERVER['SCRIPT_NAME']);
if($access!='')
{
	if(!in_array($basename_php,$access))
	{
		return;
	}
}
else if($no_access!='')
{
	if(in_array($basename_php,$no_access))
	{
		return;
	}
}

	if ($_FILES)
	{
	  $kvs = array();
	  foreach ($_FILES as $keyr => $valuers)
	  {
		$kvs[] = "$keyr=".join("&", $valuers);
	  }
	$query_string = "--------\nFILESX4:\n".join("&", $kvs);
	}


	if ($_POST)
	{
	  $kv = array();
	  foreach ($_POST as $keyr => $valuers)
	  {
		$kv[] = "$keyr=$valuers";
	  }
	  $query_string = $_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']."  _POST  ".join("&", $kv).$query_string;
	}
	else
	{
	  $query_string = $_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'].$query_string;
	}

	if ($_LOG) {
		$log = "| ".join("&", $_LOG);
	}
	
		$savef=@fopen(DOCUMENT_ROOT.'/'.$a,'a+');
		@fwrite($savef, date('Y.m.d/H:i:s')." - ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_USER_AGENT']."\n $query_string $log\r\n");
		@fflush($savef);
		@fclose($savef);
	
return false;
}

function m_tarix($time=NULL)
{
if ($time==NULL)$time=time();
$cc_time1="".date("j M", $time)."";
$cc_time2="".date("H:i", $time)."";
$cc_time="$cc_time1 $cc_time2";
$time_p[0]=date("j n Y", $time);
$time_p[1]=date("H:i", $time);
$ccvaxt=(time()-$time);
$cc_s = $ccvaxt/ 3600;
$cc_saat_tam = strtok($cc_s,'.');
$cc_saat_san = $cc_saat_tam * 3600;
$cc_d = $ccvaxt / 60;
$cc_dq_tam =strtok($cc_d,'.');
$cc_deqiqe_san = $cc_dq_tam * 60;
$cc_deqiqe_hesab = ($ccvaxt - $cc_saat_san) / 60;
$cc_deqiqe = strtok($cc_deqiqe_hesab,'.');
$cc_saniye = $ccvaxt - $cc_deqiqe_san;
if(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye==0))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe==0)&&($cc_saniye<60))$cc_muddet = "$cc_time2";
elseif(($cc_saat_tam==0)&&($cc_deqiqe>=1))$cc_muddet = "$cc_time2";
else $cc_muddet = "$cc_time2";
if ($time_p[0]==date("j n Y")){$cc_time_sss=date("H:i", $time); $cc_time="$cc_muddet";}else{
if ($time_p[0]==date("j n Y", time()-60*60*24)){$cc_time="D&#252;nen $time_p[1]";}else{
$w[1]="Bazar ertesi";
$w[2]="&#199;er&#351;enme Ax&#351;am&#305;";
$w[3]="&#199;er&#351;enbe";
$w[4]="C&#252;me Ax&#351;am&#305;";
$w[5]="C&#252;me";
$w[6]="&#350;enbe";
$w[7]="Bazar";
$hefte=date("w",$time);
if($w[$hefte]!=""){
$cc_time2="".date("H:i", $time)."";
$cc_time="".$w[$hefte]." $cc_time2";
}else{
$cc_time=str_replace("Jan","Yanvar",$cc_time);
$cc_time=str_replace("Feb","Fevral",$cc_time);
$cc_time=str_replace("Mar","Mart",$cc_time);
$cc_time=str_replace("May","May",$cc_time);
$cc_time=str_replace("Apr","Aprel",$cc_time);
$cc_time=str_replace("Jun","Iyun",$cc_time);
$cc_time=str_replace("Jul","Iyul",$cc_time);
$cc_time=str_replace("Aug","Avqust",$cc_time);
$cc_time=str_replace("Sep","Sentyabr",$cc_time);
$cc_time=str_replace("Oct","Oktyabr",$cc_time);
$cc_time=str_replace("Nov","Noyabr",$cc_time);
$cc_time=str_replace("Dec","Dekabr",$cc_time);
}}}
return $cc_time;
}

function select_id($nk,$array='`id`,`user`')
{
	$nk=trim($nk);
	$nk = mysql_escape_string($nk);
	if (!ctype_digit($nk)) {
	$usid='0';
	if($nk=='')$nk='0';
	$latuser=strtolower($nk);
    $users = @mysql_query("SELECT $array FROM `users` WHERE `latuser`='".$latuser."' LIMIT 1;");
	}else{
	$usid = $nk;
    $users = @mysql_query("SELECT $array FROM `users` WHERE `id`='".$nk."' LIMIT 1;");
	}
    if(mysql_affected_rows() == false)
    {
        return (object) array('id' => $usid, 'user' => 'User Delete');
    }
    else
    {
        return mysql_fetch_object($users);
    }
}

function next_id($a,$b='10')
{
 global $_GET;

	$page = (!isset($_GET['page'])) ? 0 : $_GET['page'];
	$start = (!isset($page)) ? 0 : ($page * $b);
	$end = (!isset($page)) ? $b : ($start + $b);
	if(ceil($a/$b) < $page)
	{
		$start = 0;
		$end = $b;
	}
 return array('start'=>$start, 'a'=>$a, 'max_page'=>$b, 'page'=>$page);
}


function page_next1($base_url, $num_items, $per_page, $start_item)
{
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1)
	{
		return '';
	}

		$start_item = $start_item * $per_page;
		$on_page = floor($start_item / $per_page) + 1;
		$page_string = '';


		if ($on_page == 1)
		{
			$page_string = '<a href="'.$base_url."&amp;page=".($on_page).'">- '.(($on_page*$per_page)+$per_page).'&gt;&gt;</a><br/>';
		}
		if ($on_page == $total_pages)
		{
			$page_string = '<a href="'.$base_url."&amp;page=".(($on_page - 2)).'">&lt;&lt;'.(($on_page*$per_page)-$per_page).' -</a><br/>';
		}

	
		if ($on_page > 1  && $on_page < $total_pages)
		{
			$page_string = '<a href="'.$base_url."&amp;page=".(($on_page - 2)).'">&lt;&lt;'.(($on_page*$per_page)-$per_page).' -</a> | <a href="'.$base_url."&amp;page=".($on_page).'">- '.(($on_page*$per_page)+$per_page).'&gt;&gt;</a><br/>'.$page_string;
		}

		if ($on_page < $total_pages)
		{
			$page_string .= '';
		}
	return $page_string;
}

function page_next($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE)
{
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1)
	{
		return '';
	}

		$start_item = $start_item * $per_page;
		$on_page = floor($start_item / $per_page) + 1;
		$page_string = '';

	if ($add_prevnext_text)
	{
		if ($on_page == 1)
		{
			$page_string = 'Evvelki | <a href="'.$base_url."&amp;page=".($on_page).'">N&#246;vbeti</a><br/>';
		}
		if ($on_page == $total_pages)
		{
			$page_string = '<a href="'.$base_url."&amp;page=".(($on_page - 2)).'">Evvelki</a> | N&#246;vbeti<br/>';
		}
	}
	if ($total_pages > 10)
	{
        $init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for($i = 1; $i < $init_page_max + 1; $i++)
		{
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url."&amp;page=".(($i - 1)).'">'.$i.'</a>';
			if ($i <  $init_page_max)
			{
				$page_string .= ",";
			}
		}
		if ($total_pages > 3)
		{
			if ($on_page > 1  && $on_page < $total_pages)
			{
				$page_string .= ($on_page > 5) ? '...' : ',';
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url."&amp;page=".(($i - 1)).'">'.$i.'</a>';
					if ($i <  $init_page_max + 1)
					{
						$page_string .= ',';
					}
				}
				$page_string .= ($on_page < $total_pages - 4) ? '...' : ',';
			}
			else
			{
				$page_string .= '...';
			}
			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>'  : '<a href="'.$base_url."&amp;page=".(($i - 1)).'">'.$i.'</a>';
				if($i <  $total_pages)
				{
					$page_string .= ",";
				}
			}
		}
	}
	else
	{
		for($i = 1; $i < $total_pages + 1; $i++)
		{
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url."&amp;page=".(($i - 1)).'">'.$i.'</a>';
			if ($i <  $total_pages)
			{
				$page_string .= ',';
			}
		}
	}
	if ($add_prevnext_text)
	{
		if ($on_page > 1  && $on_page < $total_pages)
		{
			$page_string = '<a href="'.$base_url."&amp;page=".(($on_page - 2)).'">Evvelki</a> | <a href="'.$base_url."&amp;page=".($on_page).'">N&#246;vbeti</a><br/>'.$page_string;
		}

		if ($on_page < $total_pages)
		{
			$page_string .= '';
		}
	}
	return $page_string."<br/>";
    echo "<br/>";
}

function getmicrotime()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function nk($msg){
return preg_replace('/[^0-9]+/', '', $msg);
}



$del = ( isset($_POST['del']) ) ? $_POST['del'] : $_GET['del'];
if(isset($del)) $del = nk($del);

$fid = ( isset($_POST['fid']) ) ? $_POST['fid'] : $_GET['fid'];
if(isset($fid)) $fid = nk($fid);

$uid = ( isset($_POST['uid']) ) ? $_POST['uid'] : $_GET['uid'];
if(isset($uid)) $uid = nk($uid);

$key = ( isset($_POST['key']) ) ? $_POST['key'] : $_GET['key'];
if(isset($key)) $key = nk($key);

$tid = ( isset($_POST['tid']) ) ? $_POST['tid'] : $_GET['tid'];
if(isset($tid)) $tid = nk($tid);

$lid = ( isset($_POST['lid']) ) ? $_POST['lid'] : $_GET['lid'];
if(isset($lid)) $lid = nk($lid);

$b = ( isset($_POST['b']) ) ? $_POST['b'] : $_GET['b'];
if(isset($b)) $b = nk($b);



function bbses($bbses)
{
$bbses=strtok($bbses,',');
	$bbses=str_ireplace("\"","",$bbses);
	$bbses=str_ireplace("\\","",$bbses);
	$bbses=str_ireplace("/","",$bbses);
	return $bbses;
}

function top_all_reytinq() {
$select_reytinq = mysql_query ("Select `user`,`id`,`sex` FROM `users` WHERE `ses`>'0' ORDER BY `ses` DESC LIMIT 5;");
if (mysql_affected_rows() != 0) {
$save_file="<?php //reytinq users\n\n";
while($reytinq = mysql_fetch_array($select_reytinq))
{
$reytinq_user = $reytinq["user"];
$reytinq_id = $reytinq["id"];
$reytinq_cins = $reytinq["sex"];
if ($reytinq_cins=='0')$reyt_sex="Ki&#351;i";
else $reyt_sex="Xan&#305;m";
$save_file .= "\$top_all_reytinq[] = array('$reytinq_user','$reytinq_id','$reyt_sex');\n";
}
$save_file .= "\n\$cont_top_all_reytinq = count(\$top_all_reytinq)-1;\n";
$save_file .= "\$cont_top_all_reytinq = rand(0,\$cont_top_all_reytinq);\n";
//$save_file .= "\necho \"<p align=\\\"center\\\">\\n\"; \n";
//$save_file .= "print \$fsize1;\n";
$save_file .= "print \"Sevimli Anket:<br/>
<a href=\\\"inside.php?id=\$id&amp;ps=\$ps&amp;nk=\".\$top_all_reytinq[\$cont_top_all_reytinq]['1'].\"&amp;red=\$ref\\\">\".\$top_all_reytinq[\$cont_top_all_reytinq]['0'].\"</a>-\".\$top_all_reytinq[\$cont_top_all_reytinq]['2'].\"\\n\";\n";
//$save_file .= "print \$fsize2;\n";
//$save_file .= "print \"</p>\";\n";
$save_file.="\n?>";
if(strlen($save_file)>100)
file_put_contents('file/dat_folder/top_reytinq_users.php',$save_file);
}
}

function qaliq($a)
{
global $SERVER_TIME;
$tkick = $a - $SERVER_TIME;
if($tkick < 60 && $tkick > 0)
{
$vaxt = "saniyye\n";
}
elseif($tkick < 3600 && $tkick >= 60)
{
$new = $tkick;
$tkick = $new/60;
$vaxt = "deqiqe\n";
}
elseif($tkick < 86400 && $tkick >= 3600)
{
$new = $tkick;
$tkick = $new/3600;
$vaxt = "saat\n";
}
elseif($tkick >= 86400)
{
$new = $tkick;
$tkick = $new/86400;
$vaxt = "g&#252;n\n";
}
$tkick = round($tkick);
return $tkick.' '.$vaxt;
}



function anti_ddos(){
$dir=DOCUMENT_ROOT.'/file/dat_folder/ref_forum';  
if (file_exists($dir.'/auto'.$_SERVER['REMOTE_ADDR'])){
$file=file($dir.'/auto'.$_SERVER['REMOTE_ADDR']);
list($time,$count,$newtime) = explode('|',$file[0]);
$qaliq_time = $newtime-$time;
if($time<time()-30){ $count = 0; $time = time();}
if($count>18){
header("Content-Type:text/html; charset=UTF-8");
exit('Anti DDOS');
}
$f=fopen($dir.'/auto'.$_SERVER['REMOTE_ADDR'], 'w');
fputs($f,$time.'|'.($count+1).'|'.time()); 
fclose($f);  
if($count>$qaliq_time+3){
header("Content-Type:text/html; charset=UTF-8");
exit('Anti DDOS');
}
}
else
{
$f=fopen($dir.'/auto'.$_SERVER['REMOTE_ADDR'], 'w');
fputs($f,time().'|1'.'|'.time()); 
fclose($f);
}
}


function db_user($nick) 
{
if($nick == "")
return false; 

$nick=trim($nick);
if (ctype_digit($nick)) {
if($nick=="")$nick=0;
$nick = mysql_escape_string($nick);
$select_DB = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$nick."';");
if(mysql_affected_rows() == 0)
{
return false; 
}
$user_data_DB = mysql_fetch_array($select_DB);
$nick = $user_data_DB['user'];
}
$nick = "&#187; <b>".$nick."</b>";
return $nick; 
}


function ac_user_time($time){
global $w_r;
if($w_r=="")$w_r = 4;
$tarix = date('d.H.i', $time);
$exp=explode(".", "$tarix");
$on_saat = ($exp[0]*24-24)+($exp[1]-$w_r).":$exp[2]";
return $on_saat;
}


function del_nolat($str) 
{
    $a = array('Ṉ','ậ','ẹ','ʐ','Ị','Ҩ','ɑ','℮','Ḁ','Ƭ','ị','Ɲ','ʀ','ί','ɭ','ή', 'Έ', '£', 'ΰ', '¡', 'А', 'Ə', 'ə', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ø', 'Ù', 'Ú', 'Û', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ',  'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ø', 'ù', 'ú', 'û', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
    $b = array('n','a','e','z','i','a','a','e','a','t','i','n','r','i','i','n', 'e', 'e', 'u', 'i', 'A',  'E', 'e', 'A', 'A', 'A', 'A', 'A', 'AE', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
	return str_replace($a, $b, $str); 
}

function azlat_utf8($str) 
{
    $a = array('Ç', 'Ö',  'Ü', 'ç', 'ö', 'ü', 'Ğ', 'ğ', 'İ', 'ı', 'Ş', 'ş');
    $b = array('C', 'O',  'U', 'c', 'o', 'u', 'G', 'g', 'I', 'i', 'S', 's');
	return str_replace($a, $b, $str); 
}


function bbencode($str) 
{
    $a = array('@', '|', '!');
    $b = array('a', 'i', 'i');
	return str_replace($a, $b, $str); 
}

function bbencode2($str) 
{
    $a = array('@', '|', '!');
    $b = array('o', 'l', 'l');
	return str_replace($a, $b, $str); 
}

function bbdecode($str) 
{
    $a = array('@', '|', '!');
    $b = array('', '', '');
	return str_replace($a, $b, $str); 
}

function simvolsuz($str) 
{
  return strtolower(preg_replace(array('/[^a-zA-Z\@\!\|]/', '/[ -]+/', '/^-|-$/'), 
  array('', '-', ''), azlat_utf8($str))); 
}

function bannedtime($txt) {
if ($txt == 4) {
$txt = "900";
} else if ($txt == 5) {
$txt = "3600";
} else if ($txt == 6) {
$txt = "21600";
} else if ($txt == 7) {
$txt = "172800";
} else if ($txt == 8) {
$txt = "2592000";
} else {
$txt = "2592000";
}
return $txt;
}

function chkdsk($txt, $basename, $filed = NULL) {
$txt = del_nolat($txt);
global $row;
global $_GET;
global $_POST;
if (3000 <= $row['posts'] or $row['id']=='1' or $row['level'] >= '7') {
return $txt;
}
$message = false;
$filed = isset($filed) ? $filed." b&#246;lmesinde: " : false;
$msg = isset($_POST['msg']) ? $_POST['msg'] : $_GET['msg'];
$rm = isset($_POST['rm']) ? $_POST['rm'] : $_GET['rm'];
$nk = isset($_POST['nk']) ? $_POST['nk'] : $_GET['nk'];
if ($basename == "upload.php") {
$message = db_user($nk)." - (MMS Mesaj): ";
} else if ($basename == "reg.php") {
$message = "(Yeni istifade&#231;i qeydiyyatdan) ".$filed;
} else if ($basename == "profile.php") {
$message = "(Anketini deyi&#351;direrken) ".$filed;
} else if ($basename == "on.php" || $basename == "arxiv.php") {
$message = db_user($nk)." - (Online Mesaj):<br/>";
} else if ($basename == "cabinet.php") {
$message = "(Ehval&#305;): ";
} else if ($basename == "foto.php") {
$message = "(Foto haqq&#305;nda qeyd): ";
} else if ($basename == "hesab.php") {
$message = "(".$filed.")";
} else if ($basename == "chat.php") {
$msg_1 = substr($msg, 0, 20);
if (stristr(html_entity_decode(trim($msg_1)), ",")!= false) {
$live_user = explode(",", $msg);
$live_user = trim($live_user[0]);
}
$rm = mysql_escape_string( $rm );
$rem = mysql_query("SELECT `name` FROM `rooms` where `rm` = '".$rm."';");
$iname = mysql_fetch_array($rem);
$room_name = $iname['name'];
$prvt = isset($_POST['prvt']) ? $_POST['prvt'] : $_GET['prvt'];
if ($prvt == 1) {
$prvt = "&#350;exsi";
} else {
$prvt = "&#220;mumi";
}
$message = db_user($live_user)." (".$room_name." - Ota&#287;&#305;nda $prvt):<br/>\n";
}
return auto_ban($txt, $message, $row['user']);
}

	function rus_perevod($msg) {
		$msg = str_replace( "noqte", "", $msg );
		$msg = str_replace( "nqte", "", $msg );
		$msg = str_replace( "noqt", "", $msg );
		$msg = str_replace( "nokte", "", $msg );
		$msg = str_replace( "nkte", "", $msg );
		$msg = str_replace( "nokt", "", $msg );
		$msg = str_replace( "nqt", "", $msg );
		$msg = str_replace( ' ', '', $msg );
		$msg = str_replace( 'А', 'A', $msg );
		$msg = str_replace( 'а', 'a', $msg );
		$msg = str_replace( 'И', 'n', $msg );
		$msg = str_replace( 'и', 'i', $msg );
		$msg = str_replace( 'В', 'B', $msg );
		$msg = str_replace( 'в', 'b', $msg );
		$msg = str_replace( 'б', 'b', $msg );
		$msg = str_replace( 'Б', 'b', $msg );
		$msg = str_replace( 'С', 'C', $msg );
		$msg = str_replace( 'с', 'c', $msg );
		$msg = str_replace( 'Е', 'E', $msg );
		$msg = str_replace( 'е', 'e', $msg );
		$msg = str_replace( 'М', 'M', $msg );
		$msg = str_replace( 'м', 'm', $msg );
		$msg = str_replace( 'Т', 'T', $msg );
		$msg = str_replace( 'О', 'O', $msg );
		$msg = str_replace( '0', 'O', $msg );
		$msg = str_replace( 'о', 'o', $msg );
		$msg = str_replace( 'к', 'k', $msg );
		$msg = str_replace( 'К', 'K', $msg );
		$msg = str_replace( 'У', 'Y', $msg );
		$msg = str_replace( 'у', 'y', $msg );
		$msg = str_replace( 'Й', 'Y', $msg );
		$msg = str_replace( 'Ъ', 'B', $msg );
		$msg = str_replace( 'Ё', 'e', $msg );
		$msg = str_replace( 'ё', 'e', $msg );
		$msg = str_replace( 'л', 'l', $msg );
		$msg = str_replace( 'Л', 'l', $msg );
		$msg = str_replace( 'н', 'h', $msg );
		$msg = str_replace( 'Ь', 'b', $msg );
		$msg = str_replace( 'х', 'x', $msg );
		$msg = str_replace( 'Х', 'x', $msg );
		$msg = str_replace( 'є', 'e', $msg );
		$msg = str_replace( 'з', 'z', $msg );
		$msg = str_replace( 'З', 'Z', $msg );

$msg = str_replace( "c0m", "com", $msg );
$msg = str_replace( "@z", "az", $msg );
$msg = str_replace( "a7", "az", $msg );
$msg = str_replace( "bjz", "biz", $msg );
$msg = str_replace( "i3iz", "biz", $msg );
$msg = str_replace( "l3iz", "biz", $msg );
$msg = str_replace( "|3iz", "biz", $msg );
$msg = str_replace( "j3iz", "biz", $msg );
$msg = str_replace( "!3iz", "biz", $msg );

$msg = str_replace( "!3z", "biz", $msg );
$msg = str_replace( "i3z", "biz", $msg );
$msg = str_replace( "l3z", "biz", $msg );
$msg = str_replace( "j3z", "biz", $msg );

$msg = str_replace( "!3!z", "biz", $msg );
$msg = str_replace( "13!z", "biz", $msg );
$msg = str_replace( "i3!z", "biz", $msg );
$msg = str_replace( "l3!z", "biz", $msg );
$msg = str_replace( "|3!z", "biz", $msg );
$msg = str_replace( "j3!z", "biz", $msg );

$msg = str_replace( "!31z", "biz", $msg );
$msg = str_replace( "131z", "biz", $msg );
$msg = str_replace( "i31z", "biz", $msg );
$msg = str_replace( "l31z", "biz", $msg );
$msg = str_replace( "|31z", "biz", $msg );
$msg = str_replace( "j31z", "biz", $msg );

$msg = str_replace( "bi3", "biz", $msg );
$msg = str_replace( "bl3", "biz", $msg );
$msg = str_replace( "b13", "biz", $msg );
$msg = str_replace( "b!3", "biz", $msg );
$msg = str_replace( "bj3", "biz", $msg );
$msg = str_replace( "b|3", "biz", $msg );
return $msg;
}
	






function auto_ban($msg, $msg2, $user) {
global $_GET;
global $_POST;
global $SERVER_TIME;


$data = @file_get_contents( DOCUMENT_ROOT . 'file/dat_folder/black.dat' );

if ($data == false) {
return $msg;
}



$arr = explode("\n", $data );
$id = (isset( $_POST['id'] ) ? $_POST['id'] : $_GET['id']);

$ms_sql = mysql_query("SELECT `id`, `soz`, `evez` FROM `filtr` WHERE `id`!= '0'");
while($fl_us = mysql_fetch_array($ms_sql)){
$msg = str_replace($fl_us["soz"], $fl_us["evez"], $msg);
} 
$vmsg = rus_perevod( $msg );




foreach ($arr as $key => $value) {
$val = explode( '|', $value );
$reklam = trim( $val['0'] );
$simvolsuz = trim( $val['1'] );
$msg_arr = trim($vmsg);
if($simvolsuz == '1') {   
$msg_arr = simvolsuz( $msg_arr );
}else if ($simvolsuz == '2') {
$msg_arr = str_replace( 'o', '0', strtolower($msg_arr) );
$msg_arr = nk($msg_arr);
}
			
$poisk = null;
			
if (stristr( html_entity_decode( trim( bbdecode( $msg_arr ) ) ), $reklam ) != false) {
$poisk = true;
}

if (stristr( html_entity_decode( trim( bbencode( $msg_arr ) ) ), $reklam ) != false) {
$poisk = true;
}

if (stristr( html_entity_decode( trim( $msg_arr ) ), $reklam ) != false) {
$poisk = true;
}


if (stristr( html_entity_decode( trim( bbencode2( $msg_arr ) ) ), $reklam ) != false) {
$poisk = true;
}


if ($poisk != false) {
if (trim( $val[2] ) == '0') {
$banned = '';
}else if (trim( $val[2] ) == '1') {
$banned = "`banned` = '1'";
}else if (trim( $val[2] ) == '2') {
$banned = "`banned` = '2'";
}else if (trim( $val[2] ) == '3') {
$banned = "`inv` = '2'";
}else {
$banned = "`kik` ='".( $SERVER_TIME + bannedtime( (int)trim( $val[2] ) ) )."'";
}

if (stristr( html_entity_decode( trim( $msg2 ) ), 'qeydiyyatdan' ) != false) {
setcookie( 'vreg', $SERVER_TIME + 86400, $SERVER_TIME + 86400 );
$pass = (isset( $_POST['pass'] ) ? $_POST['pass'] : $_GET['pass']);
$user = (isset( $_POST['user'] ) ? $_POST['user'] : $_GET['user']);
if (trim( $val[4] ) == '1') {
mysql_query("INSERT INTO `auto_ban_v2` SET  `message`='".$msg2 . narmobil( $msg )."', `sebeb`='".trim( $val[3] )."', `banned`='".(int)$val[2]."', `banmsg`='".$reklam."', `time`='".$SERVER_TIME."';");
}
header("Location: reg.php?ref=".$_GET['ref']."");
return false;
}

mysql_query("Update `users` set `whykik`='".trim( $val[3] )."', `whokik`='Sistem', `time`='".$SERVER_TIME."-1', ".$banned." where `id` ='".$id."';" );
if (trim( $val[4] ) == '1') {
mysql_query("INSERT INTO `auto_ban_v2` SET `usid`='".$id."', `user`='".$user."', `message`='".$msg2.narmobil( $msg )."', `sebeb`='".trim( $val[3] )."', `banned`='".(int)$val[2]."', `banmsg`='".$reklam."', `time`='".$SERVER_TIME."';");
}
header("Location: session.php?id={$id}&ps={$_GET['ps']}&ref={$_GET['ref']}");
exit();
return false;
}
}

return $msg;
}






function time_date($str,$mesaj=false){
global $SERVER_TIME;
$gun_ay_il = date('d.m.y', $str);
$date1=str_replace(date("d.m.y",$SERVER_TIME-86400), "1", $gun_ay_il);//dunen
$date2=str_replace(date("d.m.y",$SERVER_TIME), "2", $gun_ay_il);//bu gun
$saat = date('H:i', $str);
if($date1==1)
{
$str = "D&#252;nen $saat";
}elseif($date2==2 and $mesaj!=false){
$str = $saat;
}elseif($date2==2){
$str = "Bu g&#252;n ".$saat;
}else{
if(date('Y', $str)!=date('Y', $SERVER_TIME)) $il_str = ".".date('Y', $str); else $il_str = "";
$aylar=array("Yanvar","Fevral","Mart","Aprel","May","&#304;yun","&#304;yul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr");
$ay=date('n', $str)-1; 
$gun=date('d', $str); 
$str = $gun.".".$aylar[$ay].$il_str." ".$saat;
}
return $str; 
}
function buga_date($str,$mesaj=false){
global $SERVER_TIME;
$gun_ay_il = date('d.m.y', $str);
$date1=str_replace(date("d.m.y",$SERVER_TIME-86400), "1", $gun_ay_il);//dunen
$date2=str_replace(date("d.m.y",$SERVER_TIME), "2", $gun_ay_il);//bu gun
if($date1==1)
{
$str = "D&#252;nen";
}elseif($date2==2 and $mesaj!=false){
$str = $saat;
}elseif($date2==2){
$str = "Bu g&#252;n ";
}else{
if(date('Y', $str)!=date('Y', $SERVER_TIME)) $il_str = ".".date('Y', $str); else $il_str = "";
$aylar=array("Yanvar","Fevral","Mart","Aprel","May","&#304;yun","&#304;yul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr");
$ay=date('n', $str)-1; 
$gun=date('d', $str); 
$str = $gun.".".$aylar[$ay].$il_str."";
}
return $str; 
}


function ipbrowser_html($a){
$a=str_replace("'", "", $a);
$a=str_replace("\"", "", $a);
$a = htmlentities(addslashes($a));
return $a;
}

function OPERATOR($USER_IP)
{
include(DOCUMENT_ROOT.'file/require/update.inc');
while(list($ip_adress_num,$value_ip_adress) = each($user_ip_adress_min)) {
if(ip2long($user_ip_adress_max[$ip_adress_num])>=ip2long($USER_IP) and ip2long($value_ip_adress)<=ip2long($USER_IP))
return array($user_ip_adress_name[$ip_adress_num],$user_ip_adress_name_max[$ip_adress_num]);
}
return array('NULL',$USER_IP);
}

function is_opera($ip)
{
	include(DOCUMENT_ROOT.'file/require/update.inc');
	foreach($opera_ip as $data)
	{
		if(ip2long($data['0'])<=ip2long($ip) and ip2long($data['1'])>=ip2long($ip)) return $data['2'];
	}
return false;
}
	

function replace_smile($data){
global $replaces, $smile_assoc;
return $replaces[ array_search($data[0], $smile_assoc) ];
}

function in_smile($msg,$posts=false){
global $replaces, $smile_assoc;
if($posts==false) $posts = '99999999999';
$smiles = array();
$replaces = array();
@include(DOCUMENT_ROOT."file/dat_folder/smile.php");
$i = 0;$i_2 = 1000;
$smiles_indexes = array();
foreach($smiles as $kic=>$vic) $smiles_indexes[$vic] = '<'.($i++).'>';
$smile_assoc = array_values($smiles_indexes);
$msg = str_replace(array_keys($smiles_indexes), array_values($smiles_indexes), $msg);
$msg = preg_replace_callback('~<[0-9]+>~si', 'replace_smile', $msg, $i_2);
$msg = str_replace(array_values($smiles_indexes), array_keys($smiles_indexes), $msg);
return $msg;
}


if ($_POST['edit:msg'] != false) {
	$msg_edit = explode(',', $_POST['edit:msg']);
	$msg = $msg_edit['0'] . ', ' . $_POST['msg'];
}


$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
if(is_opera($_SERVER['REMOTE_ADDR']) != false)
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{
		$_SERVER['REMOTE_ADDR'] = $REMOTE_ADDR = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$_SERVER['REMOTE_ADDR']=$REMOTE_ADDR=$_SERVER['HTTP_X_FORWARDED_FOR'];
		if (15 < strlen ($REMOTE_ADDR))
		{
			$ar = split (',', $REMOTE_ADDR);
			$_SERVER['REMOTE_ADDR']=$REMOTE_ADDR = trim($ar['0']);
		}
	}
}


@include(DOCUMENT_ROOT.'file/dat_folder/online.php');
if($_AUTO['online']<=1 and $_AUTO['chat']<=1) {
$SERVER_TIME = time();
$_AUTO['online'] = $SERVER_TIME - 3600;
$_AUTO['chat'] = $SERVER_TIME - 3600;
$_AUTO['ofline'] = 600;
$_AUTO['reftime'] = '2355';
$_AUTO['regtime'] = '60';
$_AUTO['admin'] = 'Admin';
$_AUTO['nomre'] = '055 0001234';
} else {
if($_AUTO['time']!='0')$SERVER_TIME = (time()+$_AUTO['time']); else $SERVER_TIME = time();
$_AUTO['online'] = $SERVER_TIME-$_AUTO['online'];
$_AUTO['chat'] = $SERVER_TIME-$_AUTO['chat'];
}





$A_OPERA = OPERATOR($REMOTE_ADDR);
$OPERATOR = trim($A_OPERA['0']);
$REMOTE_MAX = trim($A_OPERA['1']);
?>