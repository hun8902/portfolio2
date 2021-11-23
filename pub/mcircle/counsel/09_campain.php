
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="copyright" content="2017 copyright &amp; copy; KLCNS, all right reserved.">
	<title>CALLRABi&trade; : Agent</title>

	<link rel="shortcut icon" type="image/x-icon" href="res/img/favicon_klcns.ico">

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
    
    <script type="text/javascript" src="../res/js/player.js"></script>
	<script defer="defer">
	/* 페이지 로딩 트렌지션 효과 */

	$(document).ready(function() {
//		$("body").css("display","none");
//		$("body").fadeIn(1000);
        LOAD_AGENT_READCNT();

        setInterval(LOAD_AGENT_READCNT, 60000);

	});

	$(function(){
		//공지사항
		$("#notice_popup").addClass("on");
		$("#notice_popup").draggable({handle: ".popup_header p"}, {containment: "article"});


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
		// 탭 레이아웃
		$("#tabs_right").tabs();


        /* 기간 설정을 위한 Date Picker */
        $("#callBackDate-112, #clientJoinYMD").datepicker({
            defaultDate: 0, changeMonth: false, numberOfMonths: 1, dateFormat: "yy-mm-dd", minDate: 0, maxDate: 60
        });

        $("#clientBirthDay").datepicker({
            defaultDate: -4000, changeMonth: true, changeYear: true, numberOfMonths: 1, dateFormat: "yy-mm-dd"
        });

		/* 통합 통화이력 목록 조회 테이블 Sorter */
		$("#table-500").tablesorter({
			widgets: ['zebra'],
			sortList: [[0,1]],
			headers: { 3: { sorter: false}, 5: { sorter: false}}
		});

		/* 통합 통화이력 목록 조회 테이블 Sticky */
		$('table').stickyTableHeaders({fixedOffset: 0});

		/* 상담데스크의 공지사항 목록 조회 테이블 Sorter */
		$("#table-600").tablesorter({
			widgets: ['zebra'], sortList: [[0,1]], headers: { }
		});
	});

    function clearClientInfo(className)
    {
        $("."+className+"").find("input[type=text]").val("");

        $("#searchValue").val("");
    }

    function LOAD_AGENT_READCNT()
    {
        var ACODE = parent.$("#AGENT_CODE").val()

        $.getJSON( "../load/noticeCntGetDB.php",{ACODE:ACODE}, function(data){

            if(data['NEW_NOTICNT'] != null)
            {
                if(data['NEW_NOTICNT'] !=0)
                {
                    $("#newcnt").text('('+data['NEW_NOTICNT']+')');
                    $("#newcnt").removeClass("dp_off");

                    noticeReload();
                }
                else
                {
                    $("#newcnt").addClass("dp_off");
                }
            }  

        });        
    }

	</script>
</head>

<body class="agent">
	<!-- 개발자용 디버깅 데이터 출력시 사용 -->
	<div class="code_debug dp_off">
		1111111	</div>
            <div style="position:absolute;width:300px;height:140px;display:none;background:#ffffff;margin-left:500px;z-index: 1000;" id="PLAYBOX"></div>
	<!------------------------------------------------------------------------------------
		아티클
	-------------------------------------------------------------------------------------->
	<article>
		<div class="section_wrap_l1100">
		<div class="section_wrap_l50 p_r8">
			<script>
function getcacategory(objId, objVal)
{
    var code = $("#"+objId).val();
    var depth = parseInt(objId.replace(/[^0-9]/gi,""))+1;

    objVal = (objVal === undefined ? "":objVal)
    objId = objId.replace(/[0-9]/gi,"");

    //console.log("depth => "+ depth +", code => "+ code);

    $.ajax({
        type      : "POST",
        url       : "../DB/selectCounselTypeList.php",
        dataType  : "json",
        data      : {"CODE":code,"DEPTH":depth},
        async     : false,
        success   : function(result)
        {
            //console.log(result);
            var map = result.INFO_ARRAY;
            var htmlString = "";
            var text = (depth == 2 ? "상품명":"상담유형");

            htmlString = "<option value='0'>== "+ text +" ==</option>";

            for (var i=0; i<map.length; i++)
            {
                if ( objVal == map[i].COUNSEL_CODE)
                {
                    htmlString += "<option value='"+map[i].COUNSEL_CODE+"' selected='selected' >"+map[i].COUNSEL_NM+"</option>";
                }
                else
                {
                    htmlString += "<option value='"+map[i].COUNSEL_CODE+"'>"+map[i].COUNSEL_NM+"</option>";
                }
                
            }

            $("#"+objId+""+depth).empty().append(htmlString).selectric("refresh");
            /*
            소분류
            console.log("elemtId => "+ $("#"+objId+""+depth+"").prop("id") + ", html => " + $("#"+objId+""+depth+"").html());

            if(depth==2)
            {
                console.log("depth => "+ depth);
                depth++;
                htmlString = "<option value='0'>== 소분류 ==</option>";
                $("#"+objId+""+depth+"").empty().append(htmlString).selectric("refresh");
            }           
            */
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("getDB.php error");
             alert("조회 실패");
             return false;
        }       
    });
}

// depth1 선택 시 나머지 자동 선택 되도록 수정
function getcacategory_fix(objId, objVal)
{

    var code = $("#"+objId).val();
    console.log(code);
    var code1 = Number(code)+1000;
    var code2 = Number(code1)+1000;

    getcacategory('depth1', code1);    
    getcacategory('depth2', code2);    
}

