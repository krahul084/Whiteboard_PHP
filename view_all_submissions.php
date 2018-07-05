<?php

if (isset($_GET["assignmentid"])) 
{ 
$assignment= $_GET["assignmentid"];

}else {
  header('Location: faculty_home.php');

}

?>

<!DOCTYPE>
<html>
<head>
  <title>Grade</title>
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
<h1 style="color:red;background-color:sky-blue">Select each paper to grade</h1>
<body style="background-color:grey;color:white">

<!--

-->
<?php
session_start();
$db = mysqli_connect('localhost','root','','University');
if (!$db)
    die("Database Connection Failed Error:". mysqli_connect_error());
$sql= sprintf("select paperid,student,grade from paper where assignment='%s'",mysqli_real_escape_string($db,$assignment));

$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>Paper</th>
    <th>Student ID</th>  
    <th>Grade Awarded</th>
    <th>Evaluate Paper</th>
  </tr>

 <?php foreach($result as $row) 
  { ?>
    <tr>
      <td><?php echo $row['paperid']; ?></td>
      <td><?php echo $row['student']; ?></td>
      <td><?php echo $row['grade']; ?></td>
<td><a href="evaluate_paper.php?<?php echo "paperid=";
                                   echo $row['paperid']; ?>">Evaluate</a> </td>


  
    </tr>
    <?php 
} 

mysqli_close($db);


?>
  <input style="float:right;padding:3px" type="button" onclick="location='faculty_home.php'" value="Return to home"></input><br>


</body>
</html>