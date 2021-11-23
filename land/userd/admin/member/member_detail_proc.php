<?php
session_start();
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
$idx = $_POST['idx'];
$dateime = date("Y-m-d H:i:s");
$encrypted_passwd = password_hash($passwd, PASSWORD_DEFAULT);

$id_check = mq("select id from gosu_member where id='$memberId'");
$id_check = $id_check->fetch_array();


if($level == "1" || $id_check['id'] == $_SESSION["id"]){
	$sql_log = "UPDATE gosu_member SET 
	`id`='$memberId',
	`name`='$u_name',
	`passwd`='$encrypted_passwd',
	`level`='$level',
	`department`='$department',
	`spot`='$spot',
	`phone`='$phone',
	`email`='$email'
	WHERE  `idx`=$idx;";

	$result = mysqli_query($db , $sql_log);
	if($result === false){
		echo mysqli_error($db );
	};

echo "<script>alert('업데이트가 완료되었습니다.'); location.href='member.php'; </script>";
}else{	
 echo "<script>alert('접근권한이 없습니다.'); location.href='member.php'; </script>";
}
?>
