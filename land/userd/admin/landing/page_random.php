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
																	 <th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="num: : activate to sort column ascending" >폴더</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">랜딩</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 96px;">관리</th>
																</tr>
															</thead>
															<tbody>
																<tr role="row">
																	<th>
																		1
																	</th>
																	<th>
																		1
																	</th>
																	<th>
																		1
																	</th>
																</tr>
																
															
															</tbody>
															<tfoot>
															</tfoot>
														</table>
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
       /* $(document).ready(function(){
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

        });*/
  </script>