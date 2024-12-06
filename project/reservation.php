<?php
  $con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

  session_start();
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
    echo "로그인한 사용자: " . $username . " (ID: " . $userID . ")";
  } else {
    echo "로그인 정보가 없습니다.";
  }

  $sql = "SELECT * FROM traveltbl";
  $ret = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Istok+Web">
  <title>여행 신청</title>
  <style>
@keyframes slidy {
  0% { left: 0%; }
  20% { left: 0%; }
  25% { left: -100%; }
  45% { left: -100%; }
  50% { left: -200%; }
  70% { left: -200%; }
  75% { left: -300%; }
  95% { left: -300%; }
  100% { left: -400%; }
}

* {
  box-sizing: border-box;
}

body, figure {
  margin: 0;
  background: #101010;
  font-family: Istok Web, sans-serif;
  font-weight: 100;
}

div#captioned-gallery {
  max-width: 100%;
  max-height: 60%;  /* 슬라이드 이미지 크기 비율을 줄여서 화면에 차지하는 공간을 줄임 */
  object-fit: cover;
  width: 100%;
  overflow: hidden;
}

figure.slider {
  position: relative;
  width: 500%;
  font-size: 0;
  animation: 30s slidy infinite;
}

figure.slider figure {
  width: 20%;  /* 각 이미지를 1/5 크기로 설정 */
  height: 100%;  /* 높이를 100%로 설정하여 화면에 맞게 맞추기 */
  display: inline-block;
  position: inherit;
}

figure.slider img {
  width: 100%;  /* 이미지를 슬라이드 영역에 맞춰 100% 크기로 설정 */
  height: 100%;  /* 이미지의 높이를 100%로 맞춰서 잘리지 않게 설정 */
  object-fit: cover; /* 이미지를 화면에 맞게 자르지 않고, 비율에 맞게 확대하여 채우도록 설정 */
}

figure.slider figure figcaption {
  position: absolute;
  bottom: 0;
  background: rgba(0, 0, 0, 0.4);
  color: #fff;
  width: 100%;
  font-size: 2rem;
  padding: .6rem;
  z-index: 1; /* 캡션을 이미지 위로 올림 */
  box-sizing: border-box; /* padding도 캡션 영역에 포함되도록 설정 */
  text-align: center;  /* 캡션 가운데 정렬 */
}

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-color: #f4f4f9;
}

.container {
  max-width: 800px;
  margin: 20px auto;  /* 슬라이드 아래로 약간의 여백 추가 */
  background: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
}

.scroll-window-wrapper {
  overflow-x: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  text-align: left;
  padding: 10px;
}

th {
  background-color: #f8f9fa;
  border-bottom: 2px solid #e9ecef;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.button {
  padding: 5px 10px;
  margin: 2px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.button.is-primary {
  background-color: #c7e2ff;
  color: black;
  align-items: center;
}

.button.is-light {
  background-color: #007fff;
  color: #ffffff;
}

.button.is-small {
  font-size: 0.8em;
}

a {
  text-decoration: none;
}



  </style>
</head>
<body class="demo">
  <h1>여행 신청</h1>
	<div id="captioned-gallery">
		<figure class="slider">
			<figure>
				<img src="img/america.jpg" alt>
				<figcaption>특가로 떠나는 뉴욕 여행!</figcaption>
			</figure>
			<figure>
				<img src="img/spain.jpg" alt>
				<figcaption>스페인 성당을 직접 경험하세요.</figcaption>
			</figure>
			<figure>
				<img src="img/england.jpg" alt>
				<figcaption>영국 여행을 가족,친구와 함께</figcaption>
			</figure>
			<figure>
				<img src="img/japan.jpg" alt>
				<figcaption>japan</figcaption>
			</figure>
			<figure>
				<img src="img/china.jpg" alt>
				<figcaption>china</figcaption>
			</figure>
		</figure>
	</div>
  <div class="container">
    <div class="scroll-window-wrapper">
      <div class="scroll-window">
        <table class="table is-fixed-header">
          <thead>
            <tr>
              <th scope="col">국가명</th>
              <th scope="col">여행날짜</th>
              <th scope="col">가격</th>
              <th scope="col">상세보기</th>
              <th scope="col">신청</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // 데이터베이스에서 데이터를 가져오는 반복문
            while ($row = mysqli_fetch_array($ret)) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($row['country']) . '</td>';
              echo '<td>' . htmlspecialchars($row['departure']) . '</td>';
              echo '<td>' . htmlspecialchars($row['price']) . '원</td>';
              echo '<td><a href="travel_detail.php?country=' . urlencode($row['country']) . '" class="button is-small is-primary">상세보기</a></td>';
              echo '<td><a href="reservation_insert.php?country=' . urlencode($row['country']) . '" class="button is-small is-light">신청</a></td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <a href="reserv_info.php">
    <button type="button" class="button is-primary">신청내역보기</button>
  </a> <br><br>
  <a href="menu.php">
    <button type="button" class="button is-primary">메뉴로 가기</button>
  </a>
</body>
</html>

<?php
  mysqli_close($con);
?>
