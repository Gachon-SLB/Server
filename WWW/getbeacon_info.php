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

$lo=$_POST["classroom"];
$bu=$_POST["building"];
$query="select beaconID from `nbeacon`where  location=$lo and building=$bu";
$result=mysqli_query($conn,$query);
if(!$result){
            die('Invalid query :'.mysqli_error());}

$return_array = array();
while($row = mysqli_fetch_array($result))
 {	
	$row_array['beaconID'] = $row['beaconID'];
  	array_push($return_array, $row_array);
}
echo json_encode($return_array);
mysql_close($conn);
?>
