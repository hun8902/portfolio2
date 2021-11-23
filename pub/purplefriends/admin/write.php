
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Dashboard Template for Bootstrap</title>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">관리자 모드</a>
        </div>
        <div class="navbar-collapse collapse">
          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">뉴스관리</a></li>

          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">글쓰기</h2>

          <div class="table-responsive">
		  <form action=insert.php method=post>
			<table class="table table-striped">
              <tbody>
				<tr>
					<td>글제목</td>
					<td><input type="text" name="news_title"  maxlength="50"></td>
				</tr>
				<tr>
					<td>글요약 내용</td>
					<td><textarea type="text" name="news_text" maxlength="1000"></textarea>
					<br/>줄바꿈은 br태그를 이용하여 적어줍니다.</td>
				</tr>
				<tr>
					<td>이미지 파일명</td>
					<td><input type="text" name="news_content" size="20" maxlength="10"><br/>
						ex) 파일저장 확장자는 png로 저장후 ftp img 폴더에 업로드 해줍니다.<br/>aaa.png 파일일 경우 aaa만 적어주시면 됩니다.</td>
				</tr>
				<tr>
					<td>날짜</td>
					<td><input type="text" name="news_date" size="20" maxlength="10"><br/>
						ex) 2014.08.19 이런식으로 기입할 것
					</td>
				</tr>


             
                
              </tbody>
            </table>
			<INPUT type=submit value="글 저장하기">
					&nbsp;&nbsp;
					<INPUT type=reset value="다시 쓰기">
					&nbsp;&nbsp;
					<INPUT type=button value="되돌아가기" 
					onclick="history.back(-1)">


		  
           
		</form>

			
          </div>
        </div>
      </div>
    </div>

   
  </body>
</html>



</body>
</html>