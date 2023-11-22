<?php

include('dbh.php');
session_start();
$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');

if (empty($adm_no)) {
    header("Location: ../login.php?Not in Session");
    exit();
} else {


    $sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    date_default_timezone_set('Africa/Lagos');
    $current_date = date('Y-m-d ');

    $q = "SELECT * FROM `students` WHERE adm_no = '$adm_no'";
    $q1 = $conn->query($q);
    while ($row = mysqli_fetch_array($q1)) {
        extract($row);
        $db_pass = $row['pwd'];
        $adm_no = $row['adm_no'];
        // $firstname = $row['firstname'];
        // $lastname = $row['surname'];
        // $fullname = $firstname . " " . $lastname;


        if (isset($_POST["btnchange"])) {
            $old = mysqli_real_escape_string($conn, $_POST['txtold_password']);
            $pass_new = mysqli_real_escape_string($conn, $_POST['txtnew_password']);
            $confirm_new = mysqli_real_escape_string($conn, $_POST['txtconfirm_password']);


            if ($db_pass != $old) { ?>
                <?php $_SESSION['error'] = 'Old Password not matched'; ?>
                <script>
                    alert('OLD Paasword not matched');
                </script>
                <?php header("refresh:0;url= ../changepassword.php"); ?>
            <?php } else if ($pass_new != $confirm_new) { ?>
                <?php $_SESSION['error'] = 'NEW Password and CONFIRM password not Matched'; ?>
                    <script>
                        alert('NEW Password and CONFIRM password not Matched');
                    </script>
                <?php header("refresh:0;url= ../changepassword.php"); ?>
            <?php } else {
                //$pass = md5($_POST['password']);
                $sql = "update  students set `pwd`='$confirm_new' where adm_no= '" . $_SESSION['adm_no'] . "'";
                $res = $conn->query($sql);

                echo 'Password changed Successfully...';
                // header("refresh:2;url= ../login.php");
                include_once("logout.inc.php");


            }
        }
    }
}


?>