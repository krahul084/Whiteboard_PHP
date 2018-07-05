<!DOCTYPE>
<html>
<head>
  <title>IM Courses</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
  <style type = "text/css">

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
}
th{
  background-color:blue;
border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    color: yellow;
}



</style>
</head>
<h1 style="color:red;background-color:sky-blue">Available Courses For Industrial Management</h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the CRN,Facultyname,cred,timeslot,location,coursename,day
--> 
<?php
$db = mysqli_connect('localhost','root','','University');
if (!$db)
    die("Database Connection Failed Error:". mysqli_connect_error());
$sql = 'select CRN,facultyname,day,cred,timeslot,location,course.coursename,desg,courseid from takes,course,faculty where course.dept="IM" and takes.course=course.courseid and takes.instructor=faculty.facultyid';
$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>CRN</th>
    <th>Course</th> 
     <th>Credits</th>
    <th>Day</th>
    <th>Timeslot</th>
    <th>Location</th>
    <th>Instructor</th>
    <th>Register</th>
 
  </tr>

 <?php 
 foreach($result as $row) 
  { ?>
    <tr>
        <td><?php echo $row['CRN']; ?></td>

    <td><?php 
     $crs = $row['courseid'];
     echo $row['coursename']; ?></td>

    <td><?php echo $row['cred']; ?></td>

    <td><?php echo $row['day']; ?></td>

    <td><?php 
    $tms = $row['timeslot'];
    echo $tms; ?></td>

    <td><?php echo $row['location']; ?></td>

    <td><?php echo $row['facultyname']; ?></td>

    <td><a href="confirm_register.php?<?php

                                   echo "crn=";
                                   echo $row['CRN']; 
                                   echo "&crs=";
                                   echo $crs;
                                   echo "&tms=";
                                   echo $tms;

                                   ?> 
                                   ">Register</a> </td>


  
    </tr>
    <?php 
} 

mysqli_close($db);


?>
  <input style="float:right;padding:3px" type="button" onclick="location='home.php'" value="Return to home"></input><br>


</body>
</html>