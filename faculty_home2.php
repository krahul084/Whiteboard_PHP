<!DOCTYPE html>
<html>
<title>FACULTY HOME PAGE</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<h2>WELCOME INSTRUCTOR  <span style="color:red;background-color:yellow;"><?php session_start(); echo $_SESSION['user'];?></span> TO WHITEBOARD.COM<h2>

<input type="button" onclick="location='login1.php'" value="Logout"></input><br>
<!--
<input type="button" onclick="location='course_register.php'" value="Register For Courses"></input>
-->

<input type="button" onclick="location='view_faculty_course.php'" value="View Handled Classes"></input><br>

<input type="button" onclick="location='view_course_grade.php'" value="Grade Homework"></input>



</html>



