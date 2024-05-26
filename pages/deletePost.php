<?php
require "partials/_dbcon.php";

session_start();
if ($_SESSION['authlevel'] != 0 || !isset($_SESSION['authlevel'])) {
    header("Location: ./index.php");
    exit;
}

if(!isset($_SESSION['loggedin'])) {
    header("Location: ./index.php");
    exit;
}

$postToDelete = $_GET['posttodelete'];

if (file_exists("../assets/images/blogimages/blogimage_" . $historyToDelete . ".png")){
if (!unlink("../assets/images/blogimages/blogimage_". $historyToDelete . ".png")){
            throw new Exception("FAILED TO DELETE");
            }

    } 
    

    if(mysqli_query($connect, "DELETE FROM `blog` WHERE `blog_id`='$postToDelete'")){
        header("Location: ./blog.php");
        exit;
    }

echo "<script>alert('FAILED TO DELETE');</script>";



?>
