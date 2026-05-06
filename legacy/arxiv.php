<?php
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);


function users($values='', $user) {if($values!=''){$vars = $values;
}else{$vars = '*';
}
$user = mysql_escape_string($user);
if(is_numeric($user)) {
$Sql = "SELECT $vars FROM `users` WHERE `id`='".$user."'";
$Query = @Mysql_Query($Sql);
} else {
$Sql = "SELECT $vars FROM `users` WHERE LOWER(`user`)='". strtolower($user) ."'";
$Query = @Mysql_Query($Sql);
}
$Result = @MySql_Fetch_Array($Query);
mysql_free_result($Query);
return $Result;
}


$_v->key($nk);

if($row['room']!='28'){
mysql_query("UPDATE `users` SET `room` = '28' WHERE `id` = '".$id."' LIMIT 1;");
};

if($rm!="")$takep = "&amp;rm=$rm&amp;ref=$ref";
else
$takep = "&amp;ref=$ref";

$user=$row["user"];

$_v->title('Mesaj','center');
$_v->fsize1($fsize1);

settype($nk, 'integer');



$u_s = mysql_query ("Select `user`,`id`,`time`,`zn` from `users` WHERE `id` = '".$nk."';");
if (mysql_affected_rows() == 0)
{
	echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>\n";
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}
$u_i = mysql_fetch_array($u_s);
$u_user = $u_i["user"];
$u_time = $u_i["time"];
$u_zn = $u_i["zn"];
if($u_zn!="")$u_zn = "<img src=\"img/z".$u_zn.".gif\" alt=\".\"/>";
$zn = $row["zn"];
if($zn!="")$zn = "<img src=\"img/z".$zn.".gif\" alt=\".\"/>";

if(strlen($message)>2)
{
	include("./file/require/send");
}



$query = mysql_query("select COUNT(`klu4`) from `mesaj` where (`idwho` = '".$nk."' and `idtowhom` ='".$id."') or (`idwho` = '".$id."' and `idtowhom` ='".$nk."');");
$all = @mysql_result($query, 0);


if($u_user=="")
{
	echo "Axtard&#305;q&#305;n&#305;z &#304;stifade&#231;i Tap&#305;lmad&#305;.<br/>\n";
	$_v->divide();
	echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Mesaj</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	exit;
}


	mysql_query("Update `mesaj` set `readd` = '1', `insend` = '0' where `idwho` = '$nk' and `idtowhom` = '$id';"); 
	

echo 'Arxiv: '.$u_zn."<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">$u_user</a><br/>\n";


$_v->html("<span id=\"arxiv_write_msg_sts\">");
print ((exit_time($u_time)>$SERVER_TIME) ? 'x&#601;td&#601;' : 'son g&#246;r&#252;nm&#601;: '.time_date ($u_time).'');
$_v->html("</span>");



$rr = mysql_query("select count(`readd`) as `num` from `mesaj` where (`idtowhom` = '".$id."')and(`ininc` ='1')and(`readd` ='0')");





$aa = mysql_fetch_array($rr);
$num = $aa["num"];


$msn = $row["msn"];
if($num!=$msn)
{
	mysql_query("UPDATE `users` SET `msn` = '".$num."' WHERE `id` = '".$id."';");
	$msn = $num;
}
if($msn>0)echo "<br/>----<br/><a href=\"mesaj.php?id=$id&amp;ps=$ps$takep\">Yeni mesaj ($msn)</a>\n";
$_v->align('left');

$_v->html('<br/>');

$_v->action("arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep");

$_v->html('<span class="mlink">');
$_v->html("<a href=\"audiocapture.php?id={$id}&amp;ps={$ps}&amp;nk={$nk}&amp;ref={$ref}\"><img src=\"css/icon/microphone.png\" alt=\"S&#601;s fayl payla&#351;\"/></a>");
$_v->html('</span>');

