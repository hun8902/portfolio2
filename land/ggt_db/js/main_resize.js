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

$( window ).resize(function() {
var width=window.innerWidth;
if (width <= 1280){
		$('.logo img').attr('src','img/m/top_logo.png');
	$('.page1_1 img').attr('src','img/m/page1_1.png');
	$('.page2_1 img').attr('src','img/m/page2_1.png');
	$('.page2_2 img').attr('src','img/m/page2_2.png');
	$('.page2_3 img').attr('src','img/m/page2_3.png');
	$('.page2_4 img').attr('src','img/m/page2_4.png');
	$('.page2_5 img').attr('src','img/m/page2_5.png');
	$('.page2_6 img').attr('src','img/m/page2_6.png');
	$('.page2_7 img').attr('src','img/m/page2_7.png');
	$('.page2_8 img').attr('src','img/m/page2_8.png');
	$('.page2_9 img').attr('src','img/m/page2_9.png');
	$('.page2_10 img').attr('src','img/m/page2_10.png');
	$('.page2_11 img').attr('src','img/m/page2_11.png');

	$('.page3_1 img').attr('src','img/m/page3_1.png');
	$('.page3_2 img').attr('src','img/m/page3_2.png');
	$('.page3_3 img').attr('src','img/m/page3_3.png');

	$('.page4_1 img').attr('src','img/m/page4_1.png');
	$('.page4_2 img').attr('src','img/m/page4_2.png');
	$('.page4_bg_obj img').attr('src','img/m/page4_bg_obj.png');

	$('.page5_1 img').attr('src','img/m/page5_1.png');
	$('.page5_2 img').attr('src','img/m/page5_2.png');
	$('.page5_3 img').attr('src','img/m/page5_3.png');
	$('.page5_4 img').attr('src','img/m/page5_4.png');
	$('.page5_5 img').attr('src','img/m/page5_5.png');

	$('.page6_1 img').attr('src','img/m/page6_1.png');
	$('.page6_2 img').attr('src','img/m/page6_2.png');
	$('.page6_3 img').attr('src','img/m/page6_3.png');

	$('.page7_1 img').attr('src','img/m/page4_1.png');
	$('.page7_2 img').attr('src','img/m/page7_2.png');
	$('.page7_3 img').attr('src','img/m/page7_3.png');

	$('.page8_1 img').attr('src','img/m/page8_1.png');
	$('.page8_2 img').attr('src','img/m/page8_2.png');
	$('.partner_1 img').attr('src','img/m/partner_1.png');
	$('.partner_2 img').attr('src','img/m/partner_2.png');
	$('.partner_3 img').attr('src','img/m/partner_3.png');
	$('.partner_4 img').attr('src','img/m/partner_4.png');

	
	$('.foot_logo img').attr('src','img/m/foot_logo.png');




}else{
	$('.logo img').attr('src','img/top_logo.png');

	$('.page1_1 img').attr('src','img/page1_1.png');
	$('.page2_1 img').attr('src','img/page2_1.png');
	$('.page2_2 img').attr('src','img/page2_2.png');
	$('.page2_3 img').attr('src','img/page2_3.png');
	$('.page2_4 img').attr('src','img/page2_4.png');
	$('.page2_5 img').attr('src','img/page2_5.png');
	$('.page2_6 img').attr('src','img/page2_6.png');
	$('.page2_7 img').attr('src','img/page2_7.png');
	$('.page2_8 img').attr('src','img/page2_8.png');
	$('.page2_9 img').attr('src','img/page2_9.png');
	$('.page2_10 img').attr('src','img/page2_10.png');
	$('.page2_11 img').attr('src','img/page2_11.png');

	$('.page3_1 img').attr('src','img/page3_1.png');
	$('.page3_2 img').attr('src','img/page3_2.png');
	$('.page3_3 img').attr('src','img/page3_3.png');

	$('.page4_1 img').attr('src','img/page4_1.png');
	$('.page4_2 img').attr('src','img/page4_2.png');
	$('.page4_bg_obj img').attr('src','img/page4_bg_obj.png');

	$('.page5_1 img').attr('src','img/page5_1.png');
	$('.page5_2 img').attr('src','img/page5_2.png');
	$('.page5_3 img').attr('src','img/page5_3.png');
	$('.page5_4 img').attr('src','img/page5_4.png');
	$('.page5_5 img').attr('src','img/page5_5.png');

	$('.page6_1 img').attr('src','img/page6_1.png');
	$('.page6_2 img').attr('src','img/page6_2.png');
	$('.page6_3 img').attr('src','img/page6_3.png');

	$('.page7_1 img').attr('src','img/page4_1.png');
	$('.page7_2 img').attr('src','img/page7_2.png');
	$('.page7_3 img').attr('src','img/page7_3.png');

	$('.page8_1 img').attr('src','img/page8_1.png');
	$('.page8_2 img').attr('src','img/page8_2.png');
	$('.partner_1 img').attr('src','img/partner_1.png');
	$('.partner_2 img').attr('src','img/partner_2.png');
	$('.partner_3 img').attr('src','img/partner_3.png');
	$('.partner_4 img').attr('src','img/partner_4.png');
	
	
	$('.foot_logo img').attr('src','img/foot_logo.png');
}

}).resize();


