<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login( $link );
$user = $row["user"];
$_v->title( 'Qalereya' );
$_v->fsize1( $fsize1 );
switch ( $mod ) {
   default: echo "Laz&#305;ms&#305;z Fotolar Silinecek!<br/>";
      $galery = mysql_query( "select count(id) as num from albom" );
      $foto = mysql_fetch_array( $galery );
      $kolfoto = $foto["num"];
      echo "Cemi Foto: <b>".$kolfoto."</b><br/>";
      $_v->divide();
      echo "<b><a href=\"foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Foto y&#252;kle</a></b><br/>";
      echo $divide;
      $galerym = mysql_query( "select count(id) as num from albom where sex ='0'" );
      $fotomr = mysql_fetch_array( $galerym );
      $fotom = $fotomr["num"];
      echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ki&#351;iler</a>(<b>".$fotom."</b>)<br/>";
      $galeryz = mysql_query( "select count(id) as num from albom where sex ='1'" );
      $fotozr = mysql_fetch_array( $galeryz );
      $fotoz = $fotozr["num"];
      echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qadinlar</a>(<b>".$fotoz."</b>)<br/>";
      $_v->divide();
      break;
   case 'm': echo "<b>Ki&#351;iler!</b><br/>";
      $_v->divide();
      $galery = mysql_query( "select count(id) as num from albom where sex ='0';" );
      $foto = mysql_fetch_array( $galery );
      $num = $foto["num"];
      if( $num == 0 ) {
         echo "<i>Ki&#351;ilerden he&#231;kesin Foto Albomunda &#350;ekil yoxdur!</i><br/>----<br/>";
      }
      else {
         if( !isset( $s ) )
            $s = 0;
         $mx = round( ($num / 10) + 0.45 );
         if( $s > $mx )
            $s = $mx;
         if( $s == 0 )
            $s = 1;
         $ot = (($s - 1) * 10) + 1;
         $do = $s * 10;
         if( $do > $num )
            $do = $num;
         $o = $ot - 1;
         $n = $ot;
         if( $do == 0 )
            $n = $o;
         echo "Cemi: $num<br/>\n";
         $_v->divide();
         $r = mysql_query( "select vote,photo,idfoto,id from `albom` where sex = '0' order by vote desc limit $o,$do" );
         for( $i = $ot; $i <= $do; $i++ ) {
            $arr = mysql_fetch_array( $r );
            $ses = $arr['vote'];
            $photo = $arr['photo'];
            $idfoto = $arr['idfoto'];
            $uid = $arr['id'];
            $qus = mysql_query( "Select user from users where id = '".$idfoto."'" );
            if( mysql_affected_rows() != 0 ) {
               $ind = mysql_fetch_array( $qus );
               $u_user = $ind["user"];
            }
            else {
               mysql_query( "DELETE from albom where idfoto = '".$idfoto."'" );
            } if( !file_exists( "photos/".$idfoto."/".$photo."" ) ) {
               mysql_query( "DELETE from albom where id = '".$uid."';" );
               echo "delete file";
            } $daroq = getimagesize( "photos/$idfoto/$photo" );
            $n_nam = $daroq[2];
            if( $n_nam == "1" ) {
               $img_type = "gif";
            }
            elseif( $n_nam == "2" ) {
           





    $img_type = "jpg";
            }
            elseif( $n_nam == "3" ) {
               $img_type = "png";
            } if( $id == $idfoto ) {
               echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=m&amp;img=$idfoto&amp;img=$idfoto&amp;ref=$ref\"><img style=\"border-radius: 50px;\" src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a><b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a></b>| Ses: ".$ses."\n";
            }
            else {
               echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=m&amp;img=$idfoto&amp;img=$idfoto&amp;ref=$ref\"><img style=\"border-radius: 50px;\" src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a>| Ses: ".$ses."\n";
            } echo "<br/>";
            $_v->divide();
         } $next = $s + 1;
         $prev = $s - 1;
         if( $num > $do ) {
            $ot = (($next - 1) * 10) + 1;
            $do = $next * 10;
            if( $do > $num )
               $do = $num;
            echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">Sonraki 10</a><br/>\n";
         } if( $s > 1 ) {
            $ot = (($prev - 1) * 10) + 1;
            $do = $prev * 10;
            echo "<a href=\"galery.php?mod=m&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">Evvelki 10</a><br/>\n";
         }
      } break;
   case 'q': echo "<b>Qad&#305;nlar!</b><br/>";
      $_v->divide();
      $galery = mysql_query( "select count(id) as num from albom where sex ='1';" );
      $foto = mysql_fetch_array( $galery );
      $num = $foto["num"];
      if( $num == 0 ) {
         echo "<i>Qad&#305;nlardan he&#231;kesin Foto Albomunda &#350;ekil yoxdur!</i><br/>----<br/>";
      }
      else {
         if( !isset( $s ) )
            $s = 0;
         $mx = round( ($num / 10) + 0.45 );
         if( $s > $mx )
            $s = $mx;
         if( $s == 0 )
            $s = 1;
         $ot = (($s - 1) * 10) + 1;
         $do = $s * 10;
         if( $do > $num )
            $do = $num;
         $o = $ot - 1;
         $n = $ot;
         if( $do == 0 )
            $n = $o;
         echo "Cemi: $num<br/>\n";
         $_v->divide();
         $r = mysql_query( "select vote,photo,idfoto,id from `albom` where sex = '1' order by vote desc limit $o,$do" );
         for( $i = $ot; $i <= $do; $i++ ) {
            $arr = mysql_fetch_array( $r );
            $ses = $arr['vote'];
            $photo = $arr['photo'];
            $idfoto = $arr['idfoto'];
            $uid = $arr['id'];
            $qus = mysql_query( "Select user from users where id = '".$idfoto."'" );
            if( mysql_affected_rows() != 0 ) {
               $ind = mysql_fetch_array( $qus );
               $u_user = $ind["user"];
            }
            else {
               mysql_query( "DELETE from albom where idfoto = '".$idfoto."'" );
            } if( !file_exists( "photos/".$idfoto."/".$photo."" ) ) {
               mysql_query( "DELETE from albom where id = '".$uid."';" );
               echo "delete file";
            } $daroq = getimagesize( "photos/$idfoto/$photo" );
            $n_nam = $daroq[2];
            if( $n_nam == "1" ) {
               $img_type = "gif";
            }
            elseif( $n_nam == "2" ) {
               $img_type = "jpg";
            }
            elseif( $n_nam == "3" ) {
               $img_type = "png";
            } if( $id == $idfoto ) {
               echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=q&amp;img=$idfoto&amp;ref=$ref\"><img style=\"border-radius: 50px;\" src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <b><a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a></b>| Ses: ".$ses."\n";
            }
            else {
               echo ($i).") <a href=\"img_a.php?bol=1&amp;img=1&amp;fid=$uid&amp;id=$id&amp;ps=$ps&amp;x=q&amp;img=$idfoto&amp;ref=$ref\"><img style=\"border-radius: 50px;\" src=\"image.php?img=photos/$idfoto/$photo&amp;size=50\" alt=\"$u_user\"/></a> <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\">".$u_user."</a>| Ses: ".$ses."\n";
            } echo "<br/>";
            $_v->divide();
         } $next = $s + 1;
         $prev = $s - 1;
         if( $num > $do ) {
            $ot = (($next - 1) * 10) + 1;
            $do = $next * 10;
            if( $do > $num )
               $do = $num;
            echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">Sonraki 10</a><br/>\n";
         } if( $s > 1 ) {
            $ot = (($prev - 1) * 10) + 1;
            $do = $prev * 10;
            echo "<a href=\"galery.php?mod=q&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">Evvelki 10</a><br/>\n";
         }
      } break;
} if( isset( $rm ) )
   echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm\">&#199;ata Qay&#305;t</a><br/>\n";
if( $mod )
   echo "<a href=\"galery.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Qalereya</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2( $fsize2 );
$_v->end( '1', $link );
?>