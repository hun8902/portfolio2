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
  // Optional parameters
  slidesPerView: 'auto',
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
	autoplay: {
	delay: 2500,
	disableOnInteraction: false,
  },

});

// input 텍스트에 숫자만 콤마 찍어가면서 받기

$(document).on("keypress", "input[type=text].number", function () {

    if  ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && (event.keyCode != 8) && (event.keyCode != 46))

        event.returnValue = false;

});

 

$(document).on("keyup", "input[type=text].number", function () {

    var $this = $(this);

    var num = $this.val().replace(/[,]/g, "");

 

    var parts = num.toString().split(".");

    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    $this.val(parts.join("."));

});

