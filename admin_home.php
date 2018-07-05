<!DOCTYPE html>
<html>
<title>ADMIN HOME PAGE</title>
<h2>WELCOME ADMIN<span style="color:red;background-color:yellow;"><?php session_start(); echo $_SESSION['user'];?></span> TO WHITEBOARD.COM<h2>

<input type="button" onclick="location='login1.php'" value="Logout"></input><br>
<!--
<input type="button" onclick="location='course_register.php'" value="Register For Courses"></input>
-->
<a href="course_register.php">
  <img src="register_course_image.png" alt="Register For Courses" style="width:70px;height:42px;border:0;">
</a><br>
<input type="button" onclick="location='view_reg.php'" value="View/Remove Registered Classes"></input>



</html>



