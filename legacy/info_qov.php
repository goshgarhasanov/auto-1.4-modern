<?
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

$bal = $row["bal"];
$rpos = file("file/dat_folder/n_n/nikobal.dat");
$nikobal = trim($rpos[0]);

$nikobal = $nikobal;// <- bal

switch($mod) {

	default:
	if(isset($go))
	{
		@mysql_query ("Delete from `info_qov` where `usid` ='".$nk."' and `id` = '".$id."';");
		$info_qovnick = @mysql_fetch_array(@mysql_query ("Select `user` from `users` where `id`='".$nk."' LIMIT 1;"));

		$_v->title('Azad edildi','center');
		$_v->fsize1($fsize1);
		echo "<b>".$info_qovnick[0]."</b> info iqnor listinizden &#231;&#305;xard&#305;ld&#305;.<br/>\n";
		$_v->divide();
		echo "<a href =\"info_qov.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfo iqnor list</a><br/>\n";
		echo "<a href =\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}

	$_v->title('&#304;nfo iqnor listi');
	$_v->fsize1($fsize1);

	$userm = mysql_query ("select count(`klu4`) as `num` from `info_qov` where `id` ='".$id."';");
	echo "<b>Sizin info iqnor listiniz!</b><br/>";
	echo "<b>Qeyd:</b> info iqnora edilen user sizin melumatlari gormur, sizin statusa, xatire defterinize yaza bilmir ve hediyye gondere bilmir.<br/>";
	$_v->divide();
	$usm = mysql_fetch_array($userm);
	$num = $usm["num"]; 
	if ($num == 0){
	echo "Info iqnor listiniz bo&#351;dur.<br/>";
	}else{
	echo "<i>&#304;nfo iqnordan &#231;&#305;xartmaq istediyiniz nikin qar&#351;&#305;s&#305;ndak&#305; [X] d&#252;ymesini bas&#305;n.</i><br/>";
	$_v->divide();
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
	echo "G&#246;sterir $n-$do / $num<br/>\n";
	echo $divide;
	$r = mysql_query ("select `usid` from `info_qov` where `id` ='".$id."' order by `klu4` desc limit $o,$do");
	for ($i=$ot;$i<=$do;$i++){
	$arr = mysql_fetch_array($r);
	$nk=$arr['usid'];
	$info_qovnick = @mysql_fetch_array(@mysql_query ("Select user from users where id='".$nk."' LIMIT 1;"));
	echo ($i).") <a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;go=del&amp;nk=$nk&amp;ref=$ref\">[Х]</a>|<a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$nk&amp;ref=$ref\">".$info_qovnick[0]."</a><br/>"; 
	}                                     
	$next=$s+1;
	$prev=$s-1;
	if ($num>$do) {
	$ot=(($next-1)*10)+1;
	$do=$next*10;
	if($do>$num)$do=$num;
	echo $divide;
	echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;s=$next&amp;ref=$ref\">&gt;&gt;$ot-$do&gt;&gt;</a><br/>\n";
	}
	if($s>1) {
	$ot=(($prev-1)*10)+1;
	$do=$prev*10;
	echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;s=$prev&amp;ref=$ref\">&lt;&lt;$ot-$do&lt;&lt;</a><br/>\n";
	}
	}
	echo $divide;
	echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;mod=add&amp;ref=$ref\">&#304;nfo iqnor listine elave et</a><br/>\n";
	$_v->divide();
	echo "<a href =\"cabinet.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#350;exsi Kabinet</a><br/>\n";
	echo "<a href =\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
	$_v->fsize2($fsize2);
	$_v->end('1',$link);
	break;


	case 'add':
	if(!isset($nk))
	{
		$_v->title('&#304;qnor listine elave et');
		$_v->fsize1($fsize1);
		$_v->action("info_qov.php?mod=add&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
		echo "Nik ve ya ID:<br/>\n";
		print $_v->input("<input name=\"nk\" maxlength=\"30\"/>").'<br/>';
		print $_v->submit('infodan qov');
		$_v->divide();
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;qnor list</a><br/>\n";    
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}

	if (!ctype_digit($nk)) {
	$nk=trim($nk);    
	if($nk=="")$nk=0;
	$latuser=strtolower($nk);
	$select = mysql_query ("Select `user`,`id`,`level` from `users` where `latuser` = '".$latuser."'"); 
	} else {
	$select = mysql_query ("select `user`,`id`,`level` from `users` where `id` = '".$nk."'");
	}
	if (mysql_affected_rows() == 0)
	{
		$_v->title('Xeta');
		$_v->fsize1($fsize1);
		echo "Axtard&#305;q&#305;n&#305;z istifade&#231;i tap&#305;lmad&#305;...<br/>\n";  
		echo $divide;
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}
	$inf = mysql_fetch_array ($select); 
	$nk = $inf["id"];
	$addus= $inf["user"];
	@mysql_query ("Select * from `info_qov` where `usid`=".$nk." and `id`='".$id."';");
	if (mysql_affected_rows()!=0)
	{
		$_v->title('Xeta');
		$_v->fsize1($fsize1);
		echo "<b>".$addus."</b> daha  &#246;nce infodan qovulub.<br/>\n";  
		echo $divide;
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;nfo iqnor list</a><br/>\n";    
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}



	if ($inf['level']>=4)
	{
		$_v->title('Olmaz','center');
		$_v->fsize1($fsize1);
		echo "<b>Admin</b>leri infodan qovmaq olmaz.<br/>\n";  
		echo $divide;
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;qnor list</a><br/>\n";    
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}



	
        if ($bal < $nikobal)
	{
		$_v->title('Olmaz','center');
		$_v->fsize1($fsize1);
		echo "<b>Hesabinizda Bal Azdir</b><br/> Xidmetin deyeri $nikobal Bal<br/>\n";  
		echo $divide;
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#304;qnor list</a><br/>\n";    
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
		break;
	}


	if (!ctype_digit($nk)) {header("Location: enter.php?id=$id&amp;ps=$ps&amp;ref=$ref"); die;}
	@mysql_query ("Select `saat` from `hesab` where `usid`=".$nk." and `x`='30';");
	if (mysql_affected_rows()==0)
	{
		mysql_query ("Insert into `info_qov` set `usid`='".$nk."', `id`='".$id."';");
		$_v->title('Ok','center');
		$_v->fsize1($fsize1);
		echo "<b>".$addus."</b> &#304;nfodan qovuldu..!<br/>\n";  
               @mysql_query ("update `users` set `bal` = `bal` - '".$nikobal."'  where `id` = '".$id."' LIMIT 1");
		echo $divide;
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#304;qnor List</a><br/>";
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
	}
	else
	{
		$_v->title('Stop','center');
		$_v->fsize1($fsize1);
		echo "<b>".$addus."</b> Anti-&#304;qnor Sisteminden istifade edir onu iqnor etmek olmaz!<br/>\n";  
		echo $divide;
		echo "<a href=\"info_qov.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">&#304;nfo iqnor List</a><br/>";
		if ($rm!="") echo "<a href=\"chat.php?id=$id&amp;ps=$ps&amp;rm=$rm&amp;ref=$ref\">Chata qay&#305;t</a><br/>";
		echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
		$_v->fsize2($fsize2);
		$_v->end('1',$link);
	}
}
?>