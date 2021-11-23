$(document).ready(function(){
	// Player 초기화
	initPlayer();
	// Controller 초기화
	initContoller();
});

function Marker() {
	this.el = null;
	this.x = 0;
	this.state = false;
	this.left = true;
	this.percent = 0;
}

var lMarker;
var rMarker;
// var dragState = false;
// var prevX = 0;
/**
 * Controller를 초기화한다.
 */
function initContoller() {

	$("#slider-range").click(function(e) {

		// var lcx = $(".slider-tab-left").position().left + $(".slider-tab-left").width() / 2;
		// var rcx = $(".slider-tab-right").position().left + $(".slider-tab-right").width() / 2;
		// var x = e.offsetX - lcx;
		// console.log("x = " + e.offsetX);
		// console.log("lcx = " + lcx);
		// var width = rcx - lcx;
		// console.log("width = " + width);

		var centerX = $(".slider-tab-left").centerX();
		console.log("center x = " + centerX);

		var x = e.clientX - $(this).offset().left;
		var width = $(this).width();
		var percent = (x / width * 100).toFixed(0);

		console.log("range = " + $(this).offset().left);
		console.log("percent = " + x);

		player.seek(percent);
	});

	$(".slider-tab-left").mousedown(function(e) {

		lMarker = new Marker();
		lMarker.el = $(this);
		lMarker.state = true;
		lMarker.prevX = e.pageX;
		lMarker.left = true;
		// dragState = true;
		// prevX = e.pageX;

		player.pause();
	});

	$(".slider-tab-right").mousedown(function(e) {
		rMarker = new Marker();
		rMarker.el = $(this);
		rMarker.state = true;
		rMarker.prevX = e.pageX;
		rMarker.left = false;

		player.pause();
	});

	$(document).mouseup(function(e) {
		if (lMarker && lMarker.state) {
			lMarker.state = false;
		}

		if (rMarker && rMarker.state) {
			rMarker.state = false;
		}
	});

	$(document).mousemove(function(e) {
		if (lMarker && lMarker.state) {
			slider.slide(e, lMarker);
		}

		if (rMarker && rMarker.state) {
			slider.slide(e, rMarker);
		}
	});

	// 재생
	$("button.play").click(function() {
		player.play();
	});

	// 일시 정지
	$("button.pause").click(function() {
		player.pause();
	});

	// 정지
	$("button.stop").click(function() {
		player.stop();
	});

	$("button.fast_play").click(function() {
		player.setPlaybackRate();
	});

	// 녹취 리스트
	$("button.list").click(function() {
		player.showList();
	});

	// 볼륨
	$("button.volume_on").click(function() {
		player.mute();
	});

	// 반복 재생
	$("button.repeat").click(function() {
		player.repeat();
	});

	// 구간 반복
	$("button.part_repeat").click(function() {
		player.partRepeat();
	});

	$("#player_close").click(function() {
		//$("#player").hide("fade");

		// http://crazy9.net:3000/upload/201701/확장자명(m4a)
	});
	
	$("#jquery_jplayer_1").bind($.jPlayer.event.error + ".mrsRecordFile", function(event) {
		switch(event.jPlayer.error.type) {
		case $.jPlayer.error.URL:
			alert("파일이 업로드되지 않았습니다.");
			break;
		case $.jPlayer.error.NO_SOLUTION:
			alert("No media playback solution is available.");
			break;
		case $.jPlayer.error.NO_SUPPORT:
			alert("Not possible to play any media format provided in setMedia.");
			break;
		case $.jPlayer.error.URL_NOT_SET:
			alert("정상적인 파일이 아닙니다.");
			break;
		case $.jPlayer.error.VERSION:
			alert("Mismatch in versions of JavaScript and Flash of jPlayer.");
			break;
		default :
			alert("Error with any unknown things.")
			break;
		};
	});
}

/**
 * Player를 초기화한다.
 */
