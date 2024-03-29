<?php
	$root = $_SERVER['DOCUMENT_ROOT'];
	include_once("{$root}/admin/config/db_config.php");	
	include_once("{$root}/admin/config/log.php");

	$http_host = $_SERVER['HTTP_HOST'];
	$request_uri = $_SERVER['REQUEST_URI'];
	$this_url = 'http://' . $http_host . $request_uri;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=640, user-scalable=no" />
	<!-- <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"> -->
	<meta content="telephone=no" name="format-detection">
	<!--if IE meta(http-equiv='X-UA-Compatible', content='IE=edge,chrome=1')-->
	<!--if lt IE 9 script(src='http://html5shiv.googlecode.com/svn/trunk/html5.js')-->
	<title>리드아이엠씨</title>
	<!--css import-->
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- silder -->	
	<link rel="stylesheet" href="css/swiper_layout.css">
	<link rel="stylesheet" href="plugin/swiper/dist/css/swiper.css">
	<!-- animate -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- popup -->
	<link rel="stylesheet" href="css/jquery.modal.css" />	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="plugin/magnific-popup/magnific-popup.css">

</head>
<body>
	<div  class="pc" style="height:99px"></div>
	<header class="pc">
		<div class="container">		
		<div class="logo"><a href="#"><img src="img/logo.png" alt=:"logo"/></a></div>
			<nav id="navigation-menu">
				<ul>
					<li><a href="#section-1">프로모션 진행중</a></li>
					<li><a href="#section-2">리뷰 체험단, 왜 필요한가?</a></li>
					<li><a href="#section-3">쇼핑최적화서비스</a></li>
					<li><a href="#section-4">리드아이엠씨의 장점</a></li>
					<li><a href="#section-5">상담/문의</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container" >
		<div id="right_nav">
			<ul>
				<li><a href="#section-1">프로모션 진행중</a></li>
				<li><a href="#section-2">리뷰 체험단, 왜 필요한가?</a></li>
				<li><a href="#section-3">쇼핑최적화서비스</a></li>
				<li><a href="#section-4">리드아이엠씨의 장점</a></li>
				<li><a href="#section-5">상담/문의</a></li>
			</ul>
		</div>
	</div>

	
	<div id="content">
		<section id="section-1" >
			<div class="container">
				<div class="page1_txt1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page1_txt1.png">
				</div>
				<div class="page1_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page1_img1.png">
				</div>
				<div class="page1_img2 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.2s">
			
					<img src="img/page1_img2.png">
				</div>
				<div class="page1_img3 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page1_img3.png">
				</div>
				<div class="page1_img4 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.2s">

					<img src="img/page1_img4.png">
				</div>

				<div class="page2_txt1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
			
					<img src="img/page2_txt1.png">
				
				</div>
				<ul class="page2_ul">
					<li><div class="page2_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
		
						<img src="img/page2_img1.png">
					</div></li>
					<li><div class="page2_img2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
	
						<img src="img/page2_img2.png">
					</div></li>
				</ul>
				<div class="page2_img3 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s">
		
					<img src="img/page2_img3.png">
				</div>
				<div class="page2_txt2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.2s">
		
					<img src="img/page2_txt2.png">
				</div>
			</div>
		</section>
		<section id="section-2">
			<div class="container">
				<div class="page3_txt1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page3_txt1.png">
				</div>
				<div class="page3_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
				
					<img src="img/page3_img1.png">
				</div>
				<div class="page3_img2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
				
					<img src="img/page3_img2.png">
				</div>
				<div class="page3_img3 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page3_img3.png">
				</div>
				<div class="page4_txt1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page4_txt1.png">
				</div>
				<div class="page4_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
			
					<img src="img/page4_img1.png">
				</div>
				<div class="page4_txt2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
				
					<img src="img/page4_txt2.png">
				</div>
				<div class="page5_txt1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page5_txt1.png">
				</div>
				
				<!-- Slider main container -->
				<div class="swiper-container animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<div class="swiper-slide"><img src="img/rolling_img_01.png"/></div>
						<div class="swiper-slide"><img src="img/rolling_img_02.png"/></div>
						<div class="swiper-slide"><img src="img/rolling_img_03.png"/></div>
						<div class="swiper-slide"><img src="img/rolling_img_04.png"/></div>
						<div class="swiper-slide"><img src="img/rolling_img_05.png"/></div>
						<div class="swiper-slide"><img src="img/rolling_img_06.png"/></div>
					</div>
					<!-- If we need pagination -->
					<div class="swiper-pagination"></div>

					

				</div>
				<!-- Slider main container -->
				<div class="swiper-btn animate"  data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					<!-- If we need navigation buttons -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>

				<div class="page5_txt2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page5_txt2.png">
				</div>
					<div class="page5_img3 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
		
					<img src="img/page5_img3.png">
				</div>
				<div class="page5_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					
					<img src="img/page5_img1.png">
				</div>
				<div class="page5_img2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
				
					<img src="img/page5_img2.png">
				</div>
			


			</div>
		</section>
		<section id="section-3">
			<div class="container">
				<div class="page6_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page6_img1.png">
				</div>
				<div class="page6_img2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page6_img2.png">
				</div>
				<div class="page6_img3 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page6_img3.png">
				</div>
				<div class="page6_img4 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page6_img4.png">
				</div>
			</div>
		</section>
		<section id="section-4">
			<div class="container">
				<div class="page7_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
		
					<img src="img/page7_img1.png">
				</div>
				<div class="page7_img2 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page7_img2.png">
				</div>
				<div class="page7_img3 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page7_img3.png">
				</div>
				<div class="page7_img4 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page7_img4.png">
				</div>
				<div class="page7_img5 animate" data-animate="fadeInDown" data-duration="1s" data-delay="0.1s">

					<img src="img/page7_img5.png">
				</div>
				<div class="page7_img6 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

					<img src="img/page7_img6.png">
				</div>
				<ul class="page7_ul">
					<li><div class="page7_img7 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

						<img src="img/page7_img7.png">
					
					</div></li>
					<li><div class="page7_img8 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">

						<img src="img/page7_img8.png">
					</div></li>
					<li><div class="page7_img9 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
	
						<img src="img/page7_img9.png">
					</div></li>
				</ul>
			</div>
		</section>
		<section id="section-5">
			<div class="container">
				<div class="page8_img1 animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
						<img src="img/page8_img1.png">
				</div>

				<form name="sentMessage" method="post"  action="process.php"  class="landing_form" novalidate="">
				<input name="has_data" type="hidden" value="1">
				<input name="landing" type="hidden" value="001">
				<input name="this_url" type="hidden" value="<?php echo $this_url ?>">
				<input name="requset_url" type="hidden" value="<?php echo $_SERVER['QUERY_STRING'] ?>">
				<div class="db_form" >
						<table class="input_form animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s" >
						<tr>
							<th>이름</th>
							<td><input type="text" id="representative"  name="representative"  value="" class="inputform" placeholder="이름을 입력해주세요" data-message="이름을 입력해주세요"/></td>
							
						</tr>
						<tr>
							<th>연락처</th>
							<td><input type="text" name="phone"  value="" class="phone_check inputform" placeholder="숫자만 입력해주세요"data-message="연락처를 입력해주세요" /></td>
						</tr>
							<tr>
							<td  colspan="2" class="agree_p">
								<div class="form_agree">
									<div class="chkB"><input type="checkbox" id="agree_mo1" checked="" class="agree form-control form" data-message="개인정보이용약관에 동의 해주세요"><label for="agree_mo1">개인정보이용약관 동의</label><span class="popup_view1"> [보기]</span></div>
								</div>
								<div class="form_agree">
									<div class="chkB"><input type="checkbox" id="agree_mo2" checked="" class="agree form-control form" data-message="마켓팅정보활용약관에 동의 해주세요"><label for="agree_mo2">마켓팅정보활용약관 동의</label><span class="popup_view2"> [보기]</span></div>
								</div>
								<!-- 개인정보이용약관 동의 팝업 --->
								<div class="popup_ag1 agp" >
									<div href="" class="agpopup_close"><img src="img/ag_close.png" alt="닫기"></div>
									<textarea class="long_text" style="width:100%">리드아이엠씨은 개인정보보호법 제15조 법규에 의거하여 회원님의 개인정보 수집 및 활용에 동의합니다.

