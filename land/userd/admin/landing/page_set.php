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
											<h5>페이지 셋팅</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive1">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">
													<div class="dt-buttons btn-group"></div>
																	


														<table id="empTable" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="empTable">

															<thead>
																
																<tr role="row">
																	 <th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="num: : activate to sort column ascending" style="width: 40px;">번호</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">타이틀 </th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">주소</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">테마 적용 </th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">폴더명 </th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 197px;">랜덤 유무 </th>
																	<th class="sorting_asc" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" style="width: 194px;" aria-sort="ascending">설명</th>
																	
																	<th class="sorting_asc" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" style="width: 194px;" aria-sort="ascending">메모</th>

																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 96px;">관리</th>
																</tr>
															</thead>
															<tbody>
																
															
															</tbody>
															<tfoot>
															</tfoot>
														</table>
														<button type="button" class="btn btn-primary" onclick="window.location.href='landing_add.php'">신규 등록</button>
										
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
        $(document).ready(function(){
			 var table = $('#empTable').DataTable( {
		
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'datatables/page_set.php'
                },
                'columns': [
                    { data: 'idx' },
                    { data: 'title' },
					{ data: 'url' },
                    { data: 'startland' },
					{ data: 'real_fd' },
                    { data: 'randland' },
					{ data: 'info' },
					{ data: 'memo' },
					{ data: 'idx' },

                ],
					"columnDefs": [{
					"targets": -1,
					"data": null,
					"render": function(data, type, row){
						return "<a class='label theme-bg2 text-white f-12' href='landing_detail.php?id="+  data +"'>수정</a> "
					},
					"orderable": false
					}]
					


			} );
		 
			$('#empTable tbody').on( 'click', 'button', function () {
				var data = table.row( $(this).parents('tr') ).data();
				console.log( data );
				var dataid = data['idx'];
			} );

        });
  </script>