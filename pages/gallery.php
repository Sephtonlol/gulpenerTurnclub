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
// error_reporting(0);

session_start();
include __DIR__ . "/partials/smallHeader.php";
require __DIR__ . "/partials/_dbcon.php";
?>

<div class="container">
    <div class="image_flex">


<?php
error_reporting(0);
if(isset($_SESSION['loggedin'])) {

if ($_SESSION['authlevel'] <= 1) {
    echo "<a class='image-container'  style='justify-content: center; padding: 0px 20px 0px 20px;' href='./newGallery.php'>
    <span>Foto Toevoegen</span>
    </a>";
        
}
}
$query = "SELECT * FROM photo
order by photo_id desc";
$result = $mysqli->query($query);


if (!$pageNumber = $_GET["page"]){
    if ($pageNumber < 1){
        $pageNumber = 1;
    }
}

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $highestPhotoId = $row["photo_id"];
}

$amountPerPage = 12;
if (isset($_SESSION["loggedin"])){
    $amountPerPage -= 1;
}
$nowPrinting = ($amountPerPage - ($amountPerPage * $pageNumber)) + $highestPhotoId;
$totalPages = $highestPhotoId / $amountPerPage;
$totalPages = ceil($totalPages);
if ($_GET["page"] > $totalPages){
    header("location: ./blog.php");
}

while ($nowPrinting > 0) {
        $query = "SELECT * FROM photo WHERE photo_id = '$nowPrinting'";
        
        $result = mysqli_query($connect, $query);
        $row = $result->fetch_assoc();
        $galleryId = $row["photo_id"];
        $date = $row["date"];
        $nowPrinting--;
            if ($amountPerPage > 0){
                $amountPerPage--;
                if (file_exists("../assets/images/galleryimages/galleryimage_" . $galleryId . ".png")){

                

    echo '<div class="image-container" onclick="window.location.href=\'image.php?galleryimage=' . $galleryId . '\'" >
        <img src="../assets/images/galleryimages/galleryimage_' . $galleryId . '.png">';
    echo '<span style="font-size: 1.5rem;">' . $date . '</span>';
    if(isset($_SESSION['loggedin'])) {
    if ($_SESSION['authlevel'] <= 1) {
        echo "<a onclick='check()' href='deletePhoto.php/?phototodelete=" . $galleryId . "'>Delete photo</a>";
    }
}
    echo "</div>";
}
}
}
?>
    </div>
</div>
<div class="prevNext">
            <?php
            for ($i = ($pageNumber - 2); $i <= $totalPages; $i++){
                if ($i > 0 && $i < ($pageNumber + 3) && $totalPages > 1){
                    echo "<button onclick='window.location.href=\"./gallery.php?page=" . $i . "\"'>" . $i . "</button>";

                }
            }
            

            ?>
        </div>
<?php 

include __DIR__ . "/partials/footer.php";
?>
</body>
</html>
