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
    $sql = "SELECT * FROM `clearance_officers` WHERE `username` = '$username' AND `pwd` = '$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, perform login actions
        // Store user information in session variables
        $_SESSION['username'] = $username; // Store the username
        // Fetch the user's first name from the database
        $row = $result->fetch_assoc();

        $_SESSION['job_tittle'] = $row['job_tittle'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['pwd'] = $row['pwd'];

        echo "Sign in Successful";
        header("Location: ../Staffs/staff_dashboard.php?Success");
        exit();
    } else { ?>
        <script>alert('Invalid Username or Password');</script>
        // User does not exist or wrong credentials
        <?php
        header("refresh:0;url= ../Staffs/staff_login.php?Invalid Username or Password");
        exit();
    }

} else { ?>
    <script>alert('Please input your Username & Password');</script>
    // User does not exist or wrong credentials
    <?php
    header("refresh:0;url= ../Staffs/staff_login.php?Invalid Username or Password");
}
?>