<?php
include('dbh.php');

//Start the session if it's not already started
session_start();



date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

//unset all session variables
session_unset();



//Destroy the session
session_destroy();

//Redirect the user to a login page
header("Location: ../Staffs/staff_login.php");
exit();

?>