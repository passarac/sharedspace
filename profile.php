<?php

include "dbconnect.php";

$firstname = $lastname = $password = $cover_img = "";

session_start();

$current_user_id = $_SESSION["logged_in_user_id"];
$current_username = $_SESSION["logged_in_username"];


$sql = "SELECT `fname`, `lname`, `password`, `profile_img` FROM `user` WHERE `username`='$current_username' AND `user_id`=$current_user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["user_id"] . "\n";
    $firstname = $row["fname"];
    $lastname = $row["lname"];
    $password = $row["password"];
    $profile_img = $row["profile_img"];
  }
} else {
  echo "0 results";
}

if ($profile_img == null) {
    $profile_img = "uploads/defaultpfp.png";
}

$historical_option = '<option value="Historical">Historical</option>';
$romance_option = '<option value="Romance">Romance</option>';
$drama_option = '<option value="Drama">Drama</option>';
$fantasy_option = '<option value="Fantasy">Fantasy</option>';
$comedy_option = '<option value="Comedy">Comedy</option>';
$adventure_option = '<option value="Adventure">Adventure</option>';
$mystery_option = '<option value="Mystery">Mystery</option>';

$sql = "SELECT `category_name` FROM `favorite` WHERE `user_id`='$current_user_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["user_id"] . "\n";
    $category_name = $row["category_name"];
      
    if ($category_name == "Historical") {
        $historical_option = '<option value="Historical" selected>Historical</option>';
    } else if ($category_name == "Romance") {
        $romance_option = '<option value="Romance" selected>Romance</option>';
    } else if ($category_name == "Drama") {
        $drama_option = '<option value="Drama" selected>Drama</option>';
    } else if ($category_name == "Fantasy") {
        $fantasy_option = '<option value="Fantasy" selected>Fantasy</option>';
    } else if ($category_name == "Comedy") {
        $comedy_option = '<option value="Comedy" selected>Comedy</option>';
    } else if ($category_name == "Adventure") {
        $adventure_option = '<option value="Adventure" selected>Adventure</option>';
    } else if ($category_name == "Mystery") {
        $mystery_option = '<option value="Mystery" selected>Mystery</option>';
    }
  }
} else {
  //echo "0 results";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
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
                <div class="card-header"><br>
                  <p>Manage</p>
                  <h1 class="profile-title text-left">Profile</h1>
                  <hr class="line-primary">
                </div>
                <div class="card-body">
                  <form action="editprofile.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-4">
                        <?php echo '<img src="' . $profile_img . '" class="img-fluid rounded-circle shadow" style="border-radius:50%; width:300px; height:300px;">' ?>
                          <div style="height:30px;"></div>
                        <label>To change profile picture choose a new file</label>
                        <div class="custom-file">
                            <input type="file" name="profile_img" class="custom-file-input" id="fileToUpload">
                            <?php echo '<label class="custom-file-label" for="customFile">' . $profile_img . '</label>' ?>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Firstname</label>
                            <input type="text" name="fname" value="<?php echo $firstname; ?>" class="form-control" placeholder="firstname">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Lastname</label>
                            <input type="text" name="lname" value="<?php echo $lastname; ?>" class="form-control" placeholder="lastname">
                          </div>
                        </div>
                        <label class="form-check-label">Username</label>
                
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="tim-icons icon-single-02"></i>
                            </div>
                          </div>
                          <input type="text" name="username" value="<?php echo $current_username; ?>" placeholder="Username" class="form-control">
                        </div>
                          <br>
                        <div class="form-row">
                          <h4>Reading Preferences</h4>
                        </div>
                        <div class="form-group">
                            <select multiple class="form-control" name="genreSelect[]" id="exampleFormControlSelect2">
                                <?php
                                    echo $historical_option;
                                    echo $romance_option;
                                    echo $drama_option;
                                    echo $fantasy_option;
                                    echo $comedy_option;
                                    echo $adventure_option;
                                    echo $mystery_option;
                                ?>
                            </select>
                        </div>
                          <br>
                          <button class="btn btn-primary btn-round">Submit</button>
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
