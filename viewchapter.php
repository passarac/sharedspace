<?php
include "dbconnect.php";
session_start();
$current_user_id = $_SESSION["logged_in_user_id"];
$book_id = $_GET["bookid"];

$sql = "SELECT `book_title`, `pen_name`, `sypnosis`, `cover_img`, `num_chapters`, `num_readers` FROM `book` WHERE `book_id`=$book_id";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $book_title = $row["book_title"];
    $pen_name = $row["pen_name"];
    $sypnosis = $row["sypnosis"];
    $cover_img = $row["cover_img"];
    $num_chapters = $row["num_chapters"];
    $num_readers = $row["num_readers"];
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
    View Chapter - SHAREDSPACE
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
  .profile-cover {
      background-image: url(https://bootdey.com/img/Content/bg1.jpg);
      height: 260px;
      position: absolute;
      top: 0px;
      right: 0px;
      left: 0px;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
  }

  .book-display {
    position: relative;
    padding: 20px;
    top: 30px;
    left: 20px;
  }

  span.display {
    padding-left: 20px;
  }

  .book-content {
    position: relative;
    padding: 70px 60px 0px 60px;
  }

  .float-right {
    margin-right: 40px;
  }

  hr {
  width: 30px;
  margin-top: -1.2rem;
  margin-bottom: 1.5rem;
  }
  </style>

</head>

<body class="landing-page">
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
    <br>
  <div class="wrapper">
     <div class="page-header" style="overflow:initial;max-width:none;max-height:none;">
         <img src="assets/img/blob.png" class="path">
      <img src="assets/img/path2.png" class="path2">
      <img src="assets/img/triunghiuri.png" class="shapes triangle">
      <img src="assets/img/waves.png" class="shapes wave">
      <img src="assets/img/patrat.png" class="shapes squares">
      <img src="assets/img/cercuri.png" class="shapes circle">
        <div class="container bootstrap snippets bootdey">
          <!-- Start Cover -->
          <div class="col-12">
            <div class="profile-cover"></div>
            <div class="row">
              <div class="col-3">
                <div class="book-display">
                    <img src="<?php echo $cover_img; ?>" class="rounded float-left" style="width:270px; height:310px;">
                </div>
              </div>
              <div class="col-9">
                <div class="book-display">
                  <div class="row">
                    <div class="col">
                      <h1><?php echo $book_title; ?></h1>
                      <h3><?php echo $pen_name; ?></h3>
                    </div>
                  </div>
                    <div class="row">
                        <span class="display">
                          <div class="d-flex align-items-center">
                            <div class="icon icon mb-2">
                              <i class="tim-icons icon-align-left-2" style="color:white"></i>
                            </div>
                            <div class="ml-3">
                              <h6> <?php echo $num_chapters; ?> Chapter(s)</h6>
                            </div>
                          </div>
                        </span>
                        <span class="display">
                          <div class="d-flex align-items-center">
                            <div class="icon icon mb-2">
                              <i class="fas fa-eye" style="color:white"></i>
                            </div>
                            <div class="ml-3">
                              <h6><?php echo $num_chapters; ?> Reader(s)</h6>
                            </div>
                          </div>
                        </span>
                    </div>
                    <div class="row">
                      <div class="col">
                        <?php
                        $sql2 = "SELECT `category_name` FROM `book_genre` WHERE `book_id`=$book_id";
                        $result2 = mysqli_query($conn, $sql2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                            $category_name = $row2["category_name"];
                            echo '<span class="badge badge-default">' . $category_name . '</span>&nbsp';
                        }
                        ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Cover -->
          <div class="row">
            <div class="col-12">
              <div class="book-content">
                <h2>Sypnosis</h2>
                <p><?php echo $sypnosis; ?></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="book-content">
                <div class="row">
                  <div class="col-6">
                    <h2>Chapters</h2>
                  </div>
                </div>
                <table class="table">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th class="text-left">Name</th>
                          <th class="text-right"></th>
                      </tr>
                  </thead>
                  <tbody>
                      
                      <?php
                    $sql4 = "SELECT `chapter_id`, `book_id`, `chap_name`, `content` FROM `chapter` WHERE `book_id`=$book_id";
                    $result4 = mysqli_query($conn, $sql4);
                    $no = 1;
                      
                    while($row4 = mysqli_fetch_assoc($result4)) {
                        $chapter_id = $row4["chapter_id"];
                        $chapter_book_id = $row4["book_id"];
                        $chap_name = $row4["chap_name"];
                        $chapter_content = $row4["content"];
                        
                        echo 
                        '<tr>
                            <td>' . $no . '</td>
                            <td class="text-left">' . $chap_name . '</td>
                            <form action="deletechap.php" method=post>
                            <input name="bookid" hidden value="' . $book_id . '">
                            <input name="chapname" hidden value="' . $chap_name . '">
                            <input name="chapid" hidden value="' . $chapter_id . '">
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-primary btn-sm btn-icon" data-toggle="modal" data-target="#bd-example-modal-lg'. $chapter_id . '">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            </form>
                        </tr>';
                        
                        $no = $no + 1;
                    }
                    ?>
                      
                   <?php
                    $sql4 = "SELECT `chapter_id`, `book_id`, `chap_name`, `content` FROM `chapter` WHERE `book_id`=$book_id";
                    $result4 = mysqli_query($conn, $sql4);
                    $no = 1;
                      
                    while($row4 = mysqli_fetch_assoc($result4)) {
                        $chapter_id = $row4["chapter_id"];
                        $chapter_book_id = $row4["book_id"];
                        $chap_name = $row4["chap_name"];
                        $chapter_content = $row4["content"];   ?>           <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id = "bd-example-modal-lg<?= $chapter_id?>">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <?php
                                      echo '<h3 class="modal-title" id="exampleModalLongTitle">' . $chap_name . '</h3>';
                                    ?>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p style="white-space:pre-wrap;">
                                    <?php
                                      echo ''. $chapter_content;
                                    ?>
                                      </p>
                                  </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                      
                  </tbody>
                </table>
                  <br><br><br><br>
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
      
      $('.search').keypress(function (e) {
      if (e.which == 13) {
        $('form#search').submit();
        return false;    //<---- Add this line
      }
    });
  </script>
</body>

</html>
