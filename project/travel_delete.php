<?php 
  $con=mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");
  
  $userID = $_GET["userID"];
  $country = $_GET["country"];
  
  $sql = "delete from usertraveltbl WHERE usertbl_userID = '".$userID."' AND traveltbl_country = '".$country."'";
  $ret = mysqli_query($con,$sql);
  
  echo "<h1>삭제결과<h1>";
  
  if($ret){
	  echo "데이터 성공적으로 삭제됨";
  } else {
	  echo "data delete failed"."<br>";
	  echo "원인 : " .mysqli_error($con);
  }
  mysqli_close($con);
  
  echo "<br><a href='reserv_info.php'>[신청리스트로 돌아가기]</a>";
  
?>