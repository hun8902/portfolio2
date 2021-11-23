
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="copyright" content="2017 copyright &amp; copy; KLCNS, all right reserved.">
	<title>CALLRABi&trade; : Agent</title>

	<link rel="shortcut icon" type="image/x-icon" href="../res/img/favicon_klcns.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">


	<!-- CSS Linked -->
	<link rel="stylesheet" media="screen" href="../res/css/font.css">
	<link rel="stylesheet" media="screen" href="../res/css/normalize.css">
	<link rel="stylesheet" media="screen" href="../res/css/common.agent.css">
	<link rel="stylesheet" media="screen" href="../res/css/selectric.css">

	<!-- Javascript Linked -->
	<script type="text/javascript" src="../res/js/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="../res/js/jquery.selectric.min.js"></script>
	<script type="text/javascript" src="../res/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../res/js/jquery.stickytableheaders.min.js"></script>
    <!-- <script type="text/javascript" src="res/js/timer.js"></script> -->

<!-- 	<script type="text/javascript" src="../js/demo.js"></script> -->

	<script>
		$(function() {
		  $("table").stickyTableHeaders();
		});
		/* 아이프레임 높이(Height) 자동 맞춤 */
	 	function content_resize(obj) {
	 		calHeight($(obj));
		}
		$(window).resize(function() {
			calHeight($("#contentFrame"));
		});
		function calHeight(obj) {
			if ( obj.length > 0 ) {
				var windowheight = ($(window).height()-52);
				obj.height(windowheight);
			}
		}
		function changePage(obj) {
			content_resize(obj);
		}
	</script>
</head>

<body onload="LOG_ON();">
<INPUT type="hidden" name="IPADDR" value="124.139.171.93">
<INPUT type="hidden" name="ACODE"  value="1001">
<INPUT type="hidden" name="UNIQUE_CODE" ID="UNIQUE_CODE">
<INPUT type="hidden" name="CID"         ID="CID">
<INPUT type="hidden" name="CALLTYPE"    ID="CALLTYPE">
<INPUT type="hidden" name="CLIENTNO"    ID="CLIENTNO">    <!--고객 번호-->
<INPUT type="hidden" name="CLIENT_NAME" ID="CLIENT_NAME"> <!--고객 이름-->
<INPUT type="hidden" name="PAGETYPE"    ID="PAGETYPE">

<!-- ------------------------------------------------------------------------------------
	CMS Common : Header include (헤더)
-------------------------------------------------------------------------------------->
<object id="CALLRABI" codebase="CallrabiK.cab#version=1,0,227,0" style="display:none" width="0" height="0" classid="clsid:2BDC3DA8-DBC2-44AE-AE5E-C576993A2A64" type="application/x-oleobject"></object>

<SCRIPT language="javascript" for="CALLRABI" event="OnServerConnectChange(VALUE)">OnServerConnectChange(VALUE)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnCallrabiRingDetect(VALUE1,VALUE2,VALUE3)">OnCallrabiRingDetect(VALUE1,VALUE2,VALUE3)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnCallrabiBridge(VALUE1,VALUE2,VALUE3)">OnCallrabiBridge(VALUE1,VALUE2,VALUE3)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnCallrabiHangup(VALUE1,VALUE2,VALUE3)">OnCallrabiHangup(VALUE1,VALUE2,VALUE3)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnPhoneStatus(VALUE1,VALUE2,VALUE3)">OnPhoneStatus(VALUE1,VALUE2,VALUE3)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnError(VALUE)">OnError(VALUE)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnAGStateChange(VALUE)">OnAGStateChange(VALUE)</SCRIPT>
<SCRIPT language="javascript" for="CALLRABI" event="OnAGLogon(VALUE)">OnAGLogon(VALUE)</SCRIPT>
<SCRIPT>

// 상담원 상태 정의
/*
	0  = Log-Off(로그아웃)
	1  = Ready (Call Standby)(대기)
	2  = Leave(자리비움)
	3  = Talk(상담중)
	4  = Dial(전화중)
	5  = Lunch(식사중)
	6  = Edu(교육중)
	7  = After(후처리)
	13 = Chat(채팅-거의 사용안함)
	14 = Left Seat(이석)
	15 = Etc1(기타1) -회의중
	16 = Etc2(기타2)
	17 = Other(다른용무중)
	18 = Logon(로그온)

*/

/*
$( document ).ready(function() {
//    alert("123123");
//    LOG_ON();

    
    // 수신가능(전화대기) 버튼
//    $('.set_ready').click(function(){
//        CALLRABI.QueueReady("");
//        $('.cti').attr('id','agReady');
//    });

//alert($(".session_current").length);
});
*/

// =============== variable definition ===============
var strRingState   = 0; // 1:전화 받기 가능
var strBridgeState = 0; // 1:통화중

// =============== OCX event function ===============

function OnServerConnectChange()
{
    console.log("OnServerConnectChange");
//    alert("OnServerConnectChange");
//     for(i = 0; i < arguments.length; i++){
 //       alert(arguments[i]);
   // } 
}

function OnCallrabiRingDetect()
{
//    console.log("OnCallrabiRingDetect");
//    alert("OnCallrabiRingDetect");

    // 전화받기 가능
    strRingState = 1;

    var CID        = arguments[0];
    var INFO_VALUE = arguments[1];
    var CALL_TYPE  = arguments[2];

    var rt_value;
    var strCLIENTCODE;
    var strCOMPANYNAME;
    var strName    = "조회실패";

    if(CALL_TYPE===1) // 수신
    {
//        alert('수신');
        //console.log('수신');

        // 노출 전 데이터 초기화
        //clearDataPopup();

        var infoarry = INFO_VALUE.split('/')
        // infoarry[0] : 고객 전화번호
        // infoarry[1] : 서비스 번호
        // infoarry[2] : 
        // infoarry[3] : IVR 카테고리

        // 상단에 인입 전화버호 노출
        $("#inputDn").val(infoarry[0]);
        $('#CALLTYPE').val(1);

        OCXClientDataSearch(4,CID,infoarry[1],infoarry[3]);

    }
    else
    {
//        alert('발신');
              console.log('발신');
        // 상태 변경 (상담중)
        SETAGSTATE(3);
    }
}

function OnCallrabiBridge()
{
    console.log("OnCallrabiBridge");
    // 통화중
    strBridgeState = 1;

//    alert("OnCallrabiBridge");

    /*
    for(i = 0; i < arguments.length; i++){
        alert(arguments[i]);
    }
    */

    var CID        = arguments[0];
    var INFO_VALUE = arguments[1];
    var CALL_TYPE  = arguments[2];
    var INFO_ARR;

    if(CALL_TYPE===1) // 수신
    {
        INFO_ARR = INFO_VALUE.split("/"); 
        
        $('#UNIQUE_CODE').val(INFO_ARR[4]);
        $('#CID').val(INFO_ARR[0]);
        $('#CALLTYPE').val(1);
        console.log(INFO_ARR[4]);
    }
    else
    {
        INFO_ARR = INFO_VALUE.split("/"); 
        $('#CALLTYPE').val(2);
        $('#UNIQUE_CODE').val(INFO_ARR[3]);
    }

    // 상태 변경 (상담중)
    SETAGSTATE(3);
    // 상담이력 호출
//    counsellist();
}

