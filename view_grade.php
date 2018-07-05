<!DOCTYPE>
<html>
<head>
  <title>Grades</title>
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
<h1 style="color:red;background-color:sky-blue">Your Grade For Assignments:</h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the CRN,Course,Day, Timeslot
-->
<?php
session_start();
$db = mysqli_connect('localhost','root','','University');
if (!$db)
    die("Database Connection Failed Error:". mysqli_connect_error());
$sql= sprintf("select title,crno,grade,comments,student from paper,assignment where student='%s' and paper.assignment=assignment.assignmentid",mysqli_real_escape_string($db,$_SESSION['id']));

$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>Homework</th>
    <th>Class</th> 
    <th>Grade</th>
     <th>Comments</th>
  </tr>

 <?php foreach($result as $row) 
  { ?>
    <tr>
      <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['crno']; ?></td>

    <td><?php echo $row['grade']; ?></td>
    <td><?php echo $row['comments']; ?></td>

   


  
    </tr>
    <?php 
} 

mysqli_close($db);


?>
  <input style="float:right;padding:3px" type="button" onclick="location='home.php'" value="Return to home"></input><br>


</body>
</html>