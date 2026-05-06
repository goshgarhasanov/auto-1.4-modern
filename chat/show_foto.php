<?

require("inc.php");
#------------
require("file/dat_folder/show_foto.inc");
#-----------
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

#===============================================================================
if($footo[aktiv] != 1){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "Funksiya Admin terfinden deaktiv edilib!<br/>****<br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
#===============================================================================
$style = "style=\"border: 1px solid #424503; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;\"";
#-------------------------------------------------------------------------------
$user=$row["user"];

#-------------------------------------------------------------------------------
$currdate=date("d-m-Y");
$galery = mysql_query ("select sum(vote) as num from show_foto where date ='".$currdate."';");
$foto = mysql_fetch_array($galery);
$num = $foto["num"];
$show_qalib=$num/2;
#-------------------------------------------------------------------------------
switch($act) {
default:
#===============================================================================
case 'm':
$_v->title('Show Foto');
$_v->fsize1($fsize1);
echo "&#350;ekil Yari&#351;masina xo&#351; geldiniz.Sende qo&#351;ul Maraqli &#351;ekillerinle tanin ve hediyyeler qazan!<br/>";
echo "Qalibe Hediyye: <b>$show_qalib Bal</b><br/>";
echo $divide;
$_v->fsize2($fsize2);
#---------------------------------
#--Bu gu ucun--#
$cudate=date("d-m-Y");
#---------------
$galery = mysql_query ("select count(id) as num from show_foto where date ='".$cudate."';");
#--------------------------------
$foto = mysql_fetch_array($galery);
$num = $foto["num"];
#---------------------------------
if ($num == 0){
$_v->fsize1($fsize1);
echo "<b>Hec Kim Yari&#351;a &#350;ekil Elave Etmeyib!</b><br/>";
$_v->fsize2($fsize2);
}else{
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
#--Bu gu ucun--#
$curdate=date("d-m-Y");
#---------------
$r = mysql_query ("select vote,photo,idfoto,id from `show_foto` where `date`='".$curdate."' order by vote desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$_v->fsize1($fsize1);

$ses=$arr['vote'];
$photo=$arr['photo'];
$idfoto=$arr['idfoto'];
$uid=$arr['id'];

$qus = mysql_query ("Select user from users where id = '".$idfoto."'");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user = $ind["user"];
}else{
mysql_query ("DELETE from show_foto where idfoto = '".$idfoto."'");
}

if(!file_exists("show_foto/".$photo."")){
mysql_query ("DELETE from show_foto where id = '".$uid."';");
echo "delete file";
}

$daroq = getimagesize("show_foto/$photo");
$n_nam = $daroq[2];
 if($n_nam=="1"){$img_type="gif";}
 elseif($n_nam=="2"){$img_type="jpg";}
 elseif($n_nam=="3"){$img_type="png";}
#------------------Fikir ucun----------------------#
$userm = mysql_query ("select count(id) as num from show_fikir where `key`='".$uid."';");
$usm = mysql_fetch_array($userm);
$num = $usm["num"];
 if($i<=3) {
$ud = "<img src=\"img/$i.gif\" alt=\"$i\"/>";
}else{
$ud = "";
}
echo $ud.($i).")<u>".$u_user."<a href=\"show_foto.php?act=ses&amp;id=$id&amp;ps=$ps&amp;key=$uid&amp;ref=$ref\"> ($ses ses)</a></u><br/><img $style src=\"image.php?img=show_foto/$photo&amp;size=120\" alt=\"$u_user\"/><br/> - <a href=\"show_foto.php?act=fikir&amp;id=$id&amp;ps=$ps&amp;key=$uid&amp;ref=$ref\">&#350;erhler ($num)</a>";
if ( 8 < $row['level'] || $id == $idfoto )
            {
                echo " - <a href=\"show_foto.php?act=x&amp;del={$uid}&amp;id={$id}&amp;ps={$ps}{$takep}\">(Sil)</a>\n";
            }
            echo "<br/>";
$_v->fsize2($fsize2);
echo "<br/>";


}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
$_v->fsize1($fsize1);
echo "<a href=\"show_foto.php?act=m&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">Sonraki 10</a><br/>\n";
$_v->fsize2($fsize2);
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
$_v->fsize1($fsize1);
echo "<a href=\"show_foto.php?act=m&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">Evvelki 10</a><br/>\n";
$_v->fsize2($fsize2);
}
}
break;
#===========================Fikir !=============================================
case "fikir" :
$key = $_GET['key'];
$q = mysql_query( "SELECT * FROM `show_foto` WHERE `id` = '".$key."';" );
if (mysql_affected_rows() == 0)
{
$_v->title('Stop','left');
$_v->fsize1($fsize1);
echo "<i> &#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>\n";
$_v->fsize2($fsize2);
            break;


}else{
$arr = mysql_fetch_array($q);
$vote = $arr['vote'];
$photo = $arr['photo'];
$info = $arr['info'];
$idfoto = $arr['idfoto'];
$key = $arr['id'];
    $qus = mysql_query( "Select user from users where id = '".$idfoto."';" );

    if ( mysql_affected_rows( ) != 0 )
    {
        $ind = mysql_fetch_array( $qus );
        $u_user = $ind['user'];
    }

$_v->title('&#350;ekil haqq&#305;nda fikirler');

$_v->fsize1($fsize1);
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\"><i>".$u_user."</i></a><br/><img $style src=\"image.php?img=show_foto/$photo&amp;size=100\" alt=\"$u_user\"/><b>Metn:</b> $info<br/><br/><a href=\"images.php?img=show_foto/$photo\">Y&#252;kle</a><br/>\n";
if ( $del != "" && ( $idfoto == $id || $row['level'] == 9 ) )
{
@mysql_query( @"delete from `show_fikir` WHERE `id` = '".@$del."';" );
}
}
echo $divide;
$fikir = $_POST['fikir'];
if ( 5 <= strlen( $fikir ) )
{
$fikir = narmobil($fikir);

$pos = mysql_query( "SELECT * FROM `show_fikir` WHERE `key` = '".$key."' order by `id` desc limit 1;" );
$son = mysql_fetch_array( $pos );
$sonusid = $son['usid'];
if ( $sonusid != $id )
{
mysql_query( "Insert into `show_fikir` set `usid` ='".$id."', `user` ='".$row['user']."', `message` ='".$fikir."', `time` ='".time( )."', `key` ='".$key."';" );
}
else
{
$error = "<u>Siz bu &#351;ekile fikir bildirmisiniz.</u><br/>\n";
}
}
$q = mysql_query( "SELECT * FROM `show_fikir` WHERE `key` = '".$key."';" );
$all = mysql_num_rows( $q );
if ( !isset( $s ) )
{
$s = 1;
}
$mx = round( $all / 15 + 0.45 );
if ( $mx < $s )
{
$s = $mx;
}
if ( $s == 0 )
{
$s = 1;
}
$ot = ( $s - 1 ) * 15 + 1;
$do = $s * 15;
if ( $ot < $do )
{
$do = $all;
}
$o = $ot - 1;
$n = $ot;
if ( $do == 0 )
{
$n = $o;
}
$q = mysql_query( "SELECT * FROM `show_fikir` WHERE `key` = '".$key."' ORDER BY `id` DESC LIMIT {$o},{$do};" );
if ( $all == 0 )
{
echo "<b>Bu &#350;ekile fikir bildiren olmay&#305;b</b>.<br/>";
}
else
{
echo "<b>&#304;stifade&#231;i Fikirleri...</b><br/>\n";
echo $divide;
if ( $error != "" )
{
echo $error;
echo $divide;
}
while ( $inf = mysql_fetch_array( $q ) )
{
$eid = $inf['id'];
$usid = $inf['usid'];
$u_user = $inf['user'];
$message = $inf['message'];
echo "<a href=\"inside.php?id={$id}&amp;ps={$ps}&amp;nk={$usid}{$takep}\">{$u_user}</a>&#187; {$message}\n";
if ( $idfoto == $id )
{
echo "[<a href=\"show_foto.php?act=fikir&amp;id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;key={$key}&amp;del={$eid}{$takep}\">x</a>]\n";
}
else if ( $row['level'] == 9 )
{
echo "[<a href=\"show_foto.php?act=fikir&amp;id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;key={$key}&amp;del={$eid}{$takep}\">x</a>]\n";
}
echo "<br/>\n";
}
$next = $s + 1;
$prev = $s - 1;
if ( $do < $all || 1 < $s )
{
echo $divide;
}
if ( $do < $all )
{
$ot = ( $next - 1 ) * 15 + 1;
$do = $next * 15;
if ( $all < $do )
{
$do = $all;
}
echo "<a href=\"show_foto.php?act=fikir&amp;id={$id}&amp;ps={$ps}&amp;key={$key}&amp;mov={$mov}&amp;s={$next}{$takep}\">{$ot}-{$do}&gt;&gt;</a><br/>\n";
}
if ( 1 < $s )
{
$ot = ( $prev - 1 ) * 15 + 1;
$do = $prev * 15;
echo "<a href=\"show_foto.php?act=fikir.php?bol=4&amp;id={$id}&amp;ps={$ps}&amp;key={$key}&amp;mov={$mov}&amp;s={$prev}{$takep}\">&lt;&lt;{$ot}-{$do}</a><br/>\n";
}
}

