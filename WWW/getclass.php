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

$ye=date("Y");
$id=$_POST["ID"];
$query="select Distinct * from `class` natural join `takes` natural join `course` natural join`instructor` where studentNo=$id and year=$ye";
$result=mysqli_query($conn,$query);
if(!$result){
            die('Invalid query :'.mysqli_error());}


$return_array = array();
while($row = mysqli_fetch_array($result))
 {	
	$row_array['time1'] = $row['time1'];
	$row_array['time2'] = $row['time2'];
	$row_array['time3'] = $row['time3'];
	$row_array['time4'] = $row['time4'];
  	$row_array['building'] = $row['buliding'];
	$row_array['classroom'] = $row['classroom'];
	$row_array['courseID'] = $row['courseID'];
	$row_array['title'] = $row['title'];
	$row_array['instructor_name'] = $row['name'];
  	array_push($return_array, $row_array);
}
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>
