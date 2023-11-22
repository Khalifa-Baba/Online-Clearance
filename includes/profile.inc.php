<?php

include('dbh.php');


if (empty($_SESSION['adm_no'])) {
    header("Location: ../login.php");
} else {


    $adm_no = $_SESSION["adm_no"];


    $sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    $adm_no = $row['adm_no'];
    $firstname = $row['first_name'];
    $lastname = $row['surname'];
    $fullname = $firstname . " " . $lastname;
    $department = $row['dept'];
    $faculty = $row['faculty'];
    $picture = $row['picture'];
    $email = $row['email'];
    $phone_no = $row['phone_no'];
    $session = $row['session'];

    date_default_timezone_set('Africa/Lagos');
    $current_date = date('Y-m-d ');
}
?>