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
											<h5>아이피 관리</h5>
										</div>
										<div class="card-block">
											
											<div class="table-responsive">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">

														<table id="empTable" class="display table nowrap table-striped table-hover dataTable"  role="grid" aria-describedby="key-act-button_info">

															<thead>																
																<tr role="row">
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="num: : activate to sort column descending" aria-sort="descending"  style="width: 30px;" >번호</th>
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 180px;">위치</th>															
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1" aria-label="num: : activate to sort column descending">IP</th>			
																	<th class="sorting" tabindex="0" aria-controls="key-act-button" rowspan="1" colspan="1"  style="width: 50px;">관리</th>					
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th></th>
																	<th></th>
																	<th></th>
																	<th></th>
																</tr>
															</tbody>
														</table>
														<button type="button" class="btn btn-primary" onclick="window.location.href='member_ip-add.php'">IP 등록</button>
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
            'pageLength': 10, // 기본 데이터건수\
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
                'url': 'datatables/ip.php'
            },
            'columns': [
                {
                    data: 'idx'
                }, {
                    data: 'coment'
                }, {
                    data: 'add_ip'
                }, {
                    data: 'idx'
                }
            ],
            "columnDefs": [
                {
                    "targets": -1,
                    "data": null,
                    "render": function (data, type, row) {
                        return "<button type='button' class='btn btn-primary btn-sm btnDelete'  style='padding: 2px 10px;; !important'>삭제</button> ";
                    },
                    "orderable": false
                }
            ]
        });
        $('#empTable tbody').on('click', 'button', function () {
            if (confirm("삭제하시겠습니까?") == false) {
                return false;
            } else {
                var data = table.row($(this).parents('tr')).data();
                console.log(data);
                var dataid = data['idx'];
                location.href = "ipadd_del.php?idx=" + dataid + "";
                return true;
            }
        });
    });
</script>