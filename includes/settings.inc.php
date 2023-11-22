<?php
include('dbh.php');
session_start();
$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');




if (empty($_SESSION['adm_no'])) {
    header("Location: login.php");
    exit; // Stop execution to prevent further code execution
} else {
    // Check if Applied 
    if (isset($_POST["update"])) {
        uploadFile('picture', 'picture');

        echo 'Image Updated';
        header("refresh:1;url= ../settings.php?Updated"); // Redirect to a success page
        exit();
    }
    if (isset($_POST["save"])) {

        post('first', 'first_name');
        post('last', 'surname');
        post('email', 'email');
        post('number', 'phone_no');
        post('session', 'session');

        echo 'Settings Saved';
        header("refresh:1;url= ../profile.php?Succes"); // Redirect to a success page
        exit();
        //checking if the file has been successfully uploaded
    }
}

// Handle file uploads
function post($value, $dbValue)
{
    include('dbh.php');
    $adm_no = $_SESSION["adm_no"];
    $Value = $_POST[$value];

    if (empty($Value)) {
        $sql = "";

    } else {
        $sql = "UPDATE students SET `$dbValue`='$Value' WHERE adm_no = '$adm_no'";
        mysqli_query($conn, $sql);
        // Data saved successfully

    }

}
// Define a function to handle file uploads
function uploadFile($inputName, $dbName)
{
    include('dbh.php');


    $adm_no = $_SESSION["adm_no"];

    $file = $_FILES[$inputName];
    $fileName = $_FILES[$inputName]['name'];
    $fileTmpName = $_FILES[$inputName]['tmp_name'];
    $fileSize = $_FILES[$inputName]['size'];
    $fileError = $_FILES[$inputName]['error'];
    $fileType = $_FILES[$inputName]['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 100000000000) {
                $Filename = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/' . $Filename;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "UPDATE students SET `$dbName`= '$Filename' WHERE adm_no = '$adm_no'";
                mysqli_query($conn, $sql);
            } else {
                echo 'The image is too big';
                header("refresh:1;url= ../settings.php?Updated");
            }
        } else {
            echo 'There was an error uploading your image';
            header("refresh:1;url= ../settings.php?Updated");
        }
    } else {
        echo 'Your picture is empty or not supported image type';
        header("refresh:1;url= ../settings.php?Updated");
        exit();
    }

}
?>