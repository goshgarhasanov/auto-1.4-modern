<?php //asef


function narmobilfut( $msg )
{
        global $rm;
        $msg = trim( " {$msg} " );
        $msg = ereg_replace( " +", " ", $msg );
        $msg = substr( $msg, 0, 3000 );
        $msg = str_replace( "", " ", $msg );
        $msg = htmlentities( $msg );
        $a = array( "&ouml;", "&Ouml;", "&uuml;", "&Uuml;", "&ccedil;", "&Ccedil;" );
        $b = array( "Г¶", "Г–", "Гј", "Гњ", "Г§", "Г‡" );
        $msg = str_replace( $a, $b, $msg );
        $msg = html_entity_decode( $msg );
        $msg = htmlentities( trim( $msg ), ENT_QUOTES, "UTF-8" );
        $error_s = ENT_QUOTES;
        $msg = str_replace( "&Ouml;", "Г–", $msg );
        $msg = str_replace( "&ouml;", "Г¶", $msg );
        $msg = str_replace( "&Uuml;", "Гњ", $msg );
        $msg = str_replace( "&uuml;", "Гј", $msg );
        $msg = str_replace( "&Ccedil;", "Г‡", $msg );
        $msg = str_replace( "&ccedil;", "Г§", $msg );
        $msg = str_replace( "&".$error_s.";", "", $msg );
        $msg = preg_replace( "/(&.+?)+(;)/i", "", $msg );
        $msg = html_entity_decode( trim( $msg ) );
        $msg = str_replace( "\$", "\$\$", $msg );
        $msg = strtr( $msg, array( "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "" ) );
        $msg = htmlspecialchars( $msg );
        $msg = str_replace( "\"", "&quot;", $msg );
        $msg = str_replace( "\\&quot;", "&quot;", $msg );
        $msg = str_replace( "|", "&#0166;", $msg );
        $msg = str_replace( "'", "&#8216;", $msg );
        $msg = str_replace( "пїЅ", "", $msg );
        $msg = str_replace( "\\", "", $msg );
        if ( $rm != "0" )
        {
                $msg = str_replace( "ch", "&#231;", $msg );
                $msg = str_replace( "gh", "&#287;", $msg );
                $msg = str_replace( "sh", "&#351;", $msg );
                $msg = str_replace( "w", "&#351;", $msg );
                $msg = str_replace( "W", "&#350;", $msg );
        }
        return $msg;
}


function getmicrotime()
{
list($usec, $sec) = explode(" ", microtime());
return ((float)$usec + (float)$sec);
}


function rus_to_k($str){
$str = str_replace("Р°","a",$str);
$str = str_replace("Р±","b",$str);
$str = str_replace("РІ","v",$str);
$str = str_replace("Рі","g",$str);
$str = str_replace("Рґ","d",$str);
$str = str_replace("Рµ","e",$str);
$str = str_replace("РЎ&#8216;","e",$str);
$str = str_replace("Р¶","j",$str);
$str = str_replace("Р·","z",$str);
$str = str_replace("Рё","i",$str);
$str = str_replace("Р№","y",$str);
$str = str_replace("Рє","k",$str);
$str = str_replace("Р»","l",$str);
$str = str_replace("Рј","m",$str);
$str = str_replace("РЅ","n",$str);
$str = str_replace("Рѕ","o",$str);
$str = str_replace("Рї","p",$str);
$str = str_replace("РЎ&#8364;","r",$str);
$str = str_replace("РЎ&#65533;","s",$str);
$str = str_replace("РЎ&#8218;","t",$str);
$str = str_replace("РЎ&#402;","u",$str);
$str = str_replace("РЎ&#8222;","f",$str);
$str = str_replace("РЎ&#8230;","h",$str);
$str = str_replace("РЎ&#8225;","c",$str);
$str = str_replace("РЎ&#8224;","q",$str);
$str = str_replace("РЎ&#710;","w",$str);
$str = str_replace("РЎ&#8240;",">",$str);
$str = str_replace("РЎ&#338;","<",$str);
$str = str_replace("РЎ&#8249;","x",$str);
$str = str_replace("РЎ&#352;",".",$str);
$str = str_replace("РЎ&#65533;",":",$str);
$str = str_replace("РЎ&#381;",";",$str);
$str = str_replace("РЎ&#65533;","}",$str);
$str = str_replace("Р &#65533;","a",$str);
$str = str_replace("Р &#8216;","b",$str);
$str = str_replace("Р &#8217;","v",$str);
$str = str_replace("Р &#8220;","g",$str);
$str = str_replace("Р &#8221;","d",$str);
$str = str_replace("Р &#8226;","e",$str);
$str = str_replace("Р &#65533;","e",$str);
$str = str_replace("Р &#8211;","j",$str);
$str = str_replace("Р &#8212;","z",$str);
$str = str_replace("Р &#65533;","i",$str);
$str = str_replace("Р &#8482;","y",$str);
$str = str_replace("Р &#353;","k",$str);
$str = str_replace("Р &#8250;","l",$str);
$str = str_replace("Р &#339;","m",$str);
$str = str_replace("Р &#65533;","n",$str);
$str = str_replace("Р &#382;","o",$str);
$str = str_replace("Р &#376;","p",$str);
$str = str_replace("Р ","r",$str);
$str = str_replace("РЎ","s",$str);
$str = str_replace("Рў","t",$str);
$str = str_replace("РЈ","u",$str);
$str = str_replace("Р¤","f",$str);
$str = str_replace("РҐ","h",$str);
$str = str_replace("Р§","c",$str);
$str = str_replace("Р¦","q",$str);
$str = str_replace("РЁ","w",$str);
$str = str_replace("Р©",">",$str);
$str = str_replace("Р¬","<",$str);
$str = str_replace("Р«","x",$str);
$str = str_replace("РЄ",".",$str);
$str = str_replace("Р­",":",$str);
$str = str_replace("Р®",";",$str);
$str = str_replace("РЇ","}",$str);
return $str;
}

function win_to_utf($str){
$str=strtr($str,array(""=>"Р°",""=>"Р±",""=>"РІ",""=>"Рі",""=>"Рґ",""=>"Рµ",""=>"РЎ&#8216;",""=>"Р¶",""=>"Р·",""=>"Рё",""=>"Р№",""=>"Рє",""=>"Р»",""=>"Рј",""=>"РЅ",""=>"Рѕ",""=>"Рї",""=>"РЎ&#8364;",""=>"РЎ&#65533;",""=>"РЎ&#8218;",""=>"РЎ&#402;",""=>"РЎ&#8222;",""=>"РЎ&#8230;",""=>"РЎ&#8224;",""=>"РЎ&#8225;",""=>"РЎ&#710;",""=>"РЎ&#8240;",""=>"РЎ&#352;",""=>"РЎ&#8249;",""=>"РЎ&#338;",""=>"РЎ&#65533;",""=>"РЎ&#381;",""=>"РЎ&#65533;",
""=>"Р &#65533;",""=>"Р &#8216;",""=>"Р &#8217;",""=>"Р &#8220;",""=>"Р &#8221;",""=>"Р &#8226;",""=>"Р &#65533;",""=>"Р &#8211;",""=>"Р &#8212;",""=>"?",""=>"Р &#8482;",""=>"Р &#353;",""=>"Р &#8250;",""=>"Р &#339;",""=>"Р &#65533;",""=>"Р &#382;",""=>"Р &#376;",""=>"Р ",""=>"РЎ",""=>"Рў",""=>"РЈ",""=>"Р¤",""=>"РҐ",""=>"Р¦",""=>"Р§",""=>"РЁ",""=>"Р©",""=>"РЄ",""=>"Р«",""=>"Р¬",""=>"Р­",""=>"Р®",""=>"РЇ"));
return $str;
}

function utf_to_win($str){
$str=strtr($str,array("Р°"=>"","Р±"=>"","РІ"=>"","Рі"=>"","Рґ"=>"","Рµ"=>"","РЎ&#8216;"=>"","Р¶"=>"","Р·"=>"","Рё"=>"","Р№"=>"","Рє"=>"","Р»"=>"","Рј"=>"","РЅ"=>"","Рѕ"=>"","Рї"=>"","РЎ&#8364;"=>"","РЎ&#65533;"=>"","РЎ&#8218;"=>"","РЎ&#402;"=>"","РЎ&#8222;"=>"","РЎ&#8230;"=>"","РЎ&#8224;"=>"","РЎ&#8225;"=>"","РЎ&#710;"=>"","РЎ&#8240;"=>"","РЎ&#352;"=>"","РЎ&#8249;"=>"","РЎ&#338;"=>"","РЎ&#65533;"=>"","РЎ&#381;"=>"","РЎ&#65533;"=>"",
"Р &#65533;"=>"","Р &#8216;"=>"","Р &#8217;"=>"","Р &#8220;"=>"","Р &#8221;"=>"","Р &#8226;"=>"","Р &#65533;"=>"","Р &#8211;"=>"","Р &#8212;"=>"","Р &#65533;"=>"","Р &#8482;"=>"","Р &#353;"=>"","Р &#8250;"=>"","Р &#339;"=>"","Р &#65533;"=>"","Р &#382;"=>"","Р &#376;"=>"","Р "=>"","РЎ"=>"","Рў"=>"","РЈ"=>"","Р¤"=>"","РҐ"=>"","Р¦"=>"","Р§"=>"","РЁ"=>"","Р©"=>"","РЄ"=>"","Р«"=>"","Р¬"=>"","Р­"=>"","Р®"=>"","РЇ"=>""));
return $str;
}


function check($message){
$message = str_replace("\\n", " ", $message);
$message = str_replace("\n", " ", $message);
$message = trim(" $message ");
$message = ereg_replace(" +"," ",$message);
$message = str_replace("$", "$$", $message);
$message = str_replace("", "", $message);
$message = str_replace("", "", $message);
$message = str_replace("", "", $message);
$message = str_replace("", "", $message);
$message = str_replace("", "", $message);
$message = str_replace("", "", $message);
$message = HtmlSpecialChars($message);
$message = str_replace("\"", "&quot;", $message);
$message = str_replace("|", "&#0166;", $message);
$message = str_replace("'", "&#8216;", $message);
$message = str_replace("\\", "", $message);
$message=addslashes($message);
return $message;
}




















function online_time(){
    GLOBAL $prev_url;
    $file = @file($prev_url."file/dat_folder/time_online.dat");
    $time = trim($file[0]);
    $ras = trim($file[1]);
    $admin = trim($file[2]);
    $nomre = trim($file[3]);
    if($ras == "day") {
        $ontime = (int)$time * 86400;
    } else if($ras == "hour") {
        $ontime = (int)$time * 3600;
    } else if($ras == "second") {
        $ontime = (int)$time * 60;
    }
    $ras = strtr($ras, array("day"=>"G&#252;n", "hour"=>"Saat", "second"=>"Deqiqe"));
    $ras = $time." ".$ras;
    return array($ontime, $ras, $admin, $nomre);
}


function count_files($dirname){
    if(is_dir($dirname)){
         $dir_handle = opendir($dirname);
    }
    if(!$dir_handle){
         return false;
    }
    $files = 0;
    while($file = readdir($dir_handle)){
        if($file != "." and $file != ".." and $file != ".htaccess" and $file != "Thumbs.db" and strrchr($file,'.')!=='.dat' and strrchr($file,'.')!=='.php' and strrchr($file,'.')!=='.wml' and strrchr($file,'.')!=='.inc'){
            if(!is_dir($dirname."/".$file)){
                 $files++;
            }else{
                 $files += count_files($dirname."/".$file);
            }
        }
    }
    closedir($dir_handle);
    return $files;
}



FUNCTION REAL_IP_BROWSER(){
    global $_SERVER;
    if(preg_match("/Opera Mini/i", $_SERVER['HTTP_USER_AGENT'])){
        $REMOTE_ADDR = strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
        if(empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
        }
        $HTTP_USER_AGENT = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
        if(empty($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])){
            $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
        }
    } else {
        $HTTP_USER_AGENT = htmlentities(addslashes($_SERVER["HTTP_USER_AGENT"]));
        $REMOTE_ADDR = htmlentities(addslashes($_SERVER["REMOTE_ADDR"]));
    }
return array($REMOTE_ADDR,$HTTP_USER_AGENT);
}









FUNCTION SELECT_USER_TIME($NEW)
{
    $DAY = @FLOOR($NEW / 86400);
    $HOUR = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
    $MINUT = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
    $SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
    RETURN @ARRAY($DAY,$HOUR,$MINUT,$SECOND,$NEW);
}

function ip_arr(){
    list($ip_1, $ip_2, $ip_3) = explode(".", $REMOTE_ADDR);
    return $ip_1.".".$ip_2.".".$ip_3;
}

function narmobilay($msg){
global $rm;
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,3000);
$msg = str_replace("", " ", $msg);
$msg = htmlentities($msg);
$a = array('&ouml;','&Ouml;','&uuml;','&Uuml;','&ccedil;','&Ccedil;');
$b = array('Р&#8220;В¶','Р&#8220;в&#8364;&#8220;','Р&#8220;С&#732;','Р&#8220;С&#353;','Р&#8220;В§','Р&#8220;в&#8364;Ў');
$msg = str_replace($a, $b, $msg);
$msg = html_entity_decode($msg);
$msg = htmlentities(trim($msg), ENT_QUOTES, 'UTF-8');
$error_s=array("iexcl", "cent","pound","curren", "yen", "brvbar", "sect", "uml", "copy", "ordf", "laquo","not", "shy", "reg", "macr", "deg", "plusmn", "sup2", "sup3", "acute","micro", "para", "middot", "cedil", "sup1", "ordm", "raquo", "frac14","frac12", "frac34", "iquest", "Agrave", "Aacute", "Acirc", "Atilde", "Auml","Aring", "AElig", "Ccedil", "Egrave", "Eacute", "Ecirc", "Euml", "Igrave","Iacute", "Icirc", "Iuml", "ETH", "Ntilde", "Ograve", "Oacute", "Ocirc","Otilde", "Ouml", "times", "Oslash", "Ugrave", "Uacute", "Ucirc", "Uuml","Yacute", "THORN", "szlig", "agrave", "aacute", "acirc", "atilde", "auml","aring", "aelig", "ccedil", "egrave", "eacute", "ecirc", "euml", "igrave","zwnj", "zwj", "diams","iacute", "icirc", "iuml", "eth", "ntilde", "ograve", "oacute", "ocirc","otilde", "ouml", "divide", "oslash", "ugrave", "uacute", "ucirc", "uuml","yacute", "thorn", "yuml", "OElig", "oelig", "Scaron", "scaron", "Yuml","fnof", "circ", "tilde", "Alpha", "Beta", "Gamma", "Delta", "Epsilon","Zeta", "Eta", "Theta", "Iota", "Kappa", "Lambda", "Mu", "Nu", "Xi","Omicron", "Pi", "Rho", "Sigma", "Tau", "Upsilon", "Phi", "Chi", "Psi","Omega", "alpha", "beta", "gamma", "delta", "epsilon", "zeta", "eta","theta", "iota", "kappa", "lambda", "mu", "nu", "xi", "omicron", "pi","rho", "sigmaf", "sigma", "tau", "upsilon", "phi", "chi", "psi", "omega","thetasym", "upsih", "piv", "ensp", "emsp", "thinsp", "lrm","hearts", "rlm", "ndash", "mdash", "lsquo", "rsquo", "sbquo", "ldquo", "rdquo","bdquo", "dagger", "Dagger", "bull", "hellip", "permil", "prime", "Prime","lsaquo", "rsaquo", "oline", "frasl", "euro", "image", "weierp", "real","trade", "alefsym", "larr", "uarr", "rarr", "darr", "harr", "crarr", "lArr","uArr", "rArr", "dArr", "hArr", "forall", "part", "exist", "empty", "nabla","isin", "notin", "ni", "prod", "sum", "minus", "lowast", "radic", "prop","infin", "ang", "and", "or", "cap", "cup", "int", "there4", "sim", "cong","asymp", "ne", "equiv", "le", "ge", "sub", "sup", "nsub", "sube", "supe","oplus", "otimes", "perp", "sdot", "lceil", "rceil", "lfloor","rfloor", "lang", "rang", "loz", "spades", "clubs");
$msg = str_replace("&Ouml;", "Р&#8220;в&#8364;&#8220;", $msg);
$msg = str_replace("&ouml;", "Р&#8220;В¶", $msg);
$msg = str_replace("&Uuml;", "Р&#8220;С&#353;", $msg);
$msg = str_replace("&uuml;", "Р&#8220;С&#732;", $msg);
$msg = str_replace("&Ccedil;", "Р&#8220;в&#8364;Ў", $msg);
$msg = str_replace("&ccedil;", "Р&#8220;В§", $msg);
$msg = str_replace("&".$error_s.";","",$msg);
$msg = preg_replace('/(&.+?)+(;)/i', '', $msg);
$msg = html_entity_decode(trim($msg));
$msg = str_replace("$", "$$", $msg);
$msg = strtr($msg,array(chr("0")=>"",chr("1")=>"",chr("2")=>"",chr("3")=>"",chr("4")=>"",chr("5")=>"",chr("6")=>"",chr("7")=>"",chr("8")=>"",chr("9")=>"",chr("10")=>"",chr("11")=>"",chr("12")=>"",chr("13")=>"",chr("14")=>"",chr("15")=>"",chr("16")=>"",chr("17")=>"",chr("18")=>"",chr("19")=>"",chr("20")=>"",chr("21")=>"",chr("22")=>"",chr("23")=>"",chr("24")=>"",chr("25")=>"",chr("26")=>"",chr("27")=>"",chr("28")=>"",chr("29")=>"",chr("30")=>"",chr("31")=>""));
$msg = htmlspecialchars($msg);
$msg = str_replace("\"", "&quot;", $msg);
$msg = str_replace("\&quot;", "&quot;", $msg);
$msg = str_replace("|", "&#0166;", $msg);
$msg = str_replace("'", "&#8216;", $msg);
$msg = str_replace("РїС&#8212;Р&#8230;", "", $msg);
if($rm!='0'){
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);
}
return $msg;
}



