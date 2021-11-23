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
	$searchQuery = " and (name like '%".$searchValue."%' or 
        phone like '%".$searchValue."%' or
        dt like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from cus_code");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($db,"select count(*) as allcount from cus_code WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT DISTINCT A.name, A.phone, B.*  FROM cus_member A INNER JOIN cus_code B ON A.key = B.key WHERE 1 ".$searchQuery;
//$empQuery = "SELECT DISTINCT A.name, A.phone, B.*  FROM cus_member A INNER JOIN cus_code B ON A.key = B.key WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {	
$ref_url_c = strlen($row['ref_url']);


$ref_url = "<a href='".$row['ref_url']."' target='_blank'>".substr($row['ref_url'], 0, 60)."...</a>";
    $data[] = array(
		"no"=>$row['no'],
		"name"=>$row['name'],
		"phone"=>$row['phone'],
		"ad_code"=>$row['ad_code'],
		"ad_name"=>$row['ad_name'],
		"rank"=>$row['rank'],
		"landing"=>$row['landing'],
		"ad_keyword"=>$row['ad_keyword'],
		"q_keyword"=>$row['q_keyword'],
		"ref_url"=>$ref_url,
		"this_url"=>$row['this_url'],
		"etc1"=>$row['etc1'],
		"etc2"=>$row['etc2'],
		"memo1"=>$row['memo1'],
		"memo2"=>$row['memo2'],
		"dt"=>$row['dt'],
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