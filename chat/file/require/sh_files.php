<?
function narmobil($msg){

global $rm;
$msg = trim(" $msg ");
$ms_sql = mysql_query("SELECT `id`, `soz`, `evez` FROM `filtr` WHERE `id`!= '0'");
while($fl_us = mysql_fetch_array($ms_sql)){
$msg = str_replace("".$fl_us["soz"]."","".$fl_us["evez"]."",$msg);
}
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,3000);
$msg = str_replace("", " ", $msg);
$msg = htmlentities($msg);
$a = array('&ouml;','&Ouml;','&uuml;','&Uuml;','&ccedil;','&Ccedil;','&#399;','&#601;');

$b = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü','Ə','ə');

$msg = str_replace($a, $b, $msg); 
$msg = html_entity_decode($msg);
$msg = htmlentities(trim($msg), ENT_QUOTES, 'UTF-8'); 
$error_s=array("iexcl", "cent","pound","curren", "yen", "brvbar", "sect", "uml", "copy", "ordf", "laquo","not", "shy", "reg", "macr", "deg", "plusmn", "sup2", "sup3", "acute","micro", "para", "middot", "cedil", "sup1", "ordm", "raquo", "frac14","frac12", "frac34", "iquest", "Agrave", "Aacute", "Acirc", "Atilde", "Auml","Aring", "AElig", "Ccedil", "Egrave", "Eacute", "Ecirc", "Euml", "Igrave","Iacute", "Icirc", "Iuml", "ETH", "Ntilde", "Ograve", "Oacute", "Ocirc","Otilde", "Ouml", "times", "Oslash", "Ugrave", "Uacute", "Ucirc", "Uuml","Yacute", "THORN", "szlig", "agrave", "aacute", "acirc", "atilde", "auml","aring", "aelig", "ccedil", "egrave", "eacute", "ecirc", "euml", "igrave","zwnj", "zwj", "diams","iacute", "icirc", "iuml", "eth", "ntilde", "ograve", "oacute", "ocirc","otilde", "ouml", "divide", "oslash", "ugrave", "uacute", "ucirc", "uuml","yacute", "thorn", "yuml", "OElig", "oelig", "Scaron", "scaron", "Yuml","fnof", "circ", "tilde", "Alpha", "Beta", "Gamma", "Delta", "Epsilon","Zeta", "Eta", "Theta", "Iota", "Kappa", "Lambda", "Mu", "Nu", "Xi","Omicron", "Pi", "Rho", "Sigma", "Tau", "Upsilon", "Phi", "Chi", "Psi","Omega", "alpha", "beta", "gamma", "delta", "epsilon", "zeta", "eta","theta", "iota", "kappa", "lambda", "mu", "nu", "xi", "omicron", "pi","rho", "sigmaf", "sigma", "tau", "upsilon", "phi", "chi", "psi", "omega","thetasym", "upsih", "piv", "ensp", "emsp", "thinsp", "lrm","hearts", "rlm", "ndash", "mdash", "lsquo", "rsquo", "sbquo", "ldquo", "rdquo","bdquo", "dagger", "Dagger", "bull", "hellip", "permil", "prime", "Prime","lsaquo", "rsaquo", "oline", "frasl", "euro", "image", "weierp", "real","trade", "alefsym", "larr", "uarr", "rarr", "darr", "harr", "crarr", "lArr","uArr", "rArr", "dArr", "hArr", "forall", "part", "exist", "empty", "nabla","isin", "notin", "ni", "prod", "sum", "minus", "lowast", "radic", "prop","infin", "ang", "and", "or", "cap", "cup", "int", "there4", "sim", "cong","asymp", "ne", "equiv", "le", "ge", "sub", "sup", "nsub", "sube", "supe","oplus", "otimes", "perp", "sdot", "lceil", "rceil", "lfloor","rfloor", "lang", "rang", "loz", "spades", "clubs");
$msg = str_replace("&Ouml;", "Ö", $msg);
$msg = str_replace("&ouml;", "ö", $msg);
$msg = str_replace("&Uuml;", "Ü", $msg);
$msg = str_replace("&uuml;", "ü", $msg);
$msg = str_replace("&Ccedil;", "Ç", $msg);
$msg = str_replace("&ccedil;", "ç", $msg);
$msg = str_replace("&#601;", "ə", $msg);



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
$msg = str_replace("�", "", $msg);
$msg = str_replace("\\", "", $msg);
if($rm!='0'){
$msg = str_replace("ch", "&#231;", $msg);
$msg = str_replace("gh", "&#287;", $msg);
$msg = str_replace("sh", "&#351;", $msg);
$msg = str_replace("w", "&#351;", $msg);
$msg = str_replace("W", "&#350;", $msg);


}
return $msg;
}


