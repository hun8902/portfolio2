<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../PHPMailerAutoload.php';


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


$allowedExts = array("doc", "docx", "xls", "xlsx", "pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/excel")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file"]["type"] == "application/x-excel")
|| ($_FILES["file"]["type"] == "application/x-msexcel")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))

&& in_array($extension, $allowedExts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "<script>alert('Error: " . $_FILES["file"]["error"] ."')</script>";
}
else
{
	$d='upload/';
	$de=$d . basename($_FILES['file']['name']);
move_uploaded_file($_FILES["file"]["tmp_name"], $de);
$fileName = $_FILES['file']['name'];
$filePath = $_FILES['file']['tmp_name'];
 //add only if the file is an upload
 }
}
else
{

}

$allowedExts = array("doc", "docx", "xls", "xlsx", "pdf");
$temp = explode(".", $_FILES["file1"]["name"]);
$extension = end($temp);
if ((($_FILES["file1"]["type"] == "application/pdf")
|| ($_FILES["file1"]["type"] == "application/msword")
|| ($_FILES["file1"]["type"] == "application/excel")
|| ($_FILES["file1"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file1"]["type"] == "application/x-excel")
|| ($_FILES["file1"]["type"] == "application/x-msexcel")
|| ($_FILES["file1"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))

&& in_array($extension, $allowedExts))
{
if ($_FILES["file1"]["error"] > 0)
{
echo "<script>alert('Error: " . $_FILES["file1"]["error"] ."')</script>";
}
else
{
	$d='upload/';
	$de=$d . basename($_FILES['file1']['name']);
move_uploaded_file($_FILES["file1"]["tmp_name"], $de);
$fileName = $_FILES['file1']['name'];
$filePath = $_FILES['file1']['tmp_name'];
 //add only if the file is an upload
 }
}
else
{

}
  




$mail_subject =$title;
$to_name ="request@purplefriends.co.kr";
$to ="Purple Friends";
$send_mail =$from;
$send_name =$from_name;
$filename ="main.phps";
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->ContentType = 'Multipart/mixed';
$mail->CharSet = 'utf-8';
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.purplefriends.co.kr";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "event@purplefriends.co.kr";
//Password to use for SMTP authentication
$mail->Password = "purple0513";
//Set who the message is to be sent from
$mail->setFrom($send_mail, $send_name);
//Set an alternative reply-to address
$mail->addReplyTo($send_mail, $send_name);
//Set who the message is to be sent to
$mail->addAddress($to_name, $to);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->Body = "<style>.emailtable{width:100%; font-family:dotum; border-collapse:collapse;  border:1px solid #333;}.emailtable tr td{border:1px solid #333;  padding:10px 15px;}.table_title{background:#ebebeb; width: 150px; font-weight:bold;}</style><table class='emailtable'>
<tr><td class='table_title'>프로젝트 범위</td><td>".$cb1[0] ."&nbsp;".$cb1[1] . "&nbsp;".$cb1[2] ."&nbsp;".$cb1[3] ."&nbsp;".$cb1[4] ."</td></tr><tr><td class='table_title'>프로젝트 성격</td><td>".$cb2[0] ."&nbsp;".$cb2[1] . "&nbsp;".$cb2[2] ."&nbsp;".$cb2[3] ."&nbsp;".$cb2[4] ."</td></tr><tr><td class='table_title'>회사명</td><td>".nl2br(addslashes($compnany)) . "</td></tr><tr><td class='table_title'>위치</td><td>".nl2br(addslashes($position)) . "</td></tr><tr><td class='table_title'>전화 번호</td><td>".nl2br(addslashes($phone_number)) . "</td></tr><tr><td class='table_title'>휴대폰 번호</td><td>".nl2br(addslashes($mobile_numbers)) . "</td></tr></table><br/>". nl2br(addslashes($content));
$mail->AddAttachment($userfile[1]); // 첨부파일
//Attach an image file
//$mail->AddAttachment($file);
$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
$mail->AddAttachment($_FILES['file1']['tmp_name'], $_FILES['file1']['name']);
//Send the message, check for errors

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
?>
<script>
alert("이메일이 정상적으로 발송되었습니다.");
location.replace("http://purplefriends.co.kr/"); 
</script>
<?
}

