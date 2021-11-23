/**
 * spread common functions
 */
// define contextPath
var contextPath = "";
// define interval value
var minutesAfterEvent = 0, secondsAfterEvent = 0;
// define event keys
var ctrlDown = false;
var ctrlKey = 17, vKey = 86, cKey = 67, aKey = 65, bsKey = 8, delKey = 46, leftKey = 37, rightKey = 39;

$.fn.extend({
	limitLength: function(event) {
		var _this = $(this);
		// is this the element of "textarea"?
		if ( !_this.is("textarea") ) { return false; }
		
		var span = _this.prev().find("span");
		// is the label exist?
		if ( span == undefined || span.length < 1 || span == null ) { return false; }
		
		function textLength(event) {
			var limit = _this.attr("maxlength");
			var wordlen = _this.val().replace(/\n/gi, ";").length;
			var leftlen = limit - wordlen;
			span.text("(" + leftlen + "자)");
			if ( leftlen > -1 ) {
				span.removeClass("txt_red");
			}
			else {
				span.addClass("txt_red");
			}
		};
		// apply on change or keydown event
		_this.on("input", textLength);
	},
	inputEnterKey: function(callback) {
		var _this = $(this);
		if ( !_this.is("input") ) { return false; }
		if ( typeof callback != "function" ) { return false; }  
		
		function compare(event) {
			if ( event.keyCode == 13 ) {
				callback();
				event.preventDefault();
				return false;
			}
		}
		_this.keydown(compare);
	}
});

