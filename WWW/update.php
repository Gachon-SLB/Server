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
$id=$_POST["ID"];
$time=$_POST["time"];


$update="update `classbeacon` set updatetime='$time' where beaconID='$id'";
if(!mysqli_query($conn,$update)){
            die('Invalid query :'.mysqli_error());}
mysql_close($conn);


?>
