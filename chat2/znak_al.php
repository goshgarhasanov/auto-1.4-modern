<?php
$sto = file("file/dat_folder/znak.dat");
$saato = trim($sto[0]);
$saatio = trim($sto[1]);
$guno = trim($sto[2]);
$gunio = trim($sto[3]);
$guny = trim($sto[4]);
$oun = trim($sto[5]);

$ZN_ORDERS = ARRAY(
    '3600' => ''.$saato.'', // 1 saat
    '43200' => ''.$saatio.'', // 12 saat
    '86400' => ''.$guno.'', // 1 gun
    '259200' => ''.$gunio.'', // 3 gun
    '604800' => ''.$guny.'', // 7 gun
    '2592000' => ''.$oun.''  // 30 gun
);
@DEFINE('LINK_PATH',    '/chat/');
@DEFINE('ZN_DIRECTORY', 'img/zn');
@DEFINE('PAGE_LIMIT',   10);
@DEFINE('CASE_MOD',     INTVAL($HTTP_GET_VARS['mod']));
@DEFINE('PHP_SELF',     BASENAME(__FILE__));

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
	    		$STRING_P .= ($START==$ON_P) ? '(<b>'.$START.'</b>)' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
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
				    	$STRING_P .= ($START == $ON_P) ? '(<b>'.$START.'</b>)' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
				    	IF($START<$MAX_P+1){
				    		$STRING_P .= ' ';
				    	}
				    }
				    $STRING_P .= ($ON_P<$TOTAL_P-4) ? ' ... ' : ' ';
			    } else {
			    	$STRING_P .= ' ... ';
			    }
			    FOR($START=$TOTAL_P-2; $START<$TOTAL_P+1; $START++){
				    $STRING_P .= ($START==$ON_P) ? '(<b>'.$START.'</b>)'  : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
				    IF($START<$TOTAL_P){
				    	$STRING_P .= " ";
				    }
			    }
	    	}
        } else {
		    FOR($START=1; $START<$TOTAL_P+1; $START++){
		    	$STRING_P .= ($START==$ON_P) ? '(<b>'.$START.'</b>)' : '<a href="'.$BASE_URL."page=".($START-1).'">'.$START.'</a>';
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
                } else {
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
        } else {
            RETURN FUNCTIONS::GENERATOR_IMG($VALUE+1);
        }
    }
}
$FN = NEW FUNCTIONS;
@REQUIRE("ay.php");
$LINK = connect_db();
LIST($row, $id, $ps, $fsize1, $fsize2) = check_login($LINK);
WHO("-","-",BASENAME(__FILE__));
$ref = RAND(1000,9999);
IF(CASE_MOD==4){
    @header ("Content-type: text/html; charset=utf-8");
    @header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
    @header("Cache-Control: no-cache, must-relative");

    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">";
    echo "<html>";
    echo "<head>";
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\">";
    echo "<title>Foto y&#252;kle</title>";
    echo "<style type=\"text/css\">";
    ?>
    body {
        font-weight: normal;
        font-size: 14px;
        font-family: sans-serif;
        color: #000;
        background-color: #fff;
    }
    div.body {
        background-color: #414141;
    }
    div.body a {
        color: #fff;
        text-decoration: none;
    }
    div.body a:hover {
        text-decoration: underline;
    }
    a:link,a:active,a:visited {
        text-decoration: underline;
        padding-top: 4px;
        color : #000;
    }
    div {
        margin: 1px 0px 1px 0px;
        padding: 4px 4px 4px 4px;
    }
    div.form {
        background-color: #fff;
        border: 1px solid #424503;
    }
    div.form a {
        color: #000;
    }
    input[type=file],[type=text],select {
        border: 1px solid #424503;
        padding: 3px;
        color : #424503;
        max-width: 200px;
    }
    input[type=submit] {
        border: 1px solid #868686;
        background-color: #414141;
        padding: 4px;
        margin-top: 4px;
        margin-left: 0px;
        color : #fff;
    }
    <?
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class=\"body\"><div class=\"form\">";
    $fsize1 = FALSE;
    $fsize2 = FALSE;
} else {
    @header("Cache-Control: no-cache");
    @header("Content-type:text/vnd.wap.wml");

    echo $xml;
    echo $dtd;
    echo "<wml>";
    echo "<card title=\"Znak al ferqlen\">";
    echo "<p align=\"left\">";
    echo $fsize1;
}
SWITCH(CASE_MOD){
    DEFAULT:
if($id=='1'){
        echo "<a href=\"admin.php?go=znak_panel&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Znak Panel</a><br/>\n";
    }
    $DIRECTORY = @OPENDIR(ZN_DIRECTORY);
    IF(!$DIRECTORY){
        echo "Bazada znak yoxdur<br/>\n";
    } else {
        IF($row['zn']!=''){
            echo "H&#246;rmetli <u>".$row['user']."</u> Sizin hal-haz&#305;rda znak&#305;n&#305;z var vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($row['zn_time'] - TIME())."</u> qal&#305;b.<br/>Yeni znak almaq &#252;&#231;&#252;n kohne znak&#305; le&#287;v etmelisiz..<br/>----<br/> <img src=\"".LINK_PATH."img/z".$row['zn'].".gif\" alt=\"Znak\"/> - [<a href=\"".PHP_SELF."?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]<br/>";
        } else {
            echo "A&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z znaklardan z&#246;vq&#252;n&#252;ze uy&#287;un olan&#305;n&#305; se&#231;e bilersiz..<br/>";
        }
        echo $divide;
        IF($id==1){
            IF(ISSET($_GET['cid'])){
                $DEL = STR_REPLACE("../", "", $_GET['cid']);
                $DEL = STR_REPLACE("./", "",  $DEL);
                IF(!FILE_EXISTS(ZN_DIRECTORY."/".$DEL)){
                    echo "Qeyd etdiyiniz znak bazada m&#246;vcut deyil!<br/>\n";
                } else {
                    @UNLINK(ZN_DIRECTORY."/".$DEL);
                    echo "Qeyd etdiyiniz znak bazadan silindi!<br/>\n";
                }
                echo $divide;
            }
        }
        $_ARR = @ARRAY();
        WHILE($ZN = @READDIR($DIRECTORY)){
            IF($ZN!="." AND $ZN!=".." AND @PREG_MATCH("#(gif|jpg|jpeg|png)#", STRTOLOWER($ZN))){
                $_ARR[] = $ZN;
            }
        }
        $TOTAL = COUNT($_ARR);
        echo "Cemi: <b>".$TOTAL."</b> znak var.<br/>\n";
        echo $divide;
        LIST($PAGE,$START,$MAX) = $FN->PAGESTART($TOTAL,PAGE_LIMIT);
        $END = !ISSET($PAGE) ? $MAX : ($START+$MAX);
        WHILE($START<$END){
            IF(!EMPTY($_ARR[$START])){
                IF($id==1){
                    echo "[<a href=\"".PHP_SELF."?cid=".$_ARR[$START]."&amp;id=$id&amp;ps=$ps&amp;page=".$PAGE."&amp;ref=$ref\">x</a>] \n";
                }
                echo "<b>".($START+1)."</b>) <img src=\"".LINK_PATH.ZN_DIRECTORY."/".$_ARR[$START]."\" alt=\"Znak\"/> -[<a href=\"".PHP_SELF."?mod=1&amp;zn=".($START+1)."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Se&#231;</a>]\n";
                echo "<br/>\n";
                echo $divide;
            }
            $START++;
        }
        IF($TOTAL>$MAX){
            echo $FN->PAGENAV(PHP_SELF."?&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $TOTAL, $MAX, $PAGE);
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
            $ICON_ZN = "<img src=\"".LINK_PATH.ZN_DIRECTORY."/".$_ARR[$ZNAK-1]."\" alt=\"Znak\"/>\n";
        } else {
            $ICON_ZN = FALSE;
        }
    }
    IF(!$DIRECTORY){
        echo "Bazada znak yoxdur<br/>\n";
    } else {
        IF(ISSET($ZNAK)){
            IF(!$ICON_ZN!=""){
                echo "Se&#231;diyiniz znak bazada m&#246;vcut deyil!<br/>\n";
                echo $divide;
                echo "<a href=\"".PHP_SELF."?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
                BREAK;
            } else {
                echo $ICON_ZN." - Se&#231;diyiniz znak!<br/>\n";
                echo $divide;
            }
        } else {
            echo "Znak Se&#231;in:<br/>\n";
            echo "<select name=\"znak$ref\">\n";
            $START = 0;
            $TOTAL = COUNT($_ARR);
            WHILE($START<$TOTAL){
                IF(!EMPTY($_ARR[$START])){
                    echo "<option value=\"".($START+1)."\">Znak - ".($START+1)."</option>\n";
                }
                $START++;
            }
            echo "</select><br/>\n";
        }
    }
    echo "Vaxt Se&#231;in:<br/>\n";
    echo "<select name=\"time\">\n";
    FOREACH($ZN_ORDERS AS $VALUE => $KEY){
        echo "<option value=\"".$VALUE."\">".$FN->DTIME($VALUE)." - ".$ZN_ORDERS[$VALUE]." Bal</option>\n";
    }
    echo "</select><br/>\n";
    echo "<anchor title=\"Elave et\">Elave et<go href=\"".PHP_SELF."?mod=2&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
    IF(ISSET($ZNAK)){
        echo "<postfield name=\"znak\" value=\"".$ZNAK."\"/>";
    } else {
        echo "<postfield name=\"znak\" value=\"$(znak$ref)\"/>";
    }
    echo "<postfield name=\"time\" value=\"$(time)\"/>";
    echo "</go></anchor><br/>";
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
        $ICON_ZN = "<img src=\"".LINK_PATH.ZN_DIRECTORY."/".$_ARR[$ZNAK-1]."\" alt=\"Znak\"/>\n";
    } else {
        $ICON_ZN = FALSE;
    }
    IF(!$DIRECTORY){
        echo "Bazada znak yoxdur<br/>\n";
    } else {
        $ZN_REG = array(3600, 43200, 86400, 259200, 604800, 2592000);
        $ERROR = FALSE;
        IF($TIME=='3600'){
        } elseIF($TIME=='43200'){
        } elseIF($TIME=='86400'){
        } elseIF($TIME=='259200'){
        } elseIF($TIME=='604800'){
        } elseIF($TIME=='2592000'){
        } else {
            $ERROR = "<b>Xeta:</b> Vaxt d&#252;zg&#252;n se&#231;ilmeyib..<br/>----<br/><a href=\"".PHP_SELF."?id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a>";
        }
        IF($row['bal']<$ZN_ORDERS[$TIME]){
            $ERROR = "<b>Xeta:</b> ".$FN->DTIME($TIME)." m&#252;ddetine znak almaq &#252;&#231;&#252;n hesab&#305;n&#305;zda minimum <b>".$ZN_ORDERS[$TIME]."</b> bal olmal&#305;d&#305;r..<br/> Hesab&#305;n&#305;zda (<b>".$row['bal']."</b>) bal var<br/>----<br/><a href=\"hesab.php?bolme=bal&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Bal Y&#252;kleme Qaydas&#305;</a>";
        } elseIF($row['zn']!=''){
            $ERROR = "<b>Xeta:</b> Sizin hal-haz&#305;rda znak&#305;n&#305;z var vaxt&#305;n&#305;n bitmesine <u>".$FN->DTIME($row['zn_time'] - TIME())."</u> qal&#305;b.<br/>Yeni znak almaq &#252;&#231;&#252;n kohne znak&#305; le&#287;v etmelisiz..<br/>----<br/> <img src=\"".LINK_PATH."img/z".$row['zn'].".gif\" alt=\"Znak\"/> - [<a href=\"".PHP_SELF."?mod=3&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Le&#287;v et</a>]";
        }
        IF($ERROR!=FALSE){
            echo $ERROR."<br/>\n";
        } else {
            $ZN_TIME = TIME() + $TIME;
            $UPDATE = MYSQL_QUERY("UPDATE `users` SET `zn`='n/".MYSQL_ESCAPE_STRING($ZN_NAME)."', `zn_time`='".MYSQL_ESCAPE_STRING($ZN_TIME)."', `bal` = `bal` - '".$ZN_ORDERS[$TIME]."' WHERE `id`='".$id."'");
            IF($UPDATE){
                echo "<u><b>Tebrikler!..</b></u><br/>\n";
                echo $divide;
                echo "H&#246;rmetli <u>".$row['user']."</u> siz <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine ".$ICON_ZN." znak&#305;n&#305; ald&#305;n&#305;z.<br/>";
                mysql_query ("Update `users` set `stat`='0.10'+`stat` where `id` ='".$id."';");
				echo "Hesab&#305;n&#305;zdan <b>".$ZN_ORDERS[$TIME]."</b> bal &#231;&#305;x&#305;ld&#305;.<br/>";
                $MSG = "<b>".$row['user']."</b> niki <b>".$FN->DTIME($TIME)."</b> m&#252;ddetliyine znak ald&#305;.";
                @MYSQL_QUERY("INSERT INTO `zapiski` SET `idtowhom` = '1',`towhom` = '".$admin."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Znak',`message` = '".$MSG."';");
                $zn_sql = mysql_query("SELECT `id`,`user` FROM `users` WHERE `zn_time`!= '0' and `zn_time` < ".time().";");
                while($zn_users = mysql_fetch_array($zn_sql)){
                    mysql_query("UPDATE `users` SET `zn` = '', zn_time = '0' WHERE `id` = '".$zn_users["id"]."';");
                    $rnd = rand(0,99999999);
                    $metn = "H&#246;rmetli <b>".$zn_users["user"]."</b>. Ald&#305;&#287;&#305;n&#305;z znak&#305;n m&#252;ddeti bitdi.";
                    mysql_query("INSERT INTO `zapiski` SET `idtowhom` = '".$zn_users["id"]."',`towhom` = '".$zn_users["user"]."',`idwho` = '0',`time` = '".time()."',`who` = 'Sistem',`date` = '".date('H:i - d.m.y')."',`readd` = '0',`topic` = 'Znak',`message` = '".$metn."';");
                }
            } else {
                echo "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
            }
        }
    }
    BREAK;

    CASE(3):
    echo "<u><b>Le&#287;v et!..</b></u><br/>\n";
    echo $divide;
    $UPDATE = MYSQL_QUERY("UPDATE `users` SET `zn`='', `zn_time`='0' WHERE `id`='".$id."'");
    IF($UPDATE){
        echo "H&#246;rmetli <u>".$row['user']."</u> Znak&#305;n&#305;z u&#287;urla le&#287;v edildi.<br/>";
    } else {
        echo "<b>Xeta:</b> Baza ile elaqe yaranm&#305;r 30 deq sonra yene yoxlay&#305;n!<br/>\n";
    }
    BREAK;

    CASE(4):
    if($id!=1){
echo $fsize1;
echo 'Sizin buna huququnuz yoxdur.<br/>';
echo $fsize2;
break;
}
    echo "<u><b>Yeni Znak!..</b></u><br/>\n";
    echo $divide;
    IF(!ISSET($HTTP_POST_VARS['action'])){
        echo "<form ENCTYPE=\"multipart/form-data\" action=\"".PHP_SELF."?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\" method=\"post\">";
        echo "Ba&#351;qa saytdan g&#246;ster:<br/>\n";
        echo $fsize2;
        echo "<input name=\"url\" type=\"text\" value=\"http://\"/><br/>\n";
        echo $fsize1;
        echo "Komputerden y&#252;kle:<br/>\n";
        echo $fsize2;
        echo "<input name=\"img\" type=\"file\"/><br/>\n";
        echo $fsize1;
        echo "<input type=\"submit\" name=\"action\" value=\"Elave et\"/>\n";
        echo "</form>";
    } else {
        $ERROR_URL = FALSE;
        $ERROR_FILE = FALSE;
        $URL = $_POST['url'];
        $FILE = $_FILES['img']['tmp_name'];
        $FILENAME = $_FILES['img']['name'];
        $PAR = @GETIMAGESIZE($FILE);
        $PAR_URL = @GETIMAGESIZE($URL);
        IF($FILENAME==FALSE AND STRLEN($URL)<=7){
            echo "<b>Xeta</b>: &#350;ekil se&#231;memisiz..<br/>";
            BREAK;
        }
        IF(STRLEN($URL)>7){
            IF(($PAR_URL[2]!=2)&&($PAR_URL[2]!=1)&&($PAR_URL[2]!=3)){
                $ERROR_URL = "<b>Xeta</b>: &#350;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r...";
            }
            IF($ERROR_URL!=FALSE){
                echo $ERROR_URL."<br/>";
            } else {
                $IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(ZN_DIRECTORY));
                $COPY_ZNAK = @COPY($URL, ZN_DIRECTORY."/".$IMG.".gif");
                IF($COPY_ZNAK){
                    echo "Qeyd etdiyiniz &#252;nvandan znak u&#287;urla elave edildi..<br/>";
                    echo "<u>Znak</u> - <img src=\"".LINK_PATH.ZN_DIRECTORY."/".$IMG.".gif\" alt=\"Znak\"/><br/>";
                } else {
                    echo "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
                }
            }
        }
        IF($FILENAME!=FALSE){
            IF(STRLEN($URL)>7)echo $divide;
            IF(($PAR[2]!=2)&&($PAR[2]!=1)&&($PAR[2]!=3)){
                $ERROR_FILE = "<b>Xeta</b>: Y&#252;klediyiniz &#351;ekil yaln&#305;z gif, jpg, png, jpeg format&#305;nda olmal&#305;d&#305;r..";
            }
            IF($ERROR_FILE!=FALSE){
                echo $ERROR_FILE."<br/>";
            } else {
                $IMG = $FN->GENERATOR_IMG($FN->COUNT_IMG_FILES(ZN_DIRECTORY));
                $COPY_ZNAK = @COPY($FILE, ZN_DIRECTORY."/".$IMG.".gif");
                IF($COPY_ZNAK){
                    echo "Qeyd etdiyiniz znak u&#287;urla y&#252;klendi..<br/>";
                    echo "<u>Znak</u> - <img src=\"".LINK_PATH.ZN_DIRECTORY."/".$IMG.".gif\" alt=\"Znak\"/><br/>";
                } else {
                    echo "<b>Xeta</b>: &#350;ekil y&#252;klenmedi..<br/>";
                }
            }
        }
        echo $divide;
        echo "<a href=\"".PHP_SELF."?mod=".CASE_MOD."&amp;id=$id&amp;ps=$ps&amp;ref=$ref\">Geri Qay&#305;t</a><br/>\n";
    }
    BREAK;
}
IF(CASE_MOD==4){
    echo '</div>';
} else {
    echo $divide;
}
IF(CASE_MOD){
    echo "<a href=\"".PHP_SELF."?id=$id&amp;ps=$ps&amp;ref=$ref\">Znak al</a> |\n";
}
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>\n";
echo $fsize2;
IF(CASE_MOD==4){
    echo '</div>';
    echo "</body></html>";
} else {
    echo "</p></card></wml>";
}
@MYSQL_CLOSE($LINK);
?>