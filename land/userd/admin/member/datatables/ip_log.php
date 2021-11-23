<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (regip like '%".$searchValue."%' or 
        regdate like '%".$searchValue."%' or 
        referer like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from landing_stat_visit");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($db,"select count(*) as allcount from landing_stat_visit WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
//$empQuery = "select * from ip_log WHERE 1 ".$searchQuery;
$empQuery = "select * from landing_stat_visit WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"seq"=>$row['seq'],
    		"regip"=>$row['regip'],
    		"referer"=>$row['referer'],
    		"browser"=>$row['browser'],
    		"os"=>$row['os'],
			"device"=>$row['device'],
			"regdate"=>$row['regdate']

    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
?>