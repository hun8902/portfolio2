<?php include "../include/head.php"; ?>
<body>
	<?php include "../include/nav.php"; ?>
    <?php include "../include/top.php"; ?>
	<?php 
	$update_id = $_GET["id"]; 
	?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>회원정보 수정</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">


												<?php
												$sql = mq("select * from gosu_member where id='$update_id'");
												$row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
												 while($board = $sql->fetch_array()){
												  ?>


												<div class="col-md-12">
                                                    <form name="signUp" id="signUp" method="post" action="member_detail_proc.php" onsubmit="return checkSubmit()">
														<input type="hidden" name="idx" value="<?php echo $board['idx']?>">
														<div class="form-group">
                                                            <label for="exampleInputPassword1">아이디</label>
																<input type="text" name="memberId" class="form-control memberId" value="<?php echo $board['id']?>"  required  />
                                                        </div>
														<div class="form-group">
                                                            <label for="exampleInputPassword1">비밀번호</label>
                                                            <input type="password" class="form-control" name="passwd" id ="passwd" placeholder="비밀번호를 입력해주세요"  required >
                                                        </div>
														<div class="form-group">
                                                            <label for="exampleInputPassword1">비밀번호 확인</label>
                                                            <input type="password" class="form-control" name="passwd_ok" id ="passwd_ok" placeholder="비밀번호를 재 입력해주세요"  required >
                                                        </div>
														<div class="form-group">
                                                            <label>이름</label>
                                                            <input type="text" class="form-control" placeholder="이름을 입력해주세요" name="name" id="name"  value="<?php echo $board['name']?>" required >
                                                        </div>
														<div class="form-group">
                                                            <label>부서</label>
                                                            <input type="text" class="form-control" placeholder="부서를 입력해주세요" name="department" id="department"  value="<?php echo $board['department']?>" required >
                                                        </div>
														<div class="form-group">
                                                            <label>직위</label>
                                                            <input type="text" class="form-control" placeholder="직위를 입력해주세요" name="spot" id="spot"  value="<?php echo $board['spot']?>" required >
                                                        </div>
														<div class="form-group">
                                                            <label>권한</label>
																			
															
															<select class="js-example-basic-single form-control select2-hidden-accessible" name="level" id="level"  data-select2-id="1" tabindex="-1" aria-hidden="true">		<option value="<?php echo $board['level']?>" data-select2-id="<?php echo $board['level']?>"><?php if($board['level']==1){echo "슈퍼관리자";}elseif($board['level']==2){echo "부관리자";}else{echo "기획자";};?></option>										
																<option value="3" data-select2-id="3">기획자</option>
																<option value="2" data-select2-id="2">부관리자</option>
																<option value="1" data-select2-id="1">슈퍼관리자</option>
															</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">이메일</label>
                                                            <input type="email" class="form-control" name="email" id ="email"  aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $board['email']?>" required >                                        
                                                        </div>												 
													
														<div class="form-group">
                                                            <label for="exampleInputPassword1">휴대폰 번호</label>
															<input type="text" name="phone" id ="phone"  class="form-control us_telephone" data-mask="(999) 9999-9999" value="<?php echo $board['phone']?>" required>
                                                        </div>

	
														<button type="submit" class="btn btn-primary">정보수정</button>
														<?php if($update_id != "admin"){ ?>
														<button type="button" class="btn btn-primary del" value="<?php echo $board['idx']?>">삭제</button>
														<?php } ?>
                                                    </form>
													   <div class="formCheck">
														<input type="hidden" name="idCheck" class="idCheck" />
														<input type="hidden" name="pw2Check" class="pwCheck2" />
														<input type="hidden" name="eMailCheck" class="eMailCheck" />
													</div>

                                                </div>




												 <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Input group -->
                                    
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->



	<?php include "../include/footer.php"; ?>
</body>
</html>
<script>
	$('#signUp').on( 'click', '.del', function () {
		if (confirm("삭제하시겠습니까?") == false) {
			return false;
		}else{
			var data= $(".del").val();
			location.href="member_del.php?idx=" + data + "";
			return true;
		}
	} );
</script>