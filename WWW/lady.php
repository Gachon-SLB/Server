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
$id=$_POST['id'];
$build=$_POST['build'];
$query="select * from class natural join course natural join instructor where time1='$time' or time2='$time' or time3='$time' or time4='$time' and buliding='$build' and studentNo='$id'";
$result=mysqli_query($conn,$query);
$return_array = array();
$row = mysqli_fetch_array($result);
if(!$row)
{
	echo "fail";
}
echo json_encode($return_array);
mysql_close($conn);
?>