function counsellist()
{
    var CID          = window.parent.$("#CID").val();

    $.ajax({
        url       : "../ajax/getDB.php",
        dataType  : "json",
        data      : {"TYPE":2,"CID":CID},
        async     : true,
        success   : function(result)
        {
            console.log(result);
            if(result.RETURN_CODE!=0)
            {
                alert(result.RETURN_MSG);
            }
            else
            {
                // 화면 clear
                $('#depth1').prop('selectedIndex', 0).selectric('refresh')
                $("#depth2").empty().append("<option>=중분류=</option>").selectric("refresh");
                $("#depth3").empty().append("<option>=소분류=</option>").selectric("refresh");

                $("#clienAsking").val('');
                $("#agentAnswer").val('');
                $('input:radio[name=ticketResult]').prop('checked', false);
            }
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("setDB.php error");
             alert("DB 입력 실패");
             return false;
        }       
    });
}

function OnCallrabiHangup()
{
    console.log("OnCallrabiHangup");
    // 전화받기 불가능
    strRingState = 0;
    // 통화중 아님
    strBridgeState = 0;

//    alert("OnCallrabiHangup");
    // 상태 변경 (후처리)
    SETAGSTATE(7);


    // 고객이 끊었을 경우를 위해 "받기"버든 비활성화
    $('.answer_call').blur();
    $('.set_ready').blur();

    $('.cti').attr('id','agNotReady');
  
    // display 문구
    $(".session_current").prop("id", "agentNotReady");
    $("#session_text").text("후처리");

    // timer 증가
    _timer.init();
    _timer.timer("session_time", false);

}

function OnPhoneStatus(VAL1,VAL2)
{
    console.log("OnPhoneStatus");
    if(VAL2=="A") 
    {
        CALLRABI.PhoneStatus(VAL1);
    }
    else
    {
        if(VAL2==0)
        {
            $("#inputExtDn").val(VAL1);
            TRANSFER_CALL();

            // 추후 작업 
            // 돌려주기 버튼 누른 것 처럼 표시
        }
        else
        {
            $("#agentList").load("./ocx/view/",{ACODE:VAL1,STATE:VAL2},function(data){
                $("#agentList").show();
            });     
        }
    }
}

function OnError()
{
    console.log("OnError");
//    alert("OnError");
}

function OnAGStateChange()
{
    console.log("OnAGStateChange");
    /*
    alert("OnAGStateChange");
    for(i = 0; i < arguments.length; i++){
        alert(arguments[i]);
    }
    */
}

function OnAGLogon()
{
    console.log("OnAGLogon");
/*
    for(i = 0; i < arguments.length; i++){
        console.log(arguments[i]);
    }
*/
    if(arguments[0]=="2")
    {
        alert("중복 로그인 되어 종료합니다.");
        LOG_OFF();
    }

}
// =============== OCX action function ===============
function LOG_ON() // OCX 로그온
{ 
	var IP = $("input[name=IPADDR]").val();      // 서버아이피
	var ID = $("input[name=ACODE]").val();       // 접속아이디 (내선번호)

console.log(IP);
console.log(ID);
	CALLRABI.CallrabiDBUse       = true; 		 //DB OCX상태 변경
    CALLRABI.PolycomPhoneUse     = false;        //폴리컴 활성화 여부
	CALLRABI.DebugMode           = true;         // 디버그모드 활성화 여부
	CALLRABI.NoActionAfterLogOff = false;        
	CALLRABI.SIPEventOnly        = true;         // SIP 이벤트
    CALLRABI.CallrabiEventUse    = true;
	//CALLRABI.RecordDir="/klpbx/wavfile";
	CALLRABI.AGLogON2(IP,ID,"",18);                  // 접속함수

    // timer 증가
    _timer.init();
    _timer.timer("session_time", false);
}

// =============== action function ===============
function test(obj)
{
    var clickId = $(obj).prop("id");
    alert(elemtId);

    for (var i=0;i<$(".session_current").length;i++)
    {
        var elemtId = $(".session_current:eq("+i+")").prop("id");

        if (clickId == elemtId)
        {
            $(".session_current:eq("+i+")").removeClass("dp_off");
        }
        else
        {
           $(".session_current:eq("+i+")").addClass("dp_off");
        }
    }
}

/*
var sec = 1;
var interval = setInterval(function() {
    sec++;
//    console.log(sec);
}, 1000);
*/


// 화면 표시 상태변경
function display_state(state,text)
{
    /*
    for (var i=0; i<$(".session_current").length; i++)
    {
        var elemtId = $(".session_current:eq("+i+")").prop("id");
        
        if(state == elemtId) // 변경
        {
            $(".session_current:eq("+i+")").removeClass("dp_off");
            if(state=="agentNotReady")
            {
                // 문구 변경
                $(".session_current:eq("+i+")").find("span:eq(0)").text(text);

            }
                
            // 시간 카운트
//            $(".session_current:eq("+i+")").find("span:eq(1)").text("6666");
            
//               _timer.stopYn = false;
//               _timer.timer(state+"_time");

        }
        else
        {
            $(".session_current:eq("+i+")").addClass("dp_off");
        }
    }
    */

}

// 후처리 버튼 click
function changepuased(state,OCXstate)
{
    //통화중 작동 불가
    if(strBridgeState==1)
    {
        //$('.set_not_ready').blur();
        return false;
    }

    var iTxt = $(state).find("i").text();
    var bTxt = $(state).text().replace(iTxt, "");

    var htmlString = "";
    htmlString = "<i class='material_icons px_14'>"+ iTxt +"</i>"+ bTxt +"";

    
    //$(".set_not_ready").empty().html(htmlString);
//    $(".set_not_ready").find("i").text(iTxt);
//    $(".set_not_ready").text(bTxt);

    SETAGSTATE(OCXstate);


    if(OCXstate==14) // 휴식중
    {
        $('.cti').attr('id','agLocalCafe');
        $(".session_current").prop("id", "agentLocalCafe");
    }
    else if(OCXstate==5) // 식사중
    {
        $('.cti').attr('id','agLocalCafe');
        $(".session_current").prop("id", "agentLocalCafe");
    }
    else if(OCXstate==6) // 교육중
    {
        $('.cti').attr('id','agLocalCafe');
        $(".session_current").prop("id", "agentLocalCafe");
    }
    else if(OCXstate==15) // 회의중
    {
        $('.cti').attr('id','agNotReady');
        $(".session_current").prop("id", "agentNotReady");
    }
    else if(OCXstate==2) // 자리비움
    {
        $('.cti').attr('id','agLocalCafe');
        $(".session_current").prop("id", "agentLocalCafe");
    }
    else if(OCXstate==17) // 다른업무
    {
        $('.cti').attr('id','agLocalCafe');
        $(".session_current").prop("id", "agentLocalCafe");
    }
    else
    {
        $('.cti').attr('id','agNotReady');
        $(".session_current").prop("id", "agentNotReady");
    }

    // display 문구
    
    $("#session_text").text(bTxt);

    // timer 증가
    _timer.init();
    _timer.timer("session_time", false);

/*
    $('.set_not_ready').addClass('btncolorpaused');
    $('.btncolorready').removeClass('btncolorready');
    $('.btncolorcall').removeClass('btncolorcall');
    $('.btncolorhangup').removeClass('btncolorhangup');
*/
}

function LOG_OFF() // OCX 로그오프
{
//    SETAGSTATE(7); // 후처리
	CALLRABI.AGLogOFF();
//    location.href='URL
    location.href="./logout.php";

}
function test()
{
    alert("header test function call~~");
}


