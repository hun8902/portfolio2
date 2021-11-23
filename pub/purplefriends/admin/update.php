<meta charset="utf-8">
<?
	//데이터 베이스 연결하기
	include "db_info.php";

	if(!isset($_GET['news_no'])) die('ERROR : 어떤 글을 수정할지 알 수 없습니다.');
	$id = $_GET['news_no'];

	// 글의 비밀번호를 가져온다.
	$query = "SELECT * FROM purple_news WHERE news_no=$news_no";
	$result=$mysqli->query($query);
	$row= $result->fetch_array();
	
	$unews_no = $_POST['unews_no'];
	$news_title = $_POST['news_title'];
	$news_text = $_POST['news_text'];
	$news_content = $_POST['news_content'];
	$news_date = $_POST['news_date'];

	$query = "UPDATE purple_news SET news_no='$unews_no', news_title='$news_title',
	news_text='$news_text', news_content='$news_content', news_date='$news_date' WHERE news_no=$news_no";
	$result=$mysqli->query($query);

	//데이터베이스와의 연결 종료
	$mysqli->close();

	//수정하기인 경우 수정된 글로..
	echo ("<meta http-equiv='Refresh' content='1; URL=read.php?news_no=$news_no'>");
?>
<center>
<font size=2>정상적으로 수정되었습니다.</font>