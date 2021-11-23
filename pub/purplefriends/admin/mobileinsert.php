<meta charset="utf-8">
<?
	//데이터 베이스 연결하기
	include "db_info.php";

	//패스워드 암호화 작업
	$title = $_POST['title'];
	$content = $_POST['content'];


	$query = "INSERT INTO bbs 
	(seq, uname, title, content, password, comment_cnt, viewcnt, createtime)
	VALUES (NULL, 'admin', '$title', '$content', '1234', '', '', '')";
	$result=$mysqli->query($query);

	//데이터베이스와의 연결 종료
	$mysqli->close();

	// 새 글 쓰기인 경우 리스트로..
	echo ("<meta http-equiv='Refresh' content='1; URL=mobilelist.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>