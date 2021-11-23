<?php include "../include/head.php"; ?>
<body>

	<?php include "../include/nav.php"; ?>


    <?php include "../include/top.php"; ?>

    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ stiped-table ] start -->
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header">
											<h5>랜딩페이지 관리</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">
													<div class="dt-buttons btn-group"></div>

													<div id="key-act-button_filter" class="dataTables_filter">  </div>

														<table id="key-act-button" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="key-act-button_info">

															<thead>
																
																<tr role="row">
																	 <th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="num: : activate to sort column ascending" >번호</th>
																	 <th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >주소</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">마감일</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" aria-sort="ascending">이벤트 참여가능수</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >남은 인원</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >총 방문자수</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >관리</th>
																</tr>
															</thead>
															<tbody>
																<tr role="row" class="odd">
																	<td>1</td>
																	<td><a href="http://localhost/landing/200720/index.php" target="_blank">http://localhost/landing/200720/index.php</a></td>
																	<td>2020-07-31 00:00:00</td>
																	<td>33 명</td>
																	<td>11 명</td>
																	<td>31,234명</td>
																	<td><a href="#!" class="label theme-bg2 text-white f-12">수정</a><a href="#!" class="label theme-bg text-white f-12">삭제</a></td>
																</tr>
																<tr role="row" class="odd">
																	<td>2</td>
																	<td><a href="http://google.com" target="_blank">http://google.com</a></td>
																	<td>2021-08-31 00:00:00</td>
																	<td>330 명</td>
																	<td>11 명</td>
																	<td>71,234명</td>
																	<td><a href="#!" class="label theme-bg2 text-white f-12">수정</a><a href="#!" class="label theme-bg text-white f-12">삭제</a></td>
																</tr>


															</tbody>
															<tfoot>
															</tfoot>
														</table>
														
														<div class="dataTables_paginate paging_simple_numbers" id="key-act-button_paginate">
														
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
                                <!-- [ stiped-table ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- [ Main Content ] end -->



	<?php include "../include/footer.php"; ?>
</body>
</html>
