<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�������׽�Ʈ</title>
<style type="text/css" title="">
body,table,td {font-size:10pt;};
input, textarea {font-size:10pt;border:1 solid #999999;};
</style>
<script language="Javascript">
<!--
function checkForm() {
   var f = document.form;
   if(!f.to_name.value) {
      alert('�޴� ��� �̸��� �Է��� �ּ���.');
      f.to_name.focus();
      return false;
   }
   if(!f.to.value) {
      alert('�޴� ��� �̸��� �ּҸ� �Է��� �ּ���.');
      f.to.focus();
      return false;
   }
   if(!f.from_name.value) {
      alert('������ ��� �̸��� �Է��� �ּ���.');
      f.from_name.focus();
      return false;
   }
   if(!f.from.value) {
      alert('������ ��� �̸��� �ּҸ� �Է��� �ּ���.');
      f.from.focus();
      return false;
   }
   if(!f.subject.value) {
      alert('������ �Է��� �ּ���.');
      f.subject.focus();
      return false;
   }
   if(!f.content.value) {
      alert('������ �Է��� �ּ���.');
      f.content.focus();
      return false;
   }
   return true;
}
//-->
</script>
</head>
<body>
<center><font size=4>���Ϻ�����</font></center>
<br>
<table border="0" align=center width="600" cellpadding=2 cellspacing=1 bgcolor=999999>
<form method="post" name="form" enctype="multipart/form-data" action="mail_send.php" onSubmit="return checkForm();">
   
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�޴� ��� �̸�</td>
      <td>
		<input type="checkbox" name="cb1[]" class="cb1" value="digital Campaign">
		<p class="text">Digital Campaign<br/>(Promotion)</p>
		<input type="checkbox" name="cb1[]" class="cb1" value="brand consult">
		<p class="text">Brand consult</p>
		<input type="checkbox" name="cb1[]" class="cb1" value="online_da">
		<p class="text">Online DA</p>
		<input type="checkbox" name="cb1[]" class="cb1" value="mobile_da">
		<p class="text">Mobile DA</p>
		<input type="checkbox" name="cb1[]" class="cb1" value="mobile_da">
		<p class="text">Web & Mobile Site</p>
		&nbsp;
	  </td>
   </tr>
    <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�޴� ��� �̸�</td>
      <td>
		<input type="radio" name="cb2[]" class="cb1" value="annual project">
		<p class="text">Annual project<br/>����</p>
		<input type="radio" name="cb2[]" class="cb1" value="short team project">
		<p class="text">Short-term project<br/>�ܱ�</p>
		<input type="radio" name="cb2[]" class="cb1" value="renewal">
		<p class="text">Renewal<br/>������</p>
		<input type="radio" name="cb2[]" class="cb1" value="maintenance">
		<p class="text">Maintenance<br/>�/��������</p>
		<input type="radio" name="cb2[]" class="cb1" value="others">
		<p class="text">Others<br/>��Ÿ</p>
	  </td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">Your Company</td>
      <td><input type="text" class="pq_input" name="compnany" id="compnany" value="�����ܷ�"></td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">Name</td>
      <td><input type="text" class="pq_input" name="fromName" id="company_name" value="�迵��"></td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">position</td>
      <td><input type="text" class="pq_input" name="position" id="position" value="����� ������ ��ġ��"></td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">phone_number</td>
      <td><input type="text" class="pq_input" name="phone_number" id="phone_number" value="010-2647-3238"></td>
   </tr>

    <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">phone_number</td>
      <td><input type="text" class="pq_input" name="mailFrom" id="e-mail" value="hun8902@iconlab.co.kr"></td>
   </tr>


 <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">Title</td>
      <td><input type="text" class="pq_input_l" name="title" id="title" value="Title"></td>
   </tr>



   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�޴� ��� �̸�</td>
      <td><p><input type="text" name="to_name" size="15" value="�迵��"></td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�޴� ��� Email</td>
      <td><p><input type="text" name="to" size="30" value="hun8902@naver.com"></td>
   </tr>

   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�� ��</td>
      <td><p><input type="text" name="subject" size="50" value="����"></td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">�� ��<br>(<input type=checkbox name=use_html value=1 style="border:0;" >html ���)</td>
      <td><p><textarea name="content" rows="10" cols="55"></textarea>
   </tr>
   <tr bgcolor=FFFFFF>
      <td width="200" bgcolor="efefef"><p align="center">÷ ��</td>
      <td>
         <input type="file" name="userfile[]" size="30"><br>
         <input type="file" name="userfile[]" size="30"><br>
         <input type="file" name="userfile[]" size="30">
      </td>
   </tr>
   <tr bgcolor=FFFFFF>
      <td colspan=2 align=center><br>
         <input type="submit" value="����������">
         <input type="reset" value="�ٽþ���">
      </td>
   </tr>
</form>
</table>
</body>
</html>