function narmobila($msg){
$msg = trim(" $msg ");
$msg = ereg_replace(" +"," ",$msg);
$msg = substr($msg,0,5000);
$msg = str_replace("", " ", $msg);
$msg = htmlentities($msg);
$a = array('&ouml;','&Ouml;','&uuml;','&Uuml;','&ccedil;','&Ccedil;','&#399;','&#601;');
$b = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü','Ə','ə');


$msg = str_replace($a, $b, $msg); 
$msg = html_entity_decode($msg);
$msg = htmlentities(trim($msg), ENT_QUOTES, 'UTF-8'); 
$error_s=array("iexcl", "cent","pound","curren", "yen", "brvbar", "sect", "uml", "copy", "ordf", "laquo","not", "shy", "reg", "macr", "deg", "plusmn", "sup2", "sup3", "acute","micro", "para", "middot", "cedil", "sup1", "ordm", "raquo", "frac14","frac12", "frac34", "iquest", "Agrave", "Aacute", "Acirc", "Atilde", "Auml","Aring", "AElig", "Ccedil", "Egrave", "Eacute", "Ecirc", "Euml", "Igrave","Iacute", "Icirc", "Iuml", "ETH", "Ntilde", "Ograve", "Oacute", "Ocirc","Otilde", "Ouml", "times", "Oslash", "Ugrave", "Uacute", "Ucirc", "Uuml","Yacute", "THORN", "szlig", "agrave", "aacute", "acirc", "atilde", "auml","aring", "aelig", "ccedil", "egrave", "eacute", "ecirc", "euml", "igrave","zwnj", "zwj", "diams","iacute", "icirc", "iuml", "eth", "ntilde", "ograve", "oacute", "ocirc","otilde", "ouml", "divide", "oslash", "ugrave", "uacute", "ucirc", "uuml","yacute", "thorn", "yuml", "OElig", "oelig", "Scaron", "scaron", "Yuml","fnof", "circ", "tilde", "Alpha", "Beta", "Gamma", "Delta", "Epsilon","Zeta", "Eta", "Theta", "Iota", "Kappa", "Lambda", "Mu", "Nu", "Xi","Omicron", "Pi", "Rho", "Sigma", "Tau", "Upsilon", "Phi", "Chi", "Psi","Omega", "alpha", "beta", "gamma", "delta", "epsilon", "zeta", "eta","theta", "iota", "kappa", "lambda", "mu", "nu", "xi", "omicron", "pi","rho", "sigmaf", "sigma", "tau", "upsilon", "phi", "chi", "psi", "omega","thetasym", "upsih", "piv", "ensp", "emsp", "thinsp", "lrm","hearts", "rlm", "ndash", "mdash", "lsquo", "rsquo", "sbquo", "ldquo", "rdquo","bdquo", "dagger", "Dagger", "bull", "hellip", "permil", "prime", "Prime","lsaquo", "rsaquo", "oline", "frasl", "euro", "image", "weierp", "real","trade", "alefsym", "larr", "uarr", "rarr", "darr", "harr", "crarr", "lArr","uArr", "rArr", "dArr", "hArr", "forall", "part", "exist", "empty", "nabla","isin", "notin", "ni", "prod", "sum", "minus", "lowast", "radic", "prop","infin", "ang", "and", "or", "cap", "cup", "int", "there4", "sim", "cong","asymp", "ne", "equiv", "le", "ge", "sub", "sup", "nsub", "sube", "supe","oplus", "otimes", "perp", "sdot", "lceil", "rceil", "lfloor","rfloor", "lang", "rang", "loz", "spades", "clubs");
$msg = str_replace("&Ouml;", "O", $msg);
$msg = str_replace("&ouml;", "o", $msg);
$msg = str_replace("&Uuml;", "U", $msg);
$msg = str_replace("&uuml;", "u", $msg);
$msg = str_replace("&Ccedil;", "C", $msg);
$msg = str_replace("&ccedil;", "c", $msg);
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
$msg = str_replace("�", "", $msg);
$msg = str_replace("\\", "", $msg);
$msg = str_replace("\\n", " ", $msg);
$msg = str_replace("\n", " ", $msg);
$msg = str_replace("#_", "<br/>", $msg);
return $msg;
}