function counsel_save()
{
    var strDEPTH1      = $("#depth1").val(); // 상품유형
    var strDEPTH2      = $("#depth2").val(); // 상품명
    var strDEPTH3      = $("#depth3").val(); // 상담유형

    var strQUESTION    = $("#clienAsking").val();                           // 상담내용
console.log(strQUESTION);
    var intRESULT_CODE = $("input:radio[name=ticketResult]:checked").val(); // 상담결과

    var strUNIQUE_CODE = window.parent.$("#UNIQUE_CODE").val();
    console.log("strUNIQUE_CODE",strUNIQUE_CODE)
    var strCID         = window.parent.$("#CID").val();
    var strACODE       = window.parent.$("input[name=ACODE]").val();
    var strCLIENTNO    = window.parent.$("#CLIENTNO").val();
    var intCALLTYPE    = window.parent.$("#CALLTYPE").val();

    var retur_val = false;

    /*
    // CID가 없으면 전화인입이 되지 않은 것임
    if( strCID == '' || strCID == null )
    {
        alert("전화인입이 되지 않았습니다.");
        return false;
    }
    */
    if(strDEPTH1=='' || strDEPTH1==0 || strDEPTH1== null)
    {
        alert("'상품유형' 항목이 선택되지 않았습니다. ");
        //$("#depth1").focus();  추후 확인
        return false;
    }
    else if(strDEPTH2=='' || strDEPTH2==0 || strDEPTH2== null)
    {
        alert("'상품명' 항목이 선택되지 않았습니다. ");
        //$("#depth2").focus();  추후 확인
        return false;
    }
    else if(strDEPTH3=='' || strDEPTH3==0 || strDEPTH3== null)
    {
        alert("'상담유형' 항목이 선택되지 않았습니다. ");
        //$("#depth3").focus();  추후 확인
        return false;
    }
    else if(strQUESTION=='' || strQUESTION== null)
    {
        alert("'상담내용' 항목이 선택되지 않았습니다. ");
        //$("#clienAsking").focus();  추후 확인
        return false;
    }

    if(intRESULT_CODE=='' || intRESULT_CODE==null)
    {
        alert("상담결과를 선택하지 않았습니다.");
        return false;
    }

    $.ajax({
        type      : "POST",
        url       : "../DB/insertCounselInfo.php",
        dataType  : "json",
        data      : {"strUNIQUE_CODE":strUNIQUE_CODE,"intRESULT_CODE":intRESULT_CODE,"strQUESTION":strQUESTION,"strCID":strCID,"strACODE":strACODE,"strCLIENTNO":strCLIENTNO,"intCALLTYPE":intCALLTYPE,"strDEPTH1":strDEPTH1,"strDEPTH2":strDEPTH2,"strDEPTH3":strDEPTH3},
        async     : false,
        success   : function(result)
        {
            console.log("result : ",result);
            if(result.RETURN_CODE!=0)
            {
                alert(result.RETURN_MSG);
            }
            else
            {
                // 화면 clear
                $('#depth1').prop('selectedIndex', 0).selectric('refresh')
                $('#depth2').prop('selectedIndex', 0).selectric('refresh')
                //$("#depth2").empty().append("<option>=중분류=</option>").selectric("refresh");
                //$("#depth3").empty().append("<option>=상담유형=</option>").selectric("refresh");
                $('#depth3').prop('selectedIndex', 0).selectric('refresh')

                $("#clienAsking").val('');
                $("#agentAnswer").val('');
//                $('input:radio[name=ticketResult]').prop('checked', false);
                // 기본은 무조건 "완료" 항목
                $('#ticketCompleted').prop('checked', true);


                window.parent.$("#CID").val("");
                window.parent.$("#CALLTYPE").val("");                
                window.parent.$("#UNIQUE_CODE").val("");
                window.parent.$("#CID").val("");
                
                //clearClientInfo("form_content");

                //상담내역 조회
                historyLoad(strCLIENTNO);
                retur_val = true;
            }
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("setDB.php error");
             alert("DB 입력 실패");             
        }       
    });

    return retur_val;

}

function readyAfterSave()
{
    if(counsel_save())
    {
        window.parent.setAgStateReady();
        window.parent.changColorReady();
    }
}

</script>
<section id="widget-102">
	<header>
		<p class="title dp_off"><i class="material_icons px_24">launch</i>상담 노트</p>
		 <div class="w100  obj ">
            <!-- 검색 유형 선택 -->
            <div class=" w20">
                <select id="infotype" name="infotype">
                    <option value="1" selected>캠페인명</option>
                    <option value="3">옵션1</option>
                    <option value="4">옵션2</option>
                </select>
            </div>
			 <div class=" w20">
                <select id="infotype" name="infotype">
                    <option value="1" selected>상태</option>
                    <option value="3">옵션1</option>
                    <option value="4">옵션2</option>
                </select>
            </div>
            <div class=" w25">
                <!-- <input type="text" name="searchValue" id="searchValue" value="" onkeypress="if(event.keyCode==13) {serarchInfo();}"> -->
				<input type="text" name="searchValue" id="searchValue" value="" readonly="true" onclick="searchValue_popup()">
            </div>
            <div class=" w20 padding_right_none">
                <button type="button" class=" memberdata_sch" name="" onclick="serarchInfo()"><i class="material_icons px_14">search</i>검색</button>
            </div>
        </div>
		<div class="sub_title dp_off">
			<p>(Status of agents)</p>
		</div>
	</header>

	<div class="form_content mlr_10">
		<div class="h260 scroll-y">
			<div class="content " id="" >
				<table id="" class="tablesorter">
					<thead>
						<tr>
							<th>No</th>
							<th class="sort">이름</th>
							<th class="sort">상태</th>
							<th class="sort">TEL #1</th>
							<th class="sort">처리일시</th>
						</tr>
					</thead>
					<!-- 기본 행 10줄 기준 -->
					<tbody>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
						<tr>
							<td>1</td>
							<td>이인수</td>
							<td>완료</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td class="line_select">20180530</td>
						</tr>
					</tbody>
				</table>
				<footer class="dp_off">
					<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
				</footer>
			</div><!-- content end -->
		</div>
		<div class="pt_10">
			<!-- 특이사항 -->
			<div class="obj_label w20 padding_none">
				<label for="clientAddress">메 모</label>
			</div>
			<div class="obj w80">
				<textarea name="" id="" class="h48 resize_none" maxlength="400" wrap="hard"></textarea>
			</div>
		</div>
	</div><!-- form_content end -->

	
