
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
	<script>
	/* 페이지 로딩 트렌지션 효과 */
	$(function(){
		/* 셀렉트릭 드롭다운 메뉴 */
		$('select').selectric({
			maxHeight: 200
		});

		// 최상단 알림 영역 닫기
		$('#closeTopAlert').click(function() {
			$('#topAlert').css("display","none");
		});

		/* 통합 통화이력 목록 조회 테이블 Sorter */
		$("#table-call").tablesorter({
			widgets: ['zebra'],
			sortList: [[0,1]],
			headers: { 2: { sorter: false}, 3: { sorter: false}, 8: { sorter: false}, 9: { sorter: false}, 10: { sorter: false}, 12: { sorter: false}}
		});

		/* 통합 통화이력 목록 조회 테이블 Sticky */
		$('table').stickyTableHeaders({fixedOffset: 0});

		/* 기간 설정을 위한 Date Picker */
		$("#dateFrom").datepicker({
			defaultDate: 0, changeMonth: false, numberOfMonths: 2, dateFormat: "yy-mm-dd", maxDate: 0,
			onClose: function( selectedDate ) { $( "#dateTo" ).datepicker("option", "minDate", selectedDate ); }
		});
		$("#dateTo").datepicker({
			defaultDate: 0, changeMonth: false, numberOfMonths: 2, dateFormat: "yy-mm-dd", maxDate: 0, /* showButtonPanel: true, */
			onClose: function( selectedDate ) { $( "#dateFrom" ).datepicker("option", "maxDate", selectedDate ); }
		});
	});
	</script>
</head>

