<?php
$strYMD = date("Y-m-d");

?>
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


</script>
<section id="widget-101" class="">
	<header>
		<p class="title">고객 정보</p>
		<div class="w75 right dp_off">
			<!-- 검색 유형 선택 -->
			<div class="obj w40">
				<select id="infotype" name="infotype">
					<option value="1" selected>고객이름</option>
					<option value="3">상품명</option>
					<option value="4">연락처</option>
				</select>
			</div>
			<div class="obj w40">
				<input type="text" name="searchValue" id="searchValue" value="" onkeypress="if(event.keyCode==13) {serarchInfo();}">
			</div>
			<div class="obj  padding_right_none">
				<button type="button" class="right" name="" onclick="serarchInfo()">
					<i class="material_icons px_14">search</i>검색
				</button>
			</div>
		</div>
	</header>

	<div class="form_content">
		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">사업자번호</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">업 체 명</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">회원상태</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">대표자명</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">회원그룹</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">주민번호</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">고객등급</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">몰 구분</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">거점도매상</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName">이메일</label>
		</div>
		<div class="obj w30">
			<input type="text" name="" id="clientName" value="">
		</div>

		<!-- 가입신청일 -->
		<div class="obj_label w20 padding_none">
			<label for="clientJoinYMD">접수일자</label>
		</div>
		<div class="obj w30">
			<input type="text" name="clientJoinYMD" id="clientJoinYMD" value="">
		</div>

		<!-- 고객이름 -->
		<div class="obj_label w20 padding_none">
			<label for="clientName"> H.P</label>
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

		<!-- 주소 -->
		<div class="obj_label w20 padding_none">
			<label for="clientAddress">특이사항</label>
		</div>
		<div class="obj w80">
			<input type="text" name="clientAddress" id="clientAddress" value="">
		</div>
	</div>
	<!-- form_content end -->

	<footer>
		<button class="" type="button" name="" id="saveClientInfo">
			<i class="material_icons px_14">save</i>메모
		</button>

		<button class="cyon right" type="button" name="" id="saveClientInfo">
			<i class="material_icons px_14">save</i>OTC
		</button>
		<button class="right" type="button" name="" id="saveClientInfo">
			<i class="material_icons px_14">save</i>주문배송
		</button>
		<!--<button class="right" type="button" name="" id="saveClientInfo"><i class="material_icons px_14">save</i>저장</button>	
        <button class="right dp_off" type="button" name="" id="editClientInfo"><i class="material_icons px_14">edit</i>수정</button>
        <button class="right " type="button" name="" id="renewClientInfo" onclick="window.location.reload()"><i class="material_icons px_14">autorenew</i>초기화</button>-->
	</footer>
</section>
<!-- widget-101 end -->

<!------------------------------------------------------------------------------------
	고객정보 상세 보기
-------------------------------------------------------------------------------------->
<? //include ("../dialog/client_info.php");?>