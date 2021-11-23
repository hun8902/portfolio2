$(document).ready(function(){

	$('.main_slide1_ul').bxSlider({
		nextSelector: '#g1_next',
		prevSelector: '#g1_prev',
		nextText: '<img src="img/bx_slider_next.png" alt=""/>',
		prevText: '<img src="img/bx_slider_perv.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 25,
		infiniteLoop: true,
		slideWidth: 414,
		pager: true,
		minSlides: 3,
		maxSlides: 3,
		speed: 800,
		auto: true,
	});

	$('.main_slide2_ul').bxSlider({
		nextSelector: '#g2_next',
		prevSelector: '#g2_prev',
		nextText: '<img src="img/bx_slider_next.png" alt=""/>',
		prevText: '<img src="img/bx_slider_perv.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 25,
		infiniteLoop: true,
		slideWidth: 414,
		pager: true,
		minSlides: 3,
		maxSlides: 3,
		speed: 800,
		auto: true,
	});

	$('.main_slide3_ul').bxSlider({
		nextSelector: '#g3_next',
		prevSelector: '#g3_prev',
		nextText: '<img src="img/bx_slider_next.png" alt=""/>',
		prevText: '<img src="img/bx_slider_perv.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 25,
		infiniteLoop: true,
		slideWidth: 408,
		pager: true,
		minSlides: 3,
		maxSlides: 3,
		speed: 800,
		auto: true,
	});

	$('.main_slide4_ul').bxSlider({
		nextSelector: '#g4_next',
		prevSelector: '#g4_prev',
		nextText: '<img src="img/footer_banner_next.png" alt=""/>',
		prevText: '<img src="img/footer_banner_prev.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 28,
		infiniteLoop: true,
		slideWidth: 152,
		pager: true,
		minSlides: 9,
		maxSlides: 9,
		speed: 800,
		auto: true,
	});
	
	$('.sub_slide').bxSlider({
		nextSelector: '#g5_next',
		prevSelector: '#g5_prev',
		nextText: '<img src="img/bx_slider_next.png" alt=""/>',
		prevText: '<img src="img/bx_slider_perv.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 28,
		infiniteLoop: true,
		slideWidth: 263,
		pager: true,
		minSlides: 3,
		maxSlides: 3,
		speed: 800,
		auto: true,
	});

	$('.sub_slide1').bxSlider({
		nextSelector: '#g6_next',
		prevSelector: '#g6_prev',
		nextText: '<img src="img/view_slider_next.png" alt=""/>',
		prevText: '<img src="img/view_slider_prev.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 0,
		infiniteLoop: true,
		slideWidth: 990,
		pager: true,
		minSlides: 1,
		maxSlides: 1,
		speed: 800,
		auto: true,
	});
	
	// 마우스오버시 이미지 변경
	$('.viusalbtn_ul').find('img').hover(function() {$(this).attr("src",$(this).attr("src").replace(/off\.png$/, 'on.png')); }, function() { $(this).attr("src",$(this).attr("src").replace(/on\.png$/, 'off.png')); });
	


    $(".tab_content").hide();
    $(".tab_content:first").show();

    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active").css("color", "#fff");
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "#fff");
        $(".tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });


	$(".sidebar.left").on("sidebar:opened", function () {
	   // Do something on open\
	   $('html').css('overflow', 'hidden');  //ADD THIS
		
		
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();  
		
		$('#mask').css({'width':maskWidth,'height':maskHeight});  
	   //애니메이션 효과
        $('#mask').fadeIn(100);      
        $('#mask').fadeTo("fast",0.8);   
	});

	$(".sidebar.left").on("sidebar:closed", function () {
	   // Do something on close
		//애니메이션 효과
        $('#mask').fadeOut(100);      
        $('#mask').fadeTo("fast",0.8);   
	   $('html').css('overflow', 'auto');  //ADD THIS
	});
});

