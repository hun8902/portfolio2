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

//회차 추출
$won_result1 =str_replace('회 당첨결과','',$strTok[1]);


//번호 추출
$number_arr1 = $strTok[7];
$number_arr2 = $strTok[8];
$number_arr3 = $strTok[9];
$number_arr4 = $strTok[10];
$number_arr5 = $strTok[11];
$number_arr6 = $strTok[12];


preg_match('/<div class="win_result">(.*?)<\/div>/is', $snoopy->results, $html2);
$ex12 = iconv( "euckr","utf8", $html2[1]);
$table_result12 =explode(" " , $ex12);
$str_tag =explode("\"" , $ex12);

$str_tag_arr1 =  $str_tag[7];
$str_tag_arr2 =  $str_tag[9];
$str_tag_arr3 =  $str_tag[11];
$str_tag_arr4 =  $str_tag[13];
$str_tag_arr5 =  $str_tag[15];
$str_tag_arr6 =  $str_tag[17];

//보너스번호
preg_match('/<span class="ball_645 lrg ball5">(.*?)<\/span>/is', $snoopy->results, $bonus);
$bonus_num = $bonus[0];
$str_tag_arr7 =explode("\"" , $bonus[1]);


preg_match('/<table class="tbl_data tbl_data_col">(.*?)<\/table>/is', $snoopy->results, $rank_dal);
$rank_utf = iconv( "euckr","utf8", $rank_dal[1]);
$strTok1 =explode("<tbody>" , $rank_utf);
$table_remove = strip_tags($strTok1[1]);
$table_result =explode(" " , $table_remove);
$won_result =str_replace('원','',$table_result[58]);


//print_r($html[1]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=640, user-scalable=no" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta content="telephone=no" name="format-detection">
	<!--if IE meta(http-equiv='X-UA-Compatible', content='IE=edge,chrome=1')-->
	<!--if lt IE 9 script(src='http://html5shiv.googlecode.com/svn/trunk/html5.js')-->
	<title>크라운로또</title>
	<!--css import-->
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- silder -->	
	<!-- <link rel="stylesheet" href="css/swiper_layout.css"> -->
	<link rel="stylesheet" href="plugin/swiper/dist/css/swiper.css">
	<!-- animate -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- popup -->
	<link rel="stylesheet" href="css/jquery.modal.css" />	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="plugin/magnific-popup/magnific-popup.css">

	<style>
	
	</style>
