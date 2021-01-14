<?php

include "dbconnect.php";
session_start();

$book_id = $_POST["bookid"];
$chapter_id = $_POST["chapid"];
$chapter_name = $_POST["chapname"];

//delete chapter
$sql = "DELETE FROM `chapter` WHERE `book_id`=$book_id AND `chap_name`='$chapter_name' AND `chapter_id`=$chapter_id";
mysqli_query($conn, $sql);

$sql2 = "UPDATE `book` SET num_chapters = num_chapters - 1 WHERE `book_id`=$book_id";
mysqli_query($conn, $sql2);

header('Location: mybook_chapter.php?id=' . $book_id);

?>