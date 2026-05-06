<?php
$ref=rand(10000,1000000);
require("ay.php");
$link = connect_db();
$server = $_SERVER['HTTP_HOST'];
$serverr = $_SERVER['PHP_SELF'];
if ($server!="doysan.net" && $server!="doysan.net/chat") {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<!DOCTYPE wml PUBLIC \"-//WAPFORUM//DTD WML 1.2//EN\" \"http://www.wapforum.org/DTD/wml12.dtd\">";
echo "<wml>";
echo "<card id=\"xeta\" title=\"Ay Seni O&#287;ru Pi&#351;ik!\" ontimer=\"index.php?ref=$ref\"><timer value=\"15000\"/>";
echo "<p align=\"center\"><small>";
$bildiris = "Diqqet! Sistematik Ogurlanib!";
$mymail = "xak_ker_999@mail.ru";
$allmesaj = "
Salam, Errorlink Bu xeberdarligi size $server saytindan Sistematik skripti gonderib.\n
Skript http://ilkbahar.biz saytindan ogurlanib ve http://$server saytinda qurulub\n
Chatin unvani: http://$server$serverr\n
Adminin Nomresi: $nomre\n
";
mail ($mymail, $bildiris, $allmesaj);
echo "<b>O&#287;urlanm&#305;&#351;</b>&#160;skriptden istifade etdiyin &#252;&#231;&#252;n seni AzNetde Peyser kimi tan&#305;tma&#287;&#305;m&#305; istemirsense menimle elaqe saxla!=<br/>M&#252;ellif: <b>Errorlink</b><br/>****<br/>";
echo "<a href=\"http://ilkbahar.biz\">ilkbahar.biz</a><br/>\n";
echo "</small></p></card></wml>";
mysql_close ($link);
exit;
}
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n";
echo "<head>\n";
echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-1\" />\n";
echo "<meta name=\"author\" content=\"Sistematik\" />\n";
echo "<title>License WaP.DoYSaN.NeT</title>\n";
echo "<link href=\"http://doysan.net/chat/img/style1.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
echo "</head>\n";
echo "<body>\n";
echo "<div class=\"title\">\n";
echo "<center><b>License Sistematik</b></center></div>\n";
echo "<div class=\"enterrega\">Bu script <a href=\"http://doysan.net\">wap.doysan.net</a> sayt&#305;na mexsusdur.<br/></div>\n";
echo "<div class=\"menuindex\">\n";
echo "Verlime tarixi: [12.02.2012 / 15:15]<br/>\n";
echo "Qiymeti: <b>50 AzN</b><br/>\n";
echo "Sifari&#351;&#231;i: <b>ErroR!ink</b><br/>\n";

echo "</div><div class=\"title\">\n";
echo "</div><div class=\"menuindex\">\n";
echo "<b>Leqeb</b>: <font color=\"red\">Errorlink</font><br/>\n";

echo "<b>Mail</b>: <a href=\"mailto:xak_ker_999@mail.ru\">xak_ker_999@MaiL.Ru</a><br/></div>\n";
echo "Sat&#305;&#351; Merkezi: <a href=\"http://seve.biz\">Admin@seve.biz</a><br/></div>\n";


echo "<div class=\"title\">\n";
echo "<center><a href=\"http://doysan.net\"><b>WaP.Doysan.Net</b></a></center></div>\n";
echo "</body>\n";

?>