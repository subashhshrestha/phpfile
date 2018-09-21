<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'connection.php';
    createStudent();
}
function createStudent()
{
    global $connect;
    
    $uid = $_POST["uid"];   
    $pid = $_POST["pid"];
    $rating=$_POST["rating"];
    $query = "Insert into rating(uid,pid,rating) values ('$uid','$pid','$rating');";
    mysqli_query($connect, $query) or die (mysqli_error($connect));
    mysqli_close($connect);
    
}
?>