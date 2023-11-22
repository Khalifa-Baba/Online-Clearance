<?php
// Include database connection code
include('includes/dbh.php');

if (isset($_GET['faculty'])) {
    $selectedFaculty = $_GET['faculty'];

    // Query the database to fetch departments for the selected faculty
    $query = "SELECT `department_id`,  `department_name` FROM dept WHERE `faculty_id` = ?";
    $result = mysqli_query($conn, $query);


    $departments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $departments = $row["department_name"];
    }

    // Return the department data as JSON
    header("Content-Type: application/json");
    echo json_encode($departments);
} else {
    // Handle the case when no faculty is selected
    $departments = array();
    echo json_encode($departments);
}
?>