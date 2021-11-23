<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

$memberId = $_POST['memberId'];
$passwd = $_POST['passwd'];
$u_name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$spot = $_POST['spot'];
$level = $_POST['level'];
$dateime = date("Y-m-d H:i:s");

$encrypted_passwd = password_hash($passwd, PASSWORD_DEFAULT);

$id_check = mq("select * from gosu_member  where id='$memberId'");
$id_check = $id_check->fetch_array();
	if($id_check >= 1){
		echo "<script>alert('아이디가 중복됩니다.'); history.back();</script>";
	}else{
		$sql_log = "INSERT INTO `gosu_member` (`id`, `name`, `passwd`, `level`, `department`, `spot`, `phone`, `email`, `dateime`) 
		VALUES ('$memberId', '$u_name', '$encrypted_passwd', '3', '$department','$spot ', '$phone', '$email', '$date');";
		
		$result = mysqli_query($db , $sql_log);
		if($result === false){
			echo mysqli_error($db );
		};
		echo "<script>alert('가입이 완료되었습니다..'); location.href='./nmember.php'; </script>";
	};
?>
