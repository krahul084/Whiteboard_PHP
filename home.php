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
    <a href="course_register.php">Register for Courses</a>
    <a href="view_reg.php">View/Drop Registered Courses</a>
  </div>
</div>

<div id="Assignment" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeAssignments()">&times;</a>
  <div class="overlay-content">
    <a href="view_assignment_course.php">View Assignments</a>
    <a href="view_grade.php">View Grade</a>
  </div>
</div>
<h2 style="text-align:center">WELCOME <span style="color:red;"><?php session_start(); echo $_SESSION['user'];?></span> TO WHITEBOARD.EDU</h2>
<input style="float:right;padding:9px;background-color:black;color:red" type="button" onclick="location='login1.php'" value="Logout"></input><br>

<p>Please Select From Below</p>

<img src=".\background\images\courses1.png" style="width:24em;height:12em" onclick="openNav()" alt="Courses" class="image">
<br><br><br>
<img src=".\background\images\Assignment1.png" style="width:24em;height:12em" onclick="openAssignments()" alt="Assignments" class="image">

<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
   
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
    
}
</script>

<script>
function openAssignments() {
   
     document.getElementById("Assignment").style.height = "100%";
}

function closeAssignments() 
   {
    document.getElementById("Assignment").style.height = "0%";
}
</script>
     
</body>
</html>