</head>
<body>
	<div id="warp" >

		<div id="page1">
			<div class="container">
				<div class="page1_0 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s"><img src="img/logo.png" /></div>
				<div class="page1_1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page1_1.png" /></div>


				<div class="db_box animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.4s">
					<form name="sentMessage" method="post"  action="http://royallotto.kr/ajax/main_ajax.php"  class="landing_form" novalidate="">
					<input name="act" type="hidden" value="api">
					<input name="date" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">
					<input name="ip" type="hidden" value="<?php echo  $_SERVER["REMOTE_ADDR"];?>">
					<input name="pram1" type="hidden" value="">
					<input name="pram2" type="hidden" value="">
						<table class="input_form animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" >
							<tr>
								<th class="name"><img src="img/icon_1.png" /></th>
								<td class="input_size pd_5"><input type="text" id="representative"  name="name"  value="" class="inputform" placeholder="이름을 입력해주세요" data-message="이름을 입력해주세요"/></td>							
								<td  rowspan="2"><div class="table_btn"><input type="image" src="img/bt.png" class=""></div></td>
							</tr>
							<tr>
								<th class="name"><img src="img/icon_2.png" /></th>
								<td  class="input_size"><input type="text" name="hp" id="hp"  value="" class="phone_check inputform" placeholder="연락처를 입력해주세요(숫자만) "data-message="연락처를 입력해주세요"  pattern="[0-9]*" inputmode="numeric" /></td>
							</tr>
								<tr>
								<td>
								<td  colspan="2" class="agree_p">
									<div class="agree_div">
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo1" checked="" class="agree form-control form" data-message="개인정보이용약관에 동의 해주세요"><label for="agree_mo1">개인정보 처리방침 동의(필수)</label></div>
										</div>
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo2" checked="" class="agree form-control form" data-message="마켓팅정보활용약관에 동의 해주세요"><label for="agree_mo2">마켓팅활용 정보 동의(필수)</label></div>
										</div>
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo3" checked="" class="agree form-control form" data-message="문자메세지 수신을 동의 해주세요"><label for="agree_mo3">문자 수신동의(필수)</label></div>
										</div>
									</div>

								</td>								
							</tr>
						</table>
					</form>
				</div>

				<div class="page2_1  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page2_1.png" /></div>
				<div class="page2_2  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.3s"><img src="img/page2_2.png" /></div>
				
			</div>
		</div>

		<div id="page2">
			<div class="container">
				<div class="page3_1  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page3_1.png" /></div>
				<table class="page_table animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s">
					<thead>
						<tr>
							<th class="cel1">내용</th>
							<th class="cel2">이름</th>
							<th class="cel3">날짜</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cel1">로또 사이트란 사이트 다 돌아다녔는데 여기가 진짜네요!</td>
							<td class="cel2">한*정</td>
							<td class="cel3">11.18</td>
						</tr>
						<tr>
							<td class="cel1"><span>[2등 후기]</span> 2등도 너무 만족하는데..사람욕심이 끝도없네요..1등됬었으면 아…</td>
							<td class="cel2">문*희</td>
							<td class="cel3">11.16</td>
						</tr>
						<tr>
							<td class="cel1">저는 3등만 이렇게 되도 만족합니다.. 가입비 그냥 퉁치고  매주 꽁번호 받는느낌! </td>
							<td class="cel2">강*찬</td>
							<td class="cel3">11.15</td>
						</tr>
						<tr>
							<td class="cel1">매주 아깝게 1,, 2등은 놓치지만 꾸준히 3~4등 번갈아가며..로테크가 따로없네요 ㅎㅎ </td>
							<td class="cel2">조*석</td>
							<td class="cel3">11.14</td>
						</tr>
						<tr>
							<td class="cel1"><span>[3등 후기]</span> ㅠㅠ너무아까워요.. 진짜.. 하나만 더맞으면 아 너무 아쉽네요.//</td>
							<td class="cel2">김*진</td>
							<td class="cel3">11.14</td>
						</tr>
						<tr>
							<td class="cel1">매주 로또만 기다리게  되네요 이때까지 자동을 왜했을까요?  그냥..후회합니다</td>
							<td class="cel2">고*배</td>
							<td class="cel3">10.30</td>
						</tr>
						<tr>
							<td class="cel1">하… 진심으로 진짜 최고에요ㅠㅠ 매주 기대 됩니다.</td>
							<td class="cel2">한*철</td>
							<td class="cel3">10.28</td>
						</tr>
					</tbody>

				</table>
			</div>
		</div>

		<div id="page3">
			<div class="container">
				<div class="page4_1  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page4_1.png" /></div>
				<div class="page4_2  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><span class="t1"><?php echo $won_result1; ?></span>회차 당첨번호 <span class="t2"><?php echo $won_date; ?></span></div>
				<div class="nums">
					<div class="num win animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s">
						<p>
							<span class="<?php echo $str_tag_arr1; ?>"><?php echo $number_arr1; ?></span>
							<span class="<?php echo $str_tag_arr2; ?>"><?php echo $number_arr2; ?></span>
							<span class="<?php echo $str_tag_arr3; ?>"><?php echo $number_arr3; ?></span>
							<span class="<?php echo $str_tag_arr4; ?>"><?php echo $number_arr4; ?></span>
							<span class="<?php echo $str_tag_arr5; ?>"><?php echo $number_arr5; ?></span>
							<span class="<?php echo $str_tag_arr6; ?>"><?php echo $number_arr6; ?></span>
							<span class="ball_645 "><img src="img/icon_plus.png" /></span>
							<span class="<?php echo $str_tag_arr7; ?>"><?php echo $bonus_num; ?></span>
						</p>
					</div>
				</div>
				<div class="page4_3  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s">1등 당첨금액 <span class="t1"><?php echo $won_result; ?></span></div>
			</div>
		</div>


		<div id="page4">
			<div class="container">
				<div class="page5_0  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><?php echo $won_result1+1; ?><span class="t1"> 회차</span></div>
				<div class="page5_1  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page5_1.png" /></div>
				<div class="db_box1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.4s">
					<form name="sentMessage" method="post"  action="http://royallotto.kr/ajax/main_ajax.php"  class="landing_form1" novalidate="">
					<input name="act" type="hidden" value="api">
					<input name="name" type="hidden" value="이름없음">
					<input name="date" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">
					<input name="ip" type="hidden" value="<?php echo  $_SERVER["REMOTE_ADDR"];?>">
					<input name="pram1" type="hidden" value="">
					<input name="pram2" type="hidden" value="">
						<table class="input_form animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" >
							<tr>
								<th class="name"><img src="img/icon_2.png" /></th>
								<td class="input_size "><input type="text" name="hp" id="hp1"  value="" class="phone_check inputform1" placeholder="연락처를 입력해주세요(숫자만) "data-message="연락처를 입력해주세요"  pattern="[0-9]*" inputmode="numeric"  /></td>							
								<td><div class="table_btn1"><input type="image" src="img/bg2.png" class=""></div></td>
							</tr>
							<tr>
								<td>
								<td  colspan="2" class="agree_p">
									<div class="agree_div1">
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo4" checked="" class="agree form-control form" data-message="개인정보이용약관에 동의 해주세요"><label for="agree_mo4">개인정보 처리방침 동의(필수)</label></div>
										</div>
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo5" checked="" class="agree form-control form" data-message="마켓팅정보활용약관에 동의 해주세요"><label for="agree_mo5">마켓팅활용 정보 동의(필수)</label></div>
										</div>
										<div class="form_agree">
											<div class="chkB"><input type="checkbox" id="agree_mo6" checked="" class="agree form-control form" data-message="문자메세지 수신을 동의 해주세요"><label for="agree_mo6">문자 수신동의(필수)</label></div>
										</div>
									</div>

								</td>								
							</tr>
						</table>
					</form>
				</div>
				<div class="page5_2  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page5_2.png" /></div>
				<div class="page5_3  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page5_3.png" /></div>
				<div class="page5_4  animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s"><img src="img/page5_4.png" /></div>




			</div>
		</div>





		<div id="footer">
			<div class="container">
				<div class="company_info pc animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					당사의 분석시스템은 누적패턴을 분석/필터링한 정보제공만을 목적으로 하며, 당첨확률 개선서비스가 아니므로 서비스 이<br/> 과정에서 기대이익을 얻지 못하거나 발생한 손해 등에 대한 최종책임은 서비스 이용자 본인에게 있습니다.
				</div>
				<div class="company_info mobile animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					당사의 분석시스템은 누적패턴을 분석/필터링한 정보제공만을 목적으로 하며,<br/> 
					당첨확률 개선서비스가 아니므로 서비스 이 과정에서 기대이익을 얻지 못하거나<br/> 
					발생한 손해 등에 대한 최종책임은 서비스 이용자 본인에게 있습니다.
				</div>
				<div class="copryright pc animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					상호 : 크라운 컴퍼니 | 이메일 : gnsfhr3502@naver.com | 대표이사 : 최시현<br/> 사업자 등록번호 : 298-65-00310 ㅣ 통신판매업 신고번호 : 제 2019-인천남동구-1140 호<br/> 주소 : 대구광역시 달서구 와룡로267, 2층(죽전동) | 고객센터 : 1544-2145 | 팩스 : 070-7545-6486
				</div>
				<div class="copryright mobile animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					상호 : 크라운 컴퍼니 | 이메일 : gnsfhr3502@naver.com | 대표이사 : 최시현<br/> 
					사업자 등록번호 : 298-65-00310 ㅣ 통신판매업 신고번호 : 제 2019-인천남동구-1140 호<br/> 
					주소 : 대구광역시 달서구 와룡로267, 2층(죽전동) | 고객센터 : 1544-2145 | 팩스 : 070-7545-6486
				</div>
			</div>
		</div>


	</div>
 </body> 
