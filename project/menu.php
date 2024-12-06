<?php
// 기존에 존재하는 세션이 있으면 세션 삭제
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minsung-Travel</title>
    <!-- font -->
    <link
      rel="stylesheet"
      href="./fontawesome-free-5.12.0-web/css/all.min.css"
    />
    <script src="https://kit.fontawesome.com/f4e726081a.js" crossorigin="anonymous"></script>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css" />
  </head>



  <body>
    <header id="home">
      <!-- navbar -->
      <nav id="nav">
        <div class="nav-center">
          <!-- nav header -->
          <div class="nav-header">
            <button class="nav-toggle">
                <i class="fa-solid fa-bars"></i>
            </button>
          </div>
          <!-- links -->
          <div class="links-container">
            <ul class="links">
              <li>
                <a href="#home" class="scroll-link">home</a>
              </li>
              <li>
                <a href="#about" class="scroll-link">about</a>
              </li>
              <li>
                <a href="#services" class="scroll-link">LOGIN</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
	  
      <!-- banner -->
      <div class="banner">
        <div class="container">
          <h1>Welcome to Minsung Travel!</h1>
          <p>
            This is Min-Sung, Jang's Web page project. Study about web browser, grapic styles, and backend function. The Goals? We will make more complicated code and publish it. We CHALLENGE the limit and OVERCOME problems. This is just First Step. 
          </p>
          <a href="#services" class="scroll-link btn btn-white">로그인</a>
        </div>
      </div>
    </header>



    <!-- about : review, INTRODUCE-->
    <section id="about" class="section">
      <div class="title">
        <h2>about <span>us</span></h2>
      </div>
      <article class="review">
        <div class="img-container">
          <img src="img/introduce.jpg" id="person-img" alt="fail.." />
        </div>
        <h4 id="author">author</h4>
        <p id="job">job</p>
        <p id="info">
          information error
        </p>
        <!-- prev next buttons-->
        <div class="button-container">
          <button class="prev-btn">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="next-btn">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </article>
    </section>


    <!-- 로그인 -->
    <section id="services" class="section">
      <div class="login-page">
	  <h2>로그인</h2>
  <div class="form">
    <form class="login-form" method="post" action="login_insert.php">
      <input type = "text" placeholder="아이디" name = "userID">
      <input type = "password" placeholder="비밀번호" name = "user_password">
      <button>login</button>
      <p class="message">계정이 없으신가요? <a href="user_info.php">계정 만들기</a></p>
	  <p class="message">신청내역만보고싶으신가요? <a href="reserv_info.php">내역 확인하기</a></p>
    </form>
  </div>
</div>
    </section>

    <!-- footer -->
    <footer class="section">
      <p>
        copyright &copy; MinSung-Travel company
        <span id="date"></span>. all rights reserved
      </p>
    </footer>
	
    <!-- javascript -->
    <script src="app.js"></script>
    <script src="review.js"></script>
  </body>
</html>