$(window).on('load', function () {
    $('.appearContainer').each(function (){
        $(this).find('.appearItem').each(function () {
            appearObj.appearList[appearObj.appearList.length] = [$(this), $(this).offset().top];
        });

        $(window).on('scroll', function (){
            check();
        });
        
        function check () {
            if (appearObj.appearList.length > 0 && appearObj.windowHeight + $(window).scrollTop() > appearObj.appearList[0][1] + appearObj.appearGap) {
                var $target = appearObj.appearList[0][0];
                
                $target.addClass('appearing');
                
                function appeared () {
                    appearObj.appearList[0][0].addClass('appeared')
                }
                
                setTimeout(function () {
                    $target.addClass('appeared');
                }, appearObj.appearedDelay);
                
                appearObj.appearList.splice(0,1);
                
                setTimeout(function () {
                    check();
                }, appearObj.appearDelay)
            }
        }
        
    });
    $(window).scroll();
    
    var resizeStop;
    $(window).on('resize', function () {
        clearTimeout(resizeStop);
        resizeStop = setTimeout(function () {
            console.log('stop');
            for (var i = 0; i < appearObj.appearList.length; i ++) {
                appearObj.appearList[i][1] = appearObj.appearList[i][0].offset().top;
                console.log(i + ', ' + appearObj.appearList.length);
            }
            $(window).scroll();
        }, 1000);
    });
});

var appearObj = {
    windowHeight : window.innerHeight,
    appearDelay : 100,
    appearedDelay : 1000,
    appearList : new Array(),
    appearGap : 200
}
$(window).on('resize', function () {
    appearObj.windowHeight = window.innerHeight
});