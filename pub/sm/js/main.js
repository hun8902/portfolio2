$(document).ready(function() {
	$.SlidePanel();
	$( window ).scroll( function() {
	  if ( $( this ).scrollTop() > 10 ) {
		$( '.top' ).fadeIn();
	  } else {
		$( '.top' ).fadeOut();
	  }
	} );
	$( '.top' ).click( function() {
	  $( 'html, body' ).animate( { scrollTop : 0 }, 400 );
	  return false;
	} );
	
	$("#open").click(function(){
		  $("#modal_content").modal(); 
	});
	$("#m_close").click(function(){
		$.modal.close();
	}); 
	$(".m_close").click(function(){
		$.modal.close();
	}); 
	
	$('#open1').click(function (e) {
		$('.modal_content1').modal();
	});
	$('#open2').click(function (e) {
		$('#modal_content2').modal();
	});
	$('#open3').click(function (e) {
		$('#modal_content3').modal();
	});
	$('#open4').click(function (e) {
		$('#modal_content4').modal();
	});
	$('#open5').click(function (e) {
		$('#modal_content5').modal();
	});
	$('#open6').click(function (e) {
		$('#modal_content6').modal();
	});
	$('#open7').click(function (e) {
		$('#modal_content7').modal();
	});
	$('#open8').click(function (e) {
		$('#modal_content8').modal();
	});

	
	$('.popup_close1').click(function (e) {
		$.modal.close();
	});

	




});
function toggle_atst(id) 
{
    var e = document.getElementById(id);
    if (e.style.display == 'none' || e.style.display=='')
    {	
		if (confirm("좋아하는 아티스트 목록에 추가하시겠습니까?") == true){    //확인
			e.style.display = 'block';
			document.form.submit();
		}else{   //취소
			return;
			e.style.display = 'none';
		};
    }
    else 
    {
        e.style.display = 'none';
    }
}


function toggle_visibility(id) 
{
    var e = document.getElementById(id);
    if (e.style.display == 'none' || e.style.display=='')
    {
        e.style.display = 'block';
    }
    else 
    {
        e.style.display = 'none';
    }
}

function bankDisplay(frm) {
var bank = frm.selectbank.selectedIndex;
	switch(bank){
	   case 0:
		 break;
	   case 1:
		 break;
	   case 2:
		 $('#modal_content5').modal();	
		 break;
	}
return true;
}

function wrapWindowByMask(){
	//화면의 높이와 너비를 구한다.
	var maskHeight = $(document).height();  
	var maskWidth = $(window).width();  

	//마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채운다.
	$('#mask').css({'width':'100%','height':maskHeight});  

	//애니메이션 효과
	$('#mask').fadeIn(1000);      
	$('#mask').fadeTo("fast",0.8);    
}


jQuery(function($){
	// Frequently Asked Question
	var article = $('.faq>.faqBody>.article');
	article.addClass('hide');
	article.find('.a').hide();
	article.eq(0).removeClass('hide');
	article.eq(0).find('.a').show();
	$('.faq>.faqBody>.article>.q>a').click(function(){
		var myArticle = $(this).parents('.article:first');
		if(myArticle.hasClass('hide')){
			article.addClass('hide').removeClass('show');
			article.find('.a').slideUp(100);
			myArticle.removeClass('hide').addClass('show');
			myArticle.find('.a').slideDown(100);
		} else {
			myArticle.removeClass('show').addClass('hide');
			myArticle.find('.a').slideUp(100);
		}
		return false;
	});
	$('.faq>.faqHeader>.showAll').click(function(){
		var hidden = $('.faq>.faqBody>.article.hide').length;
		if(hidden > 0){
			article.removeClass('hide').addClass('show');
			article.find('.a').slideDown(100);
		} else {
			article.removeClass('show').addClass('hide');
			article.find('.a').slideUp(100);
		}
	});
});



/**
 * Accordion, jQuery Plugin
 *
 * This plugin provides an accordion with cookie support.
 *
 * Copyright (c) 2011 John Snyder (snyderplace.com)
 * @license http://www.snyderplace.com/accordion/license.txt New BSD
 * @version 1.1
 */
