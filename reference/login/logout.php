<?php session_start(); // 세션 준비 ?>

 <!DOCTYPE html> 
 <html lang="ko"> 
 <head> 
 <meta charset="utf-8" /> 
 <title>로그아웃</title> </head>
 <body> <!-- 세션에 로그인 정보가 없는 경우 --> 
 <?php if (!isset($_SESSION["member_id"]) || 
 !isset($_SESSION["member_password"])) 
 { ?> 
 <p style="text-align: center;">
 로그인되지 않았습니다.</p> 
 <p style="text-align: center;">
 <a href="login.php">로그인 하기</a>
 </p> <!-- 현재 세션 데이터를 지우는 함수는 
 session_destroy(); --> 
 <?php } else { ?> <?php session_destroy(); ?>
 <p style="text-align: center;">
 로그아웃 되었습니다.</p> 
 <p style="text-align: center;">
 <a href="login.php">로그인 하기</a></p> 
 <?php } ?> 
 </body> </html>
