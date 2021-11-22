<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once("./include/header.php");?>
    
  </head>
  <body>

  <?php include_once("./include/nav.php");?>
    
    <!-- END nav -->
    
    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>안녕하세요. </strong></h1>
            <p class="white_text" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">웹개발자 김영훈의 포트폴리오 사이트입니다.</p>
            <!-- <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary btn-outline-white px-5 py-3">Get in touch</a></p> -->
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">DEV</span>
            <h2 class="mb-4">개발 프로젝트</h2>
            <p>프로젝트들이 최신순으로 정렬되어 있습니다. <br/> 이미지 클릭시 자세한 설명을 볼 수 있습니다.</p>
          </div>
        </div>
        <div class="row">
            <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
                <a href="#" class="image" style="background-image: url('img/gosuecotv.png'); " data-scrollax=" properties: { translateY: '-20%'}">
                </a>
                <div class="text">
                <h4 class="subheading">PHP, MYSQL, SIR, 퍼블리싱</h4>
                <h2 class="heading"><a href="#">고수경제 홈페이지</a></h2>
                <p>홈페이지 내에서 동영상을 실시간으로 계속 가져와야 되는 부분이 있어서 랜덤으로 사용자 한명이 접속하면 DB에 시분초를 KEY값으로 API에서 내용을 불러와서 DB에 저장하여 SELECT, PHP로 특정 시간을 입력할 수 있도록 설정 하여 특정 시간마다 한번씩 불러오도록 개발 진행 <br/> <br/> 퍼블리싱은 자주 쓰는 라이브러리를 프레임워크같은 형태로 제작하여 라이브러리를 통하여 애니메이션 효과를 주며 퍼블리싱 시간을 단축  </p>
                <p><a href="https://www.gosuecotv.com/" target="_blank" class="btn btn-primary px-4">웹사이트 보기</a></p>
                <p><a href="https://web.archive.org/web/20210906025306/https://gosuecotv.com/?ckattempt=1" target="_blank"  class="btn btn-primary px-4">아카이브 보기</a></p>
                </div>
          </div>

          
          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
          <a href="portfolio.html" class="image image-2 order-2" style="background-image: url('img/landingtest.png');" data-scrollax=" properties: { translateY: '-20%'}"></a>
            <div class="text order-1">
              <h4 class="subheading">PHP, MYSQL, datta-able</h4>
              <h2 class="heading"><a href="portfolio.html">랜딩 관리자 페이지 </a></h2>
              <p>랜딩 페이지 신청자 관리를 위한 관리자 페이지 기획, 10만건 이상 되는 데이터처리를 실시간으로 하기 위해 Server Side 기술을 알아보다가 datta-able를 발결하여 획기적으로 개발 기간을 감축할 수 있었고 만든 관리자 페이지에 SMS 연동등 다양한 기술들을 각각에 랜딩 또는 홈페이지 관리자 페이지에 추가</p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">데모 보기</a></p>
            </div>
          </div>




        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    




      <?php include_once("./include/footer.php");?>
    
  

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
      <?php include_once("./include/js.php");?>
  
      
    </body>
  </html>