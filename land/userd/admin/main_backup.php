<?php include "include/head.php"; ?>
<body>
	<?php include "include/nav.php"; ?>
    <?php include "include/top.php"; ?>
	

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
							<div class="row">
								 <!--[ Recent Users ] start-->
                                <div class="col-xl-12 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>최근 신청자</h5>
											<a href="landing/landing_apply.php" class="label theme-bg2 text-white f-14 f-w-400 float-right">더보기</a>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
											<?php
												$sql = "SELECT DISTINCT A.name, A.phone, B.*  FROM cus_member A INNER JOIN cus_code B ON A.key = B.key limit 4";
												$result = mysqli_query($db,$sql);
												//쿼리 조회 결과가 있는지 확인
												if($result) {
												} else {
													}
												?>

                                                <table class="table table-hover">
                                                    <tbody>
														<tr>
														<th></th>
                                                        <th>이름</th>
                                                        <th>전화번호</th>
                                                        <th>등록시간</th>
														<th>레퍼리</th>
                                                    </tr>
														 <?php
															//반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
															while($row = mysqli_fetch_array($result)){ 
														?>
                                                        <tr class="unread">
															<td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-2.jpg" alt="activity-user"></td>
                                                            <td>
                                                                <h6 class="mb-1"><?php echo $row["name"]; ?></h6>
                                                            </td>
															<td>
                                                                <h6 class="mb-1"><?php echo $row["phone"]; ?></h6>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><?php echo $row["dt"]; ?></h6>
                                                            </td>
															<td>
                                                                <h6 class="text-muted"><a href="<?php echo $row["ref_url"]; ?>" target='_blank'><?php echo mb_substr($row["ref_url"], 0, 70);?>...</a></h6>
                                                            </td>
                                                        </tr>
														<?php
															}
														?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Recent Users ] end-->
								
								 <!-- [ Morris Chart ] start -->
                                
                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>방문자 추이</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="morris-line-smooth-chart" class="ChartShadow" style="height:300px"></div>
                                        </div>
                                    </div>
                                </div>

								
								
                                <!-- <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Donut Chart</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="morris-donut-chart" style="height:300px"></div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- [ Morris Chart ] end -->
								
								<div class="col-md-6 col-xl-4">
									<div class="card Active-visitor" >
										<div class="card-block text-center">
											<h5 class="mb-3">방문자 정보</h5>
											<i class="fas fa-user-friends f-30 text-c-green"></i>
											<h2 class="f-w-300 mt-3" ><?php echo $total_visit_count; ?>명</h2>
											<span class="text-muted">랜딩 페이지 총 접속자수</span>
											<div class="progress mt-4 m-b-40">
												<div class="progress-bar progress-c-theme" role="progressbar" style="width: <?php echo round($total_pc_per,10); ?>%; height:10px;" aria-valuenow="<?php echo round($total_pc_per,10); ?>" aria-valuemin="0" aria-valuemax="100"></div>
												<div class="progress-bar progress-c-theme2" role="progressbar" style="width: <?php echo round($total_mobile_per,10); ?>%; height:10px;" aria-valuenow="<?php echo round($total_mobile_per,10); ?>" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<div class="row card-active">
												<div class="col-md-6 col-8">
													<h4><?php echo round($total_pc_per,1); ?>%</h4>
													<span class="text-muted">Desktop</span>
												</div>
												<div class="col-md-6 col-8">
													<h4><?php echo round($total_mobile_per,1); ?>%</h4>
													<span class="text-muted">Mobile</span>
												</div>
											</div>
										</div>
									</div>
									 <!--[ Monthly  sales section ] starts-->
										<div class="card Monthly-sales">
											<div class="card-block">
												<h6 class="mb-4">총 신청 인원</h6>
												<div class="row d-flex align-items-center">
													<div class="col-9">
														<h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-users text-c-red f-30 m-r-10"></i><?php echo $total_member ?>명</h3>
													</div>
													<div class="col-3 text-right">
														<p class="m-b-0"><?php echo round($total_member_per,1); ?>%</p>
													</div>
												</div>
												<div class="progress m-t-30" style="height: 7px;">
													<div class="progress-bar progress-c-theme2" role="progressbar" style="width: <?php echo round($total_member_per,1); ?>%;" aria-valuenow="<?php echo round($total_member_per,1); ?>" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
								</div>
								


                                

                            </div>
                            <!-- <div class="row">
								세션 : <?php echo $_SESSION["id"] ;?>
								레벨 체크 : <?php echo $lv_check;?>
								메인화면 구성준비중
								
							</div> -->


                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

<?php include "include/footer.php"; ?>
</body>
</html>
<script>
	$(document).ready(function(){
		function check_session()
		{
			$.ajax({
			url:"member/check_session.php",
			method:"POST",
			success:function(data)
				{
					if(data == '1')
					{
					alert('Your session has been expired!');
					window.location.href="index.php";
					}else{
						alert('session alive');
					}
				}
			})
		}
	});

</script>
<script>
$(document).ready(function() {
setTimeout(function() {


// [ line-smooth-chart ] start
Morris.Line({
	element: 'morris-line-smooth-chart',
	data: [{
			y: '<?php echo $date_count[0]; ?>',
			a: <?php echo $today_visit_count ?>
		},
		{
			y: '<?php echo $date_count[1]; ?>',
			a: <?php echo $visit_count[1] ?>
		},
		{
			y: '<?php echo $date_count[2]; ?>',
			a: <?php echo $visit_count[2] ?>,
		},
		
		{
			y: '<?php echo $date_count[3]; ?>',
			a: <?php echo $visit_count[3] ?>,
		},
		{
			y: '<?php echo $date_count[4]; ?>',
			a: <?php echo $visit_count[4] ?>,
		},
		{
			y: '<?php echo $date_count[5]; ?>',
			a: <?php echo $visit_count[5] ?>,
		},
		{
			y: '<?php echo $date_count[6]; ?>',
			a: <?php echo $visit_count[6] ?>,
		}
	],
	xkey: 'y',
	redraw: true,
	resize: true,
	ykeys: ['a'],
	hideHover: 'auto',
	responsive:true,
	labels: ['방문자수'],
	lineColors: ['#1de9b6']
});
// [ line-smooth-chart ] end

// [ Donut-chart ] Start
var graph = Morris.Donut({
	element: 'morris-donut-chart',
	data: [{
			value: 60,
			label: 'Data 1'
		},
		{
			value: 20,
			label: 'Data 1'
		},
		{
			value: 10,
			label: 'Data 1'
		},
		{
			value: 5,
			label: 'Data 1'
		}
	],
	colors: [
		'#1de9b6',
		'#A389D4',
		'#04a9f5',
		'#1dc4e9',
	],
	resize: true,
	formatter: function(x) {
		return "val : " + x
	}
});    
// [ Donut-chart ] end
	}, 700);
});

</script>