function smileay($message)
{
    global $prev_url;
    $base = "smiles";
    $mots = preg_split("/[\s,.?!:;]+/", $message, NULL, PREG_SPLIT_NO_EMPTY);
    foreach ($mots as $smile)
    {
        $dir = opendir($prev_url.$base);
        while ($directory = readdir($dir))
        {
            if($directory != "." and $directory != ".." and strrchr($directory, ".")!==".dat" and $directory != "Thumbs.db" and is_dir($prev_url.$base."/".$directory))
            {
                if(file_exists($prev_url.$base."/".$directory."/".$smile.".gif") and !strstr($message, "<img src=\""))
                {
                    $message = replace_smile($message, $directory, $smile);
                }
            }
        }
        closedir($dir);
    }
return $message;
}

function wmlpage($title, $text_page){
    global $site, $ref, $xml, $dtd;
    echo $xml;
    echo $dtd;
    echo "<wml>\n";
    echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
    echo "<card id=\"".strtolower($title)."\" title=\"$title\">\n";
    echo "<p align=\"center\">\n";
    echo "<small>\n";
    echo "$text_page\n";
    echo "<br/>----<br/><a href=\"http://$site/?$ref\">$site</a>\n";
    echo "</small>\n";
    echo "</p></card></wml>";
    exit();
}


