<!DOCTYPPE html>
<html>
<meta charset="utf-8">
<?php
	$con=mysqli_connect("localhost", "root", "", "testdb") or die("MySQL 접속 실패!!");
	 mysqli_query($con,"set names utf8"); //UTF-8로 데이터 변경 (한글 깨짐 처리)
	$sql ="SELECT * FROM board WHERE userID='".$_GET['userID']."'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if ($count == 0) {
			echo $_GET['userID']." 아이디의 회원이 없음!!!"."<br>";
			echo "<br> <a href='main.html'> 홈으로 </a> ";
			exit();
		}
	}
	else {
		echo "데이터 조회 실패!!!"."<br>";
		echo "실패 원인 :".mysqli_error($con);
		echo "<br> <a href='main.html'> 홈으로 </a> ";
		exit();
	}
	$row = mysqli_fetch_array($ret);
	$userID = $row['userID'];
	$name = $row['name'];
	$addr = $row['addr'];
	$mobile = $row['mobile'];
	$email = $row['email'];
	$mDate = $row['mDate'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 회원 정보 수정 </h1>

<FORM METHOD="post" ACTION="update_result.php">
	아이디 : <INPUT TYPE="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
	이름 : <INPUT TYPE="text" NAME="name" VALUE=<?php echo $name ?>> <br>
	지역 : <INPUT TYPE="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	전화번호 : <INPUT TYPE="text" NAME="mobile" VALUE=<?php echo $mobile ?>> <br>
	이메일 : <INPUT TYPE="text" NAME="email" VALUE=<?php echo $email ?>> <br>
	회원 가입일 : <INPUT TYPE="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY> <br>
	<BR><BR>
	<INPUT TYPE="submit" VLAUE="정보 수정">
</FORM>

</BODY>
</HTML>





