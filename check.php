
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showStudent();
}
function showStudent()
{
	global $connect;   
    $username = $_POST["username"];
  
	
	$query = " Select * FROM userinformation WHERE username='$username'; ";
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	 $flag['code']=0;
	if($number_of_rows > 0) {
		 $flag['code']=1;
	}
	else{
		$flag['code']=0;
	}
	
	header('Content-Type: application/json');
	echo json_encode(array($flag));
	mysqli_close($connect);
	
}
