<?php

include "dbconnect.php";
session_start();

$book_id = $_POST["bookid"];
$chapter_name = $_POST["chapterName"];
$chapter_content = $_POST["content"];

if ($chapter_name != "" || $chapter_content != "") {
    $sql = "INSERT INTO `chapter`(`book_id`, `chap_name`, `content`) VALUES ($book_id, '$chapter_name', '$chapter_content')";
    mysqli_query($conn, $sql);
    
    $sql2 = "UPDATE `book` SET num_chapters = num_chapters + 1 WHERE `book_id`=$book_id";
    mysqli_query($conn, $sql2);
    
    $location = 'Location: mybook_chapter.php?id=' . $book_id;
    header($location);
} else {
    echo "cannot be empty";
}

?>