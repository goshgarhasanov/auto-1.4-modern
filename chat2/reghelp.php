<?

ini_set('error_reporting', 0);
ini_set('session.use_cookies', 1);
ini_set('session.use_trans_sid', 1);
ini_set('register_globals', 1);
session_name('SID');
session_start();

session_register ("regtime");
$_SESSION["regtime"]=time()-10;

header("Cache-Control: no-cache");
header("Content-type:text/vnd.wap.wml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">\n";
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"help\" title=\"Qaydalar\">\n";
echo "<p>\n";
echo "<small><b>Qaydalar:</b></small><br/>";
$xfile = file("./file/dat_folder/qayda.dat");
$qaydal = count($xfile);
for($i=0;$i<$qaydal;$i++){
$m = $i+1;
echo "<small><b>$m)</b>$xfile[$i]</small><br/>";
}
echo "<small>------<br/>Siz bu qaydalar ile raz&#305;s&#305;n&#305;zm&#305;?<br/></small>";
echo "<small><a href=\"reg.php\">Raziyam</a></small> | ";
echo "<small><a href=\"index.php\">Imtina edirem</a></small>";
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
?>