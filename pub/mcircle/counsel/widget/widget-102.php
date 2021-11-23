<script type="text/javascript">

// $(document).ready(function() {
// 	$("#depth1").change(function() {
// 		getCACategory( $(this) );
// 	});
// });

function getcacategory(objId, objVal)
{
    var code = $("#"+objId).val();
    var depth = parseInt(objId.replace(/[^0-9]/gi,""))+1;

    objVal = (objVal === undefined ? "":objVal)
    objId = objId.replace(/[0-9]/gi,"");

    //console.log("depth => "+ depth +", code => "+ code);

    $.ajax({
        type      : "POST",
        url       : "/counsel/DB/selectCounselTypeList.php",
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
		<p class="title">상담 노트</p>
		<div class="sub_title dp_off">
			<p>(Status of agents)</p>
		</div>
	</header>

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
				<select id="depth2" name="depth">
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
			<label for="clienAsking">상담내용</label>
		</div>
		<div class="obj w80">
			<textarea name="clienAsking" id="clienAsking" class="h95 resize_none" maxlength="400" wrap="hard"></textarea>
		</div>

		<div class="obj_label w20">
			<label for="clienAsking">VDC</label>
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
			<label>상담결과</label>
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
				<select id="depth2" name="depth">
					<option value="0" selected>== 상품명 ==</option>
				</select>
			</div>
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
	</div>
	<!-- form_content end -->

	<footer>
		<button class="right blue " type="button" name="" onclick="counsel_save();">노트 저장</button>
		<button class="right " type="button" name="" onclick="readyAfterSave();">저장 후 상담대기</button>
	</footer>
</section>
<!-- widget-102 end -->