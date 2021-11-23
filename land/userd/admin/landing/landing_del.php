<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");
$idx = $_GET['idx'];

$id_check = mq("select * from landing_set where idx='$idx'");
$id_check = $id_check->fetch_array();

if($id_check <= 1){
	echo "<script>alert('존재하지 않습니다.'); history.back();</script>";
}else{
	$sql_log = "DELETE FROM landing_set WHERE  `idx`=$idx";
	$result = mysqli_query($db , $sql_log);
	if($result === false){
		echo mysqli_error($db );
	};
	echo "<script>alert('랜딩페이지 설정이 삭제 되었습니다.'); location.href='page_set.php'; </script>";
};


?>