개인정보 제공자가 동의한 내용 외의 다른 목적으로 활용하지 않습니다.

[개인정보 수집 항목]
- 성명, 전화번호

[개인정보 이용목적]
- 리드아이엠씨의 이용에 따른 본인 확인 절차에 이용
- 방문 고객 분석자료 작성에 이용

개인정보보호법 제15조 법규에 의거하여
상기 본인은 위와 같이 개인정보 수집 및 활용에 동의함.

									 </textarea>
								</div>
								<!-- 마켓팅활용 수신 동의 팝업 --->
								<div class="popup_ag2 agp" >
									<div href="" class="agpopup_close"><img src="img/ag_close.png" alt="닫기"></div>
									<textarea class="long_text" style="width:100%">리드아이엠씨은(는) SMS(문자메시지), 이메일, 우편을 통하여 헬스/건강 관련 정보(뉴스레터/카탈로그 포함), 향후 진행될 프로모션 및 이벤트 정보(각종 할인이벤트 포함) 등의 전달과 통계 분석과 만족도 조사 및 각종 홍보 등 마케팅 목적으로 귀하의 성명, 전화번호, 휴대전화번호, 전자우편주소, 집주소를 수집 이용합니다.
수집된 개인정보는 법령에 따라 보존하여야 하는 경우가 아닌 한, 신청일로부터 1년 동안 귀하의 개인정보를 처리하고자 합니다. 귀하는 위와 같은 개인정보 수집 및 이용에 동의하지 않을 수 있으나, 이 경우 회사의 제품 안내 등 유용한 정보 전달이 제한될 수 있습니다.
        
        
									 </textarea>
								</div>

							</td>
							
						</tr>
						<tr>
							
							<td  colspan="2" class="pay_td pay_search"><input type="image" src="img/submit.png" class=""></td>
						</tr>
					</table>
					</div>

					


				</div>
				<ul class="form_bottom animate"  data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
						<li>
							<div class="fb_title">문의전화</div>
							<div class="fb_phone">010-8674-7823</div>
						</li>
						<li>
							<div class="fb_title">카톡 ID</div>
							<div class="fb_phone">remomo7823</div>
						</li>
						<li>
							<div class="fb_title">카카오 채널</div>
							<div class="fb_phone"><a href="http://pf.kakao.com/_xbaSMK" target="_blank">바로가기</a></div>
						</li> 
					</ul>
			</div>


		
		</section>


		<div id="footer">
			<div class="container">
				<div class="foot_logo animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s"><a href="/"><img src="img/foot_logo.png" alt="" /></a></div>
				<div class="copyright pc animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					Re:adimc ㅣ CEO Dong Sik Shinㅣ9th,72, Yanghwa-ro, Mapo-gu, Seoul, Republic of Korea<br/>ㅣ business LIsence : 496-12-01412 ㅣ P.H: 02-6956-6095
					<p>© Readimc. All RIGHTS RESERVED </p>

				</div>
				<div class="copyright mobile animate" data-animate="fadeInUp" data-duration="1s" data-delay="0.1s">
					Re:adimc ㅣ CEO Dong Sik Shin<br/>9th,72, Yanghwa-ro, Mapo-gu, Seoul, Republic of Korea<br/>ㅣ business LIsence : 496-12-01412 ㅣ P.H: 02-6956-6095

					<p>© Readimc. All RIGHTS RESERVED </p>

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
<script src="https://unpkg.com/webp-hero@0.0.0-dev.21/dist-cjs/polyfills.js"></script>
<script src="https://unpkg.com/webp-hero@0.0.0-dev.21/dist-cjs/webp-hero.bundle.js"></script>
<script>
 var webpMachine = new webpHero.WebpMachine();
 webpMachine.polyfillDocument();
