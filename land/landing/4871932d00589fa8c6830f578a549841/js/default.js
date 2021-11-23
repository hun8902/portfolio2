function first_scene(){
	var click_chk = $("#click_chk").val();
	if(click_chk==""){		// 클릭으로 실행했을때 다시 window.onload 가 안먹히도록..
		$("#click_chk").val("1");
		$("#scene1").attr("style","display:none;");
		$("#scene2").attr("style","display:;");
		text_toggle('scene2_text','Running TAS market Profile',300);	//깜박거리는 시간 300 = 0.3초

		setTimeout("second_scene()",3000);			// 2번씬으로 넘어가는 시간 3000=3초		
	}	
}

function second_scene(){
	$("#scene2").attr("style","display:none;");
	$("#scene3").attr("style","display:;");
	text_toggle('scene3_text','Analyzing...',300);		//깜빡거리는 시간 300 = 0.3초
	prograss();

	setTimeout("third_secene()",2000);				// 3번씬으로 넘어가는 시간 3000=3초
}

function third_secene(){
	$("#scene3").attr("style","display:none;");
	$("#scene4").attr("style","display:;");

	setTimeout("fourth_secene()",2000);			// 4번씬으로 넘어가는 시간 2000 = 2초	
}

function fourth_secene(){
	$("#scene4").attr("style","display:none;");
	$("#scene5").attr("style","display:;");
}

function text_toggle(t_id,t_text,t_time){	
	var toogle_text = $("#"+t_id).html();
	if(toogle_text==""){
		$("#"+t_id).html(t_text);
	}else{
		$("#"+t_id).html("");
	}
	setTimeout("text_toggle('"+t_id+"','"+t_text+"','"+t_time+"')",t_time);
}

/* 약관 체크박스 */
function all_chk(obj){
	var agree_all = obj.checked;
	$("#agree1").prop("checked",agree_all);
	$("#agree2").prop("checked",agree_all);
	$("#agree3").prop("checked",agree_all);
}

/* 약관 레이어 열기 */
function agree_box(div_id,src_url){
	if(src_url=="agree1.html"){
		$("#agree_title").html("개인정보취급 방침 및 활용동의");
	}else{
		$("#agree_title").html("개인정보취급 제3자 제공동의");
	}
	$("#agree_frame").attr("src",src_url);
	$("#"+div_id).bPopup();
}

function agree_box_close(div_id){
	$("#"+div_id).bPopup().close();
}



function prograss(){	
	var pGress1 = setInterval(function() {
        var pVal1 = parseInt($("#progressbar1").data("value"));

        if(pVal1 > 100) {
            clearInterval(pGress1);			
        } else {
            pVal1++;

            $("#progressbar1").progressbar({
                value: pVal1
            }).data("value", pVal1);
        }
    }, 7);	
}
