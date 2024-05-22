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

$photoToDelete = $_GET['phototodelete'];

$delete = mysqli_query($connect, "DELETE FROM `photo` WHERE `photo_id`='$photoToDelete'");


unlink( "../assets/images/photoimages/galleryimage_". $photoToDelete .".png");

header("Location: ../gallery.php");

?>
