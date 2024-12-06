<?php 
  $con=mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");
  
  $userID = $_POST["userID"];
  $user_password = $_POST["user_password"];
  $username = $_POST["username"];
  $gender = $_POST["gender"];
  $mobile = $_POST["mobile"];
  $addr = $_POST["addr"];
  $age = $_POST["age"];
  
  // 데이터 입력 sql
  $sql = "insert into usertbl(userID, user_password, username,  gender,  mobile, addr, age) values('".$userID."', '".$user_password."', '".$username."', '".$gender."', '".$mobile."', '".$addr."', '".$age."')";
  $ret = mysqli_query($con,$sql);
  
  // 세션 확인용 sql
  $session_sql = "SELECT * FROM usertbl WHERE userID = '$userID'"; // 회원가입할때 적었던 userID의 데이터를 가져온다.
  $session_ret = mysqli_query($con,$session_sql);
  
  echo "<h1>회원가입 결과<h1>";
  
  if($ret){
	session_start(); // 데이터가 성공적으로 입력되면 세션 실행 및 신청페이지로 이동.
    $row = mysqli_fetch_array($session_ret);
    $_SESSION["userID"] = $row["userID"];
	$_SESSION["username"] = $row["username"];
	header("Location: reservation.php");
  } else {
	  echo "data insert failed :" . mysqli_error($con);
	  echo "<br><a href='user_info.php'>[다시 입력하기]</a>";
  }
  mysqli_close($con);
  

?>