$(function() {
	
	// /* ***********************************************************************
	//		날짜 format 함수
	//		ex) date.format("yyyy-MM-dd hh:mm:ss");
	//
	Date.prototype.format = function(f) {
		if (!this.valueOf()) return " ";

		var weekName = ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"];
		var d = this;
		
		return f.replace(/(yyyy|yy|MM|dd|E|hh|mm|ss|a\/p)/gi, function($1) {
			switch ($1) {
				case "yyyy": return d.getFullYear();
				case "yy": return (d.getFullYear() % 1000).zf(2);
				case "MM": return (d.getMonth() + 1).zf(2);
				case "dd": return d.getDate().zf(2);
				case "E": return weekName[d.getDay()];
				case "HH": return d.getHours().zf(2);
				case "hh": return ((h = d.getHours() % 12) ? h : 12).zf(2);
				case "mm": return d.getMinutes().zf(2);
				case "ss": return d.getSeconds().zf(2);
				case "a/p": return d.getHours() < 12 ? "오전" : "오후";
				default: return $1;
			}
		});
	};

	String.prototype.string = function(len){var s = '', i = 0; while (i++ < len) { s += this; } return s;};
	String.prototype.zf = function(len){return "0".string(len - this.length) + this;};
	Number.prototype.zf = function(len){return this.toString().zf(len);};
	// *********************************************************************** */
	
	
	// /* ***********************************************************************
	//		드롭다운 셀렉트 메뉴 플러그인 적용
	//		ex) <select id="..."></select>
	//
	if ( $("select").length > 0 ) {
		$("select").selectric({
			maxHeight: 200
		});
	}
	// *********************************************************************** */
	
	
	// /* ***********************************************************************
	//		up/down control key event 함수
	//		ex) 
	//
	$(document).keydown(function(keyDownEvent) {
		if ( keyDownEvent.keyCode == ctrlKey ) { ctrlDown = true; }
	}).keyup(function(keyUpEvent) {
		if ( keyUpEvent.keyCode == ctrlKey ) { ctrlDown = false; }
	});
	// *********************************************************************** */

	
	// /* ***********************************************************************
	//		[INPUT] datepicker
	//		ex) <input class="datepicker" value="..." />
	//
	$("input.datepicker").datepicker({ dateFormat: "yy-mm-dd" });
	// *********************************************************************** */

	
	// /* ***********************************************************************
	//		[INPUT] datepicker from yyyy-mm-dd to yyyy-mm-dd
	//		ex) <input class="fromdate" value="..." />
	//		ex) <input class="todate" value="..." />
	//
	$("input.fromdate, input.todate").datepicker({
		defaultDate: 0, 
		changeMonth: false, 
		numberOfMonths: 2, 
		dateFormat: "yy-mm-dd", 
		maxDate: 0,
		onClose: function(selectedDate) {
			var parent = $(this).parents("#fromTo");
			var fromDate = new Date($(".fromdate", parent).val());
			var toDate = new Date($(".todate", parent).val());
			fromDate.setMonth(fromDate.getMonth() + 3);
			if ( fromDate < toDate ) {
				alert("기간 검색 결과는 종료일 이전 3개월까지 검색됩니다.");
			}
			// 날짜를 선택했을 때 from/to의 max/min값을 고정시킴
			if ( $(this).hasClass("fromdate") ) {
				$(this).parent().next().find(".todate").datepicker("option", "minDate", selectedDate);
			}
			if ( $(this).hasClass("todate") ) {
				$(this).parent().prev().find(".fromdate").datepicker("option", "maxDate", selectedDate);
			}
		}
	});
	// *********************************************************************** */
	
	
	// /* ***********************************************************************
	//		[INPUT] RELOAD 새로고침 버튼 클릭 시 함수 적용
	//		ex) <input name="RELOAD" class="..." />
	//
	$("input[name='RELOAD']").click(function(event) { window.location.reload(); });
	// *********************************************************************** */

	
	// /* ***********************************************************************
	//		[INPUT] 숫자만 입력
	//		ex) <input class="type_number" />
	//
	$("input.type_number").keydown(function(event) {
		var _this = $(this);
		var _value = _this.val();
		var key = event.which ? event.which : event.keyCode;
		if ( ctrlDown && ( key == vKey || key == cKey || key == aKey ) ) {
			return true;
		}
		if ( ( 65 <= key && 89 >= key ) || ( 229 == key ) ) { // 한글, 영문 입력 불가
			_this.val(_value.replace(/[^0-9\-]/, ""));
			event.stopPropagation();
			return false;
		}
	});
	// *********************************************************************** */

	
	// /* ***********************************************************************
	//		[INPUT] 키 입력 시 전화번호 포맷 적용 "000-0000-0000"
	//		ex) <input class="type_phone" />
	//
	$("input.type_phone").keydown(phoneKeydown).keyup(phoneKeyup).change(phoneKeyup);
	// *********************************************************************** */
	
	
	// /* ***********************************************************************
	//		[TEXTAREA] textarea에서 MaxLength가 있는 경우
	//		ex) <textarea maxlength="400"></textarea>
	//
	$("textarea").each(function(i, e) {
		if ( $(e).attr("maxlength") != "" ) {
			$(e).limitLength();
			$(e).trigger("input");
		}
	});
	// *********************************************************************** */
	
	
	// IP 입력일 경우
	// /* ***********************************************************************
	//		[INPUT] 키 입력 시 IP 포맷 적용 "000.000.000.000" (숫자 범위 0~255)
	//		ex) <input class="type_ip" />
	//
	$("input.type_ip").keydown(function(event) {
		var char = $(this).val();
		if ( ( eval(char) >= 0 && eval(char) < 256 ) || char == "" ) {
			$(this).removeClass("invalid");
			if ( char.length > 3 ) {
				$(this).val(char.substring(0, 3));
				var parent = $(this).parents(".data_wrap");
				var _this = this;
				parent.find("input.type_ip").each(function(index, input) {
					if ( input == _this ) {
						var next = $(input).next().next();
						if ( next.length > 0 ) { next.focus(); }
					}
				});
			}
		}
		else {
			$(this).addClass("invalid");
		}
	}).keyup(function(event) {
		
	});
	// *********************************************************************** */

	// event in a grid
	$(".selectable_grid input[name='SELECT_ALL']").click(function(event) {
		if ( $(this).parents("th").length > 0 ) {
			var checked = $(this).prop("checked");
			$(this).parents("table").find("tbody input[id='CHECK']").prop("checked", checked);
			CheckGridRecord();
		}
	});
/*
	// ajaxSetup
	$.ajaxSetup({
		beforeSend: function(xhr) {
			// 이벤트 시간 초기화
			interval.restartInterval();
		},
		error: function(xhr, status, err) {
			if ( xhr.status == 401 ) {
				alert("세션이 만료되었습니다.\n로그인 화면으로 이동합니다.");
				document.logoutform.submit();
			}
			else if ( xhr.status == 403 ) {
				alert("세션이 만료되었습니다.\n로그인 화면으로 이동합니다.");
				document.logoutform.submit();
			}
			else if ( xhr.status == 901 ) {
				alert("세션이 만료되었습니다.\n로그인 화면으로 이동합니다.");
				document.logoutform.submit();
			}
			else {
				// TODO write about error page
				//  : Common Message Modal 처리 필요
				alert("웹 서비스 오류입니다. 다시 시도해보시고 같은 오류가 발생하는 경우 관리자에게 문의하세요.");
				//debugger;
			}
		}
	});
*/
});

