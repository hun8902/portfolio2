
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
/*
	$(document).ready(function() {
		$("body").css("display","none");
		$("body").fadeIn(1000);
	});
*/
	$(function(){
		/* 셀렉트릭 드롭다운 메뉴 */
		$('select').selectric({
			maxHeight: 200
		});
		// 섹션의 추가 정보 열기
		$(".btn_open_info").click(function(event){
			$(this).next().slideDown();
			$(this).css("display","none");
		});
		// 섹션의 추가 정보 닫기
		$(".btn_close_info").click(function(event){
			$(this).parent("div").css("display","none");
			$(this).parent("div").prev().show();
		});
		// 최상단 알림 영역 닫기
		$('#closeTopAlert').click(function() {
			$('#topAlert').css("display","none");
		});

		// 탭 레이아웃
		$("#tabs").tabs();

		/* 기간 설정을 위한 Date Picker */
		$("#callBackDate-112, #callBackDate-501, #datePicker-101").datepicker({
			defaultDate: 0, changeMonth: false, numberOfMonths: 1, dateFormat: "yy-mm-dd", minDate: 0, maxDate: 30
		});

		/* 통합 통화이력 목록 조회 테이블 Sorter */
		$("#table-500").tablesorter({
			widgets: ['zebra'],
			sortList: [[0,1]],
			headers: { 1: { sorter: false}, 5: { sorter: false}}
		});

		/* 통합 통화이력 목록 조회 테이블 Sticky */
		$('table').stickyTableHeaders({fixedOffset: 0});
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
		<div class="section_wrap_l50">
			<section id="widget-101" class="">
	<header>
		<p class="title">고객 정보</p>
		<div class="w65 right">
			<!-- 검색 유형 선택 -->
			<div class="obj w40">
				<select id="" name="">
					<option value="0" selected>거래처코드</option>
					<option value="1">어떻게 하라고</option>
					<option value="2">목업에 드롭다운</option>
					<option value="3">컨텐츠를</option>
					<option value="4">표시 했어야지</option>
				</select>
			</div>
			<div class="obj w40">
				<input type="text" name="" id="" value="">
			</div>
			<div class="obj w20 padding_right_none">
				<button class="right" name=""><i class="material_icons px_14">search</i>검색</button>
			</div>
		</div>
	</header>

	<div class="form_content">
		<!-- 거래처 코드 -->
		<div class="obj_label w20 padding_none">
			<label for="clientCode">거래처 코드</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientCode" readonly="true" value="A181818">
		</div>

		<!-- 업체명 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">업체명</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" readonly="true" value="대한민국 주식회사">
		</div>

		<!-- 영업상태 -->
		<div class="obj_label w20 padding_none">
			<label for="clientState">영업상태</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientState" readonly="true" value="파리풀풀">
		</div>

		<!-- 대표자명 -->
		<div class="obj_label w20 padding_none">
			<label for="clientCeoName">대표자명</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientCeoName" readonly="true" value="">
		</div>

		<!-- 온라인 계약 -->
		<div class="obj_label w20 padding_none">
			<label for="onlineContract">온라인 계약</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="onlineContract" readonly="true" value="">
		</div>

		<!-- 담당자명 -->
		<div class="obj_label w20 padding_none">
			<label for="clientStaffName">담당자명</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientStaffName" readonly="true" value="">
		</div>

		<!-- 배송코드 -->
		<div class="obj_label w20 padding_none">
			<label for="deleveryCode">배송코드</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="deleveryCode" readonly="true" value="">
		</div>

		<!-- 전화번호(현재 수신된 CID) -->
		<div class="obj_label w20 padding_none">
			<label for="clientTelCid">전화번호</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientTelCid" readonly="true" value="">
		</div>

		<!-- 팩스번호 -->
		<div class="obj_label w20 padding_none">
			<label for="clientFax">팩스번호</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientFax" readonly="true" value="">
		</div>

		<!-- GT-1000 -->
		<div class="obj_label w20 padding_none">
			<label for="gt1000">GT-1000</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="gt1000" readonly="true" value="">
		</div>

		<!-- Date Picker Sample -->
		<div class="obj_label w20 padding_none">
			<label for="datePicker-101">날짜선택</label>
		</div>
		<div class="obj w30">
			<input type="text" name="datePicker-101" id="datePicker-101" value="">
		</div>

		<!-- 주소 -->
		<div class="clear obj_label w20 padding_none">
			<label for="clientAddress">주소</label>
		</div>
		<div class="obj w80">
			<input type="text" name="" id="clientAddress" readonly="true" value="">
		</div>
	</div><!-- form_content end -->

	<footer>
		<button class="right" name="" id="openClientMoreInfo"><i class="material_icons px_14">find_in_page</i>상세보기</button>
	</footer>
</section><!-- widget-101 end -->

<!------------------------------------------------------------------------------------
	고객정보 상세 보기
-------------------------------------------------------------------------------------->
	<!-- 고객정보 상세 뷰 팝업 다이얼로그 -->
	<script>
	$(function(){
		$("#openClientMoreInfo").click(function(){
			$("#clientMoreInfo-view").addClass("on");
			$("#clientMoreInfo-view").draggable({handle: ".popup_header p"}, {containment: "article"});
		});
	
		$("#closeClientMoreInfo-view").click(function(){
			$("#clientMoreInfo-view").removeClass("on");
		});
	});
	</script>
	<section id="clientMoreInfo-view" class="">
		<div class="popup_header">
			<p>[View] 고객 정보 상세</p>
			<div id="closeClientMoreInfo-view" class="popup_close"><i class="material_icons">close</i></div>
		</div><!-- popup_header end -->
	
		<div class="popup_content">
			<div class="form_content">
				<!-- 거래처 코드 -->
				<div class="obj_label w20 padding_none">
					<label for="clientCode">거래처 코드</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientCode" readonly="true" value="A181818">
				</div>
		
				<!-- 업체명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientName">업체명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientName" readonly="true" value="대한민국 주식회사">
				</div>
		
				<!-- 영업상태 -->
				<div class="obj_label w20 padding_none">
					<label for="clientState">영업상태</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientState" readonly="true" value="파리풀풀">
				</div>
		
				<!-- 대표자명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientCeoName">대표자명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientCeoName" readonly="true" value="">
				</div>
		
				<!-- 온라인 계약 -->
				<div class="obj_label w20 padding_none">
					<label for="onlineContract">온라인 계약</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="onlineContract" readonly="true" value="">
				</div>
		
				<!-- 담당자명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientStaffName">담당자명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientStaffName" readonly="true" value="">
				</div>
		
				<!-- 배송코드 -->
				<div class="obj_label w20 padding_none">
					<label for="deleveryCode">배송코드</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="deleveryCode" readonly="true" value="">
				</div>
		
				<!-- 전화번호(현재 수신된 CID) -->
				<div class="obj_label w20 padding_none">
					<label for="clientTelCid">전화번호</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTelCid" readonly="true" value="">
				</div>
		
				<!-- 팩스번호 -->
				<div class="obj_label w20 padding_none">
					<label for="clientFax">팩스번호</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientFax" readonly="true" value="">
				</div>
		
				<!-- GT-1000 -->
				<div class="obj_label w20 padding_none">
					<label for="gt1000">GT-1000</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="gt1000" readonly="true" value="">
				</div>
		
				<!-- 주소 -->
				<div class="obj_label w20 padding_none">
					<label for="clientAddress">주소</label>
				</div>
				<div class="obj w80" style="padding-bottom: 12px;"><!-- 어쩔 수 없이 강제로 넣은 CSS 태그 ㅠㅠ -->
					<input type="text" name="" id="clientAddress" readonly="true" value="">
				</div>

				<!-- 전화번호 01 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel01">전화번호 1</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel01" readonly="true" value="">
				</div>

				<!-- 전화번호 02 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel02">전화번호 2</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel02" readonly="true" value="">
				</div>

				<!-- 전화번호 03 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel03">전화번호 3</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel03" readonly="true" value="">
				</div>

				<!-- 전화번호 04 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel04">전화번호 4</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel04" readonly="true" value="">
				</div>

				<!-- 전화번호 05 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel05">전화번호 5</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel05" readonly="true" value="">
				</div>

				<!-- 전화번호 06 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel06">전화번호 6</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel06" readonly="true" value="">
				</div>

				<!-- 전화번호 07 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel07">전화번호 7</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel07" readonly="true" value="">
				</div>

				<!-- 전화번호 08 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel08">전화번호 8</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel08" readonly="true" value="">
				</div>

				<!-- 전화번호 09 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel09">전화번호 9</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel09" readonly="true" value="">
				</div>

				<!-- 전화번호 10 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel10">전화번호 10</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel10" readonly="true" value="">
				</div>
				<!-- <div class="clear" style="height: 600px;">높이 범위 초과 시 스크롤바 상태 확인을 위한 공백</div> -->
			</div><!-- form_content end -->
		</div><!-- popup_content end -->

		<div class="popup_footer">
			<button class="right" name="" id="openClientMoreInfo-edit"><i class="material_icons px_14">edit</i>수정</button>
		</div>
	</section><!-- clientMoreInfo-view end -->

	<!-- 고객정보 상세 편집모드 팝업 다이얼로그 -->
	<script>
	$(function(){
		$("#openClientMoreInfo-edit").click(function(){
			$("#clientMoreInfo-view").removeClass("on");
			$("#clientMoreInfo-edit").addClass("on");
			$("#clientMoreInfo-edit")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: "body"});
		});
	
		$("#closeClientMoreInfo-edit").click(function(){
			$("#clientMoreInfo-edit").removeClass("on");
		});

		$("#cancelClientMoreInfo-edit, #saveClientMoreInfo-edit").click(function(){
			$("#clientMoreInfo-edit").removeClass("on");
			$("#clientMoreInfo-view").addClass("on");
		});
	});
	</script>
	<section id="clientMoreInfo-edit" class="">
		<div class="popup_header">
			<p>[Edit] 고객 정보 상세</p>
			<div id="closeClientMoreInfo-edit" class="popup_close"><i class="material_icons">close</i></div>
		</div><!-- popup_header end -->
	
		<div class="popup_content">
			<div class="form_content">
				<!-- 거래처 코드 -->
				<div class="obj_label w20 padding_none">
					<label for="clientCodeEdit">거래처 코드</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientCodeEdit" value="A181818">
				</div>
		
				<!-- 업체명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientNameEdit">업체명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientNameEdit" value="대한민국 주식회사">
				</div>
		
				<!-- 영업상태 -->
				<div class="obj_label w20 padding_none">
					<label for="clientStateEdit">영업상태</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientStateEdit" value="파리풀풀">
				</div>
		
				<!-- 대표자명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientCeoNameEdit">대표자명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientCeoNameEdit" value="">
				</div>
		
				<!-- 온라인 계약 -->
				<div class="obj_label w20 padding_none">
					<label for="onlineContractEdit">온라인 계약</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="onlineContractEdit" value="">
				</div>
		
				<!-- 담당자명 -->
				<div class="obj_label w20 padding_none">
					<label for="clientStaffNameEdit">담당자명</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientStaffNameEdit" value="">
				</div>
		
				<!-- 배송코드 -->
				<div class="obj_label w20 padding_none">
					<label for="deleveryCodeEdit">배송코드</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="deleveryCodeEdit" value="">
				</div>
		
				<!-- 전화번호(현재 수신된 CID) -->
				<div class="obj_label w20 padding_none">
					<label for="clientTelCidEdit">전화번호</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTelCidEdit" value="">
				</div>
		
				<!-- 팩스번호 -->
				<div class="obj_label w20 padding_none">
					<label for="clientFaxEdit">팩스번호</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientFaxEdit" value="">
				</div>
		
				<!-- GT-1000 -->
				<div class="obj_label w20 padding_none">
					<label for="gt1000Edit">GT-1000</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="gt1000Edit" value="">
				</div>
		
				<!-- 주소 -->
				<div class="obj_label w20 padding_none">
					<label for="clientAddressEdit">주소</label>
				</div>
				<div class="obj w80" style="padding-bottom: 12px;"><!-- 어쩔 수 없이 강제로 넣은 CSS 태그 ㅠㅠ -->
					<input type="text" name="" id="clientAddressEdit" value="">
				</div>

				<!-- 전화번호 01 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel01Edit">전화번호 1</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel01Edit" value="">
				</div>

				<!-- 전화번호 02 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel02Edit">전화번호 2</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel02Edit" value="">
				</div>

				<!-- 전화번호 03 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel03Edit">전화번호 3</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel03Edit" value="">
				</div>

				<!-- 전화번호 04 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel04Edit">전화번호 4</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel04Edit" value="">
				</div>

				<!-- 전화번호 05 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel05Edit">전화번호 5</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel05Edit" value="">
				</div>

				<!-- 전화번호 06 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel06Edit">전화번호 6</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel06Edit" value="">
				</div>

				<!-- 전화번호 07 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel07Edit">전화번호 7</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel07Edit" value="">
				</div>

				<!-- 전화번호 08 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel08Edit">전화번호 8</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel08Edit" value="">
				</div>

				<!-- 전화번호 09 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel09Edit">전화번호 9</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel09Edit" value="">
				</div>

				<!-- 전화번호 10 -->
				<div class="obj_label w20 padding_none">
					<label for="clientTel10Edit">전화번호 10</label>
				</div>
				<div class="obj w30">
					<input type="text" name="" id="clientTel10Edit" value="">
				</div>
			</div><!-- form_content end -->
		</div><!-- popup_content end -->

		<div class="popup_footer">
			<button class="right green" name="" id="saveClientMoreInfo-edit"><i class="material_icons px_14">save</i>저장</button>
			<button class="right" name="" id="cancelClientMoreInfo-edit"><i class="material_icons px_14">cancel</i>취소</button>
		</div>
	</section><!-- clientMoreInfo-edit end -->		</div><!-- section_wrap_l50 end -->

		<div class="section_wrap_r50">
			<section id="widget-112">
	<header>
		<p class="title">상담 노트</p>
		<div class="sub_title dp_off">
			<p>(Status of agents)</p>
		</div>
	</header>

	<div class="form_content">
		<div class="product_list w100">
			<div class="obj w25 padding_bottom_none">
				<!-- 인터넷 상품군을 표시합니다 -->
				<ul>
					<li><input type="checkbox" id="poduct1_1" class="rich_style"><label for="poduct1_1" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷</label></li>
					<li><input type="checkbox" id="poduct1_2" class="rich_style"><label for="poduct1_2" class="mouse_pointer button"><span class="checkbox_label"></span>기가콤팩트</label></li>
					<li><input type="checkbox" id="poduct1_3" class="rich_style"><label for="poduct1_3" class="mouse_pointer button"><span class="checkbox_label"></span>올레인터넷</label></li>
					<li><input type="checkbox" id="poduct1_4" class="rich_style"><label for="poduct1_4" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷(패밀리)</label></li>
					<li><input type="checkbox" id="poduct1_5" class="rich_style"><label for="poduct1_5" class="mouse_pointer button"><span class="checkbox_label"></span>기가콤팩트(패밀리)</label></li>
					<li><input type="checkbox" id="poduct1_6" class="rich_style"><label for="poduct1_6" class="mouse_pointer button"><span class="checkbox_label"></span>올레인터넷(패밀리)</label></li>
					<li><input type="checkbox" id="poduct1_7" class="rich_style"><label for="poduct1_7" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷(전환)</label></li>
				</ul>
			</div>
			<div class="obj w20 padding_bottom_none">
				<!-- TV 상품군을 표시합니다 -->
				<ul>
					<li><input type="checkbox" id="poduct2_1" class="rich_style"><label for="poduct2_1" class="mouse_pointer button"><span class="checkbox_label"></span>TV10</label></li>
					<li><input type="checkbox" id="poduct2_2" class="rich_style"><label for="poduct2_2" class="mouse_pointer button"><span class="checkbox_label"></span>TV12</label></li>
					<li><input type="checkbox" id="poduct2_3" class="rich_style"><label for="poduct2_3" class="mouse_pointer button"><span class="checkbox_label"></span>TV15</label></li>
					<li><input type="checkbox" id="poduct2_4" class="rich_style"><label for="poduct2_4" class="mouse_pointer button"><span class="checkbox_label"></span>TV19</label></li>
					<li><input type="checkbox" id="poduct2_5" class="rich_style"><label for="poduct2_5" class="mouse_pointer button"><span class="checkbox_label"></span>TV19(Tune)</label></li>
					<li><input type="checkbox" id="poduct2_6" class="rich_style"><label for="poduct2_6" class="mouse_pointer button"><span class="checkbox_label"></span>TV25</label></li>
				</ul>
			</div>
			<div class="obj w30 padding_bottom_none">
				<!-- 전화 상품군을 표시합니다 -->
				<ul>
					<li><input type="checkbox" id="poduct3_1" class="rich_style"><label for="poduct3_1" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화</label></li>
					<li><input type="checkbox" id="poduct3_2" class="rich_style"><label for="poduct3_2" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화(+3000요금제)</label></li>
					<li><input type="checkbox" id="poduct3_3" class="rich_style"><label for="poduct3_3" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+3000요금제)</label></li>
					<li><input type="checkbox" id="poduct3_4" class="rich_style"><label for="poduct3_4" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준요금제)</label></li>
					<li><input type="checkbox" id="poduct3_5" class="rich_style"><label for="poduct3_5" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준영상)</label></li>
				</ul>
			</div>
			<div class="obj w25 padding_bottom_none">
				<!-- 부가서비스 상품군을 표시합니다 -->
				<ul>
					<li><input type="checkbox" id="poduct4_1" class="rich_style"><label for="poduct4_1" class="mouse_pointer button"><span class="checkbox_label"></span>CID</label></li>
					<li><input type="checkbox" id="poduct4_2" class="rich_style"><label for="poduct4_2" class="mouse_pointer button"><span class="checkbox_label"></span>링고</label></li>
					<li><input type="checkbox" id="poduct4_3" class="rich_style"><label for="poduct4_3" class="mouse_pointer button"><span class="checkbox_label"></span>패스콜</label></li>
					<li><input type="checkbox" id="poduct4_4" class="rich_style"><label for="poduct4_4" class="mouse_pointer button"><span class="checkbox_label"></span>모바일</label></li>
					<li><input type="checkbox" id="poduct4_5" class="rich_style"><label for="poduct4_5" class="mouse_pointer button"><span class="checkbox_label"></span>텔레캅</label></li>
					<li><input type="checkbox" id="poduct4_6" class="rich_style"><label for="poduct4_6" class="mouse_pointer button"><span class="checkbox_label"></span>와이브로</label></li>
					<li><input type="checkbox" id="poduct4_7" class="rich_style"><label for="poduct4_7" class="mouse_pointer button"><span class="checkbox_label"></span>기가지니</label></li>
					<li><input type="checkbox" id="poduct4_8" class="rich_style"><label for="poduct4_8" class="mouse_pointer button"><span class="checkbox_label"></span>결합</label></li>
					<li><input type="checkbox" id="poduct4_9" class="rich_style"><label for="poduct4_9" class="mouse_pointer button"><span class="checkbox_label"></span>전화단말(팩스 등)</label></li>
				</ul>
			</div>
		</div><!-- product_list end -->

		<div class="obj_label w20 clear">
			<label for="clienAsking">문의내용</label>
		</div>
		<div class="obj w80">
			<textarea name="clienAsking" id="clienAsking" class="h60 resize_none" maxlength="400" wrap="hard">인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 많이 속에 우리의 칼이다. 작고 오아이스도 앞이 그들은 청춘의 철환하였는가?</textarea>
		</div>

		<!-- 채널구분 -->
		<div class="obj_label w20">
			<label>채널구분</label>
		</div>
		<div class="obj w20">
			<!-- 채널 유형 선택 -->
			<select id="" name="">
				<option value="0" selected>114 호전환</option>
				<option value="1">온라인</option>
			</select>
		</div>

		<!-- 재통화 여부 -->
		<div class="obj_label w20">
			<label>재통화 여부</label>
		</div>
		<div class="obj w40">
			<div class="obj w50">
				<input type="text" name="callBackDate" id="callBackDate" value="">
			</div>
			<div class="obj w50 padding_none">
				<select id="" name="">
					<option value="0" selected>시간선택</option>
					<option value="AM08">오전 8시</option>
					<option value="AM09">오전 9시</option>
					<option value="AM10">오전 10시</option>
					<option value="AM11">오전 11시</option>
					<option value="PM12">오후 12시(정오)</option>
					<option value="PM01">오후 1시</option>
					<option value="PM02">오후 2시</option>
					<option value="PM03">오후 3시</option>
					<option value="PM04">오후 4시</option>
					<option value="PM05">오후 5시</option>
					<option value="PM06">오후 6시</option>
					<option value="PM07">오후 7시</option>
					<option value="PM08">오후 8시</option>
					<option value="PM09">오후 9시</option>
					<option value="PM10">오후 10시</option>
				</select>
			</div>
		</div>

		<div class="obj_label w20">
			<label>상담결과</label>
		</div>
		<div class="obj w80">
			<!--------------------------------------------
				티켓(상담결과) 케이스 아이디 정의
				1)	ticketCase01	가입완료
				2)	ticketCase02	가입문의
				3)	ticketCase03	상품변경
				4)	ticketCase04	기타문의
				5)	ticketCase05	상담보류
			-------------------------------------------->
			<input type="radio" name="ticketResult" id="ticketCase01" class="normal" value="case01" checked="checked">
			<label for="ticketCase01" class="checkbox_label"><span class="radio_normal"></span>가입완료</label>

			<input type="radio" name="ticketResult" id="ticketCase02" class="normal" value="case02">
			<label for="ticketCase02" class="checkbox_label"><span class="radio_normal"></span>가입문의</label>

			<input type="radio" name="ticketResult" id="ticketCase03" class="normal" value="case03">
			<label for="ticketCase03" class="checkbox_label"><span class="radio_normal"></span>상품변경</label>

			<input type="radio" name="ticketResult" id="ticketCase04" class="normal" value="case04">
			<label for="ticketCase04" class="checkbox_label"><span class="radio_normal"></span>기타문의</label>

			<input type="radio" name="ticketResult" id="ticketCase05" class="normal" value="case05">
			<label for="ticketCase05" class="checkbox_label margin_none"><span class="radio_normal"></span>상담보류</label>
		</div>
	</div><!-- form_content end -->

	<footer>
		<button class="right green" name=""><i class="material_icons px_14">save</i>노트 저장</button>
		<button class="right blue" name=""><i class="material_icons px_14">check_circle</i>저장 후 상담대기</button>
		<button class="right" name=""><i class="material_icons px_14">sms</i>SMS</button>
	</footer>