function rus_to_k($str){
				$str = str_replace("ذ°","a",$str);
				$str = str_replace("ذ±","b",$str);
				$str = str_replace("ذ²","v",$str);
				$str = str_replace("ذ³","g",$str);
				$str = str_replace("ذ´","d",$str);
				$str = str_replace("ذµ","e",$str);
				$str = str_replace("ï؟½&#8216;","e",$str);
				$str = str_replace("ذ¶","j",$str);
				$str = str_replace("ذ·","z",$str);
				$str = str_replace("ذ¸","i",$str);
				$str = str_replace("ذ¹","y",$str);
				$str = str_replace("ذ؛","k",$str);
				$str = str_replace("ذ»","l",$str);
				$str = str_replace("ذ¼","m",$str);
				$str = str_replace("ذ½","n",$str);
				$str = str_replace("ذ¾","o",$str);
				$str = str_replace("ذ؟","p",$str);
				$str = str_replace("ï؟½&#8364;","r",$str);
				$str = str_replace("رپ","s",$str);
				$str = str_replace("ï؟½&#8218;","t",$str);
				$str = str_replace("ï؟½&#402;","u",$str);
				$str = str_replace("ï؟½&#8222;","f",$str);
				$str = str_replace("ï؟½&#8230;","h",$str);
				$str = str_replace("ï؟½&#8225;","c",$str);
				$str = str_replace("ï؟½&#8224;","q",$str);
				$str = str_replace("ï؟½&#710;","w",$str);
				$str = str_replace("ï؟½&#8240;",">",$str);
				$str = str_replace("ï؟½&#338;","<",$str);
				$str = str_replace("ï؟½&#8249;","x",$str);
				$str = str_replace("ï؟½&#352;",".",$str);
				$str = str_replace("رچ",":",$str);
				$str = str_replace("رژ",";",$str);
				$str = str_replace("رڈ","}",$str);
				$str = str_replace("ذگ","a",$str);
				$str = str_replace("ï؟½&#8216;","b",$str);
				$str = str_replace("ï؟½&#8217;","v",$str);
				$str = str_replace("ï؟½&#8220;","g",$str);
				$str = str_replace("ï؟½&#8221;","d",$str);
				$str = str_replace("ï؟½&#8226;","e",$str);
				$str = str_replace("ذپ","e",$str);
				$str = str_replace("ï؟½&#8211;","j",$str);
				$str = str_replace("ï؟½&#8212;","z",$str);
				$str = str_replace("ï؟½&#65533;","i",$str);
				$str = str_replace("ï؟½&#8482;","y",$str);
				$str = str_replace("ï؟½&#353;","k",$str);
				$str = str_replace("ï؟½&#8250;","l",$str);
				$str = str_replace("ï؟½&#339;","m",$str);
				$str = str_replace("ذ‌","n",$str);
				$str = str_replace("ذ‍","o",$str);
				$str = str_replace("ï؟½&#376;","p",$str);
				$str = str_replace("ذ ","r",$str);
				$str = str_replace("ذ،","s",$str);
				$str = str_replace("ذ¢","t",$str);
				$str = str_replace("ذ£","u",$str);
				$str = str_replace("ذ¤","f",$str);
				$str = str_replace("ذ¥","h",$str);
				$str = str_replace("ذ§","c",$str);
				$str = str_replace("ذ¦","q",$str);
				$str = str_replace("ذ¨","w",$str);
				$str = str_replace("ذ©",">",$str);
				$str = str_replace("ذ¬","<",$str);
				$str = str_replace("ذ«","x",$str);
				$str = str_replace("ذھ",".",$str);
				$str = str_replace("ذ­",":",$str);
				$str = str_replace("ذ®",";",$str);
				$str = str_replace("ذ¯","}",$str);
				return $str;
				}

