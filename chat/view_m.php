<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $p_arr) = check_login($link);


if($p_arr['41'] != 1){
$_v->title('Olmaz.','center');
	$_v->fsize1($fsize1);
	echo "Buna h&#252;ququnuz yoxdur.<br/>----<br/>\n";
	echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";
	echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a><br/>\n";

	$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
	exit();
}
if($p_arr['150'] != 1 && $rm != ""){
$_v->title('Olmaz.','center');
	$_v->fsize1($fsize1);
	echo "Buna h&#252;ququnuz yoxdur.<br/>----<br/>\n";
	echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";
	echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a><br/>\n";

	$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
	exit();
}
if($p_arr['151'] != 1 && $rm == ""){
$_v->title('Olmaz.','center');
	$_v->fsize1($fsize1);
	echo "Buna h&#252;ququnuz yoxdur.<br/>----<br/>\n";
	echo "<a href = \"javascript:history.back()\">Geri qay&#305;t</a><br/>\n";
	echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}&amp;ref={$ref}\">Admin Panel</a><br/>\n";

	$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
	exit();
}

if($_POST['search']!="")
{
    $search = trim($_POST['search']);
}elseif($_GET['search']!="")
{
    $search = base64_decode($_GET['search']);
}
$search_sql = false;
if(strlen($search)>=1)
{







    $search_sql = " and `message` LIKE '%".$search."%'";
}
if($rm != "")
{
	$baza = "zapiski";
	$cname = "&#199;ata Qay&#305;t";
	$fname = "chat";
	$zname = "Mesajlar";
	$takep3 = "&amp;ref={$ref}";
}
else
{
	$takep2 = "&amp;ref={$ref}";
	$baza = "mesaj";
	$tname = "Mesajlar";
	$cname = "Online Mesaj";
	$fname = "on";
	$takep3 = "&amp;rm=0&amp;ref={$ref}";
}


$_v->title(''.$tname.'...','left');
$_v->fsize1($fsize1);




if($id!='1'){
$mysql_user_all = "select COUNT(klu4) from ".$baza." where idwho != '0' and idwho != '7' and (idwho != '1' and idtowhom!='1');";
$mysql_user ="select COUNT(klu4) from ".$baza." where (idtowhom = '".$nk."' and idwho != '0' and idwho != '7' and idwho != '1' and idtowhom!='1') or (idwho = '".$nk."' and idwho != '0' and idwho != '7' and idwho != '1' and idtowhom!='1');";
$mysql_user_all2 = "select * from ".$baza." where (idwho != '0' and idwho != '7') and (idwho != '1' and idtowhom!='1') order by time desc limit";
$mysql_user2 = "select * from ".$baza." where (idtowhom = '".$nk."' and idwho != '0' and idwho != '7' and idwho != '1' and idtowhom!='1') or (idwho = '".$nk."' and idwho != '0' and idwho != '7' and idwho != '1' and idtowhom!='1') order by time desc limit";
}
else
{
$mysql_user_all = "select COUNT(klu4) from ".$baza." where idwho != '0' and idwho != '7';";
$mysql_user = "select COUNT(klu4) from ".$baza." where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7';";
$mysql_user_all2 = "select * from ".$baza." where idwho != '0' and idwho != '7' order by time desc limit";
$mysql_user2 = "select * from ".$baza." where idwho = '".$nk."' or idtowhom = '".$nk."' and idwho != '0' and idwho != '7' order by time desc limit";
}

if(empty($act)){
	if($nk != ""){
		$query = mysql_query($mysql_user);
	}else{
		$query = mysql_query($mysql_user_all);
	}
	$all = @mysql_result(@$query, 0);
	if(!isset($s)){
		$s = 0;
	}
	$mx = round(($all / 25) + 0.45);
	if($mx < $s){
        $s = $mx;
	}
	if($s == 0){
		$s = 1;
	}
	$ot = (($s - 1) * 25) + 1;
	$do = $s * 25;
	if($all < $do){
        $do = $all;
	}
	$o = $ot - 1;

	if($nk != ""){
		$q = mysql_query($mysql_user2." {$o},{$do};");
	}else{
		$q = mysql_query($mysql_user_all2." {$o},{$do};");
	}
	if($nk != ""){
		$us = mysql_query("select * from users where id = '".$nk."';");
		if(mysql_affected_rows() == 0){
			echo "<b>Niki Bazadan Silinib</b>: leqebine aid ".$tname." (<b>{$all}</b>)<br/>*****<br/>";
		}else{
			$a = mysql_fetch_array($us);
			echo "<b>".$a['user']."</b> - leqebine aid ".$tname.": (<b>{$all}</b>)<br/>*****<br/>";
		}
		if($rm!= ""){
		echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}&amp;ref=$ref&amp;rm=0\">&#220;mumi ".$tname."</a>\n";
		}else{
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}&amp;ref=$ref\">&#220;mumi ".$tname."</a>\n";
}
	}else{
		echo "<b>{$tname}</b>: (<b>{$all}</b>)<br/>*****<br/>";
		if($rm!= "")echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}&amp;rm=0\">Yenile</a>\n";
		else
		echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep2}\">Yenile</a>\n";
	}
	if($p_arr['150'] == 1 && $p_arr['151'] == 1){
		echo " | <a href=\"view_m.php?id={$id}&amp;ps={$ps}{$takep3}&amp;nk={$nk}\">".$zname."</a>";
	}
    echo "<br/>----<br/>\n";
    echo "Mesaj axtar:<br/>\n";
    

