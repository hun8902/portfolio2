<?php
include('db.php');
 if($_POST['page'])
 {
 $page = $_POST['page'];
 $cur_page = $page;
 $page -= 1;
 $per_page = 15; // Per page records
 $previous_btn = true;
 $next_btn = true;
 $first_btn = true;
 $last_btn = true;
 $start = $page * $per_page;
 include"db.php";
 $query_pag_data = "SELECT msg_id,message from messages LIMIT $start, $per_page";
 $result_pag_data = mysqli_query($query_pag_data);
 $msg = "";
while ($row = mysqli_fetch_array($result_pag_data,MYSQLI_ASSOC)) 
 {
 $htmlmsg=htmlentities($row['message']); //HTML entries filter
 $msg .= "<li><b>" . $row['msg_id'] . "</b> " . $htmlmsg . "</li>";
 }
 $msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data
/* -----Total count--- */
 $query_pag_num = "SELECT COUNT(*) AS count FROM messages"; // Total records
 $result_pag_num = mysqli_query($query_pag_num);
 $row = mysqli_fetch_array($result_pag_num,MYSQLI_ASSOC);
 $count = $row['count'];
 $no_of_paginations = ceil($count / $per_page);
/* -----Calculating the starting and endign values for the loop----- */

//Some Code. Available in download script 

 }
?>