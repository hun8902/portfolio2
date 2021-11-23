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
	$searchQuery = " and (id like '%".$searchValue."%' or 
        name like '%".$searchValue."%' or
		email like '%".$searchValue."%' or
		department like '%".$searchValue."%' or
		spot like '%".$searchValue."%' or
        phone like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from gosu_member");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($db,"select count(*) as allcount from gosu_member WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from gosu_member WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
	if($row['level'] == "1"){
			$level_hagle = "슈퍼관리자";
	}elseif($row['level'] == "2"){
			$level_hagle = "일반관리자";
	}elseif($row['level'] == "3"){
			$level_hagle = "기획자";
	}else{
		$level_hagle = "기본";
	};

    $data[] = array(
    		"idx"=>$row['idx'],
    		"id"=>$row['id'],
    		"name"=>$row['name'],
    		"passwd"=>$row['passwd'],
    		"department"=>$row['department'],
			"spot"=>$row['spot'],
			"level"=>$level_hagle,
			"phone"=>$row['phone'],
			"email"=>$row['email'],
			"date"=>$row['date'],


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