
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Add a New Story - SHAREDSPACE
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
      <img src="assets/img/triunghiuri.png" class="shapes triangle">
      <img src="assets/img/waves.png" class="shapes wave">
      <img src="assets/img/patrat.png" class="shapes squares">
      <img src="assets/img/cercuri.png" class="shapes circle">
      <section class="section">
        <div class="container">
          <div class="row">
            <div class="col-10">
              <div class="card card-plain">
                <div class="card-header">
                  <p>Let's share your voice!</p>
                  <h1 class="profile-title text-left">Start a New Book</h1>
                </div>
                <div class="card-body">
                  <form action="addBook.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-3">
                        <ul class="nav nav-pills nav-pills-info nav-pills-icons" style="padding-top: 13px;">
                          <li class="nav-item">
                            <a class="nav-link active show">
                              <div class="form-group"><br><br><br>
                                <i class="tim-icons icon-upload"></i>
                                <input name="cover_img" id="fileToUpload" type="file">
                                <h6>Upload book cover</h6><br><br><br>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Book Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Enter your book title">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Pen Name</label>
                              <input type="text" name="penName" class="form-control" placeholder="Enter your pen name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Sypnosis</label>
                              <textarea class="form-control" rows="2" name="sypnosis" placeholder="Enter the sypnosis"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Select all matched categories</label>
                          <select class="form-control" multiple name="genreSelect[]">
                            <option>Historical</option>
                            <option>Romance</option>
                            <option>Drama</option>
                            <option>Fantasy</option>
                            <option>Comedy</option>
                            <option>Adventure</option>
                            <option>Mystery</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-info float-right" data-toggle="modal" data-target="#notiModal">
                      Publish
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="notiModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="alert alert-success alert-with-icon">
                        <a href="mybook.html" class="alert-link"><button type="button" aria-hidden="true" class="close" >
                            <i class="tim-icons icon-simple-remove"></i>
                        </button></a>
                        <span data-notify="icon" class="tim-icons icon-send"></span>
                        <span><b> Done! </b> Your new book has been successfully published.</span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