echo $divide;
$_v->action("show_foto.php?act=fikir&amp;id={$id}&amp;ps={$ps}&amp;mov={$mov}&amp;key={$key}{$takep}");
print $_v->input("<input name=\"fikir{$ref}\" maxlength=\"600\" title=\"fikir\"/>").'<br/>';

print $_v->submit('Elave Et','action=save');

echo $divide;
if($mov!=""){
$savik = "&amp;mov=$mov";
}else{
$savik = "";
}
$posts=$row["posts"];


            if ( $x != "" )
            {
            echo "<a href=\"show_foto.php?act=m&amp;fid=$key&amp;id={$id}&amp;ps={$ps}{$takep}\">Geri Qay&#305;t</a><br/>\n";
            }else{
            echo "<a href=\"show_foto.php?id={$id}&amp;ps={$ps}&amp;img={$id}{$savik}{$takep}\">Geri Qay&#305;t</a><br/>\n";

            }
$_v->fsize2($fsize2);
            break;
#==================================ses==========================================
  case "ses":
$key = $_GET['key'];
$q = mysql_query( "SELECT * FROM `show_foto` WHERE `id` = '".$key."';" );
if (mysql_affected_rows() == 0)
{
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
break;
}
else
{
if (empty($deyish)) {
$arr = mysql_fetch_array($q);
$vote = $arr['vote'];
$photo = $arr['photo'];
$info = $arr['info'];
$idfoto = $arr['idfoto'];
$key = $arr['id'];
    $qus = mysql_query( "Select user from users where id = '".$idfoto."';" );

    if ( mysql_affected_rows( ) != 0 )
    {
        $ind = mysql_fetch_array( $qus );
        $u_user = $ind['user'];
    }
$_v->title('&#350;ekil &#350;ou');
$_v->fsize1($fsize1);
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$idfoto&amp;ref=$ref\"><i>".$u_user."</i></a><br/><b>Mesaj:</b> $info<br/>Bu &#350;ekile Verilen Sesler <b>$arr[vote]</b><br/><img $style src=\"image.php?img=show_foto/$photo&amp;size=100\" alt=\"$u_user\"/><br/><a href=\"images.php?img=show_foto/$photo\">Y&#252;kle</a><br/>\n";
echo $divide;
echo "<i>Sende ses ver qalib et hediyye Qazandir!</i><br/>";
echo "<u>Nece ses</u>?<br/>";


$_v->action("show_foto.php?act=ses&amp;id=$id&amp;ps=$ps&amp;ps=$ps&amp;key=$key&amp;ref=$ref");

$option = "<select name=\"ses$ref\"   value=\"".$bonus['kpost']."\">|";
$option .= "<option value=\"2\">2</option>|";
$option .= "<option value=\"10\">10</option>|";
$option .= "<option value=\"30\">30</option>|";
$option .= "<option value=\"50\">50</option>|";
$option .= "<option value=\"500\">500</option>|";
$option .= "<option value=\"1000\">1000</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';

print $_v->submit('ses ver','uidd='.$idfoto.',deyish=ok');

  echo "<a href=\"show_foto.php?act=vote&amp;id=$id&amp;ps=$ps&amp;action=$idfoto&amp;ref=$ref\">Ses Verenler</a><br/>";
$_v->fsize2($fsize2);
}else{
if($ses<0){
$_v->title('Anti Hack','left');
$_v->fsize1($fsize1);
  echo "Olmaz Qadasi..!<br/>\n";
	$_v->fsize2($fsize2);
	break;
}
if ($row["bal"]<$ses)
            {
$_v->title('Bal azd&#305;r','left');
                $_v->fsize1($fsize1);
                echo "<i>$ses ses $ses bal deyerindedir sizin hesab&#305;n&#305;zda bal azdir</i><br/>----<br/>\n";
	$_v->fsize2($fsize2);
	break;
}
#-------------------------------------------------------------------------------
$qus = mysql_query( "Select user from users where id = '".$uidd."';" );
            if ( mysql_affected_rows( ) == 0 ){

$_v->title('xeta','left');
                $_v->fsize1($fsize1);
				mysql_query( "DELETE from show_foto where id = '".$key."';" );
                echo "<i>Istifadeci Tapilmadi</i><br/>----<br/>\n";
	$_v->fsize2($fsize2);


			} else {
$_v->title('Ses verdiz!','left');
                $_v->fsize1($fsize1);
				$ind = mysql_fetch_array( $qus );
                $u_user = $ind['user'];

				echo "<u>Tebrikler</u><br/>----<br/>\"<b>{$u_user}</b>\" &#252;&#231;&#252;n verdiyiniz <b>$ses</b> ses qebul edildi...\n";
#----------sesvereler----------#
$us=$row[user];
$id=$row[id];
$data=date("d-m-Y");
$saat=DATE("H:i:s");
mysql_query("insert into show_ses values(0,'$uidd','$id','$us','".$ses."','$data','$saat');");
#------------------------------#
            mysql_query( "update users set `bal`=`bal`-'".$ses."' where id = '".$id."';" );
            mysql_query( "update show_foto set `vote`=`vote`+'".$ses."' where id = '".$key."';" );
            echo "<br/>\n";
			$_v->fsize2($fsize2);
			}
			}
			}
            break;
