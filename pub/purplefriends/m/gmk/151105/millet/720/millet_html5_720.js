(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 720,
	height: 120,
	fps: 30,
	color: "#8EF0E6",
	manifest: []
};



// symbols:



(lib.밀레탑다운자켓 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.정 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.수 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.한 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.bg = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.line1 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.line2 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.line3 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.p1 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.p2 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();



(lib.p3 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(10);
}).prototype = p = new cjs.Sprite();



(lib.량 = function() {
	this.spriteSheet = ss["millet_html5_720_atlas_"];
	this.gotoAndStop(11);
}).prototype = p = new cjs.Sprite();



(lib.량_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.량();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,35,40);


(lib.p3_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p3();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,167,201);


(lib.p2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,142,180);


(lib.p1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,123,160);


(lib.mil = function() {
	this.initialize();

	// 밀레 탑 다운 자켓 
	this.instance = new lib.밀레탑다운자켓();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,117,17);


(lib.line3_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.line3();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,18,41);


(lib.line2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.line2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,18,41);


(lib.line1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.line1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,18,41);


(lib.bg_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bg();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,640,100);


(lib.한_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.한();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,35,38);


(lib.수_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.수();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,35,39);


(lib.정_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.정();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,34,40);


// stage content:
(lib.millet_html5_720 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// p3
	this.instance = new lib.p3_1();
	this.instance.setTransform(512,187,1,1,0,0,0,132,46);
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(6).to({_off:false},0).to({y:37},10,cjs.Ease.get(1)).wait(114).to({y:195},5,cjs.Ease.get(-1)).wait(2));

	// p2
	this.instance_1 = new lib.p2_1();
	this.instance_1.setTransform(931,41.5,1,1,0,0,0,137,46.5);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(4).to({_off:false},0).to({x:611},9,cjs.Ease.get(1)).wait(118).to({y:201.5},5,cjs.Ease.get(-1)).wait(1));

	// p1
	this.instance_2 = new lib.p1_1();
	this.instance_2.setTransform(859,51,1,1,0,0,0,137,46);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(4).to({_off:false},0).to({x:469},9,cjs.Ease.get(1)).wait(116).to({y:211},5,cjs.Ease.get(-1)).wait(3));

	// line3
	this.instance_3 = new lib.line3_1();
	this.instance_3.setTransform(191,50.5,1,1,0,0,0,9,20.5);
	this.instance_3.alpha = 0;
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(6).to({_off:false},0).to({x:201,alpha:1},4,cjs.Ease.get(1)).wait(118).to({y:53.5},4,cjs.Ease.get(-1)).to({y:-49.5},3).wait(2));

	// line2
	this.instance_4 = new lib.line2_1();
	this.instance_4.setTransform(147,50.5,1,1,0,0,0,9,20.5);
	this.instance_4.alpha = 0;
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(4).to({_off:false},0).to({x:157,alpha:1},4,cjs.Ease.get(1)).wait(119).to({y:53.5},4,cjs.Ease.get(-1)).to({y:-49.5},3).wait(3));

	// line1
	this.instance_5 = new lib.line1_1();
	this.instance_5.setTransform(100,50.5,1,1,0,0,0,9,20.5);
	this.instance_5.alpha = 0;
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(2).to({_off:false},0).to({x:110,alpha:1},4,cjs.Ease.get(1)).wait(120).to({y:53.5},4,cjs.Ease.get(-1)).to({y:-49.5},3).wait(4));

	// 량
	this.instance_6 = new lib.량_1();
	this.instance_6.setTransform(225.5,50,1.8,1.8,0,0,0,17.5,20);
	this.instance_6.alpha = 0;
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(6).to({_off:false},0).to({regX:17.4,scaleX:0.85,scaleY:0.85,alpha:1},5,cjs.Ease.get(-1)).to({regX:17.5,scaleX:1.05,scaleY:1.05},3).to({scaleX:1,scaleY:1},2).wait(14).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(18).to({y:53},4,cjs.Ease.get(-1)).to({y:-50},3).wait(1));

	// 수
	this.instance_7 = new lib.수_1();
	this.instance_7.setTransform(178.5,49.5,1.8,1.8,0,0,0,17.5,19.5);
	this.instance_7.alpha = 0;
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(4).to({_off:false},0).to({regX:17.4,regY:19.4,scaleX:0.85,scaleY:0.85,alpha:1},5,cjs.Ease.get(-1)).to({regX:17.5,regY:19.5,scaleX:1.05,scaleY:1.05},3).to({scaleX:1,scaleY:1},2).wait(14).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(19).to({y:52.5},4,cjs.Ease.get(-1)).to({y:-50.5},3).wait(2));

	// 정
	this.instance_8 = new lib.정_1();
	this.instance_8.setTransform(133,50,1.8,1.8,0,0,0,17,20);
	this.instance_8.alpha = 0;
	this.instance_8._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(2).to({_off:false},0).to({scaleX:0.85,scaleY:0.85,alpha:1},5,cjs.Ease.get(-1)).to({scaleX:1.05,scaleY:1.05},3).to({scaleX:1,scaleY:1},2).wait(14).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(20).to({y:53},4,cjs.Ease.get(-1)).to({y:-50},3).wait(3));

	// 한
	this.instance_9 = new lib.한_1();
	this.instance_9.setTransform(87.5,49,1.8,1.8,0,0,0,17.5,19);
	this.instance_9.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_9).to({regX:17.4,scaleX:0.85,scaleY:0.85,alpha:1},5,cjs.Ease.get(-1)).to({regX:17.5,scaleX:1.05,scaleY:1.05},3).to({scaleX:1,scaleY:1},2).wait(14).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(15).to({scaleX:1.1,scaleY:1.1},8,cjs.Ease.get(1)).to({scaleX:1,scaleY:1},9,cjs.Ease.get(1)).wait(21).to({y:52},4,cjs.Ease.get(-1)).to({y:-51},3).wait(4));

	// PRADA
	this.instance_10 = new lib.mil();
	this.instance_10.setTransform(240.5,83.5,1,1,0,0,0,60.5,8.5);
	this.instance_10.alpha = 0;
	this.instance_10._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_10).wait(8).to({_off:false},0).to({x:125.5,alpha:1},5,cjs.Ease.get(1)).to({x:130.5},4,cjs.Ease.get(1)).wait(111).to({y:80.5},4,cjs.Ease.get(-1)).to({y:203.5},4).wait(1));

	// bg
	this.instance_11 = new lib.bg_1();
	this.instance_11.setTransform(360,60,1,1,0,0,0,320,50);

	this.timeline.addTween(cjs.Tween.get(this.instance_11).wait(137));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(400,70,640,100);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;