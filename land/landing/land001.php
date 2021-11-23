<?php include "./land_top.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=640, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gosu Global Trading</title>
<?php include "./ad_code.php"; ?>
</head>
<link rel="shortcut icon" href="<?php echo $theme_select ?>/images/favi.ico">
<meta property="og:image" content="<?php echo $theme_select ?>/images/meta_thum.png" />

<link href="<?php echo $theme_select ?>/css/default.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $theme_select ?>/css/jquery-ui.min.css">
 <link rel="stylesheet" href="<?php echo $theme_select ?>/plugin/style.css">
<script src="<?php echo $theme_select ?>/js/default.js"></script>
<script src="<?php echo $theme_select ?>/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo $theme_select ?>/js/jquery-ui.js"></script>
<script src="<?php echo $theme_select ?>/js/jquery.bpopup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


<body>
<canvas id=c ></canvas>
<script  src="<?php echo $theme_select ?>/plugin/script.js"></script>

<div class="container">
	<!-- 공통 레이아웃 탑 -->
	<ul class="logo" style="display:;">
		<li class="li_1"><span class="t_l"></span></li>
		<li class="li_2"><span class="t_r"></span></li>
	</ul>
	<div class="top_main"  style="display:;"></div>
	<!-- 공통 레이아웃 탑 끝 -->
	


	<!-- 씬1 -->
	<div id="scene1" class="scene1" style="display:;">
		<input type="hidden" value="" id="click_chk">
		<div class="text_img"><span>&nbsp;</span></div>		
		<div class="btn"><img src="<?php echo $theme_select ?>/images/scene1_btn.png" class="btn_img" onclick="first_scene();"></div>
	</div>

		
	<!-- 씬2 -->
	<div id="scene2" class="scene2" style="display:none;">
		<div><img src="<?php echo $theme_select ?>/images/scene2_text.png" class="text_img"></div>
		<div class="btn"><img src="<?php echo $theme_select ?>/images/loading_bar.png"></div>
		<div class="text" id="scene2_text">&nbsp;</div>
	</div>
	
	<!-- 씬3 -->
	<div id="scene3" class="scene3" style="display:none;">
		<div class="text_img"><img src="<?php echo $theme_select ?>/images/scene3_text.png"></div>
		<span>Tas market profile 빅데이터 분석중</span>
		<div class="bar" id="progressbar1" data-value="1"></div>
		<span>The Edge 빅데이터 분석중</span>
		<div class="bar" id="progressbar2" data-value="2"></div>
		<span>The scanner 빅데이터 분석중</span>
		<div class="bar" id="progressbar3" data-value="3"></div>
		<div class="text" id="scene3_text"></div>
	</div>

	<!-- 씬4 -->
	<div id="scene4" class="scene4" style="display:none;">
		<span class="text1">진입/청산 데이터 추출 완료</span>
		<span class="text2">TAS 프로그램 분석 완료</span>
		<span class="text3">Analyzing completed!</span>
	</div>
	
	<!-- 씬5 -->
	<form name="sentMessage" method="post"  action="process.php"  class="landing_form" novalidate="">
	<div id="scene5" class="scene5" style="display:none;">
		<input name="has_data" type="hidden" value="1">
		<input name="landing" type="hidden" value="land001">		
		<input name="ad_code" type="hidden" value="<?php echo $_GET["section"]?>">
		<input name="this_url" type="hidden" value="<?php echo $this_url ?>">
		<input name="requset_url" type="hidden" value="<?php echo $_SERVER['QUERY_STRING'] ?>">
		<ul>
			<li><input type="text"  name="representative" class="input_css input-control form" placeholder="이름을 입력해주세요" data-message="이름을 입력해주세요"></li>
			<li><input type="number"  pattern="[0-9]*" inputmode="numeric" min="0" name="phone[]" class="input_css phone_check "  placeholder="전화번호를 입력해주세요(숫자만)" data-message="연락처를 입력해주세요"></li>			
		</ul>
		<div>
			<label class="check_label title">아래 전체약관에 동의합니다.
				<input type="checkbox" id="agree_all" onclick="javascript:all_chk(this);" checked=""/>
				<span class="checkmark" ></span>
			</label>
			<label class="check_label sub_title">개인정보 수집 및 활용동의(필수) <a href="javascript:agree_box('agree_layer','<?php echo $theme_select ?>/agree1.html');">[내용보기]</a>
				<input type="checkbox" id="agree1" checked="" />
				<span class="checkmark"></span>
			</label>
			<label class="check_label sub_title">개인정보 제3자 제공동의(필수) <a href="javascript:agree_box('agree_layer','<?php echo $theme_select ?>/agree2.html');">[내용보기]</a>
				<input type="checkbox" id="agree2" checked=""/>
				<span class="checkmark"></span>
			</label>
			<label class="check_label sub_title">광고성 문자메세지 수신동의
				<input type="checkbox" id="agree3" checked=""/>
				<span class="checkmark"></span>
			</label>
		</div>
		<div class="btn">
			<input  TYPE="image" src="<?php echo $theme_select ?>/images/scene5_btn.gif" >
			<!-- <img src="<?php echo $theme_select ?>/images/scene5_btn.gif" class="btn_img"> -->
		</div>
		


	</div>
	</form>
</div>





<div class="f_container">	
	<div class="company_logo">
		<span><img src="<?php echo $theme_select ?>/images/cl_1.png"></span>
		<span><img src="<?php echo $theme_select ?>/images/cl_2.png"></span>
		<span><img src="<?php echo $theme_select ?>/images/cl_3.png"></span>
		<span><img src="<?php echo $theme_select ?>/images/cl_4.png"></span>
	</div>
	<div class="foot_box">
		<div class="foot_text">
			<ul>
				<li class="li_1"><img src="<?php echo $theme_select ?>/images/foot_logo.png"></li>
				<li class="li_2">
					대표자 한평근  ㅣ 주소 서울특별시 마포구 월드컵 북로 15, 601호 (아도디아 빌딩)  ㅣ 대표전화 1899-5877<br>
					이메일 ggtkorea-2020@naver.comㅣ FAX 02-332-3210ㅣ사업자 등록번호 410-87-10759<br>
					통신판매업신고번호 제2021-서울마포-0534호
				</li>
			</ul>
		</div>
	</div>
</div>

<div id="agree_layer">
	<span class="title" id="agree_title"></span>
	<span class="close_btn" onclick="agree_box_close('agree_layer');">X</span>
	<iframe id="agree_frame" src="" frameborder="0" style="width:100%;height:400px;"></iframe>
</div>
</body>
<style>
 html,body{ border: 0; padding: 0; margin: 0; background: #000; }
.info{ z-index:999; position : absolute; left:0; top:0; padding:10px; color:#fff; background: rgba(0,0,0,0.5); text-transform:capitalize; }
</style>

<script>
window.onload = function(){
	setTimeout("first_scene()",1500);
}
</script>

<script>
$(window).load(function(){
	$('[class*=landing_form]').submit(function(){
		if(!$(this).find('input#agree1').prop('checked')){
			var message = $(this).find('input#agree1').data('message');
			alert(message);
			return false;
		}

		if(!$(this).find('input#agree2').prop('checked')){
			var message = $(this).find('input#agree2').data('message');
			alert(message);
			return false;
		}
		
		if (!validateForm($(this))){
			return false;
		}

		var list = new Array();
		$(this).find("[name='phone[]']").each(function(index, item){
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
	$('[class*="phone_check_no"]').keyup(function() {
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
</html>