(function($) {
    $.fn.accordion = function(options) {

        //firewalling
        if (!this || this.length < 1) {
            return this;
        }

        initialize(this, options);

    };

    //create the initial accordion
    function initialize(obj, options) {

        //build main options before element iteration
        var opts = $.extend({}, $.fn.accordion.defaults, options);

        //store any opened default values to set cookie later
        var opened = '';

        //iterate each matched object, bind, and open/close
        obj.each(function() {
            var $this = $(this);
            saveOpts($this, opts);

            //bind it to the event
            if (opts.bind == 'mouseenter') {
                $this.bind('mouseenter', function(e) {
                    e.preventDefault();
                    toggle($this, opts);
                });
            }

            //bind it to the event
            if (opts.bind == 'mouseover') {
                $this.bind('mouseover',function(e) {
                    e.preventDefault();
                    toggle($this, opts);
                });
            }

            //bind it to the event
            if (opts.bind == 'click') {
                $this.bind('click', function(e) {
                    e.preventDefault();
                    toggle($this, opts);
                });
            }

            //bind it to the event
            if (opts.bind == 'dblclick') {
                $this.bind('dblclick', function(e) {
                    e.preventDefault();
                    toggle($this, opts);
                });
            }

            //initialize the panels
            //get the id for this element
            id = $this.attr('id');

            //if not using cookies, open defaults
            if (!useCookies(opts)) {
                //close it if not defaulted to open
                if (id != opts.defaultOpen) {
                    $this.addClass(opts.cssClose);
                    opts.loadClose($this, opts);
                } else { //its a default open, open it
                    $this.addClass(opts.cssOpen);
                    opts.loadOpen($this, opts);
                    opened = id;
                }
            } else { //can use cookies, use them now
                //has a cookie been set, this overrides default open
                if (issetCookie(opts)) {
                    if (inCookie(id, opts) === false) {
                        $this.addClass(opts.cssClose);
                        opts.loadClose($this, opts);
                    } else {
                        $this.addClass(opts.cssOpen);
                        opts.loadOpen($this, opts);
                        opened = id;
                    }
                } else { //a cookie hasn't been set open defaults
                    if (id != opts.defaultOpen) {
                        $this.addClass(opts.cssClose);
                        opts.loadClose($this, opts);
                    } else { //its a default open, open it
                        $this.addClass(opts.cssOpen);
                        opts.loadOpen($this, opts);
                        opened = id;
                    }
                }
            }
        });

        //now that the loop is done, set the cookie
        if (opened.length > 0 && useCookies(opts)) {
            setCookie(opened, opts);
        } else { //there are none open, set cookie
            setCookie('', opts);
        }

        return obj;
    };

    //load opts from object
    function loadOpts($this) {
        return $this.data('accordion-opts');
    }

    //save opts into object
    function saveOpts($this, opts) {
        return $this.data('accordion-opts', opts);
    }

    //hides a accordion panel
    function close(opts) {
        opened = $(document).find('.' + opts.cssOpen);
        $.each(opened, function() {
            //give the proper class to the linked element
            $(this).addClass(opts.cssClose).removeClass(opts.cssOpen);
            opts.animateClose($(this), opts);
        });
    }

    //opens a accordion panel
    function open($this, opts) {
        close(opts);
        //give the proper class to the linked element
        $this.removeClass(opts.cssClose).addClass(opts.cssOpen);

        //open the element
        opts.animateOpen($this, opts);

        //do cookies if plugin available
        if (useCookies(opts)) {
            // split the cookieOpen string by ","
            id = $this.attr('id');
            setCookie(id, opts);
        }
    }

    //toggle a accordion on an event
    function toggle($this, opts) {
        // close the only open item
        if ($this.hasClass(opts.cssOpen))
        {
            close(opts);
            //do cookies if plugin available
            if (useCookies(opts)) {
                // split the cookieOpen string by ","
                setCookie('', opts);
            }
            return false;
        }
        close(opts);
        //open a closed element
        open($this, opts);
        return false;
    }

    //use cookies?
    function useCookies(opts) {
        //return false if cookie plugin not present or if a cookie name is not provided
        if (!$.cookie || opts.cookieName == '') {
            return false;
        }

        //we can use cookies
        return true;
    }

    //set a cookie
    function setCookie(value, opts)
    {
        //can use the cookie plugin
        if (!useCookies(opts)) { //no, quit here
            return false;
        }

        //cookie plugin is available, lets set the cookie
        $.cookie(opts.cookieName, value, opts.cookieOptions);
    }

    //check if a accordion is in the cookie
    function inCookie(value, opts)
    {
        //can use the cookie plugin
        if (!useCookies(opts)) {
            return false;
        }

        //if its not there we don't need to remove from it
        if (!issetCookie(opts)) { //quit here, don't have a cookie
            return false;
        }

        //unescape it
        cookie = unescape($.cookie(opts.cookieName));

        //is this value in the cookie arrray
        if (cookie != value) { //no, quit here
            return false;
        }

        return true;
    }

    //check if a cookie is set
    function issetCookie(opts)
    {
        //can we use the cookie plugin
        if (!useCookies(opts)) { //no, quit here
            return false;
        }

        //is the cookie set
        if ($.cookie(opts.cookieName) == null) { //no, quit here
            return false;
        }

        return true;
    }

    // settings
    $.fn.accordion.defaults = {
        cssClose: 'accordion-close', //class you want to assign to a closed accordion header
        cssOpen: 'accordion-open', //class you want to assign an opened accordion header
        cookieName: 'accordion', //name of the cookie you want to set for this accordion
        cookieOptions: { //cookie options, see cookie plugin for details
            path: '/',
            expires: 7,
            domain: '',
            secure: ''
        },
        defaultOpen: '', //id that you want opened by default
        speed: 'slow', //speed of the slide effect
        bind: 'click', //event to bind to, supports click, dblclick, mouseover and mouseenter
        animateOpen: function (elem, opts) { //replace the standard slideDown with custom function
            elem.next().stop(true, true).slideDown(opts.speed);
        },
        animateClose: function (elem, opts) { //replace the standard slideUp with custom function
            elem.next().stop(true, true).slideUp(opts.speed);
        },
        loadOpen: function (elem, opts) { //replace the default open state with custom function
            elem.next().show();
        },
        loadClose: function (elem, opts) { //replace the default close state with custom function
            elem.next().hide();
        }
    };
})(jQuery);

