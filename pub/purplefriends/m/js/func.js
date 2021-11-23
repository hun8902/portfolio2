/*==========================================================
	���ϸ�		:func.js
	���ϼ���		:�ڹٽ�ũ��Ʈ������ ���Ǵ� �Ϸ��� �Լ���
	��  ��		:�����(gazerkr)
==========================================================*/

/***********************************************************
	�Լ���		:replace123(str1, str2, str3)
	ó������		:str3���� str1�� str2�� ��ȯ�Ͽ� ��ȯ
***********************************************************/
function replace123(str1, str2, str3){
    var rgexp = new RegExp(str1,"g");
    return (str3.replace(rgexp, str2));
}

/***********************************************************
	�Լ���		:toEntity(strHtml)
	ó������		:Ư�� ����(<)�� HTML ����Ƽ�� ��ȯ�� ��ȯ
***********************************************************/
function toEntity(strHtml){
	return replace123("<","&lt;",strHtml);
}

/***********************************************************
	�Լ���		:toDate(timestamp)
	ó������		:SQL������ ����timestamp������ ����������
				 ������������ ��ȯ(��:2006.01.01)
***********************************************************/
function toDate(timestamp){
	var strYY;
	var strMM;
	var strDD;
	
	timestamp = replace123("-","",timestamp);
	timestamp = replace123("/","",timestamp);
	timestamp = replace123(":","",timestamp);
	
	strYY = timestamp.substr(0,4);
	strMM = timestamp.substr(4,2);
	strDD = timestamp.substr(6,2);
	return strYY+"."+strMM+"."+strDD;
}