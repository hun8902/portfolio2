<script>
function counsel_save() {

    var poduct1_chked_val = "";
    var poduct2_chked_val = "";
    var poduct3_chked_val = "";
    var poduct4_chked_val = "";
    
    var strQUESTION       = $("#clienAsking").val();                           // 문의내용
    var intCHANNELTYPE    = $("#channeltype").val();                           // 채널구분
    var strCallBackDate   = $("#callBackDate-112").val().replace(/-/g, '');    // 재통화 날짜 ,전화번호 '-' 제거
    var strcallBackHour   = $("#callBackHour").val();                          // 재통화 시간
    var intRESULT_CODE    = $("input:radio[name=ticketResult]:checked").val(); // 상담결과
    
    var strUNIQUE_CODE    = window.parent.$("#UNIQUE_CODE").val();   // 통화 채널번호
    var strCID            = window.parent.$("#CID").val();           // 인입번호
    var strACODE          = window.parent.$("input[name=ACODE]").val(); // 내선번호
    var strCLIENTNO       = window.parent.$("#CLIENTNO").val();
    var intCALLTYPE       = window.parent.$("#CALLTYPE").val();
    var CLIENT_NAME       = window.parent.$("#CLIENT_NAME").val();

    /*
    // test data;
    strCID = "01045678956";
    intCALLTYPE = "1";
    strUNIQUE_CODE = "123456789";
    strCLIENTNO = "1111";
    */
    // CID가 없으면 전화인입이 되지 않은 것임
    if( strCID == "" || strCID == null )
    {
        alert("전화인입이 되지 않았습니다.");
        return false;
    }
    else if(strQUESTION == "" || strQUESTION == null)
    {
        alert("'상담내용' 항목이 선택되지 않았습니다. ");
        //$("#clienAsking").focus();  추후 확인
        return false;
    }
    else if(intCHANNELTYPE == "" || intCHANNELTYPE == null)
    {
        alert("채널구분을 선택하지 않았습니다.");
        return false;
    }
    else if(intRESULT_CODE == "" || intRESULT_CODE == null)
    {
        alert("상담결과를 선택하지 않았습니다.");
        return false;
    }

/*
    console.log("strUNIQUE_CODE : ",strUNIQUE_CODE);
    console.log("strCID : ",strCID);
    console.log("strACODE : ",strACODE);
    console.log("strCLIENTNO : ",strCLIENTNO);
    console.log("CALLTYPE : ",CALLTYPE);

    console.log("CLIENT_NAME : ",CLIENT_NAME);
    return;
*/
    // 저장 조건 확인 할것!
    // 체크박스 선택, 문의 내용 미입력 등

    //인터넷
    $("input:checkbox[name='poduct1']").each(function() {
        if(this.checked) {//checked 처리된 항목의 값
            poduct1_chked_val += ","+ this.value;
        }
    });

    // 첫 콤마제거
    if(poduct1_chked_val.length != 0)
    {
        poduct1_chked_val = poduct1_chked_val.substr(1,poduct1_chked_val.length);
    }

    //TV
    $("input:checkbox[name='poduct2']").each(function() {
        if(this.checked) {//checked 처리된 항목의 값
            poduct2_chked_val += ","+ this.value;
        }
    });

    // 첫 콤마제거
    if(poduct2_chked_val.length != 0)
    {
        poduct2_chked_val = poduct2_chked_val.substr(1,poduct2_chked_val.length);
    }

    //전화
    $("input:checkbox[name='poduct3']").each(function() {
        if(this.checked) {//checked 처리된 항목의 값
            poduct3_chked_val += ","+ this.value;
        }
    });

    // 첫 콤마제거
    if(poduct3_chked_val.length != 0)
    {
        poduct3_chked_val = poduct3_chked_val.substr(1,poduct3_chked_val.length);
    }

    //부가서비스
    $("input:checkbox[name='poduct4']").each(function() {
        if(this.checked) {//checked 처리된 항목의 값
            poduct4_chked_val += ","+ this.value;
        }
    });

    // 첫 콤마제거
    if(poduct4_chked_val.length != 0)
    {
        poduct4_chked_val = poduct4_chked_val.substr(1,poduct4_chked_val.length);
    }

    $.ajax({
        type      : "POST",
        url       : "../DB/insertCounselInfo.php",
        dataType  : "json",
        data      : {"strCOUNSEL_CODE1":poduct1_chked_val,"strCOUNSEL_CODE2":poduct2_chked_val,"strCOUNSEL_CODE3":poduct3_chked_val,"strCOUNSEL_CODE4":poduct4_chked_val,"strQUESTION":strQUESTION,"intCHANNELTYPE":intCHANNELTYPE,"strRECALLYMD":strCallBackDate,"strRECALLHH":strcallBackHour,"intRESULT_CODE":intRESULT_CODE,"strCLIENTNO":strCLIENTNO,"strUNIQUE_CODE":strUNIQUE_CODE,"intCALLTYPE":intCALLTYPE,"strCID":strCID,"strACODE":strACODE},
        async     : false,
        success   : function(result)
        {
            //console.log(result);
            if(result.RETURN_CODE != 0)
            {
                alert(result.RETURN_MSG);
            }
            else
            {
                // 화면 clear
                $("#clienAsking").val("");                 // 문의내용
                $("#callBackDate-112").val("");                // 재통화 날짜
                $("#ticketCase01").prop('checked',true);  // 상담결과
                $('#channeltype').prop('selectedIndex', 0).selectric('refresh');   // 채널구분
                $('#callBackHour').prop('selectedIndex', 0).selectric('refresh');  // 재통화시간
                
                // 체크박스 초기화
                $("input:checkbox[name='poduct1']").removeAttr('checked');
                $("input:checkbox[name='poduct2']").removeAttr('checked');
                $("input:checkbox[name='poduct3']").removeAttr('checked');
                $("input:checkbox[name='poduct4']").removeAttr('checked');
                
                // hidden 값 초기화
                
                //상담내역 조회

            }

            INFO_ARRAY = result;
        },
        error   : function(xhr, textStatus, error)
        {
            console.log(error);
            console.log("insertCounselInfo.php error");

            var jsonObj = {};
            jsonObj.RETURN_CODE = "5000";
            INFO_ARRAY = jsonObj;

        }
    });

}

