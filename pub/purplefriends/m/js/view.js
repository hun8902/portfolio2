/*==========================================================
	파일명		:view.js
	파일설명		:게시물보기처리용 함수들
	제  작		:백승현(gazerkr)
==========================================================*/

/***********************************************************
	함수명		:act_view(게시물번호)
	처리내용		:게시물을 클릭시 게시물내용을 출력
***********************************************************/
function act_view(seq) {
	REQ = newXMLHttpRequest();//req 객체반환
	var handlerFunction = processReqView;
	REQ.onreadystatechange = handlerFunction;//응답이 완료되면 자동으로 실행되도록 JavaScript 콜백 함수를 정의
	CURR_SEQ = seq;//선택된 게시물번호를 저장
	//요청처리
	REQ.open("POST", "act/act_view.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("seq="+seq);
}

/***********************************************************
	함수명		:processReqView()
	처리내용		:게시물내용 출력용 콜백함수
***********************************************************/
function processReqView() {
	// only if req shows "loaded"
	if (REQ.readyState == 4) {
		// only if "OK"
		if (REQ.status == 200) {
			printView();
		} else {
			alert("There was a problem retrieving the XML data:\n" +
			REQ.statusText);
		}
	}//if
}

/***********************************************************
	함수명		:printView()
	처리내용		:게시물내용 출력함수
***********************************************************/
function printView() {
	var lists = REQ.responseXML.getElementsByTagName("lists")[0]; //응답받은 XML에서 리스트내용을 전달
	var output = document.getElementById("out");//board.php에서의 출력부분
	var outhtml = "";//return할 HTML스트링
	output.innerHTML = "";//출력부분의 내용을 초기화
	
	var item = lists.getElementsByTagName("item")[0];//XML에서 표시할 게시물을 받는다.
	
	var seq = item.getAttribute("seq");//게시물번호
	var uname = item.getElementsByTagName("uname")[0].firstChild.nodeValue;//게시물작성자
	var title = item.getElementsByTagName("btitle")[0].firstChild.nodeValue;//게시물제목
	var content = item.getElementsByTagName("bcontent")[0].firstChild.nodeValue;//게시물내용
	var createtime = item.getElementsByTagName("bcreatetime")[0].firstChild.nodeValue;//게시물작성일
	
	uname = toEntity(uname);//common.js의 내용참조
	title = toEntity(title);//common.js의 내용참조
	content = toEntity(content);//common.js의 내용참조
	
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='0' align='center' class='list_table'>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' width='50'>번호</TD><TD class='list_td'>" + seq + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>제목</TD><TD class='list_td'>" + title + "</A></TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>작성자</TD><TD class='list_td'>" + uname + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>작성일</TD><TD class='list_td'>" + toDate(createtime) + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' valign='top'>내용</TD><TD class='list_td'>" + content.replace(/\n/g,"<BR/>") + "</TD>";
	outhtml += "</TR>";
	outhtml += "</TABLE><BR/>";
	
	var comments = item.getElementsByTagName("comment");
	
	if(comments.length > 0){
		outhtml += "<TABLE border='0' cellpadding='3' cellspacing='0' align='center' class='comment_table'>";
		
		for(var i=0; i<comments.length; i++){
			var comment = comments[i];
			
			var cmtno = comment.getElementsByTagName("cno")[0].firstChild.nodeValue;
			var cmtuser = comment.getElementsByTagName("cuname")[0].firstChild.nodeValue;
			var cmtcontent = comment.getElementsByTagName("ccontent")[0].firstChild.nodeValue;
			var cmtcreatetime = comment.getElementsByTagName("ccreatetime")[0].firstChild.nodeValue;
			cmtuser = toEntity(cmtuser);//common.js의 내용참조
			cmtcontent = toEntity(cmtcontent);
			cmtcreatetime = toDate(cmtcreatetime);
			
			outhtml += "<TR><TD class='comment_td'>";
			outhtml += " " + cmtcontent.replace(/\n/g,"<BR/>") + " <B>" + cmtuser + "</B> " + cmtcreatetime;
			outhtml += "</TD></TR>";
		}
		
		outhtml += "</TABLE><BR/>";
	}
	
	outhtml += printCommentForm();//comment달기 폼을 출력
	
	output.innerHTML = outhtml;
}

/***********************************************************
	함수명		:printCommentForm()
	처리내용		:comment달기 폼을 return
***********************************************************/
function printCommentForm(){
	var ret_Html = "";
	
	ret_Html += "<TABLE border='0' cellpadding='2' cellspacing='0' align='center' class='comment_form_table'>";
	ret_Html += "<TR><TD colspan='3'><B>코멘트작성</B></TD></TR>";
	ret_Html += "<TR>";
	ret_Html += "  <TD valign='top'>";
	ret_Html += "    이름<BR/><INPUT type='text' id='cmt_user' size='10' class='inputM'><BR/>";
	ret_Html += "    비밀번호<BR/><INPUT type='password' id='cmt_password' size='10' class='inputM'>";
	ret_Html += "  </TD>";
	ret_Html += "  <TD valign='top'>내용<BR/><TEXTAREA id='cmt_content'rows='4' cols='40' class='inputM'></TEXTAREA></TD>";
	ret_Html += "</TR>";
	ret_Html += "<TR><TD colspan='3' align='center'><INPUT type='button' value='코멘트작성' onclick='act_comment();'></TD></TR>";
	ret_Html += "</TABLE><BR/>";
	
	return ret_Html;
}

/***********************************************************
	함수명		:act_comment()
	처리내용		:코멘트 처리용 함수
***********************************************************/
function act_comment() {
	REQ = newXMLHttpRequest();//req 객체반환
	var handlerFunction = processReqComment;
	REQ.onreadystatechange = handlerFunction;//응답이 완료되면 자동으로 실행되도록 JavaScript 콜백 함수를 정의
	
	var uname = document.getElementById("cmt_user").value;//작성한 게시물작성자
	var content = document.getElementById("cmt_content").value;//작성한 게시물내용
	var password = document.getElementById("cmt_password").value;//작성한 게시물비밀번호
	//요청처리
	REQ.open("POST", "act/act_comment.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("seq="+CURR_SEQ+"&uname="+uname+"&content="+content+"&password="+password);
}

/***********************************************************
	함수명		:processReqComment()
	처리내용		:코멘트 작성후 처리될 콜백함수
***********************************************************/
function processReqComment() {
	// only if req shows "loaded"
	if (REQ.readyState == 4) {
		// only if "OK"
		if (REQ.status == 200) {
			act_view(CURR_SEQ);
		} else {
			alert("There was a problem retrieving the XML data:\n" +
			REQ.statusText);
		}
	}//if
}