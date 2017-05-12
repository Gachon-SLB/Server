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

$lo=$_POST["beaconID"];
$query="select * from nbeacon where beaconID=$lo";
$result=mysqli_query($conn,$query);

$return_array = array();
while($row = mysqli_fetch_array($result))
 {	
	$row_array['building'] = $row['building'];
	$row_array['location'] = $row['location'];
  	array_push($return_array, $row_array);
}
echo json_encode($return_array);
mysql_close($conn);
?>