<body class="agent">
	<!-- 개발자용 디버깅 데이터 출력시 사용 -->
	<div class="code_debug dp_off">
		1111111	</div>

	<!------------------------------------------------------------------------------------
		아티클
	-------------------------------------------------------------------------------------->
	<article class="h800">
		<!-- 검색 -->
		<section class="query small">
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
					<!-- 갯수 -->
					<select id="" name="">
						<option value="0" selected>20개씩 출력 </option>
						<option value="1">20개씩 출력</option>
						<option value="2">20개씩 출력</option>
						<option value="3">20개씩 출력</option>
					</select>
				</div>
				<div class="obj w8">
					<!-- 페이지 -->
					<select id="" name="">
						<option value="0" selected>1페이지</option>
						<option value="1">2페이지</option>
						<option value="2">3페이지</option>
					</select>
				</div>
				<div class="obj w6">
					 <button type="" class="btn_page " name="">◀</button>
					 <button type="" class="btn_page " name="">▶</button>
				</div>
				<div class="obj w8">
					<!-- 캠페인명 -->
					<select id="" name="">
						<option value="0" selected>캠페인명</option>
						<option value="1">옵션1</option>
						<option value="2">옵션</option>
					</select>
				</div>
				<div class="obj w8">
					<!-- 설문 -->
					<select id="" name="">
						<option value="0" selected>설문</option>
						<option value="1">옵션1</option>
						<option value="2">옵션</option>
					</select>
				</div>
				<div class="obj w8">
					<!-- 통화결과 -->
					<select id="" name="">
						<option value="0" selected>통화결과</option>
						<option value="1">옵션1</option>
						<option value="2">옵션</option>
					</select>
				</div>
				<div class="obj w8">
					<!-- 고객번호 -->
					<select id="" name="">
						<option value="0" selected>고객번호</option>
						<option value="1">옵션1</option>
						<option value="2">옵션</option>
					</select>
				</div>
				<div class="obj w15">
					<div class="obj  padding_bottom_none">
						<input type="text" name="searchInput" id="searchInput" value="">
					</div>
				</div>
				<div class="w8">
					<div class="obj ">
					<button class="blue" name=""><i class="material_icons px_14">search</i>검색</button>
					</div>
				</div>

				 <div class="  right padding_right_none">
                <button type="right" class="excel" name="" onclick="serarchInfo()"><i class="material_icons px_14">search</i>EXCEL</button>
            </div>
			</form><!-- cdrInquiry end -->
		</section>


		
		
		<!-- 라디오버튼 체크 해제 -->
		<script>
		$(function(){
		$('input:radio').parent("li").mousedown(function(e){

		  var $self = $(this);
		  var $radio = $self.find("input:radio");
		  if( $radio.is(':checked') ){
		 
			var uncheck = function(){
			  setTimeout(function(){
			  
				$radio.removeAttr('checked');
				   $self[0].checked = false;

				},0);
			};
			var unbind = function(){
			  $self.unbind('mouseup',up);
			};
			var up = function(){
			  uncheck();
			  unbind();
			};
			$self.bind('mouseup',up);
			$self.one('mouseout', unbind);
		  }
		});
		})
		</script>
		<!-- 라디오버튼 체크 해제 끝 -->

		<!------------------------------------------------------------------------------------
		수정버튼 팝업
		-------------------------------------------------------------------------------------->
		<script>
			function detail_mdf(){
				$("#poll_view").addClass("on");
				$("#poll_view").draggable({handle: ".popup_header p"}, {containment: "article"});
			}
			$(function(){ 
				
				$("#poll_view_close").click(function(){
					$("#poll_view").removeClass("on");
				});
				$("#poll_view_close_foot").click(function(){
					$("#poll_view").removeClass("on");
				});
			});
		</script>
		<section id="poll_view" class="w568">
			<div class="popup_header">
				<p>설문 결과</p>
				<div id="poll_view_close" class="popup_close"><i class="material_icons">close</i></div>
			</div><!-- popup_header end -->
		
			<div class="popup_content">
				<div class="form_content">
					<div class="poll_title">1. 구매한 상품에 대한 품질은 어떻다고 생각하시나요? </div>
					<ul class="pb_20">
						<li>
							<input type="radio" id="r1" name="rr" />
							<label for="r1"><span></span>1. 매우만족 </label>
						</li>
						<li>
							<input type="radio" id="r2" name="rr" />
							<label for="r2"><span></span>2. 만족</label>
						</li>
						<li>
							<input type="radio" id="r3" name="rr" />
							<label for="r3"><span></span>3. 보통</label>
						</li>
						<li>
							<input type="radio" id="r4" name="rr" />
							<label for="r4"><span></span>4. 불만족</label>
						</li>
						<li>
							<input type="radio" id="r5" name="rr" />
							<label for="r5"><span></span>5. 매우 불만족</label>
						</li>
					</ul>

					<div class="poll_title">2. 구매한 상품에 어떤 부분을 만족하시나요? </div>
					<ul class="pb_20">
						<li>
							<input type="radio" id="r21" name="rr1" />
							<label for="r21"><span></span>1. 매우만족 </label>
						</li>
						<li>
							<input type="radio" id="r22" name="rr1" />
							<label for="r22"><span></span>2. 만족</label>
						</li>
						<li>
							<input type="radio" id="r23" name="rr1" />
							<label for="r23"><span></span>3. 보통</label>
						</li>
						<li>
							<input type="radio" id="r24" name="rr1" />
							<label for="r24"><span></span>4. 불만족</label>
						</li>
						<li>
							<input type="radio" id="r25" name="rr1" />
							<label for="r25"><span></span>5. 매우 불만족</label>
						</li>
					</ul>

					<div class="poll_title">2. 구매한 상품에 어떤 부분을 만족하시나요? </div>
					<ul class="pb_20">
						<li>
							<input type="radio" id="r21" name="rr1" />
							<label for="r21"><span></span>1. 매우만족 </label>
						</li>
						<li>
							<input type="radio" id="r22" name="rr1" />
							<label for="r22"><span></span>2. 만족</label>
						</li>
						<li>
							<input type="radio" id="r23" name="rr1" />
							<label for="r23"><span></span>3. 보통</label>
						</li>
						<li>
							<input type="radio" id="r24" name="rr1" />
							<label for="r24"><span></span>4. 불만족</label>
						</li>
						<li>
							<input type="radio" id="r25" name="rr1" />
							<label for="r25"><span></span>5. 매우 불만족</label>
						</li>
					</ul>

					<div class="poll_title">2. 구매한 상품에 어떤 부분을 만족하시나요? </div>
					<ul class="pb_20">
						<li>
							<input type="radio" id="r21" name="rr1" />
							<label for="r21"><span></span>1. 매우만족 </label>
						</li>
						<li>
							<input type="radio" id="r22" name="rr1" />
							<label for="r22"><span></span>2. 만족</label>
						</li>
						<li>
							<input type="radio" id="r23" name="rr1" />
							<label for="r23"><span></span>3. 보통</label>
						</li>
						<li>
							<input type="radio" id="r24" name="rr1" />
							<label for="r24"><span></span>4. 불만족</label>
						</li>
						<li>
							<input type="radio" id="r25" name="rr1" />
							<label for="r25"><span></span>5. 매우 불만족</label>
						</li>
					</ul>

					<div class="poll_title">3. 위 항목 불만족 사유?</div>
					<div class="pb_line pb_20  ml_20">
						<textarea name="" id="" class="h100 resize_none" maxlength="400" wrap="hard" ></textarea>
					</div>
					<div class="clear"></div>
				</div><!-- popup_content end -->
			</div>
		</section><!-- clientMoreInfo-view end -->
		<!--수정버튼 팝업  팝업 끝 -->

		<!-- 통화이력 그리드 -->
		<section>
			<header>
				<p class="title">캠페인 내역</p>
				<!-- 라인수 조정 -->
				<div class=" w10  right">
					<select id="lineNumber" name="dpLineCnt">
						<option value="25">25줄 보기</option>
						<option value="50">50줄 보기</option>
					</select>
				</div>
			</header>
			<div class="content padding_bottom_none">
				<table id="table-call" class="tablesorter">
					<thead>
						<tr>
							<th class="sort">NO</th>
							<th class="sort" title="통화연결유형(수신/발신)">켐페인명</th>
							<th>TEL #1</th>
							<th>고객명</th>
							<th>메모</th>
							<th>설문</th>
							<th class="sort" key="type1" title="통화 결과(Call result)">통화결과</th>
							<th>통화연결</th>
							<th>발신일시</th>
							<th>통시도건수</th>
							<th>통화종료</th>
							<th>내선번호</th>
							<th>상담원명</th>
							<th class="center">재생</th>
						</tr>
					</thead>
					<!-- 기본 행 10줄 기준 -->
					<tbody>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_ok" onclick="detail_mdf()">응답</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_stats">대기</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_no">거부</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_ok" onclick="detail_mdf()">응답</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_stats">대기</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_no">거부</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_ok" onclick="detail_mdf()">응답</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_stats">대기</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_no">거부</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>50</td>
							<td class="line_select">이벤트 행사1</td>
							<td>01032886432</td>
							<td>김고객</td>
							<td></td>
							<td><div class="poll_ok" onclick="detail_mdf()">응답</td>
							<td>연결성공</td>
							<td>Y</td>
							<td>20180614 10:03:40</td>
							<td>1</td>
							<td>45</td>
							<td>1001</td>
							<td>이상담</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						
					</tbody>
				</table>
				<footer class="relative margin_bottom_none">
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
	</article>
