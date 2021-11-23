<meta charset="utf-8">
<?
	//데이터 베이스 연결하기
	include "db_info.php";

	if(!isset($_GET['seq'])) die('ERROR : 어떤 글을 수정할지 알 수 없습니다.');
	$id = $_GET['seq'];

	// 글의 비밀번호를 가져온다.
	$query = "SELECT * FROM bbs WHERE seq=$seq";
	$result=$mysqli->query($query);
	$row= $result->fetch_array();
	
	$seq = $_POST['seq'];
	$title = $_POST['title'];
	$content = $_POST['content'];

	$query = "UPDATE bbs SET seq='$seq', uname='$uname',
	title='$title', content='$content', password='$password', comment_cnt='$comment_cnt', viewcnt='$viewcnt', createtime='$createtime' WHERE seq=$seq";
	$result=$mysqli->query($query);

	//데이터베이스와의 연결 종료
	$mysqli->close();

	//수정하기인 경우 수정된 글로..
	echo ("<meta http-equiv='Refresh' content='1; URL=mobileread.php?seq=$seq'>");
?>
<center>
<font size=2>정상적으로 수정되었습니다.</font>