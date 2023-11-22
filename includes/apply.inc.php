<?php
include('dbh.php');
session_start();

$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');

$start_year = $_POST['start'];
$end_year = $_POST['end'];
$application = $_POST['agree'];

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

        if ($row['application'] == 1) { ?>

            <script>alert('Already Applied!');</script>
            <?php
            header("refresh:0;url= ../dashboard.php?AlreadyApply");
        } else {
            // Update the table since the user hasn't applied yet
            uploadFiles('clinic_form', 'clinic_form');
            uploadFiles('fees', 'fees');
            uploadFiles('idcard', 'idcard');
            uploadFiles('L_idcard', 'library_idcard');
            // uploadFiles('S_idcard', 'sport_idcard');
            uploadFiles('result', 'result');

            // Update the application status in the database
            $sql = "UPDATE students SET `start_year`='$start_year', `end_year`='$end_year', `application`=1 WHERE adm_no = '$adm_no'";

            if (mysqli_query($conn, $sql)) {
                include("applied_student.inc.php");

            } else {

            }

        }
    }
}


// Handle file uploads

// Define a function to handle file uploads
function uploadFiles($inputName, $dbName)
{
    include('dbh.php');
    $adm_no = $_SESSION["adm_no"];

    // ... (the rest of your uploadFile function remains the same)
    $file = $_FILES[$inputName];
    $fileName = $_FILES[$inputName]['name'];
    $fileTmpName = $_FILES[$inputName]['tmp_name'];
    $fileSize = $_FILES[$inputName]['size'];
    $fileError = $_FILES[$inputName]['error'];
    $fileType = $_FILES[$inputName]['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf', 'docx', 'doc', 'txt', 'jpg', 'jpeg', 'png');

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
                header("refresh:1;url= ../application.php?ToBig");
            }
        } else {
            echo 'There was an error uploading your image';
            header("refresh:1;url= ../application.php?Error");
        }
    } else {
        echo 'You can not upload this type of files'; // Redirect to a success page
        header("refresh:1;url= ../application.php?FilesNull");
        exit();
    }


}
?>