function OUT_CALL() // 전화발신
{
    //통화중 작동 불가
    if(strBridgeState==1)
    {   alert("통화중 작동 불가");
        $('.make_call').blur();
        return false;
    }

    var ID  = $("input[name=ACODE]").val();   // 접속아이디 (내선번호)
	var NUM = $("#inputDn").val();            // 발신번호(전화번호) 

	NUM = NUM.replace(/[^0-9]/g,''); // 숫자만 추출
    $("#inputDn").val(NUM);

	if(NUM == "") 
    {
        $("#inputDn").focus();
        return false;
    }

    // 내선통화 확인
    if(NUM.length===4)
    {
        CALLRABI.MakeCallEx(NUM,"","inside"); //발신함수


    }
    else
    {
        CALLRABI.OutboundCall(NUM,"","","client",ID,""); //발신함수
    }
    

//    alert(GetAGState());

	

    // 상태 변경 (전화중)
    SETAGSTATE(4);


    $('.cti').attr('id','agCalling');
    $(".session_current").prop("id", "agentCalling");
    $("#session_text").text("통화중");

    // timer 증가
    _timer.init();
    _timer.timer("session_time", false);
}

function INSIDE_CALL() // 전화발신
{
	var NUM = document.SN.TEL_NUMBER.value; // 발신번호(전화번호)
	NUM = NUM.replace(/[^0-9]/g,''); // 숫자만 추출
	if(NUM=="") document.SN.TEL_NUMBER.focus();
    
	CALLRABI.MakeCallEx(NUM,"","inside"); //발신함수
}

function ANSWER_CALL() // 전화받기
{
	console.log("ANSWER_CALL");
    if(strRingState!="1")
    {
        $('.answer_call').blur();
        alert("전화가 왔을때만 '받기' 버튼이 사용가능합니다.");
        return false;
    }

    CALLRABI.AnswerCall();

    // 이미 통화중일 경우
    if(GetAGState()==3)
    {
        return false
    }

    // 상태 변경 (상담중)
    SETAGSTATE(3);
    
    // display 문구
    $('.cti').attr('id','agCalling');    
    $(".session_current").prop("id", "agentCalling");
    $("#session_text").text("통화중");

    // timer 증가
    _timer.init();
    _timer.timer("session_time", false);

    // pup_up
    $("#cidPopup").removeClass("on");



/*    
    // 대기 일때만 동작
    if(GetAGState()==1)
    {
        CALLRABI.AnswerCall();

        $('.cti').attr('id','agCalling');


        $("#cidPopup").removeClass("on");

        $('.set_not_ready').removeClass('btncolorpaused');
        $('.btncolorready').removeClass('btncolorready');            
    }
    else
    {
//        $('.answer_call').css('background-color',"");
 //       $('.btncolorcall').removeClass('btncolorcall');


        alert("에러 디자인 만들어주세요~");

        $(".answer_call").blur();
    }

    //setAgStateReady();
*/
}

function HANGUP_CALL(){  // 전화끊기

    var state = GetAGState();
    if (state===3 || state===4)
    {
    	CALLRABI.HangupCall(); //끊기함수
    }
    else
    {
        $('.hangup_call').blur();
        alert("통화중일때만 '끊기'버튼이 사용 가능합니다.");
        return false;
    }

}

function PICKUP_CALL(){ // 당겨받기
	EVENT("PickupCall",'A','pickupcall');
	CALLRABI.PickupCall("pickupcall"); // 당겨받기함수
}

function TRANSFER_CALL(){ // 돌려주기 시도
	var CODE =  $("#inputExtDn").val();   // 내선 번호추출
	if(CODE=="") return false;

	CALLRABI.TransferCall(CODE,"transfercall",1); // 돌려주기 함수
}

function TRANSFER_CANCEL(){ // 돌려주기 취소
    var ID = $("input[name=ACODE]").val();       // 접속아이디 (내선번호)
	if(ID=="") return false;
	CALLRABI.TransferCancel(ID); // 돌려주기취소 함수
}

function PAUSE_AGENT(){ // 수신불가
	EVENT("QueuePause",'A');
	CALLRABI.QueuePause("");
}

function READY_AGENT(){ // 수신가능(전화대기)
	EVENT("QueueReady",'A');
	CALLRABI.QueueReady("");
}

function ROUTE(){
	var VALUE=document.SN.TEL_NUMBER.value;
	$.get("./action/",{CH:VALUE},function(data){
//		alert(data);
	});	
}


function SETAGSTATE(num)
{	
    //alert(num);
	CALLRABI.SetAGState(num);
}

function setAgStateReady()  // 상담대기
{
/*
    // 후처리 인 경우에 상담내역을 저장 후에 '상담대기'로 변경
    if(GetAGState()==7)
    {
        if($("#CID").val()!="")
        {
            $(".set_ready").blur();
            alert("'상담노트'를 작성 후 '상담대기'로 변경 해주세요");
            return false;
        }
    }
*/
    //통화중
    if(GetAGState()==3)
    {
        $(".set_ready").blur();
        return false;
    }

    //console.log(strBridgeState);
    //통화중 작동 불가
    if(strBridgeState==1)
    {
        return false;
    }
        
    //상담데스크 페이지일 경우에만 clear
    if(PAGETYPE == "" || PAGETYPE == "1")
    {
        // 화면 clear
        var iframe1     = document.getElementById("contentFrame");
        iframe1.contentWindow.clearClientInfo("form_content");
        iframe1.contentWindow.clearList();
        iframe1.contentWindow.clearDetail();  
    }

    // OCX 로그인 중에 상담대기를 막음
    if(GetAGState()=="-1")
    {
        $('.set_ready').blur();
        return false;
    }

    // 상태 변경 (대기)
    SETAGSTATE(1);

    // 상태가 "대기"로 변경된 것을 확인 후에 화면변경
    if(GetAGState()===1)
    {
        $('.cti').attr('id','agReady');
        
        // display 문구
        $(".session_current").prop("id", "agentReady");
        $("#session_text").text("상담 대기중");

        // timer 증가
        _timer.init();
        _timer.timer("session_time", false);
    }

    // 대기시간 분배를 위해 시간 초기화
    CALLRABI.ResetLastCall('','');
/*
    $('.set_ready').addClass('btncolorready');
    $('.btncolorpaused').removeClass('btncolorpaused');
    $('.btncolorcall').removeClass('btncolorcall');
    $('.btncolorhangup').removeClass('btncolorhangup');
*/
}

function SEARCH_SEND(){
//	alert(CALLRABI.GetCIDData());
}

function PHONE_STATUS(){ // 내선 상태확인
	var CODE = document.SN.TRAN_CODE.value; // 내선 번호추출
	if(CODE=="") return false;

	EVENT("PhoneStatus",'A');
	CALLRABI.PhoneStatus(CODE);
}

function GetAGState()
{
    return CALLRABI.GetAGState();
}


function RECORD_START()
{
    var now = new Date();
 
    var Year = now.getFullYear();
    var MM   = now.getMonth()+1;
    var Month = "0"+MM;
        Month = String(Month).substring(String(Month).length-2);

    var DD   = now.getDate();
    var Day  = "0"+DD;
        Day  = String(Day).substring(String(Day).length-2);

    var HH = now.getHours();
    var Hour = "0"+HH;
        Hour  = String(Hour).substring(String(Hour).length-2);

    var Min = now.getMinutes();
    var Minute = "0"+Min;
        Minute  = String(Minute).substring(String(Minute).length-2);

    var SS = now.getSeconds();
    var Second = "0"+SS;
        Second  = String(Second).substring(String(Second).length-2);



	var AGENT_CODE= document.SN.ACODE.value; // 접속아이디 (내선번호)
	var FNM = Year+Month+Day+Hour+Minute+Second;
	var REC_RESULT = CALLRABI.WebSiteCall("http://ipADDR:8060/rec_database/?AGENT_CODE="+AGENT_CODE+"&FILE_NM="+FNM+"&PHONE_NO=01012345678");

    if(REC_RESULT=="0")
    {
        CALLRABI.RecordDir="/klpbx/callrabi/8060/rec_file";
        CALLRABI.RecordStart(FNM,"wav");
    }
}

