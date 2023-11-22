<?php
session_start();


include('includes/session.inc.php');

// Check if the user is not logged in and redirect to the login page
if (empty($_SESSION['adm_no'])) {
    header("Location: login.php");
    exit; // Stop execution to prevent further code execution
}

$adm_no = $_SESSION["adm_no"];
// ... (The rest of your PHP code remains the same)
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Khalifa-baba Umar and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Application Form | For Online Clearance System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../My Sofware/images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">





    <link href="../My Sofware/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../My Sofware/css/register.css" rel="stylesheet">
    <link href="../My Sofware/css/carousel.css" rel="stylesheet">
    <!-- <link href="../My Sofware/css/nav.css" rel="stylesheet"> -->
</head>
<nav class="navbar navbar-expand-md navbar-white fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">
            < Back</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    </div>
</nav>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <p class="lead">I
                    <?php echo $full_name ?> with the Adm No:
                    <?php echo $adm_no ?> is a student of
                    <?php echo $dept ?>
                    started
                    From
                </p>
            </div>

            <div class="row g-5 justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <form action="includes/apply.inc.php" method="POST" class="needs-validation"
                        enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="startDate" class="form-label">From</label>
                                <input type="date" class="form-control" id="startDate" placeholder="" value=""
                                    name="start" required>
                                <div class="invalid-feedback">
                                    Valid Date is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="end" class="form-label">To</label>
                                <input type="date" class="form-control" id="end" placeholder="" value="" name="end"
                                    required>
                                <div class="invalid-feedback">
                                    Valid End Date is required.
                                </div>
                            </div>
                            <div class="py-5 text-center">
                                <p class="lead">Please issue me clearance if there is nothing against me.
                                </p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Clinic
                                Form</label>
                            <input class="form-control" type="file" id="formFile" name="clinic_form" required>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">School Fees
                                Receipt</label>
                            <input class="form-control" type="file" id="formFile" name="fees" Required>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">School ID
                                card</label>
                            <input class="form-control" type="file" id="formFile" name="idcard" Required>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Library ID
                                card</label>
                            <input class="form-control" type="file" id="formFile" name="L_idcard" Required>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Sport ID card<span class="text-muted">
                                    (If Applicable)</span></label>
                            <input class="form-control" type="file" id="formFile" name="S_idcard">
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label" name="result">Final
                                Year
                                Result</label>
                            <input class="form-control" type="file" id="formFile" name="result" Required>
                        </div>
                        <hr class="my-4">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck3" name="agree"
                                    required>
                                <label class="form-check-label" for="invalidCheck3">I hereby declared that the above
                                    information is correct to the best of my knowledge and nothing has been altered or
                                    concealed.
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div><br>

                        <button class="w-100 btn btn-success btn-lg" type="submit" value="Register"
                            name="btnregister">Apply</button>
                    </form>
                </div>
            </div>

            <script src="../My Sofware/assets/dist/js/bootstrap.bundle.min.js"></script>

        </main>