<?PHP 
$sto = file("file/dat_folder/n_n/znaknihad_niko.dat");
$znak1 = trim($sto[0]);
$znak2 = trim($sto[1]);
$znak3 = trim($sto[2]);
$znak4 = trim($sto[3]);
$znak5 = trim($sto[4]);
$znak6 = trim($sto[5]);
$ZN_ORDERS = ARRAY(
    '3600' => ''.$znak1.'', // 1 saat
    '43200' => ''.$znak2.'', // 12 saat
    '86400' => ''.$znak3.'', // 1 gun
    '259200' => ''.$znak4.'', // 3 gun
    '604800' => ''.$znak5.'', // 7 gun
    '2592000' => ''.$znak6.''  // 30 gun
);
@DEFINE('LINK_PATH',    '/./');
@DEFINE('ZN_DIRECTORY', 'img/zn');
@DEFINE('PAGE_LIMIT',   10);
@DEFINE('CASE_MOD',     INTVAL($HTTP_GET_VARS['mod']));
//@DEFINE('PHP_SELF',     BASENAME(__FILE__));
@DEFINE('PHP_SELF', basename($_SERVER['SCRIPT_NAME']));

CLASS FUNCTIONS{
    FUNCTION DTIME($NEW){
        $DAY    = @FLOOR($NEW / 86400);
        $HOUR   = @FLOOR(($NEW - ($DAY * 86400)) / 3600);
        $MINUT  = @FLOOR(($NEW - (($DAY * 86400) + ($HOUR * 3600))) / 60);
        $SECOND = @FLOOR($NEW - (($DAY * 86400) + ($HOUR * 3600) + ($MINUT * 60)));
        $DAY    = ($DAY!=0) ? $DAY." g&#252;n " : FALSE;
        $HOUR   = ($HOUR!=0) ? $HOUR." saat " : FALSE;
        $MINUT  = ($MINUT!=0) ? $MINUT." deq " : FALSE;
        $SECOND = ($SECOND!=0) ? $SECOND." san" : FALSE;
        RETURN $DAY.$HOUR.$MINUT.$SECOND;
    }
    FUNCTION PAGESTART($TOTAL,$MAX){
        GLOBAL $HTTP_GET_VARS;
        $VARS = $HTTP_GET_VARS['page'];
        $PAGE = (!ISSET($VARS)) ? 0 : INTVAL($VARS);
        $START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
        IF(CEIL($TOTAL/$MAX) < $PAGE){
            $START = 0;
        }
        RETURN ARRAY($PAGE,$START,$MAX);
    }
    FUNCTION PAGENAV($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
        $_NEXTPAGE = "N&#246;vbeti";
        $_PREVPAGE = "Evvelki";
        $TOTAL_P = CEIL($TOTAL/$MAX);
	    IF($TOTAL_P==1){
	    	RETURN FALSE;
	    }
        $PAGE = ($PAGE*$MAX);
	    $ON_P = FLOOR($PAGE/$MAX)+1;
	    $STRING_P = FALSE;
	    IF($ON_P==1){
		    $STRING_P = '<a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>';
	    }
	    IF($ON_P==$TOTAL_P){
		    $STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a><br/>';
	    }
	    IF($TOTAL_P>10){
            $MAX_P = ($TOTAL_P>3) ? 3 : $TOTAL_P;
	    	FOR($START=1; $START<$MAX_P + 1; $START++){
	    		$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
	    		IF($START<$MAX_P){
	    			$STRING_P .= " ";
	    		}
	    	}
	    	IF($TOTAL_P>3){
		    	IF($ON_P>1 && $ON_P<$TOTAL_P){
				    $STRING_P .= ($ON_P>5) ? ' ... ' : ' ';
				    $MIN_P = ($ON_P>4) ? $ON_P : 5;
				    $MAX_P = ($ON_P<$TOTAL_P-4) ? $ON_P : ($TOTAL_P-4);
				    FOR($START=$MIN_P-1; $START<$MAX_P+2; $START++){
				    	$STRING_P .= ($START == $ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
				    	IF($START<$MAX_P+1){
				    		$STRING_P .= ' ';
				    	}
				    }
				    $STRING_P .= ($ON_P<$TOTAL_P-4) ? ' ... ' : ' ';
			    } ELSE {
			    	$STRING_P .= ' ... ';
			    }
			    FOR($START=$TOTAL_P-2; $START<$TOTAL_P+1; $START++){
				    $STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]'  : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
				    IF($START<$TOTAL_P){
				    	$STRING_P .= " ";
				    }
			    }
	    	}
        } ELSE {
		    FOR($START=1; $START<$TOTAL_P+1; $START++){
		    	$STRING_P .= ($START==$ON_P) ? '[<b>'.$START.'</b>]' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
		    	IF($START<$TOTAL_P){
				    $STRING_P .= ' ';
			    }
		    }
	    }
	    IF($NEXT){
		    IF($ON_P>1 && $ON_P<$TOTAL_P) {
		    	$STRING_P = '<a href="'.$BASE_URL."page=".($ON_P-2).'">'.$_PREVPAGE.'</a> | <a href="'.$BASE_URL."page=".$ON_P.'">'.$_NEXTPAGE.'</a><br/>'.$STRING_P;
		    }
		    IF($ON_P<$TOTAL_P){
		    	$STRING_P .= '';
		    }
	    }
	    RETURN $STRING_P."<br/>";
    }
    FUNCTION COUNT_IMG_FILES($DIRECTORY){
        IF(@IS_DIR($DIRECTORY)){
             $DIR_HANDLE = @OPENDIR($DIRECTORY);
        }
        IF(!$DIR_HANDLE){
             RETURN FALSE;
        }
        $COUNT = 0;
        WHILE($IMG = @READDIR($DIR_HANDLE)){
            IF($IMG!="." AND $IMG!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($IMG))){
                IF(!IS_DIR($DIRECTORY."/".$IMG)){
                     $COUNT++;
                } ELSE {
                     $COUNT += FUNCTIONS::COUNT_IMG_FILES($DIRECTORY."/".$IMG);
                }
            }
        }
        @CLOSEDIR($DIR_HANDLE);
        RETURN $COUNT;
    }
    FUNCTION GENERATOR_IMG($VALUE){
        IF(!FILE_EXISTS(ZN_DIRECTORY.'/'.$VALUE.'.gif')){
            RETURN $VALUE;
        } ELSE {
            RETURN FUNCTIONS::GENERATOR_IMG($VALUE+1);
        }
    }
}
$FN = NEW FUNCTIONS;
@REQUIRE("inc.php");
$LINK = connect_db();
LIST($row, $id, $ps, $fsize1, $fsize2) = check_login($LINK);