</div><!-- wrap end -->

<!-- 녹취파일 플레이어 -->
<script type="text/javascript" src="/res/js/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/res/js/jplayer/player.js"></script>
<script>
$(function() {
	/* 플레이어 관련 */
	$(".player_open").click(function() {
		$("#player").addClass("on");
		$("#player").draggable({ handle: ".player_header p" }, {containment: "article"});
	});

	$("#player_close").click(function() {
		$("#player").removeClass("on").addClass("off");
		player.stop();
		player.init();
		/* $("#player").slideUp(); */
	});
});

function authUser() {
	var parentDialog = $(this);
	var usrPw = $(this).find("#usrPw").val();
	
	if ( isEmptyString(usrPw) ) {
		// show error message
		parentDialog.find(".warning").hide().show("fade");
		parentDialog.find("#usrPw").removeClass("valid").addClass("invalid");
	}
	else {
		var params = $("#player").data("params");
		var downloadLink = $("#player").data("downloadLink");
		params += "&usrPw=" + usrPw;
		
		var ajaxOptions = {
			url : "${pageContext.request.contextPath}/cdr/record/auth.json",
			type: "GET",
			dataType: "json",
			data: "usrPw=" + usrPw,
			success: function(successData, status) {
				if ( successData.resultCode == "succeeded" ) {
					location.href = downloadLink + params;
					parentDialog.dialog("close");
				}
				else {
					parentDialog.find(".warning").hide().show("fade");
					parentDialog.find("#usrPw").removeClass("valid").addClass("invalid");
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				//alert(xhr.responseText);
			}
		};
		$.ajax(ajaxOptions);
	}
}
</script>
<!-- 녹음 파일 청취를 위한 플레이어 -->
<div id="jquery_jplayer_1"></div>
<div id="player" class="off">
	<div class="player_header">
		<p>녹음 재생 (보안을 위해 파일 제목을 표시하지 않습니다)</p>
		<div id="player_close"><i class="material_icons px_20">close</i></div>
	</div><!-- player_header end -->

	<div class="player_body">
		<div class="progress_area">

			<!-- 슬라이더 마커 -->
			<div id="slider-marker" class="display_none">
				<button class='slider-tab-left'><i class="material_icons px_36">arrow_drop_down</i></button>
				<button class='slider-tab-right'><i class="material_icons px_36">arrow_drop_down</i></button>
			</div>

			<!-- 슬라이더 레인지 -->
			<div id="slider-range" class="progress-bg">
				<div class="progress-range"></div>
			</div>

			<!-- 볼륨 조정 -->
			<div class="volume">
				<button class="volume_on"><i class="material_icons px_24">volume_up</i></button>
				<!-- 볼륨 상태가 "Mute" 일때(위 아이콘에서 변경) -->
				<button class="volume_off display_none"><i class="material_icons px_24">volume_off</i></button>
				<div id="slider-range-min"></div>
			</div>

			<!-- 재생진행시간(Current time)과 전체재생시간(Total play time) -->
			<p class="time"><span class="play_time">00:11:07</span>&nbsp;&nbsp;/&nbsp;&nbsp;<span class="total_time">11:07:09</span></p>
		</div><!-- progress_area end -->
	</div><!-- player_body end -->

	<!-- 플레이어 컨트롤 부분 -->
	<div class="console_wrap">
		<div class="col_30">
			<!-- 1. 최초 목록의 "재생" 아이콘 클릭 시 본 플레이어가 팝업되며 자동 플레이됨으로 아래 일시정지 버튼이 노출되는게 맞는 듯 -->
			<button class="pause" title="일시정지" style="display: block"><i class="material_icons px_20">pause</i></button>

			<!-- 2. "일시정지 버튼을 눌렀을 때, "재생" 버튼으로 토글되는게 맞다 -->
			<button class="play" title="재생" style="display: none"><i class="material_icons px_20">play_arrow</i></button>
			<button class="stop" title="멈춤"><i class="material_icons px_20">stop</i></button>
		</div>

		<div class="col_40">
			<button class="repeat" title="반복재생"><i class="material_icons px_20">loop</i></button>
			<button class="part_repeat" title="구간반복"><span>A</span><i class="material_icons px_20">repeat</i><span>B</span></button>
		</div>

		<div class="right">
			<!-- 속도 조절 -->
<!-- 			<button class="fast_play left" title=""><span>1x</span><i class="material_icons px_20">fast_forward</i></button> -->
			<c:if test="${uLevel == '0' or uLevel == '2' or uLevel == '5'}">
			<!-- 다운로드 버튼은 "시스템루트, "관리자" 역할에서만 디스플레이 되어야 합니다 -->
			<button id="modal-open-rec-file-download" class="download margin_none dp_off" title="다운로드"><i class="material_icons px_20">file_download</i></button></c:if>
		</div>
	</div>
	<div class="player_list dp_off">
		<ul>
			<li><a href="#" class="prev">20161009_RECno00001234.mp4</a></li>
			<li><a href="#" class="next">20161009_RECno00001234.mp4</a></li>
		</ul>
	</div>
</div>


<!-- End --></body>
</html>