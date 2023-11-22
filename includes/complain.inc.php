<?php
include('dbh.php');
session_start();
$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');




if (empty($_SESSION['adm_no'])) {
    header("Location: login.php");
    exit; // Stop execution to prevent further code execution
} else {


    if (isset($_POST["submit"])) {

        $sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);

        $q = "SELECT * FROM `students` WHERE adm_no = '$adm_no'";
        $q1 = $conn->query($q);

        //Fetch Already Details from te DataBase
        while ($row = mysqli_fetch_array($q1)) {
            extract($row);
            $last_name = $row['surname'];
            $first_name = $row['first_name'];
            $full_name = $first_name . ' ' . $last_name;
            $email = $row["email"];
            $adm_no = $_SESSION["adm_no"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
        }


        $sql = "INSERT INTO `complains`(`adm_no`, `fullname`, `email`, `subject`, `message`, `date`) VALUES ('$adm_no', '$full_name', '$email', '$subject', '$message', '$date')";
        mysqli_query($conn, $sql);

        echo "Successfully Sent";
        header("refresh:1;url= ../complain.php");
        exit();

    } else { ?>
        <script>alert('Message could not be sent.');</script>
        <?php
        header("refresh:0;url= ../complain.php");
    }
}