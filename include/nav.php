<?php 
  $bf = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">YoungHun.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item <?php if($bf=="index.php"){echo "active";}?> "><a href="index.php" class="nav-link">처음으로</a></li> -->
          <li class="nav-item <?php if($bf=="about.php"){echo "active";}?>"><a href="about.php" class="nav-link">소개</a></li>
          <li class="nav-item <?php if($bf=="doc.php"){echo "active";}?>"><a href="doc.php" class="nav-link">경력기술서</a></li>
          <li class="nav-item <?php if($bf=="dev.php"){echo "active";}?>"><a href="dev.php" class="nav-link">개발</a></li>
          <li class="nav-item <?php if($bf=="pub.php"){echo "active";}?>"><a href="pub.php" class="nav-link">퍼블리싱</a></li>
          <li class="nav-item <?php if($bf=="landding.php"){echo "active";}?>"><a href="landding.php" class="nav-link">랜딩</a></li>
          <li class="nav-item <?php if($bf=="etc.php"){echo "active";}?>"><a href="etc.php" class="nav-link">기타</a></li>
          <li class="nav-item <?php if($bf=="code_save.php"){echo "active";}?>"><a href="code_save.php" class="nav-link">코드저장소</a></li>

        </ul>
      </div>
    </div>
  </nav>
   <!-- END nav -->