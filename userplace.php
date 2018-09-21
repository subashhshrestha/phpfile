
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showUser();
}
function showUser()
{
	global $connect;   
    $id = $_POST["id"];
    $interest=$_POST["interest"];
  	// $id="jaLWTpoUdDhMr2ChUI9Lr1u2NIF3";
  	// $interest="religious";
	
	$query = " Select * FROM place WHERE type='$interest'; ";
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	$temp_array  = array();
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
			}
		}

	$query1="Select pid FROM userplace WHERE id='$id';";

	$result1 = mysqli_query($connect, $query1);
	
	$number_of_rows1 = mysqli_num_rows($result1);

	$temp_array1  = array();
	 
	if($number_of_rows1 > 0) {
		while ($row1 = mysqli_fetch_assoc($result1)) {
			$temp_array1[] = $row1;
		}
	}
	$count=0;

	$r = array();
		if($temp_array1==null){
	for($i=0; $i<=sizeof($temp_array)-1; $i++){

		array_push($r, $temp_array[$i]);
	}
	}
	else {
		for($z=0; $z<sizeof($temp_array); $z++){
			$count=0;
			for($a=0; $a<sizeof($temp_array1); $a++){
				$x = strcmp($temp_array[$z]['pid'], $temp_array1[$a]['pid']);
					if($x==0){
						$count++;
					}
			}
			if($count==0){
		array_push($r, $temp_array[$z]);
	}
		}
	}
	

	
	
	
	header('Content-Type: application/json');
	echo json_encode(array("user"=>$r));
	//echo json_encode(array("user"=>$temp_array));
	mysqli_close($connect);
	
}

?>
