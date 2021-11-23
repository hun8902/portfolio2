<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<meta name="copyright" content="2017 copyright &amp; copy; KLCNS, all right reserved.">
<title>CALLRABi&trade; : Agent</title>

<link rel="shortcut icon" type="image/x-icon" href="/res/img/favicon_klcns.ico">
<!-- CSS Linked -->
<link rel="stylesheet" media="screen" href="../res/css/font.css">
<link rel="stylesheet" media="screen" href="../res/css/normalize.css">
<link rel="stylesheet" media="screen" href="../res/css/common.agent.css">
<link rel="stylesheet" media="screen" href="../res/css/selectric.css">

<!-- Javascript Linked -->
<script type="text/javascript" src="../res/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../res/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.selectric.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.stickytableheaders.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.tablesorter.min.js"></script>

<script type="text/javascript" src="../res/js/common.js"></script>
<script type="text/javascript" src="../res/js/jHelper.js"></script>

<script type="text/javascript" src="../res/js/audio-player.js?v=180718a"></script>
<script type="text/javascript" src="../res/js/number-field.js?v=180719b"></script>

<script type="text/javascript">
		$(function(){
			// 탭 레이아웃
			$("#top_tabs").tabs();
		});

		window.addEventListener("aaaaa",function(){alert("aaaa")});

		function getAgentCode() {

			if ($("#AGENT_CODE").length > 0) {
				return $("#AGENT_CODE").val();
			} else {
				return parent.$("#AGENT_CODE").val();
			}
		}
</script>
</head>