</section><!-- widget-102 end -->		</div><!-- section_wrap_r50 end -->

		<section id="tabs" class="clear">
			<ul>
				<li><a href="#tab_1">상담 이력</a></li>
				<li><a href="#tab_2">공지 사항</a></li>
				<li><a href="#tab_3">통화 이력</a></li>
				<li><a href="#tab_4">SMS 내역</a></li>
			</ul>
			<div id="tab_1">
				<script>
$(function(){
	$("#widget-501-edit").css("display","none");
	
	// 노트 수정 버튼 클릭
	$("#open-widget-501-edit").click(function(event){
		$("#widget-501-view").css("display","none");
		$("#widget-501-edit").slideDown();
	});

	// 노트 저장, 취소 버튼 클릭
	$("#noteSave, #cancelNoteEdit").click(function(event){
		$("#widget-501-edit").css("display","none");
		$("#widget-501-view").slideDown();
	});

	/* 플레이어 관련 */
	$(".player_wrap_open").click(function() {
		$("#player").addClass("on");
		$("#player").draggable({ handle: ".player_header p" }, {containment: "article"});
	});

	$("#player_close").click(function() {
		$("#player").removeClass("on");
		/* $("#player").slideUp(); */
	});
});
</script>

<!-- 탭 1 : 상담 이력(노트)에 관한 그리드 -->
<div class="section_wrap_l50">
	<div class="content" id="widget-500">
		<table id="table-500" class="tablesorter">
			<thead>
				<tr>
					<th class="sort">No</th>
					<th>상담일자</th>
					<th class="sort">전화번호</th>
					<th class="sort">고객명</th>
					<th class="sort">처리자</th>
					<th class="center">재생</th>
				</tr>
			</thead>
			<!-- 기본 행 10줄 기준 -->
			<tbody>
				<tr>
					<td>1107</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍사덕</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1106</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>정진욱</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1105</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1104</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>정진욱</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1103</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>박근혜</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr class="selected">
					<td>1102</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>박근혜</td>
					<td>노은혜</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1101</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>노은혜</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1100</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1099</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
				<tr>
					<td>1098</td>
					<td class="line_select">2017-07-18</td>
					<td class="out_call_dn">010-2894-1862</td>
					<td>홍길동</td>
					<td>이인수</td>
					<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
				</tr>
			</tbody>
		</table>
		<footer class="dp_off">
			<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
		</footer>
	</div><!-- content end -->
