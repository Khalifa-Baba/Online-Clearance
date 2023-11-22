<?php

include('dbh.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
// require 'vendor/autoload.php';

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';



session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['username'] != "") {
    // Get user input
    $username = $_POST['username'];

    //Select the Staff email address
    $new = "SELECT `email` FROM `clearance_officers` WHERE `username`='$username'";
    $email = $conn->query($new);


    // Query to check if Username exists (edit choose-from-staff)
    $sql = "SELECT * FROM `clearance_officers` WHERE `username`='$username'";
    $result = $conn->query($sql);

    // Fetch the result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate a new password or retrieve it from the database as needed
            $newPassword = generateNewPassword(); // Implement your password generation logic here



            // Send the new password to the user's email address
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'udusonlineclearance@gmail.com'; // Replace with your email
                $mail->Password = 'mamxhuykhmfbhkwk'; // Replace with your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use TLS encryption
                $mail->Port = 465; // Your SMTP port

                //Recipients
                $mail->setFrom('udusonlineclearance@gmail.com');
                $mail->addAddress($email); //Add a recipient
                // $mail->addAddress('Usmanu Danfodiyo Univwer'); //Name is optional
                // $mail->addReplyTo('udusonlineclearance@gmail.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');


                $mail->isHTML(true);
                $mail->Subject = 'Password Reset';
                $mail->Body = 'Your new password is: ' . $newPassword;

                $mail->send();

                echo "A new password has been sent to your email address. Please check your email.";

                // Update the database with the new password
                $sqlUpdate = "UPDATE `clearance_officers` SET `pwd`='$newPassword' WHERE username='$username'";
                $conn->query($sqlUpdate);

                header("refresh:1;url= ../login.php");
                exit();



            } catch (Exception $e) {
                echo "Message could not be sent nor Password reset. Mailer Error: {$mail->ErrorInfo}. Please contact Admin for further assist.";
            }
        }
    } else { ?>
        <script>alert('Invalid Username');</script>
        // User does not exist or wrong credentials
        <?php
        header("refresh:0;url= ../Staffs/staff_forgetpassword.php?InvalidUsername");
        exit();
    }
} else { ?>
    <script>
        alert('Please input your Email');
    </script>
    <?php
    header("refresh:0;url= ../staff_forgetpassword.php?InvalidEmail");
    exit();

}

function generateNewPassword($length = 12)
{
    // Implement your password generation logic here
    // For example, you can use random characters or a combination of letters and numbers.
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWQYZ!@#$^&*';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }
    return $password;
}
?>