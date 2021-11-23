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
											<h5>신청자 관리</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive1">
												<div id="key-act-button_wrapper" class="dataTables_wrapper dt-bootstrap4">
													<div class="dt-buttons btn-group"></div>
																	


														<table id="empTable" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="empTable">
															<thead>																
																<tr role="row">
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">이름</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column descending" aria-sort="ascending">연락처</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >등록일</th>
					
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >레퍼리</th>
																	<th class="sorting" tabindex="0" aria-controls="empTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">관리</th>
																</tr>
															</thead>
															<tbody>
																
															
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
        $(document).ready(function(){
			 var table = $('#empTable').DataTable( {
				 dom: 'Bfrtip',
					 buttons: [
					 'copy', 'excel', 'print',

				 ],
                'serverSide': false,
                'serverMethod': 'post',
                'ajax': {
                    'url':'datatables/landing_apply.php'
                },
                'columns': [
					{ data: 'name' },
					{ data: 'phone' },
					{ data: 'dt' },
					{ data: 'ref_url' },
					{ data: 'no' },

                ],
					"columnDefs": [{
					"targets": -1,
					"data": null,
					"render": function(data, type, row){
						return "<button type='button' class='btn btn-primary btn-sm btnDelete'  style='padding: 2px 10px;; !important'>삭제</button> ";
					},
					"orderable": false
					}]
					,"order": [[3, "desc"]]
					
			} );
		 
			$('#empTable tbody').on( 'click', 'button', function () {
				if (confirm("삭제하시겠습니까?") == false) {
					return false;
				}else{
						var data = table.row( $(this).parents('tr') ).data();
						console.log( data );
						var dataid = data['no'];
						location.href="landing_apply_del.php?idx=" + dataid + "";
						return true;
				}
			} );


        });
  </script>