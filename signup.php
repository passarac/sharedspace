

 <!DOCTYPE html>
 <html lang="en">
 
 <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="assets/img/favicon.png">
   <title>
     Join - SHAREDSPACE
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
 
 <body class="register-page">
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-transparent">
     <div class="container">
       <div class="navbar-translate">
         <a class="navbar-brand" href="landing.html">
           <span>SHARED</span>SPACE
         </a>
       </div>
     </div>
   </nav>
   <!-- End Navbar -->
   <div class="wrapper">
     <div class="page-header">
       <div class="page-header-image"></div>
       <div class="content">
         <div class="container">
           <div class="row">
             <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
               <div id="square7" class="square square-7"></div>
               <div id="square8" class="square square-8"></div>
               <div style="margin-top: 0;" class="card card-register">
                 <div class="card-header">
                   <img class="card-img" src="assets/img/square1.png" alt="Card image">
                   <h4 class="card-title">Join Us</h4>
                 </div>
                 <div class="card-body">
                   <form action="regis.php" method="POST" class="form">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control" placeholder="firstname">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Lastname</label>
                        <input type="text" name="lname" class="form-control" placeholder="lastname">
                      </div>
                    </div>
                    <label class="form-check-label">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="tim-icons icon-single-02"></i>
                        </div>
                      </div>
                      <input type="text" name="username" placeholder="username" class="form-control">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Password</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                              </div>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Confirm Password</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="tim-icons icon-key-25"></i>
                              </div>
                            </div>
                            <input type="password" name="cpassword" class="form-control" placeholder="confirm password">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Select your favorite genres</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="genreSelect[]">
                              <option value="Historical">Historical</option>
                              <option value="Romance">Romance</option>
                              <option value="Drama">Drama</option>
                              <option value="Fantasy">Fanatasy</option>
                              <option value="Comedy">Comedy</option>
                              <option value="Adventure">Adventure</option>
                              <option value="Mystery">Mystery</option> 
                        </select>
                    </div>
                    <label class="form-check-label">
                      Already have an account?
                      <a href="login.php">Log in here</a>
                    </label>
                    <div class="card-footer text-center">
                     <button type="submit" class="btn btn-info btn-lg">Sign Up</button>
                    </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
           <div class="register-bg"></div>
           <div id="square1" class="square square-1"></div>
           <div id="square2" class="square square-2"></div>
           <div id="square3" class="square square-3"></div>
           <div id="square4" class="square square-4"></div>
           <div id="square5" class="square square-5"></div>
           <div id="square6" class="square square-6"></div>
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
 </body>
 
 </html>
 