<?php 
  $con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

  $country = $_GET["country"];

  $sql = "SELECT * FROM travel_detail_tbl WHERE country = '".$country."'";

  $ret = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>여행지 상세정보</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
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
      border-bottom: 1px solid #ddd;
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
      margin: 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .button.is-primary {
      background-color: #007bff;
      color: white;
    }
    .button.is-light {
      background-color: #f8f9fa;
      color: #333;
    }
  </style>
</head>
<body class="demo">
  <h1>여행지 상세정보</h1>
  <div class="container">
    <div class="scroll-window-wrapper">
      <div class="scroll-window">
        <table class="table is-fixed-header">
          <caption class="a11y-hidden">INFORMATION</caption>
          <thead>
            <tr>
              <th scope="col">국가명</th>
              <th scope="col">도시</th>
              <th scope="col">제한인원</th>
              <th scope="col">여행 기간</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // 데이터베이스 쿼리 결과를 반복문으로 출력
              while ($row = mysqli_fetch_array($ret)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['country']) . '</td>';
                echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                echo '<td>' . htmlspecialchars($row['member_limit']) . '명</td>';
                echo '<td>' . htmlspecialchars($row['period']) . '</td>';
                echo '</tr>';
              }
              mysqli_close($con);
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <a href="reservation.php">
    <button type="button" class="button is-primary">뒤로가기</button>
  </a>
</body>
</html>
