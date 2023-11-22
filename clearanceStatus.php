<?php
include('includes/dbh.php');


$adm_no = $_SESSION["adm_no"];
$date = date('Y-m-d H:i:s');


if (empty($_SESSION['adm_no'])) {
    header("Location: ../login.php");
    exit; // Stop execution to prevent further code execution
} else {
    $sql = "SELECT * FROM `students` WHERE `adm_no` = '$adm_no'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['application'] != 1) {

            $departmentStatus = 'Not Applied';

            $libraryStatus = 'Not Applied';

            $clinicStatus = 'Not Applied';

            $bursaryStatus = 'Not Applied';

            $examOfficeStatus = 'Not Applied';

            $studentAffairsStatus = 'Not Applied';

            $sportDirectorStatus = 'Not Applied';

            $chiefSecurityStatus = 'Not Applied';

            $hostelStatus = 'Not Applied';

        } else {

            $sql = "SELECT * FROM `clearance_status` WHERE `adm_no` = '$adm_no'";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row['department'] == 1) {
                    $departmentStatus = 'Cleared';

                } else {
                    //Not Applied
                    $departmentStatus = 'Pending';
                }
                if ($row['library'] == 1) {
                    $libraryStatus = 'Cleared';

                } else {
                    //Not Applied
                    $libraryStatus = 'Pending';
                }
                if ($row['clinic'] == 1) {
                    $clinicStatus = 'Cleared';

                } else {
                    //Not Applied
                    $clinicStatus = 'Pending';
                }
                if ($row['bursary'] == 1) {
                    $bursaryStatus = 'Cleared';

                } else {
                    //Not Applied
                    $bursaryStatus = 'Pending';
                }
                if ($row['exam_office'] == 1) {
                    $examOfficeStatus = 'Cleared';

                } else {
                    //Not Applied
                    $examOfficeStatus = 'Pending';
                }
                if ($row['student_affairs'] == 1) {
                    $studentAffairsStatus = 'Cleared';

                } else {
                    //Not Applied
                    $studentAffairsStatus = 'Pending';
                }
                if ($row['sport_director'] == 1) {
                    $sportDirectorStatus = 'Cleared';

                } else {
                    //Not Applied
                    $sportDirectorStatus = 'Pending';
                }
                if ($row['chief_security'] == 1) {
                    $chiefSecurityStatus = 'Cleared';

                } else {
                    //Not Applied
                    $chiefSecurityStatus = 'Pending';
                }
                if ($row['hostel'] == 1) {
                    $hostelStatus = 'Cleared';
                } else if ($row['hostel'] == 2) {
                    $hostelStatus = 'No Record';
                } else {
                    //Not Applied
                    $hostelStatus = 'Pending';
                }

            }

            // // if ($row['department'] && $row['library'] && $row['clinic'] && $row['bursary'] && $row['exam_office'] && $row['student_affairs'] && $row['sport_director'] && $row['chief_security'] && $row['hostel'] == 1 || 2) {
            // //     $sql = "UPDATE `students` SET `clearanceStatus`= '1'  WHERE adm_no = '$adm_no'";
            // //     mysqli_query($conn, $sql);
            // }
            // if ($row['department'] || $row['library'] || $row['clinic'] || $row['bursary'] || $row['exam_office'] || $row['student_affairs'] || $row['sport_director'] || $row['chief_security'] || $row['hostel'] == 0) {
            //     $sql1 = "UPDATE `students` SET `clearanceStatus`= '0'  WHERE adm_no = '$adm_no'";
            //     mysqli_query($conn, $sql1);
            // } else if ($row['department'] && $row['library'] && $row['clinic'] && $row['bursary'] && $row['exam_office'] && $row['student_affairs'] && $row['sport_director'] && $row['chief_security'] && $row['hostel'] == 1 || 2) {
            //     $sql = "UPDATE `students` SET `clearanceStatus`= '1'  WHERE adm_no = '$adm_no'";
            //     mysqli_query($conn, $sql);
            // }
            //     else {
            //         $sql1 = "UPDATE `students` SET `clearanceStatus`= '1'  WHERE adm_no = '$adm_no'";
            //         mysqli_query($conn, $sql1);
            //     }
        }
    }
}

?>