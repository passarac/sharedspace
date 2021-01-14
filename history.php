<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Reading History - SHAREDSPACE
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
</head>

<body class="landing-page">
   <!-- Navbar -->
     <nav class="navbar navbar-expand-lg fixed-top bg-info">
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
    <div class="page-header">
      <img src="assets/img/blob.png" class="path">
      <img src="assets/img/path2.png" class="path2">
      <section class="section section-lg">
        <div class="container align-items-center">
          <div class="row">
            <div class="col-6"><br><br>
              <h1 class="card-title">Reading History</h1><hr class="line-primary">
            </div>
            <div class="col-6"><br><br>
              <button class="btn btn-primary btn-icon btn-round btn-simple float-right" type="button">
                <i class="fas fa-history"></i>
              </button>
            </div>
          </div><br>
          <!-- Book's details Card -->
          <div class="row">
            <div class="col-10">
              <a href="viewchapter.html">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <img src="assets/img/book1.png"  class="rounded float-left">
                    </div>
                    <div class="col-10">
                      <button class="btn btn-link float-right">
                       <i class="tim-icons icon-trash-simple"></i>
                      </button>
                      <div class="tab-content tab-space">
                        <div class="tab-pane active">
                          <h1>The Tokyōiter</h1>
                          <h3>By Jacques</h3>
                          <br><br>
                          <div class="row">
                            <div class="col">
                              <div class="d-flex align-items-center">
                                <div class="icon icon mb-2">
                                  <i class="tim-icons icon-calendar-60"></i>
                                </div>
                                <div class="ml-3">
                                  <h6>Last Visited:</h6>
                                </div>
                                <div class="ml-3">
                                  <p>DD/MM/YYYY</p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="d-flex align-items-center float-right">
                                <div class="icon icon mb-2">
                                  <i class="tim-icons icon-book-bookmark"></i>
                                </div>
                                <div class="ml-3">
                                  <h6>On Chapter:</h6>
                                </div>
                                <div class="ml-3">
                                  <p>1</p>
                                </div>
                              </div>
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
      
      $('.search').keypress(function (e) {
      if (e.which == 13) {
        $('form#search').submit();
        return false;    //<---- Add this line
      }
    });
  </script>
</body>

</html>
