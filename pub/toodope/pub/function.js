$(document).ready(function () {
    $('header.common button.menu').on('click', function () {
        $('aside.menu').addClass('on');
    });
    $('aside.menu').on('click', function () {
        $('aside.menu').removeClass('on');
    });
    $('aside.menu .wrap').on('click', function () {
        event.stopPropagation();
    });
    $('footer.memo button.memo').on('click', function () {
        $(this).closest('footer.memo').toggleClass('on');
    });
	$('body').on('click', '.news_arrow_c', function () {
		if($(this).closest('dt').hasClass("opened") === true){
			$('.news_top_close').css("display","none");	
		}else{
			$('.news_top_close').css("display","inline-block");
		};

        $(this).closest('dt').toggleClass('opened')
            .next('dd').slideToggle("fast");
    });

	var $ipt = $('#search'),
    $clearIpt = $('#searchclear');

	$ipt.keyup(function(){
	  $("#searchclear").toggle(Boolean($(this).val()));
	});

	$clearIpt.toggle(Boolean($ipt.val()));
	$clearIpt.click(function(){
	  $("#search").val('').focus();
	  $(this).hide();
	});
    
    $('dt.folding:not(.opened)').next('dd').slideUp(0);
	 $(this).closest('dt').slideToggle("fast","swing", function(){
	   
		 alert("완료");
	});
    $('body').on('click', 'dt.folding button', function () {
		if($(this).closest('dt').hasClass("opened") === false){
			$(this).closest('dd li p').css("display","none");	
		}else{
			$(this).closest('dd li p').css("display","blcok");	
			//$(this).closest('dd li').css("display","inline-block");
		};
	
		

        $(this).closest('dt').toggleClass('opened').next('dd').slideToggle("fast", function(){
				
		});
    });
	// 2 : axis:x, page:'li.on' index
	$("#touchNav").touchFlow({
		axis: "x",
		page: $("#touchNav li.on").index()
	});

	// 5 : axis:x, scrollbar:true, snap:true
	$("#touchFlow5").touchFlow({
		axis: "x"
	});
	// 5 : axis:x, scrollbar:true, snap:true
	$("#touchFlow6").touchFlow({
		axis: "x",
		page: $(".slide_dot.on").index()
	});

	$('.priceAlarm_mask').click(function () {  
		$('.priceAlarm_popup1').removeClass('on');
		$('.priceAlarm_popup2').removeClass('on');
		$('.priceAlarm_popup3').removeClass('on');
		$('.priceAlarm_popup4').removeClass('on');
		$('.priceAlarm_popup5').removeClass('on');
		$('.priceAlarm_popup6').removeClass('on');
		$('.pricealarm_alert').removeClass('on');
		$('.trial_popup').removeClass('on');
		$('.priceAlarm_mask').removeClass('on');
		$('.pp_filter01').removeClass('on');
		$('.pp_my_popup').removeClass('on');
		$('.pp_my_popup_date').removeClass('on');
		$('.pp_my_popup_date ').removeClass('dateon');
		$('.date_option').removeClass('on');
		$('.date_select').removeClass('on');
		$('.pp_my_popup3').removeClass('on');
		var element = $('.priceAlarm_mask');
		$('html, body').css({'overflow': 'auto', 'height': '100%'}); 
		$('#element').off('scroll touchmove mousewheel');
	});

});

$(document).ready(function () {
    $('body, html').scrollTop(0);
});
$(window).on('load', function () {
    $('body').addClass('on');
    CFN.headerFixed();
});

$(window).on('scroll', function () {
    CFN.headerFixed();
});

var url = ('#none');

