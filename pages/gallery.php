<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gulpener Turnclub</title>
	  <link rel="icon" type="x-icon" href="../assets/images/favicon.png">

    <link rel="stylesheet" href="../styling/gallery.css" />
    <link rel="stylesheet" href="../styling/header.css">


    <link rel="stylesheet" href="../styling/style.css">

    <script src="../scripts/header.js" defer></script>
    <script src="../scripts/deletePostConfirm.js"> defer</script>
</head>
<body>
    
<?php
session_start();
include __DIR__ . "/partials/smallHeader.php";
require __DIR__ . "/partials/_dbcon.php";
?>

<div class="container">
    <div class="image_flex">


<?php

$query = "SELECT * FROM photo
order by photo_id desc";

$result = $mysqli->query($query);
if(isset($_SESSION['loggedin'])) {

if ($_SESSION['authlevel'] <= 1) {
    echo "<a class='image-container'  style='justify-content: center;' href='./newGallery.php'>
    <span>voeg foto toe</span>
</a>";
        
}
}

while ($row = $result->fetch_assoc()) {
    $galleryId = $row["photo_id"];
    $date = $row["date"];
    
    echo '<div class="image-container">
        <img src="../assets/images/galleryimages/galleryimage_' . $galleryId . '.png">';
    echo '<span style="font-size: 1.5rem;">' . $date . '</span>';
    if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a onclick='check()' href=deletePhoto.php/?phototodelete=" . $galleryId . ">Delete photo</a>";
    }
}
    echo "</div>";
}

?>
    </div>
</div>
<?php 

include __DIR__ . "/partials/footer.php";
?>
</body>
</html>