function RECORD_STOP()
{
    CALLRABI.RecordStop();
}

function checkstate()
{
//    alert(GetAGState());


}


function time_update(state)
{
    console.log(state);
    /*
    var Digital=new Date();
    var day     = Digital.getDate(); //일
    var year    = Digital.getFullYear(); //년도
    var month   = Digital.getMonth()+1; //월
    var hours   = Digital.getHours(); //시
    var minutes = Digital.getMinutes(); //분
    var seconds = Digital.getSeconds(); //초

    if(hours<=9) //시간이 1자리이면 0을 붙인다.
        hours="0"+hours;
    if (minutes<=9) //분이 1자리이면 0을 붙인다.
        minutes="0"+minutes;
    if (seconds<=9) //초가 1자리이면 0을 붙인다.
        seconds="0"+seconds;

    // 글자모양을 원하는대로 수정 하세요
    clockdate = year+"년&nbsp;"+month+"월&nbsp;"+day+"일&nbsp;&nbsp;";
    clocktime = "("+hours+":"+minutes+":"+seconds+")";
    console.log(clocktime);
    */
}

var interval = {
	secondsAfterEvent: 0,
	minutesAfterEvent: 0,
	sessionTime: 0,
	tick: null,
	saveEventTime: function(time) {
		this.secondsAfterEvent = time;
		this.minutesAfterEvent = time+1;
	},
	startInterval: function() {
		this.tick = setInterval(function() {
			var seconds = 59-interval.secondsAfterEvent;
			var minutes = ((interval.sessionTime/60) - interval.minutesAfterEvent);
			if ( seconds == 0 ) { $("#leftSeconds").hide(); }
			else { $("#leftSeconds").show().text(seconds + "초"); }
			if ( minutes == 0 ) { $("#leftMinutes").hide(); }
			else { $("#leftMinutes").show().text(minutes + "분"); }
			interval.secondsAfterEvent += 1;
			if ( interval.secondsAfterEvent % 60 == 0 ) {
				interval.minutesAfterEvent++;
				interval.secondsAfterEvent = 0;
				if ( interval.minutesAfterEvent == ( interval.sessionTime / 60 ) - 4 ) {
					alert("사용자에게서 아무런 동작이 없으면 세션이 만료됩니다. 로그인 화면으로 돌아가기 5분 전 입니다.");
				}
			}
			if ( interval.minutesAfterEvent > ( interval.sessionTime / 60 ) ) {
				// 세션 연장 모달창을 지우고 자동으로 로그아웃 되게 한다.
				document.logoutform.submit();
			}
		}, 1000); // 1초마다 실행
	},
	stopInterval: function() {
		clearInterval(this.tick);
	},
	restartInterval: function() {
		this.saveEventTime(0);
		this.stopInterval();
		this.startInterval();
	}
};

function getClientInfo(type, CLIENTINFO)
{
    //console.log("type",type);
    //console.log("CLIENTINFO",CLIENTINFO);

    var INFO_ARRAY;

    $.ajax({
        type      : "POST",
        url       : "./DB/selectClientInfo.php",
        dataType  : "json",
        data      : {"TYPE":type,"CLINFO":CLIENTINFO},
        async     : false,
        success   : function(result)
        {
            //console.log(result);
            //console.log(JSON.stringify(result.INFO_ARRAY[0]));
            INFO_ARRAY = result;
        },
        error   : function(xhr, textStatus, error)
        {
             console.log(error);
             console.log("selectClientInfo.php error");
             //alert("조회 실패");
             var jsonObj = {};
             jsonObj.RETURN_CODE = "5000";
            INFO_ARRAY = jsonObj;
             
        }       
    });

    return INFO_ARRAY;
}

