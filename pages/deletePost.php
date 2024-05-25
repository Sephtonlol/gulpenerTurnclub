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
