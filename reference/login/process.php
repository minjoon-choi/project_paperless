<?php session_start(); // 세션 준비 ?>
<?php // 미리 정의된 ID와 암호 
$member_id = "korea"; 
$member_password = "seoul"; ?> 
<!DOCTYPE html> 
<html lang="ko"> 
<head> 
<meta charset="utf-8"> 
<title>로그인 처리</title> 
</head> 

<body> 
<?php echo $_POST['member_id']; ?>
<!-- POST 방식으로 전달된 데이터를 읽어올 때는
 $_POST["변수명"]을 사용합니다. --> 
 <!-- ID가 전달되었는지 검사 --> 
 <?php if (!isset($_POST['member_id']))
	 { ?> 
 <p style="text-align: center;">
 ID가 입력되지 않았습니다.</p> 
 <p style="text-align: center;">
 <a href="login.php">로그인하기</a>
 </p> <!-- 암호가 전달되었는지 검사 --> 
 <?php } else if 
 (!isset($_POST['member_password'])) 
 { ?> <p style="text-align: center;">
 암호가 입력되지 않았습니다.</p>
 <p style="text-align: center;">
 <a href="login.php">로그인하기</a>
 </p> <!-- ID와 암호가 전달되었다면 --> 
 <?php } else { ?> 
 <!-- ID 잘못 입력 시 --> 
 <?php if(strcmp($_POST["member_id"], $member_id) != 0) 
 { ?> <p style="text-align: center;">
ID가 일치하지 않습니다.</p> 
<p style="text-align: center;">
<a href="login.php">다시 로그인하기</a>
</p> <!-- 암호 잘못 입력 시 --> <?php } 
else if (strcmp($_POST["member_password"], 
$member_password) != 0) { ?> 
<p style="text-align: center;">
암호가 일치하지 않습니다.</p> 
<p style="text-align: center;">
<a href="login.php">다시 로그인하기</a>
</p> <!-- 로그인 성공 --> <?php } 
else { ?> <?php $_SESSION["member_id"] = 
$_POST["member_id"]; ?> 
<?php $_SESSION["member_password"] = 
$_POST["member_password"] ?> 
<p style="text-align: center;">
로그인 성공</p> 
<p style="text-align: center;">
<a href="member.php">
회원 페이지</a></p> <?php } ?> 
<?php } ?> 
</body> </html>

