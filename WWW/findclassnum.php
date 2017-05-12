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

$times = mktime();
$date=date("Y-m-d G-i-s",$times-600);
$id=$_POST['id'];
$classroom=$_POST['class'];
$building=$_POST['build'];

$query="select classroom,count(classroom) 
from studnet
where studentNo in (select Distinct studentNo from (select studentNo from Friend)as temps natural join studnet where studentNo in  
(select F_studentNo from Friend where studentNo=$id))
and classroom=$classroom and building=$building and Updatetime>$date
group by classroom";

$result=mysqli_query($conn,$query);
$return_array = array();

while($row = mysqli_fetch_array($result))
{
	$row_array['fclass'] = $row['classroom'];
	$row_array['fcount'] = $row['count(classroom)'];
	array_push($return_array, $row_array);
}
$query2="select classroom,count(classroom) 
from studnet
where classroom=$classroom and building=$building and Updatetime>$date
group by classroom";
$return_array2 = array();
$result2=mysqli_query($conn,$query2);
while($row = mysqli_fetch_array($result2))
{
	$row_array2['class'] = $row['classroom'];
	$row_array2['count'] = $row['count(classroom)'];
	array_push($return_array2, $row_array2);
}


echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
echo "@#";
echo json_encode($return_array2,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>