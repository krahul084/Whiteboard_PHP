<!DOCTYPE html>
<html>
<head>
<title>REGISTER</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
body {color:yellow}
body {background-color:	grey}
fieldset {
float:left;
}


.other{

	clear:both;

}



</style>
<script type="text/javascript">
function onProfileSubmitted(){
return confirm("Do you really want to submit");
}
</script>
</head>

<h1>Please Fill Registration Form:</h1>


<body>
	<?php
	$password = '';
	$firstname = '';
	$lastname = '';
	$email = '';
	$mobile = '';
	$gender = '';
	$department = '';


if (isset($_POST['submit']))
	{
		$ok = true;

		
		if (!isset($_POST['password']) || $_POST['password']==''){

			$ok = false;
		}
		else{
			$password = $_POST['password'];
		}
		
		
	if (!isset($_POST['firstname']) || $_POST['firstname']==''){

			$ok = false;
		}
		else{
			$firstname = $_POST['firstname'];
		}
	
	
		if (!isset($_POST['lastname']) || $_POST['lastname']==''){

			$ok = false;
		}
		else{
			$lastname = $_POST['lastname'];
		}

		if (!isset($_POST['email']) || $_POST['email']==''){

			$ok = false;
		}
		else{
			$email = $_POST['email'];
		}

if (!isset($_POST['mobile']) || $_POST['mobile']==''){

			$ok = false;
		}
		else{
			$mobile = $_POST['mobile'];
		}
	if (!isset($_POST['gender']) || $_POST['gender']==''){

			$ok = false;
		}
		else{
			$gender = $_POST['gender'];
		}
	
if (!isset($_POST['department']) || $_POST['department']==''){

			$ok = false;
		}
		else{
			$department = $_POST['department'];
		}


	
if ($ok){
//Add a database here
	$hash = password_hash($password, PASSWORD_DEFAULT);

	//Below command if for connecting to the required database
	$db = mysqli_connect('localhost','root','','university');
	//Below condition checks the connection status of database
	if (!$db)
		die("Database Connection Failed Error:". mysqli_connect_error());
    //Below query is for inserting a row into the table user

	$sql= sprintf("INSERT INTO user(password,firstname,lastname,email,mobile,gender,department) VALUES('%s','%s','%s','%s','%s','%s','%s')", 
		mysqli_real_escape_string($db,$hash),
		mysqli_real_escape_string($db,$firstname),
		mysqli_real_escape_string($db,$lastname),
		mysqli_real_escape_string($db,$email),
		mysqli_real_escape_string($db,$mobile),
		mysqli_real_escape_string($db,$gender),
		mysqli_real_escape_string($db,$department));

	//The below condition checks the query success status
	if (mysqli_query($db,$sql)){
		$last_id = mysqli_insert_id($db);
        echo "User Record Successfully Created.Your UserID is :" . $last_id;
           }
    else {

  	echo "Error:" . $sql . "<br>" . mysqli_error($db);
         }
         mysqli_close($db);

	
}
}

	?>

<br>
	

<!--
HTML FORM formatting is done
-->
<form method="post" action="" id="profileForm" enctype="multipart/form-data" onsubmit="return onProfileSubmitted()">

<fieldset>
<legend>Contact Information</legend>
<label for="firstname" >Firstname:</label><input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" value="<?php

echo htmlspecialchars ($firstname);

?>"> <br><br>

<label for="lastname">Lastname:</label><input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" value="<?php

echo htmlspecialchars ($lastname);

?>"><br><br>
 
<label for="email">Email ID:</label><input type="email" id="email" name="email" placeholder="Enter Email ID" value="<?php

echo htmlspecialchars ($email);

?>"><br><br>

<label for="mobile">Mobile:</label><input type="number"min="1000000000" max="9999999999" id="mobile" name="mobile" placeholder="Enter mobile number" value="<?php

echo htmlspecialchars ($mobile);

?>">
</fieldset>

<fieldset>
	<legend>Profile Information</legend>
	<br>
<label for="password">Password:</label> <input  type="password" id="password" name="password" placeholder="Enter Password" value="<?php

echo htmlspecialchars ($password);

?>"> <br><br>


Gender:
<label><input type="radio" name="gender" value="f"<?php
if($gender==='f'){

	echo(' checked');
}
?>>female</label>
<label><input type="radio" name="gender" value="m"<?php
if($gender==='m'){

	echo(' checked');
}
?>>male</label><br><br>

Department:
  <select name="department">
  	<option value="">Please Select</option>

  	<option value="CS"<?php
if($department==='CS'){

	echo(' selected');
}
?>>Computer Science</option>
  
  	<option value="CI"<?php
if($department==='CI'){

	echo(' selected');
}
?>>Computer Information Systems</option>

  	<option value="IM"<?php
if($department==='IM'){

	echo(' selected');
}
?>>Industrial Management</option>
  
 <option value="CY"<?php
if($department==='CY'){

	echo(' selected');
}
?>>Cyber Security</option>
  </select><br><br>
 Upload Profile Picture:  <input type="file" id="profileimage" name"profileimage" value="Upload Profile PIC"></input><br>
</fieldset>

<div class="other">
	<br>
 
 <input style="background-color:black;color:red" type="submit" name="submit" value="Profile Submit"></input>
 <input style="background-color:black;color:red" type="reset" value="Reset"></input><br><br>
 <input style="float:center;padding:5px;background-color:black;color:red" type="button" onclick="location='login1.php'" value="Return to Login Page"></input><br>
 
</div>
</form>

</body>
</html>

