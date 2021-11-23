/*==========================================================
	파일명		:common.js
	파일설명		:ajax에서 사용되는 공통함수들
	제  작		:백승현(gazerkr)
==========================================================*/

/***********************************************************
	함수명		:func_paging(총게시물수)
	처리내용		:페이징용 함수
***********************************************************/
function func_paging(totalcnt){
	var totpages = Math.ceil(totalcnt/LISTUNIT); //총페이지수
	var thisblock = Math.ceil(THISPAGE/PAGEUNIT); //현재 페이징블럭
	var startpage, endpage;
	var ret_HTML = "";
	
	// 현재 페이지블럭의 시작페이지번호
	if(thisblock > 1){
		startpage = (thisblock-1)*PAGEUNIT+1;
	}else{
		startpage = 1;
	}
	
	// 현재 페이지블럭의 끝페이지번호
	if( (thisblock*PAGEUNIT) >= totpages ){
		endpage = totpages;
	}else{
		endpage = thisblock*PAGEUNIT;
	}
	
	ret_HTML = "<TR>";
	ret_HTML += "  <TD align='center' colspan='5' class='paging_td'>";
	if(THISPAGE > 1){
		ret_HTML += "  [<A onclick='act_search(1);'><B>&lt;&lt;</B></A>]"; // 맨처음으로 가기
		ret_HTML += "  [<A onclick='act_search("+(THISPAGE-1)+");'><B>&lt;</B></A>]"; // 현재블럭의 전페이지
	}
	for(i=startpage; i<=endpage; i++){
		if(i!=THISPAGE){
			ret_HTML += " <A onclick='act_search("+i+");'>"+i+"</A>";
		}else{
			ret_HTML += " <B>"+i+"</B>";
		}
	}
	
	if(THISPAGE != totpages){
		ret_HTML += "  [<A onclick='act_search("+(THISPAGE+1)+");'><B>&gt;</B></A>]"; // 현재블럭의 다음페이지
		ret_HTML += "  [<A onclick='act_search("+totpages+");'><B>&gt;&gt;</B></A>]"; // 맨 마지막페이지
	}
	ret_HTML += "  </TD>";
	ret_HTML += "</TR>";
	
	return ret_HTML;
}

/***********************************************************
	함수명		:newXMLHttpRequest()
	처리내용		:요청객체를 생성후 반환
***********************************************************/
// function from http://www-128.ibm.com/developerworks/kr/library/j-ajax1/index.html
function newXMLHttpRequest() {
	var xmlreq = false;
	if (window.XMLHttpRequest) {
		// Create XMLHttpRequest object in non-Microsoft browsers
		xmlreq = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		// Create XMLHttpRequest via MS ActiveX
		try {
			// Try to create XMLHttpRequest in later versions
			// of Internet Explorer
			xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e1) {
			// Failed to create required ActiveXObject
			try {
				// Try version supported by older versions
				// of Internet Explorer
				xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e2) {
				// Unable to create an XMLHttpRequest with ActiveX
			}
		}
	}
	return xmlreq;
}
