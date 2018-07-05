<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
<style>

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
<body style="background-color:black;color:white">

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="view_faculty_course.php">View Handled Classes</a>
    <a href="view_course_grade.php">Grade Homework</a>
  </div>
</div>


<h2>WELCOME INSTRUCTOR  <span style="color:red;"><?php session_start(); echo $_SESSION['user'];?></span> TO WHITEBOARD.COM<h2>
<input style="float:right;background-color:black;color:red" type="button" onclick="location='login1.php'" value="Logout"></input>

<p style="font-size:10">Please Select</p>

<img src=".\background\images\faculty2.jpg" style="width:20em;height:10em" onclick="openNav()" alt="Courses" class="image">


<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
   
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
    
}
</script>


     
</body>
</html>
