
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showUser();
}
function showUser()
{
	global $connect;   
    $id = $_POST["id"];
  	// $id="jaLWTpoUdDhMr2ChUI9Lr1u2NIF3";
	
	$query = " Select * FROM userinformation WHERE id='$id'; ";
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	 
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
		}
	
	
	header('Content-Type: application/json');
	echo json_encode(array("user"=>$temp_array));
	mysqli_close($connect);
	
}
?>
