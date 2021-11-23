<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="copyright" content="2017 copyright &amp; copy; KLCNS, all right reserved.">
  <title>CALLRABi&trade; : Agent</title>
  <link rel="stylesheet" media="screen" href="css/login.css">
  	


 </head>
 <body>
  <div id="loginWarp">
  	<div class="boxarea">
		<div class="product_text">CALLRABI</div>
		<div class="info_text">
			<p>콜라비 웹 스테이션에 오신것을 환영합니다.</p>
			<p>Welcome to “CALLRABi Web Station”</p>
		</div>
		<div class="login_input">
			<div><span class="text">User  ID</span><input type="text" name="USER_ACODE" id="LOGIN_TXT" style="ime-mode:disabled" maxlength="4" autocomplete="no" placeholder="ID"></div>
			<div><span class="text">Password</span><input type="password" name="USER_PW" id="LOGIN_TXT" style="ime-mode:disabled" maxlength="12" autocomplete="no" placeholder="비밀번호" onkeyup="CHKKEY(this.value)"></div>
			<div><span class="text">Ext(내선)</span><input type="text" name="USER_ACODE" id="LOGIN_TXT" style="ime-mode:disabled" maxlength="4" autocomplete="no" placeholder="내선번호"></div>

			<div class="loginbtn">
				<input type="checkbox" id="loginBtn" name="SAVE_CODE" value="1">
				<label for="loginBtn" class="ch_text">Save ID</label>
				<input type="button" value="LOGIN" id="BTN" class="LOCK"  title="로그인" onclick="LOGIN()">
			</div>
		</div>
		<div class="foot_logo">
			<a href="#"><img src="img/login_foot_logo.png" alt="LOGO" /></a>
		</div>
	</div>
  </div>
 </body>
</html>
