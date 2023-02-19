<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Not connected!");
}else{
    // echo "You are connect to database successfully";
}
?>