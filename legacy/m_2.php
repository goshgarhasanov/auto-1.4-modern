<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);   


if($row["msgphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Mesajlar Bolmasine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Onlayna</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$takep="&amp;ref=$ref";

global $bol;
switch ($bol){

default:
$_v->title('Arxiv Mesajlar');
$_v->fsize1($fsize1);
echo "\"<b>Arxiv</b>\" Mesajlar:<br/>\n";
$_v->divide();

$r = mysql_query ("select count(`readd`) as `num` from `mesaj` WHERE (`idtowhom` = '".$id."')and(`readd` = '0')and(`ininc` = '1');");
$a = mysql_fetch_array($r);
$inb = $a["num"]; 
$r = mysql_query ("select count(`readd`) as `num` from `mesaj` WHERE (`idwho` = '".$id."')and(`readd` = '0')and(`insend` = '1');");
$a = mysql_fetch_array($r);
$out = $a["num"]; 


echo "<a href=\"m_2.php?bol=1&amp;id=$id&amp;ps=$ps$takep\">Gelenler(".$inb.")</a><br/>\n"; 
echo "<a href=\"m_2.php?bol=2&amp;id=$id&amp;ps=$ps$takep\">Gedenler(".$out.")</a><br/>\n"; 
echo $divide;
echo "<a href=\"m_2.php?bol=yaz&amp;id=$id&amp;ps=$ps$takep\">Mesaj yaz</a><br/>\n";    
echo $divide;
echo "<a href=\"m_2.php?bol=opdel&amp;id=$id&amp;ps=$ps$takep\">B&#252;t&#252;n Mesajlar&#305; Sil</a><br/>\n";    
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Mesaja qay&#305;t</a><br/>\n";    
echo "<a href=\"enter.php?id=$id&amp;ps=$ps$takep\">Dehliz</a><br/>\n";    

$_v->fsize2($fsize2);
$_v->end('1',$link);
break;

case '1':
$r = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1');");
$a = mysql_fetch_array($r);
$num = $a["num"];
if ($num == 0){
$_v->title('Mesaj Yoxdur','center');
$_v->fsize1($fsize1);
echo "<u>Hal-haz&#305;rda Mesaj&#305;n&#305;z Yoxdur.</u><br/>\n";
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}  


$_v->title('Gelenler');
$_v->fsize1($fsize1);

$_v->html('<div align="center">');
echo "<b>Gelen Mesajlar: (".$num.")</b><br/>\n";
$_v->html('</div>');

$_v->divide();
$next_id = next_id($num);
$r = mysql_query ("Select `who`,`idwho`,`time`,`klu4`,`readd` from `mesaj` WHERE (`idtowhom` = '".$id."')and(`ininc` ='1') order by `time` desc limit $next_id[start],$next_id[max_page];");
while($object = mysql_fetch_object($r)) 
{
	$_v->html('<div class="links">');
	$object->time = time_date($object->time);
	if ($object->readd == 1) echo "<a href=\"m_2.php?bol=3&amp;id=$id&amp;ps=$ps&amp;im=$object->klu4&amp;s=$s$takep\">".$object->who."</a> [".$object->time."]<br/>\n"; 
	else  echo "<b><a href=\"m_2.php?bol=3&amp;id=$id&amp;ps=$ps&amp;im=$object->klu4&amp;s=$s$takep\">".$object->who."</a>	</b> [".$object->time."]<br/>\n";
	$_v->html('</div>');
}

if($next_id['a'] > $next_id['max_page'])
{
	$_v->divide();
	echo page_next("m_2.php?bol=1&amp;id=$id&amp;ps=$ps$takep", $next_id['a'], $next_id['max_page'], $next_id['page']);
}
$_v->divide();

echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
////////////

case '2':

$r = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idwho` = '".$id."')and(`insend`='1');");
$a = mysql_fetch_array($r);
$num = $a["num"];
if ($num == 0)
{
	$_v->title('Gelenler','center');
	$_v->fsize1($fsize1);
	echo "<u>Siz he&#231;kese mesaj g&#246;ndermemisiz!</u><br/>\n";
	echo $divide;
	echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$_v->title('Gedenler');
$_v->fsize1($fsize1);

$_v->html('<div align="center">');
echo "<b>Sizin yazd&#305;qlar&#305;n&#305;z: ($num)</b><br/>";
$_v->html('</div>');

$_v->divide();
$next_id = next_id($num);

if($_GET['p'] > 0) $takep .= 'p='.$next_id['page'];
$r = mysql_query ("Select `who`,`klu4`,`readd`,`towhom` from `mesaj` WHERE (`idwho` = '".$id."')and(`insend` ='1') order by `time` desc LIMIT $next_id[start],$next_id[max_page];");
while($object = mysql_fetch_object($r)) 
{
	$_v->html('<div class="links">');

	if ($object->readd == 0)
	{
		print "<b>Oxunmay&#305;b <a href=\"m_2.php?bol=oxu&amp;id=$id&amp;ps=$ps&amp;im=$object->klu4$takep\">$object->towhom</a></b>\n";
	}
	else
	{
		print "Oxunub  <a href=\"m_2.php?bol=oxu&amp;id=$id&amp;ps=$ps&amp;im=$object->klu4&amp;s=$s$takep\">$object->towhom</a>";
	}
	print "- <a href=\"m_2.php?bol=del&amp;id=$id&amp;ps=$ps&amp;im=$object->klu4&amp;s=$s&amp;insend=1$takep\">[x]</a><br/>\n";
	$_v->html('</div>');
}


if($next_id['a'] > $next_id['max_page'])
{
	$_v->divide();
	echo page_next("m_2.php?bol=2&amp;id=$id&amp;ps=$ps$takep", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

$_v->divide();
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Mesajlar</a><br/>\n";
if (isset($rm)) echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm$takep\">Chata Qayit</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;




case '3':
settype($im, 'integer');
$r = mysql_query ("Select `who`,`time`,`message`,`idtowhom`,`readd`,`idwho`,`multimesaj`,`photo`,`kod` from mesaj WHERE klu4 = '".$im."';");
if (mysql_affected_rows() <= 0)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "<u>Mesaj Tap&#305;lmad&#305;...</u><br/>\n";
	echo $divide;
	echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$object = mysql_fetch_object($r);
if ($object->idtowhom != $id)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "<u><i>Bu Mesaj size aid deyil!</i></u><br/>\n";
	echo $divide;
	echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$_v->title('Mesaj','center');
$_v->fsize1($fsize1);

if ($object->readd == 0)
{
	mysql_query ("Update `mesaj` set `readd` = '1' WHERE `klu4` ='".$im."'");
	mysql_query ("Update `users` set `msn`=`msn`-1 where `id` ='".$id."';");
}
$_v->key($object->idwho);

echo "\"<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$object->idwho&amp;ref=$ref\">".$object->who."</a>\" Size yaz&#305;b.<br/>\n";
echo time_date($object->time)." tarixinde<br/>\n";

$_v->divide();
$_v->align('left');
echo "<b>Mesaj</b>: <i>$object->message</i>.<br/>\n";
//elave

//elave

if ($object->multimesaj == 1){
if ( file_exists( "arxiv/nn/$object->photo" ) )
        {
          $daroq = getimagesize( "arxiv/nn/$object->photo" );
            $n_nam = trim( $daroq[2] );
            if ( $n_nam == "1" || $n_nam == "2" || $n_nam == "3" )
            {
                $fayladi = "&#350;ekili";
                if ( $n_nam == "1" )
                {
                    $img_type = "gif";
                }
                if ( $n_nam == "2" )
                {
                    $img_type = "jpg";
                }
                if ( $n_nam == "3" )
                {
                    $img_type = "png";
                }
               
  // echo "(Foto G&#246;r&#252;nt&#252;) Format&#305;nda fayl<br/>";
	if($_v->ver!='wml')
	{
print '<a href="arxiv/nn/'.$object->photo.'"/><img src="yes1.php?file=arxiv/nn/'.$object->photo.'" alt="Foto" style="float:left;margin-right:4px;"/></a>';
} else {
print '<img src="yes1.php?file=arxiv/nn/'.$object->photo.'" alt="Foto"/>';
}
echo "(Foto) ";
            }
            else
            {
                $fl = explode( ".", $object->photo );
                $file = trim( $fl[1] );
                if ( $file == "3gp" )
                {
                    
                  //  echo "(Video - canl&#305; g&#246;r&#252;nt&#252;) ".$lang_sevirici_messages['formatindafayl']."";
$fayladi = "3gp fayl&#305;n&#305;";
if($_v->ver!='wml')
{
echo '<br/><img src="yes.php?pic=arxiv/nn/'.$object->photo.'" alt="Video" style="float:left;margin-right:4px;"/>';
						} else {
echo '<br/><img src="yes.php?pic=arxiv/nn/'.$object->photo.'" alt="Video"/>';
}
echo "(Video) ".$lang_sevirici_messages['formatindafayl'].""; 
}

///////////
			
                else if ( $file == "mp3" or $file == "mp4" )
                {
                    
                  //  echo "(Musiqi - ses) Format&#305;nda fayl<br/>";
                    print '<img src="yes1.php?file=css/img/music.png" alt="Music" style="float:left;margin-right:4px;"/>';
                    $fayladi = "mp3 fayl&#305;n&#305;";
					echo "(Musiqi) ";
                }
                else
                {
                    
                    echo "<b>Fayl&#305;n tipi melum deyil Admin-e bu haqqda melumat verin.</b><br/>----<br/>";
                    
                }
            }
            $olchu = round(filesize("arxiv/nn/".$object->photo) / 1024, 1 );
		 
        }
        else
        {
            
            echo "<b>Fayl Bazada yoxdur...</b><br/>----<br/>";
           
        }
        
        if ( isset( $fayladi ) )
        {
            echo "Cekisi: <b>".$olchu."</b> kb<br/>\n";
            $x_size = trim( $daroq[0] );
            $y_size = trim( $daroq[1] );
            $n_nam = trim( $daroq[2] );
            if ( ( 220 < $x_size || 220 < $y_size ) && ( $n_nam == "1" || $n_nam == "2" || $n_nam == "3" ) )
            {
                if ( $n_nam == "1" )
                {
                    $img_type = "gif";
                }
                if ( $n_nam == "2" )
                {
                    $img_type = "jpg";
                }
                if ( $n_nam == "3" )
                {
                    $img_type = "png";
                }

$fl = explode( ".", $object->photo );
$file = trim( $fl[1] );
if ( $file == "3gp" or $file == "mp3" or $file == "mp4" )
{
echo "<br/><a href=\"arxiv/nn/$object->photo\">Y&#252;kle</a><br/>\n";
}else{
echo "<br/><a href=\"images.php?img=arxiv/nn/$object->photo\">Y&#252;kle</a><br/>\n";
}
}
else
{

$fl = explode( ".", $object->photo );
$file = trim( $fl[1] );
if ( $file == "3gp" or $file == "mp3" or $file == "mp4" )
{
if($_v->ver!='wml'){  echo "<br/>";}
echo "<a href=\"arxiv/nn/$object->photo\">Y&#252;kle</a><br/>\n";
echo "<br/>";
}else{
if($_v->ver!='wml'){  echo "<br/>";}
echo "<a href=\"images.php?img=arxiv/nn/$object->photo\">Y&#252;kle</a><br/>\n";
if($_v->ver!='wml'){  echo "<br/>";}
}
}
}
}	
			
//elave son
			
//elave son
$_v->divide();

	$_v->action("on.php?id=$id&amp;ps=$ps&amp;ref=$ref");
	echo "Cavab:<br/>\n";
	print $_v->input("<input name=\"message$ref\" maxlength=\"600\" title=\"message\"/>").'<br/>';
	//print $_v->submit('G&#246;nder','nk='.$object->idwho);
    print $_v->submit('G&#246;nder','nk='.$object->idwho.',nn=01');

$_v->divide('wml');
echo "<a href=\"ignor.php?id=$id&amp;ps=$ps&amp;nk=$object->idwho&amp;mod=add&amp;ref=$ref\">&#304;gnor et</a>-(he&#231;ne yazmas&#305;n)<br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=del&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;im=$im&amp;ininc=1$takep\">Bu Mesaj&#305; sil</a><br/>\n";
echo "<a href=\"m_2.php?bol=delall&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;usid=$object->idwho&amp;ininc=1$takep\">B&#252;t&#252;n mesajlar&#305;n&#305; sil</a><br/>\n";
echo "<a href=\"m_2.php?bol=req&amp;id=$id&amp;ps=$ps&amp;im=$im&amp;who=$who$takep\">Oxunmam&#305;&#351; kimi qeyd et</a><br/>\n";
echo $divide;
echo "<a href=\"m_2.php?bol=1&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->divide();
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Arxiv Qutusu</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
break;


case 'req':
$_v->title('Qeyd edildi','center');
$_v->fsize1($fsize1);

$r = mysql_query ("SELECT `idtowhom` FROM `mesaj` WHERE `klu4` = '".$im."';");
$a = mysql_fetch_array($r);
if ($a["idtowhom"] != $id){
echo "<u><i>Bu Mesaj size aid deyil!</i></u><br/>\n";
$_v->divide();
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
mysql_query ("Update `mesaj` set `readd` = '0' WHERE `klu4` ='".$im."';");
    echo 'Oxunmam&#305;&#351; kimi qeyd olundu.<br/>';
    echo $divide;
	echo "<a href=\"m_2.php?bol=1&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Gelenler</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
break;

case 'del':
if (!ctype_digit($im)) { header("Location: index.php"); die; }
$r = mysql_query ("Select `idtowhom`,`idwho` from `mesaj` WHERE `klu4` = '".$im."';");
$a = mysql_fetch_array($r);
if ((mysql_affected_rows() != 0)&&(($a["idtowhom"]==$id)||($a["idwho"]==$id)))
{
	$_v->title('Silindi','center');
	$_v->fsize1($fsize1);
	echo "<b>Mesaj Silindi!</b><br/>\n";
	echo $divide;
	if (isset($ininc)) echo "<a href=\"m_2.php?bol=1&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
	else echo "<a href=\"m_2.php?bol=2&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";

	if (isset($insend)) mysql_query ("update `mesaj` set `insend` = '0' WHERE `klu4` = '".$im."';");
	if (isset($ininc)) mysql_query ("update `mesaj` set `ininc` = '0' WHERE `klu4` = '".$im."';");
	mysql_query ("delete from mesaj WHERE (insend = '0')and(ininc = '0')");
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
}
else
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "<u>Bu mesaj Size aid deyil.</u><br/>\n";
	echo $divide;
	echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
}
break;

case 'delall':
settype($usid, 'integer');
$select = mysql_query ("select `user` from `users` where `id` = '".$usid."';");
$rows = mysql_fetch_array ($select);
$user = $rows["user"];
if (isset($insend)) mysql_query ("update `mesaj` set `insend` = '0' WHERE `idwho` = '".$id."' and `idtowhom` = '".$usid."';");
if (isset($ininc)) mysql_query ("update `mesaj` set `ininc` = '0' WHERE `idtowhom` = '".$id."' and `idwho` = '".$usid."';");
mysql_query ("delete from `mesaj` WHERE (`insend` = '0')and(`ininc` = '0') and `idtowhom` = '".$id."';");
$_v->title('Silindi','center');
$_v->fsize1($fsize1);
echo "<b>".$user."</b>-den gelen b&#252;t&#252;n mesajlar silindi!<br/>\n";
echo $divide;
if (isset($ininc)) echo "<a href=\"m_2.php?bol=1&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
else echo "<a href=\"m_2.php?bol=2&amp;s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;

case 'opdel':
mysql_query ("update `mesaj` set `insend` = '0' WHERE `idwho` = '".$id."';");
mysql_query ("update `mesaj` set `ininc` = '0' WHERE `idtowhom` = '".$id."';");
mysql_query ("update `users` set `msn` = '0' WHERE `id` = '".$id."';");
$_v->title('Silindi','center');
$_v->fsize1($fsize1);
echo "B&#252;t&#252;n mesajlar&#305;n&#305;z silindi!<br/>\n";
echo $divide;
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Arxiv Mesajlar</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Mesaja Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;




case 'oxu':




$message = $topic = $towhom = "";
$r = mysql_query ("SELECT `klu4`,`towhom`,`message`,`idwho` FROM `mesaj` WHERE `klu4` = '".$im."';");
$a = mysql_fetch_array($r);
$towhom = $a ["towhom"];
$message = $a ["message"];
$key = $a ["klu4"];

if ($a["idwho"]!= $id)
{
	$_v->title('Xeta','center');
	$_v->fsize1($fsize1);
	echo "Bu Mesaj size aid deyil!<br/>\n";
	echo $divide;
	echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
	echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}

$_v->title('Yaz&#305;lan Mesaj','center');
$_v->fsize1($fsize1);

if($message!=""){
if(strstr($message,"<img src=\""))
{
$tend = strpos($message,"\"/>");
$t=strlen($message);
$msgend=substr($message,$tend+3,$t);
$msgtemp=substr($message,0,$tend);
$t1=strpos($msgtemp,"<img src=\"");
$msgfirst=substr($msgtemp,0,$t1);
$t2=strlen($msgtemp);
$t3=strpos($msgtemp,"alt=\"");
$msgaver=substr($msgtemp,$t3+5,$t2);
$message=$msgfirst.$msgaver.$msgend;
}
if(strstr($message,"<a href=\""))
{
$tend = strpos($message,"</a>");
$t=strlen($message);
$msgend=substr($message,$tend+4,$t);
$tend2 = strpos($message,"\">");
$msgtemp=substr($message,0,$tend2);
$t1=strpos($msgtemp,"<a href=\"");
$msgfirst=substr($msgtemp,0,$t1);
$t2=strlen($msgtemp);
$t3=strpos($msgtemp,"<a href=\"");
$msgaver=substr($msgtemp,$t3+9,$t2);
$message=$msgfirst.$msgaver.$msgend;
}
}

echo "Bu mesaj&#305; \"<b>$towhom</b>\" leqebli &#350;exse g&#246;nderibsiz:<br/>\n";
echo $divide;

echo "<b>Mesaj</b>: $message<br/><br/>\n";
echo "<a href=\"m_2.php?bol=yaz&amp;id=$id&amp;ps=$ps&amp;key=$key&amp;ref=$ref\">Mesaj&#305; y&#246;nlendir</a><br/>\n";

$_v->divide();
echo "<a href=\"m_2.php?bol=2&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;

case 'yaz':
$_v->title('Mesaj');
$_v->fsize1($fsize1);



if(isset($key))
{
	$message = $topic = $towhom = "";
	$r = mysql_query ("SELECT `klu4`,`towhom`,`message`,`idwho` FROM `mesaj` WHERE `klu4` = '".$key."';");
	$a = mysql_fetch_array($r);
	$towhom = $a ["towhom"];
	$message = $a ["message"];
	$key = $a ["klu4"];

if ($a["idwho"] != $id){
echo "<u><i>Bu Mesaj size aid deyil!</i></u><br/>\n";
$_v->divide();
echo "<a href=\"m_2.php?id=$id&amp;ps=$ps$takep\">Arxiv Qutusu</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
if($message!="")
	{
		if(strstr($message,"<img src=\""))
		{
			$tend = strpos($message,"\"/>");
			$t=strlen($message);
			$msgend=substr($message,$tend+3,$t);
			$msgtemp=substr($message,0,$tend);
			$t1=strpos($msgtemp,"<img src=\"");
			$msgfirst=substr($msgtemp,0,$t1);
			$t2=strlen($msgtemp);
			$t3=strpos($msgtemp,"alt=\"");
			$msgaver=substr($msgtemp,$t3+5,$t2);
			$message=$msgfirst.$msgaver.$msgend;
		}
		if(strstr($message,"<a href=\""))
		{
			$tend = strpos($message,"</a>");
			$t=strlen($message);
			$msgend=substr($message,$tend+4,$t);
			$tend2 = strpos($message,"\">");
			$msgtemp=substr($message,0,$tend2);
			$t1=strpos($msgtemp,"<a href=\"");
			$msgfirst=substr($msgtemp,0,$t1);
			$t2=strlen($msgtemp);
			$t3=strpos($msgtemp,"<a href=\"");
			$msgaver=substr($msgtemp,$t3+9,$t2);
			$message=$msgfirst.$msgaver.$msgend;
		}
	}
	echo "<b>Mesaj</b>: $message<br/>\n";
	echo $divide;
}
$_v->action("on.php?id=$id&amp;ps=$ps$takep");
echo "<u>Kime</u>:<br/>\n";
print $_v->input("<input name=\"nk$ref\" maxlength=\"30\" title=\"Kime?\"/>").'<br/>';
if(!isset($key))
{
	echo "<u>Mesaj</u>:<br/>\n";
	print $_v->input("<input name=\"message$ref\" maxlength=\"600\" title=\"Mesaj&#305;n&#305;z\"/>").'<br/>';
}

if(!isset($key)) print $_v->submit('G&#246;nder','nn=01');
//else  print $_v->submit('G&#246;nder','message='.$message);

else print $_v->submit('G&#246;nder','message='.$message.',nn=01');


$_v->divide();
if(isset($key))echo "<a href=\"m_2.php?bol=2&amp;id=$id&amp;ps=$ps&amp;s=$s&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
else echo "<a href=\"m_2.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Arxiv Mesajlar</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
}
?>