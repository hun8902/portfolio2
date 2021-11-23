<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

 
	$memberId = $_POST['memberId'];

    $sql = "SELECT * FROM gosu_member WHERE id = '{$memberId}'";
 	$result = mysqli_query($db , $sql);
    if($result->num_rows >= 1){
        echo json_encode(array('result'=>'bad'));
    }else{
        echo json_encode(array('result'=>'good'));
    }
 

?>
