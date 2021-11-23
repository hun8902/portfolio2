<?
/* true �� ������ ���� �޴��ʿ����� ÷�������� �ٿ�ε� �ؼ��� ���� �ֽ��ϴ�.
   false �� ���� �޴��ʿ��� ÷������ preview �� �����մϴ�.
   ��, �� ������ �̸��� Ŭ���̾�Ʈ�� ���α׷��� ���� �ٸ� �� �ֽ��ϴ�. ���� ��� daum, naver �� ������ �ǳ� gmail �̳� �ƿ��迡���� ������� �ʽ��ϴ�.
*/
$dw_only = false;





//�� method=post ������� �Ѿ�� ������ extract ��Ŵ(php.ini ���Ͽ��� register_globals=off �϶� �ʿ�)
extract($_POST);

//�� ������ �������� �̵��ϴ� �Լ�
function goUrl($str, $go=-1) {
   echo "<script type=\"text/javascript\">";
   if($str) echo "window.alert(\"".str_replace('"','\"',$str)."\");";
   if(is_string($go)) echo "location.replace(\"".$go."\");";
   else echo "history.go(".$go.")";
   echo "</script>";
}

//�� $str �� ���� �������� Ȯ��
function checkSpace($str) {
   return !ereg("([^[:space:]]+)",$str);
}

//�� �̸��� �ּ� ��ȿ�� Ȯ��
function checkEmail($email) {
   return !preg_match('/^[A-z0-9][\w\d.-_]*@[A-z0-9][\w\d.-_]+\.[A-z]{2,6}$/',$email);
}

//�� �̸��Ͽ� �߰��� ÷������ ����
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

//�� ���� ���ε� ����
function checkFileError($errno) {
   switch($errno) {
      case(1) : $errorMsg = "���� �뷮�� �������� ���� �뷮�� �ʰ��߽��ϴ�."; break;
      case(2) : $errorMsg = "���� �뷮�� �Է����� ���� �뷮�� �ʰ��߽��ϴ�."; break;
      case(3) : $errorMsg = "������ �Ϻθ� ���ε� �Ǿ����ϴ�."; break;
      case(4) : $errorMsg = "���ε�� ������ �����ϴ�."; break;
   }
   return $errorMsg;
}

//�� �޴»�� �̸��� �ԷµǾ����� Ȯ��
if(checkSpace($to_name)) {
   goUrl("�޴� ��� �̸��� �Է����ּ���.");
   exit;
}


//�� �޴»�� �̸��� �ּҰ� �ԷµǾ����� Ȯ��
if(checkSpace($to)) {
   goUrl("�޴� ��� �̸��� �ּҸ� �Է����ּ���.");
   exit;
}

//�� �޴»�� �̸��� �ּ��� ��ȿ�� Ȯ��
if(checkEmail($to)) {
   goUrl("�޴� ��� �̸��� �ּҸ� ��Ȯ�� �Է��� �ּ���.");
   exit;
}

//�� �����»�� �̸��� �ԷµǾ����� Ȯ��
if(checkSpace($from_name)) {
   goUrl("������ ��� �̸��� �Է����ּ���.");
   exit;
}

//�� �����»�� �̸��� �ּҰ� �ԷµǾ����� Ȯ��
if(checkSpace($from)) {
   goUrl("������ ��� �̸����ּҸ� �Է����ּ���.");
   exit;
}

//�� �����»�� �̸��� �ּ��� ��ȿ�� Ȯ��
if(checkEmail($from)) {
   goUrl("�޴� ��� �̸��� �ּҸ� ��Ȯ�� �Է��� �ּ���.");
   exit;
}

//�� �̸��� ������ �ԷµǾ����� Ȯ��
if(checkSpace($subject)) {
   goUrl("���� ������ �����ϴ�. ���� ������ �Է��� �ֽʽÿ�.");
   exit;
}

//�� �̸��� ������ �ԷµǾ����� Ȯ��
if(checkSpace($content)) {
   goUrl("���� ������ �Է��� �ּ���.");
   exit;
}

//�� �޴��� ����
$receiver = '"'.$to_name.'" <'.$to.'>';

//�� �������� ����
$sender = '"'.$from_name.'" <'.$from.'>';

//�� ������ ������ html �� ��� �� ��
$subject = htmlspecialchars($subject);

//�� html ��뿡 ýũ�� ���ٸ� html �� ��� �� �ϰ� �ϰ� nl2br �� �̿��ؼ� ������ <br> �� �ٲ�
if(!$use_html) $content ="<br/>�̸�: ".$from_name ."<br/>��ġ: ".$position ."<br/>�ڵ���: ".$phone_number ."<br/>����". nl2br(htmlspecialchars($content));


//�� �Ϲ� mail header ����
$headers = "From: ".$sender."\n";
$headers .= "X-Sender: ".$sender."\n";
$headers .= "X-Mailer: PHP\n";
$headers .= "X-Priority: 1\n";
$headers .= "Reply-to: ". $sender . "\n";
$headers .= "Return-Path: ". $sender . "\n";

//�� ÷�������� ���� ��� ���� �����ڸ� ����
$boundary = md5(uniqid(microtime()));

//�� ÷������ Ȯ�� �� ÷��
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

//�� ÷�� ������ ���� ���
if($attached) {
   $headers .= "MIME-Version: 1.0\n";
   $headers .= "Content-Type: Multipart/mixed; boundary = \"".$boundary."\"\n";

   $mailbody = "--".$boundary."\n";
   $mailbody .= "Content-Type: text/html; charset=\"euc-kr\"\n";
   $mailbody .= "Content-Transfer-Encoding: base64\n\n";
   $mailbody .= chunk_split(base64_encode($content))."\n\n";
   $mailbody .= $attached;
} else {
   //�� ÷�� ������ ���� ���
   $headers .= "Content-Type: text/html; charset=EUC-KR\n";
   $headers .= "\n\n";

   $mailbody = $content;
}

//�� ������ $receiver �� �߼��ϰ� ������ �ִٸ� ���� ��� �� �ڷ� �̵� �׷��� ������ ����߼� �޼����� ����� mail.php �� �̵�...
if(!mail($receiver, $subject, $mailbody, $headers, "-f ".$from)) goUrl("�̸��� �߼��� ���� �Ͽ����ϴ�.");
else goUrl('������ ���������� �߼۵Ǿ����ϴ�.', 'mail.php');
?>