<?php
session_start(); // Start the session

if (isset($_SESSION['error'])) {
    // Display the error message
    echo '<div style="color: red; font-weight: bold;">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Clear the error message
}

if (isset($_SESSION['success'])) {
    // Display the success message
    echo '<div style="color: green; font-weight: bold;">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']); // Clear the success message
}
?>