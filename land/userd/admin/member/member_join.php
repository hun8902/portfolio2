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
                                                    <form name="signUp" method="post" action="member_join_proc.php" onsubmit="return checkSubmit()">
														<div class="form-group">
                                                            <label for="exampleInputPassword1">아이디</label>

																<input type="text" name="memberId" class="form-control memberId" value=""  required />
															<div class="memberIdCheck">중복 확인</div>
															<div class="memberIdComment comment"></div>
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
                                                            <input type="text" class="form-control" placeholder="이름을 입력해주세요" name="name" id="name"  value="" required >
                                                        </div>
														<div class="form-group">
                                                            <label>부서</label>
                                                            <input type="text" class="form-control" placeholder="부서를 입력해주세요" name="department" id="department"  value="" required >
                                                        </div>
														<div class="form-group">
                                                            <label>직위</label>
                                                            <input type="text" class="form-control" placeholder="직위를 입력해주세요" name="spot" id="spot"  value="" required >
                                                        </div>
														<div class="form-group">
                                                            <label>권한</label>
															<select class="js-example-basic-single form-control select2-hidden-accessible" name="level" id="level"  data-select2-id="1" tabindex="-1" aria-hidden="true">															
																<option value="3" data-select2-id="3">기획자</option>
																<option value="2" data-select2-id="2">부관리자</option>
																<option value="1" data-select2-id="1">슈퍼관리자</option>
															</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">이메일</label>
                                                            <input type="email" class="form-control" name="email" id ="email"  aria-describedby="emailHelp" placeholder="Enter email" value="" required >                                        
                                                        </div>												 
													
														<div class="form-group">
                                                            <label for="exampleInputPassword1">휴대폰 번호</label>
															<input type="text" name="phone" id ="phone"  class="form-control us_telephone" data-mask="(999) 9999-9999" required>
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
    var memberId = $('.memberId');
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
		var memberIdv = $('.memberId').val();

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'memberIdCheck.php',
            data: {memberId: memberIdv},
			
            success: function ( json) {
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
 
    //비밀번호 동일 한지 체크
    memberPw2.blur(function(){
       if(memberPw.val() == memberPw2.val()){
           memberPw2Comment.text('비밀번호가 일치합니다.');
           pwCheck2.val('1');
       }else{
           memberPw2Comment.text('비밀번호가 일치하지 않습니다.');
 
       }
    });
 
    //이메일 유효성 검사
    memberEmailAddress.blur(function(){
        var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        if(regex.test(memberEmailAddress.val()) === false){
            memberEmailAddressComment.text('이메일이 유효성에 맞지 않습니다.');
            eMailCheck.val('1');
        }else{
            memberEmailAddressComment.text('올바른 이메일 입니다.');
        }
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