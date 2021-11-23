/*==========================================================
	���ϸ�		:common.js
	���ϼ���		:ajax���� ���Ǵ� �����Լ���
	��  ��		:�����(gazerkr)
==========================================================*/

/***********************************************************
	�Լ���		:func_paging(�ѰԽù���)
	ó������		:����¡�� �Լ�
***********************************************************/
function func_paging(totalcnt){
	var totpages = Math.ceil(totalcnt/LISTUNIT); //����������
	var thisblock = Math.ceil(THISPAGE/PAGEUNIT); //���� ����¡��
	var startpage, endpage;
	var ret_HTML = "";
	
	// ���� ���������� ������������ȣ
	if(thisblock > 1){
		startpage = (thisblock-1)*PAGEUNIT+1;
	}else{
		startpage = 1;
	}
	
	// ���� ���������� ����������ȣ
	if( (thisblock*PAGEUNIT) >= totpages ){
		endpage = totpages;
	}else{
		endpage = thisblock*PAGEUNIT;
	}
	
	ret_HTML = "<TR>";
	ret_HTML += "  <TD align='center' colspan='5' class='paging_td'>";
	if(THISPAGE > 1){
		ret_HTML += "  [<A onclick='act_search(1);'><B>&lt;&lt;</B></A>]"; // ��ó������ ����
		ret_HTML += "  [<A onclick='act_search("+(THISPAGE-1)+");'><B>&lt;</B></A>]"; // ������� ��������
	}
	for(i=startpage; i<=endpage; i++){
		if(i!=THISPAGE){
			ret_HTML += " <A onclick='act_search("+i+");'>"+i+"</A>";
		}else{
			ret_HTML += " <B>"+i+"</B>";
		}
	}
	
	if(THISPAGE != totpages){
		ret_HTML += "  [<A onclick='act_search("+(THISPAGE+1)+");'><B>&gt;</B></A>]"; // ������� ����������
		ret_HTML += "  [<A onclick='act_search("+totpages+");'><B>&gt;&gt;</B></A>]"; // �� ������������
	}
	ret_HTML += "  </TD>";
	ret_HTML += "</TR>";
	
	return ret_HTML;
}

/***********************************************************
	�Լ���		:newXMLHttpRequest()
	ó������		:��û��ü�� ������ ��ȯ
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