</script>
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
                    <li><input type="checkbox" id="poduct1_<?=$intI?>" name="poduct1" class="rich_style" value="<?=$ROW["COUNSEL_CODE"]?>"><label for="poduct1_<?=$intI?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
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
                    <li><input type="checkbox" id="poduct2_<?=$intJ?>" name="poduct2" class="rich_style" value="<?=$ROW["COUNSEL_CODE"]?>"><label for="poduct2_<?=$intJ?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
<?
    }
?>
				</ul>
			</div>
			<div class="product_list obj w30">
				<!-- 전화 상품군을 표시합니다 -->
				<ul>
				<ul>
<?
    $SQL = "select * from INFO_COUNSEL WHERE COUNSEL_TYPE=2 AND CCODE = '1004' AND COUNSEL_CHK=0 ORDER BY COUNSEL_SORT;";
    $RES = mysqli_query($link, $SQL) or die("Error in Selecting " . mysqli_error($link));
    $intK = 0;
    while($ROW = mysqli_fetch_assoc($RES)) {
    $intK++;
?>
                    <li><input type="checkbox" id="poduct3_<?=$intK?>" name="poduct3" class="rich_style" value="<?=$ROW["COUNSEL_CODE"]?>"><label for="poduct3_<?=$intK?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
<?
    }
?>
				</ul>
			</div>
			<div class="product_list obj w25">
				<!-- 부가서비스 상품군을 표시합니다 -->
				<ul>
