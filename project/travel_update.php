<?php
  $con=mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");
  
  session_start();
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
  } else {
    echo "로그인 정보가 없습니다.";
  }
  
	$old_country = $_POST["old_country"];
	$new_country = $_POST["new_country"];
  
// 이전 여행지에서 새롭게 수정된 여행지로 수정
  $sql = "UPDATE usertraveltbl SET traveltbl_country = '".$new_country."' WHERE usertbl_userId = '".$userID."' AND traveltbl_country = '".$old_country."'";
  
  $ret = mysqli_query($con,$sql);
  
  echo "<h1>회원정보 수정결과<h1>";
  
  if($ret){
	  header("Location: reserv_info.php");
  } else {
	  echo "수정 실패"."<br>";
	  echo "원인 : " .mysqli_error($con);
  }
  mysqli_close($con);
  
  echo "<br><a href='reserv_update_view.php'>[다시 선택하기]</a>";
  
?>