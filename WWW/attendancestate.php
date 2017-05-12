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
$return_array = array();

$id=$_POST['id'];
$query="select courseID,title,week,time,day,attendance_state from attendance natural join takes natural join (select courseID,title from course) as temp where studentNo=$id order by time";
$result=mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{
	$row_array['courseid']=$row['courseID'];
  	$row_array['title']=$row['title'];
	$row_array['week']=$row['week'];
	$row_array['time']=$row['time'];
	$row_array['day']=$row['day'];
	$row_array['state']=$row['attendance_state'];
	array_push($return_array, $row_array);
 }
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>