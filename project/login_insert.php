<?php 
  $con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

  $userID = $_POST["userID"];
  $user_password = $_POST["user_password"];

  $sql = "SELECT * FROM usertbl WHERE userID = '$userID' AND user_password = '$user_password'";


  $ret = mysqli_query($con, $sql);

	if (mysqli_num_rows($ret) > 0) {
    // 로그인 성공 : 세션에 정보 저장
    session_start();
    $row = mysqli_fetch_array($ret);
    $_SESSION["userID"] = $row["userID"];
    $_SESSION["username"] = $row["username"];
	
    header("Location: reservation.php");
  } else {
	// 로그인 실패시
    header("Location: login_fail.php");
    exit();
  }
  mysqli_close($con);
?>