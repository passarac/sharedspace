<?php

include "dbconnect.php";
session_start();

$book_id = $_GET["id"];

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

$historical_option = '<option value="Historical">Historical</option>';
$romance_option = '<option value="Romance">Romance</option>';
$drama_option = '<option value="Drama">Drama</option>';
$fantasy_option = '<option value="Fantasy">Fantasy</option>';
$comedy_option = '<option value="Comedy">Comedy</option>';
$adventure_option = '<option value="Adventure">Adventure</option>';
$mystery_option = '<option value="Mystery">Mystery</option>';

$sql3 = "SELECT `category_name` FROM `book_genre` WHERE `book_id`='$book_id'";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result3)) {
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
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Manage Chapters - SHAREDSPACE
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
    padding: 60px 60px 0 60px;
  }

  hr {
  width: 20px;
  margin-top: 0.5rem;
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
  <div class="wrapper">
    <div class="page-header" style="overflow:initial;max-width:none;max-height:none;">
    <img src="assets/img/blob.png" class="path">
      <img src="assets/img/path2.png" class="path2">
      <img src="assets/img/triunghiuri.png" class="shapes triangle">
      <img src="assets/img/waves.png" class="shapes wave">
      <img src="assets/img/patrat.png" class="shapes squares">
      <img src="assets/img/cercuri.png" class="shapes circle">
    <div style="height:20px;"></div>
    <div class="container bootstrap snippets bootdey">
        <form>
          <div class="col-12">
            <div class="profile-cover"></div>
            <div class="row">
              <div class="col-3">
                <div class="book-display">
                    <?php
                    echo '<img src="'. $cover_img .'" class="rounded float-left" style="width:270px; height:310px;">';
                    ?>
                </div>
              </div>
              <div class="col-9">
                <div class="book-display"><br>
                    <small style="color:white;">Manage</small>
                    <hr class="line-primary">
                    <h1> <?php echo '' . $book_title . ''; ?></h1>
                    <div class="row">
                        <span class="display">
                          <div class="d-flex align-items-center">
                            <div class="icon icon mb-2">
                              <i class="tim-icons icon-align-left-2" style="color:white;"></i>
                            </div>
                            <div class="ml-3">
                              <h6><?php echo '' . $num_chapters . ' '; ?>Chapter(s)</h6>
                            </div>
                          </div>
                        </span>
                        <span class="display">
                          <div class="d-flex align-items-center">
                            <div class="icon icon mb-2" style="color:white;">
                              <i class="fas fa-eye"></i>
                            </div>
                            <div class="ml-3">
                              <h6><?php echo '' . $num_readers . ' '; ?> Reader(s)</h6>
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

                        <button type="button" class="badge badge-default" data-toggle="modal" data-target="#categoryModal">
                            <i class="tim-icons icon-simple-add"></i>
                        </button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="book-content">
                <br>
                <div class="form-group">
                  <label>Sypnosis</label>
                  <p> <?php echo ''.$sypnosis; ?> </p>
                </div>
              </div>
            </div>
          </div>   
        </form>
        <div class="row">
          <div class="col-12">
            <div class="book-content">
              <div class="row">
                <div class="col-6">
                  <h3>Chapters</h3>
                </div>
                <div class="col-6">
                  <button class="btn float-right" data-toggle="modal" data-target="#addChapModal">
                    <i class="tim-icons icon-simple-add"></i> &nbsp;Add New Chapter
                  </button>
                  <!-- Start Modal -->
                    <div class="modal fade modal-black" id="addChapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              <i class="tim-icons icon-simple-remove text-white"></i>
                            </button>
                            <div class="text-muted text-center ml-auto mr-auto">
                              <h3 class="mb-0">Start a New Chapter</h3>
                            </div>
                          </div>
                          <div class="modal-body">
                            <form role="form" action="addchapter.php" method="post">
                              <input name="bookid" hidden value="<?php echo $book_id; ?>">
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Chapter Name</label>
                                    <input type="text" name="chapterName" class="form-control" placeholder="Enter the chapter name">
                                  </div>
                                </div>
                              </div><br>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Or enter the chapter's content here"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-info my-4">Publish</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  <!--  End Modal -->
                </div>
              </div>
              <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>No.</th>
                        <th>Name</th>
                        <th class="text-center">Edit</th>
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
                            <td></td>
                            <td>' . $no . '</td>
                            <td>' . $chap_name . '</td>
                            <form action="deletechap.php" method=post>
                            <input name="bookid" hidden value="' . $book_id . '">
                            <input name="chapname" hidden value="' . $chap_name . '">
                            <input name="chapid" hidden value="' . $chapter_id . '">
                            <td class="td-actions text-center">
                                <button type="button" rel="tooltip" class="btn btn-primary btn-sm btn-icon" data-toggle="modal" data-target="#bd-example-modal-lg'. $chapter_id . '">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="submit" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                                    <i class="tim-icons icon-trash-simple"></i>
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
              <br><br>
            </div>
          </div>
            </div>
        </div>
    </div>
    
    <!-- Start Modal -->
<div class="modal fade modal-black" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form role="form" action="addbook_genre.php" method="post">
          <button type="button" class="close float-right" data-dismiss="modal" aria-hidden="true">
            <i class="tim-icons icon-simple-remove text-white" style="font-size: 14px;"></i>
          </button>
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input name="bookid" hidden value="<?php echo $book_id; ?>">
                <label>Choose matched categories</label>
                <select multiple class="form-control" id="exampleFormControlSelect2" name="genreSelect[]">
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
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-info my-4">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  End Modal -->

      <br><br>
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