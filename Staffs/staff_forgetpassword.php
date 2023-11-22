<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Umar Khalifa-Baba and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Staff Reset Password Form | Online Clearance System</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">





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
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet">

</head>
<nav class="navbar navbar-expand-md navbar-white fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://www.udusok.edu.ng">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">About</a>
                </li>
            </ul>
            <a class="navbar-brand d-flex" href="staff_login.php">Sign In</a>
        </div>
    </div>
</nav><br><br><br><br><br><br>

<body class="text-center">
    <main class="w-100 m-auto">

        <div class="form-signin w-50 m-auto">
            <form class="container-sm" action="../includes/staff_forgetpassword.inc.php" method="post">
                <h2 class="">Reset Password</h2><br>

                <div class="form-floating">
                    <input type="text" class="form-control" name="username" placeholder="username">
                    <label for="floatingInput">Username</label>
                </div><br>
                <button class="w-100 btn btn-success" type="submit" value="Reset Password">Submit</button>
                <br>
        </div>

        </form>

    </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>