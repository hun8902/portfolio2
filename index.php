<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once("./include/header.php");?>
    
  </head>
  <body>

  <?php include_once("./include/nav.php");?>
    
  
    
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
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">About me</span>
            <h2 class="mb-4">5년차 중급 웹개발자</h2>
            <p>인생에 한번 뿐인 인생을 행복하게 살기 위해 대다수가 선택하는 길보단 실패하더라도 후회하지 않는 선택을 하는 스타일입니다.  </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon color-3 d-flex justify-content-center mb-3"><span class="align-self-center icon-lightbulb-o"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">지역</h3>
                <p>인천광역시 미추홀구 숭의동에 거주하고 있습니다.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon color-1 d-flex justify-content-center mb-3"><span class="align-self-center icon-laptop"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">취미</h3>
                <p>여행, 영화감상, 컴퓨터게임, 자전거, 스노우보드, 야간 드라이브 </p>
              </div>
            </div>      
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon color-2 d-flex justify-content-center mb-3"><span class="align-self-center icon-gear"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">개발 스킬</h3>
                <p>PHP, MYSQL, AJAX, XHTML, CSS3, 인터랙티브 퍼블리싱 </p>
              </div>
            </div>    
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon color-4 d-flex justify-content-center mb-3"><span class="align-self-center icon-live_help"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">지향하는길</h3>
                <p>마소, 구글 보단 애플같은 감성이 들어가 있는 개발을 지향합니다.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>


   


    <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Projects</span>
            <h2 class="mb-4">프로젝트 간략보기</h2>
            <p>대표할수 있는 프로젝트들을 최신순으로 간략히 정리되어 있습니다.</p>
          </div>
        </div>
        <div class="row">
          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="portfolio.html" class="image" style="background-image: url('img/gosuecotv.png'); " data-scrollax=" properties: { translateY: '-20%'}">
            </a>
            <div class="text">
              <h4 class="subheading">PHP, MYSQL, SIR, 퍼블리싱</h4>
              <h2 class="heading"><a href="portfolio.html">고수경제 홈페이지</a></h2>
              <p>홈페이지 내에서 동영상을 실시간으로 계속 가져와야 되는 부분이 있어서 랜덤으로 사용자 한명이 접속하면 DB에 시분초를 KEY값으로 API에서 내용을 불러와서 DB에 저장하여 SELECT, PHP로 특정 시간을 입력할 수 있도록 설정 하여 특정 시간마다 한번씩 불러오도록 개발 진행 <br/> <br/> 퍼블리싱은 자주 쓰는 라이브러리를 프레임워크같은 형태로 제작하여 라이브러리를 통하여 애니메이션 효과를 주며 퍼블리싱 시간을 단축  </p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">웹사이트 보기</a></p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">아카이브 보기</a></p>
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

          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="portfolio.html" class="image" style="background-image: url('img/toodope.jpg'); " data-scrollax=" properties: { translateY: '-20%'}"></a>
            <div class="text">
              <h4 class="subheading">하이브리드 앱 퍼블리싱</h4>
              <h2 class="heading"><a href="portfolio.html">투돕</a></h2>
              <p>ionic 프레임워크를 사용한다는 개발사의 요청에 인해 폰, 태블릿 어떠한 사이즈에서도 이용이 가능하도록 웹앱 형태로 퍼블리싱을 진행 이미지 파일을 거의 제로로 줄이고 모든 디자인 형태를 CSS 형태로 만듬</p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">퍼블리싱 결과물 보기</a></p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">앱스토어 가기</a></p>
            </div>
          </div>

          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="portfolio.html" class="image image-2 order-2" style="background-image: url('img/audio_kiosk1.jpg');" data-scrollax=" properties: { translateY: '-20%'}"></a>
            <div class="text order-1">
              <h4 class="subheading">키오스크 퍼블리싱</h4>
              <h2 class="heading"><a href="portfolio.html">오디오락 퍼블리싱</a></h2>
              <p>키오스크 키보드가 따로 탑재되지 않아서 JQuery와 Javascript를 통한 가상 키보드 UI 제작 한영키, 대소문자 구현, 플레이어 퍼블리싱, 날씨 API 연동 등등 다양한 기능 구현  </p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">데모 보기</a></p>
            </div>
          </div>

          <div class="block-3 d-md-flex ftco-animate" data-scrollax-parent="true">
            <a href="portfolio.html" class="image" style="background-image: url('img/sm.png'); " data-scrollax=" properties: { translateY: '-20%'}"></a>
            <div class="text">
              <h4 class="subheading">웹앱 퍼블리싱</h4>
              <h2 class="heading"><a href="portfolio.html">SMTown 공연예약 퍼블리싱</a></h2>
              <p>해외에서 사용하기 위한 3개국어 형태로 제작해야되기 떄문에 이미지를 거의 사용하지 않으며 모바일, 태블릿, PC에서 사용가능하도록 제작</p>
              <p><a href="portfolio.html" class="btn btn-primary px-4">퍼블리싱 결과물 보기</a></p>
            </div>
          </div>




        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <span><a href="#" class="btn btn-primary py-3 px-5">개발 프로젝트 더보기</a></span>
            <span><a href="#" class="btn btn-primary py-3 px-5">퍼블 프로젝트 더보기</a></span>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section ftco-counter" id="section-counter">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Our achievements</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="400">0</strong>
                <span>Customers are satisfied with our professional support</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="1000">0</strong>
                <span>Amazing preset options to be mixed and combined</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="8000">0</strong>
                <span>Average response time on live chat support channel</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>





    
  
  

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="100">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry" data-aos-delay="200">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-3">
                  <div><a href="#">July 12, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
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