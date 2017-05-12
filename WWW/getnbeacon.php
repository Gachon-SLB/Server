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

$ye=date("Y");
$id=$_POST["ID"];
$query="select * from nbeacon";
$result=mysqli_query($conn,$query);
$return_array = array();

while($row = mysqli_fetch_array($result))
{
	$row_array['buliding']=$row['building'];
	$row_array['classroom']=$row['location'];
	$row_array['beaconID']=$row['beaconID'];
	array_push($return_array, $row_array);
}
echo json_encode($return_array);
mysql_close($conn);
?>