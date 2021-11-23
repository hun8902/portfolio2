<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");


$title = $_POST['title'];
$startland = $_POST['startland'];
$randland = $_POST['randland'];
$info = $_POST['info'];
$memo = $_POST['memo'];
$real_fd = md5(sha1($_POST['startland']));

if($randland == "1"){
	$randland_cnt = "1";
}else{
	$randland_cnt = "0";
};
$id_check = mq("select * from landing_set where title='$title'");
$id_check = $id_check->fetch_array();
if($id_check >= 1){
	echo "<script>alert('이미 등록되어있습니다.'); </script>";
}else{
	$sql_log = "INSERT INTO landing_set (`title`, `startland`, `randland`, `info`, `memo`, `real_fd`) 
	VALUES ('$title', '$startland', '$randland_cnt', '$info','$memo','$real_fd');";


	
	$result = mysqli_query($db , $sql_log);
	if($result === false){
		echo mysqli_error($db );
	};
	echo "<script>alert('등록이 완료되었습니다..'); location.href='./page_set.php'; </script>";
};


?>
