<?php

include "dbconnect.php";
session_start();

$book_id = $_POST["bookid"];
$genres = $_POST["genreSelect"];

//delete all existing book genre records
$sql = "DELETE FROM `book_genre` WHERE `book_id`=$book_id";
mysqli_query($conn, $sql);

//replace with new genres into database
foreach ($genres as $genre) {
    //echo "$genre\n";
    $sql = "INSERT INTO `book_genre`(`book_id`, `category_name`) VALUES ($book_id, '$genre')";
    mysqli_query($conn, $sql);
}

header('Location: mybook_chapter.php?id=' . $book_id);

?>