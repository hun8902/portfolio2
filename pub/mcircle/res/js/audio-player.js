/*!
 * audioPlayer v1.0.1
 * Copyright 2017 Cyberdesic.
 * Licensed under MIT
 */

(function ( $ ) {

    $.fn.audioPlayer = function( options ) {
 
        var settings = $.extend({	src: null,
						            volume: 0.5,	// Default volume (0.0 to 1.0)
						        }, options );
        
        var $container = this;
        var $player;
        var $playerUI;
        
        var speedIndex = 0;
        
        if ($container.find("audio#audio-player").length > 0) {
        	return this;
        }
        
        $container.append(	"<audio id='audio-player'>" +
							"	<source id='mp4source' type='audio/mpeg'>" +
							"</audio>" +
							"	" +
        					"<div class='audio-player-ui'>" +
        					"	<div class='title-bar'></div>" +
        					"	<div class='btn-close' title='닫기'></div>" +
							"	<div class='btn-play' title='재생'></div>" +
							"	<div class='btn-stop' title='중지'></div>" +
							"	<div class='btn-loop' title='반복재생'></div>" +
							"	<div class='btn-repeat' title='구간반복'></div>" +
							"	" +
							"	<div class='seek-wrapper'>" +
							"		<div class='time current'>00:00:00</div>" +
							"		<div class='time splitter'>/</div>" +
							"		<div class='time duration'>00:00:00</div>" +
							"		<div class='seek-bar-wrapper'>" +
							"			<div class='seek-bar'>" +
							"				<div class='progress'></div>" +
							"			</div>" +
							"		</div>" +
							"	</div>" +
							"	" +
							"	<div class='volume-wrapper'>" +
							"		<div class='btn-mute' title='음소거'></div>" +
							"		<div class='volume' title='볼륨조절'>" +
							"			<div class='progress'></div>" +
							"		</div>" +
							"	</div>" +
							"</div>"
        				);
        
        $player = $container.find("#audio-player")[0];
        $playerUI = $container.find(".audio-player-ui");
        $playerUI.css("user-select", "none");
 
        _setVolume( settings.volume );
        
        if (settings.src != null) {
        	_play();
        }

        // 타이틀 바
        if (!$playerUI.find(".title-bar").hasClass("hidden")) {
        	$(".audio-player-ui").draggable({handle: ".title-bar"});
        }
        
        // 닫기 버튼
        $playerUI.find(".btn-close").click(function() {
        	$player.pause();
        	_hide();
        });
        
        // 재생 버튼
        $playerUI.find(".btn-play").click(function() {
        	if ($player.paused) {
        		$player.play();
        	}
        });

        // 재생 버튼
        $playerUI.find(".btn-stop").click(function() {
        	if (!$player.paused) {
        		$player.pause();
        	}
        });
       
        // 이벤트
        $container.find("#audio-player").bind("play", function() { 
			$(".btn-play").addClass("pause").prop("title", "일시 중지");
		});

        $container.find("#audio-player").bind("pause", function() {
			$(".btn-play").removeClass("pause").prop("title", "재생");
		});
        
        // 재생 위치
        $playerUI.find(".seek-bar").click(function(e) {
			var posX = $(this).offset().left;
			var time = ((e.pageX - posX) / $(this).width()) * $player.duration;
			
			$player.currentTime = time;
			
		});
        
        // Progress 동기화 
        $container.find("#audio-player").bind("timeupdate", function() {
			var progress = $playerUI.find(".seek-bar").width() * ($player.currentTime / $player.duration);

			$playerUI.find(".time.current").text( _formatTime($player.currentTime) );
			
			if ($.isNumeric($player.duration) == true) {
				$playerUI.find(".time.duration").text( _formatTime($player.duration) );
			}
			
			$playerUI.find(".seek-bar .progress").width( progress );
		});
        
        $container.find("#audio-player").bind("ended", function() {
//        	if (settings.trialPlay) {
//        		if (settings.onLastTrackEnded != null) {
//        			settings.onLastTrackEnded();
//        		}
//        	} else if (settings.relayPlay) {
//				_goNextTrack();
//			}
		});
        
        // 음소거 버튼
        $playerUI.find(".btn-mute").click(function() {
        	if ($player.muted) {
        		$player.muted = false;
        		$(this).removeClass("muted");
        	} else {
        		$player.muted = true;
        		$(this).addClass("muted");
        	}
        });
        
        // 볼륨조절
        $playerUI.find(".volume").click(function(e) {  
			var posX = $(this).offset().left;
			var volume = (e.pageX - posX) / $(this).width();
			
			_setVolume( volume );
		});
        
        // format: 00:00:00
        function _formatTime(timeInSeconds) {
        	var date = new Date(0, 0, 0);
        	date.setSeconds(timeInSeconds);
        	var time = date.toTimeString().substr(0, 8);

        	return time;
        }
        
        // value range : 0 ~ 1
        function _setVolume(volume) {
        	
        	var width = $playerUI.find(".volume").width() * volume;

        	$player.volume = (typeof volume == 'number') ? volume : $player.volume + new Number(volume);
			$playerUI.find(".volume .progress").width( width );
        }
        
        // num: 0 based track number  
        function _play() {
    	
        	var url = settings.src;

        	$container.find("#mp4source").prop("src", url);
      	
        	$playerUI.find(".time.current").text( "loading..." );
        	$player.load();
        	$player.addEventListener('canplaythrough',
        								function() {
        									$container.find("#audio-player").trigger("timeupdate");
        									$player.play();
        									
										}, false);
        	
        	$player.addEventListener('onerror',
        								function() {
        									alert("플레이할 수 없습니다.")
        								}, false);
        }
        
        function _setSrc(src) {
        	settings.src = src;
        	_play();
        }
        
        function _show() {
        	$playerUI.show();
        }
        
        function _hide() {
        	$playerUI.hide();
        }
        
        this.volume = function(value) {
        	if (value == undefined) {	// get
        		return $player.volume;
        	} else {	// set
        		_setVolume(value)
        	}
        };
        
        this.playbackRate = function(value) {
        	if (value == undefined) {	// get
        		return $player.playbackRate;
        		
        	} else {	// set
        		_setPlaybackRate(value);
        	}
        }
        
        this.formatTime = function(timeInSeconds) {
        	return _formatTime(timeInSeconds)
        }
        
        this.play = function() {
        	if ($player.paused) {
            	$player.play();
            }
        }
        
        this.pause = function() {
        	if (!$player.paused) {
        		$player.pause();
        	}
        }
        
        this.setSource = function(src) {
        	_setSrc(src);
        }
        
        this.show = function() {
        	_show();
        }
        
		return this;
    };


}( jQuery ));