function initPlayer() {
	// Player settings
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
//			$(this).jPlayer("setMedia", {
//				title: 'aaa.m4a',
//				m4a: 'http://crazy9.net/aaa.m4a'
//			});
		},
		errorAlerts: true,
		// cssSelectorAncestor: "#jp_container_1",
		// solution: "aurora",
		// auroraFormats: "wav, m4a",
		solution: "flash, html",
		swfPath: "/res/jplayer",
		supplied: "wav, m4a",
		defaultPlaybackRate: 1,
		minPlaybackRate: 1,
		maxPlaybackRate: 2,
		//playbackRateEnabled: true,
		volume: 0.5,
		timeFormat: {showHour: true, padHour: true},
		loadeddata: function(event) {
			$.jPlayer.timeFormat.showHour = true;
			$.jPlayer.timeFormat.padHour = true;
			player.play();
		},
		play: function(event) {
			controller.updateNavigation(event);
			console.log(event);
		},
		ended: function(event) {
			console.log(event);
			player.currentTime = event.jPlayer.status.currentTime;
			if (player.loop) player.play();
			else  player.stop();
		},
		ratechange: function(event) {
			player.playbackRate = event.jPlayer.options.playbackRate;
			console.log(event);
		},
		pause: function(event) {
			controller.updateNavigation(event);
			console.log(event);
			player.currentTime = event.jPlayer.status.currentTime;
			if ( player.currentTime != 0 && player.part == 1 ) { player.part = 2; }
		},
		timeupdate: function(event) {
			var percent = event.jPlayer.status.currentPercentAbsolute.toFixed(0);
			var bPercent = percent - player.bPercent;
			var pixel = ($("#slider-range").width() / 100 * bPercent).toFixed(0);

			controller.updatePlayTime(event);
			controller.updateSlider(pixel);

			if (eval(percent) > eval(player.ePercent)) {
				if ( player.loop ) {
					player.beginMarker(player.bPercent);
				}
				else {
					player.stop();
				}
				player.part = 1;
			}
		},
		volumechange: function(event) {
			player.muted = event.jPlayer.options.muted;
			console.log(event);
		},
		repeat: function(event) {
			console.log(event);
			player.loop = event.jPlayer.options.loop;
			controller.updateRepeat();
		},
		seeked: function(event) {
			// console.log(event);
			player.currentTime = event.jPlayer.status.currentTime;
		}
	});
}

/**
 * Player class.
 */
