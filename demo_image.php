<?php

#header("content-type:image/jpeg");

$host = 'localhost';
$user = 'root';
$pass = '';

mysql_connect($host, $user, $pass);

mysql_select_db('university');



$select_image="select * from paper where doc='DB_HW3.txt'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
 $image_name=$row["doc"];
# $image_content=$row["imagecontent"];
}
echo $image_name;

?>