#===============================================================================
case "x":
            $q = mysql_query( "SELECT * FROM `show_foto` WHERE `id` = '".$del."';" );
            if ( mysql_affected_rows( ) == 0 )
            {
$_v->title('Xeta','left');
                $_v->fsize1($fsize1);
                echo "<i>&#350;ekil Tap&#305;lmad&#305;</i><br/>----<br/>";
$_v->fsize2($fsize2);
                break;
            }
            $arr = mysql_fetch_array( $q );
            $photo = $arr['photo'];
            $info = $arr['info'];
            $u_id = $arr['idfoto'];
            $del = $arr['id'];
$_v->title('Silindi','left');
            $_v->fsize1($fsize1);
            if ( 7 < $row['level'] || $id == $u_id )
            {
                mysql_query( "DELETE from show_foto where id = '".$del."';" );
                    mysql_query( "DELETE from show_ses where idwho = '".$u_id."';" );
                        mysql_query( "DELETE from show_fikir where key = '".$del."';" );


                if ( file_exists( "show_foto/".$photo."" ) )
                {
                    unlink( "show_foto/".$photo."" );
                }

                echo "<u>&#350;ekil Silindi...</u><br/>-<br/>";

 }
            else
            {

                echo "Sizin Bu &#350;ekili Silmeye &#304;xtiyar&#305;n&#305;z yoxdur...<br/>----<br/>\n";

            }

            echo "<a href=\"show_foto.php?id={$id}&amp;ps={$ps}&amp;img={$u_id}{$takep}\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
            break;
