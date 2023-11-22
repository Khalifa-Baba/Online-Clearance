<?php

include('dbh.php');
include('dbh2.php');

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

$adm_no = $_SESSION["adm_no"];

$sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

$q = "SELECT * FROM `students` WHERE adm_no = '$adm_no'";
$q1 = $conn->query($q);

//Fetch Already Details from te DataBase
while ($row = mysqli_fetch_array($q1)) {
    extract($row);
    $db_pass = $row['pwd'];
    $adm_no = $row['adm_no'];
    $dept = $row['dept'];
    $last_name = $row['surname'];
    $first_name = $row['first_name'];
    $full_name = $first_name . ' ' . $last_name;
    $department = $row['dept'];
    $faculty = $row['faculty'];
    $picture = $row['picture'];
    $email = $row['email'];
    $phone_no = $row['phone_no'];
    $session = $row['session'];
}