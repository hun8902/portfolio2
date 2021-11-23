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
											<h5>접속로그</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">
													<div class="dt-buttons btn-group"></div>

													<div id="key-act-button_filter" class="dataTables_filter">  </div>

														<table id="empTable" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="key-act-button_info">

															<thead>
																
																<tr role="row">
																
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="num: : activate to sort column descending"style="width: 150px;" >IP</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">접속 경로</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending"  style="width: 100px;">브라우저</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" style="width: 100px;">OS</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Age: activate to sort column descending" style="width: 100px;">접속기기</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">일시</th>
																</tr>
															</thead>
															<tbody>
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
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'datatables/ip_log.php'
            },
            'columns': [
                {
                    data: 'regip'
                }, {
                    data: 'referer'
                }, {
                    data: 'browser'
                }, {
                    data: 'os'
                }, {
                    data: 'device'
                }, {
                    data: 'regdate'
                }
            ],
            "order": [
                [5, "desc"]
            ]

        });

    });
</script>