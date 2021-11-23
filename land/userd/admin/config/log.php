<?php
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩


$userAgent = $_SERVER["HTTP_USER_AGENT"];


// OS 정보
function getOsInfo()
{
  $userAgent = $_SERVER["HTTP_USER_AGENT"]; 

  if (preg_match('/linux/i', $userAgent)){ 
    $os = 'linux';}
  elseif(preg_match('/macintosh|mac os x/i', $userAgent)){
    $os = 'mac';}
  elseif (preg_match('/windows|win32/i', $userAgent)){
    $os = 'windows';}
  else {
    $os = 'Other';

  }

  return $os;
}


//모바일 체크
function rtn_mobile_chk() {
    // 모바일 기종(배열 순서 중요, 대소문자 구분 안함)
    $ary_m = array("iPhone","iPod","IPad","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini","Windows CE","Nokia","Sony","Samsung","LGTelecom","SKT","Mobile","Phone");

    for($i=0; $i<count($ary_m); $i++){
        if(preg_match("/$ary_m[$i]/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return $ary_m[$i];
            break;
        }
    }
    return "PC";
}


/**
 * Kullanicinin kullandigi isletim sistemi bilgisini alir.
 * 
 * @since 2.0
 */
function getOS() { 

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$os_platform =   "Bilinmeyen İşletim Sistemi";
	$os_array =   array(
		'/windows nt 10/i'      =>  'Windows 10',
		'/windows nt 6.3/i'     =>  'Windows 8.1',
		'/windows nt 6.2/i'     =>  'Windows 8',
		'/windows nt 6.1/i'     =>  'Windows 7',
		'/windows nt 6.0/i'     =>  'Windows Vista',
		'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
		'/windows nt 5.1/i'     =>  'Windows XP',
		'/windows xp/i'         =>  'Windows XP',
		'/windows nt 5.0/i'     =>  'Windows 2000',
		'/windows me/i'         =>  'Windows ME',
		'/win98/i'              =>  'Windows 98',
		'/win95/i'              =>  'Windows 95',
		'/win16/i'              =>  'Windows 3.11',
		'/macintosh|mac os x/i' =>  'Mac OS X',
		'/mac_powerpc/i'        =>  'Mac OS 9',
		'/linux/i'              =>  'Linux',
		'/ubuntu/i'             =>  'Ubuntu',
		'/iphone/i'             =>  'iPhone',
		'/ipod/i'               =>  'iPod',
		'/ipad/i'               =>  'iPad',
		'/android/i'            =>  'Android',
		'/blackberry/i'         =>  'BlackBerry',
		'/webos/i'              =>  'Mobile'
	);

	foreach ( $os_array as $regex => $value ) { 
		if ( preg_match($regex, $user_agent ) ) {
			$os_platform = $value;
		}
	}   
	return $os_platform;
}

/**
 * Kullanicinin kullandigi internet tarayici bilgisini alir.
 * 
 * @since 2.0
 */
function getBrowser() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$browser        = "Bilinmeyen Tarayıcı";
	$browser_array  = array(
		'/msie/i'       =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/edge/i'       =>  'Edge',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
	);

	foreach ( $browser_array as $regex => $value ) { 
		if ( preg_match( $regex, $user_agent ) ) {
			$browser = $value;
		}
	}
	return $browser;
};


//browser 구분
$org_browser = getBrowser();
//OS 구분
$org_os = getOS();
//디바이스 체크 
$org_device = rtn_mobile_chk();

$org_ip=$_SERVER["REMOTE_ADDR"];

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

$userip = $_SERVER['REMOTE_ADDR'];
$org_referer = $_SERVER['HTTP_REFERER']; 

if($db){
	// 처음 방문했는지 검사
	if(!isset($_SESSION['visit'])) { 
		$_SESSION['visit'] = "1";
		$query = "insert into landing_stat_visit (regdate, regip, referer, browser, os, device) values('$currdt','$userip','$org_referer','$org_browser','$org_os','$org_device')";
		$result = $db->query($query);
	}

};
?>