var player = {
	bPercent: 0,
	ePercent: 100,
	currentTime: 0,
	loop: false,
	playbackRate: 1,
	muted: false,
	part: 0, // 1. (가능)처음부터 재생 2. (가능)일시정시했다가 재생 0. (불가) 구간 반복 불가
	init: function() {
		this.bPercent = 0;
		this.ePercent = 100;
		this.currentTime = 0;
		this.playbackRate = 1;
		this.part = 0;
		
		if ( this.muted ) {
			this.muted = false;
			$("button.volume_on").html("<i class=\"material-icons md-24\">volume_up</i>");
			$("#slider-range-min").slider( "option", "disabled", false );
			$("#jquery_jplayer_1").jPlayer('unmute');
		}
		
		if ( this.loop ) {
			this.loop = false;
			$("#jquery_jplayer_1").jPlayer("option", "loop", false);
		}
		
		$("button.repeat").removeClass("text_red");
		$("button.part_repeat").removeClass("text_red");
		$("#slider-marker").addClass("display_none");
		slider.initialize();
	},
	beginMarker: function(percent) {
		$("#jquery_jplayer_1").jPlayer("playHead", percent);
	},
	endMarker: function() {

	},
	// 탐색
	seek: function(percent) {
		if ( this.part != 0 && this.bPercent > percent ) {
			percent = this.bPercent;
		}
		$("#jquery_jplayer_1").jPlayer("playHead", percent);
		// controller.updateSlider(percent);
	},
	// 재생
	play: function() {
		// if (checkIE()) $("#jquery_jplayer_1").jPlayer({defaultPlaybackRate: 1});
		// else $("#jquery_jplayer_1").jPlayer({playbackRate: 1});
		// $("#jquery_jplayer_1").jPlayer({playbackRate: 1});
		if ( this.part ) {
			$("#jquery_jplayer_1").jPlayer("playHead", this.bPercent);
			if ( this.part == 1 )
				$("#jquery_jplayer_1").jPlayer("play");
			else if ( this.part == 2 )
				$("#jquery_jplayer_1").jPlayer("play", this.currentTime);
		}
		else {
			$("#jquery_jplayer_1").jPlayer('play');
		}
	},
	// 일시멈춤
	pause: function() {
		$("#jquery_jplayer_1").jPlayer('pause');
	},
	// 정지
	stop: function() {
		//this.currentTime = 0;
		$("#jquery_jplayer_1").jPlayer({playbackRate: 1});
		$("#jquery_jplayer_1").jPlayer('stop');
		$("#jquery_jplayer_1").jPlayer('pause', 0);
		// 
		$("button.pause").hide();
		$("button.play").show();
		
		this.playbackRate = 1;
		$("button.fast_play span").text("1x");
		if ( this.part ) this.part = 1;
	},
	// 반복재생
	repeat: function() {
		if (this.loop)
			$("#jquery_jplayer_1").jPlayer("option", 'loop', false);
		else
			$("#jquery_jplayer_1").jPlayer("option", 'loop', true);

		// controller.updateRepeat();
	},
	// 음소거
	mute: function() {
		if (player.muted) {
			$("button.volume_on").html("<i class=\"material-icons md-24\">volume_up</i>");
			$("#slider-range-min").slider( "option", "disabled", false );
			$("#jquery_jplayer_1").jPlayer('unmute');
		}
		else {
			$("button.volume_on").html("<i class=\"material-icons md-24\">volume_off</i>");
			$("#slider-range-min").slider( "option", "disabled", true );
			$("#jquery_jplayer_1").jPlayer('mute');
		}
	},
	// 재생속도
	setPlaybackRate: function() {
		var rate = this.playbackRate + 0.5;
		if (rate > 2)
			rate = 1;

		$("button.fast_play span").text(rate + "x");
		$("#jquery_jplayer_1").jPlayer({playbackRate: rate});
	},
	// 볼륨 조절
	setVolume: function(value) {
		var vol = value / 10;
		$("#jquery_jplayer_1").jPlayer('volume', vol.toFixed(1));
	},
	// 파일 목록
	showList: function() {
		if ($("div.player_list_area").is(':hidden')) {
			$("div.player_list_area").removeClass("hidden");
			$("button.list").css({"background":"url(./image/player_list_act.png)", 'background-repeat' : 'no-repeat', 'background-size':'30px 32px'});
		}
		else {
			$("div.player_list_area").addClass("hidden");
			$("button.list").css({"background":"url(./image/player_list.png)", 'background-repeat' : 'no-repeat', 'background-size':'30px 32px'});
		}
	},
	// 파일 다운로드
	download: function() {
		$("#confirm-rec-file-download").dialog("open");
	},
	showModal: function(fileName) {
		this.init();
		$("#player").removeClass("off").addClass("on").draggable({ handle: ".player_header p" }, {containment: "article"});
		$(".slider-tab-right").css("left", ($("#slider-range").width() - 18) + "px");
		$("#jquery_jplayer_1").jPlayer("setMedia", { m4a: fileName });
		$("#jquery_jplayer_1").jPlayer("play");
	},
	showListModal: function() {
		this.init();
		$("#player").removeClass("off").addClass("on").draggable({ handle: ".player_header p" }, {containment: "article"});
		$(".slider-tab-right").css("left", ($("#slider-range").width() - 18) + "px");
		$("#player .player_list").show();
	},
	playRecording: function(fileName) {
		$("#jquery_jplayer_1").jPlayer("setMedia", { m4a: fileName });
		$("#jquery_jplayer_1").jPlayer("play");
	},
	partRepeat: function() {
		if ( this.part ) {
			$("button.part_repeat").removeClass("text_red");
			$("#slider-marker").addClass("display_none");
			this.part = 0;
		}
		else {
			$("button.part_repeat").addClass("text_red");
			$("#slider-marker").removeClass("display_none");
			this.part = 1;
		}
		$("#jquery_jplayer_1").jPlayer("pause", 0);
		player.currentTime = 0;
		slider.initialize();
	}
};

/**
 * Controller class.
 */
