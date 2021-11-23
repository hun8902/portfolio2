
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
		$("#table-call-back").tablesorter({
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
	<article>
		<!-- 검색 -->
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
				<div class="obj w1"></div>
				<div class="obj w10">
					<!-- 통화 유형 선택 -->
					<label class="label_top">C. I/O<span>(수발신)</span></label>
					<select id="" name="">
						<option value="0" selected>전체</option>
						<option value="1">수신</option>
						<option value="2">발신</option>
					</select>
				</div>
				<div class="obj w10">
					<!-- 내선 선택 -->
					<label class="label_top">D. 내선</label>
					<select id="" name="">
						<option value="0" selected>전체</option>
						<option value="1">Define data 1</option>
						<option value="2">Define data 2</option>
						<option value="3">Define data 3</option>
						<option value="4">Define data 4</option>
					</select>
				</div>
				<div class="obj w1"></div>
				<div class="obj w25">
					<div class="obj w45 padding_bottom_none">
						<!-- 키워드 검색 -->
						<label class="label_top">E. 검색<span>(조건선택)</label>
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
				<div class="obj">
					<label class="label_top">&nbsp;</label>
					<button class="right" name=""><i class="material_icons px_14">search</i>검색</button>
				</div>
			</form><!-- cdrInquiry end -->
		</section>

		<!-- 통화이력 그리드 -->
		<section>
			<header>
				<p class="title">콜백(Call-Back) 현황</p>
				<!-- 라인수 조정 -->
				<div class=" w10 padding_none right">
					<select id="lineNumber" name="dpLineCnt">
						<option value="25">25줄 보기</option>
						<option value="50">50줄 보기</option>
					</select>
				</div>
			</header>
			<div class="content padding_bottom_none">
				<table id="table-call-back" class="tablesorter">
					<thead>
						<tr>
							<th class="sort">No</th>
							<th class="sort" title="통화연결유형(수신/발신)">I/O</th>
							<th>통화일자</th>
							<th>통화시간</th>
							<th class="sort" title="발신 번호(CID)">Caller</th>
							<th class="sort" title="수신 번호(RID)">Callee</th>
							<th class="sort" title="연결내선">내선</th>
							<th class="sort" key="type1" title="통화 결과(Call result)">결과</th>
							<th title="Ringing time (Seconds)">대기</th>
							<th>통화시작</th>
							<th>통화종료</th>
							<th class="sort" title="Duration time">통화시간</th>
							<th class="center">재생</th>
						</tr>
					</thead>
					<!-- 기본 행 10줄 기준 -->
					<tbody>
						<tr>
							<td>50</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr class="selected">
							<td>49</td>
							<td class="line_select">발신</td>
							<td>2017-07-18</td>
							<td>15:12:31</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8095 (김재현)</td>
							<td>연결성공</td>
							<td>6</td>
							<td>15:12:45</td>
							<td>15:13:25</td>
							<td>00:00:39</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>48</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>47</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>46</td>
							<td class="line_select">발신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>45</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>44</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>43</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>42</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>41</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>40</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
						<tr>
							<td>39</td>
							<td class="line_select">수신</td>
							<td>2017-07-18</td>
							<td>15:28:59</td>
							<td>010-5239-9656</td>
							<td>070-4941-8790</td>
							<td>8092 (문용남)</td>
							<td>연결실패</td>
							<td>11</td>
							<td>00:00:00</td>
							<td>15:29:18</td>
							<td>00:00:00</td>
							<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
						</tr>
					</tbody>
				</table>
				<footer class="relative margin_bottom_none">
					<!-- 그리드 네비게이션 -->
					<div class="grid_nav_btn_wrap ">
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