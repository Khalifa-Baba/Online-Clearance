<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Khalifa-baba Umar and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Registration Form | For Online Clearance System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../My Sofware/images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <script src="Js/jQuery.js"></script>




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
        <a class="navbar-brand" href="https://www.udusok.edu.ng">Main</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
            <a class="navbar-brand d-flex" href="login.php">Login</a>
        </div>
    </div>
</nav>

<body class="bg-light">
    <?php
    include("includes/dbh.php");
    ?>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="../My Sofware/images/UDUSlogo.jpg" alt="" width="100"
                    height="100">
                <h2>Online Clearance System Registration</h2>
                <p class="lead">Please fill in the form with appropriate input</p>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <form action="includes/register.inc.php" method="POST" class="needs-validation"
                        enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                    name="first" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    name="last" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="admission_no" class="form-label">Admission Number</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="admission_no" placeholder="1810******"
                                        name="adm_no" required>
                                    <div class="invalid-feedback">
                                        Your Admission Number is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="phone_no" class="form-label">Phone Number<span class="text-muted">
                                        (Optional)</span></label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="phone_no" placeholder=""
                                        name="phone_no">
                                    <div class="invalid-feedback">
                                        Please enter a your 11 digits phone number.
                                    </div>
                                </div>
                            </div>

                            <div class="col-8">
                                <label for="email" class="form-label">Email <span class="text-muted">(School
                                        Email address)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="admNo@udusok.edu.ng"
                                    name="email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email
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

                            <div>

                                <label for="state" class="form-label">Faculty</label>
                                <select class="form-select" id="faculty_id" name="faculty">
                                    <option value="">Select Faculty</option>
                                    <?php
                                    // Query the database to fetch for the faculty
                                    $sql = "SELECT * FROM `faculties`";
                                    $result = mysqli_query($conn, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option>
                                            <?php echo $row['faculty_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="department_id" class="form-label">Department</label>
                                <select class="form-select" id="department_id" name="dept">
                                    <option value="">Select Department</option>
                                    <?php
                                    // Query the database to fetch for the faculty
                                    $sql1 = "SELECT * FROM `departments`";
                                    $result1 = mysqli_query($conn, $sql1);

                                    while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                        <option>
                                            <?php echo $row1['department_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <label for="formFile" class="form-label">Picture</label>
                                <input class="form-control" type="file" id="formFile" name="picture">
                            </div>
                            <div class="col-sm-4">
                                <label for="session" class="form-label">Session</label>
                                <select class="form-select" id="session" name="session">
                                    <?php
                                    // Query the database to fetch for the faculty
                                    $sql2 = "SELECT * FROM `sessions`";
                                    $result2 = mysqli_query($conn, $sql2);

                                    while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                        <option>
                                            <?php echo $row2['session'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-success btn-lg" type="submit" value="Register"
                name="btnregister">Register</button>
            </form>
    </div>
    </div>

    <script src="../My Sofware/assets/dist/js/bootstrap.bundle.min.js"></script>

    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;Khalifa-Baba Umar's Website @ 2023</p>
    </footer>

</body>

</html>