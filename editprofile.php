<?php

include "dbconnect.php";

session_start();

$current_user_id = $_SESSION["logged_in_user_id"];

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$username = $_POST["username"];
$cpassword = $_POST["cpassword"];
$genres = $_POST["genreSelect"];

$target_dir = "uploads";
//echo json_encode($_FILES);

$target_file = $target_dir . '/' . basename($_FILES["profile_img"]["name"]);
$filename = $_FILES["profile_img"]['tmp_name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


//delete all existing favorite records
$sql = "DELETE FROM `favorite` WHERE `user_id`=$current_user_id";
mysqli_query($conn, $sql);
    
//update user information
$sql = "UPDATE `user` SET `fname`='$firstname', `lname`='$lastname', `username`='$username', `password`='$password' WHERE `user_id`=$current_user_id";
//echo $sql;
mysqli_query($conn, $sql);
$_SESSION["logged_in_username"] = $username;

//update the genre section
foreach ($genres as $genre) {
    echo "$genre\n";
    $sql = "INSERT INTO `favorite`(`user_id`, `category_name`) VALUES ($current_user_id, '$genre')";
    mysqli_query($conn, $sql);
}

//move file to target location
if (move_uploaded_file($filename, $target_file)) {
echo "The file ". htmlspecialchars( basename( $_FILES["profile_img"]["name"])). " has been uploaded.\n";
echo $target_file . "\n";
} 
else {
    echo "Sorry, there was an error uploading your file.";
}

//change profile img path in the database
$sql = "UPDATE `user` SET `profile_img`='$target_file' WHERE `user_id`=$current_user_id";
//echo $sql;
mysqli_query($conn, $sql);

header("Location: profile.php");



?>