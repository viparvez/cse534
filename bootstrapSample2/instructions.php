<?php
include 'DBController.php';
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <style>
        #select [type=radio] {
            position: relative;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        #select [type=radio]+img {
            transition-duration: 0.5s;
            transform: scale(0.9);
            cursor: pointer;
            opacity: 1;
            place-items: center center;
        }

        /* CHECKED STYLES */
        #select [type=radio]:checked+img {
            box-shadow: 0 0 0 8px #00c09e;
            outline: 4px solid blue;
            transition-duration: 0.5s;
            transform: scale(1);
            opacity: 1;
            place-items: center center;
        }

        .checkmark {
            position: absolute;
            top: 70px;
            left: 80px;
            height: 25px;
            width: 25px;
            background-color: white;
            border-radius: 50%;
            border: blue;
            transition-duration: 0.5s;
        }

        #select input:checked~.checkmark {
            background: linear-gradient(45deg, skyblue, blue);
            transform: translate3d(-10px, -10px, 0);
            transition-duration: 0.5s;
        }

        #select:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        #select input:checked~.checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        #select .checkmark:after {
            top: 65px;
            left: 75px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">UltrasBot </div>
            <div class="list-group list-group-flush">
                <a href="dashboard.html" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Messages</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                <a href="instructions.php" class="list-group-item list-group-item-action bg-light">Instructions</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="gallery.php" class="list-group-item list-group-item-action bg-light">Gallery</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row py-2">
                    <div class="col-12">
                        <div class="card bg-light shadow y" id="droppable">
                            <div class="card-body text-center">
                                <h3 class="card-text">How To Use UltrasBOT</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h1>Instructions</h1>
                <p>1. At first, go to Facebook for Developers, log in with your account</p>
                <p>2. Then go to 'Products' the left menu bar</p>
                <img src="images/sc01.jpg" width="80%" height="80%">
                <p>3. Then select 'Messenger' from the applications available for choosing, it will be under "Add a product" if you are getting started</p>
                <img src="images/sc02.jpg" width="80%" height="80%">
                <p>4. Then click on add or remove tokens to connect pages to UltrasBOT</p>
                <img src="images/sc03.jpg" width="80%" height="80%">
                <p>5. Then provide the Callback URL and you will get the verify token</p>
                <img src="images/sc04.jpg" width="80%" height="80%">
                <img src="images/sc05.jpg" width="80%" height="80%">
            </div>
            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="jqueryui.js"></script>
</body>

</html>