function del_ref_forum($myfile){
    $oldtime = time() - 600;
    $dir = opendir($myfile);
    while($file = readdir($dir)){
        if($file != "." and $file != ".." and filemtime($myfile."/".$file) < $oldtime){
            @unlink($myfile."/".$file);
        }
    }
    closedir($dir);
}
function full_del_dir($directory){
    $dir = opendir($directory);
    while ($file = readdir($dir)){
        $r = mysql_query("select `user` from `users` where `id` = '".$file."';");
        if ( mysql_affected_rows() == 0 ){
            if (is_file($directory."/".$file)){
                @unlink($directory."/".$file);
            }else if (is_dir($directory."/".$file) && $file != "." && $file != ".."){
                full_del_dir($directory."/".$file);
            }
        }
    }
    @closedir($dir);
    @rmdir($directory);
}


function gen($size){
    $letter = 'qwertyuipasdfghjklzxcvbnm';
    $letter .= strtoupper($letter);
    $letter .= '123456789';
    mt_srand((double)microtime()*1000000);
    $gen = "";
    for ($i = 0; $i < $size; $i++){
        $gen .= $letter[mt_rand(0, strlen($letter)-1)];
    }
return $gen;
}
function number_nick($str)
{
  return strtolower(preg_replace(array('/[^0-9]/'), '', $str));
}
function bbses($bbses)
{
    $bbses=strtok($bbses,',');
        $bbses=str_ireplace("\"","",$bbses);
        $bbses=str_ireplace("\\","",$bbses);
        $bbses=str_ireplace("/","",$bbses);
        return $bbses;
}


