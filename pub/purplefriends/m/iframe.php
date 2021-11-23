<?php
	require_once "include/config.php";
?>


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
	<script language="javascript">
	var REQ; //요청객체용
	var THISPAGE = 1; //현재의 페이지번호(처음열릴경우 1을 갖는다)
	var CURR_SEQ; //현재 읽고있는 게시물번호
	var LISTUNIT=<?php echo $listUnit;?>;
	var PAGEUNIT=<?php echo $pageUnit;?>;
	</script>
	<script src="./js/func.js" language="javascript"></script>
	<script src="./js/common.js" language="javascript"></script>
	<script src="./js/list.js" language="javascript"></script>
	<script src="./js/write.js" language="javascript"></script>
	<script src="./js/view.js" language="javascript"></script>

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
	body{	height:1200px; overflow-x:hidden}
.st-accordion{
    width:100%;

    _min-width:270px;
    margin: 0 auto;
}
.st-accordion ul li{
  

}
.st-accordion ul li:first-child{
    border-top:none;
}
.st-accordion ul li > a{
   
    display: block;
	position: relative;
	outline:none;
    -webkit-transition:  color 0.2s ease-in-out;
	-moz-transition:  color 0.2s ease-in-out;
	-o-transition:  color 0.2s ease-in-out;
	-ms-transition:  color 0.2s ease-in-out;
	transition:  color 0.2s ease-in-out;
}
.st-accordion ul li > a span{
	
	text-indent:-9000px;
	width: 26px;
	height: 14px;
	position: absolute;
	top: 50%;
	right: -26px;
	margin-top: -7px;
	opacity:1;
	-webkit-transition:  all 0.2s ease-in-out;
	-moz-transition:  all 0.2s ease-in-out;
	-o-transition:  all 0.2s ease-in-out;
	-ms-transition:  all 0.2s ease-in-out;
	transition:  all 0.2s ease-in-out;
}
.st-accordion ul li > a:hover{
  text-decoration: none;
  color:#5c159f;
}
.st-accordion ul li > a:hover span{
	opacity:1;
	right: 10px;
}
.st-accordion ul li.st-open > a{
    color: #5c159f;
}
.newsli{
	 width:922; margin:0 0 40px 0
}
.news_arrow{
	background: url(../img/btn_arr_dnld.png) no-repeat ;
	text-indent:-9000px;
	position:absolute;
	right:0;
	font-family:NG;
	font-size:14px;

	width:32px;
	height:32px;
	-webkit-transition:  all 0.2s ease-in-out;
	-moz-transition:  all 0.2s ease-in-out;
	-o-transition:  all 0.2s ease-in-out;
	-ms-transition:  all 0.2s ease-in-out;
	transition:  all 0.2s ease-in-out;
	
}
.st-accordion ul li.st-open > a .news_arrow{
	background: url(../img/btn_arr_dnld_o.png) no-repeat ;
	-webkit-transform:rotate(180deg);
	-moz-transform:rotate(180deg);
    transform:rotate(180deg);
	
	opacity:1;
	
}
.st-content{
    padding: 30px 0px 00px 0px;
}
.st-content p{
    font-size:  16px;
    font-family:  Georgia, serif;
    font-style: italic;
    line-height:  28px;
    padding: 0px 4px 15px 4px; 
}

	</style>
 </head>
 <body onLoad="act_search(1);">
  


	
<div class="wrapper">
	<div id="st-accordion" class="st-accordion">
			<ul>
				<li>
					<a href="#"><div class="st-title"><img src="http://m.purplefriends.co.kr/img/works_m15.png"></div><span class="st-arrow">Open or Close</span></a>
					<div class="st-content"><div class="news_content"><img src="http://m.purplefriends.co.kr/img/work_popup_m15.png"></div></div>
				</li>
				<li>
					<a href="#"><div class="st-title"><img src="http://m.purplefriends.co.kr/img/works_m14.png"></div><span class="st-arrow">Open or Close</span></a>
					<div class="st-content"><div class="news_content"><img src="http://m.purplefriends.co.kr/img/work_popup_m14.png"></div></div>
				</li>
				<li>
					<a href="#"><div class="st-title"><img src="http://m.purplefriends.co.kr/img/works_m13.png"></div><span class="st-arrow">Open or Close</span></a>
					<div class="st-content"><div class="news_content"><img src="http://m.purplefriends.co.kr/img/work_popup_m13.png"></div></div>
				</li>
				<li>
					<a href="#"><div class="st-title"><img src="http://m.purplefriends.co.kr/img/works_m12.png"></div><span class="st-arrow">Open or Close</span></a>
					<div class="st-content"><div class="news_content"><img src="http://m.purplefriends.co.kr/img/work_popup_m12.png"></div></div>
				</li>
		</ul>
	</div>
</div>



	
	<div id="work_open1" style="display:none;">
		<div class="mr_40"><img src="img/m_works.png" alt="works"/></div>
		<div class="title_sub" style="margin:20px 0 20px 40px; "> 전문적이고 보다 창의적인 발상의 통합디지털 마케팅 <br/>서비스를  제공하는 퍼플의 크리에이티브.</div>

	
		<div class="works_mcontent_over">
		<div id="out1"></div>
		</div>
		<div id="out"></div>

		

		<TABLE width="550" style="display:none;">
		<TR>
			<TD align="left">
			<INPUT type="button" id="bt_list" value="목록으로" onClick="act_search(0);">  
			<INPUT type="button" id="bt_write" value="쓰기" onClick="show_write();">  
			</TD>
			
			<TD align="right">
			<SELECT id="search_option" onchange="act_search(0);">
				<OPTION value="title" SELECTED>제목</OPTION>
				<OPTION value="content">내용</OPTION>
				<OPTION value="uname">작성자</OPTION>
			</SELECT>
			<INPUT type="text" autocomplete="off" value="" size="10" id="search_value" onkeyup="act_search(1);">
			<INPUT type="button" id="bt_search" value="검색" onClick="act_search(1);">
			</TD>
		</TR>
		</TABLE>

	<div style="clear:both"></div>
	</div>




 </body>
</html>
