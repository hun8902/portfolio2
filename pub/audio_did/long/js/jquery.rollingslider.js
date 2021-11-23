(function($,window,document,undefined) {
  var argFn = function(ele,obj){
    this.$element = ele,
    this.defaults = {
        showArea:"#JslideWrap",
        prev:"#Jprev",
        next:"#Jnext",
        moveSpeed: 400,
        autoPlay:false,
        stay: 5000
    },
    this.args = $.extend({}, this.defaults, obj);
  };
  $.fn.RollingSlider = function(arg) {
    var _instance = new argFn(this, arg);
    // 参数, 函数声明
    var $showArea = $(_instance.args.showArea),
        $showArea_li = $(_instance.args.showArea+">li"),
        $prev =  $(_instance.args.prev),
        $next =  $(_instance.args.next),
        show_len = $showArea_li.length,
        column = 3,
        direction = "next",
        timer,
        init_arr = [],
        item_arr = [],  // 存起所有的li
        flag = 1;
    // 存储样式和li
    function slider() {
      for (var i = 0; i < show_len; i++) {
        var $cur_li = $showArea_li.eq(i); //当前展示的图片
        if (i < column) { //记录 5 张图片的初始状态信息
          init_arr[i] = {
            left: $cur_li.position().left,
            top: $cur_li.position().top,
            zIndex: $cur_li.css("z-index"),
            width: $cur_li.width(),
            height: $cur_li.height()
          };
          $cur_li.css("left", init_arr[i].left);

        } else {
		
          $cur_li.css("left", init_arr[column - 1].left)
        }
        item_arr.push($cur_li);
      }
    }
    //模拟点击和设置鼠标离开指定区域而恢复自动轮播
    function simulate() {
      $next.click();
    }
    function autoPlay() {
      timer = setInterval(simulate, _instance.args.stay);
    }
    function clearTimer(ele){
      $(ele).bind("mouseenter",
        function() {
          clearInterval(timer)
        }).bind("mouseleave",
        function() {
          if(_instance.args.autoPlay===true){
            autoPlay();
          }
        });
    }
    // 箭头
    function arrows() {
      clearTimer(_instance.args.showArea);
      clearTimer(_instance.args.prev);
      clearTimer(_instance.args.next);
      $next.bind("click",function() {
        if (flag) {
          direction = "next";
          flag = 0;
          animation();
        }
      });
      $prev.bind("click",function() {
        if (flag) {
          direction = "prev";
          flag = 0;
          animation();
        }
      });
    }
    //动画
    function animation() {
      if (direction == "next") { //点击next
        for (i = 0; i < column; i++) {
          var prevStyleObj = init_arr[i - 1];
          if (i == 0) {
            item_arr[i].fadeOut(_instance.args.moveSpeed)

          } else {
			
            item_arr[i].css("z-index", prevStyleObj.zIndex).animate({
              left: prevStyleObj.left,
              top: prevStyleObj.top,
              width: prevStyleObj.width,
              height: prevStyleObj.height
            }, _instance.args.moveSpeed);
			   
				var itemcss = item_arr[0];
				var itemcss1 = item_arr[1];
				var itemcss2 = item_arr[2];
				var css_text1 = itemcss.find(".p_text1");
				var css_text2 = itemcss1.find(".p_text1");
				var css_text3 = itemcss2.find(".p_text1");
				var css_text4 = itemcss.find(".p_text2");
				var css_text5 = itemcss1.find(".p_text2");
				var css_text6 = itemcss2.find(".p_text2");
				var css_text7 = itemcss.find(".p_text3");
				var css_text8 = itemcss1.find(".p_text3");
				var css_text9 = itemcss2.find(".p_text3");
				var css_text10 = itemcss.find(".popup_title p");
				var css_text11 = itemcss1.find(".popup_title p");
				var css_text12 = itemcss2.find(".popup_title p");

				$(css_text10).css("fontSize", "16px");
				$(css_text11).css("fontSize", "16px");
				$(css_text12).css("fontSize", "18px");
				$(css_text10).css("line-height", "35px");
				$(css_text11).css("line-height", "35px");
				$(css_text12).css("line-height", "50px");

				$(css_text1).css("fontSize", "14px");
				$(css_text2).css("fontSize", "14px");
				$(css_text3).css("fontSize", "16px");
				$(css_text1).css("padding-top","0px");
				$(css_text2).css("padding-top","0px");
				$(css_text3).css("padding-top","35px");


				$(css_text4).css("padding-top","5px");
				$(css_text5).css("padding-top","5px");
				$(css_text6).css("padding-top","10px");
				$(css_text4).css("padding-bottom","5px");
				$(css_text5).css("padding-bottom","5px");
				$(css_text6).css("padding-bottom","10px");
				
				$(css_text4).css("fontSize", "9px");
				$(css_text5).css("fontSize", "9px");					
				$(css_text6).css("fontSize", "11px");

				$(css_text7).css("fontSize", "11px");
				$(css_text8).css("fontSize", "11px");					
				$(css_text9).css("fontSize", "13px");
				$(css_text7).css("padding","14px 12px");
				$(css_text8).css("padding","14px 12px");
				$(css_text9).css("padding","22px 17px;");


          }
		
			

        }
        var lastStyleObj = init_arr[column - 1]; // 最后一个样式对象
        if (item_arr.length != column) { //只能大于

		  //var obj = item_arr[column].offset();
		  //alert(obj.left);

		  

          item_arr[column].css({
            left: lastStyleObj.left,
            top: lastStyleObj.top,
            width: lastStyleObj.width,
            height:lastStyleObj.height,
            "z-index": lastStyleObj.zIndex
          }).fadeIn(_instance.args.moveSpeed,function() {
            flag = 1;
          });

        } else {  // 或者等于
          item_arr[0].stop().css({
            left: lastStyleObj.left,
            top: lastStyleObj.top,
            width: lastStyleObj.width,
            height:lastStyleObj.height,
            "z-index": lastStyleObj.zIndex
          }).fadeIn(_instance.args.moveSpeed,function() {
            flag = 1;
          })
        }

        item_arr.push(item_arr.shift());
        // 按需加载右边图片
        lazyLoad(4);
      } else {    //点击prev
        for (i = 0; i < column; i++) {
          var nextStyleObj = init_arr[i + 1];
          if (i == column - 1) {
            item_arr[i].css("z-index", 0).fadeOut(_instance.args.moveSpeed)
          } else {
            item_arr[i].css("z-index", nextStyleObj.zIndex).animate({
              left: nextStyleObj.left,
              top: nextStyleObj.top,
              width: nextStyleObj.width,
              height:nextStyleObj.height
            },_instance.args.moveSpeed)
          }
        }
        var firstStyleObj = init_arr[0];
        item_arr[item_arr.length - 1].stop().css({
          left: firstStyleObj.left,
          top: firstStyleObj.top,
          width: firstStyleObj.width,
          height:firstStyleObj.height,
          "z-index": firstStyleObj.zIndex
        }).fadeIn(_instance.args.moveSpeed,function() {
          flag = 1;
        });
        item_arr.unshift(item_arr.pop());
        //按需加载左边图片
        lazyLoad(0);
      }
    }
    // 按需加载
    function lazyLoad(index){
      var $nextOne = item_arr[index].find('img');
      var $realSrc = $nextOne.data('src');
      var hasSrc = item_arr[index].find('img').attr('src');
      if (!hasSrc) {
        $nextOne.attr('src', $realSrc);
      };
    }
    // 初始化
    function init() {
      slider();
      arrows();
      if(_instance.args.autoPlay===true){
        autoPlay();
      }
    }
    init();
  }
})($,window,document);