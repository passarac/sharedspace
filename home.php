<?php

session_start();
include "dbconnect.php";

$sql1 = "SELECT DISTINCT b.book_id, b.book_title, b.cover_img from book b JOIN book_genre bg ON b.book_id = bg.book_id ORDER BY num_readers LIMIT 5;";
$result1 = mysqli_query($conn, $sql1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Discover - SHAREDSPACE
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
}
</style>
</head>

<body class="index-page">
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent">
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
     <div class="main">
    </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-250" src="uploads/carous1.png" height="450px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-250" src="uploads/carous2.png" height="450px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-250" src="uploads/carous3.png" height="450px">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <section class="section section-lg">
        <div class="container align-items-center">
          <div class="row">
            <div class="col-6"><br><br>
              <h1 class="title">Top Hits</h1><hr class="line-primary">
            </div>
            <div class="col-6"><br><br>
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-trophy"></i>
              </button>
            </div>
          </div>
          <!-- Book's details Card -->
          <div class="row">
            <div class="col-10">
              <div class="card card-plain">
                <div class="card-body">
                  <div class="row">
                      <?php
                    if(mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                          $book_id1 = $row1["book_id"];
                          $book_title1 = $row1["book_title"];
                          $cover_img1 = $row1["cover_img"];

                          echo '<a href="viewchapter.php?bookid='.$book_id1.'">
                          <div class="col">
                          <div style="box-shadow: 5px 10px 18px black;">
                            <img src="' . $cover_img1 . '" class="rounded shadow" height="260px" width="180px">
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
          <!-- End Card -->
        </div>
      </section>
      <section class="section section-lg" style="background-color:rgb(7, 10, 37);">
        <div class="container align-items-center">
          <div class="row">
            <div class="col-6">
              <h1 class="title">Editor's Choices</h1><hr class="line-primary">
            </div>
            <div class="col-6">
              <button class="btn btn-primary btn-icon btn-round btn-lg float-right" type="button">
                <i class="tim-icons icon-tap-02"></i>
              </button>
            </div>
          </div><br>
          <!-- Book's details Card -->
          <div class="row">
            <div class="col-10">
              <a href="sharedspace/viewchapter.html">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <img src="assets/img/book1.png" class="rounded float-left">
                    </div>
                    <div class="col-9">
                      <div class="tab-content tab-space">
                        <div class="tab-pane active">
                          <h1>The Tokyōiter</h1>
                          <h3>By Jacques</h3>
                          <div class="row">
                            <div class="col">
                              <span class="badge badge-default">Category 1</span>&nbsp;
                              <span class="badge badge-default">Category 2</span>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          <br>
                          <div class="row">
                            <div class="col">
                              <span class="display">
                                <div class="d-flex align-items-center">
                                  <div class="icon icon mb-2">
                                    <i class="tim-icons icon-align-left-2"></i>
                                  </div>
                                  <div class="ml-3">
                                    <h6>3 Chapter(s)</h6>
                                  </div>
                                </div>
                              </span>
                              <span class="display">
                                <div class="d-flex align-items-center float-left">
                                  <div class="icon icon mb-2">
                                    <i class="fas fa-eye"></i>
                                  </div>
                                  <div class="ml-3">
                                    <h6>1.2k Reader(s)</h6>
                                  </div>
                                </div>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <!-- End Card -->
        </div>
      </section>
      <div class="section section-nucleo-icons">
        <img src="assets/img/path3.png" class="path">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
              <h1 class="title">Discover by Genre</h1>
              <h4 class="description">
                Our site sorts ur posted book by genre. Click to see different stories by sorted by genre.
              </h4>
            </div>
          </div>
          <div class="blur-hover">
            <a href="discover.php">
              <div class="icons-container blur-item on-screen mt-5">
                <!-- Center -->
                <i class="icon tim-icons icon-coins"></i>
                <!-- Right 1 -->
                <i class="icon icon-sm tim-icons icon-spaceship"></i>
                <i class="icon icon-sm tim-icons icon-money-coins"></i>
                <i class="icon icon-sm tim-icons icon-link-72"></i>
                <!-- Right 2 -->
                <i class="icon tim-icons icon-send"></i>
                <i class="icon tim-icons icon-mobile"></i>
                <i class="icon tim-icons icon-wifi"></i>
                <!-- Left 1 -->
                <i class="icon icon-sm tim-icons icon-key-25"></i>
                <i class="icon icon-sm tim-icons icon-atom"></i>
                <i class="icon icon-sm tim-icons icon-satisfied"></i>
                <!-- Left 2 -->
                <i class="icon tim-icons icon-gift-2"></i>
                <i class="icon tim-icons icon-tap-02"></i>
                <i class="icon tim-icons icon-wallet-43"></i>
              </div>
              <span class="blur-hidden h5 text-primary">Explore all the genres</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Sypnosis
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">View Book</button>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/moment.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      blackKit.initDatePicker();
      blackKit.initSliders();
    
      $('.search').keypress(function (e) {
      if (e.which == 13) {
        $('form#search').submit();
        return false;    //<---- Add this line
      }
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>