function narmobilqey($msg){
global $rm;
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,3000);
$msg = str_replace("", " ", $msg);
$msg = htmlentities($msg);
$a = array( "&ouml;", "&Ouml;", "&uuml;", "&Uuml;", "&ccedil;", "&Ccedil;" );
$b = array( "&#1043;¶", "&#1043;–", "&#1043;&#1112;", "&#1043;&#1114;", "&#1043;§", "&#1043;‡" );
$msg = str_replace($a, $b, $msg);
$msg = html_entity_decode($msg);
$msg = htmlentities(trim($msg), ENT_QUOTES, 'UTF-8');
$error_s = ENT_QUOTES;
$msg = str_replace( "&Ouml;", "&#1043;–", $msg );
$msg = str_replace( "&ouml;", "&#1043;¶", $msg );
$msg = str_replace( "&Uuml;", "&#1043;&#1114;", $msg );
$msg = str_replace( "&uuml;", "&#1043;&#1112;", $msg );
$msg = str_replace( "&Ccedil;", "&#1043;‡", $msg );
$msg = str_replace( "&ccedil;", "&#1043;§", $msg );
$msg = str_replace( "&".$error_s.";", "", $msg );
$msg = preg_replace( "/(&.+?)+(;)/i", "", $msg );
$msg = html_entity_decode(trim($msg));
$msg = str_replace( "\$", "\$\$", $msg );
$msg = strtr($msg,array(chr("0")=>"",chr("1")=>"",chr("2")=>"",chr("3")=>"",chr("4")=>"",chr("5")=>"",chr("6")=>"",chr("7")=>"",chr("8")=>"",chr("9")=>"",chr("10")=>"",chr("11")=>"",chr("12")=>"",chr("13")=>"",chr("14")=>"",chr("15")=>"",chr("16")=>"",chr("17")=>"",chr("18")=>"",chr("19")=>"",chr("20")=>"",chr("21")=>"",chr("22")=>"",chr("23")=>"",chr("24")=>"",chr("25")=>"",chr("26")=>"",chr("27")=>"",chr("28")=>"",chr("29")=>"",chr("30")=>"",chr("31")=>""));
$msg = htmlspecialchars( $msg );
$msg = str_replace( "\"", "&quot;", $msg );
$msg = str_replace( "\\&quot;", "&quot;", $msg );
$msg = str_replace( "|", "&#0166;", $msg );
$msg = str_replace( "'", "&#8216;", $msg );
$msg = str_replace( "&#1087;&#1111;&#1029;", "", $msg );
$msg = str_replace( "\\", "", $msg );
if($rm!='0'){
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);
$msg = str_replace("refresh", "&#350;", $msg);
$msg = str_replace("equiv", "&#350;", $msg);
$msg = str_replace("url=", "&#350;", $msg);
}
return $msg;
}



