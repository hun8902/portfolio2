<?
//데이터 베이스 연결하기
include "db_info.php";

# LIST 설정
# 1. 한 페이지에 보여질 게시물의 수
$page_size=5;

# 2. 페이지 나누기에 표시될 페이지의 수
$page_list_size = 10;

if (!isset($_GET['no']) || $_GET['no'] < 0) $no=0;
else $no = $_GET['no'];

// 데이터베이스에서 페이지의 첫번째 글($no)부터 
// $page_size 만큼의 글을 가져온다.
$query = "SELECT * FROM purple_news ORDER BY news_no DESC LIMIT $no,$page_size";
$result = $mysqli->query($query);

// 총 게시물 수 를 구한다.
$result_count = $mysqli->query("SELECT count(*) FROM purple_news");
$result_row	  = $result_count->fetch_row();
$total_row	  = $result_row[0];
//결과의 첫번째 열이 count(*) 의 결과다.

# 총 페이지 계산
if ($total_row <= 0) $total_row = 0;
$total_page = ceil($total_row / $page_size);

# 현재 페이지 계산
$current_page = ceil(($no+1)/$page_size);
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
				<?
				while($row= $result->fetch_array())
				{
				?>
				<!-- 행 시작 -->
				<tr>
					<!-- 번호 -->
					<td>
						<a href="read.php?news_no=<?=$row['news_no']?>&no=<?=$no?>">
						<?=$row['news_no']?></a>
					</td>
					<!-- 번호 끝 -->
					<!-- 제목 -->
					<td>
						<a href="read.php?news_no=<?=$row['news_no']?>&no=<?=$no?>">
						<?=strip_tags($row['news_title'], '<b><i>');?></a>
					</td>
					<!-- 제목 끝 -->
					<!-- 날짜 -->
					<td>
						<font color=black><?=$row['news_text']?></font>
					</td>
					<!-- 날짜 끝 -->
					<!-- 날짜 -->
					<td >
						<font color=black><?=$row['news_content']?></font>
					</td>
					<!-- 날짜 끝 -->
					<!-- 조회수 -->
					<td>
						<font color=black><?=$row['news_date']?></font>
					</td>
					<!-- 조회수 끝 -->
				</tr>
				<!-- 행 끝 -->
				<?
				} // end While
				//데이터베이스와의 연결을 끝는다.
				$mysqli->close();
				?>
             
                
              </tbody>
            </table>


			<table>
				<tr>
					<td>
					&nbsp;
				<?
				$start_page = floor(($current_page - 1) / $page_list_size) 
								* $page_list_size + 1;

				# 페이지 리스트의 마지막 페이지가 몇 번째 페이지인지 구하는 부분이다.
				$end_page = $start_page + $page_list_size - 1;

				if ($total_page < $end_page) $end_page = $total_page;
				if ($start_page >= $page_list_size) {
					# 이전 페이지 리스트값은 첫 번째 페이지에서 한 페이지 감소하면 된다.
					# $page_size 를 곱해주는 이유는 글번호로 표시하기 위해서이다.

					$prev_list = ($start_page - 2)*$page_size;
					echo "<a href=\"$PHP_SELF?no=$prev_list\">◀</a>\n";
				}

				# 페이지 리스트를 출력
				for ($i=$start_page;$i <= $end_page;$i++) {
					$page= ($i-1) * $page_size;// 페이지값을 no 값으로 변환.
					if ($no!=$page){ //현재 페이지가 아닐 경우만 링크를 표시
						echo "<a href=\"$PHP_SELF?no=$page\">";
					}
					
					echo " $i "; //페이지를 표시
					
					if ($no!=$page){
						echo "</a>";
					}
				}

				# 다음 페이지 리스트가 필요할때는 총 페이지가 마지막 리스트보다 클 때이다.
				# 리스트를 다 뿌리고도 더 뿌려줄 페이지가 남았을때 다음 버튼이 필요할 것이다.
				if($total_page > $end_page)
				{
					$next_list = $end_page * $page_size;
					echo "<a href=$PHP_SELF?no=$next_list>▶</a><p>";
				}
				?>
					</td>
				</tr>
				</table>

			
          </div>
        </div>
      </div>
    </div>

   
  </body>
</html>



</body>
</html>