if($row["znakalphp"]==1){
$_v->title('Diqqet...','center');
$_v->fsize1($fsize1);
echo "<b>Diqqet.! </b> Siz Cezalisiniz Znak Xidmetine Daxil Ola Bilmersiniz..!<br/>\n";
$_v->divide();
echo "<a href=\"on.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Online</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
$ref = RAND(1000,9999);
IF(CASE_MOD==4){
if($_v->ver=="wml")$_v->ver="vista1";
} 

$_v->title('Znak Al');

    $_v->fsize1($fsize1);

SWITCH(CASE_MOD){
    DEFAULT:
    IF($id==1){
        ECHO "<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Znak elave et</a><br/>\n";
    }
    $DIRECTORY = @OPENDIR(ZN_DIRECTORY);
    IF(!$DIRECTORY){
        ECHO "Bazada znak yoxdur<br/>\n";
    } ELSE {
        IF($row['zn']!=''){
            ECHO "H&#246;rmetli <u>".$row['user']."</u> Sizin hal-haz&#305;rda znak&#305;n&#305;z var vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($row['zn_time'] - TIME())."</u> qal&#305;b.<br/>Yeni znak almaq &#252;&#231;&#252;n kohne znak&#305; le&#287;v etmelisiz..<br/>----<br/> <img src=\"img/z".$row['zn'].".gif\" alt=\"Znak\"/> - [<a href=\"znak_al.php?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]<br/>";
        } ELSE {
            ECHO "A&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z znaklardan z&#246;vq&#252;n&#252;ze uy&#287;un olan&#305;n&#305; se&#231;e bilersiz..<br/>";
        }
        $_v->divide();
        IF($id==1){
            IF(ISSET($_GET['cid'])){
                $DEL = STR_REPLACE("../", "", $_GET['cid']);
                $DEL = STR_REPLACE("./", "",  $DEL);
                IF(!FILE_EXISTS(ZN_DIRECTORY."/".$DEL)){
                    ECHO "Qeyd etdiyiniz znak bazada m&#246;vcut deyil!<br/>\n";
                } ELSE {
                    @UNLINK(ZN_DIRECTORY."/".$DEL);
                    ECHO "Qeyd etdiyiniz znak bazadan silindi!<br/>\n";
                }
                $_v->divide();
            }
        }
        $_ARR = @ARRAY();
        WHILE($ZN = @READDIR($DIRECTORY)){
            IF($ZN!="." AND $ZN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($ZN))){
                $_ARR[] = $ZN;
            }
        }
        $TOTAL = COUNT($_ARR);
        ECHO "Cemi: (<b>".$TOTAL."</b>) znak var.<br/>\n";
        $_v->divide();
        LIST($PAGE,$START,$MAX) = $FN->PAGESTART($TOTAL,PAGE_LIMIT);
        $END = !ISSET($PAGE) ? $MAX : ($START+$MAX);
        WHILE($START<$END){
            IF(!EMPTY($_ARR[$START])){
                IF($id==1){
                    ECHO "[<a href=\"znak_al.php?cid=".$_ARR[$START]."&amp;id=$id&amp;ps=$ps&amp;page=".$PAGE."&amp;ref=$ref\">x</a>] ";
                }
                ECHO "<b>".($START+1)."</b>) - <a href=\"znak_al.php?mod=1&amp;zn=".($START+1)."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\"><img src=\"".ZN_DIRECTORY."/".$_ARR[$START]."\" alt=\"Znak\"/></a>\n";
                ECHO "<br/>\n";
            }
            $START++;
        }
        IF($TOTAL>$MAX){
            $_v->divide();
            ECHO $FN->PAGENAV(PHP_SELF."?&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $TOTAL, $MAX, $PAGE);
        }
    }
    BREAK;

    CASE(1):
    $DIRECTORY = @OPENDIR(ZN_DIRECTORY);
    $_ARR = @ARRAY();
    WHILE($ZN = @READDIR($DIRECTORY)){
        IF($ZN!="." AND $ZN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($ZN))){
            $_ARR[] = $ZN;
        }
    }
    IF(ISSET($_GET['zn'])){
        $ZNAK = INTVAL($_GET['zn']);
        IF(!EMPTY($_ARR[$ZNAK-1])){
            $ICON_ZN = "<img src=\"".ZN_DIRECTORY."/".$_ARR[$ZNAK-1]."\" alt=\"Znak\"/>\n";
        } ELSE {
            $ICON_ZN = FALSE;
        }
    }
    IF(!$DIRECTORY){
        ECHO "Bazada znak yoxdur<br/>\n";
    }ELSE IF(ISSET($ZNAK)){

IF(!$ICON_ZN!=""){
ECHO "Se&#231;diyiniz znak bazada m&#246;vcut deyil!<br/>\n";
$_v->divide();
ECHO "<a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
BREAK;

}
              
ECHO $ICON_ZN." - Se&#231;diyiniz znak!<br/>\n";

$_v->divide();
$_v->action("znak_al.php?mod=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref");
ECHO "Vaxt Se&#231;in:<br/>\n";
$option .="<select name=\"time\">|";
FOREACH($ZN_ORDERS AS $VALUE => $KEY){
$option .= "<option value=\"".$VALUE."\">".$FN->DTIME($VALUE)." - ".$ZN_ORDERS[$VALUE]." Bal</option>|";
}
$option .="</select>";
print $_v->select($option)."<br/>\n";

print $_v->submit("Elave Et","znak=".$ZNAK);    

}
    BREAK;
    
    CASE(2):
    $DIRECTORY = @OPENDIR(ZN_DIRECTORY);
    $_ARR = @ARRAY();
    WHILE($ZN = @READDIR($DIRECTORY)){
        IF($ZN!="." AND $ZN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($ZN))){
            $_ARR[] = $ZN;
        }
    }
    $ZNAK = INTVAL($_POST['znak']);
    $TIME = INTVAL($_POST['time']);
    IF(!EMPTY($_ARR[$ZNAK-1])){
        $ZN_NAME = STRTOK($_ARR[$ZNAK-1], ".");
        $ICON_ZN = "<img src=\"".ZN_DIRECTORY."/".$_ARR[$ZNAK-1]."\" alt=\"Znak\"/>\n";
    } ELSE {
        $ICON_ZN = FALSE;
    }
    IF(!$DIRECTORY){
        ECHO "Bazada znak yoxdur<br/>\n";
    } ELSE {
        $ZN_REG = array(3600, 43200, 86400, 259200, 604800, 2592000);
        $ERROR = FALSE;
        IF($TIME=='3600'){
        } ELSEIF($TIME=='43200'){
        } ELSEIF($TIME=='86400'){
        } ELSEIF($TIME=='259200'){
        } ELSEIF($TIME=='604800'){
        } ELSEIF($TIME=='2592000'){
        } ELSE {
            $ERROR = "<b>Xeta:</b> Vaxt d&#252;zg&#252;n se&#231;ilmeyib..<br/>----<br/><a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
        }
        IF($row['bal']<$ZN_ORDERS[$TIME]){
            $ERROR = "<b>Xeta:</b> ".$FN->DTIME($TIME)." m&#252;ddetine znak almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda minimum <b>".$ZN_ORDERS[$TIME]."</b> bal olmal&#305;d&#305;r..<br/> Hesab&#305;n&#305;zda (<b>".$row['bal']."</b>) bal var<br/>----<br/><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a>";
        } ELSEIF($row['zn']!=''){
            $ERROR = "<b>Xeta:</b> Sizin hal-haz&#305;rda znak&#305;n&#305;z var vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($row['zn_time'] - TIME())."</u> qal&#305;b.<br/>Yeni znak almaq &#252;&#231;&#252;n kohne znak&#305; le&#287;v etmelisiz..<br/>----<br/> <img src=\"img/z".$row['zn'].".gif\" alt=\"Znak\"/> - [<a href=\"znak_al.php?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]";
        }
        IF($ERROR!=FALSE){
            ECHO $ERROR."<br/>\n";
        } ELSE {
            $ZN_TIME = TIME() + $TIME;
            $UPDATE = MYSQL_QUERY("UPDATE `users` SET `zn`='n/".MYSQL_ESCAPE_STRING($ZN_NAME)."', `zn_time`='".MYSQL_ESCAPE_STRING($ZN_TIME)."', `bal` = `bal` - '".$ZN_ORDERS[$TIME]."' WHERE `id`='".$id."'");
            IF($UPDATE){
                ECHO "<u><b>Tebrikler!..</b></u><br/>\n";
                $_v->divide();
                ECHO "H&#246;rmetli <u>".$row['user']."</u> siz <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine ".$ICON_ZN." znak&#305;n&#305; ald&#305;n&#305;z.<br/>";
                ECHO "Hesab&#305;n&#305;zdan <b>".$ZN_ORDERS[$TIME]."</b> bal &#231;&#305;x&#305;ld&#305;.<br/>";
                $MSG = "<b>".$row['user']."</b> niki <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine yeni znak ald&#305;.";
                @MYSQL_QUERY("INSERT INTO `zapiski` SET `idtowhom` = '1',`towhom` = '".$admin."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Yeni Znak',`message` = '".$MSG."';");
                $zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `zn_time`!= '0' and `zn_time` < ".time().";");
                while($zn_users = mysql_fetch_array($zn_sql)){
                    mysql_query("UPDATE `users` SET `zn` = '', zn_time = '0' WHERE `id` = '".$zn_users["id"]."';");
                    $rnd = rand(0,99999999);
                    $metn = "H&#246;rmetli <b>".$zn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z znak&#305;n m&#252;ddeti bitdi.";
                    mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$zn_users["id"]."',`towhom` = '".$zn_users["user"]."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Znak',`message` = '".$metn."';");
                }
            } ELSE {
                ECHO "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
            }
        }
    }
    BREAK;

    CASE(3):
    ECHO "<u><b>Le&#287;v et!..</b></u><br/>\n";
    $_v->divide();
    $UPDATE = MYSQL_QUERY("UPDATE `users` SET `zn`='', `zn_time`='0' WHERE `id`='".$id."'");
    IF($UPDATE){
        ECHO "H&#246;rmetli <u>".$row['user']."</u> Znak&#305;n&#305;z u&#287;urla le&#287;v edildi.<br/>";
    } ELSE {
        ECHO "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
    }
    BREAK;

    CASE(4):
    IF($id!=1){
        ECHO "Bura olmaz =)<br/>\n";
        BREAK;
    }
    ECHO "<u><b>Yeni Znak!..</b></u><br/>\n";
    $_v->divide();
    IF(!ISSET($HTTP_POST_VARS['action'])){
        ECHO "<form ENCTYPE=\"multipart/form-data\" action=\"znak_al.php?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
       // ECHO "Ba&#351;qa saytdan g&#246;ster:<br/>\n";
       // $_v->fsize2($fsize2);
     //   ECHO "<input name=\"url\" type=\"text\" value=\"http://\"/><br/>\n";
        //$_v->fsize1($fsize1);
        ECHO "Komputerden y&#252;kle:<br/>\n";
        $_v->fsize2($fsize2);
        ECHO "<input name=\"img\" type=\"file\"/><br/>\n";
        $_v->fsize1($fsize1);
        ECHO "<input type=\"submit\" name=\"action\" value=\"Elave et\"/>\n";
        ECHO "</form>";
    } ELSE {
        $ERROR_URL = FALSE;
        $ERROR_FILE = FALSE;
        $URL = $_POST['url'];
        $FILE = $_FILES['img']['tmp_name'];
        $FILENAME = $_FILES['img']['name'];
        $PAR = @GETIMAGESIZE($FILE);
        $PAR_URL = @GETIMAGESIZE($URL);
        IF($FILENAME==FALSE AND STRLEN($URL)<=7){
            ECHO "<b>Xeta</b>: &#350;ekil se&#231;memisiz..<br/>";
            BREAK;
        }
	

function is_image($file) {
$array = @file($file);
$c=0;
while($c < count($array)) {
if(!empty($array[$c])) {
$result .= iconv("cp1251", "UTF-8", $array[$c]);
}
++$c;
}
if(preg_match("/(php|echo|print|href|http|post|else|basename|hr+c)/i", strtolower($result))) {
return ("shell");
} else {
return $file;
}
}
if(is_image($_FILES['img']['tmp_name']) == "shell")
{
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta: </b>  Anti shell..<br/>';
echo '----</div>';	
echo "<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

/////////////////////////


$albom = null;
$albom->extension = array("gif","jpeg","jpg","png");

   $is_file = $_FILES['img']['tmp_name'];
	if(!is_uploaded_file($is_file)){
		$albom->error = 'Fayl&#305; Se&#231;memisiz.';
	}else{
			$FileSize = FileSize($is_file);
			$GetImageSize = GetImageSize($is_file); 
			$pathinfo = pathinfo($_FILES['img']['name']);

			if($FileSize > 200 * 1024) { // 200 kb
				$albom->error = '&#350;ekil 200 kb-dan &#231;ox olmamal&#305;d&#305;r!';
			} else if(($GetImageSize['2']!='1' and $GetImageSize['2']!='2' and $GetImageSize['2']!='3') or (!in_array(strtolower($pathinfo['extension']), $albom->extension))){
				$albom->error = '&#350;ekil GIF, PNG, JPG VE JPEG format&#305;nda olmal&#305;d&#305;r!';
			} 
}

if($albom->error) {
echo '<div class="inputRed cmy" align="center">';
print '<b>Diqqet Xeta:</b> '.$albom->error.'<br/>';
echo '---</div>';
echo "<a href=\"znak_al.php?mod=4&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit();
}

///////////////////
	
        IF(STRLEN($URL)>7){
            IF(($PAR_URL[2]!=2)&&($PAR_URL[2]!=1)&&($PAR_URL[2]!=3)){
                $ERROR_URL = "<b>Xeta</b>: &#350;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r...";
            }
            IF($ERROR_URL!=FALSE){
                ECHO $ERROR_URL."<br/>";
            } ELSE {
                $IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(ZN_DIRECTORY));
                $COPY_ZNAK = @COPY($URL, ZN_DIRECTORY."/".$IMG.".gif");
                IF($COPY_ZNAK){
                    ECHO "Qeyd etdiyiniz &#252;nvandan znak u&#287;urla elave edildi..<br/>";
                    ECHO "<u>Znak</u> - <img src=\"".ZN_DIRECTORY."/".$IMG.".gif\" alt=\"Znak\"/><br/>";
                } ELSE {
                    ECHO "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
                }
            }
        }
        IF($FILENAME!=FALSE){
            IF(STRLEN($URL)>7)$_v->divide();
            IF(($PAR[2]!=2)&&($PAR[2]!=1)&&($PAR[2]!=3)){
                $ERROR_FILE = "<b>Xeta</b>: Y&#252;klediyiniz &#351;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r..";
            }
            IF($ERROR_FILE!=FALSE){
                ECHO $ERROR_FILE."<br/>";
            } ELSE {
                $IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(ZN_DIRECTORY));
                $COPY_ZNAK = @COPY($FILE, ZN_DIRECTORY."/".$IMG.".gif");
                IF($COPY_ZNAK){
                    ECHO "Qeyd etdiyiniz znak u&#287;urla y&#252;klendi..<br/>";
                    ECHO "<u>Znak</u> - <img src=\"".ZN_DIRECTORY."/".$IMG.".gif\" alt=\"Znak\"/><br/>";
                } ELSE {
                    ECHO "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
                }
            }
        }
        $_v->divide();
        ECHO "<a href=\"znak_al.php?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
    }
    BREAK;
}

    $_v->divide();

IF(CASE_MOD){
    ECHO "<a href=\"znak_al.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Znak al</a><br/>\n";
}
ECHO "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
?>
