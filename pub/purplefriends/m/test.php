
<!doctype html>
<html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<meta name="viewport" content="width=640, user-scalable=yes">
	<meta name="apple-mobile-web-app-title" content="Company" />
	<meta http-equiv="Content-Style-Type" content="text/css">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<title>옐로디지털마케팅그룹의 no.1 모바일마케팅대행사 퍼플프렌즈</title>
	<!-- Jquery cdn -->
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- reset -->
	<link rel="stylesheet" href="./css/font.css">
	<link rel="stylesheet" href="./css/font-awesome.min.css">
	<!-- css , js -->
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/jquery.slider.css">
	<link rel="stylesheet" href="./css/mobile.css">	

	<script src="./js/jquery.malihu.PageScroll2id.js"></script>
	<script src="./js/jPages.js"></script>
	<link rel="stylesheet" href="css/jPages.css">

	<style>
		* { margin:0; padding:0; font-family:sans-serif; }

		body { width:350px; }

		.head, li, h2 { margin-bottom:15px; }

		.head { 
			text-decoration:none; 
			font-size:20px; 
			display:block;
			padding:0 0 0 40px;
		}

		.content { 
			display:none;
		}
		#improved{
			padding:40px 0 0 0;
		}

		#improved li {
			position:relative;
			overflow:hidden;
			margin-bottom:40px;
		}
	</style>
	<script>
		$(document).ready(function(){
			$('#original .head').click(function(e){
				e.preventDefault();
				$(this).closest('li').find('.content').slideToggle();
			});

			$('#improved .head').click(function(e){
				$(".content").fadeOut();
				e.preventDefault();
				$(this).closest('li').find('.content').slideToggle();
			});
		

			
			$("div#sub2").jPages({
			  containerID: "improved",
			   perPage: 6,
			   previous    : "span.arrowPrev",
			   next        : "span.arrowNext"
			});
		});
	</script>
	<script>
		(function($){
			$(window).load(function(){
				
				/* Page Scroll to id fn call */
				$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#navigation-menu a"
				});

				/* Page Scroll to id fn call */
				$("#slider a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#slider a"
				});

				/* Page Scroll to id fn call */
				$("#works a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#works a"
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
	
 </head>

 <body  style="background:#fff;">
	<div class="mr_40" style="padding:40px 0 0 0;"><img src="img/m_works.png" alt="works"/></div>
	<div class="title_sub" style="margin:20px 0 20px 40px; "> 전문적이고 보다 창의적인 발상의 통합디지털 마케팅 <br/>서비스를  제공하는 퍼플의 크리에이티브.</div>
   <ul id='improved'>
		<li>
			<a href='#m15' class='head'><img src="http://m.purplefriends.co.kr/img/works_m15.png"></a>
			<div id="m15" class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m15.png"></div>
		</li>
		<li>
			<a href='#m14' class='head'><img src="http://m.purplefriends.co.kr/img/works_m14.png"></a>
			<div id="m14" class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m14.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m13.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m13.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m12.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m12.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m11.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m11.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m10.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m10.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m9.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m9.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m8.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m8.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m7.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m7.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m6.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m6.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m5.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m5.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m4.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m4.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m3.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m3.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m2.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m2.png"></div>
		</li>
		<li>
			<a href='#' class='head'><img src="http://m.purplefriends.co.kr/img/works_m1.png"></a>
			<div class='content'><img src="http://m.purplefriends.co.kr/img/work_popup_m1.png"></div>
		</li>

			
	</ul>
	 <!-- navigation holder -->
	  <div id="sub2" class="holder">
	  </div>
	  
	  <div style="padding:30px 0;"></div>




 </body>
</html>
