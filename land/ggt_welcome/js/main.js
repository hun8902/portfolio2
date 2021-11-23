$( window ).resize(function() {
var width=window.innerWidth;
if (width <= 1200){
	$('.logo img').attr('src','images/m/logo_f.png');

	$('.page1_1 img').attr('src','images/m/page1_1.png');
	$('.page1_2 img').attr('src','images/m/page1_2.png');
	$('.page1_3 img').attr('src','images/m/page1_3.png');
	$('.page2_1 img').attr('src','images/m/page2_txt1.png');
	$('.page2_2 img').attr('src','images/m/page2_txt2.png');


	$('.page2_btn1 img').attr('src','images/m/page2_btn1.png');
	$('.page2_btn2 img').attr('src','images/m/page2_btn2.png');
	$('.page2_btn3 img').attr('src','images/m/page2_btn3.png');
	
	$('.page3_img1 img').attr('src','images/m/page3_img1.png');
	$('.page3_img2 img').attr('src','images/m/page3_img2.png');
	$('.page4_img1 img').attr('src','images/m/page4_img1.png');
	$('.page4_img2 img').attr('src','images/m/page4_img2.png');
	$('.page5_img1 img').attr('src','images/m/page5_img1.png');
	$('.page5_img2 img').attr('src','images/m/page5_img2.png');




}else{
	$('.logo img').attr('src','images/logo_f.png');

	$('.page1_1 img').attr('src','images/page1_1.png');
	$('.page1_2 img').attr('src','images/page1_2.png');
	$('.page1_3 img').attr('src','images/page1_3.png');
	$('.page2_1 img').attr('src','images/page2_txt1.png');
	$('.page2_2 img').attr('src','images/page2_txt2.png');


	$('.page2_btn1 img').attr('src','images/page2_btn1.png');
	$('.page2_btn2 img').attr('src','images/page2_btn2.png');
	$('.page2_btn3 img').attr('src','images/page2_btn3.png');

	$('.page3_img1 img').attr('src','images/page3_img1.png');
	$('.page3_img2 img').attr('src','images/page3_img2.png');	
	$('.page4_img1 img').attr('src','images/page4_img1.png');
	$('.page4_img2 img').attr('src','images/page4_img2.png');
	$('.page5_img1 img').attr('src','images/page5_img1.png');
	$('.page5_img2 img').attr('src','images/page5_img2.png');


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

})