<!DOCTYPPE html>
<html>
<meta charset="utf-8">
<?php
	$con=mysqli_connect("localhost", "root", "", "testdb") or die("MySQL 접속 실패!!");

	$userID = $_POST["userID"];

	$sql ="DELETE FROM board WHERE userID='".$userID."'";

	$ret = mysqli_query($con, $sql);

	echo "<h1>회원 삭제 결과</h1>";
	if($ret) {
		echo $userID." 회원이 성공적으로 삭제됨.";
	}
	else {
		echo "데이터 삭제 실패하였습니다."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);

	echo "<br><br> <a href='main.html'> 홈으로 </a> ";
?>