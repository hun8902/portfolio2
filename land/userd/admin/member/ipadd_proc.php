<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

$add_ip = $_POST['add_ip'];
$coment = $_POST['coment'];


$id_check = mq("select * from gosu_ip  where add_ip='$add_ip'");

$id_check = $id_check->fetch_array();
	if($id_check >= 1){
		echo "<script>alert('아이피가 중복됩니다.'); history.back();</script>";
	}else{
		$sql_log = "INSERT INTO `gosu_ip` (`add_ip`, `coment`) VALUES ('$add_ip', '$coment');";
		$result = mysqli_query($db , $sql_log);
		if($result === false){
			echo mysqli_error($db );
		};
		echo "<script>alert('등록이 완료되었습니다..'); location.href='member_ip.php'; </script>";
	};
?>
