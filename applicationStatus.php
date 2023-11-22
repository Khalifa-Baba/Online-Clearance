<?php
include('includes/dbh.php');


$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');

$applicationStatus;

if (empty($_SESSION['adm_no'])) {
    header("Location: ../login.php");
    exit; // Stop execution to prevent further code execution
} else {
    // Query for application
    $sql = "SELECT * FROM `students` WHERE `adm_no` = '$adm_no'";
    $result = mysqli_query($conn, $sql);

    // Check if the user has already applied
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['application'] == 1) {
            //Applied
            $application = 'Confirmed';
            if ($row['clearanceStatus'] == 1) {
                //Confirmed
                $status = 'Completed';
                $certificate = 'Ready';
            } else {
                //Pending
                $status = 'In Progress';
                $certificate = 'Pending';
            }
        } else {
            //Not Applied
            $application = 'Not Applied';
            $status = 'Waiting for Application';
            $certificate = 'Not Applied';


        }
    }
}

?>