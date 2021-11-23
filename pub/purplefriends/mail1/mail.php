<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>폼메일테스트</title>
<style type="text/css" title="">
body,table,td {font-size:10pt;};
input, textarea {font-size:10pt;border:1 solid #999999;};
</style>
<script language="Javascript">
<!--
function checkForm() {
   var f = document.form;
   if(!f.to_name.value) {
      alert('받는 사람 이름을 입력해 주세요.');
      f.to_name.focus();
      return false;
   }
   if(!f.to.value) {
      alert('받는 사람 이메일 주소를 입력해 주세요.');
      f.to.focus();
      return false;
   }
   if(!f.from_name.value) {
      alert('보내는 사람 이름을 입력해 주세요.');
      f.from_name.focus();
      return false;
   }
   if(!f.from.value) {
      alert('보내는 사람 이메일 주소를 입력해 주세요.');
      f.from.focus();
      return false;
   }
   if(!f.subject.value) {
      alert('제목을 입력해 주세요.');
      f.subject.focus();
      return false;
   }
   if(!f.content.value) {
      alert('내용을 입력해 주세요.');
      f.content.focus();
      return false;
   }
   return true;
}
//-->
</script>
</head>
<body>
<center><font size=4>메일보내기</font></center>
<br>

<form method="post" name="form" enctype="multipart/form-data" action="mail_send.php" onSubmit="return checkForm();">
<table border="0" align=center width="600" cellpadding=2 cellspacing=1 bgcolor=999999>
<input type="hidden" name="to_name" size="15" value="김영훈">
<input type="hidden" name="to" size="30" value="hun8902@naver.com">

   <div class="project_rq_table">
		<table>
			<tr>
				<td class="title" style="width:195px; height:80px;">01.Project Scope<div class="title1">프로젝트 범위(복수 선택 가능)</div></td>
				<td colspan="4">
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
			<tr>
				<td class="title" style="width:195px; height:80px;">02. Project Type<div class="title1">프로젝트 범위 성격</div></td>
				<td colspan="4">
					<input type="radio" name="cb2[]" class="cb1" value="annual project">
					<p class="text">Annual project<br/>연가</p>
					<input type="radio" name="cb2[]" class="cb1" value="short team project">
					<p class="text">Short-term project<br/>단기</p>
					<input type="radio" name="cb2[]" class="cb1" value="renewal">
					<p class="text">Renewal<br/>리뉴얼</p>
					<input type="radio" name="cb2[]" class="cb1" value="maintenance">
					<p class="text">Maintenance<br/>운영/유지보수</p>
					<input type="radio" name="cb2[]" class="cb1" value="others">
					<p class="text">Others<br/>기타</p>
					
					&nbsp;
				</td>
			</tr>
			<tr>
				<td style="width:195px; height:35px;"></td>
				<td style="width:100px;">
					<p class="text1">Your Company</p>
				</td>
				<td style="width:270px;">
					<input type="text" class="pq_input" name="compnany" id="compnany">
				</td>
				<td style="width:100px;">
					<p class="text1">Name</p>
				</td>
				<td>
					<input type="text" class="pq_input" name="from_name" id="company_name">
				</td>
			</tr>
			<tr>
				<td style="width:195px; height:35px;"></td>
				<td>
					<p class="text1">Position</p>
				</td>
				<td>
					<input type="text" class="pq_input" name="position" id="position">
				</td>
				<td>
					<p class="text1">Phone Number</p>
				</td>
				<td>
					<input type="text" class="pq_input" name="phone_number" id="phone_number">
				</td>
			</tr>
			<tr>
				<td style="width:195px; height:35px;"></td>
				<td >
					<p class="text1">Mobile Numbers</p>
				</td>
				<td>
					<input type="text" class="pq_input" name="mobile_numbers" id="mobile_numbers">
				</td>
				<td>
					<p class="text1">E-mail</p>
				</td>
				<td>
					<input type="text" class="pq_input" name="from" id="e-mail">
				</td>
			</tr>
			<tr>
				<td style="width:195px; height:35px;"></td>
				<td>
					Title
				</td>
				<td colspan="3">
					<input type="text" class="pq_input_l" name="subject" id="title">
				</td>
			</tr>
			<tr>
				<td class="vmiddle title" style="width:199px; height:245px;">03. Inquiry<div class="title1">프로젝트 정보</div></td>
				<td class="vmiddle">
					Inquiry Detail
				</td>
				<td colspan="3">
					<textarea name="content" style="width:610px; height:185px; border:1px solid #d4d3d3;"></textarea>
				</td>
			</tr>
			<tr>
				<td class="vmiddle title" style="width:195px">04. Attachment<div class="title1">첨부파일 최대 10MB 업로드 가능</div></td>
				<td class="vtop">
					#1 File
				</td>
				<td colspan="3">
					 <div style="position:absolute; margin:0 0 0 412px"><input type="image"  name="send" src="img/apply.png"  ></div>
					 <div class="fileDiv">
							<input class="buttonImg" type="button"/>
							<input class="realFile"  name="userfile[]"  onchange="javascript:document.getElementById('fakeFileTxt').value=this.value" type="file"/>
						</div>
					 <input class="fakeFileTxt" id="fakeFileTxt" readonly="readonly" type="text">
						
					
				</td>
			</tr>
			<tr>
				<td class="vmiddle" style="width:195px; height:80px;"></td>
				<td class="vtop">
					#2 File
				</td>
				<td colspan="3">
					 <div class="fileDiv">
							<input class="buttonImg" type="button"/>
							<input class="realFile" name="userfile[]"  onchange="javascript:document.getElementById('fakeFileTxt1').value=this.value" type="file"/>
						</div>
					 <input class="fakeFileTxt" id="fakeFileTxt1" readonly="readonly" type="text">
						
					
				</td>
			</tr>

		</table>
	</div>

</form>

</body>
</html>