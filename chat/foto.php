<?
require("inc.php"); 
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link); 


$albom = null;
$albom->posts = array('1'=>'50','2'=>'500','3'=>'1000','4'=>'2000','5'=>'4000','6'=>'7000','7'=>'12000','8'=>'17000','9'=>'25000','10'=>'30000');
$albom->extension = array("gif","jpeg","jpg","png");


if($_POST['go']=='send') {

	$message = $_POST['message'];
	$message = chkdsk($message,basename(__FILE__));
	$message = narmobil($message);

        $is_file = $_FILES['file']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['file']['name']);

			if($FileSize > 2000 * 1024) { // 2000 kb
				$albom->error = '&#350;ekil 2000 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG ve JPEG format&#305;nda olmal&#305;d&#305;r!';
			} else if (!$handle = opendir('photos/'.$id)) {
				$albom->error = '"photos/'.$id.'" qovlu&#289;u tap&#305;lmad&#305;... Admine m&#252;raciet edin.';
			}

			if (!$albom->error) {
				$num = 0;
				while (false !== ($files = readdir($handle))) {
					if ($files != "." && $files != ".." && $files != "Thumbs.db")  {
						$num++;
					}
				}
				closedir($handle);
				
				$next_num = $num+1;
				if(!$albom->posts[$next_num]) {
					$albom->error = 'Foto Alboma maxsimum '.$num.' &#351;ekil y&#252;klemek olar.';
				} else if($albom->posts[$next_num] > $row['posts']) {
					$albom->error = 'Foto Alboma '.$next_num.' &#351;ekil y&#252;klemek &#252;&#231;&#252;n '.$albom->posts[$next_num].'-den &#231;ox postunuz olmal&#305;d&#305;r.';
				}
				
				if (!$albom->error) {
					$albom->upload = $id.-rand(100, 99999).'.'.strtolower($pathinfo['extension']);
					if(COPY($is_file, 'photos/'.$id.'/'.$albom->upload)) {
						CHMOD('photos/'.$id.'/'.$albom->upload, 0777);
						
						mysql_query("INSERT INTO `albom` SET `idfoto`='{$id}', `photo`='{$albom->upload}', `sex`='{$row[sex]}', `info`='{$message}';");
						mysql_query("UPDATE `users` SET `img`='".$next_num."' WHERE `id` ='{$id}' LIMIT 1;");
					}
				}
			}
		}
}
if($_v->ver=="wml")$_v->ver="vista1";
$_v->title('Foto Albom!','center');
$_v->fsize1($fsize1);

echo "<b>FOTO-ALBOM</b><br/>";
$_v->align('left');
echo "<div class=\"sms\">";

echo "1) &#350;ekil 2000 kb-dan &#231;ox olmamal&#305;d&#305;r<br/></font>\n";
echo "2) <i>\"<u>Foto-Albom</u>\"a &#350;ekil Y&#252;klemek &#252;&#231;&#252;n m&#252;eyyen edilmi&#351; postunuz olmal&#305;d&#305;r. (postunuz azalm&#305;r)</i><br/>";

$_v->divide();

if($albom->upload) {
	$_v->align('center');
	echo "<b>Bu &#350;ekil Foto Alboma Elave Edildi.</b><br/>----<br/>";
	echo "<img src=\"image.php?img=photos/{$id}/{$albom->upload}&amp;size=200\">\n";
	$_v->align('left');
}
else
{
	foreach($albom->posts as $num => $posts) {
		if($num < 10) {
			echo $num.' &#350;ekil - '.$posts.' post<br/>';
		}
	}
}
echo "</div>";



echo '<div class="sms">';

if($albom->error) {
	echo '<div class="inputRed cmy" align="center">';
	print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
	echo '</div>';
}



echo "<form ENCTYPE=\"multipart/form-data\" action=\"foto.php?id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">\n";
echo "<b>&#350;ekil se&#231;in:</b><br/>\n";
echo "<input type=\"file\" name=\"file\" title=\"file\"/><br/>\n";
echo "&#350;ekil haqq&#305;nda:<br/>\n";
echo "<input type=\"message\" name=\"message\" /><br />\n";
echo "<input type=\"hidden\" name=\"go\" value=\"send\" />\n";
echo "<input type=\"submit\" value=\"Y&#252;kle\" /><br/>\n";
echo "</form><br/>\n";
	
echo '</div>';

$_v->divide();

echo "<a href=\"cabinet.php?go=foto&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Foto-Albom</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";


if(!is_dir('photos/'.$id)) {
	@mkdir(addslashes('photos').'/'.$id);
	@chmod(addslashes('photos').'/'.$id, 0777);
}
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>