function win_to_utf($str){
$str=strtr($str,array(""=>"ذ°",""=>"ذ±",""=>"ذ²",""=>"ذ³",""=>"ذ´",""=>"ذµ",""=>"ï؟½&#8216;",""=>"ذ¶",""=>"ذ·",""=>"ذ¸",""=>"ذ¹",""=>"ذ؛",""=>"ذ»",""=>"ذ¼",""=>"ذ½",""=>"ذ¾",""=>"ذ؟",""=>"ï؟½&#8364;",""=>"رپ",""=>"ï؟½&#8218;",""=>"ï؟½&#402;",""=>"ï؟½&#8222;",""=>"ï؟½&#8230;",""=>"ï؟½&#8224;",""=>"ï؟½&#8225;",""=>"ï؟½&#710;",""=>"ï؟½&#8240;",""=>"ï؟½&#352;",""=>"ï؟½&#8249;",""=>"ï؟½&#338;",""=>"رچ",""=>"رژ",""=>"رڈ",
""=>"ذگ",""=>"ï؟½&#8216;",""=>"ï؟½&#8217;",""=>"ï؟½&#8220;",""=>"ï؟½&#8221;",""=>"ï؟½&#8226;",""=>"ذپ",""=>"ï؟½&#8211;",""=>"ï؟½&#8212;",""=>"?",""=>"ï؟½&#8482;",""=>"ï؟½&#353;",""=>"ï؟½&#8250;",""=>"ï؟½&#339;",""=>"ذ‌",""=>"ذ‍",""=>"ï؟½&#376;",""=>"ذ ",""=>"ذ،",""=>"ذ¢",""=>"ذ£",""=>"ذ¤",""=>"ذ¥",""=>"ذ¦",""=>"ذ§",""=>"ذ¨",""=>"ذ©",""=>"ذھ",""=>"ذ«",""=>"ذ¬",""=>"ذ­",""=>"ذ®",""=>"ذ¯"));
 return $str;
}

function utf_to_win($str){
$str=strtr($str,array("ذ°"=>"","ذ±"=>"","ذ²"=>"","ذ³"=>"","ذ´"=>"","ذµ"=>"","ï؟½&#8216;"=>"","ذ¶"=>"","ذ·"=>"","ذ¸"=>"","ذ¹"=>"","ذ؛"=>"","ذ»"=>"","ذ¼"=>"","ذ½"=>"","ذ¾"=>"","ذ؟"=>"","ï؟½&#8364;"=>"","رپ"=>"","ï؟½&#8218;"=>"","ï؟½&#402;"=>"","ï؟½&#8222;"=>"","ï؟½&#8230;"=>"","ï؟½&#8224;"=>"","ï؟½&#8225;"=>"","ï؟½&#710;"=>"","ï؟½&#8240;"=>"","ï؟½&#352;"=>"","ï؟½&#8249;"=>"","ï؟½&#338;"=>"","رچ"=>"","رژ"=>"","رڈ"=>"",
"ذگ"=>"","ï؟½&#8216;"=>"","ï؟½&#8217;"=>"","ï؟½&#8220;"=>"","ï؟½&#8221;"=>"","ï؟½&#8226;"=>"","ذپ"=>"","ï؟½&#8211;"=>"","ï؟½&#8212;"=>"","ï؟½&#65533;"=>"","ï؟½&#8482;"=>"","ï؟½&#353;"=>"","ï؟½&#8250;"=>"","ï؟½&#339;"=>"","ذ‌"=>"","ذ‍"=>"","ï؟½&#376;"=>"","ذ "=>"","ذ،"=>"","ذ¢"=>"","ذ£"=>"","ذ¤"=>"","ذ¥"=>"","ذ¦"=>"","ذ§"=>"","ذ¨"=>"","ذ©"=>"","ذھ"=>"","ذ«"=>"","ذ¬"=>"","ذ­"=>"","ذ®"=>"","ذ¯"=>""));
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



?>