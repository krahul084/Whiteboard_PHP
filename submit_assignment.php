<?php

if (isset($_GET["crn"]) && isset($_GET["assignmentid"])) 
{ 
$crn=$_GET["crn"];
$assignmentid=$_GET["assignmentid"];


}else {
	header('Location: home.php');

}

?>


<!DOCTYPE html>
<html>
<head>
<title>Submit Assignment</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
body {color:yellow}
body {background-color:	grey}

#db
{
background-color:white;
color:blue;
font-family: "Times New Roman", Georgia, Serif;
font-size:100;
 font-style: normal;
 font-weight: bold;
}

</style>
<script type="text/javascript">
function onProfileSubmitted(){
return confirm("Do you really want to submit");
}
</script>
</head>

<h1>Please Submit Your Assignment:</h1>
 
<div id="db">
<body>
	<?php
	session_start();
	$manual = '';
	$doc = '';


if (isset($_POST['submit']))
	{
		$ok = true;

		
		if(!isset($_POST['manual']) || $_POST['manual']=='')
		{

			$ok = false;
		}
		else{
			$manual = $_POST['manual'];
			
			
		}


		if(isset($_FILES['upload']))
		{
$target_dir = './uploads/';
$doc = $target_dir . basename($_FILES['upload']['name']);
move_uploaded_file($_FILES['upload']['tmp_name'], $doc);
	

}

else
{

	echo 'Sorry, could not upload file';
}
 
	
		

	
if ($ok){
//Add a database here
	

	//Below command if for connecting to the required database
	$db = mysqli_connect('localhost','root','','University');
	//Below condition checks the connection status of database
	if (!$db)
		die("Database Connection Failed Error:". mysqli_connect_error());
    //Below query is for inserting a row into the table user

	$sql= sprintf("INSERT INTO university.paper(assignment,student,manual,doc) VALUES('%s','%s','%s','%s')", 
		mysqli_real_escape_string($db,$assignmentid),
		mysqli_real_escape_string($db,$_SESSION['id']),
		mysqli_real_escape_string($db,$manual),
		mysqli_real_escape_string($db,$doc));

	//The below condition checks the query success status
	if (mysqli_query($db,$sql)){
	#	$last_id = mysqli_insert_id($db);
	//	echo "Note-";
     //   echo "User Record Successfully Created.Your AuthorID is :" . $last_id;
      //  echo "/n Please save and use your author id while filing your paper";
		header('Location:acknowledge_assignment_submission.php');
	#	header('Location:demo_image.php');
           }
    else {
echo "Error! Assignment Already Submitted!";
  #	echo "Error:" . $sql . "<br>" . mysqli_error($db);
         }
        mysqli_close($db);

	
}
}

	?>
</div>
<br>
	

<!--
HTML FORM formatting is done
-->
<form method="post" action="" id="profileForm" enctype="multipart/form-data" onsubmit="return onProfileSubmitted()">

<fieldset>
<legend>Assignment for <?php echo $crn; ?></legend>

<label for="manual">Write Submission </label><br><textarea maxlength="10000" id="manual" name="manual" placeholder="Enter below 500 words" rows="15" cols="70"  value="<?php

echo htmlspecialchars ($manual);
?>"  wrap="hard"></textarea><br>
(AND IF REQUIRED)<br><br>

Upload Document  <input type="file" id="upload" name="upload"></input><br><br>
Note:Please upload document in the name format "userid_crn_assignmenttitle"

</fieldset>

<div>
	<br><br>
 
 <input type="submit" style="padding:9px;background-color:black;color:red" name="submit" value="Submit Assignment"></input>
 <input type="reset" style="padding:9px;background-color:black;color:red" value="Reset"></input><br>
<input style="float:left;padding:9px;background-color:black;color:red" type="button" onclick="location='home.php'" value="Return to home"></input>
 
</div>
</form>

</body>
</html>