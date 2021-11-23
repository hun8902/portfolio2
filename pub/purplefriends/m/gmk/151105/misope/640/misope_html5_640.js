(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes

// library properties:
lib.properties = {
	width: 640,
	height: 96,
	fps: 30,
	color: "#FFFFFF",
	manifest: []
};



// symbols:



(lib.bg = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.p1 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.p2 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.p3 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.미소페슬립온 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.버튼 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.편안한착용감 = function() {
	this.spriteSheet = ss["misope_html5_640_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.편안한착용감_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.편안한착용감();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,106,20);


(lib.버튼_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.버튼();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,139,32);


(lib.미소페슬립온_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.미소페슬립온();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,129,24);


(lib.p3_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p3();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,148,82);


(lib.p2_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p2();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,146,84);


(lib.p1_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.p1();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,134,83);


(lib.bg_1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bg();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,640,100);


// stage content:
(lib.misope_html5_640 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// 편안한 착용감
	this.instance = new lib.편안한착용감_1();
	this.instance.setTransform(350,39,1,1,0,0,0,53,10);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(9).to({_off:false},0).to({x:395,alpha:1},7,cjs.Ease.get(1)).to({x:390},5,cjs.Ease.get(1)).wait(134).to({y:149},7,cjs.Ease.get(-1)).wait(1));

	// 미소페 슬립온
	this.instance_1 = new lib.미소페슬립온_1();
	this.instance_1.setTransform(451.5,63,1,1,0,0,0,64.5,12);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(14).to({_off:false},0).to({x:396.5,alpha:1},7,cjs.Ease.get(1)).to({x:401.5},5,cjs.Ease.get(1)).wait(127).to({y:173},7,cjs.Ease.get(-1)).wait(3));

	// 버튼
	this.instance_2 = new lib.버튼_1();
	this.instance_2.setTransform(539.5,150,1,1,0,0,0,69.5,16);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(18).to({_off:false},0).to({y:53},7,cjs.Ease.get(1)).to({y:65},4,cjs.Ease.get(0.8)).to({y:60},3,cjs.Ease.get(0.6)).wait(26).to({x:534.5},7,cjs.Ease.get(-1)).to({x:542.5},5,cjs.Ease.get(0.8)).to({x:539.5},4,cjs.Ease.get(0.6)).wait(18).to({x:534.5},7,cjs.Ease.get(-1)).to({x:542.5},5,cjs.Ease.get(0.8)).to({x:539.5},4,cjs.Ease.get(0.6)).wait(45).to({x:534.5},4,cjs.Ease.get(-1)).to({x:799.5},5).wait(1));

	// p3
	this.instance_3 = new lib.p3_1();
	this.instance_3.setTransform(259,145,1,1,0,0,0,74,41);
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(8).to({_off:false},0).to({y:55},12,cjs.Ease.get(1)).wait(134).to({y:-77},8,cjs.Ease.get(-1)).wait(1));

	// p2
	this.instance_4 = new lib.p2_1();
	this.instance_4.setTransform(182,144,1,1,0,0,0,73,42);
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(3).to({_off:false},0).to({y:54},12,cjs.Ease.get(1)).wait(138).to({y:-78},8,cjs.Ease.get(-1)).wait(2));

	// p1
	this.instance_5 = new lib.p1_1();
	this.instance_5.setTransform(115,138.5,1,1,0,0,0,67,41.5);

	this.timeline.addTween(cjs.Tween.get(this.instance_5).to({y:48.5},12,cjs.Ease.get(1)).wait(140).to({y:-83.5},8,cjs.Ease.get(-1)).wait(3));

	// bg
	this.instance_6 = new lib.bg_1();
	this.instance_6.setTransform(320,46,1,1,0,0,0,320,50);

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(163));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(320,44,640,184);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;