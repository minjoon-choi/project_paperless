<!DOCTYPPE html>
<html>
<meta charset="utf-8">

<?php
	$con=mysqli_connect("localhost", "root", "", "testdb") or die("MySQL 접속 실패!!");
mysqli_query($con,"set names utf8"); //UTF-8로 데이터 변경 (한글 깨짐 처리)
	$userID = $_POST['userID'];
	$name = $_POST['name'];
	$addr = $_POST['addr'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$mDate = $_POST['mDate'];

	$sql ="UPDATE board SET name='".$name."'";
	$sql = $sql.", addr='".$addr."', mobile='".$mobile."'";
	$sql = $sql.", email='".$email."', mDate='".$mDate."' WHERE userID='".$userID."'";

	$ret = mysqli_query($con, $sql);

	echo "<h1> 회원 정보 수정 결과 </h1>";
	if($ret) {
		echo "데이터가 성공적으로 수정됨.";
	}
	else {
		echo "데이터 수정 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);

	echo "<br> <a href='main.html'> 홈으로 </a> ";
?>