#===============================================================================
     case "qayda":
$_v->title('Qaydalar','left');
            $_v->fsize1($fsize1);
			echo "1) Bu oyunda maraql&#305; &#351;ekiller Daha ustunluk te&#351;kil edir<br/>";
			echo "2) Istediyiniz Maraql&#305; &#350;ekili Yukleyerek Oyuna Qat&#305;l&#305;rs&#305;z<br/>";
			echo "3) Belelikle Her gun $footo[max] istifadeci &#351;ekillerini numayi&#351; ederek Sesler toplayacaq gunun sonunadek<br/>";
			echo "4) En cox sesi olan istifadecinin &#351;ekili Birinci Gorsenecek<br/>";
			echo "5) Misal: Cem seslerin say&#305; 4000 sesdir 4000 ses yar&#305;ya Bolunerek Qalibe Bal hediyyesi olunacaq 4000/2 =2000 Bal<br/>";
			echo "6) Qeyd: Yar&#305;&#351;a daxil olmaq ucunn Yari&#351;a Ba&#351;la Bolmesine Daxil olun<br/>";
			echo $divide;
$_v->fsize2($fsize2);
			break;
#===============================================================================

case "data":
$_v->title('&#350;ekil &#350;ou','left');
$_v->fsize1($fsize1);
if(!$_POST['show']){
$currdate=date('d-m-Y',strtotime("-1 day"));
echo "<b><i>$currdate</i></b> Tarixinde Qalib Olan &#304;stifade&#231;i<br/>";
echo $divide;


$galery = mysql_query ("select sum(vote) as num from show_foto where date ='".$currdate."';");
#--------------------------------
$foto = mysql_fetch_array($galery);
$num = $foto["num"];
$dunen_bal=$num/2;
$resu = @mysql_query ("Select * from show_foto where `date` = '".$currdate."' order by vote desc limit 0,1;");
if (mysql_affected_rows() == 0) {
echo "Hec kim qalib olmayib!<br/>";
 echo $divide;
echo "Evvelki oyunlara bax:<br/>";


$_v->action("show_foto.php?act=data&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref");


echo "Ay<br/>";
$option = "<select name=\"ay$ref\">|";
$option .= "<option value=\"01\">Yanvar</option>|";
$option .= "<option value=\"02\">Fevral</option>|";
$option .= "<option value=\"03\">Mart</option>|";
$option .= "<option value=\"04\">Aprel</option>|";
$option .= "<option value=\"05\">May</option>|";
$option .= "<option value=\"06\">Iyun</option>|";
$option .= "<option value=\"07\">Iyul</option>|";
$option .= "<option value=\"08\">Avqust</option>|";
$option .= "<option value=\"9\">Sentyabr</option>|";
$option .= "<option value=\"10\">Oktyabr</option>|";
$option .= "<option value=\"11\">Noyabr</option>|";
$option .= "<option value=\"12\">Dekabr</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';







echo "Gun<br/>";
$option = "<select name=\"gun$ref\">|";
$option .= "<option value=\"03\">3</option>|";
$option .= "<option value=\"04\">4</option>|";
$option .= "<option value=\"05\">5</option>|";
$option .= "<option value=\"06\">6</option>|";
$option .= "<option value=\"07\">7</option>|";
$option .= "<option value=\"08\">8</option>|";
$option .= "<option value=\"09\">9</option>|";
$option .= "<option value=\"10\">10</option>|";
$option .= "<option value=\"11\">11</option>|";
$option .= "<option value=\"12\">12</option>|";
$option .= "<option value=\"13\">13</option>|";
$option .= "<option value=\"14\">14</option>|";
$option .= "<option value=\"15\">15</option>|";
$option .= "<option value=\"16\">16</option>|";
$option .= "<option value=\"17\">17</option>|";
$option .= "<option value=\"18\">18</option>|";
$option .= "<option value=\"19\">19</option>|";
$option .= "<option value=\"20\">20</option>|";
$option .= "<option value=\"21\">21</option>|";
$option .= "<option value=\"22\">22</option>|";
$option .= "<option value=\"23\">23</option>|";
$option .= "<option value=\"24\">24</option>|";
$option .= "<option value=\"25\">25</option>|";
$option .= "<option value=\"26\">26</option>|";
$option .= "<option value=\"27\">27</option>|";
$option .= "<option value=\"28\">28</option>|";
$option .= "<option value=\"29\">29</option>|";
$option .= "<option value=\"30\">30</option>|";
$option .= "<option value=\"31\">31</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';

echo "il<br/>";
$option = "<select name=\"il$ref\">|";
$option .= "<option value=\"2015\">2015</option>|";
$option .= "<option value=\"2016\">2016</option>|";
$option .= "<option value=\"2017\">2017</option>|";
$option .= "<option value=\"2018\">2018</option>|";
$option .= "<option value=\"2019\">2019</option>|";
$option .= "<option value=\"2020\">2020</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';


print $_v->submit('G&#246;ster','show=ok');

}
$i = 1;
while ($raa = mysql_fetch_array($resu))
{
	$idi=$raa["idfoto"];
	$qus = mysql_query ("Select * from users where id = '".$idi."'");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user=$ind["user"];
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$ind[id]&amp;ref=$ref\">".$u_user."</a><br/>";
echo $divide;
echo "&#350;ekil:<img $style src=\"image.php?img=show_foto/$raa[photo]&amp;size=75\" alt=\"$u_user\"/><br/>";
echo "Hediyye: <b>$dunen_bal</b> bal<br/>";
echo $divide;
echo "Evvelki oyunlara bax:<br/>";
$_v->action("show_foto.php?act=data&amp;id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref");


echo "Ay<br/>";
$option = "<select name=\"ay$ref\">|";
$option .= "<option value=\"01\">Yanvar</option>|";
$option .= "<option value=\"02\">Fevral</option>|";
$option .= "<option value=\"03\">Mart</option>|";
$option .= "<option value=\"04\">Aprel</option>|";
$option .= "<option value=\"05\">May</option>|";
$option .= "<option value=\"06\">Iyun</option>|";
$option .= "<option value=\"07\">Iyul</option>|";
$option .= "<option value=\"08\">Avqust</option>|";
$option .= "<option value=\"9\">Sentyabr</option>|";
$option .= "<option value=\"10\">Oktyabr</option>|";
$option .= "<option value=\"11\">Noyabr</option>|";
$option .= "<option value=\"12\">Dekabr</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';

echo "Gun<br/>";
$option = "<select name=\"gun$ref\">|";
$option .= "<option value=\"03\">3</option>|";
$option .= "<option value=\"04\">4</option>|";
$option .= "<option value=\"05\">5</option>|";
$option .= "<option value=\"06\">6</option>|";
$option .= "<option value=\"07\">7</option>|";
$option .= "<option value=\"08\">8</option>|";
$option .= "<option value=\"09\">9</option>|";
$option .= "<option value=\"10\">10</option>|";
$option .= "<option value=\"11\">11</option>|";
$option .= "<option value=\"12\">12</option>|";
$option .= "<option value=\"13\">13</option>|";
$option .= "<option value=\"14\">14</option>|";
$option .= "<option value=\"15\">15</option>|";
$option .= "<option value=\"16\">16</option>|";
$option .= "<option value=\"17\">17</option>|";
$option .= "<option value=\"18\">18</option>|";
$option .= "<option value=\"19\">19</option>|";
$option .= "<option value=\"20\">20</option>|";
$option .= "<option value=\"21\">21</option>|";
$option .= "<option value=\"22\">22</option>|";
$option .= "<option value=\"23\">23</option>|";
$option .= "<option value=\"24\">24</option>|";
$option .= "<option value=\"25\">25</option>|";
$option .= "<option value=\"26\">26</option>|";
$option .= "<option value=\"27\">27</option>|";
$option .= "<option value=\"28\">28</option>|";
$option .= "<option value=\"29\">29</option>|";
$option .= "<option value=\"30\">30</option>|";
$option .= "<option value=\"31\">31</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';


echo "il<br/>";
$option = "<select name=\"il$ref\">|";
$option .= "<option value=\"2015\">2015</option>|";
$option .= "<option value=\"2016\">2016</option>|";
$option .= "<option value=\"2017\">2017</option>|";
$option .= "<option value=\"2018\">2018</option>|";
$option .= "<option value=\"2019\">2019</option>|";
$option .= "<option value=\"2020\">2020</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';

print $_v->submit('G&#246;ster','show=ok');

}}
}else{
$currdate = "".$gun."-".$ay."-".$il."";
echo "<b><i>$currdate</i></b> Tarixinde Qalib Olan &#304;stifade&#231;i<br/>";
echo $divide;


$galery = mysql_query ("select sum(vote) as num from show_foto where date ='".$currdate."';");
#--------------------------------
$foto = mysql_fetch_array($galery);
$num = $foto["num"];
$dunen_bal=$num/2;
$resu = @mysql_query ("Select * from show_foto where `date` = '".$currdate."' order by vote desc limit 0,1;");
if (mysql_affected_rows() == 0) {
echo "Se&#231;diyiniz vaxtda oyun tapilmadi.<br/>";
echo "<a href=\"show_foto.php?act=data&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri</a><br/>\n";
}
$i = 1;
while ($raa = mysql_fetch_array($resu))
{
	$idi=$raa["idfoto"];
	$qus = mysql_query ("Select * from users where id = '".$idi."'");
if (mysql_affected_rows() != 0) {
$ind = mysql_fetch_array ($qus);
$u_user=$ind["user"];
echo "<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$ind[id]&amp;ref=$ref\">".$u_user."</a><br/>";
echo $divide;
echo "&#350;ekil:<img $style src=\"image.php?img=show_foto/$raa[photo]&amp;size=75\" alt=\"$u_user\"/><br/>";
echo "Hediyye: <b>$dunen_bal</b> bal<br/>";

}
}
}
echo $divide;
$_v->fsize2($fsize2);

	break;


