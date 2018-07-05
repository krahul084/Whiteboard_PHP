<?php

if (isset($_GET["crn"])) 
{ 
$crn=$_GET["crn"];

}else {
  header('Location: faculty_home.php');

}

?>

<!DOCTYPE>
<html>
<head>
  <title>Select Assignment</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>

    <style type = "text/css">

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 15%;
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
<h1 style="color:red;background-color:sky-blue">Select Assignment</h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the CRN,Course,Day, Timeslot
-->
<?php
session_start();
$db = mysqli_connect('localhost','root','','University');
if (!$db)
    die("Database Connection Failed Error:". mysqli_connect_error());
$sql= sprintf("select * from assignment where instructor='%s' and crno='%s'",mysqli_real_escape_string($db,$_SESSION['id']),
  mysqli_real_escape_string($db,$crn));

$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>Assignment</th>
    
  </tr>

 <?php foreach($result as $row) 
  { ?>
    <tr>
      
<td><a href="view_all_submissions.php?<?php echo "assignmentid=";
                                   echo $row['assignmentid']; ?>"><?php echo $row['title'] ?></a> </td>


  
    </tr>
    <?php 
} 

mysqli_close($db);


?>
  <input style="float:right;padding:3px" type="button" onclick="location='faculty_home.php'" value="Return to home"></input><br>


</body>
</html>