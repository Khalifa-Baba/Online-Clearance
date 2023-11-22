<?php
session_start(); // Start the session at the beginning of your dashboard file
if (empty($_SESSION['username'])) {
    header("Location: login.php?Errordashboard");
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
    <title>Manage Department | Online Clearance System</title>


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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><strong>System Admin</strong></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder=""
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <strong><a class="nav-link px-3" href="logout.php">Logout</a></strong>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" aria-expanded="true"
                                data-bs-target="#forms-collapse" aria-controls="forms-collapse">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Manage faculties & Departments
                            </a>
                            <ul class="list-unstyled ps-3 collapse show" id="forms-collapse" style="">
                                <li><a class="nav-link align-text-bottom" href="faculty.php">
                                        <span data-feather="file" class="align-text-bottom"></span>Manage Faculties</a>
                                </li>
                                <li><a class="nav-link align-text-bottom" href="#"><span data-feather="file"
                                            class="align-text-bottom"></span>Manage Department</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="officers.php">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Manage Clearance Officers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="students.php"><span data-feather="users"
                                    class="align-text-bottom"></span>Students List</a>
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
                    <h3 class="h3">Departments Management</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h5>Admin</h5>
                        </div>
                    </div>
                </div><br>

                <h6>Add New Department</h6><br>

                <div class="panel-body">
                    <form method="post" class="addFaculty" role="form" class="needs-validation">
                        <input type="hidden" name="action" value="addFaculty">
                        <div class="col-6">
                            <label class="form-label">Faculty</label>
                            <select class="form-select" id="faculty_id" name="faculty">
                                <option value="">Select Faculty</option>
                                <?php
                                include('../includes/dbh.php');
                                // Query the database to fetch for the faculty
                                $sql = "SELECT * FROM `faculties`";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['faculty_id'] ?>">
                                        <?php echo $row['faculty_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div><br>
                        <div class="col-6">
                            <label class="form-label">Department Name</label>
                            <input type="text" name="faculty_name" id="faculty_name" class="form-control">
                        </div><br>
                        <button type="submit" class="btn btn-sm btn-success pull-left m-t-n-xs">
                            Add Department</button>
                    </form>
                    <hr>
                </div><br>

                <h6>Remove Existing Department</h6><br>
                <div class="col-10">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Department Name</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../includes/dbh.php');
                                // Query the database to fetch for the faculty
                                $sql = "SELECT * FROM `departments`";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $row['department_id'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['department_name'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $faculty_id = $row['faculty_id'];
                                            $sql1 = "SELECT * FROM `faculties` WHERE faculty_id =  $faculty_id";
                                            $results = mysqli_query($conn, $sql1);
                                            $rows = mysqli_fetch_assoc($results);
                                            echo $rows['faculty_name'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['date_created'] ?>
                                        </td>
                                        <td><button type="submit" class="btn btn-sm btn-success">Remove</button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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