function narmobilqefes($msg){
global $rm;
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,3000);
$msg = str_replace("", " ", $msg);
$msg = htmlentities($msg);
$a = array( "&ouml;", "&Ouml;", "&uuml;", "&Uuml;", "&ccedil;", "&Ccedil;" );
$b = array( "&#1043;¶", "&#1043;–", "&#1043;&#1112;", "&#1043;&#1114;", "&#1043;§", "&#1043;‡" );
$msg = str_replace($a, $b, $msg);
$msg = html_entity_decode($msg);
$msg = htmlentities(trim($msg), ENT_QUOTES, 'UTF-8');
$error_s = ENT_QUOTES;
$msg = str_replace( "&Ouml;", "&#1043;–", $msg );
$msg = str_replace( "&ouml;", "&#1043;¶", $msg );
$msg = str_replace( "&Uuml;", "&#1043;&#1114;", $msg );
$msg = str_replace( "&uuml;", "&#1043;&#1112;", $msg );
$msg = str_replace( "&Ccedil;", "&#1043;‡", $msg );
$msg = str_replace( "&ccedil;", "&#1043;§", $msg );
$msg = str_replace( "&".$error_s.";", "", $msg );
$msg = preg_replace( "/(&.+?)+(;)/i", "", $msg );
$msg = html_entity_decode(trim($msg));
$msg = str_replace( "\$", "\$\$", $msg );
$msg = strtr($msg,array(chr("0")=>"",chr("1")=>"",chr("2")=>"",chr("3")=>"",chr("4")=>"",chr("5")=>"",chr("6")=>"",chr("7")=>"",chr("8")=>"",chr("9")=>"",chr("10")=>"",chr("11")=>"",chr("12")=>"",chr("13")=>"",chr("14")=>"",chr("15")=>"",chr("16")=>"",chr("17")=>"",chr("18")=>"",chr("19")=>"",chr("20")=>"",chr("21")=>"",chr("22")=>"",chr("23")=>"",chr("24")=>"",chr("25")=>"",chr("26")=>"",chr("27")=>"",chr("28")=>"",chr("29")=>"",chr("30")=>"",chr("31")=>""));
$msg = htmlspecialchars( $msg );
$msg = str_replace( "\"", "&quot;", $msg );
$msg = str_replace( "\\&quot;", "&quot;", $msg );
$msg = str_replace( "|", "&#0166;", $msg );
$msg = str_replace( "'", "&#8216;", $msg );
$msg = str_replace( "&#1087;&#1111;&#1029;", "", $msg );
$msg = str_replace( "\\", "", $msg );
if($rm!='0'){
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);
$msg = str_replace("refresh", "&#350;", $msg);
$msg = str_replace("equiv", "&#350;", $msg);
$msg = str_replace("url=", "&#350;", $msg);
}
return $msg;
}





