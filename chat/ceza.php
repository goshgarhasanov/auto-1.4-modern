<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $p_arr) = check_login( $link );
if( $p_arr['1'] != 1 or ( $p_arr['81'] != 1 and $p_arr['82'] != 1 and $p_arr['83'] != 1 and $p_arr['84'] != 1 and $p_arr['85'] != 1 and $p_arr['86'] != 1 and $p_arr['87'] != 1 and $p_arr['88'] != 1) ) {
   $_v->title( 'Olmaz', 'center' );
   $_v->fsize1( $fsize1 );
   echo "Sizin bu b&#246;lmeye icazeniz yoxdur!<br/>\n";
   $_v->divide();
   echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
   $_v->fsize2( $fsize2 );
   $_v->end( '1', $link );
   exit;
} $us = $row["user"];
if( isset( $nk ) ) {
   $select = @mysql_query( "Select * from users where id='".$nk."'" );
}
else {
   $nick = trim( $nick );
   if( $nick == "" )
      $nick = 0;
   $latuser = strtolower( $nick );
   $select = mysql_query( "Select * from users where latuser = '".$latuser."'" );
} if( mysql_affected_rows() == 0 ) {
   $_v->title( 'Xeta', 'center' );
   $_v->fsize1( $fsize1 );
   echo "Bele bir istifade&#231;i m&#246;vcut deyil...<br/>\n";
   $_v->divide();
   echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
   $_v->fsize2( $fsize2 );
   $_v->end( '1', $link );
   exit;
} $inf = mysql_fetch_array( $select );
$pid = $inf["id"];
$level = $inf["level"];
$password = $inf["pass"];
$nick = $inf["user"];
$us_soft = $inf["user_soft"];
$us_ip = $inf["user_ip"];
$_v->title( 'Ceza Panel' );
$_v->html( "<script type='text/javascript'>function javaclick(str){if(str!=='wtime'){document.getElementById('wtime').name = str;}document.getElementById('myform').submit();}</script>" );
$_v->fsize1( $fsize1 );
echo "Leqeb: <b>$nick</b><br/>\n";
$_v->divide();
$act_level = 0;
if( $p_arr['223'] == 1 ) {
   $act_level = 9;
}
elseif( $p_arr['222'] == 1 ) {
   $act_level = 8;
}
elseif( $p_arr['221'] == 1 ) {
   $act_level = 7;
}
elseif( $p_arr['220'] == 1 ) {
   $act_level = 6;
}
elseif( $p_arr['219'] == 1 ) {
   $act_level = 5;
}
elseif( $p_arr['218'] == 1 ) {
   $act_level = 4;
}
elseif( $p_arr['217'] == 1 ) {
   $act_level = 3;
}
elseif( $p_arr['216'] == 1 ) {
   $act_level = 2;
}
elseif( $p_arr['215'] == 1 ) {
   $act_level = 1;
}
elseif( $p_arr['214'] == 1 ) {
   $act_level = 0;
} if( ($row["level"] >= $level or $act_level >= $level) or ( $row["level"] == 9) ) {
   $_v->java_action( "ban.php?id=$id&amp;ps=$ps&amp;ref=$ref", 'myform' );
   echo "<b>Diqqet</b>: Sebebsiz yere xaric etmeyin.<br/>----<br/>";
   if( $p_arr['81'] == 1 and ( $p_arr['171'] == 1 or $p_arr['172'] == 1 or $p_arr['173'] == 1 or $p_arr['174'] == 1 or $p_arr['175'] == 1 or $p_arr['176'] == 1 or $p_arr['177'] == 1 or $p_arr['178'] == 1 or $p_arr['179'] == 1 or $p_arr['180'] == 1 or $p_arr['181'] == 1 or $p_arr['182'] == 1 or $p_arr['183'] == 1 or $p_arr['184'] == 1 or $p_arr['185'] == 1 or $p_arr['186'] == 1 or $p_arr['187'] == 1 or $p_arr['188'] == 1) ) {
      echo "Vaxt Se&#231;in<br/>\n";
      $access_kik_time = array();
      if( $p_arr['171'] == 1 )
         $access_kik_time['5'] = '5 deqiqe ';
      if( $p_arr['172'] == 1 )
         $access_kik_time['15'] = '15 deqiqe ';
      if( $p_arr['173'] == 1 )
         $access_kik_time['30'] = '30 deqiqe ';
      if( $p_arr['174'] == 1 )
         $access_kik_time['45'] = '45 deqiqe ';
      if( $p_arr['175'] == 1 )
         $access_kik_time['60'] = '1 Saat ';
      if( $p_arr['176'] == 1 )
         $access_kik_time['120'] = '2 Saat  ';
      if( $p_arr['177'] == 1 )
         $access_kik_time['180'] = '3 Saat ';
      if( $p_arr['178'] == 1 )
         $access_kik_time['300'] = '5 Saat ';
      if( $p_arr['179'] == 1 )
         $access_kik_time['1440'] = '1 GA?n ';
      if( $p_arr['180'] == 1 )
         $access_kik_time['2880'] = '2 GA?n ';
      if( $p_arr['181'] == 1 )
         $access_kik_time['4320'] = '3 GA?n ';
      if( $p_arr['182'] == 1 )
         $access_kik_time['7200'] = '5 GA?n ';
      if( $p_arr['183'] == 1 )
         $access_kik_time['21600'] = '15 GA?n ';
      if( $p_arr['184'] == 1 )
         $access_kik_time['28800'] = '20 GA?n ';
      if( $p_arr['185'] == 1 )
         $access_kik_time['43200'] = '30 GA?n ';
      if( $p_arr['186'] == 1 )
         $access_kik_time['64800'] = '45 GA?n ';
      if( $p_arr['187'] == 1 )
         $access_kik_time['86400'] = '60 GA?n ';
      if( $p_arr['188'] == 1 )
         $access_kik_time['129600'] = '90 GA?n ';
      $option = "<select name=\"wtime\" id='wtime'>|";
      foreach( $access_kik_time as $key => $val ) {
         $option .= "<option value=\"$key\">$val</option>|";
      } $option .= "</select>";
      print $_v->select( $option ).'<br/>';
   }
   else {
      $_v->java_hidden( 'wtime', 'true', 'wtime' );
   } print $_v->input( "<input name=\"whykik$ref\" maxlength=\"100\" title=\"Sebeb yaz&#305;n\"/>" ).'<br/>';
   $_v->java_hidden( 'nk', $nk );
   if( $rm )
      $_v->java_hidden( 'rm', $rm );
   if( $p_arr['81'] == 1 and ( $p_arr['171'] == 1 or $p_arr['172'] == 1 or $p_arr['173'] == 1 or $p_arr['174'] == 1 or $p_arr['175'] == 1 or $p_arr['176'] == 1 or $p_arr['177'] == 1 or $p_arr['178'] == 1 or $p_arr['179'] == 1 or $p_arr['180'] == 1 or $p_arr['181'] == 1 or $p_arr['182'] == 1 or $p_arr['183'] == 1 or $p_arr['184'] == 1 or $p_arr['185'] == 1 or $p_arr['186'] == 1 or $p_arr['187'] == 1 or $p_arr['188'] == 1) ) {
      print $_v->input_sub( 'Xaric et!', 'wtime', '$(wtime)' ).'<br/>';
   } if( $p_arr['82'] == 1 ) {
      print $_v->input_sub( 'Xeberdarl&#305;q Et!', 'xeber' ).'<br/>';
   } if( $p_arr['81'] == 1 or $p_arr['82'] == 1 ) {
      echo "----<br/>";
   } if( $p_arr['83'] == 1 ) {
      print $_v->input_sub( 'TAM &#304;qnor!', 'iqnor' ).'<br/>';
   } if( $p_arr['84'] == 1 ) {
      print $_v->input_sub( 'Ban &#304;stifade&#231;i ad&#305;', 'leqeb' ).'<br/>';
   } print "\n\n";
   if( $p_arr['87'] == 1 ) {
      print $_v->input_sub( '&#304;stifade&#231;i ad&#305;n&#305; sil', 'sil' ).'<br/>'."\n";
   } if( $p_arr['85'] == 1 ) {
      print $_v->input_sub( 'Ban Telefon+IP', 'browser' ).'<br/>'."\n";
   } print "\n\n";
   if( $p_arr['86'] == 1 ) {
      print $_v->input_sub( 'IP-Soft+Del Hidden', 'sil_hidden' ).'<br/>';
   } if( $p_arr['88'] == 1 ) {
      print $_v->input_sub( 'B&#252;t&#252;n yaz&#305;lar&#305;n&#305;', 'msg' ).'<br/>';
   } $_v->input_sub( 'end' );
   if( $p_arr['2'] == 1 ) {
      echo "----<br/>";
      print $_v->submit( 'Redakte et', 'nick='.$nk.'', "admin.php?go=view&amp;id=$id&amp;ps=$ps&amp;ref=$ref" );
   } 

/////////////////////tuti/////////////////////////////////// 
     if($p_arr['6']==1)
     {
     $_v->divide();
     print $_v->submit('Qur&#287;ular&#305;n&#305; deyi&#351;','nick='.$nk.'',"admin.php?go=infoset&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
     }
     if($p_arr['6']==1)
     {
     $_v->divide();
     print $_v->submit('Anketini deyi&#351;','nick='.$nk.'',"admin.php?go=infous&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
     }
    //////////////////////////////Son///////////////////////////////////////


if( $p_arr['85'] == 1 or $p_arr['86'] == 1 or $p_arr['87'] == 1 or $p_arr['88'] == 1 or $p_arr['84'] == 1 or $p_arr['83'] == 1 )
      echo $divide;
    if( $p_arr['151'] == 1 ) {
      echo "<a href=\"view_m.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Mesajlar&#305; oxu</a><br/>\n";
   } 


if($id==1){
      
echo "----<br/>";

echo "<a href=\"icaze.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">Icaze Paneli</a><br/>\n";
   }



if( $p_arr['150'] == 1 or $p_arr['151'] == 1 )
      echo $divide;
   if( $row['level'] == 9 ) {
      $users_id = null;
      
   } if( ($id == 1) ) {
      echo "<u><b>&#350;ifresi:</b> ".base64_decode( $inf['pass'] )."</u><br/>\n";
   } if( $p_arr['201'] == 1 and $p_arr['4'] == 1 ) {
      echo "<b>IP: $inf[user_ip]</b><br/>\n";
      echo "<u><b>Soft:</b> $inf[user_soft]</u><br/>\n";
   } if( ($p_arr['51'] == 1 and $p_arr['2'] == 1) or ( $p_arr['201'] == 1 and $p_arr['4'] == 1) or ( $id == 1 and $inf["g_nom"] != '') ) {
      echo "----<br/>\n";
   } user_ban_list();
}
elseif( $level == 9 ) {
   echo '<i><b>Rehberlik haqq&#305;nda Melumat Verilmir</b></i><br/>----<br/>';
}
else {
   echo '<i>Bu &#350;exs R&#252;tbede Sizden b&#246;y&#252;kd&#252;r!</i><br/>----<br/>';
} if( $id == 1 ) {
   echo "<b>Ox&#351;ar nikleri:</b>\n";
   $q = mysql_query( "SELECT * FROM `users` WHERE `user_ip` = '".$us_ip."' AND `user_soft` = '".$us_soft."' ORDER BY `id` DESC;" );
   while( $usera = mysql_fetch_array( $q ) ) {
      $uida = $usera['id'];
      $nicka = $usera['user'];
      echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uida\">$nicka</a>, ";
   } echo "<br/>\n";
} if( $row['level'] > 8 ) {
   echo "<b>Oxsar Ipler </b>\n";
   $q = mysql_query( "SELECT * FROM `users` WHERE `user_ip` = '".$us_ip."' ORDER BY `id` DESC;" );
   while( $usera = mysql_fetch_array( $q ) ) {
      $uida = $usera['id'];
      $nicka = $usera['user'];
      echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uida\">$nicka</a>, ";
   } echo "<br/>\n";
} $k = mysql_query( "SELECT `kik` FROM `users` WHERE `id` = '".$nk."';" );
$kik = mysql_result( $k, 0 );
$k = mysql_query( "SELECT `whokik` FROM `users` WHERE `id` = '".$nk."';" );
$whokik = mysql_result( $k, 0 );
$k = mysql_query( "SELECT `whykik` FROM `users` WHERE `id` = '".$nk."';" );
$whykik = mysql_result( $k, 0 );
$k = mysql_query( "SELECT `visit` FROM `users` WHERE `id` = '".$nk."';" );
$visit = mysql_result( $k, 0 );
echo "Son defe kim qovmusdur: <u>".$whokik."</u><br/>\n";
echo "Son defe qovulanda sebeb: <u>".$whykik."</u><br/>\n";
echo "---<br/>";
if( $rm != "" ) {
   echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#199;ata Qay&#305;t</a><br/>\n";
}
else {
   echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online Mesaj</a><br/>\n";
} echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2( $fsize2 );
$_v->end( '1', $link );
?>