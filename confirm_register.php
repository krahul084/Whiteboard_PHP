<?php

if (isset($_GET["crn"])) 
{ 
$crn=$_GET["crn"];
$crs=$_GET["crs"];
$tms=$_GET["tms"];

}else {
	header('Location: home.php');

}

?>

<!DOCTYPE HTML>
<html>
<title>Confirm Registration</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<head>

</head>

<body>

<?php
session_start();
if (isset($_POST['submit'])){
$db = mysqli_connect('localhost','root','','university');
$sql= sprintf("INSERT INTO university.register(student,crno,course,timeslot) VALUES('%s','%s','%s','%s')", 
		mysqli_real_escape_string($db,$_SESSION['id']),
		mysqli_real_escape_string($db,$crn),
		mysqli_real_escape_string($db,$crs),
		mysqli_real_escape_string($db,$tms));

	if(mysqli_query($db,$sql)){
	echo $_SESSION['id'];
	echo '<p>You are Registered for .</p>';
	echo $crn;
	mysqli_close($db);
    header('Location: acknowledge.php');
}
else{
	echo "Meeting Conflict!";
 #printf("Errormessage: %s\n", $mysqli->error);
}
}
?>
<h2>Please Confirm the Registration for <?php echo $crn; ?></h2>
  <input style="float:right;padding:9px;background-color:black;color:red" type="button" onclick="location='home.php'" value="Return to home"></input><br>
<form method="post" action="">

 <input style="float:center;color:yellow;background-color:blue" type="submit" name="submit" value="Confirm">



</form>

</body>
</html>