function cc_tarixay($time=NULL)
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



function select_nk($nk) {
    $nk = intval($nk);
    $users = @mysql_query("SELECT * FROM users WHERE id='".$nk."'");
    if(mysql_affected_rows() == false) {
        return "<b>Nick silinib</b>";
    } else {
        return mysql_fetch_object($users);
    }
}






function navigation($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE)
{
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1)
	{
		return '';
	}
    else
    {
        print "*****<br/>";
    }
    $start_item = $start_item * $per_page;
	$on_page = floor($start_item / $per_page) + 1;
	$page_string = '';
	if ($on_page == 1)
	{
		$page_string = 'Evvelki | <a href="'.$base_url."&amp;page=".($on_page).'">N&#246;vbeti</a><br/>';
	}
	if ($on_page == $total_pages)
	{
		$page_string = '<a href="'.$base_url."&amp;page=".(($on_page - 2)).'">Evvelki</a> | N&#246;vbeti<br/>';
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
	$page_string = $page_string.$select_list;
	return $page_string."<br/>";
    echo "<br/>";
}





FUNCTION REG_BONUS($ID) {
    $FILE = @FILE("file/dat_folder/auto_reg_priz.dat");
    $SQL_USERS = @MYSQL_QUERY("SELECT * FROM users WHERE id='".$ID."'");
    IF(MYSQL_AFFECTED_ROWS() != FALSE) {
        $OBJ = @MYSQL_FETCH_OBJECT($SQL_USERS);
        IF($OBJ->banned == 0) {
            $_BONUS_BAL = TRIM($FILE[0]);
            $_BONUS_POST = TRIM($FILE[1]);
            $_BONUS_LEVEL = TRIM($FILE[2]);
            IF($_BONUS_BAL != 0) {
                @MYSQL_QUERY("UPDATE users SET bal='".$_BONUS_BAL."' WHERE id='".$ID."'");
            }
            IF($_BONUS_POST != 0) {
                @MYSQL_QUERY("UPDATE users SET posts='".$_BONUS_POST."' WHERE id='".$ID."'");
            }
            IF($_BONUS_LEVEL != 0) {
                $LEVELS = @MYSQL_QUERY("SELECT * FROM levels WHERE level='".$_BONUS_LEVEL."'");
                $LEVELS = @MYSQL_FETCH_OBJECT($LEVELS);
                @MYSQL_QUERY("UPDATE users SET level='".$_BONUS_LEVEL."', status='".$LEVELS->name."' WHERE id='".$ID."'");
            }
        }
    }
}


