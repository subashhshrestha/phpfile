
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showStudent();
}
function showStudent()
{
	global $connect;   
 	$max=0;
	for($i=1;$i<=31;$i++){
		if($i!=7){
		$pid=1000+$i;
	
	$query = " Select pid,rating FROM rating where pid='p".$pid."'; ";
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	$rating=0;
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
			$pid=$row['pid'];
			$rating=$rating+$row['rating'];
	}}
	$average=$rating/sizeof($temp_array);
	$arrayName = array('rating'=>$average,'pid' => $pid);
	$temp[]=$arrayName;
		}
	}
	rsort($temp);
	// ------------------
	
	$query1 = " Select * FROM place;";
	$result1 = mysqli_query($connect, $query1);
	$number_of_rows1 = mysqli_num_rows($result1);
	$temp_array1  = array();
	if($number_of_rows1 > 0) {
		
		while ($row1 = mysqli_fetch_assoc($result1)) {
			$temp_array1[] = $row1;
			}
		}
		$r = array();
		for($i=0;$i<5;$i++){
			for($j=0;$j<=(sizeof($temp_array1));$j++){
			if(($temp[$i]['pid'])==($temp_array1[$j]['pid'])){
				array_push($r, $temp_array1[$j]);
				break;
			}
			}
			// echo($temp_array1[$i]['pid']);
			// echo("<br>");
		}

	header('Content-Type: application/json');
		echo json_encode(array("user"=>$r));
	mysqli_close($connect);
	

}
?>