<?php
// Connect to the database 
require 'connectDB.php';

$email = $_GET['email'];

$sql = "SELECT COUNT(PASSWORD) FROM usuarios WHERE EMAIL = '$email'";
$query_run = mysqli_query($conexion, $sql);
$count = mysqli_fetch_row($query_run)[0];

if($count > 0){
    
    $response = [
        "status"=> "success",
        "message"=> "Email Found Successfully"
    ];
}else{
    $response = [
        "status"=> "error",
        "message"=> "Email not founded"
    ];
}

echo json_encode($response);

?>