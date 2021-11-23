<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

$db = mysqli_connect("localhost", "readimc", "flem!2dkdldpaTl", "readimc");
$db->set_charset("utf8");
	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}




//방문자 카운터 집게
date_default_timezone_set('Asia/Seoul');
$currdt = date("Y-m-d H:i:s"); 

//그래프 생성을 위한 -7day 구하는 함수
$i = 0; 
while($i<=7) 
{
	
	$date_count[$i] = date("Y-m-d", strtotime("-".$i." day")); 
	$query = "select count(*) as count from landing_stat_visit where DATE(regdate) = DATE('$date_count[$i]')";
	$data[$i] = $db->query($query)->fetch_array();
	$visit_count[$i] = $data[$i]['count'];
	$i++;
}

if($db){

	// 오늘 방문자수
	$query = "select count(*) as count from landing_stat_visit where DATE(regdate) = DATE('$currdt')";
	$data = $db->query($query)->fetch_array();
	$today_visit_count = $data['count'];


	// 전체 방문자수
	$query = "select count(*) as count from landing_stat_visit";
	$data = $db->query($query)->fetch_array();
	$total_visit_count = $data['count'];

	// PC 접속자 비율
	$query = "select count(*) as count from landing_stat_visit where device = 'PC'";
	$data = $db->query($query)->fetch_array();
	$total_pc_per = $data['count']/$total_visit_count*100;

	// PC 접속자 비율
	$query = "select count(*) as count from landing_stat_visit where device != 'PC'";
	$data = $db->query($query)->fetch_array();
	$total_mobile_per = $data['count']/$total_visit_count*100;

	// 총신청인원
	$query = "select count(*) as count from cus_member";
	$data = $db->query($query)->fetch_array();
	$total_member = $data['count'];

	// 총신청인원
	$query = "select count(*) as count from cus_member";
	$data = $db->query($query)->fetch_array();
	$total_member_per = $data['count']/$total_visit_count*100;
};


// 아이피 확인

/*
$remote_ip = $_SERVER["REMOTE_ADDR"];
$query = "SELECT * FROM  gosu_ip WHERE add_ip = '".$remote_ip."' LIMIT 1";
$ip_result = mysqli_query($db, $query);
$row1 = mysqli_fetch_array($ip_result);
//IP 비교후 404 페이지로 이동
if($remote_ip = $row1['add_ip'] ){

}else{
	header("location:page_404.php");
}
*/

//레벨 확인
if($_SESSION["id"] != NULL){

$query = "SELECT level FROM  gosu_member WHERE id = '".$_SESSION["id"] ."' LIMIT 1";
$lv_result = mysqli_query($db, $query);
$row_l = mysqli_fetch_array($lv_result);
$lv_check = $row_l['level'];

};
?>
