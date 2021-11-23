<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");
$query = "SELECT id ,passwd FROM gosu_member ORDER BY idx DESC";
$result = mysqli_query($db, $query);
 
while( $row = mysqli_fetch_array($result) ) {
    
    $hash = password_hash($row['passwd'], PASSWORD_DEFAULT);        
 
    $sql = "UPDATE gosu_member SET passwd = '$hash' WHERE id = '$row[id]' LIMIT 1";
    $result = mysqli_query($db ,$sql) or die(mysqli_error($db));
}
?>