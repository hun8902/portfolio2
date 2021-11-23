<?php
	//*카운트다운 필요할떄 
	$event_total = 330 ;
	//신청 마감 남은수
	$event_deadline= 11 ;
	//카운트 다운 날짜
	$d_day = "2020-07-31 00:00:00" ;
	
	//startland값이 없을때 land001로 가게끔 설정
	if($_GET["startland"] != NULL){
		$theme_select = md5(sha1($_GET["startland"]));
	}else{
		$theme_select = md5(sha1("land001"));
	}
		
	//현재 주소 구하기
	$http_host = $_SERVER['HTTP_HOST'];
	$request_uri = $_SERVER['REQUEST_URI'];
	$this_url = 'http://' . $http_host . $request_uri;

	//랜딩용 db 연결 ,log 기록
	include_once("../ld_setup/db_config.php");
	include_once("../ld_setup/log_user.php");
?>