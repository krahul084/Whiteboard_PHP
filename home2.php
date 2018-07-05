<!DOCTYPE html>
<html>
<head>
<title>HOME PAGE</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
body {
    margin: 0;
    font-family: 'Lato', sans-serif;
}

.overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
</style>
</head>

<h2 style="text-align:center">WELCOME <span style="color:yellow;"><?php session_start(); echo $_SESSION['user'];?></span> TO WHITEBOARD.COM<h2>


  <img src="Courses.jpg" onclick="openNav()" alt="Courses" class="image">

     


<input style="float:right" type="button" onclick="location='login1.php'" value="Logout"></input><br>
<br>
<br>
<input type="button" onclick="location='course_register.php'" value="Register For Courses"></input>
<br>
<br>
<!--
<a href="course_register.php">
  <img src="register_course_image.png" alt="Register For Courses" style="width:70px;height:42px;border:0;">
</a><br>
-->
<input type="button" onclick="location='view_reg.php'" value="View/Remove Registered Classes"></input>
<br>
<br>
<input  type="button" onclick="location='view_assignment_course.php'" value="View Assignments"></input>
<br>
<br>
<input  type="button" onclick="location='view_grade.php'" value="View Grade"></input>



</html>



