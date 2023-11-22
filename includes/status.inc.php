<?php

include('dbh.php');

if (empty($_SESSION['adm_no'])) {
    header("Location: ../login.php");
} else {
}

$adm_no = $_SESSION["adm_no"];


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

}

?>