</div><!-- section_wrap_l50 end -->

<!-- 상담 노트 보기 -->
<div class="section_wrap_r50" id="widget-501-view">
	<div class="local_wrap">
		<header>
			<p class="title">[View] 상담 노트</p>
			<div class="sub_title dp_off">
				<p>(Status of agents)</p>
			</div>
		</header>
		<div class="form_content">
			<div class="obj_label w20">
				<label for="ticketDate-501">상담일자</label>
			</div>
			<div class="obj w30">
				<input type="text" name="" id="ticketDate-501" readonly="true" value="2017-11-07">
			</div>
			<div class="obj_label w20">
				<label for="ticketAgent-501">처리자</label>
			</div>
			<div class="obj w30">
				<input type="text" name="" id="ticketAgent-501" readonly="true" value="김길현">
			</div>
			<div class="obj_label w20" style="padding-bottom: 6px;">
				<label>상담유형</label>
			</div>
			<div class="w80 selected_products">
				<span>인터넷전화(+3000요금제)</span><span>인터넷전화(+3000요금제)</span>
			</div>
	
			<div class="clear obj_label w20">
				<label for="clienAsking-501">문의내용</label>
			</div>
			<div class="obj w80">
				<textarea name="clienAsking-501" id="clienAsking-501" class="h58 resize_none" maxlength="400" wrap="hard" readonly="true">인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 많이 속에 우리의 칼이다. 작고 오아이스도 앞이 그들은 청춘의 철환하였는가?</textarea>
			</div>

			<!-- 채널구분 -->
			<div class="obj_label w20">
				<label>채널구분</label>
			</div>
			<div class="obj w20">
				<input type="text" name="" id="" readonly="true" value="114 호전환">
			</div>
	
			<!-- 재통화 여부 -->
			<div class="obj_label w20">
				<label>재통화 여부</label>
			</div>
			<div class="obj w40">
				<div class="obj w50">
					<input type="text" name="" id="" readonly="true" value="2018-11-07">
				</div>
				<div class="obj w50 padding_none">
					<input type="text" name="" id="" readonly="true" value="오후 12시">
				</div>
			</div>

			<div class="obj_label w20">
				<label>상담결과</label>
			</div>
			<div class="obj w80">
				<input type="text" name="" id="" readonly="true" value="가입완료">
			</div>
			<footer>
				<button class="right" name="" id="open-widget-501-edit"><i class="material_icons px_14">edit</i>수정</button>
			</footer>
		</div><!-- form_content end -->
	</div><!-- local_wrap end -->
