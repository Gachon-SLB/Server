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

$id=$_POST["id"];
$beaconid=$_POST["beaconid"];

date_default_timezone_set("Asia/Seoul");
$time=date("m-d H:i:s");

$query="select building,location from nbeacon where beaconID=$beaconid";
$result=mysqli_query($conn,$insert);
while($row = mysqli_fetch_array($result))
{
	$bu=row['building];
	$cla=row['classroom'];
}

$insert="update studnet set building=$bu, classroom=$cla, updateTime=$time where studentNo=$id;
if(!mysqli_query($conn,$insert)){
            die('Invalid query :'.mysqli_error());}
mysql_close($conn);
?>
