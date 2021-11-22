$(document).ready(function () {
    $( ".opacity .slider" ).slider({
      min: 0,
      max: 100,
      value: 100,
    });
    
    $('ul[role=option]').each(function () {
        $(this).addClass('ea' + $(this).children('li').length);
    });
    $('body').on('click', 'ul[role=option] button', function () {
        $(this).addClass('on')
            .closest('li').siblings().find('button.on').removeClass('on')
            .closest('ul').prev('button').find('span').text($(this).text());
    });
});

$(window).on('load', function () {
    $('.app').addClass('on');
    $('.app').on('scroll', function () {
        DCFN.headerFixed();
    });
});

var DCFN = {
    headerFixed : function () {
        if ($('.app').scrollTop() > 0) {
            $('header.common').addClass('fixed');
        } else {
            $('header.common').removeClass('fixed');
        }
    },
    alarm : function () {
        $(event.target).toggleClass('on');
        $('section.alarm').toggleClass('on');
    },
}