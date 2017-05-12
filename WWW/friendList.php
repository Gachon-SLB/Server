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

$id=$_POST["ID"];
$return_array = array();
$query="select name,studentNo from studnet where name=(select name from studnet where studentNo=(select F_studentNo from Friend where studentNo=$id))";
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
  {
  	$row_array['name']=$row['name'];
	$row_array['studentNo']=$row['studentNo'];
	array_push($return_array, $row_array);
  }
$query="select name,studentNo from studnet where name=(select name from studnet where studentNo=(select studentNo from Friend where F_studentNo=$id))" ;
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
  {
  	$row_array['name']=$row['name'];
	$row_array['studentNo']=$row['studentNo'];
	array_push($return_array, $row_array);
  }
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>