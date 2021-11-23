<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/admin/config/db_config.php");


// 해킹코드 기본적인값 제거 함수
function hack_replace2($str){
    $str = strtolower($str);
    $str = str_replace("select","",$str);
    $str = str_replace("script","",$str);
    $str = str_replace("img","",$str);
    $str = str_replace(" or ","",$str);
    $str = str_replace("document","",$str);
    $str = str_replace("response","",$str);
    $str = str_replace("write","",$str);
    $str = str_replace("<","",$str);
    $str = str_replace("video","",$str);
    $str = str_replace("onerror","",$str);
    $str = str_replace("onload","",$str);
    return $str;
}

	$name = @hack_replace2($_REQUEST['representative']) ;
	$hp = @hack_replace2($_REQUEST['phone']);
	$key = date("Ymd")."_".mt_rand(1000, 10000);
	$requset_url = @hack_replace2($_REQUEST['requset_url']);
	$rank = @hack_replace2($_REQUEST['rank']);
	$ad_keyword = @hack_replace2($_REQUEST['ad_keyword']);
	$q_keyword =@hack_replace2( $_REQUEST['q_keyword']);
	$ref_url = @hack_replace2($_SERVER['HTTP_REFERER']);
	$this_url = @hack_replace2($_REQUEST['this_url']);
	$ad_code =@hack_replace2( $_REQUEST['ad_code']);
	$landing = @hack_replace2($_REQUEST['landing']);
	$etc1 =@hack_replace2( $_REQUEST['etc1']);
	$etc2 = @hack_replace2($_REQUEST['etc2']);
	$memo1 = @hack_replace2($_REQUEST['memo1']);
	$memo2 = @hack_replace2($_REQUEST['memo2']);


	function getUrlParameter($url, $sch_tag) {
	  $parts = parse_url($url);
	  parse_str($parts['query'], $query);
	  return $query[$sch_tag];
	};

     $my_url = $this_url;  
	 //echo($this_url . "<br/>");
	 $ad_name = getUrlParameter($my_url, "utm_source");




	$dt = date("Y-m-d H:i:s");


	if (!preg_match("/[\xA1-\xFE\xA1-\xFE]/",$name)) {
		echo "<script>alert('이름을 다시 입력해주세요'); history.back(); </script>";
	}else{		
		$hp = preg_replace("/[^0-9]/", "", $hp);
		if(preg_match("/^01[0-9]{8,9}$/", $hp)){
			$sql = "SELECT * FROM cus_member WHERE phone = '$hp'";
			$result = mysqli_query($db , $sql);
			if($result->num_rows >= 1){
				//결과 있을때
				 echo "<script>alert('이미 신청이 완료된 번호입니다.'); history.back(); </script>";
			}else{
				// 결과 없을떄 
				$sql_log = "INSERT INTO cus_member (`key`, `name`, `phone`) VALUES ('$key', '$name', '$hp');";
				$result = mysqli_query($db , $sql_log);
				if($result === false){
					echo mysqli_error($db );
				};

				$sql_log1 = "INSERT INTO cus_code
				(`key`, 
				`ad_code`, 
				`ad_name`, 
				`rank`, 
				`landing`, 
				`ad_keyword`, 
				`q_keyword`, 
				`ref_url`, 
				`this_url`, 
				`etc1`, 
				`etc2`, 
				`memo1`, 
				`memo2`, 
				`dt`) VALUES (
				'$key',
				'$ad_code',
				'$ad_name',
				'$rank',
				'$landing',
				'$ad_keyword',
				'$q_keyword',
				'$ref_url',
				'$this_url',
				'$etc1',
				'$etc2',
				'$memo1',
				'$memo2',
				'$dt');";

				$result = mysqli_query($db , $sql_log1);
				if($result === false){
					echo mysqli_error($db );
				};

				?>




				<?php
				echo "<script>alert('신청이 완료되었습니다.'); location.href = 'http://readimc.com'; </script>";



			}


		}else{
			 echo "<script>alert('올바른 전화번호가 아닙니다.'); history.back(); </script>";

		}


	}

	
?>
</head>
<body>
</body>
</html>