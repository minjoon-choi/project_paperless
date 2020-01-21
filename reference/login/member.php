<?php session_start(); // 세션 준비 ?>
<!DOCTYPE html> 
 <html lang="ko"> 
 <head> 
 <meta charset="utf-8" /> 
 <title>회원 페이지</title> 
 </head> <body> 
 <?php if (!isset($_SESSION["member_id"]) 
	 || !isset($_SESSION["member_password"]))
 { ?>
<script>
alert(<?php=$_SESSION["member_id"] ?>)
</script> 
 <p style="text-align: center;">
 로그인되지 않았습니다.</p> 
 <p style="text-align: center;">
 <a href="login.php">로그인 하기</a></p> 
 <?php } else 
 { ?> <p style="text-align: center;">환영합니다. 
<?php echo $_SESSION["member_id"]?>님</p> 
<p style="text-align: center;">
<a href="logout.php">로그아웃 하기</a>
</p> <?php } ?> 
</body> </html>