</section><!-- widget-102 end -->
		</div><!-- section_wrap_r50 end -->


		<div class="section_wrap_r50">
			<script>
    function loadInfo(type,searchValue)
    {
        var rt_value = window.parent.getClientInfo(type, searchValue);

        var strBIRTHDAY = "";
        var strCLIENTNO = "";
        var strJOINYMD  = "";
        var strMEMO     = "";

        var strNAME     = "";
        var strPRODUCT  = "";
        var strREGDATE  = "";
        var strTEL1     = "";
        var strTEL2     = "";

        var strUPDDATE  = "";
        var intUSESTATE = "";
        var strADDRESS  = "";

        if(rt_value.RETURN_CODE==0)
        {
            strBIRTHDAY = rt_value.INFO_ARRAY[0].BIRTHDAY||"";
            strCLIENTNO = rt_value.INFO_ARRAY[0].CLIENTNO||"";
            strJOINYMD  = rt_value.INFO_ARRAY[0].JOINYMD||"";
            strMEMO     = rt_value.INFO_ARRAY[0].MEMO||"";

            strNAME     = rt_value.INFO_ARRAY[0].NAME||"";
            strPRODUCT  = rt_value.INFO_ARRAY[0].PRODUCT||"";
            strREGDATE  = rt_value.INFO_ARRAY[0].REGDATE||"";
            strTEL1     = rt_value.INFO_ARRAY[0].TEL1||"";
            strTEL2     = rt_value.INFO_ARRAY[0].TEL2||"";

            strAddress    = rt_value.INFO_ARRAY[0].ADDRESS;
            strUPDDATE  = rt_value.INFO_ARRAY[0].UPDDATE||"";
            intUSESTATE = rt_value.INFO_ARRAY[0].USESTATE||"";

            if(strBIRTHDAY != "") {
                strBIRTHDAY = strBIRTHDAY.substring(0, 4).toString() + "-" + strBIRTHDAY.substring(4, 6).toString() + "-" + strBIRTHDAY.substring(6).toString();
            }


            if(strJOINYMD != "") {
                strJOINYMD = strJOINYMD.substring(0, 4).toString() + "-" + strJOINYMD.substring(4, 6).toString() + "-" + strJOINYMD.substring(6).toString();
            }

            $("#clientName").val(strNAME);         // 고객이름
            $("#clientBirthDay").val(strBIRTHDAY); // 생년월일
            $("#clientMemo").val(strMEMO);         // 메모
            $("#clientProduct").val(strPRODUCT);   // 상품명

            $("#clientTel1").val(strTEL1);       // 전화번호1
            $("#clientTel2").val(strTEL2);       // 전화번호2
            $("#clientJoinYMD").val(strJOINYMD); // 가입신청일
            $("#clientAddress").val(strAddress); // 주소

            // 조회이력 기록
            window.parent.$("#CLIENTNO").val(strCLIENTNO);
            $("#saveClientInfo").addClass("dp_off");    // 저장버튼 숨김
            $("#editClientInfo").removeClass("dp_off"); // 수정버트 노출

            // counsel/index.php hidden value
            window.parent.$("#CLIENTNO").val(strCLIENTNO);
            window.parent.$('#CLIENT_NAME').val(strNAME);
            window.parent.$('#CID').val(strTEL1);

            if(window.parent.$('#PAGETYPE').val()== "1" || window.parent.$('#PAGETYPE').val()== "")
            {
                // 상담이력 조회
                historyLoad(strCLIENTNO);

                // 통화이력 조회
                var strAllTelNo = "";
                if($.trim(strTEL1))
                {
                    strAllTelNo += ",'"+strTEL1.replace(/-/gi,"")+"'";
                }
                if($.trim(strTEL2))
                {
                    strAllTelNo += ",'"+strTEL2.replace(/-/gi,"")+"'";
                }

                // 고객사 모든 전화번호 목록
                var strTelData = strAllTelNo.substring(1,strAllTelNo.length);
                //console.log(teldata);
                callHistoryLoad(strTelData);

                // OCX 상단에 번호 입력
                window.parent.$("#inputDn").val(strTEL1.replace(/-/gi,""));
                // 상담이력 등 조회로직 추가
                /*
                //SMS 번호 인입 처리
                var inputDn = window.parent.$("#inputDn").val();
                $("#smsReceiver-700-edit").val(inputDn);
                */
            }

            //clearDetail();
        }
        else
        {
            alert("데이터가 존재하지 않습니다.");
        }
    }

    function serarchInfo()
    {
        var infotype    = $("#infotype").val();
        var searchValue = $("#searchValue").val().trim();

        if(searchValue == "")
        {
            alert("검색할 데이터를 입력하지 않았습니다.");
            $("#searchValue").focus();
            return false;
        }

        //조회
        chkLowCnt(infotype, searchValue);
    }

    // 팝업 여러개 노출
    function ClientDataLikeSearch(type, CLIENTINFO)
    {
        var INFO_ARRAY;

        $.ajax({
            type      : "POST",
            url       : "../DB/select_popupLike.php",

            data      : {"TYPE":type,"CLINFO":CLIENTINFO},
            async     : false,
            success   : function(html)
            {
                window.parent.$("#cidPopupOverlap").html(html);


                window.parent.$("#cidPopupOverlap").addClass("on");
                window.parent.$("#cidPopupOverlap")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});

            },
            error   : function(xhr, textStatus, error)
            {
                console.log(error);
                console.log("getDB.php error");
                //alert("조회 실패");
                var jsonObj = {};
                jsonObj.RETURN_CODE = "5000";
                INFO_ARRAY = jsonObj;

            }
        });
    }

    function chkLowCnt(type, searchValue)
    {
        //console.log("chkLowCnt type", type);
        //console.log("chkLowCnt searchValue", searchValue);

        // type : 1:고객이름, 2:고객번호, 3:상품명, 4:연락처
        var return_value = 0;
        var INFO_ARRAY;
        var LOWCNT;
        var CLIENTNO;

        $.ajax({
            type      : "POST",
            url       : "../DB/selectClientMany.php",
            dataType  : "json",
            data      : {"TYPE":type, "SEARCHVALUE":searchValue},
            async     : false,
            success   : function(result)
            {
                /*
                console.log(result);
                console.log(JSON.stringify(result.INFO_ARRAY[0]));
                */
                return_value = result.INFO_ARRAY[0].LOWCNT||""
                //INFO_ARRAY = result;

                LOWCNT   = result.INFO_ARRAY[0].LOWCNT||"";
                CLIENTNO = result.INFO_ARRAY[0].CLIENTNO||"";

                //console.log("LOWCNT ",LOWCNT);
                //console.log("CLIENTNO ",CLIENTNO);

                if(LOWCNT==1)
                {
                    //console.log(CLIENTNO);
                    if(CLIENTNO!="")
                    {
                        // 화면에 정보 노출
                        loadInfo(2,CLIENTNO);
                    }
                    else
                    {
                        ClientDataLikeSearch(type, searchValue);
                    }
                }
                else
                {
                    ClientDataLikeSearch(type, searchValue);
                }

            },
            error   : function(xhr, textStatus, error)
            {
                console.log(error);
                console.log("chkLowCnt() selectClientMany.php error");
                //alert("조회 실패");
                var jsonObj = {};
                jsonObj.RETURN_CODE = "5000";
                INFO_ARRAY = jsonObj;

            }
        });

        return return_value;
    }


    $(function(){
        $("#clientTelCid").on("click", function(){
            var CID = $("#clientTelCid").val().replace(/-/gi,"");
            window.parent.$("#inputDn").val(CID);
        });

        $("#TrueView").on("click", function(){
            var CID = $("#TrueView").val().replace(/-/gi,"");
            window.parent.$("#inputDn").val(CID);
        });

        $("#infotype").change(function(event) {
            $("#searchValue").val("");
        });
        /*
            // 고객정보 초기화
            $("#renewClientInfo").click(function () {
                $("#clientName").val("");
                $("#clientBirthDay").val("");
                $("#clientProduct").val("");
                $("#clientTel1").val("");
                $("#clientTel2").val("");
                $("#clientJoinYMD").val("");
                $("#clientHopeYMD").val("");
                $("#clientMemo").val("");
                $("#clientNo").val("");

                $("#saveClientInfo").removeClass("dp_off"); // 저장버튼 노출
                $("#editClientInfo").addClass("dp_off");    // 수정버트 숨김

                // 아래 상담이력, 공지사항, 통화이력, 다 초기화 할것!
            });
        */
        // 고객정보 저장
        $("#saveClientInfo").click(function(){
            var clientName      = $("#clientName").val();
            var clientBirthDay  = $("#clientBirthDay").val().replace(/-/gi,"");
            var clientProduct   = $("#clientProduct").val();
            var clientTel1      = $("#clientTel1").val().replace(/-/gi,"");
            var clientTel2      = $("#clientTel2").val().replace(/-/gi,"");

            var clientJoinYMD   = $("#clientJoinYMD").val().replace(/-/gi,"");
            var clientMemo      = $("#clientMemo").val();
            var clientAddress   = $("#clientAddress").val();

            if(clientName == "" && clientTel1 == "")
            {
                alert("'고객이름' 과 '연락처1' 둘중 하나는 반드시 입력해야 합니다.");
                $("#clientName").focus();
                return false;
            }
            /*
            if(clientName == "" || clientName == null)
            {
                alert("고객이름을 입력하지 않았습니다.");
                $("#clientName").focus();
                return false;
            }
            else if(clientTel1 == "" || clientTel1 == null)
            {
                alert("연락처1 을 입력하지 않았습니다.");
                $("#clientTel1").focus();
                return false;
            }
            */
console.log("clientName :",clientName);
            console.log("clientBirthDay :",clientBirthDay);
            console.log("clientProduct :",clientProduct);
            console.log("clientTel1 :",clientTel1);
            console.log("clientTel2 :",clientTel2);
            console.log("clientJoinYMD :",clientJoinYMD);
            console.log("clientAddress :",clientAddress);
            console.log("clientMemo :",clientMemo);
            // 고객정보 저장
            $.ajax({
                type      : "POST",
                url       : "../DB/insertClientInfo.php",
                dataType  : "json",
                data      : {"clientName":clientName,"clientBirthDay":clientBirthDay,"clientProduct":clientProduct,"clientTel1":clientTel1,"clientTel2":clientTel2,"clientJoinYMD":clientJoinYMD,"clientAddress":clientAddress,"clientMemo":clientMemo},
                async     : false,
                success   : function(result)
                {
                    console.log(result);
                    if(result.RETURN_CODE !=0 )
                    {
                        if(result.RETURN_MSG.indexOf("Duplicate entry")>0)
                        {
                            alert("이미 등록되어 있는 고객번호입니다.");
                        }
                        else
                        {
                            //alert(result.RETURN_MSG);
                            alert("고객정보 저장에 실패 했습니다.");
                        }
                    }
                    else
                    {
                        // 저장된 정보로 조회
                        loadInfo(2,result.INSERT_ID);

                        window.parent.$("#CLIENTNO").val(result.INSERT_ID);
                        $("#searchValue").val("");

                        // 저장버튼을 수정버튼으로 변경할것 !

                    }
                },
                error   : function(xhr, textStatus, error)
                {
                    console.log(error);
                    console.log("insertClientInfo.php error");
                    alert("고객정보 DB 입력 실패");
                }
            });
        });

        // 고객정보 수정
        $("#editClientInfo").on("click", function() {
            var clientName      = $("#clientName").val();
            var clientNo        = window.parent.$("#CLIENTNO").val();
            var clientBirthDay  = $("#clientBirthDay").val().replace(/-/gi,"");
            var clientProduct   = $("#clientProduct").val();

            var clientTel1      = $("#clientTel1").val().replace(/-/gi,"");
            var clientTel2      = $("#clientTel2").val().replace(/-/gi,"");
            var clientJoinYMD   = $("#clientJoinYMD").val().replace(/-/gi,"");
            var clientHopeYMD   = $("#clientAddress").val().replace(/-/gi,"");
            var clientMemo      = $("#clientMemo").val();

            if(clientNo == "" || clientNo == null)
            {
                alert("고객정보가 조회되지 않았습니다.");
                $("#searchValue").focus();
                return false;
            }

            if(clientName == "" || clientName == null)
            {
                alert("고객이름을 입력하지 않았습니다.");
                $("#clientName").focus();
                return false;
            }
            else if(clientBirthDay == "" || clientBirthDay == null)
            {
                alert("생년월일을 입력하지 않았습니다.");
                $("#clientBirthDay").focus();
                return false;
            }
            else if(clientTel1 == "" || clientTel1 == null)
            {
                alert("연락처1 을 입력하지 않았습니다.");
                $("#clientTel1").focus();
                return false;
            }

            if(confirm("수정하시겠습니까?")) {


                // 고객정보 수정
                $.ajax({
                    type: "POST",
                    url: "../DB/updateClientInfo.php",
                    dataType: "json",
                    data: {
                        "clientName": clientName,
                        "clientNo": clientNo,
                        "clientBirthDay": clientBirthDay,
                        "clientProduct": clientProduct,
                        "clientTel1": clientTel1,
                        "clientTel2": clientTel2,
                        "clientJoinYMD": clientJoinYMD,
                        "clientAddress": clientAddress,
                        "clientMemo": clientMemo
                    },
                    async: false,
                    success: function (result) {
                        //console.log(result);
                        if (result.RETURN_CODE != 0) {
                            alert(result.RETURN_MSG);
                        }
                        else {
                            //window.parent.$("#CLIENT_CODE").val(result.INSERT_ID);
                            $("#searchValue").val("");

                        }
                    },
                    error: function (xhr, textStatus, error) {
                        console.log(error);
                        console.log("insertClientInfo.php error");
                        alert("고객정보 DB 입력 실패");
                    }
                });
            }
        });

        $("#clientTel1").click(function(){
            window.parent.$("#inputDn").val($("#clientTel1").val().replace(/-/gi,""));
        });

        $("#clientTel2").click(function(){
            window.parent.$("#inputDn").val($("#clientTel2").val().replace(/-/gi,""));
        });
    });

	function searchValue_popup()
    {   
		  $("#searchValue_popup").addClass("on");
		  $("#searchValue_popup").draggable({handle: ".popup_header p"}, {containment: "article"});
    }
