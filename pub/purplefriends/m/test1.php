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
$result = mysql_query("SELECT * FROM bbs ORDER BY `seq` DESC ");
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
	<link rel="stylesheet" href="css/mobile.css">
		<!-- reset -->
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/reset.css">


	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Google CDN jQuery -->
	<script src="js/jquery-1.9.0.min.js"></script>
	
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
	
	


</head>

<body>


	
	
	<div id="content">

		<!-- 1번쨰 영역 -->
		<section id="section-3">
			<div class="container">
				<div class="content">
					<div id="target"></div>  
					<div class="wrapper">
						<div id="st-accordion" class="st-accordion">
								<style>
									.pagination{_margin:0 0 40px 450px; clear:both; height:20px;}
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
										  
											echo '<a href="#">';
											echo '<div><img src="img/' . mysql_result($result, $i, 'title') . '"></div>';
											echo '';
											echo '<div style="clear:both;"></div>';

											echo '<span class="st-arrow">Open or Close</span></a><div class="st-content">';
											echo '<img src="img/' . mysql_result($result, $i, 'content') . '">';
											echo '</div></li>';

											echo 
												"</li>";
										}       
											// close table>
										//echo "</table>";
										echo "</li>";

										echo '<div class="pagination"><ul>';
											if ($total_pages > 1) {
												echo paginate($reload, $show_page, $total_pages);
											}
										echo "</ul></div>";
										 // pagination
									?>
									
									

									
								
							</ul>
						</div>
					</div>
					
					

					



				</div>
			</div>
		</section>
		<!-- 1번쨰 영역 -->
	
	
</body>
</html>