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
$class=$_POST['class'];
$time=$_POST['time'];
$build=$_POST['build'];
$query="update studnet set UpdateTime='$time' where studentNo='$id'";
$query2="update studnet set classroom='$class' where studentNo='$id'";
$query3="update studnet set building='$build' where studentNo='$id'";
echo $query;
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
$result3=mysqli_query($conn,$query3);

if($result && $result2 && result3)
{
	echo "success";
}
else
{
	echo "fail";
}
mysqli_close($conn);
?>