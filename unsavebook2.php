<?php

include "dbconnect.php";
session_start();

$current_user_id = $_SESSION["logged_in_user_id"];
$book_id = $_GET["bookid"];

$sql = "DELETE FROM `toRead` WHERE `book_id`=$book_id AND `user_id`=$current_user_id";
$result = mysqli_query($conn, $sql);

$sql2 = "UPDATE `book` SET num_readers = num_readers - 1 WHERE `book_id`=$book_id";
mysqli_query($conn, $sql2);

header("Location: savedbook.php");

?>