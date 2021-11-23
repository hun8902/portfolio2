
$( window ).resize(function() {
  var width=window.innerWidth;
  if (width <= 1100){
     $('.pgage01_01 img').attr('src','img/m/pgage01_01.png');
     $('.pgage01_02 img').attr('src','img/m/pgage01_02.png');
     $('.pgage01_03 img').attr('src','img/m/pgage01_03.png');
     $('.pgage01_04 img').attr('src','img/m/pgage01_04.png');
     $('.pgage01_05 img').attr('src','img/m/pgage01_05.png');
     $('.pgage01_06 img').attr('src','img/m/pgage01_06.png');
     $('.pgage01_07 img').attr('src','img/m/pgage01_07.png');
    
     $('.pgage02_01 img').attr('src','img/m/pgage02_01.png');
     $('.pgage02_03 img').attr('src','img/m/pgage02_03.png');
     $('.pgage02_04 img').attr('src','img/m/pgage02_04.png');
     $('.pgage02_05 img').attr('src','img/m/pgage02_05.png');
     $('.pgage02_06 img').attr('src','img/m/pgage02_06.png');
     $('.pgage02_07 img').attr('src','img/m/pgage02_07.png');
     $('.pgage02_08 img').attr('src','img/m/pgage02_08.png');
     $('.pgage02_09 img').attr('src','img/m/pgage02_09.png');

     $('.pgage03_01 img').attr('src','img/m/pgage03_01.png');
     $('.pgage03_02 img').attr('src','img/m/pgage03_02.png');
     $('.pgage03_03 img').attr('src','img/m/pgage03_03.png');
     $('.pgage03_04 img').attr('src','img/m/pgage03_04.png');
     $('.pgage03_05 img').attr('src','img/m/pgage03_05.png');
     $('.pgage03_06 img').attr('src','img/m/pgage03_06.png');
     
     $('.pgage04_01 img').attr('src','img/m/pgage04_01.png');
     $('.pgage04_02 img').attr('src','img/m/pgage04_02.png');
     $('.pgage04_03 img').attr('src','img/m/pgage04_03.png');

     $('.pgage05_01 img').attr('src','img/m/pgage05_01.png');
     $('.pgage05_02 img').attr('src','img/m/pgage05_02.png');
     $('.pgage05_03 img').attr('src','img/m/pgage05_03.png');

     $('.pgage06_01 img').attr('src','img/m/pgage06_01.png');
     $('.pgage06_02 img').attr('src','img/m/pgage06_02.png');
     $('.pgage06_03 img').attr('src','img/m/pgage06_03.png');
     $('.pgage06_04 img').attr('src','img/m/pgage06_04.png');
     $('.pgage06_05 img').attr('src','img/m/pgage06_05.png');

     $('.pgage07_01 img').attr('src','img/m/pgage07_01.png');
     $('.pgage07_02 img').attr('src','img/m/pgage07_02.png');
     $('.pgage07_03 img').attr('src','img/m/pgage07_03.png');

     $('.send_bt img').attr('src','img/m/send_bt.png');
  }else{

    $('.pgage01_01 img').attr('src','img/pgage01_01.png');
    $('.pgage01_02 img').attr('src','img/pgage01_02.png');
    $('.pgage01_03 img').attr('src','img/pgage01_03.png');
    $('.pgage01_04 img').attr('src','img/pgage01_04.png');
    $('.pgage01_05 img').attr('src','img/pgage01_05.png');
    $('.pgage01_06 img').attr('src','img/pgage01_06.png');
    $('.pgage01_07 img').attr('src','img/pgage01_07.png');


    $('.pgage02_01 img').attr('src','img/pgage02_01.png');
    $('.pgage02_03 img').attr('src','img/pgage02_03.png');
    $('.pgage02_04 img').attr('src','img/pgage02_04.png');
    $('.pgage02_05 img').attr('src','img/pgage02_05.png');
    $('.pgage02_06 img').attr('src','img/pgage02_06.png');
    $('.pgage02_07 img').attr('src','img/pgage02_07.png');
    $('.pgage02_08 img').attr('src','img/pgage02_08.png');
    $('.pgage02_09 img').attr('src','img/pgage02_09.png');

    $('.pgage03_01 img').attr('src','img/pgage03_01.png');
    $('.pgage03_02 img').attr('src','img/pgage03_02.png');
    $('.pgage03_03 img').attr('src','img/pgage03_03.png');
    $('.pgage03_04 img').attr('src','img/pgage03_04.png');
    $('.pgage03_05 img').attr('src','img/pgage03_05.png');
    $('.pgage03_06 img').attr('src','img/pgage03_06.png');

    $('.pgage04_01 img').attr('src','img/pgage04_01.png');
    $('.pgage04_02 img').attr('src','img/pgage04_02.png');
    $('.pgage04_03 img').attr('src','img/pgage04_03.png');

    $('.pgage05_01 img').attr('src','img/pgage05_01.png');
    $('.pgage05_02 img').attr('src','img/pgage05_02.png');
    $('.pgage05_03 img').attr('src','img/pgage05_03.png');

    $('.pgage06_01 img').attr('src','img/pgage06_01.png');
    $('.pgage06_02 img').attr('src','img/pgage06_02.png');
    $('.pgage06_03 img').attr('src','img/pgage06_03.png');
    $('.pgage06_04 img').attr('src','img/pgage06_04.png');
    $('.pgage06_05 img').attr('src','img/pgage06_05.png');

    $('.pgage07_01 img').attr('src','img/pgage07_01.png');
    $('.pgage07_02 img').attr('src','img/pgage07_02.png');
    $('.pgage07_03 img').attr('src','img/pgage07_03.png');

    $('.send_bt img').attr('src','img/send_bt.png');

  }
  
  }).resize();
  

$('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});
// 애니메이션
$('.animate').scrolla({
	mobile: true,
	once: true
});
new vanillaJsuParallax({
  items: document.querySelectorAll('.circle1, .circle2')
});
//슬라이더
var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
$('.popup_view1').click(function(){
  $('.popup_ag2').fadeOut();
  $('.popup_ag1').fadeIn();
  });
  
  $('.popup_view2').click(function(){
  $('.popup_ag1').fadeOut();
  $('.popup_ag2').fadeIn();
  });
  $('.agpopup_close').click(function(){
  $('.agp').fadeOut();
  });
  

$(document).ready(function() {


});