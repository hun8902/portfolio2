


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
	<link rel="stylesheet" href="./css/jPages.css">
	<script src="./js/jPages.js"></script>
	<link rel="stylesheet" href="./css/jquery.slider.css">
	<link rel="stylesheet" href="./css/mobile.css">

	<link rel="stylesheet" href="css/jPages.css">

	<script src="js/jquery.fancybox.js?v=2.1.5"></script>
	<script src="./js/jquery.slider.js"></script>
	<script src="./js/jquery.easing.1.3.js"></script>
	<script src="./js/jquery.malihu.PageScroll2id.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<link rel="stylesheet" type="text/css" href="helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script src="helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script src="helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<script src="helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<script src="./js/accordion.js"></script>
	<script type="text/javascript">
		$(function() {
		
			$('#st-accordion').accordion({
				
			});
			
		});
	</script>

	<style>

	</style>
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
 <body>
  <!--해더 -->
  <div id="m_header">
	<div class="logo"><a href="index.php"><img src="img/m_logo.png" alt="logo"></a></div>
	<div id="navigation-menu" class="gnb">
		<ul>
			<li class="navli_1"><a href="#works"><img src="img/m_works.jpg"></a></li>
			<li class="navli_2"><a href="#company"><img src="img/m_company.jpg"></a></li>
			<li class="navli_3"><a href="#recruit"><img src="img/m_recrult.jpg"></a></li>
			<li><a href="#contactus"><img src="img/m_contact.jpg"></a></li>
		</ul>
	</div>
  </div>
   <!--슬라이더 -->
   <div id="slider">
		<div class="light" style="background-image: url(img/m_slider_1.png);">
			<q class="m_slider_1_more"><a href="http://blog.naver.com/purplefrs" target="_blank"><img src="img/m_slider_1_more.png"></a></q>
			<q class="m_slider_call"><a href="#request" ><img src="img/m_slider_call.png"></a></q>
		</div>
		<div class="light" style="background-image: url(img/m_slider_2.png);">
			<q class="m_slider_more"><a class="fancybox" href="img/work_popup_m14.png" target="_blank"><img src="img/m_slider_more.png"></a></q>
		</div>
		<div class="light" style="background-image: url(img/m_slider_3.png);">
			<q class="m_slider_more"><a class="fancybox"  href="img/work_popup_m12.png" target="_blank"><img src="img/m_slider_more.png"></a></q>
		</div>
		<div class="light" style="background-image: url(img/m_slider_4.png);">
			<q class="m_slider_more"><a href="https://www.facebook.com/mmcbymmc/photos/a.235456443276216.1073741828.234604946694699/319869014834958/?type=1&theater" target="_blank"><img src="img/m_slider_more.png"></a></q>
		</div>
		<div class="light" style="background-image: url(img/m_slider_5.png);">
			<q class="m_slider_more"><a class="fancybox-media" href="http://www.youtube.com/embed/HfkUH4agglY" target="_blank"><img src="img/m_slider_more.png"></a></q>
		</div>
	</div>
	<style>


		.head { 
			text-decoration:none; 
			font-size:20px; 
			display:block;
		}

		.content { 
			display:none;
		}

		#improved li {
			position:relative;
			overflow:hidden;
		}
	</style>
	<script>
		$(document).ready(function(){
			
			$(".various").fancybox({
				width     : 640,
				height    : 4000,
				minWidth  : 640,
				minHeight : 4000,
				maxWidth	: 640,
				maxHeight	: 4000,
				mouseWheel : false,
				autoSize   : false,
				autoHeight : false,
				autoWidth  : false,
				scrolling : 'auto', // 'auto', 'yes' or 'no',
				fitToView	: false
			});
		});
	</script>

						

	<!--works -->
	<div id="works">
		<a href="http://www.mmcbymmc.com/" target="_blank" class="mmc_button">mmc</a>
		<a class="various fancybox.iframe works_button" data-fancybox-type="iframe" href="work.php" >works</a>
		<a href="#contactus" class="contact_button">contact us</a>
		
	</div>

	<script>
		$(document).ready(function(){ //DOM이 준비되고
	    $('#pupup_close_pos').click(function(){ // ID가 toggleButton인 요소를 클릭하면
	       //     $('.popup_absolute').hide(); // ID가 moreMenu인 요소를 hide();      
	    });
		$('.works_button').click(function(){ // ID가 toggleButton인 요소를 클릭하면
			//	 $('.popup_absolute').fadeIn("slow"); // ID가 moreMenu인 요소를 hide();      
		    });
		});
	</script>


	
	<!--news -->
	<div id="news">
		<div class="t40r37"><img src="img/m_news.png" alt="news"/></div>
		<!-- <div class="news_more"><a href="#"><img src="img/m_news_more.png" alt="more"/></a></div> -->
		<ul class="news_text">
        	<li><a href="http://news.mk.co.kr/newsRead.php?year=2015&no=72058" target="_blank">PF,동물사랑 캠페인 라이프노킹 후원</a><div class="date">2015.01.22</div></li>
		   <li><a href="http://www.edaily.co.kr/news/NewsRead.edy?SCD=JE41&newsid=02122166606320160&DCD=A00504&OutLnkChk=Y" target="_blank">여가부 '가족친화인증기업' 선정</a><div class="date">2014.12.19</div></li>
           
           
		<div style="clear:both"></div>
	</div>
	<div id="company">
		<div class="t40r37"><img src="img/m_company.png" alt="Company"/></div>
		<div id="slider1">
			<div class="light" style="background-image: url(img/company_slider_m1.png);"></div>
			<div class="light" style="background-image: url(img/company_slider_m2.png);"></div>
			<div class="light" style="background-image: url(img/company_slider_m3.png);"></div>
		</div>
	</div>

	<div id="company">
		<div class="m_company_bg">
			<a href="./purplefriends_2015.pdf" target="_blank" class="m_company_donwnload">회사 소개서download</a>
			<ul class="company_menu">
				<li class="m_compnay_m1_temp"><a href="http://yellomobile.com/" target="_blank"><div class="m_compnay_libox">Yello Mobile</div></a></li>
				<!-- <li class="m_compnay_m2"><a href="#"><div class="m_compnay_libox">About YDM</div></a></li> -->
				<li class="m_compnay_m2"><a href="https://www.facebook.com/purplefriends" target="_blank"><div class="m_compnay_libox">purple's Facebook</div></a></li>
				<li><a href="http://blog.naver.com/purplefrs" target="_blank"><div class="m_compnay_libox">purple's Blog</div></a></li>
			</ul>
		</div>
	</div>

	<div id="request">
		<div class="img_title" style="margin:40px 0 0 0;"><img src="img/m_request.png" alt="request"/></div>
		<div class="title_sub">등록하여주신 내용들은 퍼플 프렌즈 고객리스트에 <br/>자동등록 됩니다.</div>
		<form method="post" name="form" enctype="multipart/form-data" action="PHPMailer/examples/mail.php" onSubmit="return checkForm();">
		<input type="hidden" name="to_name" size="15" value="Purple Friends">
		<input type="hidden" name="to" size="30" value="event@purplefriends.co.kr">

		<div class="project_rq_table">
			<table>
				<tr style="height:56px;">
					<td style="width:150px;">
						<p class="text1">Your Company</p>
					</td>
					<td>
						<input type="text" class="pq_input" name="compnany" id="compnany">
					</td>
				</tr>
				<tr  style="height:56px;">
					<td style="width:150px;">
						<p class="text1">Name</p>
					</td>
					<td>
						<input type="text" class="pq_input" name="from_name" id="company_name">
					</td>
				</tr>
				<tr  style="height:56px;">
					<td style="width:150px;">
						<p class="text1">Phone Number</p>
					</td>
					<td>
						<input type="text" class="pq_input" name="phone_number" id="phone_number">
					</td>
				</tr>
				<tr  style="height:56px;">
					<td style="width:150px;">
						<p class="text1">E-mail</p>
					</td>
					<td>
						<input type="text" class="pq_input" name="from" id="e-mail">
					</td>
				</tr>
				<tr  style="height:56px;">
					<td style="width:150px;">
						<p class="text1">Title</p>
					</td>
					<td>
						<input type="text" class="pq_input_l" name="subject" id="title">
					</td>
				</tr>
				<tr>
					<td style="width:150px; vertical-align:top;">
						<p class="text1">Inquiry Detail</p>
					</td>
					<td>
						<textarea name="content" class="pq_input_2"></textarea>
					</td>
				</tr>
			</table>
			
		<div style="margin:30px 0 65px 200px;">
			<input type="image"  name="send" src="img/mail_apply.png" alt="apply"/>
		</div>
		</div>
		</form>
	</div>

	<div id="recruit">
		<div class="img_title"><img src="img/m_recruit.png" alt="recruit"/></div>
		<div class="title_sub">즐겁게 일하는 퍼플프렌즈는 항상 인재를 찾고 있습니다.</div>
		<img src="img/m_sub5_img.png" style="margin:40px 0 40px 0"/>
		<div class="s5_link">입사지원 : <a href="mailto:recruit@purplefriends.co.kr">recruit@purplefriends.co.kr</a></div>
	</div>


	<div id="contactus">
		<div class="img_title"><img src="img/m_contactus.png" alt="contactus" style="margin:0 0 30px 40px;"/></div>
		<div style="width:640px; height:400px;;  background:url('./img/contactus_img.png') no-repeat"></div>
	</div>

	<div id="footer">
		<div class="footer1">2014 copyright    <span class="purple_span">Purple Friends.</span> All rights Reserved.</div>
		<div class="footer2">
			2F Olympus tower. 114-9 <br/>samsung-dong. kangnam-gu.  <br/>Seoul. Korea.
		</div>
		<div class="footer3">
			Tel : 02-515-1174     Fax ; 02-515-1184 <br/>    
			E-mail ; <a href="mailto:recruit@purplefriends.co.kr">rang@purplefriends.co.kr</a>

		</div>
	</div>


 </body>