#===============================Ses Verenler====================================
case 'vote':
$action = $_GET['action'];
$galery = mysql_query ("select count(id) as num from show_ses where idwho ='".$action."';");
$_v->title('Ses Verenler','left');
$_v->fsize1($fsize1);

$q = mysql_query( "SELECT * FROM `users` WHERE `id` = '".$action."';" );
$arr = mysql_fetch_array($q);

echo "<b>$arr[user]</b> Ses veren istifade&#231;iler<br/>\n";
echo $divide;
$usm = mysql_fetch_array($galery);
$num = $usm["num"];
if(!isset($s))$s=0;
$mx=round(($num/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;
if($do>$num)$do=$num;
$o=$ot-1;
$n=$ot;
if($do==0)$n=$o;
if($num ==0){

echo "<i>Hec Kim Ses Vermeyib.</i><br/>";
$_v->fsize2($fsize2);
break;
}
$r = mysql_query ("select * from `show_ses` where `idwho`='".$action."' order by vote desc limit $o,$do");
for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);
$login=$arr['login'];
$whoid=$arr['whoid'];
$vote=$arr['vote'];
$data=$arr['data'];
$saat=$arr['saat'];
echo ($i).") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$whoid&amp;ref=$ref\">".$login."</a>($vote ses)<br/>";

}
$next=$s+1;
$prev=$s-1;
if ($num>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$num)$do=$num;
echo $divide;
echo "<a href=\"show_foto.php?act=vote&amp;id=$id&amp;ps=$ps&amp;s=$next&amp;action=$action&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"show_foto.php?act=vote&amp;id=$id&amp;ps=$ps&amp;s=$prev&amp;action=$action&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
}

$_v->fsize2($fsize2);
break;

}
$_v->fsize1($fsize1);

if($act=="m" or !$act) {
echo $divide;


echo "<a href=\"show_foto.php?act=data&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Ke&#231;en Oyunun Qalibi</a><br/>\n";
echo "<a href=\"show_foto_start.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Yari&#351;a ba&#351;la</a><br/>\n";
echo "<a href=\"show_foto.php?act=qayda&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Qaydalar</a><br/>\n";

}else {
if($act=="vote" or $act=="ses")echo $divide;
echo "<a href=\"show_foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;ekil &#350;ou</a><br/>\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
//echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a> - <a href=\"show_foto.php?act=license&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">License</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>