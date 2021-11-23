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

														<table id="empTable" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="empTable">

															<thead>
																
																<tr role="row">
																	 <th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 150px;">아이디</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 80px;">이름</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" aria-sort="ascending">부서</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >직위</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >권한</th>
																	
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" >연락처</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >이메일</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 96px;">상태</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th></th>
																	<th></th>
																	<th></th>
																	<th>.</th>
																	<th> </th>
																	<th></th>
																	<th></th>
																	<th></th>
																</tr>
																
															</tbody>
															<tfoot>
															</tfoot>
														</table>
														<button type="button" class="btn btn-primary" onclick="window.location.href='member_join.php'">맴버 등록</button>
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
<!-- Script -->
<script>
    $(document).ready(function () {
        var table = $('#empTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'print'
            ],
            'language' : lang_kor,
            'paging': true,
            'searching': true,
            'processing': true,
            'lengthChange': true, // 데이터건수 변경
            'pageLength': 50, // 기본 데이터건수\
            'lengthMenu': [
                [
                    50, 100, 1000
                ],
                [
                    50, 100, "Max(1000)"
                ]
            ], // 데이터건수옵션
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'datatables/member.php'
            },
            'columns': [
                {
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'department'
                }, {
                    data: 'spot'
                }, {
                    data: 'level'
                }, {
                    data: 'phone'
                }, {
                    data: 'email'
                }, {
                    data: 'id'
                }
            ],
            "columnDefs": [
                {
                    "targets": -1,
                    "data": null,
                    "render": function (data, type, row) {
                        return "<a class='label theme-bg2 text-white f-12' href='member_detail.php?id=" + data + "'>수정</a> "
                    },
                    "orderable": false
                }
            ]


        });

        $('#empTable tbody').on('click', 'button', function () {
            var data = table.row($(this).parents('tr')).data();
            console.log(data);
            var dataid = data['id'];
        });
    });
</script>