</html>
	<script type="text/javascript">
	  $(document).ready(function() {
		
		$('#slider').slider({
			width:      640,
			height:     688
		});
		$('#slider1').slider({
			width:      640,
			height:     505,
			'showProgress'  :   false,
			'showControls'  :   true

		});

		$('.fancybox').fancybox();

		$('.fancybox-buttons').fancybox({
			closeBtn  : false,

			helpers : {
				
				buttons	: {}
			},

			afterLoad : function() {
				this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
			}
		});
		$('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({

			arrows : false,
			helpers : {
				media : {},
				buttons : false
			}
		});

		$(".works_button").click(function(){
			//$("#work_open1").slideToggle("slow");
		  });

		$("#cp_identity").click( function () {
				$('#cp_identity').addClass("active");
				$('#cp_identity1').addClass("active");
				$('#cp_organization').removeClass("active");
				$('#cp_client').removeClass("active");
				$('#cp_organization1').removeClass("active");
				$('#cp_client1').removeClass("active");
				$('.clsBannerScreen').fadeIn("slow");
				$('.clsBannerButton').fadeIn("slow");
				$('#company_content1_2').hide();
				$('#company_content1_3').hide();
				$('#company_content2').hide();
				$('#company_content3').hide();
				$('#cp_identity1').fadeIn("slow");
				$('#cp_organization1').fadeIn("slow");
				$('#cp_client1').fadeIn("slow");

			});
			$("#cp_organization").click( function () {
				$('#cp_identity').removeClass("active");
				$('#cp_organization').addClass("active");
				$('#cp_client').removeClass("active");
				$('#cp_client1').hide();
				$('#cp_identity1').hide();
				$('#cp_organization1').hide();
				$('.clsBannerScreen').hide();
				$('.clsBannerButton').hide();
				$('#company_content1_3').hide();
				$('#company_content2').fadeIn("slow");
				$('#company_content3').hide();

			});
			$("#cp_client").click( function () {
				$('#cp_identity').removeClass("active");
				$('#cp_organization').removeClass("active");
				$('#cp_client').addClass("active");
				$('#cp_client1').hide();
				$('#cp_organization1').hide();
				$('#cp_identity1').hide();
				$('.clsBannerScreen').hide();
				$('.clsBannerButton').hide();
				$('#company_content1_3').hide();
				$('#company_content2').hide();
				$('#company_content3').fadeIn("slow");

			});
			$("#cp_identity1").click( function () {
				$('#cp_identity').addClass("active");
				$('#cp_identity1').addClass("active");
				$('#cp_organization').removeClass("active");
				$('#cp_client').removeClass("active");
				$('#cp_organization1').removeClass("active");
				$('#cp_client1').removeClass("active");
				$("#company_content1_1").fadeIn("slow");
				//$('#company_content1_1').show();
				$('#company_content1_2').hide();
				$('#company_content1_3').hide();
				$('#company_content2').hide();
				$('#company_content3').hide();


			});
			$("#cp_organization1").click( function () {
				$('#cp_identity').addClass("active");
				$('#cp_organization').removeClass("active");
				$('#cp_organization1').addClass("active");;
				$('#cp_identity1').removeClass("active");
				$('#cp_client').removeClass("active");
				$('#cp_client1').removeClass("active");
				$('#company_content1_1').hide();
				$("#company_content1_2").fadeIn("slow");
				//$('#company_content1_2').show();
				$('#company_content1_3').hide();
				$('#company_content2').hide();
				$('#company_content3').hide();

			});
			$("#cp_client1").click( function () {
				$('#cp_identity').addClass("active");
				$('#cp_organization').removeClass("active");
				$('#cp_client').removeClass("active");
				$('#cp_client1').addClass("active");
				$('#cp_identity1').removeClass("active");
				$('#cp_organization1').removeClass("active");
				$('#company_content1_1').hide();
				$('#company_content1_2').hide();
				$("#company_content1_3").fadeIn("slow");
				//$('#company_content1_3').show();
				$('#company_content2').hide();
				$('#company_content3').hide();

			});
			
	  });
	</script>
	