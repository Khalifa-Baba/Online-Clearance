<?php

include('dbh.php');
include('dbh2.php');

session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_POST['username'] != "" || $_POST['pwd'] != "") {
    // Get user input
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // Query to check if user exists
    $sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `pwd` = '$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, perform login actions
        // Store user information in session variables
        $_SESSION['username'] = $username; // Store the username
        // Fetch the user's first name from the database
        $row = $result->fetch_assoc();

        $_SESSION['role'] = $row['role'];
        $_SESSION['pwd'] = $row['pwd'];

        echo 'Login Successful';
        header("refresh:1;url= ../Admin/dashboard.php?Success");
        exit();
    } else {
        // User does not exist or wrong credentials
        echo "Invalid Adm NO or Password";
        header("refresh:2;url= ../Admin/login.php?Invalid Username or Password");
        exit();
    }

} else {
    echo "Please input your Username & Password";
    exit();
}
?>