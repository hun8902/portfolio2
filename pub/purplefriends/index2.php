<?php
/*--------------------------------------------------------------------------------------------
|    @desc:        pagination index.php
|    @author:      Aravind Buddha
|    @url:         http://www.techumber.com
|    @date:        12 August 2012
|    @email        aravind@techumber.com
|    @license:     Free!, to Share,copy, distribute and transmit , 
|                  but i'll be glad if i my name listed in the credits'
---------------------------------------------------------------------------------------------*/
include('config.php');    //include of db config file
include ('paginate.php'); //include of paginat page

$per_page = 3;         // number of results to show per page
$result = mysql_query("SELECT * FROM purple_news ORDER BY `purple_news`.`news_no` DESC ");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
?>


<!DOCTYPE HTML>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<title>옐로디지털마케팅그룹의 no.1 모바일마케팅대행사 퍼플프렌즈</title>
	<meta name="viewport" content="user-scalable=yes, initial-scale=0.3, maximum-scale=1.0, minimum-scale=0.1, width=device-width" />

	<!-- stylesheet for demo and examples -->
		<!-- reset -->
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
	<link rel="stylesheet" type="text/css" href="helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	
	<link rel="stylesheet" type="text/css" href="helpers/jquery.fancybox-thumbs.css?v=1.0.7" />

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Google CDN jQuery -->
	<script src="js/jquery-1.9.0.min.js"></script>
	
	<script src="js/jquery.malihu.PageScroll2id.js"></script>
	<script src="js/jquery.slider.js"></script>

	<script src="js/jquery.fancybox.js?v=2.1.5"></script>
	<script src="helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script src="helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<script src="helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script src="js/accordion.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>

	<script type="text/javascript">
		$(function() {
		
			$('#st-accordion').accordion({
				
			});
			
		});
	</script>
	<style>
		.st-accordion ul li{
			height:auto;
		}
		.st-accordion ul li > a span{
			visibility:hidden;
		}
	</style>
	<script>
	jQuery(document).ready(function($){
		$(".scroll").click(function(event){            
			event.preventDefault();
				$( 'html, body' ).animate( { scrollTop : 2500 }, 400 );
				//$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
				//offset()함수를 이용하여 위치를 찾습니다.
			});
	});

	</script>
	

	<script type="text/javascript">
	  $(document).ready(function() {
		

		$('#slider').slider({
			width:      992,
			height:     452
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
			$("div#sub2").jPages({
			  containerID: "itemContainer",
			   perPage: 6,
			   previous    : "span.arrowPrev",
			   next        : "span.arrowNext"
			});
			$("div#news").jPages({
			  containerID: "itemContainer2sb",
			   perPage: 3,
			   previous    : "span.arrowPrev",
			   next        : "span.arrowNext"
			});
			$("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:"#navigation-menu a"
				});
				/* Page Scroll to id fn call */
			$(".s1_news_more a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
					highlightSelector:".s1_news_more a"
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
	  });
	</script>
	


<script language="Javascript">
<!--
function checkForm() {

  
    
  var frm = document.form;

  var chkbox = frm['cb1[]'];
  var cnt = 0;

  for (var i = 0 ; i < chkbox.length; i++) { 
    if (chkbox[i].checked) { 
       cnt++; 
    } 
  }

  if(cnt == 0){ 
    window.alert("체크박스를 선택해 주세요"); 
    return false;
  } 

   var f = document.form;
   if(!f.to_name.value) {
      alert('받는 사람 이름을 입력해 주세요.');
      f.to_name.focus();
      return false;
   }
   if(!f.to.value) {
      alert('받는 사람 이메일 주소를 입력해 주세요.');
      f.to.focus();
      return false;
   }
   if(!f.from_name.value) {
      alert('보내는 사람 이름을 입력해 주세요.');
      f.from_name.focus();
      return false;
   }
   if(!f.from.value) {
      alert('보내는 사람 이메일 주소를 입력해 주세요.');
      f.from.focus();
      return false;
   }
   if(!f.subject.value) {
      alert('제목을 입력해 주세요.');
      f.subject.focus();
      return false;
   }
   if(!f.content.value) {
      alert('내용을 입력해 주세요.');
      f.content.focus();
      return false;
   }
   return true;
}
//-->
</script>



	<script language="javascript">
<!--
function initForm()
{
   frm.mailTo.value = "";
   frm.mailFrom.value = "";
   frm.fromName.value = "";
   frm.title.value = "";
   frm.content.value = "";
   frm.upfile.select();            
   document.selection.clear(); 
   frm.mailTo.focus();
}

function checkForm()
{
  var Filter = /(\S+)@(\S+)\.(\S+)/ 
    
  var frm = document.contactform;

  var chkbox = frm['cb1[]'];
  var cnt = 0;

  for (var i = 0 ; i < chkbox.length; i++) { 
    if (chkbox[i].checked) { 
       cnt++; 
    } 
  }

  if(cnt == 0){ 
    window.alert("체크박스를 선택해 주세요"); 
    return false;
  } 


	

  if( !frm.mailTo.value.match(Filter))
  { 
    alert("유효하지 않은 이메일주소 입니다");
	frm.mailTo.focus();
	return false;
  }

  if( !frm.mailFrom.value.match(Filter))
  { 
    alert("유효하지 않은 이메일주소 입니다");
	frm.mailFrom.focus();
	return false;
  }

  if( !frm.fromName.value )
  {
    alert("보내는 분의 이름 또는 정보를 입력해 주세요");
	frm.fromName.focus();
	return false;
  }

  if( !frm.title.value )
  {
    alert("메일의 제목을 입력해 주세요");
	frm.title.focus();
	return false;
  }

  if( !frm.compnany.value )
  {
    alert("회사명을 입력해 주세요");
	frm.compnany.focus();
	return false;
  }
  if( !frm.position.value )
  {
    alert("위치를 입력해 주세요");
	frm.position.focus();
	return false;
  }
  if( !frm.mobile_numbers.value )
  {
    alert("휴대폰 번호를 입력해 주세요");
	frm.mobile_numbers.focus();
	return false;
  }

	return;




  //frm.action = "mail.php";
  //frm.submit();

}
//-->
</script>
<script type="text/javascript" src="js/jquery.banner.js"></script>
<script type="text/javascript">
<!--
$(function() {
	$("#image_list_3").jQBanner({nWidth:992,nHeight:535,nCount:3,isActType:"left",nOrderNo:1,isStartAct:"N",isStartDelay:"Y",nDelay:5000,isBtnType:"img"});
});
//-->
</script>
</head>

<body>
	<!-- 상단 네비 -->
	<nav id="navigation-menu">
		<div class="container">
			<div class="logo"><a href="#section-0"><img src="img/logo.png" alt="logo"/></a></div>
			<ul class="scroll_nav">
				<li class="nav_img1"><a href="#section-1">WORKS</a></li>
				<li class="nav_img2"><a href="#section-2">COMPANY</a></li>
				<li class="nav_img3"><a href="#section-3">NEWS</a></li>
				<li class="nav_img4"><a href="#section-4">PROJECT REQUEST</a></li>
				<li class="nav_img5"><a href="#section-5">RECRUIT</a></li>
				<li class="nav_img6"><a href="#section-6">CONTACT</a></li>
			</ul>
			<ul class="top_sns">
				<li><a href="https://www.facebook.com/purplefriends" target="_blank"><img src="img/facebook.png" alt="facebook"></a></li>
				<li><a href="http://blog.naver.com/purplefrs" target="_blank"><img src="img/blog.png" alt="blog"></a></li>
			</ul>
		</div>
		
	
	</nav>
	<!-- 상단 네비 -->

	
	
	<div id="content">
		<!-- 1번쨰 영역 -->
		<section id="section-0">
			<div class="container">
				<div class="content">
					 <div id="slider">
						<div class="light" style="background-image: url(img/1.png);">
							<q class="main_banner_p"><a href="http://www.mmcbymmc.com/?c=9/10" target="_blank"><img src="img/more.png"></a></q>
						</div>
						<div class="light" style="background-image: url(img/2.png);">
							<q class="main_banner_p"><a class="fancybox" href="img/works_15o.png" target="_blank"><img src="img/more.png"></a></q>
						</div>
						<div class="light" style="background-image: url(img/3.png);">
							<q class="main_banner_p"><a class="fancybox"  href="img/works_13o.png" target="_blank"><img src="img/more.png"></a></q>
						</div>
						<div class="light" style="background-image: url(img/4.png);">
							<q class="main_banner_p"><a href="https://www.facebook.com/mmcbymmc/photos/a.235456443276216.1073741828.234604946694699/319869014834958/?type=1&theater" target="_blank"><img src="img/more.png"></a></q>
						</div>
						<div class="light" style="background-image: url(img/5.png);">
							<q class="main_banner_p"><a class="fancybox-media" href="http://www.youtube.com/embed/HfkUH4agglY" target="_blank"><img src="img/more.png"></a></q>
							<!-- <q class="youtube">
								<iframe width="522" height="313" src="http://www.youtube.com/embed/HfkUH4agglY" frameborder="0" allowfullscreen></iframe>
							</q> -->
						</div>
					</div>
					
					<div class="s1_news">
						<div>
							<img src="img/tab1_news.png" alt="NEWs"/>
						</div>
						<div class="s1_news_text">
							<ul>
                            	<li><a href="http://www.hankyung.com/news/app/newsview.php?aid=201411128838i" target="_blank">서울시,'여성친화 일자리'에 퍼플프렌즈 선정</a><div class="date">2014.10.07</div></li>
                            	<li><a href="http://m.media.daum.net/m/media/world/newsview/20141015163605593" target="_blank">이수형 대표,한국소셜콘텐츠진흥협회장 취임</a> <div class="date">2014.10.15</div></li>
                                
								
								
							</ul>
						</div>
						<div class="s1_news_more">
							<a href="http://blog.naver.com/purplefrs" target="_blank"><img src="img/sm_more.png" alt="more"/></a>
						</div>
					</div>
					
					<div class="s1_banner">
						<div class="banner1">
							<div style="float:left; margin-right:17px"><a href="#"><img src="img/yello.png" alt="yello" /></a></div>
							<ul class="banner_parttner">
								<li><a href="http://www.cauly.net/index.php/w/home" target="_blank"><img src="img/cauly.png" alt="cauly" /></a></li>
								<li><a href="https://www.facebook.com/InnoBirds" target="_blank"><img src="img/nnobrds.png" alt="nnobrds" /></a></li>
								<li><a href="http://www.emotion.co.kr/" target="_blank"><img src="img/emotion.png" alt="emotion" /></a></li>
								<li><a href="http://withblog.net/swallow/home/" target="_blank"><img src="img/withblog.png" alt="withblog" /></a></li>
								<li><a href="http://www.socg.co.kr/" target="_blank"><img src="img/osocg.png" alt="osocg" /></a></li>
								<li><a href="http://www.revu.co.kr/" target="_blank"><img src="img/revu.png" alt="revu" /></a></li>
								<li><a href="http://wordpress.reallogger.co.kr/" target="_blank"><img src="img/real_lodder.png" alt="real_lodder" /></a></li>
							</ul>
						</div>
						<div class="banner2">
							<a href="http://www.mmcbymmc.com/?c=9/10" target="_blank"><img src="img/mmc_logo_sm.png" alt="mmc_logo"/></a>
							<a href="https://www.facebook.com/mmcbymmc" target="_blank"><img src="img/s1_facebook.png" alt="facebook"/></a>
							<a href="http://blog.naver.com/purplefrs" target="_blank"><img src="img/s1_blog.png" alt="blog"/></a>
							<a href="http://www.mmcbymmc.com/?c=1/5" target="_blank" class="newslatter_p"><img src="img/s1_newslatter.png" alt="newslatter"/></a>
						</div>
					</div>
					

					
					<!-- <hr /><a href="#top">&uarr; Back to top</a> <a href="#" rel="next">&darr; Next section</a> -->
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->
		<section id="section-1">
			<div class="container">
				<div class="content" style="height:780px; overflow:hidden">
					<div class="img_title"><img src="img/works_title.jpg" alt="works"/></div>
					<div class="title_sub">전문적이고 보다 창의적인 발상의 통합디지털 마케팅 서비스를 제공하는 퍼플의 크리에이티브</div>
					 <!-- item container -->
					  <ul id="itemContainer" >
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_16o.png"><img src="img/works_16.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_15o.png"><img src="img/works_15.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_14o.png"><img src="img/works_14.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_13o.png"><img src="img/works_13.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_12o.png"><img src="img/works_12.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_11o.png"><img src="img/works_11.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_10o.png"><img src="img/works_10.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_9o.png"><img src="img/works_9.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_8o.png"><img src="img/works_8.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_7o.png"><img src="img/works_7.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_6o.png"><img src="img/works_6.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_5o.png"><img src="img/works_5.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_4o.png"><img src="img/works_4.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_3o.png"><img src="img/works_3.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_2o.png"><img src="img/works_2.png" alt="" /></a></li>
						<li><a class="fancybox-buttons" data-fancybox-group="button" href="img/works_1o.png"><img src="img/works_1.png" alt="" /></a></li>
					  </ul>
					  <!-- navigation holder -->
					  <div id="sub2" class="holder">
					  </div>
					  
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		
		<!-- 1번쨰 영역 -->
		<section id="section-2">
			<div class="container">
				<div class="content">
					<div class="img_title"><img src="img/company_title.jpg" alt="company"/></div>
					<div class="title_sub">최적화된 통합마케팅으로 클라이언트사의 목표를 실현시켜 드립니다. </div>
					<div class="compnay_tab">
						<span id="cp_identity" class="cp_identity">identity</span>
						<span id="cp_organization" class="cp_organization">cp_organization</span>
						<span id="cp_client" class="cp_client">cp_client</span>
					</div>


					
					<div id="image_list_3">
					<ul class="clsBannerButton" id="label_3">
						<li><img src="img/fs.pager.png" oversrc="img/pager_over.png" outsrc="img/fs.pager.png" /></li>
						<li><img src="img/fs.pager.png" oversrc="img/pager_over.png" outsrc="img/fs.pager.png" /></li>
						<li><img src="img/fs.pager.png" oversrc="img/pager_over.png" outsrc="img/fs.pager.png" /></li>
					</ul>

					<div class="clsBannerScreen">
						<div class="images" style="display:block">
						<img src="img/company1_1.jpg" alt="company_1"/></div>
						<div class="images"><img src="img/company1_2.jpg" alt="company_1"/></div>
						<div class="images"><img src="img/company1_3.jpg" alt="company_1"/></div>
						
					</div>


						<!-- <div class="compnay_tab1">
						<span id="cp_identity1" class="pager active">identity</span>
						<span id="cp_organization1" class="pager">cp_organization</span>
						<span id="cp_client1" class="pager">cp_client</span>
					</div>
					<div id="company_content1_1" class="company_content">
						
					<img src="img/company1_1.jpg" alt="company_1"/>
					</div>
					<div id="company_content1_2" class="company_content">
						<div class="company_content1_2_text1"><img src="img/brand_identity.png" alt="brand identity"/></div> 
						<div class="company_content1_2_text2">저희 퍼플프렌즈는 전문성을 갖추고  새로운 것들에 도전하여  <br/>
						파트너사에게 기대이상의 가치와 놀라움을 드리기 위해 존재합니다!  
						</div> 
						<img src="img/company1_2.jpg" alt="company_1"/>
					</div> -->

					<!-- <div id="company_content1_3" class="company_content"><img src="img/company1_3.jpg" alt="company_1"/></div> -->
					<div id="company_content2" class="company_content"><img src="img/company_2.png" alt="company_2"/></div>
					<div id="company_content3" class="company_content"><img src="img/company_3.png" alt="company_3"/></div>
						
				
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->
		<section id="section-3">
			<div class="container">
				<div class="content">
					<div id="target"></div>  
					<div class="img_title"><img src="img/news_title.jpg" alt="news"/></div>
					<div class="title_sub">퍼플프렌즈의 소식을 알려드립니다.</div>
					<div class="wrapper">
						<div id="st-accordion" class="st-accordion">
								<style>
									.pagination{width:922p; margin:0 0 40px 450px; clear:both; height:20px;}
									.pagination ul li{float:left; margin:0 5px; font-family:NG; font-size:16px}
								</style>
								<ul id="itemContainer1">
									<li class="newsli"><a href="#"><div class="news_1">1</div><div class="news_2"><div class="news_title">부산국제광고제 REVIEW</div><div class="news_text">부산국제광고제를 보기 위해 아름다운 해운대를 찾은 퍼플러들<br/>중국시장과의 협업을 통한 글로벌 광고제의 모습<br/>디지털 마케팅의 중요성이 부각되고 있는 세미나 현장</div></div><div class="news_arrow">updown</div><div class="news_date">2014.09.10</div><div style="clear:both; border-bottom: 1px solid #c4c4c4;"></div><span class="st-arrow">Open or Close</span></a><div class="st-content"><div class="news_content"><div class="news_over"><img src="img/news_8.png"></div></div></div></li></li><li class="newsli"></li><div class="pagination"><ul></ul></div>									
									

									
								
							</ul>
						</div>
					</div>

					<div class="wrapper">
						<div id="st-accordion" class="st-accordion">
								<style>
									.pagination{width:922p; margin:0 0 40px 450px; clear:both; height:20px;}
									.pagination ul li{float:left; margin:0 5px; font-family:NG; font-size:16px}
								</style>
								<ul id="itemContainer1">
									<?php
										$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
									   
										// display data in table
										
										
										// loop through results of database query, displaying them in the table 
										for ($i = $start; $i < $end; $i++) {
											echo '<li class="newsli">';
											// make sure that PHP doesn't try to show results that don't exist
											if ($i == $total_results) {
												break;
											}
										  
											echo '<a href="#"><div>' . mysql_result($result, $i, 'news_no') . '</div>';
										

											echo '<span class="st-arrow">Open or Close</span></a><div class="st-content"><div class="news_content"><div class="news_over">';
											echo '<img src="img/' . mysql_result($result, $i, 'news_content') . '.png">';
											echo '</div></div></div>';

											echo "</li>";
										}       
											
										echo '<div class="pagination"><ul>';
											if ($total_pages > 1) {
												echo paginate($reload, $show_page, $total_pages);
											}
										echo "</ul></div>";
									?>
									
									

									
								
							</ul>
						</div>
					</div>
					
					

					



				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->
		<section id="section-4">
			<div class="container">
				<div class="content">
					<div class="img_title"><img src="img/project_request_title.jpg" alt="project request"/></div>
					<div class="title_sub">등록하여주신 내용들은 퍼플 프렌즈 고객리스트에 자동등록 됩니다.</div>
					<form method="post" name="form" enctype="multipart/form-data" action="mail_send.php" onSubmit="return checkForm();">
					<input type="hidden" name="to_name" size="15" value="Purple Friends">
					<input type="hidden" name="to" size="30" value="ab8903@naver.com">
					<div class="project_rq_table">
						<table>
							<tr>
								<td class="title" style="width:195px; height:80px;">01.Project Scope<div class="title1">프로젝트 범위(복수 선택 가능)</div></td>
								<td colspan="4">
									<input type="checkbox" name="cb1[]" class="cb1" value="digital Campaign">
									<p class="text">Digital Campaign<br/>(Promotion)</p>
									<input type="checkbox" name="cb1[]" class="cb1" value="brand consult">
									<p class="text">Brand consult</p>
									<input type="checkbox" name="cb1[]" class="cb1" value="online_da">
									<p class="text">Online DA</p>
									<input type="checkbox" name="cb1[]" class="cb1" value="mobile_da">
									<p class="text">Mobile DA</p>
									<input type="checkbox" name="cb1[]" class="cb1" value="mobile_da">
									<p class="text">Web & Mobile Site</p>
									&nbsp;
								</td>
							</tr>
							<tr>
								<td class="title" style="width:195px; height:80px;">02. Project Type<div class="title1">프로젝트 범위 성격</div></td>
								<td colspan="4">
									<input type="radio" name="cb2[]" class="cb1" value="annual project">
									<p class="text">Annual project<br/>연가</p>
									<input type="radio" name="cb2[]" class="cb1" value="short team project">
									<p class="text">Short-term project<br/>단기</p>
									<input type="radio" name="cb2[]" class="cb1" value="renewal">
									<p class="text">Renewal<br/>리뉴얼</p>
									<input type="radio" name="cb2[]" class="cb1" value="maintenance">
									<p class="text">Maintenance<br/>운영/유지보수</p>
									<input type="radio" name="cb2[]" class="cb1" value="others">
									<p class="text">Others<br/>기타</p>
									
									&nbsp;
								</td>
							</tr>
							<tr>
								<td style="width:195px; height:35px;"></td>
								<td style="width:100px;">
									<p class="text1">Your Company</p>
								</td>
								<td style="width:270px;">
									<input type="text" class="pq_input" name="compnany" id="compnany">
								</td>
								<td style="width:100px;">
									<p class="text1">Name</p>
								</td>
								<td>
									<input type="text" class="pq_input" name="from_name" id="company_name">
								</td>
							</tr>
							<tr>
								<td style="width:195px; height:35px;"></td>
								<td>
									<p class="text1">Position</p>
								</td>
								<td>
									<input type="text" class="pq_input" name="position" id="position">
								</td>
								<td>
									<p class="text1">Phone Number</p>
								</td>
								<td>
									<input type="text" class="pq_input" name="phone_number" id="phone_number">
								</td>
							</tr>
							<tr>
								<td style="width:195px; height:35px;"></td>
								<td >
									<p class="text1">Mobile Numbers</p>
								</td>
								<td>
									<input type="text" class="pq_input" name="mobile_numbers" id="mobile_numbers">
								</td>
								<td>
									<p class="text1">E-mail</p>
								</td>
								<td>
									<input type="text" class="pq_input" name="from" id="e-mail">
								</td>
							</tr>
							<tr>
								<td style="width:195px; height:35px;"></td>
								<td>
									Title
								</td>
								<td colspan="3">
									<input type="text" class="pq_input_l" name="subject" id="title">
								</td>
							</tr>
							<tr>
								<td class="vmiddle title" style="width:199px; height:245px;">03. Inquiry<div class="title1">프로젝트 정보</div></td>
								<td class="vmiddle">
									Inquiry Detail
								</td>
								<td colspan="3">
									<textarea name="content" style="width:610px; height:185px; border:1px solid #d4d3d3;"></textarea>
								</td>
							</tr>
							<tr>
								<td class="vmiddle title" style="width:195px">04. Attachment<div class="title1">첨부파일 최대 10MB 업로드 가능</div></td>
								<td class="vtop">
									#1 File
								</td>
								<td colspan="3">
									 <div style="position:absolute; margin:0 0 0 412px"><input type="image"  name="send" src="img/apply.png"  ></div>
									 <div class="fileDiv">
											<input class="buttonImg" type="button"/>
											<input class="realFile"  name="userfile[]"  onchange="javascript:document.getElementById('fakeFileTxt').value=this.value" type="file"/>
										</div>
									 <input class="fakeFileTxt" id="fakeFileTxt" readonly type="text">
										
									
								</td>
							</tr>
							<tr>
								<td class="vmiddle" style="width:195px; height:80px;"></td>
								<td class="vtop">
									#2 File
								</td>
								<td colspan="3">
									 <div class="fileDiv">
											<input class="buttonImg" type="button"/>
											<input class="realFile" name="userfile[]"  onchange="javascript:document.getElementById('fakeFileTxt1').value=this.value" type="file"/>
										</div>
									 <input class="fakeFileTxt" id="fakeFileTxt1" readonly type="text">
										
									
								</td>
							</tr>

						</table>
					</div>

					</form>
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->
		<section id="section-5">
			<div class="container">
				<div class="content">
					<div class="img_title"><img src="img/recruit.jpg" alt="recruit"/></div>
					<div class="title_sub">퍼플프렌즈와 함께 통합 디지털 마케팅의 새로운 비전을 만들어 갈 인재를 찾습니다 </div>
					<img src="img/sub5_img.png" style="margin:70px 0"/>
					<div class="s5_link">입사지원 : <a href="mailto:recruit@purplefriends.co.kr">recruit@purplefriends.co.kr </a></div>
					<div class="s5_text">퍼플프렌즈의 모토는 ‘즐겁게 일하는 회사’ 입니다.<br/>
즐겁게 일할 수 있는 회사를 만들기 위해 <span class="color_purple">우리는 PPLSF라는 인재상</span>을 만들었습니다.<br/>
매사에 열정적이고 긍정적이며 타인을 사랑할 줄 알고 <br/>
모든 일을 즐겁게 받아드리는 현명한 사람을<br/>
퍼플프렌즈는 항상 찾고 있습니다.<br/>
</div>
				
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->
		<section id="section-6">
			<div class="container">
				<div class="content">
					<a href="purplefriends_2015.pdf" target="_blank"><div style="position:absolute; width:140px; height:27px; margin:486px 0 0 738px"></div></a>
					<img src="img/sub6_img.png"/>
				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
		<!-- 1번쨰 영역 -->

	</div>
	
	<footer>
		<div class="container">
			<div class="footer1">2014 copyright   <span class="purple_span">Purple Friends.</span> All rights Reserved.</div>
			<div class="footer2">
				2F Olympus tower. 114-9 samsung-dong. kangnam-gu. Seoul. Korea.<br/>
				Tel : 02-515-1174     Fax ; 02-515-1184     
			</div>


		</div>
	</footer>
	
	
</body>
</html>