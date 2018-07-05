<?php

if (isset($_GET["crn"]))
{ 
$crn=$_GET["crn"];

}else {
	header('Location: home.php');

}

?>

<!DOCTYPE HTML>
<html>
<title>Confirm Drop Of Course</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<head>

</head>

<body>

<?php
session_start();
if (isset($_POST['submit'])){
$db = mysqli_connect('localhost','root','','university');
$sql= sprintf("delete from university.register where student='%s' and crno='%s'", 
		mysqli_real_escape_string($db,$_SESSION['id']),
		mysqli_real_escape_string($db,$crn));

	if(mysqli_query($db,$sql)){
	echo $_SESSION['id'];
	echo '<p>You are Registered for .</p>';
	echo $crn;
	mysqli_close($db);
    header('Location: acknowledge.php');
}
else
 printf("Errormessage: %s\n", $mysqli->error);
}
?>
<h2>Please Confirm the Dropping of Class: <?php echo $crn; ?></h2>

<form method="post" action="">

 <input style="float:center;color:yellow;background-color:blue" type="submit" name="submit" value="Confirm">



</form>

</body>
</html>