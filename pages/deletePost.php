<?php
include "partials/_dbcon.php";

session_start();
if ($_SESSION['authlevel'] > 1) {
    header("location: ../index.php");
    exit;
}

$postToDelete = $_GET['posttodelete'];

$delete = mysqli_query($connect, "DELETE FROM `blog` WHERE `blog_id`='$postToDelete'");


unlink( "../assets/images/blogimages/". $postToDelete .".png");

header("Location: ../blog.php");

?>
