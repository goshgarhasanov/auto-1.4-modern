<?
require("inc.php");

class functions {
public function pagestart($total,$max){
global $_GET;
$page = (!isset($_GET['page'])) ? 0 : intval($_GET['page']);
$start = (!isset($_GET['page'])) ? 0 : ($page * $max);
if(ceil($total/$max) < $page){
$start = 0;
}
return array($page,$start,$max);
}
public function navigation($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
global $divide;
$_NEXTPAGE = "&gt;&gt;-&gt;&gt;";
$_PREVPAGE = "&lt;&lt;-&lt;&lt;";
$TOTAL_P = CEIL($TOTAL/$MAX);
$STRING_P = FALSE;
IF($TOTAL_P==1){
RETURN FALSE;
} ELSE {echo $divide;
}
$PAGE = ($PAGE*$MAX);
$ON_P = FLOOR($PAGE/$MAX)+1;
IF($ON_P==1){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
}
IF($ON_P==$TOTAL_P){
$STRING_P .= '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
}
IF($NEXT){
IF($ON_P>1 && $ON_P<$TOTAL_P) {
$STRING_P = '<a href="'.$BASE_URL."&amp;page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."&amp;page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
}
IF($ON_P<$TOTAL_P){
$STRING_P .= '';
}
}
RETURN $STRING_P;
}

public function xtime($new){
$day = floor($new / 86400);
$hour = floor(($new - ($day * 86400)) / 3600);
$minut = floor(($new - (($day * 86400) + ($hour * 3600))) / 60);
$second = floor($new - (($day * 86400) + ($hour * 3600) + ($minut * 60)));
$day = ($day!=0) ? $day." g&#252;n " : false;
$hour = ($hour!=0) ? $hour." saat " : false;
$minut = ($minut!=0) ? $minut." deq " : false;
$second = ($second!=0) ? $second." san" : false;
return $day.$hour.$minut.$second;
}

public function ipua(){
global $_SERVER;
if(preg_match("/Opera Mini/i", $_SERVER['HTTP_USER_AGENT'])){
$ip = strtok($_SERVER['HTTP_X_FORWARDED_FOR'], ',');
if(empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip = $_SERVER['REMOTE_ADDR'];
}
$ua = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
if(empty($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])){
$ua = $_SERVER['HTTP_USER_AGENT'];
}
} else {
$ua = htmlentities(addslashes($_SERVER["HTTP_USER_AGENT"]));
$ip = htmlentities(addslashes($_SERVER["REMOTE_ADDR"]));
}
return array($ip,$ua);
}
#===========================================================================
public function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|input|header|mysql|list|array|while|foreach|case|break|server|http|post|else|connect|basename|isset|intval|trim|exists)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
#===========================================================================
public function users($values='', $user) {
    if($values!=''){$vars = $values;
}else{$vars = '*';
}
$user = mysql_escape_string($user);
if(is_numeric($user)) {
$Sql = "SELECT $vars FROM `users` WHERE `id`='".$user."'";
$Query = @Mysql_Query( $Sql );
} else {
$Sql = "SELECT $vars FROM `users` WHERE LOWER(`user`)='". strtolower($user) ."'";
$Query = @Mysql_Query( $Sql );
}
$Result = @MySql_Fetch_Array( $Query );
return $Result;
}
public function is_wml_ua($browser){
$mobile_agents = array('w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
if((preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', $browser) || ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))|| (in_array(strtolower(substr($browser,0,4)),$mobile_agents))) && !(strpos(strtolower($browser),'windows')>0)){
return false;
} else {
return true;
}
}
#===========================================================================
public function int($str){
return strtolower(preg_replace(array('/[^0-9]/'), '', $str));
}
}
$nav = new functions;
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2) = check_login($link);

