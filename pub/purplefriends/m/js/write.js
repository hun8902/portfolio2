/*==========================================================
	���ϸ�		:write.js
	���ϼ���		:�Խ��ǿ��� �Խù��ۼ�ó���� �Լ���
	��  ��		:�����(gazerkr)
==========================================================*/

/***********************************************************
	�Լ���		:show_write()
	ó������		:�Խù� �ۼ����� ���
***********************************************************/
function show_write() {
	var output = document.getElementById("out");
	var outhtml = "";
	
	output.innerHTML = "";
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='1' align='center' class='list_table'>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' align='right'>����:</TD><TD class='list_td'><INPUT type='text' id='title'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right'>�ۼ���:</TD><TD class='list_td'><INPUT type='text' id='uname'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right' valign='top'>����:</TD><TD class='list_td'><TEXTAREA id='content'rows='10' cols='50'></TEXTAREA></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='right'>��й�ȣ:</TD><TD class='list_td'><INPUT type='password' id='password'></TD>";
	outhtml += "</TR><TR>";
	outhtml += "  <TD class='list_td' align='center' colspan='2'><INPUT type='button' value='&nbsp;&nbsp;&nbsp;&nbsp;����&nbsp;&nbsp;&nbsp;&nbsp;' onClick='act_write();'></TD>";
	outhtml += "</TR>"
	outhtml += "</TABLE>";
	
	output.innerHTML = outhtml;
}

/***********************************************************
	�Լ���		:act_write()
	ó������		:�Խù� �ۼ��Ϸ��ư�� ����������� ó��
***********************************************************/
function act_write() {
	REQ = newXMLHttpRequest();//req ��ü��ȯ
	var handlerFunction = processReqWrite;
	REQ.onreadystatechange = handlerFunction;//������ �Ϸ�Ǹ� �ڵ����� ����ǵ��� JavaScript �ݹ� �Լ��� ����
	var title = document.getElementById("title").value;//�ۼ��� �Խù�����
	var uname = document.getElementById("uname").value;//�ۼ��� �Խù��ۼ���
	var content = document.getElementById("content").value;//�ۼ��� �Խù�����
	var password = document.getElementById("password").value;//�ۼ��� �Խù���й�ȣ
	//��ûó��
	REQ.open("POST", "act/act_write.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("title="+title+"&uname="+uname+"&content="+content+"&password="+password);
}
/***********************************************************
	�Լ���		:processReqWrite()
	ó������		:�Խù� �ۼ��� ó���� �ݹ��Լ�(�ۼ��� �Խù�����Ʈ�� ǥ���Ѵ�)
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
