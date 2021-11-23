/*==========================================================
	파일명		:write.js
	파일설명		:게시판에서 게시물작성처리용 함수들
	제  작		:백승현(gazerkr)
==========================================================*/

/***********************************************************
	함수명		:show_write()
	처리내용		:게시물 작성폼을 출력
***********************************************************/
function show_write() {
	var output = document.getElementById("out");
	var outhtml = "";
	
	output.innerHTML = "";
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='1' align='center' class='list_table'>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' align='right'>제목:</TD><TD class='list_td'><INPUT type='text' id='title'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right'>작성자:</TD><TD class='list_td'><INPUT type='text' id='uname'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right' valign='top'>내용:</TD><TD class='list_td'><TEXTAREA id='content'rows='10' cols='50'></TEXTAREA></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right'>비밀번호:</TD><TD class='list_td'><INPUT type='password' id='password'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='center' colspan='2'><INPUT type='button' value='&nbsp;&nbsp;&nbsp;&nbsp;전송&nbsp;&nbsp;&nbsp;&nbsp;' onClick='act_write();'></TD>";
	outhtml += "</TR>"
	outhtml += "</TABLE>";
	
	output.innerHTML = outhtml;
}

/***********************************************************
	함수명		:act_write()
	처리내용		:게시물 작성완료버튼을 눌렀을경우의 처리
***********************************************************/
function act_write() {
	REQ = newXMLHttpRequest();//req 객체반환
	var handlerFunction = processReqWrite;
	REQ.onreadystatechange = handlerFunction;//응답이 완료되면 자동으로 실행되도록 JavaScript 콜백 함수를 정의
	var title = document.getElementById("title").value;//작성한 게시물제목
	var uname = document.getElementById("uname").value;//작성한 게시물작성자
	var content = document.getElementById("content").value;//작성한 게시물내용
	var password = document.getElementById("password").value;//작성한 게시물비밀번호
	//요청처리
	REQ.open("POST", "act/act_write.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("title="+title+"&uname="+uname+"&content="+content+"&password="+password);
}
/***********************************************************
	함수명		:processReqWrite()
	처리내용		:게시물 작성후 처리될 콜백함수(작성후 게시물리스트를 표시한다)
***********************************************************/
function processReqWrite() {
	// only if req shows "loaded"
	if (REQ.readyState == 4) {
		// only if "OK"
		if (REQ.status == 200) {
			act_list(1);
		} else {
			alert("There was a problem retrieving the XML data:\n" +
			REQ.statusText);
		}
	}//if
}