$.fn.serializeObject = function() {
	var o = {},
		a = this.serializeArray();
	$.each(a, function() {
		if ( o[this.name] !== undefined ) {
			if ( !o[this.name].push ) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		}
		else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};

function PostFromAjax(uri, parameter, successEvent, failEvent, async) {
	$.ajax({
		type: "POST",
		url: uri,
		dataType: "json",
		data: parameter,
		async: ( async != null && async != undefined ? async : false ),
		success: function(data) {
			if ( successEvent != null && successEvent != undefined && typeof successEvent !== "string" ) {
				successEvent();
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			if ( failEvent != null && failEvent != undefined && typeof failEvent !== "string" ) {
				failEvent();
			}
		}
	});
}

// use instead of a function alert
function alertMessage(message) {
	if ( $("#dialogAlert").length == 0 ) {
		var source = "<div id=\"dialogAlert\" title=\"경고 - Alert\">";
		source += "<p>" + message + "</p>";
		source += "</div>";
		
		$("body").append(source);
	}
	else {
		$("body").find("#dialogAlert p").text(message);
	}
	
	$("#dialogAlert").dialog({
		buttons: {
			"OK": function() {
				$(this).dialog("close");
			}
		}
	});
}

function confirmMessage(message) {
	
}

function alertCalling(/* setting calling instance */) {
	var calling = $("#calling");
	
	calling.dialog({ 
		modal: true,
		width: 300,
		height: 250,
		buttons: {
			"응답하기(Answer)": function() {
				$(this).dialog("close");
			},
			"돌려주기(Return)": function() {
				$(this).dialog("close");
			}
		}
	});
}



function sendingAliveEvent() {
	// ajax
	$.ajax({
		type: "GET",
		url: contextPath + "/comm/alive",
		dataType: "json",
		success: function(data) {
			if ( data == "alive" ) {
				// success
			}
			else {
				// failed
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			// 서버 연결이 끊김
		}
	});
}

function saveInfo(id, extn) {
	id = encodeURIComponent(id);
	if ( id != "" && id != null && id != undefined ) {
		createCookie("userLoginId", id, 30);
	}
	else {
		createCookie("userLoginId", id, 0);
	}
	if ( extn != "" && extn != null && extn != undefined ) {
		createCookie("userLoginExtn", extn, 30);
	}
	else {
		createCookie("userLoginExtn", extn, 0);
	}
}

var createCookie = function(name, value, days) {
	var expires;
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
		if ( days == 0 ) {
			expires = "; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
		}
	}
	else {
		expires = "";
	}
	document.cookie = name + "=" + value + expires + "; path=/";
};

var contextPath = function() {
	return window.location.pathname.substring(0, window.location.pathname.indexOf("/",2));
};

var openLoading = function(div) {
	div.hide();
};

var closeLoading = function(div) {
	div.fadeIn("slow");
};

var limitLength = function(_this, limit, span) {
	// on change or keydown event
	var wordlen = _this.val().replace(/\n/gi, ";").length;
	var leftlen = limit - wordlen;
	span.text("(" + leftlen + "자)");
	if ( leftlen > -1 ) {
		span.removeClass("txt_red");
	}
	else {
		span.addClass("txt_red");
	}
};

//030, 050, 060, 070, 080
//011, 017, 016, 019
var phoneKeyup = function(event) {
	var _this = $(this);
	var _value = _this.val();
	var number = _value.replace(/[^0-9]/gi, "");
	var keyCode = event.keyCode;
	if ( ctrlDown && ( keyCode == vKey || keyCode == cKey || keyCode == aKey ) ) {
		//_this.val(number);
		return true;
	}
	if ( keyCode == delKey || keyCode == bsKey || keyCode == leftKey || keyCode == rightKey ) {
		return true;
	}
	var pattern = /^[0](([1][0-9])|([2-9][0]))[0-9]*/; // 이동통신 및 부가통신망 또는 공통 서비스
	var pattern2 = /^[1][3-9][0-9]*/; // 부가서비스 외 기타 또는 대표번호
	var pattern3 = /^[0](([3][1-3])|([46][1-4])|([5][1-5]))[0-9]*/; // 지역번호
	var nLen = number.length;
	if ( nLen > 1 && nLen < 11 && number.substring(0, 2) == "02" ) { // "02-0000-0000"
		if ( nLen < 6 ) { // "02-000"
			_this.val(number.replace(/([0-9]{2})([0-9]{1,3})/, "$1-$2"));
		}
		else if ( nLen < 10 ) { // "02-000-0000"
			_this.val(number.replace(/([0-9]{2})([0-9]{1,3})([0-9]{1,4})/, "$1-$2-$3"));
		}
		else if ( nLen < 11 ){ // "02-0000-0000"
			_this.val(number.replace(/([0-9]{2})([0-9]{4})([0-9]{4})/, "$1-$2-$3"));
		}
		else { _this.val(number); }
	}
	else if ( nLen > 1 && nLen < 9 && pattern2.test(number) ) { // "1500-0000"
		_this.val(number.replace(/([0-9]{4})([0-9]{1,4})/, "$1-$2"));
	}
	else if ( nLen > 1 && nLen < 12 && ( pattern.test(number) || pattern3.test(number) ) ) { // "0XX-0000-0000"
		if ( /^[0][7][0][0-9]*/.test(number) && !/^[0][7][0][478][0-9]*/.test(number) ) {
			_this.val(number);
		}
		else if ( nLen < 7 ) { // "000-000"
			_this.val(number.replace(/([0-9]{3})([0-9]{1,3})/, "$1-$2"));
		}
		else if ( nLen < 11 ) { // "000-000-0000"
			_this.val(number.replace(/([0-9]{3})([0-9]{1,3})([0-9]{1,4})/, "$1-$2-$3"));
		}
		else if ( nLen < 12 ) { // "000-0000-0000"
			_this.val(number.replace(/([0-9]{3})([0-9]{4})([0-9]{4})/, "$1-$2-$3"));
		}
		else { _this.val(number); }
	}
	else { // input numbers without hyphen
		_this.val(number);
	}
};

var phoneKeydown = function(event) {
	var _this = $(this);
	var _value = _this.val();
	var key = event.which ? event.which : event.keyCode;
	if ( ctrlDown && ( key == vKey || key == cKey || key == aKey ) ) { return true; }
	if ( ( 65 <= key && 89 >= key ) || ( 229 == key ) ) { // 한글, 영문 입력 불가
		_this.val(_value.replace(/[^0-9\-]/, ""));
		event.stopPropagation();
		return false;
	}
};

var phoneFormat = function(phoneNumber) {
	if ( phoneNumber == undefined || phoneNumber == null || phoneNumber == "" ) {
		return "";
	}
	var pattern = /^[0](([1][0-9])|([2-9][0]))[0-9]*/; // 이동통신 및 부가통신망 또는 공통 서비스
	var pattern2 = /^[1][3-9][0-9]*/; // 부가서비스 외 기타 또는 대표번호
	var pattern3 = /^[0](([3][1-3])|([46][1-4])|([5][1-5]))[0-9]*/; // 지역번호
	var nLen = phoneNumber.length;
	if ( phoneNumber.substring(0, 2) == "02" ) {
		if ( nLen == 9 ) { // "02-000-0000"
			return phoneNumber.replace(/([0-9]{2})([0-9]{1,3})([0-9]{1,4})/, "$1-$2-$3");
		}
		else if ( nLen == 10 ) { // "02-0000-0000"
			return phoneNumber.replace(/([0-9]{2})([0-9]{4})([0-9]{4})/, "$1-$2-$3");
		}
	}
	else if ( pattern2.test(phoneNumber) ) {
		if ( nLen == 8 ) {
			return phoneNumber.replace(/([0-9]{4})([0-9]{1,4})/, "$1-$2");
		}
	}
	else if ( pattern.test(phoneNumber) || pattern3.test(phoneNumber) ) {
		if ( /^[0][7][0]/.test(phoneNumber) && !/^[0][7][0][478][0-9]*/.test(phoneNumber) ) {
			return phoneNumber;
		}
		if ( nLen == 10 ) { // "000-000-0000"
			return phoneNumber.replace(/([0-9]{3})([0-9]{1,3})([0-9]{1,4})/, "$1-$2-$3");
		}
		else if ( nLen == 11 ) { // "000-0000-0000"
			return phoneNumber.replace(/([0-9]{3})([0-9]{4})([0-9]{4})/, "$1-$2-$3");
		}
	}
	return phoneNumber;
};

var ZeroIsEmpty = function(number) {
	return (number == 0 || number == "0" ? "" : number);
};

/**
 * Function of grid
 */
// /*
var GetGridData = function(gridObj, uri, parameter, scssCallback) {
	var tableWrap = gridObj.parents(".table_wrap");
	tableWrap.addClass("table_loading");
	$.ajax({
		url: uri,
		type: "GET",
		dataType: "json",
		data: parameter,
		success: function(data) {
			if ( data.resultCode != "succeeded" ) { return; }
			tableWrap.removeClass("table_loading");
			scssCallback(data);
		}
	});
};

var GridNoData = function(gridObj) {
	var colspanLength = gridObj.find("thead th").length;
	var source = "<tr><td colspan=\"" + colspanLength +"\" class=\"center\">No data | 데이터가 없습니다. | 没有数据 | データなし</td></tr>";
	gridObj.find("tbody").append(source);
	gridObj.trigger("update");
};

var CheckGridRecord = function() {
	var grid = $(".selectable_grid tbody");
	var length = $("input[name='CHECK']:checked", grid).length;
	
	if ( length > 0 ) { $("#gridButtonArea").show("slider"); }
	else { $("#gridButtonArea").hide("slider"); }

	var trLength = $(".selectable_grid tbody tr").length;
	if ( trLength == length ) { $(".selectable_grid input[name='SELECT_ALL']").prop("checked", true); }
	else { $(".selectable_grid input[name='SELECT_ALL']").prop("checked", false); }
};

// set pager and reload a grid
var SettingGridData = function (totalCnt, gridList, pageIndex, lineNumber, gridObject) {
	if ( gridObject == null || gridObject == undefined ) {
		return "error: There is not an element.";
	}
	if ( pageIndex > 1 && eval("Math.ceil(totalCnt/" + lineNumber + ")") < pageIndex ) {
		pageIndex--;
	}
	settingPager(totalCnt, pageIndex, lineNumber, getGridData);
	var endIndex = eval(lineNumber + " * (pageIndex-1)");
	var lastIndex = totalCnt - endIndex;
	reload(lastIndex, gridList);
	if ( gridList.length < 1 ) {
		GridNoData(gridObject);
	}
}
// */

var settingPlayer = function() {
	$(".close_modal_background_target").click(function(event) {
		$("#vocPlayer").jPlayer("stop");
		$(this).parent().hide("fade");
	});
	$("#vocPlayer").jPlayer({
		ready: function() {
			
		},
		swfPath: "/res/jplayer",
		supplied: "mp3, oga, wav", 
		cssSelectorAncestor: "#vocPlayercontainer",
		solution: "html, flash, aurora",
		auroraFormats: "wav",
		errorAlerts: true
	});
};

var viewPlayerModal = function(fileName) {
	$("#vocPlayer").jPlayer("setMedia", { mp3: fileName });
	$("#vocPlayer").jPlayer("play");
	$(".player_modal_wrap").show("fade");
};

var getBrowserVersion = function() {
	var agent = navigator.userAgent;

	// IE
	var trident = agent.match(/Trident\/(\d.\d)/i);
	if ( trident != null && trident != undefined ) {
		if ( trident[1] == "7.0" ) return "IE11";
		if ( trident[1] == "6.0" ) return "IE10";
		if ( trident[1] == "5.0" ) return "IE9";
		if ( trident[1] == "4.0" ) return "IE8";
	}

	// IE7
	if ( navigator.appName == "Microsoft Internet Explorer" ) return "IE7";

	// and so on
	agent = agent.toLowerCase();
	if ( agent.indexOf("chrome") != -1 ) return "Chrome";
	if ( agent.indexOf("opera") != -1 ) return "Opera";
	if ( agent.indexOf("staroffice") != -1 ) return "Star Office";
	if ( agent.indexOf("webtv") != -1 ) return "WebTV";
	if ( agent.indexOf("beonex") != -1 ) return "Beonex";
	if ( agent.indexOf("chimera") != -1 ) return "Chimera";
	if ( agent.indexOf("netpositive") != -1 ) return "NetPositive";
	if ( agent.indexOf("phoenix") != -1 ) return "Phoenix";
	if ( agent.indexOf("firefox") != -1 ) return "Firefox";
	if ( agent.indexOf("safari") != -1 ) return "Safari";
	if ( agent.indexOf("skipstone") != -1 ) return "SkipStone";
	if ( agent.indexOf("netscape") != -1 ) return "Netscape";
	if ( agent.indexOf("mozilla/5.0") != -1 ) return "Mozilla";
	// DAMMIT!!!!!
};

// Controlling string
function GetEmptyString(string) {
	return string == undefined || string == null ? "" : string;
}

function InputEmptyString(string, nullValue) {
	if ( nullValue == undefined ) nullValue = "";
	return ( string == undefined || string == null ) ? nullValue : string;
}

function isEmptyString(string) {
	return typeof string === "string" ? string == "" ? true : false : true ;
}

// Controlling Date
function fromTo() {
	$("#dateFrom, #dateTo").change(function(event) {
		var term = $("#dateFrom").val() + $("#dateTo").val();
		if ( term == undefined || term == "" ) {
			$("#dateRangeToday").prop("checked", true);
		}
		else {
			$("input[name='dateRange']").prop("checked", false);
		}
	});
	$("input[name='dateRange']").click(function(event) {
		var today = new Date();
		$("#dateTo").val(today.format("yyyy-MM-dd"));
		var dv = $(this).val();
		var fromDt;
		switch (dv) {
			case "Y": fromDt = today.setDate(today.getDate()-1); break;
			case "T": fromDt = today; break;
			case "W": fromDt = today.setDate(today.getDate()-7); break;
			case "M": fromDt = today.setMonth(today.getMonth()-1); break;
			case "TM": fromDt = today.setMonth(today.getMonth()-3); break;
		}
		$("#dateFrom").val((new Date(fromDt)).format("yyyy-MM-dd"));
	});
	$("#dateRangeToday").trigger("click");
}

