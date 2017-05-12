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



$insert="insert into `nbeacon` (`location`,`beaconID`) values ('".$_POST["location"]."','".$_POST["ID"]."')";
if(!mysqli_query($conn,$insert)){
            die('Invalid query :'.mysqli_error());}
mysql_close($conn);
?>
