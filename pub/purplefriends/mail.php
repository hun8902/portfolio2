<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
// 폼에서 넘어오는 값들
//-- $mailTo : 수신자 이메일주소
//-- $mailFrom : 송신자 이메일주소
//-- $fromName : 송신자명 또는 정보
//-- $title    : 메일제목
//-- $content  : 메일내용
//-- $upfile   : 첨부파일명
//*******************************


 $boundary = "----" . uniqid("part"); // 구분자 생성
 
 // --- 헤더생성 --- //
 $header  = "Return-Path: $mailFrom\r\n";                             // 반송 이메일 주소
 $header .= "from: $fromName <$mailFrom>\r\n";                        // 송신자명, 송신자 이메일 주소

 // --- 첨부화일이 있을경우 --- //
 if($upfile && $upfile_size) {
 $filename=basename($upfile_name); // 파일명 추출
 $fp = fopen($upfile,"r"); // 파일 열기
 $file = fread($fp,$upfile_size); // 파일 읽기
 fclose($fp);  // 파일 닫기
 if ($upfile_type == ""){
  $upfile_type = "application/octet-stream";
 }

for($i=0;$i<count($cb1);$i++){ 
	echo$cb1[$i].$cb1[$i]."</br>";
}
for($i=0;$i<count($cb2);$i++){ 
	echo$cb2[$i].$cb2[$i]."</br>";
}


 // --- 헤더작성 --- //
 $header .= "MIME-Version: 1.0\r\n";                                  // MIME 버전 표시
 $header .= "Content-Type: Multipart/mixed; boundary=\"$boundary\"";  // 구분자 설정, Multipart/mixed 일 경우 첨부화일

 // --- 이메일 본문 생성 --- //  
 $mailbody = "This is a multi-part message in MIME format.\r\n\r\n";
 $mailbody .= "--$boundary\r\n";
 $mailbody .= "Content-Type: text/html; charset=utf-8\r\n";
 $mailbody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
 $mailbody .= nl2br(addslashes($content)) . "\r\n";
 
 // --- 파일 첨부 ---//  
 $mailbody .= "--$boundary\r\n";  
 $mailbody .= "Content-Type: ".$upfile_type."; name=\"".$filename."\"\r\n";   // 내용
 $mailbody .= "Content-Transfer-Encoding: base64\r\n"; // 암호화 방식  
 $mailbody .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n"; // 첨부파일인 것을 알림
 $mailbody .= base64_encode($file)."\r\n\r\n";  

 $mailbody .= "--$boundary--";  //내용 구분자 마침
 } else {
    // --- 헤더작성 --- //  
    $header .= "MIME-Version: 1.0\r\n";  
    $header .= "Content-Type: Multipart/alternative; boundary = \"$boundary\"";  

    // --- 이메일 본문 생성 --- //
    $mailbody = "--$boundary\r\n";  
    $mailbody .= "Content-Type: text/html; charset=utf-8\r\n";
    $mailbody .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

	$mailbody .= "<table style='width:100%; border:1px solid #000; margin:0 0 50px 0;'><tr><td style='width:100px; border-right:1px solid #000;'>프로젝트 범위<td><td>".$cb1[0] ."&nbsp;".$cb1[1] . "&nbsp;".$cb1[2] ."&nbsp;".$cb1[3] ."&nbsp;".$cb1[4] ."<td></tr><tr><td style='width:100px; border-right:1px solid #000;'>프로젝트 성격<td><td>".$cb2[0] ."&nbsp;".$cb2[1] . "&nbsp;".$cb2[2] ."&nbsp;".$cb2[3] ."&nbsp;".$cb2[4] ."<td></tr><tr><td style='width:100px; border-right:1px solid #000;'>회사명<td><td>".nl2br(addslashes($compnany)) . "<td></tr><tr><td style='width:100px; border-right:1px solid #000;'>위치<td><td>".nl2br(addslashes($position)) . "<td></tr><tr><td style='width:100px; border-right:1px solid #000;'>전화 번호<td><td>".nl2br(addslashes($phone_number)) . "<td></tr><tr><td style='width:100px; border-right:1px solid #000;'>휴대폰 번호<td><td>".nl2br(addslashes($mobile_numbers)) . "<td></tr></table>";
    $mailbody .= nl2br(addslashes($content)) . "\r\n";
  
    $mailbody .= "--$boundary--\r\n\r\n";  
} 

 $result = mail($mailTo,$title,$mailbody,$header);
 if($result){ ?>
 <script>
 alert("이메일이 정상적으로 발송되었습니다.");
 location.replace("http://purplefriends.co.kr/"); 
 </script>
 <?

 }else  {
 ?>
 <script>
 alert("전송을 실패하였습니다.");
 javascript:history.back(-1);
 </script>
 <?
 }

?>


