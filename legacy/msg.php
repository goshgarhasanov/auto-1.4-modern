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
if($rm!="")
$takep = "&amp;rm=$rm&amp;ref=$ref";
else
$takep = "&amp;ref=$ref";

settype($im, 'integer');
$r = mysql_query ("Select who,time,message,idtowhom,readd,idwho,multimesaj,photo,kod from mesaj WHERE klu4 = '".$im."';");
if (mysql_affected_rows() == 0)
{
	$_v->title('Xeta','center');
	$_v->Redirect("on.php?id=$id&amp;ps=$ps$takep",'15');
	$_v->fsize1($fsize1);
	echo "Mesaj Tap&#305;lmad&#305;...<br/>";
	print $divide;
	print '10 Saniyyeden sonra Online Mesaj-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$a = mysql_fetch_array($r);
if ($a["idtowhom"] != $id)
{
	$_v->title('Xeta','center');
	$_v->Redirect("on.php?id=$id&amp;ps=$ps$takep",'15');
	$_v->fsize1($fsize1);
	echo "Bu Mesaj size aid deyil!<br/>----<br/>";
	print '10 Saniyyeden sonra Online Mesaj-a &#246;nleneceksiz.<br/>';
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


$_php_name = ($rm!='') ? 'chat.php' : 'on.php';

ob_start();
$_v->do_type[] = "<do type=\"accept\" name=\"send\" label=\"Dehliz\"><go href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\"/></do>\n";
$_v->title('Mesaj');
$_v->fsize1($fsize1);

$who = $a ["who"];
$idwho = $a ["idwho"];
$date = time_date($a["time"]);
$message = $a ["message"];
$read = $a ["readd"];
$pphoto = $a ["photo"];
$mm = $a ["multimesaj"];



$_v->key($idwho);

if ($read == 0)
{
	mysql_query ("Update `mesaj` set `readd` = '1' WHERE `klu4` ='".$im."';");
	mysql_query ("Update `users` set `msn`=`msn`-1 where `id` ='".$id."';");
}

echo '<a href="addfayl.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$idwho.'&amp;ref='.$ref.'"><img src="css/img/camera.png" alt="attach" /></a> ';

echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idwho&amp;ref=$ref\">".$who."</a>- yaz&#305;b.<br/>\n";
echo "<u>Vaxt</u>: $date<br/>\n";
echo "<u>Mesaj</u>: $message<br/>\n";
///
//elave

if ($mm == 1){
if ( file_exists( "arxiv/nn/".$pphoto."" ) )
        {
          $daroq = getimagesize( "arxiv/nn/".$pphoto."" );
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
print '<a href="arxiv/nn/'.$pphoto.'"/><img src="yes1.php?file=arxiv/nn/'.$pphoto.'" alt="Foto" style="float:left;margin-right:4px;"/></a>';
} else {
print '<img src="yes1.php?file=arxiv/nn/'.$pphoto.'" alt="Foto"/>';
}
echo "(Foto) ";
            }
            else
            {
                $fl = explode( ".", $pphoto );
                $file = trim( $fl[1] );
                if ( $file == "3gp" )
                {
                    
              
				 //  echo "(Video - canl&#305; g&#246;r&#252;nt&#252;) ".$lang_sevirici_messages['formatindafayl']."";
$fayladi = "3gp fayl&#305;n&#305;";
if($_v->ver!='wml')
{
echo '<br/><img src="yes.php?pic=arxiv/nn/'.$pphoto.'" alt="Video" style="float:left;margin-right:4px;"/>';
						} else {
echo '<br/><img src="yes.php?pic=arxiv/nn/'.$pphoto.'" alt="Video"/>';
}
     echo "(Video) ".$lang_sevirici_messages['formatindafayl']."";   		
	    }

///////////
			
                else if ( $file == "mp3" or $file == "mp4"  )
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
            $olchu = round(filesize("arxiv/nn/".$pphoto) / 1024, 1 );
		 
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
echo "<br/><a href=\"arxiv/nn/$pphoto\">Y&#252;kle</a><br/>\n";
}else{
echo "<br/><a href=\"images.php?img=arxiv/nn/$pphoto\">Y&#252;kle</a><br/>\n";
}
}
else
{

$fl = explode( ".", $object->photo );
$file = trim( $fl[1] );
if ( $file == "3gp" or $file == "mp3" or $file == "mp4" )
{
if($_v->ver!='wml'){  echo "<br/>";}
echo "<a href=\"arxiv/nn/$pphoto\">Y&#252;kle</a><br/>\n";
echo "<br/>";
}else{
if($_v->ver!='wml'){  echo "<br/>";}
echo "<a href=\"images.php?img=arxiv/nn/$pphoto\">Y&#252;kle</a><br/>\n";
if($_v->ver!='wml'){  echo "<br/>";}
}
}
}
}
			
//elave son


echo $divide;


echo "Cavab Mesaj&#305;n&#305;z:<br/>\n";
$_v->action("$_php_name?id=$id&amp;ps=$ps$takep");
print $_v->input("<input name=\"message$ref\" maxlength=\"600\" title=\"message\"/>").'<br/>';
//print $_v->submit('G&#246;nder','nk='.$idwho);
print $_v->submit('G&#246;nder','nk='.$idwho.',nn=01');


echo "<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$idwho&amp;ref=$ref\">[Arxive Bax]</a><br/>\n";

echo "----<br/>";
echo "<a href=\"plaint.php?id=$id&amp;ps=$ps&amp;nk=$idwho&amp;ref=$ref\">&#350;ikayet Et (Reklam ve Teqqir Edirse)</a><br/>";
echo "<a href=\"ignor.php?id=$id&amp;ps=$ps&amp;nk=$idwho&amp;mod=add&amp;ref=$ref\">&#304;gnor et(he&#231;ne yazmas&#305;n)</a><br/>\n";
echo $divide;

echo "<a href=\"mesaj.php?s=$s&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Gelenler</a><br/>\n";

echo $divide;
if($rm!="")echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">&#199;ata qay&#305;t</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>