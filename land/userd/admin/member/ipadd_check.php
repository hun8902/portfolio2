
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

 
	$add_ip = $_POST['add_ip'];

	//$add_ip="220.86.157.95";

    $sql = "SELECT * FROM gosu_ip WHERE add_ip = '$add_ip'";
 	$result = mysqli_query($db , $sql);
    if($result->num_rows >= 1){
        echo json_encode(array('result'=>'bad'));
    }else{
        echo json_encode(array('result'=>'good'));
    }
 

?>
