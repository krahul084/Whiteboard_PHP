<?php

if (isset($_GET["crn"])) 
{ 
$crn=$_GET["crn"];

}else {
  header('Location: home.php');

}

?>

<!DOCTYPE>
<html>
<head>
	<title>Assignments</title>
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
<h1 style="color:red;background-color:sky-blue">Assignments  for <?php echo $crn; ?> </h1>
<body style="background-color:grey;color:white">

<!--
For Displaying the title,description,target date,max_grade
-->	
<?php
$db = mysqli_connect('localhost','root','','University');
if (!$db)
		die("Database Connection Failed Error:". mysqli_connect_error());
 $sql = sprintf("select title,assignmentid,crno,description,target,max_grade from assignment where crno='%s'",mysqli_real_escape_string($db,$crn));
$result = mysqli_query($db,$sql);
?>

<table>
  <tr>
    <th>Title</th>
    <th>Description</th> 
     <th>Target Submission</th>
    <th>Maximum Grade</th>
    <th>Select Assignment</th>
    
 
  </tr>

 <?php 
 foreach($result as $row) 
  { ?>
    <tr>
        <td><?php echo $row['title']; ?></td>

		<td><?php echo $row['description']; ?></td>

		<td><?php echo $row['target']; ?></td>


		<td><?php echo $row['max_grade']; ?></td>


    <td><a href="submit_assignment.php?<?php

                                   echo "assignmentid=";
                                   echo $row['assignmentid']; 
                                   echo "&crn=";
                                   echo $row['crno'];
                                   ?> 
                                   ">Submit Assignment for <?php echo $row['title']; ?></a> </td>


	
    </tr>
    <?php 
} 

mysqli_close($db);


?>
	<input style="float:right;padding:3px" type="button" onclick="location='home.php'" value="Return to home"></input><br>


</body>
</html>