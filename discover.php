<?php

session_start();
include "dbconnect.php";

$current_user_id = $_SESSION["logged_in_user_id"];
$current_username = $_SESSION["logged_in_username"];

$sql1 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Historical' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql2 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Romance' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql3 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Drama' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql4 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Fantasy' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql5 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Comedy' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql6 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Adventure' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$sql7 = "SELECT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id WHERE bg.category_name='Mystery' AND b.user_id != $current_user_id ORDER BY RAND() LIMIT 5;";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);
$result5 = mysqli_query($conn, $sql5);
$result6 = mysqli_query($conn, $sql6);
$result7 = mysqli_query($conn, $sql7);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Discover Books - SHAREDSPACE
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    span.display {
      display: inline-flex;
      padding-right: 20px;
      padding-top: 10px;
  }
      
      .book:hover {
          box-shadow: 5px 10px 30px black;
          width: 200px;
          height: 300px;
      }
  </style>
</head>

<body class="landing-page">
   <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="home.php" target="_blank">
          <span>SHARED</span>SPACE
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <form action="searched.php" method="post" class="form-inline">
            <div class="form-group no-border">
              <input type="text" name="searched" class="form-control" placeholder="Search">
            </div>
            <button type="submit" id="search" style="display:none;"></button>
        </form>
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                Menu
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
            
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fas fa-user-circle"></i>
              <p class="d-lg-none d-xl-none">Profile</p>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="discover.php" class="dropdown-item">
                <i class="tim-icons icon-spaceship"></i> Discover Books
              </a>
              <a href="mybook.php" class="dropdown-item">
                <i class="tim-icons icon-paper"></i> My Stories
              </a>
              <a href="savedbook.php" class="dropdown-item">
                <i class="tim-icons icon-heart-2"></i>Saved Books
              </a>
              <a href="history.php" class="dropdown-item">
                <i class="tim-icons icon-bullet-list-67"></i>Reading History
              </a>
              <a href="profile.php" class="dropdown-item">
                <i class="tim-icons icon-badge"></i>Account Details
              </a>
              <a href="logout.php" class="dropdown-item">
                <i class="tim-icons icon-single-02"></i>Log out
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header" style="overflow:initial;max-width:none;max-height:none;">
      <img src="assets/img/blob.png" class="path">
      <img src="assets/img/path2.png" class="path2">
      <img src="assets/img/triunghiuri.png" class="shapes triangle">
      <img src="assets/img/waves.png" class="shapes wave">
      <img src="assets/img/patrat.png" class="shapes squares">
      <img src="assets/img/cercuri.png" class="shapes circle">
  <div class="wrapper">
 <br>
        <div class="align-items-center">
    <!--   Historical   -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Historical</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                          $book_id1 = $row1["book_id"];
                          $book_title1 = $row1["book_title"];
                          $cover_img1 = $row1["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id1.'" >
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img1 . '" class="rounded shadow book" height="260px" width="180px">
                           </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--   Romance   -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Romance</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result2) > 0) {
                      while ($row2 = mysqli_fetch_assoc($result2)) {
                          $book_id2 = $row2["book_id"];
                          $book_title2 = $row2["book_title"];
                          $cover_img2 = $row2["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id2.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img2 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Drama  -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Drama</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result3) > 0) {
                      while ($row3 = mysqli_fetch_assoc($result3)) {
                          $book_id3 = $row3["book_id"];
                          $book_title2 = $row3["book_title"];
                          $cover_img3 = $row3["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id3.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img3 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fantasy  -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Fantasy</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result4) > 0) {
                      while ($row4 = mysqli_fetch_assoc($result4)) {
                          $book_id4 = $row4["book_id"];
                          $book_title4 = $row4["book_title"];
                          $cover_img4 = $row4["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id4.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img4 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Comedy  -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Comedy</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result5) > 0) {
                      while ($row5 = mysqli_fetch_assoc($result5)) {
                          $book_id5 = $row5["book_id"];
                          $book_title5 = $row5["book_title"];
                          $cover_img5 = $row5["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id5.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img5 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Adventure  -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Adventure</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result6) > 0) {
                      while ($row6 = mysqli_fetch_assoc($result6)) {
                          $book_id6 = $row6["book_id"];
                          $book_title6 = $row6["book_title"];
                          $cover_img6 = $row6["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id6.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img6 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mystery  -->
    <div class="container align-items-center">
        <br><br><br>
      <div class="row">
            <div class="col-6">
              <h1 class="title">Mystery</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div>
      <div class="row">
        <div class="col">
          <div class="card card-plain">
            <div class="card-body">
              <div class="row">
                <?php
                    if(mysqli_num_rows($result7) > 0) {
                      while ($row7 = mysqli_fetch_assoc($result7)) {
                          $book_id7 = $row7["book_id"];
                          $book_title7 = $row7["book_title"];
                          $cover_img7 = $row7["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id7.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img7 . '" class="rounded shadow book" height="260px" width="180px">
                          </div>
                          <br>
                          </div>
                        </a>';
                      }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  </div>
      </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initLandingPageChart();
    });
  </script>
</body>

</html>
