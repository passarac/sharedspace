<?php session_start(); ?>
<?php
    //including the database connection file
    $mysqli = mysqli_connect('localhost','root','','sharedspace') or die('Unable To connect');
    
    //getting id of the data from url
    $userid = $_GET['user_id'];
    $bookid = $_GET['book_id'];
    
    //deleting the row from table
    if (isset($userid)) {
    $result=mysqli_query($mysqli, "DELETE FROM user WHERE user_id=$userid");
        
    $sql = "DELETE FROM `book` WHERE `user_id`=$userid";
    $result = mysqli_query($conn, $sql);

    //redirecting to the display page
    $mysqli->close();
    header("Location:admin_user.php");
    }

    elseif (isset($bookid)) {
        $result=mysqli_query($mysqli, "DELETE FROM book WHERE book_id=$bookid");
        
        $sql2 = "DELETE FROM `chapter` WHERE `book_id`=$bookid";
        mysqli_query($conn, $sql2);
        
        //redirecting to the display page
        $mysqli->close();
        header("Location:admin_book.php");
        }
?>