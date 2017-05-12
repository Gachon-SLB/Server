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

$myid=$_POST['myid'];
$id=$_POST['id'];

$insert="insert into Friend values ($myid,$id)";
$row=mysqli_query($conn,$insert);
echo "success";
mysql_close($conn);
?>