</script>
<!-- scroll -->
<script src="plugin/scrolla/scrolla.jquery.min.js"></script>
<!-- silder -->
<script src="plugin/swiper/dist/js/swiper.ani.js"></script>
<script src="plugin/swiper/dist/js/swiper.min.js"></script>
<!-- Magnific Popup core JS file -->
<script src="plugin/magnific-popup/jquery.magnific-popup.js"></script>
<!-- Page Scroll to id plugin -->
<script src="js/jquery.malihu.PageScroll2id.js"></script>
<script src="js/main_resize.js"></script>
<script>
	(function($){
		$(window).on("load",function(){
			
			/* Page Scroll to id fn call */
			$("#navigation-menu a,right_nav a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
				highlightSelector:"#navigation-menu a"
			});
			$("#right_nav a").mPageScroll2id({
				highlightSelector:"#right_nav a"
			});
			
			/* demo functions */
			$("a[rel='next']").click(function(e){
				e.preventDefault();
				var to=$(this).parent().parent("section").next().attr("id");
				$.mPageScroll2id("scrollTo",to);
			});
			
		});
	})(jQuery);
</script>


<script>
$(window).load(function(){
	var reg = /^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/; // "|"를 사용
	 // 정규식 : 이름
	 function chkName(str)
	 {
	  var reg_name = /^[가-힣]{2,4}$/;

	  if(!reg_name.test(str))
	  {
	   return false;
	  }
	  return true;
	 }


	$('[class*=landing_form]').submit(function(){
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
		
		if(!chkName($('#representative').val()))
		  {
		   alert('이름을 확인하세요.(한글 2~4자 이내)');
		   $('#representative').focus();
		   return false;
		  }
		
		if (!validateForm($(this))){
			return false;
		}

		var list = new Array();
		$(this).find("[name='phone']").each(function(index, item){
			list.push($(item).val());
		});

		var num = list.join();
		num = num.replace(/[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi,'');
		console.log(num);
		if(num.substring(0,2) == "02"){
			if(num.length < 9){
				alert('전화번호가 올바르지 않습니다.');
				return false;
			}
		} else {
			if(num.length < 11){
				alert('전화번호가 올바르지 않습니다.');
				return false;
			}
		}
		
	
		return true;
	});
	
	

	function validateForm($formSelector){
		if(typeof($formSelector)=='string'){
			var $childForms = $($formSelector+' .form');
		} else {
			var $childForms =$formSelector.find('.form');
		}
		var result = true;
		$childForms.each(function(){
			var type = $(this).data('type');
			var essential = $(this).data('essential');
			var message = $(this).data('message');
			var value = $.trim($(this).val());
			switch(type){
				default : 
					if(value==''){
						result = false;
						alert(message);
						$(this).focus();
						return false;
					}
					break;
				
				case 'id' :
					if(value==''){
						result = false;
						alert('아이디를 입력해주세요.');
						$(this).focus();
						return false;
					}
					var regex=  /^[a-z0-9_]{5,15}$/;

					if(regex.test(value) === false) { 
				
						result = false;
						alert("아이디는 소문자로 시작하는  5~15자 소문자, 숫자의 조합이어야 합니다.");
						$(this).focus();
						return false;  
					} 
					break;

				case 'number' :
					if(value==''){
						result = false;
						alert(message);
						$(this).focus();
						return false;
					}
					var regex=  /^[0-9]+$/;
					if(regex.test(value) === false) { 
				
						result = false;
						alert("숫자만 입력 가능합니다.");
						$(this).focus();
						return false;  
					} 
					break;
				case 'exception' :
					var exception = $(this).data('exception');
					var check = validation[exception](value);
					if(!check['result']){
						alert(check['message']);
						result = false;
					}
					break;
			}
		});

		return result;
	}

	$('[type="submit"]').each(function(){
		$(this).prop('disabled', false);
	});

	$('.fixedbar').removeClass('hidden');

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