// 전화번호 조회
// input param type 1:고객이름, 2:서비스번호, 3:상품명, 4:연락처
function OCXClientDataSearch(type,CLIENTINFO,DNIS,IVRCG)
{
    console.log("type",type);
    console.log("CLIENTINFO",CLIENTINFO);
    console.log("DNIS",DNIS);
    console.log("IVRCG",IVRCG);

    var INFO_ARRAY;

    $.ajax({
        type      : "POST",
        url       : "./DB/select_popup.php",
        data      : {"TYPE":type,"CLINFO":CLIENTINFO,"DNIS":DNIS,"IVRCG":IVRCG},
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

function changColorReady()
{
    $(".set_ready").addClass("on");
}
</SCRIPT>

    <!---------------------------------------------------------------------------
		CTI 헤더의 보더 처리 : 상태에 따라 보더 색상 변경을 위해 아래 id 중 하나를 적용해야 합니다.
		1) agOnline		온라인
		2) agCalling	통화중
		3) agReady		대기중
		4) agNotReady	Not Ready (후처리, 부재중, 다른 업무 중...)
		5) agPdsReady	PDS 대기중
	----------------------------------------------------------------------------->
	<header class="cti" id="agOnline">
		<div class="ci">고객사 CI(또는 BI)</div>
		<!---------------------------------------------------------------------------
			CI 이미지 처리
			1) "res/img/" 폴더에 위치한 기존 "ci.png" 파일을 "ci_klcns.png"롤 변경하십시오 
			2) 해당 고객사의 CI를 "ci.png"라는 이름으로 "/res/img/" 폴더에 저장 하십시오
			3) 이때 이미지의 배경은 무조건 흰색(#FFFFFF) 또는 투명으로 적용해야 합니다
			4) 이미지에 쓸데 없는 경계선(Border)이 있는 경우 제거해 주십시오
			5) 이미지에 쓸데 없는 공백(여백)은 모두 제거하고 타이트하게 만들어주세요
			6) 이미지 사이즈는 최대 가로폭 200px을 넘기지 마세요
			7) 해당 고객사 CI 적용 후 어색하다 싶으면 정진욱 차장에게 문의해주세요 
		----------------------------------------------------------------------------->

		<!-- 계정 정보 표시 -->
		<div class="current_account left">
			<!-- 사용자 이름 + (사용자 계정 등급)을 표시해야합니다. -->
			<p class="user_name"><span>임시사용자</span>&nbsp;<span class="account_roll_info">(1001)</span></p>
			
            <INPUT type="hidden" name="AGENT_CODE" ID="AGENT_CODE" value="1001">
			<div class="account_info">
				<!-- <p>john.doe@klcns.co.kr</p> -->
				<!--p>세션만료까지 11분 7초 남았습니다.</p>
				<p class="depth2">장시간 사용하지 않는 경우 보안을 위해 자동 로그아웃 됩니다.</p-->
				<div class="bottom">
					<!--a href="#" class=""><i class="material_icons">account_circle</i>내 계정</a-->
					<a href="#" class="" onclick="LOG_OFF();"><i class="material_icons">exit_to_app</i>로그아웃</a>
				</div>
			</div>
			
			
		</div>
		<div class="top_search left">
			<!-- 전화번호 입력 -->
			<div class="">
			<!-- 숫자만 입력되도록 -->
				<input type="text" name="inputDn" id="inputDn" class="input_dn" accesskey="9" value="" maxlength="30" title="전화번호 입력, &colon; &quot;Alt+9&quot;">
			</div>

			<!-- 검색 (CID 조회) -->
			<button class="bar_search_cid" name="searchCid" accesskey="6" title="Search, &colon; &quot;Alt+6&quot;"><img src="../img/search_btn.png" alt="search"/><!-- <i class="material_icons">search</i> --></button>

		</div>

		<!-- CTI Wrap -->
		<div class="cti_wrap">
			<!-- 전화기 컨트롤 관련(소프트폰) -->
			<div id="callingGroup" class="phone_control left">
				
				<!-- 전화 걸기 -->
				<button class="make_call" name="makeCall" accesskey="0" title="Calling, &colon; &quot;Alt+0&quot;" onclick="OUT_CALL();"><i class="material_icons px_14">call</i>걸기</button>

				<!-- 전화 받기 -->
				<button class="answer_call" name="answerCall" accesskey="1" title="Answer, &colon; &quot;Alt+1&quot;" onclick="ANSWER_CALL();"><i class="material_icons px_14">call</i>받기</button>

				<!-- 당겨 받기 -->
				<!--button class="pickup_call" name="pickupCall" title="Pickup call" onclick="PICKUP_CALL();"><i class="material_icons px_14">swap_calls</i>당겨받기</button-->

            </div><!-- phone_control end -->
				<!-- 전화 돌겨 주기 확장 버튼에 관한 스크립트 -->
            <script>
            $( function(){
                // run the currently selected effect
                function runEffectA(){
                    // Run the effect
                    $("#transfer_call_panel").fadeIn('fast');
                    $(".input_ext_dn").focus();
                    //$("#open_transfer").toggleClass("tr_arrow_toggle");
                };

                function getAgentList()
                {
                    $("#agentList").load("./ocx/view/",function(data){
                        $("#agentList").show();
                    });     
                };
                // Set effect from select menu value
                $("#open_transfer").on("click", function(){
                    runEffectA();
                    getAgentList();
                    $("#open_transfer").css('display','none');
                    $("#agent_status_panel").css('display','none');
                    $("#callingGroup").css('display','none');
                });
                $("#close_transfer").click(function(){
                    $("#transfer_call_panel").css('display','none');
                    $("#open_transfer").css('display','block');
                    $("#callingGroup").css('display','block');
                });
            });
            </script>
            <div class="phone_control left _dp_off">
                <button id="open_transfer" class="trasfer_call" name="transferCall" title="Call transfer"><i class="material_icons px_14">phone_forwarded</i>호전환</button>
				<div id="transfer_call_panel" class="left">					
                    <!-- 숫자만 입력되도록 -->
                    <input type="text" name="inputExtDn" id="inputExtDn" class="input_ext_dn" value="" maxlength="11" title="내선번호 입력">
                    <!-- 돌려주기 -->
                    <button class="trasfer_call" name="transferCall" title="Call transfer" onclick="TRANSFER_CALL();"><i class="material_icons px_14">phone_forwarded</i>돌려주기</button>
                    <!-- 돌려주기 취소 -->
                    <button class="trasfer_cancle" name="transferCancle" title="Cancel transfer" onclick="TRANSFER_CANCEL();"><i class="material_icons px_14">not_interested</i>돌려주기 취소</button>
                    <button class="close" id="close_transfer" title="돌려주기 기능 종료"></button>
                    <!--button class="trasfer_close" name="transferClose" title="Close transfer" onclick="HANGUP_CALL();"><i class="material_icons px_14">cancel</i>완료</button-->
                    <!-- 돌려줄 내선 리스트 -->
                    <div class="inner_box" id="agentList">

                    </div>                    
				</div>
			</div>
			<div class="phone_control_end left">
				<!-- 전화 끊기 -->
				<button class="hangup_call" name="hangupCall" accesskey="2" title="Hangup, &colon; &quot;Alt+2&quot;" onclick="HANGUP_CALL();"><i class="material_icons px_14">call_end</i>끊기</button>
			</div><!-- phone_control end -->

			<!-- 상담원 상태 관련(CTI) -->
			<div class="agent_status left">
				<!-- 상담원 상태 인디케이터 : 상태에 따라 다음 중 한가지가 표시되어야 합니다. -->
                <!--  id="agentOnline" -->
				<div class="session_current" id="agentOnline"><span id="session_text">온라인</span><span id="session_time">00:00:00</span></div><!-- 그냥 온라인 상태일 때 -->
				<!--div class="session_current" id="agentOnline"><span>온라인</span> | <span id="time">00:00:00</span></div><!-- 그냥 온라인 상태일 때 -->
				<!--div class="session_current dp_off" id="agentCalling"><span>통화중</span> | <span id="time">00:00:00</span></div><!-- 통화중일 때 -->
				<!--div class="session_current dp_off" id="agentReady"><span>상담 대기중</span> | <span id="time">00:00:00</span></div><!-- 상담 대기중 -->
				<!--div class="session_current dp_off" id="agentPdsReady"><span>PDS 대기중</span> | <span id="time">00:00:00</span></div><!-- 상담 대기중 -->
				<!--div class="session_current dp_off" id="agentNotReady"><span>Not ready</span> | <span id="time">00:00:00</span></div><!-- 대기가 아닌 경우 모두 -->

				<!-- 상담대기 대기 -->
				<button class="set_ready" name="setAgStateReady" accesskey="3" title="Ready, &colon; &quot;Alt+3&quot;" onclick="setAgStateReady();"><i class="material_icons px_14">check_circle</i>상담대기</button>

				<!-- 후처리 버튼 -->
				<!--button class="set_not_ready" name="setAgStateAfterCallWork" accesskey="4" title="After call work, &colon; &quot;Alt+4&quot;" onclick="changepuased(this,7);"><i class="material_icons px_14">cancel</i>후처리</button-->
				<!-- 전화 돌겨 주기 확장 버튼에 관한 스크립트 -->
				<script>
				$( function(){
					// run the currently selected effect
					function runEffectB(){
						// Run the effect
						$("#agent_status_panel").toggle();
						$("#open_not_ready").toggleClass("agent_arrow_toggle");
					};
					// Set effect from select menu value
					$("#open_not_ready").on("click", function(){
						runEffectB();
						$("#transfer_call_panel").css('display','none');
						$("#open_transfer").css('display','block');
						$("#callingGroup").css('display','block');
					});
					$(".ag_state").click(function(){
						$("#agent_status_panel").css('display','none');
						$("#open_not_ready").toggleClass("agent_arrow_toggle");
					});
				});
				</script>
				<button class="arrow_up" id="open_not_ready"></button>
				<div id="agent_status_panel">
					<!-- 상담원 상태 정의 (AGState define) -->
					<!-- agState00	온라인 -->
					<!-- agState01	로그아웃 -->
					<!-- agState02	통화 중 -->
					<!-- agState03	대기 중 -->
					<!-- agState04	후처리 중 -->
					<!-- agState05	다른 업무 중 -->
					<!-- agState06	자리 비움 -->
					<!-- agState07	회의 중 -->
					<!-- agState08	교육 중 -->
					<!-- agState09	식사 중 -->
					<!-- agState10	휴식 중 -->
					<!-- agState11	휴가 중 -->
					<!-- agState20	PDS 대기 중 -->
					<div class="inner_box">
						<!-- 다른 업무 중 -->
						<button class="ag_state" id="agState05" name="agState05" onclick="changepuased(this,17)"><i class="material_icons px_14">report_problem</i>다른 업무</button>                        
						<!-- 자리 비움 -->
						<!--button class="ag_state" id="agState06" name="agState06" onclick="changepuased(this,2)"><i class="material_icons px_14">block</i>자리 비움</button-->
						<!-- 회의 중 -->
						<!--button class="ag_state" id="agState07" name="agState07" onclick="changepuased(this,15)"><i class="material_icons px_14">group_work</i>회의 중</button-->
						<!-- 교육 중 -->
						<!--button class="ag_state" id="agState08" name="agState08" onclick="changepuased(this,6)"><i class="material_icons px_14">school</i>교육 중</button-->
						<!-- 식사 중 -->
						<!--button class="ag_state" id="agState09" name="agState09" onclick="changepuased(this,5)"><i class="material_icons px_14">restaurant</i>식사 중</button-->
						<!-- 휴식 중 -->
						<!--button class="ag_state" id="agState10" name="agState10" onclick="changepuased(this,14)"><i class="material_icons px_14">local_cafe</i>휴식 중</button-->
					</div>
				</div>

				<!-- PDS 대기 버튼 -->
				<button class="set_pds_ready dp_off" name="setAgStatePdsReady"><i class="material_icons px_14">dialer_sip</i>PDS 대기</button>
			</div><!-- agent_status end -->
		</div><!-- cti_wrap end -->

		<!-- Min-Width에 관한 Alert Message -->
		<div id="minWidthAlert" class="top_alert">
			<span>콜라비에서 제공하는 컨텐츠는 최소 "1920 픽셀" 이상의 가로 영역에서 올바르게 표시되도록 디자인 되었습니다.</span>
		</div>
	</header>

	<!------------------------------------------------------------------------------------
		Agent Common : CID Popup Modal Dialog (CID 팝업 모달다이얼로그)
	-------------------------------------------------------------------------------------->
		<!-- CID 팝업 다이얼로그 -->
	<script>
	/*
	$(function(){
		dialog = $("#cidPopup").dialog({
			autoOpen: false, resizable: false, modal: true, minHeight: 220, maxHeight: 520, width: 440, maxWidth: 800,
			show: { effect: "fade", duration: 300 }, hide: { effect: "fade", duration: 300 },
			buttons: [
				{"text": "취소", "class": "modal-close", "click": function() { $(this).dialog("close");}},
				{"text": "확인", "class": "modal-confirm", "click": function() { $(this).dialog("close");}}
			]
		});
	});

	$(".ci").on("click", function() {
		$("#cidPopup").dialog("open");
		$("#cidPopup").parent().draggable({handle: ".ui-widget-header"}, {containment: ".wrap"});
	});
	*/
	$(function(){
		$(".session_current").click(function(){
			$("#cidPopup").addClass("on");
			$("#cidPopup")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
		});
	
		$("#cidPopupClose").click(function(){
			$("#cidPopup").removeClass("on");
		});
	});

    function callLoadInfo()
    {   
        var CLIENT_CODE = window.parent.$("#CLIENT_CODE").val();
        var iframe1     = document.getElementById("contentFrame");
        iframe1.contentWindow.loadInfo(2,CLIENT_CODE);

        $("#cidPopup").removeClass("on");

        ANSWER_CALL();
    }

    // 내용 초기화
    function clearDataPopup()
    {
         $(".popup_content div").find(".col2").text("");
    }

	</script>

	<div id="cidPopup" class="">
		<div class="popup_header">
			<p>Please pick up the phone!<span class="dp_off">제목이 가로 폭을 초과 할 경우 Max-width 값을 참조하여 "..."으로 대체 표시됩니다.</span></p>
			<div id="cidPopupClose" class="popup_close"><i class="material_icons">close</i></div>
		</div><!-- popup_header end -->

		<div class="popup_content">
			<div class="">
				<span class="col1">서비스 번호 (Type)</span>
				<span class="col2"></span>
				<!--span class="col3">&lpar;대표번호&rpar;</span-->
			</div>
			<div class="">
				<span class="col1">고객 전화 번호</span>
				<span class="col2"></span>
                <span></span>
			</div>
			<div class="">
				<span class="col1">IVR 카테고리</span>
				<span class="col2">일반 상담</span>
			</div>
		</div><!-- popup_content end -->

		<div class="popup_footer">
			<!-- 전화 받기 -->
			<!--button class="answer_call green right" name="popupAnswerCall" id="popupAnswerCall" onclick="ANSWER_CALL();"><i class="material_icons px_14">call</i>받기</button-->
			<!-- 검색 (번호 검출) -->
			<button class="answer_call" name="popupSearchCid"  onclick="callLoadInfo();"><i class="material_icons px_14">call</i>받기</button>
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
			$("#cidPopupOverlap").addClass("on");
			$("#cidPopupOverlap")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
		});
	
		$("#OverlapCidPopupClose").click(function(){
			$("#cidPopupOverlap").removeClass("on");
		});
	});
	</script>

	<div id="cidPopupOverlap" class="">
		
	</div><!-- cidPopupOverlap end -->
	<!-- Dialog End -->
