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
    <title>Manage Officers | Online Clearance System</title>


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
                                <li><a class="nav-link align-text-bottom" href="department.php"><span
                                            data-feather="file" class="align-text-bottom"></span>Manage Department</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
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
                    <h3 class="h3">Clearance Officers</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <h5>Admin</h5>
                        </div>
                    </div>
                </div><br>

                <h6>Add New Clearance Officer</h6><br>
                <div class="panel-body">
                    <form method="post" class="addFaculty" role="form" class="needs-validation">
                        <div class="col-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" name="first"
                                required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" name="last"
                                required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                            <div class="col-12">
                                <label class="form-label">Department/Office</label>
                                <select class="form-select" id="office_id" name="office">
                                    <option value="">Select Department/Office</option>
                                    <option value="">department</option>
                                    <option value="">library</option>
                                    <option value="">clinic</option>
                                    <option value="">bursary</option>
                                    <option value="">exam_office</option>
                                    <option value="">student_affairs</option>
                                    <option value="">sport_director</option>
                                    <option value="">chief_security</option>
                                    <option value="">hostel</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="*****@udusok.edu.ng"
                                    name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="username" placeholder="" name="username"
                                        required>
                                    <div class="invalid-feedback">
                                        Username is required!
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">password</label>
                                <div class="input-group has-validation">
                                    <input type="password" class="form-control" id="password" placeholder="**********"
                                        name="pwd" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid password.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="job_title" class="form-label">Job Title</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="job_title"
                                        placeholder="**** Clearance Office" name="job_title" required>
                                    <div class="invalid-feedback">
                                        Enter Job Title
                                    </div>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-sm btn-success pull-left m-t-n-xs">
                                Add Officer</button>
                    </form>
                    <hr>
                </div><br>

                <h6>Remove Existing Clearance Officer</h6><br>
                <div class="col-10">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Department/Office</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Job Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../includes/dbh.php');
                                // Query the database to fetch for the faculty
                                $sql = "SELECT * FROM `clearance_officers`";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $row['id'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['username'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['department'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['email'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $row['job_title'] ?>
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