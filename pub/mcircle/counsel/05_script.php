

<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="robots" content="noindex, nofollow">
<meta name="copyright" content="2017 copyright &amp; copy; KLCNS, all right reserved.">
<title>CALLRABi&trade; : Agent</title>

<link rel="shortcut icon" type="image/x-icon" href="/res/img/favicon_klcns.ico">
<!-- CSS Linked -->
<link rel="stylesheet" media="screen" href="../res/css/font.css">
<link rel="stylesheet" media="screen" href="../res/css/normalize.css">
<link rel="stylesheet" media="screen" href="../res/css/common.agent.css">
<link rel="stylesheet" media="screen" href="../res/css/selectric.css">

<!-- Javascript Linked -->
<script type="text/javascript" src="../res/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../res/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.selectric.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.stickytableheaders.min.js"></script>
<script type="text/javascript" src="../res/js/jquery.tablesorter.min.js"></script>

<script type="text/javascript" src="../res/js/common.js"></script>
<script type="text/javascript" src="../res/js/jHelper.js"></script>

<script type="text/javascript" src="../res/js/audio-player.js?v=180718a"></script>
<script type="text/javascript" src="../res/js/number-field.js?v=180719b"></script>

<script type="text/javascript">

window.addEventListener("aaaaa",function(){alert("aaaa")});

function getAgentCode() {

	if ($("#AGENT_CODE").length > 0) {
		return $("#AGENT_CODE").val();
	} else {
		return parent.$("#AGENT_CODE").val();
	}
}
	
</script>
</head>

<body class="agent">

	<article>
        <form name="frm" action="">


		<!-- 검색 -->
		<section class="query">
		
		</section>

		<!-- 스크립트 목록 그리드 -->
		<div class="section_wrap_l60">
			<section>
				<header>
					<p class="title">스크립트 목록</p>
					<!-- 라인수 조정 -->
					<div class="obj w15 padding_none right">
                    <select name='pageSize' onchange='loadPage()' ><option value=''>리스트 출력</option></select>					</div>
				</header>
				<div class="content" id="">
				
				
				</div>
			</section>
		</div>
		</form>
		
	</article>
</body>
</html>