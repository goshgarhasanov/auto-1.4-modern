<?php
 header("Content-type:image/jpeg");
 
 

//////guvenlik/////////
foreach ($_GET as $key => $value){
if(strpos($value,"'")!==false || strpos($value,'"')!==false){
echo "<small><b>Diqqet!</b><br/>Hacker olmaq &#252;&#231;&#252;n hele &#231;ox &#246;yrenmek laz&#305;md&#305;r!!!<br/>"; 
echo" Xahi&#351; edirik sayt&#305;m&#305;zdan normal qaydada istifade edin.<br/>****<br/>\n";
exit;
}
$$key=str_replace("'","`",$value);
}
foreach ($_POST as $key => $value){
$$key=str_replace("'","`",$value);
}
//////guvenlik son/////////

//////guvenlik/////////
foreach($_GET as $m=>$c){
$_GET[$m]=str_replace(array('union','select','"','%22','order','hack','limit','script'),'',htmlspecialchars($_GET[$m]));
}
$aciqlar=array('<','>','ini_sector_my_connect','shell','etce','font','pass','http','%27',"'",'union','select','limit','hack','script','stavka','levels','hacked','"','%22');
foreacH($aciqlar as $m=>$c){
if(eregi($c,$_SERVER['REQUEST_URI']) || eregi(urlencode($c),$_SERVER['REQUEST_URI']) || eregi($c,urldecode($_SERVER['REQUEST_URI']))){
echo "<b>Diqqet!</b><br/>Hacker olmaq &#252;&#231;&#252;n hele &#231;ox &#246;yrenmek laz&#305;md&#305;r!!!<br/><br/>";
echo" Xahi&#351; edirik sayt&#305;m&#305;zdan normal qaydada istifade edin.<br/><br/>\n";


exit;
}
}
//////guvenlik son/////////

 
 
 
 
 
 
 
 
 $pic = $_GET["file"];
 if(substr(intval($pic),0,1)!=".")
  {
 if(preg_match("/\.gif$/i", $pic)) $old = imageCreateFromGif("$pic");
 if(preg_match("/\.jpg$|\.jpeg$|\.jpe$/i", $pic)) $old = imageCreateFromJpeg("$pic");
 if(preg_match("/\.png$/i", $pic)) $old = imageCreateFromPng("$pic");
  {
    $w = imageSX($old);
    $h = imageSY($old);
    $obchee = $h/$w;
	$w_new=round(65); // ширина картинки
    $h_new=round(60); // высота картинки
    $new = imageCreateTrueColor($w_new, $h_new);
    imageCopyResized($new, $old, 0, 0, 0, 0, $w_new, $h_new, $w, $h);
    imageJpeg($new,"","100");
  }
  }
?>