<?
    $SQL = "select * from INFO_COUNSEL WHERE COUNSEL_TYPE=2 AND CCODE = '1005' AND COUNSEL_CHK=0 ORDER BY COUNSEL_SORT;";
    $RES = mysqli_query($link, $SQL) or die("Error in Selecting " . mysqli_error($link));
    $intL = 0;
    while($ROW = mysqli_fetch_assoc($RES)) {
    $intL++;
?>
                    <li><input type="checkbox" id="poduct4_<?=$intL?>" name="poduct4" class="rich_style" value="<?=$ROW["COUNSEL_CODE"]?>"><label for="poduct4_<?=$intL?>" class="mouse_pointer button"><span class="checkbox_label"></span><?=$ROW["COUNSEL_NM"]?></label></li>
<?
    }
?>

				</ul>
			</div>
		</div>

		<div class="obj_label w20 clear">
			<label for="clienAsking">문의내용</label>
		</div>
		<div class="obj w80">
			<textarea name="clienAsking" id="clienAsking" class="h60 resize_none" maxlength="400" wrap="hard"></textarea>
		</div>

		<!-- 채널구분 -->
		<div class="obj_label w20">
			<label>채널구분</label>
		</div>
		<div class="obj w20">
			<!-- 채널 유형 선택 -->
			<select id="channeltype" name="channeltype">
				<option value="1" selected>114 호전환</option>
				<option value="2">온라인</option>
			</select>
		</div>

		<!-- 재통화 여부 -->
		<div class="obj_label w20">
			<label>재통화 여부</label>
		</div>
		<div class="obj w40">
			<div class="obj w50">
				<input type="text" name="callBackDate-112" id="callBackDate-112" value="">
			</div>
			<div class="obj w50 padding_none">
				<select id="callBackHour" name="callBackHour">
					<option value="0" selected>시간선택</option>
					<option value="08">오전 8시</option>
					<option value="09">오전 9시</option>
					<option value="10">오전 10시</option>
					<option value="11">오전 11시</option>
					<option value="12">오후 12시(정오)</option>
					<option value="13">오후 1시</option>
					<option value="14">오후 2시</option>
					<option value="15">오후 3시</option>
					<option value="16">오후 4시</option>
					<option value="17">오후 5시</option>
					<option value="18">오후 6시</option>
					<option value="19">오후 7시</option>
					<option value="20">오후 8시</option>
					<option value="21">오후 9시</option>
					<option value="22">오후 10시</option>
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
			<input type="radio" name="ticketResult" id="ticketCase01" class="normal" value="1" checked="checked">
			<label for="ticketCase01" class="checkbox_label"><span class="radio_normal"></span>가입완료</label>

			<input type="radio" name="ticketResult" id="ticketCase02" class="normal" value="2">
			<label for="ticketCase02" class="checkbox_label"><span class="radio_normal"></span>가입문의</label>

			<input type="radio" name="ticketResult" id="ticketCase03" class="normal" value="3">
			<label for="ticketCase03" class="checkbox_label"><span class="radio_normal"></span>상품변경</label>

			<input type="radio" name="ticketResult" id="ticketCase04" class="normal" value="4">
			<label for="ticketCase04" class="checkbox_label"><span class="radio_normal"></span>기타문의</label>

			<input type="radio" name="ticketResult" id="ticketCase05" class="normal" value="5">
			<label for="ticketCase05" class="checkbox_label margin_none"><span class="radio_normal"></span>상담보류</label>
		</div>
	</div><!-- form_content end -->

	<footer>
		<button class="right green" type="button" name="" onclick="counsel_save();"><i class="material_icons px_14">save</i>노트 저장</button>
		<button class="right blue" type="button" name=""><i class="material_icons px_14">check_circle</i>저장 후 상담대기</button>
		<button class="right" type="button" name=""><i class="material_icons px_14">sms</i>SMS</button>
	</footer>
</section><!-- widget-102 end -->