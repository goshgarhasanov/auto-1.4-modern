<?php
require("inc.php");
$link =  connect_db();
list($row, $id, $ps, $fsize1, $fsize2, $p_arr) =  check_login($link);


function location($url){
return header("location: {$url}");
};

function online($time){
$users = mysql_query("select count(1) from `card_users` where `time`>'{$time}' and `id`!='".$GLOBALS["us"]["id"]."';");
return mysql_result($users,0);
};

function used($id,$keys='*'){
$users = mysql_query("select {$keys} from `card_users` where `id`='{$id}' limit 1;");
if(!$users) return -1;
return mysql_fetch_array($users);
};

function tm($new){
$minut = (int)floor($new/60);
$minut = $minut!=0 ? $minut : 0;
$second = (int)floor($new-($minut*60));
$second = $second!=0 ? $second : 0;
return array("i"=>"{$minut}", "s"=>"{$second}");
};

function get_card($card,$array){
$card = trim($card);
if(strlen($card)>2){
$c = substr($card,0,2);
}else{
$c = substr($card,0,1);
}

foreach($array as $key){
if(strlen($key)>2){
$k = substr($key,0,2);
}else{
$k = substr($key,0,1);
}

if($c == $k){
return true;
}
}
return false;
}

function check_card($get_card,$user_card,$kozer){
$koz1 = strlen($kozer)>2 ? substr($kozer,2,3) : substr($kozer,1,2);
$car1 = strlen($user_card)>2 ? substr($user_card,2,3) : substr($user_card,1,2);
$car2 = strlen($get_card)>2 ? substr($get_card,2,3) : substr($get_card,1,2);
$car3 = strlen($user_card)>2 ? substr($user_card,0,2) : substr($user_card,0,1);
$car4 = strlen($get_card)>2 ? substr($get_card,0,2) : substr($get_card,0,1);

$car_arr["a"] = array("6","7","8","9","10","j","q","k");
$car_arr["k"] = array("6","7","8","9","10","j","q");
$car_arr["q"] = array("6","7","8","9","10","j");
$car_arr["j"] = array("6","7","8","9","10");
$car_arr["10"] = array("6","7","8","9");
$car_arr["9"] = array("6","7","8");
$car_arr["8"] = array("6","7");
$car_arr["7"] = array("6");
$car_arr["6"] = array();

if($car1 == $car2){
   if(in_array($car3,$car_arr[$car4])){
   return true;
   }
}else{
   if($koz1 == $car2){
   return true;
   }
}
return false;
}
$set = array();
$setting = mysql_query("select `key`,`value` from `card_setting`;");
while(list($key,$value) = mysql_fetch_array($setting)){
$set[$key] = $value;
}
$set["time_online"] = $SERVER_TIME - $set["time_online"];
$update_id = false;

