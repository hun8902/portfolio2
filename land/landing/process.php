<!--- ========================================== ---->
<!-- 네이버 검색광고 : 전환페이지 설정 -->
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script> 
<script type="text/javascript"> 
var _nasa={};
_nasa["cnv"] = wcs.cnv("4","1"); // 전환유형, 전환가치 설정해야함. 설치매뉴얼 참고
</script> 

 <!-- 네이버 검색광고: 공통 적용 스크립트 , 모든 페이지에 노출되도록 설치. 단 전환페이지 설정값보다 항상 하단에 위치해야함 --> 
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"> </script> 
<script type="text/javascript"> 
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_4ab96c53cb82";
if (!_nasa) var _nasa={};
wcs.inflow();
wcs_do(_nasa);
</script>

<!--- ========================================== ---->
<!-- 구글 검색 공통 스크립트 -->
<!-- Global site tag (gtag.js) - Google Ads: 591977182 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-591977182"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-591977182');
</script>

<!-- Event snippet for 가입 conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-591977182/0_g5CJXvgN4BEN61o5oC'});
</script>


<!--- ========================================== ---->
<!-- 다음 검색광고: 다음 전환 스크립트 -->
 <script type="text/javascript"> 
 //<![CDATA[ 
 var DaumConversionDctSv="type=W,orderID=,amount="; 
 var DaumConversionAccountID="8Vxzm21pD1FMJXPothSb-w00"; 
 if(typeof DaumConversionScriptLoaded=="undefined"&&location.protocol!="file:"){ 
         var DaumConversionScriptLoaded=true; 
         document.write(unescape("%3Cscript%20type%3D%22text/javas"+"cript%22%20src%3D%22"+(location.protocol=="https:"?"https":"http")+"%3A//t1.daumcdn.net/cssjs/common/cts/vr200/dcts.js%22%3E%3C/script%3E")); 
 } 
 //]]> 
 </script> 

<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once("{$root}/ld_setup/db_config.php");
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
	$hp = @hack_replace2($_REQUEST['phone'][0]);
	$key = date("Ymd")."_".mt_rand(1000, 10000);
	$requset_url = @hack_replace2($_REQUEST['requset_url']);
	$rank = @hack_replace2($_REQUEST['rank']);
	$ad_keyword = @hack_replace2($_REQUEST['ad_keyword']);
	$q_keyword =@hack_replace2( $_REQUEST['q_keyword']);
	$ref_url = @hack_replace2($_REQUEST['HTTP_REFERER']);
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
				echo "<script>alert('신청이 완료되었습니다.'); history.back(); </script>";


			}


		}else{
			 echo "<script>alert('올바른 전화번호가 아닙니다.'); history.back(); </script>";

		}


	}

	
?>
