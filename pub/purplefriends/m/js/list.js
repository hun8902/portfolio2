/*==========================================================
	���ϸ�		:list.js
	���ϼ���		:�Խ��ǿ��� �Խù�����Ʈó���� �Լ���
	��  ��		:�����(gazerkr)
==========================================================*/

/***********************************************************
	�Լ���		:act_list(ǥ���� ������)
	ó������		:act_search()�Լ����� �˻����ڰ� ������� ȣ��
				 �Ǵ� �Խ��Ǹ���Ʈ ó���Լ�
***********************************************************/
function act_list(pagenum) {
	REQ = newXMLHttpRequest();//req ��ü��ȯ
	var handlerFunction = processReqList;
	REQ.onreadystatechange = handlerFunction;//������ �Ϸ�Ǹ� �ڵ����� ����ǵ��� JavaScript �ݹ� �Լ��� ����
	if( pagenum == 0 ){//��������ȣ�� 0�ϰ��� ����ǥ������ �������� ó���Ѵ�
		pagenum = THISPAGE;
	}else{
		THISPAGE = pagenum;
	}
	//��ûó��
	REQ.open("POST", "act/act_list.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("page="+pagenum);
}

/***********************************************************
	�Լ���		:processReqList()
	ó������		:����Ʈ ��¿� �ݹ��Լ�
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
	�Լ���		:printList()
	ó������		:����Ʈ ����Լ�
***********************************************************/
function printList() {
	var lists = REQ.responseXML.getElementsByTagName("lists")[0]; //������� XML���� ����Ʈ������ ����
	var output = document.getElementById("out");//board.php������ ��ºκ�
	var outhtml = "";//return�� HTML��Ʈ��
	output.innerHTML = "";//��ºκ��� ������ �ʱ�ȭ
	
	var items = lists.getElementsByTagName("item"); //XML���� ǥ���� �Խù��� �迭�� �޴´�.
	
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='0' align='center' class='list_table'>";
	
	if(items.length > 0){//�Խù��� 1���̶� ��������� ó������
		outhtml += "<TR>";
		outhtml += "  <TD class='list_th' width='50' align='center'>��ȣ</TD>";
		outhtml += "  <TD class='list_th' align='center'>�� ��</TD>";
		outhtml += "  <TD class='list_th' width='70' align='center'>�ۼ���</TD>";
		outhtml += "  <TD class='list_th' width='70' align='center'>DATE</TD>";
		outhtml += "  <TD class='list_th' width='40' align='center'>��ȸ</TD>";
		outhtml += "</TR>";
		
		for(var i=0; i<items.length; i++){//�Խù� �Ǽ���ŭ ����
			var item = items[i];
			
			var seq = item.getAttribute("seq");//�Խù���ȣ
			var uname = item.getElementsByTagName("uname")[0].firstChild.nodeValue;//�Խù� �ۼ���
			var title = item.getElementsByTagName("btitle")[0].firstChild.nodeValue;//�Խù� ����
			var commentcnt = item.getElementsByTagName("bcommentcnt")[0].firstChild.nodeValue;//�ڸ�Ʈ����
			var viewcnt = item.getElementsByTagName("bviewcnt")[0].firstChild.nodeValue;//�Խù� ��ȸ��
			var createtime = item.getElementsByTagName("bcreatetime")[0].firstChild.nodeValue;//�Խù� �ۼ��ð�
			uname = toEntity(uname);//common.js�� ��������
			title = toEntity(title);//common.js�� ��������
			
			outhtml += "<TR>";
			outhtml += "  <TD class='list_td' align='center'>"+seq+"</TD>";
			outhtml += "  <TD class='list_td'><A onclick='act_view("+seq+");'>"+title+"</A> ("+commentcnt+")</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+uname+"</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+toDate(createtime)+"</TD>";
			outhtml += "  <TD class='list_td' align='center'>"+viewcnt+"</TD>";
			outhtml += "</TR>";
		}

		var totalcnt = parseInt(lists.getAttribute("totalcnt"), 10);//�� �Խù��� ���
		
		outhtml += func_paging(totalcnt);//common.js�� ����¡�Լ� ȣ��
	}else{
		outhtml += "<TR>";
		outhtml += "  <TD align='center'><B>ǥ���� ����Ÿ�� �����ϴ�.</B></TD>";
		outhtml += "</TR>";
	}
	
	outhtml += "</TABLE>";
	output.innerHTML = outhtml;//��ºκп� �������Ʈ�� ǥ��
}

/***********************************************************
	�Լ���		:act_search(ǥ���� ������)
	ó������		:�˻����ڿ��� �˻��� �˻��� �ش� �Խù� ǥ��ó��
***********************************************************/
function act_search(pagenum) {
	var srch_opt = document.getElementById("search_option").value;//�˻��ɼ�
	var srch_val = document.getElementById("search_value").value;//�˻���
	if( pagenum == 0 ){//��������ȣ�� 0�ϰ��� ����ǥ������ �������� ó���Ѵ�
		pagenum = THISPAGE;
	}else{
		THISPAGE = pagenum;
	}
	if( srch_val != "" ){//�˻�� ��������� ó��
		REQ = newXMLHttpRequest();//req ��ü��ȯ
		var handlerFunction = processReqList;
		REQ.onreadystatechange = handlerFunction;
		
		REQ.open("POST", "act/act_search.php", true);
		REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		REQ.send("srch_opt="+srch_opt+"&srch_val="+srch_val+"&page="+pagenum);
	}else{//�˻�� ������쿡�� ��ü����Ʈ�� ǥ���Ѵ�.
		act_list(pagenum);
	}
}