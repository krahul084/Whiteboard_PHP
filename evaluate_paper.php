<?php

if (isset($_GET["paperid"]) && ctype_digit($_GET["paperid"])){ 
$paper=$_GET["paperid"];

}else {
	header('Location: faculty_home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Grade</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
body {color:yellow}
body {background-color:	grey}
</style>
</head>
<body>
	<?php
	$grade = '';
	$comments = '';

	$languages = array();
/*
$db = mysqli_connect('localhost','root','','Conference');
$sql = sprintf('SELECT * FROM paper WHERE pid=%s',$pid);
$result = mysqli_query($db,$sql);

foreach ($result as $row)
{
	$title=$row['title']
	$abstract=$row['abstract']
	
}
mysqli_close($db);

*/
	if (isset($_POST['submit']))
	{
		$ok = true;
		if (!isset($_POST['grade']) || $_POST['grade']==''){

			$ok = false;
		}
		else{
			$grade = $_POST['grade'];
		}

		$comments= $_POST['comments'];
	
	
if ($ok){
//Add a database here
$db= mysqli_connect('localhost','root','','University');
$sql=sprintf("UPDATE paper SET grade='%s',comments='%s' WHERE paperid=%s",
	mysqli_real_escape_string($db,$grade),
	mysqli_real_escape_string($db,$comments),
	mysqli_real_escape_string($db,$paper));
if(mysqli_query($db,$sql))
echo '<p>Reviewed!</p>';

else
echo "Error:" . $sql . "<br>" . mysqli_error($db);
	mysqli_close($db);
	
}
}

	?>
	
<form method="post" action="">
	<?php
$db = mysqli_connect('localhost','root','','University');
$sql = sprintf("SELECT * FROM paper WHERE paperid='%s'",$paper);
$result = mysqli_query($db,$sql);
$row = $result->fetch_assoc();
if($row)

{
#echo "Working till row" .$row['status'];

}
/*
	#$title=$row["title"]
	#$abstract=$row['abstract']
	#echo $row["status"];
	
*/
mysqli_close($db);
?>
	

 
Homework<br><textarea style="color:blue" name = "manual" cols=40  rows=3 readonly>
<?php echo htmlspecialchars($row['manual'] )?>
</textarea><br><br>

<a href="<?php echo $row['doc']; ?>" download>Uploaded File</a><br><br>

<label for="grade">Grade* </label><input type="number" id="grade" max="8" name="grade" placeholder="Enter Grade" value="<?php

echo htmlspecialchars ($grade);
?>"><br><br>



 <label for="comments">Comments* </label><br><textarea maxlength="1000" id="comments" name="comments" placeholder="Enter Comments" rows="10" cols="50"  value="<?php

echo htmlspecialchars ($comments);
?>" required wrap="hard"></textarea><br><br>



 <input type="submit" name="submit" value="Submit Grade">
 <input type="reset" value="Reset"></input><br><br>
 <input style="float:left;padding:5px" type="button" onclick="location='view_all_submissions.php'" value="Return back"></input><br>


</form>
</body>
</html>