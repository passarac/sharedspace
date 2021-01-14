<?php


// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to landing
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: home.php");
    exit;
}

include "dbconnect.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if($username == "admin" && $password == "admin") {
          header("Location: admin_user.php");
      }
    
    
    $sql = "SELECT `user_id`, `username`, `password` FROM `user` WHERE `username`='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
      
      while ($row = mysqli_fetch_assoc($result)) {
          $user_id = $row["user_id"];
          $password_hash = $row["password"];
          $db_username = $row["username"];
      }
        
        
      if (password_verify($password, $password_hash)) {
          session_destroy();
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["logged_in_user_id"] = $user_id;
          $_SESSION["logged_in_username"] = $username;
          header("Location: home.php");
      }
    } 
    else {
      //invalid username or password
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Login - SHAREDSPACE
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
  <nav class="navbar navbar-expand-lg navbar-transparent">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="landing.php">
          <span>SHARED</span>SPACE
        </a>
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

      <div class="container">
        <div class="modal-dialog">
          <div class="modal-content" style="background: #101239; margin-top: 17%;">
            <div class="modal-header justify-content-center">
              <div class="text-muted text-center ml-auto mr-auto">
                <h3 class="mb-0">Sign in with</h3>
              </div>
            </div>
            <div class="modal-body">
              <div class="text-center text-muted mb-4 mt-3">
                <small>Log in with credentials</small>
              </div>
              <form action="" method="post" role="form">
                <div class="form-group mb-3">
                  <label class="form-check-label">Username</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                      </span>
                    </div>
                    <input class="form-control" name="username" placeholder="Username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-check-label">Password</label>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="tim-icons icon-key-25"></i>
                      </span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <small>
                  <label class="form-check-label">Don't have an account?
                    <a href="signup.php">Sign up here</a>
                  </label>
                </small>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Log in</button>
                </div>
              </form>
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
