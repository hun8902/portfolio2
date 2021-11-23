<section id="widget-112">
	<header>
		<p class="title">상담 노트</p>
		<div class="sub_title dp_off">
			<p>(Status of agents)</p>
		</div>
	</header>

	<div class="form_content">
		<div class="obj_label w100">
			<div class="product_list obj w25">
				<!-- 인터넷 상품군을 표시합니다 -->
				<ul>
<?
    $SQL = "select * from INFO_COUNSEL WHERE COUNSEL_TYPE=2 AND CCODE = '1002' AND COUNSEL_CHK=0 ORDER BY COUNSEL_SORT;";
    $RES = mysqli_query($link, $SQL) or die("Error in Selecting " . mysqli_error($link));
    $intI = 0;
    while($ROW = mysqli_fetch_assoc($RES)) {
        $intI++;
?>
                    <li><input type="checkbox" id="poduct1_<?=$intI?>" class="rich_style"><label for="poduct1_<?=$intI?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
<?
    }
?>
				</ul>
			</div>
			<div class="product_list obj w20">
				<!-- TV 상품군을 표시합니다 -->
				<ul>
<?

    $SQL = "select * from INFO_COUNSEL WHERE COUNSEL_TYPE=2 AND CCODE = '1003' AND COUNSEL_CHK=0 ORDER BY COUNSEL_SORT;";
    $RES = mysqli_query($link, $SQL) or die("Error in Selecting " . mysqli_error($link));
    $intJ = 0;
    while($ROW = mysqli_fetch_assoc($RES)) {
    $intJ++;
?>
                    <li><input type="checkbox" id="poduct2_<?=$intJ?>" class="rich_style"><label for="poduct2_<?=$intJ?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
<?
    }
?>
				</ul>
			</div>
			<div class="product_list obj w30">
				<!-- 전화 상품군을 표시합니다 -->
				<ul>
<?
    $SQL = "select * from INFO_COUNSEL WHERE COUNSEL_TYPE=2 AND CCODE = '1003' AND COUNSEL_CHK=0 ORDER BY COUNSEL_SORT;";
    $RES = mysqli_query($link, $SQL) or die("Error in Selecting " . mysqli_error($link));
    $intK = 0;
    while($ROW = mysqli_fetch_assoc($RES)) {
    $intK++;
?>
<?
    }
?>
					<li><input type="checkbox" id="poduct3_1" class="rich_style"><label for="poduct3_1" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화</label></li>
					<li><input type="checkbox" id="poduct3_2" class="rich_style"><label for="poduct3_2" class="mouse_pointer button"><span class="checkbox_label"></span>일반전화(+3000요금제)</label></li>
					<li><input type="checkbox" id="poduct3_3" class="rich_style"><label for="poduct3_3" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+3000요금제)</label></li>
					<li><input type="checkbox" id="poduct3_4" class="rich_style"><label for="poduct3_4" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준요금제)</label></li>
					<li><input type="checkbox" id="poduct3_5" class="rich_style"><label for="poduct3_5" class="mouse_pointer button"><span class="checkbox_label"></span>인터넷전화(+표준영상)</label></li>
				</ul>
			</div>
			<div class="product_list obj w25">
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
		</div>

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
</section><!-- widget-102 end -->