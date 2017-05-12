<?php

$servername="";

$usernam="";

$password = "";

$database="";
   
$port=3306;

// Create connection

$conn = mysqli_connect($servername, $username, $password,$database,$port);

   

// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

$time=$_POST['time'];
$build=$_POST['build'];
$class=$_POST['class'];
$query="select * from class natural join course natural join instructor where (time1='$time' or time2='$time' or time3='$time' or time4='$time') and buliding='$build' and classroom='$class'";
$result=mysqli_query($conn,$query);
$return_array = array();
while($row = mysqli_fetch_array($result))
{
	$row_array['name']=$row['name'];	
	$row_array['title']=$row['title'];
	$row_array['time1']=$row['time1'];
	$row_array['time2']=$row['time2'];
	$row_array['time3']=$row['time3'];
	$row_array['time4']=$row['time4'];
	array_push($return_array, $row_array);
}
echo json_encode($return_array);
mysql_close($conn);
?>