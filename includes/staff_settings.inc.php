<?php
include('dbh.php');
session_start();
$username = $_SESSION['username'];
$date = date('Y-m-d H:i:s');




if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit; // Stop execution to prevent further code execution
} else {
    // Check if Applied 
    $sql = "SELECT * FROM `clearance_officers` WHERE username ='$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);


    $q = "SELECT * FROM `clearance_officers` WHERE username = '$username'";
    $q1 = $conn->query($q);
    while ($row = mysqli_fetch_array($q1)) {
        extract($row);
        $db_pass = $row['pwd'];
        $department = $row['department'];
        $email = $row['email'];
        $job = $row['job_title'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];


        if (isset($_POST["save"])) {

            $old = mysqli_real_escape_string($conn, $_POST['txtold_password']);
            $pass_new = mysqli_real_escape_string($conn, $_POST['txtnew_password']);
            $confirm_new = mysqli_real_escape_string($conn, $_POST['txtconfirm_password']);


            if ($db_pass != $old) { ?>
                <?php $_SESSION['error'] = 'Old Password not matched'; ?>
                <script>
                    alert('OLD Paasword not matched');
                </script>
                <?php header("refresh:0;url= ../Staffs/settings.php"); ?>
            <?php } else if ($pass_new != $confirm_new) { ?>
                <?php $_SESSION['error'] = 'NEW Password and CONFIRM password not Matched'; ?>
                    <script>
                        alert('NEW Password and CONFIRM password not Matched');
                    </script>
                <?php header("refresh:0;url= ../Staffs/settings.php"); ?>
            <?php } else {
                //$pass = md5($_POST['password']);
                $sql = "update  clearance_officers set `pwd`='$confirm_new' where username= '" . $_SESSION['username'] . "'";
                $res = $conn->query($sql);

                echo 'Password changed Successfully...';
                header("refresh:2;url= ../Staffs/staff_login.php");
            }
        }

    }
}


?>