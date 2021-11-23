(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 640,
	height: 1080,
	fps: 30,
	color: "#000000",
	manifest: []
};



// symbols:



(lib.현대카드 = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib._50 = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.bg = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.black = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.black_1 = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.M포인트 = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.per = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.right = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.sale = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.SUPER = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();



(lib.지마켓로고 = function() {
	this.spriteSheet = ss["bigbang_html5_full_640x1080_atlas_"];
	this.gotoAndStop(10);
}).prototype = p = new cjs.Sprite();



(lib.지마켓로고_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.지마켓로고();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,191,63);


(lib.SUPER_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.SUPER();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,307,153);


(lib.sale_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.sale();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,226,145);


(lib.right_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.right();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,640,264);


(lib.per_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.per();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,98,128);


(lib.M포인트_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.M포인트();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,190,53);


(lib.black_1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.black_1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,319,166);


(lib.black_2 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.black();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,596,981);


(lib.bg_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bg();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,640,1080);


(lib._50_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib._50();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,364,331);


(lib.현대카드_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.현대카드();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,181,52);


// stage content:
(lib.bigbang_html5_full_640x1080 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// 현대카드
	this.instance = new lib.현대카드_1();
	this.instance.setTransform(-223.5,956,1,1,0,0,0,90.5,26);
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(15).to({_off:false},0).to({x:336.5},5,cjs.Ease.get(1)).to({x:316.5},3,cjs.Ease.get(0.8)).wait(8).to({scaleX:1.1,scaleY:1.1,x:316.2,y:952.9},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,x:316.5,y:956},10,cjs.Ease.get(1)).wait(20).to({scaleX:1.1,scaleY:1.1,x:316.2,y:952.9},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,x:316.5,y:956},10,cjs.Ease.get(1)).wait(20).to({scaleX:1.1,scaleY:1.1,x:316.2,y:952.9},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,x:316.5,y:956},10,cjs.Ease.get(1)).wait(18));

	// M포인트 
	this.instance_1 = new lib.M포인트_1();
	this.instance_1.setTransform(800,1017.5,1,1,0,0,0,95,26.5);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(15).to({_off:false},0).to({x:300},5,cjs.Ease.get(1)).to({x:320},3,cjs.Ease.get(0.8)).wait(8).to({scaleX:1.1,scaleY:1.1,y:1020.6},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,y:1017.5},10,cjs.Ease.get(1)).wait(20).to({scaleX:1.1,scaleY:1.1,y:1020.6},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,y:1017.5},10,cjs.Ease.get(1)).wait(20).to({scaleX:1.1,scaleY:1.1,y:1020.6},9,cjs.Ease.get(1)).to({scaleX:1,scaleY:1,y:1017.5},10,cjs.Ease.get(1)).wait(18));

	// 지마켓로고
	this.instance_2 = new lib.지마켓로고_1();
	this.instance_2.setTransform(-117.5,177.5,1,1,0,0,0,95.5,31.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_2).to({x:156.5,y:115.5},8,cjs.Ease.get(-1)).to({x:146.5,y:117.5},3).wait(135));

	// black
	this.instance_3 = new lib.black_2();
	this.instance_3.setTransform(298,490.5,1,1,0,0,0,298,490.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(146));

	// sale
	this.instance_4 = new lib.sale_1();
	this.instance_4.setTransform(855.2,171.5,1,1,0,0,0,113,72.5);
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(4).to({_off:false},0).to({x:495,y:253.5},8,cjs.Ease.get(-1)).to({x:511,y:251.5},5).wait(129));

	// black_1
	this.instance_5 = new lib.black_1_1();
	this.instance_5.setTransform(-181.5,407,1,1,0,0,0,159.5,83);
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(3).to({_off:false},0).to({x:251.5,y:300},8,cjs.Ease.get(-1)).to({x:237.5,y:306},6).wait(129));

	// SUPER
	this.instance_6 = new lib.SUPER_1();
	this.instance_6.setTransform(872.7,49.5,1,1,0,0,0,153.5,76.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_6).to({x:202.5,y:196.5},8,cjs.Ease.get(-1)).to({x:216.5,y:190.5},5).wait(133));

	// right
	this.instance_7 = new lib.right_1();
	this.instance_7.setTransform(320,787,1.1,1.1,0,0,0,320,132);
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(15).to({_off:false},0).to({scaleX:1,scaleY:1,y:771},3,cjs.Ease.get(0.8)).wait(128));

	// per
	this.instance_8 = new lib.per_1();
	this.instance_8.setTransform(403.4,618.5,0.3,0.3,0,0,0,49,64);
	this.instance_8._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(10).to({_off:false},0).to({scaleX:1.1,scaleY:1.1,x:553.8,y:699.7},5,cjs.Ease.get(-1)).to({scaleX:1,scaleY:1,x:535,y:692},3,cjs.Ease.get(0.8)).wait(128));

	// 50
	this.instance_9 = new lib._50_1();
	this.instance_9.setTransform(330.5,595.5,0.3,0.3,0,0,0,182,165.5);
	this.instance_9._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_9).wait(10).to({_off:false},0).to({scaleX:1.1,scaleY:1.1,x:286.5,y:615.5},5,cjs.Ease.get(-1)).to({scaleX:1,scaleY:1,x:292},3,cjs.Ease.get(0.8)).wait(128));

	// bg
	this.instance_10 = new lib.bg_1();
	this.instance_10.setTransform(320,540,1,1,0,0,0,320,540);
	this.instance_10.alpha = 0;
	this.instance_10._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_10).wait(6).to({_off:false},0).to({alpha:1},5).wait(3).to({x:324},0).wait(1).to({x:316},0).wait(1).to({x:318,y:544},0).wait(1).to({x:322,y:536},0).wait(1).to({x:318,y:542},0).wait(1).to({x:320,y:540},0).wait(6).to({alpha:0.801},3).to({alpha:1},2).wait(3).to({alpha:0.801},3).to({alpha:1},2).wait(13).to({alpha:0.801},3).to({alpha:1},2).wait(3).to({alpha:0.801},2).to({alpha:1},2).wait(13).to({alpha:0.801},3).to({alpha:1},2).wait(3).to({alpha:0.801},2).to({alpha:1},2).wait(15).to({alpha:0.801},3).to({alpha:1},2).wait(2).to({alpha:0.801},2).to({alpha:1},2).wait(14).to({alpha:0.801},3).to({alpha:1},2).wait(3).to({alpha:0.801},3).to({alpha:1},2).wait(5));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(107,513,1239.2,1008);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;