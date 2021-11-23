
$( window ).resize(function() {
var width=window.innerWidth;
if (width <= 1100){
	$('.page1_0 img').attr('src','img/m/logo.png');
	$('.page1_1 img').attr('src','img/m/page1_1.png');
	$('.page1_2 img').attr('src','img/m/page1_2.png');
	$('.page1_3 img').attr('src','img/m/page1_3.png');
	$('.page2_1 img').attr('src','img/m/page2_1.png');
	$('.page2_2 img').attr('src','img/m/page2_2.png');

	$('.page3_1 img').attr('src','img/m/page3_1.png');
	$('.page4_1 img').attr('src','img/m/page4_1.png');
	$('.page5_1 img').attr('src','img/m/page5_1.png');
	$('.page5_2 img').attr('src','img/m/page5_2.png');
	$('.page5_3 img').attr('src','img/m/page5_3.png');


	$('.box_title img').attr('src','img/m/box_title.png');

	$('.table_btn input').attr('src','img/m/bt.png');
	$('.table_btn1 input').attr('src','img/m/bg2.png');

}else{
	$('.page1_0 img').attr('src','img/logo.png');
	$('.page1_1 img').attr('src','img/page1_1.png');
	$('.page1_2 img').attr('src','img/page1_2.png');
	$('.page1_3 img').attr('src','img/page1_3.png');
	$('.page2_1 img').attr('src','img/page2_1.png');
	$('.page2_2 img').attr('src','img/page2_2.png');

	$('.page3_1 img').attr('src','img/page3_1.png');
	$('.page4_1 img').attr('src','img/page4_1.png');
	$('.page5_1 img').attr('src','img/page5_1.png');
	$('.page5_2 img').attr('src','img/page5_2.png');
	$('.page5_3 img').attr('src','img/page5_3.png');


	$('.box_title img').attr('src','img/box_title.png');

	$('.table_btn input').attr('src','img/bt.png');
	$('.table_btn1 input').attr('src','img/bg2.png');


}

}).resize();


$(document).ready(function() {


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


