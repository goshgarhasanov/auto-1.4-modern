<?
$ip=getenv("REMOTE_ADDR");
$browser = strtok(getenv('HTTP_USER_AGENT'), "/");
$referer = str_replace ( "http://" , "" , $_SERVER['HTTP_REFERER']);
$referer = explode ( "/" , $referer );
$referer = $referer[0];
if (!isset($_SESSION['ref']) && !empty($referer) && $referer != "wap.localhost" && $referer != "localhost" && $referer != "www.".$_SERVER['HTTP_HOST'].""){
if(file_exists("file/dat_folder/n_n/saytgo.dat")){
@$save= fopen("file/dat_folder/n_n/saytgo.dat", "a+");
$qeyd = "<b>Sayt:</b>  <u>".$referer."</u> | <b>Tarix:</b> <u>".date("d.m.Y / H:i:s", $SERVER_TIME)."</u> | <b>Model:</b> <u>".$browser."</u> | <b>ip:</b> ".$ip."\n";
@fwrite($save, "$qeyd");
@fflush($save);
@fclose($save);
}
$_SESSION['ref'] = "closed";
}
?>