//$.modal("<div id='modal_content1'><h1>SimpleModal</h1></div>");
//$("#modal_content1").modal();

$('.myaccount_content3_1 img').on({ 
    'click': function() { 
         var src = ($(this).attr('src') === 'images/artist_h_off.png') 
            ? 'images/artist_h_on.png' 
            : 'images/artist_h_off.png'; 
         $(this).attr('src', src); 
    } 
});

$('.step1_hart').on('click', function(){
	$(this).toggleClass('step1_hart_red')
});

function register_step1() {
	form.submit();
}

function register() {

	if(form.uid.value == '') {  $('#uid').attr('placeholder','필수 입력 항목입니다'); form.uid.focus();  $('#uid').css('border-bottom', 'solid 1px red'); return false;}
	if(form.upwd.value == '') {  form.upwd.focus();  $('#upwd').css('border-bottom', 'solid 1px red'); return false;}
	if(form.upwd_c.value == '') { form.upwd_c.focus();  $('#upwd_c').css('border-bottom', 'solid 1px red'); return false;}
	//if(form.name_1.value == '') {  $('#name_1').attr('placeholder','필수 입력 항목입니다');  form.name_1.focus();  $('#name_1').css('border', 'solid 1px red'); return false;}

	form.submit();
}

function register1() {

	if(form.fd_1.value == '') {  $('#fd_1').attr('placeholder','필수 입력 항목입니다');  form.fd_1.focus();  $('#fd_1').css('border', 'solid 1px red'); return false;}
	if(form.fd_1.value == '') {  $('#fd_2').attr('placeholder','필수 입력 항목입니다');  form.fd_2.focus();  $('#fd_2').css('border', 'solid 1px red'); return false;}

	form.submit();
}


function button_event(){
	if (confirm("정말 삭제하시겠습니까??") == true){    //확인
		document.form.submit();
	}else{   //취소
		return;
	}
}



$("#ex_chk0").click(function(){
	//만약 전체 선택 체크박스가 체크된상태일경우
	if($("#ex_chk0").prop("checked")) {
		//해당화면에 전체 checkbox들을 체크해준다
		$("input[type=checkbox]").prop("checked",true);
	// 전체선택 체크박스가 해제된 경우
	} else {
		//해당화면에 모든 checkbox들의 체크를해제시킨다.
		$("input[type=checkbox]").prop("checked",false);
	}
})


function button_login(){
	if(form.uid.value == '') {  form.uid.focus();  alert("아이디를를 입력해 주세요 "); return false;}
	if(form.upwd.value == '') {  form.upwd.focus();  alert("비밀번호를 입력해 주세요 "); return false;}
	form.submit();
}


function id_find(){
	if(form.u_name1.value == '') {  form.u_name1.focus();  alert("이름을 입력해 주세요"); return false;}
	if(form.u_name2.value == '') {  form.u_name2.focus();  alert("이름을 입력해 주세요 "); return false;}
	form.submit();
}

function pwd_find(){
	if(form.u_id.value == '') {  form.u_id.focus();  alert("아이디를 입력해 주세요"); return false;}
	if(form.u_email.value == '') {  form.u_email.focus();  alert("이메일을 입력해 주세요 "); return false;}
	form.submit();
}