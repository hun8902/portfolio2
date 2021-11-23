<?php
	require_once "include/config.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=euc-kr">
<META http-equiv="keywords" content="">
<META http-equiv="description" content="">
<META http-equiv="robots" content="noindex">
<META http-equiv="pragma" content="no-cache">
<META http-equiv="Content-Style-Type" content="text/css">
<META http-equiv="Content-Script-Type" content="text/javascript">
<SCRIPT language="javascript">
	var REQ; //요청객체용
	var THISPAGE = 1; //현재의 페이지번호(처음열릴경우 1을 갖는다)
	var CURR_SEQ; //현재 읽고있는 게시물번호
	var LISTUNIT=<?php echo $listUnit;?>;
	var PAGEUNIT=<?php echo $pageUnit;?>;
</SCRIPT>
<SCRIPT src="./js/func.js" language="javascript"></SCRIPT>
<SCRIPT src="./js/common.js" language="javascript"></SCRIPT>
<SCRIPT src="./js/list.js" language="javascript"></SCRIPT>
<SCRIPT src="./js/write.js" language="javascript"></SCRIPT>
<SCRIPT src="./js/view.js" language="javascript"></SCRIPT>
<LINK rel="stylesheet" type="text/css" href="css.css">

</HEAD>

<BODY onLoad="act_search(1);">

<TABLE width="550" border="0" cellpadding="0" cellspacing="0" align="center" class="layout_table">
<TR>
	<TD><DIV id="out" align="center"></DIV></TD>
</TR>
</TABLE>

<BR/>
<DIV id="buttons" align="center">
<TABLE width="550" border="0" cellpadding="4" cellspacing="0" align="center">
<TR>
	<TD align="left">
	<INPUT type="button" id="bt_list" value="목록으로" onClick="act_search(0);">  
	<INPUT type="button" id="bt_write" value="쓰기" onClick="show_write();">  
	<INPUT type="button" id="bt_edit" value="수정" DISABLED>  
	<INPUT type="button" id="bt_delete" value="삭제" DISABLED>  
	</TD>
	
	<TD align="right">
	<SELECT id="search_option" onchange="act_search(0);">
		<OPTION value="title" SELECTED>제목</OPTION>
		<OPTION value="content">내용</OPTION>
		<OPTION value="uname">작성자</OPTION>
	</SELECT>
	<INPUT type="text" autocomplete="off" value="" size="10" id="search_value" onkeyup="act_search(1);">
	<INPUT type="button" id="bt_search" value="검색" onClick="act_search(1);">
	</TD>
</TR>
</TABLE>
</DIV>
</BODY>
</HTML>