function del_nolat($str)
{
        $a = array( "&#1073;&#8470;€", "&#1073;&#1108;­", "&#1073;&#1108;&#8470;", "&#1050;&#1106;", "&#1073;»&#1033;", "&#1058;&#1025;", "&#1049;‘", "&#1074;„®", "&#1073;&#1105;&#1026;", "&#1046;¬", "&#1073;»‹", "&#1046;&#1116;", "&#1050;&#1026;", "&#1054;&#1031;", "&#1049;­", "&#1054;®", "&#1054;€", "&#1042;&#1032;", "&#1054;°", "&#1042;&#1038;", "&#1056;&#1106;", "&#1046;&#1039;", "&#1049;™", "&#1043;&#1027;", "&#1043;‚", "&#1043;&#1107;", "&#1043;„", "&#1043;…", "&#1043;†", "&#1043;€", "&#1043;‰", "&#1043;&#1033;", "&#1043;‹", "&#1043;&#1034;", "&#1043;&#1036;", "&#1043;&#1035;", "&#1043;&#1039;", "&#1043;&#1106;", "&#1043;‘", "&#1043;’", "&#1043;“", "&#1043;”", "&#1043;•", "&#1043;&#152;", "&#1043;™", "&#1043;&#1113;", "&#1043;›", "&#1043;&#1116;", "&#1043;&#1119;", "&#1043; ", "&#1043;&#1038;", "&#1043;&#1118;", "&#1043;&#1032;", "&#1043;¤", "&#1043;&#1168;", "&#1043;¦", "&#1043;&#1025;", "&#1043;©", "&#1043;&#1028;", "&#1043;«", "&#1043;¬", "&#1043;­", "&#1043;®", "&#1043;&#1031;", "&#1043;±", "&#1043;&#1030;", "&#1043;&#1110;", "&#1043;&#1169;", "&#1043;µ", "&#1043;&#1105;", "&#1043;&#8470;", "&#1043;&#1108;", "&#1043;»", "&#1043;&#1029;", "&#1043;&#1111;", "&#1044;&#1026;", "&#1044;&#1027;", "&#1044;‚", "&#1044;&#1107;", "&#1044;„", "&#1044;…", "&#1044;†", "&#1044;‡", "&#1044;€", "&#1044;‰", "&#1044;&#1033;", "&#1044;‹", "&#1044;&#1034;", "&#1044;&#1036;", "&#1044;&#1035;", "&#1044;&#1039;", "&#1044;&#1106;", "&#1044;‘", "&#1044;’", "&#1044;“", "&#1044;”", "&#1044;•", "&#1044;–", "&#1044;—", "&#1044;&#152;", "&#1044;™", "&#1044;&#1113;", "&#1044;›", "&#1044;&#1114;", "&#1044;&#1116;", "&#1044; ", "&#1044;&#1038;", "&#1044;&#1118;", "&#1044;&#1032;", "&#1044;¤", "&#1044;&#1168;", "&#1044;¦", "&#1044;§", "&#1044;&#1025;", "&#1044;©", "&#1044;&#1028;", "&#1044;«", "&#1044;¬", "&#1044;­", "&#1044;®", "&#1044;&#1031;", "&#1044;&#1030;", "&#1044;&#1110;", "&#1044;&#1169;", "&#1044;µ", "&#1044;¶", "&#1044;·", "&#1044;&#8470;", "&#1044;&#1108;", "&#1044;»", "&#1044;&#1112;", "&#1044;&#1029;", "&#1044;&#1109;", "&#1044;&#1111;", "&#1045;&#1026;", "&#1045;&#1027;", "&#1045;‚", "&#1045;&#1107;", "&#1045;„", "&#1045;…", "&#1045;†", "&#1045;‡", "&#1045;€", "&#1045;‰", "&#1045;&#1034;", "&#1045;&#1036;", "&#1045;&#1035;", "&#1045;&#1039;", "&#1045;&#1106;", "&#1045;‘", "&#1045;’", "&#1045;“", "&#1045;”", "&#1045;•", "&#1045;–", "&#1045;—", "&#1045;&#152;", "&#1045;™", "&#1045;&#1113;", "&#1045;›", "&#1045;&#1114;", "&#1045;&#1116;", "&#1045; ", "&#1045;&#1038;", "&#1045;&#1118;", "&#1045;&#1032;", "&#1045;¤", "&#1045;&#1168;", "&#1045;¦", "&#1045;§", "&#1045;&#1025;", "&#1045;©", "&#1045;&#1028;", "&#1045;«", "&#1045;¬", "&#1045;­", "&#1045;®", "&#1045;&#1031;", "&#1045;°", "&#1045;±", "&#1045;&#1030;", "&#1045;&#1110;", "&#1045;&#1169;", "&#1045;µ", "&#1045;¶", "&#1045;·", "&#1045;&#1105;", "&#1045;&#8470;", "&#1045;&#1108;", "&#1045;»", "&#1045;&#1112;", "&#1045;&#1029;", "&#1045;&#1109;", "&#1045;&#1111;", "&#1046;’", "&#1046; ", "&#1046;&#1038;", "&#1046;&#1031;", "&#1046;°", "&#1047;&#1036;", "&#1047;&#1035;", "&#1047;&#1039;", "&#1047;&#1106;", "&#1047;‘", "&#1047;’", "&#1047;“", "&#1047;”", "&#1047;•", "&#1047;–", "&#1047;—", "&#1047;&#152;", "&#1047;™", "&#1047;&#1113;", "&#1047;›", "&#1047;&#1114;", "&#1047;&#1108;", "&#1047;»", "&#1047;&#1112;", "&#1047;&#1029;", "&#1047;&#1109;", "&#1047;&#1111;" );
        $b = array( "n", "a", "e", "z", "i", "a", "a", "e", "a", "t", "i", "n", "i", "i", "n", "e", "e", "u", "i", "A", "E", "e", "A", "A", "A", "A", "A", "AE", "E", "E", "E", "E", "I", "I", "I", "I", "D", "N", "O", "O", "O", "O", "O", "U", "U", "U", "Y", "s", "a", "a", "a", "a", "a", "a", "ae", "e", "e", "e", "e", "i", "i", "i", "i", "n", "o", "o", "o", "o", "o", "u", "u", "u", "y", "y", "A", "a", "A", "a", "A", "a", "C", "c", "C", "c", "C", "c", "C", "c", "D", "d", "D", "d", "E", "e", "E", "e", "E", "e", "E", "e", "E", "e", "G", "g", "G", "g", "G", "g", "H", "h", "H", "h", "I", "i", "I", "i", "I", "i", "I", "i", "IJ", "ij", "J", "j", "K", "k", "L", "l", "L", "l", "L", "l", "L", "l", "l", "l", "N", "n", "N", "n", "N", "n", "n", "O", "o", "O", "o", "O", "o", "OE", "oe", "R", "r", "R", "r", "R", "r", "S", "s", "S", "s", "S", "s", "T", "t", "T", "t", "T", "t", "U", "u", "U", "u", "U", "u", "U", "u", "U", "u", "U", "u", "W", "w", "Y", "y", "Y", "Z", "z", "Z", "z", "Z", "z", "s", "f", "O", "o", "U", "u", "A", "a", "I", "i", "O", "o", "U", "u", "U", "u", "U", "u", "U", "u", "U", "u", "A", "a", "AE", "ae", "O", "o" );
        return str_replace( $a, $b, $str );
}


function OPERATOR1($USER_IP)
{
    require("file/require/update.inc");
    while($i <= sizeof($savik_adres))
    {
        if(ip2long($USER_IP) > ip2long($savik_adres[$i][0]) and ip2long($USER_IP) < ip2long($savik_adres[$i][1]))
        {
            return $savik_adres[$i][2];
        }
        ++$i;
    }
return "NULL";
}




