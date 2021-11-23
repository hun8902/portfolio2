function REC_PLAY(IDX,NUM,OBJ,NO){ // 플레이어 제어함수
	var H = $("#LINK_"+NUM).offset();
	if($("#PLAYBOX").css("display") != "none") CLOSE();
	OBJ.style.color = "#CFBC18";
	$("#PLAYBOX").animate({"top":H.top},0);
	$("#PLAYBOX").load("/player/",{FNM:IDX,NO:NO},function(html,data){
		if(data == "success"){
			$("#PLAYBOX").show();
			$("#WAIT_TXT").show();
			setTimeout("AUTOPLAY()",1200); //자동재생
		}
	});
}

function AUTOPLAY(){
	if(getPlayer('wav49player')){
		$("#WAIT_TXT").hide();
		if(doPlay());
	}
	else{
		alert("파일을 불러오지 못했습니다.");
		return false;
	}
}

function getPlayer(pid) {
	var obj = document.getElementById(pid);
	if(obj == null || obj===undefined)
	{
		return false;
	}

	if (obj.doPlay) return obj;
	for(i=0; i<obj.childNodes.length; i++) {
		var child = obj.childNodes[i];
		if (child.tagName == "EMBED") return child;
	}
}
function doPlay(fname){
	init();
	var player = getPlayer('wav49player');
	if(player) player.doPlay(fname);
}
function doStop(){
	var player = getPlayer('wav49player');
	player.doStop();
}
function setVolume(v){
	var player = getPlayer('wav49player');
	player.setVolume(v);
}
function setPan(p){
	var player = getPlayer('wav49player');
	player.setPan(p);
}
var SoundLen = 0;
var SoundPos = 0;
var Last = undefined;
var State = "STOPPED";
var Timer = undefined;
function getPerc(a, b) {
	return ((b==0?0.0:a/b)*100).toFixed(2);
}
function FileLoad(bytesLoad, bytesTotal) {
	document.getElementById('InfoFile').innerHTML = "로딩중 "+bytesLoad+"/"+bytesTotal+" bytes ("+getPerc(BytesLoad,BytesTotal)+"%)";
}
function SoundLoad(secLoad, secTotal) {
	var sec = secLoad.toFixed(0);
	var h = Math.floor(sec/3600);
	var i = Math.floor((sec%3600) / 60);
	var s = Math.floor((sec%3600) % 60);
	var tm = String(h+100).substr(1)+":"+String(i+100).substr(1)+":"+String(s+100).substr(1);

	document.getElementById('InfoSound').innerHTML = "총재생시간 "+tm;
	SoundLen = secTotal;
}

var InfoState = undefined;
function Inform() {
	if (Last != undefined) {
		var now = new Date();
		var interval = (now.getTime()-Last.getTime())/1000;
		SoundPos += interval;
		Last = now;
	}
	if(State == "PLAYING") var TXT="재생중";
	else{ var TXT="중지됨"; SoundPos=0;}
	InfoState.innerHTML = TXT + " <SPAN style='color:#e80005'>("+SoundPos.toFixed(0)+"/"+SoundLen.toFixed(0)+")</SPAN> 초 <SPAN style='color:#e80005'>("+getPerc(SoundPos,SoundLen)+"%)</SPAN> 진행";
}
function SoundState(state, position) {
	if (position != undefined) SoundPos = position;
	if (State != "PLAYING" && state=="PLAYING") {
		Last = new Date();
		Timer = setInterval(Inform, 100);
		Inform();
	} else
	if (State == "PLAYING" && state!="PLAYING") {
		clearInterval(Timer);
		Timer = undefined;
		Inform();
	}
	State = state;
	Inform();
}

function init() {
	var player = getPlayer('wav49player');
	if (!player || !player.attachHandler) setTimeout(init, 100); // Wait for load
	else {
		player.attachHandler("progress", "FileLoad");
		player.attachHandler("PLAYER_LOAD", "SoundLoad");
		player.attachHandler("PLAYER_BUFFERING", "SoundState", "BUFFERING");
		player.attachHandler("PLAYER_PLAYING", "SoundState", "PLAYING");
		player.attachHandler("PLAYER_STOPPED", "SoundState", "STOPPED");
		player.attachHandler("PLAYER_PAUSED", "SoundState", "PAUSED");
		InfoState = document.getElementById('InfoState')
		Inform();
	}
}

function BROWSER_TYPE(){ 
	return ((navigator.appName == 'Microsoft Internet Explorer') || ((navigator.appName == 'Netscape') && (new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null))); 
}

function CLOSE(){
	doStop();
	$("#PLAYBOX").hide();
	$("#PLAYBOX").empty();
}

function DEFAULT_PLAY(PATH,FNM){ // 일반 플레이어
	var OBJ = $("."+PATH).offset();
	if($("#PLAYBOX").css("display") != "none") CLOSE();
	$("#PLAYBOX").animate({"top":OBJ.top},0);
	$("#PLAYBOX").load("/player/",{NO:'0',PATH:PATH,FNM:FNM},function(html,data){
		if(data == "success"){
			$("#PLAYBOX").show();
			$("#WAIT_TXT").show();
			setTimeout("AUTOPLAY()",1200); //자동재생
		}
	});
}