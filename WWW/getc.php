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
$build=$_POST["build"];
$class=$_POST["class"];
$time=$_POST["time"];
$day=$_POST["day"];
$query="select * from course,(select * from time_slot , (select * from class where buliding ='$build' and classroom = '$class') as temp 
where (time_slot_id = temp.time1 or time_slot_id = temp.time2 or time_slot_id = temp.time3 or time_slot_id = temp.time4) and day = '$day' and '$time' >= startTime and '$time' <= endTime) as temp2 where
temp2.courseID = course.courseID";
$result=mysqli_query($conn,$query);
$return_array = array();
while($row = mysqli_fetch_array($result))
 {
  	$row_array['courseID']=$row['courseID'];
	$row_array['title']=$row['title'];
	$row_array['time1']=$row['time1'];
	$row_array['time2']=$row['time2'];
	$row_array['time3']=$row['time3'];
	$row_array['time4']=$row['time4'];
	$row_array['dept_name']=$row['dept_name'];
	array_push($return_array, $row_array);
 }
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>