</div><!-- section_wrap_r50 end -->

<!-- 상담 노트 수정 -->
<div class="section_wrap_r50" id="widget-501-edit">
	<div class="local_wrap">
		<header>
			<p class="title">[Edit] 상담 노트</p>
			<div class="sub_title dp_off">
				<p>(Status of agents)</p>
			</div>
		</header>
		<div class="form_content">
			<div class="product_list w100">
				<div class="obj w25 padding_bottom_none">
					<!-- 인터넷 상품군을 표시합니다 -->
					<ul>
						<li><input type="checkbox" id="poduct1_1-501" class="rich_style"><label for="poduct1_1-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷</label></li>
						<li><input type="checkbox" id="poduct1_2-501" class="rich_style"><label for="poduct1_2-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가콤팩트</label></li>
						<li><input type="checkbox" id="poduct1_3-501" class="rich_style"><label for="poduct1_3-501" class="mouse_pointer button"><span class="checkbox_label"></span>올레인터넷</label></li>
						<li><input type="checkbox" id="poduct1_4-501" class="rich_style"><label for="poduct1_4-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷(패밀리)</label></li>
						<li><input type="checkbox" id="poduct1_5-501" class="rich_style"><label for="poduct1_5-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가콤팩트(패밀리)</label></li>
						<li><input type="checkbox" id="poduct1_6-501" class="rich_style"><label for="poduct1_6-501" class="mouse_pointer button"><span class="checkbox_label"></span>올레인터넷(패밀리)</label></li>
						<li><input type="checkbox" id="poduct1_7-501" class="rich_style"><label for="poduct1_7-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가인터넷(전환)</label></li>
					</ul>
				</div>
				<div class="obj w20 padding_bottom_none">
					<!-- TV 상품군을 표시합니다 -->
					<ul>
						<li><input type="checkbox" id="poduct2_1-501" class="rich_style"><label for="poduct2_1-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV10</label></li>
						<li><input type="checkbox" id="poduct2_2-501" class="rich_style"><label for="poduct2_2-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV12</label></li>
						<li><input type="checkbox" id="poduct2_3-501" class="rich_style"><label for="poduct2_3-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV15</label></li>
						<li><input type="checkbox" id="poduct2_4-501" class="rich_style"><label for="poduct2_4-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV19</label></li>
						<li><input type="checkbox" id="poduct2_5-501" class="rich_style"><label for="poduct2_5-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV19(Tune)</label></li>
						<li><input type="checkbox" id="poduct2_6-501" class="rich_style"><label for="poduct2_6-501" class="mouse_pointer button"><span class="checkbox_label"></span>TV25</label></li>
					</ul>
				</div>
				<div class="obj w30 padding_bottom_none">
					<!-- 전화 상품군을 표시합니다 -->
					<ul>
						<li><input type="checkbox" id="poduct3_1-501" class="rich_style"><label for="poduct3_1-501" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화</label></li>
						<li><input type="checkbox" id="poduct3_2-501" class="rich_style"><label for="poduct3_2-501" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화(+3000요금제)</label></li>
						<li><input type="checkbox" id="poduct3_3-501" class="rich_style"><label for="poduct3_3-501" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+3000요금제)</label></li>
						<li><input type="checkbox" id="poduct3_4-501" class="rich_style"><label for="poduct3_4-501" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준요금제)</label></li>
						<li><input type="checkbox" id="poduct3_5-501" class="rich_style"><label for="poduct3_5-501" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준영상)</label></li>
					</ul>
				</div>
				<div class="obj w25 padding_bottom_none">
					<!-- 부가서비스 상품군을 표시합니다 -->
					<ul>
						<li><input type="checkbox" id="poduct4_1-501" class="rich_style"><label for="poduct4_1-501" class="mouse_pointer button"><span class="checkbox_label"></span>CID</label></li>
						<li><input type="checkbox" id="poduct4_2-501" class="rich_style"><label for="poduct4_2-501" class="mouse_pointer button"><span class="checkbox_label"></span>링고</label></li>
						<li><input type="checkbox" id="poduct4_3-501" class="rich_style"><label for="poduct4_3-501" class="mouse_pointer button"><span class="checkbox_label"></span>패스콜</label></li>
						<li><input type="checkbox" id="poduct4_4-501" class="rich_style"><label for="poduct4_4-501" class="mouse_pointer button"><span class="checkbox_label"></span>모바일</label></li>
						<li><input type="checkbox" id="poduct4_5-501" class="rich_style"><label for="poduct4_5-501" class="mouse_pointer button"><span class="checkbox_label"></span>텔레캅</label></li>
						<li><input type="checkbox" id="poduct4_6-501" class="rich_style"><label for="poduct4_6-501" class="mouse_pointer button"><span class="checkbox_label"></span>와이브로</label></li>
						<li><input type="checkbox" id="poduct4_7-501" class="rich_style"><label for="poduct4_7-501" class="mouse_pointer button"><span class="checkbox_label"></span>기가지니</label></li>
						<li><input type="checkbox" id="poduct4_8-501" class="rich_style"><label for="poduct4_8-501" class="mouse_pointer button"><span class="checkbox_label"></span>결합</label></li>
						<li><input type="checkbox" id="poduct4_9-501" class="rich_style"><label for="poduct4_9-501" class="mouse_pointer button"><span class="checkbox_label"></span>전화단말(팩스 등)</label></li>
					</ul>
				</div>
			</div><!-- product_list end -->

			<div class="obj_label w20">
				<label for="clienAsking-501">문의내용</label>
			</div>
			<div class="obj w80">
				<textarea name="clienAsking-501" id="clienAsking-501" class="h60 resize_none" maxlength="400" wrap="hard">인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 많이 속에 우리의 칼이다. 작고 오아이스도 앞이 그들은 청춘의 철환하였는가?</textarea>
			</div>

			<!-- 채널구분 -->
			<div class="obj_label w20">
				<label>채널구분</label>
			</div>
			<div class="obj w20">
				<!-- 채널 유형 선택 -->
				<select id="" name="">
					<option value="0" selected>114 호전환</option>
					<option value="1">온라인</option>
				</select>
			</div>
	
			<!-- 재통화 여부 -->
			<div class="obj_label w20">
				<label>재통화 여부</label>
			</div>
			<div class="obj w40">
				<div class="obj w50">
					<input type="text" name="callBackDate-501" id="callBackDate-501" value="">
				</div>
				<div class="obj w50 padding_none">
					<select id="" name="">
						<option value="0" selected>시간선택</option>
						<option value="AM08">오전 8시</option>
						<option value="AM09">오전 9시</option>
						<option value="AM10">오전 10시</option>
						<option value="AM11">오전 11시</option>
						<option value="PM12">오후 12시(정오)</option>
						<option value="PM01">오후 1시</option>
						<option value="PM02">오후 2시</option>
						<option value="PM03">오후 3시</option>
						<option value="PM04">오후 4시</option>
						<option value="PM05">오후 5시</option>
						<option value="PM06">오후 6시</option>
						<option value="PM07">오후 7시</option>
						<option value="PM08">오후 8시</option>
						<option value="PM09">오후 9시</option>
						<option value="PM10">오후 10시</option>
					</select>
				</div>
			</div>
	
			<div class="obj_label w20">
				<label>상담결과</label>
			</div>
			<div class="obj w80">
				<!--------------------------------------------
					티켓(상담결과) 케이스 아이디 정의
					1)	ticketCase01	가입완료
					2)	ticketCase02	가입문의
					3)	ticketCase03	상품변경
					4)	ticketCase04	기타문의
					5)	ticketCase05	상담보류
				-------------------------------------------->
				<input type="radio" name="ticketResult-501" id="ticketCase01-501" class="normal" value="case01" checked="checked">
				<label for="ticketCase01-501" class="checkbox_label"><span class="radio_normal"></span>가입완료</label>
	
				<input type="radio" name="ticketResult-501" id="ticketCase02-501" class="normal" value="case02">
				<label for="ticketCase02-501" class="checkbox_label"><span class="radio_normal"></span>가입문의</label>
	
				<input type="radio" name="ticketResult-501" id="ticketCase03-501" class="normal" value="case03">
				<label for="ticketCase03-501" class="checkbox_label"><span class="radio_normal"></span>상품변경</label>
	
				<input type="radio" name="ticketResult-501" id="ticketCase04-501" class="normal" value="case04">
				<label for="ticketCase04-501" class="checkbox_label"><span class="radio_normal"></span>기타문의</label>
	
				<input type="radio" name="ticketResult-501" id="ticketCase05-501" class="normal" value="case05">
				<label for="ticketCase05-501" class="checkbox_label margin_none"><span class="radio_normal"></span>상담보류</label>
			</div>
			<footer>
				<button class="right green" name="" id="noteSave"><i class="material_icons px_14">save</i>노트 저장</button>
				<button class="right" name="" id="cancelNoteEdit"><i class="material_icons px_14">cancel</i>취소</button>
			</footer>
		</div><!-- form_content end -->
	</div><!-- local_wrap end -->
</div><!-- section_wrap_r50 end -->			</div>
			<div id="tab_2">
				<div class="content">
					<span>공지 사항</span>
				</div>
			</div>
			<div id="tab_3">
				<div class="content">
					<span>통화 이력</span>
				</div>
			</div>
			<div id="tab_4">
				<div class="content">
					<span>SMS 내역</span>
				</div>
			</div>
		</section><!-- tabs end -->
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