<?
//데이터 베이스 연결하기
include "db_info.php";

if(!isset($_GET['seq'])) die('ERROR : 어떤 글을 삭제할지 알 수 없습니다.');
$id = $_GET['seq'];

$result=$mysqli->query("SELECT * FROM bbs WHERE seq=$seq");
$row = $result->fetch_array();

$query = "DELETE FROM bbs WHERE seq=$seq ";
	$result=$mysqli->query($query);

?>
<meta charset="utf-8">
<center>
<meta http-equiv='Refresh' content='1; URL=mobilelist.php'>
<FONT size=2 >삭제되었습니다.</font>