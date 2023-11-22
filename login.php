<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Umar Khalifa-Baba and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.108.0">
  <title>Sign-in Form | Online Clearance System</title>

  <link rel="icon" type="image/png" sizes="16x16" href="../My Sofware/images/UDUSlogo.jpg">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">





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
  <link href="../My Sofware/css/index.css" rel="stylesheet">
  <link href="../My Sofware/css/carousel.css" rel="stylesheet">

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
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
      <a class="navbar-brand d-flex" href="../My Sofware/Staffs/staff_login.php">Staff/Admin</a>
    </div>
  </div>
</nav><br><br><br><br>

<body class="text-center">
  <main class="w-100 m-auto">
    <div>
      <h2 class="">Online Clearance System For Final Year Students</h2>
    </div>
    <div class="form-signin w-100 m-auto">
      <form action="includes/login.inc.php" method="post">
        <img class="mb-4" src="../My Sofware/images/UDUSlogo.jpg" alt="UDUS Logo" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="adm_no" placeholder="Admission Number">
          <label for="floatingInput">Admission Number</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-success" type="submit" name="submit">Login</button>
        <a href="forgetpassword.php" class="link-dark">Forgot Password</a>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy;Khalifa-Baba Umar's Website @ 2023</p>
    </form>
    </div>
  </main>

  <script src="../My Sofware/assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>