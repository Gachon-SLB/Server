

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
$id=$_POST['id'];
$sel=$_POST['sel'];
if($sel==2)
{
//학번으로 찾기
	$query="select studentNo,name,dept_name from studnet where studentNo=$id";
}
if($sel==1)
{
//이름으로 찾기 
	$query="select studentNo,name,dept_name  from studnet where name='$id'";
}
if($sel==3)
{
//학과로 찾기 
	$query="select studentNo,name,dept_name  from studnet where dept_name='$id'";
}
$result=mysqli_query($conn,$query);
$return_array = array();
while($row = mysqli_fetch_array($result))
{	
	$row_array['No'] = $row['studentNo'];
  	$row_array['name'] = $row['name'];
	$row_array['dept_name'] = $row['dept_name'];
  	array_push($return_array, $row_array);
}
echo json_encode($return_array,JSON_UNESCAPED_UNICODE);
mysql_close($conn);
?>