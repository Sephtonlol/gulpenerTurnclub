<?php

require "partials/_dbcon.php";

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['authlevel'] > 1) {

header("location: ./index.php");
}

$historyToDelete = $_GET["historyToDelete"];

echo $historyToDelete;

for ($i = 1; $i <= 3; $i++){
    if (file_exists("../assets/images/historyimages/historyimage_". $historyToDelete . "_" . $i .  ".png")){
        if (!unlink("../assets/images/historyimages/historyimage_". $historyToDelete . "_" . $i .  ".png")){
            throw new Exception("FAILED TO DELETE");
            }

    } 
    }

    if(mysqli_query($connect, "DELETE FROM `history` WHERE `history_id`='$historyToDelete'")){
        header("Location: ./history.php");
        exit;
    }

echo "<script>alert('FAILED TO DELETE');</script>";



?>