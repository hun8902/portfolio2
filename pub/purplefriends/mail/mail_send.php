<?
/* true 로 설정시 메일 받는쪽에서는 첨부파일을 다운로드 해서만 볼수 있습니다.
   false 일 때는 받는쪽에서 첨부파일 preview 가 가능합니다.
   단, 이 설정은 이메일 클라이언트의 프로그렘에 따라 다를 수 있습니다. 예를 들어 daum, naver 는 적용이 되나 gmail 이나 아웃룩에서는 적용되지 않습니다.
*/
$dw_only = false;





//▶ method=post 방식으로 넘어온 값들을 extract 시킴(php.ini 파일에서 register_globals=off 일때 필요)
extract($_POST);

//▶ 지정된 페이지로 이동하는 함수
function goUrl($str, $go=-1) {
   echo "<script type=\"text/javascript\">";
   if($str) echo "window.alert(\"".str_replace('"','\"',$str)."\");";
   if(is_string($go)) echo "location.replace(\"".$go."\");";
   else echo "history.go(".$go.")";
   echo "</script>";
}

//▶ $str 이 공백 문자인지 확인
function checkSpace($str) {
   return !ereg("([^[:space:]]+)",$str);
}

//▶ 이메일 주소 유효성 확인
function checkEmail($email) {
   return !preg_match('/^[A-z0-9][\w\d.-_]*@[A-z0-9][\w\d.-_]+\.[A-z]{2,6}$/',$email);
}

for($i=0;$i<count($cb1);$i++){ 
	echo$cb1[$i].$cb1[$i]."</br>";
}
for($j=0;$j<count($cb2);$j++){ 
	echo$cb2[$j].$cb2[$j]."</br>";
}



//▶ 이메일에 추가될 첨부파일 생성
function getFileBody($var, $boundary, $idx='') {
   global $dw_only;

   if($idx !== '') {
      $filename = basename($_FILES[$var][name][$idx]);
      $type = $_FILES[$var][type][$idx];

      $fp = fopen($_FILES[$var][tmp_name][$idx], "r");
      $file_content = fread($fp, $_FILES[$var][size][$idx]);
      fclose($fp);
   } else {
      $filename = basename($_FILES[$var][name]);
      $type = $_FILES[$var][type];

      $fp = fopen($_FILES[$var][tmp_name], "r");
      $file_content = fread($fp, $_FILES[$var][size]);
      fclose($fp);
   }

   if($dw_only) $type = "application/octet-stream";

   $mailbody = "--".$boundary."\n";
   $mailbody .= "Content-Type: ".$type."; name=\"".$filename."\"\n";
   $mailbody .= "Content-Transfer-Encoding: base64\n";
   $mailbody .= "Content-Disposition: attachment; filename=\"".$filename."\"\n\n";
   $mailbody .= chunk_split(base64_encode($file_content))."\n\n";

   return $mailbody;
}

//▶ 파일 업로드 에러
function checkFileError($errno) {
   switch($errno) {
      case(1) : $errorMsg = "파일 용량이 서버에서 허용된 용량을 초과했습니다."; break;
      case(2) : $errorMsg = "파일 용량이 입력폼에 허용된 용량을 초과했습니다."; break;
      case(3) : $errorMsg = "파일의 일부만 업로드 되었습니다."; break;
      case(4) : $errorMsg = "업로드된 파일이 없습니다."; break;
   }
   return $errorMsg;
}


//▶ 받는이 설정
$receiver = '"'.$to_name.'" <'.$to.'>';

//▶ 보내는이 설정
$sender = '"'.$fromName.'" <'.$mailFrom.'>';

//▶ 제목은 무조건 html 을 사용 못 함
$subject = htmlspecialchars($title);

//▶ html 사용에 첵크가 없다면 html 을 사용 못 하게 하고 nl2br 을 이용해서 개행을 <br> 로 바꿈
if(!$use_html) $content = "체크박스: ".$cb1[0] ."&nbsp;".$cb1[1] . "&nbsp;".$cb1[2] ."&nbsp;".$cb1[3] ."&nbsp;".$cb1[4]."<br/>라디오박스: ".$cb2[0] ."&nbsp;".$cb2[1] . "&nbsp;".$cb2[2] ."&nbsp;".$cb2[3] ."&nbsp;".$cb2[4]."<br/>이름: ".$fromName ."<br/>위치: ".$position ."<br/>핸드폰: ".$phone_number ."<br/>내용". nl2br(htmlspecialchars($content));

//▶ 일반 mail header 설정
$headers .= "From: ".$sender."\n";
$headers .= "X-Sender: ".$sender."\n";
$headers .= "X-Mailer: PHP\n";
$headers .= "X-Priority: 1\n";
$headers .= "Reply-to: ". $sender . "\n";
$headers .= "Return-Path: ". $sender . "\n";

//▶ 첨부파일이 있을 경우 사용될 구분자를 생성
$boundary = md5(uniqid(microtime()));

//▶ 첨부파일 확인 후 첨부
$attached = '';
if(isset($_FILES) && is_array($_FILES)) {
   foreach($_FILES as $var => $value) {
      if(is_array($_FILES[$var][name])) {
         for($i=0;$i<count($_FILES[$var][name]);$i++) {
            if($_FILES[$var][error][$i] == 0) $attached .= getFileBody($var, $boundary, $i);
            else if($_FILES[$var][error] < 4) {
               goUrl(checkFileError($_FILES[$var][error][$i]));
               exit;
            }
         }
      } else {
         if($_FILES[$var][error] == 0) $attached .= getFileBody($var, $boundary);
         else if($_FILES[$var][error] < 4) {
            goUrl(checkFileError($_FILES[$var][error][$i]));
            exit;
         }
      }
   }
}




//▶ 첨부 파일이 있을 경우
if($attached) {
   $headers .= "MIME-Version: 1.0\n";
   $headers .= "Content-Type: Multipart/mixed; boundary = \"".$boundary."\"\n";
   $mailbody .= "--".$boundary."\n";
   $mailbody .= "Content-Type: text/html; charset=\"euc-kr\"\n";
   $mailbody .= "Content-Transfer-Encoding: base64\n\n";
   
   $mailbody .= chunk_split(base64_encode($content))."\n\n";
   $mailbody .= $attached;
} else {
   //▶ 첨부 파일이 없을 경우
   $headers .= "Content-Type: text/html; charset=EUC-KR\n";
   $headers .= "\n\n";
   $mailbody .= $content;
}

//▶ 메일을 $receiver 로 발송하고 에러가 있다면 에러 출력 후 뒤로 이동 그렇지 않으면 정상발송 메세지를 출력후 mail.php 로 이동...
if(!mail($receiver, $subject, $mailbody, $headers, "-f ".$from)) goUrl("이메일 발송해 실패 하였습니다.");
else goUrl('메일이 정상적으로 발송되었습니다.', 'mail.php');
?>