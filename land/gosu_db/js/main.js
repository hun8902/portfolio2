$(document).ready(function() {
	$( window ).resize(function() {
	var width=window.innerWidth;
	if (width <= 1280){
		$('.left_bg img').attr('src','images/m/page1/left_bg.png');
	}else{
		$('.left_bg img').attr('src','images/page1/left_bg.png');
	}
	}).resize();

	jQuery(function ($) {
		$('#myFlipper').flipper('init');
	});

	  $('.popup_view1').click(function(){
		$('.popup_ag2').fadeOut();
		$('.popup_ag1').fadeIn();
	  });

	    $('.popup_view2').click(function(){
		$('.popup_ag1').fadeOut();
		$('.popup_ag2').fadeIn();
	  });

	  $('.agpopup_close').click(function(){
		$('.agp').fadeOut();
	  });

	// 기존 css에서 플로팅 배너 위치(top)값을 가져와 저장한다.
	var floatPosition = parseInt($(".left_quick").css('top'));
	// 250px 이런식으로 가져오므로 여기서 숫자만 가져온다. parseInt( 값 );

	$(".submit_button").submit();

	$(window).scroll(function() {
		// 현재 스크롤 위치를 가져온다.
		var scrollTop = $(window).scrollTop();
		var newPosition = scrollTop + floatPosition + "px";
	


		$(".left_quick").stop().animate({
			"top" : newPosition
		}, 500);

	}).scroll();



});






$(window).load(function(){
	

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

		alert("신청이 완료되었습니다.");
	
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