<?php
header("Content-Type:text/html;charset=utf-8"); 

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
$id=$_POST['ID'];
$query="select distinct * from classbeacon natural join (select distinct courseID,buliding,classroom from class natural join takes where studentNo='$id') as temp";
$result=mysqli_query($conn,$query);
$return_array = array();

while($row = mysqli_fetch_array($result))
{
	$row_array['buliding']=$row['buliding'];
	$row_array['classroom']=$row['classroom'];
	$row_array['beaconID']=$row['beaconID'];
	array_push($return_array, $row_array);
}
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);

?>
