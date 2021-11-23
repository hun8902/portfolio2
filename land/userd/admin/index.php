<?php


//######### 해킹 방지용
if( preg_match('/Chrome\/41.0.2228.0/',$_SERVER['HTTP_USER_AGENT']) ){
    // 해킹 시도 및 ( SQL 인젝션 )
    die('');
}

$strtolowerUri = strtolower(@$_SERVER['REQUEST_URI']);
if( preg_match('/board_qna/',   $strtolowerUri) ||
    preg_match('/convert/',     $strtolowerUri) ||
    preg_match('/concat/',      $strtolowerUri) ||
    preg_match('/substr/',      $strtolowerUri) ||
    preg_match('/ifnull/',      $strtolowerUri) ||
    preg_match('/select/',      $strtolowerUri)
  ){
    die();
}

$refData = @$_SERVER['HTTP_REFERER'];
if( !empty($refData)){
    if( preg_match('/board_qna/',   $refData) ||
        preg_match('/convert/',     $refData) ||
        preg_match('/concat/',      $refData) ||
        preg_match('/substr/',      $refData) ||
        preg_match('/ifnull/',      $refData) ||
        preg_match('/select/',      $refData)
    ){
        die();
    }
};

session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");


if($_SESSION["id"] != NULL){
	header("location:main.php");
};


//로그인 처리
if(isset($_POST["sub"])){
	$username = $_POST['id'];
	$password = $_POST['password'];

	$query = "SELECT id,passwd FROM  gosu_member WHERE id = '".$username."' LIMIT 1";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);

	$hash_password  = $row['passwd']; 	

	if (password_verify($password, $hash_password)) { 
		$_SESSION["id"] = $_POST["id"];
		header("location:main.php");
	} else { 
		echo '<script>alert("일치하는 정보가 없습니다.")</script>';
	}
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>관리자페이지</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
				 <form method="post">  
				<input type="hidden" name="ACCESS" value="true">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-unlock auth-icon"></i>
                    </div>
                    <h3 class="mb-4">관리자 로그인</h3>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="id" name="id" id="id" >
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" placeholder="password" name="password" id="password" >
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                            <!-- <label for="checkbox-fill-a1" class="cr"> 저장</label> -->
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4" name="sub" id="sub" >관리자 로그인</button>
					</form>
                </div>
            </div>
        </div>
    </div>


    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
function check_session(){
	$.ajax({
		url:"member/check_session.php",
			method:"POST",
			success:function(data)
			{
			if(data == '1'){
					alert('세션이 만료되었습니다.!');
					window.location.href="index.php";
				}else{
					
				}
			}
		})}
		//setInterval(function(){ check_session(); }, 3000);
});
</script>
</body>
</html>


