<?php
session_start(); // Start the session at the beginning of your dashboard file
include('../includes/staff_session.inc.php');

if (empty($_SESSION['username'])) {
    header("Location: staff_login.php?Errordashboard");
    exit();

} else {
    $username = $_SESSION['username'];

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Khalifa-Baba Umar, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Cleared Students | Online Clearance System</title>


    <link rel="icon" type="image/png" sizes="16x16" href="../images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">





    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-white sticky-top bg-white flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><strong>Clearance Staff
                Account</strong></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-white w-100 rounded-0 border-0" type="text" placeholder=""
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <strong><a class="nav-link px-3" href="../includes/staff_logout.inc.php">Logout</a></strong>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="staff_dashboard.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="uncleared_student.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Uncleared Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cleared_student.php">
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
                                CLeared Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_record.php">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Students' Record
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="h3">Cleared Students</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h5>
                                <?php echo $job_title ?>
                            </h5>
                        </div>
                    </div>
                </div><br>

                <h5>Student List</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Student's Name</th>
                                <th scope="col">Adm No</th>
                                <th scope="col">Department</th>
                                <th scope="col">Session</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            include('../includes/dbh.php');
                            // Query the database to fetch for the clearance Status
                            $sql = "SELECT * FROM `clearance_status`";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <?php if ($row[$department] == "1"): ?>
                                    <tr>
                                        <td>
                                            <?php
                                            $adm_no = $row['adm_no'];
                                            $sql1 = "SELECT * FROM `students` WHERE adm_no = $adm_no";
                                            $results = mysqli_query($conn, $sql1);
                                            $rows = mysqli_fetch_assoc($results) ?>
                                            <img src="../uploads/<?php echo $rows['picture'] ?>" alt="image" width="30"
                                                height="30" class="img-circle" />
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['adm_no'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['dept'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['session'] ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                <?php endif; ?>
                            <?php } ?>

                            <script src="AJAX.js"></script>
                            </select>
                        </tbody>
                    </table>

                </div>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>