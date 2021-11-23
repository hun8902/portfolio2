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
											<h5>회원관리</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">
													<div class="dt-buttons btn-group"></div>

													<div id="key-act-button_filter" class="dataTables_filter">  </div>

														<table id="key-act-button" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="key-act-button_info">

															<thead>
																
																<tr role="row">
																	 <th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="num: : activate to sort column ascending" style="width: 97px;">번호</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">이름</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" style="width: 294px;" aria-sort="ascending">부서</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 144px;">직위</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 68px;">연락처</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 136px;">이메일</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 96px;">상태</th>
																</tr>
															</thead>
															<tbody>
																<tr role="row" class="odd">
																	<td>1</td>
																	<td>홍길동</td>
																	<td>개발팀</td>
																	<td>사원</td>
																	<td>010-1234-5678</td>
																	<td>test@test.com</td>
																	<td><a href="#!" class="label theme-bg2 text-white f-12">상세정보</a><a href="#!" class="label theme-bg text-white f-12">삭제</a></td>
																</tr>
																<tr role="row" class="even">
																	<td>2</td>
																	 <td>홍길동</td>
																	<td>개발팀</td>
																	<td>사원</td>
																	<td>010-1234-5678</td>
																	<td>test@test.com</td>
																	<td><a href="#!" class="label theme-bg2 text-white f-12">상세정보</a><a href="#!" class="label theme-bg text-white f-12">삭제</a></td>
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
