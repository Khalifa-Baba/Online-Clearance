<?php

include('dbh.php');


session_start();

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


$file = $_FILES['picture'];
$fileName = $_FILES['picture']['name'];
$fileTmpName = $_FILES['picture']['tmp_name'];
$fileSize = $_FILES['picture']['size'];
$fileError = $_FILES['picture']['error'];
$fileType = $_FILES['picture']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 1000000) {
            $Filename = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = '../uploads/' . $Filename;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo 'The picture is too big';
        }
    } else {
        echo 'There was an error uploading your picture';
    }
} else {
    echo 'You can not upload this type of File';
}

$last_name = $_POST['last'];
$first_name = $_POST['first'];
$pwd = $_POST['pwd'];
$adm_no = $_POST['adm_no'];
$faculty = $_POST['faculty'];
$dept = $_POST['dept'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$session = $_POST['session'];


//Check if Admission number already exist

$sql = "SELECT * FROM students where adm_no='$adm_no'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { ?>
    <script>alert('Admission Number already Exist')</script>
    <?php
    header("refresh:0;url= ../login.php");
    exit();

    // $check_query = "select * from students where adm_no = adm_no";
// $stmt = $conn->prepare($check_query);
// $stmt->bind_param("s", $adm_no);
// $stmt->execute();
// $stmt->bind_result($count);
// $stmt->fetch();

    // if ($count > 0) {
//     echo "Admission Number already exist!";

} else {
    //save users details
    $sql = "INSERT INTO `students`(`surname`, `first_name`, `adm_no`, `pwd`, `faculty`, `dept`, `email`, `phone_no`, `session`, `picture`) VALUES ('$last_name', '$first_name', '$adm_no', '$pwd', '$faculty', '$dept', '$email', '$phone_no', '$session', '$Filename')";

    mysqli_query($conn, $sql);

    echo "Registration Successfully #registration.inc.php";
}

//open next page
header("refresh:1;url= ../index.php?Report=RegistrationSuccessful");
exit();

//$conn->close();