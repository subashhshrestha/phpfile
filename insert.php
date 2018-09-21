<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'connection.php';
    createStudent();
}
function createStudent()
{
    global $connect;
    // $ui
    // $name = "Subash";   
    // $username = "subash";
    // $password="subash";
    // $email = "subash";
    $uid = $_POST["uid"];
    $name = $_POST["name"];   
    $username = $_POST["username"];
    $password=$_POST["password"];
    $email = $_POST["email"];
    $interest=$_POST["interest"];
    $query = " Insert into userinformation(id,name,username,password,email,interest) values ('$uid','$name','$username','$password','$email','$interest');";
    $flag['code']=0;
    if(mysqli_query($connect, $query)){
        $flag['code']=1;
    }
    else{
        $flag['code']=0;
    }
    // } or die (mysqli_error($connect));
    echo json_encode(array($flag));
    mysqli_close($connect);
    
}
?>