$_v->html('<span class="mlink">');
$_v->html('<a href="addfayl.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'"><img src="css/img/camera.png" alt="attach" /></a>');
$_v->html('</span>');

$_v->html('<span class="mlink">');
$_v->html('<a href="arxiv.php?id='.$id.'&amp;ps='.$ps.'&amp;nk='.$nk.'&amp;ref='.$ref.'"><img src="img/ref.gif" alt="attach" /></a>');
$_v->html('</span><br/>');
$_v->wml("<a href=\"arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep\">Yenile</a><br/>\n");

print $_v->input("<input $onkeyup id=\"message\" value='{$_SESSION['txtData']}' name=\"message$ref\" maxlength=\"600\" title=\"message\"/>").' ';
print $_v->submit('G&#246;nder');

$_v->wml('<br/>'.$divide);

$next_id = next_id($all);
$r = mysql_query ("Select * from `mesaj` WHERE  (`idwho` = '".$nk."' and `idtowhom` ='".$id."') or (`idwho` = '".$id."' and `idtowhom` ='".$nk."') order by `time` desc LIMIT $next_id[start],$next_id[max_page];");


$_v->html('<div style="background: url(css/img/wt_bg.png);">');

$lastTime = '';
while($object = mysql_fetch_object($r)) 
{


if($object->photo!=false){
	
	$a_folder = "audio/{$object->idwho}/{$object->photo}";
	
	$t_file = trim($t_file[2]);
	$f_title = explode('.',$object->photo);
	$f_title = trim($f_title[1]);
	$a_nick = users('*',1);
	$u_nick = users('*',$nk);
	$stil = "style='border: 1px solid #424503; border-top-right-radius: 30px; border-bottom-left-radius: 30px;'";
	if(in_array($t_file, array(1,2,3))){
	$f_name = "&#350;ekili\n";
	$f_load =  "<img $stil src=\"image.php?img=".$f_folder."&amp;size=100\" alt=\"".ucwords($f_title)."\"/>\n";
	}else{
	//->Esas kod
	if($object->type == 1){
	$f_name = false;
	$audio = "<audio style='vertical-align:middle;' controls>
    <source src='{$a_folder}' type='audio/mpeg'>
    Your browser does not support the audio element.
    </audio>";
	$f_load = ($_v->ver != 'wml') ? $audio : false;
	}
	//->Esas kod son.
	else if ($f_title == '3gp'){
	$f_name = ucwords($f_title)." fayl&#305;n&#305;\n";
	$f_load = "<img $stil src=\"screen.php?pic=".$f_folder."\" alt=\"".ucwords($f_title)."\"/>\n";
	}else if($f_title == 'mp3'){
	$f_name = ucwords($f_title)." fayl&#305;n&#305;\n";
	$f_load = ($_v->ver != 'wml') ? MP3($f_folder, $platform) : null;
	}else if ($f_title == 'mp4'){
	$f_name = ucwords($f_title)." fayl&#305;n&#305;\n";
	$f_load = ($_v->ver != 'wml') ? MP4($f_folder, 'screen.php?pic='.$f_folder.'&amp;w=376&amp;h=211') : null;
	}else{
	$f_name = false;
	}
	}
}

	$type = (in_array($t_file, array(1,2,3))) ? "images.php?img={$f_folder}" : "f_down.php?down={$f_folder}";
	$f_down = ($f_name) ? "<a href=\"{$type}\">{$f_name} y&#252;kle</a> -\n" : false;

    $file_msg = ($object->photo!=false) ? $f_load.''.$f_down : null;
	
	


if($object->photo!=false){
$a_folder = "audio/{$object->idwho}/{$object->photo}";
if($object->type == 1){
	$audio = "<audio style='vertical-align:middle;' controls>
    <source src='{$a_folder}' type='audio/mpeg'>
    Your browser does not support the audio element.
    </audio>";
	$f_load = ($_v->ver != 'wml') ? $audio : false;
}
}
$file_msg = ($object->photo!=false) ? $f_load : false;






	$class = ($object->who==$row['user']) ? 'my sms' : 'you sms';
	
	$_v->html('<div class="">');
	
	if(buga_date($object->time) != $lastTime)
  {
   $lastTime = buga_date($object->time,'');
   $_v->html('<div class="dateBody"><span style="white-space:nowrap; padding:2px 10px;display: inline-table;">'.$lastTime.'</span></div><br/>');
  }
	
if(($object->readd==0)){
	$status2 =  '<img src="img/view0.png"/>';	
	}else{
	$status2 = '<img src="img/view1.png"/>';	
	}


$status = "";


if($object->who==$row['user']){
$status = ($object->readd==0) ? $status = ' <img id="'.$object->klu4.'" src="img/view0.png" height="10">' : $status = ' <img id="'.$object->klu4.'" src="img/view1.png" height="10">'; 
}

$class = ($object->who==$row['user']) ? $class = '<div style="background:#CFFFC6; padding:3px 10px 3px 10px; float:right; margin: 0 0 3px 7px; max-width:80%; position:relative; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border: 1px solid #a9cb88; ">' : $class = '<div style="background:#fbfbfb; padding:3px 10px 3px 10px; float:left; margin: 0 0 3px 7px; max-width:80%; position:relative; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border: 1px solid #dfdfdf;">';

$class2 = ($object->who==$row['user']) ? $class2 = '<div style="position:absolute; top:5px; right:-8px; background-repeat: no-repeat; widht:8px; height:16px">&nbsp;&nbsp;</div></div><div style="clear:both;"></div>' : $class2 = '<div style="position:absolute; top:5px; left:-8px; background-repeat: no-repeat; widht:8px; height:16px">&nbsp;&nbsp;</div></div><div style="clear:both;"></div>';


$_v->html(''.$class.'');




$_v->html(''.$file_msg.''.$object->message.' <br/>  ');
$_v->wml('<b>'.$object->who.'</b>: &#xbb; '.$object->message.' ('.time_date($object->time,'1').') '.$status2.'<br/>');
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

$_v->html('<font style="font-size:10px; float:right">  ('.time_date($object->time,'1').') '.$status.'</font> ');
$_v->html(''.$class2.'');
$_v->html('</div>');


}

$_v->html('</div>');

if($all==0)
{
	$_v->divide('html');
	echo "Mesaj Yoxdur...<br/>\n";
}
else
{
	if($next_id['a'] > $next_id['max_page'])
	{
		echo $divide;
		echo page_next("arxiv.php?id=$id&amp;ps=$ps&amp;nk=$nk$takep", $next_id['a'], $next_id['max_page'], $next_id['page']);


	}



}

$_v->divide();

if($rm)echo "<a href=\"chat.php?id=$id&amp;ps=$ps$takep\">Chata qay&#305;t</a><br/>\n";
echo "<a href=\"on.php?id=$id&amp;ps=$ps$takep\">Online Mesaj</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";

$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>