</script>
<section id="widget-101" class="">
    <header>
        <p class="title"><i class="material_icons px_24">perm_identity</i>고객 정보</p>
        <div class="w60 right obj ">
            <!-- 검색 유형 선택 -->
            <div class=" w35">
                <select id="infotype" name="infotype">
                    <option value="1" selected>고객정보</option>
                    <option value="3">옵션1</option>
                    <option value="4">옵션2</option>
                </select>
            </div>
            <div class=" w40">
                <!-- <input type="text" name="searchValue" id="searchValue" value="" onkeypress="if(event.keyCode==13) {serarchInfo();}"> -->
				<input type="text" name="searchValue" id="searchValue" value="" readonly="true" onclick="searchValue_popup()">
            </div>
            <div class=" w25 padding_right_none">
                <button type="button" class="right memberdata_sch" name="" onclick="serarchInfo()"><i class="material_icons px_14">search</i>검색</button>
            </div>
        </div>
    </header>

    <div class="form_content">
        <!-- 거래처명 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">거래처명</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 대표자명 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">대표자명</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 사업자번호 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">사업자번호</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 주민번호 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">주민번호</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		<!-- 회원상태 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">회원상태</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 핸드폰 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">핸드폰</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		<!-- 회원그룹 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">회원그룹</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 전화번호1 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">전화번호1</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		<!-- 몰구분 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">몰구분</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 팩스번호 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">팩스번호</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		
		<!-- 거점도매상 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">거점도매상</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		 <!-- 이메일 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName">이메일</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>

		<!-- 승인일자 -->
        <div class="obj_label w20 padding_none">
            <label for="clientJoinYMD">승인일자</label>
        </div>
        <div class="obj w30">
            <input type="text" name="clientJoinYMD" id="clientJoinYMD" value="">
        </div>

		 <!-- 고객등급 -->
        <div class="obj_label w20 padding_none">
            <label for="clientName"> 고객등급</label>
        </div>
        <div class="obj w30">
            <input type="text" name="" id="clientName" value="">
        </div>



		 

        <!-- 주소 -->
        <div class="obj_label w20 padding_none">
            <label for="clientAddress">주소</label>
        </div>
        <div class="obj w80">
            <input type="text" name="clientAddress" id="clientAddress" value="">
        </div>

		<!-- 특이사항 -->
        <div class="obj_label w20 padding_none">
            <label for="clientAddress">특이사항</label>
        </div>
        <div class="obj w80">
			<textarea name="" id="" class="h48 resize_none" maxlength="400" wrap="hard"></textarea>
        </div>
    </div><!-- form_content end -->

    <footer>

		<button class="cyon right" type="button" name="" id="saveClientInfo">OTC</button>
		<button class="right" type="button" name="" id="saveClientInfo">주문배송</button>
        <!--<button class="right" type="button" name="" id="saveClientInfo"><i class="material_icons px_14">save</i>저장</button>	
        <button class="right dp_off" type="button" name="" id="editClientInfo"><i class="material_icons px_14">edit</i>수정</button>
        <button class="right " type="button" name="" id="renewClientInfo" onclick="window.location.reload()"><i class="material_icons px_14">autorenew</i>초기화</button>-->
    </footer>