var controller = {
	updateSlider: function(percent) {
		// $(".progress-range").css('width', percent+"%");
		$(".progress-range").css('width', percent);
	},
	updatePlayTime: function(event) {
		var duration = Math.floor(event.jPlayer.status.duration).toFixed(0);
		var currTime = Math.floor(event.jPlayer.status.currentTime).toFixed(0);
		var convCurrTime = $.jPlayer.convertTime(event.jPlayer.status.currentTime);
		var convTotalTime = $.jPlayer.convertTime(event.jPlayer.status.duration);
		$("span.play_time").text(convCurrTime);
		$("span.total_time").text(convTotalTime);
	},
	updateNavigation: function(event) {
		var paused = event.jPlayer.status.paused;
		if (paused) {
			$("button.pause").hide();
			$("button.play").show();
		}
		else {
			$("button.pause").show();
			$("button.play").hide();
		}
	},
	updateRepeat: function() {
		if (player.loop)
			//$("button.repeat").css({"background":"url(./image/player_repeat_act.png)", 'background-repeat' : 'no-repeat', 'background-size':'30px 32px'});
			$("button.repeat").addClass("text_red");
		else
			//$("button.repeat").css({"background":"url(./image/player_repeat.png)", 'background-repeat' : 'no-repeat', 'background-size':'30px 32px'});
			$("button.repeat").removeClass("text_red");
	},
	updateList: function() {

	}
};

var slider = {

	slide: function(e, marker) {
		var diffX = e.pageX - marker.prevX;
		var right = $(marker.el).position().left;
		var x = diffX + right;

		marker.prevX = e.pageX;

		$(marker.el).css("left", x + "px");

		var min = $("#slider-range").position().left;
		var max = $("#slider-range").width();
		var cx = ($(marker.el).position().left + $(marker.el).width() / 2);

		// left limit
		if (cx < min)
			$(marker.el).css("left", -($(marker.el).width() / 2));

		// right limit
		cx = ($(marker.el).position().left + $(marker.el).width() / 2);
		if (cx > max)
			$(marker.el).css("left", max - ($(marker.el).width() / 2));

		// marker colision
		if (marker.left) {
			var markerPos = $(marker.el).position().left + $(marker.el).width();

			if (markerPos > $(".slider-tab-right").position().left)
				$(marker.el).css("left", ($(".slider-tab-right").position().left - $(marker.el).width()));

			var leftCenter = ($(marker.el).position().left + $(marker.el).width() / 2);
			var rightCenter = ($(".slider-tab-right").position().left + $(".slider-tab-right").width() / 2);
			player.bPercent = (leftCenter / $("#slider-range").width() * 100).toFixed(0);

			player.beginMarker(player.bPercent);

			$(".progress-range").css("left", leftCenter);
			$(".progress-range").css("right", ($("#slider-range").width() - rightCenter));
			$(".progress-range").css("width", 0);
		}
		else {
			var markerPos = $(marker.el).position().left;

			if (markerPos < ($(".slider-tab-left").position().left + $(".slider-tab-left").width()))
				$(marker.el).css("left", ($(".slider-tab-left").position().left + $(marker.el).width()));

			var leftCenter = ($(".slider-tab-left").position().left + $(".slider-tab-right").width() / 2);
			var rightCenter = ($(marker.el).position().left + $(marker.el).width() / 2);
			player.ePercent = (rightCenter / $("#slider-range").width() * 100).toFixed(0);
			console.log("end percent = " + player.ePercent);

			$(".progress-range").css("left", leftCenter);
			$(".progress-range").css("right", ($("#slider-range").width() - rightCenter));
			$(".progress-range").css("width", 0);
		}
	},
	
	initialize: function() {
		player.bPercent = 0;
		player.ePercent = 100;
		$(".slider-tab-left").css("left", "-18px");
		$(".slider-tab-right").css("left", "350px");
		$(".progress-range").css("left", "0px");
		$(".progress-range").css("right", "0px");
		$(".progress-range").css("width", 0);
	}
};

$(function() {
	// drat
	$( "#player" ).draggable();

	// jquery script - volume
	$( function() {
		$( "#slider-range-min" ).slider({
			range: "min",
			value: 5,
			min: 0,
			max: 10,
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.value );
				player.setVolume(ui.value);
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range-min" ).slider( "value" ) );
	});
});

(function($){
	$.fn.extend({
		centerX: function () {
			return this.each(function() {
				var left = $(this).width() / 2 + $(this).position().left;
				console.log("center = " + left);
			});
		}
	});
})(jQuery);