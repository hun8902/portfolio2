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
	$('.page1_txt1 img').attr('src','img/m/page1_txt1.png');
	$('.page1_img1 img').attr('src','img/m/page1_img1.png');
	$('.page1_img2 img').attr('src','img/m/page1_img2.png');
	$('.page1_img3 img').attr('src','img/m/page1_img3.png');
	$('.page1_img4 img').attr('src','img/m/page1_img4.png');
	$('.page2_txt1 img').attr('src','img/m/page2_txt1.png');
	$('.page2_img1 img').attr('src','img/m/page2_img1.png');
	$('.page2_img2 img').attr('src','img/m/page2_img2.png');
	$('.page2_img3 img').attr('src','img/m/page2_img3.png');
	$('.page2_txt2 img').attr('src','img/m/page2_txt2.png');
	$('.page3_txt1 img').attr('src','img/m/page3_txt1.png');
	$('.page3_txt2 img').attr('src','img/m/page3_txt2.png');
	$('.page3_img1 img').attr('src','img/m/page3_img1.png');
	$('.page3_img2 img').attr('src','img/m/page3_img2.png');
	$('.page3_img3 img').attr('src','img/m/page3_img3.png');
	$('.page4_txt1 img').attr('src','img/m/page4_txt1.png');
	$('.page4_img1 img').attr('src','img/m/page4_img1.png');
	$('.page4_img2 img').attr('src','img/m/page4_img2.png');
	$('.page5_txt1 img').attr('src','img/m/page5_txt1.png');
	$('.page5_txt2 img').attr('src','img/m/page5_txt2.png');
	$('.page5_img3 img').attr('src','img/m/page5_img3.png');
	$('.page5_img1 img').attr('src','img/m/page5_img1.png');
	$('.page5_img2 img').attr('src','img/m/page5_img2.png');
	$('.page6_img1 img').attr('src','img/m/page6_img1.png');
	$('.page6_img2 img').attr('src','img/m/page6_img2.png');
	$('.page6_img3 img').attr('src','img/m/page6_img3.png');
	$('.page6_img4 img').attr('src','img/m/page6_img4.png');
	$('.page7_img1 img').attr('src','img/m/page7_img1.png');
	$('.page7_img2 img').attr('src','img/m/page7_img2.png');
	$('.page7_img3 img').attr('src','img/m/page7_img3.png');
	$('.page7_img4 img').attr('src','img/m/page7_img4.png');
	$('.page7_img5 img').attr('src','img/m/page7_img5.png');
	$('.page7_img6 img').attr('src','img/m/page7_img6.png');
	$('.page7_img7 img').attr('src','img/m/page7_img7.png');
	$('.page7_img8 img').attr('src','img/m/page7_img8.png');
	$('.page7_img9 img').attr('src','img/m/page7_img9.png');
	$('.page8_img1 img').attr('src','img/m/page8_img1.png');


}else{
	$('.page1_txt1 img').attr('src','img/page1_txt1.png');
	$('.page1_img1 img').attr('src','img/page1_img1.png');
	$('.page1_img2 img').attr('src','img/page1_img2.png');
	$('.page1_img3 img').attr('src','img/page1_img3.png');
	$('.page1_img4 img').attr('src','img/page1_img4.png');
	$('.page2_txt1 img').attr('src','img/page2_txt1.png');

	$('.page2_img1 img').attr('src','img/page2_img1.png');
	$('.page2_img2 img').attr('src','img/page2_img2.png');
	$('.page2_img3 img').attr('src','img/page2_img3.png');
	$('.page2_txt2 img').attr('src','img/page2_txt2.png');
	$('.page3_txt1 img').attr('src','img/page3_txt1.png');
	$('.page3_txt2 img').attr('src','img/page3_txt2.png');
	$('.page3_img1 img').attr('src','img/page3_img1.png');
	$('.page3_img2 img').attr('src','img/page3_img2.png');
	$('.page3_img3 img').attr('src','img/page3_img3.png');
	$('.page4_txt1 img').attr('src','img/page4_txt1.png');
	$('.page4_img1 img').attr('src','img/page4_img1.png');
	$('.page4_img2 img').attr('src','img/page4_img2.png');
	$('.page5_txt1 img').attr('src','img/page5_txt1.png');
	$('.page5_txt2 img').attr('src','img/page5_txt2.png');
	$('.page5_img3 img').attr('src','img/page5_img3.png');
	$('.page5_img1 img').attr('src','img/page5_img1.png');
	$('.page5_img2 img').attr('src','img/page5_img2.png');
	$('.page6_img1 img').attr('src','img/page6_img1.png');
	$('.page6_img2 img').attr('src','img/page6_img2.png');
	$('.page6_img3 img').attr('src','img/page6_img3.png');
	$('.page6_img4 img').attr('src','img/page6_img4.png');
	$('.page7_img1 img').attr('src','img/page7_img1.png');
	$('.page7_img2 img').attr('src','img/page7_img2.png');
	$('.page7_img3 img').attr('src','img/page7_img3.png');
	$('.page7_img4 img').attr('src','img/page7_img4.png');
	$('.page7_img5 img').attr('src','img/page7_img5.png');
	$('.page7_img6 img').attr('src','img/page7_img6.png');
	$('.page7_img7 img').attr('src','img/page7_img7.png');
	$('.page7_img8 img').attr('src','img/page7_img8.png');
	$('.page7_img9 img').attr('src','img/page7_img9.png');
	$('.page8_img1 img').attr('src','img/page8_img1.png');

}

}).resize();


