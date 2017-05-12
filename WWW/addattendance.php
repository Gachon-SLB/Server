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
$d=$_POST['sem'];
$cid=$_POST['courseid'];
$id=$_POST['id'];
$week=$_POST['week'];
$day=$_POST['day'];
$time=$_POST['time'];
$state=$_POST['state'];
$ye=date(y);
$query="update attendance set attendance_state=$state where semester=$d and courseNo=$cid and StudentNo=$id and week=$week and day ='$day' and Time='$time'"; 
$result=mysqli_query($conn,$query);
if(!result)
	die("invailed query: " . mysqli_error());
echo $query;
mysql_close($conn);
?>