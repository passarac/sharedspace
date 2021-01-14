<?php

session_start();

include "dbconnect.php";

$title = $_POST["title"];
$pen_name = $_POST["penName"];
$sypnosis = $_POST["sypnosis"];
$genres = $_POST["genreSelect"];

$target_dir = "uploads";
$target_file = $target_dir . '/' . basename($_FILES["cover_img"]["name"]);
$filename = $_FILES["cover_img"]['tmp_name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($filename, $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["cover_img"]["name"])). " has been uploaded.";
    //echo $target_file . "\n";
} 
else {
    echo "Sorry, there was an error uploading your file.";
}

//get current user id
$current_user_id = $_SESSION["logged_in_user_id"];

if (count($genres) == 0) {
    echo "please choose at least one genre";
    exit();
}

//insert new book into database
$sql = "INSERT INTO `book`(`user_id`, `book_title`, `pen_name`, `sypnosis`, `cover_img`, `num_chapters`, `num_readers`) VALUES ($current_user_id, '$title', '$pen_name', '$sypnosis', '$target_file', 0, 0)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully\n";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  header("Location: signup.php");
}

//look for the book that was just inserted

$sql = "SELECT `book_id` FROM `book` WHERE `book_title`='$title' AND `pen_name`='$pen_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["user_id"] . "\n";
    $book_id = $row["book_id"];
  }
} else {
  echo "0 results";
}

foreach ($genres as $genre) {
    echo "$genre\n";
    $sql = "INSERT INTO `book_genre`(`book_id`, `category_name`) VALUES ($book_id, '$genre')";
    mysqli_query($conn, $sql);
}

//update book cover_img in database
$sql = "UPDATE `book` SET `cover_img`='$target_file' WHERE `book_id`=$book_id";
//echo $sql;
mysqli_query($conn, $sql);

//redirect back to mystories
header("Location: mybook.php");


?>