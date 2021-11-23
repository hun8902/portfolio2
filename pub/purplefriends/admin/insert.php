<meta charset="utf-8">
<?
	//데이터 베이스 연결하기
	include "db_info.php";

	//패스워드 암호화 작업
	$news_title = $_POST['news_title'];
	$news_text = $_POST['news_text'];
	$news_content = $_POST['news_content'];
	$news_date = $_POST['news_date'];


	$query = "INSERT INTO purple_news 
	(news_no, news_title, news_text, news_content, news_date)
	VALUES (NULL, '$news_title', '$news_text', '$news_content', '$news_date')";
	$result=$mysqli->query($query);

	//데이터베이스와의 연결 종료
	$mysqli->close();

	// 새 글 쓰기인 경우 리스트로..
	echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>