</section><!-- widget-101 end -->

<!------------------------------------------------------------------------------------
	고객정보 검색 팝업
-------------------------------------------------------------------------------------->
<!-- 고객정보 검색 팝업 다이얼로그 -->
	<script>
	$(function(){ 
	
		$("#closesearchValue_popup").click(function(){
			$("#searchValue_popup").removeClass("on");
		});
		$("#closesearchValue_popup_foot").click(function(){
			$("#searchValue_popup").removeClass("on");
		});
	});
	</script>
	<section id="searchValue_popup" class="w944">
		<div class="popup_header">
			<p>TITLE</p>
			<div id="closesearchValue_popup" class="popup_close"><i class="material_icons">close</i></div>
		</div><!-- popup_header end -->
	
		<div class="popup_content">
			<div class="popup_searchValuebox">
				<div class="w28 padding_none">
					<!-- 사업자번호 -->
					<div class="obj_label w40 padding_none">
						<label for="clientName">사업자번호</label>
					</div>
					<div class="obj w60">
						<input type="text" name="" id="clientName" value="">
					</div>
				</div>
				<div class="w28 padding_none">
					<!-- 업 체 명 -->
					<div class="obj_label w40 padding_none">
						<label for="clientName">업 체 명</label>
					</div>
					<div class="obj w60">
						<input type="text" name="" id="clientName" value="">
					</div>
				</div>
				<div class="w28 padding_none">
					<!-- 전화번호 -->
					<div class="obj_label w40 padding_none">
						<label for="clientName">전화번호</label>
					</div>
					<div class="obj w60">
						<input type="text" name="" id="clientName" value="">
					</div>
				</div>
				<div class="w10 padding_none">
					<button class="blue" name="" id="">검색</button>
				</div>
			</div>

			<div class="content " id="widget-500" >
				<table id="table-500" class="tablesorter">
					<thead>
						<tr>
							<th class="sort">NO</th>
							<th class="sort">사업자번호</th>
							<th class="sort">업체명</th>
							<th class="sort">전화번호</th>
							<th class="sort">회원상태</th>
							<th class="sort">주소</th>
						</tr>
					</thead>
					<!-- 기본 행 10줄 기준 -->
					<tbody>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						<tr>
							<td class="line_select">1083</td>
							<td>2017-07-18</td>
							<td>업체명</td>
							<td class="out_call_dn">010-2894-1862</td>
							<td>홍길동</td>
							<td>서울특별시 강남구 테헤란로 517</td>
						</tr>
						
					</tbody>
				</table>
			</div><!-- content end -->
		</div><!-- popup_content end -->

		<div class="popup_footer ">
			<div class="mw100">
			<button class="blue" name="" id="closesearchValue_popup_foot" >닫기</button>
			</div>
		</div>
	</section><!-- clientMoreInfo-view end -->


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


		</div><!-- section_wrap_l50 end -->
</div><!-- section_wrap_l1000end -->
		
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

		<!-- 오른쪽 패널 시작 -->
		<div class="section_wrap_r500">
	
		<section id="tabs_right" class="clear section_wrap_w66">
			<ul>
				<li><a href="#rtab_0">설문</a></li>
				<li><a href="#rtab_1">SMS</a></li>
				<li><a href="#rtab_2">예약<span class="text_red text_blink dp_off" id='newcnt'>(0)</span></a></li>
				<li><a href="#rtab_3">이메일</a></li>
				<li><a href="#rtab_4">FAX</a></li>
			</ul>

			<div id="rtab_0">	
				<div class="rtab_content">
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

					<div class="poll_title">3. 위 항목 불만족 사유?</div>
					<div class="pb_line pb_20  ml_20">
						<textarea name="" id="" class="h100 resize_none" maxlength="400" wrap="hard" ></textarea>
					</div>
				</div>
				<div class="footer">
						<button class="right blue" type="button" name="" onclick="counsel_save1();">전송</button>
						<button class="right" type="button" name="" onclick="">임시저장</button>
						<button class="right cyon" type="button" name="" onclick="">설문거부</button>
						<button class="right cyon" type="button" name="" onclick="">통화거부</button>
				</div>
			</div>

			<div id="rtab_1">
				<div class="righttab_content">
					<div class="obj_label w20">
						<label>수신자 번호</label>
					</div>
					<div class="w80">
						<!-- 상담유형 대분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth1" readonly="true" value="">
						</div>
						<!-- 상담유형 중분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth2" readonly="true" value="">
						</div>
						<!-- 상담유형 소분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth3" readonly="true" value="">
						</div>
					</div>
					<div class="obj_label w20">
						<label>발신자 번호</label>
					</div>
					<div class="w80">
						<!-- 상담유형 대분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth1" readonly="true" value="">
						</div>
						<!-- 상담유형 중분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth2" readonly="true" value="">
						</div>
						<!-- 상담유형 소분류 -->
						<div class="obj w33">
							<input type="text" name="" id="Vdepth3" readonly="true" value="">
						</div>
					</div>

					<div class=" line"></div>

					<div class="obj_label w20">
						<label>상용문구</label>
					</div>
					<div class="w80">
						<!-- 상담유형 대분류 -->
						<div class="obj w100">
							<select id="depth1" name="depth" onchange="getcacategory('depth1')">
								<option value="0" selected>== 상품유형 ==</option>
								<option value=1000>메디체크</option>
								<option value=1001>임시유형1</option>
							</select>
						</div>
					</div>

					<div class="obj w100">
						<textarea name="" id="" class="h586 resize_none" maxlength="400" wrap="hard" ></textarea>
					</div>

					<div class="footer">
							<button class="right blue" type="button" name="" onclick="counsel_save1();">전송</button>
					</div>
				</div>
			</div>
			<div id="rtab_2">
			</div>
			<div id="rtab_3">
			</div>
			<div id="rtab_4">
				<div class="righttab_height">
					<!-- 보낸이 -->
					<div class="obj_label w20 padding_none">
						<label for="clientCode">보낸이</label>
					</div>
					<div class="obj w80">
						<input type="text" name="" id="" value="">
					</div>
					<!-- 받는이 -->
					<div class="obj_label w20 padding_none">
						<label for="">받는이</label>
					</div>
					<div class="obj w70">
						<input type="text" name="" id="" value="">
					</div>
					<div class="obj w10">
						<div class="btn_add fax_useradd">+</div>
					</div>
					<!-- 참조 -->
					<div class="obj_label w20 padding_none">
						<label for="">참조</label>
					</div>
					<div class="obj w70">
						<input type="text" name="" id="" value="">
					</div>
					<div class="obj w10">
						<div class="btn_add fax_useradd">+</div>
					</div>
					<div class="obj_label w20 padding_none">
						<label for="">제목</label>
					</div>
					<div class="obj w80">
						<input type="text" name="" id="" value="">
					</div>
					<div class="obj w100">
						<div class="fax_preview">
							Fax 미리보기 출력!
						</div>
					</div>
					<div class="obj_label w20 padding_none">
						<label for="">파일</label>
					</div>
					<div class="obj w80">
						<div class="fileBox">
							<input type="text" class="fileName" readonly="readonly">
							<label for="uploadBtn" class="btn_file">+</label>
							<input type="file" id="uploadBtn" class="uploadBtn">
						</div>
					</div>
					
				</div>

				<div class="footer">
					<button class="right blue" type="button" name="" onclick="">전송</button>
					<button class="right " type="button" name="" onclick="">초기화</button>
				</div>
			</div>
