<!DOCTYPPE html>
<html>
<meta charset="utf-8">

<?php
	$con=mysqli_connect("localhost", "root", "", "testdb") or die("MySQL 접속 실패!!");
     mysqli_query($con,"set names utf8"); //UTF-8로 데이터 변경 (한글 깨짐 처리)
	$sql = "SELECT * FROM board";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
	}
	else {
		echo "board 데이터 조회 실패"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		exit;
	}

	echo "<h1> 회원 조회 결과 </h1>";
	echo "<TABLE border=1>";
	echo "<TR>";
	echo "<TH>아이디</TH><TH>이름</TH><TH>지역</TH>";
	echo "<TH>전화번호</TH><TH>이메일</TH><TH>가입일</TH><TH>수정</TH><TH>삭제</TH>";
	echo "</TR>";
	while($row = mysqli_fetch_array($ret)) {
		echo "<TR>";
		echo "<TD>", $row['userID'], "</TD>";
		echo "<TD>", $row['name'], "</TD>";
		echo "<TD>", $row['addr'], "</TD>";
		echo "<TD>", $row['mobile'], "</TD>";
		echo "<TD>", $row['email'], "</TD>";
		echo "<TD>", $row['mDate'], "</TD>";
		echo "<TD>", "<a href='update.php?userID=", $row['userID'], "'>수정</a></TD>";
		echo "<TD>", "<a href='delete.php?userID=", $row['userID'], "'>삭제</a></TD>";
		echo "</TR>";
	}

	mysqli_close($con);
	echo "</TABLE>";
	echo "<br> <a href='main.html'> 홈으로 </a> ";
?>