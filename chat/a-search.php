<?php
require("inc.php");
$link = connect_db();
list($row, $id, $ps, $fsize1, $fsize2,$p_arr) = check_login($link);


if($p_arr['35']!=1 and ($p_arr['147']!=1 or $p_arr['148']!=1)){
$_v->title('Xeta','center');
$_v->fsize1($fsize1);
echo 'Sizin buna huququnuz yoxdur.<br/>';
$_v->divide();
echo "<a href=\"admin.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Admin Panel</a><br/>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
exit;
}
class func{
    FUNCTION search($STR,$ARRAY){
        $I=0;
        FOREACH($ARRAY AS $KEY) {
            $EX = EXPLODE("|", $KEY);
            IF(PREG_MATCH('/('. STRTOLOWER($STR) .')/i', $EX[0])) {
                $RESULT[] = ARRAY("place"=>$I, "text"=>$EX[0]);
            }
            $I++;
        }
        RETURN $RESULT;
    }
    FUNCTION pagestart($TOTAL,$MAX){
        GLOBAL $HTTP_GET_VARS;
        $VARS = $HTTP_GET_VARS['page'];
        $PAGE = (!ISSET($VARS)) ? 0 : INTVAL($VARS);
        $START = (!ISSET($PAGE)) ? 0 : ($PAGE * $MAX);
        IF(CEIL($TOTAL/$MAX) < $PAGE){
            $START = 0;
        }
        RETURN ARRAY($PAGE,$START,$MAX);
    }
    FUNCTION pagenav($BASE_URL, $TOTAL, $MAX, $PAGE, $NEXT=TRUE){
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
}

$_v->title('Axtar');
$_v->fsize1($fsize1);
$search = isset($_POST['search']) ? trim($_POST['search']) : trim($_GET['search']);


$_v->action("a-search.php?id=$id&amp;ps=$ps&amp;ref=$ref");
echo "Axtar&#305;&#351; metni:<br/>\n";
print $_v->input("<input name=\"search$ref\" maxlength=\"100\" value=\"$search\" title=\"Axtar&#305;&#351;\"/>").'<br/>';
print $_v->submit2('G&#246;nder','mid='.$mid);


$_v->divide();

if(isset($_POST['search']) || isset($_GET['search'])){

    if(empty($search)){
        echo "Axtaris metni yazmadiz..<br/>";
    } else {
        $file = file('file/dat_folder/black.dat');
        
        $func = new func;
        $arr = $func->search($search, $file);
        $count = count($arr);
        
        echo "Axtaris neticesi: <b>". $count ."</b> reklam<br/>";
        $_v->divide();
        if($count<1){
            echo "Hecne tapilmadi..<br/>";
        } else
        {
            list($page,$start,$max) = $func->pagestart($count,15);
            $end = !isset($_GET['page']) ? $max : ($start+$max);
            while($start < $end){
                if(empty($arr[$start])){
                    $start++;
                    continue;
                }
                echo "".($start+1).")<a href=\"admin.php?id=$id&amp;ps=$ps&amp;edit=".$arr[$start]['place']."&amp;v2=add&amp;go=arek&amp;ref=$ref\">".$arr[$start]['text']."</a> - [<a href=\"admin.php?id=$id&amp;ps=$ps&amp;del=".$arr[$start]['place']."&amp;go=arek&amp;ref=$ref\">x</a>]<br/>\n";
                $start++;
            }

            if($count>$max){
                echo $divide;
                echo $func->pagenav("a-search.php?id=$id&amp;ps=$ps&amp;ref=$ref&amp;search=$search&amp;", $count, $max, $page);
            }
        }
    }
    $_v->divide();

}
echo "<a href=\"panel.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Anti Reklam</a> | \n";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a>\n";
$_v->fsize2($fsize2);
$_v->end('1',$link);
ob_end_flush();
?>
