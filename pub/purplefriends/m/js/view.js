/*==========================================================
	���ϸ�		:view.js
	���ϼ���		:�Խù�����ó���� �Լ���
	��  ��		:�����(gazerkr)
==========================================================*/

/***********************************************************
	�Լ���		:act_view(�Խù���ȣ)
	ó������		:�Խù��� Ŭ���� �Խù������� ���
***********************************************************/
function act_view(seq) {
	REQ = newXMLHttpRequest();//req ��ü��ȯ
	var handlerFunction = processReqView;
	REQ.onreadystatechange = handlerFunction;//������ �Ϸ�Ǹ� �ڵ����� ����ǵ��� JavaScript �ݹ� �Լ��� ����
	CURR_SEQ = seq;//���õ� �Խù���ȣ�� ����
	//��ûó��
	REQ.open("POST", "act/act_view.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("seq="+seq);
}

/***********************************************************
	�Լ���		:processReqView()
	ó������		:�Խù����� ��¿� �ݹ��Լ�
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
	�Լ���		:printView()
	ó������		:�Խù����� ����Լ�
***********************************************************/
function printView() {
	var lists = REQ.responseXML.getElementsByTagName("lists")[0]; //������� XML���� ����Ʈ������ ����
	var output = document.getElementById("out");//board.php������ ��ºκ�
	var outhtml = "";//return�� HTML��Ʈ��
	output.innerHTML = "";//��ºκ��� ������ �ʱ�ȭ
	
	var item = lists.getElementsByTagName("item")[0];//XML���� ǥ���� �Խù��� �޴´�.
	
	var seq = item.getAttribute("seq");//�Խù���ȣ
	var uname = item.getElementsByTagName("uname")[0].firstChild.nodeValue;//�Խù��ۼ���
	var title = item.getElementsByTagName("btitle")[0].firstChild.nodeValue;//�Խù�����
	var content = item.getElementsByTagName("bcontent")[0].firstChild.nodeValue;//�Խù�����
	var createtime = item.getElementsByTagName("bcreatetime")[0].firstChild.nodeValue;//�Խù��ۼ���
	
	uname = toEntity(uname);//common.js�� ��������
	title = toEntity(title);//common.js�� ��������
	content = toEntity(content);//common.js�� ��������
	
	outhtml += "<TABLE border='0' cellpadding='3' cellspacing='0' align='center' class='list_table'>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' width='50'>��ȣ</TD><TD class='list_td'>" + seq + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>����</TD><TD class='list_td'>" + title + "</A></TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>�ۼ���</TD><TD class='list_td'>" + uname + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td'>�ۼ���</TD><TD class='list_td'>" + toDate(createtime) + "</TD>";
	outhtml += "</TR>";
	outhtml += "<TR>";
	outhtml += "  <TD class='list_td' valign='top'>����</TD><TD class='list_td'>" + content.replace(/\n/g,"<BR/>") + "</TD>";
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
			cmtuser = toEntity(cmtuser);//common.js�� ��������
			cmtcontent = toEntity(cmtcontent);
			cmtcreatetime = toDate(cmtcreatetime);
			
			outhtml += "<TR><TD class='comment_td'>";
			outhtml += " " + cmtcontent.replace(/\n/g,"<BR/>") + " <B>" + cmtuser + "</B> " + cmtcreatetime;
			outhtml += "</TD></TR>";
		}
		
		outhtml += "</TABLE><BR/>";
	}
	
	outhtml += printCommentForm();//comment�ޱ� ���� ���
	
	output.innerHTML = outhtml;
}

/***********************************************************
	�Լ���		:printCommentForm()
	ó������		:comment�ޱ� ���� return
***********************************************************/
function printCommentForm(){
	var ret_Html = "";
	
	ret_Html += "<TABLE border='0' cellpadding='2' cellspacing='0' align='center' class='comment_form_table'>";
	ret_Html += "<TR><TD colspan='3'><B>�ڸ�Ʈ�ۼ�</B></TD></TR>";
	ret_Html += "<TR>";
	ret_Html += "  <TD valign='top'>";
	ret_Html += "    �̸�<BR/><INPUT type='text' id='cmt_user' size='10' class='inputM'><BR/>";
	ret_Html += "    ��й�ȣ<BR/><INPUT type='password' id='cmt_password' size='10' class='inputM'>";
	ret_Html += "  </TD>";
	ret_Html += "  <TD valign='top'>����<BR/><TEXTAREA id='cmt_content'rows='4' cols='40' class='inputM'></TEXTAREA></TD>";
	ret_Html += "</TR>";
	ret_Html += "<TR><TD colspan='3' align='center'><INPUT type='button' value='�ڸ�Ʈ�ۼ�' onclick='act_comment();'></TD></TR>";
	ret_Html += "</TABLE><BR/>";
	
	return ret_Html;
}

/***********************************************************
	�Լ���		:act_comment()
	ó������		:�ڸ�Ʈ ó���� �Լ�
***********************************************************/
function act_comment() {
	REQ = newXMLHttpRequest();//req ��ü��ȯ
	var handlerFunction = processReqComment;
	REQ.onreadystatechange = handlerFunction;//������ �Ϸ�Ǹ� �ڵ����� ����ǵ��� JavaScript �ݹ� �Լ��� ����
	
	var uname = document.getElementById("cmt_user").value;//�ۼ��� �Խù��ۼ���
	var content = document.getElementById("cmt_content").value;//�ۼ��� �Խù�����
	var password = document.getElementById("cmt_password").value;//�ۼ��� �Խù���й�ȣ
	//��ûó��
	REQ.open("POST", "act/act_comment.php", true);
	REQ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	REQ.send("seq="+CURR_SEQ+"&uname="+uname+"&content="+content+"&password="+password);
}

/***********************************************************
	�Լ���		:processReqComment()
	ó������		:�ڸ�Ʈ �ۼ��� ó���� �ݹ��Լ�
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