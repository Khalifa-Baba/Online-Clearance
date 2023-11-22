<?php
session_start(); // Start the session at the beginning of your dashboard file
include('includes/session.inc.php');



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
    <meta name="author" content="Khalifa-Baba Umar, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>View Certificate | Online Clearance System</title>


    <link rel="icon" type="image/png" sizes="16x16" href="../My Sofware/images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">





    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-white sticky-top bg-white flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-12" href="#"><strong>Online Clearance</strong></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-white w-100 rounded-0 border-0" type="text" placeholder=""
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <strong><a class="nav-link px-3" href="includes/logout.inc.php">Logout</a></strong>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php" style="color: green;">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="application.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Application
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Profile Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="changepassword.php">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="complain.php">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Complains & Enquiries
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h3">Certificate</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h5>Adm No:
                                <?php echo $adm_no ?>
                            </h5>
                        </div>
                    </div>
                </div><br>

                <div class="table-responsive">
                    <iframe src="includes/generateCertificate.php" width="50%" height="500px"></iframe><br>
                    <button onclick="printCertificate()" class="btn btn-sm btn-success">Print
                        Certificate</button>

                    <script>
                        function printCertificate() {
                            window.frames[0].focus();
                            window.frames[0].print();
                        }
                    </script>
                </div>
            </main>
        </div>
    </div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/dashboard.js"></script>
</body>

</html>