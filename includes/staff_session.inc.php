<?php

include('dbh.php');


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

$username = $_SESSION["username"];

$sql = "SELECT * FROM `clearance_officers` WHERE username ='$username'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

$q = "SELECT * FROM `clearance_officers` WHERE username = '$username'";
$q1 = $conn->query($q);

//Fetch Already Details from te DataBase
while ($row = mysqli_fetch_array($q1)) {
    extract($row);
    $id = $row['id'];
    $email = $row['email'];
    $department = $row['department'];
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $full_name = $first_name . ' ' . $last_name;
    $job_title = $row['job_title'];
}