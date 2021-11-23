$(document).ready(function(){
	


	$('#notice_popup').RollingSlider({
		showArea:"#example",
		prev:"#jprev",
		next:"#jnext",
		moveSpeed:300,
		autoPlay:false
	});
	$(".popup_open").click(function(event){
		$(".popup-wrap").css("opacity", "1");
		 $(".popup-wrap").css({
			"top": (($(window).height()-$(".popup-wrap").outerHeight())/2+$(window).scrollTop())+"px",
			"left": (($(window).width()-$(".popup-wrap").outerWidth())/2+$(window).scrollLeft())+"px"
		 }); 		
		$("#popup_mask").css("display","block");
		$(".popup-wrap").css("display","block");
		
	});
	$(".popup_clcose").click(function(event){
		$(".popup-wrap").css("opacity", "0");
		$("#popup_mask").css("display","none");
		$(".popup-wrap").css("display","none");
		
	});

   
	
	$('.tab1_ul').bxSlider({
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 0,
		infiniteLoop: true,
		minSlides: 1,
		maxSlides: 3,
		speed: 800,
		pager: true,
		controls:false,
		auto: true,
	});

	$('.tab2_ul').bxSlider({
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 0,
		infiniteLoop: true,
		minSlides: 1,
		maxSlides: 3,
		speed: 800,
		pager: true,
		controls:false,
		auto: true,
	});

	$('.banner_slider').bxSlider({
		nextSelector: '.banner_next',
		prevSelector: '.banner_prev',
		nextText: '<img src="img/banner_next.png" alt=""/>',
		prevText: '<img src="img/banner_prev.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 0,
		slideWidth: 554,
		infiniteLoop: true,
		minSlides: 1,
		maxSlides: 5,
		speed: 800,
		pager: false,
		auto: true,
	});



	$(".tab_content").hide();
    $(".tab_content:first").show();

    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active");
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active");
        $(".tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });

	$('.weather1').weather({
		city: 'Seoul, KR',
		tempUnit: 'C',
		displayHumidity: true
	});
});

$(window).load(function(){
	window.setTimeout(function() {
	  $(".popup-wrap").css("display","none");
	}, 1000);  
});