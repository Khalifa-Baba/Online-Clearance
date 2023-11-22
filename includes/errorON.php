<?php
session_start(); // Start the session

function setError($errorMessage)
{
    $_SESSION['error'] = $errorMessage;
}

function setSuccess($successMessage)
{
    $_SESSION['success'] = $successMessage;
}

// Check for an error condition
if ($errorCondition) {
    // Set an error message in the session
    setError("An error occurred. Please try again.");
} else {
    // Set a success message in the session
    setSuccess("Success! Your request has been processed.");
    header("Location: success_page.php");
    exit();
}
?>
<?php $_SESSION['error'] = 'Old Password not matched'; ?>
<script>
    alert('OLD Paasword not matched');
</script>