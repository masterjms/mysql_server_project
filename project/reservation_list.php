<?php
$con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

  session_start();
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
    echo "로그인한 사용자: " . $username . " (ID: " . $userID . ")";
  } else {
    echo "로그인 정보가 없습니다. 수정하려면 로그인하세요.";
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
            padding: 20px;
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
<body>
    <h1>여행 신청 내역</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>아이디</th>
                    <th>신청된 국가</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($ret)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['num']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['usertbl_userID']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['traveltbl_country']) . '</td>';
                    echo '</tr>';
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <a href="menu.php">
        <button type="button" class="button is-primary">메뉴</button>
    </a>
</body>
</html>