</section><!-- widget-102 end -->
		</div><!-- section_wrap_r50 end -->

<!-- 오른쪽 패널 끝 -->
		<script>
			var uploadFile = $('.fileBox .uploadBtn');
			uploadFile.on('change', function(){
				if(window.FileReader){
					var filename = $(this)[0].files[0].name;
				} else {
					var filename = $(this).val().split('/').pop().split('\\').pop();
				}
				$(this).siblings('.fileName').val(filename);
			});
		</script>

		<!------------------------------------------------------------------------------------
		Agent Common : CID Popup Modal Dialog (CID 팝업 모달다이얼로그)
	-------------------------------------------------------------------------------------->
		<!-- CID 팝업 다이얼로그 -->
	<script>
	$(function(){
		$(".fax_useradd").click(function(){
			$("#faxPopup").addClass("on");
			$("#faxPopup")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
		});
	
		$("#faxPopupClose").click(function(){
			$("#faxPopup").removeClass("on");
		});
	});

    function callLoadInfo()
    {   
        var CLIENT_CODE = window.parent.$("#CLIENT_CODE").val();
        var iframe1     = document.getElementById("contentFrame");
        iframe1.contentWindow.loadInfo(2,CLIENT_CODE);

        $("faxPopup").removeClass("on");

        ANSWER_CALL();
    }

    // 내용 초기화
    function clearDataPopup()
    {
         $(".popup_content div").find(".col2").text("");
    }

	</script>

	<div id="faxPopup" class="">
		<div class="popup_header">
			<p>받는이<span class="dp_off">제목이 가로 폭을 초과 할 경우 Max-width 값을 참조하여 "..."으로 대체 표시됩니다.</span></p>
			<div id="faxPopupClose" class="popup_close"><i class="material_icons">close</i></div>
		</div><!-- popup_header end -->

		<div class="popup_content">
			<div class="">
				<span class="col1 w30">받는이</span>
				<div class="obj w70">
					<input type="text" name="" id="" value="">
				</div>
				<span class="col1 w30">팩스번호</span>
				<div class="obj w70">
					<input type="text" name="" id="" value="">
				</div>
				<!--span class="col3">&lpar;대표번호&rpar;</span-->
			</div>
		</div><!-- popup_content end -->

		<div class="popup_footer ">
			<div class="mw100">
			<button class="blue" name=""  onclick="">추가</button>
			</div>
		</div>
	</div>
	<!-- Dialog End -->
	<!------------------------------------------------------------------------------------
		Agent Common : Overlap CID Popup Modal Dialog (중복 CID 팝업 모달다이얼로그)
	-------------------------------------------------------------------------------------->
		<!-- 중복 CID 팝업 다이얼로그 -->
	<script>
	$(function(){
		$(".ci").click(function(){
			$("#faxPopupOverlap").addClass("on");
			$("#faxPopupOverlap")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
		});
	
		$("#OverlapfaxPopupClose").click(function(){
			$("#faxPopupOverlap").removeClass("on");
		});
	});
	</script>

	<div id="faxPopupOverlap" class="">
		
	</div><!-- cidPopupOverlap end -->
	<!-- Dialog End -->



		<section id="tabs" class="clear section_wrap_w1100">
			<ul>
				<li><a href="#tab_0">상세보기&nbsp;</a></li>
				<li><a href="#tab_1">상담 이력&nbsp;</a></li>
				<li><a href="#tab_2">1:1 문의&nbsp;</a></li>
				<li><a href="#tab_3">메신저&nbsp;<span class="text_red text_blink dp_off" id='newcnt'>(0)</span></a></li>
				<li><a href="#tab_4">해피톡&nbsp;</a></li>
				<li class="purple"><a href="#tab_5">미완료&nbsp;</a></li>
				<li class="purple"><a href="#tab_6">VOC&nbsp;</a></li>
			</ul>
			<div id="tab_0">
				<div class="section_wrap_l50 p_r8">
					<div class="h275">
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">회원ID</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">기 타</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">영업 OTC</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">OTC 전화</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">영업 ETC</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">ETC 전화</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호2</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호6</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호3</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호7</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호4</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호8</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						 <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호5</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>
						  <!-- 고객이름 -->
						<div class="obj_label w20 padding_none">
							<label for="clientName">전화번호9</label>
						</div>
						<div class="obj w30">
							<input type="text" name="" id="clientName" value="">
						</div>

						<div class="obj_label w20">
							<label>수신 거부</label>
						</div>
						<div class="obj w80">
							<ul class="rich_warp">
								<li><input type="checkbox" id="poduct1_1" class="rich_style"><label for="poduct1_1" class="mouse_pointer button"><span class="checkbox_label"></span>TM</label></li>
								<li><input type="checkbox" id="poduct1_2" class="rich_style"><label for="poduct1_2" class="mouse_pointer button"><span class="checkbox_label"></span>DM</label></li>
								<li><input type="checkbox" id="poduct1_3" class="rich_style"><label for="poduct1_3" class="mouse_pointer button"><span class="checkbox_label"></span>SMS</label></li>
								<li><input type="checkbox" id="poduct1_4" class="rich_style"><label for="poduct1_4" class="mouse_pointer button"><span class="checkbox_label"></span>FAX</label></li>
								<li><input type="checkbox" id="poduct1_5" class="rich_style"><label for="poduct1_5" class="mouse_pointer button"><span class="checkbox_label"></span>e-Mail</label></li>
							</ul>
						</div>



					

						
					</div>
					<div class="tab_bottom">
						<button class="right blue " type="button" name="" onclick="counsel_save();">수정</button>
						<button class="right " type="button" name="" >신규</button>
					</div>
				</div>
				<div class="section_wrap_l50">
					<div class="h275">
						<div class="form_content">
							<div class="obj_label w20">
								<label>상담유형</label>
							</div>
							<div class="w80">
								<!-- 상담유형 대분류 -->
								<div class="obj w33">
									<select id="depth1" name="depth" onchange="getcacategory('depth1')">
										<option value="0" selected>== 상품유형 ==</option>
										<option value=1000>메디체크</option>
										<option value=1001>임시유형1</option>
									</select>
								</div>
								<!-- 상담유형 중분류 -->
								<div class="obj w33">
									<select id="depth2" name="depth" >
										<option value="0" selected>== 상품명 ==</option>
									</select>
								</div>
								<!-- 상담유형 소분류 -->
								<div class="obj w33">
									<select id="depth3" name="depth">
										<option value="0" selected>== 상담유형 ==</option>
										<option value="1">가입</option>
										<option value="2">보류</option>
										<option value="3">예약</option>
										<option value="4">가입문의</option>
										<option value="5">기타</option>
									</select>
								</div>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">상담내용<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">VOC<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20 dp_off">
								<label for="agentAnswer">답변내용</label>
							</div>
							<div class="obj w80 dp_off">
								<textarea name="agentAnswer" id="agentAnswer" class="h100 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label>VOC</label>
							</div>
							
							<div class="obj w40">
								<input type="text" name="" id="clientName" value="">
							</div>


							<div class="obj w80 dp_off">
								<input type="radio" name="ticketResult" id="ticketCompleted" class="normal" value="1" checked="checked">
								<label for="ticketCompleted" class="checkbox_label"><span class="radio_normal"></span>상담완료</label>

								<input type="radio" name="ticketResult" id="ticketIncomplete" class="normal" value="2">
								<label for="ticketIncomplete" class="checkbox_label"><span class="radio_normal"></span>상담보류</label>

								<input type="radio" name="ticketResult" id="ticketReserve" class="normal" value="3">
								<label for="ticketReserve" class="checkbox_label"><span class="radio_normal"></span>상담실패</label>

								<input type="radio" name="ticketResult" id="ticketTransfer" class="normal display_1500_over" value="4">
								<label for="ticketTransfer" class="checkbox_label margin_none"><span class="radio_normal"></span>기타</label>
							</div>
							
						</div><!-- form_content end -->
					</div>
					<div class="tab_bottom">
						<button class="right blue " type="button" name="" onclick="counsel_save();">수정</button>
					
					</div>
				
				</div>
			</div><!-- 상세보기 부분 끝 -->
			
			<div id="tab_1"><!-- 상담이력 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l50 p_r8">
					<div class="h348 scroll-x scroll-y">
						<div class="content w650" id="widget-500" >
							<table id="table-500" class="tablesorter">
								<thead>
									<tr>
										<th>상담일자</th>
										<th class="sort">전화번호</th>
										<th class="sort">고객명</th>
										<th class="sort">I/O</th>
										<th class="sort">상담결과</th>
										<th class="sort">상담원</th>
										<th class="center">청취</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
				<!-- 오른쪽 부분 시작 -->
				<div class="section_wrap_l50">
					<div class="h275">
						<div class="form_content">
							<div class="obj_label w20">
								<label>상담유형</label>
							</div>
							<div class="w80">
								<!-- 상담유형 대분류 -->
								<div class="obj w33">
									<select id="depth1" name="depth" onchange="getcacategory('depth1')">
										<option value="0" selected>== 상품유형 ==</option>
										<option value=1000>메디체크</option>
										<option value=1001>임시유형1</option>
									</select>
								</div>
								<!-- 상담유형 중분류 -->
								<div class="obj w33">
									<select id="depth2" name="depth" >
										<option value="0" selected>== 상품명 ==</option>
									</select>
								</div>
								<!-- 상담유형 소분류 -->
								<div class="obj w33">
									<select id="depth3" name="depth">
										<option value="0" selected>== 상담유형 ==</option>
										<option value="1">가입</option>
										<option value="2">보류</option>
										<option value="3">예약</option>
										<option value="4">가입문의</option>
										<option value="5">기타</option>
									</select>
								</div>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">상담내용<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">VOC<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20 dp_off">
								<label for="agentAnswer">답변내용</label>
							</div>
							<div class="obj w80 dp_off">
								<textarea name="agentAnswer" id="agentAnswer" class="h100 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label>VOC</label>
							</div>
							
							<div class="obj w40">
								<input type="text" name="" id="clientName" value="">
							</div>


							<div class="obj w80 dp_off">
								<input type="radio" name="ticketResult" id="ticketCompleted" class="normal" value="1" checked="checked">
								<label for="ticketCompleted" class="checkbox_label"><span class="radio_normal"></span>상담완료</label>

								<input type="radio" name="ticketResult" id="ticketIncomplete" class="normal" value="2">
								<label for="ticketIncomplete" class="checkbox_label"><span class="radio_normal"></span>상담보류</label>

								<input type="radio" name="ticketResult" id="ticketReserve" class="normal" value="3">
								<label for="ticketReserve" class="checkbox_label"><span class="radio_normal"></span>상담실패</label>

								<input type="radio" name="ticketResult" id="ticketTransfer" class="normal display_1500_over" value="4">
								<label for="ticketTransfer" class="checkbox_label margin_none"><span class="radio_normal"></span>기타</label>
							</div>
							
						</div><!-- form_content end -->
					</div>
					<div class="tab_bottom">
						<button class="right blue " type="button" name="" onclick="counsel_save();">수정</button>
					</div>
					
					</div>
				</div>
				<!-- 오른쪽 부분 끝 -->
			</div><!-- 상담이력 부분 끝 -->

		
			<div id="tab_2"><!-- 1:1문의 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l50 p_r8">
					<div class="h348 scroll-y">
						<div class="content" id="widget-500">
							<table id="" class="tablesorter">
								<colgroup>
									<col width="15%">
									<col width="*">
									<col width="15%">
								</colgroup>
								<thead>
									<tr>
										<th class="sort table_center">문의일시</th>
										<th class="sort table_center">제목</th>
										<th class="sort">고객명</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
				<!-- 오른쪽 부분 시작 -->
				<div class="section_wrap_l50">
					<div class="h348">
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">접수자</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="이고객     20180516 16:34:30">
						</div>
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">제목</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="주문 후 배송은 얼마나 걸리나요?">
						</div>
						<div class="obj_label  w20">
							<label for="clienAsking-501"></label>
						</div>
						<div class="obj w80">
							<textarea name="clienAsking-501" id="clienAsking-501" class="h120 resize_none" maxlength="400" wrap="hard" readonly="true">인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 
