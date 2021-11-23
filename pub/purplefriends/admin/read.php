<?
	//데이터 베이스 연결하기
	include "db_info.php";
	
	if (!isset($_GET['news_no'])) die('ERROR : 페이지를 표시하기 위한 정보가 부족합니다.');
	$id = (int)$_GET['news_no'];
	$no =0;
	if(isset($_GET['no'])) $no = (int)$_GET['no'];

	// 글 정보 가져오기
	$result=$mysqli->query("SELECT * FROM purple_news WHERE news_no=$news_no");
	$row=$result->fetch_array();
?>
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

          <h2 class="sub-header">뉴스관리</h2>
		  <a href=write.php>글쓰기</a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>번호</th>
                  <th>글제목</th>
                  <th>글요약 내용</th>
                  <th>이미지 파일명</th>
                  <th>날짜</th>
                </tr>
              </thead>
              <tbody>
				<td><?=$row['news_no']?></td>
				<td><?=$row['news_title']?></td>
				<td><?=$row['news_text']?></td>
				<td><?=$row['news_content']?></td>
				<td><?=$row['news_date']?></td>
				
             
                
              </tbody>
            </table>
			<a class="btn btn-default" href=list.php?no=<?=$no?>>
				목록보기</a>
				<a class="btn btn-primary" href=write.php>
				글쓰기</a>
				<a class="btn btn-warning" href=edit.php?news_no=<?=$news_no?>>
				수정</a>
				<a class="btn btn-danger" href=predel.php?news_no=<?=$news_no?>>
				삭제</a>


			

			
          </div>
        </div>
      </div>
    </div>

   
  </body>
</html>


