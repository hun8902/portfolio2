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



(lib.반값할인 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.bg = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.black = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.bt = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.btt = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.heart = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.p1 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.p2 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.sale = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.SUPER = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();



(lib.t1 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(10);
}).prototype = p = new cjs.Sprite();



(lib.t2 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(11);
}).prototype = p = new cjs.Sprite();



(lib.지마켓로고 = function() {
	this.spriteSheet = ss["heart_html5_full_640x1080_atlas_"];
	this.gotoAndStop(12);
}).prototype = p = new cjs.Sprite();



(lib.지마켓로고_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.지마켓로고();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,209,61);


(lib.t2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.t2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,474,49);


(lib.t1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.t1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,401,48);


(lib.SUPER_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.SUPER();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,246,112);


(lib.sale_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.sale();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,183,105);


(lib.p2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,323,142);


(lib.p1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,547,239);


(lib.heart_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.heart();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,384,475);


(lib.btt_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.btt();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,350,41);


(lib.bt_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bt();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,475,54);


(lib.black_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.black();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,256,120);


(lib.bg_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bg();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,640,1080);


(lib.반값할인_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.반값할인();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,421,259);


// stage content:
(lib.heart_html5_full_640x1080 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// 반값 할인
	this.instance = new lib.반값할인_1();
	this.instance.setTransform(426.5,210.5,0.3,0.3,0,0,0,210.5,129.5);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(6).to({_off:false},0).to({scaleX:1.1,scaleY:1.1,y:160.5,alpha:1},3,cjs.Ease.get(-1)).to({regY:129.4,scaleX:0.95,scaleY:0.95},2).to({regY:129.5,scaleX:1,scaleY:1},2).wait(127));

	// sale
	this.instance_1 = new lib.sale_1();
	this.instance_1.setTransform(891.6,203.5,1,1,0,0,0,91.5,52.5);
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(2).to({_off:false},0).to({x:518.5,y:284.5},5,cjs.Ease.get(-1)).to({x:525.5,y:283.5},3).wait(130));

	// black
	this.instance_2 = new lib.black_1();
	this.instance_2.setTransform(-208.1,417,1,1,0,0,0,128,60);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(2).to({_off:false},0).to({x:313,y:324},5,cjs.Ease.get(-1)).to({x:306,y:323},3).wait(130));

	// 지마켓로고
	this.instance_3 = new lib.지마켓로고_1();
	this.instance_3.setTransform(-177.6,254.6,1,1,0,0,0,104.5,30.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_3).to({x:132.5,y:203.5},5).to({x:124.5,y:204.5},3).wait(132));

	// SUPER
	this.instance_4 = new lib.SUPER_1();
	this.instance_4.setTransform(815.2,128,1,1,0,0,0,123,56);

	this.timeline.addTween(cjs.Tween.get(this.instance_4).to({x:146,y:267},5).to({x:152,y:266},3).wait(132));

	// heart
	this.instance_5 = new lib.heart_1();
	this.instance_5.setTransform(324,670.5,0.3,0.3,0,0,0,192,237.5);
	this.instance_5.alpha = 0.398;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(1).to({scaleX:0.31,scaleY:0.31,y:670.4,alpha:0.403},0).wait(1).to({scaleX:0.32,scaleY:0.32,y:670,alpha:0.418},0).wait(1).to({scaleX:0.35,scaleY:0.35,y:669.2,alpha:0.444},0).wait(1).to({scaleX:0.4,scaleY:0.4,y:668.1,alpha:0.482},0).wait(1).to({scaleX:0.46,scaleY:0.46,y:666.7,alpha:0.533},0).wait(1).to({scaleX:0.53,scaleY:0.53,y:664.9,alpha:0.595},0).wait(1).to({scaleX:0.61,scaleY:0.61,y:663,alpha:0.664},0).wait(1).to({scaleX:0.69,scaleY:0.69,y:661,alpha:0.734},0).wait(1).to({scaleX:0.77,scaleY:0.77,y:659.1,alpha:0.8},0).wait(1).to({scaleX:0.84,scaleY:0.84,y:657.5,alpha:0.858},0).wait(1).to({scaleX:0.89,scaleY:0.89,y:656.2,alpha:0.905},0).wait(1).to({scaleX:0.93,scaleY:0.93,y:655.1,alpha:0.942},0).wait(1).to({scaleX:0.96,scaleY:0.96,y:654.4,alpha:0.969},0).wait(1).to({scaleX:0.99,scaleY:0.99,y:653.9,alpha:0.987},0).wait(1).to({scaleX:1,scaleY:1,y:653.6,alpha:0.997},0).wait(1).to({scaleX:1,scaleY:1,y:653.5,alpha:1},0).wait(124));

	// p1
	this.instance_6 = new lib.p1_1();
	this.instance_6.setTransform(-16.5,587.5,1,1,0,0,0,273.5,119.5);
	this.instance_6.alpha = 0;
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(23).to({_off:false},0).to({scaleX:1.3,scaleY:1.3,x:-49.5,alpha:0.5},5,cjs.Ease.get(-1)).to({scaleX:1,scaleY:1,x:-6.5},3,cjs.Ease.get(1)).wait(109));

	// p2
	this.instance_7 = new lib.p2_1();
	this.instance_7.setTransform(518.5,600,1,1,0,0,0,161.5,71);
	this.instance_7.alpha = 0;
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(23).to({_off:false},0).to({scaleX:1.3,scaleY:1.3,x:491.5,alpha:0.5},5,cjs.Ease.get(-1)).to({scaleX:1,scaleY:1,x:508.5},3,cjs.Ease.get(1)).wait(109));

	// t1
	this.instance_8 = new lib.t1_1();
	this.instance_8.setTransform(323.5,713,1,1,0,0,0,200.5,24);
	this.instance_8.alpha = 0;
	this.instance_8._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(12).to({_off:false},0).to({y:837,alpha:1},5,cjs.Ease.get(-0.5)).to({y:829},3).to({y:832},2).wait(118));

	// t2
	this.instance_9 = new lib.t2_1();
	this.instance_9.setTransform(324,1067.5,1,1,0,0,0,237,24.5);
	this.instance_9.alpha = 0;
	this.instance_9._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_9).wait(12).to({_off:false},0).to({y:883.5,alpha:1},5,cjs.Ease.get(-0.5)).to({y:888.5},3).to({y:887.5},2).wait(118));

	// btt
	this.instance_10 = new lib.btt_1();
	this.instance_10.setTransform(414.1,980.5,3,3,0,0,0,175,20.5);
	this.instance_10.alpha = 0;
	this.instance_10._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_10).wait(10).to({_off:false},0).to({scaleX:1,scaleY:1,x:355,y:979.5,alpha:1},5).wait(2).to({x:353,y:978.5},0).wait(1).to({x:357,y:980.5},0).wait(1).to({x:355,y:977.5},0).wait(1).to({y:979.5},0).wait(7).to({x:350},6,cjs.Ease.get(-1)).to({x:362},4,cjs.Ease.get(1)).to({x:352},3,cjs.Ease.get(0.6)).to({x:355},2).wait(13).to({x:350},6,cjs.Ease.get(-1)).to({x:362},4,cjs.Ease.get(1)).to({x:352},3,cjs.Ease.get(0.6)).to({x:355},2).wait(17).to({x:350},6,cjs.Ease.get(-1)).to({x:362},4,cjs.Ease.get(1)).to({x:352},3,cjs.Ease.get(0.6)).to({x:355},2).wait(17).to({x:350},6,cjs.Ease.get(-1)).to({x:362},4,cjs.Ease.get(1)).to({x:352},3,cjs.Ease.get(0.6)).to({x:355},2).wait(6));

	// bt
	this.instance_11 = new lib.bt_1();
	this.instance_11.setTransform(325.5,979,3,3,0,0,0,237.5,27);
	this.instance_11.alpha = 0;
	this.instance_11._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_11).wait(10).to({_off:false},0).to({scaleX:1,scaleY:1,alpha:1},5).wait(2).to({x:323.5,y:978},0).wait(1).to({x:327.5,y:980},0).wait(1).to({x:325.5,y:977},0).wait(1).to({y:979},0).wait(120));

	// bg
	this.instance_12 = new lib.bg_1();
	this.instance_12.setTransform(320,540,1,1,0,0,0,320,540);
	this.instance_12.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_12).to({alpha:1},8).wait(132));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(37.9,540,1220.3,1080);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;