많이 속에 우리의 칼이다. 작고 오아이스도 앞이 그들은 청춘의 
철환하였는가? 인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. </textarea>
						</div>
							<div class="obj_label bg_b w20">
							<label for="clienAsking-501">처리내용</label>
						</div>
						<div class="obj w80">
							<textarea name="clienAsking-501" id="clienAsking-501" class="h120 resize_none" maxlength="400" wrap="hard" readonly="true">인생을 동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 속에 우리의 
칼이다. 작고 오아이스도 앞이 그들은 청춘의 철환하였는가? 인생을 
동력은 반짝이는 따뜻한 천지는 찾아 사막이다. 많이 속에 우리의 
칼이다. 작고 오아이스도 앞이 그들은 청춘의 철환하였는가?</textarea>
						</div>
					</div>
				</div>
				<!-- 오른쪽 부분 끝 -->
			</div><!-- 1:1문의  부분 끝 -->


			<div id="tab_3"><!-- 메신저 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l50 p_r8">
					<div class="h348 scroll-y">
						<div class="content" id="widget-500">
							<table id="" class="tablesorter">
								<colgroup>
									<col width="15%">
									<col width="5%">
									<col width="*">
									<col width="25%">
									<col width="15%">
								</colgroup>
								<thead>
									<tr>
										<th class="sort">문의일시</th>
										<th class="sort">구분</th>
										<th class="sort">대분류</th>
										<th class="sort">중분류</th>
										<th class="sort">고객명</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">배송문의</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td>K</td>
										<td class="out_call_dn">사은품/판촉물</td>
										<td>약국/대응</td>
										<td>홍사덕</td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
				<!-- 오른쪽 부분 시작 -->
				<div class="section_wrap_l50">
					<div class="h348">
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">대화 일시</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="이고객     20180516 16:34:30">
						</div>
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">상담유형</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="제품문의>약국/대응">
						</div>
						<div class="obj_label  bg_b w20">
							<label for="clienAsking-501">대화내용</label>
						</div>
						<div class="obj w80">
							&nbsp;
						</div>
						
						<div class="obj w100">
							말풍선 디자인 되면 들어갈 공간
						</div>
					</div>
				</div>
				<!-- 오른쪽 부분 끝 -->
			</div><!-- 메신저 부분 끝 -->


			<div id="tab_4"><!-- 해피톡 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l50 p_r8">
					<div class="h348 scroll-y">
						<div class="content" id="widget-500">
							<table id="" class="tablesorter">
								<colgroup>
									<col width="15%">
									<col width="*">
									<col width="15%">
								</colgroup>
								<thead>
									<tr>
										<th class="sort table_center">문의일시</th>
										<th class="sort table_center">제목</th>
										<th class="sort">고객명</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">주문 후 배송은 얼마나 걸리나요?</td>
										<td>홍사덕</td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
				<!-- 오른쪽 부분 시작 -->
				<div class="section_wrap_l50">
					<div class="h348">
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">대화 일시</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="이고객     20180516 16:34:30">
						</div>
						<div class="obj_label bg_b w20">
							<label for="clienAsking-501">상담유형</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" readonly="true" value="제품문의>약국/대응">
						</div>
						<div class="obj_label  bg_b w20">
							<label for="clienAsking-501">대화내용</label>
						</div>
						<div class="obj w80">
							&nbsp;
						</div>
						
						<div class="obj w100">
							말풍선 디자인 되면 들어갈 공간
						</div>
					</div>
				</div>
				<!-- 오른쪽 부분 끝 -->
			</div><!-- 해피톡 부분 끝 -->


			<div id="tab_5"><!-- 미완료 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l100">
					<div class="h348 scroll-y">
						<div class="content" id="widget-500">
							<table id="table-500" class="tablesorter">
								<thead>
									<tr>
										<th class="sort center">No</th>
										<th class="center">상담일자</th>
										<th class="sort center">전화번호</th>
										<th class="sort center">서비스번호</th>
										<th class="sort center">상담자</th>
										<th class="sort center">I/O</th>
										<th class="sort center">상담결과</th>
										<th class="center">예약일시</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
									<tr>
										<td class="center">20180516</td>
										<td class="line_select center">20180530 14:30:20</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="out_call_dn center">01032828448</td>
										<td class="center">홍사덕</td>
										<td class="center">콜백</td>
										<td class="center">미통화</td>
										<td class="center">20180530 15:50</td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->


					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
			</div><!-- 미완료 부분 끝 -->


			<div id="tab_6"><!-- VOC 부분 시작 -->
				<!-- 왼쪽 부분 시작 -->
				<div class="section_wrap_l50 p_r8">
					<div class="h348 scroll-x scroll-y">
						<div class="content w650" id="widget-500" >
							<table id="table-500" class="tablesorter">
								<thead>
									<tr>
										<th>상담일시</th>
										<th class="sort">전화번호</th>
										<th class="sort">고객명</th>
										<th class="sort">I/O</th>
										<th class="sort">상담결과</th>
										<th class="sort">상담원</th>
										<th class="center">청취</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
									<tr>
										<td class="line_select">2017-07-18</td>
										<td class="out_call_dn">010-2894-1862</td>
										<td>홍사덕</td>
										<td>I/OI</td>
										<td>완료</td>
										<td>홍사덕</td>
										<td class="center player_open"><i class="material_icons px_18 player_wrap_open">play_arrow</i></td>
									</tr>
								</tbody>
							</table>
							<footer class="dp_off">
								<button class="right" name="" onclick="window.open('popup_window/popup_note_history.php','popup_note_history','resizable=no width=980 height=640 left=0 top=0 location=no')"><i class="material_icons px_14">more_horiz</i>더 보기</button>
							</footer>
						</div><!-- content end -->
					</div>
				</div>
				<!-- 왼쪽 부분 끝 -->
				<!-- 오른쪽 부분 시작 -->
				<div class="section_wrap_l50">
					<div class="h275">
						<div class="form_content">
							<div class="obj_label w20">
								<label>상담유형</label>
							</div>
							<div class="w80">
								<!-- 상담유형 대분류 -->
								<div class="obj w33">
									<select id="depth1" name="depth" onchange="getcacategory('depth1')">
										<option value="0" selected>== 대분류 ==</option>
										<option value=1000>메디체크</option>
										<option value=1001>임시유형1</option>
									</select>
								</div>
								<!-- 상담유형 중분류 -->
								<div class="obj w33">
									<select id="depth2" name="depth" >
										<option value="0" selected>== 증분류 ==</option>
									</select>
								</div>
								<!-- 상담유형 소분류 -->
								<div class="obj w33">
									<select id="depth3" name="depth">
										<option value="0" selected>== 소분류 ==</option>
										<option value="1">가입</option>
										<option value="2">보류</option>
										<option value="3">예약</option>
										<option value="4">가입문의</option>
										<option value="5">기타</option>
									</select>
								</div>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">VOC접수<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label for="clienAsking">VOC<br/>처리내역<p>2018-05-30<br/>11:30:24<p></label>
							</div>
							<div class="obj w80">
								<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20 dp_off">
								<label for="agentAnswer">답변내용</label>
							</div>
							<div class="obj w80 dp_off">
								<textarea name="agentAnswer" id="agentAnswer" class="h100 resize_none" maxlength="400" wrap="hard"></textarea>
							</div>

							<div class="obj_label w20">
								<label>VOC</label>
							</div>
							
							<div class="obj w40">
								<input type="text" name="" id="clientName" value="">
							</div>


							<div class="obj w80 dp_off">
								<input type="radio" name="ticketResult" id="ticketCompleted" class="normal" value="1" checked="checked">
								<label for="ticketCompleted" class="checkbox_label"><span class="radio_normal"></span>상담완료</label>

								<input type="radio" name="ticketResult" id="ticketIncomplete" class="normal" value="2">
								<label for="ticketIncomplete" class="checkbox_label"><span class="radio_normal"></span>상담보류</label>

								<input type="radio" name="ticketResult" id="ticketReserve" class="normal" value="3">
								<label for="ticketReserve" class="checkbox_label"><span class="radio_normal"></span>상담실패</label>

								<input type="radio" name="ticketResult" id="ticketTransfer" class="normal display_1500_over" value="4">
								<label for="ticketTransfer" class="checkbox_label margin_none"><span class="radio_normal"></span>기타</label>
							</div>
							
						</div><!-- form_content end -->
					</div>
					<div class="tab_bottom">
						<button class="right blue " type="button" name="" onclick="counsel_save();">수정</button>
					</div>
					
					</div>
				</div>
				<!-- 오른쪽 부분 끝 -->
			</div><!-- VOC 부분 끝 -->
			
			
		</section><!-- tabs end -->
	</article>
</div><!-- wrap end -->

<!-- 녹취파일 플레이어 -->

</body>
</html>