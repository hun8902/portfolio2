<meta charset="utf-8" /> 
<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('Snoopy.class.php');

$snoopy = new Snoopy;
$snoopy->fetch('https://dhlottery.co.kr/gameResult.do?method=byWin&wiselog=H_C_1_1');

preg_match('/<div class="win_result">(.*?)<\/div>/is', $snoopy->results, $html);
$ex1 = iconv( "euckr","utf8", $html[1]);
$table_remove1 = strip_tags($ex1);
$strTok =explode("\n" , $table_remove1);
$cnt = count($strTok);
for($i = 0 ; $i < $cnt ; $i++){
	//echo($i."번째 배열 ".$strTok[$i] . "<br/>");
};
//날짜 추출
$won_date = str_replace('추첨','',preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $strTok[2]));
echo $won_date;
echo "<br/>";

//회차 추출
$won_result1 =str_replace('회 당첨결과','',$strTok[1]);
echo $won_result1;
echo "<br/>";

echo $won_result1+1;
echo "<br/>";

//번호 추출
$number_arr1 = $strTok[7];
$number_arr2 = $strTok[8];
$number_arr3 = $strTok[9];
$number_arr4 = $strTok[10];
$number_arr5 = $strTok[11];
$number_arr6 = $strTok[12];

echo $number_arr1;
echo "<br/>";
echo $number_arr2;
echo "<br/>";
echo $number_arr3;
echo "<br/>";
echo $number_arr4;
echo "<br/>";
echo $number_arr5;
echo "<br/>";
echo $number_arr6;
echo "<br/>";

//보너스번호
preg_match('/<span class="ball_645 lrg ball5">(.*?)<\/span>/is', $snoopy->results, $bonus);
$bonus_num = $bonus[0];
echo $bonus_num;
echo "<br/>";

preg_match('/<table class="tbl_data tbl_data_col">(.*?)<\/table>/is', $snoopy->results, $rank_dal);
$rank_utf = iconv( "euckr","utf8", $rank_dal[1]);
$strTok1 =explode("<tbody>" , $rank_utf);
$table_remove = strip_tags($strTok1[1]);
$table_result =explode(" " , $table_remove);
$won_result =str_replace('원','',$table_result[58]);

//금액추출
echo $won_result;

//print_r($html[1]);


?>