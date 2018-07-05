<!DOCTYPE>
<html>
<head>
	<title>Select Coursewise</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
	   
</head>
<h1 style="color:red;background-color:sky-blue">Select Course For Assignments!</h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the CRN,Facultyname,cred,timeslot,location,coursename,day
-->	
<?php
session_start();
$db = mysqli_connect('localhost','root','','University');
if (!$db)
		die("Database Connection Failed Error:". mysqli_connect_error());
$sql= sprintf("select CRN,facultyname,day,cred,register.timeslot,location,course.coursename,desg from takes,course,faculty,register where student='%s' and takes.course=course.courseid and takes.instructor=faculty.facultyid and register.crno=takes.CRN",mysqli_real_escape_string($db,$_SESSION['id']));
  #sprintf("select CRN,facultyname,day,cred,timeslot,location,course.coursename,desg from takes,course,faculty,register where student='%s' and takes.course=course.courseid and takes.instructor=faculty.facultyid and register.crno=takes.CRN",mysqli_real_escape_string($db,$_SESSION['id']));
$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    
    <th style="background-color:red">Course</th> 
    
 
  </tr>

 <?php foreach($result as $row) 
  { ?>
    <tr>
        

    <td style="background-color:grey"><a href="view_assignment.php?<?php echo "crn=";
                                   echo $row['CRN']; ?>"><?php echo $row['coursename']; ?></a> </td>


	
    </tr>
    <?php 
} 

mysqli_close($db);


?>
	<input style="float:right;padding:3px" type="button" onclick="location='home.php'" value="Return to home"></input><br>


</body>
</html>