/*************************************************
      SlidePanel JS v2.0
      @author Fabio Mangolini
      http://www.responsivewebmobile.com
**************************************************/
(function($) {
	$.SlidePanel = function(options) {
		//default status is closed
		var status = 'close';
		
		//initialize the panel show/hide button 

        //initialize the panel
        $('#slidein-panel').css({'position': 'fixed', 'top': 0, 'left': -$('#slidein-panel').outerWidth(), 'height': '100%'});

        //show and hide the panel depending on status
		$('#slidein-panel-btn').click(
			function() {
				if(status == 'close') {
					status = 'open';
					$('#slidein-panel').css('display','block');
					$('#slidein-panel').animate({'left':0});
					wrapWindowByMask();
					$('body').css({overflow: 'hidden'}); 
					$('body').css('overflow','hidden');
					document.addEventListener('touchmove', function(e){e.preventDefault()}, false);
					document.getElementById('slidein-panel').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
					
					//$('html').attr('data-scrollTop', $(document).scrollTop()).css('overflow', 'hidden');


				}
				else if(status == 'open') {
					status = 'close';
					$('#slidein-panel').animate({'left':-$('#slidein-panel').outerWidth()});
					$('#mask, .window').hide(); 
					document.getElementById('slidein-panel').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
					document.getElementById('warp').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
					$('body').css({overflow: ''}); 
					$('body').unbind('touchmove');
					$('body').css({overflow: 'auto'}); 

				}
			}
		);

		  //검은 막을 눌렀을 때
        $("#mask").click(function () {  
			$('#slidein-panel').animate({'left':-$('#slidein-panel').outerWidth()});
           $('#mask, .window').hide();   
		   document.getElementById('slidein-panel').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
			document.getElementById('warp').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
			$('body').css({overflow: ''}); 
			$('body').unbind('touchmove');
			$('body').css({overflow: 'auto'}); 
 
        });      

		//show and hide the panel depending on status
		$('#slidein-panel-btn1').click(
			function() {
				if(status == 'close') {
					status = 'open';
					$('#slidein-panel').animate({'left':0});
					wrapWindowByMask();
					$('body').css({overflow: 'hidden'}); 
					$('#warp').bind('touchmove', function(e){e.preventDefault()});
					$('#slidein-panel').unbind('touchmove');
				}
				else if(status == 'open') {
					status = 'close';
					$('#slidein-panel').animate({'left':-$('#slidein-panel').outerWidth()});
					$('#mask, .window').hide(); 
					document.getElementById('slidein-panel').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
					document.getElementById('warp').addEventListener('touchmove', function(e){e.stopPropagation()}, false);
					$('body').css({overflow: ''}); 
					$('body').unbind('touchmove');
					$('body').css({overflow: 'auto'}); 
				}
			}
		);
	};
})(jQuery);