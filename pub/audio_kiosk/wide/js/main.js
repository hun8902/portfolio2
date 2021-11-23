$(document).ready(function(){
	$.svk.init();

	$('#slider').rbtSlider({
		height: '319px', 
		'dots': true,
		'arrows': true,
		'auto': 4
	});

	var dt = new Date();
	var year = "";
	var com_year = dt.getFullYear();
	$("#year_start").append("<option value='"+ com_year +"'>"+ com_year + " 년" +"</option>");
	$("#year_end").append("<option value='"+ com_year +"'>"+ com_year + " 년" +"</option>");
	for(var y = (com_year-1); y >= (com_year-100); y--){
	$("#year_start").append("<option value='"+ y +"'>"+ y + " 년" +"</option>");
	$("#year_end").append("<option value='"+ y +"'>"+ y + " 년" +"</option>");
	}

	$('ul.tab li').click(function() {
		var activeTab = $(this).attr('data-tab');
		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$(this).addClass('current');
		$('#' + activeTab).addClass('current');
	});

	

	$('#sample2-4').liquidCarousel({
		loop: false
	});

	(function () {
		var self = $('#sample2-4').data('carousel')
		,   control = $('.gnb_slide_more')
		,   paginationItem = control.find($('.ui-carousel-paginationItem'))
		;

		paginationItem.on('click', function(e){
			self.moveBind(paginationItem.index(this) * self.group);
			e.preventDefault();
		});

		control.find($('#gnb_slide_prev')).on('click', function(e){
			self.moveBind(self.index - self.group, this);
			e.preventDefault();
		});

		control.find($('.gnb_slide_next')).on('click', function(e){
			self.moveBind(self.index + self.group, this);
			e.preventDefault();
		});

		control.find($('.ui-carousel-setNum')).on('click', function(e){
			self.moveBind(2, this);
			e.preventDefault();
		});
	})();

	
	$(".popup_search").click(function(event){  //팝업 Open 버튼 클릭 시 
 
		 $(".popup_style3").css({
			"top": "120px",
			"left": (($(window).width()-$(".popup_style3").outerWidth())/2+$(window).scrollLeft())+"px"
			//팝업창을 가운데로 띄우기 위해 현재 화면의 가운데 값과 스크롤 값을 계산하여 팝업창 CSS 설정
		 
		 }); 
		
		$("#popup_mask").css("display","block"); //팝업 뒷배경 display block
		$(".popup_style3").css("display","block"); //팝업창 display block
		
		$("body").css("overflow","hidden");//body 스크롤바 없애기
	});

	$(".popup_info").click(function(event){  //팝업 Open 버튼 클릭 시 
 
		 $(".popup_style4").css({
			"top": (($(window).height()-$(".popup_style4").outerHeight())/2+$(window).scrollTop())+"px",
			"left": (($(window).width()-$(".popup_style4").outerWidth())/2+$(window).scrollLeft())+"px"
			//팝업창을 가운데로 띄우기 위해 현재 화면의 가운데 값과 스크롤 값을 계산하여 팝업창 CSS 설정
		 
		 }); 
		
		$("#popup_mask").css("display","block"); //팝업 뒷배경 display block
		$(".popup_style4").css("display","block"); //팝업창 display block
		
		$("body").css("overflow","hidden");//body 스크롤바 없애기
	});

	$(".popup_save").click(function(event){  //팝업 Open 버튼 클릭 시 
 
		 $(".popup_style1").css({
			"top": (($(window).height()-$(".popup_style1").outerHeight())/2+$(window).scrollTop())+"px",
			"left": (($(window).width()-$(".popup_style1").outerWidth())/2+$(window).scrollLeft())+"px"
			//팝업창을 가운데로 띄우기 위해 현재 화면의 가운데 값과 스크롤 값을 계산하여 팝업창 CSS 설정
		 
		 }); 
		
		$("#popup_mask").css("display","block"); //팝업 뒷배경 display block
		$(".popup_style1").css("display","block"); //팝업창 display block
		
		$("body").css("overflow","hidden");//body 스크롤바 없애기
	});

	$(".popup_login").click(function(event){  //팝업 Open 버튼 클릭 시 
 
		 $(".popup_style2").css({
			"top": "50px",
			"left": (($(window).width()-$(".popup_style2").outerWidth())/2+$(window).scrollLeft())+"px"
			//팝업창을 가운데로 띄우기 위해 현재 화면의 가운데 값과 스크롤 값을 계산하여 팝업창 CSS 설정
		 
		 }); 
		
		$("#popup_mask").css("display","block"); //팝업 뒷배경 display block
		$(".popup_style2").css("display","block"); //팝업창 display block
		
		$("body").css("overflow","hidden");//body 스크롤바 없애기
	});

	$("#popup_mask").click(function(event){
		$("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
		$(".popup_style1").css("display","none"); //팝업창 display none
		$(".popup_style2").css("display","none"); //팝업창 display none
		$(".popup_style3").css("display","none"); //팝업창 display none
		$(".popup_style4").css("display","none"); //팝업창 display none
		$("body").css("overflow","auto");//body 스크롤바 생성
		$(".nameField").val("");

		$(".keyboard").css('top', window.innerHeight);
		document.body.scrollTop -= $(".keyboard").height();
		$(".keyboard").html("");
		$(".keyboard").css("display","none;");
		$("#search_1")[0].reset();  
		$("#search_2")[0].reset();  

		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$(this).addClass('current');
		$('#tab1').addClass('current');
	});


	$(".popup_close").click(function(event){
		$("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
		$(".popup_style1").css("display","none"); //팝업창 display none
		$(".popup_style2").css("display","none"); //팝업창 display none
		$(".popup_style3").css("display","none"); //팝업창 display none
		$(".popup_style4").css("display","none"); //팝업창 display none
		$("body").css("overflow","auto");//body 스크롤바 생성
		$(".nameField").val("");

		$(".keyboard").css('top', window.innerHeight);
		document.body.scrollTop -= $(".keyboard").height();
		$(".keyboard").html("");
		$(".keyboard").css("display","none;");
		$("#search_1")[0].reset();  
		$("#search_2")[0].reset();  

		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$(this).addClass('current');
		$('#tab1').addClass('current');
	});

	$(".popup_close1").click(function(event){
		$("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
		$(".popup_style1").css("display","none"); //팝업창 display none
		$(".popup_style2").css("display","none"); //팝업창 display none
		$("body").css("overflow","auto");//body 스크롤바 생성
		$(".nameField").val("");

		$(".keyboard").css('top', window.innerHeight);
		document.body.scrollTop -= $(".keyboard").height();
		$(".keyboard").html("");
		$(".keyboard").css("display","none;");
		$("#search_1")[0].reset();  
		$("#search_2")[0].reset();  

		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$(this).addClass('current');
		$('#tab1').addClass('current');
	});

	
	$(".close_popup3").click(function(event){
		$("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
		$(".popup_style3").css("display","none"); //팝업창 display none
		$("body").css("overflow","auto");//body 스크롤바 생성
		$(".nameField").val("");


		$(".keyboard").css('top', window.innerHeight);
		document.body.scrollTop -= $(".keyboard").height();
		$(".keyboard").html("");
		$(".keyboard").css("display","none;");
		$("#search_1")[0].reset();  
		$("#search_2")[0].reset();  

		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$('#warp .tab li:first').addClass('current');
		$('#tab1').addClass('current');
	});

	$(".popup_close4").click(function(event){
		$("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
		$(".popup_style1").css("display","none"); //팝업창 display none
		$(".popup_style2").css("display","none"); //팝업창 display none
		$(".popup_style3").css("display","none"); //팝업창 display none
		$(".popup_style4").css("display","none"); //팝업창 display none
		$("body").css("overflow","auto");//body 스크롤바 생성
		$(".nameField").val("");

		$(".keyboard").css('top', window.innerHeight);
		document.body.scrollTop -= $(".keyboard").height();
		$(".keyboard").html("");
		$(".keyboard").css("display","none;");
		$("#search_1")[0].reset();  
		$("#search_2")[0].reset();  

		$('ul.tab li').removeClass('current');
		$('.tabcontent').removeClass('current');
		$(this).addClass('current');
		$('#tab1').addClass('current');
	});



	 $(".gnb_ul li").click(function(){
		var submenu = $(".sub_tit:eq(" + $(this).index() + ")");
		$(".menu a").removeClass("active");
		if( submenu.is(":visible") ){			
		}else{
			 $(".sub_tit ").slideUp();	 	
			  $(this).find("a").addClass("active");			
		}	
		// submenu 가 화면상에 보일때는 위로 보드랍게 접고 아니면 아래로 보드랍게 펼치기
		if( submenu.is(":visible") ){
			submenu.slideUp();
		}else{
			submenu.slideDown();
		}
	});

	$('.left_nav').bxSlider({
		nextSelector: '.slider_top_btn',
		prevSelector: '.slider_botto_btn',
		nextText: '<img src="images/content/slider_top_btn.png" alt=""/>',
		prevText: '<img src="images/content/slider_bottom_btn.png" alt=""/>',
		mode: 'vertical',
		moveSlides: 1,
		slideMargin: 0,
		infiniteLoop: false,
		minSlides: 6,
		maxSlides: 6,
		speed: 800,
		pager: false,
		auto: false,
	});

	$('.view_ul').bxSlider({
		nextSelector: '.view_ul_left_btn',
		prevSelector: '.view_ul_right_btn',
		nextText: '<img src="images/content/main_slider_left.png" alt=""/>',
		prevText: '<img src="images/content/main_slider_right.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 15,
		slideWidth: 250,
		infiniteLoop: false,
		minSlides: 5,
		maxSlides: 5,
		speed: 800,
		pager: false,
		auto: true,
	});

	$('.bxslider1').bxSlider({
		nextSelector: '#g1_next',
		prevSelector: '#g1_prev',
		nextText: '<img src="images/content/main_slider_right.png" alt=""/>',
		prevText: '<img src="images/content/main_slider_left.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 15,
		infiniteLoop: true,
		slideWidth: 180,
		minSlides: 6,
		maxSlides: 6,
		speed: 800,
		pager: false,
		auto: true,
	});

	$('.bxslider2').bxSlider({
		nextSelector: '#g2_next',
		prevSelector: '#g2_prev',
		nextText: '<img src="images/content/main_slider_right.png" alt=""/>',
		prevText: '<img src="images/content/main_slider_left.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 15,
		infiniteLoop: true,
		slideWidth: 180,
		minSlides: 6,
		maxSlides: 6,
		speed: 800,
		pager: false,
		auto: true,
	});

	$('.bxslider3').bxSlider({
		nextSelector: '#g3_next',
		prevSelector: '#g3_prev',
		nextText: '<img src="images/content/main_slider_right.png" alt=""/>',
		prevText: '<img src="images/content/main_slider_left.png" alt=""/>',
		mode: 'horizontal',
		moveSlides: 1,
		slideMargin: 15,
		infiniteLoop: true,
		slideWidth: 180,
		minSlides: 6,
		maxSlides: 6,
		speed: 800,
		pager: false,
		auto: true,
	});


	$(".maintab_content").hide();
    $(".maintab_content:first").show();

    $("ul.main_tabs li").click(function () {
        $("ul.main_tabs li").removeClass("current");
        $(this).addClass("current");
        $(".maintab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
	

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

	
	$("#top_btn").click(function() {
		$('html, body').animate({
			scrollTop : 0
		}, 400);
		return false;
	});



	$("#checkall").click(function(){
        if($("#checkall").prop("checked")){
            $("input[name=chk]").prop("checked",true);
        }else{
            $("input[name=chk]").prop("checked",false);
        }
    })



});

