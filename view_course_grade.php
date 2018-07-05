<!DOCTYPE>
<html>
<head>
  <title>Select Course</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
    <style type = "text/css">

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
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
<h1 style="color:red;background-color:sky-blue">Select Class</h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the CRN,Course,Day, Timeslot
-->
<?php
session_start();
$db = mysqli_connect('localhost','root','','University');
if (!$db)
    die("Database Connection Failed Error:". mysqli_connect_error());
$sql= sprintf("select CRN,coursename,timeslot,location,day from takes,course where instructor='%s' and course.courseid=takes.course",mysqli_real_escape_string($db,$_SESSION['id']));

$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>CRN</th>
    <th>Course</th> 
    <th>Grade Homework</th>
 
  </tr>

 <?php foreach($result as $row) 
  { ?>
    <tr>
        <td><?php echo $row['CRN']; ?></td>

    <td><?php echo $row['coursename']; ?></td>

    <td><a href="view_by_assignment_grade.php?<?php echo "crn=";
                                   echo $row['CRN']; ?>">Select</a> </td>


  
    </tr>
    <?php 
} 

mysqli_close($db);


?>
  <input style="float:right;padding:3px;background-color:black;color:red" type="button" onclick="location='faculty_home.php'" value="Return to home"></input><br>


</body>
</html>