<body class="agent">
	
	<article>

		<section id="top_tabs" class="clear">
			<ul>
				<li><a href="#tab_0">수&nbsp;&nbsp;&nbsp;신&nbsp;</a></li>
				<li><a href="#tab_1">발&nbsp;&nbsp;&nbsp;신&nbsp;</a></li>
			</ul>
			<div id="tab_0">
				<section class="query">
					<form name="cdrInquiry" id="cdrInquiry" action="">
						<!-- 아래 선택된 날짜는 자동으로 "dateFrom"과 "dateTo" 필드에 Set 하도록 구현되어야 합니다 -->
						<div class="obj w25 dp_off">
							<!-- 초기 페이지 로딩시엔 기본 설정이 오늘(Today)로 반영되도록 부탁합니다 -->
							<label class="label_top">A. 검색 기간 : 오늘로부터</label>
							<input type="radio" name="dateRange" id="dateRangeToday" class="normal" value="T" checked="checked">
							<label for="dateRangeToday" class="checkbox_label"><span class="radio_normal"></span>오늘</label>
							<input type="radio" name="dateRange" id="dateRangeThisWeek" class="normal" value="W">
							<label for="dateRangeThisWeek" class="checkbox_label"><span class="radio_normal"></span>1주</label>
							<input type="radio" name="dateRange" id="dateRangeThisMonth" class="normal" value="M">
							<label for="dateRangeThisMonth" class="checkbox_label"><span class="radio_normal"></span>1개월</label>
							<input type="radio" name="dateRange" id="dateRange3Month" class="normal display_1500_over" value="TM">
							<label for="dateRange3Month" class="checkbox_label margin_none"><span class="radio_normal"></span>3개월</label>
						</div>
						<div class="obj w8">
							<!-- 날짜 선택 -->
							<label class="label_top">A. 검색 날짜</label>
							<select id="" name="">
								<option value="0" selected>오늘</option>
								<option value="1">1주</option>
								<option value="2">1개월</option>
								<option value="3">3개월</option>
							</select>
						</div>
						<div class="w20">
							<div class="obj w50">
								<label class="help label_top" for="dateFrom" title="기간 검색은 최대 3개월의 범위를 초과할 수 없으며 누적 데이터 크기에 따라 시스템에 영향을 미칠 수 있습니다">B. 시작 일</label>
								<input type="text" name="dateFrom" id="dateFrom" value="">
							</div>
							<div class="obj w50">
								<label for="dateTo" class="label_top">~ 종료 일</label>
								<input type="text" name="dateTo" id="dateTo" value="">
							</div>
						</div>
						<div class="obj w25">
							<div class="obj w45 padding_bottom_none">
								<!-- 키워드 검색 -->
								<label class="label_top">G. 검색<span>(조건선택)</label>
								<select id="" name="">
									<option value="0" selected>Define data 0</option>
									<option value="1">Define data 1</option>
									<option value="2">Define data 2</option>
									<option value="3">Define data 3</option>
									<option value="4">Define data 4</option>
								</select>
							</div>
							<div class="obj w55 padding_bottom_none">
								<label for="searchInput" class="label_top">&nbsp;<span>(검색어 입력)</span></label>
								<input type="text" name="searchInput" id="searchInput" value="">
							</div>
						</div>
						<div class="w20">
							<div class="obj w100">
							<label class="label_top">&nbsp;</label>
							<button class="blue h26" name="">검색</button>
							</div>
						</div>
					</form><!-- cdrInquiry end -->
				</section>
				

				<!-- 상담 노트 목록 그리드 -->
				<div class="section_wrap_l60 fax_sms  ">
					<section>
						<div class="content h720" id="widget-500">
							<table id="table-500" class="tablesorter">
								<thead>
									<tr>
										<th class="sort">등록일시</th>
										<th class="sort">대표번호</th>
										<th class="sort">FAX 번호</th>
										<th>수신여부</th>
										<th class="sort">메모</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>


									
								</tbody>
							</table>
							<footer class="">
								<!-- 그리드 네비게이션 -->
								<div class="grid_nav_btn_wrap">
									<a class="grid_nav_btn first">
										<i class="material_icons px_18">first_page</i>
									</a>
									<a class="grid_nav_btn prev">
										<i class="material_icons px_18">chevron_left</i>
									</a>
									<a class="grid_nav_btn active">1</a>
									<a class="grid_nav_btn">2</a>
									<a class="grid_nav_btn">3</a>
									<a class="grid_nav_btn">4</a>
									<a class="grid_nav_btn">5</a>
									<a class="grid_nav_btn">6</a>
									<a class="grid_nav_btn">7</a>
									<a class="grid_nav_btn">8</a>
									<a class="grid_nav_btn">9</a>
									<a class="grid_nav_btn">10</a>
									<a class="grid_nav_btn next">
										<i class="material_icons px_18">chevron_right</i>
									</a>
									<a class="grid_nav_btn last">
										<i class="material_icons px_18">last_page</i>
									</a>
								</div>
								<button class="right dp_off" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</section>
				</div><!-- section_wrap_l50 end -->

				<!-- 상담 노트 보기 -->
				<div class="section_wrap_r40 fax_sms" id="">
					<section>
						<div class="form_content h720">
							<div class=" w100">
								<textarea name="" id="" class="h560 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>
							<div class="obj w100 line_tb">
								<div class="faxsms_btn">
									<button class="box_style " type="button" name="" onclick="">인    쇄</button>
									<button class="box_style cyon" type="button" name="" onclick="">다운로드</button>
								</div>
							</div>
					
						</div><!-- form_content end -->
						
						<div class="footer">							
							<div class="obj_label w15 padding_none">
								<label for="">메모</label>
							</div>
							<div class="obj w70">
								<input type="text" name="" id="" value="">
							</div>
							<div class="obj w15">
								<button class="box_style blue" type="button" name="" onclick="">저 장</button>
							</div>
						</div>
					</section>
				</div><!-- section_wrap_r50 end -->

			</div>
			<div id="tab_1">
				<section class="query">
					<form name="cdrInquiry" id="cdrInquiry" action="">
						<!-- 아래 선택된 날짜는 자동으로 "dateFrom"과 "dateTo" 필드에 Set 하도록 구현되어야 합니다 -->
						<div class="obj w25 dp_off">
							<!-- 초기 페이지 로딩시엔 기본 설정이 오늘(Today)로 반영되도록 부탁합니다 -->
							<label class="label_top">A. 검색 기간 : 오늘로부터</label>
							<input type="radio" name="dateRange" id="dateRangeToday" class="normal" value="T" checked="checked">
							<label for="dateRangeToday" class="checkbox_label"><span class="radio_normal"></span>오늘</label>
							<input type="radio" name="dateRange" id="dateRangeThisWeek" class="normal" value="W">
							<label for="dateRangeThisWeek" class="checkbox_label"><span class="radio_normal"></span>1주</label>
							<input type="radio" name="dateRange" id="dateRangeThisMonth" class="normal" value="M">
							<label for="dateRangeThisMonth" class="checkbox_label"><span class="radio_normal"></span>1개월</label>
							<input type="radio" name="dateRange" id="dateRange3Month" class="normal display_1500_over" value="TM">
							<label for="dateRange3Month" class="checkbox_label margin_none"><span class="radio_normal"></span>3개월</label>
						</div>
						<div class="obj w8">
							<!-- 날짜 선택 -->
							<label class="label_top">A. 검색 날짜</label>
							<select id="" name="">
								<option value="0" selected>오늘</option>
								<option value="1">1주</option>
								<option value="2">1개월</option>
								<option value="3">3개월</option>
							</select>
						</div>
						<div class="w20">
							<div class="obj w50">
								<label class="help label_top" for="dateFrom" title="기간 검색은 최대 3개월의 범위를 초과할 수 없으며 누적 데이터 크기에 따라 시스템에 영향을 미칠 수 있습니다">B. 시작 일</label>
								<input type="text" name="dateFrom" id="dateFrom" value="">
							</div>
							<div class="obj w50">
								<label for="dateTo" class="label_top">~ 종료 일</label>
								<input type="text" name="dateTo" id="dateTo" value="">
							</div>
						</div>
						<div class="obj w25">
							<div class="obj w45 padding_bottom_none">
								<!-- 키워드 검색 -->
								<label class="label_top">G. 검색<span>(조건선택)</label>
								<select id="" name="">
									<option value="0" selected>Define data 0</option>
									<option value="1">Define data 1</option>
									<option value="2">Define data 2</option>
									<option value="3">Define data 3</option>
									<option value="4">Define data 4</option>
								</select>
							</div>
							<div class="obj w55 padding_bottom_none">
								<label for="searchInput" class="label_top">&nbsp;<span>(검색어 입력)</span></label>
								<input type="text" name="searchInput" id="searchInput" value="">
							</div>
						</div>
						<div class="w20">
							<div class="obj w100">
							<label class="label_top">&nbsp;</label>
							<button class="blue h26" name="">검색</button>
							</div>
						</div>
					</form><!-- cdrInquiry end -->
				</section>
				

				<!-- 상담 노트 목록 그리드 -->
				<div class="section_wrap_l60 fax_sms  ">
					<section>
						<div class="content h720" id="widget-500">
							<table id="table-500" class="tablesorter">
								<thead>
									<tr>
										<th class="sort">등록일시</th>
										<th class="sort">대표번호</th>
										<th class="sort">FAX 번호</th>
										<th>수신여부</th>
										<th class="sort">메모</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>
									<tr>
										<td>20180516 14:23:33</td>
										<td class="line_select">1588-4444</td>
										<td class="out_call_dn">0314560987</td>
										<td>성공</td>
										<td>한림병원</td>
									</tr>


									
								</tbody>
							</table>
							<footer class="">
								<!-- 그리드 네비게이션 -->
								<div class="grid_nav_btn_wrap">
									<a class="grid_nav_btn first">
										<i class="material_icons px_18">first_page</i>
									</a>
									<a class="grid_nav_btn prev">
										<i class="material_icons px_18">chevron_left</i>
									</a>
									<a class="grid_nav_btn active">1</a>
									<a class="grid_nav_btn">2</a>
									<a class="grid_nav_btn">3</a>
									<a class="grid_nav_btn">4</a>
									<a class="grid_nav_btn">5</a>
									<a class="grid_nav_btn">6</a>
									<a class="grid_nav_btn">7</a>
									<a class="grid_nav_btn">8</a>
									<a class="grid_nav_btn">9</a>
									<a class="grid_nav_btn">10</a>
									<a class="grid_nav_btn next">
										<i class="material_icons px_18">chevron_right</i>
									</a>
									<a class="grid_nav_btn last">
										<i class="material_icons px_18">last_page</i>
									</a>
								</div>
								<button class="right dp_off" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</section>
				</div><!-- section_wrap_l50 end -->

				<!-- 상담 노트 보기 -->
				<div class="section_wrap_r40 fax_sms" id="">
					<section>
						<div class="form_content h720">
							<div class=" w100">
								<textarea name="" id="" class="h560 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>
							<div class="obj w100 line_tb">
								<div class="faxsms_btn">
									<button class="box_style " type="button" name="" onclick="">인    쇄</button>
									<button class="box_style cyon" type="button" name="" onclick="">다운로드</button>
								</div>
							</div>
					
						</div><!-- form_content end -->
						
						<div class="footer">							
							<div class="obj_label w15 padding_none">
								<label for="">메모</label>
							</div>
							<div class="obj w70">
								<input type="text" name="" id="" value="">
							</div>
							<div class="obj w15">
								<button class="box_style blue" type="button" name="" onclick="">저 장</button>
							</div>
						</div>
					</section>
				</div><!-- section_wrap_r50 end -->


			</div>
		</section>
		
	</article>
</body>
</html>