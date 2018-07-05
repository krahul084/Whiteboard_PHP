<?php

if (isset($_GET["crn"])) 
{ 
$crn=$_GET["crn"];

}else {
	header('Location: faculty_home.php');

}

?>


<!DOCTYPE html>
<html>
<head>
<title>Create Assignment</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

<script type="text/javascript">
function onProfileSubmitted(){
return confirm("Do you really want to submit");
}
</script>
</head>

<h1>Assign Homework for <?php echo $crn; ?> :</h1>

<div id="db">
<body>
	<?php
	session_start();
	$title= '';
	$description = '';
	$target = '';
	$max_grade = '';


if (isset($_POST['submit']))
	{
		$ok = true;

		
		if (!isset($_POST['title']) || $_POST['title']==''){

			$ok = false;
		}
		else{
			$title = $_POST['title'];
		}
		
		
	

		if (!isset($_POST['description']) || $_POST['description']==''){

			$ok = false;
		}
		else{
			$description = $_POST['description'];
		}

if (!isset($_POST['target']) || $_POST['target']==''){

			$ok = false;
		}
		else{
			$target = $_POST['target'];
		}

	
if (!isset($_POST['max_grade']) || $_POST['max_grade']==''){

			$ok = false;
		}
		else{
			$max_grade = $_POST['max_grade'];
		}


	
if ($ok){
//Add a database here
	

	//Below command if for connecting to the required database
	$db = mysqli_connect('localhost','root','','University');
	//Below condition checks the connection status of database
	if (!$db)
		die("Database Connection Failed Error:". mysqli_connect_error());
    //Below query is for inserting a row into the table user

	$sql= sprintf("INSERT INTO university.assignment(title,description,instructor,crno,target,max_grade) values('%s','%s','%s','%s','%s','%s')", 
		mysqli_real_escape_string($db,$title),
		mysqli_real_escape_string($db,$description),
		mysqli_real_escape_string($db,$_SESSION['id']),
		mysqli_real_escape_string($db,$crn),
		mysqli_real_escape_string($db,$target),
		mysqli_real_escape_string($db,$max_grade));

	//The below condition checks the query success status
	if (mysqli_query($db,$sql)){
	#	$last_id = mysqli_insert_id($db);
	//	echo "Note-";
     //   echo "User Record Successfully Created.Your AuthorID is :" . $last_id;
      //  echo "/n Please save and use your author id while filing your paper";
		header('Location:assignment_creation.php');
           }
    else {
         echo "Title should be Unique!";
  	#echo "Error:" . $sql . "<br>" . mysqli_error($db);
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
<legend>Assignment</legend>
<label for="title" >Title* </label><input type="text" maxlength="50" id="title" name="title" placeholder="Enter Title" value="<?php

echo htmlspecialchars ($title);

?>"> <br><br>

 

<label for="description">Description* </label><br><textarea maxlength="10000" id="description" name="description" placeholder="Enter below 500 words" rows="20" cols="80"  value="<?php

echo htmlspecialchars ($description);
?>" required wrap="hard"></textarea><br><br>

<label for="target">Target Submission Date*</label><input type="datetime-local" name="target" value="<?php
echo htmlspecialchars($target);
?>"></input><br><br>

<label for="max_grade">Maximum Grade* </label><input type="number" id="max_grade" max="100" name="max_grade" placeholder="Enter Max Grade Offered" value="<?php

echo htmlspecialchars ($max_grade);
?>" ><br><br>

</fieldset>


	<br><br>
 
 <input type="submit" name="submit" value="Create Assignment"></input>
 <input type="reset" value="Reset"></input><br><br>
 <input style="float:left;padding:5px" type="button" onclick="location='faculty_home.php'" value="Return to Home Page"></input><br>

</form>

</body>
</html>