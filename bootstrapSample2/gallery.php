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
      left: 70px;
      height: 25px;
      width: 25px;
      background-color: white;
      border-radius: 50%;
      border: blue;
      transition-duration: 0.5s;
    }

    #select input:checked ~ .checkmark {
      background-color: #2196F3;
      transform:translate3d(-10px, -10px,0);
      transition-duration: 0.5s;
    }

    #select:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    #select input:checked ~ .checkmark:after {
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
        <a href="index.html" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Messages</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
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
                <h3 class="card-text">Image Gallery</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="selector">
          <div class="row">

            <?php
            $query = $db_handle->runQuery("SELECT * FROM tbl_image ORDER BY id ASC");

            if (!empty($query)) {
              foreach ($query as $key => $value) {

                echo "
              
                  <div class='col-4 card-body text-center'>
                    <h5>" . $query[$key]['name'] . "</h5>
                    <label id=select>
                    <input type='radio' name='credit-card' value='visa'>
                    <img src='" . $query[$key]['path'] . "'/>
                    <span class='checkmark'></span>
                    </label>
                  </div>
                ";
              }
            } else {
              echo "
                  <div class='col-4 card-body text-center'>
                    <h5>Default</h5>
                    <img src='gallery/default.jpeg'/>
                  </div>
                ";
            }

            ?>
          </div>
        </div>
      </div>
      <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          See the Images
        </button>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="container-fluid">
              <div class="row">

                <?php
                $query = $db_handle->runQuery("SELECT * FROM tbl_image ORDER BY id ASC");

                if (!empty($query)) {
                  foreach ($query as $key => $value) {

                    echo "
                    <div class='col-6 card-body text-center'>
                      <h5>" . $query[$key]['name'] . "</h5>
                      <label id=select>
                        <input type='radio' name='credit-card' value='visa'>
                        <img src='" . $query[$key]['path'] . "'>
                        <span class='checkmark'></span>
                      </label>
            
                    </div>
                ";
                  }
                } else {
                  echo "
                  <div class='col-6 card-body text-center'>
                    <h5>Default</h5>
                    <img src='gallery/default.jpeg'/>
                  </div>
                ";
                }

                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#wrapper -->

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