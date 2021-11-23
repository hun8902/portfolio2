$(document).ready(function() {

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

});
$('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});
// 애니메이션
$('.animate').scrolla({
	mobile: true,
	once: true
});
//슬라이더
var mySwiper = new Swiper('.swiper-container', {
  autoplay: {
    delay: 1500,
  },
  // Optional parameters
  loop: true,

  // If we need pagination
	pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

})