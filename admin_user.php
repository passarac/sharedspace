<?php
session_start();
?>
<html>
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Admin Dashboard - SHAREDSPACE
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
<body>

    <div class="container">
        <br><br>
        <div class="row">
            <div class="col"><br>
            <small>Login as Admin</small>
            <h2>Welcome back</h2>
            <hr class="line-info">
            </div>
            <div class="col-auto"><a href="admin_book.php" tite="Logout"><br>
            <button class="btn btn-info float-right" data-toggle="modal" data-target="#addChapModal">Books</button>
            </a></div>
            <div class="col-auto"><a href="logout.php" tite="Logout"><br>
            <button class="btn float-right" data-toggle="modal" data-target="#addChapModal">Logout</button>
            </a></div>
        </div>
    </div>

<?php
//including the database connection file
$mysqli = mysqli_connect('localhost','root','','sharedspace') or die('Unable To connect');
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM user");
?>
<div class="wrapper"><br>
    <div class="container align-items-center">
    <div class="page-header" style="overflow:initial;max-width:none;max-height:none;">
            <div class="row">
                <div class="col-12">
                <div class="book-content">
                    <div class="row">
                    <div class="col-6">
                        <h4>User's List</h4>
                    </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-left">Id</th>
                            <th class="text-left">Username</th>
                            <th class="text-left">Name</th>
                            <th class="text-right">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($res = mysqli_fetch_array($result)) {        
                            echo "<tr>";
                            echo "<td>".$res['user_id']."</td>";
                            echo "<td class='text-left'>".$res['username']."</td>";
                            echo "<td class='text-left'>".$res['fname']." ".$res['lname']."</td>";
                            echo "<td class='text-right'><a href=\"delete.php?user_id=$res[user_id]\" onClick=\"return confirm('Are you sure you want to delete this user?')\"><button type=\"button\" rel=\"tooltip\" class=\"btn btn-danger btn-sm btn-icon\"><i class=\"tim-icons icon-trash-simple\"></i></button></a></td>"; 
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div >
    </div>
</div>

 
</body>
</html>