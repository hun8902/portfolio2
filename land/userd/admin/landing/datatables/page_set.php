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
	$searchQuery = " and (title like '%".$searchValue."%' or 
        info like '%".$searchValue."%' or
        set_num like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($db,"select count(*) as allcount from landing_set");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($db,"select count(*) as allcount from landing_set WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from landing_set WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($db, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
	if($row['randland']=="1"){
		$randland="<span class='text-c-blue ml-3'>랜덤 반복</span>";
	}else{
		$randland="<span class='text-c-red ml-3'>반복 안함</span>";
	}
	//$land_select = md5(sha1($row['startland']));
	$land_select = $row['startland'];


	$gosu_url = "/landing/index.php?startland=".$land_select."&randland=".$row['randland']."&section=".$row['section']."&set_num=".$row['set_num'];
	
	$gosu_url_a ="<a href='".$gosu_url."' target='_blank'>랜딩페이지 보기</a>";

    $data[] = array(
    		"idx"=>$row['idx'],
    		"title"=>$row['title'],
			"url"=>$gosu_url_a,
    		"startland"=>$row['startland'],
    		"randland"=>$randland,
			"info"=>$row['info'],
			"memo"=>$row['memo'],
			"real_fd"=>$row['real_fd'],
			

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