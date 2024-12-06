<?php
  $con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

  session_start();
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
    echo "로그인한 사용자: " . $username . " (ID: " . $userID . ")";
  } else {
    header("Location: reservation_list.php"); // 로그인 안한 상태에서 접근하면 수정,삭제 권한이 없는 페이지로 이동.
	exit();
  }

  $sql = "SELECT * FROM usertraveltbl ORDER BY num ASC";
  $ret = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>여행 신청 내역</title>
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
	a {
    text-decoration: none;
	}
  </style>
</head>
<body>
  <h1>여행 신청 내역</h1>
  <div class="container">
    <div class="scroll-window-wrapper">
      <div class="scroll-window">
        <table class="table is-fixed-header">
          <thead>
            <tr>
              <th scope="col">번호</th>
              <th scope="col">아이디</th>
              <th scope="col">신청된 국가</th>
              <th scope="col">수정</th>
              <th scope="col">삭제</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // 데이터베이스에서 데이터를 가져오는 반복문
            while ($row = mysqli_fetch_array($ret)) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($row['num']) . '</td>';
              echo '<td>' . htmlspecialchars($row['usertbl_userID']) . '</td>';
              echo '<td>' . htmlspecialchars($row['traveltbl_country']) . '</td>';
              echo '<td><a href="reserv_update_view.php?country=' . urlencode($row['traveltbl_country']) . '&userID=' . urlencode($row['usertbl_userID']) . '" class="button is-small is-primary">수정하기</a></td>';
              echo '<td><a href="travel_delete.php?country=' . urlencode($row['traveltbl_country']) . '&userID=' . urlencode($row['usertbl_userID']) . '" class="button is-small is-light">삭제</a></td>';
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
