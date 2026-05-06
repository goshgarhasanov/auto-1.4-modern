<?php
include("inc.php");
$link = connect_db();
LIST($row, $id, $ps, $fsize1, $fsize2) = check_login($link);
$ref = rand(10000, 99999);

$nickname = $row['user'];
$level = $row['level'];
$oyunxal = $row['oyunxal'];
$merhele = $row['merhele'];

$_v->title('Bilik Yar&#305;&#351;&#305;','center');
$_v->fsize1($fsize1);
echo "<u><b>Virtual Bilik Yar&#305;&#351;&#305;</b></u><br/>\n";
$_v->align('left');
if(isset($_GET['act'])) $act = $_GET['act'];
else $act = "";
switch($_GET['act']){
default:
$q = mysql_query("SELECT `mer`, `xal` FROM `bilik` WHERE `id` = '".$id."';");
if(mysql_num_rows($q)==0) {
    mysql_query("INSERT INTO `bilik` SET `id` = '".$id."', `n` = '0', `xal` = '0', `mer` = '0', `qid` = '0';");
    $merhele = 0;
    $xal = 0;
} else {
    $merhele = mysql_result($q, 0, 'mer');
    $xal = mysql_result($q, 0, 'xal');
}
if($id==1) {
    echo " <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;act=suallar&amp;ref=$ref\">Suallara nezaret</a><br/>";
    echo " <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;act=add&amp;ref=$ref\">Sual elave et</a><br/><br/>";
}
echo "Nick: <b>".$nickname."</b><br/>";
echo "Merhele: ".$merhele.", Xal: ".$xal."<br/><br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;act=rating&amp;ref=$ref\">Reytinq</a><br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;ref=$ref\">Oyuna ba&#351;la</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;&#305;x&#305;&#351;</a><br/>";
break;

case 'game':

if(isset($_GET['n'])) $n = intval($_GET['n']);
else $n = 0;

$q = mysql_query("SELECT * FROM `bilik` WHERE `id` = '".$id."';");
$us = mysql_fetch_array($q);
$us_n = $us['n'];
$us_qid = $us['qid'];

if($us_n != $n){
mysql_query("UPDATE `bilik` SET `n` = '0', `qid` = '0' WHERE `id` = '".$id."';");
echo "Sehvlik var!Geriye qayidin ve yeniden daxil olun!<br/><br/>";
}elseif(isset($_GET['answer'])){
$q = mysql_query("SELECT `answer` FROM `sual` WHERE `id` = '".$us_qid."';");
if(mysql_num_rows($q)==0) $cavab = "w";
else $cavab = mysql_result($q, 0);
$answer = mysql_escape_string($_GET['answer']);
if($cavab==$answer){
echo "Cavab d&#252;zg&#252;nd&#252;r.<br/>";
if($n > 0) echo "Eger n&#246;vbeti merheleye ke&#231;seniz ve suala d&#252;zg&#252;n cavab vere bilmeseniz, he&#231;bir xal qazana bilmeyeceksiniz. &#304;ndi oyunu terk etseniz $n xal hesab&#305;n&#305;za yaz&#305;lacaq. $n xal sizi qane edirse Oyunu terk edin, daha &#231;ox xal qazanmaq ve daha &#231;ox merhele ke&#231;mek &#252;&#231;&#252;nse N&#246;vbeti merheleye ke&#231;in. Se&#231;im sizindir...<br/>";
$n = $n+1;
mysql_query("UPDATE `bilik` SET `n` = '".$n."', `qid` = '0' WHERE `id` = '".$id."';");
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;act=game&amp;n=$n&amp;ref=$ref\">Merhele $n-e ke&#231;</a><br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;act=end&amp;ref=$ref\">Oyunu terk et</a><br/>";



}else{



mysql_query("UPDATE `bilik` SET `n` = '0', `qid` = '0' WHERE `id` = '".$id."';");
echo "Cavab yanl&#305;&#351;d&#305;r. Siz he&#231;bir xal qazana bilmediniz...<br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;&amp;ref=$ref\">Yeniden oyna</a><br/>";
}
}else{

echo "Merhele: ";
if($n==0) echo "Haz&#305;rl&#305;q<br/>";
else echo $n."<br/>";
$q = mysql_query("SELECT * FROM `sual` WHERE `n` = '".$n."' ORDER BY RAND() LIMIT 1;");
$su = mysql_fetch_array($q);
$qid = $su['id'];
mysql_query("UPDATE `bilik` SET `qid` = '".$qid."' WHERE `id` = '".$id."';");
echo $su['sual']."<br/><br/>";
echo "A) <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;answer=a&amp;q_id=$qid&amp;n=$n&amp;ref=$ref\">".$su['a']."</a> ";
echo "B) <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;answer=b&amp;q_id=$qid&amp;n=$n&amp;ref=$ref\">".$su['b']."</a> ";
echo "C) <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;answer=c&amp;q_id=$qid&amp;n=$n&amp;ref=$ref\">".$su['c']."</a> ";
echo "D) <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;answer=d&amp;q_id=$qid&amp;n=$n&amp;ref=$ref\">".$su['d']."</a> ";
echo "<br/><br/>";
}
break;

case 'suallar':
if($id ==1){
if(empty($niko))
{$c0der_sql = mysql_query("SELECT * FROM `sual` ORDER BY `id` DESC;");
if(mysql_num_rows($c0der_sql) == 0) {
echo "Bazada sual tap&#305;lmad&#305;.<br/>\n";
}while($VM_SYSTEM = mysql_fetch_array($c0der_sql))
{$sira_nomresi = $VM_SYSTEM['id'];
$sual = $VM_SYSTEM['sual'];
$cavabi = $VM_SYSTEM['answer'];
$merhele = $VM_SYSTEM['n'];
echo "<b>$sira_nomresi</b>. $sual (Cavab&#305;: <u>$cavabi</u> | merhele: <u>$merhele</u>)  - <a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=suallar&amp;niko=sil&amp;nomre=$sira_nomresi\">x</a><br/>";}} else if ($niko = "sil") {echo "Qeyd etdiyiniz sual silindi.<br/>";mysql_query("DELETE FROM `sual` WHERE `id` = '".$nomre."';");}echo "<br/>";
}else{
echo"Bura Ushaq Yeri Deyil Agilli ol..!Hormetle: Nihad_Niko<br/>";}
break;


case 'end':
$q = mysql_query("SELECT * FROM `bilik` WHERE `id` = '".$id."';");
$bi = mysql_fetch_array($q);
$merhele = $bi['mer'];
$us_n = $bi['n']-1;
$xal = $bi['xal'];

if($us_n > $merhele){
mysql_query("UPDATE `bilik` SET `mer` = '".$us_n."', `n` = '0' WHERE `id` = '".$id."';");

}

if($us_n > 0){
$xal = $xal+$us_n;
mysql_query("UPDATE `bilik` SET `xal` = '".$xal."', `n` = '0' WHERE `id` = '".$id."';");
}

$q = mysql_query("SELECT * FROM `bilik` WHERE `id` = '".$id."';");
$bi = mysql_fetch_array($q);
$merhele = $bi['mer'];
$xal = $bi['xal'];

$n = mysql_query("SELECT `nickname` FROM `chat_users` WHERE `id` = '".$uid."';");
$amm = mysql_fetch_array($n);
$nick = $amm['nickname'];

echo "Nick: <b>$nickname</b><br/>";
echo "Merhele: $merhele , Xal: $xal<br/><br/>";


echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=rating&amp;ref=$ref\">Reytinq</a><br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=game&amp;ref=$ref\">Oyuna ba&#351;la</a><br/>";
echo "<a href=\"../enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">&#199;&#305;x&#305;&#351;</a><br/>";
break;



case 'rating':



$userall = mysql_query ("select count(id) as num from bilik where mer > '0'  and xal > '0';");
$usm = mysql_fetch_array($userall);
$cemi = $usm["num"];

if(!isset($s))$s=0;
$mx=round(($cemi/10)+0.45);
if($s>$mx)$s=$mx;
if($s==0)$s=1;
$ot=(($s-1)*10)+1;
$do=$s*10;

if($do>$cemi)$do=$cemi;
$o=$ot-1;
$n=$ot;




$r = mysql_query("SELECT * FROM `bilik` WHERE `mer` > 0 AND `xal` > 0 ORDER BY `xal` DESC LIMIT $o, $do");

for ($i=$ot;$i<=$do;$i++){
$arr = mysql_fetch_array($r);

$uid = $arr['id'];
$n = mysql_query("SELECT `user` FROM `users` WHERE `id` = '".$uid."';");
$amm = mysql_fetch_array($n);
$nick = $amm['user'];
$merhele = $arr['mer'];
$xal = $arr['xal'];
if (mysql_affected_rows() == 0) {
$nick = "[<u>nik silinib</u>]";
}
if($i<=3)echo "<img src=\"img/$i.gif\" alt=\"$i-$qa\"/>";
echo $i.") <a href=\"info.php?id=$id&amp;ps=$ps&amp;nk=$uid&amp;ref=$ref\">$nick</a> Merhele:$merhele | Xal:$xal<br/>";

}

$next=$s+1;
$prev=$s-1;

if ($cemi>$do) {
$ot=(($next-1)*10)+1;
$do=$next*10;
if($do>$cemi)$do=$cemi;
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=rating&amp;s=$next\">ireli</a><br/>\n";
}
if($s>1) {
$ot=(($prev-1)*10)+1;
$do=$prev*10;
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;act=rating&amp;s=$prev\">Geri</a><br/>\n";
}

break;

case 'add':

if($id==1){
if(!isset($_POST['action']))
{

$_v->action("bilik.php?id=$id&amp;ps=$ps&amp;act=add&amp;ref=$ref");

echo "Sual:<br/>\n";
print $_v->input("<input type=\"text\" name=\"question\" maxlength=\"150\"/>").'<br/>';
echo "Variantlar:<br/>A): \n";
print $_v->input("<input type=\"text\" name=\"a$nocache\" maxlength=\"50\"/>").'<br/>';

echo "B): \n";
print $_v->input("<input type=\"text\" name=\"b$nocache\" maxlength=\"50\"/>").'<br/>';

echo "C): \n";
print $_v->input("<input type=\"text\" name=\"c$nocache\" maxlength=\"50\"/>").'<br/>';

echo "D): \n";
print $_v->input("<input type=\"text\" name=\"d$nocache\" maxlength=\"50\"/>").'<br/>';

echo "D&#252;z variant: \n";
print $_v->input("<input type=\"text\" name=\"answer$nocache\" maxlength=\"1\" size=\"1\"/>").'<br/>';



echo "Merhele: \n";
$hazirliq='-0';
$option = "<select name=\"mer\">|";
$option .= "<option value=\"0\">0</option>|";
$option .= "<option value=\"1\">1</option>|";
$option .= "<option value=\"2\">2</option>|";
$option .= "<option value=\"3\">3</option>|";
$option .= "<option value=\"4\">4</option>|";
$option .= "<option value=\"5\">5</option>|";
$option .= "<option value=\"6\">6</option>|";
$option .= "<option value=\"7\">7</option>|";
$option .= "<option value=\"8\">8</option>|";
$option .= "<option value=\"9\">9</option>|";
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
$option .= "<option value=\"32\">32</option>|";
$option .= "<option value=\"33\">33</option>|";
$option .= "<option value=\"34\">34</option>|";
$option .= "<option value=\"35\">35</option>|";
$option .= "<option value=\"36\">36</option>|";
$option .= "<option value=\"37\">37</option>|";
$option .= "<option value=\"38\">38</option>|";
$option .= "<option value=\"39\">39</option>|";
$option .= "<option value=\"40\">40</option>|";
$option .= "<option value=\"41\">41</option>|";
$option .= "<option value=\"42\">42</option>|";
$option .= "<option value=\"43\">43</option>|";
$option .= "<option value=\"44\">44</option>|";
$option .= "<option value=\"45\">45</option>|";
$option .= "<option value=\"46\">46</option>|";
$option .= "<option value=\"47\">47</option>|";
$option .= "<option value=\"48\">48</option>|";
$option .= "<option value=\"49\">49</option>|";
$option .= "<option value=\"50\">50</option>|";
$option .= "<option value=\"51\">51</option>|";
$option .= "<option value=\"52\">52</option>|";
$option .= "<option value=\"53\">53</option>|";
$option .= "<option value=\"54\">54</option>|";
$option .= "<option value=\"55\">55</option>|";
$option .= "<option value=\"56\">56</option>|";
$option .= "<option value=\"57\">57</option>|";
$option .= "<option value=\"58\">58</option>|";
$option .= "<option value=\"59\">59</option>|";
$option .= "<option value=\"60\">60</option>|";
$option .= "<option value=\"61\">61</option>|";
$option .= "<option value=\"62\">62</option>|";
$option .= "<option value=\"63\">63</option>|";
$option .= "<option value=\"64\">64</option>|";
$option .= "<option value=\"65\">65</option>|";
$option .= "<option value=\"66\">66</option>|";
$option .= "<option value=\"67\">67</option>|";
$option .= "<option value=\"68\">68</option>|";
$option .= "<option value=\"69\">69</option>|";
$option .= "<option value=\"70\">70</option>|";
$option .= "<option value=\"71\">71</option>|";
$option .= "<option value=\"72\">72</option>|";
$option .= "<option value=\"73\">73</option>|";
$option .= "<option value=\"74\">74</option>|";
$option .= "<option value=\"75\">75</option>|";
$option .= "<option value=\"76\">76</option>|";
$option .= "<option value=\"77\">77</option>|";
$option .= "<option value=\"78\">78</option>|";
$option .= "<option value=\"79\">79</option>|";
$option .= "<option value=\"80\">80</option>|";
$option .= "<option value=\"81\">81</option>|";
$option .= "<option value=\"82\">82</option>|";
$option .= "<option value=\"83\">83</option>|";
$option .= "<option value=\"84\">84</option>|";
$option .= "<option value=\"85\">85</option>|";
$option .= "<option value=\"86\">86</option>|";
$option .= "<option value=\"87\">87</option>|";
$option .= "<option value=\"88\">88</option>|";
$option .= "<option value=\"89\">89</option>|";
$option .= "<option value=\"90\">90</option>|";
$option .= "<option value=\"91\">91</option>|";
$option .= "<option value=\"92\">92</option>|";
$option .= "<option value=\"93\">93</option>|";
$option .= "<option value=\"94\">94</option>|";
$option .= "<option value=\"95\">95</option>|";
$option .= "<option value=\"96\">96</option>|";
$option .= "<option value=\"97\">97</option>|";
$option .= "<option value=\"98\">98</option>|";
$option .= "<option value=\"99\">99</option>|";
$option .= "</select>";
print $_v->select($option).'<br/>';
print $_v->submit('Elave Et','action=add');
				


}
else
{
$question = htmlspecialchars(mysql_escape_string(trim($_POST['question'])));
$answer = htmlspecialchars(mysql_escape_string(trim($_POST['answer'])));
$mer = intval($_POST['mer']);

$a = htmlspecialchars(mysql_escape_string(trim($_POST['a'])));
$b = htmlspecialchars(mysql_escape_string(trim($_POST['b'])));
$c = htmlspecialchars(mysql_escape_string(trim($_POST['c'])));
$d = htmlspecialchars(mysql_escape_string(trim($_POST['d'])));
$merr = count($mer);
$a = str_replace('$', '$$', $a);
$b = str_replace('$', '$$', $b);
$c = str_replace('$', '$$', $c);
$d = str_replace('$', '$$', $d);
$question = str_replace('$', '$$', $question);

if(empty($question))
{
echo "Sual elave etmediniz!<br/>\n";
break;
}

if(empty($merr))
{
echo "Suali hansi merheleye secdiyinizi bildirmediniz!<br/>\n";
break;
}

if(empty($a))
{
echo "A bendini bosh saxladiniz!<br/>\n";
break;
}
if(empty($b))
{
echo "B bendini bosh saxladiniz!<br/>\n";
break;
}
if(empty($c))
{
echo "C bendini bosh saxladiniz!<br/>\n";
break;
}
if(empty($a))
{
echo "D bendini bosh saxladiniz!<br/>\n";
break;
}
if(empty($answer))
{
echo "Zehmet olmasa duzgun cavabi bildirin!<br/>\n";
break;
}
$q = mysql_query("SELECT `id` FROM `sual` WHERE `sual` = '".$question."';");

if(mysql_num_rows($q) != 0)
{
echo "Bu sual art&#305;q elave olunub.<br/>\n";
break;
}

$azeri = array("&#252;", "&#220;", "&#214;", "&#246;", "&#287;", "&#286;", "&#305;", "&#304;", "&#601;", "&#399;", "&#199;", "&#231;", "&#350;", "&#351;");
$unicode = array("&#252;", "&#220;", "&#214;", "&#246;", "&#287;", "&#286;", "&#;305", "&#304;", "e", "E", "&#199;", "&#231;", "&#350;", "&#351;");

$question = str_replace($azeri, $unicode, $question);
$a = str_replace($azeri, $unicode, $a);
$b = str_replace($azeri, $unicode, $b);
$c = str_replace($azeri, $unicode, $c);
$d = str_replace($azeri, $unicode, $d);

mysql_query("INSERT INTO `sual` VALUES(0, '".$question."', '".$a."', '".$b."', '".$c."', '".$d."', '".$answer."', '".$mer."');");

$q = mysql_query("SELECT COUNT(*) FROM `sual`;");
$questions = mysql_result($q, 0);

echo "Sual elave olundu!<br/>\n";
echo "Bazada: $questions sual var.<br/>\n";
}
}
break;
}

echo "---<br/>";
echo "<a href=\"bilik.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Virtual Bilik Yar&#305;&#351;&#305;</a><br/>";
echo "<a href=\"enter.php?id=$id&amp;ps=$ps&amp;ref=$ref\">Dehliz</a><br/>";
$_v->fsize2($fsize2);
$_v->end('1',$link);

?>