var CFN = {
    headerFixed : function () {
		$(window).scroll(function () { var scrollValue = $(document).scrollTop(); console.log(scrollValue); });
		

		if ($(window).scrollTop() > 125 ) {
			$('#theme_fiexd').css( "position", "fixed");
			$('#theme_fiexd').css( "top", "125px");
			$('#theme_fiexd').css( "left", "50%");
			$('#theme_fiexd').css( "margin", "0 0 0 -64px");
			$('#theme_fiexd').css( "padding", "0");

			$('.nav_line').css( "position", "fixed");
			$('.nav_line').css( "top", "56px");
			$('.nav_h_type').css( "position", "fixed");
			$('.nav_h_type').css( "top", "56px");
		} else {
			$('#theme_fiexd').css( "position", "relative");
			$('#theme_fiexd').css( "top", "");
			$('#theme_fiexd').css( "left", "");
			$('#theme_fiexd').css( "margin", "0px auto 0px auto");
			$('#theme_fiexd').css( "padding", "16px 0 9px 0");

			$('.nav_line').css( "position", "absolute");
			$('.nav_line').css( "top", "");
			$('.nav_h_type').css( "position", "relative");
			$('.nav_h_type').css( "top", "");


		}

        if ($(window).scrollTop() > 0) {
			
            $('header.common').addClass('fixed');
			$('#inf_top').css( "display", "none");
			$('#inf_top_s').css( "display", "block");
			
			/*$('header.common').css( "background", "#6b40dd");
			$('header.common').css( "color", "#fff");
			$('header.common_ana').css( "background", "#6b40dd");
			$('header.common_ana').css( "border-top", "1px solid #6039c6");
			$('header .ana_txt1').css( "color", "#fff");
			$('header .ana_txt2 ').css( "color", "#fff");
			$('header .ana_txt2 span.up').css( "color", "#fff");
			$('header .anabox2').css( "border", "1px solid #6b40dd");
			$('header .anabox2 .name').css( "color", "#fff");
			$('header .anabox2 .name span').css( "color", "#fff");
			$('header .anabox2 .sevice').css( "color", "#fff");
			$('header.common button.seach').css( "background", "url(../pub/images/header_search_white.png) no-repeat center");
			$('header.common button.seach').css( "background-size", "24px");
			$('header.common button.alarm').css( "background", "url(../pub/images/header_alarm_white.png) no-repeat center");
			$('header.common button.alarm').css( "background-size", "24px");
			$('header .ana_arrow').css( "background", "url(../pub/images/ana_arrow_white.svg) no-repeat");
			$('header .ana_arrow').css( "background-size", "20px 20px");			
			$('header.common .sub_title').css( "color", "#fff");
			$('header.common button.back i:after').css( "background", "#fff");
			*/
        } else {
		
			$('header.common').addClass('fixed');
			$('#inf_top').css( "display", "block");
			$('#inf_top_s').css( "display", "none");
			
			/*$('header.common').css( "background", "#6b40dd");
			$('header.common').css( "color", "#fff");
			$('header.common_ana').css( "background", "#6b40dd");
			$('header.common_ana').css( "border-top", "1px solid #6039c6");
			$('header .ana_txt1').css( "color", "#fff");
			$('header .anabox2').css( "border", "1px solid #6b40dd");
			$('header .ana_txt2 ').css( "color", "#fff");
			$('header .ana_txt2 span.up').css( "color", "#fff");
			$('header .anabox2 .name').css( "color", "#fff");
			$('header .anabox2 .name span').css( "color", "#fff");
			$('header .anabox2 .sevice').css( "color", "#fff");
			$('header.common button.seach').css( "background", "url(../pub/images/header_search_white.png) no-repeat center");
			$('header.common button.seach').css( "background-size", "24px");
			$('header.common button.alarm').css( "background", "url(../pub/images/header_alarm_white.png) no-repeat center");
			$('header.common button.alarm').css( "background-size", "24px");
			$('header .ana_arrow').css( "background", "url(../pub/images/ana_arrow_white.svg) no-repeat");
			$('header .ana_arrow').css( "background-size", "20px 20px");			
			$('header.common .sub_title').css( "color", "#fff");
			$('header.common button.back i:after').css( "background", "#fff");
            
			$('header.common').removeClass('fixed');
			$('header.common').css( "background", "#fff");
			$('header.common').css( "color", "#484848");
			$('header.common_ana').css( "background", "#fff");
			$('header.common_ana').css( "border-top", "1px solid #fff");
			$('header .ana_txt1').css( "color", "#484848");
			$('header .ana_txt2 ').css( "color", "#5f6368");
			$('header .ana_txt2 span.up').css( "color", "#e12301");
			$('header .anabox2 .name').css( "color", "#5f6368");
			$('header .anabox2 .name span').css( "color", "#1b1b1b");
			$('header .anabox2 .sevice').css( "color", "#5f6368");
			$('header.common button.seach').css( "background", "url(../pub/images/header_search.png) center no-repeat");
			$('header.common button.seach').css( "background-size", "24px");
			$('header.common button.alarm').css( "background", "url(../pub/images/header_alarm.png) center no-repeat");
			$('header.common button.alarm').css( "background-size", "24px");
			$('header .ana_arrow').css( "background", "url(../pub/images/ana_arrow.png) no-repeat");
			$('header .ana_arrow').css( "background-size", "20px 20px");	
			$('header.common .sub_title').css( "color", "#777777");
			$('header.common button.back i:after ').css( "background", "#1a1a1a");
			*/

        }
    },
    go : function (url, aniDirection) {
        $('body, .app').removeClass('on');
        /*setTimeout(function () {
            $(location).attr('href', url);
        }, 300);
		*/
    },
    moreText : function (target) {
        if (target == null || target == undefined) {
            var $target = $(event.target).prev('p.text');
        } else {
            var $target = target;
        }
        
        $target.toggleClass('all');
        if ($target.hasClass('all')) {
            $(event.target).text('접기');
        } else {
            $(event.target).text('더보기');
        }
    },
    edit : function (target) {
        if (target == null || target == undefined) {
            var $target = $('body');
        } else {
            var $target = target;
        }
        
        $target.addClass('edit');
    },
    editCancel : function (target) {
        if (target == null || target == undefined) {
            var $target = $('body');
        } else {
            var $target = target;
        }
        
        $target.removeClass('edit');
    },
    popupOpen : function (target) {
        if (target == null || target == undefined) {
            var $target = $('.dimm');
        } else {
            var $target = target;
        }
        
        $target.addClass('on');
		$('.priceAlarm_mask').addClass('on');
		$('html, body').css({'overflow': 'auto', 'height': '100%'}); 
		$('trial_popup').off('scroll touchmove mousewheel');
    },
    popupClose : function (target) {
        if (target == null || target == undefined) {
            var $target = $(event.target).closest('.dimm');
        } else {
            var $target = target;
        }
        
        $target.removeClass('on');
		$('.priceAlarm_mask').removeClass('on');
		$('html, body').css({'overflow': 'hidden', 'height': '100%'});
		$('trial_popup').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});

    },
    alarm : function () {
        $('section.alarm').toggleClass('on');
    },
	priceAlarm_popup1 : function () {
        $('.priceAlarm_popup1').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	priceAlarm_popup2 : function () {
        $('.priceAlarm_popup2').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	priceAlarm_popup3 : function () {
        $('.priceAlarm_popup3').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	priceAlarm_popup4 : function () {
        $('.priceAlarm_popup4').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	priceAlarm_popup5 : function () {
        $('.priceAlarm_popup5').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	pp_filter01 : function () {
        $('.pp_filter01').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	pp_my_popup : function () {
        $('.pp_my_popup').toggleClass('on');
		$('.pp_my_popup_date').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },

	pp_my_popup_date : function () {
        $('.pp_my_popup_date').toggleClass('on');
		$('.priceAlarm_mask').toggleClass('on');
		$('.date_option').removeClass('on');
		$('.date_select').removeClass('on');
		$('.pp_my_popup_date').toggleClass('dateon ');
		$('.pp_my_popup3').removeClass('on');
		var element = $('.priceAlarm_mask');
		
		if(element.height()== "0"){
            $('html, body').css({'overflow': 'auto', 'height': '100%'}); 
			$('#element').off('scroll touchmove mousewheel');
		
		}else{
			$('html, body').css({'overflow': 'hidden', 'height': '100%'});
			$('#element').on('scroll touchmove mousewheel', function(event) { 
			event.preventDefault();     
			event.stopPropagation();    
			return false;
		});
		};

    },
	pp_my_popup_date_option : function () {
        $('.pp_my_popup_date_option').toggleClass('on');
		$('.pp_my_popup3').toggleClass('on');
		$('.date_option').toggleClass('on');
		$('.date_select').toggleClass('on');
		$('.pp_my_popup_date').toggleClass('dateon');
		
    },

    periodPicker : function () {
        var today = new Date(),
            $selected;
        today = today.getFullYear() + '.' + (today.getMonth()+ 1) + '.' + today.getDate();

        $('.datepicker.period').periodpicker({
            cells: [1, 1],
            yearsLine: false,
            title: false,
            closeButton: false,
            fullsizeButton: false,
            animation: false,
            resizeButton : false,
            formatMonth: 'YYYY' + '년 ' + 'MMMM',
            formatDecoreDateWithYear: 'YYYY.MM.DD',
            formatDecoreDateWithoutMonth: 'YYYY.MM.DD',
            dayOfWeekStart: 7,
            minDate: today,
            lang: 'ko',
            i18n: {
                'ko' : {
                    'Select week #' : 'Wahlen Sie Woche #',
                    'Select period' : 'Wahlen Sie Zeitraums',
                    'Open fullscreen' : 'Offnen Vollbild',
                    'OK' : '날짜 선택 완료',
                    'Choose period' : ''
                }
            },
            OK : '날짜 선택 완료',
            onAfterShow : function () {
                $('.period_picker_month').attr('colspan', '7');
                $('xdsoft_navigate').attr('href', '#none');
                $selected = $('.period_picker_selected');
                $($selected[0]).addClass('from');
                $($selected[$selected.length - 1]).addClass('to');
                $('.period_picker_input').addClass('on');
            },
            onAfterRegenerate : function () {
                $('.period_picker_month').attr('colspan', '7');
                $('xdsoft_navigate').attr('href', '#none');
                $selected = $('.period_picker_selected');
                $($selected[0]).addClass('from');
                $($selected[$selected.length - 1]).addClass('to');
            },
            onAfterHide : function () {
                $('.period_picker_input').removeClass('on');
            },
            onFromSelected : function () {
                $('.period_picker_cell.from').removeClass('from');
                $(event.target).addClass('from').addClass('to');
            },
            onToSelected : function () {
                $('.period_picker_cell.to').removeClass('to');
                $(event.target).addClass('to');
            },
            onFromChanged : function () {
                $('.period_picker_cell.from').removeClass('from');
                $(event.target).addClass('from');
            },
            onToChanged : function () {
                $('.period_picker_cell.to').removeClass('to');
                $(event.target).addClass('to');
            }
        });
    }
}

function fn_stockDetail () {
    $(window).on('load', function () {
        var $slider = $('.stock.detail .wrap'),
            $tab = $('.stock.detail nav.tab'),
            $bar = $tab.find('i');
        
        $slider.owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            dots: false,
            items: 1,
            loop: false
        });
        
        $slider.on('translate.owl.carousel', function (event) {
            if (!$($tab.find('button')[event.item.index]).is('.on')) {
                $tab.find('button.on').html($tab.find('h3').text());
                $($tab.find('button')[event.item.index]).html('<h3>' + $($tab.find('button')[event.item.index]).text() + '</h3>');
                
                setTimeout(function () {
                    $tab.find('button.on').removeClass('on');
                    $tab.find('h3').parent('button').addClass('on');
                    settingBar();
                }, 0);
                
                $('body, html').animate({'scrollTop' : '0'}, 300);
            }
        });
        
        $slider.on('translated.owl.carousel', function (event) {
            settingHeight();
        });
        
        $slider.on('drag.owl.carousel', function (event) {
            $slider.addClass('noClick');
        });
        $slider.on('dragged.owl.carousel', function (event) {
            $slider.removeClass('noClick');
        });
        
        $tab.find('button').on('click', function () {
            $slider.trigger('to.owl.carousel', $tab.find('button').index($(this)));
        });
        
        settingBar();
        settingHeight();
        
        function settingBar () {
            //$bar.width($tab.find('button.on').outerWidth());
            //$bar.css('left', $tab.find('button.on').offset().left);
        }
        
        function settingHeight () {
            $slider.height($slider.find('.owl-item.active').height());
        }
    });
}

function fn_manual () {
    $(window).on('load', function () {
        var $slider = $('.manual .list');
        
        $slider.owlCarousel({
            loop:true,
            margin:0,
            nav:false,
            dots: true,
            items: 1,
            loop: false
        });
    });
}