$_v->action("view_m.php?id={$id}&amp;ps={$ps}&amp;rm={$rm}{$takep2}&amp;nk={$nk}");
print $_v->input("<input name=\"search$ref\" maxlength=\"50\" value=\"{$search}\" title=\"search\"/>").'<br/>';
print $_v->submit('Axtar','action=save');

	echo "<br/>----<br/>\n";
	if($do == 0){
		echo "<i>Bu istifade&#231;iye aid {$tname} yoxdur.</i><br/>\n";
	}else{
        for ($i=$ot;$i<=$do;$i++){
			$arr = mysql_fetch_array($q);
			$kim = $arr['who'];
			$kime = $arr['towhom'];
			$mesag = $arr['message'];
			$read = $arr['readd'];
			$klu4 = $arr['klu4'];
			$idtowhom = $arr['idtowhom'];
			$idwho = $arr['idwho'];
			$pphoto = $arr ['photo'];
            $mm = $arr ['multimesaj'];


			if($idwho == $nk){
				print " <b>{$i})</b>-[<a href=\"ceza.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;ref=$ref\">C</a>] <a href=\"info.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;ref={$ref}\">".$kim."</a> &#187; ";
			}else{
				if($rm!= ""){
				print " <b>{$i})</b>-[<a href=\"ceza.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;ref=$ref\">C</a>] <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}{$takep2}&amp;rm=0\">".$kim."</a> &#187; ";
		}else{
			print " <b>{$i})</b>-[<a href=\"ceza.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}&amp;ref=$ref\">C</a>] <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idwho}{$takep2}\">".$kim."</a> &#187; ";
}
		}
			
		//	else

if($rm!= ""){			
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idtowhom}{$takep2}&amp;rm=0\">".$kime."</a>";
}else{
echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;nk={$idtowhom}{$takep2}\">".$kime."</a>";
}
            if($search!=''){
			    print "<b>|&gt;</b>".str_replace($search, '<u><span style="color:red">'.$search.'</span></u>', $mesag)."";
            }else{

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

                else if ( $file == "mp3" or $file == "mp4" )
                {
                    
                  //  echo "(Musiqi - ses) Format&#305;nda fayl<br/>";
                    print '<br/><img src="yes1.php?file=css/img/music.png" alt="Music" style="float:left;margin-right:4px;"/>';
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
           // echo "Cekisi: <b>".$olchu."</b> kb<br/>\n";
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
echo "<br/><a href=\"arxiv/nn/".$pphoto."\">Y&#252;kle</a><br/>\n";
//if($_v->ver=="html"){ echo "<br/>";}
}
else
{
//if($_v->ver!='wml'){  echo "<br/>";}
echo "<a href=\"arxiv/nn/".$pphoto."\">Y&#252;kle</a><br/><br/>\n";
//if($_v->ver!='wml'){  echo "<br/>";}
}
}
}	
			
//elave son
				    print "<b>|&gt;</b>".$mesag."";
			
				
				
            }
			if($p_arr['152'] == 1){
				echo "[<a href=\"view_m.php?act=".$klu4."&amp;id={$id}&amp;ps={$ps}&amp;s={$s}&amp;rm={$rm}{$takep2}&amp;nk={$nk}\">x</a>]";
			}
			echo "<br/>\n";
		}
	}
	echo "----<br/>";
    $next = $s + 1;
	$prev = $s - 1;
	if(1 < $s){
		$ot = ($prev - 1) * 25 + 1;
		$do = $prev * 25;
		echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$prev}{$takep2}&amp;search=".base64_encode($search)."&amp;nk={$nk}&amp;rm={$rm}\">&lt;&lt;$ot-$do&lt;&lt;</a>\n";
	}
	$tes = $all / 25;
	$test = round($tes);
	if($do < $all && $s < $test){
		$ot = ($next - 1) * 25 + 1;
		$do = $next * 25;
		if($all < $do){
			$do = $all;
		}
		echo " |  <a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$next}{$takep2}&amp;search=".base64_encode($search)."&amp;nk={$nk}&amp;rm={$rm}\">&gt;&gt;$ot-$do&gt;&gt;</a>\n";
		echo "<br/>";
	}elseif(1 < $s){
		echo "<br/>";
	}
	if(25 < $all){
		echo "<br/>";
	}
	echo "<a href=\"admin.php?id={$id}&amp;ps={$ps}{$takep2}\">Admin Panel</a><br/>*****<br/>\n";
	echo "<a href=\"{$fname}.php?id={$id}&amp;ps={$ps}{$takep2}\">{$cname}</a><br/>\n";
}elseif($p_arr['152'] == 1){
mysql_query ("delete from `".$baza."` where klu4 = '".$act."';");	
	echo "<u>Silindi</u>...<br/>";
	$_v->divide();
	echo "<a href=\"view_m.php?id={$id}&amp;ps={$ps}&amp;s={$s}&amp;rm={$rm}{$takep2}&amp;search=".base64_encode($search)."&amp;nk={$nk}\">Geri Qay&#305;t</a><br/>";
}


$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>