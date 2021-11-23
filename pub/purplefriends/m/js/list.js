/*==========================================================
	파일명		:list.js
	파일설명		:게시판에서 게시물리스트처리용 함수들
	제  작		:백승현(gazerkr)
==========================================================*/

/***********************************************************
	함수명		:act_list(표시할 페이지)
	처리내용		:act_search()함수에서 검색문자가 없을경우 호출
				 되는 게시판리스트 처리함수
***********************************************************/
function act_list(pagenum) {
	REQ = newXMLHttpRequest();//req 객체반환
	var handlerFunction = processReqList;
	REQ.onreadystatechange = handlerFunction;//응답이 완료되면 자동으로 실행되도록 JavaScript 콜백 함수를 정의
	if( pagenum == 0 ){//페이지번호가 0일경우는 현재표시중인 페이지를 처리한다
		pagenum = THISPAGE;
	}else{
		THISPAGE = pagenum;
	}
	//요청처리
	REQ.open("POST", "act/act_list.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("page="+pagenum);
}

/***********************************************************
	함수명		:processReqList()
	처리내용		:리스트 출력용 콜백함수
***********************************************************/
// function from http://developer.apple.com/internet/webcontent/xmlhttpreq.html
// handle onreadystatechange event of req object
function processReqList() {
	// only if req shows "loaded"
	if (REQ.readyState == 4) {
		// only if "OK"
		if (REQ.status == 200) {
			printList();
		} else {
			alert("There was a problem retrieving the XML data:\n" +
			REQ.statusText);
		}
	}//if
}

/***********************************************************
	함수명		:printList()
	처리내용		:리스트 출력함수
***********************************************************/
function printList() {
	var lists = REQ.responseXML.getElementsByTagName("lists")[0]; //응답받은 XML에서 리스트내용을 전달
	var output = document.getElementById("out");//board.php에서의 출력부분
	var outhtml = "";//return할 HTML스트링
	output.innerHTML = "";//출력부분의 내용을 초기화
	
	var items = lists.getElementsByTagName("item"); //XML에서 표시할 게시물을 배열로 받는다.
	
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='0' align='center' class='list_table'>";
	
	if(items.length > 0){//게시물이 1견이라도 있을경우의 처리내용
		outhtml += "<TR>";
		outhtml += "  <TD class='list_th' width='50' align='center'>번호</TD>";
		outhtml += "  <TD class='list_th' align='center'>제 목</TD>";
		outhtml += "  <TD class='list_th' width='70' align='center'>작성자</TD>";
		outhtml += "  <TD class='list_th' width='70' align='center'>DATE</TD>";
		outhtml += "  <TD class='list_th' width='40' align='center'>조회</TD>";
		outhtml += "</TR>";
		
		for(var i=0; i<items.length; i++){//게시물 건수만큼 루프
			var item = items[i];
			
			var seq = item.getAttribute("seq");//게시물번호
			var uname = item.getElementsByTagName("uname")[0].firstChild.nodeValue;//게시물 작성자
			var title = item.getElementsByTagName("btitle")[0].firstChild.nodeValue;//게시물 제목
			var commentcnt = item.getElementsByTagName("bcommentcnt")[0].firstChild.nodeValue;//코멘트갯수
			var viewcnt = item.getElementsByTagName("bviewcnt")[0].firstChild.nodeValue;//게시물 조회수
			var createtime = item.getElementsByTagName("bcreatetime")[0].firstChild.nodeValue;//게시물 작성시간
			uname = toEntity(uname);//common.js의 내용참조
			title = toEntity(title);//common.js의 내용참조
			
			outhtml += "<TR>";
			outhtml += "  <TD class='list_td' align='center'>"+seq+"</TD>";
			outhtml += "  <TD class='list_td'><A onclick='act_view("+seq+");'>"+title+"</A> ("+commentcnt+")</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+uname+"</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+toDate(createtime)+"</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+viewcnt+"</TD>";
			outhtml += "</TR>";
		}

		var totalcnt = parseInt(lists.getAttribute("totalcnt"), 10);//총 게시물수 취득
		
		outhtml += func_paging(totalcnt);//common.js의 페이징함수 호출
	}else{
		outhtml += "<TR>";
		outhtml += "  <TD align='center'><B>표시할 데이타가 없습니다.</B></TD>";
		outhtml += "</TR>";
	}
	
	outhtml += "</TABLE>";
	output.innerHTML = outhtml;//출력부분에 결과리스트를 표시
}

/***********************************************************
	함수명		:act_search(표시할 페이지)
	처리내용		:검색문자열로 검색후 검색된 해당 게시물 표시처리
***********************************************************/
function act_search(pagenum) {
	var srch_opt = document.getElementById("search_option").value;//검색옵션
	var srch_val = document.getElementById("search_value").value;//검색어
	if( pagenum == 0 ){//페이지번호가 0일경우는 현재표시중인 페이지를 처리한다
		pagenum = THISPAGE;
	}else{
		THISPAGE = pagenum;
	}
	if( srch_val != "" ){//검색어가 있을경우의 처리
		REQ = newXMLHttpRequest();//req 객체반환
		var handlerFunction = processReqList;
		REQ.onreadystatechange = handlerFunction;
		
		REQ.open("POST", "act/act_search.php", true);
		REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		REQ.send("srch_opt="+srch_opt+"&srch_val="+srch_val+"&page="+pagenum);
	}else{//검색어가 없을경우에는 전체리스트를 표시한다.
		act_list(pagenum);
	}
}