<?php

include('dbh.php');


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


$sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
$results = $conn->query($sql);
$row = mysqli_fetch_array($results);

$q3 = "SELECT * FROM `students` WHERE adm_no = '$adm_no'";
$q4 = $conn->query($q3);

//Fetch Already Details from te DataBase
while ($row = mysqli_fetch_array($q4)) {
    extract($row);
    $adm_no = $row['adm_no'];
    $dept = $row['dept'];
    $last_name = $row['surname'];
    $first_name = $row['first_name'];
    $full_name = $first_name . ' ' . $last_name;
    $department = $row['dept'];
    $email = $row['email'];
    $session = $row['session'];

    $sql = "INSERT INTO `clearance_status`(`adm_no`, `name`, `dept`, `department`, `library`, `clinic`, `bursary`, `exam_office`, `student_affairs`, `sport_director`, `chief_security`, `hostel`, `session`, `date_applied`)
    VALUES ('$adm_no', '$full_name', '$dept', 0, 0, 0, 0, 0, 0, 0, 0, 0, '$session', '$date')
    ";
    if (mysqli_query($conn, $sql)) {

        // Data saved successfully
        echo "Application Successful";
        header("refresh:1;url= ../dashboard.php?Success"); // Redirect to a success page

        exit();

    } else {
        // Handle the error, e.g., display an error message
        echo "Can't Save" . mysqli_error($conn);
    }
}