</html>

<!-- js import -->
<script src="js/jquery.min.js"></script>
<!-- animation -->
<script src="js/scrolla.jquery.min.js"></script>
<!-- scroll -->
<script src="plugin/scrolla/scrolla.jquery.min.js"></script>
<!-- silder -->
<script src="plugin/swiper/dist/js/swiper.ani.js"></script>
<script src="plugin/swiper/dist/js/swiper.min.js"></script>
<!-- Magnific Popup core JS file -->
<script src="plugin/magnific-popup/jquery.magnific-popup.js"></script>


<script src="js/main.js"></script>



<script>
$(window).load(function(){
	var reg = /^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/; // "|"를 사용
	 // 정규식 : 이름
	 function chkName(str)
	 {
	  var reg_name = /^[가-힣]{2,4}$/;
	  if(!reg_name.test(str)){
		  return false;
		}
	  return true;
	 };

	 function phoneCheck(type) {
		 var phoneNumber = type; 
		 var regExp = /(01[0|1|6|9|7])[-](\d{3}|\d{4})[-](\d{4}$)/g; 
		 var result = regExp.exec(phoneNumber); 
		 if(result) return true;
		 else  return false; 
	}


	$('.landing_form').submit(function(){
		if(!$(this).find('input#agree_mo1').prop('checked')){
			var message = $(this).find('input#agree_mo1').data('message');
			alert(message);
			return false;
		}

		if(!$(this).find('input#agree_mo2').prop('checked')){
			var message = $(this).find('input#agree_mo2').data('message');
			alert(message);
			return false;
		}

		if(!$(this).find('input#agree_mo3').prop('checked')){
			var message = $(this).find('input#agree_mo3').data('message');
			alert(message);
			return false;
		}
		
		if(!chkName($('#representative').val()))
		  {
		   alert('이름을 확인하세요.(한글 2~4자 이내)');
		   $('#representative').focus();
		   return false;
		  }

		if(!phoneCheck($('#hp').val()))
		{
		   alert('핸드폰 번호를 확인해주세요');
		   $('#hp').focus();
		   return false;
		}
	
		return true;
	});

	$('.landing_form1').submit(function(){
		if(!$(this).find('input#agree_mo1').prop('checked')){
			var message = $(this).find('input#agree_mo4').data('message');
			alert(message);
			return false;
		}

		if(!$(this).find('input#agree_mo2').prop('checked')){
			var message = $(this).find('input#agree_mo5').data('message');
			alert(message);
			return false;
		}

		if(!$(this).find('input#agree_mo3').prop('checked')){
			var message = $(this).find('input#agree_mo6').data('message');
			alert(message);
			return false;
		}
		

		if(!phoneCheck($('#hp1').val()))
		{
		   alert('핸드폰 번호를 확인해주세요');
		   $('#hp1').focus();
		   return false;
		}
	
		return true;
	});
	
	

})
/* 자동으로 하이픈 넣기 */
$(function () {
	$('[class*="phone_check"]').keyup(function() {
		var phone = '';
		var seoul = 0;
		var string = $(this).val();
		var regex =  /^[0-9\-]+$/;
		
		if(string){
			if(!regex.test(string)){
				alert('숫자만 입력 할 수 있습니다.');
				$(this).val('');
				return false;
			}
		}
		
		var value = string.replace(/[^0-9]/g, '');
		
		/* 서울 앞자리가 02 일때 */
		if(value.substring(0,2) == '02'){
			seoul = 1;
		}
		
		/* 서울번호일때 글자크기 제한 다르게 설정 */
		if(seoul == 0){
			$(this).attr({'maxlength':'13'});
		} else if(seoul == 1){
			$(this).attr({'maxlength':'11'});
		}
		
		/* 자동으로 하이픈 삽입하기 */
		if(value.length > (3-seoul) && value.length <= 7){
			phone += value.substr(0, (3-seoul));
			phone += "-";
			phone += value.substr(3-seoul);
			$(this).val(phone);
		} else if(value.length > (7-seoul)){
			phone += value.substr(0, (3-seoul));
			phone += "-";
			phone += value.substr(3-seoul, 4-seoul);
			phone += "-";
			phone += value.substr(7-seoul-seoul);
			$(this).val(phone);
		}
	});
});
</script>
