<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

$idx = $_POST['idx'];
$title = $_POST['title'];
$startland = $_POST['startland'];
$randland = $_POST['randland'];
$info = $_POST['info'];
$memo = $_POST['memo'];
$real_fd = md5(sha1($_POST['startland']));

if($randland = NULL){
	$randland_cnt = "0";
}else{
	$randland_cnt = "1";
};


$sql_log = "UPDATE landing_set SET 
`title`='$title',
`startland`='$startland',
`randland`='$randland_cnt',
`info`='$info',
`memo`='$memo',
real_fd='$real_fd'
WHERE  `idx`=$idx;";

$result = mysqli_query($db , $sql_log);
if($result === false){
	echo mysqli_error($db );
};
echo "<script>alert('업데이트가 완료되었습니다.'); location.href='page_set.php'; </script>";


/*
if($level == "1" ){
	$sql_log = "UPDATE landing_set SET 
	`title`='$title',
	`startland`='$startland',
	`randland`='$randland_cnt',
	`section`='$section',
	`set_num`='$set_num',
	real_fd='$real_fd'
	WHERE  `idx`=$idx;";

	$result = mysqli_query($db , $sql_log);
	if($result === false){
		echo mysqli_error($db );
	};

echo "<script>alert('업데이트가 완료되었습니다.'); location.href='page_set.php'; </script>";
}else{	
 echo "<script>alert('접근권한이 없습니다.'); location.href='page_set.php'; </script>";
}*/
?>
