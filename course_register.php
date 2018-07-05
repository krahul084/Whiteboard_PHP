<!DOCTYPE html>
<html>
<head>
<title>Select Dept</title>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<h1>Choose Department</h1>
<body>

<?php

$department ='';

if (isset($_POST['submit']))
{
$department = $_POST['department'];

if($department=='CS')
header('Location:cs.php');

elseif($department=='CI')
header('Location:ci.php');

elseif($department=='CY')
header('Location:cy.php');
elseif($department=='IM')
header('Location:im.php');
}

?>
<!--
HTML FORM formatting is done
-->
<form method="post" action="" id="departmentForm" enctype="multipart/form-data" onsubmit="return onProfileSubmitted()">
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
</fieldset>


 
 <input style="padding:8px;background-color:black;color:red" type="submit" name="submit" value="Proceed Next"></input>
 

</form>
</body>
</html>