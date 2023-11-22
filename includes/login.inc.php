<?php
include('dbh.php');

session_start(); // Start the session at the beginning

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['adm_no'] != "" || $_POST['pwd'] != "") {
    // Get user input
    $user = $_POST['adm_no'];
    $pass = $_POST['pwd'];

    // Query to check if the user exists
    $sql = "SELECT * FROM `students` WHERE adm_no='$user' AND pwd='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, perform login actions
        // Store user information in session variables
        $_SESSION['adm_no'] = $user; // Store the admission number
        // Fetch the user's first name from the database
        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['pwd'] = $row['pwd'];
        $_SESSION['faculty'] = $row['faculty'];
        $_SESSION['dept'] = $row['dept'];
        $_SESSION['pwd'] = $row['pwd'];
        $_SESSION['session'] = $row['session'];
        $_SESSION['email'] = $row['email'];
        // Store the first name
        header("Location: ../dashboard.php");
        exit();

    } else { ?>
        <script>alert('Invalid Admission No or Password');</script>
        <?php
        // User does not exist or wrong credentials
        header("refresh:0;url= ../login.php?Invalid Admission No or Password");
        exit();
    }

} else { ?>
    <script>alert('Please input your Admission No & Password');</script>
    <?php
    header("refresh:0;url= ../login.php");
    exit();
}
?>