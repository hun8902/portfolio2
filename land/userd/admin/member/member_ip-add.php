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
                                            <h5>회원등록</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
											

                                                <div class="col-md-12">
                                                    <form name="signUp" method="post" action="ipadd_proc.php" onsubmit="return checkSubmit()">
														<div class="form-group">
                                                            <label for="exampleInputPassword1">아이피</label>
																<input type="text"  name="add_ip" class="form-control add_ip"  required value="">
															<!-- <div class="memberIdCheck">중복 확인</div>
															<div class="memberIdComment comment"></div> -->
                                                        </div>
														<div class="form-group">
                                                            <label>코멘트</label>
                                                            <input type="text" class="form-control" placeholder="사용하는 곳" name="coment" id="coment"  value="" required >
                                                        </div>
														


                                                        <button type="submit" class="btn btn-primary">등록</button>

                                                    </form>
													   <div class="formCheck">
														<input type="hidden" name="idCheck" class="idCheck" />
														<input type="hidden" name="pw2Check" class="pwCheck2" />
														<input type="hidden" name="eMailCheck" class="eMailCheck" />
													</div>

                                                </div>
                                           

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
	$(function(){
 
    //아이디 중복 확인 소스
    var memberIdCheck = $('.memberIdCheck');
    var memberId = $('.add_ip');
    var memberIdComment = $('.memberIdComment');
    var memberPw = $('#passwd');
    var memberPw2 = $('#passwd_ok');
    var memberPw2Comment = $('.memberPw2Comment');
    var memberNickName = $('.memberNickName');
    var memberNickNameComment = $('.memberNickNameComment');
    var memberEmailAddress = $('.memberEmailAddress');
    var memberEmailAddressComment = $('.memberEmailAddressComment');
    var memberBirthDay = $('.memberBirthDay');
    var memberBirthDayComment = $('.memberBirthDayComment');
    var idCheck = $('.idCheck');
    var pwCheck2 = $('.pwCheck2');
    var eMailCheck = $('.eMailCheck');

	
	

    memberIdCheck.click(function(){
		var memberIdv = $('.add_ip').val();

		  console.log(memberIdv);
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'ipadd_check.php',
            data: {memberId: memberIdv},
			
            success: function ( json) {
				console.log(json);
                if(json.result == 'good') {
                    memberIdComment.text('사용가능한 아이디 입니다.');
                    idCheck.val('1');
                }else{
                    memberIdComment.text('다른 아이디를 입력해 주세요.');
                    memberId.focus();
                }
            },
 
            error: function(){
              console.log('failed');
 
            }
        })
    });
 
 
});
 
function checkSubmit(){
    var idCheck = $('.idCheck');
    var pwCheck2 = $('.pwCheck2');
    var eMailCheck = $('.eMailCheck');
    var memberBirthDay = $('.memberBirthDay');
    var memberNickName = $('.memberNickName');
    var memberName = $('.memberName');
 
 
    if(idCheck.val() == '1'){
        res = true;
    }else{
        res = false;
    }
    if(pwCheck2.val() == '1'){
        res = true;
    }else{
        res = false;
    }
    if(eMailCheck.val() == '1'){
        res = true;
    }else{
        res = false;
    }
 
    if(memberName.val() != ''){
        res = true;
    }else{
        res = false;
    }
    if(memberBirthDay.val() != ''){
        res = true;
    }else{
        res = false;
    }
    if(memberNickName.val() != ''){
        res = true;
    }else{
        res = false;
    }
 
    if(res == false){
        alert('회원가입 폼을 정확히 채워 주세요.');
    }
    return res;
 
}
</script>