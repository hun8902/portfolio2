
<html>
<head>
<title>일반 게시판</title>
  <meta charset="utf-8">
<style>
<!--
td {font-size : 9pt; color:#333333}
A:link {font : 9pt; color : black; text-decoration : none;
font-family : 굴림; font-size : 9pt;}
A:visited {text-decoration : none; color : #333333; font-size : 9pt;}
A:hover {text-decoration : underline; color : #333333; 
font-size : 9pt;}
-->
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<br />
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<? 
	if(!isset($_GET['news_no'])) die('ERROR : 어떤 글을 삭제할지 알 수 없습니다.');
	$id = $_GET['news_no'];
?>
<form action=delete.php?news_no=<?=$news_no?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#cccccc>
<tr>
	<td align=center >
		<INPUT type=submit value="확 인">
		<INPUT type=button value="취 소" onclick="history.back(-1)">
	</td>
</tr>
</table>