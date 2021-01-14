<?php

include "dbconnect.php";

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$genres = $_POST["genreSelect"];

//print count($genres);


if($password == $cpassword) {
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO `user`(`username`, `password`, `fname`, `lname`) VALUES ('$username', '$password_hash', '$firstname', '$lastname')";
    
    if (mysqli_query($conn, $sql)) {
      //echo "New record created successfully\n";
    } 
    
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header("Location: signup.php");
    }
    
    if (count($genres) > 0) {
        print "i am in the loop\n";
        $sql = "SELECT `user_id` FROM `user` WHERE `fname`='$firstname' AND `lname`='$lastname'";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            //echo "id: " . $row["user_id"] . "\n";
            $id = $row["user_id"];
          }
        } else {
          echo "0 results";
        }
        
        foreach ($genres as $genre) {
            echo "$genre\n";
            $sql = "INSERT INTO `favorite`(`user_id`, `category_name`) VALUES ($id, '$genre')";
            mysqli_query($conn, $sql);
        }
    }
  
    header("Location: login.php");
    exit();
}
else {
    header("Location: signup.php");
    exit();
}

?>
