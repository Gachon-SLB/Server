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
$id=$_POST['id'];
$sid=$_POST['sid'];
$query="select * from attendance where courseNo=$sid and StudentNo=$id";
$result=mysqli_query($conn,$query);
$return_array = array();

while($row = mysqli_fetch_array($result))
{
	$row_array['Time']=$row['Time'];
	$row_array['week']=$row['week'];
	$row_array['day']=$row['day'];
	$row_array['attendance_state']=$row['attendance_state'];
	array_push($return_array, $row_array);
}
echo json_encode($return_array);
mysql_close($conn);

?>