<?php
  $con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

// 세션 확인
  session_start();
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
  } else {
    echo "로그인 정보가 없습니다. 로그인 후 다시 시도해주세요.";
    exit();
  }

  $country = $_GET["country"];

  // traveltbl 테이블에서 country가 존재하는지 확인
  $check_sql = "SELECT * FROM traveltbl WHERE country = '$country'";
  $check_result = mysqli_query($con, $check_sql);

  if (mysqli_num_rows($check_result) > 0) {
    // country가 존재하면 usertraveltbl에 데이터 삽입
    $sql = "INSERT INTO usertraveltbl (usertbl_userId, traveltbl_country) VALUES ('$userID', '$country')";
    
    if (mysqli_query($con, $sql)) {
      header("Location: reserv_info.php");
      exit();
    } else {
      echo "이미 여행을 신청하셨습니다. 여행지를 수정하고 싶으신가요?: " . mysqli_error($con);
	  echo '<br><a href="reserv_info.php">
              <button>여행지 수정</button>
            </a>';
    }
  } else {
    echo "선택한 여행지는 존재하지 않습니다. 여행지 정보를 확인해 주세요.";
  }

  mysqli_close($con);
?>