if($row["hekayephp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Hekaye Bolmesine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"onlayn.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Otaqlar</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}

switch($go){
    default:
$_v->title('Maraqli Hekayeler','center');
$_v->fsize1($fsize1);
    echo "<u><b>Maraqli Hekayeler</b></u><br/>";

    $limit = 1;
    $query = mysql_query("select `id`,`name`,`read` from `user_books` where `status`='1' order by `like` desc limit 500;");
    $values = array();
    while($arr = mysql_fetch_array($query)){
        $values[] =  array('id'=>$arr['id'], 'name'=>$arr['name'], 'read'=>$arr['read']);
    }
    if(count($values)>0){
        $rands = array_rand($values,$limit);
        if($limit==1){
            $randIds[] = $rands;
        }else{
            $randIds = $rands;
        }
        echo $divide;
        echo "Tesad&#252;fi Hekaye:<br/>";
        for($i=0;$i<count($randIds);$i++){
 			$file_id = $values[$randIds[$i]]['id'];
 			$file_name = $values[$randIds[$i]]['name'];
 			$read_count = $values[$randIds[$i]]['read'];
 			echo "<a href=\"hekaye.php?go=info&amp;cid={$file_id}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$file_name}</a> (Oxunub:<b>{$read_count}</b>)<br/>";
  		}
    }

$_v->align('left');
	if($id==1){
        $total_new = mysql_query("select count(1) from `user_books` where `status`='0';");
        $all_new = mysql_result($total_new,0);
    	echo "<b><a href=\"hekaye.php?go=admin&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tesdiq g&#246;zleyenler</a></b>-($all_new)<br/>\n";
        echo $divide;
    }
	echo "<b><a href=\"hekaye.php?go=top&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Top-100</a></b><br/>\n";
	echo "<a href=\"hekaye.php?go=read&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">En &#231;ox oxunanlar</a><br/>\n";
	echo "<a href=\"hekaye.php?go=new&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Yeniler</a><br/>\n";
    echo $divide;
    $total = mysql_query("select count(1) from `user_books` where `status`='1';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='1' order by `like` desc, `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Hekaye yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a>, Oxunub:<b>{$bk[read]}</b>)<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
	break;
 
    case "read":

$_v->title('En &#231;ox oxunanlar','center');
$_v->fsize1($fsize1);
    echo "<u><b>En &#231;ox oxunanlar</b></u><br/>";
$_v->align('left');
    $total = mysql_query("select count(1) from `user_books` where `status`='1' and `read`!='0';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='1' and `read`!='0' order by `read` desc, `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (Oxunub: <b>{$bk[read]}</b> defe)<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
	break;

    case "top":
$_v->title('Top-100','center');
$_v->fsize1($fsize1);
echo "<u><b>Top-100</b></u><br/>";
$_v->align('left');
    $total = mysql_query("select count(1) from `user_books` where `status`='1' and `like`!='0';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='1' and `like`!='0' order by `like` desc, `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a>, Beyenilib:<b>{$bk[like]}</b>)<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
	break;

case "new":
$_v->title('Yeniler','center');
$_v->fsize1($fsize1);
echo "<u><b>Yeniler</b></u><br/>";
$_v->align('left');	
    $total = mysql_query("select count(1) from `user_books` where `status`='1' and `time`>='".(time() - 86400 * 1)."';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='1' and `time`>='".(time() - 86400 * 1)."' order by `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a>)<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
	break;

    case "top_like":
    $cid = (int)$_GET['cid'];
    $select = mysql_query("select * from `user_books` where `id`='".$cid."' limit 1;");
    if(!mysql_affected_rows()){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
        echo "<u><b>Xeta</b></u><br/>";
$_v->align('left');
 echo "Hekaye tap&#305;lmad&#305;..<br/>";
        break;
    }else{
        $arr = mysql_fetch_array($select);
        mysql_query("update `user_books` set `read`=`read`+'1' where `id`='".$cid."'");
    }
$_v->title(''.$arr[name].'','center');
$_v->fsize1($fsize1);
    echo "<u><b>{$arr[name]}</b></u>\n<br/>";
$_v->align('left');
    $total = mysql_query("select count(1) from `user_book_likes` where `book_id`='".$cid."'");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select `usid`, (select `user` from `users` where `id`=`usid`) as `user` from `user_book_likes` where `book_id`='".$cid."' order by `id` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Beyenen olmay&#305;b..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a><br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;cid=$cid&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
    $back = "go=info&amp;cid=$cid&amp;";
	break;

    case "user_books":
    $us = (int)$_GET['nk'];
    $select = mysql_query("select * from `users` where `id`='".$us."' limit 1;");
    if(!mysql_affected_rows()){
		
$_v->title('xeta','center');
$_v->fsize1($fsize1);
        echo "<u><b>Xeta</b></u><br/>";
$_v->align('left');

        echo "&#304;stifade&#231;i tap&#305;lmad&#305;..<br/>";
        break;
    }else{
        $arr = mysql_fetch_array($select);
    }
$_v->title(''.$arr[user].'','center');
$_v->fsize1($fsize1);
echo "<u><b>{$arr[user]}</b></u>\n leqebli istifade&#231;inin hekayeleri<br/>";
$_v->align('left');
    $total = mysql_query("select count(1) from `user_books` where `status`='1' and `usid`='".$us."';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='1' and `usid`='".$us."' order by `like` desc, `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        if($id == 1){
            echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
        }
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (Beyenilib:<b>{$bk[like]}</b>, Oxunub:<b>{$bk[read]}</b>)<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;nk=$us&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
	break;

    case "info":
    $cid = (int)$_GET['cid'];
    $select = mysql_query("select * from `user_books` where `id`='".$cid."' limit 1;");
    if(!mysql_affected_rows()){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
        echo "<u><b>Xeta</b></u><br/>";
$_v->align('left');
        echo "Hekaye tap&#305;lmad&#305;..<br/>";
        break;
    }else{
        $arr = mysql_fetch_array($select);
        mysql_query("update `user_books` set `read`=`read`+'1' where `id`='".$cid."'");
    }
$_v->title(''.$arr[name].'','center');
$_v->fsize1($fsize1);
    echo "<u><b>{$arr[name]}</b></u>\n<br/>";
$_v->align('left');
    echo "M&#252;ellif: <a href=\"info.php?nk={$arr[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$arr[user]}</a><br/>";
    echo $divide;
    echo "<b>Hekayesi:</b><br/>";
    echo "{$arr[body]}<br/>";
    echo $divide;
    echo "Oxunub: <b>{$arr[read]}</b><br/>";
    $selec_c = mysql_query("select count(1) from `user_book_likes` where `book_id`='".$cid."' and `usid`='".$id."'");
    $likes = mysql_result($selec_c,0);
    if(isset($_GET['like'])){
        if(!$likes){
            mysql_query("insert into `user_book_likes` set `usid`='".$id."', `book_id`='".$cid."'");
            $likes = 1;
            $arr[like]++;
            mysql_query("update `user_books` set `like`='".$arr[like]."' where `id`='".$cid."'");
        }
    }
    if($likes){
        $like_link = "&#8226; <img src=\"img/l.png\" alt=\"Like\"/>";
    }else{
        $like_link = "&#8226; <a href=\"hekaye.php?go=info&amp;cid={$cid}&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;like\">Beyendim</a> <img src=\"img/l.png\" alt=\"Like\"/>";
    }
    echo "Beyenilib: <a href=\"hekaye.php?go=top_like&amp;cid={$cid}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$arr[like]}</a> $like_link<br/>";
	break;

    case "search":
$_v->title('Axtar&#305;&#351;','center');
$_v->fsize1($fsize1);
    echo "<u><b>Axtar&#305;&#351;</b></u><br/>";
$_v->align('left');
    $search = isset($_POST['search']) ? trim($_POST['search']) : base64_decode(trim($_GET['search']));
    if(!$search){
      echo "Axtar&#305;&#351; metni:<br/>";
$_v->action("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
print $_v->input("<input name=\"search$ref\" maxlength=\"40\" title=\"Axtar&#305;&#351; metni\"/>").'<br/>';
print $_v->submit('Axtar','action=save');
	
    }else{
        echo "Axtar&#305;&#351; metni: <br/>";
        echo $divide;
        $total = mysql_query("select count(1) from `user_books` where `status`='1' and `name` like '%".mysql_real_Escape_string($search)."%';");
        $all = mysql_result($total,0);
        $limit = 10;
        list($p,$s,$max) = $nav->pagestart($all,$limit);
        $select = mysql_query("select * from `user_books` where `status`='1' and `name` like '%".mysql_real_Escape_string($search)."%' order by `name` desc, `time` desc, `like` desc limit $s,$max;");
        if(!mysql_affected_rows()){
            echo "<u>Netice yoxdur..</u><br/>";
        }
        while($bk = mysql_fetch_array($select)){
            if($id == 1){
                echo "[<a href=\"hekaye.php?go=admin&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">x</a>] ";
            }
            echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> (<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a>, Oxunub:<b>{$bk[like]}</b>)<br/>";
            ++$s;
        }
        if($all>$max){
            echo $nav->navigation("hekaye.php?go=$go&amp;search=$search&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
        }
        $back = "go=$go&amp;";
    }
	break;

    case "send":
	$_v->title('Hekaye Yaz','center');
$_v->fsize1($fsize1);

    echo "<u><b>Hekaye yaz g&#246;nder</b></u><br/>";
$_v->align('left');
    if(!$_POST){
$_v->action("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref");

echo "Ba&#351;l&#305;q:<br/>";
print $_v->input("<input name=\"title$ref\" type=\"text\" maxlength=\"35\" title=\"Basliq\"/>").'<br/>';
echo "Hekaye metni:<br/>";
print $_v->input("<input name=\"body$ref\" type=\"text\" title=\"Hekaye metni\"/>").'<br/>';
print $_v->submit('Elave Et','action=save');
        echo $divide;
        echo "<b>Qeyd:</b> Menas&#305;z hekayeler tesdiqlenmeyecek..<br/>";
    }else{
        $title = htmlspecialchars($_POST['title']);
        $body = htmlspecialchars($_POST['body']);
        $body = in_smile($body);
        $error = array();
if($row['posts']<250){
$error[] = " <u>250 Postdan yuxar&#305;lar hekaye yaza biler.</u><br/>\n";
}		
if(strlen($title)<=6){
            $error[] = "Ba&#351;l&#305;q 5 simvoldan azd&#305;r..";
        }
        if(strlen($body)<=51){
            $error[] = "Hekaye metni 50 simvoldan azd&#305;r..";
        }
if(mysql_num_rows(mysql_query("select * from `user_books` where `body` = '".$body."'"))!=0)
 {
      $error[] = "Bu adda hekaye art&#305;q m&#246;vcuddur.<br/>\n";
 }		

 
        if(count($error)>0){
            echo "Sehfler: (<b>".count($error)."</b>)<br/>";
            echo $divide;
            $i=1;
            foreach($error as $err_text){
                echo $i.")".$err_text."<br/>";
                ++$i;
            }
        }else{
            mysql_query("insert into `user_books` set
                `usid`='".mysql_escape_string($row['id'])."',
                `user`='".mysql_escape_string($row['user'])."',
                `name`='".mysql_escape_string($title)."',
                `body`='".mysql_escape_string($body)."',
                `status`='0',
                `time`='".time()."';
            ");
            if(!mysql_error()){
                echo "Hekayeniz u&#287;urla elave edildi..<br/>";
                echo "<b>Qeyd:</b> Yeni hekayeler Rehberlik terefinden tesdiqlendikden sonra diger hekayeler aras&#305;na elave olunacaq..<br/>";
            }else{
                echo "Baza ile elaqe yaranm&#305;r. Zehmet olmasa 30 saniyye sonra cehd edin.<br/>";
            }
        }
        $back = "go=$go&amp;";
    }
    break;
    
    case "admin":
$_v->title('Hekaye Panel','center');
$_v->fsize1($fsize1);
    echo "<u><b>Hekaye Panel</b></u><br/>";
$_v->align('left');
    if($id!=1){
        echo "Bura olmaz qadasi....<br/>";
        break;
    }
    if(isset($_GET['tesdiq'])){
        @mysql_query("update `user_books` set `status`='1' where `id`='".intval($_GET['tesdiq'])."'");
        echo "Qeyd etdiyiniz hekaye tesdiqlendi..<br/>";
        $back = "go=$go&amp;";
        break;
    }
    if(isset($_GET['del'])){
        @mysql_query("delete from `user_books` where `id`='".intval($_GET['del'])."'");
        @mysql_query("delete from `user_book_likes` where `book_id`='".intval($_GET['del'])."'");
        echo "Qeyd etdiyiniz hekaye silindi..<br/>";
        $back = "go=$go&amp;";
        break;
    }
    $total = mysql_query("select count(1) from `user_books` where `status`='0';");
    $all = mysql_result($total,0);
    $limit = 10;
    list($p,$s,$max) = $nav->pagestart($all,$limit);
    $select = mysql_query("select * from `user_books` where `status`='0' order by `time` desc limit $s,$max;");
    if(!mysql_affected_rows()){
        echo "<u>Netice yoxdur..</u><br/>";
    }
    while($bk = mysql_fetch_array($select)){
        echo ($s+1).")<b><a href=\"hekaye.php?go=info&amp;cid={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[name]}</a></b> [<a href=\"hekaye.php?go=$go&amp;tesdiq={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Tesdiqle</a>]-[<a href=\"hekaye.php?go=$go&amp;del={$bk[id]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Sil</a>]-[<a href=\"info.php?nk={$bk[usid]}&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">{$bk[user]}</a>]<br/>";
        ++$s;
    }
    if($all>$max){
        echo $nav->navigation("hekaye.php?go=$go&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $all, $max, $p);
    }
    break;
}
echo $divide;
if($go){
    echo "<a href=\"hekaye.php?{$back}id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
}else{
    echo "<a href=\"hekaye.php?go=send&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Hekaye g&#246;nder</a><br/>\n";
    echo "<a href=\"hekaye.php?go=search&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Axtar&#305;&#351;</a><br/>\n";
}
echo $divide;
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>