$select = mysql_query("select * from `card_users` where `usid`='{$id}' limit 1;");
if(!mysql_affected_rows()){
mysql_query("insert into `card_users` set
`usid`='{$id}',
`user`='{$row[user]}',
`sex`='{$row[sex]}',
`point`='{$set[point_default]}',
`level`='{$set[level_default]}',
`time`='{$SERVER_TIME}';
");
$insert_id = mysql_insert_id();
$us = array("point"=>$set["point_default"], "level"=>$set["level_default"], "user"=>$row["user"], "id"=>$insert_id);
}else{
$us = mysql_fetch_array($select);
if($us[user]!=$row[user] or $us[sex]!=$row[sex]){
mysql_query("update `card_users` set `user`='{$row[user]}', `sex`='{$row[sex]}' where `id`='{$us[id]}' limit 1;");
}
if($us['room']!=0){
$update_room = ", `room`='0'";
}
}

@mysql_query("update `card_users` set `time`='{$SERVER_TIME}' $update_room where `id`='{$us[id]}' limit 1;");

# ------- yeni gelen devetler
$user_devet = mysql_query("select * from `card_devet` where `nk`='{$us[id]}' and `status`='1' and `time`>'".($SERVER_TIME - 300)."' limit 1;");
$dev = mysql_fetch_array($user_devet);

ob_start();

$go = trim($_GET['go']);
switch($go){
default:
$_v->title('Online Duraki','center');
$_v->fsize1($fsize1);

echo "<b><u>Onlayn Duraka Oyunu</u></b><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
if($us["con"] == 30){
echo "G&#246;nderdiyiniz devet le&#287;v edildi..<br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
mysql_query("update `card_users` set `con`='0' where `id`='{$us[id]}' limit 1;");
}
if($us["active_game"]){
echo "<b><a href=\"cards.php?go=game&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Aktiv Oyun</a></b><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
}elseif($dev[id]){
if($dev['time']>($SERVER_TIME - 302)){
if(isset($redd)){
echo "Devet le&#287;v edildi..<br/>";
mysql_query("update `card_users` set `con`='30' where `id`='{$dev[us]}' limit 1;");
mysql_query("delete from `card_devet` where `id`='{$dev[id]}';");
}elseif(isset($qebul)){
echo "Devet qebul olundu..<br/><a href=\"cards.php?go=game&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Oyuna Ba&#351;la</a><br/>";
mysql_query("insert into `card_active_game` set
`us`='{$dev[us]}',
`nk`='{$us[id]}',
`xod`='{$dev[us]}',
`time`='".($SERVER_TIME+$set["time_up"])."',
`status`='0';");
$game_id = mysql_insert_id();
mysql_query("update `card_users` set `active_game`='{$game_id}' where `id`='{$us[id]}' limit 1;");
mysql_query("update `card_users` set `active_game`='{$game_id}' where `id`='{$dev[us]}' limit 1;");
mysql_query("delete from `card_devet` where `id`='{$dev[id]}';");
}else{
echo "1 Yeni Devet var!<br/>";
$arr = used($dev[us],'user');
echo "<b><a href=\"cards.php?go=user_info&amp;nk={$dev[us]}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">{$arr[user]}</a></b>";
echo " &#8226; <a href=\"cards.php?go={$go}&amp;qebul&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Qebul et</a>";
echo " | <a href=\"cards.php?go={$go}&amp;redd&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Redd et</a><br/>";
}
}else{
mysql_query("delete from `card_devet` where `id`='{$dev[id]}';");
}
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
}
echo "Xal&#305;n&#305;z: <b>{$us[point]}</b> <img src=\"img/card/point.png\" alt=\"*\"/> &#8226; Seviyye: <b>{$us[level]}</b> <img src=\"img/card/level.png\" alt=\"*\"/><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
echo "H&#246;rmetli <b>\"{$us[user]}\"</b>\n <u>Onlayn Duraka</u> oyununa xo&#351; gelmisiz!<br/>";
echo "A&#351;a&#287;&#305;da g&#246;rd&#252;y&#252;n&#252;z istifade&#231;ilerden her hans&#305; birinin infosuna daxil olaraq devet g&#246;ndere bilersiz..<br/>";

echo "&#8226;&#8226;&#8226;&#8226;<br/>";
echo "Online: <b>".online($set["time_online"])."</b> | <a href=\"cards.php?go={$go}&amp;sex={$sex}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Yenile</a><br/>";
echo "---<br/>";
$room_users = array();
$users = mysql_query("select `id`,`user`,`sex`,`active_game` from `card_users` where `time`>'{$set[time_online]}' and `id`!='{$us[id]}' order by `time` desc;");
while($ss = mysql_fetch_array($users)){
$sex = $ss[2]!=0 ? "(Q)" : "(K)";
$room_users[] = $ss[3]!=0 ? "{$ss[1]}{$sex}" : "<a href=\"cards.php?go=user_info&amp;nk={$ss[0]}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">{$ss[1]}</a>{$sex}";
}
if(count($room_users)>0){
echo join("<br/>", $room_users)."<br/>";
}else{
echo "Oyunda he&#231;kes yoxdur..<br/>";
}
echo "&#8226;&#8226;&#8226;&#8226;<br/>";

break;

case "user_info":
$_v->title('User info','center');
$_v->fsize1($fsize1);

$nk = trim($_GET["nk"]);
$select = mysql_query("select * from `card_users` where `id`='{$nk}' limit 1;");
if(!mysql_affected_rows()){
echo "&#304;stifade&#231;i tap&#305;lmad&#305;..<br/>";
}else{
$arr = mysql_fetch_array($select);
echo "<b><u>{$arr[user]}</u></b><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
echo "Oyunda Seviyyesi: <b>{$arr[level]}</b> <img src=\"img/card/level.png\" alt=\"*\"/><br/>";
echo "Xallar&#305;: <b>{$arr[point]}</b> <img src=\"img/card/point.png\" alt=\"*\"/><br/>";
echo $divide;
if(isset($devet)){
if($nk == $us[id]){
echo "&#214;z-&#246;z&#252;n&#252;ze devet g&#246;ndere bilmersiz.<br/>";
}elseif($us[active_game]!=0 && $us[active_game] == $arr[active_game]){
echo "Siz bu istifade&#231;i ile hal-hazirda oyundasiz.<br/>";
}elseif($arr[active_game]!=0){
echo "Bu istifade&#231;inin hal-haz&#305;rda 1 aktiv oyunu var. Devet g&#246;ndere bilmersiz.<br/>";
}elseif($us[active_game]!=0){
echo "Sizin hal-haz&#305;rda 1 aktiv oyunuz var. Devet g&#246;ndere bilmersiz.<br/>";
}else{
mysql_query("delete from `card_devet` where `time`<'".($SERVER_TIME - 300)."';");
mysql_query("insert into `card_devet` set
`us`='{$us[id]}',
`nk`='{$nk}',
`status`='1',
`time`='{$SERVER_TIME}';
");
echo "Devetiniz u&#287;urla g&#246;nderildi. 5-deq erzinde qebul olunmasa devet le&#287;v edilecek..<br/>";
}
}else{
echo "<a href=\"cards.php?go={$go}&amp;nk={$nk}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref&amp;devet=1\">Devet G&#246;nder</a><br/>";
}
}

$_v->divide();

break;

case "exitgame":
$_v->title('Online Duraki (Exit)','center');
$_v->fsize1($fsize1);

if(!$yes){
echo "Sizin hal-hazirda aktiv oyununuz var. Bu oyunu le&#287;v etmek istediyinizden eminsinizmi?<br/>";
echo "<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref&amp;yes=1\">Beli</a> / <a href=\"cards.php?go=game&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Xeyr</a><br/>";
}else{
mysql_query("update `card_users` set `cards`='', `active_game`='0', `con`='0' where `id`='{$us[id]}';");
mysql_query("delete from `card_game_user` where `game_id`='{$us[active_game]}';");
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME)."',
`status`='1'
where `id`='{$us[active_game]}';
");
echo "&#304;steyiniz qeyde al&#305;nd&#305;. Te&#351;ekk&#252;rler..<br/>";
}

$_v->divide();

break;

case "rating":
$_v->title('Online Duraki Reytinq','center');
$_v->fsize1($fsize1);

echo "<b><u>Reytinq</u></b><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
$total = mysql_query("select count(1) from `card_users` where `point`!='0' or `level`>='2';");
$all = mysql_result($total,0);
$next_id = next_id($all);
$s = $next_id[start];
$users = mysql_query("select `id`,`user`,`sex`,`point`,`level` from `card_users` where `point`!='0' or `level`>='2' order by `point` desc, `level` desc  limit $next_id[start],$next_id[max_page];");
if(!mysql_affected_rows()){
echo "Netice yoxdur..<br/>";
}
while($ss = mysql_fetch_array($users)){
$sex = $ss[2]!=0 ? "[Q]" : "[K]";
echo ($s+1).") <a href=\"cards.php?go=user_info&amp;nk={$ss[0]}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">{$ss[1]}</a> {$sex}-(<b>{$ss[3]} xal</b>)<br/>";
++$s;
}
if($next_id['a']>$next_id['max_page']){
echo  page_next("cards.php?go={$go}&amp;id=$id&amp;ps=$ps&amp;ref=$ref&amp;", $next_id['a'], $next_id['max_page'], $next_id['page']);
}

$_v->divide();
break;

case "help":
$_v->title('Online Duraki K&#246;mek','center');
$_v->fsize1($fsize1);

echo "<b><u>K&#246;mek</u></b><br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
echo "<b>\"Onlayn Duraka\"</b> oyunu ilk defe olaraq <b>ErroR!Nick</b> terefinden ekskluziv olaraq <b>{$site}</b> sayt&#305; &#252;&#231;&#252;n yaz&#305;lm&#305;&#351;d&#305;r.<br/>";
echo $divide;
echo "<b>Oyunun qaydalar&#305; beledir</b><br/>";
echo "<b>1)</b> Oyuna qo&#351;ulmaq &#252;&#231;&#252;n ilk &#246;nce reqibinizi se&#231;melisiz ve devet g&#246;ndermelisiz.. Devetiniz qebul olduqdan sonra ilk sehifede <u>Aktiv Oyun</u> yaz&#305;lan yere daxil olursuz..<br/>";
echo "<b>2)</b> Deveti siz g&#246;ndermisizse ilk gedi&#351; sizde olur. Oyuna start vermek &#252;&#231;&#252;n hemin b&#246;lmede g&#246;sterilen 6 kartdan birinin &#252;st&#252;ne t&#305;klay&#305;n<br/>";
echo "<b>3)</b> Eger reqibiniz gedi&#351; etdiyiniz kart&#305; vura bilmese siz <b>{$set[point_2]} xal</b> bonus qazanacaqs&#305;z ve yaxud gedi&#351; olunan vaxtdan <b>{$set[time_up]} saniye</b> erzinde hereketsiz dayansa siz qalib geleceksiz ve <b>{$set[point_3]} xal</b> hesab&#305;n&#305;za elave olunacaq.<br/>";
echo "<b>4)</b> Her vurdu&#287;unuz karta g&#246;re <b>{$set[point_1]} xal</b> hesab&#305;n&#305;za elave olunur..<br/>";
echo "-----<br/>";
echo "<b>Qeyd:</b> Bu oyun &#231;ox sade ve maraql&#305;d&#305;r &#252;m&#252;dvaram ki xo&#351;unuza gelecek. Ham&#305;ya bu oyunda u&#287;urlar.. &#304;mza: <u>ErroR!Nick</u><br/>";
$_v->divide();
break;

case "game":

$_v->title('Online Duraki','center');
$_v->fsize1($fsize1);

if(!$us[active_game]){
location("./cards.php?id={$id}&ps={$ps}&ref={$ref}");
}else{
$active_game = mysql_query("select * from `card_active_game` where `id`='{$us[active_game]}' limit 1;");
if(!mysql_affected_rows()){
location("./cards.php?id={$id}&ps={$ps}&ref={$ref}");
}else{
$gm = mysql_fetch_array($active_game);
$game_id = $gm["id"];
$game_time = $gm["time"];
$game_cards = $gm["game"];
$status = $gm["status"];
$kozer = $gm["kozer"];
$xod = $gm["xod"];
$koz = (strlen($kozer)>2) ? substr($kozer,2,3) : substr($kozer,1,2);
$kozer_text = strtr($koz, array(
"p"=>"Qara &#252;rek",
"x"=>"Xa&#231;",
"k"=>"Kerpi&#231;",
"u"=>"Q&#305;rm&#305;z&#305; &#252;rek"
));
$user_1 = $gm["us"];
$user_2 = $gm["nk"];
# sizin user melumatlari
$my_cards = $us["cards"];
# reqibin user melumatlari
if($gm["us"] == $us["id"]){
$nk_arr = used($gm["nk"]);
}else{
$nk_arr = used($gm["us"]);
}
$nk_cards = $nk_arr["cards"];
$nk_con = $nk_arr["con"];

$select_end_games = mysql_query("select `shot` from `card_end_games` where `usid`='{$us[id]}' and `nkid`='{$nk_arr[id]}' limit 1;");
if(!mysql_affected_rows()){
mysql_query("insert into `card_end_games` set `usid`='{$us[id]}', `nkid`='{$nk_arr[id]}', `shot`='0-0';");
$shot = "0-0";
}else{
$shot = mysql_result($select_end_games, 0);
}
$exp_shot = explode("-", $shot);
$my_shot = trim($exp_shot[0]);
$nk_shot = trim($exp_shot[1]);

if($status == 1){
mysql_query("delete from `card_game_user` where `game_id`='{$game_id}';");
mysql_query("delete from `card_active_game` where `id`='{$game_id}';");
mysql_query("update `card_users` set `active_game`='0', `cards`='' where `id`='{$us[id]}' limit 1;");
# -------- reqib oyunu terk etdi
echo "<u><b>Tebrikler!</b></u><br/>";
echo $divide;
echo "Siz <b>{$nk_arr[user]}</b> ile oynad&#305;&#287;&#305;n&#305;z oyunda qalib geldiniz. Reqibiniz oyunu terk etdi..<br/>";
}elseif($game_time < $SERVER_TIME && $status!=4 && $us["con"]!=10){
# -------- update game status 4
mysql_query("update `card_active_game` set `status`='4' where `id`='{$game_id}' limit 1;");
mysql_query("update `card_users` set `con`='10' where `id`='{$us[id]}' limit 1;");
# -------- verilen vaxta gedis olunmadi
echo "<u><b>Oyun Sona &#199;atd&#305;</b></u><br/>";
echo $divide;
if($xod == $us["id"]){
echo "Siz <b>{$nk_arr[user]}</b> ile oynad&#305;&#287;&#305;n&#305;z oyunda <b>{$set[time_up]} saniye</b> erzinde gedi&#351; etmediyiniz &#252;&#231;&#252;n me&#287;lub oldunuz..<br/>";
}else{
echo "Siz <b>{$nk_arr[user]}</b> ile oynad&#305;&#287;&#305;n&#305;z oyunda qalib geldiniz. Reqibiniz <b>{$set[time_up]} saniye</b> erzinde gedi&#351; etmediyi &#252;&#231;&#252;n me&#287;lub oldu..<br/>";
mysql_query("update `card_users` set `point`=`point`+'50' where `id`='{$us[id]}' limit 1;");
}
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Davam Et</a>]<br/>";
}else{

if(!$game_cards && $status == 0){
$select_card = mysql_query("select `name` from `card_cards` order by rand() desc limit 36;");
while($cards_arr = mysql_fetch_array($select_card)){
$cards[] = $cards_arr[0];
}
$game_cards = @join(",", $cards);
# -------- yeni oyunda kartlar paylandi
mysql_query("update `card_active_game` set `game`='{$game_cards}' where `id`='{$game_id}' limit 1;;");

$exp_card = @explode(",", $game_cards);
$kozer = $exp_card[35];
$koz = (strlen($kozer)>2) ? substr($kozer,2,3) : substr($kozer,1,2);
$kozer_text = strtr($koz, array(
"p"=>"Qara &#252;rek",
"x"=>"Xa&#231;",
"k"=>"Kerpi&#231;",
"u"=>"Q&#305;rm&#305;z&#305; &#252;rek"
));
$my_cards = array();
$you_cards = array();
$game_cards = array();

if($user_1 == $us["id"]){
$i=0;
while($i <= 5){
$my_cards[] = $exp_card[$i];
$i++;
}
unset($i);
$s=6;
while($s <= 11){
$you_cards[] = $exp_card[$s];
$s++;
}
}else{
$i=6;
while($i <= 11){
$my_cards[] = $exp_card[$i];
$i++;
}
unset($i);
$s=0;
while($s <= 5){
$you_cards[] = $exp_card[$s];
$s++;
}
}
$z=12;
while($z <= 35){
$game_cards[] = $exp_card[$z];
$z++;
}
# ----------- reqibin kartlari
$you_cards = @join(",", $you_cards);
# ----------- sizin kartlar
$my_cards = @join(",", $my_cards);
#---------- yerde qalan 24 kart
$game_cards = @join(",", $game_cards);

mysql_query("update `card_users` set `cards`='{$you_cards}' where `id`='{$nk_arr[id]}' limit 1;");
mysql_query("update `card_users` set `cards`='{$my_cards}' where `id`='{$us[id]}' limit 1;");
mysql_query("update `card_active_game` set
`kozer`='{$kozer}',
`time`='".($SERVER_TIME+$set["time_up"])."',
`status`='11',
`game`='{$game_cards}' where `id`='{$game_id}' limit 1;");
}
# -------------- yeni oyuna kartlar paylandi

# --------------- gedis
if(isset($card)){
$get_card = trim("{$card}");
$exp_my = explode(",", $my_cards);
# eger gedis sizindirse
if($xod == $us["id"]){
# eger gedis olunan kart sizin kartdisa
if(in_array($get_card, $exp_my)){
$query = mysql_query("select `id`,`card1`,`card2` from `card_game_user` where `game_id`='{$game_id}' and `action`!='3' order by `id` desc limit 1;");
if(!mysql_affected_rows()){
$last[2] = true;
}else{
$last = mysql_fetch_array($query);
}
# ---------- ilk gedis
if($last[2] == true){
mysql_query("insert into `card_game_user` set
`game_id`='{$game_id}',
`card1`='{$get_card}',
`time`='{$SERVER_TIME}',
`action`='0'
;");
$val_my_cards = array();
foreach($exp_my as $exp_key){
if($exp_key != $get_card){
$val_my_cards[] = $exp_key;
}
}
$my_cards = join(",",$val_my_cards);
mysql_query("update `card_users` set `cards`='{$my_cards}' where `id`='{$us[id]}' limit 1;");
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}' where `id`='{$game_id}' limit 1;
");
}else{
if(check_card($get_card,$last[1],$kozer) != false){
mysql_query("update `card_game_user` set
`game_id`='{$game_id}',
`card2`='{$get_card}',
`time`='{$SERVER_TIME}',
`action`='0' where `id`='{$last[0]}' limit 1;
;");
$val_my_cards = array();
foreach($exp_my as $exp_key){
if($exp_key != $get_card){
$val_my_cards[] = $exp_key;
}
}
$my_cards = count($val_my_cards)>=1 ? join(",",$val_my_cards) : false;
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}' where `id`='{$game_id}' limit 1;
");
mysql_query("update `card_users` set `cards`='{$my_cards}', `point`=`point`+'1' where `id`='{$us[id]}' limit 1;");
}
}
}
}
}

if($xod == $us["id"]){
if(isset($close)){
$closed = true;
$close_game = mysql_query("select `id`,`card2`,`card1` from `card_game_user` where `game_id`='{$game_id}' and `action`!='3' order by `id` asc;");
if(mysql_affected_rows()){
while($cls = mysql_fetch_array($close_game)){
$cards_close[] = $cls[0];
if($cls[1] == ''){
$closed = false;
}
}
if($closed){
foreach($cards_close as $card_id){
mysql_query("update `card_game_user` set `action`='3' where `id`='{$card_id}' limit 1;");
}

# ------------ eger bazarda kart qutaribsa
if(strlen($game_cards) == 0){
// update game status
if(strlen($nk_cards) == 0 && strlen($my_cards) == 0){
#----- reqib qalib geldi status 20
mysql_query("update `card_users` set `con`='22' where `id`='{$nk_arr[id]}' limit 1;");
#----- meglub oldunuz status 21
mysql_query("update `card_users` set `con`='22' where `id`='{$us[id]}' limit 1;");
#----- oyun bitdi status 4
mysql_query("update `card_active_game` set
`status`='4',
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}' where `id`='{$game_id}' limit 1;");
}elseif(strlen($nk_cards) == 0){
#----- reqib qalib geldi status 20
mysql_query("update `card_users` set `con`='20' where `id`='{$nk_arr[id]}' limit 1;");
#----- meglub oldunuz status 21
mysql_query("update `card_users` set `con`='21' where `id`='{$us[id]}' limit 1;");
#----- oyun bitdi status 4
mysql_query("update `card_active_game` set
`status`='4',
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$us[id]}' where `id`='{$game_id}' limit 1;");
}elseif(strlen($my_cards) == 0){
#----- reqib qalib geldi status 20
mysql_query("update `card_users` set `con`='21' where `id`='{$nk_arr[id]}' limit 1;");
#----- meglub oldunuz status 21
mysql_query("update `card_users` set `con`='20' where `id`='{$us[id]}' limit 1;");
#----- oyun bitdi status 4
mysql_query("update `card_active_game` set
`status`='4',
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}' where `id`='{$game_id}' limit 1;");
}else{
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}' where `id`='{$game_id}' limit 1;
");
}
}else{
$exp_game_card = explode(",", $game_cards);
# ----------- eger sizin kartlar qutaribsa
$exp_my = array();
if(strlen($my_cards) == 0){
mysql_query("update `card_users` set `cards`='' where `id`='{$us[id]}' limit 1;");
}else{
# ------- ve yaxud size kart lazimdirsa
$exp_my = explode(",", $my_cards);
if(count($exp_my) <= 5){
$my_c_count = (6 - count($exp_my));
$i=0;
while($i <= ($my_c_count - 1)){
if(empty($exp_game_card[$i])){
$i++;
continue;
}
$my_crp[] = $exp_game_card[$i];
$i++;
}
if(count($my_crp)>0){
$my_cards_join = ",".@join(",", $my_crp);
}
$my_cards = $my_cards.$my_cards_join;
mysql_query("update `card_users` set `cards`='{$my_cards}' where `id`='{$us[id]}';");
}
}

# --------------- eger reqibin kartlari bitibse
$exp_nk = array();
if(strlen($nk_cards) == 0){
mysql_query("update `card_users` set `cards`='', `con`='4' where `id`='{$nk_arr[id]}' limit 1;");
}else{
# ------- ve yaxud
$exp_nk = @explode(",", $nk_cards);
if(count($exp_nk) <= 5){
$nk_c_count = (6 - count($exp_nk))-1;
$i = $my_c_count!=0 ? $my_c_count : 0;
$end = $i;
while($i <= ($nk_c_count + $end)){
if(empty($exp_game_card[$i])){
$i++;
continue;
}
$nk_crp[] = $exp_game_card[$i];
$i++;
}
if(count($nk_crp)>0){
$nk_cards_join = ",".@join(",", $nk_crp);
}
$nk_cards = $nk_cards.$nk_cards_join;
}
mysql_query("update `card_users` set `cards`='{$nk_cards}', `con`='4' where `id`='{$nk_arr[id]}' limit 1;");
}

# -------- bazarda qalan kartlar
$game_c_count = count($exp_game_card)-1;
$cn = 0;
if(count($exp_nk) <= 5){
$nc = (6 - count($exp_nk));
}
$mc = 0;
if(count($exp_my) <= 5){
$mc = (6 - count($exp_my));
}
$nmc = ($nc+$mc);
$s = $nmc!=0 ? $nmc : 0;
while($s <= $game_c_count){
if(empty($exp_game_card[$s])){
$s++;
continue;
}
$game_crp[] = $exp_game_card[$s];
$s++;
}
if(count($exp_game_card) >= count($game_crp)-1){
$game_cards = join(",", $game_crp);
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}',
`game`='{$game_cards}' where `id`='{$game_id}' limit 1;");
}else{
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}',
`game`='' where `id`='{$game_id}' limit 1;");
}
}
}
}
}

if(isset($up)){
$up_cr = array();
$cards_up = mysql_query("select `id`,`card1`,`card2` from `card_game_user` where `game_id`='{$game_id}' and `action`!='3' order by `id` asc;");
if(mysql_affected_rows()){
while($crup = mysql_fetch_array($cards_up)){
$up_cr[] = $crup[1];
if($crup[2]){
$up_cr[] = $crup[2];
}
mysql_query("delete from `card_game_user` where `id`='{$crup[0]}' limit 1;");
}
if(count($up_cr) >= 1){
$exp_my_cards = explode(",", $my_cards);
foreach($exp_my_cards as $card_key){
$up_cr[] = $card_key;
}
$my_up_join = join(",", $up_cr);
mysql_query("update `card_users` set `point`=`point`+'5' where `id`='{$nk_arr[id]}' limit 1;");
mysql_query("update `card_users` set `cards`='{$my_up_join}', `point`=`point`-'5' where `id`='{$us[id]}' limit 1;");
}

# ----------- oyunun bitmesi
if(strlen($nk_cards) == 0){
#----- reqib qalib geldi status 20
mysql_query("update `card_users` set `con`='20' where `id`='{$nk_arr[id]}' limit 1;");
#----- meglub oldunuz status 21
mysql_query("update `card_users` set `con`='21' where `id`='{$us[id]}' limit 1;");
#----- oyun bitdi status 4
mysql_query("update `card_active_game` set
`status`='4',
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$us[id]}',
`game`='{$game_cards}' where `id`='{$game_id}' limit 1;");
}else{
$exp_nk = explode(",", $nk_cards);
$exp_game_card = explode(",", $game_cards);
if(count($exp_nk) <= 5){
$nk_c_count = (6 - count($exp_nk))-1;
$i=0;
while($i <= $nk_c_count){
if(empty($exp_game_card[$i])){
$i++;
continue;
}
$nk_crp[] = $exp_game_card[$i];
$i++;
}
if(count($nk_crp)>0){
$nk_cards_join = ",".join(",", $nk_crp);
}
$nk_cards = $nk_arr["cards"].$nk_cards_join;
mysql_query("update `card_users` set `cards`='{$nk_cards}', `con`='3' where `id`='{$nk_arr[id]}' limit 1;");

$game_crp = array();
$s = (6 - count($exp_nk));
$game_c_count = count($exp_game_card)-1;
while($s <= $game_c_count){
if(empty($exp_game_card[$s])){
$s++;
continue;
}
$game_crp[] = $exp_game_card[$s];
$s++;
}
if(count($game_crp) >= 1){
$game_cards = join(",", $game_crp);
}else{
$game_cards = false;
}
mysql_query("update `card_active_game` set
`time`='".($SERVER_TIME+$set["time_up"])."',
`xod`='{$nk_arr[id]}',
`game`='{$game_cards}' where `id`='{$game_id}' limit 1;");
}
}
}
}
}

# --------------- Oyunun gorunus hissesi
$active_game = mysql_query("select * from `card_active_game` where `id`='{$game_id}' limit 1;");
$gm = mysql_fetch_array($active_game);
$game_time = $gm["time"];
$game_cards = $gm["game"];
$game_status = $gm["status"];
$xod = $gm["xod"];
$user_1 = $gm["us"];
$user_2 = $gm["nk"];

# reqibin user melumatlari
$nk_arr = used($nk_arr["id"]);
$nk_cards = $nk_arr["cards"];
$count_nk_cards = empty($nk_cards) ? 0 : count(explode(",",$nk_cards));
# sizin user melumatlariniz
$my_arr = used($us["id"]);
$my_cards = $my_arr["cards"];

$tm = $game_status != 11 ? array("i"=>"00","s"=>"00") : tm($game_time - $SERVER_TIME);

if($game_status == 4){
if($my_arr["con"] == 21){
echo "Siz <b>{$nk_arr[user]}</b> ile oynad&#305;&#287;&#305;n&#305;z oyunda Me&#287;lub oldunuz!..<br/>";
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Davam Et</a>]<br/>";
mysql_query("update `card_users` set `con`='0' where `id`='{$us[id]}' limit 1;");
}elseif($my_arr["con"] == 20){
echo "Siz <b>{$nk_arr[user]}</b> ile oynad&#305;&#287;&#305;n&#305;z oyunda Qalib geldiniz. Tebrikler!..<br/>";
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Davam Et</a>]<br/>";
mysql_query("update `card_users` set `point`=`point`+'50',`con`='0' where `id`='{$us[id]}' limit 1;");
}elseif($my_arr["con"] == 22){
echo "Oyun He&#231;-He&#231;e qutard&#305;!..<br/>";
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Davam Et</a>]<br/>";
mysql_query("update `card_users` set `con`='0' where `id`='{$us[id]}' limit 1;");
}else{
if($nk_arr["active_game"] != $game_id){
mysql_query("delete from `card_game_user` where `game_id`='{$game_id}';");
mysql_query("delete from `card_active_game` where `id`='{$game_id}';");
}
echo "Oyun Sona &#199;atd&#305;!..<br/>";
mysql_query("update `card_users` set
`con`='0',
`active_game`='0',
`cards`='' where `id`='{$us[id]}' limit 1;");
}
}else{
# --------------- Oyunun gorunus hissesi - start
echo "<b><u>{$nk_arr[user]}</u></b> | {$my_shot}-{$nk_shot} | {$tm[i]}:{$tm[s]}<br/><br/>";
if($count_nk_cards >= 1){
echo str_repeat("<img src=\"img/card/default.png\" width=\"26\" height=\"38\"  alt=\"00\"/>\n", $count_nk_cards)."<br/>";
echo $divide;
}

$online = array();
$str_to_nline = array();
$online_sql = mysql_query("select `card1`,`card2` from `card_game_user` where `game_id`='{$game_id}' and `action`!='3' order by `id` asc;");
if(!mysql_affected_rows()){
if($us["con"] == 3){
echo "Reqibiniz kartlar&#305; Qald&#305;rd&#305;. Gedi&#351; Sizdedir..<br/>";
mysql_query("update `card_users` set `con`='0' where `id`='{$us[id]}' limit 1;");
}elseif($us["con"] == 4){
echo "Reqibiniz kartlar&#305; Zibil Qutusuna g&#246;nderdi. Gedi&#351; Sizdedir..<br/>";
mysql_query("update `card_users` set `con`='0' where `id`='{$us[id]}' limit 1;");
}else{
$card_messages = mysql_query("select * from `card_message` where `toid`='{$us[id]}' and `usid`='{$nk_arr[id]}' and `read`='0' order by `id` desc limit 1");
if(mysql_affected_rows()){
$msg = mysql_fetch_array($card_messages);
echo "<b>{$nk_arr[user]}:</b> {$msg[text]}<br/>";
mysql_query("update `card_message` set `read`='1' where `id`='{$msg[id]}' limit 1;");
}else{
if($xod == $us["id"]){
echo "Gedi&#351; Sizdedir..<br/>";
}else{
echo "Gedi&#351; Reqibinizdedir..<br/>";
}
}
}
}else{
$card_messages = mysql_query("select * from `card_message` where `toid`='{$us[id]}' and `usid`='{$nk_arr[id]}' and `read`='0' order by `id` desc limit 1");
if(mysql_affected_rows()){
$msg = mysql_fetch_array($card_messages);


echo "<u>{$nk_arr[user]}:</u> {$msg[text]}<br/>*****<br/>";
mysql_query("update `card_message` set `read`='1' where `id`='{$msg[id]}' limit 1;");
}
}
while($on = mysql_fetch_array($online_sql)){
$online[] = "<img src=\"img/card/{$on[0]}.png\" width=\"26\" height=\"38\"  alt=\"{$on[0]}\"/>";
$str_to_nline[] = $on[0];
if($on[1]){
$str_to_nline[] = $on[1];
$online[] = "<img src=\"img/card/{$on[1]}.png\" width=\"26\" height=\"38\"  alt=\"{$on[1]}\"/>";
}else{
$online[] = "<img src=\"img/card/default.png\" width=\"26\" height=\"38\"  alt=\"00\"/>";
}
echo join(" - ", $online)."<br/>";
unset($online);
}
# --------------- Oyunun gorunus hissesi - end

if($xod == $us["id"]){
$count_online = count($str_to_nline);
$ups_arr = array(1,3,5,7,9,11,13,15,17,19,21,23,25);
if($count_online!=0 and !in_array($count_online,$ups_arr)){
echo $divide;
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref&amp;close=1\">Ba&#287;la</a>]<br/>";
}elseif(in_array($count_online,$ups_arr) and $my_cards!=''){
$check_card = false;
$ex_mycard = @explode(",",$my_cards);
if(count($ex_mycard) >= 1){
foreach($ex_mycard as $chk){
if(check_card($chk,$str_to_nline[$count_online - 1],$kozer)!=true){
$check_card = true;
}
}
}elseif(check_card($my_cards,$str_to_nline[0],$kozer)!=true){
$check_card = true;
}
if($check_card == true){
echo $divide;
echo "[<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref&amp;up=1\">Qald&#305;r</a>]<br/>";
}
}
}

# ------------- Sizin kartlar
if($my_cards!=''){
echo $divide;
$cards = array();
$explode_my_cards = explode(",", $my_cards);
foreach($explode_my_cards as $key){
if($xod == $us["id"]){
$last_card_nk = mysql_query("select `card1` from `card_game_user` where `game_id`='{$game_id}' and `action`!='3' and `card2`='' order by `id` asc limit 1;");
$l = mysql_fetch_array($last_card_nk);
$last_card = $l["0"];
$is_get = 0;
$is_kozer = check_card($key,$last_card,$kozer);

$select_new_game = mysql_query("select count(1) from `card_game_user` where `game_id`='{$game_id}' and `action`!='3';");
$is_new_game = mysql_result($select_new_game,0);
$online_cards = array();
if($is_new_game!=0){
foreach($str_to_nline as $onl_key){
$online_cards[] = $onl_key;
}
}
if($is_new_game == 0 || ($is_kozer!=false && $last_card!="") || (get_card($key,$online_cards)!=false && $last_card=="")){
$cards[] = "<a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref&amp;card={$key}\"><img src=\"img/card/{$key}.png\" width=\"26\" height=\"38\"  alt=\"{$key}\"/></a>";
}else{
$cards[] = "<img src=\"img/card/{$key}.png\" width=\"26\" height=\"38\"  alt=\"{$key}\"/>";
}
}else{
$cards[] = "<img src=\"img/card/{$key}.png\" width=\"26\" height=\"38\"  alt=\"{$key}\"/>";
}
}
$join_my = join("\n", $cards);
echo $join_my."<br/>";
unset($key);
}
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
$count_bazar = (strlen($game_cards)<2) ? 0 : count(explode(",",$game_cards));
$count_zibil = mysql_result(mysql_query("select count(1) from `card_game_user` where `game_id`='{$gm[id]}' and `action`='3';"),0) * 2;
echo "<b><a href=\"cards.php?go={$go}&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Yenile</a></b><br/>";

echo "&#8226;&#8226;&#8226;&#8226;<br/>";
# --------------- Oyunun gorunus hissesi - start
echo "Kozer: <u>{$kozer_text}</u><br/>";
echo "Bazar: <b>{$count_bazar}</b> / Zibil Qutusu: <b>{$count_zibil}</b><br/>";

echo "&#8226;&#8226;&#8226;&#8226;<br/>";

if(isset($message)){
$message = trim($message);
$message =  narmobil($message);
if($row["smiles"]==2){
$message =  in_smile($message,$row['posts']);
}

if(!empty($message) && mysql_result(mysql_query("select count(1) from `card_message` where `text`='{$message}' and `usid`='{$us[id]}' and `toid`='{$nk_arr[id]}' and `read`='0';"),0) == 0){
mysql_query("insert into `card_message` set
`text`='{$message}',
`usid`='{$us[id]}',
`toid`='{$nk_arr[id]}',
`read`='0';
");
echo "Mesaj u&#287;urla g&#246;nderildi..<br/>";
}

}else{

}
if($_v->ver != "wml") {
echo "<form action=\"cards.php?go={$go}&amp;id=$id&amp;ps=$ps&amp;".$ver."ref=$ref\" method=\"post\">\n";
}
echo "Mesaj&#305;n&#305;z<br/>\n";

if($_v->ver != "wml") {
echo "<input name=\"message\" maxlength=\"60\" title=\"message\"/><br/>\n";
}else{
echo "<input name=\"message$ref\" maxlength=\"60\" title=\"message\"/><br/>\n";
}

if($_v->ver != "wml") {
echo "<input value=\"G&#246;nder\" class=\"head\" type=\"submit\"></form><br/>\n";
}else{
echo "<anchor>[G&#246;nder]<go href=\"cards.php?go={$go}&amp;id=$id&amp;ps=$ps&amp;".$ver."ref=$ref\" method=\"post\">\n";
echo "<postfield name=\"message\" value=\"$(message$ref)\"/>\n";
echo "</go></anchor><br/>\n";
}




echo "[<a href=\"smile.php?id={$id}&amp;ps={$ps}&amp;ref=$ref\">Smaylikler</a>]<br/>";
echo "&#8226;&#8226;&#8226;&#8226;<br/>";
echo "[<a href=\"cards.php?go=exitgame&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Oyunu Terk Et</a>]<br/>";
}
}
}
}
$_v->divide();
break;
}


if(!$go)echo "<a href=\"enter.php?id={$id}&amp;ps={$ps}&amp;ref=$ref\">Dehliz</a>"; else echo "<a href=\"cards.php?id={$id}&amp;ps={$ps}&amp;ref=$ref\">&#304;lk sehfe</a>";

echo " | ";
echo "<a href=\"on.php?id={$id}&amp;ps={$ps}&amp;ref=$ref\">Online</a>  | <a href=\"cards.php?go=help&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">K&#246;mek</a> | <a href=\"cards.php?go=rating&amp;id={$id}&amp;ps={$ps}&amp;ref=$ref\">Reytinq</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);

?>