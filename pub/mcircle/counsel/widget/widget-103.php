<script>
function callbackLoad(CALLBACK_ACODE)
{
    var YMD          = $("input[name=CALLBACK_YMD]").val();
    var HMS          = $("input[name=CALLBACK_HMS]").val();
    var CID          = $("input[name=CALLBACK_CID]").val().replace(/-/gi,"");
    var ACODE        = window.parent.$("#AGENT_CODE").val();

    $.ajax({
        type      : "POST",
        url       : "../ajax/callbackGetDB.php",
        dataType  : "json",
        data      : {"YMD":YMD,"HMS":HMS,"CID":CID},
        async     : false,
        beforeSend: function()
        {

        },
        success   : function(result)
        {
            console.log(result)

            $("#clienAsking").val(result.CODE_ARRAY[0].QUESTION||"");
            
            for(var i=0; i<$("input[name=ticketResult]").length; i++)
            {
                if(result.CODE_ARRAY[0].SEND_TYPE==$("input[name=ticketResult]:eq("+i+")").val())
                {
                    $("input[name=ticketResult]:eq("+i+")").prop("checked", true);
                }
            }
        

            $("#callbackSave").addClass("dp_off");
            $("#callbackEdit").removeClass("dp_off");

            if(ACODE!=CALLBACK_ACODE)
            {
                $("#callbackEdit").addClass("dp_off");
            }
       
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("callbackGetDB.php error");
             alert("조회 실패(callbackGetDB)");
             return false;
		}
	});
}
function callbackLoadClear()
{
    $("#clienAsking").val("");
    $("#ticketCompleted").prop("checked",true);    

    $("#callbackSave").removeClass("dp_off");
    $("#callbackEdit").addClass("dp_off");
}


function fcallbackSave(TYPE)
{
    var UNIQUE_CODE  = window.parent.$("#UNIQUE_CODE").val();
    var ACODE        = window.parent.$("#AGENT_CODE").val();
    var YMD          = $("input[name=CALLBACK_YMD]").val();
    var HMS          = $("input[name=CALLBACK_HMS]").val();
    var CID          = $("input[name=CALLBACK_CID]").val().replace(/-/gi,"");

    var content     = $("#clienAsking").val();
    var RESULT_CODE = $("input:radio[name=ticketResult]:checked").val();

    if(YMD =='' || HMS == '' || CID =='')
    {
        alert("콜백항목이 정상적으로 선택되지 않았습니다.");
        return false;
    }

    if(content=='' || content== null)
    {
        alert("'상담내용' 항목이 입력되지 않았습니다. ");
        $("#clienAsking").focus();
        return false;
    }

    if(RESULT_CODE=='' || RESULT_CODE==null)
    {
        alert("상담결과를 선택하지 않았습니다.");
        return false;
    }

    $.ajax({
        url       : "../ajax/callbackUpdateDB.php",
        dataType  : "json",
        data      : {"TYPE":TYPE,"YMD":YMD,"HMS":HMS,"CID":CID,"RESULT_CODE":RESULT_CODE,"content":content,"UNIQUE_CODE":UNIQUE_CODE,"ACODE":ACODE},
        async     : false,
        success   : function(result)
        {
            if(result.RETURN_CODE!=0)
            {
                alert(result.RETURN_MSG);
            }
            else
            {
                // 화면 clear
                //alert('수정되었습니다.');
//                clearDetail();

            }
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("callbackUpdateDB.php error");
             alert("콜백처리 실패");
             return false;
        }       
    });
    

    


    
}

</script>
<!-- 콜백 관리 뷰에서 연결되는 상담 노트 위젯 -->
<section id="widget-103">
	<header>
		<p class="title">상담 노트</p>
		<div class="sub_title">
			<p>(콜백처리를 위한 상담 노트)</p>
		</div>
	</header>

	<div class="form_content ">
		<div class="obj_label w20 dp_off">
			<label>상담유형</label>
		</div>
		<div class="w80 dp_off">
			<!-- 상담유형 대분류 -->
			<div class="obj w33">
				<select id="depth1" name="depth" onchange="getcacategory_fix('depth1')">
					<option value="0" selected>== 대분류 ==</option>

				</select>
			</div>
			<!-- 상담유형 중분류 -->
			<div class="obj w33">
				<select id="depth2" name="depth" onchange="getcacategory('depth2')">
					<option value="0" selected>== 중분류 ==</option>
				</select>
			</div>
			<!-- 상담유형 소분류 -->
			<div class="obj w33">
				<select id="depth3" name="depth">
					<option value="0" selected>== 소분류 ==</option>
				</select>
			</div>
		</div>

		<div class="obj_label w20">
			<label for="clienAsking">상담내용</label>
		</div>
		<div class="obj w80">
			<textarea name="clienAsking" id="clienAsking" class="h180 resize_none" maxlength="400" wrap="hard"></textarea>
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
		<div class="obj w80">
			<input type="radio" name="ticketResult" id="ticketCompleted" class="normal" value="1" checked="checked">
			<label for="ticketCompleted" class="checkbox_label"><span class="radio_normal"></span>완료</label>

			<input type="radio" name="ticketResult" id="ticketIncomplete" class="normal" value="2">
			<label for="ticketIncomplete" class="checkbox_label"><span class="radio_normal"></span>미처리</label>


		</div>
	</div><!-- form_content end -->

	<footer>
	<!-- 상담유형 소분류 -->
		<div class="obj w33 dp_off">
			<select id="" name="">
				<option value="0" selected>소분류</option>
				<option value="1">content-2</option>
				<option value="2">content-3</option>
				<option value="3">content-4</option>
				<option value="4">content-5</option>
			</select>
		</div>
		<button class="right blue" name="" id="callbackSave" onclick="fcallbackSave('1');"><i class="material_icons px_14">save</i>저장</button>
		<button class="right green close_note dp_off"  name="" id="callbackEdit" onclick="fcallbackSave('2');"><i class="material_icons px_14">save</i>수정</button>
		<button class="right close_note" type="button" name=""><i class="material_icons px_14">close</i>콜백 취소</button>
	</footer>
</section><!-- widget-102 end -->