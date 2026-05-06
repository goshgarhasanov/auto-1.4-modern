<?php

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Content-type:text/vnd.wap.wml; charset=utf-8");
require("ay.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$user = $row['user'];

ob_start();
echo $xml;
echo $dtd;
echo "<wml>\n";
echo "<head><meta http-equiv=\"Cache-Control\" content=\"no-cache\" forua=\"true\"/></head>\n";
echo "<card id=\"Root\" title=\"Zeng xidmeti\">\n";
echo "<p mode=\"wrap\">\n";
$time = date("H:i");
echo $fsize1;
print "<u>$site Saytindan bir bawa zeng</u><br/>";

print '<br/>
N&#246;mreni yaz&#305;n:<br/>
<input name="no" format="7N"/><br/>
<select name="kod" title="kod"><option value="050">Azercell</option>
<option value="055">Bakcell</option><option value="070">Nar Mobile</option></select>
<br/><a href="wtai://wp/mc;$(kod)$(no)">Zeng Et</a><br/>*****<br/>';
echo "<small>M&#252;ellif: <b>ErroR!ink</b></small><br/>***<br/>\n";
echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Dehliz</a><br/>\n";

echo $fsize2;
echo "</p>\n";
echo "</card>\n";
echo "</wml>\n";
ob_end_flush();
?>