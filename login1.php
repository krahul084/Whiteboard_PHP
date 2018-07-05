<html>
<title>Whiteboard.com</title>
<head>
	<!--
Javascript For Interaction of webpages
-->
<script type="text/javascript">
window.onload=function(){
alert("Welcome to Whiteboard.com");

};
</script>

<!--
Centralized Style Sheet
-->
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
body{
    color:white;
}
table, th, td {
    border: 1px solid yellow;
    border-collapse: collapse;

    margin-left: auto;
    margin-right: auto;
}

th{
    background-color:blue;
    color:yellow;
}
td{
   
    color:white;
}

th, td {
    padding: 5px;
    text-align: center;


</style>
</head>
<div align=center>
<h2 style="color:white">WHITEBOARD</h2>

<!--
For Authentication Check with backend database username and password
-->
<?php
session_start();
$message="";


if(isset($_POST['userid']) && isset($_POST['password']))
{
$db = mysqli_connect('localhost','root','','university');
$sql = sprintf("SELECT * FROM user WHERE userid='%d'",
	mysqli_real_escape_string($db,$_POST['userid']));

$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);

if($row)

{

$hash=$row['password'];
$userType = $row['usertype']; 

if(password_verify($_POST['password'],$hash))
{
	

    $_SESSION['user']= $row['firstname'];
    $_SESSION['id']= $row['userid'];
    $_SESSION['userType']=$userType;

    if($userType == 's')
    {
     header('Location:home.php');

    }

elseif($userType == 'f')
{
header('Location:faculty_home.php');


}
    elseif($userType == 'a')
    	header('Location:admin_home.php');

else
	echo "Invalid Account";
}


else
{

	$message = "Password Not Matching.";
}

}else
{
$message ='Credentials Incorr.';
}

mysqli_close($db);

}


echo "<p> $message </p>";



?>

<!--
Form defined here passes control to above php code with the user entered credentials as parameters
-->

<form method="post" style="float:center" action="">
<fieldset style="width:600px;height:200px;background-color:black;border-color:white">
<h3     >Please Login<h3>
  User  ID  <input style="float:center" type="text" name="userid" placeholder="Enter Userid"><br><br>
Password <input  style="float:center" type="password" name="password" placeholder="Enter Password"><br><br>
<input type="submit" style="float:center;color:red;background:black" value="Login"><br>
<input type="button" style="float:center;color:red;background:black" onclick="location='register.php'"  value="Not User? Register"/>
</fieldset id="help">
</form>
<br><br>
<fieldset style="width:270px">
<div style="color:white;text-align:center">Need any help? Contact</div><br>

<table style="width:15%">
  <tr>
    <th>Name </th>
    <th>Email</th> 
    <th>Mobile</th>
  </tr>
  <tr>
    <td>Rahul</td>
    <td>rxk76310@ucmo.com</td>
    <td>6602381374</td>
  </tr>
  </table>
  </fieldset>
  <br><br>
  <fieldset style="width:280px;height:130px;background-color:black">
<div style="color:white;text-align:center">See the below information for Compatibility</div>
<br>
<table style="width:25%">
  <tr>
    <th>Compatible Browser </th>
    <th>Javascript</th> 
    <th>Cookies</th>
  </tr>
  <tr>
    <td>Chrome 57</td>
    <td>Supports</td>
    <td>Supports</td>
  </tr>
  </table>
  </fieldset>
<br>


</html>