<!------------------------------------------------------------------------------------
	CMS Common : Aside include (좌측메뉴)
-------------------------------------------------------------------------------------->
	<script>

    $(document).ready(function(){
        LOAD_COUNSE_CNT();
        LOAD_AGENT_DATA();

        setInterval(LOAD_COUNSE_CNT, 3000);
        setInterval(LOAD_AGENT_DATA, 5000);
        /*

        SIPVIEW();
        LOAD_QUEUE_STATE();



        setInterval(SIPVIEW, 3000);
        setInterval(LOAD_QUEUE_STATE, 3000);
        */
    });

 // 실적 통화 연황, 상담 노트 현황
     function LOAD_COUNSE_CNT()
     {
         var ACODE = $("input[name=ACODE]").val();

         $.getJSON( "./load/agentCounselCnt.php",{ACODE:ACODE}, function(data) {
             if(data['COMPLETE'] != null)
             {
                 $("#complete").text(data['COMPLETE']);
             }
             else{
                 $("#complete").text(0);
             }

             if(data['HOLDING'] != null)
             {
                 $("#holding").text(data['HOLDING']);
             }
             else{
                 $("#holding").text(0);
             }

             if(data['FAIL'] != null)
             {
                 $("#fail").text(data['FAIL']);
             }
             else{
                 $("#fail").text(0);
             }

             if(data['ETCASKING'] != null)
             {
                 $("#etcasking").text(data['ETCASKING']);
             }
             else{
                 $("#etcasking").text(0);
             }
         });

     }

    function LOAD_AGENT_DATA()
    {
        var ACODE = $("input[name=ACODE]").val();

        $.getJSON( "./load/agentData.php",{ACODE:ACODE}, function(data){

            if(data['INCOUNT'] != null)
            {
                $("#incount").text(data['INCOUNT']);
            }

            if(data['OUTCOUNT'] != null)
            {
                $("#outcount").text(data['OUTCOUNT']);
            }
        });
    }

    function SIPVIEW(){
        var ACODE    = $("input[name=ACODE]").val();       // 접속아이디 (내선번호)        
        var wait_cnt = 0;

        $.getJSON("./load/sipView.php",{ACODE:ACODE},function(data){
    		$.each(data,function(key,val){
                if(key=="QUEUE_WATING"){ // 큐대기콜
                    if(val != null)
                    {
                        for(var I=0;I<val.length;I++){
                            wait_cnt = wait_cnt + parseInt(val[I]);
                        }
                        
                        $('#wait_queue').text(wait_cnt);
                    }
                }
            });
        });
    }

    function LOAD_QUEUE_STATE()
    {
        var ACODE = $("input[name=ACODE]").val();

        $.getJSON( "./load/agentState.php",{ACODE:ACODE}, function(data){

            if(data['CALLING'] != null)
            {
                $("#CALLING").text(data['CALLING']);
            }

            if(data['READY'] != null)
            {
                $("#READY").text(data['READY']);
            }
            if(data['AFTERWORK'] != null)
            {
                $("#AFTERWORK").text(data['AFTERWORK']);
            }
            if(data['NOTREADY'] != null)
            {
                $("#NOTREADY").text(data['NOTREADY']);
            }
        });
        

    }
    function pageMove(pageType)
    {
        console.log("pageType",pageType);

        //content.location.href="02_note_history/note_history.php";
        $("#PAGETYPE").val(pageType);


    }

    </script>
    <aside class="agent">
		<nav>
			<ul>
				<li class="root active"><a href="01_counseling_desk.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">dashboard</i>상담 데스크</a></li>
				<li class="root"><a href="02_note_history.php" class="nav" target="content" onclick="pageMove(2)"><i class="material_icons px_24">chrome_reader_mode</i>상담 노트</a></li>
				<li class="root"><a href="03_call_history.php" class="nav" target="content" onclick="pageMove(3)"><i class="material_icons px_24">playlist_play</i>통화 이력</a></li>
				<li class="root"><a href="04_callback.php" class="nav" target="content" onclick="pageMove(4)"><i class="material_icons px_24">call_missed</i>콜백 관리</a></li>
				<li class="root"><span class="nav" target="content" onclick="scriptPopup()"><i class="material_icons px_24">question_answer</i>스크립트</span></li>
				<li class="root"><a href="06_notice.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">event_note</i>공지사항</a></li>
				<li class="root"><a href="07_fax.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">print</i>FAX 내역</a></li>
				<li class="root"><a href="08_sms.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">sms</i>SMS 내역</a></li>
				<li class="root"><a href="09_campain.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">library_add</i>캠페인</a></li>
				<li class="root"><a href="10_campain_list.php" class="nav" target="content" onclick="pageMove(1)"><i class="material_icons px_24">library_books</i>캠페인 내역</a></li>

				
				<!--li class="root"><a href="05_qna/qna.php" class="nav" target="content"><i class="material_icons px_24">question_answer</i>Q&A</a></li-->
				<li class="root dp_off"><a href="" class="nav"><i class="material_icons px_24">home</i><!-- Home --></a></li>
				<li class="root dp_off"><i class="material_icons px_24">dashboard</i><!-- 대쉬보드 --></li>
				<li class="root dp_off"><span class="unlink"><i class="material_icons px_24">assessment</i>통화 통계<!-- 2nd menu, 콜통계 --></span>
					<ul>
						<li><a href="">1st menu (첫번째 메뉴)</a></li>
						<li><a href="">2nd menu (두번째 메뉴), 만약 두줄로 개행된다면?</a></li>
						<li><a href="">3rd menu (세번째 메뉴)</a></li>
						<li><a href="">4th menu (네번째 메뉴)</a></li>
						<li><a href="">5th menu (첫번째 메뉴)</a></li>
						<li><a href="">6th menu (두번째 메뉴)</a></li>
						<li><a href="">7th menu (세번째 메뉴)</a></li>
						<li><a href="">8th menu (네번째 메뉴)</a></li>
						<li><a href="">9th menu (첫번째 메뉴)</a></li>
					</ul>
				</li>
				<li class="root dp_off"><i class="material_icons px_24">list</i><!-- 3rd menu, 통화목록 -->
					<ul>
						<li><a href="">1st menu (첫번째 메뉴)</a></li>
						<li><a href="">2nd menu (두번째 메뉴)</a></li>
						<li><a href="">3rd menu (세번째 메뉴)</a></li>
						<li><a href="">4th menu (네번째 메뉴)</a></li>
					</ul>
				</li>
				<li class="root dp_off"><i class="material_icons px_24">event</i><!-- 4th menu, IVR 일정 -->
					<ul>
						<li><a href="">1st menu (첫번째 메뉴)</a></li>
						<li><a href="">2nd menu (두번째 메뉴)</a></li>
						<li><a href="">3rd menu (세번째 메뉴)</a></li>
						<li><a href="">4th menu (네번째 메뉴)</a></li>
					</ul>
				</li>
				<li class="root dp_off"><a href="" class="nav"><i class="material_icons px_24">supervisor_account</i><!-- 5th menu, 사용자 관리 --></a></li>
				<li class="root dp_off"><a href="" class="nav"><i class="material_icons px_24">settings_applications</i><!-- 6th menu, 시스템 설정 --></a></li>
				<li class="root dp_off"><i class="material_icons px_24">security</i><!-- 7th menu --></li>
				<li class="root dp_off"><i class="material_icons px_24">home</i><!-- 8th menu --></li>
				<li class="root dp_off"><i class="material_icons px_24">home</i><!-- 9th menu --></li>
				<li class="root dp_off"><i class="material_icons px_24">home</i><!-- Last menu --></li>
			</ul>
		</nav>


		<!------------------------------------------------------------------------------------
			Agent Common : CID Popup Modal Dialog (CID 팝업 모달다이얼로그)
		-------------------------------------------------------------------------------------->
			<!-- CID 팝업 다이얼로그 -->
		<script>
			function scriptPopup(){
				$("#scriptPopup").addClass("on");
				$("#scriptPopup")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
			}
			$(function(){
				$(".scriptPopup").click(function(){
					$("#scriptPopup").addClass("on");
					$("#scriptPopup")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
				});
			
				$("#scriptPopupClose").click(function(){
					$("#scriptPopup").removeClass("on");
				});
				$("#scriptPopupClose_foot").click(function(){
					$("#scriptPopup").removeClass("on");
				});
				/* 셀렉트릭 드롭다운 메뉴 */
				$('select').selectric({
					maxHeight: 200
				});

			});
		</script>

		<div id="scriptPopup" class="">
			<div class="popup_header">
				<p>스크립트<span class="dp_off">제목이 가로 폭을 초과 할 경우 Max-width 값을 참조하여 "..."으로 대체 표시됩니다.</span></p>
				<div id="scriptPopupClose" class="popup_close"><i class="material_icons">close</i></div>
			</div><!-- popup_header end -->

			<div class="popup_content">
				<div class="section_wrap_l60 boder_bt0">
					<div class="popup_seach mr_10" >
						<div class="obj_label w15 padding_none">
							<label for="clientName">대분류</label>
						</div>
						<div class="obj w20">
							<select id="" name="">
								<option value="0" selected>전체</option>
								<option value="1">옵션1</option>
								<option value="2">옵션2</option>
							</select>
						</div>
						<div class="obj w5">&nbsp;
						</div>
						<div class="obj w20">
							<select id="" name="">
								<option value="0" selected>전체</option>
								<option value="1">옵션1</option>
								<option value="2">옵션2</option>
							</select>
						</div>
						<div class="obj w20 padding_none">
							<input type="text" name="" id="clientName w100" value="">
						</div>
						<div class="obj w10 padding_none">
							<button class="box_style blue" name="" id="">검색</button>
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="mr_10 script_box1">
						<div class="content " id="" >
							<table id="" class="tablesorter">
								<thead>
									<tr>
										<th class="sort">등록일시</th>
										<th class="sort">대분류</th>
										<th class="sort">내 용</th>
										<th class="sort">등록자</th>
									</tr>
								</thead>
								<!-- 기본 행 10줄 기준 -->
								<tbody>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>
									<tr>
										<td>2017-07-18</td>
										<td>주문 문의</td>
										<td class="line_select">주문 문의</td>
										<td>홍길동</td>
									</tr>


									
									
								</tbody>
							</table>
						</div><!-- content end -->
					</div>


				</div>

				<div class="section_wrap_r40 boder_bt0">
					<div class="h470  script_box2">
						<div class="obj_label w20 padding_none">
							<label for="">제       목</label>
						</div>
						<div class="obj w80">
							<input type="text" name="" id="" value="">
						</div>

						<div class="obj w100">
							<div class="script_box2_content">
								내용이 들어가는 부분
							</div>
						</div>

						<div class="obj_label w20 padding_none">
							<label for="">첨부파일</label>
						</div>
						<div class="obj w65 padding_none">
							<input type="text" name="" id="" value="">
						</div>
						<div class="obj w15">
							<button class="box_style cyon right" type="button" name="" onclick="">다운로드</button>
						</div>
					</div>
				</div>

				
			</div><!-- popup_content end -->

			<div class="popup_footer ">
				<button class="blue" name="" id="scriptPopupClose_foot" >닫기</button>
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
				$("#cidPopupOverlap").addClass("on");
				$("#cidPopupOverlap")/* .parent() */.draggable({handle: ".popup_header p"}, {containment: ".wrap"});
			});
		
			$("#OverlapCidPopupClose").click(function(){
				$("#cidPopupOverlap").removeClass("on");
			});
		});
		</script>

		<div id="cidPopupOverlap" class="">
			
		</div><!-- cidPopupOverlap end -->
		<!-- Dialog End -->

		<!-- 컨택센터 현황 -->
		<div id="widget-321" class="aside_widget dp_off">
			<header>
				<p class="title"><i class="material_icons">info_outline</i>컨택센터 현황</p>
			</header>
			<div class="content">
				<table>
					<tbody>
						<tr title="상담원 연결을 기다리고 있는 고객 전화">
							<td>대기콜</td><!-- 상담원 통화 연결을 위해 기다리고 있는 고객 인바운드 대기 콜을 표시 -->
							<td class="value" id="wait_queue">0</td>
						</tr>
						<tr title="통화 중인 상담원 수">
							<td>상담중</td><!-- (목업은 통화중으로 표시되었으나 변경) 통화 중인 상담원 수를 표시 -->
							<td class="value" id="CALLING">0</td>
						</tr>
						<tr title="인바운드 통화 연결을 위해 CTI 상태가 대기중인 상담원 수">
							<td>대기중</td><!-- 인바운드 통화 연결을 위해 CTI 상태가 대기중인 상담원 수를 표시 -->
							<td class="value" id="READY">0</td>
						</tr>
						<tr title="통화 완료 후 상담내역에 관한 후처리 작업 중인 상담원 수">
							<td>후처리</td><!-- 통화 완료 후 상담내역에 관한 후처리 작업 중인 상담원 수를 표시 -->
							<td class="value" id="AFTERWORK">0</td>
						</tr>
						<tr title="후처리 외의 이석(다른업무, 자리비움, 회의, 교육, 식사, 휴식 등의 기타 상태로 전화를 받을 수 없는 상담원">
							<td>이석</td><!-- 전항의 상태를 제외한 이석 등의 기타 상태로 전화를 받을 수 없는 상담원에 해당 -->
							<td class="value" id="NOTREADY">0</td>
						</tr>
					</tbody>
				</table>
			</div><!-- content end -->
		</div><!-- widget-321 end -->

		<!-- 컨택센터 현황 -->
		<div id="widget-331" class="aside_widget">
			<header>
				<p class="title"><i class="material_icons">info_outline</i>컨택센터 현황</p>
			</header>
			<div class="content">
				<table>
					<tbody>
						<tr title="설명">
							<td>대기콜</td><!-- 대표번호를 통해 유입되 큐를 통해 내선 호출 후 받은 콜 수의 합 -->
							<td class="value" id="incount">0</td>
						</tr>
						<tr title="설명">
							<td>상담중</td><!-- 내선 발신을 제외한 외부 발신 콜 수의 합 -->
							<td class="value" id="outcount">0</td>
						</tr>
						<tr title="설명">
							<td>대기중</td><!-- 내선 발신을 제외한 외부 발신 콜 수의 합 -->
							<td class="value" id="outcount">0</td>
						</tr>
						<tr title="설명">
							<td>후처리</td><!-- 내선 발신을 제외한 외부 발신 콜 수의 합 -->
							<td class="value" id="outcount">0</td>
						</tr>
						<tr title="설명">
							<td>이석</td><!-- 내선 발신을 제외한 외부 발신 콜 수의 합 -->
							<td class="value" id="outcount">0</td>
						</tr>
					</tbody>
				</table>
			</div><!-- content end -->
		</div><!-- widget-331 end -->

		<!-- 개인 통화 현황 -->
		<div id="widget-301" class="aside_widget">
			<header>
				<p class="title"><i class="material_icons">info_outline</i>개인 통화 현황</p>
			</header>
			<div class="content">
				<table>
					<tbody>
						<tr title="대표번호 유입 콜 중 현재 접속중인 상담원이 받은 콜 수의 합을 의미합니다">
							<td>수신</td><!-- 대표번호를 통해 유입되 큐를 통해 내선 호출 후 받은 콜 수의 합 -->
							<td class="value" id="incount">0</td>
						</tr>
						<tr title="내선 발신을 제외한 외부 발신 콜 수의 합을 의미합니다">
							<td>발신</td><!-- 내선 발신을 제외한 외부 발신 콜 수의 합 -->
							<td class="value" id="outcount">0</td>
						</tr>
					</tbody>
				</table>
			</div><!-- content end -->
		</div><!-- widget-301 end -->

		<!-- 개인 상담 노트 현황 -->
		<div id="widget-311" class="aside_widget">
			<header>
				<p class="title"><i class="material_icons">info_outline</i>상담 노트 현황</p>
			</header>
			<div class="content">
				<table>
					<tbody>
						<tr title="상담 완료로 제출된 노트">
							<td>완료</td><!-- 완료로 제출된 노트의 합 -->
							<td class="value" id="complete">0</td>
						</tr>
						<tr title="상담노트가 보류로 제출된 노트">
							<td>미처리</td><!-- 보류로 제출된 노트의 합 -->
							<td class="value" id="holding">0</td>
						</tr>
						<tr title="상담노트가 실패로 제출된 노트">
							<td>예약</td><!-- 실패로 제출된 노트의 합 -->
							<td class="value" id="fail">0</td>
						</tr>
						<tr title="상담노트가 기타로 제출된 노트">
							<td>이관</td><!-- 기타로 제출된 노트의 합 -->
							<td class="value" id="etcasking">0</td>
						</tr>
					</tbody>
				</table>
			</div><!-- content end -->
		</div><!-- widget-311 end -->


	</aside>

<div class="wrap">
	<!-- 컨텐츠 출력을 위한 아이프레임 -->
	<iframe id="contentFrame" name="content" src="01_counseling_desk.php" frameborder="0" scrolling="auto" onload="changePage(this)"></iframe>
<!-- 	<iframe id="contentFrame" name="content" src="02_note_history/note_history.php" frameborder="0" scrolling="auto" onload="changePage(this)"></iframe> -->
<!-- 	<iframe id="contentFrame" name="content" src="03_call_history/call_history.php" frameborder="0" scrolling="auto" onload="changePage(this)"></iframe> -->
<!-- 	<iframe id="contentFrame" name="content" src="04_callback/callback.php" frameborder="0" scrolling="auto" onload="changePage(this)"></iframe> -->
</div><!-- wrap end -->

<div id="rightSpace"></div>

</body>
</html>