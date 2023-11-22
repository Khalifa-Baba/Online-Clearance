<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Khalifa-baba Umar and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Message</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../../images/UDUSlogo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <script src="../../Js/jQuery.js"></script>




    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../../css/register.css" rel="stylesheet">
    <link href="../../css/carousel.css" rel="stylesheet">
    <!-- <link href="../My Sofware/css/nav.css" rel="stylesheet"> -->
</head>

<body class="bg-light">

    <div class="container">
        <?php
        include('../../includes/dbh.php');
        session_start();

        // Query the database to fetch for the faculty
        $sql = "SELECT * FROM `complains`";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result) ?>
        <main>
            <div class="py-5">
                <h5>Full Name:
                    <?php echo $row['fullname'] ?>
                </h5>
                <h5>Email:
                    <?php echo $row['email'] ?>
                </h5>
                <h5>Subject:
                    <?php echo $row['subject'] ?>
                </h5><br>
                <h5 class="justify-content">Complain:
                    <?php echo $row['message'] ?>
                </h5>
            </div>

            <hr class="my-4">
            <h6>Reply:</h6><br>
            <div class="row g-5 justify-content">
                <div class="col-md-7 col-lg-8">
                    <form action="" method="POST" class="needs-validation" enctype="multipart/form-data">
                        <textarea class="form-control" name="reply" id="reply" rows="8"></textarea><br>
                        <button class="w-50 btn btn-success btn-md" type="submit" value="Reply"
                            name="reply">Reply</button>

                    </form>
                </div>
            </div>

    </div>

    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy;Khalifa-Baba Umar's Website @ 2023</p>
    </footer>

</body>

</html>