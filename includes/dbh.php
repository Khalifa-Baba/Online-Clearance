<?php

$servername = "localhost"; //The MySQL server hostname
$username = "root"; //My MySQL Username
$password = ""; //My MySQL Password
$dbname = "online_clearance"; //Name of my Database

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);




//check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connection dbh.php Successfully";

//Close the connection when done
//$conn->close();
?>