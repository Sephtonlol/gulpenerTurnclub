<?php
include "partials/_dbcon.php";

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

$delete = mysqli_query($connect, "DELETE FROM `blog` WHERE `blog_id`='$postToDelete'");


unlink( "../assets/images/blogimages/blogimage_". $postToDelete .".png");

header("Location: ../blog.php");

?>
