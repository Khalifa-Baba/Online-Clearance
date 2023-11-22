<?php
session_start();
include('includes/profile.inc.php');

// Check if the user is not logged in and redirect to the login page
if (empty($_SESSION['adm_no'])) {
    header("Location: login.php");
    exit; // Stop execution to prevent further code execution
}

$adm_no = $_SESSION["adm_no"];

// ... (The rest of your PHP code remains the same)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Khalifa-Baba Umar, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile Page | Online Clearance System</title>


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
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
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
                            <a class="nav-link" href="#">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <span data-feather="layers" class="align-text-bottom"></span>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file-text align-text-bottom"
                                    aria-hidden="true">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                Complains & Enquiries
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h3">Profile</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h5>Admission No:
                                <?php echo $adm_no ?>
                            </h5>
                        </div>
                    </div>
                </div><br>
                <div class="profile-element"> <span>
                        <img src="uploads/<?php echo $picture; ?>" alt="image" width="142" height="153"
                            class="img-circle" />
                    </span>
                </div><br>
                <div>
                    <h6>Name:
                        <?php echo $fullname; ?>
                    </h6><br>
                    <h6>Faculty:
                        <?php echo $faculty; ?>
                    </h6><br>
                    <h6>Department:
                        <?php echo $department; ?>
                    </h6><br>
                    <h6>Email:
                        <?php echo $email; ?>
                    </h6><br>
                    <h6>Phone Number:
                        <?php echo $phone_no; ?>
                    </h6><br>
                    <h6>Session:
                        <?php echo $session; ?>
                    </h6><br>
                </div>
            </main>
        </div>
    </div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>