function chkdsk($txt, $basename, $filed = NULL) {
    $txt = del_nolat($txt);
    global $row;
    global $HTTP_GET_VARS;
    global $HTTP_POST_VARS;
    if (1000 <= $row['posts'] or $row['id']==1) {
        return $txt;
    }
    $message = false;
    $filed = isset($filed) ? $filed." b&#246;lmesinde: " : false;
    $msg = isset($HTTP_POST_VARS['msg']) ? $HTTP_POST_VARS['msg'] : $HTTP_GET_VARS['msg'];
    $rm = isset($HTTP_POST_VARS['rm']) ? $HTTP_POST_VARS['rm'] : $HTTP_GET_VARS['rm'];
    $nk = isset($HTTP_POST_VARS['nk']) ? $HTTP_POST_VARS['nk'] : $HTTP_GET_VARS['nk'];
    if ($basename == "online_sms.php") {
        $message = db_user($nk)." - (Online SMS): ";
    } else if ($basename == "stsonline.php") {
        $message = db_user($nk)." - (Online Status): ";
    } else if ($basename == "upload.php") {
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
        $prvt = isset($HTTP_POST_VARS['prvt']) ? $HTTP_POST_VARS['prvt'] : $HTTP_GET_VARS['prvt'];
        if ($prvt == 1) {
            $prvt = "&#350;exsi";
        } else {
            $prvt = "&#220;mumi";
        }
        $message = db_user($live_user)." (".$room_name." - Ota&#287;&#305;nda $prvt):<br/>\n";
    }
    return auto_ban($txt, $message, $row['user']);
}
function auto_ban($msg, $msg2, $user)
{
    global $HTTP_GET_VARS;
    global $HTTP_POST_VARS;
    global $xsat;
    $data = @file_get_contents("file/dat_folder/black.dat");
    if ($data == false)
    {
        return $msg;
    }
    $arr = explode("\n", $data);
    $id = isset($HTTP_POST_VARS['id']) ? $HTTP_POST_VARS['id'] : $HTTP_GET_VARS['id'];
    $msg1 = $msg;
    $msg = str_replace( "noqte", "", $msg );
    $msg = str_replace( "nqte", "", $msg );
    $msg = str_replace( "noqt", "", $msg );
    $msg = str_replace( "nokte", "", $msg );
    $msg = str_replace( "nkte", "", $msg );
    $msg = str_replace( "nokt", "", $msg );
    $msg = str_replace( "nqt", "", $msg );
    $msg = str_replace( "?", "A", $msg );
    $msg = str_replace( "?°", "a", $msg );
    $msg = str_replace( "?’", "B", $msg );
    $msg = str_replace( "?¡", "C", $msg );
    $msg = str_replace( "Ñ", "c", $msg );
    $msg = str_replace( "?•", "E", $msg );
    $msg = str_replace( "?µ", "e", $msg );
    $msg = str_replace( "?œ", "M", $msg );
    $msg = str_replace( "?¼", "m", $msg );
    $msg = str_replace( "?¢", "T", $msg );
    $msg = str_replace( "??", "O", $msg );
    $msg = str_replace( "0", "O", $msg );
    $msg = str_replace( "?¾", "o", $msg );
    $msg = str_replace( "?º", "k", $msg );
    $msg = str_replace( "?š", "K", $msg );
    foreach ($arr as $key => $value)
    {
        $val = explode("|", $value);
        $value = trim($val['0']);
        $simvolsuz = trim($val['1']);
        if ($simvolsuz == "1")
        {
            $msg = simvolsuz($msg);
        }
        else
        {
        }
        if (!(stristr(html_entity_decode(strtolower(trim($msg))), strtolower($value))!= false))
        {
            continue;
        }
        if (trim($val[2]) == "0")
        {
            $banned = "";
        }
        else if (trim($val[2]) == "1")
        {
            $banned = "`banned` = '1'";
        }
        else if (trim($val[2]) == "2" )
        {
            $banned = "`banned` = '2'";
        }
        else if (trim($val[2]) == "3")
        {
            $banned = "`inv` = '2'";
        }
        else
        {
            $banned = "`kik` = '".(time() + bannedtime(trim($val[2])))."'";
        }
        if (stristr(html_entity_decode(trim($msg2)), "qeydiyyatdan")!= false)
        {
            setcookie("vreg", time() + 86400, time() + 86400);
            $pass = isset($HTTP_POST_VARS['pass']) ? $HTTP_POST_VARS['pass'] : $HTTP_GET_VARS['pass'];
            $user = isset($HTTP_POST_VARS['user']) ? $HTTP_POST_VARS['user'] : $HTTP_GET_VARS['user'];
            if (trim($val[4]) == "1")
            {
                mysql_query("INSERT INTO `auto_ban_v2` SET  `message`='".$msg2.htmlspecialchars($msg1)."', `sebeb`='".trim($val[3])."', `banned`='".$val[2]."', `banmsg`='".$value."', `time`='".time()."';");
            }
            header("Location: reg.php?ref=".$HTTP_GET_VARS['ref']."");
            return false;
        }
        mysql_query("Update `users` set `whykik`='".trim($val[3])."', `whokik`='Sistem', `time`='".time()."-1', ".$banned." where `id` ='".$id."';");
        if (trim($val[4]) == "1")
        {
            mysql_query("INSERT INTO `auto_ban_v2` SET `usid`='".$id."', `user`='".$user."', `message`='".$msg2.htmlspecialchars($msg1)."', `sebeb`='".trim($val[3])."', `banned`='".$val[2]."', `banmsg`='".$value."', `time`='".time()."';");
        }
        header("Location: session.php?id=".$id."&ps=".$HTTP_GET_VARS['ps']."&ref=".$HTTP_GET_VARS['ref']."");
        return false;
    }
    return $msg1;
}

?>