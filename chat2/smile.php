<?php

$smiles=mysql_query("select * from `smiles` order by id desc limit 0,999999");
while($sm = @mysql_fetch_array($smiles)) {
$pos = $sm["pos"];
$img = $sm["img"];

$msg = str_replace("$pos","<img src=\"smiles/$img\" alt=\"$pos\"/>",$msg);
$msgg = str_replace("$pos","<img src=\"smiles/$img\" alt=\"$pos\"/>",$msgg);

}

?>
