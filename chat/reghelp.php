<?
require("inc.php");
$link = connect_db();
if (function_exists('reg')) { reg(); }
$y0nnn=file("file/dat_folder/n_n/reg.dat");
$y0n_url = $y0nnn[0];
$y0n_time = trim($y0nnn[1]);

if ($y0n_time > time()) {
header ("Location: http://".$y0n_url);
exit;
}
session_register ("regtime");
$_SESSION["regtime"]=$SERVER_TIME-10;

/*
$setting = mysql_fetch_object(mysql_query("SELECT `klu4`,`url`,`reg_time` FROM `setting` WHERE `klu4`='1' LIMIT 1;"));
if($setting->klu4 and $setting->reg_time > time()) {
	header("Location: {$setting->url}"); die;
}
*/
$_v->title('Qaydalar','left');
$_v->fsize1('small');
echo '<b>Bizim chatin qaydalari:</b><br/>';
$_v->divide();
echo '
<b>1.</b> &#199;atda s&#246;y&#252;&#351; s&#246;ymek ve &#231;at&#305;n b&#252;t&#252;n istifade&#231;ilerini tehqir etmek qada&#287;and&#305;r.<br/>
<b>2.</b> &#350;exsi melumatlarda qeyri-normativ s&#246;zler, diger istifade&#231;iler haqq&#305;nda tehqiramiz s&#246;zler yazmaq qeti qada&#287;and&#305;r.<br/><b>3.</b> &#304;stifade&#231;iler, Adminlerden status isteye bilmez.<br/>
<b>4.</b> Otaqlarda <b>Flood</b> (tekrarlanan s&#246;zler ve ya eyni mezmunlu s&#246;zler yazmaq), <b>Fleym</b> (tehqir etmek, q&#305;sa mezmunlu s&#246;zler yazmaq, uzun menas&#305;z mubahiseler etmek) ve <b>Spam</b> (reklam xarakterli mesajlar yazmaq) etmek qada&#287;and&#305;r.<br/>
<b>5.</b> Ox&#351;ar istifade&#231;i adlarindan istifade etmek olmaz. &#304;lk qeydiyyatdan ke&#231;en istifade&#231;i adi istisna olmaqla diger ox&#351;ar adlar silinecek.<br/>
<b>6.</b> &#199;atda icazesiz internet resurslarinin reklam edilmesi qeti yol verilmezdir.<br/>
<b>7.</b> Yerlibazl&#305;q etmek, D&#246;vlet eleyhine fikirler yazmaq qada&#287;and&#305;r.<br/>
<b>8.</b> <b>B&#214;Y&#220;K</b> herflerle yazmaq qada&#287;and&#305;r.<br/>
<b>9.</b> <u>Qaydalar&#305; pozanlar, Rehberlik terefinden cezaland&#305;r&#305;lacaq.</u><br/>';
$_v->divide();

print '<a href="reg.php">Raziyam</a><br/>';
print '<a href="index.php">Imtina edirem</a>';
$_v->fsize2('small');
//$_v->end();
$_v->End('1');
?>